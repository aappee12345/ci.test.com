<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Homebase extends CI_Controller {
    public $logo;//电脑版头部LOGO
    public $logo1;//电脑版头部LOGO
	public $guanggaolist;//电脑版幻灯片
	public $ewm;//二维码
	public $weixin;//微信咨询
	public $tel;//电话
	public $phone;//手机
	public $copy;//版权
	public $beian;//备案号
	public $address;//地址
	public $qq;//qq
	public $is_seo;


	function __construct()
	{

		parent::__construct();
		$this->load->helper('url');
		$this->load->model('guanggaomodel','guanggao',TRUE);
		//获取LOGO
		$logo = $this->db->get_where('common',array('co_id'=>5))->row_array();
		$logo1 = $this->db->get_where('common',array('co_id'=>29))->row_array();
		$this->logo = strstr($logo['co_pic'],'/upload');
		$this->logo1 = strstr($logo1['co_pic'],'/upload');
		//获取轮播图
		$this->guanggaolist = $this->guanggao->check(1);
		$this->ewm = $this->db->get_where('common',array('co_id'=>16))->row_array();
		$this->weixin = $this->db->get_where('common',array('co_id'=>10))->row_array();
		$this->tel = $this->db->get_where('common',array('co_id'=>8))->row_array();
		$this->phone = $this->db->get_where('common',array('co_id'=>19))->row_array();
		$this->copy = $this->db->get_where('common',array('co_id'=>2))->row_array();
		$this->beian = $this->db->get_where('common',array('co_id'=>15))->row_array();
		$this->address = $this->db->get_where('common',array('co_id'=>3))->row_array();
		$this->qq = $this->db->get_where('common',array('co_id'=>17))->row_array();

		define(URLS,$_SERVER['HTTP_HOST']);
		$this->file_url = '';
		$net = $this->db->where(array('n_id'=>1))->get('net')->row_array();
		$this->data_url = $net['n_url'].'/index.php/User/check_seo/'.URLS; 
		$this->is_seo = $this->getFileData();
		if ($net['u_url']!='http://zhukong.test.com')
		{
			$this->data_url = $net['n_url'].'/index.php/User/check_seo/'.URLS; 
			$this->is_seo = $this->getFileData();
			$keyl = $net['key'];
			$this->data_url = $net['n_url'].'/index.php/User/check_key/'.$keyl.URLS;
			/* 
			$this->is_status = $this->getFileData();
			if ($this->is_status['status']==0)
			{
				echo "授权码无效或已过期！";
				exit;
			}
			*/
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