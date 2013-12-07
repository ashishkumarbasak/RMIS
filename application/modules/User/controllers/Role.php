<?php

class Role extends MX_Controller
{

    private $_data;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kendodatasource_model', 'kds');
        $this->load->model('RoleModel', 'role');

        $this->template->set_partial('header', 'layouts/header')
                ->set_layout('controlpanel/master_layout');

        //$this->output->enable_profiler(TRUE);
    }

    public function index()
    {
        $this->template->title('Manage Role & Permission');

        $this->template->append_metadata('<link href="/assets/kendoui/css/web/kendo.common.min.css"  rel="stylesheet"/>');
        $this->template->append_metadata('<link href="/assets/kendoui/css/web/kendo.default.min.css"  rel="stylesheet"/>');
        $this->template->append_metadata('<script src="/assets/kendoui/js/kendo.all.min.js"></script>');
        $this->template->append_metadata('<script src="/assets/js/custom/sacs.js"></script>');

        require_once APPPATH . 'third_party/kendoui/Autoload.php';

        $transport = new \Kendo\Data\DataSourceTransport();

        $create = new \Kendo\Data\DataSourceTransportCreate();
        $create->url(site_url('User/Role/create'))
                ->contentType('application/json')
                ->type('POST');

        $read = new \Kendo\Data\DataSourceTransportRead();
        $read->url(site_url('User/Role/read'))
                ->contentType('application/json')
                ->type('POST');

        $update = new \Kendo\Data\DataSourceTransportUpdate();
        $update->url(site_url('User/Role/update'))
                ->contentType('application/json')
                ->type('POST');

        $destroy = new \Kendo\Data\DataSourceTransportDestroy();
        $destroy->url(site_url('User/Role/destroy'))
                ->contentType('application/json')
                ->type('POST');

        $transport->create($create)
                ->read($read)
                ->update($update)
                ->destroy($destroy)
                ->parameterMap('function(data) {
                      return kendo.stringify(data);
                  }');

        // input form       
        $model = new \Kendo\Data\DataSourceSchemaModel();

        // for input (add/edit)
        $idField = new \Kendo\Data\DataSourceSchemaModelField('id');
        $idField->type('number')
                ->editable(false)
                ->nullable(true);

        $nameField = new \Kendo\Data\DataSourceSchemaModelField('name');
        $nameField->type('string')
                ->validation(array('required' => true));

        $descField = new \Kendo\Data\DataSourceSchemaModelField('description');
        $descField->type('string');

        $model->id('id')
                ->addField($nameField)
                ->addField($descField);

        $schema = new \Kendo\Data\DataSourceSchema();
        $schema->data('data')
                ->errors('errors')
                ->model($model)
                ->total('total');

        $dataSource = new \Kendo\Data\DataSource();
        $dataSource->transport($transport)
                ->schema($schema)
                ->error('onError')
                ->requestEnd('onRequestEnd')
                ->batch(false)
                ->serverSorting(true);

        // populate grid obj
        $grid = new \Kendo\UI\Grid('grid');
        // columns
        $nameCol = new \Kendo\UI\GridColumn();
        $nameCol->field('name')
                ->width(300)
                ->title('Role *');

        $descCol = new \Kendo\UI\GridColumn();
        $descCol->field('description')
                ->title('Description')
                ->filterable(false)
                ->sortable(false);

        $cmd = new \Kendo\UI\GridColumnCommandItem();
        $cmd->click('commandClick')
                ->text('Permission');

        $command = new \Kendo\UI\GridColumn();
        $command->addCommandItem('edit')
                ->addCommandItem('destroy')
                ->addCommandItem($cmd)
                ->title('&nbsp;')
                ->width(250);


        $btnAdd = new \Kendo\UI\GridToolbarItem('create');
        $btnAdd->text("Add New Role");

        $grid->addColumn($nameCol, $descCol, $command)
                ->dataSource($dataSource)
                ->addToolbarItem($btnAdd)
                ->height(570)
                ->sortable(true)
                ->filterable(true)
                ->editable('inline');

        $gridData = $grid->render();
       
        $this->template->set('grid_data', $gridData);
        $this->template->build('role/role');
    }

    public function read()
    {
        header('Content-Type: application/json');
        $request = json_decode(file_get_contents('php://input'));
        // default sorting
        if (!isset($request->sort)) {
            $request->sort = array(
                (object) array('field' => 'name', 'dir' => 'ASC'));
        }
        $data = $this->kds->read('groups', array('id', 'name', 'description'), $request);
        echo json_encode($data, JSON_NUMERIC_CHECK);
    }

    public function destroy()
    {
        header('Content-Type: application/json');
        $request = json_decode(file_get_contents('php://input'));
        $data = $this->kds->destroy('groups', $request, 'id');
        echo json_encode($data, JSON_NUMERIC_CHECK);
    }

    public function update()
    {
        header('Content-Type: application/json');
        $request = json_decode(file_get_contents('php://input'));

        $this->form_validation->set_rules($this->role->validation);
        $this->role->isValidate((array) $request);
        if ($this->form_validation->run() == true) {
            //$data['msg'] = "Validate";
            $columns = array('id', 'name', 'description');
            // custom fields
            $columns[] = 'organization_id';
            $request->organization_id = $this->config->item('organization_id');
            $columns[] = 'updated_at';
            $request->updated_at = date('Y-m-d H:i:s');
            $columns[] = 'updated_by';
            $request->updated_by = $this->loginUser->id;

            $data = $this->kds->update('groups', $columns, $request, 'id');
            echo json_encode($data, JSON_NUMERIC_CHECK);
        }
        else {
            echo $this->config->item('msg_invalid_input');
        }
    }

    public function create()
    {
        header('Content-Type: application/json');
        $request = json_decode(file_get_contents('php://input'));

        $this->form_validation->set_rules($this->role->validation);
        $this->role->isValidate((array) $request);
        if ($this->form_validation->run() == true) {
            $columns = array('id', 'name', 'description');
            // custom fields
            $columns[] = 'organization_id';
            $request->organization_id = $this->config->item('organization_id');
            $columns[] = 'created_at';
            $request->created_at = date('Y-m-d H:i:s');
            $columns[] = 'created_by';
            $request->created_by = $this->loginUser->id;

            $data = $this->kds->create('groups', $columns, $request, 'id');
            echo json_encode($data, JSON_NUMERIC_CHECK);
        }
        else {
            echo $this->config->item('msg_invalid_input');
        }
    }

    public function permission($roleID)
    {
        $modules = $this->role->getPermissionModule();
        $this->template->set('modules', $modules);
        $this->template->set('roleID', (int)$roleID);
        $group = Sentry::getGroupProvider()->findById((int)$roleID);
        $this->template->set('roleName', $group->getName());
        
        $appliedPermission = $group->getPermissions();        
        $this->template->set('appliedPermission', array_keys($appliedPermission));
                
        $this->template->build('role/permission');
    }

    public function getAllPermissionOptions($module)
    {
        return $this->role->getAllPermissionOptions($module);
    }

    public function savepermission()
    {
        $chkPermission = $this->input->post('chkPermission', true);
        if (!is_array($chkPermission)) {
            redirect('User/rRole');
        }

        $permissions = array();
        foreach ($chkPermission as $key => $value) {
            $permissions[$value] = 1;
        }

        try {
            // empty previous permissions
            $id = $this->input->post('roleID', true);
            $this->db->update('groups', array('permissions' => ''), "id = $id");
            // Find the group using the group id
            $group = Sentry::getGroupProvider()->findById($id);

            // Update the group details          
            $group->permissions = $permissions;

            // Update the group
            if ($group->save()) {
                //echo 'Group information was updated';
                $this->messages->add($this->config->item('msg_save'), "success");
            }
            else {
                //echo 'Group information was not updated';
                $this->messages->add($this->config->item('msg_not_save'), "error");
            }
        }
        catch (Cartalyst\Sentry\Groups\GroupExistsException $e) {
            //echo 'Group already exists.';
            $this->messages->add('Role already exists.', "message");
        }
        catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e) {
            //echo 'Group was not found.';
            $this->messages->add('Role was not found.', "message");
        }

        redirect("User/Role/permission/$id");
    }

}