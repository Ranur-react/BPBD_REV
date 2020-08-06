/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.6.21 : Database - bencana
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bencana` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `bencana`;

/*Table structure for table `daerahrawan` */

DROP TABLE IF EXISTS `daerahrawan`;

CREATE TABLE `daerahrawan` (
  `kodedaerahrawan` char(20) NOT NULL,
  `dkodekorong` char(20) DEFAULT NULL,
  `dkodenagari` char(20) DEFAULT NULL,
  `dkodekecamatan` char(20) DEFAULT NULL,
  `dkodejenisbencana` char(20) DEFAULT NULL,
  `keterangan` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`kodedaerahrawan`),
  KEY `dkodekorong` (`dkodekorong`),
  KEY `dkodenagari` (`dkodenagari`),
  KEY `dkodejenisbencana` (`dkodejenisbencana`),
  KEY `dkodekecamatan` (`dkodekecamatan`),
  CONSTRAINT `daerahrawan_ibfk_1` FOREIGN KEY (`dkodekorong`) REFERENCES `korong` (`kodekorong`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `daerahrawan_ibfk_2` FOREIGN KEY (`dkodenagari`) REFERENCES `nagari` (`kodenagari`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `daerahrawan_ibfk_4` FOREIGN KEY (`dkodejenisbencana`) REFERENCES `jenisbencana` (`kodejenis`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `daerahrawan_ibfk_5` FOREIGN KEY (`dkodekecamatan`) REFERENCES `kecamatan` (`kodekecamatan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `daerahrawan` */

insert  into `daerahrawan`(`kodedaerahrawan`,`dkodekorong`,`dkodenagari`,`dkodekecamatan`,`dkodejenisbencana`,`keterangan`) values ('DR-001','KOR-001','N-002','K-001','J-001','luka ringan'),('DR-003','KOR-001','N-002','K-001','J-001','sudah di evakuasi'),('DR-004','KOR-001','N-002','K-001','J-002','luka ringan'),('DR-005','KOR-001','N-002','K-001','J-002','Kapan Saja');

/*Table structure for table `detailkerusakan` */

DROP TABLE IF EXISTS `detailkerusakan`;

