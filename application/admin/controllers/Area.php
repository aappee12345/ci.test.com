<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area extends Homebase
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('usersessionmodel','usersession',TRUE);
		$this->load->model('areamodel','area',TRUE);
		$this->load->model('netmodel','nets',TRUE);
		$this->load->model('logmodel','logs',TRUE);
	}

	//地区列表页
	public function index()
	{
		$header['title'] = "地区列表";
		$header['keywords'] = "地区列表";

		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'21');
		$header['version'] = require(APP_ROOT . 'config' . DIRECTORY_SEPARATOR . 'version.php');
		$header['n_name'] = $this->n_name['n_name']; 
		$this->load->view('public/header',$header);
		$this->load->view('public/top');
		//$data['adminmenulist'] = $this->admininit();
		$data['act'] = 'arealist';
		$this->load->view('public/left',$data);
		unset($data['act']);
		//获取分类
		$data['count'] = $this->db->count_all_results('area');
		$data['arealist'] = $this->area->check();
		
		$this->load->view('area/index',$data);
		$this->load->view('public/footer');
	}

	//添加顶级分类
	public function add()
	{
		$header['title'] = "添加地区";
		$header['keywords'] = "添加地区";

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
			$status = $this->form_validation->run('area');

			if ($status)
			{
			
				$res = $this->area->insert_area();
				if ($res)
				{
					$username = $header['user']['ma_username'];
					$this->logs->addLog('添加地区成功！',$username);
					echo "<script>alert('添加地区成功！');window.location.href='".site_url(array('Area','index'))."'</script>";
				}
				else
				{
					$username = $header['user']['ma_username'];
					$this->logs->addLog('添加地区失败！',$username);
					echo "<script>alert('添加地区失败！');window.location.href='".site_url(array('Area','index'))."'</script>";
				}
				
			}
		}
		//$data['adminmenulist'] = $this->admininit();
		$data['topareas'] = $this->area->topareas();
		//栏目排版
		//$data['typelist'] = $this->settype->check();
		$data['cid'] = $this->uri->segment(3);
		$data['act'] = 'arealist';
		$this->load->view('public/left',$data);
		unset($data['act']);
		$this->load->view('area/add',$data);
		$this->load->view('public/footer');
	}

	//添加子分类
	public function addson()
	{
		$header['title'] = "添加下级城市";
		$header['keywords'] = "添加下级城市";
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
			$status = $this->form_validation->run('area');
			
			if ($status)
			{
				$res = $this->area->insert_area();
				if ($res)
				{
					$username = $header['user']['ma_username'];
					$this->logs->addLog('添加地区成功！',$username);
					echo "<script>alert('添加地区成功！');window.location.href='".site_url(array('Area','index'))."'</script>";
				}
				else
				{
					echo "<script>alert('添加地区失败！');window.location.href='".site_url(array('Area','index'))."'</script>";
				}
			}
		}

		
		if (isset($pid))
		{
			$data['area_pid'] = $pid;
		}
		else
		{
			$data['area_pid'] = $pid = $this->uri->segment(3);
		}
		//判断所选父级ID的等级
		$data['topareas'] = $this->area->topareas();
		$data['act'] = 'arealist';
		$this->load->view('public/left',$data);
		unset($data['act']);
		$this->load->view('area/add-son',$data);
		$this->load->view('public/footer');
	}

	/**
	  *修改分类
      *
      */
	public function update()
	{

		$header['title'] = "修改地区";
		$header['keywords'] = "修改地区";
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'23');
		$header['version'] = require(APP_ROOT . 'config' . DIRECTORY_SEPARATOR . 'version.php');
		$header['n_name'] = $this->n_name['n_name'];

		$this->load->view('public/header',$header);
		$this->load->view('public/top');
		$data['area_id'] = $area_id = $this->uri->segment(3);
		$data['area'] = $area = $this->area->find_area($area_id);
		$pid = $data['area']['area_pid'];
		if (IS_POST)
		{
			//获取要修改的分类的ID
			$area_id = $this->input->post('area_id');
			$this->load->library('form_validation');
			$res = false;
			$this->form_validation->set_rules('area_name','地区名称','required');  
			$this->form_validation->set_rules('area_pinyin','地区拼音','required');  
			$status = $this->form_validation->run();
			if ($status)
			{
				
				$res = $this->area->update_area($area_id);
				if ($res)
				{
					$username = $header['user']['ma_username'];
					$this->logs->addLog('修改地区成功！',$username,$area_id);
					echo "<script>alert('修改地区成功！');window.location.href='".site_url(array('area','index'))."'</script>";
					exit;
				}
				else
				{
					echo "<script>alert('修改地区失败！');window.location.href='".site_url(array('area','index'))."'</script>";
					exit;
				}
			}
		}
		
		$data['topareas'] = $this->area->topareas();
		$data['act'] = 'arealist';
		$this->load->view('public/left',$data);
		unset($data['act']);
		$this->load->view('area/update',$data);
		$this->load->view('public/footer');
	}

	/**
	  * 删除分类
      */
	public function delArea()
	{
		//判断登录及权限
		$id = $this->uri->segment(3);
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'24');
		$status = $this->doDel($id);
		if ($status)
		{
			//删除成功
			$username = $header['user']['ma_username'];
			$this->logs->addLog('删除地区成功！',$username,$cid);
			echo "<script>alert('删除地区成功！');window.location.href='".site_url(array('area','index'))."'</script>";
			exit;
		}
		else
		{
			//删除失败
			echo "<script>alert('删除地区成功！');window.location.href='".site_url(array('area','index'))."'</script>";
			exit;
		}
	}

	/**
	  * 批量删除地区
      */
	public function batchDelArea()
	{
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'24');
		$CheckIDs = $this->input->post('IDCheck');
		if ($CheckIDs==null)
		{
			echo "<script>alert('请在要删除的地区前的方框内打勾！');window.history.go(-1);</script>";
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
			$this->logs->addLog('批量删除地区成功！',$username,implode(',', $CheckIDs));
			echo "<script>alert('批量删除地区成功！');window.location.href='".site_url(array('area','index'))."'</script>";
			exit;
		}
		else
		{
			echo "<script>alert('批量删除地区失败！');window.location.href='".site_url(array('area','index'))."'</script>";
			exit;
		}
		
	}

	/**
	  * 处理删除地区
      * @param int $id删除的地区ID;
      */
	public function doDel($id)
	{
		//查看是否存在下级地区
		$area = $this->db->where(array('area_pid'=>$id))->get('area')->row_array();
		if (!empty($area))
		{
			echo "<script>alert('该地区下存在下级城市，请先删除下级城市！');window.location.href='".site_url(array('area','index'))."'</script>";
			exit;
		}
		//查询分类
		$res = $this->db->delete('area', array('area_id' => $id));
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

	public function ajaxpinyin()
	{
		$name = $this->input->post('name');
		$json_array = json_decode(require(APP_ROOT.'config/area.php'),true);
		foreach ($json_array as $value)
		{
			if ($name==$value['name'])
			{
				echo $value['pinyin'];
				exit;
			}

		}
	}

	
}