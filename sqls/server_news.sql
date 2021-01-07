/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : l2jdb

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-04-16 20:20:28
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `server_news`
-- ----------------------------
DROP TABLE IF EXISTS `server_news`;
CREATE TABLE `server_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titlenews` varchar(255) DEFAULT NULL,
  `textnews` text,
  `author` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of server_news
-- ----------------------------
INSERT INTO `server_news` VALUES ('1', 'teste', 'teste', 'Admin', '16/04/2015');
INSERT INTO `server_news` VALUES ('2', 'testando', 'testando', 'Admin', '16/04/2015');
