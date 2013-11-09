<?php
class Informations extends MX_Controller{
    private $_data;
	public $error=array();
	public $data =array();
	
    public function __construct(){
        parent::__construct();
        $this->load->model('Kendodatasource_model', 'grid');
		$this->load->model('Project_model', 'project');

        $this->template->set_partial('header', 'layouts/header')
						->set_layout('extensive/main_layout');
    }
    
    public function index($project_id=NULL){
        $this->template->title('Research Management(RM)', ' Project', ' Information');
        
		if($this->input->post('save_project_information')){
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
			if($this->input->post('update_project_information')){
				$request = json_encode($this->input->post());
				$this->dataUpdate($request);
			}
				
			$project_detail = $this->project->get_details($project_id);
			$this->template->set('project_detail', serialize($project_detail));
			
			$this->template->set('project_id',$project_id);
		}
		
        $this->template->set('content_header_icon', 'class="icofont-file"');
        $this->template->set('content_header_title', 'Project Information');
		
		$divisions = $this->grid->read('rmis_divisions', array('id','division_id', 'division_name'), $request);  
		$this->template->set('divisions',$divisions); //$this->project->get_division_or_unit()
		
		$research_types = $this->grid->read('rmis_research_types', array('id','research_type', 'is_active'), $request); 
		$this->template->set('research_types',$research_types); //$this->project->get_research_type()
		
		$research_priorities = $this->grid->read('rmis_research_priorities', array('id','research_priority', 'is_active'), $request); 
		$this->template->set('research_priorities', $research_priorities); //$this->project->get_research_priority()
		
		$research_statuses = $this->grid->read('rmis_research_statuses', array('id','research_status', 'is_active'), $request);
		$this->template->set('research_statuses',$research_statuses); //$this->project->get_research_status()
		
		$regional_stations = $this->grid->read('rmis_regional_stations', array('id','station_id', 'station_name'), $request);
		$this->template->set('regional_stations',$regional_stations); //$this->project->get_regional_station_name()
		
		$implementation_locations = $this->grid->read('rmis_implementation_sites', array('id','implementation_site_id', 'implementation_site_name'), $request);
		$this->template->set('implementation_locations',$implementation_locations); //$this->project->get_implementation_location()
		
		$comodities = $this->grid->read('rmis_commodities', array('commodity_id','commodity_name', 'is_active'), $request);
		$this->template->set('comodities',$comodities); //$this->project->get_commodity()
		
		$aezs = $this->grid->read('rmis_aezs', array('aez_id','aez_name', 'is_active'), $request);
		$this->template->set('aezs',$aezs);	//$this->project->get_aez()
		
		$institues = $this->grid->read('rmis_institutes', array('institute_id','institute_sort_code', 'institute_name'), $request);
		$this->template->set('institues',$institues);
		
		$departments = $this->grid->read('rmis_departments', array('department_id','department_name', 'institute_id'), $request);
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
        //header('Content-Type: application/json');
        //$request = json_decode(file_get_contents('php://input'));
        $request = json_decode($request);
		$request->project_instituteNames = implode(",", $request->project_instituteNames);
		$request->project_commodities = implode(",", $request->project_commodities);
		$request->project_aezs = implode(",", $request->project_aezs);
		$request->project_expectedOutputs = implode("---##########---", $request->project_expectedOutputs);
		
        $this->form_validation->set_rules($this->project->validation);
        $this->project->isValidate((array) $request);
        if ($this->form_validation->run() === false) {
            header("HTTP/1.1 500 Internal Server Error");
            echo "Wrong data ! try again" ;
            //exit;
        }
       
        $columns = array('research_project_title', 'project_code', 'project_prefix', 'project_division', 'project_researchType', 'project_researchPriority', 'project_researchStatus', 
        					'project_coordinator', 'project_coordinatorDesignation', 'project_plannedStartDate', 'project_plannedEndDate', 'project_plannedBudget',
							'project_approvedBudget', 'is_collaborate', 'project_instituteNames', 'project_departmentName', 'project_regionalStationName',
							'project_implementationLocation', 'project_keywords', 'project_commodities', 'project_aezs', 'project_initiationDate', 'project_completionDate',
							'project_goal', 'project_objective', 'project_expectedOutputs');
		
        $columns[] = 'created_at';
        $request->created_at = date('Y-m-d H:i:s');            
        $columns[] = 'created_by';
        $request->created_by = 1;
        
        $data = $this->grid->create('rmis_project_informations', $columns, $request, 'project_id');
		redirect('rmis/project/otherInformations/'.$request->project_id, 'refresh'); 
        $data['success'] ="Data created successfuly.";
        //echo json_encode($data , JSON_NUMERIC_CHECK); 
    }
	 	
	public function dataUpdate($request){
        //header('Content-Type: application/json');
        //$request = json_decode(file_get_contents('php://input'));
        $request = json_decode($request);
		$request->project_instituteNames = implode(",", $request->project_instituteNames);
		$request->project_commodities = implode(",", $request->project_commodities);
		$request->project_aezs = implode(",", $request->project_aezs);
		$request->project_expectedOutputs = implode("---##########---", $request->project_expectedOutputs);
		
        $this->form_validation->set_rules($this->project->validation);
        $this->project->isValidate((array) $request);
        if ($this->form_validation->run() === false) {
            header("HTTP/1.1 500 Internal Server Error");
            echo "Wrong data ! try again" ;
            //exit;
        }
       
        $columns = array('research_project_title', 'project_code', 'project_prefix', 'project_division', 'project_researchType', 'project_researchPriority', 'project_researchStatus', 
        					'project_coordinator', 'project_coordinatorDesignation', 'project_plannedStartDate', 'project_plannedEndDate', 'project_plannedBudget',
							'project_approvedBudget', 'is_collaborate', 'project_instituteNames', 'project_departmentName', 'project_regionalStationName',
							'project_implementationLocation', 'project_keywords', 'project_commodities', 'project_aezs', 'project_initiationDate', 'project_completionDate',
							'project_goal', 'project_objective', 'project_expectedOutputs', 'project_id');
							
        $columns[] = 'modified_at';        
        $request->modified_at = date('Y-m-d H:i:s');            
        $columns[] = 'modified_by';
        $request->modified_by = 1;
        
        $data = $this->grid->update('rmis_project_informations', $columns, $request, 'project_id'); 
        $data['success'] ="Data updated successfuly.";
        //echo json_encode($data , JSON_NUMERIC_CHECK);  
    }               
}
?>