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
            'field' => 'project_research_type',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'project_research_priority',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'project_research_status',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'project_coordinator',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'project_planned_start_date',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'project_planned_end_date',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'project_goal',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'project_objective',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'project_expected_outputs',           
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
			$this->db->select('* , hrm_employees.employee_name as project_coordinator, project_planned_budget, 
								project_approved_budget, project_planned_start_date, 
								project_planned_end_date, project_initiation_date, 
								project_completion_date');
			$this->db->from('rmis_project_informations');
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
	
	public function get_other_details($id=NULL){
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
			$this->db->select('*, rmis_project_funding_sources.id as id, rmis_project_funding_sources.id as refID, rmis_funding_source.name as fund_source, 
								rmis_funding_source.id as fund_source_id, rmis_currency.id as currency_id, rmis_currency.name as currency');
			$this->db->from('rmis_project_funding_sources');
			$this->db->join('rmis_funding_source','rmis_project_funding_sources.fund_source=rmis_funding_source.id','left');
			$this->db->join('rmis_currency','rmis_project_funding_sources.currency=rmis_currency.id','left');
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
	
	function get_account_head_info(){
		$this->db->select('id, sub_head_code, sub_head_name');
		$this->db->from('amis_chart_of_account');
		$this->db->where('amis_chart_of_account.is_posting_head','yes');
		
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->result();
			return $result;
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
	
	function get_monitoringCommittee($id=NULL){
		if($id!=NULL){
			$this->db->select('*');
			$this->db->from('rmis_project_monitoring_committees');
			$this->db->where('rmis_project_monitoring_committees.project_id',$id);
			
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

	function get_monitoringCommitteeTeamMembers($id=NULL){
		if($id!=NULL){
			$this->db->select('*');
			$this->db->from('rmis_project_monitoring_committee_members');
			$this->db->where('rmis_project_monitoring_committee_members.project_id',$id);
			
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
	
	function deleteMonitoringCommitteeTeamMemberFromProject($team_member_id=NULL,$project_id=NULL){
		if($team_member_id!=NULL && $project_id!=NULL){
			$this->db->where('id',$team_member_id);
			$this->db->where('project_id',$project_id);
			$this->db->delete('rmis_project_monitoring_committee_members');
		}
	}
	
	function deleteSteeringCommitteeTeamMemberFromProject($team_member_id=NULL,$project_id=NULL){
		if($team_member_id!=NULL && $project_id!=NULL){
			$this->db->where('id',$team_member_id);
			$this->db->where('project_id',$project_id);
			$this->db->delete('rmis_project_steering_committee_members');
		}
	}
	
	function clean_projectMonitoringCommitteeMembers($project_id=NULL){
		if($project_id!=NULL){
			$this->db->where('project_id',$project_id);
			$this->db->delete('rmis_project_monitoring_committee_members');
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
			$this->db->select('rmis_project_activities.id as ActivityID, rmis_project_activities.project_id as ProjectID, sort_order as SortOrder, 
								work_element as WorkElement, planned_start_date as PlannedStartDate, planned_end_date as PlannedEndDate, 
								actual_start_date as ActualStartDate, actual_end_date as ActualEndDate, hrm_employees.employee_name as AssignResource, hrm_employees.employee_id as AssignResourceID,
								comments, activity_status, activity_point');
			$this->db->from('rmis_project_activities');
			$this->db->join('hrm_employees','rmis_project_activities.assign_resource=hrm_employees.employee_id','left');
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

	function get_project_me_informations($project_id=NULL){
		if($project_id!=NULL){
			$this->db->select('*');
			$this->db->from('rmis_project_me_informations');
			$this->db->where('project_id',$project_id);
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
	
	function getLoggedinUserDetails($userID=NULL){
		if($userID!=NULL){
			$this->db->select('*');
			$this->db->from('hrm_employees');
			$this->db->join('hrm_organizations','hrm_employees.organization_id = hrm_organizations.id', 'left');
			$this->db->where('hrm_employees.id',$userID);
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
	
	
	public function get_research_team_information($id=NULL){
		if($id!=NULL){
			$this->db->select('rmis_project_research_team_members.id as MemberID, rmis_member_types.name as MemberType, rmis_member_types.id as MemberTypeID, institute_id as InstituteID, institute_name as InstituteName, 
								rmis_project_research_team_members.employee_id as EmployeeID, member_name as MemberName, designation as Designation, 
								contact_no as ContactNo, rmis_project_research_team_members.email as Email, project_id as ProjectID');
			$this->db->from('rmis_project_research_team_members');
			$this->db->join('hrm_employees','rmis_project_research_team_members.employee_id=hrm_employees.employee_id','left');
			$this->db->join('hrm_designations','hrm_employees.designation_id=hrm_designations.id','left');
			$this->db->join('rmis_member_types','rmis_project_research_team_members.member_type=rmis_member_types.id','left');
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

	function delete($id=NULL){
		//truncate rmis_project_activities;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_project_areas;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_project_cost_breakdowns;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_project_cost_estimations;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_project_funding_sources;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_project_implementation_committees;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_project_implementation_committee_members;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_project_informations;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_project_me_committees;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_project_me_committee_members;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_project_other_informations;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_project_rating;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_project_research_teams;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_project_research_team_members;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_project_steering_committees;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_project_steering_committee_members;# MySQL returned an empty result set (i.e. zero rows).
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