-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- ����: localhost
-- ��������: 2014 �� 07 �� 23 �� 01:24
-- �������汾: 5.5.34
-- PHP �汾: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- ���ݿ�: `ebook`
--

-- --------------------------------------------------------

--
-- ��Ľṹ `t_adsence`
--

DROP TABLE IF EXISTS `t_adsence`;
CREATE TABLE IF NOT EXISTS `t_adsence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(1024) NOT NULL,
  `aviable` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- ת����е����� `t_adsence`
--


-- --------------------------------------------------------

--
-- ��Ľṹ `t_article`
--

DROP TABLE IF EXISTS `t_article`;
CREATE TABLE IF NOT EXISTS `t_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(1024) NOT NULL DEFAULT ' ',
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `url` varchar(150) NOT NULL,
  `local_url` varchar(100) NOT NULL DEFAULT ' ',
  `seed_id` int(11) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '0:������ 1.�����',
  `modify_date` varchar(8) NOT NULL DEFAULT ' ' COMMENT '�޸�����',
  `click_times` int(11) NOT NULL DEFAULT '0' COMMENT '�������',
  `img` varchar(255) NOT NULL DEFAULT ' ',
  `author` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT ' ',
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`url`),
  KEY `seed_id` (`seed_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- ת����е����� `t_article`
--


-- --------------------------------------------------------

--
-- ��Ľṹ `t_category`
--

DROP TABLE IF EXISTS `t_category`;
CREATE TABLE IF NOT EXISTS `t_category` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- ת����е����� `t_category`
--

INSERT INTO `t_category` (`id`, `category_name`) VALUES
(1, '����С˵'),
(2, '��������'),
(3, '����С˵'),
(4, '��ʷС˵'),
(5, '����С˵'),
(6, '����С˵'),
(7, '����С˵'),
(8, '�ƻ�С˵');

-- --------------------------------------------------------

--
-- ��Ľṹ `t_chapter`
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
-- ת����е����� `t_chapter`
--


-- --------------------------------------------------------

--
-- ��Ľṹ `t_links`
--

DROP TABLE IF EXISTS `t_links`;
CREATE TABLE IF NOT EXISTS `t_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- ת����е����� `t_links`
--


-- --------------------------------------------------------

--
-- ��Ľṹ `t_seeds`
--

DROP TABLE IF EXISTS `t_seeds`;
CREATE TABLE IF NOT EXISTS `t_seeds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(150) NOT NULL,
  `category_id` tinyint(4) NOT NULL,
  `modify_date` varchar(8) NOT NULL COMMENT '�޸�����',
  `parse_class` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`url`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- ת����е����� `t_seeds`
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
