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
class Guestbook extends Homebase
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('usersessionmodel','usersession',TRUE);
		$this->load->model('guestbookmodel','guestbook',TRUE);
		$this->load->model('logmodel','logs',TRUE);
	}

	//其他内容列表
	public function index()
	{
		$header['title'] = "留言列表";
		$header['keywords'] = "留言列表";
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'81');
		$header['version'] = require(APP_ROOT . 'config' . DIRECTORY_SEPARATOR . 'version.php');
		$header['n_name'] = $this->n_name['n_name'];
		$this->load->view('public/header',$header);
		$this->load->view('public/top');
		//$data['adminmenulist'] = $this->admininit();
		$data['act'] = 'guestlist';
		$this->load->view('public/left',$data);
		unset($data['act']);
		$three = $this->uri->segment(3);
		if ($three === 'updatesuccess')
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
				<a href='.site_url(array("Guestbook","index")).'><div class="return">返回列表</div></a>
			</div>
			';
		}
		elseif ($three === 'updateerror')
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
						审核出错了，请稍后再试！
					</p>
				</div>

				<a href='.site_url(array("Guestbook","index")).'><div class="return">返回列表</div></a>
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

				<a href='.site_url(array("Guestbook","index")).'><div class="return">返回列表</div></a>
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
						批量删除留言成功！
					</p>
				</div>

				<a href='.site_url(array("Guestbook","index")).'><div class="return">返回列表</div></a>
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
						批量删除成功！
					</p>
				</div>

				<a href='.site_url(array("Guestbook","index")).'><div class="return">返回列表</div></a>
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
						请在要删除的留言记录前的方框内打勾！
					</p>
				</div>

				<a href='.site_url(array("Guestbook","index")).'><div class="return">返回列表</div></a>
			</div>
			';
		}
		$this->load->library('pagination');
		$perPage = 15;
		$config['base_url'] = site_url('guestbook/index');
		$config['total_rows'] = $data['count'] = $this->db->count_all_results('guestbook');
		$config['per_page'] = $perPage;
		$config['uri_segment'] = 3;

		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();
		
		$offset = $this->uri->segment(3);
		$this->db->limit($perPage,$offset);
		$condition = array();
		$data['offset'] = $offset?$offset:0;
		$data['guestbooklist'] = $this->guestbook->check();
		$this->load->view('guestbook/index',$data);
		$this->load->view('public/footer');
	}

	//审核留言
	public function update()
	{
		$header['title'] = "审核留言";
		$header['keywords'] = "审核留言";
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'82');
		$header['version'] = require(APP_ROOT . 'config' . DIRECTORY_SEPARATOR . 'version.php');
		$header['n_name'] = $this->n_name['n_name'];
		$this->load->view('public/header',$header);
		$this->load->view('public/top');
		//$data['adminmenulist'] = $this->admininit();
		$id = $this->uri->segment(3);
		$data['guestbook'] = $this->guestbook->find_guestbook($id);
		$data['act'] = 'updateguest';
		$this->load->view('public/left',$data);
		unset($data['act']);
		if (IS_POST)
		{
			//处理添加
			
			$this->load->library('form_validation');
			$status = $this->form_validation->run('guestbook');
			
			$status = true;
			$res = false;
			if ($status)
			{
				//验证通过
				$id = $this->input->post('g_id');
				$res = $this->guestbook->update_guestbook($id);
				if ($res)
				{
					$username = $header['user']['ma_username'];
					$this->logs->addLog('修改留言状态！',$username,$id);
					//echo "<script>alert('操作成功！');window.location.href='".site_url('Guestbook/index/')."'</script>";
					echo "<script>window.location.href='".site_url(array('Guestbook','index','updatesuccess'))."'</script>";
					exit;
				}
				else
				{
					echo "<script>window.location.href='".site_url(array('Guestbook','index','updateerror'))."'</script>";
					exit;
				}
			}
		}
		
		$this->load->view('guestbook/update');
		$this->load->view('public/footer');
	}

	//删除其他内容
	public function delGuestbook()
	{
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'82');
		$id = $this->uri->segment(3);
		$res = $this->guestbook->doDel($id);
		if ($res)
		{
			$username = $header['user']['ma_username'];
			$this->logs->addLog('删除留言成功！',$username,$id);
			echo "<script>window.location.href='".site_url(array('Guestbook','index','delsuccess'))."'</script>";
			exit;
		}
		else
		{
			echo "<script>alert('删除失败！');window.location.href='".site_url(array('Guestbook','index'))."'</script>";
			exit;
		}
	}

	//批量删除其他内容
	public function batchDelGuestbook()
	{
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'82');
		$CheckIDs = $this->input->post('IDCheck');
		if ($CheckIDs==null)
		{
			//echo "<script>alert('请在要删除的留言记录前的方框内打勾！');window.history.go(-1);</script>";
			echo "<script>window.location.href='".site_url(array('Guestbook','index','kong'))."'</script>";
			exit;
		}
		$flag = false;
		foreach ($CheckIDs as $value)
		{
			$status = $this->guestbook->doDel($value);
			if ($status&&($flag===false))
			{
				$flag = true;
			}
		}
		//删除成功
		if ($flag===true)
		{
			$username = $header['user']['ma_username'];
			$this->logs->addLog('批量删除留言成功！',$username,implode(',', $CheckIDs));
			//echo "<script>alert('批量删除成功！');window.location.href='".site_url('Guestbook/index')."'</script>";
			echo "<script>window.location.href='".site_url(array('Guestbook','index','batchdelsuccess'))."'</script>";
			exit;
		}
		else
		{
			echo "<script>alert('批量删除失败！');window.location.href='".site_url(array('Guestbook','index','batchdelerror'))."'</script>";
			exit;
		}
	}

}