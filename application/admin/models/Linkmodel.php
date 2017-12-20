<?php
class Linkmodel extends CI_Model
{
	public $l_class;//链接分类
	public $l_leixing;//链接类型 文章链接|图片链接
	public $l_wzname;//链接名称
	public $l_wzurl;//链接地址
	public $l_wzlogourl;//链接LOGO地址
	public $l_sort;//链接排序
	public $l_logowidth = 300;//logo图片宽度
	public $l_logoheight = 180;//logo图片高度

	
	//获取当前分类的友情链接列表
	public function check($lt_id,$order='l_sort DESC,l_id ASC')
	{
		$condition['l_class'] = $lt_id;
		$linklist = $this->db->where($condition)->order_by($order)->get('link')->result_array();

		foreach ($linklist as &$link)
		{
			$arr['lt_id'] = $link['l_class'];
			$res = $this->db->where($arr)->get('linktype')->row_array();
			$link['l_cname'] = $res['lt_name'];
			switch ($link['l_leixing'])
			{
				case 1:$link['l_type']='图片链接';
				break;
				case 2:$link['l_type']='文字链接';
				break;
			}
			if ($link['l_leixing']==2)
			{
				$link['l_wzlogourl'] = '';
			}
			elseif ($link['l_leixing']==1)
			{
				$link['l_wzlogourl'] = strstr($link['l_wzlogourl'],'/upload/link/');
			}
		}
		return $linklist;
	}

	/** 获取指定ID广告
	  * @param int $id 广告ID
	  * @return array $ad 广告信息[一维数组]
	  */
	public function find_link($id)
	{
		$condition['l_id'] = $id;
		$link = $this->db->where($condition)->get('link')->row_array();
		return $link;
	}

	//添加广告位
	public function insert_link()
	{
		$data['l_class'] = $this->input->post('l_class',TRUE);
		$data['l_leixing'] = $this->input->post('l_leixing',TRUE);
		$data['l_wzname'] = $this->input->post('l_wzname',TRUE);
		$data['l_wzurl'] = $this->input->post('l_wzurl',TRUE);
		$data['l_wzlogourl'] = $this->input->post('l_wzlogourl',TRUE);
		$data['l_sort'] = $this->input->post('l_sort',TRUE)?$this->input->post('l_sort',TRUE):50;
		$res = $this->db->insert('link', $data);
		if ($res)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	//修改广告位
	public function update_link($id)
	{
		$data['l_class'] = $this->input->post('l_class',TRUE);
		$data['l_leixing'] = $this->input->post('l_leixing',TRUE);
		$data['l_wzname'] = $this->input->post('l_wzname',TRUE);
		$data['l_wzurl'] = $this->input->post('l_wzurl',TRUE);
		$data['l_wzlogourl'] = $this->input->post('l_wzlogourl',TRUE);
		$data['l_sort'] = $this->input->post('l_sort',TRUE)?$this->input->post('l_sort',TRUE):50;
		$res = $this->db->update('link', $data,array('l_id'=>$id));
		if ($res)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	//处理删除
	public function doDel($id)
	{
		$link = $this->find_link($id);
		//删除图片
		$l_pic = '.'.strstr($link['l_wzlogourl'],'/upload/link/');
		
		if (file_exists($l_pic))
		{
			@unlink($l_pic);
		}
		$res = $this->db->delete('link', array('l_id' => $id));
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
		$res = $this->db->update('link', $arr, array('l_id' => $arr['l_id']));
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