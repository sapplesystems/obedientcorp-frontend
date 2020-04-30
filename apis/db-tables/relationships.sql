/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 5.6.47 : Database - obedient_dev
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`obedient_dev` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `obedient_dev`;

/*Table structure for table `relationships` */

DROP TABLE IF EXISTS `relationships`;

CREATE TABLE `relationships` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `relationships` */

insert  into `relationships`(`id`,`name`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Mother',NULL,NULL,NULL),
(2,'Father',NULL,NULL,NULL),
(3,'Daughter',NULL,NULL,NULL),
(4,'Son',NULL,NULL,NULL),
(5,'Sister',NULL,NULL,NULL),
(6,'Brother',NULL,NULL,NULL),
(7,'Aunt',NULL,NULL,NULL),
(8,'Uncle',NULL,NULL,NULL),
(9,'Niece',NULL,NULL,NULL),
(10,'Nephew',NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
