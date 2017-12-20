<?php
class Guestbookmodel extends CI_Model
{
	public $g_name;
	public $g_title;
	public $g_sex;
	public $g_tel;
	public $g_email;
	public $g_address;
	public $g_postcode;
	public $g_content;
	public $created_at;
	public $updated_at;
	public $g_replay;
	public $g_status;

	//获取其他内容列表
	public function check()
	{
		$guestbooklist = $this->db->get('guestbook')->result_array();
		return $guestbooklist;
	}

	/** 获取指定ID留言
	  * @param int $id 留言ID
	  * @return array $ad 留言信息[一维数组]
	  */
	public function find_guestbook($id)
	{
		$condition['g_id'] = $id;
		$guestbook = $this->db->where($condition)->get('guestbook')->row_array();
		return $guestbook;
	}

	

	//修改留言
	public function update_guestbook($id)
	{
		$guestbook = $this->find_guestbook($id);
		$data['g_status'] = 1-$guestbook['g_status'];
		$data['updated_at'] = time();
		$res = $this->db->update('guestbook', $data,array('g_id'=>$id));
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
		$res = $this->db->delete('guestbook', array('g_id' => $id));
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