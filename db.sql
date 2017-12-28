/*
Navicat MariaDB Data Transfer

Source Server         : vps
Source Server Version : 100032
Source Host           : 
Source Database       : 

Target Server Type    : MariaDB
Target Server Version : 100032
File Encoding         : 65001

Date: 2017-12-29 01:21:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for link
-- ----------------------------
DROP TABLE IF EXISTS `link`;
CREATE TABLE `link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` text,
  `key` varchar(32) DEFAULT NULL,
  `by` varchar(48) DEFAULT NULL,
  `views` int(11) NOT NULL,
  `created` varchar(24) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8_general_ci;
SET FOREIGN_KEY_CHECKS=1;
