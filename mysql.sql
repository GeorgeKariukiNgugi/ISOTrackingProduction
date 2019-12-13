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
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assesor_per_programs`
--

LOCK TABLES `assesor_per_programs` WRITE;
/*!40000 ALTER TABLE `assesor_per_programs` DISABLE KEYS */;
INSERT INTO `assesor_per_programs` VALUES (1,NULL,NULL,'itsms@mail.com',1),(27,'2019-12-08 20:34:57','2019-12-08 20:35:48','bcms@mail.com',226),(3,NULL,NULL,'isms@mail.com',3),(4,NULL,NULL,'ems@mail.com',4),(5,NULL,NULL,'qms@mail.com',5),(6,NULL,NULL,'admin@mail.com',0),(23,'2019-12-05 04:07:21','2019-12-05 04:07:21','csr3@mail.com',223),(25,'2019-12-05 08:02:37','2019-12-05 08:02:37','qmcsms@mail.com',225);
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `closed_non_conformity_evidence`
--

LOCK TABLES `closed_non_conformity_evidence` WRITE;
/*!40000 ALTER TABLE `closed_non_conformity_evidence` DISABLE KEYS */;
INSERT INTO `closed_non_conformity_evidence` VALUES (1,'2019-11-29 11:15:47','2019-11-29 11:15:47','2019-11-18','Number Of Management Reviews Carried Out During The Year','MillieMonnaPat1575036946.docx',15),(2,'2019-12-01 06:39:05','2019-12-01 06:39:05','2019-12-02','Percentage Of Group 1(Criticality League) Systems Found Without Critical Vulnerabilties Which Can Lead To Direct Unauthorized Access','Chapter 2 Literature Review Guideline1575193145.docx',13),(3,'2019-12-04 04:39:43','2019-12-04 04:39:43','2019-12-03','closing NC.','N/A',19),(4,'2019-12-04 04:41:56','2019-12-04 04:41:56','2019-12-03','closing NC.','3mb1575445316.jpg',27),(5,'2019-12-10 08:55:07','2019-12-10 08:55:07','2019-12-11','hduihjjhdf','N/A',9),(6,'2019-12-10 08:56:37','2019-12-10 08:56:37','2019-12-10','Close The Non-Conformity: Release Resheduel Rate\r\nClose The Non-Conformity: Release Resheduel Rate\r\nClose The Non-Conformity: Release Resheduel Rate','apa1575978996.docx',8),(7,'2019-12-11 00:36:48','2019-12-11 00:36:48','2019-12-24','The company  procured a back up system.','apa1576035403.docx',72);
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
  PRIMARY KEY (`id`),
  KEY `key_perfomace_indicators_strategicobjective_id_foreign` (`strategic_objective_id`),
  KEY `key_perfomace_indicators_perspective_id_foreign` (`perspective_id`)
) ENGINE=MyISAM AUTO_INCREMENT=171 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `key_perfomace_indicators`
--

LOCK TABLES `key_perfomace_indicators` WRITE;
/*!40000 ALTER TABLE `key_perfomace_indicators` DISABLE KEYS */;
INSERT INTO `key_perfomace_indicators` VALUES (113,'Percentage Of Loaded Capex Loaded Below.',1,1,0,'2019-11-16 16:55:05','2019-12-07 04:27:56',100,4),(114,'percentage_met_of_commited_capex_below',1,1,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',100,4),(115,'percentage_of_reciept_capex_below',1,1,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',100,4),(4,'percentage_of_escaleted_complaints_above',2,2,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',20,4),(5,'percentage_of_returned_questionaires_above',2,2,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',75,4),(6,'service_desk_SLA_perfomance',3,2,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',98.5,4),(7,'service_desk_FCR',3,2,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',75,4),(8,'Average_Dropped_Call_Ratio_Below',4,2,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',0.3,4),(9,'Avearge_call_setup_success_above',4,2,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',99.4,4),(10,'Average_Cell_Availability_above',4,2,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',99.85,4),(11,'Speech_quality_MOS_Above',4,2,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',3.8,4),(12,'Call_Setup_time_M-M_below',4,2,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',4.5,4),(13,'M-Pesa_TPSs_Count_Below',5,2,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',1100,4),(14,'M-PESA_Availability_above_inPercentage',5,2,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',99,4),(15,'M-PESA_Response_time_above',5,2,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',5,4),(16,'3G_Download_speeds_kbps',6,2,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',5000,4),(17,'percentage_of_download_speeds_above_3Mbps',6,2,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',70,4),(18,'3G_upload_speeds_in_kbps',6,2,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',1700,4),(19,'3G_latency_ms',6,2,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',65,4),(20,'3G_mean_web_browsing_session_time',6,2,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',8,4),(21,'4G_download_speeds_in_Kbps',6,2,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',10,4),(22,'percentage_of_4G_download_connection_above_1mbps',6,2,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',92,4),(23,'4G_ipload_speeds_in_Kbps_above',6,2,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',7,4),(24,'4G_latency_in_ms_above',6,2,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',42,4),(25,'4G_mean_browsing_session_below',6,2,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',4.2,4),(26,'3G_youtube_reproductions_without_inerruption',6,2,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',97,4),(27,'4G_youtube_reproductions_without_inerruption',6,2,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',99,4),(28,'percentage_of_3G_download_connections_above_1Mbps',6,2,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',90,4),(29,'percentage_of_4G_download_connections_above_3Mbps',6,2,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',90,4),(30,'change_success_rate',7,3,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',93,4),(31,'change_related_incidents',7,3,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',1,4),(32,'change_roll_back',7,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',5,4),(33,'emmergency_changes',7,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',5,4),(34,'unauthorised_changes',7,3,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',0,4),(35,'closed_crqs',7,3,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',85,4),(36,'change_rescheduling',7,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',5,4),(37,'incidents_escalation_times(DIT)',8,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',20,4),(38,'incidents_report_comliance_within_24Hrs_of_service',8,3,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',100,4),(39,'incidence_escalation_DNOC',8,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',20,4),(40,'incidence_communication',8,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',15,4),(41,'incidence_notification',8,3,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',97,4),(42,'incidence_report_rate',9,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',35,4),(43,'problem_resolution_rate',9,3,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',10,4),(44,'problem_workaround_rate',9,3,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',95,4),(45,'average_problem_resolution_on_time_in_days',9,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',84,4),(46,'proactive_problem_ticket_rate',9,3,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',30,4),(47,'problem_reopen_rate',9,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',2,4),(48,'release_success_rate',10,3,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',90,4),(49,'release_resheduel_rate',10,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',1,4),(50,'release_incident_rate',10,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',1,4),(51,'known_release_errors_in_production',10,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',1,4),(52,'release_withdrawal_rate',10,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',1,4),(53,'time_to_detect_incidents',11,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',60,4),(54,'time_to_close_incidents',11,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',21,4),(55,'CPU_Utilisation_UGW',12,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',70,4),(56,'CPU_Utilisation_MSS',12,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',70,4),(57,'CPU_Utilisation_MGW',12,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',70,4),(58,'CPU_Utilisation_SGSN',12,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',70,4),(59,'CPU_Utilisation_MLG',12,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',50,4),(60,'Memory_Utilisation_UGW',13,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',70,4),(61,'Memory_Utilisation_SGSN',13,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',80,4),(62,'Memory_Utilisation_MIG',13,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',50,4),(63,'License_Utilisation_UGW',14,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',70,4),(64,'License_Utilisation_SGSN',14,3,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',70,4),(65,'No_Champions_trained',15,4,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',0,4),(66,'percentage_ITIL_foundation_comletion',15,4,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',90,4),(67,'Awareness_Attendance',15,4,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',90,4),(68,'Ensure_annual_review_of_the_Quality_management_system-_Management_Review',16,5,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',4,4),(69,'Ensure_there_are_no_repeat_non-conformities_identified_during_external_audit',16,5,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',0,4),(70,'Ensure_there_are_no_repeat_non-conformities_identified_during_internal_audit',16,5,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',0,4),(71,'Number_of_Internal_Audits_carried_out_annually',16,5,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',2,4),(72,'One_Risk_Assessment_unertaken_on_key_processes_across_the_business',17,5,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',1,4),(73,'Ensure_annual_QMS_Awareness',18,6,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',80,4),(74,'Increase_QMS_competencies_through_Training_and_awareness',19,6,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',90,4),(75,'EBU NPS Details Improve Net Promoter Score (NPS) In Relation To Customer Products And Services. Customer Satisfaction',20,7,0,'2019-11-16 16:55:05','2019-12-08 08:19:24',40,2),(76,'Customer_NPS_Details_Improve_Net_Promoter_Score_(NPS)_in_relation_to_Customer_Products_and_Services._Customer_Satisfaction',21,7,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',61,4),(77,'Ensure_Induction_for_all_New_Joiners_at_entry_point',22,7,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',100,4),(78,'Ensure_Customer_Quality_Management_in_terms_of_que_Management(HVC)_Hustler_section',22,7,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',85,4),(79,'Ensure_Customer_Quality_Management_in_terms_of_que_Management(HVC)_DP_section',22,7,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',85,4),(80,'Ensure_Customer_Quality_Management_in_terms_of_que_Management(HVC)_Post_Pay_section',22,7,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',85,4),(81,'Ensure_Customer_Quality_Management_in_terms_of_que_Management(HVC)_Enterprise_section',22,7,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',85,4),(82,'Ensure_Customer_Quality_Management_in_terms_of_que_Management_(YOUTH)',22,7,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',80,4),(83,'Ensure_Customer_Quality_Management_in_terms_of_que_Management_(MASS)',22,7,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',80,4),(84,'Ensure_Customer_Quality_Management_in_terms_of_Repeat_caller_FCR(First_Contact_Resolution)',22,7,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',75,4),(85,'Ensure_Customer_Quality_Management_in_terms_of__Offered_Calls',22,7,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',123543,4),(86,'Ensure_Customer_Quality_Management_in_terms_of_answered_Calls',22,7,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',117366,4),(87,'Ensure_Customer_Quality_Management_in_terms_of_abandoned_calls',22,7,0,'2019-11-16 16:55:05','2019-11-16 16:55:05',23,4),(88,'Cumulative_fraud_information_security_incidents_leading_to_financial_loss(_impact_of_4_to_5)',25,9,3,'2019-11-16 16:55:05','2019-11-16 16:55:05',3,4),(89,'Successful_ISO_27001_external_audit_(not_more_than_1_minor)_BSI',26,9,4,'2019-11-16 16:55:05','2019-11-16 16:55:05',1,4),(90,'Number_of_high_risk_issues_raised_by_External_audit_on_access_management',26,9,5,'2019-11-16 16:55:05','2019-11-16 16:55:05',0,4),(91,'Percentage_of_unauthorized_or_incorrect_changes_that_have_led_to_service_downtimes_services_of_customer_facing_services',27,10,6,'2019-11-16 16:55:05','2019-11-16 16:55:05',1,4),(92,'Number_of_incidents_related_to_breached_customer_information(_at_a_max_4_per_week)',28,10,7,'2019-11-16 16:55:05','2019-11-16 16:55:05',36,4),(93,'Percentage_of_active_antivirus_installed_on_desktops_and_laptops',29,11,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',95,4),(94,'Percentage_of_workstations_with_ISE_configuration(NAC)',29,11,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',100,4),(95,'Percentage_coverage_of_pentest_across_Cloud,_M-PESA,_Mobile_Data,_Customer_Support_and_Billing',29,11,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',100,4),(96,'Percentage_coverage_of_VA(PVMG)_across_Cloud,_M-PESA,_Mobile_Data,_Customer_Support_and_Billing',29,11,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',100,4),(97,'Percentage_of_group_1(Criticality_league)_systems_found_without_critical_vulnerabilties_which_can_lead_to_direct_unauthorized_access',29,11,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',100,4),(98,'Number_of_risk_assessment_cycles_carried_out_during_the_year',30,11,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',2,4),(99,'Number_of_scheduled_3rd_party_risk_assessments_conducted',30,11,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',9,4),(100,'Number_of_management_reviews_carried_out_during_the_year',30,11,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',2,4),(101,'Percentage_mandatory_ISMS_documents_reviewed',30,11,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',100,4),(102,'Number_of_internal_audits_carried_out_annually',30,11,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',1,4),(103,'Number_of_systems_in_logging_scope_whose_logs_are_collected_centrally_across_13_parameters',31,11,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',100,4),(104,'Percentage_of_monthly_user_access_reviews_completed_by_information_owners',32,11,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',100,4),(105,'Percentage_of_independent_user_access_reviews_per_schedule',32,11,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',100,4),(106,'Percentage_of_users_who_resisted_phishing_attempts',33,12,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',90,4),(107,'Percentage_of_all_new_staff_who_complete_the_induction',33,12,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',100,4),(108,'Percentage_of_all_members_of_staff_who_complete_the_quiz',33,12,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',90,4),(109,'Number_of_IRC_team_members_who_have_completed_the_ISO_27001_Lead_Implementer_course',34,12,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',80,4),(110,'Number_of_IRC_team_members_who_have_completed_the_Cyber_Risk_training',34,12,1,'2019-11-16 16:55:05','2019-11-16 16:55:05',80,4),(116,'Reduce electricity consumption of 141,499 MWh by 2 %. This considers increase in the number of sites',35,13,1,'2019-11-25 06:20:00','2019-11-25 06:20:00',34675,4),(117,'Reduce diesel consumption (gensets) of 9,639,517 L by 5 %  (This considers increase in the number of sites)',35,13,1,'2019-11-25 06:20:00','2019-11-25 06:20:00',2361682,4),(118,'Reduce carbon emission of 63,685 tCO2e by 4 %',35,13,1,'2019-11-25 06:20:00','2019-11-25 06:20:00',15285,4),(119,'Reduce water consumption of 91,449 m3 by 2 %',35,13,1,'2019-11-25 06:20:00','2019-11-25 06:20:00',22405,4),(120,'Reduce solid waste to dumpsites from the main corporate facilities by 90%',35,13,1,'2019-11-25 06:20:00','2019-11-25 06:20:00',23,4),(121,'Number of internal audits carried out for ISO14001 within the financial year ',35,13,1,'2019-11-25 06:20:00','2019-11-25 06:20:00',1,4),(122,'Conduct mandatory Regulatory Environmental audits for all BTS sites constructed ln the previous year, Retail centres, MSRs and main corporate offices - 325 sites.',36,13,1,'2019-11-25 06:20:00','2019-11-25 06:20:00',81.25,4),(123,'Noise Zero tolerance for non-Compliance on Enviromental standards',36,13,1,'2019-11-25 06:20:00','2019-11-25 06:20:00',0,4),(124,'EMF Zero tolerance for non-Compliance on Enviromental standards',36,13,1,'2019-11-25 06:20:00','2019-11-25 06:20:00',0,4),(125,'Air Quality Zero tolerance for non-Compliance on Enviromental standards',36,13,1,'2019-11-25 06:20:00','2019-11-25 06:20:00',0,4),(126,'Staff awareness campaigns carried out in the year (4)',37,13,1,'2019-11-25 06:20:00','2019-11-25 06:20:00',1,4),(127,'Increase volume of E-Waste collected from 223 tonnes by 20%',37,13,1,'2019-11-25 06:20:00','2019-11-25 06:20:00',67,4),(128,'Training sessions carried on to our staff on ISO14001',37,13,1,'2019-11-25 06:20:00','2019-11-25 06:20:00',67,4),(147,'We have a zero tolerance for regulatory breaches on BCMS -NRRD guideliness as defined by CA',44,67,0,'2019-12-08 19:44:27','2019-12-08 19:44:27',0,4),(131,'trail Objective',38,60,1,'2019-12-05 05:02:32','2019-12-05 05:02:32',52,4),(149,'We have zero tolerance for health and safety risk e.g. loss of life (while on duty/company premises)',44,67,0,'2019-12-08 19:45:11','2019-12-08 19:45:11',0,4),(135,'trial Adding',40,64,1,'2019-12-08 01:25:48','2019-12-08 01:25:48',45,2),(145,'first',43,8,1,'2019-12-08 08:09:33','2019-12-08 08:09:33',50,4),(146,'second',42,8,1,'2019-12-08 08:10:54','2019-12-08 08:10:54',50,2),(148,'We have a zero tolerance for contractual BCM breaches',44,67,0,'2019-12-08 19:44:51','2019-12-08 19:44:51',0,4),(150,'Incidents that required reporting to the regulator',44,67,0,'2019-12-08 19:45:23','2019-12-08 19:45:23',1,4),(156,'Percentage of disaster recovery tests passed',46,70,1,'2019-12-08 19:50:23','2019-12-08 19:50:23',90,1),(155,'Percentage of Disaster Recovery tests carried out for critical systems during the year',46,70,1,'2019-12-08 19:50:10','2019-12-08 19:50:10',90,1),(153,'Reduce the number of incidents meeting crisis thresholds per quarter',45,67,0,'2019-12-08 19:46:54','2019-12-08 19:46:54',4,4),(154,'Crisis activation leading to financial loss above 100-500M (serious Harm)',45,67,0,'2019-12-08 19:47:10','2019-12-08 19:47:10',0,4),(157,'Number of new strategic systems/Mission Critical implemented without adequate DR',46,70,0,'2019-12-08 19:50:53','2019-12-08 19:50:53',0,4),(158,'Number of site risk assessments carried out for key sites (HQ1&2, SCC, JCC, HQ3, Thika, QoA, Gospel, Kiboswa, Mombasa and Nakuru)',46,70,1,'2019-12-08 19:51:13','2019-12-08 19:51:13',3,1),(159,'Number of drills carried out per key facility (HQ1&2,SCC,JCC and HQ3)',46,70,1,'2019-12-08 19:51:47','2019-12-08 19:51:47',9,1),(160,'Number of Internal Audits carried out annually',47,70,1,'2019-12-08 19:52:54','2019-12-08 19:52:54',1,1),(161,'No of business continuity risks in the top 10 companywide risk register',47,70,1,'2019-12-08 19:54:09','2019-12-08 19:54:09',1,1),(162,'Percentage mandatory BCMS up to date',47,70,1,'2019-12-08 19:54:33','2019-12-08 19:54:33',95,1),(163,'Number of management reviews carried out',47,70,1,'2019-12-08 19:54:55','2019-12-08 19:54:55',2,1),(164,'Number of major non conformities identified during the internal audit',47,70,0,'2019-12-08 19:55:26','2019-12-08 19:55:26',1,1),(165,'Number of induction sessions held during the year for BCM induction training',48,69,1,'2019-12-08 19:57:13','2019-12-08 19:57:13',3,4),(166,'Number of employee awareness campaigns carried out during the year',48,69,1,'2019-12-08 19:57:41','2019-12-08 19:57:41',1,1),(167,'Percentage of Technology BC champions staff with BCM objectives defined',49,69,1,'2019-12-08 19:58:10','2019-12-08 19:58:10',90,1),(168,'Number of crisis incidents that exceed the defined Maximum Torelabe Recovery Time Objectives',50,68,0,'2019-12-08 19:59:13','2019-12-08 19:59:13',1,4),(169,'Percentage of crisis management activations sorted before disaster threshold',50,68,1,'2019-12-08 19:59:33','2019-12-08 19:59:33',90,1),(170,'Number of incidents where CMT is activated per quarter',50,68,0,'2019-12-08 20:00:53','2019-12-08 20:00:53',4,4);
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
  PRIMARY KEY (`id`),
  KEY `key_perfomance_indicator_scores_kpi_id_foreign` (`kpi_id`),
  KEY `key_perfomance_indicator_scores_strategicobjective_id_foreign` (`strategic_objective_id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `key_perfomance_indicator_scores`
