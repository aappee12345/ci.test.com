<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guanggao extends Homebase
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('usersessionmodel','usersession',TRUE);
		$this->load->model('admodel','ad',TRUE);
		$this->load->model('guanggaomodel','guanggao',TRUE);
		$this->load->model('logmodel','logs',TRUE);
	}

	//广告位列表
	public function index()
	{
		$header['title'] = "广告管理";
		$header['keywords'] = "广告管理";
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'51');
		$header['version'] = require(APP_ROOT . 'config' . DIRECTORY_SEPARATOR . 'version.php');
		$header['n_name'] = $this->n_name['n_name'];
		$this->load->view('public/header',$header);
		$this->load->view('public/top');
		//$data['adminmenulist'] = $this->admininit();
		$data['act'] = 'guanggaolist';
		$this->load->view('public/left',$data);
		unset($data['act']);
		$three = $this->uri->segment(4);
		$data['ad_id'] = $ad_id = $this->uri->segment(3);
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
						添加广告成功！
					</p>
				</div>

				<a href='.site_url(array("Guanggao","index","$ad_id")).'><div class="return">返回列表</div></a>
				<a href='.site_url(array("Guanggao","add","$ad_id")).'><div class="ok">继续添加</div></a>
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
						修改广告成功！
					</p>
				</div>

				<a href='.site_url(array("Guanggao","index","$ad_id")).'><div class="return">返回列表</div></a>
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
						删除广告成功！
					</p>
				</div>

				<a href='.site_url(array("Guanggao","index","$ad_id")).'><div class="return">返回列表</div></a>
			</div>
			';
		}
		elseif ($three==='delbatchsuccess')
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
						批量删除广告成功！
					</p>
				</div>

				<a href='.site_url(array("Guanggao","index","$ad_id")).'><div class="return">返回列表</div></a>
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
						请在要删除的广告前的方框内打勾！
					</p>
				</div>

				<a href='.site_url(array("Guanggao","index","$ad_id")).'><div class="return">返回列表</div></a>
			</div>
			';
		}
		elseif ($three==='exists')
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
						该广告位下存在广告，请先删除广告！
					</p>
				</div>

				<a href='.site_url(array("Guanggao","index","$ad_id")).'><div class="return">返回列表</div></a>
			</div>
			';
		}
	

		$data['guanggaolist'] = $this->guanggao->check($ad_id);
		$data['count'] = count($data['guanggaolist']);
		foreach ($data['guanggaolist'] as &$value)
		{
			$value['g_path'] = strstr($value['g_path'],'/upload/');
		}
		$this->load->view('guanggao/index',$data);
		$this->load->view('public/footer');
	}

	//广告位添加
	public function add()
	{
		$header['title'] = "广告添加";
		$header['keywords'] = "广告添加";
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'52');
		$header['version'] = require(APP_ROOT . 'config' . DIRECTORY_SEPARATOR . 'version.php');
		$header['n_name'] = $this->n_name['n_name'];
		$this->load->view('public/header',$header);
		$this->load->view('public/top');
		//$data['adminmenulist'] = $this->admininit();
		$data['ad_id'] = $this->uri->segment(3)?$this->uri->segment(3):$this->uri->segment(4);
		$data['act'] = 'addguanggao';
		$this->load->view('public/left',$data);
		unset($data['act']);
		if (IS_POST)
		{
			$data['g_ad_id'] = $this->input->post('g_ad_id');
			$this->load->library('form_validation');
			$status = $this->form_validation->run('guanggao');
			$res = false;
			if ($status)
			{
				//验证通过 处理图片
				if ($_FILES['g_path']['error'] == 0)
				{
					//有图片上传
					//文件上传
					$config1['upload_path']      = './upload/guanggao/';
			        $config1['allowed_types']    = 'gif|jpg|png';
			        $config1['max_size']         = 8192;//允许上传文件大小的最大值（单位 KB），设置为 0 表示无限制 
			        $config1['max_width']        = 0;//图片的最大宽度（单位为像素），设置为 0 表示无限制
			        $config1['max_height']       = 0;//图片的最大高度（单位为像素），设置为 0 表示无限制
			        $config1['encrypt_name']     = true;//如果设置为 TRUE ，文件名将会转换为一个随机的字符串 

			        $this->load->library('upload', $config1);

			        if (!$this->upload->do_upload('g_path'))
			        {
			            $data['error'] = array('error' => $this->upload->display_errors('',''));
			            echo "<script>alert('".$data['error']['error']."');window.history.go(-1);</script>";
			            exit;
			        }
			        else
			        {
			            $data['info'] = array('upload_data' => $this->upload->data());
			        }
			        $_POST['g_path'] = $data['info']['upload_data']["full_path"];
				}
				else
				{
					//没有图片上传调用文本框填写的地址
					$_POST['g_path'] = $this->input->post('g_file');
				}
				$res = $this->guanggao->insert_guanggao();
			}
			if ($res!==false)
			{
				$username = $header['user']['ma_username'];
				$this->logs->addLog('添加广告成功！',$username);
				echo "<script>window.location.href='".site_url(array('Guanggao','index',$data['g_ad_id'],'addsuccess'))."'</script>";
				exit;
			}
		}

		$this->load->view('guanggao/add');
		$this->load->view('public/footer');
	}

	//广告修改
	public function update()
	{
		$header['title'] = "广告修改";
		$header['keywords'] = "广告修改";
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'53');
		$header['version'] = require(APP_ROOT . 'config' . DIRECTORY_SEPARATOR . 'version.php');
		$header['n_name'] = $this->n_name['n_name'];
		$this->load->view('public/header',$header);
		$this->load->view('public/top');
		//$data['adminmenulist'] = $this->admininit();
		$data['act'] = 'updateguanggao';
		$this->load->view('public/left',$data);
		unset($data['act']);
		if (IS_POST)
		{
			$this->load->library('form_validation');
			$status = $this->form_validation->run('guanggao');
			$res = false;
			if ($status)
			{
				//验证通过
				$id = $this->input->post('g_id');
				if ($_FILES['g_path']['error'] == 0)
				{
					//有图片上传
					$guanggao = $this->guanggao->find_guanggao($id);
					$picpath = '.'.strstr($guanggao['g_path'],'/upload/');
					if (file_exists($picpath))
					{
						@unlink($picpath);
					}
					//文件上传
					$config1['upload_path']      = './upload/guanggao/';
			        $config1['allowed_types']    = 'gif|jpg|png';
			        $config1['max_size']         = 8192;//允许上传文件大小的最大值（单位 KB），设置为 0 表示无限制 
			        $config1['max_width']        = 0;//图片的最大宽度（单位为像素），设置为 0 表示无限制
			        $config1['max_height']       = 0;//图片的最大高度（单位为像素），设置为 0 表示无限制
			        $config1['encrypt_name']     = true;//如果设置为 TRUE ，文件名将会转换为一个随机的字符串 

			        $this->load->library('upload', $config1);

			        if (!$this->upload->do_upload('g_path'))
			        {
			            $data['error'] = array('error' => $this->upload->display_errors('',''));
			            echo "<script>alert('".$data['error']['error']."');window.history.go(-1);</script>";
			            exit;
			        }
			        else
			        {
			            $data['info'] = array('upload_data' => $this->upload->data());
			        }
			        $_POST['g_path'] = $data['info']['upload_data']["full_path"];
				}
				else
				{
					//没有图片上传调用文本框填写的地址
					$_POST['g_path'] = $this->input->post('g_file');
				}
				$res = $this->guanggao->update_guanggao($id);
			}

			if ($res!==false)
			{
				$ad_id = $this->input->post('g_ad_id');
				$username = $header['user']['ma_username'];
				$this->logs->addLog('修改广告成功！',$username,$id);
				echo "<script>window.location.href='".site_url(array('Guanggao','index',$ad_id,'updatesuccess'))."'</script>";
				exit;
			}
		}
		$id = $this->uri->segment(3);

		$data['guanggao'] = $this->guanggao->find_guanggao($id);
		$this->load->view('guanggao/update',$data);
		$this->load->view('public/footer');
	}


	//广告位删除
	public function delGuanggao()
	{
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'54');
		$id = $this->uri->segment(3);
		//查询当前删除广告所属广告位
		$guanggao = $this->guanggao->find_guanggao($id);
		$res = $this->guanggao->doDel($id);
		if ($res)
		{
			$username = $header['user']['ma_username'];
			$this->logs->addLog('删除广告成功！',$username,$id);
			echo "<script>window.location.href='".site_url(array('guanggao','index',$guanggao['g_ad_id'],'delsuccess'))."'</script>";
			exit;
		}
		else
		{
			echo "<script>window.location.href='".site_url('guanggao/index/'.$guanggao['g_ad_id'])."'</script>";
			exit;
		}
	}

	/**
	  * 批量删除广告
      */
	public function batchDelGuanggao()
	{
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'54');
		$CheckIDs = $this->input->post('IDCheck');
		$id = $CheckIDs[0];
		$guanggao = $this->guanggao->find_guanggao($id);

		if ($CheckIDs==null)
		{
			//echo "<script>alert('请在要删除的广告前的方框内打勾！');window.history.go(-1);</script>";
			$g_ad_id = $this->input->post('g_ad_id');
			echo "<script>window.location.href='".site_url(array('guanggao','index',$g_ad_id,'kong'))."'</script>";
			exit;
		}
		
		$flag = false;
		foreach ($CheckIDs as $value)
		{
			$status = $this->guanggao->doDel($value);
			if ($status&&($flag===false))
			{
				$flag = true;
			}
		}
		//删除成功
		if ($flag===true)
		{
			$username = $header['user']['ma_username'];
			$this->logs->addLog('批量删除广告成功！',$username,implode(',', $CheckIDs));
			echo "<script>window.location.href='".site_url(array('guanggao','index',$guanggao['g_ad_id'],'delbatchsuccess'))."'</script>";
			//查询当前广告位下是否存在广告
			exit;
		}
		else
		{
			echo "<script>window.location.href='".site_url(array('guanggao','index',$guanggao['g_ad_id']))."'</script>";
			exit;
		}
		
	}

	public function ajaxsort()
	{
		if (IS_AJAX)
		{
			$arr['g_id'] = $this->input->post('id');
			$arr['g_sort'] = $this->input->post('sort');
			//查询当前选择分类的子分类
			$res = $this->guanggao->ajaxupdate_sort($arr);
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