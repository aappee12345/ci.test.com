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
class Log extends Homebase
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('usersessionmodel','usersession',TRUE);
		$this->load->model('logmodel','logs',TRUE);

	}
	//日志列表页面
	public function index()
	{
		$header['title'] = "日志列表";
		$header['keywords'] = "日志列表";
		//$data['adminmenulist'] = $this->admininit();
		$three = $this->uri->segment(3);
		if ($three=='success')
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
							删除日志成功！
						</p>
					</div>
					<div class="ok">确定</div>
				</div>
				';
		}
		elseif ($three=='error')
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
							删除日志失败！
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
							请选择日志记录或选择日志所处的时间段！
						</p>
					</div>
					<div class="ok">确定</div>
				</div>
				';
		}
		elseif ($three=='batchsuccess')
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
							批量删除日志成功！
						</p>
					</div>
					<div class="ok">确定</div>
				</div>
				';
		}
		elseif ($three!='success' && $three!='error'&& $three!='kong' && $three!='batchsuccess')
		{
			//do nothing..
		}
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'13');
		$header['version'] = require(APP_ROOT . 'config' . DIRECTORY_SEPARATOR . 'version.php');
		$header['n_name'] = $this->n_name['n_name'];
		$data['act'] = 'log';
		$this->load->view('public/header',$header);
		$this->load->view('public/top');
		$this->load->view('public/left',$data);
		unset($data['act']);
		//获取日志
		//分页
		$condition['keys'] = isset($_POST['keys'])?$_POST['keys']:'';
		$this->load->library('pagination');
		$perPage = 15;
		$config['base_url'] = site_url('log/index');
		$config['total_rows'] = $this->db->like('l_operator', $condition['keys'], 'both')->or_like('l_case', $condition['keys'], 'both')->count_all_results('log');
		$config['per_page'] = $perPage;
		$config['uri_segment'] = 3;

		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();
		
		$offset = $this->uri->segment(3);
		$this->db->limit($perPage,$offset);
		
		$data['logs'] = $this->logs->check($condition);
		unset($data['logs']['keys']);
		$data['totals'] = $config['total_rows'];
		$data['per'] = $config['per_page'];
		$data['keys'] = $condition['keys'];
		$this->load->view('log/index',$data);
		$this->load->view('public/footer');
	}

	//日志删除
	public function delLog()
	{
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'12');
		
		$lid = $this->uri->segment(3);
		$res = $this->logs->del($lid);
		if ($res)
		{
			//echo "<script>alert('删除日志成功！');window.location.href='".site_url('log/index')."'</script>";
			echo "<script>window.location.href='".site_url(array('log','index','success'))."'</script>";
			
		}
		else
		{
			//echo "<script>alert('删除日志失败！');window.location.href='".site_url('log/index')."'</script>";
			echo "<script>window.location.href='".site_url(array('log','index','error'))."'</script>";
			
		}
	}

	//删除选中
	public function delLogBatch()
	{
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'12');
		//获取ID数组
		$ids = $this->input->post('IDCheck');
		$days = $this->input->post('days');
		if ($ids==null&&!$days)
		{
			echo "<script>window.location.href='".site_url(array('log','index','kong'))."'</script>";
			exit;
		}
		
		if (isset($ids))
		{
			foreach ($ids as $value)
			{
				$this->logs->del($value);
			}
		}
		if (isset($days))
		{
			//计算时间
			$thattime = time()-$days*24*3600;
			var_dump($thattime);
			$this->db->delete('log',array('updated_at <'=>$thattime));
		}
		echo "<script>window.location.href='".site_url(array('log','index','batchsuccess'))."'</script>";
		exit;
	}
}