--

LOCK TABLES `key_perfomance_indicator_scores` WRITE;
/*!40000 ALTER TABLE `key_perfomance_indicator_scores` DISABLE KEYS */;
INSERT INTO `key_perfomance_indicator_scores` VALUES (1,'2019/2020','37.5',146,42,'75','2019-12-08 09:10:48','2019-12-08 09:13:49'),(2,'2019/2020','0',147,44,'100','2019-12-08 20:42:28','2019-12-08 20:42:28'),(3,'2019/2020','0',149,44,'100','2019-12-08 20:42:28','2019-12-08 20:42:28'),(4,'2019/2020','0.5',148,44,'-100','2019-12-08 20:42:28','2019-12-09 02:26:52'),(5,'2019/2020','0.5',150,44,'100','2019-12-08 20:42:28','2019-12-09 02:26:52'),(6,'2019/2020','2.5',153,45,'100','2019-12-08 20:42:31','2019-12-09 02:27:04'),(7,'2019/2020','0',154,45,'100','2019-12-08 20:42:31','2019-12-08 20:42:31'),(8,'2019/2020','100',156,46,'100','2019-12-08 20:43:11','2019-12-08 20:43:11'),(9,'2019/2020','100',155,46,'100','2019-12-08 20:43:11','2019-12-08 20:43:11'),(10,'2019/2020','0',157,46,'100','2019-12-08 20:43:11','2019-12-08 20:43:11'),(11,'2019/2020','100',158,46,'100','2019-12-08 20:43:11','2019-12-08 20:43:11'),(12,'2019/2020','100',159,46,'100','2019-12-08 20:43:11','2019-12-08 20:43:11'),(13,'2019/2020','100',160,47,'100','2019-12-08 20:44:33','2019-12-08 20:44:33'),(14,'2019/2020','100',161,47,'100','2019-12-08 20:44:33','2019-12-08 20:44:33'),(15,'2019/2020','100',162,47,'100','2019-12-08 20:44:33','2019-12-08 20:44:33'),(16,'2019/2020','100',163,47,'100','2019-12-08 20:44:33','2019-12-08 20:44:33'),(17,'2019/2020','100',164,47,'99','2019-12-08 20:44:33','2019-12-08 20:44:33'),(18,'2019/2020','3',165,48,'100','2019-12-08 20:45:18','2019-12-08 20:45:18'),(19,'2019/2020','100',166,48,'100','2019-12-08 20:45:18','2019-12-08 20:45:18'),(20,'2019/2020','100',167,49,'100','2019-12-08 20:45:20','2019-12-08 20:45:20'),(21,'2019/2020','0',168,50,'100','2019-12-08 20:45:43','2019-12-08 20:45:43'),(22,'2019/2020','100',169,50,'100','2019-12-08 20:45:43','2019-12-08 20:45:43'),(23,'2019/2020','4',170,50,'100','2019-12-08 20:45:43','2019-12-08 20:45:43'),(24,'2019/2020','100',113,1,'100','2019-12-09 03:00:07','2019-12-09 03:00:07'),(25,'2019/2020','100',114,1,'100','2019-12-09 03:00:07','2019-12-09 03:00:07'),(26,'2019/2020','100',115,1,'100','2019-12-09 03:00:07','2019-12-09 03:00:07'),(27,'2019/2020','19',4,2,'95','2019-12-09 03:02:36','2019-12-09 03:02:36'),(28,'2019/2020','74',5,2,'98.66666666666667','2019-12-09 03:03:50','2019-12-11 00:07:20'),(29,'2019/2020','98.1',6,3,'99.59390862944161','2019-12-09 03:28:18','2019-12-11 00:21:43'),(30,'2019/2020','74.5',7,3,'99.33333333333333','2019-12-09 03:28:18','2019-12-11 00:21:43'),(31,'2019/2020','3.5',88,25,'66','2019-12-09 04:58:14','2019-12-09 23:29:19'),(32,'2019/2020','34798',116,35,'100','2019-12-09 05:06:12','2019-12-09 05:06:12'),(33,'2019/2020','2361682',117,35,'100','2019-12-09 05:06:12','2019-12-09 05:06:12'),(34,'2019/2020','15254',118,35,'99.79718678442919','2019-12-09 05:06:12','2019-12-09 05:06:12'),(35,'2019/2020','22404',119,35,'99.99553671055568','2019-12-09 05:06:12','2019-12-09 05:06:12'),(36,'2019/2020','23',120,35,'100','2019-12-09 05:06:12','2019-12-09 05:06:12'),(37,'2019/2020','3',89,26,'0','2019-12-09 23:18:57','2019-12-09 23:18:57'),(38,'2019/2020','0',90,26,'100','2019-12-09 23:18:57','2019-12-09 23:18:57'),(39,'2019/2020','1.1',91,27,'89.99999999999999','2019-12-09 23:20:21','2019-12-09 23:20:21'),(40,'2019/2020','59',92,28,'63.888888888888886','2019-12-09 23:20:22','2019-12-09 23:20:22'),(41,'2019/2020','2',98,30,'100','2019-12-09 23:23:16','2019-12-09 23:23:16'),(42,'2019/2020','3',99,30,'33.33333333333333','2019-12-09 23:23:16','2019-12-09 23:23:16'),(43,'2019/2020','1',100,30,'50','2019-12-09 23:23:16','2019-12-09 23:23:16'),(44,'2019/2020','88',101,30,'88','2019-12-09 23:23:16','2019-12-09 23:23:16'),(45,'2019/2020','1',102,30,'100','2019-12-09 23:23:16','2019-12-09 23:23:16'),(46,'2019/2020','90',93,29,'94.73684210526315','2019-12-09 23:23:18','2019-12-09 23:23:18'),(47,'2019/2020','85',94,29,'85','2019-12-09 23:23:18','2019-12-09 23:23:18'),(48,'2019/2020','25',95,29,'25','2019-12-09 23:23:18','2019-12-09 23:23:18'),(49,'2019/2020','100',96,29,'100','2019-12-09 23:23:18','2019-12-09 23:23:18'),(50,'2019/2020','50',97,29,'50','2019-12-09 23:23:18','2019-12-09 23:23:18'),(51,'2019/2020','33',103,31,'33','2019-12-09 23:23:55','2019-12-09 23:23:55'),(52,'2019/2020','100',104,32,'100','2019-12-09 23:24:01','2019-12-09 23:24:01'),(53,'2019/2020','100',105,32,'100','2019-12-09 23:24:01','2019-12-09 23:24:01'),(54,'2019/2020','100',109,34,'100','2019-12-09 23:25:07','2019-12-09 23:25:07'),(55,'2019/2020','100',110,34,'100','2019-12-09 23:25:07','2019-12-09 23:25:07'),(56,'2019/2020','70',106,33,'77.77777777777779','2019-12-09 23:26:29','2019-12-09 23:26:29'),(57,'2019/2020','90',107,33,'90','2019-12-09 23:26:29','2019-12-09 23:26:29'),(58,'2019/2020','17',108,33,'18.88888888888889','2019-12-09 23:26:29','2019-12-09 23:26:29'),(59,'2019/2020','1109',13,5,'0.8115419296663661','2019-12-10 10:46:39','2019-12-10 23:44:34'),(60,'2019/2020','98',14,5,'98.98989898989899','2019-12-10 10:50:33','2019-12-10 23:44:34'),(61,'2019/2020','4',15,5,'80','2019-12-10 10:54:21','2019-12-10 10:54:21');
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
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_11_16_114800_create_key_perfomance_indicator_scores_table',1),(4,'2019_11_16_114801_create_programs_table',1),(5,'2019_11_16_114802_create_perspectives_table',1),(6,'2019_11_16_114803_create_strategic_objectives_table',1),(7,'2019_11_16_114804_create_key_perfomace_indicators_table',1),(8,'2019_11_16_114805_create_non_conformities_table',1),(9,'2019_11_16_114806_create_scoresRecorded_table',1),(10,'2019_11_16_111119_entrust_setup_tables',2),(11,'2019_11_16_145309_create_authorisations_table',3),(12,'2019_11_17_025241_create-strateic_objective_scores-table',4),(13,'2019_11_17_091638_create_assesor_per_programs_table',5),(14,'2019_11_19_074519_create_year_actives_table',6),(15,'2019_11_19_074657_create_quater_actives_table',6),(16,'2019_11_23_165755_create_closed_non_conformity_evidence_table',7),(17,'2019_12_10_031159_create_reports_generateds_table',8);
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
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `non_conformities`
--

