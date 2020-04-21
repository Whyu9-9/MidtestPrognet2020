/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 8.0.13 : Database - latihanlaravel
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`latihanlaravel` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */;

USE `latihanlaravel`;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `games` */

DROP TABLE IF EXISTS `games`;

CREATE TABLE `games` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `judul_game` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `games` */

insert  into `games`(`id`,`judul_game`,`deskripsi`,`created_at`,`updated_at`) values 
(1,'GTA','wow CJ','2020-04-21 06:14:05','2020-04-21 06:16:30'),
(2,'Naruto','wow','2020-04-21 06:23:59','2020-04-21 06:23:59'),
(3,'One Piece','wowww','2020-04-21 06:24:05','2020-04-21 06:24:05'),
(4,'Basara','wowwwwww','2020-04-21 06:24:16','2020-04-21 06:24:16');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2020_04_20_124018_create_playstations_table',1),
(5,'2020_04_20_124228_create_games_table',1),
(6,'2020_04_20_125716_create_rents_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `playstations` */

DROP TABLE IF EXISTS `playstations`;

CREATE TABLE `playstations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `jenis_ps` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `playstations` */

insert  into `playstations`(`id`,`jenis_ps`,`deskripsi`,`created_at`,`updated_at`) values 
(1,'Playstation 5','Wow suge','2020-04-21 06:13:10','2020-04-21 06:16:18'),
(2,'Playstation 4 Batch 1','wow','2020-04-21 11:55:01','2020-04-21 11:55:01');

/*Table structure for table `rent_details` */

DROP TABLE IF EXISTS `rent_details`;

CREATE TABLE `rent_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `games_id` int(10) unsigned NOT NULL,
  `rentid` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rent_details_games_id_foreign` (`games_id`),
  KEY `rentid` (`rentid`),
  CONSTRAINT `rent_details_games_id_foreign` FOREIGN KEY (`games_id`) REFERENCES `games` (`id`),
  CONSTRAINT `rent_details_ibfk_1` FOREIGN KEY (`rentid`) REFERENCES `rents` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `rent_details` */

insert  into `rent_details`(`id`,`games_id`,`rentid`,`created_at`,`updated_at`) values 
(11,2,12,'2020-04-21 10:53:24','2020-04-21 10:53:24'),
(12,1,13,'2020-04-21 10:54:48','2020-04-21 10:54:48'),
(13,2,13,'2020-04-21 10:54:48','2020-04-21 10:54:48'),
(14,1,14,'2020-04-21 11:55:10','2020-04-21 11:55:10'),
(15,2,14,'2020-04-21 11:55:10','2020-04-21 11:55:10'),
(16,3,14,'2020-04-21 11:55:10','2020-04-21 11:55:10'),
(17,4,14,'2020-04-21 11:55:10','2020-04-21 11:55:10'),
(18,1,15,'2020-04-21 11:57:28','2020-04-21 11:57:28'),
(19,2,15,'2020-04-21 11:57:28','2020-04-21 11:57:28'),
(20,3,15,'2020-04-21 11:57:29','2020-04-21 11:57:29');

/*Table structure for table `rents` */

DROP TABLE IF EXISTS `rents`;

CREATE TABLE `rents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ps_id` int(10) unsigned NOT NULL,
  `start_sewa` datetime NOT NULL,
  `finish_sewa` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rents_ps_id_foreign` (`ps_id`),
  CONSTRAINT `rents_ps_id_foreign` FOREIGN KEY (`ps_id`) REFERENCES `playstations` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `rents` */

insert  into `rents`(`id`,`ps_id`,`start_sewa`,`finish_sewa`,`created_at`,`updated_at`) values 
(12,1,'2020-04-22 00:00:00','2020-04-23 00:00:00','2020-04-21 10:53:24','2020-04-21 10:53:24'),
(13,1,'2020-04-22 00:00:00','2020-04-22 00:00:00','2020-04-21 10:54:47','2020-04-21 10:54:47'),
(14,2,'2020-04-22 00:00:00','2020-04-23 00:00:00','2020-04-21 11:55:10','2020-04-21 11:55:10'),
(15,2,'2020-04-23 00:00:00','2020-04-24 00:00:00','2020-04-21 11:57:28','2020-04-21 11:57:28');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Admin','Admin@gmail.com',NULL,'$2y$10$NphaP3seqJzSzw7nOST/nO5/Al/h45CXsOj4vKZj0GEJC91eVPIP2',NULL,'2020-04-21 06:12:12','2020-04-21 06:12:12');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
