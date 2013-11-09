<?php

class OtherInformations extends MX_Controller{
    private $_data;
    public function __construct(){
        parent::__construct();
        $this->load->model('Kendodatasource_model', 'grid');
        $this->load->model('Project_model', 'project');

        $this->template->set_partial('header', 'layouts/header')
						->set_layout('extensive/main_layout');
    }
    
    public function index($project_id=NULL){
        $this->template->title('Research Management(RM)', ' Project', ' Project Other Information');
        
		if($this->input->post('save_project_otherinfo')){
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
        	if($this->input->post('update_project_otherinfo')){
				$request = json_encode($this->input->post());
				$this->dataUpdate($request);
			}
			
			$project_detail = $this->project->get_details($project_id);
			$this->template->set('project_detail', serialize($project_detail));
			
			$this->template->set('project_id',$project_id);
		}
		
        $this->template->set('content_header_icon', 'class="icofont-file"');
        $this->template->set('content_header_title', 'Project Other Information');
		
        $breadcrumb = '<ul class="breadcrumb">
						<li><a href="#"><i class="icofont-home"></i> RMIS</a> <span class="divider">&raquo;</span></li>
						<li><a href="#">Project info.</a><span class="divider">&raquo;</span></li><li class="active">Project Other Information</li>
					  </ul>';
        $this->template->set('breadcrumb', $breadcrumb);		
        $this->template->set_partial('progOtherInfoForm','project/otherInformations/form');
		$this->template->set_partial('tab_menu','project/form_tabs');
        $this->template->set_partial('sidebar', 'layouts/sidebar',$_data)
               ->build('project/otherInformations/index');
    }
	
	public function dataCreate($request){
        //header('Content-Type: application/json');
        //$request = json_decode(file_get_contents('php://input'));
        $request = json_decode($request);
        $columns = array('project_rationale', 'project_methodology', 'project_background', 'project_socio_economical_impact', 
        				'project_environmental_impact', 'project_targeted_beneficiary', 'project_reference', 'project_external_affiliation',
        				'project_organization_policy', 'project_risks', 'project_id');
        $columns[] = 'created_at';
        $request->created_at = date('Y-m-d H:i:s');            
        $columns[] = 'created_by';
        $request->created_by = 1;
        
        $data= $this->grid->create('rmis_project_other_informations', $columns, $request, 'id'); 
        $data['success'] ="Data created successfuly.";
        //echo json_encode($data , JSON_NUMERIC_CHECK); 
    }
    
    public function dataUpdate($request){
        //header('Content-Type: application/json');
        //$request = json_decode(file_get_contents('php://input'));
        $request = json_decode($request);
        $columns = array('project_rationale', 'project_methodology', 'project_background', 'project_socio_economical_impact', 
        				'project_environmental_impact', 'project_targeted_beneficiary', 'project_reference', 'project_external_affiliation',
        				'project_organization_policy', 'project_risks', 'id');
							
        $columns[] = 'modified_at';        
        $request->modified_at = date('Y-m-d H:i:s');            
        $columns[] = 'modified_by';
        $request->modified_by = 1;
        
        $data = $this->grid->update('rmis_project_other_informations', $columns, $request, 'id'); 
        $data['success'] ="Data updated successfuly.";
        //echo json_encode($data , JSON_NUMERIC_CHECK);  
    }
                
} 
?>