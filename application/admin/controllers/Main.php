<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends Homebase {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('usersessionmodel','usersession',TRUE);
	}

	public function index()
	{
		
		$header['title'] = "欢迎来到后台管理";
		$header['keywords'] = "欢迎来到后台管理";
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,10);
		//var_dump($header['user']);
		$header['version'] = require(APP_ROOT . 'config' . DIRECTORY_SEPARATOR . 'version.php');
		$header['n_name'] = $this->n_name['n_name'];
		$header['manager'] = $manager = $this->db->where(array('ma_username'=>$header['user']['ma_username']))->get('manager')->row_array();
		$data['role'] = $this->db->where(array('r_id'=>$manager['ma_rid']))->get('role')->row_array();
		//今天零点时间戳
		$time1 = strtotime(date('Y-m-d',time()).' 00:00:00');
		//查询当天发表文章数
		$data['count1'] = count($this->db->where('updated_at >',$time1)->get('article')->result_array());
		//本周一零点时间戳
		$time2=mktime(0,0,0,date('m'),date('d')-date('w')+1,date('Y'));
		$data['count2'] = count($this->db->where('updated_at >',$time2)->get('article')->result_array());
		$data['count3'] = count($this->db->where('updated_at 	>',0)->get('article')->result_array());
		//$data['adminmenulist'] = $this->admininit();
		$this->load->view('public/header',$header);
		$this->load->view('public/top');
		$this->load->view('public/left',$data);
		$this->load->view('main/index');
		$this->load->view('public/footer');
	}

	//查询友情链接
	public function linklist()
	{
		$linklist = $this->db->where(array('l_class'=>1))->get('link')->result_array();
		echo json_encode($linklist);
	}

	//查找指定友情链接
	public function findlink()
	{
		$id = $this->uri->segment(3);
		$link = $this->db->where(array('l_id'=>$id))->get('mr_link')->row_array();
		echo json_encode($link);
	}

	//添加友情链接
	public function addlink()
	{
		if (IS_POST)
		{
			$_POST['l_class'] = 1;
			if ($_POST['l_file']=='')
			{
				unset($_POST['l_file']);
			}
			else
			{
				$_POST['l_wzlogourl'] = $_POST['l_file'];
				unset($_POST['l_file']);
			}
			
			$s = $this->db->insert('mr_link', $_POST);
			
			if ($s)
			{
				$res['a'] = '添加成功！';
			}
			else
			{
				$res['a'] = '添加失败！';
			}

			echo json_encode($res);
		}
	}

	//修改友情链接
	public function updatelink()
	{
		if (IS_POST)
		{
			$_POST['l_class'] = 1;
			if ($_POST['l_file']=='')
			{
				unset($_POST['l_file']);
			}
			else
			{
				$_POST['l_wzlogourl'] = $_POST['l_file'];
				unset($_POST['l_file']);
			}
			$this->db->where('l_id', $_POST['l_id']);
			unset($_POST['l_id']);
			$s = $this->db->update('mr_link', $_POST);
			
			if ($s)
			{
				$res['a'] = '修改成功！';
			}
			else
			{
				$res['a'] = '修改失败！';
			}
			echo json_encode($res);
		}
	}

	//删除友情链接
	public function dellink()
	{
		$id = $this->uri->segment(3);
		$this->db->where('l_id', $id);
		
		$s = $this->db->delete('mr_link');
		
		if ($s)
		{
			$res['a'] = '删除成功！';
		}
		else
		{
			$res['a'] = '删除失败！';
		}
		echo json_encode($res);
	}

	//修改密码
	public function setps()
	{
		if ($s)
		{
			$res['a'] = '密码修改成功！';
		}
		else
		{
			$res['a'] = '密码修改失败！';
		}
		echo json_encode($res);
	}

	//批量重置密码
	public function bsetps()
	{
		if ($s)
		{
			$res['a'] = '密码重置成功！';
		}
		else
		{
			$res['a'] = '密码重置失败！';
		}
		echo json_encode($res);
	}
}