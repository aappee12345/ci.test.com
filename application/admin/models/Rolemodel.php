<?php
class Rolemodel extends CI_Model
{
	public $r_id;
	public $r_name;
	public $r_permission;
	
	//获取角色列表
	public function check()
	{
		$rolelist = $this->db->get('role')->result_array();
		return $rolelist;
	}

	/** 获取指定ID角色
	  * @param int $id 角色ID
	  * @return array $ad 角色信息[一维数组]
	  */
	public function find_role($id)
	{
		$condition['r_id'] = $id;
		$role = $this->db->where($condition)->get('role')->row_array();
		return $role;
	}

	//添加角色
	public function insert_role()
	{
		$data['r_id'] = $this->input->post('r_id',TRUE);
		$data['r_name'] = $this->input->post('r_name',TRUE);
		$data['r_permission'] = 1;
		$res = $this->db->insert('role', $data);
		return $res;
	}

	//修改角色
	public function update_role($id)
	{
		if ($this->input->post('r_name',TRUE))
		{
			$data['r_name'] = $this->input->post('r_name',TRUE);
		}
		if ($this->input->post('r_permission',TRUE)||$this->input->post('r_permission',TRUE)=='')
		{
			$data['r_permission'] = $this->input->post('r_permission',TRUE);
			//修改该角色对应管理员的权限字段值
			$arr['ma_permissionid'] = $data['r_permission'];
			$this->db->update('manager', $arr,array('ma_rid'=>$id));
			//修改该角色对应管理员在session表中的对应字段值
		}
		$res = $this->db->update('role', $data,array('r_id'=>$id));
		return $res;
	}

	//处理删除
	public function doDel($id)
	{
		$role = $this->find_role($id);
		$res = $this->db->delete('role', array('r_id' => $id));
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