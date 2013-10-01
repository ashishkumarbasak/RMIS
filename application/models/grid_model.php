<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Grid_model extends CI_Model
{
    private $pdo;
    
    private $stringOperators = array(
            'eq' => 'LIKE',
            'neq' => 'NOT LIKE',
            'doesnotcontain' => 'NOT LIKE',
            'contains' => 'LIKE',
            'startswith' => 'LIKE',
            'endswith' => 'LIKE'
        );

        private $operators = array(
            'eq' => '=',
            'gt' => '>',
            'gte' => '>=',
            'lt' => '<',
            'lte' => '<=',
            'neq' => '!='
        );

        private $aggregateFunctions = array(
            'average' => 'AVG',
            'min' => 'MIN',
            'max' => 'MAX',
            'count' => 'COUNT',
            'sum' => 'SUM'
        );
    public function __construct()
    {
       // Call the Model constructor
        parent::__construct();
        $this->pdo = $this->load->database('default', true);
    }
   
    
    
    
   private function total($tableName, $properties, $request) {
        if (isset($request->filter)) {
            $where = $this->filter($properties, $request->filter);
            $statement = $this->pdo->conn_id->prepare("SELECT COUNT(*) FROM $tableName $where");
            $this->bindFilterValues($statement, $request->filter);
        } else {
            $statement = $this->pdo->conn_id->prepare("SELECT COUNT(*) FROM $tableName");
        }

        $statement->execute();

        $total = $statement->fetch(PDO::FETCH_NUM);
        return (int)($total[0]);
    }

    private function page() {
        return ' LIMIT :skip,:take';
    }

    private function group($data, $groups, $table, $request, $properties) {
        if (count($data) > 0) {
            return $this->groupBy($data, $groups, $table, $request, $properties);
        }
        return array();
    }

    private function mergeSortDescriptors($request) {
        $sort = isset($request->sort) && count($request->sort) ? $request->sort : array();
        $groups = isset($request->group) && count($request->group) ? $request->group : array();

        return array_merge($sort, $groups);
    }

    private function groupBy($data, $groups, $table, $request, $properties) {
        if (count($groups) > 0) {
            $field = $groups[0]->field;
            $count = count($data);
            $result = array();
            $value = $data[0][$field];
            $aggregates = isset($groups[0]->aggregates) ? $groups[0]->aggregates : array();

            $hasSubgroups = count($groups) > 1;
            $groupItem = $this->createGroup($field, $value, $hasSubgroups, $aggregates, $table, $request, $properties);

            for ($index = 0; $index < $count; $index++) {
                $item = $data[$index];
                if ($item[$field] != $value) {
                    if (count($groups) > 1) {
                        $groupItem["items"] = $this->groupBy($groupItem["items"], array_slice($groups, 1), $table, $request, $properties);
                    }

                    $result[] = $groupItem;

                    $groupItem = $this->createGroup($field, $data[$index][$field], $hasSubgroups, $aggregates, $table, $request, $properties);
                    $value = $item[$field];
                }
                $groupItem["items"][] = $item;
            }

            if (count($groups) > 1) {
                $groupItem["items"] = $this->groupBy($groupItem["items"], array_slice($groups, 1), $table, $request, $properties);
            }

            $result[] = $groupItem;

            return $result;
        }
        return array();
    }

    private function addFilterToRequest($field, $value, $request) {
        $filter = (object)array(
            'logic' => 'and',
            'filters' => array(
                (object)array(
                    'field' => $field,
                    'operator' => 'eq',
                    'value' => $value
                ))
            );

        if (isset($request->filter)) {
            $filter->filters[] = $request->filter;
        }

        return (object) array('filter' => $filter);
    }

    private function addFieldToProperties($field, $properties) {
        if (!in_array($field, $properties)) {
            $properties[] = $field;
        }
        return $properties;
    }

    private function createGroup($field, $value, $hasSubgroups, $aggregates, $table, $request, $properties) {
        if (count($aggregates) > 0) {
            $request = $this->addFilterToRequest($field, $value, $request);
            $properties = $this->addFieldToProperties($field, $properties);
        }

        $groupItem = array(
            'field' => $field,
            'aggregates' => $this->calculateAggregates($table, $aggregates, $request, $properties),
            'hasSubgroups' => $hasSubgroups,
            'value' => $value,
            'items' => array()
        );

        return $groupItem;
    }

    private function calculateAggregates($table, $aggregates, $request, $properties) {
        $count = count($aggregates);

        if (count($aggregates) > 0) {
            $functions = array();

            for ($index = 0; $index < $count; $index++) {
                $aggregate = $aggregates[$index];
                $name = $this->aggregateFunctions[$aggregate->aggregate];
                $functions[] = $name.'('.$aggregate->field.') as '.$aggregate->field.'_'.$aggregate->aggregate;
            }

            $sql = sprintf('SELECT %s FROM %s', implode(', ', $functions), $table);

            if (isset($request->filter)) {
                $sql .= $this->filter($properties, $request->filter);
            }

            $statement = $this->pdo->conn_id->prepare($sql);

            if (isset($request->filter)) {
                $this->bindFilterValues($statement, $request->filter);
            }

            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $this->convertAggregateResult($result[0]);
        }
        return (object)array();
    }

    private function convertAggregateResult($properties) {
        $result = array();

        foreach($properties as $property => $value) {
            $item = array();
            $split = explode('_', $property);
            $field = $split[0];
            $function = $split[1];
            if (array_key_exists($field, $result)) {
                $result[$field][$function] = $value;
            } else {
                $result[$field] = array($function => $value);
            }
        }

        return $result;
    }

    private function sort($properties, $sort) {
        $count = count($sort);

        $sql = '';

        if ($count > 0) {
            $sql = ' ORDER BY ';

            $order = array();

            for ($index = 0; $index < $count; $index ++) {
                $field = $sort[$index]->field;

                if (in_array($field, $properties)) {
                    $dir = 'ASC';

                    if ($sort[$index]->dir == 'desc') {
                        $dir = 'DESC';
                    }

                    $order[] = "$field $dir";
                }

            }

            $sql .= implode(',', $order);
        }

        return $sql;
    }

    private function where($properties, $filter, $all) {
        if (isset($filter->filters)) {
            $logic = ' AND ';

            if ($filter->logic == 'or') {
                $logic = ' OR ';
            }

            $filters = $filter->filters;

            $where = array();

            for ($index = 0; $index < count($filters); $index++) {
                $where[] = $this->where($properties, $filters[$index], $all);
            }

            $where = implode($logic, $where);

            return "($where)";
        }

        $field = $filter->field;

        if (in_array($field, $properties)) {
            $index = array_search($filter, $all);

            $value = ":filter$index";

            if ($this->isDate($filter->value)) {
                $field = "date($field)";
                $value = "date($value)";
            }

            if (array_key_exists($filter->operator, $this->operators) && !$this->isString($filter->value)) {
                $operator = $this->operators[$filter->operator];
            } else {
                $operator = $this->stringOperators[$filter->operator];
            }

            return "$field $operator $value";
        }
    }

    private function flatten(&$all, $filter) {
        if (isset($filter->filters)) {
            $filters = $filter->filters;

            for ($index = 0; $index < count($filters); $index++) {
                $this->flatten($all, $filters[$index]);
            }
        } else {
            $all[] = $filter;
        }
    }

    private function filter($properties, $filter) {
        $all = array();

        $this->flatten($all, $filter);

        $where = $this->where($properties, $filter, $all);

        return " WHERE $where";
    }

    private function isDate($value) {
        $result = date_parse($value);
        return $result["error_count"] < 1;
    }

    private function isString($value) {
        return !is_bool($value) && !is_numeric($value) && !$this->isDate($value);
    }

    private function bindFilterValues($statement, $filter) {
        $filters = array();
        $this->flatten($filters, $filter);

        for ($index = 0; $index < count($filters); $index++) {
            $value = $filters[$index]->value;
            $operator = $filters[$index]->operator;
            $date = date_parse($value);

            if ($operator == 'contains' || $operator == 'doesnotcontain') {
                $value = "%$value%";
            } else if ($operator == 'startswith') {
                $value = "$value%";
            } else if ($operator == 'endswith') {
                $value = "%$value";
            }

            $statement->bindValue(":filter$index", $value);
        }
    }

    public function create($table, $properties, $models, $key) {
        $result = array();
        $data = array();

        if (!is_array($models)) {
            $models = array($models);
        }

        $errors = array();

        foreach ($models as $model) {
            $columns = array();
            $values = array();
            $input_parameters = array();

            foreach ($properties as $property) {
                if ($property != $key) {
                    $columns[] = $property;
                    $values[] = '?';
                    $input_parameters[] = $model->$property;
                }
            }

            $columns = implode(', ', $columns);
            $values = implode(', ', $values);

            $sql = "INSERT INTO $table ($columns) VALUES ($values)";

            $statement = $this->pdo->conn_id->prepare($sql);

            $statement->execute($input_parameters);

            $status = $statement->errorInfo();

            if ($status[1] > 0) {
                $errors[] = $status[2];
            } else {
                $model->$key = $this->pdo->conn_id->lastInsertId();
                $data[] = $model;
            }
        }

        if (count($errors) > 0) {
            $result['errors'] = $errors;
        } else {
            $result['data'] = $data;
        }

        return $result;
    }

    public function destroy($table, $models, $key) {
        $result = array();

        if (!is_array($models)) {
            $models = array($models);
        }

        $errors = array();

        foreach ($models as $model) {
            $sql = "DELETE FROM $table WHERE $key=?";

            $statement = $this->pdo->conn_id->prepare($sql);

            $statement->execute(array($model->$key));

            $status = $statement->errorInfo();

            if ($status[1] > 0) {
                $errors[] = $status[2];
            }
        }

        if (count($errors) > 0) {
            $result['errors'] = $errors;
        }

        return $result;
    }

    public function update($table, $properties, $models, $key) {
        $result = array();

        if (in_array($key, $properties)) {

            if (!is_array($models)) {
                $models = array($models);
            }

            $errors = array();

            foreach ($models as $model) {
                $set = array();

                $input_parameters = array();

                foreach ($properties as $property) {
                    if ($property != $key) {
                        $set[] = "$property=?";
                        $input_parameters[] = $model->$property;
                    }
                }

                $input_parameters[] = $model->$key;

                $set = implode(', ', $set);

                $sql = "UPDATE $table SET $set WHERE $key=?";

                $statement = $this->pdo->conn_id->prepare($sql);

                $statement->execute($input_parameters);

                $status = $statement->errorInfo();

                if ($status[1] > 0) {
                    $errors[] = $status[2];
                }
            }

            if (count($errors) > 0) {
                $result['errors'] = $errors;
            }
        }

        if (count($result) == 0) {
            $result = "";
        }

        return $result;
    }

    public function read($table, $properties, $request = null) {
        
        $result = array();

        $result['total'] = $this->total($table, $properties, $request);

        $sql = sprintf('SELECT %s FROM %s', implode(', ', $properties), $table);

        if (isset($request->filter)) {
            $sql .= $this->filter($properties, $request->filter);
        }

        $sort = $this->mergeSortDescriptors($request);

        if (count($sort) > 0) {
            $sql .= $this->sort($properties, $sort);
        }

        if (isset($request->skip) && isset($request->take)) {
            $sql .= $this->page();
        }

        $statement = $this->pdo->conn_id->prepare($sql);

        if (isset($request->filter)) {
            $this->bindFilterValues($statement, $request->filter);
        }

        if (isset($request->skip) && isset($request->take)) {
            $statement->bindValue(':skip', (int)$request->skip, PDO::PARAM_INT);
            $statement->bindValue(':take', (int)$request->take, PDO::PARAM_INT);
        }

        $statement->execute();

        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (isset($request->group) && count($request->group) > 0) {
            $data = $this->group($data, $request->group, $table, $request, $properties);
            $result['groups'] = $data;
        } else {
            $result['data'] = $data;
        }

        if (isset($request->aggregate)) {
            $result["aggregates"] = $this->calculateAggregates($table, $request->aggregate, $request, $properties);
        }

        return $result;
    }
	
	public function read_with_join_table($table, $properties, $request = null, $join_table, $join_on) {
        
        $result = array();

        $result['total'] = $this->total($table, $properties, $request);

        $sql = sprintf('SELECT %s FROM %s left join %s on %s', implode(', ', $properties), $table, $join_table, $join_on);

        if (isset($request->filter)) {
            $sql .= $this->filter($properties, $request->filter);
        }

        $sort = $this->mergeSortDescriptors($request);

        if (count($sort) > 0) {
            $sql .= $this->sort($properties, $sort);
        }

        if (isset($request->skip) && isset($request->take)) {
            $sql .= $this->page();
        }

        $statement = $this->pdo->conn_id->prepare($sql);

        if (isset($request->filter)) {
            $this->bindFilterValues($statement, $request->filter);
        }

        if (isset($request->skip) && isset($request->take)) {
            $statement->bindValue(':skip', (int)$request->skip, PDO::PARAM_INT);
            $statement->bindValue(':take', (int)$request->take, PDO::PARAM_INT);
        }

        $statement->execute();

        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (isset($request->group) && count($request->group) > 0) {
            $data = $this->group($data, $request->group, $table, $request, $properties);
            $result['groups'] = $data;
        } else {
            $result['data'] = $data;
        }

        if (isset($request->aggregate)) {
            $result["aggregates"] = $this->calculateAggregates($table, $request->aggregate, $request, $properties);
        }

        return $result;
    }
}
    
    
    
    
    
    

