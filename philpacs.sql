/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.37-MariaDB : Database - philpacs
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
USE `philpacs`;

/*Table structure for table `accountstbl` */

DROP TABLE IF EXISTS `accountstbl`;

CREATE TABLE `accountstbl` (
  `accountID` int(11) NOT NULL AUTO_INCREMENT,
  `personalID` int(11) NOT NULL,
  `accountType` tinyint(1) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dateCreated` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`accountID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `accountstbl` */

insert  into `accountstbl`(`accountID`,`personalID`,`accountType`,`username`,`password`,`dateCreated`,`status`) values 
(1,0,9,'Admin','$2y$10$4h.ghAQaqdzRhWCCk46UnesolhddLPKEKRHG./gvi3Tj6LklQ63aC','0000-00-00',9),
(2,2,1,'Jordan','$2y$10$nSJLQ0MbjbiNxbYQi46QxeOuJJvpsxWFmUrcNfHf2W85tkTLKB4l.','2019-08-01',1),
(3,1,0,'bryan','$2y$10$O9rH91e6SnBplIwa1qNFAuWmR7k0YsVokch1Vl3FNgmVsAxLOWdkm','2019-08-06',1);

/*Table structure for table `addresstbl` */

DROP TABLE IF EXISTS `addresstbl`;

CREATE TABLE `addresstbl` (
  `addressID` int(11) NOT NULL AUTO_INCREMENT,
  `houseNumber` varchar(10) DEFAULT NULL,
  `block` varchar(10) DEFAULT NULL,
  `lot` varchar(10) DEFAULT NULL,
  `street` varchar(10) DEFAULT NULL,
  `subdivision` varchar(50) DEFAULT NULL,
  `barangay` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL DEFAULT 'Philippines',
  `zipcode` int(4) DEFAULT NULL,
  PRIMARY KEY (`addressID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `addresstbl` */

/*Table structure for table `attendancetbl` */

DROP TABLE IF EXISTS `attendancetbl`;

CREATE TABLE `attendancetbl` (
  `attendanceID` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `Edate` date NOT NULL,
  `EMTimein` time NOT NULL,
  `EMTimeout` time NOT NULL,
  `EATimein` time NOT NULL,
  `EATimeout` time NOT NULL,
  `totalMinutes` double NOT NULL,
  `status` tinyint(1) NOT NULL,
  `hashedFile` varchar(100) NOT NULL,
  PRIMARY KEY (`attendanceID`)
) ENGINE=InnoDB AUTO_INCREMENT=166 DEFAULT CHARSET=latin1;

/*Data for the table `attendancetbl` */

insert  into `attendancetbl`(`attendanceID`,`firstName`,`lastName`,`Edate`,`EMTimein`,`EMTimeout`,`EATimein`,`EATimeout`,`totalMinutes`,`status`,`hashedFile`) values 
(1,'Jamille Ann','Agbuya','2019-06-18','07:43:34','12:03:33','01:47:14','05:28:37',481.36,1,'1c435f753b779b209128ae3fff9837d2'),
(2,'Jamille Ann','Agbuya','2019-06-20','07:43:42','12:22:37','01:05:01','05:09:15',523.15,1,'1c435f753b779b209128ae3fff9837d2'),
(3,'Jamille Ann','Agbuya','2019-06-21','07:45:45','12:04:06','01:03:46','05:02:41',497.27,1,'1c435f753b779b209128ae3fff9837d2'),
(4,'Jamille Ann','Agbuya','2019-06-17','06:47:10','12:31:38','01:03:35','07:48:39',749.54,1,'1c435f753b779b209128ae3fff9837d2'),
(5,'Jamille Ann','Agbuya','2019-06-13','07:25:07','12:36:36','01:06:23','05:03:47',548.88,1,'1c435f753b779b209128ae3fff9837d2'),
(6,'Jamille Ann','Agbuya','2019-06-19','07:39:25','12:34:52','01:04:42','05:11:50',542.58,1,'1c435f753b779b209128ae3fff9837d2'),
(7,'Jamille Ann','Agbuya','2019-06-24','08:02:35','12:00:53','01:09:01','05:04:58',474.25,1,'1c435f753b779b209128ae3fff9837d2'),
(8,'Jamille Ann','Agbuya','2019-06-25','07:39:14','12:01:15','01:06:06','05:09:14',505.15,1,'1c435f753b779b209128ae3fff9837d2'),
(9,'Jamille Ann','Agbuya','2019-06-11','07:39:20','12:05:16','01:00:48','05:04:35',509.71,1,'1c435f753b779b209128ae3fff9837d2'),
(10,'Jamille Ann','Agbuya','2019-06-14','07:53:38','12:56:31','01:07:19','05:38:19',573.88,1,'1c435f753b779b209128ae3fff9837d2'),
(11,'Earvin John','Tallod','2019-06-18','08:13:38','12:03:40','01:32:17','05:26:26',464.18,1,'1c435f753b779b209128ae3fff9837d2'),
(12,'Earvin John','Tallod','2019-06-19','08:00:20','12:35:16','01:07:43','05:13:31',520.73,1,'1c435f753b779b209128ae3fff9837d2'),
(13,'Earvin John','Tallod','2019-06-17','08:10:51','12:31:46','01:03:26','05:57:37',555.1,1,'1c435f753b779b209128ae3fff9837d2'),
(14,'Earvin John','Tallod','2019-06-14','08:13:17','12:02:16','01:12:46','05:38:29',494.7,1,'1c435f753b779b209128ae3fff9837d2'),
(15,'Earvin John','Tallod','2019-06-11','08:06:05','12:06:11','01:01:20','05:07:10',485.93,1,'1c435f753b779b209128ae3fff9837d2'),
(16,'Earvin John','Tallod','2019-06-25','07:48:00','12:00:43','01:10:05','05:08:11',490.82,1,'1c435f753b779b209128ae3fff9837d2'),
(17,'Earvin John','Tallod','2019-06-20','08:05:23','12:08:47','01:05:55','05:09:45',487.23,1,'1c435f753b779b209128ae3fff9837d2'),
(18,'Earvin John','Tallod','2019-06-13','07:29:51','12:37:43','01:09:18','05:04:53',543.45,1,'1c435f753b779b209128ae3fff9837d2'),
(19,'Julius Michael','Balingit','2019-06-11','07:27:10','12:05:57','01:01:02','05:08:56',526.68,1,'1c435f753b779b209128ae3fff9837d2'),
(20,'Julius Michael','Balingit','2019-06-13','07:44:35','12:37:35','01:06:49','03:51:52',458.05,1,'1c435f753b779b209128ae3fff9837d2'),
(21,'Elsa','Contreras','2019-06-25','08:06:59','12:01:03','01:10:13','05:09:09',473,1,'1c435f753b779b209128ae3fff9837d2'),
(22,'Elsa','Contreras','2019-06-21','08:02:11','12:04:10','01:05:08','05:05:10',482.01,1,'1c435f753b779b209128ae3fff9837d2'),
(23,'Elsa','Contreras','2019-06-18','07:43:45','12:03:53','01:07:37','05:27:32',520.05,1,'1c435f753b779b209128ae3fff9837d2'),
(24,'Elsa','Contreras','2019-06-19','08:08:37','12:35:05','01:03:41','05:15:14',518.02,1,'1c435f753b779b209128ae3fff9837d2'),
(25,'Elsa','Contreras','2019-06-20','08:05:18','12:08:26','01:05:05','05:09:49',487.86,1,'1c435f753b779b209128ae3fff9837d2'),
(26,'Elsa','Contreras','2019-06-13','08:12:44','12:36:43','01:09:25','05:05:02',499.6,1,'1c435f753b779b209128ae3fff9837d2'),
(27,'Elsa','Contreras','2019-06-14','08:13:12','12:02:36','01:08:55','05:39:18',499.78,1,'1c435f753b779b209128ae3fff9837d2'),
(28,'Elsa','Contreras','2019-06-17','06:47:25','12:31:10','01:03:20','05:57:57',638.37,1,'1c435f753b779b209128ae3fff9837d2'),
(29,'Elsa','Contreras','2019-06-11','07:55:22','12:05:27','01:00:55','05:09:48',498.96,1,'1c435f753b779b209128ae3fff9837d2'),
(30,'Jeric','Macalawa','2019-06-25','07:28:26','12:00:56','01:26:54','05:08:56',494.53,1,'1c435f753b779b209128ae3fff9837d2'),
(31,'Jeric','Macalawa','2019-06-21','07:55:38','12:03:44','01:04:06','05:03:06',487.1,1,'1c435f753b779b209128ae3fff9837d2'),
(32,'Jeric','Macalawa','2019-06-13','08:09:35','12:32:07','01:20:53','05:02:00',483.65,1,'1c435f753b779b209128ae3fff9837d2'),
(33,'Jeric','Macalawa','2019-06-17','06:48:23','12:31:21','01:03:30','05:57:39',637.12,1,'1c435f753b779b209128ae3fff9837d2'),
(34,'Jeric','Macalawa','2019-06-20','07:38:23','12:08:08','01:05:21','05:08:41',513.08,1,'1c435f753b779b209128ae3fff9837d2'),
(35,'Jeric','Macalawa','2019-06-11','07:47:57','12:05:24','01:01:09','05:09:07',505.42,1,'1c435f753b779b209128ae3fff9837d2'),
(36,'Jeric','Macalawa','2019-06-14','08:02:26','12:02:27','01:04:56','05:39:37',514.7,1,'1c435f753b779b209128ae3fff9837d2'),
(37,'Jeric','Macalawa','2019-06-18','08:04:25','12:04:24','01:01:17','05:26:33',505.25,1,'1c435f753b779b209128ae3fff9837d2'),
(38,'Jeric','Macalawa','2019-06-19','08:08:32','12:36:50','01:29:58','05:13:37',491.95,1,'1c435f753b779b209128ae3fff9837d2'),
(39,'Adam','Tabudlong','2019-06-21','08:02:05','12:04:00','01:04:37','05:01:37',478.92,1,'1c435f753b779b209128ae3fff9837d2'),
(40,'Adam','Tabudlong','2019-06-18','08:14:32','12:40:14','01:07:45','05:26:47',524.73,1,'1c435f753b779b209128ae3fff9837d2'),
(41,'Adam','Tabudlong','2019-06-17','06:47:34','12:31:28','01:03:48','05:57:23',637.48,1,'1c435f753b779b209128ae3fff9837d2'),
(42,'Adam','Tabudlong','2019-06-19','08:08:40','12:36:07','01:05:03','05:05:03',507.45,1,'1c435f753b779b209128ae3fff9837d2'),
(43,'Adam','Tabudlong','2019-06-20','08:05:09','12:22:44','01:05:25','05:09:20',501.5,1,'1c435f753b779b209128ae3fff9837d2'),
(44,'Adam','Tabudlong','2019-06-25','08:06:55','12:00:53','01:10:19','05:08:48',472.45,1,'1c435f753b779b209128ae3fff9837d2'),
(45,'Adam','Tabudlong','2019-06-11','07:55:30','12:06:14','01:01:22','05:10:03',499.41,1,'1c435f753b779b209128ae3fff9837d2'),
(46,'Kenn Edward','Abiertas','2019-06-25','08:06:50','12:00:58','01:10:10','05:08:54',472.86,1,'1c435f753b779b209128ae3fff9837d2'),
(47,'Kenn Edward','Abiertas','2019-06-17','06:47:42','12:31:32','01:03:43','05:58:18',638.41,1,'1c435f753b779b209128ae3fff9837d2'),
(48,'Kenn Edward','Abiertas','2019-06-21','08:04:52','12:03:52','01:04:47','05:01:52',476.08,1,'1c435f753b779b209128ae3fff9837d2'),
(49,'Kenn Edward','Abiertas','2019-06-11','07:55:40','12:05:46','01:01:12','05:08:53',497.78,1,'1c435f753b779b209128ae3fff9837d2'),
(50,'Kenn Edward','Abiertas','2019-06-18','08:14:41','12:03:46','01:31:51','05:26:39',463.88,1,'1c435f753b779b209128ae3fff9837d2'),
(51,'Kenn Edward','Abiertas','2019-06-14','08:13:22','12:02:30','01:12:42','05:39:27',495.88,1,'1c435f753b779b209128ae3fff9837d2'),
(52,'Kenn Edward','Abiertas','2019-06-20','08:05:28','12:08:36','01:05:31','05:09:35',487.2,1,'1c435f753b779b209128ae3fff9837d2'),
(53,'Kenn Edward','Abiertas','2019-06-13','08:12:57','12:37:46','01:09:15','05:04:28',500.04,1,'1c435f753b779b209128ae3fff9837d2'),
(54,'Kenn Edward','Abiertas','2019-06-19','08:08:31','12:36:01','01:13:33','05:13:39',507.6,1,'1c435f753b779b209128ae3fff9837d2'),
(55,'Kenn Edward','Abiertas','2019-06-24','08:03:10','12:01:18','01:09:09','05:05:09',474.13,1,'1c435f753b779b209128ae3fff9837d2'),
(111,'Jamille Ann','Agbuya','2019-06-25','07:39:20','12:05:16','01:00:48','05:04:35',509.71,0,'03f021358f18c27b1226ed160d1dd54d'),
(112,'Earvin John','Tallod','2019-06-25','08:06:05','12:06:11','01:01:20','05:07:10',485.93,0,'03f021358f18c27b1226ed160d1dd54d'),
(113,'Julius Michael','Balingit','2019-06-25','07:27:10','12:05:57','01:01:02','05:08:56',526.68,0,'03f021358f18c27b1226ed160d1dd54d'),
(114,'Elsa','Contreras','2019-06-25','07:55:22','12:05:27','01:00:55','05:09:48',498.96,0,'03f021358f18c27b1226ed160d1dd54d'),
(115,'Jeric','Macalawa','2019-06-25','07:47:57','12:05:24','01:01:09','05:09:07',505.42,0,'03f021358f18c27b1226ed160d1dd54d'),
(116,'Adam','Tabudlong','2019-06-25','07:55:30','12:06:14','01:01:22','05:10:03',499.41,0,'03f021358f18c27b1226ed160d1dd54d'),
(117,'Kenn Edward','Abiertas','2019-06-25','07:55:40','12:05:46','01:01:12','05:08:53',497.78,0,'03f021358f18c27b1226ed160d1dd54d'),
(118,'Jamille Ann','Agbuya','2019-06-26','07:25:07','12:36:36','01:06:23','05:03:47',548.88,0,'03f021358f18c27b1226ed160d1dd54d'),
(119,'Earvin John','Tallod','2019-06-26','07:29:51','12:37:43','01:09:18','05:04:53',543.45,0,'03f021358f18c27b1226ed160d1dd54d'),
(120,'Julius Michael','Balingit','2019-06-26','07:44:35','12:37:35','01:06:49','03:51:52',458.05,0,'03f021358f18c27b1226ed160d1dd54d'),
(121,'Elsa','Contreras','2019-06-26','08:12:44','12:36:43','01:09:25','05:05:02',499.6,0,'03f021358f18c27b1226ed160d1dd54d'),
(122,'Jeric','Macalawa','2019-06-26','08:09:35','12:32:07','01:20:53','05:02:00',483.65,0,'03f021358f18c27b1226ed160d1dd54d'),
(123,'Kenn Edward','Abiertas','2019-06-26','08:12:57','12:37:46','01:09:15','05:04:28',500.04,0,'03f021358f18c27b1226ed160d1dd54d'),
(124,'Jamille Ann','Agbuya','2019-06-29','07:53:38','12:56:31','01:07:19','05:38:19',573.88,0,'03f021358f18c27b1226ed160d1dd54d'),
(125,'Earvin John','Tallod','2019-06-29','08:13:17','12:02:16','01:12:46','05:38:29',494.7,0,'03f021358f18c27b1226ed160d1dd54d'),
(126,'Elsa','Contreras','2019-06-29','08:13:12','12:02:36','01:08:55','05:39:18',499.78,0,'03f021358f18c27b1226ed160d1dd54d'),
(127,'Jeric','Macalawa','2019-06-29','08:02:26','12:02:27','01:04:56','05:39:37',514.7,0,'03f021358f18c27b1226ed160d1dd54d'),
(128,'Kenn Edward','Abiertas','2019-06-29','08:13:22','12:02:30','01:12:42','05:39:27',495.88,0,'03f021358f18c27b1226ed160d1dd54d'),
(129,'Jamille Ann','Agbuya','2019-06-30','06:47:10','12:31:38','01:03:35','07:48:39',749.54,0,'03f021358f18c27b1226ed160d1dd54d'),
(130,'Earvin John','Tallod','2019-06-30','08:10:51','12:31:46','01:03:26','05:57:37',555.1,0,'03f021358f18c27b1226ed160d1dd54d'),
(131,'Elsa','Contreras','2019-06-30','06:47:25','12:31:10','01:03:20','05:57:57',638.37,0,'03f021358f18c27b1226ed160d1dd54d'),
(132,'Jeric','Macalawa','2019-06-30','06:48:23','12:31:21','01:03:30','05:57:39',637.12,0,'03f021358f18c27b1226ed160d1dd54d'),
(133,'Adam','Tabudlong','2019-06-30','06:47:34','12:31:28','01:03:48','05:57:23',637.48,0,'03f021358f18c27b1226ed160d1dd54d'),
(134,'Kenn Edward','Abiertas','2019-06-30','06:47:42','12:31:32','01:03:43','05:58:18',638.41,0,'03f021358f18c27b1226ed160d1dd54d'),
(135,'Jamille Ann','Agbuya','2019-07-01','07:43:34','12:03:33','01:47:14','05:28:37',481.36,0,'03f021358f18c27b1226ed160d1dd54d'),
(136,'Earvin John','Tallod','2019-07-01','08:13:38','12:03:40','01:32:17','05:26:26',464.18,0,'03f021358f18c27b1226ed160d1dd54d'),
(137,'Elsa','Contreras','2019-07-01','07:43:45','12:03:53','01:07:37','05:27:32',520.05,0,'03f021358f18c27b1226ed160d1dd54d'),
(138,'Jeric','Macalawa','2019-07-01','08:04:25','12:04:24','01:01:17','05:26:33',505.25,0,'03f021358f18c27b1226ed160d1dd54d'),
(139,'Adam','Tabudlong','2019-07-01','08:14:32','12:40:14','01:07:45','05:26:47',524.73,0,'03f021358f18c27b1226ed160d1dd54d'),
(140,'Kenn Edward','Abiertas','2019-07-01','08:14:41','12:03:46','01:31:51','05:26:39',463.88,0,'03f021358f18c27b1226ed160d1dd54d'),
(141,'Jamille Ann','Agbuya','2019-07-02','07:39:25','12:34:52','01:04:42','05:11:50',542.58,0,'03f021358f18c27b1226ed160d1dd54d'),
(142,'Earvin John','Tallod','2019-07-02','08:00:20','12:35:16','01:07:43','05:13:31',520.73,0,'03f021358f18c27b1226ed160d1dd54d'),
(143,'Elsa','Contreras','2019-07-02','08:08:37','12:35:05','01:03:41','05:15:14',518.02,0,'03f021358f18c27b1226ed160d1dd54d'),
(144,'Jeric','Macalawa','2019-07-02','08:08:32','12:36:50','01:29:58','05:13:37',491.95,0,'03f021358f18c27b1226ed160d1dd54d'),
(145,'Adam','Tabudlong','2019-07-02','08:08:40','12:36:07','01:05:03','05:05:03',507.45,0,'03f021358f18c27b1226ed160d1dd54d'),
(146,'Kenn Edward','Abiertas','2019-07-02','08:08:31','12:36:01','01:13:33','05:13:39',507.6,0,'03f021358f18c27b1226ed160d1dd54d'),
(147,'Jamille Ann','Agbuya','2019-07-03','07:43:42','12:22:37','01:05:01','05:09:15',523.15,0,'03f021358f18c27b1226ed160d1dd54d'),
(148,'Earvin John','Tallod','2019-07-03','08:05:23','12:08:47','01:05:55','05:09:45',487.23,0,'03f021358f18c27b1226ed160d1dd54d'),
(149,'Elsa','Contreras','2019-07-03','08:05:18','12:08:26','01:05:05','05:09:49',487.86,0,'03f021358f18c27b1226ed160d1dd54d'),
(150,'Jeric','Macalawa','2019-07-03','07:38:23','12:08:08','01:05:21','05:08:41',513.08,0,'03f021358f18c27b1226ed160d1dd54d'),
(151,'Adam','Tabudlong','2019-07-03','08:05:09','12:22:44','01:05:25','05:09:20',501.5,0,'03f021358f18c27b1226ed160d1dd54d'),
(152,'Kenn Edward','Abiertas','2019-07-03','08:05:28','12:08:36','01:05:31','05:09:35',487.2,0,'03f021358f18c27b1226ed160d1dd54d'),
(153,'Jamille Ann','Agbuya','2019-07-04','07:45:45','12:04:06','01:03:46','05:02:41',497.27,0,'03f021358f18c27b1226ed160d1dd54d'),
(154,'Elsa','Contreras','2019-07-04','08:02:11','12:04:10','01:05:08','05:05:10',482.01,0,'03f021358f18c27b1226ed160d1dd54d'),
(155,'Jeric','Macalawa','2019-07-04','07:55:38','12:03:44','01:04:06','05:03:06',487.1,0,'03f021358f18c27b1226ed160d1dd54d'),
(156,'Adam','Tabudlong','2019-07-04','08:02:05','12:04:00','01:04:37','05:01:37',478.92,0,'03f021358f18c27b1226ed160d1dd54d'),
(157,'Kenn Edward','Abiertas','2019-07-04','08:04:52','12:03:52','01:04:47','05:01:52',476.08,0,'03f021358f18c27b1226ed160d1dd54d'),
(158,'Jamille Ann','Agbuya','2019-07-05','08:02:35','12:00:53','01:09:01','05:04:58',474.25,0,'03f021358f18c27b1226ed160d1dd54d'),
(159,'Kenn Edward','Abiertas','2019-07-05','08:03:10','12:01:18','01:09:09','05:05:09',474.13,0,'03f021358f18c27b1226ed160d1dd54d'),
(160,'Jamille Ann','Agbuya','2019-07-08','07:39:14','12:01:15','01:06:06','05:09:14',505.15,0,'03f021358f18c27b1226ed160d1dd54d'),
(161,'Earvin John','Tallod','2019-07-08','07:48:00','12:00:43','01:10:05','05:08:11',490.82,0,'03f021358f18c27b1226ed160d1dd54d'),
(162,'Elsa','Contreras','2019-07-08','08:06:59','12:01:03','01:10:13','05:09:09',473,0,'03f021358f18c27b1226ed160d1dd54d'),
(163,'Jeric','Macalawa','2019-07-08','07:28:26','12:00:56','01:26:54','05:08:56',494.53,0,'03f021358f18c27b1226ed160d1dd54d'),
(164,'Adam','Tabudlong','2019-07-08','08:06:55','12:00:53','01:10:19','05:08:48',472.45,0,'03f021358f18c27b1226ed160d1dd54d'),
(165,'Kenn Edward','Abiertas','2019-07-08','08:06:50','12:00:58','01:10:10','05:08:54',472.86,0,'03f021358f18c27b1226ed160d1dd54d');

/*Table structure for table `bankaccounttbl` */

DROP TABLE IF EXISTS `bankaccounttbl`;

CREATE TABLE `bankaccounttbl` (
  `bankAccountID` int(11) NOT NULL AUTO_INCREMENT,
  `bankAccountNumber` varchar(50) NOT NULL,
  PRIMARY KEY (`bankAccountID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `bankaccounttbl` */

/*Table structure for table `benefitnumberstbl` */

DROP TABLE IF EXISTS `benefitnumberstbl`;

CREATE TABLE `benefitnumberstbl` (
  `benefitID` int(11) NOT NULL AUTO_INCREMENT,
  `sssNumber` varchar(50) NOT NULL,
  `philhealthNumber` varchar(50) NOT NULL,
  `pagibigNumber` varchar(50) NOT NULL,
  `taxIdentificationNumber` varchar(50) NOT NULL,
  PRIMARY KEY (`benefitID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `benefitnumberstbl` */

/*Table structure for table `departmenttbl` */

DROP TABLE IF EXISTS `departmenttbl`;

CREATE TABLE `departmenttbl` (
  `departmentID` int(11) NOT NULL AUTO_INCREMENT,
  `salaryCodeID` int(11) NOT NULL,
  `departmentName` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`departmentID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `departmenttbl` */

insert  into `departmenttbl`(`departmentID`,`salaryCodeID`,`departmentName`,`status`) values 
(4,1,'Administration',1),
(5,3,'Administration',1),
(6,3,'Maintenance',1),
(7,2,'Human Resources',1);

/*Table structure for table `employeetbl` */

DROP TABLE IF EXISTS `employeetbl`;

CREATE TABLE `employeetbl` (
  `employeeID` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `positionID` int(3) NOT NULL,
  `jobStatus` tinyint(1) NOT NULL,
  `dateHired` date NOT NULL,
  PRIMARY KEY (`employeeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `employeetbl` */

/*Table structure for table `eventstbl` */

DROP TABLE IF EXISTS `eventstbl`;

CREATE TABLE `eventstbl` (
  `eventID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` mediumtext NOT NULL,
  `startDate` datetime NOT NULL,
  `endDate` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`eventID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `eventstbl` */

/*Table structure for table `leavecreditstbl` */

DROP TABLE IF EXISTS `leavecreditstbl`;

CREATE TABLE `leavecreditstbl` (
  `leaveCreditsID` int(11) NOT NULL AUTO_INCREMENT,
  `employeeID` int(4) unsigned zerofill NOT NULL,
  `vacationLeave` double NOT NULL,
  `sickLeave` double NOT NULL,
  PRIMARY KEY (`leaveCreditsID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `leavecreditstbl` */

/*Table structure for table `pagibigmatrixtbl` */

DROP TABLE IF EXISTS `pagibigmatrixtbl`;

CREATE TABLE `pagibigmatrixtbl` (
  `pagibigMatrixID` int(11) NOT NULL AUTO_INCREMENT,
  `monthlyCompensationFrom` varchar(50) NOT NULL,
  `monthlyCompensationTo` varchar(50) NOT NULL,
  `employeeShare` varchar(50) NOT NULL,
  `employerShare` varchar(50) NOT NULL,
  PRIMARY KEY (`pagibigMatrixID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `pagibigmatrixtbl` */

insert  into `pagibigmatrixtbl`(`pagibigMatrixID`,`monthlyCompensationFrom`,`monthlyCompensationTo`,`employeeShare`,`employerShare`) values 
(1,'below','1500','1%','2%'),
(2,'1500','over','2%','2%');

/*Table structure for table `percentagetbl` */

DROP TABLE IF EXISTS `percentagetbl`;

CREATE TABLE `percentagetbl` (
  `percentageID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `percentage` double NOT NULL,
  PRIMARY KEY (`percentageID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `percentagetbl` */

insert  into `percentagetbl`(`percentageID`,`title`,`description`,`percentage`) values 
(1,'Regular Holiday','Kapag hindi ka pumasok',100);

/*Table structure for table `personaldetailstbl` */

DROP TABLE IF EXISTS `personaldetailstbl`;

CREATE TABLE `personaldetailstbl` (
  `personalID` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) NOT NULL,
  `middleName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) NOT NULL,
  `contactNumber` varchar(15) NOT NULL,
  `email` varchar(60) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `birthday` date NOT NULL,
  `age` int(3) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`personalID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `personaldetailstbl` */

/*Table structure for table `philhealthmatrixtbl` */

DROP TABLE IF EXISTS `philhealthmatrixtbl`;

CREATE TABLE `philhealthmatrixtbl` (
  `philhealthMatrixID` int(11) NOT NULL AUTO_INCREMENT,
  `basicSalaryFrom` varchar(50) NOT NULL,
  `basicSalaryTo` varchar(50) NOT NULL,
  `monthlyPremiumFrom` varchar(50) NOT NULL,
  `monthlyPremiumTo` varchar(50) NOT NULL,
  `personalShareFrom` varchar(50) NOT NULL,
  `personalShareTo` varchar(50) NOT NULL,
  `employerShareFrom` varchar(50) NOT NULL,
  `employerShareTo` varchar(50) NOT NULL,
  PRIMARY KEY (`philhealthMatrixID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `philhealthmatrixtbl` */

insert  into `philhealthmatrixtbl`(`philhealthMatrixID`,`basicSalaryFrom`,`basicSalaryTo`,`monthlyPremiumFrom`,`monthlyPremiumTo`,`personalShareFrom`,`personalShareTo`,`employerShareFrom`,`employerShareTo`) values 
(1,'0','10000','275','275','137.5','137.5','137.5','137.5'),
(2,'10000.01','39999.99','275.02','1099.99','137.51','549.99','137.51','549.99'),
(3,'40000','above','1100','1100','550','550','550','550');

/*Table structure for table `positiontbl` */

DROP TABLE IF EXISTS `positiontbl`;

CREATE TABLE `positiontbl` (
  `positionID` int(11) NOT NULL AUTO_INCREMENT,
  `departmentName` varchar(50) NOT NULL,
  `salaryCode` varchar(1) NOT NULL,
  `positionName` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`positionID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `positiontbl` */

insert  into `positiontbl`(`positionID`,`departmentName`,`salaryCode`,`positionName`,`status`) values 
(1,'Human Resources','2','HR Assistant',1),
(2,'Maintenance','3','Maintenance Personnel',1),
(3,'Administration','3','Admin Personnel',1);

/*Table structure for table `requestformtbl` */

DROP TABLE IF EXISTS `requestformtbl`;

CREATE TABLE `requestformtbl` (
  `requestID` int(11) NOT NULL AUTO_INCREMENT,
  `RequestType` varchar(50) DEFAULT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `Request` varchar(100) DEFAULT NULL,
  `DateFrom` date DEFAULT NULL,
  `DateTo` date DEFAULT NULL,
  `Reason` longtext,
  `DateRequest` datetime DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`requestID`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

/*Data for the table `requestformtbl` */

insert  into `requestformtbl`(`requestID`,`RequestType`,`firstName`,`lastName`,`Request`,`DateFrom`,`DateTo`,`Reason`,`DateRequest`,`status`) values 
(42,NULL,NULL,NULL,'','0000-00-00','0000-00-00','','2019-08-03 01:33:30','declined'),
(43,'OverTime Request','Eddie','Madrona','None','2019-08-09','2019-08-13','we rj rweporejl ','2019-08-03 01:54:54','declined'),
(44,'Absent Request','Bryan','Balaga','','2019-08-08','2019-08-15','asdwefweij lj kdf','2019-08-03 02:11:17','approved'),
(45,'Absent Request','Jayvie','Malaluan','','2019-08-14','2019-08-19','zxcsdcewf','2019-08-03 02:30:18','approved'),
(46,'Absent Request','Jayvie','Malaluan','','2019-08-13','2019-08-16','sdvger sdfer','2019-08-03 02:34:31','approved'),
(47,'Absent Request','Jayvie','Malaluan','','2019-08-13','2019-08-16','sdvger sdfer','2019-08-03 02:38:14','declined'),
(48,'Absent Request','Eddie','Madrona','','2019-08-07','2019-08-14','zcsdfsd','2019-08-03 02:38:40','declined'),
(49,'Absent Request','Eddie','Madrona','','2019-08-08','2019-08-20','zvsdffer  er','2019-08-03 02:40:04','approved'),
(50,'Absent Request','akdjhakjsdhakdh','askjdhakjsdh','','2019-08-14','2019-08-06','sdvsf','2019-08-03 02:42:15','declined'),
(51,'Absent Request','Eddie','Madrona',NULL,'2019-08-14','2019-08-20','vsvrgw sdvdffd','2019-08-03 02:44:52','declined'),
(52,'Absent Request','Eddie','Madrona','','2019-08-06','2019-08-15','vedfer ger','2019-08-03 02:48:28','approved'),
(53,'Absent Request','Eddie','Madrona','Bereavement','2019-08-08','2019-08-21','dvergererdgsdf','2019-08-03 02:53:21','approved'),
(54,'Absent Request','Eddie','Madrona','Vacation','2019-08-20','2019-08-22','xcvdfvdf','2019-08-03 03:14:08','approved'),
(55,'Absent Request','Eddie','Madrona','Vacation','2019-08-20','2019-08-22','xcvdfvdf','2019-08-03 03:14:56','declined'),
(56,'Absent Request','akdjhakjsdhakdh','askjdhakjsdh','Vacation','2019-08-14','2019-08-21','xdvdvss','2019-08-03 04:41:26','approved'),
(57,'Absent Request','Eddie','Madrona','Time Off Without Pay','2019-08-05','2019-08-07','zdcsdflwje epowj we','2019-08-03 05:02:55','approved');

/*Table structure for table `salarycodetbl` */

DROP TABLE IF EXISTS `salarycodetbl`;

CREATE TABLE `salarycodetbl` (
  `salaryCodeID` int(11) NOT NULL AUTO_INCREMENT,
  `salaryCode` varchar(1) NOT NULL,
  `description` mediumtext,
  `basicSalary` double(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`salaryCodeID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `salarycodetbl` */

insert  into `salarycodetbl`(`salaryCodeID`,`salaryCode`,`description`,`basicSalary`,`status`) values 
(1,'C','',24000.00,1),
(2,'B','',26000.00,1),
(3,'D','',18000.00,1);

/*Table structure for table `sssmatrixtbl` */

DROP TABLE IF EXISTS `sssmatrixtbl`;

CREATE TABLE `sssmatrixtbl` (
  `sssMatrixID` int(11) NOT NULL AUTO_INCREMENT,
  `rangeOfCompensationFrom` varchar(25) NOT NULL,
  `rangeOfCompensationTo` varchar(25) NOT NULL,
  `monthlySalaryCredit` varchar(25) NOT NULL,
  `socialSecurityEmployer` varchar(25) NOT NULL,
  `socialSecurityEmployee` varchar(25) NOT NULL,
  `socialSecurityTotal` varchar(25) NOT NULL,
  `employeeCompensationEmployer` varchar(25) NOT NULL,
  `totalContributionEmployer` varchar(25) NOT NULL,
  `totalContributionEmployee` varchar(25) NOT NULL,
  `totalContributions` varchar(25) NOT NULL,
  PRIMARY KEY (`sssMatrixID`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

/*Data for the table `sssmatrixtbl` */

insert  into `sssmatrixtbl`(`sssMatrixID`,`rangeOfCompensationFrom`,`rangeOfCompensationTo`,`monthlySalaryCredit`,`socialSecurityEmployer`,`socialSecurityEmployee`,`socialSecurityTotal`,`employeeCompensationEmployer`,`totalContributionEmployer`,`totalContributionEmployee`,`totalContributions`) values 
(1,'0 ',' 2250','2000','160','80','240','10','170','80','250'),
(2,'2250 ',' 2749.99','2500','200','100','300','10','210','100','310'),
(3,'2750 ',' 3249.99','3000','240','120','360','10','250','120','370'),
(4,'3250 ',' 3749.99','3500','280','140','420','10','290','140','430'),
(5,'3750 ',' 4249.99','4000','320','160','480','10','330','160','490'),
(6,'4250 ',' 4749.99','4500','360','180','540','10','370','180','550'),
(7,'4750 ',' 5249.99','5000','400','200','600','10','410','200','610'),
(8,'5250 ',' 5749.99','5500','440','220','660','10','450','220','670'),
(9,'5750 ',' 6249.99','6000','480','240','720','10','490','240','730'),
(10,'6250 ',' 6749.99','6500','520','260','780','10','530','260','790'),
(11,'6750 ',' 7249.99','7000','560','280','840','10','570','280','850'),
(12,'7250 ',' 7749.99','7500','600','300','900','10','610','300','910'),
(13,'7750 ',' 8249.99','8000','640','320','960','10','650','320','970'),
(14,'8250 ',' 8749.99','8500','680','340','1020.00','10','690','340','1030.00'),
(15,'8750 ',' 9249.99','9000','720','360','1080.00','10','730','360','1090.00'),
(16,'9250 ',' 9749.99','9500','760','380','1140.00','10','770','380','1150.00'),
(17,'9750 ',' 10249.99','10000','800','400','1200.00','10','810','400','1210.00'),
(18,'10250 ','10749.99','10500','840','420','1260.00','10','850','420','1270.00'),
(19,'10750 ',' 11249.99','11000','880','440','1320.00','10','890','440','1330.00'),
(20,'11250 ',' 11749.99','11500','920','460','1380.00','10','930','460','1390.00'),
(21,'11750 ',' 12249.99','12000','960','480','1440.00','10','970','480','1450.00'),
(22,'12250 ',' 12749.99','12500','1000.00','500','1500.00','10','1010.00','500','1510.00'),
(23,'12750 ',' 13249.99','13000','1040.00','520','1560.00','10','1050.00','520','1570.00'),
(24,'13250 ',' 13749.99','13500','1080.00','540','1620.00','10','1090.00','540','1630.00'),
(25,'13750 ',' 14249.99','14000','1120.00','560','1680.00','10','1130.00','560','1690.00'),
(26,'14250 ',' 14749.99','14500','1160.00','580','1740.00','10','1170.00','580','1750.00'),
(27,'14750 ',' 15249.99','15000','1200.00','600','1800.00','30','1230.00','600','1830.00'),
(28,'15250 ',' 15749.99','15500','1240.00','620','1860.00','30','1270.00','620','1890.00'),
(29,'15750 ',' 16249.99','16000','1280.00','640','1920.00','30','1310.00','640','1950.00'),
(30,'16250 ',' 16749.99','16500','1320.00','660','1980.00','30','1350.00','660','2010.00'),
(31,'16750 ',' 17249.99','17000','1360.00','680','2040.00','30','1390.00','680','2070.00'),
(32,'17250 ',' 17749.99','17500','1400.00','700','2100.00','30','1430.00','700','2130.00'),
(33,'17750 ',' 18249.99','18000','1440.00','720','2160.00','30','1470.00','720','2190.00'),
(34,'18250 ',' 18749.99','18500','1480.00','740','2220.00','30','1510.00','740','2250.00'),
(35,'18750 ',' 19249.99','19000','1520.00','760','2280.00','30','1550.00','760','2310.00'),
(36,'19250 ',' 19749.99','19500','1560.00','780','2340.00','30','1590.00','780','2370.00'),
(37,'19750 ',' over','20000','1600.00','800','2400.00','30','1630.00','800','2430.00');

/*Table structure for table `taxmatrixtbl` */

DROP TABLE IF EXISTS `taxmatrixtbl`;

CREATE TABLE `taxmatrixtbl` (
  `taxMatrixID` int(11) NOT NULL AUTO_INCREMENT,
  `compensationLevel` decimal(10,2) NOT NULL,
  `minimumWithholdingTax` decimal(10,2) NOT NULL,
  PRIMARY KEY (`taxMatrixID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `taxmatrixtbl` */

/*Table structure for table `totalhourstbl` */

DROP TABLE IF EXISTS `totalhourstbl`;

CREATE TABLE `totalhourstbl` (
  `totalhoursID` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `dateFrom` date NOT NULL,
  `dateTo` date NOT NULL,
  `totalHours` double NOT NULL,
  PRIMARY KEY (`totalhoursID`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

/*Data for the table `totalhourstbl` */

insert  into `totalhourstbl`(`totalhoursID`,`firstName`,`lastName`,`dateFrom`,`dateTo`,`totalHours`) values 
(43,'Kenn Edward','Abiertas','2019-06-11','2019-06-25',5013.88333333332),
(44,'Jamille Ann','Agbuya','2019-06-11','2019-06-25',5405.783333333329),
(45,'Julius Michael','Balingit','2019-06-11','2019-06-25',984.7333333333299),
(46,'Elsa','Contreras','2019-06-11','2019-06-25',4617.66666666668),
(47,'Jeric','Macalawa','2019-06-11','2019-06-25',4632.8),
(48,'Adam','Tabudlong','2019-06-11','2019-06-25',3621.95),
(49,'Earvin John','Tallod','2019-06-11','2019-06-25',4042.1499999999896);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
