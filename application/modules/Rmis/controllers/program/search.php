<?php
class Search extends MX_Controller{
    private $_data;
    public function __construct(){
        parent::__construct();
        $this->load->model('Kendodatasource_model', 'grid');
        $this->load->model('Program_model', 'program');

        $this->template->set_partial('header', 'layouts/header')
						->set_layout('extensive/main_layout');
    }
    
    public function index($division_id=NULL){
        $this->template->title('Research Management(RM)', ' Program', ' Search');
        
		
		$_data['dashboard_menu_active'] = '';
        $_data['setup_menu_active'] = 'class="active"';
        $_data['setup_funds_menu_active'] ='class="active"';
        $_data['setup_training_program_type_menu_active'] ='';
        $_data['setup_institutes_menu_active'] ='';
        
        $this->template->append_metadata('<link href="/assets/kendoui/css/web/kendo.common.min.css"  rel="stylesheet"/>');
        $this->template->append_metadata('<link href="/assets/kendoui/css/web/kendo.default.min.css"  rel="stylesheet"/>');
        $this->template->append_metadata('<script src="/assets/kendoui/js/kendo.all.min.js"></script>');
        $this->template->append_metadata('<script src="/assets/js/custom/rmis.js"></script>');
                
        require_once APPPATH.'third_party/kendoui/Autoload.php';
        
        $transport = new \Kendo\Data\DataSourceTransport();

        $create = new \Kendo\Data\DataSourceTransportCreate();

        $create->url(site_url('Rmis/setup/divisions/dataCreate'))
             ->contentType('application/json')
             ->type('POST');

        $read = new \Kendo\Data\DataSourceTransportRead();

        $read->url(site_url('Rmis/setup/divisions/dataRead'))
             ->contentType('application/json')
             ->type('POST');

        $update = new \Kendo\Data\DataSourceTransportUpdate();

        $update->url(site_url('Rmis/setup/divisions/dataUpdate'))
             ->contentType('application/json')
             ->type('POST');

        $destroy = new \Kendo\Data\DataSourceTransportDestroy();

        $destroy->url(site_url('Rmis/setup/divisions/dataDestroy'))
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

        $IDField = new \Kendo\Data\DataSourceSchemaModelField('id');
        $IDField->type('number')
                       ->editable(false)
                       ->nullable(true);
					   
		$divisionIDField = new \Kendo\Data\DataSourceSchemaModelField('division_id');
        $divisionIDField->type('string');
                       //->editable(false)
                       //->nullable(true);
        
        $divisionNameField = new \Kendo\Data\DataSourceSchemaModelField('division_name');
        $divisionNameField->type('string')
                ->properties();

        $divisionHeadField = new \Kendo\Data\DataSourceSchemaModelField('division_head');
        $divisionHeadField->type('string');


        $divisionPhoneField = new \Kendo\Data\DataSourceSchemaModelField('division_phone');
        $divisionPhoneField->type('string');
		
		$divisionEmailField = new \Kendo\Data\DataSourceSchemaModelField('division_email');
        $divisionEmailField->type('string');

        $model->id('id')
            ->addField($IDField)
            ->addField($divisionIDField)
            ->addField($divisionNameField)
			->addField($divisionHeadField)
			->addField($divisionPhoneField)
			->addField($divisionEmailField);

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
		
        $ID = new \Kendo\UI\GridColumn();
        $ID->field('division_id') //->filterable($fundTypeFilterable)
                 ->title('S/O');
				 
		$divName = new \Kendo\UI\GridColumn();
        $divName->field('division_name')
                 ->title('Program Area');
				 
		$divHead = new \Kendo\UI\GridColumn();
        $divHead->field('division_head')
                 ->title('Division');
				 
		$divPhone = new \Kendo\UI\GridColumn();
        $divPhone->field('division_phone')
                 ->title('Research Type');
				 
		$divEmail = new \Kendo\UI\GridColumn();
        $divEmail->field('division_email')
                 ->title('Priority');
		
		$researchStatus = new \Kendo\UI\GridColumn();
        $researchStatus->field('division_email')
                 	   ->title('Research Status');
				 
		$plannedBudget = new \Kendo\UI\GridColumn();
        $plannedBudget->field('division_email')
                 	  ->title('Planned Budget');
				 
		$actualBudget = new \Kendo\UI\GridColumn();
        $actualBudget->field('division_email')
                 	 ->title('Actual Budget');
		
		$fundingSource = new \Kendo\UI\GridColumn();
        $fundingSource->field('division_email')
                 	  ->title('Funding Source');
		
		$PI = new \Kendo\UI\GridColumn();
        $PI->field('division_email')
                 ->title('PI');
				 
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
        ->width(80);
        
        $editable = new \Kendo\UI\GridEditable();
        $editable 	-> templateId("popup_editor")
                	->confirmation("Are you sure you want to delete this record?")
               	 	-> mode("inline");
        
        $sortable = new \Kendo\UI\GridSortable();
        $sortable->mode('single')
            ->allowUnsort(false);
        
        //$btnAdd = new \Kendo\UI\GridToolbarItem('create');
        //$btnAdd->text("Add New Performing Unit/Division");
		
        /*
        $stringOperators = new \Kendo\UI\GridFilterableOperatorsString();
        $stringOperators
                ->startsWith('Starts with')
                ->eq('Is equal to')
                ->neq('Is not equal to');
		
		
        $operators = new \Kendo\UI\GridFilterableOperators();
        $operators->string($stringOperators);

        $filterable = new \Kendo\UI\GridFilterable();
        $filterable->extra(false)
            ->operators($operators);
		*/	
        
        $grid->addColumn($ID, $divName, $divHead, $divPhone, $divEmail,$researchStatus,$plannedBudget, $actualBudget, $fundingSource, $PI, $commandColumn, $command)
             ->dataSource($dataSource) 
			 //->addToolbarItem($btnAdd)
			 ->height(450)
             ->editable($editable)
             ->sortable($sortable)   
             ->pageable(true);
        
        $gridData =  $grid->render();
        $this->template->set('grid_data', $gridData);
		
		
		if($division_id!=NULL){
			
			if($this->input->post('save_update')){
				$request = json_encode($this->input->post());
				$this->dataUpdate($request);
			}
				
			$division_detail = $this->division->get_details($division_id);
			$this->template->set('division_detail', serialize($division_detail));
		}
		
		
        $this->template->set('content_header_icon', 'class="icofont-file"');
        $this->template->set('content_header_title', 'Program Search');
		
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
		
		$departments = $this->program->get_department();
		$this->template->set('departments',$departments);
		
        $breadcrumb = '<ul class="breadcrumb">
						<li><a href="#"><i class="icofont-home"></i> RMIS</a> <span class="divider">&raquo;</span></li>
						<li><a href="#">Program</a><span class="divider">&raquo;</span></li><li class="active">Search</li>
					  </ul>';
        $this->template->set('breadcrumb', $breadcrumb);		
        $this->template->set_partial('divInfoForm','program/search/form');
        $this->template->set_partial('sidebar', 'layouts/sidebar',$_data)
               ->build('program/search/index');
    }
	
