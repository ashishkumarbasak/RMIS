<?php

class RoleModel extends MY_Model
{

    public $_table = 'groups';
    public $validate = array(
        array(
            'field' => 'name',
            'rules' => 'required|trim|min_length[3]|xss_clean|unique[groups.name,groups.id]'),
        array(
            'field' => 'description',
            'rules' => 'trim|xss_clean'),
    );

    public function __construct()
    {
        parent::__construct();
    }

    public function isValidate($data)
    {
        $this->validate($data);
    }

    public function getPermissionModule()
    {
        return $this->db->select('module')
                        ->distinct()
                        ->get('permissions')
                        ->result_array();
    }

    public function getAllPermissionOptions($module)
    {
        $sql = "SELECT * FROM permissions
                WHERE module = ?
                ORDER BY module ASC, weight ASC";
        return $this->db->query($sql, array($module))
                    ->result_array();         
    }
    
    

}