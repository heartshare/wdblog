SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `wdblog` ;
CREATE SCHEMA IF NOT EXISTS `wdblog` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `wdblog` ;

-- -----------------------------------------------------
-- Table `wdblog`.`wd_users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wdblog`.`wd_users` ;

CREATE  TABLE IF NOT EXISTS `wdblog`.`wd_users` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(128) NOT NULL COMMENT '用户名' ,
  `nickname` VARCHAR(32) NULL COMMENT '昵称' ,
  `password` VARCHAR(128) NOT NULL COMMENT '密码' ,
  `avatar` VARCHAR(128) NULL COMMENT '头像' ,
  `salt` VARCHAR(128) NOT NULL COMMENT '与密码一起使用' ,
  `email` VARCHAR(128) NOT NULL COMMENT '电子邮箱' ,
  `status` TINYINT(4) UNSIGNED NULL COMMENT '用户状态' ,
  `role` VARCHAR(64) NULL DEFAULT 'member' COMMENT '用户权限如:member,admin' ,
  `user_url` VARCHAR(128) NULL COMMENT '个人网站' ,
  `other_details` VARCHAR(255) NULL COMMENT '其他描述' ,
  `counts` BIGINT(20) NULL DEFAULT 0 COMMENT 'login 次数' ,
  `created` DATETIME NOT NULL COMMENT '创建时间' ,
  `updated` DATETIME NOT NULL COMMENT '更新时间' ,
  PRIMARY KEY (`id`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci
COMMENT = '用户表';


-- -----------------------------------------------------
-- Table `wdblog`.`wd_user_binding`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wdblog`.`wd_user_binding` ;

CREATE  TABLE IF NOT EXISTS `wdblog`.`wd_user_binding` (
  `user_id` BIGINT(20) UNSIGNED NOT NULL ,
  `user_openid` VARCHAR(128) NOT NULL COMMENT '开放平台提供的 openid ' ,
  `user_bind_type` VARCHAR(45) NOT NULL COMMENT '开放平台的类型如:sina,qq,baidu' ,
  `other_details` VARCHAR(255) NULL COMMENT '其他描述' ,
  `created` DATETIME NOT NULL COMMENT '创建时间' ,
  `updated` DATETIME NOT NULL COMMENT '更新时间' ,
  INDEX `fk_wd_user_binding_wd_user` (`user_id` ASC) ,
  PRIMARY KEY (`user_id`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci
COMMENT = '第三方绑定表';


-- -----------------------------------------------------
-- Table `wdblog`.`wd_posts`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wdblog`.`wd_posts` ;

CREATE  TABLE IF NOT EXISTS `wdblog`.`wd_posts` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `user_id` BIGINT(20) UNSIGNED NOT NULL ,
  `title` VARCHAR(255) NOT NULL ,
  `excerpt` TEXT NULL ,
  `content` LONGTEXT NOT NULL ,
  `content_filtered` LONGTEXT NULL ,
  `post_status` TINYINT(4) UNSIGNED NOT NULL COMMENT '文章状态' ,
  `comment_status` TINYINT(4) UNSIGNED NOT NULL DEFAULT 1 COMMENT '评论状态' ,
  `ping_status` TINYINT(4) UNSIGNED NOT NULL DEFAULT 1 COMMENT '评分状态' ,
  `password` VARCHAR(32) NULL COMMENT '文章密码' ,
  `read_count` BIGINT(20) NULL COMMENT '阅读数' ,
  `post_type` VARCHAR(32) NULL DEFAULT 'post' COMMENT '文章类型,post,page' ,
  `to_ping` INT(11) UNSIGNED NULL DEFAULT 0 COMMENT '好' ,
  `pinged` INT(11) UNSIGNED NULL DEFAULT 0 COMMENT '差' ,
  `parent_id` BIGINT(20) UNSIGNED NULL DEFAULT 0 COMMENT '父ID' ,
  `menu_order` INT(11) UNSIGNED NULL DEFAULT 0 COMMENT '菜单排序' ,
  `slug` VARCHAR(255) NULL COMMENT '别名' ,
  `created` DATETIME NOT NULL COMMENT '创建时间' ,
  `updated` DATETIME NOT NULL COMMENT '更新时间' ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_wd_posts_wd_users1` (`user_id` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci
COMMENT = '内容表';


-- -----------------------------------------------------
-- Table `wdblog`.`wd_terms`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wdblog`.`wd_terms` ;

CREATE  TABLE IF NOT EXISTS `wdblog`.`wd_terms` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID' ,
  `parent_id` BIGINT(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '父ID' ,
  `taxonomy` VARCHAR(64) NOT NULL COMMENT '类型' ,
  `name` VARCHAR(255) NOT NULL COMMENT '名字' ,
  `slug` VARCHAR(255) NULL COMMENT '别名' ,
  `description` TEXT NULL COMMENT '描述' ,
  `count` BIGINT(20) UNSIGNED NULL DEFAULT 0 COMMENT '关联文章数量' ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_wd_term_taxonomy_wd_term_taxonomy1` (`parent_id` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `wdblog`.`wd_term_relationships`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wdblog`.`wd_term_relationships` ;

CREATE  TABLE IF NOT EXISTS `wdblog`.`wd_term_relationships` (
  `object_id` BIGINT(20) UNSIGNED NOT NULL COMMENT '对象ID' ,
  `term_id` BIGINT(20) UNSIGNED NOT NULL COMMENT '分类或标签ID' ,
  `term_order` INT(11) UNSIGNED NULL COMMENT '排序' ,
  INDEX `fk_wd_term_relationships_wd_term_taxonomy1` (`term_id` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `wdblog`.`wd_options`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wdblog`.`wd_options` ;

CREATE  TABLE IF NOT EXISTS `wdblog`.`wd_options` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT ,
  `option_name` VARCHAR(128) NOT NULL COMMENT '相应配置名称' ,
  `option_value` TEXT NOT NULL COMMENT '配置值,json' ,
  `autoload` VARCHAR(32) NULL DEFAULT 'yes' ,
  PRIMARY KEY (`id`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci
COMMENT = '配置表';


-- -----------------------------------------------------
-- Table `wdblog`.`wd_links`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wdblog`.`wd_links` ;

CREATE  TABLE IF NOT EXISTS `wdblog`.`wd_links` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `link_url` VARCHAR(255) NOT NULL COMMENT '链接地址' ,
  `link_name` VARCHAR(255) NOT NULL COMMENT '链接名称' ,
  `link_image` VARCHAR(255) NULL ,
  `link_target` VARCHAR(32) NOT NULL COMMENT '是否新开页面' ,
  `link_description` VARCHAR(255) NULL COMMENT '链接描述' ,
  `link_status` TINYINT(4) UNSIGNED NULL COMMENT '链接状态' ,
  `link_owner` BIGINT(20) UNSIGNED NULL COMMENT '链接所有者' ,
  `link_rating` INT(11) UNSIGNED NULL ,
  `link_rel` VARCHAR(255) NULL ,
  `link_notes` MEDIUMTEXT NULL ,
  `link_rss` VARCHAR(255) NULL ,
  `created` DATETIME NULL COMMENT '创建时间' ,
  `updated` DATETIME NULL COMMENT '更新时间' ,
  PRIMARY KEY (`id`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci
COMMENT = '链接表';


-- -----------------------------------------------------
-- Table `wdblog`.`wd_meta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wdblog`.`wd_meta` ;

CREATE  TABLE IF NOT EXISTS `wdblog`.`wd_meta` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID' ,
  `object_id` BIGINT(20) UNSIGNED NOT NULL COMMENT '关联对象的ID，如user_id,post_id.' ,
  `type` VARCHAR(64) NOT NULL DEFAULT 'post' COMMENT '使用类型：如post,uesr' ,
  `meta_key` VARCHAR(255) NOT NULL COMMENT 'meta 对应的名称\n' ,
  `meta_value` TEXT NOT NULL COMMENT '值，保存json' ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_wd_meta_wd_users1` (`object_id` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci
COMMENT = 'meta data';


-- -----------------------------------------------------
-- Table `wdblog`.`wd_comments`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wdblog`.`wd_comments` ;

CREATE  TABLE IF NOT EXISTS `wdblog`.`wd_comments` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `parent_id` BIGINT(20) UNSIGNED NOT NULL COMMENT '父ID' ,
  `post_id` BIGINT(20) UNSIGNED NOT NULL COMMENT '文章ID' ,
  `user_id` BIGINT(20) UNSIGNED NULL DEFAULT 0 COMMENT '用户ID' ,
  `status` TINYINT(4) UNSIGNED NOT NULL COMMENT '状态' ,
  `type` VARCHAR(64) NULL DEFAULT 'post' COMMENT '类型' ,
  `author` VARCHAR(64) NOT NULL COMMENT '作者' ,
  `author_email` VARCHAR(255) NOT NULL COMMENT '电子邮箱' ,
  `author_url` VARCHAR(255) NULL COMMENT '个人网址' ,
  `author_ip` VARCHAR(86) NOT NULL COMMENT 'IP' ,
  `content` TEXT NOT NULL COMMENT '评论内容' ,
  `other_details` TEXT NULL ,
  `created` DATETIME NULL ,
  `updated` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_wd_comments_wd_users1` (`user_id` ASC) ,
  INDEX `fk_wd_comments_wd_comments1` (`parent_id` ASC) ,
  INDEX `fk_wd_comments_wd_posts1` (`post_id` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci
COMMENT = '评论表';


-- -----------------------------------------------------
-- Table `wdblog`.`wd_lookup`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wdblog`.`wd_lookup` ;

CREATE  TABLE IF NOT EXISTS `wdblog`.`wd_lookup` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `code` INT(11) UNSIGNED NOT NULL COMMENT '状态值' ,
  `name` VARCHAR(128) NULL COMMENT '状态名称' ,
  `type` VARCHAR(128) NULL COMMENT '对应的类型,post,user,link\n' ,
  `position` INT(11) UNSIGNED NULL COMMENT '排序' ,
  PRIMARY KEY (`id`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci
COMMENT = '状态表';


-- -----------------------------------------------------
-- Table `wdblog`.`wd_attachments`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wdblog`.`wd_attachments` ;

CREATE  TABLE IF NOT EXISTS `wdblog`.`wd_attachments` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `user_id` BIGINT(20) UNSIGNED NOT NULL COMMENT '上传用户ID' ,
  `object_id` BIGINT(20) UNSIGNED NOT NULL COMMENT '对象ID如post_id' ,
  `filename` VARCHAR(255) NULL COMMENT '文件名称' ,
  `oldfilename` VARCHAR(255) NULL COMMENT '原名称' ,
  `extension` VARCHAR(32) NULL COMMENT '文件ext' ,
  `filesize` DECIMAL(10,2) NULL COMMENT '文件大小' ,
  `filepath` VARCHAR(255) NULL COMMENT '文件路径' ,
  `created` DATETIME NULL COMMENT '创建时间' ,
  `updated` DATETIME NULL COMMENT '更新时间' ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_wd_attachments_wd_users1` (`user_id` ASC) ,
  INDEX `fk_wd_attachments_wd_posts1` (`object_id` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci
COMMENT = '附件表';

USE `wdblog` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
