/*
SQLyog Enterprise - MySQL GUI v8.03 
MySQL - 5.5.23 : Database - source_it_project
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`source_it_project` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `source_it_project`;

/*Table structure for table `answer` */

DROP TABLE IF EXISTS `answer`;

CREATE TABLE `answer` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `answer` text NOT NULL,
  `trueAnswer` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `answer` */

/*Table structure for table `article` */

DROP TABLE IF EXISTS `article`;

CREATE TABLE `article` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(70) NOT NULL,
  `description` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `article` */

insert  into `article`(`id`,`title`,`description`,`created_at`) values (1,'Sample title1','Sample description','2015-11-13 02:00:50'),(2,'Sample title2','Sample description','2015-11-13 02:00:50'),(3,'Sample title3','Sample description','2015-11-13 02:00:50'),(4,'Sample title4','Sample description','2015-11-13 02:00:50'),(5,'Sample title5','Sample description','2015-11-13 02:00:50'),(6,'Sample title6','Sample description','2015-11-13 02:00:50'),(7,'Sample title7','Sample description','2015-11-13 02:00:50'),(8,'Sample title8','Sample description','2015-11-13 02:00:50'),(9,'Sample title9','Sample description','2015-11-13 02:00:50'),(10,'Sample title10','Sample description','2015-11-13 02:00:50'),(11,'Sample title11','Sample description','2015-11-13 02:00:50'),(12,'Sample title12','Sample description','2015-11-13 02:00:50'),(13,'Sample title13','Sample description','2015-11-13 02:00:50'),(14,'Sample title14','Sample description','2015-11-13 02:00:50'),(15,'Sample title15','Sample description','2015-11-13 02:00:50'),(16,'Sample title16','Sample description','2015-11-13 02:00:50');

/*Table structure for table `article_tag` */

DROP TABLE IF EXISTS `article_tag`;

CREATE TABLE `article_tag` (
  `article_id` int(50) NOT NULL,
  `tag_id` int(50) NOT NULL,
  KEY `article_id` (`article_id`),
  KEY `tag_id` (`tag_id`),
  CONSTRAINT `FK_article_tag_article` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_article_tag_tag` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `article_tag` */

insert  into `article_tag`(`article_id`,`tag_id`) values (1,8),(1,4),(1,12),(1,4),(2,4),(2,8),(2,1),(2,4),(3,6),(3,12),(4,1),(4,12),(4,2),(5,2),(5,3),(6,3),(6,2),(6,7),(7,7),(7,5),(7,9),(8,8),(8,13),(8,14),(9,13),(9,14),(9,1),(10,4),(10,9),(11,12),(12,11),(12,13),(13,14),(14,10),(14,9),(15,9),(15,8),(16,7),(16,13);

/*Table structure for table `gallery` */

DROP TABLE IF EXISTS `gallery`;

CREATE TABLE `gallery` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(70) NOT NULL,
  `description` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `gallery` */

insert  into `gallery`(`id`,`title`,`description`,`created_at`) values (3,'fsdf','fsdf','2015-11-08 13:42:14');

/*Table structure for table `question` */

DROP TABLE IF EXISTS `question`;

CREATE TABLE `question` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `question` */

/*Table structure for table `question_answer` */

DROP TABLE IF EXISTS `question_answer`;

CREATE TABLE `question_answer` (
  `question_id` int(5) NOT NULL,
  `answer_id` int(5) NOT NULL,
  KEY `FK_question_answer_answer` (`answer_id`),
  KEY `question_answer` (`question_id`,`answer_id`),
  KEY `FK_question_answer_question` (`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `question_answer` */

/*Table structure for table `role` */

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `role` */

insert  into `role`(`id`,`role`) values (1,'admin'),(2,'editor'),(3,'user');

/*Table structure for table `tags` */

DROP TABLE IF EXISTS `tags`;

CREATE TABLE `tags` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `tag` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `tags` */

insert  into `tags`(`id`,`tag`) values (1,'JavaScript'),(2,'WordPress'),(3,'Joomla'),(4,'HTML'),(5,'CSS'),(6,'AJAX'),(7,'C++'),(8,'C#'),(9,'JSON'),(10,'paint'),(11,'Adobe'),(12,'Visual studio'),(13,'PHP'),(14,'MYSQL');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`id`,`firstname`,`lastname`,`email`,`password`,`phone`,`created_at`) values (2,'Kate','Moss','kate.moss@mail.ru','12345','12345','2015-11-08 19:09:41'),(5,'sadfasd','asdas','asd','12345','asd','2015-11-08 19:15:40');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
