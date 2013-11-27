<?php
class Program_document_model extends MY_Model {
    
    public $validate = array(
        array(
            'field' => 'document_title',            
            'rules' => 'required|trim|xss_clean'),
       	array(
            'field' => 'sorting_order',            
            'rules' => 'required|trim|xss_clean'),
        array(
            'field' => 'document_name',            
            'rules' => 'required|trim|xss_clean'),
        array(
            'field' => 'document_type',           
            'rules' => 'required|trim|min_length[2]|xss_clean')  //|unique[tm_training_program_types.training_program_type]   
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
			$this->db->select('*, rmis_divisions.id as division_pk');
			$this->db->from('rmis_divisions');
			$this->db->join('hrm_employees','rmis_divisions.division_head=hrm_employees.employee_id','left');
			$this->db->where('rmis_divisions.id',$id);
			
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