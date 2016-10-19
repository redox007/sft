-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(200) NOT NULL,
  `user_pass` varchar(200) NOT NULL,
  `contact_email` varchar(200) NOT NULL,
  `last_login` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `admin` (`id`, `user_name`, `user_pass`, `contact_email`, `last_login`) VALUES
(1,	'sftwellness',	'e2ff00edd1e85f6170e8611aba11f736',	'kumarbarun137@gmail.com',	'2016-10-19 17:02:15');

DROP TABLE IF EXISTS `sft_cms_language`;
CREATE TABLE `sft_cms_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cms_page_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `sft_cms_meta`;
CREATE TABLE `sft_cms_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cms_page_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `description` text NOT NULL,
  `meta_name` text NOT NULL,
  `tag` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `sft_cms_page`;
CREATE TABLE `sft_cms_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` text NOT NULL,
  `page_name` text NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `sft_country`;
CREATE TABLE `sft_country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `sft_country_language`;
CREATE TABLE `sft_country_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `country_name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `sft_language`;
CREATE TABLE `sft_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_name` varchar(40) NOT NULL,
  `code` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `sft_media`;
CREATE TABLE `sft_media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(600) NOT NULL,
  `type` int(1) NOT NULL COMMENT '1=image,2=video',
  `size` int(11) NOT NULL,
  `media_name` text NOT NULL,
  `extension` varchar(200) NOT NULL,
  `media_used_type` int(1) NOT NULL COMMENT '1=Global,2=SFT Buddy',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `sft_tour_details`;
CREATE TABLE `sft_tour_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wellness_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `sft_tour_details_lang`;
CREATE TABLE `sft_tour_details_lang` (
  `id` int(11) NOT NULL,
  `tour_details_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `language_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `sft_wellness`;
CREATE TABLE `sft_wellness` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(1) NOT NULL COMMENT '1=wellness plus,2=medi plus,3=beauty plus',
  `country_id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `sft_wellness_lang`;
CREATE TABLE `sft_wellness_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `welness_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `short_description` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2016-10-19 17:24:41
