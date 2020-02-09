-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: isotrackingproduction
-- ------------------------------------------------------
-- Server version	8.0.17

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
-- Table structure for table `kpi_childrens`
--

DROP TABLE IF EXISTS `kpi_childrens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kpi_childrens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `keyPerfomanceIndicator_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kpi_childrens`
--

LOCK TABLES `kpi_childrens` WRITE;
/*!40000 ALTER TABLE `kpi_childrens` DISABLE KEYS */;
INSERT INTO `kpi_childrens` VALUES (1,NULL,NULL,247,'Site Risk Assesment Carried out in HQ1&2'),(2,NULL,NULL,247,'Site Risk Assesment Carried out in SCC'),(3,NULL,NULL,247,'Site Risk Assesment Carried out in JCC'),(4,NULL,NULL,247,'Site Risk Assesment Carried out in HQ3'),(5,NULL,NULL,247,'Site Risk Assesment Carried out in Kiboswa'),(6,NULL,NULL,247,'Site Risk Assesment Carried out in Nakuru'),(7,NULL,NULL,247,'Site Risk Assesment Carried out in Mombasa'),(8,NULL,NULL,247,'Site Risk Assesment Carried out in Gospel'),(9,NULL,NULL,248,'Drills Carried Out in SCC'),(10,NULL,NULL,248,'Drills Carried Out in HQ1&2'),(11,NULL,NULL,248,'Drills Carried Out in JCC'),(12,NULL,NULL,248,'Drills Carried Out in HQ3'),(13,NULL,NULL,248,'Drills Carried Out in QOA'),(14,NULL,NULL,248,'Drills Carried Out in Gospel'),(15,NULL,NULL,248,'Drills Carried Out in Kiboswa'),(16,NULL,NULL,248,'Drills Carried Out in NAakuru'),(17,NULL,NULL,248,'Drills Carried Out in Mombasa'),(18,NULL,NULL,240,'April Induction Session'),(19,NULL,NULL,240,'May Induction Session'),(20,NULL,NULL,240,'June Induction Session'),(21,NULL,NULL,240,'July Induction Session'),(22,NULL,NULL,240,'Aughust Induction Session'),(23,NULL,NULL,240,'September Induction Session'),(24,NULL,NULL,240,'October Induction Session'),(25,NULL,NULL,240,'November Induction Session'),(26,NULL,NULL,240,'December Induction Session'),(27,NULL,NULL,240,'January Induction Session'),(28,NULL,NULL,240,'February Induction Session'),(29,NULL,NULL,240,'March Induction Session'),(30,NULL,NULL,243,'RNO'),(31,NULL,NULL,243,'NSO'),(32,NULL,NULL,243,'PSD'),(33,NULL,NULL,243,'IS OPS'),(34,NULL,NULL,243,'Strategy & Governance'),(35,NULL,NULL,243,'NE'),(36,NULL,NULL,243,'Tech Sec');
/*!40000 ALTER TABLE `kpi_childrens` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-09 11:27:35
