<?php

class Login extends CI_Controller
{

    private $_data;

    public function __construct()
    {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    public function index()
    {
        $this->load->view('users/login');
    }

    public function auth()
    {
        try {
            // Set login credentials
            $credentials = array(
                'email' => $this->input->post('username', TRUE),
                'password' => $this->input->post('password', TRUE),
            );

            // Try to authenticate the user
            $user = Sentry::authenticate($credentials, false);            
            $this->session->set_userdata('sess_userdata', $user);                      
            
            //$q = $this->session->userdata('sess_userid');
            //dd($q);

            // Get the Throttle Provider
            $throttleProvider = Sentry::getThrottleProvider();
            // Enable the Throttling Feature
            $throttleProvider->enable();
            //echo 'Login OK';
            redirect('User/Role/Permission/1');
        }
        catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
            //echo 'Login field is required.';
            $this->messages->add('Login field is required.', "error");
        }
        catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {
            //echo 'Password field is required.';
            $this->messages->add('Password field is required.', "error");
        }
        catch (Cartalyst\Sentry\Users\WrongPasswordException $e) {
            //echo 'Wrong password, try again.';
            $this->messages->add('Wrong password, try again.', "error");
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
            //echo 'User was not found.';
            $this->messages->add('User was not found.', "error");
        }
        catch (Cartalyst\Sentry\Users\UserNotActivatedException $e) {
            //echo 'User is not activated.';
            $this->messages->add('User is not activated.', "error");
        }
        // The following is only required if throttle is enabled
        catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e) {
            //echo 'User is suspended.';
            $this->messages->add('User is suspended.', "error");
        }
        catch (Cartalyst\Sentry\Throttling\UserBannedException $e) {
            //echo 'User is banned.';
            $this->messages->add('User is banned.', "error");
        }

        redirect('User/Login');
    }

//    public function chk()
//    {
//        if (!Sentry::check()) {
//            echo 'User is not logged in, or is not activated';
//        }
//        else {
//            echo 'User is logged in';
//            $user = Sentry::getUser();
//        }
//
//        print_r($user->email);        
//        $sess_userinfo = $this->session->set_userdata('sess_userinfo');
//        
//        print_r($sess_userinfo);
//    }

    public function logout()
    {
        // Logs the user out        
        Sentry::logout();
        $this->session->sess_destroy();
        redirect('User/Login');
    }

}
