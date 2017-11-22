-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2017 at 06:15 PM
-- Server version: 5.7.14
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

CREATE TABLE `questions` (
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
(1, 'Hội trường diễn ra chung kết Olympic Kinh tế học là hội trường gì?', '700', 0, 30, '2017-09-02 10:07:04.027400', '2017-09-02 10:07:34.027400'),
(2, 'Đây là một trong 7 kì quan của học viện tài chính?', 'Vườntìnhyêu', 0, 30, '2017-11-23 00:39:15.991300', '2017-11-23 00:39:45.991300'),
(3, 'Tên bộ trưởng Bộ Tài chính đầu tiên của nước ta?', 'LêVănHiến', 0, 30, '2017-09-01 18:27:21.496900', '2017-09-01 18:27:51.496900'),
(4, 'Tên của con vật biểu tượng cho toà nhà chính HVTC', 'ĐạiBàng', 0, 30, '2017-09-02 11:39:48.258100', '2017-09-02 11:40:18.258100'),
(5, 'Hãy cho biết tỷ lệ phần trăm sinh viên tốt nghiệp loại xuất sắc trong tổng số toàn bộ sinh viên CQ48 (Làm tròn tới hai chữ số thập phân)?\r\n', '2.32%', 0, 60, '2016-11-24 21:40:51.667300', '2016-11-24 21:41:51.667300'),
(6, 'Hãy cho biết địa phương nào có nhiều sinh viên CQ48 sinh ra nhất?\r\n', 'Tỉnh Nghệ An', 0, 60, '2017-09-02 09:47:38.205700', '2017-09-02 09:48:38.205700'),
(7, 'Chí Phèo gặp thị nở lần đầu ở đâu?', 'Vườnchuối', 0, 30, '2017-09-01 16:26:13.184900', '2017-09-01 16:26:43.184900'),
(8, 'Trong Word 2010, Hãy cho biết để chèn một “sectionbreak” ta cần phải sử dụng tab nào trên thanh ribbon?', 'Page layout', 0, 30, '2017-09-02 09:50:02.696000', '2017-09-02 09:50:32.696000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
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
('mc', 'mc', 'mc', 'MC'),
('team1', 'team', 'user', 'Đội 1'),
('team2', 'team', 'user', 'Đội 2'),
('team3', 'team', 'user', 'Đội 3'),
('team4', 'team', 'user', 'Đội 4');

-- --------------------------------------------------------

--
-- Table structure for table `users_answers`
--

CREATE TABLE `users_answers` (
  `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `time_answer` datetime(6) NOT NULL,
  `answer` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rec_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_answers`
--

INSERT INTO `users_answers` (`user_name`, `time_answer`, `answer`, `rec_no`) VALUES
('team2', '2017-11-23 00:38:11.542000', 'Chào bạn', 1),
('team3', '2017-11-23 00:39:23.649800', 'Vườn tình yêu', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_message`
--

CREATE TABLE `user_message` (
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'PING',
  `time` datetime(6) NOT NULL,
  `isdelivery` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_message`
--

INSERT INTO `user_message` (`user_name`, `message`, `time`, `isdelivery`) VALUES
('team1', 'PING', '2017-11-23 00:37:08.592200', 1),
('team2', 'PING', '2017-11-23 00:38:00.957300', 1),
('team3', 'PING', '2017-11-23 00:38:34.932100', 1);

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
-- Indexes for table `user_message`
--
ALTER TABLE `user_message`
  ADD PRIMARY KEY (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users_answers`
--
ALTER TABLE `users_answers`
  MODIFY `rec_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
