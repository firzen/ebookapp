-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- ����: localhost
-- ��������: 2013 �� 08 �� 23 �� 03:06
-- �������汾: 5.5.8
-- PHP �汾: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- ���ݿ�: `caiji`
--

-- --------------------------------------------------------

--
-- ��Ľṹ `t_article`
--

DROP TABLE IF EXISTS `t_article`;
CREATE TABLE IF NOT EXISTS `t_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `url` varchar(150) NOT NULL,
  `local_url` varchar(100) NOT NULL,
  `seed_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0:������ 1.�����',
  `modify_date` varchar(8) NOT NULL COMMENT '�޸�����',
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`url`),
  KEY `seed_id` (`seed_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=gb2312 AUTO_INCREMENT=11 ;

--
-- ת����е����� `t_category`
--

INSERT INTO `t_category` (`id`, `category_name`) VALUES
(1, '����С˵'),
(2, '����С˵'),
(5, '����С˵'),
(4, '��������'),
(6, '��ʷС˵'),
(7, '����С˵'),
(8, '����С˵'),
(9, '�ƻ�С˵'),
(10, 'ȫ��С˵');

-- --------------------------------------------------------

--
-- ��Ľṹ `t_chapter`
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
-- ת����е����� `t_chapter`
--


-- --------------------------------------------------------

--
-- ��Ľṹ `t_job`
--

DROP TABLE IF EXISTS `t_job`;
CREATE TABLE IF NOT EXISTS `t_job` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_type` tinyint(2) NOT NULL,
  `article_id` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL COMMENT '0��δִ�� 1����ִ��',
  PRIMARY KEY (`job_id`),
  KEY `job_type` (`job_type`,`status`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312 COMMENT='�����' AUTO_INCREMENT=1 ;

--
-- ת����е����� `t_job`
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`url`)
) ENGINE=MyISAM  DEFAULT CHARSET=gb2312 AUTO_INCREMENT=6 ;

--
-- ת����е����� `t_seeds`
--

INSERT INTO `t_seeds` (`id`, `url`, `category_id`) VALUES
(1, 'http://www.81zw.com/yanqing/', 1),
(2, 'http://www.81zw.com/xuanhuan/', 2),
(4, 'http://www.81zw.com/xianxia/', 4),
(5, 'http://www.81zw.com/lishi/', 6);
