/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50524
Source Host           : localhost:3306
Source Database       : dakong

Target Server Type    : MYSQL
Target Server Version : 50524
File Encoding         : 65001

Date: 2014-12-22 22:14:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tp_atl`
-- ----------------------------
DROP TABLE IF EXISTS `tp_atl`;
CREATE TABLE `tp_atl` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `atlname` varchar(50) DEFAULT NULL,
  `cid` int(4) DEFAULT NULL,
  `atldes` text,
  `savename` varchar(30) DEFAULT NULL,
  `savenamethumb` varchar(30) DEFAULT NULL,
  `picname` varchar(200) DEFAULT NULL,
  `picdes` text,
  `pichref` varchar(50) DEFAULT NULL,
  `isshow` tinyint(1) DEFAULT '0',
  `isrecom` tinyint(1) DEFAULT '0',
  `orderby` int(4) DEFAULT '0',
  `createtime` varchar(30) DEFAULT NULL,
  `lang` tinyint(1) DEFAULT NULL,
  `addtime` varchar(30) DEFAULT NULL,
  `updatetime` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=403 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_atl
-- ----------------------------
INSERT INTO `tp_atl` VALUES ('376', '首页banner', '9', '', '549171364440c.jpg', 's_549171364440c.jpg', '1417966396.jpg', '', 'http://', '1', '0', '1', '1413439428', '1', null, '1418817871');
INSERT INTO `tp_atl` VALUES ('401', '首页banner', '9', '', '5491712b5b431.jpg', 's_5491712b5b431.jpg', '1417965989.jpg', '', 'http://', '1', '0', '1', '1413439428', '1', null, '1418817871');
INSERT INTO `tp_atl` VALUES ('402', '首页banner', '9', '', '5491711dcc7e8.jpg', 's_5491711dcc7e8.jpg', '1417965912.jpg', '', 'http://', '1', '0', '1', '1413439428', '1', null, '1418817871');

-- ----------------------------
-- Table structure for `tp_atlclass`
-- ----------------------------
DROP TABLE IF EXISTS `tp_atlclass`;
CREATE TABLE `tp_atlclass` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `pid` int(4) DEFAULT NULL,
  `atlclassname` varchar(50) DEFAULT NULL,
  `path` varchar(100) DEFAULT NULL,
  `pic` varchar(30) DEFAULT NULL,
  `picthumb1` varchar(30) DEFAULT NULL,
  `picthumb2` varchar(30) DEFAULT NULL,
  `atlclasscontent` text,
  `isshow` tinyint(1) DEFAULT '0',
  `addtime` varchar(30) DEFAULT NULL,
  `updatetime` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_atlclass
-- ----------------------------
INSERT INTO `tp_atlclass` VALUES ('9', '0', '网站banner', '0', '543f5fc06cd2f.jpg', 's_543f5fc06cd2f.jpg', 'm_543f5fc06cd2f.jpg', '', '1', '1413439425', null);

-- ----------------------------
-- Table structure for `tp_concate`
-- ----------------------------
DROP TABLE IF EXISTS `tp_concate`;
CREATE TABLE `tp_concate` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `pid` int(4) DEFAULT '0',
  `conclname` varchar(30) DEFAULT NULL,
  `path` varchar(100) DEFAULT NULL,
  `isshow` tinyint(1) DEFAULT '0',
  `othercon` text,
  `lang` tinyint(1) DEFAULT '0',
  `addtime` varchar(30) DEFAULT NULL,
  `updatetime` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_concate
-- ----------------------------
INSERT INTO `tp_concate` VALUES ('47', '0', '公司简介', '0', '1', '公司简介公司简介公司简介', '1', '1413425303', '1418822718');
INSERT INTO `tp_concate` VALUES ('49', '0', '底部版权', '0', '1', '底部版权底部版权底部版权底部版权底部版权', '1', '1413426950', null);
INSERT INTO `tp_concate` VALUES ('50', '0', '联系我们', '0', '1', '', '1', '1413431099', '1415526653');
INSERT INTO `tp_concate` VALUES ('53', '0', '首页单页面', '0', '1', '', '1', '1415438181', '1418615222');

-- ----------------------------
-- Table structure for `tp_conclass`
-- ----------------------------
DROP TABLE IF EXISTS `tp_conclass`;
CREATE TABLE `tp_conclass` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `pid` int(4) DEFAULT NULL,
  `conclassname` varchar(50) DEFAULT NULL,
  `path` varchar(100) DEFAULT NULL,
  `conclasscontent` text,
  `isphoto` tinyint(1) DEFAULT '0',
  `classphoto` varchar(30) DEFAULT NULL,
  `classthumb1` varchar(30) DEFAULT NULL,
  `classthumb2` varchar(30) DEFAULT NULL,
  `lang` tinyint(1) DEFAULT '0',
  `orderby` int(4) DEFAULT NULL,
  `addtime` varchar(30) DEFAULT NULL,
  `updatetime` varchar(30) DEFAULT NULL,
  `isshow` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_conclass
-- ----------------------------
INSERT INTO `tp_conclass` VALUES ('1', '0', '公司新闻', '0', '', '0', '', '', '', '1', '1', '1413426566', '1418818424', '1');
INSERT INTO `tp_conclass` VALUES ('2', '0', '行业资讯', '0', '', '0', null, null, null, '1', '2', '1418818436', null, '1');

-- ----------------------------
-- Table structure for `tp_config_info`
-- ----------------------------
DROP TABLE IF EXISTS `tp_config_info`;
CREATE TABLE `tp_config_info` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `is_watermark` tinyint(1) DEFAULT '0',
  `watertype` tinyint(1) DEFAULT '0',
  `waterpic` varchar(30) DEFAULT NULL,
  `waterword` varchar(30) DEFAULT NULL,
  `alpha` int(4) DEFAULT NULL,
  `maxheight` int(4) DEFAULT NULL,
  `maxwidth` int(4) DEFAULT NULL,
  `position` tinyint(1) DEFAULT '0',
  `isstatic` tinyint(1) DEFAULT '0',
  `static_connector` varchar(10) DEFAULT NULL,
  `downpass` varchar(100) DEFAULT NULL,
  `updatetime` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_config_info
-- ----------------------------
INSERT INTO `tp_config_info` VALUES ('1', '0', '0', '', '', '0', '120', '120', '1', '1', null, '12345612', '1413432398');

-- ----------------------------
-- Table structure for `tp_content`
-- ----------------------------
DROP TABLE IF EXISTS `tp_content`;
CREATE TABLE `tp_content` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `cid` int(4) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `contype` tinyint(1) DEFAULT '0',
  `title_href` varchar(100) DEFAULT NULL,
  `coninfo` text,
  `concon` text,
  `key_content` text,
  `author` varchar(30) DEFAULT NULL,
  `source` varchar(30) DEFAULT NULL,
  `keyword1` varchar(30) DEFAULT NULL,
  `isphoto` tinyint(1) DEFAULT '0',
  `conphoto` varchar(50) DEFAULT NULL,
  `conthumb1` varchar(50) DEFAULT NULL,
  `conthumb2` varchar(50) DEFAULT NULL,
  `showdate` varchar(30) DEFAULT NULL,
  `orderby` int(8) DEFAULT NULL,
  `isshow` tinyint(1) DEFAULT '0',
  `isrecom` tinyint(1) DEFAULT NULL,
  `lang` tinyint(1) DEFAULT '0',
  `issj` tinyint(1) DEFAULT '0',
  `sjisshow` tinyint(1) DEFAULT '1',
  `sjprocon` text,
  `opti` tinyint(1) DEFAULT NULL,
  `yetitle` varchar(50) DEFAULT NULL,
  `keywords` text,
  `descri` text,
  `hits` int(4) DEFAULT '0',
  `otherpro` varchar(100) DEFAULT NULL,
  `othernews` varchar(100) DEFAULT NULL,
  `otherdown` varchar(100) DEFAULT NULL,
  `tag_id` varchar(255) DEFAULT NULL,
  `addtime` varchar(30) DEFAULT NULL,
  `updatetime` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_content
-- ----------------------------
INSERT INTO `tp_content` VALUES ('1', '1', '这是新闻标题', '0', '', '这是新闻简介这是新闻简介这是新闻简介这是新闻简介这是新闻简介这是新闻简介这是新闻简介这是新闻简介这是新闻简介这是新闻简介这是新闻简介这是新闻简介这是新闻简介这是新闻简介这是新闻简介这是新闻简介这是新闻简介这是新闻简介这是新闻简介这是新闻简介这是新闻简介这是新闻简介', '<p>这是新闻简介这是新闻简介这是新闻简介这是新闻简介这是新闻简介这是新闻简介这是新闻简介这是新闻简介这是新闻简介这是新闻简介这是新闻简介这是新闻简介这是新闻简介这是新闻简介这是新闻简介这是新闻简介这是新闻简介这是新闻简介这是新闻简介这是新闻简介这是新闻简介这是新闻简介1111</p>', null, '', '', null, '0', '', '', '', '1418828815', '1', '1', '1', '1', '1', '1', null, '0', null, null, null, '68', '', '', '', null, '1413426582', '1418828819');
INSERT INTO `tp_content` VALUES ('2', '1', '新闻标题2', '0', '', '新闻标题2新闻标题2新闻标题2新闻标题2新闻标题2新闻标题2新闻标题2', '<p>新闻标题2新闻标题2新闻标题2新闻标题2新闻标题2新闻标题2新闻标题2</p>', null, '', '', null, '0', '', '', '', '1418828870', '2', '1', '0', '1', '1', '1', null, '0', null, null, null, '89', '', '', '', null, '1413426590', '1418828853');
INSERT INTO `tp_content` VALUES ('5', '1', 'News1', '0', '', '', '<p>123123</p>', null, '', '', null, '0', null, null, null, '', '3', '1', '0', '0', '1', '1', '', '0', null, null, null, '31', '', '', '', null, '1415537914', null);
INSERT INTO `tp_content` VALUES ('6', '1', 'News2', '0', '', '', '<p>123123</p>', null, '', '', null, '0', '', '', '', '', '4', '1', '0', '0', '1', '1', '', '0', null, null, null, '41', '', '', '', null, '1415537914', '1415539618');
INSERT INTO `tp_content` VALUES ('7', '2', '行业一', '0', '', '', '<p>行业一行业一行业一</p>', null, '', '', null, '0', null, null, null, '1418820448', '5', '1', '0', '1', '1', '1', null, '0', null, null, null, '1', '', '', '', null, '1418820471', null);
INSERT INTO `tp_content` VALUES ('8', '2', '行业二', '0', '', '', '<p>行业二行业二行业二行业二</p>', null, '', '', null, '0', null, null, null, '1418820475', '6', '1', '0', '1', '1', '1', null, '0', null, null, null, '1', '', '', '', null, '1418820481', null);
INSERT INTO `tp_content` VALUES ('9', '2', '行业三', '0', '', '', '<p>行业三行业三行业三</p>', null, '', '', null, '0', null, null, null, '1418820486', '7', '1', '0', '1', '1', '1', null, '0', null, null, null, '2', '', '', '', null, '1418820493', null);
INSERT INTO `tp_content` VALUES ('10', '2', '行业四', '0', '', '', '<p>行业四行业四行业四</p>', null, '', '', null, '0', null, null, null, '1418820497', '8', '1', '0', '1', '1', '1', null, '0', null, null, null, '1', '', '', '', null, '1418820505', null);
INSERT INTO `tp_content` VALUES ('11', '2', '行业五', '0', '', '', '<p>行业五行业五行业五</p>', null, '', '', null, '0', null, null, null, '1418820509', '9', '1', '0', '1', '1', '1', null, '0', null, null, null, '0', '', '', '', null, '1418820518', null);
INSERT INTO `tp_content` VALUES ('12', '2', '行业六', '0', '', '', '<p>行业六行业六</p>', null, '', '', null, '0', null, null, null, '1418820522', '10', '1', '0', '1', '1', '1', null, '0', null, null, null, '4', '', '', '', null, '1418820537', null);

-- ----------------------------
-- Table structure for `tp_down`
-- ----------------------------
DROP TABLE IF EXISTS `tp_down`;
CREATE TABLE `tp_down` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `cid` int(4) DEFAULT NULL,
  `lang` tinyint(1) DEFAULT NULL,
  `filename` varchar(100) DEFAULT NULL,
  `filecontent` varchar(100) DEFAULT NULL,
  `createtime` varchar(30) DEFAULT NULL,
  `filedescription` text,
  `keywords` text,
  `ispic` tinyint(1) DEFAULT '0',
  `pic` varchar(100) DEFAULT NULL,
  `picthumb` varchar(100) DEFAULT NULL,
  `isshow` tinyint(1) DEFAULT '0',
  `isrecom` tinyint(1) DEFAULT '0',
  `orderby` int(4) DEFAULT NULL,
  `addtime` varchar(30) DEFAULT NULL,
  `updatetime` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_down
-- ----------------------------
INSERT INTO `tp_down` VALUES ('60', '21', '0', 'flash图片', '5418eab1729fa.png', '1410919085', '123123', '', '0', '', '', '1', '0', '1', '1410919108', '1411020847');
INSERT INTO `tp_down` VALUES ('61', '21', '1', 'bg2', '5418f5882d4d4.png', '1410921854', '123', '', '0', '', '', '1', '0', '2', '1410921871', null);

-- ----------------------------
-- Table structure for `tp_downclass`
-- ----------------------------
DROP TABLE IF EXISTS `tp_downclass`;
CREATE TABLE `tp_downclass` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `pid` int(4) DEFAULT NULL,
  `downclassname` varchar(50) DEFAULT NULL,
  `path` varchar(100) DEFAULT NULL,
  `downclasscontent` text,
  `isshow` tinyint(1) DEFAULT '0',
  `lang` tinyint(1) DEFAULT '0',
  `addtime` varchar(30) DEFAULT NULL,
  `updatetime` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_downclass
-- ----------------------------
INSERT INTO `tp_downclass` VALUES ('20', '0', '下载文件', '0', '', '1', '1', '1401844163', '');
INSERT INTO `tp_downclass` VALUES ('21', '20', '下载文件_1', '0-20', '', '1', '1', '1401844173', '');
INSERT INTO `tp_downclass` VALUES ('22', '20', '下载文件_2', '0-20', '', '1', '1', '1401844184', '');

-- ----------------------------
-- Table structure for `tp_guest`
-- ----------------------------
DROP TABLE IF EXISTS `tp_guest`;
CREATE TABLE `tp_guest` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `sex` tinyint(2) DEFAULT '0',
  `qq` varchar(15) DEFAULT NULL,
  `telphone` varchar(15) DEFAULT NULL,
  `eurl` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `content` text,
  `reply` text,
  `audit` tinyint(2) DEFAULT '0',
  `addtime` varchar(30) DEFAULT NULL,
  `replytime` varchar(30) DEFAULT NULL,
  `addip` varchar(30) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_guest
-- ----------------------------
INSERT INTO `tp_guest` VALUES ('17', 'xuxuxu', '1', '4345@qq.com', '12345323409', null, '3434@qq.com', 'this is memo', null, '0', '1417141213', null, '127.0.0.1', null);
INSERT INTO `tp_guest` VALUES ('18', '王卯卯', '1', '12356', null, null, 'abc@qq.com', '这是备注', null, '0', '1417147483', null, '127.0.0.1', null);

-- ----------------------------
-- Table structure for `tp_img`
-- ----------------------------
DROP TABLE IF EXISTS `tp_img`;
CREATE TABLE `tp_img` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `proid` int(4) DEFAULT NULL,
  `thumb_img1` varchar(30) DEFAULT NULL,
  `thumb_img2` varchar(30) DEFAULT NULL,
  `img` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=263 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_img
-- ----------------------------
INSERT INTO `tp_img` VALUES ('209', '146', 'm_53841e5fc37e0.gif', 's_53841e5fc37e0.gif', '53841e5fc37e0.gif');
INSERT INTO `tp_img` VALUES ('210', '146', 'm_53841e61a7729.jpg', 's_53841e61a7729.jpg', '53841e61a7729.jpg');
INSERT INTO `tp_img` VALUES ('217', '153', 'm_538420cfe088f.jpg', 's_538420cfe088f.jpg', '538420cfe088f.jpg');
INSERT INTO `tp_img` VALUES ('218', '153', 'm_538420d02f1b6.jpg', 's_538420d02f1b6.jpg', '538420d02f1b6.jpg');
INSERT INTO `tp_img` VALUES ('219', '153', 'm_538420d05a2f6.gif', 's_538420d05a2f6.gif', '538420d05a2f6.gif');
INSERT INTO `tp_img` VALUES ('220', '121', 'm_538420e633fa6.jpg', 's_538420e633fa6.jpg', '538420e633fa6.jpg');
INSERT INTO `tp_img` VALUES ('221', '121', 'm_538420e670598.jpg', 's_538420e670598.jpg', '538420e670598.jpg');
INSERT INTO `tp_img` VALUES ('237', '115', 'm_5388586bade1e.jpg', 's_5388586bade1e.jpg', '5388586bade1e.jpg');
INSERT INTO `tp_img` VALUES ('238', '115', 'm_538d1fb7727cd.jpg', 's_538d1fb7727cd.jpg', '538d1fb7727cd.jpg');
INSERT INTO `tp_img` VALUES ('240', '115', 'm_538edb1d7415a.jpg', 's_538edb1d7415a.jpg', '538edb1d7415a.jpg');
INSERT INTO `tp_img` VALUES ('241', '115', 'm_538edb1dd08f9.jpg', 's_538edb1dd08f9.jpg', '538edb1dd08f9.jpg');
INSERT INTO `tp_img` VALUES ('242', '115', 'm_538edb1e04106.jpg', 's_538edb1e04106.jpg', '538edb1e04106.jpg');
INSERT INTO `tp_img` VALUES ('245', '104', 'm_538ee59432864.jpg', 's_538ee59432864.jpg', '538ee59432864.jpg');
INSERT INTO `tp_img` VALUES ('246', '104', 'm_538ee5946751f.jpg', 's_538ee5946751f.jpg', '538ee5946751f.jpg');
INSERT INTO `tp_img` VALUES ('247', '104', 'm_538ee5949ae80.jpg', 's_538ee5949ae80.jpg', '538ee5949ae80.jpg');
INSERT INTO `tp_img` VALUES ('248', '11', 'm_53c72a299dc31.png', 's_53c72a299dc31.png', '53c72a299dc31.png');
INSERT INTO `tp_img` VALUES ('249', '26', 'm_545e258a90b8b.jpg', 's_545e258a90b8b.jpg', '545e258a90b8b.jpg');
INSERT INTO `tp_img` VALUES ('250', '26', 'm_545e258c0801b.jpg', 's_545e258c0801b.jpg', '545e258c0801b.jpg');
INSERT INTO `tp_img` VALUES ('251', '26', 'm_545e258d75ac3.jpg', 's_545e258d75ac3.jpg', '545e258d75ac3.jpg');
INSERT INTO `tp_img` VALUES ('252', '26', 'm_545e258ee6a5e.jpg', 's_545e258ee6a5e.jpg', '545e258ee6a5e.jpg');
INSERT INTO `tp_img` VALUES ('253', '27', 'm_545e322834622.jpg', 's_545e322834622.jpg', '545e322834622.jpg');
INSERT INTO `tp_img` VALUES ('254', '70', 'm_548e9f1d253c3.png', 's_548e9f1d253c3.png', '548e9f1d253c3.png');
INSERT INTO `tp_img` VALUES ('255', '70', 'm_548e9f2520450.png', 's_548e9f2520450.png', '548e9f2520450.png');
INSERT INTO `tp_img` VALUES ('256', '70', 'm_548e9f2a99fb7.png', 's_548e9f2a99fb7.png', '548e9f2a99fb7.png');
INSERT INTO `tp_img` VALUES ('257', '70', 'm_548e9f322ef33.png', 's_548e9f322ef33.png', '548e9f322ef33.png');
INSERT INTO `tp_img` VALUES ('258', '71', 'm_548ea09320ed8.png', 's_548ea09320ed8.png', '548ea09320ed8.png');
INSERT INTO `tp_img` VALUES ('259', '71', 'm_548ea09b06847.png', 's_548ea09b06847.png', '548ea09b06847.png');
INSERT INTO `tp_img` VALUES ('260', '78', 'm_548eabbf75963.png', 's_548eabbf75963.png', '548eabbf75963.png');
INSERT INTO `tp_img` VALUES ('261', '78', 'm_548eabc5e9b8a.png', 's_548eabc5e9b8a.png', '548eabc5e9b8a.png');
INSERT INTO `tp_img` VALUES ('262', '71', 'm_549192ca28b9f.jpg', 's_549192ca28b9f.jpg', '549192ca28b9f.jpg');

-- ----------------------------
-- Table structure for `tp_job`
-- ----------------------------
DROP TABLE IF EXISTS `tp_job`;
CREATE TABLE `tp_job` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `jobname` varchar(50) DEFAULT NULL,
  `jobspe` varchar(50) DEFAULT NULL,
  `age` varchar(50) DEFAULT NULL,
  `sex` tinyint(1) DEFAULT NULL,
  `num` varchar(50) DEFAULT NULL,
  `jobeduc` varchar(50) DEFAULT NULL,
  `workhours` varchar(50) DEFAULT NULL,
  `salary` varchar(100) DEFAULT NULL,
  `endtime` varchar(50) DEFAULT NULL,
  `orderby` int(4) DEFAULT NULL,
  `lang` tinyint(1) DEFAULT NULL,
  `isshow` tinyint(1) DEFAULT NULL,
  `isrecom` tinyint(1) DEFAULT NULL,
  `other` text,
  `addtime` varchar(50) DEFAULT NULL,
  `updatetime` varchar(50) DEFAULT NULL,
  `job_miaoshu` text,
  `job_yaoqiu` text,
  `job_toudiyouxiang` varchar(255) DEFAULT '',
  `job_dianhuazixun` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_job
-- ----------------------------
INSERT INTO `tp_job` VALUES ('18', '高级工程师', '', '', '2', '3人', '', '', '', '1416475493', '1', '1', '1', '0', '<p>[性别要求] &nbsp; &nbsp; &nbsp; 女<br/>[工作地点] &nbsp; &nbsp; &nbsp;宁 波/ 宁 海<br/>[要求学历] &nbsp; &nbsp; &nbsp;中专以上<br/>[工资等遇] &nbsp; &nbsp; &nbsp;面 议<br/>岗位说明：<br/>&nbsp; &nbsp; &nbsp;年龄20-35岁，工作积极做事认真，责任心强，能吃苦耐劳，有较强的沟通能力,熟练Office办公软件。</p>', '1413437035', '1415529997', null, null, '', '');
INSERT INTO `tp_job` VALUES ('19', '初级工程师', '', '', '2', '5人', '', '', '', '1416389228', '2', '1', '1', '0', '<p>[性别要求] &nbsp; &nbsp; &nbsp; 男<br style=\"white-space: normal;\"/>[工作地点] &nbsp; &nbsp; &nbsp;宁 波/ 宁 海<br style=\"white-space: normal;\"/>[要求学历] &nbsp; &nbsp; &nbsp;中专以上<br style=\"white-space: normal;\"/>[工资等遇] &nbsp; &nbsp; &nbsp;面 议<br style=\"white-space: normal;\"/>岗位说明：<br style=\"white-space: normal;\"/>&nbsp; &nbsp; &nbsp;年龄20-35岁，工作积极做事认真，责任心强，能吃苦耐劳，有较强的沟通能力,熟练Office办公软件。</p>', '1415525247', '1418621595', '<p>这是职位描述这是职位描述这是职位描述这是职位描述</p>', '<p>这是要求aaa这是要求aaa这是要求aaa这是要求aaa这是要求aaa</p>', '123456@163.com ', '010-12345787');
INSERT INTO `tp_job` VALUES ('21', 'English job', '', '', '2', '', '', '', '', '', '3', '0', '1', '0', '', '1418635983', null, '<p>this is miaoshu</p>', '<p>this is yaoqiu</p>', 'abc@qq.com', '010-2824703');

-- ----------------------------
-- Table structure for `tp_keyword`
-- ----------------------------
DROP TABLE IF EXISTS `tp_keyword`;
CREATE TABLE `tp_keyword` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `key_name` varchar(255) DEFAULT NULL,
  `key_url` varchar(255) DEFAULT NULL,
  `key_style` text,
  `no_follow` tinyint(1) DEFAULT '0',
  `match_num` int(4) DEFAULT '3',
  `new_window` tinyint(1) DEFAULT '0',
  `orderby` int(4) DEFAULT NULL,
  `addtime` varchar(20) DEFAULT NULL,
  `updatetime` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_keyword
-- ----------------------------
INSERT INTO `tp_keyword` VALUES ('13', '徐宁', 'http://g.cn', '', '1', '2', '0', '3', '1409295920', '1409633776');
INSERT INTO `tp_keyword` VALUES ('14', '小毛', 'http://www.baidu.com', 'font-size:20px;', '1', '2', '1', '2', '1409301768', '1409642540');
INSERT INTO `tp_keyword` VALUES ('15', '小毛子', 'http://www.qq.com', '', '0', '1', '1', '1', '1409551853', '1409633980');
INSERT INTO `tp_keyword` VALUES ('16', '啊', 'www.lanlan.com', 'font-size:30px', '0', '0', '1', '4', '1409552951', '1409556773');
INSERT INTO `tp_keyword` VALUES ('17', '小毛子子', 'http://www.ba11idu.com', '', '0', '3', '1', null, '1409562424', '1409633790');
INSERT INTO `tp_keyword` VALUES ('18', '小', 'sdfsdfsdfsdf', '', '0', '1', '1', null, '1409562445', '1409633813');

-- ----------------------------
-- Table structure for `tp_mobileinfo`
-- ----------------------------
DROP TABLE IF EXISTS `tp_mobileinfo`;
CREATE TABLE `tp_mobileinfo` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `pic` varchar(50) DEFAULT NULL,
  `smallpic` varchar(50) DEFAULT NULL,
  `sitenums` int(4) DEFAULT NULL,
  `updatetime` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_mobileinfo
-- ----------------------------
INSERT INTO `tp_mobileinfo` VALUES ('1', '派桑网络公司1', '5333c5e0d4b5e.jpg', 's_5333c5e0d4b5e.jpg', '50', '1396241438');

-- ----------------------------
-- Table structure for `tp_mobile_bottom_nav_style_old`
-- ----------------------------
DROP TABLE IF EXISTS `tp_mobile_bottom_nav_style_old`;
CREATE TABLE `tp_mobile_bottom_nav_style_old` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `back_pic` varchar(20) DEFAULT NULL,
  `wordcolor` varchar(20) DEFAULT NULL,
  `updatetime` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_mobile_bottom_nav_style_old
-- ----------------------------
INSERT INTO `tp_mobile_bottom_nav_style_old` VALUES ('1', '53eb2efbe1f82.jpg', '#ffffff', '1407983112');

-- ----------------------------
-- Table structure for `tp_mobile_cate_old`
-- ----------------------------
DROP TABLE IF EXISTS `tp_mobile_cate_old`;
CREATE TABLE `tp_mobile_cate_old` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `catename` varchar(50) DEFAULT NULL,
  `cateinfo` text,
  `pid` int(4) DEFAULT '0',
  `path` varchar(255) DEFAULT NULL,
  `ischild` tinyint(1) DEFAULT '0',
  `pic` varchar(30) DEFAULT NULL,
  `icon` varchar(30) DEFAULT NULL,
  `isshow` tinyint(1) DEFAULT '1',
  `orderby` int(4) DEFAULT NULL,
  `catetype` tinyint(1) DEFAULT '0',
  `dataid` int(4) DEFAULT '0',
  `addtime` varchar(30) DEFAULT NULL,
  `updatetime` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_mobile_cate_old
-- ----------------------------
INSERT INTO `tp_mobile_cate_old` VALUES ('21', '加盟我们', '加盟我们', '0', '0', '0', '53d8530451830.png', '53d8532086fab.png', '1', '1', '3', null, '1404981532', '1410419513');
INSERT INTO `tp_mobile_cate_old` VALUES ('22', '加盟优势', '公司简介说明公司简介说明公司简介说明公司简介说明公司简介说明', '21', '0-21', '0', '53eda92b1e7c3.jpg', '53be52427945a.gif', '1', '2', '3', '151', '1404981839', '1410422170');
INSERT INTO `tp_mobile_cate_old` VALUES ('23', '加盟政策', '加盟政策加盟政策加盟政策加盟政策加盟政策', '21', '0-21', '1', '53eda934bc848.jpg', '53be528951261.gif', '1', '3', '3', '156', '1404981902', '1410419309');
INSERT INTO `tp_mobile_cate_old` VALUES ('24', '新闻中心', '新闻中心新闻中心新闻中心', '0', '0', '0', '53be52bc10a0e.gif', '53d8532e95b0c.png', '1', '6', '1', null, '1404981964', '1406686000');
INSERT INTO `tp_mobile_cate_old` VALUES ('25', '普通新闻', '普通新闻普通新闻普通新闻普通新闻', '24', '0-24', '1', '53e97758ef9a5.jpg', '', '1', '7', '1', '1', '1404981991', '1410420100');
INSERT INTO `tp_mobile_cate_old` VALUES ('26', '家装工程商', '家装工程商家装工程商', '24', '0-24', '1', '53e9778209381.jpg', '53be52fd8efe8.gif', '1', '8', '1', '9', '1404982020', '1410420109');
INSERT INTO `tp_mobile_cate_old` VALUES ('27', '产品展示', '产品展示产品展示产品展示产品展示', '0', '0', '0', '53be531923f7c.gif', '53d8533b14736.png', '1', '9', '2', null, '1404982049', '1406686012');
INSERT INTO `tp_mobile_cate_old` VALUES ('28', '产品一', '产品一产品一', '27', '0-27', '1', '53be53324bb3f.gif', '53be533556384.gif', '1', '10', '2', '4', '1404982075', '1410423270');
INSERT INTO `tp_mobile_cate_old` VALUES ('29', '产品二', '产品二产品二产品二产品二', '27', '0-27', '1', '53be534d35044.gif', '53be5350351d1.gif', '1', '11', '2', '5', '1404982103', '1410423280');
INSERT INTO `tp_mobile_cate_old` VALUES ('36', '加盟条件', '加盟条件加盟条件加盟条件加盟条件加盟条件', '21', '0-21', '1', '', '', '1', '4', '3', '157', '1410319225', '1410419317');
INSERT INTO `tp_mobile_cate_old` VALUES ('38', '常见问题', '常见问题常见问题常见问题常见问题', '21', '0-21', '1', '540fcdd20aaba.jpg', '540fcdd758866.jpg', '1', '5', '3', '158', '1410320516', '1410420464');
INSERT INTO `tp_mobile_cate_old` VALUES ('50', '加盟政策', '', '21', '0-21', '1', '', '', '1', '15', '3', '156', '1410420503', null);
INSERT INTO `tp_mobile_cate_old` VALUES ('51', '加盟优势一', '加盟优势一加盟优势一加盟优势一', '22', '0-21-22', '1', '541155ab3b3be.jpg', '541155ad2f222.jpg', '1', '16', '3', '151', '1410422200', '1410422217');
INSERT INTO `tp_mobile_cate_old` VALUES ('52', '加盟优势二', '', '22', '0-21-22', '0', '', '', '1', '17', '1', '0', '1410422252', null);
INSERT INTO `tp_mobile_cate_old` VALUES ('53', '加盟优势二_1', '', '52', '0-21-22-52', '1', '', '', '1', '18', '1', '1', '1410422304', '1410422347');
INSERT INTO `tp_mobile_cate_old` VALUES ('54', '产品', '产品产品产品', '27', '0-27', '1', '', '', '1', '19', '2', '4', '1410500274', null);
INSERT INTO `tp_mobile_cate_old` VALUES ('55', '产品三', '', '27', '0-27', '0', '5412a25485633.jpg', '', '1', '20', '1', '0', '1410500302', '1410507349');
INSERT INTO `tp_mobile_cate_old` VALUES ('56', '产品三_1', '', '55', '0-27-55', '1', '5412a27135b24.jpg', '', '1', '21', '2', '4', '1410500324', '1410507378');

-- ----------------------------
-- Table structure for `tp_mobile_feedback_old`
-- ----------------------------
DROP TABLE IF EXISTS `tp_mobile_feedback_old`;
CREATE TABLE `tp_mobile_feedback_old` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `article_type` tinyint(1) DEFAULT '0',
  `article_id` int(4) DEFAULT NULL,
  `article_title` varchar(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `contact` text,
  `content` text,
  `addtime` varchar(20) DEFAULT NULL,
  `addip` varchar(20) DEFAULT NULL,
  `replycontent` text,
  `replytime` varchar(20) DEFAULT NULL,
  `audit` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_mobile_feedback_old
-- ----------------------------
INSERT INTO `tp_mobile_feedback_old` VALUES ('1', '1', '38', '公司新闻U', '123', '122222', '123123123', '1406768182', '127.0.0.1', null, null, '1');
INSERT INTO `tp_mobile_feedback_old` VALUES ('2', '1', '24', '公司新闻G', '123', '123', '123', '1407202456', '127.0.0.1', null, null, '1');
INSERT INTO `tp_mobile_feedback_old` VALUES ('5', '0', '0', '网站留言', 'a', 'A', 'A', '1410339449', '127.0.0.1', null, null, '1');
INSERT INTO `tp_mobile_feedback_old` VALUES ('6', '0', '0', '网站留言', '1', '1', '1', '1410490920', '127.0.0.1', null, null, '1');

-- ----------------------------
-- Table structure for `tp_mobile_nav_old`
-- ----------------------------
DROP TABLE IF EXISTS `tp_mobile_nav_old`;
CREATE TABLE `tp_mobile_nav_old` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `pid` int(4) DEFAULT '0',
  `path` varchar(100) DEFAULT NULL,
  `nav_name` varchar(50) DEFAULT NULL,
  `icon` varchar(20) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `cid` int(4) DEFAULT NULL,
  `isshow` tinyint(1) DEFAULT '0',
  `nav_type` int(4) DEFAULT NULL,
  `orderby` int(4) DEFAULT NULL,
  `addtime` varchar(20) DEFAULT NULL,
  `updatetime` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_mobile_nav_old
-- ----------------------------
INSERT INTO `tp_mobile_nav_old` VALUES ('4', '0', '0', '首页', '53c49038b6a1b.jpg', null, '1', '1', '5', '1', '1405390906', '1410768752');
INSERT INTO `tp_mobile_nav_old` VALUES ('8', '0', '0', '分享', '53c4d6e62cf58.jpg', '13696555555', '26', '1', '3', '3', '1405406314', '1410768752');
INSERT INTO `tp_mobile_nav_old` VALUES ('9', '0', '0', '地图', '53c4cc8055a7e.jpg', null, '22', '1', '2', '9', '1405406340', '1410768752');
INSERT INTO `tp_mobile_nav_old` VALUES ('10', '0', '0', '留言', '53c4cc8da58da.jpg', null, '29', '1', '4', '0', '1405406354', '1410768752');
INSERT INTO `tp_mobile_nav_old` VALUES ('20', '0', '0', 'A', '', '', null, '1', '1', '10', '1410766298', '1410768752');
INSERT INTO `tp_mobile_nav_old` VALUES ('21', '0', '0', 'B', '', '', null, '1', '1', '11', '1410766308', '1410768752');
INSERT INTO `tp_mobile_nav_old` VALUES ('22', '0', '0', 'C', '', '', null, '1', '1', '12', '1410766315', '1410768752');
INSERT INTO `tp_mobile_nav_old` VALUES ('23', '20', '0-20', '地图', '541695fd803b5.jpg', '', null, '1', '2', '13', '1410766326', '1410773013');
INSERT INTO `tp_mobile_nav_old` VALUES ('24', '20', '0-20', '留言', '54169607be4ec.jpg', '', null, '1', '4', '14', '1410766345', '1410773025');

-- ----------------------------
-- Table structure for `tp_mobile_nav_top_old`
-- ----------------------------
DROP TABLE IF EXISTS `tp_mobile_nav_top_old`;
CREATE TABLE `tp_mobile_nav_top_old` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `left_pic` varchar(20) DEFAULT NULL,
  `right_pic` varchar(20) DEFAULT NULL,
  `back_pic` varchar(20) DEFAULT NULL,
  `wordcolor` varchar(20) DEFAULT NULL,
  `updatetime` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_mobile_nav_top_old
-- ----------------------------
INSERT INTO `tp_mobile_nav_top_old` VALUES ('1', '53eb2689c9a0c.png', '53eb268e23b67.png', '5412a0ddbe239.jpg', '#FFCCCC', '1410506974');

-- ----------------------------
-- Table structure for `tp_mobile_site_config_old`
-- ----------------------------
DROP TABLE IF EXISTS `tp_mobile_site_config_old`;
CREATE TABLE `tp_mobile_site_config_old` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `site_name` varchar(50) DEFAULT NULL,
  `site_phone` varchar(30) DEFAULT NULL,
  `site_logo` varchar(20) DEFAULT NULL,
  `site_music` varchar(20) DEFAULT NULL,
  `site_relmusic` varchar(20) DEFAULT NULL,
  `inner_backimg` varchar(20) DEFAULT NULL,
  `site_intro` text,
  `site_map_content` text,
  `site_map_logo` varchar(20) DEFAULT NULL,
  `site_map_lon` varchar(30) DEFAULT NULL,
  `site_map_lat` varchar(30) DEFAULT NULL,
  `site_copyright` text,
  `site_qr_logo` varchar(20) DEFAULT NULL,
  `site_test_url` varchar(256) DEFAULT NULL,
  `site_real_url` varchar(256) DEFAULT NULL,
  `updatetime` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_mobile_site_config_old
-- ----------------------------
INSERT INTO `tp_mobile_site_config_old` VALUES ('1', '派桑网络公司A', '0551-123456781', '53ed698cf265f.png', '53c8da9b97c01.mp3', '周杰伦 - 枫.mp3', '53c88fd153a8e.jpg', '这是公司简介啊啊啊啊啊啊啊啊啊啊11111111111111', '地图内容地图内容地图内容地图内容地图内容123123', '53ec582388c7e.jpg', '117.302053', '31.875609', '<p class=\"copyright uppercase center-text no-bottom\">Copyright 2014<br/> 版权所有：派桑网络1</p>', '53f1cbf9e555e.png', 'http://www.baidu.com', 'http://testweb11.iecworld.com/baocai/mobile/index.php?s=/Index/index.html', '1410831674');

-- ----------------------------
-- Table structure for `tp_mobile_site_index_info_old`
-- ----------------------------
DROP TABLE IF EXISTS `tp_mobile_site_index_info_old`;
CREATE TABLE `tp_mobile_site_index_info_old` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `pic_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_mobile_site_index_info_old
-- ----------------------------
INSERT INTO `tp_mobile_site_index_info_old` VALUES ('85', '541000430de91.png');
INSERT INTO `tp_mobile_site_index_info_old` VALUES ('86', '53edba36ebca9.jpg');
INSERT INTO `tp_mobile_site_index_info_old` VALUES ('87', '53edba36cc400.jpg');
INSERT INTO `tp_mobile_site_index_info_old` VALUES ('88', '53edba36a83a3.jpg');

