-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2016 at 06:49 AM
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
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_pass` varchar(200) NOT NULL,
  `contact_email` varchar(200) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `user_pass`, `contact_email`, `last_login`) VALUES
(1, 'sftadmin', 'e10adc3949ba59abbe56e057f20f883e', 'kumarbarun137@gmail.com', '2016-11-21 13:18:49');

-- --------------------------------------------------------

--
-- Table structure for table `sft_cms_language`
--

CREATE TABLE IF NOT EXISTS `sft_cms_language` (
  `id` int(11) NOT NULL,
  `cms_page_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `language_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sft_cms_language`
--

INSERT INTO `sft_cms_language` (`id`, `cms_page_id`, `title`, `content`, `language_id`) VALUES
(1, 1, 'W.O.W in vietnames123', '<p>wow viet desc1234</p>\r\n', 2),
(2, 1, 'W.O.W', '<p>wow desc</p>\r\n', 1),
(4, 2, 'Body For Welness', '<p>body for welness desc</p>\r\n', 1),
(5, 3, 'Soul for Welness', '<p>soul for welness desc</p>\r\n', 1),
(6, 4, 'Welness Mind', '<p>welness mind1</p>\r\n', 1),
(7, 4, 'Welness Mind vietnames', '<p>&nbsp;welnes mind viet</p>\r\n', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sft_cms_meta`
--

CREATE TABLE IF NOT EXISTS `sft_cms_meta` (
  `id` int(11) NOT NULL,
  `cms_page_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `description` text NOT NULL,
  `meta_name` text NOT NULL,
  `tag` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sft_cms_page`
--

CREATE TABLE IF NOT EXISTS `sft_cms_page` (
  `id` int(11) NOT NULL,
  `slug` text NOT NULL,
  `page_name` text NOT NULL,
  `media_id` int(11) NOT NULL,
  `page_parent` int(11) NOT NULL DEFAULT '0' COMMENT '0=>parent page ',
  `page_template` enum('default','showcase') NOT NULL DEFAULT 'default' COMMENT 'describe template for page',
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '1=>active page/post',
  `sort_order` int(11) NOT NULL DEFAULT '0' COMMENT 'user can set page order',
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sft_cms_page`
--

INSERT INTO `sft_cms_page` (`id`, `slug`, `page_name`, `media_id`, `page_parent`, `page_template`, `status`, `sort_order`, `created_by`, `created_on`) VALUES
(1, 'wow', 'W.O.W', 1, 0, 'showcase', '1', 0, 1, '2016-11-19 19:16:15'),
(2, 'body-for-welness', 'body for welness', 1, 1, 'default', '1', 1, 1, '2016-11-19 19:29:38'),
(3, 'soul-for-welness', 'soul for welness', 1, 1, 'default', '1', 2, 1, '2016-11-20 10:27:35'),
(4, 'welness-mind', 'welness mind', 1, 1, 'default', '1', 3, 1, '2016-11-20 10:29:10');

-- --------------------------------------------------------

--
-- Table structure for table `sft_country`
--

CREATE TABLE IF NOT EXISTS `sft_country` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sft_country_language`
--

CREATE TABLE IF NOT EXISTS `sft_country_language` (
  `id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `country_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sft_language`
--

CREATE TABLE IF NOT EXISTS `sft_language` (
  `id` int(11) NOT NULL,
  `language_name` varchar(40) NOT NULL,
  `code` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sft_language`
--

INSERT INTO `sft_language` (`id`, `language_name`, `code`) VALUES
(1, 'English', ''),
(2, 'Vietnamese', '');

-- --------------------------------------------------------

--
-- Table structure for table `sft_media`
--

CREATE TABLE IF NOT EXISTS `sft_media` (
  `id` int(11) NOT NULL,
  `url` varchar(600) NOT NULL,
  `type` int(1) NOT NULL COMMENT '1=image,2=video',
  `size` double NOT NULL,
  `media_name` text NOT NULL,
  `extension` varchar(200) NOT NULL,
  `media_used_type` int(1) NOT NULL COMMENT '1=Global,2=SFT Buddy',
  `raw_name` varchar(250) NOT NULL,
  `file_path` text NOT NULL,
  `created_on` datetime NOT NULL,
  `modified_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sft_media`
--

INSERT INTO `sft_media` (`id`, `url`, `type`, `size`, `media_name`, `extension`, `media_used_type`, `raw_name`, `file_path`, `created_on`, `modified_on`) VALUES
(1, 'uploads/medias', 1, 539566.08, 'media_147721830153049.jpg', '.jpg', 1, 'media_147721830153049', 'D:/xampp/htdocs/sft/uploads/medias/', '2016-10-23 12:25:01', '2016-10-23 12:25:01'),
(2, 'uploads/medias', 1, 634408.96, 'media_147721830387286.jpg', '.jpg', 1, 'media_147721830387286', 'D:/xampp/htdocs/sft/uploads/medias/', '2016-10-23 12:25:03', '2016-10-23 12:25:03'),
(3, 'uploads/medias', 1, 291297.28, 'media_147721830526369.jpg', '.jpg', 1, 'media_147721830526369', 'D:/xampp/htdocs/sft/uploads/medias/', '2016-10-23 12:25:05', '2016-10-23 12:25:05'),
(4, 'uploads/medias', 1, 851343.36, 'media_147721830616946.jpg', '.jpg', 1, 'media_147721830616946', 'D:/xampp/htdocs/sft/uploads/medias/', '2016-10-23 12:25:06', '2016-10-23 12:25:06'),
(5, 'uploads/medias', 1, 739215.36, 'media_147721830890875.jpg', '.jpg', 1, 'media_147721830890875', 'D:/xampp/htdocs/sft/uploads/medias/', '2016-10-23 12:25:08', '2016-10-23 12:25:08'),
(6, 'uploads/medias', 1, 696729.6, 'media_147721831098437.jpg', '.jpg', 1, 'media_147721831098437', 'D:/xampp/htdocs/sft/uploads/medias/', '2016-10-23 12:25:10', '2016-10-23 12:25:10'),
(7, 'uploads/medias', 1, 243814.4, 'media_147721831277467.jpg', '.jpg', 1, 'media_147721831277467', 'D:/xampp/htdocs/sft/uploads/medias/', '2016-10-23 12:25:12', '2016-10-23 12:25:12'),
(8, 'uploads/medias', 1, 1511383.04, 'media_147721831479689.jpg', '.jpg', 1, 'media_147721831479689', 'D:/xampp/htdocs/sft/uploads/medias/', '2016-10-23 12:25:14', '2016-10-23 12:25:14'),
(9, 'uploads/medias', 1, 561274.88, 'media_147874324717418.jpg', '.jpg', 1, 'media_147874324717418', 'C:/xampp/htdocs/sft/uploads/medias/', '2016-11-10 03:00:47', '2016-11-10 03:00:47'),
(10, 'uploads/medias', 1, 845936.64, 'media_147874385585813.jpg', '.jpg', 1, 'media_147874385585813', 'C:/xampp/htdocs/sft/uploads/medias/', '2016-11-10 03:10:55', '2016-11-10 03:10:55'),
(11, 'uploads/medias', 1, 780830.72, 'media_147874407513427.jpg', '.jpg', 1, 'media_147874407513427', 'C:/xampp/htdocs/sft/uploads/medias/', '2016-11-10 03:14:35', '2016-11-10 03:14:35'),
(12, 'uploads/medias', 1, 845936.64, 'media_147874431412529.jpg', '.jpg', 1, 'media_147874431412529', 'C:/xampp/htdocs/sft/uploads/medias/', '2016-11-10 03:18:34', '2016-11-10 03:18:34'),
(13, 'uploads/medias', 1, 775700.48, 'media_147874443475407.jpg', '.jpg', 1, 'media_147874443475407', 'C:/xampp/htdocs/sft/uploads/medias/', '2016-11-10 03:20:34', '2016-11-10 03:20:34'),
(14, 'uploads/medias', 1, 296366.08, 'media_147879713232854.jpg', '.jpg', 1, 'media_147879713232854', 'C:/xampp/htdocs/sft/uploads/medias/', '2016-11-10 17:58:52', '2016-11-10 17:58:52'),
(15, 'uploads//medias', 1, 373248, 'media_147879724384220.jpg', '.jpg', 1, 'media_147879724384220', 'C:/xampp/htdocs/sft/uploads/medias/', '2016-11-10 18:00:43', '2016-11-10 18:00:43'),
(16, 'uploads/medias', 1, 268308.48, 'media_147923272965189.jpg', '.jpg', 1, 'media_147923272965189', 'C:/xampp5.6/htdocs/sft/sft/uploads/medias/', '2016-11-15 18:58:49', '2016-11-15 18:58:49'),
(17, 'uploads/medias', 1, 268308.48, 'media_147923275699909.jpg', '.jpg', 1, 'media_147923275699909', 'C:/xampp5.6/htdocs/sft/sft/uploads/medias/', '2016-11-15 18:59:16', '2016-11-15 18:59:16'),
(18, 'uploads/medias', 1, 268308.48, 'media_147923276224183.jpg', '.jpg', 1, 'media_147923276224183', 'C:/xampp5.6/htdocs/sft/sft/uploads/medias/', '2016-11-15 18:59:22', '2016-11-15 18:59:22');

-- --------------------------------------------------------

--
-- Table structure for table `sft_partner`
--

CREATE TABLE IF NOT EXISTS `sft_partner` (
  `id` int(11) NOT NULL,
  `partner_name` varchar(222) NOT NULL,
  `partner_logo` varchar(400) NOT NULL,
  `wellness_type_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=active,0=inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sft_partner`
--

INSERT INTO `sft_partner` (`id`, `partner_name`, `partner_logo`, `wellness_type_id`, `country_id`, `status`) VALUES
(1, 'Kamalaya', '1', 0, 0, 0),
(2, 'Spring Gold', '6', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sft_tour_details`
--

CREATE TABLE IF NOT EXISTS `sft_tour_details` (
  `id` int(11) NOT NULL,
  `wellness_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sft_tour_details_lang`
--

CREATE TABLE IF NOT EXISTS `sft_tour_details_lang` (
  `id` int(11) NOT NULL,
  `tour_details_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `language_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sft_wellness`
--

CREATE TABLE IF NOT EXISTS `sft_wellness` (
  `id` int(11) NOT NULL,
  `type` int(1) NOT NULL COMMENT '1=wellness plus,2=medi plus,3=beauty plus',
  `country_id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sft_wellness_lang`
--

CREATE TABLE IF NOT EXISTS `sft_wellness_lang` (
  `id` int(11) NOT NULL,
  `welness_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `short_description` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sft_wellness_program`
--

CREATE TABLE IF NOT EXISTS `sft_wellness_program` (
  `id` int(11) NOT NULL,
  `program` varchar(200) NOT NULL,
  `wellness_type_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sft_wellness_program`
--

INSERT INTO `sft_wellness_program` (`id`, `program`, `wellness_type_id`, `created_on`) VALUES
(2, 'Diamond', 1, '2016-11-13 18:35:33');

-- --------------------------------------------------------

--
-- Table structure for table `sft_wellness_program_lang`
--

CREATE TABLE IF NOT EXISTS `sft_wellness_program_lang` (
  `id` int(11) NOT NULL,
  `wellness_program_id` int(11) NOT NULL,
  `program_name` varchar(222) CHARACTER SET utf16 NOT NULL,
  `short_description` text NOT NULL,
  `language_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sft_wellness_program_lang`
--

INSERT INTO `sft_wellness_program_lang` (`id`, `wellness_program_id`, `program_name`, `short_description`, `language_id`) VALUES
(2, 2, 'D楡浯湤', '', 1),
(3, 2, 'Kim cương', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sft_wellness_type`
--

CREATE TABLE IF NOT EXISTS `sft_wellness_type` (
  `id` int(11) NOT NULL,
  `wellness_type` varchar(222) NOT NULL,
  `wellness_image` int(11) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sft_wellness_type`
--

INSERT INTO `sft_wellness_type` (`id`, `wellness_type`, `wellness_image`, `created_on`) VALUES
(1, 'Welness Plus', 16, '2016-11-13 08:43:05'),
(2, 'Medi Plus', 15, '2016-11-13 12:36:13');

-- --------------------------------------------------------

--
-- Table structure for table `sft_wellness_type_lang`
--

CREATE TABLE IF NOT EXISTS `sft_wellness_type_lang` (
  `id` int(11) NOT NULL,
  `wellness_type_id` int(11) NOT NULL,
  `type_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `short_description` text NOT NULL,
  `language_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sft_wellness_type_lang`
--

INSERT INTO `sft_wellness_type_lang` (`id`, `wellness_type_id`, `type_name`, `short_description`, `language_id`) VALUES
(1, 1, 'Welness Plus', '', 1),
(2, 1, 'Wellness cộng', '', 2),
(3, 2, 'Medi cộng', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sft_wow`
--

CREATE TABLE IF NOT EXISTS `sft_wow` (
  `id` int(11) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='stores wow contents';

--
-- Dumping data for table `sft_wow`
--

INSERT INTO `sft_wow` (`id`, `created_on`) VALUES
(1, '2016-11-16 14:25:45'),
(2, '2016-11-16 14:36:02'),
(3, '2016-11-17 11:57:29'),
(4, '2016-11-17 12:15:40'),
(5, '2016-11-17 19:11:03');

-- --------------------------------------------------------

--
-- Table structure for table `sft_wow_lang`
--

CREATE TABLE IF NOT EXISTS `sft_wow_lang` (
  `id` int(11) NOT NULL,
  `wow_id` int(11) NOT NULL,
  `title` varchar(222) NOT NULL,
  `description` text NOT NULL,
  `media_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sft_wow_lang`
--

INSERT INTO `sft_wow_lang` (`id`, `wow_id`, `title`, `description`, `media_id`, `language_id`) VALUES
(1, 1, 'first wow12312', 'my first wow entry1234\r\n', 0, 1),
(2, 2, 'n1', '<p>testesttest</p>\r\n', 6, 1),
(3, 3, 'txtarea test', '<p>test area test 1233</p>\r\n', 5, 1),
(4, 4, 'sadasd', '<p>sdfds</p>\r\n\r\n<p>sdfdsf</p>\r\n\r\n<p>sdfdsf</p>\r\n\r\n<p>sdfds</p>\r\n\r\n<p>sdfds</p>\r\n\r\n<p>sdfsdf</p>\r\n\r\n<p>dsf</p>\r\n\r\n<p>sdf</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>sdf</p>\r\n', 1, 1),
(5, 5, 'new wow', '<p>test desc</p>\r\n', 4, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sft_cms_language`
--
ALTER TABLE `sft_cms_language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sft_cms_meta`
--
ALTER TABLE `sft_cms_meta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sft_cms_page`
--
ALTER TABLE `sft_cms_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sft_country`
--
ALTER TABLE `sft_country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sft_country_language`
--
ALTER TABLE `sft_country_language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sft_language`
--
ALTER TABLE `sft_language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sft_media`
--
ALTER TABLE `sft_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sft_tour_details`
--
ALTER TABLE `sft_tour_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sft_wellness`
--
ALTER TABLE `sft_wellness`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sft_wellness_lang`
--
ALTER TABLE `sft_wellness_lang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sft_wellness_type_lang`
--
ALTER TABLE `sft_wellness_type_lang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sft_wow`
--
ALTER TABLE `sft_wow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sft_wow_lang`
--
ALTER TABLE `sft_wow_lang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sft_cms_language`
--
ALTER TABLE `sft_cms_language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sft_cms_meta`
--
ALTER TABLE `sft_cms_meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sft_cms_page`
--
ALTER TABLE `sft_cms_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sft_country`
--
ALTER TABLE `sft_country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sft_country_language`
--
ALTER TABLE `sft_country_language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sft_language`
--
ALTER TABLE `sft_language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sft_media`
--
ALTER TABLE `sft_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `sft_tour_details`
--
ALTER TABLE `sft_tour_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sft_wellness`
--
ALTER TABLE `sft_wellness`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sft_wellness_lang`
--
ALTER TABLE `sft_wellness_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sft_wow`
--
ALTER TABLE `sft_wow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sft_wow_lang`
--
ALTER TABLE `sft_wow_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
