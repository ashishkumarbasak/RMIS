/*
SQLyog Enterprise - MySQL GUI v8.18 
MySQL - 5.5.19 : Database - natp_barc
*********************************************************************
*/ 

/*Table structure for table `hrm_organograms` */

DROP TABLE IF EXISTS `hrm_organograms`;

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
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;

/*Data for the table `hrm_organograms` */

LOCK TABLES `hrm_organograms` WRITE;

insert  into `hrm_organograms`(`id`,`organization_id`,`organogram_name`,`reports_to`,`organogram_type`,`origin_organization_id`,`is_active`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (1,1,'Finance - BARC',0,'Division',1,1,NULL,NULL,'2013-08-13 11:16:13',NULL);
insert  into `hrm_organograms`(`id`,`organization_id`,`organogram_name`,`reports_to`,`organogram_type`,`origin_organization_id`,`is_active`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (2,1,'Accounts- BARC ',0,'Division',1,1,NULL,NULL,'2013-08-13 11:17:00',NULL);
insert  into `hrm_organograms`(`id`,`organization_id`,`organogram_name`,`reports_to`,`organogram_type`,`origin_organization_id`,`is_active`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (3,1,'Finance Section - BARC',1,'Centre',0,1,NULL,NULL,'2013-08-13 11:17:32',NULL);
insert  into `hrm_organograms`(`id`,`organization_id`,`organogram_name`,`reports_to`,`organogram_type`,`origin_organization_id`,`is_active`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (5,1,'Finance sub-Centre - BARC',3,'Sub-Centre',0,1,NULL,NULL,'2013-08-13 11:21:22',NULL);
insert  into `hrm_organograms`(`id`,`organization_id`,`organogram_name`,`reports_to`,`organogram_type`,`origin_organization_id`,`is_active`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (6,1,'F-SRD1',0,'Regional Office/Lab',2,NULL,NULL,NULL,'2013-08-13 11:24:05',NULL);
insert  into `hrm_organograms`(`id`,`organization_id`,`organogram_name`,`reports_to`,`organogram_type`,`origin_organization_id`,`is_active`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (7,1,'A-SRD1',0,'Regional Office/Lab',2,NULL,NULL,NULL,'2013-08-13 11:24:34',NULL);
insert  into `hrm_organograms`(`id`,`organization_id`,`organogram_name`,`reports_to`,`organogram_type`,`origin_organization_id`,`is_active`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (8,1,'F Centre- SRD1',6,'Centre',0,NULL,NULL,NULL,'2013-08-13 11:25:27',NULL);
insert  into `hrm_organograms`(`id`,`organization_id`,`organogram_name`,`reports_to`,`organogram_type`,`origin_organization_id`,`is_active`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (9,1,'A Centre - SRD1',7,'Centre',0,NULL,NULL,NULL,'2013-08-13 11:25:58',NULL);
insert  into `hrm_organograms`(`id`,`organization_id`,`organogram_name`,`reports_to`,`organogram_type`,`origin_organization_id`,`is_active`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (10,20,'Marketing',0,'Division',1,NULL,'2013-08-19 13:09:37',200,'2013-08-19 13:30:27',200);
insert  into `hrm_organograms`(`id`,`organization_id`,`organogram_name`,`reports_to`,`organogram_type`,`origin_organization_id`,`is_active`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (16,20,'sub centre mark',10,'Sub-Centre',0,NULL,'2013-08-19 14:06:32',200,'2013-08-19 14:06:32',NULL);
insert  into `hrm_organograms`(`id`,`organization_id`,`organogram_name`,`reports_to`,`organogram_type`,`origin_organization_id`,`is_active`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (18,20,'test 212dfdsaf ',10,'Division',0,NULL,'2013-08-19 14:12:22',200,'2013-08-20 10:31:46',200);
insert  into `hrm_organograms`(`id`,`organization_id`,`organogram_name`,`reports_to`,`organogram_type`,`origin_organization_id`,`is_active`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (48,20,'ddd dd 333',10,'Section',0,NULL,'2013-08-19 18:36:23',200,'2013-08-19 19:42:47',200);
insert  into `hrm_organograms`(`id`,`organization_id`,`organogram_name`,`reports_to`,`organogram_type`,`origin_organization_id`,`is_active`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (61,20,'test123',48,'District Office',0,NULL,'2013-08-19 19:17:34',200,'2013-08-19 19:17:34',NULL);
insert  into `hrm_organograms`(`id`,`organization_id`,`organogram_name`,`reports_to`,`organogram_type`,`origin_organization_id`,`is_active`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (62,20,'dfsdfsad 123',48,'District Office',0,NULL,'2013-08-19 19:22:06',200,'2013-08-19 19:22:06',NULL);
insert  into `hrm_organograms`(`id`,`organization_id`,`organogram_name`,`reports_to`,`organogram_type`,`origin_organization_id`,`is_active`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (63,20,'sdfsd',48,'Unit',0,NULL,'2013-08-19 19:22:50',200,'2013-08-19 19:43:52',200);
insert  into `hrm_organograms`(`id`,`organization_id`,`organogram_name`,`reports_to`,`organogram_type`,`origin_organization_id`,`is_active`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (64,20,'OK..',18,'Sub-Centre',0,NULL,'2013-08-20 10:17:27',200,'2013-08-20 10:17:27',NULL);
insert  into `hrm_organograms`(`id`,`organization_id`,`organogram_name`,`reports_to`,`organogram_type`,`origin_organization_id`,`is_active`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (65,20,'testdd 11',18,'Division',0,NULL,'2013-08-20 10:25:16',200,'2013-08-20 10:25:16',NULL);
insert  into `hrm_organograms`(`id`,`organization_id`,`organogram_name`,`reports_to`,`organogram_type`,`origin_organization_id`,`is_active`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (66,20,'dsfasdfas',18,'District Office',0,NULL,'2013-08-20 10:25:35',200,'2013-08-20 10:25:35',NULL);
insert  into `hrm_organograms`(`id`,`organization_id`,`organogram_name`,`reports_to`,`organogram_type`,`origin_organization_id`,`is_active`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (67,20,'ok123',18,'Wing',0,NULL,'2013-08-20 10:27:38',200,'2013-08-20 10:27:38',NULL);
insert  into `hrm_organograms`(`id`,`organization_id`,`organogram_name`,`reports_to`,`organogram_type`,`origin_organization_id`,`is_active`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (68,20,'test133 123',10,'Wing',0,NULL,'2013-08-20 10:29:54',200,'2013-08-20 10:42:11',200);
insert  into `hrm_organograms`(`id`,`organization_id`,`organogram_name`,`reports_to`,`organogram_type`,`origin_organization_id`,`is_active`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (69,20,'1212',68,'Unit',0,NULL,'2013-08-22 18:13:18',200,'2013-08-22 18:13:18',NULL);
insert  into `hrm_organograms`(`id`,`organization_id`,`organogram_name`,`reports_to`,`organogram_type`,`origin_organization_id`,`is_active`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (70,20,'jggj',0,'Division',1,NULL,'2013-08-26 17:16:50',200,'2013-08-26 17:13:24',NULL);
insert  into `hrm_organograms`(`id`,`organization_id`,`organogram_name`,`reports_to`,`organogram_type`,`origin_organization_id`,`is_active`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (71,20,'jg',1,'Wing',0,NULL,'2013-08-26 17:17:09',200,'2013-08-26 17:13:42',NULL);

UNLOCK TABLES;

/*Table structure for table `region` */

DROP TABLE IF EXISTS `region`;

CREATE TABLE `region` (
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `region` */

LOCK TABLES `region` WRITE;

insert  into `region`(`id`,`organization_id`,`value`,`name`,`weight`,`is_default`,`is_active`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (1,0,'1','Dhaka',1,'no',1,'0000-00-00 00:00:00',NULL,'2013-09-25 11:48:02',NULL);
insert  into `region`(`id`,`organization_id`,`value`,`name`,`weight`,`is_default`,`is_active`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (2,1,'2','Gazipur',2,'no',1,'0000-00-00 00:00:00',NULL,'2013-09-25 11:48:19',NULL);

UNLOCK TABLES;
