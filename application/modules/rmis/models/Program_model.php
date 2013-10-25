<?php
class Program_model extends MY_Model {
    
	 public $validate = array(
        array(
            'field' => 'research_program_title',            
            'rules' => 'required|trim|xss_clean'),
        array(
            'field' => 'program_area',           
            'rules' => 'required|trim|xss_clean'), 
		array(
            'field' => 'program_division',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'program_researchType',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'program_researchPriority',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'program_researchStatus',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'program_coordinator',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'program_plannedStartDate',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'program_plannedEndDate',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'program_goal',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'program_objective',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'program_expectedOutputs',           
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
	
	public function get_details($id=NULL){
		if($id!=NULL){
			$this->db->select('* , hrm_employees.employee_name as program_coordinator');
			$this->db->from('rmis_program_informations');
			$this->db->join('hrm_employees','rmis_program_informations.program_coordinator=hrm_employees.employee_id');
			$this->db->where('program_id',$id);
			
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