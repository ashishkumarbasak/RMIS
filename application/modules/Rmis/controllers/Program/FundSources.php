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
		$this->template->append_metadata('<script src="/assets/jqueryui/1.8/jquery-ui.min.js"></script>');
        $this->template->append_metadata('<script src="/assets/js/custom/rmis.js"></script>');
		$this->template->append_metadata('<script src="/assets/extensive/js/jquery.validate.min.js"></script>');
		$this->template->append_metadata('<script src="/assets/js/custom/rmis_setup.js"></script>');
                
       	if($program_id!=NULL){
			if($this->input->post('update_fundSources')){
				$request = json_encode($this->input->post());
				$this->dataUpdate($request);
			}
			
			if($this->input->post('delete_fundSources')){
				$request = json_encode($this->input->post());
				$this->dataDestroy($request);
				redirect('Rmis/Program/FundSources/'.$program_id,'refresh');
			}
			
			$program_detail = $this->program->get_details($program_id);
			$this->template->set('program_detail', serialize($program_detail));
			
			$fundSources = $this->program->get_fundSources($program_id);
			$this->template->set('fundSources', serialize($fundSources));
			
			$costEstimations = $this->program->get_costEstimation($program_id);
			$this->template->set('costEstimations', serialize($costEstimations));
			
			$costBreakdowns = $this->program->get_costBreakdowns($program_id);
			$this->template->set('costBreakdowns', serialize($costBreakdowns));
			
			$financial_years = $this->grid->read('financial_year', array('id','year_name', 'is_active'), $request); 
			$this->template->set('financial_years', $financial_years);
			
			$account_head_info = $this->program->get_account_head_info();
			$this->template->set('account_head_info', serialize($account_head_info));
						
			$this->template->set('program_id',$program_id);
		}
		
		$program_areas = $this->grid->read('rmis_program_areas', array('id','program_area_id', 'program_area_name'), $request); 
		$this->template->set('program_areas',$program_areas);
		
		$funding_source = $this->grid->read('rmis_funding_source', array('id','value', 'name'), $request); 
		$this->template->set('funding_source',$funding_source);
		
		$currency = $this->grid->read('rmis_currency', array('id','value', 'name'), $request); 
		$this->template->set('currencies',$currency);
		
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
        $request = json_decode($request);
		
		$columns = array('fund_source', 'amount','currency','exchange_rate', 'date_of_exchange_rate', 'amount_in_taka', 'program_id');
		$columns[] = 'organization_id';
		$request->organization_id = $this->config->item('organization_id');
		$columns[] = 'created_at';
        $request->created_at = date('Y-m-d H:i:s');            
        $columns[] = 'created_by';
        $request->created_by = $this->loginUser->id;
		$fund_sources = json_decode($this->input->post('fund_sources'));
		if(!empty($fund_sources)){
			foreach($fund_sources as $fund_source_key=>$fund_source){
				if($fund_source!=NULL){
					$request->fund_source = $fund_source->fund_source_id;
					$request->amount = $fund_source->amount;
					$request->currency = $fund_source->currency_id;
					$request->exchange_rate = $fund_source->exchange_rate;
					$request->date_of_exchange_rate = $fund_source->date_of_exchange_rate;
					$request->amount_in_taka = $fund_source->amount_in_taka;
					$this->grid->create('rmis_program_funding_sources', $columns, $request, 'id');	
				}
			}
		}
		
		$columns = array('estimate_date', 'financial_year','program_id');
        $columns[] = 'organization_id';
		$request->organization_id = $this->config->item('organization_id');
		$columns[] = 'created_at';
        $request->created_at = date('Y-m-d H:i:s');            
        $columns[] = 'created_by';
        $request->created_by = $this->loginUser->id;
		$data = $this->grid->create('rmis_program_cost_estimations', $columns, $request, 'id'); 
        
		$request->program_id = $request->program_id;
		$columns = array('s_o', 'ac_head_id', 'amount', 'program_id');
		$i=0;
		if(!empty($request->s_os)>0){
			foreach($request->s_os as $s_o_key=>$s_o){
				if($s_o!=NULL){
					$request->s_o = $request->s_os[$i];;
					$request->ac_head_id = $request->ac_head_titles[$i];
					$request->amount = $request->cost_amounts[$i];
					$this->grid->create('rmis_program_cost_breakdowns', $columns, $request, 'id');
					$i++;	
				}
			}
		}
        $data['success'] ="Data created successfuly.";
    }

	function getFundSources($program_id=NULL){
		header('Content-Type: application/json');
        $request = json_decode(file_get_contents('php://input'));
        $fundSources = $this->program->get_fundSources($program_id);
		if($fundSources!=NULL)
        	echo json_encode($fundSources, JSON_NUMERIC_CHECK);
		else
			echo "[]";
	}

	function addFundSource(){
		header('Content-Type: application/json');
        $members = $this->input->post('models');
		echo $members;
	}
	
	function destroyFundSource(){
		header('Content-Type: application/json');
        $members = $this->input->post('models');
		echo $members;
	}
	
	function updateFundSource(){
		header('Content-Type: application/json');
        $members = $this->input->post('models');
		echo $members;
	}
	
	function getListofFundSources(){
		header('Content-Type: application/json');
        $request = json_decode(file_get_contents('php://input'));
       	$funding_sources = $this->grid->read('rmis_funding_source', array('id','value as fund_source_id', 'name as fund_source'), $request); 
		if($funding_sources!=NULL)
        	echo json_encode($funding_sources["data"], JSON_NUMERIC_CHECK);
		else
			echo "[]";
	}
	
	function getListofCurrencies(){
		header('Content-Type: application/json');
        $request = json_decode(file_get_contents('php://input'));
       	$currency = $this->grid->read('rmis_currency', array('id','value as currency_id', 'name as currency'), $request); 
		if($currency!=NULL)
        	echo json_encode($currency["data"], JSON_NUMERIC_CHECK);
		else
			echo "[]";
	}
    	
	public function dataUpdate($request){
        $request = json_decode($request);
		
		$columns = array('fund_source', 'amount','currency','exchange_rate', 'date_of_exchange_rate', 'amount_in_taka', 'program_id');
		$columns[] = 'organization_id';
		$request->organization_id = $this->config->item('organization_id');
		$columns[] = 'updated_at';        
        $request->updated_at = date('Y-m-d H:i:s');            
        $columns[] = 'updated_by';
        $request->updated_by = $this->loginUser->id;
		$fund_sources = json_decode($this->input->post('fund_sources'));
		$this->program->clean_programFundSources($request->program_id);
		if(!empty($fund_sources)){
			foreach($fund_sources as $fund_source_key=>$fund_source){
				if($fund_source!=NULL){
					$request->fund_source = $fund_source->fund_source_id;
					$request->amount = $fund_source->amount;
					$request->currency = $fund_source->currency_id;
					$request->exchange_rate = $fund_source->exchange_rate;
					$request->date_of_exchange_rate = $fund_source->date_of_exchange_rate;
					$request->amount_in_taka = $fund_source->amount_in_taka;
					$this->grid->create('rmis_program_funding_sources', $columns, $request, 'id');	
				}
			}
		}
		
		$columns = array('estimate_date', 'financial_year','program_id');
        $columns[] = 'organization_id';
		$request->organization_id = $this->config->item('organization_id');
		$columns[] = 'updated_at';        
        $request->updated_at = date('Y-m-d H:i:s');            
        $columns[] = 'updated_by';
        $request->updated_by = $this->loginUser->id;
		$data = $this->grid->update('rmis_program_cost_estimations', $columns, $request, 'program_id'); 	
		$columns = array('s_o', 'ac_head_id', 'amount', 'program_id');
		$request->program_id = $request->program_id;
		$i=0;
		if(!empty($request->s_os)>0){
			$this->program->clean_programCostBreakDown($request->program_id);
			foreach($request->s_os as $s_o_key=>$s_o){
				if($s_o!=NULL){
					$request->s_o = $request->s_os[$i];
					$request->ac_head_id = $request->ac_head_titles[$i];
					$request->amount = $request->cost_amounts[$i];
					$this->grid->create('rmis_program_cost_breakdowns', $columns, $request, 'id');
					$i++;
				}
			}
		}
        $data['success'] ="Data updated successfuly.";
    }
	
		
	public function dataDestroy($request=NULL){
		if($request!=NULL){
			 $request = json_decode($request);
			 $data = $this->grid->destroy('rmis_program_cost_estimations', $request, 'program_id');
			 $data = $this->grid->destroy('rmis_program_cost_breakdowns', $request, 'program_id');
			 $data = $this->grid->destroy('rmis_program_funding_sources', $request, 'program_id');
		}
		else{   
			header('Content-Type: application/json');
			$request = json_decode(file_get_contents('php://input'));
			$data = $this->grid->destroy('rmis_program_cost_estimations', $request->models, 'program_id');
			$data = $this->grid->destroy('rmis_program_cost_breakdowns', $request->models, 'program_id');
			$data = $this->grid->destroy('rmis_program_funding_sources', $request->models, 'program_id'); 
			echo json_encode($data , JSON_NUMERIC_CHECK);
		}        
	}

	public function deleteFundSource(){
		$fundSource_id = $this->input->post('fundSource_id');
		$program_id = $this->input->post('program_id');
		$this->program->deleteFundSourceFromProgram($fundSource_id,$program_id);
	}
	
	function deleteCostBreakDown(){
		$cbitem_id = $this->input->post('cbitem_id');
		$program_id = $this->input->post('program_id');
		$this->program->deleteCostBreakDownFromProgram($cbitem_id,$program_id);
	}
} 
?>