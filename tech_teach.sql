-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2016 at 07:48 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tech_teach`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `password`, `date`) VALUES
(1, 'admin@techteach.com', 'admin', '2015-12-10 00:00:00'),
(2, 'shalini@gmail.com', '438104', '2016-05-01 13:18:33'),
(3, 'sreeraj@gmail.com', '449145', '2016-05-02 05:40:24'),
(4, 'vishnua@gmail.com', '664422', '2016-05-02 07:57:55'),
(5, 'sajeev@gmail.com', '352987', '2016-05-02 09:47:21');

-- --------------------------------------------------------

--
-- Table structure for table `alert`
--

CREATE TABLE IF NOT EXISTS `alert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `to` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `valid` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `from` varchar(255) NOT NULL DEFAULT 'admin@techteach.com',
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `alert`
--

INSERT INTO `alert` (`id`, `department`, `type`, `to`, `subject`, `description`, `valid`, `status`, `from`, `date`) VALUES
(1, 33, 1, 'te', 'immediately contact an examination for each subject', 'students refreshment', '2016-05-05 00:00:00', 1, 'admin@techteach.com', '2016-05-01 13:27:01'),
(2, 33, 1, 'te', 'meeting', 'exams', '2016-05-05 00:00:00', 1, 'admin@techteach.com', '2016-05-02 05:39:36'),
(3, 33, 1, 'te', 'exam', 'exam', '2016-05-11 00:00:00', 1, 'admin@techteach.com', '2016-05-02 08:05:38'),
(4, 33, 1, 'te', 'exam', 'meet me', '2016-05-12 00:00:00', 1, 'admin@techteach.com', '2016-05-02 09:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `alert_to`
--

CREATE TABLE IF NOT EXISTS `alert_to` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alert` int(11) NOT NULL,
  `target` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE IF NOT EXISTS `assignment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` int(11) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `submission_date` date NOT NULL,
  `description` longtext,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`id`, `subject`, `topic`, `submission_date`, `description`, `date`) VALUES
(1, 3, 'ccc', '2016-05-12', ' ', '2016-05-02 09:58:28');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `edition` varchar(255) NOT NULL,
  `description` longtext,
  `section` int(11) NOT NULL,
  `noc` int(11) NOT NULL,
  `available_copies` int(11) NOT NULL DEFAULT '1',
  `image` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `name`, `author`, `edition`, `description`, `section`, `noc`, `available_copies`, `image`, `date`) VALUES
(1, 'cpp', 'sreejith', '1', '', 1, 3, 3, 'resize_1462160803.jpg', '2016-05-02 05:47:06'),
(2, 'mm', 'jeevan', '1', '', 1, 4, 4, 'resize_1462161016.jpg', '2016-05-02 05:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `book_section`
--

CREATE TABLE IF NOT EXISTS `book_section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section` varchar(255) NOT NULL,
  `description` longtext,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `section` (`section`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `book_section`
--

INSERT INTO `book_section` (`id`, `section`, `description`, `date`) VALUES
(1, 'computer science', 'none', '2016-05-02 05:45:01'),
(2, 'physics', '', '2016-05-02 05:45:12'),
(3, 'bba', '', '2016-05-02 05:45:20');

-- --------------------------------------------------------

--
-- Table structure for table `call`
--

CREATE TABLE IF NOT EXISTS `call` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `to` varchar(20) NOT NULL,
  `call_id` varchar(255) NOT NULL,
  `description` text,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `call`
--

INSERT INTO `call` (`id`, `owner`, `type`, `to`, `call_id`, `description`, `status`, `date`) VALUES
(1, 'lekha@gmail.com', 1, 'te', '0HbP7Er3TGt7JqR', '', 0, '2016-05-02 08:13:02'),
(2, 'lekha@gmail.com', 1, 'te', 'I7Z56No29YlniP7', 'bb', 0, '2016-05-02 08:17:08'),
(3, 'anjana@gmail.com', 1, 'te', 'Bm4WbCsCdFkw22q', '', 0, '2016-05-02 08:22:31'),
(4, 'anjana@gmail.com', 1, 'te', 'THwy2SukXpCERct', '', 0, '2016-05-02 08:23:17'),
(5, 'anjana@gmail.com', 1, 'te', 'nWWZCWouh0JFasQ', '', 0, '2016-05-02 08:24:19'),
(6, 'lekha@gmail.com', 1, 'te', 'CQh42arklCauq5Y', '', 0, '2016-05-02 08:25:17'),
(7, 'lekha@gmail.com', 1, 'te', 'gbKk2NiN9kTBzs8', '', 0, '2016-05-02 08:26:21'),
(8, 'lekha@gmail.com', 1, 'te', 'pHJetFDAh0FGbxf', '', 0, '2016-05-02 08:28:14'),
(9, 'lekha@gmail.com', 1, 'te', '4QzRCjDbrBPIkON', 'ddddd', 0, '2016-05-02 10:03:14'),
(10, 'lekha@gmail.com', 1, 'te', 'eo7B5EmS5JPRuXF', 'ddddd', 0, '2016-05-02 10:06:16'),
(11, 'lekha@gmail.com', 1, 'te', 'i25zRCoWDkUrY8J', 'ddddd', 0, '2016-05-02 10:10:11'),
(12, 'anjana@gmail.com', 1, 'te', 'Ru0hgcMc7I69aqC', 'cccccd', 0, '2016-05-02 10:15:47'),
(13, 'anjana@gmail.com', 1, 'te', 'yL7n3U8qOGh0mBr', '', 0, '2016-05-02 10:23:14');

-- --------------------------------------------------------

--
-- Table structure for table `call_to`
--

CREATE TABLE IF NOT EXISTS `call_to` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `call` int(11) NOT NULL,
  `target` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `did` int(11) NOT NULL,
  `batch` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=245 ;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `did`, `batch`, `date`) VALUES
(240, 33, '2014-2017', '2016-04-29 17:38:29'),
(241, 34, '2014-2017', '2016-04-29 18:13:11'),
(242, 33, '2015-2018', '2016-05-01 13:19:40'),
(243, 34, '2015-2018', '2016-05-01 13:19:52'),
(244, 33, '2016-2019', '2016-05-02 08:00:30');

-- --------------------------------------------------------

--
-- Table structure for table `class_subject`
--

CREATE TABLE IF NOT EXISTS `class_subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `tid` int(11) DEFAULT NULL,
  `year` varchar(255) NOT NULL,
  `sid` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `class_subject`
--

INSERT INTO `class_subject` (`id`, `cid`, `sem_id`, `tid`, `year`, `sid`, `date`) VALUES
(1, 214, 1, 99, '2016-2017', 1, '2016-05-01 21:33:41'),
(2, 214, 1, 90, '2016-2017', 2, '2016-05-01 21:34:21'),
(3, 214, 1, 89, '2016-2017', 3, '2016-05-01 21:34:47'),
(4, 214, 1, 91, '2016-2017', 7, '2016-05-01 21:35:06'),
(5, 214, 1, 93, '2016-2017', 6, '2016-05-01 21:36:24'),
(6, 216, 2, 100, '2017-2018', 8, '2016-05-02 06:11:19'),
(7, 214, 2, 89, '2015-2016', 4, '2016-05-02 06:12:32'),
(8, 218, 2, 97, '2018-2019', 5, '2016-05-02 09:55:32');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `comment` longtext NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `post_id`, `user_id`, `comment`, `date`) VALUES
(1, 1, 'kala@gmail.com', 'sprr\n', '2016-05-02 05:55:52'),
(2, 1, 'kala@gmail.com', 'sprr\n\n', '2016-05-02 05:55:53'),
(3, 1, 'prema@gmail.com', 'tnku\n', '2016-05-02 05:57:01'),
(4, 2, '13954004', 'nice\n', '2016-05-02 06:10:22'),
(5, 1, 'anuja@gmail.com', 'gud\n', '2016-05-02 08:20:32'),
(6, 4, '13954004', 'sprr\n', '2016-05-02 09:59:56'),
(7, 4, 'lekha@gmail.com', 'yyy\n', '2016-05-02 10:00:07');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `did` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `hod` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`did`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`did`, `name`, `year`, `hod`, `date`) VALUES
(33, 'bsc computer science', 3, 'lekha@gmail.com', '2016-05-01 13:21:26'),
(34, 'BBA', 3, 'rekha@gmail.com', '2016-05-01 13:21:37'),
(35, 'Mathematics', 3, NULL, '2016-04-30 08:10:46'),
(36, 'physics', 3, NULL, '2016-05-02 05:41:09'),
(37, 'science2', 3, NULL, '2016-05-02 07:59:10');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE IF NOT EXISTS `exam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` int(11) NOT NULL,
  `total` int(11) DEFAULT NULL,
  `series` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `subject`, `total`, `series`, `description`, `date`) VALUES
