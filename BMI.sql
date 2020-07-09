-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2020 年 7 月 09 日 16:15
-- サーバのバージョン： 10.4.13-MariaDB
-- PHP のバージョン: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gsacf_d06_21`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `BMI`
--

CREATE TABLE `BMI` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `u_id` varchar(60) NOT NULL,
  `u_pw` varchar(60) NOT NULL,
  `mail` varchar(60) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `grade` varchar(30) NOT NULL,
  `height` varchar(30) NOT NULL,
  `weight` varchar(30) NOT NULL,
  `bmi` int(4) NOT NULL,
  `dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `BMI`
--

INSERT INTO `BMI` (`id`, `name`, `u_id`, `u_pw`, `mail`, `sex`, `grade`, `height`, `weight`, `bmi`, `dt`) VALUES
(1, '管理者', 'master', '0001', '', '00', '管理画面', 'ーー', 'ーー', 0, '0000-00-00 00:00:00'),
(2, 'テスト太郎', 'テスト太郎', '1111', '', 'men', '高校2年', '180', '68', 0, '2020-06-22 00:00:00'),
(7, 'ギニュー', 'ギニュー', 'gyunyu', '', '男性', '大学2年生', '190', '100', 0, '2020-06-25 14:52:11'),
(8, 'グルト', 'グルト', 'グルト', '', '女性', '大学1年生', '180.0', '80.0', 0, '2020-06-25 16:13:17'),
(9, '孫悟空', '悟空', 'ゴクウ', '', '男性', '一般の方', '181.0', '90.0', 0, '2020-06-25 21:18:53'),
(10, 'バータ', 'バータ', 'バタ', 'gyunyu@ooo', '男性', '大学2年生', '230', '170.0', 32, '2020-07-08 10:54:09'),
(28, '桜木花道', '花道', '1031', 'hana@lll', '男性', '高校2年生', '188', '85', 24, '2020-07-08 11:01:56'),
(36, 'フリーザ', 'フリーザ', '55', 'deth@ball', '男性', '一般の方', '159', '80', 32, '2020-07-08 11:18:56'),
(39, 'ヤムチャ', 'ヤムチャ', 'loga', 'huhu@ken', '男性', '中学3年生', '188', '92', 26, '2020-07-09 21:47:57'),
(40, 'クリリン', 'クリリン', 'hananasi', 'kien@zan', '男性', '高校2年生', '165', '84', 31, '2020-07-09 22:33:10');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `BMI`
--
ALTER TABLE `BMI`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `BMI`
--
ALTER TABLE `BMI`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
