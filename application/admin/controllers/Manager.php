<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends Homebase
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('usersessionmodel','usersession',TRUE);
		$this->load->model('rolemodel','role',TRUE);
		$this->load->model('managermodel','manager',TRUE);
		$this->load->model('logmodel','logs',TRUE);
	}

	//管理员列表
	public function index()
	{
		$header['title'] = "管理员列表";
		$header['keywords'] = "管理员列表";
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'96');
		$header['version'] = require(APP_ROOT . 'config' . DIRECTORY_SEPARATOR . 'version.php');
		$header['n_name'] = $this->n_name['n_name'];
		$this->load->view('public/header',$header);
		$this->load->view('public/top');
		//$data['adminmenulist'] = $this->admininit();
		$data['act'] = 'managerlist';
		$this->load->view('public/left',$data);
		$where['ma_rid'] = $rid = $this->uri->segment(3)?$this->uri->segment(3):0;
		$three = $this->uri->segment(4);
		//获取角色数量
		$data['count'] = $this->db->count_all_results('manager');
		$data['managerlist'] = $this->manager->check();
		//var_dump($data['managerlist']);
		$this->load->view('manager/index',$data);
		unset($data['act']);
		if ($three === 'exists' || $three === 'zhongzhi')
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
						该角色下存在成员，请先删除成员！
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
						添加成功！
					</p>
				</div>
				<a href='.site_url(array("Manager","index",$rid)).'><div class="return">返回列表</div></a>
			</div>
			';
		}
		elseif ($three === 'chongfu')
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
						用户名已存在！
					</p>
				</div>
				<a href='.site_url(array("Manager","index",$rid)).'><div class="return">返回列表</div></a>
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
						修改成功！
					</p>
				</div>
				<a href='.site_url(array("Manager","index",$rid)).'><div class="return">返回列表</div></a>
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
						删除成功！
					</p>
				</div>
				<a href='.site_url(array("Manager","index",$rid)).'><div class="return">返回列表</div></a>
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
						批量删除成功！
					</p>
				</div>
				<a href='.site_url(array("Manager","index",$rid)).'><div class="return">返回列表</div></a>
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
				<a href='.site_url(array("Manager","index",$rid)).'><div class="return">返回列表</div></a>
			</div>
			';
		}
		


		
		$this->load->view('public/footer');
	}


	//个人信息页面
	public function personinfo()
	{
		$header['title'] = "修改个人信息";
		$header['keywords'] = "修改个人信息";
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'10');
		$header['version'] = require(APP_ROOT . 'config' . DIRECTORY_SEPARATOR . 'version.php');
		$header['n_name'] = $this->n_name['n_name'];
		$this->load->view('public/header',$header);
		$this->load->view('public/top');
		//$data['adminmenulist'] = $this->admininit();
		$this->load->view('public/left',$data);
		$three = $this->uri->segment(3);
		if ($three === 'updateinfosuccess')
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
						个人信息修改成功！
					</p>
				</div>
				<a href='.site_url(array("Manager","personinfo")).'><div class="return">返回列表</div></a>
			</div>
			';
		}
		unset($data['act']);
		if (IS_POST)
		{
			if ($this->input->post('ma_username',TRUE))
			{
				$arr['ma_username'] = $this->input->post('ma_username',TRUE);
				$manager = $this->db->where($arr)->get('manager')->row_array();
				$maid = $manager['ma_id'];
			}
			else
			{
				echo "<script>alert('管理员名称不能为空！');window.history.go(-1);</script>";
				exit;
			}
		
			if ($this->input->post('ma_password',TRUE))
			{
				if ($this->input->post('ma_password',TRUE)==$manager['ma_password'])
				{
					$arr['ma_password'] = $this->input->post('ma_password',TRUE);
				}
				else
				{
					$arr['ma_password'] = md5($this->input->post('ma_password',TRUE));
				}
			}

			if ($this->input->post('ma_email',TRUE))
			{
				$arr['ma_email'] = $this->input->post('ma_email',TRUE);
			}
			$res = $this->db->update('manager', $arr,array('ma_id'=>$maid));
			if ($res)
			{
				$username = $header['user']['ma_username'];
				$this->logs->addLog('个人信息修改成功！',$username);
				//echo "<script>alert('个人信息修改成功！');window.location.href='".site_url('Manager/personinfo')."';</script>";
				echo "<script>window.location.href='".site_url(array('Manager','personinfo','updateinfosuccess'))."';</script>";
				exit;
			}
		}
		//获取个人信息
		if ($header['user']['ma_username']!='root')
		{
			$condition['ma_username'] = $header['user']['ma_username'];
			$data['personinfo'] = $this->db->where($condition)->get('manager')->row_array();
		}
		else
		{
			echo "<script>alert('该管理员信息不可修改！');window.history.go(-1);</script>";
			exit;
		}
		
		$this->load->view('manager/personinfo',$data);
		$this->load->view('public/footer');
	}

	//管理员添加页面
	public function add()
	{
		$header['title'] = "添加管理员";
		$header['keywords'] = "添加管理员";
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'97');
		$header['version'] = require(APP_ROOT . 'config' . DIRECTORY_SEPARATOR . 'version.php');
		$header['n_name'] = $this->n_name['n_name'];
		$this->load->view('public/header',$header);
		$this->load->view('public/top');
		//$data['adminmenulist'] = $this->admininit();
		$data['act'] = 'manageradd';
		$this->load->view('public/left',$data);
		unset($data['act']);
		if (IS_POST)
		{
			$this->doAdd();
		}
		//获取角色列表
		$data['rolelist'] = $this->role->check();
		$this->load->view('manager/add',$data);
		$this->load->view('public/footer');
	}

	//管理员修改
	public function update()
	{
		$header['title'] = "修改管理员";
		$header['keywords'] = "修改管理员";
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'98');
		$header['version'] = require(APP_ROOT . 'config' . DIRECTORY_SEPARATOR . 'version.php');
		$header['n_name'] = $this->n_name['n_name'];
		$this->load->view('public/header',$header);
		$this->load->view('public/top');
		//$data['adminmenulist'] = $this->admininit();
		$data['act'] = 'managerupdate';
		$this->load->view('public/left',$data);
		unset($data['act']);
		if (IS_POST)
		{
			$this->doUpdate();
		}
		//获取管理员信息
		$maid = $this->uri->segment(3);
		$data['manager'] = $this->manager->find_manager($maid);
		//获取角色列表
		$data['rolelist'] = $this->role->check();
		$this->load->view('manager/update',$data);
		$this->load->view('public/footer');
	}

	//处理添加
	public function doAdd()
	{
		$this->load->library('form_validation');
			$status = $this->form_validation->run('manager');
			if ($status)
			{
				//检查管理员是否重名
				$info['ma_username'] = $_POST['ma_username'];
				$rid = $this->input->post('ma_rid')?$this->input->post('ma_rid'):0;
				$m = $this->db->where($info)->get('manager')->row_array();
				if (!empty($m))
				{
					//echo "<script>alert('该用户名已存在！');window.location.href='".site_url('Manager/index/')."'</script>";
					echo "<script>window.location.href='".site_url(array('Manager','index',$rid,'chongfu'))."'</script>";
					exit;
				}
				//验证通过
				$res = $this->manager->insert_manager();
			}
			if ($res)
			{
				$username = $header['user']['ma_username'];
				$this->logs->addLog('添加管理员成功！',$username);
				echo "<script>window.location.href='".site_url(array('Manager','index',$rid,'addsuccess'))."'</script>";
				exit;
			}
	}

	//处理修改
	public function doUpdate()
	{
		$this->load->library('form_validation');
		$status = $this->form_validation->run('manager');
		$rid = $this->input->post('ma_rid')?$this->input->post('ma_rid'):0;
		if ($status)
		{
			//验证通过
			$maid = $this->input->post('maid');
			$res = $this->manager->update_manager($maid);
		}
		if ($res)
		{
			$username = $header['user']['ma_username'];
			$this->logs->addLog('修改管理员成功！',$username,$maid);
			//echo "<script>alert('修改管理员成功！');window.location.href='".site_url('Manager/index/')."'</script>";
			echo "<script>window.location.href='".site_url(array('Manager','index',$rid,'updatesuccess'))."'</script>";
			exit;
		}
	}

	//删除
	public function delManager()
	{
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'99');
		$maid = $this->uri->segment(3);	
		$manager = $this->db->where('ma_id',$maid)->get('manager')->row_array();
		$rid = $manager['ma_rid'];
		$status = $this->doDel($maid);
		
		if ($status)
		{
			//删除成功
			$username = $header['user']['ma_username'];
			$this->logs->addLog('修改管理员成功！',$username,$maid);
			echo "<script>window.location.href='".site_url(array('manager','index',$rid,'delsuccess'))."'</script>";
			exit;
		}
		else
		{
			//删除失败
			echo "<script>alert('删除管理员成功！');window.location.href='".site_url('manager/index/')."'</script>";
			exit;
		}
	}

	//批量删除
	public function batchDelManager()
	{
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'99');
		$CheckIDs = $this->input->post('IDCheck');
		if ($CheckIDs==null)
		{
			//echo "<script>alert('请在要删除的角色前的方框内打勾！');window.history.go(-1);</script>";
			echo "<script>window.location.href='".site_url(array('manager','index',0,'kong'))."'</script>";
			exit;
		}
		$flag = false;
		foreach ($CheckIDs as $value)
		{
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
			$this->logs->addLog('批量删除管理员成功！',$username,implode(',',$CheckIDs));
			//echo "<script>alert('批量删除管理员成功！');window.location.href='".site_url('Manager/index/')."'</script>";
			echo "<script>window.location.href='".site_url(array('manager','index',0,'batchdelsuccess'))."'</script>";
			exit;
		}
		else
		{
			echo "<script>alert('批量删除管理员失败！');window.location.href='".site_url('Manager/index/')."'</script>";
			exit;
		}
	}

	//处理删除
	public function doDel($maid)
	{
		//查询角色
		$manager = $this->manager->find_manager($maid);
		$res = $this->db->delete('manager', array('ma_id' => $maid));
		return $res;
	}


}