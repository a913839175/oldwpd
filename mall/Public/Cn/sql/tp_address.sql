/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : iectest

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-12-19 11:25:02
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tp_address
-- ----------------------------
DROP TABLE IF EXISTS `tp_address`;
CREATE TABLE `tp_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `consignee` varchar(100) DEFAULT NULL COMMENT '收货人',
  `address_code` varchar(50) DEFAULT NULL COMMENT '省市区',
  `detailed_address` varchar(255) DEFAULT NULL COMMENT '详细地址',
  `postal_code` int(11) DEFAULT NULL COMMENT '邮政编码',
  `con_phone` varchar(100) DEFAULT NULL COMMENT '收货人手机号码',
  `address_status` smallint(1) DEFAULT '1' COMMENT '是否废弃地址 1：未废弃；0：已废弃',
  `user_id` int(11) DEFAULT NULL COMMENT '关联用户user_id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
