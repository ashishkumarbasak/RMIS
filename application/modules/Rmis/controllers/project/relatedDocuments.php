<?php

class RelatedDocuments extends MX_Controller{
    private $_data;
    public function __construct(){
        parent::__construct();
        $this->load->model('Kendodatasource_model', 'grid');
        $this->load->model('Program_model', 'program');
		$this->load->model('Project_model', 'project');
		$this->load->model('Project_document_model', 'projectDocument');

        $this->template->set_partial('header', 'layouts/header')
						->set_layout('extensive/main_layout');
    }
    
    public function index($project_id=NULL){
        $this->template->title('Research Management(RM)', ' Project', ' Project Related Documents');
        
		if($project_id!=NULL){
			
			if($this->input->post('save_documentInformation')){
				$filename = $this->documentUpload($project_id);
				if($filename!=NULL){
					$request = $this->input->post();
					$request['document_name'] = $filename;	
					$request = json_encode($request);
					$this->dataCreate($request);
				}else{
					$this->template->set('file_upload_error', 'yes');
				}
				
				
			}
			
			$project_detail = $this->project->get_details($project_id);
			$this->template->set('project_detail', serialize($project_detail));
			
			$program_detail = $this->program->get_details($project_id);
			$this->template->set('program_detail', serialize($program_detail));
			
			$program_areas = $this->grid->read('rmis_program_areas', array('id','program_area_id', 'program_area_name'), $request); 
			$this->template->set('program_areas',$program_areas);
			
			$project_areas = $this->grid->read('rmis_project_areas', array('id','project_area_id', 'project_area_name'), $request); 
			$this->template->set('project_areas',$project_areas);
			
			$document_type = $this->grid->read('rmis_document_type', array('value', 'name', 'is_active'), $request); 
			$this->template->set('document_type',$document_type);
			
			$this->template->set('project_id',$project_id);
		}
        $_data['dashboard_menu_active'] = '';
        $_data['setup_menu_active'] = 'class="active"';
        $_data['setup_funds_menu_active'] ='class="active"';
        $_data['setup_training_project_type_menu_active'] ='';
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
        
		$create->url(site_url('Rmis/project/relatedDocuments/dataCreate'))
             ->contentType('application/json')
             ->type('POST');

        $read = new \Kendo\Data\DataSourceTransportRead();

        $read->url(site_url('Rmis/project/relatedDocuments/dataRead'))
             ->contentType('application/json')
             ->type('POST');

        $update = new \Kendo\Data\DataSourceTransportUpdate();

        $update->url(site_url('Rmis/project/relatedDocuments/dataUpdate'))
             ->contentType('application/json')
             ->type('POST');

        $destroy = new \Kendo\Data\DataSourceTransportDestroy();

        $destroy->url(site_url('Rmis/project/relatedDocuments/dataDestroy'))
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
					   
		$documentTitleField = new \Kendo\Data\DataSourceSchemaModelField('document_title');
        $documentTitleField->type('string');
                       //->editable(false)
                       //->nullable(true);
        
        $documentTypeField = new \Kendo\Data\DataSourceSchemaModelField('document_type');
        $documentTypeField->type('string')
                ->properties();

        $documentNameField = new \Kendo\Data\DataSourceSchemaModelField('document_name');
        $documentNameField->type('string');

		$model->id('id')
            ->addField($IDField)
            ->addField($documentTitleField)
            ->addField($documentTypeField)
			->addField($documentNameField);

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
        $ID->field('s_o') //->filterable($fundTypeFilterable)
                 ->title('ID');
				 
		$docTitle = new \Kendo\UI\GridColumn();
        $docTitle->field('document_title')
                 ->title('Document Title');
				 
		$docType = new \Kendo\UI\GridColumn();
        $docType->field('document_type')
                 ->title('File/Document Type');
				 
		$docName = new \Kendo\UI\GridColumn();
        $docName->field('document_name')
                 ->title('File/Document');
				 
		$command = new \Kendo\UI\GridColumn();
        $command->addCommandItem('destroy')
                ->title('&nbsp;')
                ->width(100);
				
		//$command2 = new \Kendo\UI\GridColumnCommandItem();
		//$command2->click('ClickEdit')
		//		 ->text('Edit');
		
		//$commandColumn = new \Kendo\UI\GridColumn();
		//$commandColumn->addCommandItem($command2)
        //->title('&nbsp;')
        //->width(80);
        
        $editable = new \Kendo\UI\GridEditable();
        $editable 	-> templateId("popup_editor")
                	->confirmation("Are you sure you want to delete this record?")
               	 	-> mode("inline");
        
        $sortable = new \Kendo\UI\GridSortable();
        $sortable->mode('single')
            ->allowUnsort(false);
        
        $grid->addColumn($ID, $docTitle, $docType, $docName, $command)
             ->dataSource($dataSource) 
			 //->addToolbarItem($btnAdd)
			 ->height(250)
             ->editable($editable)
             ->sortable($sortable)   
             ->pageable(true);
        
        $gridData =  $grid->render();
        $this->template->set('grid_data', $gridData);
		
		
		$this->template->set('content_header_icon', 'class="icofont-file"');
        $this->template->set('content_header_title', 'Project Information');
		
        $breadcrumb = '<ul class="breadcrumb">
						<li><a href="#"><i class="icofont-home"></i> RMIS</a> <span class="divider">&raquo;</span></li>
						<li><a href="#">Project info.</a><span class="divider">&raquo;</span></li><li class="active">Project Related Documents</li>
					  </ul>';
        $this->template->set('breadcrumb', $breadcrumb);		
        $this->template->set_partial('relatedDocumentForm','project/relatedDocuments/form');
		$this->template->set_partial('tab_menu','project/form_tabs');
        $this->template->set_partial('sidebar', 'layouts/sidebar',$_data)
               ->build('project/relatedDocuments/index');
    }
	
