<?php

class ResearchTeams extends MX_Controller{
    private $_data;
	private $loggedin_userID;
    public function __construct(){
        parent::__construct();
        $this->load->model('Kendodatasource_model', 'grid');
        $this->load->model('Program_model', 'program');

        $this->template->set_partial('header', 'layouts/header')
						->set_layout('extensive/main_layout');
						
		$loggedinUserDetails = $this->program->getLoggedinUserDetails($this->loginUser->id);
		$this->template->set('loggedinUserDetails', serialize($loggedinUserDetails));
    }
    
    public function index($program_id=NULL){
        $this->template->title('Research Management(RM)', ' Programs', ' Research Program Team Information');
        
		if($this->input->post('save_researchTeam')){
			$request = json_encode($this->input->post());
			$this->dataCreate($request);
		}
		
        $_data['dashboard_menu_active'] = '';
        $_data['setup_menu_active'] = 'class="active"';
        $_data['setup_funds_menu_active'] ='class="active"';
        $_data['setup_training_program_type_menu_active'] ='';
        $_data['setup_institutes_menu_active'] ='';
        
        $this->template->append_metadata('<link href="/assets/kendoui/css/web/kendo.common.min.css"  rel="stylesheet"/>');
        $this->template->append_metadata('<link href="/assets/kendoui/css/web/kendo.default.min.css"  rel="stylesheet"/>');
        $this->template->append_metadata('<script src="/assets/kendoui/js/kendo.all.min.js"></script>');
        $this->template->append_metadata('<script src="/assets/js/custom/rmis.js"></script>');
                
        if($program_id!=NULL){
        	if($this->input->post('update_researchTeam')){
				$request = json_encode($this->input->post());
				$this->dataUpdate($request);
			}
			
			if($this->input->post('delete_researchTeam')){
				$request = json_encode($this->input->post());
				$this->dataDestroy($request);
				redirect('Rmis/Program/ResearchTeams/'.$program_id,'refresh');
			}
			
			$program_detail = $this->program->get_details($program_id);
			$this->template->set('program_detail', serialize($program_detail));
			
			$researchTeam = $this->program->get_researchTeam($program_id);
			$this->template->set('researchTeam', serialize($researchTeam));
			
			$teamMembers = $this->program->get_research_team_information($program_id);
			$this->template->set('teamMembers', serialize($teamMembers));
			
			
			$this->template->set('program_id',$program_id);
		}
		
		$program_areas = $this->grid->read('rmis_program_areas', array('id','program_area_id', 'program_area_name'), $request); 
		$this->template->set('program_areas',$program_areas);
		
        $this->template->set('content_header_icon', 'class="icofont-file"');
        $this->template->set('content_header_title', 'Research Program Team Information');
		
        $breadcrumb = '<ul class="breadcrumb">
						<li><a href="#"><i class="icofont-home"></i> RMIS</a> <span class="divider">&raquo;</span></li>
						<li><a href="#">Program info.</a><span class="divider">&raquo;</span></li><li class="active">Research Program Team Information</li>
					  </ul>';
        $this->template->set('breadcrumb', $breadcrumb);		
        $this->template->set_partial('researchTeamInfoForm','program/researchTeams/form');
		$this->template->set_partial('tab_menu','program/form_tabs');
        $this->template->set_partial('sidebar', 'layouts/sidebar',$_data)
               ->build('program/researchTeams/index');
    }
	
	public function dataCreate($request){
        $request = json_decode($request);
		
       	$columns = array('team_formation_date', 'program_id');
		$columns[] = 'organization_id';
		$request->organization_id = $this->config->item('organization_id');
        $columns[] = 'created_at';
        $request->created_at = date('Y-m-d H:i:s');            
        $columns[] = 'created_by';
        $request->created_by = $this->loginUser->id;
        
		$data = $this->grid->create('rmis_program_research_teams', $columns, $request, 'id'); 
        
		$columns = array('member_type', 'institute_id', 'institute_name', 'employee_id', 'member_name','designation', 'contact_no', 'email', 'program_id');
		$request->program_id = $request->program_id;
		$team_members = json_decode($this->input->post('research_team_member'));
		if(!empty($team_members)){
			foreach($team_members as $team_member_key=>$team_member){
				if($team_member!=NULL){
					$request->member_type = $team_member->MemberTypeID;
					$request->institute_id = $team_member->InstituteID;
					$request->institute_name = $team_member->InstituteName;
					$request->employee_id = $team_member->MemberID;
					$request->member_name = $team_member->MemberName;
					$request->designation = $team_member->Designation;
					$request->contact_no = $team_member->ContactNo;
					$request->email = $team_member->Email;
					$this->grid->create('rmis_program_research_team_members', $columns, $request, 'id');
				}
			}
		}
        $data['success'] ="Data created successfuly.";
    }
	
