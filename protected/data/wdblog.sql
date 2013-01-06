-- phpMyAdmin SQL Dump
-- version 3.3.7
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 01 月 06 日 12:56
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
  `user_id` bigint(20) unsigned NOT NULL COMMENT '上传用户ID',
  `object_id` bigint(20) unsigned NOT NULL COMMENT '对象ID如post_id',
  `filename` varchar(255) default NULL COMMENT '文件名称',
  `oldfilename` varchar(255) default NULL COMMENT '原名称',
  `extension` varchar(32) default NULL COMMENT '文件ext',
  `filesize` decimal(10,2) default NULL COMMENT '文件大小',
  `filepath` varchar(255) default NULL COMMENT '文件路径',
  `created` datetime default NULL COMMENT '创建时间',
  `updated` datetime default NULL COMMENT '更新时间',
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
  `parent_id` bigint(20) unsigned NOT NULL COMMENT '父ID',
  `post_id` bigint(20) unsigned NOT NULL COMMENT '文章ID',
  `user_id` bigint(20) unsigned default '0' COMMENT '用户ID',
  `status` tinyint(4) unsigned NOT NULL COMMENT '状态',
  `type` varchar(64) default 'post' COMMENT '类型',
  `author` varchar(64) NOT NULL COMMENT '作者',
  `author_email` varchar(255) NOT NULL COMMENT '电子邮箱',
  `author_url` varchar(255) default NULL COMMENT '个人网址',
  `author_ip` varchar(86) NOT NULL COMMENT 'IP',
  `content` text NOT NULL COMMENT '评论内容',
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
  `link_url` varchar(255) NOT NULL COMMENT '链接地址',
  `link_name` varchar(255) NOT NULL COMMENT '链接名称',
  `link_image` varchar(255) default NULL,
  `link_target` varchar(32) NOT NULL COMMENT '是否新开页面',
  `link_description` varchar(255) default NULL COMMENT '链接描述',
  `link_status` tinyint(4) unsigned default NULL COMMENT '链接状态',
  `link_owner` bigint(20) unsigned default NULL COMMENT '链接所有者',
  `link_rating` int(11) unsigned default NULL,
  `link_rel` varchar(255) default NULL,
  `link_notes` mediumtext,
  `link_rss` varchar(255) default NULL,
  `created` datetime default NULL COMMENT '创建时间',
  `updated` datetime default NULL COMMENT '更新时间',
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
  `code` int(11) unsigned NOT NULL COMMENT '状态值',
  `name` varchar(128) default NULL COMMENT '状态名称',
  `type` varchar(128) default NULL COMMENT '对应的类型,post,user,link\n',
  `position` int(11) unsigned default NULL COMMENT '排序',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='状态表' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `wd_lookup`
--

INSERT INTO `wd_lookup` (`id`, `code`, `name`, `type`, `position`) VALUES
(1, 1, '投稿', 'UserPostStatus', 1),
(2, 2, '草稿', 'UserPostStatus', 2),
(3, 1, '待审批', 'PostStatus', 1),
(4, 2, '草稿', 'PostStatus', 2),
(5, 3, '发布', 'PostStatus', 0);

-- --------------------------------------------------------

--
-- 表的结构 `wd_meta`
--

