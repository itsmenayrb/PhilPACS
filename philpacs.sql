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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `accountstbl` */

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
(1,'Bryan','','Balaga','0907-068-0221','bryan.balaga@gmail.com',1,'1995-08-28',23,'../uploads/959464bry.jpg',1),
(2,'Eddie','','Madrona','0973-817-3812','eddie@gmail.com',1,'2001-07-12',18,'../uploads/672753eddie.jpg',1),
(3,'Kyle','Vincent','Dela Cruz','0983-727-3827','kyle@gmail.com',1,'2001-07-10',18,'../uploads/134382kyle.jpg',1),
(4,'Ken','','Manalang','3123-221-1333','ken@gmail.com',1,'2001-07-12',18,'',1),
(5,'Jayvie','','Malaluan','3912-812-9383','jayv@gmail.com',1,'2001-07-09',18,'../uploads/4651013-32508_server-clipart-images-pictures-transparent-web-server-icon.png',1),
(6,'Apple Rose','Gabales','Balaga','0932-823-8372','apple@gmail.com',1,'2001-07-12',18,'../uploads/859511bry.jpg',1);

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
(1,'0 ',' 2,250','2000.00','160.00','80.00','240.00','10.00','170.00','80.00','250.00'),
(2,'2,250 ',' 2,749.99','2500.00','200.00','100.00','300.00','10.00','210.00','100.00','310.00'),
(3,'2,750 ',' 3,249.99','3000.00','240.00','120.00','360.00','10.00','250.00','120.00','370.00'),
(4,'3,250 ',' 3,749.99','3500.00','280.00','140.00','420.00','10.00','290.00','140.00','430.00'),
(5,'3,750 ',' 4,249.99','4000.00','320.00','160.00','480.00','10.00','330.00','160.00','490.00'),
(6,'4,250 ',' 4,749.99','4500.00','360.00','180.00','540.00','10.00','370.00','180.00','550.00'),
(7,'4,750 ',' 5,249.99','5000.00','400.00','200.00','600.00','10.00','410.00','200.00','610.00'),
(8,'5,250 ',' 5,749.99','5500.00','440.00','220.00','660.00','10.00','450.00','220.00','670.00'),
(9,'5,750 ',' 6,249.99','6000.00','480.00','240.00','720.00','10.00','490.00','240.00','730.00'),
(10,'6,250 ',' 6,749.99','6500.00','520.00','260.00','780.00','10.00','530.00','260.00','790.00'),
(11,'6,750 ',' 7,249.99','7000.00','560.00','280.00','840.00','10.00','570.00','280.00','850.00'),
(12,'7,250 ',' 7,749.99','7500.00','600.00','300.00','900.00','10.00','610.00','300.00','910.00'),
(13,'7,750 ',' 8,249.99','8000.00','640.00','320.00','960.00','10.00','650.00','320.00','970.00'),
(14,'8,250 ',' 8,749.99','8500.00','680.00','340.00','1,020.00','10.00','690.00','340.00','1,030.00'),
(15,'8,750 ',' 9,249.99','9000.00','720.00','360.00','1,080.00','10.00','730.00','360.00','1,090.00'),
(16,'9,250 ',' 9,749.99','9500.00','760.00','380.00','1,140.00','10.00','770.00','380.00','1,150.00'),
(17,'9,750 ',' 10,249.99','10000.00','800.00','400.00','1,200.00','10.00','810.00','400.00','1,210.00'),
(18,'10,250 ','10,749.99','10500.00','840.00','420.00','1,260.00','10.00','850.00','420.00','1,270.00'),
(19,'10,750 ',' 11,249.99','11000.00','880.00','440.00','1,320.00','10.00','890.00','440.00','1,330.00'),
(20,'11,250 ',' 11,749.99','11500.00','920.00','460.00','1,380.00','10.00','930.00','460.00','1,390.00'),
(21,'11,750 ',' 12,249.99','12000.00','960.00','480.00','1,440.00','10.00','970.00','480.00','1,450.00'),
(22,'12,250 ',' 12,749.99','12500.00','1,000.00','500.00','1,500.00','10.00','1,010.00','500.00','1,510.00'),
(23,'12,750 ',' 13,249.99','13000.00','1,040.00','520.00','1,560.00','10.00','1,050.00','520.00','1,570.00'),
(24,'13,250 ',' 13,749.99','13500.00','1,080.00','540.00','1,620.00','10.00','1,090.00','540.00','1,630.00'),
(25,'13,750 ',' 14,249.99','14000.00','1,120.00','560.00','1,680.00','10.00','1,130.00','560.00','1,690.00'),
(26,'14,250 ',' 14,749.99','14500.00','1,160.00','580.00','1,740.00','10.00','1,170.00','580.00','1,750.00'),
(27,'14,750 ',' 15,249.99','15000.00','1,200.00','600.00','1,800.00','30.00','1,230.00','600.00','1,830.00'),
(28,'15,250 ',' 15,749.99','15500.00','1,240.00','620.00','1,860.00','30.00','1,270.00','620.00','1,890.00'),
(29,'15,750 ',' 16,249.99','16000.00','1,280.00','640.00','1,920.00','30.00','1,310.00','640.00','1,950.00'),
(30,'16,250 ',' 16,749.99','16500.00','1,320.00','660.00','1,980.00','30.00','1,350.00','660.00','2,010.00'),
(31,'16,750 ',' 17,249.99','17000.00','1,360.00','680.00','2,040.00','30.00','1,390.00','680.00','2,070.00'),
(32,'17,250 ',' 17,749.99','17500.00','1,400.00','700.00','2,100.00','30.00','1,430.00','700.00','2,130.00'),
(33,'17,750 ',' 18,249.99','18000.00','1,440.00','720.00','2,160.00','30.00','1,470.00','720.00','2,190.00'),
(34,'18,250 ',' 18,749.99','18500.00','1,480.00','740.00','2,220.00','30.00','1,510.00','740.00','2,250.00'),
(35,'18,750 ',' 19,249.99','19000.00','1,520.00','760.00','2,280.00','30.00','1,550.00','760.00','2,310.00'),
(36,'19,250 ',' 19,749.99','19500.00','1,560.00','780.00','2,340.00','30.00','1,590.00','780.00','2,370.00'),
(37,'19,750 ',' over','20000.00','1,600.00','800.00','2,400.00','30.00','1,630.00','800.00','2,430.00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
