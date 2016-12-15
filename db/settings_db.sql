-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2016 at 08:29 PM
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
-- Table structure for table `sft_basic_settings`
--

CREATE TABLE IF NOT EXISTS `sft_basic_settings` (
  `id` int(11) NOT NULL,
  `site_email` varchar(255) NOT NULL,
  `site_contact_no` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sft_basic_settings`
--

INSERT INTO `sft_basic_settings` (`id`, `site_email`, `site_contact_no`, `created_on`) VALUES
(1, 'SFTwellness@gmail.com', '+84 901007997', '2016-11-29 14:43:16');

-- --------------------------------------------------------

--
-- Table structure for table `sft_basic_settings_lang`
--

CREATE TABLE IF NOT EXISTS `sft_basic_settings_lang` (
  `id` int(11) NOT NULL,
  `settings_id` int(11) NOT NULL,
  `site_address` text NOT NULL,
  `language_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sft_basic_settings_lang`
--

INSERT INTO `sft_basic_settings_lang` (`id`, `settings_id`, `site_address`, `language_id`) VALUES
(1, 1, '109 - 1965 West 4th Ave. Vancouver,BC Canada, V6J1M8 ', 1),
(2, 1, '109 - 1965 West 4th Ave. Vancouver,BC Canada, V6J1M8 viet', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sft_basic_settings`
--
ALTER TABLE `sft_basic_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sft_basic_settings_lang`
--
ALTER TABLE `sft_basic_settings_lang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sft_basic_settings`
--
ALTER TABLE `sft_basic_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sft_basic_settings_lang`
--
ALTER TABLE `sft_basic_settings_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

ALTER TABLE `sft_basic_settings_lang` ADD `footer_desc` TEXT NOT NULL AFTER `site_address`;
