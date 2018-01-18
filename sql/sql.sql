/*
SQLyog Ultimate v12.09 (32 bit)
MySQL - 5.7.18-log : Database - chat
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `messages` */

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user_send` int(11) DEFAULT NULL COMMENT 'mã người gửi',
  `fk_user_receive` int(11) DEFAULT NULL COMMENT 'mã người nhận',
  `content` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `receive` int(2) DEFAULT '0' COMMENT 'trạng thái: 1 đã đọc, 0 chưa đọc',
  `create_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `messages` */

insert  into `messages`(`id`,`fk_user_send`,`fk_user_receive`,`content`,`receive`,`create_date`) values (47,1,4,'dsfsdf',0,'2018-01-18 16:35:17'),(48,1,4,'sadasd',0,'2018-01-18 16:35:50'),(49,4,1,'ádsad',0,'2018-01-18 16:35:57'),(50,1,2,'ádsad',0,'2018-01-18 16:36:00'),(51,1,4,'ád',0,'2018-01-18 16:36:08'),(52,4,1,'utest',0,'2018-01-18 16:36:14'),(53,1,4,'sadasd',0,'2018-01-18 16:36:39'),(54,1,4,'minh1',0,'2018-01-18 16:37:00'),(55,1,4,'ZSDASD',0,'2018-01-18 16:38:03'),(56,1,4,'ÁDSA',0,'2018-01-18 16:38:14'),(57,4,1,'MINH',0,'2018-01-18 16:40:29'),(58,1,4,'ZXDASD',0,'2018-01-18 16:41:50'),(59,1,4,'TÉT]',0,'2018-01-18 16:41:52'),(60,1,4,'TÉ',0,'2018-01-18 16:41:59'),(61,1,4,'ƯER',0,'2018-01-18 16:42:25'),(62,1,4,'ƯER',0,'2018-01-18 16:42:45'),(63,1,4,'A',0,'2018-01-18 16:43:09'),(64,1,2,'DF',0,'2018-01-18 16:43:31'),(65,4,1,'SDF',0,'2018-01-18 16:43:33'),(66,1,4,'ƯER',0,'2018-01-18 16:43:38'),(67,1,4,'SDAD',0,'2018-01-18 16:44:02'),(68,4,1,'MINH',0,'2018-01-18 16:45:59'),(69,1,2,'mihn mihn mihyn sdfsd s sd mhin hmi nh mihn hm ihn hmi nh',0,'2018-01-18 17:00:47'),(70,1,4,'mihn',0,'2018-01-18 17:02:09'),(71,1,3,'loocj',0,'2018-01-18 17:04:18'),(72,1,4,'minh',0,'2018-01-18 17:08:09'),(73,4,1,'fdgdfgdf',0,'2018-01-18 17:08:12'),(74,4,3,'minh',0,'2018-01-18 17:08:17'),(75,1,2,'gfhfh',0,'2018-01-18 17:08:31'),(76,4,3,'ret',0,'2018-01-18 17:08:34');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`login_name`,`name`,`password`,`avatar`,`status`) values (1,'minh','Minh Mộng Mơ','e10adc3949ba59abbe56e057f20f883e','public\\images\\minh.jpg',1),(2,'huong','Phạm văn hưởng','e10adc3949ba59abbe56e057f20f883e','public\\images\\huong.jpg',1),(3,'loc','Lộc Lạnh Lùng','e10adc3949ba59abbe56e057f20f883e','public\\images\\loc.jpg',1),(4,'huy','Huy Hững Hờ','e10adc3949ba59abbe56e057f20f883e','public\\images\\huy.jpg',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
