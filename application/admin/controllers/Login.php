<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
class FIRST_Controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('adminnavmodel','adminnav',TRUE);
	}

	public function admininit()
	{
		
		$res = $this->adminnav->check();
		return $res;
	}
	
}
*/
class Login extends Homebase
{
	public function __construct()
	{
		parent::__construct();
		//$this->load->library('session');
		$this->load->model('managermodel','manager',TRUE);
		$this->load->model('usersessionmodel','usersession',TRUE);
		$this->load->model('logmodel','logs',TRUE);
	}

	public function index()
	{
		$header['title'] = "后台登录";
		$header['keywords'] = "后台登录";
		//检测是否已经登录
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->findsession();
		if ($header['user']['ma_username'])
		{
			echo "<script>window.location.href='".site_url('Main/index')."'</script>";
			exit;
		}
		$this->load->view('login/index',$header);
	}

	public function doLogin()
	{
		$ma_username = $this->input->post('ma_username');
		$ma_password = $this->input->post('ma_password');
	
		//判断账号密码是否正确
		$data['ma_username'] = $ma_username;
		$data['ma_password'] = md5($ma_password);
		$manager = $this->manager->checkManager($data);
		if (!empty($manager))
		{
			//将SESSION存入数据库

			$usersession = array(
			    'ma_username'      => $manager[0]['ma_username'],
			    'ma_permissionid'  => '10,'.$manager[0]['ma_permissionid']
			);
			$this->session->unset_userdata('ma_username');
			$this->session->unset_userdata('ma_permissionid');
			$this->session->set_userdata($usersession);
		}
		
	
		$user = $this->session->all_userdata();
		//将IP time写入manager表
		$_POST['ma_lastloginip'] = ip2long($_SERVER['REMOTE_ADDR']);
		$_POST['ma_lastlogintime'] = time();
		$maid = $manager[0]['ma_id'];
		$this->manager->update_manager($maid);

		if ($user['ma_username']!='')
		{
			//登录成功
			$username = $user['ma_username'];
			$this->logs->addLog('登录成功',$username);
			echo "<script>window.location.href='".site_url('Main/index')."'</script>";
		}
		else
		{
			echo "<script>alert('用户名或密码不正确！');window.location.href='".site_url('Login/index')."'</script>";
		}
	}

	//退出登录
	public function loginOut()
	{
		$this->usersession->remove_usersession();
	}
}