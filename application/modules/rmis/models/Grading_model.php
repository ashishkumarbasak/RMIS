<?php
class Grading_model extends MY_Model {
    
    public $validate = array(
        array(
            'field' => 'grading_title',            
            'rules' => 'required|trim|min_length[2]|xss_clean'),
        array(
            'field' => 'effect_date',           
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
			$this->db->from('rmis_gradings');
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