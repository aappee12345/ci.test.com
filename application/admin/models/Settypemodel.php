<?php
class Settypemodel extends CI_Model
{
	public $t_id;
	public $t_name;

	//查询记录
	public function check()
	{
		$typelist = $this->db->get('settype')->result_array();
		return $typelist;
	}
}