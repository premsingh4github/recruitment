-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2015 at 03:10 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `recruitment`
--

-- --------------------------------------------------------

--
-- Table structure for table `additionalinformation`
--

CREATE TABLE IF NOT EXISTS `additionalinformation` (
  `id` int(10) unsigned NOT NULL,
  `pid` int(11) NOT NULL,
  `currency` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `salary` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `preferred_location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `add_information` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sdocument` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `additionalinformation`
--

INSERT INTO `additionalinformation` (`id`, `pid`, `currency`, `salary`, `preferred_location`, `add_information`, `sdocument`, `created_at`, `updated_at`) VALUES
(1, 1, 'USD', '300', 'Finland', 'this is test objective', '', '2015-08-22 00:27:03', '2015-08-22 00:27:03'),
(2, 2, '', '', '', 'this is test objective ', '', '2015-08-25 13:19:06', '2015-08-25 13:19:06');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'USA', '2015-08-22 11:08:21', '2015-08-22 11:11:43'),
(3, 'Malaysia', '2015-08-22 11:13:11', '2015-08-22 11:13:11'),
(7, 'Nepal', '2015-08-22 11:53:07', '2015-08-22 11:53:07'),
(8, 'India', '2015-08-24 02:08:52', '2015-08-24 02:08:52');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE IF NOT EXISTS `currency` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'USD', '2015-08-22 13:07:43', '2015-08-22 13:07:43'),
(2, 'INR', '2015-08-22 13:07:53', '2015-08-22 13:07:53'),
(3, 'MYR', '2015-08-22 22:43:37', '2015-08-22 22:43:37');

-- --------------------------------------------------------

--
-- Table structure for table `demand`
--

