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

        $this->template->set_partial('header', 'layouts/header')
						->set_layout('extensive/main_layout');
    }
    
    public function index($program_id=NULL, $project_id=NULL){
        $this->template->title('Research Management(RM)', ' Programs', ' Information');
        $this->template->set('project_id',$project_id);
		$this->template->set('program_id',$program_id);
		$this->template->set('form_action_url', '/Rmis/Project/Informations/'.$program_id.'/'.$project_id);
		
		if($this->input->post()){
			$this->template->set('tem_formData', serialize($this->input->post()));
		}
		
		if($this->input->post('save_project_information')){
			$request = json_encode($this->input->post());
			$this->dataCreate($request);
		}
		
        $_data['dashboard_menu_active'] = '';
        $_data['setup_menu_active'] = 'class="active"';
        $_data['setup_funds_menu_active'] ='class="active"';
        $_data['setup_training_project_type_menu_active'] ='';
        $_data['setup_institutes_menu_active'] ='';
        $this->template->append_metadata('<link href="/assets/kendoui/css/web/kendo.common.min.css"  rel="stylesheet"/>');
        $this->template->append_metadata('<link href="/assets/kendoui/css/web/kendo.default.min.css"  rel="stylesheet"/>');
        $this->template->append_metadata('<script src="/assets/kendoui/js/kendo.all.min.js"></script>');
        $this->template->append_metadata('<script src="/assets/js/custom/rmis.js"></script>');
        
		if($project_id!=NULL){
			if($this->input->post('update_project_information')){
				$request = json_encode($this->input->post());
				$this->dataUpdate($request);
			}
			
			if($this->input->post('delete_project_information')){
				$request = json_encode($this->input->post());
				$this->dataDestroy($request);
				redirect('Rmis/Project/Informations','refresh');
			}
				
			$project_detail = $this->project->get_details($project_id);
			$this->template->set('project_detail', serialize($project_detail));
		}

		if($program_id!=NULL || $program_id!=0){
			$program_detail = $this->program->get_details($program_id);
			$this->template->set('program_detail', serialize($program_detail));
		}
		
        $this->template->set('content_header_icon', 'class="icofont-file"');
        $this->template->set('content_header_title', 'Project Information');
		
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
						<li><a href="#">Project</a><span class="divider">&raquo;</span></li><li class="active">Information</li>
					  </ul>';
        $this->template->set('breadcrumb', $breadcrumb);
        $this->template->set_partial('progInfoForm','project/informations/form');
		$this->template->set_partial('tab_menu','project/form_tabs');
        $this->template->set_partial('sidebar', 'layouts/sidebar',$_data)
             ->build('project/informations/index');			 	 
    }
	
    public function dataCreate($request){
        $request = json_decode($request);
		
		if($request->project_institute_names!="") {
			$request->project_institute_names = implode(",", $request->project_institute_names);
		}else {
			$request->project_institute_names = "";
		}
		
		if($request->project_commodities!="") {
			$request->project_commodities = implode(",", $request->project_commodities);
		}else {
			$request->project_commodities = "";
		}
		
		if($request->project_aezs!="") {
			$request->project_aezs = implode(",", $request->project_aezs);
		}else {
			$request->project_aezs = "";
		}
		
		if($request->project_expected_outputs!="") {
			$request->project_expected_outputs = implode("---##########---", $request->project_expected_outputs);
		}else {
			$request->project_expected_outputs = "";
		}
		
        $this->form_validation->set_rules($this->project->validation);
        $this->project->isValidate((array) $request);
        if ($this->form_validation->run() === false) {
            header("HTTP/1.1 500 Internal Server Error");
            echo "Wrong data ! try again" ;
            //exit;
        }
       
        $columns = array('research_project_title', 'project_code', 'project_prefix', 'project_type', 'program_id', 'project_division', 'project_research_type', 'project_research_priority', 'project_research_status', 
        					'project_coordinator', 'project_coordinator_designation', 'is_collaborate', 'project_planned_start_date', 'project_planned_end_date', 'project_planned_budget',
							'project_approved_budget', 'project_institute_names', 'project_department_name', 'project_regional_station_name',
							'project_implementation_location', 'project_keywords', 'project_commodities', 'project_aezs', 'project_initiation_date', 'project_completion_date',
							'project_goal', 'project_objective', 'project_expected_outputs');
		
		if($request->project_type=="Independent")
			$request->program_id = 0;
		
        $columns[] = 'organization_id';
		$request->organization_id = $this->config->item('organization_id');
		$columns[] = 'created_at';
        $request->created_at = date('Y-m-d H:i:s');            
        $columns[] = 'created_by';
        $request->created_by = $this->loginUser->id;
		
		//print_r($columns);
		//print_r($request);
		
        $data = $this->grid->create('rmis_project_informations', $columns, $request, 'project_id');
		//exit(0);
		redirect('/Rmis/Project/Informations/'.$request->program_id.'/'.$data['data'][0]->project_id, 'refresh'); 
        $data['success'] ="Data created successfuly."; 
    }
	 	
	public function dataUpdate($request){
        $request = json_decode($request);
		
		if($request->project_institute_names!="") {
			$request->project_institute_names = implode(",", $request->project_institute_names);
		}else {
			$request->project_institute_names = "";
		}
		
		if($request->project_commodities!="") {
			$request->project_commodities = implode(",", $request->project_commodities);
		}else {
			$request->project_commodities = "";
		}
		
		if($request->project_aezs!="") {
			$request->project_aezs = implode(",", $request->project_aezs);
		}else {
			$request->project_aezs = "";
		}
		
		if($request->project_expected_outputs!="") {
			$request->project_expected_outputs = implode("---##########---", $request->project_expected_outputs);
		}else {
			$request->project_expected_outputs = "";
		}
		
        $this->form_validation->set_rules($this->project->validation);
        $this->project->isValidate((array) $request);
        if ($this->form_validation->run() === false) {
            header("HTTP/1.1 500 Internal Server Error");
            echo "Wrong data ! try again" ;
            //exit;
        }
							
		$columns = array('research_project_title', 'project_code', 'project_prefix', 'project_type', 'program_id', 'project_division', 'project_research_type', 'project_research_priority', 'project_research_status', 
        					'project_coordinator', 'project_coordinator_designation', 'is_collaborate', 'project_planned_start_date', 'project_planned_end_date', 'project_planned_budget',
							'project_approved_budget', 'project_institute_names', 'project_department_name', 'project_regional_station_name',
							'project_implementation_location', 'project_keywords', 'project_commodities', 'project_aezs', 'project_initiation_date', 'project_completion_date',
							'project_goal', 'project_objective', 'project_expected_outputs', 'project_id');
		
		if($request->project_type=="Independent")
			$request->program_id = 0;
							
        $columns[] = 'organization_id';
		$request->organization_id = $this->config->item('organization_id');
		$columns[] = 'updated_at';        
        $request->updated_at = date('Y-m-d H:i:s');            
        $columns[] = 'updated_by';
        $request->updated_by = $this->loginUser->id;
        $data = $this->grid->update('rmis_project_informations', $columns, $request, 'project_id'); 
        $data['success'] ="Data updated successfuly.";
        //echo json_encode($data , JSON_NUMERIC_CHECK);  
    }
	
	public function dataDestroy($request=NULL){
		if($request!=NULL){
			 $request = json_decode($request);
			 $data = $this->grid->destroy('rmis_project_informations', $request, 'project_id');
		}
		else{   
			header('Content-Type: application/json');
			$request = json_decode(file_get_contents('php://input'));
			$data = $this->grid->destroy('rmis_project_informations', $request->models, 'project_id'); 
			echo json_encode($data , JSON_NUMERIC_CHECK);
		}        
	}	               
}
?>