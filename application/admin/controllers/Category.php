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
class Category extends Homebase
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('usersessionmodel','usersession',TRUE);
		$this->load->model('categorymodel','category',TRUE);
		$this->load->model('settypemodel','settype',TRUE);
		$this->load->model('netmodel','nets',TRUE);
		$this->load->model('logmodel','logs',TRUE);
	}

	//分类列表页
	public function index()
	{
		$header['title'] = "栏目列表";
		$header['keywords'] = "栏目列表";
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'21');
		$header['version'] = require(APP_ROOT . 'config' . DIRECTORY_SEPARATOR . 'version.php');
		$header['n_name'] = $this->n_name['n_name']; 
		$this->load->view('public/header',$header);
		$this->load->view('public/top');
		//$data['adminmenulist'] = $this->admininit();
		$data['act'] = 'catelist';
		$this->load->view('public/left',$data);
		unset($data['act']);
		//获取分类
		$data['count'] = $this->db->count_all_results('category');
		$data['catelist'] = $this->category->check();
		$three = $this->uri->segment(3);
		if ($three=='updatecate')
		{
			echo 
			'<style>
				body{overflow:hidden;}
				.notice{display:block;position:absolute;top:0;width: 100%;height:100%;background: rgba(0,0,0,0.6);z-index:100;}
				.info{position:fixed;left:50%;top:50%;width: 340px;height:200px;margin-left: -170px;margin-top: -100px;background: #fff;z-index:101;border-radius:6px;}
				.info .title{width: 100%;height: 40px;line-height:40px;text-indent:10px;font-weight:bold;font-size:14px;border-top-left-radius:5px;border-top-right-radius:5px;background: #2c6aa0;color:#fff;}
				.info .cont{width: 100%;height: 60px;}
				.info .cont p{width: 100%;height: 40px;line-height: 40px;margin-top:30px;text-align: center;}
				.info .ok{width: 80px;margin:auto;height: 32px;line-height: 32px;text-align: center;color:#fff;background: #2c6aa0;border-radius: 4px;cursor:pointer;}
			</style>
			<div class="notice">
			</div>
			<div class="info">
				<div class="title">
					提示
				</div>
				<div class="cont">
					<p>
						修改栏目成功！
					</p>
				</div>
				<div class="ok">确定</div>
			</div>
			';
		}
		elseif ($three=='addsuccess')
		{
			echo 
			'<style>
				body{overflow:hidden;}
				.notice{display:block;position:absolute;top:0;width: 100%;height:100%;background: rgba(0,0,0,0.6);z-index:100;}
				.info{position:fixed;left:50%;top:50%;width: 340px;height:200px;margin-left: -170px;margin-top: -100px;background: #fff;z-index:101;border-radius:6px;}
				.info .title{width: 100%;height: 40px;line-height:40px;text-indent:10px;font-weight:bold;font-size:14px;border-top-left-radius:5px;border-top-right-radius:5px;background: #2c6aa0;color:#fff;}
				.info .cont{width: 100%;height: 60px;}
				.info .cont p{width: 100%;height: 40px;line-height: 40px;margin-top:30px;text-align: center;}
				.info .ok{width: 80px;margin:auto;height: 32px;line-height: 32px;text-align: center;color:#fff;background: #2c6aa0;border-radius: 4px;cursor:pointer;}
			</style>
			<div class="notice">
				
			</div>
			<div class="info">
				<div class="title">
					提示
				</div>
				<div class="cont">
					<p>
						添加栏目成功！
					</p>
				</div>
				<div class="ok">确定</div>
			</div>
			';
		}
		elseif ($three=='delbatchsuccess')
		{
			echo 
			'<style>
				body{overflow:hidden;}
				.notice{display:block;position:absolute;top:0;width: 100%;height:100%;background: rgba(0,0,0,0.6);z-index:100;}
				.info{position:fixed;left:50%;top:50%;width: 340px;height:200px;margin-left: -170px;margin-top: -100px;background: #fff;z-index:101;border-radius:6px;}
				.info .title{width: 100%;height: 40px;line-height:40px;text-indent:10px;font-weight:bold;font-size:14px;border-top-left-radius:5px;border-top-right-radius:5px;background: #2c6aa0;color:#fff;}
				.info .cont{width: 100%;height: 60px;}
				.info .cont p{width: 100%;height: 40px;line-height: 40px;margin-top:30px;text-align: center;}
				.info .ok{width: 80px;margin:auto;height: 32px;line-height: 32px;text-align: center;color:#fff;background: #2c6aa0;border-radius: 4px;cursor:pointer;}
			</style>
			<div class="notice">
				
			</div>
			<div class="info">
				<div class="title">
					提示
				</div>
				<div class="cont">
					<p>
						批量删除栏目成功！
					</p>
				</div>
				<div class="ok">确定</div>
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
				.info .ok{width: 80px;margin:auto;height: 32px;line-height: 32px;text-align: center;color:#fff;background: #2c6aa0;border-radius: 4px;cursor:pointer;}
			</style>
			<div class="notice">
				
			</div>
			<div class="info">
				<div class="title">
					提示
				</div>
				<div class="cont">
					<p>
						删除栏目成功！
					</p>
				</div>
				<div class="ok">确定</div>
			</div>
			';
		}
		elseif ($three=='delbatcherror')
		{
			echo 
			'<style>
				body{overflow:hidden;}
				.notice{display:block;position:absolute;top:0;width: 100%;height:100%;background: rgba(0,0,0,0.6);z-index:100;}
				.info{position:fixed;left:50%;top:50%;width: 340px;height:200px;margin-left: -170px;margin-top: -100px;background: #fff;z-index:101;border-radius:6px;}
				.info .title{width: 100%;height: 40px;line-height:40px;text-indent:10px;font-weight:bold;font-size:14px;border-top-left-radius:5px;border-top-right-radius:5px;background: #2c6aa0;color:#fff;}
				.info .cont{width: 100%;height: 60px;}
				.info .cont p{width: 100%;height: 40px;line-height: 40px;margin-top:30px;text-align: center;}
				.info .ok{width: 80px;margin:auto;height: 32px;line-height: 32px;text-align: center;color:#fff;background: #2c6aa0;border-radius: 4px;cursor:pointer;}
			</style>
			<div class="notice">
				
			</div>
			<div class="info">
				<div class="title">
					提示
				</div>
				<div class="cont">
					<p>
						批量删除栏目失败！
					</p>
				</div>
				<div class="ok">确定</div>
			</div>
			';
		}
		elseif ($three=='delerror')
		{
			echo 
			'<style>
				body{overflow:hidden;}
				.notice{display:block;position:absolute;top:0;width: 100%;height:100%;background: rgba(0,0,0,0.6);z-index:100;}
				.info{position:fixed;left:50%;top:50%;width: 340px;height:200px;margin-left: -170px;margin-top: -100px;background: #fff;z-index:101;border-radius:6px;}
				.info .title{width: 100%;height: 40px;line-height:40px;text-indent:10px;font-weight:bold;font-size:14px;border-top-left-radius:5px;border-top-right-radius:5px;background: #2c6aa0;color:#fff;}
				.info .cont{width: 100%;height: 60px;}
				.info .cont p{width: 100%;height: 40px;line-height: 40px;margin-top:30px;text-align: center;}
				.info .ok{width: 80px;margin:auto;height: 32px;line-height: 32px;text-align: center;color:#fff;background: #2c6aa0;border-radius: 4px;cursor:pointer;}
			</style>
			<div class="notice">
				
			</div>
			<div class="info">
				<div class="title">
					提示
				</div>
				<div class="cont">
					<p>
						删除栏目失败！
					</p>
				</div>
				<div class="ok">确定</div>
			</div>
			';
		}
		elseif ($three=='nextcate')
		{
			echo 
			'<style>
				body{overflow:hidden;}
				.notice{display:block;position:absolute;top:0;width: 100%;height:100%;background: rgba(0,0,0,0.6);z-index:100;}
				.info{position:fixed;left:50%;top:50%;width: 340px;height:200px;margin-left: -170px;margin-top: -100px;background: #fff;z-index:101;border-radius:6px;}
				.info .title{width: 100%;height: 40px;line-height:40px;text-indent:10px;font-weight:bold;font-size:14px;border-top-left-radius:5px;border-top-right-radius:5px;background: #2c6aa0;color:#fff;}
				.info .cont{width: 100%;height: 60px;}
				.info .cont p{width: 100%;height: 40px;line-height: 40px;margin-top:30px;text-align: center;}
				.info .ok{width: 80px;margin:auto;height: 32px;line-height: 32px;text-align: center;color:#fff;background: #2c6aa0;border-radius: 4px;cursor:pointer;}
			</style>
			<div class="notice">
				
			</div>
			<div class="info">
				<div class="title">
					提示
				</div>
				<div class="cont">
					<p>
						该栏目下存在下级栏目，请先删除下级栏目！
					</p>
				</div>
				<div class="ok">确定</div>
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
				.info .ok{width: 80px;margin:auto;height: 32px;line-height: 32px;text-align: center;color:#fff;background: #2c6aa0;border-radius: 4px;cursor:pointer;}
			</style>
			<div class="notice">
				
			</div>
			<div class="info">
				<div class="title">
					提示
				</div>
				<div class="cont">
					<p>
						请在要删除的栏目前的方框内打勾！
					</p>
				</div>
				<div class="ok">确定</div>
			</div>
			';
		}

		$this->load->view('category/index',$data);
		$this->load->view('public/footer');
	}

	//添加顶级分类
	public function add()
	{
		$header['title'] = "添加栏目";
		$header['keywords'] = "添加栏目";
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'22');
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
			$status = $this->form_validation->run('category');

			if ($status)
			{
				if ($_FILES['c_pic']['error']==0)
				{
					//验证通过
					$width = $this->input->post('c_width',TRUE)?$this->input->post('c_width',TRUE):200;
					$height = $this->input->post('c_height',TRUE)?$this->input->post('c_height',TRUE):200;
					$is_water = $this->input->post('is_water',TRUE)?$this->input->post('is_water',TRUE):0;
					$_POST['c_pic'] = $this->uploadImg($width,$height,$is_water);
				}
				else
				{
					$_POST['c_pic'] = $this->input->post('c_file');
				}
			
				$res = $this->category->insert_category();
				$username = $header['user']['ma_username'];
				$this->logs->addLog('添加栏目成功！',$username);
				echo "<script>window.location.href='".site_url(array('Category','index','addsuccess'))."'</script>";
			}
		}
		//$data['adminmenulist'] = $this->admininit();
		
		$data['topcates'] = $this->category->topcates();
		
		//栏目排版
		$data['typelist'] = $this->settype->check();
		$data['cid'] = $this->uri->segment(3);
		$data['act'] = 'addcate';
		$this->load->view('public/left',$data);
		unset($data['act']);
		$this->load->view('category/add',$data);
		$this->load->view('public/footer');
	}

	//添加子分类
	public function addson()
	{
		$header['title'] = "添加子栏目";
		$header['keywords'] = "添加子栏目";
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'22');
		$header['version'] = require(APP_ROOT . 'config' . DIRECTORY_SEPARATOR . 'version.php');
		$header['n_name'] = $this->n_name['n_name'];
		$four = $this->uri->segment(4);
		if ($four=='addsonsuccess')
		{
			echo 
			'<style>
				body{overflow:hidden;}
				.notice{display:block;position:absolute;top:0;width: 100%;height:100%;background: rgba(0,0,0,0.6);z-index:100;}
				.info{position:fixed;left:50%;top:50%;width: 340px;height:200px;margin-left: -170px;margin-top: -100px;background: #fff;z-index:101;border-radius:6px;}
				.info .title{width: 100%;height: 40px;line-height:40px;text-indent:10px;font-weight:bold;font-size:14px;border-top-left-radius:5px;border-top-right-radius:5px;background: #2c6aa0;color:#fff;}
				.info .cont{width: 100%;height: 60px;}
				.info .cont p{width: 100%;height: 40px;line-height: 40px;margin-top:30px;text-align: center;}
				.info .ok{width: 80px;margin:auto;height: 32px;line-height: 32px;text-align: center;color:#fff;background: #2c6aa0;border-radius: 4px;cursor:pointer;}
			</style>
			<div class="notice">
				
			</div>
			<div class="info">
				<div class="title">
					提示
				</div>
				<div class="cont">
					<p>
						添加子栏目成功！
					</p>
				</div>
				<div class="ok">确定</div>
			</div>
			';
		}
		elseif ($four=='addsonerror')
		{
			echo 
			'<style>
				body{overflow:hidden;}
				.notice{display:block;position:absolute;top:0;width: 100%;height:100%;background: rgba(0,0,0,0.6);z-index:100;}
				.info{position:fixed;left:50%;top:50%;width: 340px;height:200px;margin-left: -170px;margin-top: -100px;background: #fff;z-index:101;border-radius:6px;}
				.info .title{width: 100%;height: 40px;line-height:40px;text-indent:10px;font-weight:bold;font-size:14px;border-top-left-radius:5px;border-top-right-radius:5px;background: #2c6aa0;color:#fff;}
				.info .cont{width: 100%;height: 60px;}
				.info .cont p{width: 100%;height: 40px;line-height: 40px;margin-top:30px;text-align: center;}
				.info .ok{width: 80px;margin:auto;height: 32px;line-height: 32px;text-align: center;color:#fff;background: #2c6aa0;border-radius: 4px;cursor:pointer;}
			</style>
			<div class="notice">
				
			</div>
			<div class="info">
				<div class="title">
					提示
				</div>
				<div class="cont">
					<p>
						添加子栏目失败！
					</p>
				</div>
				<div class="ok">确定</div>
			</div>
			';
		}
		$this->load->view('public/header',$header);
		$this->load->view('public/top');
		if (IS_POST)
		{
			//进行分类添加处理
			//表单验证
			$this->load->library('form_validation');
			if ($_POST['p_id']==$this->input->post('pid'))
			{
				$pid = $this->input->post('pid');
			}
			else
			{
				$pid = $_POST['p_id'];
			}
			
			$res = false;
			$status = $this->form_validation->run('category');
			
			if ($status)
			{
				if ($_FILES['c_pic']['error']==0)
				{
					//验证通过
					$width = $this->input->post('c_width',TRUE)?$this->input->post('c_width',TRUE):200;
					$height = $this->input->post('c_height',TRUE)?$this->input->post('c_height',TRUE):200;
					$is_water = $this->input->post('is_water',TRUE)?$this->input->post('is_water',TRUE):0;
					$_POST['c_pic'] = $this->uploadImg($width,$height,$is_water);
				}
				$res = $this->category->insert_category();

				if ($res)
				{
					$username = $header['user']['ma_username'];
					$this->logs->addLog('添加子栏目成功！',$username);
					//echo "<script>alert('添加栏目成功！');window.location.href='".site_url('Category/addson/'.$pid)."'</script>";
					echo "<script>window.location.href='".site_url(array('Category','addson',$pid,'addsonsuccess'))."'</script>";
					
				}
				else
				{
					echo "<script>window.location.href='".site_url(array('Category','addson',$pid,'addsonerror'))."'</script>";
					
				}
			}
		}
		//$data['adminmenulist'] = $this->admininit();

		//栏目排版
		$data['typelist'] = $this->settype->check();
		if (isset($pid))
		{
			$data['pid'] = $pid;
		}
		else
		{
			$data['pid'] = $pid = $this->uri->segment(3);
		}
		
		//判断所选父级ID的等级
		$p_level = $this->category->get_level($pid);
		//根据父级ID 及 父级等级 递归查询所属上级分类及其同级分类列表
		$this->category->get_fathercatelist($pid,$p_level);
		$data['selectlist'] = $this->category->selectlist;
		//p($data['selectlist']);
		$num = count($data['selectlist']);
		for ($i=0;$i<$num;$i++)
		{
			//var_dump($i);
			$newdata['selectlist'][$i] = $data['selectlist'][$i];
		}
		$data['selectlist'] = $newdata['selectlist'];
		$this->category->selectlist = array();
		$data['act'] = 'addcate';
		$this->load->view('public/left',$data);
		unset($data['act']);
		$this->load->view('category/add-son',$data);
		$this->load->view('public/footer');
	}

	/**
	  *修改分类
      *
      */
	public function update()
	{
		$header['title'] = "修改栏目";
		$header['keywords'] = "修改栏目";
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'23');
		$header['version'] = require(APP_ROOT . 'config' . DIRECTORY_SEPARATOR . 'version.php');
		$header['n_name'] = $this->n_name['n_name'];
		$this->load->view('public/header',$header);
		$this->load->view('public/top');
		$data['cid'] = $cid = $this->uri->segment(3)?$this->uri->segment(3):0;
		$data['category'] = $cate = $this->category->find_cate($cid);
		$four = $this->uri->segment(4);
		if ($four=='updatecateerror')
		{
			echo 
			'<style>
				body{overflow:hidden;}
				.notice{display:block;position:absolute;top:0;width: 100%;height:100%;background: rgba(0,0,0,0.6);z-index:100;}
				.info{position:fixed;left:50%;top:50%;width: 340px;height:200px;margin-left: -170px;margin-top: -100px;background: #fff;z-index:101;border-radius:6px;}
				.info .title{width: 100%;height: 40px;line-height:40px;text-indent:10px;font-weight:bold;font-size:14px;border-top-left-radius:5px;border-top-right-radius:5px;background: #2c6aa0;color:#fff;}
				.info .cont{width: 100%;height: 60px;}
				.info .cont p{width: 100%;height: 40px;line-height: 40px;margin-top:30px;text-align: center;}
				.info .ok{width: 80px;margin:auto;height: 32px;line-height: 32px;text-align: center;color:#fff;background: #2c6aa0;border-radius: 4px;cursor:pointer;}
			</style>
			<div class="notice">
				
			</div>
			<div class="info">
				<div class="title">
					提示
				</div>
				<div class="cont">
					<p>
						修改栏目失败！
					</p>
				</div>
				<div class="ok">确定</div>
			</div>
			';
		}

		$pid = $data['category']['p_id'];
		if (IS_POST)
		{
			//获取要修改的分类的ID
			$cid = $this->input->post('cid');
			$this->load->library('form_validation');
			$res = false;
			$status = $this->form_validation->run('category');
			if ($status)
			{
				if ($_FILES['c_pic']['error']==0)
				{
					$path = '.'.strstr($this->input->post('c_file'),'/upload/category/');
					if (file_exists($path))
					{
						unlink($path);
					}
					//验证通过
					$width = $cate['c_width']?$cate['c_width']:200;
					$height = $cate['c_height']?$cate['c_height']:200;
					$is_water = $cate['is_water']?$cate['is_water']:0;
					$_POST['c_pic'] = $this->uploadImg($width,$height,$is_water);
				}
				else
				{
					$_POST['c_pic'] = $this->input->post('c_file');
				}
				
				$res = $this->category->update_category($cid);
				if ($res)
				{
					$username = $header['user']['ma_username'];
					$this->logs->addLog('修改栏目成功！',$username,$cid);
					//echo "<script>alert('修改栏目成功！');window.location.href='".site_url('category/index')."'</script>";
					echo "<script>window.location.href='".site_url(array('category','index','updatecate'))."'</script>";
					exit;
				}
				else
				{
					//echo "<script>alert('修改栏目失败！');window.location.href='".site_url('category/update/'.$cid)."'</script>";
					echo "<script>window.location.href='".site_url(array('category','update',$cid,'updatecateerror'))."'</script>";
					exit;
				}
				//echo "<script>window.location.href='".site_url('category/add')."'</script>";
				//exit;
			}
		}
		//$data['adminmenulist'] = $this->admininit();

		//栏目排版
		$data['typelist'] = $this->settype->check();
		//判断所选父级ID的等级
		$p_level = $this->category->get_level($pid);
		//根据父级ID 及 父级等级 递归查询所属上级分类及其同级分类列表
		$this->category->get_fathercatelist($pid,$p_level);
		$data['selectlist'] = $this->category->selectlist;
		//p($data['selectlist']);
		$num = count($data['selectlist']);
		for ($i=0;$i<$num;$i++)
		{
			//var_dump($i);
			$newdata['selectlist'][$i] = $data['selectlist'][$i];
		}
		$data['selectlist'] = $newdata['selectlist'];
		$this->category->selectlist = array();
		$data['act'] = 'updatecate';
		$this->load->view('public/left',$data);
		unset($data['act']);
		$this->load->view('category/update',$data);
		$this->load->view('public/footer');
	}

	/**
	  * 删除分类
      * @param int $cid删除的分类ID;
      */
	public function delCategory($cid)
	{
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'24');
		$offset = $this->uri->segment(4);
		//查看是否存在下级分类或该分类下是否包含文章
		$cate = $this->db->where(array('p_id'=>$cid))->get('category')->row_array();
		if (!empty($cate))
		{
			echo "<script>window.location.href='".site_url(array('category','index','nextcate'))."'</script>";
			exit;
		}
		$article = $this->db->where(array('a_cid'=>$cid))->get('article')->row_array();
		if (!empty($article))
		{
			echo "<script>window.location.href='".site_url(array('article','index',$cid,'existsart'))."'</script>";
			exit;
		}
		$status = $this->doDel($cid);
		
		if ($status)
		{
			//删除成功
			$username = $header['user']['ma_username'];
			$this->logs->addLog('删除栏目成功！',$username,$cid);
			//echo "<script>alert('删除栏目成功！');window.location.href='".site_url(array('category','index',$offset))."'</script>";
			echo "<script>window.location.href='".site_url(array('category','index','delbatchsuccess'))."'</script>";
			exit;
		}
		else
		{
			//删除失败
			//echo "<script>alert('删除栏目失败！');window.location.href='".site_url(array('category','index',$offset))."'</script>";
			echo "<script>window.location.href='".site_url(array('category','index','delbatcherror'))."'</script>";
			exit;
		}
	}

	/**
	  * 批量删除分类
      * @param int $cid删除的分类ID;
      */
	public function batchDelCategory()
	{
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'24');
		$offset = $this->input->post('offset');
		$CheckIDs = $this->input->post('IDCheck');
		if ($CheckIDs==null)
		{
			//echo "<script>alert('请在要删除的栏目前的方框内打勾！');window.history.go(-1);</script>";
			//exit;
			echo "<script>window.location.href='".site_url(array('category','index','kong'))."'</script>";
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
			$this->logs->addLog('批量删除栏目成功！',$username,implode(',', $CheckIDs));
			echo "<script>window.location.href='".site_url(array('category','index','delbatchsuccess'))."'</script>";
			exit;
		}
		else
		{
			//echo "<script>alert('批量删除栏目失败！');window.location.href='".site_url('category/index/'.$offset)."'</script>";
			//exit;
			echo "<script>window.location.href='".site_url(array('category','index','delbatcherror'))."'</script>";
			exit;
		}
		
	}

	/**
	  * 处理删除分类 
      * @param int $cid删除的分类ID;
      */
	public function doDel($cid)
	{
		//查询分类
		$cate = $this->category->find_cate($cid);
		$cate['c_pic'] = '.'.strstr($cate['c_pic'],'/upload');
		//删除图片
		if (file_exists($cate['c_pic']))
		{
			@unlink($cate['c_pic']);
		}
		$res = $this->db->delete('category', array('c_id' => $cid));
		return $res;
	}



	/**
	 * ajax查询子分类
	 * @param int $cid 当前选定分类ID
	 * @return array $data
	 */
	public function ajaxson()
	{
		if (IS_AJAX)
		{
			$cid = $_POST['cid'];
			//查询当前选择分类的子分类
			$res = $this->category->soncate($cid);
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

	public function ajaxsort()
	{
		if (IS_AJAX)
		{
			$arr['c_id'] = $this->input->post('id');
			$arr['c_sort'] = $this->input->post('sort');
			//查询当前选择分类的子分类
			$res = $this->category->ajaxupdate_sort($arr);
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

	public function ajaxpagenum()
	{
		if (IS_AJAX)
		{
			$arr['c_id'] = $this->input->post('id');
			$arr['c_page_num'] = $this->input->post('num');
			//查询当前选择分类的子分类
			$res = $this->category->ajaxupdate_sort($arr);
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

	/**
	  * 处理图片文件上传
      * @param int $width 缩率图最大宽度
      * @param int $height 缩率图最大高度
      * @param int $water 是否使用水印 0为不使用 1为使用 默认不使用
      */
	public function uploadImg($width=360,$height=210,$water=1)
	{
		//文件上传
		$config1['upload_path']      = './upload/category/';
        $config1['allowed_types']    = 'gif|jpg|png';
        $config1['max_size']         = 8192;//允许上传文件大小的最大值（单位 KB），设置为 0 表示无限制 
        $config1['max_width']        = 0;//图片的最大宽度（单位为像素），设置为 0 表示无限制
        $config1['max_height']       = 0;//图片的最大高度（单位为像素），设置为 0 表示无限制
        $config1['encrypt_name']     = true;//如果设置为 TRUE ，文件名将会转换为一个随机的字符串 

        $this->load->library('upload', $config1);

        if (!$this->upload->do_upload('c_pic'))
        {
            $data['error'] = array('error' => $this->upload->display_errors());
        }
        else
        {
            $data['info'] = array('upload_data' => $this->upload->data());
        }
		//处理缩率图
        $config2['image_library']    = 'GD2';
		$config2['source_image']     = $data['info']['upload_data']['full_path'];//设置原始图像的名称和路径。 路径只能是相对或绝对的服务器路径，不能使用URL 。
		$config2['create_thumb']     = TRUE;//告诉图像处理函数生成缩略图。
		$config2['maintain_ratio']   = TRUE;//指定是否在缩放或使用硬值的时候 使图像保持原始的纵横比例。
		$config2['width']            = $width;
		$config2['height']           = $height;
		$this->load->library('image_lib', $config2);
		$this->image_lib->resize();
		//若为图片 处理水印
		$net = $this->nets->get_first_net();
		$config3['source_image']     = $data['info']['upload_data']['full_path'];
		$config3['wm_type'] = 'overlay';
		//$config3['wm_overlay_path'] = $_SERVER['DOCUMENT_ROOT'].'\uploads\water.png';
		$config3['wm_overlay_path'] = $net[0]['water_path'];
		$config3['wm_opacity'] = 50;
		$config3['wm_vrt_alignment'] = $net[0]['water_vrt']?$net[0]['water_vrt']:'bottom';
		$config3['wm_hor_alignment'] = $net[0]['water_hor']?$net[0]['water_hor']:'right';
		$config3['wm_padding'] = '0';
		//var_dump($config3);exit;
		if ($water==1)
		{
			$this->image_lib->initialize($config3);
			$this->image_lib->watermark();
		}
		//删除原图
		if (file_exists($data['info']['upload_data']['full_path']))
		{
			unlink($data['info']['upload_data']['full_path']);
		}
		return str_replace('.','_thumb.',$data['info']['upload_data']['full_path']);
	}
}