	public function dataCreate($request){
        //header('Content-Type: application/json');
        //$request = json_decode(file_get_contents('php://input'));
        $request = json_decode($request);
		//print_r($request);
		
        $this->form_validation->set_rules($this->division->validation);
        $this->division->isValidate((array) $request);
        if ($this->form_validation->run() === false) {
            header("HTTP/1.1 500 Internal Server Error");
            echo "Wrong data ! try again" ;
            exit;
        }
       
        $columns = array('division_id', 'division_name', 'division_head', 'division_phone', 'division_email', 'division_order', 'division_about');
        $columns[] = 'created_at';
        $request->created_at = date('Y-m-d H:i:s');            
        $columns[] = 'created_by';
        $request->created_by = $this->loginUser->id;
        
        $data= $this->grid->create('rmis_divisions', $columns, $request, 'id'); 
        $data['success'] ="Data created successfuly.";
        //echo json_encode($data , JSON_NUMERIC_CHECK); 
    }
    
    public function dataRead(){
        header('Content-Type: application/json');
        $request = json_decode(file_get_contents('php://input'));
        $data= $this->grid->read_with_join_table('rmis_divisions', array('rmis_divisions.id','division_id', 'division_name', 'hrm_employees.employee_name as division_head','division_phone','division_email'), $request, 'hrm_employees', 'rmis_divisions.division_head = hrm_employees.employee_id');       
        echo json_encode($data, JSON_NUMERIC_CHECK);
    }
    public function dataDestroy(){   
        header('Content-Type: application/json');
        $request = json_decode(file_get_contents('php://input'));
        $data = $this->grid->destroy('rmis_divisions', $request->models, 'id'); 
        echo json_encode($data , JSON_NUMERIC_CHECK); 
    }
    	
	public function dataUpdate($request){
        //header('Content-Type: application/json');
        //$request = json_decode(file_get_contents('php://input'));
        $request = json_decode($request);
       // print_r($request);
        $this->form_validation->set_rules($this->division->validation);
        $this->division->isValidate((array) $request);
        if ($this->form_validation->run() === false) {
            header("HTTP/1.1 500 Internal Server Error");
            echo "Wrong data ! try again" ;
            exit;
        }
        
        $columns = array('id', 'division_name', 'division_head', 'division_phone', 'division_email', 'division_order', 'division_about');
        $columns[] = 'modified_at';        
        $request->modified_at = date('Y-m-d H:i:s');            
        $columns[] = 'modified_by';
        $request->modified_by = 1;
        
        $data = $this->grid->update('rmis_divisions', $columns, $request, 'id'); 
        $data['success'] ="Data updated successfuly.";
        //echo json_encode($data , JSON_NUMERIC_CHECK);  
    }
                
} 
