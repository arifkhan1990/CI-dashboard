<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_Controller extends CI_Controller {

    function __construct()
    {
    	parent::__construct();
    	$this->load->model('user_model');
    }

    public function index()
    {
    	$this->load->view('dashboard/user_login');
    }
    
    
    public function auth()
    {
    	$this->load->library('form_validation');

    	$this->form_validation->set_rules('required');
        $this->form_validation->set_rules('required');

        $email = $this->input->post('user_email',true);
	    $password = md5($this->input->post('user_password',true));
        echo $email;
	    $validate = $this->user_model->validate($email,$password);
	    // if($this->form_validation->run() == TRUE) {
	    if($validate->num_rows() > 0) {
	    	$data = $validate->row_array();
	    	$user_name  = $data['user_name'];
            $user_email = $data['user_email'];

            $us_data = array(
            'username'  => $user_name,
            'email'     => $user_email,

            'logged_in' => TRUE
        );
        $this->session->set_userdata($us_data);
        redirect('home');
       }else {
       	echo $this->session->set_flashdata('msg','Your Email OR Password is Invalied . Please Try Again!!');
       	redirect('user-login');
       }
   // }else {
   // 	redirect('/');
   // }
   
    }


    public function user_login()
	{

	    $email = $this->input->post('user_email',true);
	    $password = $this->input->post('user_password',true);

	    $this->load->model('user_model');
	    $result = $this->user_model->user_info($email,$password);
        $data = array();
        $this->load->library('session');
        if($result) {

        	// $username = $this->session->userdata('user_name');
        	// $userid = $this->session->userdata('user_id');
        	//$data['user_id'] = $result->user_id;
        	$data['user_name'] = $result->user_name;
        	$this->session->set_userdata($data);
        	redirect('home');
        }else {
        	$data['logint_error_msg'] = "Your Email OR Password is Invalied . Please Try Again!!";
		    $this->session->set_userdata($data);
		    redirect('/',$data);
        }
        
	}

 //    public function user_logout()
	// {
	// 	// if ( ! $this->session->userdata('logged_in')) redirect('/');
	// 	$this->session->unset_userdata('user_id');
	// 	$this->session->unset_userdata('user_name');
	// 	$data['logout_msg'] = 'Logout Successfully!!';
	// 	$this->session->set_userdata($data);
	// 	redirect('/');
	// }

	public function user_logout()
	{

      $this->session->sess_destroy();
	  $this->session->unset_userdata('user_email');
	  $this->session->unset_userdata('user_name');
	  $this->session->unset_userdata('user_password');

      redirect('/');

    }

}
