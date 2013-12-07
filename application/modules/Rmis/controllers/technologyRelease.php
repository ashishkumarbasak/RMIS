<?php

class TechnologyRelease extends MX_Controller{
    private $_data;
    public function __construct(){
        parent::__construct();
        $this->load->model('Kendodatasource_model', 'grid');
        $this->load->model('Program_model', 'program');
		$this->load->model('Project_model', 'project');
		$this->load->model('Employee_model', 'employee');

        $this->template->set_partial('header', 'layouts/header')
						->set_layout('extensive/main_layout');
    }
    
    public function index($id=NULL){
        $this->template->title('Research Management(RM)', ' Technology Release Information');
        
		if($this->input->post('save_logical_framework')){
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
                
        if($id!=NULL){
        	if($this->input->post('update_logical_framework')){
				$request = json_encode($this->input->post());
				$this->dataUpdate($request);
			}
			
			$logical_framework_details = $this->employee->get_logical_frameworkrmation($id);
			$this->template->set('logical_framework_details', serialize($logical_framework_details));
			
			$project_detail = $this->project->get_details($id);
			$this->template->set('project_detail', serialize($project_detail));
			
			$program_detail = $this->program->get_details($id);
			$this->template->set('program_detail', serialize($program_detail));
			
			$this->template->set('id',$id);
		}
		
		$program_areas = $this->grid->read('rmis_program_areas', array('id','program_area_id', 'program_area_name'), $request); 
		$this->template->set('program_areas',$program_areas);
		
        $this->template->set('content_header_icon', 'class="icofont-file"');
        $this->template->set('content_header_title', ' Technology Release Information');
		
        $breadcrumb = '<ul class="breadcrumb">
						<li><a href="#"><i class="icofont-home"></i> RMIS</a> <span class="divider">&raquo;</span></li>
						<li class="active">Technology Release Information</li>
					  </ul>';
        $this->template->set('breadcrumb', $breadcrumb);		
        $this->template->set_partial('technologyReleaseInfo','technologyRelease/form');
        $this->template->set_partial('sidebar', 'layouts/sidebar',$_data)
               ->build('technologyRelease/index');
    }
	
	public function dataCreate($request){
        $request = json_decode($request);
        $columns = array('type', 
							'verifiable_indicators_goal', 'verifiable_indicators_purpose', 'verifiable_indicators_outputs', 'verifiable_indicators_activities', 
							'means_of_verification_goal', 'means_of_verification_purpose', 'means_of_verification_outputs', 'means_of_verification_activities', 
							'important_assumptions_goal', 'important_assumptions_purpose', 'important_assumptions_outputs', 'important_assumptions_activities', 
							'program_id', 'project_id', 'experiment_id');
        $columns[] = 'organization_id';
		$request->organization_id = $this->config->item('organization_id');
		$columns[] = 'created_at';
        $request->created_at = date('Y-m-d H:i:s');            
        $columns[] = 'created_by';
        $request->created_by = $this->loginUser->id;
        
        $data= $this->grid->create('rmis_logical_framework', $columns, $request, 'id'); 
       $data['success'] ="Data created successfuly";
    }
    
    public function dataUpdate($request){
        $request = json_decode($request);
        $columns = array('id', 'type', 
							'verifiable_indicators_goal', 'verifiable_indicators_purpose', 'verifiable_indicators_outputs', 'verifiable_indicators_activities', 
							'means_of_verification_goal', 'means_of_verification_purpose', 'means_of_verification_outputs', 'means_of_verification_activities', 
							'important_assumptions_goal', 'important_assumptions_purpose', 'important_assumptions_outputs', 'important_assumptions_activities', 
							'program_id', 'project_id', 'experiment_id');
											
        $columns[] = 'organization_id';
		$request->organization_id = $this->config->item('organization_id');
		$columns[] = 'updated_at';        
        $request->updated_at = date('Y-m-d H:i:s');            
        $columns[] = 'updated_by';
        $request->updated_by = $this->loginUser->id;
        
        $data = $this->grid->update('rmis_logical_framework', $columns, $request, 'id'); 
        $data['success'] ="Data updated successfuly.";  
    }
} 
?>