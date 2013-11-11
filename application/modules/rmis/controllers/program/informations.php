<?php
class Informations extends MX_Controller{
    private $_data;
	public $error=array();
	public $data =array();
	
    public function __construct(){
        parent::__construct();
        $this->load->model('Kendodatasource_model', 'grid');
		$this->load->model('Program_model', 'program');

        $this->template->set_partial('header', 'layouts/header')
						->set_layout('extensive/main_layout');
    }
    
    public function index($program_id=NULL){
        $this->template->title('Research Management(RM)', ' Programs', ' Information');
        
		if($this->input->post('save_program_information')){
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
        
		if($program_id!=NULL){
			if($this->input->post('update_program_information')){
				$request = json_encode($this->input->post());
				$this->dataUpdate($request);
			}
				
			$program_detail = $this->program->get_details($program_id);
			$this->template->set('program_detail', serialize($program_detail));
			
			$this->template->set('program_id',$program_id);
		}
		
        $this->template->set('content_header_icon', 'class="icofont-file"');
        $this->template->set('content_header_title', 'Program Information');
		
		
		$program_areas = $this->grid->read('rmis_program_areas', array('id','program_area_id', 'program_area_name'), $request); 
		$this->template->set('program_areas',$program_areas); //$this->program->get_program_area()
		
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
		
		//$request = (object) null;
        //$request->sort = array((object) array('field' => 'head_name', 'dir' => 'ASC'));
        //$request->filter = (object) array('field' => 'organogram_type', 'operator' => 'eq', 'value' => 'Department');

        //$salaryHeadRs = $this->kds->read('pmm_salary_head', array('id as value', 'CONCAT(head_name," (",short_name,")" ) as text', 'head_name', 'is_active'), $request);
        //$pre = array('value' => '', 'text' => '-Select-');
        //array_unshift($salaryHeadRs['data'], $pre); 
		
		//$request = (object) null;
        //$request->filter = (object) array('field' => 'organogram_type', 'operator' => 'eq', 'value' => 'Department');
		//$departments = $this->grid->read('hrm_organograms', array('id','organization_id', 'organogram_name'), $request);
		
		$departments = $this->program->get_department();
		$this->template->set('departments',$departments);
		
        $breadcrumb = '<ul class="breadcrumb">
						<li><a href="#"><i class="icofont-home"></i> RMIS</a> <span class="divider">&raquo;</span></li>
						<li><a href="#">Program</a><span class="divider">&raquo;</span></li><li class="active">Information</li>
					  </ul>';
        $this->template->set('breadcrumb', $breadcrumb);
        $this->template->set_partial('progInfoForm','program/informations/form');
		$this->template->set_partial('tab_menu','program/form_tabs');
        $this->template->set_partial('sidebar', 'layouts/sidebar',$_data)
             ->build('program/informations/index');			 	 
    }
	
    public function dataCreate($request){
        $request = json_decode($request);
		
		if($request->program_institute_names!="") {
			$request->program_institute_names = implode(",", $request->program_institute_names);
		}else {
			$request->program_institute_names = "";
		}
		
		if($request->program_commodities!="") {
			$request->program_commodities = implode(",", $request->program_commodities);
		}else {
			$request->program_commodities = "";
		}
		
		if($request->program_aezs!="") {
			$request->program_aezs = implode(",", $request->program_aezs);
		}else {
			$request->program_aezs = "";
		}
		
		if($request->program_expected_outputs!="") {
			$request->program_expected_outputs = implode("---##########---", $request->program_expected_outputs);
		}else {
			$request->program_expected_outputs = "";
		}
		
        $this->form_validation->set_rules($this->program->validation);
        $this->program->isValidate((array) $request);
        if ($this->form_validation->run() === false) {
            header("HTTP/1.1 500 Internal Server Error");
            echo "Wrong data ! try again" ;
            //exit;
        }
       
        $columns = array('research_program_title', 'program_area', 'program_division', 'program_research_type', 'program_research_priority', 'program_research_status', 
        					'program_coordinator', 'program_coordinator_designation', 'program_planned_start_date', 'program_planned_end_date', 'program_planned_budget',
							'program_approved_budget', 'is_collaborate', 'program_institute_names', 'program_department_name', 'program_regional_station_name',
							'program_implementation_location', 'program_keywords', 'program_commodities', 'program_aezs', 'program_initiation_date', 'program_completion_date',
							'program_goal', 'program_objective', 'program_expected_outputs');
		
        $columns[] = 'organization_id';
		$request->organization_id = 1;
		$columns[] = 'created_at';
        $request->created_at = date('Y-m-d H:i:s');            
        $columns[] = 'created_by';
        $request->created_by = 1;

        $data = $this->grid->create('rmis_program_informations', $columns, $request, 'program_id');
		redirect('rmis/program/informations/'.$data['data'][0]->program_id, 'refresh'); 
        $data['success'] ="Data created successfuly.";
        //echo json_encode($data , JSON_NUMERIC_CHECK); 
    }
	 	
	public function dataUpdate($request){
        $request = json_decode($request);
		/*$request->program_instituteNames = implode(",", $request->program_institute_names);
		$request->program_commodities = implode(",", $request->program_commodities);
		$request->program_aezs = implode(",", $request->program_aezs);
		$request->program_expectedOutputs = implode("---##########---", $request->program_expected_outputs);*/
		
		if($request->program_institute_names!="") {
			$request->program_institute_names = implode(",", $request->program_institute_names);
		}else {
			$request->program_institute_names = "";
		}
		
		if($request->program_commodities!="") {
			$request->program_commodities = implode(",", $request->program_commodities);
		}else {
			$request->program_commodities = "";
		}
		
		if($request->program_aezs!="") {
			$request->program_aezs = implode(",", $request->program_aezs);
		}else {
			$request->program_aezs = "";
		}
		
		if($request->program_expected_outputs!="") {
			$request->program_expected_outputs = implode("---##########---", $request->program_expected_outputs);
		}else {
			$request->program_expected_outputs = "";
		}
		
        $this->form_validation->set_rules($this->program->validation);
        $this->program->isValidate((array) $request);
        if ($this->form_validation->run() === false) {
            header("HTTP/1.1 500 Internal Server Error");
            echo "Wrong data ! try again" ;
            //exit;
        }
       
        $columns = array('research_program_title', 'program_area', 'program_division', 'program_research_type', 'program_research_priority', 'program_research_status', 
        					'program_coordinator', 'program_coordinator_designation', 'program_planned_start_date', 'program_planned_end_date', 'program_planned_budget',
							'program_approved_budget', 'is_collaborate', 'program_institute_names', 'program_department_name', 'program_regional_station_name',
							'program_implementation_location', 'program_keywords', 'program_commodities', 'program_aezs', 'program_initiation_date', 'program_completion_date',
							'program_goal', 'program_objective', 'program_expected_outputs', 'program_id');
							
        $columns[] = 'organization_id';
		$request->organization_id = 1;
		$columns[] = 'updated_at';        
        $request->updated_at = date('Y-m-d H:i:s');            
        $columns[] = 'updated_by';
        $request->updated_by = 1;
        $data = $this->grid->update('rmis_program_informations', $columns, $request, 'program_id'); 
        $data['success'] ="Data updated successfuly.";
        //echo json_encode($data , JSON_NUMERIC_CHECK);  
    }               
}
?>