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
	
	public function get_grade_point_informations($grading_id=NULL){
		if($grading_id!=NULL){
			$this->db->select('*');
			$this->db->from('rmis_grade_point_informations');
			$this->db->where('grading_id',$grading_id);
			
			$query = $this->db->get();
			if($query->num_rows() > 0){
				$result = $query->result();
				return $result;
			}else{
				return NULL;
			}
		}else{
			return NULL;	
		}
	}
	
	function deleteGradePointInformation($grade_point_id=NULL){
		if($grade_point_id!=NULL){
			$this->db->where('id',$grade_point_id);
			$this->db->delete('rmis_grade_point_informations');
		}
	}
	
	function clean_gradePointInformation($grading_id=NULL){
		if($grading_id!=NULL){
			$this->db->where('grading_id',$grading_id);
			$this->db->delete('rmis_grade_point_informations');
		}
	}	
}
?>