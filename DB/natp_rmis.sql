-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 04, 2013 at 02:02 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `natp_rmis`
--

-- --------------------------------------------------------

--
-- Table structure for table `hrm_employees`
--

CREATE TABLE IF NOT EXISTS `hrm_employees` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `employee_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `personal_file_no` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type_id` bigint(20) DEFAULT NULL,
  `category_id` bigint(20) NOT NULL,
  `class_id` bigint(20) NOT NULL,
  `root_organogram_id` bigint(20) DEFAULT NULL,
  `organogram_id` bigint(20) NOT NULL,
  `designation_id` bigint(20) NOT NULL,
  `national_id` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passport_no` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tin_no` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `employee_name_bn` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `employee_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `father_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `father_name_bn` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district_id` bigint(20) DEFAULT NULL,
  `date_of_birth` date NOT NULL,
  `sex` enum('Male','Female') COLLATE utf8_unicode_ci NOT NULL,
  `blood_group_id` bigint(20) DEFAULT NULL,
  `marital_status_id` bigint(20) NOT NULL,
  `religion_id` bigint(20) NOT NULL,
  `is_freed_fighter` tinyint(1) NOT NULL,
  `is_child_grand_child_freedom_fighter` tinyint(1) NOT NULL,
  `service_quota_id` bigint(20) DEFAULT NULL,
  `joining_date` date NOT NULL,
  `confirmation_go_date` date DEFAULT NULL,
  `date_pf_membership` date DEFAULT NULL,
  `lpr_prl_date` date DEFAULT NULL,
  `retirement_date` date DEFAULT NULL,
  `is_death_status` tinyint(1) NOT NULL,
  `date_of_death` date DEFAULT NULL,
  `posting_area_id` bigint(20) DEFAULT NULL,
  `location` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cadre` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dadre_date` date DEFAULT NULL,
  `batch` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `option_for_work_field` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `per_village_House No_road` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `per_post_code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `per_district_id` bigint(20) DEFAULT NULL,
  `per_thana_id` bigint(20) DEFAULT NULL,
  `per_telephone_no` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `per_mobile_no` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre_village_House No_road` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre_post_code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre_district_id` bigint(20) DEFAULT NULL,
  `pre_thana_id` bigint(20) DEFAULT NULL,
  `pre_telephone_no` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre_mobile_no` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`,`organization_id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `employee_id_unique` (`employee_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `hrm_employees`
--

