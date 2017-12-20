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
class Role extends Homebase
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('usersessionmodel','usersession',TRUE);
		$this->load->model('rolemodel','role',TRUE);
		$this->load->model('managermodel','manager',TRUE);
		$this->load->model('logmodel','logs',TRUE);
	}

	//角色列表页
	public function index()
	{
		$header['title'] = "角色列表";
		$header['keywords'] = "角色列表";
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'91');
		$header['version'] = require(APP_ROOT . 'config' . DIRECTORY_SEPARATOR . 'version.php');
		$header['n_name'] = $this->n_name['n_name'];
		$this->load->view('public/header',$header);
		$this->load->view('public/top');
		//$data['adminmenulist'] = $this->admininit();
		$data['act'] = 'rolelist';
		$this->load->view('public/left',$data);
		unset($data['act']);
		$three = $this->uri->segment(3);
		if ($three === 'updateauthsuccess')
		{
			echo 
			'<style>
				body{overflow:hidden;}
				.notice{display:block;position:absolute;top:0;width: 100%;height:100%;background: rgba(0,0,0,0.6);z-index:100;}
				.info{position:fixed;left:50%;top:50%;width: 340px;height:200px;margin-left: -170px;margin-top: -100px;background: #fff;z-index:101;border-radius:6px;}
				.info .title{width: 100%;height: 40px;line-height:40px;text-indent:10px;font-weight:bold;font-size:14px;border-top-left-radius:5px;border-top-right-radius:5px;background: #2c6aa0;color:#fff;}
				.info .cont{width: 100%;height: 60px;}
				.info .cont p{width: 100%;height: 40px;line-height: 40px;margin-top:30px;text-align: center;}
				.info .return{width: 80px;margin:auto;height: 32px;line-height: 32px;font-size:14px;text-align: center;color:#fff;background: #2c6aa0;border-radius: 4px;cursor:pointer;}
				.info .ok{float:left;width: 70px;margin-left:10px;margin-top:10px;height: 28px;line-height: 28px;font-size:12px;text-align: center;color:#fff;background: #2c6aa0;border-radius: 4px;cursor:pointer;}
			</style>
			<div class="notice">
				
			</div>
			<div class="info">
				<div class="title">
					提示
				</div>
				<div class="cont">
					<p>
						操作成功！
					</p>
				</div>

				<a href='.site_url(array("Role","index")).'><div class="return">返回列表</div></a>
			</div>
			';
		}
		elseif ($three === 'addsuccess')
		{
			echo 
			'<style>
				body{overflow:hidden;}
				.notice{display:block;position:absolute;top:0;width: 100%;height:100%;background: rgba(0,0,0,0.6);z-index:100;}
				.info{position:fixed;left:50%;top:50%;width: 340px;height:200px;margin-left: -170px;margin-top: -100px;background: #fff;z-index:101;border-radius:6px;}
				.info .title{width: 100%;height: 40px;line-height:40px;text-indent:10px;font-weight:bold;font-size:14px;border-top-left-radius:5px;border-top-right-radius:5px;background: #2c6aa0;color:#fff;}
				.info .cont{width: 100%;height: 60px;}
				.info .cont p{width: 100%;height: 40px;line-height: 40px;margin-top:30px;text-align: center;}
				.info .return{width: 80px;margin:auto;height: 32px;line-height: 32px;font-size:14px;text-align: center;color:#fff;background: #2c6aa0;border-radius: 4px;cursor:pointer;}
				.info .ok{float:left;width: 70px;margin-left:10px;margin-top:10px;height: 28px;line-height: 28px;font-size:12px;text-align: center;color:#fff;background: #2c6aa0;border-radius: 4px;cursor:pointer;}
			</style>
			<div class="notice">
				
			</div>
			<div class="info">
				<div class="title">
					提示
				</div>
				<div class="cont">
					<p>
						添加角色成功！
					</p>
				</div>
				<a href='.site_url(array("Role","index")).'><div class="return">返回列表</div></a>
			</div>
			';
		}
		elseif ($three === 'updatesuccess')
		{
			echo 
			'<style>
				body{overflow:hidden;}
				.notice{display:block;position:absolute;top:0;width: 100%;height:100%;background: rgba(0,0,0,0.6);z-index:100;}
				.info{position:fixed;left:50%;top:50%;width: 340px;height:200px;margin-left: -170px;margin-top: -100px;background: #fff;z-index:101;border-radius:6px;}
				.info .title{width: 100%;height: 40px;line-height:40px;text-indent:10px;font-weight:bold;font-size:14px;border-top-left-radius:5px;border-top-right-radius:5px;background: #2c6aa0;color:#fff;}
				.info .cont{width: 100%;height: 60px;}
				.info .cont p{width: 100%;height: 40px;line-height: 40px;margin-top:30px;text-align: center;}
				.info .return{width: 80px;margin:auto;height: 32px;line-height: 32px;font-size:14px;text-align: center;color:#fff;background: #2c6aa0;border-radius: 4px;cursor:pointer;}
				.info .ok{float:left;width: 70px;margin-left:10px;margin-top:10px;height: 28px;line-height: 28px;font-size:12px;text-align: center;color:#fff;background: #2c6aa0;border-radius: 4px;cursor:pointer;}
			</style>
			<div class="notice">
				
			</div>
			<div class="info">
				<div class="title">
					提示
				</div>
				<div class="cont">
					<p>
						修改角色成功！
					</p>
				</div>
				<a href='.site_url(array("Role","index")).'><div class="return">返回列表</div></a>
			</div>
			';
		}
		elseif ($three === 'delsuccess')
		{
			echo 
			'<style>
				body{overflow:hidden;}
				.notice{display:block;position:absolute;top:0;width: 100%;height:100%;background: rgba(0,0,0,0.6);z-index:100;}
				.info{position:fixed;left:50%;top:50%;width: 340px;height:200px;margin-left: -170px;margin-top: -100px;background: #fff;z-index:101;border-radius:6px;}
				.info .title{width: 100%;height: 40px;line-height:40px;text-indent:10px;font-weight:bold;font-size:14px;border-top-left-radius:5px;border-top-right-radius:5px;background: #2c6aa0;color:#fff;}
				.info .cont{width: 100%;height: 60px;}
				.info .cont p{width: 100%;height: 40px;line-height: 40px;margin-top:30px;text-align: center;}
				.info .return{width: 80px;margin:auto;height: 32px;line-height: 32px;font-size:14px;text-align: center;color:#fff;background: #2c6aa0;border-radius: 4px;cursor:pointer;}
				.info .ok{float:left;width: 70px;margin-left:10px;margin-top:10px;height: 28px;line-height: 28px;font-size:12px;text-align: center;color:#fff;background: #2c6aa0;border-radius: 4px;cursor:pointer;}
			</style>
			<div class="notice">
				
			</div>
			<div class="info">
				<div class="title">
					提示
				</div>
				<div class="cont">
					<p>
						删除角色成功！
					</p>
				</div>
				<a href='.site_url(array("Role","index")).'><div class="return">返回列表</div></a>
			</div>
			';
		}
		elseif ($three === 'kong')
		{
			echo 
			'<style>
				body{overflow:hidden;}
				.notice{display:block;position:absolute;top:0;width: 100%;height:100%;background: rgba(0,0,0,0.6);z-index:100;}
				.info{position:fixed;left:50%;top:50%;width: 340px;height:200px;margin-left: -170px;margin-top: -100px;background: #fff;z-index:101;border-radius:6px;}
				.info .title{width: 100%;height: 40px;line-height:40px;text-indent:10px;font-weight:bold;font-size:14px;border-top-left-radius:5px;border-top-right-radius:5px;background: #2c6aa0;color:#fff;}
				.info .cont{width: 100%;height: 60px;}
				.info .cont p{width: 100%;height: 40px;line-height: 40px;margin-top:30px;text-align: center;}
				.info .return{width: 80px;margin:auto;height: 32px;line-height: 32px;font-size:14px;text-align: center;color:#fff;background: #2c6aa0;border-radius: 4px;cursor:pointer;}
				.info .ok{float:left;width: 70px;margin-left:10px;margin-top:10px;height: 28px;line-height: 28px;font-size:12px;text-align: center;color:#fff;background: #2c6aa0;border-radius: 4px;cursor:pointer;}
			</style>
			<div class="notice">
				
			</div>
			<div class="info">
				<div class="title">
					提示
				</div>
				<div class="cont">
					<p>
						请在要删除的角色前的方框内打勾！
					</p>
				</div>
				<a href='.site_url(array("Role","index")).'><div class="return">返回列表</div></a>
			</div>
			';
		}
		elseif ($three === 'batchdelsuccess')
		{
			echo 
			'<style>
				body{overflow:hidden;}
				.notice{display:block;position:absolute;top:0;width: 100%;height:100%;background: rgba(0,0,0,0.6);z-index:100;}
				.info{position:fixed;left:50%;top:50%;width: 340px;height:200px;margin-left: -170px;margin-top: -100px;background: #fff;z-index:101;border-radius:6px;}
				.info .title{width: 100%;height: 40px;line-height:40px;text-indent:10px;font-weight:bold;font-size:14px;border-top-left-radius:5px;border-top-right-radius:5px;background: #2c6aa0;color:#fff;}
				.info .cont{width: 100%;height: 60px;}
				.info .cont p{width: 100%;height: 40px;line-height: 40px;margin-top:30px;text-align: center;}
				.info .return{width: 80px;margin:auto;height: 32px;line-height: 32px;font-size:14px;text-align: center;color:#fff;background: #2c6aa0;border-radius: 4px;cursor:pointer;}
				.info .ok{float:left;width: 70px;margin-left:10px;margin-top:10px;height: 28px;line-height: 28px;font-size:12px;text-align: center;color:#fff;background: #2c6aa0;border-radius: 4px;cursor:pointer;}
			</style>
			<div class="notice">
				
			</div>
			<div class="info">
				<div class="title">
					提示
				</div>
				<div class="cont">
					<p>
						批量删除角色成功！
					</p>
				</div>
				<a href='.site_url(array("Role","index")).'><div class="return">返回列表</div></a>
			</div>
			';
		}
		elseif ($three === 'batchdelerror')
		{
			echo 
			'<style>
				body{overflow:hidden;}
				.notice{display:block;position:absolute;top:0;width: 100%;height:100%;background: rgba(0,0,0,0.6);z-index:100;}
				.info{position:fixed;left:50%;top:50%;width: 340px;height:200px;margin-left: -170px;margin-top: -100px;background: #fff;z-index:101;border-radius:6px;}
				.info .title{width: 100%;height: 40px;line-height:40px;text-indent:10px;font-weight:bold;font-size:14px;border-top-left-radius:5px;border-top-right-radius:5px;background: #2c6aa0;color:#fff;}
				.info .cont{width: 100%;height: 60px;}
				.info .cont p{width: 100%;height: 40px;line-height: 40px;margin-top:30px;text-align: center;}
				.info .return{width: 80px;margin:auto;height: 32px;line-height: 32px;font-size:14px;text-align: center;color:#fff;background: #2c6aa0;border-radius: 4px;cursor:pointer;}
				.info .ok{float:left;width: 70px;margin-left:10px;margin-top:10px;height: 28px;line-height: 28px;font-size:12px;text-align: center;color:#fff;background: #2c6aa0;border-radius: 4px;cursor:pointer;}
			</style>
			<div class="notice">
				
			</div>
			<div class="info">
				<div class="title">
					提示
				</div>
				<div class="cont">
					<p>
						批量删除角色失败！
					</p>
				</div>
				<a href='.site_url(array("Role","index")).'><div class="return">返回列表</div></a>
			</div>
			';
		}
		
		//获取角色数量
		$data['count'] = $this->db->count_all_results('role');
		$data['rolelist'] = $this->role->check();
		$this->load->view('role/index',$data);
		$this->load->view('public/footer');
	}

	//角色权限页面
	public function auth()
	{
		$header['title'] = "角色权限";
		$header['keywords'] = "角色权限";
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'95');
		$header['version'] = require(APP_ROOT . 'config' . DIRECTORY_SEPARATOR . 'version.php');
		$header['n_name'] = $this->n_name['n_name'];
		$this->load->view('public/header',$header);
		$this->load->view('public/top');
		//$data['adminmenulist'] = $this->admininit();
		$data['act'] = 'rolelist';
		$this->load->view('public/left',$data);
		unset($data['act']);
		//获取角色数量
		if (IS_POST)
		{
			//处理权限设置
			$rid = $this->input->post('rid');
			if ($_POST['PID']==NULL)
			{
				$_POST['r_permission'] = '';
			}
			else
			{
				$_POST['r_permission'] = implode(',',$_POST['PID']);
			}
			
			unset($_POST['PID']);
			//var_dump($_POST);exit;
			$res = $this->role->update_role($rid);
			if ($res)
			{
				$username = $header['user']['ma_username'];
				$this->logs->addLog('角色权限操作成功！',$username);
				echo "<script>window.location.href='".site_url(array('role','index','updateauthsuccess'))."'</script>";
				exit;
			}
		}
		$id = $this->uri->segment(3);
		$role = $this->role->find_role($id);
		$data['rid'] = $role['r_id'];
		$data['auth'] = explode(',', $role['r_permission']);

		$this->load->view('role/auth',$data);
		$this->load->view('public/footer');
	}

	//添加角色
	public function add()
	{
		$header['title'] = "添加角色";
		$header['keywords'] = "添加角色";
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'92');
		$header['version'] = require(APP_ROOT . 'config' . DIRECTORY_SEPARATOR . 'version.php');
		$header['n_name'] = $this->n_name['n_name'];
		$this->load->view('public/header',$header);
		$this->load->view('public/top');
		if (IS_POST)
		{
			//进行分类添加处理
			//表单验证
			$this->load->library('form_validation');
			$res = false;
			$status = $this->form_validation->run('role');
			if ($status)
			{
				$res = $this->role->insert_role();
			}
			if ($res)
			{
				$username = $header['user']['ma_username'];
				$this->logs->addLog('添加角色成功！',$username);
				echo "<script>window.location.href='".site_url(array('role','index','addsuccess'))."'</script>";
				exit;
			}
		}
		//$data['adminmenulist'] = $this->admininit();
	
		$data['act'] = 'addrole';
		$this->load->view('public/left',$data);
		unset($data['act']);
		$this->load->view('role/add',$data);
		$this->load->view('public/footer');
	}

	

	/**
	  *修改角色
      *
      */
	public function update()
	{
		$header['title'] = "修改角色";
		$header['keywords'] = "修改角色";
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'93');
		$header['version'] = require(APP_ROOT . 'config' . DIRECTORY_SEPARATOR . 'version.php');
		$header['n_name'] = $this->n_name['n_name'];
		$this->load->view('public/header',$header);
		$this->load->view('public/top');
		$data['r_id'] = $rid = $this->uri->segment(3);
		if (IS_POST)
		{
			//获取要修改的角色ID
			$rid = $this->input->post('rid');
			$this->load->library('form_validation');
			$res = false;
			$status = $this->form_validation->run('role');
			if ($status)
			{
				
				$res = $this->role->update_role($rid);
				if ($res)
				{
					$username = $header['user']['ma_username'];
					$this->logs->addLog('修改角色成功！',$username,$rid);
					echo "<script>window.location.href='".site_url(array('role','index','updatesuccess'))."'</script>";
					exit;
				}
				else
				{
					echo "<script>alert('修改角色失败！');window.location.href='".site_url('role/update/'.$cid)."'</script>";
					exit;
				}
			}
		}
		//$data['adminmenulist'] = $this->admininit();
		$data['act'] = 'updaterole';
		$data['role'] = $this->role->find_role($rid);
		$this->load->view('public/left',$data);
		unset($data['act']);
		$this->load->view('role/update',$data);
		$this->load->view('public/footer');
	}

	/**
	  * 删除角色
      * @param int $rid删除的角色ID;
      */
	public function delRole($rid)
	{
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'94');
		$offset = $this->uri->segment(4);
		//查看是否存在成员
		$manager = $this->db->where(array('ma_rid'=>$rid))->get('manager')->row_array();
		if (!empty($manager))
		{
			//echo "<script>alert('该角色下存在成员，请先删除成员！');window.location.href='".site_url('manager/index/'.$rid)."'</script>";
			echo "<script>window.location.href='".site_url(array('manager','index',$rid,'exists'))."'</script>";
			exit;
		}
		$status = $this->doDel($rid);
		
		if ($status)
		{
			//删除成功
			$username = $header['user']['ma_username'];
			$this->logs->addLog('删除角色成功！',$username,$rid);
			//echo "<script>alert('删除角色成功！');window.location.href='".site_url('role/index/')."'</script>";
			echo "<script>window.location.href='".site_url(array('role','index','delsuccess'))."'</script>";
			exit;
		}
		else
		{
			//删除失败
			echo "<script>alert('删除角色失败！');window.location.href='".site_url('role/index/')."'</script>";
			exit;
		}
	}

	/**
	  * 批量删除角色
      * @param int $rid删除的角色ID;
      */
	public function batchDelRole()
	{
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'94');
		$offset = $this->input->post('offset');
		$CheckIDs = $this->input->post('IDCheck');
		if ($CheckIDs==null)
		{
			//echo "<script>alert('请在要删除的角色前的方框内打勾！');window.history.go(-1);</script>";
			echo "<script>window.location.href='".site_url(array('role','index','kong'))."'</script>";
			exit;
		}
		$flag = false;
		foreach ($CheckIDs as $value)
		{
			$manager = $this->db->where(array('ma_rid'=>$value))->get('manager')->row_array();
			if (!empty($manager))
			{
				$role = $this->db->where(array('r_id'=>$value))->get('role')->row_array();
				//echo "<script>alert('删除被中止，".$role['r_name']."角色下存在成员，请先删除成员！');window.location.href='".site_url('manager/index/'.$role['r_id'])."'</script>";
				echo "<script>window.location.href='".site_url(array('Manager','index',$role['r_id'],'zhongzhi'))."'</script>";
				exit;
			}
			$status = $this->doDel($value);
			if ($status&&($flag===false))
			{
				$flag = true;
			}
		}
		//删除成功
		if ($flag===true)
		{
			$username = $header['user']['ma_username'];
			$this->logs->addLog('批量删除角色成功！',$username,implode(',',$CheckIDs));
			echo "<script>window.location.href='".site_url(array('Role','index','batchdelsuccess'))."'</script>";
			exit;
		}
		else
		{
			echo "<script>window.location.href='".site_url(array('role','index','batchdelerror'))."'</script>";
			exit;
		}
		
	}

	/**
	  * 处理删除角色 
      * @param int $rid删除的角色ID;
      */
	public function doDel($rid)
	{
		//查询角色
		$cate = $this->role->find_role($rid);
		$res = $this->db->delete('role', array('r_id' => $rid));
		return $res;
	}



	
}