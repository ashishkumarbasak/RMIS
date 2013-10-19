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
			$this->db->select('*, rmis_program_me_committees.id as committee_id ');
			$this->db->from('rmis_program_me_committees');
			$this->db->join('hrm_employees','rmis_program_me_committees.committee_chairman=hrm_employees.employee_id','left');
			$this->db->where('rmis_program_me_committees.id',$id);
			
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
	
	public function get_members($id=NULL){
		if($id!=NULL){
			$this->db->select('*');
			$this->db->from('rmis_program_me_committee_members');
			$this->db->join('hrm_employees','rmis_program_me_committee_members.member_id=hrm_employees.employee_id','left');
			$this->db->where('rmis_program_me_committee_members.committee_id',$id);
			
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
	
	public function deleteMember($committee_id=NULL, $member_id=NULL){
		if($committee_id!=NULL && $member_id!=NULL){
			$this->db->where('committee_id',$committee_id);
			$this->db->where('member_id',$member_id);
			
			$this->db->delete('rmis_program_me_committee_members');
		}
	}

	public function clean_committeeMembers($committee_id=NULL){
		if($committee_id!=NULL){
			$this->db->where('committee_id',$committee_id);
			$this->db->delete('rmis_program_me_committee_members');
		}
	}	
}
?>