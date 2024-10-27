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
INSERT INTO `users` VALUES (1,'admin','$2y$10$nwAxbd8/IE0P9XdTN4B5yujm3BjaJwJ4zX35CPCrJsXwwaBSKPrxW','admin'),(2,'staff','$2y$10$nwaPhRlDohD.421awwysX.3SWh/tBw.d3x7WJEWTN2pahlTAP1LhG','staff');
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
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `violation_history`
--

LOCK TABLES `violation_history` WRITE;
/*!40000 ALTER TABLE `violation_history` DISABLE KEYS */;
INSERT INTO `violation_history` VALUES (95,'3210850','Cololot','John Lloyd','Bachelor of Science in Information Technology','College of Technology','wearing-colored-shirts','1st','warning','2024-10-23 16:32:31','Pending','ID/Students/3210850.jpg'),(99,'3210850','Cololot','John Lloyd','Bachelor of Science in Information Technology','College of Technology','wearing-colored-shirts','1st','detention','2024-10-23 17:01:38','Pending','ID/Students/3210850.jpg'),(100,'3210824','Coca','Jim Hearty','Bachelor of Science in Information Technology','College of Technology','asdasdasd','1st','detention','2024-10-23 17:01:30','Pending','ID/Students/3210824.jpg'),(101,'3210850','Cololot','John Lloyd','Bachelor of Science in Information Technology','College of Technology','no-haircut','1st','detention','2024-10-23 17:17:51','Pending','ID/Students/3210850.jpg'),(106,'3210823','Basan','Abegail','Bachelor of Science in Information Technology','College of Technology','Minor Violation','','Warning','2024-10-25 10:49:14','Pending','ID/Students/3210823.jpg'),(107,'3210850','Cololot','John Lloyd','Bachelor of Science in Information Technology','College of Technology','Minor Violation','','Warning','2024-10-25 10:49:14','Pending','ID/Students/3210850.jpg'),(108,'3210850','Cololot','John Lloyd','Bachelor of Science in Information Technology','College of Technology','Minor Violation','','Warning','2024-10-25 10:49:20','Pending','ID/Students/3210850.jpg'),(109,'3210823','Basan','Abegail','Bachelor of Science in Information Technology','College of Technology','Minor Violation','','Warning','2024-10-25 10:49:20','Pending','ID/Students/3210823.jpg'),(110,'3210823','Basan','Abegail','Bachelor of Science in Information Technology','College of Technology','Minor Violation','','Warning','2024-10-25 10:49:28','Pending','ID/Students/3210823.jpg'),(111,'3210850','Cololot','John Lloyd','Bachelor of Science in Information Technology','College of Technology','Minor Violation','','Warning','2024-10-25 10:49:28','Pending','ID/Students/3210850.jpg'),(112,'3210823','Basan','Abegail','Bachelor of Science in Information Technology','College of Technology','Minor Violation','','Warning','2024-10-25 10:49:30','Pending','ID/Students/3210823.jpg'),(113,'3210850','Cololot','John Lloyd','Bachelor of Science in Information Technology','College of Technology','Minor Violation','','Warning','2024-10-25 10:49:30','Pending','ID/Students/3210850.jpg');
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=326 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `violations`
--

LOCK TABLES `violations` WRITE;
/*!40000 ALTER TABLE `violations` DISABLE KEYS */;
INSERT INTO `violations` VALUES (321,'3210823','Basan','Abegail','Bachelor of Science in Information Technology','College of Technology','wearing-colored-shirts','','Warning','2024-10-23 17:01:16','Pending',0,'2024-11-20 09:19:17','ID/Students/3210823.jpg'),(325,'3210850','Cololot','John Lloyd','Bachelor of Science in Information Technology','College of Technology','no-haircut','','Warning','2024-10-23 17:19:17','Pending',0,'2024-11-20 09:19:17','ID/Students/3210850.jpg');
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

-- Dump completed on 2024-10-25 11:14:37
