-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2016 at 09:09 PM
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
-- Table structure for table `sft_home_page_settings`
--

CREATE TABLE IF NOT EXISTS `sft_home_page_settings` (
  `id` int(11) NOT NULL,
  `toor_media` varchar(255) NOT NULL,
  `library_media` varchar(255) NOT NULL,
  `partner_media` varchar(255) NOT NULL,
  `ajmj_media` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sft_home_page_settings`
--

INSERT INTO `sft_home_page_settings` (`id`, `toor_media`, `library_media`, `partner_media`, `ajmj_media`, `created_by`, `modified_on`, `created_on`) VALUES
(1, '2', '3', '', '5', 1, '2016-11-27 15:36:21', '2016-11-27 18:57:17');

-- --------------------------------------------------------

--
-- Table structure for table `sft_home_page_settings_lang`
--

CREATE TABLE IF NOT EXISTS `sft_home_page_settings_lang` (
  `id` int(11) NOT NULL,
  `home_page_id` int(11) NOT NULL,
  `welcome_txt_title` varchar(255) NOT NULL,
  `welcome_txt_desc1` text NOT NULL,
  `welcome_txt_desc2` text NOT NULL,
  `best_offer_title` varchar(255) NOT NULL,
  `best_offer_desc` text NOT NULL,
  `toor_title` varchar(255) NOT NULL,
  `toor_desc` text NOT NULL,
  `why_choose_title` varchar(255) NOT NULL,
  `why_choose_desc` text NOT NULL,
  `why_choose_details1` text NOT NULL,
  `why_choose_details2` text NOT NULL,
  `why_choose_details3` text NOT NULL,
  `portfolio_title` varchar(255) NOT NULL,
  `portfolio_desc` text NOT NULL,
  `library_title` varchar(255) NOT NULL,
  `library_desc` text NOT NULL,
  `partner_title` varchar(255) NOT NULL,
  `partner_desc` text NOT NULL,
  `ajmj_title` varchar(255) NOT NULL,
  `ajmj_desc` text NOT NULL,
  `language_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sft_home_page_settings_lang`
--

INSERT INTO `sft_home_page_settings_lang` (`id`, `home_page_id`, `welcome_txt_title`, `welcome_txt_desc1`, `welcome_txt_desc2`, `best_offer_title`, `best_offer_desc`, `toor_title`, `toor_desc`, `why_choose_title`, `why_choose_desc`, `why_choose_details1`, `why_choose_details2`, `why_choose_details3`, `portfolio_title`, `portfolio_desc`, `library_title`, `library_desc`, `partner_title`, `partner_desc`, `ajmj_title`, `ajmj_desc`, `language_id`) VALUES
(1, 1, 'welcome text title1', '<p>welcome text desc1</p>\r\n', '<p>welcome text desc2</p>\r\n', 'best offer title', '<p>best offer desc</p>\r\n', 'toor title', '<p>toor desc</p>\r\n', 'choose title', '<p>choose desc</p>\r\n', '<p>para1</p>\r\n', '<p>para2</p>\r\n', '<p>para3</p>\r\n', 'portfolio title', '<p>portfolio desc</p>\r\n', 'library title', '<p>library desc</p>\r\n', 'partner title', '<p>partner desc</p>\r\n', 'ajmj title', '<p>ajmj desc</p>\r\n', 1),
(2, 1, 'welcome text title viet', '<p>welcome text desc1 viet</p>\r\n', '<p>welcome text desc2 viet</p>\r\n', 'best offer title viet', '<p>best offer title desc viet</p>\r\n', 'toor title viet', '<p>toor desc viet</p>\r\n', 'choose title viet', '<p>choos desc viet</p>\r\n', '<p>1</p>\r\n', '<p>2</p>\r\n', '<p><br />\r\n3</p>\r\n', 'portfolio title viet', '<p>portfolio desc viet</p>\r\n', 'library title viet', '<p>library desc viet</p>\r\n', 'partner title viet', '<p>partner desc viet</p>\r\n', 'ajmj title viet', '<p>ajmj desc viet</p>\r\n', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sft_home_page_settings`
--
ALTER TABLE `sft_home_page_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sft_home_page_settings_lang`
--
ALTER TABLE `sft_home_page_settings_lang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sft_home_page_settings`
--
ALTER TABLE `sft_home_page_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sft_home_page_settings_lang`
--
ALTER TABLE `sft_home_page_settings_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

ALTER TABLE `sft_home_page_settings` ADD `footer_media` INT NOT NULL AFTER `ajmj_media`;
ALTER TABLE `sft_home_page_settings_lang` ADD `footer_desc` TEXT NOT NULL AFTER `ajmj_desc`;

ALTER TABLE `sft_home_page_settings` CHANGE `toor_media` `toor_media` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL, CHANGE `library_media` `library_media` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL, CHANGE `partner_media` `partner_media` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL, CHANGE `ajmj_media` `ajmj_media` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;

ALTER TABLE `sft_home_page_settings` ADD `library_videos` TEXT NULL DEFAULT NULL AFTER `toor_media`;
