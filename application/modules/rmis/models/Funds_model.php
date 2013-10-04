<?php
class Funds_model extends MY_Model {
    
    public $validate = array(
        array(
            'field' => 'fund_type',            
            'rules' => 'required|trim|xss_clean'),
        array(
            'field' => 'source_fund',           
            'rules' => 'required|trim|min_length[3]|xss_clean')  //|unique[tm_training_program_types.training_program_type]   
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