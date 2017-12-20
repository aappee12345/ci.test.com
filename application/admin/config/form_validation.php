<?php
$config = array(
	'article' => array(
			array(
				'field' => 'a_fulltitle',
				'label' => '文章标题',
				'rules' => 'required',
				),
		),
	'net'     => array(
			array(
				'field' => 'n_name',
				'label' => '网站标题',
				'rules' => 'required',
				),

			array(
				'field' => 'n_keys',
				'label' => '网站关键字',
				'rules' => 'required',
				),

			array(
				'field' => 'n_description',
				'label' => '网站描述',
				'rules' => 'required',
				),

			array(
				'field' => 'water_width',
				'label' => '水印宽度',
				'rules' => 'integer',
				),

			array(
				'field' => 'water_height',
				'label' => '水印高度',
				'rules' => 'integer',
				),
		),
	'area'    => array(
			array(
				'field' => 'area_name',
				'label' => '地区名称',
				'rules' => 'required|is_unique[area.area_name]',
				),
			array(
				'field' => 'area_pinyin',
				'label' => '地区拼音',
				'rules' => 'required|is_unique[area.area_pinyin]',
				),
			array(
				'field' => 'area_sort',
				'label' => '排序号',
				'rules' => 'integer',
				),
		),
	'adminnav'  => array(
			array(
				'field' => 'resourceName',
				'label' => '功能名称',
				'rules' => 'required',
				),
			array(
				'field' => 'resourceGrade',
				'label' => '功能级别',
				'rules' => 'integer',
				),
		),
	'category'  => array(
			array(
				'field' => 'c_name',
				'label' => '栏目名称',
				'rules' => 'required',
				),
			array(
				'field' => 'c_width',
				'label' => '栏目图片宽度',
				'rules' => 'integer',
				),
			array(
				'field' => 'c_height',
				'label' => '栏目图片高度',
				'rules' => 'integer',
				),
			array(
				'field' => 'a_width',
				'label' => '文章图片宽度',
				'rules' => 'integer',
				),
			array(
				'field' => 'a_height',
				'label' => '文章图片高度',
				'rules' => 'integer',
				),
			array(
				'field' => 'c_sort',
				'label' => '栏目排序',
				'rules' => 'integer',
				),
			array(
				'field' => 'c_page_num',
				'label' => '每页记录数',
				'rules' => 'required|integer',
				),
		),
	'ad'        => array(
			array(
				'field' => 'ad_name',
				'label' => '广告位名称',
				'rules' => 'required',
				),
			array(
				'field' => 'ad_size_w',
				'label' => '广告位宽度',
				'rules' => 'integer',
				),
			array(
				'field' => 'ad_size_h',
				'label' => '广告位高度',
				'rules' => 'integer',
				),
		),
	'guanggao'  => array(
			array(
				'field' => 'g_title',
				'label' => '广告名称',
				'rules' => 'required',
				),
			array(
				'field' => 'g_sort',
				'label' => '排序号',
				'rules' => 'integer',
				),
		),
	'linktype'  => array(
			array(
				'field' => 'lt_name',
				'label' => '友情链接分类名称',
				'rules' => 'required',
				),
			array(
				'field' => 'lt_width',
				'label' => '友情链接图片宽度',
				'rules' => 'integer',
				),
			array(
				'field' => 'lt_height',
				'label' => '友情链接图片高度',
				'rules' => 'integer',
				),
		),
	'link'      => array(
			array(
				'field' => 'l_wzname',
				'label' => '链接名称',
				'rules' => 'required',
				),
			array(
				'field' => 'l_wzurl',
				'label' => '链接地址',
				'rules' => 'required|valid_url',
				),
			array(
				'field' => 'l_sort',
				'label' => '链接排序号',
				'rules' => 'integer',
				),
		),
	'common'    => array(
			array(
				'field' => 'co_title',
				'label' => '标题',
				'rules' => 'required',
				),
		),
	'guestbook' => array(
			array(
				'field' => 'g_name',
				'label' => '姓名',
				'rules' => 'required',
				),
			array(
				'field' => 'g_title',
				'label' => '标题',
				'rules' => 'required',
				),
		),
	'role'      => array(
			array(
				'field' => 'r_name',
				'label' => '角色名称',
				'rules' => 'required',
				),
		),
	'manager'   => array(
			array(
				'field' => 'ma_username',
				'label' => '管理员名称',
				'rules' => 'required|min_length[2]|max_length[20]',
				),
			
		),
	);