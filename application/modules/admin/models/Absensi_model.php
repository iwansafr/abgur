<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi_model extends CI_Model
{
	var $table = 'absensi';
	public function __construct()
	{
		$this->load->database();
	}

	public function edit()
	{
		$data = $this->input->post();
		if(!empty($data))
		{
			$is_exist = $this->db->query('SELECT id FROM '.$this->table.' WHERE jam_ke = ? AND user_id = ? AND kelas = ? LIMIT 1', array($data['jam_ke'], $data['user_id'], $data['kelas']))->row_array();
			if(empty($is_exist))
			{
				$this->db->insert($this->table, $data);
				$data['alert'] = 'success';
				$data['message'] = 'Data Saved Successfully';
			}else{
				$data['alert'] = 'danger';
				$data['message'] = 'Anda sudah masuk di jam ke '.@intval($data['jam_ke']);
			}
		}
		return $data;
	}

	public function getStatus($data)
	{
		if(is_array($data) & !empty($data))
		{
			$output = $this->db->query('SELECT * FROM '.$this->table.' WHERE jam_ke = ? AND user_id = ? ORDER BY id DESC LIMIT 1', array($data['jam_ke'], $data['user_id']))->row_array();
			return $output;
		}
	}
	public function getAbsensi()
	{
		$q    = "SELECT a.*, u.name FROM absensi AS a LEFT JOIN user AS u ON(a.user_id=u.id) ORDER BY id DESC";
		$data = $this->db->query($q);
		return $data;
	}
}