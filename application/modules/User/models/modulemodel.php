<?php

class ModuleModel extends MY_Model
{
    public $validate = array(
        array(
            'field' => 'module_name',           
            'rules' => 'required|trim|min_length[3]|xss_clean|unique[modules.module_name,modules.id]'),
        array(
            'field' => 'short_name',            
            'rules' => 'required|trim|xss_clean'),
        array(
            'field' => 'notes',            
            'rules' => 'trim|xss_clean')        
        );

    public function __construct()
    {
        parent::__construct();      
    }
    
    public function isValidate($data)
    {
        $this->validate($data);           
    }

}