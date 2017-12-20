<?php
class Logmodel extends CI_Model
{
	public $l_ip;
	public $l_case;
	public $l_operator;
	public $updated_at;
	public $created_at;

	//查询日志分页列表
	public function check($condition)
	{
		$data = array();
		//分页
		$data = $this->db->select('*')->from('log')->like('l_operator', $condition['keys'], 'both')->or_like('l_case', $condition['keys'], 'both')->order_by('l_id','desc')->get()->result_array();
		$data['keys'] = $condition['keys'];
		return $data;
	}

	//处理添加日志
	public function addLog($case,$username = '后台管理员',$id=0)
	{
		$this->l_ip = ip2long($_SERVER['REMOTE_ADDR']);
		$this->l_operator = $username;
		if ($id == 0)
		{
			$this->l_case = $this->l_operator.$case;
		}
		else
		{
			$this->l_case = $this->l_operator.$case.',ID为：'.$id;
		}
		$this->updated_at = time();
		$this->created_at = time();
		$res = $this->db->insert('log', $this);
	}

	//处理删除
	public function del($lid)
	{
		$res = $this->db->delete('log',array('l_id'=>$lid));
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