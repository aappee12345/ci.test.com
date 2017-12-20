<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area extends Homebase
{
	public $flag = false;

	public function __construct()
	{

		parent::__construct();

		$this->load->model('areamodel','area',TRUE);
	}

	public function index()
	{
		$ewm = $this->ewm;
		$data['ewm'] = strstr($ewm['co_pic'],'/upload');
		$weixin = $this->weixin;
		$data['weixin'] = strstr($weixin['co_pic'],'/upload');
		$tel = $this->tel;
		$data['tel'] = strip_tags($tel['co_content']);
		$copy = $this->copy;
		$data['copy'] = strip_tags($copy['co_content']);
		$beian = $this->beian;
		$data['beian'] = strip_tags($beian['co_content']);
		$net = $this->db->get_where('net',array('n_id'=>1))->row_array();
		$keys = explode(',', $net['n_keys']);
		$data['net_keys'] = $keys;

		$data['arealist'] = $this->area->check();
		$list = $this->area->checkabc();
		for($i=65,$j=0;$i<91;$i++,$j++)
		{
			$this->flag = false;
			//判断是否有首字母匹配的地区
			foreach ($list as $k=>$area)
			{
				//$r = strrpos($area['area_pinyin'],chr($i));
				$first = substr($area['area_pinyin'],0,1);
				if (chr($i)===$first)
				{
					//当前记录匹配当前循环字母
					$flag = true;
					$this->flag = true;
					$areaabc[$j]['areas'][$k]['area_name'] = $area['area_name'];
					$areaabc[$j]['areas'][$k]['area_pinyin'] = strtolower($area['area_pinyin']);
				}
				else
				{
					//当前记录不匹配当前循环字母
					$flag = false;
				}
			}
			if ($this->flag===true)
			{
				$areaabc[$j]['zimu'] = chr($i);
			}
		}
		$data['arealists'] = $areaabc;
		$this->load->view('area/index',$data);
	}
}