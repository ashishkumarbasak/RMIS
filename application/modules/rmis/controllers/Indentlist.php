<?php
class Indentlist extends MX_Controller {

    private $_data;

    public function __construct()
    {
        parent::__construct();
        $this->template->set_partial('header', 'layouts/header')
                ->set_partial('sidebar', 'layouts/sidebar')
                ->set_layout('extensive/main_layout');

        $this->load->model('Kendodatasource_model', 'kds');
        $this->load->model('Indentlist_model', 'dpm');
        $this->load->model('Indentlist_Details_Model', 'indentDetailModal');
    }

    public function index()
    {
        $this->template->title('IMIS', 'Indent Information');
        $this->template->set('indentList', 'class="active open"');

		$this->template->append_metadata('<link href="/assets/kendoui/css/web/kendo.common.min.css"  rel="stylesheet"/>');
        $this->template->append_metadata('<link href="/assets/kendoui/css/web/kendo.default.min.css"  rel="stylesheet"/>');
        $this->template->append_metadata('<script src="/assets/kendoui/js/kendo.all.min.js"></script>');
		$this->template->append_metadata('<script src="/assets/jqueryui/1.8/jquery-ui.min.js"></script>');
        $this->template->append_metadata('<script src="/assets/js/custom/rmis.js"></script>');
		$this->template->append_metadata('<script src="/assets/extensive/js/jquery.validate.min.js"></script>');
		$this->template->append_metadata('<script src="/assets/js/custom/rmis_setup.js"></script>');
        
		require_once APPPATH . 'third_party/kendoui/Autoload.php';

        $transport = new \Kendo\Data\DataSourceTransport();

        $read = new \Kendo\Data\DataSourceTransportRead();
        $read->url(site_url('rmis/Indentlist/read'))
                ->contentType('application/json')
                ->type('POST');

        $destroy = new \Kendo\Data\DataSourceTransportDestroy();
        $destroy->url(site_url('rmis/Indentlist/destroy'))
                ->contentType('application/json')
                ->type('POST');

        $transport->read($read)
                ->destroy($destroy)
                ->parameterMap('function(data) {
                      return kendo.stringify(data);
                  }');

        $model = new \Kendo\Data\DataSourceSchemaModel();

        $houseRentIDField = new \Kendo\Data\DataSourceSchemaModelField('id');
        $houseRentIDField->type('number')
                ->editable(false)
                ->nullable(true);
				
        $storeNames = new \Kendo\Data\DataSourceSchemaModelField('store_name');
        $storeNames->type('string')
                ->editable(false)
                ->nullable(true);

        $model->id('id')
                ->addField($houseRentIDField)
                ->addField($storeNames);

        $schema = new \Kendo\Data\DataSourceSchema();
        $schema->data('data')
                ->errors('errors')
                ->model($model)
                ->total('total');

        $dataSource = new \Kendo\Data\DataSource();

        $sortItem = new \Kendo\Data\DataSourceSortItem();
        $sortItem->dir('desc');
        $sortItem->field('store_name');

        $dataSource->transport($transport)
                ->batch(false)
                ->pageSize(20)
                ->error('onError')
                ->requestEnd('onRequestEnd')
                ->batch(false)
                ->serverSorting(true)
                ->serverPaging(true)
                ->serverFiltering(true)
               /* ->addSortItem($sortItem)*/
                ->schema($schema);

        $grid = new \Kendo\UI\Grid('grid');

        $storeName = new \Kendo\UI\GridColumn();
        $storeName->field('station_id')
                ->title('Station ID')
                ->sortable(true);

        $financialYear = new \Kendo\UI\GridColumn();
        $financialYear->field('station_name')
                ->title('Station Name')
                ->sortable(true);
				
        $indent_ref_no = new \Kendo\UI\GridColumn();
        $indent_ref_no->field('station_phone')
                ->title('Station Phone')
                ->sortable(true);
				
        $requestedBy = new \Kendo\UI\GridColumn();
        $requestedBy->field('station_email')
                ->title('Station Email')
                ->sortable(true);
        
        $status = new \Kendo\UI\GridColumn();
        $status->field('station_address')
                ->title('Station Address')
                ->sortable(true);

        $customCMD = new \Kendo\UI\GridColumnCommandItem();
        $customCMD->click('commandEdit')
                ->text('Edit');

        $cmd = new \Kendo\UI\GridColumnCommandItem();
        $cmd->click('commandClick')
                ->text('Approve');

        $command = new \Kendo\UI\GridColumn();
        $command->addCommandItem($customCMD)
                ->addCommandItem('destroy')
                ->addCommandItem($cmd)
                ->title('&nbsp;')
                ->width(245);

        $sortable = new \Kendo\UI\GridSortable();
        $sortable->mode('single')
                ->allowUnsort(false);

        $grid->addColumn($storeName, $financialYear, $indent_ref_no, $requestedBy,$status, $command)
                ->dataSource($dataSource)
                ->height(570)
                ->editable('inline')
                ->sortable($sortable)
                ->filterable(true)
                ->pageable(true)
                ->selectable('row')
                ->detailTemplateId('details');

        $gridData = $grid->render();
        $this->template->set('grid_data', $gridData);

        $window = new \Kendo\UI\Window('window');
        $window->title('Add Monthly Employee Earnings/Deduction')
                ->actions(array("Minimize", "Maximize", "Close"))
                ->modal(true)
                ->width(900)
                ->minHeight(0)
                ->visible(false)
                ->resizable(false)
                ->content(array("url" => "/rmis/Indentlist/addForm"));

        $window = $window->render();
        $this->template->set('window', $window);

        $pre_request = (object) null;
        $pre_request->sort = array(
            (object) array('field' => 'store_name', 'dir' => 'ASC'));
        $this->_data['storeName'] = $this->kds->read('imis_store_setup', array('id as value', 'store_name as text', 'store_name'), $pre_request);

        $pre_request = (object) null;
        $pre_request->sort = array(
            (object) array('field' => 'year_name', 'dir' => 'ASC'));
        $this->_data['financialYear'] = $this->kds->read('financial_year', array('id as value', 'year_name as text', 'year_name'), $pre_request);

        $pre_request = (object) null;
        $pre_request->sort = array(
            (object) array('field' => 'indent_ref_no', 'dir' => 'ASC'));
        $this->_data['indent_ref_no'] = $this->kds->read('imis_indent_information_setup', array('id as value', 'indent_ref_no as text', 'indent_ref_no'), $pre_request);


        $this->template->build('inventory/indentlist/indent_information', $this->_data);
    }

