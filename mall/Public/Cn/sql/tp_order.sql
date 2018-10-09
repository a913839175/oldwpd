/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : iectest

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-12-19 11:24:24
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tp_order
-- ----------------------------
DROP TABLE IF EXISTS `tp_order`;
CREATE TABLE `tp_order` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `niname` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` text,
  `mobile` varchar(100) DEFAULT NULL,
  `remank` text,
  `lang` tinyint(1) DEFAULT '1',
  `tradeid` varchar(20) DEFAULT NULL,
  `paystatus` tinyint(1) DEFAULT '0',
  `paytime` varchar(20) DEFAULT NULL,
  `addtime` varchar(20) DEFAULT NULL,
  `updatetime` varchar(20) DEFAULT NULL,
  `user_id` int(4) DEFAULT NULL,
  `pid` int(4) DEFAULT NULL,
  `duihuanma` varchar(255) DEFAULT NULL COMMENT 'duihuanma',
  `fahuo_status` smallint(1) DEFAULT '0' COMMENT '发货状态；0：未发货；1已发货',
  `pro_type` varchar(255) DEFAULT NULL COMMENT '产品型号',
  `consignee_msg` int(11) DEFAULT NULL COMMENT '收货人信息，即地址id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=113 DEFAULT CHARSET=utf8;
