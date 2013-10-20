<?php
class Informations extends MX_Controller{
    private $_data;
	public $error=array();
	public $data =array();
	
    public function __construct(){
        parent::__construct();
        $this->load->model('Kendodatasource_model', 'grid');
        
        $this->load->model('Division_model', 'division');
		$this->load->model('Program_model', 'program');

        $this->template->set_partial('header', 'layouts/header')
						->set_layout('extensive/main_layout');
    }
    
    public function index($program_id=NULL){
        $this->template->title('Research Management(RM)', ' Programs', ' Information');
        
		if($this->input->post('save_program_information')){
			//$request = json_encode($this->input->post());
			$this->dataCreate();
		}
		
		if($this->input->post('update_program_information')){
			//$request = json_encode($this->input->post());
			$this->dataUpdate();
		}
		
		if($this->input->post('delete_program_information')){
			//$request = json_encode($this->input->post());			
			$this->dataDelete();
		}
		
        $_data['dashboard_menu_active'] = '';
        $_data['setup_menu_active'] = 'class="active"';
        $_data['setup_funds_menu_active'] ='class="active"';
        $_data['setup_training_program_type_menu_active'] ='';
        $_data['setup_institutes_menu_active'] ='';
        
        
		if($program_id!=NULL){
				
			$program_detail = $this->program->get_program_details($program_id);
			$this->template->set('program_detail', serialize($program_detail));
			
			$institute_detail = $this->program->get_institute_id_from_program_id($program_id);
			$this->template->set('institute_detail', serialize($institute_detail));
			
			$commodity_detail = $this->program->get_commodity_from_program_id($program_id);
			$this->template->set('commodity_detail', serialize($commodity_detail));
			
			$aez_detail = $this->program->get_aez_from_program_id($program_id);
			$this->template->set('aez_detail', serialize($aez_detail));
			
			$expected_output_detail = $this->program->get_expected_output_from_program_id($program_id);
			$this->template->set('expected_output_detail', serialize($expected_output_detail));
		}
		
        $this->template->set('content_header_icon', 'class="icofont-file"');
        $this->template->set('content_header_title', 'Program Information');
		
		
		$program_areas = $this->grid->read('rmis_program_areas', array('id','program_area_id', 'program_area_name'), $request); 
		$this->template->set('program_areas',$program_areas); //$this->program->get_program_area()
		
		$divisions = $this->grid->read('rmis_divisions', array('id','division_id', 'division_name'), $request);  
		$this->template->set('divisions',$divisions); //$this->program->get_division_or_unit()
		
		$research_types = $this->grid->read('rmis_research_types', array('id','research_type', 'is_active'), $request); 
		$this->template->set('research_types',$research_types); //$this->program->get_research_type()
		
		$research_priorities = $this->grid->read('rmis_research_priorities', array('id','research_priority', 'is_active'), $request); 
		$this->template->set('research_priorities', $research_priorities); //$this->program->get_research_priority()
		
		$research_statuses = $this->grid->read('rmis_research_statuses', array('id','research_status', 'is_active'), $request);
		$this->template->set('research_statuses',$research_statuses); //$this->program->get_research_status()
		
		$regional_stations = $this->grid->read('rmis_regional_stations', array('id','station_id', 'station_name'), $request);
		$this->template->set('regional_stations',$regional_stations); //$this->program->get_regional_station_name()
		
		$implementation_locations = $this->grid->read('rmis_implementation_sites', array('id','implementation_site_id', 'implementation_site_name'), $request);
		$this->template->set('implementation_locations',$implementation_locations); //$this->program->get_implementation_location()
		
		
		$this->template->set('department_name',$this->program->get_department_name());
		$this->template->set('institute_name',$this->program->get_institute_name());
		$this->template->set('commodity',$this->program->get_commodity());
		$this->template->set('aez',$this->program->get_aez());		
				
        $breadcrumb = '<ul class="breadcrumb">
						<li><a href="#"><i class="icofont-home"></i> RMIS</a> <span class="divider">&raquo;</span></li>
						<li><a href="#">Program</a><span class="divider">&raquo;</span></li><li class="active">Information</li>
					  </ul>';
        $this->template->set('breadcrumb', $breadcrumb);
        $this->template->set_partial('progInfoForm','program/information/form');
		$this->template->set_partial('tab_menu','program/form_tabs');
        $this->template->set_partial('sidebar', 'layouts/sidebar',$_data)
             ->build('program/information/index');			 	 
    }
	
