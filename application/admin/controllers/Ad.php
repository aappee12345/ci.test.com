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
class Ad extends Homebase
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('usersessionmodel','usersession',TRUE);
		$this->load->model('logmodel','logs',TRUE);
		$this->load->model('admodel','ad',TRUE);
	}

	//广告位列表
	public function index()
	{
		$header['title'] = "广告位管理";
		$header['keywords'] = "广告位管理";
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'41');
		$header['version'] = require(APP_ROOT . 'config' . DIRECTORY_SEPARATOR . 'version.php');

		$header['n_name'] = $this->n_name['n_name']; 
		$this->load->view('public/header',$header);
		$this->load->view('public/top');

		//$data['adminmenulist'] = $this->admininit();
		$data['act'] = 'adlist';
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
				.info .return{float:left;width: 70px;margin-left:94px;margin-top:10px;height: 28px;line-height: 28px;font-size:14px;text-align: center;color:#fff;background: #2c6aa0;border-radius: 4px;cursor:pointer;}
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
						添加广告位成功！
					</p>
				</div>

				<a href='.site_url(array("Ad","index")).'><div class="return">返回列表</div></a>
				<a href='.site_url(array("Ad","add")).'><div class="ok">继续添加</div></a>
			</div>
			';
        }
        elseif ($three==='updatesuccess')
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
						修改广告位成功！
					</p>
				</div>

				<a href='.site_url(array("Ad","index")).'><div class="return">返回列表</div></a>
			</div>
			';
        }
        elseif ($three=='delsuccess')
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
						删除广告位成功！
					</p>
				</div>

				<a href='.site_url(array("Ad","index")).'><div class="return">返回列表</div></a>
			</div>
			';
        }
        elseif ($three=='batchdelsuccess')
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
						批量删除广告位成功！
					</p>
				</div>

				<a href='.site_url(array("Ad","index")).'><div class="return">返回列表</div></a>
			</div>
			';
        }
        elseif ($three=='batchdelerror')
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
						批量删除广告位中止！
					</p>
				</div>

				<a href='.site_url(array("Ad","index")).'><div class="return">返回列表</div></a>
			</div>
			';
        }
        elseif ($three=='kong')
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
						请在要删除的广告位前的方框内打勾！
					</p>
				</div>

				<a href='.site_url(array("Ad","index")).'><div class="return">返回列表</div></a>
			</div>
			';
        }
        
		$data['adlist'] = $this->ad->check();
		$data['count'] = count($data['adlist']);
		$this->load->view('ad/index',$data);
		$this->load->view('public/footer');

	}

	//广告位添加
	public function add()
	{
		$header['title'] = "广告位添加";
		$header['keywords'] = "广告位添加";
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'42');
		$header['version'] = require(APP_ROOT . 'config' . DIRECTORY_SEPARATOR . 'version.php');
		$header['n_name'] = $this->n_name['n_name']; 
		$this->load->view('public/header',$header);
		$this->load->view('public/top');
		//$data['adminmenulist'] = $this->admininit();
		$data['act'] = 'addad';
		$this->load->view('public/left',$data);
		unset($data['act']);
		if (IS_POST)
		{
			$this->load->library('form_validation');
			$status = $this->form_validation->run('ad');
			$res = false;
			if ($status)
			{
				//验证通过
				$res = $this->ad->insert_ad();
			}

			if ($res!==false)
			{
				$username = $header['user']['ma_username'];
				$this->logs->addLog('添加广告位成功！',$username);
				echo "<script>window.location.href='".site_url(array('Ad','index','addsuccess'))."'</script>";
				exit;
			}
		}
				
		$this->load->view('ad/add');
		$this->load->view('public/footer');
	}

	//广告位修改
	public function update()
	{
		$header['title'] = "广告位修改";
		$header['keywords'] = "广告位修改";
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'43');
		$header['version'] = require(APP_ROOT . 'config' . DIRECTORY_SEPARATOR . 'version.php');
		$header['n_name'] = $this->n_name['n_name']; 
		$this->load->view('public/header',$header);
		$this->load->view('public/top');
		//$data['adminmenulist'] = $this->admininit();
		$data['act'] = 'updatead';
		$this->load->view('public/left',$data);
		unset($data['act']);

		if (IS_POST)
		{
			$this->load->library('form_validation');
			$status = $this->form_validation->run('ad');
			$res = false;
			if ($status)
			{
				//验证通过
				$id = $this->input->post('ad_id');
				$res = $this->ad->update_ad($id);
			}

			if ($res!==false)
			{
				$username = $header['user']['ma_username'];
				$this->logs->addLog('修改广告位成功！',$username,$id);
				echo "<script>window.location.href='".site_url(array('Ad','index','updatesuccess'))."'</script>";
				exit;
			}
		}
		$id = $this->uri->segment(3);
		$data['ad'] = $this->ad->find_ad($id);
		$this->load->view('ad/update',$data);
		$this->load->view('public/footer');
	}


	//广告位删除
	public function delAd()
	{
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'44');
		$header['n_name'] = $this->n_name['n_name']; 
		$id = $this->uri->segment(3);
		//判断当前广告位下是否存在广告
		$guanggao = $this->db->where(array('g_ad_id'=>$id))->get('guanggao')->row_array();
		if ($guanggao)
		{
			echo "<script>window.location.href='".site_url(array('guanggao','index',$id,'exists'))."'</script>";
			exit;
		}
		$res = $this->ad->doDel($id);
		if ($res)
		{
			$username = $header['user']['ma_username'];
			$this->logs->addLog('删除广告位成功！',$username,$id);
			echo "<script>window.location.href='".site_url(array('Ad','index','delsuccess'))."'</script>";
			exit;
		}
	}

	/**
	  * 批量删除广告位
      */
	public function batchDelAd()
	{
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'44');
		$CheckIDs = $this->input->post('IDCheck');
		if ($CheckIDs==null)
		{
			echo "<script>window.location.href='".site_url(array("Ad","index","kong"))."'</script>";
			exit;
		}
		$flag = false;
		foreach ($CheckIDs as $value)
		{
			$status = $this->ad->doDel($value);
			if ($status&&($flag===false))
			{
				$flag = true;
			}
		}
		//删除成功
		if ($flag===true)
		{
			$this->logs->addLog('批量删除广告位成功！',$username,implode(',', $CheckIDs));
			echo "<script>window.location.href='".site_url(array('ad','index','batchdelsuccess'))."'</script>";
			exit;
		}
		else
		{
			echo "<script>window.location.href='".site_url(array('ad','index','batchdelerror'))."'</script>";
			exit;
		}
	}

	/*ajax修改排序*/
	public function ajaxsort()
	{
		if (IS_AJAX)
		{
			$arr['ad_id'] = $this->input->post('id');
			$arr['ad_sort'] = $this->input->post('sort');
			//查询当前选择分类的子分类
			$res = $this->ad->ajaxupdate_sort($arr);
			if ($res)
			{
				echo json_encode($res);
			}
			else
			{
				echo json_encode($res);
			}
			
		}
	}
}