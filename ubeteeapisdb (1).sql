-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2020 at 11:33 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ubeteeapisdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `office` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `app_status` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `stage` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `history` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `courseCode` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datesubmitted` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `user_id`, `office`, `app_status`, `stage`, `history`, `courseCode`, `datesubmitted`, `created_at`, `updated_at`) VALUES
(140, 9, 'eteeap', 'Submitted', 'Submitted', 'yes', 'Bachelor of Science in Business Administration Major in Marketing Management', '2020-02-09', '2020-02-08 22:27:59', '2020-02-08 22:27:59'),
(141, 9, 'eteeap', 'Received', 'Initial Assessment', 'yes', 'Bachelor of Science in Business Administration Major in Marketing Management', '2020-02-09', '2020-02-08 22:28:02', '2020-02-08 22:28:02'),
(142, 9, 'eteeap', 'Passed', 'Initial Assessment', 'yes', 'Bachelor of Science in Business Administration Major in Marketing Management', '2020-02-09', '2020-02-08 22:28:16', '2020-02-08 22:28:16'),
(143, 9, 'SBAA', 'On Going', 'Second Assessment', 'yes', 'Bachelor of Science in Business Administration Major in Marketing Management', '2020-02-09', '2020-02-08 22:28:16', '2020-02-08 22:28:16'),
(144, 9, 'SBAA', 'Failed', 'Second Assessment', 'yes', 'Bachelor of Science in Business Administration Major in Operations Management', '2020-02-09', '2020-02-08 22:30:38', '2020-02-08 22:30:38'),
(145, 9, 'eteeap', 'On Going', 'Initial Assessment', 'yes', 'Bachelor of Science in Business Administration Major in Operations Management', '2020-02-09', '2020-02-08 22:30:38', '2020-02-08 22:30:38'),
(146, 9, 'eteeap', 'Passed', 'Initial Assessment', 'yes', 'Bachelor of Science in Business Administration Major in Operations Management', '2020-02-09', '2020-02-08 22:31:38', '2020-02-08 22:31:38'),
(147, 9, 'SBAA', 'On Going', 'Second Assessment', 'yes', 'Bachelor of Science in Business Administration Major in Operations Management', '2020-02-09', '2020-02-08 22:31:38', '2020-02-08 22:31:38'),
(148, 9, 'SBAA', 'Failed', 'Second Assessment', 'yes', 'Bachelor of Science in Criminology', '2020-02-09', '2020-02-08 22:31:53', '2020-02-08 22:31:53'),
(149, 9, 'eteeap', 'On Going', 'Initial Assessment', '', 'Bachelor of Science in Criminology', '2020-02-09', '2020-02-08 22:31:53', '2020-02-08 22:31:53');

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE `awards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `awardTitle` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `organizationName` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `organizationAddress` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `dateReceived` date NOT NULL,
  `file` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `awards`
--

INSERT INTO `awards` (`id`, `user_id`, `type`, `awardTitle`, `organizationName`, `organizationAddress`, `dateReceived`, `file`, `created_at`, `updated_at`) VALUES
(1, 9, 'Academic', 'award title', 'orgs name', 'orgs address', '2001-01-01', '91578626210.pdf', '2020-01-10 03:16:50', '2020-01-10 03:16:50'),
(12, 18, 'Civic', 'award title', 'orgs name', '62 Liteng, Pacdal', '2018-01-02', '181579872133.pdf', '2020-01-24 13:22:13', '2020-01-24 13:22:13');

-- --------------------------------------------------------

--
-- Table structure for table `certification_exams`
--

CREATE TABLE `certification_exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `certificateTitle` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `nameofAgency` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `addressofAgency` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `startYear` date DEFAULT NULL,
  `rating` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expiryDate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `certification_exams`
--

INSERT INTO `certification_exams` (`id`, `user_id`, `certificateTitle`, `nameofAgency`, `addressofAgency`, `startYear`, `rating`, `file`, `expiryDate`, `created_at`, `updated_at`) VALUES
(1, 9, 'certificatio', 'agency', 'address', '2001-01-01', '680', '91578625500.pdf', '2020-01-18', '2020-01-10 03:05:00', '2020-01-23 12:14:51'),
(7, 18, 'cert', 'agency', 'address', '2016-12-31', '123', '181579871828.pdf', '2017-12-31', '2020-01-24 13:17:08', '2020-01-24 13:17:08'),
(9, 9, '2', '2', '1', '1111-11-11', '1', '91581176301.pdf', '1111-11-11', '2020-02-08 15:38:21', '2020-02-08 16:23:57'),
(10, 9, '3', '1', '1', '1111-11-11', '2', '91581176544.pdf', '1111-11-11', '2020-02-08 15:42:24', '2020-02-08 16:29:13'),
(11, 9, '1', '1', '1', '1111-11-11', '1', '91581176626.pdf', '1111-11-11', '2020-02-08 15:43:46', '2020-02-08 15:43:46'),
(12, 9, '1', '1', '1', '1111-11-11', '2', '91581176650.pdf', '1111-11-11', '2020-02-08 15:44:10', '2020-02-08 15:44:10'),
(13, 9, '1', '1', '1', '1111-11-11', '12', '91581176697.pdf', '1111-11-11', '2020-02-08 15:44:57', '2020-02-08 15:44:57'),
(14, 9, '1', '1', '1', '1111-11-11', '2', '91581176795.pdf', '1111-11-11', '2020-02-08 15:46:35', '2020-02-08 15:46:35'),
(15, 9, '1', '1', '1', '2020-02-09', '1232', '91581178411.pdf', '2020-02-09', '2020-02-08 16:13:32', '2020-02-08 16:13:32'),
(16, 9, '1', '1', '1', '2020-02-09', '1', '91581182663.pdf', '2020-02-21', '2020-02-08 17:24:23', '2020-02-08 17:24:23'),
(17, 9, 'test', 'test', 'test', '2020-02-09', '2', '91581182688.pdf', '2020-02-01', '2020-02-08 17:24:48', '2020-02-08 17:24:48'),
(18, 9, 'test', 'test', 'test', '2020-02-08', '2', '91581182750.pdf', '2020-02-01', '2020-02-08 17:25:50', '2020-02-08 17:25:50'),
(19, 9, 'test', 'test', 'test', '2020-02-08', 'test', '91581182797.pdf', '2020-02-20', '2020-02-08 17:26:37', '2020-02-08 17:26:37');

-- --------------------------------------------------------

--
-- Table structure for table `community_involvements`
--

CREATE TABLE `community_involvements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `venue` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `startYear` date NOT NULL,
  `organizer` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `duration` bigint(20) NOT NULL,
  `what1` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `where1` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `when1` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `overview` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `endYear` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `community_involvements`
