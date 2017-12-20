<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Homebase extends CI_Controller {
    public $logo;//手机版LOGO
    public $logo1;//手机版尾部LOGO
	public $guanggaolist;//手机版幻灯片
	public $ewm;//二维码
	public $weixin;//微信咨询
	//public $tel;//电话
	public $phone;//手机
	public $copy;//版权
	public $beian;//备案号
	public $address;//地址
	public $qq;

	function __construct()
	{

		parent::__construct();
		$this->load->helper('url');
		$this->load->model('guanggaomodel','guanggao',TRUE);
		//获取LOGO
		$logo = $this->db->get_where('common',array('co_id'=>14))->row_array();
		$this->logo = strstr($logo['co_pic'],'/upload');
		/*
		$logo1 = $this->db->get_where('common',array('co_id'=>14))->row_array();
		$this->logo1 = strstr($logo1['co_pic'],'/upload');
		*/
		//获取轮播图
		$this->guanggaolist = $this->guanggao->check(15);
		$this->ewm = $this->db->get_where('common',array('co_id'=>16))->row_array();
		$this->weixin = $this->db->get_where('common',array('co_id'=>10))->row_array();
		//$this->tel = $this->db->get_where('common',array('co_id'=>8))->row_array();
		$this->phone = $this->db->get_where('common',array('co_id'=>18))->row_array();
		$this->copy = $this->db->get_where('common',array('co_id'=>2))->row_array();
		$this->beian = $this->db->get_where('common',array('co_id'=>15))->row_array();
		$this->address = $this->db->get_where('common',array('co_id'=>3))->row_array();
		$this->qq = $this->db->get_where('common',array('co_id'=>17))->row_array();
	}

}