    public function addForm($id = NULL)
    {
        $this->_data['id'] = $id;
        $pre_request = (object) null;
        $pre_request->sort = array((object) array('field' => 'head_name', 'dir' => 'ASC'));
        $pre_request->filter = (object) array('field' => 'is_active', 'operator' => 'eq', 'value' => 1);
        $this->load->view('inventory/indentlist/add_view', $this->_data);
    }
    
    public function addIndentMaster($id =NULL)
    {
        if (!empty($id)) {
            $this->_data['indent_info'] = $this->dpm->getIndentInformationByID($id);
            $this->_data['detailsRS'] = $detailsRS = $this->indentDetailModal->get_many_by('indent_information_setup', $id);
            $this->_data['mode'] = 'EDIT';
        }

        require_once APPPATH . 'third_party/kendoui/Autoload.php';

        $pre_request = (object) null;
        $pre_request->sort = array(
            (object) array('field' => 'employee_name', 'dir' => 'ASC'));
        $this->_data['employees'] = $this->kds->read('hrm_employees', array('id as value', 'employee_name as text', 'employee_name'), $pre_request);

        $pre_request = (object) null;
        $pre_request->sort = array(
            (object) array('field' => 'store_name', 'dir' => 'ASC'));
        $this->_data['storeName'] = $this->kds->read('imis_store_setup', array('id as value', 'store_name as text', 'store_name'), $pre_request);

        $pre_request = (object) null;
        $pre_request->sort = array(
            (object) array('field' => 'year_name', 'dir' => 'ASC'));
        $this->_data['financialYear'] = $this->kds->read('financial_year', array('id as value', 'year_name as text', 'year_name'), $pre_request);

        $pre_request = (object) null;
        $pre_request->sort = array(
            (object) array('field' => 'program_area_name', 'dir' => 'ASC'));
        $this->_data['projectName'] = $this->kds->read('rmis_program_areas', array('id as value', 'program_area_id as text', 'program_area_name'), $pre_request);

        $pre_request = (object) null;
        $pre_request->sort = array(
            (object) array('field' => 'item_name', 'dir' => 'ASC'));
        $this->_data['itemName'] = $this->kds->read('imis_inventory_item_setup', array('id as value', 'item_name as text', 'item_name'), $pre_request);
        
        //require_once APPPATH . 'third_party/kendoui/Autoload.php';
        $emp_window = new \Kendo\UI\Window('emp_window');
        $emp_window->title('Employee List')
                ->modal(true)
                ->visible(false)
                ->resizable(false)
                ->width(900)
                ->content(array("url" => "/Searchemployee"));

        $window = $emp_window->render();
        $this->_data['emp_window'] = $window;
        
         $pre_request = (object) null;
        $pre_request->sort = array((object) array('field' => 'head_name', 'dir' => 'ASC'));
        $pre_request->filter = (object) array('field' => 'is_active', 'operator' => 'eq', 'value' => 1);
        $this->load->view('inventory/indentlist/indent_information_form', $this->_data);
    }
	
