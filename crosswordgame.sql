-- phpMyAdmin SQL Dump
-- version 4.4.15.8
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 31, 2016 at 08:16 AM
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
(1, 'Hãy cho biết bộ sản phẩm Microsoft Office là của hãng nào? Và phải trả lời thật nhanh.', 'Microsoft', 0, 6000, '2016-10-31 15:13:01.760600', '2016-10-31 16:53:01.760600'),
(2, 'Cho biết số lớn nhất trong ba số sau -100, -12343, -9', '-9', 1, 6000, '2016-10-26 23:01:27.625700', '2016-10-26 23:01:57.625700'),
(3, 'Hãy cho biết ai đã nói "Hãy cứ ngây ngô, hãy cứ dại khờ"?', 'Steven Jobs', 2, 6000, '2016-10-26 23:00:40.066000', '2016-10-26 23:01:10.066000');

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
('team1', 'team', 'user'),
('team2', 'team', 'user'),
('team3', 'team', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users_answers`
--

CREATE TABLE IF NOT EXISTS `users_answers` (
  `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `time_answer` datetime(6) NOT NULL,
  `answer` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rec_no` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  MODIFY `rec_no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
