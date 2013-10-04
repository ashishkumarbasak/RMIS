<?php

class RegionalStations extends MX_Controller{
    private $_data;
    public function __construct(){
        parent::__construct();
        $this->load->model('Kendodatasource_model', 'grid');
        $this->load->model('Station_model', 'station');

        $this->template->set_partial('header', 'layouts/header')
						->set_layout('extensive/main_layout');
    }
    
    public function index($station_id=NULL){
        $this->template->title('Research Management(RM)', ' Setup Info.', ' Regional Station Information');
        
		if($this->input->post('save_station')){
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
                
        require_once APPPATH.'third_party/kendoui/Autoload.php';
        
        $transport = new \Kendo\Data\DataSourceTransport();

        $create = new \Kendo\Data\DataSourceTransportCreate();

        $create->url(site_url('rmis/setup/regionalStations/dataCreate'))
             ->contentType('application/json')
             ->type('POST');

        $read = new \Kendo\Data\DataSourceTransportRead();

        $read->url(site_url('rmis/setup/regionalStations/dataRead'))
             ->contentType('application/json')
             ->type('POST');

        $update = new \Kendo\Data\DataSourceTransportUpdate();

        $update->url(site_url('rmis/setup/regionalStations/dataUpdate'))
             ->contentType('application/json')
             ->type('POST');

        $destroy = new \Kendo\Data\DataSourceTransportDestroy();

        $destroy->url(site_url('rmis/setup/regionalStations/dataDestroy'))
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
					   
		$stationIDField = new \Kendo\Data\DataSourceSchemaModelField('station_id');
        $stationIDField->type('string');
                       //->editable(false)
                       //->nullable(true);
        
        $stationNameField = new \Kendo\Data\DataSourceSchemaModelField('station_name');
        $stationNameField->type('string')
                ->properties();

        $stationHeadField = new \Kendo\Data\DataSourceSchemaModelField('station_contact_person');
        $stationHeadField->type('string');


        $stationPhoneField = new \Kendo\Data\DataSourceSchemaModelField('station_phone');
        $stationPhoneField->type('string');
		
		$stationEmailField = new \Kendo\Data\DataSourceSchemaModelField('station_email');
        $stationEmailField->type('string');

        $model->id('id')
            ->addField($IDField)
            ->addField($stationIDField)
            ->addField($stationNameField)
			->addField($stationHeadField)
			->addField($stationPhoneField)
			->addField($stationEmailField);

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
		
		
        //$IDFilterable = new \Kendo\UI\GridColumnFilterable();
        //$IDFilterable->ui(new \Kendo\JavaScriptFunction('fundTypeFilter'));
		
        $ID = new \Kendo\UI\GridColumn();
        $ID->field('station_id') //->filterable($fundTypeFilterable)
                 ->title('ID');
				 
		$staName = new \Kendo\UI\GridColumn();
        $staName->field('station_name')
                 ->title('Regional Station Name');
				 
		$staHead = new \Kendo\UI\GridColumn();
        $staHead->field('station_contact_person')
                 ->title('Contact Person');
				 
		$staPhone = new \Kendo\UI\GridColumn();
        $staPhone->field('station_phone')
                 ->title('Phone No');
				 
		$staEmail = new \Kendo\UI\GridColumn();
        $staEmail->field('station_email')
                 ->title('Email');
		
		$command = new \Kendo\UI\GridColumn();
        $command->addCommandItem('edit')
                ->addCommandItem('destroy')
                ->title('&nbsp;')
                ->width(160);
        
        $editable = new \Kendo\UI\GridEditable();
        $editable -> templateId("popup_editor")
                ->confirmation("Are you sure you want to delete this record?")
                -> mode("popup");
        
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
        
        $grid->addColumn($ID, $staName, $staHead, $staPhone, $staEmail, $command)
             ->dataSource($dataSource) //->addToolbarItem($btnAdd)
             //->addToolbarItem($btnAdd)
			 ->height(450)
             ->editable($editable)
             ->sortable($sortable)   
             ->pageable(true);
        
        $gridData =  $grid->render();
        $this->template->set('grid_data', $gridData);
		
		$this->template->set('newStationID',$this->station->get_new_id());
		
		if($station_id!=NULL){
			
			if($this->input->post('save_update')){
				$request = json_encode($this->input->post());
				$this->dataUpdate($request);
			}
				
			$station_detail = $this->station->get_details($station_id);
			$this->template->set('station_detail', serialize($station_detail));
		}
		
        $this->template->set('content_header_icon', 'class="icofont-file"');
        $this->template->set('content_header_title', 'Regional Station Information');
        
        $breadcrumb = '<ul class="breadcrumb">
						<li><a href="#"><i class="icofont-home"></i> RMIS</a> <span class="divider">&raquo;</span></li>
						<li><a href="#">Setup info.</a><span class="divider">&raquo;</span></li><li class="active">Performing Unit/Division</li>
					  </ul>';
        $this->template->set('breadcrumb', $breadcrumb);
        $this->template->set_partial('regionalInfoForm','setup/regional_stations/form');
        $this->template->set_partial('sidebar', 'layouts/sidebar',$_data)
               ->build('setup/regional_stations/index');
    }
	
	public function dataCreate($request){
        //header('Content-Type: application/json');
        //$request = json_decode(file_get_contents('php://input'));
        $request = json_decode($request);
     	//$request->models[0]->fund_type = $request->models[0]->fund_type->fund_type;
        
        $this->form_validation->set_rules($this->station->validation);
        $this->station->isValidate((array) $request->models[0]);
        if ($this->form_validation->run() === false) {
            header("HTTP/1.1 500 Internal Server Error");
            echo "Wrong data ! try again" ;
            exit;
        }
       
        $columns = array('station_id', 'station_name', 'station_contact_person', 'station_phone', 'station_email', 'station_order', 'station_address');
        $columns[] = 'created_at';
        $request->created_at = date('Y-m-d H:i:s');            
        $columns[] = 'created_by';
        $request->created_by = 1;
        
        $data= $this->grid->create('rmis_regional_stations', $columns, $request, 'id'); 
        $data['success'] ="Data created successfuly.";
       // echo json_encode($data , JSON_NUMERIC_CHECK); 
    }
    
    public function dataRead(){
        header('Content-Type: application/json');
        $request = json_decode(file_get_contents('php://input'));
        $data= $this->grid->read('rmis_regional_stations', array('id','station_id', 'station_name', 'station_contact_person','station_phone','station_email'), $request);       
        echo json_encode($data, JSON_NUMERIC_CHECK);
    }
    public function dataDestroy(){   
        header('Content-Type: application/json');
        $request = json_decode(file_get_contents('php://input'));
        $data = $this->grid->destroy('rmis_regional_stations', $request->models, 'id'); 
        echo json_encode($data , JSON_NUMERIC_CHECK); 
    }
    	
	public function dataUpdate($request){
        //header('Content-Type: application/json');
        //$request = json_decode(file_get_contents('php://input'));
        $request = json_decode($request);
        
        $this->form_validation->set_rules($this->station->validation);
        $this->station->isValidate((array) $request);
        if ($this->form_validation->run() === false) {
            header("HTTP/1.1 500 Internal Server Error");
            echo "Wrong data ! try again" ;
            exit;
        }
        
        $columns = array('id', 'station_name', 'station_contact_person', 'station_phone', 'station_email', 'station_order', 'station_address');
        $columns[] = 'modified_at';        
        $request->modified_at = date('Y-m-d H:i:s');            
        $columns[] = 'modified_by';
        $request->modified_by = 1;
        
        $data= $this->grid->update('rmis_regional_stations', $columns, $request, 'id'); 
        $data['success'] ="Data updated successfuly.";
        //echo json_encode($data , JSON_NUMERIC_CHECK);  
    }
                
} 
