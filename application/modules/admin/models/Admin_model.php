<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{
	var $esg = array();
	var $id = 0;
	public function __construct()
	{
		$this->load->database();
	}

	public function meta()
	{
		$this->esg['meta'] = array(
			'title'          => 'esoftgreat',
			'link'           => base_url(),
			'developer'      => 'esoftgreat',
			'developer_link' => 'https:/esoftgreat.com'

		);
	}

	public function setId($id = 0)
	{
		if(!empty($id))
		{
			$this->id = @intval($id);
		}
	}

	public function left_menu()
	{
		$this->esg['left_menu'] = array(
			'absensi' => array(
				'icon' => 'fa-sign-in',
				'list' => array(
					array(
						'title' => 'absensi',
						'link' => base_url('admin/absensi')
					)
				)
			),
			'user' => array(
				'icon' => 'fa-user',
				'list' => array(
					array(
						'title' => 'user list',
						'link' => base_url('admin/user/list')
					),
					array(
						'title' => 'user add',
						'link' => base_url('admin/user/edit')
					)
				)
			)
		);
	}

	public function do_upload($field = 'image', $module = 'admin')
	{
		$realpath = realpath('images'.DIRECTORY_SEPARATOR.$module.DIRECTORY_SEPARATOR.$this->id);
		if(empty($realpath))
		{
			mkdir(FCPATH.'images'.DIRECTORY_SEPARATOR.$module.DIRECTORY_SEPARATOR.$this->id, 0777, 1);
			$realpath = realpath('images'.DIRECTORY_SEPARATOR.$module.DIRECTORY_SEPARATOR.$this->id);
		}
		$config['upload_path']   = $realpath;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']      = 1000;
		// $config['max_width']     = 1024;
		// $config['max_height']    = 768;
		$config['overwrite']     = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($field))
		{
			$error = array('error' => $this->upload->display_errors());
			return $error;
		}else{
			$data = array('upload_data' => $this->upload->data());
			return $data;
		}
	}

	public function footer()
	{
		$this->esg['footer'] = array();
	}

	public function module()
	{
		$mod['name'] = $this->router->fetch_class();
		$mod['task'] = $this->router->fetch_method();

		$this->esg['module']  = $mod;
		$this->esg['content'] = $mod['name'].'/'.$mod['task'];
	}

	public function esg()
	{
		$this->meta();
		$this->left_menu();
		$this->footer();
		$this->module();
		$this->esg = (object) $this->esg;
		return $this->esg;
	}

	public function login()
	{
		$status      = FALSE;
		$username    = $this->input->post('username');
		$password    = $this->input->post('password');
		$redirect_to = $this->input->post('redirect_to');

		if(!empty($username))
		{
			$q    = 'SELECT * FROM user WHERE username = ? AND active = 1 LIMIT 1';
			$data = $this->db->query($q, array($username))->row_array();
			if(!empty($data))
			{
				if(decrypt($password, $data['password']))
				{
					$status = TRUE;
					$this->session->set_userdata(base_url().'_logged_in', $data);
				}else{
					$data = array('msg'=>'wrong password','status'=>$status);
				}
			}else{
				$data = array('msg'=>'username not found','status'=>$status);
			}
		}
		if($status == TRUE)
		{
			$data = array('status'=>$status, 'redirect_to'=>$redirect_to, 'msg'=>'login success');
		}
		return $data;
	}

}