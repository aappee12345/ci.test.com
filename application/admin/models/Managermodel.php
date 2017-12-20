<?php
class Managermodel extends CI_Model
{
	public $r_id;
	public $r_name;
	public $r_permission;
	
	//获取管理员列表
	public function check()
	{
		//$rid = $this->uri->segment(4);
		$rid = $this->uri->segment(3);
		if ($rid)
		{
			$managerlist = $this->db->where(array('ma_rid'=>$rid))->get('manager')->result_array();
		}
		else
		{
			$managerlist = $this->db->get('manager')->result_array();
		}
		
		foreach ($managerlist as &$value)
		{
			$role = $this->db->where(array('r_id'=>$value['ma_rid']))->get('role')->row_array();
			$value['ma_role'] = $role['r_name'];
		}
		return $managerlist;
	}

	//检查用户名密码是否正确
	public function checkManager($array)
	{
		$manager = $this->db->where($array)->get('manager')->result_array();
		return $manager;
	}

	/** 获取指定ID管理员
	  * @param int $id 管理员ID
	  * @return array $ad 管理员信息[一维数组]
	  */
	public function find_manager($id)
	{
		$condition['ma_id'] = $id;
		$manager = $this->db->where($condition)->get('manager')->row_array();
		return $manager;
	}

	/*通过rid查找用户组*/
	public function find_managers($rid)
	{
		$condition['ma_rid'] = $rid;
		$managers = $this->db->where($condition)->get('manager')->result_array();
		return $managers;
	}

	//添加管理员
	public function insert_manager()
	{
		$data['ma_username'] = $this->input->post('ma_username',TRUE);
		$data['ma_password'] = md5($this->input->post('ma_password',TRUE));
		$data['ma_email'] = $this->input->post('ma_email',TRUE);
		$data['ma_rid'] = $this->input->post('ma_rid',TRUE);
		$role = $this->db->where(array('r_id'=>$data['ma_rid']))->get('role')->row_array();
		$data['ma_permissionid'] = $role['r_permission'];
		//$data['r_permission'] = 1;
		$res = $this->db->insert('manager', $data);
		return $res;
	}

	//修改管理员
	public function update_manager($id)
	{
		$data['ma_username'] = $this->input->post('ma_username',TRUE);
		$manager = $this->find_manager($id);
		
		
		if ($this->input->post('ma_password',TRUE)!='')
		{
			if ($manager['ma_password']==$this->input->post('ma_password',TRUE))
			{
				$data['ma_password'] = $this->input->post('ma_password',TRUE);
			}
			else
			{
				$data['ma_password'] = md5($this->input->post('ma_password',TRUE));
			}
		}
		
		
		if ($this->input->post('ma_email',TRUE))
		{
			$data['ma_email'] = $this->input->post('ma_email',TRUE);
		}
		if ($this->input->post('ma_rid',TRUE))
		{
			$data['ma_rid'] = $this->input->post('ma_rid',TRUE);
			$role = $this->db->where(array('r_id'=>$data['ma_rid']))->get('role')->row_array();
		
			$data['ma_permissionid'] = $role['r_permission'];
		}
		if ($this->input->post('ma_lastloginip',TRUE))
		{
			$data['ma_lastloginip'] = $this->input->post('ma_lastloginip',TRUE);
		}
		if ($this->input->post('ma_lastlogintime',TRUE))
		{
			$data['ma_lastlogintime'] = $this->input->post('ma_lastlogintime',TRUE);
		}
		$res = $this->db->update('manager', $data,array('ma_id'=>$id));
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