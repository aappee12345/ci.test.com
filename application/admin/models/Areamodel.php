<?php
class Areamodel extends CI_Model
{
	public $area_id;
	public $area_name;
	public $area_pid;
	public $area_level;
	public $area_sort;
	public $area_pinyin;
	public $parent_name;
	
	public $cids;
	public $i = 0;
	public $tree;

	//查询记录
	public function check($pid=0)
	{
		$arealist = $this->db->where(array('area_pid'=>$pid))->order_by('area_sort DESC,area_id DESC')->get('area')->result_array();
		if (!empty($arealist))
		{
			foreach ($arealist as $area)
			{
				$this->tree[$this->i] = $area;
				$this->i ++;
				self::check($area['area_id']);
			}
		}
		foreach ($this->tree as &$value)
		{
			$this->parent_name = '';
			if ($value['area_pid']==0)
			{
				$this->parent_name = '省级地区';
				$value['p_name'] = $this->parent_name;
			}
			else
			{
				$this->parentarea($value['area_pid']);
				$value['p_name'] = $this->parent_name;
			}
		}
		return $this->tree;
	}


	//查询当前地区
	public function find_area($id)
	{
		$condition['area_id'] = $id;
		return $this->db->where($condition)->get('area')->row_array();
	}

	//查询所有省级地区
	public function topareas()
	{
		$condition['area_pid'] = 0;
		return $this->db->where($condition)->order_by('area_sort DESC,area_id DESC')->get('area')->result_array();
	}

	/**查询所属栏目及栏目路径 //级别 顶级栏目的级别为0 依次递增
	 * @param int $pid 参数为当前分类的父级
	 * @return array $data
	 */
	public function parentarea($pid)
	{
		//查询当前分类的父级分类信息
		$res = $this->db->where(array('area_id'=>$pid))->get('area')->result_array();

		//判断是否有上级分类
		if ($res[0]['area_pid']==0)
		{
			//当前父级分类已经为顶级分类
			//$this->parent_name = $res[0]['c_name'].'/'.$this->parent_name;
			$this->parent_name = $res[0]['area_name'].'&nbsp;→&nbsp;'.$this->parent_name;
		}
		else
		{
			//当前父级分类不是顶级分类
			//$this->parent_name = $res[0]['c_name'].'/'.$this->parent_name;
			$this->parent_name = $res[0]['area_name'].'&nbsp;→&nbsp;'.$this->parent_name;
			$res = self::parentarea($res[0]['area_pid']);
		}
	}

	

	/**添加地区
	 * @return boolean $res
	 *
	 */
	public function insert_area()
	{
		$pid = $this->input->post('area_pid');
		if ($pid==0)
		{
			$area_level = 1;
		}
		else
		{
			//获取父级分类的等级
			$area_level = 2;
		}
		
		$data = array(
			'area_name'   => $this->input->post('area_name',TRUE),
			'area_pid'    => $pid,
			'area_level'  => $area_level,
			'area_pinyin' => $this->input->post('area_pinyin',TRUE),
			'area_sort'   => $this->input->post('area_sort',TRUE)?$this->input->post('area_sort',TRUE):50,
			);
		$res = $this->db->insert('area', $data);
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
	 * 修改地区
	 * @param int $id 地区ID
	 * @return boolean $res
	 */
	public function update_area($id)
	{
		$pid = $this->input->post('area_pid');
		if ($pid==0)
		{
			$area_level = 1;
		}
		else
		{
			$area_level = 2;
		}
		
		$data = array(
			'area_name'   => $this->input->post('area_name',TRUE),
			'area_pid'    => $pid,
			'area_level'  => $area_level,
			'area_pinyin' => $this->input->post('area_pinyin',TRUE),
			'area_sort'   => $this->input->post('area_sort',TRUE)?$this->input->post('area_sort',TRUE):50,
			);
		$res = $this->db->update('area', $data, array('area_id' => $id));
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