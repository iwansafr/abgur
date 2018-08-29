<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function getContent()
	{
		$this->db->select('id,title,image,hits,publish');
		$data = $this->db->get('content')->result_array();
		return $data;
	}

	public function getContentJson()
	{
		$this->db->select('id,title,image,hits,publish');
		$data = $this->db->get('content');
		return $data;
	}
}