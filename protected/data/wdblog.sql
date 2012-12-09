-- phpMyAdmin SQL Dump
-- version 3.3.7
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 12 月 07 日 03:45
-- 服务器版本: 5.0.90
-- PHP 版本: 5.2.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `wdblog`
--

-- --------------------------------------------------------

--
-- 表的结构 `wd_attachments`
--

CREATE TABLE IF NOT EXISTS `wd_attachments` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `user_id` bigint(20) unsigned NOT NULL,
  `object_id` bigint(20) unsigned NOT NULL,
  `filename` varchar(255) default NULL,
  `oldfilename` varchar(255) default NULL,
  `extension` varchar(32) default NULL,
  `filesize` decimal(10,2) default NULL,
  `filepath` varchar(255) default NULL,
  `created` datetime default NULL,
  `updated` datetime default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_wd_attachments_wd_users1` (`user_id`),
  KEY `fk_wd_attachments_wd_posts1` (`object_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='附件表' AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wd_attachments`
--


-- --------------------------------------------------------

--
-- 表的结构 `wd_comments`
--

CREATE TABLE IF NOT EXISTS `wd_comments` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `parent_id` bigint(20) unsigned NOT NULL,
  `post_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned default '0',
  `status` tinyint(4) unsigned NOT NULL,
  `type` varchar(64) default 'post',
  `author` varchar(64) NOT NULL,
  `author_email` varchar(255) NOT NULL,
  `author_url` varchar(255) default NULL,
  `author_ip` varchar(86) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_wd_comments_wd_users1` (`user_id`),
  KEY `fk_wd_comments_wd_comments1` (`parent_id`),
  KEY `fk_wd_comments_wd_posts1` (`post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='评论表' AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wd_comments`
--


-- --------------------------------------------------------

--
-- 表的结构 `wd_links`
--

CREATE TABLE IF NOT EXISTS `wd_links` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `link_url` varchar(255) NOT NULL,
  `link_name` varchar(255) NOT NULL,
  `link_image` varchar(255) default NULL,
  `link_target` varchar(32) NOT NULL,
  `link_description` varchar(255) default NULL,
  `link_status` tinyint(4) unsigned default NULL,
  `link_owner` bigint(20) unsigned default NULL,
  `link_rating` int(11) unsigned default NULL,
  `link_rel` varchar(255) default NULL,
  `link_notes` mediumtext,
  `link_rss` varchar(255) default NULL,
  `created` datetime default NULL,
  `updated` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='链接表' AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wd_links`
--


-- --------------------------------------------------------

--
-- 表的结构 `wd_lookup`
--

