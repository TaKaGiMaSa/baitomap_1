-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2021 年 7 月 15 日 02:20
-- サーバのバージョン： 10.4.19-MariaDB
-- PHP のバージョン: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `baito_map`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `info`
--

CREATE TABLE `info` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  `money` int(11) NOT NULL,
  `work` varchar(255) NOT NULL,
  `work_time` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `info`
--

INSERT INTO `info` (`id`, `name`, `longitude`, `latitude`, `money`, `work`, `work_time`, `phone`) VALUES
(1, 'コンビニ', 34.489869, 136.839686, 500, 'レジ', '18-22', '0372982839'),
(2, 'コンビニ', 34.49099, 136.831601, 600, 'ホール', '15-20', '03723282839'),
(45, 'コンビニ', 34.441356314251, 136.77610240096, 900, 'レジ', '14時から22時', '463767'),
(46, 'コンビニ', 34.477832608435, 136.82857082013, 443, 'コンビニ', '1', '90901');

-- --------------------------------------------------------

--
-- テーブルの構造 `manage`
--

CREATE TABLE `manage` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `manage`
--

INSERT INTO `manage` (`id`, `user_id`, `password`) VALUES
(1, 'katumata', '1111'),
(17, 'map', '1111'),
(18, 'masamiti', '025'),
(20, 'katumata', 'furusato');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `manage`
--
ALTER TABLE `manage`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `info`
--
ALTER TABLE `info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- テーブルの AUTO_INCREMENT `manage`
--
ALTER TABLE `manage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
