-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 08 月 23 日 03:06
-- 服务器版本: 5.5.8
-- PHP 版本: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 数据库: `caiji`
--

-- --------------------------------------------------------

--
-- 表的结构 `t_article`
--

DROP TABLE IF EXISTS `t_article`;
CREATE TABLE IF NOT EXISTS `t_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `url` varchar(150) NOT NULL,
  `local_url` varchar(100) NOT NULL,
  `seed_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0:连载中 1.已完结',
  `modify_date` varchar(8) NOT NULL COMMENT '修改日期',
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`url`),
  KEY `seed_id` (`seed_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `t_article`
--


-- --------------------------------------------------------

--
-- 表的结构 `t_category`
--

DROP TABLE IF EXISTS `t_category`;
CREATE TABLE IF NOT EXISTS `t_category` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gb2312 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `t_category`
--

INSERT INTO `t_category` (`id`, `category_name`) VALUES
(1, '言情小说'),
(2, '玄幻小说'),
(5, '都市小说'),
(4, '仙侠修真'),
(6, '历史小说'),
(7, '网游小说'),
(8, '竞技小说'),
(9, '科幻小说'),
(10, '全本小说');

-- --------------------------------------------------------

--
-- 表的结构 `t_chapter`
--

DROP TABLE IF EXISTS `t_chapter`;
CREATE TABLE IF NOT EXISTS `t_chapter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artile_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `url` varchar(150) NOT NULL,
  `local_url` varchar(100) NOT NULL,
  `collect_flag` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`url`),
  KEY `artile_id` (`artile_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `t_chapter`
--


-- --------------------------------------------------------

--
-- 表的结构 `t_job`
--

DROP TABLE IF EXISTS `t_job`;
CREATE TABLE IF NOT EXISTS `t_job` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_type` tinyint(2) NOT NULL,
  `article_id` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL COMMENT '0：未执行 1：已执行',
  PRIMARY KEY (`job_id`),
  KEY `job_type` (`job_type`,`status`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312 COMMENT='任务表' AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `t_job`
--


-- --------------------------------------------------------

--
-- 表的结构 `t_seeds`
--

DROP TABLE IF EXISTS `t_seeds`;
CREATE TABLE IF NOT EXISTS `t_seeds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(150) NOT NULL,
  `category_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`url`)
) ENGINE=MyISAM  DEFAULT CHARSET=gb2312 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `t_seeds`
--

INSERT INTO `t_seeds` (`id`, `url`, `category_id`) VALUES
(1, 'http://www.81zw.com/yanqing/', 1),
(2, 'http://www.81zw.com/xuanhuan/', 2),
(4, 'http://www.81zw.com/xianxia/', 4),
(5, 'http://www.81zw.com/lishi/', 6);
