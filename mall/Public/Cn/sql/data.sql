# 积分商城改版sql  2015-12-19
ALTER TABLE `hrcf_credit`
ADD COLUMN `sign_num` int(10) DEFAULT '0' COMMENT '连续签到次数' AFTER `user_id`;
ALTER TABLE `tp_address`
ADD COLUMN `sign_time` int(10) DEFAULT NULL COMMENT '上次签到时间'AFTER `user_id`;
ALTER TABLE `tp_address`
ADD COLUMN `sign_sum` int(10) DEFAULT '0' COMMENT '总签到次数'AFTER `user_id`;
ALTER TABLE `tp_address`
ADD COLUMN `sign_credit` int(10) DEFAULT '0' COMMENT '总签到所得积分'AFTER `user_id`;


ALTER TABLE `hrcf_users`
ADD COLUMN `touzi_status` smallint(1) DEFAULT '0' COMMENT '投资状态；0：没投资过；1：投资过'AFTER `logintimeerror`;
ALTER TABLE `hrcf_users`
ADD COLUMN `default_address` int(11) DEFAULT '0' COMMENT '默认地址'AFTER `logintimeerror`;


ALTER TABLE `tp_order`
ADD COLUMN `duihuanma` varchar(255) DEFAULT NULL COMMENT 'duihuanma'AFTER `pid`;
ALTER TABLE `tp_order`
ADD COLUMN `fahuo_status` smallint(1) DEFAULT '0' COMMENT '发货状态；0：未发货；1已发货'AFTER `pid`;
ALTER TABLE `tp_order`
ADD COLUMN `pro_type` varchar(255) DEFAULT NULL COMMENT '产品型号'AFTER `pid`;
ALTER TABLE `tp_order`
ADD COLUMN `consignee_msg` int(11) DEFAULT NULL COMMENT '收货人信息，即地址id'AFTER `pid`;


INSERT INTO `tp_ziding` VALUES ('5', 'pro_type', '规格类型', '0', null, '4', '2', '1', '0', '0', '0', null, null);
