<?php
class Experiment_model extends MY_Model {
    
	 public $validate = array(
        array(
            'field' => 'research_experiment_title',            
            'rules' => 'required|trim|xss_clean'), 
		array(
            'field' => 'experiment_division',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'experiment_research_type',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'experiment_research_priority',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'experiment_research_status',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'experiment_coordinator',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'experiment_planned_start_date',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'experiment_planned_end_date',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'experiment_goal',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'experiment_objective',           
            'rules' => 'required|trim|xss_clean'),
		array(
            'field' => 'experiment_expected_outputs',           
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
			$this->db->select('* , hrm_employees.employee_name as experiment_coordinator, experiment_planned_budget, 
								experiment_approved_budget, experiment_planned_start_date, 
								experiment_planned_end_date, experiment_initiation_date, 
								experiment_completion_date');
			$this->db->from('rmis_experiment_informations');
			$this->db->join('hrm_employees','rmis_experiment_informations.experiment_coordinator=hrm_employees.employee_id','left');
			
			$this->db->where('rmis_experiment_informations.experiment_id',$id);
			
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
			$this->db->select('* , hrm_employees.employee_name as experiment_coordinator, rmis_experiment_other_informations.id as other_information_id');
			$this->db->from('rmis_experiment_informations');
			$this->db->join('rmis_experiment_other_informations','rmis_experiment_informations.experiment_id=rmis_experiment_other_informations.experiment_id','left');
			$this->db->join('hrm_employees','rmis_experiment_informations.experiment_coordinator=hrm_employees.employee_id','left');
			
			$this->db->where('rmis_experiment_informations.experiment_id',$id);
			
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
			$this->db->select('*, rmis_experiment_funding_sources.id as id, rmis_experiment_funding_sources.id as refID, rmis_funding_source.name as fund_source, 
								rmis_funding_source.id as fund_source_id, rmis_currency.id as currency_id, rmis_currency.name as currency');
			$this->db->from('rmis_experiment_funding_sources');
			$this->db->join('rmis_funding_source','rmis_experiment_funding_sources.fund_source=rmis_funding_source.id','left');
			$this->db->join('rmis_currency','rmis_experiment_funding_sources.currency=rmis_currency.id','left');
			$this->db->where('rmis_experiment_funding_sources.experiment_id',$id);
			
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
			$this->db->from('rmis_experiment_cost_estimations');
			$this->db->where('rmis_experiment_cost_estimations.experiment_id',$id);
			
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
			$this->db->from('rmis_experiment_cost_breakdowns');
			$this->db->where('rmis_experiment_cost_breakdowns.experiment_id',$id);
			
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
			$this->db->from('rmis_experiment_research_teams');
			$this->db->where('rmis_experiment_research_teams.experiment_id',$id);
			
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
			$this->db->from('rmis_experiment_research_team_members');
			$this->db->where('rmis_experiment_research_team_members.experiment_id',$id);
			
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
			$this->db->from('rmis_experiment_steering_committees');
			$this->db->where('rmis_experiment_steering_committees.experiment_id',$id);
			
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
			$this->db->from('rmis_experiment_steering_committee_members');
			$this->db->where('rmis_experiment_steering_committee_members.experiment_id',$id);
			
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
			$this->db->from('rmis_experiment_monitoring_committees');
			$this->db->where('rmis_experiment_monitoring_committees.experiment_id',$id);
			
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
			$this->db->from('rmis_experiment_monitoring_committee_members');
			$this->db->where('rmis_experiment_monitoring_committee_members.experiment_id',$id);
			
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
			$this->db->from('rmis_experiment_implementation_committees');
			$this->db->where('rmis_experiment_implementation_committees.experiment_id',$id);
			
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
			$this->db->from('rmis_experiment_implementation_committee_members');
			$this->db->where('rmis_experiment_implementation_committee_members.experiment_id',$id);
			
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
	
	function deleteFundSourceFromExperiment($fundSource_id=NULL,$experiment_id=NULL){
		if($fundSource_id!=NULL && $experiment_id!=NULL){
			$this->db->where('id',$fundSource_id);
			$this->db->where('experiment_id',$experiment_id);
			$this->db->delete('rmis_experiment_funding_sources');
		}
	}

	function clean_experimentFundSources($experiment_id=NULL){
		if($experiment_id!=NULL){
			$this->db->where('experiment_id',$experiment_id);
			$this->db->delete('rmis_experiment_funding_sources');
		}
	}
	
	function clean_experimentCostBreakDown($experiment_id=NULL){
		if($experiment_id!=NULL){
			$this->db->where('experiment_id',$experiment_id);
			$this->db->delete('rmis_experiment_cost_breakdowns');
		}
	}

	function deleteCostBreakDownFromExperiment($cbitem_id=NULL,$experiment_id=NULL){
		if($cbitem_id!=NULL && $experiment_id!=NULL){
			$this->db->where('id',$cbitem_id);
			$this->db->where('experiment_id',$experiment_id);
			$this->db->delete('rmis_experiment_cost_breakdowns');
		}
	}
	
	function deleteResearchTeamMemberFromExperiment($team_member_id=NULL,$experiment_id=NULL){
		if($team_member_id!=NULL && $experiment_id!=NULL){
			$this->db->where('id',$team_member_id);
			$this->db->where('experiment_id',$experiment_id);
			$this->db->delete('rmis_experiment_research_team_members');
		}
	}
	
	function clean_experimentResearchTeamMembers($experiment_id=NULL){
		if($experiment_id!=NULL){
			$this->db->where('experiment_id',$experiment_id);
			$this->db->delete('rmis_experiment_research_team_members');
		}
	}
	
	function deleteMonitoringCommitteeTeamMemberFromExperiment($team_member_id=NULL,$experiment_id=NULL){
		if($team_member_id!=NULL && $experiment_id!=NULL){
			$this->db->where('id',$team_member_id);
			$this->db->where('experiment_id',$experiment_id);
			$this->db->delete('rmis_experiment_monitoring_committee_members');
		}
	}
	
	function deleteSteeringCommitteeTeamMemberFromExperiment($team_member_id=NULL,$experiment_id=NULL){
		if($team_member_id!=NULL && $experiment_id!=NULL){
			$this->db->where('id',$team_member_id);
			$this->db->where('experiment_id',$experiment_id);
			$this->db->delete('rmis_experiment_steering_committee_members');
		}
	}
	
	function clean_experimentMonitoringCommitteeMembers($experiment_id=NULL){
		if($experiment_id!=NULL){
			$this->db->where('experiment_id',$experiment_id);
			$this->db->delete('rmis_experiment_monitoring_committee_members');
		}
	}
	
	function clean_experimentSteeringCommitteeMembers($experiment_id=NULL){
		if($experiment_id!=NULL){
			$this->db->where('experiment_id',$experiment_id);
			$this->db->delete('rmis_experiment_steering_committee_members');
		}
	}
	
	function deleteImplementationCommitteeMemberFromExperiment($team_member_id=NULL,$experiment_id=NULL){
		if($team_member_id!=NULL && $experiment_id!=NULL){
			$this->db->where('id',$team_member_id);
			$this->db->where('experiment_id',$experiment_id);
			$this->db->delete('rmis_experiment_implementation_committee_members');
		}
	}
	
	function clean_experimentImplCommitteeMembers($experiment_id=NULL){
		if($experiment_id!=NULL){
			$this->db->where('experiment_id',$experiment_id);
			$this->db->delete('rmis_experiment_implementation_committee_members');
		}
	}
	
	function clean_experimentActivityLists($experiment_id=NULL){
		if($experiment_id!=NULL){
			$this->db->where('experiment_id',$experiment_id);
			$this->db->delete('rmis_experiment_activities');
		}
	}
	
	function get_activityLists($id=NULL){
		if($id!=NULL){
			$this->db->select('rmis_experiment_activities.id as ActivityID, rmis_experiment_activities.experiment_id as ExperimentID, sort_order as SortOrder, 
								work_element as WorkElement, planned_start_date as PlannedStartDate, planned_end_date as PlannedEndDate, 
								actual_start_date as ActualStartDate, actual_end_date as ActualEndDate, hrm_employees.employee_name as AssignResource, hrm_employees.employee_id as AssignResourceID,
								comments, activity_status, activity_point');
			$this->db->from('rmis_experiment_activities');
			$this->db->join('hrm_employees','rmis_experiment_activities.assign_resource=hrm_employees.employee_id','left');
			$this->db->where('rmis_experiment_activities.experiment_id',$id);
			
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
	
	function deleteActivityFromExperiment($activity_id=NULL,$experiment_id=NULL){
		if($activity_id!=NULL && $experiment_id!=NULL){
			$this->db->where('id',$activity_id);
			$this->db->where('experiment_id',$experiment_id);
			$this->db->delete('rmis_experiment_activities');
		}
	}

	function get_experiment_me_informations($experiment_id=NULL){
		if($experiment_id!=NULL){
			$this->db->select('*');
			$this->db->from('rmis_experiment_me_informations');
			$this->db->where('experiment_id',$experiment_id);
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
			$this->db->select('rmis_experiment_research_team_members.id as MemberID, rmis_member_types.name as MemberType, rmis_member_types.id as MemberTypeID, institute_id as InstituteID, institute_name as InstituteName, 
								rmis_experiment_research_team_members.employee_id as EmployeeID, member_name as MemberName, designation as Designation, 
								contact_no as ContactNo, rmis_experiment_research_team_members.email as Email, experiment_id as ExperimentID');
			$this->db->from('rmis_experiment_research_team_members');
			$this->db->join('hrm_employees','rmis_experiment_research_team_members.employee_id=hrm_employees.employee_id','left');
			$this->db->join('hrm_designations','hrm_employees.designation_id=hrm_designations.id','left');
			$this->db->join('rmis_member_types','rmis_experiment_research_team_members.member_type=rmis_member_types.id','left');
			$this->db->where('rmis_experiment_research_team_members.experiment_id',$id);
			
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
		//truncate rmis_experiment_activities;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_experiment_areas;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_experiment_cost_breakdowns;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_experiment_cost_estimations;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_experiment_funding_sources;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_experiment_implementation_committees;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_experiment_implementation_committee_members;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_experiment_informations;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_experiment_me_committees;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_experiment_me_committee_members;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_experiment_other_informations;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_experiment_rating;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_experiment_research_teams;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_experiment_research_team_members;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_experiment_steering_committees;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_experiment_steering_committee_members;# MySQL returned an empty result set (i.e. zero rows).
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