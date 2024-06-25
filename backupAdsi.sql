/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.28-MariaDB : Database - adsi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`adsi` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `adsi`;

/*Table structure for table `libros` */

DROP TABLE IF EXISTS `libros`;

CREATE TABLE `libros` (
  `lib_id` int(11) NOT NULL,
  `lib_nombre` varchar(100) DEFAULT NULL,
  `lib_autor` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`lib_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `libros` */

insert  into `libros`(`lib_id`,`lib_nombre`,`lib_autor`) values 
(101,'PHP puro','Cesar Yepez'),
(102,'Java Lovers','Cesar Yepez'),
(103,'Base de datos','Katherine');

/*Table structure for table `prestamos` */

DROP TABLE IF EXISTS `prestamos`;

CREATE TABLE `prestamos` (
  `pres_id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_prestamo` date DEFAULT NULL,
  `fecha_devolucion` date DEFAULT NULL,
  `usu_idFK` int(11) DEFAULT NULL,
  `lib_idFK` int(11) DEFAULT NULL,
  PRIMARY KEY (`pres_id`),
  KEY `usu_idFK` (`usu_idFK`),
  KEY `lib_idFK` (`lib_idFK`),
  CONSTRAINT `prestamos_ibfk_1` FOREIGN KEY (`usu_idFK`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `prestamos_ibfk_2` FOREIGN KEY (`lib_idFK`) REFERENCES `libros` (`lib_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `prestamos` */

insert  into `prestamos`(`pres_id`,`fecha_prestamo`,`fecha_devolucion`,`usu_idFK`,`lib_idFK`) values 
(1,'2024-06-11',NULL,1098123987,101),
(2,'2024-06-11',NULL,1095675992,102),
(9,'2024-06-18',NULL,1095675992,101);

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `clave` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1098123988 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id`,`nombre`,`usuario`,`clave`) values 
(1095675992,'Claudia Rodriguez','adsi2','clave2'),
(1098123987,'Carlos Gomez','adsi1','clave1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
