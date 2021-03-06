<?php
class ProjectDetailsReport extends MX_Controller
{
    private $_data;

    public function __construct()
    {
        parent::__construct();
		$this->load->model('general_model', 'general_model');
		$this->load->model('Kendodatasource_model', 'grid');
		$this->load->model('Program_model', 'program');
		
        $this->template->set_partial('header', 'layouts/header')
                ->set_partial('sidebar', 'layouts/sidebar')
                ->set_layout('extensive/main_layout');
    }

    public function index()
    {
        $this->template->title('Rmis', 'Reports', 'Division Wise Projects and Experiments List');
        $this->template->set('dap_menu', 'class="active open"');

        $this->template->append_metadata('<link href="/assets/kendoui/css/web/kendo.common.min.css"  rel="stylesheet"/>');
        $this->template->append_metadata('<link href="/assets/kendoui/css/web/kendo.default.min.css"  rel="stylesheet"/>');
        $this->template->append_metadata('<script src="/assets/kendoui/js/kendo.all.min.js"></script>');
		$this->template->append_metadata('<script src="/assets/jqueryui/1.8/jquery-ui.min.js"></script>');
        $this->template->append_metadata('<script src="/assets/js/custom/rmis.js"></script>');
		$this->template->append_metadata('<script src="/assets/extensive/js/jquery.validate.min.js"></script>');
		$this->template->append_metadata('<script src="/assets/js/custom/rmis_setup.js"></script>');
                
        require_once APPPATH.'third_party/kendoui/Autoload.php';
		
		$institues = $this->grid->read('hrm_organizations', array('id', 'short_name', 'organization_name'), $request);
		$this->template->set('institues',$institues);
		
		$fundSources = $this->grid->read('rmis_funding_source', array('value','name', 'is_active'), $request);
		$this->template->set('fundSources', $fundSources);

        $this->template->build('reports/project_details_report');
    }

    public function getReport($mode = 'preview')
    {
       
         require_once($this->config->item('java_bridge_path'));
        $modulePath = '/reports/rmis/';
        $orgParam = array(
            'pOrgName' => $orgInfo['organization_name'],
            'pOrgAddress' => $orgInfo['address'],
            'pLogoURL' => site_url($orgInfo['file_path']),
            'pTitle' => "List Of Asset"
        );
		
		$program_institute_names 			= $this->input->post('program_institute_names', true);
		$program_fundng_source 				= $this->input->post('program_fundng_source', true);
		$employee_id 						= $this->input->post('employee_id', true);		
		$research_project_title 			= $this->input->post('research_project_title', true);
		

        $whereCond = '';
        if (!empty($program_institute_names) ) {
            $whereCond .= " AND hrm_organizations.id = ".$program_institute_names;
        }
		if (!empty($program_fundng_source) ) {
            $whereCond .= " AND rmis_funding_source.id = ".$program_fundng_source;
        }
		if (!empty($employee_id) ) {
            $whereCond .= " AND hrm_employees.id = ".$employee_id;
        }
        if (!empty($research_project_title) ) {
            $whereCond .= " AND rmis_program_informations.research_program_title = ".$research_project_title;
        }		
        
        $parmData = array(
            'pWhereCond' => $whereCond
        );
        $parmData = array_merge($parmData, $orgParam);
        
        $jasperPrint = $this->general_model->getJasperData("div_wise_project_experiment_list.jrxml", $parmData, $modulePath);
        
        $format = $this->input->post('format');
        if ($mode == 'export') {
            $this->general_model->getReports($format, $jasperPrint, 'export', $modulePath);
        }
        else {
            $this->general_model->getReports($format, $jasperPrint, 'preview', $modulePath);
        }
    }

    public function getReportExport()
    {
        $this->getReport('export');
    }

}