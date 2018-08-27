<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->helper('form');
	}

	public function index()
	{
		$data['redirect_to'] = $this->input->get('redirect_to');
		$this->load->view('login', $data);
	}
	public function ajax_login()
	{
		$data = $this->admin_model->login();
		echo json_encode($data);
	}
}