-- ----------------------------
-- Table structure for `tp_mobile_site_index_old`
-- ----------------------------
DROP TABLE IF EXISTS `tp_mobile_site_index_old`;
CREATE TABLE `tp_mobile_site_index_old` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `backimg` varchar(20) DEFAULT NULL,
  `updatetime` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_mobile_site_index_old
-- ----------------------------
INSERT INTO `tp_mobile_site_index_old` VALUES ('1', '53bf7cd1aac7f.png', null);

-- ----------------------------
-- Table structure for `tp_mobile_theme_old`
-- ----------------------------
DROP TABLE IF EXISTS `tp_mobile_theme_old`;
CREATE TABLE `tp_mobile_theme_old` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `home_model` int(4) DEFAULT NULL,
  `channel_model` int(4) DEFAULT NULL,
  `newslist_model` int(4) DEFAULT NULL,
  `prolist_model` int(4) DEFAULT NULL,
  `new_article_model` int(4) DEFAULT NULL,
  `pro_article_model` int(4) DEFAULT NULL,
  `article_model` int(4) DEFAULT NULL,
  `home_nav` int(4) DEFAULT NULL,
  `inner_nav` int(4) DEFAULT NULL,
  `top_nav` int(4) DEFAULT NULL,
  `addtime` varchar(30) DEFAULT NULL,
  `updatetime` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_mobile_theme_old
