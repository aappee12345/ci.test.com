<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends Homebase
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('usersessionmodel','usersession',TRUE);
		$this->load->model('articlemodel','article',TRUE);
		$this->load->model('categorymodel','category',TRUE);
		$this->load->model('netmodel','nets',TRUE);
		$this->load->model('logmodel','logs',TRUE);
		$this->load->library('upload');
	}

	//分类列表页
	public function index()
	{
		//var_dump($_COOKIE);
 		//var_dump($_COOKIE['three']);exit;
		$header['title'] = "文章列表";
		$header['keywords'] = "文章列表";
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'31');
		$header['version'] = require(APP_ROOT . 'config' . DIRECTORY_SEPARATOR . 'version.php');
		$header['n_name'] = $this->n_name['n_name']; 
		$this->load->view('public/header',$header);
		$this->load->view('public/top');
		//$data['adminmenulist'] = $this->admininit();
		$data['act'] = 'articlelist';
		$this->load->view('public/left',$data);
		unset($data['act']);
		if ($this->uri->segment(3)==NULL)
		{
			$data['cid'] = $cid = $this->input->post('cid')?$this->input->post('cid'):0;
		}
		else
		{
			$data['cid'] = $cid = $this->uri->segment(3)?$this->uri->segment(3):0;
		}
		$three = $this->uri->segment(4);

		if ($three==='delsuccess')
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
						删除文章成功！
					</p>
				</div>
				<a href='.site_url(array("Article","index","$cid")).'><div class="return">返回列表</div></a>
			</div>
			';
		}
		elseif ($three==='delerror')
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
							删除文章失败！
						</p>
					</div>
					<a href='.site_url(array("Article","index","$cid")).'><div class="return">返回列表</div></a>
				</div>
				';
		}
		elseif ($three==='batchdelsuccess')
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
						批量删除文章成功！
					</p>
				</div>
				<a href='.site_url(array("Article","index","$cid")).'><div class="return">返回列表</div></a>
			</div>
			';
		}
		elseif ($three==='batchdelerror')
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
						批量删除文章失败！
					</p>
				</div>
				<a href='.site_url(array("Article","index","$cid")).'><div class="return">返回列表</div></a>
			</div>
			';
		}
		elseif ($three==='batchmovesuccess')
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
						批量移动文章成功！
					</p>
				</div>
				<a href='.site_url(array("Article","index","$cid")).'><div class="return">返回列表</div></a>
			</div>
			';
		}
		elseif ($three==='huifusucess')
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
						批量恢复文章成功！
					</p>
				</div>
				<a href='.site_url(array("Article","recycle","$cid")).'><div class="return">返回列表</div></a>
			</div>
			';
		}
		elseif ($three==='huishounone')
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
						请在要回收的文章前的方框内打勾！
					</p>
				</div>
				<a href='.site_url(array("Article","index","$cid")).'><div class="return">返回列表</div></a>
			</div>
			';
		}
		elseif ($three==='huifunone')
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
						请在要恢复的文章前的方框内打勾！
					</p>
				</div>
				<a href='.site_url(array("Article","recycle","$cid")).'><div class="return">返回列表</div></a>
			</div>
			';
		}
		elseif ($three==='delnone')
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
						请在要删除的文章前的方框内打勾！
					</p>
				</div>
				<a href='.site_url(array("Article","index","$cid")).'><div class="return">返回列表</div></a>
			</div>
			';
		}
		elseif ($three==='catenone')
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
						请选择目标栏目！
					</p>
				</div>
				<a href='.site_url(array("Article","index","$cid")).'><div class="return">返回列表</div></a>
			</div>
			';
		}
		elseif ($three==='movenone')
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
						请在要移动文章前的方框内打勾！
					</p>
				</div>
				<a href='.site_url(array("Article","index","$cid")).'><div class="return">返回列表</div></a>
			</div>
			';
		}
		elseif ($three==='existsart')
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
						该栏目下存在文章，请先删除文章！
					</p>
				</div>
				<a href='.site_url(array("Category","index")).'><div class="return">返回列表</div></a>
				<a href='.site_url(array("Article","index","$cid")).'><div class="ok">删除文章</div></a>
			</div>
			';
		}

		$this->category->getallnextcids($cid);
		$cids = $cid.$this->category->cids;
		
		$where_in = explode(',',$cids);

		$this->load->library('pagination');
		$perPage = 15;
		if ($this->uri->segment(5)==NULL)
		{
			$condition['keys'] = $keys = $data['keys'] = $this->input->post('keys')?$this->input->post('keys'):'';
		}
		else
		{
			$condition['keys'] = $keys = $data['keys'] = $this->input->post('keys')?$this->input->post('keys'):urldecode($this->uri->segment(4));
		}
		$config['base_url'] = site_url('article/index/'.$cid.'/'.$keys.'/');
		if ($cid!=0)
		{
			$config['total_rows'] = $data['count'] = $this->db->where_in('a_cid',explode(',',$cids))->like('a_fulltitle', $condition['keys'], 'both')->count_all_results('article');
			$data['recyclecount'] = $this->db->where(array('a_is_delete'=>1))->where_in('a_cid',explode(',',$cids))->like('a_fulltitle', $condition['keys'], 'both')->count_all_results('article');
		}
		else
		{
			$config['total_rows'] = $data['count'] = $this->db->like('a_fulltitle', $condition['keys'], 'both')->count_all_results('article');
			$data['recyclecount'] = $this->db->where(array('a_is_delete'=>1))->like('a_fulltitle', $condition['keys'], 'both')->count_all_results('article');
		}
		
		
		$config['per_page'] = $perPage;
		$config['reuse_query_string'] = TRUE;
		if ($this->uri->segment(5)==NULL)
		{
			$config['uri_segment'] = 4;
		}
		else
		{
			$config['uri_segment'] = 5;
		}
		
		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();
		if ($this->uri->segment(5)==NULL)
		{
			$offset = $this->uri->segment(4);
		}
		else
		{
			$offset = $this->uri->segment(5);
		}
		
		$this->db->limit($perPage,$offset);
		$data['offset'] = $offset?$offset:0;
		$data['articlelist'] = $this->article->check($condition,$where_in);
		foreach ($data['articlelist'] as &$value)
		{
			$this->category->parent_name = '';
			$cate = $this->category->parentcate($value['a_cid']);
			$value['a_position'] = $this->category->parent_name;
		}
		//获取下级栏目列表
		$data['catelist'] = $this->category->soncate($cid);
		//获取当前栏目地址
		$this->article->getposition($cid);
		$data['position'] = $this->article->position;
		$this->category->position = '';
		$data['movecatelist'] = $this->category->check();
		//var_dump($data['catelist']);

		$this->load->view('article/index',$data);
		$this->load->view('public/footer');
	}

	//回收站列表页
	public function recycle()
	{
		$header['title'] = "文章回收站列表";
		$header['keywords'] = "文章回收站列表";
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'31');
		$header['version'] = require(APP_ROOT . 'config' . DIRECTORY_SEPARATOR . 'version.php');
		$header['n_name'] = $this->n_name['n_name']; 
		$this->load->view('public/header',$header);
		$this->load->view('public/top');
		//$data['adminmenulist'] = $this->admininit();
		$data['act'] = 'articlelist';
		$this->load->view('public/left',$data);
		unset($data['act']);
		if ($this->uri->segment(3)==NULL)
		{
			$data['cid'] = $cid = $this->input->post('cid')?$this->input->post('cid'):0;
		}
		else
		{
			$data['cid'] = $cid = $this->uri->segment(3)?$this->uri->segment(3):0;
		}
		
		$three = $this->uri->segment(4);
		if ($three==='huishousuccess')
		{

			echo 
			'<style>
				body{overflow:hidden;}
				.notice{display:block;position:absolute;top:0;width: 100%;height:100%;background: rgba(0,0,0,0.6);z-index:100;}
				.info{position:fixed;left:50%;top:50%;width: 340px;height:200px;margin-left: -170px;margin-top: -100px;background: #fff;z-index:101;border-radius:6px;}
				.info .title{width: 100%;height: 40px;line-height:40px;text-indent:10px;font-weight:bold;font-size:14px;border-top-left-radius:5px;border-top-right-radius:5px;background: #2c6aa0;color:#fff;}
				.info .cont{width: 100%;height: 60px;}
				.info .cont p{width: 100%;height: 40px;line-height: 40px;margin-top:30px;text-align: center;}
				.info .return{width: 90px;margin:auto;height: 32px;line-height: 32px;font-size:14px;text-align: center;color:#fff;background: #2c6aa0;border-radius: 4px;cursor:pointer;}
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
						批量回收文章成功！
					</p>
				</div>
				<a href='.site_url(array("Article","index","$cid")).'><div class="return">返回文章列表</div></a>
			</div>
			';
		
		}

		$this->category->getallnextcids($cid);
		$cids = $cid.$this->category->cids;
		
		$where_in = explode(',',$cids);

		$this->load->library('pagination');
		$perPage = 10;
		if ($this->uri->segment(5)==NULL)
		{
			$condition['keys'] = $keys = $data['keys'] = $this->input->post('keys')?$this->input->post('keys'):'';
		}
		else
		{
			$condition['keys'] = $keys = $data['keys'] = $this->input->post('keys')?$this->input->post('keys'):urldecode($this->uri->segment(4));
		}
		$config['base_url'] = site_url('article/recycle/'.$cid.'/'.$keys.'/');
		if ($cid!=0)
		{
			$config['total_rows'] = $data['count'] = $this->db->where(array('a_is_delete'=>1))->where_in('a_cid',explode(',',$cids))->like('a_fulltitle', $condition['keys'], 'both')->count_all_results('article');
			$data['allcount'] = $this->db->where_in('a_cid',explode(',',$cids))->like('a_fulltitle', $condition['keys'], 'both')->count_all_results('article');
		}
		else
		{
			$config['total_rows'] = $data['count'] = $this->db->where(array('a_is_delete'=>1))->like('a_fulltitle', $condition['keys'], 'both')->count_all_results('article');
			$data['allcount'] = $this->db->where_in('a_cid',explode(',',$cids))->like('a_fulltitle', $condition['keys'], 'both')->count_all_results('article');
		}
		
		$config['per_page'] = $perPage;
		$config['reuse_query_string'] = TRUE;
		if ($this->uri->segment(5)==NULL)
		{
			$config['uri_segment'] = 4;
		}
		else
		{
			$config['uri_segment'] = 5;
		}
		
		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();
		if ($this->uri->segment(5)==NULL)
		{
			$offset = $this->uri->segment(4);
		}
		else
		{
			$offset = $this->uri->segment(5);
		}
		
		$this->db->limit($perPage,$offset);
		$data['offset'] = $offset?$offset:0;
		$where['a_is_delete'] = 1;
		$data['articlelist'] = $this->article->recyclecheck($condition,$where_in,$where);
		foreach ($data['articlelist'] as &$value)
		{
			$this->category->parent_name = '';
			$cate = $this->category->parentcate($value['a_cid']);
			$value['a_position'] = $this->category->parent_name;
		}
		//获取下级栏目列表
		$data['catelist'] = $this->category->soncate($cid);
		//获取当前栏目地址
		$this->article->getposition($cid);
		$data['position'] = $this->article->position;
		$this->category->position = '';
		
		$this->load->view('article/recycle',$data);
		$this->load->view('public/footer');
	}

	/**
	  * 添加文章
      */
	public function add()
	{
	
		$header['title'] = "添加文章";
		$header['keywords'] = "添加文章";
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'32');
		$header['version'] = require(APP_ROOT . 'config' . DIRECTORY_SEPARATOR . 'version.php');
		$header['n_name'] = $this->n_name['n_name']; 
		$this->load->view('public/header',$header);
		$this->load->view('public/top');
		//$data['adminmenulist'] = $this->admininit();
		$data['act'] = 'addarticle';
		$this->load->view('public/left',$data);
		unset($data['act']);
		$three = $this->uri->segment(4);
		if ($three=='addsuccess')
		{
			$cid = $this->uri->segment(3)?$this->uri->segment(3):0;
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
						添加文章成功！
					</p>
				</div>
				<a href='.site_url(array("Article","index","$cid")).'><div class="return">返回列表</div></a>
				<div class="ok">继续添加</div>
			</div>
			';
		}
		else
		{
			//do nothing...
		}


		if (IS_POST)
		{

			$this->load->library('form_validation');
			$res = false;
			$status = $this->form_validation->run('article');
			$cid = $this->input->post('a_cid');
			if ($status)
			{
				//通过验证 处理图片上传信息
				foreach ($_FILES as $key=>$value)
				{
					//通过验证 处理图片上传信息
					if ($_FILES[$key]['error']==0)
					{
						$cate = $this->category->find_cate($cid);
						if ($key=='a_index_pic')
						{
							$width = $cate['a_width']?$cate['a_width']:200;
							$height = $cate['a_height']?$cate['a_height']:200;
							$is_water = $cate['is_water']?$cate['is_water']:0;
							$path1 = '.'.strstr($this->input->post('a_index_file'),'/upload');
							$is_thumb = false;
						}
						else
						{
							$width = $cate['a_width']?$cate['a_width']:200;
							$height = $cate['a_height']?$cate['a_height']:200;
							$is_water = $cate['is_water']?$cate['is_water']:0;
							$path1 = '.'.strstr($this->input->post('a_file'),'/upload');
							$is_thumb = true;
						}
					
						if (file_exists($path1))
						{
							@unlink($path1);
						}
						$_POST[$key] = $this->uploadImg($width,$height,$is_water,$is_thumb,$key);
					}
					else
					{
						if ($key=='a_index_pic')
						{
							$_POST[$key] = $this->input->post('a_index_file');
						}
						else
						{
							$_POST[$key] = $this->input->post('a_file');
						}
						
					}
				}
				$res = $this->article->insert_article();
			}
			

			if ($res)
			{
				$username = $header['user']['ma_username'];
				$this->logs->addLog('添加文章成功！',$username);
				echo "<script>window.location.href='".site_url(array('Article','add',$cid,'addsuccess'))."'</script>";
				exit;
			}
		}


		$cid = $this->uri->segment(3)?$this->uri->segment(3):0;
		$data['catelist'] = $this->article->getcatelist($cid);
		$num = count($data['catelist']);
		for ($i=0;$i<$num;$i++)
		{
			//var_dump($i);
			$newdata['catelist'][$i] = $data['catelist'][$i];
		}
		$data['catelist'] = $newdata['catelist'];
		$this->article->selectlist = array();
		$this->load->view('article/add',$data);
		$this->load->view('public/footer');
	}

	/**
	  * 修改文章
      */
	public function update()
	{
		$header['title'] = "修改文章";
		$header['keywords'] = "修改文章";
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'33');
		$header['version'] = require(APP_ROOT . 'config' . DIRECTORY_SEPARATOR . 'version.php');
		$header['n_name'] = $this->n_name['n_name']; 
		$this->load->view('public/header',$header);
		$this->load->view('public/top');
		$data['act'] = 'updatearticle';
		$this->load->view('public/left',$data);
		unset($data['act']);
		$three = $this->uri->segment(4);

		if ($three=='updatesuccess')
		{

			$cid = $this->uri->segment(3)?$this->uri->segment(3):0;
			//获取nid
			$nid = $this->uri->segment(5)?$this->uri->segment(5):'';
			if ($nid=='')
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
							修改文章成功！
						</p>
					</div>
					<a href='.site_url(array("Article","index","$cid")).'><div class="return">返回列表</div></a>
				</div>
				';
			}
			else
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
							修改文章成功！
						</p>
					</div>
					<a href='.site_url(array("Article","index","$cid")).'><div class="return">返回列表</div></a>
					<a href='.site_url(array("Article","update","$nid")).'><div class="ok">继续修改</div></a>
				</div>
				';
			}

			
		}
		elseif ($three=='updateerror')
		{
			$cid = $this->uri->segment(3)?$this->uri->segment(3):0;
			$nid = $this->uri->segment(5);

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
						修改文章失败！
					</p>
				</div>
				<a href='.site_url(array("Article","index","$cid")).'><div class="return">返回列表</div></a>
				<a href='.site_url(array("Article","update","$id")).'><div class="ok">返回修改</div></a>
			</div>
			';
		}
		if (IS_POST)
		{
			//var_dump($_POST['a_content']);
			$id = $this->input->post('a_id');
			$this->load->library('form_validation');
			$res = false;
			$status = $this->form_validation->run('article');
			$cid = $this->input->post('a_cid');
			if ($status)
			{
				foreach ($_FILES as $key=>$value)
				{
					//通过验证 处理图片上传信息
					if ($_FILES[$key]['error']==0)
					{
						$cate = $this->category->find_cate($cid);
						if ($key=='a_index_pic')
						{
							$width = $cate['a_width']?$cate['a_width']:200;
							$height = $cate['a_height']?$cate['a_height']:200;
							$is_water = $cate['is_water']?$cate['is_water']:0;
							$path1 = '.'.strstr($this->input->post('a_index_file'),'/upload');
							$is_thumb = false;
						}
						else
						{
							$width = $cate['a_width']?$cate['a_width']:200;
							$height = $cate['a_height']?$cate['a_height']:200;
							$is_water = $cate['is_water']?$cate['is_water']:0;
							$path1 = '.'.strstr($this->input->post('a_file'),'/upload');
							$is_thumb = true;
						}
					
						if (file_exists($path1))
						{
							@unlink($path1);
						}
						$_POST[$key] = $this->uploadImg($width,$height,$is_water,$is_thumb,$key);

					}
					else
					{
						if ($key=='a_index_pic')
						{
							$_POST[$key] = $this->input->post('a_index_file');
						}
						else
						{
							$_POST[$key] = $this->input->post('a_file');
						}
						
					}
				}
				
				
			}
			//删除文章图片
			/*
			$article = $this->article->find_article($id);
			
			$content = $article['a_content'];
			$pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/"; 
			preg_match_all($pattern,$content,$match); 

			foreach ($match[1] as $value)
			{
				if (file_exists('.'.$value))
				{
					@unlink('.'.$value);
				}
			}
			*/
			$res = $this->article->update_article($id);
			$nid = $this->input->post('nid');
			if ($res)
			{
				$username = $header['user']['ma_username'];
				$this->logs->addLog('修改文章成功！',$username,$id);
				echo "<script>window.location.href='".site_url(array('Article','update',$cid,'updatesuccess',$nid))."'</script>";
				exit;
			}
			else
			{
				echo "<script>window.location.href='".site_url(array('Article','update',$cid,'updateerror',$nid))."'</script>";
				exit;
			}
		}


		$id = $this->uri->segment(3);
		$article = $this->article->find_article($id);
		$data['article'] = $article;
		//var_dump(date('Y-m-d H:i:s',$data['article']['updated_at']));
		$cid = $article['a_cid'];

		//计算nid
		$order='a_top DESC,a_recommend DESC,a_hot DESC,a_sort DESC,updated_at DESC,a_id DESC';
		$this->category->getallnextcids($cid);
		$cids = $cid.$this->category->cids;
		$where_in = explode(',',$cids);
		$articlelist = $this->db->where_in('a_cid',$where_in)->order_by($order)->get('article')->result_array();
		$ta = false;
		foreach ($articlelist as $articleinfo)
		{
			if ($ta === true)
			{
				$data['nid'] = $articleinfo['a_id'];
				break;
			}
			if ($articleinfo['a_id'] == $id)
			{
				$ta = true;
			}
		}
		$data['catelist'] = $this->article->getcatelist($cid);
		$num = count($data['catelist']);
		for ($i=0;$i<$num;$i++)
		{
			//var_dump($i);
			$newdata['catelist'][$i] = $data['catelist'][$i];
		}
		$data['catelist'] = $newdata['catelist'];
		$this->article->selectlist = array();
		$this->load->view('article/update',$data);
		$this->load->view('public/footer');
	}
	
	public function delArticle()
	{
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'34');
		$id = $this->uri->segment(3);
		$article = $this->article->find_article($id);
		$cid = $article['a_cid'];
		//var_dump($cid);exit;
		$status = $this->doDel($id);

		if ($status)
		{
			//删除成功
			$username = $header['user']['ma_username'];
			$this->logs->addLog('删除文章成功！',$username,$id);
			echo "<script>window.location.href='".site_url(array('article','index',$cid,'delsuccess'))."'</script>";
			exit;
		}
		else
		{
			//删除失败
			echo "<script>window.location.href='".site_url(array('article','index',$cid,'delerror'))."'</script>";
			exit;
		}
	}

	/**
	  * 批量删除文章
      */
	public function batchDelArticle()
	{
		//判断登录及权限
		$arr['ma_lastloginip'] = (String)ip2long($_SERVER['REMOTE_ADDR']);
		$header['user'] = $this->usersession->check($arr,'34');
		if ($_POST['submit']=='放入回收站')
		{
			$CheckIDs = $this->input->post('IDCheck');
			if ($CheckIDs==null)
			{
				//echo "<script>alert('请在要回收的文章前的方框内打勾！');window.history.go(-1);</script>";
				echo "<script>window.location.href='".site_url(array('Article','index',0,'huishounone'))."';</script>";
				exit;
			}
			$flag = false;
			foreach ($CheckIDs as $value)
			{
				$status = $this->doHuishou($value);
				if ($status&&($flag===false))
				{
					$flag = true;
				}
			}
			//删除成功
			if ($flag===true)
			{
				$username = $header['user']['ma_username'];
				$this->logs->addLog('批量将文章成功移入回收站！',$username,implode(',', $CheckIDs));
				echo "<script>window.location.href='".site_url(array('article','recycle',0,'huishousuccess'))."'</script>";
				exit;
			}
		}
		else if ($_POST['submit']=='移出回收站')
		{
			$CheckIDs = $this->input->post('IDCheck');
			if ($CheckIDs==null)
			{
				echo "<script>window.location.href='".site_url(array('Article','index',0,'huifunone'))."';</script>";
				//echo "<script>alert('请在要恢复的文章前的方框内打勾！');window.history.go(-1);</script>";
				exit;
			}
			$flag = false;
			foreach ($CheckIDs as $value)
			{
				$status = $this->doHuifu($value);
				if ($status&&($flag===false))
				{
					$flag = true;
				}
			}
			//删除成功
			if ($flag===true)
			{
				$username = $header['user']['ma_username'];
				$this->logs->addLog('批量将文章成功移出回收站！',$username,implode(',', $CheckIDs));
				echo "<script>window.location.href='".site_url(array('article','index',0,'huifusucess'))."'</script>";
				exit;
			}
		}
		else if($_POST['submit']=='删除选中')
		{
			$CheckIDs = $this->input->post('IDCheck');
			if ($CheckIDs==null)
			{
				//echo "<script>alert('请在要删除的文章前的方框内打勾！');window.history.go(-1);</script>";
				echo "<script>window.location.href='".site_url(array('Article','index',0,'delnone'))."';</script>";
				exit;
			}
			$flag = false;
			foreach ($CheckIDs as $value)
			{
				$status = $this->doDel($value);
				if ($status&&($flag===false))
				{
					$flag = true;
				}
			}
			//删除成功
			if ($flag===true)
			{
				$username = $header['user']['ma_username'];
				$this->logs->addLog('批量删除文章成功！',$username,implode(',', $CheckIDs));
				echo "<script>window.location.href='".site_url(array('article','index',0,'batchdelsuccess'))."'</script>";
				exit;
			}
			else
			{
				echo "<script>window.location.href='".site_url(array('article','index',0,'batchdelerror'))."'</script>";
				exit;
			}
		}
		else if ($_POST['submit']=='批量移动')
		{
			$cid = $this->input->post('a_cid');
			$CheckIDs = $this->input->post('IDCheck');
			if ($cid==0)
			{
				echo "<script>window.location.href='".site_url(array('Article','index',0,'catenone'))."';</script>";
				//echo "<script>alert('请选择目标栏目！');window.history.go(-1);</script>";
				exit;
			}
			if ($CheckIDs==null)
			{
				echo "<script>window.location.href='".site_url(array('Article','index',0,'movenone'))."';</script>";
				//echo "<script>alert('请在要移动文章前的方框内打勾！');window.history.go(-1);</script>";
				exit;
			}
			$flag = false;
			foreach ($CheckIDs as $value)
			{
				$status = $this->doMove($value,$cid);
				if ($status&&($flag===false))
				{
					$flag = true;
				}
			}
			if ($flag===true)
			{
				$username = $header['user']['ma_username'];
				$this->logs->addLog('批量移动文章成功！',$username,implode(',', $CheckIDs));
				echo "<script>window.location.href='".site_url(array('article','index',0,'batchmovesuccess'))."'</script>";
				exit;
			}
		}
	}

	/**
	  * 处理删除文章
      * @param int $id删除的文章ID;
      */
	public function doDel($id)
	{
		//查询文章
		$article = $this->article->find_article($id);
		$article['a_pic'] = '.'.strstr($article['a_pic'],'/upload/article/');
		//删除列表图片
		if (file_exists($article['a_pic']))
		{
			@unlink($article['a_pic']);
		}
		//删除文章图片
		$content = $article['a_content'];
		$pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/"; 
		preg_match_all($pattern,$content,$match); 

		foreach ($match[1] as $value)
		{
			if (file_exists('.'.$value))
			{
				@unlink('.'.$value);
			}
		}
		$res = $this->db->delete('article', array('a_id' => $id));
		return $res;
	}

	public function doMove($id,$cid)
	{
		$data['a_cid'] = $cid;
		$res = $this->db->update('article', $data, array('a_id' => $id));
		if ($res)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function doHuishou($id)
	{
		$data['a_is_delete'] = 1;
		$res = $this->db->update('article', $data, array('a_id' => $id));
		if ($res)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function doHuifu($id)
	{
		$data['a_is_delete'] = 0;
		$res = $this->db->update('article', $data, array('a_id' => $id));
		if ($res)
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	/**
	 * ajax查询子分类
	 * @param int $cid 当前选定分类ID
	 * @return array $data
	 */
	public function ajaxson()
	{
		if (IS_AJAX)
		{
			$cid = $_POST['cid'];
			//查询当前选择分类的子分类
			$res = $this->category->soncate($cid);
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
	 * ajax修改文章信息
	 * @return array $data
	 */
	public function ajaxarticle()
	{
		if (IS_AJAX)
		{
			$id = $this->input->post('id');
			$type = $this->input->post('type');
			switch ($type)
			{
				case 'top':$this->article->setTop($id);exit;
				break;
				case 'recommend':$this->article->setRecommend($id);
				break;
				case 'hot':$this->article->setHot($id);
				break;
				case 'update':$this->article->setUpdatetime($id);
				break;
			}
		}
	}

	public function ajaxsort()
	{
		if (IS_AJAX)
		{
			$arr['a_id'] = $this->input->post('id');
			$arr['a_sort'] = $this->input->post('sort');
			//查询当前选择分类的子分类
			$res = $this->article->ajaxupdate_sort($arr);
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
	public function uploadImg($width=360,$height=210,$water=1,$is_thumb=true,$key)
	{

		//文件上传
		$config1['upload_path']      = './upload/article/';
        $config1['allowed_types']    = 'gif|jpg|png';
        $config1['max_size']         = 8192;//允许上传文件大小的最大值（单位 KB），设置为 0 表示无限制 
        $config1['max_width']        = 0;//图片的最大宽度（单位为像素），设置为 0 表示无限制
        $config1['max_height']       = 0;//图片的最大高度（单位为像素），设置为 0 表示无限制
        $config1['encrypt_name']     = true;//如果设置为 TRUE ，文件名将会转换为一个随机的字符串 
        $this->upload->initialize($config1);
        if (!$this->upload->do_upload($key))
        {
            $data['error'] = array('error' => $this->upload->display_errors('',''));
            echo "<script>alert('".$data['error']['error']."');window.history.go(-1);</script>";
            exit;
        }
        else
        {
            $data['info'] = array('upload_data' => $this->upload->data());
        }
        $file_ext = $data['info']['upload_data']['file_ext'];
        $file_type = $data['info']['upload_data']['file_type'];
		//处理缩率图
		if ($is_thumb===true)
		{
	        $config2['image_library']    = 'GD2';
			$config2['source_image']     = $data['info']['upload_data']['full_path'];//设置原始图像的名称和路径。 路径只能是相对或绝对的服务器路径，不能使用URL 。
			$config2['create_thumb']     = $is_thumb;//告诉图像处理函数生成缩略图。
			$config2['thumb_marker']     = '_thumb';
			
			$config2['maintain_ratio']   = TRUE;//指定是否在缩放或使用硬值的时候 使图像保持原始的纵横比例。
			$config2['width']            = $width;
			$config2['height']           = $height;
			$this->load->library('image_lib', $config2);
			$this->image_lib->resize();
		}
		
		

		//若为图片 处理水印
		$net = $this->nets->get_first_net();
		$config3['source_image']     = $data['info']['upload_data']['full_path'];
		$config3['wm_type'] = 'overlay';
		$config3['wm_overlay_path'] = $net[0]['water_path'];
		$config3['wm_opacity'] = 50;
		$config3['wm_vrt_alignment'] = $net[0]['water_vrt']?$net[0]['water_vrt']:'bottom';
		$config3['wm_hor_alignment'] = $net[0]['water_hor']?$net[0]['water_hor']:'right';
		$config3['wm_padding'] = '0';
		if ($water==1)
		{
			$this->image_lib->initialize($config3);
			$this->image_lib->watermark();
		}

		if ($is_thumb==true)
		{
			/*将图片进行留白处理*/
			//1、创建画布
			$im = imagecreatetruecolor($width,$height);//新建一个真彩色图像，默认背景是黑色，返回图像标识符。另外还有一个函数 imagecreate 已经不推荐使用。
			//2、绘制所需要的图像
			$color = imagecolorallocate($im,255,255,255);//创建一个颜色，以供使用
			imagefilledrectangle($im,0,0,$width,$height,$color);//画一个矩形。参数说明：30,30表示矩形左上角坐标；240,140表示矩形右下角坐标；$red表示颜色
			//3、输出图像
			//判断上传图像类型
			switch($file_ext)
			{
				case '.jpg':
				header("Content-Type: image/jpeg");
				$filename = 'upload/article/opacity.jpg';
				imagejpeg($im,$filename);//输出到页面。如果有第二个参数[,$filename],则表示保存图像
				imagedestroy($im);
				
				$config4['source_image']     = 'upload/article/opacity.jpg';
				$config4['wm_type'] = 'overlay';
				$config4['wm_overlay_path'] = str_replace('.','_thumb.',strstr($data['info']['upload_data']['full_path'],'upload'));
				$config4['wm_opacity'] = 100;
				$config4['wm_vrt_alignment'] = 'middle';
				$config4['wm_hor_alignment'] = 'center';
				$config4['wm_padding'] = '0';
				$config4['wm_x_transp'] = -1;
				$config4['wm_y_transp'] = -1;
				$this->image_lib->initialize($config4);
				$this->image_lib->watermark();
				//4、销毁图像，释放内存
				imagedestroy($im);
				header("Content-Type: text/html;charset=utf-8");
				@unlink('./'.$filename);
				$newfile = '.'.str_replace('.','_thumb.',strstr($data['info']['upload_data']['full_path'],'/upload'));
				@unlink($newfile);
				rename('./upload/article/opacity_thumb.jpg',$newfile);

				break;
				case '.png':

				header("content-type: image/png");
				$filename = 'upload/article/opacity.png';
				imagepng($im,$filename);//输出到页面。如果有第二个参数[,$filename],则表示保存图像
				imagedestroy($im);
				$config4['source_image']     = 'upload/article/opacity.png';
				$config4['wm_type'] = 'overlay';
				$config4['wm_overlay_path'] = str_replace('.','_thumb.',strstr($data['info']['upload_data']['full_path'],'upload'));
				$config4['wm_opacity'] = 100;
				$config4['wm_vrt_alignment'] = 'middle';
				$config4['wm_hor_alignment'] = 'center';
				$config4['wm_padding'] = '0';
				$config4['wm_x_transp'] = -1;
				$config4['wm_y_transp'] = -1;
				$this->image_lib->initialize($config4);
				$this->image_lib->watermark();
				//4、销毁图像，释放内存
				imagedestroy($im);
				header("Content-Type: text/html;charset=utf-8");
				@unlink('./'.$filename);
				$newfile = '.'.str_replace('.','_thumb.',strstr($data['info']['upload_data']['full_path'],'/upload'));
				@unlink($newfile);
				rename('./upload/article/opacity_thumb.png',$newfile);

				break;
				case '.gif':

				header("content-type: image/gif");
				$filename = 'upload/article/opacity.gif';
				imagegif($im,$filename);//输出到页面。如果有第二个参数[,$filename],则表示保存图像
				imagedestroy($im);
				$config4['source_image']     = 'upload/article/opacity.gif';
				$config4['wm_type'] = 'overlay';
				$config4['wm_overlay_path'] = str_replace('.','_thumb.',strstr($data['info']['upload_data']['full_path'],'upload'));
				$config4['wm_opacity'] = 100;
				$config4['wm_vrt_alignment'] = 'middle';
				$config4['wm_hor_alignment'] = 'center';
				$config4['wm_padding'] = '0';
				$config4['wm_x_transp'] = -1;
				$config4['wm_y_transp'] = -1;
				$this->image_lib->initialize($config4);
				$this->image_lib->watermark();
				//4、销毁图像，释放内存
				imagedestroy($im);
				header("Content-Type: text/html;charset=utf-8");
				@unlink('./'.$filename);
				$newfile = '.'.str_replace('.','_thumb.',strstr($data['info']['upload_data']['full_path'],'/upload'));
				@unlink($newfile);
				rename('./upload/article/opacity_thumb.gif',$newfile);


				break;
				case '.bmp':

				header("content-type: image/bmp");
				$filename = 'upload/article/opacity.bmp';
				imagewbmp($im,$filename);//输出到页面。如果有第二个参数[,$filename],则表示保存图像
				imagedestroy($im);
				$config4['source_image']     = 'upload/article/opacity.bmp';
				$config4['wm_type'] = 'overlay';
				$config4['wm_overlay_path'] = str_replace('.','_thumb.',strstr($data['info']['upload_data']['full_path'],'upload'));
				$config4['wm_opacity'] = 100;
				$config4['wm_vrt_alignment'] = 'middle';
				$config4['wm_hor_alignment'] = 'center';
				$config4['wm_padding'] = '0';
				$config4['wm_x_transp'] = -1;
				$config4['wm_y_transp'] = -1;
				$this->image_lib->initialize($config4);
				$this->image_lib->watermark();
				//4、销毁图像，释放内存
				imagedestroy($im);
				header("Content-Type: text/html;charset=utf-8");
				@unlink('./'.$filename);
				$newfile = '.'.str_replace('.','_thumb.',strstr($data['info']['upload_data']['full_path'],'/upload'));
				@unlink($newfile);
				rename('./upload/article/opacity_thumb.bmp',$newfile);

				break;
			}
		
		}
		
		


		//删除原图
		if (file_exists($data['info']['upload_data']['full_path'])&&$key!='a_index_pic')
		{
			@unlink($data['info']['upload_data']['full_path']);
		}
		if ($is_thumb===true || $is_water != 0)
		{
			$this->image_lib->clear();
		}
		
		if ($is_thumb===false)
		{
			return strstr($data['info']['upload_data']['full_path'],'/upload');
		}
		else
		{
			return str_replace('.','_thumb.',strstr($data['info']['upload_data']['full_path'],'/upload'));
		}
		
	}

	


}