<?php

class Rmis extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        //$this->load->model('hrmis_model');
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
}    