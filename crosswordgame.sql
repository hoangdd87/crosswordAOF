-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2016 at 05:50 PM
-- Server version: 5.6.31
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crosswordgame`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `question_id` int(4) NOT NULL DEFAULT '0',
  `question` text COLLATE utf8_unicode_ci NOT NULL,
  `correct_answer` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `answer_time` int(5) NOT NULL DEFAULT '30',
  `time_begin` datetime(6) NOT NULL,
  `time_end` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `question`, `correct_answer`, `status`, `answer_time`, `time_begin`, `time_end`) VALUES
  (1, 'Hãy cho biết bộ sản phẩm Microsoft Office là của hãng nào? Và phải trả lời thật nhanh.', 'Microsoft', 0, 30, '2016-11-07 22:46:33.131700', '2016-11-07 22:47:03.131700'),
  (2, 'Cho biết số lớn nhất trong ba số sau -100, -12343, -9', '-9', 0, 60, '2016-11-07 22:55:38.957000', '2016-11-07 22:56:38.957000'),
  (3, 'Hãy cho biết ai đã nói "Hãy cứ ngây ngô, hãy cứ dại khờ"?', 'Steven Jobs', 0, 60, '2016-11-07 22:47:52.745800', '2016-11-07 22:48:52.745800');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_name`, `password`, `role`) VALUES
  ('admin', 'admin123', 'admin'),
  ('team1', 'team', 'user'),
  ('team2', 'team', 'user'),
  ('team3', 'team', 'user'),
  ('team4', 'team', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users_answers`
--

CREATE TABLE IF NOT EXISTS `users_answers` (
  `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `time_answer` datetime(6) NOT NULL,
  `answer` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rec_no` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_answers`
--

INSERT INTO `users_answers` (`user_name`, `time_answer`, `answer`, `rec_no`) VALUES
  ('team1', '2016-11-03 19:17:45.576100', 'hoa', 48),
  ('team1', '2016-11-03 19:19:44.224500', 'Hello', 49),
  ('team1', '2016-11-03 19:21:31.061300', 'VietNam', 50),
  ('team1', '2016-11-03 19:21:44.410800', 'q2', 51),
  ('team3', '2016-11-03 19:21:52.103200', 't3', 52),
  ('team1', '2016-11-03 19:22:00.630900', 'q22', 53),
  ('team4', '2016-11-03 19:22:10.965200', '4', 54),
  ('team4', '2016-11-03 19:26:04.700100', 'Hello', 55),
  ('team1', '2016-11-03 21:04:06.027700', 'Question3', 56),
  ('team2', '2016-11-03 21:04:14.217700', 'No', 57),
  ('team1', '2016-11-03 21:04:21.496600', 'Yes', 58),
  ('team1', '2016-11-03 21:04:24.949400', 'Baby', 59),
  ('team4', '2016-11-03 21:04:33.478300', 'GoGoGo', 60),
  ('team4', '2016-11-03 21:04:42.028500', 'Now or nerver', 61),
  ('team1', '2016-11-03 21:06:54.700100', 'Tra loi', 62),
  ('team1', '2016-11-03 23:27:37.652900', 'Ok', 63),
  ('team1', '2016-11-03 23:27:41.938900', 'Nham', 64),
  ('team2', '2016-11-03 23:27:48.978300', 'yes', 65),
  ('team2', '2016-11-03 23:27:52.639500', 'lan2', 66),
  ('team3', '2016-11-04 10:21:53.173500', 'Apple', 67),
  ('team2', '2016-11-04 10:22:03.126600', 'mi', 68),
  ('team2', '2016-11-04 10:22:12.477600', 'Microsoft', 69),
  ('team1', '2016-11-05 22:57:57.246300', 'Mi', 70),
  ('team1', '2016-11-05 22:58:03.391200', 'ád', 71),
  ('team1', '2016-11-05 22:58:44.693500', 'Hà', 72),
  ('team1', '2016-11-05 22:58:56.025900', 'phạm xuân Bách', 73),
  ('team1', '2016-11-05 22:59:13.060900', 'đào đức cường', 74),
  ('team2', '2016-11-05 23:00:22.699700', 'Apple', 75),
  ('team4', '2016-11-05 23:00:32.949400', 'Mỉcosoft', 76),
  ('team4', '2016-11-07 22:45:00.681300', 'hj', 77),
  ('team4', '2016-11-07 22:45:30.939400', '-9', 78),
  ('team4', '2016-11-07 22:45:37.381700', 'Đào Đức Hoàng', 79),
  ('team3', '2016-11-07 22:45:57.193500', 'Hello', 80);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_name`);

--
-- Indexes for table `users_answers`
--
ALTER TABLE `users_answers`
  ADD PRIMARY KEY (`rec_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users_answers`
--
ALTER TABLE `users_answers`
  MODIFY `rec_no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=81;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