INSERT INTO `hrm_employees` (`id`, `organization_id`, `employee_id`, `personal_file_no`, `type_id`, `category_id`, `class_id`, `root_organogram_id`, `organogram_id`, `designation_id`, `national_id`, `passport_no`, `tin_no`, `employee_name_bn`, `employee_name`, `father_name`, `father_name_bn`, `mother_name`, `district_id`, `date_of_birth`, `sex`, `blood_group_id`, `marital_status_id`, `religion_id`, `is_freed_fighter`, `is_child_grand_child_freedom_fighter`, `service_quota_id`, `joining_date`, `confirmation_go_date`, `date_pf_membership`, `lpr_prl_date`, `retirement_date`, `is_death_status`, `date_of_death`, `posting_area_id`, `location`, `cadre`, `dadre_date`, `batch`, `option_for_work_field`, `per_village_House No_road`, `per_post_code`, `per_district_id`, `per_thana_id`, `per_telephone_no`, `per_mobile_no`, `pre_village_House No_road`, `pre_post_code`, `pre_district_id`, `pre_thana_id`, `pre_telephone_no`, `pre_mobile_no`, `email`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, '101', 'p1', 1, 1, 1, 6, 8, 1, '2121', '12321', NULL, 'Amiya BD', 'Amiya K. Saha', 'Rk Saha', NULL, NULL, 1, '1981-12-15', 'Male', 1, 2, 1, 0, 0, NULL, '2000-12-12', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'amiya@www.com', 1, '0000-00-00 00:00:00', NULL, '2013-08-29 11:46:40', NULL),
(2, 1, '202', 'f100', 1, 2, 2, 5, 2, 2, '1212', NULL, NULL, 'Kamrul BD', 'Kamrul Hasan', 'Haru1 ', NULL, NULL, 1, '1980-12-12', 'Male', NULL, 4, 2, 1, 1, NULL, '2006-10-10', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qqq@tvl.com', 1, '0000-00-00 00:00:00', NULL, '2013-08-29 11:46:47', NULL),
(4, 1, '104', 'pf-0123', 1, 1, 1, NULL, 0, 2, NULL, NULL, NULL, 'sdfsad', 'dfdsfasd', '', NULL, NULL, NULL, '0000-00-00', 'Male', NULL, 0, 0, 0, 0, NULL, '2013-09-12', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2013-09-12 05:21:58', 1, '2013-09-12 05:17:57', NULL),
(6, 1, '123', 'sdfasd', 2, 2, 1, NULL, 10, 4, NULL, NULL, NULL, 'sdfsa', 'dsfsa', '', NULL, NULL, NULL, '0000-00-00', 'Male', NULL, 0, 0, 0, 0, NULL, '2013-09-12', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2013-09-12 05:40:06', 1, '2013-09-12 05:36:05', NULL),
(7, 1, '02321', 'tesd', 3, 2, 2, NULL, 2, 2, NULL, NULL, NULL, 'sdfsd', 'ewrqer', '', NULL, NULL, NULL, '0000-00-00', 'Male', NULL, 0, 0, 0, 0, NULL, '2013-09-17', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2013-09-15 09:20:13', 7, '2013-09-15 09:16:05', NULL),
(8, 1, 'test', 'dasdf', 1, 2, 2, NULL, 1, 2, NULL, NULL, NULL, 'sdfsad', 'sdfsd', '', NULL, NULL, NULL, '0000-00-00', 'Male', NULL, 0, 0, 0, 0, NULL, '2013-09-15', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2013-09-15 09:37:03', 7, '2013-09-15 09:32:55', NULL),
(9, 1, 'jhjhj', 'jgjh', 2, 2, 2, NULL, 1, 4, NULL, NULL, NULL, 'jjhgjj', 'jhj', '', NULL, NULL, NULL, '0000-00-00', 'Male', NULL, 0, 0, 0, 0, NULL, '2013-10-02', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2013-09-15 10:05:30', 5, '2013-09-15 10:01:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hrm_organograms`
--

CREATE TABLE IF NOT EXISTS `hrm_organograms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `organogram_name` varchar(200) DEFAULT NULL,
  `reports_to` int(11) DEFAULT '0',
  `organogram_type` enum('Division','Wing','Centre','Section','Sub-Centre','Regional Office/Lab','Unit','District Office','Department') DEFAULT NULL,
  `origin_organization_id` int(11) DEFAULT '0',
  `is_active` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`organization_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `hrm_organograms`
--

INSERT INTO `hrm_organograms` (`id`, `organization_id`, `organogram_name`, `reports_to`, `organogram_type`, `origin_organization_id`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 'Finance - BARC', 0, 'Division', 1, 1, NULL, NULL, '2013-08-13 05:16:13', NULL),
(2, 1, 'Accounts- BARC ', 0, 'Division', 1, 1, NULL, NULL, '2013-08-13 05:17:00', NULL),
(3, 1, 'Finance Section - BARC', 1, 'Centre', 0, 1, NULL, NULL, '2013-08-13 05:17:32', NULL),
(5, 1, 'Finance sub-Centre - BARC', 3, 'Sub-Centre', 0, 1, NULL, NULL, '2013-08-13 05:21:22', NULL),
(6, 1, 'F-SRD1', 0, 'Regional Office/Lab', 2, NULL, NULL, NULL, '2013-08-13 05:24:05', NULL),
(7, 1, 'A-SRD1', 0, 'Regional Office/Lab', 2, NULL, NULL, NULL, '2013-08-13 05:24:34', NULL),
(8, 1, 'F Centre- SRD1', 6, 'Centre', 0, NULL, NULL, NULL, '2013-08-13 05:25:27', NULL),
(9, 1, 'A Centre - SRD1', 7, 'Centre', 0, NULL, NULL, NULL, '2013-08-13 05:25:58', NULL),
(10, 20, 'Marketing', 0, 'Division', 1, NULL, '2013-08-19 13:09:37', 200, '2013-08-19 07:30:27', 200),
(16, 20, 'sub centre mark', 10, 'Sub-Centre', 0, NULL, '2013-08-19 14:06:32', 200, '2013-08-19 08:06:32', NULL),
(18, 20, 'test 212dfdsaf ', 10, 'Division', 0, NULL, '2013-08-19 14:12:22', 200, '2013-08-20 04:31:46', 200),
(48, 20, 'ddd dd 333', 10, 'Section', 0, NULL, '2013-08-19 18:36:23', 200, '2013-08-19 13:42:47', 200),
(61, 20, 'test123', 48, 'District Office', 0, NULL, '2013-08-19 19:17:34', 200, '2013-08-19 13:17:34', NULL),
(62, 20, 'dfsdfsad 123', 48, 'District Office', 0, NULL, '2013-08-19 19:22:06', 200, '2013-08-19 13:22:06', NULL),
(63, 20, 'sdfsd', 48, 'Unit', 0, NULL, '2013-08-19 19:22:50', 200, '2013-08-19 13:43:52', 200),
(64, 20, 'OK..', 18, 'Sub-Centre', 0, NULL, '2013-08-20 10:17:27', 200, '2013-08-20 04:17:27', NULL),
(65, 20, 'testdd 11', 18, 'Division', 0, NULL, '2013-08-20 10:25:16', 200, '2013-08-20 04:25:16', NULL),
(66, 20, 'dsfasdfas', 18, 'District Office', 0, NULL, '2013-08-20 10:25:35', 200, '2013-08-20 04:25:35', NULL),
(67, 20, 'ok123', 18, 'Wing', 0, NULL, '2013-08-20 10:27:38', 200, '2013-08-20 04:27:38', NULL),
(68, 20, 'test133 123', 10, 'Wing', 0, NULL, '2013-08-20 10:29:54', 200, '2013-08-20 04:42:11', 200),
(69, 20, '1212', 68, 'Unit', 0, NULL, '2013-08-22 18:13:18', 200, '2013-08-22 12:13:18', NULL),
(70, 20, 'jggj', 0, 'Division', 1, NULL, '2013-08-26 17:16:50', 200, '2013-08-26 11:13:24', NULL),
(71, 20, 'jg', 1, 'Wing', 0, NULL, '2013-08-26 17:17:09', 200, '2013-08-26 11:13:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_aezs`
--

CREATE TABLE IF NOT EXISTS `rmis_aezs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `value` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `is_default` enum('yes','no') COLLATE utf8_unicode_ci DEFAULT 'no',
  `is_active` tinyint(4) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`,`organization_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rmis_aezs`
--

INSERT INTO `rmis_aezs` (`id`, `organization_id`, `value`, `name`, `weight`, `is_default`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, '1', 'AEZ-1', 1, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-11-03 12:50:36', NULL),
(2, 1, '2', 'AEZ-2', 2, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-11-03 12:50:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_commodities`
--

CREATE TABLE IF NOT EXISTS `rmis_commodities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `value` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `is_default` enum('yes','no') COLLATE utf8_unicode_ci DEFAULT 'no',
  `is_active` tinyint(4) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`,`organization_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rmis_commodities`
--

INSERT INTO `rmis_commodities` (`id`, `organization_id`, `value`, `name`, `weight`, `is_default`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 0, '1', 'Comodity 1', 1, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-11-03 12:52:32', NULL),
(2, 1, '2', 'Comodity 2', 2, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-11-03 12:52:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_departments`
--

CREATE TABLE IF NOT EXISTS `rmis_departments` (
  `department_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(255) NOT NULL,
  `institute_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `rmis_departments`
--

INSERT INTO `rmis_departments` (`department_id`, `department_name`, `institute_id`) VALUES
(1, 'Department 1', 0),
(2, 'Department 2', 0),
(3, 'Department 3', 0),
(4, 'Department 4', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_divisions`
--

CREATE TABLE IF NOT EXISTS `rmis_divisions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `division_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `division_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `division_head` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `division_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `division_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `division_order` int(11) NOT NULL,
  `division_about` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`organization_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `rmis_divisions`
--

INSERT INTO `rmis_divisions` (`id`, `organization_id`, `division_id`, `division_name`, `division_head`, `division_phone`, `division_email`, `division_order`, `division_about`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 0, 'BARIDIV1', 'Dhaka', '101', '01558755441', 'ashish021@gmail.com', 1, 'Test Division', '2013-09-30 11:53:34', 1, '2013-10-11 05:54:32', 1),
(3, 0, 'BARIDIV0002', 'Rajshahi', '202', '01714532345', 'test2@yahoo.com', 1, 'test division', '2013-10-01 09:39:49', 1, '2013-10-11 05:54:57', 1),
(5, 0, 'BARIDIV0004', 'Sylhet', '202', '017145323451', 'alimul@yahoo.com', 2, 'test organization', '2013-11-03 12:14:11', 1, '2013-11-03 12:15:44', 1),
(6, 1, 'BARIDIV0006', 'Alimul Division', '101', '01714532345', 'alimul@yahoo.com', 2, 'test', '2013-11-04 03:48:13', 1, '2013-11-04 09:48:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_grade_point_informations`
--

CREATE TABLE IF NOT EXISTS `rmis_grade_point_informations` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `lower_range` float NOT NULL,
  `upper_range` float NOT NULL,
  `letter_grade` varchar(10) NOT NULL,
  `grade_point` float NOT NULL,
  `qualitative_status` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `grading_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `rmis_grade_point_informations`
--

INSERT INTO `rmis_grade_point_informations` (`id`, `lower_range`, `upper_range`, `letter_grade`, `grade_point`, `qualitative_status`, `description`, `grading_id`) VALUES
(19, 90, 100, 'A+', 5, 'Highly Qualitative', 'Highly Qualititative Research Work', 1),
(20, 80, 90, 'A', 4.75, 'Qualitative', 'Qualitative Research Work', 1),
(21, 70, 80, 'A-', 4.5, 'Good', 'Good Work', 1),
(22, 60, 70, 'B+', 4.25, 'Average', 'Average research work', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_gradings`
--

CREATE TABLE IF NOT EXISTS `rmis_gradings` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `grading_title` varchar(255) NOT NULL,
  `effect_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rmis_gradings`
--

INSERT INTO `rmis_gradings` (`id`, `organization_id`, `grading_title`, `effect_date`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 'Test Grade', '2013-10-19', '2013-10-19 14:01:09', 1, '2013-11-04 08:02:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_implementation_sites`
--

CREATE TABLE IF NOT EXISTS `rmis_implementation_sites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `implementation_site_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `implementation_site_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_person` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `implementation_order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`organization_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rmis_implementation_sites`
--

INSERT INTO `rmis_implementation_sites` (`id`, `organization_id`, `implementation_site_id`, `implementation_site_name`, `contact_person`, `phone_number`, `email_address`, `implementation_order`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(2, 1, 'BARIIMS0001', 'Dhaka', '101', '01779021581', 'ashish021@gmail.com', 1, '2013-09-30 12:37:51', 1, '2013-11-04 13:59:05', 1),
(3, 1, 'BARIIMS0003', 'Khulna', '202', '01732542342', 'alim@yahoo.com', 1, '2013-11-03 08:36:29', 1, '2013-11-04 13:58:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_institutes`
--

CREATE TABLE IF NOT EXISTS `rmis_institutes` (
  `institute_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `institute_sort_code` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `institute_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`institute_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `rmis_institutes`
--

INSERT INTO `rmis_institutes` (`institute_id`, `institute_sort_code`, `institute_name`) VALUES
(1, 'BARI', 'Bangladesh Agricultural Research Institute'),
(2, 'BRRI', 'Bangladesh Rice Research Institute'),
(3, 'BJRI', 'Bangladesh Jute Research Institute'),
(4, 'BLRI', 'Bangladesh Livestock Research Institute'),
(5, 'BSRI', 'Bangladesh Sugarcane Research Institute'),
(6, 'BFRI', 'Bangladesh Fisheries Research Institute'),
(7, 'SRDI', 'Soil Resources Development Institute'),
(8, 'BARC', 'Bangladesh Agricultural Research Council');

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_activities`
--

CREATE TABLE IF NOT EXISTS `rmis_program_activities` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `s_o` varchar(255) NOT NULL,
  `work_element` text NOT NULL,
  `planned_startDate` date NOT NULL,
  `planned_endDate` date NOT NULL,
  `actual_startDate` date NOT NULL,
  `actual_endDate` varchar(255) NOT NULL,
  `assign_resource` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  `program_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `rmis_program_activities`
--

INSERT INTO `rmis_program_activities` (`id`, `organization_id`, `s_o`, `work_element`, `planned_startDate`, `planned_endDate`, `actual_startDate`, `actual_endDate`, `assign_resource`, `created_at`, `created_by`, `updated_at`, `updated_by`, `program_id`) VALUES
(9, 0, '1', 'Test work element 1', '2013-10-10', '2014-10-10', '2013-11-10', '2014-11-10', 202, '2013-11-01 11:58:37', 1, '2013-11-01 11:58:37', 1, 1),
(10, 0, '2', 'Test work element 2', '2013-10-10', '2014-10-10', '2013-11-10', '2014-11-10', 101, '2013-11-01 11:58:37', 1, '2013-11-01 11:58:37', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_areas`
--

CREATE TABLE IF NOT EXISTS `rmis_program_areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `program_area_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `program_area_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `program_area_order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `rmis_program_areas`
--

INSERT INTO `rmis_program_areas` (`id`, `organization_id`, `program_area_id`, `program_area_name`, `program_area_order`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(2, 0, 'BARIPA0001', 'Dhaka', 1, '2013-09-30 12:50:48', 1, '2013-09-30 12:50:48', NULL),
(3, 0, 'BARIPA0003', 'Khulna', 1, '2013-10-01 09:40:27', 1, '2013-10-01 09:40:27', NULL),
(6, 1, 'BARIPA0006', 'Onion', 1, '2013-11-03 09:04:40', 1, '2013-11-04 13:59:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_cost_breakdowns`
--

CREATE TABLE IF NOT EXISTS `rmis_program_cost_breakdowns` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `s_o` varchar(255) NOT NULL,
  `ac_head_code` bigint(20) NOT NULL,
  `ac_head_title` bigint(20) NOT NULL,
  `amount` float NOT NULL,
  `program_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `rmis_program_cost_breakdowns`
--

INSERT INTO `rmis_program_cost_breakdowns` (`id`, `s_o`, `ac_head_code`, `ac_head_title`, `amount`, `program_id`) VALUES
(8, '1', 120, 0, 800000, 1),
(9, '2', 125, 0, 80000000, 1),
(10, '3', 130, 0, 10000000, 1),
(11, '4', 135, 0, 5000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_cost_estimations`
--

CREATE TABLE IF NOT EXISTS `rmis_program_cost_estimations` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `estimate_date` date NOT NULL,
  `financial_year` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  `program_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rmis_program_cost_estimations`
--

INSERT INTO `rmis_program_cost_estimations` (`id`, `organization_id`, `estimate_date`, `financial_year`, `created_at`, `created_by`, `updated_at`, `updated_by`, `program_id`) VALUES
(1, 0, '2013-10-26', '2014-2015', '2013-10-26 10:38:40', 1, '2013-10-28 12:02:03', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_funding_sources`
--

CREATE TABLE IF NOT EXISTS `rmis_program_funding_sources` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `fund_source` bigint(20) NOT NULL,
  `amount` float NOT NULL,
  `currency` varchar(255) NOT NULL,
  `exchange_rate` float NOT NULL,
  `date_of_exchange_rate` date NOT NULL,
  `amount_in_taka` float NOT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  `program_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `rmis_program_funding_sources`
--

INSERT INTO `rmis_program_funding_sources` (`id`, `organization_id`, `fund_source`, `amount`, `currency`, `exchange_rate`, `date_of_exchange_rate`, `amount_in_taka`, `created_at`, `created_by`, `updated_at`, `updated_by`, `program_id`) VALUES
(8, 0, 12, 10000000, 'USD', 80, '2013-10-03', 800000000, NULL, NULL, '2013-10-28 12:02:03', 1, 1),
(9, 0, 13, 10000, 'EUR', 100, '2013-10-03', 1000000, NULL, NULL, '2013-10-28 12:02:03', 1, 1),
(10, 0, 14, 2000, 'GB', 120, '2013-10-04', 240000, NULL, NULL, '2013-10-28 12:02:03', 1, 1),
(11, 0, 15, 5000, 'DK', 7, '2013-10-05', 35000, NULL, NULL, '2013-10-28 12:02:03', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_implementation_committees`
--

CREATE TABLE IF NOT EXISTS `rmis_program_implementation_committees` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `committee_formation_date` date NOT NULL,
  `program_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rmis_program_implementation_committees`
--

INSERT INTO `rmis_program_implementation_committees` (`id`, `organization_id`, `committee_formation_date`, `program_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 0, '2013-10-27', 1, '2013-10-26 11:40:06', 1, '2013-10-28 12:22:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_implementation_committee_members`
--

CREATE TABLE IF NOT EXISTS `rmis_program_implementation_committee_members` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `committee_member_type` varchar(255) DEFAULT NULL,
  `member_name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `program_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `rmis_program_implementation_committee_members`
--

INSERT INTO `rmis_program_implementation_committee_members` (`id`, `committee_member_type`, `member_name`, `designation`, `contact_no`, `email`, `program_id`) VALUES
(5, '1', '1', 'President', '01779021581', 'ashish021@gmail.com', 1),
(6, '2', '2', 'Vice President', '01779021581', 'debasis@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_informations`
--

CREATE TABLE IF NOT EXISTS `rmis_program_informations` (
  `program_id` int(11) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `research_program_title` text COLLATE utf8_unicode_ci NOT NULL,
  `program_area` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `program_division` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `program_researchType` bigint(20) NOT NULL,
  `program_researchPriority` bigint(20) NOT NULL,
  `program_researchStatus` bigint(20) NOT NULL,
  `program_coordinator` bigint(20) NOT NULL,
  `program_coordinatorDesignation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_collaborate` set('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `program_instituteNames` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `program_departmentName` bigint(20) NOT NULL,
  `program_regionalStationName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `program_implementationLocation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `program_keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `program_commodities` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `program_aezs` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `program_plannedStartDate` date NOT NULL,
  `program_plannedEndDate` date NOT NULL,
  `program_initiationDate` date NOT NULL,
  `program_completionDate` date NOT NULL,
  `program_plannedBudget` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `program_approvedBudget` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `program_goal` longtext COLLATE utf8_unicode_ci NOT NULL,
  `program_objective` longtext COLLATE utf8_unicode_ci NOT NULL,
  `program_expectedOutputs` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) unsigned NOT NULL,
  `updated_ay` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`program_id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rmis_program_informations`
--

INSERT INTO `rmis_program_informations` (`program_id`, `organization_id`, `research_program_title`, `program_area`, `program_division`, `program_researchType`, `program_researchPriority`, `program_researchStatus`, `program_coordinator`, `program_coordinatorDesignation`, `is_collaborate`, `program_instituteNames`, `program_departmentName`, `program_regionalStationName`, `program_implementationLocation`, `program_keywords`, `program_commodities`, `program_aezs`, `program_plannedStartDate`, `program_plannedEndDate`, `program_initiationDate`, `program_completionDate`, `program_plannedBudget`, `program_approvedBudget`, `program_goal`, `program_objective`, `program_expectedOutputs`, `created_at`, `created_by`, `updated_ay`, `updated_by`) VALUES
(1, 0, 'This is test program titel edit', 'BARIPA0005', 'BARIDIV0002', 2, 4, 3, 0, 'Vice President', '1', '1,4', 4, 'BARIRS0001', 'BARIIMS0001', 'Dhaka, Chittagong', '1,5', '1,3,4', '2013-10-26', '2013-11-29', '2013-10-26', '2013-12-31', '10000000', '10000000', 'Test program goal Test program goal Test program goal Test program goal Test program goal Test program goal Test program goal Test program goal Test program goal Test program goal Test program goal Test program goal Test program goal Test program goal ', 'Test program purpose Test program purpose Test program purpose Test program purpose Test program purpose Test program purpose Test program purpose Test program purpose Test program purpose Test program purpose Test program purpose Test program purpose Test program purpose Test program purpose Test program purpose ', 'Test program expected output Test program expected output Test program expected output Test program expected output Test program expected output Test program expected output Test program expected output Test program expected output Test program expected output Test program expected output Test program expected output Test program expected output Test program expected output Test program expected output ---##########---Test program expected output 2 Test program expected output 2 Test program expected output 2 Test program expected output 2 Test program expected output 2 Test program expected output 2 Test program expected output 2 Test program expected output 2 Test program expected output 2 Test program expected output 2 Test program expected output 2 Test program expected output 2 ---##########---Test program expected output 3 Test program expected output 3 Test program expected output 3 Test program expected output 3 Test program expected output 3 Test program expected output 3 Test program expected output 3 Test program expected output 3 Test program expected output 3 Test program expected output 3 Test program expected output 3 Test program expected output 3 Test program expected output 3 Test program expected output 3 ---##########---', '0000-00-00 00:00:00', 2013, '0000-00-00 00:00:00', 2013);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_me_committees`
--

CREATE TABLE IF NOT EXISTS `rmis_program_me_committees` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `committee_chairman` bigint(20) NOT NULL,
  `committee_formation_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rmis_program_me_committees`
--

INSERT INTO `rmis_program_me_committees` (`id`, `organization_id`, `committee_chairman`, `committee_formation_date`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 0, 202, '2013-10-19', '2013-10-19 13:58:55', 1, '2013-10-19 13:59:25', 1),
(2, 0, 0, '2013-11-05', '2013-11-03 10:13:03', 1, '2013-11-03 16:15:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_me_committee_members`
--

CREATE TABLE IF NOT EXISTS `rmis_program_me_committee_members` (
  `committee_id` bigint(20) NOT NULL,
  `member_id` bigint(20) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `role_in_committee` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rmis_program_me_committee_members`
--

INSERT INTO `rmis_program_me_committee_members` (`committee_id`, `member_id`, `designation`, `role_in_committee`) VALUES
(1, 202, 'Vice President', 'Manage Everything'),
(1, 101, 'President', 'manage All in all'),
(1, 123, 'Programer', 'Manage the full system'),
(2, 0, 'President', 'Member'),
(2, 123, 'Vice President', 'Team Leader');

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_other_informations`
--

CREATE TABLE IF NOT EXISTS `rmis_program_other_informations` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `program_rationale` longtext,
  `program_methodology` longtext,
  `program_background` longtext,
  `program_socio_economical_impact` longtext,
  `program_environmental_impact` longtext,
  `program_targeted_beneficiary` longtext,
  `program_reference` longtext,
  `program_external_affiliation` longtext,
  `program_organization_policy` longtext,
  `program_risks` longtext,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  `program_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rmis_program_other_informations`
--

INSERT INTO `rmis_program_other_informations` (`id`, `organization_id`, `program_rationale`, `program_methodology`, `program_background`, `program_socio_economical_impact`, `program_environmental_impact`, `program_targeted_beneficiary`, `program_reference`, `program_external_affiliation`, `program_organization_policy`, `program_risks`, `created_at`, `created_by`, `updated_at`, `updated_by`, `program_id`) VALUES
(1, 0, 'Test program Rationale Test program Rationale Test program Rationale Test program Rationale Test program Rationale Test program Rationale Test program Rationale Test program Rationale Test program Rationale Test program Rationale Edit', 'Test program methodology Test program methodology Test program methodology Test program methodology Test program methodology Test program methodology Test program methodology Test program methodology Test program methodology Test program methodology Test program methodology Test program methodology Test program methodology ', 'Test program background Test program background Test program background Test program background Test program background Test program background Test program background Test program background Test program background Test program background Test program background  Fucking Edit', 'Test program Socio Economical Impact  Test program Socio Economical Impact  Test program Socio Economical Impact  Test program Socio Economical Impact  Test program Socio Economical Impact  Test program Socio Economical Impact  Test program Socio Economical Impact  Test program Socio Economical Impact  Test program Socio Economical Impact  Test program Socio Economical Impact  ', 'Test program Environmental Impact  Test program Environmental Impact  Test program Environmental Impact  Test program Environmental Impact  Test program Environmental Impact  Test program Environmental Impact  Test program Environmental Impact  Test program Environmental Impact  Test program Environmental Impact  Test program Environmental Impact  Test program Environmental Impact  Test program Environmental Impact  ', 'Test program Targeted Beneficiary   Test program Targeted Beneficiary   Test program Targeted Beneficiary   Test program Targeted Beneficiary   Test program Targeted Beneficiary   Test program Targeted Beneficiary   Test program Targeted Beneficiary   Test program Targeted Beneficiary   Test program Targeted Beneficiary   Test program Targeted Beneficiary   Test program Targeted Beneficiary   Test program Targeted Beneficiary   Test program Targeted Beneficiary   ', 'Test program Reference    Test program Reference    Test program Reference    Test program Reference    Test program Reference    Test program Reference    Test program Reference    Test program Reference    Test program Reference    Test program Reference    Test program Reference    ', 'Test program External Affiliation Test program External Affiliation Test program External Affiliation Test program External Affiliation Test program External Affiliation Test program External Affiliation Test program External Affiliation Test program External Affiliation Test program External Affiliation Test program External Affiliation Test program External Affiliation Test program External Affiliation ', 'Test program Organization Policy Test program Organization Policy Test program Organization Policy Test program Organization Policy Test program Organization Policy Test program Organization Policy Test program Organization Policy Test program Organization Policy Test program Organization Policy Test program Organization Policy Test program Organization Policy Test program Organization Policy ', 'Test program Programme Risks Test program Programme Risks Test program Programme Risks Test program Programme Risks Test program Programme Risks Test program Programme Risks Test program Programme Risks Test program Programme Risks Test program Programme Risks Test program Programme Risks Test program Programme Risks ', '2013-10-26 10:33:59', 1, '2013-10-26 14:24:27', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_research_teams`
--

CREATE TABLE IF NOT EXISTS `rmis_program_research_teams` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `team_formation_date` date NOT NULL,
  `program_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rmis_program_research_teams`
--

INSERT INTO `rmis_program_research_teams` (`id`, `organization_id`, `team_formation_date`, `program_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 0, '2013-10-27', 1, '2013-10-26 10:44:44', 1, '2013-11-02 01:42:11', 1),
(2, 0, '2013-10-26', 0, NULL, NULL, '2013-10-28 12:10:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_research_team_members`
--

CREATE TABLE IF NOT EXISTS `rmis_program_research_team_members` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `member_type` varchar(255) DEFAULT NULL,
  `institute_name` varchar(255) DEFAULT NULL,
  `member_name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `program_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `rmis_program_research_team_members`
--

INSERT INTO `rmis_program_research_team_members` (`id`, `member_type`, `institute_name`, `member_name`, `designation`, `contact_no`, `email`, `program_id`) VALUES
(23, '1', '1', '202', 'President', '01779021581', 'ashish021@gmail.com', 1),
(24, '2', '2', '101', 'Vice President', '01711084616', 'debasis@gmail.com', 1),
(25, '3', '3', '101', 'Vice President', '01711084616', 'debasis@gmail.com', 1),
(26, '4', '4', '102', 'Vice President', '01711084616', 'debasis@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_steering_committees`
--

CREATE TABLE IF NOT EXISTS `rmis_program_steering_committees` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `committee_formation_date` date NOT NULL,
  `program_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rmis_program_steering_committees`
--

INSERT INTO `rmis_program_steering_committees` (`id`, `organization_id`, `committee_formation_date`, `program_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 0, '2013-10-27', 1, '2013-10-26 10:49:01', 1, '2013-10-28 12:17:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_steering_committee_members`
--

CREATE TABLE IF NOT EXISTS `rmis_program_steering_committee_members` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `committee_member_type` varchar(255) DEFAULT NULL,
  `member_name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `program_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `rmis_program_steering_committee_members`
--

INSERT INTO `rmis_program_steering_committee_members` (`id`, `committee_member_type`, `member_name`, `designation`, `contact_no`, `email`, `program_id`) VALUES
(6, '1', '1', 'President', '01779021581', 'ashish021@gmail.com', 1),
(7, '2', '2', 'Vice President', '01779021581', 'debasis@gmail.com', 1),
(8, '3', '3', 'programer', '01779021581', 'dhiman@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_regional_stations`
--

CREATE TABLE IF NOT EXISTS `rmis_regional_stations` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `station_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `station_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `station_contact_person` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `station_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `station_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `station_order` int(11) NOT NULL,
  `station_address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rmis_regional_stations`
--

INSERT INTO `rmis_regional_stations` (`id`, `organization_id`, `station_id`, `station_name`, `station_contact_person`, `station_phone`, `station_email`, `station_order`, `station_address`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 'BARIRS0001', 'Tangail', 'Alimul Razi', '01716463156', 'alimulrazi28@gmail.com', 1, 'This is a test data', '2013-10-01 23:22:22', 1, '2013-11-04 13:58:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_research_priorities`
--

CREATE TABLE IF NOT EXISTS `rmis_research_priorities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `value` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `is_default` enum('yes','no') COLLATE utf8_unicode_ci DEFAULT 'no',
  `is_active` tinyint(4) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`,`organization_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rmis_research_priorities`
--

INSERT INTO `rmis_research_priorities` (`id`, `organization_id`, `value`, `name`, `weight`, `is_default`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 0, '1', '1st', 1, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-09-25 05:48:02', NULL),
(2, 1, '2', '2nd', 2, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-09-25 05:48:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_research_statuses`
--

CREATE TABLE IF NOT EXISTS `rmis_research_statuses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `value` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `is_default` enum('yes','no') COLLATE utf8_unicode_ci DEFAULT 'no',
  `is_active` tinyint(4) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`,`organization_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `rmis_research_statuses`
--

INSERT INTO `rmis_research_statuses` (`id`, `organization_id`, `value`, `name`, `weight`, `is_default`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 0, '1', 'New', 1, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-09-25 05:48:02', NULL),
(2, 1, '2', 'On-Going', 2, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-09-25 05:48:19', NULL),
(3, 2, '1', 'Completed', 1, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-09-25 05:48:02', NULL),
(4, 3, '2', 'Stop', 2, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-09-25 05:48:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_research_types`
--

CREATE TABLE IF NOT EXISTS `rmis_research_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `value` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `is_default` enum('yes','no') COLLATE utf8_unicode_ci DEFAULT 'no',
  `is_active` tinyint(4) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`,`organization_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rmis_research_types`
--

INSERT INTO `rmis_research_types` (`id`, `organization_id`, `value`, `name`, `weight`, `is_default`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 0, '1', 'Basic', 1, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-09-25 05:48:02', NULL),
(2, 1, '2', 'Strategic', 2, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-09-25 05:48:19', NULL),
(3, 2, '1', 'Impact Study', 1, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-09-25 05:48:02', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
