-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2016 at 06:11 PM
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
(1, 'sftadmin', 'ecf255cf24c56b2cfbf6b918729da07f', 'kumarbarun137@gmail.com', '2016-11-10 17:55:49');

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
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sft_country`
--

CREATE TABLE `sft_country` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sft_country_language`
--

CREATE TABLE `sft_country_language` (
  `id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `country_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(15, 'uploads//medias', 1, 373248, 'media_147879724384220.jpg', '.jpg', 1, 'media_147879724384220', 'C:/xampp/htdocs/sft/uploads/medias/', '2016-11-10 18:00:43', '2016-11-10 18:00:43');

-- --------------------------------------------------------

--
-- Table structure for table `sft_partner`
--

CREATE TABLE `sft_partner` (
  `id` int(11) NOT NULL,
  `partner_name` varchar(222) NOT NULL,
  `partner_logo` varchar(400) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=active,0=inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sft_partner`
--

INSERT INTO `sft_partner` (`id`, `partner_name`, `partner_logo`, `status`) VALUES
(1, 'Kamalaya', '1', 0),
(2, 'Spring Gold', '', 0);

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
  `type` int(1) NOT NULL COMMENT '1=wellness plus,2=medi plus,3=beauty plus',
  `country_id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sft_wellness_lang`
--

CREATE TABLE `sft_wellness_lang` (
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

CREATE TABLE `sft_wellness_program` (
  `id` int(11) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sft_wellness_program`
--

INSERT INTO `sft_wellness_program` (`id`, `created_on`) VALUES
(1, '2016-11-03 07:10:03');

-- --------------------------------------------------------

--
-- Table structure for table `sft_wellness_program_lang`
--

CREATE TABLE `sft_wellness_program_lang` (
  `id` int(11) NOT NULL,
  `wellness_program_id` int(11) NOT NULL,
  `program_name` varchar(222) NOT NULL,
  `short_description` text NOT NULL,
  `language_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sft_wellness_program_lang`
--

INSERT INTO `sft_wellness_program_lang` (`id`, `wellness_program_id`, `program_name`, `short_description`, `language_id`) VALUES
(1, 1, 'Healthy Lifestyle', 'Fusce pulvinar nibh pellentesque cursus congue. Duis sollicitudin porttitor condimentum. Fusce accumsan metus in massa scelerisque pretium. Ut porta ante nunc, a molestie ex pellentesque id. Nulla ante risus, imperdiet et consequat quis, tristique vel neque. Praesent ac consequat magna, sed interdum lacus. Nunc a fringilla felis. Vestibulum est ante, malesuada eget mi id, ornare finibus mi. Aenean vitae turpis accumsan, viverra odio et, consequat mauris. Ut vel facilisis lorem, at semper ante. Integer condimentum sodales orci, et varius nibh sodales vel. Cras enim massa, hendrerit ac congue at, cursus non lectus.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sft_wellness_type`
--

CREATE TABLE `sft_wellness_type` (
  `id` int(11) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sft_wellness_type`
--

INSERT INTO `sft_wellness_type` (`id`, `created_on`) VALUES
(1, '2016-11-03 06:05:28'),
(2, '2016-11-03 06:17:26'),
(3, '2016-11-03 06:19:28'),
(4, '2016-11-03 06:20:31'),
(5, '2016-11-03 06:23:16');

-- --------------------------------------------------------

--
-- Table structure for table `sft_wellness_type_lang`
--

CREATE TABLE `sft_wellness_type_lang` (
  `id` int(11) NOT NULL,
  `wellness_type_id` int(11) NOT NULL,
  `type_name` varchar(100) NOT NULL,
  `short_description` text NOT NULL,
  `language_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sft_wellness_type_lang`
--

INSERT INTO `sft_wellness_type_lang` (`id`, `wellness_type_id`, `type_name`, `short_description`, `language_id`) VALUES
(1, 1, 'Wellness Plus', '                                                                                                                                                                                                                                                            Nunc mattis odio a neque pulvinar, nec molestie tortor dapibus. Vivamus faucibus vitae erat non ultrices. Cras ornare placerat tincidunt. Pellentesque consequat pretium quam, eget congue arcu congue in. Pellentesque ac tincidunt eros.                                                                                                                                                                                                                             ', 1),
(2, 2, 'Medi Plus', '                                                                        Fusce pulvinar nibh pellentesque cursus congue. Duis sollicitudin porttitor condimentum. Fusce accumsan metus in massa scelerisque pretium. Ut porta ante nunc, a molestie ex pellentesque id. Nulla ante risus, imperdiet et consequat quis, tristique vel neque. Praesent ac consequat magna, sed interdum lacus. Nunc a fringilla felis. Vestibulum est ante, malesuada eget mi id, ornare finibus mi. Aenean vitae turpis accumsan, viverra odio et, consequat mauris. Ut vel facilisis lorem, at semper ante. Integer condimentum sodales orci, et varius nibh sodales vel. Cras enim massa, hendrerit ac congue at, cursus non lectus.                                                                ', 1),
(3, 3, 'Beauty Thêm', '                                    bóng chi?u dài ??y ?? h?n v? trung và t?t, Bavuma flicks nó ??n gi?a wicket n?i Khawaja ???c ??u ngón tay vào bóng. Nó cu?i cùng d?ng l?i g?n hàng rào. Ba ch?y l?y.                                ', 2),
(4, 4, 'Beauty Plus', '                                                                        Fuller length ball on middle and off, Bavuma flicks it through mid-wicket where Khawaja gets his fingertips on the ball. It''s eventually stopped near the fence. Three runs taken.                                                                ', 1),
(5, 5, 'Mediplus', 'Du Plessis và Bavuma ?ã ??n v?i nhau ?? khâu 46-ch?y h?p tác ??y h?a h?n. H? ?ã nhìn hoàn toàn tho?i mái và ?ã nháy v?i s? t? tin tuy?t ??i. H? v?n c?n ph?i gi?i c?u phía h? ra kh?i r?c r?i. ??i ch? nhà s? xem xét ?? phá v? các quan h? ??i tác r?t quan tr?ng và có m?t ?i vào tr?t t? trung bình th?p. Tham gia v?i chúng tôi trong m?t chút cho các phiên sau b?a ?n tr?a.', 2);

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
-- Indexes for table `sft_partner`
--
ALTER TABLE `sft_partner`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sft_cms_language`
--
ALTER TABLE `sft_cms_language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sft_media`
--
ALTER TABLE `sft_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `sft_partner`
--
ALTER TABLE `sft_partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
-- AUTO_INCREMENT for table `sft_wellness_program`
--
ALTER TABLE `sft_wellness_program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sft_wellness_program_lang`
--
ALTER TABLE `sft_wellness_program_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sft_wellness_type`
--
ALTER TABLE `sft_wellness_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sft_wellness_type_lang`
--
ALTER TABLE `sft_wellness_type_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
