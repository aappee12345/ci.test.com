<?php
class Guanggaomodel extends CI_Model
{
	public $g_ad_id;
	public $g_cate;
	public $g_title;
	public $g_description;
	public $g_link;
	public $g_path;
	public $g_sort;

	
	//获取当前广告位的广告列表
	public function check($ad_id,$order='g_sort DESC,g_id ASC')
	{
		$condition['g_ad_id'] = $ad_id;
		$guanggaolist = $this->db->where($condition)->order_by($order)->get('guanggao')->result_array();
		foreach ($guanggaolist as &$guanggao)
		{
			$arr['ad_id'] = $guanggao['g_ad_id'];
			$res = $this->db->where($arr)->get('ad')->row_array();
			$guanggao['g_path'] = strstr($guanggao['g_path'],'/upload');
			$guanggao['g_ad_name'] = $res['ad_name'];
		}
		return $guanggaolist;
	}

	/** 获取指定ID广告
	  * @param int $id 广告ID
	  * @return array $ad 广告信息[一维数组]
	  */
	public function find_guanggao($id)
	{
		$condition['g_id'] = $id;
		$guanggao = $this->db->where($condition)->get('guanggao')->row_array();
		return $guanggao;
	}

	
}