CREATE TABLE IF NOT EXISTS `wd_meta` (
  `id` bigint(20) unsigned NOT NULL auto_increment COMMENT 'ID',
  `object_id` bigint(20) unsigned NOT NULL COMMENT '关联对象的ID，如user_id,post_id.',
  `type` varchar(64) NOT NULL default 'post' COMMENT '使用类型：如post,uesr',
  `meta_key` varchar(255) NOT NULL COMMENT 'meta 对应的名称\n',
  `meta_value` text NOT NULL COMMENT '值，保存json',
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
  `option_name` varchar(128) NOT NULL COMMENT '相应配置名称',
  `option_value` text NOT NULL COMMENT '配置值,json',
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
  `post_status` tinyint(4) unsigned NOT NULL COMMENT '文章状态',
  `comment_status` tinyint(4) unsigned NOT NULL default '1' COMMENT '评论状态',
  `ping_status` tinyint(4) unsigned NOT NULL default '1' COMMENT '评分状态',
  `password` varchar(32) default NULL COMMENT '文章密码',
  `read_count` bigint(20) default '0' COMMENT '阅读数',
  `post_type` varchar(32) default 'post' COMMENT '文章类型,post,page',
  `to_ping` int(11) unsigned default '0' COMMENT '好',
  `pinged` int(11) unsigned default '0' COMMENT '差',
  `parent_id` bigint(20) unsigned default '0' COMMENT '父ID',
  `menu_order` int(11) unsigned default '0' COMMENT '菜单排序',
  `slug` varchar(255) default NULL COMMENT '别名',
  `created` datetime NOT NULL COMMENT '创建时间',
  `updated` datetime NOT NULL COMMENT '更新时间',
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
  `id` bigint(20) unsigned NOT NULL auto_increment COMMENT 'ID',
  `parent_id` bigint(20) unsigned NOT NULL default '0' COMMENT '父ID',
  `taxonomy` varchar(64) NOT NULL COMMENT '类型',
  `name` varchar(255) NOT NULL COMMENT '名字',
  `slug` varchar(255) default NULL COMMENT '别名',
  `description` text COMMENT '描述',
  `count` bigint(20) unsigned default '0' COMMENT '关联文章数量',
  PRIMARY KEY  (`id`),
  KEY `fk_wd_term_taxonomy_wd_term_taxonomy1` (`parent_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `wd_terms`
--

INSERT INTO `wd_terms` (`id`, `parent_id`, `taxonomy`, `name`, `slug`, `description`, `count`) VALUES
(1, 0, 'posts', 'Yii 框架', 'Yii Framework', 'Yii 框架 的文章', 0),
(2, 0, 'posts', 'PHP', 'PHP', 'PHP技术文章', 0);

-- --------------------------------------------------------

--
-- 表的结构 `wd_term_relationships`
--

CREATE TABLE IF NOT EXISTS `wd_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL COMMENT '对象ID',
  `term_id` bigint(20) unsigned NOT NULL COMMENT '分类或标签ID',
  `term_order` int(11) unsigned default NULL COMMENT '排序',
  KEY `fk_wd_term_relationships_wd_term_taxonomy1` (`term_id`),
  KEY `INDEX` (`object_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wd_term_relationships`
--


-- --------------------------------------------------------

--
-- 表的结构 `wd_users`
--

CREATE TABLE IF NOT EXISTS `wd_users` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `username` varchar(128) NOT NULL COMMENT '用户名',
  `nickname` varchar(32) default NULL COMMENT '昵称',
  `password` varchar(128) NOT NULL COMMENT '密码',
  `avatar` varchar(128) default NULL COMMENT '头像',
  `salt` varchar(128) NOT NULL COMMENT '与密码一起使用',
  `email` varchar(128) NOT NULL COMMENT '电子邮箱',
  `status` tinyint(4) unsigned default NULL COMMENT '用户状态',
  `role` varchar(64) default 'member' COMMENT '用户权限如:member,admin',
  `user_url` varchar(128) default NULL COMMENT '个人网站',
  `other_details` varchar(255) default NULL COMMENT '其他描述',
  `counts` bigint(20) default '0' COMMENT 'login 次数',
  `created` datetime NOT NULL COMMENT '创建时间',
  `updated` datetime NOT NULL COMMENT '更新时间',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `wd_users`
--

INSERT INTO `wd_users` (`id`, `username`, `nickname`, `password`, `avatar`, `salt`, `email`, `status`, `role`, `user_url`, `other_details`, `counts`, `created`, `updated`) VALUES
(1, 'admin', '管理员', '8cf529a608d0fc7edc35fb130ffea391', NULL, '28b206548469ce62182048fd9cf91760', 'winds@dlf5.com', 2, 'admin', 'http://www.dlf5.com', NULL, 3, '2013-01-06 18:11:46', '2013-01-06 18:11:52');

-- --------------------------------------------------------

--
-- 表的结构 `wd_user_binding`
--

CREATE TABLE IF NOT EXISTS `wd_user_binding` (
  `user_id` bigint(20) unsigned NOT NULL,
  `user_openid` varchar(128) NOT NULL COMMENT '开放平台提供的 openid ',
  `user_bind_type` varchar(45) NOT NULL COMMENT '开放平台的类型如:sina,qq,baidu',
  `other_details` varchar(255) default NULL COMMENT '其他描述',
  `created` datetime NOT NULL COMMENT '创建时间',
  `updated` datetime NOT NULL COMMENT '更新时间',
  PRIMARY KEY  (`user_id`),
  KEY `fk_wd_user_binding_wd_user` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='第三方绑定表';

--
-- 转存表中的数据 `wd_user_binding`
--

