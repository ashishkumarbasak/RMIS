<?php
class Information extends MX_Controller{
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
        
        $this->template->append_metadata('<link href="/assets/kendoui/css/web/kendo.common.min.css"  rel="stylesheet"/>');
        $this->template->append_metadata('<link href="/assets/kendoui/css/web/kendo.default.min.css"  rel="stylesheet"/>');
        $this->template->append_metadata('<script src="/assets/kendoui/js/kendo.all.min.js"></script>');
        $this->template->append_metadata('<script src="/assets/js/custom/tmis.js"></script>');
                
        require_once APPPATH.'third_party/kendoui/Autoload.php';
        
        $transport = new \Kendo\Data\DataSourceTransport();

        $create = new \Kendo\Data\DataSourceTransportCreate();

        $create->url(site_url('rmis/program/information/dataCreate'))
             ->contentType('application/json')
             ->type('POST');

        $read = new \Kendo\Data\DataSourceTransportRead();

        $read->url(site_url('rmis/program/information/dataRead'))
             ->contentType('application/json')
             ->type('POST');

        $update = new \Kendo\Data\DataSourceTransportUpdate();

        $update->url(site_url('rmis/program/information/dataUpdate'))
             ->contentType('application/json')
             ->type('POST');

        $destroy = new \Kendo\Data\DataSourceTransportDestroy();

        $destroy->url(site_url('rmis/program/information/dataDestroy'))
             ->contentType('application/json')
             ->type('POST');

        $transport->create($create)
                  ->read($read)
                  ->update($update)
                  ->destroy($destroy)
                  ->parameterMap('function(data) {
                      return kendo.stringify(data);
                  }');

        $model = new \Kendo\Data\DataSourceSchemaModel();

        $programIdField = new \Kendo\Data\DataSourceSchemaModelField('program_id');
        $programIdField->type('number')
                       ->editable(false)
                       ->nullable(true);
					   
		$programTitleField = new \Kendo\Data\DataSourceSchemaModelField('title_of_research_program');
        $programTitleField->type('string');
                       //->editable(false)
                       //->nullable(true);
        
        $programAreaField = new \Kendo\Data\DataSourceSchemaModelField('program_area');
        $programAreaField->type('string')
                ->properties();

        $regionalStationNameField = new \Kendo\Data\DataSourceSchemaModelField('regional_station_name');
        $regionalStationNameField->type('string');


        $DivisionUnitField = new \Kendo\Data\DataSourceSchemaModelField('division_or_unit_name');
        $DivisionUnitField->type('string');
		
		$departmentNameField = new \Kendo\Data\DataSourceSchemaModelField('department_name');
        $departmentNameField->type('string');

        $model->id('program_id')
            ->addField($programIdField)
            ->addField($programTitleField)
            ->addField($programAreaField)
			->addField($regionalStationNameField)
			->addField($DivisionUnitField)
			->addField($departmentNameField);

        $schema = new \Kendo\Data\DataSourceSchema();
        $schema->data('data')
               ->errors('errors')
               ->model($model)
               ->total('total');

        $dataSource = new \Kendo\Data\DataSource();

        $dataSource->transport($transport)
                   ->batch(true)
                   ->pageSize(10)
                   ->error('onError')
                   ->requestEnd('onRequestEnd')
                   ->serverSorting(true)
                   ->schema($schema);

        $grid = new \Kendo\UI\Grid('grid');
		
        $programTitle = new \Kendo\UI\GridColumn();
        $programTitle->field('title_of_research_program') //->filterable($fundTypeFilterable)
                 ->title('Program Title');
				 
		$programArea = new \Kendo\UI\GridColumn();
        $programArea->field('program_area')
                 ->title('Program Area');
				 
		$regionalStationName = new \Kendo\UI\GridColumn();
        $regionalStationName->field('regional_station_name')
                 ->title('Regional Station Name');
				 
		$divisionUnitName = new \Kendo\UI\GridColumn();
        $divisionUnitName->field('division_or_unit_name')
                 ->title('Division or Unit Name');
				 
		$departmentName = new \Kendo\UI\GridColumn();
        $departmentName->field('department_name')
                 ->title('Department Name');
		
		$command = new \Kendo\UI\GridColumn();
        $command->addCommandItem('destroy')
                ->title('&nbsp;')
                ->width(100);
				
		$command2 = new \Kendo\UI\GridColumnCommandItem();
		$command2->click('ClickEdit')
				 ->text('Edit');
		
		$commandColumn = new \Kendo\UI\GridColumn();
		$commandColumn->addCommandItem($command2)
        ->title('&nbsp;')
        ->width(100);
		
        
        $editable = new \Kendo\UI\GridEditable();
        $editable 	-> templateId("popup_editor")
                	->confirmation("Are you sure you want to delete this record?")
               	 	-> mode("inline");
        
        $sortable = new \Kendo\UI\GridSortable();
        $sortable->mode('single')
            ->allowUnsort(false);
         
        $grid->addColumn($programTitle, $programArea, $regionalStationName, $divisionUnitName, $departmentName, $commandColumn, $command)
             ->dataSource($dataSource) //->addToolbarItem($btnAdd)
             //->addToolbarItem($btnAdd)
			 ->height(450)
             //->editable($editable)
             ->sortable($sortable)   
             ->pageable(true);
        
        $gridData =  $grid->render();
        $this->template->set('grid_data', $gridData);
		
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
		
        $this->template->set('program_area',$this->program->get_program_area());
		$this->template->set('research_priority',$this->program->get_research_priority());
		$this->template->set('research_status',$this->program->get_research_status());
		$this->template->set('research_type',$this->program->get_research_type());
		$this->template->set('division_or_unit',$this->program->get_division_or_unit());
		$this->template->set('department_name',$this->program->get_department_name());
		$this->template->set('regional_station_name',$this->program->get_regional_station_name());
		$this->template->set('implementation_location',$this->program->get_implementation_location());
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