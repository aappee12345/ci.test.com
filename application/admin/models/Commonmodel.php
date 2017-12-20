<?php
class Commonmodel extends CI_Model
{
	public $co_title;
	public $co_pic;
	public $co_description;
	public $co_content;
	public $created_at;
	public $updated_at;

	//获取其他内容列表
	public function check()
	{
		$commonlist = $this->db->get('common')->result_array();
		return $commonlist;
	}

	/** 获取指定ID广告
	  * @param int $id 广告ID
	  * @return array $ad 广告信息[一维数组]
	  */
	public function find_common($id)
	{
		$condition['co_id'] = $id;
		$common = $this->db->where($condition)->get('common')->row_array();
		return $common;
	}

	//添加广告位
	public function insert_common()
	{
		$data['co_title'] = $this->input->post('co_title',TRUE);
		$data['co_pic'] = $this->input->post('co_pic',TRUE);
		$data['co_description'] = $this->input->post('co_description',TRUE);
		$data['co_content'] = $this->input->post('co_content',TRUE);
		$data['created_at'] = time();
		$data['updated_at'] = time();
		$res = $this->db->insert('common', $data);
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
	public function update_common($id)
	{
		$data['co_title'] = $this->input->post('co_title',TRUE);
		$data['co_pic'] = $this->input->post('co_pic',TRUE);
		$data['co_description'] = $this->input->post('co_description',TRUE);
		$data['co_content'] = $this->input->post('co_content',TRUE);
		$data['updated_at'] = time();
		$res = $this->db->update('common', $data,array('co_id'=>$id));
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
		$common = $this->find_common($id);
		//删除图片
		$co_pic = '.'.strstr($common['co_pic'],'/upload/common/');
		if (file_exists($co_pic))
		{
			@unlink($co_pic);
		}
		$res = $this->db->delete('common', array('co_id' => $id));
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