<?php

class MonitorEvaluations extends MX_Controller{
    private $_data;
    public function __construct(){
        parent::__construct();
        $this->load->model('Kendodatasource_model', 'grid');
        $this->load->model('Program_model', 'program');
		$this->load->model('Project_model', 'project');
		$this->load->model('Project_me_committee_model', 'ProjectCommitte');

        $this->template->set_partial('header', 'layouts/header')
						->set_layout('extensive/main_layout');
    }
    
    public function index($program_id=NULL, $project_id=NULL){
        $this->template->title('Research Management(RM)', ' Programs', ' Project Monitoring & Evaluation Information');
		$this->template->set('project_id',$project_id);
		$this->template->set('program_id',$program_id);
        
		if($this->input->post('save_programMEInformation')){
			$request = json_encode($this->input->post());
			$this->dataCreate($request);
		}
		
		if($this->input->post('update_programMEInformation')){
			$request = json_encode($this->input->post());
			$this->dataUpdate($request);
		}
		
		if($this->input->post('delete_programMEInformation')){
			$request = json_encode($this->input->post());
			$this->dataDestroy($request);
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
			$project_detail = $this->project->get_details($project_id);
			$this->template->set('project_detail', serialize($project_detail));
			
			$program_areas = $this->grid->read('rmis_program_areas', array('id','program_area_id', 'program_area_name'), $request); 
			$this->template->set('program_areas',$program_areas);
			
			$project_me_informations = $this->project->get_project_me_informations($project_id);
			$this->template->set('project_me_informations', serialize($project_me_informations));
			
			$activityLists = $this->project->get_activityLists($project_id);
			$this->template->set('activityLists', serialize($activityLists));
			
			$last_MandE_committee_details = $this->ProjectCommitte->get_last_formated_committee_details($project_id);
			//print_r($last_MandE_committee_details);
			$this->template->set('last_MandE_committee_details',serialize($last_MandE_committee_details));
			/*if($last_MandE_committee_details!=NULL){
				$last_MandE_committee_members = $this->ProjectCommitte->get_members($last_MandE_committee_details->committee_id);
				$this->template->set('last_MandE_committee_members',serialize($last_MandE_committee_members));	
			}*/
			
			$this->template->set('project_id',$project_id);
		}

		if($program_id!=NULL || $program_id!=0){
			$program_detail = $this->program->get_details($program_id);
			$this->template->set('program_detail', serialize($program_detail));
		}
		
        $this->template->set('content_header_icon', 'class="icofont-file"');
        $this->template->set('content_header_title', 'Project Information');
        
		$project_areas = $this->grid->read('rmis_project_areas', array('id','project_area_id', 'project_area_name'), $request); 
		$this->template->set('project_areas',$project_areas);
		
		$qualitative_status = $this->grid->read('rmis_qualitative_status', array('value','name', 'is_active'), $request); 
		$this->template->set('qualitative_status', $qualitative_status);
		
		$activity_statuses = $this->grid->read('rmis_activity_statuses', array('value','name', 'is_active'), $request); 
		$this->template->set('activity_statuses', $activity_statuses);
		
		$program_rating = $this->grid->read('rmis_program_rating', array('value','name', 'is_active'), $request); 
		$this->template->set('program_rating', $program_rating);
		
		$monitoring_and_evaluation_type = $this->grid->read('rmis_monitoring_and_evaluation_type', array('value','name', 'is_active'), $request); 
		$this->template->set('monitoring_and_evaluation_type', $monitoring_and_evaluation_type);
	
        $breadcrumb = '<ul class="breadcrumb">
						<li><a href="#"><i class="icofont-home"></i> RMIS</a> <span class="divider">&raquo;</span></li>
						<li><a href="#">Project info.</a><span class="divider">&raquo;</span></li><li class="active">Project Monitoring & Evaluation Information</li>
					  </ul>';
        $this->template->set('breadcrumb', $breadcrumb);		
        $this->template->set_partial('monitorEvaluationForm','project/monitorEvaluations/form');
		$this->template->set_partial('tab_menu','project/form_tabs');
        $this->template->set_partial('sidebar', 'layouts/sidebar',$_data)
               ->build('project/monitorEvaluations/index');
    }
	
