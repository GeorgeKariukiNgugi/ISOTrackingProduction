-- MySQL dump 10.13  Distrib 8.0.18, for Win64 (x86_64)
--
-- Host: localhost    Database: isotrackingproduction
-- ------------------------------------------------------
-- Server version	5.7.23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `activity_log`
--

DROP TABLE IF EXISTS `activity_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activity_log` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `log_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `subject_id` bigint(20) unsigned DEFAULT NULL,
  `subject_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) unsigned DEFAULT NULL,
  `causer_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `properties` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activity_log_log_name_index` (`log_name`),
  KEY `subject` (`subject_id`,`subject_type`),
  KEY `causer` (`causer_id`,`causer_type`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity_log`
--

LOCK TABLES `activity_log` WRITE;
/*!40000 ALTER TABLE `activity_log` DISABLE KEYS */;
INSERT INTO `activity_log` VALUES (1,'default','created',13,'App\\User',NULL,NULL,'{\"attributes\": {\"name\": \"Log Trial\", \"email\": \"logtrial@mail.com\", \"password\": \"$2y$10$vFDIYP1KEIiyxaY/Y4EVpuxQ.Vt/9we.djUcPFR/F8D7xQ2gLdS.6\"}}','2020-01-14 11:08:09','2020-01-14 11:08:09'),(2,'default','created',14,'App\\User',NULL,NULL,'{\"attributes\": {\"name\": \"Trial 2 for logigng.\", \"email\": \"log@mail.com\", \"password\": \"$2y$10$oGjnortTkI/GY7kCjQsuG.XY5vzZu7rNacc/zMlBJZMadwa71vyvC\"}}','2020-01-14 11:12:42','2020-01-14 11:12:42'),(3,'default','deleted',39,'App\\AssesorPerProgram',7,'App\\User','[]','2020-01-14 11:15:57','2020-01-14 11:15:57'),(4,'default','created',40,'App\\AssesorPerProgram',7,'App\\User','{\"attributes\": {\"email\": \"trial2@mail.com\", \"created_at\": \"2020-01-14 14:21:25\", \"program_id\": 226, \"updated_at\": \"2020-01-14 14:21:25\"}}','2020-01-14 11:21:25','2020-01-14 11:21:25'),(5,'default','deleted',40,'App\\AssesorPerProgram',7,'App\\User','{\"attributes\": {\"email\": \"trial2@mail.com\", \"created_at\": \"2020-01-14 14:21:25\", \"program_id\": 226, \"updated_at\": \"2020-01-14 14:21:25\"}}','2020-01-14 11:21:41','2020-01-14 11:21:41'),(6,'default','Look mum, I logged something',NULL,NULL,7,'App\\User','[]','2020-01-14 11:34:25','2020-01-14 11:34:25'),(7,'default','Logged In As Admin',NULL,NULL,7,'App\\User','[]','2020-01-14 11:37:11','2020-01-14 11:37:11'),(8,'default','Logged In As Admin',NULL,NULL,7,'App\\User','[]','2020-01-14 11:39:44','2020-01-14 11:39:44'),(9,'default','Logged In As Adminadmin@mail.com',NULL,NULL,7,'App\\User','[]','2020-01-14 11:40:34','2020-01-14 11:40:34'),(10,'default','Logged In As Admin   admin@mail.com',NULL,NULL,7,'App\\User','[]','2020-01-14 11:41:04','2020-01-14 11:41:04'),(11,'default','Logged In As User   bcms@mail.com',NULL,NULL,8,'App\\User','[]','2020-01-14 11:47:53','2020-01-14 11:47:53'),(12,'default','Logged In As User   bcms@mail.com',NULL,NULL,8,'App\\User','[]','2020-01-14 11:54:42','2020-01-14 11:54:42'),(13,'default','Logged In As User   csr3@mail.com',NULL,NULL,9,'App\\User','[]','2020-01-14 11:54:56','2020-01-14 11:54:56'),(14,'default','Logged In As User   ems@mail.com',NULL,NULL,6,'App\\User','[]','2020-01-14 13:52:55','2020-01-14 13:52:55'),(15,'default','Logged In As Admin   admin@mail.com',NULL,NULL,7,'App\\User','[]','2020-01-14 23:46:20','2020-01-14 23:46:20'),(16,'default','Logged In As Admin   admin@mail.com',NULL,NULL,7,'App\\User','[]','2020-01-14 23:51:00','2020-01-14 23:51:00'),(17,'default','User Tried To Log In   logtrial@mail.com',NULL,NULL,13,'App\\User','[]','2020-01-14 23:54:00','2020-01-14 23:54:00'),(18,'default','Logged In As Admin   admin@mail.com',NULL,NULL,7,'App\\User','[]','2020-01-15 00:16:55','2020-01-15 00:16:55'),(19,'key_perfomace_indicators','created',305,'App\\KeyPerfomaceIndicator',7,'App\\User','{\"attributes\": {\"id\": 305, \"name\": \"Adding the kpi.\", \"period\": 4, \"target\": 80, \"perspective_id\": 60, \"arithmeticStructure\": 1, \"strategic_objective_id\": 38}}','2020-01-15 00:17:27','2020-01-15 00:17:27'),(20,'default','Logged In As User   isms@mail.com',NULL,NULL,4,'App\\User','[]','2020-01-15 00:19:23','2020-01-15 00:19:23'),(21,'non_conformities','updated',58,'App\\NonConformities',4,'App\\User','{\"old\": {\"id\": 58, \"date\": \"2020-01-08 00:00:00\", \"year\": \"2019/2020\", \"quater\": \"Q1\", \"rootCause\": \"Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_active_antivirus_installed_on_desktops_and_laptops.\", \"correction\": \"Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_active_antivirus_installed_on_desktops_and_laptops.\", \"openClosed\": \"open\", \"program_id\": 3, \"perspective_id\": 9, \"correctiveAction\": \"Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_active_antivirus_installed_on_desktops_and_laptops.\", \"strategicObjective_id\": 25, \"keyPerfomanceIndicator_id\": 88}, \"attributes\": {\"id\": 58, \"date\": \"2020-01-08 00:00:00\", \"year\": \"2019/2020\", \"quater\": \"Q1\", \"rootCause\": \"Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_active_antivirus_installed_on_desktops_and_laptops.\", \"correction\": \"Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_active_antivirus_installed_on_desktops_and_laptops.\", \"openClosed\": \"closed\", \"program_id\": 3, \"perspective_id\": 9, \"correctiveAction\": \"Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_active_antivirus_installed_on_desktops_and_laptops.\", \"strategicObjective_id\": 25, \"keyPerfomanceIndicator_id\": 88}}','2020-01-15 00:19:49','2020-01-15 00:19:49'),(22,'non_conformities','updated',64,'App\\NonConformities',4,'App\\User','{\"old\": {\"id\": 64, \"date\": \"2020-01-15 00:00:00\", \"year\": \"2019/2020\", \"quater\": \"Q1\", \"rootCause\": \"Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_active_antivirus_installed_on_desktops_and_laptops.\", \"correction\": \"Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_active_antivirus_installed_on_desktops_and_laptops.\", \"openClosed\": \"open\", \"program_id\": 3, \"perspective_id\": 11, \"correctiveAction\": \"Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_active_antivirus_installed_on_desktops_and_laptops.\", \"strategicObjective_id\": 31, \"keyPerfomanceIndicator_id\": 103}, \"attributes\": {\"id\": 64, \"date\": \"2020-01-15 00:00:00\", \"year\": \"2019/2020\", \"quater\": \"Q1\", \"rootCause\": \"Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_active_antivirus_installed_on_desktops_and_laptops.\", \"correction\": \"Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_active_antivirus_installed_on_desktops_and_laptops.\", \"openClosed\": \"closed\", \"program_id\": 3, \"perspective_id\": 11, \"correctiveAction\": \"Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_active_antivirus_installed_on_desktops_and_laptops.\", \"strategicObjective_id\": 31, \"keyPerfomanceIndicator_id\": 103}}','2020-01-15 00:23:13','2020-01-15 00:23:13'),(23,'default','Logged In As User   itsms@mail.com',NULL,NULL,3,'App\\User','[]','2020-01-15 00:24:07','2020-01-15 00:24:07'),(24,'default','updated',34,'App\\NonConformities',3,'App\\User','[]','2020-01-15 00:24:24','2020-01-15 00:24:24'),(25,'default','Logged In As User   itsms@mail.com',NULL,NULL,3,'App\\User','[]','2020-01-15 00:25:18','2020-01-15 00:25:18'),(26,'default','created',110,'App\\NonConformities',3,'App\\User','[]','2020-01-15 00:25:30','2020-01-15 00:25:30'),(27,'default','updated',110,'App\\NonConformities',3,'App\\User','[]','2020-01-15 00:26:36','2020-01-15 00:26:36'),(28,'default','updated',110,'App\\NonConformities',3,'App\\User','[]','2020-01-15 00:30:45','2020-01-15 00:30:45'),(29,'default','updated',110,'App\\NonConformities',3,'App\\User','[]','2020-01-15 00:31:12','2020-01-15 00:31:12'),(30,'closed_non_conformity_evidence','created',3,'App\\closedNonConformityEvidence',3,'App\\User','{\"attributes\": {\"created_at\": \"2020-01-15 03:31:12\", \"updated_at\": \"2020-01-15 03:31:12\", \"clossureDate\": \"2020-01-22\", \"briefDescription\": \"select * from closed_non_conformity_evidence;\", \"nonConformity_id\": 110, \"locationOfEvidence\": \"Pipedream.ai - Workbench1579059072.htm\"}}','2020-01-15 00:31:12','2020-01-15 00:31:12'),(31,'default','updated',3,'App\\User',3,'App\\User','{\"old\": {\"name\": \"itsms\", \"email\": \"itsms@mail.com\", \"password\": \"$2y$10$kF72yoj4770nFxwrUbra/e0jovkIbpir6OmyrdAh9yohubXaug7Nu\"}, \"attributes\": {\"name\": \"itsms\", \"email\": \"itsms@mail.com\", \"password\": \"$2y$10$kF72yoj4770nFxwrUbra/e0jovkIbpir6OmyrdAh9yohubXaug7Nu\"}}','2020-01-15 00:31:26','2020-01-15 00:31:26'),(32,'default','Logged In As Admin   admin@mail.com',NULL,NULL,7,'App\\User','[]','2020-01-15 00:31:30','2020-01-15 00:31:30'),(33,'default','Logged In As User   isms@mail.com',NULL,NULL,4,'App\\User','[]','2020-01-15 00:34:10','2020-01-15 00:34:10'),(34,'default','Logged In As User   isms@mail.com',NULL,NULL,4,'App\\User','[]','2020-01-15 00:34:22','2020-01-15 00:34:22'),(35,'non_conformities','created',111,'App\\NonConformities',4,'App\\User','{\"attributes\": {\"id\": 111, \"date\": \"2020-01-22 00:00:00\", \"year\": \"2019/2020\", \"quater\": \"Q2\", \"rootCause\": \"activity_log;\", \"correction\": \"activity_log;\", \"openClosed\": \"open\", \"program_id\": 3, \"perspective_id\": 9, \"correctiveAction\": \"activity_log;\", \"strategicObjective_id\": 25, \"keyPerfomanceIndicator_id\": 88}}','2020-01-15 00:34:32','2020-01-15 00:34:32'),(36,'non_conformities','updated',111,'App\\NonConformities',4,'App\\User','{\"old\": {\"id\": 111, \"date\": \"2020-01-22 00:00:00\", \"year\": \"2019/2020\", \"quater\": \"Q2\", \"rootCause\": \"activity_log;\", \"correction\": \"activity_log;\", \"openClosed\": \"open\", \"program_id\": 3, \"perspective_id\": 9, \"correctiveAction\": \"activity_log;\", \"strategicObjective_id\": 25, \"keyPerfomanceIndicator_id\": 88}, \"attributes\": {\"id\": 111, \"date\": \"2020-01-22 00:00:00\", \"year\": \"2019/2020\", \"quater\": \"Q2\", \"rootCause\": \"activity_log;\", \"correction\": \"activity_log;\", \"openClosed\": \"closed\", \"program_id\": 3, \"perspective_id\": 9, \"correctiveAction\": \"activity_log;\", \"strategicObjective_id\": 25, \"keyPerfomanceIndicator_id\": 88}}','2020-01-15 00:34:47','2020-01-15 00:34:47'),(37,'closed_non_conformity_evidence','created',4,'App\\closedNonConformityEvidence',4,'App\\User','{\"attributes\": {\"created_at\": \"2020-01-15 03:34:47\", \"updated_at\": \"2020-01-15 03:34:47\", \"clossureDate\": \"2020-01-22\", \"briefDescription\": \"activity_log;\", \"nonConformity_id\": 111, \"locationOfEvidence\": \"Pipedream.ai - Workbench1579059287.htm\"}}','2020-01-15 00:34:47','2020-01-15 00:34:47'),(38,'default','Logged In As Admin   admin@mail.com',NULL,NULL,7,'App\\User','[]','2020-01-15 00:36:15','2020-01-15 00:36:15'),(39,'quater_actives','updated',2,'App\\QuaterActive',7,'App\\User','{\"old\": {\"Active\": 1, \"Quater\": \"Q2\", \"created_at\": null, \"updated_at\": \"2020-01-13 07:14:44\"}, \"attributes\": {\"Active\": 0, \"Quater\": \"Q2\", \"created_at\": null, \"updated_at\": \"2020-01-15 03:36:24\"}}','2020-01-15 00:36:24','2020-01-15 00:36:24'),(40,'quater_actives','updated',2,'App\\QuaterActive',7,'App\\User','{\"old\": {\"Active\": 0, \"Quater\": \"Q2\", \"created_at\": null, \"updated_at\": \"2020-01-15 03:36:24\"}, \"attributes\": {\"Active\": 1, \"Quater\": \"Q2\", \"created_at\": null, \"updated_at\": \"2020-01-15 03:36:24\"}}','2020-01-15 00:36:24','2020-01-15 00:36:24'),(41,'programs','created',70,'App\\StrategicObjective',7,'App\\User','{\"attributes\": {\"id\": 70, \"name\": \"trial 2\", \"description\": null, \"perspective_id\": 60}}','2020-01-15 00:37:04','2020-01-15 00:37:04'),(42,'strategic_objectives','deleted',70,'App\\StrategicObjective',7,'App\\User','{\"attributes\": {\"id\": 70, \"name\": \"trial 2\", \"description\": null, \"perspective_id\": 60}}','2020-01-15 00:37:54','2020-01-15 00:37:54'),(43,'reports_generateds','updated',4,'App\\reportsGenerated',7,'App\\User','{\"old\": {\"year\": \"2019/2020\", \"quater\": \"Q2\", \"created_at\": \"2019-12-31 07:47:25\", \"program_id\": 1, \"updated_at\": \"2020-01-12 15:08:40\", \"reportLocation\": \"reports/SMS_report_2019-2020_Q2_1578841720.pdf\"}, \"attributes\": {\"year\": \"2019/2020\", \"quater\": \"Q2\", \"created_at\": \"2019-12-31 07:47:25\", \"program_id\": 1, \"updated_at\": \"2020-01-15 03:38:49\", \"reportLocation\": \"reports/SMS_report_2019-2020_Q2_1579059529.pdf\"}}','2020-01-15 00:38:49','2020-01-15 00:38:49'),(44,'default','Logged In As User   isms@mail.com',NULL,NULL,4,'App\\User','[]','2020-01-15 00:40:15','2020-01-15 00:40:15'),(45,'default','Logged In As User   isms@mail.com',NULL,NULL,4,'App\\User','[]','2020-01-15 00:42:03','2020-01-15 00:42:03'),(46,'default','Logged In As User   csr3@mail.com',NULL,NULL,9,'App\\User','[]','2020-01-15 00:42:43','2020-01-15 00:42:43'),(47,'key_perfomace_indicators','created',306,'App\\KeyPerfomaceIndicator',9,'App\\User','{\"attributes\": {\"id\": 306, \"name\": \"logtrial\", \"period\": 4, \"target\": 80, \"perspective_id\": 60, \"arithmeticStructure\": 1, \"strategic_objective_id\": 38}}','2020-01-15 00:42:56','2020-01-15 00:42:56'),(48,'default','Logged In As User   csr3@mail.com',NULL,NULL,9,'App\\User','[]','2020-01-15 00:43:29','2020-01-15 00:43:29'),(49,'default','Logged In As User   bcms@mail.com',NULL,NULL,8,'App\\User','[]','2020-01-15 00:43:41','2020-01-15 00:43:41'),(50,'default','Logged In As User   bcms@mail.com',NULL,NULL,8,'App\\User','[]','2020-01-15 00:46:57','2020-01-15 00:46:57'),(51,'default','Logged In As User   bcms@mail.com',NULL,NULL,8,'App\\User','[]','2020-01-15 00:52:37','2020-01-15 00:52:37'),(52,'default','Logged In As User   bcms@mail.com',NULL,NULL,8,'App\\User','[]','2020-01-15 00:53:38','2020-01-15 00:53:38'),(53,'default','Scores Recorded By   ',NULL,NULL,8,'App\\User','[]','2020-01-15 00:54:05','2020-01-15 00:54:05'),(54,'default','Logged In As User   bcms@mail.com',NULL,NULL,8,'App\\User','[]','2020-01-15 00:54:08','2020-01-15 00:54:08'),(55,'default','Scores Recorded By   ',NULL,NULL,8,'App\\User','[]','2020-01-15 00:54:12','2020-01-15 00:54:12'),(56,'default','Logged In As User   bcms@mail.com',NULL,NULL,8,'App\\User','[]','2020-01-15 00:56:01','2020-01-15 00:56:01'),(57,'default','Scores Recorded By   bcms@mail.com',NULL,NULL,8,'App\\User','[]','2020-01-15 00:56:04','2020-01-15 00:56:04'),(58,'default','Scores Recorded By   bcms@mail.com',NULL,NULL,8,'App\\User','[]','2020-01-15 00:56:04','2020-01-15 00:56:04'),(59,'default','Scores Recorded By   bcms@mail.com',NULL,NULL,8,'App\\User','[]','2020-01-15 00:56:04','2020-01-15 00:56:04'),(60,'default','Scores Recorded By   bcms@mail.com',NULL,NULL,8,'App\\User','[]','2020-01-15 00:56:04','2020-01-15 00:56:04'),(61,'default','Scores Recorded By   bcms@mail.com',NULL,NULL,8,'App\\User','[]','2020-01-15 00:56:04','2020-01-15 00:56:04'),(62,'default','Scores Recorded By   bcms@mail.com',NULL,NULL,8,'App\\User','[]','2020-01-15 01:00:13','2020-01-15 01:00:13'),(63,'default','Scores Recorded By   bcms@mail.com',NULL,NULL,8,'App\\User','[]','2020-01-15 01:03:26','2020-01-15 01:03:26'),(64,'default','Scores Recorded By   bcms@mail.com',NULL,NULL,8,'App\\User','[]','2020-01-15 01:03:26','2020-01-15 01:03:26'),(65,'default','Scores Recorded By   bcms@mail.com',NULL,NULL,8,'App\\User','[]','2020-01-15 01:03:26','2020-01-15 01:03:26'),(66,'default','Scores Recorded By   bcms@mail.com',NULL,NULL,8,'App\\User','[]','2020-01-15 01:03:26','2020-01-15 01:03:26'),(67,'default','Scores Recorded By   bcms@mail.com',NULL,NULL,8,'App\\User','[]','2020-01-15 01:03:26','2020-01-15 01:03:26'),(68,'default','Logged In As User   bcms@mail.com',NULL,NULL,8,'App\\User','[]','2020-01-15 03:27:33','2020-01-15 03:27:33'),(69,'default','Logged In As Admin   admin@mail.com',NULL,NULL,7,'App\\User','[]','2020-01-15 03:45:22','2020-01-15 03:45:22'),(70,'default','Logged In As Admin   admin@mail.com',NULL,NULL,7,'App\\User','[]','2020-01-15 03:50:12','2020-01-15 03:50:12'),(71,'default','Logged In As Admin   admin@mail.com',NULL,NULL,7,'App\\User','[]','2020-01-15 03:50:35','2020-01-15 03:50:35'),(72,'default','Logged In As Admin   admin@mail.com',NULL,NULL,7,'App\\User','[]','2020-01-15 04:33:50','2020-01-15 04:33:50'),(73,'default','Logged In As Admin   admin@mail.com',NULL,NULL,7,'App\\User','[]','2020-01-15 04:48:47','2020-01-15 04:48:47'),(74,'default','Logged In As Admin   admin@mail.com',NULL,NULL,7,'App\\User','[]','2020-01-15 04:50:10','2020-01-15 04:50:10'),(75,'default','Logged In As Admin   admin@mail.com',NULL,NULL,7,'App\\User','[]','2020-01-15 04:50:27','2020-01-15 04:50:27'),(76,'default','Logged In As Admin   admin@mail.com',NULL,NULL,7,'App\\User','[]','2020-01-15 04:51:47','2020-01-15 04:51:47'),(77,'default','User Tried To Log In   csr3@mail.com',NULL,NULL,9,'App\\User','[]','2020-01-20 04:01:58','2020-01-20 04:01:58');
/*!40000 ALTER TABLE `activity_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assesor_per_programs`
--

DROP TABLE IF EXISTS `assesor_per_programs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assesor_per_programs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `program_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `assesor_per_programs_program_id_foreign` (`program_id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assesor_per_programs`
--

LOCK TABLES `assesor_per_programs` WRITE;
/*!40000 ALTER TABLE `assesor_per_programs` DISABLE KEYS */;
INSERT INTO `assesor_per_programs` VALUES (1,NULL,NULL,'itsms@mail.com',1),(27,'2019-12-08 20:34:57','2019-12-08 20:35:48','bcms@mail.com',226),(3,NULL,NULL,'isms@mail.com',3),(4,NULL,NULL,'ems@mail.com',4),(38,'2020-01-13 06:10:57','2020-01-13 06:10:57','qms@mail.com',248),(6,NULL,NULL,'admin@mail.com',0),(42,'2020-01-20 04:02:20','2020-01-20 04:02:20','csr3@mail.com',268),(43,'2020-01-20 16:29:22','2020-01-20 16:29:22','admin2@mail.com',0);
/*!40000 ALTER TABLE `assesor_per_programs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `closed_non_conformity_evidence`
--

DROP TABLE IF EXISTS `closed_non_conformity_evidence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `closed_non_conformity_evidence` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `clossureDate` date NOT NULL,
  `briefDescription` text COLLATE utf8_unicode_ci NOT NULL,
  `locationOfEvidence` text COLLATE utf8_unicode_ci NOT NULL,
  `nonConformity_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `closed_non_conformity_evidence_nonconformity_id_foreign` (`nonConformity_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `closed_non_conformity_evidence`
--

LOCK TABLES `closed_non_conformity_evidence` WRITE;
/*!40000 ALTER TABLE `closed_non_conformity_evidence` DISABLE KEYS */;
INSERT INTO `closed_non_conformity_evidence` VALUES (1,'2020-01-09 00:51:35','2020-01-09 00:51:35','2020-01-07','Phishing awareness across the organisation has been conducted and is slated to finish on 4th of February 2020','apa1578541894.docx',56),(2,'2020-01-09 23:26:15','2020-01-09 23:26:15','2019-12-29','Kindly Fill The Following Fields to Complete Assesing :: Number_of_IRC_team_members_who_have_completed_the_ISO_27001_Lead_Implementer_course.','attachment1578623174.docx',52),(3,'2020-01-15 00:31:12','2020-01-15 00:31:12','2020-01-22','select * from closed_non_conformity_evidence;','Pipedream.ai - Workbench1579059072.htm',110),(4,'2020-01-15 00:34:47','2020-01-15 00:34:47','2020-01-22','activity_log;','Pipedream.ai - Workbench1579059287.htm',111);
/*!40000 ALTER TABLE `closed_non_conformity_evidence` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `key_perfomace_indicators`
--

DROP TABLE IF EXISTS `key_perfomace_indicators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `key_perfomace_indicators` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strategic_objective_id` bigint(20) unsigned DEFAULT NULL,
  `perspective_id` bigint(20) unsigned DEFAULT NULL,
  `arithmeticStructure` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `target` double NOT NULL,
  `period` int(11) NOT NULL,
  `units` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `key_perfomace_indicators_strategicobjective_id_foreign` (`strategic_objective_id`),
  KEY `key_perfomace_indicators_perspective_id_foreign` (`perspective_id`)
) ENGINE=MyISAM AUTO_INCREMENT=309 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `key_perfomace_indicators`
--

LOCK TABLES `key_perfomace_indicators` WRITE;
/*!40000 ALTER TABLE `key_perfomace_indicators` DISABLE KEYS */;
INSERT INTO `key_perfomace_indicators` VALUES (113,'Percentage Of Loaded Capex Loaded Below.',1,1,0,'2019-11-16 16:55:05','2019-12-07 04:27:56',100,4,'%'),(114,'percentage_met_of_commited_capex_below',1,1,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',100,4,'%'),(115,'percentage_of_reciept_capex_below',1,1,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',100,4,'%'),(4,'percentage_of_escaleted_complaints_above',2,2,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',20,4,'%'),(5,'percentage_of_returned_questionaires_above',2,2,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',75,4,'%'),(6,'service_desk_SLA_perfomance',3,2,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',98.5,4,''),(7,'service_desk_FCR',3,2,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',75,4,''),(8,'Average_Dropped_Call_Ratio_Below',4,2,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',0.3,4,''),(9,'Avearge_call_setup_success_above',4,2,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',99.4,4,''),(10,'Average_Cell_Availability_above',4,2,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',99.85,4,''),(11,'Speech_quality_MOS_Above',4,2,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',3.8,4,''),(12,'Call_Setup_time_M-M_below',4,2,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',4.5,4,''),(13,'M-Pesa_TPSs_Count_Below',5,2,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',1100,4,''),(14,'M-PESA_Availability_above_inPercentage',5,2,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',99,4,''),(15,'M-PESA_Response_time_above',5,2,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',5,4,''),(16,'3G_Download_speeds_kbps',6,2,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',5000,4,''),(17,'percentage_of_download_speeds_above_3Mbps',6,2,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',70,4,''),(18,'3G_upload_speeds_in_kbps',6,2,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',1700,4,''),(19,'3G_latency_ms',6,2,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',65,4,''),(20,'3G_mean_web_browsing_session_time',6,2,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',8,4,''),(21,'4G_download_speeds_in_Kbps',6,2,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',10,4,''),(22,'percentage_of_4G_download_connection_above_1mbps',6,2,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',92,4,''),(23,'4G_ipload_speeds_in_Kbps_above',6,2,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',7,4,''),(24,'4G_latency_in_ms_above',6,2,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',42,4,''),(25,'4G_mean_browsing_session_below',6,2,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',4.2,4,''),(26,'3G_youtube_reproductions_without_inerruption',6,2,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',97,4,''),(27,'4G_youtube_reproductions_without_inerruption',6,2,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',99,4,''),(28,'percentage_of_3G_download_connections_above_1Mbps',6,2,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',90,4,'%'),(29,'percentage_of_4G_download_connections_above_3Mbps',6,2,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',90,4,'%'),(30,'change_success_rate',7,3,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',93,4,'%'),(31,'change_related_incidents',7,3,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',1,4,'%'),(32,'change_roll_back',7,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',5,4,'%'),(33,'emmergency_changes',7,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',5,4,'%'),(34,'unauthorised_changes',7,3,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',0,4,'%'),(35,'closed_crqs',7,3,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',85,4,'crqs'),(36,'change_rescheduling',7,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',5,4,''),(37,'incidents_escalation_times(DIT)',8,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',20,4,''),(38,'incidents_report_comliance_within_24Hrs_of_service',8,3,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',100,4,''),(39,'incidence_escalation_DNOC',8,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',20,4,''),(40,'incidence_communication',8,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',15,4,''),(41,'incidence_notification',8,3,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',97,4,''),(42,'incidence_report_rate',9,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',35,4,''),(43,'problem_resolution_rate',9,3,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',10,4,''),(44,'problem_workaround_rate',9,3,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',95,4,''),(45,'average_problem_resolution_on_time_in_days',9,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',84,4,''),(46,'proactive_problem_ticket_rate',9,3,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',30,4,''),(47,'problem_reopen_rate',9,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',2,4,''),(48,'release_success_rate',10,3,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',90,4,'%'),(49,'release_resheduel_rate',10,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',1,4,'%'),(50,'release_incident_rate',10,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',1,4,'%'),(51,'known_release_errors_in_production',10,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',1,4,'%'),(52,'release_withdrawal_rate',10,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',1,4,''),(53,'time_to_detect_incidents',11,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',60,4,'days'),(54,'time_to_close_incidents',11,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',21,4,''),(55,'CPU_Utilisation_UGW',12,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',70,4,''),(56,'CPU_Utilisation_MSS',12,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',70,4,''),(57,'CPU_Utilisation_MGW',12,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',70,4,''),(58,'CPU_Utilisation_SGSN',12,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',70,4,''),(59,'CPU_Utilisation_MLG',12,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',50,4,''),(60,'Memory_Utilisation_UGW',13,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',70,4,''),(61,'Memory_Utilisation_SGSN',13,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',80,4,''),(62,'Memory_Utilisation_MIG',13,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',50,4,''),(63,'License_Utilisation_UGW',14,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',70,4,''),(64,'License_Utilisation_SGSN',14,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',70,4,''),(65,'No_Champions_trained',15,4,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',0,4,''),(66,'percentage_ITIL_foundation_comletion',15,4,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',90,4,''),(67,'Awareness_Attendance',15,4,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',90,4,''),(304,'Ensure Induction for all New Joiners at entry point',69,135,1,'2020-01-13 06:35:51','2020-01-13 06:35:51',100,4,''),(303,'Ensure Customer Quality Management in terms of abandoned calls',69,135,0,'2020-01-13 06:29:03','2020-01-13 06:29:03',23,4,''),(282,'Ensure annual review of the Quality management system- Management Review',63,137,1,'2020-01-13 06:12:55','2020-01-13 06:12:55',1,4,''),(73,'Ensure_annual_QMS_Awareness',18,6,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',80,4,''),(74,'Increase_QMS_competencies_through_Training_and_awareness',19,6,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',90,4,''),(302,'Ensure Customer Quality Management in terms of answered Calls',69,135,1,'2020-01-13 06:28:43','2020-01-13 06:28:43',117366,4,''),(301,'Ensure Customer Quality Management in terms of  Offered Calls',69,135,1,'2020-01-13 06:28:21','2020-01-13 06:28:21',123453,4,''),(300,'Ensure Customer Quality Management in terms of Repeat caller FCR(First Contact Resolution)',69,135,1,'2020-01-13 06:27:40','2020-01-13 06:27:40',75,4,''),(298,'Ensure Customer Quality Management in terms of que Management  Youth, 80% in 20 Sec',69,135,1,'2020-01-13 06:26:48','2020-01-13 06:26:48',80,4,''),(299,'Ensure Customer Quality Management in terms of que Management (Mass)  80% in 20 Sec',69,135,1,'2020-01-13 06:27:19','2020-01-13 06:27:19',80,4,''),(297,'Ensure Customer Quality Management in terms of que Management(HVC) 85% in 20 Sec  - Enterprise',69,135,1,'2020-01-13 06:26:12','2020-01-13 06:26:12',85,4,''),(294,'Ensure Customer Quality Management in terms of que Management(HVC) 85% in 20 Sec - Hustler',69,135,1,'2020-01-13 06:25:05','2020-01-13 06:25:05',85,4,''),(293,'Improve Net Promoter Score (NPS) In Relation To Customer Products And Services. Customer Satisfaction',68,135,0,'2020-01-13 06:24:00','2020-01-13 06:24:00',63,4,''),(283,'Ensure there are no repeat non-conformities identified during external audit',63,137,1,'2020-01-13 06:13:17','2020-01-13 06:13:17',0,4,''),(88,'Cumulative Fraud Information Security Incidents Leading To Financial Loss( Impact Of 4 To 5)',25,9,3,'2019-11-16 16:55:05','2020-01-09 04:45:19',3,4,''),(89,'Successful_ISO_27001_external_audit_(not_more_than_1_minor)_BSI',26,9,4,'2019-11-16 16:55:05','2019-11-16 16:55:05',1,4,''),(90,'Number_of_high_risk_issues_raised_by_External_audit_on_access_management',26,9,5,'2019-11-16 16:55:05','2019-11-16 16:55:05',0,4,''),(91,'Percentage Of Unauthorized Or Incorrect Changes That Have Led To Service Downtimes Services Of Customer Facing Services',27,10,6,'2019-11-16 16:55:05','2020-01-09 22:42:23',0.5,4,''),(92,'Number_of_incidents_related_to_breached_customer_information(_at_a_max_4_per_week)',28,10,7,'2019-11-16 16:55:05','2019-11-16 16:55:05',36,4,''),(93,'Percentage_of_active_antivirus_installed_on_desktops_and_laptops',29,11,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',95,4,''),(94,'Percentage_of_workstations_with_ISE_configuration(NAC)',29,11,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',100,4,''),(95,'Percentage_coverage_of_pentest_across_Cloud,_M-PESA,_Mobile_Data,_Customer_Support_and_Billing',29,11,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',100,4,''),(96,'Percentage_coverage_of_VA(PVMG)_across_Cloud,_M-PESA,_Mobile_Data,_Customer_Support_and_Billing',29,11,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',100,4,''),(97,'Percentage_of_group_1(Criticality_league)_systems_found_without_critical_vulnerabilties_which_can_lead_to_direct_unauthorized_access',29,11,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',100,4,''),(98,'Number_of_risk_assessment_cycles_carried_out_during_the_year',30,11,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',2,4,''),(99,'Number_of_scheduled_3rd_party_risk_assessments_conducted',30,11,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',9,4,''),(100,'Number_of_management_reviews_carried_out_during_the_year',30,11,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',2,4,''),(101,'Percentage_mandatory_ISMS_documents_reviewed',30,11,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',100,4,''),(102,'Number_of_internal_audits_carried_out_annually',30,11,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',1,4,''),(103,'Number_of_systems_in_logging_scope_whose_logs_are_collected_centrally_across_13_parameters',31,11,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',100,4,''),(104,'Percentage_of_monthly_user_access_reviews_completed_by_information_owners',32,11,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',100,4,''),(105,'Percentage_of_independent_user_access_reviews_per_schedule',32,11,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',100,4,''),(106,'Percentage_of_users_who_resisted_phishing_attempts',33,12,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',90,4,''),(107,'Percentage_of_all_new_staff_who_complete_the_induction',33,12,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',100,4,''),(108,'Percentage_of_all_members_of_staff_who_complete_the_quiz',33,12,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',90,4,''),(109,'Number_of_IRC_team_members_who_have_completed_the_ISO_27001_Lead_Implementer_course',34,12,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',80,4,''),(110,'Number_of_IRC_team_members_who_have_completed_the_Cyber_Risk_training',34,12,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',80,4,''),(116,'Reduce electricity consumption of 141,499 MWh by 2 %. This considers increase in the number of sites',35,13,1,'2019-11-25 06:20:00','2019-11-25 06:20:00',34675,4,''),(253,'Number of management reviews carried out',47,70,1,'2020-01-08 04:23:30','2020-01-08 04:23:30',2,1,''),(117,'Reduce diesel consumption (gensets) of 9,639,517 L by 5 %  (This considers increase in the number of sites)',35,13,1,'2019-11-25 06:20:00','2019-11-25 06:20:00',2361682,4,''),(118,'Reduce carbon emission of 63,685 tCO2e by 4 %',35,13,1,'2019-11-25 06:20:00','2019-11-25 06:20:00',15285,4,''),(119,'Reduce water consumption of 91,449 m3 by 2 %',35,13,1,'2019-11-25 06:20:00','2019-11-25 06:20:00',22405,4,''),(120,'Reduce solid waste to dumpsites from the main corporate facilities by 90%',35,13,1,'2019-11-25 06:20:00','2019-11-25 06:20:00',23,4,''),(121,'Number of internal audits carried out for ISO14001 within the financial year ',35,13,1,'2019-11-25 06:20:00','2019-11-25 06:20:00',1,4,''),(122,'Conduct mandatory Regulatory Environmental audits for all BTS sites constructed ln the previous year, Retail centres, MSRs and main corporate offices - 325 sites.',36,13,1,'2019-11-25 06:20:00','2019-11-25 06:20:00',81.25,4,''),(123,'Noise Zero tolerance for non-Compliance on Enviromental standards',36,13,1,'2019-11-25 06:20:00','2019-11-25 06:20:00',0,4,''),(124,'EMF Zero tolerance for non-Compliance on Enviromental standards',36,13,1,'2019-11-25 06:20:00','2019-11-25 06:20:00',0,4,''),(125,'Air Quality Zero tolerance for non-Compliance on Enviromental standards',36,13,1,'2019-11-25 06:20:00','2019-11-25 06:20:00',0,4,''),(126,'Staff awareness campaigns carried out in the year (4)',37,13,1,'2019-11-25 06:20:00','2019-11-25 06:20:00',1,4,''),(127,'Increase volume of E-Waste collected from 223 tonnes by 20%',37,13,1,'2019-11-25 06:20:00','2019-11-25 06:20:00',67,4,''),(128,'Training sessions carried on to our staff on ISO14001',37,13,1,'2019-11-25 06:20:00','2019-11-25 06:20:00',1,4,''),(281,'Ensure Review of Legal and Reulatory requiremtns carried - Carry out at leasr 1 review annually',62,134,1,'2020-01-13 06:11:56','2020-01-13 06:11:56',1,1,''),(296,'Ensure Customer Quality Management in terms of que Management(HVC) 85% in 20 Sec-Post Pay',69,135,1,'2020-01-13 06:25:54','2020-01-13 06:25:54',85,4,''),(295,'Ensure Customer Quality Management in terms of que Management(HVC) 85% in 20 Sec - DP',69,135,1,'2020-01-13 06:25:31','2020-01-13 06:25:31',85,4,''),(251,'No of business continuity risks in the top 10 companywide risk register',47,70,1,'2020-01-08 04:22:43','2020-01-08 04:22:43',1,1,''),(250,'Number of Internal Audits carried out annually',47,70,1,'2020-01-08 04:21:28','2020-01-08 04:21:28',1,1,''),(254,'Number of major non conformities identified during the internal audit',47,70,0,'2020-01-08 04:24:00','2020-01-08 04:24:00',1,1,''),(252,'Percentage mandatory BCMS up to date',47,70,1,'2020-01-08 04:23:11','2020-01-08 04:23:11',95,1,''),(248,'Number of drills carried out per key facility (HQ1&2,SCC,JCC and HQ3)',46,70,1,'2020-01-08 04:20:45','2020-01-08 04:20:45',9,1,''),(246,'Number of new strategic systems/Mission Critical implemented without adequate DR',46,70,0,'2020-01-08 04:19:54','2020-01-08 04:19:54',0,4,''),(247,'Number of site risk assessments carried out for key sites (HQ1&2, SCC, JCC, HQ3, Thika, QoA, Gospel, Kiboswa, Mombasa and Nakuru)',46,70,1,'2020-01-08 04:20:23','2020-01-08 04:20:23',3,1,''),(245,'Percentage of disaster recovery tests passed',46,70,1,'2020-01-08 04:19:31','2020-01-08 04:19:31',90,1,''),(244,'Percentage of Disaster Recovery tests carried out for critical systems during the year',46,70,1,'2020-01-08 04:19:09','2020-01-08 04:19:09',90,1,''),(243,'Percentage Of Technology BC Champions Staff With BCM Objectives Defined',49,69,1,'2020-01-08 04:18:26','2020-01-08 04:18:26',90,1,''),(241,'Number of employee awareness campaigns carried out during the year',48,69,1,'2020-01-08 04:17:11','2020-01-08 04:17:11',1,1,''),(240,'Number of induction sessions held during the year for BCM induction training',48,69,1,'2020-01-08 04:16:38','2020-01-08 04:16:38',3,4,''),(239,'Number of incidents where CMT is activated per quarter',50,68,0,'2020-01-08 04:15:06','2020-01-08 04:15:06',4,4,''),(236,'Reduce The Number Of Incidents Meeting Crisis Thresholds Per Quarter',45,67,0,'2020-01-08 04:12:51','2020-01-08 04:12:51',4,4,''),(237,'Number of crisis incidents that exceed the defined Maximum Torelabe Recovery Time Objectives',50,68,0,'2020-01-08 04:14:05','2020-01-08 04:14:05',0,4,''),(238,'Percentage of crisis management activations sorted before disaster threshold',50,68,1,'2020-01-08 04:14:38','2020-01-08 04:14:38',90,1,''),(235,'Crisis activation leading to financial loss above 100-500M (serious Harm)',45,67,0,'2020-01-08 04:12:27','2020-01-08 04:12:27',0,4,''),(229,'We have a zero tolerance for regulatory breaches on BCMS -NRRD guideliness as defined by CA',44,67,0,'2020-01-08 04:10:30','2020-01-08 04:10:30',0,4,''),(230,'We have a zero tolerance for contractual BCM breaches',44,67,0,'2020-01-08 04:10:43','2020-01-08 04:10:43',0,4,''),(231,'We have zero tolerance for health and safety risk e.g. loss of life (while on duty/company premises)',44,67,0,'2020-01-08 04:11:00','2020-01-08 04:11:00',0,4,''),(232,'Incidents that required reporting to the regulator',44,67,0,'2020-01-08 04:11:23','2020-01-08 04:11:23',1,4,''),(284,'Ensure there are no repeat non-conformities identified during internal audit',63,137,1,'2020-01-13 06:13:38','2020-01-13 06:13:38',0,4,''),(285,'Number of Internal Audits carried out annually',63,137,1,'2020-01-13 06:13:59','2020-01-13 06:13:59',1,2,''),(286,'One Risk Assessment unertaken on key processes across the business',64,137,1,'2020-01-13 06:14:20','2020-01-13 06:14:20',1,4,''),(287,'Ensure annual QMS Awareness',65,136,1,'2020-01-13 06:16:23','2020-01-13 06:16:23',100,1,''),(288,'Increase QMS competencies through Training and awareness',66,136,1,'2020-01-13 06:16:48','2020-01-13 06:16:48',90,4,''),(289,'Improve Net Promoter Score (NPS) in relation to Customer Products and Services. Customer Satisfaction',67,135,0,'2020-01-13 06:20:41','2020-01-13 06:20:41',40,4,'');
/*!40000 ALTER TABLE `key_perfomace_indicators` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `key_perfomance_indicator_scores`
--

DROP TABLE IF EXISTS `key_perfomance_indicator_scores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `key_perfomance_indicator_scores` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ytd` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kpi_id` bigint(20) unsigned NOT NULL,
  `strategic_objective_id` bigint(20) unsigned NOT NULL,
  `score` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `quater` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `key_perfomance_indicator_scores_kpi_id_foreign` (`kpi_id`),
  KEY `key_perfomance_indicator_scores_strategicobjective_id_foreign` (`strategic_objective_id`)
) ENGINE=MyISAM AUTO_INCREMENT=277 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `key_perfomance_indicator_scores`
--

LOCK TABLES `key_perfomance_indicator_scores` WRITE;
/*!40000 ALTER TABLE `key_perfomance_indicator_scores` DISABLE KEYS */;
INSERT INTO `key_perfomance_indicator_scores` VALUES (1,'2019/2020','61',113,1,'100','2019-12-31 08:04:28','2020-01-10 05:16:39','Q2'),(2,'2019/2020','52',114,1,'100','2019-12-31 08:04:28','2020-01-10 05:16:39','Q2'),(3,'2019/2020','21',115,1,'100','2019-12-31 08:04:28','2020-01-10 05:16:39','Q2'),(4,'2019/2020','89',113,1,'100','2019-12-31 08:05:46','2019-12-31 08:05:46','Q1'),(5,'2019/2020','89',114,1,'100','2019-12-31 08:05:46','2019-12-31 08:05:46','Q1'),(6,'2019/2020','89',115,1,'100','2019-12-31 08:05:46','2019-12-31 08:05:46','Q1'),(7,'2019/2020','20',4,2,'100','2019-12-31 10:27:49','2019-12-31 10:27:49','Q1'),(8,'2019/2020','75',5,2,'100','2019-12-31 10:27:49','2019-12-31 10:27:49','Q1'),(9,'2019/2020','98',6,3,'99.49238578680203','2019-12-31 10:28:15','2019-12-31 10:28:15','Q1'),(10,'2019/2020','70',7,3,'93.33333333333333','2019-12-31 10:28:15','2019-12-31 10:28:15','Q1'),(11,'2019/2020','0.2',8,4,'100','2019-12-31 10:29:01','2019-12-31 10:29:01','Q1'),(12,'2019/2020','99',9,4,'99.59758551307847','2019-12-31 10:29:01','2019-12-31 10:29:01','Q1'),(13,'2019/2020','99',10,4,'99.14872308462694','2019-12-31 10:29:01','2019-12-31 10:29:01','Q1'),(14,'2019/2020','3.5',11,4,'92.10526315789474','2019-12-31 10:29:01','2019-12-31 10:29:01','Q1'),(15,'2019/2020','4.5',12,4,'100','2019-12-31 10:29:01','2019-12-31 10:29:01','Q1'),(16,'2019/2020','1101',13,5,'0.09082652134423251','2019-12-31 10:29:24','2019-12-31 10:29:24','Q1'),(17,'2019/2020','99',14,5,'100','2019-12-31 10:29:24','2019-12-31 10:29:24','Q1'),(18,'2019/2020','5',15,5,'100','2019-12-31 10:29:24','2019-12-31 10:29:24','Q1'),(19,'2019/2020','5001',16,6,'100','2019-12-31 10:30:41','2019-12-31 10:30:41','Q1'),(20,'2019/2020','71',17,6,'100','2019-12-31 10:30:41','2019-12-31 10:30:41','Q1'),(21,'2019/2020','1600',18,6,'94.11764705882352','2019-12-31 10:30:41','2019-12-31 10:36:18','Q1'),(22,'2019/2020','66',19,6,'1.5151515151515151','2019-12-31 10:30:41','2019-12-31 10:36:18','Q1'),(23,'2019/2020','8',20,6,'100','2019-12-31 10:30:41','2019-12-31 10:30:41','Q1'),(24,'2019/2020','10',21,6,'100','2019-12-31 10:30:41','2019-12-31 10:30:41','Q1'),(25,'2019/2020','92',22,6,'100','2019-12-31 10:30:41','2019-12-31 10:30:41','Q1'),(26,'2019/2020','8',23,6,'100','2019-12-31 10:30:41','2019-12-31 10:30:41','Q1'),(27,'2019/2020','44',24,6,'4.545454545454546','2019-12-31 10:30:41','2019-12-31 10:36:18','Q1'),(28,'2019/2020','99',30,7,'100','2019-12-31 10:31:11','2019-12-31 10:31:11','Q1'),(29,'2019/2020','1',31,7,'100','2019-12-31 10:31:11','2019-12-31 10:31:11','Q1'),(30,'2019/2020','4',32,7,'100','2019-12-31 10:31:11','2019-12-31 10:31:11','Q1'),(31,'2019/2020','3',33,7,'100','2019-12-31 10:31:11','2019-12-31 10:31:11','Q1'),(32,'2019/2020','1',34,7,'100','2019-12-31 10:31:11','2019-12-31 10:31:11','Q1'),(33,'2019/2020','88',35,7,'100','2019-12-31 10:31:11','2019-12-31 10:31:11','Q1'),(34,'2019/2020','9',36,7,'44.44444444444444','2019-12-31 10:31:11','2019-12-31 10:31:11','Q1'),(35,'2019/2020','22',37,8,'9.090909090909092','2019-12-31 10:31:55','2019-12-31 10:31:55','Q1'),(36,'2019/2020','10',38,8,'10','2019-12-31 10:31:55','2019-12-31 10:31:55','Q1'),(37,'2019/2020','19',39,8,'100','2019-12-31 10:31:55','2019-12-31 10:31:55','Q1'),(38,'2019/2020','15',40,8,'100','2019-12-31 10:31:55','2019-12-31 10:31:55','Q1'),(39,'2019/2020','99',41,8,'100','2019-12-31 10:31:55','2019-12-31 10:31:55','Q1'),(40,'2019/2020','33',42,9,'100','2019-12-31 10:32:23','2019-12-31 10:32:23','Q1'),(41,'2019/2020','9',43,9,'90','2019-12-31 10:32:23','2019-12-31 10:32:23','Q1'),(42,'2019/2020','99',44,9,'100','2019-12-31 10:32:23','2019-12-31 10:32:23','Q1'),(43,'2019/2020','80',45,9,'100','2019-12-31 10:32:23','2019-12-31 10:32:23','Q1'),(44,'2019/2020','36',46,9,'100','2019-12-31 10:32:23','2019-12-31 10:32:23','Q1'),(45,'2019/2020','0',47,9,'100','2019-12-31 10:32:23','2019-12-31 10:32:23','Q1'),(46,'2019/2020','90',48,10,'100','2019-12-31 10:32:57','2019-12-31 10:32:57','Q1'),(47,'2019/2020','0',49,10,'100','2019-12-31 10:32:57','2019-12-31 10:32:57','Q1'),(48,'2019/2020','0',50,10,'100','2019-12-31 10:32:57','2019-12-31 10:32:57','Q1'),(49,'2019/2020','2',51,10,'50','2019-12-31 10:32:57','2019-12-31 10:32:57','Q1'),(50,'2019/2020','2',52,10,'50','2019-12-31 10:32:57','2019-12-31 10:32:57','Q1'),(51,'2019/2020','59',53,11,'100','2019-12-31 10:33:05','2019-12-31 10:33:05','Q1'),(52,'2019/2020','20',54,11,'100','2019-12-31 10:33:05','2019-12-31 10:33:05','Q1'),(53,'2019/2020','66',55,12,'100','2019-12-31 10:33:44','2019-12-31 10:33:44','Q1'),(54,'2019/2020','74',56,12,'5.405405405405405','2019-12-31 10:33:44','2019-12-31 10:33:44','Q1'),(55,'2019/2020','71',57,12,'1.4084507042253522','2019-12-31 10:33:44','2019-12-31 10:33:44','Q1'),(56,'2019/2020','71',58,12,'1.4084507042253522','2019-12-31 10:33:44','2019-12-31 10:33:44','Q1'),(57,'2019/2020','50',59,12,'100','2019-12-31 10:33:44','2019-12-31 10:33:44','Q1'),(58,'2019/2020','69',60,13,'100','2019-12-31 10:33:55','2019-12-31 10:33:55','Q1'),(59,'2019/2020','79',61,13,'100','2019-12-31 10:33:55','2019-12-31 10:33:55','Q1'),(60,'2019/2020','49',62,13,'100','2019-12-31 10:33:55','2019-12-31 10:33:55','Q1'),(61,'2019/2020','80',63,14,'12.5','2019-12-31 10:34:12','2019-12-31 10:34:12','Q1'),(62,'2019/2020','69',64,14,'100','2019-12-31 10:34:12','2019-12-31 10:34:12','Q1'),(63,'2019/2020','0',65,15,'0','2019-12-31 10:34:35','2019-12-31 10:34:35','Q1'),(64,'2019/2020','100',66,15,'100','2019-12-31 10:34:35','2019-12-31 10:34:35','Q1'),(65,'2019/2020','94',67,15,'4.25531914893617','2019-12-31 10:34:35','2019-12-31 10:34:35','Q1'),(66,'2019/2020','4.3',25,6,'2.3255813953488293','2019-12-31 10:36:18','2019-12-31 10:36:18','Q1'),(67,'2019/2020','99',26,6,'100','2019-12-31 10:36:18','2019-12-31 10:36:18','Q1'),(68,'2019/2020','99',27,6,'100','2019-12-31 10:36:18','2019-12-31 10:36:18','Q1'),(69,'2019/2020','89',28,6,'98.88888888888889','2019-12-31 10:36:18','2019-12-31 10:36:18','Q1'),(70,'2019/2020','90',29,6,'100','2019-12-31 10:36:18','2019-12-31 10:36:18','Q1'),(71,'2019/2020','45',4,2,'100','2019-12-31 10:37:33','2020-01-10 05:17:06','Q2'),(72,'2019/2020','65',5,2,'86.66666666666667','2019-12-31 10:37:33','2020-01-10 05:17:06','Q2'),(73,'2019/2020','98.05',6,3,'99.54314720812182','2019-12-31 10:37:48','2020-01-10 05:17:43','Q2'),(74,'2019/2020','81.4',7,3,'100','2019-12-31 10:37:48','2020-01-10 05:17:43','Q2'),(75,'2019/2020','0.26',8,4,'100','2019-12-31 10:38:21','2020-01-10 05:18:36','Q2'),(76,'2019/2020','99.52',9,4,'100','2019-12-31 10:38:21','2020-01-10 05:18:36','Q2'),(77,'2019/2020','99.7',10,4,'99.849774661993','2019-12-31 10:38:21','2020-01-10 05:18:36','Q2'),(78,'2019/2020','3.68',11,4,'96.8421052631579','2019-12-31 10:38:21','2020-01-10 05:18:36','Q2'),(79,'2019/2020','3.79',12,4,'100','2019-12-31 10:38:21','2020-01-10 05:18:36','Q2'),(80,'2019/2020','730',13,5,'100','2019-12-31 10:38:43','2020-01-10 05:19:45','Q2'),(81,'2019/2020','99.92',14,5,'100','2019-12-31 10:38:43','2020-01-10 05:19:45','Q2'),(82,'2019/2020','14.91',15,5,'100','2019-12-31 10:38:43','2020-01-10 05:19:45','Q2'),(83,'2019/2020','7152',16,6,'100','2019-12-31 12:12:37','2020-01-10 05:27:35','Q2'),(84,'2019/2020','72.43',17,6,'100','2019-12-31 12:12:37','2020-01-10 05:27:35','Q2'),(85,'2019/2020','1630',18,6,'95.88235294117648','2019-12-31 12:12:37','2020-01-10 05:27:35','Q2'),(86,'2019/2020','46',19,6,'100','2019-12-31 12:12:37','2020-01-10 05:27:35','Q2'),(87,'2019/2020','3.1',20,6,'100','2019-12-31 12:12:37','2020-01-10 05:27:35','Q2'),(88,'2019/2020','16.9',21,6,'100','2019-12-31 12:12:38','2020-01-10 05:27:35','Q2'),(89,'2019/2020','99.79',22,6,'100','2019-12-31 12:12:38','2020-01-10 05:27:35','Q2'),(90,'2019/2020','12.03',23,6,'100','2019-12-31 12:12:38','2020-01-10 05:27:35','Q2'),(91,'2019/2020','35',24,6,'100','2019-12-31 12:12:38','2020-01-10 05:27:35','Q2'),(92,'2019/2020','1.8',25,6,'100','2019-12-31 12:12:38','2020-01-10 05:27:35','Q2'),(93,'2019/2020','97.2',26,6,'100','2019-12-31 12:12:38','2020-01-10 05:27:35','Q2'),(94,'2019/2020','98.9',27,6,'99.89898989898991','2019-12-31 12:12:38','2020-01-10 05:27:35','Q2'),(95,'2019/2020','72.43',28,6,'80.47777777777779','2019-12-31 12:12:38','2020-01-10 05:27:35','Q2'),(96,'2019/2020','98.81',29,6,'100','2019-12-31 12:12:38','2020-01-10 05:27:35','Q2'),(97,'2019/2020','99.3',30,7,'100','2019-12-31 12:13:16','2020-01-10 05:29:39','Q2'),(98,'2019/2020','1.1',31,7,'100','2019-12-31 12:13:16','2020-01-10 05:29:39','Q2'),(99,'2019/2020','0.8',32,7,'100','2019-12-31 12:13:16','2020-01-10 05:29:39','Q2'),(100,'2019/2020','1.1',33,7,'100','2019-12-31 12:13:16','2020-01-10 05:29:39','Q2'),(101,'2019/2020','0.1',34,7,'100','2019-12-31 12:13:16','2020-01-10 05:29:39','Q2'),(102,'2019/2020','87.5',35,7,'100','2019-12-31 12:13:16','2020-01-10 05:29:39','Q2'),(103,'2019/2020','0.4',36,7,'100','2019-12-31 12:13:16','2020-01-10 05:29:39','Q2'),(104,'2019/2020','19',37,8,'100','2019-12-31 12:13:47','2020-01-10 05:30:29','Q2'),(105,'2019/2020','100',38,8,'100','2019-12-31 12:13:47','2020-01-10 05:30:29','Q2'),(106,'2019/2020','10',39,8,'100','2019-12-31 12:13:47','2020-01-10 05:30:29','Q2'),(107,'2019/2020','10',40,8,'100','2019-12-31 12:13:47','2019-12-31 12:13:47','Q2'),(108,'2019/2020','96.5',41,8,'99.48453608247422','2019-12-31 12:13:47','2020-01-10 05:30:29','Q2'),(109,'2019/2020','22.1',42,9,'100','2019-12-31 12:14:25','2020-01-10 05:32:21','Q2'),(110,'2019/2020','4.1',43,9,'41','2019-12-31 12:14:25','2020-01-10 05:32:21','Q2'),(111,'2019/2020','98.9',44,9,'100','2019-12-31 12:14:25','2020-01-10 05:32:21','Q2'),(112,'2019/2020','18.3',45,9,'100','2019-12-31 12:14:25','2020-01-10 05:32:21','Q2'),(113,'2019/2020','68.7',46,9,'100','2019-12-31 12:14:25','2020-01-10 05:32:21','Q2'),(114,'2019/2020','0',47,9,'100','2019-12-31 12:14:25','2019-12-31 12:14:25','Q2'),(115,'2019/2020','100',48,10,'100','2019-12-31 12:14:44','2020-01-10 05:33:27','Q2'),(116,'2019/2020','4.22',49,10,'76.30331753554502','2019-12-31 12:14:44','2020-01-10 05:33:27','Q2'),(117,'2019/2020','0',50,10,'100','2019-12-31 12:14:44','2019-12-31 12:14:44','Q2'),(118,'2019/2020','0',51,10,'100','2019-12-31 12:14:44','2020-01-10 05:33:27','Q2'),(119,'2019/2020','0',52,10,'100','2019-12-31 12:14:44','2020-01-10 05:33:27','Q2'),(120,'2019/2020','27.9',53,11,'100','2019-12-31 12:15:00','2020-01-10 05:33:58','Q2'),(121,'2019/2020','4.7',54,11,'100','2019-12-31 12:15:00','2020-01-10 05:33:58','Q2'),(122,'2019/2020','60.67',55,12,'100','2019-12-31 12:15:45','2020-01-10 05:35:13','Q2'),(123,'2019/2020','50.5',56,12,'100','2019-12-31 12:15:45','2020-01-10 05:35:13','Q2'),(124,'2019/2020','58',57,12,'100','2019-12-31 12:15:45','2020-01-10 05:35:13','Q2'),(125,'2019/2020','61.83',58,12,'100','2019-12-31 12:15:45','2020-01-10 05:35:13','Q2'),(126,'2019/2020','27',59,12,'100','2019-12-31 12:15:45','2020-01-10 05:35:13','Q2'),(127,'2019/2020','60.67',60,13,'100','2019-12-31 12:16:02','2020-01-10 05:35:50','Q2'),(128,'2019/2020','62.33',61,13,'100','2019-12-31 12:16:02','2020-01-10 05:35:50','Q2'),(129,'2019/2020','34.63',62,13,'100','2019-12-31 12:16:02','2020-01-10 05:35:50','Q2'),(130,'2019/2020','41.5',63,14,'100','2019-12-31 12:16:09','2020-01-10 05:36:15','Q2'),(131,'2019/2020','33.83',64,14,'100','2019-12-31 12:16:09','2020-01-10 05:36:15','Q2'),(132,'2019/2020','35',65,15,'100','2019-12-31 12:16:35','2020-01-10 05:36:43','Q2'),(133,'2019/2020','96',66,15,'100','2019-12-31 12:16:35','2020-01-10 05:36:43','Q2'),(134,'2019/2020','0',67,15,'100','2019-12-31 12:16:35','2020-01-10 05:36:43','Q2'),(135,'2019/2020','3',89,26,'0','2019-12-31 13:25:18','2020-01-11 22:14:46','Q2'),(136,'2019/2020','0',90,26,'100','2019-12-31 13:25:18','2019-12-31 13:25:18','Q2'),(137,'2019/2020','4',88,25,'66','2019-12-31 13:25:19','2020-01-11 22:17:50','Q2'),(138,'2019/2020','1.1',91,27,'89.99999999999999','2020-01-01 02:01:12','2020-01-11 22:19:08','Q2'),(139,'2019/2020','59',92,28,'63.888888888888886','2020-01-01 02:01:14','2020-01-11 22:19:10','Q2'),(140,'2019/2020','90',93,29,'94.73684210526315','2020-01-01 02:02:13','2020-01-11 22:20:25','Q2'),(141,'2019/2020','85',94,29,'85','2020-01-01 02:02:13','2020-01-11 22:20:25','Q2'),(142,'2019/2020','25',95,29,'25','2020-01-01 02:02:13','2020-01-11 22:20:25','Q2'),(143,'2019/2020','100',96,29,'100','2020-01-01 02:02:13','2020-01-11 22:20:25','Q2'),(144,'2019/2020','50',97,29,'50','2020-01-01 02:02:13','2020-01-11 22:20:25','Q2'),(145,'2019/2020','2',98,30,'100','2020-01-01 02:02:35','2020-01-11 22:21:23','Q2'),(146,'2019/2020','3',99,30,'33.33333333333333','2020-01-01 02:02:35','2020-01-11 22:21:23','Q2'),(147,'2019/2020','1',100,30,'50','2020-01-01 02:02:35','2020-01-11 22:21:23','Q2'),(148,'2019/2020','85',101,30,'85','2020-01-01 02:02:35','2020-01-11 22:21:23','Q2'),(149,'2019/2020','1',102,30,'100','2020-01-01 02:02:35','2020-01-11 22:21:23','Q2'),(150,'2019/2020','33',103,31,'33','2020-01-01 02:02:40','2020-01-11 22:21:46','Q2'),(151,'2019/2020','100',104,32,'100','2020-01-01 02:02:47','2020-01-01 02:02:47','Q2'),(152,'2019/2020','100',105,32,'100','2020-01-01 02:02:47','2020-01-01 02:02:47','Q2'),(153,'2019/2020','70',106,33,'77.77777777777779','2020-01-01 02:03:14','2020-01-11 22:22:35','Q2'),(154,'2019/2020','90',107,33,'90','2020-01-01 02:03:14','2020-01-11 22:22:35','Q2'),(155,'2019/2020','17',108,33,'18.88888888888889','2020-01-01 02:03:14','2020-01-11 22:22:35','Q2'),(156,'2019/2020','100',109,34,'100','2020-01-01 02:03:26','2020-01-11 22:22:47','Q2'),(157,'2019/2020','100',110,34,'100','2020-01-01 02:03:26','2020-01-11 22:22:47','Q2'),(158,'2019/2020','4',88,25,'66','2020-01-01 02:06:53','2020-01-01 02:06:53','Q1'),(159,'2019/2020','0',89,26,'0','2020-01-01 02:06:55','2020-01-01 02:06:55','Q1'),(160,'2019/2020','0',90,26,'100','2020-01-01 02:06:55','2020-01-01 02:06:55','Q1'),(161,'2019/2020','1',91,27,'100','2020-01-01 02:07:01','2020-01-01 02:07:01','Q1'),(162,'2019/2020','42',92,28,'16.66666666666667','2020-01-01 02:07:14','2020-01-01 02:07:14','Q1'),(163,'2019/2020','95',93,29,'100','2020-01-01 02:07:48','2020-01-01 02:07:48','Q1'),(164,'2019/2020','99',94,29,'99','2020-01-01 02:07:48','2020-01-01 02:07:48','Q1'),(165,'2019/2020','99',95,29,'99','2020-01-01 02:07:48','2020-01-01 02:07:48','Q1'),(166,'2019/2020','100',96,29,'100','2020-01-01 02:07:48','2020-01-01 02:07:48','Q1'),(167,'2019/2020','100',97,29,'100','2020-01-01 02:07:48','2020-01-01 02:07:48','Q1'),(168,'2019/2020','3',98,30,'100','2020-01-01 02:08:15','2020-01-01 02:08:15','Q1'),(169,'2019/2020','8',99,30,'88.88888888888889','2020-01-01 02:08:15','2020-01-01 02:08:15','Q1'),(170,'2019/2020','2',100,30,'100','2020-01-01 02:08:15','2020-01-01 02:08:15','Q1'),(171,'2019/2020','100',101,30,'100','2020-01-01 02:08:15','2020-01-01 02:08:15','Q1'),(172,'2019/2020','2',102,30,'100','2020-01-01 02:08:15','2020-01-01 02:08:15','Q1'),(173,'2019/2020','56',103,31,'56.00000000000001','2020-01-01 02:08:27','2020-01-01 02:08:27','Q1'),(174,'2019/2020','96',104,32,'96','2020-01-01 02:08:52','2020-01-01 02:08:52','Q1'),(175,'2019/2020','99',105,32,'99','2020-01-01 02:08:52','2020-01-01 02:08:52','Q1'),(176,'2019/2020','89',106,33,'98.88888888888889','2020-01-01 02:09:12','2020-01-01 02:09:12','Q1'),(177,'2019/2020','100',107,33,'100','2020-01-01 02:09:12','2020-01-01 02:09:12','Q1'),(178,'2019/2020','90',108,33,'100','2020-01-01 02:09:12','2020-01-01 02:09:12','Q1'),(179,'2019/2020','90',109,34,'100','2020-01-01 02:09:20','2020-01-01 02:09:20','Q1'),(180,'2019/2020','90',110,34,'100','2020-01-01 02:09:20','2020-01-01 02:09:20','Q1'),(181,'2019/2020','2',68,16,'50','2020-01-10 04:41:20','2020-01-10 04:41:20','Q2'),(182,'2019/2020','0',69,16,'100','2020-01-10 04:41:20','2020-01-10 04:41:20','Q2'),(183,'2019/2020','0',70,16,'100','2020-01-10 04:41:20','2020-01-10 04:41:20','Q2'),(184,'2019/2020','0',71,16,'0','2020-01-10 04:41:20','2020-01-10 04:41:20','Q2'),(185,'2019/2020','0',72,17,'0','2020-01-10 04:41:36','2020-01-10 04:41:36','Q2'),(186,'2019/2020','70',257,42,'77.77777777777779','2020-01-10 04:52:08','2020-01-10 04:52:08','Q2'),(187,'2019/2020','75',256,43,'93.75','2020-01-10 04:52:09','2020-01-10 04:52:09','Q2'),(188,'2019/2020','24',75,20,'100','2020-01-10 04:54:37','2020-01-10 04:54:37','Q2'),(189,'2019/2020','63',76,21,'3.1746031746031744','2020-01-10 04:54:48','2020-01-10 04:54:48','Q2'),(190,'2019/2020','100',77,22,'100','2020-01-10 04:57:03','2020-01-10 04:57:03','Q2'),(191,'2019/2020','96',78,22,'100','2020-01-10 04:57:03','2020-01-10 04:57:03','Q2'),(192,'2019/2020','96',79,22,'100','2020-01-10 04:57:03','2020-01-10 04:57:03','Q2'),(193,'2019/2020','94',80,22,'100','2020-01-10 04:57:03','2020-01-10 04:57:03','Q2'),(194,'2019/2020','84',81,22,'98.82352941176471','2020-01-10 04:57:03','2020-01-10 04:57:03','Q2'),(195,'2019/2020','96',82,22,'100','2020-01-10 04:57:03','2020-01-10 04:57:03','Q2'),(196,'2019/2020','77',83,22,'96.25','2020-01-10 04:57:03','2020-01-10 04:57:03','Q2'),(197,'2019/2020','78',84,22,'100','2020-01-10 04:57:03','2020-01-10 04:57:03','Q2'),(198,'2019/2020','110124',85,22,'89.13819479857216','2020-01-10 04:57:03','2020-01-10 04:57:03','Q2'),(199,'2019/2020','1001175',86,22,'100','2020-01-10 04:57:03','2020-01-10 04:57:03','Q2'),(200,'2019/2020','8',87,22,'100','2020-01-10 04:57:03','2020-01-10 04:57:03','Q2'),(201,'2019/2020','0',229,44,'100','2020-01-10 05:39:19','2020-01-10 05:39:19','Q2'),(202,'2019/2020','0',230,44,'100','2020-01-10 05:39:19','2020-01-10 05:39:19','Q2'),(203,'2019/2020','1',231,44,'0','2020-01-10 05:39:19','2020-01-11 21:34:50','Q2'),(204,'2019/2020','0',232,44,'100','2020-01-10 05:39:19','2020-01-11 21:33:48','Q2'),(205,'2019/2020','2',236,45,'100','2020-01-10 05:39:24','2020-01-10 05:39:24','Q2'),(206,'2019/2020','0',235,45,'100','2020-01-10 05:39:24','2020-01-10 05:39:24','Q2'),(207,'2019/2020','100',248,46,'100','2020-01-10 05:40:17','2020-01-10 05:40:17','Q2'),(208,'2019/2020','0',246,46,'100','2020-01-10 05:40:17','2020-01-10 05:40:17','Q2'),(209,'2019/2020','100',247,46,'100','2020-01-10 05:40:17','2020-01-10 05:40:17','Q2'),(210,'2019/2020','100',245,46,'100','2020-01-10 05:40:17','2020-01-10 05:40:17','Q2'),(211,'2019/2020','100',244,46,'100','2020-01-10 05:40:17','2020-01-10 05:40:17','Q2'),(212,'2019/2020','100',253,47,'100','2020-01-10 05:40:26','2020-01-10 05:40:26','Q2'),(213,'2019/2020','100',251,47,'100','2020-01-10 05:40:26','2020-01-10 05:40:26','Q2'),(214,'2019/2020','100',250,47,'100','2020-01-10 05:40:26','2020-01-10 05:40:26','Q2'),(215,'2019/2020','100',254,47,'99','2020-01-10 05:40:26','2020-01-10 05:40:26','Q2'),(216,'2019/2020','100',252,47,'100','2020-01-10 05:40:26','2020-01-10 05:40:26','Q2'),(217,'2019/2020','100',241,48,'100','2020-01-10 05:40:53','2020-01-10 05:40:53','Q2'),(218,'2019/2020','1.5',240,48,'50','2020-01-10 05:40:53','2020-01-11 21:30:53','Q2'),(219,'2019/2020','100',243,49,'100','2020-01-10 05:41:03','2020-01-10 05:41:03','Q2'),(220,'2019/2020','2',239,50,'100','2020-01-10 05:42:22','2020-01-10 05:42:22','Q2'),(221,'2019/2020','1',237,50,'0','2020-01-10 05:42:22','2020-01-10 05:42:22','Q2'),(222,'2019/2020','100',238,50,'100','2020-01-10 05:42:22','2020-01-10 05:42:22','Q2'),(223,'2019/2020','42976.5',116,35,'100','2020-01-10 05:54:19','2020-01-10 05:54:19','Q2'),(224,'2019/2020','2279893',117,35,'96.5368326472404','2020-01-10 05:54:19','2020-01-10 05:54:19','Q2'),(225,'2019/2020','18689',118,35,'100','2020-01-10 05:54:19','2020-01-10 05:54:19','Q2'),(226,'2019/2020','23542.5',119,35,'100','2020-01-10 05:54:19','2020-01-10 05:54:19','Q2'),(227,'2019/2020','49.5',120,35,'100','2020-01-10 05:54:19','2020-01-10 05:54:19','Q2'),(228,'2019/2020','1',121,35,'100','2020-01-10 05:54:19','2020-01-10 05:54:19','Q2'),(229,'2019/2020','25',122,36,'30.76923076923077','2020-01-10 05:56:34','2020-01-10 05:56:34','Q2'),(230,'2019/2020','0',123,36,'0','2020-01-10 05:56:34','2020-01-10 05:56:34','Q2'),(231,'2019/2020','0',124,36,'0','2020-01-10 05:56:34','2020-01-10 05:56:34','Q2'),(232,'2019/2020','0',125,36,'0','2020-01-10 05:56:34','2020-01-10 05:56:34','Q2'),(233,'2019/2020','1',126,37,'100','2020-01-10 05:58:57','2020-01-10 05:58:57','Q2'),(234,'2019/2020','89',127,37,'100','2020-01-10 05:58:57','2020-01-10 05:58:57','Q2'),(235,'2019/2020','1',128,37,'100','2020-01-10 05:58:57','2020-01-10 05:58:57','Q2'),(236,'2019/2020','0',265,56,'0','2020-01-10 07:10:29','2020-01-11 22:11:26','Q2'),(237,'2019/2020','0',262,55,'100','2020-01-10 08:18:48','2020-01-10 08:18:48','Q2'),(238,'2019/2020','0',261,55,'100','2020-01-10 08:18:48','2020-01-10 08:18:48','Q2'),(239,'2019/2020','100',263,55,'100','2020-01-10 08:18:48','2020-01-10 08:18:48','Q2'),(240,'2019/2020','2',260,55,'100','2020-01-10 08:18:48','2020-01-10 08:18:48','Q2'),(241,'2019/2020','100',278,60,'100','2020-01-10 08:19:44','2020-01-12 13:26:33','Q2'),(242,'2019/2020','70',279,61,'100','2020-01-10 08:19:56','2020-01-10 08:19:56','Q2'),(243,'2019/2020','24',266,57,'100','2020-01-10 08:22:45','2020-01-11 22:04:55','Q2'),(244,'2019/2020','63',267,58,'100','2020-01-10 08:22:57','2020-01-11 22:08:07','Q2'),(245,'2019/2020','100',280,59,'100','2020-01-10 09:19:24','2020-01-10 09:19:24','Q2'),(246,'2019/2020','8',277,59,'100','2020-01-10 09:19:24','2020-01-10 09:19:24','Q2'),(247,'2019/2020','1001175',276,59,'100','2020-01-10 09:19:24','2020-01-10 09:19:24','Q2'),(248,'2019/2020','110124',275,59,'89.13819479857216','2020-01-10 09:19:24','2020-01-10 09:19:24','Q2'),(249,'2019/2020','78',274,59,'100','2020-01-10 09:19:24','2020-01-10 09:19:24','Q2'),(250,'2019/2020','77',273,59,'96.25','2020-01-10 09:19:24','2020-01-10 09:19:24','Q2'),(251,'2019/2020','96',272,59,'100','2020-01-10 09:19:24','2020-01-10 09:19:24','Q2'),(252,'2019/2020','84',271,59,'98.82352941176471','2020-01-10 09:19:24','2020-01-10 09:19:24','Q2'),(253,'2019/2020','94',270,59,'100','2020-01-10 09:19:24','2020-01-10 09:19:24','Q2'),(254,'2019/2020','96',268,59,'100','2020-01-10 09:19:24','2020-01-10 09:19:24','Q2'),(255,'2019/2020','96',269,59,'100','2020-01-10 09:19:24','2020-01-10 09:19:24','Q2'),(256,'2019/2020','100',281,62,'100','2020-01-13 06:30:43','2020-01-13 06:30:43','Q2'),(257,'2019/2020','100',287,65,'100','2020-01-13 06:32:13','2020-01-13 06:32:13','Q2'),(258,'2019/2020','70',288,66,'77.77777777777779','2020-01-13 06:32:40','2020-01-13 06:32:40','Q2'),(259,'2019/2020','2',282,63,'100','2020-01-13 06:33:31','2020-01-13 06:33:31','Q2'),(260,'2019/2020','0',283,63,'0','2020-01-13 06:33:31','2020-01-13 06:33:31','Q2'),(261,'2019/2020','0',284,63,'0','2020-01-13 06:33:31','2020-01-13 06:33:31','Q2'),(262,'2019/2020','0',285,63,'0','2020-01-13 06:33:31','2020-01-13 06:33:31','Q2'),(263,'2019/2020','0',286,64,'0','2020-01-13 06:33:42','2020-01-13 06:33:42','Q2'),(264,'2019/2020','24',289,67,'100','2020-01-13 06:34:07','2020-01-13 06:34:07','Q2'),(265,'2019/2020','63',293,68,'100','2020-01-13 06:34:11','2020-01-13 06:34:11','Q2'),(266,'2019/2020','100',304,69,'100','2020-01-13 06:40:16','2020-01-13 06:40:16','Q2'),(267,'2019/2020','8',303,69,'100','2020-01-13 06:40:16','2020-01-13 06:40:16','Q2'),(268,'2019/2020','1001175',302,69,'100','2020-01-13 06:40:16','2020-01-13 06:40:16','Q2'),(269,'2019/2020','110124',301,69,'89.20317853758111','2020-01-13 06:40:16','2020-01-13 06:40:16','Q2'),(270,'2019/2020','78',300,69,'100','2020-01-13 06:40:16','2020-01-13 06:40:16','Q2'),(271,'2019/2020','96',298,69,'100','2020-01-13 06:40:16','2020-01-13 06:40:16','Q2'),(272,'2019/2020','77',299,69,'96.25','2020-01-13 06:40:16','2020-01-13 06:40:16','Q2'),(273,'2019/2020','84',297,69,'98.82352941176471','2020-01-13 06:40:16','2020-01-13 06:40:16','Q2'),(274,'2019/2020','96',294,69,'100','2020-01-13 06:40:16','2020-01-13 06:40:16','Q2'),(275,'2019/2020','96',296,69,'100','2020-01-13 06:40:16','2020-01-13 06:40:16','Q2'),(276,'2019/2020','94',295,69,'100','2020-01-13 06:40:16','2020-01-13 06:40:16','Q2');
/*!40000 ALTER TABLE `key_perfomance_indicator_scores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_11_16_114800_create_key_perfomance_indicator_scores_table',1),(4,'2019_11_16_114801_create_programs_table',1),(5,'2019_11_16_114802_create_perspectives_table',1),(6,'2019_11_16_114803_create_strategic_objectives_table',1),(7,'2019_11_16_114804_create_key_perfomace_indicators_table',1),(8,'2019_11_16_114805_create_non_conformities_table',1),(9,'2019_11_16_114806_create_scoresRecorded_table',1),(10,'2019_11_16_111119_entrust_setup_tables',2),(11,'2019_11_16_145309_create_authorisations_table',3),(12,'2019_11_17_025241_create-strateic_objective_scores-table',4),(13,'2019_11_17_091638_create_assesor_per_programs_table',5),(14,'2019_11_19_074519_create_year_actives_table',6),(15,'2019_11_19_074657_create_quater_actives_table',6),(16,'2019_11_23_165755_create_closed_non_conformity_evidence_table',7),(17,'2019_12_10_031159_create_reports_generateds_table',8),(18,'2020_01_14_135146_create_activity_log_table',9),(19,'2020_01_20_074558_create_usereditings_table',10);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `non_conformities`
--

DROP TABLE IF EXISTS `non_conformities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `non_conformities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quater` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rootCause` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `openClosed` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `correction` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `correctiveAction` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `keyPerfomanceIndicator_id` bigint(20) unsigned NOT NULL,
  `strategicObjective_id` bigint(20) unsigned DEFAULT NULL,
  `perspective_id` bigint(20) unsigned DEFAULT NULL,
  `program_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `non_conformities_keyperfomanceindicator_id_foreign` (`keyPerfomanceIndicator_id`),
  KEY `non_conformities_strategicobjective_id_foreign` (`strategicObjective_id`),
  KEY `non_conformities_perspective_id_foreign` (`perspective_id`),
  KEY `non_conformities_program_id_foreign` (`program_id`)
) ENGINE=MyISAM AUTO_INCREMENT=112 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `non_conformities`
--

LOCK TABLES `non_conformities` WRITE;
/*!40000 ALTER TABLE `non_conformities` DISABLE KEYS */;
INSERT INTO `non_conformities` VALUES (110,'2019/2020','Q2','select * from closed_non_conformity_evidence;','closed','select * from closed_non_conformity_evidence;','select * from closed_non_conformity_evidence;','2020-01-21 21:00:00',5,2,2,1,'2020-01-15 00:25:30','2020-01-15 00:31:12'),(111,'2019/2020','Q2','activity_log;','closed','activity_log;','activity_log;','2020-01-21 21:00:00',88,25,9,3,'2020-01-15 00:34:32','2020-01-15 00:34:47');
/*!40000 ALTER TABLE `non_conformities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perspectives`
--

DROP TABLE IF EXISTS `perspectives`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `perspectives` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `weight` double NOT NULL,
  `program_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `perspective_group` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `perspectives_id_unique` (`id`),
  KEY `perspectives_program_id_foreign` (`program_id`)
) ENGINE=MyISAM AUTO_INCREMENT=191 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perspectives`
--

LOCK TABLES `perspectives` WRITE;
/*!40000 ALTER TABLE `perspectives` DISABLE KEYS */;
INSERT INTO `perspectives` VALUES (1,'sms_financial_perspective',NULL,10,1,'2019-11-16 12:20:21','2019-11-16 12:20:21',1),(2,'sms_customer_perspective',NULL,35,1,'2019-11-16 12:20:21','2019-11-16 12:20:21',2),(3,'sms_internal_business_process_perspective',NULL,50,1,'2019-11-16 12:20:21','2019-11-16 12:20:21',3),(4,'sms_learning_and_growth',NULL,5,1,'2019-11-16 12:20:21','2019-11-16 12:20:21',4),(137,'QMS_internal_business_process_perspective',NULL,30,248,'2020-01-13 06:10:52','2020-01-13 06:10:52',3),(134,'QMS_financial_perspective',NULL,10,248,'2020-01-13 06:10:52','2020-01-13 06:10:52',1),(135,'QMS_customer_perspective',NULL,50,248,'2020-01-13 06:10:52','2020-01-13 06:10:52',2),(136,'QMS_learning_and_growth_perspective',NULL,10,248,'2020-01-13 06:10:52','2020-01-13 06:10:52',4),(9,'isms_financial_perspective',NULL,20,3,'2019-11-16 12:20:21','2019-11-16 12:20:21',1),(10,'isms_customer_perspective',NULL,25,3,'2019-11-16 12:20:21','2019-11-16 12:20:21',2),(11,'isms_internal_business_process_perspective',NULL,35,3,'2019-11-16 12:20:21','2019-11-16 12:20:21',3),(12,'isms_learning_and_growth',NULL,20,3,'2019-11-16 12:20:21','2019-11-16 12:20:21',4),(13,'ems_Environmental Management System Perspective',NULL,100,4,'2019-11-25 05:46:52','2019-11-25 05:46:52',5),(14,'ans_financial_perspective',NULL,50,184,'2019-12-03 03:19:43','2019-12-03 03:19:43',9),(70,'BCMS_internal_business_process_perspective',NULL,30,226,'2019-12-08 19:41:48','2019-12-08 19:41:48',3),(69,'BCMS_learning_and_growth_perspective',NULL,20,226,'2019-12-08 19:41:48','2019-12-08 19:41:48',4),(68,'BCMS_customer_perspective',NULL,30,226,'2019-12-08 19:41:48','2019-12-08 19:41:48',2),(67,'BCMS_financial_perspective',NULL,20,226,'2019-12-08 19:41:48','2019-12-08 19:41:48',1),(188,'Customer Perspective trial 3',NULL,20,268,'2020-01-20 01:27:13','2020-01-20 01:28:17',0),(179,'financial perspective',NULL,20,268,'2020-01-19 15:33:46','2020-01-20 01:27:13',1),(183,'Customer Perspective',NULL,28,268,'2020-01-20 01:22:40','2020-01-20 09:26:02',0),(190,'trial editing,',NULL,32,268,'2020-01-20 09:25:21','2020-01-20 09:26:02',1);
/*!40000 ALTER TABLE `perspectives` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `programs`
--

DROP TABLE IF EXISTS `programs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `programs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shortHand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `imageLocation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `programCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `colorCode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `programs_id_unique` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=269 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `programs`
--

LOCK TABLES `programs` WRITE;
/*!40000 ALTER TABLE `programs` DISABLE KEYS */;
INSERT INTO `programs` VALUES (1,'Service Management System','SMS','This is the program that is used to get the integrity of the information technology services.','2019-11-16 12:07:47','2020-01-12 22:57:00','images/itsms.jpg','IS0/20000/2014','#00C0EF'),(3,'Information Security Management System','ISMS',NULL,'2019-11-16 12:07:47','2019-11-16 12:07:47','images/isms.png','IS0/27001','#F39C12'),(4,'Environmental Manaement System','EMS',NULL,'2019-11-16 12:07:47','2020-01-20 16:58:36','images/ems.jpg','IS0/14000','#00A65A'),(248,'Quality Management System.','QMS','Quality Management System.','2020-01-13 06:10:52','2020-01-13 06:10:52','N/A','ISO/9001','#00ff40'),(268,'CSR','CSR','CSR','2020-01-19 15:33:46','2020-01-20 16:59:43','N/A','CSR','#800080'),(226,'Business Contuinity Management System','BCMS','Business Contuinity Management System','2019-12-08 19:40:40','2019-12-08 19:40:40','N/A','ISO/22301','#ff0080');
/*!40000 ALTER TABLE `programs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quater_actives`
--

DROP TABLE IF EXISTS `quater_actives`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quater_actives` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Quater` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quater_actives`
--

LOCK TABLES `quater_actives` WRITE;
/*!40000 ALTER TABLE `quater_actives` DISABLE KEYS */;
INSERT INTO `quater_actives` VALUES (1,NULL,'2020-01-20 16:22:41','Q1',0),(2,NULL,'2020-01-20 16:57:16','Q2',1),(3,NULL,'2020-01-20 16:57:16','Q3',0),(4,NULL,'2020-01-02 11:11:05','Q4',0);
/*!40000 ALTER TABLE `quater_actives` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reports_generateds`
--

DROP TABLE IF EXISTS `reports_generateds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reports_generateds` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `quater` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reportLocation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `program_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reports_generateds`
--

LOCK TABLES `reports_generateds` WRITE;
/*!40000 ALTER TABLE `reports_generateds` DISABLE KEYS */;
INSERT INTO `reports_generateds` VALUES (1,'2019-12-10 03:41:19','2019-12-20 12:00:08','Q1','2019/2020','reports/BCMS_report_2019-2020_Q1_1576854008.pdf',226),(2,'2019-12-10 05:00:34','2019-12-20 12:04:29','Q1','2019/2020','reports/ISMS_report_2019-2020_Q1_1576854269.pdf',3),(3,'2019-12-31 04:34:54','2020-01-12 12:09:10','Q2','2019/2020','reports/ISMS_report_2019-2020_Q2_1578841750.pdf',3),(4,'2019-12-31 04:47:25','2020-01-15 00:38:49','Q2','2019/2020','reports/SMS_report_2019-2020_Q2_1579059529.pdf',1),(5,'2019-12-31 12:55:15','2019-12-31 12:55:15','Q1','2019/2020','reports/SMS_report_2019-2020_Q1_1577807715.pdf',1),(6,'2020-01-10 06:00:32','2020-01-20 16:58:44','Q2','2019/2020','reports/EMS_report_2019-2020_Q2_1579550324.pdf',4),(7,'2020-01-12 12:09:51','2020-01-18 04:01:46','Q2','2019/2020','reports/BCMS_report_2019-2020_Q2_1579330906.pdf',226),(9,'2020-01-13 06:44:56','2020-01-13 08:01:14','Q2','2019/2020','reports/QMS_report_2019-2020_Q2_1578913274.pdf',248);
/*!40000 ALTER TABLE `reports_generateds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scoresrecorded`
--

DROP TABLE IF EXISTS `scoresrecorded`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `scoresrecorded` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `keyPerfomanceIndicator_id` bigint(20) unsigned NOT NULL,
  `score` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quater` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `metOrUnmet` int(11) NOT NULL,
  `reasonProvided` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `scoresrecorded_keyperfomanceindicator_id_foreign` (`keyPerfomanceIndicator_id`)
) ENGINE=MyISAM AUTO_INCREMENT=277 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scoresrecorded`
--

LOCK TABLES `scoresrecorded` WRITE;
/*!40000 ALTER TABLE `scoresrecorded` DISABLE KEYS */;
INSERT INTO `scoresrecorded` VALUES (1,88,'4','Q2','2019/2020',2,'2','2019-12-31 07:46:44','2020-01-11 22:14:42'),(2,89,'3','Q2','2019/2020',0,'0','2019-12-31 07:49:41','2020-01-11 22:14:46'),(3,113,'61','Q2','2019/2020',0,'0','2019-12-31 07:50:26','2020-01-10 05:16:39'),(4,114,'52','Q2','2019/2020',0,'0','2019-12-31 08:04:28','2020-01-10 05:16:39'),(5,115,'21','Q2','2019/2020',2,'2','2019-12-31 08:04:28','2020-01-20 17:10:38'),(6,113,'89','Q1','2019/2020',0,'0','2019-12-31 08:05:46','2019-12-31 08:05:46'),(7,114,'89','Q1','2019/2020',0,'0','2019-12-31 08:05:46','2019-12-31 08:05:46'),(8,115,'89','Q1','2019/2020',0,'0','2019-12-31 08:05:46','2019-12-31 08:05:46'),(9,4,'20','Q1','2019/2020',0,'0','2019-12-31 10:27:49','2019-12-31 10:27:49'),(10,5,'75','Q1','2019/2020',0,'0','2019-12-31 10:27:49','2019-12-31 10:27:49'),(11,6,'98','Q1','2019/2020',1,'1','2019-12-31 10:28:15','2019-12-31 10:28:15'),(12,7,'70','Q1','2019/2020',1,'1','2019-12-31 10:28:15','2019-12-31 10:28:15'),(13,8,'0.2','Q1','2019/2020',0,'0','2019-12-31 10:29:01','2019-12-31 10:29:01'),(14,9,'99','Q1','2019/2020',1,'1','2019-12-31 10:29:01','2019-12-31 10:29:01'),(15,10,'99','Q1','2019/2020',1,'1','2019-12-31 10:29:01','2019-12-31 10:29:01'),(16,11,'3.5','Q1','2019/2020',1,'1','2019-12-31 10:29:01','2019-12-31 10:29:01'),(17,12,'4.5','Q1','2019/2020',0,'0','2019-12-31 10:29:01','2019-12-31 10:29:01'),(18,13,'1101','Q1','2019/2020',1,'1','2019-12-31 10:29:24','2019-12-31 10:29:24'),(19,14,'99','Q1','2019/2020',0,'0','2019-12-31 10:29:24','2019-12-31 10:29:24'),(20,15,'5','Q1','2019/2020',0,'0','2019-12-31 10:29:24','2019-12-31 10:29:24'),(21,16,'5001','Q1','2019/2020',2,'2','2019-12-31 10:30:41','2019-12-31 10:36:18'),(22,17,'71','Q1','2019/2020',2,'2','2019-12-31 10:30:41','2019-12-31 10:36:18'),(23,18,'1600','Q1','2019/2020',2,'2','2019-12-31 10:30:41','2019-12-31 10:36:18'),(24,19,'66','Q1','2019/2020',2,'2','2019-12-31 10:30:41','2019-12-31 10:36:18'),(25,20,'8','Q1','2019/2020',2,'2','2019-12-31 10:30:41','2019-12-31 10:36:18'),(26,21,'10','Q1','2019/2020',2,'2','2019-12-31 10:30:41','2019-12-31 10:36:18'),(27,22,'92','Q1','2019/2020',2,'2','2019-12-31 10:30:41','2019-12-31 10:36:18'),(28,23,'8','Q1','2019/2020',2,'2','2019-12-31 10:30:41','2019-12-31 10:36:18'),(29,24,'44','Q1','2019/2020',2,'2','2019-12-31 10:30:41','2019-12-31 10:36:18'),(30,30,'99','Q1','2019/2020',0,'0','2019-12-31 10:31:11','2019-12-31 10:31:11'),(31,31,'1','Q1','2019/2020',0,'0','2019-12-31 10:31:11','2019-12-31 10:31:11'),(32,32,'4','Q1','2019/2020',0,'0','2019-12-31 10:31:11','2019-12-31 10:31:11'),(33,33,'3','Q1','2019/2020',0,'0','2019-12-31 10:31:11','2019-12-31 10:31:11'),(34,34,'1','Q1','2019/2020',0,'0','2019-12-31 10:31:11','2019-12-31 10:31:11'),(35,35,'88','Q1','2019/2020',0,'0','2019-12-31 10:31:11','2019-12-31 10:31:11'),(36,36,'9','Q1','2019/2020',1,'1','2019-12-31 10:31:11','2019-12-31 10:31:11'),(37,37,'22','Q1','2019/2020',1,'1','2019-12-31 10:31:55','2019-12-31 10:31:55'),(38,38,'10','Q1','2019/2020',1,'1','2019-12-31 10:31:55','2019-12-31 10:31:55'),(39,39,'19','Q1','2019/2020',0,'0','2019-12-31 10:31:55','2019-12-31 10:31:55'),(40,40,'15','Q1','2019/2020',0,'0','2019-12-31 10:31:55','2019-12-31 10:31:55'),(41,41,'99','Q1','2019/2020',0,'0','2019-12-31 10:31:55','2019-12-31 10:31:55'),(42,42,'33','Q1','2019/2020',0,'0','2019-12-31 10:32:23','2019-12-31 10:32:23'),(43,43,'9','Q1','2019/2020',1,'1','2019-12-31 10:32:23','2019-12-31 10:32:23'),(44,44,'99','Q1','2019/2020',0,'0','2019-12-31 10:32:23','2019-12-31 10:32:23'),(45,45,'80','Q1','2019/2020',0,'0','2019-12-31 10:32:23','2019-12-31 10:32:23'),(46,46,'36','Q1','2019/2020',0,'0','2019-12-31 10:32:23','2019-12-31 10:32:23'),(47,47,'0','Q1','2019/2020',0,'0','2019-12-31 10:32:23','2019-12-31 10:32:23'),(48,48,'90','Q1','2019/2020',0,'0','2019-12-31 10:32:57','2019-12-31 10:32:57'),(49,49,'0','Q1','2019/2020',0,'0','2019-12-31 10:32:57','2019-12-31 10:32:57'),(50,50,'0','Q1','2019/2020',0,'0','2019-12-31 10:32:57','2019-12-31 10:32:57'),(51,51,'2','Q1','2019/2020',1,'1','2019-12-31 10:32:57','2019-12-31 10:32:57'),(52,52,'2','Q1','2019/2020',1,'1','2019-12-31 10:32:57','2019-12-31 10:32:57'),(53,53,'59','Q1','2019/2020',0,'0','2019-12-31 10:33:05','2019-12-31 10:33:05'),(54,54,'20','Q1','2019/2020',0,'0','2019-12-31 10:33:05','2019-12-31 10:33:05'),(55,55,'66','Q1','2019/2020',0,'0','2019-12-31 10:33:44','2019-12-31 10:33:44'),(56,56,'74','Q1','2019/2020',1,'1','2019-12-31 10:33:44','2019-12-31 10:33:44'),(57,57,'71','Q1','2019/2020',1,'1','2019-12-31 10:33:44','2019-12-31 10:33:44'),(58,58,'71','Q1','2019/2020',1,'1','2019-12-31 10:33:44','2019-12-31 10:33:44'),(59,59,'50','Q1','2019/2020',0,'0','2019-12-31 10:33:44','2019-12-31 10:33:44'),(60,60,'69','Q1','2019/2020',0,'0','2019-12-31 10:33:55','2019-12-31 10:33:55'),(61,61,'79','Q1','2019/2020',0,'0','2019-12-31 10:33:55','2019-12-31 10:33:55'),(62,62,'49','Q1','2019/2020',0,'0','2019-12-31 10:33:55','2019-12-31 10:33:55'),(63,63,'80','Q1','2019/2020',1,'1','2019-12-31 10:34:12','2019-12-31 10:34:12'),(64,64,'69','Q1','2019/2020',0,'0','2019-12-31 10:34:12','2019-12-31 10:34:12'),(65,65,'0','Q1','2019/2020',0,'0','2019-12-31 10:34:35','2019-12-31 10:34:35'),(66,66,'100','Q1','2019/2020',0,'0','2019-12-31 10:34:35','2019-12-31 10:34:35'),(67,67,'94','Q1','2019/2020',1,'1','2019-12-31 10:34:35','2019-12-31 10:34:35'),(68,25,'4.3','Q1','2019/2020',1,'1','2019-12-31 10:36:18','2019-12-31 10:36:18'),(69,26,'99','Q1','2019/2020',0,'0','2019-12-31 10:36:18','2019-12-31 10:36:18'),(70,27,'99','Q1','2019/2020',0,'0','2019-12-31 10:36:18','2019-12-31 10:36:18'),(71,28,'89','Q1','2019/2020',1,'1','2019-12-31 10:36:18','2019-12-31 10:36:18'),(72,29,'90','Q1','2019/2020',0,'0','2019-12-31 10:36:18','2019-12-31 10:36:18'),(73,4,'45','Q2','2019/2020',0,'0','2019-12-31 10:37:33','2020-01-10 05:17:06'),(74,5,'65','Q2','2019/2020',1,'1','2019-12-31 10:37:33','2019-12-31 10:37:33'),(75,6,'98.05','Q2','2019/2020',1,'1','2019-12-31 10:37:48','2020-01-10 05:17:43'),(76,7,'81.40','Q2','2019/2020',0,'0','2019-12-31 10:37:48','2020-01-10 05:17:43'),(77,8,'0.26','Q2','2019/2020',0,'0','2019-12-31 10:38:21','2020-01-10 05:18:36'),(78,9,'99.52','Q2','2019/2020',0,'0','2019-12-31 10:38:21','2020-01-10 05:18:36'),(79,10,'99.70','Q2','2019/2020',1,'1','2019-12-31 10:38:21','2020-01-10 05:18:36'),(80,11,'3.68','Q2','2019/2020',1,'1','2019-12-31 10:38:21','2020-01-10 05:18:36'),(81,12,'3.79','Q2','2019/2020',0,'0','2019-12-31 10:38:21','2020-01-10 05:18:36'),(82,13,'730','Q2','2019/2020',0,'0','2019-12-31 10:38:43','2020-01-10 05:19:45'),(83,14,'99.92','Q2','2019/2020',0,'0','2019-12-31 10:38:43','2020-01-10 05:19:45'),(84,15,'14.91','Q2','2019/2020',0,'0','2019-12-31 10:38:43','2020-01-10 05:19:45'),(85,16,'7152','Q2','2019/2020',0,'0','2019-12-31 12:12:37','2020-01-10 05:27:35'),(86,17,'72.43','Q2','2019/2020',0,'0','2019-12-31 12:12:37','2020-01-10 05:27:35'),(87,18,'1630','Q2','2019/2020',1,'1','2019-12-31 12:12:37','2020-01-10 05:27:35'),(88,19,'46','Q2','2019/2020',0,'0','2019-12-31 12:12:37','2020-01-10 05:27:35'),(89,20,'3.10','Q2','2019/2020',0,'0','2019-12-31 12:12:37','2020-01-10 05:27:35'),(90,21,'16.9','Q2','2019/2020',0,'0','2019-12-31 12:12:37','2020-01-10 05:27:35'),(91,22,'99.79','Q2','2019/2020',0,'0','2019-12-31 12:12:38','2020-01-10 05:27:35'),(92,23,'12.03','Q2','2019/2020',0,'0','2019-12-31 12:12:38','2020-01-10 05:27:35'),(93,24,'35','Q2','2019/2020',0,'0','2019-12-31 12:12:38','2020-01-10 05:27:35'),(94,25,'1.8','Q2','2019/2020',0,'0','2019-12-31 12:12:38','2020-01-10 05:27:35'),(95,26,'97.2','Q2','2019/2020',0,'0','2019-12-31 12:12:38','2020-01-10 05:27:35'),(96,27,'98.9','Q2','2019/2020',1,'1','2019-12-31 12:12:38','2020-01-10 05:27:35'),(97,28,'72.43','Q2','2019/2020',1,'1','2019-12-31 12:12:38','2020-01-10 05:27:35'),(98,29,'98.81','Q2','2019/2020',0,'0','2019-12-31 12:12:38','2020-01-10 05:27:35'),(99,30,'99.30','Q2','2019/2020',0,'0','2019-12-31 12:13:16','2020-01-10 05:29:39'),(100,31,'1.10','Q2','2019/2020',0,'0','2019-12-31 12:13:16','2020-01-10 05:29:39'),(101,32,'0.8','Q2','2019/2020',0,'0','2019-12-31 12:13:16','2020-01-10 05:29:39'),(102,33,'1.10','Q2','2019/2020',0,'0','2019-12-31 12:13:16','2020-01-10 05:29:39'),(103,34,'0.10','Q2','2019/2020',0,'0','2019-12-31 12:13:16','2020-01-10 05:29:39'),(104,35,'87.5','Q2','2019/2020',0,'0','2019-12-31 12:13:16','2020-01-10 05:29:39'),(105,36,'0.4','Q2','2019/2020',0,'0','2019-12-31 12:13:16','2020-01-10 05:29:39'),(106,37,'19','Q2','2019/2020',0,'0','2019-12-31 12:13:47','2020-01-10 05:30:29'),(107,38,'100','Q2','2019/2020',0,'0','2019-12-31 12:13:47','2020-01-10 05:30:29'),(108,39,'10','Q2','2019/2020',0,'0','2019-12-31 12:13:47','2020-01-10 05:30:29'),(109,40,'10','Q2','2019/2020',0,'0','2019-12-31 12:13:47','2019-12-31 12:13:47'),(110,41,'96.5','Q2','2019/2020',1,'1','2019-12-31 12:13:47','2020-01-10 05:30:29'),(111,42,'22.1','Q2','2019/2020',0,'0','2019-12-31 12:14:25','2020-01-10 05:32:21'),(112,43,'4.1','Q2','2019/2020',1,'1','2019-12-31 12:14:25','2020-01-10 05:32:21'),(113,44,'98.9','Q2','2019/2020',0,'0','2019-12-31 12:14:25','2020-01-10 05:32:21'),(114,45,'18.3','Q2','2019/2020',0,'0','2019-12-31 12:14:25','2020-01-10 05:32:21'),(115,46,'68.7','Q2','2019/2020',0,'0','2019-12-31 12:14:25','2020-01-10 05:32:21'),(116,47,'0','Q2','2019/2020',2,'2','2019-12-31 12:14:25','2020-01-10 05:32:21'),(117,48,'100','Q2','2019/2020',0,'0','2019-12-31 12:14:44','2020-01-10 05:33:27'),(118,49,'4.22','Q2','2019/2020',1,'1','2019-12-31 12:14:44','2020-01-10 05:33:27'),(119,50,'0','Q2','2019/2020',2,'2','2019-12-31 12:14:44','2020-01-10 05:33:27'),(120,51,'0','Q2','2019/2020',0,'0','2019-12-31 12:14:44','2020-01-10 05:33:27'),(121,52,'0','Q2','2019/2020',0,'0','2019-12-31 12:14:44','2020-01-10 05:33:27'),(122,53,'27.9','Q2','2019/2020',0,'0','2019-12-31 12:15:00','2020-01-10 05:33:58'),(123,54,'4.7','Q2','2019/2020',0,'0','2019-12-31 12:15:00','2020-01-10 05:33:58'),(124,55,'60.67','Q2','2019/2020',0,'0','2019-12-31 12:15:45','2020-01-10 05:35:13'),(125,56,'50.50','Q2','2019/2020',0,'0','2019-12-31 12:15:45','2020-01-10 05:35:13'),(126,57,'58','Q2','2019/2020',0,'0','2019-12-31 12:15:45','2020-01-10 05:35:13'),(127,58,'61.83','Q2','2019/2020',0,'0','2019-12-31 12:15:45','2020-01-10 05:35:13'),(128,59,'27.0','Q2','2019/2020',0,'0','2019-12-31 12:15:45','2020-01-10 05:35:13'),(129,60,'60.67','Q2','2019/2020',0,'0','2019-12-31 12:16:02','2020-01-10 05:35:50'),(130,61,'62.33','Q2','2019/2020',0,'0','2019-12-31 12:16:02','2020-01-10 05:35:50'),(131,62,'34.63','Q2','2019/2020',0,'0','2019-12-31 12:16:02','2020-01-10 05:35:50'),(132,63,'41.50','Q2','2019/2020',0,'0','2019-12-31 12:16:09','2020-01-10 05:36:15'),(133,64,'33.83','Q2','2019/2020',0,'0','2019-12-31 12:16:09','2020-01-10 05:36:15'),(134,65,'35','Q2','2019/2020',0,'0','2019-12-31 12:16:35','2020-01-10 05:36:43'),(135,66,'96','Q2','2019/2020',0,'0','2019-12-31 12:16:35','2020-01-10 05:36:43'),(136,67,'00','Q2','2019/2020',0,'0','2019-12-31 12:16:35','2020-01-10 05:36:43'),(137,90,'0','Q2','2019/2020',0,'0','2019-12-31 13:25:18','2020-01-11 22:18:23'),(138,91,'1.10','Q2','2019/2020',1,'1','2020-01-01 02:01:12','2020-01-11 22:19:08'),(139,92,'59','Q2','2019/2020',1,'1','2020-01-01 02:01:14','2020-01-11 22:19:10'),(140,93,'90','Q2','2019/2020',2,'2','2020-01-01 02:02:13','2020-01-11 22:20:25'),(141,94,'85','Q2','2019/2020',1,'1','2020-01-01 02:02:13','2020-01-11 22:20:25'),(142,95,'25','Q2','2019/2020',1,'1','2020-01-01 02:02:13','2020-01-11 22:20:25'),(143,96,'100','Q2','2019/2020',0,'0','2020-01-01 02:02:13','2020-01-11 22:20:25'),(144,97,'50','Q2','2019/2020',1,'1','2020-01-01 02:02:13','2020-01-11 22:20:25'),(145,98,'2','Q2','2019/2020',0,'0','2020-01-01 02:02:35','2020-01-11 22:21:23'),(146,99,'3','Q2','2019/2020',1,'1','2020-01-01 02:02:35','2020-01-11 22:21:23'),(147,100,'1','Q2','2019/2020',1,'1','2020-01-01 02:02:35','2020-01-11 22:21:23'),(148,101,'85','Q2','2019/2020',1,'1','2020-01-01 02:02:35','2020-01-11 22:21:23'),(149,102,'1','Q2','2019/2020',0,'0','2020-01-01 02:02:35','2020-01-11 22:21:23'),(150,103,'33','Q2','2019/2020',1,'1','2020-01-01 02:02:40','2020-01-11 22:21:46'),(151,104,'100','Q2','2019/2020',2,'2','2020-01-01 02:02:47','2020-01-11 22:21:49'),(152,105,'100','Q2','2019/2020',2,'2','2020-01-01 02:02:47','2020-01-11 22:21:49'),(153,106,'70','Q2','2019/2020',1,'1','2020-01-01 02:03:14','2020-01-11 22:22:35'),(154,107,'90','Q2','2019/2020',1,'1','2020-01-01 02:03:14','2020-01-11 22:22:35'),(155,108,'17','Q2','2019/2020',1,'1','2020-01-01 02:03:14','2020-01-11 22:22:35'),(156,109,'100','Q2','2019/2020',0,'0','2020-01-01 02:03:26','2020-01-11 22:22:47'),(157,110,'100','Q2','2019/2020',0,'0','2020-01-01 02:03:26','2020-01-11 22:22:47'),(158,88,'4','Q1','2019/2020',1,'1','2020-01-01 02:06:53','2020-01-01 02:06:53'),(159,89,'0','Q1','2019/2020',1,'1','2020-01-01 02:06:55','2020-01-01 02:06:55'),(160,90,'0','Q1','2019/2020',0,'0','2020-01-01 02:06:55','2020-01-01 02:06:55'),(161,91,'1','Q1','2019/2020',0,'0','2020-01-01 02:07:01','2020-01-01 02:07:01'),(162,92,'42','Q1','2019/2020',1,'1','2020-01-01 02:07:14','2020-01-01 02:07:14'),(163,93,'95','Q1','2019/2020',0,'0','2020-01-01 02:07:48','2020-01-01 02:07:48'),(164,94,'99','Q1','2019/2020',1,'1','2020-01-01 02:07:48','2020-01-01 02:07:48'),(165,95,'99','Q1','2019/2020',1,'1','2020-01-01 02:07:48','2020-01-01 02:07:48'),(166,96,'100','Q1','2019/2020',0,'0','2020-01-01 02:07:48','2020-01-01 02:07:48'),(167,97,'100','Q1','2019/2020',0,'0','2020-01-01 02:07:48','2020-01-01 02:07:48'),(168,98,'3','Q1','2019/2020',0,'0','2020-01-01 02:08:15','2020-01-01 02:08:15'),(169,99,'8','Q1','2019/2020',1,'1','2020-01-01 02:08:15','2020-01-01 02:08:15'),(170,100,'2','Q1','2019/2020',0,'0','2020-01-01 02:08:15','2020-01-01 02:08:15'),(171,101,'100','Q1','2019/2020',0,'0','2020-01-01 02:08:15','2020-01-01 02:08:15'),(172,102,'2','Q1','2019/2020',0,'0','2020-01-01 02:08:15','2020-01-01 02:08:15'),(173,103,'56','Q1','2019/2020',1,'1','2020-01-01 02:08:27','2020-01-01 02:08:27'),(174,104,'96','Q1','2019/2020',1,'1','2020-01-01 02:08:52','2020-01-01 02:08:52'),(175,105,'99','Q1','2019/2020',1,'1','2020-01-01 02:08:52','2020-01-01 02:08:52'),(176,106,'89','Q1','2019/2020',1,'1','2020-01-01 02:09:12','2020-01-01 02:09:12'),(177,107,'100','Q1','2019/2020',0,'0','2020-01-01 02:09:12','2020-01-01 02:09:12'),(178,108,'90','Q1','2019/2020',0,'0','2020-01-01 02:09:12','2020-01-01 02:09:12'),(179,109,'90','Q1','2019/2020',0,'0','2020-01-01 02:09:20','2020-01-01 02:09:20'),(180,110,'90','Q1','2019/2020',0,'0','2020-01-01 02:09:20','2020-01-01 02:09:20'),(181,68,'2','Q2','2019/2020',2,'2','2020-01-10 04:41:20','2020-01-10 04:46:07'),(182,69,'0','Q2','2019/2020',2,'2','2020-01-10 04:41:20','2020-01-10 04:46:07'),(183,70,'0','Q2','2019/2020',2,'2','2020-01-10 04:41:20','2020-01-10 04:46:07'),(184,71,'0','Q2','2019/2020',2,'2','2020-01-10 04:41:20','2020-01-10 04:46:07'),(185,72,'0','Q2','2019/2020',2,'2','2020-01-10 04:41:36','2020-01-10 04:46:09'),(186,257,'70','Q2','2019/2020',1,'1','2020-01-10 04:52:08','2020-01-10 04:52:08'),(187,256,'75','Q2','2019/2020',1,'1','2020-01-10 04:52:09','2020-01-10 04:52:09'),(188,75,'24','Q2','2019/2020',0,'0','2020-01-10 04:54:37','2020-01-10 04:54:37'),(189,76,'63','Q2','2019/2020',1,'1','2020-01-10 04:54:48','2020-01-10 04:54:48'),(190,77,'100','Q2','2019/2020',0,'0','2020-01-10 04:57:03','2020-01-10 04:57:03'),(191,78,'96','Q2','2019/2020',0,'0','2020-01-10 04:57:03','2020-01-10 04:57:03'),(192,79,'96','Q2','2019/2020',0,'0','2020-01-10 04:57:03','2020-01-10 04:57:03'),(193,80,'94','Q2','2019/2020',0,'0','2020-01-10 04:57:03','2020-01-10 04:57:03'),(194,81,'84','Q2','2019/2020',1,'1','2020-01-10 04:57:03','2020-01-10 04:57:03'),(195,82,'96','Q2','2019/2020',0,'0','2020-01-10 04:57:03','2020-01-10 04:57:03'),(196,83,'77','Q2','2019/2020',1,'1','2020-01-10 04:57:03','2020-01-10 04:57:03'),(197,84,'78','Q2','2019/2020',0,'0','2020-01-10 04:57:03','2020-01-10 04:57:03'),(198,85,'110124','Q2','2019/2020',1,'1','2020-01-10 04:57:03','2020-01-10 04:57:03'),(199,86,'1001175','Q2','2019/2020',0,'0','2020-01-10 04:57:03','2020-01-10 04:57:03'),(200,87,'8','Q2','2019/2020',0,'0','2020-01-10 04:57:03','2020-01-10 04:57:03'),(201,229,'0','Q2','2019/2020',2,'2','2020-01-10 05:39:19','2020-01-11 21:33:48'),(202,230,'0','Q2','2019/2020',2,'2','2020-01-10 05:39:19','2020-01-11 21:33:48'),(203,231,'1','Q2','2019/2020',2,'2','2020-01-10 05:39:19','2020-01-15 21:11:30'),(204,232,'0','Q2','2019/2020',2,'2','2020-01-10 05:39:19','2020-01-11 21:34:50'),(205,236,'2','Q2','2019/2020',2,'2','2020-01-10 05:39:24','2020-01-15 21:11:32'),(206,235,'0','Q2','2019/2020',2,'2','2020-01-10 05:39:24','2020-01-15 21:11:32'),(207,248,'0','Q2','2019/2020',2,'2','2020-01-10 05:40:17','2020-01-15 00:43:45'),(208,246,'0','Q2','2019/2020',2,'2','2020-01-10 05:40:17','2020-01-15 00:43:45'),(209,247,'0','Q2','2019/2020',2,'2','2020-01-10 05:40:17','2020-01-15 00:43:45'),(210,245,'2','Q2','2019/2020',2,'2','2020-01-10 05:40:17','2020-01-15 00:43:45'),(211,244,'0','Q2','2019/2020',2,'2','2020-01-10 05:40:17','2020-01-15 00:43:45'),(212,253,'0','Q2','2019/2020',2,'2','2020-01-10 05:40:26','2020-01-15 21:10:28'),(213,251,'0','Q2','2019/2020',2,'2','2020-01-10 05:40:26','2020-01-15 21:10:28'),(214,250,'0','Q2','2019/2020',2,'2','2020-01-10 05:40:26','2020-01-15 21:10:28'),(215,254,'0','Q2','2019/2020',2,'2','2020-01-10 05:40:26','2020-01-15 21:10:28'),(216,252,'0','Q2','2019/2020',2,'2','2020-01-10 05:40:26','2020-01-15 21:10:28'),(217,241,'0','Q2','2019/2020',2,'2','2020-01-10 05:40:53','2020-01-11 21:30:07'),(218,240,'1.5','Q2','2019/2020',2,'2','2020-01-10 05:40:53','2020-01-15 21:10:33'),(219,243,'0','Q2','2019/2020',2,'2','2020-01-10 05:41:03','2020-01-15 21:10:34'),(220,239,'2','Q2','2019/2020',2,'2','2020-01-10 05:42:22','2020-01-15 21:11:19'),(221,237,'1','Q2','2019/2020',2,'2','2020-01-10 05:42:22','2020-01-15 21:11:19'),(222,238,'100','Q2','2019/2020',2,'2','2020-01-10 05:42:22','2020-01-15 21:11:19'),(223,116,'42976.5','Q2','2019/2020',0,'0','2020-01-10 05:54:19','2020-01-10 05:54:19'),(224,117,'2279893','Q2','2019/2020',1,'1','2020-01-10 05:54:19','2020-01-10 05:54:19'),(225,118,'18689','Q2','2019/2020',0,'0','2020-01-10 05:54:19','2020-01-10 05:54:19'),(226,119,'23542.5','Q2','2019/2020',0,'0','2020-01-10 05:54:19','2020-01-10 05:54:19'),(227,120,'49.5','Q2','2019/2020',0,'0','2020-01-10 05:54:19','2020-01-10 05:54:19'),(228,121,'1','Q2','2019/2020',0,'0','2020-01-10 05:54:19','2020-01-10 05:54:19'),(229,122,'25','Q2','2019/2020',1,'1','2020-01-10 05:56:34','2020-01-10 05:56:34'),(230,123,'0','Q2','2019/2020',0,'0','2020-01-10 05:56:34','2020-01-10 05:56:34'),(231,124,'0','Q2','2019/2020',0,'0','2020-01-10 05:56:34','2020-01-10 05:56:34'),(232,125,'0','Q2','2019/2020',0,'0','2020-01-10 05:56:34','2020-01-10 05:56:34'),(233,126,'1','Q2','2019/2020',0,'0','2020-01-10 05:58:57','2020-01-10 05:58:57'),(234,127,'89','Q2','2019/2020',0,'0','2020-01-10 05:58:57','2020-01-10 05:58:57'),(235,128,'1','Q2','2019/2020',0,'0','2020-01-10 05:58:57','2020-01-10 05:58:57'),(236,265,'0','Q2','2019/2020',2,'2','2020-01-10 07:10:29','2020-01-11 22:11:26'),(237,262,'0','Q2','2019/2020',0,'0','2020-01-10 08:18:48','2020-01-10 08:18:48'),(238,261,'0','Q2','2019/2020',0,'0','2020-01-10 08:18:48','2020-01-10 08:18:48'),(239,263,'0','Q2','2019/2020',0,'0','2020-01-10 08:18:48','2020-01-10 08:18:48'),(240,260,'2','Q2','2019/2020',0,'0','2020-01-10 08:18:48','2020-01-10 08:18:48'),(241,278,'100','Q2','2019/2020',0,'0','2020-01-10 08:19:44','2020-01-12 13:26:33'),(242,279,'70','Q2','2019/2020',0,'0','2020-01-10 08:19:56','2020-01-10 08:19:56'),(243,266,'24','Q2','2019/2020',2,'2','2020-01-10 08:22:45','2020-01-11 22:08:08'),(244,267,'63','Q2','2019/2020',2,'2','2020-01-10 08:22:57','2020-01-11 22:08:07'),(245,280,'100','Q2','2019/2020',2,'2','2020-01-10 09:19:24','2020-01-10 09:19:24'),(246,277,'8','Q2','2019/2020',0,'0','2020-01-10 09:19:24','2020-01-10 09:19:24'),(247,276,'1001175','Q2','2019/2020',0,'0','2020-01-10 09:19:24','2020-01-10 09:19:24'),(248,275,'110124','Q2','2019/2020',1,'1','2020-01-10 09:19:24','2020-01-10 09:19:24'),(249,274,'78','Q2','2019/2020',0,'0','2020-01-10 09:19:24','2020-01-10 09:19:24'),(250,273,'77','Q2','2019/2020',1,'1','2020-01-10 09:19:24','2020-01-10 09:19:24'),(251,272,'96','Q2','2019/2020',0,'0','2020-01-10 09:19:24','2020-01-10 09:19:24'),(252,271,'84','Q2','2019/2020',1,'1','2020-01-10 09:19:24','2020-01-10 09:19:24'),(253,270,'94','Q2','2019/2020',0,'0','2020-01-10 09:19:24','2020-01-10 09:19:24'),(254,268,'96','Q2','2019/2020',0,'0','2020-01-10 09:19:24','2020-01-10 09:19:24'),(255,269,'96','Q2','2019/2020',0,'0','2020-01-10 09:19:24','2020-01-10 09:19:24'),(256,281,'0','Q2','2019/2020',0,'0','2020-01-13 06:30:43','2020-01-13 06:30:43'),(257,287,'75','Q2','2019/2020',0,'0','2020-01-13 06:32:13','2020-01-13 06:32:13'),(258,288,'70','Q2','2019/2020',1,'1','2020-01-13 06:32:40','2020-01-13 06:32:40'),(259,282,'2','Q2','2019/2020',0,'0','2020-01-13 06:33:31','2020-01-13 06:33:31'),(260,283,'0','Q2','2019/2020',0,'0','2020-01-13 06:33:31','2020-01-13 06:33:31'),(261,284,'0','Q2','2019/2020',0,'0','2020-01-13 06:33:31','2020-01-13 06:33:31'),(262,285,'0','Q2','2019/2020',1,'1','2020-01-13 06:33:31','2020-01-13 06:33:31'),(263,286,'0','Q2','2019/2020',1,'1','2020-01-13 06:33:42','2020-01-13 06:33:42'),(264,289,'24','Q2','2019/2020',0,'0','2020-01-13 06:34:07','2020-01-13 06:34:07'),(265,293,'63','Q2','2019/2020',0,'0','2020-01-13 06:34:11','2020-01-13 06:34:11'),(266,304,'100','Q2','2019/2020',2,'2','2020-01-13 06:40:16','2020-01-13 06:40:16'),(267,303,'8','Q2','2019/2020',0,'0','2020-01-13 06:40:16','2020-01-13 06:40:16'),(268,302,'1001175','Q2','2019/2020',0,'0','2020-01-13 06:40:16','2020-01-13 06:40:16'),(269,301,'110124','Q2','2019/2020',1,'1','2020-01-13 06:40:16','2020-01-13 06:40:16'),(270,300,'78','Q2','2019/2020',0,'0','2020-01-13 06:40:16','2020-01-13 06:40:16'),(271,298,'96','Q2','2019/2020',0,'0','2020-01-13 06:40:16','2020-01-13 06:40:16'),(272,299,'77','Q2','2019/2020',1,'1','2020-01-13 06:40:16','2020-01-13 06:40:16'),(273,297,'84','Q2','2019/2020',1,'1','2020-01-13 06:40:16','2020-01-13 06:40:16'),(274,294,'96','Q2','2019/2020',0,'0','2020-01-13 06:40:16','2020-01-13 06:40:16'),(275,296,'96','Q2','2019/2020',0,'0','2020-01-13 06:40:16','2020-01-13 06:40:16'),(276,295,'94','Q2','2019/2020',0,'0','2020-01-13 06:40:16','2020-01-13 06:40:16');
/*!40000 ALTER TABLE `scoresrecorded` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `strategic_objective_scores`
--

DROP TABLE IF EXISTS `strategic_objective_scores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `strategic_objective_scores` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `strategicObjective_id` bigint(20) unsigned DEFAULT NULL,
  `perspective_id` bigint(20) unsigned DEFAULT NULL,
  `score` double NOT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quater` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `trategicobjectivescores_strategicobjective_id_foreign` (`strategicObjective_id`),
  KEY `trategicobjectivescores_perspective_id_foreign` (`perspective_id`)
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `strategic_objective_scores`
--

LOCK TABLES `strategic_objective_scores` WRITE;
/*!40000 ALTER TABLE `strategic_objective_scores` DISABLE KEYS */;
INSERT INTO `strategic_objective_scores` VALUES (1,'2019-12-31 08:04:28','2019-12-31 08:04:28',1,1,100,'2019/2020','Q2'),(2,'2019-12-31 08:05:46','2019-12-31 08:05:46',1,1,100,'2019/2020','Q1'),(3,'2019-12-31 10:27:49','2019-12-31 10:27:49',2,2,100,'2019/2020','Q1'),(4,'2019-12-31 10:28:15','2019-12-31 10:28:15',3,2,96.41285956006769,'2019/2020','Q1'),(5,'2019-12-31 10:29:01','2019-12-31 10:29:01',4,2,98.17031435112003,'2019/2020','Q1'),(6,'2019-12-31 10:29:24','2019-12-31 10:29:24',5,2,66.69694217378141,'2019/2020','Q1'),(7,'2019-12-31 10:31:11','2019-12-31 10:31:11',7,3,92.06349206349206,'2019/2020','Q1'),(8,'2019-12-31 10:31:55','2019-12-31 10:31:55',8,3,63.81818181818183,'2019/2020','Q1'),(9,'2019-12-31 10:32:23','2019-12-31 10:32:23',9,3,98.33333333333333,'2019/2020','Q1'),(10,'2019-12-31 10:32:57','2019-12-31 10:32:57',10,3,80,'2019/2020','Q1'),(11,'2019-12-31 10:33:05','2019-12-31 10:33:05',11,3,100,'2019/2020','Q1'),(12,'2019-12-31 10:33:44','2019-12-31 10:33:44',12,3,41.644461362771224,'2019/2020','Q1'),(13,'2019-12-31 10:33:55','2019-12-31 10:33:55',13,3,100,'2019/2020','Q1'),(14,'2019-12-31 10:34:12','2019-12-31 10:34:12',14,3,56.25,'2019/2020','Q1'),(15,'2019-12-31 10:34:35','2019-12-31 10:34:35',15,4,34.75177304964539,'2019/2020','Q1'),(16,'2019-12-31 10:36:18','2019-12-31 10:36:18',6,2,78.67090881454767,'2019/2020','Q1'),(17,'2019-12-31 10:37:33','2019-12-31 10:37:33',2,2,93.33333333333334,'2019/2020','Q2'),(18,'2019-12-31 10:37:48','2020-01-10 05:17:43',3,2,99.7715736040609,'2019/2020','Q2'),(19,'2019-12-31 10:38:21','2020-01-10 05:18:36',4,2,99.33837598503018,'2019/2020','Q2'),(20,'2019-12-31 10:38:43','2020-01-10 05:19:45',5,2,100,'2019/2020','Q2'),(21,'2019-12-31 12:12:38','2020-01-10 05:27:35',6,2,98.30422290128173,'2019/2020','Q2'),(22,'2019-12-31 12:13:16','2020-01-10 05:29:39',7,3,100,'2019/2020','Q2'),(23,'2019-12-31 12:13:47','2020-01-10 05:30:29',8,3,99.89690721649484,'2019/2020','Q2'),(24,'2019-12-31 12:14:25','2020-01-10 05:32:21',9,3,90.16666666666667,'2019/2020','Q2'),(25,'2019-12-31 12:14:44','2020-01-10 05:33:27',10,3,95.260663507109,'2019/2020','Q2'),(26,'2019-12-31 12:15:00','2020-01-10 05:33:58',11,3,100,'2019/2020','Q2'),(27,'2019-12-31 12:15:45','2020-01-10 05:35:13',12,3,100,'2019/2020','Q2'),(28,'2019-12-31 12:16:02','2019-12-31 12:16:02',13,3,100,'2019/2020','Q2'),(29,'2019-12-31 12:16:09','2019-12-31 12:16:09',14,3,100,'2019/2020','Q2'),(30,'2019-12-31 12:16:35','2020-01-10 05:36:43',15,4,100,'2019/2020','Q2'),(31,'2019-12-31 13:25:18','2020-01-11 22:14:46',26,9,50,'2019/2020','Q2'),(32,'2019-12-31 13:25:19','2020-01-11 22:17:50',25,9,66,'2019/2020','Q2'),(33,'2020-01-01 02:01:12','2020-01-11 22:19:08',27,10,89.99999999999999,'2019/2020','Q2'),(34,'2020-01-01 02:01:14','2020-01-11 22:19:10',28,10,63.888888888888886,'2019/2020','Q2'),(35,'2020-01-01 02:02:13','2020-01-11 22:20:25',29,11,70.94736842105263,'2019/2020','Q2'),(36,'2020-01-01 02:02:35','2020-01-11 22:21:23',30,11,73.66666666666666,'2019/2020','Q2'),(37,'2020-01-01 02:02:40','2020-01-11 22:21:46',31,11,33,'2019/2020','Q2'),(38,'2020-01-01 02:02:47','2020-01-01 02:02:47',32,11,100,'2019/2020','Q2'),(39,'2020-01-01 02:03:14','2020-01-11 22:22:35',33,12,62.22222222222222,'2019/2020','Q2'),(40,'2020-01-01 02:03:26','2020-01-01 02:03:26',34,12,100,'2019/2020','Q2'),(41,'2020-01-01 02:06:53','2020-01-01 02:06:53',25,9,66,'2019/2020','Q1'),(42,'2020-01-01 02:06:55','2020-01-01 02:06:55',26,9,50,'2019/2020','Q1'),(43,'2020-01-01 02:07:01','2020-01-01 02:07:01',27,10,100,'2019/2020','Q1'),(44,'2020-01-01 02:07:14','2020-01-01 02:07:14',28,10,16.66666666666667,'2019/2020','Q1'),(45,'2020-01-01 02:07:48','2020-01-01 02:07:48',29,11,99.6,'2019/2020','Q1'),(46,'2020-01-01 02:08:15','2020-01-01 02:08:15',30,11,97.77777777777779,'2019/2020','Q1'),(47,'2020-01-01 02:08:27','2020-01-01 02:08:27',31,11,56.00000000000001,'2019/2020','Q1'),(48,'2020-01-01 02:08:52','2020-01-01 02:08:52',32,11,97.5,'2019/2020','Q1'),(49,'2020-01-01 02:09:12','2020-01-01 02:09:12',33,12,99.62962962962963,'2019/2020','Q1'),(50,'2020-01-01 02:09:20','2020-01-01 02:09:20',34,12,100,'2019/2020','Q1'),(51,'2020-01-10 04:41:20','2020-01-10 04:41:20',16,5,62.5,'2019/2020','Q2'),(52,'2020-01-10 04:41:36','2020-01-10 04:41:36',17,5,0,'2019/2020','Q2'),(53,'2020-01-10 04:52:08','2020-01-10 04:52:08',42,8,77.77777777777779,'2019/2020','Q2'),(54,'2020-01-10 04:52:09','2020-01-10 04:52:09',43,8,93.75,'2019/2020','Q2'),(55,'2020-01-10 04:54:37','2020-01-10 04:54:37',20,6,100,'2019/2020','Q2'),(56,'2020-01-10 04:54:48','2020-01-10 04:54:48',21,6,3.1746031746031744,'2019/2020','Q2'),(57,'2020-01-10 04:57:03','2020-01-10 04:57:03',22,6,98.5647022009397,'2019/2020','Q2'),(58,'2020-01-10 05:39:19','2020-01-11 21:34:50',44,67,75,'2019/2020','Q2'),(59,'2020-01-10 05:39:24','2020-01-10 05:39:24',45,67,100,'2019/2020','Q2'),(60,'2020-01-10 05:40:17','2020-01-10 05:40:17',46,70,100,'2019/2020','Q2'),(61,'2020-01-10 05:40:26','2020-01-10 05:40:26',47,70,99.8,'2019/2020','Q2'),(62,'2020-01-10 05:40:53','2020-01-11 21:30:53',48,69,75,'2019/2020','Q2'),(63,'2020-01-10 05:41:03','2020-01-10 05:41:03',49,69,100,'2019/2020','Q2'),(64,'2020-01-10 05:42:22','2020-01-10 05:42:22',50,68,66.66666666666667,'2019/2020','Q2'),(65,'2020-01-10 05:54:19','2020-01-10 05:54:19',35,13,99.42280544120673,'2019/2020','Q2'),(66,'2020-01-10 05:56:34','2020-01-10 05:56:34',36,13,7.6923076923076925,'2019/2020','Q2'),(67,'2020-01-10 05:58:57','2020-01-10 05:58:57',37,13,100,'2019/2020','Q2'),(68,'2020-01-10 07:10:29','2020-01-11 22:11:26',56,125,0,'2019/2020','Q2'),(69,'2020-01-10 08:18:48','2020-01-10 08:18:48',55,125,100,'2019/2020','Q2'),(70,'2020-01-10 08:19:44','2020-01-12 13:26:33',60,127,100,'2019/2020','Q2'),(71,'2020-01-10 08:19:56','2020-01-10 08:19:56',61,127,100,'2019/2020','Q2'),(72,'2020-01-10 08:22:45','2020-01-11 22:04:55',57,126,100,'2019/2020','Q2'),(73,'2020-01-10 08:22:57','2020-01-11 22:08:07',58,126,100,'2019/2020','Q2'),(74,'2020-01-10 09:19:24','2020-01-10 09:19:24',59,126,98.5647022009397,'2019/2020','Q2'),(75,'2020-01-13 06:30:43','2020-01-13 06:30:43',62,134,100,'2019/2020','Q2'),(76,'2020-01-13 06:32:13','2020-01-13 06:32:13',65,136,100,'2019/2020','Q2'),(77,'2020-01-13 06:32:40','2020-01-13 06:32:40',66,136,77.77777777777779,'2019/2020','Q2'),(78,'2020-01-13 06:33:31','2020-01-13 06:33:31',63,137,25,'2019/2020','Q2'),(79,'2020-01-13 06:33:42','2020-01-13 06:33:42',64,137,0,'2019/2020','Q2'),(80,'2020-01-13 06:34:07','2020-01-13 06:34:07',67,135,100,'2019/2020','Q2'),(81,'2020-01-13 06:34:11','2020-01-13 06:34:11',68,135,100,'2019/2020','Q2'),(82,'2020-01-13 06:40:16','2020-01-13 06:40:16',69,135,98.57060981357691,'2019/2020','Q2');
/*!40000 ALTER TABLE `strategic_objective_scores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `strategic_objectives`
--

DROP TABLE IF EXISTS `strategic_objectives`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `strategic_objectives` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `perspective_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shortHand` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `strategic_objectives_perspective_id_foreign` (`perspective_id`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `strategic_objectives`
--

LOCK TABLES `strategic_objectives` WRITE;
/*!40000 ALTER TABLE `strategic_objectives` DISABLE KEYS */;
INSERT INTO `strategic_objectives` VALUES (1,'financial_namegement','Establish and maintain business relationships with customers, identify customer needs, and ensure the organization is able to meet these needs.',1,'2019-11-16 14:52:24','2019-11-16 14:52:24','financial_namegement'),(2,'business_relationship','Provide a framework for optimum financial decision making; design a method of operating the internal investment and financing of an organization.',2,'2019-11-16 14:52:24','2019-11-16 14:52:24','b/rshp'),(3,'service_desk','Support the agreed IT service provision by ensuring the accessibility and availability of the IT Organization and performing various support activities.',2,'2019-11-16 14:52:24','2019-11-16 14:52:24','srvc desk'),(4,'SLM_Voice_Service_SLA',' Add Description.',2,'2019-11-16 14:52:24','2019-11-16 14:52:24','slm voiveSLA'),(5,'SLM_Mobile_Money_SLA','Add Description.',2,'2019-11-16 14:52:24','2019-11-16 14:52:24','slm Mmoney sla'),(6,'SLM_Mobile_Data_SLA','Add Description.',2,'2019-11-16 14:52:24','2019-11-16 14:52:24','slm MData sla'),(7,'Change_Proces','Ensure that standardized methods and procedures are used for efficient and prompt handling of all changes to control IT infrastructure, in order to minimize the number and impact of any related incidents upon service',3,'2019-11-16 14:52:24','2019-11-16 14:52:24','change prcs'),(8,'Incident_Management','Restore a normal service operation as quickly as possible and to minimize the impact on business operations, thus ensuring that the best possible levels of service quality and availability are maintained',3,'2019-11-16 14:52:24','2019-11-16 14:52:24','incident mgt'),(9,'Problem_Management','To prevent problems and resulting incidents from happening, to eliminate recurring incidents, and to minimize the impact of incidents that cannot be prevented',3,'2019-11-16 14:52:24','2019-11-16 14:52:24','prblm mgt'),(10,'Release_Management','To plan, schedule and control the movement of releases from test to live environments. This ensures the integrity of the live environment is protected and the correct components are released.',3,'2019-11-16 14:52:24','2019-11-16 14:52:24','rls mnt'),(11,'Information_Security','Ensure the confidentiality, integrity, and availability of an organization information, data and IT services. ',3,'2019-11-16 14:52:24','2019-11-16 14:52:24','info sec'),(12,'Capacity_Management_CPU_Utilisation','Ensure the resources are right sized to meet current and future business requirements in a cost effective manner.',3,'2019-11-16 14:52:24','2019-11-16 14:52:24','cpu utilil'),(13,'Capacity_Management_Memory_Utilisation','Ensure the resources are right sized to meet current and future business requirements in a cost effective manner.',3,'2019-11-16 14:52:24','2019-11-16 14:52:24','memeory util'),(14,'Capacity_Management_License_Utilisation','Ensure the resources are right sized to meet current and future business requirements in a cost effective manner.',3,'2019-11-16 14:52:24','2019-11-16 14:52:24','licence util'),(15,'Business_Relationship,_training_and_awareness.','Foster Employee growth and empower employee development.',4,'2019-11-16 14:52:24','2019-11-16 14:52:24','Business_Relationship,_training_and_awareness'),(63,'Effective monitoring of QMS ISO9001:2015  program implementation',NULL,137,'2020-01-13 06:12:11','2020-01-13 06:12:11','monitoring of QMS'),(62,'Adherenace to applicable statutory regulatory requirements',NULL,134,'2020-01-13 06:11:31','2020-01-13 06:11:31','Adherenace to statutory regulations'),(69,'Customer Quality Management in terms of que Management, Repeat caller and  Call Centre accessibility',NULL,135,'2020-01-13 06:19:27','2020-01-13 06:19:27','Que Management'),(64,'Achieve effective Controls on the Key internal processes',NULL,137,'2020-01-13 06:12:22','2020-01-13 06:12:22','Controls on the Key internal processes'),(65,'Improve Employee Awareness On Qms And Compliance',NULL,136,'2020-01-13 06:15:44','2020-01-13 06:15:44',' Employee Awareness On Qms'),(66,'QMS competencies',NULL,136,'2020-01-13 06:16:00','2020-01-13 06:16:00','QMS competencies'),(67,'EBU NPS Details - To offer the highest possible standard of Products  to our customers',NULL,135,'2020-01-13 06:18:26','2020-01-13 06:18:26','EBU NPS '),(25,'Decrease_financial_and_Information_loss',NULL,9,'2019-11-16 14:52:24','2019-11-16 14:52:24','Fin loss'),(26,'Ensure_regulatory_and_contractual_IS_compliance',NULL,9,'2019-11-16 14:52:24','2019-11-16 14:52:24','contr compl'),(27,'Provide_secure_and_uninterrupted_services_to_customers',NULL,10,'2019-11-16 14:52:24','2019-11-16 14:52:24','sec& unint serv'),(28,'Protect_the_privacy_of_customer_information',NULL,10,'2019-11-16 14:52:24','2019-11-16 14:52:24','priv cust data'),(29,'Ensure_systems_and_infrastructure_security',NULL,11,'2019-11-16 14:52:24','2019-11-16 14:52:24','infra sec'),(30,'Manage_ISMS_efficiently',NULL,11,'2019-11-16 14:52:24','2019-11-16 14:52:24','isms mng'),(31,'Achieve_effective_system_monitoring_and_audit',NULL,11,'2019-11-16 14:52:24','2019-11-16 14:52:24','eff syst mon'),(32,'Achieve_effective_access_management',NULL,11,'2019-11-16 14:52:24','2019-11-16 14:52:24','access mgt'),(33,'Increase_employee_awareness_and_compliance',NULL,12,'2019-11-16 14:52:24','2019-11-16 14:52:24','emp awarenes'),(34,'Increase_technical_compitencies_of_the_Information_risk_team',NULL,12,'2019-11-16 14:52:24','2019-11-16 14:52:24','tecn comp of risk team'),(68,'Consumer NPS Details - To offer the highest possible standard of service to our customers',NULL,135,'2020-01-13 06:18:41','2020-01-13 06:18:41','Consumer NPS Details '),(35,'Sustainability',NULL,13,'2019-11-25 05:58:28','2019-11-25 05:58:28','Sustainability'),(36,'Regulatory/Customer',NULL,13,'2019-11-25 05:58:28','2019-11-25 05:58:28','Regulatory/Customer'),(37,'Organizational Capacity',NULL,13,'2019-11-25 05:58:28','2019-11-25 05:58:28','Organizational Capacity'),(44,'Regulatory and contractual compliance',NULL,67,'2019-12-08 19:42:41','2019-12-08 19:42:41','Regulatory and contractual compliance'),(45,'Reduce Financial Loss',NULL,67,'2019-12-08 19:42:59','2019-12-08 19:42:59','Reduce Financial Loss'),(46,'Ensure systems and infrastructure  redundancy',NULL,70,'2019-12-08 19:47:53','2019-12-18 00:22:03','Ensure systs and infra  redundancy '),(47,'\"Achieve effective BCM program management \"',NULL,70,'2019-12-08 19:48:09','2019-12-08 19:48:09','effective BCM management '),(48,'\"Increase employees Business Continuity awareness  and compliance \"',NULL,69,'2019-12-08 19:56:10','2019-12-08 19:56:10',' Emp BC awareness and compl'),(49,'Increase Business Continuity competencies of Technology Division',NULL,69,'2019-12-08 19:56:25','2019-12-08 19:56:25',' BC Competencies of tech div'),(50,'\"Provide uninterrupted services to our customers \"',NULL,68,'2019-12-08 19:58:40','2019-12-08 19:58:40','Provide uninterrupted services to our customers');
/*!40000 ALTER TABLE `strategic_objectives` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trategicobjectivescores`
--

DROP TABLE IF EXISTS `trategicobjectivescores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trategicobjectivescores` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `strategicObjective_id` bigint(20) unsigned DEFAULT NULL,
  `perspective_id` bigint(20) unsigned DEFAULT NULL,
  `score` double NOT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `trategicobjectivescores_strategicobjective_id_foreign` (`strategicObjective_id`),
  KEY `trategicobjectivescores_perspective_id_foreign` (`perspective_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trategicobjectivescores`
--

LOCK TABLES `trategicobjectivescores` WRITE;
/*!40000 ALTER TABLE `trategicobjectivescores` DISABLE KEYS */;
/*!40000 ALTER TABLE `trategicobjectivescores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usereditings`
--

DROP TABLE IF EXISTS `usereditings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usereditings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idUserEditing` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usereditings`
--

LOCK TABLES `usereditings` WRITE;
/*!40000 ALTER TABLE `usereditings` DISABLE KEYS */;
INSERT INTO `usereditings` VALUES (1,NULL,'2020-01-20 16:11:14',1,0);
/*!40000 ALTER TABLE `usereditings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Student','mail@gmail.com',NULL,'$2y$10$bzoM.BLCVpHBB2zsYChPVuZ2dZ2wj79NtYOmyfA.G5Fdn7pe.p3zq','XTHqLFl4Tb1Nc4TnEaYKf7jsCYoB2cS6YmvySmWHxITGJSlpqlatVb9cKwER','2019-11-16 08:36:47','2019-11-16 08:36:47'),(2,'George Kariuki Ngugi','list@gmail.com',NULL,'$2y$10$Jsh8bNHi7GKcaHmn3/0SRuWaZJsH0Vt5sOIieNv6MBqiBFAJIVJ.K','iXQnEvgsqTdX4zagx39ebaMtqgxLnSmxqd55Ls3Vf8HGDXscv5LPWDNkr87z','2019-11-16 08:37:38','2019-11-16 08:37:38'),(3,'itsms','itsms@mail.com',NULL,'$2y$10$kF72yoj4770nFxwrUbra/e0jovkIbpir6OmyrdAh9yohubXaug7Nu','WHrMHyYZEUvUamxjs6DC0gcFBLBHB7GZ02nWMZunTrG9XEScq3RBUxfJRyVF','2019-11-17 06:25:24','2019-11-17 06:25:24'),(4,'isms','isms@mail.com',NULL,'$2y$10$xEFlp4cicNlS173PhtQYPOnlhjkcruL30ldJvVNcVvbhvko2rJLrW',NULL,'2019-11-17 06:25:53','2019-11-17 06:25:53'),(5,'qms','qms@mail.com',NULL,'$2y$10$1ZBFHLHKXyK9j5yapi3x3ePkDfknV6VqVemGjKT1cOHTl1K6NfvZS',NULL,'2019-11-17 06:26:18','2019-11-17 06:26:18'),(6,'EMS','ems@mail.com',NULL,'$2y$10$9AMEqakGfjKrxsoedu0Otu/wfNq1UBe6vjbbtoYWj1tKQPPSs3mdK',NULL,'2019-11-25 06:20:39','2019-11-25 06:20:39'),(7,'Admin','admin@mail.com',NULL,'$2y$10$nIQPM0oGCZgWYc3irXIVsuO/ecUoRUW1aBSSP/sjki2i24pKyveg.',NULL,'2019-12-01 07:30:48','2019-12-01 07:30:48'),(8,'Business Contuinity Management System','bcms@mail.com',NULL,'$2y$10$OYQ10UWzJsk6vlomrcceXeFdVNO/hUzeuqoslToaIi9fvZULzYarO',NULL,'2019-12-08 20:14:17','2019-12-08 20:14:17'),(9,'Cooperate Social Responsibility.','csr3@mail.com',NULL,'$2y$10$uYqx2wdPdfhvYo/NIvAjfe2sFQ013bxNkjg.rEQ36su2xmKHHJiIK',NULL,'2019-12-08 20:37:40','2019-12-08 20:37:40'),(10,'Quality management — Customer satisfaction Management System.','qmcsms@mail.com',NULL,'$2y$10$Mpyki/1CbHxbSOc8wocFA.uabc2w9b1fCdnHE4LrbJhhUA9Xj1ClK',NULL,'2019-12-08 20:38:56','2019-12-08 20:38:56'),(11,'Anti Bribery Management System','abms@mail.com',NULL,'$2y$10$kCcPWFYi0yYVnH7qrN4ADuM8D2ZjjdamiHHg0dBPHsROeeu7Z/EJe',NULL,'2019-12-18 13:37:26','2019-12-18 13:37:26'),(12,'Smith','netsparker@example.com',NULL,'$2y$10$BdBIW5bYB5w5Zz.bOMp9G.6b23ogIRv/XXF0P9Y78SGH84vSXNfrW',NULL,'2020-01-13 12:04:15','2020-01-13 12:04:15'),(13,'Log Trial','logtrial@mail.com',NULL,'$2y$10$vFDIYP1KEIiyxaY/Y4EVpuxQ.Vt/9we.djUcPFR/F8D7xQ2gLdS.6',NULL,'2020-01-14 11:08:09','2020-01-14 11:08:09'),(14,'Trial 2 for logigng.','log@mail.com',NULL,'$2y$10$oGjnortTkI/GY7kCjQsuG.XY5vzZu7rNacc/zMlBJZMadwa71vyvC',NULL,'2020-01-14 11:12:42','2020-01-14 11:12:42'),(15,'Admin 2','admin2@mail.com',NULL,'$2y$10$Un6HyHPmHQkUUhIIXa3h5e0dRUBh9ZBvjEdxPqCaTN3sKpnwITRee',NULL,'2020-01-20 16:30:11','2020-01-20 16:30:11');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `year_actives`
--

DROP TABLE IF EXISTS `year_actives`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `year_actives` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `year_actives`
--

LOCK TABLES `year_actives` WRITE;
/*!40000 ALTER TABLE `year_actives` DISABLE KEYS */;
INSERT INTO `year_actives` VALUES (18,'2020-01-20 16:22:25','2020-01-20 16:22:41','2020/2021',0),(17,'2020-01-20 15:54:49','2020-01-20 16:22:41','2019/2020',1);
/*!40000 ALTER TABLE `year_actives` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'isotrackingproduction'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-01-21 16:24:29
