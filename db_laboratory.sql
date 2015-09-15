-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2014-10-20 16:51:37
-- 服务器版本: 5.5.34
-- PHP 版本: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `db_laboratory`
--

-- --------------------------------------------------------

--
-- 表的结构 `db_links`
--

CREATE TABLE IF NOT EXISTS `db_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '友情链接id',
  `link` varchar(255) NOT NULL COMMENT '友情链接名称',
  `url` varchar(255) NOT NULL COMMENT '友情链接',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `db_news`
--

CREATE TABLE IF NOT EXISTS `db_news` (
  `nid` int(11) NOT NULL AUTO_INCREMENT COMMENT '新闻id',
  `title` varchar(255) NOT NULL COMMENT '新闻标题',
  `type` int(11) NOT NULL COMMENT '新闻类别',
  `content` text NOT NULL COMMENT '新闻内容',
  `time` int(11) NOT NULL COMMENT '新闻时间',
  `news_empty1` varchar(255) DEFAULT NULL COMMENT '空字段',
  `news_empty2` int(11) DEFAULT NULL COMMENT '空字段',
  `views` int(11) NOT NULL DEFAULT '0' COMMENT '浏览次数',
  `source` varchar(255) NOT NULL COMMENT '来源',
  PRIMARY KEY (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `db_result`
--

CREATE TABLE IF NOT EXISTS `db_result` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '成果id',
  `author` varchar(255) NOT NULL COMMENT '作者',
  `type` int(11) NOT NULL COMMENT '成果类型',
  `title` varchar(255) NOT NULL COMMENT '成果标题',
  `content` text NOT NULL COMMENT '成果简介',
  `file` varchar(255) NOT NULL COMMENT '成果附件',
  `time` int(11) NOT NULL COMMENT '添加时间',
  `result_empty1` varchar(255) NOT NULL COMMENT '空字段',
  `result_empty2` int(11) NOT NULL COMMENT '空字段',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `db_resume`
--

CREATE TABLE IF NOT EXISTS `db_resume` (
  `id` int(11) NOT NULL COMMENT '用户id',
  `img` varchar(255) NOT NULL COMMENT '简介图片',
  `content` text NOT NULL COMMENT '简介',
  `email` varchar(255) NOT NULL COMMENT '用户邮箱',
  `resume_empty1` varchar(255) DEFAULT NULL COMMENT '空字段',
  `resume_empty2` int(11) DEFAULT NULL COMMENT '空字段',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `db_study`
--

CREATE TABLE IF NOT EXISTS `db_study` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '研究id',
  `title` varchar(255) NOT NULL COMMENT '研究名称',
  `content` text NOT NULL COMMENT '研究介绍',
  `type` int(11) NOT NULL COMMENT '研究类型',
  `time` int(11) NOT NULL COMMENT '添加时间',
  `study_empty1` varchar(255) DEFAULT NULL COMMENT '空字段',
  `study_empty2` int(11) DEFAULT NULL COMMENT '空字段',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `db_user`
--

CREATE TABLE IF NOT EXISTS `db_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户ID 主码',
  `name` varchar(255) NOT NULL COMMENT '用户名',
  `password` varchar(255) NOT NULL COMMENT '用户密码',
  `user_empty1` varchar(255) DEFAULT NULL COMMENT '空字段',
  `user_empty2` int(11) DEFAULT NULL COMMENT '空字段',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `db_user_info`
--

CREATE TABLE IF NOT EXISTS `db_user_info` (
  `uid` int(11) NOT NULL COMMENT '用户id，主键',
  `img` varchar(255) NOT NULL COMMENT '用户头像',
  `time` int(11) NOT NULL COMMENT '添加时间',
  `type` int(11) NOT NULL COMMENT '0/导师，1/研究生，2/本科',
  `sex` int(11) NOT NULL COMMENT '性别0男 1女',
  `info_empty1` varchar(255) DEFAULT NULL COMMENT '空字段',
  `info_empty2` int(11) DEFAULT NULL COMMENT '空字段',
  `birth` date NOT NULL COMMENT '出生年月',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