    public function dataRead(){		
		header('Content-Type: application/json');
        $request = json_decode(file_get_contents('php://input'));
        $data= $this->grid->read('rmis_program_information', array('program_id', 'title_of_research_program', 'program_area', 'regional_station_name', 'division_or_unit_name', 'department_name'));       
        echo json_encode($data, JSON_NUMERIC_CHECK);
    }
	
	public function autocomplete()
	{		
		$term = $this->input->post('term',TRUE);

		if (strlen($term) < 2) break;
	
		$rows = $this->program->get_employee_name_auto_complete(array('keyword' => $term));
	
		$json_array = array();
		foreach ($rows as $row)
			 array_push($json_array, $row->employee_name);
	
		echo json_encode($json_array);
	}
		
	public function dataCreate()
	{		
		$submit_ok=$this->validation_program_information();
		if($submit_ok)
		{
			$program_id=$this->program->insert_program_information($this->data);
			if(sizeof($this->input->post('institute_name'))>0)
			{
				foreach($this->input->post('institute_name') as $institute_name) {
					$institute_data = array('program_id' =>$program_id, 'institute_id'=>$institute_name);
					$this->program->insert_institute_name($institute_data);
				}
			}
			if(sizeof($this->input->post('commodity'))>0)
			{
				foreach($this->input->post('commodity') as $commodity) {
					$commodity_data = array('program_id' =>$program_id, 'commodity_id'=>$commodity);
					$this->program->insert_commodity($commodity_data);
				}
			}
			if(sizeof($this->input->post('aez'))>0)
			{
				foreach($this->input->post('aez') as $aez) {
					$aez_data = array('program_id' =>$program_id, 'aez_id'=>$aez);
					$this->program->insert_aez($aez_data);
				}
			}
			if(sizeof($this->input->post('expected_output'))>0)
			{
				foreach(array_filter($this->input->post('expected_output')) as $expected_output) {
					$expected_output_data = array('program_id' =>$program_id, 'expected_output'=>$expected_output);
					$this->program->insert_expected_output($expected_output_data);
				}
			}
			$data['success'] ="Data created successfuly.";
		}
		else {
			header("HTTP/1.1 500 Internal Server Error");
            echo "Wrong data ! try again" ;
            exit;
		}
    }
    
/*    public function dataDestroy(){   
        header('Content-Type: application/json');
        $request = json_decode(file_get_contents('php://input'));
        $data = $this->grid->destroy('rmis_program_information', $request->models, 'program_id'); 
        echo json_encode($data , JSON_NUMERIC_CHECK); 
    }
*/    	
	public function dataUpdate()
	{		
		$submit_ok=$this->validation_program_information();
		if($submit_ok)
		{
			$program_id=$this->program->update_program_information($this->data, $this->data['program_id']);
				
			$this->program->delete_program_collaborated_institute_name($this->data['program_id']);
			$this->program->delete_commodity_from_program_id($this->data['program_id']);
			$this->program->delete_aez_from_program_id($this->data['program_id']);
			$this->program->delete_expected_output_from_program_id($this->data['program_id']);
			
			if(sizeof($this->input->post('institute_name'))>0)
			{
				foreach($this->input->post('institute_name') as $institute_name) {
					$institute_data = array('program_id' =>$this->data['program_id'], 'institute_id'=>$institute_name);
					$this->program->insert_institute_name($institute_data);
				}
			}
			
			if(sizeof($this->input->post('commodity'))>0)
			{
				foreach($this->input->post('commodity') as $commodity) {
					$commodity_data = array('program_id' =>$this->data['program_id'], 'commodity_id'=>$commodity);
					$this->program->insert_commodity($commodity_data);
				}
			}
			if(sizeof($this->input->post('aez'))>0)
			{
				foreach($this->input->post('aez') as $aez) {
					$aez_data = array('program_id' =>$this->data['program_id'], 'aez_id'=>$aez);
					$this->program->insert_aez($aez_data);
				}
			}
			if(sizeof($this->input->post('expected_output'))>0)
			{
				foreach(array_filter($this->input->post('expected_output')) as $expected_output) {
					$expected_output_data = array('program_id' =>$this->data['program_id'], 'expected_output'=>$expected_output);
					$this->program->insert_expected_output($expected_output_data);
				}
			}
			redirect(current_url());	
		}
		else {
			header("HTTP/1.1 500 Internal Server Error");
            echo "Wrong data ! try again" ;
            exit;
		}				
    }
	
