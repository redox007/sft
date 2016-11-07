-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2016 at 05:43 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

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
(9, 'uploads/medias', 1, 646625.28, 'media_147721870050479.jpg', '.jpg', 1, 'media_147721870050479', 'D:/xampp/htdocs/sft/uploads/medias/', '2016-10-23 12:31:40', '2016-10-23 12:31:40'),
(10, 'uploads/medias', 1, 910008.32, 'media_147721878385657.jpg', '.jpg', 1, 'media_147721878385657', 'D:/xampp/htdocs/sft/uploads/medias/', '2016-10-23 12:33:03', '2016-10-23 12:33:03'),
(11, 'uploads/medias', 1, 1029662.72, 'media_147721879686495.jpg', '.jpg', 1, 'media_147721879686495', 'D:/xampp/htdocs/sft/uploads/medias/', '2016-10-23 12:33:16', '2016-10-23 12:33:16'),
(12, 'uploads/medias', 1, 511293.44, 'media_147721879875148.jpg', '.jpg', 1, 'media_147721879875148', 'D:/xampp/htdocs/sft/uploads/medias/', '2016-10-23 12:33:18', '2016-10-23 12:33:18'),
(13, 'uploads/medias', 1, 671170.56, 'media_147721896652948.jpg', '.jpg', 1, 'media_147721896652948', 'D:/xampp/htdocs/sft/uploads/medias/', '2016-10-23 12:36:06', '2016-10-23 12:36:06'),
(14, 'uploads/medias', 1, 851343.36, 'media_147721904066593.jpg', '.jpg', 1, 'media_147721904066593', 'D:/xampp/htdocs/sft/uploads/medias/', '2016-10-23 12:37:20', '2016-10-23 12:37:20'),
(15, 'uploads/medias', 1, 739215.36, 'media_147721978418047.jpg', '.jpg', 1, 'media_147721978418047', 'D:/xampp/htdocs/sft/uploads/medias/', '2016-10-23 12:49:44', '2016-10-23 12:49:44'),
(16, 'uploads/medias', 1, 696729.6, 'media_147721978663269.jpg', '.jpg', 1, 'media_147721978663269', 'D:/xampp/htdocs/sft/uploads/medias/', '2016-10-23 12:49:46', '2016-10-23 12:49:46'),
(17, 'uploads/medias', 1, 243814.4, 'media_147721978874863.jpg', '.jpg', 1, 'media_147721978874863', 'D:/xampp/htdocs/sft/uploads/medias/', '2016-10-23 12:49:48', '2016-10-23 12:49:48'),
(18, 'uploads/medias', 1, 1511383.04, 'media_147721979094004.jpg', '.jpg', 1, 'media_147721979094004', 'D:/xampp/htdocs/sft/uploads/medias/', '2016-10-23 12:49:50', '2016-10-23 12:49:50'),
(19, 'uploads/medias', 1, 776601.6, 'media_147721979386459.jpg', '.jpg', 1, 'media_147721979386459', 'D:/xampp/htdocs/sft/uploads/medias/', '2016-10-23 12:49:54', '2016-10-23 12:49:54'),
(20, 'uploads/medias', 1, 1566361.6, 'media_147721979578288.jpg', '.jpg', 1, 'media_147721979578288', 'D:/xampp/htdocs/sft/uploads/medias/', '2016-10-23 12:49:55', '2016-10-23 12:49:55'),
(21, 'uploads/medias', 1, 666255.36, 'media_147721979897484.jpg', '.jpg', 1, 'media_147721979897484', 'D:/xampp/htdocs/sft/uploads/medias/', '2016-10-23 12:49:58', '2016-10-23 12:49:58'),
(22, 'uploads/medias', 1, 454461.44, 'media_147721979922801.jpg', '.jpg', 1, 'media_147721979922801', 'D:/xampp/htdocs/sft/uploads/medias/', '2016-10-23 12:49:59', '2016-10-23 12:49:59'),
(23, 'uploads/medias', 1, 671170.56, 'media_147721980126023.jpg', '.jpg', 1, 'media_147721980126023', 'D:/xampp/htdocs/sft/uploads/medias/', '2016-10-23 12:50:01', '2016-10-23 12:50:01'),
(24, 'uploads/medias', 1, 677959.68, 'media_147721980388912.jpg', '.jpg', 1, 'media_147721980388912', 'D:/xampp/htdocs/sft/uploads/medias/', '2016-10-23 12:50:03', '2016-10-23 12:50:03'),
(25, 'uploads/medias', 1, 910008.32, 'media_147721980591101.jpg', '.jpg', 1, 'media_147721980591101', 'D:/xampp/htdocs/sft/uploads/medias/', '2016-10-23 12:50:05', '2016-10-23 12:50:05'),
(26, 'uploads/medias', 1, 646625.28, 'media_147721980730173.jpg', '.jpg', 1, 'media_147721980730173', 'D:/xampp/htdocs/sft/uploads/medias/', '2016-10-23 12:50:07', '2016-10-23 12:50:07'),
(27, 'uploads/medias', 1, 50698.24, 'media_147835001556908.jpg', '.jpg', 1, 'media_147835001556908', 'D:/xampp/htdocs/sft/uploads/medias/', '2016-11-05 13:46:55', '2016-11-05 13:46:55'),
(28, 'uploads/medias', 1, 47001.6, 'media_147835018741868.jpg', '.jpg', 1, 'media_147835018741868', 'D:/xampp/htdocs/sft/uploads/medias/', '2016-11-05 13:49:47', '2016-11-05 13:49:47'),
(29, 'uploads/medias', 1, 20981.76, 'media_147835021459614.png', '.png', 1, 'media_147835021459614', 'D:/xampp/htdocs/sft/uploads/medias/', '2016-11-05 13:50:14', '2016-11-05 13:50:14'),
(30, 'uploads/medias', 1, 1566361.6, 'media_147853605027685.jpg', '.jpg', 1, 'media_147853605027685', 'D:/xampp/htdocs/sft/uploads/medias/', '2016-11-07 17:27:30', '2016-11-07 17:27:30'),
(31, 'uploads/medias', 1, 666255.36, 'media_147853605360504.jpg', '.jpg', 1, 'media_147853605360504', 'D:/xampp/htdocs/sft/uploads/medias/', '2016-11-07 17:27:33', '2016-11-07 17:27:33'),
(32, 'uploads/medias', 1, 454461.44, 'media_147853605575733.jpg', '.jpg', 1, 'media_147853605575733', 'D:/xampp/htdocs/sft/uploads/medias/', '2016-11-07 17:27:35', '2016-11-07 17:27:35'),
(33, 'uploads/medias', 1, 867061.76, 'media_147853605724375.jpg', '.jpg', 1, 'media_147853605724375', 'D:/xampp/htdocs/sft/uploads/medias/', '2016-11-07 17:27:37', '2016-11-07 17:27:37'),
(34, 'uploads/medias', 1, 671170.56, 'media_147853605933035.jpg', '.jpg', 1, 'media_147853605933035', 'D:/xampp/htdocs/sft/uploads/medias/', '2016-11-07 17:27:39', '2016-11-07 17:27:39'),
(35, 'uploads/medias', 1, 677959.68, 'media_147853606119316.jpg', '.jpg', 1, 'media_147853606119316', 'D:/xampp/htdocs/sft/uploads/medias/', '2016-11-07 17:27:41', '2016-11-07 17:27:41'),
(36, 'uploads/medias', 1, 910008.32, 'media_147853606469394.jpg', '.jpg', 1, 'media_147853606469394', 'D:/xampp/htdocs/sft/uploads/medias/', '2016-11-07 17:27:44', '2016-11-07 17:27:44');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
