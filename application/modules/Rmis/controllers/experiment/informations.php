<?php
class Informations extends MX_Controller{
    private $_data;
	public $error=array();
	public $data =array();
	
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
        $this->template->title('Research Management(RM)', ' Programs', ' Information');
        
		if($this->input->post('save_experiment_information')){
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
			if($this->input->post('update_experiment_information')){
				$request = json_encode($this->input->post());
				$this->dataUpdate($request);
			}
				
			$experiment_detail = $this->experiment->get_details($experiment_id);
			$this->template->set('experiment_detail', serialize($experiment_detail));
			
			$program_detail = $this->program->get_details($experiment_id);
			$this->template->set('program_detail', serialize($program_detail));
			
			$this->template->set('experiment_id',$experiment_id);
		}
		
        $this->template->set('content_header_icon', 'class="icofont-file"');
        $this->template->set('content_header_title', 'Experiment Information');
		
		$program_areas = $this->grid->read('rmis_program_areas', array('id','program_area_id', 'program_area_name'), $request); 
		$this->template->set('program_areas',$program_areas);
				
		$divisions = $this->grid->read('rmis_divisions', array('id','division_id', 'division_name'), $request);  
		$this->template->set('divisions',$divisions); //$this->program->get_division_or_unit()
		
		$research_types = $this->grid->read('rmis_research_types', array('value','name', 'is_active'), $request); 
		$this->template->set('research_types',$research_types); //$this->program->get_research_type()
		
		$research_priorities = $this->grid->read('rmis_research_priorities', array('value','name', 'is_active'), $request); 
		$this->template->set('research_priorities', $research_priorities); //$this->program->get_research_priority()
		
		$research_statuses = $this->grid->read('rmis_research_statuses', array('value','name', 'is_active'), $request);
		$this->template->set('research_statuses',$research_statuses); //$this->program->get_research_status()
		
		$regional_stations = $this->grid->read('rmis_regional_stations', array('id','station_id', 'station_name'), $request);
		$this->template->set('regional_stations',$regional_stations); //$this->program->get_regional_station_name()
		
		$implementation_locations = $this->grid->read('rmis_implementation_sites', array('id','implementation_site_id', 'implementation_site_name'), $request);
		$this->template->set('implementation_locations',$implementation_locations); //$this->program->get_implementation_location()
		
		$comodities = $this->grid->read('rmis_commodities', array('value','name', 'is_active'), $request);
		$this->template->set('comodities',$comodities); //$this->program->get_commodity()
		
		$aezs = $this->grid->read('rmis_aezs', array('value','name', 'is_active'), $request);
		$this->template->set('aezs',$aezs);	//$this->program->get_aez()
				
		$institues = $this->grid->read('hrm_organizations', array('id', 'short_name', 'organization_name'), $request);
		$this->template->set('institues',$institues);
		
		$departments = $this->program->get_department();
		$this->template->set('departments',$departments);
		
