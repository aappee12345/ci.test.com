<?php
class Articlemodel extends CI_Model
{
	public $a_id;
	public $a_cid;
	public $a_fulltitle;
	public $a_title;
	public $a_link;
	public $created_at;
	public $updated_at;
	public $a_author;
	public $a_admin;
	public $a_source;
	public $a_keys;
	public $a_description;
	public $a_pic;
	public $a_content;
	public $a_top;
	public $a_recommend;
	public $a_hot;
	public $a_click;
	public $a_is_getimg;
	public $a_index_pic;
	public $a_sort;
	public $a_profile;
	public $a_titlecolor;
	public $selectlist;
	public $position = '';
	


	//查询文章列表
	public function check($condition=array(),$where_in=array(),$order='a_top DESC,a_recommend DESC,a_hot DESC,a_sort DESC,updated_at DESC,a_id DESC')
	{
		if (!empty($condition))
		{
			if (!empty($where_in))
			{
				$articlelist = $this->db->where_in('a_cid',$where_in)->like('a_fulltitle', $condition['keys'], 'both')->order_by($order)->get('article')->result_array();
			}
			else
			{
				$articlelist = $this->db->order_by($order)->like('a_fulltitle', $condition['keys'], 'both')->get('article')->result_array();
			}
			
		}
		else
		{
			if (!empty($where_in))
			{
				$articlelist = $this->db->where_in('a_cid',$where_in)->order_by($order)->get('article')->result_array();
			}
			else
			{
				$articlelist = $this->db->order_by($order)->get('article')->result_array();
			}
			
		}
		
		foreach ($articlelist as &$value)
		{
			/*所属栏目*/
			$value['p_name'] = $this->parentcate($value['a_cid']);
			$value['a_pic'] = strstr($value['a_pic'],'/upload/article');
		}
		return $articlelist;
	}

	public function recyclecheck($condition=array(),$where_in=array(),$where=array(),$order='a_top DESC,a_recommend DESC,a_hot DESC,a_sort DESC,updated_at DESC,a_id DESC')
	{
		if (!empty($condition))
		{
			if (!empty($where_in))
			{
				$articlelist = $this->db->where($where)->where_in('a_cid',$where_in)->like('a_fulltitle', $condition['keys'], 'both')->order_by($order)->get('article')->result_array();
			}
			else
			{
				$articlelist = $this->db->where($where)->order_by($order)->like('a_fulltitle', $condition['keys'], 'both')->get('article')->result_array();
			}
			
		}
		else
		{
			if (!empty($where_in))
			{
				$articlelist = $this->db->where($where)->where_in('a_cid',$where_in)->order_by($order)->get('article')->result_array();
			}
			else
			{
				$articlelist = $this->db->where($where)->order_by($order)->get('article')->result_array();
			}
			
		}
		
		foreach ($articlelist as &$value)
		{
			/*所属栏目*/
			$value['p_name'] = $this->parentcate($value['a_cid']);
			$value['a_pic'] = strstr($value['a_pic'],'/upload/article');
		}
		return $articlelist;
	}

	//查询当前文章所属栏目
	public function parentcate($cid)
	{
		$condition['c_id'] = $cid;
		$res = $this->db->where($condition)->get('category')->row_array();
		return $res['c_name'];
	}

	/** 根据提交的文章所属栏目CID来 获取栏目列表
	  * @param int $cid
	  * @param array $data
	  */
	public function getcatelist($cid=0,$order='c_sort DESC,c_id ASC')
	{

		if ($cid==0)
		{
			//没有提交栏目ID，获取最底层栏目ID
			$condition['p_id'] = $cid;
			$this->getlastsoncate($cid);
			$lastcateid = $this->a_cid;
			$this->getselectlist($lastcateid);
		}
		else
		{
			//有提交栏目ID
			$lastcateid = $cid;
			$this->getselectlist($lastcateid);
			
		}
		$data = $this->selectlist;
		return $data;
	}

	/**
	  * 根据最底层的ID 获取栏目列表
	  * @param int $cid
	  * @return array $data
	  */
	private function getselectlist($cid)
	{
		//查询当前类别
		if ($cid!=0)
		{
			$condition['c_id'] = $cid;
			$thiscate = $this->db->where($condition)->get('category')->row_array();
			$level = $thiscate['c_level'];
			$this->selectlist[$level]['selected'] = $thiscate;
			//查询当前类别的所有同级分类
			$where['p_id'] = $thiscate['p_id'];
			$this->selectlist[$level]['catelist'] = $catelist = $this->db->where($where)->get('category')->result_array();
			self::getselectlist($thiscate['p_id']);
		}
		
	}

