-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2016 at 05:58 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sft`
--

-- --------------------------------------------------------

--
-- Table structure for table `sft_email_template`
--

CREATE TABLE IF NOT EXISTS `sft_email_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `slug` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `mailto` varchar(200) NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sft_email_template`
--

INSERT INTO `sft_email_template` (`id`, `name`, `subject`, `slug`, `content`, `mailto`, `created_on`) VALUES
(1, 'Request a Callback', '', 'callback', '', '', '2016-12-18'),
(2, 'Make an Enquiry', '', 'enquary', '', '', '2016-12-18'),
(3, 'Registration', '', 'registration', '<p>asdsdsa&nbsp;</p>\r\n', 'suchandan.bcet@gmail.com', '2016-12-18');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
