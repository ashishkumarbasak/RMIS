<?php

class ImplementationCommittees extends MX_Controller{
    private $_data;
    public function __construct(){
        parent::__construct();
        $this->load->model('Kendodatasource_model', 'grid');
        $this->load->model('Program_model', 'program');
		$this->load->model('Project_model', 'project');

        $this->template->set_partial('header', 'layouts/header')
						->set_layout('extensive/main_layout');
    }
    
    public function index($program_id=NULL, $project_id=NULL){
        $this->template->title('Research Management(RM)', ' Programs', ' Project Implementation Committee Information');
        $this->template->set('project_id',$project_id);
		$this->template->set('program_id',$program_id);
		
		if($this->input->post('save_project_implcommittee')){
			$request = json_encode($this->input->post());
			$this->dataCreate($request);
		}
		
        $_data['dashboard_menu_active'] = '';
        $_data['setup_menu_active'] = 'class="active"';
        $_data['setup_funds_menu_active'] ='class="active"';
        $_data['setup_training_project_type_menu_active'] ='';
        $_data['setup_institutes_menu_active'] ='';
        
        $this->template->append_metadata('<link href="/assets/kendoui/css/web/kendo.common.min.css"  rel="stylesheet"/>');
        $this->template->append_metadata('<link href="/assets/kendoui/css/web/kendo.default.min.css"  rel="stylesheet"/>');
        $this->template->append_metadata('<script src="/assets/kendoui/js/kendo.all.min.js"></script>');
        $this->template->append_metadata('<script src="/assets/js/custom/rmis.js"></script>');
                
        if($project_id!=NULL){
			if($this->input->post('update_project_implcommittee')){
				$request = json_encode($this->input->post());
				$this->dataUpdate($request);
			}
			
			if($this->input->post('delete_project_implcommittee')){
				$request = json_encode($this->input->post());
				$this->dataDestroy($request);
				redirect('Rmis/Project/ImplementationCommittees/'.$program_id."/".$project_id,'refresh');
			}
			
			$project_detail = $this->project->get_details($project_id);
			$this->template->set('project_detail', serialize($project_detail));
			
			$program_areas = $this->grid->read('rmis_program_areas', array('id','program_area_id', 'program_area_name'), $request); 
			$this->template->set('program_areas',$program_areas);
			
			$implementationCommittee = $this->project->get_implementationCommittee($project_id);
			$this->template->set('implementationCommittee', serialize($implementationCommittee));
			
			$teamMembers = $this->project->get_implementationCommitteeTeamMembers($project_id);
			$this->template->set('teamMembers', serialize($teamMembers));
			
			$committee_member_type = $this->grid->read('rmis_committee_member_types', array('value', 'name', 'is_active'), $request); 
			$this->template->set('committee_member_type',$committee_member_type);
			
			$this->template->set('project_id',$project_id);
		}

		if($program_id!=NULL || $program_id!=0){
			$program_detail = $this->program->get_details($program_id);
			$this->template->set('program_detail', serialize($program_detail));
		}

        $this->template->set('content_header_icon', 'class="icofont-file"');
        $this->template->set('content_header_title', 'Project Implementation Committee Information');
       
	   	$project_areas = $this->grid->read('rmis_project_areas', array('id','project_area_id', 'project_area_name'), $request); 
		$this->template->set('project_areas',$project_areas);
	   	
        $breadcrumb = '<ul class="breadcrumb">
						<li><a href="#"><i class="icofont-home"></i> RMIS</a> <span class="divider">&raquo;</span></li>
						<li><a href="#">Project info.</a><span class="divider">&raquo;</span></li><li class="active">Project Implementation Committee Information</li>
					  </ul>';
        $this->template->set('breadcrumb', $breadcrumb);		
        $this->template->set_partial('implCommitteeForm','project/implementationCommittees/form');
		$this->template->set_partial('tab_menu','project/form_tabs');
        $this->template->set_partial('sidebar', 'layouts/sidebar',$_data)
               ->build('project/implementationCommittees/index');
    }
	
	public function dataCreate($request){
        //header('Content-Type: application/json');
        //$request = json_decode(file_get_contents('php://input'));
        $request = json_decode($request);
		//print_r((array) $request);
		
       	$columns = array('committee_formation_date', 'project_id');
		$columns[] = 'organization_id';
		$request->organization_id = $this->config->item('organization_id');
        $columns[] = 'created_at';
        $request->created_at = date('Y-m-d H:i:s');            
        $columns[] = 'created_by';
        $request->created_by = $this->loginUser->id;
        
		$data = $this->grid->create('rmis_project_implementation_committees', $columns, $request, 'id'); 
        
		$columns = array('committee_member_type','member_name','designation', 'contact_no', 'email', 'project_id');
		$request->project_id = $request->id;
		$i=0;
		if(!empty($request->member_names)>0){
			foreach($request->member_names as $team_member_key=>$team_member_name){
				if($team_member_name!=NULL){
					$request->member_name = $team_member_name;
					$request->designation = $request->designations[$i];
					$request->committee_member_type = $request->committee_member_types[$i];
					$request->contact_no = $request->contact_nos[$i];
					$request->email = $request->emails[$i];
					$this->grid->create('rmis_project_implementation_committee_members', $columns, $request, 'id');
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
		
       	$columns = array('committee_formation_date', 'project_id');
		$columns[] = 'organization_id';
		$request->organization_id = $this->config->item('organization_id');
        $columns[] = 'updated_at';        
        $request->updated_at = date('Y-m-d H:i:s');            
        $columns[] = 'updated_by';
        $request->updated_by = $this->loginUser->id;
        
		$data = $this->grid->update('rmis_project_implementation_committees', $columns, $request, 'project_id'); 
        
		$columns = array('committee_member_type','member_name','designation', 'contact_no', 'email', 'project_id');
		$i=0;
		if(!empty($request->member_names)>0){
			$this->project->clean_projectImplCommitteeMembers($request->project_id);
			foreach($request->member_names as $team_member_key=>$team_member_name){
				if($team_member_name!=NULL){
					$request->member_name = $team_member_name;
					$request->designation = $request->designations[$i];
					$request->committee_member_type = $request->committee_member_types[$i];
					$request->contact_no = $request->contact_nos[$i];
					$request->email = $request->emails[$i];
					$this->grid->create('rmis_project_implementation_committee_members', $columns, $request, 'id');
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
			 $data = $this->grid->destroy('rmis_project_implementation_committees', $request, 'project_id');
			 $data = $this->grid->destroy('rmis_project_implementation_committee_members', $request, 'project_id');
		}
		else{   
			header('Content-Type: application/json');
			$request = json_decode(file_get_contents('php://input'));
			$data = $this->grid->destroy('rmis_project_implementation_committees', $request->models, 'project_id');
			$data = $this->grid->destroy('rmis_project_implementation_committee_members', $request->models, 'project_id');
			echo json_encode($data , JSON_NUMERIC_CHECK);
		}        
	}	
    
	public function deleteTeamMember(){
		$team_member_id = $this->input->post('team_member_id');
		$project_id = $this->input->post('project_id');
		$this->project->deleteImplementationCommitteeMemberFromProgram($team_member_id,$project_id);
	}            
} 
?>