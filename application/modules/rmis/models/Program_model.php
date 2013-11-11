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
            'field' => 'program_research_type',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'program_research_priority',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'program_research_status',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'program_coordinator',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'program_planned_start_date',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'program_planned_end_date',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'program_goal',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'program_objective',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'program_expected_outputs',           
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
			$this->db->join('hrm_employees','rmis_program_informations.program_coordinator=hrm_employees.employee_id','left');
			
			$this->db->where('rmis_program_informations.program_id',$id);
			
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
	
	public function get_other_details($id=NULL){
		if($id!=NULL){
			$this->db->select('* , hrm_employees.employee_name as program_coordinator, rmis_program_other_informations.id as other_information_id');
			$this->db->from('rmis_program_informations');
			$this->db->join('rmis_program_other_informations','rmis_program_informations.program_id=rmis_program_other_informations.program_id','left');
			$this->db->join('hrm_employees','rmis_program_informations.program_coordinator=hrm_employees.employee_id','left');
			
			$this->db->where('rmis_program_informations.program_id',$id);
			
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
	
	function get_department(){
		$this->db->select('id, organization_id, organogram_name');
		$this->db->from('hrm_organograms');
		$this->db->where('hrm_organograms.organogram_type','Department');
		
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->result();
			return $result;
		}else{
			return NULL;
		}
	}
	
	function get_fundSources($id=NULL){
		if($id!=NULL){
			$this->db->select('*');
			$this->db->from('rmis_program_funding_sources');
			$this->db->where('rmis_program_funding_sources.program_id',$id);
			
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

	function get_costEstimation($id=NULL){
		if($id!=NULL){
			$this->db->select('*');
			$this->db->from('rmis_program_cost_estimations');
			$this->db->where('rmis_program_cost_estimations.program_id',$id);
			
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

	function get_costBreakdowns($id=NULL){
		if($id!=NULL){
			$this->db->select('*');
			$this->db->from('rmis_program_cost_breakdowns');
			$this->db->where('rmis_program_cost_breakdowns.program_id',$id);
			
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

	function get_researchTeam($id=NULL){
		if($id!=NULL){
			$this->db->select('*');
			$this->db->from('rmis_program_research_teams');
			$this->db->where('rmis_program_research_teams.program_id',$id);
			
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

	function get_researchTeamMembers($id=NULL){
		if($id!=NULL){
			$this->db->select('*');
			$this->db->from('rmis_program_research_team_members');
			$this->db->where('rmis_program_research_team_members.program_id',$id);
			
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

	function get_steeringCommittee($id=NULL){
		if($id!=NULL){
			$this->db->select('*');
			$this->db->from('rmis_program_steering_committees');
			$this->db->where('rmis_program_steering_committees.program_id',$id);
			
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

	function get_steeringCommitteeTeamMembers($id=NULL){
		if($id!=NULL){
			$this->db->select('*');
			$this->db->from('rmis_program_steering_committee_members');
			$this->db->where('rmis_program_steering_committee_members.program_id',$id);
			
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
	
	function get_implementationCommittee($id=NULL){
		if($id!=NULL){
			$this->db->select('*');
			$this->db->from('rmis_program_implementation_committees');
			$this->db->where('rmis_program_implementation_committees.program_id',$id);
			
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

	function get_implementationCommitteeTeamMembers($id=NULL){
		if($id!=NULL){
			$this->db->select('*');
			$this->db->from('rmis_program_implementation_committee_members');
			$this->db->where('rmis_program_implementation_committee_members.program_id',$id);
			
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
	
	function deleteFundSourceFromProgram($fundSource_id=NULL,$program_id=NULL){
		if($fundSource_id!=NULL && $program_id!=NULL){
			$this->db->where('id',$fundSource_id);
			$this->db->where('program_id',$program_id);
			$this->db->delete('rmis_program_funding_sources');
		}
	}

	function clean_programFundSources($program_id=NULL){
		if($program_id!=NULL){
			$this->db->where('program_id',$program_id);
			$this->db->delete('rmis_program_funding_sources');
		}
	}
	
	function clean_programCostBreakDown($program_id=NULL){
		if($program_id!=NULL){
			$this->db->where('program_id',$program_id);
			$this->db->delete('rmis_program_cost_breakdowns');
		}
	}

	function deleteCostBreakDownFromProgram($cbitem_id=NULL,$program_id=NULL){
		if($cbitem_id!=NULL && $program_id!=NULL){
			$this->db->where('id',$cbitem_id);
			$this->db->where('program_id',$program_id);
			$this->db->delete('rmis_program_cost_breakdowns');
		}
	}
	
	function deleteResearchTeamMemberFromProgram($team_member_id=NULL,$program_id=NULL){
		if($team_member_id!=NULL && $program_id!=NULL){
			$this->db->where('id',$team_member_id);
			$this->db->where('program_id',$program_id);
			$this->db->delete('rmis_program_research_team_members');
		}
	}
	
	function clean_programResearchTeamMembers($program_id=NULL){
		if($program_id!=NULL){
			$this->db->where('program_id',$program_id);
			$this->db->delete('rmis_program_research_team_members');
		}
	}
	
	function deleteSteeringCommitteeTeamMemberFromProgram($team_member_id=NULL,$program_id=NULL){
		if($team_member_id!=NULL && $program_id!=NULL){
			$this->db->where('id',$team_member_id);
			$this->db->where('program_id',$program_id);
			$this->db->delete('rmis_program_steering_committee_members');
		}
	}
	
	function clean_programSteeringCommitteeMembers($program_id=NULL){
		if($program_id!=NULL){
			$this->db->where('program_id',$program_id);
			$this->db->delete('rmis_program_steering_committee_members');
		}
	}
	
	function deleteImplementationCommitteeMemberFromProgram($team_member_id=NULL,$program_id=NULL){
		if($team_member_id!=NULL && $program_id!=NULL){
			$this->db->where('id',$team_member_id);
			$this->db->where('program_id',$program_id);
			$this->db->delete('rmis_program_implementation_committee_members');
		}
	}
	
	function clean_programImplCommitteeMembers($program_id=NULL){
		if($program_id!=NULL){
			$this->db->where('program_id',$program_id);
			$this->db->delete('rmis_program_implementation_committee_members');
		}
	}
	
	function clean_programActivityLists($program_id=NULL){
		if($program_id!=NULL){
			$this->db->where('program_id',$program_id);
			$this->db->delete('rmis_program_activities');
		}
	}
	
	function get_activityLists($id=NULL){
		if($id!=NULL){
			$this->db->select('*');
			$this->db->from('rmis_program_activities');
			$this->db->where('rmis_program_activities.program_id',$id);
			
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
	
	function deleteActivityFromProgram($activity_id=NULL,$program_id=NULL){
		if($activity_id!=NULL && $program_id!=NULL){
			$this->db->where('id',$activity_id);
			$this->db->where('program_id',$program_id);
			$this->db->delete('rmis_program_activities');
		}
	}

	function delete($id=NULL){
		//Truncate `rmis_program_informations`;
		//Truncate `rmis_program_other_informations`;
		//Truncate `rmis_program_funding_sources`;
		//Truncate `rmis_program_cost_estimations`; 
		//Truncate `rmis_program_cost_breakdowns`;
		//Truncate `rmis_program_research_teams`;
		//Truncate `rmis_program_research_team_members`;
		//Truncate `rmis_program_steering_committees`;
		//Truncate `rmis_program_steering_committee_members`;
		//Truncate `rmis_program_implementation_committees`;
		//Truncate `rmis_program_implementation_committee_members`;
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