        $breadcrumb = '<ul class="breadcrumb">
						<li><a href="#"><i class="icofont-home"></i> RMIS</a> <span class="divider">&raquo;</span></li>
						<li><a href="#">Experiment</a><span class="divider">&raquo;</span></li><li class="active">Information</li>
					  </ul>';
        $this->template->set('breadcrumb', $breadcrumb);
        $this->template->set_partial('progInfoForm','experiment/informations/form');
		$this->template->set_partial('tab_menu','experiment/form_tabs');
        $this->template->set_partial('sidebar', 'layouts/sidebar',$_data)
             ->build('experiment/informations/index');			 	 
    }
	
    public function dataCreate($request){
        $request = json_decode($request);
				
		if($request->experiment_commodities!="") {
			$request->experiment_commodities = implode(",", $request->experiment_commodities);
		}else {
			$request->experiment_commodities = "";
		}
		
		if($request->experiment_aezs!="") {
			$request->experiment_aezs = implode(",", $request->experiment_aezs);
		}else {
			$request->experiment_aezs = "";
		}
		
		if($request->experiment_expected_outputs!="") {
			$request->experiment_expected_outputs = implode("---##########---", $request->experiment_expected_outputs);
		}else {
			$request->experiment_expected_outputs = "";
		}
		
        $this->form_validation->set_rules($this->experiment->validation);
        $this->experiment->isValidate((array) $request);
        if ($this->form_validation->run() === false) {
            header("HTTP/1.1 500 Internal Server Error");
            echo "Wrong data ! try again" ;
            //exit;
        }
       
        $columns = array('research_experiment_title', 'experiment_type', 'experiment_division', 'experiment_research_type', 'experiment_research_priority', 'experiment_research_status', 
        					'experiment_coordinator', 'experiment_coordinator_designation', 'experiment_planned_start_date', 'experiment_planned_end_date', 'experiment_planned_budget',
							'experiment_approved_budget', 'experiment_department_name', 'experiment_regional_station_name',
							'experiment_implementation_location', 'experiment_keywords', 'experiment_commodities', 'experiment_aezs', 'experiment_initiation_date', 'experiment_completion_date',
							'experiment_goal', 'experiment_objective', 'experiment_expected_outputs');
		
        $columns[] = 'organization_id';
		$request->organization_id = $this->config->item('organization_id');
		$columns[] = 'created_at';
        $request->created_at = date('Y-m-d H:i:s');            
        $columns[] = 'created_by';
        $request->created_by = $this->loginUser->id;

        $data = $this->grid->create('rmis_experiment_informations', $columns, $request, 'experiment_id');
		redirect('Rmis/experiment/informations/'.$data['data'][0]->experiment_id, 'refresh'); 
        $data['success'] ="Data created successfuly."; 
    }
	 	
	public function dataUpdate($request){
        $request = json_decode($request);
				
		if($request->experiment_commodities!="") {
			$request->experiment_commodities = implode(",", $request->experiment_commodities);
		}else {
			$request->experiment_commodities = "";
		}
		
		if($request->experiment_aezs!="") {
			$request->experiment_aezs = implode(",", $request->experiment_aezs);
		}else {
			$request->experiment_aezs = "";
		}
		
		if($request->experiment_expected_outputs!="") {
			$request->experiment_expected_outputs = implode("---##########---", $request->experiment_expected_outputs);
		}else {
			$request->experiment_expected_outputs = "";
		}
		
        $this->form_validation->set_rules($this->experiment->validation);
        $this->experiment->isValidate((array) $request);
        if ($this->form_validation->run() === false) {
            header("HTTP/1.1 500 Internal Server Error");
            echo "Wrong data ! try again" ;
            //exit;
        }
       
        $columns = array('research_experiment_title', 'experiment_type', 'experiment_division', 'experiment_research_type', 'experiment_research_priority', 'experiment_research_status', 
        					'experiment_coordinator', 'experiment_coordinator_designation', 'experiment_planned_start_date', 'experiment_planned_end_date', 'experiment_planned_budget',
							'experiment_approved_budget', 'experiment_department_name', 'experiment_regional_station_name',
							'experiment_implementation_location', 'experiment_keywords', 'experiment_commodities', 'experiment_aezs', 'experiment_initiation_date', 'experiment_completion_date',
							'experiment_goal', 'experiment_objective', 'experiment_expected_outputs', 'experiment_id');
							
        $columns[] = 'organization_id';
		$request->organization_id = $this->config->item('organization_id');
		$columns[] = 'updated_at';        
        $request->updated_at = date('Y-m-d H:i:s');            
        $columns[] = 'updated_by';
        $request->updated_by = $this->loginUser->id;
        $data = $this->grid->update('rmis_experiment_informations', $columns, $request, 'experiment_id'); 
        $data['success'] ="Data updated successfuly.";
    }               
}
?>