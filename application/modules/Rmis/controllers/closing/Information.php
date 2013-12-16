<?php

class Information extends MX_Controller{
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
    
    public function index($closingProgProjType = NULL, $closingProgProjID = NULL, $id = NULL){
        $this->template->title('Research Management(RM)', ' Program or Project Closing Info');
		$this->template->set('experiment_type',$closingProgProjType);
		$this->template->set('experiment_ProjProg_id',$closingProgProjID);
		$this->template->set('form_action_url', '/Rmis/closing/information/'.$closingProgProjType.'/'.$closingProgProjID);
        
		if($this->input->post('save_closing_info')){
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
        	if($this->input->post('update_closing_info')){
				$request = json_encode($this->input->post());
				$this->dataUpdate($request);
			}
			
			$closing_detail = $this->employee->get_closing_information($id);
			$this->template->set('closing_detail', serialize($closing_detail));
		}
		
		if($closingProgProjType=="ProgID" && $closingProgProjID!=0){
			$program_detail = $this->program->get_details($closingProgProjID);
			$this->template->set('program_detail', serialize($program_detail));
			$this->template->set('program_id',$closingProgProjID);
		}else if($closingProgProjType=="ProjID" && $closingProgProjID!=0){
			$project_detail = $this->project->get_details($closingProgProjID);
			if($project_detail!=NULL && $project_detail->program_id!="0"){
				$program_detail = $this->program->get_details($project_detail->program_id);
				$this->template->set('program_detail', serialize($program_detail));
				$this->template->set('program_id',$project_detail->program_id);
			}
			$this->template->set('project_detail', serialize($project_detail));
			$this->template->set('project_id',$closingProgProjID);
		}
		
		$program_areas = $this->grid->read('rmis_program_areas', array('id','program_area_id', 'program_area_name'), $request); 
		$this->template->set('program_areas',$program_areas);
		
        $this->template->set('content_header_icon', 'class="icofont-file"');
        $this->template->set('content_header_title', ' Program or Project Closing Info');
		
        $breadcrumb = '<ul class="breadcrumb">
						<li><a href="#"><i class="icofont-home"></i> RMIS</a> <span class="divider">&raquo;</span></li>
						<li class="active">Program or Project Closing Info</li>
					  </ul>';
        $this->template->set('breadcrumb', $breadcrumb);		
        $this->template->set_partial('closingInfo','closing/information/form');
        $this->template->set_partial('sidebar', 'layouts/sidebar',$_data)
               ->build('closing/information/index');
    }
	
	public function dataCreate($request){
        $request = json_decode($request);
        $columns = array('type', 'executive_summary', 'actual_output', 'recommendation', 'program_id', 'project_id');
        $columns[] = 'organization_id';
		$request->organization_id = $this->config->item('organization_id');
		$columns[] = 'created_at';
        $request->created_at = date('Y-m-d H:i:s');            
        $columns[] = 'created_by';
        $request->created_by = $this->loginUser->id;
        
        $data= $this->grid->create('rmis_closing_informations', $columns, $request, 'id'); 
        $data['success'] ="Data created successfuly";
    }
    
    public function dataUpdate($request){
        $request = json_decode($request);
        $columns = array('id', 'type', 'executive_summary', 'actual_output', 'recommendation', 'program_id', 'project_id');					
        $columns[] = 'organization_id';
		$request->organization_id = $this->config->item('organization_id');
		$columns[] = 'updated_at';        
        $request->updated_at = date('Y-m-d H:i:s');            
        $columns[] = 'updated_by';
        $request->updated_by = $this->loginUser->id;
        
        $data = $this->grid->update('rmis_closing_informations', $columns, $request, 'id'); 
        $data['success'] ="Data updated successfuly.";  
    }
                
} 
?>