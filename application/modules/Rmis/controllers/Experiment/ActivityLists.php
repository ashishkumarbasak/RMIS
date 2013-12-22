<?php

class ActivityLists extends MX_Controller{
    private $_data;
    public function __construct(){
        parent::__construct();
        $this->load->model('Kendodatasource_model', 'grid');
       	$this->load->model('Program_model', 'program');
		$this->load->model('Project_model', 'project');
		$this->load->model('Experiment_model', 'experiment');

        $this->template->set_partial('header', 'layouts/header')
						->set_layout('extensive/main_layout');
    }
    
    public function index($experiment_type=NULL, $experiment_ProjProg_id=NULL, $experiment_id=NULL){
        $this->template->title('Research Management(RM)', ' Programs', ' ProgramTask/WorkElement/Activity Information');
        $this->template->set('experiment_type',$experiment_type);
		$this->template->set('experiment_ProjProg_id',$experiment_ProjProg_id);
		$this->template->set('experiment_id',$experiment_id);
		
		if($this->input->post('save_activityLists')){
			$request = json_encode($this->input->post());
			$this->dataCreate($request);
		}
		
        $_data['dashboard_menu_active'] = '';
        $_data['setup_menu_active'] = 'class="active"';
        $_data['setup_funds_menu_active'] ='class="active"';
        $_data['setup_training_experiment_type_menu_active'] ='';
        $_data['setup_institutes_menu_active'] ='';
        
        $this->template->append_metadata('<link href="/assets/kendoui/css/web/kendo.common.min.css"  rel="stylesheet"/>');
        $this->template->append_metadata('<link href="/assets/kendoui/css/web/kendo.default.min.css"  rel="stylesheet"/>');
        $this->template->append_metadata('<script src="/assets/kendoui/js/kendo.all.min.js"></script>');
        $this->template->append_metadata('<script src="/assets/js/custom/rmis.js"></script>');
                
        if($experiment_id!=NULL){
			if($this->input->post('update_activityLists')){
				$request = json_encode($this->input->post());
				$this->dataUpdate($request);
			}
						
			$activityLists = $this->experiment->get_activityLists($experiment_id);
			$this->template->set('activityLists', serialize($activityLists));
			
			$experiment_detail = $this->experiment->get_other_details($experiment_id);
			$this->template->set('experiment_detail', serialize($experiment_detail));
			
			$this->template->set('experiment_id',$experiment_id);
		}
		
		if($experiment_type=="ProgID" && $experiment_ProjProg_id!=0){
			$program_detail = $this->program->get_details($experiment_ProjProg_id);
			$this->template->set('program_detail', serialize($program_detail));
			$this->template->set('program_id',$experiment_ProjProg_id);
		}else if($experiment_type=="ProjID" && $experiment_ProjProg_id!=0){
			$project_detail = $this->project->get_details($experiment_ProjProg_id);
			$this->template->set('project_detail', serialize($project_detail));
			$this->template->set('project_id',$experiment_ProjProg_id);
		}
		
        $this->template->set('content_header_icon', 'class="icofont-file"');
        $this->template->set('content_header_title', 'Experiment Activity List Information');
        
		$program_areas = $this->grid->read('rmis_program_areas', array('id','program_area_id', 'program_area_name'), $request); 
		$this->template->set('program_areas',$program_areas);
		
        $breadcrumb = '<ul class="breadcrumb">
						<li><a href="#"><i class="icofont-home"></i> RMIS</a> <span class="divider">&raquo;</span></li>
						<li><a href="#">Experiment info.</a><span class="divider">&raquo;</span></li><li class="active">ProgramTask / WorkElement / Activity Information</li>
					  </ul>';
        $this->template->set('breadcrumb', $breadcrumb);		
        $this->template->set_partial('activityListForm','experiment/activityLists/form');
		$this->template->set_partial('tab_menu','experiment/form_tabs');
        $this->template->set_partial('sidebar', 'layouts/sidebar',$_data)
               ->build('experiment/activityLists/index');
    }
	
	public function dataCreate($request){
        $request = json_decode($request);
		
		$columns = array('sort_order', 'work_element','planned_start_date','planned_end_date', 'actual_start_date', 'actual_end_date', 'assign_resource', 'experiment_id');
		$columns[] = 'organization_id';
		$request->organization_id = $this->config->item('organization_id');
		$columns[] = 'created_at';
        $request->created_at = date('Y-m-d H:i:s');            
        $columns[] = 'created_by';
        $request->created_by = $this->loginUser->id;

		$activity_lists = json_decode($this->input->post('activity_lists'));
		if(!empty($activity_lists)){
			foreach($activity_lists as $activity_lists_key=>$activity_lists_item){
				if($activity_lists_item!=NULL){
					$request->sort_order = $activity_lists_item->SortOrder;
					$request->work_element = $activity_lists_item->WorkElement;
					$request->planned_start_date = $activity_lists_item->PlannedStartDate;
					$request->planned_end_date = $activity_lists_item->PlannedEndDate;
					$request->actual_start_date = $activity_lists_item->ActualStartDate;
					$request->actual_end_date = $activity_lists_item->ActualEndDate;
					$request->assign_resource = $activity_lists_item->AssignResourceID;
					$this->grid->create('rmis_experiment_activities', $columns, $request, 'id');
				}
			}
		}		
		$data['success'] ="Data created successfuly."; 
    }

	function get_activityLists($experiment_id=NULL){
		header('Content-Type: application/json');
        $request = json_decode(file_get_contents('php://input'));
        $activityLists = $this->experiment->get_activityLists($experiment_id);
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
	
	public function dataUpdate($request){
        $request = json_decode($request);
		
		$columns = array('sort_order', 'work_element','planned_start_date','planned_end_date', 'actual_start_date', 'actual_end_date', 'assign_resource', 'experiment_id');
		$columns[] = 'organization_id';
		$request->organization_id = $this->config->item('organization_id');
		$columns[] = 'created_at';
        $request->created_at = date('Y-m-d H:i:s');            
        $columns[] = 'created_by';
        $request->created_by = $this->loginUser->id;
		$columns[] = 'updated_at';        
        $request->updated_at = date('Y-m-d H:i:s');            
        $columns[] = 'updated_by';
        $request->updated_by = $this->loginUser->id;
		
		$activity_lists = json_decode($this->input->post('activity_lists'));
		$this->experiment->clean_experimentActivityLists($request->experiment_id);
		if(!empty($activity_lists)){
			foreach($activity_lists as $activity_lists_key=>$activity_lists_item){
				if($activity_lists_item!=NULL){
					$request->sort_order = $activity_lists_item->SortOrder;
					$request->work_element = $activity_lists_item->WorkElement;
					$request->planned_start_date = $activity_lists_item->PlannedStartDate;
					$request->planned_end_date = $activity_lists_item->PlannedEndDate;
					$request->actual_start_date = $activity_lists_item->ActualStartDate;
					$request->actual_end_date = $activity_lists_item->ActualEndDate;
					$request->assign_resource = $activity_lists_item->AssignResourceID;
					$this->grid->create('rmis_experiment_activities', $columns, $request, 'id');
				}
			}
		}
		$data['success'] ="Data created successfuly.";
    }

	public function deleteActivity(){
		$activity_id = $this->input->post('activity_id');
		$experiment_id = $this->input->post('experiment_id');
		$this->experiment->deleteActivityFromProgram($activity_id,$experiment_id);
	}
                
} 
?>