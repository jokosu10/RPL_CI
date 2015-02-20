-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2015 at 06:55 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_pklb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kerusakan`
--

CREATE TABLE IF NOT EXISTS `tbl_kerusakan` (
  `ID_Kerusakan` int(15) NOT NULL AUTO_INCREMENT,
  `ID_User` int(15) NOT NULL,
  `ID_Meja` int(15) NOT NULL,
  `Keterangan_Kerusakan` varchar(50) NOT NULL,
  `Tgl_Kerusakan` date NOT NULL,
  `Keterangan_Perbaikan` varchar(100) NOT NULL,
  `Tgl_Selesai` date NOT NULL,
  PRIMARY KEY (`ID_Kerusakan`),
  KEY `ID_User` (`ID_User`,`ID_Meja`),
  KEY `ID_Meja` (`ID_Meja`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_kerusakan`
--

INSERT INTO `tbl_kerusakan` (`ID_Kerusakan`, `ID_User`, `ID_Meja`, `Keterangan_Kerusakan`, `Tgl_Kerusakan`, `Keterangan_Perbaikan`, `Tgl_Selesai`) VALUES
(5, 3, 158, 'rusak', '2014-12-26', 'sudah di ganti mousenya', '2014-12-31'),
(6, 3, 160, 'rusak lagi', '2014-12-26', 'sudah di perbaiki', '2014-12-26'),
(7, 3, 161, 'rusaklagi', '2014-12-26', 'sudah di perbaiki', '2014-12-30'),
(8, 4, 179, 'jaringan sering putus', '2015-01-01', 'sudah di ganti konektor rj 45', '2015-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lab`
--

CREATE TABLE IF NOT EXISTS `tbl_lab` (
  `ID_lab` int(15) NOT NULL AUTO_INCREMENT,
  `Nama_lab` varchar(20) NOT NULL,
  `Total_meja` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_lab`),
  KEY `ID_lab` (`ID_lab`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_lab`
--

INSERT INTO `tbl_lab` (`ID_lab`, `Nama_lab`, `Total_meja`) VALUES
(17, 'abc1', '21 '),
(18, 'coba10', '21 '),
(19, 'coba7', '13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE IF NOT EXISTS `tbl_login` (
  `ID_User` int(15) NOT NULL AUTO_INCREMENT,
  `Nama_User` varchar(15) NOT NULL,
  `Status_User` varchar(10) NOT NULL,
  `Pass_User` varchar(15) NOT NULL,
  PRIMARY KEY (`ID_User`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`ID_User`, `Nama_User`, `Status_User`, `Pass_User`) VALUES
(3, 'joko', 'Teknisi', '123'),
(4, 'susilo', 'User', 'asd'),
(5, 'kabag', 'Kabag', 'KBG');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_meja`
--

CREATE TABLE IF NOT EXISTS `tbl_meja` (
  `ID_meja` int(15) NOT NULL AUTO_INCREMENT,
  `NoUrut_meja` varchar(10) NOT NULL,
  `ID_lab` int(15) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID_meja`),
  KEY `ID_lab` (`ID_lab`),
  KEY `ID_lab_2` (`ID_lab`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=192 ;

--
-- Dumping data for table `tbl_meja`
--

INSERT INTO `tbl_meja` (`ID_meja`, `NoUrut_meja`, `ID_lab`, `Status`) VALUES
(157, '1', 17, 0),
(158, '1', 18, 0),
(159, '2', 18, 0),
(160, '3', 18, 0),
(161, '4', 18, 0),
(162, '5', 18, 0),
(163, '6', 18, 0),
(164, '7', 18, 0),
(165, '8', 18, 0),
(166, '9', 18, 0),
(167, '10', 18, 0),
(168, '11', 18, 0),
(169, '12', 18, 0),
(170, '13', 18, 0),
(171, '14', 18, 0),
(172, '15', 18, 0),
(173, '16', 18, 0),
(174, '17', 18, 0),
(175, '18', 18, 0),
(176, '19', 18, 0),
(177, '20', 18, 0),
(178, '21', 18, 0),
(179, '1', 19, 0),
(180, '2', 19, 0),
(181, '3', 19, 0),
(182, '4', 19, 0),
(183, '5', 19, 0),
(184, '6', 19, 0),
(185, '7', 19, 0),
(186, '8', 19, 0),
(187, '9', 19, 0),
(188, '10', 19, 0),
(189, '11', 19, 0),
(190, '12', 19, 0),
(191, '13', 19, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_kerusakan`
--
ALTER TABLE `tbl_kerusakan`
  ADD CONSTRAINT `tbl_kerusakan_ibfk_1` FOREIGN KEY (`ID_User`) REFERENCES `tbl_login` (`ID_User`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_kerusakan_ibfk_2` FOREIGN KEY (`ID_Meja`) REFERENCES `tbl_meja` (`ID_meja`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_meja`
--
ALTER TABLE `tbl_meja`
  ADD CONSTRAINT `tbl_meja_ibfk_3` FOREIGN KEY (`ID_lab`) REFERENCES `tbl_lab` (`ID_lab`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
