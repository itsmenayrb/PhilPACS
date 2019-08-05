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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `addresstbl` */

insert  into `addresstbl`(`addressID`,`houseNumber`,`block`,`lot`,`street`,`subdivision`,`barangay`,`city`,`province`,`country`,`zipcode`) values 
(1,'House #l','','Lot l','l St. St. ','l','l','l','l','Philippines',3123),
(2,'House #kjh','Block kjh','Lot h','h St.','h','h','h','h','Philippines',232),
(3,'House #l','','Lot l','l St. St.','l','l','l','d','Philippines',3123),
(4,'House #k','Block k','Lot k','k St.','k','k','k','k','Philippines',3123),
(5,'House #l','','Lot l','l St. St. ','l','l','l','l','Philippines',3123),
(6,'House #l','Block l','Lot l','l St.','l','l','l','l','Philippines',3123),
(7,'House #i','','Lot k','k St. St.','k','k','k','k','Philippines',3123),
(8,'','Block j','Lot j','j St.','j','j','j','j','Philippines',3213);

/*Table structure for table `bankaccounttbl` */

DROP TABLE IF EXISTS `bankaccounttbl`;

CREATE TABLE `bankaccounttbl` (
  `bankAccountID` int(11) NOT NULL AUTO_INCREMENT,
  `bankAccountNumber` varchar(50) NOT NULL,
  PRIMARY KEY (`bankAccountID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `bankaccounttbl` */

insert  into `bankaccounttbl`(`bankAccountID`,`bankAccountNumber`) values 
(1,'8172-3871-26'),
(2,''),
(3,'3981-9283-78'),
(4,''),
(5,''),
(6,''),
(7,'1238-2737-21'),
(8,'');

/*Table structure for table `benefitnumberstbl` */

DROP TABLE IF EXISTS `benefitnumberstbl`;

CREATE TABLE `benefitnumberstbl` (
  `benefitID` int(11) NOT NULL AUTO_INCREMENT,
  `sssNumber` varchar(50) NOT NULL,
  `philhealthNumber` varchar(50) NOT NULL,
  `pagibigNumber` varchar(50) NOT NULL,
  `taxIdentificationNumber` varchar(50) NOT NULL,
  PRIMARY KEY (`benefitID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `benefitnumberstbl` */

insert  into `benefitnumberstbl`(`benefitID`,`sssNumber`,`philhealthNumber`,`pagibigNumber`,`taxIdentificationNumber`) values 
(1,'21-8371823-7','87-618723671-2','8172-6387-1638','328-173-718-223'),
(2,'','','',''),
(3,'','','',''),
(4,'','','',''),
(5,'21-8371823-7','87-618723671-2','8172-6387-1638','187-263-721-863'),
(6,'','','',''),
(7,'','','',''),
(8,'','','','');

/*Table structure for table `departmenttbl` */

DROP TABLE IF EXISTS `departmenttbl`;

CREATE TABLE `departmenttbl` (
  `departmentID` int(11) NOT NULL AUTO_INCREMENT,
  `departmentName` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`departmentID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `departmenttbl` */

insert  into `departmenttbl`(`departmentID`,`departmentName`,`status`) values 
(1,'Human Resources',1),
(2,'Administration',1),
(3,'Maintenance',1);

/*Table structure for table `employeetbl` */

DROP TABLE IF EXISTS `employeetbl`;

CREATE TABLE `employeetbl` (
  `employeeID` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `positionID` int(3) NOT NULL,
  `jobStatus` tinyint(1) NOT NULL,
  `dateHired` date NOT NULL,
  PRIMARY KEY (`employeeID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `employeetbl` */

insert  into `employeetbl`(`employeeID`,`positionID`,`jobStatus`,`dateHired`) values 
(0001,1,1,'2019-08-01'),
(0002,3,1,'2019-08-01'),
(0003,1,1,'2019-08-01'),
(0004,2,0,'2019-08-01'),
(0005,1,1,'2019-08-01'),
(0006,2,0,'2019-08-01'),
(0007,1,1,'2019-08-01'),
(0008,2,1,'2019-08-01');

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
  `monthlyCompensationFrom` decimal(10,2) NOT NULL,
  `monthlyCompensationTo` decimal(10,2) NOT NULL,
  `employeeShare` decimal(10,2) NOT NULL,
  `employerShare` decimal(10,2) NOT NULL,
  PRIMARY KEY (`pagibigMatrixID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `pagibigmatrixtbl` */

insert  into `pagibigmatrixtbl`(`pagibigMatrixID`,`monthlyCompensationFrom`,`monthlyCompensationTo`,`employeeShare`,`employerShare`) values 
(1,0.00,1500.00,1.00,2.00),
(2,1500.00,0.00,2.00,2.00);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `personaldetailstbl` */

insert  into `personaldetailstbl`(`personalID`,`firstName`,`middleName`,`lastName`,`contactNumber`,`email`,`gender`,`birthday`,`age`,`photo`,`status`) values 
(1,'Jayvie','','Malaluan','1230-928-1309','bryan@gmail.com',1,'2001-08-01',18,'../uploads/8321554.jpg',1),
(2,'Jordan','','Michael','3219-301-2391','jordan@gmail.com',1,'2001-07-07',18,'',1),
(3,'Ken','','Manalang','0973-827-3821','ken@gmail.com',1,'2001-08-01',18,'../uploads/889620cert-app-logo.png',1),
(4,'Bryan','','Balags','0938-273-8237','basdas@gmail.com',1,'2001-02-13',18,'../uploads/560165bry.jpg',0),
(5,'Jayvie','','Malaluan','1230-928-1309','bryan@gmail.com',1,'2001-08-01',18,'../uploads/3689561_w0lwbyqymmphmmtu5npzja.png',1),
(6,'Eddie','','Madrona','0983-712-3812','edd@gmail.com',1,'2001-06-06',18,'',1),
(7,'Gab','','Riel','3128-372-1897','gab@gmail.com',1,'2001-08-01',18,'../uploads/6680424.jpg',1),
(8,'akjdhaksjdh','kajshdkjh','aksjdhaksjdh','3128-321-8773','asdkjahsdk@gmail.com',1,'2001-07-30',18,'',0);

/*Table structure for table `philhealthmatrixtbl` */

DROP TABLE IF EXISTS `philhealthmatrixtbl`;

CREATE TABLE `philhealthmatrixtbl` (
  `philhealthMatrixID` int(11) NOT NULL AUTO_INCREMENT,
  `basicSalaryFrom` decimal(10,2) NOT NULL,
  `basicSalaryTo` decimal(10,2) NOT NULL,
  `monthlyPremiumFrom` decimal(10,2) NOT NULL,
  `monthlyPremiumTo` decimal(10,2) NOT NULL,
  `personalShareFrom` decimal(10,2) NOT NULL,
  `personalShareTo` decimal(10,2) NOT NULL,
  `employerShareFrom` decimal(10,2) NOT NULL,
  `employerShareTo` decimal(10,2) NOT NULL,
  PRIMARY KEY (`philhealthMatrixID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `philhealthmatrixtbl` */

insert  into `philhealthmatrixtbl`(`philhealthMatrixID`,`basicSalaryFrom`,`basicSalaryTo`,`monthlyPremiumFrom`,`monthlyPremiumTo`,`personalShareFrom`,`personalShareTo`,`employerShareFrom`,`employerShareTo`) values 
(1,0.00,10000.00,275.00,275.00,137.50,137.50,137.50,137.50),
(2,10000.01,39999.99,275.02,1099.99,137.51,549.99,137.51,549.99),
(3,40000.00,0.00,1100.00,1100.00,550.00,550.00,550.00,550.00);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `positiontbl` */

insert  into `positiontbl`(`positionID`,`departmentID`,`code`,`positionName`,`basicSalary`,`status`) values 
(1,1,'C','HR Assistant',25000,1),
(2,1,'B','HR Personnel',23333,1),
(3,2,'B','Administrative Staff',19000,1);

/*Table structure for table `sssmatrixtbl` */

DROP TABLE IF EXISTS `sssmatrixtbl`;

CREATE TABLE `sssmatrixtbl` (
  `sssMatrixID` int(11) NOT NULL AUTO_INCREMENT,
  `rangeOfCompensationFrom` double(10,2) NOT NULL,
  `rangeOfCompensationTo` double(10,2) NOT NULL,
  `monthlySalaryCredit` double(10,2) NOT NULL,
  `socialSecurityEmployer` double(10,2) NOT NULL,
  `socialSecurityEmployee` double(10,2) NOT NULL,
  `socialSecurityTotal` double(10,2) NOT NULL,
  `employeeCompensationEmployer` double(10,2) NOT NULL,
  `totalContributionEmployer` double(10,2) NOT NULL,
  `totalContributionEmployee` double(10,2) NOT NULL,
  `totalContributions` double(10,2) NOT NULL,
  PRIMARY KEY (`sssMatrixID`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

/*Data for the table `sssmatrixtbl` */

insert  into `sssmatrixtbl`(`sssMatrixID`,`rangeOfCompensationFrom`,`rangeOfCompensationTo`,`monthlySalaryCredit`,`socialSecurityEmployer`,`socialSecurityEmployee`,`socialSecurityTotal`,`employeeCompensationEmployer`,`totalContributionEmployer`,`totalContributionEmployee`,`totalContributions`) values 
(1,0.00,2250.00,2000.00,160.00,80.00,240.00,10.00,170.00,80.00,250.00),
(2,2250.00,2749.99,2500.00,200.00,100.00,300.00,10.00,210.00,100.00,310.00),
(3,2750.00,3249.99,3000.00,240.00,120.00,360.00,10.00,250.00,120.00,370.00),
(4,3250.00,3749.99,3500.00,280.00,140.00,420.00,10.00,290.00,140.00,430.00),
(5,3750.00,4249.99,4000.00,320.00,160.00,480.00,10.00,330.00,160.00,490.00),
(6,4250.00,4749.99,4500.00,360.00,180.00,540.00,10.00,370.00,180.00,550.00),
(7,4750.00,5249.99,5000.00,400.00,200.00,600.00,10.00,410.00,200.00,610.00),
(8,5250.00,5749.99,5500.00,440.00,220.00,660.00,10.00,450.00,220.00,670.00),
(9,5750.00,6249.99,6000.00,480.00,240.00,720.00,10.00,490.00,240.00,730.00),
(10,6250.00,6749.99,6500.00,520.00,260.00,780.00,10.00,530.00,260.00,790.00),
(11,6750.00,7249.99,7000.00,560.00,280.00,840.00,10.00,570.00,280.00,850.00),
(12,7250.00,7749.99,7500.00,600.00,300.00,900.00,10.00,610.00,300.00,910.00),
(13,7750.00,8249.99,8000.00,640.00,320.00,960.00,10.00,650.00,320.00,970.00),
(14,8250.00,8749.99,8500.00,680.00,340.00,1020.00,10.00,690.00,340.00,1030.00),
(15,8750.00,9249.99,9000.00,720.00,360.00,1080.00,10.00,730.00,360.00,1090.00),
(16,9250.00,9749.99,9500.00,760.00,380.00,1140.00,10.00,770.00,380.00,1150.00),
(17,9750.00,10249.99,10000.00,800.00,400.00,1200.00,10.00,810.00,400.00,1210.00),
(18,10250.00,10749.99,10500.00,840.00,420.00,1260.00,10.00,850.00,420.00,1270.00),
(19,10750.00,11249.99,11000.00,880.00,440.00,1320.00,10.00,890.00,440.00,1330.00),
(20,11250.00,11749.99,11500.00,920.00,460.00,1380.00,10.00,930.00,460.00,1390.00),
(21,11750.00,12249.99,12000.00,960.00,480.00,1440.00,10.00,970.00,480.00,1450.00),
(22,12250.00,12749.99,12500.00,1000.00,500.00,1500.00,10.00,1010.00,500.00,1510.00),
(23,12750.00,13249.99,13000.00,1040.00,520.00,1560.00,10.00,1050.00,520.00,1570.00),
(24,13250.00,13749.99,13500.00,1080.00,540.00,1620.00,10.00,1090.00,540.00,1630.00),
(25,13750.00,14249.99,14000.00,1120.00,560.00,1680.00,10.00,1130.00,560.00,1690.00),
(26,14250.00,14749.99,14500.00,1160.00,580.00,1740.00,10.00,1170.00,580.00,1750.00),
(27,14750.00,15249.99,15000.00,1200.00,600.00,1800.00,30.00,1230.00,600.00,1830.00),
(28,15250.00,15749.99,15500.00,1240.00,620.00,1860.00,30.00,1270.00,620.00,1890.00),
(29,15750.00,16249.99,16000.00,1280.00,640.00,1920.00,30.00,1310.00,640.00,1950.00),
(30,16250.00,16749.99,16500.00,1320.00,660.00,1980.00,30.00,1350.00,660.00,2010.00),
(31,16750.00,17249.99,17000.00,1360.00,680.00,2040.00,30.00,1390.00,680.00,2070.00),
(32,17250.00,17749.99,17500.00,1400.00,700.00,2100.00,30.00,1430.00,700.00,2130.00),
(33,17750.00,18249.99,18000.00,1440.00,720.00,2160.00,30.00,1470.00,720.00,2190.00),
(34,18250.00,18749.99,18500.00,1480.00,740.00,2220.00,30.00,1510.00,740.00,2250.00),
(35,18750.00,19249.99,19000.00,1520.00,760.00,2280.00,30.00,1550.00,760.00,2310.00),
(36,19250.00,19749.99,19500.00,1560.00,780.00,2340.00,30.00,1590.00,780.00,2370.00),
(37,19750.00,0.00,20000.00,1600.00,800.00,2400.00,30.00,1630.00,800.00,2430.00);

/*Table structure for table `taxmatrixtbl` */

DROP TABLE IF EXISTS `taxmatrixtbl`;

CREATE TABLE `taxmatrixtbl` (
  `taxMatrixID` int(11) NOT NULL AUTO_INCREMENT,
  `compensationLevel` decimal(10,2) NOT NULL,
  `minimumWithholdingTax` decimal(10,2) NOT NULL,
  PRIMARY KEY (`taxMatrixID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `taxmatrixtbl` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
