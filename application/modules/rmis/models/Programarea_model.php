<?php
class Programarea_model extends MY_Model {
    
    public $validate = array(
        array(
            'field' => 'program_area_id',            
            'rules' => 'required|trim|xss_clean'),
        array(
            'field' => 'program_area_name',           
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
	
	public function get_new_id(){
		$this->db->select_max('id');
		$result = $this->db->get('rmis_program_areas');
		if ($result->num_rows() > 0){
        	$row = $result->result_array();
        	return 'BARIPA'.str_pad(($row[0]['id']+1), 4, "0", STR_PAD_LEFT);
		}
	}
    
}
