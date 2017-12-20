<?php
class Usersessionmodel extends CI_Model
{
	public $id;
	public $ma_username;
	public $ma_permission;

	public function findsession()
	{
		$usersession = $this->session->all_userdata();
		return $usersession;
	}
	//查询session
	public function check($arr,$p)
	{
		
		//$usersession = $this->db->where($arr)->get('usersession')->row_array();
		$usersession = $this->session->all_userdata();
		//var_dump($usersession);exit;
		if ($usersession['ma_username']!='')
		{
			$arr = 'login';
		}
		else
		{
			$arr = 'nologin';
		}
		if ($arr === 'nologin')
		{
			//没有权限
			echo "<script>window.location.href='".site_url('/Login/index')."';</script>";
			exit;
		}
		elseif ($arr === 'login')
		{
			//已登录 检查权限
			if ($usersession['ma_permissionid']=='10,1'||$usersession['ma_permissionid']=='10,root'||in_array($p,explode(',', $usersession['ma_permissionid'])))
			{
				//有权限

				return $usersession;
			}
			else
			{
				//没有权限
				echo "<script>alert('暂无权限！');window.history.go(-1);</script>";
				exit;
			}
		}
	}

	//保存session
	/*
	public function set_usersession($usersession)
	{
		$res = $this->db->insert('usersession', $usersession);
		return $res;
	}
	*/

	//清除session
	public function remove_usersession()
	{
		$this->session->unset_userdata('ma_username');
		$this->session->unset_userdata('ma_permissionid');
		echo "<script>window.location.href='".site_url('Login/index')."';</script>";
		exit;

	}
}