<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class User_model extends CI_Model
{
	var $table = 'user';
	var $module = 'user';
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
							)
						),
					'password' => array(
							'label'=>'Password',
							'type'=>'password'
						),
					'email' => array(
							'label'=>'Email',
							'type'=>'email'
						),
					'image' => array(
							'label'=>'Image',
							'type'=>'file'
						),
					'role' => array(
							'label'=>'Role',
							'type'=>'dropdown',
							'option' => array(
								1 => 'admin',
								2 => 'guru'
							)
						),
					'active' => array(
							'label'=>'Active',
							'type'=>'checkbox'
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
	public function edit()
	{
		$id = $this->input->get('id');

		if(empty($id))
		{
			$data = array(
				'username' => $this->input->post('username'),
				'email'    => $this->input->post('email'),
				'image'    => '',
				'password' => encrypt($this->input->post('password')),
				'role'     => $this->input->post('role'),
				'active'   => !empty($this->input->post('active')) ? 1 : 0
			);
			$this->db->insert($this->table, $data);
			$data['alert'] = 'success';
			$data['message'] = 'Data Saved Successfully';
			$data['id'] = $this->db->insert_id();

			$this->admin_model->setId($data['id']);
			if(!empty($_FILES))
			{
				$image = $this->admin_model->do_upload('image',$this->table);
				if(!empty($image['upload_data']))
				{
					$image = $image['upload_data']['file_name'];
					$this->db->update($this->table, array('image'=>$image), 'id = '.$data['id']);
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

	public function getUser()
	{
		return $this->db->get($this->table);
	}
}