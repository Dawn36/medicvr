/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.7.33 : Database - laravel
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`laravel` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `laravel`;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `hospitals` */

DROP TABLE IF EXISTS `hospitals`;

CREATE TABLE `hospitals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `hospital_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hospital_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hospital_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hospital_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hospital_small_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hospital_hi_rest_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primary_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `hospitals` */

insert  into `hospitals`(`id`,`user_id`,`hospital_name`,`hospital_phone`,`hospital_email`,`hospital_address`,`hospital_small_logo`,`hospital_hi_rest_logo`,`primary_color`,`secondary_color`,`deleted_at`,`created_at`,`updated_at`) values (1,1,'Ivor Keller','31','fivoaah@mailinator.com','In deserunt omnis mo','uploads/hospital/hospital-small-logo/1/202209091321l2.png','uploads/hospital/hospital-hi-rest-logo/1/202209091321l8.png','#e4581f','#cfcbf5',NULL,'2022-09-09 12:38:45','2022-09-09 13:29:58'),(2,1,'Valentine Bray','46','vulyb@mailinator.com','Voluptate ut dolorem','uploads/hospital/hospital-small-logo/1/1662741514play-button.png','uploads/hospital/hospital-hi-rest-logo/1/1662741514l3.png','#c4eee1','#461c45',NULL,'2022-09-09 04:38:34','2022-09-09 16:38:34');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_06_01_000001_create_oauth_auth_codes_table',1),(4,'2016_06_01_000002_create_oauth_access_tokens_table',1),(5,'2016_06_01_000003_create_oauth_refresh_tokens_table',1),(6,'2016_06_01_000004_create_oauth_clients_table',1),(7,'2016_06_01_000005_create_oauth_personal_access_clients_table',1),(8,'2019_08_19_000000_create_failed_jobs_table',1),(9,'2019_12_14_000001_create_personal_access_tokens_table',1),(10,'2022_04_25_175708_add_user_type_to_user',1),(11,'2022_09_08_193524_laratrust_setup_tables',1),(12,'2022_04_22_152107_create_movies_table',2),(13,'2022_09_09_115446_create_hospitals_table',3);

/*Table structure for table `oauth_access_tokens` */

DROP TABLE IF EXISTS `oauth_access_tokens`;

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_access_tokens` */

/*Table structure for table `oauth_auth_codes` */

DROP TABLE IF EXISTS `oauth_auth_codes`;

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_auth_codes` */

/*Table structure for table `oauth_clients` */

DROP TABLE IF EXISTS `oauth_clients`;

CREATE TABLE `oauth_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_clients` */

/*Table structure for table `oauth_personal_access_clients` */

DROP TABLE IF EXISTS `oauth_personal_access_clients`;

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_personal_access_clients` */

/*Table structure for table `oauth_refresh_tokens` */

DROP TABLE IF EXISTS `oauth_refresh_tokens`;

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_refresh_tokens` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

insert  into `password_resets`(`email`,`token`,`created_at`) values ('dawngill08@gmail.com','$2y$10$.GqA6dfu3Ilbiz7QrEMs..ER1D/S1Kl6H8sSHvvEYo2W.iXqnbMVG','2022-09-08 19:58:59');

/*Table structure for table `permission_role` */

