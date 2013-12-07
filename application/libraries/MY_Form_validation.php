<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use Carbon\Carbon;

class MY_Form_validation extends CI_Form_validation
{

    /**
     * MY_Form_validation::__construct()
     * 
     * @return
     */
    public function __construct()
    {
        parent::__construct();
    }

    // --------------------------------------------------------------------

    public function run($module = '', $group = '')
    {
        (is_object($module)) AND $this->CI = & $module;
        return parent::run($group);
    }

    //--------------------------------------------------------------------

    /**
     * MY_Form_validation::unique()
     * 
     * i.e. '…|required|unique[bf_users.name.id.4]|trim…'
     * 
     * @abstract Rule to force value to be unique in table
     * @usage "unique[tablename.fieldname.(primaryKey-used-for-updates).(uniqueID-used-for-updates)]"
     * @param mixed $value the value to be checked
     * @param mixed $params the table and field to check against, if a second field is passed in this is used as "AND NOT EQUAL"
     * @return bool
     */
    public function unique($value, $params)
    {
        $this->CI->form_validation->set_message('unique', 'The value in &quot;%s&quot; is already being used.');

        // allow for more than 1 parameter
        $fields = explode(",", $params);

        // extract the first parameter
        list($table, $field) = explode(".", $fields[0], 2);

        // setup the db request
        $this->CI->db->select($field)->from($table)
                ->where($field, $value)->limit(1);

        // check if there is a second field passed in
        if (isset($fields[1])) {
            // this field is used to check that it is not the current record
            // eg select * from users where username='test' AND id != 4

            list($where_table, $where_field) = explode(".", $fields[1], 2);

            $where_value = $this->CI->input->post($where_field);
            if (isset($where_value)) {
                // add the extra where condition
                $this->CI->db->where($where_field . ' !=', $this->CI->input->post($where_field));
            }
        }

        // make the db request
        $query = $this->CI->db->get();

        if ($query->row()) {
            return false;
        }
        else {
            return true;
        }
    }

    // --------------------------------------------------------------------

    /**
     * MY_Form_validation::alpha_extra()
     * 
     * @abstract Alpha-numeric with periods, underscores, spaces and dashes
     * @param string $str
     * @return	bool
     */
    public function alpha_extra($str)
    {
        $this->CI->form_validation->set_message('alpha_extra', 'The %s field may only contain alpha-numeric characters, spaces, periods, underscores, and dashes.');
        return (!preg_match("/^([\.\s-a-z0-9_-])+$/i", $str)) ? FALSE : TRUE;
    }

    // --------------------------------------------------------------------

    /*
      Method: matches_pattern()

      Ensures a string matches a basic pattern

      Return:
      bool
     */
    public function matches_pattern($str, $pattern)
    {
        if (preg_match('/^' . $pattern . '$/', $str))
            return TRUE;

        $this->CI->form_validation->set_message('matches_pattern', 'The %s field does not match the required pattern.');
        return FALSE;
    }

    public function remove_sp_char($str)
    {
        $chars = array("&", ":", "*", "<", ">");
        $str = str_replace($chars, "", $str);
        return htmlentities($str, ENT_QUOTES);
    }

    public function non_zero($str)
    {
        $str = (int) $str;
        if (empty($str) || $str == 0) {

            $this->CI->form_validation->set_message('non_zero', 'The %s field is required or non zero.');
            return FALSE;
        }
        return true;
    }

    /**
     * 
     * @param " is_duplicate[table_name,unique_colname,column1.column2.Col...] "
     * @return boolean
     */
    public function is_duplicate($value, $params)
    {
        $this->CI->form_validation->set_message('is_duplicate', 'The value is already exist.');
        // allow for more than 1 parameter
        list($table, $unique_id, $fields) = explode(",", $params);
        $fieldsArr = explode(".", $fields);

        // setup the db request
        $this->CI->db->select('id')->from($table)->limit(1);

        foreach ($fieldsArr as $where_field) {

            $where_value = $this->CI->input->post($where_field);

            if (isset($where_value)) {

                if (preg_match("/_date/i", $where_field)) {
                    $dt = $this->CI->input->post($where_field);
                    list($day, $month, $year) = explode("-", $dt);
                    $dt = $year . '-' . $month . '-' . $day;

                    //$dt = Carbon::createFromFormat('d-m-Y', $dt)->format('Y-m-d');
                    //return false;                    
                    $this->CI->db->where($where_field, $dt);
                }
                else {
                    // add the extra where condition
                    $this->CI->db->where($where_field, $this->CI->input->post($where_field));
                }
            }
        }

        // for update case        
        $unique_val = $this->CI->input->post($unique_id);
        if (!empty($unique_val)) {
            // add the extra where condition           
            $this->CI->db->where($unique_id . ' !=', $unique_val);
        }
        // make the db request
        $query = $this->CI->db->get();

        if ($query->row()) {
            return false;
        }
        else {
            return true;
        }
    }

