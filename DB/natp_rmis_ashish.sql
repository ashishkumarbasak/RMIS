-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 22, 2013 at 09:00 PM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `natp_rmis`
--

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
(2, 1, '202', 'f100', 1, 2, 2, 5, 2, 2, '1212', NULL, NULL, 'Kamrul BD', 'Kamrul Hasan', 'Haru1 ', NULL, NULL, 1, '1980-12-12', 'Male', NULL, 4, 2, 1, 1, NULL, '2006-10-10', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qqq@tvl.com', 1, '0000-00-00 00:00:00', NULL, '2013-08-29 11:46:47', NULL),
(4, 1, '104', 'pf-0123', 1, 1, 1, NULL, 0, 2, NULL, NULL, NULL, 'sdfsad', 'dfdsfasd', '', NULL, NULL, NULL, '0000-00-00', 'Male', NULL, 0, 0, 0, 0, NULL, '2013-09-12', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2013-09-12 05:21:58', 1, '2013-09-12 05:17:57', NULL),
(6, 1, '123', 'sdfasd', 2, 2, 1, NULL, 10, 4, NULL, NULL, NULL, 'sdfsa', 'dsfsa', '', NULL, NULL, NULL, '0000-00-00', 'Male', NULL, 0, 0, 0, 0, NULL, '2013-09-12', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2013-09-12 05:40:06', 1, '2013-09-12 05:36:05', NULL),
(7, 1, '02321', 'tesd', 3, 2, 2, NULL, 2, 2, NULL, NULL, NULL, 'sdfsd', 'ewrqer', '', NULL, NULL, NULL, '0000-00-00', 'Male', NULL, 0, 0, 0, 0, NULL, '2013-09-17', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2013-09-15 09:20:13', 7, '2013-09-15 09:16:05', NULL),
(8, 1, 'test', 'dasdf', 1, 2, 2, NULL, 1, 2, NULL, NULL, NULL, 'sdfsad', 'sdfsd', '', NULL, NULL, NULL, '0000-00-00', 'Male', NULL, 0, 0, 0, 0, NULL, '2013-09-15', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2013-09-15 09:37:03', 7, '2013-09-15 09:32:55', NULL),
(9, 1, 'jhjhj', 'jgjh', 2, 2, 2, NULL, 1, 4, NULL, NULL, NULL, 'jjhgjj', 'jhj', '', NULL, NULL, NULL, '0000-00-00', 'Male', NULL, 0, 0, 0, 0, NULL, '2013-10-02', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2013-09-15 10:05:30', 5, '2013-09-15 10:01:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_aezs`
--

CREATE TABLE `rmis_aezs` (
  `aez_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `aez_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(4) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`aez_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `rmis_aezs`
--

INSERT INTO `rmis_aezs` (`aez_id`, `aez_name`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'AEZ-1', 1, '0000-00-00 00:00:00', NULL, '2013-10-11 19:56:34', NULL),
(2, 'AEZ-2', 1, '0000-00-00 00:00:00', NULL, '2013-10-11 19:56:34', NULL),
(3, 'AEZ-3', 1, '0000-00-00 00:00:00', NULL, '2013-10-11 19:56:47', NULL),
(4, 'AEZ-4', 1, '0000-00-00 00:00:00', NULL, '2013-10-11 19:56:47', NULL),
(5, 'AEZ-5', 1, '0000-00-00 00:00:00', NULL, '2013-10-11 19:57:00', NULL),
(6, 'AEZ-6', 1, '0000-00-00 00:00:00', NULL, '2013-10-11 19:57:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_commodities`
--

CREATE TABLE `rmis_commodities` (
  `commodity_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `commodity_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(4) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`commodity_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `rmis_commodities`
--

INSERT INTO `rmis_commodities` (`commodity_id`, `commodity_name`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Comodity 1', 1, '0000-00-00 00:00:00', NULL, '2013-10-22 17:15:18', NULL),
(2, 'Comodity 2', 1, '0000-00-00 00:00:00', NULL, '2013-10-22 17:15:21', NULL),
(5, 'Comodity 3', 1, '0000-00-00 00:00:00', NULL, '2013-10-22 17:15:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_departments`
--

CREATE TABLE `rmis_departments` (
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

CREATE TABLE `rmis_divisions` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rmis_divisions`
--

INSERT INTO `rmis_divisions` (`id`, `division_id`, `division_name`, `division_head`, `division_phone`, `division_email`, `division_order`, `division_about`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, 'BARIDIV1', 'Dhaka', '101', '01558755441', 'ashish021@gmail.com', 1, 'Test Division', '2013-09-30 17:53:34', 1, '2013-10-11 05:54:32', 1),
(3, 'BARIDIV0002', 'Rajshahi', '202', '01714532345', 'test2@yahoo.com', 1, 'test division', '2013-10-01 15:39:49', 1, '2013-10-11 05:54:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_grade_point_informations`
--

CREATE TABLE `rmis_grade_point_informations` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `lower_range` float NOT NULL,
  `upper_range` float NOT NULL,
  `letter_grade` varchar(10) NOT NULL,
  `grade_point` float NOT NULL,
  `qualitative_status` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `grading_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `rmis_grade_point_informations`
--

INSERT INTO `rmis_grade_point_informations` (`id`, `lower_range`, `upper_range`, `letter_grade`, `grade_point`, `qualitative_status`, `description`, `grading_id`) VALUES
(3, 90, 100, 'A+', 5, 'Highly Qualitative', 'Highly Qualititative Research Work', 1),
(4, 80, 90, 'A', 4.75, 'Qualitative', 'Qualitative Research Work', 1),
(5, 70, 80, 'A-', 4.5, 'Good', 'Good Work', 1),
(6, 60, 70, 'B+', 4.25, 'Average', 'Average research work', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_gradings`
--

CREATE TABLE `rmis_gradings` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `grading_title` varchar(255) NOT NULL,
  `effect_date` date NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rmis_gradings`
--

INSERT INTO `rmis_gradings` (`id`, `grading_title`, `effect_date`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, 'Test Grade', '2013-10-19', '2013-10-19 20:01:09', 1, '2013-10-19 14:02:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_implementation_sites`
--

CREATE TABLE `rmis_implementation_sites` (
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
(2, 'BARIIMS0001', 'Dhaka', '101', '01779021581', 'ashish021@gmail.com', 1, '2013-09-30 18:37:51', 1, '2013-09-30 18:37:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_institutes`
--

CREATE TABLE `rmis_institutes` (
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
-- Table structure for table `rmis_program_areas`
--

CREATE TABLE `rmis_program_areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `program_area_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `program_area_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `program_area_order` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`program_area_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `rmis_program_areas`
--

INSERT INTO `rmis_program_areas` (`id`, `program_area_id`, `program_area_name`, `program_area_order`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(2, 'BARIPA0001', 'Dhaka', 1, '2013-09-30 18:50:48', 1, '2013-09-30 12:50:48', NULL),
(3, 'BARIPA0003', 'Khulna', 1, '2013-10-01 15:40:27', 1, '2013-10-01 09:40:27', NULL),
(4, 'BARIPA0004', 'Chittagong', 1, '2013-10-01 15:40:37', 1, '2013-10-01 09:40:37', NULL),
(5, 'BARIPA0005', 'Rajshahi', 1, '2013-10-01 15:40:47', 1, '2013-10-01 09:40:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_implementation_committees`
--

CREATE TABLE `rmis_program_implementation_committees` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `committee_formation_date` datetime NOT NULL,
  `program_id` bigint(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_implementation_committee_members`
--

CREATE TABLE `rmis_program_implementation_committee_members` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `committee_member_type` varchar(255) DEFAULT NULL,
  `member_name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `committee_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_informations`
--

CREATE TABLE `rmis_program_informations` (
  `program_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `created_by` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_by` bigint(20) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`program_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rmis_program_informations`
--

INSERT INTO `rmis_program_informations` (`program_id`, `research_program_title`, `program_area`, `program_division`, `program_researchType`, `program_researchPriority`, `program_researchStatus`, `program_coordinator`, `program_coordinatorDesignation`, `is_collaborate`, `program_instituteNames`, `program_departmentName`, `program_regionalStationName`, `program_implementationLocation`, `program_keywords`, `program_commodities`, `program_aezs`, `program_plannedStartDate`, `program_plannedEndDate`, `program_initiationDate`, `program_completionDate`, `program_plannedBudget`, `program_approvedBudget`, `program_goal`, `program_objective`, `program_expectedOutputs`, `created_by`, `created_at`, `modified_by`, `modified_at`) VALUES
(1, 'Test program title', 'BARIPA0003', 'BARIDIV0002', 1, 2, 2, 202, 'Vice President', '1', '1,3', 2, 'BARIRS0001', 'BARIIMS0001', 'Dhaka, Chittagong', '1,5', '3,5,6', '2013-10-23', '2013-10-31', '2013-10-23', '2013-10-31', '10000000', '10000000', 'Test program goal', 'Test program purpose', 'test program expected output 1---##########---test program expected output 2', 1, '2013-10-22 20:40:27', 0, '2013-10-22 18:40:27');

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_me_committees`
--

CREATE TABLE `rmis_program_me_committees` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `committee_chairman` bigint(20) NOT NULL,
  `committee_formation_date` date NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rmis_program_me_committees`
--

INSERT INTO `rmis_program_me_committees` (`id`, `committee_chairman`, `committee_formation_date`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, 202, '2013-10-19', '2013-10-19 19:58:55', 1, '2013-10-19 13:59:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_me_committee_members`
--

CREATE TABLE `rmis_program_me_committee_members` (
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
(1, 123, 'Programer', 'Manage the full system');

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_other_informations`
--

CREATE TABLE `rmis_program_other_informations` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
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
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` bigint(20) DEFAULT NULL,
  `program_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rmis_program_other_informations`
--

INSERT INTO `rmis_program_other_informations` (`id`, `program_rationale`, `program_methodology`, `program_background`, `program_socio_economical_impact`, `program_environmental_impact`, `program_targeted_beneficiary`, `program_reference`, `program_external_affiliation`, `program_organization_policy`, `program_risks`, `created_at`, `created_by`, `modified_at`, `modified_by`, `program_id`) VALUES
(1, 'Test data', 'Test data', 'Test data', 'Test data', 'Test data', 'Test data', 'Test data', 'Test data', 'Test data', 'Test data', '2013-10-22 20:58:33', 1, '2013-10-22 18:58:33', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_research_teams`
--

CREATE TABLE `rmis_program_research_teams` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `team_formation_date` datetime NOT NULL,
  `program_id` bigint(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_research_team_members`
--

CREATE TABLE `rmis_program_research_team_members` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `member_type` varchar(255) DEFAULT NULL,
  `institute_name` varchar(255) DEFAULT NULL,
  `member_name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `team_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_steering_committees`
--

CREATE TABLE `rmis_program_steering_committees` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `committee_formation_date` datetime NOT NULL,
  `program_id` bigint(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rmis_program_steering_committee_members`
--

CREATE TABLE `rmis_program_steering_committee_members` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `committee_member_type` varchar(255) DEFAULT NULL,
  `member_name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `committee_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rmis_regional_stations`
--

CREATE TABLE `rmis_regional_stations` (
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

INSERT INTO `rmis_regional_stations` (`id`, `station_id`, `station_name`, `station_contact_person`, `station_phone`, `station_email`, `station_order`, `station_address`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, 'BARIRS0001', 'Tangail', 'Alimul Razi', '01716463156', 'alimulrazi28@gmail.com', 1, 'This is a test data', '2013-10-02 05:22:22', 1, '2013-10-02 05:22:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_research_priorities`
--

CREATE TABLE `rmis_research_priorities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `research_priority` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(4) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `rmis_research_priorities`
--

INSERT INTO `rmis_research_priorities` (`id`, `research_priority`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, '1st', 1, '0000-00-00 00:00:00', NULL, '2013-10-11 19:54:32', NULL),
(2, '2nd', 1, '0000-00-00 00:00:00', NULL, '2013-10-11 19:54:32', NULL),
(3, '3rd', 1, '0000-00-00 00:00:00', NULL, '2013-10-11 19:54:57', NULL),
(4, '4th', 1, '0000-00-00 00:00:00', NULL, '2013-10-11 19:54:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_research_statuses`
--

CREATE TABLE `rmis_research_statuses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `research_status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(4) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `rmis_research_statuses`
--

INSERT INTO `rmis_research_statuses` (`id`, `research_status`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'New', 1, '0000-00-00 00:00:00', NULL, '2013-10-11 19:53:41', NULL),
(2, 'On-Going', 1, '0000-00-00 00:00:00', NULL, '2013-10-11 19:53:41', NULL),
(3, 'Completed', 1, '0000-00-00 00:00:00', NULL, '2013-10-11 19:54:01', NULL),
(4, 'Stop', 1, '0000-00-00 00:00:00', NULL, '2013-10-11 19:54:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rmis_research_types`
--

CREATE TABLE `rmis_research_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `research_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(4) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rmis_research_types`
--

INSERT INTO `rmis_research_types` (`id`, `research_type`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Basic', 1, '0000-00-00 00:00:00', NULL, '2013-10-11 19:52:47', NULL),
(2, 'Strategic', 1, '0000-00-00 00:00:00', NULL, '2013-10-11 19:52:47', NULL),
(3, 'Impact Study', 1, '0000-00-00 00:00:00', NULL, '2013-10-11 19:53:02', NULL);
