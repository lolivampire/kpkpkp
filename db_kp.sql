/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.24-MariaDB : Database - db_kp
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_kp` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_kp`;

/*Table structure for table `detail_user` */

DROP TABLE IF EXISTS `detail_user`;

CREATE TABLE `detail_user` (
  `id_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(10) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jk` varchar(2) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `id_kelas` varchar(10) DEFAULT NULL,
  `absen` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id_detail`),
  KEY `id_user` (`id_user`),
  KEY `id_kelas` (`id_kelas`),
  CONSTRAINT `detail_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  CONSTRAINT `detail_user_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

/*Data for the table `detail_user` */

insert  into `detail_user`(`id_detail`,`id_user`,`nama`,`jk`,`tgl_lahir`,`id_kelas`,`absen`) values 
(1,'2501','ABDULLAH AZZAM AL-KHAFIDZI','LK','2012-07-09','isa','1'),
(2,'2503','ABDURRAHMAN FARROS','LK','2012-03-11','isa','2'),
(3,'2507','ALI GHUFRON','LK','2012-09-14','isa','3'),
(4,'2508','ALIFAH SALSABILLA','PR','2012-04-22','isa','4'),
(5,'2513','ARINA DARIN NABILA','PR','2012-03-25','isa','5'),
(6,'2517','AYWAZKA KHANSA AR ROYYAN','PR','2012-11-14','isa','6'),
(7,'2519','AZZAHRA AZKA NALENDRA','PR','2012-12-04','isa','7'),
(8,'2520','BALQIS PUTRI DIVIA','PR','2012-07-07','isa','8'),
(9,'2523','CALLYSTA KANAYA SETIAWAN','PR','2012-01-12','isa','9'),
(10,'2524','CHIKA NOFIASARI','PR','2012-02-15','isa','10'),
(11,'2525','DAMAR ASFA TABRANI','LK','2012-02-21','isa','11'),
(12,'2527','DAYANA BATRISYA AL QIBTHIYYAH','PR','2012-07-18','isa','12'),
(13,'2537','HUSNA AFRAAH UTAMA','PR','2012-05-05','isa','13'),
(14,'2539','IMEL NANDYASA FORADHY','PR','2012-03-29','isa','14'),
(16,'2540','JENAR SOFI RAMADHANTY','PR','2012-05-11','isa','15'),
(17,'2546','KHANSYA ADWITIA NASYIATUL AISYIYAH','PR','2012-08-25','isa','16'),
(18,'2547','LANA BALQIS ULINNUHA','PR','2012-11-06','isa','17'),
(19,'2550','MAHENDRA HAMMAM MUSYARAF','LK','2011-12-27','isa','18'),
(20,'2554','MEDINA SEKAR AZIZA','PR','2012-04-24','isa','19'),
(21,'2555','MISHEL AMMARA NATHIFA','PR','2012-10-19','isa','20'),
(22,'2557','MUHAMMAD ALBYANDRA AQVALO MEI HAVENDI','LK','2012-10-03','isa','21'),
(23,'2565','MUHAMMAD GILDAN ARUNATA','LK','2012-02-12','isa','22'),
(24,'2577','NAYAKA JAVAS ARTHASOCA','LK','2012-06-14','isa','23'),
(25,'2579','NAZIRA NAILUSYIFA','PR','2012-03-24','isa','24'),
(26,'2583','QISYA FELLANIA VEGA','PR','2012-09-29','isa','25'),
(27,'2587','RAIHANA KHANSA NABILA','PR','2012-01-30','isa','26'),
(28,'2592','SABENA ELFIOLLA','PR','2012-04-13','isa','27'),
(29,'2593','SARAH SYIFA AURELIA','PR','2012-07-07','isa','28'),
(30,'2598','TSALITSA SHOLIHATI NISA','PR','2012-08-14','isa','29'),
(31,'2601','YASMIN YOJA GEYSILA','PR','2012-11-29','isa','30'),
(32,'2603','ZIDANE RAMADHAN AL GAMALY','LK','2012-05-24','isa','31');

/*Table structure for table `jenis_nilai` */

DROP TABLE IF EXISTS `jenis_nilai`;

CREATE TABLE `jenis_nilai` (
  `id_jenis` int(2) NOT NULL,
  `nama_jenis` varchar(50) DEFAULT NULL,
  `bobot_jenis` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `jenis_nilai` */

insert  into `jenis_nilai`(`id_jenis`,`nama_jenis`,`bobot_jenis`) values 
(1,'Ulangan Harian 1',10),
(2,'Ulangan Harian 2',10),
(3,'Ulangan Harian 3',10),
(4,'Ulangan Harian 4',10),
(5,'Ulangan Harian 5',10),
(6,'Ulangan Harian 6',10),
(7,'Ulangan Tengah Semester',20),
(8,'Ulangan Akhir Semester',20);

/*Table structure for table `kbm` */

DROP TABLE IF EXISTS `kbm`;

CREATE TABLE `kbm` (
  `id_kbm` int(10) NOT NULL AUTO_INCREMENT,
  `id_kelas` varchar(10) DEFAULT NULL,
  `id_mapel` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_kbm`),
  KEY `id_kelas` (`id_kelas`),
  KEY `id_mapel` (`id_mapel`),
  CONSTRAINT `kbm_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  CONSTRAINT `kbm_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `mata_pelajaran` (`id_mapel`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

/*Data for the table `kbm` */

insert  into `kbm`(`id_kbm`,`id_kelas`,`id_mapel`) values 
(1,'isa','indo-1'),
(2,'isa','agama-1'),
(3,'isa','arab-1'),
(4,'isa','ing-1'),
(5,'isa','ipa-1'),
(6,'isa','ips-1'),
(7,'isa','jawa-1'),
(8,'isa','mtk-1'),
(9,'isa','penjas-1'),
(10,'isa','pkm-1'),
(11,'isa','pkn-1'),
(12,'isa','pks-1'),
(13,'isa','sbd-1'),
(14,'isa','tik-1');

/*Table structure for table `kelas` */

DROP TABLE IF EXISTS `kelas`;

CREATE TABLE `kelas` (
  `id_kelas` varchar(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `deskripsi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `kelas` */

insert  into `kelas`(`id_kelas`,`nama`,`deskripsi`) values 
('ibrahim','Ibrahim','Kelas 6 Ibrahim'),
('isa','Isa','Kelas 6 ISA');

/*Table structure for table `mata_pelajaran` */

DROP TABLE IF EXISTS `mata_pelajaran`;

CREATE TABLE `mata_pelajaran` (
  `id_mapel` varchar(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `deskripsi` varchar(50) DEFAULT NULL,
  `kkm` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_mapel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `mata_pelajaran` */

insert  into `mata_pelajaran`(`id_mapel`,`nama`,`deskripsi`,`kkm`) values 
('agama-1','Pendidikan Agama dan Budi Pekerti',NULL,78),
('arab-1','Bahasa Arab',NULL,70),
('indo-1','Bahasa Indonesia',NULL,75),
('ing-1','Bahasa Inggris',NULL,73),
('ipa-1','Ilmu Pengetahuan Alam',NULL,70),
('ips-1','Ilmu Pengetahuan Sosial',NULL,70),
('jawa-1','Bahasa Jawa',NULL,70),
('mtk-1','Matematika',NULL,68),
('penjas-1','Pendidikan Jasmani, Olahraga, dan Kesehatan',NULL,80),
('pkm-1','Pendidikan Kemuhammadiyahan',NULL,70),
('pkn-1','Pendidikan Pancasila dan Kewarganegaraan',NULL,75),
('pks-1','Pendalaman Kitab Suci Agama Islam',NULL,75),
('sbd-1','Seni Budaya dan Prakarya',NULL,75),
('tik-1','TIK',NULL,70);

/*Table structure for table `nilai` */

DROP TABLE IF EXISTS `nilai`;

CREATE TABLE `nilai` (
  `id_nilai` int(10) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(10) DEFAULT NULL,
  `id_kbm` int(10) DEFAULT NULL,
  `id_jenis` int(10) DEFAULT NULL,
  `poin` double DEFAULT NULL,
  PRIMARY KEY (`id_nilai`),
  KEY `id_user` (`id_user`),
  KEY `id_kbm` (`id_kbm`),
  KEY `id_jenis` (`id_jenis`),
  CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`id_kbm`) REFERENCES `kbm` (`id_kbm`),
  CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_nilai` (`id_jenis`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `nilai` */

insert  into `nilai`(`id_nilai`,`id_user`,`id_kbm`,`id_jenis`,`poin`) values 
(1,'2501',1,1,80),
(2,'2501',1,2,81),
(3,'2501',1,3,76),
(4,'2501',1,4,76),
(5,'2501',1,7,80),
(6,'2501',1,8,80),
(7,'2503',1,1,78);

/*Table structure for table `remidial` */

DROP TABLE IF EXISTS `remidial`;

CREATE TABLE `remidial` (
  `id_remidial` int(11) NOT NULL AUTO_INCREMENT,
  `id_nilai` int(11) DEFAULT NULL,
  `poin_remidial` double DEFAULT NULL,
  `file_remidial` text DEFAULT NULL,
  PRIMARY KEY (`id_remidial`),
  KEY `id_nilai` (`id_nilai`),
  CONSTRAINT `remidial_ibfk_1` FOREIGN KEY (`id_nilai`) REFERENCES `nilai` (`id_nilai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `remidial` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` varchar(10) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `hak_akses` int(2) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

insert  into `user`(`id_user`,`password`,`email`,`hak_akses`,`date_created`) values 
('1','428','428@gmail.com',1,'2022-05-24'),
('2501','azzam','azzam2501@gmail.com',3,'2022-05-24'),
('2503','farros','farros2503@gmail.com',3,'2022-05-24'),
('2507','ali','ali2507@gmail.com',3,'2022-05-24'),
('2508','alifa','alifa2508@gmail.com',3,'2022-05-24'),
('2513','arina','arina2513@gmail.com',3,'2022-05-24'),
('2517','aywaska','aywaska2517@gmail.com',3,'2022-05-24'),
('2519','azka','azka2519@gmail.com',3,'2022-05-24'),
('2520','balqis','balqis2520@gmail.com',3,'2022-05-24'),
('2523','callysta','callysta2523@gmail.com',3,'2022-05-24'),
('2524','chika','chika2524@gmail.com',3,'2022-05-24'),
('2525','damar','damar2525@gmail.com',3,'2022-05-24'),
('2527','dayana','dayana2527@gmail.com',3,'2022-05-24'),
('2537','husna','husna2537@gmail.com',3,'2022-05-24'),
('2539','imel','imel2539@gmail.com',3,'2022-05-24'),
('2540','sofi','sofi2540@gmail.com',3,'2022-05-24'),
('2546','khansya','khansya2546@gmail.com',3,'2022-05-24'),
('2547','lana','lana2547@gmail.com',3,'2022-05-24'),
('2550','hamam','hamam2550@gmail.com',3,'2022-05-24'),
('2554','medina','medina2554@gmail.com',3,'2022-05-24'),
('2555','mishel','mishel2555@gmail.com',3,'2022-05-24'),
('2557','valo','valo2557@gmail.com',3,'2022-05-24'),
('2565','gildan','gildan2565@gmail.com',3,'2022-05-24'),
('2577','javas','javas2577@gmail.com',3,'2022-05-24'),
('2579','nazira','nazira2579@gmail.com',3,'2022-05-24'),
('2583','qisya','1isya2583@gmail.com',3,'2022-05-24'),
('2587','raihana','raihana2587@gmail.com',3,'2022-05-24'),
('2592','sabena','sabena2592@gmail.com',3,'2022-05-24'),
('2593','sarah','sarah2596@gmail.com',3,'2022-05-24'),
('2598','tsalitsa','tsalitsa2598@gmail.com',3,'2022-05-24'),
('2601','yasmin','yasmin2598@gmail.com',3,'2022-05-24'),
('2603','zidane','zidane2598@gmail.com',3,'2022-05-24');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