    public function addIndentItems($id =null)
    {
        require_once APPPATH . 'third_party/kendoui/Autoload.php';
        
        $transport = new \Kendo\Data\DataSourceTransport();

        $read = new \Kendo\Data\DataSourceTransportRead();
        $read->url(site_url('/rmis/Indentlist/detailsRead/'.$id))
                ->contentType('application/json')
                ->type('POST');

        $destroy = new \Kendo\Data\DataSourceTransportDestroy();
        $destroy->url(site_url('/rmis/Indentlist/destroyDetails'))
                ->contentType('application/json')
                ->type('POST');

        $transport->read($read)
                ->destroy($destroy)
                ->parameterMap('function(data) {
                      return kendo.stringify(data);
                  }');

        $model = new \Kendo\Data\DataSourceSchemaModel();
        $model->id('id');
        
        $schema = new \Kendo\Data\DataSourceSchema();
        $schema->data('data')
                ->errors('errors')
                ->model($model)
                ->total('total');

        $sortItem = new \Kendo\Data\DataSourceSortItem();
        $sortItem->dir('asc');
        $sortItem->field('itemName');

      $dataSource = new \Kendo\Data\DataSource();

        $dataSource->transport($transport)
                ->schema($schema)
                ->error('onError')
                ->requestEnd('onRequestEnd')
                ->pageSize($this->config->item('num_paging_row'))
                ->batch(false)
                ->serverSorting(true)
                ->serverFiltering(true)
                ->addSortItem($sortItem);
        
        $grid = new \Kendo\UI\Grid('externalResourceList');
        
        $id = new \Kendo\UI\GridColumn();
        $id->field('id')
                ->hidden(true);
        
        $name = new \Kendo\UI\GridColumn();
        $name->field('itemName')
                ->title('Item')
                ->sortable(true);

        $designation = new \Kendo\UI\GridColumn();
        $designation->field('description')
                ->title('Description')
                ->width(120);
        
        $organizationName = new \Kendo\UI\GridColumn();
        $organizationName->field('unitOfmesurement')
                ->title('Unit');
        
        $address = new \Kendo\UI\GridColumn();
        $address->field('quantity')
                ->title('Indent Quantity');
        
        $contactNo = new \Kendo\UI\GridColumn();
        $contactNo->field('unitPrice')
                ->title('Unit Price');
        
        $total = new \Kendo\UI\GridColumn();
        $total->field('totalprice')
                ->title('Total Price');
        

        $editCommand = new \Kendo\UI\GridColumnCommandItem();
        $editCommand->click('onIndentItemsEdit')
                ->text('Edit');
        

        
        $command = new \Kendo\UI\GridColumn();
        $command->addCommandItem($editCommand)
                ->addCommandItem('destroy')
                ->title('&nbsp;')
                ->width(180);
        
        $grid->addColumn($id, $name, $designation, $organizationName, $address, $contactNo, $total, $command)
                ->dataSource($dataSource)
                ->selectable('row')
                ->height(300)
                ->sortable(true)
                ->resizable(true)
                ->editable('popup')
                ->filterable(false)
                ->pageable(true);

        $gridData = $grid->render();
        
        $this->_data['external_resource_data'] = $gridData;
        
         $pre_request = (object) null;
        $pre_request->sort = array((object) array('field' => 'head_name', 'dir' => 'ASC'));
        $pre_request->filter = (object) array('field' => 'is_active', 'operator' => 'eq', 'value' => 1);
        $this->load->view('inventory/indentlist/indent_information_form_item', $this->_data);
    }
	