--

INSERT INTO `community_involvements` (`id`, `user_id`, `title`, `venue`, `startYear`, `organizer`, `duration`, `what1`, `where1`, `when1`, `overview`, `endYear`, `created_at`, `updated_at`) VALUES
(1, 9, 'involvement', 'venue', '2001-01-01', 'organizer', 9, 'what', '#239 unit 4 lower pinget', '2020-01-09', 'hmmmmm', '2001-01-10', '2020-01-10 03:27:04', '2020-01-14 19:07:14'),
(10, 18, '1', 'venue', '2018-03-31', 'Judalyn Beth Rivera', 640, 'what1', 'where', '2018-12-31', 'overview', '2019-12-31', '2020-01-24 13:23:53', '2020-01-24 13:24:33');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `courseName` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `courseCode` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `officeCode` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `courseName`, `courseCode`, `officeCode`, `created_at`, `updated_at`) VALUES
(2, 'Bachelor of Arts in English Studies', 'BAEng', 'SLAHS', '2019-12-31 16:00:00', '2019-12-31 16:00:00'),
(3, 'Bachelor of Arts in Broadcasting', 'BABroad', 'SLAHS', '2019-12-31 16:00:00', '2020-02-08 22:32:48'),
(4, 'Bachelor of Arts in Music', 'BAMusic', 'SLAHS', '2019-12-31 16:00:00', '2020-02-08 22:32:40'),
(5, 'Bachelor of Science in Business Administration  Major in Human Resource Development Management', 'BSBA-HRDM', 'SBAA', '2019-12-31 16:00:00', '2019-12-31 16:00:00'),
(6, 'Bachelor of Science in Business Administration Major in Marketing Management', 'BSBA-MM', 'SBAA', '2019-12-31 16:00:00', '2019-12-31 16:00:00'),
(7, 'Bachelor of Science in Business Administration  Major in Financial Management', 'BSBA-FM', 'SBAA', '2019-12-31 16:00:00', '2019-12-31 16:00:00'),
(8, 'Bachelor of Science in Business Administration Major in Operations Management', 'BSBA-OM', 'SBAA', '2019-12-31 16:00:00', '2019-12-31 16:00:00'),
(9, 'Bachelor of Science in Computer Science', 'BSCS', 'SIT', '2019-12-31 16:00:00', '2019-12-31 16:00:00'),
(10, 'Bachelor of Science in Criminology', 'BSCrim', 'SCJPS', '2019-12-31 16:00:00', '2020-01-15 12:06:58'),
(11, 'Bachelor of Science in Civil Engineering', 'BSCE', 'SEA', '2019-12-31 16:00:00', '2019-12-31 16:00:00'),
(12, 'Bachelor of Elementary Education', 'BEE', 'STE', '2019-12-31 16:00:00', '2019-12-31 16:00:00'),
(13, 'Bachelor of Secondary Science Education', 'BSSE', 'STE', '2019-12-31 16:00:00', '2019-12-31 16:00:00'),
(14, 'Bachelor of Secondary Mathematics Education', 'BSME', 'STE', '2019-12-31 16:00:00', '2019-12-31 16:00:00'),
(15, 'Bachelor of Secondary English Language Education', 'BSELE', 'STE', '2019-12-31 16:00:00', '2019-12-31 16:00:00'),
(16, 'Bachelor of Secondary Filipino Language Education', 'BSFLE', 'STE', '2019-12-31 16:00:00', '2019-12-31 16:00:00'),
(17, 'Bachelor of Secondary Social Studies Education', 'BSSSE', 'STE', '2019-12-31 16:00:00', '2019-12-31 16:00:00'),
(18, 'Bachelor of Secondary Music and Arts Education', 'BSMAE', 'STE', '2019-12-31 16:00:00', '2019-12-31 16:00:00'),
(19, 'Bachelor of Secondary Physical and Health Education', 'BSPHE', 'STE', '2019-12-31 16:00:00', '2019-12-31 16:00:00'),
(20, 'Bachelor of Science in Hotel and Restaurant Management', 'BSHRM', 'SIHTM', '2019-12-31 16:00:00', '2019-12-31 16:00:00'),
(27, 'x123', 'xx', 'haha', '2020-02-08 20:51:15', '2020-02-08 21:05:50');

-- --------------------------------------------------------

--
-- Table structure for table `creative_works`
--

