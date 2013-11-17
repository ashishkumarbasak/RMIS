-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 10, 2013 at 10:20 AM
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
-- Table structure for table `rmis_monitoring_and_evaluation_type`
--

CREATE TABLE IF NOT EXISTS `rmis_monitoring_and_evaluation_type` (
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;