CREATE TABLE `detailkerusakan` (
  `kodedetailkerusakan` int(11) NOT NULL AUTO_INCREMENT,
  `detkodekasus` char(20) DEFAULT NULL,
  `detjeniskerusakan` varchar(20) DEFAULT NULL,
  `detjumlah` int(11) DEFAULT NULL,
  `detketerangan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kodedetailkerusakan`),
  KEY `detkodekasus` (`detkodekasus`),
  CONSTRAINT `detailkerusakan_ibfk_1` FOREIGN KEY (`detkodekasus`) REFERENCES `kasusbencana` (`kodekasus`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `detailkerusakan` */

insert  into `detailkerusakan`(`kodedetailkerusakan`,`detkodekasus`,`detjeniskerusakan`,`detjumlah`,`detketerangan`) values (2,'KB-001','Bangun',1200000,'sudah Roboh');

/*Table structure for table `detailkorban` */

DROP TABLE IF EXISTS `detailkorban`;

CREATE TABLE `detailkorban` (
  `kodedetailkorban` int(11) NOT NULL AUTO_INCREMENT,
  `dkodekasus` char(20) DEFAULT NULL,
  `dkodekorban` char(20) DEFAULT NULL,
  `dnamakorban` varchar(50) DEFAULT NULL,
  `dalamat` varchar(50) DEFAULT NULL,
  `djeniskelamin` varchar(20) DEFAULT NULL,
  `dketerangan` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`kodedetailkorban`),
  KEY `dkodekorban` (`dkodekorban`),
  KEY `dkodekasus` (`dkodekasus`),
  CONSTRAINT `detailkorban_ibfk_1` FOREIGN KEY (`dkodekorban`) REFERENCES `korban` (`kodekorban`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detailkorban_ibfk_2` FOREIGN KEY (`dkodekasus`) REFERENCES `kasusbencana` (`kodekasus`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `detailkorban` */

insert  into `detailkorban`(`kodedetailkorban`,`dkodekasus`,`dkodekorban`,`dnamakorban`,`dalamat`,`djeniskelamin`,`dketerangan`) values (4,'KB-001','KOR-001','jeje','tapakis','Laki-Laki','luka ringan'),(5,'KB-001','KOR-002','gina','Jln dewi sartika','Perempuan','luka berat');

/*Table structure for table `jenisbencana` */

DROP TABLE IF EXISTS `jenisbencana`;

CREATE TABLE `jenisbencana` (
  `kodejenis` char(20) NOT NULL,
  `jenisbencana` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`kodejenis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `jenisbencana` */

insert  into `jenisbencana`(`kodejenis`,`jenisbencana`) values ('J-001','Banjir'),('J-002','Longsor'),('J-003','Gempa Bumi');

/*Table structure for table `kasusbencana` */

DROP TABLE IF EXISTS `kasusbencana`;

CREATE TABLE `kasusbencana` (
  `kodekasus` char(10) NOT NULL,
  `tglkejadian` date DEFAULT NULL,
  `waktukejadian` varchar(20) DEFAULT NULL,
  `kkodejenis` char(20) DEFAULT NULL,
  `lokasi` varchar(50) DEFAULT NULL,
  `kkodekecamatan` char(20) DEFAULT NULL,
  `kkodenagari` char(20) DEFAULT NULL,
  `kkodekorong` char(20) DEFAULT NULL,
  `taksirankerugian` double DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `regutimpenanggulangan` char(20) DEFAULT NULL,
  `jumlahdanapenanggulangan` double DEFAULT NULL,
  `tindaklanjut` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kodekasus`),
  KEY `kkodejenis` (`kkodejenis`),
  KEY `kkodekecamatan` (`kkodekecamatan`),
  KEY `kkodenagari` (`kkodenagari`),
  KEY `kkodekorong` (`kkodekorong`),
  KEY `regutimpenanggulangan` (`regutimpenanggulangan`),
  CONSTRAINT `kasusbencana_ibfk_1` FOREIGN KEY (`kkodejenis`) REFERENCES `jenisbencana` (`kodejenis`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kasusbencana_ibfk_2` FOREIGN KEY (`kkodekecamatan`) REFERENCES `kecamatan` (`kodekecamatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kasusbencana_ibfk_3` FOREIGN KEY (`kkodenagari`) REFERENCES `nagari` (`kodenagari`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kasusbencana_ibfk_4` FOREIGN KEY (`kkodekorong`) REFERENCES `korong` (`kodekorong`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kasusbencana_ibfk_5` FOREIGN KEY (`regutimpenanggulangan`) REFERENCES `regu` (`idregu`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kasusbencana` */

insert  into `kasusbencana`(`kodekasus`,`tglkejadian`,`waktukejadian`,`kkodejenis`,`lokasi`,`kkodekecamatan`,`kkodenagari`,`kkodekorong`,`taksirankerugian`,`keterangan`,`regutimpenanggulangan`,`jumlahdanapenanggulangan`,`tindaklanjut`) values ('KB-001','1970-01-01','08.00','J-001','Kampung Durian Runtuh','K-001','N-001','KOR-001',200000000,'Terjadi 3 Bulan sekali','R-001',10,'Isolasi Mandiri');

/*Table structure for table `kecamatan` */

DROP TABLE IF EXISTS `kecamatan`;

CREATE TABLE `kecamatan` (
  `kodekecamatan` char(20) NOT NULL,
  `namakecamatan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kodekecamatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kecamatan` */

insert  into `kecamatan`(`kodekecamatan`,`namakecamatan`) values ('K-001','Nan Sabaris'),('K-002','Enam Lingkung'),('K-003','VII Koto'),('K-004','2x11 Kayu Tanam'),('K-005','2x11 Enam Lingkung'),('K-006','Ulakan Tapakis'),('K-007','Lubuk Alung'),('K-008','Sintuk Toboh Gadang'),('K-009','Batang Anai'),('K-010','Patamuan'),('K-011','Padang Sago'),('K-012','Sungai Geringging'),('K-013','IV Koto Aur Malintang'),('K-014','Batang Gasan'),('K-015','Sungai Limau'),('K-016','V Koto Kampung Dalam'),('K-017','V Koto Timur');

/*Table structure for table `kejadianhariandanpenanggulangan` */

DROP TABLE IF EXISTS `kejadianhariandanpenanggulangan`;

CREATE TABLE `kejadianhariandanpenanggulangan` (
  `kodekejadian` char(20) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `cuaca` varchar(50) DEFAULT NULL,
  `suhu` varchar(50) DEFAULT NULL,
  `kelembaban` varchar(50) DEFAULT NULL,
  `kencangangin` varchar(50) DEFAULT NULL,
  `arahangin` varchar(50) DEFAULT NULL,
  `kkodekasus` char(10) DEFAULT NULL,
  `peringatandini` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`kodekejadian`),
  KEY `kkodekasus` (`kkodekasus`),
  CONSTRAINT `kejadianhariandanpenanggulangan_ibfk_1` FOREIGN KEY (`kkodekasus`) REFERENCES `kasusbencana` (`kodekasus`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kejadianhariandanpenanggulangan` */

/*Table structure for table `korban` */

DROP TABLE IF EXISTS `korban`;

CREATE TABLE `korban` (
  `kodekorban` char(15) NOT NULL,
  `namakorban` varchar(50) DEFAULT NULL,
  `umur` varchar(20) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `jeniskelamin` varchar(20) DEFAULT NULL,
  `keterangan` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`kodekorban`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `korban` */

insert  into `korban`(`kodekorban`,`namakorban`,`umur`,`alamat`,`jeniskelamin`,`keterangan`) values ('KOR-001','jeje','18','tapakis','Laki-Laki','luka ringan'),('KOR-002','gina','23','Jln dewi sartika','Perempuan','luka berat');

/*Table structure for table `korong` */

DROP TABLE IF EXISTS `korong`;

CREATE TABLE `korong` (
  `kodekorong` char(20) NOT NULL,
  `namakorong` varchar(30) DEFAULT NULL,
  `kd_kecamatan` char(30) DEFAULT NULL,
  `kode_nagari` char(30) DEFAULT NULL,
  PRIMARY KEY (`kodekorong`),
  KEY `kode_nagari` (`kode_nagari`),
  KEY `kd_kecamatan` (`kd_kecamatan`),
  CONSTRAINT `korong_ibfk_2` FOREIGN KEY (`kode_nagari`) REFERENCES `nagari` (`kodenagari`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `korong_ibfk_3` FOREIGN KEY (`kd_kecamatan`) REFERENCES `kecamatan` (`kodekecamatan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `korong` */

insert  into `korong`(`kodekorong`,`namakorong`,`kd_kecamatan`,`kode_nagari`) values ('KOR-001','Baruah','K-001','N-002');

/*Table structure for table `nagari` */

DROP TABLE IF EXISTS `nagari`;

CREATE TABLE `nagari` (
  `kodenagari` char(20) NOT NULL,
  `namanagari` varchar(30) DEFAULT NULL,
  `kode_kecamatan` char(20) DEFAULT NULL,
  PRIMARY KEY (`kodenagari`),
  KEY `nagari_ibfk_1` (`kode_kecamatan`),
  CONSTRAINT `nagari_ibfk_1` FOREIGN KEY (`kode_kecamatan`) REFERENCES `kecamatan` (`kodekecamatan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `nagari` */

insert  into `nagari`(`kodenagari`,`namanagari`,`kode_kecamatan`) values ('N-001','Sunua','K-001'),('N-002','Padang Bintungan','K-001'),('N-003','Pauh Kamba','K-001'),('N-004','Kapalo Koto','K-001'),('N-005','Kurai Taji','K-001'),('N-006','Sunua Barat','K-001'),('N-007','Sunua Tengah','K-001'),('N-008','Padang Kandang Pulau Air Padan','K-001'),('N-009','Kuraitaji Timur','K-001');

/*Table structure for table `regu` */

DROP TABLE IF EXISTS `regu`;

CREATE TABLE `regu` (
  `idregu` varchar(20) NOT NULL,
  `regu` char(2) DEFAULT NULL,
  PRIMARY KEY (`idregu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `regu` */

insert  into `regu`(`idregu`,`regu`) values ('R-001','A'),('R-002','B'),('R-003','C'),('R-004','D'),('R-005','E');

/*Table structure for table `tempkerusakan` */

DROP TABLE IF EXISTS `tempkerusakan`;

CREATE TABLE `tempkerusakan` (
  `idtempkerusakan` char(10) NOT NULL,
  `jeniskerusakan` varchar(20) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `keteranganrusak` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idtempkerusakan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tempkerusakan` */

/*Table structure for table `tempkorban` */

DROP TABLE IF EXISTS `tempkorban`;

CREATE TABLE `tempkorban` (
  `idtempkorban` char(10) NOT NULL,
  `namakorban` varchar(20) DEFAULT NULL,
  `alamatkorban` varchar(20) DEFAULT NULL,
  `jeniskelaminkorban` varchar(20) DEFAULT NULL,
  `keterangankorban` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idtempkorban`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tempkorban` */

/*Table structure for table `timtrc` */

DROP TABLE IF EXISTS `timtrc`;

CREATE TABLE `timtrc` (
  `kodetrc` char(10) NOT NULL,
  `namatrc` varchar(30) DEFAULT NULL,
  `tanggallahir` date DEFAULT NULL,
  `alamat` varchar(30) DEFAULT NULL,
  `notelp` varchar(13) DEFAULT NULL,
  `jeniskelamin` varchar(30) DEFAULT NULL,
  `pendidikanakhir` varchar(30) DEFAULT NULL,
  `bagian` varchar(30) DEFAULT NULL,
  `koderegu` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`kodetrc`),
  KEY `koderegu` (`koderegu`),
  CONSTRAINT `timtrc_ibfk_1` FOREIGN KEY (`koderegu`) REFERENCES `regu` (`idregu`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `timtrc` */

insert  into `timtrc`(`kodetrc`,`namatrc`,`tanggallahir`,`alamat`,`notelp`,`jeniskelamin`,`pendidikanakhir`,`bagian`,`koderegu`) values ('TRC-01','Zulzaldy, S.Pd','1987-06-09','Jln Adam Malik','081236888227','Laki-Laki','S1','Danru','R-002'),('TRC-02','Zul Oktariadi, S.Pd','1988-02-11','Jln Pramuka Pasar Baru','081236677712','Laki-Laki','S1','Pj Mobil','R-002'),('TRC-03','Joni Pertama Surya, SH','1988-05-05','Jln Hayam Wuruk','08234758345','Laki-Laki','S1','Anggota','R-001'),('TRC-04','Surya Hendra','1986-01-20','Jln Adam Malik','08137563845','Laki-Laki','SMA/Sederajat','Pelaporan','R-001');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `userpassword` varchar(50) DEFAULT NULL,
  `userhakakses` varchar(15) DEFAULT NULL,
  `userfoto` text,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`userid`,`username`,`userpassword`,`userhakakses`,`userfoto`) values (1,'Ryan','202cb962ac59075b964b07152d234b70','Admin',NULL),(2,'Budi','202cb962ac59075b964b07152d234b70','pimpinan',NULL),(3,'Edison','202cb962ac59075b964b07152d234b70','pusdalops',NULL),(4,'Mikal','202cb962ac59075b964b07152d234b70','trc',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
