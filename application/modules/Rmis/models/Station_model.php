<?php
class Station_model extends MY_Model {
    
    public $validate = array(
        array(
            'field' => 'station_id',            
            'rules' => 'required|trim|xss_clean'),
        array(
            'field' => 'station_name',           
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
		$result = $this->db->get('rmis_regional_stations');
		if ($result->num_rows() > 0){
        	$row = $result->result_array();
        	return 'BARIRS'.str_pad(($row[0]['id']+1), 4, "0", STR_PAD_LEFT);
		}
	}
	
	public function get_details($id=NULL){
		if($id!=NULL){
			$this->db->select('*, rmis_regional_stations.id as regional_stations_pk');
			$this->db->from('rmis_regional_stations');
			$this->db->join('hrm_employees','rmis_regional_stations.station_contact_person=hrm_employees.employee_id','left');
			$this->db->where('rmis_regional_stations.id',$id);
			
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