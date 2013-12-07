<?php

class OtherInformations extends MX_Controller{
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
    
    public function index($experiment_id=NULL){
        $this->template->title('Research Management(RM)', ' Programs', ' Experiment Other Information');
        
		if($this->input->post('save_experiment_otherinfo')){
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
        	if($this->input->post('update_experiment_otherinfo')){
				$request = json_encode($this->input->post());
				$this->dataUpdate($request);
			}
			
			$experiment_detail = $this->experiment->get_other_details($experiment_id);
			$this->template->set('experiment_detail', serialize($experiment_detail));
			
			$project_detail = $this->project->get_details($experiment_id);
			$this->template->set('project_detail', serialize($project_detail));
			
			$program_detail = $this->program->get_details($experiment_id);
			$this->template->set('program_detail', serialize($program_detail));
			
			$this->template->set('experiment_id',$experiment_id);
		}
		
		$program_areas = $this->grid->read('rmis_program_areas', array('id','program_area_id', 'program_area_name'), $request); 
		$this->template->set('program_areas',$program_areas);
		
        $this->template->set('content_header_icon', 'class="icofont-file"');
        $this->template->set('content_header_title', 'Experiment Other Information');
		
        $breadcrumb = '<ul class="breadcrumb">
						<li><a href="#"><i class="icofont-home"></i> RMIS</a> <span class="divider">&raquo;</span></li>
						<li><a href="#">Experiment info.</a><span class="divider">&raquo;</span></li><li class="active">Experiment Other Information</li>
					  </ul>';
        $this->template->set('breadcrumb', $breadcrumb);		
        $this->template->set_partial('progOtherInfoForm','experiment/otherInformations/form');
		$this->template->set_partial('tab_menu','experiment/form_tabs');
        $this->template->set_partial('sidebar', 'layouts/sidebar',$_data)
               ->build('experiment/otherInformations/index');
    }
	
	public function dataCreate($request){
        //header('Content-Type: application/json');
        //$request = json_decode(file_get_contents('php://input'));
        $request = json_decode($request);
        $columns = array('experiment_rationale', 'experiment_commodity', 'experiment_methodology', 'experiment_background', 'experiment_socio_economical_impact', 
        				'experiment_environmental_impact', 'experiment_targeted_beneficiary', 'experiment_reference', 'experiment_external_affiliation',
        				'experiment_organization_policy', 'experiment_record_to_keep', 'experiment_id');
        $columns[] = 'organization_id';
		$request->organization_id = $this->config->item('organization_id');
		$columns[] = 'created_at';
        $request->created_at = date('Y-m-d H:i:s');            
        $columns[] = 'created_by';
        $request->created_by = $this->loginUser->id;
        
        $data= $this->grid->create('rmis_experiment_other_informations', $columns, $request, 'id'); 
        $data['success'] ="Data created successfuly.";
        //echo json_encode($data , JSON_NUMERIC_CHECK); 
    }
    
    public function dataUpdate($request){
        //header('Content-Type: application/json');
        //$request = json_decode(file_get_contents('php://input'));
        $request = json_decode($request);
        $columns = array('experiment_rationale', 'experiment_commodity', 'experiment_methodology', 'experiment_background', 'experiment_socio_economical_impact', 
        				'experiment_environmental_impact', 'experiment_targeted_beneficiary', 'experiment_reference', 'experiment_external_affiliation',
        				'experiment_organization_policy', 'experiment_record_to_keep', 'id');
							
        $columns[] = 'organization_id';
		$request->organization_id = $this->config->item('organization_id');
		$columns[] = 'updated_at';        
        $request->updated_at = date('Y-m-d H:i:s');            
        $columns[] = 'updated_by';
        $request->updated_by = $this->loginUser->id;
        
        $data = $this->grid->update('rmis_experiment_other_informations', $columns, $request, 'id'); 
        $data['success'] ="Data updated successfuly.";
        //echo json_encode($data , JSON_NUMERIC_CHECK);  
    }
                
} 
?>