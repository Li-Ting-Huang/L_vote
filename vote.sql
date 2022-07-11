-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022 年 07 月 11 日 03:58
-- 伺服器版本： 10.4.24-MariaDB
-- PHP 版本： 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `vote`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admins`
--

CREATE TABLE `admins` (
  `id` int(11) UNSIGNED NOT NULL,
  `acc` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pw` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `logs`
--

CREATE TABLE `logs` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `subject_id` int(11) UNSIGNED NOT NULL,
  `option_id` int(11) UNSIGNED NOT NULL,
  `vote_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `subject_id`, `option_id`, `vote_time`) VALUES
(1, 0, 8, 37, '2022-06-17 08:15:29'),
(2, 0, 8, 39, '2022-06-17 08:15:30'),
(3, 0, 1, 3, '2022-06-17 08:16:39'),
(4, 0, 8, 39, '2022-06-17 08:35:08'),
(5, 0, 8, 40, '2022-06-17 08:35:08'),
(6, 0, 8, 38, '2022-06-17 08:35:20'),
(7, 0, 8, 39, '2022-06-17 08:35:20'),
(8, 0, 8, 39, '2022-06-17 08:35:27'),
(9, 0, 8, 40, '2022-06-17 08:35:27'),
(10, 0, 8, 38, '2022-06-20 02:37:05'),
(11, 0, 7, 36, '2022-06-20 02:47:49'),
(12, 0, 7, 36, '2022-06-20 02:47:57'),
(13, 0, 2, 8, '2022-06-20 02:50:55'),
(14, 0, 2, 6, '2022-06-20 02:51:20'),
(15, 0, 1, 1, '2022-07-07 04:50:29'),
(16, 0, 6, 35, '2022-07-07 04:53:23'),
(17, 0, 6, 35, '2022-07-07 04:56:32'),
(18, 0, 6, 35, '2022-07-07 04:56:35'),
(19, 0, 1, 1, '2022-07-07 04:56:53'),
(20, 0, 1, 1, '2022-07-07 04:56:55'),
(21, 123, 9, 41, '2022-07-09 16:52:25'),
(22, 123, 9, 42, '2022-07-09 16:52:28'),
(23, 123, 1, 1, '2022-07-10 04:15:59'),
(24, 123, 1, 1, '2022-07-10 04:36:06'),
(25, 123, 1, 1, '2022-07-10 04:36:11'),
(26, 123, 1, 1, '2022-07-10 06:42:47'),
(27, 123, 2, 6, '2022-07-10 06:42:53'),
(28, 0, 1, 1, '2022-07-10 08:32:41'),
(29, 0, 1, 2, '2022-07-10 09:19:41');

-- --------------------------------------------------------

--
-- 資料表結構 `options`
--

CREATE TABLE `options` (
  `id` int(11) UNSIGNED NOT NULL,
  `option` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` int(11) NOT NULL,
  `total` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `options`
--

INSERT INTO `options` (`id`, `option`, `subject_id`, `total`) VALUES
(1, '吃便當', 1, 8),
(2, '吃麥當勞', 1, 1),
(3, '吃肯德雞', 1, 1),
(4, '吃豬腳飯', 1, 0),
(5, '美而美', 2, 0),
(6, '7-11', 2, 2),
(7, 'qBurger', 2, 0),
(8, '永和豆漿', 2, 1),
(9, '全家', 2, 0),
(10, '穿西裝', 3, 0),
(11, '穿洋裝', 3, 0),
(12, '穿吊嘎', 3, 0),
(13, '穿制服', 3, 0),
(35, 'dddddddd', 6, 3),
(36, 'EEEEEEE', 7, 2),
(37, '陳X中', 8, 1),
(38, '趙X中', 8, 2),
(39, '李X中', 8, 4),
(40, '王X中', 8, 2),
(41, '好', 9, 1),
(42, '不好', 9, 1),
(43, 'line pay', 10, 0),
(44, 'apple pay', 10, 0),
(45, '街口支付', 10, 0),
(46, '台灣pay', 10, 0),
(47, 'google pay', 10, 0),
(48, '拍錢包', 10, 0),
(49, '支付寶', 10, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) UNSIGNED NOT NULL,
  `subject` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` int(11) NOT NULL,
  `multiple` tinyint(1) NOT NULL DEFAULT 0,
  `multi_limit` tinyint(2) NOT NULL DEFAULT 1,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `total` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `subjects`
--

INSERT INTO `subjects` (`id`, `subject`, `type_id`, `multiple`, `multi_limit`, `start`, `end`, `total`) VALUES
(1, '今天晚餐吃什麼?', 2, 0, 1, '2022-06-13', '2022-06-23', 30),
(2, '明天早餐吃飯', 1, 0, 1, '2022-06-13', '2022-06-21', 3),
(3, '明天上課穿什麼?', 1, 1, 1, '2022-06-13', '1900-01-19', 10),
(6, 'aaaaaaa', 3, 0, 1, '2022-06-17', '2022-06-27', 3),
(7, 'CCCC', 3, 1, 1, '2022-06-17', '2022-06-16', 2),
(8, '台北市長候選,你會選誰', 1, 1, 1, '2022-06-17', '2022-06-28', 5),
(9, '今天學分頁好不好', 4, 0, 1, '2022-06-20', '2022-06-30', 2),
(10, '你平常喜歡使用那一種無接觸交易方式付款', 4, 1, 1, '2022-06-20', '2022-06-30', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `types`
--

CREATE TABLE `types` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `types`
--

INSERT INTO `types` (`id`, `name`) VALUES
(1, '政治'),
(2, '生活'),
(3, '經濟'),
(4, '科技');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `acc` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pw` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `acc`, `pw`, `birthday`, `email`) VALUES
(1, '1', 'c4ca4238a0b92382', '2022-07-10', '1@gmail.com'),
(2, '2', 'c81e728d9d4c2f63', '2022-07-10', '2'),
(3, '3', 'eccbc87e4b5ce2fe', '2022-07-11', '3@gmail.com');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
