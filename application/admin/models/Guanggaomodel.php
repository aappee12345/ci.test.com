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

	//添加广告位
	public function insert_guanggao()
	{
		$data['g_ad_id'] = $this->input->post('g_ad_id',TRUE);
		$data['g_title'] = $this->input->post('g_title',TRUE);
		$data['g_link'] = $this->input->post('g_link',TRUE);
		$data['g_path'] = $this->input->post('g_path',TRUE);
		$data['g_sort'] = $this->input->post('g_sort',TRUE)?$this->input->post('g_sort',TRUE):50;
		$res = $this->db->insert('guanggao', $data);
	}

	//修改广告位
	public function update_guanggao($id)
	{
		$data['g_ad_id'] = $this->input->post('g_ad_id',TRUE);
		$data['g_title'] = $this->input->post('g_title',TRUE);
		$data['g_link'] = $this->input->post('g_link',TRUE);
		$data['g_path'] = $this->input->post('g_path',TRUE);
		$data['g_sort'] = $this->input->post('g_sort',TRUE)?$this->input->post('g_sort',TRUE):50;
		$res = $this->db->update('guanggao', $data,array('g_id'=>$id));
	}

	//处理删除
	public function doDel($id)
	{
		$guanggao = $this->find_guanggao($id);
		//删除图片
		$g_pic = '.'.strstr($guanggao['g_path'],'/upload/guanggao/');
		if (file_exists($g_pic))
		{
			@unlink($g_pic);
		}
		$res = $this->db->delete('guanggao', array('g_id' => $id));
		if ($res)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function ajaxupdate_sort($arr)
	{
		$res = $this->db->update('guanggao', $arr, array('g_id' => $arr['g_id']));
		if ($res)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}