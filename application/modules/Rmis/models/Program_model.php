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
			$this->db->select('* , hrm_employees.employee_name as program_coordinator, program_planned_budget as program_plannedBudget, 
								program_approved_budget as program_approvedBudget, program_planned_start_date as program_plannedStartDate, 
								program_planned_end_date as program_plannedEndDate, program_initiation_date as program_initiationDate, 
								program_completion_date as program_completionDate');
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
			$this->db->select('*, rmis_program_funding_sources.id as id, rmis_program_funding_sources.id as refID, rmis_funding_source.name as fund_source, 
								rmis_funding_source.id as fund_source_id, rmis_currency.id as currency_id, rmis_currency.name as currency');
			$this->db->from('rmis_program_funding_sources');
			$this->db->join('rmis_funding_source','rmis_program_funding_sources.fund_source=rmis_funding_source.id','left');
			$this->db->join('rmis_currency','rmis_program_funding_sources.currency=rmis_currency.id','left');
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
			$this->db->select('rmis_program_activities.id as ActivityID, rmis_program_activities.program_id as ProgramID, sort_order as SortOrder, 
								work_element as WorkElement, planned_start_date as PlannedStartDate, planned_end_date as PlannedEndDate, 
								actual_start_date as ActualStartDate, actual_end_date as ActualEndDate, hrm_employees.employee_name as AssignResource, hrm_employees.employee_id as AssignResourceID,
								comments, activity_status, activity_point');
			$this->db->from('rmis_program_activities');
			$this->db->join('hrm_employees','rmis_program_activities.assign_resource=hrm_employees.employee_id','left');
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

	function get_program_me_informations($program_id=NULL){
		if($program_id!=NULL){
			$this->db->select('*');
			$this->db->from('rmis_program_me_informations');
			$this->db->where('program_id',$program_id);
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
			$this->db->select('rmis_program_research_team_members.id as MemberID, rmis_member_types.name as MemberType, rmis_member_types.id as MemberTypeID, institute_id as InstituteID, institute_name as InstituteName, 
								rmis_program_research_team_members.employee_id as EmployeeID, member_name as MemberName, designation as Designation, 
								contact_no as ContactNo, rmis_program_research_team_members.email as Email, program_id as ProgramID');
			$this->db->from('rmis_program_research_team_members');
			$this->db->join('hrm_employees','rmis_program_research_team_members.employee_id=hrm_employees.employee_id','left');
			$this->db->join('hrm_designations','hrm_employees.designation_id=hrm_designations.id','left');
			$this->db->join('rmis_member_types','rmis_program_research_team_members.member_type=rmis_member_types.id','left');
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

	public function read_program_data()
    {
    	$result = array();
		$this->db->select('rmis_program_informations.program_id as program_id,  rmis_program_informations.research_program_title as program_title, rmis_program_informations.program_goal as program_goal, 
								rmis_program_informations.program_objective as program_objective, rmis_program_areas.program_area_name as program_area, rmis_divisions.division_name as program_division, 
								rmis_research_types.name as program_research_type, rmis_research_priorities.name as program_research_priority, rmis_research_statuses.name as program_research_status, 
								rmis_program_informations.program_planned_budget, rmis_program_informations.program_approved_budget, hrm_employees.employee_name as principal_investigator');
		$this->db->from('rmis_program_informations');
		$this->db->join('rmis_program_areas','rmis_program_informations.program_area = rmis_program_areas.program_area_id', 'left');
		$this->db->join('rmis_divisions','rmis_program_informations.program_division = rmis_divisions.division_id', 'left');
		$this->db->join('rmis_research_types','rmis_program_informations.program_research_type = rmis_research_types.id', 'left');
		$this->db->join('rmis_research_priorities','rmis_program_informations.program_research_priority = rmis_research_priorities.id', 'left');
		$this->db->join('rmis_research_statuses','rmis_program_informations.program_research_status = rmis_research_statuses.id', 'left');
		$this->db->join('hrm_employees','rmis_program_informations.program_coordinator = hrm_employees.employee_id', 'left');
		
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

	function search_program_data($data=array()){
		//print_r($data);
		if(!empty($data)){
			$result = array();
			$this->db->select('rmis_program_informations.program_id as program_id,  rmis_program_informations.research_program_title as program_title, rmis_program_informations.program_goal as program_goal, 
								rmis_program_informations.program_objective as program_objective, rmis_program_areas.program_area_name as program_area, rmis_divisions.division_name as program_division, 
								rmis_research_types.name as program_research_type, rmis_research_priorities.name as program_research_priority, rmis_research_statuses.name as program_research_status, 
								rmis_program_informations.program_planned_budget, rmis_program_informations.program_approved_budget, hrm_employees.employee_name as principal_investigator');
			$this->db->from('rmis_program_informations');
			$this->db->join('rmis_program_areas','rmis_program_informations.program_area = rmis_program_areas.program_area_id', 'left');
			$this->db->join('rmis_divisions','rmis_program_informations.program_division = rmis_divisions.division_id', 'left');
			$this->db->join('rmis_research_types','rmis_program_informations.program_research_type = rmis_research_types.id', 'left');
			$this->db->join('rmis_research_priorities','rmis_program_informations.program_research_priority = rmis_research_priorities.id', 'left');
			$this->db->join('rmis_research_statuses','rmis_program_informations.program_research_status = rmis_research_statuses.id', 'left');
			$this->db->join('hrm_employees','rmis_program_informations.program_coordinator = hrm_employees.employee_id', 'left');
			
			if(array_key_exists('program_area', $data) && $data['program_area'] != NULL)
				$this->db->where('rmis_program_informations.program_area', $data['program_area']);
			
			if(array_key_exists('program_division', $data) && $data['program_division'] != NULL)
				$this->db->where('rmis_program_informations.program_division', $data['program_division']);
			
			if(array_key_exists('program_research_type', $data) && $data['program_research_type'] != NULL)
				$this->db->where('rmis_program_informations.program_research_type', $data['program_research_type']);
			
			if(array_key_exists('program_research_priority', $data) && $data['program_research_priority'] != NULL)
				$this->db->where('rmis_program_informations.program_research_priority', $data['program_research_priority']);
			
			if(array_key_exists('program_research_status', $data) && $data['program_research_status'] != NULL)
				$this->db->where('rmis_program_informations.program_research_status', $data['program_research_status']);
		
			if(array_key_exists('program_regionalStationName', $data) && $data['program_regionalStationName'] != NULL)
				$this->db->where('rmis_program_informations.program_regional_station_name', $data['program_regionalStationName']);
			
			if(array_key_exists('program_implementationLocation', $data) && $data['program_implementationLocation'] != NULL)
				$this->db->where('rmis_program_informations.program_implementation_location', $data['program_implementationLocation']);
		
			if(array_key_exists('program_keywords', $data) && $data['program_keywords'] != NULL)
				$this->db->or_like('rmis_program_informations.program_keywords', $data['program_keywords']);
			
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
		}else{
			$result = $this->read_program_data();
			return $result;
		}
	}

	function delete($id=NULL){
		//truncate rmis_program_activities;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_program_areas;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_program_cost_breakdowns;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_program_cost_estimations;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_program_funding_sources;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_program_implementation_committees;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_program_implementation_committee_members;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_program_informations;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_program_me_committees;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_program_me_committee_members;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_program_other_informations;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_program_rating;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_program_research_teams;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_program_research_team_members;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_program_steering_committees;# MySQL returned an empty result set (i.e. zero rows).
		//truncate rmis_program_steering_committee_members;# MySQL returned an empty result set (i.e. zero rows).
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