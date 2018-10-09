/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : iectest

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-12-19 11:25:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tp_ziding
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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_ziding
-- ----------------------------
INSERT INTO `tp_ziding` VALUES ('1', 'pro_jifen', '积分', '0', '', '1', '2', '1', '0', '0', '0', '1439370499', null);
INSERT INTO `tp_ziding` VALUES ('2', 'pro_store', '库存', '0', '', '3', '2', '1', '0', '0', '0', '1439372762', null);
INSERT INTO `tp_ziding` VALUES ('3', 'pro_guige', '规格参数', '6', '', '5', '2', '1', '0', '0', '0', '1439372799', null);
INSERT INTO `tp_ziding` VALUES ('4', 'pro_weibi', '微币', '0', null, '2', '2', '1', '0', '0', '0', null, null);
INSERT INTO `tp_ziding` VALUES ('5', 'pro_type', '规格类型', '0', null, '4', '2', '1', '0', '0', '0', null, null);
