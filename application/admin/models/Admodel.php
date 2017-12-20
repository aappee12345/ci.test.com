<?php
class Admodel extends CI_Model
{
	public $ad_name;
	public $ad_type = 1;//广告位类型 1为图片
	public $ad_introduce;
	public $ad_size_w;
	public $ad_size_h;
	public $ad_display = 1;
	public $ad_sort = 50;

	
	//获取所有广告位列表
	public function check()
	{
		$adlist = $this->db->get('ad')->result_array();
		foreach ($adlist as &$ad)
		{
			$ad['pic_num'] = $this->db->where(array('g_ad_id'=>$ad['ad_id']))->count_all_results('guanggao');
		}
		return $adlist;
	}

	/** 获取指定ID广告位
	  * @param int $id 广告位ID
	  * @return array $ad 广告位信息[一维数组]
	  */
	public function find_ad($id)
	{
		$condition['ad_id'] = $id;
		$ad = $this->db->where($condition)->get('ad')->row_array();
		return $ad;
	}

	//添加广告位
	public function insert_ad()
	{
		$data['ad_name'] = $this->input->post('ad_name',TRUE);
		$data['ad_size_w'] = $this->input->post('ad_size_w',TRUE);
		$data['ad_size_h'] = $this->input->post('ad_size_h',TRUE);
		$data['ad_display'] = $this->input->post('ad_display',TRUE)?$this->input->post('ad_display',TRUE):1;
		$data['ad_sort'] = $this->input->post('ad_sort',TRUE)?$this->input->post('ad_sort',TRUE):50;
		$res = $this->db->insert('ad', $data);
	}

	//修改广告位
	public function update_ad($id)
	{
		$data['ad_name'] = $this->input->post('ad_name',TRUE);
		$data['ad_size_w'] = $this->input->post('ad_size_w',TRUE);
		$data['ad_size_h'] = $this->input->post('ad_size_h',TRUE);
		$data['ad_display'] = $this->input->post('ad_display',TRUE)?$this->input->post('ad_display',TRUE):1;
		$data['ad_sort'] = $this->input->post('ad_sort',TRUE)?$this->input->post('ad_sort',TRUE):50;
		$res = $this->db->update('ad', $data,array('ad_id'=>$id));
	}

	//处理删除
	public function doDel($id)
	{
		//查询该广告位下是否有广告
		$count = $this->db->where(array('g_ad_id'=>$id))->count_all_results('guanggao');
		if ($count>0)
		{
			return false;
		}
		else
		{
			$res = $this->db->delete('ad', array('ad_id' => $id));
		}
		
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
		$res = $this->db->update('ad', $arr, array('ad_id' => $arr['ad_id']));
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