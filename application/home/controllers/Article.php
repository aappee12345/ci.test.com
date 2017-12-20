<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends Homebase
{
	public function __construct()
	{

		parent::__construct();

		$this->load->model('articlemodel','article',TRUE);
		$this->load->model('categorymodel','category',TRUE);
		//echo 111;exit;
	}

	public function index()
	{
		$data['is_seo'] = $this->is_seo['seo_status'];
		if ($data['is_seo']==1)
		{
			$data['area']= strtolower($this->uri->segment(4));
			$area = ucwords($this->uri->segment(4));

			$areaInfo = $this->db->where(array('area_pinyin'=>$area))->get('area')->row_array();
			$pre = $areaInfo['area_name'];
			if ($pre==''&&$this->uri->segment(4)!='')
			{
				show_404('');
			}
		}
		
		$data['logo'] = $this->logo;
		$data['logo1'] = $this->logo1;
		$data['AdList'] = $this->guanggaolist;
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
		//查询文章列表
		$data['cid'] = $cid = $this->uri->segment(3);
		//6.获取当前栏目列表分页信息
		$thiscate = $this->db->get_where('category',array('c_id'=>$cid))->row_array();
		$data['net_title'] = $thiscate['c_title']?$thiscate['c_title']:$net['n_co_name'];
		if ($data['net_title']!=$net['n_co_name'])
		{
			$data['net_title'] = $pre.$data['net_title'].'_'.$pre.$net['n_co_name'];
		}
		else
		{
			$data['net_title'] = $pre.$data['net_title'];
		}

		$data['net_keys'] = $thiscate['c_keys']?$thiscate['c_keys']:$net['n_keys'];
		$keys = explode(',', $data['net_keys']);
		foreach ($keys as &$k1)
		{
			$k1 = $pre.$k1;
		}
		$nav_keys = $keys[0];
		$keys = implode(',', $keys);

		//$data['net_keys'] = $pre.$net['n_keys'];
		$data['net_keys'] = $keys;
		$data['net_description'] = $thiscate['c_description']?$thiscate['c_description']:$net['n_description'];

		//1.获取当前栏目下的子栏目列表
		$data['soncatelist'] = $this->category->getSonCate($cid);

		//2.获取当前顶级栏目下的所有栏目，以递归方式排序
		//$allcatelist = $this->category->getAllSonCate($cid);
		//var_dump($allcatelist);exit;
		//3.获取当前栏目所在位置信息
		if ($data['is_seo']==1)
		{
			$this->category->position = '';
			$this->category->getCatePosition($cid,$data['area'],$pre);
			$data['position'] = $this->category->position;
			$data['position'] = str_replace('网站首页', $nav_keys,$data['position']);
			$this->category->position = '';
		}
		else
		{
			$data['position'] = '';
		}
		//4.获取返回上一页信息  $return为链接字符串或者为boolean型FALSE

		
		$data['returnurl']  = $this->category->getReturn($cid);

		//5.获取当前栏目列表下所有文章信息
		//$allarticlelist = $this->article->getAllArticle($cid);
		//5.获取当前栏目列表下默认栏目下所有文章信息
		//$defaultcatearticlelist = $this->article->getAllArticle($did);
		
		//7.获取顶级分类ID
		$data['cate'] = $topcate = $this->category->getThisTop($cid);
		$data['topcid'] = $topcate['c_id'];

		//如若没有子栏目且不为顶级栏目 则加载当前同级栏目列表
		if (empty($data['soncatelist'])&&$thiscate['c_level']!=0)
		{
			$data['soncatelist'] = $this->category->getSonCate($thiscate['p_id']);
		}
		if ($thiscate['c_type']==3)
		{
			foreach ($data['soncatelist'] as &$val)
			{
				$val['c_name'] = $pre.$val['c_name'];
			}
		}
		
		$this->category->cids = '';
		$this->category->getallnextcids($cid);
		$cids = $cid.$this->category->cids;
		$this->category->cids = '';
		$condition = array();		
		$where_in = explode(',', $cids);
		$this->load->library('pagination');
		$perPage = $thiscate['c_page_num'];
		//$config['base_url'] = site_url(array('article','index',$cid));
		$config['base_url'] = base_url(array('Article','index',$cid,$area));
		$config['total_rows'] = $this->db->where_in('a_cid',$where_in)->count_all_results('article');//总数量

		if ($pre=='')
		{
			$po = 4;
		}
		else
		{
			$po = 5;
		}

		$config['per_page'] = $perPage;
		$config['uri_segment'] = $po;
		$config['first_link']= '首页';  
        $config['next_link']= '下一页';  
        $config['prev_link']= '上一页';  
        $config['last_link']= '末页'; 

		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();
		$offset = $this->uri->segment($po)?$this->uri->segment($po):0;
		$this->db->limit($perPage,$offset);

		
		$data['articlelist'] = $this->article->check($condition,$where_in);
		if ($thiscate['c_type']==3)
		{
			foreach ($data['articlelist'] as &$value)
			{
				$value['a_fulltitle'] = $pre.$value['a_fulltitle'];
			}
		}


		$data['totals'] = $config['total_rows'];
		$data['per'] = $config['per_page'];
		$data['logo'] = $this->logo;
		$data['AdList'] = $this->guanggaolist;


		//判断页面版式
		switch ($thiscate['c_type'])
		{
			//单页
			case 1:
			$this->load->view('public/header',$data);
			$this->load->view('article/single');
			$this->load->view('public/footer');
			break;
			//新闻列表页
			case 2:
			$this->load->view('public/header',$data);
			$this->load->view('article/list');
			$this->load->view('public/footer');
			break;
			//图片列表页
			case 3:
			$this->load->view('public/header',$data);
			$this->load->view('article/picture');
			$this->load->view('public/footer');
			break;
			//下载列表页
			case 4:
			$this->load->view('public/header',$data);
			$this->load->view('article/download');
			$this->load->view('public/footer');
			break;
			//问答列表页
			case 5:
			$this->load->view('public/header',$data);
			$this->load->view('article/answerlist');
			$this->load->view('public/footer');
			break;
		}
		//加载页面
	}

	public function content()
	{
		$data['is_seo'] = $this->is_seo['seo_status'];
		if ($data['is_seo']==1)
		{
			$data['area']= strtolower($this->uri->segment(4));
			$area = ucwords($this->uri->segment(4));
			$areaInfo = $this->db->where(array('area_pinyin'=>$area))->get('area')->row_array();
			$pre = $areaInfo['area_name'];
		}
		
		$data['logo'] = $this->logo;
		$data['logo1'] = $this->logo1;
		$data['AdList'] = $this->guanggaolist;

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


		$id = $this->uri->segment(3);
		//1.文章点击量加1，并获取文章信息
		$net = $this->db->where(array('n_id'=>1))->get('net')->row_array();
		//$a = $this->db->where('a_id='.$id)->get('article')->row_array();
		$this->db->set('a_click', 'a_click+1', FALSE);
		$this->db->where('a_id', $id);
		$this->db->update('article'); 

		$data['article'] = $article = $this->db->where(array('a_id'=>$id))->get('article')->row_array();
		$cid = $article['a_cid'];
		//2.获取当前文章所属栏目及其同级栏目列表
		$thiscate = $this->db->where(array('c_id'=>$cid))->get('category')->row_array();
		
		if ($thiscate['c_type']!="3")
		{
			$pre = '';
		}
		$data['net_title'] = $article['a_title']?$article['a_title']:$net['n_co_name'];

		if ($data['net_title']!=$net['n_co_name'])
		{
			$data['net_title'] = $pre.$data['net_title'].'_'.$pre.$net['n_co_name'];
		}
		else
		{
			$data['net_title'] = $pre.$article['a_fulltitle'].'_'.$pre.$net['n_co_name'];
		}
		//$data['net_title'] = $pre.$data['net_title'];
		
		//$data['net_keys'] = $article['a_keys']?$article['a_keys']:$net['n_keys'];
		$data['net_keys'] = $article['a_keys']?$article['a_keys']:'';

		$keys = explode(',', $data['net_keys']);
		$contkey = $keys[0];
		foreach ($keys as &$k1)
		{
			$k1 = $pre.$k1;
		}
		$keys = implode(',', $keys);
		//$data['net_keys'] = $pre.$net['n_keys'];
		$data['net_keys'] = $keys;
		//$data['net_description'] = $article['a_description']?$article['a_description']:$net['n_description'];
		$data['net_description'] = $article['a_description']?$article['a_description']:mb_substr(strip_tags($article['a_content']),0,100,'utf-8');
		
		//如若没有子栏目且不为顶级栏目 则加载当前同级栏目列表
		if (empty($data['soncatelist'])&&$thiscate['c_level']!=0)
		{
			$data['soncatelist'] = $this->category->getSonCate($thiscate['p_id']);
		}
		if ($thiscate['c_type']==3)
		{
			foreach ($data['soncatelist'] as &$cate)
			{
				$cate['c_name'] = $pre.$cate['c_name'];
			}
			$data['article']['a_fulltitle'] = $pre.$data['article']['a_fulltitle'];
		}

		//3.获取当前顶级栏目下的所有栏目，以递归方式排序
		//$allcatelist = $this->category->getAllThisCate($cid);
		//4.获取当前栏目所在位置信息

		if ($data['is_seo']==1)
		{
			$this->category->position = '';
			$this->category->getCatePosition($cid,$data['area'],$pre);
			$data['position'] = $this->category->position." &gt; ".$pre.$article['a_fulltitle'];
			if ($contkey!='')
			{
				$data['position'] = str_replace('网站首页',$contkey,$this->category->position." &gt; ".$pre.$article['a_fulltitle']);
			}
			$this->category->position = '';
		}
		else
		{
			$data['position'] = '';
		}
		


		//5.获取上一篇下一篇信息[$npinfo['prev']|$npinfo['next']|(url&title)]
		$data['npinfo'] = $this->article->getNPInfo($id,$data['area'],$pre);
		$acid = array();//$acid为数组，数组元素为文章或产品顶级分类ID
		//6.获取推荐文章最多10篇
		$this->category->getallnextcids(4);
		$data['recommendarticle'] = $this->article->getRecommend(4,$this->category->cids);
		//7.获取热门产品最多5个
		$this->category->getallnextcids(3);
		//p($this->category->cids);
		$data['hotproduct'] = $this->article->getHot(3,$this->category->cids,$pre);
		//8.获取顶级分类ID
		$data['cate'] = $topcate = $this->category->getThisTop($cid);
		$data['returnurl']  = $this->category->getReturn($cid);
		$data['topcid'] = $topcate['c_id'];


		$data['logo'] = $this->logo;
		$data['AdList'] = $this->guanggaolist;
		$thiscate = $this->db->where(array('c_id'=>$cid))->get('category')->row_array();

		
		//判断页面版式
		$this->load->view('public/header',$data);
		$this->load->view('article/content');
		$this->load->view('public/footer');	
	}
}