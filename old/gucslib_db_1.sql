-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 12, 2016 at 02:05 PM
-- Server version: 5.6.30-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gucslib_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `almirahs`
--

CREATE TABLE IF NOT EXISTS `almirahs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(5) NOT NULL,
  `almirah_no` int(11) NOT NULL,
  `shelf_no` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `almirahs`
--

INSERT INTO `almirahs` (`id`, `category`, `almirah_no`, `shelf_no`) VALUES
(1, 'DM', 1, 1),
(2, 'DM', 2, 1),
(3, 'DM', 1, 2),
(4, 'DM', 2, 3),
(6, 'DM', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `books_info`
--

CREATE TABLE IF NOT EXISTS `books_info` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `accession_no` varchar(15) NOT NULL,
  `title` varchar(255) NOT NULL,
  `book_cat_id` varchar(5) NOT NULL,
  `isbn_10` int(10) NOT NULL,
  `isbn_13` int(13) NOT NULL,
  `authors` text NOT NULL,
  `edition` int(11) NOT NULL,
  `yopub` date NOT NULL,
  `total_pages` int(11) NOT NULL,
  `purchase_date` date NOT NULL,
  `entry_date` date NOT NULL,
  `price` float NOT NULL,
  `pub_code` varchar(5) NOT NULL,
  `shelf_no` int(11) NOT NULL,
  `attachments` varchar(255) NOT NULL,
  `entry_emp_id` varchar(255) NOT NULL,
  `book_status` varchar(15) NOT NULL,
  `book_type` varchar(10) NOT NULL,
  PRIMARY KEY (`book_id`),
  UNIQUE KEY `accession_no` (`accession_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `books_info`
--

INSERT INTO `books_info` (`book_id`, `accession_no`, `title`, `book_cat_id`, `isbn_10`, `isbn_13`, `authors`, `edition`, `yopub`, `total_pages`, `purchase_date`, `entry_date`, `price`, `pub_code`, `shelf_no`, `attachments`, `entry_emp_id`, `book_status`, `book_type`) VALUES
(1, '1', 'Computer Networks Programming in C', 'CN', 1, 1, 'Andrew S Tanenbaum', 1, '0000-00-00', 342, '2016-08-08', '0000-00-00', 350, 'PHI', 1, 'None', '1', 'Available', 'Text Book');

-- --------------------------------------------------------

--
-- Table structure for table `book_categories`
--

