<?php
class Categorymodel extends CI_Model
{
	public $p_id;
	public $c_name;
	public $ec_name;
	public $ec_navname;
	public $c_title;
	public $c_pic;
	public $c_description;
	public $c_keys;
	public $c_profile;
	public $c_type;
	public $c_sort;
	public $c_is_nav;
	public $c_page_num;
	public $parent_name;
	public $selectlist;
	public $position;
	public $cids;
	public $i = 0;
	public $tree;

	//查询记录
	public function check($pid=0)
	{
		$this->db->order_by('c_sort DESC,c_id ASC');
		$catelist = $this->db->get_where('category',array('p_id'=>$pid))->result_array();
		//var_dump($catelist);exit;
		if (!empty($catelist))
		{
			foreach ($catelist as $cate)
			{
				$this->tree[$this->i] = $cate;
				$this->i += 1;
				self::check($cate['c_id']);
			}
		}
		foreach ($this->tree as &$value)
		{
			$this->parent_name = '';
			if ($value['p_id']==0)
			{
				$this->parent_name = '顶级栏目';
				$value['p_name'] = $this->parent_name;
			}
			else
			{
				$this->parentcate($value['p_id']);
				$value['p_name'] = $this->parent_name;
			}
			//栏目排版
			$paiban = $this->db->where('t_id='.$value['c_type'])->get('settype')->result_array();
			$value['t_name'] = $paiban[0]['t_name'];
			$value['c_pic'] = strstr($value['c_pic'],'/upload');
		}
		//exit;
		return $this->tree;
	}
	

	//查询当前栏目
	public function find_cate($cid)
	{
		$condition['c_id'] = $cid;
		return $this->db->get_where('category',$condition)->row_array();
	}

	/**查询所属栏目及栏目路径 //级别 顶级栏目的级别为0 依次递增
	 * @param int $pid 参数为当前分类的父级
	 * @return array $data
	 */
	public function parentcate($pid)
	{
		//查询当前分类的父级分类信息
		$res = $this->db->get_where('category',array('c_id'=>$pid))->result_array();

		//判断是否有上级分类
		if ($res[0]['p_id']==0)
		{
			//当前父级分类已经为顶级分类
			$this->parent_name = $res[0]['c_name'].'/'.$this->parent_name;
		}
		else
		{
			//当前父级分类不是顶级分类
			$this->parent_name = $res[0]['c_name'].'/'.$this->parent_name;
			$res = self::parentcate($res[0]['p_id']);
		}
	}

	/**
	  * 递归获取当前栏目的所有下级栏目ID
	  * @param int $cid 当前栏目ID
	  * @return string $cids 以逗号相连的ID字符串
	  */
	public function getallnextcids($cid)
	{

		$result = $this->db->get_where('category',array('p_id'=>$cid))->result_array();

		if (!empty($result))
		{
			$this->category->cids = '';
			foreach ($result as $res)
			{

				$this->cids .= ','.$res['c_id'];
				self::getallnextcids($res['c_id']);
			}
		}
		
	}

	/**查询顶级栏目
	 * @return array $data
	 */
	public function topcates()
	{
		$res = $this->db->get_where('category',array('p_id'=>0))->result_array();
		return $res;
	}

	/**查询子栏目列表
	 * @param int $cid
	 * @return array $data
	 */
	public function getSonCate($cid)
	{

		$res = $this->db->order_by('c_sort desc,c_id desc')->get_where('category',array('p_id'=>$cid))->result_array();
		return $res;
	}

	/** 获取当前栏目的顶级栏目信息
	 * @param $cid
	 * @return $topcate;
	 */
	public function getThisTop($cid)
	{
		//var_dump($cid);
		$thiscate = $this->db->get_where('category',array('c_id'=>$cid))->row_array();
		
		
		if ($thiscate['p_id']!='0')
		{
			return self::getThisTop($thiscate['p_id']);
		}
		else
		{
			$topcate = $thiscate;
			return $topcate;
		}
		
	}


