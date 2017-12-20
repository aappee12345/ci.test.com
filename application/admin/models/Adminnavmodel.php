<?php
class Adminnavmodel extends CI_Model
{
	public $resourceName;
	public $resourceGrade;
	public $parentID;
	public $delFlag;
	public $accessPath;

	//按照ID查询记录
	public function get_this_nav($id)
	{
		$condition['resourceID'] = $id;
		$navinfo = $this->db->where($condition)->get('adminnav')->result_array();
		return $navinfo[0];
	}
	//获取所有功能列表
	public function check()
	{
		$navlist = $this->db->get('adminnav')->result_array();
		return $navlist;
	}
	//获取父级功能
	public function checkParent()
	{
		$condition['parentID'] = 1;
		$navlist = $this->db->where($condition)->get('adminnav')->result_array();
		return $navlist;
	}

	//处理添加
	public function insert_func()
	{
		$this->resourceName = $this->input->post('resourceName');
		$this->resourceGrade = $this->input->post('resourceGrade');
		$this->parentID = $this->input->post('parentID');
		$this->accessPath = $this->input->post('accessPath');
		$this->delFlag = 0;
		$res = $this->db->insert('adminnav', $this);
	}

	//处理修改
	public function update_func()
	{
		$this->resourceName = $this->input->post('resourceName');
		$this->resourceGrade = $this->input->post('resourceGrade');
		$this->parentID = $this->input->post('parentID');
		$this->accessPath = $this->input->post('accessPath');
		$res = $this->db->update('adminnav',$this,array('resourceID'=>$this->input->post('resourceID')));
	}

	//修改记录
	public function updateFunc($id,$field,$content)
	{
		$this->db->set($field, $content);
		$this->db->where('resourceID', $id);
		$this->db->update('adminnav');
	}

	//删除
	public function del($id)
	{
		$res = $this->db->delete('adminnav',array('resourceID'=>$id));
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