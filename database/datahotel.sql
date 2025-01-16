-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.21-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for datahotel
CREATE DATABASE IF NOT EXISTS `datahotel` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `datahotel`;

-- Dumping structure for table datahotel.tbl_checkin
CREATE TABLE IF NOT EXISTS `tbl_checkin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idtamu` int(11) DEFAULT NULL,
  `idkamar` int(11) DEFAULT NULL,
  `checkin` date DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `status` enum('1','2') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tbl_checkin_tbl_tamu` (`idtamu`),
  KEY `FK_tbl_checkin_tbl_kamar` (`idkamar`),
  CONSTRAINT `FK_tbl_checkin_tbl_kamar` FOREIGN KEY (`idkamar`) REFERENCES `tbl_kamar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_tbl_checkin_tbl_tamu` FOREIGN KEY (`idtamu`) REFERENCES `tbl_tamu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table datahotel.tbl_checkin: ~5 rows (approximately)
/*!40000 ALTER TABLE `tbl_checkin` DISABLE KEYS */;
INSERT INTO `tbl_checkin` (`id`, `idtamu`, `idkamar`, `checkin`, `duration`, `status`) VALUES
	(1, 1, 3, '2021-10-01', 2, '2'),
	(2, 1, 4, '2021-10-12', 1, '2'),
	(3, 1, 5, '2021-10-13', 3, '1'),
	(4, 5, 7, '2021-10-23', 4, '1'),
	(5, 4, 6, '2021-10-18', 1, '1');
/*!40000 ALTER TABLE `tbl_checkin` ENABLE KEYS */;

-- Dumping structure for table datahotel.tbl_fasilitas
CREATE TABLE IF NOT EXISTS `tbl_fasilitas` (
  `idfasilitas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_fasilitas` varchar(50) DEFAULT NULL,
  `type` enum('1','2') DEFAULT NULL,
  PRIMARY KEY (`idfasilitas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table datahotel.tbl_fasilitas: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_fasilitas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_fasilitas` ENABLE KEYS */;

-- Dumping structure for table datahotel.tbl_fasilitashotel
CREATE TABLE IF NOT EXISTS `tbl_fasilitashotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idfasilitas` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tbl_fasilitashotel_tbl_fasilitas` (`idfasilitas`),
  CONSTRAINT `FK_tbl_fasilitashotel_tbl_fasilitas` FOREIGN KEY (`idfasilitas`) REFERENCES `tbl_fasilitas` (`idfasilitas`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table datahotel.tbl_fasilitashotel: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_fasilitashotel` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_fasilitashotel` ENABLE KEYS */;

-- Dumping structure for table datahotel.tbl_hotel
CREATE TABLE IF NOT EXISTS `tbl_hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `bintang` enum('1','2','3','4','5') DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table datahotel.tbl_hotel: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_hotel` DISABLE KEYS */;
INSERT INTO `tbl_hotel` (`id`, `nama`, `bintang`, `alamat`, `email`, `phone`) VALUES
	(1, 'Mentari', '4', 'Jl. Ciheulang no 20 Bandung', 'mentarihotel@gmail.com', '022-4563475');
/*!40000 ALTER TABLE `tbl_hotel` ENABLE KEYS */;

-- Dumping structure for table datahotel.tbl_kamar
CREATE TABLE IF NOT EXISTS `tbl_kamar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nokamar` varchar(10) DEFAULT NULL,
  `idtipekamar` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `allotment` int(11) DEFAULT NULL,
  `picture` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tbl_kamar_tbl_tipekamar` (`idtipekamar`),
  CONSTRAINT `FK_tbl_kamar_tbl_tipekamar` FOREIGN KEY (`idtipekamar`) REFERENCES `tbl_tipekamar` (`idkamar`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table datahotel.tbl_kamar: ~5 rows (approximately)
/*!40000 ALTER TABLE `tbl_kamar` DISABLE KEYS */;
INSERT INTO `tbl_kamar` (`id`, `nokamar`, `idtipekamar`, `price`, `allotment`, `picture`) VALUES
	(3, '101', 2, 450000, 1, NULL),
	(4, '102', 2, 450000, 1, NULL),
	(5, '201', 4, 500000, 1, NULL),
	(6, '202', 4, 500000, 1, NULL),
	(7, '301', 5, 600000, 1, NULL);
/*!40000 ALTER TABLE `tbl_kamar` ENABLE KEYS */;

-- Dumping structure for table datahotel.tbl_tamu
CREATE TABLE IF NOT EXISTS `tbl_tamu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table datahotel.tbl_tamu: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_tamu` DISABLE KEYS */;
INSERT INTO `tbl_tamu` (`id`, `nama`, `alamat`, `email`, `phone`) VALUES
	(1, 'Bambang', 'Jakarta', 'Bambang07@gmail.com', '4563456'),
	(3, 'Wahyudi', 'Medan', 'wahyudi@gmail.com', '081264074671 '),
	(4, 'Manda', 'Pontianak', 'manda@gmail.com', '081424870673'),
	(5, 'Sabari', 'Surabaya', 'sabari@gmail.com', '081264472876 ');
/*!40000 ALTER TABLE `tbl_tamu` ENABLE KEYS */;

-- Dumping structure for table datahotel.tbl_tipekamar
CREATE TABLE IF NOT EXISTS `tbl_tipekamar` (
  `idkamar` int(11) NOT NULL AUTO_INCREMENT,
  `kodekamar` varchar(5) NOT NULL DEFAULT '0',
  `namatipe` varchar(50) DEFAULT NULL,
  `ukuran` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idkamar`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table datahotel.tbl_tipekamar: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_tipekamar` DISABLE KEYS */;
INSERT INTO `tbl_tipekamar` (`idkamar`, `kodekamar`, `namatipe`, `ukuran`) VALUES
	(2, 'STR', 'Standar Room', '2 x 3'),
	(4, 'DLX', 'Deluxe Room', '3 x 3'),
	(5, 'StS', 'Suite Room', '4 x 5');
/*!40000 ALTER TABLE `tbl_tipekamar` ENABLE KEYS */;

-- Dumping structure for table datahotel.tbl_user
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `aktif` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table datahotel.tbl_user: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` (`iduser`, `username`, `password`, `nama_lengkap`, `aktif`) VALUES
	(1, 'admin', '3563b8d6d16fd0c6528a25629e5e81d881e097a2e3d5c9ac73c9695f53019998068cd05959bebb97f62af4d24e694c495f52f1b1002409087a4c50cbe1c9d877', 'Admin', 'Y');
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
