/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : wantong

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-09-27 15:35:06
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `elfinder_file`
-- ----------------------------
DROP TABLE IF EXISTS `elfinder_file`;
CREATE TABLE `elfinder_file` (
  `id` int(7) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(7) unsigned NOT NULL,
  `name` varchar(256) NOT NULL,
  `content` longblob NOT NULL,
  `size` int(10) unsigned NOT NULL DEFAULT '0',
  `mtime` int(10) unsigned NOT NULL,
  `mime` varchar(256) NOT NULL DEFAULT 'unknown',
  `read` enum('1','0') NOT NULL DEFAULT '1',
  `write` enum('1','0') NOT NULL DEFAULT '1',
  `locked` enum('1','0') NOT NULL DEFAULT '0',
  `hidden` enum('1','0') NOT NULL DEFAULT '0',
  `width` int(5) NOT NULL,
  `height` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `parent_name` (`parent_id`,`name`),
  KEY `parent_id` (`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of elfinder_file
-- ----------------------------

-- ----------------------------
-- Table structure for `mr_ad`
-- ----------------------------
DROP TABLE IF EXISTS `mr_ad`;
CREATE TABLE `mr_ad` (
  `ad_id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_name` varchar(50) DEFAULT NULL COMMENT '广告为名称',
  `ad_type` varchar(50) DEFAULT '1' COMMENT '广告为类型 1为图片',
  `ad_introduce` varchar(100) DEFAULT NULL COMMENT '广告位介绍',
  `ad_size_w` int(11) DEFAULT '0' COMMENT '宽度',
  `ad_size_h` int(11) DEFAULT '0' COMMENT '高度',
  `ad_cate` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'zx',
  `ad_price` int(11) DEFAULT '0' COMMENT '广告位价格',
  `ad_starttime` date DEFAULT NULL COMMENT '生效时间',
  `ad_duration` int(11) DEFAULT '0' COMMENT '持续时间',
  `ad_unit` varchar(20) DEFAULT 'm' COMMENT '计时单位',
  `ad_endtime` date DEFAULT NULL COMMENT '结束时间',
  `ad_display` int(11) DEFAULT '1' COMMENT '前台显示',
  `ad_sort` int(11) DEFAULT '0' COMMENT '排序',
  `ad_addtime` datetime DEFAULT NULL,
  `ad_adduser` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ad_id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COMMENT='广告位表';

-- ----------------------------
-- Records of mr_ad
-- ----------------------------
INSERT INTO `mr_ad` VALUES ('1', '网站首页幻灯片[电脑版]', '1', null, '1920', '470', 'zx', '0', null, '0', 'm', null, '1', '50', null, null);
INSERT INTO `mr_ad` VALUES ('15', '网站首页幻灯片[手机版]', '1', null, '640', '300', 'zx', '0', null, '0', 'm', null, '1', '0', null, null);
INSERT INTO `mr_ad` VALUES ('34', 'dgdf', '1', null, '0', '0', 'zx', '0', null, '0', 'm', null, '1', '0', null, null);

-- ----------------------------
-- Table structure for `mr_adminnav`
-- ----------------------------
DROP TABLE IF EXISTS `mr_adminnav`;
CREATE TABLE `mr_adminnav` (
  `resourceID` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '后台栏目ID',
  `resourceName` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '后台栏目名称',
  `resourceGrade` tinyint(1) unsigned NOT NULL COMMENT '当前栏目等级',
  `resourceOrder` tinyint(2) unsigned DEFAULT '0' COMMENT '栏目排序',
  `resourceType` tinyint(2) unsigned NOT NULL COMMENT '栏目类型',
  `resourceDesc` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '栏目描述',
  `resourceCode` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parentID` int(10) unsigned NOT NULL DEFAULT '2' COMMENT '当前栏目父栏目的ID',
  `delFlag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `checked` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `accessPath` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '链接页面地址',
  PRIMARY KEY (`resourceID`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of mr_adminnav
-- ----------------------------
INSERT INTO `mr_adminnav` VALUES ('2', '基本信息', '2', '0', '0', '', null, '1', '0', '0', '');
INSERT INTO `mr_adminnav` VALUES ('3', '网站配置', '3', '0', '0', '', null, '2', '0', '0', '/Admin/net/index/1');
INSERT INTO `mr_adminnav` VALUES ('4', '日志管理', '3', '0', '0', '', null, '2', '0', '0', '/Admin/log/index');
INSERT INTO `mr_adminnav` VALUES ('5', '功能管理', '3', '0', '0', '', null, '2', '0', '0', '/Admin/adminnav/func');
INSERT INTO `mr_adminnav` VALUES ('6', '栏目管理', '2', '0', '0', '', null, '1', '0', '0', '');
INSERT INTO `mr_adminnav` VALUES ('7', '栏目列表', '3', '0', '0', '', null, '6', '0', '0', '/Admin/category/index');
INSERT INTO `mr_adminnav` VALUES ('8', '添加栏目', '3', '0', '0', '', null, '6', '0', '0', '/Admin/category/add/0');
INSERT INTO `mr_adminnav` VALUES ('9', '内容管理', '2', '0', '0', '', null, '1', '0', '0', '');
INSERT INTO `mr_adminnav` VALUES ('10', '文章列表', '3', '0', '0', '', null, '9', '0', '0', '/Admin/article/index');
INSERT INTO `mr_adminnav` VALUES ('11', '添加文章', '3', '0', '0', '', null, '9', '0', '0', '/Admin/article/add/0');
INSERT INTO `mr_adminnav` VALUES ('12', '广告位管理', '2', '0', '0', '', null, '1', '0', '0', '');
INSERT INTO `mr_adminnav` VALUES ('13', '广告位列表', '3', '0', '0', '', null, '12', '0', '0', '/Admin/ad/index');
INSERT INTO `mr_adminnav` VALUES ('14', '新增广告位', '3', '0', '0', '', null, '12', '0', '0', '/Admin/ad/add');
INSERT INTO `mr_adminnav` VALUES ('15', '友情链接管理', '2', '0', '0', '', null, '1', '0', '0', '');
INSERT INTO `mr_adminnav` VALUES ('16', '链接分类列表', '3', '0', '0', '', null, '15', '0', '0', '/Admin/Linktype/index');
INSERT INTO `mr_adminnav` VALUES ('17', '新增链接分类', '3', '0', '0', '', null, '15', '0', '0', '/Admin/Linktype/add');
INSERT INTO `mr_adminnav` VALUES ('18', '其他内容', '2', '0', '0', '', null, '1', '0', '0', '');
INSERT INTO `mr_adminnav` VALUES ('19', '列表', '3', '0', '0', '', null, '18', '0', '0', '/Admin/common/index');
INSERT INTO `mr_adminnav` VALUES ('20', '新增', '3', '0', '0', '', null, '18', '0', '0', '/admin.php/Common/add');
INSERT INTO `mr_adminnav` VALUES ('21', '留言管理', '2', '0', '0', '', null, '1', '0', '0', '');
INSERT INTO `mr_adminnav` VALUES ('22', '列表', '3', '0', '0', '', null, '21', '', '0', '/Admin/Guestbook/index');
INSERT INTO `mr_adminnav` VALUES ('23', '管理员管理', '2', '0', '0', '', null, '1', '0', '0', '');
INSERT INTO `mr_adminnav` VALUES ('24', '列表', '3', '0', '0', '', null, '23', '0', '0', '/admin.php/Manager/index');
INSERT INTO `mr_adminnav` VALUES ('25', '新增', '3', '0', '0', '', null, '23', '0', '0', '/admin.php/Manager/add');
INSERT INTO `mr_adminnav` VALUES ('26', '修改密码', '3', '0', '0', '', null, '23', '0', '0', '/admin.php/Manager/updatePassword');
INSERT INTO `mr_adminnav` VALUES ('31', '数据管理', '2', '0', '0', '', null, '1', '0', '0', '');
INSERT INTO `mr_adminnav` VALUES ('32', '数据备份', '3', '0', '0', '', null, '31', '0', '0', '/admin.php/DBExport/export');
INSERT INTO `mr_adminnav` VALUES ('33', '数据恢复', '3', '0', '0', '', null, '31', '0', '0', '/admin.php/DBExport/back');

-- ----------------------------
-- Table structure for `mr_area`
-- ----------------------------
DROP TABLE IF EXISTS `mr_area`;
CREATE TABLE `mr_area` (
  `area_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '地区ID',
  `area_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '地区名称',
  `area_pid` int(10) unsigned DEFAULT NULL COMMENT '父级ID',
  `area_level` tinyint(1) unsigned DEFAULT '1' COMMENT '等级 1为省份 2为城市',
  `area_sort` int(10) unsigned DEFAULT NULL COMMENT '地区排序号',
  `area_pinyin` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '地区拼音',
  PRIMARY KEY (`area_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of mr_area
-- ----------------------------
INSERT INTO `mr_area` VALUES ('1', '重庆', '0', '1', '50', 'Chongqing');
INSERT INTO `mr_area` VALUES ('2', '四川', '0', '1', '50', 'Sichuan');
INSERT INTO `mr_area` VALUES ('3', '成都', '2', '2', '50', 'Chengdu');
INSERT INTO `mr_area` VALUES ('4', '陕西', '0', '1', '50', 'Shanxi');
INSERT INTO `mr_area` VALUES ('6', '绵阳', '2', '2', '50', 'Mianyang');

-- ----------------------------
-- Table structure for `mr_article`
-- ----------------------------
DROP TABLE IF EXISTS `mr_article`;
CREATE TABLE `mr_article` (
  `a_id` int(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章ID',
  `a_cid` int(8) unsigned NOT NULL DEFAULT '0' COMMENT '文章所属分类ID 默认为0[顶级分类]',
  `a_fulltitle` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT '文章完整标题',
  `a_title` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '下载地址|文章页SEO标题',
  `created_at` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '文章发布时间',
  `updated_at` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '文章修改时间',
  `a_author` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '文章作者',
  `a_admin` varchar(40) COLLATE utf8_unicode_ci DEFAULT 'admin' COMMENT '文章编辑',
  `a_source` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '文章来源',
  `a_keys` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '文章关键字 以|分隔',
  `a_description` text COLLATE utf8_unicode_ci COMMENT '文章描述|文章摘要',
  `a_index_pic` text COLLATE utf8_unicode_ci NOT NULL,
  `a_pic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '文章图片',
  `a_content` text COLLATE utf8_unicode_ci COMMENT '文章内容',
  `a_top` tinyint(1) unsigned DEFAULT '0' COMMENT '是否置顶 0为不置顶 1为置顶',
  `a_recommend` tinyint(1) unsigned DEFAULT '0' COMMENT '是否推荐 0为不推荐 1为推荐',
  `a_hot` tinyint(1) unsigned DEFAULT '0' COMMENT '是否热门 0为不热门 1为热门',
  `a_click` int(7) unsigned DEFAULT '1' COMMENT '文章点击量',
  `a_sort` tinyint(2) unsigned DEFAULT '50' COMMENT '文章排序',
  `a_profile` text COLLATE utf8_unicode_ci COMMENT '文章摘要或文章简介',
  `a_titlecolor` varchar(20) COLLATE utf8_unicode_ci DEFAULT '#000000' COMMENT '标题颜色 7位 例：#ffffff',
  `a_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '文章外链',
  `a_multipic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '相册图片[以JSON形式保存]',
  `a_is_delete` tinyint(1) unsigned DEFAULT '0' COMMENT '回收站 0未回收 1已回收',
  `a_is_getimg` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of mr_article
-- ----------------------------
INSERT INTO `mr_article` VALUES ('3', '18', '公司简介', '#', '1501556365', '1501556365', 'master', 'master', '本站', '', '重庆市万通仪器仪表有限公司是集工贸一体化的高科技民营企业，下属两个分公司。地处风景秀丽的重庆“后花园”北碚火车站旁．交通便利。运输方便．占地面积10000平方米。', '', '', '<p>重庆市万通仪器仪表有限公司是集工贸一体化的高科技民营企业，下属两个分公司。地处风景秀丽的重庆“后花园”北碚火车站旁．交通便利。运输方便．占地面积10000平方米。</p><p><br></p><p>公司汇集了大批原国企经营管理者及技术人才，有较强的技术实力和经营管理能力，公司拥有员工100多人．其中技术人员40多人。</p><p><br></p><p>重庆万通主导产品有：电动执行机构(一体化电动执行机构、智能型电动执行机构、电子式电动执行机构)及辅助单元(各种操作器、放大器)、CV3000、HT系列电动、气动调节阀、蝶阀、变送器、电偶、仪表盘等产品。</p><p><br></p><p>本公司产品销往全国各行业：电站、化工、冶金、轻工、石油等，并远销东南亚、非洲、南美洲等地区，获得了较高的评价。特别是蝶阀、高压阀广泛应用于各火力发电厂的大型机组．如：30万KW及60万KW等。</p><p>重庆市万通仪器仪表有限公司是集工贸一体化的高科技民营企业，下属两个分公司。地处风景秀丽的重庆“后花园”北碚火车站旁．交通便利。运输方便．占地面积10000平方米。</p><p><br></p><p>公司汇集了大批原国企经营管理者及技术人才，有较强的技术实力和经营管理能力，公司拥有员工100多人．其中技术人员40多人。</p><p><br></p><p>重庆万通主导产品有：电动执行机构(一体化电动执行机构、智能型电动执行机构、电子式电动执行机构)及辅助单元(各种操作器、放大器)、CV3000、HT系列电动、气动调节阀、蝶阀、变送器、电偶、仪表盘等产品。</p><p><br></p><p>本公司产品销往全国各行业：电站、化工、冶金、轻工、石油等，并远销东南亚、非洲、南美洲等地区，获得了较高的评价。特别是蝶阀、高压阀广泛应用于各火力发电厂的大型机组．如：30万KW及60万KW等。</p>', '1', '0', '0', '0', '49', '<p>\r\n      重庆市万通仪器仪表有限公司是集工贸一体化的高科技民营企业，下属两个分公司。地处风景秀丽的重庆“后花园”北碚火车站旁．交通便利。运输方便．占地面积10000平方米。\r\n     </p>\r\n     <br>\r\n     <p>公司汇集了大批原国企经营管理者及技术人才，有较强的技术实力和经营管理能力，公司拥有员工100多人．其中技术人员40多人。</p>\r\n     <br>\r\n     <p>\r\n      重庆万通主导产品有：电动执行机构(一体化电动执行机构、智能型电动执行机构、电子式电动执行机构)及辅助单元(各种操作器、放大器)、CV3000、HT系列电动、气动调节阀、蝶阀、变送器、电偶、仪表盘等产品。\r\n     </p>\r\n     <br>\r\n     <p>\r\n      本公司产品销往全国各行业：电站、化工、冶金、轻工、石油等，并远销东南亚、非洲、南美洲等地区，获得了较高的评价。特别是蝶阀、高压阀广泛应用于各火力发电厂的大型机组．如：30万KW及60万KW等。\r\n     </p>', '#333333', '', null, '0', '0');
INSERT INTO `mr_article` VALUES ('4', '20', '案例一', '#', '1503394679', '1503394679', 'master', 'master', '本站', '', '', '', '', '<table width=\"100%\" border=\"1\"><tbody><tr class=\"firstRow\"><td><p>1</p></td><td><p>2</p></td><td><p>3</p></td><td><p>4</p></td></tr><tr><td><p>阀门类型</p></td><td><p>承插焊连接形式</p></td><td><p>结构形式</p></td><td><p>阀座密封面材料</p></td></tr><tr><td><p>HTJ:取压截止阀</p></td><td><p>1：配管外径+螺纹</p></td><td><p>1：直通式</p></td><td><p>W：与阀体材质相同</p></td></tr><tr><td><p>&nbsp;</p></td><td><p>2：配管外径+配管外径</p></td><td><p>2：角通式</p></td><td><p>H:合金钢</p></td></tr><tr><td>&nbsp;</td><td><p>&nbsp;</p></td><td><p>&nbsp;</p></td><td><p>T:铜合金</p></td></tr><tr><td>&nbsp;</td><td><p>&nbsp;</p></td><td><p>&nbsp;</p></td><td><p>F:氟塑料</p></td></tr><tr><td>&nbsp;</td><td><p>&nbsp;</p></td><td><p>&nbsp;</p></td><td><p>C:搪瓷</p></td></tr></tbody></table><p><br/></p><table width=\"100%\" border=\"1\"><tbody><tr class=\"firstRow\"><td width=\"\">5</td><td width=\"\">6</td><td width=\"\">7</td><td colspan=\"\">8</td><td width=\"\">9</td></tr><tr><td></td><td><br/></td><td><br/></td><td><br/></td><td><br/></td></tr></tbody></table>', '0', '0', '0', '28', '50', '速度但是范德萨发', '#333333', '', null, '0', '0');
INSERT INTO `mr_article` VALUES ('12', '10', '生产流程', '#', '1488868880', '1488868841', null, 'admin', null, null, ' 原材料玄武岩、白云石和焦炭，通过铲车上料，根据参数设置自动输送到对应的原材料大仓。大仓中的原材料根据中控室设定的配方，通过自动计量系统分批自动称量，然后通过皮带分批填入冲天炉中。原材料填入冲天炉后，富氧的空气通过冲天炉风口吹入冲天炉，焦炭剧烈燃烧释放热量，使炉内最高温度达到1500℃以上，玄武岩和白云石逐渐融化，并形成粘稠的熔体。熔体通过冲天炉侧面的虹吸口流出，经过调整好的流道落到离心机的辊子上，粘稠的熔体通过流道先后落到离心机高速旋转的四个辊子上，在强大的离心力作用下熔体被辊子甩成3-5微米直径的熔丝。在离心机的辊子周围有圆形的风环，吹离风系统强大风力和风量由风环吹出，将熔丝急速冷却成固态的纤维，吹离辊子周围。与此同时通过喷胶系统调配好的酚醛树脂、憎水剂、防尘油等由离心机辊子周围的喷嘴喷出，均匀喷洒在纤维丝表面，被离心机吹离风系统吹出的纤维经过积棉室落到积棉鼓上，积棉鼓为圆柱状，其绕轴向旋转，侧面有网格，中心由引风系统形成负压。随着积棉鼓的旋转，纤维不断地被负压吸附在积棉鼓一边的网格上，形成一次毡。一次毡随着积棉鼓的旋转到达另一边时，网格后面的风刀将一次毡吹离鼓面，随水平皮带输送到摆锤，摆锤摆动进行铺毡达到一定层数和厚度通过输送皮带机送入打褶机，进行加压提高岩棉板的抗拉强度，然后送至固化炉进行固化成型，从固化炉出来的岩棉板进行冷却后送至切割系统进行切割，切割后的成品板材经码垛机码垛后，送至包装系统进行热缩包装，合格的产品，最后经由叉车送至库房进行保管。', '', '', '&nbsp; &nbsp; &nbsp; 原材料玄武岩、白云石和焦炭，通过铲车上料，根据参数设置自动输送到对应的原材料大仓。大仓中的原材料根据中控室设定的配方，通过自动计量系统分批自动称量，然后通过皮带分批填入冲天炉中。原材料填入冲天炉后，富氧的空气通过冲天炉风口吹入冲天炉，焦炭剧烈燃烧释放热量，使炉内最高温度达到1500℃以上，玄武岩和白云石逐渐融化，并形成粘稠的熔体。熔体通过冲天炉侧面的虹吸口流出，经过调整好的流道落到离心机的辊子上，粘稠的熔体通过流道先后落到离心机高速旋转的四个辊子上，在强大的离心力作用下熔体被辊子甩成3-5微米直径的熔丝。在离心机的辊子周围有圆形的风环，吹离风系统强大风力和风量由风环吹出，将熔丝急速冷却成固态的纤维，吹离辊子周围。与此同时通过喷胶系统调配好的酚醛树脂、憎水剂、防尘油等由离心机辊子周围的喷嘴喷出，均匀喷洒在纤维丝表面，被离心机吹离风系统吹出的纤维经过积棉室落到积棉鼓上，积棉鼓为圆柱状，其绕轴向旋转，侧面有网格，中心由引风系统形成负压。随着积棉鼓的旋转，纤维不断地被负压吸附在积棉鼓一边的网格上，形成一次毡。一次毡随着积棉鼓的旋转到达另一边时，网格后面的风刀将一次毡吹离鼓面，随水平皮带输送到摆锤，摆锤摆动进行铺毡达到一定层数和厚度通过输送皮带机送入打褶机，进行加压提高岩棉板的抗拉强度，然后送至固化炉进行固化成型，从固化炉出来的岩棉板进行冷却后送至切割系统进行切割，切割后的成品板材经码垛机码垛后，送至包装系统进行热缩包装，合格的产品，最后经由叉车送至库房进行保管。', '0', '0', '0', '0', '50', null, '#000000', '', null, '0', null);
INSERT INTO `mr_article` VALUES ('8', '20', '新闻二十', '#', '1502094735', '1502094735', 'master', 'master', '本站', '', '新闻二新闻二新闻二新闻二新闻二', '0', '', '<p>新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二</p>', '0', '0', '0', '13', '50', '新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻二新闻', '#333333', '', null, '0', '0');
INSERT INTO `mr_article` VALUES ('13', '20', '案例二', '#', '1500350051', '1500350051', 'master', 'master', '本站', '', '', '', 'E:/phpstudy/WWW/upload/article/5bf700ade17363f04f6389e9d06833e9_thumb.jpg', '', '0', '0', '0', '10', '50', '', '#333333', '', null, '0', null);
INSERT INTO `mr_article` VALUES ('22', '10', '第三方', '', '1501220901', '1501220901', 'master', 'master', '本站', '', '', '', '', '', '0', '0', '0', '33', '50', '', '#333333', '', null, '0', null);
INSERT INTO `mr_article` VALUES ('31', '8', '测试标题2', '测试副标题2', '1504775336', '1504775336', 'master', 'master', '本站', '测试关键字', '测试描述', '/upload/article/8d7d10aed22558a0fc0f0a9c5881b196.png', '/upload/article/a3e1c2a45febf16c5f41fd2f8b19898a_thumb.png', '<table>\r\n	<tbody>\r\n		<tr class=\"firstRow\">\r\n			<td>\r\n				5\r\n			</td>\r\n			<td>\r\n				6\r\n			</td>\r\n			<td>\r\n				7\r\n			</td>\r\n			<td>\r\n				8\r\n			</td>\r\n			<td>\r\n				9\r\n			</td>\r\n			<td>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				公称压力\r\n			</td>\r\n			<td>\r\n				阀体材料\r\n			</td>\r\n			<td>\r\n				公称通径\r\n			</td>\r\n			<td>\r\n				温度选择\r\n			</td>\r\n			<td>\r\n				设计序列号\r\n			</td>\r\n			<td>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				1.6 Mpa\r\n			</td>\r\n			<td>\r\n				P:1Cr18Ni9Ti\r\n			</td>\r\n			<td>\r\n				DN 10\r\n			</td>\r\n			<td>\r\n				G:高温\r\n			</td>\r\n			<td>\r\n				1：-40℃~450℃\r\n			</td>\r\n			<td>\r\n				I:标准产品\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				2：-40℃~540℃\r\n			</td>\r\n			<td>\r\n			</td>\r\n			<td>\r\n			</td>\r\n			<td>\r\n			</td>\r\n			<td>\r\n			</td>\r\n			<td>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				4.0 Mpa\r\n			</td>\r\n			<td>\r\n				R:Cr18Ni12MoTi\r\n			</td>\r\n			<td>\r\n				DN 15\r\n			</td>\r\n			<td>\r\n				D:低温\r\n			</td>\r\n			<td>\r\n				1：-100℃~540℃\r\n			</td>\r\n			<td>\r\n				II:改进产品\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				2: -200℃~540℃\r\n			</td>\r\n			<td>\r\n			</td>\r\n			<td>\r\n			</td>\r\n			<td>\r\n			</td>\r\n			<td>\r\n			</td>\r\n			<td>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				6.4 Mpa\r\n			</td>\r\n			<td>\r\n				V:12Cr1MoV\r\n			</td>\r\n			<td>\r\n				DN 20\r\n			</td>\r\n			<td>\r\n				&nbsp;\r\n			</td>\r\n			<td>\r\n				3: -250℃~540℃\r\n			</td>\r\n			<td>\r\n				&nbsp;\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				16 Mpa\r\n			</td>\r\n			<td>\r\n				Z:HT250\r\n			</td>\r\n			<td>\r\n				DN 25\r\n			</td>\r\n			<td>\r\n				&nbsp;\r\n			</td>\r\n			<td>\r\n				&nbsp;\r\n			</td>\r\n			<td>\r\n				&nbsp;\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				32 Mpa\r\n			</td>\r\n			<td>\r\n				T:H62\r\n			</td>\r\n			<td>\r\n				&nbsp;\r\n			</td>\r\n			<td>\r\n				&nbsp;\r\n			</td>\r\n			<td>\r\n				&nbsp;\r\n			</td>\r\n			<td>\r\n				&nbsp;\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				42 Mpa\r\n			</td>\r\n			<td>\r\n				C:WCB\r\n			</td>\r\n			<td>\r\n				&nbsp;\r\n			</td>\r\n			<td>\r\n				&nbsp;\r\n			</td>\r\n			<td>\r\n				&nbsp;\r\n			</td>\r\n			<td>\r\n				&nbsp;\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<br />\r\n<img /> \r\n<p style=\"text-align:center;\">\r\n	1111<br />\r\n122\r\n</p>', '0', '0', '0', '145', '52', '测试摘要', '#333333', '测试外链', null, '0', '0');
INSERT INTO `mr_article` VALUES ('32', '7', '测试标题', '测试副标题', '1501220634', '1501220634', 'master', 'master', '本站', '测试关键字', '测试描述', '', '', '<p>测试内容</p>', '0', '0', '0', '14', '50', '测试摘要', '#333333', '', null, '0', null);
INSERT INTO `mr_article` VALUES ('33', '6', '测试标题2', '', '1501220608', '1501220608', 'master', 'master', '本站', '', '', '', '', '', '0', '0', '0', '10', '50', '', '#333333', '测试外链', null, '0', null);
INSERT INTO `mr_article` VALUES ('36', '19', '资质一', '', '1501316229', '1501316229', 'master', 'master', '本站', '', '', '/upload/article/5b71caff71eebde22279c4c3005b20fe_thumb.jpg', '/upload/article/76ad9a31e16dee8de8e33702213ae70c_thumb.jpg', '', '0', '0', '0', '2', '50', '', '#333333', '', null, '0', '0');
INSERT INTO `mr_article` VALUES ('37', '11', '测试产品栏目二', '', '1503389870', '1503389870', 'master', 'master', '本站', '', '', '/upload/article/c67cab2326688dc9867a7fe05a89112d_thumb.png', '/upload/article/3784cbf201ae094ef5514296a87c7dae_thumb.png', '<table width=\"100%\" border=\"1\"><tbody><tr class=\"firstRow\"><td><p>1</p></td><td><p>2</p></td><td><p>3</p></td><td><p>4</p></td></tr><tr><td><p>阀门类型</p></td><td><p>承插焊连接形式</p></td><td><p>结构形式</p></td><td><p>阀座密封面材料</p></td></tr><tr><td><p>HTJ:取压截止阀</p></td><td><p>1：配管外径+螺纹</p></td><td><p>1：直通式</p></td><td><p>W：与阀体材质相同</p></td></tr><tr><td><p>&nbsp;</p></td><td><p>2：配管外径+配管外径</p></td><td><p>2：角通式</p></td><td><p>H:合金钢</p></td></tr><tr><td>&nbsp;</td><td><p>&nbsp;</p></td><td><p>&nbsp;</p></td><td><p>T:铜合金</p></td></tr><tr><td>&nbsp;</td><td><p>&nbsp;</p></td><td><p>&nbsp;</p></td><td><p>F:氟塑料</p></td></tr><tr><td>&nbsp;</td><td><p>&nbsp;</p></td><td><p>&nbsp;</p></td><td><p>C:搪瓷</p></td></tr></tbody></table><table width=\"100%\" border=\"1\"><tbody><tr class=\"firstRow\"><td width=\"\">5</td><td width=\"\">6</td><td width=\"\">7</td><td colspan=\"\">8</td><td width=\"\">9</td></tr><tr><td><br/></td><td><br/></td><td><br/></td><td><br/></td><td><br/></td></tr></tbody></table>', '0', '0', '0', '85', '50', '56789', '#333333', '', null, '0', '0');
INSERT INTO `mr_article` VALUES ('38', '11', '测试产品栏目一', '', '1501662833', '1501662833', 'master', 'master', '本站', '', '', '', '/upload/article/d8c269cb50c63be08707c66d0223f939_thumb.png', '<p>测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一 测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目 一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产 品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目 一测试产品栏目一测试  产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品 栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一 测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏 目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏 目一测试产品栏目一</p>', '0', '0', '0', '56', '51', '测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品栏目一测试产品...', '#333333', '', null, '0', '0');
INSERT INTO `mr_article` VALUES ('66', '18', 'sdfds', '', '1504836293', '1504836293', 'master', 'master', '本站', '', '', '', '', 'asdfds', '0', '0', '0', '1', '50', 'asdfds', '#333333', '', null, '0', '0');
INSERT INTO `mr_article` VALUES ('44', '18', '水电费', '', '1504680876', '1504680876', 'master', 'master', '本站', '', '', '', '', '', '0', '0', '0', '1', '50', '', '#333333', '', null, '0', '0');
INSERT INTO `mr_article` VALUES ('47', '18', '对对对', '', '1504681120', '1504681120', 'master', 'master', '本站', '', '', '', '', '', '0', '0', '0', '1', '50', '', '#333333', '', null, '0', '0');
INSERT INTO `mr_article` VALUES ('49', '18', '等等', '', '1504681229', '1504681229', 'master', 'master', '本站', '', '', '', '', '', '0', '0', '0', '1', '50', '', '#333333', '', null, '0', '0');
INSERT INTO `mr_article` VALUES ('50', '19', '等等', '', '1504681229', '1504681229', 'master', 'master', '本站', '', '', '', '', '', '0', '0', '0', '1', '50', '', '#333333', '', null, '0', '0');
INSERT INTO `mr_article` VALUES ('53', '18', '对111', '', '1504774474', '1504774474', 'master', 'master', '本站', '', '', '', '', '', '0', '0', '0', '1', '50', '', '#333333', '', null, '0', '0');
INSERT INTO `mr_article` VALUES ('54', '18', '对对对1', '', '1504682156', '1504682156', 'master', 'master', '本站', '', '', '', '', '', '0', '0', '0', '1', '50', '', '#333333', '', null, '0', '0');
INSERT INTO `mr_article` VALUES ('55', '19', '对对对1', '', '1504682156', '1504682156', 'master', 'master', '本站', '', '', '', '', '', '0', '0', '0', '1', '50', '', '#333333', '', null, '0', '0');
INSERT INTO `mr_article` VALUES ('56', '18', 'asd等1123', '', '1504774488', '1504774488', 'master', 'master', '本站', '', '', '', '', '', '0', '0', '0', '1', '50', '', '#333333', '', null, '1', '0');
INSERT INTO `mr_article` VALUES ('57', '19', 'asdas', '', '1504691371', '1504691371', 'master', 'master', '本站', '', '', '', '', '', '0', '0', '0', '1', '50', '', '#333333', '', null, '0', '0');
INSERT INTO `mr_article` VALUES ('60', '19', '水电费打算', '', '1504754647', '1504754647', 'master', 'master', '本站', '', '', '', '', '', '0', '0', '0', '1', '50', '', '#333333', '', null, '0', '0');
INSERT INTO `mr_article` VALUES ('61', '18', '对方身份', '', '1504754704', '1504754704', 'master', 'master', '本站', '', '', '', '', '', '0', '0', '0', '1', '50', '', '#333333', '', null, '0', '0');
INSERT INTO `mr_article` VALUES ('63', '10', 'cesd', '', '1504755949', '1504755949', 'master', 'master', '本站', '', '', '', '', '', '0', '0', '0', '1', '50', '', '#333333', '', null, '0', '0');
INSERT INTO `mr_article` VALUES ('64', '18', 'dsfdsf222', '', '1504836346', '1504836346', 'master', 'master', '本站', '', '', '', '', '', '0', '0', '0', '1', '50', '', '#333333', '', null, '0', '0');
INSERT INTO `mr_article` VALUES ('65', '18', '1114211', '', '1504652401', '1504839601', 'master', 'master', '本站', '', '', '', '', '', '0', '0', '0', '1', '50', '', '#333333', '', null, '0', '0');

-- ----------------------------
-- Table structure for `mr_category`
-- ----------------------------
DROP TABLE IF EXISTS `mr_category`;
CREATE TABLE `mr_category` (
  `c_id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT COMMENT '栏目ID',
  `p_id` tinyint(4) unsigned DEFAULT '0' COMMENT '父级ID 为顶级分类时 父级ID为0',
  `c_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '栏目名称',
  `ec_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '英文名称',
  `ec_navname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '栏目英文导航名',
  `c_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '栏目标题',
  `c_pic` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '栏目图片',
  `c_description` text COLLATE utf8_unicode_ci COMMENT '栏目描述',
  `c_keys` text COLLATE utf8_unicode_ci COMMENT '栏目关键字',
  `c_profile` text COLLATE utf8_unicode_ci COMMENT '栏目简介',
  `c_type` tinyint(2) unsigned DEFAULT NULL COMMENT '页面排版 1单页 2列表 3图片',
  `c_sort` tinyint(4) unsigned DEFAULT '50' COMMENT '栏目排序',
  `c_page_num` tinyint(2) unsigned DEFAULT NULL COMMENT '前端页面当前栏目每页展示数目',
  `c_is_nav` tinyint(1) unsigned DEFAULT '1' COMMENT '是否在导航显示 0不显示 1显示',
  `c_level` tinyint(4) unsigned DEFAULT '0' COMMENT '分类等级 顶级分类为0级 依次递增',
  `c_width` int(10) unsigned DEFAULT NULL COMMENT '封面图[栏目图片]宽度',
  `c_height` int(10) unsigned DEFAULT NULL COMMENT '封面图[栏目图片]高度',
  `a_width` int(10) unsigned DEFAULT NULL COMMENT '文章图片宽度',
  `a_height` int(10) unsigned DEFAULT NULL COMMENT '文章图片高度',
  `img_bg` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '图片背景色',
  `is_water` tinyint(1) DEFAULT '0' COMMENT '是否使用水印 0不使用 1使用',
  PRIMARY KEY (`c_id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of mr_category
-- ----------------------------
INSERT INTO `mr_category` VALUES ('1', '0', '公司简介', 'company profile', '', '', 'E:/phpstudy/vhosts/wantong_thumb.test_thumb.com/upload/category/82ad81a08400aac71965bbbd5da2aa76_thumb.png', '', '', '', '1', '50', '1', '1', '0', '530', '350', '200', '200', null, '0');
INSERT INTO `mr_category` VALUES ('2', '0', '产品简介', '', '', '', '', '', '', '', '3', '50', '1', '1', '0', '200', '200', '200', '200', null, '0');
INSERT INTO `mr_category` VALUES ('25', '4', '行业新闻', '', '', '', '', '', '', '', '2', '49', '12', '1', '1', '200', '200', '200', '200', null, '0');
INSERT INTO `mr_category` VALUES ('3', '0', '产品展示', 'product display', '', '', '', '', '', '', '3', '50', '9', '1', '0', '200', '200', '200', '200', '0', '0');
INSERT INTO `mr_category` VALUES ('4', '0', '新闻中心', '', '', '', '', '', '', '', '2', '50', '12', '1', '0', '200', '200', '200', '200', null, '0');
INSERT INTO `mr_category` VALUES ('5', '0', '业绩展示', '', '', '', '', '', '', '', '2', '50', '2', '1', '0', '200', '200', '200', '200', null, '0');
INSERT INTO `mr_category` VALUES ('6', '0', '服务承诺', '', '', '', '', '', '', '', '1', '50', '1', '1', '0', '200', '200', '200', '200', null, '0');
INSERT INTO `mr_category` VALUES ('7', '0', '人才招聘', '', '', '', '', '', '', '', '1', '50', '1', '1', '0', '200', '200', '200', '200', null, '0');
INSERT INTO `mr_category` VALUES ('8', '0', '联系方式', '', '', '', '', '', '', '', '1', '50', '1', '1', '0', '200', '200', '200', '200', null, '0');
INSERT INTO `mr_category` VALUES ('9', '2', '产品栏目一', '', '', '', '', '', '', '', '3', '50', '6', '1', '1', '200', '200', '200', '200', null, '0');
INSERT INTO `mr_category` VALUES ('10', '2', '产品栏目二', '', '', '', '', '', '', '', '3', '49', '1', '1', '1', '200', '200', '200', '200', null, '0');
INSERT INTO `mr_category` VALUES ('11', '3', '产品栏目一', '', '', '产品栏目一标题', '', '', '关键字1,关键字2', '', '3', '50', '9', '1', '1', '200', '200', '840', '522', '0', '0');
INSERT INTO `mr_category` VALUES ('12', '3', '产品栏目二', '', '', '', '', '', '', '', '3', '49', '9', '1', '1', '200', '200', '840', '522', null, '0');
INSERT INTO `mr_category` VALUES ('18', '1', '公司简介', '', '', '', '', '', '', '', '1', '50', '1', '1', '1', '200', '200', '200', '200', null, '0');
INSERT INTO `mr_category` VALUES ('19', '1', '公司资质', '', '', '', null, '', '', '', '3', '49', '1', '1', '1', '200', '200', '200', '200', null, '0');
INSERT INTO `mr_category` VALUES ('20', '4', '公司新闻', '', '', '', '', '', '', '', '2', '50', '12', '1', '1', '200', '200', '200', '200', null, '0');

-- ----------------------------
-- Table structure for `mr_ci_sessions`
-- ----------------------------
DROP TABLE IF EXISTS `mr_ci_sessions`;
CREATE TABLE `mr_ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `user_agent` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of mr_ci_sessions
-- ----------------------------
INSERT INTO `mr_ci_sessions` VALUES ('b0de4ead0a975b6c772de60ad8b7b273', '127.0.0.1', '0', '1506492678', '');
INSERT INTO `mr_ci_sessions` VALUES ('6147dd8c3be83370dc07787afc517a72', '127.0.0.1', '0', '1506492665', '');
INSERT INTO `mr_ci_sessions` VALUES ('b3fc9c3602be83b510a533e8b4d381eb', '127.0.0.1', '0', '1506492663', '');
INSERT INTO `mr_ci_sessions` VALUES ('127c579ea1f9420fe6a4f4be9d90d499', '127.0.0.1', '0', '1506492657', '');
INSERT INTO `mr_ci_sessions` VALUES ('9c188334cbc15f95d4540006e70dee4f', '127.0.0.1', '0', '1506492632', '');
INSERT INTO `mr_ci_sessions` VALUES ('6972ea02c57e48276985495f473a54df', '127.0.0.1', '0', '1506492630', '');
INSERT INTO `mr_ci_sessions` VALUES ('63af1a6822f51a284968350f0a4681ff', '127.0.0.1', '0', '1506492607', '');
INSERT INTO `mr_ci_sessions` VALUES ('6c4ab5a6bb95df053ead78696e4d532c', '127.0.0.1', '0', '1506492609', '');
INSERT INTO `mr_ci_sessions` VALUES ('d077d3cd7501dc34eb7cfe4512e2e016', '127.0.0.1', '0', '1506492611', '');
INSERT INTO `mr_ci_sessions` VALUES ('cd6044b57c12cba3cece8e6a7427b397', '127.0.0.1', '0', '1506491909', '');
INSERT INTO `mr_ci_sessions` VALUES ('5e46e590675bba4375e617290ffbbaca', '127.0.0.1', '0', '1506491914', '');
INSERT INTO `mr_ci_sessions` VALUES ('f7b050aa22368afa36591b0ec6b796cf', '127.0.0.1', '0', '1506491915', '');
INSERT INTO `mr_ci_sessions` VALUES ('845410323c8eb025e0f53bdd7f896dc3', '127.0.0.1', '0', '1506492452', '');
INSERT INTO `mr_ci_sessions` VALUES ('5cc055b0fc97f6fce2669947c94b1254', '127.0.0.1', '0', '1506491834', '');
INSERT INTO `mr_ci_sessions` VALUES ('db6177adf384ce612828f7c8e1b4f4aa', '127.0.0.1', '0', '1506492602', '');
INSERT INTO `mr_ci_sessions` VALUES ('474a5e3f5440cb59b62c6f09257f356f', '127.0.0.1', '0', '1506492529', '');
INSERT INTO `mr_ci_sessions` VALUES ('613e285afdb4e5425883572bfa5ab1c8', '127.0.0.1', '0', '1506491908', '');
INSERT INTO `mr_ci_sessions` VALUES ('ba91fe95d4d1fbd195a8f2583112921b', '127.0.0.1', '0', '1506491862', '');
INSERT INTO `mr_ci_sessions` VALUES ('f4a9f12c1cfb98206c0f06996978768b', '127.0.0.1', '0', '1506491823', '');
INSERT INTO `mr_ci_sessions` VALUES ('54736768b028b8db581d967ed9095af4', '127.0.0.1', '0', '1506491642', '');
INSERT INTO `mr_ci_sessions` VALUES ('99749d3231fb7ac9eb90105fd3b3319f', '127.0.0.1', '0', '1506491759', '');
INSERT INTO `mr_ci_sessions` VALUES ('96548470a271c58665583ca6bc7d0c26', '127.0.0.1', '0', '1506491764', '');
INSERT INTO `mr_ci_sessions` VALUES ('c6612a0363396e6f78971c14166f7f24', '127.0.0.1', '0', '1506491772', '');
INSERT INTO `mr_ci_sessions` VALUES ('953ed696c51f43bdc3644b98af0e8c5c', '127.0.0.1', '0', '1506491785', '');
INSERT INTO `mr_ci_sessions` VALUES ('1291ff5de59ac936ff772c150cd54e85', '127.0.0.1', '0', '1506491794', '');
INSERT INTO `mr_ci_sessions` VALUES ('9deda520893ff08d29c023de0b9571e2', '127.0.0.1', '0', '1506491806', '');
INSERT INTO `mr_ci_sessions` VALUES ('153ed201c7761efff18b83f39447cdbc', '127.0.0.1', '0', '1506491816', '');
INSERT INTO `mr_ci_sessions` VALUES ('f7286ae32cce7dd685d17883aa0332cb', '127.0.0.1', '0', '1506491589', '');
INSERT INTO `mr_ci_sessions` VALUES ('0aeff255fb2e6b456affd9c1191582e5', '127.0.0.1', '0', '1506491553', '');
INSERT INTO `mr_ci_sessions` VALUES ('200c4cc1e609b08cf28ce1b87db6bf5b', '127.0.0.1', '0', '1506491475', '');
INSERT INTO `mr_ci_sessions` VALUES ('9e42139151008e06fdd151ae645df849', '127.0.0.1', '0', '1506491465', '');
INSERT INTO `mr_ci_sessions` VALUES ('090e0985fdbad6e53f20123833cff3eb', '127.0.0.1', '0', '1506491453', '');
INSERT INTO `mr_ci_sessions` VALUES ('9f9ba999316f24cf9aaef3023b0e78fb', '127.0.0.1', '0', '1506491462', '');
INSERT INTO `mr_ci_sessions` VALUES ('a077c56d6712e6a07d5a8d41c14d33f3', '127.0.0.1', '0', '1506491408', '');
INSERT INTO `mr_ci_sessions` VALUES ('d18f19fb536809e6320fa032a083eb95', '127.0.0.1', '0', '1506491410', '');
INSERT INTO `mr_ci_sessions` VALUES ('7273a080a9f30de35fcc6a7db8ddaff8', '127.0.0.1', '0', '1506491452', '');
INSERT INTO `mr_ci_sessions` VALUES ('b6ba089e55238fa6e14d827f6d7b6fc0', '127.0.0.1', '0', '1506491420', '');
INSERT INTO `mr_ci_sessions` VALUES ('976a2b5e3f47c8bfaba1dd0cd295dafb', '127.0.0.1', '0', '1506490879', '');
INSERT INTO `mr_ci_sessions` VALUES ('182d5e6edd8efeb7f906078522e362d3', '127.0.0.1', '0', '1506493383', '');
INSERT INTO `mr_ci_sessions` VALUES ('02c4f7c7311922607eca72bf4b16f579', '127.0.0.1', '0', '1506493382', '');
INSERT INTO `mr_ci_sessions` VALUES ('d482138adfe6a1bff851cf33f14d3213', '127.0.0.1', '0', '1506493007', '');
INSERT INTO `mr_ci_sessions` VALUES ('5b45d6401d597072b87554421defa9d5', '127.0.0.1', '0', '1506493008', '');
INSERT INTO `mr_ci_sessions` VALUES ('1e2c7ca83f788cf690de0e75a8ccd95b', '127.0.0.1', '0', '1506493324', '');
INSERT INTO `mr_ci_sessions` VALUES ('cc8f58fd1d36463628c7ee0f56d4141e', '127.0.0.1', '0', '1506493334', '');
INSERT INTO `mr_ci_sessions` VALUES ('da8bed1ee9a40138891de27389bbbd1e', '127.0.0.1', '0', '1506493379', '');
INSERT INTO `mr_ci_sessions` VALUES ('d8c4966a24dbf2c55d1ae844081285ce', '127.0.0.1', '0', '1506490877', '');
INSERT INTO `mr_ci_sessions` VALUES ('7a998c54b3b4786efcabdb0b4be130a6', '127.0.0.1', '0', '1506490875', '');
INSERT INTO `mr_ci_sessions` VALUES ('ef9961e56c0f4ccace43f0226ee3eb56', '127.0.0.1', '0', '1506490826', '');
INSERT INTO `mr_ci_sessions` VALUES ('a66837f46ae0db2ae28d807db1eed00b', '127.0.0.1', '0', '1506490824', '');
INSERT INTO `mr_ci_sessions` VALUES ('cac30181b587311ce2f822a4014d6b3b', '127.0.0.1', '0', '1506492985', '');
INSERT INTO `mr_ci_sessions` VALUES ('c11024a488d8bcedbfc64e1f2fad7852', '127.0.0.1', '0', '1506492989', '');
INSERT INTO `mr_ci_sessions` VALUES ('7319daf7fb8d7b0054b052a6062f46e0', '127.0.0.1', '0', '1506492993', '');
INSERT INTO `mr_ci_sessions` VALUES ('2f1b22309222bd90989d51776e308139', '127.0.0.1', '0', '1506492994', '');
INSERT INTO `mr_ci_sessions` VALUES ('cc2e35a2cfb9c68e77e7c5eaa54fd813', '127.0.0.1', '0', '1506493003', '');
INSERT INTO `mr_ci_sessions` VALUES ('9ec89da38fc61a3569a2c5cc1446dd23', '127.0.0.1', '0', '1506490819', '');
INSERT INTO `mr_ci_sessions` VALUES ('9dd48b0254270923961cae1de8018c6e', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36', '1506490781', 'a:3:{s:9:\"user_data\";s:0:\"\";s:11:\"ma_username\";s:6:\"master\";s:15:\"ma_permissionid\";s:4:\"10,1\";}');
INSERT INTO `mr_ci_sessions` VALUES ('2bcd09d3937305225e3c5ce9ab4f8e05', '127.0.0.1', '0', '1506490781', '');
INSERT INTO `mr_ci_sessions` VALUES ('b1c1f36daadc012c20ec44ad9f0f65c1', '127.0.0.1', '0', '1506490663', '');
INSERT INTO `mr_ci_sessions` VALUES ('dfedd57ce97d8a4ea37711e769271d6a', '127.0.0.1', '0', '1506490661', '');
INSERT INTO `mr_ci_sessions` VALUES ('669fc833bc034200653fe887727ec1de', '127.0.0.1', '0', '1506490654', '');
INSERT INTO `mr_ci_sessions` VALUES ('c81e9273df1e9fe32a1b6bb9ca251601', '127.0.0.1', '0', '1506490594', '');
INSERT INTO `mr_ci_sessions` VALUES ('cdbab319f4849427efc6964bbfc71f12', '127.0.0.1', '0', '1506490592', '');
INSERT INTO `mr_ci_sessions` VALUES ('5023af2c4dd2f54b46ee21cd29a9db5b', '127.0.0.1', '0', '1506490590', '');
INSERT INTO `mr_ci_sessions` VALUES ('2536904b35d9fa71dd4a82ec454219aa', '127.0.0.1', '0', '1506492983', '');
INSERT INTO `mr_ci_sessions` VALUES ('1ff4cd769ecfc3ce43b9cb048ef3b0bf', '127.0.0.1', '0', '1506492981', '');
INSERT INTO `mr_ci_sessions` VALUES ('324c10209175b2865cbda682bb445f93', '127.0.0.1', '0', '1506492967', '');
INSERT INTO `mr_ci_sessions` VALUES ('217450fd3770df93e13ef4ab2c32e900', '127.0.0.1', '0', '1506492965', '');
INSERT INTO `mr_ci_sessions` VALUES ('5762fec85874cf233818bfcef5c8cf00', '127.0.0.1', '0', '1506492962', '');
INSERT INTO `mr_ci_sessions` VALUES ('2de40c0be1b7b50286992f75beb26fb1', '127.0.0.1', '0', '1506492925', '');
INSERT INTO `mr_ci_sessions` VALUES ('5bd7ceae124cb5d25983f9a3016e6ad1', '127.0.0.1', '0', '1506492923', '');
INSERT INTO `mr_ci_sessions` VALUES ('60a452a8c5364db7320d335219b7b22a', '127.0.0.1', '0', '1506492888', '');
INSERT INTO `mr_ci_sessions` VALUES ('d194fefde5af6250c01a677f3725f67d', '127.0.0.1', '0', '1506492884', '');
INSERT INTO `mr_ci_sessions` VALUES ('ceb0a317fd091f9e8ba259716aea87be', '127.0.0.1', '0', '1506492882', '');
INSERT INTO `mr_ci_sessions` VALUES ('775a1f3904294ff23994c8a3724d9a05', '127.0.0.1', '0', '1506492873', '');
INSERT INTO `mr_ci_sessions` VALUES ('274b6fa4d48c400a99f2aa9d1f7cc7bd', '127.0.0.1', '0', '1506489703', '');
INSERT INTO `mr_ci_sessions` VALUES ('d043f75e0b20a95d228bca375e84a64a', '127.0.0.1', '0', '1506489709', '');
INSERT INTO `mr_ci_sessions` VALUES ('182bf0422a00e694fc26e2d2a91b9b9b', '127.0.0.1', '0', '1506489711', '');
INSERT INTO `mr_ci_sessions` VALUES ('d896fa80747b65ee335541c1ba86c592', '127.0.0.1', '0', '1506489714', '');
INSERT INTO `mr_ci_sessions` VALUES ('358c31fabd91476b29a6b9ca3cd20134', '127.0.0.1', '0', '1506489749', '');
INSERT INTO `mr_ci_sessions` VALUES ('71df2c745acc846dca07f3e3fd102c82', '127.0.0.1', '0', '1506489818', '');
INSERT INTO `mr_ci_sessions` VALUES ('f8e6cb35e11d97648b602afa6c009414', '127.0.0.1', '0', '1506490004', '');
INSERT INTO `mr_ci_sessions` VALUES ('203bb946570a3d58f0009c444c4b7468', '127.0.0.1', '0', '1506490013', '');
INSERT INTO `mr_ci_sessions` VALUES ('7e56a24f20cbb056235d141ddb0170aa', '127.0.0.1', '0', '1506490282', '');
INSERT INTO `mr_ci_sessions` VALUES ('e4ba3b512c7654f89ad225c58321c53a', '127.0.0.1', '0', '1506490288', '');
INSERT INTO `mr_ci_sessions` VALUES ('209f84cf48e752019c14e98ef5385a23', '127.0.0.1', '0', '1506490299', '');
INSERT INTO `mr_ci_sessions` VALUES ('524a3e7bec72410254d8111760534309', '127.0.0.1', '0', '1506490357', '');
INSERT INTO `mr_ci_sessions` VALUES ('fc805e5b83837f96a0082e3bafd07862', '127.0.0.1', '0', '1506490359', '');
INSERT INTO `mr_ci_sessions` VALUES ('789c779f97cfa352fd1e156eaaafa74c', '127.0.0.1', '0', '1506490362', '');
INSERT INTO `mr_ci_sessions` VALUES ('97765d4cf0dd65a00e1acd7f7be368c8', '127.0.0.1', '0', '1506490368', '');
INSERT INTO `mr_ci_sessions` VALUES ('399064d35c4f1ae60820417e6b2ca414', '127.0.0.1', '0', '1506490374', '');
INSERT INTO `mr_ci_sessions` VALUES ('1d444749b376003b2a2a11817aef9c12', '127.0.0.1', '0', '1506490376', '');
INSERT INTO `mr_ci_sessions` VALUES ('806691320444872b088ae1ccfb51eaa7', '127.0.0.1', '0', '1506490414', '');
INSERT INTO `mr_ci_sessions` VALUES ('38bc129687e18498645561bd72d22028', '127.0.0.1', '0', '1506490418', '');
INSERT INTO `mr_ci_sessions` VALUES ('de7cfaaa28213b5051c86afc074508b4', '127.0.0.1', '0', '1506490424', '');
INSERT INTO `mr_ci_sessions` VALUES ('af183265068244b6b19512642a5c8281', '127.0.0.1', '0', '1506490445', '');
INSERT INTO `mr_ci_sessions` VALUES ('227571fa3ff925df18a66c95d911d96c', '127.0.0.1', '0', '1506490449', '');
INSERT INTO `mr_ci_sessions` VALUES ('7b2faca8d03d41698f08b1f247c86ff1', '127.0.0.1', '0', '1506490452', '');
INSERT INTO `mr_ci_sessions` VALUES ('4000213d1f578af08e36152026e2992a', '127.0.0.1', '0', '1506490512', '');
INSERT INTO `mr_ci_sessions` VALUES ('45e583ec9ba0439fd2c8c2b2be8590fb', '127.0.0.1', '0', '1506490514', '');
INSERT INTO `mr_ci_sessions` VALUES ('bcfa49f14bd7bfc20e1003ee3225e6ad', '127.0.0.1', '0', '1506490569', '');
INSERT INTO `mr_ci_sessions` VALUES ('de6b6ce1d37f64c8b25b068036bb023c', '127.0.0.1', '0', '1506490571', '');
INSERT INTO `mr_ci_sessions` VALUES ('8a951adfc80b33cc991a418033fa8001', '127.0.0.1', '0', '1506492681', '');
INSERT INTO `mr_ci_sessions` VALUES ('686230c3f5c3a34df7aca0e96600512c', '127.0.0.1', '0', '1506492683', '');
INSERT INTO `mr_ci_sessions` VALUES ('fa2f26b962cf96af9468fb36f6efe1fd', '127.0.0.1', '0', '1506492770', '');
INSERT INTO `mr_ci_sessions` VALUES ('10f1c2a5c2d938f865954828c2b65949', '127.0.0.1', '0', '1506492789', '');
INSERT INTO `mr_ci_sessions` VALUES ('4d266e1839b5bd2bc6699547307f04ba', '127.0.0.1', '0', '1506492794', '');
INSERT INTO `mr_ci_sessions` VALUES ('8afecc56919300b5524cb6a038300c8f', '127.0.0.1', '0', '1506492801', '');
INSERT INTO `mr_ci_sessions` VALUES ('df56504ac50ff7a9f49aaa6803158863', '127.0.0.1', '0', '1506492872', '');
INSERT INTO `mr_ci_sessions` VALUES ('35f759ca41726905d00d68f1a1739f92', '127.0.0.1', '0', '1506493385', '');
INSERT INTO `mr_ci_sessions` VALUES ('e9f9f93677684c0e81a2c25ea296db58', '127.0.0.1', '0', '1506493436', '');
INSERT INTO `mr_ci_sessions` VALUES ('5268f71c67185d1c540a88c2df980ceb', '127.0.0.1', '0', '1506493443', '');
INSERT INTO `mr_ci_sessions` VALUES ('8f9dda6381100f41f9ed41b24cf67cda', '127.0.0.1', '0', '1506493453', '');
INSERT INTO `mr_ci_sessions` VALUES ('25c3744ec3a8c40177a7d44d4c21284c', '127.0.0.1', '0', '1506493474', '');
INSERT INTO `mr_ci_sessions` VALUES ('909dbf2b32e2e3a6d119e5f48eee1179', '127.0.0.1', '0', '1506493498', '');
INSERT INTO `mr_ci_sessions` VALUES ('02a68895efae4899f1dfdb1ca0618716', '127.0.0.1', '0', '1506493501', '');
INSERT INTO `mr_ci_sessions` VALUES ('067484116202ecdd09a8c8e6db9d718c', '127.0.0.1', '0', '1506493527', '');
INSERT INTO `mr_ci_sessions` VALUES ('a195b8c252f107948c8c41be34aa3ab0', '127.0.0.1', '0', '1506493603', '');
INSERT INTO `mr_ci_sessions` VALUES ('c97ad2a5310cc59fdaa5240de186efc4', '127.0.0.1', '0', '1506493605', '');
INSERT INTO `mr_ci_sessions` VALUES ('19f1620ecf806e034d734cd25746a620', '127.0.0.1', '0', '1506493607', '');
INSERT INTO `mr_ci_sessions` VALUES ('411870d45eeeac018db3afc1b2a3650b', '127.0.0.1', '0', '1506493624', '');
INSERT INTO `mr_ci_sessions` VALUES ('609be972651d2ddf79c88b2eeb7b2f8a', '127.0.0.1', '0', '1506493625', '');
INSERT INTO `mr_ci_sessions` VALUES ('e7e519cebe2c15d6a38f49ddfc7cd2ff', '127.0.0.1', '0', '1506493627', '');
INSERT INTO `mr_ci_sessions` VALUES ('08efabbbfdc468e8c1b9165d37319d6f', '127.0.0.1', '0', '1506493640', '');
INSERT INTO `mr_ci_sessions` VALUES ('5fc8eafd65c70170a799c52cfc119313', '127.0.0.1', '0', '1506493644', '');
INSERT INTO `mr_ci_sessions` VALUES ('5d2c0600d964d434d806029680691f75', '127.0.0.1', '0', '1506493646', '');
INSERT INTO `mr_ci_sessions` VALUES ('64366c6054c9f0dcc1481d945d040660', '127.0.0.1', '0', '1506493658', '');
INSERT INTO `mr_ci_sessions` VALUES ('86e48d17c90971ff63901ee9c2856d21', '127.0.0.1', '0', '1506493660', '');
INSERT INTO `mr_ci_sessions` VALUES ('929914f0f089ce5e47cf8b314138bc97', '127.0.0.1', '0', '1506493661', '');
INSERT INTO `mr_ci_sessions` VALUES ('7bb76992d452e4bc044729740ef2c215', '127.0.0.1', '0', '1506493668', '');
INSERT INTO `mr_ci_sessions` VALUES ('617ce542857b8b5a037b6f36cae1989d', '127.0.0.1', '0', '1506493670', '');
INSERT INTO `mr_ci_sessions` VALUES ('fe6602037c921e127342d562ea25997a', '127.0.0.1', '0', '1506493672', '');
INSERT INTO `mr_ci_sessions` VALUES ('afa7c45f7d5d3de282eb493784c30e6d', '127.0.0.1', '0', '1506493690', '');
INSERT INTO `mr_ci_sessions` VALUES ('3cb95c89f9aef18a19aa3d4a399983c4', '127.0.0.1', '0', '1506493693', '');
INSERT INTO `mr_ci_sessions` VALUES ('3d0a124541225f65196da03f436da83b', '127.0.0.1', '0', '1506493695', '');
INSERT INTO `mr_ci_sessions` VALUES ('7982cbc36dae05be58d17e87f79d023c', '127.0.0.1', '0', '1506493723', '');
INSERT INTO `mr_ci_sessions` VALUES ('ebb697f29146b09fe0cc03f79041abe5', '127.0.0.1', '0', '1506493726', '');
INSERT INTO `mr_ci_sessions` VALUES ('083933dae878871195f397fa5ea68dd4', '127.0.0.1', '0', '1506493728', '');
INSERT INTO `mr_ci_sessions` VALUES ('2945ccb99e10ac7000e3bfae63931107', '127.0.0.1', '0', '1506493734', '');
INSERT INTO `mr_ci_sessions` VALUES ('69ce908a3dfd1c36ba33af0ba53538e0', '127.0.0.1', '0', '1506493871', '');
INSERT INTO `mr_ci_sessions` VALUES ('2e8060101a9eeeba00eff4875d2fe34a', '127.0.0.1', '0', '1506493873', '');
INSERT INTO `mr_ci_sessions` VALUES ('914f77d40f81573261f11ff45d2ae896', '127.0.0.1', '0', '1506493875', '');
INSERT INTO `mr_ci_sessions` VALUES ('7236971f28d651d1c157b5abc66726bf', '127.0.0.1', '0', '1506493876', '');
INSERT INTO `mr_ci_sessions` VALUES ('d0d5d3a155c5e79d7a9b864f117be42b', '127.0.0.1', '0', '1506493905', '');
INSERT INTO `mr_ci_sessions` VALUES ('c4402864d55033ef47bf29ad130a1273', '127.0.0.1', '0', '1506493908', '');
INSERT INTO `mr_ci_sessions` VALUES ('fe56d7866291b02b2f343c0dd101b9cd', '127.0.0.1', '0', '1506493914', '');
INSERT INTO `mr_ci_sessions` VALUES ('b873f3fc62de8c59dc653d11b586358e', '127.0.0.1', '0', '1506493954', '');
INSERT INTO `mr_ci_sessions` VALUES ('cd3d68e924d90bce9a2635373446a1d5', '127.0.0.1', '0', '1506493956', '');
INSERT INTO `mr_ci_sessions` VALUES ('b275345ef39b005498c77b185e4fb9aa', '127.0.0.1', '0', '1506493958', '');
INSERT INTO `mr_ci_sessions` VALUES ('69641e31de4e3d4c8e8561b67ce73e62', '127.0.0.1', '0', '1506494256', '');
INSERT INTO `mr_ci_sessions` VALUES ('9b1341c98482d9f87b0081b4319e1e1a', '127.0.0.1', '0', '1506494260', '');
INSERT INTO `mr_ci_sessions` VALUES ('e99c91142bc0baaec6515777633e068d', '127.0.0.1', '0', '1506494262', '');
INSERT INTO `mr_ci_sessions` VALUES ('bc3ae8d20b8fe5d94ad14c339a9829a1', '127.0.0.1', '0', '1506494272', '');
INSERT INTO `mr_ci_sessions` VALUES ('ae91982ec23b7d7191083519f279858a', '127.0.0.1', '0', '1506494273', '');
INSERT INTO `mr_ci_sessions` VALUES ('65145b9563110896467f16376874cd20', '127.0.0.1', '0', '1506494275', '');
INSERT INTO `mr_ci_sessions` VALUES ('7dfa68bd60dc09e185711d755a7b9f29', '127.0.0.1', '0', '1506494312', '');
INSERT INTO `mr_ci_sessions` VALUES ('fbdfe5603b3bae2f6b4c956724d09383', '127.0.0.1', '0', '1506494314', '');
INSERT INTO `mr_ci_sessions` VALUES ('6d577803646e7dd37f08de4a163e94c0', '127.0.0.1', '0', '1506494340', '');
INSERT INTO `mr_ci_sessions` VALUES ('3519db58cd225b73994903f5825c4b62', '127.0.0.1', '0', '1506494368', '');
INSERT INTO `mr_ci_sessions` VALUES ('225c5c5c57465d0d5ffef712ee5b5bd3', '127.0.0.1', '0', '1506494370', '');
INSERT INTO `mr_ci_sessions` VALUES ('cfd512f5a7e4d9f0039581c934fa1fd7', '127.0.0.1', '0', '1506494389', '');
INSERT INTO `mr_ci_sessions` VALUES ('97dcaeef9773c75573d28e5204f4d5bc', '127.0.0.1', '0', '1506494393', '');
INSERT INTO `mr_ci_sessions` VALUES ('6d9c238205e713c5a29f3d72e65024d6', '127.0.0.1', '0', '1506494395', '');
INSERT INTO `mr_ci_sessions` VALUES ('985b2b12dec33792c7947295cd0a6c9b', '127.0.0.1', '0', '1506494406', '');
INSERT INTO `mr_ci_sessions` VALUES ('d065675659f660d859b560f34caaa022', '127.0.0.1', '0', '1506494410', '');
INSERT INTO `mr_ci_sessions` VALUES ('64a9eb76305270bbf289f6bc5d01b7ea', '127.0.0.1', '0', '1506494569', '');
INSERT INTO `mr_ci_sessions` VALUES ('4f949e096cd09fde24cc7f9cd6667311', '127.0.0.1', '0', '1506494605', '');
INSERT INTO `mr_ci_sessions` VALUES ('69e22f4cffa0ef6eafadd47f477e1d43', '127.0.0.1', '0', '1506494607', '');
INSERT INTO `mr_ci_sessions` VALUES ('f75741e685f91e390e1ad7492fba310e', '127.0.0.1', '0', '1506494616', '');
INSERT INTO `mr_ci_sessions` VALUES ('f9949b53b5228df5efc4a6958027a0c9', '127.0.0.1', '0', '1506494619', '');
INSERT INTO `mr_ci_sessions` VALUES ('938c763238d98b9311d4294c98691e2d', '127.0.0.1', '0', '1506494628', '');
INSERT INTO `mr_ci_sessions` VALUES ('626b63d55772029854f18a1504651c84', '127.0.0.1', '0', '1506494630', '');
INSERT INTO `mr_ci_sessions` VALUES ('1846b75de1e6aa31947cf1376411d97d', '127.0.0.1', '0', '1506494638', '');
INSERT INTO `mr_ci_sessions` VALUES ('e7633b3011c19912d3a779e1bda3bb4a', '127.0.0.1', '0', '1506494641', '');
INSERT INTO `mr_ci_sessions` VALUES ('b97b320024295f9fc539923578284fa3', '127.0.0.1', '0', '1506494642', '');
INSERT INTO `mr_ci_sessions` VALUES ('48411145fed55a6c2203cf2797697eda', '127.0.0.1', '0', '1506494740', '');
INSERT INTO `mr_ci_sessions` VALUES ('cbc628f96abeb0504c80d11a3a9fe506', '127.0.0.1', '0', '1506494743', '');
INSERT INTO `mr_ci_sessions` VALUES ('d94a1d7edaf822c5b603e5ee10f22a71', '127.0.0.1', '0', '1506494788', '');
INSERT INTO `mr_ci_sessions` VALUES ('c6f3218fbff8d20fc1c4188adfbaa056', '127.0.0.1', '0', '1506494791', '');
INSERT INTO `mr_ci_sessions` VALUES ('ef8c9d28693fed4d14e35ebd3151581f', '127.0.0.1', '0', '1506494794', '');
INSERT INTO `mr_ci_sessions` VALUES ('342e78e10668e7cbd90dcf605bb68dd7', '127.0.0.1', '0', '1506494810', '');
INSERT INTO `mr_ci_sessions` VALUES ('6ee3288cdf1944728b75b495a2ab183c', '127.0.0.1', '0', '1506494813', '');
INSERT INTO `mr_ci_sessions` VALUES ('e041a9d3e6a511a9f2eb56c52e119c59', '127.0.0.1', '0', '1506494867', '');
INSERT INTO `mr_ci_sessions` VALUES ('9f9d6e4b09b0fd4aaaa78afc5965074c', '127.0.0.1', '0', '1506494936', '');
INSERT INTO `mr_ci_sessions` VALUES ('638a1735d82250838bf040015e4c2943', '127.0.0.1', '0', '1506494951', '');
INSERT INTO `mr_ci_sessions` VALUES ('3e88d9ca9c75cb9f1c83b91c3a6f9ff2', '127.0.0.1', '0', '1506495030', '');
INSERT INTO `mr_ci_sessions` VALUES ('e5afa9adb6f28b7c3bb8418fdaf1829a', '127.0.0.1', '0', '1506495035', '');
INSERT INTO `mr_ci_sessions` VALUES ('894ee75fbf7235b25484b7cbf31c85c3', '127.0.0.1', '0', '1506495038', '');
INSERT INTO `mr_ci_sessions` VALUES ('42db7432d0c37bd5c88649328a684134', '127.0.0.1', '0', '1506495092', '');
INSERT INTO `mr_ci_sessions` VALUES ('4bd76631e6a39286d1c4ec40c42228eb', '127.0.0.1', '0', '1506495116', '');
INSERT INTO `mr_ci_sessions` VALUES ('7bab488f2a3530807898a7591cac1a56', '127.0.0.1', '0', '1506495141', '');
INSERT INTO `mr_ci_sessions` VALUES ('fd913e333f125c1ffa44bd7a27613ade', '127.0.0.1', '0', '1506495175', '');
INSERT INTO `mr_ci_sessions` VALUES ('32caaedd5b50beeb59d970a354e4bd38', '127.0.0.1', '0', '1506495326', '');
INSERT INTO `mr_ci_sessions` VALUES ('707821afcd045d6b3e57ae6fab019ada', '127.0.0.1', '0', '1506495389', '');
INSERT INTO `mr_ci_sessions` VALUES ('92d4e6e4dc5009f20ef7a7bf92233528', '127.0.0.1', '0', '1506495453', '');
INSERT INTO `mr_ci_sessions` VALUES ('ad184da87d445b5a2da4aa46f984fc32', '127.0.0.1', '0', '1506495746', '');
INSERT INTO `mr_ci_sessions` VALUES ('8f0678c1a14d0231056beceb707f5fab', '127.0.0.1', '0', '1506495750', '');
INSERT INTO `mr_ci_sessions` VALUES ('6431844d9fc6a073f026325ae1fde886', '127.0.0.1', '0', '1506495778', '');
INSERT INTO `mr_ci_sessions` VALUES ('dfd81b235509f0f19b2800732c08aa25', '127.0.0.1', '0', '1506495780', '');
INSERT INTO `mr_ci_sessions` VALUES ('232e420ceac26c58bd33f1ac45b244c4', '127.0.0.1', '0', '1506495823', '');
INSERT INTO `mr_ci_sessions` VALUES ('84e6c2d8113fa450119cf5032d75ab9a', '127.0.0.1', '0', '1506495825', '');
INSERT INTO `mr_ci_sessions` VALUES ('4f7c1b20827841e07b7884eb746e1626', '127.0.0.1', '0', '1506495834', '');
INSERT INTO `mr_ci_sessions` VALUES ('8d8d5896019838522cac5b0ab5c9d24f', '127.0.0.1', '0', '1506495838', '');
INSERT INTO `mr_ci_sessions` VALUES ('ce16b06571c609d7fb3c28bde9f1930a', '127.0.0.1', '0', '1506495843', '');
INSERT INTO `mr_ci_sessions` VALUES ('5d6ab7790c7aef26f1f1d6e7a86e9f23', '127.0.0.1', '0', '1506495853', '');
INSERT INTO `mr_ci_sessions` VALUES ('605da529a7a8ea108814131c2d491f91', '127.0.0.1', '0', '1506495856', '');
INSERT INTO `mr_ci_sessions` VALUES ('fc46caf224b911aac0eb27dd0a0db65a', '127.0.0.1', '0', '1506495925', '');
INSERT INTO `mr_ci_sessions` VALUES ('c067f3266366e3d11c17e15f3f6833f6', '127.0.0.1', '0', '1506495939', '');
INSERT INTO `mr_ci_sessions` VALUES ('6431c2d6ae8a17864f98f610772a863a', '127.0.0.1', '0', '1506495980', '');
INSERT INTO `mr_ci_sessions` VALUES ('e3f1a9cd80c3f1dc14bffd6dac2c3b61', '127.0.0.1', '0', '1506496009', '');
INSERT INTO `mr_ci_sessions` VALUES ('355d30919694d9e0725e397d1f3dd832', '127.0.0.1', '0', '1506496038', '');
INSERT INTO `mr_ci_sessions` VALUES ('37ac4de3f6676bec4dc67bc99dd77bfa', '127.0.0.1', '0', '1506496071', '');
INSERT INTO `mr_ci_sessions` VALUES ('50b370db607342a7845399c13fb8a788', '127.0.0.1', '0', '1506496133', '');
INSERT INTO `mr_ci_sessions` VALUES ('156d4496b81a98c51d415ee90100206f', '127.0.0.1', '0', '1506496390', '');
INSERT INTO `mr_ci_sessions` VALUES ('f8897a8c2bfa2781b49c1e73c2f59dc0', '127.0.0.1', '0', '1506496428', '');
INSERT INTO `mr_ci_sessions` VALUES ('36fb2b9f4a7300eaa5a963658d1f00cc', '127.0.0.1', '0', '1506496490', '');
INSERT INTO `mr_ci_sessions` VALUES ('53d800a63c78b7632b8370ae295265b2', '127.0.0.1', '0', '1506496497', '');
INSERT INTO `mr_ci_sessions` VALUES ('fb5988fa96366984ee57769cf1175637', '127.0.0.1', '0', '1506496507', '');
INSERT INTO `mr_ci_sessions` VALUES ('eb64bc27f126e310a97543b3b3d19516', '127.0.0.1', '0', '1506496536', '');
INSERT INTO `mr_ci_sessions` VALUES ('4ccab5135622d4617b61362266befe22', '127.0.0.1', '0', '1506496568', '');
INSERT INTO `mr_ci_sessions` VALUES ('76d1e8ff4cdc10a711d1a39048587009', '127.0.0.1', '0', '1506496602', '');
INSERT INTO `mr_ci_sessions` VALUES ('202ef686c07740fc2e1f5fa6ec6af7f6', '127.0.0.1', '0', '1506496634', '');
INSERT INTO `mr_ci_sessions` VALUES ('a3fc13601dea32802c671f6f4d68349f', '127.0.0.1', '0', '1506496658', '');
INSERT INTO `mr_ci_sessions` VALUES ('e0a156e674f18dfc5f198ab47cb64345', '127.0.0.1', '0', '1506496723', '');
INSERT INTO `mr_ci_sessions` VALUES ('7fbbec1493797a54f15c4509cab56c09', '127.0.0.1', '0', '1506496771', '');
INSERT INTO `mr_ci_sessions` VALUES ('8a2f14ec8b55c46152f12a3188474a4c', '127.0.0.1', '0', '1506496793', '');
INSERT INTO `mr_ci_sessions` VALUES ('7f272880beb9e27e07766f8d16cd5329', '127.0.0.1', '0', '1506496798', '');
INSERT INTO `mr_ci_sessions` VALUES ('4666c55ae6b28c8b9d2f429b35e9e33a', '127.0.0.1', '0', '1506496801', '');
INSERT INTO `mr_ci_sessions` VALUES ('16f7f3b395859dc1c1977b9fcf1aaeff', '127.0.0.1', '0', '1506496817', '');
INSERT INTO `mr_ci_sessions` VALUES ('b3fbd39065ed748a140ffa9cd69b3769', '127.0.0.1', '0', '1506496848', '');
INSERT INTO `mr_ci_sessions` VALUES ('5f28516dd362f8176352c95489b73a7b', '127.0.0.1', '0', '1506496869', '');
INSERT INTO `mr_ci_sessions` VALUES ('6317becfa3cbedb23680a39fa1428a44', '127.0.0.1', '0', '1506496884', '');
INSERT INTO `mr_ci_sessions` VALUES ('c34afbf6df7ea3ffefe627f274847253', '127.0.0.1', '0', '1506497096', '');
INSERT INTO `mr_ci_sessions` VALUES ('2b60e1249e7198274b2bda9eec3b0d38', '127.0.0.1', '0', '1506497096', '');
INSERT INTO `mr_ci_sessions` VALUES ('4d4563e881e1087a6b8726226fe6ff44', '127.0.0.1', '0', '1506497107', '');
INSERT INTO `mr_ci_sessions` VALUES ('afa83407e2a4d5718455bd889146d66d', '127.0.0.1', '0', '1506497107', '');
INSERT INTO `mr_ci_sessions` VALUES ('44e92db71ac5d9ef5d375459575057db', '127.0.0.1', '0', '1506497109', '');
INSERT INTO `mr_ci_sessions` VALUES ('c4b6ce32c98a4471b3e9aeaf2eb6945f', '127.0.0.1', '0', '1506497115', '');
INSERT INTO `mr_ci_sessions` VALUES ('91008fe14d0e1a5a88bc544d13d11e45', '127.0.0.1', '0', '1506497116', '');

-- ----------------------------
-- Table structure for `mr_common`
-- ----------------------------
DROP TABLE IF EXISTS `mr_common`;
CREATE TABLE `mr_common` (
  `co_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT '其他公共内容ID',
  `co_title` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '其他公共内容标题',
  `co_pic` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '其他公共内容图片',
  `co_description` text COLLATE utf8_unicode_ci COMMENT '其他公共内容简介',
  `co_content` text COLLATE utf8_unicode_ci COMMENT '其他公共内容',
  `created_at` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '添加时间',
  `updated_at` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`co_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of mr_common
-- ----------------------------
INSERT INTO `mr_common` VALUES ('2', '版权信息', '', '这家伙很懒，什么都没有留下', '<p>重庆万通仪器仪表有限公司</p>', null, '1501572337');
INSERT INTO `mr_common` VALUES ('16', '二维码', 'E:/phpstudy/vhosts/wantong.test.com/upload/common/f22527fc1c0dc9cf1573977cf69dac8e.png', '这家伙很懒，什么都没有留下', '<p>这家伙很懒，什么都没有留下</p>', null, '1501571335');
INSERT INTO `mr_common` VALUES ('3', '地址信息', '', '这家伙很懒，什么都没有留下', '<p>重庆市北碚区龙凤一村36号</p>', null, '1501738238');
INSERT INTO `mr_common` VALUES ('5', '电脑版LOGO', 'E:/phpstudy/vhosts/wantong.test.com/upload/common/b2e6c812148d5abceebb493024dbf816.png', '这家伙很懒，什么都没有留下', '<p>这家伙很懒，什么都没有留下</p>', null, '1501491616');
INSERT INTO `mr_common` VALUES ('10', '微信', 'E:/phpstudy/vhosts/wantong.test.com/upload/common/d0c3739ddf31aa9a2d3f5846d95d3c6a.png', '这家伙很懒，什么都没有留下', '<p>023-86326869</p>', null, '1501571392');
INSERT INTO `mr_common` VALUES ('8', '电话', '', '这家伙很懒，什么都没有留下', '<p>023-6826-5598</p>', null, '1501571448');
INSERT INTO `mr_common` VALUES ('15', '备案号', '', '这家伙很懒，什么都没有留下', '<p>渝ICP123456789</p>', null, '1501571525');
INSERT INTO `mr_common` VALUES ('14', '手机版LOGO', 'E:/phpstudy/vhosts/wantong.test.com/upload/common/fde555cac887c2dd434be6552f176406.jpg', '这家伙很懒，什么都没有留下', '<p>这家伙很懒，什么都没有留下</p>', null, '1501726512');
INSERT INTO `mr_common` VALUES ('17', 'QQ', '', '这家伙很懒，什么都没有留下', '<p>123456789</p>', null, '1501738207');
INSERT INTO `mr_common` VALUES ('18', '手机版电话号码', null, '这家伙很懒，什么都没有留下', '123456789', null, null);
INSERT INTO `mr_common` VALUES ('19', '手机号', null, '这家伙很懒，什么都没有留下', '13983263026 ', null, null);

-- ----------------------------
-- Table structure for `mr_guanggao`
-- ----------------------------
DROP TABLE IF EXISTS `mr_guanggao`;
CREATE TABLE `mr_guanggao` (
  `g_id` int(11) NOT NULL AUTO_INCREMENT,
  `g_ad_id` int(11) DEFAULT NULL,
  `g_cate` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '所属板块说明',
  `g_title` varchar(100) DEFAULT NULL,
  `g_describe` text COMMENT '描述',
  `g_link` varchar(200) DEFAULT NULL,
  `g_path` varchar(100) DEFAULT NULL,
  `g_price` int(11) DEFAULT '0',
  `g_status` int(11) DEFAULT '1',
  `g_starttime` datetime DEFAULT NULL,
  `g_duration` int(11) DEFAULT '0' COMMENT '持续时间',
  `g_unit` varchar(50) DEFAULT 'm' COMMENT '单位年月日',
  `g_endtime` datetime DEFAULT NULL,
  `g_sort` int(11) DEFAULT '0',
  `g_adduser` varchar(50) DEFAULT NULL,
  `g_addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`g_id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COMMENT='广告表';

-- ----------------------------
-- Records of mr_guanggao
-- ----------------------------
INSERT INTO `mr_guanggao` VALUES ('50', '1', null, 'fdsfds', null, 'sdfds', 'E:/phpstudy/vhosts/wantong.test.com/upload/guanggao/6e9a400976c49596803ea21224a06dc5.jpg', '0', '1', null, '0', 'm', null, '50', null, null);
INSERT INTO `mr_guanggao` VALUES ('20', '15', null, '首页广告图', null, '/', 'E:/phpstudy/vhosts/wantong.test.com/upload/guanggao/ad54c7e110dba09626162d2319f76c55.jpg', '0', '1', null, '0', 'm', null, '11', null, null);
INSERT INTO `mr_guanggao` VALUES ('47', '1', null, '测试广告', null, '', 'E:/phpstudy/vhosts/wantong.test.com/upload/guanggao/ab3411c820010629fd7aa6945f5d5321.jpg', '0', '1', null, '0', 'm', null, '50', null, null);
INSERT INTO `mr_guanggao` VALUES ('53', '34', null, 'fsasf2', null, 'sdf', '', '0', '1', null, '0', 'm', null, '50', null, null);
INSERT INTO `mr_guanggao` VALUES ('54', '34', null, 'sdfsdf', null, '', '', '0', '1', null, '0', 'm', null, '50', null, null);
INSERT INTO `mr_guanggao` VALUES ('55', '34', null, 'dsfasf', null, 'sdaf', '', '0', '1', null, '0', 'm', null, '50', null, null);

-- ----------------------------
-- Table structure for `mr_guestbook`
-- ----------------------------
DROP TABLE IF EXISTS `mr_guestbook`;
CREATE TABLE `mr_guestbook` (
  `g_id` int(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '留言ID',
  `g_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '留言人姓名',
  `g_title` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '留言主题',
  `g_sex` tinyint(1) unsigned DEFAULT NULL COMMENT '留言人性别 0女 1男',
  `g_tel` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '留言人联系电话',
  `g_email` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '留言人邮箱或QQ',
  `g_address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '留言人联系地址',
  `g_postcode` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '留言人邮编',
  `g_content` text COLLATE utf8_unicode_ci COMMENT '留言内容',
  `created_at` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '留言时间',
  `updated_at` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '最终审核时间',
  `g_reply` text COLLATE utf8_unicode_ci COMMENT '管理员回复内容',
  `g_status` tinyint(1) unsigned DEFAULT '0' COMMENT '审核状态 0未审核 1已审核',
  PRIMARY KEY (`g_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of mr_guestbook
-- ----------------------------

-- ----------------------------
-- Table structure for `mr_link`
-- ----------------------------
DROP TABLE IF EXISTS `mr_link`;
CREATE TABLE `mr_link` (
  `l_id` int(11) NOT NULL AUTO_INCREMENT,
  `l_class` varchar(50) DEFAULT NULL,
  `l_leixing` int(10) DEFAULT '1',
  `l_wzname` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `l_wzurl` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `l_wzlogourl` varchar(200) DEFAULT NULL,
  `l_zzname` varchar(30) DEFAULT NULL,
  `l_zzemail` varchar(50) DEFAULT NULL,
  `l_wzjianjie` text,
  `l_verify` int(11) DEFAULT '1' COMMENT '审核',
  `l_sort` int(11) DEFAULT '1' COMMENT '自定义排序号',
  `l_lururen` varchar(30) DEFAULT NULL,
  `l_lurutime` datetime DEFAULT NULL,
  PRIMARY KEY (`l_id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COMMENT='友情链接表';

-- ----------------------------
-- Records of mr_link
-- ----------------------------
INSERT INTO `mr_link` VALUES ('27', '1', '2', '满荣网络技术有限公司', 'https://www.cqzz.net', '', null, null, null, '1', '50', null, null);

-- ----------------------------
-- Table structure for `mr_linktype`
-- ----------------------------
DROP TABLE IF EXISTS `mr_linktype`;
CREATE TABLE `mr_linktype` (
  `lt_id` int(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '友情链接分类ID',
  `lt_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '友情链接分类名称',
  `lt_width` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '链接图片宽度',
  `lt_height` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '链接图片高度',
  PRIMARY KEY (`lt_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of mr_linktype
-- ----------------------------
INSERT INTO `mr_linktype` VALUES ('1', '友情链接', null, null);
INSERT INTO `mr_linktype` VALUES ('12', '友情链接列表测试分类', '10', '112');

-- ----------------------------
-- Table structure for `mr_log`
-- ----------------------------
DROP TABLE IF EXISTS `mr_log`;
CREATE TABLE `mr_log` (
  `l_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `updated_at` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `l_ip` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `l_case` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `l_operator` varchar(20) COLLATE utf8_unicode_ci DEFAULT '',
  `created_at` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`l_id`)
) ENGINE=MyISAM AUTO_INCREMENT=494 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of mr_log
-- ----------------------------
INSERT INTO `mr_log` VALUES ('468', '1505116743', '2130706433', 'master添加角色成功！', 'master', '1505116743');
INSERT INTO `mr_log` VALUES ('469', '1505116849', '2130706433', 'master修改角色成功！', 'master', '1505116849');
INSERT INTO `mr_log` VALUES ('470', '1505118107', '2130706433', 'master添加角色成功！', 'master', '1505118107');
INSERT INTO `mr_log` VALUES ('471', '1505118206', '2130706433', 'master修改角色成功！,ID为：17', 'master', '1505118206');
INSERT INTO `mr_log` VALUES ('493', '1506490788', '2130706433', 'master登录成功', 'master', '1506490788');
INSERT INTO `mr_log` VALUES ('492', '1505462949', '2130706433', 'master登录成功', 'master', '1505462949');
INSERT INTO `mr_log` VALUES ('491', '1505446207', '2130706433', 'master修改配置成功！,ID为：1', 'master', '1505446207');
INSERT INTO `mr_log` VALUES ('490', '1505446146', '2130706433', 'master登录成功', 'master', '1505446146');
INSERT INTO `mr_log` VALUES ('489', '1505121356', '2130706433', 'master批量删除管理员成功！,ID为：23', 'master', '1505121356');
INSERT INTO `mr_log` VALUES ('488', '1505121222', '2130706433', 'master批量删除管理员成功！,ID为：24', 'master', '1505121222');
INSERT INTO `mr_log` VALUES ('487', '1505121212', '2130706433', 'master修改管理员成功！,ID为：27', 'master', '1505121212');
INSERT INTO `mr_log` VALUES ('486', '1505121202', '2130706433', 'master修改管理员成功！,ID为：28', 'master', '1505121202');
INSERT INTO `mr_log` VALUES ('485', '1505121187', '2130706433', 'master修改管理员成功！,ID为：29', 'master', '1505121187');
INSERT INTO `mr_log` VALUES ('484', '1505121015', '2130706433', 'master修改管理员成功！,ID为：30', 'master', '1505121015');
INSERT INTO `mr_log` VALUES ('483', '1505120941', '2130706433', '修改管理员成功！,ID为：31', null, '1505120941');
INSERT INTO `mr_log` VALUES ('482', '1505120647', '2130706433', '修改管理员成功！,ID为：31', null, '1505120647');
INSERT INTO `mr_log` VALUES ('481', '1505120430', '2130706433', '添加管理员成功！', null, '1505120430');
INSERT INTO `mr_log` VALUES ('480', '1505120343', '2130706433', '添加管理员成功！', null, '1505120343');
INSERT INTO `mr_log` VALUES ('479', '1505120167', '2130706433', '添加管理员成功！', null, '1505120167');
INSERT INTO `mr_log` VALUES ('478', '1505119915', '2130706433', '添加管理员成功！', null, '1505119915');
INSERT INTO `mr_log` VALUES ('477', '1505119850', '2130706433', '添加管理员成功！', null, '1505119850');
INSERT INTO `mr_log` VALUES ('476', '1505119830', '2130706433', '添加管理员成功！', null, '1505119830');
INSERT INTO `mr_log` VALUES ('475', '1505118255', '2130706433', 'master角色权限操作成功！', 'master', '1505118255');
INSERT INTO `mr_log` VALUES ('474', '1505118248', '2130706433', 'master角色权限操作成功！', 'master', '1505118248');
INSERT INTO `mr_log` VALUES ('473', '1505118222', '2130706433', 'master批量删除角色成功！,ID为：16', 'master', '1505118222');
INSERT INTO `mr_log` VALUES ('472', '1505118210', '2130706433', 'master删除角色成功！,ID为：17', 'master', '1505118210');

-- ----------------------------
-- Table structure for `mr_manager`
-- ----------------------------
DROP TABLE IF EXISTS `mr_manager`;
CREATE TABLE `mr_manager` (
  `ma_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `ma_username` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ma_password` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `ma_description` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '管理员昵称',
  `ma_email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '管理员邮箱',
  `ma_rid` tinyint(4) unsigned DEFAULT NULL,
  `ma_permissionid` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ma_sort` tinyint(2) unsigned DEFAULT NULL,
  `ma_lastloginip` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ma_lastlogintime` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ma_id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of mr_manager
-- ----------------------------
INSERT INTO `mr_manager` VALUES ('1', 'master', 'a95c5fabc7b32c25682929f3f50744d4', '', 'master@126.com', '1', '1', '1', '2130706433', '1506490788');
INSERT INTO `mr_manager` VALUES ('15', 'manrong2', 'a95c5fabc7b32c25682929f3f50744d4', '', 'master@126.com', '4', '11,12,21,22,23,24,31,32,33,34,41,42,43,44,51,52,53,54,61,62,63,64,71,72,73,74,81,82,96,97,98', null, '2130706433', '1502504791');
INSERT INTO `mr_manager` VALUES ('16', 'master3', 'a95c5fabc7b32c25682929f3f50744d4', '', 'master@126.com', '4', '11,12,21,22,23,24,31,32,33,34,41,42,43,44,51,52,53,54,61,62,63,64,71,72,73,74,81,82,96,97,98,99', null, null, null);
INSERT INTO `mr_manager` VALUES ('17', 'cqzzpw', 'a95c5fabc7b32c25682929f3f50744d4', '', 'master1@126.com', '4', '11,12,21,22,23,24,31,32,33,34,41,42,43,44,51,52,53,54,61,62,63,64,71,72,73,74,81,82,96,97,98,99', null, '2130706433', '1500972185');

-- ----------------------------
-- Table structure for `mr_nav`
-- ----------------------------
DROP TABLE IF EXISTS `mr_nav`;
CREATE TABLE `mr_nav` (
  `n_id` tinyint(5) unsigned NOT NULL AUTO_INCREMENT,
  `n_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '导航名称',
  `n_link` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '导航链接',
  `n_sort` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '导航排序',
  `en_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '英文名',
  `n_type` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '导航类型  头部导航 底部导航等等',
  PRIMARY KEY (`n_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of mr_nav
-- ----------------------------
INSERT INTO `mr_nav` VALUES ('6', '产品展示', '/index.php?m=product&a=index', '48', 'product', '1');
INSERT INTO `mr_nav` VALUES ('7', '新闻中心', '/index.php?m=news&a=index', '46', 'news', '1');
INSERT INTO `mr_nav` VALUES ('8', '联系我们', '/index.php?m=contact&a=index', '11', 'contact', '1');
INSERT INTO `mr_nav` VALUES ('12', '公司资质', '/index.php?m=zizhi&a=index', '49', 'zizhi', '1');
INSERT INTO `mr_nav` VALUES ('13', '公司简介', '/index.php?m=about&a=index', '50', 'about', '1');
INSERT INTO `mr_nav` VALUES ('14', '工程案例', '/index.php?m=case&a=index', '47', 'case', '1');
INSERT INTO `mr_nav` VALUES ('20', '测试日志11', '/Home/index/index', '50', 'ceshi', '1');
INSERT INTO `mr_nav` VALUES ('21', '测试日志2', '/Admin/nav/indexa', '41', 'case', '1');

-- ----------------------------
-- Table structure for `mr_net`
-- ----------------------------
DROP TABLE IF EXISTS `mr_net`;
CREATE TABLE `mr_net` (
  `n_id` tinyint(2) unsigned NOT NULL AUTO_INCREMENT,
  `n_co_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '公司名称 用于SEO标题后缀',
  `n_name` text COLLATE utf8_unicode_ci COMMENT '网站名称',
  `n_url` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '网站域名',
  `n_keys` text COLLATE utf8_unicode_ci COMMENT '关键字 用|分隔',
  `n_description` text COLLATE utf8_unicode_ci COMMENT '网站描述',
  `n_pathinfo` tinyint(1) unsigned DEFAULT '0' COMMENT '是否开启伪静态 默认为0 禁用  1开启',
  `n_copy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '版权信息',
  `n_beian` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '备案号',
  `updated_at` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '修改时间',
  `water_width` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '水印最大宽度',
  `water_height` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '水印最大高度',
  `water_hor` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '水印水平对其方式',
  `water_vrt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '水印垂直对其方式',
  `water_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '水印绝对地址',
  PRIMARY KEY (`n_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of mr_net
-- ----------------------------
INSERT INTO `mr_net` VALUES ('1', '144首页', '14412', 'http://zhukong.test.com', '万通仪器,万通仪表', '1213531', '1', '5114', '2211', '2017-03-18 15:16:08', '80', '10', 'center', 'bottom', 'D:/phpstudy/WWW/upload/net/bd333b7cd43b664c996fdabc8a02d26e_thumb.jpg');

-- ----------------------------
-- Table structure for `mr_role`
-- ----------------------------
DROP TABLE IF EXISTS `mr_role`;
CREATE TABLE `mr_role` (
  `r_id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `r_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '超级管理员' COMMENT '角色名称',
  `r_permission` text CHARACTER SET utf8 COLLATE utf8_unicode_ci COMMENT '角色权限',
  PRIMARY KEY (`r_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mr_role
-- ----------------------------
INSERT INTO `mr_role` VALUES ('1', '超级管理员', '1');
INSERT INTO `mr_role` VALUES ('4', '普通管理员', '11,12,21,22,23,24,31,32,33,34,41,42,43,44,51,52,53,54,61,62,63,64,71,72,73,74,81,82,96,97,98,99');
INSERT INTO `mr_role` VALUES ('14', '普通管理员', '1');
INSERT INTO `mr_role` VALUES ('15', '普通管理员', '11,13,12,21,22,23,24,31,32,33,34,41,42,43,44,51,52,53,54,61,62,63,64,71,72,73,74,81,82,91,92,93,94,95,96,97,98');

-- ----------------------------
-- Table structure for `mr_service`
-- ----------------------------
DROP TABLE IF EXISTS `mr_service`;
CREATE TABLE `mr_service` (
  `s_id` int(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '客服ID',
  `st_id` int(8) unsigned DEFAULT NULL COMMENT '所属分类ID',
  `s_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '客服名称',
  `s_qq` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '客服QQ或电话',
  `s_note` tinytext COLLATE utf8_unicode_ci COMMENT '客服说明',
  `s_sort` tinyint(2) unsigned DEFAULT NULL COMMENT '客服排序号',
  PRIMARY KEY (`s_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of mr_service
-- ----------------------------

-- ----------------------------
-- Table structure for `mr_servicetype`
-- ----------------------------
DROP TABLE IF EXISTS `mr_servicetype`;
CREATE TABLE `mr_servicetype` (
  `st_id` int(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '客服分组ID',
  `st_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '客服分组名字',
  `st_sort` tinyint(3) unsigned DEFAULT NULL COMMENT '分组排序',
  `st_visiable` tinyint(1) unsigned DEFAULT '1' COMMENT '是否显示  1显示[默认] 0隐藏',
  PRIMARY KEY (`st_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of mr_servicetype
-- ----------------------------
INSERT INTO `mr_servicetype` VALUES ('1', '联系我们信息', '50', '1');

-- ----------------------------
-- Table structure for `mr_settype`
-- ----------------------------
DROP TABLE IF EXISTS `mr_settype`;
CREATE TABLE `mr_settype` (
  `t_id` tinyint(2) unsigned NOT NULL AUTO_INCREMENT,
  `t_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '版面名称',
  PRIMARY KEY (`t_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of mr_settype
-- ----------------------------
INSERT INTO `mr_settype` VALUES ('1', '单页');
INSERT INTO `mr_settype` VALUES ('2', '新闻列表');
INSERT INTO `mr_settype` VALUES ('3', '图片列表');
INSERT INTO `mr_settype` VALUES ('4', '下载列表');
INSERT INTO `mr_settype` VALUES ('5', '问答列表');

-- ----------------------------
-- Table structure for `mr_test`
-- ----------------------------
DROP TABLE IF EXISTS `mr_test`;
CREATE TABLE `mr_test` (
  `id` tinyint(2) unsigned NOT NULL AUTO_INCREMENT COMMENT 'sdf',
  `name` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of mr_test
-- ----------------------------

-- ----------------------------
-- Table structure for `mr_usersession`
-- ----------------------------
DROP TABLE IF EXISTS `mr_usersession`;
CREATE TABLE `mr_usersession` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'session ID',
  `ma_username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '用户名',
  `ma_permissionid` text CHARACTER SET utf8 COLLATE utf8_unicode_ci COMMENT '权限ID',
  `ma_lastloginip` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '最后登录IP',
  `ma_lastlogintime` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '最后登录时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mr_usersession
-- ----------------------------
