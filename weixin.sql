/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50045
Source Host           : localhost:3306
Source Database       : weixin

Target Server Type    : MYSQL
Target Server Version : 50045
File Encoding         : 65001

Date: 2014-06-06 17:28:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `article`
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `cid` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `imgs` text NOT NULL,
  `created` bigint(11) NOT NULL,
  `wid` varchar(32) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article
-- ----------------------------

-- ----------------------------
-- Table structure for `cat`
-- ----------------------------
DROP TABLE IF EXISTS `cat`;
CREATE TABLE `cat` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `cat_name` varchar(50) NOT NULL,
  `create_time` varchar(11) NOT NULL,
  `wid` varchar(32) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cat
-- ----------------------------

-- ----------------------------
-- Table structure for `keyword`
-- ----------------------------
DROP TABLE IF EXISTS `keyword`;
CREATE TABLE `keyword` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `keyword` varchar(50) NOT NULL,
  `keylength` int(10) unsigned NOT NULL,
  `wid` varchar(32) NOT NULL,
  `reply_type` varchar(20) NOT NULL,
  `is_fuzzy` tinyint(1) unsigned NOT NULL,
  `reply_text` text NOT NULL,
  `flag` varchar(20) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keyword
-- ----------------------------
INSERT INTO `keyword` VALUES ('13', '123', '3', 'bd99ac4973ad2b5fe6565e0c9e7c3146', 'text', '0', '<Content><![CDATA[13]]></Content>', '', '1');
INSERT INTO `keyword` VALUES ('14', '123', '3', 'bd99ac4973ad2b5fe6565e0c9e7c3146', 'text', '1', '<Content><![CDATA[123]]></Content>', '', '1');

-- ----------------------------
-- Table structure for `menu`
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `wid` varchar(32) NOT NULL,
  `menu` varchar(50) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `type` varchar(10) NOT NULL,
  `key_id` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menu
-- ----------------------------

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `username` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `salt` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `email_valid` varchar(32) NOT NULL,
  `is_valid` tinyint(3) unsigned NOT NULL,
  `multi` tinyint(4) NOT NULL default '1',
  `type` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('10', '123', 'c566b90860359e75bdd20e9126e77477', 'CTPmpPevJhQ45r', '123@123.com', '3cab822b9eedb6b6063a030229d6ef50', '1', '1', '1');

-- ----------------------------
-- Table structure for `weixin_account`
-- ----------------------------
DROP TABLE IF EXISTS `weixin_account`;
CREATE TABLE `weixin_account` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `alias` varchar(50) NOT NULL,
  `weixin_name` varchar(100) NOT NULL,
  `weixin_id` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `flag` varchar(32) NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `is_service` tinyint(3) unsigned NOT NULL,
  `app_key` varchar(100) NOT NULL,
  `app_secret` varchar(100) NOT NULL,
  `app_token` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of weixin_account
-- ----------------------------
INSERT INTO `weixin_account` VALUES ('8', '测试公众号', '测试公众号', 'gh_8a97e490e075', 'YTirOqjCe0nx89deR8UYlLJ1vAXS0IxN', 'bd99ac4973ad2b5fe6565e0c9e7c3146', '10', '0', 'wx1183bbbc7ef25e77', '4a135cf0f85ff6f13cf5526bce4ef7ab', '');

-- ----------------------------
-- Table structure for `weixin_member`
-- ----------------------------
DROP TABLE IF EXISTS `weixin_member`;
CREATE TABLE `weixin_member` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `wid` varchar(32) NOT NULL,
  `user_token` varchar(100) NOT NULL,
  `sub_time` bigint(11) NOT NULL,
  `sub_event` varchar(32) NOT NULL,
  `flag` varchar(32) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of weixin_member
-- ----------------------------

-- ----------------------------
-- Table structure for `wevent`
-- ----------------------------
DROP TABLE IF EXISTS `wevent`;
CREATE TABLE `wevent` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `wid` varchar(32) NOT NULL,
  `wevent_cat` int(11) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `event_type` varchar(50) NOT NULL,
  `event_params` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wevent
-- ----------------------------

-- ----------------------------
-- Table structure for `wevent_cat`
-- ----------------------------
DROP TABLE IF EXISTS `wevent_cat`;
CREATE TABLE `wevent_cat` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `wid` varchar(32) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wevent_cat
-- ----------------------------