	public function dataCreate($request){
        $request = json_decode($request);
		
		if($request->project_actual_outputs!="") {
			$request->project_actual_outputs = implode("---##########---", $request->project_actual_outputs);
		}else {
			$request->project_actual_outputs = "";
		}
		
       	$columns = array('project_me_date', 'project_me_type', 'project_rating', 'project_qualitative_status', 'project_total_point', 'project_average_grade_point', 'project_grade_point', 'project_letter_grade', 'project_id');
        $columns[] = 'organization_id';
		$request->organization_id = $this->config->item('organization_id');		
		$columns[] = 'created_at';
        $request->created_at = date('Y-m-d H:i:s');            
        $columns[] = 'created_by';
        $request->created_by = $this->loginUser->id;
       
        $data= $this->grid->create('rmis_project_me_informations', $columns, $request, 'id');
		
		$columns = array('project_id', 'project_actual_outputs', 'project_major_findings', 'project_progress_details', 'project_achievement_information');
       	$columns[] = 'organization_id';
		$request->organization_id = $this->config->item('organization_id');
		$columns[] = 'updated_at';        
        $request->updated_at = date('Y-m-d H:i:s');            
        $columns[] = 'updated_by';
        $request->updated_by = $this->loginUser->id;
        $data = $this->grid->update('rmis_project_informations', $columns, $request, 'project_id'); 
		
		$columns = array('id', 'comments', 'activity_status', 'activity_point');
        $columns[] = 'organization_id';
		$request->organization_id = $this->config->item('organization_id');
		$columns[] = 'updated_at';        
        $request->updated_at = date('Y-m-d H:i:s');            
        $columns[] = 'updated_by';
        $request->updated_by = $this->loginUser->id;
		
		$ActivityIDs = $request->ActivityID;
		if(!empty($ActivityIDs)){
			foreach($ActivityIDs as $activity_lists_key=>$activity_item_id){
				if($activity_item_id!=NULL){
					$request->id = $activity_item_id;
					$request->comments = $request->activityComments[$activity_lists_key];
					$request->activity_status = $request->activityStatuses[$activity_lists_key];
					$request->activity_point = $request->activityPoints[$activity_lists_key];
					$this->grid->update('rmis_project_activities', $columns, $request, 'id');
				}
			}
		}
		
		$columns = array('id', 'is_present');
		$is_presents = $request->is_present;
       	$committee_member_ids = $request->committee_member_ids;
		if(!empty($committee_member_ids)){
			foreach($committee_member_ids as $committee_member_id_key => $committee_member_id){
				if(in_array($committee_member_id, $is_presents)){
					$request->id = $committee_member_id;
					$request->is_present = "1";
					$this->grid->update('rmis_project_monitoring_committee_members', $columns, $request, 'id');
				}else{
					$request->id = $committee_member_id;
					$request->is_present = "0";
					$this->grid->update('rmis_project_monitoring_committee_members', $columns, $request, 'id');
				}
			}
		}
		
        $data['success'] ="Data created successfuly.";
        //echo json_encode($data , JSON_NUMERIC_CHECK); 
    }
    
    public function dataDestroy($request=NULL){
		if($request!=NULL){
			$request = json_decode($request);
			$data = $this->grid->destroy('rmis_project_me_informations', $request, 'id');
			 
			$columns = array('project_id', 'project_actual_outputs', 'project_major_findings', 'project_progress_details', 'project_achievement_information');
	       	$columns[] = 'organization_id';
			$request->organization_id = $this->config->item('organization_id');
			$columns[] = 'updated_at';        
	        $request->updated_at = date('Y-m-d H:i:s');            
	        $columns[] = 'updated_by';
	        $request->updated_by = $this->loginUser->id;
			
			$request->project_actual_outputs = NULL;
			$request->project_major_findings = NULL;
			$request->project_progress_details = NULL;
			$request->project_achievement_information = NULL;
	        $data = $this->grid->update('rmis_project_informations', $columns, $request, 'project_id'); 
			
			$columns = array('id', 'comments', 'activity_status', 'activity_point');
	        $columns[] = 'organization_id';
			$request->organization_id = $this->config->item('organization_id');
			$columns[] = 'updated_at';        
	        $request->updated_at = date('Y-m-d H:i:s');            
	        $columns[] = 'updated_by';
	        $request->updated_by = $this->loginUser->id;
			
			$ActivityIDs = $request->ActivityID;
			if(!empty($ActivityIDs)){
				foreach($ActivityIDs as $activity_lists_key=>$activity_item_id){
					if($activity_item_id!=NULL){
						$request->id = $activity_item_id;
						$request->comments = NULL;
						$request->activity_status = NULL;
						$request->activity_point = NULL;
						$this->grid->update('rmis_project_activities', $columns, $request, 'id');
					}
				}
			}
			
			$columns = array('committee_member_id', 'is_present');
			$is_presents = $request->is_present;
	       	$committee_member_ids = $request->committee_member_ids;
			if(!empty($committee_member_ids)){
				foreach($committee_member_ids as $committee_member_id_key => $committee_member_id){
					$request->committee_member_id = $committee_member_id;
					$request->is_present = "1";
					$this->grid->update('rmis_project_me_committee_members', $columns, $request, 'committee_member_id');
				}
			}
			 
		}else{   
        	header('Content-Type: application/json');
        	$request = json_decode(file_get_contents('php://input'));
			$data = $this->grid->destroy('rmis_project_me_informations', $request->models, 'id'); 
        	echo json_encode($data , JSON_NUMERIC_CHECK);
		}        
    }
    	
