<?php

class ActivityLists extends MX_Controller{
    private $_data;
    public function __construct(){
        parent::__construct();
        $this->load->model('Kendodatasource_model', 'grid');
       	$this->load->model('Project_model', 'project');

        $this->template->set_partial('header', 'layouts/header')
						->set_layout('extensive/main_layout');
    }
    
    public function index($project_id=NULL){
        $this->template->title('Research Management(RM)', ' Project', ' ProjectTask/WorkElement/Activity Information');
        
		if($this->input->post('save_activityLists')){
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
                
        if($project_id!=NULL){
			if($this->input->post('update_activityLists')){
				$request = json_encode($this->input->post());
				$this->dataUpdate($request);
			}
			
			$activityLists = $this->project->get_activityLists($project_id);
			$this->template->set('activityLists', serialize($activityLists));
			
			$project_detail = $this->project->get_details($project_id);
			$this->template->set('project_detail', serialize($project_detail));
			
			$this->template->set('project_id',$project_id);
		}
		
        $this->template->set('content_header_icon', 'class="icofont-file"');
        $this->template->set('content_header_title', 'Project Activity List Information');
        
		$program_areas = $this->grid->read('rmis_program_areas', array('id','program_area_id', 'program_area_name'), $request); 
		$this->template->set('program_areas',$program_areas);
		
        $breadcrumb = '<ul class="breadcrumb">
						<li><a href="#"><i class="icofont-home"></i> RMIS</a> <span class="divider">&raquo;</span></li>
						<li><a href="#">Project info.</a><span class="divider">&raquo;</span></li><li class="active">ProjectTask / WorkElement / Activity Information</li>
					  </ul>';
        $this->template->set('breadcrumb', $breadcrumb);		
        $this->template->set_partial('activityListForm','project/activityLists/form');
		$this->template->set_partial('tab_menu','project/form_tabs');
        $this->template->set_partial('sidebar', 'layouts/sidebar',$_data)
               ->build('project/activityLists/index');
    }
	
	public function dataCreate($request){
        $request = json_decode($request);
		
		$columns = array('s_o', 'work_element','planned_startDate','planned_endDate', 'actual_startDate', 'actual_endDate', 'assign_resource', 'project_id');
		$columns[] = 'organization_id';
		$request->organization_id = 1;
		$columns[] = 'created_at';
        $request->created_at = date('Y-m-d H:i:s');            
        $columns[] = 'created_by';
        $request->created_by = 1;
		$i=0;
		if(!empty($request->work_elements)>0){
			foreach($request->work_elements as $work_element_key=>$work_element){
				if($work_element!=NULL){
					$request->work_element = $work_element;
					$request->s_o = $request->s_os[$i];
					$request->planned_startDate = $request->planned_startDates[$i];
					$request->planned_endDate = $request->planned_endDates[$i];
					$request->actual_startDate = $request->actual_startDates[$i];
					$request->actual_endDate = $request->actual_endDates[$i];
					$request->assign_resource = $request->assign_resources[$i];
					$this->grid->create('rmis_project_activities', $columns, $request, 'id');
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
		
		$columns = array('s_o', 'work_element','planned_startDate','planned_endDate', 'actual_startDate', 'actual_endDate', 'assign_resource', 'project_id');
		$columns[] = 'organization_id';
		$request->organization_id = 1;
		$columns[] = 'created_at';
        $request->created_at = date('Y-m-d H:i:s');            
        $columns[] = 'created_by';
        $request->created_by = 1;
		$columns[] = 'updated_at';        
        $request->updated_at = date('Y-m-d H:i:s');            
        $columns[] = 'updated_by';
        $request->updated_by = 1;
		$i=0;
		if(!empty($request->work_elements)>0){
			$this->project->clean_projectActivityLists($request->project_id);
			foreach($request->work_elements as $work_element_key=>$work_element){
				if($work_element!=NULL){
					$request->work_element = $work_element;
					$request->s_o = $request->s_os[$i];
					$request->planned_startDate = $request->planned_startDates[$i];
					$request->planned_endDate = $request->planned_endDates[$i];
					$request->actual_startDate = $request->actual_startDates[$i];
					$request->actual_endDate = $request->actual_endDates[$i];
					$request->assign_resource = $request->assign_resources[$i];
					$this->grid->create('rmis_project_activities', $columns, $request, 'id');
					$i++;	
				}
			}
		}
		
		$data['success'] ="Data created successfuly.";
        //echo json_encode($data , JSON_NUMERIC_CHECK); 
    }

	public function deleteActivity(){
		$activity_id = $this->input->post('activity_id');
		$project_id = $this->input->post('project_id');
		$this->project->deleteActivityFromProject($activity_id,$project_id);
	}
                
} 
?>