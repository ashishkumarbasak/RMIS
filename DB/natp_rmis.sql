-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 14, 2013 at 05:01 PM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `natp_rmis`
--

-- --------------------------------------------------------

--
-- Table structure for table `amis_chart_of_account`
--

CREATE TABLE `amis_chart_of_account` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `fund_type` enum('Revenue','Development') NOT NULL DEFAULT 'Revenue',
  `account_type` char(1) NOT NULL COMMENT '''A'' for Asset, ''L'' for Liability, ''I'' for Income, ''E'' for Expense',
  `sub_head_code` varchar(20) NOT NULL,
  `sub_head_name` varchar(250) NOT NULL,
  `is_posting_head` enum('yes','no') DEFAULT NULL,
  `major_head_code` varchar(20) NOT NULL,
  `opening_balance` double(12,2) DEFAULT NULL,
  `is_budget_head` enum('yes','no') DEFAULT NULL,
  `cash_bank_type` enum('Bank','Cash','Other') NOT NULL DEFAULT 'Other',
  `remarks` varchar(500) DEFAULT NULL,
  `is_active` enum('yes','no') DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`,`organization_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `amis_chart_of_account`
--

INSERT INTO `amis_chart_of_account` (`id`, `organization_id`, `fund_type`, `account_type`, `sub_head_code`, `sub_head_name`, `is_posting_head`, `major_head_code`, `opening_balance`, `is_budget_head`, `cash_bank_type`, `remarks`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 'Revenue', '', '333-01', 'Lab Equipment Purchase', 'yes', '', NULL, NULL, 'Other', NULL, 'yes', '2013-11-27 12:00:00', NULL, '2013-12-03 06:15:22', NULL),
(12, 1, 'Revenue', '', '222-02', 'Stuff salary', 'yes', '', NULL, NULL, 'Other', NULL, 'yes', '2013-11-27 12:00:00', NULL, '2013-12-01 10:37:19', NULL),
(13, 2, 'Revenue', '', '111-01', 'Training', 'yes', '', NULL, 'yes', 'Other', NULL, 'yes', '0000-00-00 00:00:00', NULL, '2013-12-01 10:37:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `financial_year`
--

CREATE TABLE `financial_year` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `year_name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `start_from` date NOT NULL,
  `start_to` date NOT NULL,
  `is_active` binary(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `financial_year`
--

INSERT INTO `financial_year` (`id`, `organization_id`, `year_name`, `start_from`, `start_to`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, '2013-2014', '2013-07-01', '2013-12-31', '1', '2013-11-27 12:00:00', 1, '2013-11-27 12:00:00', NULL),
(2, 1, '2014-1015', '2014-01-01', '2014-07-31', '1', '2013-11-27 12:00:00', 1, '2013-11-27 12:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`organization_id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `groups_name_unique` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `organization_id`, `name`, `description`, `permissions`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 20, 'Admin', 'admin role', '{"rmis.leave.add":1,"rmis.leave.edit":1}', '2013-08-18 10:16:47', 100, '2013-11-28 10:15:02', NULL),
(2, 20, 'Modarator', 'a', '{"hrm.leave.add":1,"hrm.leave.edit":1,"tmis.setup.common_config.view":1,"tmis.setup.fund.view":1,"tmis.setup.fund.add":1,"tmis.setup.fund.edit":1,"tmis.setup.fund.del":1,"tmis.setup.training_program.view":1,"tmis.setup.training_program.add":1,"tmis.setup.training_program.edit":1,"tmis.setup.training_program.del":1,"tmis.setup.institutes.view":1,"tmis.setup.institutes.add":1,"tmis.setup.institutes.edit":1,"tmis.setup.institutes.del":1,"tmis.setup.subject.view":1,"tmis.setup.subject.add":1,"tmis.setup.subject.edit":1,"tmis.setup.subject.del":1,"tmis.setup.resource_person.view":1,"tmis.setup.resource_person.add":1,"tmis.setup.resource_person.edit":1,"tmis.setup.resource_person.del":1,"tmis.plan_schedule.view":1,"tmis.plan_schedule.add":1,"tmis.plan_schedule.edit":1,"tmis.plan_schedule.del":1,"tmis.papers.view":1,"tmis.papers.add":1,"tmis.papers.edit":1,"tmis.papers.del":1,"tmis.higher_education.view":1,"tmis.higher_education.add":1,"tmis.higher_education.edit":1,"tmis.higher_education.del":1,"tmis.higher_education_permission.view":1,"tmis.higher_education_permission.permission":1,"tmis.training.view":1,"tmis.training.add":1,"tmis.training.edit":1,"tmis.training.del":1,"tmis.training.update_emp_training":1,"tmis.other_program.view":1,"tmis.other_program.add":1,"tmis.other_program.edit":1,"tmis.other_program.del":1,"tmis.training_report.view":1,"tmis.higher_education_report.view":1,"tmis.schedule_based_program_report.view":1,"tmis.demand_allocation_summary_report.view":1}', '2013-08-18 10:18:40', 100, '2013-11-18 11:08:22', NULL),
(3, 20, 'Author', '', '{"rmis.employee.edit":1,"rmis.employee.view":1,"tmis.setup.fund.add":1,"tmis.setup.fund.edit":1,"tmis.setup.fund.view":1,"vmis.setup.fund.edit":1,"vmis.setup.fund.view":1}', '2013-08-18 10:19:40', 100, '2013-09-01 11:41:58', NULL),
(4, 20, 'Amiya', 'test rolegg', '{"hrm.leave.add":1,"hrm.leave.del":1,"hrm.leave.view":1,"hrm.employee.add":1,"tmis.setup.fund.edit":1}', '2013-08-19 12:25:44', 100, '2013-08-28 05:16:37', 200),
(5, 20, 'www', 'www', '{"tmis.setup.fund.add":1,"tmis.setup.fund.edit":1,"acr.employee.view":1,"acr.employee.add":1,"acr.employee.edit":1,"acr.employee.del":1}', '2013-08-28 11:21:53', 100, '2013-11-27 09:27:27', NULL),
(6, 1, 'qq1', 'qqq1', '{"tmis.setup.fund.add":1,"tmis.setup.fund.edit":1,"tmis.setup.fund.view":1}', '2013-10-29 11:21:19', 4, '2013-10-29 11:22:02', NULL);

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
(1, 1, '101', 'p1', 1, 1, 1, 6, 8, 1, '2121', '12321', NULL, 'Amiya BD', 'Amiya K. Saha', 'Rk Saha', NULL, NULL, 1, '1981-12-15', 'Male', 1, 2, 1, 0, 0, NULL, '2000-12-12', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01716434565', 'amiya@yahoo.com', 1, '0000-00-00 00:00:00', NULL, '2013-12-06 15:08:19', NULL),
(2, 1, '102', 'f100', 1, 2, 2, 5, 2, 2, '1212', NULL, NULL, 'Razi', 'Alimul Razi', 'Rafiqul Islam', NULL, NULL, 1, '1982-07-31', 'Male', NULL, 4, 2, 1, 1, NULL, '2006-10-10', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01716463156', 'alimulrazi@gmail.com', 1, '0000-00-00 00:00:00', NULL, '2013-12-06 15:08:06', NULL),
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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `module` enum('HRMIS','RMIS','LMIS','PMIS','IMIS','VMIS','TMIS','DATABANK','SACS','Payroll','ACR','AER') COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `section` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `premission` mediumtext COLLATE utf8_unicode_ci,
  `weight` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `module`, `description`, `section`, `premission`, `weight`) VALUES
(1, 'RMIS', 'Research Management Information System', 'section 1', 'a:3:{s:17:"rmis.employee.add";s:25:"Add section 1 Information";s:18:"rmis.employee.edit";s:26:"Edit section 1 Information";s:18:"rmis.employee.view";s:26:"View section 1 Information";}', 3),
(2, 'RMIS', 'Research Management Information System', 'section 2', 'a:3:{s:14:"rmis.leave.add";s:27:"Apply section 2 Information";s:15:"rmis.leave.edit";s:26:"Edit section 2 Information";s:15:"rmis.leave.view";s:26:"View section 2 Information";}', 1);

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
-- Table structure for table `rmis_closing_informations`
--

CREATE TABLE `rmis_closing_informations` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `type` set('Program','Project') NOT NULL DEFAULT 'Program',
  `executive_summary` longtext,
  `actual_output` longtext,
  `recommendation` longtext,
  `program_id` varchar(20) DEFAULT NULL,
  `project_id` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rmis_closing_informations`
--

INSERT INTO `rmis_closing_informations` (`id`, `organization_id`, `type`, `executive_summary`, `actual_output`, `recommendation`, `program_id`, `project_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 'Program', 'Summary', 'output', 'Recommendation', NULL, NULL, '2013-12-04 10:02:30', 2, '2013-12-04 10:15:34', 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rmis_divisions`
--

INSERT INTO `rmis_divisions` (`id`, `organization_id`, `division_id`, `division_name`, `division_head`, `division_phone`, `division_email`, `division_order`, `division_about`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 'BARIDIV0001', 'Dhaka', '102', '01716453234', 'alimulrazi28@gmail.com', 1, 'division...', '2013-12-01 14:36:09', 1, '2013-12-01 14:36:09', NULL),
(2, 1, 'BARIDIV0002', 'Chittagong', '103', '01716453233', 'ashish@gmail.com', 2, 'new chittagong division', '2013-12-01 17:02:23', 2, '2013-12-01 17:02:58', 2);

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
-- Table structure for table `rmis_experiment_activities`
--

CREATE TABLE `rmis_experiment_activities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `work_element` text NOT NULL,
  `planned_start_date` date NOT NULL,
  `planned_end_date` date NOT NULL,
  `actual_start_date` date NOT NULL,
  `actual_end_date` date NOT NULL,
  `assign_resource` bigint(20) NOT NULL,
  `comments` longtext,
  `activity_status` bigint(20) DEFAULT NULL,
  `activity_point` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  `experiment_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rmis_experiment_activities`
--

INSERT INTO `rmis_experiment_activities` (`id`, `organization_id`, `sort_order`, `work_element`, `planned_start_date`, `planned_end_date`, `actual_start_date`, `actual_end_date`, `assign_resource`, `comments`, `activity_status`, `activity_point`, `created_at`, `created_by`, `updated_at`, `updated_by`, `experiment_id`) VALUES
(1, 1, 1, 'work element independent', '2013-12-11', '2013-12-12', '2013-12-13', '2013-12-14', 202, NULL, NULL, NULL, '2013-12-11 17:50:44', 2, '2013-12-11 17:50:44', NULL, 1),
(2, 1, 2, 'work element independent 2', '2013-12-28', '2013-12-29', '2013-12-30', '2013-12-31', 101, NULL, NULL, NULL, '2013-12-11 17:50:44', 2, '2013-12-11 17:50:44', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_experiment_informations`
--

CREATE TABLE `rmis_experiment_informations` (
  `experiment_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `research_experiment_title` text COLLATE utf8_unicode_ci NOT NULL,
  `experiment_type` set('Independent','Program','Project') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Independent',
  `project_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `program_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `experiment_division` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `experiment_research_type` bigint(20) NOT NULL,
  `experiment_research_priority` bigint(20) NOT NULL,
  `experiment_research_status` bigint(20) NOT NULL,
  `experiment_coordinator` bigint(20) NOT NULL,
  `experiment_coordinator_designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `experiment_department_name` bigint(20) DEFAULT NULL,
  `experiment_regional_station_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `experiment_implementation_location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `experiment_keywords` text COLLATE utf8_unicode_ci,
  `experiment_commodities` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `experiment_aezs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `experiment_planned_start_date` date NOT NULL,
  `experiment_planned_end_date` date NOT NULL,
  `experiment_initiation_date` date NOT NULL,
  `experiment_completion_date` date NOT NULL,
  `experiment_planned_budget` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `experiment_approved_budget` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `experiment_goal` longtext COLLATE utf8_unicode_ci NOT NULL,
  `experiment_objective` longtext COLLATE utf8_unicode_ci NOT NULL,
  `experiment_major_findings` longtext COLLATE utf8_unicode_ci,
  `experiment_progress_details` longtext COLLATE utf8_unicode_ci,
  `experiment_achievement_information` longtext COLLATE utf8_unicode_ci,
  `experiment_expected_outputs` longtext COLLATE utf8_unicode_ci NOT NULL,
  `experiment_actual_outputs` longtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) unsigned NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`experiment_id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rmis_experiment_informations`
--

INSERT INTO `rmis_experiment_informations` (`experiment_id`, `organization_id`, `research_experiment_title`, `experiment_type`, `project_id`, `program_id`, `experiment_division`, `experiment_research_type`, `experiment_research_priority`, `experiment_research_status`, `experiment_coordinator`, `experiment_coordinator_designation`, `experiment_department_name`, `experiment_regional_station_name`, `experiment_implementation_location`, `experiment_keywords`, `experiment_commodities`, `experiment_aezs`, `experiment_planned_start_date`, `experiment_planned_end_date`, `experiment_initiation_date`, `experiment_completion_date`, `experiment_planned_budget`, `experiment_approved_budget`, `experiment_goal`, `experiment_objective`, `experiment_major_findings`, `experiment_progress_details`, `experiment_achievement_information`, `experiment_expected_outputs`, `experiment_actual_outputs`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 'Test research experiment independent Edited :)', 'Independent', '', '', 'BARIDIV0001', 1, 1, 1, 202, 'EFGH', 2, 'BARIRS0001', 'BARIIMS0001', 'keyword1, keyword2', '1,2', '1,2', '2013-12-11', '2013-12-12', '2013-12-12', '2013-12-12', '100000', '100000', 'Test experiment goal independent', 'Test purpose objective independent', NULL, NULL, NULL, 'Test expected output independent---##########---', NULL, '2013-12-11 17:47:12', 2, '2013-12-11 18:37:03', 2);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_experiment_other_informations`
--

CREATE TABLE `rmis_experiment_other_informations` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `experiment_rationale` longtext,
  `experiment_commodity` text NOT NULL,
  `experiment_methodology` longtext,
  `experiment_background` longtext,
  `experiment_socio_economical_impact` longtext,
  `experiment_environmental_impact` longtext,
  `experiment_targeted_beneficiary` longtext,
  `experiment_reference` longtext,
  `experiment_external_affiliation` longtext,
  `experiment_organization_policy` longtext,
  `experiment_record_to_keep` longtext,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  `experiment_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rmis_experiment_other_informations`
--

INSERT INTO `rmis_experiment_other_informations` (`id`, `organization_id`, `experiment_rationale`, `experiment_commodity`, `experiment_methodology`, `experiment_background`, `experiment_socio_economical_impact`, `experiment_environmental_impact`, `experiment_targeted_beneficiary`, `experiment_reference`, `experiment_external_affiliation`, `experiment_organization_policy`, `experiment_record_to_keep`, `created_at`, `created_by`, `updated_at`, `updated_by`, `experiment_id`) VALUES
(1, 1, 'Test rationale independent ', 'Test comodity independent ', 'Test methodology independent ', 'Test background independent ', 'Test socio economical impact independent ', 'Test environment impact independent ', 'Test targeted beneficiary independent ', 'Test reference independent ', 'Test external affiliation independent ', 'Test organization policy independent ', 'Test record to keep independent ', '2013-12-11 17:48:45', 2, '2013-12-11 17:48:45', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_experiment_research_teams`
--

CREATE TABLE `rmis_experiment_research_teams` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `team_formation_date` date NOT NULL,
  `experiment_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rmis_experiment_research_teams`
--

INSERT INTO `rmis_experiment_research_teams` (`id`, `organization_id`, `team_formation_date`, `experiment_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, '2013-12-27', 1, '2013-12-11 17:49:56', 2, '2013-12-11 17:49:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_experiment_research_team_members`
--

CREATE TABLE `rmis_experiment_research_team_members` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `member_type` bigint(20) DEFAULT NULL,
  `institute_id` int(11) DEFAULT NULL,
  `institute_name` varchar(255) DEFAULT NULL,
  `employee_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `experiment_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rmis_experiment_research_team_members`
--

INSERT INTO `rmis_experiment_research_team_members` (`id`, `member_type`, `institute_id`, `institute_name`, `employee_id`, `member_name`, `designation`, `contact_no`, `email`, `experiment_id`) VALUES
(1, 1, 2, 'Bangladesh Agricultural Research Council', '', 'Kamrul Hossain', 'EFGH', '01779021581', 'kamrul@gmail.com', 1),
(2, 2, 2, 'Bangladesh Agricultural Research Council', '', 'Amiya K. Saha', 'Scientific Officer', '01716434565', 'amiya@yahoo.com', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `rmis_grade_point_informations`
--

INSERT INTO `rmis_grade_point_informations` (`id`, `lower_range`, `upper_range`, `letter_grade`, `grade_point`, `qualitative_status`, `description`, `grading_id`) VALUES
(21, 100, 90, 'A+', 5, 1, 'Very Good Research', 1),
(22, 80, 90, 'A-', 4.75, 2, 'Good Research', 1),
(23, 70, 80, 'A', 4.5, 2, 'Average Research', 1),
(24, 60, 70, 'B+', 4, 2, 'Average', 1),
(25, 50, 60, 'B', 3.5, 3, 'Not Good', 1),
(26, 40, 50, 'C', 3, 3, 'Bad', 1);

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
(1, 1, 'Research Evaluation Grading', '2013-11-21', '2013-11-21 12:23:24', 1, '2013-12-01 15:54:32', 1);

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
-- Table structure for table `rmis_logical_framework`
--

CREATE TABLE `rmis_logical_framework` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `type` set('Program','Project','Experiment') NOT NULL DEFAULT 'Program',
  `verifiable_indicators_goal` longtext,
  `verifiable_indicators_purpose` longtext,
  `verifiable_indicators_outputs` longtext,
  `verifiable_indicators_activities` longtext,
  `means_of_verification_goal` longtext,
  `means_of_verification_purpose` longtext,
  `means_of_verification_outputs` longtext,
  `means_of_verification_activities` longtext,
  `important_assumptions_goal` longtext,
  `important_assumptions_purpose` longtext,
  `important_assumptions_outputs` longtext,
  `important_assumptions_activities` longtext,
  `program_id` varchar(20) DEFAULT NULL,
  `project_id` varchar(20) DEFAULT NULL,
  `experiment_id` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rmis_logical_framework`
--

INSERT INTO `rmis_logical_framework` (`id`, `organization_id`, `type`, `verifiable_indicators_goal`, `verifiable_indicators_purpose`, `verifiable_indicators_outputs`, `verifiable_indicators_activities`, `means_of_verification_goal`, `means_of_verification_purpose`, `means_of_verification_outputs`, `means_of_verification_activities`, `important_assumptions_goal`, `important_assumptions_purpose`, `important_assumptions_outputs`, `important_assumptions_activities`, `program_id`, `project_id`, `experiment_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 'Experiment', 'Test goal edit', 'Test goal edit', 'Test goal edit', 'Test goal edit', 'Test goal edit', 'Test goal edit', 'Test goal edit', 'Test goal edit', 'Test goal edit', 'Test goal edit', 'Test goal edit', 'Test goal edit', '', '', '1', '2013-12-13 18:40:06', 2, '2013-12-14 15:53:08', 2);

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
  `comments` longtext,
  `activity_status` bigint(20) DEFAULT NULL,
  `activity_point` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  `program_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `rmis_program_activities`
--

INSERT INTO `rmis_program_activities` (`id`, `organization_id`, `sort_order`, `work_element`, `planned_start_date`, `planned_end_date`, `actual_start_date`, `actual_end_date`, `assign_resource`, `comments`, `activity_status`, `activity_point`, `created_at`, `created_by`, `updated_at`, `updated_by`, `program_id`) VALUES
(12, 1, 1, 'Test work element', '2013-11-19', '2013-11-26', '2013-11-20', '2013-11-12', 202, '', 1, 70, '2013-12-01 10:25:40', 1, '2013-12-01 14:26:17', 1, 1),
(13, 1, 2, 'Another test edit', '2013-11-20', '2013-11-25', '2013-11-25', '2013-12-03', 103, '', 1, 80, '2013-12-01 10:25:40', 1, '2013-12-01 14:26:17', 1, 1),
(14, 1, 3, 'tsst', '2013-12-03', '2013-12-11', '2013-12-04', '2013-12-04', 102, '', 3, 80, '2013-12-01 10:25:40', 1, '2013-12-01 14:26:17', 1, 1);

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
  `ac_head_id` bigint(20) NOT NULL,
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
  `financial_year` int(11) NOT NULL,
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
(1, 1, '2013-12-12', 1, '2013-11-23 13:13:48', 1, '2013-12-01 06:24:37', 1, 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rmis_program_implementation_committees`
--

INSERT INTO `rmis_program_implementation_committees` (`id`, `organization_id`, `committee_formation_date`, `program_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, '2013-12-19', 1, '2013-12-01 06:11:10', 1, '2013-12-01 06:23:14', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rmis_program_implementation_committee_members`
--

INSERT INTO `rmis_program_implementation_committee_members` (`id`, `committee_member_type`, `member_name`, `designation`, `contact_no`, `email`, `program_id`) VALUES
(2, '1', 'Alimul Razi', 'Scientist', '01716463213', 'alimulrazi@yahoo.com', 1);

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
  `program_major_findings` longtext COLLATE utf8_unicode_ci,
  `program_progress_details` longtext COLLATE utf8_unicode_ci,
  `program_achievement_information` longtext COLLATE utf8_unicode_ci,
  `program_expected_outputs` longtext COLLATE utf8_unicode_ci NOT NULL,
  `program_actual_outputs` longtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) unsigned NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`program_id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rmis_program_informations`
--

INSERT INTO `rmis_program_informations` (`program_id`, `organization_id`, `research_program_title`, `program_area`, `program_division`, `program_research_type`, `program_research_priority`, `program_research_status`, `program_coordinator`, `program_coordinator_designation`, `is_collaborate`, `program_institute_names`, `program_department_name`, `program_regional_station_name`, `program_implementation_location`, `program_keywords`, `program_commodities`, `program_aezs`, `program_planned_start_date`, `program_planned_end_date`, `program_initiation_date`, `program_completion_date`, `program_planned_budget`, `program_approved_budget`, `program_goal`, `program_objective`, `program_major_findings`, `program_progress_details`, `program_achievement_information`, `program_expected_outputs`, `program_actual_outputs`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 'This is test program', 'BARIPA0001', 'BARIDIV0001', 1, 1, 1, 202, 'EFGH', '1', '1,2', 1, 'BARIRS0001', 'BARIIMS0001', 'test keyword', '1,2', '1,2', '2013-11-23', '2013-11-23', '2013-11-23', '2013-11-23', '10000000', '10000000', 'Test program goal', 'test purpose objective', '', 'asdfasdf', '', 'test expected output---##########---', 'tettewrw', '2013-11-23 08:19:59', 1, '2013-12-01 14:26:17', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rmis_program_me_committees`
--

INSERT INTO `rmis_program_me_committees` (`id`, `organization_id`, `committee_chairman`, `committee_formation_date`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, '103', '2013-11-23', '2013-11-22 13:38:58', 1, '2013-11-22 18:39:38', 1),
(2, 1, '202', '2013-11-26', '2013-11-22 13:41:31', 1, '2013-12-01 10:23:42', 1),
(3, 1, '102', '2013-12-03', '2013-12-01 06:28:46', 1, '2013-12-01 10:24:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_me_committee_members`
--

CREATE TABLE `rmis_program_me_committee_members` (
  `committee_member_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `committee_id` bigint(20) unsigned NOT NULL,
  `organization_id` int(11) NOT NULL,
  `member_id` bigint(20) NOT NULL,
  `role_in_committee` text NOT NULL,
  `is_present` set('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`committee_member_id`,`committee_id`,`organization_id`,`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `rmis_program_me_committee_members`
--

INSERT INTO `rmis_program_me_committee_members` (`committee_member_id`, `committee_id`, `organization_id`, `member_id`, `role_in_committee`, `is_present`) VALUES
(5, 2, 1, 202, 'Chairman Giri', '1'),
(6, 2, 1, 103, 'Manager Giri', '1'),
(7, 2, 1, 101, 'Officer Giri', '1'),
(8, 2, 1, 106, 'member', '1'),
(9, 3, 1, 101, 'member', '1'),
(10, 3, 1, 202, 'member', '0');

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_me_informations`
--

CREATE TABLE `rmis_program_me_informations` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `program_me_date` date NOT NULL,
  `program_me_type` int(11) NOT NULL,
  `program_rating` int(11) NOT NULL,
  `program_qualitative_status` int(11) NOT NULL,
  `program_total_point` float NOT NULL DEFAULT '0',
  `program_average_grade_point` float NOT NULL DEFAULT '0',
  `program_grade_point` float NOT NULL DEFAULT '0',
  `program_letter_grade` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  `program_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `rmis_program_me_informations`
--

INSERT INTO `rmis_program_me_informations` (`id`, `organization_id`, `program_me_date`, `program_me_type`, `program_rating`, `program_qualitative_status`, `program_total_point`, `program_average_grade_point`, `program_grade_point`, `program_letter_grade`, `created_at`, `created_by`, `updated_at`, `updated_by`, `program_id`) VALUES
(4, 1, '2013-11-01', 1, 1, 1, 230, 76.6667, 4.5, 'A', '2013-12-01 06:07:08', 1, '2013-12-01 14:26:17', 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rmis_program_rating`
--

INSERT INTO `rmis_program_rating` (`id`, `organization_id`, `value`, `name`, `weight`, `is_default`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, '1', 'Progress Satisfactory', 1, 'no', 1, '2013-12-03 18:00:00', 1, '2013-12-01 15:55:05', 1),
(2, 1, '2', 'Progress\nPartially Satisfactory', 2, 'no', 1, '2013-12-03 12:00:00', 1, '2013-12-01 15:55:08', 1),
(3, 1, '3', 'Progress Unsatisfactory', 3, 'no', 1, '2013-12-03 12:00:00', 1, '2013-12-01 15:55:10', 1);

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
(2, 1, 'Fuck document', 2, 2, 'atas.csv', NULL, '2013-11-27 02:51:18', 1, '2013-11-27 07:51:18', NULL, 1),
(3, 1, 'test document1', 5, 3, 'Tulips.jpg', NULL, '2013-12-03 07:55:53', 2, '2013-12-03 07:55:53', NULL, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rmis_program_research_teams`
--

INSERT INTO `rmis_program_research_teams` (`id`, `organization_id`, `team_formation_date`, `program_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, '2013-12-07', 1, '2013-12-05 07:03:01', 1, '2013-12-06 15:29:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_research_team_members`
--

CREATE TABLE `rmis_program_research_team_members` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `member_type` bigint(20) DEFAULT NULL,
  `institute_id` int(11) DEFAULT NULL,
  `institute_name` varchar(255) DEFAULT NULL,
  `employee_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
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

INSERT INTO `rmis_program_research_team_members` (`id`, `member_type`, `institute_id`, `institute_name`, `employee_id`, `member_name`, `designation`, `contact_no`, `email`, `program_id`) VALUES
(25, 1, 8, 'Bangladesh Agricultural Research Council', '21', 'Kamrul Hossain', 'EFGH', '01779021581', 'kamrul@gmail.com', 1),
(26, 2, 8, 'Bangladesh Agricultural Research Council', '22', 'Ashish Kumar Basak', 'HR Manager', '01711084616', 'ashish021@gmail.com', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `rmis_program_steering_committees`
--

INSERT INTO `rmis_program_steering_committees` (`id`, `organization_id`, `committee_formation_date`, `program_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, '2013-12-06', 1, '2013-11-25 23:47:47', 1, '2013-12-01 06:22:38', 1),
(2, 1, '2013-12-06', 1, '2013-11-26 23:48:29', 1, '2013-12-01 06:22:38', 1),
(3, 1, '2013-12-06', 1, '2013-11-26 23:48:40', 1, '2013-12-01 06:22:38', 1),
(4, 1, '2013-12-06', 1, '2013-12-01 06:10:34', 1, '2013-12-01 06:22:38', 1),
(5, 1, '2013-12-06', 1, '2013-12-01 06:12:16', 1, '2013-12-01 06:22:38', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rmis_program_steering_committee_members`
--

INSERT INTO `rmis_program_steering_committee_members` (`id`, `committee_member_type`, `member_name`, `designation`, `contact_no`, `email`, `program_id`) VALUES
(1, '2', 'Kamrul Hassan', 'President', '01779021581', 'kamrul@gmail.com', 2),
(2, '2', '202', 'President', '01779021581', 'ashish021@gmail.com', 3),
(3, '1', 'Alimul Razi', 'Scientist', '01716463213', 'alimulrazi@yahoo.com', 4);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_project_activities`
--

CREATE TABLE `rmis_project_activities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `work_element` text NOT NULL,
  `planned_start_date` date NOT NULL,
  `planned_end_date` date NOT NULL,
  `actual_start_date` date NOT NULL,
  `actual_end_date` date NOT NULL,
  `assign_resource` bigint(20) NOT NULL,
  `comments` longtext,
  `activity_status` bigint(20) DEFAULT NULL,
  `activity_point` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  `project_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rmis_project_activities`
--

INSERT INTO `rmis_project_activities` (`id`, `organization_id`, `sort_order`, `work_element`, `planned_start_date`, `planned_end_date`, `actual_start_date`, `actual_end_date`, `assign_resource`, `comments`, `activity_status`, `activity_point`, `created_at`, `created_by`, `updated_at`, `updated_by`, `project_id`) VALUES
(2, 1, 1, 'Test work element', '2013-12-04', '2013-12-05', '2013-12-06', '2013-12-07', 106, 'very good', 1, 70, '2013-12-03 07:40:53', 2, '2013-12-03 12:14:09', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_project_cost_breakdowns`
--

CREATE TABLE `rmis_project_cost_breakdowns` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `s_o` varchar(255) NOT NULL,
  `ac_head_id` bigint(20) NOT NULL,
  `amount` float NOT NULL,
  `project_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `rmis_project_cost_breakdowns`
--

INSERT INTO `rmis_project_cost_breakdowns` (`id`, `s_o`, `ac_head_id`, `amount`, `project_id`) VALUES
(13, '1', 1, 2000, 1),
(14, '2', 12, 3000, 1),
(15, '1', 1, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_project_cost_estimations`
--

CREATE TABLE `rmis_project_cost_estimations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `estimate_date` date NOT NULL,
  `financial_year` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  `project_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rmis_project_cost_estimations`
--

INSERT INTO `rmis_project_cost_estimations` (`id`, `organization_id`, `estimate_date`, `financial_year`, `created_at`, `created_by`, `updated_at`, `updated_by`, `project_id`) VALUES
(1, 1, '2013-12-13', 2, '2013-12-03 18:00:00', 2, '2013-12-03 07:27:40', 2, 1),
(2, 1, '0000-00-00', 1, '2013-12-09 17:49:35', 2, '2013-12-09 17:49:35', NULL, 5);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_project_funding_sources`
--

CREATE TABLE `rmis_project_funding_sources` (
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
  `project_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `rmis_project_funding_sources`
--

INSERT INTO `rmis_project_funding_sources` (`id`, `organization_id`, `fund_source`, `amount`, `currency`, `exchange_rate`, `date_of_exchange_rate`, `amount_in_taka`, `created_at`, `created_by`, `updated_at`, `updated_by`, `project_id`) VALUES
(6, 1, 1, 100, '2', 80, '2013-12-04', 8000, '0000-00-00 00:00:00', NULL, '2013-12-03 07:27:40', 2, 1),
(7, 1, 1, 6, '2', 1, '2013-12-09', 100, '2013-12-09 17:49:35', 2, '2013-12-09 17:49:35', NULL, 5);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_project_implementation_committees`
--

CREATE TABLE `rmis_project_implementation_committees` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `committee_formation_date` date NOT NULL,
  `project_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rmis_project_implementation_committees`
--

INSERT INTO `rmis_project_implementation_committees` (`id`, `organization_id`, `committee_formation_date`, `project_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, '2013-12-05', 1, '2013-12-03 07:34:23', 2, '2013-12-03 07:34:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_project_implementation_committee_members`
--

CREATE TABLE `rmis_project_implementation_committee_members` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `committee_member_type` varchar(255) DEFAULT NULL,
  `member_name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `project_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rmis_project_implementation_committee_members`
--

INSERT INTO `rmis_project_implementation_committee_members` (`id`, `committee_member_type`, `member_name`, `designation`, `contact_no`, `email`, `project_id`) VALUES
(1, '1', 'Alimul Razi', 'Scientist', '01716463213', 'alimulrazi@yahoo.com', 1),
(2, '3', 'Raiyan Samin', 'Member', '01716463215', 'raiyan@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_project_informations`
--

CREATE TABLE `rmis_project_informations` (
  `project_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `research_project_title` text COLLATE utf8_unicode_ci NOT NULL,
  `project_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `project_prefix` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `project_type` set('Independent','Program') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Independent',
  `program_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `project_division` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `project_research_type` bigint(20) NOT NULL,
  `project_research_priority` bigint(20) NOT NULL,
  `project_research_status` bigint(20) NOT NULL,
  `project_coordinator` bigint(20) NOT NULL,
  `project_coordinator_designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_collaborate` set('0','1') COLLATE utf8_unicode_ci DEFAULT '0',
  `project_institute_names` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `project_department_name` bigint(20) DEFAULT NULL,
  `project_regional_station_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `project_implementation_location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `project_keywords` text COLLATE utf8_unicode_ci,
  `project_commodities` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `project_aezs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `project_planned_start_date` date NOT NULL,
  `project_planned_end_date` date NOT NULL,
  `project_initiation_date` date NOT NULL,
  `project_completion_date` date NOT NULL,
  `project_planned_budget` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `project_approved_budget` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `project_goal` longtext COLLATE utf8_unicode_ci NOT NULL,
  `project_objective` longtext COLLATE utf8_unicode_ci NOT NULL,
  `project_major_findings` longtext COLLATE utf8_unicode_ci,
  `project_progress_details` longtext COLLATE utf8_unicode_ci,
  `project_achievement_information` longtext COLLATE utf8_unicode_ci,
  `project_expected_outputs` longtext COLLATE utf8_unicode_ci NOT NULL,
  `project_actual_outputs` longtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) unsigned NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`project_id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `rmis_project_informations`
--

INSERT INTO `rmis_project_informations` (`project_id`, `organization_id`, `research_project_title`, `project_code`, `project_prefix`, `project_type`, `program_id`, `project_division`, `project_research_type`, `project_research_priority`, `project_research_status`, `project_coordinator`, `project_coordinator_designation`, `is_collaborate`, `project_institute_names`, `project_department_name`, `project_regional_station_name`, `project_implementation_location`, `project_keywords`, `project_commodities`, `project_aezs`, `project_planned_start_date`, `project_planned_end_date`, `project_initiation_date`, `project_completion_date`, `project_planned_budget`, `project_approved_budget`, `project_goal`, `project_objective`, `project_major_findings`, `project_progress_details`, `project_achievement_information`, `project_expected_outputs`, `project_actual_outputs`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 'Test project', 'PRO0034', 'PR', 'Program', '1', 'BARIDIV0001', 1, 1, 1, 102, 'HR Manager', NULL, '1,2,3', 1, 'BARIRS0001', 'BARIIMS0001', 'dhaka project, tangail project', '1,2', '1,2', '2013-12-03', '2013-12-20', '2013-12-04', '2013-12-06', '12345', '43534', 'goal', 'objective', 'Findings', 'Details ', 'Achievement Information', 'output1---##########---output 2---##########---', 'output ---##########---output 1', '2013-12-02 10:27:27', 2, '2013-12-03 12:14:09', 2),
(3, 1, 'Fucking Project edit', 'FUCK001', '001FUCK', 'Independent', '0', 'BARIDIV0002', 3, 2, 4, 202, 'EFGH', '1', '1,3,4', 18, 'BARIRS0001', 'BARIIMS0001', 'dhaka project, tangail project', '2', '', '2013-12-09', '2013-12-10', '2013-12-09', '2013-12-10', '10000000', '10000000', 'Test project goal', 'test project purpose or objective', NULL, NULL, NULL, 'test project expected output 1---##########---test project expected output 2---##########---', NULL, '2013-12-09 17:28:59', 2, '2013-12-09 17:38:51', 2),
(4, 1, 'Test project 100', 'CODE100', '100CODE', 'Independent', '0', 'BARIDIV0002', 3, 2, 4, 202, 'EFGH', '1', '1,2', 18, 'BARIRS0001', 'BARIIMS0001', 'dhaka project, tangail project', '2', '2', '2013-12-09', '2013-12-10', '2013-12-09', '2013-12-10', '10000000', '10000000', 'Test project goal 100', 'Test project purpose 100', NULL, NULL, NULL, 'test project expected output 100', NULL, '2013-12-09 17:40:17', 2, '2013-12-09 17:40:17', 0),
(5, 1, 'Fucking project 99', 'CODE99', '99CODE', 'Program', '1', 'BARIDIV0002', 2, 1, 2, 202, 'EFGH', '1', '1,2,3', 2, 'BARIRS0001', 'BARIIMS0001', 'dhaka project, tangail project', '2', '2', '2013-12-09', '2013-12-10', '2013-12-09', '2013-12-10', '10000000', '10000000', 'Test project goal 99', 'Test project purpose 99', NULL, NULL, NULL, 'test project expected output 99test project expected output 99test project expected output 99test project expected output 99test project expected output 99test project expected output 99test project expected output 99test project expected output 99', NULL, '2013-12-09 17:45:25', 2, '2013-12-09 17:45:25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_project_me_informations`
--

CREATE TABLE `rmis_project_me_informations` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `project_me_date` date NOT NULL,
  `project_me_type` int(11) NOT NULL,
  `project_rating` int(11) NOT NULL,
  `project_qualitative_status` int(11) NOT NULL,
  `project_total_point` float NOT NULL DEFAULT '0',
  `project_average_grade_point` float NOT NULL DEFAULT '0',
  `project_grade_point` float NOT NULL DEFAULT '0',
  `project_letter_grade` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  `project_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rmis_project_me_informations`
--

INSERT INTO `rmis_project_me_informations` (`id`, `organization_id`, `project_me_date`, `project_me_type`, `project_rating`, `project_qualitative_status`, `project_total_point`, `project_average_grade_point`, `project_grade_point`, `project_letter_grade`, `created_at`, `created_by`, `updated_at`, `updated_by`, `project_id`) VALUES
(1, 1, '0000-11-30', 1, 0, 1, 70, 70, 4.5, 'A', '2013-12-03 12:08:25', 2, '2013-12-03 12:14:09', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_project_monitoring_committees`
--

CREATE TABLE `rmis_project_monitoring_committees` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `committee_formation_date` date NOT NULL,
  `project_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rmis_project_monitoring_committees`
--

INSERT INTO `rmis_project_monitoring_committees` (`id`, `organization_id`, `committee_formation_date`, `project_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, '2013-12-05', 1, '2013-12-03 11:18:26', 2, '2013-12-03 11:41:56', 2);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_project_monitoring_committee_members`
--

CREATE TABLE `rmis_project_monitoring_committee_members` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `committee_member_type` varchar(255) DEFAULT NULL,
  `member_name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `is_present` set('0','1') NOT NULL DEFAULT '1',
  `project_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `rmis_project_monitoring_committee_members`
--

INSERT INTO `rmis_project_monitoring_committee_members` (`id`, `committee_member_type`, `member_name`, `designation`, `contact_no`, `email`, `is_present`, `project_id`) VALUES
(11, '3', 'Alimul Razi', 'Scientist', '01716463213', 'alimulrazi@yahoo.com', '0', 1),
(12, '2', 'Ashish Kumar Basak', 'Scientist', '01716463213', 'ashish@gmai.com', '1', 1),
(13, '1', 'Raiyan Samin', 'Chairman', '01716463215', 'raiyan@gmail.com', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_project_other_informations`
--

CREATE TABLE `rmis_project_other_informations` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  `project_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rmis_project_other_informations`
--

INSERT INTO `rmis_project_other_informations` (`id`, `organization_id`, `project_rationale`, `project_methodology`, `project_background`, `project_socio_economical_impact`, `project_environmental_impact`, `project_targeted_beneficiary`, `project_reference`, `project_external_affiliation`, `project_organization_policy`, `project_risks`, `created_at`, `created_by`, `updated_at`, `updated_by`, `project_id`) VALUES
(1, 1, 'Rationale', 'Methodology', 'Background', 'Socio Economical Impac', 'Environmental Impact', 'Targeted Beneficiary', 'Reference', 'External Affiliation', 'Organization Policy', 'Project Risks', '2013-12-02 11:27:42', 2, '2013-12-02 11:29:17', 2, 1),
(2, 1, 'Test rationale 5', 'Test rationale 5', 'Test rationale 5', 'Test rationale 5', 'Test rationale 5', 'Test rationale 5', 'Test rationale 5', 'Test rationale 5', 'Test rationale 5', 'Test rationale 5', '2013-12-09 17:47:47', 2, '2013-12-09 17:47:47', NULL, 5);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_project_rating`
--

CREATE TABLE `rmis_project_rating` (
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
-- Table structure for table `rmis_project_related_documents`
--

CREATE TABLE `rmis_project_related_documents` (
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
  `project_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rmis_project_related_documents`
--

INSERT INTO `rmis_project_related_documents` (`id`, `organization_id`, `document_title`, `document_type`, `sorting_order`, `document_name`, `remarks`, `created_at`, `created_by`, `updated_at`, `updated_by`, `project_id`) VALUES
(1, 1, 'test document', 1, 1, 'Tulips.jpg', NULL, '2013-12-03 07:53:06', 2, '2013-12-03 07:53:06', NULL, 1),
(2, 1, 'test document1', 2, 2, 'Chrysanthemum.jpg', NULL, '2013-12-03 07:53:34', 2, '2013-12-03 07:53:34', NULL, 1),
(3, 1, 'test document2', 4, 3, 'Penguins.jpg', NULL, '2013-12-03 07:54:24', 2, '2013-12-03 07:54:24', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_project_research_teams`
--

CREATE TABLE `rmis_project_research_teams` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `team_formation_date` date NOT NULL,
  `project_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rmis_project_research_teams`
--

INSERT INTO `rmis_project_research_teams` (`id`, `organization_id`, `team_formation_date`, `project_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, '2013-12-14', 1, '2013-12-06 14:21:04', 2, '2013-12-06 16:25:07', 2),
(2, 1, '0000-00-00', 5, '2013-12-09 17:51:29', 2, '2013-12-09 17:51:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_project_research_team_members`
--

CREATE TABLE `rmis_project_research_team_members` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `member_type` bigint(20) DEFAULT NULL,
  `institute_id` int(11) DEFAULT NULL,
  `institute_name` varchar(255) DEFAULT NULL,
  `employee_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `project_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `rmis_project_research_team_members`
--

INSERT INTO `rmis_project_research_team_members` (`id`, `member_type`, `institute_id`, `institute_name`, `employee_id`, `member_name`, `designation`, `contact_no`, `email`, `project_id`) VALUES
(7, 1, 2, 'Bangladesh Agricultural Research Council', '5', 'Alimul Razi', 'HR Manager', '01716453234', 'alimulrazi28@gmail.com', 1),
(8, 1, 2, 'Bangladesh Agricultural Research Council', '6', 'Abu Sayed', 'HR Manager', '1716453234', 'alimulrazi_28@yahoo.com', 1),
(9, 2, 2, 'Bangladesh Agricultural Research Council', '', 'Alimul Razi', 'HR Manager', '01716463156', 'alimulrazi@gmail.com', 1),
(10, 4, 2, 'Bangladesh Agricultural Research Council', '', 'abdullah al manun', 'HR Manager', '01716463156', 'alimulrazi@gmail.com', 1),
(11, 2, 2, 'Bangladesh Agricultural Research Council', '', 'Ashish Kumar Basak', 'HR Manager', '01779021581', 'ashish.kumar.basak@gmail.com', 5);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_project_steering_committees`
--

CREATE TABLE `rmis_project_steering_committees` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `committee_formation_date` date NOT NULL,
  `project_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rmis_project_steering_committees`
--

INSERT INTO `rmis_project_steering_committees` (`id`, `organization_id`, `committee_formation_date`, `project_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, '2013-12-06', 1, '2013-12-03 07:30:37', 2, '2013-12-03 12:17:25', 2),
(2, 1, '2013-12-06', 1, '2013-12-03 12:17:12', 2, '2013-12-03 12:17:25', 2);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_project_steering_committee_members`
--

CREATE TABLE `rmis_project_steering_committee_members` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `committee_member_type` varchar(255) DEFAULT NULL,
  `member_name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `project_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `rmis_project_steering_committee_members`
--

INSERT INTO `rmis_project_steering_committee_members` (`id`, `committee_member_type`, `member_name`, `designation`, `contact_no`, `email`, `project_id`) VALUES
(10, '1', 'Alimul Razi', 'Scientist', '01716463213', 'alimulrazi@yahoo.com', 1),
(11, '2', 'Ashish Kumar Basak', 'Junior Scientist', '01716463215', 'ashish@gmai.com', 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `activated` tinyint(4) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_login` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `persist_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `official_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `employee_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`organization_id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_activation_code_index` (`activation_code`),
  KEY `users_reset_password_code_index` (`reset_password_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `organization_id`, `email`, `password`, `permissions`, `activated`, `activation_code`, `activated_at`, `last_login`, `persist_code`, `reset_password_code`, `official_email`, `first_name`, `last_name`, `employee_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 'admin', '$2y$10$EXKrVpLTj9TpFp/L6SmxweUvzZRN4Xkiyt8HRd/w9lMhFLVCvVeGm', NULL, 1, NULL, NULL, '2013-11-28 11:43:47', '$2y$10$ukHO5tRZ/8Ax2KRabsRp.eylayHovBbCgKwDqEZHnPmEDl7.jUNV2', NULL, 'admin@tvl.com', 'Administrator', 'User', 100, '2013-08-25 05:51:23', 1, '2013-11-28 05:43:47', 1),
(2, 1, 'amiya', '$2y$10$UOwdLJ3dtJrO/K1elv9YhueOL/T47I4DvByOfH7cmig7vJi.4zthe', NULL, 1, NULL, NULL, '2013-12-14 20:52:11', '$2y$10$706iPMl.HLw5yO0ZCLa2XOhOk795K1IDHf6EXYZgMYC/ktrjbU9za', NULL, 'amiyasaha@yahoo.com', 'Amiya Kishore Saha', NULL, 325, '2013-08-25 05:52:39', 1, '2013-12-14 14:52:11', 2),
(3, 1, 'qqq@tvl.com', '$2y$10$WgNVsaeLAPO.Qhw0TFzoGuHkm/jsdOp4/fuvMq.sha3RGbXxdshba', NULL, 1, NULL, NULL, NULL, NULL, NULL, 'qqq@tvl.com', 'Kamrul Hasan', NULL, 202, '2013-09-01 05:53:20', 1, '2013-09-01 09:37:27', 1),
(4, 1, 'qqq', '$2y$10$TFx/kgwZvWFYQ8/INt2k/.xsp4PyoxPblVCiRk4HEOv/.Zv5/kVJy', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'wqwww@www.fdf', 'qqqwqw', NULL, 0, '2013-09-01 06:09:05', 1, '2013-09-01 06:09:05', NULL),
(5, 1, 'lisa', '$2y$10$ZoLOfWfFl3Da2.l3yUc7meB1BpAAEGA3J31/XGWP4KTQAAhcvNdii', NULL, 1, NULL, NULL, '2013-11-28 08:39:11', '$2y$10$oc/hcnl2/30HxQCw8hWgjuFqSEB2Kc3O8NMXA.0WSjcq5wVywENoW', NULL, 'lisa@tvl.com', 'Lisa TVL', NULL, 0, '2013-09-05 05:49:06', 2, '2013-11-28 02:39:11', 5),
(6, 1, 'imsuser', '$2y$10$3NggV3A1wVp4eAavzXZitebqIkOzoxoLZH0nWRK9S3jMJKedrwWEC', NULL, 1, NULL, NULL, '2013-11-28 10:29:01', '$2y$10$QOmtJpeVs6il79pDuuJ7d.1gpNTheSx2vpeFGPMGdc129LNCKzqVy', NULL, 'info@barc.com', 'IMS Use', NULL, 0, '2013-09-15 09:08:12', 1, '2013-11-28 04:29:01', NULL),
(7, 1, 'hrmuser', '$2y$10$cJ9so9q1vO.TYL6mFRPlmO.BT6uEoO.GgpwMwRXJ8nmSvNgl2uoMi', NULL, 1, NULL, NULL, '2013-11-28 10:51:15', '$2y$10$0XCwuzpy8pVywDQeIp48w.keQEaazaQZc39kBd5FdBxwjqX3HnSXG', NULL, 'hrm@barc.com', 'HRM User', NULL, 0, '2013-09-15 09:11:28', 1, '2013-11-28 04:51:15', 7),
(8, 1, 'sbuser', '$2y$10$ZOGAJ9i4FYo6I7vu9hh9AO01/mHCOLdX.o.k3sM5XrH4/Qar4UkR2', NULL, 1, NULL, NULL, '2013-09-29 12:51:36', '$2y$10$WfQnCNAFXo.3E0hAWuabPeFlHM2bel8Yvm7HT1.kCOs7GEVwfkdry', NULL, 'sb@barc.com', 'Service Book user', NULL, 0, '2013-09-16 05:59:14', 1, '2013-09-29 06:51:36', NULL),
(9, 1, 'amsuser', '$2y$10$S8pu7C8Mm9bODgkQbZJo7Ow/AUt.6L/rtOR/MsX.NM.e.so5TQBj.', NULL, 1, NULL, NULL, '2013-10-01 18:28:09', '$2y$10$KBNVSwHfnZr18QNfVp7eOujw2OLLgXUacuYRzIwCovcbUXNMgO8bS', NULL, 'ams@barc.com', 'AMS User', NULL, 0, '2013-10-01 12:03:44', 1, '2013-10-01 12:28:09', NULL),
(10, 1, '100', '$2y$10$UHdScV/R0WjPnSWTx4fIo.dre41obV1YscjOHRG1eHFkWv1RlQCCy', NULL, 1, NULL, NULL, NULL, NULL, NULL, 'info@test.com', 'Md. Obaidul Haque Sarker', NULL, 0, '2013-10-30 11:07:09', 2, '2013-10-30 11:07:09', NULL),
(11, 1, '122', '$2y$10$1bYi8WXkZiAXeU/5/vNifeqIHYbTMK2W.eDyARoRbLuQB73XQt4xG', NULL, 1, NULL, NULL, NULL, NULL, NULL, '212@wewe.hg', '21212', NULL, 0, '2013-10-30 11:07:42', 2, '2013-10-30 11:07:42', NULL),
(12, 1, '323', '$2y$10$.f4LrpVWhd1Uw3bWO1jlUewH2FgfZgWyxoZEcdkc4nB9B5I0WSriy', NULL, 1, NULL, NULL, NULL, NULL, NULL, '3123@wewe.fgf', '323 23', NULL, 0, '2013-10-30 11:44:29', 2, '2013-10-30 11:44:29', NULL),
(13, 1, 'info@testaa', '$2y$10$Jo79kxZCMTfHkF685fdYnuAdDnQfpcUE/KXk6pLnC78xIBAucihly', NULL, 1, NULL, NULL, NULL, NULL, NULL, 'indsdfo@test.dsd', 'Md. Afzal Hossain', NULL, 2, '2013-10-30 11:51:35', 2, '2013-10-30 11:51:35', NULL),
(14, 1, '1000', '$2y$10$Y2m3btndGzg1wXQ2pnImtO5bhQkpsIkqeniPkkO6F1GYFmiTvDUuC', NULL, 1, NULL, NULL, NULL, NULL, NULL, 'amiya1000@yahoo.com', '1000 1000', NULL, 0, '2013-11-11 10:04:56', 2, '2013-11-11 10:04:56', NULL),
(15, 1, 'pmuser', '$2y$10$lHfP2j2nwcnLCRpXRhzdFeCZgaBxhTJ6elsr1GG.6N/dkxW8H4fF6', NULL, 1, NULL, NULL, '2013-11-28 15:30:51', '$2y$10$k65bRA6qhRUU9fVFp6BOl.NRMkO/cRUURCbtrSPofa.BOAHlrroWe', NULL, 'awda@sd.com', 'Shakhawat ', NULL, 0, '2013-11-14 10:23:12', 1, '2013-11-28 09:30:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`,`organization_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=34 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `organization_id`, `user_id`, `group_id`) VALUES
(3, 1, 1, 1),
(10, 1, 4, 4),
(11, 1, 3, 1),
(12, 1, 3, 3),
(17, 1, 6, 1),
(19, 1, 8, 1),
(21, 1, 9, 1),
(22, 1, 10, 1),
(23, 1, 11, 1),
(24, 1, 12, 1),
(25, 1, 13, 1),
(26, 1, 2, 1),
(27, 1, 14, 1),
(29, 1, 15, 1),
(30, 1, 7, 1),
(31, 1, 7, 2),
(33, 1, 5, 1);
