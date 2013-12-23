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

	function read_logical_framework_programs(){
		$this->db->select('rmis_logical_framework.id, rmis_program_informations.research_program_title as logical_framework_title, 
							rmis_program_informations.program_initiation_date as logical_framework_initiation_date, 
							rmis_program_informations.program_completion_date as logical_framework_completion_date, 
							rmis_logical_framework.type as logical_framework_type, employee_name as principal_investigator, rmis_logical_framework.program_id as ref_id');
		$this->db->from('rmis_logical_framework');
		$this->db->join('rmis_program_informations', 'rmis_logical_framework.program_id = rmis_program_informations.program_id', 'left');
		$this->db->join('hrm_employees','rmis_program_informations.program_coordinator=hrm_employees.employee_id','left');
		$this->db->where('rmis_logical_framework.type','Program');
			
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return array();
		}
	}
	
	function read_logical_framework_projects(){
		$this->db->select('rmis_logical_framework.id, rmis_project_informations.research_project_title as logical_framework_title, 
							rmis_project_informations.project_initiation_date as logical_framework_initiation_date, 
							rmis_project_informations.project_completion_date as logical_framework_completion_date, 
							rmis_logical_framework.type as logical_framework_type, employee_name as principal_investigator, rmis_logical_framework.project_id as ref_id');
		$this->db->from('rmis_logical_framework');
		$this->db->join('rmis_project_informations', 'rmis_logical_framework.project_id = rmis_project_informations.project_id', 'left');
		$this->db->join('hrm_employees','rmis_project_informations.project_coordinator=hrm_employees.employee_id','left');
		$this->db->where('rmis_logical_framework.type','Project');
			
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return array();
		}
	}
	
	function read_logical_framework_experiments(){
		$this->db->select('rmis_logical_framework.id, rmis_experiment_informations.research_experiment_title as logical_framework_title, 
							rmis_experiment_informations.experiment_initiation_date as logical_framework_initiation_date, 
							rmis_experiment_informations.experiment_completion_date as logical_framework_completion_date, 
							rmis_logical_framework.type as logical_framework_type, employee_name as principal_investigator, rmis_logical_framework.experiment_id as ref_id');
		$this->db->from('rmis_logical_framework');
		$this->db->join('rmis_experiment_informations', 'rmis_logical_framework.experiment_id = rmis_experiment_informations.experiment_id', 'left');
		$this->db->join('hrm_employees','rmis_experiment_informations.experiment_coordinator=hrm_employees.employee_id','left');
		$this->db->where('rmis_logical_framework.type','Experiment');
			
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return array();
		}
	}
    
	function read_technology_release_programs(){
		$this->db->select('rmis_technology_release_informations.id, rmis_technology_release_informations.tech_knowledge_name as tech_release_title, 
							rmis_technology_release_informations.version as tech_release_version, 
							rmis_technology_release_informations.date as tech_release_date, 
							rmis_technology_release_informations.is_relased as tech_release_is_rel, 
							rmis_technology_release_informations.is_transferred as tech_release_is_trnsed,
							rmis_technology_release_informations.type as tech_release_type,
							rmis_technology_release_informations.program_id as ref_id');
		$this->db->from('rmis_technology_release_informations');
		$this->db->join('rmis_program_informations', 'rmis_technology_release_informations.program_id = rmis_program_informations.program_id', 'left');
		$this->db->join('hrm_employees','rmis_program_informations.program_coordinator=hrm_employees.employee_id','left');
		$this->db->where('rmis_technology_release_informations.type','Program');
			
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return array();
		}
	}
	
	function read_technology_release_projects(){
		$this->db->select('rmis_technology_release_informations.id, rmis_technology_release_informations.tech_knowledge_name as tech_release_title, 
							rmis_technology_release_informations.version as tech_release_version, 
							rmis_technology_release_informations.date as tech_release_date, 
							rmis_technology_release_informations.is_relased as tech_release_is_rel, 
							rmis_technology_release_informations.is_transferred as tech_release_is_trnsed,
							rmis_technology_release_informations.type as tech_release_type,
							rmis_technology_release_informations.project_id as ref_id');
		$this->db->from('rmis_technology_release_informations');
		$this->db->join('rmis_project_informations', 'rmis_technology_release_informations.project_id = rmis_project_informations.project_id', 'left');
		$this->db->join('hrm_employees','rmis_project_informations.project_coordinator=hrm_employees.employee_id','left');
		$this->db->where('rmis_technology_release_informations.type','Project');
			
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return array();
		}
	}
	
	function read_technology_release_experiments(){
		$this->db->select('rmis_technology_release_informations.id, rmis_technology_release_informations.tech_knowledge_name as tech_release_title, 
							rmis_technology_release_informations.version as tech_release_version, 
							rmis_technology_release_informations.date as tech_release_date, 
							rmis_technology_release_informations.is_relased as tech_release_is_rel, 
							rmis_technology_release_informations.is_transferred as tech_release_is_trnsed,
							rmis_technology_release_informations.type as tech_release_type,
							rmis_technology_release_informations.project_id as ref_id');
		$this->db->from('rmis_technology_release_informations');
		$this->db->join('rmis_experiment_informations', 'rmis_technology_release_informations.experiment_id = rmis_experiment_informations.experiment_id', 'left');
		$this->db->join('hrm_employees','rmis_experiment_informations.experiment_coordinator=hrm_employees.employee_id','left');
		$this->db->where('rmis_technology_release_informations.type','Experiment');
			
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return array();
		}
	}

	function get_technology_release($id=NULL){
		if($id!=NULL){
			$this->db->select('*');
			$this->db->from('rmis_technology_release_informations');
			$this->db->where('rmis_technology_release_informations.id',$id);
			
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
	
	function read_closing_informations_programs(){
		$this->db->select('	rmis_closing_informations.id, 
							rmis_program_informations.research_program_title as title, 
							rmis_closing_informations.actual_output as actual_output,
							rmis_closing_informations.type as type,
							employee_name as principal_investigator,
							rmis_closing_informations.program_id as ref_id');
		$this->db->from('rmis_closing_informations');
		$this->db->join('rmis_program_informations', 'rmis_closing_informations.program_id = rmis_program_informations.program_id', 'left');
		$this->db->join('hrm_employees','rmis_program_informations.program_coordinator=hrm_employees.employee_id','left');
		$this->db->where('rmis_closing_informations.type','Program');
			
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return array();
		}
	}
	
	function read_closing_informations_projects(){
		$this->db->select('	rmis_closing_informations.id, 
							rmis_project_informations.research_project_title as title, 
							rmis_closing_informations.actual_output as actual_output,
							rmis_closing_informations.type as type,
							employee_name as principal_investigator,
							rmis_closing_informations.project_id as ref_id');
		$this->db->from('rmis_closing_informations');
		$this->db->join('rmis_project_informations', 'rmis_closing_informations.project_id = rmis_project_informations.project_id', 'left');
		$this->db->join('hrm_employees','rmis_project_informations.project_coordinator=hrm_employees.employee_id','left');
		$this->db->where('rmis_closing_informations.type','Project');
			
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return array();
		}
	}
}
?>