	public function dataUpdate($request){
        $request = json_decode($request);
		
		if($request->project_actual_outputs!="") {
			$request->project_actual_outputs = implode("---##########---", $request->project_actual_outputs);
		}else {
			$request->project_actual_outputs = "";
		}
		
       	$columns = array('project_me_date', 'project_me_type', 'project_rating', 'project_qualitative_status', 'project_total_point', 'project_average_grade_point', 'project_grade_point', 'project_letter_grade', 'id');
        $columns[] = 'organization_id';
		$request->organization_id = $this->config->item('organization_id');
		$columns[] = 'updated_at';        
        $request->updated_at = date('Y-m-d H:i:s');            
        $columns[] = 'updated_by';
        $request->updated_by = $this->loginUser->id;
       
        $data= $this->grid->update('rmis_project_me_informations', $columns, $request, 'id');
		
		$columns = array('project_id', 'project_actual_outputs', 'project_major_findings', 'project_progress_details', 'project_achievement_information');
       	$columns[] = 'organization_id';
		$request->organization_id = $this->config->item('organization_id');
		$columns[] = 'updated_at';        
        $request->updated_at = date('Y-m-d H:i:s');            
        $columns[] = 'updated_by';
        $request->updated_by = $this->loginUser->id;
        $data = $this->grid->update('rmis_project_informations', $columns, $request, 'project_id'); 
		
		$columns = array('id', 'comments', 'activity_status', 'activity_point');
        $columns[] = 'organization_id';
		$request->organization_id = $this->config->item('organization_id');
		$columns[] = 'updated_at';        
        $request->updated_at = date('Y-m-d H:i:s');            
        $columns[] = 'updated_by';
        $request->updated_by = $this->loginUser->id;
		
		$ActivityIDs = $request->ActivityID;
		if(!empty($ActivityIDs)){
			foreach($ActivityIDs as $activity_lists_key=>$activity_item_id){
				if($activity_item_id!=NULL){
					$request->id = $activity_item_id;
					$request->comments = $request->activityComments[$activity_lists_key];
					$request->activity_status = $request->activityStatuses[$activity_lists_key];
					$request->activity_point = $request->activityPoints[$activity_lists_key];
					$this->grid->update('rmis_project_activities', $columns, $request, 'id');
				}
			}
		}
		
		$columns = array('id', 'is_present');
		$is_presents = $request->is_present;
       	$committee_member_ids = $request->committee_member_ids;
		if(!empty($committee_member_ids)){
			foreach($committee_member_ids as $committee_member_id_key => $committee_member_id){
				if(in_array($committee_member_id, $is_presents)){
					$request->id = $committee_member_id;
					$request->is_present = "1";
					$this->grid->update('rmis_project_monitoring_committee_members', $columns, $request, 'id');
				}else{
					$request->id = $committee_member_id;
					$request->is_present = "0";
					$this->grid->update('rmis_project_monitoring_committee_members', $columns, $request, 'id');
				}
			}
		}
		//print_r($request);
       $data['success'] ="Data updated successfuly.";
        //echo json_encode($data , JSON_NUMERIC_CHECK);  
    }
                
} 
?>