DROP TABLE IF EXISTS `permission_role`;

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permission_role` */

insert  into `permission_role`(`permission_id`,`role_id`) values (1,1),(2,1),(3,1),(4,1),(1,2),(2,2),(3,2),(4,2),(5,3),(6,3),(7,4),(8,4),(9,4),(10,4);

/*Table structure for table `permission_user` */

DROP TABLE IF EXISTS `permission_user`;

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  KEY `permission_user_permission_id_foreign` (`permission_id`),
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permission_user` */

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`name`,`display_name`,`description`,`created_at`,`updated_at`) values (1,'users-create','Create Users','Create Users','2022-09-09 10:37:11','2022-09-09 10:37:11'),(2,'users-read','Read Users','Read Users','2022-09-09 10:37:11','2022-09-09 10:37:11'),(3,'users-update','Update Users','Update Users','2022-09-09 10:37:11','2022-09-09 10:37:11'),(4,'users-delete','Delete Users','Delete Users','2022-09-09 10:37:11','2022-09-09 10:37:11'),(5,'profile-read','Read Profile','Read Profile','2022-09-09 10:37:11','2022-09-09 10:37:11'),(6,'profile-update','Update Profile','Update Profile','2022-09-09 10:37:11','2022-09-09 10:37:11'),(7,'module_1_name-create','Create Module_1_name','Create Module_1_name','2022-09-09 10:37:11','2022-09-09 10:37:11'),(8,'module_1_name-read','Read Module_1_name','Read Module_1_name','2022-09-09 10:37:11','2022-09-09 10:37:11'),(9,'module_1_name-update','Update Module_1_name','Update Module_1_name','2022-09-09 10:37:11','2022-09-09 10:37:11'),(10,'module_1_name-delete','Delete Module_1_name','Delete Module_1_name','2022-09-09 10:37:11','2022-09-09 10:37:11');

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `role_user` */

DROP TABLE IF EXISTS `role_user`;