    public function addItemToIndent($id =null, $detailId = null)
    {
        if (!empty($id)){
            $this->_data['indent_info'] = $this->dpm->getIndentInformationByID($id);
            $this->_data['detailsRS']  = $this->indentDetailModal->getItemDetail($detailId);
         
            $this->_data['mode'] = 'EDIT';
        }

        require_once APPPATH . 'third_party/kendoui/Autoload.php';

        $pre_request = (object) null;
        $pre_request->sort = array(
            (object) array('field' => 'group_name', 'dir' => 'ASC'));
        $this->_data['grooups'] = $this->kds->read('imis_group_setup', array('id as value', 'group_name as text', 'group_name'), $pre_request);

        $pre_request = (object) null;
        $pre_request->sort = array(
            (object) array('field' => 'sub_group_name', 'dir' => 'ASC'));
        $this->_data['subGrooups'] = $this->kds->read('imis_sub_group_setup', array('id as value', 'sub_group_name as text', 'sub_group_name'), $pre_request);

        $pre_request = (object) null;
        $pre_request->sort = array(
            (object) array('field' => 'item_name', 'dir' => 'ASC'));
        $this->_data['itemName'] = $this->kds->read('imis_inventory_item_setup', array('id as value', 'item_name as text', 'item_name'), $pre_request);

        $pre_request = (object) null;
        $pre_request->sort = array(
            (object) array('field' => 'category_name', 'dir' => 'ASC'));
        $this->_data['categorys'] = $this->kds->read('imis_category_setup', array('id as value', 'category_name as text', 'category_name'), $pre_request);
        

        $this->_data['masterId'] = $id;
        $pre_request = (object) null;
        $pre_request->sort = array((object) array('field' => 'head_name', 'dir' => 'ASC'));
        $pre_request->filter = (object) array('field' => 'is_active', 'operator' => 'eq', 'value' => 1);
        $this->load->view('inventory/indentlist/indent_information_form_item_add', $this->_data);
    }
    
    
    public function detailsRead($id) 
    {
        
        header('Content-Type: application/json');
        $request = json_decode(file_get_contents('php://input'));
        
        $request->filter = (object) array('field' => 'indentDetails.indent_information_setup', 'operator' => 'eq', 'value' => $id);
        $table = 'imis_indent_information_setup_details AS indentDetails
                        INNER JOIN imis_inventory_item_setup AS item ON indentDetails.name_of_item = item.id
                        INNER JOIN imis_group_setup AS grouptable ON item.group_id = grouptable.id
                        INNER JOIN imis_category_setup AS categoryTable ON item.category_id = categoryTable.id
                        INNER JOIN imis_sub_group_setup AS subGroupTable ON item.sub_group_id = subGroupTable.id
                        INNER JOIN imis_unit_of_measurement ON item.unit_of_measurement = imis_unit_of_measurement.id';

        $properties = array(
           'item.item_name AS itemName',
                    'indentDetails.descriptio_of_item AS description',
                    'indentDetails.indent_quantity AS quantity',
                    'indentDetails.unit_price AS unitPrice',
                    'subGroupTable.id AS subGroupId',
                    'grouptable.id AS groupId',
                    'categoryTable.id AS categoryId',
                    '(indentDetails.unit_price * indentDetails.indent_quantity) AS totalprice',
                    'imis_unit_of_measurement.value AS unit',
                    'item.id AS itemId',
                    'imis_unit_of_measurement.name AS unitOfmesurement',
                    'indentDetails.indent_information_setup AS indent_information_setup',
                    'indentDetails.id AS id');


        $data = $this->kds->read($table, $properties, $request);
        echo json_encode($data, JSON_NUMERIC_CHECK);
    }

