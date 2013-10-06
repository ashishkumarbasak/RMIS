<?php
class Program_model extends MY_Model {
    
	 public $validate = array(
        array(
            'field' => 'title_of_research_program',            
            'rules' => 'required|trim|xss_clean'),
        array(
            'field' => 'programme_area',           
            'rules' => 'required|trim|xss_clean'), 
		array(
            'field' => 'division_or_unit_name',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'research_priority',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'research_type',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'research_status',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'program_manager',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'planned_start_date',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'planned_end_date',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'program_goal',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'purpose_or_objective',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'expected_output',           
            'rules' => 'required|trim|xss_clean')
    );
		   
    public function __construct()
    {
        parent::__construct();      
    }
	
	public function isValidate($data)
    {
        $this->validate($data);           
    }
	
	function insert_program_information($data)
	{
		$this->db->set('program_id','');
		$this->db->set('title_of_research_program',$data['title_of_research_program']);
		$this->db->set('is_collaborate',$data['is_collaborate']);
		$this->db->set('program_area',$data['programme_area']);
		$this->db->set('regional_station_name',$data['regional_station_name']);
		$this->db->set('division_or_unit_name',$data['division_or_unit_name']);
		$this->db->set('department_name',$data['department_name']);
		$this->db->set('implementation_location',$data['implementation_location']);
		$this->db->set('keyword',$data['keyword']);
		$this->db->set('research_priority',$data['research_priority']);
		$this->db->set('research_type',$data['research_type']);
		$this->db->set('research_status',$data['research_status']);		
		$this->db->set('program_manager',$data['program_manager']);
		$this->db->set('designation',$data['designation']);
		$this->db->set('planned_start_date',$data['planned_start_date']);
		$this->db->set('planned_end_date',$data['planned_end_date']);
		$this->db->set('initiation_date',$data['initiation_date']);		
		$this->db->set('completion_date',$data['completion_date']);
		$this->db->set('planned_budget',$data['planned_budget']);
		$this->db->set('approved_budget',$data['approved_budget']);
		$this->db->set('program_goal',$data['program_goal']);
		$this->db->set('purpose_or_objective',$data['purpose_or_objective']);			
		//$this->db->set('created_by', $this->session->userdata('session_user_email'));
		$this->db->set('created_by',1);
		$this->db->set('created_at',date("Y-m-d H:m:s"));
		$this->db->set('modified_by',1);
		$this->db->set('modified_at',date("0000-00-00 00:00:00"));
		
		$this->db->insert('rmis_program_information');
		return $this->db->insert_id();
	}
	
	function insert_institute_name($data)
	{
		$this->db->insert('rmis_program_collaborate_institute_name', $data);	
	}
	
	function insert_commodity($data)
	{
		$this->db->insert('rmis_program_commodity', $data);	
	}
	
	function insert_aez($data)
	{
		$this->db->insert('rmis_program_aez', $data);	
	}
	
	function insert_expected_output($data)
	{
		$this->db->insert('rmis_program_expected_output', $data);	
	}
	    
    public function get_program_area(){
		$query = $this->db->get('rmis_program_areas');
		if ($query->num_rows() > 0){
        	return $query->result();
		}else{
			return NULL;
		}
	}
	
	public function get_division_or_unit(){
		$query = $this->db->get('rmis_divisions');
		if ($query->num_rows() > 0){
        	return $query->result();
		}else{
			return NULL;
		}
	}
	
	public function get_department_name(){
		$query = $this->db->get('rmis_divisions');
		if ($query->num_rows() > 0){
        	return $query->result();
		}else{
			return NULL;
		}
	}
	
	public function get_regional_station_name(){
		$query = $this->db->get('rmis_regional_stations');
		if ($query->num_rows() > 0){
        	return $query->result();
		}else{
			return NULL;
		}
	}
	
	public function get_implementation_location(){
		$query = $this->db->get('rmis_implementation_sites');
		if ($query->num_rows() > 0){
        	return $query->result();
		}else{
			return NULL;
		}
	}
	
	public function get_institute_name(){
		$query = $this->db->get('rmis_institute_name');
		if ($query->num_rows() > 0){
        	return $query->result();
		}else{
			return NULL;
		}
	}
	
	public function get_program_details($program_id=NULL){
		if($program_id!=NULL){
			$this->db->select('*');
			$this->db->from('rmis_program_information');
			$this->db->where('program_id',$program_id);
			
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
	
	public function get_institute_id_from_program_id($program_id=NULL){
		if($program_id!=NULL){
			$this->db->select('*');
			$this->db->from('rmis_program_collaborate_institute_name');
			$this->db->where('program_id',$program_id);
			
			$query = $this->db->get();
			if($query->num_rows() > 0){
				return $query->result();
			}else{
				return NULL;
			}
		}else{
			return NULL;	
		}
	}
	
	public function get_commodity_from_program_id($program_id=NULL){
		if($program_id!=NULL){
			$this->db->select('*');
			$this->db->from('rmis_program_commodity');
			$this->db->where('program_id',$program_id);
			
			$query = $this->db->get();
			if($query->num_rows() > 0){
				return $query->result();
			}else{
				return NULL;
			}
		}else{
			return NULL;	
		}
	}
	
	public function get_aez_from_program_id($program_id=NULL){
		if($program_id!=NULL){
			$this->db->select('*');
			$this->db->from('rmis_program_aez');
			$this->db->where('program_id',$program_id);
			
			$query = $this->db->get();
			if($query->num_rows() > 0){
				return $query->result();
			}else{
				return NULL;
			}
		}else{
			return NULL;	
		}
	}
	
	public function get_expected_output_from_program_id($program_id=NULL){
		if($program_id!=NULL){
			$this->db->select('*');
			$this->db->from('rmis_program_expected_output');
			$this->db->where('program_id',$program_id);
			
			$query = $this->db->get();
			if($query->num_rows() > 0){
				return $query->result();
			}else{
				return NULL;
			}
		}else{
			return NULL;	
		}
	}
    
}
?>