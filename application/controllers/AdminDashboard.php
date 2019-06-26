<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class AdminDashboard extends CI_Controller {
    public function __construct()
    {
    	parent::__construct();
    	if ($this->session->userdata('logged_in') != TRUE)
    	{ 
    		redirect('/');
    	}
    }
    
    public function home()
    {

        // if ( ! $this->session->userdata('logged_in')) redirect('/');
        $data = array();
		$data['dashboard_main_content'] = $this->load->view('dashboard/dashboard','',true);
		$this->load->view('dashboard_layout',$data);
    }

	public function user_signUp()
	{
        $this->load->view('dashboard/user_signUp');
	}

	public function save_new_user()
	{
		// if ( ! $this->session->userdata('logged_in')) redirect('/');
		$this->load->model('user_model');
		$this->user_model->save_user_info();
		$data = array();
		$data['msg'] = "Your account is created successfully . You can Login!!";
		$this->session->set_userdata($data);
		redirect('user-login',$data);
	}

    public function manage_user_account($id = '')
    {
    	// if ($this->session->userdata('logged_in')){
    	//if ( ! $this->session->userdata('user_id')) redirect('/');
    	$data = array();
    	$result = $this->user_model->show_user_info();
        $data['user_info'] = $result;

		$data['dashboard_main_content'] = $this->load->view('dashboard/manage_user_account',$data,true);

    	$this->load->view('dashboard_layout',$data);
    // }else {
    // 	redirect('/');
    // }

    }

    public function edit_user_info($id = '')
    {
    	// if ( ! $this->session->userdata('logged_in')) redirect('/');
    	$data = array();
    	$id = $this->uri->segment(2);
    	$result = $this->user_model->edit_user_info($id);
        $data['user_info'] = $result;
        //print_r($result);
		$data['dashboard_main_content'] = $this->load->view('dashboard/edit_user_info',$data,true);
    	$this->load->view('dashboard_layout',$data);
    }

    public function update_user_info($id = '')
    {
    	$data = array();
    	$id = $this->uri->segment(2);
    	$this->load->model('user_model');
		$this->user_model->update_user_data($id);
	    $data['msg'] = "Your account is updated successfully .";
		$this->session->set_userdata($data);
		redirect('manage-account',$data);
    } 
}
