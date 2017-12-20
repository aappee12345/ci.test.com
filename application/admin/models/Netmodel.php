<?php
class Netmodel extends CI_Model
{
	public $n_name;
	public $key;
	public $n_keys;
	public $n_description;
	public $n_copy;
	public $n_beian;
	public $n_url;
	public $n_co_name;
	public $water_width;
	public $water_height;
	public $water_hor;
	public $water_vrt;
	public $water_path;

	public function get_first_net()
	{
		$data = $this->db->get('net',1)->result_array();
		return $data;
	}

	public function update_net()
	{
		$this->n_name = $_POST['n_name'];
		$this->key    = $_POST['key'];
		$this->n_keys = $_POST['n_keys'];
		$this->n_description = $_POST['n_description'];
		$this->n_copy = $_POST['n_copy'];
		$this->n_url = $_POST['n_url'];
		$this->n_beian = $_POST['n_beian'];
		$this->n_co_name = $_POST['n_co_name'];
		$this->water_width = $_POST['water_width'];
		$this->water_height = $_POST['water_height'];
		$this->water_hor = $_POST['water_hor'];
		$this->water_vrt = $_POST['water_vrt'];
		$this->water_path = $_POST['water_path'];

		

		$this->db->where('n_id', $_POST['n_id']);
		$res = $this->db->update('net', $this);
		return $res;
	}
}