/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : test42

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-12-19 11:26:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for hrcf_users
-- ----------------------------
DROP TABLE IF EXISTS `hrcf_users`;
CREATE TABLE `hrcf_users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(15) NOT NULL COMMENT '用户名（手机号码）',
  `email` char(32) DEFAULT NULL COMMENT '邮箱',
  `password` char(32) NOT NULL COMMENT '密码',
  `paypassword` varchar(100) DEFAULT NULL COMMENT '支付密码',
  `question` varchar(100) DEFAULT NULL COMMENT '找回密码-问题',
  `answer` varchar(50) DEFAULT NULL COMMENT '找回密码-问题答案',
  `logintime` int(11) DEFAULT NULL COMMENT '登录次数',
  `reg_ip` char(15) NOT NULL COMMENT '注册ip',
  `reg_time` int(10) NOT NULL COMMENT '注册时间',
  `up_ip` char(15) DEFAULT NULL COMMENT '上一次登录ip',
  `up_time` int(10) DEFAULT NULL COMMENT '上一次登录时间',
  `last_ip` char(15) DEFAULT NULL COMMENT '最后登录ip',
  `last_time` int(10) DEFAULT NULL COMMENT '最后登录时间',
  `second_status` int(10) NOT NULL DEFAULT '0',
  `logintimeerror` int(11) unsigned DEFAULT '0',
  `touzi_status` smallint(1) DEFAULT '0' COMMENT '投资状态；0：没投资过；1：投资过',
  `default_address` int(11) DEFAULT '0' COMMENT '默认地址',
  PRIMARY KEY (`user_id`,`second_status`),
  KEY `id` (`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10010 DEFAULT CHARSET=utf8;
