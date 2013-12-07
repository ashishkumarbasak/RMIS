<?php

class Profile extends MX_Controller
{

    private $_data;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel', 'users');

        $this->template->set_partial('header', 'layouts/header')
                ->set_layout('controlpanel/master_layout');
    }

    public function index()
    {
        echo "Load HR Employee Profile<br/>";

        try {
            // Find the user using the user id
            //$user = Sentry::getUserProvider()->findById(1);
            //$user = Sentry::getUser();
            // Check if the user has the 'admin' permission. Also,
            // multiple permissions may be used by passing an array
            // 
            //if ($this->loginUser->hasAccess('hrm.employee.edit')) {
            if ($this->loginUser->hasAnyAccess(array('hrm.employsee.edit', 'foo'))) {
                echo 'User has access to the given permission';
            } else {
                echo 'User does not have access to the given permission';
            }
        } catch (Cartalyst\Sentry\UserNotFoundException $e) {
            echo 'User was not found.';
        }
    }

    public function changepassword()
    {
        $this->template->title('Change Password');
        $this->template->append_metadata('<script src="/assets/controlpanel/js/jquery.validate.js"></script>');
        $this->template->build('users/changepassword');
    }

    public function passwordsave()
    {
        $this->form_validation->set_rules('old_password', 'Old Password', 'required|trim|min_length[5]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|xss_clean|matches[confirm_password]');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|trim|min_length[5]|xss_clean');

        if ($this->form_validation->run() === false) {
            $errors = $this->form_validation->error_array();
            $this->template->set('validation_errors', $errors);
            $this->messages->add('Password not changed.', "error");
        } else {
            try {
                // $user = Sentry::getUser();
                // Find the user using the user id
                $user = Sentry::getUserProvider()->findById($this->loginUser->id);

                if ($user->checkPassword($this->input->post('old_password'))) {
                    // Update the user details
                    $user->password = $this->input->post('password');

                    // Update the user
                    if ($user->save()) {
                        // User information was updated
                        $this->messages->add('Password changed.', "success");
                    } else {
                        // User information was not updated
                        $this->messages->add('Password not updated.', "error");
                    }
                } else {
                    //echo 'Password does not match.';
                    $this->messages->add('Old Password does not match.', "error");
                }
            } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
                //echo 'User was not found.';
                $this->messages->add('User was not found.', "error");
            }
        }
        redirect('User/Profile/changepassword');
    }

}