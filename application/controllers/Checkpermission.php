<?php

class Checkpermission extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index($access_tag)
    {
        if ($this->loginUser->hasAccess($access_tag)) {
            //echo 'Has access';
            return true;
        }
        else {
            //echo 'No Access';            
            return false;
        }
    }

}