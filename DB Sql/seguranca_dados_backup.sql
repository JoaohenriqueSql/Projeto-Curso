-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: seguranca_dados
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `college` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES ('sunnygkp10@gmail.com','123456','',''),('d@d.com','asd','a','asd');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `answer`
--

DROP TABLE IF EXISTS `answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answer` (
  `qid` text NOT NULL,
  `ansid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answer`
--

LOCK TABLES `answer` WRITE;
/*!40000 ALTER TABLE `answer` DISABLE KEYS */;
INSERT INTO `answer` VALUES ('55892169bf6a7','55892169d2efc'),('5589216a3646e','5589216a48722'),('558922117fcef','5589221195248'),('55892211e44d5','55892211f1fa7'),('558922894c453','558922895ea0a'),('558922899ccaa','55892289aa7cf'),('558923538f48d','558923539a46c'),('55892353f05c4','55892354051be');
/*!40000 ALTER TABLE `answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedback` (
  `id` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `feedback` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` VALUES ('60730932a3d1b','Demo Test','test@feedback.com','Testing Feedbacks','This is a demo text for testing purpose','2021-04-11','04:35:30pm'),('607309ab640d8','Chris','chris@gmail.com','Regard System','this is a demo text!','2021-04-11','04:37:31pm'),('60730a627e21f','Oliver','oliver@gmail.com','Bug','demo demo','2021-04-11','04:40:34pm');
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history` (
  `email` varchar(50) NOT NULL,
  `eid` text NOT NULL,
  `score` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `sahi` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history`
--

LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` VALUES ('sunnygkp10@gmail.com','558921841f1ec',4,2,2,0,'2015-06-23 09:31:26'),('sunnygkp10@gmail.com','558920ff906b8',4,2,2,0,'2015-06-23 13:32:09'),('avantika420@gmail.com','558921841f1ec',4,2,2,0,'2015-06-23 14:33:04'),('avantika420@gmail.com','5589222f16b93',4,2,2,0,'2015-06-23 14:49:39'),('mi5@hollywood.com','5589222f16b93',4,2,2,0,'2015-06-23 15:12:56'),('nik1@gmail.com','558921841f1ec',1,2,1,1,'2015-06-23 16:11:50'),('clancy@gmail.com','5589222f16b93',4,2,2,0,'2021-04-11 13:24:37'),('sunnygkp10@gmail.com','5589222f16b93',4,2,2,0,'2021-04-11 16:27:21'),('doe@gmail.com','558921841f1ec',4,2,2,0,'2021-04-11 17:20:17'),('james@gmail.com','558921841f1ec',4,2,2,0,'2021-04-11 17:26:12'),('james@gmail.com','5589222f16b93',4,2,2,0,'2021-04-11 17:26:54'),('steeve@gmail.com','558921841f1ec',4,2,2,0,'2021-04-11 17:44:46'),('steeve@gmail.com','5589222f16b93',4,2,2,0,'2021-04-11 17:45:20');
/*!40000 ALTER TABLE `history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `options`
--

DROP TABLE IF EXISTS `options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `options` (
  `qid` varchar(50) NOT NULL,
  `option` varchar(5000) NOT NULL,
  `optionid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `options`
--

LOCK TABLES `options` WRITE;
/*!40000 ALTER TABLE `options` DISABLE KEYS */;
INSERT INTO `options` VALUES ('55892169bf6a7','usermod','55892169d2efc'),('55892169bf6a7','useradd','55892169d2f05'),('55892169bf6a7','useralter','55892169d2f09'),('55892169bf6a7','groupmod','55892169d2f0c'),('5589216a3646e','751','5589216a48713'),('5589216a3646e','752','5589216a4871a'),('5589216a3646e','754','5589216a4871f'),('5589216a3646e','755','5589216a48722'),('558922117fcef','echo','5589221195248'),('558922117fcef','print','558922119525a'),('558922117fcef','printf','5589221195265'),('558922117fcef','cout','5589221195270'),('55892211e44d5','int a','55892211f1f97'),('55892211e44d5','$a','55892211f1fa7'),('55892211e44d5','long int a','55892211f1fb4'),('55892211e44d5','int a$','55892211f1fbd'),('558922894c453','cin>>a;','558922895ea0a'),('558922894c453','cin<<a;','558922895ea26'),('558922894c453','cout>>a;','558922895ea34'),('558922894c453','cout<a;','558922895ea41'),('558922899ccaa','cout','55892289aa7cf'),('558922899ccaa','cin','55892289aa7df'),('558922899ccaa','print','55892289aa7eb'),('558922899ccaa','printf','55892289aa7f5'),('558923538f48d','255.0.0.0','558923539a46c'),('558923538f48d','255.255.255.0','558923539a480'),('558923538f48d','255.255.0.0','558923539a48b'),('558923538f48d','none of these','558923539a495'),('55892353f05c4','192.168.1.100','5589235405192'),('55892353f05c4','172.168.16.2','55892354051a3'),('55892353f05c4','10.0.0.0.1','55892354051b4'),('55892353f05c4','11.11.11.11','55892354051be');
/*!40000 ALTER TABLE `options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `eid` text NOT NULL,
  `qid` text NOT NULL,
  `qns` text NOT NULL,
  `choice` int(10) NOT NULL,
  `sn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES ('558920ff906b8','55892169bf6a7','what is command for changing user information??',4,1),('558920ff906b8','5589216a3646e','what is permission for view only for other??',4,2),('558921841f1ec','558922117fcef','what is command for print in php??',4,1),('558921841f1ec','55892211e44d5','which is a variable of php??',4,2),('5589222f16b93','558922894c453','what is correct statement in c++??',4,1),('5589222f16b93','558922899ccaa','which command is use for print the output in c++?',4,2),('558922ec03021','558923538f48d','what is correct mask for A class IP???',4,1),('558922ec03021','55892353f05c4','which is not a private IP??',4,2);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quiz` (
  `eid` text NOT NULL,
  `title` varchar(100) NOT NULL,
  `sahi` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `time` bigint(20) NOT NULL,
  `intro` text NOT NULL,
  `tag` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz`
--

LOCK TABLES `quiz` WRITE;
/*!40000 ALTER TABLE `quiz` DISABLE KEYS */;
INSERT INTO `quiz` VALUES ('558920ff906b8','Linux : File Managment',2,1,2,5,'','linux','2015-06-23 09:03:59'),('558921841f1ec','Php Coding',2,1,2,5,'','PHP','2015-06-23 09:06:12'),('5589222f16b93','C++ Coding',2,1,2,5,'','c++','2015-06-23 09:09:03'),('558922ec03021','Networking',2,1,2,5,'','networking','2015-06-23 09:12:12');
/*!40000 ALTER TABLE `quiz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rank`
--

DROP TABLE IF EXISTS `rank`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rank` (
  `email` varchar(50) NOT NULL,
  `score` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rank`
--

LOCK TABLES `rank` WRITE;
/*!40000 ALTER TABLE `rank` DISABLE KEYS */;
INSERT INTO `rank` VALUES ('sunnygkp10@gmail.com',5,'2021-04-11 16:27:17'),('avantika420@gmail.com',8,'2015-06-23 14:49:39'),('mi5@hollywood.com',4,'2015-06-23 15:12:56'),('nik1@gmail.com',1,'2015-06-23 16:11:50'),('doe@gmail.com',4,'2021-04-11 17:20:17'),('clancy@gmail.com',4,'2021-04-11 13:24:37'),('james@gmail.com',14,'2021-04-11 17:32:53'),('steeve@gmail.com',14,'2021-04-11 17:50:15');
/*!40000 ALTER TABLE `rank` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registered_users`
--

DROP TABLE IF EXISTS `registered_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registered_users` (
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `verification_code` varchar(255) NOT NULL,
  `is_verified` int(10) NOT NULL DEFAULT 0,
  `resettoken` varchar(255) DEFAULT NULL,
  `resettokenexpire` date DEFAULT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registered_users`
--

LOCK TABLES `registered_users` WRITE;
/*!40000 ALTER TABLE `registered_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `registered_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `name` varchar(50) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `college` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mob` bigint(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-28 17:21:52
