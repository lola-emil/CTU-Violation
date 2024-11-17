-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: localhost    Database: violation_tracker
-- ------------------------------------------------------
-- Server version	8.3.0

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
-- Table structure for table `reset_code`
--

DROP TABLE IF EXISTS `reset_code`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reset_code` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(100) DEFAULT NULL,
  `type` enum('admin','staff') DEFAULT NULL,
  `is_verified` tinyint(1) DEFAULT '0',
  `expiry` timestamp NULL DEFAULT ((now() + interval 5 minute)),
  `is_used` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reset_code`
--

LOCK TABLES `reset_code` WRITE;
/*!40000 ALTER TABLE `reset_code` DISABLE KEYS */;
INSERT INTO `reset_code` VALUES (1,'reset67385d808034bsa','staff',0,'2024-11-16 09:08:42',0),(2,'673860ad4e85c','staff',0,'2024-11-16 09:11:56',0),(3,'673860e971589','staff',0,'2024-11-16 09:12:56',0),(4,'67386117e4c0b','staff',1,'2024-11-16 09:10:43',0),(5,'673862828cc0a','staff',0,'2024-11-16 09:19:45',0),(6,'67386642f2c19','staff',1,'2024-11-16 09:35:45',0),(7,'673866ace905e','staff',1,'2024-11-16 09:37:32',0),(8,'67386734cfde9','staff',1,'2024-11-16 09:39:47',0),(9,'673867b1857bc','staff',0,'2024-11-16 09:41:52',0),(10,'673867bb32e17','staff',1,'2024-11-16 09:42:02',0),(11,'67386d34b2bc7','staff',1,'2024-11-16 10:05:24',0),(12,'67386d4160940','staff',0,'2024-11-16 10:05:37',0),(13,'673871be51934','staff',0,'2024-11-16 10:24:45',0),(14,'673902e865cbc','staff',1,'2024-11-16 20:44:08',0),(15,'67390ca2a60ba','staff',1,'2024-11-16 21:25:37',0),(16,'67390e36610a1','staff',1,'2024-11-16 21:32:22',0),(17,'67390e7043993','staff',1,'2024-11-16 21:33:19',1),(18,'67390f7954db2','staff',0,'2024-11-16 21:37:44',0),(19,'673910ae5055f','staff',0,'2024-11-16 21:42:53',0),(20,'673910aef395a','staff',0,'2024-11-16 21:42:54',0),(21,'673910af2164d','staff',1,'2024-11-16 21:42:56',0),(22,'67391163adf95','staff',1,'2024-11-16 21:45:54',0),(23,'673912ceb4563','staff',1,'2024-11-16 21:51:57',0),(24,'67391392cf524','staff',1,'2024-11-16 21:55:13',0);
/*!40000 ALTER TABLE `reset_code` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `staff` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `course` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `department` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,'3210825','Hannah Rose','Asenjo','Bachelor of Science in Information Technology','College of Technology','ID/Students/3210825.jpg'),(2,'3210820','Jiesel','Avila','Bachelor of Science in Information Technology','College of Technology','ID/Students/3210820.jpg'),(3,'3210823','Abegail','Basan','Bachelor of Science in Information Technology','College of Technology','ID/Students/3210823.jpg'),(4,'3210822','Belinda','Bayking','Bachelor of Science in Information Technology','College of Technology','ID/Students/3210822.jpg'),(5,'3210826','Jehan','Bombio','Bachelor of Science in Information Technology','College of Technology','ID/Students/3210826.jpg'),(6,'3210821','Rey Neil','Castro','Bachelor of Science in Information Technology','College of Technology','ID/Students/3210821.jpg'),(7,'3210824','Jim Hearty','Coca','Bachelor of Science in Information Technology','College of Technology','ID/Students/3210824.jpg'),(54,'3210850','John Lloyd','Cololot','Bachelor of Science in Information Technology','College of Technology','ID/Students/3210850.jpg'),(55,'3235067','Arvin','Forrosuelo','Bachelor of Science in Information Technology','College of Technology','ID/Students/3210867.jpg'),(56,'3210839','Alysson','Gecozo','Bachelor of Science in Information Technology','College of Technology','ID/Students/3210839.jpg'),(57,'3210836','Eliezer Ghabe','Gonzales','Bachelor of Science in Information Technology','College of Technology','ID/Students/3210836.jpg'),(58,'3210832','Mark Angelo','Hornido','Bachelor of Science in Information Technology','College of Technology','ID/Students/3210832.jpg'),(59,'3210852','Rhynia','Impas','Bachelor of Science in Information Technology','College of Technology','ID/Students/3210852.jpg'),(60,'3210833','Scott Jirah','Jayson','Bachelor of Science in Information Technology','College of Technology','ID/Students/3210833.jpg'),(61,'3223068','Faithope','Laag','Bachelor of Science in Information Technology','College of Technology','ID/Students/3223068.jpg'),(62,'3210827','Brethel','Lavilla','Bachelor of Science in Information Technology','College of Technology','ID/Students/3210827.jpg'),(63,'3210840','Camille','Lepiten','Bachelor of Science in Information Technology','College of Technology','ID/Students/3210840.jpg'),(64,'3210842','Rosalio','Ligaray Jr.','Bachelor of Science in Information Technology','College of Technology','ID/Students/3210842.jpg'),(65,'3210843','Kembirly','Limpangog','Bachelor of Science in Information Technology','College of Technology','ID/Students/3210843.jpg'),(66,'3210851','Dan Andrei','Macasa','Bachelor of Science in Information Technology','College of Technology','ID/Students/3210851.jpg'),(67,'3200792','Kenneth Bryan','Mancao','Bachelor of Science in Information Technology','College of Technology','ID/Students/3200792.jpg'),(68,'3210818','Celine Fhranches','Mata','Bachelor of Science in Information Technology','College of Technology','ID/Students/3210818.jpg'),(69,'3210844','Jesus Harlo','Mata III','Bachelor of Science in Information Technology','College of Technology','ID/Students/3210844.jpg'),(70,'3210848','Junnick','Meca','Bachelor of Science in Information Technology','College of Technology','ID/Students/3210848.jpg'),(71,'3210849','Christian Dave','Milan','Bachelor of Science in Information Technology','College of Technology','ID/Students/3210849.jpg'),(72,'3210846','Judel','Pachoco','Bachelor of Science in Information Technology','College of Technology','ID/Students/3210846.jpg'),(73,'3210828','Cris Lorence','Pasilang','Bachelor of Science in Information Technology','College of Technology','ID/Students/3210828.jpg'),(74,'3210831','John Klevin','Petralba','Bachelor of Science in Information Technology','College of Technology','ID/Students/3210831.jpg'),(75,'3210845','Rutchelle','Ponce','Bachelor of Science in Information Technology','College of Technology','ID/Students/3210845.jpg'),(76,'3222975','Gaiel','Rosales','Bachelor of Science in Information Technology','College of Technology','ID/Students/3222975.jpg'),(77,'3210807','Nathaniel','Rosell','Bachelor of Science in Information Technology','College of Technology','ID/Students/3210807.jpg'),(78,'3210847','Mark Jason','Roble','Bachelor of Science in Information Technology','College of Technology','ID/Students/3210847.jpg'),(79,'3210804','Charmaine','Serato','Bachelor of Science in Information Technology','College of Technology','ID/Students/3210804.jpg'),(80,'3210819','Lorenze','Supapo','Bachelor of Science in Information Technology','College of Technology','ID/Students/3210819.jpg'),(81,'3210829','Jackielyn Rose','Verzosa','Bachelor of Science in Information Technology','College of Technology','ID/Students/3210829.jpg');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `timer`
--

DROP TABLE IF EXISTS `timer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `timer` (
  `id` int NOT NULL,
  `end_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `timer`
--

LOCK TABLES `timer` WRITE;
/*!40000 ALTER TABLE `timer` DISABLE KEYS */;
INSERT INTO `timer` VALUES (1,'2024-09-17 08:14:38');
/*!40000 ALTER TABLE `timer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('admin','staff') COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','$2y$10$eNT6/.x4tubWUHFmWUoCUuP7oNhdcyiqyNRvWhg4FHyVCzJkXaeSa','admin'),(2,'staff','$2y$10$CVPewaMNlY1Sq4UXT5x5J.o/zXeAcPRzkl7GTVO9aeZSU/T8NVBWG','staff');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `violation_history`
--

DROP TABLE IF EXISTS `violation_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `violation_history` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lastname` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `firstname` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `course` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `department` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `violation` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `offense` enum('1st','2nd','3rd','severe') COLLATE utf8mb4_general_ci DEFAULT '1st',
  `sanction` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `timestamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `actions` varchar(255) COLLATE utf8mb4_general_ci DEFAULT 'Pending',
  `image_url` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=522 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `violation_history`
--

LOCK TABLES `violation_history` WRITE;
/*!40000 ALTER TABLE `violation_history` DISABLE KEYS */;
INSERT INTO `violation_history` VALUES (100,'3210824','Coca','Jim Hearty','Bachelor of Science in Information Technology','College of Technology','asdasdasd','1st','detention','2024-10-23 17:01:30','Pending','ID/Students/3210824.jpg'),(114,'3210851','Macasa','Dan Andrei','Bachelor of Science in Information Technology','College of Technology','wearing-colored-shirts','1st','warning','2024-10-26 18:34:06','Pending','ID/Students/3210851.jpg'),(116,'3210850','Cololot','John Lloyd','Bachelor of Science in Information Technology','College of Technology','no-haircut','','Warning','2024-10-23 17:19:17','Pending','ID/Students/3210850.jpg'),(118,'3210820','Avila','Jiesel','Bachelor of Science in Information Technology','College of Technology','Moderate Violation','2nd','1 Day Suspension','2024-10-27 12:21:53','Pending','ID/Students/3210820.jpg'),(496,'3210820','Avila','Jiesel','Bachelor of Science in Information Technology','College of Technology','wearing-colored-shirts','2nd','1 Day Suspension','2024-10-26 08:35:05','Pending','ID/Students/3210820.jpg'),(497,'3210852','Impas','Rhynia','Bachelor of Science in Information Technology','College of Technology','wearing-colored-shirts','2nd','1 Day Suspension','2024-10-27 07:31:53','Pending','ID/Students/3210852.jpg'),(513,'3210850','Cololot','John Lloyd','Bachelor of Science in Information Technology','College of Technology','Moderate Violation','1st','warning','2024-11-16 04:36:56','Pending','ID/Students/3210850.jpg'),(514,'3210839','Gecozo','Alysson','Bachelor of Science in Information Technology','College of Technology','Moderate Violation','1st','Warning','2024-11-16 04:36:56','Pending','ID/Students/3210839.jpg'),(515,'3210839','Gecozo','Alysson','Bachelor of Science in Information Technology','College of Technology','Major Violation','2nd','1 Day Suspension','2024-11-16 04:36:57','Pending','ID/Students/3210839.jpg'),(516,'3210839','Gecozo','Alysson','Bachelor of Science in Information Technology','College of Technology','Minor Violation','3rd','1 Week Suspension','2024-11-16 04:36:58','Pending','ID/Students/3210839.jpg'),(517,'3210839','Gecozo','Alysson','Bachelor of Science in Information Technology','College of Technology','Moderate Violation','1st','Warning','2024-11-16 04:36:59','Pending','ID/Students/3210839.jpg'),(518,'3210839','Gecozo','Alysson','Bachelor of Science in Information Technology','College of Technology','Major Violation','2nd','1 Day Suspension','2024-11-16 04:37:00','Pending','ID/Students/3210839.jpg'),(519,'3210839','Gecozo','Alysson','Bachelor of Science in Information Technology','College of Technology','Minor Violation','3rd','1 Week Suspension','2024-11-16 04:37:01','Pending','ID/Students/3210839.jpg'),(520,'3210839','Gecozo','Alysson','Bachelor of Science in Information Technology','College of Technology','Moderate Violation','1st','Warning','2024-11-16 04:37:02','Pending','ID/Students/3210839.jpg'),(521,'3210850','Cololot','John Lloyd','Bachelor of Science in Information Technology','College of Technology','wearing-colored-shirts','2nd','1 Day Suspension','2024-11-11 19:51:13','Pending','ID/Students/3210850.jpg');
/*!40000 ALTER TABLE `violation_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `violations`
--

DROP TABLE IF EXISTS `violations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `violations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lastname` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `firstname` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `course` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `department` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `violation` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `offense` enum('1st','2nd','3rd','severe') COLLATE utf8mb4_general_ci DEFAULT '1st',
  `sanction` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `timestamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `actions` varchar(255) COLLATE utf8mb4_general_ci DEFAULT 'Pending',
  `start_time` int NOT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `cycle` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=333 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `violations`
--

LOCK TABLES `violations` WRITE;
/*!40000 ALTER TABLE `violations` DISABLE KEYS */;
INSERT INTO `violations` VALUES (329,'3210839','Gecozo','Alysson','Bachelor of Science in Information Technology','College of Technology','wearing-colored-shirts','2nd','1 Day Suspension','2024-10-27 13:10:59','Pending',0,'2024-11-20 06:15:59','ID/Students/3210839.jpg',19);
/*!40000 ALTER TABLE `violations` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-17  6:10:15