CREATE TABLE IF NOT EXISTS `demand` (
  `id` int(10) unsigned NOT NULL,
  `eid` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_vacancy` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `qualification` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `demand`
--

INSERT INTO `demand` (`id`, `eid`, `title`, `no_vacancy`, `qualification`, `location`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 2, 'workers', '6', 'Bachelor', 'india', '1', 'this is the test job', '2015-08-22 00:30:13', '2015-08-22 00:30:13'),
(2, 2, 'gghfg', '55', 'gdfg', 'dfgd', '1', 'dggfdgd', '2015-08-26 01:50:49', '2015-08-26 01:50:49');

-- --------------------------------------------------------

--
-- Table structure for table `demanddelete`
--

CREATE TABLE IF NOT EXISTS `demanddelete` (
  `id` int(10) unsigned NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `demandId` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `educationinformation`
--

CREATE TABLE IF NOT EXISTS `educationinformation` (
  `id` int(10) unsigned NOT NULL,
  `pid` int(11) NOT NULL,
  `degree` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `school` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `board` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ulocation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `study_field` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `major` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `grade` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gyear` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `resume_certificate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `educationinformation`
--

INSERT INTO `educationinformation` (`id`, `pid`, `degree`, `school`, `board`, `ulocation`, `study_field`, `major`, `grade`, `gyear`, `resume_certificate`, `created_at`, `updated_at`) VALUES
(5, 1, 'Master''s', 'svcet', 'jntua', 'Nepal', 'Engineering', 'decs', '85', '2014', NULL, '2015-08-23 05:16:11', '2015-08-23 05:16:11'),
(6, 1, 'Bachelor''s', 'acem', 'tu', 'Nepal', 'Engineering', 'ece', '75', '2011', NULL, '2015-08-23 05:18:49', '2015-08-23 05:18:49'),
(7, 2, 'Master''s', 'asdasd', 'asdasd', 'USA', 'Engineering', 'asdsad', '22', '2222', NULL, '2015-08-24 11:06:28', '2015-08-24 11:06:28');

-- --------------------------------------------------------

--
-- Table structure for table `emaildelete`
--

CREATE TABLE IF NOT EXISTS `emaildelete` (
  `id` int(10) unsigned NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `emailId` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emailview`
--

CREATE TABLE IF NOT EXISTS `emailview` (
  `id` int(10) unsigned NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `emailId` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `emailview`
--

INSERT INTO `emailview` (`id`, `userId`, `emailId`, `created_at`, `updated_at`) VALUES
(1, 2, '1', '2015-08-25 08:59:29', '2015-08-25 08:59:29'),
(2, 2, '2', '2015-08-25 09:05:16', '2015-08-25 09:05:16');

-- --------------------------------------------------------

--
-- Table structure for table `employerapproval`
--

CREATE TABLE IF NOT EXISTS `employerapproval` (
  `apid` int(10) unsigned NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `empid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employerapproval`
--

INSERT INTO `employerapproval` (`apid`, `pid`, `empid`, `created_at`, `updated_at`) VALUES
(1, 2, '2', '2015-08-25 13:29:00', '2015-08-25 13:29:00'),
(2, 1, '2', '2015-08-25 13:29:00', '2015-08-25 13:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `experienceinformation`
--

CREATE TABLE IF NOT EXISTS `experienceinformation` (
  `id` int(10) unsigned NOT NULL,
  `pid` int(11) NOT NULL,
  `position_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `experience` int(11) NOT NULL,
  `from_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `to_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `specialization` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `workcountry` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `industry` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position_level` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `salary` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `experience_certificate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `experienceinformation`
--

INSERT INTO `experienceinformation` (`id`, `pid`, `position_title`, `company_name`, `experience`, `from_date`, `to_date`, `specialization`, `role`, `workcountry`, `industry`, `position_level`, `currency`, `salary`, `experience_certificate`, `created_at`, `updated_at`) VALUES
(1, 1, 'php programer', 'jetking', 2, '1/1/2014', '08/22/2015', 'php', 'programing', 'Nepal', 'Consulting (IT, Science, Engineering & Technical)', 'Senior Executive', 'USD', '250', '', '2015-08-22 00:24:14', '2015-08-22 00:24:14'),
(2, 2, '', '', 0, '1970-01-01', '1970-01-01', '', '', '', '', '', '', '', '', '2015-08-24 11:06:32', '2015-08-25 13:16:36');

-- --------------------------------------------------------

--
-- Table structure for table `fieldofstudy`
--

CREATE TABLE IF NOT EXISTS `fieldofstudy` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fieldofstudy`
--

INSERT INTO `fieldofstudy` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Engineering', '2015-08-22 13:38:18', '2015-08-22 13:38:18'),
(2, 'Pharmecy', '2015-08-22 13:38:25', '2015-08-22 13:38:25');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `id` int(10) unsigned NOT NULL,
  `action_id` int(11) NOT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `action_id`, `action`, `user`, `remark`, `created_at`, `updated_at`) VALUES
(1, 1, 'Resume Created', 'admin', '', '2015-08-22 00:21:22', '2015-08-22 00:21:22'),
(2, 1, 'Demand Created', 'admin', '', '2015-08-22 00:30:13', '2015-08-22 00:30:13'),
(3, 7, 'Member Unblocked', 'admin', '', '2015-08-22 00:47:02', '2015-08-22 00:47:02'),
(5, 2, 'Country Added', 'admin', '', '2015-08-22 11:53:08', '2015-08-22 11:53:08'),
(6, 2, 'Identification Added', 'admin', '', '2015-08-22 12:47:36', '2015-08-22 12:47:36'),
(7, 2, 'Identification Added', 'admin', '', '2015-08-22 12:47:52', '2015-08-22 12:47:52'),
(8, 2, 'Industry Added', 'admin', '', '2015-08-22 12:57:19', '2015-08-22 12:57:19'),
(9, 2, 'Industry Added', 'admin', '', '2015-08-22 12:57:35', '2015-08-22 12:57:35'),
(10, 2, 'position Added', 'admin', '', '2015-08-22 13:04:15', '2015-08-22 13:04:15'),
(11, 2, 'position Added', 'admin', '', '2015-08-22 13:04:30', '2015-08-22 13:04:30'),
(12, 2, 'position Added', 'admin', '', '2015-08-22 13:04:41', '2015-08-22 13:04:41'),
(13, 2, 'position deleted', 'admin', 'Number of position deleted=1', '2015-08-22 13:05:00', '2015-08-22 13:05:00'),
(14, 2, 'currency Added', 'admin', '', '2015-08-22 13:07:44', '2015-08-22 13:07:44'),
(15, 2, 'currency Added', 'admin', '', '2015-08-22 13:07:53', '2015-08-22 13:07:53'),
(16, 2, 'currency Added', 'admin', '', '2015-08-22 13:08:05', '2015-08-22 13:08:05'),
(17, 2, 'currency deleted', 'admin', 'Number of currency deleted=1', '2015-08-22 13:08:17', '2015-08-22 13:08:17'),
(18, 2, 'qualification Added', 'admin', '', '2015-08-22 13:36:35', '2015-08-22 13:36:35'),
(19, 2, 'qualification Added', 'admin', '', '2015-08-22 13:36:46', '2015-08-22 13:36:46'),
(20, 2, 'qualification Added', 'admin', '', '2015-08-22 13:37:05', '2015-08-22 13:37:05'),
(21, 2, 'qualification Added', 'admin', '', '2015-08-22 13:37:19', '2015-08-22 13:37:19'),
(22, 2, 'qualification deleted', 'admin', 'Number of qualification deleted=1', '2015-08-22 13:37:30', '2015-08-22 13:37:30'),
(23, 2, 'fieldofstudy Added', 'admin', '', '2015-08-22 13:38:18', '2015-08-22 13:38:18'),
(24, 2, 'fieldofstudy Added', 'admin', '', '2015-08-22 13:38:25', '2015-08-22 13:38:25'),
(25, 2, 'fieldofstudy Added', 'admin', '', '2015-08-22 13:38:39', '2015-08-22 13:38:39'),
(26, 2, 'fieldofstudy deleted', 'admin', 'Number of fieldofstudy deleted=1', '2015-08-22 13:38:50', '2015-08-22 13:38:50'),
(27, 1, 'Resume Updated', 'admin', '', '2015-08-22 22:08:07', '2015-08-22 22:08:07'),
(28, 2, 'currency Added', 'admin', '', '2015-08-22 22:43:37', '2015-08-22 22:43:37'),
(29, 9, 'Member Blocked', 'admin', '', '2015-08-23 23:51:06', '2015-08-23 23:51:06'),
(30, 9, 'Member Unblocked', 'admin', '', '2015-08-23 23:51:11', '2015-08-23 23:51:11'),
(31, 2, 'Country Added', 'admin', '', '2015-08-24 02:08:52', '2015-08-24 02:08:52'),
(32, 7, 'Member Blocked', 'admin', '', '2015-08-24 02:26:15', '2015-08-24 02:26:15'),
(33, 2, 'Resume Created', 'admin', '', '2015-08-24 11:05:55', '2015-08-24 11:05:55'),
(34, 8, 'Member Blocked', 'admin', '', '2015-08-24 12:55:31', '2015-08-24 12:55:31'),
(35, 8, 'Member Unblocked', 'admin', '', '2015-08-24 12:56:01', '2015-08-24 12:56:01');

-- --------------------------------------------------------

--
-- Table structure for table `identification`
--

CREATE TABLE IF NOT EXISTS `identification` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `identification`
--

INSERT INTO `identification` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'passport', '2015-08-22 12:47:35', '2015-08-22 12:47:35'),
(2, 'Licence', '2015-08-22 12:47:51', '2015-08-22 12:47:51');

-- --------------------------------------------------------

--
-- Table structure for table `industry`
--

CREATE TABLE IF NOT EXISTS `industry` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `industry`
--

INSERT INTO `industry` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Education', '2015-08-22 12:57:19', '2015-08-22 12:57:19'),
(2, 'It\\Telecommunication', '2015-08-22 12:57:35', '2015-08-22 12:57:50');

-- --------------------------------------------------------

--
-- Table structure for table `languageinformation`
--

CREATE TABLE IF NOT EXISTS `languageinformation` (
  `id` int(10) unsigned NOT NULL,
  `pid` int(11) NOT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lspoken` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lwritten` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lreading` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `languageinformation`
--

INSERT INTO `languageinformation` (`id`, `pid`, `language`, `lspoken`, `lwritten`, `lreading`, `created_at`, `updated_at`) VALUES
(1, 1, 'englsih', 'Excellent', 'Excellent', 'Excellent', '2015-08-22 00:26:33', '2015-08-23 06:33:11'),
(2, 1, 'Nepali', 'Excellent', 'Excellent', 'Excellent', '2015-08-22 00:26:33', '2015-08-23 06:33:11'),
(3, 1, 'Hindi', 'Excellent', 'Excellent', 'good', '2015-08-22 00:26:33', '2015-08-23 06:33:11'),
(4, 2, 'Nepali', 'Excellent', 'Excellent', 'Excellent', '2015-08-25 13:17:06', '2015-08-25 13:17:06');

-- --------------------------------------------------------

--
-- Table structure for table `memberprofile`
--

CREATE TABLE IF NOT EXISTS `memberprofile` (
  `id` int(10) unsigned NOT NULL,
  `uid` int(11) NOT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_information` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_document` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `memberprofile`
--

INSERT INTO `memberprofile` (`id`, `uid`, `company_name`, `company_address`, `company_information`, `company_document`, `created_at`, `updated_at`) VALUES
(1, 2, 'acem', 'kathmandu', 'sfsdfsdfsfds', '', '2015-08-25 11:07:44', '2015-08-25 11:07:44');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contactNumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) DEFAULT NULL,
  `loginas` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `address`, `contactNumber`, `type`, `loginas`, `status`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '', '', '', 0, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'admin', 'ktmsas', '123456', 1, 3, 1, 'admin@test.com', '$2y$10$RBZLcrUXQsWgDnK1x63mwuwLddXH8CurkiMTe5ZKWTaj5Ku98n88m', 'lzVhzEspYmlbZTAjmUcZlm4bQ7aJzy1pPNql77Df9muXxODKyk4QgsKDi7Hu', '2015-07-25 12:18:42', '2015-08-24 02:35:25'),
(3, 'employer', 'kathmandu', '1234567', 2, 2, 1, 'employer@test.com', '$2y$10$7AQwXM5oQIdCzTKUVSRZw.Q5fDXHahp4qdSQRc.qBZWEUQ4FGBujy', 'cBipyGhZdogLrFb6QY8ZGBHyXPY8Xpbeq1OsUeV3MnoKlx1fvHhksdNN8pGZ', '2015-07-25 12:19:12', '2015-08-24 02:35:12'),
(6, 'agent', 'jnkasdsad', '123456789', 3, 3, 1, 'agent@test.com', '$2y$10$5RpYY9rT4/uJWzJ5juh0V.dVhiMfHySpDzjZCa4pU3X/Zs81hQO4C', NULL, '2015-08-13 08:44:48', '2015-08-13 08:44:48'),
(7, 'employer2', 'ktmdasaa', '123456789', 2, 2, 0, 'employer1@test.com', '$2y$10$rZleojm0V6htxbPqxs97GeE1kv8tedu.0xOPDOUq8H7FAM9rrRSPm', 'vCtl2ViIrFbeMtrqEuXiZYsbvFaNYFUGXngxKYWvI3G9O3dsgz5qR9QTXcBs', '2015-08-13 08:45:29', '2015-08-24 02:40:29'),
(8, 'admin2', 'ktm', '123456789', 1, 1, 1, 'admin2@test.com', '$2y$10$EfaqVODggCERVsXaJkspOeF5azTdmO4O1.O7GjAF4owJisAdeYh7i', 'A8SPwW3BPjbt9KljQnxfHqM4NwZITqZ2gD8KqsrXiQfUkTQHSpQMdoqSWoYl', '2015-08-13 09:07:36', '2015-08-18 06:54:48'),
(9, 'agent2', 'birat', '123456789', 3, 3, 1, 'agent2@test.com', '$2y$10$5Z2oDFnG0AEIoPVtyZMet.e8pd/9Oxwsn40YfjqZA/rQ8D2S6iQWi', NULL, '2015-08-21 06:27:55', '2015-08-21 06:27:55'),
(10, 'admin3', 'jnk', '123456789', 1, 1, 1, 'admin3@test.com', '$2y$10$KEdTJHHpMrOqSjtRTfNXNu2SMYUCqP3kZ467S9zzBAdfZc8KfuG/i', NULL, '2015-08-25 09:54:28', '2015-08-25 09:54:28');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_07_21_054405_create_member_table', 1),
('2015_07_21_094218_create_personalInformation_table', 1),
('2015_07_21_094247_create_educationInformation_table', 1),
('2015_07_21_094323_create_experienceInformation_table', 1),
('2015_07_27_163932_create_demand_table', 1),
('2015_07_28_075934_create_notification_table', 1),
('2015_07_29_071241_create_memberprofile_table', 1),
('2015_07_29_105754_create_skillsinformation_table', 1),
('2015_07_29_105845_create_additionalinformation_table', 1),
('2015_07_29_105925_create_languageinformation_table', 1),
('2015_07_29_110000_create_uploadinformation_tabe', 1),
('2015_07_29_110032_create_privacyinformation_table', 1),
('2015_08_02_170454_create_emaildelete_table', 1),
('2015_08_02_182247_create_demanddelete_table', 1),
('2015_08_11_163526_create_employerapproval_table', 2),
('2015_08_14_125542_create_emailview_table', 3),
('2015_08_21_082216_create_history_table', 4),
('2015_08_22_150946_create_country_table', 5),
('2015_08_22_173350_create_identification_table', 6),
('2015_08_22_173426_create_industry_table', 6),
('2015_08_22_173453_create_position_table', 6),
('2015_08_22_173528_create_currency_table', 6),
('2015_08_22_184546_create_qualification_table', 7),
('2015_08_22_184635_create_fieldofstudy_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(10) unsigned NOT NULL,
  `from` int(11) NOT NULL,
  `to` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `employer_status` int(11) NOT NULL,
  `agent_status` int(11) NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `from`, `to`, `status`, `employer_status`, `agent_status`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 2, 'a', 0, 0, 0, 'test', 'this is test', '2015-08-25 08:54:32', '2015-08-25 08:54:32'),
(2, 2, 'e', 0, 0, 0, 'employertest', 'this is the test for employer', '2015-08-25 08:58:19', '2015-08-25 08:58:19');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personalinformation`
--

CREATE TABLE IF NOT EXISTS `personalinformation` (
  `id` int(10) unsigned NOT NULL,
  `agent_id` int(11) NOT NULL,
  `approval_status` int(11) NOT NULL,
  `approved_by` int(11) NOT NULL,
  `employer_request` int(11) NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resume_photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `passport` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dob` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `height` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nationality` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `onumber` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `raddress1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `raddress2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `identification` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `inumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `personalinformation`
--

INSERT INTO `personalinformation` (`id`, `agent_id`, `approval_status`, `approved_by`, `employer_request`, `fname`, `lname`, `resume_photo`, `passport`, `dob`, `age`, `gender`, `height`, `email`, `nationality`, `mobile`, `onumber`, `raddress1`, `raddress2`, `city`, `postal_code`, `country`, `state`, `identification`, `inumber`, `created_at`, `updated_at`) VALUES
(1, 2, 0, 1, 0, 'naresh', 'Das', '', '', '07/02/2015', 1, 'Male', 5, 'bimnaresh@gmail.com', 'Malaysia', '08106707676', '', 'RVS Nagar', 'ktm', 'Chittoor', '517127', 'Malaysia', 'Select Your State or Province', 'Passport No.', '123456', '2015-08-22 00:21:21', '2015-08-22 22:08:41'),
(2, 2, 1, 2, 0, 'naresh', 'Das', '', '', '08/05/2015', 22, 'Male', 2, 'bimnaresh@gmail.com', 'Nepal', '08106707676', '', 'RVS Nagar', 'ktm', 'Chittoor', '517127', 'India', 'Select Your State or Province', 'passport', '122', '2015-08-24 11:05:55', '2015-08-24 11:05:55');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE IF NOT EXISTS `position` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Manager', '2015-08-22 13:04:15', '2015-08-22 13:04:15'),
(2, 'Sr. Programmer', '2015-08-22 13:04:30', '2015-08-22 13:04:30');

-- --------------------------------------------------------

--
-- Table structure for table `privacyinformation`
--

CREATE TABLE IF NOT EXISTS `privacyinformation` (
  `id` int(10) unsigned NOT NULL,
  `pid` int(11) NOT NULL,
  `privacy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `privacyinformation`
--

INSERT INTO `privacyinformation` (`id`, `pid`, `privacy`, `created_at`, `updated_at`) VALUES
(1, 1, '1', '2015-08-22 00:27:09', '2015-08-22 00:27:09'),
(2, 2, '1', '2015-08-25 13:19:15', '2015-08-25 13:19:15');

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE IF NOT EXISTS `qualification` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qualification`
--

INSERT INTO `qualification` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Master''s', '2015-08-22 13:36:35', '2015-08-22 13:36:35'),
(2, 'Bachelor''s', '2015-08-22 13:36:46', '2015-08-22 13:36:46'),
(3, 'Ph.D.', '2015-08-22 13:37:05', '2015-08-22 13:37:05');

-- --------------------------------------------------------

--
-- Table structure for table `skillsinformation`
--

CREATE TABLE IF NOT EXISTS `skillsinformation` (
  `id` int(10) unsigned NOT NULL,
  `pid` int(11) NOT NULL,
  `skills` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `proficiency` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sobjective` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `institute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `skills_certificate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `skillsinformation`
--

INSERT INTO `skillsinformation` (`id`, `pid`, `skills`, `proficiency`, `sobjective`, `institute`, `skills_certificate`, `created_at`, `updated_at`) VALUES
(1, 1, 'php', 'novice', 'test for php', 'test', '', '2015-08-22 00:24:40', '2015-08-23 06:17:04'),
(2, 1, 'ccna', 'Beginner', 'test for ccna', 'test', '', '2015-08-22 00:24:40', '2015-08-23 06:17:04'),
(3, 2, '', '', '', '', '', '2015-08-24 11:13:34', '2015-08-24 11:13:34'),
(4, 2, 'php', 'Expert', '', '', '', '2015-08-25 13:16:49', '2015-08-25 13:16:49');

-- --------------------------------------------------------

--
-- Table structure for table `uploadinformation`
--

CREATE TABLE IF NOT EXISTS `uploadinformation` (
  `id` int(10) unsigned NOT NULL,
  `pid` int(11) NOT NULL,
  `uresume` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uploadinformation`
--

INSERT INTO `uploadinformation` (`id`, `pid`, `uresume`, `created_at`, `updated_at`) VALUES
(1, 1, '', '2015-08-22 00:27:06', '2015-08-22 00:27:06'),
(2, 2, '', '2015-08-25 13:19:10', '2015-08-25 13:19:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `additionalinformation`
--
ALTER TABLE `additionalinformation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demand`
--
ALTER TABLE `demand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demanddelete`
--
ALTER TABLE `demanddelete`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educationinformation`
--
ALTER TABLE `educationinformation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emaildelete`
--
ALTER TABLE `emaildelete`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emailview`
--
ALTER TABLE `emailview`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employerapproval`
--
ALTER TABLE `employerapproval`
  ADD PRIMARY KEY (`apid`);

--
-- Indexes for table `experienceinformation`
--
ALTER TABLE `experienceinformation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fieldofstudy`
--
ALTER TABLE `fieldofstudy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `identification`
--
ALTER TABLE `identification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industry`
--
ALTER TABLE `industry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languageinformation`
--
ALTER TABLE `languageinformation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memberprofile`
--
ALTER TABLE `memberprofile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `members_email_unique` (`email`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `personalinformation`
--
ALTER TABLE `personalinformation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privacyinformation`
--
ALTER TABLE `privacyinformation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qualification`
--
ALTER TABLE `qualification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skillsinformation`
--
ALTER TABLE `skillsinformation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploadinformation`
--
ALTER TABLE `uploadinformation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `additionalinformation`
--
ALTER TABLE `additionalinformation`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `demand`
--
ALTER TABLE `demand`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `demanddelete`
--
ALTER TABLE `demanddelete`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `educationinformation`
--
ALTER TABLE `educationinformation`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `emaildelete`
--
ALTER TABLE `emaildelete`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `emailview`
--
ALTER TABLE `emailview`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employerapproval`
--
ALTER TABLE `employerapproval`
  MODIFY `apid` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `experienceinformation`
--
ALTER TABLE `experienceinformation`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `fieldofstudy`
--
ALTER TABLE `fieldofstudy`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `identification`
--
ALTER TABLE `identification`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `industry`
--
ALTER TABLE `industry`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `languageinformation`
--
ALTER TABLE `languageinformation`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `memberprofile`
--
ALTER TABLE `memberprofile`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `personalinformation`
--
ALTER TABLE `personalinformation`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `privacyinformation`
--
ALTER TABLE `privacyinformation`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `qualification`
--
ALTER TABLE `qualification`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `skillsinformation`
--
ALTER TABLE `skillsinformation`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `uploadinformation`
--
ALTER TABLE `uploadinformation`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
