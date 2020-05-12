# Host: localhost  (Version 5.5.5-10.1.36-MariaDB)
# Date: 2020-05-03 00:25:22
# Generator: MySQL-Front 6.1  (Build 1.24)


#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id_user` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password_1` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `createdOn` datetime DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Data for table "users"
#

INSERT INTO `users` VALUES (1,'rodi','e04ccf6a988df161f87287cfc1687134','rodica12@yahoo.com','2020-05-03 00:17:27'),(2,'anastasia','fa17f85c91125ebe136de0a5fdd47951','anastasia324@gmail.com','2020-05-03 00:20:50');

#
# Structure for table "debates"
#

DROP TABLE IF EXISTS `debates`;
CREATE TABLE `debates` (
  `id_debate` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `subject` tinytext NOT NULL,
  `argument` tinytext NOT NULL,
  `image` blob NOT NULL,
  PRIMARY KEY (`id_debate`),
  KEY `fk_debates` (`id_user`),
  CONSTRAINT `fk_debates` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Data for table "debates"
#

INSERT INTO `debates` VALUES (1,1,'Morcovii ajuta la imbunatatirea vederii','Morcovul (Daucus carota) este o rÄƒdÄƒcinÄƒ vegetalÄƒ, de culoare oranj. Partea comestibilÄƒ a plantei este rÄƒdÄƒcina. Este o plantÄƒ bienalÄƒ, Ã®n primul an frunzele ...',X'6D6F72636F762E6A7067'),(2,2,'Primul Razboi Mondial','mda...................................',X'61746F6D69632D626F6D622D626F6D62732D6578706C6F73696F6E2D66696E676572732D77616C6C70617065722D61396130313833643531666164643862333665373138656665303831643663642E6A7067'),(3,1,'Al doilea razboi mondial','mda2.........................',X'37383870782D4A6170616E6573655F456D706972655F2D5F313934322E7376675F2E706E67'),(4,1,'cine e omul asta?','bla bla........',X'33333070782D4F7070656E6865696D65725F4C6F735F416C616D6F735F706F7274726169742E6A7067');

#
# Structure for table "react"
#

DROP TABLE IF EXISTS `react`;
CREATE TABLE `react` (
  `id_debate` int(10) unsigned NOT NULL,
  `id_user` int(10) unsigned NOT NULL,
  `rating_action` varchar(20) NOT NULL,
  KEY `fk_react1` (`id_debate`),
  KEY `fk_react2` (`id_user`),
  CONSTRAINT `fk_react1` FOREIGN KEY (`id_debate`) REFERENCES `debates` (`id_debate`),
  CONSTRAINT `fk_react2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "react"
#


#
# Structure for table "pro"
#

DROP TABLE IF EXISTS `pro`;
CREATE TABLE `pro` (
  `id_pro` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_debate` int(10) unsigned NOT NULL,
  `id_user` int(10) unsigned NOT NULL,
  `comment` tinytext NOT NULL,
  `createdOn` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pro`),
  KEY `fk_pro` (`id_debate`),
  KEY `fk_pro2` (`id_user`),
  CONSTRAINT `fk_pro` FOREIGN KEY (`id_debate`) REFERENCES `debates` (`id_debate`),
  CONSTRAINT `fk_pro2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "pro"
#


#
# Structure for table "pro_replies"
#

DROP TABLE IF EXISTS `pro_replies`;
CREATE TABLE `pro_replies` (
  `id_pro_replies` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pro` int(10) unsigned NOT NULL,
  `comment` tinytext NOT NULL,
  `createdOn` datetime DEFAULT NULL,
  `id_user` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_pro_replies`),
  KEY `fk_pro_replies` (`id_pro`),
  KEY `fk_pro2_replies` (`id_user`),
  CONSTRAINT `fk_pro2_replies` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  CONSTRAINT `fk_pro_replies` FOREIGN KEY (`id_pro`) REFERENCES `pro` (`id_pro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "pro_replies"
#


#
# Structure for table "category"
#

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id_category` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_debate` int(10) unsigned NOT NULL,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`id_category`),
  KEY `fk_category` (`id_debate`),
  CONSTRAINT `fk_category` FOREIGN KEY (`id_debate`) REFERENCES `debates` (`id_debate`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Data for table "category"
#

INSERT INTO `category` VALUES (2,1,'Mancare'),(3,2,'Razboi'),(4,3,'Razboi'),(5,4,'Muzica');

#
# Structure for table "contra"
#

DROP TABLE IF EXISTS `contra`;
CREATE TABLE `contra` (
  `id_contra` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_debate` int(10) unsigned NOT NULL,
  `id_user` int(10) unsigned NOT NULL,
  `comment` tinytext NOT NULL,
  `createdOn` datetime DEFAULT NULL,
  PRIMARY KEY (`id_contra`),
  KEY `fk_contra` (`id_debate`),
  KEY `fk_contra2` (`id_user`),
  CONSTRAINT `fk_contra` FOREIGN KEY (`id_debate`) REFERENCES `debates` (`id_debate`),
  CONSTRAINT `fk_contra2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "contra"
#


#
# Structure for table "contra_replies"
#

DROP TABLE IF EXISTS `contra_replies`;
CREATE TABLE `contra_replies` (
  `id_contra_replies` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_contra` int(10) unsigned NOT NULL,
  `id_user` int(10) unsigned NOT NULL,
  `comment` tinytext NOT NULL,
  `createdOn` datetime DEFAULT NULL,
  PRIMARY KEY (`id_contra_replies`),
  KEY `fk_contra_replies` (`id_contra`),
  KEY `fk_contra2_replies` (`id_user`),
  CONSTRAINT `fk_contra2_replies` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  CONSTRAINT `fk_contra_replies` FOREIGN KEY (`id_contra`) REFERENCES `contra` (`id_contra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "contra_replies"
#

