<?php

class UserModel extends MY_Model
{
    public $_table = 'users';
    public $validate = array(
        array(
            'field' => 'login_id',
            'label' => 'Login ID',
            'rules' => 'trim|required|min_length[2]|max_length[40]|unique[users.email,users.id]|xss_clean'),
        array(
            'field' => 'email',
            'label' => 'e-mail',
            'rules' => 'required|valid_email|unique[users.official_email,users.id]|xss_clean'),
        array(
            'field' => 'isactive',
            'label' => 'status',
            'rules' => 'required|trim|integer|xss_clean'),
        array(
            'field' => 'employeeid',
            'label' => 'employee id',
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
    
    public function getUserAssignedRole($userId)
    {
        $sql = "SELECT group_id FROM users_groups
                WHERE user_id = ?
                ORDER BY group_id ASC";
        return $this->db->query($sql, array($userId))
                    ->result_array();         
    }

}