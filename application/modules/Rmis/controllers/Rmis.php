<?php

class Rmis extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        //$this->load->model('hrmis_model');
		$this->load->model('Kendodatasource_model', 'grid');
		$this->load->model('Employee_model', 'employee');
    }
    
    public function index()
    {
        $this->template->title('RMIS', 'Dashboard');
        $_data['breadcrumb']  = 'Dashboard';
        $_data['menu_active'] = 'class="active"';
        $_data['setup_menu_active'] ='';
        $_data['sub_menu_active'] = '';
        $_data['designation_sub_menu_active'] = '';
        $this->_data['organogram_sub_menu_active'] = '';
        
        $this->template->set_partial('header', 'layouts/header')
                ->set_partial('sidebar', 'layouts/sidebar',$_data)
                ->set_partial('page-content', 'layouts/page-content',$_data)
                ->set_layout('extensive/main_layout')
                ->build('dashboard');
		
    }
	
	public function employees(){
		$term = $this->input->post('term');
		if (strlen($term) > 1) {
			$rows = $this->employee->search_employee(array('keyword' => $term));
	        echo json_encode($rows);	
		}
	}
	
	
	public function employees2(){
		header('Content-Type: application/json');		
		$term = $this->input->get('filter[filters][0][value]');
		if (strlen($term) > 1) {
			$rows = $this->employee->search_employee(array('keyword' => $term));
		    echo json_encode($rows);	
		}
	}	
}
?>