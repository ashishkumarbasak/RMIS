<?php

class Gradings extends MX_Controller{
    private $_data;
    public function __construct(){
        parent::__construct();
        $this->load->model('Kendodatasource_model', 'grid');
        $this->load->model('Grading_model', 'grading');

        $this->template->set_partial('header', 'layouts/header')
						->set_layout('extensive/main_layout');
    }
    
    public function index($grading_id=NULL){
        $this->template->title('Research Management(RM)', ' Setup Info.', ' Grading Information');
        
		if($this->input->post('save_gradings')){
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

        $create->url(site_url('rmis/setup/gradings/dataCreate'))
             ->contentType('application/json')
             ->type('POST');

        $read = new \Kendo\Data\DataSourceTransportRead();

        $read->url(site_url('rmis/setup/gradings/dataRead'))
             ->contentType('application/json')
             ->type('POST');

        $update = new \Kendo\Data\DataSourceTransportUpdate();

        $update->url(site_url('rmis/setup/gradings/dataUpdate'))
             ->contentType('application/json')
             ->type('POST');

        $destroy = new \Kendo\Data\DataSourceTransportDestroy();

        $destroy->url(site_url('rmis/setup/gradings/dataDestroy'))
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
					   
		$gradingTitleField = new \Kendo\Data\DataSourceSchemaModelField('grading_title');
        $gradingTitleField->type('string');
                       //->editable(false)
                       //->nullable(true);
        
        $effectDateField = new \Kendo\Data\DataSourceSchemaModelField('effect_date');
        $effectDateField->type('string')
                ->properties();

        $model->id('id')
            ->addField($IDField)
            ->addField($gradingTitleField)
            ->addField($effectDateField);

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
        $ID->field('id') //->filterable($fundTypeFilterable)
                 ->title('ID');
				 
		$gradingTitle = new \Kendo\UI\GridColumn();
        $gradingTitle->field('grading_title')
                 ->title('Grading Title');
				 
		$effectDate = new \Kendo\UI\GridColumn();
        $effectDate->field('effect_date')
                 ->title('Effect Date');
		
		$command = new \Kendo\UI\GridColumn();
        $command->addCommandItem('destroy')
                ->title('&nbsp;')
                ->width(90);
				
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
                
        $grid->addColumn($gradingTitle, $effectDate, $commandColumn, $command)
             ->dataSource($dataSource)
			 ->height(450)
             ->editable($editable)
             ->sortable($sortable)   
             ->pageable(true);
        
        $gridData =  $grid->render();
        $this->template->set('grid_data', $gridData);
		
		if($grading_id!=NULL){
			if($this->input->post('update_gradings')){
				$request = json_encode($this->input->post());
				$this->dataUpdate($request);
			}
			$grading_detail = $this->grading->get_details($grading_id);
			$this->template->set('grading_detail', serialize($grading_detail));
			
			$grade_point_informations = $this->grading->get_grade_point_informations($grading_id);
			$this->template->set('grade_point_informations', serialize($grade_point_informations));
		}
		
		
        $this->template->set('content_header_icon', 'class="icofont-file"');
        $this->template->set('content_header_title', 'Grading Information');
		
        $breadcrumb = '<ul class="breadcrumb">
						<li><a href="#"><i class="icofont-home"></i> RMIS</a> <span class="divider">&raquo;</span></li>
						<li><a href="#">Setup info.</a><span class="divider">&raquo;</span></li><li class="active">Grading Information</li>
					  </ul>';
        $this->template->set('breadcrumb', $breadcrumb);		
        $this->template->set_partial('gradingInfoForm','setup/grading/form');
        $this->template->set_partial('sidebar', 'layouts/sidebar',$_data)
               ->build('setup/grading/index');
    }
	
	public function dataCreate($request){
        //header('Content-Type: application/json');
        //$request = json_decode(file_get_contents('php://input'));
        $request = json_decode($request);
		//print_r($request);
		
        $this->form_validation->set_rules($this->grading->validation);
        $this->grading->isValidate((array) $request);
        if ($this->form_validation->run() === false) {
            header("HTTP/1.1 500 Internal Server Error");
            echo "Wrong data ! try again" ;
            exit;
        }
       
        $columns = array('grading_title', 'effect_date');
        $columns[] = 'created_at';
        $request->created_at = date('Y-m-d H:i:s');            
        $columns[] = 'created_by';
        $request->created_by = 1;
        
        $data= $this->grid->create('rmis_gradings', $columns, $request, 'id');
		
		$columns = array('lower_range', 'upper_range','letter_grade','grade_point','qualitative_status','description','grading_id');
		$request->grading_id = $request->id;
		$i=0;
		if(!empty($request->lower_ranges)>0){
			foreach($request->lower_ranges as $lower_range_key=>$lower_range_value){
				if($lower_range_value!=NULL){
					$request->lower_range = $lower_range_value;
					$request->upper_range = $request->upper_ranges[$i];
					$request->letter_grade = $request->letter_grades[$i];
					$request->grade_point = $request->grade_points[$i];
					$request->qualitative_status = $request->qualitative_statuses[$i];
					$request->description = $request->descriptions[$i];
					$this->grid->create('rmis_grade_point_informations', $columns, $request, 'id');
					$i++;	
				}
			}
		}
		 
        $data['success'] ="Data created successfuly.";
        //echo json_encode($data , JSON_NUMERIC_CHECK); 
    }
    
    public function dataRead(){
        header('Content-Type: application/json');
        $request = json_decode(file_get_contents('php://input'));
        $data= $this->grid->read('rmis_gradings', array('rmis_gradings.id', 'rmis_gradings.id as grading_id', 'grading_title', 'effect_date'), $request);       
        echo json_encode($data, JSON_NUMERIC_CHECK);
    }
    public function dataDestroy(){   
        header('Content-Type: application/json');
        $request = json_decode(file_get_contents('php://input'));
        $data = $this->grid->destroy('rmis_gradings', $request->models, 'id'); 
		$data = $this->grid->destroy('rmis_grade_point_informations', $request->models, 'grading_id');
        echo json_encode($data , JSON_NUMERIC_CHECK); 
    }
    	
	public function dataUpdate($request){
        //header('Content-Type: application/json');
        //$request = json_decode(file_get_contents('php://input'));
        $request = json_decode($request);
		
        $this->form_validation->set_rules($this->grading->validation);
        $this->grading->isValidate((array) $request);
        if ($this->form_validation->run() === false) {
            header("HTTP/1.1 500 Internal Server Error");
            echo "Wrong data ! try again" ;
            exit;
        }
       
        $columns = array('id','grading_title', 'effect_date');
        $columns[] = 'modified_at';
        $request->modified_at = date('Y-m-d H:i:s');            
        $columns[] = 'modified_by';
        $request->modified_by = 1;
        
        $data= $this->grid->update('rmis_gradings', $columns, $request, 'id');
		
		$columns = array('lower_range', 'upper_range','letter_grade','grade_point','qualitative_status','description','grading_id');
		$request->grading_id = $request->id;
		$i=0;
		if(!empty($request->lower_ranges)>0){
			$this->grading->clean_gradePointInformation($request->grading_id);
			foreach($request->lower_ranges as $lower_range_key=>$lower_range_value){
				if($lower_range_value!=NULL){
					$request->lower_range = $lower_range_value;
					$request->upper_range = $request->upper_ranges[$i];
					$request->letter_grade = $request->letter_grades[$i];
					$request->grade_point = $request->grade_points[$i];
					$request->qualitative_status = $request->qualitative_statuses[$i];
					$request->description = $request->descriptions[$i];
					$this->grid->create('rmis_grade_point_informations', $columns, $request, 'id');
					$i++;	
				}
			}
		}

        $data['success'] ="Data updated successfuly.";
        //echo json_encode($data , JSON_NUMERIC_CHECK);  
    }

	public function deleteGradePoint(){
		$grade_point_id = $this->input->post('grade_point_id');
		$this->grading->deleteGradePointInformation($grade_point_id);
	}
	
                
} 
?>