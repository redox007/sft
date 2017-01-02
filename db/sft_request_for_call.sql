-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2016 at 05:47 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sftwelness`
--

-- --------------------------------------------------------

--
-- Table structure for table `sft_request_for_call`
--

CREATE TABLE IF NOT EXISTS `sft_request_for_call` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `country` int(11) NOT NULL,
  `preffered_call_date` date NOT NULL,
  `preffered_call_time` time NOT NULL,
  `country_code` int(11) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `sex` enum('M','F','O') NOT NULL DEFAULT 'M' COMMENT 'M=>Male, F => Female, O => other',
  `age` int(11) DEFAULT NULL,
  `skype_id` varchar(500) DEFAULT NULL,
  `goal_for_visit` text,
  `health_condition` text,
  `callback_intiated` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=> Yes for request attended',
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=>open, 1=>closed',
  `language_id` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='store user requests for skype call';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sft_request_for_call`
--
ALTER TABLE `sft_request_for_call`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sft_request_for_call`
--
ALTER TABLE `sft_request_for_call`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
