<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminDashboard extends CI_Controller {


    public function index()
    {
    	$this->load->view('dashboard/user_login');
    }

	public function user_login()
	{
		$data = array();
		$data['dashboard_main_content'] = $this->load->view('dashboard/dashboard','',true);
		$this->load->view('dashboard_layout',$data);
	}
}
