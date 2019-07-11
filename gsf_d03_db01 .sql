-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 2019 年 7 月 11 日 04:03
-- サーバのバージョン： 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gsf_d03_db01`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `HIP_TAKE_HIP`
--

CREATE TABLE `HIP_TAKE_HIP` (
  `id` int(12) NOT NULL,
  `image` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `Uname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `NOWname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `beforename` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `UP` int(11) DEFAULT NULL,
  `DOWN` int(11) DEFAULT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `HIP_TAKE_HIP`
--

INSERT INTO `HIP_TAKE_HIP` (`id`, `image`, `comment`, `Uname`, `NOWname`, `beforename`, `UP`, `DOWN`, `indate`) VALUES
(6, 'upload/20190711034956d41d8cd98f00b204e9800998ecf8427e.png', 'しりとりといえばこれからはじまる', 'しげはるお', 'りんご', 'はじまり', NULL, NULL, '2019-07-11 12:49:56'),
(7, 'upload/20190711035023d41d8cd98f00b204e9800998ecf8427e.jpg', 'ばななが大好き', 'みどりくん', 'ゴリラ', 'りんご', NULL, NULL, '2019-07-11 12:50:23'),
(8, 'upload/20190711035154d41d8cd98f00b204e9800998ecf8427e.jpeg', '小学生のマストアイテム', 'はるおちゃん', 'ランドセル', 'ごりら', NULL, NULL, '2019-07-11 12:51:54'),
(9, 'upload/20190711035255d41d8cd98f00b204e9800998ecf8427e.jpg', '美味しいブルンボンのあいつ', 'しげちゃん', 'ルマンド', 'ランドセル', NULL, NULL, '2019-07-11 12:52:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `HIP_TAKE_HIP`
--
ALTER TABLE `HIP_TAKE_HIP`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `HIP_TAKE_HIP`
--
ALTER TABLE `HIP_TAKE_HIP`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
