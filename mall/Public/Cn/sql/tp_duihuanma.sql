/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : iectest

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-12-19 11:24:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tp_duihuanma
-- ----------------------------
DROP TABLE IF EXISTS `tp_duihuanma`;
CREATE TABLE `tp_duihuanma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productid` int(11) DEFAULT NULL COMMENT '商品号',
  `duihuanma` varchar(255) DEFAULT NULL COMMENT '兑换码',
  `status` smallint(6) DEFAULT '0' COMMENT '兑换状态；0：未兑换；1：已兑换',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
