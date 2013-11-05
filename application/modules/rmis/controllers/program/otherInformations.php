<?php

class OtherInformations extends MX_Controller{
    private $_data;
    public function __construct(){
        parent::__construct();
        $this->load->model('Kendodatasource_model', 'grid');
        $this->load->model('Program_model', 'program');

        $this->template->set_partial('header', 'layouts/header')
						->set_layout('extensive/main_layout');
    }
    
    public function index($program_id=NULL){
        $this->template->title('Research Management(RM)', ' Programs', ' Program Other Information');
        
		if($this->input->post('save_program_otherinfo')){
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
        $this->template->append_metadata('<script src="/assets/js/custom/tmis.js"></script>');
                
        if($program_id!=NULL){
        	if($this->input->post('update_program_otherinfo')){
				$request = json_encode($this->input->post());
				$this->dataUpdate($request);
			}
			
			$program_detail = $this->program->get_details($program_id);
			$this->template->set('program_detail', serialize($program_detail));
			
			$this->template->set('program_id',$program_id);
		}
		
		$program_areas = $this->grid->read('rmis_program_areas', array('id','program_area_id', 'program_area_name'), $request); 
		$this->template->set('program_areas',$program_areas); //$this->program->get_program_area()
		
        $this->template->set('content_header_icon', 'class="icofont-file"');
        $this->template->set('content_header_title', 'Program Other Information');
		
        $breadcrumb = '<ul class="breadcrumb">
						<li><a href="#"><i class="icofont-home"></i> RMIS</a> <span class="divider">&raquo;</span></li>
						<li><a href="#">Program info.</a><span class="divider">&raquo;</span></li><li class="active">Program Other Information</li>
					  </ul>';
        $this->template->set('breadcrumb', $breadcrumb);		
        $this->template->set_partial('progOtherInfoForm','program/otherInformations/form');
		$this->template->set_partial('tab_menu','program/form_tabs');
        $this->template->set_partial('sidebar', 'layouts/sidebar',$_data)
               ->build('program/otherInformations/index');
    }
	
	public function dataCreate($request){
        //header('Content-Type: application/json');
        //$request = json_decode(file_get_contents('php://input'));
        $request = json_decode($request);
        $columns = array('program_rationale', 'program_methodology', 'program_background', 'program_socio_economical_impact', 
        				'program_environmental_impact', 'program_targeted_beneficiary', 'program_reference', 'program_external_affiliation',
        				'program_organization_policy', 'program_risks', 'program_id');
        $columns[] = 'organization_id';
		$request->organization_id = 1;
		$columns[] = 'created_at';
        $request->created_at = date('Y-m-d H:i:s');            
        $columns[] = 'created_by';
        $request->created_by = 1;
        
        $data= $this->grid->create('rmis_program_other_informations', $columns, $request, 'id'); 
        $data['success'] ="Data created successfuly.";
        //echo json_encode($data , JSON_NUMERIC_CHECK); 
    }
    
    public function dataUpdate($request){
        //header('Content-Type: application/json');
        //$request = json_decode(file_get_contents('php://input'));
        $request = json_decode($request);
        $columns = array('program_rationale', 'program_methodology', 'program_background', 'program_socio_economical_impact', 
        				'program_environmental_impact', 'program_targeted_beneficiary', 'program_reference', 'program_external_affiliation',
        				'program_organization_policy', 'program_risks', 'id');
							
        $columns[] = 'organization_id';
		$request->organization_id = 1;
		$columns[] = 'updated_at';        
        $request->updated_at = date('Y-m-d H:i:s');            
        $columns[] = 'updated_by';
        $request->updated_by = 1;
        
        $data = $this->grid->update('rmis_program_other_informations', $columns, $request, 'id'); 
        $data['success'] ="Data updated successfuly.";
        //echo json_encode($data , JSON_NUMERIC_CHECK);  
    }
                
} 
?>