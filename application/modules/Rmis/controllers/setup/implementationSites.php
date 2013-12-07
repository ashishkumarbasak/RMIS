<?php

class ImplementationSites extends MX_Controller{
    private $_data;
    public function __construct(){
        parent::__construct();
        $this->load->model('Kendodatasource_model', 'grid');
        $this->load->model('Implementation_model', 'implementation');
		$this->load->model('Employee_model', 'employee');

        $this->template->set_partial('header', 'layouts/header')
						->set_layout('extensive/main_layout');
    }
    
    public function index($implementation_site_id=NULL){
        $this->template->title('Research Management(RM)', ' Setup Info.', 'Implementation Site/Area Information');
        
		if($this->input->post('save_implementation')){
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
		$this->template->append_metadata('<script src="/assets/jqueryui/1.8/jquery-ui.min.js"></script>');
        $this->template->append_metadata('<script src="/assets/js/custom/rmis.js"></script>');
		$this->template->append_metadata('<script src="/assets/extensive/js/jquery.validate.min.js"></script>');
		$this->template->append_metadata('<script src="/assets/js/custom/rmis_setup.js"></script>');
                
        require_once APPPATH.'third_party/kendoui/Autoload.php';
        
        $transport = new \Kendo\Data\DataSourceTransport();

        $create = new \Kendo\Data\DataSourceTransportCreate();

        $create->url(site_url('Rmis/setup/implementationSites/dataCreate'))
             ->contentType('application/json')
             ->type('POST');

        $read = new \Kendo\Data\DataSourceTransportRead();

        $read->url(site_url('Rmis/setup/implementationSites/dataRead'))
             ->contentType('application/json')
             ->type('POST');

        $update = new \Kendo\Data\DataSourceTransportUpdate();

        $update->url(site_url('Rmis/setup/implementationSites/dataUpdate'))
             ->contentType('application/json')
             ->type('POST');

        $destroy = new \Kendo\Data\DataSourceTransportDestroy();

        $destroy->url(site_url('Rmis/setup/implementationSites/dataDestroy'))
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
					   
		$implementationIDField = new \Kendo\Data\DataSourceSchemaModelField('implementation_site_id');
        $implementationIDField->type('string');
                       //->editable(false)
                       //->nullable(true);
        
        $implementationNameField = new \Kendo\Data\DataSourceSchemaModelField('implementation_site_name');
        $implementationNameField->type('string')
                ->properties();

        $implementationpersonField = new \Kendo\Data\DataSourceSchemaModelField('contact_person');
        $implementationpersonField->type('string');


        $implementationPhoneField = new \Kendo\Data\DataSourceSchemaModelField('phone_number');
        $implementationPhoneField->type('string');
		
		$implementationEmailField = new \Kendo\Data\DataSourceSchemaModelField('email_address');
        $implementationEmailField->type('string');

        $model->id('id')
            ->addField($IDField)
            ->addField($implementationIDField)
            ->addField($implementationNameField)
			->addField($implementationpersonField)
			->addField($implementationPhoneField)
			->addField($implementationEmailField);

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
        $ID->field('implementation_site_id') //->filterable($fundTypeFilterable)
                 ->title('ID');
				 
		$impName = new \Kendo\UI\GridColumn();
        $impName->field('implementation_site_name')
                 ->title('Implementation site/Area');
				 
		$impHead = new \Kendo\UI\GridColumn();
        $impHead->field('contact_person')
                 ->title('Contact Person');
				 
		$impPhone = new \Kendo\UI\GridColumn();
        $impPhone->field('phone_number')
                 ->title('Phone No');
				 
		$impEmail = new \Kendo\UI\GridColumn();
        $impEmail->field('email_address')
                 ->title('Email');
		
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
        
        $grid->addColumn($ID, $impName, $impHead, $impPhone, $impEmail, $commandColumn, $command)
             ->dataSource($dataSource) //->addToolbarItem($btnAdd)
             //->addToolbarItem($btnAdd)
			 ->height(450)
             ->editable($editable)
             ->sortable($sortable)   
             ->pageable(true);
        
        $gridData =  $grid->render();
        $this->template->set('grid_data', $gridData);
       	
		$this->template->set('newImplSiteID',$this->implementation->get_new_id());
		
		if($implementation_site_id!=NULL){
			
			if($this->input->post('save_update')){
				$request = json_encode($this->input->post());
				$this->dataUpdate($request);
			}
			
			if($this->input->post('delete_implementation')){
				$request = json_encode($this->input->post());
				$this->dataDestroy($request);
				redirect("Rmis/setup/implementationSites", "refresh");
			}
				
			$implementation_detail = $this->implementation->get_details($implementation_site_id);
			$this->template->set('implementation_detail', serialize($implementation_detail));
		}		
		
        $this->template->set('content_header_icon', 'class="icofont-file"');
        $this->template->set('content_header_title', 'Implementation site/Area Information');
		$this->template->set('employees',$this->employee->get_employees());
        
        $breadcrumb = '<ul class="breadcrumb">
						<li><a href="#"><i class="icofont-home"></i> RMIS</a> <span class="divider">&raquo;</span></li>
						<li><a href="#">Setup info.</a><span class="divider">&raquo;</span></li><li class="active">Implementation Site/Area</li>
					  </ul>';
        $this->template->set('breadcrumb', $breadcrumb);
        $this->template->set_partial('implsiteInfoForm','setup/implementation_sites/form');
        $this->template->set_partial('sidebar', 'layouts/sidebar',$_data)
               ->build('setup/implementation_sites/index');
    }
	
	public function dataCreate($request){
        $request = json_decode($request);
     	//$request->models[0]->fund_type = $request->models[0]->fund_type->fund_type;
        
        $this->form_validation->set_rules($this->implementation->validation);
        $this->implementation->isValidate((array) $request);
        if ($this->form_validation->run() === false) {
            header("HTTP/1.1 500 Internal Server Error");
            echo "Wrong data ! try again" ;
            exit;
        }
       
        $columns = array('implementation_site_id', 'implementation_site_name', 'contact_person', 'phone_number', 'email_address', 'implementation_order');
        $columns[] = 'organization_id';
		$request->organization_id = $this->config->item('organization_id');
		$columns[] = 'created_at';
        $request->created_at = date('Y-m-d H:i:s');            
        $columns[] = 'created_by';
        $request->created_by = $this->loginUser->id;
        
        $data= $this->grid->create('rmis_implementation_sites', $columns, $request, 'id'); 
        $data['success'] ="Data created successfuly.";
       // echo json_encode($data , JSON_NUMERIC_CHECK); 
    }
    
    public function dataRead(){
        header('Content-Type: application/json');
        $request = json_decode(file_get_contents('php://input'));
        $data= $this->grid->read_with_join_table('rmis_implementation_sites', array('rmis_implementation_sites.id','implementation_site_id', 'implementation_site_name', 'hrm_employees.employee_name as contact_person','phone_number','email_address'), $request, 'hrm_employees', 'rmis_implementation_sites.contact_person = hrm_employees.employee_id');       
        echo json_encode($data, JSON_NUMERIC_CHECK);
    }
    public function dataDestroy($request=NULL){
		if($request!=NULL){
			 $request = json_decode($request);
			 $data = $this->grid->destroy('rmis_implementation_sites', $request, 'id');
		}
		else{   
			header('Content-Type: application/json');
			$request = json_decode(file_get_contents('php://input'));
			$data = $this->grid->destroy('rmis_implementation_sites', $request, 'id'); 
			echo json_encode($data , JSON_NUMERIC_CHECK); 
		}
    }
    	
	public function dataUpdate($request){
        $request = json_decode($request);
        
        $this->form_validation->set_rules($this->implementation->validation);
        $this->implementation->isValidate((array) $request);
        if ($this->form_validation->run() === false) {
            header("HTTP/1.1 500 Internal Server Error");
            echo "Wrong data ! try again" ;
            exit;
        }
        
        $columns = array('id', 'implementation_site_name', 'contact_person', 'phone_number', 'email_address', 'implementation_order');
        $columns[] = 'organization_id';
		$request->organization_id = $this->config->item('organization_id');
		$columns[] = 'updated_at';        
        $request->updated_by = date('Y-m-d H:i:s');            
        $columns[] = 'updated_by';
        $request->updated_by = $this->loginUser->id;
        
        $data= $this->grid->update('rmis_implementation_sites', $columns, $request, 'id'); 
        $data['success'] ="Data updated successfuly.";
        //echo json_encode($data , JSON_NUMERIC_CHECK);  
    }
                
} 
