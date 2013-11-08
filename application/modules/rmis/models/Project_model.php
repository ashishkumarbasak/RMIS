<?php
class Project_model extends MY_Model {
    
	 public $validate = array(
        array(
            'field' => 'research_project_title',            
            'rules' => 'required|trim|xss_clean'), 
		array(
            'field' => 'project_division',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'project_researchType',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'project_researchPriority',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'project_researchStatus',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'project_coordinator',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'project_plannedStartDate',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'project_plannedEndDate',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'project_goal',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'project_objective',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'project_expectedOutputs',           
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
			$this->db->select('* , hrm_employees.employee_name as project_coordinator, rmis_project_other_informations.id as other_information_id');
			$this->db->from('rmis_project_informations');
			$this->db->join('rmis_project_other_informations','rmis_project_informations.project_id=rmis_project_other_informations.project_id','left');
			$this->db->join('hrm_employees','rmis_project_informations.project_coordinator=hrm_employees.employee_id','left');
			
			$this->db->where('rmis_project_informations.project_id',$id);
			
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
	
	function get_fundSources($id=NULL){
		if($id!=NULL){
			$this->db->select('*');
			$this->db->from('rmis_project_funding_sources');
			$this->db->where('rmis_project_funding_sources.project_id',$id);
			
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
			$this->db->from('rmis_project_cost_estimations');
			$this->db->where('rmis_project_cost_estimations.project_id',$id);
			
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
			$this->db->from('rmis_project_cost_breakdowns');
			$this->db->where('rmis_project_cost_breakdowns.project_id',$id);
			
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
			$this->db->from('rmis_project_research_teams');
			$this->db->where('rmis_project_research_teams.project_id',$id);
			
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
			$this->db->from('rmis_project_research_team_members');
			$this->db->where('rmis_project_research_team_members.project_id',$id);
			
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
			$this->db->from('rmis_project_steering_committees');
			$this->db->where('rmis_project_steering_committees.project_id',$id);
			
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
			$this->db->from('rmis_project_steering_committee_members');
			$this->db->where('rmis_project_steering_committee_members.project_id',$id);
			
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
			$this->db->from('rmis_project_implementation_committees');
			$this->db->where('rmis_project_implementation_committees.project_id',$id);
			
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
			$this->db->from('rmis_project_implementation_committee_members');
			$this->db->where('rmis_project_implementation_committee_members.project_id',$id);
			
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
	
	function deleteFundSourceFromProject($fundSource_id=NULL,$project_id=NULL){
		if($fundSource_id!=NULL && $project_id!=NULL){
			$this->db->where('id',$fundSource_id);
			$this->db->where('project_id',$project_id);
			$this->db->delete('rmis_project_funding_sources');
		}
	}

	function clean_projectFundSources($project_id=NULL){
		if($project_id!=NULL){
			$this->db->where('project_id',$project_id);
			$this->db->delete('rmis_project_funding_sources');
		}
	}
	
	function clean_projectCostBreakDown($project_id=NULL){
		if($project_id!=NULL){
			$this->db->where('project_id',$project_id);
			$this->db->delete('rmis_project_cost_breakdowns');
		}
	}

	function deleteCostBreakDownFromProject($cbitem_id=NULL,$project_id=NULL){
		if($cbitem_id!=NULL && $project_id!=NULL){
			$this->db->where('id',$cbitem_id);
			$this->db->where('project_id',$project_id);
			$this->db->delete('rmis_project_cost_breakdowns');
		}
	}
	
	function deleteResearchTeamMemberFromProject($team_member_id=NULL,$project_id=NULL){
		if($team_member_id!=NULL && $project_id!=NULL){
			$this->db->where('id',$team_member_id);
			$this->db->where('project_id',$project_id);
			$this->db->delete('rmis_project_research_team_members');
		}
	}
	
	function clean_projectResearchTeamMembers($project_id=NULL){
		if($project_id!=NULL){
			$this->db->where('project_id',$project_id);
			$this->db->delete('rmis_project_research_team_members');
		}
	}
	
	function deleteSteeringCommitteeTeamMemberFromProject($team_member_id=NULL,$project_id=NULL){
		if($team_member_id!=NULL && $project_id!=NULL){
			$this->db->where('id',$team_member_id);
			$this->db->where('project_id',$project_id);
			$this->db->delete('rmis_project_steering_committee_members');
		}
	}
	
	function clean_projectSteeringCommitteeMembers($project_id=NULL){
		if($project_id!=NULL){
			$this->db->where('project_id',$project_id);
			$this->db->delete('rmis_project_steering_committee_members');
		}
	}
	
	function deleteImplementationCommitteeMemberFromProject($team_member_id=NULL,$project_id=NULL){
		if($team_member_id!=NULL && $project_id!=NULL){
			$this->db->where('id',$team_member_id);
			$this->db->where('project_id',$project_id);
			$this->db->delete('rmis_project_implementation_committee_members');
		}
	}
	
	function clean_projectImplCommitteeMembers($project_id=NULL){
		if($project_id!=NULL){
			$this->db->where('project_id',$project_id);
			$this->db->delete('rmis_project_implementation_committee_members');
		}
	}
	
	function clean_projectActivityLists($project_id=NULL){
		if($project_id!=NULL){
			$this->db->where('project_id',$project_id);
			$this->db->delete('rmis_project_activities');
		}
	}
	
	function get_activityLists($id=NULL){
		if($id!=NULL){
			$this->db->select('*');
			$this->db->from('rmis_project_activities');
			$this->db->where('rmis_project_activities.project_id',$id);
			
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
	
	function deleteActivityFromProject($activity_id=NULL,$project_id=NULL){
		if($activity_id!=NULL && $project_id!=NULL){
			$this->db->where('id',$activity_id);
			$this->db->where('project_id',$project_id);
			$this->db->delete('rmis_project_activities');
		}
	}

	function delete($id=NULL){
		//Truncate `rmis_project_informations`;
		//Truncate `rmis_project_other_informations`;
		//Truncate `rmis_project_funding_sources`;
		//Truncate `rmis_project_cost_estimations`; 
		//Truncate `rmis_project_cost_breakdowns`;
		//Truncate `rmis_project_research_teams`;
		//Truncate `rmis_project_research_team_members`;
		//Truncate `rmis_project_steering_committees`;
		//Truncate `rmis_project_steering_committee_members`;
		//Truncate `rmis_project_implementation_committees`;
		//Truncate `rmis_project_implementation_committee_members`;
	}
}
?>