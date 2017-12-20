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
class Link extends Homebase
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('usersessionmodel','usersession',TRUE);
		$this->load->model('netmodel','nets',TRUE);
		$this->load->model('linktypemodel','linktype',TRUE);
		$this->load->model('linkmodel','link',TRUE);
		$this->load->model('logmodel','logs',TRUE);
		
	}

	//友情链接列表
	public function index()
	{
		$header['title'] = "友情链接管理";
		$header['keywords'] = "友情链接管理";
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'61');
		$header['version'] = require(APP_ROOT . 'config' . DIRECTORY_SEPARATOR . 'version.php');
		$header['n_name'] = $this->n_name['n_name'];
		$this->load->view('public/header',$header);
		$this->load->view('public/top');
		//$data['adminmenulist'] = $this->admininit();
		$data['act'] = 'linklist';
		$this->load->view('public/left',$data);
		unset($data['act']);
		$data['lt_id'] = $lt_id = $this->uri->segment(3);
		$three = $this->uri->segment(4);
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
						修改友情链接成功！
					</p>
				</div>
				<a href='.site_url(array("Link","index",$lt_id)).'><div class="return">返回列表</div></a>
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
						删除友情链接成功！
					</p>
				</div>
				<a href='.site_url(array("Link","index",$lt_id)).'><div class="return">返回列表</div></a>
			</div>
			';
		}
		elseif ($three === 'batchdelsucess')
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
						批量删除友情链接成功！
					</p>
				</div>
				<a href='.site_url(array("Link","index",$lt_id)).'><div class="return">返回列表</div></a>
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
						请在要删除的友情链接前的方框内打勾！
					</p>
				</div>
				<a href='.site_url(array("Link","index",$lt_id)).'><div class="return">返回列表</div></a>
			</div>
			';
		}
		elseif ($three === 'existslink')
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
						请先删除该分类下的友情链接！
					</p>
				</div>
				<a href='.site_url(array("Linktype","index")).'><div class="return">返回列表</div></a>
				<a href='.site_url(array("Link","index",$lt_id)).'><div class="ok">删除链接</div></a>
			</div>
			';
		}
		//分页
		//$condition['keys'] = isset($_POST['keys'])?$_POST['keys']:'';
		$this->load->library('pagination');
		$perPage = 15;
		$config['base_url'] = site_url('link/index/'.$lt_id);
		//$config['total_rows'] = $this->db->like('l_operator', $condition['keys'], 'both')->or_like('l_case', $condition['keys'], 'both')->count_all_results('log');
		if ($lt_id)
		{
			$config['total_rows'] = $data['count'] = $this->db->where(array('l_class'=>$lt_id))->count_all_results('link');
		}
		else
		{
			$config['total_rows'] = $data['count'] = $this->db->count_all_results('link');
		}
		
		$config['per_page'] = $perPage;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		//$data['links'] = $this->pagination->create_links();
		
		$offset = $this->uri->segment(4);
		//$this->db->limit($perPage,$offset);
		$data['offset'] = $offset?$offset:0;





		$data['linklist'] = $this->link->check($lt_id);
		//p($data['linklist']);
				
		$this->load->view('link/index',$data);
		$this->load->view('public/footer');
	}

	//友情链接添加
	public function add()
	{
		$header['title'] = "友情链接添加";
		$header['keywords'] = "友情链接添加";
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'62');
		$header['version'] = require(APP_ROOT . 'config' . DIRECTORY_SEPARATOR . 'version.php');
		$header['n_name'] = $this->n_name['n_name'];
		$this->load->view('public/header',$header);
		$this->load->view('public/top');
		//$data['adminmenulist'] = $this->admininit();
		$data['linktypelist'] = $this->linktype->check();
		$data['lt_id'] = $lt_id = $this->uri->segment(3);
		$data['act'] = 'addlink';
		$this->load->view('public/left',$data);
		unset($data['act']);
		$three = $this->uri->segment(4);
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
						添加友情链接成功！
					</p>
				</div>
				<a href='.site_url(array("Link","index",$lt_id)).'><div class="return">返回列表</div></a>
				<a href='.site_url(array("Link","add",$lt_id)).'><div class="ok">继续添加</div></a>
			</div>
			';
		}
		if (IS_POST)
		{
			$this->load->library('form_validation');
			$status = $this->form_validation->run('link');
			$res = false;
			if ($status)
			{
				//获取链接尺寸
				$id = $this->input->post('l_class');
				$res1 = $this->linktype->find_linktype($id);
				//验证通过 上传图片
				if ($_FILES['l_wzlogourl']['error']==0)
				{
					//链接分类页面配置此参数 默认300 100
					$width = $res1['lt_width'];
					$height = $res1['lt_height'];
					$is_water = 0;
					$_POST['l_wzlogourl'] = $this->uploadImg($width,$height,$is_water);
				}
				else
				{
					$_POST['l_wzlogourl'] = $this->input->post('l_file');
				}
				$res = $this->link->insert_link();
			}
			if ($res!=false)
			{
				$lt_id = $this->input->post('l_class');
				$username = $header['user']['ma_username'];
				$this->logs->addLog('添加友情链接成功！',$username);
				//echo "<script>alert('添加友情链接成功！');window.location.href='".site_url(array('Link','index',$lt_id))."'</script>";
				echo "<script>window.location.href='".site_url(array('Link','add',$lt_id,'addsuccess'))."'</script>";
				exit;
			}
		}

		$this->load->view('link/add');
		$this->load->view('public/footer');
	}
	
	//友情链接修改
	public function update()
	{
		$header['title'] = "友情链接修改";
		$header['keywords'] = "友情链接修改";
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'63');
		$header['n_name'] = $this->n_name['n_name'];
		$this->load->view('public/header',$header);
		$this->load->view('public/top');
		$data['linktypelist'] = $this->linktype->check();
		//$data['adminmenulist'] = $this->admininit();
		$data['act'] = 'updatelink';
		$this->load->view('public/left',$data);
		unset($data['act']);
		if (IS_POST)
		{
			$this->load->library('form_validation');
			$status = $this->form_validation->run('link');
			$res = false;
			if ($status)
			{
				//验证通过 上传图片
				//获取链接尺寸
				$id = $this->input->post('l_class');
				$res1 = $this->linktype->find_linktype($id);
				//验证通过 上传图片
				$l_id = $this->input->post('l_id');
				if ($_FILES['l_wzlogourl']['error']==0)
				{
					//删除旧记录图片
					$link = $this->link->find_link($l_id);
					if(file_exists('.'.strstr($link['l_wzlogourl'],'/upload/link/')))
					{
						@unlink('.'.strstr($link['l_wzlogourl'],'/upload/link/'));
					}
					//链接分类页面配置此参数 默认300 100
					$width = $res1['lt_width'];
					$height = $res1['lt_height'];
					$is_water = 0;
					$_POST['l_wzlogourl'] = $this->uploadImg($width,$height,$is_water);
				}
				else
				{
					$_POST['l_wzlogourl'] = $this->input->post('l_file');
				}
				
				$res = $this->link->update_link($l_id);
				$l_class = $this->input->post('l_class');
				//var_dump($l_class);
			}
			if ($res!=false)
			{
				$username = $header['user']['ma_username'];
				$this->logs->addLog('修改友情链接成功！',$username,$id);
				//echo "<script>alert('修改友情链接成功！');window.location.href='".site_url(array('Link','index',$l_class))."'</script>";
				echo "<script>window.location.href='".site_url(array('Link','index',$l_class,'updatesuccess'))."'</script>";
				exit;
			}
		}
		$id = $this->uri->segment(3);
		$data['link'] = $this->link->find_link($id);
		$this->load->view('link/update',$data);
		$this->load->view('public/footer');
	}

	//友情链接删除
	public function delLink()
	{
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'64');
		$id = $this->uri->segment(3);
		$condition['l_id'] = $id;
		$link = $this->db->where($condition)->get('link')->row_array();
		$status = $this->link->doDel($id);
		if ($status)
		{
			//删除成功
			$username = $header['user']['ma_username'];
			$this->logs->addLog('删除友情链接成功！',$username,$id);
			echo "<script>window.location.href='".site_url(array('link','index',$link['l_class'],'delsuccess'))."'</script>";
			exit;
		}
	}

	//批量删除友情链接
	public function batchDelLink()
	{
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'64');
		$CheckIDs = $this->input->post('IDCheck');
		if ($CheckIDs==null)
		{
			$l_class = $this->input->post('l_class');
			echo "<script>window.location.href='".site_url(array('link','index',$l_class,'kong'))."'</script>";
			exit;
		}
		$id = $CheckIDs[0];
		$link = $this->link->find_link($id);
		$flag = false;
		foreach ($CheckIDs as $value)
		{
			$status = $this->link->doDel($value);
			if ($status&&($flag===false))
			{
				$flag = true;
			}
		}
		//删除成功
		if ($flag===true)
		{
			$username = $header['user']['ma_username'];
			$this->logs->addLog('批量删除友情链接成功！',$username,implode(',', $CheckIDs));
			//echo "<script>alert('批量删除友情链接成功！');window.location.href='".site_url(array('link','index',$link['l_class']))."'</script>";
			echo "<script>window.location.href='".site_url(array('link','index',$link['l_class'],'batchdelsucess'))."'</script>";
			exit;
		}
	}

	public function ajaxsort()
	{
		if (IS_AJAX)
		{
			$arr['l_id'] = $this->input->post('id');
			$arr['l_sort'] = $this->input->post('sort');
			//查询当前选择分类的子分类
			$res = $this->link->ajaxupdate_sort($arr);
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
		$config1['upload_path']      = './upload/link/';
        $config1['allowed_types']    = 'gif|jpg|png';
        $config1['max_size']         = 8192;//允许上传文件大小的最大值（单位 KB），设置为 0 表示无限制 
        $config1['max_width']        = 0;//图片的最大宽度（单位为像素），设置为 0 表示无限制
        $config1['max_height']       = 0;//图片的最大高度（单位为像素），设置为 0 表示无限制
        $config1['encrypt_name']     = true;//如果设置为 TRUE ，文件名将会转换为一个随机的字符串 

        $this->load->library('upload', $config1);

        if (!$this->upload->do_upload('l_wzlogourl'))
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
			@unlink($data['info']['upload_data']['full_path']);
		}
		return str_replace('.','_thumb.',$data['info']['upload_data']['full_path']);
	}
}