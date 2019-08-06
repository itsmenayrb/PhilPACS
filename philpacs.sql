/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.3.15-MariaDB : Database - philpacs
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`philpacs` /*!40100 DEFAULT CHARACTER SET latin1 */;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `accountstbl` */

insert  into `accountstbl`(`accountID`,`personalID`,`accountType`,`username`,`password`,`dateCreated`,`status`) values 
(1,0,9,'Admin','$2y$10$4h.ghAQaqdzRhWCCk46UnesolhddLPKEKRHG./gvi3Tj6LklQ63aC','0000-00-00',9),
(2,2,1,'Jordan','$2y$10$nSJLQ0MbjbiNxbYQi46QxeOuJJvpsxWFmUrcNfHf2W85tkTLKB4l.','2019-08-01',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `addresstbl` */

insert  into `addresstbl`(`addressID`,`houseNumber`,`block`,`lot`,`street`,`subdivision`,`barangay`,`city`,`province`,`country`,`zipcode`) values 
(1,'','Block 8','Lot 6','','Green Square Villas','Mambog I','Bacoor','Cavite','Philippines',4102),
(2,'House #kj3','Block hj12','Lot 8798','77987 St.','7987','7987979817237','987mnb','b','m',3123),
(3,'House #23l','Block l1k2','Lot 98sf','f98 St.','sdf98','sd9f8sdf','sd0f98','asd98','Philippines',3123),
(4,'House #123','Block kjh','Lot h','h St.','h','h','h','h','h',3123),
(5,'House #j','Block k','Lot j','k St.','j','k','j','k','j',3123),
(6,'House #321','Block 123k','Lot k31k','k St.','k','k','k','k','Philippines',3123);

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
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`attendanceID`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

/*Data for the table `attendancetbl` */

insert  into `attendancetbl`(`attendanceID`,`firstName`,`lastName`,`Edate`,`EMTimein`,`EMTimeout`,`EATimein`,`EATimeout`,`totalMinutes`,`status`) values 
(1,'Agbuya','Jamille Ann','2019-06-18','07:43:34','12:03:33','01:47:14','05:28:37',0,''),
(2,'Agbuya','Jamille Ann','2019-06-20','07:43:42','12:22:37','01:05:01','05:09:15',0,''),
(3,'Agbuya','Jamille Ann','2019-06-21','07:45:45','12:04:06','01:03:46','05:02:41',0,''),
(4,'Agbuya','Jamille Ann','2019-06-17','06:47:10','12:31:38','01:03:35','07:48:39',0,''),
(5,'Agbuya','Jamille Ann','2019-06-13','07:25:07','12:36:36','01:06:23','05:03:47',0,''),
(6,'Agbuya','Jamille Ann','2019-06-19','07:39:25','12:34:52','01:04:42','05:11:50',0,''),
(7,'Agbuya','Jamille Ann','2019-06-24','08:02:35','12:00:53','01:09:01','05:04:58',0,''),
(8,'Agbuya','Jamille Ann','2019-06-25','07:39:14','12:01:15','01:06:06','05:09:14',0,''),
(9,'Agbuya','Jamille Ann','2019-06-11','07:39:20','12:05:16','01:00:48','05:04:35',0,''),
(10,'Agbuya','Jamille Ann','2019-06-14','07:53:38','12:56:31','01:07:19','05:38:19',0,''),
(11,'Tallod','Earvin John','2019-06-18','08:13:38','12:03:40','01:32:17','05:26:26',0,''),
(12,'Tallod','Earvin John','2019-06-19','08:00:20','12:35:16','01:07:43','05:13:31',0,''),
(13,'Tallod','Earvin John','2019-06-17','08:10:51','12:31:46','01:03:26','05:57:37',0,''),
(14,'Tallod','Earvin John','2019-06-14','08:13:17','12:02:16','01:12:46','05:38:29',0,''),
(15,'Tallod','Earvin John','2019-06-11','08:06:05','12:06:11','01:01:20','05:07:10',0,''),
(16,'Tallod','Earvin John','2019-06-25','07:48:00','12:00:43','01:10:05','05:08:11',0,''),
(17,'Tallod','Earvin John','2019-06-20','08:05:23','12:08:47','01:05:55','05:09:45',0,''),
(18,'Tallod','Earvin John','2019-06-13','07:29:51','12:37:43','01:09:18','05:04:53',0,''),
(19,'Balingit','Julius Michael','2019-06-11','07:27:10','12:05:57','01:01:02','05:08:56',0,''),
(20,'Balingit','Julius Michael','2019-06-13','07:44:35','12:37:35','01:06:49','03:51:52',0,''),
(21,'Contreras','Elsa','2019-06-25','08:06:59','12:01:03','01:10:13','05:09:09',0,''),
(22,'Contreras','Elsa','2019-06-21','08:02:11','12:04:10','01:05:08','05:05:10',0,''),
(23,'Contreras','Elsa','2019-06-18','07:43:45','12:03:53','01:07:37','05:27:32',0,''),
(24,'Contreras','Elsa','2019-06-19','08:08:37','12:35:05','01:03:41','05:15:14',0,''),
(25,'Contreras','Elsa','2019-06-20','08:05:18','12:08:26','01:05:05','05:09:49',0,''),
(26,'Contreras','Elsa','2019-06-13','08:12:44','12:36:43','01:09:25','05:05:02',0,''),
(27,'Contreras','Elsa','2019-06-14','08:13:12','12:02:36','01:08:55','05:39:18',0,''),
(28,'Contreras','Elsa','2019-06-17','06:47:25','12:31:10','01:03:20','05:57:57',0,''),
(29,'Contreras','Elsa','2019-06-11','07:55:22','12:05:27','01:00:55','05:09:48',0,''),
(30,'Macalawa','Jeric','2019-06-25','07:28:26','12:00:56','01:26:54','05:08:56',0,''),
(31,'Macalawa','Jeric','2019-06-21','07:55:38','12:03:44','01:04:06','05:03:06',0,''),
(32,'Macalawa','Jeric','2019-06-13','08:09:35','12:32:07','01:20:53','05:02:00',0,''),
(33,'Macalawa','Jeric','2019-06-17','06:48:23','12:31:21','01:03:30','05:57:39',0,''),
(34,'Macalawa','Jeric','2019-06-20','07:38:23','12:08:08','01:05:21','05:08:41',0,''),
(35,'Macalawa','Jeric','2019-06-11','07:47:57','12:05:24','01:01:09','05:09:07',0,''),
(36,'Macalawa','Jeric','2019-06-14','08:02:26','12:02:27','01:04:56','05:39:37',0,''),
(37,'Macalawa','Jeric','2019-06-18','08:04:25','12:04:24','01:01:17','05:26:33',0,''),
(38,'Macalawa','Jeric','2019-06-19','08:08:32','12:36:50','01:29:58','05:13:37',0,''),
(39,'Tabudlong','Adam','2019-06-21','08:02:05','12:04:00','01:04:37','05:01:37',0,''),
(40,'Tabudlong','Adam','2019-06-18','08:14:32','12:40:14','01:07:45','05:26:47',0,''),
(41,'Tabudlong','Adam','2019-06-17','06:47:34','12:31:28','01:03:48','05:57:23',0,''),
(42,'Tabudlong','Adam','2019-06-19','08:08:40','12:36:07','01:05:03','05:05:03',0,''),
(43,'Tabudlong','Adam','2019-06-20','08:05:09','12:22:44','01:05:25','05:09:20',0,''),
(44,'Tabudlong','Adam','2019-06-25','08:06:55','12:00:53','01:10:19','05:08:48',0,''),
(45,'Tabudlong','Adam','2019-06-11','07:55:30','12:06:14','01:01:22','05:10:03',0,''),
(46,'Abiertas','Kenn Edward','2019-06-25','08:06:50','12:00:58','01:10:10','05:08:54',0,''),
(47,'Abiertas','Kenn Edward','2019-06-17','06:47:42','12:31:32','01:03:43','05:58:18',0,''),
(48,'Abiertas','Kenn Edward','2019-06-21','08:04:52','12:03:52','01:04:47','05:01:52',0,''),
(49,'Abiertas','Kenn Edward','2019-06-11','07:55:40','12:05:46','01:01:12','05:08:53',0,''),
(50,'Abiertas','Kenn Edward','2019-06-18','08:14:41','12:03:46','01:31:51','05:26:39',0,''),
(51,'Abiertas','Kenn Edward','2019-06-14','08:13:22','12:02:30','01:12:42','05:39:27',0,''),
(52,'Abiertas','Kenn Edward','2019-06-20','08:05:28','12:08:36','01:05:31','05:09:35',0,''),
(53,'Abiertas','Kenn Edward','2019-06-13','08:12:57','12:37:46','01:09:15','05:04:28',0,''),
(54,'Abiertas','Kenn Edward','2019-06-19','08:08:31','12:36:01','01:13:33','05:13:39',0,''),
(55,'Abiertas','Kenn Edward','2019-06-24','08:03:10','12:01:18','01:09:09','05:05:09',0,'');

/*Table structure for table `bankaccounttbl` */

DROP TABLE IF EXISTS `bankaccounttbl`;

CREATE TABLE `bankaccounttbl` (
  `bankAccountID` int(11) NOT NULL AUTO_INCREMENT,
  `bankAccountNumber` varchar(50) NOT NULL,
  PRIMARY KEY (`bankAccountID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `bankaccounttbl` */

insert  into `bankaccounttbl`(`bankAccountID`,`bankAccountNumber`) values 
(1,''),
(2,''),
(3,''),
(4,''),
(5,''),
(6,'');

/*Table structure for table `benefitnumberstbl` */

DROP TABLE IF EXISTS `benefitnumberstbl`;

CREATE TABLE `benefitnumberstbl` (
  `benefitID` int(11) NOT NULL AUTO_INCREMENT,
  `sssNumber` varchar(50) NOT NULL,
  `philhealthNumber` varchar(50) NOT NULL,
  `pagibigNumber` varchar(50) NOT NULL,
  `taxIdentificationNumber` varchar(50) NOT NULL,
  PRIMARY KEY (`benefitID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `benefitnumberstbl` */

insert  into `benefitnumberstbl`(`benefitID`,`sssNumber`,`philhealthNumber`,`pagibigNumber`,`taxIdentificationNumber`) values 
(1,'','','',''),
(2,'','','',''),
(3,'','23-244323242-3','',''),
(4,'','','',''),
(5,'','','',''),
(6,'','','','');

/*Table structure for table `departmenttbl` */

DROP TABLE IF EXISTS `departmenttbl`;

CREATE TABLE `departmenttbl` (
  `departmentID` int(11) NOT NULL AUTO_INCREMENT,
  `departmentName` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`departmentID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `departmenttbl` */

insert  into `departmenttbl`(`departmentID`,`departmentName`,`status`) values 
(1,'Human Resources',1);

/*Table structure for table `employeetbl` */

DROP TABLE IF EXISTS `employeetbl`;

CREATE TABLE `employeetbl` (
  `employeeID` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `positionID` int(3) NOT NULL,
  `jobStatus` tinyint(1) NOT NULL,
  `dateHired` date NOT NULL,
  PRIMARY KEY (`employeeID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `employeetbl` */

insert  into `employeetbl`(`employeeID`,`positionID`,`jobStatus`,`dateHired`) values 
(0001,2,1,'2019-07-04'),
(0002,1,0,'2019-07-03'),
(0003,1,0,'2019-07-03'),
(0004,1,1,'2019-07-06'),
(0005,1,1,'2019-07-15'),
(0006,1,1,'2019-07-08');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `personaldetailstbl` */

insert  into `personaldetailstbl`(`personalID`,`firstName`,`middleName`,`lastName`,`contactNumber`,`email`,`gender`,`birthday`,`age`,`photo`,`status`) values 
(1,'Bryan','','Balaga','0973-823-7827','bryan.balaga@gmail.com',1,'2001-08-01',18,'../uploads/437141125421.png',1),
(2,'akdjhakjsdhakdh','aksjhdkajh','askjdhakjsdh','3918-273-1298','kasjdkajhd@gmail.com',1,'2001-07-30',18,'',0),
(3,'Eddie','','Madrona','0982-387-2738','eddie@gmail.com',1,'2001-08-01',18,'../uploads/763911eddie.jpg',1),
(4,'Jayvie','','Malaluan','0937-287-2872','lasd@gmail.com',1,'2001-08-02',18,'../uploads/6805494.jpg',1),
(5,'qweqweq','qweqe','qweqwe','0918-645-3313','austin123@gmail.com',1,'2001-08-02',18,'../uploads/5612601.jpg',1);

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
  `departmentID` int(11) NOT NULL,
  `code` varchar(1) NOT NULL,
  `positionName` varchar(50) NOT NULL,
  `basicSalary` double NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`positionID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `positiontbl` */

insert  into `positiontbl`(`positionID`,`departmentID`,`code`,`positionName`,`basicSalary`,`status`) values 
(1,1,'C','HR Assistant',25000,1),
(2,1,'B','HR Personnel',23333,1);

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
  `Reason` longtext DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

/*Data for the table `sssmatrixtbl` */

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
