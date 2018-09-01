<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller
{
	var $data = array();
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('absensi_model');
		if(empty($this->session->userdata(base_url().'_logged_in')))
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

	public function ajax_edit()
	{
		$data = array('status'=>FALSE);
		if(!empty($this->input->post()))
		{
			_validate($this->input->post(), array('id'));
			$data = $this->absensi_model->edit();
			if($data['alert'] == 'success')
			{
				$data = array('status'=>TRUE);
			}
		}
		echo json_encode($data);
	}
}