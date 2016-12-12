-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2016 at 07:15 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sft`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_pass` varchar(200) NOT NULL,
  `contact_email` varchar(200) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `user_pass`, `contact_email`, `last_login`) VALUES
(1, 'sftadmin', 'ecf255cf24c56b2cfbf6b918729da07f', 'kumarbarun137@gmail.com', '2016-12-12 06:32:57');

-- --------------------------------------------------------

--
-- Table structure for table `continent`
--

CREATE TABLE `continent` (
  `id` int(11) NOT NULL,
  `continent_name` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `continent`
--

INSERT INTO `continent` (`id`, `continent_name`) VALUES
(1, 'Asia');

-- --------------------------------------------------------

--
-- Table structure for table `continent_lang`
--

CREATE TABLE `continent_lang` (
  `id` int(11) NOT NULL,
  `continent_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `continent` varchar(222) CHARACTER SET utf16 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `continent_lang`
--

INSERT INTO `continent_lang` (`id`, `continent_id`, `language_id`, `continent`) VALUES
(1, 1, 1, 'Asia'),
(2, 1, 2, 'Châu Á');

-- --------------------------------------------------------

--
-- Table structure for table `sft_award`
--

CREATE TABLE `sft_award` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1=best of best,2=best of region,3=best of programs',
  `name_in_english` varchar(200) NOT NULL,
  `name_in_vietnamese` varchar(200) CHARACTER SET utf16 COLLATE utf16_german2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sft_award`
--

INSERT INTO `sft_award` (`id`, `type`, `name_in_english`, `name_in_vietnamese`) VALUES
(1, 1, 'Best Of Africa', 'Best Of Phi'),
(2, 1, 'Best of asia', 'Tốt nhất của asia');

-- --------------------------------------------------------

--
-- Table structure for table `sft_award_partner`
--

CREATE TABLE `sft_award_partner` (
  `id` int(11) NOT NULL,
  `award_id` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sft_award_partner`
--

INSERT INTO `sft_award_partner` (`id`, `award_id`, `partner_id`) VALUES
(1, 1, 2),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sft_cms_language`
--

CREATE TABLE `sft_cms_language` (
  `id` int(11) NOT NULL,
  `cms_page_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sft_cms_language`
--

INSERT INTO `sft_cms_language` (`id`, `cms_page_id`, `language_id`, `title`, `content`) VALUES
(1, 1, 2, 'W.O.W in vietnames123', '<p>wow viet desc1234</p>\r\n'),
(2, 1, 1, 'W.O.W', '<p>wow desc</p>\r\n'),
(4, 2, 1, 'Body For Welness', '<p>body for welness desc</p>\r\n'),
(5, 3, 1, 'Soul for Welness', '<p>soul for welness desc</p>\r\n'),
(6, 4, 1, 'Welness Mind', '<p>welness mind1</p>\r\n'),
(7, 4, 2, 'Welness Mind vietnames', '<p>&nbsp;welnes mind viet</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `sft_cms_meta`
--

CREATE TABLE `sft_cms_meta` (
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

CREATE TABLE `sft_cms_page` (
  `id` int(11) NOT NULL,
  `slug` text NOT NULL,
  `page_name` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sft_country`
--

CREATE TABLE `sft_country` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sft_country`
--

INSERT INTO `sft_country` (`id`, `code`) VALUES
(1, 'IN'),
(2, 'VN');

-- --------------------------------------------------------

--
-- Table structure for table `sft_country_language`
--

CREATE TABLE `sft_country_language` (
  `id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `country_name` varchar(200) CHARACTER SET utf16 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sft_country_language`
--

INSERT INTO `sft_country_language` (`id`, `language_id`, `country_id`, `country_name`) VALUES
(1, 1, 1, 'INDIA'),
(2, 2, 1, 'ẤN ĐỘ'),
(3, 2, 2, 'Việt Nam'),
(4, 1, 2, 'Vietnam');

-- --------------------------------------------------------

--
-- Table structure for table `sft_itinerary`
--

CREATE TABLE `sft_itinerary` (
  `id` int(11) NOT NULL,
  `day_number` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `welness_id` int(11) NOT NULL,
  `wellness_title` text CHARACTER SET utf16 NOT NULL,
  `description` text CHARACTER SET utf16 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sft_itinerary`
--

INSERT INTO `sft_itinerary` (`id`, `day_number`, `language_id`, `welness_id`, `wellness_title`, `description`) VALUES
(3, 1, 2, 1, '', ' Ut ultricies, sem quis efficitur rhoncus, orci mauris pellentesque ex, cursus elementum ante libero ac dolor. Interdum et malesuada fames ac ante ipsum primis in faucibus. Phasellus id metus nec nunc porta rutrum sit amet vitae lacus. Morbi ut mattis mauris. Duis consectetur pulvinar erat et lobortis. Phasellus eget nulla ac purus condimentum fringilla. Vestibulum dignissim nunc et purus aliquet aliquet. Vestibulum neque ex, lacinia ut tortor interdum, euismod pellentesque felis. Praesent suscipit in lorem ac commodo. Mauris placerat suscipit porta.'),
(4, 2, 2, 1, '', 'Praesent suscipit in lorem ac commodo. Mauris placerat suscipit porta.'),
(5, 3, 2, 1, '', ' lacinia ut tortor interdum, euismod pellentesque felis. Praesent suscipit in lorem ac commodo. Mauris placerat suscipit porta.'),
(26, 1, 1, 2, 'sadasdsa', 'asdfasdfasdf asdfas dfasd ADSSAD ASDS'),
(27, 2, 1, 2, 'XXXXXXXXXXXXXX', 'asdfasd asdfasdf asdf  awefawer awer aewrfqwe '),
(28, 3, 1, 2, 'czxcv sfhsdf', 'abcd teadasd');

-- --------------------------------------------------------

--
-- Table structure for table `sft_language`
--

CREATE TABLE `sft_language` (
  `id` int(11) NOT NULL,
  `language_name` varchar(40) NOT NULL,
  `code` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `sft_media` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(16, 'uploads//medias', 1, 133785.6, 'media_147902297354533.jpg', '.jpg', 1, 'media_147902297354533', 'C:/xampp/htdocs/sft/uploads/medias/', '2016-11-13 08:42:53', '2016-11-13 08:42:53'),
(17, 'uploads//medias', 1, 109834.24, 'media_147927230528212.JPG', '.JPG', 1, 'media_147927230528212', 'C:/xampp/htdocs/sft/uploads/medias/', '2016-11-16 05:58:25', '2016-11-16 05:58:25'),
(18, 'uploads//medias', 1, 75765.76, 'media_147927230627984.jpg', '.jpg', 1, 'media_147927230627984', 'C:/xampp/htdocs/sft/uploads/medias/', '2016-11-16 05:58:26', '2016-11-16 05:58:26'),
(19, 'uploads//medias', 1, 97024, 'media_147927237058133.jpg', '.jpg', 1, 'media_147927237058133', 'C:/xampp/htdocs/sft/uploads/medias/', '2016-11-16 05:59:30', '2016-11-16 05:59:30'),
(20, 'uploads//medias', 1, 93798.4, 'media_147927237197214.jpg', '.jpg', 1, 'media_147927237197214', 'C:/xampp/htdocs/sft/uploads/medias/', '2016-11-16 05:59:31', '2016-11-16 05:59:31'),
(21, 'uploads/medias', 1, 373248, 'media_148156455747471.jpg', '.jpg', 1, 'media_148156455747471', 'C:/xampp/htdocs/sft/uploads/medias/', '2016-12-12 18:42:37', '2016-12-12 18:42:37');

-- --------------------------------------------------------

--
-- Table structure for table `sft_partner`
--

CREATE TABLE `sft_partner` (
  `id` int(11) NOT NULL,
  `partner_name` varchar(222) NOT NULL,
  `partner_logo` varchar(400) NOT NULL,
  `wellness_type_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `continent_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=active,0=inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sft_partner`
--

INSERT INTO `sft_partner` (`id`, `partner_name`, `partner_logo`, `wellness_type_id`, `country_id`, `continent_id`, `status`) VALUES
(1, 'Kamalaya', '1', 1, 0, 0, 0),
(2, 'Spring Gold', '6', 1, 1, 0, 1),
(4, 'asfasdfasd123', '1', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sft_partner_award`
--

CREATE TABLE `sft_partner_award` (
  `id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL,
  `award` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sft_partner_award`
--

INSERT INTO `sft_partner_award` (`id`, `language_id`, `partner_id`, `award`) VALUES
(4, 1, 4, 'asdf asdfasd fasd '),
(5, 1, 4, '2nd data'),
(6, 1, 4, '3rd data');

-- --------------------------------------------------------

--
-- Table structure for table `sft_room_image`
--

CREATE TABLE `sft_room_image` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sft_room_image`
--

INSERT INTO `sft_room_image` (`id`, `room_id`, `media_id`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 1, 2),
(4, 1, 3),
(5, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `sft_room_lang`
--

CREATE TABLE `sft_room_lang` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `room_name` varchar(200) CHARACTER SET utf16 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sft_room_lang`
--

INSERT INTO `sft_room_lang` (`id`, `room_id`, `language_id`, `room_name`) VALUES
(1, 1, 1, 'balcony room');

-- --------------------------------------------------------

--
-- Table structure for table `sft_tour_details`
--

CREATE TABLE `sft_tour_details` (
  `id` int(11) NOT NULL,
  `wellness_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sft_tour_details_lang`
--

CREATE TABLE `sft_tour_details_lang` (
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

CREATE TABLE `sft_wellness` (
  `id` int(11) NOT NULL,
  `wellness_name` varchar(200) NOT NULL,
  `type` int(1) NOT NULL COMMENT '1=wellness plus,2=medi plus,3=beauty plus',
  `partner_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `no_of_day` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `pdf` varchar(200) NOT NULL,
  `code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sft_wellness`
--

INSERT INTO `sft_wellness` (`id`, `wellness_name`, `type`, `partner_id`, `program_id`, `room_id`, `country_id`, `no_of_day`, `price`, `pdf`, `code`) VALUES
(1, 'test', 1, 1, 0, 0, 0, 6, 56000, '', '1TN8FXC3'),
(2, 'abcd', 1, 1, 0, 0, 0, 19, 4566, '', 'DW2HOACV');

-- --------------------------------------------------------

--
-- Table structure for table `sft_wellness_image`
--

CREATE TABLE `sft_wellness_image` (
  `id` int(11) NOT NULL,
  `wellness_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sft_wellness_image`
--

INSERT INTO `sft_wellness_image` (`id`, `wellness_id`, `media_id`) VALUES
(21, 2, 5),
(22, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `sft_wellness_lang`
--

CREATE TABLE `sft_wellness_lang` (
  `id` int(11) NOT NULL,
  `welness_id` int(11) NOT NULL,
  `wellness_name_lang` varchar(200) CHARACTER SET utf16 NOT NULL,
  `language_id` int(11) NOT NULL,
  `short_description` text CHARACTER SET utf16 NOT NULL,
  `description` text CHARACTER SET utf16 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sft_wellness_lang`
--

INSERT INTO `sft_wellness_lang` (`id`, `welness_id`, `wellness_name_lang`, `language_id`, `short_description`, `description`) VALUES
(1, 1, 'Test ', 2, 'Aenean vestibulum tempus orci sit amet rutrum. Vestibulum facilisis sagittis nibh in ornare. Nulla facilisi. Pellentesque non augue pretium, scelerisque quam ut, placerat augue', 'Fusce fermentum consequat odio quis hendrerit. Integer molestie ullamcorper sapien, sit amet rhoncus sem bibendum at. Proin cursus suscipit mi, quis dictum quam. Aliquam sed interdum lacus. Suspendisse dignissim blandit enim. Curabitur suscipit euismod facilisis. Vestibulum lacus felis, venenatis nec ornare eget, elementum sit amet purus. Quisque hendrerit sapien sed eros imperdiet, quis dapibus sem pretium. Quisque malesuada lacus nec tellus vulputate, eu mattis ante rutrum. Praesent elit urna, auctor eget sagittis ac, fermentum vel lorem. Nulla malesuada pharetra orci, ut consectetur enim gravida sit amet. Quisque vel enim sollicitudin orci eleifend feugiat a ac lacus. Phasellus non nisi elit. Nunc eget blandit turpis. Nam varius, risus eu porta placerat, tellus erat lacinia turpis, quis commodo nibh lorem quis erat. Fusce sodales blandit risus non finibus.'),
(2, 2, 'adsfasdfasd', 1, 'werfwaerwer', '<p>&nbsp;erwr wqerweqr werwqer wqerqwert weqrery rtywert wertweqwerrt qew</p>\r\n\r\n<p>wqerwqer qwerqwe rqwerqwerwqer qwyu a dsfkljha</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `sft_wellness_program`
--

CREATE TABLE `sft_wellness_program` (
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

CREATE TABLE `sft_wellness_program_lang` (
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

CREATE TABLE `sft_wellness_type` (
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

CREATE TABLE `sft_wellness_type_lang` (
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
(3, 2, 'Medi cộng', '', 2),
(4, 2, 'Medi Plus', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stf_room`
--

CREATE TABLE `stf_room` (
  `id` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL,
  `room_type` varchar(400) CHARACTER SET utf16 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stf_room`
--

INSERT INTO `stf_room` (`id`, `partner_id`, `room_type`) VALUES
(1, 4, 'balcony room');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `continent`
--
ALTER TABLE `continent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `continent_lang`
--
ALTER TABLE `continent_lang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sft_award`
--
ALTER TABLE `sft_award`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sft_award_partner`
--
ALTER TABLE `sft_award_partner`
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
-- Indexes for table `sft_itinerary`
--
ALTER TABLE `sft_itinerary`
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
-- Indexes for table `sft_partner`
--
ALTER TABLE `sft_partner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sft_partner_award`
--
ALTER TABLE `sft_partner_award`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sft_room_image`
--
ALTER TABLE `sft_room_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sft_room_lang`
--
ALTER TABLE `sft_room_lang`
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
-- Indexes for table `sft_wellness_image`
--
ALTER TABLE `sft_wellness_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sft_wellness_lang`
--
ALTER TABLE `sft_wellness_lang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sft_wellness_program`
--
ALTER TABLE `sft_wellness_program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sft_wellness_program_lang`
--
ALTER TABLE `sft_wellness_program_lang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sft_wellness_type`
--
ALTER TABLE `sft_wellness_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sft_wellness_type_lang`
--
ALTER TABLE `sft_wellness_type_lang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stf_room`
--
ALTER TABLE `stf_room`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `continent`
--
ALTER TABLE `continent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `continent_lang`
--
ALTER TABLE `continent_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sft_award`
--
ALTER TABLE `sft_award`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sft_award_partner`
--
ALTER TABLE `sft_award_partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sft_cms_language`
--
ALTER TABLE `sft_cms_language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sft_cms_meta`
--
ALTER TABLE `sft_cms_meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sft_cms_page`
--
ALTER TABLE `sft_cms_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sft_country`
--
ALTER TABLE `sft_country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sft_country_language`
--
ALTER TABLE `sft_country_language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sft_itinerary`
--
ALTER TABLE `sft_itinerary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `sft_language`
--
ALTER TABLE `sft_language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sft_media`
--
ALTER TABLE `sft_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `sft_partner`
--
ALTER TABLE `sft_partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sft_partner_award`
--
ALTER TABLE `sft_partner_award`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sft_room_image`
--
ALTER TABLE `sft_room_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sft_room_lang`
--
ALTER TABLE `sft_room_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sft_tour_details`
--
ALTER TABLE `sft_tour_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sft_wellness`
--
ALTER TABLE `sft_wellness`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sft_wellness_image`
--
ALTER TABLE `sft_wellness_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `sft_wellness_lang`
--
ALTER TABLE `sft_wellness_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sft_wellness_program`
--
ALTER TABLE `sft_wellness_program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sft_wellness_program_lang`
--
ALTER TABLE `sft_wellness_program_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sft_wellness_type`
--
ALTER TABLE `sft_wellness_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sft_wellness_type_lang`
--
ALTER TABLE `sft_wellness_type_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `stf_room`
--
ALTER TABLE `stf_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
