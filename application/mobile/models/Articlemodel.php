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
				$articlelist = $this->db->order_by($order)->where(array('a_is_delete'=>0))->where_in('a_cid',$where_in)->like('a_fulltitle', $condition['keys'], 'both')->get('article')->result_array();
			}
			else
			{
				$articlelist = $this->db->order_by($order)->where(array('a_is_delete'=>0))->like('a_fulltitle', $condition['keys'], 'both')->get('article')->result_array();
			}
			
		}
		else
		{
			if (!empty($where_in))
			{
				$articlelist = $this->db->order_by($order)->where(array('a_is_delete'=>0))->where_in('a_cid',$where_in)->get('article')->result_array();
			}
			else
			{
				$articlelist = $this->db->order_by($order)->where(array('a_is_delete'=>0))->get('article')->result_array();
			}
			
		}
		
		
		foreach ($articlelist as &$value)
		{
			/*所属栏目*/
			$value['p_name'] = $this->parentcate($value['a_cid']);
			$value['a_pic'] = strstr($value['a_pic'],'/upload');
		}
		return $articlelist;
	}

	//查询当前文章父级栏目
	public function parentcate($cid)
	{
		$condition['c_id'] = $cid;
		$res = $this->db->where($condition)->get('category')->row_array();
		return $res['c_name'];
	}


	/**获取上一篇下一篇信息
	 * @param $id 文章ID
	 * @param $ser 位置分隔符
	 */
	public function getNPInfo($id)
	{
		$article = $this->db->where(array('a_id'=>$id))->get('article')->row_array();
		/*获取上一个下一个记录*/
		$res = $this->db->where(array('a_cid'=>$article['a_cid']))->order_by('a_id desc,updated_at desc,a_sort desc')->get('article')->result_array();
		foreach ($res as $key=>$value)
        {
            if ($res[$key]['a_id']==$id)
            {
            	$k = $key;
            }
        }

       	if ($k==0)
       	{
       		//若有多篇文章 则该文章为第一篇
       		//也可能同类别仅有一篇文章
       		$prevk = $k+1;
       		$nextk = 0;
       	} 
       	else
       	{
       		$prevk = $k+1;
        	$nextk = $k-1;
       	}
   		$prev = '';
   		$next = '';
        foreach($res as $key=>$value)
        {	
        	if ($key==$prevk)
        	{
                $prev = $value['a_id'];
                $prevarticle = $this->db->where(array('a_id'=>$prev))->get('article')->row_array();
        		$npinfo['next']['title'] = $prevtitle = $prevarticle['a_fulltitle'];
        	}
        	if ($key==$nextk)
        	{
        		if ($k!=0)
        		{
        			$next = $value['a_id'];
        			$nextarticle = $this->db->where(array('a_id'=>$next))->get('article')->row_array();
        			$npinfo['prev']['title'] = $nexttitle = $nextarticle['a_fulltitle'];
        		}
        	}
        }

        if ($prev=='')
    	{
    		$npinfo['next']['url'] = $prevurl = '';
    	}
    	else
    	{
    		$npinfo['next']['url'] = $prevurl = site_url('Article/content').'/'.$prev;
    	}
        if ($next=='')
        {
        	$npinfo['prev']['url'] = $nexturl = '';
        }
        else
        {
        	$npinfo['prev']['url'] = $nexturl = site_url('Article/content').'/'.$next;
        }
        return $npinfo;
	}

	/*获取推荐文章10篇 按排序号->更新时间->文章ID降序排列*/
	public function getRecommend($cid,$cids)
	{
		$this->db->limit(10,0);
		$cids = $cid.$cids;
		return $this->db->where_in('a_cid',explode(',', $cids))->order_by('a_recommend desc,a_sort desc,updated_at desc,a_id desc')->get('article')->result_array();
	}

	/*获取推荐文章10篇 按排序号->更新时间->文章ID降序排列*/
	public function getHot($cid,$cids)
	{
		$this->db->limit(5,0);
		$cids = $cid.$cids;
		return $this->db->where_in('a_cid',explode(',', $cids))->order_by('a_hot desc,a_sort desc,updated_at desc,a_id desc')->get('article')->result_array();
	}


	//查询当前文章信息
	public function find_article($id)
	{
		$condition['a_id'] = $id;
		return $this->db->where($condition)->get('article')->row_array();
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

}