CREATE TABLE `creative_works` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `workTitle` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `workDescription` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `dateAccomplished` date NOT NULL,
  `agencyName` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `agencyAddress` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `creative_works`
--

INSERT INTO `creative_works` (`id`, `user_id`, `workTitle`, `workDescription`, `dateAccomplished`, `agencyName`, `agencyAddress`, `created_at`, `updated_at`) VALUES
(1, 9, 'title', 'description', '2002-01-01', 'agency', 'institution', '2020-01-10 03:19:12', '2020-01-10 03:19:12'),
(7, 18, 'title', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsu', '2018-12-31', 'agency', 'address', '2020-01-24 13:22:37', '2020-01-24 13:22:37');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `user_id`, `title`, `file`, `created_at`, `updated_at`) VALUES
(1, 9, 'PSA', '91578627896.pdf', '2020-01-10 03:44:56', '2020-01-10 03:44:56');

-- --------------------------------------------------------

--
-- Table structure for table `engagements`
--

CREATE TABLE `engagements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `involvement` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `venue` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `startYear` date NOT NULL,
  `organizer` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `duration` bigint(20) NOT NULL,
  `what1` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `where1` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `when1` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `overview` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `endYear` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `engagements`
--

INSERT INTO `engagements` (`id`, `user_id`, `title`, `involvement`, `venue`, `startYear`, `organizer`, `duration`, `what1`, `where1`, `when1`, `overview`, `endYear`, `created_at`, `updated_at`) VALUES
(1, 9, 'engagement', 'Speaker', 'venue 1', '2001-01-01', 'org 1', 0, '', '', '', '', '2001-01-10', '2020-01-10 03:26:05', '2020-01-10 03:26:05'),
(3, 9, 'test', 'Participant', '123', '1111-11-11', '1', 4, '', '', '', '', '1111-11-15', '2020-01-10 15:23:11', '2020-01-10 15:23:11'),
(8, 18, '1', 'Participant', 'venue', '2017-12-31', 'Judalyn Beth Rivera', 31, '', '', '', '', '2018-01-31', '2020-01-24 13:26:19', '2020-01-24 13:26:19'),
(10, 9, '123', 'Working Committee Member', '123', '1111-11-11', '123123', 366, '12312', '3123', '0001-11-16', '123', '1112-11-11', '2020-02-08 21:23:24', '2020-02-08 21:45:05'),
(11, 9, '123', 'Participant', '123', '1111-11-11', '123', 366, '12312', '12312', '1111-03-11', '321312', '1112-11-11', '2020-02-08 21:43:30', '2020-02-08 21:43:30');

-- --------------------------------------------------------

--
-- Table structure for table `formal_education`
--

CREATE TABLE `formal_education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `schoolLvl` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `schoolName` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `schoolAddress` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `yearGraduated` year(4) NOT NULL,
  `degree` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transcript` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `formal_education`
--

INSERT INTO `formal_education` (`id`, `user_id`, `schoolLvl`, `schoolName`, `schoolAddress`, `yearGraduated`, `degree`, `transcript`, `created_at`, `updated_at`) VALUES
(82, 9, 'Elementary Level', '3', '3', 2020, NULL, NULL, '2020-02-08 22:19:46', '2020-02-08 22:19:46'),
(83, 9, 'Secondary Level', '2', '2', 2020, NULL, NULL, '2020-02-08 22:19:46', '2020-02-08 22:19:46'),
(84, 9, 'Tertiary Level', '1', '1', 2020, '1', '91581200387.pdf', '2020-02-08 22:19:46', '2020-02-08 22:19:46');

-- --------------------------------------------------------

--
-- Table structure for table `hobbies`
--

CREATE TABLE `hobbies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `hobbyTitle` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ratingofSkill` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hobbies`
--

INSERT INTO `hobbies` (`id`, `user_id`, `hobbyTitle`, `ratingofSkill`, `file`, `created_at`, `updated_at`) VALUES
(1, 9, 'tutoring', 'intermediat', '1', '2020-01-10 03:20:08', '2020-01-10 03:20:14'),
(7, 18, 'crochet', 'intermediate', '2', '2020-01-24 13:35:50', '2020-01-24 13:35:50'),
(11, 9, '123', '213', '91581184163.pdf', '2020-02-08 17:49:23', '2020-02-08 17:49:23'),
(12, 9, '123', '213', '1581184376.pdf', '2020-02-08 17:49:35', '2020-02-08 17:52:56');

-- --------------------------------------------------------

--
-- Table structure for table `licensures`
--

CREATE TABLE `licensures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `licenseTitle` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expiryDate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `licensures`
--

INSERT INTO `licensures` (`id`, `user_id`, `licenseTitle`, `file`, `expiryDate`, `created_at`, `updated_at`) VALUES
(1, 9, 'civil service exam', '91578625554.pdf', '2020-01-03', '2020-01-10 03:05:54', '2020-01-21 05:10:37'),
(11, 18, 'civil service', '181579871965.pdf', '2018-12-31', '2020-01-24 13:19:25', '2020-01-24 13:19:30');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_09_05_143929_create_courses_table', 1),
(4, '2019_09_16_171249_create_roles_table', 1),
(5, '2019_09_16_171658_create_role_user_table', 1),
(6, '2019_09_21_015933_create_user_profile', 1),
(7, '2019_09_24_043344_create_applications_table', 1),
(8, '2019_09_25_143543_create_remarks_table', 1),
(9, '2019_10_07_231220_create_notifications_table', 1),
(10, '2019_12_04_220105_create_formal_education_table', 1),
(11, '2019_12_10_003854_create_non_formal_education_table', 1),
(12, '2019_12_10_234421_create_certification_examination_table', 1),
(13, '2019_12_11_104858_create_licensure_table', 1),
(14, '2019_12_11_131351_create_awards_table', 1),
(15, '2019_12_11_140633_create_creative_works_table', 1),
(16, '2019_12_12_152715_create_hobby_table', 1),
(17, '2019_12_12_160404_create_special_skills_table', 1),
(18, '2019_12_12_171001_create_work_activity_table', 1),
(19, '2019_12_12_173550_create_volunteer_table', 1),
(20, '2019_12_12_174713_create_travels_table', 1),
(21, '2019_12_12_180243_create_organization_membership_table', 1),
(22, '2019_12_12_183437_create_engagements_table', 1),
(23, '2019_12_12_190138_create_community_involvement_table', 1),
(24, '2019_12_12_220847_create_community_narrative_table', 1),
(25, '2019_12_23_202244_create_plans_table', 1),
(26, '2019_12_23_223754_create_additional_documents_table', 1),
(27, '2019_12_24_165659_create_work_experience_table', 1),
(28, '2019_09_21_155621_create_uploads_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `non_formal_education`
--

CREATE TABLE `non_formal_education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `trainingProgram` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `certificateTitle` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `certifyingAgency` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `startYear` date NOT NULL,
  `endYear` date NOT NULL,
  `duration` bigint(20) NOT NULL,
  `file` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `non_formal_education`
--

INSERT INTO `non_formal_education` (`id`, `user_id`, `trainingProgram`, `certificateTitle`, `certifyingAgency`, `startYear`, `endYear`, `duration`, `file`, `created_at`, `updated_at`) VALUES
(1, 9, 'program', 'certificate', 'agency', '2002-01-01', '2002-02-02', 1, '91578625396.pdf', '2020-01-10 03:03:16', '2020-01-10 03:03:54'),
(3, 9, 'program', 'cert', 'agency', '2019-12-03', '2020-01-22', 1, '91579779197.pdf', '2020-01-23 11:33:17', '2020-01-23 12:13:37'),
(10, 18, 'program', 'cert', 'agency', '2016-12-31', '2017-12-31', 12, '181579871802.pdf', '2020-01-24 13:16:42', '2020-01-24 13:16:42');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notif` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notify` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `notif`, `notify`, `created_at`, `updated_at`) VALUES
(53, '7', 'Your Application has been Updated!', '2', '2020-01-22 15:17:40', '2020-01-22 15:17:40'),
(61, NULL, 'Your Application has been Updated!', '2', '2020-01-23 13:53:55', '2020-01-23 13:53:55'),
(63, NULL, 'Your Application has been Updated!', '1', '2020-01-23 16:21:26', '2020-01-23 16:21:26'),
(67, '9', 'New Application Submitted!', 'eteeap', '2020-01-23 17:00:28', '2020-02-08 22:20:02'),
(69, '9', 'Your Application has been Updated!', '2', '2020-01-23 17:07:24', '2020-01-23 17:07:24'),
(70, '9', 'Your Application has been Updated!', '2', '2020-01-23 17:07:27', '2020-01-23 17:07:27'),
(72, NULL, 'Your Application has been Updated!', '2', '2020-01-24 07:11:58', '2020-01-24 07:11:58'),
(74, NULL, 'Your Application has been Updated!', '2', '2020-01-24 07:15:09', '2020-01-24 07:15:09'),
(76, '17', 'Your Application has been Updated!', '2', '2020-01-24 07:17:44', '2020-01-24 07:17:44'),
(77, '17', 'Your Application has been Updated!', '2', '2020-01-24 07:18:34', '2020-01-24 07:18:34'),
(78, '17', 'Your Application has been Updated!', '2', '2020-01-24 07:24:07', '2020-01-24 07:24:07'),
(79, '17', 'Your Application has been Updated!', '2', '2020-01-24 07:32:29', '2020-01-24 07:32:29'),
(82, '17', 'Your Application has been Updated!', '3', '2020-01-24 07:36:37', '2020-01-24 07:36:37'),
(83, '17', 'Your Application has been Updated!', '2', '2020-01-24 07:52:17', '2020-01-24 07:52:17'),
(85, '17', 'Your Application has been Updated!', '2', '2020-01-24 08:09:43', '2020-01-24 08:09:43'),
(87, '17', 'Your Application has been Updated!', '2', '2020-01-24 08:09:59', '2020-01-24 08:09:59'),
(88, '17', 'Your Application has been Updated!', '2', '2020-01-24 08:10:08', '2020-01-24 08:10:08'),
(89, '17', 'Your Application has been Updated!', '2', '2020-01-24 08:11:03', '2020-01-24 08:11:03'),
(90, NULL, 'Your Application has been Updated!', '2', '2020-01-24 08:13:38', '2020-01-24 08:13:38'),
(93, '17', 'Your Application has been Updated!', '3', '2020-01-24 08:14:21', '2020-01-24 08:14:21'),
(94, '17', 'Your Application has been Updated!', '2', '2020-01-24 08:14:48', '2020-01-24 08:14:48'),
(95, '17', 'Your Application has been Updated!', '2', '2020-01-24 08:15:02', '2020-01-24 08:15:02'),
(97, '17', 'Your Application has been Updated!', '2', '2020-01-24 08:16:28', '2020-01-24 08:16:28'),
(99, '17', 'Your Application has been Updated!', '3', '2020-01-24 08:16:56', '2020-01-24 08:16:56'),
(101, '17', 'Your Application has been Updated!', '2', '2020-01-24 08:17:12', '2020-01-24 08:17:12'),
(103, '17', 'Your Application has been Updated!', '2', '2020-01-24 08:17:18', '2020-01-24 08:17:18'),
(105, '17', 'Your Application has been Updated!', '3', '2020-01-24 08:17:41', '2020-01-24 08:17:41'),
(107, '17', 'Your Application has been Updated!', '2', '2020-01-24 08:18:19', '2020-01-24 08:18:19'),
(109, '17', 'Your Application has been Updated!', '2', '2020-01-24 08:18:48', '2020-01-24 08:18:48'),
(111, '17', 'Your Application has been Updated!', '3', '2020-01-24 08:19:26', '2020-01-24 08:19:26'),
(113, NULL, 'Your Application has been Updated!', '2', '2020-01-24 13:38:07', '2020-01-24 13:38:07'),
(116, NULL, 'Your Application has been Updated!', '2', '2020-01-24 13:58:33', '2020-01-24 13:58:33'),
(119, NULL, 'Your Application has been Updated!', '2', '2020-01-24 15:33:37', '2020-01-24 15:33:37'),
(125, '18', 'Your Application has been Updated!', '2', '2020-01-24 15:36:00', '2020-01-24 15:36:00'),
(126, '18', 'Your Application has been Updated!', '2', '2020-01-24 15:37:11', '2020-01-24 15:37:11'),
(127, NULL, 'Your Application has been Updated!', '2', '2020-01-24 03:50:19', '2020-01-24 03:50:19'),
(128, '18', 'Your Application has been Forwarded!', 'user', '2020-01-24 03:51:54', '2020-01-24 03:51:54'),
(131, '18', 'Your Application has been Updated!', '3', '2020-01-24 03:53:05', '2020-01-24 03:53:05'),
(132, NULL, 'Your Application has been Updated!', '2', '2020-01-24 03:56:20', '2020-01-24 03:56:20'),
(136, '9', 'Your Application has been Updated!', '3', '2020-01-24 04:01:21', '2020-01-24 04:01:21'),
(138, '9', 'Your Application has been Updated!', '3', '2020-01-24 04:05:24', '2020-01-24 04:05:24'),
(141, '9', 'Application has been Updated!', 'eteeap', '2020-02-08 20:20:14', '2020-02-08 20:20:14'),
(142, '9', 'Your Application has been Updated!', '1', '2020-02-08 20:20:14', '2020-02-08 20:20:14'),
(143, NULL, 'Your Application has been Updated!', '1', '2020-02-08 22:20:05', '2020-02-08 22:20:05'),
(144, NULL, 'Your Application has been Updated!', '1', '2020-02-08 22:28:02', '2020-02-08 22:28:02'),
(145, '9', 'Your Application has been Forwarded!', 'user', '2020-02-08 22:28:16', '2020-02-08 22:28:16'),
(147, '9', 'Application has been Updated!', 'eteeap', '2020-02-08 22:30:38', '2020-02-08 22:30:38'),
(148, '9', 'Your Application has been Updated!', '3', '2020-02-08 22:30:38', '2020-02-08 22:30:38'),
(149, '9', 'Your Application has been Forwarded!', 'user', '2020-02-08 22:31:38', '2020-02-08 22:31:38'),
(151, '9', 'Application has been Updated!', 'eteeap', '2020-02-08 22:31:53', '2020-02-08 22:31:53'),
(152, '9', 'Your Application has been Updated!', '3', '2020-02-08 22:31:53', '2020-02-08 22:31:53');