CREATE TABLE `role_user` (
  `role_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `role_user` */

insert  into `role_user`(`role_id`,`user_id`,`user_type`) values (1,1,'App\\Models\\User'),(1,21,'App\\Models\\User'),(2,3,'App\\Models\\User'),(2,4,'App\\Models\\User'),(2,11,'App\\Models\\User'),(2,12,'App\\Models\\User'),(2,13,'App\\Models\\User'),(2,20,'App\\Models\\User'),(3,5,'App\\Models\\User'),(3,7,'App\\Models\\User'),(3,8,'App\\Models\\User'),(3,14,'App\\Models\\User'),(3,15,'App\\Models\\User'),(3,16,'App\\Models\\User'),(3,17,'App\\Models\\User'),(4,6,'App\\Models\\User'),(4,9,'App\\Models\\User'),(4,10,'App\\Models\\User'),(4,18,'App\\Models\\User'),(4,19,'App\\Models\\User');

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`display_name`,`description`,`created_at`,`updated_at`) values (1,'superadmin','Superadmin','Superadmin','2022-09-09 10:37:11','2022-09-09 10:37:11'),(2,'admin','Admin','Admin','2022-09-09 10:37:11','2022-09-09 10:37:11'),(3,'teacher','Teacher','Teacher','2022-09-09 10:37:11','2022-09-09 10:37:11'),(4,'student','Student','Student','2022-09-09 10:37:11','2022-09-09 10:37:11');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) DEFAULT '0',
  `hospitals_id` bigint(20) DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_show` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'blank.png',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `unique_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`parent_id`,`hospitals_id`,`first_name`,`last_name`,`email`,`email_verified_at`,`password`,`password_show`,`address`,`city`,`phone_number`,`profile_picture`,`remember_token`,`created_at`,`updated_at`,`created_by`,`user_type`,`deleted_at`,`updated_by`,`unique_id`) values (1,0,NULL,'dawna','gill','dawngill08@gmail.com',NULL,'$2y$10$JMzjFe5R86F/MJmg6RB.J.sUdKw75GpW5rjTaE7SIhiUBycdDGXtq',NULL,'sad','sadas das','03412250984','blank.png',NULL,'2022-09-06 08:03:53','2022-09-09 11:30:34',NULL,NULL,NULL,NULL,NULL),(11,NULL,1,'Griffin','Forbes','poxucab@mailinator.com',NULL,'$2y$10$GZTkdujjPXHb0hei5a1YguRAXXYeynbGaFRjqQtpl8h.BnnSD8odq','aa',NULL,NULL,'+1 (702) 111-3664','blank.png',NULL,'2022-09-09 17:25:53','2022-09-09 17:33:02',1,'admin',NULL,1,85),(12,0,2,'Alma','Case','zopucagatu@mailinator.com',NULL,'$2y$10$a2uHNb0B8ZQdTnzylj1V.utRWlQ75jx112nuJHEgDdhyReanteoAO','aa',NULL,NULL,'+1 (958) 369-4194','blank.png',NULL,'2022-09-09 17:26:02','2022-09-09 17:26:02',1,'admin',NULL,NULL,16),(13,0,2,'Carson','Perez','liquqipu@mailinator.com',NULL,'$2y$10$s5ym1UllmIoANtudGttxfOg9ydbkSGPGeSSeb6armqTy1r8CS6KJK','a',NULL,NULL,'+1 (883) 188-1171','blank.png',NULL,'2022-09-09 17:27:32','2022-09-09 17:27:32',1,'admin',NULL,NULL,11),(14,11,1,'Lydia','David','ciciq@mailinator.com',NULL,'$2y$10$sJQzWpEg3cK1YrPHkeUQn.UGg0eXW.UXCMlu.6RpBUWGI8HNxFZiK','Pa$$w0rd!',NULL,NULL,'+1 (568) 783-1943','blank.png',NULL,'2022-09-09 17:28:41','2022-09-09 17:36:27',1,'teacher',NULL,1,98),(15,11,1,'Lois','Carr','damotyma@mailinator.com',NULL,'$2y$10$Kna1BeTygKEIql4bLEBhBew7ttoAXhfI4AoV6oDlCD7gbbEZk0e9.','Pa$$w0rd!',NULL,NULL,'+1 (853) 293-6672','blank.png',NULL,'2022-09-09 17:28:45','2022-09-09 17:33:02',1,'teacher',NULL,NULL,44),(16,12,2,'Arden','Rivera','dydatecu@mailinator.com',NULL,'$2y$10$e7kLEcxajUDhRdyVKIM5eeyuuDYYd73gM8etEUJzUEB4XAOLVHWge','Pa$$w0rd!',NULL,NULL,'+1 (257) 789-5272','blank.png',NULL,'2022-09-09 17:30:20','2022-09-09 17:30:20',1,'teacher',NULL,NULL,94),(17,12,2,'Yoshio','Anthony','tapafef@mailinator.com',NULL,'$2y$10$LHgOvzlvibA/mSNJCGpa9OgXmvk6lrHoA/FsnZcvJrFnpmJfFkSIa','Pa$$w0rd!',NULL,NULL,'+1 (108) 318-4408','blank.png',NULL,'2022-09-09 17:30:27','2022-09-09 17:30:27',1,'teacher',NULL,NULL,76),(18,15,1,'Lewis','Rivas','raxe@mailinator.com',NULL,'$2y$10$0c0UkrTlg8K1vZQl.foF8ezLdiv2hfRtMjW9Ce6PLjuLGkvHaS0uW','Pa$$w0rd!',NULL,NULL,'+1 (334) 709-7789','blank.png',NULL,'2022-09-09 17:32:13','2022-09-09 17:37:26',1,'student',NULL,1,57),(19,15,1,'Ali','Maxwell','ragimafup@mailinator.com',NULL,'$2y$10$MKhXqCsuELljh/MRTLaVEeA.RwVXWExKvc8mcMMt0mrZSZHLOf4MK','Pa$$w0rd!',NULL,NULL,'+1 (275) 891-5401','blank.png',NULL,'2022-09-09 17:32:22','2022-09-09 17:33:02',1,'student',NULL,NULL,84),(21,NULL,0,'Madonna','Greene','nopipilok@mailinator.com',NULL,'$2y$10$NHX2RE7f0oXTttMoG/xiY.eXnsHMNxwTvKZvTboGM1RKodFtJ3ljm','Pa$$w0rd!',NULL,NULL,'+1 (202) 791-6627','blank.png',NULL,'2022-09-09 18:03:12','2022-09-09 18:08:47',1,'superadmin',NULL,1,1622);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
