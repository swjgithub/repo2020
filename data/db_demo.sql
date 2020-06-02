-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2020-06-02 21:02:09
-- 服务器版本： 5.7.26
-- PHP 版本： 5.6.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `db_demo`
--

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE `article` (
  `id` int(5) NOT NULL COMMENT 'id主键',
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '文章标题',
  `content` varchar(800) COLLATE utf8_unicode_ci NOT NULL COMMENT '文章内容',
  `authors` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '文章作者'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `authors`) VALUES
(1, '两会重要信息', '利好不断', NULL),
(2, '疫情快报', '0增长', NULL),
(3, '美国公布禁入实体名单', '华为入列', NULL),
(4, '青年人的选择', 'Nova7', NULL),
(6, '淘宝新闻', '新品发布', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `tb_student`
--

CREATE TABLE `tb_student` (
  `id` tinyint(5) NOT NULL COMMENT 'id主键',
  `name` varchar(24) COLLATE utf8_unicode_ci NOT NULL COMMENT '学生姓名',
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '邮箱',
  `age` tinyint(3) NOT NULL COMMENT '年龄',
  `course` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '课程',
  `grade` int(3) NOT NULL COMMENT '成绩',
  `create_time` int(10) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(10) DEFAULT NULL COMMENT '更新时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `tb_student`
--

INSERT INTO `tb_student` (`id`, `name`, `email`, `age`, `course`, `grade`, `create_time`, `update_time`) VALUES
(1, 'peter', 'swj@126.com', 30, 'Vue开发实战', 85, NULL, NULL),
(2, 'Linda', 'ld@126.com', 18, 'ThinkPHP', 90, NULL, NULL),
(3, 'frank', 'fk@126.com', 16, 'Vue框架技术', 80, NULL, NULL),
(4, 'peter', 'swj@126.com', 30, 'JavaScript', 85, 30620, NULL),
(5, 'Jhon', 'swj@126.com', 30, 'ThinkPHP', 50, NULL, NULL),
(17, '李四', 'lisi@qq.com', 20, 'ThinkPHP', 89, 1590386267, 1590386267),
(13, '李四', 'zhang@126.com', 20, 'ThinkPHP', 90, 1590385077, 1590385077),
(8, 'WangHao', 'henly@126.com', 24, 'Vue开发实战', 78, 1590372690, 1590372690),
(16, '李四', 'lisi@qq.com', 20, 'ThinkPHP', 89, 45325325, NULL),
(10, '李三', 'zhang@126.com', 20, 'ThinkPHP', 90, 1590373753, 1590999501),
(11, '王五', 'zhang@126.com', 20, 'ThinkPHP', 90, 1590373753, 1590373753),
(14, '王五', 'zhang@126.com', 20, 'ThinkPHP', 90, 1590385077, 1590385077),
(15, '李四', 'lisi@qq.com', 20, 'ThinkPHP', 89, NULL, NULL);

--
-- 转储表的索引
--

--
-- 表的索引 `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `tb_student`
--
ALTER TABLE `tb_student`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `article`
--
ALTER TABLE `article`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'id主键', AUTO_INCREMENT=8;

--
-- 使用表AUTO_INCREMENT `tb_student`
--
ALTER TABLE `tb_student`
  MODIFY `id` tinyint(5) NOT NULL AUTO_INCREMENT COMMENT 'id主键', AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
