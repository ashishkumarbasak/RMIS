-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 30, 2013 at 06:55 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


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
(1, 1, '101', 'p1', 1, 1, 1, 6, 8, 1, '2121', '12321', NULL, 'Amiya BD', 'Amiya K. Saha', 'Rk Saha', NULL, NULL, 1, '1981-12-15', 'Male', 1, 2, 1, 0, 0, NULL, '2000-12-12', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'amiya@www.com', 1, '0000-00-00 00:00:00', NULL, '2013-08-29 17:46:40', NULL),
(2, 1, '202', 'f100', 1, 2, 2, 5, 2, 2, '1212', NULL, NULL, 'Kamrul BD', 'Kamrul Hasan', 'Haru1 ', NULL, NULL, 1, '1980-12-12', 'Male', NULL, 4, 2, 1, 1, NULL, '2006-10-10', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qqq@tvl.com', 1, '0000-00-00 00:00:00', NULL, '2013-08-29 17:46:47', NULL),
(4, 1, '104', 'pf-0123', 1, 1, 1, NULL, 0, 2, NULL, NULL, NULL, 'sdfsad', 'dfdsfasd', '', NULL, NULL, NULL, '0000-00-00', 'Male', NULL, 0, 0, 0, 0, NULL, '2013-09-12', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2013-09-12 11:21:58', 1, '2013-09-12 11:17:57', NULL),
(6, 1, '123', 'sdfasd', 2, 2, 1, NULL, 10, 4, NULL, NULL, NULL, 'sdfsa', 'dsfsa', '', NULL, NULL, NULL, '0000-00-00', 'Male', NULL, 0, 0, 0, 0, NULL, '2013-09-12', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2013-09-12 11:40:06', 1, '2013-09-12 11:36:05', NULL),
(7, 1, '02321', 'tesd', 3, 2, 2, NULL, 2, 2, NULL, NULL, NULL, 'sdfsd', 'ewrqer', '', NULL, NULL, NULL, '0000-00-00', 'Male', NULL, 0, 0, 0, 0, NULL, '2013-09-17', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2013-09-15 15:20:13', 7, '2013-09-15 15:16:05', NULL),
(8, 1, 'test', 'dasdf', 1, 2, 2, NULL, 1, 2, NULL, NULL, NULL, 'sdfsad', 'sdfsd', '', NULL, NULL, NULL, '0000-00-00', 'Male', NULL, 0, 0, 0, 0, NULL, '2013-09-15', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2013-09-15 15:37:03', 7, '2013-09-15 15:32:55', NULL),
(9, 1, 'jhjhj', 'jgjh', 2, 2, 2, NULL, 1, 4, NULL, NULL, NULL, 'jjhgjj', 'jhj', '', NULL, NULL, NULL, '0000-00-00', 'Male', NULL, 0, 0, 0, 0, NULL, '2013-10-02', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2013-09-15 16:05:30', 5, '2013-09-15 16:01:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_divisions`
--

CREATE TABLE IF NOT EXISTS `rmis_divisions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `division_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `division_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `division_head` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `division_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `division_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `division_order` int(11) NOT NULL,
  `division_about` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`division_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rmis_divisions`
--

INSERT INTO `rmis_divisions` (`id`, `division_id`, `division_name`, `division_head`, `division_phone`, `division_email`, `division_order`, `division_about`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, 'BARIDIV1', 'Dhaka', '101', '01558755441', 'ashish021@gmail.com', 1, 'Test Division', '2013-09-30 17:53:34', 1, '2013-09-30 23:53:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_implementation_sites`
--

CREATE TABLE IF NOT EXISTS `rmis_implementation_sites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `implementation_site_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `implementation_site_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_person` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `implementation_order` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`implementation_site_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rmis_implementation_sites`
--

INSERT INTO `rmis_implementation_sites` (`id`, `implementation_site_id`, `implementation_site_name`, `contact_person`, `phone_number`, `email_address`, `implementation_order`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(2, 'BARIIMS0001', 'Dhaka', '101', '01779021581', 'ashish021@gmail.com', 1, '2013-09-30 18:37:51', 1, '2013-10-01 00:37:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_areas`
--

CREATE TABLE IF NOT EXISTS `rmis_program_areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `program_area_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `program_area_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `program_area_order` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`program_area_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rmis_program_areas`
--

INSERT INTO `rmis_program_areas` (`id`, `program_area_id`, `program_area_name`, `program_area_order`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(2, 'BARIPA0001', 'Dhaka', 1, '2013-09-30 18:50:48', 1, '2013-10-01 00:50:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_regional_stations`
--

CREATE TABLE IF NOT EXISTS `rmis_regional_stations` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `station_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `station_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `station_contact_person` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `station_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `station_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `station_order` int(11) NOT NULL,
  `station_address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`station_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rmis_regional_stations`
--


-- --------------------------------------------------------

--
-- Table structure for table `tm_funds`
--

CREATE TABLE IF NOT EXISTS `tm_funds` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `fund_type` enum('Revenue','Development','Donor') DEFAULT NULL,
  `source_fund` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`organization_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `tm_funds`
--

INSERT INTO `tm_funds` (`id`, `organization_id`, `fund_type`, `source_fund`, `description`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(25, 20, 'Development', '123456', 'asdfddsafa', 1, '2013-08-15 05:55:59', 200, '2013-08-15 16:55:59', NULL),
(26, 20, 'Development', 'sdfa', 'sdfsadf sfadf', 1, '2013-08-15 05:59:27', 200, '2013-08-15 06:00:21', 200),
(27, 20, 'Development', 'dsa', 'sdfasd', 1, '2013-08-15 06:04:11', 200, '2013-08-15 17:04:11', NULL),
(28, 20, 'Revenue', 'dsa', 'sdfasd', 1, '2013-08-15 06:04:22', 200, '2013-08-15 17:04:22', NULL),
(30, 20, 'Development', '123456', 'dsaffaf', 1, '2013-08-15 06:11:59', 200, '2013-08-15 17:11:59', NULL),
(31, 20, 'Revenue', 'abcd', 'dsaffaf', 1, '2013-08-15 06:12:20', 200, '2013-08-15 17:12:20', NULL),
(46, 20, 'Development', 'aaaa', 'aaaa', 1, '2013-08-18 19:12:13', 200, '2013-08-18 19:12:13', NULL),
(47, 20, 'Development', 'czxc', 'zxcczxc zxc ', 0, '2013-08-18 19:14:37', 200, '2013-08-18 19:14:37', NULL);