    public function addFormForApprove($id = NULL)
    {
        if (!empty($id))
        {
            $this->_data['indent_info'] = $this->dpm->getIndentInformationByID($id);
            $this->_data['detailsRS'] = $detailsRS = $this->indentDetailModal->get_many_by('indent_information_setup', $id);
            $this->_data['mode'] = 'EDIT';
        }

        require_once APPPATH . 'third_party/kendoui/Autoload.php';

        $pre_request = (object) null;
        $pre_request->sort = array(
            (object) array('field' => 'employee_name', 'dir' => 'ASC'));
        $this->_data['employees'] = $this->kds->read('hrm_employees', array('id as value', 'employee_name as text', 'employee_name'), $pre_request);

        $pre_request = (object) null;
        $pre_request->sort = array(
            (object) array('field' => 'store_name', 'dir' => 'ASC'));
        $this->_data['storeName'] = $this->kds->read('imis_store_setup', array('id as value', 'store_name as text', 'store_name'), $pre_request);

        $pre_request = (object) null;
        $pre_request->sort = array(
            (object) array('field' => 'year_name', 'dir' => 'ASC'));
        $this->_data['financialYear'] = $this->kds->read('financial_year', array('id as value', 'year_name as text', 'year_name'), $pre_request);

        $pre_request = (object) null;
        $pre_request->sort = array(
            (object) array('field' => 'project_name', 'dir' => 'ASC'));
        $this->_data['projectName'] = $this->kds->read('imis_project_setup', array('id as value', 'project_name as text', 'project_name'), $pre_request);

        $pre_request = (object) null;
        $pre_request->sort = array(
            (object) array('field' => 'item_name', 'dir' => 'ASC'));
        $this->_data['itemName'] = $this->kds->read('imis_inventory_item_setup', array('id as value', 'item_name as text', 'item_name'), $pre_request);

        $pre_request = (object) null;
        $pre_request->sort = array((object) array('field' => 'head_name', 'dir' => 'ASC'));
        $pre_request->filter = (object) array('field' => 'is_active', 'operator' => 'eq', 'value' => 1);
        $this->load->view('inventory/indentapprovelist/indent_information_form_approve', $this->_data);
    }

    public function read()
    {
       header('Content-Type: application/json');
        $request = json_decode(file_get_contents('php://input'));
        $data= $this->kds->read('rmis_regional_stations', array('rmis_regional_stations.id','station_id', 'station_name','station_phone','station_email', 'station_address'), $request);       
        echo json_encode($data, JSON_NUMERIC_CHECK);
		
	    /*header('Content-Type: application/json');
        $request = json_decode(file_get_contents('php://input'));

        //$request->filter = (object) array('field' => 'id', 'operator' => 'eq', 'value' => 1);

        $table = 'imis_indent_information_setup AS indentMaster
                        INNER JOIN imis_store_setup AS store ON indentMaster.name_of_store = store.id
                        LEFT JOIN imis_project_setup AS projecct ON indentMaster.project_name = projecct.id
                        LEFT JOIN financial_year AS financialYear ON indentMaster.financial_year = financialYear.id
                        INNER JOIN hrm_employees AS employee ON indentMaster.indent_request_by = employee.id
                        WHERE 1= 1';

        $properties = array('indentMaster.id as id',
            'store.store_name AS store_name',
            'financialYear.year_name AS year_name',
            'employee.employee_name AS employee_name',
            'indentMaster.indent_ref_no AS indent_ref_no',
            'indentMaster.status as status');

        $data = $this->kds->read($table, $properties, $request);
        echo json_encode($data, JSON_NUMERIC_CHECK);*/
    }

    public function destroy()
    {
        header('Content-Type: application/json');
        $request = json_decode(file_get_contents('php://input'));
        if($request->status  == 'to_be_approved'){
        $data = $this->kds->destroy('imis_indent_information_setup', $request, 'id');
        $this->db->delete('imis_indent_information_setup_details', array('indent_information_setup' => $request->id));
        echo json_encode($data, JSON_NUMERIC_CHECK);
        }else
        {
            echo "You can not delete this data";
        }
    }

