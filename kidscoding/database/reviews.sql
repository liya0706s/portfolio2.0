-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2024 年 01 月 16 日 15:21
-- 伺服器版本： 10.3.38-MariaDB-0ubuntu0.20.04.1
-- PHP 版本： 7.4.3-4ubuntu2.19

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
-- 資料表結構 `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `subti` text NOT NULL,
  `review` text NOT NULL,
  `img` text NOT NULL,
  `sh` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `reviews`
--

INSERT INTO `reviews` (`id`, `title`, `subti`, `review`, `img`, `sh`) VALUES
(4, '學習程式語言還可以讓我更聰明，因為我要思考怎麼讓我的遊戲或故事運作', '我學到了邏輯和問題解決的能力，這對我以後的學習也很有幫助。', '我最喜歡的部分是創造我的角色，我可以自己選顏色、形狀，還可以加上可愛的表情和動作。然後，我可以讓我的角色跳來跳去，或者做一些有趣的動作。有一次，我做了一個小貓咪，然後讓它跳上跳下，好像在跳舞一樣！', 'slide5.png', 0),
(5, 'Scratch結合Microbit的學習體驗非常豐富', '不僅學到了程式設計，還學到了物理學知識', '創造、合作又開心的學習，操作和想像力，真的好玩又有趣！', '03B08.png', 0);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
