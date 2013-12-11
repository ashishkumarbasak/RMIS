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

	public function read_project_data()
    {
    	$result = array();
		$this->db->select('rmis_project_informations.project_id as project_id, rmis_project_informations.program_id as program_id, rmis_project_informations.project_type as project_type,  rmis_project_informations.research_project_title as project_title, rmis_project_informations.project_goal as project_goal, 
								rmis_project_informations.project_objective as project_objective, rmis_divisions.division_name as project_division, 
								rmis_research_types.name as project_research_type, rmis_research_priorities.name as project_research_priority, rmis_research_statuses.name as project_research_status, 
								rmis_project_informations.project_planned_budget, rmis_project_informations.project_approved_budget, hrm_employees.employee_name as principal_investigator');
		$this->db->from('rmis_project_informations');
		$this->db->join('rmis_divisions','rmis_project_informations.project_division = rmis_divisions.division_id', 'left');
		$this->db->join('rmis_research_types','rmis_project_informations.project_research_type = rmis_research_types.id', 'left');
		$this->db->join('rmis_research_priorities','rmis_project_informations.project_research_priority = rmis_research_priorities.id', 'left');
		$this->db->join('rmis_research_statuses','rmis_project_informations.project_research_status = rmis_research_statuses.id', 'left');
		$this->db->join('hrm_employees','rmis_project_informations.project_coordinator = hrm_employees.employee_id', 'left');
		
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result['total'] = $query->num_rows();
			$result_rs = $query->result();
			$result['data'] = $result_rs;
		}else{
			$result['total'] = 0;
			$result['data'] = "[]";
		}
        
        return $result;
    }

	function search_project_data($data=array()){
		//print_r($data);
		if(!empty($data)){
			$result = array();
			$this->db->select('rmis_project_informations.project_id as project_id, rmis_project_informations.program_id as program_id, rmis_project_informations.project_type as project_type,  rmis_project_informations.research_project_title as project_title, rmis_project_informations.project_goal as project_goal, 
								rmis_project_informations.project_objective as project_objective, rmis_divisions.division_name as project_division, 
								rmis_research_types.name as project_research_type, rmis_research_priorities.name as project_research_priority, rmis_research_statuses.name as project_research_status, 
								rmis_project_informations.project_planned_budget, rmis_project_informations.project_approved_budget, hrm_employees.employee_name as principal_investigator');
			$this->db->from('rmis_project_informations');
			$this->db->join('rmis_divisions','rmis_project_informations.project_division = rmis_divisions.division_id', 'left');
			$this->db->join('rmis_research_types','rmis_project_informations.project_research_type = rmis_research_types.id', 'left');
			$this->db->join('rmis_research_priorities','rmis_project_informations.project_research_priority = rmis_research_priorities.id', 'left');
			$this->db->join('rmis_research_statuses','rmis_project_informations.project_research_status = rmis_research_statuses.id', 'left');
			$this->db->join('hrm_employees','rmis_project_informations.project_coordinator = hrm_employees.employee_id', 'left');
			
			if(array_key_exists('project_type', $data) && $data['project_type'] != NULL)
				$this->db->where('rmis_project_informations.project_type', $data['project_type']);
			
			if(array_key_exists('project_code', $data) && $data['project_code'] != NULL)
				$this->db->where('rmis_project_informations.project_code', $data['project_code']);
			
			if(array_key_exists('project_division', $data) && $data['project_division'] != NULL)
				$this->db->where('rmis_project_informations.project_division', $data['project_division']);
			
			if(array_key_exists('project_research_type', $data) && $data['project_research_type'] != NULL)
				$this->db->where('rmis_project_informations.project_research_type', $data['project_research_type']);
			
			if(array_key_exists('project_research_priority', $data) && $data['project_research_priority'] != NULL)
				$this->db->where('rmis_project_informations.project_research_priority', $data['project_research_priority']);
			
			if(array_key_exists('project_research_status', $data) && $data['project_research_status'] != NULL)
				$this->db->where('rmis_project_informations.project_research_status', $data['project_research_status']);
			
			if(array_key_exists('project_regionalStationName', $data) && $data['project_regionalStationName'] != NULL)
				$this->db->where('rmis_project_informations.project_regional_station_name', $data['project_regionalStationName']);
			
			if(array_key_exists('project_implementationLocation', $data) && $data['project_implementationLocation'] != NULL)
				$this->db->where('rmis_project_informations.project_implementation_location', $data['project_implementationLocation']);
		
			if(array_key_exists('project_keywords', $data) && $data['project_keywords'] != NULL)
				$this->db->or_like('rmis_project_informations.project_keywords', $data['project_keywords']);
			
			$query = $this->db->get();
			if($query->num_rows() > 0){
				$result['total'] = $query->num_rows();
				$result_rs = $query->result();
				$result['data'] = $result_rs;
			}else{
				$result['total'] = 0;
				$result['data'] = "";
			}
	        
	        return $result;
		}else{
			$result = $this->read_program_data();
			return $result;
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