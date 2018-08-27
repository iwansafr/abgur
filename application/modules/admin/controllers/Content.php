<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class Content extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('content_model');
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->view('dashboard');
	}
	public function list()
	{
		$data['esg']     = $this->admin_model->esg();
		$this->load->view('dashboard',$data);
	}

	public function getContentPage()
	{
    $draw   = intval($this->input->get("draw"));
    $start  = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));

    $content = $this->content_model->getContentJson();

    $data = array();
    $i = 1;
    foreach($content->result() as $r)
    {
			$data[] = array(
				$i,
				$r->title,
				$r->image,
				$r->hits,
				$r->publish
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
}