-- --------------------------------------------------------

--
-- Table structure for table `organization_memberships`
--

CREATE TABLE `organization_memberships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `organization` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `startYear` date NOT NULL,
  `duration` bigint(20) NOT NULL,
  `endYear` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `organization_memberships`
--

INSERT INTO `organization_memberships` (`id`, `user_id`, `type`, `organization`, `position`, `startYear`, `duration`, `endYear`, `created_at`, `updated_at`) VALUES
(1, 9, 'Non-Professional', 'org', 'pos', '2001-01-01', 0, '2001-01-10', '2020-01-10 03:23:08', '2020-01-10 03:23:08'),
(8, 18, 'Professional', 'org', 'pos', '2018-03-31', 20, '2019-12-01', '2020-01-24 13:32:51', '2020-01-24 13:32:51'),
(9, 18, 'Non-Professional', 'org', 'position', '2016-01-31', 11, '2017-01-01', '2020-01-24 13:33:10', '2020-01-24 13:33:10');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `coreValues` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `priority1` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `priority2` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `priority3` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `sgop` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `timePlan` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `accreditationPlan` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `plantoComplete` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `essay` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `user_id`, `coreValues`, `priority1`, `priority2`, `priority3`, `sgop`, `timePlan`, `accreditationPlan`, `plantoComplete`, `essay`, `created_at`, `updated_at`) VALUES
(1, 9, 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum', 'Bachelor of Science in Business Administration Major in Marketing Management', 'Bachelor of Science in Business Administration Major in Operations Management', 'Bachelor of Science in Criminology', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum', '2 years', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum', '2020-01-10 02:59:59', '2020-01-14 11:39:31'),
(5, 18, 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum', 'Bachelor of Arts in Music', 'Bachelor of Science in Business Administration  Major in Financial Management', 'Bachelor of Science in Computer Science', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsu', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum', '2 year', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum', '2020-01-24 13:15:53', '2020-01-24 13:15:53');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `firstName` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `middleName` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `bday` date DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `civil_status` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `citizenship` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `birth_place` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `firstName`, `middleName`, `lastName`, `bday`, `phone`, `address`, `photo`, `civil_status`, `citizenship`, `gender`, `birth_place`, `language`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'M', 'Admin', NULL, '1', 'test', '', 'Single', 'Filipino', 'Male', 'Baguio', 'language', '2020-01-09 18:38:10', '2020-01-09 18:38:10'),
(2, 2, 'Staff', 'M', 'Admin', '2020-01-29', '1', 'test', '', 'Separated', 'Filipino', 'Male', 'Baguio', 'language', '2020-01-09 18:38:10', '2020-01-14 20:20:27'),
(3, 3, 'Dean', 'M', 'Admin', NULL, '1', 'test', '', 'Single', 'Filipino', 'Male', 'Baguio', 'language', '2020-01-09 18:38:10', '2020-01-09 18:38:10'),
(4, 4, 'User', 'M', 'Admin', NULL, '1', 'test', '', 'Single', 'Filipino', 'Male', 'Baguio', 'language', '2020-01-09 18:38:10', '2020-01-09 18:38:10'),
(7, 9, 'Jeffrey', 'Bustamante', 'Rivera', '1991-09-09', '09055290921', '62 Liteng, Pacdal', '1579768112.jpg', 'Married', 'Filipino', 'Female', 'Candon, Ilocos Sur', 'Filipino, English, Ilokano', '2020-01-10 02:54:48', '2020-01-23 08:28:32'),
(11, 18, 'Judalyn', 'Beth', 'Rivera', '1991-09-21', '09071636134', '62 Liteng, Pacdal', '1579879978.png', 'Married', 'Filipino', 'Female', 'Baguio City', 'filipino, english', '2020-01-24 13:15:07', '2020-01-24 15:32:58');

-- --------------------------------------------------------

--
-- Table structure for table `remarks`
--

CREATE TABLE `remarks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_id` bigint(20) UNSIGNED NOT NULL,
  `remarks` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `office` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2020-01-09 18:38:08', '2020-01-09 18:38:08'),
(2, 'eteeap', '2020-01-09 18:38:08', '2020-01-09 18:38:08'),
(3, 'dean', '2020-01-09 18:38:08', '2020-01-14 11:35:01'),
(4, 'user', '2020-01-09 18:38:08', '2020-01-09 18:38:08'),
(5, 'SIT', '2020-01-10 03:50:18', '2020-01-10 03:50:18'),
(6, 'SBAA', '2020-01-10 03:50:46', '2020-01-10 03:50:46'),
(8, 'SLAHS', '2020-01-24 15:31:05', '2020-02-08 22:32:58'),
(9, 'SCJPS', '2020-01-24 15:31:21', '2020-01-24 15:31:21'),
(10, 'SEA', '2020-01-24 15:31:24', '2020-01-24 15:31:24'),
(11, 'STE', '2020-01-24 15:31:29', '2020-01-24 15:31:29'),
(12, 'SIHTM', '2020-01-24 15:31:33', '2020-01-24 15:31:33'),
(13, 'haha', '2020-02-08 21:05:37', '2020-02-08 21:09:42');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(4, 4, 4, NULL, NULL),
(5, 4, 5, NULL, NULL),
(6, 4, 5, NULL, NULL),
(8, 4, 6, NULL, NULL),
(9, 4, 7, NULL, NULL),
(11, 4, 9, NULL, NULL),
(13, 2, 2, NULL, NULL),
(14, 4, 10, NULL, NULL),
(15, 4, 11, NULL, NULL),
(16, 4, 12, NULL, NULL),
(17, 4, 13, NULL, NULL),
(18, 4, 14, NULL, NULL),
(19, 4, 15, NULL, NULL),
(20, 4, 16, NULL, NULL),
(21, 4, 17, NULL, NULL),
(22, 4, 18, NULL, NULL),
(26, 6, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `special_skills`
--

CREATE TABLE `special_skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `skillName` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `special_skills`
--

