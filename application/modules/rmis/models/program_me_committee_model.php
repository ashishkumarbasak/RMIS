<?php
class program_me_committee_model extends MY_Model {
    
    public $validate = array(
        array(
            'field' => 'committee_chairman',            
            'rules' => 'required|trim|xss_clean'),
        array(
            'field' => 'committee_formation_date',           
            'rules' => 'required|trim|min_length[10]|xss_clean')  //|unique[tm_training_program_types.training_program_type]   
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
			$this->db->select('*');
			$this->db->from('rmis_program_me_committees');
			$this->db->where('id',$id);
			
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