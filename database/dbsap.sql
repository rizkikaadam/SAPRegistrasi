/*
SQLyog Community v13.1.2 (64 bit)
MySQL - 10.4.8-MariaDB : Database - dbsap
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbsap` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `dbsap`;

/*Table structure for table `tbl_atlet` */

DROP TABLE IF EXISTS `tbl_atlet`;

CREATE TABLE `tbl_atlet` (
  `idAtlet` int(128) NOT NULL AUTO_INCREMENT,
  `namaAtlet` varchar(128) DEFAULT NULL,
  `tempatLahir` varchar(128) DEFAULT NULL,
  `tanggalLahir` date DEFAULT NULL,
  `alamatAtlet` text DEFAULT NULL,
  `noHandphone` varchar(128) DEFAULT NULL,
  `fotoAtlet` varchar(128) DEFAULT 'user-default.jpg',
  `tanggalDaftar` date DEFAULT NULL,
  `verifikasi` char(1) DEFAULT '0',
  `statusAtlet` char(1) DEFAULT '1',
  PRIMARY KEY (`idAtlet`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_atlet` */

insert  into `tbl_atlet`(`idAtlet`,`namaAtlet`,`tempatLahir`,`tanggalLahir`,`alamatAtlet`,`noHandphone`,`fotoAtlet`,`tanggalDaftar`,`verifikasi`,`statusAtlet`) values 
(1,'Sukadini','bandung','2020-02-10','jl. Melong Asih no. 14',NULL,'3652871.jpg','2020-02-25','0','1');

/*Table structure for table `tbl_event` */

DROP TABLE IF EXISTS `tbl_event`;

CREATE TABLE `tbl_event` (
  `idEvent` int(128) NOT NULL AUTO_INCREMENT,
  `namaEvent` varchar(128) DEFAULT NULL,
  `tglEventMulai` date DEFAULT NULL,
  `tglEventSelesai` date DEFAULT NULL,
  `tglPendaftaranMulai` date DEFAULT NULL,
  `tglPendaftaranSelesai` date DEFAULT NULL,
  `fotoEvent` varchar(128) DEFAULT NULL,
  `keteranganEvent` text DEFAULT NULL,
  `deskripsiEvent` text DEFAULT NULL,
  `syaratEvent` text DEFAULT NULL,
  PRIMARY KEY (`idEvent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_event` */

/*Table structure for table `tbl_invoice` */

DROP TABLE IF EXISTS `tbl_invoice`;

CREATE TABLE `tbl_invoice` (
  `idInvoice` int(128) NOT NULL AUTO_INCREMENT,
  `noInvoice` varchar(128) DEFAULT NULL,
  `tanggalInvoice` datetime DEFAULT NULL,
  `jumlahBayar` int(128) DEFAULT NULL,
  `idUser` int(128) DEFAULT NULL,
  `pendamping` varchar(128) DEFAULT NULL,
  `jumlahAtlet` int(128) DEFAULT NULL,
  `idEvent` int(128) DEFAULT NULL,
  PRIMARY KEY (`idInvoice`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_invoice` */

/*Table structure for table `tbl_kelompokpertandingan` */

DROP TABLE IF EXISTS `tbl_kelompokpertandingan`;

CREATE TABLE `tbl_kelompokpertandingan` (
  `idKelompokPertandingan` int(128) NOT NULL AUTO_INCREMENT,
  `namaKelompokPertandingan` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`idKelompokPertandingan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_kelompokpertandingan` */

insert  into `tbl_kelompokpertandingan`(`idKelompokPertandingan`,`namaKelompokPertandingan`) values 
(1,'Kelompok SD'),
(2,'Kelompok SMP'),
(3,'Kelompok SMA');

/*Table structure for table `tbl_nomorpertandingan` */

DROP TABLE IF EXISTS `tbl_nomorpertandingan`;

CREATE TABLE `tbl_nomorpertandingan` (
  `idNomorPertandingan` int(128) NOT NULL AUTO_INCREMENT,
  `nomorPertandingan` varchar(128) DEFAULT NULL,
  `kelompok` varchar(128) DEFAULT NULL,
  `kelas` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`idNomorPertandingan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_nomorpertandingan` */

/*Table structure for table `tbl_nomorpertangdinganatlet` */

DROP TABLE IF EXISTS `tbl_nomorpertangdinganatlet`;

CREATE TABLE `tbl_nomorpertangdinganatlet` (
  `idNomorPertandinganAtlet` int(128) NOT NULL AUTO_INCREMENT,
  `idAtlet` int(128) DEFAULT NULL,
  `idNomorPertandingan` int(128) DEFAULT NULL,
  PRIMARY KEY (`idNomorPertandinganAtlet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_nomorpertangdinganatlet` */

/*Table structure for table `tbl_pertandingan` */

DROP TABLE IF EXISTS `tbl_pertandingan`;

CREATE TABLE `tbl_pertandingan` (
  `idPertandingan` int(128) NOT NULL AUTO_INCREMENT,
  `idEvent` int(128) DEFAULT NULL,
  `idNomorPertandinganAtlet` int(128) DEFAULT NULL,
  `tanggalPertandingan` date DEFAULT NULL,
  `jamPertandingan` time DEFAULT NULL,
  PRIMARY KEY (`idPertandingan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_pertandingan` */

/*Table structure for table `tbl_sekolahatlet` */

DROP TABLE IF EXISTS `tbl_sekolahatlet`;

CREATE TABLE `tbl_sekolahatlet` (
  `idSekolahAtlet` int(128) NOT NULL AUTO_INCREMENT,
  `jenjang` varchar(128) DEFAULT NULL,
  `namaSekolah` varchar(128) DEFAULT NULL,
  `idAtlet` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`idSekolahAtlet`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_sekolahatlet` */

insert  into `tbl_sekolahatlet`(`idSekolahAtlet`,`jenjang`,`namaSekolah`,`idAtlet`) values 
(1,'SD','SDN Marga Asih','1');

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `idUser` int(128) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) DEFAULT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `hintPass` varchar(128) DEFAULT NULL,
  `tanggalUser` date DEFAULT NULL,
  `noHandphone1` varchar(128) DEFAULT NULL,
  `noHandphone2` varchar(128) DEFAULT NULL,
  `alamatUser` text DEFAULT NULL,
  `asal` varchar(128) DEFAULT NULL,
  `status` char(1) DEFAULT '0',
  `fotoUser` varchar(128) DEFAULT 'user-default.jpg',
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`idUser`,`username`,`nama`,`password`,`hintPass`,`tanggalUser`,`noHandphone1`,`noHandphone2`,`alamatUser`,`asal`,`status`,`fotoUser`) values 
(1,'fatimah@gmail.com','Fatimah','$2y$10$Rj0Ko.1dmlca4tDpk6ytKelwtg3kjpfkfWaaQC1.j.9MH238HuElC','12345','2020-02-25','0875','09864','Jalan Kopo Indah Permai','SMAN 6 Bandung','1','download_(1)3.jpg');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
