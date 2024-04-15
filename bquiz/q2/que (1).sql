-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2024 年 04 月 15 日 08:20
-- 伺服器版本： 10.3.39-MariaDB-0ubuntu0.20.04.2
-- PHP 版本： 7.4.3-4ubuntu2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `s1120409`
--

-- --------------------------------------------------------

--
-- 資料表結構 `que`
--

CREATE TABLE `que` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text NOT NULL,
  `count` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) NOT NULL,
  `sh` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `que`
--

INSERT INTO `que` (`id`, `text`, `count`, `subject_id`, `sh`) VALUES
(1, '你最想喝的飲料?', 1, 0, 1),
(2, 'COCO', 0, 1, 1),
(3, '迷客夏', 0, 1, 1),
(4, '清心', 1, 1, 1),
(5, '得正', 0, 1, 1),
(6, '今天午餐吃什麼?', 4, 0, 1),
(7, '梁社漢排骨', 2, 6, 1),
(8, '麥當勞', 0, 6, 1),
(9, '吳興街水餃', 1, 6, 1),
(10, '阜杭豆漿', 0, 6, 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `que`
--
ALTER TABLE `que`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `que`
--
ALTER TABLE `que`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