INSERT INTO `special_skills` (`id`, `user_id`, `skillName`, `file`, `created_at`, `updated_at`) VALUES
(1, 9, 'computer', '1581184967.pdf', '2020-01-10 03:20:36', '2020-02-08 18:02:47'),
(7, 9, 'haha', '91581184803.pdf', '2020-02-08 18:00:03', '2020-02-08 18:00:03');

-- --------------------------------------------------------

--
-- Table structure for table `stages`
--

CREATE TABLE `stages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stage` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stages`
--

INSERT INTO `stages` (`id`, `stage`, `created_at`, `updated_at`) VALUES
(1, 'Initial Assessment', '2020-01-22 10:30:34', '2020-01-22 10:30:34'),
(2, 'Second Assessment', '2020-01-22 10:30:34', '2020-01-22 10:30:34'),
(3, 'Admission', '2020-01-22 10:30:35', '2020-01-22 10:30:35'),
(4, 'Third Assessment', '2020-01-22 10:30:35', '2020-01-22 10:30:35'),
(5, 'Enrollment', '2020-01-22 10:30:35', '2020-01-22 10:30:35'),
(6, 'Completion of Enhancement Program', '2020-01-22 10:30:35', '2020-01-22 10:30:35'),
(7, 'Final Assessment', '2020-01-22 10:30:35', '2020-01-22 10:30:35'),
(8, 'Process Prior Graduation', '2020-01-22 10:30:35', '2020-01-22 10:30:35'),
(9, 'Graduation Rites', '2020-01-22 10:30:35', '2020-01-22 10:30:35'),
(10, 'Completed', '2020-01-22 10:30:35', '2020-01-22 10:30:35');

-- --------------------------------------------------------

--
-- Table structure for table `travels`
--

CREATE TABLE `travels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `location` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `purpose` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `learningExperience` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `travels`
--

