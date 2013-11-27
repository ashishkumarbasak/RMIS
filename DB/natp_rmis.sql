-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 27, 2013 at 07:21 PM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `natp_rmis`
--

-- --------------------------------------------------------

--
-- Table structure for table `hrm_designations`
--

CREATE TABLE `hrm_designations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `designation_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `designation_prefix` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `class_id` bigint(20) DEFAULT NULL,
  `pay_scale_detail_id` int(11) DEFAULT NULL,
  `retirement_age` double(12,2) DEFAULT NULL,
  `job_description` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `approved_manpower` double(12,2) DEFAULT NULL,
  `sorting_order` int(10) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`organization_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `hrm_designations`
--

INSERT INTO `hrm_designations` (`id`, `organization_id`, `designation_name`, `designation_prefix`, `class_id`, `pay_scale_detail_id`, `retirement_age`, `job_description`, `approved_manpower`, `sorting_order`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 'Scientific Officer', 'SO', 1, 2, 65.00, 'abcd', 5.00, 1, NULL, NULL, '2013-10-27 05:19:18', 5),
(2, 2, 'HR Manager', 'HM', 2, 2, 60.00, 'qwer', 2.00, 2, NULL, NULL, '2013-10-23 10:14:07', NULL),
(3, 3, 'ABCD', 'AB', 3, 3, 57.00, 'zxcv', 2.00, 1, NULL, NULL, '2013-10-23 10:14:53', NULL),
(4, 4, 'EFGH', 'EF', 4, 1, 60.00, 'poiu', 2.00, 1, NULL, NULL, '2013-10-23 10:15:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hrm_employees`
--

