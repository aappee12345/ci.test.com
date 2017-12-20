<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Net extends Homebase {

	private $file_url;
	private $data_url;
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
		$this->data_url = $net['n_url'].'/index.php/Net/check_version/'.CMS_VERSION; 

	}

	public function index()
	{
		$header['title'] = "网站配置";
		$header['keywords'] = "网站配置";
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'11');
		$header['version'] = require(APP_ROOT . 'config' . DIRECTORY_SEPARATOR . 'version.php');
		$header['n_name'] = $this->n_name['n_name'];
		//site_url(); 用于获取方法路径
		//base_url(); 用于CSS路径
		//redirect('net/index'); 用于跳转
		//判断是否是POST请求
		//$data['adminmenulist'] = $this->admininit();
		$data['act'] = 'peizhi';
		if (IS_POST)
		{
			//表单验证
			$this->load->library('form_validation');
			$res = false;
			$status = $this->form_validation->run('net');
			$net = $this->nets->get_first_net();
			if ($_FILES['water_path']['error']==4)
			{
				//没有上传文件
				if ($_POST['w_file'])
				{
					$_POST['water_path'] = $_POST['w_file'];
				}
			}
			else
			{
				$_POST['water_path'] = $this->uploadWater($net[0]['water_width'],$net[0]['water_height']);
			}
			if ($status)
			{
				//验证通过

				$res = $this->nets->update_net();
				
			}
			//接受参数
		
			$this->load->view('public/header',$header);
			$this->load->view('public/top');
			
			$this->load->view('public/left',$data);
			$net = $this->nets->get_first_net();
			$data['net'] = $net[0];
			$this->load->view('net/index',$data);
			$this->load->view('public/footer');
			
			if ($res)
			{
				$username = $header['user']['ma_username'];
				$this->logs->addLog('修改配置成功！',$username,$data['net']['n_id']);
				//echo "<script>alert('修改配置成功！');</script>";
				//echo '修改配置成功！';
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
							修改配置成功！
						</p>
					</div>
					<div class="ok">确定</div>
				</div>
				';
			}
			elseif (!$res&&$status)
			{
				//echo "<script>alert('修改配置失败！');</script>";
				//echo '修改配置失败！';
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
							修改配置失败！
						</p>
					</div>
					<div class="ok">确定</div>
				</div>
				';
			}
			
		}
		else
		{
			$this->load->view('public/header',$header);
			$this->load->view('public/top');
			$this->load->view('public/left',$data);
			//查询网站配置信息
			$this->load->model('netmodel','nets',TRUE);
			$net = $this->nets->get_first_net();
			$data['net'] = $net[0];
			$this->load->view('net/index',$data);
			$this->load->view('public/footer');
		}
		
	}





	//在线升级
	public function levelUp()
	{

		$header['title'] = "在线升级";
		$header['keywords'] = "在线升级";
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'11');
		$header['version'] = require(APP_ROOT . 'config' . DIRECTORY_SEPARATOR . 'version.php');

		//判断是否是POST请求
		$data['act'] = 'levelup';
		
		$this->load->view('public/header',$header);
		$this->load->view('public/top');
		$this->load->view('public/left',$data);
		//var_dump($header['version']);exit;
		//查询网站配置信息
		$this->load->model('netmodel','nets',TRUE);
		$net = $this->nets->get_first_net();
		
		$data['net'] = $net[0];
		//查询升级信息
		$id = $this->uri->segment(3);
		if ($id!='')
		{
			$this->doLevelUp();
		}
		$this->data_url = $data['net']['n_url'].'/index.php/Net/check_version/';
		//var_dump($this->data_url);exit;
		$data['uplist'] = $this->getFileData();
		//var_dump($data['uplist']);
		$data['config'] = require(APP_ROOT . 'config' . DIRECTORY_SEPARATOR . 'version.php');
		
		$this->load->view('net/levelUp',$data);
		$this->load->view('public/footer');
	}

	//处理在线升级
	public function doLevelUp()
	{
		
		$res = fn_check_url();
		if ($res != null)
		{
			echo "<script>alert(".$res.");window.history.go(-1);</script>";
			exit;
		}
		$dir = APP_ROOT . 'cache' . DIRECTORY_SEPARATOR . 'upgrade' . DIRECTORY_SEPARATOR;
		if (!is_dir($dir)) {
		    //创建升级文件临时目录
		    mkdir($dir, 0777,true);
		}

		$data[0] = $this->getFileData();

		if ($data) 
		{
			foreach($data as $t) 
			{
                $v = date('Y-m-d', $t['updated_at']);
                $version = $t['b_banben'];
                $net = $this->db->where(array('n_id'=>1))->get('net')->row_array();
                $upgradezip_url = $net['n_url'].'/'.$t['b_path'];				
				//保存到本地地址
				$upgradezip_path = $dir . $version . '.zip';
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
				$src_file = 'cache/upgrade/'.$t['b_banben'].'.zip';
				//解压路径->根目录
				$dest_dir = './';
				$file_name = $this->zips->unzip($src_file, $dest_dir, $create_zip_name_dir=true, $overwrite=true);
				if (file_exists($src_file))
				{
					@unlink($src_file);
				}
			}
			//定义数据库文件版本及位置			
			$sqlfile = APP_ROOT . 'data.'.$version.'.sql';
			if (file_exists($sqlfile)) {
			    $sql_name = $this->sql_execute(file_get_contents($sqlfile));
			}
			
			if (file_exists($sqlfile))
			{
				if ($sql_name===true)
				{
					//升级成功
					$content  = "<?php" . PHP_EOL . PHP_EOL . "return array(" . PHP_EOL . PHP_EOL;
	                $content .= "	'CMS'    => 'cqzz', " . PHP_EOL;
	                $content .= "	'name'    => 'cqzz高级版', " . PHP_EOL;
	                $content .= "	'company' => '重庆满荣网络', " . PHP_EOL;
	                $content .= "	'version' => '" . $version . "', " . PHP_EOL;
	                $content .= "	'update'  => '" . $v . "', " . PHP_EOL;
	                $content .= PHP_EOL . ");";
					@file_put_contents(APP_ROOT . 'config' . DIRECTORY_SEPARATOR . 'version.php', $content);
					echo "<script>window.location.href='".site_url(array('net','levelUp'))."';</script>";
				}
				else
				{
					//数据库更新失败
					echo "<script>alert('数据库更新失败!');window.location.href='".site_url(array('net','levelUp'))."';</script>";
				}
			}
			else
			{
				if ($file_name===true)
				{
					//升级成功
					$content  = "<?php" . PHP_EOL . PHP_EOL . "return array(" . PHP_EOL . PHP_EOL;
	                $content .= "	'CMS'    => 'cqzz', " . PHP_EOL;
	                $content .= "	'name'    => 'cqzz高级版', " . PHP_EOL;
	                $content .= "	'company' => '重庆满荣网络', " . PHP_EOL;
	                $content .= "	'version' => '" . $version . "', " . PHP_EOL;
	                $content .= "	'update'  => '" . $v . "', " . PHP_EOL;
	                $content .= PHP_EOL . ");";
					@file_put_contents(APP_ROOT . 'config' . DIRECTORY_SEPARATOR . 'version.php', $content);
					echo "<script>window.location.href='".site_url(array('net','levelUp'))."';</script>";
				}
				else
				{
					//升级失败
					echo "<script>alert('升级失败！');window.location.href='".site_url(array('net','levelUp'))."';</script>";
				}
			}
			//检查update控制器
			//if (is_file(CONTROLLER_DIR . 'UpdateController.php')) $this->adminMsg('正在升级数据，请稍候...', url('update'), 2, 1, 2);
			//$this->adminMsg('升级完成！', purl('admin'), 3, 1, 1);
		} 
		else 
		{
		   // $this->adminMsg('远程数据不存在', purl('admin'));
		}
	}

	/**
	 * 执行SQL
	 */
 	private function sql_execute($sql) {
	    $sqls = $this->sql_split($sql);
 
		if(is_array($sqls)) {
			foreach($sqls as $sql) {
				if(trim($sql) != '') {
					$this->db->query($sql);
				}
			}
		} else {
			$this->db->query($sqls);
		}
		return true;
	}

	private function sql_split($sql) {
		$sql = str_replace("{pre}", 'mr_', $sql);
		$sql = str_replace("\r", "\n", $sql); 
		$ret = array();
		$num = 0;
		$queriesarray = explode(";\n", trim($sql));
		unset($sql);
		foreach($queriesarray as $query) {
			$ret[$num] = '';
			$queries = explode("\n", trim($query));
			$queries = array_filter($queries);
			foreach($queries as $query) {
				$str1 = substr($query, 0, 1);
				if($str1 != '#' && $str1 != '-') $ret[$num] .= $query;
			}
			$num++;
		}
		return($ret);
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


	
	

	/**
	  * 处理图片文件上传
      * @param int $width 缩率图最大宽度
      * @param int $height 缩率图最大高度
      * @param int $water 是否使用水印 0为不使用 1为使用 默认不使用
      */
	public function uploadWater($width=360,$height=210)
	{
		//文件上传
		$config1['upload_path']      = './upload/net/';
        $config1['allowed_types']    = 'gif|jpg|png';
        $config1['max_size']         = 128;//允许上传文件大小的最大值（单位 KB），设置为 0 表示无限制 
        $config1['max_width']        = 0;//图片的最大宽度（单位为像素），设置为 0 表示无限制
        $config1['max_height']       = 0;//图片的最大高度（单位为像素），设置为 0 表示无限制
        $config1['encrypt_name']     = true;//如果设置为 TRUE ，文件名将会转换为一个随机的字符串 

        $this->load->library('upload', $config1);
        $netinfo = $this->nets->get_first_net();
    	if (file_exists($netinfo[0]['water_path']))
    	{
    		unlink($netinfo[0]['water_path']);
    	}

        if (!$this->upload->do_upload('water_path'))
        {
            $data['error'] = array('error' => $this->upload->display_errors());
            echo "<script>alert('".$data['error']['error']."!');window.location.href='".site_url('net/index')."'</script>";
            exit;
        }
        else
        {
        	//上传成功 删除原缩略图
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
		//删除原图
		if (file_exists($data['info']['upload_data']['full_path']))
		{
			unlink($data['info']['upload_data']['full_path']);
		}
		return str_replace('.','_thumb.',$data['info']['upload_data']['full_path']);
	}

}