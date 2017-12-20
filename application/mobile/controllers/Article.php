<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends HomeBase
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
		$data['logo'] = $this->logo;
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
		$qq = $this->qq;
		$data['qq'] = strip_tags($qq['co_content']);
		$address = $this->address;
		$data['address'] = strip_tags($address['co_content']);


		$net = $this->db->get_where('net',array('n_id'=>1))->row_array();
		//查询文章列表
		$data['cid'] = $cid = $this->uri->segment(3);
		//6.获取当前栏目列表分页信息
		$thiscate = $this->db->get_where('category',array('c_id'=>$cid))->row_array();
		$data['net_title'] = $thiscate['c_title']?$thiscate['c_title']:$net['n_co_name'];
		if ($data['net_title']!=$net['n_co_name'])
		{
			$data['net_title'] = $data['net_title'].'_'.$net['n_co_name'];
		}

		$data['net_keys'] = $thiscate['c_keys']?$thiscate['c_keys']:$net['n_keys'];
		$data['net_description'] = $thiscate['c_description']?$thiscate['c_description']:$net['n_description'];

		//1.获取当前栏目下的子栏目列表
		$data['soncatelist'] = $this->category->getSonCate($cid);

		//var_dump($cid);
		//2.获取当前顶级栏目下的所有栏目，以递归方式排序
		$allcatelist = $this->category->getAllSonCate($cid);
		//var_dump($allcatelist);exit;
		//3.获取当前栏目所在位置信息
		$this->category->position = '';
		$this->category->getCatePosition($cid);
		$data['position'] = $this->category->position;
		
		$this->category->position = '';
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
		$this->category->cids = '';
		$this->category->getallnextcids($cid);
		$cids = $cid.$this->category->cids;
		$this->category->cids = '';
		$condition = array();		
		$where_in = explode(',', $cids);
		$this->load->library('pagination');
		$perPage = $thiscate['c_page_num'];
		$config['base_url'] = site_url('/article/index').'/'.$cid;
		$config['total_rows'] = $this->db->where_in('a_cid',$where_in)->count_all_results('article');//总数量
		$config['per_page'] = $perPage;
		$config['uri_segment'] = 4;
		$config['first_link']= '首页';  
        $config['next_link']= '下一页';  
        $config['prev_link']= '上一页';  
        $config['last_link']= '末页'; 

		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();
		$offset = $this->uri->segment(4)?$this->uri->segment(4):0;

		$this->db->limit($perPage,$offset);
		//var_dump($thiscate);
		
		$data['articlelist'] = $this->article->check($condition,$where_in);

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
		$data['logo'] = $this->logo;
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
		$qq = $this->qq;
		$data['qq'] = strip_tags($qq['co_content']);
		$address = $this->address;
		$data['address'] = strip_tags($address['co_content']);


		$id = $this->uri->segment(3);
		//1.文章点击量加1，并获取文章信息
		$net = $this->db->where(array('n_id'=>1))->get('net')->row_array();
		//$a = $this->db->where('a_id='.$id)->get('article')->row_array();
		$this->db->set('a_click', 'a_click+1', FALSE);
		$this->db->where('a_id', $id);
		$this->db->update('article'); 

		$data['article'] = $article = $this->db->where(array('a_id'=>$id))->get('article')->row_array();
		$data['net_title'] = $article['a_title']?$article['a_title']:$net['n_co_name'];
		if ($data['net_title']!=$net['n_co_name'])
		{
			$data['net_title'] = $data['net_title'].'_'.$net['n_co_name'];
		}
		else
		{
			$data['net_title'] = $article['a_fulltitle'].'_'.$net['n_co_name'];
		}
		
		//$data['net_keys'] = $article['a_keys']?$article['a_keys']:$net['n_keys'];
		$data['net_keys'] = $article['a_keys']?$article['a_keys']:'';
		//$data['net_description'] = $article['a_description']?$article['a_description']:$net['n_description'];
		$data['net_description'] = $article['a_description']?$article['a_description']:mb_substr(strip_tags($article['a_content']),0,100,'utf-8');
		$cid = $article['a_cid'];
		//2.获取当前文章所属栏目及其同级栏目列表
		$thiscate = $this->db->where(array('c_id'=>$cid))->get('category')->row_array();
		//如若没有子栏目且不为顶级栏目 则加载当前同级栏目列表
		if (empty($data['soncatelist'])&&$thiscate['c_level']!=0)
		{
			$data['soncatelist'] = $this->category->getSonCate($thiscate['p_id']);
		}
		

		//3.获取当前顶级栏目下的所有栏目，以递归方式排序
		//$allcatelist = $this->category->getAllThisCate($cid);
		//4.获取当前栏目所在位置信息
		$this->category->position = '';

		$this->category->getCatePosition($cid);
		$data['position'] = $this->category->position." &gt; ".$article['a_fulltitle'];

		$this->category->position = '';

		//5.获取上一篇下一篇信息[$npinfo['prev']|$npinfo['next']|(url&title)]
		$data['npinfo'] = $this->article->getNPInfo($id);
		$acid = array();//$acid为数组，数组元素为文章或产品顶级分类ID
		//6.获取推荐文章最多10篇
		$this->category->getallnextcids(4);
		$data['recommendarticle'] = $this->article->getRecommend(4,$this->category->cids);
		//7.获取热门产品最多5个
		$this->category->getallnextcids(3);
		//p($this->category->cids);
		$data['hotproduct'] = $this->article->getHot(3,$this->category->cids);
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

	// public function csubstr($str, $from, $len)
	// {
	//     return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$from.'}'.
	//     '((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$len.'}).*#s',
	//     '$1',$str);
	// }

	/*手机版AJAX分页*/
	public function moreAjax()
	{
		if (IS_AJAX)
		{
			//接收CID 及页数
			$page = $_POST['page']?$_POST['page']:1;
			$pageSize = $_POST['pagesize']?$_POST['pagesize']:6;
			$offset = ($page-1)*$pageSize;
			$cid = (int)$_POST['cid'];
			
			$this->db->limit($pageSize,$offset);
			$ArticleList = $this->db->where(array('a_cid'=>$cid))->order_by('a_sort desc,updated_at desc,a_id desc')->get('article')->result_array();
			foreach ($ArticleList as &$value)
			{
					
				$value['a_pic'] = strstr($value['a_pic'],'/upload');
				$value['url'] = site_url('Article/index').'/'.$value['a_id'];
			
				$value['day'] = date('d',$value['updated_at']);
				$value['M'] = date('M',$value['updated_at']);

				$value['ym'] = date('Y-m',$value['updated_at']);
                $value['Ymd'] = date('Y-m-d',$value['updated_at']);
                $value['My'] = date('M.Y',$value['updated_at']);
                
			}
			echo json_encode($ArticleList);
			exit;
		}
		else{
			echo "<script>alert('参数错误！').window.history.go(0);</script>";
		}
	}
}