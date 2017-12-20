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
class Common extends Homebase
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('usersessionmodel','usersession',TRUE);
		$this->load->model('commonmodel','common',TRUE);
		$this->load->model('logmodel','logs',TRUE);
	}

	//其他内容列表
	public function index()
	{
		$header['title'] = "其他内容列表";
		$header['keywords'] = "其他内容列表";
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'71');
		$header['version'] = require(APP_ROOT . 'config' . DIRECTORY_SEPARATOR . 'version.php');
		$header['n_name'] = $this->n_name['n_name'];
		$this->load->view('public/header',$header);
		$this->load->view('public/top');
		//$data['adminmenulist'] = $this->admininit();
		$data['act'] = 'commonlist';
		$this->load->view('public/left',$data);
		unset($data['act']);
		$three = $this->uri->segment(3);
		if ($three === 'addsuccess')
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
						添加成功！
					</p>
				</div>
				<a href='.site_url(array("Common","index")).'><div class="return">返回列表</div></a>
				<a href='.site_url(array("Common","add")).'><div class="ok">继续添加</div></a>
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
				<a href='.site_url(array("Common","index")).'><div class="return">返回列表</div></a>
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
				<a href='.site_url(array("Common","index")).'><div class="return">返回列表</div></a>
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
				<a href='.site_url(array("Common","index")).'><div class="return">返回列表</div></a>
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
						请在要删除的内容前的方框内打勾！
					</p>
				</div>
				<a href='.site_url(array("Common","index")).'><div class="return">返回列表</div></a>
			</div>
			';
		}
		$this->load->library('pagination');
		$perPage = 15;
		$config['base_url'] = site_url('common/index');
		//$config['total_rows'] = $this->db->like('l_operator', $condition['keys'], 'both')->or_like('l_case', $condition['keys'], 'both')->count_all_results('log');
		$config['total_rows'] = $data['count'] = $this->db->count_all_results('common');
		$config['per_page'] = $perPage;
		$config['uri_segment'] = 3;

		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();
		
		$offset = $this->uri->segment(3);
		$this->db->limit($perPage,$offset);
		$condition = array();
		$data['offset'] = $offset?$offset:0;
		$data['commonlist'] = $this->common->check();
		foreach ($data['commonlist'] as &$value)
		{
			$value['co_pic'] = strstr($value['co_pic'],'/upload/common/');
		}
		$this->load->view('common/index',$data);
		$this->load->view('public/footer');
	}

	//添加其他内容
	public function add()
	{
		$header['title'] = "添加其他内容";
		$header['keywords'] = "添加其他内容";
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'72');
		$header['version'] = require(APP_ROOT . 'config' . DIRECTORY_SEPARATOR . 'version.php');
		$header['n_name'] = $this->n_name['n_name'];
		$this->load->view('public/header',$header);
		$this->load->view('public/top');
		//$data['adminmenulist'] = $this->admininit();
		$data['act'] = 'addcommon';
		$this->load->view('public/left',$data);
		unset($data['act']);
		if (IS_POST)
		{
			//处理添加
			$this->load->library('form_validation');
			$status = $this->form_validation->run('common');
			$res = false;
			if ($status)
			{
				//验证通过
				//判断是否有图片上传
				if ($_FILES['co_pic']['error']==0)
				{
					$config1['upload_path']      = './upload/common/';
			        $config1['allowed_types']    = 'gif|jpg|png';
			        $config1['max_size']         = 8192;//允许上传文件大小的最大值（单位 KB），设置为 0 表示无限制 
			        $config1['max_width']        = 0;//图片的最大宽度（单位为像素），设置为 0 表示无限制
			        $config1['max_height']       = 0;//图片的最大高度（单位为像素），设置为 0 表示无限制
			        $config1['encrypt_name']     = true;//如果设置为 TRUE ，文件名将会转换为一个随机的字符串 
			        $this->load->library('upload', $config1);
			        if (!$this->upload->do_upload('co_pic'))
			        {
			            $data['error'] = array('error' => $this->upload->display_errors('',''));
			            echo "<script>alert('".$data['error']['error']."');window.history.go(-1);</script>";
			            exit;
			        }
			        else
			        {
			            $data['info'] = array('upload_data' => $this->upload->data());
			        }
			        $_POST['co_pic'] = $data['info']['upload_data']["full_path"];
				}
				else
				{
					$_POST['co_pic'] = $this->input->post('co_file');
				}
				$res = $this->common->insert_common();
				if ($res)
				{
					$username = $header['user']['ma_username'];
					$this->logs->addLog('添加其他内容成功！',$username);
					//echo "<script>alert('添加成功！');window.location.href='".site_url('Common/index/')."'</script>";
					echo "<script>window.location.href='".site_url(array('Common','index','addsuccess'))."'</script>";
					exit;
				}
				else
				{
					echo "<script>alert('添加失败！');window.location.href='".site_url('Common/index/')."'</script>";
					exit;
				}
			}
		}
		$this->load->view('common/add');
		$this->load->view('public/footer');
	}

	//修改其他内容
	public function update()
	{
		$header['title'] = "修改其他内容";
		$header['keywords'] = "修改其他内容";
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'73');
		$header['version'] = require(APP_ROOT . 'config' . DIRECTORY_SEPARATOR . 'version.php');
		$header['n_name'] = $this->n_name['n_name'];
		$this->load->view('public/header',$header);
		$this->load->view('public/top');
		//$data['adminmenulist'] = $this->admininit();
		$id = $this->uri->segment(3);
		$data['common'] = $this->common->find_common($id);
		$data['act'] = 'updatecommon';
		$this->load->view('public/left',$data);
		unset($data['act']);
		if (IS_POST)
		{
			//处理添加
			$this->load->library('form_validation');
			$status = $this->form_validation->run('common');
			$res = false;
			if ($status)
			{
				//验证通过
				//判断是否有图片上传
				if ($_FILES['co_pic']['error']==0)
				{
					$config1['upload_path']      = './upload/common/';
			        $config1['allowed_types']    = 'gif|jpg|png';
			        $config1['max_size']         = 8192;//允许上传文件大小的最大值（单位 KB），设置为 0 表示无限制 
			        $config1['max_width']        = 0;//图片的最大宽度（单位为像素），设置为 0 表示无限制
			        $config1['max_height']       = 0;//图片的最大高度（单位为像素），设置为 0 表示无限制
			        $config1['encrypt_name']     = true;//如果设置为 TRUE ，文件名将会转换为一个随机的字符串 
			        $this->load->library('upload', $config1);

			        if (!$this->upload->do_upload('co_pic'))
			        {
			            $data['error'] = array('error' => $this->upload->display_errors('',''));
			            echo "<script>alert('".$data['error']['error']."');window.history.go(-1);</script>";
			            exit;
			        }
			        else
			        {
			        	//删除旧文件
			        	if (file_exists($this->input->post('co_file')))
			        	{
			        		@unlink($this->input->post('co_file'));
			        	}
			            $data['info'] = array('upload_data' => $this->upload->data());
			        }
			        $_POST['co_pic'] = $data['info']['upload_data']["full_path"];
				}
				else
				{
					$_POST['co_pic'] = $this->input->post('co_file');
				}
				$id = $this->input->post('co_id');
				$res = $this->common->update_common($id);
				if ($res)
				{
					$username = $header['user']['ma_username'];
					$this->logs->addLog('修改其他内容成功！',$username,$id);
					echo "<script>window.location.href='".site_url(array('Common','index','updatesuccess'))."'</script>";
					exit;
				}
				else
				{
					echo "<script>alert('修改失败！');window.location.href='".site_url('Common/index/')."'</script>";
					exit;
				}
			}
		}
		
		$this->load->view('common/update');
		$this->load->view('public/footer');
	}

	//删除其他内容
	public function delCommon()
	{
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'74');
		$id = $this->uri->segment(3);
		$res = $this->common->doDel($id);
		if ($res)
		{
			$username = $header['user']['ma_username'];
			$this->logs->addLog('删除其他内容成功！',$username,$id);
			//echo "<script>alert('删除成功！');window.location.href='".site_url('Common/index/')."'</script>";
			echo "<script>window.location.href='".site_url(array('Common','index','delsuccess'))."'</script>";
			exit;
		}
		else
		{
			echo "<script>alert('删除失败！');window.location.href='".site_url('Common/index/')."'</script>";
			exit;
		}
	}

	//批量删除其他内容
	public function batchDelCommon()
	{
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'74');
		$CheckIDs = $this->input->post('IDCheck');
		if ($CheckIDs==null)
		{
			//echo "<script>alert('请在要删除的内容前的方框内打勾！');window.history.go(-1);</script>";
			echo "<script>window.location.href='".site_url(array('Common','index','kong'))."'</script>";
			exit;
		}
		$flag = false;
		foreach ($CheckIDs as $value)
		{
			$status = $this->common->doDel($value);
			if ($status&&($flag===false))
			{
				$flag = true;
			}
		}
		//删除成功
		if ($flag===true)
		{
			$username = $header['user']['ma_username'];
			$this->logs->addLog('批量删除其他内容成功！',$username,implode(',', $CheckIDs));
			echo "<script>window.location.href='".site_url(array('Common','index','batchdelsuccess'))."'</script>";
			exit;
		}
		else
		{
			echo "<script>alert('批量删除失败！');window.location.href='".site_url('Common/index')."'</script>";
			exit;
		}
	}

}