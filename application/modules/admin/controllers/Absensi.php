<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller
{
	var $data = array();
	public function __construct()
	{
		parent::__construct();
		// date_default_timezone_set('Asia/Jakarta');
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

	public function list()
	{
		$this->load->view('dashboard', $this->data);
	}

	public function getAbsensi()
	{
		$draw   = intval($this->input->get("draw"));
		$start  = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		$content = $this->absensi_model->getAbsensi();

		$data = array();
		$i = 0;
		$role = array('1'=>'admin','2'=>'guru');
		$active = array('unactive','active');
		foreach($content->result() as $r)
		{
			$data[] = array(
				$r->name,
				$r->kelas,
				$r->jam_ke,
				$r->created
			);
			$i++;
		}

		$output = array(
				"draw"            => $draw,
				"recordsTotal"    => $content->num_rows(),
				"recordsFiltered" => $content->num_rows(),
				"data"            => $data
			);
		echo json_encode($output);
		exit();
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
				$data = array('status'=>TRUE,'msg'=>'Anda berhasil Masuk');
			}
		}
		echo json_encode($data);
	}
}