<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->library('session');
		$this->load->helper('esg_helper');
		$this->load->helper('esg_form_helper');
		$this->load->helper('esg_element_helper');
		if(empty($this->session->userdata('user_logged_in')))
		{
			$curent_url = base_url($_SERVER['PATH_INFO']);
			$curent_url = urlencode($curent_url);
			redirect(base_url('admin/login?redirect_to='.$curent_url));
		}
	}

	public function list()
	{

	}
	public function index()
	{
		$data['esg'] = $this->admin_model->esg();
		$this->load->view('dashboard', $data);
	}
}