	public function dataCreate($request){
        $request = json_decode($request);
		$columns = array('document_title', 'document_type', 'sorting_order', 'document_name', 'project_id');
       	
		$columns[] = 'organization_id';
		$request->organization_id = $this->config->item('organization_id');		
		$columns[] = 'created_at';
        $request->created_at = date('Y-m-d H:i:s');            
        $columns[] = 'created_by';
        $request->created_by = $this->loginUser->id;
        
        $data= $this->grid->create('rmis_project_related_documents', $columns, $request, 'id'); 
        $data['success'] ="Data created successfuly.";
        //echo json_encode($data , JSON_NUMERIC_CHECK); 
    }
    
    public function dataRead(){
        header('Content-Type: application/json');
        $request = json_decode(file_get_contents('php://input'));
        $data= $this->grid->read_with_join_table('rmis_project_related_documents', array('rmis_project_related_documents.id','document_title', 'rmis_document_type.name as document_type','document_name','rmis_project_related_documents.id as s_o'), $request, 'rmis_document_type', 'rmis_project_related_documents.document_type = rmis_document_type.id');       
        echo json_encode($data, JSON_NUMERIC_CHECK);
    }
	
    public function dataDestroy($request=NULL){
		if($request!=NULL){
			 $request = json_decode($request);
			 $data = $this->grid->destroy('rmis_project_related_documents', $request, 'id');
		}else{   
        	header('Content-Type: application/json');
        	$request = json_decode(file_get_contents('php://input'));
			$data = $this->grid->destroy('rmis_project_related_documents', $request->models, 'id'); 
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
	
	public function documentUpload($project_id=NULL){
        if($project_id!=NULL && !empty($_FILES)){
        	$upload_path = './uploads/project/'.$project_id."/";
			if(!is_dir($upload_path)) mkdir($upload_path,0777,true);
			
			$files = $_FILES['files'];
			$file = $files['tmp_name'];
	        if (is_uploaded_file($file)) {
	        	move_uploaded_file($file, $upload_path . $files['name']);
	        }
			return $files['name'];
        }   
		else {
			return NULL;
		}
        // Save the uploaded files
    }
} 
?>