	/**获取当前顶级栏目下的所有栏目，以递归方式排序
	 * @param $cid
	 * return void
	 */
	public function getAllSonCate($cid)
	{
		//var_dump($cid);exit;
		//获取当前栏目所属顶级栏目
		$topcate = $this->getThisTop($cid);
		//获取该顶级栏目下的所有子栏目
		$this->selectlist = '';
		$catelist = $this->getsoncatelist($topcate['c_id'],1);
		$this->selectlist = '';
		return $catelist;
	}

	/**查询栏目等级
	 * @param int $cid
	 * @return array $data
	 */
	public function get_level($cid)
	{
		$res = $this->db->get_where('category',array('c_id'=>$cid))->row_array();
		return $res['c_level'];
	}

	/**根据分类ID 递归查询其所有下属分类信息
	 * @param $cid
	 * @return $catelist;
	 */
	public function getsoncatelist($cid)
	{
		$this->getallnextcids($cid);
		$cids = $cid.$this->cids;
		$arr_cids = explode(',', $cids);
		foreach ($arr_cids as $c_id)
		{
			$catelist[] = $this->db->get_where('category',array('c_id'=>$c_id))->row_array();
		}
		return $catelist;
	}

	/**根据父级ID 及 父级等级 递归查询所属上级分类及其同级分类列表
	 * @param int $pid 选定父级分类ID
	 * @param int $p_level 选定父级分类的等级
	 * @return array $data 依次select列表数组
	 */
	public function get_fathercatelist($pid,$p_level)
	{
		if ((int)$p_level>=0)
		{
			//获取当前级别选定分类
			$this->selectlist[$p_level]['c_level'] = $p_level;
			$this->selectlist[$p_level]['selected'] = $this->db->get_where('category',array('c_id'=>$pid))->row_array();
			$this->selectlist[$p_level]['catelist'] = $this->db->get_where('category',array('p_id'=>$this->selectlist[$p_level]['selected']['p_id']))->result_array();
			$level = (int)$p_level-1;
			$parent_id = (int)$this->selectlist[$p_level]['selected']['p_id'];
			self::get_fathercatelist($parent_id,$level);
		}
	}

	/** 根据栏目ID 递归查询该栏目位置信息
	 * @param $cid
	 * @return void
	 */
	public function getCatePosition($cid)
	{
		if ($cid==0)
		{
			$this->position = "<a href='http://".$_SERVER['HTTP_HOST']."'>网站首页</a>".$this->position;
		}
		else
		{
			$thiscate = $this->db->get_where('category',array('c_id'=>$cid))->row_array();
			$url = site_url('Article/index').'/'.$cid;
			$this->position = " &gt; <a href='".$url."'>".$thiscate['c_name']."</a>".$this->position;
			self::getCatePosition($thiscate['p_id']);			
		}
		
	}

	/** 根据CID获取返回上一级按钮及链接信息
	 * @param $cid
	 * @return mix $return
	 */
	public function getReturn($cid)
	{
		//var_dump($cid);
		//查询c_level是否大于等于1 [若不存在子栏目 则大于等于1 若存在子栏目 大于等于2]
		$count = $this->db->where(array('p_id'=>$cid))->count_all_results('category');
		if ($count==0)
		{
			$level = 2;
		}
		else
		{
			$level = 1;
		}
		
		$thiscate = $this->db->get_where('category',array('c_id'=>$cid))->row_array();
		if ($thiscate['c_level']>=$level)
		{
			//需要返回上一级按钮
			$returnurl = site_url('Article/index/').$thiscate['p_id'];
			return $returnurl;
		}
		else
		{
			//不需要返回上一级按钮
			return false;
		}
	}

	/**文章内容页面 获取当前文章所属栏目及其同级栏目列表
	 * @param mix $cid
	 * @param array $catelist
	 */
	public function getThisCates($cid)
	{
		$cid = (int)$cid;
		$thiscate = $this->db->get_where('category',array('c_id'=>$cid))->row_array();
		$catelist = $this->db->get_where('category',array('p_id'=>$thiscate['p_id']))->result_array();
		return $catelist;
	}

	
}