-- ----------------------------
INSERT INTO `tp_mobile_theme_old` VALUES ('157', '1', '1', '1', '1', '1', '1', '1', '3', '3', '4', null, '1410845147');

-- ----------------------------
-- Table structure for `tp_order`
-- ----------------------------
DROP TABLE IF EXISTS `tp_order`;
CREATE TABLE `tp_order` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` text,
  `mobile` varchar(100) DEFAULT NULL,
  `remank` text,
  `lang` tinyint(1) DEFAULT '1',
  `addtime` varchar(30) DEFAULT NULL,
  `updatetime` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_order
-- ----------------------------
INSERT INTO `tp_order` VALUES ('17', '徐宁', 'test公司', '14696961234', 'aaa@qq.com', '合肥市', '1341111', '这是我的备注', '1', '1403234227', '');
INSERT INTO `tp_order` VALUES ('18', '123', '', '123', '', '', '123312123', '', '1', '1403235170', '');
INSERT INTO `tp_order` VALUES ('19', '123', '', '123', '', '', '', '', '1', '1403235270', '');
INSERT INTO `tp_order` VALUES ('20', '123', '', '123123', '', '', '', '', '1', '1403235287', '');

-- ----------------------------
-- Table structure for `tp_orderdetail`
-- ----------------------------
DROP TABLE IF EXISTS `tp_orderdetail`;
CREATE TABLE `tp_orderdetail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `OrderID` int(10) unsigned NOT NULL DEFAULT '0',
  `ProductID` int(10) unsigned NOT NULL DEFAULT '0',
  `ProductName` varchar(120) NOT NULL DEFAULT '',
  `Nums` int(11) NOT NULL DEFAULT '0',
  `Price` float NOT NULL DEFAULT '0',
  `Memo` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `OrderID` (`OrderID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_orderdetail
-- ----------------------------
INSERT INTO `tp_orderdetail` VALUES ('7', '17', '2', '这是产品2', '2', '0', '产品2的描述哈');
INSERT INTO `tp_orderdetail` VALUES ('8', '17', '1', '这是产品1', '2', '0', '产品1的描述哈');

-- ----------------------------
-- Table structure for `tp_pacontent`
-- ----------------------------
DROP TABLE IF EXISTS `tp_pacontent`;
CREATE TABLE `tp_pacontent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT '0',
  `paname` varchar(50) DEFAULT NULL,
  `lang` tinyint(1) DEFAULT '0',
  `pacon` text,
  `issj` tinyint(1) DEFAULT '0',
  `sjpacon` text,
  `opti` tinyint(1) DEFAULT '0',
  `yetitle` varchar(50) DEFAULT NULL,
  `keywords` text,
  `descri` text,
  `isshow` tinyint(1) DEFAULT NULL,
  `orderby` int(4) DEFAULT '0',
  `addtime` varchar(30) DEFAULT NULL,
  `updatetime` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=207 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_pacontent
-- ----------------------------
INSERT INTO `tp_pacontent` VALUES ('178', '53', '首页公司简介', '1', '<p>首页公司简介(中文)首首页公</p><p>司简介(中文)首首页</p><p>公司简介(中文)首首页公司</p><p>简介(中文)首首页公司简介(中文)</p><p><br/></p><p><br/></p>', '1', '', '0', null, null, null, '1', '1', '1413425315', '1418820239');
INSERT INTO `tp_pacontent` VALUES ('180', '49', '底部版权', '1', '<p style=\"text-align: center;\"><br/></p><p style=\"text-align: center;\">底部版权底部版权底部版权底部版权底部版权底部版权</p>', '1', '', '0', null, null, null, '1', '6', '1413426962', '1418819461');
INSERT INTO `tp_pacontent` VALUES ('181', '47', '关于我们', '1', '<p>关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们</p>', '1', '', '0', null, null, null, '1', '2', '1413427159', '1418822770');
INSERT INTO `tp_pacontent` VALUES ('185', '50', '联系我们', '1', '<p>联系我们(中文)联系我们(中文)联系我们(中文)联系我们(中文)联系我们(中文)联系我们(中文)联系我们(中文)</p><p><br/></p>', '1', '', '0', null, null, null, '1', '7', '1413435720', '1418822210');
INSERT INTO `tp_pacontent` VALUES ('196', '47', '经验理念', '1', '<p>经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念经验理念</p>', '1', '', '0', null, null, null, '1', '3', '1417084230', '1418822791');
INSERT INTO `tp_pacontent` VALUES ('204', '50', '左侧联系我们', '1', '<p>地址：英协广场1号楼25C</p><p>电话：0731-3338888</p><p>联系人：冯先生 18733338888</p><p>邮箱：service369@aliyun.com1</p>', '1', '', '0', null, null, null, '1', '8', '1418822254', null);
INSERT INTO `tp_pacontent` VALUES ('205', '47', '企业锋芒', '1', '<p>企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒企业锋芒</p>', '1', '', '0', null, null, null, '1', '4', '1418822811', null);
INSERT INTO `tp_pacontent` VALUES ('206', '47', '企业文化', '1', '<p>企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化</p>', '1', '', '0', null, null, null, '1', '5', '1418822839', null);

-- ----------------------------
-- Table structure for `tp_proclass`
-- ----------------------------
DROP TABLE IF EXISTS `tp_proclass`;
CREATE TABLE `tp_proclass` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `pid` int(4) DEFAULT '0',
  `proclassname` varchar(255) DEFAULT NULL,
  `path` varchar(100) DEFAULT NULL,
  `proclasscontent` text,
  `isphoto` tinyint(1) DEFAULT '0',
  `classphoto` varchar(30) DEFAULT NULL,
  `classthumb1` varchar(30) DEFAULT NULL,
  `classthumb2` varchar(30) DEFAULT NULL,
  `lang` tinyint(1) DEFAULT '0',
  `orderby` int(4) DEFAULT NULL,
  `addtime` varchar(30) DEFAULT NULL,
  `updatetime` varchar(30) DEFAULT NULL,
  `audit` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_proclass
-- ----------------------------
INSERT INTO `tp_proclass` VALUES ('44', '0', '产品中心', '0', '产品中心', '0', '', '', '', '1', '1', '1418622528', '1418823760', '1');
INSERT INTO `tp_proclass` VALUES ('47', '44', '分类一', '0-44', '分类一', '0', '', '', '', '1', '2', '1418622584', '1418823788', '1');
INSERT INTO `tp_proclass` VALUES ('48', '44', '分类二', '0-44', '分类二', '0', '', '', '', '1', '3', '1418622595', '1418823800', '1');
INSERT INTO `tp_proclass` VALUES ('49', '44', '分类三', '0-44', '分类三分类三', '0', '', '', '', '1', '4', '1418622612', '1418823813', '1');
INSERT INTO `tp_proclass` VALUES ('50', '44', 'case1', '0-44', 'case1', '0', '', '', '', '0', '5', '1418622622', null, '1');
INSERT INTO `tp_proclass` VALUES ('51', '44', 'case2', '0-44', 'case2', '0', '', '', '', '0', '6', '1418622629', '1418622660', '1');
INSERT INTO `tp_proclass` VALUES ('52', '44', 'case3', '0-44', 'case3', '0', '', '', '', '0', '7', '1418622640', null, '1');
INSERT INTO `tp_proclass` VALUES ('53', '44', 'case4', '0-44', 'case4', '0', '', '', '', '0', '8', '1418622650', null, '1');

-- ----------------------------
-- Table structure for `tp_product`
-- ----------------------------
DROP TABLE IF EXISTS `tp_product`;
CREATE TABLE `tp_product` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `cid` int(4) DEFAULT NULL,
  `pcid` int(11) DEFAULT '0',
  `lang` tinyint(1) DEFAULT '0',
  `proname` varchar(255) NOT NULL,
  `isphoto` tinyint(1) DEFAULT '0',
  `prophoto` varchar(30) DEFAULT NULL,
  `prothumb1` varchar(30) DEFAULT NULL,
  `prothumb2` varchar(30) DEFAULT NULL,
  `prointo` text,
  `procontent` text,
  `isshow` tinyint(2) DEFAULT NULL,
  `isrecom` tinyint(2) DEFAULT NULL,
  `orderby` int(11) DEFAULT NULL,
  `issj` tinyint(1) DEFAULT '0',
  `sjisshow` tinyint(1) DEFAULT '1',
  `sjprocon` text,
  `opti` tinyint(1) DEFAULT '0',
  `yetitle` varchar(50) DEFAULT NULL,
  `keywords` text,
  `descri` text,
  `hits` int(4) DEFAULT '0',
  `otherpro` varchar(100) DEFAULT NULL,
  `othernews` varchar(100) DEFAULT NULL,
  `otherdown` varchar(100) DEFAULT NULL,
  `is_other_img` tinyint(1) DEFAULT '0',
  `price` varchar(30) DEFAULT NULL,
  `tag_id` varchar(255) DEFAULT NULL,
  `addtime` varchar(30) DEFAULT NULL,
  `updatetime` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_product
-- ----------------------------
INSERT INTO `tp_product` VALUES ('70', '47', '0', '1', '案例一', '1', '548e76f82c25a.png', 's_548e76f82c25a.png', 'm_548e76f82c25a.png', '案例一_1', '<p>这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍这是详细介绍1</p>', '1', '0', '1', '1', '1', null, '0', null, null, null, '26', '71,0', '', '', '1', null, null, '1418622712', '1418633167');
INSERT INTO `tp_product` VALUES ('71', '48', '0', '1', '案例二', '1', '548e76f82c25a.png', 's_548e76f82c25a.png', 'm_548e76f82c25a.png', '案例二_1案例二_1', '<p>案例二_1案例二_1</p>', '1', '1', '2', '1', '1', null, '0', null, null, null, '46', '70,72,0', '', '', '1', null, null, '1418622712', '1418633354');
INSERT INTO `tp_product` VALUES ('72', '49', '0', '1', '案例三', '1', '548e76f82c25a.png', 's_548e76f82c25a.png', 'm_548e76f82c25a.png', '案例三_1', '<p>案例三_1案例三_1</p>', '1', '1', '3', '1', '1', null, '0', null, null, null, '5', '', '', '', '0', null, null, '1418622712', '1418622759');
INSERT INTO `tp_product` VALUES ('73', '48', '0', '1', '案例四', '1', '548e76f82c25a.png', 's_548e76f82c25a.png', 'm_548e76f82c25a.png', '案例二_2案例二_2', '<p>案例二_2案例二_2</p>', '1', '1', '4', '1', '1', null, '0', null, null, null, '12', '', '', '', '0', null, null, '1418622712', '1418622782');
INSERT INTO `tp_product` VALUES ('74', '48', '0', '1', '案例五', '1', '548e76f82c25a.png', 's_548e76f82c25a.png', 'm_548e76f82c25a.png', '案例二_3案例二_3案例二_3', '<p>案例二_3案例二_3</p>', '1', '1', '5', '1', '1', null, '0', null, null, null, '0', '', '', '', '0', null, null, '1418622712', '1418622792');
INSERT INTO `tp_product` VALUES ('75', '48', '0', '1', '案例六', '1', '548e76f82c25a.png', 's_548e76f82c25a.png', 'm_548e76f82c25a.png', '案例二_4', '<p>案例二_4案例二_4</p>', '1', '1', '6', '1', '1', null, '0', null, null, null, '1', '', '', '', '0', null, null, '1418622712', '1418622804');
INSERT INTO `tp_product` VALUES ('76', '49', '0', '1', '案例七', '1', '548e76f82c25a.png', 's_548e76f82c25a.png', 'm_548e76f82c25a.png', '案例三_2', '<p>案例三_2案例三_2案例三_2</p>', '1', '1', '7', '1', '1', null, '0', null, null, null, '0', '', '', '', '0', null, null, '1418622712', '1418622848');
INSERT INTO `tp_product` VALUES ('77', '49', '0', '1', '案例八', '1', '548e76f82c25a.png', 's_548e76f82c25a.png', 'm_548e76f82c25a.png', '案例三_3', '<p>案例三_3案例三_3案例三_3</p>', '1', '1', '8', '1', '1', null, '0', null, null, null, '0', '', '', '', '0', null, null, '1418622712', '1418622859');
INSERT INTO `tp_product` VALUES ('78', '50', '0', '0', 'case1', '1', '548e76f82c25a.png', 's_548e76f82c25a.png', 'm_548e76f82c25a.png', 'case1_1case1_1', '<p>case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1case1_1</p>', '1', '1', '9', '1', '1', null, '0', null, null, null, '7', '79,80,0', '', '', '1', null, null, '1418622712', '1418636215');
INSERT INTO `tp_product` VALUES ('79', '51', '0', '0', 'case2', '1', '548e76f82c25a.png', 's_548e76f82c25a.png', 'm_548e76f82c25a.png', 'case2_1case2_1', '<p>case2_1case2_1</p>', '1', '1', '10', '1', '1', null, '0', null, null, null, '6', '', '', '', '0', null, null, '1418622712', '1418622986');
INSERT INTO `tp_product` VALUES ('80', '51', '0', '0', 'case3', '1', '548e76f82c25a.png', 's_548e76f82c25a.png', 'm_548e76f82c25a.png', 'case2_2case2_2', '<p>case2_2case2_2</p>', '1', '1', '11', '1', '1', null, '0', null, null, null, '1', '', '', '', '0', null, null, '1418622712', '1418623001');
INSERT INTO `tp_product` VALUES ('81', '51', '0', '0', 'case4', '1', '548e76f82c25a.png', 's_548e76f82c25a.png', 'm_548e76f82c25a.png', 'case2_3case2_3', '<p>case2_3case2_3</p>', '1', '1', '12', '1', '1', null, '0', null, null, null, '0', '', '', '', '0', null, null, '1418622712', '1418623014');
INSERT INTO `tp_product` VALUES ('82', '51', '0', '0', 'case5', '1', '548e76f82c25a.png', 's_548e76f82c25a.png', 'm_548e76f82c25a.png', 'case2_4case2_4', '<p>case2_4case2_4</p>', '1', '1', '13', '1', '1', null, '0', null, null, null, '2', '', '', '', '0', null, null, '1418622712', '1418623023');

-- ----------------------------
-- Table structure for `tp_resume`
-- ----------------------------
DROP TABLE IF EXISTS `tp_resume`;
CREATE TABLE `tp_resume` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `jid` int(4) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `sex` tinyint(1) DEFAULT '0',
  `birthdate` varchar(30) DEFAULT NULL,
  `idcard` varchar(30) DEFAULT NULL,
  `nation` varchar(30) DEFAULT NULL,
  `polface` varchar(50) DEFAULT NULL,
  `healthy` varchar(50) DEFAULT NULL,
  `hometown` varchar(255) DEFAULT NULL,
  `address` text,
  `educa` varchar(50) DEFAULT NULL,
  `school` varchar(255) DEFAULT NULL,
  `discipline` varchar(255) DEFAULT NULL,
  `gradtime` varchar(100) DEFAULT NULL,
  `englishlevel` varchar(100) DEFAULT NULL,
  `certification` varchar(100) DEFAULT NULL,
  `pclevel` varchar(100) DEFAULT NULL,
  `hopesalary` varchar(50) DEFAULT NULL,
  `contractexp` varchar(50) DEFAULT NULL,
  `jobtarget` text,
  `perstrengths` text,
  `phone` varchar(30) DEFAULT NULL,
  `mobilephone` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `mailaddress` varchar(255) DEFAULT NULL,
  `zipcode` varchar(30) DEFAULT NULL,
  `addtime` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_resume
-- ----------------------------

-- ----------------------------
-- Table structure for `tp_role`
-- ----------------------------
DROP TABLE IF EXISTS `tp_role`;
CREATE TABLE `tp_role` (
  `rid` int(4) NOT NULL AUTO_INCREMENT,
  `rname` varchar(30) DEFAULT NULL,
  `rshell` int(4) DEFAULT NULL,
  `rcontent` text,
  `isabled` tinyint(4) DEFAULT '0',
  `addtime` varchar(30) DEFAULT NULL,
  `updatetime` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_role
-- ----------------------------
INSERT INTO `tp_role` VALUES ('5', '一级会员', '1', '', '1', '1393377000', '1396322145');
INSERT INTO `tp_role` VALUES ('7', '超级管理员', '4095', '12', '1', '1393377336', '1411874241');
INSERT INTO `tp_role` VALUES ('8', '二级会员', '15', '这是我的备注', '1', '1393389388', '1398302190');
INSERT INTO `tp_role` VALUES ('9', 'sda', '63', 'sadfsdaf', '1', '1393914982', '1398302198');
INSERT INTO `tp_role` VALUES ('10', '角色1', '63', '', '1', '1395796372', '1395796591');
INSERT INTO `tp_role` VALUES ('11', '123123', '263', '123123123', '1', '1398243276', '1398244092');
INSERT INTO `tp_role` VALUES ('12', '啊', '512', '啊', '1', '1398309896', '1398314264');

-- ----------------------------
-- Table structure for `tp_seo_cate`
-- ----------------------------
DROP TABLE IF EXISTS `tp_seo_cate`;
CREATE TABLE `tp_seo_cate` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `pid` int(4) DEFAULT NULL,
  `catename` varchar(50) DEFAULT NULL,
  `path` varchar(100) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `module_name` varchar(50) DEFAULT NULL,
  `rules` varchar(255) DEFAULT NULL,
  `isshow` tinyint(1) DEFAULT '0',
  `addtime` varchar(20) DEFAULT NULL,
  `updatetime` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_seo_cate
-- ----------------------------
INSERT INTO `tp_seo_cate` VALUES ('1', '0', '主页', '0', 'http://www.baidu.com', 'Index', '{:module}_{:action}_{id}', '1', '1409816483', '1409820234');
INSERT INTO `tp_seo_cate` VALUES ('2', '0', '新闻中心', '0', 'http://www.baidu.com', 'News', '{:module}_{:action}_{id}_{p}', '1', '1409816684', '1410224738');
INSERT INTO `tp_seo_cate` VALUES ('7', '0', '加入我们', '0', 'http://www.baidu.com', 'Contact', '{:module}_{:action}', '0', '1409819305', '1409821417');
INSERT INTO `tp_seo_cate` VALUES ('8', '0', '产品中心', '0', 'http://www.baidu.com', 'Product', '{:module}_{:action}', '0', '1409821139', '1409821412');
INSERT INTO `tp_seo_cate` VALUES ('9', '2', '新闻中心二', '0-2', 'http://www.baidu.com', 'News', '{:module}_{:action}', '1', '1410227099', '1410241495');

-- ----------------------------
-- Table structure for `tp_siteinfo`
-- ----------------------------
DROP TABLE IF EXISTS `tp_siteinfo`;
CREATE TABLE `tp_siteinfo` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `sname` varchar(50) DEFAULT NULL,
  `stitle` varchar(50) DEFAULT NULL,
  `slogo` varchar(255) DEFAULT NULL,
  `slothumb1` varchar(255) DEFAULT NULL,
  `slothumb2` varchar(255) DEFAULT NULL,
  `skeyword` text,
  `sjianjie` text,
  `sjianjieimg` varchar(30) DEFAULT NULL,
  `sjianjieimg1` varchar(30) DEFAULT NULL,
  `sjianjieimg2` varchar(30) DEFAULT NULL,
  `sdescription` text,
  `updatetime` varchar(30) DEFAULT NULL,
  `xn` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_siteinfo
-- ----------------------------
INSERT INTO `tp_siteinfo` VALUES ('1', '敏悦照明', '敏悦照明', '535f436d39edc.gif', 's_535f436d39edc.gif', 'm_535f436d39edc.gif', '敏悦照明', '敏悦照明', '535f4f08b91c8.jpg', 's_535f4f08b91c8.jpg', 'm_535f4f08b91c8.jpg', '', '1418817155', '0');

-- ----------------------------
-- Table structure for `tp_tag`
-- ----------------------------
DROP TABLE IF EXISTS `tp_tag`;
CREATE TABLE `tp_tag` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) NOT NULL,
  `tag_name` varchar(255) DEFAULT NULL,
  `click` int(4) DEFAULT '0',
  `addtime` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_tag
-- ----------------------------
INSERT INTO `tp_tag` VALUES ('1', '1', '新闻标签一', '3', '1409030892');
INSERT INTO `tp_tag` VALUES ('2', '1', '新闻标签二', '3', '1409030898');
INSERT INTO `tp_tag` VALUES ('3', '1', '新闻标签三', '3', '1409030903');
INSERT INTO `tp_tag` VALUES ('4', '1', '新闻标签四', '5', '1409030991');
INSERT INTO `tp_tag` VALUES ('5', '1', '新闻标签五', '4', '1409031343');
INSERT INTO `tp_tag` VALUES ('6', '2', '产品标签一', '2', '1409031396');
INSERT INTO `tp_tag` VALUES ('7', '2', '产品标签二', '2', '1409031403');
INSERT INTO `tp_tag` VALUES ('8', '2', '产品标签三', '1', '1409031437');
INSERT INTO `tp_tag` VALUES ('9', '2', '产品标签四', '1', '1409031458');
INSERT INTO `tp_tag` VALUES ('10', '2', '产品标签五', '1', '1409032244');
INSERT INTO `tp_tag` VALUES ('11', '1', '213', '2', '1409034970');
INSERT INTO `tp_tag` VALUES ('12', '1', '新闻,产品', '2', '1409035069');
INSERT INTO `tp_tag` VALUES ('13', '1', '啊啊啊', '1', '1409035338');

-- ----------------------------
-- Table structure for `tp_user`
-- ----------------------------
DROP TABLE IF EXISTS `tp_user`;
CREATE TABLE `tp_user` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `roleid` int(4) DEFAULT '0',
  `username` varchar(30) NOT NULL,
  `password` char(32) NOT NULL,
  `nicname` varchar(30) DEFAULT NULL,
  `content` text,
  `disable` tinyint(2) unsigned zerofill DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  `updatetime` int(11) DEFAULT NULL,
  `loginnum` int(11) DEFAULT '0',
  `lastlogip` varchar(20) DEFAULT NULL,
  `lastlogtime` varchar(30) DEFAULT NULL,
  `nowlogip` varchar(20) DEFAULT NULL,
  `nowlogtime` varchar(30) DEFAULT NULL,
  `gh_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_user
-- ----------------------------
INSERT INTO `tp_user` VALUES ('16', '7', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin', '', '01', '1392620273', '0', '655', '127.0.0.1', '1418614969', '127.0.0.1', '1418817090', null);

-- ----------------------------
-- Table structure for `tp_ziding`
-- ----------------------------
DROP TABLE IF EXISTS `tp_ziding`;
CREATE TABLE `tp_ziding` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `relname` varchar(30) DEFAULT NULL,
  `type` tinyint(1) DEFAULT '0',
  `values` text,
  `orderby` int(4) DEFAULT NULL,
  `modules` int(4) DEFAULT NULL,
  `isshow` tinyint(1) DEFAULT '1',
  `zheight` varchar(30) DEFAULT NULL,
  `zwidth` varchar(30) DEFAULT NULL,
  `cid` int(4) DEFAULT NULL,
  `addtime` varchar(30) DEFAULT NULL,
  `updatetime` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=154 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_ziding
-- ----------------------------
INSERT INTO `tp_ziding` VALUES ('150', 'job_miaoshu', '职位描述', '6', '', '3', '4', '1', '0', '0', null, '1418621375', null);
INSERT INTO `tp_ziding` VALUES ('151', 'job_yaoqiu', '职位要求', '6', '', '4', '4', '1', '0', '0', null, '1418621388', null);
INSERT INTO `tp_ziding` VALUES ('152', 'job_toudiyouxiang', '简历投递邮箱', '0', '', '1', '4', '1', '0', '0', null, '1418621496', null);
INSERT INTO `tp_ziding` VALUES ('153', 'job_dianhuazixun', '电话咨询', '0', '', '2', '4', '1', '0', '0', null, '1418621515', null);
