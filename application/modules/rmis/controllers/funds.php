<?php

class Funds extends MX_Controller
{
    private $_data;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kendodatasource_model', 'grid');
        $this->load->model('Funds_model', 'funds');

        $this->template->set_partial('header', 'layouts/header')
                ->set_layout('extensive/main_layout');
    }
    
    public function index()
    {
        $this->template->title('Training Management(TM)', ' Setup Info.', ' Source of Fund');
        
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

        $create->url(site_url('rmis/funds/dataCreate'))
             ->contentType('application/json')
             ->type('POST');

        $read = new \Kendo\Data\DataSourceTransportRead();

        $read->url(site_url('rmis/funds/dataRead'))
             ->contentType('application/json')
             ->type('POST');

        $update = new \Kendo\Data\DataSourceTransportUpdate();

        $update->url(site_url('rmis/funds/dataUpdate'))
             ->contentType('application/json')
             ->type('POST');

        $destroy = new \Kendo\Data\DataSourceTransportDestroy();

        $destroy->url(site_url('rmis/funds/dataDestroy'))
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

        $fundIDField = new \Kendo\Data\DataSourceSchemaModelField('id');
        $fundIDField->type('number')
                       ->editable(false)
                       ->nullable(true);
        
        $foundType = new \Kendo\Data\DataSourceSchemaModelField('fund_type');
        $foundType->type('string')
                ->properties();

        $sourceFundField = new \Kendo\Data\DataSourceSchemaModelField('source_fund');
        $sourceFundField->type('string')
                         ->validation(array('required' => true));


        $statusField = new \Kendo\Data\DataSourceSchemaModelField('is_active');
        $statusField->type('boolean');

        $model->id('id')
            ->addField($fundIDField)
            ->addField($sourceFundField)
            ->addField($statusField);

        $schema = new \Kendo\Data\DataSourceSchema();
        $schema->data('data')
               ->errors('errors')
               ->model($model)
               ->total('total');

        $dataSource = new \Kendo\Data\DataSource();

        $dataSource->transport($transport)
                   ->batch(true)
                   ->pageSize(20)
                   ->error('onError')
                   ->requestEnd('onRequestEnd')
                   ->serverSorting(true)
                   ->schema($schema);

        $grid = new \Kendo\UI\Grid('grid');

        $fundTypeFilterable = new \Kendo\UI\GridColumnFilterable();
        $fundTypeFilterable->ui(new \Kendo\JavaScriptFunction('fundTypeFilter'));

        $fundType = new \Kendo\UI\GridColumn();
        $fundType->field('fund_type')
                 ->filterable($fundTypeFilterable)
                 ->title('Fund Type');
        
        $sourceFundFilterable = new \Kendo\UI\GridColumnFilterable();
        $sourceFundFilterable->ui(new \Kendo\JavaScriptFunction('sourceFundFilter'));
        $sourceFund = new \Kendo\UI\GridColumn();
        $sourceFund->field('source_fund')
                   ->filterable($sourceFundFilterable)
                   ->title('Source of Fund');

        $fundStatus = new \Kendo\UI\GridColumn();
        $fundStatus->field('is_active')
                  ->width(100)
                  ->filterable(false)
                  ->title('Status');
        $fundStatus->template(
        '# if (is_active == 1) { #Active# } else { #Inactive# } #'
        );

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
        
        $btnAdd = new \Kendo\UI\GridToolbarItem('create');
        $btnAdd->text("Add New Source of Fund");
        
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
        
        $grid->addColumn($fundType, $sourceFund, $fundStatus, $command)
             ->dataSource($dataSource)
             ->addToolbarItem($btnAdd)
             ->height(430)
             ->editable($editable)
             ->sortable($sortable)
             ->filterable($filterable)    
             ->pageable(true);
        
        $gridData =  $grid->render();
        $this->template->set('grid_data', $gridData);
        
        $this->template->set('content_header_icon', 'class="icofont-file"');
        $this->template->set('content_header_title', 'Source of Fund');
        
        $breadcrumb = '<ul class="breadcrumb">
						<li><a href="#"><i class="icofont-home"></i> TM</a> <span class="divider">›</span></li>
						<li><a href="#">Setup info.</a><span class="divider">›</span></li><li class="active">Source of Fund</li>
					  </ul>';
        $this->template->set('breadcrumb', $breadcrumb);
        
        $this->template->set_partial('sidebar', 'layouts/sidebar',$_data)
               ->build('funds/sourcefounds');
    }
    
    public function dataRead()
    {
        header('Content-Type: application/json');
        $request = json_decode(file_get_contents('php://input'));
        $data= $this->grid->read('tm_funds', array('id','fund_type', 'source_fund', 'description','is_active'), $request);       
        echo json_encode($data, JSON_NUMERIC_CHECK);
    }
    public function dataDestroy()
    {   
        header('Content-Type: application/json');
        $request = json_decode(file_get_contents('php://input'));
        $data= $this->grid->destroy('tm_funds', $request->models, 'id'); 
//        if(!$data){
//            $data['errors'] ="Data deleted successfuly.";
//        }
        echo json_encode($data , JSON_NUMERIC_CHECK); 
    }
    public function dataUpdate()
    {
        header('Content-Type: application/json');
        $request = json_decode(file_get_contents('php://input'));
        
        $this->form_validation->set_rules($this->funds->validation);
        $this->funds->isValidate((array) $request->models[0]);
        if ($this->form_validation->run() === false) {
            header("HTTP/1.1 500 Internal Server Error");
            echo "Wrong data ! try again" ;
            exit;
        }
        
        $columns = array('id', 'fund_type', 'source_fund', 'description', 'is_active');
        //$columns[] = 'organization_id';
        //$request->models[0]->organization_id = 20;
        $columns[] = 'updated_at';        
        $request->models[0]->updated_at = date('Y-m-d H:i:s');            
        $columns[] = 'updated_by';
        $request->models[0]->updated_by = 200;
        
        $data= $this->grid->update('tm_funds', $columns, $request->models, 'id'); 
        //$data['success'] ="Data updated successfuly.";
        echo json_encode($data , JSON_NUMERIC_CHECK);  
    }
    public function dataCreate()
    {
        header('Content-Type: application/json');
        $request = json_decode(file_get_contents('php://input'));
        
      
        $request->models[0]->fund_type = $request->models[0]->fund_type->fund_type;
        
        $this->form_validation->set_rules($this->funds->validation);
        $this->funds->isValidate((array) $request->models[0]);
        if ($this->form_validation->run() === false) {
            header("HTTP/1.1 500 Internal Server Error");
            echo "Wrong data ! try again" ;
            exit;
        }
       
        $columns = array('id', 'fund_type', 'source_fund', 'description', 'is_active');
        $columns[] = 'organization_id';
        $request->models[0]->organization_id = 20;
        $columns[] = 'created_at';        
        $request->models[0]->created_at = date('Y-m-d H:i:s');            
        $columns[] = 'created_by';
        $request->models[0]->created_by = 200;
        
        $data= $this->grid->create('tm_funds', $columns, $request->models, 'id'); 
        //$data['success'] ="Data created successfuly.";
        echo json_encode($data , JSON_NUMERIC_CHECK); 
    }
                
} 