(1, 3, 100, ' First Series ', ' ', '2016-05-02 06:09:22'),
(2, 3, 100, ' Third Series ', ' ', '2016-05-02 09:57:46');

-- --------------------------------------------------------

--
-- Table structure for table `favourite_question`
--

CREATE TABLE IF NOT EXISTS `favourite_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin` varchar(255) NOT NULL,
  `question` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `favourite_question`
--

INSERT INTO `favourite_question` (`id`, `admin`, `question`, `date`) VALUES
(2, 'lekha@gmail.com', 6, '2016-05-02 10:02:18');

-- --------------------------------------------------------

--
-- Table structure for table `global_attendance_base`
--

CREATE TABLE IF NOT EXISTS `global_attendance_base` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `local_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `hour_id` int(11) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `teacher_id` varchar(255) NOT NULL,
  `taken_time` datetime NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `global_attendance_child`
--

CREATE TABLE IF NOT EXISTS `global_attendance_child` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attendance_id` int(11) NOT NULL,
  `student` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE IF NOT EXISTS `library` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`id`, `user_name`, `password`, `date`) VALUES
(1, 'library@techteach.com', '111', '2015-12-04 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `library_book`
--

CREATE TABLE IF NOT EXISTS `library_book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `copy_id` int(11) NOT NULL,
  `b_name` varchar(255) NOT NULL,
  `s_id` varchar(255) NOT NULL,
  `to_date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `library_book`
--

INSERT INTO `library_book` (`id`, `book_id`, `copy_id`, `b_name`, `s_id`, `to_date`, `status`, `date`) VALUES
(1, 2, 1, 'mm', 'prema@gmail.com', '2016-05-09', 1, '2016-05-02 05:51:47');

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

CREATE TABLE IF NOT EXISTS `mark` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `mark` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mark`
--

INSERT INTO `mark` (`id`, `exam_id`, `stud_id`, `mark`, `description`, `date`) VALUES
(1, 2, 13954001, 90, '', '2016-05-02 09:58:04');

-- --------------------------------------------------------

--
-- Table structure for table `mark_percentage`
--

CREATE TABLE IF NOT EXISTS `mark_percentage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) NOT NULL,
  `ref_id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `percentage` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE IF NOT EXISTS `parent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `st_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `mobile` varchar(20) NOT NULL,
  `l_no` varchar(20) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`id`, `st_id`, `name`, `designation`, `mobile`, `l_no`, `description`, `date`) VALUES
(1, 1, 'Varun Chandra', '', '9988990099', '', '', '2016-05-02 06:02:12'),
(2, 3, 'yy', '', '9988990099', '', '', '2016-05-02 09:57:16');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `te_id` varchar(255) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `message` longtext NOT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `delete` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `te_id`, `type`, `message`, `attachment`, `delete`, `date`) VALUES
(1, 'prema@gmail.com', 0, 'android prgrammng', '1462161241.mp4', 0, '2016-05-02 05:54:18'),
(2, 'prema@gmail.com', 0, 'java pgrmmng', '1462161406.PNG', 0, '2016-05-02 05:56:53'),
(3, '13954004', 0, 'good morning', NULL, 0, '2016-05-02 06:11:39'),
(4, 'lekha@gmail.com', 0, 'andro', '1462175959.MP4', 0, '2016-05-02 09:59:33'),
(5, '13954004', 0, 'haiii', NULL, 0, '2016-05-02 10:14:49'),
(6, '13954004', 0, 'haiii', '1462176987.jpg', 0, '2016-05-02 10:16:54'),
(7, '13954004', 0, 'gd mrng', '1462177084.jpg', 0, '2016-05-02 10:18:26'),
(8, 'anuja@gmail.com', 0, 'Jisha yude kolaprthakanmare  kandupidikuka', '1462341336.jpg', 0, '2016-05-04 07:56:46'),
(9, 'anuja@gmail.com', 0, 'Pics', '1462341471.jpg', 0, '2016-05-04 07:58:05');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin` varchar(255) NOT NULL,
  `subject` text NOT NULL,
  `replay` int(11) DEFAULT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `admin`, `subject`, `replay`, `date`) VALUES
