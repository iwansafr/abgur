<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class User_model extends CI_Model
{
	var $table = 'user';
	var $module = 'user';
	var $detail = array();
	public function __construct()
	{
		$this->load->database();
		$this->load->model('Admin_model');
		$this->load->helper('file');
	}

	public function field()
	{
		$field = array(
					'username' => array(
							'label'     => 'Username',
							'type'      => 'text',
							'attribute' => array(
								'required' => 'required'
							),
							'value' => @$this->detail->username
						),
					'password' => array(
							'label'=>'Password',
							'type'=>'password'
						),
					'name' => array(
							'label'=>'name',
							'type'=>'text',
							'value' => @$this->detail->name
						),
					'role' => array(
							'label'=>'Role',
							'type'=>'dropdown',
							'option' => array(
								1 => 'admin',
								2 => 'guru'
							),
							'value' => @$this->detail->role
						),
					'id' => array(
						'type'=>'hidden',
						'label'=>'',
						'value' => @$this->detail->id
					),
					'active' => array(
							'label'=>'Active',
							'type'=>'checkbox',
							'value' => @$this->detail->active
						),
				);
		return $field;
	}
	public function delete_by_id($id)
	{
		$this->db->where('id', $id);
		if($this->db->delete($this->table))
		{
			// @delete_files(FCPATH.'images'.DIRECTORY_SEPARATOR.$this->module.DIRECTORY_SEPARATOR.$id, TRUE);
			recursive_rmdir(FCPATH.'images'.DIRECTORY_SEPARATOR.$this->module.DIRECTORY_SEPARATOR.$id);
		}
	}
	public function edit($id = 0)
	{
		$data = array(
			'username' => $this->input->post('username'),
			'name'    => $this->input->post('name'),
			'password' => encrypt($this->input->post('password')),
			'role'     => $this->input->post('role'),
			'active'   => !empty($this->input->post('active')) ? 1 : 0
		);
		if(empty($id))
		{
			$is_exist = $this->db->query('SELECT id FROM user WHERE username = ? LIMIT 1', array($data['username']))->row_array();
			if(empty($is_exist))
			{
				$this->db->insert($this->table, $data);
				$data['id'] = $this->db->insert_id();
				$this->admin_model->setId($data['id']);
				$data['alert'] = 'success';
				$data['message'] = 'Data Saved Successfully';
			}else{
				$data['alert'] = 'danger';
				$data['message'] = 'username is exist';
			}
		}else{
			$is_exist = $this->db->query('SELECT id FROM user WHERE username = ? AND id != ? LIMIT 1', array($data['username'], $id))->row_array();
			if(empty($is_exist))
			{
				$this->db->update($this->table, $data, 'id = '.$id);
				$data['alert'] = 'success';
				$data['message'] = 'Data Saved Successfully';
			}else{
				$data['alert'] = 'danger';
				$data['message'] = 'username '.$data['username'].' is exist';
			}
		}
		if(!empty($_FILES))
		{
			$image = $this->admin_model->do_upload('image',$this->table);
			if(!empty($image['upload_data']))
			{
				$image = $image['upload_data']['file_name'];
				$last_id = !empty($data['id']) ? $data['id'] : $id;
				$this->db->update($this->table, array('image'=>$image), 'id = '.$last_id);
				$data['alert'] = 'success';
				$data['message'] = 'Data Saved Successfully';
				return $data;
			}else{
				if($image['error'] != '<p>You did not select a file to upload.</p>')
				{
					$data['alert']   = 'danger';
					$data['message'] = $image['error'];
				}
				return $data;
			}
		}
		return $data;
	}

	public function detail($id)
	{
		if(!empty($id))
		{
			$this->db->from($this->table);
			$this->db->where('id', @intval($id));
			$detail = $this->db->get();
			if(!empty($detail))
			{
				$detail = $detail->row();
			}else{
				$detail = array();
			}
			return $detail;
		}
	}

	public function setDetail($id)
	{
		if(!empty($id))
		{
			$this->db->from($this->table);
			$this->db->where('id', @intval($id));
			$detail = $this->db->get();
			if(!empty($detail))
			{
				$detail = $detail->row();
			}else{
				$detail = array();
			}
			$this->detail = $detail;
		}
	}

	public function getUser()
	{
		return $this->db->get($this->table);
	}
}