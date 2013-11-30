<?php

class MonitorEvaluations extends MX_Controller{
    private $_data;
    public function __construct(){
        parent::__construct();
        $this->load->model('Kendodatasource_model', 'grid');
        $this->load->model('Program_model', 'program');
		$this->load->model('program_me_committee_model', 'ProgramCommitte');

        $this->template->set_partial('header', 'layouts/header')
						->set_layout('extensive/main_layout');
    }
    
    public function index($program_id=NULL){
        $this->template->title('Research Management(RM)', ' Programs', ' Program Monitoring & Evaluation Information');
        
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
        $_data['setup_training_program_type_menu_active'] ='';
        $_data['setup_institutes_menu_active'] ='';
        
        $this->template->append_metadata('<link href="/assets/kendoui/css/web/kendo.common.min.css"  rel="stylesheet"/>');
        $this->template->append_metadata('<link href="/assets/kendoui/css/web/kendo.default.min.css"  rel="stylesheet"/>');
        $this->template->append_metadata('<script src="/assets/kendoui/js/kendo.all.min.js"></script>');
        $this->template->append_metadata('<script src="/assets/js/custom/rmis.js"></script>');
                
        if($program_id!=NULL){
			$program_detail = $this->program->get_details($program_id);
			$this->template->set('program_detail', serialize($program_detail));
			
			$program_me_informations = $this->program->get_program_me_informations($program_id);
			$this->template->set('program_me_informations', serialize($program_me_informations));
			
			$activityLists = $this->program->get_activityLists($program_id);
			$this->template->set('activityLists', serialize($activityLists));
			
			$last_MandE_committee_details = $this->ProgramCommitte->get_last_formated_committee_details();
			$this->template->set('last_MandE_committee_details',serialize($last_MandE_committee_details));
			if($last_MandE_committee_details!=NULL){
				$last_MandE_committee_members = $this->ProgramCommitte->get_members($last_MandE_committee_details->committee_id);
				$this->template->set('last_MandE_committee_members',serialize($last_MandE_committee_members));	
			}
			
			$this->template->set('program_id',$program_id);
		}
		
        $this->template->set('content_header_icon', 'class="icofont-file"');
        $this->template->set('content_header_title', 'Program Information');
        
		$program_areas = $this->grid->read('rmis_program_areas', array('id','program_area_id', 'program_area_name'), $request); 
		$this->template->set('program_areas',$program_areas);
		
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
						<li><a href="#">Program info.</a><span class="divider">&raquo;</span></li><li class="active">Program Monitoring & Evaluation Information</li>
					  </ul>';
        $this->template->set('breadcrumb', $breadcrumb);		
        $this->template->set_partial('monitorEvaluationForm','program/monitorEvaluations/form');
		$this->template->set_partial('tab_menu','program/form_tabs');
        $this->template->set_partial('sidebar', 'layouts/sidebar',$_data)
               ->build('program/monitorEvaluations/index');
    }
	
	public function dataCreate($request){
        $request = json_decode($request);
		
		if($request->program_actual_outputs!="") {
			$request->program_actual_outputs = implode("---##########---", $request->program_actual_outputs);
		}else {
			$request->program_actual_outputs = "";
		}
		
       	$columns = array('program_me_date', 'program_me_type', 'program_rating', 'program_qualitative_status', 'program_total_point', 'program_average_grade_point', 'program_grade_point', 'program_letter_grade', 'program_id');
        $columns[] = 'organization_id';
		$request->organization_id = 1;		
		$columns[] = 'created_at';
        $request->created_at = date('Y-m-d H:i:s');            
        $columns[] = 'created_by';
        $request->created_by = 1;
       
        $data= $this->grid->create('rmis_program_me_informations', $columns, $request, 'id');
		
		$columns = array('program_id', 'program_actual_outputs', 'program_major_findings', 'program_progress_details', 'program_achievement_information');
       	$columns[] = 'organization_id';
		$request->organization_id = 1;
		$columns[] = 'updated_at';        
        $request->updated_at = date('Y-m-d H:i:s');            
        $columns[] = 'updated_by';
        $request->updated_by = 1;
        $data = $this->grid->update('rmis_program_informations', $columns, $request, 'program_id'); 
		
		$columns = array('id', 'comments', 'activity_status', 'activity_point');
        $columns[] = 'organization_id';
		$request->organization_id = 1;
		$columns[] = 'updated_at';        
        $request->updated_at = date('Y-m-d H:i:s');            
        $columns[] = 'updated_by';
        $request->updated_by = 1;
		
		$ActivityIDs = $request->ActivityID;
		if(!empty($ActivityIDs)){
			foreach($ActivityIDs as $activity_lists_key=>$activity_item_id){
				if($activity_item_id!=NULL){
					$request->id = $activity_item_id;
					$request->comments = $request->activityComments[$activity_lists_key];
					$request->activity_status = $request->activityStatuses[$activity_lists_key];
					$request->activity_point = $request->activityPoints[$activity_lists_key];
					$this->grid->update('rmis_program_activities', $columns, $request, 'id');
				}
			}
		}
		
		$columns = array('committee_member_id', 'is_present');
		$is_presents = $request->is_present;
       	$committee_member_ids = $request->committee_member_ids;
		if(!empty($committee_member_ids)){
			foreach($committee_member_ids as $committee_member_id_key => $committee_member_id){
				if(in_array($committee_member_id, $is_presents)){
					$request->committee_member_id = $committee_member_id;
					$request->is_present = "1";
					$this->grid->update('rmis_program_me_committee_members', $columns, $request, 'committee_member_id');
				}else{
					$request->committee_member_id = $committee_member_id;
					$request->is_present = "0";
					$this->grid->update('rmis_program_me_committee_members', $columns, $request, 'committee_member_id');
				}
			}
		}
		
        $data['success'] ="Data created successfuly.";
        //echo json_encode($data , JSON_NUMERIC_CHECK); 
    }
    
