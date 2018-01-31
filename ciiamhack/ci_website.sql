-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: 127.0.0.1    Database: ci_website
-- ------------------------------------------------------
-- Server version	5.7.19-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tab_article`
--

DROP TABLE IF EXISTS `tab_article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `cat_id` varchar(45) DEFAULT NULL,
  `content` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `keywords` varchar(45) DEFAULT NULL,
  `thumb` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_article`
--

LOCK TABLES `tab_article` WRITE;
/*!40000 ALTER TABLE `tab_article` DISABLE KEYS */;
INSERT INTO `tab_article` VALUES (1,'智慧的光芒','1','<p>智慧的光芒智慧的光芒</p>','智慧的光芒','1',NULL,NULL),(2,'智慧的光芒','1','<p>智慧的光芒</p>','智慧的光芒','1',NULL,NULL),(3,'智慧的光芒','1','<p>智慧的光芒</p>','智慧的光芒','1',NULL,NULL),(4,'智慧的光芒','2','<p>智慧的光芒</p>','智慧的光芒','1',NULL,NULL),(5,'智慧的光芒','2','<p>智慧的光芒</p>','智慧的光芒','1',NULL,NULL),(6,'智慧的光芒','2','<p>智慧的光芒</p>','智慧的光芒','1',NULL,NULL),(7,'智慧的光芒','2','<p>智慧的光芒</p>','智慧的光芒','1',NULL,NULL),(9,'智慧的光芒','2','<p>智慧的光芒</p>','智慧的光芒','1',NULL,NULL),(10,'智慧的光芒','1','<p>智慧的光芒</p>','智慧的光芒','1','智慧的光芒',NULL);
/*!40000 ALTER TABLE `tab_article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_category`
--

DROP TABLE IF EXISTS `tab_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(45) DEFAULT NULL,
  `cate_alias` varchar(45) DEFAULT NULL,
  `cate_super` varchar(45) DEFAULT NULL,
  `cate_key` varchar(45) DEFAULT NULL,
  `cate_describe` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_category`
--

LOCK TABLES `tab_category` WRITE;
/*!40000 ALTER TABLE `tab_category` DISABLE KEYS */;
INSERT INTO `tab_category` VALUES (1,'分类A','catea','1','AA','111'),(2,'分类BB','cateb','0','BB','222');
/*!40000 ALTER TABLE `tab_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_login`
--

DROP TABLE IF EXISTS `tab_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_login` (
  `id` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_login`
--

LOCK TABLES `tab_login` WRITE;
/*!40000 ALTER TABLE `tab_login` DISABLE KEYS */;
INSERT INTO `tab_login` VALUES (1,'admin','a199a1389b2288de003996a39df62bc9');
/*!40000 ALTER TABLE `tab_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'ci_website'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-27 16:21:33
