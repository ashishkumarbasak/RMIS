<?php

class Divisions extends MX_Controller{
    private $_data;
    public function __construct(){
        parent::__construct();
        $this->load->model('Kendodatasource_model', 'grid');
        $this->load->model('Division_model', 'division');
		$this->load->model('Employee_model', 'employee');

        $this->template->set_partial('header', 'layouts/header')
						->set_layout('extensive/main_layout');
    }
    
    public function index($division_id=NULL){
        $this->template->title('Research Management(RM)', ' Setup Info.', ' Performing Unit/Division');
        
		if($this->input->post('save_division')){
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

        $create->url(site_url('Rmis/Setup/Divisions/dataCreate'))
             ->contentType('application/json')
             ->type('POST');

        $read = new \Kendo\Data\DataSourceTransportRead();

        $read->url(site_url('Rmis/setup/divisions/dataRead'))
             ->contentType('application/json')
             ->type('POST');

        $update = new \Kendo\Data\DataSourceTransportUpdate();

        $update->url(site_url('Rmis/Setup/Divisions/dataUpdate'))
             ->contentType('application/json')
             ->type('POST');

        $destroy = new \Kendo\Data\DataSourceTransportDestroy();

        $destroy->url(site_url('Rmis/Setup/Divisions/dataDestroy'))
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
                 ->title('ID');
				 
		$divName = new \Kendo\UI\GridColumn();
        $divName->field('division_name')
                 ->title('Division / Unit Name');
				 
		$divHead = new \Kendo\UI\GridColumn();
        $divHead->field('division_head')
                 ->title('Head of Division');
				 
		$divPhone = new \Kendo\UI\GridColumn();
        $divPhone->field('division_phone')
                 ->title('Phone No');
				 
		$divEmail = new \Kendo\UI\GridColumn();
        $divEmail->field('division_email')
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
        
        $grid->addColumn($ID, $divName, $divHead, $divPhone, $divEmail, $commandColumn, $command)
             ->dataSource($dataSource) 
			 //->addToolbarItem($btnAdd)
			 ->height(450)
             ->editable($editable)
             ->sortable($sortable)   
             ->pageable(true);
        
        $gridData =  $grid->render();
        $this->template->set('grid_data', $gridData);
		
		$this->template->set('newDivID',$this->division->get_new_id());
		
		if($division_id!=NULL){
			
			if($this->input->post('save_update')){
				$request = json_encode($this->input->post());
				$this->dataUpdate($request);
			}
			
			if($this->input->post('delete_division')){
				$request = json_encode($this->input->post());
				$this->dataDestroy($request);
				redirect('Rmis/Setup/Divisions','refresh');
			}
				
			$division_detail = $this->division->get_details($division_id);
			$this->template->set('division_detail', serialize($division_detail));
		}
		
		
        $this->template->set('content_header_icon', 'class="icofont-file"');
        $this->template->set('content_header_title', 'Performing Unit/division Information');
        $this->template->set('employees',$this->employee->get_employees());
		
        $breadcrumb = '<ul class="breadcrumb">
						<li><a href="#"><i class="icofont-home"></i> RMIS</a> <span class="divider">&raquo;</span></li>
						<li><a href="#">Setup info.</a><span class="divider">&raquo;</span></li><li class="active">Performing Unit/Division</li>
					  </ul>';
        $this->template->set('breadcrumb', $breadcrumb);		
        $this->template->set_partial('divInfoForm','setup/divisions/form');
        $this->template->set_partial('sidebar', 'layouts/sidebar',$_data)
               ->build('setup/divisions/index');
    }
	
	public function dataCreate($request){
        $request = json_decode($request);
		
        $this->form_validation->set_rules($this->division->validation);
        $this->division->isValidate((array) $request);
        if ($this->form_validation->run() === false) {
            header("HTTP/1.1 500 Internal Server Error");
            echo "Wrong data ! try again" ;
            exit;
        }		
		
        $columns = array('division_id', 'division_name', 'division_head', 'division_phone', 'division_email', 'division_order', 'division_about');
        
		$columns[] = 'organization_id';
		$request->organization_id = $this->config->item('organization_id');		
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
	
    public function dataDestroy($request=NULL){
		if($request!=NULL){
			 $request = json_decode($request);
			 $data = $this->grid->destroy('rmis_divisions', $request, 'id');
		}else{   
        	header('Content-Type: application/json');
        	$request = json_decode(file_get_contents('php://input'));
			$data = $this->grid->destroy('rmis_divisions', $request->models, 'id'); 
        	echo json_encode($data , JSON_NUMERIC_CHECK);
		}        
    }
    	
	public function dataUpdate($request){
        $request = json_decode($request);
        $this->form_validation->set_rules($this->division->validation);
        $this->division->isValidate((array) $request);
        if ($this->form_validation->run() === false) {
            header("HTTP/1.1 500 Internal Server Error");
            echo "Wrong data ! try again" ;
            exit;
        }
        
        $columns = array('id', 'division_name', 'division_head', 'division_phone', 'division_email', 'division_order', 'division_about');
        
		$columns[] = 'organization_id';
		$request->organization_id = $this->config->item('organization_id');
		$columns[] = 'updated_at';        
        $request->updated_at = date('Y-m-d H:i:s');            
        $columns[] = 'updated_by';
        $request->updated_by = $this->loginUser->id;
        
        $data = $this->grid->update('rmis_divisions', $columns, $request, 'id'); 
        $data['success'] ="Data updated successfuly.";
        //echo json_encode($data , JSON_NUMERIC_CHECK);  
    }
                
} 
?>