    public function update()
    {
        $id = (int) $this->input->post('id');
        if (empty($id))
        {
            $this->create();
            return;
        }

        $this->form_validation->set_rules($this->dpm->validation);
        $this->dpm->isValidate($_POST);
        if ($this->form_validation->run() == true)
        {

            $data = array(
                'organization_id' => $this->config->item('organization_id'),
                'name_of_store' => $this->input->post('store_name'),
                'financial_year' => $this->input->post('financial_year'),
                'indent_ref_no' => $this->input->post('indent_ref_no'),
                'project_name' => $this->input->post('project_name'),
                'indent_to' => $this->input->post('indent_to'),
                'date_of_indent' => kd_date($this->input->post('date_of_indent'), 'd-m-Y'),
                'indent_request_by' => $this->input->post('requested_by'),
                'remarks' => $this->input->post('remarks'),
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => $this->loginUser->id
            );

            $this->db->trans_begin();
            $stat = $this->db->update('imis_indent_information_setup', $data, "id = $id");

            if ($this->db->trans_status() === FALSE)
            {
                $this->db->trans_rollback();
            } 
			else{
                $this->db->trans_commit();
            }

            $returnval = 1;
            if ($this->input->post('btnId') == 'btnSaveMore'){
                $returnval = 1;
            } 
			elseif ($this->input->post('btnId') == 'btnSave'){
                $returnval = 2;
            }
            echo $returnval;
        }
		else{
            echo showValidationError($this->form_validation->error_array());
        }
    }

