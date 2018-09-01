<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
	var $data = array();
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		if(empty($this->session->userdata(base_url().'_logged_in')))
		{
			$curent_url = base_url($_SERVER['PATH_INFO']);
			$curent_url = urlencode($curent_url);
			redirect(base_url('admin/login?redirect_to='.$curent_url));
		}
		// $this->load->model('user_model');
		$this->load->helper('form');
		$this->data['esg'] = $this->admin_model->esg();
	}

	public function index()
	{

	}

	public function edit($id = 0)
	{
		$this->data['esg']->status = array();
		if(!empty($this->input->post()))
		{
			$this->data['esg']->status = $this->user_model->edit($id);
			// _validate($this->input->post());
		}
		if(!empty($id))
		{
			$this->user_model->setDetail($id);
		}
		$this->data['esg']->field = $this->user_model->field();
		$this->load->view('dashboard', $this->data);
	}

	public function detail($id = 0)
	{
		$data = array();
		if(!empty($id))
		{
			$data = $this->user_model->detail(@intval($id));
		}
		echo json_encode($data);
	}

	public function ajax_edit($id = 0)
	{
		$data = array('status'=>FALSE);
		if(!empty($this->input->post()))
		{
			_validate($this->input->post(), array('image','id'));
			$data = $this->user_model->edit($id);
			if($data['alert'] == 'success')
			{
				$data = array('status'=>TRUE);
			}
		}
		echo json_encode($data);
	}

	public function list()
	{
		$this->data['esg']->field = $this->user_model->field();
		$this->load->view('dashboard', $this->data);
	}

	public function delete($id)
	{
		$list_id = $this->input->post('id');
		$this->user_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	public function bulk_delete()
	{
		$list_id = $this->input->post('id');
		foreach ($list_id as $id)
		{
			$this->user_model->delete_by_id($id);
		}
		echo json_encode(array("status" => TRUE));
	}

	public function getUser()
	{
		$draw   = intval($this->input->get("draw"));
		$start  = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		$content = $this->user_model->getUser();

		$data = array();
		$i = 0;
		$role = array('1'=>'admin','2'=>'guru');
		$active = array('unactive','active');
		foreach($content->result() as $r)
		{
			$data[] = array(
				'<label class="checkbox"><input type="checkbox" class="data-check" value="'.$r->id.'"></label>',
				$r->username,
				$r->name,
				$role[$r->role],
				$active[$r->active],
				'<button class="btn btn-sm btn-primary edit-data"><i class="glyphicon glyphicon-pencil"></i> Edit</button><button class="btn btn-sm btn-danger delete-data"><i class="glyphicon glyphicon-trash"> Delete</button>'
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

	public function logout()
	{
		$this->session->sess_destroy();
		delete_cookie('username');
		delete_cookie('password');
		redirect(base_url('admin'));
	}

}
/*
				<div class="checkbox">
					<label>
						<input type="checkbox" class="del_check" name="del_row[]" value="61"> <span class="glyphicon glyphicon-trash"></span>
					</label>
				</div>
*/