<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use Netcarver\Textile;

//use Cartalyst\Sentry\Facades\CI;

class Welcome extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->session->set_flashdata('item', 'value');
        //$this->output->cache(15);
        //$this->output->enable_profiler(TRUE);
    }

    public function index()
    {
        $this->load->view('welcome_message');

        $parser = new Textile\Parser();
        $str = 'h1. Welcome' . PHP_EOL . PHP_EOL;
        $str .= '* List Item' . PHP_EOL;
        $str .= '* Another list item' . PHP_EOL;

        echo $parser->textileThis($str);

        $this->load->library('minify');
        $this->minify->css_file = 's.min.css';
        //$this->minify->assets_dir = 'assets';
        $this->minify->css(array('demo_page.css', 'demo_table.css', 'style.css'));
        echo $this->minify->deploy_css(true);
        
        $this->minify->js_file = 'j.min.js';
        //$this->minify->assets_dir = 'assets';
        $this->minify->js(array('jquery.relatedselects.js', 'jquery.form.js'));
        echo $this->minify->deploy_js(true);
        
    }

    public function post()
    {
        $this->load->model('post_model');
        //$post = $this->post_model->get_all();
        //$post = $this->db->get('wp_posts');
//        $post = $this->post_model->with('user')
//                         ->with('comment')
//                         ->get(1);

        $post = $this->post_model->get_with_users();

        dump($post);
    }

    public function login()
    {
        // Validate the form
        $this->form_validation->set_rules($this->user_model->validation);
        if ($this->form_validation->run() == true) {
            
        }

        // Set subview & Load layout
        $this->load->view('users/login');
    }

    /*
     * Sentry 2
     */

    public function createuser()
    {
        try {
            // Create the user
            $user = Sentry::getUserProvider()->create(array(
                'email' => 'amiysaha@yahoo.com',
                'password' => '123456',
                'permissions' => array(
                    'test' => 1,
                    'other' => -1,
                    'admin' => 1
                )
            ));

            // Find the group using the group id
            $adminGroup = Sentry::getGroupProvider()->findById(1);

            // Assign the group to the user
            $user->addGroup($adminGroup);
        }
        catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
            echo 'Login field is required.';
        }
        catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {
            echo 'Password field is required.';
        }
        catch (Cartalyst\Sentry\Users\UserExistsException $e) {
            echo 'User with this login already exists.';
        }
        catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e) {
            echo 'Group was not found.';
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */