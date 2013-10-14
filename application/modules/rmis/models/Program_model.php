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
		$this->db->set('planned_start_date',date("Y-m-d", strtotime($data['planned_start_date'])));
		$this->db->set('planned_end_date',date("Y-m-d", strtotime($data['planned_end_date'])));
		$this->db->set('initiation_date',date("Y-m-d", strtotime($data['initiation_date'])));		
		$this->db->set('completion_date',date("Y-m-d", strtotime($data['completion_date'])));
		$this->db->set('planned_budget',$data['planned_budget']);
		$this->db->set('approved_budget',$data['approved_budget']);
		$this->db->set('program_goal',$data['program_goal']);
		$this->db->set('purpose_or_objective',$data['purpose_or_objective']);			
		//$this->db->set('created_by', $this->session->userdata('session_user_email'));
		$this->db->set('created_by',1);
		$this->db->set('created_at',date("Y-m-d H:m:s"));
		$this->db->set('modified_by','');
		$this->db->set('modified_at',date("0000-00-00 00:00:00"));
		
		$this->db->insert('rmis_program_information');
		return $this->db->insert_id();
	}
	
	function update_program_information($data, $program_id)
	{
		$data = array(
			'title_of_research_program'=>$data['title_of_research_program'],
			'is_collaborate'=>$data['is_collaborate'],
			'program_area'=>$data['programme_area'],
			'regional_station_name'=>$data['regional_station_name'],
			'division_or_unit_name'=>$data['division_or_unit_name'],
			'department_name'=>$data['department_name'],
			'implementation_location'=>$data['implementation_location'],
			'keyword'=>$data['keyword'],
			'research_priority'=>$data['research_priority'],
			'research_type'=>$data['research_type'],
			'research_status'=>$data['research_status'],		
			'program_manager'=>$data['program_manager'],
			'designation'=>$data['designation'],
			'planned_start_date'=>date("Y-m-d", strtotime($data['planned_start_date'])),
			'planned_end_date'=>date("Y-m-d", strtotime($data['planned_end_date'])),
			'initiation_date'=>date("Y-m-d", strtotime($data['initiation_date'])),		
			'completion_date'=>date("Y-m-d", strtotime($data['completion_date'])),
			'planned_budget'=>$data['planned_budget'],
			'approved_budget'=>$data['approved_budget'],
			'program_goal'=>$data['program_goal'],
			'purpose_or_objective'=>$data['purpose_or_objective'],
			'modified_by'=>1,
			'modified_at'=>date("Y-m-d H:m:s")
		);
		$this->db->where('program_id', $program_id);
		$this->db->update('rmis_program_information', $data);
	}
	
	/*public function get_program_information_from_program_id($program_id=NULL)
    {
		if($program_id!=NULL)
		{			
			$this->db->select('*');
			$this->db->from('rmis_program_information');
			$this->db->where('program_id', $program_id);
			
			$query=$this->db->get();
			if($query->num_rows() > 0)
				return $query->result();
			else
				return false;				
		}
	}*/
	
	public function delete_program_information($program_id=NULL)
    {
		if($program_id!=NULL)
		{
			$this->db->where('program_id', $program_id);
			$this->db->delete('rmis_program_information');		
		}
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
		$query = $this->db->get('hrm_employees');
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
	
	public function get_research_priority(){
		$query = $this->db->get('rmis_research_priority');
		if ($query->num_rows() > 0){
        	return $query->result();
		}else{
			return NULL;
		}
	}
	
	public function get_research_status(){
		$query = $this->db->get('rmis_research_status');
		if ($query->num_rows() > 0){
        	return $query->result();
		}else{
			return NULL;
		}
	}
	
	public function get_research_type(){
		$query = $this->db->get('rmis_research_type');
		if ($query->num_rows() > 0){
        	return $query->result();
		}else{
			return NULL;
		}
	}
	
	public function get_commodity(){
		$query = $this->db->get('rmis_commodity');
		if ($query->num_rows() > 0){
        	return $query->result();
		}else{
			return NULL;
		}
	}
	
	public function get_aez(){
		$query = $this->db->get('rmis_aez');
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
	
	public function get_program_area_from_program_id($program_id=NULL){
		if($program_id!=NULL){
			$this->db->select('id, program_id, program_area_name');
			$this->db->from('rmis_program_areas');
			$this->db->join('rmis_program_information', 'rmis_program_information.program_area = rmis_program_areas.id');
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
			$this->db->select('id, IN.program_id AS program_id, institute_id');
			$this->db->from('rmis_program_collaborate_institute_name AS IN');
			$this->db->join('rmis_program_information', 'rmis_program_information.program_id = IN.program_id');
			$this->db->where('IN.program_id',$program_id);
			
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
			$this->db->select('id, rmis_program_commodity.program_id AS program_id, commodity_id');
			$this->db->from('rmis_program_commodity');
			$this->db->join('rmis_program_information', 'rmis_program_information.program_id = rmis_program_commodity.program_id');
			$this->db->where('rmis_program_commodity.program_id',$program_id);
			
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
			$this->db->select('id, rmis_program_aez.program_id AS program_id, aez_id');
			$this->db->from('rmis_program_aez');
			$this->db->join('rmis_program_information', 'rmis_program_information.program_id = rmis_program_aez.program_id');
			$this->db->where('rmis_program_aez.program_id',$program_id);
			
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
			$this->db->select('id, rmis_program_expected_output.program_id AS program_id, expected_output');
			$this->db->from('rmis_program_expected_output');
			$this->db->join('rmis_program_information', 'rmis_program_information.program_id = rmis_program_expected_output.program_id');
			$this->db->where('rmis_program_expected_output.program_id',$program_id);
			
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
	
	public function delete_program_collaborated_institute_name($program_id=NULL)
    {
		if($program_id!=NULL)
		{
			$this->db->where('program_id', $program_id);
			$this->db->delete('rmis_program_collaborate_institute_name');		
		}
	}
	
	public function delete_commodity_from_program_id($program_id=NULL)
    {
		if($program_id!=NULL)
		{
			$this->db->where('program_id', $program_id);
			$this->db->delete('rmis_program_commodity');		
		}
	}
	
	public function delete_aez_from_program_id($program_id=NULL)
    {
		if($program_id!=NULL)
		{
			$this->db->where('program_id', $program_id);
			$this->db->delete('rmis_program_aez');		
		}
	}
	
	public function delete_expected_output_from_program_id($program_id=NULL)
    {
		if($program_id!=NULL)
		{
			$this->db->where('program_id', $program_id);
			$this->db->delete('rmis_program_expected_output');		
		}
	}
	
	/******************** Program other Information*************************/
	
	public function get_program_other_information($program_id=NULL){
		if($program_id!=NULL){
			$this->db->select('*');
			$this->db->from('rmis_program_other_information');
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
	
	function insert_program_other_information($data)
	{
		$this->db->set('program_id',$data['program_id']);
		$this->db->set('program_other_info_rational',$data['program_other_info_rational']);
		$this->db->set('program_other_info_methodology',$data['program_other_info_methodology']);
		$this->db->set('program_other_info_background',$data['program_other_info_background']);
		$this->db->set('program_other_info_impact',$data['program_other_info_impact']);
		$this->db->set('program_other_info_environmental',$data['program_other_info_environmental']);
		$this->db->set('program_other_info_beneficiary',$data['program_other_info_beneficiary']);
		$this->db->set('program_other_info_reference',$data['program_other_info_reference']);
		$this->db->set('program_other_info_affiliation',$data['program_other_info_affiliation']);
		$this->db->set('program_other_info_organization_policy',$data['program_other_info_organization_policy']);
		$this->db->set('program_other_info_risk',$data['program_other_info_risk']);
		/*$this->db->set('created_by',1);
		$this->db->set('created_at',date("Y-m-d H:m:s"));
		$this->db->set('modified_by','');
		$this->db->set('modified_at',date("0000-00-00 00:00:00"));*/
		
		$this->db->insert('rmis_program_other_information');
		return $this->db->insert_id();
	}
	
	function update_program_other_information($data, $program_id)
	{
		$data = array(
			'program_other_info_rational'=>$data['program_other_info_rational'],
			'program_other_info_methodology'=>$data['program_other_info_methodology'],
			'program_other_info_background'=>$data['program_other_info_background'],
			'program_other_info_impact'=>$data['program_other_info_impact'],
			'program_other_info_environmental'=>$data['program_other_info_environmental'],
			'program_other_info_beneficiary'=>$data['program_other_info_beneficiary'],
			'program_other_info_reference'=>$data['program_other_info_reference'],
			'program_other_info_affiliation'=>$data['program_other_info_affiliation'],
			'program_other_info_organization_policy'=>$data['program_other_info_organization_policy'],
			'program_other_info_risk'=>$data['program_other_info_risk']
			/*'purpose_or_objective'=>$data['purpose_or_objective'],
			'modified_by'=>1,
			'modified_at'=>date("Y-m-d H:m:s")*/
		);
		$this->db->where('program_id', $program_id);
		$this->db->update('rmis_program_other_information', $data);
	}
	
	public function delete_other_program_information($program_id=NULL)
    {
		if($program_id!=NULL)
		{
			$this->db->where('program_id', $program_id);
			$this->db->delete('rmis_program_other_information');		
		}
	}
	
	/******************** employee autocomplete *************************/
	
	public function get_employee_name_auto_complete($options = array())
	{		
		$this->db->select("CONCAT(employee_name, ', ', designation_id) AS employee_name", FALSE);
		$this->db->like('employee_name', $options['keyword'], 'after');
		$query = $this->db->get('hrm_employees');
		return $query->result();
	}
	
    
}
?>