    public function create()
    {
        $this->form_validation->set_rules($this->dpm->validation);
        $this->dpm->isValidate($_POST);
        if ($this->form_validation->run() == true){
            $data = array(
                'organization_id' => 1,
                'name_of_store' => $this->input->post('store_name'),
                'financial_year' => $this->input->post('financial_year'),
                'indent_ref_no' => '34534',
                'project_name' => $this->input->post('project_name'),
                'indent_to' => $this->input->post('indent_to'),
				'date_of_indent' => $this->input->post('date_of_indent'),
                'indent_request_by' => $this->input->post('requested_by'),
                'remarks' => $this->input->post('remarks'),
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
            );
			/*'created_by' => $this->loginUser->id,*/
			/*'organization_id' => $this->config->item('organization_id'),*/
			/*'date_of_indent' => kd_date($this->input->post('date_of_indent'), 'd-m-Y'),*/

            $this->db->trans_begin();
            $this->db->insert('imis_indent_information_setup', $data);

            if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
            } 
			else{
                $this->db->trans_commit();
            }

            $returnval = 1;
            if ($this->input->post('btnId') == 'btnSaveMore'){
                $returnval = 1;
            } 
			elseif ($this->input->post('btnId') == 'btnSave'){
                $returnval = 2;
            }
            echo $returnval;
        } 
		else {
            //echo showValidationError($this->form_validation->error_array());
        }
    }

    public function createDetails()
    {
        $this->form_validation->set_rules($this->indentDetailModal->validation);
        $this->indentDetailModal->isValidate($_POST);
        if ($this->form_validation->run() == true){
            $this->indentDetailModal->insert(array(
                'organization_id' => $this->config->item('organization_id'),
                'indent_information_setup' => $this->input->post('indent_information_setup'),
                'name_of_item' => $this->input->post('name_of_item'),
                'descriptio_of_item' => $this->input->post('descriptio_of_item'),
                'indent_quantity' => $this->input->post('indent_quantity'),
                'unit_price' => $this->input->post('unit_price'),
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => $this->loginUser->id,
            ));

            $returnval = 1;
            if ($this->input->post('btnExternalResourceId') == 'btnExternalResourceSave'){
                $returnval = 1;
            } 
			elseif ($this->input->post('btnExternalResourceId') == 'btnExternalResourceUpdate'){
                $returnval = 2;
            }
            echo $returnval;
        } 
		else{
            echo showValidationError($this->form_validation->error_array());
        }
    }

    public function updateForApprove()
    {
        $id = (int) $this->input->post('id');
        if (empty($id)){
            $this->create();
            return;
        }

        $this->form_validation->set_rules('finalStatus', 'Approved Status', 'trim|required|xss_clean');
        $this->form_validation->set_rules('approve_date', 'Approved Date', 'trim|required|xss_clean');
        $this->form_validation->set_rules('approvedByd', 'Approved By', 'trim|required|xss_clean');
        $this->form_validation->set_rules('finalremarks', 'Approve Remarks', 'max_length[1000]');
        $this->form_validation->set_rules('approve_quantity[]', 'Approve Quantity', 'required|min_length[1]|max_length[8]');
        //$this->dpm->isValidate($_POST);
        if ($this->form_validation->run() == true)
        {
            $data = array(
                'final_status' => $this->input->post('finalStatus'),
                'approve_by' => $this->input->post('approvedByd'),
                'final_remarks' => $this->input->post('finalremarks'),
                'approve_date' => kd_date($this->input->post('approve_date'), 'd-m-Y'),
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => $this->loginUser->id
            );

            $this->db->trans_begin();
            $stat = $this->db->update('imis_indent_information_setup', $data, "id = $id");
            if ($id){
                $this->saveIndentInformationApproveDetails($id);
            }

            if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
            } 
			else{
                $this->db->trans_commit();
            }

            $returnval = 1;
            if ($this->input->post('btnId') == 'btnSaveMore'){
                $returnval = 1;
            } 
			elseif ($this->input->post('btnId') == 'btnSave'){
                $returnval = 2;
            }
            echo $returnval;
        } 
		else{
            echo showValidationError($this->form_validation->error_array());
        }
    }

    public function saveIndentInformationApproveDetails($id)
    {
        $approve_quantity = $this->input->post('approve_quantity', true);
        $detailid = $this->input->post('detail_id', true);
        foreach ($approve_quantity as $key => $value)
        {
            $data = array(
                'approve_quantity' => $value,
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => $this->loginUser->id,
            );

            $this->db->where('id', $detailid[$key]);
            $this->db->update('imis_indent_information_setup_details', $data);
            //$this->db->insert('imis_indent_information_setup_details', $data);
        }
    }

    public function readDetails()
    {
        header('Content-Type: application/json');
        $request = json_decode(file_get_contents('php://input'));
        // $request->filter = (object) array('field' => 'is_active', 'operator' => 'eq', 'value' => 1);
        $data = $this->kds->read('imis_indent_information_setup_details', array('id', 'name_of_item',
            'descriptio_of_item',
            'indent_quantity',
            'UOM',
            'unit_price',
            'indent_information_setup'), $request);
        echo json_encode($data);
    }

    public function updateDetails()
    {
        $id = (int) $this->input->post('id');
        if (empty($id)){
            $this->createDetails();
            return;
        }

        $this->form_validation->set_rules($this->indentDetailModal->validation);
        $this->indentDetailModal->isValidate($_POST);
        if ($this->form_validation->run() == true){
            $data = array(
                'organization_id' => $this->config->item('organization_id'),
                'indent_information_setup' => $this->input->post('indent_information_setup'),
                'name_of_item' => $this->input->post('name_of_item'),
                'descriptio_of_item' => $this->input->post('descriptio_of_item'),
                'indent_quantity' => $this->input->post('indent_quantity'),
                'unit_price' => $this->input->post('unit_price'),
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => $this->loginUser->id
            );

            $this->db->trans_begin();
            $stat = $this->db->update('imis_indent_information_setup_details', $data, "id = $id");
            if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
            } 
			else{
                $this->db->trans_commit();
            }
            $returnval = 1;
            if ($this->input->post('btnId') == 'btnSaveMore'){
                $returnval = 1;
            }
			elseif ($this->input->post('btnId') == 'btnSave'){
                $returnval = 2;
            }
            echo $returnval;
        } 
		else{
            echo showValidationError($this->form_validation->error_array());
        }
    }

    public function destroyDetails()
    {
        header('Content-Type: application/json');
        $request = json_decode(file_get_contents('php://input'));
        $data = $this->kds->destroy('imis_indent_information_setup_details', $request, 'id');
        echo json_encode($data, JSON_NUMERIC_CHECK);
    }
}

