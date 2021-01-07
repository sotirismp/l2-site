/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : l2jdb

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-04-16 20:20:22
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `fixes`
-- ----------------------------
DROP TABLE IF EXISTS `fixes`;
CREATE TABLE `fixes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `fix` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of fixes
-- ----------------------------
INSERT INTO `fixes` VALUES ('1', '[Update]', 'Farm Zones - Chaotic Zones', '16:04:2015');
INSERT INTO `fixes` VALUES ('2', '[Update]', 'Farm Zones - Chaotic Zones', '16/04/2015');