CREATE TABLE IF NOT EXISTS `book_categories` (
  `book_cat_id` varchar(5) NOT NULL,
  `book_cat_name` varchar(255) NOT NULL,
  PRIMARY KEY (`book_cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_categories`
--

INSERT INTO `book_categories` (`book_cat_id`, `book_cat_name`) VALUES
('CN', 'Computer Networks'),
('DM ', 'Data Mining'),
('IP', 'Image Processing');

-- --------------------------------------------------------

--
-- Table structure for table `book_circulation`
--

CREATE TABLE IF NOT EXISTS `book_circulation` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `mem_id` varchar(10) NOT NULL,
  `book_accession_no` varchar(50) NOT NULL,
  `book_acc_id` varchar(15) NOT NULL,
  `issue_date` date NOT NULL,
  `exp_return_date` date NOT NULL,
  `return_date` date NOT NULL,
  `issue_emp_no` varchar(11) NOT NULL,
  `return_emp_no` varchar(11) NOT NULL,
  `fine_amt` float NOT NULL,
  `status` varchar(10) NOT NULL,
  `fine_status` varchar(10) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `book_circulation`
--

INSERT INTO `book_circulation` (`c_id`, `mem_id`, `book_accession_no`, `book_acc_id`, `issue_date`, `exp_return_date`, `return_date`, `issue_emp_no`, `return_emp_no`, `fine_amt`, `status`, `fine_status`) VALUES
(1, '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `book_status`
--

CREATE TABLE IF NOT EXISTS `book_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_status` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `book_status`
--

INSERT INTO `book_status` (`id`, `book_status`) VALUES
(1, 'Available'),
(2, 'Issued');

-- --------------------------------------------------------

--
-- Table structure for table `book_types`
--

CREATE TABLE IF NOT EXISTS `book_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_type` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `book_types`
--

INSERT INTO `book_types` (`id`, `book_type`) VALUES
(1, 'Text Book'),
(2, 'Reference Book'),
(3, 'Magazine'),
(4, 'Novel');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ccode` varchar(10) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `cduration` int(11) NOT NULL,
  `cintake` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `ccode`, `cname`, `cduration`, `cintake`) VALUES
(3, 'MSC-CS', 'MSc Computer Science', 2, 30),
(4, 'MSC-IT', 'MSC Information Technology', 2, 20);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `ecode` varchar(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL DEFAULT 'ASSAM',
  `country` varchar(30) NOT NULL DEFAULT 'INDIA',
  `pin` int(6) NOT NULL,
  `landline` int(10) NOT NULL,
  `mobile` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `blood_group` varchar(5) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `job_type` varchar(15) NOT NULL,
  `photo` blob NOT NULL,
  `dob` date NOT NULL,
  `doj` date NOT NULL,
  `job_status` varchar(15) NOT NULL,
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`eid`, `ecode`, `fname`, `mname`, `lname`, `address`, `city`, `state`, `country`, `pin`, `landline`, `mobile`, `email`, `blood_group`, `designation`, `job_type`, `photo`, `dob`, `doj`, `job_status`) VALUES
(1, '1', 'Mon', 'Jyoti', 'Das', 'K.B Road', 'NLP', 'Assam', 'India', 787001, 88, 2147483647, 'monjyoti.das@gmail.com', 'O +ve', 'RS', 'contractual', 0x3131, '1988-10-20', '2016-08-01', 'running');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `mem_id` int(11) NOT NULL AUTO_INCREMENT,
  `mem_ac_no` varchar(10) NOT NULL,
  `mem_type` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `ac_status` varchar(10) NOT NULL,
  `close_date` date NOT NULL,
  `emp_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  PRIMARY KEY (`mem_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE IF NOT EXISTS `publishers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pub_code` varchar(5) NOT NULL,
  `pub_name` varchar(50) NOT NULL,
  `pub_address` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pub_name` (`pub_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`id`, `pub_code`, `pub_name`, `pub_address`) VALUES
(1, 'TMH', 'Tata McGraw Hill', 'NajafGarh, New Delhi'),
(2, 'KP', 'Kalyani Publishers', 'Panbazaar, Guwahati 781001'),
(5, 'PHI', 'Printage Hall India', 'New Delhi'),
(6, 'PBI', 'Penguin Books India', 'Navi, Mumbai');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `rollno` varchar(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(20) NOT NULL DEFAULT 'ASSAM',
  `country` varchar(20) NOT NULL DEFAULT 'INDIA',
  `address` text NOT NULL,
  `pin` int(6) NOT NULL,
  `landline` int(11) NOT NULL,
  `mobile` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `bloodgroup` varchar(10) NOT NULL,
  `gurdain_name` varchar(50) NOT NULL,
  `gurdain_contact` int(11) NOT NULL,
  `session` varchar(15) NOT NULL,
  `doa` date NOT NULL,
  `photo` blob NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `current_status` varchar(10) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `theses_dissertations`
--

CREATE TABLE IF NOT EXISTS `theses_dissertations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `title` text NOT NULL,
  `submitted_by` varchar(255) NOT NULL,
  `guide` varchar(255) NOT NULL,
  `co_guide` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL,
  `session` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `theses_dissertations`
--

INSERT INTO `theses_dissertations` (`id`, `code`, `title`, `submitted_by`, `guide`, `co_guide`, `duration`, `session`) VALUES
(2, '', '"Recognizing Spatio-temporal Behaviour Patterns From Video"', 'Mon Jyoti Das', 'Prof. Shyamanta M. Hazarika', '', 3, '2010-2013');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `is_employee` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `logged_at` datetime NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `email`, `username`, `password`, `hash`, `is_employee`, `group_id`, `logged_at`) VALUES
(1, 'monjyoti.das@gmail.com', 'mon', '4332', '35f4a8d465e6e1edc05f3d8ab658c551', 1, 1, '2016-08-11 19:51:42'),
(2, 'laskardwipen@gmail.com', 'dipen', '2622', 'b2f627fff19fda463cb386442eac2b3d', 1, 1, '2016-08-08 11:47:29'),
(3, 'demo@gmail.com', 'demo', '1322', 'e44fea3bec53bcea3b7513ccef5857ac', 1, 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(20) NOT NULL,
  `permission_create` tinyint(4) NOT NULL,
  `permission_read` tinyint(4) NOT NULL,
  `permission_update` tinyint(4) NOT NULL,
  `permission_delete` tinyint(4) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`group_id`, `group_name`, `permission_create`, `permission_read`, `permission_update`, `permission_delete`) VALUES
(7, 'Admin', 1, 1, 1, 1),
(8, 'Issuer', 0, 1, 1, 1),
(9, 'Faculty', 0, 1, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