CREATE TABLE `hrm_employees` (
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
(2, 1, '102', 'f100', 1, 2, 2, 5, 2, 2, '1212', NULL, NULL, 'Razi', 'Alimul Razi', 'Rafiqul Islam', NULL, NULL, 1, '1982-07-31', 'Male', NULL, 4, 2, 1, 1, NULL, '2006-10-10', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qqq@tvl.com', 1, '0000-00-00 00:00:00', NULL, '2013-11-11 06:46:12', NULL),
(4, 1, '103', 'pf-0123', 1, 1, 1, NULL, 0, 2, NULL, NULL, NULL, 'sdfsad', 'Ashish Kumar Basak', '', NULL, NULL, NULL, '0000-00-00', 'Male', NULL, 0, 0, 0, 0, NULL, '2013-09-12', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2013-09-12 05:21:58', 1, '2013-11-21 17:02:20', NULL),
(6, 1, '104', 'sdfasd', 2, 2, 1, NULL, 10, 4, NULL, NULL, NULL, 'sdfsa', 'Raiyan Samin', '', NULL, NULL, NULL, '0000-00-00', 'Male', NULL, 0, 0, 0, 0, NULL, '2013-09-12', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2013-09-12 05:40:06', 1, '2013-11-11 06:46:47', NULL),
(7, 1, '105', 'tesd', 3, 2, 2, NULL, 2, 2, NULL, NULL, NULL, 'sdfsd', 'Salim Mahmud', '', NULL, NULL, NULL, '0000-00-00', 'Male', NULL, 0, 0, 0, 0, NULL, '2013-09-17', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2013-09-15 09:20:13', 7, '2013-11-11 06:46:54', NULL),
(8, 1, '106', 'dasdf', 1, 2, 2, NULL, 1, 2, NULL, NULL, NULL, 'sdfsad', 'Abu Sayed', '', NULL, NULL, NULL, '0000-00-00', 'Male', NULL, 0, 0, 0, 0, NULL, '2013-09-15', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2013-09-15 09:37:03', 7, '2013-11-11 06:47:03', NULL),
(9, 1, '202', 'jgjh', 2, 2, 2, NULL, 1, 4, NULL, NULL, NULL, 'jjhgjj', 'Kamrul Hossain', '', NULL, NULL, NULL, '0000-00-00', 'Male', NULL, 0, 0, 0, 0, NULL, '2013-10-02', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2013-09-15 10:05:30', 5, '2013-11-11 06:44:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hrm_organizations`
--

CREATE TABLE `hrm_organizations` (
  `id` int(11) NOT NULL,
  `organization_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `short_name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city_id` bigint(20) unsigned DEFAULT NULL,
  `country_id` bigint(20) unsigned DEFAULT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `web` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notes` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` enum('yes','no') COLLATE utf8_unicode_ci DEFAULT 'no',
  `attachment_id` bigint(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hrm_organizations`
--

INSERT INTO `hrm_organizations` (`id`, `organization_name`, `short_name`, `address`, `city_id`, `country_id`, `phone`, `fax`, `email`, `web`, `notes`, `is_active`, `attachment_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Bangladesh Agricultural Research Council', 'BARC', 'Farmgate, Dhaka', 1, 1, '1228585888888883', '3666325', 'asdfg@kddk.com', 'www.jmokok.com', '54545', 'yes', 132, NULL, NULL, '2013-10-23 07:13:01', 5),
(2, 'BARI - BD', 'BARI', 'Dhaka', 1, 1, '546162', '3333', 'ndksn@kkfdk.com', 'www.skdisdj.com', 'djjndk', 'yes', NULL, NULL, NULL, '2013-08-11 06:03:52', NULL),
(3, 'BFRI - BD', 'BFRI', 'Dhaka', 2, 1, '123456789', '158963', 'djjji@kdkm.com', 'www.fnkwojj.com', 'ndndnd dsf sadf', 'yes', 0, NULL, NULL, '2013-10-22 09:46:19', 5),
(4, 'BJRI - BD', 'BJRI', 'Dhaka', 1, 1, '456345', '4534', 'fghdfh@jhkl.com', 'www.ksdk.com', 'fsfgds', 'yes', 0, NULL, NULL, '2013-10-22 09:46:12', 5),
(5, 'BLRI - BD', 'BLRI', 'Dhaka', 1, 2, '2255555', '32626', 'bbdfhdf@dfdf.com', 'www.ksdghk.com', 'fgggg', 'yes', 0, NULL, NULL, '2013-10-22 09:46:08', 5),
(6, 'BRRI - BD', 'BRRI', 'Dhaka', 2, 2, '2546565', '323232', 'kjij@dfkk.com', 'www.ksfrwedk.com', 'gfdfgdfg', 'yes', 135, NULL, NULL, '2013-10-23 07:18:54', 5),
(7, 'BSRI - BD', 'BSRI', 'Dhaka', 2, 1, '514515', '32262', 'sdddwe@qwe.com', 'www.kstydk.com', 'dfsdfsfs', 'yes', 136, NULL, NULL, '2013-10-23 07:19:08', 5),
(8, 'BRDI - BD', 'BRDI', 'Dhaka', 1, 1, '155155', '262622', 'hjjghjghjkhjk', 'www.kswerdk.com', 'dfsdsd', 'yes', 150, NULL, NULL, '2013-10-23 10:42:44', 5);

-- --------------------------------------------------------

--
-- Table structure for table `hrm_organograms`
--

CREATE TABLE `hrm_organograms` (
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
(1, 1, 'Finance - BARC', 0, 'Department', 1, 1, NULL, NULL, '2013-08-13 05:16:13', NULL),
(2, 1, 'Accounts- BARC ', 0, 'Department', 1, 1, NULL, NULL, '2013-08-13 05:17:00', NULL),
(3, 1, 'Finance Section - BARC', 1, 'Centre', 0, 1, NULL, NULL, '2013-08-13 05:17:32', NULL),
(5, 1, 'Finance sub-Centre - BARC', 3, 'Sub-Centre', 0, 1, NULL, NULL, '2013-08-13 05:21:22', NULL),
(6, 1, 'F-SRD1', 0, 'Regional Office/Lab', 2, NULL, NULL, NULL, '2013-08-13 05:24:05', NULL),
(7, 1, 'A-SRD1', 0, 'Regional Office/Lab', 2, NULL, NULL, NULL, '2013-08-13 05:24:34', NULL),
(8, 1, 'F Centre- SRD1', 6, 'Centre', 0, NULL, NULL, NULL, '2013-08-13 05:25:27', NULL),
(9, 1, 'A Centre - SRD1', 7, 'Centre', 0, NULL, NULL, NULL, '2013-08-13 05:25:58', NULL),
(10, 20, 'Marketing', 0, 'Department', 1, NULL, '2013-08-19 13:09:37', 200, '2013-08-19 07:30:27', 200),
(16, 20, 'sub centre mark', 10, 'Sub-Centre', 0, NULL, '2013-08-19 14:06:32', 200, '2013-08-19 08:06:32', NULL),
(18, 20, 'Accounce', 10, 'Department', 0, NULL, '2013-08-19 14:12:22', 200, '2013-08-20 04:31:46', 200),
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
-- Table structure for table `rmis_activity_statuses`
--

CREATE TABLE `rmis_activity_statuses` (
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
-- Dumping data for table `rmis_activity_statuses`
--

INSERT INTO `rmis_activity_statuses` (`id`, `organization_id`, `value`, `name`, `weight`, `is_default`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, '1', 'Done', 1, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-11-27 17:58:11', NULL),
(2, 1, '2', 'Half Done', 2, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-11-27 17:58:22', NULL),
(3, 2, '3', 'Not Done', 3, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-11-27 17:58:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_aezs`
--

CREATE TABLE `rmis_aezs` (
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
-- Table structure for table `rmis_committee_member_types`
--

CREATE TABLE `rmis_committee_member_types` (
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
-- Dumping data for table `rmis_committee_member_types`
--

INSERT INTO `rmis_committee_member_types` (`id`, `organization_id`, `value`, `name`, `weight`, `is_default`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, '1', 'Chairman', 1, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-11-24 01:34:59', NULL),
(2, 1, '2', 'Member', 2, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-11-24 01:35:10', NULL),
(3, 2, '3', 'Member\nSecretary', 3, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-11-24 01:35:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_commodities`
--

CREATE TABLE `rmis_commodities` (
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
-- Table structure for table `rmis_currency`
--

CREATE TABLE `rmis_currency` (
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
-- Dumping data for table `rmis_currency`
--

INSERT INTO `rmis_currency` (`id`, `organization_id`, `value`, `name`, `weight`, `is_default`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, '1', 'BDT', 1, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-11-09 21:12:04', NULL),
(2, 1, '2', 'USD', 2, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-11-09 21:12:33', NULL),
(3, 2, '3', 'GBP', 3, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-11-09 21:12:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_divisions`
--

CREATE TABLE `rmis_divisions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `division_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `division_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `division_head` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `division_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `division_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `division_order` int(11) NOT NULL,
  `division_about` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`organization_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `rmis_document_type`
--

CREATE TABLE `rmis_document_type` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `rmis_document_type`
--

INSERT INTO `rmis_document_type` (`id`, `organization_id`, `value`, `name`, `weight`, `is_default`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, '1', 'MOU', 1, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-11-24 03:30:13', NULL),
(2, 1, '2', 'Policy Doc', 2, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-11-24 03:30:23', NULL),
(3, 2, '3', 'Inception Report', 3, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-11-24 03:30:34', NULL),
(4, 1, '4', 'Monthly Report', 4, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-11-24 03:32:32', NULL),
(5, 1, '5', 'Program\nComplication report', 5, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-11-24 03:32:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_funding_source`
--

CREATE TABLE `rmis_funding_source` (
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
-- Dumping data for table `rmis_funding_source`
--

INSERT INTO `rmis_funding_source` (`id`, `organization_id`, `value`, `name`, `weight`, `is_default`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, '1', 'World Bank', 1, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-11-09 21:12:04', NULL),
(2, 1, '2', 'ADB', 2, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-11-09 21:12:33', NULL),
(3, 2, '3', 'GOB', 3, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-11-09 21:12:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_grade_point_informations`
--

CREATE TABLE `rmis_grade_point_informations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `lower_range` float NOT NULL,
  `upper_range` float NOT NULL,
  `letter_grade` varchar(10) NOT NULL,
  `grade_point` float NOT NULL,
  `qualitative_status` bigint(11) NOT NULL,
  `description` text NOT NULL,
  `grading_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rmis_grade_point_informations`
--

INSERT INTO `rmis_grade_point_informations` (`id`, `lower_range`, `upper_range`, `letter_grade`, `grade_point`, `qualitative_status`, `description`, `grading_id`) VALUES
(1, 100, 90, 'A+', 5, 1, 'Very Good Research', 1),
(2, 80, 90, 'A-', 4.75, 2, 'Good Research', 1),
(3, 70, 80, 'A', 4.5, 2, 'Average Research', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_gradings`
--

CREATE TABLE `rmis_gradings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `grading_title` varchar(255) NOT NULL,
  `effect_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rmis_gradings`
--

INSERT INTO `rmis_gradings` (`id`, `organization_id`, `grading_title`, `effect_date`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 'Research Evaluation Grading', '2013-11-21', '2013-11-21 12:23:24', 1, '2013-11-21 17:23:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_implementation_sites`
--

CREATE TABLE `rmis_implementation_sites` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `implementation_site_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `implementation_site_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_person` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `implementation_order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`organization_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rmis_implementation_sites`
--

INSERT INTO `rmis_implementation_sites` (`id`, `organization_id`, `implementation_site_id`, `implementation_site_name`, `contact_person`, `phone_number`, `email_address`, `implementation_order`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 'BARIIMS0001', 'Genome Technology', '103', '+8801779021581', 'ashish021@gmail.com', 1, '2013-11-21 12:12:53', 1, '2013-11-21 17:12:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_member_types`
--

CREATE TABLE `rmis_member_types` (
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
-- Dumping data for table `rmis_member_types`
--

INSERT INTO `rmis_member_types` (`id`, `organization_id`, `value`, `name`, `weight`, `is_default`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, '1', 'Internal Scientist', 1, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-11-24 00:53:19', NULL),
(2, 1, '2', 'Co-PI', 2, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-11-24 00:53:29', NULL),
(3, 2, '3', 'External Institute Scientist', 3, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-11-24 00:53:41', NULL),
(4, 2, '4', 'External Resource', 4, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-11-24 00:54:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_monitoring_and_evaluation_type`
--

CREATE TABLE `rmis_monitoring_and_evaluation_type` (
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
-- Dumping data for table `rmis_monitoring_and_evaluation_type`
--

INSERT INTO `rmis_monitoring_and_evaluation_type` (`id`, `organization_id`, `value`, `name`, `weight`, `is_default`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, '1', 'Half Yearly', 1, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-11-10 03:15:37', NULL),
(2, 1, '2', 'Yearly', 2, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-11-10 03:15:48', NULL),
(3, 2, '3', 'Quarterly', 3, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-11-10 03:15:58', NULL),
(4, 1, '4', 'Final', 4, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-11-10 03:16:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_activities`
--

CREATE TABLE `rmis_program_activities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `work_element` text NOT NULL,
  `planned_start_date` date NOT NULL,
  `planned_end_date` date NOT NULL,
  `actual_start_date` date NOT NULL,
  `actual_end_date` date NOT NULL,
  `assign_resource` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  `program_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `rmis_program_activities`
--

INSERT INTO `rmis_program_activities` (`id`, `organization_id`, `sort_order`, `work_element`, `planned_start_date`, `planned_end_date`, `actual_start_date`, `actual_end_date`, `assign_resource`, `created_at`, `created_by`, `updated_at`, `updated_by`, `program_id`) VALUES
(10, 1, 1, 'Test work element', '2013-11-19', '2013-11-26', '2013-11-20', '2013-11-12', 202, '2013-11-26 23:50:46', 1, '2013-11-26 23:50:46', 1, 1),
(11, 1, 2, 'Another test edit', '2013-11-20', '2013-11-25', '2013-11-25', '2013-12-03', 103, '2013-11-26 23:50:46', 1, '2013-11-26 23:50:46', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_areas`
--

CREATE TABLE `rmis_program_areas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `program_area_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `program_area_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `program_area_order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rmis_program_areas`
--

INSERT INTO `rmis_program_areas` (`id`, `organization_id`, `program_area_id`, `program_area_name`, `program_area_order`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 'BARIPA0001', 'Research Technology', 1, '2013-11-21 12:19:14', 1, '2013-11-21 17:19:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_cost_breakdowns`
--

CREATE TABLE `rmis_program_cost_breakdowns` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `s_o` varchar(255) NOT NULL,
  `ac_head_code` bigint(20) NOT NULL,
  `ac_head_title` bigint(20) NOT NULL,
  `amount` float NOT NULL,
  `program_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_cost_estimations`
--

CREATE TABLE `rmis_program_cost_estimations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `estimate_date` date NOT NULL,
  `financial_year` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  `program_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rmis_program_cost_estimations`
--

INSERT INTO `rmis_program_cost_estimations` (`id`, `organization_id`, `estimate_date`, `financial_year`, `created_at`, `created_by`, `updated_at`, `updated_by`, `program_id`) VALUES
(1, 1, '0000-00-00', '', '2013-11-23 13:13:48', 1, '2013-11-23 13:14:07', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_funding_sources`
--

CREATE TABLE `rmis_program_funding_sources` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `fund_source` bigint(20) NOT NULL,
  `amount` float NOT NULL,
  `currency` varchar(255) NOT NULL,
  `exchange_rate` float NOT NULL,
  `date_of_exchange_rate` date NOT NULL,
  `amount_in_taka` float NOT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  `program_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `rmis_program_funding_sources`
--

INSERT INTO `rmis_program_funding_sources` (`id`, `organization_id`, `fund_source`, `amount`, `currency`, `exchange_rate`, `date_of_exchange_rate`, `amount_in_taka`, `created_at`, `created_by`, `updated_at`, `updated_by`, `program_id`) VALUES
(3, 1, 1, 10000, '2', 80, '2013-11-25', 800000, '0000-00-00 00:00:00', NULL, '2013-11-23 13:14:07', 1, 1),
(4, 1, 2, 50000, '2', 81, '2013-11-25', 4050000, '0000-00-00 00:00:00', NULL, '2013-11-23 13:14:07', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_implementation_committees`
--

CREATE TABLE `rmis_program_implementation_committees` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `committee_formation_date` date NOT NULL,
  `program_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_implementation_committee_members`
--

CREATE TABLE `rmis_program_implementation_committee_members` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `committee_member_type` varchar(255) DEFAULT NULL,
  `member_name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `program_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_informations`
--

CREATE TABLE `rmis_program_informations` (
  `program_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `research_program_title` text COLLATE utf8_unicode_ci NOT NULL,
  `program_area` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `program_division` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `program_research_type` bigint(20) NOT NULL,
  `program_research_priority` bigint(20) NOT NULL,
  `program_research_status` bigint(20) NOT NULL,
  `program_coordinator` bigint(20) NOT NULL,
  `program_coordinator_designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_collaborate` set('0','1') COLLATE utf8_unicode_ci DEFAULT '0',
  `program_institute_names` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `program_department_name` bigint(20) DEFAULT NULL,
  `program_regional_station_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `program_implementation_location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `program_keywords` text COLLATE utf8_unicode_ci,
  `program_commodities` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `program_aezs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `program_planned_start_date` date NOT NULL,
  `program_planned_end_date` date NOT NULL,
  `program_initiation_date` date NOT NULL,
  `program_completion_date` date NOT NULL,
  `program_planned_budget` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `program_approved_budget` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `program_goal` longtext COLLATE utf8_unicode_ci NOT NULL,
  `program_objective` longtext COLLATE utf8_unicode_ci NOT NULL,
  `program_expected_outputs` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) unsigned NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`program_id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rmis_program_informations`
--

INSERT INTO `rmis_program_informations` (`program_id`, `organization_id`, `research_program_title`, `program_area`, `program_division`, `program_research_type`, `program_research_priority`, `program_research_status`, `program_coordinator`, `program_coordinator_designation`, `is_collaborate`, `program_institute_names`, `program_department_name`, `program_regional_station_name`, `program_implementation_location`, `program_keywords`, `program_commodities`, `program_aezs`, `program_planned_start_date`, `program_planned_end_date`, `program_initiation_date`, `program_completion_date`, `program_planned_budget`, `program_approved_budget`, `program_goal`, `program_objective`, `program_expected_outputs`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 'This is test program', 'BARIPA0001', 'BARIDIV0001', 1, 1, 1, 202, 'EFGH', '1', '1,2', 1, 'BARIRS0001', 'BARIIMS0001', 'test keyword', '1,2', '1,2', '2013-11-23', '2013-11-23', '2013-11-23', '2013-11-23', '10000000', '10000000', 'Test program goal', 'test purpose objective', 'test expected output---##########---', '2013-11-23 08:19:59', 1, '2013-11-23 13:21:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_me_committees`
--

CREATE TABLE `rmis_program_me_committees` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `committee_chairman` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `committee_formation_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rmis_program_me_committees`
--

INSERT INTO `rmis_program_me_committees` (`id`, `organization_id`, `committee_chairman`, `committee_formation_date`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, '103', '2013-11-23', '2013-11-22 13:38:58', 1, '2013-11-22 18:39:38', 1),
(2, 1, '202', '2013-11-26', '2013-11-22 13:41:31', 1, '2013-11-23 11:20:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_me_committee_members`
--

CREATE TABLE `rmis_program_me_committee_members` (
  `committee_id` bigint(20) unsigned NOT NULL,
  `organization_id` int(11) NOT NULL,
  `member_id` bigint(20) NOT NULL,
  `role_in_committee` text NOT NULL,
  PRIMARY KEY (`committee_id`,`organization_id`,`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rmis_program_me_committee_members`
--

INSERT INTO `rmis_program_me_committee_members` (`committee_id`, `organization_id`, `member_id`, `role_in_committee`) VALUES
(1, 1, 103, 'Lead Researcher'),
(1, 1, 202, 'Junior Researcher'),
(2, 1, 103, 'Lead Researcher'),
(2, 1, 202, 'Professor');

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_other_informations`
--

CREATE TABLE `rmis_program_other_informations` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  `program_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rmis_program_other_informations`
--

INSERT INTO `rmis_program_other_informations` (`id`, `organization_id`, `program_rationale`, `program_methodology`, `program_background`, `program_socio_economical_impact`, `program_environmental_impact`, `program_targeted_beneficiary`, `program_reference`, `program_external_affiliation`, `program_organization_policy`, `program_risks`, `created_at`, `created_by`, `updated_at`, `updated_by`, `program_id`) VALUES
(1, 1, 'Test rationale', '', '', '', '', '', '', '', '', '', '2013-11-26 23:47:53', 1, '2013-11-27 04:47:53', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_rating`
--

CREATE TABLE `rmis_program_rating` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_related_documents`
--

CREATE TABLE `rmis_program_related_documents` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `document_title` varchar(255) NOT NULL,
  `document_type` int(11) NOT NULL,
  `sorting_order` int(11) NOT NULL,
  `document_name` varchar(255) NOT NULL,
  `remarks` text,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  `program_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rmis_program_related_documents`
--

INSERT INTO `rmis_program_related_documents` (`id`, `organization_id`, `document_title`, `document_type`, `sorting_order`, `document_name`, `remarks`, `created_at`, `created_by`, `updated_at`, `updated_by`, `program_id`) VALUES
(1, 1, 'Test document title', 1, 1, 'Test file.pdf', 'Testing', '2013-11-26 18:00:00', 1, '2013-11-26 18:00:00', 1, 0),
(2, 1, 'Fuck document', 2, 2, 'atas.csv', NULL, '2013-11-27 02:51:18', 1, '2013-11-27 07:51:18', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_research_teams`
--

CREATE TABLE `rmis_program_research_teams` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `team_formation_date` date NOT NULL,
  `program_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_research_team_members`
--

CREATE TABLE `rmis_program_research_team_members` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `member_type` varchar(255) DEFAULT NULL,
  `institute_name` varchar(255) DEFAULT NULL,
  `member_name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `program_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_steering_committees`
--

CREATE TABLE `rmis_program_steering_committees` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `committee_formation_date` date NOT NULL,
  `program_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rmis_program_steering_committees`
--

INSERT INTO `rmis_program_steering_committees` (`id`, `organization_id`, `committee_formation_date`, `program_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, '0000-00-00', 1, '2013-11-25 23:47:47', 1, '2013-11-26 04:47:47', NULL),
(2, 1, '0000-11-30', 1, '2013-11-26 23:48:29', 1, '2013-11-27 04:48:29', NULL),
(3, 1, '0000-11-30', 1, '2013-11-26 23:48:40', 1, '2013-11-27 04:48:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_steering_committee_members`
--

CREATE TABLE `rmis_program_steering_committee_members` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `committee_member_type` varchar(255) DEFAULT NULL,
  `member_name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `program_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rmis_program_steering_committee_members`
--

INSERT INTO `rmis_program_steering_committee_members` (`id`, `committee_member_type`, `member_name`, `designation`, `contact_no`, `email`, `program_id`) VALUES
(1, '2', 'Kamrul Hassan', 'President', '01779021581', 'kamrul@gmail.com', 2),
(2, '2', '202', 'President', '01779021581', 'ashish021@gmail.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_project_activities`
--

CREATE TABLE `rmis_project_activities` (
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
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  `project_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rmis_project_cost_breakdowns`
--

CREATE TABLE `rmis_project_cost_breakdowns` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `s_o` varchar(255) NOT NULL,
  `ac_head_code` bigint(20) NOT NULL,
  `ac_head_title` bigint(20) NOT NULL,
  `amount` float NOT NULL,
  `project_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rmis_project_cost_estimations`
--

CREATE TABLE `rmis_project_cost_estimations` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `estimate_date` date NOT NULL,
  `financial_year` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  `project_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rmis_project_funding_sources`
--

CREATE TABLE `rmis_project_funding_sources` (
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
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  `project_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rmis_project_implementation_committees`
--

CREATE TABLE `rmis_project_implementation_committees` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `committee_formation_date` date NOT NULL,
  `project_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rmis_project_implementation_committee_members`
--

CREATE TABLE `rmis_project_implementation_committee_members` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `committee_member_type` varchar(255) DEFAULT NULL,
  `member_name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `project_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rmis_project_informations`
--

CREATE TABLE `rmis_project_informations` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `research_project_title` text COLLATE utf8_unicode_ci NOT NULL,
  `project_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `project_prefix` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `project_division` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `project_researchType` bigint(20) NOT NULL,
  `project_researchPriority` bigint(20) NOT NULL,
  `project_researchStatus` bigint(20) NOT NULL,
  `project_coordinator` bigint(20) NOT NULL,
  `project_coordinatorDesignation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_collaborate` set('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `project_instituteNames` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `project_departmentName` bigint(20) NOT NULL,
  `project_regionalStationName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `project_implementationLocation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `project_keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `project_commodities` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `project_aezs` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `project_plannedStartDate` date NOT NULL,
  `project_plannedEndDate` date NOT NULL,
  `project_initiationDate` date NOT NULL,
  `project_completionDate` date NOT NULL,
  `project_plannedBudget` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `project_approvedBudget` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `project_goal` longtext COLLATE utf8_unicode_ci NOT NULL,
  `project_objective` longtext COLLATE utf8_unicode_ci NOT NULL,
  `project_expectedOutputs` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) unsigned NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint(20) unsigned NOT NULL,
  `program_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`project_id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rmis_project_informations`
--

INSERT INTO `rmis_project_informations` (`project_id`, `organization_id`, `research_project_title`, `project_code`, `project_prefix`, `project_division`, `project_researchType`, `project_researchPriority`, `project_researchStatus`, `project_coordinator`, `project_coordinatorDesignation`, `is_collaborate`, `project_instituteNames`, `project_departmentName`, `project_regionalStationName`, `project_implementationLocation`, `project_keywords`, `project_commodities`, `project_aezs`, `project_plannedStartDate`, `project_plannedEndDate`, `project_initiationDate`, `project_completionDate`, `project_plannedBudget`, `project_approvedBudget`, `project_goal`, `project_objective`, `project_expectedOutputs`, `created_at`, `created_by`, `updated_at`, `updated_by`, `program_id`) VALUES
(1, 0, 'This is test project titel edit', '', '', 'BARIDIV0002', 2, 4, 3, 0, 'Vice President', '1', '1,4', 4, 'BARIRS0001', 'BARIIMS0001', 'Dhaka, Chittagong', '1,5', '1,3,4', '2013-10-26', '2013-11-29', '2013-10-26', '2013-12-31', '10000000', '10000000', 'Test project goal Test project goal Test project goal Test project goal Test project goal Test project goal Test project goal Test project goal Test project goal Test project goal Test project goal Test project goal Test project goal Test project goal ', 'Test project purpose Test project purpose Test project purpose Test project purpose Test project purpose Test project purpose Test project purpose Test project purpose Test project purpose Test project purpose Test project purpose Test project purpose Test project purpose Test project purpose Test project purpose ', 'Test project expected output Test project expected output Test project expected output Test project expected output Test project expected output Test project expected output Test project expected output Test project expected output Test project expected output Test project expected output Test project expected output Test project expected output Test project expected output Test project expected output ---##########---Test project expected output 2 Test project expected output 2 Test project expected output 2 Test project expected output 2 Test project expected output 2 Test project expected output 2 Test project expected output 2 Test project expected output 2 Test project expected output 2 Test project expected output 2 Test project expected output 2 Test project expected output 2 ---##########---Test project expected output 3 Test project expected output 3 Test project expected output 3 Test project expected output 3 Test project expected output 3 Test project expected output 3 Test project expected output 3 Test project expected output 3 Test project expected output 3 Test project expected output 3 Test project expected output 3 Test project expected output 3 Test project expected output 3 Test project expected output 3 ---##########---', '0000-00-00 00:00:00', 2013, '0000-00-00 00:00:00', 2013, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_project_other_informations`
--

CREATE TABLE `rmis_project_other_informations` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `project_rationale` longtext,
  `project_methodology` longtext,
  `project_background` longtext,
  `project_socio_economical_impact` longtext,
  `project_environmental_impact` longtext,
  `project_targeted_beneficiary` longtext,
  `project_reference` longtext,
  `project_external_affiliation` longtext,
  `project_organization_policy` longtext,
  `project_risks` longtext,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  `project_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rmis_project_other_informations`
--

INSERT INTO `rmis_project_other_informations` (`id`, `organization_id`, `project_rationale`, `project_methodology`, `project_background`, `project_socio_economical_impact`, `project_environmental_impact`, `project_targeted_beneficiary`, `project_reference`, `project_external_affiliation`, `project_organization_policy`, `project_risks`, `created_at`, `created_by`, `updated_at`, `updated_by`, `project_id`) VALUES
(1, 0, 'Test project Rationale Test project Rationale Test project Rationale Test project Rationale Test project Rationale Test project Rationale Test project Rationale Test project Rationale Test project Rationale Test project Rationale Edit', 'Test project methodology Test project methodology Test project methodology Test project methodology Test project methodology Test project methodology Test project methodology Test project methodology Test project methodology Test project methodology Test project methodology Test project methodology Test project methodology ', 'Test project background Test project background Test project background Test project background Test project background Test project background Test project background Test project background Test project background Test project background Test project background  Fucking Edit', 'Test project Socio Economical Impact  Test project Socio Economical Impact  Test project Socio Economical Impact  Test project Socio Economical Impact  Test project Socio Economical Impact  Test project Socio Economical Impact  Test project Socio Economical Impact  Test project Socio Economical Impact  Test project Socio Economical Impact  Test project Socio Economical Impact  ', 'Test project Environmental Impact  Test project Environmental Impact  Test project Environmental Impact  Test project Environmental Impact  Test project Environmental Impact  Test project Environmental Impact  Test project Environmental Impact  Test project Environmental Impact  Test project Environmental Impact  Test project Environmental Impact  Test project Environmental Impact  Test project Environmental Impact  ', 'Test project Targeted Beneficiary   Test project Targeted Beneficiary   Test project Targeted Beneficiary   Test project Targeted Beneficiary   Test project Targeted Beneficiary   Test project Targeted Beneficiary   Test project Targeted Beneficiary   Test project Targeted Beneficiary   Test project Targeted Beneficiary   Test project Targeted Beneficiary   Test project Targeted Beneficiary   Test project Targeted Beneficiary   Test project Targeted Beneficiary   ', 'Test project Reference    Test project Reference    Test project Reference    Test project Reference    Test project Reference    Test project Reference    Test project Reference    Test project Reference    Test project Reference    Test project Reference    Test project Reference    ', 'Test project External Affiliation Test project External Affiliation Test project External Affiliation Test project External Affiliation Test project External Affiliation Test project External Affiliation Test project External Affiliation Test project External Affiliation Test project External Affiliation Test project External Affiliation Test project External Affiliation Test project External Affiliation ', 'Test project Organization Policy Test project Organization Policy Test project Organization Policy Test project Organization Policy Test project Organization Policy Test project Organization Policy Test project Organization Policy Test project Organization Policy Test project Organization Policy Test project Organization Policy Test project Organization Policy Test project Organization Policy ', 'Test project projectme Risks Test project projectme Risks Test project projectme Risks Test project projectme Risks Test project projectme Risks Test project projectme Risks Test project projectme Risks Test project projectme Risks Test project projectme Risks Test project projectme Risks Test project projectme Risks ', '2013-10-26 04:33:59', 1, '2013-10-26 08:24:27', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_project_research_teams`
--

CREATE TABLE `rmis_project_research_teams` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `team_formation_date` date NOT NULL,
  `project_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rmis_project_research_team_members`
--

CREATE TABLE `rmis_project_research_team_members` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `member_type` varchar(255) DEFAULT NULL,
  `institute_name` varchar(255) DEFAULT NULL,
  `member_name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `project_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rmis_project_steering_committees`
--

CREATE TABLE `rmis_project_steering_committees` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `committee_formation_date` date NOT NULL,
  `project_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rmis_project_steering_committee_members`
--

CREATE TABLE `rmis_project_steering_committee_members` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `committee_member_type` varchar(255) DEFAULT NULL,
  `member_name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `project_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rmis_qualitative_status`
--

CREATE TABLE `rmis_qualitative_status` (
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
-- Dumping data for table `rmis_qualitative_status`
--

INSERT INTO `rmis_qualitative_status` (`id`, `organization_id`, `value`, `name`, `weight`, `is_default`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, '1', 'Very Good', 1, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-11-10 03:12:04', NULL),
(2, 1, '2', 'Good', 2, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-11-10 03:12:33', NULL),
(3, 2, '3', 'Problem', 3, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-11-10 03:12:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_regional_stations`
--

CREATE TABLE `rmis_regional_stations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `station_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `station_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `station_contact_person` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `station_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `station_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `station_order` int(11) NOT NULL,
  `station_address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rmis_regional_stations`
--

INSERT INTO `rmis_regional_stations` (`id`, `organization_id`, `station_id`, `station_name`, `station_contact_person`, `station_phone`, `station_email`, `station_order`, `station_address`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 'BARIRS0001', 'Dhaka', '103', '+8801779021581', 'ashish021@gmail.com', 1, 'Research will be conduct on dhaka regional station. ', '2013-11-21 12:10:31', 1, '2013-11-21 17:10:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_research_priorities`
--

CREATE TABLE `rmis_research_priorities` (
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

CREATE TABLE `rmis_research_statuses` (
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
(1, 1, '1', 'New', 1, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-11-10 03:09:57', NULL),
(2, 1, '2', 'On-Going', 2, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-09-25 05:48:19', NULL),
(3, 2, '3', 'Completed', 3, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-11-10 03:10:06', NULL),
(4, 3, '4', 'Stop', 4, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-11-10 03:10:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_research_types`
--

CREATE TABLE `rmis_research_types` (
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
(1, 1, '1', 'Basic', 1, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-11-10 03:10:35', NULL),
(2, 1, '2', 'Strategic', 2, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-09-25 05:48:19', NULL),
(3, 2, '3', 'Impact Study', 3, 'no', 1, '0000-00-00 00:00:00', NULL, '2013-11-10 03:10:30', NULL);
