<?php

class FundSources extends MX_Controller{
    private $_data;
    public function __construct(){
        parent::__construct();
        $this->load->model('Kendodatasource_model', 'grid');
        $this->load->model('Program_model', 'program');

        $this->template->set_partial('header', 'layouts/header')
						->set_layout('extensive/main_layout');
    }
    
    public function index($program_id=NULL){
        $this->template->title('Research Management(RM)', ' Programs', ' Program Fund Source & Cost Breakdown Info');
        
		if($this->input->post('save_fundSources')){
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
        
        if($program_id!=NULL){
			$program_detail = $this->program->get_details($program_id);
			$this->template->set('program_detail', serialize($program_detail));
			
			$fundSources = $this->program->get_fundSources($program_id);
			$this->template->set('fundSources', serialize($fundSources));
			
			$costEstimations = $this->program->get_costEstimation($program_id);
			$this->template->set('costEstimations', serialize($costEstimations));
			
			$costBreakdowns = $this->program->get_costBreakdowns($program_id);
			$this->template->set('costBreakdowns', serialize($costBreakdowns));
			
			$this->template->set('program_id',$program_id);
		}
		
		
        $this->template->set('content_header_icon', 'class="icofont-file"');
        $this->template->set('content_header_title', 'Program Fund Source & Cost Breakdown Info');
		
        $breadcrumb = '<ul class="breadcrumb">
						<li><a href="#"><i class="icofont-home"></i> RMIS</a> <span class="divider">&raquo;</span></li>
						<li><a href="#">Program info.</a><span class="divider">&raquo;</span></li><li class="active">Program Fund Source & Cost Breakdown Info</li>
					  </ul>';
        $this->template->set('breadcrumb', $breadcrumb);		
        $this->template->set_partial('progFundSourcesForm','program/fundSources/form');
		$this->template->set_partial('tab_menu','program/form_tabs');
        $this->template->set_partial('sidebar', 'layouts/sidebar',$_data)
               ->build('program/fundSources/index');
    }
	
	public function dataCreate($request){
        //header('Content-Type: application/json');
        //$request = json_decode(file_get_contents('php://input'));
        $request = json_decode($request);
		//print_r((array) $request);
		
		$columns = array('fund_source', 'amount','currency','exchange_rate', 'date_of_exchange_rate', 'amount_in_taka', 'program_id');
		$columns[] = 'created_at';
        $request->created_at = date('Y-m-d H:i:s');            
        $columns[] = 'created_by';
        $request->created_by = 1;
		$i=0;
		if(!empty($request->fund_sources)>0){
			foreach($request->fund_sources as $fund_source_key=>$fund_source){
				if($fund_source!=NULL){
					$request->fund_source = $fund_source;
					$request->amount = $request->amounts[$i];
					$request->currency = $request->currencies[$i];
					$request->exchange_rate = $request->exchange_rates[$i];
					$request->date_of_exchange_rate = $request->date_of_exchange_rates[$i];
					$request->amount_in_taka = $request->amounts_in_taka[$i];
					$this->grid->create('rmis_program_funding_sources', $columns, $request, 'id');
					$i++;	
				}
			}
		}
		
		$columns = array('estimate_date', 'financial_year','program_id');
        $columns[] = 'created_at';
        $request->created_at = date('Y-m-d H:i:s');            
        $columns[] = 'created_by';
        $request->created_by = 1;
		$data = $this->grid->create('rmis_program_cost_estimations', $columns, $request, 'id'); 
        
		$columns = array('s_o', 'ac_head_code','ac_head_title','amount', 'program_id');
		$i=0;
		if(!empty($request->s_os)>0){
			foreach($request->s_os as $s_o_key=>$s_o){
				if($s_o!=NULL){
					$request->s_o = $s_o;
					$request->ac_head_code = $request->ac_head_codes[$i];
					$request->ac_head_title = $request->ac_head_titles[$i];
					$request->amount = $request->cost_amounts[$i];
					$this->grid->create('rmis_program_cost_breakdowns', $columns, $request, 'id');
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
        $data= $this->grid->read_with_join_table('rmis_divisions', array('rmis_divisions.id','division_id', 'division_name', 'hrm_employees.employee_name as division_head','division_phone','division_email'), $request, 'hrm_employees', 'rmis_divisions.division_head = hrm_employees.employee_id');       
        echo json_encode($data, JSON_NUMERIC_CHECK);
    }
    public function dataDestroy(){   
        header('Content-Type: application/json');
        $request = json_decode(file_get_contents('php://input'));
        $data = $this->grid->destroy('rmis_divisions', $request->models, 'id'); 
        echo json_encode($data , JSON_NUMERIC_CHECK); 
    }
    	
	public function dataUpdate($request){
        //header('Content-Type: application/json');
        //$request = json_decode(file_get_contents('php://input'));
        $request = json_decode($request);
       // print_r($request);
        $this->form_validation->set_rules($this->division->validation);
        $this->division->isValidate((array) $request);
        if ($this->form_validation->run() === false) {
            header("HTTP/1.1 500 Internal Server Error");
            echo "Wrong data ! try again" ;
            exit;
        }
        
        $columns = array('id', 'division_name', 'division_head', 'division_phone', 'division_email', 'division_order', 'division_about');
        $columns[] = 'modified_at';        
        $request->modified_at = date('Y-m-d H:i:s');            
        $columns[] = 'modified_by';
        $request->modified_by = 1;
        
        $data = $this->grid->update('rmis_divisions', $columns, $request, 'id'); 
        $data['success'] ="Data updated successfuly.";
        //echo json_encode($data , JSON_NUMERIC_CHECK);  
    }
                
} 
?>