LOCK TABLES `non_conformities` WRITE;
/*!40000 ALTER TABLE `non_conformities` DISABLE KEYS */;
INSERT INTO `non_conformities` VALUES (29,'2019/2020','Q2','Kindly Fill The Following Fields to Complete Assesing :: Number_of_IRC_team_members_who_have_completed_the_ISO_27001_Lead_Implementer_course.','open','Kindly Fill The Following Fields to Complete Assesing :: Number_of_IRC_team_members_who_have_completed_the_ISO_27001_Lead_Implementer_course.','Kindly Fill The Following Fields to Complete Assesing :: Number_of_IRC_team_members_who_have_completed_the_ISO_27001_Lead_Implementer_course.','2019-12-02 21:00:00',109,34,12,3,'2019-12-04 00:23:51','2019-12-04 00:23:51'),(10,'2019/2020','Q2','Percentage_of_active_antivirus_installed_on_desktops_and_laptops.','open','Percentage_of_active_antivirus_installed_on_desktops_and_laptops.','Percentage_of_active_antivirus_installed_on_desktops_and_laptops.','2019-12-01 21:00:00',93,29,11,3,'2019-11-29 11:06:42','2019-12-04 00:09:55'),(11,'2019/2020','Q2','Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_workstations_with_ISE_configuration(NAC).','open','Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_workstations_with_ISE_configuration(NAC).','Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_workstations_with_ISE_configuration(NAC).','2019-12-08 21:00:00',94,29,11,3,'2019-11-29 11:07:39','2019-12-04 00:10:07'),(12,'2019/2020','Q2','Kindly Fill The Following Fields to Complete Assesing :: Percentage_coverage_of_pentest_across_Cloud,_M-PESA,_Mobile_Data,_Customer_Support_and_Billin','open','Kindly Fill The Following Fields to Complete Assesing :: Percentage_coverage_of_pentest_across_Cloud,_M-PESA,_Mobile_Data,_Customer_Support_and_Billin','Kindly Fill The Following Fields to Complete Assesing :: Percentage_coverage_of_pentest_across_Cloud,_M-PESA,_Mobile_Data,_Customer_Support_and_Billin','2019-12-07 21:00:00',95,29,11,3,'2019-11-29 11:07:57','2019-12-04 00:10:22'),(13,'2019/2020','Q2','ndly Fill The Following Fields to Complete Assesing :: Percentage_of_group_1(Criticality_league)_systems_found_without_critical_v','open','ndly Fill The Following Fields to Complete Assesing :: Percentage_of_group_1(Criticality_league)_systems_found_without_critical_v','ndly Fill The Following Fields to Complete Assesing :: Percentage_of_group_1(Criticality_league)_systems_found_without_critical_v','2019-12-01 21:00:00',97,29,11,3,'2019-11-29 11:08:21','2019-12-04 00:10:56'),(14,'2019/2020','Q2','Kindly Fill The Following Fields to Complete Assesing :: Number_of_scheduled_3rd_party_risk_assessments_conducted.','open','Kindly Fill The Following Fields to Complete Assesing :: Number_of_scheduled_3rd_party_risk_assessments_conducted.','Kindly Fill The Following Fields to Complete Assesing :: Number_of_scheduled_3rd_party_risk_assessments_conducted.','2019-12-01 21:00:00',99,30,11,3,'2019-11-29 11:09:07','2019-12-04 00:17:00'),(15,'2019/2020','Q2','Kindly Fill The Following Fields to Complete Assesing :: Number_of_management_reviews_carried_out_during_the_year.','open','Kindly Fill The Following Fields to Complete Assesing :: Number_of_management_reviews_carried_out_during_the_year.','Kindly Fill The Following Fields to Complete Assesing :: Number_of_management_reviews_carried_out_during_the_year.','2019-12-02 21:00:00',100,30,11,3,'2019-11-29 11:09:19','2019-12-04 00:17:29'),(16,'2019/2020','Q2','Kindly Fill The Following Fields to Complete Assesing :: Percentage_mandatory_ISMS_documents_reviewed','open','Kindly Fill The Following Fields to Complete Assesing :: Percentage_mandatory_ISMS_documents_reviewed','Kindly Fill The Following Fields to Complete Assesing :: Percentage_mandatory_ISMS_documents_reviewed','2019-12-02 21:00:00',101,30,11,3,'2019-11-29 11:09:32','2019-12-04 00:17:45'),(18,'2019/2020','Q2','Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_users_who_resisted_phishing_attempts','open','Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_users_who_resisted_phishing_attempts','Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_users_who_resisted_phishing_attempts','2019-12-01 21:00:00',106,33,12,3,'2019-11-29 11:10:43','2019-12-04 00:12:33'),(19,'2019/2020','Q2','Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_all_new_staff_who_complete_the_induction.','closed','Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_all_new_staff_who_complete_the_induction.','Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_all_new_staff_who_complete_the_induction.','2019-11-23 21:00:00',107,33,12,3,'2019-11-29 11:11:02','2019-12-04 04:39:43'),(20,'2019/2020','Q2','Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_all_members_of_staff_who_complete_the_quiz.','open','Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_all_members_of_staff_who_complete_the_quiz.','Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_all_members_of_staff_who_complete_the_quiz.','2019-12-02 21:00:00',108,33,12,3,'2019-11-29 11:11:19','2019-12-04 00:13:00'),(27,'2019/2020','Q1','Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_unauthorized_or_inc','open','Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_unauthorized_or_inc','Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_unauthorized_or_inc','2019-12-08 21:00:00',91,27,10,3,'2019-12-03 10:24:37','2019-12-09 23:20:00'),(26,'2019/2020','Q1','Cumulative_fraud_information_security_incidents_leading_to_financial_loss(_impact_of_4_to_5).','open','Cumulative_fraud_information_security_incidents_leading_to_financial_loss(_impact_of_4_to_5).','Cumulative_fraud_information_security_incidents_leading_to_financial_loss(_impact_of_4_to_5).','2019-12-08 21:00:00',88,25,9,3,'2019-12-03 10:24:00','2019-12-09 23:18:39'),(51,'2019/2020','Q1','Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_workstations_with_ISE_configuration(NAC).','open','Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_workstations_with_ISE_configuration(NAC).','Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_workstations_with_ISE_configuration(NAC).','2019-12-08 21:00:00',94,29,11,3,'2019-12-09 23:21:05','2019-12-09 23:21:05'),(50,'2019/2020','Q1','Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_active_antivirus_installed_on_desktops_and_laptops.','open','Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_active_antivirus_installed_on_desktops_and_laptops.','Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_active_antivirus_installed_on_desktops_and_laptops.','2019-12-08 21:00:00',93,29,11,3,'2019-12-09 23:20:51','2019-12-09 23:20:51'),(28,'2019/2020','Q1','Kindly Fill The Following Fields to Complete Assesing :: Number_of_incidents_related_to_breached_customer_information(_at_a_max_4_per_week).','open','Kindly Fill The Following Fields to Complete Assesing :: Number_of_incidents_related_to_breached_customer_information(_at_a_max_4_per_week).','Kindly Fill The Following Fields to Complete Assesing :: Number_of_incidents_related_to_breached_customer_information(_at_a_max_4_per_week).','2019-12-10 21:00:00',92,28,10,3,'2019-12-03 10:24:52','2019-12-09 23:20:18'),(30,'2019/2020','Q2','Kindly Fill The Following Fields to Complete Assesing :: Number_of_IRC_team_members_who_have_completed_the_Cyber_Risk_training.','open','Kindly Fill The Following Fields to Complete Assesing :: Number_of_IRC_team_members_who_have_completed_the_Cyber_Risk_training.','Kindly Fill The Following Fields to Complete Assesing :: Number_of_IRC_team_members_who_have_completed_the_Cyber_Risk_training.','2019-12-02 21:00:00',110,34,12,3,'2019-12-04 00:24:06','2019-12-04 00:24:06'),(54,'2019/2020','Q1','Kindly Fill The Following Fields to Complete Assesing :: Number_of_scheduled_3rd_party_risk_assessments_conducted.','open','Kindly Fill The Following Fields to Complete Assesing :: Number_of_scheduled_3rd_party_risk_assessments_conducted.','Kindly Fill The Following Fields to Complete Assesing :: Number_of_scheduled_3rd_party_risk_assessments_conducted.','2019-12-10 21:00:00',99,30,11,3,'2019-12-09 23:22:22','2019-12-09 23:22:22'),(53,'2019/2020','Q1','Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_group_1(Criticality_l','open','Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_group_1(Criticality_l','Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_group_1(Criticality_l','2019-12-08 21:00:00',97,29,11,3,'2019-12-09 23:22:04','2019-12-09 23:22:04'),(52,'2019/2020','Q1','Kindly Fill The Following Fields to Complete Assesing :: Percentage_coverage_of_pentest_across_Cloud,_M-PESA,_Mobile_Data,_Customer_Support_and_Billing','open','Kindly Fill The Following Fields to Complete Assesing :: Percentage_coverage_of_pentest_across_Cloud,_M-PESA,_Mobile_Data,_Customer_Support_and_Billing','Kindly Fill The Following Fields to Complete Assesing :: Percentage_coverage_of_pentest_across_Cloud,_M-PESA,_Mobile_Data,_Customer_Support_and_Billing','2019-12-10 21:00:00',95,29,11,3,'2019-12-09 23:21:22','2019-12-09 23:21:22'),(49,'2019/2020','Q2','more buildings were bought by safaricom','open','recommend better use of water resources by employees.','buy water measuring taps.','2019-12-09 21:00:00',119,35,13,4,'2019-12-09 05:05:48','2019-12-09 05:05:48'),(72,'2019/2020','Q1','The CRM system was down for the better part of the quarter.','closed','Have a back up system procured.','Talk To IT to bring it back up.','2019-12-24 21:00:00',7,3,2,1,'2019-12-11 00:21:32','2019-12-11 00:36:48'),(48,'2019/2020','Q2','More buildings and cars were bought by the organisation and thus increasing the carbon emission.','open','recommend cars with less emission to be bought.','Reduce carbon footprint','2019-12-09 21:00:00',118,35,13,4,'2019-12-09 05:04:18','2019-12-09 05:04:18'),(71,'2019/2020','Q1','The CRM systsem was down for the better part of the quater.','open','Have a backup system.','Talk to IT to bring it back up.','2019-12-24 21:00:00',6,3,2,1,'2019-12-11 00:20:01','2019-12-11 00:20:01'),(70,'2019/2020','Q1','The questionnaire were not issued the past quarter.','open','Implement quarterly collection of questionnaires.','Issue and collect the questionnaires for the last quarter.','2019-12-24 21:00:00',5,2,2,1,'2019-12-11 00:07:07','2019-12-11 00:07:07'),(44,'2019/2020','Q2','Kindly Fill The Following Fields to Complete Assesing :: We have a zero tolerance for contractual BCM breaches.','open','Kindly Fill The Following Fields to Complete Assesing :: We have a zero tolerance for contractual BCM breaches.','Kindly Fill The Following Fields to Complete Assesing :: We have a zero tolerance for contractual BCM breaches.','2019-12-09 21:00:00',148,44,67,226,'2019-12-09 02:26:42','2019-12-09 02:26:42'),(55,'2019/2020','Q1','Kindly Fill The Following Fields to Complete Assesing :: Number_of_management_reviews_carried_out_during_the_year.','open','Kindly Fill The Following Fields to Complete Assesing :: Number_of_management_reviews_carried_out_during_the_year.','Kindly Fill The Following Fields to Complete Assesing :: Number_of_management_reviews_carried_out_during_the_year.','2019-12-08 21:00:00',100,30,11,3,'2019-12-09 23:22:36','2019-12-09 23:22:36'),(56,'2019/2020','Q1','ollowing Fields to Complete Assesing :: Percentage_mandatory_ISMS_documents_reviewed.','open','ollowing Fields to Complete Assesing :: Percentage_mandatory_ISMS_documents_reviewed.','ollowing Fields to Complete Assesing :: Percentage_mandatory_ISMS_documents_reviewed.','2019-12-08 21:00:00',101,30,11,3,'2019-12-09 23:22:50','2019-12-09 23:22:50'),(57,'2019/2020','Q1','Kindly Fill The Following Fields to Complete Assesing :: Number_of_systems_in_logging_scope_whose_logs_are_collected_centrally_across_13_parameters.','open','Kindly Fill The Following Fields to Complete Assesing :: Number_of_systems_in_logging_scope_whose_logs_are_collected_centrally_across_13_parameters.','Kindly Fill The Following Fields to Complete Assesing :: Number_of_systems_in_logging_scope_whose_logs_are_collected_centrally_across_13_parameters.','2019-12-08 21:00:00',103,31,11,3,'2019-12-09 23:23:53','2019-12-09 23:23:53'),(58,'2019/2020','Q1','Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_users_who_resisted_phishing_attempts.','open','Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_users_who_resisted_phishing_attempts.','Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_users_who_resisted_phishing_attempts.','2019-12-10 21:00:00',106,33,12,3,'2019-12-09 23:24:23','2019-12-09 23:26:00'),(59,'2019/2020','Q1','Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_all_new_staff_who_complete_the_induction.','open','Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_all_new_staff_who_complete_the_induction.','Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_all_new_staff_who_complete_the_induction.','2019-12-08 21:00:00',107,33,12,3,'2019-12-09 23:24:38','2019-12-09 23:26:14'),(60,'2019/2020','Q1','Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_all_members_of_staff_who_complete_the_quiz.','open','Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_all_members_of_staff_who_complete_the_quiz.','Kindly Fill The Following Fields to Complete Assesing :: Percentage_of_all_members_of_staff_who_complete_the_quiz.','2019-12-08 21:00:00',108,33,12,3,'2019-12-09 23:24:51','2019-12-09 23:26:27'),(69,'2019/2020','Q1','The Escalation system was down for the better part of the quarter','open','Have a Backup system.','Talk  To IT to bring it UP soonest.','2019-12-24 21:00:00',4,2,2,1,'2019-12-11 00:05:27','2019-12-11 00:05:27');
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `perspectives_id_unique` (`id`),
  KEY `perspectives_program_id_foreign` (`program_id`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perspectives`
--

LOCK TABLES `perspectives` WRITE;
/*!40000 ALTER TABLE `perspectives` DISABLE KEYS */;
INSERT INTO `perspectives` VALUES (1,'itsms_financial_perspective',NULL,10,1,'2019-11-16 12:20:21','2019-11-16 12:20:21'),(2,'itsms_customer_perspective',NULL,35,1,'2019-11-16 12:20:21','2019-11-16 12:20:21'),(3,'itsms_internal_business_process_perspective',NULL,50,1,'2019-11-16 12:20:21','2019-11-16 12:20:21'),(4,'itsms_learning_and_growth',NULL,5,1,'2019-11-16 12:20:21','2019-11-16 12:20:21'),(5,'qms_financial_perspective',NULL,30,5,'2019-11-16 12:20:21','2019-11-16 12:20:21'),(6,'qms_customer_perspective',NULL,50,5,'2019-11-16 12:20:21','2019-11-16 12:20:21'),(7,'qms_internal_business_process_perspective',NULL,10,5,'2019-11-16 12:20:21','2019-11-16 12:20:21'),(8,'qms_learning_and_growth',NULL,10,5,'2019-11-16 12:20:21','2019-11-16 12:20:21'),(9,'isms_financial_perspective',NULL,20,3,'2019-11-16 12:20:21','2019-11-16 12:20:21'),(10,'isms_customer_perspective',NULL,25,3,'2019-11-16 12:20:21','2019-11-16 12:20:21'),(11,'isms_internal_business_process_perspective',NULL,35,3,'2019-11-16 12:20:21','2019-11-16 12:20:21'),(12,'isms_learning_and_growth',NULL,20,3,'2019-11-16 12:20:21','2019-11-16 12:20:21'),(13,'ems_Environmental Management System Perspective',NULL,100,4,'2019-11-25 05:46:52','2019-11-25 05:46:52'),(14,'ans_financial_perspective',NULL,50,184,'2019-12-03 03:19:43','2019-12-03 03:19:43'),(70,'BCMS_internal_business_process_perspective',NULL,30,226,'2019-12-08 19:41:48','2019-12-08 19:41:48'),(69,'BCMS_learning_and_growth_perspective',NULL,20,226,'2019-12-08 19:41:48','2019-12-08 19:41:48'),(68,'BCMS_customer_perspective',NULL,30,226,'2019-12-08 19:41:48','2019-12-08 19:41:48'),(67,'BCMS_financial_perspective',NULL,20,226,'2019-12-08 19:41:48','2019-12-08 19:41:48'),(66,'QMCSMS_Customer Complaints Closure',NULL,25,225,'2019-12-05 08:02:22','2019-12-05 08:02:22'),(65,'QMCSMS_Customer Complaints.',NULL,25,225,'2019-12-05 08:02:22','2019-12-05 08:02:22'),(64,'QMCSMS_Strategic Management',NULL,50,225,'2019-12-05 08:02:22','2019-12-05 08:02:22'),(60,'CSR_internal_business_process_perspective',NULL,25,223,'2019-12-05 04:07:14','2019-12-05 04:07:14'),(59,'CSR_learning_and_growth_perspective',NULL,25,223,'2019-12-05 04:07:14','2019-12-05 04:07:14'),(58,'CSR_customer_perspective',NULL,25,223,'2019-12-05 04:07:14','2019-12-05 04:07:14'),(57,'CSR_financial_perspective',NULL,25,223,'2019-12-05 04:07:14','2019-12-05 04:07:14');
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
) ENGINE=MyISAM AUTO_INCREMENT=227 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `programs`
--

LOCK TABLES `programs` WRITE;
/*!40000 ALTER TABLE `programs` DISABLE KEYS */;
INSERT INTO `programs` VALUES (1,'Information Technology Service Management System.','ITSMS','This is the program that is used to get the integrity of the information technology services.','2019-11-16 12:07:47','2019-12-05 02:38:16','images/itsms.jpg','IS0/20000/2014','#00C0EF'),(3,'Information Security Management System','ISMS',NULL,'2019-11-16 12:07:47','2019-11-16 12:07:47','images/isms.png','IS0/27001','#F39C12'),(4,'Environmental Manaement System','EMS',NULL,'2019-11-16 12:07:47','2019-11-16 12:07:47','images/ems.jpg','IS0/14000','#00A65A'),(5,'Quality Management System','QMS','qms description.','2019-11-16 12:07:47','2019-12-04 09:52:11','images/qms.png','IS0/9001','#0073B7'),(223,'Cooperate Social Responsibility.','CSR','Cooperate Social Responsibility.','2019-12-05 04:07:01','2019-12-05 04:07:01','N/A','ISO 26000','#ff8000'),(225,'Quality management — Customer satisfaction Management System.','QMCSMS','Quality management — Customer satisfaction Management System.','2019-12-05 08:01:00','2019-12-05 08:01:00','N/A','ISO/10002:2018','#804000'),(226,'Business Contuinity Management System','BCMS','Business Contuinity Management System','2019-12-08 19:40:40','2019-12-08 19:40:40','N/A','ISO/22301','#ff0080');
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
INSERT INTO `quater_actives` VALUES (1,NULL,'2019-12-09 06:14:21','Q1',1),(2,NULL,'2019-12-09 06:14:21','Q2',0),(3,NULL,'2019-12-08 19:22:27','Q3',0),(4,NULL,'2019-12-08 20:39:59','Q4',0);
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reports_generateds`
--

LOCK TABLES `reports_generateds` WRITE;
/*!40000 ALTER TABLE `reports_generateds` DISABLE KEYS */;
INSERT INTO `reports_generateds` VALUES (1,'2019-12-10 03:41:19','2019-12-10 03:48:14','Q1','2019/2020','reports/BCMS_report_2019-2020_Q1_1575960494.pdf',226),(2,'2019-12-10 05:00:34','2019-12-11 00:55:21','Q1','2019/2020','reports/ISMS_report_2019-2020_Q1_1576036521.pdf',3);
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
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scoresrecorded`
--

LOCK TABLES `scoresrecorded` WRITE;
/*!40000 ALTER TABLE `scoresrecorded` DISABLE KEYS */;
INSERT INTO `scoresrecorded` VALUES (1,146,'25','Q1','2019/2020',1,'1','2019-12-08 09:10:48','2019-12-08 09:10:48'),(2,146,'25','Q2','2019/2020',1,'1','2019-12-08 09:11:45','2019-12-08 09:11:45'),(3,146,'50','Q4','2019/2020',0,'0','2019-12-08 09:13:49','2019-12-08 09:13:49'),(4,147,'0','Q1','2019/2020',0,'0','2019-12-08 20:42:28','2019-12-08 20:42:28'),(5,149,'0','Q1','2019/2020',0,'0','2019-12-08 20:42:28','2019-12-08 20:42:28'),(6,148,'0','Q1','2019/2020',0,'0','2019-12-08 20:42:28','2019-12-08 20:42:28'),(7,150,'1','Q1','2019/2020',0,'0','2019-12-08 20:42:28','2019-12-08 20:42:28'),(8,153,'4','Q1','2019/2020',0,'0','2019-12-08 20:42:31','2019-12-08 20:42:31'),(9,154,'0','Q1','2019/2020',0,'0','2019-12-08 20:42:31','2019-12-08 20:42:31'),(10,156,'0','Q1','2019/2020',0,'0','2019-12-08 20:43:11','2019-12-08 20:43:11'),(11,155,'0','Q1','2019/2020',0,'0','2019-12-08 20:43:11','2019-12-08 20:43:11'),(12,157,'0','Q1','2019/2020',0,'0','2019-12-08 20:43:11','2019-12-08 20:43:11'),(13,158,'0','Q1','2019/2020',0,'0','2019-12-08 20:43:11','2019-12-08 20:43:11'),(14,159,'0','Q1','2019/2020',0,'0','2019-12-08 20:43:11','2019-12-08 20:43:11'),(15,160,'0','Q1','2019/2020',0,'0','2019-12-08 20:44:33','2019-12-08 20:44:33'),(16,161,'0','Q1','2019/2020',0,'0','2019-12-08 20:44:33','2019-12-08 20:44:33'),(17,162,'0','Q1','2019/2020',0,'0','2019-12-08 20:44:33','2019-12-08 20:44:33'),(18,163,'1','Q1','2019/2020',0,'0','2019-12-08 20:44:33','2019-12-08 20:44:33'),(19,164,'0','Q1','2019/2020',0,'0','2019-12-08 20:44:33','2019-12-08 20:44:33'),(20,165,'3','Q1','2019/2020',0,'0','2019-12-08 20:45:18','2019-12-08 20:45:18'),(21,166,'2','Q1','2019/2020',0,'0','2019-12-08 20:45:18','2019-12-08 20:45:18'),(22,167,'0','Q1','2019/2020',0,'0','2019-12-08 20:45:20','2019-12-08 20:45:20'),(23,168,'0','Q1','2019/2020',0,'0','2019-12-08 20:45:43','2019-12-08 20:45:43'),(24,169,'0','Q1','2019/2020',0,'0','2019-12-08 20:45:43','2019-12-08 20:45:43'),(25,170,'4','Q1','2019/2020',0,'0','2019-12-08 20:45:43','2019-12-08 20:45:43'),(26,147,'0','Q2','2019/2020',0,'0','2019-12-09 02:26:52','2019-12-09 02:26:52'),(27,149,'0','Q2','2019/2020',0,'0','2019-12-09 02:26:52','2019-12-09 02:26:52'),(28,148,'1','Q2','2019/2020',1,'1','2019-12-09 02:26:52','2019-12-09 02:26:52'),(29,150,'0','Q2','2019/2020',0,'0','2019-12-09 02:26:52','2019-12-09 02:26:52'),(30,153,'1','Q2','2019/2020',0,'0','2019-12-09 02:27:04','2019-12-09 02:27:04'),(31,154,'0','Q2','2019/2020',0,'0','2019-12-09 02:27:04','2019-12-09 02:27:04'),(32,113,'100','Q2','2019/2020',0,'0','2019-12-09 03:00:07','2019-12-09 03:00:07'),(33,114,'100','Q2','2019/2020',0,'0','2019-12-09 03:00:07','2019-12-09 03:00:07'),(34,115,'100','Q2','2019/2020',0,'0','2019-12-09 03:00:07','2019-12-09 03:00:07'),(35,4,'19','Q2','2019/2020',1,'1','2019-12-09 03:02:35','2019-12-09 03:02:35'),(36,5,'74','Q2','2019/2020',1,'1','2019-12-09 03:03:50','2019-12-09 03:27:31'),(37,6,'98.2','Q2','2019/2020',1,'1','2019-12-09 03:28:18','2019-12-09 03:28:18'),(38,7,'75','Q2','2019/2020',0,'0','2019-12-09 03:28:18','2019-12-09 03:28:18'),(39,88,'3','Q2','2019/2020',0,'0','2019-12-09 04:58:14','2019-12-09 04:58:14'),(40,116,'34798','Q2','2019/2020',0,'0','2019-12-09 05:06:12','2019-12-09 05:06:12'),(41,117,'2361682','Q2','2019/2020',0,'0','2019-12-09 05:06:12','2019-12-09 05:06:12'),(42,118,'15254','Q2','2019/2020',1,'1','2019-12-09 05:06:12','2019-12-09 05:06:12'),(43,119,'22404','Q2','2019/2020',1,'1','2019-12-09 05:06:12','2019-12-09 05:06:12'),(44,120,'23','Q2','2019/2020',0,'0','2019-12-09 05:06:12','2019-12-09 05:06:12'),(45,88,'4','Q1','2019/2020',1,'1','2019-12-09 23:18:47','2019-12-09 23:18:47'),(46,89,'3','Q1','2019/2020',0,'0','2019-12-09 23:18:57','2019-12-09 23:18:57'),(47,90,'0','Q1','2019/2020',0,'0','2019-12-09 23:18:57','2019-12-09 23:18:57'),(48,91,'1.10','Q1','2019/2020',1,'1','2019-12-09 23:20:21','2019-12-09 23:20:21'),(49,92,'59','Q1','2019/2020',1,'1','2019-12-09 23:20:22','2019-12-09 23:20:22'),(50,98,'2','Q1','2019/2020',0,'0','2019-12-09 23:23:16','2019-12-09 23:23:16'),(51,99,'3','Q1','2019/2020',1,'1','2019-12-09 23:23:16','2019-12-09 23:23:16'),(52,100,'1','Q1','2019/2020',1,'1','2019-12-09 23:23:16','2019-12-09 23:23:16'),(53,101,'88','Q1','2019/2020',1,'1','2019-12-09 23:23:16','2019-12-09 23:23:16'),(54,102,'1','Q1','2019/2020',0,'0','2019-12-09 23:23:16','2019-12-09 23:23:16'),(55,93,'90','Q1','2019/2020',1,'1','2019-12-09 23:23:18','2019-12-09 23:23:18'),(56,94,'85','Q1','2019/2020',1,'1','2019-12-09 23:23:18','2019-12-09 23:23:18'),(57,95,'25','Q1','2019/2020',1,'1','2019-12-09 23:23:18','2019-12-09 23:23:18'),(58,96,'100','Q1','2019/2020',0,'0','2019-12-09 23:23:18','2019-12-09 23:23:18'),(59,97,'50','Q1','2019/2020',1,'1','2019-12-09 23:23:18','2019-12-09 23:23:18'),(60,103,'33','Q1','2019/2020',1,'1','2019-12-09 23:23:55','2019-12-09 23:23:55'),(61,104,'100','Q1','2019/2020',0,'0','2019-12-09 23:24:01','2019-12-09 23:24:01'),(62,105,'100','Q1','2019/2020',0,'0','2019-12-09 23:24:01','2019-12-09 23:24:01'),(63,109,'100','Q1','2019/2020',0,'0','2019-12-09 23:25:07','2019-12-09 23:25:07'),(64,110,'100','Q1','2019/2020',0,'0','2019-12-09 23:25:07','2019-12-09 23:25:07'),(65,106,'70','Q1','2019/2020',1,'1','2019-12-09 23:26:29','2019-12-09 23:26:29'),(66,107,'90','Q1','2019/2020',1,'1','2019-12-09 23:26:29','2019-12-09 23:26:29'),(67,108,'17','Q1','2019/2020',1,'1','2019-12-09 23:26:29','2019-12-09 23:26:29'),(90,7,'74','Q1','2019/2020',1,'1','2019-12-11 00:21:43','2019-12-11 00:21:43'),(89,6,'98','Q1','2019/2020',1,'1','2019-12-11 00:20:14','2019-12-11 00:20:14'),(84,113,'100','Q1','2019/2020',0,'0','2019-12-11 00:03:53','2019-12-11 00:03:53'),(85,114,'100','Q1','2019/2020',0,'0','2019-12-11 00:03:53','2019-12-11 00:03:53'),(86,115,'100','Q1','2019/2020',0,'0','2019-12-11 00:03:53','2019-12-11 00:03:53'),(87,4,'19','Q1','2019/2020',1,'1','2019-12-11 00:07:20','2019-12-11 00:07:20'),(88,5,'74','Q1','2019/2020',1,'1','2019-12-11 00:07:20','2019-12-11 00:07:20');
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
  PRIMARY KEY (`id`),
  KEY `trategicobjectivescores_strategicobjective_id_foreign` (`strategicObjective_id`),
  KEY `trategicobjectivescores_perspective_id_foreign` (`perspective_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `strategic_objective_scores`
--

LOCK TABLES `strategic_objective_scores` WRITE;
/*!40000 ALTER TABLE `strategic_objective_scores` DISABLE KEYS */;
INSERT INTO `strategic_objective_scores` VALUES (1,'2019-12-08 09:10:48','2019-12-08 09:13:49',42,8,75,'2019/2020'),(2,'2019-12-08 20:42:28','2019-12-09 02:26:52',44,67,50,'2019/2020'),(3,'2019-12-08 20:42:31','2019-12-08 20:42:31',45,67,100,'2019/2020'),(4,'2019-12-08 20:43:11','2019-12-08 20:43:11',46,70,100,'2019/2020'),(5,'2019-12-08 20:44:33','2019-12-08 20:44:33',47,70,99.8,'2019/2020'),(6,'2019-12-08 20:45:18','2019-12-08 20:45:18',48,69,100,'2019/2020'),(7,'2019-12-08 20:45:20','2019-12-08 20:45:20',49,69,100,'2019/2020'),(8,'2019-12-08 20:45:43','2019-12-08 20:45:43',50,68,100,'2019/2020'),(9,'2019-12-09 03:00:07','2019-12-09 03:00:07',1,1,100,'2019/2020'),(10,'2019-12-09 03:03:50','2019-12-09 03:27:31',2,2,96.83333333333334,'2019/2020'),(11,'2019-12-09 03:28:19','2019-12-11 00:21:43',3,2,99.46362098138746,'2019/2020'),(12,'2019-12-09 04:58:14','2019-12-09 23:29:19',25,9,66,'2019/2020'),(13,'2019-12-09 23:18:57','2019-12-09 23:18:57',26,9,50,'2019/2020'),(14,'2019-12-09 23:20:21','2019-12-09 23:20:21',27,10,89.99999999999999,'2019/2020'),(15,'2019-12-09 23:20:22','2019-12-09 23:20:22',28,10,63.888888888888886,'2019/2020'),(16,'2019-12-09 23:23:16','2019-12-09 23:23:16',30,11,74.26666666666667,'2019/2020'),(17,'2019-12-09 23:23:18','2019-12-09 23:23:18',29,11,70.94736842105263,'2019/2020'),(18,'2019-12-09 23:23:55','2019-12-09 23:23:55',31,11,33,'2019/2020'),(19,'2019-12-09 23:24:01','2019-12-09 23:24:01',32,11,100,'2019/2020'),(20,'2019-12-09 23:25:07','2019-12-09 23:25:07',34,12,100,'2019/2020'),(21,'2019-12-09 23:26:29','2019-12-09 23:26:29',33,12,62.22222222222222,'2019/2020'),(22,'2019-12-10 10:54:21','2019-12-10 10:54:21',5,2,59.93381363985512,'2019/2020');
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
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `strategic_objectives`
--

LOCK TABLES `strategic_objectives` WRITE;
/*!40000 ALTER TABLE `strategic_objectives` DISABLE KEYS */;
INSERT INTO `strategic_objectives` VALUES (1,'financial_namegement','Establish and maintain business relationships with customers, identify customer needs, and ensure the organization is able to meet these needs.',1,'2019-11-16 14:52:24','2019-11-16 14:52:24','financial_namegement'),(2,'business_relationship','Provide a framework for optimum financial decision making; design a method of operating the internal investment and financing of an organization.',2,'2019-11-16 14:52:24','2019-11-16 14:52:24','b/rshp'),(3,'service_desk','Support the agreed IT service provision by ensuring the accessibility and availability of the IT Organization and performing various support activities.',2,'2019-11-16 14:52:24','2019-11-16 14:52:24','srvc desk'),(4,'SLM_Voice_Service_SLA',' Add Description.',2,'2019-11-16 14:52:24','2019-11-16 14:52:24','slm voiveSLA'),(5,'SLM_Mobile_Money_SLA','Add Description.',2,'2019-11-16 14:52:24','2019-11-16 14:52:24','slm Mmoney sla'),(6,'SLM_Mobile_Data_SLA','Add Description.',2,'2019-11-16 14:52:24','2019-11-16 14:52:24','slm MData sla'),(7,'Change_Proces','Ensure that standardized methods and procedures are used for efficient and prompt handling of all changes to control IT infrastructure, in order to minimize the number and impact of any related incidents upon service',3,'2019-11-16 14:52:24','2019-11-16 14:52:24','change prcs'),(8,'Incident_Management','Restore a normal service operation as quickly as possible and to minimize the impact on business operations, thus ensuring that the best possible levels of service quality and availability are maintained',3,'2019-11-16 14:52:24','2019-11-16 14:52:24','incident mgt'),(9,'Problem_Management','To prevent problems and resulting incidents from happening, to eliminate recurring incidents, and to minimize the impact of incidents that cannot be prevented',3,'2019-11-16 14:52:24','2019-11-16 14:52:24','prblm mgt'),(10,'Release_Management','To plan, schedule and control the movement of releases from test to live environments. This ensures the integrity of the live environment is protected and the correct components are released.',3,'2019-11-16 14:52:24','2019-11-16 14:52:24','rls mnt'),(11,'Information_Security','Ensure the confidentiality, integrity, and availability of an organization information, data and IT services. ',3,'2019-11-16 14:52:24','2019-11-16 14:52:24','info sec'),(12,'Capacity_Management_CPU_Utilisation','Ensure the resources are right sized to meet current and future business requirements in a cost effective manner.',3,'2019-11-16 14:52:24','2019-11-16 14:52:24','cpu utilil'),(13,'Capacity_Management_Memory_Utilisation','Ensure the resources are right sized to meet current and future business requirements in a cost effective manner.',3,'2019-11-16 14:52:24','2019-11-16 14:52:24','memeory util'),(14,'Capacity_Management_License_Utilisation','Ensure the resources are right sized to meet current and future business requirements in a cost effective manner.',3,'2019-11-16 14:52:24','2019-11-16 14:52:24','licence util'),(15,'Business_Relationship,_training_and_awareness.','Foster Employee growth and empower employee development.',4,'2019-11-16 14:52:24','2019-11-16 14:52:24','Business_Relationship,_training_and_awareness'),(16,'Effective_monitoring_of_QMS_ISO9001:2015__program_implementation',NULL,5,'2019-11-16 14:52:24','2019-11-16 14:52:24','Effective Mntr'),(17,'Achieve_effective_Controls_on_the_Key_internal_processes',NULL,5,'2019-11-16 14:52:24','2019-11-16 14:52:24','cntrl on key pcs'),(18,'Improve_employee_awareness_on_QMS_and_compitencies',NULL,6,'2019-11-16 14:52:24','2019-11-16 14:52:24','employee awrns'),(19,'QMS_competencies',NULL,6,'2019-11-16 14:52:24','2019-11-16 14:52:24','qms comptn'),(20,'EBU_NPS_Details_-_To_offer_the_highest_possible_standard_of_Products__to_our_customers',NULL,7,'2019-11-16 14:52:24','2019-11-16 14:52:24','EBU NPS'),(21,'Consumer_NPS_Details_-_To_offer_the_highest_possible_standard_of_service_to_our_customers',NULL,7,'2019-11-16 14:52:24','2019-11-16 14:52:24','Cust NPS'),(22,'Customer_Quality_Management_in_terms_of_que_Management,_Repeat_caller_and__Call_Centre_accessibility',NULL,7,'2019-11-16 14:52:24','2019-11-16 14:52:24','Cust qms'),(25,'Decrease_financial_and_Information_loss',NULL,9,'2019-11-16 14:52:24','2019-11-16 14:52:24','Fin loss'),(26,'Ensure_regulatory_and_contractual_IS_compliance',NULL,9,'2019-11-16 14:52:24','2019-11-16 14:52:24','contr compl'),(27,'Provide_secure_and_uninterrupted_services_to_customers',NULL,10,'2019-11-16 14:52:24','2019-11-16 14:52:24','sec& unint serv'),(28,'Protect_the_privacy_of_customer_information',NULL,10,'2019-11-16 14:52:24','2019-11-16 14:52:24','priv cust data'),(29,'Ensure_systems_and_infrastructure_security',NULL,11,'2019-11-16 14:52:24','2019-11-16 14:52:24','infra sec'),(30,'Manage_ISMS_efficiently',NULL,11,'2019-11-16 14:52:24','2019-11-16 14:52:24','isms mng'),(31,'Achieve_effective_system_monitoring_and_audit',NULL,11,'2019-11-16 14:52:24','2019-11-16 14:52:24','eff syst mon'),(32,'Achieve_effective_access_management',NULL,11,'2019-11-16 14:52:24','2019-11-16 14:52:24','access mgt'),(33,'Increase_employee_awareness_and_compliance',NULL,12,'2019-11-16 14:52:24','2019-11-16 14:52:24','emp awarenes'),(34,'Increase_technical_compitencies_of_the_Information_risk_team',NULL,12,'2019-11-16 14:52:24','2019-11-16 14:52:24','tecn comp of risk team'),(43,'Improve Employee Awareness On Qms And Compliance',NULL,8,'2019-12-08 08:09:15','2019-12-08 08:09:15','improve employee awareness'),(42,'QMS Compitencies Across Broad(SPOCs)',NULL,8,'2019-12-08 08:08:59','2019-12-08 08:08:59','SPOCs'),(35,'Sustainability',NULL,13,'2019-11-25 05:58:28','2019-11-25 05:58:28','Sustainability'),(36,'Regulatory/Customer',NULL,13,'2019-11-25 05:58:28','2019-11-25 05:58:28','Regulatory/Customer'),(37,'Organizational Capacity',NULL,13,'2019-11-25 05:58:28','2019-11-25 05:58:28','Organizational Capacity'),(38,'trail',NULL,60,'2019-12-05 05:02:13','2019-12-05 05:02:13','Organizational Capacity'),(40,'mainmtenence processes two',NULL,64,'2019-12-07 07:35:08','2019-12-07 13:04:07','trial'),(44,'Regulatory and contractual compliance',NULL,67,'2019-12-08 19:42:41','2019-12-08 19:42:41','Regulatory and contractual compliance'),(45,'Reduce Financial Loss',NULL,67,'2019-12-08 19:42:59','2019-12-08 19:42:59','Reduce Financial Loss'),(46,'\"Ensure systems and infrastructure  redundancy \"',NULL,70,'2019-12-08 19:47:53','2019-12-08 19:47:53','Ensure systs and infra  redundancy '),(47,'\"Achieve effective BCM program management \"',NULL,70,'2019-12-08 19:48:09','2019-12-08 19:48:09','effective BCM management '),(48,'\"Increase employees Business Continuity awareness  and compliance \"',NULL,69,'2019-12-08 19:56:10','2019-12-08 19:56:10',' Emp BC awareness and compl'),(49,'Increase Business Continuity competencies of Technology Division',NULL,69,'2019-12-08 19:56:25','2019-12-08 19:56:25',' BC Competencies of tech div'),(50,'\"Provide uninterrupted services to our customers \"',NULL,68,'2019-12-08 19:58:40','2019-12-08 19:58:40','Provide uninterrupted services to our customers');
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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Student','mail@gmail.com',NULL,'$2y$10$bzoM.BLCVpHBB2zsYChPVuZ2dZ2wj79NtYOmyfA.G5Fdn7pe.p3zq','XTHqLFl4Tb1Nc4TnEaYKf7jsCYoB2cS6YmvySmWHxITGJSlpqlatVb9cKwER','2019-11-16 08:36:47','2019-11-16 08:36:47'),(2,'George Kariuki Ngugi','list@gmail.com',NULL,'$2y$10$Jsh8bNHi7GKcaHmn3/0SRuWaZJsH0Vt5sOIieNv6MBqiBFAJIVJ.K','iXQnEvgsqTdX4zagx39ebaMtqgxLnSmxqd55Ls3Vf8HGDXscv5LPWDNkr87z','2019-11-16 08:37:38','2019-11-16 08:37:38'),(3,'itsms','itsms@mail.com',NULL,'$2y$10$kF72yoj4770nFxwrUbra/e0jovkIbpir6OmyrdAh9yohubXaug7Nu','axdoTqHjBjity95T0hQoHwnEZM5kIw2vP6lQoHbIlYJxsVQwBGptUE5tAMlq','2019-11-17 06:25:24','2019-11-17 06:25:24'),(4,'isms','isms@mail.com',NULL,'$2y$10$xEFlp4cicNlS173PhtQYPOnlhjkcruL30ldJvVNcVvbhvko2rJLrW',NULL,'2019-11-17 06:25:53','2019-11-17 06:25:53'),(5,'qms','qms@mail.com',NULL,'$2y$10$1ZBFHLHKXyK9j5yapi3x3ePkDfknV6VqVemGjKT1cOHTl1K6NfvZS',NULL,'2019-11-17 06:26:18','2019-11-17 06:26:18'),(6,'EMS','ems@mail.com',NULL,'$2y$10$9AMEqakGfjKrxsoedu0Otu/wfNq1UBe6vjbbtoYWj1tKQPPSs3mdK',NULL,'2019-11-25 06:20:39','2019-11-25 06:20:39'),(7,'Admin','admin@mail.com',NULL,'$2y$10$nIQPM0oGCZgWYc3irXIVsuO/ecUoRUW1aBSSP/sjki2i24pKyveg.',NULL,'2019-12-01 07:30:48','2019-12-01 07:30:48'),(8,'Business Contuinity Management System','bcms@mail.com',NULL,'$2y$10$OYQ10UWzJsk6vlomrcceXeFdVNO/hUzeuqoslToaIi9fvZULzYarO',NULL,'2019-12-08 20:14:17','2019-12-08 20:14:17'),(9,'Cooperate Social Responsibility.','csr3@mail.com',NULL,'$2y$10$uYqx2wdPdfhvYo/NIvAjfe2sFQ013bxNkjg.rEQ36su2xmKHHJiIK',NULL,'2019-12-08 20:37:40','2019-12-08 20:37:40'),(10,'Quality management — Customer satisfaction Management System.','qmcsms@mail.com',NULL,'$2y$10$Mpyki/1CbHxbSOc8wocFA.uabc2w9b1fCdnHE4LrbJhhUA9Xj1ClK',NULL,'2019-12-08 20:38:56','2019-12-08 20:38:56');
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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `year_actives`
--

LOCK TABLES `year_actives` WRITE;
/*!40000 ALTER TABLE `year_actives` DISABLE KEYS */;
INSERT INTO `year_actives` VALUES (1,NULL,'2019-12-03 09:07:06','2019/2020',0),(2,'2019-12-03 09:07:06','2019-12-03 09:17:57','2020/2021',0),(3,'2019-12-03 09:17:57','2019-12-03 09:18:33','2019/2020',0),(4,'2019-12-03 09:18:33','2019-12-07 04:01:28','2019/2020',0),(5,'2019-12-07 04:01:28','2019-12-08 00:55:46','2020/2021',0),(6,'2019-12-08 00:55:46','2019-12-08 00:58:35','2019/2020',0),(7,'2019-12-08 00:58:35','2019-12-08 00:58:57','2019/2020',0),(8,'2019-12-08 00:58:57','2019-12-08 01:24:37','2020/2021',0),(9,'2019-12-08 01:24:37','2019-12-08 01:27:24','2019/2020',0),(10,'2019-12-08 01:27:24','2019-12-08 01:27:24','2019/2020',1);
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

-- Dump completed on 2019-12-13  5:04:03