    /**
     * 
     * @param " date_compare[to_date_field_name.date-format] "
     * @return boolean
     */
    public function date_compare($dt_value, $end_dt)
    {
        if ($dt_value == "" || $this->CI->input->post($end_dt) == "") {
            return;
        }

        // list($end_dt, $format) = explode(".", $end_dt);
//        print_r($format);
//        return false;

        if (empty($format)) {
            $startDT = Carbon::createFromFormat('d-m-Y', $dt_value);
            $endDT = Carbon::createFromFormat('d-m-Y', $this->CI->input->post($end_dt));
        }
        else {
            $startDT = Carbon::createFromFormat($format, $dt_value);
            $endDT = Carbon::createFromFormat($format, $this->CI->input->post($end_dt));
        }

        if ($startDT->gt($endDT)) {
            $this->CI->form_validation->set_message('date_compare', '%s cannot be greater than %s');
            return false;
        }
        return true;
    }

    public function currentdate_compare($dt_value, $format)
    {
        $startDT = Carbon::createFromFormat($format, $dt_value);
        $curentDT = Carbon::createFromFormat('Y-m-d', date('Y-m-d'));
        if ($startDT->gt($curentDT)) {
            $this->CI->form_validation->set_message('currentdate_compare', '%s cannot be greater than Current Date');
            return false;
        }
        return true;
    }

    public function total_installment_check($str)
    {
        $noOfInstallment = (int) $this->CI->input->post('no_of_installment');
        $amount = (int) $this->CI->input->post('amount');
        $sum = 0;
        for ($i = 0; $i < $noOfInstallment; $i++) {
            $ins_amount = (int) $this->CI->input->post('ins_amount_' . $i);
            $sum += $ins_amount;
        }

        if ($sum != $amount) {
            $this->CI->form_validation->set_message('total_installment_check', 'Total installment amount not equal to actual amount.');
            return FALSE;
        }
        else {
            return TRUE;
        }
    }

    public function number_compare($min_value, $max_field)
    {
        $max_value = $this->CI->input->post($max_field);

        if ($min_value > $max_value) {
            $this->CI->form_validation->set_message('number_compare', '%s cannot be greater then %s');
            return false;
        }
        return true;
    }

    // --------------------------------------------------------------------
    
    // PMIS Related validations --------------------------------------------------------------------

    /**
     * Validate date
     * 
     * @param type $value
     * @param type $format
     * @return boolean
     */
    function valid_date($value)
    {
        $this->set_message('valid_date', 'Invalid date. Use dd-mm-yyyy.');
        
        if (preg_match("/([0-9]{1,2})-([0-9]{1,2}-([0-9]{4}))/", $value)) {
            $arr = explode("-", $value);    // splitting the array
            $dd = $arr[0];              // first element is days            
            $mm = $arr[1];              // second element is month
            $yyyy = $arr[2];            // last element of the array is year
            return ( checkdate($mm, $dd, $yyyy) );
        } else {
            return FALSE;
        }
    }
    
    /**
     * Validate date
     * 
     * @param type $value
     * @param type $format
     * @return boolean
     */
    function valid_datetime($value)
    {
        $this->set_message('valid_datetime', 'Invalid datetime. Use dd-mm-yyyy hh:mm.');
        
        if (preg_match("/([0-9]{1,2})-([0-9]{1,2}-([0-9]{4})) ([0-9]{1,2}):([0-9]{1,2})/", $value)) {
            $arr = explode("-", $value);    // splitting the array
            $dd = $arr[0];              // first element is days            
            $mm = $arr[1];              // second element is month
            $yyyy = $arr[2];            // last element of the array is year
            $hr = $arr[3];
            $min = $arr[4];
            
            if(DateTime::createFromFormat('d-m-Y H:s',$value)===false)
                return FALSE;
            else
                return TRUE;
        } else {
            return FALSE;
        }
    }
    
}


/* End of file : ./libraries/MY_Form_validation.php */