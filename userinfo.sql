/*
Navicat MySQL Data Transfer

Source Server         : 120.77.213.84_3306
Source Server Version : 50553
Source Host           : 120.77.213.84:3306
Source Database       : user

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-08-08 15:25:56
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `userinfo`
-- ----------------------------
DROP TABLE IF EXISTS `userinfo`;
CREATE TABLE `userinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productName` varchar(20) NOT NULL,
  `firstDate` date NOT NULL,
  `pattern` varchar(10) NOT NULL,
  `money` int(11) NOT NULL,
  `plan_periods` int(11) NOT NULL,
  `periods` int(11) NOT NULL,
  `accountvalue` bigint(20) NOT NULL,
  `areacode` varchar(10) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `captcha` varchar(10) NOT NULL,
  `recorddate` datetime NOT NULL,
  `openid` varchar(40) DEFAULT NULL,
  `flag` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
