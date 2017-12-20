<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Muban extends Homebase {

	private $file_url;
	private $data_url;
	private $url;
	private $copyfailnum;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('usersessionmodel','usersession',TRUE);
		$this->load->model('netmodel','nets',TRUE);
		$this->load->model('logmodel','logs',TRUE);
		$this->load->model('Zipmodel','zips',TRUE);
		$banben = $this->uri->segment(3);
		define(CMS_VERSION,$banben);
		$this->file_url = '';
		$net = $this->db->where(array('n_id'=>1))->get('net')->row_array();
		$this->url = $net['n_url'];
		$this->data_url = $net['n_url'].'/index.php/Muban/is_sel/'.$_SERVER['HTTP_HOST'];
	}

	public function index()
	{
		$header['title'] = "模板管理";
		$header['keywords'] = "模板管理";
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'11');
		$header['version'] = require(APP_ROOT . 'config' . DIRECTORY_SEPARATOR . 'version.php');
		$header['n_name'] = $this->n_name['n_name'];
		$data['url'] = $this->url;
		$data['act'] = 'mbgl';
		//判断当前是否支持选择模板
		$arr = $this->getFileData();
		$is_sel_muban = $arr['is_sel'];
		if ($is_sel_muban=='1')
		{
			$this->data_url = $this->url.'/index.php/Muban/mubancheck';
			$data['mubanlist'] = $this->getFileData();
			$net = $this->db->where(array('n_id'=>1))->get('net')->row_array();
			$data['mb_id'] = $net['mb_id'];
		}

		$this->load->view('public/header',$header);
		$this->load->view('public/top');
		$this->load->view('public/left',$data);
		//查询网站配置信息
		$this->load->view('muban/index',$data);
		$this->load->view('public/footer');
	}



	//处理下载安装模板
	public function download()
	{
		
		$res = fn_check_url();
		if ($res != null)
		{
			echo "<script>alert(".$res.");window.history.go(-1);</script>";
			exit;
		}
		$dir = APP_ROOT . 'cache' . DIRECTORY_SEPARATOR . 'muban' . DIRECTORY_SEPARATOR;
		if (!is_dir($dir)) {
		    //创建升级文件临时目录
		    mkdir($dir, 0777,true);
		}
		$id = $this->uri->segment(3);
		$this->data_url = $this->url.'/index.php/Muban/mubanfind/'.$id;
		$data[0] = $this->getFileData();
		
		if ($data) 
		{
			//var_dump($data);exit;
			foreach($data as $t) 
			{
                $v = date('Y-m-d', $t['updated_at']);
                $version = $t['b_banben'];
                $net = $this->db->where(array('n_id'=>1))->get('net')->row_array();
                $upgradezip_url = $this->url.$t['mu_zip'];				

				//保存到本地地址
				$upgradezip_path = $dir . 'mbdz' . $t['mu_id'] . '.zip';
				//var_dump($upgradezip_url);
				//var_dump($upgradezip_path);exit;
				//下载压缩包
				@file_put_contents($upgradezip_path, fn_geturl($upgradezip_url));
				if (filesize($upgradezip_path) == 0) 
				{
					echo "<script>alert('下载压缩包失败！');window.history.go(-1);</script>";
				}

				//解压缩
				//打开一个zip压缩包
				$src_file = 'cache/muban/mbdz'.$t['mu_id'].'.zip';
				//解压路径->根目录
				$dest_dir = './';
				$file_name = $this->zips->unzip($src_file, $dest_dir, $create_zip_name_dir=true, $overwrite=true);
				if (file_exists($src_file))
				{
					@unlink($src_file);
				}

			}
			//提示安装成功
			$this->db->set('mb_id', $t['mu_id']);
			$this->db->where('n_id', 1);
			$this->db->update('net');
			echo 
			'<style>
				body{overflow:hidden;}
				.notice{display:block;position:absolute;top:0;width: 100%;height:100%;background: rgba(0,0,0,0.6);z-index:100;}
				.info{position:fixed;left:50%;top:50%;width: 340px;height:200px;margin-left: -170px;margin-top: -100px;background: #fff;z-index:101;border-radius:6px;}
				.info a{text-decoration:none;}
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
						模板安装成功！
					</p>
				</div>
				<a href='.site_url(array("Muban","index")).'><div class="return">返回列表</div></a>
			</div>
			';
			exit;
		} 
		else 
		{
			//提示安装失败
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
						模板安装失败！
					</p>
				</div>
				<a href='.site_url(array("Muban","index")).'><div class="return">返回列表</div></a>
			</div>
			';
			exit;
		   // $this->adminMsg('远程数据不存在', purl('admin'));
		}
	}

	/**
	 * 获取CMS版本信息
	 */
	private function getFileData() {
	    $string = fn_geturl($this->data_url);
	    $data = $string ? json_decode($string) : array();
		if (empty($data)) {
            return array();
        }
		return $this->object_to_array($data);
	}

	/**
	 * 对象转换为数组
	 */
	private function object_to_array($obj) { 
		$_arr = is_object($obj) ? get_object_vars($obj) : $obj; 
		foreach ($_arr as $key => $val) { 
			$val = (is_array($val) || is_object($val)) ? $this->object_to_array($val) : $val; 
			$arr[$key] = $val; 
		}
		return $arr;
	}

}