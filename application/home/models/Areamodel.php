<?php
class Areamodel extends CI_Model
{
	//获取area列表
	public function check()
	{
		return $this->db->get('area')->result_array();
	}

	//获取area字母分组列表 返回二维数组
	public function checkabc()
	{
		$arealist = $this->db->where('area_pid !=','0')->get('area')->result_array();
		return $arealist;
	}

}