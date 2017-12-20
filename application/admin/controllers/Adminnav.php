<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
class Adminnav extends FIRST_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('adminnavmodel','adminnav',TRUE);
		

	}
	//功能展示页面
	public function func()
	{
		$header['title'] = "功能管理";
		$header['keywords'] = "功能管理";
		//判断是否是POST提交
		if (IS_POST)
		{
			$funcids = $this->input->post('func');
			$navlist = $this->adminnav->check();
			
			foreach ($navlist as $nav)
			{
				if (in_array($nav['resourceID'],$funcids))
				{
					//将delFlag值设置为0
					$this->adminnav->updateFunc($nav['resourceID'],'delFlag',0);
					//将父级的delFlag值设置为0
					$this->adminnav->updateFunc($nav['parentID'],'delFlag',0);
				}
				else
				{
					//将delFlag值设置为1
					if ($nav['parentID']!=1)
					{
						$this->adminnav->updateFunc($nav['resourceID'],'delFlag',1);
						//查询该功能的同级功能是否都为1，若都为1，将父级改为1
						$where['resourceID'] = $nav['parentID'];
						$parent = $this->db->where($where)->get('adminnav')->result_array();
						$where2['parentID'] = $parent[0]['resourceID'];
						$sonlists = $this->db->where($where2)->get('adminnav')->result_array();
						$flag = true;
						foreach ($sonlists as $value)
						{
							if ($value['delFlag']==0)
							{
								$flag = false;
								break;
							}
						}
						if ($flag===true)
						{
							//delFlag值全为1
							$this->adminnav->updateFunc($nav['parentID'],'delFlag',1);
						}	
					}
					
				}
			}
		}
		$data['adminmenulist'] = $this->admininit();
		$this->load->view('public/header',$header);
		$this->load->view('public/top');
		$data['navlist'] = $this->adminnav->check();
		$this->load->view('public/left',$data);
		

		$this->load->view('adminnav/func');
		$this->load->view('public/footer');
	}

	//添加功能页面
	public function addFunc()
	{
		$header['title'] = "添加功能";
		$header['keywords'] = "添加功能";
		//判断是否是POST提交
		if (IS_POST)
		{
			//表单验证
			$this->load->library('form_validation');
			$res = false;
			$status = $this->form_validation->run('adminnav');
			if ($status)
			{
				//验证通过
				$res = $this->adminnav->insert_func();
				echo "<script>window.location.href='".site_url('adminnav/func')."'</script>";
				exit;
			}
		}
		$data['adminmenulist'] = $this->admininit();
		$data['navlist'] = $this->adminnav->checkParent();
		$this->load->view('public/header',$header);
		$this->load->view('public/top');
		$this->load->view('public/left',$data);
		$this->load->view('adminnav/addFunc');
		$this->load->view('public/footer');
	}

	//修改功能页面
	public function updateFunc()
	{
		$header['title'] = "修改功能";
		$header['keywords'] = "修改功能";
		//判断是否是POST提交
		if (IS_POST)
		{
			//表单验证
			$this->load->library('form_validation');
			$res = false;
			$status = $this->form_validation->run('adminnav');
			if ($status)
			{
				//验证通过
				$res = $this->adminnav->update_func();
				echo "<script>window.location.href='".site_url('adminnav/funcindex')."'</script>";
				exit;
			}
		}
		$data['adminmenulist'] = $this->admininit();
		$id = $this->uri->segment(3);
		$data['adminnavinfo'] = $this->adminnav->get_this_nav($id);
		$data['adminnavlist'] = $this->adminnav->checkParent();
		$this->load->view('public/header',$header);
		$this->load->view('public/top');
		$this->load->view('public/left',$data);
		
		$this->load->view('adminnav/updateFunc');
		$this->load->view('public/footer');
	}

	//功能列表页面
	public function funcindex()
	{
		$header['title'] = "功能列表";
		$header['keywords'] = "功能列表";
		$data['adminmenulist'] = $this->admininit();
		$this->load->view('public/header',$header);
		$this->load->view('public/top');
		$this->load->view('public/left',$data);
		
		
		$this->load->library('pagination');
		$perPage = 10;
		$config['base_url'] = site_url('adminnav/funcindex');
		$config['total_rows'] = $this->db->count_all_results('adminnav');
		$config['per_page'] = $perPage;
		$config['uri_segment'] = 3;

		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();
		
		$offset = $this->uri->segment(3);
		$this->db->limit($perPage,$offset);
		$navlist = $this->adminnav->check();
		foreach ($navlist as &$val)
		{
			$thisnav = $this->db->where('resourceID='.$val['parentID'])->get('adminnav')->result_array();
			if (!empty($thisnav))
			{
				$val['parentName'] = $thisnav[0]['resourceName'];
			}
			else
			{
				$val['parentName'] = '顶级功能';
			}
		}
		$data['navlist'] = $navlist;
		$this->load->view('adminnav/funcindex',$data);
		$this->load->view('public/footer');
	}

	//功能删除
	public function delfunc()
	{
		//接受ID
		$rid = $this->uri->segment(3);
		$res = $this->adminnav->del($rid);
		echo "<script>window.location.href='".site_url('adminnav/funcindex')."'</script>";
	}
}