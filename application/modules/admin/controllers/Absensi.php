<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller
{
	var $data = array();
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		if(empty($this->session->userdata('user_logged_in')))
		{
			$curent_url = base_url($_SERVER['PATH_INFO']);
			$curent_url = urlencode($curent_url);
			redirect(base_url('admin/login?redirect_to='.$curent_url));
		}
		$this->data['esg'] = $this->admin_model->esg();
	}

	public function index()
	{
		$this->load->view('dashboard', $this->data);
	}
}