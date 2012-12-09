SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `wdblog` ;
CREATE SCHEMA IF NOT EXISTS `wdblog` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `wdblog` ;

-- -----------------------------------------------------
-- Table `wdblog`.`wd_users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wdblog`.`wd_users` ;

CREATE  TABLE IF NOT EXISTS `wdblog`.`wd_users` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(128) NOT NULL ,
  `nickname` VARCHAR(32) NULL ,
  `password` VARCHAR(128) NOT NULL ,
  `avatar` VARCHAR(128) NULL ,
  `salt` VARCHAR(128) NOT NULL ,
  `email` VARCHAR(128) NOT NULL ,
  `status` TINYINT(4) UNSIGNED NULL ,
  `role` VARCHAR(64) NULL DEFAULT 'member' COMMENT 'member,admin' ,
  `user_url` VARCHAR(128) NULL ,
  `other_details` VARCHAR(255) NULL ,
  `counts` BIGINT(20) NULL DEFAULT 0 ,
  `created` DATETIME NOT NULL ,
  `updated` DATETIME NOT NULL ,
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
  `user_openid` VARCHAR(128) NOT NULL ,
  `user_bind_type` VARCHAR(45) NOT NULL ,
  `other_details` VARCHAR(255) NULL ,
  `created` DATETIME NOT NULL ,
  `updated` DATETIME NOT NULL ,
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
  `post_status` TINYINT(4) UNSIGNED NOT NULL ,
  `comment_status` TINYINT(4) UNSIGNED NOT NULL DEFAULT 1 ,
  `ping_status` TINYINT(4) UNSIGNED NOT NULL DEFAULT 1 ,
  `password` VARCHAR(32) NULL ,
  `read_count` BIGINT(20) NULL ,
  `post_type` VARCHAR(32) NULL DEFAULT 'post' ,
  `to_ping` INT(11) UNSIGNED NULL DEFAULT 0 ,
  `pinged` INT(11) UNSIGNED NULL DEFAULT 0 ,
  `parent_id` BIGINT(20) UNSIGNED NULL DEFAULT 0 ,
  `menu_order` INT(11) UNSIGNED NULL DEFAULT 0 ,
  `slug` VARCHAR(255) NULL ,
  `created` DATETIME NOT NULL ,
  `update` DATETIME NOT NULL ,
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
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NOT NULL ,
  `slug` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci
COMMENT = '分类表';


-- -----------------------------------------------------
-- Table `wdblog`.`wd_term_taxonomy`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wdblog`.`wd_term_taxonomy` ;

CREATE  TABLE IF NOT EXISTS `wdblog`.`wd_term_taxonomy` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `terms_id` BIGINT(20) UNSIGNED NOT NULL ,
  `parent_id` BIGINT(20) UNSIGNED NOT NULL DEFAULT 0 ,
  `taxonomy` VARCHAR(64) NOT NULL ,
  `description` TEXT NULL ,
  `count` BIGINT(20) UNSIGNED NULL DEFAULT 0 ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_wd_term_taxonomy_wd_terms1` (`terms_id` ASC) ,
  INDEX `fk_wd_term_taxonomy_wd_term_taxonomy1` (`parent_id` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `wdblog`.`wd_term_relationships`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wdblog`.`wd_term_relationships` ;

CREATE  TABLE IF NOT EXISTS `wdblog`.`wd_term_relationships` (
  `object_id` BIGINT(20) UNSIGNED NOT NULL ,
  `term_taxonomy_id` BIGINT(20) UNSIGNED NOT NULL ,
  `term_order` INT(11) UNSIGNED NULL ,
  PRIMARY KEY (`object_id`) ,
  INDEX `fk_wd_term_relationships_wd_term_taxonomy1` (`term_taxonomy_id` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `wdblog`.`wd_options`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wdblog`.`wd_options` ;

CREATE  TABLE IF NOT EXISTS `wdblog`.`wd_options` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT ,
  `option_name` VARCHAR(128) NOT NULL ,
  `option_value` TEXT NOT NULL ,
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
  `link_url` VARCHAR(255) NOT NULL ,
  `link_name` VARCHAR(255) NOT NULL ,
  `link_image` VARCHAR(255) NULL ,
  `link_target` VARCHAR(32) NOT NULL ,
  `link_description` VARCHAR(255) NULL ,
  `link_status` TINYINT(4) UNSIGNED NULL ,
  `link_owner` BIGINT(20) UNSIGNED NULL ,
  `link_rating` INT(11) UNSIGNED NULL ,
  `link_rel` VARCHAR(255) NULL ,
  `link_notes` MEDIUMTEXT NULL ,
  `link_rss` VARCHAR(255) NULL ,
  `created` DATETIME NULL ,
  `updated` DATETIME NULL ,
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
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `object_id` BIGINT(20) UNSIGNED NOT NULL ,
  `type` VARCHAR(64) NOT NULL DEFAULT 'post' ,
  `meta_key` VARCHAR(255) NOT NULL ,
  `meta_value` TEXT NOT NULL ,
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
  `parent_id` BIGINT(20) UNSIGNED NOT NULL ,
  `post_id` BIGINT(20) UNSIGNED NOT NULL ,
  `user_id` BIGINT(20) UNSIGNED NULL DEFAULT 0 ,
  `status` TINYINT(4) UNSIGNED NOT NULL ,
  `type` VARCHAR(64) NULL DEFAULT 'post' ,
  `author` VARCHAR(64) NOT NULL ,
  `author_email` VARCHAR(255) NOT NULL ,
  `author_url` VARCHAR(255) NULL ,
  `author_ip` VARCHAR(86) NOT NULL ,
  `content` TEXT NOT NULL ,
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
  `code` INT(11) UNSIGNED NOT NULL ,
  `name` VARCHAR(128) NULL ,
  `type` VARCHAR(128) NULL ,
  `position` INT(11) UNSIGNED NULL ,
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
  `user_id` BIGINT(20) UNSIGNED NOT NULL ,
  `object_id` BIGINT(20) UNSIGNED NOT NULL ,
  `filename` VARCHAR(255) NULL ,
  `oldfilename` VARCHAR(255) NULL ,
  `extension` VARCHAR(32) NULL ,
  `filesize` DECIMAL(10,2) NULL ,
  `filepath` VARCHAR(255) NULL ,
  `created` DATETIME NULL ,
  `updated` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_wd_attachments_wd_users1` (`user_id` ASC) ,
  INDEX `fk_wd_attachments_wd_posts1` (`object_id` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci
COMMENT = '附件表';



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
