-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2016 at 12:26 PM
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
-- Table structure for table `sft_media`
--

CREATE TABLE IF NOT EXISTS `sft_media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(600) NOT NULL,
  `type` int(1) NOT NULL COMMENT '1=image,2=video',
  `size` double NOT NULL,
  `media_name` text NOT NULL,
  `extension` varchar(200) NOT NULL,
  `media_used_type` int(1) NOT NULL COMMENT '1=Global,2=SFT Buddy',
  `raw_name` varchar(250) NOT NULL,
  `file_path` text NOT NULL,
  `created_on` datetime NOT NULL,
  `modified_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

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
(8, 'uploads/medias', 1, 1511383.04, 'media_147721831479689.jpg', '.jpg', 1, 'media_147721831479689', 'D:/xampp/htdocs/sft/uploads/medias/', '2016-10-23 12:25:14', '2016-10-23 12:25:14');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