(1, 'arun@gmail.com', 'what is c', NULL, '2016-05-02 05:48:08'),
(2, 'anjana@gmail.com', 'how do study cpp', NULL, '2016-05-02 05:49:58'),
(3, 'prema@gmail.com', 'what is 1log 1?', NULL, '2016-05-02 05:50:44'),
(4, 'kala@gmail.com', 'what s business', NULL, '2016-05-02 05:53:47'),
(5, '13954004', 'what is java', NULL, '2016-05-02 06:06:02'),
(6, 'lekha@gmail.com', 'wht is ....', 4, '2016-05-02 10:00:59'),
(7, '13954004', 'what isc++', NULL, '2016-05-02 10:11:18');

-- --------------------------------------------------------

--
-- Table structure for table `q_replay`
--

CREATE TABLE IF NOT EXISTS `q_replay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` int(11) NOT NULL,
  `r_admin` varchar(255) NOT NULL,
  `replay` longtext NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `q_replay`
--

INSERT INTO `q_replay` (`id`, `question`, `r_admin`, `replay`, `date`) VALUES
(1, 1, 'anuja@gmail.com', 'ist a prgrmmng language', '2016-05-02 05:49:12'),
(2, 1, 'kala@gmail.com', 'c is a programing language', '2016-05-02 05:54:49'),
(3, 5, 'lekha@gmail.com', 'its a prgmmg language', '2016-05-02 06:07:25'),
(4, 6, '13954004', 'mmmm', '2016-05-02 10:01:28');

