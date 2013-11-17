-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 17, 2013 at 06:09 AM
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
-- Table structure for table `imis_indent_information_setup`
--

CREATE TABLE IF NOT EXISTS `imis_indent_information_setup` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `name_of_store` bigint(20) NOT NULL,
  `financial_year` bigint(20) DEFAULT NULL,
  `indent_ref_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `project_name` bigint(20) DEFAULT NULL,
  `indent_to` bigint(20) NOT NULL,
  `date_of_indent` date NOT NULL,
  `indent_request_by` bigint(20) NOT NULL,
  `remarks` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('approved','to_be_approved','not_approved') COLLATE utf8_unicode_ci DEFAULT 'to_be_approved',
  `final_status` enum('to_be_approved','approved','not_approved') COLLATE utf8_unicode_ci DEFAULT NULL,
  `approve_by` bigint(20) DEFAULT NULL,
  `final_remarks` text COLLATE utf8_unicode_ci,
  `approve_date` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `imis_indent_information_setup`
--

INSERT INTO `imis_indent_information_setup` (`id`, `organization_id`, `name_of_store`, `financial_year`, `indent_ref_no`, `project_name`, `indent_to`, `date_of_indent`, `indent_request_by`, `remarks`, `status`, `final_status`, `approve_by`, `final_remarks`, `approve_date`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(2, 1, 1, 1, '54488', 2, 1, '2013-10-24', 2, 'dzvacvxzxcvzxcvzxvz                                                                                                                    ', 'approved', 'approved', 1, 'Maruf                                                         ', '0000-00-00 00:00:00', '2013-10-02 06:12:56', 6, '2013-10-29 08:40:49', 6),
(3, 1, 4, 1, '123', 3, 11, '2013-10-28', 1, ' \r\n                              NA', 'to_be_approved', NULL, NULL, NULL, NULL, '2013-10-28 06:05:13', 6, '2013-11-14 05:13:05', 6),
(10, 1, 3, 1, '4321', 3, 11, '2013-10-23', 1, '                                        fadsf                            ', 'to_be_approved', NULL, NULL, NULL, NULL, '2013-10-29 10:00:58', 6, '0000-00-00 00:00:00', NULL),
(11, 1, 1, 1, '234443', 3, 2, '2013-11-21', 2, ' asdfasdfasdf asdf\r\n                            ', 'to_be_approved', 'approved', 11, 'fadsf', '2013-11-14 00:00:00', '2013-11-07 11:21:49', 6, '2013-11-12 05:08:48', 6),
(16, 1, 1, 1, '34534', 2, 3, '0000-00-00', 11, 'sdfsdf', 'to_be_approved', NULL, NULL, NULL, NULL, '2013-11-15 12:06:24', 1, '0000-00-00 00:00:00', NULL),
(17, 1, 1, 1, '34534', 2, 3, '0000-00-00', 11, 'sdfsdf', 'to_be_approved', NULL, NULL, NULL, NULL, '2013-11-15 12:07:53', 1, '0000-00-00 00:00:00', NULL),
(18, 1, 1, 1, '34534', 2, 3, '0000-00-00', 11, 'test remarks', 'to_be_approved', NULL, NULL, NULL, NULL, '2013-11-16 09:37:41', 1, '0000-00-00 00:00:00', NULL),
(19, 1, 1, 1, '34534', 2, 3, '0000-00-00', 11, 'test remarks', 'to_be_approved', NULL, NULL, NULL, NULL, '2013-11-16 09:38:21', 1, '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `imis_indent_information_setup_details`
--

CREATE TABLE IF NOT EXISTS `imis_indent_information_setup_details` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `name_of_item` bigint(20) NOT NULL,
  `descriptio_of_item` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `indent_quantity` int(8) NOT NULL,
  `UOM` int(8) DEFAULT NULL,
  `unit_price` double NOT NULL,
  `indent_information_setup` bigint(20) NOT NULL,
  `approve_quantity` int(8) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=52 ;

--
-- Dumping data for table `imis_indent_information_setup_details`
--

INSERT INTO `imis_indent_information_setup_details` (`id`, `organization_id`, `name_of_item`, `descriptio_of_item`, `indent_quantity`, `UOM`, `unit_price`, `indent_information_setup`, `approve_quantity`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(25, 1, 4, '88', 88, 0, 98, 2, NULL, '2013-10-29 08:40:49', 6, '0000-00-00 00:00:00', NULL),
(33, 1, 6, 'fadsf', 23, 0, 32, 10, NULL, '2013-10-29 10:00:58', 6, '0000-00-00 00:00:00', NULL),
(38, 1, 6, 'a                                                               ', 333, NULL, 2, 3, NULL, '2013-11-07 13:08:37', 6, '2013-11-12 06:53:38', 6),
(42, 1, 6, '   12332                     ', 435, NULL, 234, 11, 34, '2013-11-12 05:08:48', 6, '0000-00-00 00:00:00', NULL),
(43, 1, 7, ' SFSD                       ', 34, NULL, 43, 11, 43, '2013-11-12 05:08:48', 6, '0000-00-00 00:00:00', NULL),
(48, 1, 4, ' adfasd\r\n                                ', 454, NULL, 54, 3, NULL, '2013-11-12 04:42:16', 6, '2013-11-12 05:07:57', 6),
(51, 1, 6, 'aa                        ', 34, NULL, 43, 3, NULL, '2013-11-12 06:53:55', 6, '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `imis_store_setup`
--

CREATE TABLE IF NOT EXISTS `imis_store_setup` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `store_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `department_division_sectin_region` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chif_of_incharge` bigint(20) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `imis_store_setup`
--

INSERT INTO `imis_store_setup` (`id`, `organization_id`, `store_name`, `department_division_sectin_region`, `chif_of_incharge`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(1, 1, 'Store of Cse', '1', 1, 6, '2013-09-29 10:11:08', '2013-10-30 06:59:06', 6),
(3, 1, 'Store Of EEE', '2', 1, 6, '2013-09-29 10:16:01', '2013-10-30 04:24:46', 6),
(4, 1, 'Store of Project1', '5', 2, 6, '2013-10-28 05:59:20', '0000-00-00 00:00:00', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
