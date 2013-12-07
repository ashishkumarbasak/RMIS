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
	
	public function search_employee($options = array()){               
    	$this->db->select("employee_name, employee_id, designation_name, email, pre_mobile_no");
		$this->db->from("hrm_employees");
		$this->db->join('hrm_designations','hrm_employees.designation_id=hrm_designations.id','left');
        $this->db->like('employee_name', $options['keyword'], 'after');
        $query = $this->db->get();
        return $query->result();
    }
	
	function get_closing_information($id=NULL){
		if($id!=NULL){
			$this->db->select('*');
			$this->db->from('rmis_closing_informations');
			$this->db->where('rmis_closing_informations.id',$id);
			
			$query = $this->db->get();
			if($query->num_rows() > 0){
				$result = $query->result();
				return $result[0];
			}else{
				return NULL;
			}
		}else{
			return NULL;	
		}
	}
	
	function get_logical_frameworkrmation($id=NULL){
		if($id!=NULL){
			$this->db->select('*');
			$this->db->from('rmis_logical_framework');
			$this->db->where('rmis_logical_framework.id',$id);
			
			$query = $this->db->get();
			if($query->num_rows() > 0){
				$result = $query->result();
				return $result[0];
			}else{
				return NULL;
			}
		}else{
			return NULL;	
		}
	}
    
}
?>