-- --------------------------------------------------------

--
-- Table structure for table `replay_like`
--

CREATE TABLE IF NOT EXISTS `replay_like` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `q_replay` int(11) NOT NULL,
  `admin` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `replay_like`
--

INSERT INTO `replay_like` (`id`, `q_replay`, `admin`, `status`, `date`) VALUES
(1, -1, 'kala@gmail.com', 1, '2016-05-02 05:55:08'),
(2, 3, 'lekha@gmail.com', 1, '2016-05-02 10:01:35');

-- --------------------------------------------------------

--
-- Table structure for table `say_to_admin`
--

CREATE TABLE IF NOT EXISTS `say_to_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `priority` int(20) NOT NULL,
  `details` varchar(255) DEFAULT NULL,
  `class_dp` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` longtext,
  `attachment` text,
  `to` varchar(255) NOT NULL DEFAULT 'admin@techteach.com',
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `say_to_admin`
--

INSERT INTO `say_to_admin` (`id`, `fname`, `lname`, `user_id`, `priority`, `details`, `class_dp`, `image`, `subject`, `description`, `attachment`, `to`, `date`) VALUES
(1, 'arun', 'issac', 'arun@gmail.com', 3, '', '', '/teacher/images_/resize_1462160594.jpg', 'EXAM', ' NONE', '/sat2adminimg/1462160623.jpg', 'admin@techteach.com', '2016-05-02 05:43:47'),
(2, 'Amal', 'Raj RV', '13954004', 5, '', '3rd year  A (bsc computer science)', '/assets/images/defalut.jpg', 'mark', ' show mark', '/sat2adminimg/1462161651.jpg', 'admin@techteach.com', '2016-05-02 06:01:03');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `class` varchar(255) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `address` text,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL,
  PRIMARY KEY (`sid`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `mobile` (`mobile`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `user_name`, `fname`, `lname`, `class`, `sex`, `address`, `mobile`, `password`, `image`, `delete_status`, `date`) VALUES
(1, '13954001', 'Afeefa', 'F', '214', 'F', 'none', '9900998877', '111', NULL, 0, '2016-05-01 21:37:40'),
(2, '13954002', 'Akhila', 'A', '214', 'F', '', '7788990099', NULL, NULL, 0, '2016-05-01 21:38:23'),
(3, '13954003', 'Amal', 'A', '214', 'F', '', '8899000099', '111', NULL, 0, '2016-05-01 21:38:48'),
(4, '13954004', 'Amal', 'Raj RV', '214', 'M', '', '8899009988', '111', 'resize_1462161870.jpg', 0, '2016-05-01 21:39:13'),
(5, '113954005', 'Anjali', 'V', '214', 'F', '', '6567788990', NULL, NULL, 0, '2016-05-01 21:55:34'),
(6, '13954006', 'Anjumol', 'S', '214', 'F', '', '8877668999', NULL, NULL, 0, '2016-05-01 21:56:13'),
(7, '13954007', 'Anju', 'P', '214', 'F', '', '9088776655', NULL, NULL, 0, '2016-05-01 21:56:43'),
(8, '13954008', 'Archana', 'B', '214', 'F', '', '9800998877', NULL, NULL, 0, '2016-05-01 21:57:11'),
(9, '13954009', 'Arsha', 'Sasi', '214', 'F', 'hhh', '9800000099', NULL, NULL, 0, '2016-05-01 21:57:49'),
(10, '13954010', 'Arsha ', 'J', '214', 'F', '', '9898009988', NULL, NULL, 0, '2016-05-01 21:58:21'),
(11, '13954011', 'Aruli', 'S', '214', 'F', '', '7899009988', NULL, NULL, 0, '2016-05-01 21:58:53'),
(12, '13954012', 'Arun', 'V', '214', 'M', '', '9800998870', '111', NULL, 0, '2016-05-01 21:59:25'),
(13, '13954013', 'Arunima', 'Dev', '214', 'F', '', '7866889900', NULL, NULL, 0, '2016-05-01 22:00:07'),
(14, '13954014', 'Araya', 'Sasi', '214', 'F', '', '9888889900', NULL, NULL, 0, '2016-05-01 22:00:46'),
(15, '13954015', 'Aryajith', 'S', '214', 'F', '', '9588990000', '111', NULL, 0, '2016-05-01 22:01:12'),
(16, '13954016', 'Bibin B', 'Chandran', '214', 'F', '\n', '9800998909', NULL, NULL, 0, '2016-05-01 22:03:41'),
(17, '13954017', 'Darasana', 'P', '214', 'F', '', '8899098766', NULL, NULL, 0, '2016-05-01 22:04:29'),
(18, '13954018', 'Dhanya', 'K', '214', 'F', '', '9087112244', NULL, NULL, 0, '2016-05-01 22:05:40'),
(19, '13954019', 'Fasnas', 'A', '214', 'F', '', '8766775544', NULL, NULL, 0, '2016-05-01 22:06:24'),
(20, '13954020', 'Febin', 'Thomas', '214', 'M', '', '980099112255', NULL, NULL, 0, '2016-05-01 22:07:11'),
(21, '1122334455', 'Arun', 'D', '214', 'M', '', '9087890967', NULL, NULL, 0, '2016-05-02 09:56:27');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `sub_name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`sub_id`),
  UNIQUE KEY `sub_name` (`sub_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_id`, `department_id`, `sub_name`, `description`, `date`) VALUES
(1, 33, 'humanities 2', ' humanities 2', '2016-05-01 21:24:47'),
(2, 33, 'internet working', 'internet working', '2016-05-01 21:25:12'),
(3, 33, 'web programming', 'web programming', '2016-05-01 21:25:29'),
(4, 33, 'programming lab 5', 'wp lab', '2016-05-01 21:25:59'),
(5, 33, 'Linux lab', 'Linux lab', '2016-05-01 21:26:12'),
(6, 33, 'strategic management', 'SM', '2016-05-01 21:26:34'),
(7, 33, 'artificial intelligence', 'artificial intelligence', '2016-05-01 21:26:56'),
(8, 33, 'new java', ' ', '2016-05-02 06:10:39'),
(9, 33, 'new', ' ', '2016-05-02 09:54:23');

-- --------------------------------------------------------

--
-- Table structure for table `sub_class`
--

CREATE TABLE IF NOT EXISTS `sub_class` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=219 ;

--
-- Dumping data for table `sub_class`
--

INSERT INTO `sub_class` (`class_id`, `cid`, `division`, `date`) VALUES
(214, '240', 'A', '2016-04-29 17:38:29'),
(215, '241', 'A', '2016-04-29 18:13:11'),
(216, '242', 'A', '2016-05-01 13:19:40'),
(217, '243', 'A', '2016-05-01 13:19:52'),
(218, '244', 'A', '2016-05-02 08:00:30');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `sex` varchar(10) NOT NULL,
  `address` text,
  `password` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) NOT NULL,
  `department` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `code` int(6) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `mobile` (`mobile`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=103 ;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `user_name`, `fname`, `lname`, `sex`, `address`, `password`, `mobile`, `department`, `class_id`, `code`, `image`, `delete_status`, `date`) VALUES
(89, 'lekha@gmail.com', 'Lekha', 'Mohan', 'F', 'kayamkulam', 'lekha', '9961972844', 33, 214, 738003, 'resize_1462130004.jpg', 0, '2016-04-29 18:11:51'),
(90, 'Anuja@gmail.com', 'Anuja', 'Mohan', 'F', 'konni', 'anuja', '9567070617', 33, 216, 694882, 'resize_1462130116.jpg', 0, '2016-04-29 18:14:16'),
(91, 'anjana@gmail.com', 'Anjana', 'VS', 'F', 'Edathitta', 'anjana', '9961892588', 33, 0, 889038, 'resize_1462130149.jpg', 0, '2016-04-29 18:15:37'),
(92, 'lekshmi@gmail.com', 'Lekshmi', 'Mohan', 'F', 'Adoor', 'lekshmi', '9567070613', 33, 0, 308135, 'resize_1462130064.jpg', 0, '2016-04-30 08:10:18'),
(93, 'kala@gmail.com', 'Kala', 'K', 'F', 'Adoor', 'kala', '9567010612', 34, 215, 191873, 'resize_1462130578.jpg', 0, '2016-04-30 08:12:50'),
(94, 'anjali@gmail.com', 'Anjali', 'A', 'F', 'Chavara', 'anjali', '95670987616', 34, 0, 876678, 'resize_1462130304.jpg', 0, '2016-04-30 08:13:47'),
(95, 'rekha@gmail.com', 'Rekha', 'R', 'F', 'changanur', 'rekha', '9809875677', 34, 217, 848059, 'resize_1462130406.jpg', 0, '2016-04-30 08:15:32'),
(96, 'anija@gmail.com', 'Anija', 'B', 'F', 'Kollam', 'anija', '9087898755', 34, 0, 412643, 'resize_1462130329.jpg', 0, '2016-04-30 08:16:22'),
(97, 'prema@gmail.com', 'Prema', 'K', 'F', 'kayamkulam', 'prema', '9567987345', 35, 0, 921255, 'resize_1462130263.jpg', 0, '2016-04-30 08:17:09'),
(98, 'remya@gmail.com', 'Remya', 'V', 'F', 'none', NULL, '7560848735', 33, 0, 670877, NULL, 0, '2016-05-01 13:17:55'),
(99, 'ambili@gmail.com', 'Ambili', 'M', 'F', 'miss', 'ambili', '8899776688', 34, 0, 433407, 'resize_1462131168.jpg', 0, '2016-05-01 21:28:38'),
(100, 'arun@gmail.com', 'arun', 'issac', 'M', '', 'ARUN', '9387858811', 33, 0, 0, 'resize_1462160594.jpg', 0, '2016-05-02 05:37:55'),
(101, 'vishnu@gmail.com', 'vishnu', 'u', 'M', '', NULL, '9045643219', 33, 0, 241531, NULL, 0, '2016-05-02 07:56:42'),
(102, 'sreejith@gmail.com', 'sreejith', 'j', 'M', '', NULL, '8547272811', 36, 0, 560821, NULL, 0, '2016-05-02 09:46:37');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
