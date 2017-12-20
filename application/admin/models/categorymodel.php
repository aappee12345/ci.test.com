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
	public $c_biaoshi;
	public $parent_name;
	public $selectlist;
	public $cids;
	public $i = 0;
	public $tree;

	//查询记录
	public function check($pid=0)
	{
		$catelist = $this->db->where(array('p_id'=>$pid))->order_by('c_sort DESC,c_id ASC')->get('category')->result_array();
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
			$paiban = $this->db->where(array('t_id'=>$value['c_type']))->get('settype')->result_array();
			$value['t_name'] = $paiban[0]['t_name'];
			$value['c_pic'] = strstr($value['c_pic'],'/upload');
		}
		//exit;
		return $this->tree;
	}
/*
	public function check($condition=array())
	{
		if (!empty($condition))
		{
			$catelist = $this->db->where($condition)->order_by('c_sort DESC,c_id ASC')->get('category')->result_array();
		}
		else
		{
			$catelist = $this->db->order_by('c_sort DESC,c_id ASC')->get('category')->result_array();
		}
		
		foreach ($catelist as &$value)
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
			$value['c_pic'] = strstr($value['c_pic'],'/upload/category');
		}
		return $catelist;
	}
*/
	

	//查询当前栏目
	public function find_cate($cid)
	{
		$condition['c_id'] = $cid;
		return $this->db->where($condition)->get('category')->row_array();
	}

	/**查询所属栏目及栏目路径 //级别 顶级栏目的级别为0 依次递增
	 * @param int $pid 参数为当前分类的父级
	 * @return array $data
	 */
	public function parentcate($pid)
	{
		//查询当前分类的父级分类信息
		$res = $this->db->where(array('c_id'=>$pid))->get('category')->result_array();

		//判断是否有上级分类
		if ($res[0]['p_id']==0)
		{
			//当前父级分类已经为顶级分类
			//$this->parent_name = $res[0]['c_name'].'/'.$this->parent_name;
			$this->parent_name = $res[0]['c_name'].'&nbsp;→&nbsp;'.$this->parent_name;
		}
		else
		{
			//当前父级分类不是顶级分类
			//$this->parent_name = $res[0]['c_name'].'/'.$this->parent_name;
			$this->parent_name = $res[0]['c_name'].'&nbsp;→&nbsp;'.$this->parent_name;
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
		$result = $this->db->where(array('p_id'=>$cid))->get('category')->result_array();

		if (!empty($result))
		{

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
		$res = $this->db->where(array('p_id'=>0))->get('category')->result_array();
		return $res;
	}

	/**查询子栏目列表
	 * @param int $cid
	 * @return array $data
	 */
	public function soncate($cid)
	{
		$res = $this->db->where(array('p_id'=>$cid))->get('category')->result_array();
		return $res;
	}

	/**查询栏目等级
	 * @param int $cid
	 * @return array $data
	 */
	public function get_level($cid)
	{
		$res = $this->db->where(array('c_id'=>$cid))->get('category')->row_array();
		return $res['c_level'];
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
			$this->selectlist[$p_level]['selected'] = $this->db->where(array('c_id'=>$pid))->get('category')->row_array();
			$this->selectlist[$p_level]['catelist'] = $this->db->where(array('p_id'=>$this->selectlist[$p_level]['selected']['p_id']))->get('category')->result_array();
			$level = (int)$p_level-1;
			$parent_id = (int)$this->selectlist[$p_level]['selected']['p_id'];
			self::get_fathercatelist($parent_id,$level);
		}
	}

	public function ajaxupdate_sort($arr)
	{
		$res = $this->db->update('category', $arr, array('c_id' => $arr['c_id']));
		if ($res)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	/**添加栏目
	 * @return boolean $res
	 *
	 */
	public function insert_category()
	{
		$pid = $this->input->post('p_id');
		if ($pid==0)
		{
			$c_level = 0;
		}
		else
		{
			//获取父级分类的等级
			$p_level = $this->get_level($pid);
			$c_level = $p_level+1;
		}
		
		$data = array(
			'c_name' => $this->input->post('c_name'),
			'p_id' => $this->input->post('p_id'),
			'ec_name' => $this->input->post('ec_name'),
			'ec_navname' => $this->input->post('ec_navname'),
			'c_title' => $this->input->post('c_title'),
			'c_pic' => $this->input->post('c_pic'),
			'c_description' => $this->input->post('c_description'),
			'c_keys' => $this->input->post('c_keys'),
			'c_biaoshi' => $this->input->post('c_biaoshi'),
			'c_profile' => $this->input->post('c_profile'),
			'c_type' => $this->input->post('c_type'),
			'c_sort' => $this->input->post('c_sort')?$this->input->post('c_sort'):50,
			'c_is_nav' => $this->input->post('c_is_nav'),
			'c_page_num' => $this->input->post('c_page_num'),
			'c_level' => $c_level,
			'c_width' => $this->input->post('c_width')?$this->input->post('c_width'):200,
			'c_height'=> $this->input->post('c_height')?$this->input->post('c_width'):200,
			'a_width' => $this->input->post('a_width')?$this->input->post('a_width'):200,
			'a_height'=> $this->input->post('a_height')?$this->input->post('a_height'):200,
			'img_bg' =>  $this->input->post('img_bg'),
			'is_water'=> $this->input->post('is_water')?$this->input->post('is_water'):0,
			);
		$res = $this->db->insert('category', $data);
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
	public function update_category($cid)
	{
		$pid = $this->input->post('p_id');
		if ($pid==0)
		{
			$c_level = 0;
		}
		else
		{
			//获取父级分类的等级
			$p_level = $this->get_level($pid);
			$c_level = $p_level+1;
		}
		
		$data = array(
			'c_name' => $this->input->post('c_name'),
			'p_id' => $this->input->post('p_id'),
			'ec_name' => $this->input->post('ec_name'),
			'ec_navname' => $this->input->post('ec_navname'),
			'c_title' => $this->input->post('c_title'),
			'c_pic' => $this->input->post('c_pic'),
			'c_description' => $this->input->post('c_description'),
			'c_keys' => $this->input->post('c_keys'),
			'c_biaoshi' => $this->input->post('c_biaoshi'),
			'c_profile' => $this->input->post('c_profile'),
			'c_type' => $this->input->post('c_type'),
			'c_sort' => $this->input->post('c_sort')?$this->input->post('c_sort'):50,
			'c_is_nav' => $this->input->post('c_is_nav'),
			'c_page_num' => $this->input->post('c_page_num'),
			'c_level' => $c_level,
			'c_width' => $this->input->post('c_width')?$this->input->post('c_width'):200,
			'c_height'=> $this->input->post('c_height')?$this->input->post('c_height'):200,
			'a_width' => $this->input->post('a_width')?$this->input->post('a_width'):200,
			'a_height'=> $this->input->post('a_height')?$this->input->post('a_height'):200,
			'img_bg' =>  $this->input->post('img_bg'),
			'is_water'=> $this->input->post('is_water')?$this->input->post('is_water'):0,
			);
		$res = $this->db->update('category', $data, array('c_id' => $cid));
		//$res = $this->db->insert('category', $data);
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