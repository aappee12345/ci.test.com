<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends Homebase {

	public function __construct()
	{
		parent::__construct();
		//echo 111;exit;
		$this->load->model('articlemodel','article',TRUE);
		$this->load->model('categorymodel','category',TRUE);
	}
	public function index()
	{
		$data['area']= strtolower($this->uri->segment(1));
		$area = ucwords($this->uri->segment(1));
		//查询区域中文字
		$areaInfo = $this->db->where(array('area_pinyin'=>$area))->get('area')->row_array();
		$pre = $areaInfo['area_name'];
		if ($pre==''&&$this->uri->segment(1)!='')
		{
			show_404('');
		}
		$data['logo'] = $this->logo;
		$data['logo1'] = $this->logo1;
		$data['AdList'] = $this->guanggaolist;

		//查询头部菜单及尾部菜单
		$navlist = $this->db->where(array('p_id'=>0))->get('category')->result_array();
		$headnavlist = array();
		$footnavlist = array();
		foreach ($navlist as $nav)
		{
			switch ($nav['c_is_nav'])
			{
				//不显示
				case 0:;
				break;
				//在头部显示
				case 1:
				$headnavlist[] = $nav;
				break;
				//在尾部显示
				case 2:
				$footnavlist[] = $nav;
				break;
				//头部尾部都显示
				case 3:
				$headnavlist[] = $nav;
				$footnavlist[] = $nav;
				break;
			}
		}		
		$data['headnavlist'] = $headnavlist;
		$data['footnavlist'] = $footnavlist;

		$net = $this->db->get_where('net',array('n_id'=>1))->row_array();
		$data['net_title'] = $pre.$net['n_name'];
		$keys = explode(',', $net['n_keys']);
		foreach ($keys as &$k1)
		{
			$k1 = $pre.$k1;
		}
		$keys = implode(',', $keys);
		//$data['net_keys'] = $pre.$net['n_keys'];
		$data['net_keys'] = $keys;
		$data['net_description'] = $per.$net['n_description'];

		$ewm = $this->ewm;
		$data['ewm'] = strstr($ewm['co_pic'],'/upload');
		$weixin = $this->weixin;
		$data['weixin'] = strstr($weixin['co_pic'],'/upload');
		$tel = $this->tel;
		$data['tel'] = strip_tags($tel['co_content']);
		$phone = $this->phone;
		$data['phone'] = strip_tags($phone['co_content']);
		$copy = $this->copy;
		$data['copy'] = strip_tags($copy['co_content']);
		$beian = $this->beian;
		$data['beian'] = strip_tags($beian['co_content']);
		$address = $this->address;
		$data['address'] = strip_tags($address['co_content']);
		$qq = $this->qq;
		$data['qq'] = strip_tags($qq['co_content']);


		//根据标识顺序查询顶级分类
		$cates = $this->db->where(array('c_biaoshi <>'=>0))->order_by('c_biaoshi asc')->get('category')->result_array();
		foreach ($cates as $cate)
		{
			$key = 'cate'.$cate['c_biaoshi'];
			$data['has_'.$key] = 1;
			//各标识的顶级分类信息
			$data[$key] = $cate;
			//判断ctype
			$this->category->getallnextcids($cate['c_id']);
			$cids = $cate['c_id'].$this->category->cids;
			$cids = explode(',', $cids);
			$this->category->cids = '';
			//echo $cids;
			if ($cate['c_type']==1)
			{
				//单页,获取所有子分类
				$data[$key]['article'] = $this->db->where_in('a_cid',$cids)->get('article')->row_array();
			}
			else
			{
				
				//其他列表页
				$data[$key]['articlelist'] = $this->db->where_in('a_cid',$cids)->get('article')->result_array();
			}
		}

		//var_dump($data['cate2']['article']);
		//所有分类列表信息
		$data['allcates'] = $this->db->get('category')->result_array();

		
		/*友情链接*/
		$data['linklist'] = $this->db->where(array('l_class'=>1))->get('link')->result_array();
		
		$data['is_seo'] = $this->is_seo['seo_status'];
		$this->load->view('public/header',$data);
		$this->load->view('index/index');
		$this->load->view('public/footer');
	}
}
