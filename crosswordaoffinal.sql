-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2016 at 02:53 PM
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
(1, 'Trong Word 2010, Hãy cho biết để chèn một “section break” ta cần phải sử dụng tab nào trên thanh ribbon?', 'Page layout', 0, 30, '2016-11-24 21:52:58.121300', '2016-11-24 21:53:28.121300'),
(2, 'Hãy cho biết giá trị ngày hôm nay (25/11/2016) khi được định dạng dưới dạng số trong Excel là bao nhiêu ?\r\n', '42699', 0, 30, '2016-11-24 21:47:41.342500', '2016-11-24 21:48:11.342500'),
(3, 'Trong PowerPoint 2010, để thêm một comment lên một slide bất kì ta cần chọn tab … ?\r\n', 'Review', 0, 30, '2016-11-24 21:38:31.213300', '2016-11-24 21:39:01.213300'),
(4, 'Cho biết hai kí tự đầu tiên của lớp chỉ mã chuyên ngành, và chuyên ngành Tài chính doanh nghiệp mã là 11. Hãy cho biết có bao nhiêu sinh viên chuyên ngành Tài chính doanh nghiệp trong bộ dữ liệu trên?\r\n', '685', 0, 60, '2016-11-24 21:48:50.168200', '2016-11-24 21:49:50.168200'),
(5, 'Hãy cho biết tỷ lệ phần trăm sinh viên tốt nghiệp loại xuất sắc trong tổng số toàn bộ sinh viên CQ48 (Làm tròn tới hai chữ số thập phân)?\r\n', '2.32%', 0, 60, '2016-11-24 21:40:51.667300', '2016-11-24 21:41:51.667300'),
(6, 'Hãy cho biết địa phương nào có nhiều sinh viên CQ48 sinh ra nhất?\r\n', 'Tỉnh Nghệ An', 0, 60, '2016-11-24 21:45:42.778100', '2016-11-24 21:46:42.778100');

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
('Age Of Future', 'team', 'user'),
('Android', 'team', 'user'),
('Anonymous', 'team', 'user'),
('The Officers', 'team', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users_answers`
--

CREATE TABLE IF NOT EXISTS `users_answers` (
  `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `time_answer` datetime(6) NOT NULL,
  `answer` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rec_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  MODIFY `rec_no` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