    public function dataDestroy($request=NULL){
		if($request!=NULL){
			$request = json_decode($request);
			$data = $this->grid->destroy('rmis_program_me_informations', $request, 'id');
			 
			$columns = array('program_id', 'program_actual_outputs', 'program_major_findings', 'program_progress_details', 'program_achievement_information');
	       	$columns[] = 'organization_id';
			$request->organization_id = 1;
			$columns[] = 'updated_at';        
	        $request->updated_at = date('Y-m-d H:i:s');            
	        $columns[] = 'updated_by';
	        $request->updated_by = 1;
			
			$request->program_actual_outputs = NULL;
			$request->program_major_findings = NULL;
			$request->program_progress_details = NULL;
			$request->program_achievement_information = NULL;
	        $data = $this->grid->update('rmis_program_informations', $columns, $request, 'program_id'); 
			
			$columns = array('id', 'comments', 'activity_status', 'activity_point');
	        $columns[] = 'organization_id';
			$request->organization_id = 1;
			$columns[] = 'updated_at';        
	        $request->updated_at = date('Y-m-d H:i:s');            
	        $columns[] = 'updated_by';
	        $request->updated_by = 1;
			
			$ActivityIDs = $request->ActivityID;
			if(!empty($ActivityIDs)){
				foreach($ActivityIDs as $activity_lists_key=>$activity_item_id){
					if($activity_item_id!=NULL){
						$request->id = $activity_item_id;
						$request->comments = NULL;
						$request->activity_status = NULL;
						$request->activity_point = NULL;
						$this->grid->update('rmis_program_activities', $columns, $request, 'id');
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
					$this->grid->update('rmis_program_me_committee_members', $columns, $request, 'committee_member_id');
				}
			}
			 
		}else{   
        	header('Content-Type: application/json');
        	$request = json_decode(file_get_contents('php://input'));
			$data = $this->grid->destroy('rmis_program_me_informations', $request->models, 'id'); 
        	echo json_encode($data , JSON_NUMERIC_CHECK);
		}        
    }
    	
	public function dataUpdate($request){
        $request = json_decode($request);
		
		if($request->program_actual_outputs!="") {
			$request->program_actual_outputs = implode("---##########---", $request->program_actual_outputs);
		}else {
			$request->program_actual_outputs = "";
		}
		
       	$columns = array('program_me_date', 'program_me_type', 'program_rating', 'program_qualitative_status', 'program_total_point', 'program_average_grade_point', 'program_grade_point', 'program_letter_grade', 'id');
        $columns[] = 'organization_id';
		$request->organization_id = 1;
		$columns[] = 'updated_at';        
        $request->updated_at = date('Y-m-d H:i:s');            
        $columns[] = 'updated_by';
        $request->updated_by = 1;
       
        $data= $this->grid->update('rmis_program_me_informations', $columns, $request, 'id');
		
		$columns = array('program_id', 'program_actual_outputs', 'program_major_findings', 'program_progress_details', 'program_achievement_information');
       	$columns[] = 'organization_id';
		$request->organization_id = 1;
		$columns[] = 'updated_at';        
        $request->updated_at = date('Y-m-d H:i:s');            
        $columns[] = 'updated_by';
        $request->updated_by = 1;
        $data = $this->grid->update('rmis_program_informations', $columns, $request, 'program_id'); 
		
		$columns = array('id', 'comments', 'activity_status', 'activity_point');
        $columns[] = 'organization_id';
		$request->organization_id = 1;
		$columns[] = 'updated_at';        
        $request->updated_at = date('Y-m-d H:i:s');            
        $columns[] = 'updated_by';
        $request->updated_by = 1;
		
		$ActivityIDs = $request->ActivityID;
		if(!empty($ActivityIDs)){
			foreach($ActivityIDs as $activity_lists_key=>$activity_item_id){
				if($activity_item_id!=NULL){
					$request->id = $activity_item_id;
					$request->comments = $request->activityComments[$activity_lists_key];
					$request->activity_status = $request->activityStatuses[$activity_lists_key];
					$request->activity_point = $request->activityPoints[$activity_lists_key];
					$this->grid->update('rmis_program_activities', $columns, $request, 'id');
				}
			}
		}
		
		$columns = array('committee_member_id', 'is_present');
		$is_presents = $request->is_present;
       	$committee_member_ids = $request->committee_member_ids;
		if(!empty($committee_member_ids)){
			foreach($committee_member_ids as $committee_member_id_key => $committee_member_id){
				if(in_array($committee_member_id, $is_presents)){
					$request->committee_member_id = $committee_member_id;
					$request->is_present = "1";
					$this->grid->update('rmis_program_me_committee_members', $columns, $request, 'committee_member_id');
				}else{
					$request->committee_member_id = $committee_member_id;
					$request->is_present = "0";
					$this->grid->update('rmis_program_me_committee_members', $columns, $request, 'committee_member_id');
				}
			}
		}
        $data['success'] ="Data updated successfuly.";
        //echo json_encode($data , JSON_NUMERIC_CHECK);  
    }
                
} 
?>