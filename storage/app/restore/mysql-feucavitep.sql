
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
DROP TABLE IF EXISTS `ac_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ac_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acgroup_id` int(11) NOT NULL,
  `acgroup_name` varchar(64) DEFAULT NULL,
  `acgroup_holidayValid` tinyint(1) DEFAULT NULL,
  `acgroup_verifystytle` int(11) DEFAULT NULL,
  `timezone1` int(11) DEFAULT NULL,
  `timezone2` int(11) DEFAULT NULL,
  `timezone3` int(11) DEFAULT NULL,
  `terminal_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `acgroup_id` (`acgroup_id`,`terminal_id`),
  KEY `timezone1` (`timezone1`),
  KEY `timezone2` (`timezone2`),
  KEY `timezone3` (`timezone3`),
  KEY `terminal_id` (`terminal_id`),
  CONSTRAINT `FK_GroupTerminal` FOREIGN KEY (`terminal_id`) REFERENCES `att_terminal` (`id`),
  CONSTRAINT `FK_GroupTimezone1` FOREIGN KEY (`timezone1`) REFERENCES `ac_timezone` (`timezone_id`),
  CONSTRAINT `FK_GroupTimezone2` FOREIGN KEY (`timezone2`) REFERENCES `ac_timezone` (`timezone_id`),
  CONSTRAINT `FK_GroupTimezone3` FOREIGN KEY (`timezone3`) REFERENCES `ac_timezone` (`timezone_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `ac_group` WRITE;
