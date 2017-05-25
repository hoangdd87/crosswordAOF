-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2017 at 05:02 PM
-- Server version: 5.6.31
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crosswordaof`
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
(1, 'Hội trường diễn ra chung kết Olympic Kinh tế học là hội trường gì?', '700', 0, 30, '2017-05-25 23:40:32.727100', '2017-05-25 23:41:02.727100'),
(2, 'Đây là một trong 7 kì quan của học viện tài chính?', 'Vườntìnhyêu', 1, 30, '2017-05-25 18:32:32.049000', '2017-05-25 18:33:02.049000'),
(3, 'Tên bộ trưởng Bộ Tài chính đầu tiên của nước ta?', 'LêVănHiến', 2, 30, '2017-05-25 23:56:30.470600', '2017-05-25 23:57:00.470600'),
(4, 'Tên của con vật biểu tượng cho toà nhà chính HVTC', 'ĐạiBàng', 0, 30, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(5, 'Hãy cho biết tỷ lệ phần trăm sinh viên tốt nghiệp loại xuất sắc trong tổng số toàn bộ sinh viên CQ48 (Làm tròn tới hai chữ số thập phân)?\r\n', '2.32%', 0, 60, '2016-11-24 21:40:51.667300', '2016-11-24 21:41:51.667300'),
(6, 'Hãy cho biết địa phương nào có nhiều sinh viên CQ48 sinh ra nhất?\r\n', 'Tỉnh Nghệ An', 2, 60, '2017-05-25 18:35:06.821800', '2017-05-25 18:36:06.821800'),
(7, 'Chí Phèo gặp thị nở lần đầu ở đâu?', 'Vườnchuối', 0, 30, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(8, 'Trong Word 2010, Hãy cho biết để chèn một “sectionbreak” ta cần phải sử dụng tab nào trên thanh ribbon?', 'Page layout', 0, 30, '2017-05-25 18:31:22.163900', '2017-05-25 18:31:52.163900');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `teamname` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_name`, `password`, `role`, `teamname`) VALUES
('admin', 'admin123', 'admin', 'admin'),
('team1', 'team', 'user', 'Đội 1'),
('team2', 'team', 'user', 'Đội 2'),
('team3', 'team', 'user', 'Đội 3'),
('team4', 'team', 'user', 'Đội 4');

-- --------------------------------------------------------

--
-- Table structure for table `users_answers`
--

CREATE TABLE IF NOT EXISTS `users_answers` (
  `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `time_answer` datetime(6) NOT NULL,
  `answer` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rec_no` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_answers`
--

INSERT INTO `users_answers` (`user_name`, `time_answer`, `answer`, `rec_no`) VALUES
('team1', '2017-05-25 23:55:26.358300', 'Tỉnh Nghệ An', 9),
('team1', '2017-05-25 23:56:41.516200', 'Lê Văn Hiến Lê Văn Hiến', 10);

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
  MODIFY `rec_no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
