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
class Linktype extends Homebase
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('usersessionmodel','usersession',TRUE);
		$this->load->model('linktypemodel','linktype',TRUE);
		$this->load->model('logmodel','logs',TRUE);
	}

	//友情链接分类列表
	public function index()
	{
		$header['title'] = "友情链接分类管理";
		$header['keywords'] = "友情链接分类管理";
			
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'61');
		$header['version'] = require(APP_ROOT . 'config' . DIRECTORY_SEPARATOR . 'version.php');
		$header['n_name'] = $this->n_name['n_name'];
		$this->load->view('public/header',$header);
		$this->load->view('public/top');
		//$data['adminmenulist'] = $this->admininit();
		$data['act'] = 'linktypelist';
		$this->load->view('public/left',$data);
		unset($data['act']);
		$three = $this->uri->segment(3);
		if ($three==='updatesuccess')
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
						修改友情链接分类成功！
					</p>
				</div>
				<a href='.site_url(array("Linktype","index")).'><div class="return">返回列表</div></a>
			</div>
			';
		}
		elseif ($three==='delsuccess')
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
						删除友情链接分类成功！
					</p>
				</div>
				<a href='.site_url(array("Linktype","index")).'><div class="return">返回列表</div></a>
			</div>
			';
		}
		elseif ($three==='batchdelsuccess')
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
						批量删除友情链接分类成功！
					</p>
				</div>
				<a href='.site_url(array("Linktype","index")).'><div class="return">返回列表</div></a>
			</div>
			';
		}
		elseif ($three==='batchdelerror')
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
						批量删除友情链接分类失败！
					</p>
				</div>
				<a href='.site_url(array("Linktype","index")).'><div class="return">返回列表</div></a>
			</div>
			';
		}
		elseif ($three==='kong')
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
						请在要删除的友情链接分类前的方框内打勾！
					</p>
				</div>
				<a href='.site_url(array("Linktype","index")).'><div class="return">返回列表</div></a>
			</div>
			';
		}
		$data['linktypelist'] = $this->linktype->check();
		
		$data['count'] = count($data['linktypelist']);
		$this->load->view('linktype/index',$data);
		$this->load->view('public/footer');
	}

	//友情链接分类添加
	public function add()
	{
		$header['title'] = "友情链接分类添加";
		$header['keywords'] = "友情链接分类添加";
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'61');
		$header['version'] = require(APP_ROOT . 'config' . DIRECTORY_SEPARATOR . 'version.php');
		$header['n_name'] = $this->n_name['n_name'];
		$this->load->view('public/header',$header);
		$this->load->view('public/top');
		//$data['adminmenulist'] = $this->admininit();
		$data['act'] = 'addlinktype';
		$this->load->view('public/left',$data);
		unset($data['act']);
		$three = $this->uri->segment(3);

		if ($three==='addsuccess')
		{
			echo 
			'<style>
				body{overflow:hidden;}
				.notice{display:block;position:absolute;top:0;width: 100%;height:100%;background: rgba(0,0,0,0.6);z-index:100;}
				.info{position:fixed;left:50%;top:50%;width: 340px;height:200px;margin-left: -170px;margin-top: -100px;background: #fff;z-index:101;border-radius:6px;}
				.info .title{width: 100%;height: 40px;line-height:40px;text-indent:10px;font-weight:bold;font-size:14px;border-top-left-radius:5px;border-top-right-radius:5px;background: #2c6aa0;color:#fff;}
				.info .cont{width: 100%;height: 60px;}
				.info .cont p{width: 100%;height: 40px;line-height: 40px;margin-top:30px;text-align: center;}
				.info .return{float:left;width: 70px;margin-left:94px;margin-top:10px;height: 28px;line-height: 28px;font-size:12px;text-align: center;color:#fff;background: #2c6aa0;border-radius: 4px;cursor:pointer;}
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
						添加友情链接分类成功！
					</p>
				</div>
				<a href='.site_url(array("Linktype","index")).'><div class="return">返回列表</div></a>
				<a href='.site_url(array("Linktype","add")).'><div class="ok">继续添加</div></a>
			</div>
			';
		}
		



		if (IS_POST)
		{
			$this->load->library('form_validation');
			$status = $this->form_validation->run('linktype');
			$res = false;
			if ($status)
			{
				//验证通过
				$res = $this->linktype->insert_linktype();
			}
			if ($res!=false)
			{
				$username = $header['user']['ma_username'];
				$this->logs->addLog('添加友情链接分类成功！',$username);
				echo "<script>window.location.href='".site_url(array('Linktype','add','addsuccess'))."'</script>";
				exit;
			}
		}		
		$this->load->view('linktype/add');
		$this->load->view('public/footer');
	}
	
	//友情链接分类修改
	public function update()
	{
		$header['title'] = "友情链接分类修改";
		$header['keywords'] = "友情链接分类修改";
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'61');
		$header['version'] = require(APP_ROOT . 'config' . DIRECTORY_SEPARATOR . 'version.php');
		$header['n_name'] = $this->n_name['n_name'];
		$this->load->view('public/header',$header);
		$this->load->view('public/top');

		//$data['adminmenulist'] = $this->admininit();
		$data['act'] = 'updatelinktype';
		$this->load->view('public/left',$data);
		unset($data['act']);
		if (IS_POST)
		{
			$this->load->library('form_validation');
			$status = $this->form_validation->run('linktype');
			$res = false;
			if ($status)
			{
				//验证通过
				$res = $this->linktype->update_linktype();
			}
			if ($res!=false)
			{
				$username = $header['user']['ma_username'];
				$this->logs->addLog('修改友情链接分类成功！',$username,$_POST['lt_id']);
				echo "<script>window.location.href='".site_url(array('Linktype','index','updatesuccess'))."'</script>";
				//echo "<script>alert('修改友情链接分类成功！');window.location.href='".site_url('Linktype/index')."'</script>";
				exit;
			}
		}
		$id = $this->uri->segment(3);
		$data['linktype'] = $this->linktype->find_linktype($id);

		$this->load->view('linktype/update',$data);

		$this->load->view('public/footer');
	}

	//友情链接分类删除
	public function delLinktype()
	{
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'61');
		
		$id = $this->uri->segment(3);
		$condition['l_class'] = $id;
		$link = $this->db->where($condition)->get('link')->row_array();
		if ($link)
		{	
			/***********************/
			//echo "<script>alert('当前友情链接分类下存在友情链接，请先删除该分类下的友情链接！');window.location.href='".site_url(array('Linktype','index'))."'</script>";
			echo "<script>window.location.href='".site_url(array('link','index',$id,'existslink'))."'</script>";
			exit;
		}
		$status = $this->linktype->doDel($id);
		if ($status)
		{
			//删除成功
			$username = $header['user']['ma_username'];
			$this->logs->addLog('删除友情链接分类成功！',$username,$id);
			echo "<script>window.location.href='".site_url(array('linktype','index','delsuccess'))."'</script>";
			exit;
		}

	}

	//批量删除友情链接分类
	public function batchDelLinktype()
	{
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'61');
		$CheckIDs = $this->input->post('IDCheck');
		if ($CheckIDs==null)
		{
			//echo "<script>alert('请在要删除的友情链接分类前的方框内打勾！');window.history.go(-1);</script>";
			echo "<script>window.location.href='".site_url(array('linktype','index','kong'))."'</script>";
			exit;
		}
		$id = $CheckIDs[0];
		//判断当前分类下是否存在链接 存在链接则该分类不可删除

		$flag = false;
		foreach ($CheckIDs as $value)
		{
			$link = $this->db->where(array('l_class'=>$value))->get('link')->row_array();
			if ($link)
			{
				//echo "<script>alert('当前友情链接分类下存在友情链接，请先删除该分类下的友情链接！');window.location.href='".site_url('Linktype/index')."'</script>";
				//exit;
				continue;
			}
			$status = $this->linktype->doDel($value);
			if ($status&&($flag===false))
			{
				$flag = true;
			}
		}
		//删除成功
		if ($flag===true)
		{
			$username = $header['user']['ma_username'];
			$this->logs->addLog('批量删除友情链接分类成功！',$username,implode(',', $CheckIDs));
			echo "<script>window.location.href='".site_url(array('linktype','index','batchdelsuccess'))."'</script>";
			exit;
		}
		else
		{
			//echo "<script>alert('批量删除友情链接分类失败！');window.location.href='".site_url(array('linktype','index','batchdelerror'))."'</script>";
			echo "<script>window.location.href='".site_url(array('linktype','index','batchdelerror'))."'</script>";
			exit;
		}
	}
}