/*!40000 ALTER TABLE `ac_group` DISABLE KEYS */;
INSERT INTO `ac_group` VALUES (1,1,'Group1',0,0,NULL,NULL,NULL,1),(2,2,'Group2',0,0,NULL,NULL,NULL,1),(3,3,'Group3',0,0,NULL,NULL,NULL,1),(4,4,'Group4',0,0,NULL,NULL,NULL,1),(5,5,'Group5',0,0,NULL,NULL,NULL,1);
/*!40000 ALTER TABLE `ac_group` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `ac_holidaysetting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ac_holidaysetting` (
  `holiday_id` int(11) NOT NULL,
  `holiday_name` varchar(64) DEFAULT NULL,
  `holiday_start` datetime DEFAULT NULL,
  `holiday_end` datetime DEFAULT NULL,
  `acTimezoneId` int(11) DEFAULT NULL,
  PRIMARY KEY (`holiday_id`),
  KEY `acTimezoneId` (`acTimezoneId`),
  CONSTRAINT `FK_HolidayTimezone` FOREIGN KEY (`acTimezoneId`) REFERENCES `ac_timezone` (`timezone_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `ac_holidaysetting` WRITE;
/*!40000 ALTER TABLE `ac_holidaysetting` DISABLE KEYS */;
/*!40000 ALTER TABLE `ac_holidaysetting` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `ac_timezone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ac_timezone` (
  `timezone_id` int(11) NOT NULL,
  `timezone_name` varchar(64) DEFAULT NULL,
  `timezone_SunStart` datetime DEFAULT NULL,
  `timezone_SunEnd` datetime DEFAULT NULL,
  `timezone_MonStart` datetime DEFAULT NULL,
  `timezone_MonEnd` datetime DEFAULT NULL,
  `timezone_TuesStart` datetime DEFAULT NULL,
  `timezone_TuesEnd` datetime DEFAULT NULL,
  `timezone_WedStart` datetime DEFAULT NULL,
  `timezone_WedEnd` datetime DEFAULT NULL,
  `timezone_ThursStart` datetime DEFAULT NULL,
  `timezone_ThursEnd` datetime DEFAULT NULL,
  `timezone_FriStart` datetime DEFAULT NULL,
  `timezone_FriEnd` datetime DEFAULT NULL,
  `timezone_SatStart` datetime DEFAULT NULL,
  `timezone_SatEnd` datetime DEFAULT NULL,
  PRIMARY KEY (`timezone_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `ac_timezone` WRITE;
/*!40000 ALTER TABLE `ac_timezone` DISABLE KEYS */;
/*!40000 ALTER TABLE `ac_timezone` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `ac_unlockcomb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ac_unlockcomb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unlockComb_id` int(11) NOT NULL,
  `unlockComb_name` varchar(64) DEFAULT NULL,
  `acgroup1` int(11) DEFAULT NULL,
  `acgroup2` int(11) DEFAULT NULL,
  `acgroup3` int(11) DEFAULT NULL,
  `acgroup4` int(11) DEFAULT NULL,
  `acgroup5` int(11) DEFAULT NULL,
  `terminal_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unlockComb_id` (`unlockComb_id`,`terminal_id`),
  KEY `acgroup1` (`acgroup1`),
  KEY `acgroup2` (`acgroup2`),
  KEY `acgroup3` (`acgroup3`),
  KEY `acgroup4` (`acgroup4`),
  KEY `acgroup5` (`acgroup5`),
  KEY `terminal_id` (`terminal_id`),
  CONSTRAINT `FK_UnlockCombGroup1` FOREIGN KEY (`acgroup1`) REFERENCES `ac_group` (`id`),
  CONSTRAINT `FK_UnlockCombGroup2` FOREIGN KEY (`acgroup2`) REFERENCES `ac_group` (`id`),
  CONSTRAINT `FK_UnlockCombGroup3` FOREIGN KEY (`acgroup3`) REFERENCES `ac_group` (`id`),
  CONSTRAINT `FK_UnlockCombGroup4` FOREIGN KEY (`acgroup4`) REFERENCES `ac_group` (`id`),
  CONSTRAINT `FK_UnlockCombGroup5` FOREIGN KEY (`acgroup5`) REFERENCES `ac_group` (`id`),
  CONSTRAINT `FK_UnlockCombTerminal` FOREIGN KEY (`terminal_id`) REFERENCES `att_terminal` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `ac_unlockcomb` WRITE;
/*!40000 ALTER TABLE `ac_unlockcomb` DISABLE KEYS */;
INSERT INTO `ac_unlockcomb` VALUES (1,1,'Combination1',1,NULL,NULL,NULL,NULL,1),(2,2,'Combination2',NULL,NULL,NULL,NULL,NULL,1),(3,3,'Combination3',NULL,NULL,NULL,NULL,NULL,1),(4,4,'Combination4',NULL,NULL,NULL,NULL,NULL,1),(5,5,'Combination5',NULL,NULL,NULL,NULL,NULL,1),(6,6,'Combination6',NULL,NULL,NULL,NULL,NULL,1),(7,7,'Combination7',NULL,NULL,NULL,NULL,NULL,1),(8,8,'Combination8',NULL,NULL,NULL,NULL,NULL,1),(9,9,'Combination9',NULL,NULL,NULL,NULL,NULL,1),(10,10,'Combination10',NULL,NULL,NULL,NULL,NULL,1);
/*!40000 ALTER TABLE `ac_unlockcomb` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `ac_userprivilege`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ac_userprivilege` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isUserGroup` tinyint(1) DEFAULT NULL,
  `verifystytle` int(11) DEFAULT NULL,
  `disable` tinyint(1) DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  `terminal_id` int(11) NOT NULL,
  `timezone1` int(11) DEFAULT NULL,
  `timezone2` int(11) DEFAULT NULL,
  `timezone3` int(11) DEFAULT NULL,
  `acgroup_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employee_id` (`employee_id`,`terminal_id`),
  KEY `employee_id_2` (`employee_id`),
  KEY `terminal_id` (`terminal_id`),
  KEY `timezone1` (`timezone1`),
  KEY `timezone2` (`timezone2`),
  KEY `timezone3` (`timezone3`),
  KEY `acgroup_id` (`acgroup_id`),
  CONSTRAINT `FK_PrivilegeEmployee` FOREIGN KEY (`employee_id`) REFERENCES `hr_employee` (`id`),
  CONSTRAINT `FK_PrivilegeGroup` FOREIGN KEY (`acgroup_id`) REFERENCES `ac_group` (`id`),
  CONSTRAINT `FK_PrivilegeTerminal` FOREIGN KEY (`terminal_id`) REFERENCES `att_terminal` (`id`),
  CONSTRAINT `FK_PrivilegeTimezone1` FOREIGN KEY (`timezone1`) REFERENCES `ac_timezone` (`timezone_id`),
  CONSTRAINT `FK_PrivilegeTimezone2` FOREIGN KEY (`timezone2`) REFERENCES `ac_timezone` (`timezone_id`),
  CONSTRAINT `FK_PrivilegeTimezone3` FOREIGN KEY (`timezone3`) REFERENCES `ac_timezone` (`timezone_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `ac_userprivilege` WRITE;
/*!40000 ALTER TABLE `ac_userprivilege` DISABLE KEYS */;
/*!40000 ALTER TABLE `ac_userprivilege` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `addemployee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addemployee` (
  `add_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost_center` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sss_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `philhealth_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pagibig_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tin_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bpi_account` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` double(8,2) DEFAULT NULL,
  `daily_rate` double(8,2) DEFAULT NULL,
  `rate_per_hour` double(8,2) DEFAULT NULL,
  `rate_per_hour_old` double(8,2) DEFAULT NULL,
  `mins` double(8,2) DEFAULT NULL,
  `basic` double(8,2) DEFAULT NULL,
  `emolument` double(8,2) DEFAULT NULL,
  `total_basic_salary` double(8,2) DEFAULT NULL,
  `load_units` double(8,2) DEFAULT NULL,
  `laboratory_units` double(8,2) DEFAULT NULL,
  `laboratory_hours` double(8,2) DEFAULT NULL,
  `total_hours` double(8,2) DEFAULT NULL,
  `overload` double(8,2) DEFAULT NULL,
  PRIMARY KEY (`add_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `addemployee` WRITE;
/*!40000 ALTER TABLE `addemployee` DISABLE KEYS */;
/*!40000 ALTER TABLE `addemployee` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `anfpayroll`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anfpayroll` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `dates` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paydate` date NOT NULL,
  `admin_approvals` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `anfpayroll` WRITE;
/*!40000 ALTER TABLE `anfpayroll` DISABLE KEYS */;
/*!40000 ALTER TABLE `anfpayroll` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `anfsd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anfsd` (
  `anfsd_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` int(11) NOT NULL,
  `daily_rate` int(11) NOT NULL,
  `rate_per_hour` int(11) NOT NULL,
  `mins` int(11) NOT NULL,
  `basic` int(11) NOT NULL,
  `emolument` int(11) NOT NULL,
  `total_basic_salary` int(11) NOT NULL,
  `less_absence` int(11) NOT NULL,
  `recordsFrom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recordsTo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_basic_pay` int(11) DEFAULT NULL,
  `p_absences` int(11) DEFAULT NULL,
  `p_adjustment` int(11) DEFAULT NULL,
  `p_net_basic` int(11) DEFAULT NULL,
  `p_cost_of_living_allowance` int(11) DEFAULT NULL,
  `p_honorarium` int(11) DEFAULT NULL,
  `p_overtime` int(11) DEFAULT NULL,
  `p_over_load` int(11) DEFAULT NULL,
  `p_others` int(11) DEFAULT NULL,
  `p_hold_salary_pay_out` int(11) DEFAULT NULL,
  `p_total_earnings` int(11) DEFAULT NULL,
  `p_sss_contribution` int(11) DEFAULT NULL,
  `p_philhealth_contribution` int(11) DEFAULT NULL,
  `p_pagibig_contribution` int(11) DEFAULT NULL,
  `p_sss_loan` int(11) DEFAULT NULL,
  `p_pagibig_loan` int(11) DEFAULT NULL,
  `p_tax_withheld` int(11) DEFAULT NULL,
  `p_cash_advance` int(11) DEFAULT NULL,
  `p_retirement_contributon` int(11) DEFAULT NULL,
  `p_christmas_loan` int(11) DEFAULT NULL,
  `p_retirement_loan` int(11) DEFAULT NULL,
  `p_others_adjustment` int(11) DEFAULT NULL,
  `p_others_payable_realty` int(11) DEFAULT NULL,
  `p_total_deductions` int(11) DEFAULT NULL,
  `p_first_half_pay` int(11) DEFAULT NULL,
  `p_second_half_pay` int(11) DEFAULT NULL,
  `p_monthly_pay` int(11) DEFAULT NULL,
  `p_thirteen_month_pay` int(11) DEFAULT NULL,
  `p_total_non_taxable` int(11) DEFAULT NULL,
  `p_taxable_income` int(11) DEFAULT NULL,
  `admin_approval` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_status_pay` tinyint(1) DEFAULT NULL,
  `second_status_pay` tinyint(1) DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`anfsd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `anfsd` WRITE;
/*!40000 ALTER TABLE `anfsd` DISABLE KEYS */;
/*!40000 ALTER TABLE `anfsd` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `att_break`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `att_break` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `break_name` varchar(64) DEFAULT NULL,
  `break_start` datetime NOT NULL,
  `break_end` datetime NOT NULL,
  `break_deductminute` int(11) DEFAULT NULL,
  `break_autodeduct` tinyint(1) DEFAULT NULL,
  `break_needcheck` tinyint(1) DEFAULT NULL,
  `break_advance` datetime DEFAULT NULL,
  `break_delay` datetime DEFAULT NULL,
  `break_ValidWorkTime` tinyint(1) DEFAULT NULL,
  `break_overcount` tinyint(1) DEFAULT NULL,
  `break_overcount_paycode` int(11) DEFAULT NULL,
  `break_overminutes` int(11) DEFAULT NULL,
  `break_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `att_break` WRITE;
/*!40000 ALTER TABLE `att_break` DISABLE KEYS */;
INSERT INTO `att_break` VALUES (1,'Lunch','2019-10-18 12:00:00','2019-10-18 13:00:00',60,1,0,'2019-10-18 12:00:00','2019-10-18 13:00:00',0,0,9,0,0),(2,'Morning break','2019-10-18 10:00:00','2019-10-18 10:30:00',30,1,0,'2019-10-18 10:00:00','2019-10-18 10:30:00',0,0,9,0,0),(3,'noon break','2019-10-18 15:00:00','2019-10-18 15:30:00',30,1,0,'2019-10-18 15:00:00','2019-10-18 15:30:00',0,0,9,0,0);
/*!40000 ALTER TABLE `att_break` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `att_break_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `att_break_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `breakout` datetime DEFAULT NULL,
  `breakin` datetime DEFAULT NULL,
  `minutes` int(11) DEFAULT NULL,
  `roundminutes` int(11) DEFAULT NULL,
  `remark` varchar(64) DEFAULT NULL,
  `ddetail_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ddetail_id` (`ddetail_id`),
  CONSTRAINT `FK_DayBreakDetail` FOREIGN KEY (`ddetail_id`) REFERENCES `att_day_details` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `att_break_details` WRITE;
/*!40000 ALTER TABLE `att_break_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `att_break_details` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `att_break_timetable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `att_break_timetable` (
  `break_id` int(11) NOT NULL,
  `timetable_id` int(11) NOT NULL,
  KEY `timetable_id` (`timetable_id`),
  KEY `break_id` (`break_id`),
  CONSTRAINT `FK_BreakTimetable` FOREIGN KEY (`break_id`) REFERENCES `att_break` (`id`),
  CONSTRAINT `FK_TimetableBreak` FOREIGN KEY (`timetable_id`) REFERENCES `att_timetable` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `att_break_timetable` WRITE;
/*!40000 ALTER TABLE `att_break_timetable` DISABLE KEYS */;
INSERT INTO `att_break_timetable` VALUES (1,1),(2,1),(3,1),(1,3),(1,5),(1,7),(1,9),(1,13),(2,13),(3,13);
/*!40000 ALTER TABLE `att_break_timetable` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `att_day_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `att_day_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `att_date` datetime NOT NULL,
  `timetable_id` int(11) DEFAULT NULL,
  `checkin` datetime DEFAULT NULL,
  `checkout` datetime DEFAULT NULL,
  `roundin` datetime DEFAULT NULL,
  `roundout` datetime DEFAULT NULL,
  `workedMinutes` int(11) DEFAULT NULL,
  `rworkedMinutes` int(11) DEFAULT NULL,
  `breakMinutes` int(11) DEFAULT NULL,
  `breakRealMinutes` int(11) DEFAULT NULL,
  `sortindex` int(11) NOT NULL,
  `iuser1` int(11) DEFAULT NULL,
  `iuser2` int(11) DEFAULT NULL,
  `iuser3` int(11) DEFAULT NULL,
  `cuser1` varchar(64) DEFAULT NULL,
  `cuser2` varchar(64) DEFAULT NULL,
  `cuser3` varchar(64) DEFAULT NULL,
  `remark` varchar(64) DEFAULT NULL,
  `wc` int(11) DEFAULT NULL,
  `workcode_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `workcode_id` (`workcode_id`),
  CONSTRAINT `FK5750ACFDB793422` FOREIGN KEY (`workcode_id`) REFERENCES `att_workcode` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `att_day_details` WRITE;
/*!40000 ALTER TABLE `att_day_details` DISABLE KEYS */;
INSERT INTO `att_day_details` VALUES (1,1,'2019-11-09 00:00:00',NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,NULL,NULL,NULL,NULL,0,NULL),(2,1,'2019-11-10 00:00:00',9,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,NULL,NULL,NULL,NULL,0,NULL),(3,1,'2019-11-11 00:00:00',10,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,NULL,NULL,NULL,NULL,0,NULL),(4,1,'2019-11-12 00:00:00',NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,NULL,NULL,NULL,NULL,0,NULL),(5,1,'2019-11-13 00:00:00',NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,NULL,NULL,NULL,NULL,0,NULL),(6,1,'2019-11-14 00:00:00',NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,NULL,NULL,NULL,NULL,0,NULL),(7,1,'2019-11-15 00:00:00',12,'2019-11-15 19:48:00','2019-11-15 20:19:00','2019-11-15 19:48:00','2019-11-15 20:19:00',31,31,0,0,0,0,0,0,NULL,NULL,NULL,NULL,0,NULL),(8,1,'2019-11-15 00:00:00',12,'2019-11-15 20:55:00','2019-11-15 23:09:00','2019-11-15 20:55:00','2019-11-15 23:09:00',134,134,0,0,0,0,0,0,NULL,NULL,NULL,NULL,0,NULL),(9,1,'2019-11-16 00:00:00',13,'2019-11-16 13:03:00','2019-11-16 14:22:00','2019-11-16 13:03:00','2019-11-16 14:22:00',79,79,0,0,0,0,0,0,NULL,NULL,NULL,NULL,0,NULL);
/*!40000 ALTER TABLE `att_day_details` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `att_day_summary`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `att_day_summary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `att_date` datetime NOT NULL,
  `item_results` decimal(19,5) DEFAULT NULL,
  `recordsFrom` datetime NOT NULL,
  `recordsTo` datetime NOT NULL,
  `iuser1` int(11) DEFAULT NULL,
  `iuser2` int(11) DEFAULT NULL,
  `iuser3` int(11) DEFAULT NULL,
  `cuser1` varchar(64) DEFAULT NULL,
  `cuser2` varchar(64) DEFAULT NULL,
  `cuser3` varchar(64) DEFAULT NULL,
  `remark` varchar(64) DEFAULT NULL,
  `dt_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `timetable_id` int(11) DEFAULT NULL,
  `paycode_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dt_id` (`dt_id`),
  KEY `item_id` (`item_id`),
  KEY `employee_id` (`employee_id`),
  KEY `timetable_id` (`timetable_id`),
  CONSTRAINT `FKF0203FAD11A89F65` FOREIGN KEY (`timetable_id`) REFERENCES `att_timetable` (`id`),
  CONSTRAINT `FKF0203FAD50F52429` FOREIGN KEY (`employee_id`) REFERENCES `hr_employee` (`id`),
  CONSTRAINT `FKF0203FAD7E0E749D` FOREIGN KEY (`dt_id`) REFERENCES `att_daytype` (`id`),
  CONSTRAINT `FKF0203FADFDF7A6A4` FOREIGN KEY (`item_id`) REFERENCES `att_statisticitem` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `att_day_summary` WRITE;
/*!40000 ALTER TABLE `att_day_summary` DISABLE KEYS */;
INSERT INTO `att_day_summary` VALUES (1,'2019-11-09 00:00:00',0.00000,'2019-11-09 00:00:00','2019-11-09 23:59:59',0,0,0,'','','','',3,1,1,NULL,0),(2,'2019-11-10 00:00:00',480.00000,'2019-11-10 07:00:00','2019-11-10 20:00:00',0,0,0,'','','','',4,1,1,9,0),(3,'2019-11-11 00:00:00',360.00000,'2019-11-11 10:00:00','2019-11-11 20:00:00',0,0,0,'','','','',4,1,1,10,0),(4,'2019-11-12 00:00:00',0.00000,'2019-11-12 00:00:00','2019-11-12 23:59:59',0,0,0,'','','','',3,1,1,NULL,0),(5,'2019-11-13 00:00:00',0.00000,'2019-11-13 00:00:00','2019-11-13 23:59:59',0,0,0,'','','','',3,1,1,NULL,0),(6,'2019-11-14 00:00:00',0.00000,'2019-11-14 00:00:00','2019-11-14 23:59:59',0,0,0,'','','','',3,1,1,NULL,0),(7,'2019-11-15 00:00:00',60.00000,'2019-11-15 19:00:00','2019-11-16 00:00:00',0,0,0,'','','','',4,1,1,12,0),(8,'2019-11-16 00:00:00',38.00000,'2019-11-16 12:22:00','2019-11-16 17:30:00',0,0,0,'','','','',4,1,1,13,0),(9,'2019-11-09 00:00:00',0.00000,'2019-11-09 00:00:00','2019-11-09 23:59:59',0,0,0,'','','','',3,2,1,NULL,0),(10,'2019-11-10 00:00:00',0.00000,'2019-11-10 07:00:00','2019-11-10 20:00:00',0,0,0,'','','','',4,2,1,9,0),(11,'2019-11-11 00:00:00',0.00000,'2019-11-11 10:00:00','2019-11-11 20:00:00',0,0,0,'','','','',4,2,1,10,0),(12,'2019-11-12 00:00:00',0.00000,'2019-11-12 00:00:00','2019-11-12 23:59:59',0,0,0,'','','','',3,2,1,NULL,0),(13,'2019-11-13 00:00:00',0.00000,'2019-11-13 00:00:00','2019-11-13 23:59:59',0,0,0,'','','','',3,2,1,NULL,0),(14,'2019-11-14 00:00:00',0.00000,'2019-11-14 00:00:00','2019-11-14 23:59:59',0,0,0,'','','','',3,2,1,NULL,0),(15,'2019-11-15 00:00:00',165.00000,'2019-11-15 19:00:00','2019-11-16 00:00:00',0,0,0,'','','','',4,2,1,12,0),(16,'2019-11-16 00:00:00',79.00000,'2019-11-16 12:22:00','2019-11-16 17:30:00',0,0,0,'','','','',4,2,1,13,0),(17,'2019-11-09 00:00:00',0.00000,'2019-11-09 00:00:00','2019-11-09 23:59:59',0,0,0,'','','','',3,3,1,NULL,0),(18,'2019-11-10 00:00:00',0.00000,'2019-11-10 07:00:00','2019-11-10 20:00:00',0,0,0,'','','','',4,3,1,9,0),(19,'2019-11-11 00:00:00',0.00000,'2019-11-11 10:00:00','2019-11-11 20:00:00',0,0,0,'','','','',4,3,1,10,0),(20,'2019-11-12 00:00:00',0.00000,'2019-11-12 00:00:00','2019-11-12 23:59:59',0,0,0,'','','','',3,3,1,NULL,0),(21,'2019-11-13 00:00:00',0.00000,'2019-11-13 00:00:00','2019-11-13 23:59:59',0,0,0,'','','','',3,3,1,NULL,0),(22,'2019-11-14 00:00:00',0.00000,'2019-11-14 00:00:00','2019-11-14 23:59:59',0,0,0,'','','','',3,3,1,NULL,0),(23,'2019-11-15 00:00:00',165.00000,'2019-11-15 19:00:00','2019-11-16 00:00:00',0,0,0,'','','','',4,3,1,12,0),(24,'2019-11-16 00:00:00',79.00000,'2019-11-16 12:22:00','2019-11-16 17:30:00',0,0,0,'','','','',4,3,1,13,0),(25,'2019-11-09 00:00:00',0.00000,'2019-11-09 00:00:00','2019-11-09 23:59:59',0,0,0,'','','','',3,4,1,NULL,0),(26,'2019-11-10 00:00:00',0.00000,'2019-11-10 07:00:00','2019-11-10 20:00:00',0,0,0,'','','','',4,4,1,9,0),(27,'2019-11-11 00:00:00',0.00000,'2019-11-11 10:00:00','2019-11-11 20:00:00',0,0,0,'','','','',4,4,1,10,0),(28,'2019-11-12 00:00:00',0.00000,'2019-11-12 00:00:00','2019-11-12 23:59:59',0,0,0,'','','','',3,4,1,NULL,0),(29,'2019-11-13 00:00:00',0.00000,'2019-11-13 00:00:00','2019-11-13 23:59:59',0,0,0,'','','','',3,4,1,NULL,0),(30,'2019-11-14 00:00:00',0.00000,'2019-11-14 00:00:00','2019-11-14 23:59:59',0,0,0,'','','','',3,4,1,NULL,0),(31,'2019-11-15 00:00:00',105.00000,'2019-11-15 19:00:00','2019-11-16 00:00:00',0,0,0,'','','','',4,4,1,12,0),(32,'2019-11-16 00:00:00',60.00000,'2019-11-16 12:22:00','2019-11-16 17:30:00',0,0,0,'','','','',4,4,1,13,0),(33,'2019-11-09 00:00:00',0.00000,'2019-11-09 00:00:00','2019-11-09 23:59:59',0,0,0,'','','','',3,5,1,NULL,0),(34,'2019-11-10 00:00:00',0.00000,'2019-11-10 07:00:00','2019-11-10 20:00:00',0,0,0,'','','','',4,5,1,9,0),(35,'2019-11-11 00:00:00',0.00000,'2019-11-11 10:00:00','2019-11-11 20:00:00',0,0,0,'','','','',4,5,1,10,0),(36,'2019-11-12 00:00:00',0.00000,'2019-11-12 00:00:00','2019-11-12 23:59:59',0,0,0,'','','','',3,5,1,NULL,0),(37,'2019-11-13 00:00:00',0.00000,'2019-11-13 00:00:00','2019-11-13 23:59:59',0,0,0,'','','','',3,5,1,NULL,0),(38,'2019-11-14 00:00:00',0.00000,'2019-11-14 00:00:00','2019-11-14 23:59:59',0,0,0,'','','','',3,5,1,NULL,0),(39,'2019-11-15 00:00:00',0.00000,'2019-11-15 19:00:00','2019-11-16 00:00:00',0,0,0,'','','','',4,5,1,12,0),(40,'2019-11-16 00:00:00',19.00000,'2019-11-16 12:22:00','2019-11-16 17:30:00',0,0,0,'','','','',4,5,1,13,0),(41,'2019-11-09 00:00:00',0.00000,'2019-11-09 00:00:00','2019-11-09 23:59:59',0,0,0,'','','','',3,6,1,NULL,0),(42,'2019-11-10 00:00:00',0.00000,'2019-11-10 07:00:00','2019-11-10 20:00:00',0,0,0,'','','','',4,6,1,9,0),(43,'2019-11-11 00:00:00',0.00000,'2019-11-11 10:00:00','2019-11-11 20:00:00',0,0,0,'','','','',4,6,1,10,0),(44,'2019-11-12 00:00:00',0.00000,'2019-11-12 00:00:00','2019-11-12 23:59:59',0,0,0,'','','','',3,6,1,NULL,0),(45,'2019-11-13 00:00:00',0.00000,'2019-11-13 00:00:00','2019-11-13 23:59:59',0,0,0,'','','','',3,6,1,NULL,0),(46,'2019-11-14 00:00:00',0.00000,'2019-11-14 00:00:00','2019-11-14 23:59:59',0,0,0,'','','','',3,6,1,NULL,0),(47,'2019-11-15 00:00:00',0.00000,'2019-11-15 19:00:00','2019-11-16 00:00:00',0,0,0,'','','','',4,6,1,12,0),(48,'2019-11-16 00:00:00',0.00000,'2019-11-16 12:22:00','2019-11-16 17:30:00',0,0,0,'','','','',4,6,1,13,0),(49,'2019-11-09 00:00:00',0.00000,'2019-11-09 00:00:00','2019-11-09 23:59:59',0,0,0,'','','','',3,7,1,NULL,0),(50,'2019-11-10 00:00:00',0.00000,'2019-11-10 07:00:00','2019-11-10 20:00:00',0,0,0,'','','','',4,7,1,9,0),(51,'2019-11-11 00:00:00',0.00000,'2019-11-11 10:00:00','2019-11-11 20:00:00',0,0,0,'','','','',4,7,1,10,0),(52,'2019-11-12 00:00:00',0.00000,'2019-11-12 00:00:00','2019-11-12 23:59:59',0,0,0,'','','','',3,7,1,NULL,0),(53,'2019-11-13 00:00:00',0.00000,'2019-11-13 00:00:00','2019-11-13 23:59:59',0,0,0,'','','','',3,7,1,NULL,0),(54,'2019-11-14 00:00:00',0.00000,'2019-11-14 00:00:00','2019-11-14 23:59:59',0,0,0,'','','','',3,7,1,NULL,0),(55,'2019-11-15 00:00:00',0.00000,'2019-11-15 19:00:00','2019-11-16 00:00:00',0,0,0,'','','','',4,7,1,12,0),(56,'2019-11-16 00:00:00',0.00000,'2019-11-16 12:22:00','2019-11-16 17:30:00',0,0,0,'','','','',4,7,1,13,0),(57,'2019-11-09 00:00:00',0.00000,'2019-11-09 00:00:00','2019-11-09 23:59:59',0,0,0,'','','','',3,8,1,NULL,0),(58,'2019-11-10 00:00:00',0.00000,'2019-11-10 07:00:00','2019-11-10 20:00:00',0,0,0,'','','','',4,8,1,9,0),(59,'2019-11-11 00:00:00',0.00000,'2019-11-11 10:00:00','2019-11-11 20:00:00',0,0,0,'','','','',4,8,1,10,0),(60,'2019-11-12 00:00:00',0.00000,'2019-11-12 00:00:00','2019-11-12 23:59:59',0,0,0,'','','','',3,8,1,NULL,0),(61,'2019-11-13 00:00:00',0.00000,'2019-11-13 00:00:00','2019-11-13 23:59:59',0,0,0,'','','','',3,8,1,NULL,0),(62,'2019-11-14 00:00:00',0.00000,'2019-11-14 00:00:00','2019-11-14 23:59:59',0,0,0,'','','','',3,8,1,NULL,0),(63,'2019-11-15 00:00:00',0.00000,'2019-11-15 19:00:00','2019-11-16 00:00:00',0,0,0,'','','','',4,8,1,12,0),(64,'2019-11-16 00:00:00',38.00000,'2019-11-16 12:22:00','2019-11-16 17:30:00',0,0,0,'','','','',4,8,1,13,0),(65,'2019-11-09 00:00:00',0.00000,'2019-11-09 00:00:00','2019-11-09 23:59:59',0,0,0,'','','','',3,9,1,NULL,0),(66,'2019-11-10 00:00:00',480.00000,'2019-11-10 07:00:00','2019-11-10 20:00:00',0,0,0,'','','','',4,9,1,9,0),(67,'2019-11-11 00:00:00',360.00000,'2019-11-11 10:00:00','2019-11-11 20:00:00',0,0,0,'','','','',4,9,1,10,0),(68,'2019-11-12 00:00:00',0.00000,'2019-11-12 00:00:00','2019-11-12 23:59:59',0,0,0,'','','','',3,9,1,NULL,0),(69,'2019-11-13 00:00:00',0.00000,'2019-11-13 00:00:00','2019-11-13 23:59:59',0,0,0,'','','','',3,9,1,NULL,0),(70,'2019-11-14 00:00:00',0.00000,'2019-11-14 00:00:00','2019-11-14 23:59:59',0,0,0,'','','','',3,9,1,NULL,0),(71,'2019-11-15 00:00:00',0.00000,'2019-11-15 19:00:00','2019-11-16 00:00:00',0,0,0,'','','','',4,9,1,12,0),(72,'2019-11-16 00:00:00',0.00000,'2019-11-16 12:22:00','2019-11-16 17:30:00',0,0,0,'','','','',4,9,1,13,0),(73,'2019-11-09 00:00:00',0.00000,'2019-11-09 00:00:00','2019-11-09 23:59:59',0,0,0,'','','','',3,10,1,NULL,0),(74,'2019-11-10 00:00:00',0.00000,'2019-11-10 07:00:00','2019-11-10 20:00:00',0,0,0,'','','','',4,10,1,9,0),(75,'2019-11-11 00:00:00',0.00000,'2019-11-11 10:00:00','2019-11-11 20:00:00',0,0,0,'','','','',4,10,1,10,0),(76,'2019-11-12 00:00:00',0.00000,'2019-11-12 00:00:00','2019-11-12 23:59:59',0,0,0,'','','','',3,10,1,NULL,0),(77,'2019-11-13 00:00:00',0.00000,'2019-11-13 00:00:00','2019-11-13 23:59:59',0,0,0,'','','','',3,10,1,NULL,0),(78,'2019-11-14 00:00:00',0.00000,'2019-11-14 00:00:00','2019-11-14 23:59:59',0,0,0,'','','','',3,10,1,NULL,0),(79,'2019-11-15 00:00:00',0.00000,'2019-11-15 19:00:00','2019-11-16 00:00:00',0,0,0,'','','','',4,10,1,12,0),(80,'2019-11-16 00:00:00',0.00000,'2019-11-16 12:22:00','2019-11-16 17:30:00',0,0,0,'','','','',4,10,1,13,0);
/*!40000 ALTER TABLE `att_day_summary` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `att_daytype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `att_daytype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dt_code` int(11) NOT NULL,
  `dt_desc` varchar(32) DEFAULT NULL,
  `export_code` varchar(32) DEFAULT NULL,
  `sign` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `att_daytype` WRITE;
/*!40000 ALTER TABLE `att_daytype` DISABLE KEYS */;
INSERT INTO `att_daytype` VALUES (1,0,'Unknown','','UN'),(2,1,'Weekend','','WK'),(3,2,'OffDuty','','OD'),(4,3,'NormalWork','','N'),(5,4,'Holiday','','H'),(6,5,'Leave','','L'),(7,6,'OverTime','','OT');
/*!40000 ALTER TABLE `att_daytype` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `att_department_shift`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `att_department_shift` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `startDate` datetime DEFAULT NULL,
  `endDate` datetime DEFAULT NULL,
  `department_id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `modifyDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `department_id` (`department_id`),
  KEY `shift_id` (`shift_id`),
  CONSTRAINT `FKF4135670114AA329` FOREIGN KEY (`shift_id`) REFERENCES `att_shift` (`id`),
  CONSTRAINT `FKF4135670CDB5DF20` FOREIGN KEY (`department_id`) REFERENCES `hr_department` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `att_department_shift` WRITE;
/*!40000 ALTER TABLE `att_department_shift` DISABLE KEYS */;
/*!40000 ALTER TABLE `att_department_shift` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `att_department_smartshift`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `att_department_smartshift` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `department_id` (`department_id`),
  KEY `shift_id` (`shift_id`),
  CONSTRAINT `FK7F8948B6114AA329` FOREIGN KEY (`shift_id`) REFERENCES `att_shift` (`id`),
  CONSTRAINT `FK7F8948B6CDB5DF20` FOREIGN KEY (`department_id`) REFERENCES `hr_department` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `att_department_smartshift` WRITE;
/*!40000 ALTER TABLE `att_department_smartshift` DISABLE KEYS */;
/*!40000 ALTER TABLE `att_department_smartshift` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `att_departmentleavetype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `att_departmentleavetype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dl_code` int(11) NOT NULL,
  `yearlyLimit` decimal(19,5) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `department_id` (`department_id`),
  CONSTRAINT `FKD5CD312CDB5DF20` FOREIGN KEY (`department_id`) REFERENCES `hr_department` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `att_departmentleavetype` WRITE;
/*!40000 ALTER TABLE `att_departmentleavetype` DISABLE KEYS */;
/*!40000 ALTER TABLE `att_departmentleavetype` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `att_employee_shift`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `att_employee_shift` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `startDate` datetime DEFAULT NULL,
  `endDate` datetime DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `modifyDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_id` (`employee_id`),
  KEY `shift_id` (`shift_id`),
  CONSTRAINT `FK416E74B1114AA329` FOREIGN KEY (`shift_id`) REFERENCES `att_shift` (`id`),
  CONSTRAINT `FK416E74B150F52429` FOREIGN KEY (`employee_id`) REFERENCES `hr_employee` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `att_employee_shift` WRITE;
/*!40000 ALTER TABLE `att_employee_shift` DISABLE KEYS */;
INSERT INTO `att_employee_shift` VALUES (1,'2019-11-02 00:00:00','2020-11-02 23:59:59',8,1,'2019-11-02 18:18:05'),(2,'2019-11-02 00:00:00','2020-11-02 23:59:59',2,2,'2019-11-02 18:18:18'),(3,'2019-11-02 00:00:00','2020-11-02 23:59:59',5,3,'2019-11-02 18:18:31'),(4,'2019-11-02 00:00:00','2020-11-02 23:59:59',4,4,'2019-11-02 18:43:11'),(5,'2019-11-02 00:00:00','2020-11-02 23:59:59',1,5,'2019-11-02 18:53:28'),(6,'2019-11-15 00:00:00','2019-11-15 23:59:59',6,1,'2019-11-15 19:43:51');
/*!40000 ALTER TABLE `att_employee_shift` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `att_employee_smartshift`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `att_employee_smartshift` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_id` (`employee_id`),
  KEY `shift_id` (`shift_id`),
  CONSTRAINT `FKD343B318114AA329` FOREIGN KEY (`shift_id`) REFERENCES `att_shift` (`id`),
  CONSTRAINT `FKD343B31850F52429` FOREIGN KEY (`employee_id`) REFERENCES `hr_employee` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `att_employee_smartshift` WRITE;
/*!40000 ALTER TABLE `att_employee_smartshift` DISABLE KEYS */;
/*!40000 ALTER TABLE `att_employee_smartshift` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `att_employee_temp_shift`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `att_employee_temp_shift` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schDate` datetime DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `dayTypeCode` int(11) NOT NULL,
  `timetable_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `paycode_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `schDate` (`schDate`,`employee_id`,`timetable_id`),
  KEY `employee_id` (`employee_id`),
  KEY `timetable_id` (`timetable_id`),
  KEY `item_id` (`item_id`),
  KEY `paycode_id` (`paycode_id`),
  CONSTRAINT `FKF1AE72E11A89F65` FOREIGN KEY (`timetable_id`) REFERENCES `att_timetable` (`id`),
  CONSTRAINT `FKF1AE72E50F52429` FOREIGN KEY (`employee_id`) REFERENCES `hr_employee` (`id`),
  CONSTRAINT `FKF1AE72E8FB14498` FOREIGN KEY (`paycode_id`) REFERENCES `hr_paycode` (`id`),
  CONSTRAINT `FKF1AE72EFDF7A6A4` FOREIGN KEY (`item_id`) REFERENCES `att_statisticitem` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `att_employee_temp_shift` WRITE;
/*!40000 ALTER TABLE `att_employee_temp_shift` DISABLE KEYS */;
/*!40000 ALTER TABLE `att_employee_temp_shift` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `att_employee_zone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `att_employee_zone` (
  `employee_id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL,
  KEY `zone_id` (`zone_id`),
  KEY `employee_id` (`employee_id`),
  CONSTRAINT `FK_EmployeeZone` FOREIGN KEY (`employee_id`) REFERENCES `hr_employee` (`id`),
  CONSTRAINT `FK_ZoneEmployee` FOREIGN KEY (`zone_id`) REFERENCES `att_zone` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `att_employee_zone` WRITE;
/*!40000 ALTER TABLE `att_employee_zone` DISABLE KEYS */;
INSERT INTO `att_employee_zone` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1);
/*!40000 ALTER TABLE `att_employee_zone` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `att_employeeleavetype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `att_employeeleavetype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `el_code` int(11) NOT NULL,
  `yearlyLimit` decimal(19,5) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_id` (`employee_id`),
  CONSTRAINT `FK61901CA350F52429` FOREIGN KEY (`employee_id`) REFERENCES `hr_employee` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `att_employeeleavetype` WRITE;
/*!40000 ALTER TABLE `att_employeeleavetype` DISABLE KEYS */;
/*!40000 ALTER TABLE `att_employeeleavetype` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `att_exceptionassign`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `att_exceptionassign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exception_date` datetime DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `dayTypeCode` int(11) NOT NULL,
  `timetable_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `starttime` datetime DEFAULT NULL,
  `endtime` datetime DEFAULT NULL,
  `paycode_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_id` (`employee_id`),
  KEY `timetable_id` (`timetable_id`),
  KEY `item_id` (`item_id`),
  KEY `paycode_id` (`paycode_id`),
  CONSTRAINT `FK9D3BA7C311A89F65` FOREIGN KEY (`timetable_id`) REFERENCES `att_timetable` (`id`),
  CONSTRAINT `FK9D3BA7C350F52429` FOREIGN KEY (`employee_id`) REFERENCES `hr_employee` (`id`),
  CONSTRAINT `FK9D3BA7C38FB14498` FOREIGN KEY (`paycode_id`) REFERENCES `hr_paycode` (`id`),
  CONSTRAINT `FK9D3BA7C3FDF7A6A4` FOREIGN KEY (`item_id`) REFERENCES `att_statisticitem` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `att_exceptionassign` WRITE;
/*!40000 ALTER TABLE `att_exceptionassign` DISABLE KEYS */;
/*!40000 ALTER TABLE `att_exceptionassign` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `att_flexibletimetable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `att_flexibletimetable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dayChangeAt` datetime DEFAULT NULL,
  `requireWork` int(11) DEFAULT NULL,
  `firstInLastOut` tinyint(1) DEFAULT NULL,
  `enableOT` tinyint(1) DEFAULT NULL,
  `otl1available` tinyint(1) DEFAULT NULL,
  `otl1minutes` int(11) DEFAULT NULL,
  `otl2available` tinyint(1) DEFAULT NULL,
  `otl2minutes` int(11) DEFAULT NULL,
  `otl3available` tinyint(1) DEFAULT NULL,
  `otl3minutes` int(11) DEFAULT NULL,
  `timetable_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `timetable_id` (`timetable_id`),
  CONSTRAINT `FK27B969F611A89F65` FOREIGN KEY (`timetable_id`) REFERENCES `att_timetable` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `att_flexibletimetable` WRITE;
/*!40000 ALTER TABLE `att_flexibletimetable` DISABLE KEYS */;
/*!40000 ALTER TABLE `att_flexibletimetable` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `att_punches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `att_punches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `punch_time` datetime NOT NULL,
  `workcode` int(11) DEFAULT NULL,
  `workstate` int(11) DEFAULT NULL,
  `verifycode` varchar(64) DEFAULT NULL,
  `terminal_id` int(11) DEFAULT NULL,
  `punch_type` varchar(64) DEFAULT NULL,
  `operator` varchar(64) DEFAULT NULL,
  `operator_reason` varchar(255) DEFAULT NULL,
  `operator_time` datetime DEFAULT NULL,
  `IsSelect` int(11) DEFAULT NULL,
  `middleware_id` bigint(20) DEFAULT NULL,
  `attendance_event` varchar(64) DEFAULT NULL,
  `login_combination` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `annotation` varchar(255) DEFAULT NULL,
  `processed` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_id` (`employee_id`),
  KEY `terminal_id` (`terminal_id`),
  CONSTRAINT `FK63030A9050F52429` FOREIGN KEY (`employee_id`) REFERENCES `hr_employee` (`id`),
  CONSTRAINT `FK63030A9060342464` FOREIGN KEY (`terminal_id`) REFERENCES `att_terminal` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `att_punches` WRITE;
/*!40000 ALTER TABLE `att_punches` DISABLE KEYS */;
INSERT INTO `att_punches` VALUES (1,1,'2019-11-15 19:48:15',0,0,'1',1,'0',NULL,NULL,NULL,0,0,NULL,0,0,NULL,0),(2,1,'2019-11-15 20:19:11',0,0,'1',1,'0',NULL,NULL,NULL,0,0,NULL,0,0,NULL,0),(3,1,'2019-11-15 20:55:55',0,0,'1',1,'0',NULL,NULL,NULL,0,0,NULL,0,0,NULL,0),(4,1,'2019-11-15 23:09:16',0,0,'1',1,'0',NULL,NULL,NULL,0,0,NULL,0,0,NULL,0),(5,1,'2019-11-16 13:03:51',0,0,'1',1,'0',NULL,NULL,NULL,0,0,NULL,0,0,NULL,0),(6,1,'2019-11-16 14:16:55',0,0,'1',1,'0',NULL,NULL,NULL,0,0,NULL,0,0,NULL,0),(7,1,'2019-11-16 14:21:51',0,0,'1',1,'0',NULL,NULL,NULL,0,0,NULL,0,0,NULL,0),(8,1,'2019-11-16 14:22:06',0,0,'1',1,'0',NULL,NULL,NULL,0,0,NULL,0,0,NULL,0);
/*!40000 ALTER TABLE `att_punches` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `att_shift`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `att_shift` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shift_name` varchar(64) NOT NULL,
  `cycle_available` tinyint(1) NOT NULL,
  `cycle_type` int(11) DEFAULT NULL,
  `cycle_parameter` int(11) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `defaultShift` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `att_shift` WRITE;
/*!40000 ALTER TABLE `att_shift` DISABLE KEYS */;
INSERT INTO `att_shift` VALUES (1,'Non_Faculty Sched',1,1,1,'2019-11-02 00:00:00',1),(2,'Psy_Coord Sched',1,1,1,'2019-11-02 00:00:00',0),(3,'Educ_Coord Sched',1,1,1,'2019-11-02 00:00:00',0),(4,'HRM Sched',1,1,1,'2019-11-02 00:00:00',0),(5,'IT Sched',1,1,1,'2019-11-02 00:00:00',0),(6,'testing',1,1,1,'2019-11-15 00:00:00',0);
/*!40000 ALTER TABLE `att_shift` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `att_shift_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `att_shift_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shift_date` datetime NOT NULL,
  `dayTypeCode` int(11) DEFAULT NULL,
  `timetable_paycode` int(11) DEFAULT NULL,
  `shift_id` int(11) NOT NULL,
  `timetable_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `shift_id` (`shift_id`),
  KEY `timetable_id` (`timetable_id`),
  CONSTRAINT `FK78355A14114AA329` FOREIGN KEY (`shift_id`) REFERENCES `att_shift` (`id`),
  CONSTRAINT `FK78355A1411A89F65` FOREIGN KEY (`timetable_id`) REFERENCES `att_timetable` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `att_shift_details` WRITE;
/*!40000 ALTER TABLE `att_shift_details` DISABLE KEYS */;
INSERT INTO `att_shift_details` VALUES (1,'2019-11-02 00:00:00',0,0,1,NULL),(2,'2019-11-03 00:00:00',0,0,1,1),(3,'2019-11-04 00:00:00',0,0,1,1),(4,'2019-11-05 00:00:00',0,0,1,1),(5,'2019-11-06 00:00:00',0,0,1,1),(6,'2019-11-07 00:00:00',0,0,1,1),(7,'2019-11-08 00:00:00',0,0,1,1),(8,'2019-11-02 00:00:00',0,0,2,NULL),(9,'2019-11-03 00:00:00',0,0,2,2),(10,'2019-11-04 00:00:00',0,0,2,NULL),(11,'2019-11-05 00:00:00',0,0,2,4),(12,'2019-11-06 00:00:00',0,0,2,3),(13,'2019-11-07 00:00:00',0,0,2,4),(14,'2019-11-08 00:00:00',0,0,2,NULL),(15,'2019-11-02 00:00:00',0,0,3,NULL),(16,'2019-11-03 00:00:00',0,0,3,5),(17,'2019-11-04 00:00:00',0,0,3,NULL),(18,'2019-11-05 00:00:00',0,0,3,5),(19,'2019-11-06 00:00:00',0,0,3,NULL),(20,'2019-11-07 00:00:00',0,0,3,6),(21,'2019-11-08 00:00:00',0,0,3,6),(22,'2019-11-02 00:00:00',0,0,4,NULL),(23,'2019-11-03 00:00:00',0,0,4,7),(24,'2019-11-04 00:00:00',0,0,4,NULL),(25,'2019-11-05 00:00:00',0,0,4,NULL),(26,'2019-11-06 00:00:00',0,0,4,7),(27,'2019-11-07 00:00:00',0,0,4,8),(28,'2019-11-08 00:00:00',0,0,4,NULL),(29,'2019-11-02 00:00:00',0,0,5,13),(30,'2019-11-03 00:00:00',0,0,5,9),(31,'2019-11-04 00:00:00',0,0,5,10),(32,'2019-11-05 00:00:00',0,0,5,NULL),(33,'2019-11-06 00:00:00',0,0,5,NULL),(34,'2019-11-07 00:00:00',0,0,5,NULL),(35,'2019-11-08 00:00:00',0,0,5,12),(36,'2019-11-15 00:00:00',0,0,6,11),(37,'2019-11-16 00:00:00',0,0,6,NULL),(38,'2019-11-17 00:00:00',0,0,6,NULL),(39,'2019-11-18 00:00:00',0,0,6,NULL),(40,'2019-11-19 00:00:00',0,0,6,NULL),(41,'2019-11-20 00:00:00',0,0,6,NULL),(42,'2019-11-21 00:00:00',0,0,6,NULL);
/*!40000 ALTER TABLE `att_shift_details` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `att_statisticitem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `att_statisticitem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_code` int(11) NOT NULL,
  `item_desc` varchar(32) DEFAULT NULL,
  `item_type` int(11) DEFAULT NULL,
  `export_code` varchar(32) DEFAULT NULL,
  `isDeleted` tinyint(1) DEFAULT NULL,
  `sign` varchar(2) DEFAULT NULL,
  `yearlyLimit` decimal(19,5) DEFAULT NULL,
  `item_Mode` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `item_code` (`item_code`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `att_statisticitem` WRITE;
/*!40000 ALTER TABLE `att_statisticitem` DISABLE KEYS */;
INSERT INTO `att_statisticitem` VALUES (1,1,'requireWork',0,'',0,'W',365.00000,0),(2,2,'actualWork',0,'',0,'AW',365.00000,0),(3,3,'roundWork',0,'',0,'RW',365.00000,0),(4,4,'overtime1',0,'',0,'O1',365.00000,0),(5,5,'overtime2',0,'',0,'O2',365.00000,0),(6,6,'overtime3',0,'',0,'O3',365.00000,0),(7,7,'lateCome',0,'',0,'L',365.00000,0),(8,8,'earlyOut',0,'',0,'E',365.00000,0),(9,9,'absence',0,'',0,'A',365.00000,0),(10,10,'break',0,'',0,'B',365.00000,0),(11,11,'sick',0,'',0,'SL',365.00000,1),(12,12,'vacation',0,'',0,'VL',365.00000,1),(13,13,'personalLeave',0,'',0,'PL',365.00000,1),(14,14,'annualLeave',0,'',0,'AL',365.00000,1),(15,15,'businessLeave',0,'',0,'BL',365.00000,1),(16,16,'missingTime',0,'',0,'MT',365.00000,0);
/*!40000 ALTER TABLE `att_statisticitem` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `att_terminal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `att_terminal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `terminal_no` int(11) NOT NULL,
  `terminal_status` int(11) NOT NULL,
  `terminal_name` varchar(64) DEFAULT NULL,
  `terminal_location` text DEFAULT NULL,
  `terminal_category` int(11) NOT NULL,
  `terminal_type` varchar(32) DEFAULT NULL,
  `terminal_connectpwd` varchar(32) DEFAULT NULL,
  `terminal_domainname` varchar(32) DEFAULT NULL,
  `terminal_dateformat` varchar(32) DEFAULT NULL,
  `terminal_tcpip` varchar(32) DEFAULT NULL,
  `AGR_version` varchar(32) DEFAULT NULL,
  `terminal_port` int(11) DEFAULT NULL,
  `terminal_baudrate` int(11) DEFAULT NULL,
  `terminal_users` int(11) DEFAULT NULL,
  `terminal_fingerprints` int(11) DEFAULT NULL,
  `terminal_faces` int(11) DEFAULT NULL,
  `terminal_palms` int(11) DEFAULT NULL,
  `terminal_fvs` int(11) DEFAULT NULL,
  `terminal_punches` int(11) DEFAULT NULL,
  `IsSelect` int(11) DEFAULT NULL,
  `terminal_sn` bigint(20) DEFAULT NULL,
  `terminal_sns` varchar(20) DEFAULT NULL,
  `policy` int(11) DEFAULT NULL,
  `first_connect` tinyint(1) DEFAULT NULL,
  `terminal_desc` varchar(64) DEFAULT NULL,
  `terminal_photostamp` varchar(64) DEFAULT NULL,
  `terminal_AttLogStamp` varchar(64) DEFAULT NULL,
  `isfromWDMS` int(11) DEFAULT NULL,
  `connection_model` int(11) DEFAULT NULL,
  `terminal_zem` varchar(24) DEFAULT NULL,
  `terminal_firmversion` varchar(24) DEFAULT NULL,
  `terminal_admins` int(11) DEFAULT NULL,
  `p2pUID` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `att_terminal` WRITE;
/*!40000 ALTER TABLE `att_terminal` DISABLE KEYS */;
INSERT INTO `att_terminal` VALUES (1,1,1,'192.168.1.201',NULL,1,'MB20/ID',NULL,NULL,'YY-MM-DD','192.168.1.201','10',4370,0,6,7,2,0,0,124,0,0,'ADZV192960010',1,0,NULL,NULL,NULL,0,0,'ZLM60_TFT','Ver 6.60 Apr 27 2017',0,NULL);
/*!40000 ALTER TABLE `att_terminal` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `att_terminal_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `att_terminal_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `occurtime` datetime DEFAULT NULL,
  `actionname` varchar(128) DEFAULT NULL,
  `contentdata` text DEFAULT NULL,
  `verifymode` varchar(128) DEFAULT NULL,
  `terminal_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `terminal_id` (`terminal_id`),
  CONSTRAINT `FKA0FC950260342464` FOREIGN KEY (`terminal_id`) REFERENCES `att_terminal` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `att_terminal_events` WRITE;
/*!40000 ALTER TABLE `att_terminal_events` DISABLE KEYS */;
INSERT INTO `att_terminal_events` VALUES (1,'2019-10-18 16:07:00',NULL,'Connecting To Device 192.168.1.201',NULL,1),(2,'2019-10-18 16:07:05',NULL,'Failed To Connect With Device 192.168.1.201',NULL,1),(3,'2019-11-01 10:22:24',NULL,'Connecting To Device 192.168.1.201',NULL,1),(4,'2019-11-01 10:22:25',NULL,'Succeeded To Connect With Device 192.168.1.201',NULL,1),(5,'2019-11-01 10:22:32','Identify',NULL,'FP',1),(6,'2019-11-01 10:23:08',NULL,'Connecting To Device 192.168.1.201',NULL,1),(7,'2019-11-01 10:23:10',NULL,'Succeeded To Connect With Device 192.168.1.201',NULL,1),(8,'2019-11-01 10:23:06','Identify',NULL,'FP',1),(9,'2019-11-01 10:23:41',NULL,'Connecting To Device 192.168.1.201',NULL,1),(10,'2019-11-01 10:23:43',NULL,'Succeeded To Connect With Device 192.168.1.201',NULL,1),(11,'2019-11-01 10:23:41','Identify',NULL,'FP',1),(12,'2019-11-01 10:24:09',NULL,'Connecting To Device 192.168.1.201',NULL,1),(13,'2019-11-01 10:24:10',NULL,'Succeeded To Connect With Device 192.168.1.201',NULL,1),(14,'2019-11-01 10:26:51',NULL,'Connecting To Device 192.168.1.201',NULL,1),(15,'2019-11-01 10:26:53',NULL,'Succeeded To Connect With Device 192.168.1.201',NULL,1),(16,'2019-11-01 10:27:17','Identify',NULL,'FP',1),(17,'2019-11-01 10:31:40','Identify',NULL,'FP',1),(18,'2019-11-01 10:32:15',NULL,'Connecting To Device 192.168.1.201',NULL,1),(19,'2019-11-01 10:32:16',NULL,'Succeeded To Connect With Device 192.168.1.201',NULL,1),(20,'2019-11-02 19:52:45',NULL,'Connecting To Device 192.168.1.201',NULL,1),(21,'2019-11-02 19:52:46',NULL,'Succeeded To Connect With Device 192.168.1.201',NULL,1),(22,'2019-11-02 19:55:49',NULL,'Connecting To Device 192.168.1.201',NULL,1),(23,'2019-11-02 19:55:51',NULL,'Succeeded To Connect With Device 192.168.1.201',NULL,1),(24,'2019-11-15 19:12:19',NULL,'Connecting To Device 192.168.1.201',NULL,1),(25,'2019-11-15 19:12:20',NULL,'Succeeded To Connect With Device 192.168.1.201',NULL,1),(26,'2019-11-15 19:48:16',NULL,'Connecting To Device 192.168.1.201',NULL,1),(27,'2019-11-15 19:48:17',NULL,'Succeeded To Connect With Device 192.168.1.201',NULL,1),(28,'2019-11-15 19:48:15','Identify',NULL,'FP',1),(29,'2019-11-15 20:19:18',NULL,'Connecting To Device 192.168.1.201',NULL,1),(30,'2019-11-15 20:19:19',NULL,'Succeeded To Connect With Device 192.168.1.201',NULL,1),(31,'2019-11-15 20:19:11','Identify',NULL,'FP',1),(32,'2019-11-15 20:56:01',NULL,'Connecting To Device 192.168.1.201',NULL,1),(33,'2019-11-15 20:56:03',NULL,'Succeeded To Connect With Device 192.168.1.201',NULL,1),(34,'2019-11-15 20:55:55','Identify',NULL,'FP',1),(35,'2019-11-15 23:09:22',NULL,'Connecting To Device 192.168.1.201',NULL,1),(36,'2019-11-15 23:09:23',NULL,'Succeeded To Connect With Device 192.168.1.201',NULL,1),(37,'2019-11-15 23:09:16','Identify',NULL,'FP',1),(38,'2019-11-16 13:03:52',NULL,'Connecting To Device 192.168.1.201',NULL,1),(39,'2019-11-16 13:03:53',NULL,'Succeeded To Connect With Device 192.168.1.201',NULL,1),(40,'2019-11-16 13:03:51','Identify',NULL,'FP',1),(41,'2019-11-16 14:17:00',NULL,'Connecting To Device 192.168.1.201',NULL,1),(42,'2019-11-16 14:17:02',NULL,'Succeeded To Connect With Device 192.168.1.201',NULL,1),(43,'2019-11-16 14:16:55','Identify',NULL,'FP',1),(44,'2019-11-16 14:21:37',NULL,'Connecting To Device 192.168.1.201',NULL,1),(45,'2019-11-16 14:21:39',NULL,'Succeeded To Connect With Device 192.168.1.201',NULL,1),(46,'2019-11-16 14:21:56',NULL,'Connecting To Device 192.168.1.201',NULL,1),(47,'2019-11-16 14:21:57',NULL,'Succeeded To Connect With Device 192.168.1.201',NULL,1),(48,'2019-11-16 14:21:51','Identify',NULL,'FP',1),(49,'2019-11-16 14:22:11',NULL,'Connecting To Device 192.168.1.201',NULL,1),(50,'2019-11-16 14:22:12',NULL,'Succeeded To Connect With Device 192.168.1.201',NULL,1),(51,'2019-11-16 14:22:06','Identify',NULL,'FP',1);
/*!40000 ALTER TABLE `att_terminal_events` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `att_terminal_zone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `att_terminal_zone` (
  `terminal_id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL,
  KEY `zone_id` (`zone_id`),
  KEY `terminal_id` (`terminal_id`),
  CONSTRAINT `FK_TerminalZone` FOREIGN KEY (`terminal_id`) REFERENCES `att_terminal` (`id`),
  CONSTRAINT `FK_ZoneTerminal` FOREIGN KEY (`zone_id`) REFERENCES `att_zone` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `att_terminal_zone` WRITE;
/*!40000 ALTER TABLE `att_terminal_zone` DISABLE KEYS */;
INSERT INTO `att_terminal_zone` VALUES (1,1);
/*!40000 ALTER TABLE `att_terminal_zone` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `att_timetable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `att_timetable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timetableType` int(11) DEFAULT NULL,
  `timetable_color` int(11) DEFAULT NULL,
  `timetable_name` varchar(64) DEFAULT NULL,
  `timetable_start` datetime DEFAULT NULL,
  `timetable_end` datetime DEFAULT NULL,
  `timetable_checkin_begin` datetime DEFAULT NULL,
  `timetable_checkout_end` datetime DEFAULT NULL,
  `usedForSmartShift` tinyint(1) DEFAULT NULL,
  `timetable_checkin_end` datetime DEFAULT NULL,
  `timetable_checkout_begin` datetime DEFAULT NULL,
  `requireWork` int(11) DEFAULT NULL,
  `timetable_late` tinyint(1) DEFAULT NULL,
  `timetable_latecome` int(11) DEFAULT NULL,
  `timetable_early` tinyint(1) DEFAULT NULL,
  `timetable_earlyout` int(11) DEFAULT NULL,
  `countAbsentLateExceed` tinyint(1) DEFAULT NULL,
  `countAbsentLateExceedMins` int(11) DEFAULT NULL,
  `withoutInAsLateAllDay` tinyint(1) DEFAULT NULL,
  `countAbsentEarlyExceed` tinyint(1) DEFAULT NULL,
  `countAbsentEarlyExceedMins` int(11) DEFAULT NULL,
  `withoutOutAsEarlyAllDay` tinyint(1) DEFAULT NULL,
  `enableOT` tinyint(1) DEFAULT NULL,
  `earlyComeAsWork` tinyint(1) DEFAULT NULL,
  `countEarlyComeExceedMins` int(11) DEFAULT NULL,
  `lateOutAsWork` tinyint(1) DEFAULT NULL,
  `countLateOutExceedMins` int(11) DEFAULT NULL,
  `firstInLastOut` tinyint(1) DEFAULT NULL,
  `isDefault` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `att_timetable` WRITE;
/*!40000 ALTER TABLE `att_timetable` DISABLE KEYS */;
INSERT INTO `att_timetable` VALUES (1,0,-16744193,'Non_Faculty','1990-01-01 08:00:00','1990-01-01 18:00:00','1990-01-01 06:00:00','1990-01-01 22:00:00',1,'1990-01-01 22:00:00','1990-01-01 06:00:00',1,0,5,0,5,0,0,0,0,0,0,1,1,0,1,0,1,1),(2,0,-1,'Coord Psy 1','1990-01-01 07:00:00','1990-01-01 13:00:00','1990-01-01 05:00:00','1990-01-01 15:00:00',1,'1990-01-01 15:00:00','1990-01-01 05:00:00',1,1,5,0,0,1,6,0,0,0,0,1,1,0,1,0,1,0),(3,0,-1,'Coord Psy 2','1990-01-01 08:00:00','1990-01-01 15:00:00','1990-01-01 06:00:00','1990-01-01 17:00:00',1,'1990-01-01 17:00:00','1990-01-01 06:00:00',1,0,0,0,0,0,0,0,0,0,0,1,1,0,1,0,1,0),(4,0,-1,'Coord Psy 3','1990-01-01 12:00:00','1990-01-01 18:00:00','1990-01-01 10:00:00','1990-01-01 20:00:00',1,'1990-01-01 20:00:00','1990-01-01 10:00:00',1,0,0,0,0,0,0,0,0,0,0,1,1,0,1,0,1,0),(5,0,-65408,'Coord Educ 1','1990-01-01 10:00:00','1990-01-01 17:00:00','1990-01-01 08:00:00','1990-01-01 19:00:00',1,'1990-01-01 19:00:00','1990-01-01 08:00:00',1,0,0,0,0,0,0,0,0,0,0,1,1,0,1,0,0,0),(6,0,-65408,'Coord Educ 2','1990-01-01 07:00:00','1990-01-01 13:00:00','1990-01-01 05:00:00','1990-01-01 15:00:00',1,'1990-01-01 15:00:00','1990-01-01 05:00:00',1,0,0,0,0,0,0,0,0,0,0,1,1,0,1,0,1,0),(7,0,-16711872,'Prof HRM 1','1990-01-01 09:00:00','1990-01-01 16:00:00','1990-01-01 07:00:00','1990-01-01 18:00:00',1,'1990-01-01 18:00:00','1990-01-01 07:00:00',1,1,15,0,0,1,30,0,0,0,0,1,1,0,1,0,1,0),(8,0,-16711872,'Prof HRM 2','1990-01-01 12:00:00','1990-01-01 18:00:00','1990-01-01 10:00:00','1990-01-01 20:00:00',1,'1990-01-01 20:00:00','1990-01-01 10:00:00',1,1,15,0,0,1,30,0,0,0,0,1,1,0,1,0,1,0),(9,0,-4144960,'Prof IT 1','1990-01-01 09:00:00','1990-01-01 18:00:00','1990-01-01 07:00:00','1990-01-01 20:00:00',1,'1990-01-01 20:00:00','1990-01-01 07:00:00',1,1,15,0,0,1,16,0,0,0,0,1,1,0,1,0,1,0),(10,0,-4144960,'Prof IT 2','1990-01-01 12:00:00','1990-01-01 18:00:00','1990-01-01 10:00:00','1990-01-01 20:00:00',1,'1990-01-01 20:00:00','1990-01-01 10:00:00',1,1,15,0,0,1,16,0,0,0,0,1,1,0,1,0,1,0),(11,0,-1,'today','1990-01-01 19:50:00','1990-01-01 20:00:00','1990-01-01 17:50:00','1990-01-01 22:00:00',1,'1990-01-01 22:00:00','1990-01-01 17:50:00',1,0,0,0,0,0,0,0,0,0,0,1,1,0,1,0,1,0),(12,0,-1,'today2','1990-01-01 21:00:00','1990-01-01 22:00:00','1990-01-01 19:00:00','1990-01-01 00:00:00',1,'1990-01-01 00:00:00','1990-01-01 19:00:00',1,0,0,0,0,0,0,0,0,0,0,1,1,0,1,0,0,0),(13,0,-8388353,'otweek','1990-01-01 14:22:00','1990-01-01 15:30:00','1990-01-01 12:22:00','1990-01-01 17:30:00',1,'1990-01-01 17:30:00','1990-01-01 12:22:00',1,0,0,0,0,0,0,0,0,0,0,1,1,0,1,0,1,0);
/*!40000 ALTER TABLE `att_timetable` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `att_timetable_roundrule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `att_timetable_roundrule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timefrom` datetime NOT NULL,
  `timeto` datetime NOT NULL,
  `roundtime` datetime NOT NULL,
  `timetable_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `timetable_id` (`timetable_id`),
  CONSTRAINT `FK25F61BD011A89F65` FOREIGN KEY (`timetable_id`) REFERENCES `att_timetable` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `att_timetable_roundrule` WRITE;
/*!40000 ALTER TABLE `att_timetable_roundrule` DISABLE KEYS */;
/*!40000 ALTER TABLE `att_timetable_roundrule` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `att_workcode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `att_workcode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wc_code` int(11) NOT NULL,
  `wc_name` varchar(255) NOT NULL,
  `middleware_code` varchar(64) DEFAULT NULL,
  `middleware_id` bigint(20) DEFAULT NULL,
  `wc_type` bigint(20) DEFAULT NULL,
  `description` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `att_workcode` WRITE;
/*!40000 ALTER TABLE `att_workcode` DISABLE KEYS */;
/*!40000 ALTER TABLE `att_workcode` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `att_workstate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `att_workstate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ws_code` int(11) NOT NULL,
  `ws_alias` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `att_workstate` WRITE;
/*!40000 ALTER TABLE `att_workstate` DISABLE KEYS */;
INSERT INTO `att_workstate` VALUES (1,0,'CheckStatus1'),(2,1,'CheckStatus2'),(3,2,'CheckStatus3'),(4,3,'CheckStatus4'),(5,4,'CheckStatus5'),(6,5,'CheckStatus6'),(7,6,'CheckStatus7');
/*!40000 ALTER TABLE `att_workstate` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `att_zone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `att_zone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zone_code` int(11) NOT NULL,
  `clientID` bigint(20) DEFAULT NULL,
  `ZoneName` varchar(64) NOT NULL,
  `zoneID` bigint(20) DEFAULT NULL,
  `description` varchar(64) DEFAULT NULL,
  `iuser1` int(11) DEFAULT NULL,
  `cuser1` varchar(64) DEFAULT NULL,
  `IsSelect` int(11) DEFAULT NULL,
  `defaultZone` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `att_zone` WRITE;
/*!40000 ALTER TABLE `att_zone` DISABLE KEYS */;
INSERT INTO `att_zone` VALUES (1,1,8972919777633335762,'FEU',1,'',0,NULL,0,1);
/*!40000 ALTER TABLE `att_zone` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `audits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `audits` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `event` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditable_id` bigint(20) unsigned NOT NULL,
  `old_values` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new_values` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(1023) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `audits_auditable_type_auditable_id_index` (`auditable_type`,`auditable_id`),
  KEY `audits_user_id_user_type_index` (`user_id`,`user_type`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `audits` WRITE;
/*!40000 ALTER TABLE `audits` DISABLE KEYS */;
INSERT INTO `audits` VALUES (1,'App\\User',1,'updated','App\\User',1,'{\"password\":\"$2y$10$AAhkso4Ifrtc\\/ZfDrtYjaOS.5L\\/H97Bz\\/j8BcK6yTVPOqYWcZ5Ib2\",\"force_password\":\"0\"}','{\"password\":\"$2y$10$7QMPOoyR4KO8EgL.T7v4Zu3GpTyuVmuzE3ziRjX7VndxmtqXfkyL.\",\"force_password\":\"1\"}','http://feucavite.payroll/forcepassword','127.0.0.1','Mozilla/5.0 (Windows NT 6.2; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36',NULL,'2019-12-08 07:53:09','2019-12-08 07:53:09'),(2,'App\\User',1,'updated','App\\User',1,'{\"password\":\"$2y$10$7QMPOoyR4KO8EgL.T7v4Zu3GpTyuVmuzE3ziRjX7VndxmtqXfkyL.\"}','{\"password\":\"$2y$10$nH5unXjTMfBkYpYHeKcgke1.g4.McdXv06zJ\\/1EUjTq.Zi7ytjGAe\"}','http://feucavite.payroll/login','127.0.0.1','Mozilla/5.0 (Windows NT 6.2; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36',NULL,'2019-12-08 07:53:15','2019-12-08 07:53:15');
/*!40000 ALTER TABLE `audits` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `costcenter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `costcenter` (
  `cost_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cc_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`cost_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `costcenter` WRITE;
/*!40000 ALTER TABLE `costcenter` DISABLE KEYS */;
INSERT INTO `costcenter` VALUES (1,'ACCTG','Accounting'),(2,'ADMIN','Admin'),(3,'AERO','Admission and external relations office'),(4,'CS','CS'),(5,'CS HED','CS HED'),(6,'DEAN','DEAN'),(7,'GUIDANCE','Guidance'),(8,'GUIDANCE HED','GUIDANCE HED'),(9,'HR','Human Resources'),(10,'HRM','Human Resource Management'),(11,'LIBRARY','Library'),(12,'LIBRARY HED','Library HED'),(13,'MEDICAL','Medical'),(14,'MEDICAL HED','Medical HED'),(15,'REGISTRAR','Registrar'),(16,'REGISTRAR HED','Registrar HED'),(17,'TREASURY','Treasury'),(18,'ED','Education'),(19,'BSIT','BS Information Technology'),(20,'NSTP','National Service Training Program'),(21,'GEN ED','General Education'),(22,'BSA','BS Accountancy'),(23,'BSBA','BS Business Administration'),(24,'PSYCH','BS Psychology'),(25,'TM','BS Tourism Management'),(26,'HED','Higher Education');
/*!40000 ALTER TABLE `costcenter` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `employementstatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employementstatus` (
  `emp_status` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `employement_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`emp_status`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `employementstatus` WRITE;
/*!40000 ALTER TABLE `employementstatus` DISABLE KEYS */;
INSERT INTO `employementstatus` VALUES (1,'Full-Time'),(2,'Part-Time'),(3,'Regular'),(4,'Probationary');
/*!40000 ALTER TABLE `employementstatus` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `hr_attendancerule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hr_attendancerule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `smartShiftDisplayColor` int(11) DEFAULT NULL,
  `requirePunchForLeave` tinyint(1) DEFAULT NULL,
  `activeAttStatus` tinyint(1) DEFAULT NULL,
  `minimumTime` int(11) DEFAULT NULL,
  `hourlyDayChangeAt` datetime DEFAULT NULL,
  `hourlyFirstInLastOut` tinyint(1) DEFAULT NULL,
  `hourlyActiveAttStatus` tinyint(1) DEFAULT NULL,
  `hourlyMinimumTime` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`),
  CONSTRAINT `FKA0F2A3B0F2CD5742` FOREIGN KEY (`company_id`) REFERENCES `hr_company` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `hr_attendancerule` WRITE;
/*!40000 ALTER TABLE `hr_attendancerule` DISABLE KEYS */;
INSERT INTO `hr_attendancerule` VALUES (1,0,1,0,5,'2019-10-17 00:00:00',1,0,5,1);
/*!40000 ALTER TABLE `hr_attendancerule` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `hr_biotemplate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hr_biotemplate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valid_flag` int(11) NOT NULL,
  `is_duress` int(11) NOT NULL,
  `bio_type` int(11) NOT NULL,
  `version` varchar(20) NOT NULL,
  `data_format` int(11) NOT NULL,
  `template_no` int(11) NOT NULL,
  `template_no_index` int(11) NOT NULL,
  `template_data` text DEFAULT NULL,
  `size` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_id` (`employee_id`),
  CONSTRAINT `FKF43C035350F52429` FOREIGN KEY (`employee_id`) REFERENCES `hr_employee` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `hr_biotemplate` WRITE;
/*!40000 ALTER TABLE `hr_biotemplate` DISABLE KEYS */;
INSERT INTO `hr_biotemplate` VALUES (1,1,0,1,'10.0',0,5,0,'SsNTUzIxAAADgIMECAUHCc7QAAAbgWkBAAAAg60bkoA8AJIPtwCMAKmOrQBTAJQOlgBXgIgPtwBUAFQObIB2AIoPrABqAIqPywC4AA0PrwDBgH0PpwDUAEEPQoDZAPcPhwAbAH2PsADnAAwP+ADzgGQPRwD4ADIPnoD+AIEPWwDFAWyPUQATAfUPrQAZgW0PtQAjAUYPu4AwAYAPiACFAWKPvwBAARQO4gBHgV0PbABIAZ8Pm4BOAWELxACVASeMCwH+6gYD3Rs6mGca8AfR7E8FHYPq+/v3sOux/4WDnwPP++P7w3w9hTZ+AoTaiw4BJYJyhBP7KXm3CcF90JbCAHd8M/0tfqMGIYnSjDuTO/PgcjL5JJdcir6H33SqBioDZHpq/kAHYYqZioQDovrA/1MUNQT3cKWHuPwxbDJc+AKWi8b1HZSd8OeQAOsqBw/zHfvr++RwvAISTgLjyBANJN/HKu/fB+U9AoIbGx4KAFLUFsHAwcIrBwBv0BbCfsHB/QgAOdIJO0BaCwAnIgM6/klAw0YQACsvxv793Wx0QBIAEfn6/HzAS8L/XMClwAWADkn3Kf8FxRVQfTkNAFdWDJBrY9cTAA1g+v86R0HF/sHBWgcA3Wr5f/5LBwAYdjheSYoBc3gMYGuZEQOUh/Q4QjbAn2AQgA+c5//+/v1Uw9V3wBMADqcuQT1/wTdYwy8NxaisDGXBwMHBwQZUAIDPugn/EgDRvO7GOljAaP2NzQBlPnxvwIQLAKvCA8NNwFYIAGYBd8P0dhIADs/n/sEw2FpVCACj0UPAwwvBBQCr1QaJCAMj1oNJdAQA+NpyAwoAg9uDi6KAC4CK3gNoPwbFhOL9wYQFALXozP5ehAE58G2JDsVK8HT+Rf/+//86wHWFAT30Z8FoywBIeftbQ/3B/QdqBYBC+mnBwm7AAJp7gnUHAFf/v52IhgGh/wP//bIGExkAfXLBBxCcBHMAkAUQTBZpVAsT1BfwNkY3CdVkG/GNk8QLEGzc9/x/SsA7CBBl22uDQoYNELEfhruIwUHAwsEGELnhCf1AKQsQsSaDvcGRDAoQtC6Dwb2deIYRvDIGKP3DELe0fMBvBBDC+w/DewkQuj+DiABvB5CCQWSVBBAHRRB/+wQQZ0lgswMT7E1XwAMQk4lnxoQRwEyMxMLBEKfV8fj5UkIAzkMCgAELRVIAAAAAAAA=',0,1),(2,1,0,1,'10.0',0,7,0,'TWtTUzIxAAAEKC0ECAUHCc7QAAAcKWkBAAAAhNUlZigxAAUPhwD+AI4nWAA8AHwP+AA7KP0OUABKAMQOHShiANkPZQCpAA0nIgB9AGAPXACPKJMPTgCrAMQPaSixAIQPzQAUADQnJADgAFIPVADnKJsPYQDuAJAOqCj+ADsPcwDBATwmkAAJAa0PDAATKTYPWwAbAYcOTygfAUsNbADgAUMnmQAsATgP4gA2KdUOUAAyAZMOjSgzAbYPrAD2AcQmygA1AUMPngAyKcIOhgA5AYsPxig9AUMNoACFAb4nKQBEAVkOpwBIKUoPcQBTAQkPMyhXAccPQwClAcon1IjWBIp+R4ZzOG6K4XhdfESDndaAg3b6WYTQBl7U2HuL3Zfb5worpFKD0YtDYzZnVzqGi1+Thnzmo9ubh4Tj9ifvbvbDs5b7O/8LU54LLsYLYkZnUR+3FyeUuJNiBuaiKOdWpKv4xXdadMt1jtzn/pL2ufiQ/ZXGLAht9V2LFAWdrqvwuYRVebyC7VXfDq6COJckDfk+HWq9gOH/5AlJodB+pAP+DAeESEfwep1+BJrcGjm/JQPNhrqJYP19rlwH5YVNlo+OTajoit70RYBXgF4h1Phdcmr2lAiarVd23ewIQtIgPikDSRy+CABQARTX/8H/SwYAYgEUGMEMAGMCAIX+xBZYDwA9E/SE//oVVVQQADYdMsA/Y/7/UzgNAKMsB9f8/8BHwD7DAFoHgcHCawMAoDMC6BMAHTbn/jr+OWlNTP8NAF35BsUH/z7AwP8ExTlEWIUFAFRGAwT++y0BTEp6wo/BAFBlAkoJAI1P1f8z1lIKAIxUF4JHQiUBaWkGQDIF/0YtAWFsg8KNyABtRw3A///8azo4ECgMd97+/zM6RvsdS0AUAA2BJf1D1v5AO1X/TMYAJqljwgwAlohWwvurwsCdEgATbtr76Pwqwf3A/zr9xBYLAGmygMAHo/rpwhEAcbIQO0b518HB/MH/+0cVBDq71/87/TuE/zrWQhUAFsPTOzsu1/7+Pv1HStEAHeLWOCf+/jWD/kgjAZLfopKVAXsJKIzinsPBoWX/Nj4BEObWVDQF/DVkKcBUCwCVIiktSPzD/Q0AZCn6/tT9wSvA//s6BgRJ81qTwQgAqPI+1cPD/yIEAKL0U+z+BQB29j1CBQRU9zfCMxEAb/q0UcDAxIzEwwTDKCEBaP1JwsLn/sAsEaoCOkYI1a8GH/7//cH+xM8QlC21w8PEqpTCEHYvO3b5/wQQHjQ5UggQSw5M/zjDx/GUBBA/F1A4wgc40DQ3/QYQnR9N7PtfAxBrK4X9FzgmLNbA/8QE/PrU+v/8/v7+OcH76gQQmS89wdoFFKM3Ov38/wTVTj1ywMUEEMs6+EMHOIc9Sf0EEHs/SLpTQgALQwHFAA9tUwAAAAAAAAA=',0,4),(3,1,0,1,'10.0',0,8,0,'SpVTUzIxAAAD1tcECAUHCc7QAAAb12kBAAAAg3sjhNYmABEPjACHAITZfwBQAAoP4ABR1usPuQBWAFYPgtZ1AA4PVQBLAP7ZhQCTAIMP5wCV1k4NlQCbANMPItanANINfAB9AIPZJAC7AFUPYwC91iAOgADGANAPPdbKAOkPtQAIAKPYfgDgAIINtQDt1moLiAD0APIOZNb6AFIMegDEAUXahwABATUMgwAI11MOYgARAYIOhdYSATUOTADcAUrYdQAbAccN+QAd11EOeQAqAY4MQ9YwAc4PTAD2AcrZlwBAAU0MtwBX180OZQBXAQEOqlm7C4+DWX10ewwiWIW2/UL7Hp+8Odobgwxzi56HsVozBaL7i3yq8fxnEG26dEYGsHxtKy5V/ZXKml/2clLofdfoNWwP/t245IVGbOoJRIHZ2A8OIZStl6P2MUI+GEefgYGijVT0YBktTsFvqBj6P0AlkAet8Ty2Cj48DXkOPBPYEcojzfMQA40BmAiC0zgPTYEF9mgCDte8cfXy6fho+CrQ7HyplU2B4AhqUwQB6YQNGx8Fu9FogYWHPP+8g16tzwWigucY6QuhVH+DtPtm/0p4gCx+MwYgPAHHDxRLBQBoBIN/wACI3hH/wP4LAEYlhVKIcQcAiyXVVMIqBwCJKxPAkRADbTSXcX6CckURAxE4oMGFwsIFd8ezwAkAiT2JsIvB3QGIRIZvkDuZB9aRRAk2CABBUQqXTQQAL1tegQ0D5GHn//41wewwEdYPZtzAwDEF/TiV/v3BCACFsAw7FvzBEgDOglvBaqiNeMJ9BACfjvTyEwATkN7/B/vDKf7+//7B/jr//J0JAICWhoAGdwXWmJkTOP4DxSCZhcESAM+YoLl8dBbFccHBDwDxnt8oKf77wcDAO/5Q0AGYnxc9/tUAIHTS/MAu/sE+wPwU/P/ABAAtZmB70AF4s4bDks0Ag28HIzAFAHh+g5jYAaK7nMRsBJfDFX0EACbAUwX+BNaFwwz9M8DNAH8SgcDEjsAQxSnKADIq//7AK/MHA1LLF/8w/gPFOsyMwwgAfdyMAcLGUggAe+KAwmL/cdEBg+Ia//46/fzQAWDvYMPBOsMF1nf3V8TEKM0AjyEl/zIiBQCn+1kVaw4QMwLQOi7+KPr///47BNWKAPtYAxB8BUA6AxP9ElfABxBk0Dr/l8IDEIMXOgQHE1wWMMH4TwTVTB2fNwMQOSJaBwMTZS1J/wQQfOs0+hYFELkxSWzAEJ3lSMP9/QQQijdUUAQQVzVPRcEQvO5NiAQQlUOGLVGUAQtDAQAAzkVR1gAAAAAAAA==',0,5),(4,1,0,1,'10.0',0,4,0,'TQlTUzIxAAAESksECAUHCc7QAAAcS2kBAAAAhPcmrEoeAO0ONwD1AONFugA8APoP8wBPSusPzgBOADsPrkpnAP8PpACwAABFYgB3APEPNwB4SvwPQwCDAC4PZ0qFAHAPdwBPAPlF9gCOAA0P+QCUSmYPRACRADUPZkqSAG0PkABdAHlFqQCbAAwObQCtShAOuwCxAFQOYEq2APkPuAB6AIpEQgDMAGEOpADVSvsPogDbAEIPhkrqAAgOyQArABFFrAALASAO+AAUS10NYQAQAZYJP0ogAdoNYgDyAUxDeAA6ATsNHAA+S78PhAA8AfQNbEpBAUgLNQCOAdFFXgBWAckOe/W/udLz3f/H+xL/obUzDdb/WQcKArOxIAfuA+f+FPxuSVMHTQS6+heK1Mmw99GHufHuAxdJ1PzphJp8FYNRThx1EY31kuAPLVvefx8TIHoofBq0FYpNBJaEEPwBONR/CXKZg9hvsbb4kpl/MQREgZHNOASBgZWHCANCx/OavfyZf4sJIiILauNzTQPLmKa91/lqgQ53o4ESWda1zvb+k9qJRkQamP8aaYTjCUNcr/luDp57qICSwe8HYAM9DruASEW49c32Z6O+q0fF2fvJ69bpJQMpR4iCcv+2D1qMjch/gJaS5t867RVqSAECXxrQwAA4S3HD/sMHAJUBdMFlCQBjAW2qwMSKwQcAdwFtBcL7iP4IAIkBbQV0QkQBnwN3w8C3VWmKCwCkC3BqBcFWRQG4EXfEOjrAxYrB/2oRAMnZdFKI/klkwf/BBRMEqSV3YsBqWZxYxEkB3jKAwgTFNDcuZRAAtz13BX77McL//sF8A8XdOcnDDgDeRHeAdMUowMENAPtfVYeEimrBBwCuYj9AQ0wBpmd3a8DDAKoiAsBTBgCotABIigQAoHZ9wrQHBOJ5BlL9/wXFP4IhwXcMAHqGMjvFdP5uCwB7jDg3QrVKCABekXC9wfuKBQA4k2ldxgCI3oHBBQBAlaf/S0IBYJdteFXCAKjTB0FKCwCMXnrEisOL/10HAGmfFBlKDgCkp4lGwsWLwW2FBwBmdvQ3egQAv7QTwI8HBCK4+jj9wgXFvMVa/lsFAD/Lp2IISmXN9P7+/4ZQ+00BXdRpwMAFbQ9aHgnkwEww9gUEL9X6wCsDAGPdFLUVAOvkk2gG/o/HWn7BBgCGLgZEtAUAzewTVMAAcLAHRBAQ0ANlkIa1wMNyZQMQqgc5iAcQVglM/TuFAlp6CS3Gwf87BRTPChrDKwQQdAsecgIQ0TQ6/sYQpkYowwUQrQ/nwRhMEV0RUP7+uwQUcxRgfgUQguUQ+7X6BBDlI0A+wgdaOSRawgUQuSYTi/78BRBtLYPF+LUEEHsuGsHlERRQMdP//f7C8P74Gf9VBBBRNqWXAFpWNklpBBCbOU0/AhB9OzT+wRB8d0JdAxDkP4b+B1pPQUzBUkLFC0dLAQALRVIAAAAAAAAA',0,8);
/*!40000 ALTER TABLE `hr_biotemplate` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `hr_company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hr_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cmp_code` varchar(10) DEFAULT NULL,
  `cmp_dateformat` varchar(64) DEFAULT NULL,
  `cmp_timeformat` varchar(64) DEFAULT NULL,
  `cmp_name` varchar(64) NOT NULL,
  `cmp_operationmode` int(11) DEFAULT NULL,
  `cmp_address1` text DEFAULT NULL,
  `cmp_address2` text DEFAULT NULL,
  `cmp_city` varchar(64) DEFAULT NULL,
  `cmp_state` varchar(64) DEFAULT NULL,
  `cmp_country` varchar(64) DEFAULT NULL,
  `cmp_postal` varchar(6) DEFAULT NULL,
  `cmp_phone` varchar(13) DEFAULT NULL,
  `cmp_fax` varchar(13) DEFAULT NULL,
  `cmp_email` varchar(64) DEFAULT NULL,
  `cmp_logo` mediumblob DEFAULT NULL,
  `cmp_showlogoInreport` tinyint(1) DEFAULT NULL,
  `cmp_website` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `hr_company` WRITE;
/*!40000 ALTER TABLE `hr_company` DISABLE KEYS */;
INSERT INTO `hr_company` VALUES (1,'1',NULL,NULL,'Feu Cavite',0,'','','','','','','','','','',0,'');
/*!40000 ALTER TABLE `hr_company` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `hr_delete_employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hr_delete_employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_pin` varchar(255) NOT NULL,
  `terminal_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `hr_delete_employee` WRITE;
/*!40000 ALTER TABLE `hr_delete_employee` DISABLE KEYS */;
INSERT INTO `hr_delete_employee` VALUES (1,'20160047',1),(2,'20160002',1),(3,'222',1),(4,'20190001',1),(5,'20190004',1),(6,'20190009',1),(7,'20190001',1),(8,'20190002',1),(9,'20190003',1),(10,'20190004',1),(11,'20190005',1);
/*!40000 ALTER TABLE `hr_delete_employee` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `hr_department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hr_department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_code` int(11) NOT NULL,
  `dept_name` varchar(64) NOT NULL,
  `dept_parentcode` int(11) NOT NULL,
  `useCode` tinyint(1) DEFAULT NULL,
  `dept_operationmode` int(11) DEFAULT NULL,
  `middleware_id` bigint(20) DEFAULT NULL,
  `defaultDepartment` int(11) DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`),
  CONSTRAINT `FK9B3B5975F2CD5742` FOREIGN KEY (`company_id`) REFERENCES `hr_company` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `hr_department` WRITE;
/*!40000 ALTER TABLE `hr_department` DISABLE KEYS */;
INSERT INTO `hr_department` VALUES (1,1,'Tourism',0,1,0,0,1,1),(2,2,'Information Technology',0,1,0,0,0,1),(3,3,'Psychology',0,1,0,0,0,1),(4,4,'HRM',0,1,0,0,0,1),(5,5,'Education',0,1,0,0,0,1),(6,6,'Business Admin',0,1,0,0,0,1),(7,7,'NSTP',0,1,0,0,0,1),(8,8,'Non-Faculty',0,1,0,0,0,1);
/*!40000 ALTER TABLE `hr_department` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `hr_employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hr_employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_pin` varchar(9) NOT NULL,
  `emp_ssn` varchar(64) DEFAULT NULL,
  `emp_role` varchar(64) DEFAULT NULL,
  `emp_firstname` varchar(64) NOT NULL,
  `emp_lastname` varchar(64) DEFAULT NULL,
  `emp_username` varchar(64) DEFAULT NULL,
  `emp_pwd` varchar(64) DEFAULT NULL,
  `emp_timezone` varchar(64) DEFAULT NULL,
  `emp_phone` varchar(13) DEFAULT NULL,
  `emp_payroll_id` varchar(64) DEFAULT NULL,
  `emp_payroll_type` varchar(64) DEFAULT NULL,
  `emp_pin2` varchar(64) DEFAULT NULL,
  `emp_photo` mediumblob DEFAULT NULL,
  `emp_privilege` varchar(64) DEFAULT NULL,
  `emp_group` varchar(64) DEFAULT NULL,
  `emp_hiredate` datetime DEFAULT NULL,
  `emp_address` varchar(64) DEFAULT NULL,
  `emp_active` int(11) NOT NULL,
  `emp_firedate` datetime DEFAULT NULL,
  `emp_firereason` text DEFAULT NULL,
  `emp_emergencyphone1` varchar(13) DEFAULT NULL,
  `emp_emergencyphone2` varchar(13) DEFAULT NULL,
  `emp_emergencyname` varchar(64) DEFAULT NULL,
  `emp_emergencyaddress` varchar(64) DEFAULT NULL,
  `emp_cardNumber` varchar(24) DEFAULT NULL,
  `emp_country` varchar(64) DEFAULT NULL,
  `emp_city` varchar(64) DEFAULT NULL,
  `emp_state` varchar(64) DEFAULT NULL,
  `emp_postal` varchar(6) DEFAULT NULL,
  `emp_fax` varchar(13) DEFAULT NULL,
  `emp_email` varchar(64) DEFAULT NULL,
  `emp_title` varchar(64) DEFAULT NULL,
  `emp_hourlyrate1` decimal(19,5) DEFAULT NULL,
  `emp_hourlyrate2` decimal(19,5) DEFAULT NULL,
  `emp_hourlyrate3` decimal(19,5) DEFAULT NULL,
  `emp_hourlyrate4` decimal(19,5) DEFAULT NULL,
  `emp_hourlyrate5` decimal(19,5) DEFAULT NULL,
  `emp_gender` int(11) DEFAULT NULL,
  `emp_birthday` datetime DEFAULT NULL,
  `emp_operationmode` int(11) DEFAULT NULL,
  `IsSelect` int(11) DEFAULT NULL,
  `middleware_id` bigint(20) DEFAULT NULL,
  `nationalID` varchar(64) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `department_id` (`department_id`),
  CONSTRAINT `FK93228DC1CDB5DF20` FOREIGN KEY (`department_id`) REFERENCES `hr_department` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `hr_employee` WRITE;
/*!40000 ALTER TABLE `hr_employee` DISABLE KEYS */;
INSERT INTO `hr_employee` VALUES (1,'20190001','','','John','Kenneth','','','','09058339643','','','','','0','','2019-11-02 00:00:00','Silang, Cavite',1,'2020-11-02 00:00:00','','09033558261','','Gola Kenneth','Silang, Cavite','','Philippines','Cavite','Cavite','4102','','John12@gmail.com','Professor',0.00000,0.00000,0.00000,0.00000,0.00000,0,'2019-11-21 00:00:00',0,0,0,'',2),(2,'20190002','','','Howard','Lapus','','','','09184593827','','','','','0','','2019-11-04 00:00:00','Imus, Cavite',1,NULL,'','09119682274','','Paco Lapus','Imus, Cavite','','Philippines','Imus','Cavite','4102','','howard@gmail.com','Coordinator',0.00000,0.00000,0.00000,0.00000,0.00000,0,'2019-11-24 00:00:00',0,0,0,'',3),(3,'20190003','','','Mae','Sagin','','','','09055114928','','','','','0','','2019-11-02 00:00:00','Bacoor, Cavite',1,NULL,'','09527995834','','Max Sagin','Imus, Cavite','','Philippines','Bacoor','Cavite','4102','','Msagin@gmail.com','Professor',0.00000,0.00000,0.00000,0.00000,0.00000,1,'1991-12-10 00:00:00',0,0,0,'',1),(4,'20190004','','','Joan','Cy','','','','09684775927','','','','','0','','2019-11-02 00:00:00','Bacoor, Cavite',1,NULL,'','09055883927','','Anjo Cy','Bacoor, Cavite','','Philippines','Bacoor','Cavite','4102','','C@gmail.com','Professor',0.00000,0.00000,0.00000,0.00000,0.00000,1,'1988-11-16 00:00:00',0,0,0,'',4),(5,'20190005','','','Mary','Wiltz','','','','09058371164','','','','','0','','2019-11-02 00:00:00','Tagaytay, Cavite',1,NULL,'','09569448321','','Bal Wiltz','Alfonso, Cavite','','Philippines','Tagaytay','Cavite','4102','','MWlitz@gmail.com','Coordinator',0.00000,0.00000,0.00000,0.00000,0.00000,1,'1997-11-13 00:00:00',0,0,0,'',5),(6,'20190006','','','Ron','Vald','','','','0958339573','','','','','0','','2019-11-02 00:00:00','Alfonso, Cavite',1,NULL,'','09066995832','','Ran Vald','Alfonso, Cavite','','Philippines','Alfonso','Cavite','4103','','Vald@gmail.com','Coordinator',0.00000,0.00000,0.00000,0.00000,0.00000,0,'1998-11-04 00:00:00',0,0,0,'',7),(7,'20190007','','','Floyd','Kaye','','','','09059380028','','','','','0','','2019-11-02 00:00:00','Silang, Cavite',1,NULL,'','0955839271','','Gero Kaye','Silang, Cavite','','Philippines','Dasma','Cavite','4102','','Flo@gmail.com','Professor',0.00000,0.00000,0.00000,0.00000,0.00000,0,'1994-11-10 00:00:00',0,0,0,'',6),(8,'20190008','','','Rea','Gil','','','','09055392817','','','','','0','','2019-11-02 00:00:00','Tagaytay, Cavite',1,NULL,'','09066884927','','Fild Gil','Tagaytay, Cavite','','Philippines','Tagaytay','Cavite','4104','','ReaG@gmail.com','Librarian',0.00000,0.00000,0.00000,0.00000,0.00000,1,'1997-11-28 00:00:00',0,0,0,'',8);
/*!40000 ALTER TABLE `hr_employee` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `hr_employee_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hr_employee_group` (
  `employee_id` int(11) NOT NULL,
  `groupItem_id` int(11) NOT NULL,
  KEY `groupItem_id` (`groupItem_id`),
  KEY `employee_id` (`employee_id`),
  CONSTRAINT `FK_EmployeeGroup` FOREIGN KEY (`employee_id`) REFERENCES `hr_employee` (`id`),
  CONSTRAINT `FK_GroupEmployee` FOREIGN KEY (`groupItem_id`) REFERENCES `hr_groupitem` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `hr_employee_group` WRITE;
/*!40000 ALTER TABLE `hr_employee_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `hr_employee_group` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `hr_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hr_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(64) NOT NULL,
  `employees` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `hr_group` WRITE;
/*!40000 ALTER TABLE `hr_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `hr_group` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `hr_groupitem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hr_groupitem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grp_item_id` int(11) NOT NULL,
  `grp_item_desc` varchar(64) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`),
  CONSTRAINT `FK263AEC8DC3D7F91B` FOREIGN KEY (`group_id`) REFERENCES `hr_group` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `hr_groupitem` WRITE;
/*!40000 ALTER TABLE `hr_groupitem` DISABLE KEYS */;
/*!40000 ALTER TABLE `hr_groupitem` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `hr_holiday_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hr_holiday_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hor_code` int(11) DEFAULT NULL,
  `hor_name` varchar(255) DEFAULT NULL,
  `HolidaysOTEnabled` tinyint(1) DEFAULT NULL,
  `HolidaysOT1Limit` decimal(19,5) DEFAULT NULL,
  `HolidaysOT2Limit` decimal(19,5) DEFAULT NULL,
  `HolidaysOT3Limit` decimal(19,5) DEFAULT NULL,
  `hor_cycleType` int(11) DEFAULT NULL,
  `hor_days` int(11) DEFAULT NULL,
  `hor_date` datetime DEFAULT NULL,
  `hor_month_cycleYear` int(11) DEFAULT NULL,
  `hor_day_cycleYear` int(11) DEFAULT NULL,
  `hor_month_cycleDate` int(11) DEFAULT NULL,
  `hor_weeks_cycleDate` int(11) DEFAULT NULL,
  `hor_week_cycleDate` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`),
  CONSTRAINT `FK2463BBCCF2CD5742` FOREIGN KEY (`company_id`) REFERENCES `hr_company` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `hr_holiday_details` WRITE;
/*!40000 ALTER TABLE `hr_holiday_details` DISABLE KEYS */;
INSERT INTO `hr_holiday_details` VALUES (1,2,'Thanksgiving',0,0.00000,0.00000,0.00000,1,1,'2019-10-21 00:00:00',10,21,0,0,0,1);
/*!40000 ALTER TABLE `hr_holiday_details` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `hr_payclass`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hr_payclass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `SundayOT1Limit` decimal(19,5) DEFAULT NULL,
  `SundayOT2Limit` decimal(19,5) DEFAULT NULL,
  `SundayOT3Limit` decimal(19,5) DEFAULT NULL,
  `MondayOT1Limit` decimal(19,5) DEFAULT NULL,
  `MondayOT2Limit` decimal(19,5) DEFAULT NULL,
  `MondayOT3Limit` decimal(19,5) DEFAULT NULL,
  `TuesdayOT1Limit` decimal(19,5) DEFAULT NULL,
  `TuesdayOT2Limit` decimal(19,5) DEFAULT NULL,
  `TuesdayOT3Limit` decimal(19,5) DEFAULT NULL,
  `WednesdayOT1Limit` decimal(19,5) DEFAULT NULL,
  `WednesdayOT2Limit` decimal(19,5) DEFAULT NULL,
  `WednesdayOT3Limit` decimal(19,5) DEFAULT NULL,
  `ThursdayOT1Limit` decimal(19,5) DEFAULT NULL,
  `ThursdayOT2Limit` decimal(19,5) DEFAULT NULL,
  `ThursdayOT3Limit` decimal(19,5) DEFAULT NULL,
  `FridayOT1Limit` decimal(19,5) DEFAULT NULL,
  `FridayOT2Limit` decimal(19,5) DEFAULT NULL,
  `FridayOT3Limit` decimal(19,5) DEFAULT NULL,
  `SaturdayOT1Limit` decimal(19,5) DEFAULT NULL,
  `SaturdayOT2Limit` decimal(19,5) DEFAULT NULL,
  `SaturdayOT3Limit` decimal(19,5) DEFAULT NULL,
  `WeekendsOTEnabled` tinyint(1) DEFAULT NULL,
  `WeekendsOT1Limit` decimal(19,5) DEFAULT NULL,
  `WeekendsOT2Limit` decimal(19,5) DEFAULT NULL,
  `WeekendsOT3Limit` decimal(19,5) DEFAULT NULL,
  `WeekendSet` varchar(20) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`),
  CONSTRAINT `FK3210FA9BF2CD5742` FOREIGN KEY (`company_id`) REFERENCES `hr_company` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `hr_payclass` WRITE;
/*!40000 ALTER TABLE `hr_payclass` DISABLE KEYS */;
INSERT INTO `hr_payclass` VALUES (1,0.00000,1.00000,20.00000,8.00000,20.00000,23.00000,8.00000,20.00000,23.00000,8.00000,20.00000,23.00000,8.00000,20.00000,23.00000,1.00000,20.00000,23.00000,0.00000,1.00000,20.00000,1,8.00000,11.00000,14.00000,'6,0,',1);
/*!40000 ALTER TABLE `hr_payclass` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `hr_paycode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hr_paycode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pc_code` int(11) NOT NULL,
  `pc_desc` varchar(32) DEFAULT NULL,
  `pc_type` int(11) DEFAULT NULL,
  `export_code` varchar(32) DEFAULT NULL,
  `pc_delete` tinyint(1) DEFAULT NULL,
  `sign` varchar(2) DEFAULT NULL,
  `min_value` decimal(19,5) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `round_type` int(11) DEFAULT NULL,
  `deduct` tinyint(1) DEFAULT NULL,
  `yearlyLimit` decimal(19,5) DEFAULT NULL,
  `pc_Mode` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `hr_paycode` WRITE;
/*!40000 ALTER TABLE `hr_paycode` DISABLE KEYS */;
/*!40000 ALTER TABLE `hr_paycode` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `hr_template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hr_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `effective` int(11) NOT NULL,
  `template_type` int(11) DEFAULT NULL,
  `template_len` int(11) DEFAULT NULL,
  `template_str` mediumtext DEFAULT NULL,
  `isForce` int(11) DEFAULT NULL,
  `flag` int(11) DEFAULT NULL,
  `template_index` int(11) NOT NULL,
  `action_group` int(11) DEFAULT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `pwd_str` varchar(255) DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_id` (`employee_id`),
  CONSTRAINT `FKC59C763C50F52429` FOREIGN KEY (`employee_id`) REFERENCES `hr_employee` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `hr_template` WRITE;
/*!40000 ALTER TABLE `hr_template` DISABLE KEYS */;
/*!40000 ALTER TABLE `hr_template` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `middle_message_id` bigint(20) NOT NULL,
  `message_code` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime DEFAULT NULL,
  `title` varchar(64) NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `message_type` int(11) DEFAULT NULL,
  `send_emp_id` int(11) DEFAULT NULL,
  `zone_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `send_emp_id` (`send_emp_id`),
  KEY `zone_id` (`zone_id`),
  CONSTRAINT `FK_MessageSendEmployee` FOREIGN KEY (`send_emp_id`) REFERENCES `hr_employee` (`id`),
  CONSTRAINT `FK_ZoneMessage` FOREIGN KEY (`zone_id`) REFERENCES `att_zone` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
/*!40000 ALTER TABLE `message` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `message2entity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message2entity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `readed` int(11) NOT NULL,
  `accept_emp_id` int(11) DEFAULT NULL,
  `message_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `accept_emp_id` (`accept_emp_id`,`message_id`),
  KEY `accept_emp_id_2` (`accept_emp_id`),
  KEY `message_id` (`message_id`),
  CONSTRAINT `FK_MessageAcceptEmployee` FOREIGN KEY (`accept_emp_id`) REFERENCES `hr_employee` (`id`),
  CONSTRAINT `FK_MessageEntity` FOREIGN KEY (`message_id`) REFERENCES `message` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `message2entity` WRITE;
/*!40000 ALTER TABLE `message2entity` DISABLE KEYS */;
/*!40000 ALTER TABLE `message2entity` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2018_09_12_99999_create_backupverify_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2019_09_13_063257_create_permission_tables',1),(6,'2019_10_14_033616_payslip',1),(7,'2019_10_17_033124_sss_table',1),(8,'2019_10_27_120021_create_audits_table',1),(9,'2019_11_10_123207_anfsd',1),(10,'2019_11_12_030102_anfpayroll',1),(11,'2019_11_15_015614_addemployee',1),(12,'2019_11_15_102056_costcenter',1),(13,'2019_11_17_160309_reportsapproval',1),(14,'2019_11_18_184017_create_password_securities_table',1),(15,'2019_11_28_014907_employement_status',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\User',1),(2,'App\\User',2),(3,'App\\User',3),(6,'App\\User',4);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `password_securities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_securities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `password_expiry_days` tinyint(4) NOT NULL,
  `password_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `password_securities` WRITE;
/*!40000 ALTER TABLE `password_securities` DISABLE KEYS */;
INSERT INTO `password_securities` VALUES (1,1,30,'2019-12-08 05:23:26','2019-12-08 05:23:26','2019-12-08 05:23:26'),(2,2,30,'2019-12-08 05:23:26','2019-12-08 05:23:26','2019-12-08 05:23:26'),(3,3,30,'2019-12-08 05:23:26','2019-12-08 05:23:26','2019-12-08 05:23:26'),(4,4,30,'2019-12-08 05:23:26','2019-12-08 05:23:26','2019-12-08 05:23:26');
/*!40000 ALTER TABLE `password_securities` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `payslip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payslip` (
  `payslip` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `less_absence` int(11) NOT NULL,
  `recordsFrom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recordsTo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pagibig_contri_amt` double(8,2) DEFAULT NULL,
  `pagibig_contri_add` double(8,2) DEFAULT NULL,
  `sss_loan_amt` double(8,2) DEFAULT NULL,
  `sss_loan_add` double(8,2) DEFAULT NULL,
  `pagibig_loan_amt` double(8,2) DEFAULT NULL,
  `pagibig_loan_add` double(8,2) DEFAULT NULL,
  `otOne` double(8,2) DEFAULT NULL,
  `otTwo` double(8,2) DEFAULT NULL,
  `p_basic_pay` double(8,2) DEFAULT NULL,
  `p_absences` double(8,2) DEFAULT NULL,
  `p_adjustment` double(8,2) DEFAULT NULL,
  `p_net_basic` double(8,2) DEFAULT NULL,
  `p_cost_of_living_allowance` double(8,2) DEFAULT NULL,
  `p_honorarium` double(8,2) DEFAULT NULL,
  `p_overtime` double(8,2) DEFAULT NULL,
  `p_over_load` double(8,2) DEFAULT NULL,
  `p_others` double(8,2) DEFAULT NULL,
  `p_hold_salary_pay_out` double(8,2) DEFAULT NULL,
  `p_total_earnings` double(8,2) DEFAULT NULL,
  `p_sss_contribution` double(8,2) DEFAULT NULL,
  `p_philhealth_contribution` double(8,2) DEFAULT NULL,
  `p_pagibig_contribution` double(8,2) DEFAULT NULL,
  `p_sss_loan` double(8,2) DEFAULT NULL,
  `p_pagibig_loan` double(8,2) DEFAULT NULL,
  `p_tax_withheld` double(8,2) DEFAULT NULL,
  `p_cash_advance` double(8,2) DEFAULT NULL,
  `p_retirement_contributon` double(8,2) DEFAULT NULL,
  `p_christmas_loan` double(8,2) DEFAULT NULL,
  `p_retirement_loan` double(8,2) DEFAULT NULL,
  `p_others_adjustment` double(8,2) DEFAULT NULL,
  `p_others_payable_realty` double(8,2) DEFAULT NULL,
  `p_total_deductions` double(8,2) DEFAULT NULL,
  `p_first_half_pay` double(8,2) DEFAULT NULL,
  `p_second_half_pay` double(8,2) DEFAULT NULL,
  `p_monthly_pay` double(8,2) DEFAULT NULL,
  `p_thirteen_month_pay` double(8,2) DEFAULT NULL,
  `p_total_non_taxable` double(8,2) DEFAULT NULL,
  `p_taxable_income` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin_approval` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `first_status_pay` tinyint(1) DEFAULT NULL,
  `second_status_pay` tinyint(1) DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hidden_absences` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_salary` double(8,2) DEFAULT NULL,
  `a_daily_rate` double(8,2) DEFAULT NULL,
  `a_rate_per_hour` double(8,2) DEFAULT NULL,
  `a_rate_per_hour_old` double(8,2) DEFAULT NULL,
  `a_mins` double(8,2) DEFAULT NULL,
  `a_basic` double(8,2) DEFAULT NULL,
  `a_emolument` double(8,2) DEFAULT NULL,
  `a_total_basic_salary` double(8,2) DEFAULT NULL,
  `a_load_units` double(8,2) DEFAULT NULL,
  `a_laboratory_total_units` double(8,2) DEFAULT NULL,
  `a_laboratory_total_hours` double(8,2) DEFAULT NULL,
  `a_total_hours` double(8,2) DEFAULT NULL,
  `a_overload` double(8,2) DEFAULT NULL,
  PRIMARY KEY (`payslip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `payslip` WRITE;
/*!40000 ALTER TABLE `payslip` DISABLE KEYS */;
/*!40000 ALTER TABLE `payslip` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'Developers_User_Manangement','web','2019-12-08 05:23:26','2019-12-08 05:23:26'),(2,'Developers_User_Roles','web','2019-12-08 05:23:26','2019-12-08 05:23:26'),(3,'role-list','web','2019-12-08 05:23:26','2019-12-08 05:23:26'),(4,'role-create','web','2019-12-08 05:23:26','2019-12-08 05:23:26'),(5,'role-edit','web','2019-12-08 05:23:26','2019-12-08 05:23:26'),(6,'role-delete','web','2019-12-08 05:23:26','2019-12-08 05:23:26'),(7,'Dashboard_Total_Employees','web','2019-12-08 05:23:26','2019-12-08 05:23:26'),(8,'Dashboard_Total_Department','web','2019-12-08 05:23:26','2019-12-08 05:23:26'),(9,'SuperAdmin_User_Management','web','2019-12-08 05:23:26','2019-12-08 05:23:26'),(10,'audit-trail','web','2019-12-08 05:23:26','2019-12-08 05:23:26'),(11,'CoAdmin','web','2019-12-08 05:23:26','2019-12-08 05:23:26'),(12,'Admin','web','2019-12-08 05:23:26','2019-12-08 05:23:26'),(13,'database','web','2019-12-08 05:23:26','2019-12-08 05:23:26'),(14,'Dashboard_Payslip','web','2019-12-08 05:23:26','2019-12-08 05:23:26'),(15,'Dashboard_Checkin','web','2019-12-08 05:23:26','2019-12-08 05:23:26'),(16,'Dashboard_Checkout','web','2019-12-08 05:23:26','2019-12-08 05:23:26'),(17,'profile','web','2019-12-08 05:23:26','2019-12-08 05:23:26'),(18,'payslip','web','2019-12-08 05:23:26','2019-12-08 05:23:26'),(19,'time_logs','web','2019-12-08 05:23:26','2019-12-08 05:23:26'),(20,'HR','web','2019-12-08 05:23:26','2019-12-08 05:23:26');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `pushqueue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pushqueue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Content` text NOT NULL,
  `Destination` varchar(32) NOT NULL,
  `cuser1` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `pushqueue` WRITE;
/*!40000 ALTER TABLE `pushqueue` DISABLE KEYS */;
/*!40000 ALTER TABLE `pushqueue` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `reportsapproval`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reportsapproval` (
  `approval_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `report_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_approval_reports` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`approval_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `reportsapproval` WRITE;
/*!40000 ALTER TABLE `reportsapproval` DISABLE KEYS */;
/*!40000 ALTER TABLE `reportsapproval` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `reporttemplate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reporttemplate` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(64) NOT NULL,
  `Template` longblob DEFAULT NULL,
  `ReportID` varchar(64) NOT NULL,
  `Name` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `reporttemplate` WRITE;
/*!40000 ALTER TABLE `reporttemplate` DISABLE KEYS */;
/*!40000 ALTER TABLE `reporttemplate` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (7,1),(7,2),(7,3),(7,6),(8,1),(8,2),(8,3),(8,6),(9,1),(10,1),(11,3),(12,2),(13,1),(14,4),(14,5),(15,4),(15,5),(16,4),(16,5),(17,4),(17,5),(18,4),(18,5),(19,4),(19,5),(20,6);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Super Admin','web','2019-12-08 05:23:26','2019-12-08 05:23:26'),(2,'Admin','web','2019-12-08 05:23:26','2019-12-08 05:23:26'),(3,'Co-Admin','web','2019-12-08 05:23:26','2019-12-08 05:23:26'),(4,'Non-Faculty','web','2019-12-08 05:23:26','2019-12-08 05:23:26'),(5,'Faculty','web','2019-12-08 05:23:26','2019-12-08 05:23:26'),(6,'HR','web','2019-12-08 05:23:26','2019-12-08 05:23:26');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `sss_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sss_table` (
  `sss_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `low_compensation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `high_compensation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monthly_salary_detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ss_er` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ss_ee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sss_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ec_er` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tc_er` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tc_ee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tc_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`sss_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `sss_table` WRITE;
/*!40000 ALTER TABLE `sss_table` DISABLE KEYS */;
INSERT INTO `sss_table` VALUES (1,'BELOW','2250','2000','160','80','240','10','170','80','250','April','2019',NULL,NULL),(2,'2250',' 2749.99','2500','200','100','300','10','210','100','310','April','2019',NULL,NULL),(3,'2750','3249.99','3000','240','120','360','10','250','120','370','April','2019',NULL,NULL),(4,'3250','3749.99','3500','280','140','420','10','290','140','430','April','2019',NULL,NULL),(5,'3750','4249.99','4000','320.00','160.00','480','10','330','160','490','April','2019',NULL,NULL),(6,'4250','4749.99','4500','360','180','540','10','370','180','550','April','2019',NULL,NULL),(7,'4750','5249.99','5000','400','200','600','10','410','200','610','April','2019',NULL,NULL),(8,'5250','5749.99','5500','440','220','660','10','450','220','670','April','2019',NULL,NULL),(9,'5750','6249.99','6000','480','240','720','10','490','240','730','April','2019',NULL,NULL),(10,'6250','6749.99','6500','520','260','780','10','530','260','790','April','2019',NULL,NULL),(11,'6750','7249.99','7000','560','280','840','10','570','280','850','April','2019',NULL,NULL),(12,'7250','7749.99','7500','600','300','900','10','610','300','910','April','2019',NULL,NULL),(13,'7750','8249.99','8000','640','320','960','10','650','320','970','April','2019',NULL,NULL),(14,'8250','8749.99','8500','680','340','1020','10','690','340','1030','April','2019',NULL,NULL),(15,'8750','9249.99','9000','720','360','1080','10','730','360','1090','April','2019',NULL,NULL),(16,'9250','9749.99','9500','760','380','1140','10','770','380','1150','April','2019',NULL,NULL),(17,'9750','10249.99','10000','800','400','1200','10','810','400','1210','April','2019',NULL,NULL),(18,'10250','10749.99','10500','840','420','1260','10','850','420','1270','April','2019',NULL,NULL),(19,'10760','11249.99','11000','880','440','1320','10','890','440','1330','April','2019',NULL,NULL),(20,'11250','11749.99','11500','920','460','1380','10','930','460','1390','April','2019',NULL,NULL),(21,'11750','12249.99','12000','960','480','1440','10','970','480','1450','April','2019',NULL,NULL),(22,'12250','12749.99','12500','1000','500','1500','10','1010','500','1510','April','2019',NULL,NULL),(23,'12750','13249.99','13000','1040','520','1560','10','1050','520','1570','April','2019',NULL,NULL),(24,'13250','13749.99','13500','1080','540','1620','10','1090','540','1630','April','2019',NULL,NULL),(25,'13750','14249.99','14000','1120','560','1680','10','1130','560','1690','April','2019',NULL,NULL),(26,'14250','14749.99','14500','1160','580','1740','10','1170','580','1750','April','2019',NULL,NULL),(27,'14750','15249.99','15000','1200','600','1800','30','1230','600','1830','April','2019',NULL,NULL),(28,'15250','15749.99','15500','1240','620','1860','30','1270','620','1890','April','2019',NULL,NULL),(29,'15750','16249.99','16000','1280','640','1920','30','1310','640','1950','April','2019',NULL,NULL),(30,'16250','16749.99','16500','1320','660','1980','30','1350','660','2010','April','2019',NULL,NULL),(31,'16750','17249.99','17000','1360','680','2040','30','1390','680','2070','April','2019',NULL,NULL),(32,'17250','17749.99','17500','1400','700','2100','30','1430','700','2130','April','2019',NULL,NULL),(33,'17750','18249.99','18000','1440','720','2160','30','1470','720','2190','April','2019',NULL,NULL),(34,'18250','18749.99','18500','1480','740','2220','30','1510','740','2250','April','2019',NULL,NULL),(35,'18750','19249.99','19000','1520','760','2280','30','1550','760','2310','April','2019',NULL,NULL),(36,'19250','19749.99','19500','1560','780','2340','30','1590','780','2370','April','2019',NULL,NULL),(37,'19750','ABOVE','20000','1600','800','2400','30','1630','800','2430','April','2019',NULL,NULL);
/*!40000 ALTER TABLE `sss_table` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `sys_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_config` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ConfigType` smallint(6) NOT NULL,
  `Data` longblob DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ConfigType` (`ConfigType`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `sys_config` WRITE;
/*!40000 ALTER TABLE `sys_config` DISABLE KEYS */;
INSERT INTO `sys_config` VALUES (1,4,'\0\0\0\0ÿÿÿÿ\0\0\0\0\0\0\0\0\0\0IZKTimeNet.Entities, Version=3.0.0.0, Culture=neutral, PublicKeyToken=null\0\0\0MZKTimeNet.Global.Core, Version=3.0.5.23, Culture=neutral, PublicKeyToken=null\0\0\0,ZKTimeNet.Entities.System.SystemOptionEntity\0\0\0<deletepunches>k__BackingField<dateformat>k__BackingField<timeformat>k__BackingField<calendartype>k__BackingField\0\"ZKTimeNet.Global.Core.CalendarType\0\0\0\0\0\0\0\0\0\nMM/dd/yyyy\0\0\0HH:mmúÿÿÿ\"ZKTimeNet.Global.Core.CalendarType\0\0\0value__\0\0\0\0\0\0\0\0'),(2,2,'\0\0\0\0ÿÿÿÿ\0\0\0\0\0\0\0\0\0\0IZKTimeNet.Entities, Version=3.0.0.0, Culture=neutral, PublicKeyToken=null\0\0\0.ZKTimeNet.Entities.System.CollectionDataEntity\0\0\0&<enabledCollectionData>k__BackingField<isFriday>k__BackingField<isMonday>k__BackingField<isSaturday>k__BackingField<isSunday>k__BackingField<isThursday>k__BackingField\Z<isTuesday>k__BackingField<isWednesday>k__BackingField<startAt>k__BackingField<isRepeat>k__BackingField<Interval>k__BackingField<collectTimes>k__BackingField<autoCalculate>k__BackingField<calculateTime>k__BackingField\0\0\0\0\0\0\0\0\0\0\0\0\0\r\r\0\0\0\0È0sšÏ5\0\0\0\0\0È0sšÏ');
/*!40000 ALTER TABLE `sys_config` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `sys_datafilter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_datafilter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datafilter_desc` varchar(64) NOT NULL,
  `data_ranger` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `sys_datafilter` WRITE;
/*!40000 ALTER TABLE `sys_datafilter` DISABLE KEYS */;
INSERT INTO `sys_datafilter` VALUES (1,'cmp','All');
/*!40000 ALTER TABLE `sys_datafilter` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `sys_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `TableName` varchar(50) DEFAULT NULL,
  `OperateType` varchar(50) DEFAULT NULL,
  `Operator` varchar(50) DEFAULT NULL,
  `log_date` datetime DEFAULT NULL,
  `message` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=221 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `sys_log` WRITE;
/*!40000 ALTER TABLE `sys_log` DISABLE KEYS */;
INSERT INTO `sys_log` VALUES (1,'','Login','admin','2019-10-17 22:11:26','Login System'),(2,'','DataSync','admin','2019-10-17 22:11:30','Data sync with linux device'),(3,'Terminal','Search','admin','2019-10-17 22:11:42','Add 1 Device . Update 0 Device'),(4,'','DataSync','admin','2019-10-17 22:11:45','Data sync with linux device'),(5,'','','admin','2019-10-17 22:12:04','Search Employees Transaction'),(6,'','','admin','2019-10-17 22:12:05','Search Employees Transaction'),(7,'','Login','admin','2019-10-18 16:06:02','Login System'),(8,'','Login','admin','2019-10-18 20:38:51','Login System'),(9,'Shift','Delete','admin','2019-10-18 20:41:28','Delete employee(Vin.Battad)'),(10,'Department','Create','admin','2019-10-18 21:00:49','Add department(Non Faculty)'),(11,'Department','Create','admin','2019-10-18 21:01:46','Add department(BSIT)'),(12,'Department','Create','admin','2019-10-18 21:03:08','Add department(Coordinator)'),(13,'Department','Create','admin','2019-10-18 21:03:36','Add department(Faculty)'),(14,'Employee','Create','admin','2019-10-18 21:06:17','Add Employee France.Ritz'),(15,'Template','Create','admin','2019-10-18 21:07:40','Add A Fingerprint France.Ritz'),(16,'Employee','Update','admin','2019-10-18 21:07:44','Update employee(France.Ritz)'),(17,'Employee','Create','admin','2019-10-18 21:08:58','Add Employee Lee.Wong'),(18,'Template','Create','admin','2019-10-18 21:09:28','Add A Fingerprint Lee.Wong'),(19,'Employee','Update','admin','2019-10-18 21:09:32','Update employee(Lee.Wong)'),(20,'Employee','Create','admin','2019-10-18 21:11:17','Add Employee Alice.Gray'),(21,'Template','Create','admin','2019-10-18 21:11:42','Add A Fingerprint Alice.Gray'),(22,'Employee','Update','admin','2019-10-18 21:11:46','Update employee(Alice.Gray)'),(23,'Employee','Create','admin','2019-10-18 21:12:38','Add Employee Robert.Floyd'),(24,'Template','Create','admin','2019-10-18 21:13:40','Add A Fingerprint France.Ritz'),(25,'Template','Create','admin','2019-10-18 21:14:35','Add A Fingerprint Alice.Gray'),(26,'Template','Create','admin','2019-10-18 21:16:44','Add A Fingerprint Robert.Floyd'),(27,'Employee','Create','admin','2019-10-18 21:17:21','Add Employee Gin.Miguel'),(28,'Template','Create','admin','2019-10-18 21:17:38','Add A Fingerprint Gin.Miguel'),(29,'Template','Create','admin','2019-10-18 21:17:53','Add A Fingerprint Gin.Miguel'),(30,'Rules','Update','admin','2019-10-18 21:18:11','Update Rules information'),(31,'Rules','Update','admin','2019-10-18 21:26:26','Update Rules information'),(32,'TimeTable','Create','admin','2019-10-18 21:48:36','Add A Timetable (For Non Faculty)'),(33,'TimeTable','Update','admin','2019-10-18 21:54:14','Update Timetable(For Non Faculty)'),(34,'Shift','Create','admin','2019-10-18 22:00:29','Add a Shift(FNF1)'),(35,'TimeTable','Create','admin','2019-10-18 22:44:48','Add A Timetable (For Coord1)'),(36,'TimeTable','Update','admin','2019-10-18 22:50:11','Update Timetable(For Coord1)'),(37,'TimeTable','Update','admin','2019-10-18 23:14:10','Update Timetable(For Coord1)'),(38,'TimeTable','Create','admin','2019-10-18 23:17:09','Add A Timetable (For Coord2)'),(39,'TimeTable','Update','admin','2019-10-18 23:18:03','Update Timetable(For Coord2 and 3)'),(40,'TimeTable','Create','admin','2019-10-18 23:19:18','Add A Timetable (For Coord4)'),(41,'Shift','Create','admin','2019-10-18 23:20:30','Add a Shift(Coords)'),(42,'TimeTable','Update','admin','2019-10-18 23:20:52','Update Timetable(For Coord4)'),(43,'TimeTable','Update','admin','2019-10-18 23:21:06','Update Timetable(For Coord2 and 3)'),(44,'TimeTable','Update','admin','2019-10-18 23:21:13','Update Timetable(For Coord1)'),(45,'TimeTable','Update','admin','2019-10-18 23:21:46','Update Timetable(For Coord1)'),(46,'TimeTable','Update','admin','2019-10-18 23:21:51','Update Timetable(For Coord2 and 3)'),(47,'TimeTable','Update','admin','2019-10-18 23:21:56','Update Timetable(For Coord4)'),(48,'Employee','Update','admin','2019-10-18 23:48:29','Update employee(Lee.Wong)'),(49,'Employee','Update','admin','2019-10-18 23:53:07','Update employee(Lee.Wong)'),(50,'Employee','Update','admin','2019-10-19 00:04:00','Update employee(Lee.Wong)'),(51,'','Login','admin','2019-10-19 08:32:10','Login System'),(52,'Employee','Update','admin','2019-10-19 08:32:42','Update employee(Lee.Wong)'),(53,'Employee','Update','admin','2019-10-19 08:32:49','Update employee(Lee.Wong)'),(54,'Employee','Update','admin','2019-10-19 08:32:50','Update employee(Lee.Wong)'),(55,'','Login','admin','2019-10-19 10:02:57','Login System'),(56,'Company','Update','admin','2019-10-19 10:05:20','Update company information'),(57,'Employee','Update','admin','2019-10-19 11:21:29','Update employee(France.Ritz)'),(58,'Employee','Update','admin','2019-10-19 11:21:29','Update employee(France.Ritz)'),(59,'Employee','Update','admin','2019-10-19 11:21:52','Update employee(France.Ritz)'),(60,'Employee','Update','admin','2019-10-19 11:21:52','Update employee(France.Ritz)'),(61,'','Login','admin','2019-10-19 18:12:59','Login System'),(62,'','Login','admin','2019-10-19 19:55:32','Login System'),(63,'','Login','admin','2019-10-19 23:33:27','Login System'),(64,'','Export','admin','2019-10-20 00:13:49','Export Employee'),(65,'','Login','admin','2019-11-01 10:22:17','Login System'),(66,'','','admin','2019-11-01 10:24:26','Update system\'s Basic Setting'),(67,'TimeTable','Update','admin','2019-11-01 10:25:43','Update Timetable(For Non Faculty)'),(68,'Shift','Create','admin','2019-11-01 10:26:05','Add a Shift(non)'),(69,'Shift','Update','admin','2019-11-01 10:26:10','Update Shift(non)'),(70,'Shift','Update','admin','2019-11-01 10:26:24','Update Shift(non)'),(71,'Shift','Update','admin','2019-11-01 10:26:25','Update Shift(non)'),(72,'Shift','Update','admin','2019-11-01 10:26:25','Update Shift(non)'),(73,'','Login','admin','2019-11-01 17:22:08','Login System'),(74,'','Login','admin','2019-11-01 17:33:47','Login System'),(75,'','','admin','2019-11-01 17:36:56','Save plan task settings succeed'),(76,'','','admin','2019-11-01 17:39:14','Update system\'s Basic Setting'),(77,'','','admin','2019-11-01 17:39:28','Save plan task settings succeed'),(78,'','','admin','2019-11-01 17:39:33','Save plan task settings succeed'),(79,'','','admin','2019-11-01 17:39:45','Save plan task settings succeed'),(80,'','Login','admin','2019-11-02 15:42:10','Login System'),(81,'Shift','Delete','admin','2019-11-02 15:45:20','Delete employee(France.Ritz)'),(82,'Shift','Delete','admin','2019-11-02 15:45:22','Delete employee(Lee.Wong)'),(83,'Shift','Delete','admin','2019-11-02 15:45:24','Delete employee(Alice.Gray)'),(84,'Shift','Delete','admin','2019-11-02 15:45:32','Delete employee(Robert.Floyd)'),(85,'Department','Delete','admin','2019-11-02 15:45:37','Delete 1 number of department'),(86,'Department','Delete','admin','2019-11-02 15:45:38','Delete 3 number of department'),(87,'Department','Create','admin','2019-11-02 15:51:20','Add department(Information Technology)'),(88,'Department','Create','admin','2019-11-02 15:52:16','Add department(Psychology)'),(89,'Department','Update','admin','2019-11-02 15:53:24','Update department(Tourism)'),(90,'Department','Update','admin','2019-11-02 15:53:52','Update department(Information Technology)'),(91,'Department','Create','admin','2019-11-02 15:54:25','Add department(Accountancy)'),(92,'Department','Delete','admin','2019-11-02 15:54:49','Delete 1 number of department'),(93,'Department','Create','admin','2019-11-02 15:55:59','Add department(Librarian)'),(94,'Zone','Update','admin','2019-11-02 15:57:54','Update Area(FEU)'),(95,'Zone','Update','admin','2019-11-02 15:57:54','Update Area(FEU)'),(96,'Zone','Update','admin','2019-11-02 15:58:08','Update Area(FEU)'),(97,'Employee','Create','admin','2019-11-02 16:06:49','Add Employee John.Kenneth'),(98,'Employee','Update','admin','2019-11-02 16:07:12','Update employee(John.Kenneth)'),(99,'Employee','Create','admin','2019-11-02 16:07:52','Add Employee Howard.Lapus'),(100,'Employee','Update','admin','2019-11-02 16:08:05','Update employee(Howard.Lapus)'),(101,'Employee','Update','admin','2019-11-02 16:10:38','Update employee(Howard.Lapus)'),(102,'Employee','Update','admin','2019-11-02 16:10:57','Update employee(John.Kenneth)'),(103,'Employee','Create','admin','2019-11-02 16:12:13','Add Employee Mae.Sagin'),(104,'Employee','Update','admin','2019-11-02 16:12:31','Update employee(Howard.Lapus)'),(105,'Employee','Update','admin','2019-11-02 16:14:15','Update employee(Mae.Sagin)'),(106,'Employee','Update','admin','2019-11-02 16:14:17','Update employee(Mae.Sagin)'),(107,'Department','Create','admin','2019-11-02 16:17:47','Add department(Asst. Librarian)'),(108,'Department','Update','admin','2019-11-02 16:18:04','Update department(Asst. Librarian)'),(109,'Department','Delete','admin','2019-11-02 16:19:16','Delete 2 number of department'),(110,'Department','Create','admin','2019-11-02 16:20:28','Add department(HRM)'),(111,'Department','Create','admin','2019-11-02 16:20:58','Add department(Education)'),(112,'Department','Create','admin','2019-11-02 16:21:22','Add department(Business Admin)'),(113,'Department','Update','admin','2019-11-02 16:21:31','Update department(Business Admin)'),(114,'Department','Create','admin','2019-11-02 16:21:45','Add department(NSTP)'),(115,'Department','Create','admin','2019-11-02 16:21:58','Add department(Non-Faculty)'),(116,'Employee','Create','admin','2019-11-02 16:23:05','Add Employee Joan.Cy'),(117,'Employee','Update','admin','2019-11-02 16:24:41','Update employee(Joan.Cy)'),(118,'Employee','Update','admin','2019-11-02 16:25:00','Update employee(Joan.Cy)'),(119,'Employee','Update','admin','2019-11-02 16:25:01','Update employee(Joan.Cy)'),(120,'Employee','Create','admin','2019-11-02 16:25:58','Add Employee Mary.Wiltz'),(121,'','Login','admin','2019-11-02 16:28:20','Login System'),(122,'Employee','Update','admin','2019-11-02 16:30:06','Update employee(Mary.Wiltz)'),(123,'Employee','Create','admin','2019-11-02 16:32:19','Add Employee Ron.Vald'),(124,'Employee','Update','admin','2019-11-02 16:33:38','Update employee(Ron.Vald)'),(125,'Employee','Create','admin','2019-11-02 16:35:19','Add Employee Floyd.Kaye'),(126,'Employee','Update','admin','2019-11-02 16:37:13','Update employee(Floyd.Kaye)'),(127,'Employee','Create','admin','2019-11-02 16:38:09','Add Employee Rea.Gil'),(128,'Employee','Update','admin','2019-11-02 16:40:12','Update employee(Rea.Gil)'),(129,'Shift','Delete','admin','2019-11-02 16:41:49','Delete Shift(FNF1)'),(130,'Shift','Delete','admin','2019-11-02 16:41:54','Delete Shift(Coords)'),(131,'Shift','Delete','admin','2019-11-02 16:42:02','Delete Shift(non)'),(132,'TimeTable','Update','admin','2019-11-02 16:59:12','Update Timetable(Non_Faculty)'),(133,'TimeTable','Update','admin','2019-11-02 17:00:25','Update Timetable(Non_Faculty)'),(134,'TimeTable','Update','admin','2019-11-02 17:00:38','Update Timetable(Non_Faculty)'),(135,'TimeTable','Update','admin','2019-11-02 17:00:40','Update Timetable(Non_Faculty)'),(136,'Shift','Update','admin','2019-11-02 17:08:10','Update Shift(Non_Faculty Sched)'),(137,'Shift','Update','admin','2019-11-02 17:08:34','Update Shift(Non_Faculty Sched)'),(138,'TimeTable','Create','admin','2019-11-02 17:45:28','Add A Timetable (Coord Psy 1)'),(139,'TimeTable','Create','admin','2019-11-02 17:46:31','Add A Timetable (Coord Psy 2)'),(140,'TimeTable','Update','admin','2019-11-02 17:46:43','Update Timetable(Coord Psy 2)'),(141,'TimeTable','Update','admin','2019-11-02 17:47:14','Update Timetable(Coord Psy 1)'),(142,'TimeTable','Create','admin','2019-11-02 17:49:22','Add A Timetable (Coord Psy 3)'),(143,'TimeTable','Update','admin','2019-11-02 17:49:27','Update Timetable(Coord Psy 3)'),(144,'Shift','Create','admin','2019-11-02 17:51:10','Add a Shift(Psy_Coord Sched)'),(145,'TimeTable','Create','admin','2019-11-02 17:56:52','Add A Timetable (Coord Educ 1)'),(146,'TimeTable','Update','admin','2019-11-02 17:57:00','Update Timetable(Coord Educ 1)'),(147,'TimeTable','Create','admin','2019-11-02 17:58:32','Add A Timetable (Coord Educ 2)'),(148,'TimeTable','Update','admin','2019-11-02 17:58:55','Update Timetable(Coord Educ 1)'),(149,'TimeTable','Update','admin','2019-11-02 17:59:01','Update Timetable(Coord Educ 2)'),(150,'Shift','Create','admin','2019-11-02 17:59:59','Add a Shift(Educ_Coord Sched)'),(151,'Shift','Update','admin','2019-11-02 18:12:49','Update Shift(Psy_Coord Sched)'),(152,'TimeTable','Update','admin','2019-11-02 18:13:40','Update Timetable(Coord Psy 1)'),(153,'Shift','Update','admin','2019-11-02 18:17:04','Update Shift(Educ_Coord Sched)'),(154,'TimeTable','Create','admin','2019-11-02 18:29:55','Add A Timetable (Prof HRM 1)'),(155,'TimeTable','Create','admin','2019-11-02 18:31:06','Add A Timetable (Prof HRM 2)'),(156,'TimeTable','Update','admin','2019-11-02 18:31:13','Update Timetable(Prof HRM 2)'),(157,'','Login','admin','2019-11-02 18:34:19','Login System'),(158,'TimeTable','Update','admin','2019-11-02 18:35:22','Update Timetable(Prof HRM 1)'),(159,'TimeTable','Create','admin','2019-11-02 18:36:00','Add A Timetable (Prof HRM 2)'),(160,'TimeTable','Update','admin','2019-11-02 18:36:08','Update Timetable(Prof HRM 2)'),(161,'TimeTable','Update','admin','2019-11-02 18:36:35','Update Timetable(Coord Educ 2)'),(162,'TimeTable','Update','admin','2019-11-02 18:36:36','Update Timetable(Coord Educ 2)'),(163,'Shift','Create','admin','2019-11-02 18:38:07','Add a Shift(HRM Sched)'),(164,'TimeTable','Update','admin','2019-11-02 18:38:29','Update Timetable(Prof HRM 2)'),(165,'TimeTable','Create','admin','2019-11-02 18:50:33','Add A Timetable (Prof IT 1)'),(166,'TimeTable','Update','admin','2019-11-02 18:50:43','Update Timetable(Prof IT 1)'),(167,'TimeTable','Create','admin','2019-11-02 18:52:00','Add A Timetable (Prof IT 2)'),(168,'TimeTable','Update','admin','2019-11-02 18:52:16','Update Timetable(Prof IT 2)'),(169,'TimeTable','Update','admin','2019-11-02 18:52:36','Update Timetable(Prof IT 1)'),(170,'TimeTable','Update','admin','2019-11-02 18:52:41','Update Timetable(Prof IT 2)'),(171,'Shift','Create','admin','2019-11-02 18:53:10','Add a Shift(IT Sched)'),(172,'Role','Create','admin','2019-11-02 19:45:11','Add Role(HR)'),(173,'Role','Update','admin','2019-11-02 19:49:18','Update Role(HR)'),(174,'Role','Create','admin','2019-11-02 19:50:39','Add Role(Super Admin)'),(175,'Role','Update','admin','2019-11-02 19:50:47','Update Role(Super Admin)'),(176,'User','Create','admin','2019-11-02 19:51:24','Add User feucavitehr'),(177,'User','Create','admin','2019-11-02 19:51:52','Add User superadmin'),(178,'','Login','admin','2019-11-02 19:52:22','Login System'),(179,'','Login','superadmin','2019-11-02 19:52:42','Login System'),(180,'','Login','admin','2019-11-02 19:53:25','Login System'),(181,'Role','Update','admin','2019-11-02 19:53:39','Update Role(Super Admin)'),(182,'Role','Update','admin','2019-11-02 19:53:43','Update Role(Super Admin)'),(183,'Role','Update','admin','2019-11-02 19:53:44','Update Role(Super Admin)'),(184,'Role','Update','admin','2019-11-02 19:54:01','Update Role(Super Admin)'),(185,'Role','Update','admin','2019-11-02 19:54:02','Update Role(Super Admin)'),(186,'Role','Update','admin','2019-11-02 19:54:02','Update Role(Super Admin)'),(187,'','Login','superadmin','2019-11-02 19:55:45','Login System'),(188,'','Login','admin','2019-11-02 19:56:20','Login System'),(189,'','Login','feucavitehr','2019-11-02 19:58:06','Login System'),(190,'','Login','admin','2019-11-02 19:59:06','Login System'),(191,'','Login','admin','2019-11-02 20:02:41','Login System'),(192,'Template','Create','admin','2019-11-02 20:04:00','Add A Fingerprint John.Kenneth'),(193,'Template','Create','admin','2019-11-02 20:05:22','Add A Fingerprint Joan.Cy'),(194,'Template','Create','admin','2019-11-02 20:05:53','Add A Fingerprint Mary.Wiltz'),(195,'Template','Create','admin','2019-11-02 20:07:32','Add A Fingerprint Rea.Gil'),(196,'','Login','admin','2019-11-15 19:13:36','Login System'),(197,'Rules','Update','admin','2019-11-15 19:41:36','Update Rules information'),(198,'TimeTable','Create','admin','2019-11-15 19:42:59','Add A Timetable (today)'),(199,'Shift','Create','admin','2019-11-15 19:43:21','Add a Shift(testing)'),(200,'TimeTable','Update','admin','2019-11-15 19:45:55','Update Timetable(today)'),(201,'TimeTable','Update','admin','2019-11-15 19:45:59','Update Timetable(today)'),(202,'Shift','Update','admin','2019-11-15 19:46:31','Update Shift(IT Sched)'),(203,'Rules','Update','admin','2019-11-15 20:52:43','Update Rules information'),(204,'TimeTable','Create','admin','2019-11-15 20:53:48','Add A Timetable (today2)'),(205,'Shift','Update','admin','2019-11-15 20:54:38','Update Shift(IT Sched)'),(206,'','Login','admin','2019-11-15 23:09:16','Login System'),(207,'','Login','admin','2019-11-16 12:50:07','Login System'),(208,'Rules','Update','admin','2019-11-16 13:00:43','Update Rules information'),(209,'TimeTable','Create','admin','2019-11-16 13:01:59','Add A Timetable (otweek)'),(210,'Rules','Update','admin','2019-11-16 13:02:48','Update Rules information'),(211,'Shift','Update','admin','2019-11-16 13:03:19','Update Shift(IT Sched)'),(212,'','Login','admin','2019-11-16 13:16:45','Login System'),(213,'','Login','admin','2019-11-16 14:16:46','Login System'),(214,'TimeTable','Update','admin','2019-11-16 14:21:03','Update Timetable(otweek)'),(215,'TimeTable','Update','admin','2019-11-16 14:21:04','Update Timetable(otweek)'),(216,'TimeTable','Update','admin','2019-11-16 14:21:04','Update Timetable(otweek)'),(217,'TimeTable','Update','admin','2019-11-16 14:21:05','Update Timetable(otweek)'),(218,'TimeTable','Update','admin','2019-11-16 14:21:10','Update Timetable(otweek)'),(219,'TimeTable','Update','admin','2019-11-16 14:21:10','Update Timetable(otweek)'),(220,'TimeTable','Update','admin','2019-11-16 14:21:11','Update Timetable(otweek)');
/*!40000 ALTER TABLE `sys_log` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `sys_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `MenuFlag` varchar(50) NOT NULL,
  `MenuNo` varchar(50) NOT NULL,
  `ParentNo` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `sys_menu` WRITE;
/*!40000 ALTER TABLE `sys_menu` DISABLE KEYS */;
INSERT INTO `sys_menu` VALUES (1,'Config','050505','0505'),(2,'EmailSet','050510','0505'),(3,'Role','050515','0505'),(4,'User','050520','0505'),(5,'OperatorLog','050525','0505'),(6,'Database','050530','0505'),(7,'Companies','051005','0510'),(8,'Employees','051010','0510'),(9,'Rules','051505','0515'),(10,'DayType','051510','0515'),(11,'PayCode','051515','0515'),(12,'Timetable','051520','0515'),(13,'Shifts','051525','0515'),(14,'Schedule','051530','0515'),(15,'TemporarySchedule','051535','0515'),(16,'ExceptionAssign','051540','0515'),(17,'DeviceManagement','052005','0520'),(18,'TerminalGroup','052010','0520'),(19,'DataSync','052015','0520'),(20,'ImportExport','052020','0520'),(21,'workcode','052025','0520'),(22,'Message','052030','0520'),(23,'ACTimezone','052505','0525'),(24,'ACGroup','052510','0525'),(25,'ACUnlockComb','052515','0525'),(26,'UserACPrivilege','052520','0525'),(27,'UploadACPrivilege','052525','0525'),(28,'Punches','053005','0530'),(29,'Calculate','053010','0530'),(30,'AttReport','053015','0530');
/*!40000 ALTER TABLE `sys_menu` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `sys_privilege`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_privilege` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `privilege_name` varchar(64) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_id` (`menu_id`),
  CONSTRAINT `FK_MenuPrivilege` FOREIGN KEY (`menu_id`) REFERENCES `sys_menu` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `sys_privilege` WRITE;
/*!40000 ALTER TABLE `sys_privilege` DISABLE KEYS */;
INSERT INTO `sys_privilege` VALUES (1,'Select',1),(2,'Update',1),(3,'Select',2),(4,'Update',2),(5,'Select',3),(6,'Update',3),(7,'Delete',3),(8,'Select',4),(9,'Update',4),(10,'Delete',4),(11,'Select',5),(12,'Delete',5),(13,'Export',5),(14,'Select',6),(15,'InitialDB',6),(16,'BackupDB',6),(17,'RestoreDB',6),(18,'ChangeDB',6),(19,'Select',7),(20,'Update',7),(21,'Select',8),(22,'Update',8),(23,'Delete',8),(24,'Import',8),(25,'Export',8),(26,'BatchUpdate',8),(27,'Select',9),(28,'Update',9),(29,'Select',10),(30,'Update',10),(31,'Select',11),(32,'Update',11),(33,'Delete',11),(34,'Assign',11),(35,'Select',12),(36,'Update',12),(37,'Delete',12),(38,'Select',13),(39,'Update',13),(40,'Delete',13),(41,'Select',14),(42,'Update',14),(43,'Select',15),(44,'Update',15),(45,'Select',16),(46,'Update',16),(47,'Delete',16),(48,'Select',17),(49,'Update',17),(50,'Delete',17),(51,'DownloadPunches',17),(52,'SearchTerminal',17),(53,'DownloadPhotos',17),(54,'Select',18),(55,'Update',18),(56,'Delete',18),(57,'AssignEmployee',18),(58,'Select',19),(59,'DataSync',19),(60,'Select',20),(61,'Select',21),(62,'Update',21),(63,'Delete',21),(64,'Select',22),(65,'Update',22),(66,'Delete',22),(67,'Select',23),(68,'Update',23),(69,'Delete',23),(70,'Select',24),(71,'Update',24),(72,'Delete',24),(73,'Select',25),(74,'Update',25),(75,'Select',26),(76,'Update',26),(77,'Delete',26),(78,'Select',27),(79,'Assign2Device',27),(80,'Select',28),(81,'Update',28),(82,'Delete',28),(83,'Import',28),(84,'Export',28),(85,'Select',29),(86,'Update',29),(87,'Select',30),(88,'Update',30),(89,'Delete',30),(90,'View',30);
/*!40000 ALTER TABLE `sys_privilege` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `sys_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(64) NOT NULL,
  `remark` varchar(64) DEFAULT NULL,
  `role_type` int(11) DEFAULT NULL,
  `defaultRole` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `sys_role` WRITE;
/*!40000 ALTER TABLE `sys_role` DISABLE KEYS */;
INSERT INTO `sys_role` VALUES (1,'Administrator',NULL,1,1),(2,'HR','',1,0),(3,'Super Admin','ITS',1,0);
/*!40000 ALTER TABLE `sys_role` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `sys_role_datafilter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_role_datafilter` (
  `role_df_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  KEY `role_id` (`role_id`),
  KEY `role_df_id` (`role_df_id`),
  CONSTRAINT `FK_DataFilterRole` FOREIGN KEY (`role_df_id`) REFERENCES `sys_datafilter` (`id`),
  CONSTRAINT `FK_RoleDataFilter` FOREIGN KEY (`role_id`) REFERENCES `sys_role` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `sys_role_datafilter` WRITE;
/*!40000 ALTER TABLE `sys_role_datafilter` DISABLE KEYS */;
INSERT INTO `sys_role_datafilter` VALUES (1,1),(1,2),(1,3);
/*!40000 ALTER TABLE `sys_role_datafilter` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `sys_role_rights`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_role_rights` (
  `role_pri_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  KEY `role_id` (`role_id`),
  KEY `role_pri_id` (`role_pri_id`),
  CONSTRAINT `FK_PrivilegeRole` FOREIGN KEY (`role_pri_id`) REFERENCES `sys_privilege` (`id`),
  CONSTRAINT `FK_RolePrivilege` FOREIGN KEY (`role_id`) REFERENCES `sys_role` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `sys_role_rights` WRITE;
/*!40000 ALTER TABLE `sys_role_rights` DISABLE KEYS */;
INSERT INTO `sys_role_rights` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(35,1),(36,1),(37,1),(38,1),(39,1),(40,1),(41,1),(42,1),(43,1),(44,1),(45,1),(46,1),(47,1),(48,1),(49,1),(50,1),(51,1),(52,1),(53,1),(54,1),(55,1),(56,1),(57,1),(58,1),(59,1),(60,1),(61,1),(62,1),(63,1),(64,1),(65,1),(66,1),(67,1),(68,1),(69,1),(70,1),(71,1),(72,1),(73,1),(74,1),(75,1),(76,1),(77,1),(78,1),(79,1),(80,1),(81,1),(82,1),(83,1),(84,1),(85,1),(86,1),(87,1),(88,1),(89,1),(90,1),(19,2),(20,2),(21,2),(22,2),(23,2),(24,2),(25,2),(26,2),(27,2),(28,2),(29,2),(30,2),(31,2),(32,2),(33,2),(34,2),(35,2),(36,2),(37,2),(38,2),(39,2),(40,2),(41,2),(42,2),(43,2),(44,2),(45,2),(46,2),(47,2),(80,2),(81,2),(82,2),(83,2),(84,2),(85,2),(86,2),(87,2),(88,2),(89,2),(90,2),(11,3),(12,3),(13,3),(14,3),(15,3),(16,3),(17,3),(18,3),(48,3),(49,3),(50,3),(51,3),(52,3),(53,3),(54,3),(55,3),(56,3),(57,3),(58,3),(59,3),(60,3),(61,3),(62,3),(63,3),(64,3),(65,3),(66,3),(78,3);
/*!40000 ALTER TABLE `sys_role_rights` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `sys_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `user_pwd` varchar(32) DEFAULT NULL,
  `user_email` varchar(64) NOT NULL,
  `remark` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `sys_user` WRITE;
/*!40000 ALTER TABLE `sys_user` DISABLE KEYS */;
INSERT INTO `sys_user` VALUES (1,'admin','admin','admin@yahoo.com',NULL),(2,'feucavitehr','feucavitehr','feucavitehr@gmail.com','for HR ACCOUNT'),(3,'superadmin','superadmin','superadmin@gmail.com','for SUPER ADMIN ITS');
/*!40000 ALTER TABLE `sys_user` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `sys_user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_user_role` (
  `role_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  KEY `userid` (`userid`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `FK_RoleUser` FOREIGN KEY (`role_id`) REFERENCES `sys_role` (`id`),
  CONSTRAINT `FK_UserRole` FOREIGN KEY (`userid`) REFERENCES `sys_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `sys_user_role` WRITE;
/*!40000 ALTER TABLE `sys_user_role` DISABLE KEYS */;
INSERT INTO `sys_user_role` VALUES (1,1),(2,2),(3,3);
/*!40000 ALTER TABLE `sys_user_role` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `user_status` tinyint(1) NOT NULL,
  `user_status_f` tinyint(1) NOT NULL,
  `force_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `resets_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `emp_id` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Feu','Super Admin','superadmin','$2y$10$nH5unXjTMfBkYpYHeKcgke1.g4.McdXv06zJ/1EUjTq.Zi7ytjGAe','Super Admin',1,1,1,'1','1',NULL,'2019-12-08 05:23:26','2019-12-08 07:53:15','2'),(2,'Feu','Admin','admin','$2y$10$nb3vYxfZLlRzJQrVE4j94eAwURtUsm4FKqn4sb2x57eAwQRrcJ9q.','Admin',1,1,1,'0','1',NULL,'2019-12-08 05:23:26','2019-12-08 05:23:26','3'),(3,'Feu','Co-Admin','coadmin','$2y$10$sB1gywGORP/r/5cp4H5Jwuds99VJxavXDlWtwas6w8RyFFMTkWexe','Co-Admin',1,1,1,'0','1',NULL,'2019-12-08 05:23:26','2019-12-08 05:23:26','4'),(4,'Feu','hr','hr','$2y$10$N86HbfPWBcfTNADUpiShpuXELBR9MZM9GkGna.C/orkzw9A.g8zbq','HR',1,1,1,'0','1',NULL,'2019-12-08 05:23:26','2019-12-08 05:23:26','5'),(8,'john','','',NULL,'',0,0,0,'0','0',NULL,NULL,NULL,'');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `verifybackup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `verifybackup` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `verify_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `verifybackup` WRITE;
/*!40000 ALTER TABLE `verifybackup` DISABLE KEYS */;
/*!40000 ALTER TABLE `verifybackup` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `zkproto_control_queue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zkproto_control_queue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` int(11) NOT NULL,
  `target` int(11) NOT NULL,
  `info` varchar(255) NOT NULL,
  `replace_zoneId` bigint(20) NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `sendout_time` datetime DEFAULT NULL,
  `return_time` datetime DEFAULT NULL,
  `return_flag` int(11) DEFAULT NULL,
  `language_str` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `zkproto_control_queue` WRITE;
/*!40000 ALTER TABLE `zkproto_control_queue` DISABLE KEYS */;
/*!40000 ALTER TABLE `zkproto_control_queue` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `zkproto_sync_queue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zkproto_sync_queue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `op_id` bigint(20) NOT NULL,
  `action` int(11) NOT NULL,
  `info` varchar(255) NOT NULL,
  `pressedtime` bigint(20) NOT NULL,
  `zone_clientID` bigint(20) DEFAULT NULL,
  `sendout_time` datetime DEFAULT NULL,
  `return_time` datetime DEFAULT NULL,
  `return_flag` int(11) DEFAULT NULL,
  `language_str` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `zkproto_sync_queue` WRITE;
/*!40000 ALTER TABLE `zkproto_sync_queue` DISABLE KEYS */;
/*!40000 ALTER TABLE `zkproto_sync_queue` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

