-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 07 月 23 日 01:24
-- 服务器版本: 5.5.34
-- PHP 版本: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 数据库: `ebook`
--

-- --------------------------------------------------------

--
-- 表的结构 `t_adsence`
--

DROP TABLE IF EXISTS `t_adsence`;
CREATE TABLE IF NOT EXISTS `t_adsence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(1024) NOT NULL,
  `aviable` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `t_adsence`
--


-- --------------------------------------------------------

--
-- 表的结构 `t_article`
--

DROP TABLE IF EXISTS `t_article`;
CREATE TABLE IF NOT EXISTS `t_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(1024) NOT NULL DEFAULT ' ',
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `url` varchar(150) NOT NULL,
  `local_url` varchar(100) NOT NULL DEFAULT ' ',
  `seed_id` int(11) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '0:连载中 1.已完结',
  `modify_date` varchar(8) NOT NULL DEFAULT ' ' COMMENT '修改日期',
  `click_times` int(11) NOT NULL DEFAULT '0' COMMENT '点击次数',
  `img` varchar(255) NOT NULL DEFAULT ' ',
  `author` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT ' ',
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`url`),
  KEY `seed_id` (`seed_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `t_category`
--

INSERT INTO `t_category` (`id`, `category_name`) VALUES
(1, '言情小说'),
(2, '仙侠修真'),
(3, '都市小说'),
(4, '历史小说'),
(5, '玄幻小说'),
(6, '网游小说'),
(7, '竞技小说'),
(8, '科幻小说');

-- --------------------------------------------------------

--
-- 表的结构 `t_chapter`
--

DROP TABLE IF EXISTS `t_chapter`;
CREATE TABLE IF NOT EXISTS `t_chapter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artile_id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `url` varchar(150) NOT NULL,
  `local_url` varchar(100) NOT NULL DEFAULT ' ',
  `collect_flag` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`url`),
  KEY `artile_id` (`artile_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `t_chapter`
--


-- --------------------------------------------------------

--
-- 表的结构 `t_links`
--

DROP TABLE IF EXISTS `t_links`;
CREATE TABLE IF NOT EXISTS `t_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `t_links`
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
  `modify_date` varchar(8) NOT NULL COMMENT '修改日期',
  `parse_class` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`url`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `t_seeds`
--

INSERT INTO `t_seeds` (`id`, `url`, `category_id`, `modify_date`, `parse_class`) VALUES
(1, 'http://www.81zw.com/yanqing/', 1, '20140722', 'N81ZW_Parser'),
(2, 'http://www.81zw.com/xianxia/', 2, '', 'N81ZW_Parser'),
(3, 'http://www.81zw.com/dushi/', 3, '20140722', 'N81ZW_Parser'),
(4, 'http://www.81zw.com/lishi/', 4, '', 'N81ZW_Parser'),
(5, 'http://www.81zw.com/xuanhuan/', 5, '', 'N81ZW_Parser'),
(6, 'http://www.81zw.com/wangyou/', 6, '', 'N81ZW_Parser'),
(7, 'http://www.81zw.com/jingji/', 7, '20140722', 'N81ZW_Parser'),
(8, 'http://www.81zw.com/yanqing/2.html', 1, '', 'N81ZW_Parser'),
(9, 'http://www.81zw.com/yanqing/3.html', 1, '', 'N81ZW_Parser'),
(10, 'http://www.81zw.com/yanqing/4.html', 1, '', 'N81ZW_Parser'),
(11, 'http://www.81zw.com/kehuan/', 8, '20140722', 'N81ZW_Parser');
