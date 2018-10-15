-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 15, 2018 at 11:23 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `clinic12`
--
CREATE DATABASE IF NOT EXISTS `clinic12` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `clinic12`;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_doctor_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `comment_type` smallint(6) NOT NULL DEFAULT '1' COMMENT 'for future use, 1 is default',
  `create_date` int(11) NOT NULL,
  `last_edit_time` int(11) NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `patient_doctor_id` (`patient_doctor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `patient_doctor_id`, `comment`, `comment_type`, `create_date`, `last_edit_time`) VALUES
(1, 15, 'dsadas d', 1, 1539206086, 1539206086),
(2, 15, 'ملاحظة تانية', 1, 1539206100, 1539206100),
(3, 4, 'هاذ تعليق من الطبيب', 1, 1539239993, 1539239993),
(4, 13, 'ystyidtyi', 1, 1539246131, 1539246131),
(5, 1, 'Test', 1, 1539264097, 1539264097),
(6, 1, 'asd', 1, 1539297053, 1539297053),
(7, 18, 'التشخيص التهاب قصبات', 1, 1539344838, 1539344838),
(8, 5, 'kjl', 1, 1539358706, 1539358706),
(9, 5, 'kjl', 1, 1539358707, 1539358707),
(10, 5, 'kjl', 1, 1539358707, 1539358707),
(11, 7, 'dsas', 1, 1539469571, 1539469571);

-- --------------------------------------------------------

--
-- Table structure for table `consumes`
--

CREATE TABLE IF NOT EXISTS `consumes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `count` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `consumes`
--

INSERT INTO `consumes` (`id`, `name`, `count`, `doctor_id`, `date`, `price`) VALUES
(8, 'فاتورة المياه', 1, 4, '2018-10-03', 2000),
(9, 'ادوية', 1, 4, '2018-10-06', 2000),
(11, 'جبس بلاستك 4انش', 5, 7, '2018-10-12', 1500);

-- --------------------------------------------------------

--
-- Table structure for table `diagnoses`
--

CREATE TABLE IF NOT EXISTS `diagnoses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `diagnose_name_en` mediumtext NOT NULL,
  `diagnose_name_ar` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `diagnoses`
--

INSERT INTO `diagnoses` (`id`, `diagnose_name_en`, `diagnose_name_ar`, `description`) VALUES
(4, 'يسيسش', 'يسيسش', 'يشسيشسيش');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE IF NOT EXISTS `doctors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `address`, `phone`, `created_date`) VALUES
(4, 'د.محمد شباط', 'جديدة', '0994364545', '2018-10-06'),
(5, 'د.نور شماس', 'دمشق', '0964536453', '2018-10-06'),
(6, 'د.ماهر ابو صعب', 'دمشق', '09434242342', '2018-10-06'),
(7, 'د.احمد ابو سرور', 'حلب', '09543534534', '2018-10-06');

-- --------------------------------------------------------

--
-- Table structure for table `drugs`
--

