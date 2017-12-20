<?php
class Linktypemodel extends CI_Model
{
	public $lt_id;
	public $lt_name;
	public $lt_width;
	public $lt_height;
	
	//获取所有广告位列表
	public function check()
	{
		$linktypelist = $this->db->get('linktype')->result_array();
		foreach ($linktypelist as &$linktype)
		{
			$linktype['link_num'] = $this->db->where(array('l_class'=>$linktype['lt_id']))->count_all_results('link');
		}
		return $linktypelist;
	}

	/** 获取指定ID广告位
	  * @param int $id 广告位ID
	  * @return array $linktype 广告位信息[一维数组]
	  */
	public function find_linktype($id)
	{
		$condition['lt_id'] = $id;
		$linktype = $this->db->where($condition)->get('linktype')->row_array();
		return $linktype;
	}

	//添加广告位
	public function insert_linktype()
	{
		$data['lt_name'] = $this->input->post('lt_name');
		$data['lt_width'] = $this->input->post('lt_width');
		$data['lt_height'] = $this->input->post('lt_height');
		$res = $this->db->insert('linktype', $data);
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
	public function update_linktype()
	{
		$id = $this->input->post('lt_id');
		$data['lt_name'] = $this->input->post('lt_name');
		$data['lt_width'] = $this->input->post('lt_width');
		$data['lt_height'] = $this->input->post('lt_height');
		$res = $this->db->update('linktype', $data,array('lt_id'=>$id));
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
		$res = $this->db->delete('linktype', array('lt_id' => $id));
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