CREATE TABLE IF NOT EXISTS `wd_lookup` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `code` int(11) unsigned NOT NULL,
  `name` varchar(128) default NULL,
  `type` varchar(128) default NULL,
  `position` int(11) unsigned default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='状态表' AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wd_lookup`
--


-- --------------------------------------------------------

--
-- 表的结构 `wd_meta`
--

CREATE TABLE IF NOT EXISTS `wd_meta` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `object_id` bigint(20) unsigned NOT NULL,
  `type` varchar(64) NOT NULL default 'post',
  `meta_key` varchar(255) NOT NULL,
  `meta_value` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_wd_meta_wd_users1` (`object_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='meta data' AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wd_meta`
--


-- --------------------------------------------------------

--
-- 表的结构 `wd_options`
--

CREATE TABLE IF NOT EXISTS `wd_options` (
  `id` bigint(20) NOT NULL auto_increment,
  `option_name` varchar(128) NOT NULL,
  `option_value` text NOT NULL,
  `autoload` varchar(32) default 'yes',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='配置表' AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wd_options`
--


-- --------------------------------------------------------

--
-- 表的结构 `wd_posts`
--

CREATE TABLE IF NOT EXISTS `wd_posts` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `user_id` bigint(20) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `excerpt` text,
  `content` longtext NOT NULL,
  `content_filtered` longtext,
  `post_status` tinyint(4) unsigned NOT NULL,
  `comment_status` tinyint(4) unsigned NOT NULL,
  `ping_status` tinyint(4) unsigned NOT NULL,
  `password` varchar(32) default NULL,
  `read_count` bigint(20) default NULL,
  `post_type` varchar(32) default 'post',
  `to_ping` int(11) unsigned default NULL,
  `pinged` int(11) unsigned default NULL,
  `parent_id` bigint(20) unsigned default NULL,
  `menu_order` int(11) unsigned default NULL,
  `slug` varchar(255) default NULL,
  `created` datetime NOT NULL,
  `update` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_wd_posts_wd_users1` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='内容表' AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wd_posts`
--


-- --------------------------------------------------------

--
-- 表的结构 `wd_terms`
--

CREATE TABLE IF NOT EXISTS `wd_terms` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='分类表' AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wd_terms`
--


-- --------------------------------------------------------

--
-- 表的结构 `wd_term_relationships`
--

CREATE TABLE IF NOT EXISTS `wd_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL,
  `term_taxonomy_id` bigint(20) unsigned NOT NULL,
  `term_order` int(11) unsigned default NULL,
  PRIMARY KEY  (`object_id`),
  KEY `fk_wd_term_relationships_wd_term_taxonomy1` (`term_taxonomy_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wd_term_relationships`
--


-- --------------------------------------------------------

--
-- 表的结构 `wd_term_taxonomy`
--

CREATE TABLE IF NOT EXISTS `wd_term_taxonomy` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `terms_id` bigint(20) unsigned NOT NULL,
  `parent_id` bigint(20) unsigned NOT NULL default '0',
  `taxonomy` varchar(64) NOT NULL,
  `description` text,
  `count` bigint(20) unsigned default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_wd_term_taxonomy_wd_terms1` (`terms_id`),
  KEY `fk_wd_term_taxonomy_wd_term_taxonomy1` (`parent_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wd_term_taxonomy`
--


-- --------------------------------------------------------

--
-- 表的结构 `wd_users`
--

CREATE TABLE IF NOT EXISTS `wd_users` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `username` varchar(128) NOT NULL,
  `nickname` varchar(32) default NULL,
  `password` varchar(128) NOT NULL,
  `avatar` varchar(128) default NULL,
  `salt` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `status` tinyint(4) unsigned default NULL,
  `role` varchar(64) default 'member' COMMENT 'member,admin',
  `user_url` varchar(128) default NULL,
  `other_details` varchar(255) default NULL,
  `counts` bigint(20) default '0',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户表' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `wd_users`
--

INSERT INTO `wd_users` (`id`, `username`, `nickname`, `password`, `avatar`, `salt`, `email`, `status`, `role`, `user_url`, `other_details`, `counts`, `created`, `updated`) VALUES
(1, 'admin', '管理员', '8cf529a608d0fc7edc35fb130ffea391', NULL, '28b206548469ce62182048fd9cf91760', 'winds@dlf5.com', NULL, 'admin', NULL, NULL, 2, '2012-12-07 11:42:08', '2012-12-07 11:42:10'),
(2, 'demo', '演示', '8cf529a608d0fc7edc35fb130ffea391', NULL, '28b206548469ce62182048fd9cf91760', 'winds@dlf5.com', NULL, 'member', NULL, NULL, 0, '2012-12-07 11:42:56', '2012-12-07 11:42:59');

-- --------------------------------------------------------

--
-- 表的结构 `wd_user_binding`
--

CREATE TABLE IF NOT EXISTS `wd_user_binding` (
  `user_id` bigint(20) unsigned NOT NULL,
  `user_openid` varchar(128) NOT NULL,
  `user_bind_type` varchar(45) NOT NULL,
  `other_details` varchar(255) default NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY  (`user_id`),
  KEY `fk_wd_user_binding_wd_user` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='第三方绑定表';

--
-- 转存表中的数据 `wd_user_binding`
--