	/*获取默认最底层的 分类ID*/
	private function getlastsoncate($cid=0,$order='c_sort DESC,c_id ASC')
	{
		$condition['p_id'] = $cid;
		$catelist = $this->db->where($condition)->order_by($order)->get('category')->row_array();

		if ($catelist)
		{
			self::getlastsoncate($catelist['c_id']);
		}
		else
		{
			$condition1['c_id'] = $cid;
			$cateinfo = $this->db->where($condition1)->order_by($order)->get('category')->row_array(); 
			$this->a_cid = $cateinfo['c_id'];
		}
	}

	//查询当前文章
	public function find_article($id)
	{
		$condition['a_id'] = $id;
		return $this->db->where($condition)->get('article')->row_array();
	}

	/**
	  * 根据GET提交的CID 获取当前查询文章所属栏目的地址
	  * @param int $cid
	  * @return void
	  */
	public function getposition($cid)
	{
		if ($cid==0)
		{
			$this->position = '';
		}
		else
		{
			$condition['c_id'] = $cid;
			$thiscate = $this->db->where($condition)->get('category')->row_array();
			$catelink = "<a href='".site_url("/article/index/$thiscate[c_id]")."' class='btn btn-info mr5'>".$thiscate['c_name']."</a>";
			$this->position = $catelink.$this->position;
			if ($thiscate['p_id']!=0)
			{
				self::getposition($thiscate['p_id']);
			}
		}
	}

