<?php

class Rptfixedassetinformtion extends MX_Controller
{

    private $_data;

    public function __construct()
    {
        parent::__construct();
		$this->load->model('general_model', 'general_model');
		
        $this->template->set_partial('header', 'layouts/header')
                ->set_partial('sidebar', 'layouts/sidebar')
                ->set_layout('extensive/main_layout');

       // $this->load->model('Imis_Report_Model', 'rptm');

        //$this->output->enable_profiler(TRUE);
    }

    public function index()
    {
        $this->template->title('Imis', 'Reports', 'Fixed Asset Information');
        $this->template->set('dap_menu', 'class="active open"');

         $this->template->append_metadata('<link href="/assets/kendoui/css/web/kendo.common.min.css"  rel="stylesheet"/>');
        $this->template->append_metadata('<link href="/assets/kendoui/css/web/kendo.default.min.css"  rel="stylesheet"/>');
        $this->template->append_metadata('<script src="/assets/kendoui/js/kendo.all.min.js"></script>');
		$this->template->append_metadata('<script src="/assets/jqueryui/1.8/jquery-ui.min.js"></script>');
        $this->template->append_metadata('<script src="/assets/js/custom/rmis.js"></script>');
		$this->template->append_metadata('<script src="/assets/extensive/js/jquery.validate.min.js"></script>');
		$this->template->append_metadata('<script src="/assets/js/custom/rmis_setup.js"></script>');
                
        require_once APPPATH.'third_party/kendoui/Autoload.php';

      
 /*       $this->db->select('id as value, store_name as text');
        $this->db->order_by('store_name asc');
        $storeName= $this->db->get('imis_store_setup')->result_array();
        $this->template->set('storeName', $storeName);
        
        $this->db->select('id as value, group_name as text');
        $this->db->where('category_id', 8);
        $this->db->order_by('group_name asc');
        $grooups = $this->db->get('imis_group_setup')->result_array();
        $this->template->set('grooups', $grooups);
        
        
        $this->db->select('id as value, project_name as text');
        $this->db->order_by('project_name asc');
        $projectName = $this->db->get('imis_project_setup')->result_array();
        $this->template->set('projectName', $projectName);
        
        $this->db->select('id as value, item_name as text');
        $this->db->order_by('item_name asc');
        $employee= $this->db->get('imis_inventory_item_setup')->result_array();
        $this->template->set('item_name', $employee);*/

        $this->template->build('reports/fixed_asset_information');
    }

    public function getReport($mode = 'preview')
    {
       
         require_once($this->config->item('java_bridge_path'));
        $modulePath = '/reports/rmis/';
        //$orgInfo = $this->general_model->getOrganizationInfo($this->config->item('organization_id'));
        //$pStartDate = ($this->input->post('date_from'), 'd-m-Y', 'Y-m-d');
        //$pEndingDate = ($this->input->post('date_to'), 'd-m-Y', 'Y-m-d');
        $orgParam = array(
            'pOrgName' => $orgInfo['organization_name'],
            'pOrgAddress' => $orgInfo['address'],
            'pLogoURL' => site_url($orgInfo['file_path']),
            'pTitle' => "List Of Asset"
        );

        $whereCond = '';
        $store_id = $this->input->post('store_name', true);
        if (!empty($store_id) ) {
            $whereCond .= " AND fxAs.store_id = ".$store_id;
        }
        
        $groupId = $this->input->post('group_id', true);
        if (!empty($groupId) ) {
            $whereCond .= " AND fxAs.group_id = ".$groupId;
        }
    
        $project_name = $this->input->post('project_name', true);
        if (!empty($project_name) ) {
            $whereCond .= " AND fxAs.project_id = ".$project_name;
        }
        $sub_group_id = $this->input->post('sub_group_id', true);
        if (!empty($sub_group_id) ) {
            $whereCond .= " AND fxAs.sub_group_id = ".$sub_group_id;
        }
    
        if (!empty($pStartDate) && !empty($pEndingDate) ) {
            $whereCond .= " AND fxAs.date_of_purchase between DATE_FORMAT('".$pStartDate."', '%Y-%m-%d') AND  DATE_FORMAT('".$pEndingDate."', '%Y-%m-%d')";
               // /BETWEEN  ". date("Y-m-d", strtotime($pStartDate)) . " AND " . date("Y-m-d", strtotime($pEndingDate)) ;   ///BETWEEN '2010-01-30 14:15:55' AND '2010-09-29 10:15:55'
        }
        
        $parmData = array(
            /*'pWhereCond' => $whereCond,
            'pStartDate' => $pStartDate,
            'pEndingDate' => $pEndingDate*/
        );
        $parmData = array_merge($parmData, $orgParam);
        
        $jasperPrint = $this->general_model->getJasperData("test.jrxml", $parmData, $modulePath);
        
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