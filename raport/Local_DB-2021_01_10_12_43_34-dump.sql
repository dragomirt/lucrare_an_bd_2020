-- MySQL dump 10.13  Distrib 8.0.19, for osx10.15 (x86_64)
--
-- Host: 127.0.0.1    Database: apartment_exchange
-- ------------------------------------------------------
-- Server version	8.0.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `exchanges`
--

DROP TABLE IF EXISTS `exchanges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `exchanges` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `listing_id1` int unsigned NOT NULL,
  `listing_id2` int unsigned NOT NULL,
  `profit` float NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `exchanges_listing_id1_foreign` (`listing_id1`),
  KEY `exchanges_listing_id2_foreign` (`listing_id2`),
  CONSTRAINT `exchanges_listing_id1_foreign` FOREIGN KEY (`listing_id1`) REFERENCES `listings` (`id`),
  CONSTRAINT `exchanges_listing_id2_foreign` FOREIGN KEY (`listing_id2`) REFERENCES `listings` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exchanges`
--

LOCK TABLES `exchanges` WRITE;
/*!40000 ALTER TABLE `exchanges` DISABLE KEYS */;
INSERT INTO `exchanges` VALUES (22,43,44,20,'2021-01-10 03:28:42','2021-01-10 03:28:42');
/*!40000 ALTER TABLE `exchanges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `listings`
--

DROP TABLE IF EXISTS `listings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `listings` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `user_id` int unsigned NOT NULL,
  `location` varchar(250) NOT NULL,
  `pricing` float NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `listings_user_id_foreign` (`user_id`),
  CONSTRAINT `listings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `listings`
--

LOCK TABLES `listings` WRITE;
/*!40000 ALTER TABLE `listings` DISABLE KEYS */;
INSERT INTO `listings` VALUES (43,'Large Apartment in Chisinau',2,'Bd. Negruzzi 14',20,'2021-01-10 03:25:59','2021-01-10 03:25:59'),(44,'Big Home in Spain',3,'Madrid, Nuevo Baztán',45,'2021-01-10 03:27:54','2021-01-10 03:27:54');
/*!40000 ALTER TABLE `listings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (63,'2020-12-27-213551','App\\Database\\Migrations\\CreateUsers','default','App',1610207147,1),(64,'2020-12-27-224737','App\\Database\\Migrations\\CreateListings','default','App',1610207147,1),(65,'2020-12-27-231730','App\\Database\\Migrations\\CreateOptionTypes','default','App',1610207147,1),(66,'2020-12-27-231839','App\\Database\\Migrations\\CreateOptions','default','App',1610207147,1),(67,'2020-12-28-221323','App\\Database\\Migrations\\CreateRequests','default','App',1610207147,1),(68,'2020-12-28-223054','App\\Database\\Migrations\\AddPhoneToRequests','default','App',1610207147,1),(69,'2020-12-28-224903','App\\Database\\Migrations\\UpdateTimeFields','default','App',1610207147,1),(70,'2020-12-28-225501','App\\Database\\Migrations\\AddExchanges','default','App',1610207147,1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `option_types`
--

DROP TABLE IF EXISTS `option_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `option_types` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `option_types`
--

LOCK TABLES `option_types` WRITE;
/*!40000 ALTER TABLE `option_types` DISABLE KEYS */;
INSERT INTO `option_types` VALUES (2,'Fast Wifi'),(3,'Are Bazin'),(4,'> 80 m.p.'),(5,'Loc de parcare'),(6,'Luminos');
/*!40000 ALTER TABLE `option_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `options`
--

DROP TABLE IF EXISTS `options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `options` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `listing_id` int unsigned NOT NULL,
  `type_id` int unsigned NOT NULL,
  `value` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `options_type_id_foreign` (`type_id`),
  KEY `options_listing_id_foreign` (`listing_id`),
  CONSTRAINT `options_listing_id_foreign` FOREIGN KEY (`listing_id`) REFERENCES `listings` (`id`),
  CONSTRAINT `options_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `option_types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `options`
--

LOCK TABLES `options` WRITE;
/*!40000 ALTER TABLE `options` DISABLE KEYS */;
INSERT INTO `options` VALUES (38,43,2,1),(39,43,4,1),(40,43,6,1),(41,44,2,1),(42,44,3,1),(43,44,6,1);
/*!40000 ALTER TABLE `options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `requests` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `phone` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requests`
--

LOCK TABLES `requests` WRITE;
/*!40000 ALTER TABLE `requests` DISABLE KEYS */;
INSERT INTO `requests` VALUES (1,'petru.vasilache@iis.utm.md','Pentru','Vasilache','Salut!\r\n\r\nPlanific o vacanță în Spania pe perioada 01-02-2021 și 14-02-2021 și sunt curios ce opțiuni sunt disponibile.\r\n\r\nPrefer locuințe cu bazin, internet rapid și design clasic.\r\n\r\nApreciez!','2021-01-10 11:09:46','+373 123456789'),(3,'ferdinandodeltor@gmail.com','Ferdinando','del Torro','Hi!,\r\n\r\nI would like to take some days off and visit some places where I\'ve never been. \r\nWhat options do you have for me regarding an apartment?\r\n\r\nI really enjoy spacious homes, with nice views and good insulation.\r\n\r\nRegarding my place, It\'s quite bright, has a pool and the fastest net out there!\r\n\r\nWaiting for your feedback! BR. ','2021-01-10 11:14:18','+34 123456789');
/*!40000 ALTER TABLE `requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `bio` text,
  `dob` date DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'Petru','Vasilache','Likes houses with pools, good internet and classic design.','2021-01-10','petru.vasilache@iis.utm.md','+373 123456789','2021-01-10 03:15:37','2021-01-10 03:15:37'),(3,'Ferdinando','del Torro','Likes spacious places with good views and sound proofing.','2021-01-01','ferdinandodeltor@gmail.com','+34 123456789','2021-01-10 03:16:41','2021-01-10 03:16:41');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-01-10 12:43:34
