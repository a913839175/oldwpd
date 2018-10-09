/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : test42

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-12-19 11:25:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for hrcf_credit
-- ----------------------------
DROP TABLE IF EXISTS `hrcf_credit`;
CREATE TABLE `hrcf_credit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '会员ID',
  `credit` int(11) DEFAULT NULL COMMENT '总积分',
  `credits` longtext NOT NULL COMMENT '总积分',
  `weibi` int(11) DEFAULT NULL COMMENT '微币',
  `sign_num` int(10) DEFAULT '0' COMMENT '连续签到次数',
  `sign_time` int(10) DEFAULT NULL COMMENT '上次签到时间',
  `sign_sum` int(10) DEFAULT '0' COMMENT '总签到次数',
  `sign_credit` int(10) DEFAULT '0' COMMENT '总签到所得积分',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2203 DEFAULT CHARSET=utf8;
