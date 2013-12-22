<?php
class ProgramAreaWiseProgressReport extends MX_Controller
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
		
		$program_areas = $this->grid->read('rmis_program_areas', array('id','program_area_id', 'program_area_name'), $request); 
		$this->template->set('program_areas',$program_areas);
		
		$divisions = $this->grid->read('rmis_divisions', array('id','division_id', 'division_name'), $request);  
		$this->template->set('divisions',$divisions);
		
		$research_statuses = $this->grid->read('rmis_research_statuses', array('value','name', 'is_active'), $request);
		$this->template->set('research_statuses',$research_statuses);
		
		$research_types = $this->grid->read('rmis_research_types', array('value','name', 'is_active'), $request); 
		$this->template->set('research_types',$research_types);
		
		$fundSources = $this->grid->read('rmis_funding_source', array('value','name', 'is_active'), $request);
		$this->template->set('fundSources', $fundSources);

        $this->template->build('reports/program_area_wise_progress_report');
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
		$program_area 						= $this->input->post('program_area', true);
		$program_division 					= $this->input->post('program_division', true);
		$program_research_type 				= $this->input->post('program_research_type', true);
		$program_research_status 			= $this->input->post('program_research_status', true);
		$employee_id 						= $this->input->post('employee_id', true);
		$program_planned_start_date_from 	= $this->input->post('program_planned_start_date_from', true);
		$program_planned_start_date_to 		= $this->input->post('program_planned_start_date_to, true');
		$program_planned_actual_date_from 	= $this->input->post('program_planned_actual_date_from', true);
		$program_planned_actual_date_to 	= $this->input->post('program_planned_actual_date_to', true);
		$program_planned_budget_from 		= $this->input->post('program_planned_budget_from', true);
		$program_planned_budget_to 			= $this->input->post('program_planned_budget_to', true);
		$program_fundng_source 				= $this->input->post('program_fundng_source', true);

        $whereCond = '';
        if (!empty($program_institute_names) ) {
            $whereCond .= " AND hrm_organizations.id = ".$program_institute_names;
        }
        if (!empty($program_area) ) {
            $whereCond .= " AND rmis_program_areas.program_area_id = ".$program_area;
        }

        if (!empty($program_division) ) {
            $whereCond .= " AND rmis_divisions.id = ".$program_division;
        }
		if (!empty($program_research_type) ) {
            $whereCond .= " AND rmis_research_types.id = ".$program_research_type;
        }
		if (!empty($program_research_status) ) {
            $whereCond .= " AND rmis_research_statuses.id = ".$program_research_status;
        }
		if (!empty($employee_id) ) {
            $whereCond .= " AND hrm_employees.id = ".$employee_id;
        }
		if (!empty($program_planned_start_date_from) ) {
            $whereCond .= " AND rmis_program_informations.program_planned_start_date = ".$program_planned_start_date_from;
        }
		if (!empty($program_planned_start_date_to) ) {
            $whereCond .= " AND rmis_program_informations.program_planned_end_date = ".$program_planned_start_date_to;
        }
		if (!empty($program_planned_actual_date_from) ) {
            $whereCond .= " AND rmis_program_informations.program_planned_start_date = ".$program_planned_actual_date_from;
        }
		if (!empty($program_planned_budget_from) ) {
            $whereCond .= " AND rmis_program_informations.program_planned_budget = ".$program_planned_budget_from;
        }
		if (!empty($program_planned_budget_to) ) {
            $whereCond .= " AND rmis_program_informations.program_approved_budget = ".$program_planned_budget_to;
        }
		if (!empty($program_fundng_source) ) {
            $whereCond .= " AND rmis_funding_source.id = ".$program_fundng_source;
        }
        
        $parmData = array(
            'pWhereCond' => $whereCond
        );
        $parmData = array_merge($parmData, $orgParam);
        
        $jasperPrint = $this->general_model->getJasperData("program_area_wise_progress_report.jrxml", $parmData, $modulePath);
        
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