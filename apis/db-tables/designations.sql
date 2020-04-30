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

/*Table structure for table `designations` */

DROP TABLE IF EXISTS `designations`;

CREATE TABLE `designations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `left_amount` double NOT NULL,
  `right_amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `designations` */

insert  into `designations`(`id`,`designation`,`left_amount`,`right_amount`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Channel Partner (CP)',3850,3850,NULL,NULL,NULL),
(2,'Sales Executive (SE)',77000,77000,NULL,NULL,NULL),
(3,'Active Channel Partner (ACP)',154000,154000,NULL,NULL,NULL),
(4,'Asst. Team Leader (ATL)',385000,385000,NULL,NULL,NULL),
(5,'Team Leader( TL)',577000,577000,NULL,NULL,NULL),
(6,'Senior Team Leader (STL)',770000,770000,NULL,NULL,NULL),
(7,'Pearl Executive (PE)',1155000,1155000,NULL,NULL,NULL),
(8,'Emereld Executive (EE)',1925000,1925000,NULL,NULL,NULL),
(9,'Gold Executive (GE)',3850000,3850000,NULL,NULL,NULL),
(10,'Business Development Manager (BDM)',7700000,7700000,NULL,NULL,NULL),
(11,'Senior Business Development Manager (SBDM)',19300000,19300000,NULL,NULL,NULL),
(12,'Platinum Executive (PE)',38500000,38500000,NULL,NULL,NULL),
(13,'Diamond Executive (DE)',77000000,77000000,NULL,NULL,NULL),
(14,'Blue Diamond Executive',192500000,192500000,NULL,NULL,NULL),
(15,'Vice President',385000000,385000000,NULL,NULL,NULL),
(16,'President',770000000,770000000,NULL,NULL,NULL),
(17,'Crown President',1155000000,1155000000,NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