	/**添加栏目
	 * @return boolean $res
	 *
	 */
	public function insert_article()
	{
		$pid = $this->input->post('p_id');
		$data = array(
			'a_cid'         => $this->input->post('a_cid',TRUE),
			'a_fulltitle'   => $this->input->post('a_fulltitle',TRUE),
			'a_title'       => $this->input->post('a_title',TRUE),
			'a_link'        => $this->input->post('a_link',TRUE),
			'created_at'    => strtotime($this->input->post('created_at',TRUE))?strtotime($this->input->post('created_at',TRUE)):time(),
			'updated_at'    => strtotime($this->input->post('updated_at',TRUE))?strtotime($this->input->post('updated_at',TRUE)):time(),
			'a_author'      => $this->input->post('a_author',TRUE)?$this->input->post('a_author',TRUE):'master',
			'a_admin'       => $this->input->post('a_admin',TRUE)?$this->input->post('a_admin',TRUE):'master',
			'a_source'      => $this->input->post('a_admin',TRUE)?$this->input->post('a_admin',TRUE):'本站',
			'a_keys'        => $this->input->post('a_keys',TRUE),
			'a_description' => $this->input->post('a_description',TRUE),
			'a_index_pic'   => $this->input->post('a_index_pic',TRUE),
			'a_pic'         => $this->input->post('a_pic',TRUE),
			//'a_content'     => $this->input->post('a_content',TRUE),
			'a_content'     => $this->input->post('a_content'),
			'a_top'         => $this->input->post('a_top',TRUE)?$this->input->post('a_top',TRUE):0,
			'a_recommend'   => $this->input->post('a_recommend',TRUE)?$this->input->post('a_recommend',TRUE):0,
			'a_hot'         => $this->input->post('a_hot',TRUE)?$this->input->post('a_hot',TRUE):0,
			'a_is_getimg'   => $this->input->post('a_is_getimg',TRUE)?$this->input->post('a_is_getimg',TRUE):0,
			'a_click'       => $this->input->post('a_click',TRUE),
			'a_sort'        => $this->input->post('a_sort',TRUE)?$this->input->post('a_sort',TRUE):50,
			'a_profile'     => $this->input->post('a_profile',TRUE)?$this->input->post('a_profile',TRUE):mb_substr(strip_tags($this->input->post('a_content',TRUE)),200),
			'a_titlecolor'  => $this->input->post('a_titlecolor',TRUE)?$this->input->post('a_titlecolor',TRUE):'#333333',
			);
		$res = $this->db->insert('article', $data);
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
	 * 修改栏目
	 * @param int $cid 栏目ID
	 * @return boolean $res
	 */
	public function update_article($id)
	{
		$data = array(
			'a_cid'         => $this->input->post('a_cid',TRUE),
			'a_fulltitle'   => $this->input->post('a_fulltitle',TRUE),
			'a_title'       => $this->input->post('a_title',TRUE),
			'a_link'        => $this->input->post('a_link',TRUE),
			'created_at'    => strtotime($this->input->post('created_at',TRUE))?strtotime($this->input->post('created_at',TRUE)):time(),
			'updated_at'    => strtotime($this->input->post('updated_at',TRUE))?strtotime($this->input->post('updated_at',TRUE)):time(),
			'a_author'      => $this->input->post('a_author',TRUE)?$this->input->post('a_author',TRUE):'master',
			'a_admin'       => $this->input->post('a_admin',TRUE)?$this->input->post('a_admin',TRUE):'master',
			'a_source'      => $this->input->post('a_admin',TRUE)?$this->input->post('a_admin',TRUE):'本站',
			'a_keys'        => $this->input->post('a_keys',TRUE),
			'a_description' => $this->input->post('a_description',TRUE),
			'a_index_pic'   => $this->input->post('a_index_pic',TRUE),
			'a_pic'         => $this->input->post('a_pic',TRUE),
			//'a_content'     => $this->input->post('a_content',TRUE),
			'a_content'     => $this->input->post('a_content'),
			'a_top'         => $this->input->post('a_top',TRUE)?$this->input->post('a_top',TRUE):0,
			'a_recommend'   => $this->input->post('a_recommend',TRUE)?$this->input->post('a_recommend',TRUE):0,
			'a_hot'         => $this->input->post('a_hot',TRUE)?$this->input->post('a_hot',TRUE):0,
			'a_is_getimg'   => $this->input->post('a_is_getimg',TRUE)?$this->input->post('a_is_getimg',TRUE):0,
			'a_click'       => $this->input->post('a_click',TRUE),
			'a_sort'        => $this->input->post('a_sort',TRUE)?$this->input->post('a_sort',TRUE):50,
			'a_profile'     => $this->input->post('a_profile',TRUE)?$this->input->post('a_profile',TRUE):mb_substr(strip_tags($this->input->post('a_content',TRUE)),0,200,'utf-8'),
			'a_titlecolor'  => $this->input->post('a_titlecolor',TRUE)?$this->input->post('a_titlecolor',TRUE):'#333333',
			);
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
	 * 设为置顶文章
	 * @param int $id 文章ID
	 * @return void
	 */
	public function setTop($id)
	{
		//查询当前文章
		$article = $this->find_article($id);
		
		switch ($article['a_top'])
		{
			case 0:$article['a_top']=1;
			break;
			case 1:$article['a_top']=0;
			break;
		}
		$res = $this->db->update('article', $article,array('a_id'=>$id));
		echo $article['a_top'];
	}

	/**
	 * 设为推荐文章
	 * @param int $id 文章ID
	 * @return void
	 */
	public function setRecommend($id)
	{
		//查询当前文章
		$article = $this->find_article($id);
		
		switch ($article['a_recommend'])
		{
			case 0:$article['a_recommend']=1;
			break;
			case 1:$article['a_recommend']=0;
			break;
		}
		$res = $this->db->update('article', $article,array('a_id'=>$id));
		echo $article['a_recommend'];
	}

	/**
	 * 设为热点文章
	 * @param int $id 文章ID
	 * @return void
	 */
	public function setHot($id)
	{
		//查询当前文章
		$article = $this->find_article($id);
		
		switch ($article['a_hot'])
		{
			case 0:$article['a_hot']=1;
			break;
			case 1:$article['a_hot']=0;
			break;
		}
		$res = $this->db->update('article', $article,array('a_id'=>$id));
		echo $article['a_hot'];
	}

	/**
	 * 更新文章修改时间
	 * @param int $id 文章ID
	 * @return void
	 */
	public function setUpdatetime($id)
	{
		$article = $this->find_article($id);
		$article['updated_at'] = time();
		$res = $this->db->update('article', $article,array('a_id'=>$id));
		echo date('Y-m-d H:i:s',$article['updated_at']);
	}

	public function ajaxupdate_sort($arr)
	{
		$res = $this->db->update('article', $arr, array('a_id' => $arr['a_id']));
		if ($res)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}