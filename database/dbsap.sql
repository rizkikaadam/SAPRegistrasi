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
  `idUser` int(128) DEFAULT NULL,
  PRIMARY KEY (`idAtlet`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_atlet` */

insert  into `tbl_atlet`(`idAtlet`,`namaAtlet`,`tempatLahir`,`tanggalLahir`,`alamatAtlet`,`noHandphone`,`fotoAtlet`,`tanggalDaftar`,`verifikasi`,`statusAtlet`,`idUser`) values 
(1,'Sukadini','bandung','2020-02-10','jl. Melong Asih no. 14',NULL,'3652871.jpg','2020-02-25','0','1',12),
(2,'Fatimah','Bandung','2020-02-12','Jalan Kopo Permai',NULL,'user-default.jpg','2020-02-26','0','1',12),
(3,'as','as','2020-02-19','asd',NULL,'3652872.jpg','2020-02-26','0','1',12),
(4,'Ryan Effendi','Kencana','2020-02-26','Jalan Sedap Malam 6 No. 14',NULL,'3652873.jpg','2020-02-26','0','1',12),
(5,'Juju Kusnadi','Bandung','2020-02-10','bandung',NULL,'Juju Kusnadi_download_(1)4.jpg','2020-02-26','1','1',12),
(6,'Fatimah','Rancaekek','2020-02-02','Jalan Sedap mal;am 6 no. 14',NULL,'wallhaven-gjzg2e.jpg','2020-02-27','0','1',4),
(7,'Dimas','Banjanaran','2020-02-19','Jalan Banjaran',NULL,'custom_–_1.png','2020-02-27','0','1',14);

/*Table structure for table `tbl_dokumenatlet` */

DROP TABLE IF EXISTS `tbl_dokumenatlet`;

CREATE TABLE `tbl_dokumenatlet` (
  `idDokumenAtlet` int(128) NOT NULL AUTO_INCREMENT,
  `idAtlet` int(128) DEFAULT NULL,
  `akte` varchar(128) DEFAULT NULL,
  `dok` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`idDokumenAtlet`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_dokumenatlet` */

insert  into `tbl_dokumenatlet`(`idDokumenAtlet`,`idAtlet`,`akte`,`dok`) values 
(1,4,'tset.pdf_4','tset.pdf_4'),
(2,5,'akte_tset.pdf5','dokumen_tset.pdf5'),
(3,6,'tabel-formasi.pdf','tabel-formasi.pdf'),
(4,7,'E-Voucher_—.pdf','tabel-formasi.pdf');

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
  `tempat` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`idEvent`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_event` */

insert  into `tbl_event`(`idEvent`,`namaEvent`,`tglEventMulai`,`tglEventSelesai`,`tglPendaftaranMulai`,`tglPendaftaranSelesai`,`fotoEvent`,`keteranganEvent`,`deskripsiEvent`,`syaratEvent`,`tempat`) values 
(1,'SAP CUP 3','2020-03-14','2020-02-16','2020-02-02','2020-02-11',NULL,NULL,NULL,NULL,NULL);

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
  `noHpPendamping` varchar(50) DEFAULT NULL,
  `status` varchar(1) DEFAULT '0',
  PRIMARY KEY (`idInvoice`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_invoice` */

insert  into `tbl_invoice`(`idInvoice`,`noInvoice`,`tanggalInvoice`,`jumlahBayar`,`idUser`,`pendamping`,`jumlahAtlet`,`idEvent`,`noHpPendamping`,`status`) values 
(1,'1211326022020','2020-02-26 00:00:00',140000,12,'Rizkika Adam Pratama',5,1,'081222097865','0');

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

/*Table structure for table `tbl_konfirmasi` */

DROP TABLE IF EXISTS `tbl_konfirmasi`;

CREATE TABLE `tbl_konfirmasi` (
  `idKonfimasi` int(128) NOT NULL AUTO_INCREMENT,
  `idInvoice` int(128) DEFAULT NULL,
  `jmlTransfer` int(128) DEFAULT NULL,
  `bukti` varchar(128) DEFAULT NULL,
  `tglKonfirmasi` date DEFAULT NULL,
  PRIMARY KEY (`idKonfimasi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_konfirmasi` */

/*Table structure for table `tbl_nomorpertandingan` */

DROP TABLE IF EXISTS `tbl_nomorpertandingan`;

CREATE TABLE `tbl_nomorpertandingan` (
  `idNomorPertandingan` int(128) NOT NULL AUTO_INCREMENT,
  `nomorPertandingan` varchar(128) DEFAULT NULL,
  `kelompok` varchar(128) DEFAULT NULL,
  `kelas` varchar(128) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idNomorPertandingan`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_nomorpertandingan` */

insert  into `tbl_nomorpertandingan`(`idNomorPertandingan`,`nomorPertandingan`,`kelompok`,`kelas`,`jenis`) values 
(2,'Lari 60M','SD','Kelas 1,2','1'),
(3,'Lari 60M','SD','Kelas 3,4','1'),
(4,'Lari 60M','SD','Kelas 5,6','1'),
(5,'Lari 600M','SD','Kelas 1,2','1'),
(6,'Lari 600M','SD','Kelas 3,4','1'),
(7,'Lari 600M','SD','Kelas 5,6','1'),
(8,'Lompat Jauh','SD','Kelas 1,2','1'),
(9,'Lompat Jauh','SD','Kelas 3,4','1'),
(10,'Lompat Jauh','SD','Kelas 5,6','1'),
(11,'Lempar Bola','SD','Kelas 1,2','1'),
(12,'Lempar Bola','SD','Kelas 3,4','1'),
(13,'Lempar Bola','SD','Kelas 5,6','1'),
(14,'5x80M Estafet','SD','Kelas 1,2','2'),
(15,'5x80M Estafet','SD','Kelas 3,4','2'),
(16,'5x80M Estafet','SD','Kelas 5,6','2'),
(17,'Lari 100M','SMP','','1'),
(18,'Lari 100M','SMA','','1'),
(19,'Lari 400M','SMP','','1'),
(20,'Lari 400M','SMA','','1'),
(21,'Lari 800M','SMP','','1'),
(22,'Lari 800M','SMA','','1'),
(23,'Lari 1500M','SMP','','1'),
(24,'Lari 1500M','SMA','','1'),
(25,'Jalan Cepat 3000M','SMP','','1'),
(26,'Jalan Cepat 3000M','SMA','','1'),
(27,'Lompat Jauh','SMP','','1'),
(28,'Lompat Jauh','SMA','','1'),
(29,'Lompat Tinggi','SMP','','1'),
(30,'Lompat Tinggi','SMA','','1'),
(31,'Tolak Peluru','SMP','','1'),
(32,'Tolak Peluru','SMA','','1'),
(33,'4x100M Estafet','SMP','','2'),
(34,'4x100M Estafet','SMA','','2'),
(35,'Lempar Lembing','SMA','','1');

/*Table structure for table `tbl_nomorpertandinganatlet` */

DROP TABLE IF EXISTS `tbl_nomorpertandinganatlet`;

CREATE TABLE `tbl_nomorpertandinganatlet` (
  `idNomorPertandinganAtlet` int(128) NOT NULL AUTO_INCREMENT,
  `idAtlet` int(128) DEFAULT NULL,
  `idNomorPertandingan` int(128) DEFAULT NULL,
  PRIMARY KEY (`idNomorPertandinganAtlet`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_nomorpertandinganatlet` */

insert  into `tbl_nomorpertandinganatlet`(`idNomorPertandinganAtlet`,`idAtlet`,`idNomorPertandingan`) values 
(9,4,2),
(10,4,11),
(11,4,16),
(12,5,2),
(13,5,19),
(14,6,35),
(15,7,34);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_sekolahatlet` */

insert  into `tbl_sekolahatlet`(`idSekolahAtlet`,`jenjang`,`namaSekolah`,`idAtlet`) values 
(1,'SD','SDN Marga Asih','1'),
(2,'SD','SDN Marga Asih','2'),
(3,'SD','SDN Marga Asih','3'),
(4,'SD','SDN Marga Asih','4'),
(5,'SMP','SDN Marga Asih','5'),
(6,'SMA','SMAN 6 Bandung','6'),
(7,'SMA','SMA Banjaran','7');

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
  `role_id` char(1) DEFAULT '0',
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`idUser`,`username`,`nama`,`password`,`hintPass`,`tanggalUser`,`noHandphone1`,`noHandphone2`,`alamatUser`,`asal`,`status`,`fotoUser`,`role_id`) values 
(1,'fatimah@gmail.com','Fatimah','$2y$10$Rj0Ko.1dmlca4tDpk6ytKelwtg3kjpfkfWaaQC1.j.9MH238HuElC','12345','2020-02-25','0875','09864','Jalan Kopo Indah Permai','SMAN 6 Bandung','1','download_(1)3.jpg','1'),
(4,'anggi@gmail.com','Anggi','$2y$10$x2estWOjXXrkzIYtDuxN3O03c0v/9smbfNl5g/JZ5hgXLZU1jP6wi','anggi','2020-02-25','085211431021','','Jl. Sedap Malam VII No 27 Rancaekek Kab. Bandung','SMAN 1 Rancaekek','1','user-default.jpg','1'),
(5,'Aldo@gmail.com','Aldo','$2y$10$3oluDm3pJgMQf/HmiB0cq.WG4g9QbHAICmo2RnWHdJQ5m6ZYn/JoC','aldo','2020-02-25','081123432122','','Rancacili 1 no 27 Bandung','SMAN 26 Bandung','1','user-default.jpg','1'),
(6,'Angga@gmail.com','Angga','$2y$10$DPDpScXDoIbPRw/UuHz7oOcGy3JvhGZ0arLbblkTcGfh./lNYAbMu','angga','2020-02-25','085211321234','','Jl. Melur III No 81 Rancaekek Kab. Bandung','SMK Lugina Rancaekek','1','user-default.jpg','1'),
(7,'Elin.siti@gmail.com','Elin Siti','$2y$10$pq.r9Lc41Zejjx2wlzniAOHBuTk9pLM2ff4NrR6OjjtE3uUtOc2XK','elin','2020-02-25','087821345678','','Lengkong Dalam Gang Mijan no 27 RT 03 RW 22 Kota Bandung','SMAN 7 Bandung','1','user-default.jpg','1'),
(8,'Saeful@gmail.com','Asep Saeful','$2y$10$i8IN3XigM/u.GE.gXbgoJeYwPvVXS7H2claK6vT31RL4/DKW5t2ZG','asep','2020-02-25','089722345678','','Jl Raya Baleendah - Soreang KM 12 ','SMAN 1 Baleendah','1','user-default.jpg','1'),
(9,'Juli@gmail.com','Juliansyah','$2y$10$FruOfVec0vw.g2SQHJkf8OjLcUDidWeg5kMzkJDAEQek4A.IJOho2','juli','2020-02-25','083213456782','','Jl. Semar Dalam 3 No 265 Kota Bandung','SMPN 9 Bandung','1','user-default.jpg','1'),
(10,'J3ry@gmail.com','Jerry Julius','$2y$10$6oKLPmB8JvPI11mOpEhS6e1ue6x1Wb9kU8aoxBAG9uo8B4B0igWeK','jerry','2020-02-25','089876876876','','Sukajadi Bandung','SMPN 12 Bandung','1','user-default.jpg','1'),
(11,'Sefaokta@gmail.com','Okta Sefa Dania','$2y$10$wyvA76B3E2AwQBICnGA5uepnfaSSzSq6YyADNW9M97O5GzpFYEWM6','okta','2020-02-25','081234567545','','Jl. Raya Cibeurem No 234 ','SMKN 11 Bandung','1','user-default.jpg','1'),
(12,'Puspa@gmail.co.id','Puspa Sari Wangi','$2y$10$PXFN1tNtbJAZBRUlPLNKzOyE9i.Xt5MX/vwC766P7BCsm5LXtOI/e','puspa','2020-02-25','08989089768','','Jl. Abdi Negara no 24 Abdi Negara Kab. Bandung','SMA Muhammadyah 5 Bandung','1','user-default.jpg','1'),
(13,'Putriekasari@gmail.co.id','Eka Putri Sari','$2y$10$UukjjevgOztl2lQ0jq/ND.o1e5HTlo8GAivCpFCfpmIA4a/JTds8u','eka','2020-02-25','081234567123','','Jl. Ciumbuleuit Gang H. Masbur 3 No 17','SMAN 2 Bandung','0','user-default.jpg','1'),
(14,'admin@gmail.com','Administrator','$2y$10$9HgqniCu98WmpCZ0TL36ieqhKhuPYHhePghMbtsYQCAMKpTS/Vt7K',NULL,'2020-02-26',NULL,NULL,NULL,NULL,'1','user-default.jpg','0'),
(15,'szalsa@gmail.com','szalsa','$2y$10$QjXKbAHeSahzdDx1E8QRZeHgrxYQGVBOjKGUwCvCEv55M.oBMr092',NULL,'2020-02-26',NULL,NULL,NULL,NULL,'1','user-default.jpg','1'),
(16,'rizkika@gmail.com','rizkika','$2y$10$jG52Tt2WJEdhk460bYROquKCPOcQO2.33ChS89cw7SDsKSyTLQW7K',NULL,'2020-02-27',NULL,NULL,NULL,NULL,'1','user-default.jpg','1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
