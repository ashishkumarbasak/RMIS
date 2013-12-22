<?php

class SteeringCommittees extends MX_Controller{
    private $_data;
    public function __construct(){
        parent::__construct();
        $this->load->model('Kendodatasource_model', 'grid');
        $this->load->model('Program_model', 'program');

        $this->template->set_partial('header', 'layouts/header')
						->set_layout('extensive/main_layout');
    }
    
    public function index($program_id=NULL){
        $this->template->title('Research Management(RM)', ' Programs', ' Program Steering Committee Information');
        
		if($this->input->post('save_steering_committee')){
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
			if($this->input->post('update_steering_committee')){
				$request = json_encode($this->input->post());
				$this->dataUpdate($request);
			}
			
			if($this->input->post('delete_steering_committee')){
				$request = json_encode($this->input->post());
				$this->dataDestroy($request);
				redirect('Rmis/Program/SteeringCommittees/'.$program_id,'refresh');
			}
			
			$program_detail = $this->program->get_details($program_id);
			$this->template->set('program_detail', serialize($program_detail));
			
			$steeringCommittee = $this->program->get_steeringCommittee($program_id);
			$this->template->set('steeringCommittee', serialize($steeringCommittee));
			
			$teamMembers = $this->program->get_steeringCommitteeTeamMembers($program_id);
			$this->template->set('teamMembers', serialize($teamMembers));
			
			$committee_member_type = $this->grid->read('rmis_committee_member_types', array('value', 'name', 'is_active'), $request); 
			$this->template->set('committee_member_type',$committee_member_type);
			
			$this->template->set('program_id',$program_id);
		}
		
        $this->template->set('content_header_icon', 'class="icofont-file"');
        $this->template->set('content_header_title', 'Program Steering Committees Information');
		
		$program_areas = $this->grid->read('rmis_program_areas', array('id','program_area_id', 'program_area_name'), $request); 
		$this->template->set('program_areas',$program_areas);
		
        $breadcrumb = '<ul class="breadcrumb">
						<li><a href="#"><i class="icofont-home"></i> RMIS</a> <span class="divider">&raquo;</span></li>
						<li><a href="#">Program info.</a><span class="divider">&raquo;</span></li><li class="active">Program Steering Committee Information</li>
					  </ul>';
        $this->template->set('breadcrumb', $breadcrumb);		
        $this->template->set_partial('steeringCommitteeForm','program/steeringCommittees/form');
		$this->template->set_partial('tab_menu','program/form_tabs');
        $this->template->set_partial('sidebar', 'layouts/sidebar',$_data)
               ->build('program/steeringCommittees/index');
    }
	
	public function dataCreate($request){
        //header('Content-Type: application/json');
        //$request = json_decode(file_get_contents('php://input'));
        $request = json_decode($request);
		//print_r((array) $request);
		
       	$columns = array('committee_formation_date', 'program_id');
		$columns[] = 'organization_id';
		$request->organization_id = $this->config->item('organization_id');
        $columns[] = 'created_at';
        $request->created_at = date('Y-m-d H:i:s');            
        $columns[] = 'created_by';
        $request->created_by = $this->loginUser->id;
        
		$data = $this->grid->create('rmis_program_steering_committees', $columns, $request, 'id'); 
        
		$columns = array('committee_member_type','member_name','designation', 'contact_no', 'email', 'program_id');
		$request->program_id = $request->program_id;
		$i=0;
		if(!empty($request->member_names)>0){
			foreach($request->member_names as $team_member_key=>$team_member_name){
				if($team_member_name!=NULL){
					$request->member_name = $team_member_name;
					$request->designation = $request->designations[$i];
					$request->committee_member_type = $request->committee_member_types[$i];
					$request->contact_no = $request->contact_nos[$i];
					$request->email = $request->emails[$i];
					$this->grid->create('rmis_program_steering_committee_members', $columns, $request, 'id');
					$i++;	
				}
			}
		}
		
        $data['success'] ="Data created successfuly.";
        //echo json_encode($data , JSON_NUMERIC_CHECK); 
    }
    	
	public function dataUpdate($request){
        //header('Content-Type: application/json');
        //$request = json_decode(file_get_contents('php://input'));
        $request = json_decode($request);
		//print_r((array) $request);
		
       	$columns = array('committee_formation_date', 'program_id');
		$columns[] = 'organization_id';
		$request->organization_id = $this->config->item('organization_id');
        $columns[] = 'updated_at';        
        $request->updated_at = date('Y-m-d H:i:s');            
        $columns[] = 'updated_by';
        $request->updated_by = $this->loginUser->id;
        
		$data = $this->grid->update('rmis_program_steering_committees', $columns, $request, 'program_id'); 
        
		$columns = array('committee_member_type','member_name','designation', 'contact_no', 'email', 'program_id');
		$i=0;
		if(!empty($request->member_names)>0){
			$this->program->clean_programSteeringCommitteeMembers($request->program_id);
			foreach($request->member_names as $team_member_key=>$team_member_name){
				if($team_member_name!=NULL){
					$request->member_name = $team_member_name;
					$request->designation = $request->designations[$i];
					$request->committee_member_type = $request->committee_member_types[$i];
					$request->contact_no = $request->contact_nos[$i];
					$request->email = $request->emails[$i];
					$this->grid->create('rmis_program_steering_committee_members', $columns, $request, 'id');
					$i++;	
				}
			}
		}
		
        $data['success'] ="Data updated successfuly.";
        //echo json_encode($data , JSON_NUMERIC_CHECK); 
    }
	
	public function dataDestroy($request=NULL){
		if($request!=NULL){
			 $request = json_decode($request);
			 $data = $this->grid->destroy('rmis_program_steering_committees', $request, 'program_id');
			 $data = $this->grid->destroy('rmis_program_steering_committee_members', $request, 'program_id');
		}
		else{   
			header('Content-Type: application/json');
			$request = json_decode(file_get_contents('php://input'));
			$data = $this->grid->destroy('rmis_program_steering_committees', $request->models, 'program_id');
			$data = $this->grid->destroy('rmis_program_steering_committee_members', $request->models, 'program_id');
			echo json_encode($data , JSON_NUMERIC_CHECK);
		}        
	}	

	public function deleteTeamMember(){
		$team_member_id = $this->input->post('team_member_id');
		$program_id = $this->input->post('program_id');
		$this->program->deleteSteeringCommitteeTeamMemberFromProgram($team_member_id,$program_id);
	}
                
} 
?>