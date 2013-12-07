<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class SetPermissionsOptions extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    public function index()
    {
        $data = array(
           
            array(
                'module' => 'RMIS',
                'description' => 'Research Management Information System',
                'section' => 'section 1',
                'premission' => serialize( array(
                                    'rmis.employee.add' => 'Add section 1 Information',
                                    'rmis.employee.edit' => 'Edit section 1 Information',                                  
                                    'rmis.employee.view' => 'View section 1 Information',
                                )),
                'weight' => '3'
            ),
            array(
                'module' => 'RMIS',
                'description' => 'Research Management Information System',
                'section' => 'section 2',
                'premission' => serialize( array(
                                    'rmis.leave.add' => 'Apply section 2 Information',
                                    'rmis.leave.edit' => 'Edit section 2 Information',                                    
                                    'rmis.leave.view' => 'View section 2 Information',
                                )),
                'weight' => '1'
            ),
           
		   
            
        );

        $this->db->truncate('permissions');
        $this->db->insert_batch('permissions', $data);

        echo 'Permission options inserted';
    }

}