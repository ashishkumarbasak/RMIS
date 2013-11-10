<?php

class programCommittees extends MX_Controller{
    private $_data;
    public function __construct(){
        parent::__construct();
        $this->load->model('Kendodatasource_model', 'grid');
        $this->load->model('program_me_committee_model', 'ProgramCommitte');
		$this->load->model('Employee_model', 'employee');

        $this->template->set_partial('header', 'layouts/header')
						->set_layout('extensive/main_layout');
    }
    
    public function index($committee_id=NULL){
        $this->template->title('Research Management(RM)', ' Setup Info.', ' Program M&E Committee Information');
        
		if($this->input->post('save_program_committee')){
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

        $create->url(site_url('rmis/setup/programCommittees/dataCreate'))
             ->contentType('application/json')
             ->type('POST');

        $read = new \Kendo\Data\DataSourceTransportRead();

        $read->url(site_url('rmis/setup/programCommittees/dataRead'))
             ->contentType('application/json')
             ->type('POST');

        $update = new \Kendo\Data\DataSourceTransportUpdate();

        $update->url(site_url('rmis/setup/programCommittees/dataUpdate'))
             ->contentType('application/json')
             ->type('POST');

        $destroy = new \Kendo\Data\DataSourceTransportDestroy();

        $destroy->url(site_url('rmis/setup/programCommittees/dataDestroy'))
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

        $committeeChairmanField = new \Kendo\Data\DataSourceSchemaModelField('committee_chairman');
        $committeeChairmanField->type('string')
                				->properties();

        $committeeFormationdateField = new \Kendo\Data\DataSourceSchemaModelField('committee_formation_date');
        $committeeFormationdateField->type('string');

		$model->id('id')
              ->addField($committeeChairmanField)
              ->addField($committeeFormationdateField);

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
				 
		$committeeChairmanName = new \Kendo\UI\GridColumn();
        $committeeChairmanName->field('committee_chairman')
                 ->title('Chairman of the Committee');
				 
		$committeeFormationDate = new \Kendo\UI\GridColumn();
        $committeeFormationDate->field('committee_formation_date')
                 ->title('Formation Date');
		
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
        
        $grid->addColumn($committeeChairmanName, $committeeFormationDate, $commandColumn, $command)
             ->dataSource($dataSource) 
			 //->addToolbarItem($btnAdd)
			 ->height(450)
             ->editable($editable)
             ->sortable($sortable)   
             ->pageable(true);
        
        $gridData =  $grid->render();
        $this->template->set('grid_data', $gridData);
		
		if($committee_id!=NULL){
			if($this->input->post('save_update')){
				$request = json_encode($this->input->post());
				$this->dataUpdate($request);
			}
			
			if($this->input->post('delete_committee')){
				$request = json_encode($this->input->post());
				$this->dataDestroy($request);
			}
			
			$committee_detail = $this->ProgramCommitte->get_details($committee_id);
			$this->template->set('committee_detail', serialize($committee_detail));
			
			$committee_members = $this->ProgramCommitte->get_members($committee_id);
			$this->template->set('committee_members', serialize($committee_members));
		}
		
		
        $this->template->set('content_header_icon', 'class="icofont-file"');
        $this->template->set('content_header_title', 'Program M&E Committee Information');
        $this->template->set('employees',$this->employee->get_employees());
		
        $breadcrumb = '<ul class="breadcrumb">
						<li><a href="#"><i class="icofont-home"></i> RMIS</a> <span class="divider">&raquo;</span></li>
						<li><a href="#">Setup info.</a><span class="divider">&raquo;</span></li><li class="active">Program M&E Committee Information</li>
					  </ul>';
        $this->template->set('breadcrumb', $breadcrumb);		
        $this->template->set_partial('progCommInfoForm','setup/program_committee/form');
        $this->template->set_partial('sidebar', 'layouts/sidebar',$_data)
               ->build('setup/program_committee/index');
    }
	
	public function dataCreate($request){
        $request = json_decode($request);		
        $this->form_validation->set_rules($this->ProgramCommitte->validation);
        $this->ProgramCommitte->isValidate((array) $request);
        if ($this->form_validation->run() === false) {
            header("HTTP/1.1 500 Internal Server Error");
            echo "Wrong data ! try again" ;
            exit;
        }
       
        $columns = array('committee_chairman', 'committee_formation_date');
        $columns[] = 'organization_id';
		$request->organization_id = 1;
		$columns[] = 'created_at';
        $request->created_at = date('Y-m-d H:i:s');            
        $columns[] = 'created_by';
        $request->created_by = 1;
        
		$data = $this->grid->create('rmis_program_me_committees', $columns, $request, 'id'); 
        
		$columns = array('committee_id', 'member_id','designation','role_in_committee');
		$request->committee_id = $request->id;
		$i=0;
		if(!empty($request->committe_member_names)>0){
			foreach($request->committe_member_names as $committee_member_key=>$committee_member_name){
				if($committee_member_name!=NULL){
					$request->member_id = $committee_member_name;
					$request->designation = $request->committe_member_designations[$i];
					$request->role_in_committee = $request->committe_member_roles[$i];	
					$this->grid->create('rmis_program_me_committee_members', $columns, $request, 'id');
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
        $data= $this->grid->read_with_join_table('rmis_program_me_committees', array('rmis_program_me_committees.id','rmis_program_me_committees.id as committee_id','hrm_employees.employee_name as committee_chairman','committee_formation_date'), $request, 'hrm_employees', 'rmis_program_me_committees.committee_chairman = hrm_employees.employee_id');       
        echo json_encode($data, JSON_NUMERIC_CHECK);
    }
    public function dataDestroy($request=NULL){  
		if($request!=NULL){
			 $request = json_decode($request);
			 $data = $this->grid->destroy('rmis_program_me_committees', $request, 'id'); 
			 $data = $this->grid->destroy('rmis_program_me_committee_members', $request, 'committee_id');
		}
		else{  
			header('Content-Type: application/json');
			$request = json_decode(file_get_contents('php://input'));
			$data = $this->grid->destroy('rmis_program_me_committees', $request->models, 'id'); 
			$data = $this->grid->destroy('rmis_program_me_committee_members', $request->models, 'committee_id'); 
			echo json_encode($data , JSON_NUMERIC_CHECK); 
		}
    }
    	
	public function dataUpdate($request){
        $request = json_decode($request);
        $this->form_validation->set_rules($this->ProgramCommitte->validation);
        $this->ProgramCommitte->isValidate((array) $request);
        if ($this->form_validation->run() === false) {
            header("HTTP/1.1 500 Internal Server Error");
            echo "Wrong data ! try again" ;
            exit;
        }
        
		$columns = array('id', 'committee_chairman', 'committee_formation_date');
       	$columns[] = 'organization_id';
		$request->organization_id = 1;
		$columns[] = 'updated_at';        
        $request->updated_by = date('Y-m-d H:i:s');            
        $columns[] = 'updated_by';
        $request->updated_by = 1;
        
		$data = $this->grid->update('rmis_program_me_committees', $columns, $request, 'id'); 
        
		$columns = array('committee_id', 'member_id','designation','role_in_committee');
		$request->committee_id = $request->id;
		$i=0;
		if(!empty($request->committe_member_names)>0){
			$this->ProgramCommitte->clean_committeeMembers($request->committee_id);

			foreach($request->committe_member_names as $committee_member_key=>$committee_member_name){
				if($committee_member_name!=NULL){
					$request->member_id = $committee_member_name;
					$request->designation = $request->committe_member_designations[$i];
					$request->role_in_committee = $request->committe_member_roles[$i];	
					$this->grid->create('rmis_program_me_committee_members', $columns, $request, 'id');
					$i++;	
				}
			}
		}
        
        $data['success'] ="Data updated successfuly.";
        //echo json_encode($data , JSON_NUMERIC_CHECK);  
    }

	public function deleteMember(){
		$committee_id = $this->input->post('committee_id');
		$member_id = $this->input->post('member_id');
		$this->ProgramCommitte->deleteMember($committee_id,$member_id);
	}
                
} 
?>