INSERT INTO `travels` (`id`, `user_id`, `location`, `purpose`, `learningExperience`, `file`, `created_at`, `updated_at`) VALUES
(1, 9, 'location 1', 'purpose 1', 'exp 1', '1581186299.pdf', '2020-01-10 03:22:32', '2020-02-08 18:24:59'),
(6, 9, '123', '213', '213', '91581186309.pdf', '2020-02-08 18:25:09', '2020-02-08 18:25:09');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `application_letter` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `application_form` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `resume` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cert_of_emp` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `letter_of_recommendation` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passport` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `psa` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transcript` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nbi` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `narrative` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `receipt` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `others` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `user_id`, `application_letter`, `application_form`, `resume`, `cert_of_emp`, `letter_of_recommendation`, `passport`, `psa`, `transcript`, `nbi`, `narrative`, `receipt`, `others`, `created_at`, `updated_at`) VALUES
(2, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-10 02:54:48', '2020-01-10 02:54:48'),
(6, 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-24 13:15:07', '2020-01-24 13:15:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'inactive',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin@admin.com', 'active', '2019-12-31 16:00:00', '$2y$10$JaViKnXR4ZZeIZ7HGOSGruvGkDbqCtaSQCnvczdsGCHVplquCUWPC', NULL, '2020-01-09 18:38:08', '2020-01-09 18:38:08'),
(2, 'staff@staff.com', 'active', '2019-12-31 16:00:00', '$2y$10$XwiR41TMi7d3PVMisXPSQe/XroBmRZzeLfPoedsyKoiwTPubqKNoq', 'uDGvPPvo3k3O8OpzPxV53aq3uTLx5NaIrkxRmDjueSzO0TwHTbZZRg3KmXS4', '2020-01-09 18:38:08', '2020-01-09 18:38:08'),
(3, 'dean@dean.com', 'active', '2019-12-31 16:00:00', '$2y$10$LwzldXcKqbDonDW15.bYoeg98DRItPKQkrBDMsxlIxOOdQmBsDK2q', NULL, '2020-01-09 18:38:09', '2020-01-09 18:38:09'),
(4, 'user@user.com', 'active', '2019-12-31 16:00:00', '$2y$10$UNXLzc69sMgtvE/FVLO4suFkLokfjTZ6r274TRI5p4dWDYwmijQ.u', NULL, '2020-01-09 18:38:09', '2020-01-09 18:38:09'),
(9, 'judalyn.gelia.8@gmail.com', 'active', '2020-01-10 02:46:49', '$2y$10$JaViKnXR4ZZeIZ7HGOSGruvGkDbqCtaSQCnvczdsGCHVplquCUWPC', 'h2o9EIFzNXXbRpRy0ST28gER7SM99DlYPDXV1H4Qjdx7IIO8vcwmlwdYfOtq', '2020-01-10 02:45:09', '2020-01-10 02:54:48'),
(18, 'judalyn.rivera.8@gmail.com', 'active', '2020-01-24 13:14:44', '$2y$10$PTv1CoRNxOATeB/YRmmNoerTYNdJ5wwosagLlra9tX9oetaBzqf8i', NULL, '2020-01-24 13:14:09', '2020-01-24 13:15:07');

-- --------------------------------------------------------

--
-- Table structure for table `volunteers`
--

CREATE TABLE `volunteers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `volunteers`
--

INSERT INTO `volunteers` (`id`, `user_id`, `title`, `file`, `created_at`, `updated_at`) VALUES
(1, 9, 'volunteer 1', '1581186048.pdf', '2020-01-10 03:22:04', '2020-02-08 18:20:48'),
(7, 9, '2', '91581186037.pdf', '2020-02-08 18:20:37', '2020-02-08 18:20:37');

-- --------------------------------------------------------

--
-- Table structure for table `work_activities`
--

CREATE TABLE `work_activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `activity` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `work_activities`
--

INSERT INTO `work_activities` (`id`, `user_id`, `activity`, `description`, `file`, `created_at`, `updated_at`) VALUES
(6, 18, 'activity name', 'lorem ipsum', NULL, '2020-01-24 13:36:04', '2020-01-24 13:36:04'),
(7, 9, 'test', 'test', '1581185378.pdf', '2020-02-08 18:08:56', '2020-02-08 18:09:38');

-- --------------------------------------------------------

--
-- Table structure for table `work_experiences`
--

CREATE TABLE `work_experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `position` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `endYear` date NOT NULL,
  `startYear` date NOT NULL,
  `companyName` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `supervisorName` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `reason` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `terms` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `companyAddress` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `supervisorDesignation` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `functions` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `ref1` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ref2` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ref3` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position1` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position2` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position3` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact1` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact2` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact3` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email1` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email2` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email3` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `duration` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `work_experiences`
--

INSERT INTO `work_experiences` (`id`, `user_id`, `position`, `endYear`, `startYear`, `companyName`, `supervisorName`, `reason`, `file`, `terms`, `companyAddress`, `supervisorDesignation`, `functions`, `ref1`, `ref2`, `ref3`, `position1`, `position2`, `position3`, `contact1`, `contact2`, `contact3`, `email1`, `email2`, `email3`, `duration`, `created_at`, `updated_at`) VALUES
(1, 9, 'position one', '2001-07-01', '2001-01-01', 'name', 'sups name', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum', NULL, 'status', 'address', 'sups designation', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum', 'name one', 'name two', 'name three', 'pos one', 'pos two', 'pos three', '123', '123', '123', 'email1@gmail.com', 'email2@gmail.com', 'email3@gmail.com', 6, '2020-01-10 03:12:34', '2020-01-10 03:16:18'),
(10, 18, 'pos', '2018-12-31', '2017-12-31', 'company name', 'sups', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum', '181579872029.pdf', 'status', 'address', 'sups designation', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum', 'name one', 'name two', 'name three', 'pos one', 'pos two', 'pos three', '123', '123', '123', 'email1@gmail.com', 'email2@gmail.com', 'email3@gmail.com', 12, '2020-01-24 13:20:29', '2020-01-24 13:20:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applications_user_id_foreign` (`user_id`);

--
-- Indexes for table `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `awards_user_id_foreign` (`user_id`);

--
-- Indexes for table `certification_exams`
--
ALTER TABLE `certification_exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `certification_exams_user_id_foreign` (`user_id`);

--
-- Indexes for table `community_involvements`
--
ALTER TABLE `community_involvements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `community_involvements_user_id_foreign` (`user_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_coursecode_unique` (`courseName`);

--
-- Indexes for table `creative_works`
--
ALTER TABLE `creative_works`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creative_works_user_id_foreign` (`user_id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documents_user_id_foreign` (`user_id`);

--
-- Indexes for table `engagements`
--
ALTER TABLE `engagements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `engagements_user_id_foreign` (`user_id`);

--
-- Indexes for table `formal_education`
--
ALTER TABLE `formal_education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `formal_education_user_id_foreign` (`user_id`);

--
-- Indexes for table `hobbies`
--
ALTER TABLE `hobbies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hobbies_user_id_foreign` (`user_id`);

--
-- Indexes for table `licensures`
--
ALTER TABLE `licensures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `licensures_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `non_formal_education`
--
ALTER TABLE `non_formal_education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `non_formal_education_user_id_foreign` (`user_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organization_memberships`
--
ALTER TABLE `organization_memberships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organization_memberships_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plans_user_id_foreign` (`user_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `remarks`
--
ALTER TABLE `remarks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `remarks_app_id_foreign` (`app_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `special_skills`
--
ALTER TABLE `special_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `special_skills_user_id_foreign` (`user_id`);

--
-- Indexes for table `travels`
--
ALTER TABLE `travels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `travels_user_id_foreign` (`user_id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uploads_user_id_unique` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `volunteers`
--
ALTER TABLE `volunteers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `volunteers_user_id_foreign` (`user_id`);

--
-- Indexes for table `work_activities`
--
ALTER TABLE `work_activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_activities_user_id_foreign` (`user_id`);

--
-- Indexes for table `work_experiences`
--
ALTER TABLE `work_experiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_experiences_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `certification_exams`
--
ALTER TABLE `certification_exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `community_involvements`
--
ALTER TABLE `community_involvements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `creative_works`
--
ALTER TABLE `creative_works`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `engagements`
--
ALTER TABLE `engagements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `formal_education`
--
ALTER TABLE `formal_education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `hobbies`
--
ALTER TABLE `hobbies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `licensures`
--
ALTER TABLE `licensures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `non_formal_education`
--
ALTER TABLE `non_formal_education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `organization_memberships`
--
ALTER TABLE `organization_memberships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `remarks`
--
ALTER TABLE `remarks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `special_skills`
--
ALTER TABLE `special_skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `travels`
--
ALTER TABLE `travels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `volunteers`
--
ALTER TABLE `volunteers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `work_activities`
--
ALTER TABLE `work_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `work_experiences`
--
ALTER TABLE `work_experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `awards`
--
ALTER TABLE `awards`
  ADD CONSTRAINT `awards_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `certification_exams`
--
ALTER TABLE `certification_exams`
  ADD CONSTRAINT `certification_exams_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `community_involvements`
--
ALTER TABLE `community_involvements`
  ADD CONSTRAINT `community_involvements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `creative_works`
--
ALTER TABLE `creative_works`
  ADD CONSTRAINT `creative_works_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `engagements`
--
ALTER TABLE `engagements`
  ADD CONSTRAINT `engagements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `formal_education`
--
ALTER TABLE `formal_education`
  ADD CONSTRAINT `formal_education_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hobbies`
--
ALTER TABLE `hobbies`
  ADD CONSTRAINT `hobbies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `licensures`
--
ALTER TABLE `licensures`
  ADD CONSTRAINT `licensures_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `non_formal_education`
--
ALTER TABLE `non_formal_education`
  ADD CONSTRAINT `non_formal_education_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `organization_memberships`
--
ALTER TABLE `organization_memberships`
  ADD CONSTRAINT `organization_memberships_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `plans`
--
ALTER TABLE `plans`
  ADD CONSTRAINT `plans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `remarks`
--
ALTER TABLE `remarks`
  ADD CONSTRAINT `remarks_app_id_foreign` FOREIGN KEY (`app_id`) REFERENCES `applications` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `special_skills`
--
ALTER TABLE `special_skills`
  ADD CONSTRAINT `special_skills_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `travels`
--
ALTER TABLE `travels`
  ADD CONSTRAINT `travels_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `uploads`
--
ALTER TABLE `uploads`
  ADD CONSTRAINT `uploads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `volunteers`
--
ALTER TABLE `volunteers`
  ADD CONSTRAINT `volunteers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `work_activities`
--
ALTER TABLE `work_activities`
  ADD CONSTRAINT `work_activities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `work_experiences`
--
ALTER TABLE `work_experiences`
  ADD CONSTRAINT `work_experiences_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