	function getResearchTeamInformation($program_id=NULL){
		header('Content-Type: application/json');
        $request = json_decode(file_get_contents('php://input'));
        $activityLists = $this->program->get_research_team_information($program_id);
		if($activityLists!=NULL)
        	echo json_encode($activityLists, JSON_NUMERIC_CHECK);
		else
			echo "[]";
	}

	function addMembers(){
		header('Content-Type: application/json');
        $members = $this->input->post('models');
		echo $members;
	}
	
	function destroyMembers(){
		header('Content-Type: application/json');
        $members = $this->input->post('models');
		echo $members;
	}
	
	function updateMembers(){
		header('Content-Type: application/json');
        $members = $this->input->post('models');
		echo $members;
	}
	
	function getListofMemberTypes(){
		header('Content-Type: application/json');
        $request = json_decode(file_get_contents('php://input'));
       	$member_types = $this->grid->read('rmis_member_types', array('id','value as MemberTypeID', 'name as MemberType'), $request); 
		if($member_types!=NULL)
        	echo json_encode($member_types["data"], JSON_NUMERIC_CHECK);
		else
			echo "[]";
	}
    	
	public function dataUpdate($request){
        $request = json_decode($request);
		
       	$columns = array('team_formation_date', 'program_id');
        $columns[] = 'organization_id';
		$request->organization_id = $this->config->item('organization_id');
		$columns[] = 'updated_at';        
        $request->updated_at = date('Y-m-d H:i:s');            
        $columns[] = 'updated_by';
        $request->updated_by = $this->loginUser->id;
        
		$data = $this->grid->update('rmis_program_research_teams', $columns, $request, 'program_id'); 
        
		$columns = array('member_type', 'institute_id', 'institute_name', 'employee_id', 'member_name','designation', 'contact_no', 'email', 'program_id');
		$request->program_id = $request->program_id;
		$team_members = json_decode($this->input->post('research_team_member'));
		$this->program->clean_programResearchTeamMembers($request->program_id);

		if(!empty($team_members)){
			foreach($team_members as $team_member_key=>$team_member){
				if($team_member!=NULL){
					$request->member_type = $team_member->MemberTypeID;
					$request->institute_id = $team_member->InstituteID;
					$request->institute_name = $team_member->InstituteName;
					$request->employee_id = $team_member->MemberID;
					$request->member_name = $team_member->MemberName;
					$request->designation = $team_member->Designation;
					$request->contact_no = $team_member->ContactNo;
					$request->email = $team_member->Email;
					$this->grid->create('rmis_program_research_team_members', $columns, $request, 'id');
				}
			}
		}		
        $data['success'] ="Data updated successfuly.";
    }
	
	public function dataDestroy($request=NULL){
		if($request!=NULL){
			 $request = json_decode($request);
			 $data = $this->grid->destroy('rmis_program_research_team_members', $request, 'program_id');
			 $data = $this->grid->destroy('rmis_program_research_teams', $request, 'program_id');
		}
		else{   
			header('Content-Type: application/json');
			$request = json_decode(file_get_contents('php://input'));
			$data = $this->grid->destroy('rmis_program_research_team_members', $request->models, 'program_id');
			$data = $this->grid->destroy('rmis_program_research_teams', $request->models, 'program_id');
			echo json_encode($data , JSON_NUMERIC_CHECK);
		}        
	}	

	public function deleteTeamMember(){
		$team_member_id = $this->input->post('team_member_id');
		$program_id = $this->input->post('program_id');
		$this->program->deleteResearchTeamMemberFromProgram($team_member_id,$program_id);
	}
} 
?>