	public function dataDelete()
	{   
        $this->data['program_id'] = $this->input->post('program_id');
		if($this->data['program_id']!=NULL)
		{
			$this->program->delete_program_information($this->data['program_id']);
			$this->program->delete_program_collaborated_institute_name($this->data['program_id']);
			$this->program->delete_commodity_from_program_id($this->data['program_id']);
			$this->program->delete_aez_from_program_id($this->data['program_id']);
			$this->program->delete_expected_output_from_program_id($this->data['program_id']);
			redirect("/rmis/program/information");  //for example
		}
    }
	
	function validation_program_information()
	{
		$this->data['program_id']				= $this->input->post('program_id');
		$this->data['title_of_research_program']= $this->input->post('title_of_research_program');
		
		if($this->input->post('is_collaborate')==''){
			$this->data['is_collaborate']		= 0;
		}
		else{
			$this->data['is_collaborate']		= $this->input->post('is_collaborate');
		}
		$this->data['programme_area']			= $this->input->post('programme_area');
		$this->data['regional_station_name']	= $this->input->post('regional_station_name');
		$this->data['division_or_unit_name']	= $this->input->post('division_or_unit_name');
		$this->data['department_name']			= $this->input->post('department_name');
		$this->data['implementation_location']	= $this->input->post('implementation_location');
		$this->data['keyword']					= $this->input->post('keyword');
		$this->data['research_priority']		= $this->input->post('research_priority');
		$this->data['research_type']			= $this->input->post('research_type');
		$this->data['research_status']			= $this->input->post('research_status');		
		$this->data['program_manager']			= $this->input->post('program_manager');
		$this->data['designation']				= $this->input->post('designation');
		$this->data['planned_start_date']		= $this->input->post('planned_start_date');
		$this->data['planned_end_date']			= $this->input->post('planned_end_date');
		$this->data['initiation_date']			= $this->input->post('initiation_date');
		$this->data['completion_date']			= $this->input->post('completion_date');
		$this->data['planned_budget']			= $this->input->post('planned_budget');
		$this->data['approved_budget']			= $this->input->post('approved_budget');
		$this->data['program_goal']				= $this->input->post('program_goal');
		$this->data['purpose_or_objective']		= $this->input->post('purpose_or_objective');
		
		//multiple checkbox
	   	$this->data['institute_name']	= $this->input->post('institute_name');
		$this->data['commodity']		= $this->input->post('commodity');
		$this->data['aez']				= $this->input->post('aez');		
		$this->data['expected_output']	= $this->input->post('expected_output');
				
		if ($this->data['title_of_research_program'] == '')
		{
			array_push($this->error,'title_of_research_program_blank');
		}
		
		if ($this->data['programme_area'] == '')
		{
			array_push($this->error,'programme_area_blank');
		}
		
		if ($this->data['division_or_unit_name'] == '')
		{
			array_push($this->error,'division_or_unit_name_blank');
		}
		
		if ($this->data['research_type'] == '')
		{
			array_push($this->error,'research_type_blank');
		}
		
		if ($this->data['research_status'] == '')
		{
			array_push($this->error,'research_status_blank');
		}
		
		if ($this->data['research_priority'] == '')
		{
			array_push($this->error,'research_priority_blank');
		}
		
		if ($this->data['program_manager'] == '')
		{
			array_push($this->error,'program_manager_blank');
		}
		
		if ($this->data['planned_start_date'] == '')
		{
			array_push($this->error,'planned_start_date_blank');
		}
		if ($this->data['planned_end_date'] == '')
		{
			array_push($this->error,'planned_end_date_blank');
		}
		if($this->data['planned_start_date'] != '' && $this->data['planned_end_date'] != '')
		{		
			if($this->data['planned_start_date'] > $this->data['planned_end_date'])
			{
				array_push($this->error,'planned_start_date_large');
			}
		}
		if ($this->data['initiation_date'] == '')
		{
			array_push($this->error,'initiation_date_blank');
		}
		if ($this->data['completion_date'] == '')
		{
			array_push($this->error,'completion_date_blank');
		}
		if($this->data['initiation_date'] != '' && $this->data['completion_date'] != '')
		{		
			if($this->data['initiation_date'] > $this->data['completion_date'])
			{
				array_push($this->error,'initiation_date_large');
			}
		}
		if ($this->data['program_goal'] == '')
		{
			array_push($this->error,'program_goal_blank');
		}
		
		if ($this->data['purpose_or_objective'] == '')
		{
			array_push($this->error,'purpose_or_objective_blank');
		}
		
		if (sizeof($this->data['expected_output']) == 0)
		{
			array_push($this->error,'expected_output_blank');
		}

		if(empty($this->error))
			return true;
		else
			return false;
	}                
} 
?>