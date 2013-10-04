<?php
class Employee_model extends MY_Model {
    
    public function __construct(){
        parent::__construct();      
    }
	
	public function get_employees(){
		$query = $this->db->get('hrm_employees');
		if ($query->num_rows() > 0){
        	return $query->result();
		}else{
			return NULL;
		}
	}
    
}
?>