CREATE TABLE IF NOT EXISTS `drugs` (
  `drug_id` int(11) NOT NULL AUTO_INCREMENT,
  `drug_name_en` varchar(50) DEFAULT NULL,
  `drug_name_ar` varchar(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `price` decimal(10,0) NOT NULL,
  `num` int(11) NOT NULL DEFAULT '0',
  `memo` text,
  PRIMARY KEY (`drug_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `drugs`
--

INSERT INTO `drugs` (`drug_id`, `drug_name_en`, `drug_name_ar`, `category`, `price`, `num`, `memo`) VALUES
(5, 'Doplamin', 'دوبلامين', 'حبوب', '2000', 0, 'ملخص عن الدواء');

-- --------------------------------------------------------

--
-- Table structure for table `drug_patient`
--

CREATE TABLE IF NOT EXISTS `drug_patient` (
  `drug_patient_id` int(11) NOT NULL AUTO_INCREMENT,
  `drug_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `user_id_assign` int(11) NOT NULL,
  `assign_date` int(11) NOT NULL,
  `no_of_item` int(11) NOT NULL DEFAULT '1',
  `total_cost` decimal(10,0) NOT NULL,
  `user_id_discharge` int(11) DEFAULT NULL,
  `discharge_date` int(11) DEFAULT NULL,
  `memo` text,
  PRIMARY KEY (`drug_patient_id`),
  KEY `drug_id` (`drug_id`),
  KEY `patient_id` (`patient_id`),
  KEY `user_id_assign` (`user_id_assign`),
  KEY `user_id_discharge` (`user_id_discharge`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `drug_patient`
--

INSERT INTO `drug_patient` (`drug_patient_id`, `drug_id`, `patient_id`, `user_id_assign`, `assign_date`, `no_of_item`, `total_cost`, `user_id_discharge`, `discharge_date`, `memo`) VALUES
(1, 5, 15, 1, 1539206177, 7, '14000', 1, 1539299334, ''),
(2, 5, 13, 1, 1539207378, 11, '22000', 1, 1539281061, ''),
(4, 5, 11, 1, 1539241975, 4, '8000', 1, 1539429309, ''),
(5, 5, 14, 1, 1539250386, 1, '2000', NULL, NULL, ''),
(6, 5, 15, 1, 1539263919, 1, '2000', 1, 1539299331, ''),
(7, 5, 15, 1, 1539263938, 33, '66000', 1, 1539299332, ''),
(8, 5, 13, 1, 1539281076, 1, '2000', NULL, NULL, ''),
(11, 5, 12, 1, 1539331889, 1, '2000', NULL, NULL, ''),
(12, 5, 18, 1, 1539344894, 1, '2000', NULL, NULL, ''),
(13, 5, 12, 1, 1539347945, 1, '2000', NULL, NULL, ''),
(14, 5, 12, 1, 1539347945, 1, '2000', NULL, NULL, ''),
(15, 5, 8, 1, 1539469592, 1, '2000', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `group_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(48) NOT NULL,
  `description` text NOT NULL,
  `roles` bigint(20) unsigned NOT NULL DEFAULT '2',
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `name`, `description`, `roles`) VALUES
(1, 'Administrator', '', 1),
(2, 'Guest', '', 2),
(3, 'Doctor', '', 4),
(4, 'X-Ray Agent', '', 8),
(5, 'Laboratory Agent', '', 16),
(6, 'Pharmacy Agent', '', 32),
(7, 'Receptionist', '', 64),
(8, 'Patient', '', 128),
(9, 'اختبار', 'هذه العملية عمليه اختبار', 4);

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE IF NOT EXISTS `incomes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `type` enum('static','normal') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=34 ;

--
-- Dumping data for table `incomes`
--

INSERT INTO `incomes` (`id`, `doctor_id`, `patient_id`, `amount`, `date`, `type`) VALUES
(2, 4, 1, 2000, '2018-09-01', 'static'),
(3, 5, 2, 1000, '2018-09-01', 'normal'),
(4, 6, 3, 1000, '2018-09-01', 'static'),
(5, 4, 4, 1000, '2018-09-05', 'normal'),
(6, 7, 2, 1000, '2018-09-01', 'normal'),
(9, 4, 3, 2000, '2018-09-01', 'static'),
(11, 7, 4, 2000, '2018-09-08', 'normal'),
(13, 5, 1, 1000, '2018-10-06', 'normal'),
(14, 5, 3, 4000, '2018-10-05', 'normal'),
(15, 5, 1, 1050, '2018-10-13', 'normal'),
(16, 5, 4, 4500, '2018-10-06', 'normal'),
(17, 4, 1, 1500, '2018-10-05', 'normal'),
(18, 5, 2, 1000, '2018-10-06', 'normal'),
(21, 5, 3, 1000, '2018-10-06', 'static'),
(22, 4, 4, 1000, '2018-10-06', 'normal'),
(23, 4, 1, 2000, '2018-10-06', 'normal'),
(24, 5, 2, 1000, '2018-10-06', 'static'),
(25, 5, 1, 3000, '2018-10-06', 'normal'),
(26, 4, 2, 2000, '2018-10-06', 'normal'),
(27, 5, 6, 1000, '2018-10-08', 'static'),
(28, 5, 1, 2000, '2018-10-08', 'normal'),
(29, 5, 2, 1500, '2018-10-08', 'normal'),
(30, 5, 7, 2000, '2018-10-08', 'normal'),
(31, 5, 4, 500, '2018-10-08', 'static'),
(32, 5, 1, 3000, '2018-10-06', 'normal'),
(33, 5, 6, 2000, '2018-10-06', 'normal');

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE IF NOT EXISTS `lab` (
  `test_id` int(11) NOT NULL AUTO_INCREMENT,
  `test_name_en` varchar(50) DEFAULT NULL,
  `test_name_ar` varchar(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `price` decimal(10,0) NOT NULL,
  `memo` text,
  PRIMARY KEY (`test_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`test_id`, `test_name_en`, `test_name_ar`, `category`, `price`, `memo`) VALUES
(6, 'test', 'تحليل دم', 'نوع التحليل', '2000', 'ملخص عن التحليل'),
(7, 'cbc', 'تعداد عام وصيغة', '', '1400', ''),
(8, 'ASLO', 'ASL0', 'hem', '1000', ''),
(9, 'glocous', 'سكر', '', '1000', 'على الريق\nعشوائي');

-- --------------------------------------------------------

--
-- Table structure for table `lab_files`
--

CREATE TABLE IF NOT EXISTS `lab_files` (
  `lab_file_id` int(11) NOT NULL AUTO_INCREMENT,
  `lab_patient_id` int(11) NOT NULL,
  `upload_date` int(11) NOT NULL,
  `path` text NOT NULL,
  `memo` text,
  PRIMARY KEY (`lab_file_id`),
  KEY `lab_patient_id` (`lab_patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lab_patient`
--

CREATE TABLE IF NOT EXISTS `lab_patient` (
  `lab_patient_id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `user_id_assign` int(11) NOT NULL,
  `assign_date` int(11) NOT NULL,
  `no_of_item` int(11) NOT NULL DEFAULT '1',
  `total_cost` decimal(10,0) NOT NULL,
  `user_id_discharge` int(11) DEFAULT NULL,
  `discharge_date` int(11) DEFAULT NULL,
  `memo` text,
  PRIMARY KEY (`lab_patient_id`),
  KEY `test_id` (`test_id`),
  KEY `patient_id` (`patient_id`),
  KEY `user_id_assign` (`user_id_assign`),
  KEY `user_id_discharge` (`user_id_discharge`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `lab_patient`
--

INSERT INTO `lab_patient` (`lab_patient_id`, `test_id`, `patient_id`, `user_id_assign`, `assign_date`, `no_of_item`, `total_cost`, `user_id_discharge`, `discharge_date`, `memo`) VALUES
(3, 6, 13, 1, 1539279677, 1, '2000', NULL, NULL, ''),
(4, 8, 13, 1, 1539280212, 1, '1000', 1, 1539280222, ''),
(5, 6, 10, 1, 1539297138, 1, '2000', NULL, NULL, ''),
(6, 7, 2, 1, 1539299067, 1, '1400', NULL, NULL, ''),
(8, 7, 18, 1, 1539345001, 1, '1400', NULL, NULL, ''),
(9, 8, 12, 1, 1539347267, 1, '1000', NULL, NULL, ''),
(10, 9, 12, 1, 1539347521, 1, '1000', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE IF NOT EXISTS `logins` (
  `login_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `success` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`login_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=201 ;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`login_id`, `ip_address`, `user_id`, `time`, `success`) VALUES
(1, 0, 1, '2018-09-19 15:00:21', 1),
(2, 0, 1, '2018-09-19 15:00:38', 1),
(3, 0, 1, '2018-09-19 16:45:28', 1),
(4, 0, 1, '2018-09-19 16:45:46', 1),
(5, 0, 1, '2018-09-19 18:45:48', 1),
(6, 0, 1, '2018-09-19 18:45:55', 1),
(7, 0, 1, '2018-09-20 05:05:01', 1),
(8, 0, 1, '2018-09-20 05:05:01', 1),
(9, 0, 2, '2018-09-20 05:05:53', 1),
(10, 0, 1, '2018-09-20 07:29:19', 1),
(11, 0, 2, '2018-09-20 07:34:16', 1),
(12, 0, 1, '2018-09-20 07:59:10', 1),
(13, 0, 1, '2018-09-20 09:16:01', 1),
(14, 0, 1, '2018-09-20 09:21:52', 1),
(15, 0, 1, '2018-09-24 13:09:37', 1),
(16, 0, 1, '2018-09-24 19:56:31', 1),
(17, 0, 1, '2018-09-25 13:28:32', 1),
(18, 0, 1, '2018-09-26 07:25:19', 1),
(19, 0, 2, '2018-09-26 07:31:12', 1),
(20, 0, 2, '2018-09-26 13:27:27', 1),
(21, 0, 2, '2018-09-26 13:27:27', 1),
(22, 0, 1, '2018-09-26 13:27:51', 1),
(23, 0, 1, '2018-09-26 14:01:31', 1),
(24, 0, 1, '2018-09-26 16:55:03', 1),
(25, 0, 1, '2018-09-27 18:50:09', 1),
(26, 0, 1, '2018-09-27 18:50:10', 0),
(27, 0, 1, '2018-09-27 18:50:23', 1),
(28, 0, 1, '2018-09-27 19:17:57', 1),
(29, 0, 1, '2018-09-28 09:16:41', 1),
(30, 0, 1, '2018-09-28 09:16:41', 1),
(31, 0, 1, '2018-09-28 09:45:38', 1),
(32, 0, 1, '2018-09-28 13:18:54', 1),
(33, 0, 1, '2018-09-28 15:26:07', 1),
(34, 0, 2, '2018-09-28 16:22:28', 1),
(35, 0, 1, '2018-09-28 16:23:50', 1),
(36, 0, 1, '2018-09-28 20:48:52', 1),
(37, 0, 1, '2018-09-29 04:21:28', 0),
(38, 0, 1, '2018-09-29 04:21:37', 1),
(39, 0, 1, '2018-09-29 04:36:52', 1),
(40, 0, 1, '2018-09-29 04:37:03', 1),
(41, 0, 1, '2018-09-29 05:30:00', 0),
(42, 0, 1, '2018-09-29 05:30:06', 1),
(43, 0, 1, '2018-09-29 05:49:40', 1),
(44, 0, 1, '2018-09-29 14:40:45', 1),
(45, 0, 1, '2018-09-29 17:48:30', 1),
(46, 0, 1, '2018-09-30 07:10:52', 1),
(47, 0, 1, '2018-09-30 07:10:52', 1),
(48, 0, 1, '2018-09-30 11:10:11', 1),
(49, 0, 1, '2018-09-30 14:11:32', 1),
(50, 1560104100, 1, '2018-10-01 02:01:19', 1),
(51, 1580140481, 1, '2018-10-01 02:03:11', 1),
(52, 1580140481, 1, '2018-10-01 02:16:12', 1),
(53, 3116200846, 1, '2018-10-01 03:41:16', 1),
(54, 1334724339, 1, '2018-10-01 15:42:04', 1),
(55, 1580140481, 1, '2018-10-01 16:07:36', 1),
(56, 1580140481, 1, '2018-10-01 16:40:39', 1),
(57, 1580141125, 1, '2018-10-01 19:29:17', 1),
(58, 1580140481, 1, '2018-10-01 21:01:17', 1),
(59, 1580140481, 1, '2018-10-01 23:49:23', 1),
(60, 1580140481, 1, '2018-10-02 00:28:58', 1),
(61, 1334724339, 1, '2018-10-02 02:28:50', 1),
(62, 1334724339, 1, '2018-10-02 02:32:28', 1),
(63, 1580140481, 2, '2018-10-02 04:48:54', 1),
(64, 1580140481, 1, '2018-10-02 04:49:52', 1),
(65, 1580140481, 1, '2018-10-02 09:24:19', 1),
(66, 83919838, 1, '2018-10-02 15:02:06', 1),
(67, 83919838, 1, '2018-10-02 18:06:35', 1),
(68, 83919838, 1, '2018-10-02 18:11:22', 1),
(69, 83919838, 1, '2018-10-02 19:58:48', 1),
(70, 83919838, 1, '2018-10-02 19:59:09', 1),
(71, 83919838, 1, '2018-10-02 23:53:15', 1),
(72, 83919838, 2, '2018-10-03 00:38:48', 1),
(73, 83919838, 1, '2018-10-03 00:39:37', 1),
(74, 83889942, 1, '2018-10-03 00:55:50', 1),
(75, 83919838, 1, '2018-10-03 01:53:52', 1),
(76, 83919838, 1, '2018-10-03 05:03:57', 1),
(77, 1296312357, 1, '2018-10-03 13:22:44', 1),
(78, 1296312357, 1, '2018-10-03 13:22:44', 1),
(79, 83919838, 1, '2018-10-03 13:54:00', 1),
(80, 83889942, 1, '2018-10-03 14:52:11', 1),
(81, 83892053, 1, '2018-10-03 19:33:35', 1),
(82, 83889942, 1, '2018-10-03 19:40:09', 1),
(83, 83892053, 1, '2018-10-03 20:15:30', 1),
(84, 83892053, 1, '2018-10-03 20:35:05', 1),
(85, 83892053, 1, '2018-10-03 21:27:01', 1),
(86, 83889139, 1, '2018-10-03 22:34:06', 1),
(87, 83889139, 1, '2018-10-03 23:21:16', 1),
(88, 83889139, 1, '2018-10-04 00:33:26', 1),
(89, 3573891083, 1, '2018-10-04 02:45:44', 1),
(90, 83889139, 1, '2018-10-04 04:58:16', 1),
(91, 2342702928, 1, '2018-10-04 10:10:39', 1),
(92, 83889139, 1, '2018-10-04 10:15:29', 1),
(93, 1580146387, 1, '2018-10-04 14:50:14', 1),
(94, 94082398, 1, '2018-10-04 21:14:19', 1),
(95, 3162840589, 1, '2018-10-05 00:41:12', 1),
(96, 3651148258, 1, '2018-10-05 04:12:53', 1),
(97, 3162840589, 1, '2018-10-05 05:08:29', 1),
(98, 3162840589, 1, '2018-10-05 06:12:35', 1),
(99, 3162840589, 1, '2018-10-05 14:45:18', 1),
(100, 83922309, 1, '2018-10-05 15:19:15', 1),
(101, 3162840589, 1, '2018-10-05 18:14:03', 1),
(102, 83922309, 1, '2018-10-05 18:36:29', 1),
(103, 83922309, 1, '2018-10-05 18:36:36', 1),
(104, 1580174492, 1, '2018-10-05 18:45:41', 1),
(105, 3162840589, 1, '2018-10-05 18:46:29', 1),
(106, 3162840589, 1, '2018-10-05 18:56:38', 1),
(107, 3162840589, 1, '2018-10-05 18:57:18', 1),
(108, 1580145601, 1, '2018-10-05 19:26:27', 1),
(109, 83922309, 1, '2018-10-05 23:03:38', 1),
(110, 1580174492, 1, '2018-10-05 23:41:12', 1),
(111, 3162840589, 1, '2018-10-06 02:34:03', 1),
(112, 3162840589, 1, '2018-10-06 02:34:04', 0),
(113, 3162840589, 1, '2018-10-06 02:34:09', 1),
(114, 3162840589, 1, '2018-10-06 06:17:45', 1),
(115, 1760396232, 1, '2018-10-06 10:02:47', 1),
(116, 83923930, 1, '2018-10-06 14:31:43', 1),
(117, 83923930, 1, '2018-10-06 14:56:02', 1),
(118, 83923930, 1, '2018-10-06 14:56:12', 1),
(119, 1760396232, 1, '2018-10-06 15:35:25', 1),
(120, 83923385, 1, '2018-10-06 16:19:26', 1),
(121, 83923930, 1, '2018-10-06 21:44:15', 1),
(122, 1760396232, 1, '2018-10-06 21:53:01', 1),
(123, 1580174492, 1, '2018-10-07 01:11:55', 1),
(124, 83923930, 1, '2018-10-07 04:57:59', 1),
(125, 83923930, 1, '2018-10-07 14:48:35', 1),
(126, 1580142585, 1, '2018-10-07 15:19:06', 1),
(127, 1580142585, 1, '2018-10-07 16:38:37', 1),
(128, 83923385, 1, '2018-10-07 20:56:21', 1),
(129, 83890660, 1, '2018-10-07 21:10:11', 1),
(130, 83890660, 1, '2018-10-07 21:17:33', 1),
(131, 83890660, 1, '2018-10-07 21:30:56', 1),
(132, 83890660, 1, '2018-10-07 21:40:30', 1),
(133, 83890660, 1, '2018-10-07 22:07:36', 1),
(134, 1760396232, 1, '2018-10-07 23:32:38', 1),
(135, 83890660, 1, '2018-10-07 23:49:12', 1),
(136, 83890660, 1, '2018-10-08 02:13:03', 1),
(137, 83890660, 1, '2018-10-08 04:03:38', 1),
(138, 83890660, 1, '2018-10-08 05:17:00', 1),
(139, 1580142920, 1, '2018-10-08 10:13:40', 1),
(140, 83890660, 1, '2018-10-08 14:09:52', 1),
(141, 1580142920, 1, '2018-10-08 14:16:53', 1),
(142, 1760396232, 1, '2018-10-08 14:18:06', 1),
(143, 83890660, 1, '2018-10-08 15:06:42', 1),
(144, 1760396232, 1, '2018-10-08 17:22:39', 1),
(145, 83923213, 1, '2018-10-08 17:23:04', 1),
(146, 83923213, 3, '2018-10-08 17:32:04', 1),
(147, 83923213, 1, '2018-10-08 17:32:57', 1),
(148, 3104379795, 1, '2018-10-08 19:30:39', 1),
(149, 3104379795, 1, '2018-10-08 19:37:05', 1),
(150, 3104379795, 1, '2018-10-08 19:37:59', 1),
(151, 3104379795, 1, '2018-10-08 19:42:18', 1),
(152, 1384761388, 1, '2018-10-08 22:55:57', 1),
(153, 3584806276, 1, '2018-10-08 23:20:37', 1),
(154, 1843673519, 1, '2018-10-08 23:35:32', 1),
(155, 3584806276, 1, '2018-10-08 23:41:54', 1),
(156, 3584806276, 1, '2018-10-08 23:45:30', 1),
(157, 1580142061, 1, '2018-10-08 23:50:02', 1),
(158, 1843673519, 1, '2018-10-09 02:56:49', 1),
(159, 94050898, 1, '2018-10-09 03:07:10', 1),
(160, 1384761388, 1, '2018-10-09 12:40:41', 1),
(161, 1384761402, 1, '2018-10-09 13:13:00', 1),
(162, 520719198, 1, '2018-10-09 15:14:49', 1),
(163, 1384761382, 1, '2018-10-09 17:01:45', 1),
(164, 520719198, 1, '2018-10-09 18:08:44', 1),
(165, 1384761402, 1, '2018-10-09 21:34:22', 1),
(166, 1384761382, 1, '2018-10-10 01:50:19', 1),
(167, 520722647, 1, '2018-10-10 09:35:40', 1),
(168, 83924595, 1, '2018-10-10 16:45:35', 1),
(169, 83924595, 1, '2018-10-10 17:09:11', 1),
(170, 520719198, 1, '2018-10-10 19:20:33', 1),
(171, 1580139967, 1, '2018-10-10 20:15:02', 1),
(172, 83924595, 1, '2018-10-11 01:44:07', 1),
(173, 83924595, 1, '2018-10-11 13:05:25', 1),
(174, 1580139967, 1, '2018-10-11 15:21:26', 1),
(175, 83892004, 1, '2018-10-11 20:16:10', 1),
(176, 83924595, 1, '2018-10-11 21:29:59', 1),
(177, 758675296, 1, '2018-10-12 10:09:34', 1),
(178, 1439464630, 1, '2018-10-12 11:39:15', 1),
(179, 1580144641, 1, '2018-10-12 11:53:30', 1),
(180, 1580144641, 1, '2018-10-12 14:14:28', 1),
(181, 1439464630, 1, '2018-10-12 14:55:45', 1),
(182, 1580144641, 1, '2018-10-12 15:33:19', 1),
(183, 94052191, 1, '2018-10-12 18:43:32', 1),
(184, 2989755416, 1, '2018-10-12 21:37:29', 1),
(185, 1439464630, 1, '2018-10-12 22:38:08', 1),
(186, 94052191, 1, '2018-10-12 22:45:41', 1),
(187, 758675296, 1, '2018-10-12 23:37:43', 1),
(188, 94077560, 1, '2018-10-13 14:34:03', 1),
(189, 0, 1, '2018-10-13 07:46:04', 1),
(190, 0, 1, '2018-10-13 08:13:32', 1),
(191, 0, 1, '2018-10-13 08:13:46', 1),
(192, 0, 1, '2018-10-13 17:24:26', 1),
(193, 0, 1, '2018-10-13 18:28:18', 1),
(194, 0, 1, '2018-10-13 19:03:51', 1),
(195, 0, 1, '2018-10-14 08:43:59', 0),
(196, 0, 1, '2018-10-14 08:44:02', 1),
(197, 0, 1, '2018-10-14 16:08:50', 1),
(198, 0, 1, '2018-10-15 04:39:00', 1),
(199, 0, 1, '2018-10-15 05:30:18', 1),
(200, 0, 1, '2018-10-15 13:28:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nurses`
--

CREATE TABLE IF NOT EXISTS `nurses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `nurses`
--

INSERT INTO `nurses` (`id`, `name`, `age`, `phone`, `address`) VALUES
(3, 'تقى', 5, '55', 'دمشق'),
(4, 'ريم', 22, '0943434343', 'دمشق');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE IF NOT EXISTS `patients` (
  `patient_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) DEFAULT NULL,
  `fname` varchar(40) DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `social_id` varchar(12) DEFAULT NULL,
  `id_type` enum('','Tazkara','Passport','Driver License','Bank ID Card') DEFAULT NULL,
  `birth_date` int(11) DEFAULT NULL,
  `create_date` int(11) NOT NULL,
  `picture` text,
  `memo` text,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `first_name`, `last_name`, `fname`, `gender`, `email`, `phone`, `address`, `social_id`, `id_type`, `birth_date`, `create_date`, `picture`, `memo`) VALUES
(1, 'احمد', 'سمير', 'سامر', 1, 'dasd@dsd.com', '03929329', 'Damas', '11', 'Passport', 843177600, 1537459901, NULL, ''),
(2, 'ماهر', 'محمود', 'سامر', 1, 'nager@sad.com', '0993623827', 'dimashq', '1', 'Tazkara', 662774400, 1537459901, NULL, ''),
(3, 'سمير', 'محمود', 'جميل', 1, 'fsd@fdf.com', '094837462343', 'Damascus', '', 'Tazkara', 844128000, 1538429500, NULL, ''),
(4, 'احمد', 'رمضان', 'خالد', 1, 'm.shbat@gimal.com', '0988766544', 'جديدة عرطوز', '', 'Tazkara', 781315200, 1538743246, NULL, ''),
(5, 'عمير', 'عامر', 'ماهر', 1, 'fsd@fdf.com', '0932323232', 'تضامن', '1', 'Passport', 497491200, 1538899410, NULL, 'ملخص '),
(6, 'عمر', 'علي', 'عمير', 1, 'asdasdas@dsd.com', '094334343', 'دمشق', '11', 'Passport', 497491200, 1538911427, NULL, ''),
(7, 'سميرة', 'سمير', 'محمود', 0, 'kdjhkjhk@dskj.com', '0974636553', 'حمص', '11', 'Passport', 465955200, 1538912256, NULL, ''),
(8, 'ياسين', 'محمود', 'نصوح', 1, 'fsd@fdf.com', '094324234', 'دمشق', '22', 'Passport', 497577600, 1539027813, NULL, 'ملخض'),
(9, 'ناصر', 'الحلب', 'محمد', 1, 'mon@dsad.com', '0943432423', 'حلب', '1', 'Driver License', 781574400, 1539038474, NULL, ''),
(10, 'خالد', 'محمد', 'جمال', 1, 'fsd@fdf.com', '4324', 'دمشق', '2', 'Driver License', -2147483648, 1539039198, NULL, ''),
(11, 'امير', 'محمد', 'حامد', 1, 'fsd@fdf.com', '099432342', 'دمشق', '1', 'Passport', 497664000, 1539117629, NULL, ''),
(12, 'dasd', 'das', 'dasd', 1, 'fsd@fdf.com', '093949349', 'sds', '1', 'Tazkara', -2147483648, 1539172465, NULL, ''),
(13, 'طه', 'علوش', 'عمر', 1, 'emauq@dds.com', '0993623827', 'دمشق', '23', 'Passport', 497750400, 1539204778, NULL, ''),
(14, 'عمران', 'زياد', 'عامر', 1, 'fsd@fdf.com', '9382382983', 'دمشق', '11', 'Bank ID Card', 150595200, 1539205216, NULL, ''),
(15, 'عمران', 'زياد', 'عامر', 1, 'fsd@fdf.com', '9382382983', 'دمشق', '11', 'Bank ID Card', 150595200, 1539205283, NULL, ''),
(16, 'test', 'dasd', 'dasd', 1, 'fsd@fdf.com', '4234', 'asdas', '2', 'Driver License', -2147483648, 1539278696, NULL, ''),
(17, 'fasdf', 'das', 'as', 1, 'fsd@fdf.com', '980', 'dadas', '11', 'Tazkara', -1553385600, 1539278781, NULL, ''),
(18, 'زيد', 'محمد', 'اسامة', 1, 'fsd@fdf.com', '0434242342', 'حلب', '11', 'Passport', 497836800, 1539293612, NULL, ''),
(19, 'dsad', 'dasd', 'das', 1, 'fsd@fdf.com', '9382382983', 'eqweqweqwe', '22', 'Tazkara', 844992000, 1539295777, NULL, ''),
(20, 'das', 'das', 'dsa', 1, 'fsd@fdf.com', '9382382983', 'eqweqweqwe', '1', 'Passport', 844992000, 1539299217, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `patient_doctor`
--

CREATE TABLE IF NOT EXISTS `patient_doctor` (
  `patient_doctor_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `visit_date` int(11) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`patient_doctor_id`),
  KEY `patient_id` (`patient_id`),
  KEY `user_id` (`doctor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `patient_doctor`
--

INSERT INTO `patient_doctor` (`patient_doctor_id`, `patient_id`, `doctor_id`, `visit_date`, `status`) VALUES
(1, 1, 6, 1539264088, 1),
(2, 3, 6, 1538863028, 0),
(3, 10, 4, 1539117548, 2),
(4, 11, 5, 1539239966, 2),
(5, 12, 5, 1539286661, 2),
(6, 9, 4, 1539298945, 2),
(7, 8, 5, 1539469568, 2),
(8, 7, 5, 1539288497, 1),
(9, 6, 5, 1539292292, 1),
(10, 5, 7, 1539204650, 0),
(11, 4, 5, 1539292389, 1),
(12, 2, 5, 1539299373, 2),
(13, 13, 5, 1539206217, 1),
(14, 14, 5, 1539250366, 1),
(15, 15, 4, 1539206070, 1),
(16, 16, 5, 1539292169, 1),
(17, 17, 5, 1539285637, 1),
(18, 18, 5, 1539299458, 1),
(19, 19, 6, 1539297210, 2),
(20, 20, 6, 1539299372, 2);

-- --------------------------------------------------------

--
-- Table structure for table `purchased_drugs`
--

CREATE TABLE IF NOT EXISTS `purchased_drugs` (
  `purchased_drug_id` int(11) NOT NULL AUTO_INCREMENT,
  `drug_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `purchase_date` int(11) NOT NULL,
  `purchase_price` decimal(10,0) NOT NULL,
  `no_of_item` int(11) NOT NULL DEFAULT '1',
  `total_cost` decimal(10,0) NOT NULL,
  `memo` text,
  PRIMARY KEY (`purchased_drug_id`),
  KEY `drug_id` (`drug_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `purchased_drugs`
--

INSERT INTO `purchased_drugs` (`purchased_drug_id`, `drug_id`, `user_id`, `purchase_date`, `purchase_price`, `no_of_item`, `total_cost`, `memo`) VALUES
(1, 4, 1, 1538179200, '11', 1, '11', ''),
(2, 5, 1, 1539216000, '100', 10, '1000', ''),
(3, 5, 1, 1539216000, '100', 10, '1000', '');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `report_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `subject` text,
  `url` text,
  `description` text,
  `create_date` int(11) NOT NULL,
  PRIMARY KEY (`report_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `returned_drugs`
--

CREATE TABLE IF NOT EXISTS `returned_drugs` (
  `returned_drug_id` int(11) NOT NULL AUTO_INCREMENT,
  `drug_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `return_date` int(11) NOT NULL,
  `no_of_item` int(11) NOT NULL DEFAULT '1',
  `total_cost` decimal(10,0) NOT NULL,
  `memo` text,
  PRIMARY KEY (`returned_drug_id`),
  KEY `drug_id` (`drug_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nurse_id` int(11) NOT NULL,
  `work_date` date NOT NULL,
  `work_hours` int(11) NOT NULL,
  `hour_price` int(11) NOT NULL,
  `day_fare` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `nurse_id`, `work_date`, `work_hours`, `hour_price`, `day_fare`) VALUES
(1, 3, '2018-10-16', 11, 145, 0),
(2, 3, '2018-10-06', 44, 150, 0);

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE IF NOT EXISTS `userdata` (
  `userdata_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `first_name` varchar(40) DEFAULT NULL,
  `last_name` varchar(40) DEFAULT NULL,
  `fname` varchar(40) DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `position` varchar(40) NOT NULL,
  `social_id` varchar(12) NOT NULL,
  `id_type` enum('','Tazkara','Passport','Driver License','Bank ID Card') DEFAULT 'Tazkara',
  `birth_date` int(11) DEFAULT NULL,
  `create_date` int(11) NOT NULL,
  `picture` text,
  `memo` text,
  PRIMARY KEY (`userdata_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`userdata_id`, `user_id`, `first_name`, `last_name`, `fname`, `gender`, `email`, `phone`, `address`, `position`, `social_id`, `id_type`, `birth_date`, `create_date`, `picture`, `memo`) VALUES
(1, 1, 'د.محمد', 'شباط', 'علي', 1, 'admin@sdd.com', '032321', 'Damascus', 'admin', '1', 'Tazkara', 1538006400, 1537380015, NULL, ''),
(2, 2, 'د.نور', 'شماس', 'علي', 1, 'nour@gmail.com', '099392323', 'Damas', 'doctor', '1', 'Tazkara', 1537488000, 1537380075, NULL, ''),
(3, 3, 'مصعب', 'عمير', 'عماد', 1, 'mossab@gmail.com', '0993623827', 'حمص', 'patient', '1', 'Passport', 1540425600, 1538994704, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(60) NOT NULL,
  `password_last_set` datetime NOT NULL,
  `password_never_expires` tinyint(1) NOT NULL DEFAULT '0',
  `remember_me` varchar(40) NOT NULL,
  `activation_code` varchar(40) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `forgot_code` varchar(40) NOT NULL,
  `forgot_generated` datetime NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `last_login` datetime NOT NULL,
  `last_login_ip` int(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `password_last_set`, `password_never_expires`, `remember_me`, `activation_code`, `active`, `forgot_code`, `forgot_generated`, `enabled`, `last_login`, `last_login_ip`) VALUES
(1, 'admin', '$2a$08$glVINo.dWbH7voqyOzZ4YeyZOUTGSy3jxYXzNLrVPaWJj9ZLesoCy', '2018-09-19 18:00:15', 0, '6878a7fdad4a5aea216f1f66ae1becfac6a62285', '', 1, '', '0000-00-00 00:00:00', 1, '2018-10-15 16:28:44', 0),
(2, 'ahmad', '$2a$08$30kc9L1nLO/sUVG2ExwUs..LqI5C/mMwoVzxPPWk0G1fTeS6T9jhW', '2018-09-19 18:01:15', 0, '6ac3c5aa0002289b0ba7bef6fc38c256869a86c8', '', 1, '', '0000-00-00 00:00:00', 1, '2018-10-02 17:38:48', 83919838),
(3, 'mossab', '$2a$08$5JnDGg5bCUFvYYVsZSf24uUj/skPcMwferFknI8ar7bBFUDsUESrC', '2018-10-08 10:31:44', 0, '', '', 1, '', '0000-00-00 00:00:00', 1, '2018-10-08 10:32:04', 83923213);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE IF NOT EXISTS `user_group` (
  `assoc_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`assoc_id`),
  KEY `user_id` (`user_id`,`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`assoc_id`, `user_id`, `group_id`) VALUES
(3, 1, 1),
(7, 1, 9),
(4, 2, 3),
(8, 2, 9),
(5, 3, 8),
(9, 3, 9);

-- --------------------------------------------------------

--
-- Table structure for table `xrays`
--

CREATE TABLE IF NOT EXISTS `xrays` (
  `xray_id` int(11) NOT NULL AUTO_INCREMENT,
  `xray_name_en` varchar(50) DEFAULT NULL,
  `xray_name_ar` varchar(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `price` decimal(10,0) NOT NULL,
  `memo` text,
  PRIMARY KEY (`xray_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `xrays`
--

INSERT INTO `xrays` (`xray_id`, `xray_name_en`, `xray_name_ar`, `category`, `price`, `memo`) VALUES
(1, 'Backbones', 'صورة للعمود الفقري', 'صنف الصورة', '2000', 'ملخص عن صورة الاشعه');

-- --------------------------------------------------------

--
-- Table structure for table `xray_files`
--

CREATE TABLE IF NOT EXISTS `xray_files` (
  `xray_file_id` int(11) NOT NULL AUTO_INCREMENT,
  `xray_patient_id` int(11) NOT NULL,
  `upload_date` int(11) NOT NULL,
  `path` text NOT NULL,
  `memo` text,
  PRIMARY KEY (`xray_file_id`),
  KEY `xray_patient_id` (`xray_patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `xray_patient`
--

CREATE TABLE IF NOT EXISTS `xray_patient` (
  `xray_patient_id` int(11) NOT NULL AUTO_INCREMENT,
  `xray_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `user_id_assign` int(11) NOT NULL,
  `assign_date` int(11) NOT NULL,
  `no_of_item` int(11) NOT NULL DEFAULT '1',
  `total_cost` decimal(10,0) NOT NULL,
  `user_id_discharge` int(11) DEFAULT NULL,
  `discharge_date` int(11) DEFAULT NULL,
  `memo` text,
  PRIMARY KEY (`xray_patient_id`),
  KEY `xray_id` (`xray_id`),
  KEY `patient_id` (`patient_id`),
  KEY `user_id_assign` (`user_id_assign`),
  KEY `user_id_discharge` (`user_id_discharge`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `xray_patient`
--

INSERT INTO `xray_patient` (`xray_patient_id`, `xray_id`, `patient_id`, `user_id_assign`, `assign_date`, `no_of_item`, `total_cost`, `user_id_discharge`, `discharge_date`, `memo`) VALUES
(1, 1, 13, 1, 1539207077, 1, '2000', NULL, NULL, ''),
(2, 1, 11, 1, 1539242825, 1, '2000', NULL, NULL, ''),
(7, 1, 18, 1, 1539344962, 1, '2000', NULL, NULL, ''),
(8, 1, 8, 1, 1539469611, 1, '2000', NULL, NULL, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
