-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2016 at 08:25 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_pramuka`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(64) NOT NULL DEFAULT '',
  `level` varchar(1) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `level`) VALUES
(1, 'ayam', 'bffa783a022fe2d98692014dda6d7a4c', '0');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
  `idanggota` varchar(15) NOT NULL DEFAULT '',
  `nama_anggota` varchar(50) NOT NULL DEFAULT '',
  `jenis_kelamin` varchar(1) NOT NULL DEFAULT '',
  `agama` varchar(20) NOT NULL DEFAULT '',
  `golongan_darah` varchar(2) NOT NULL DEFAULT '',
  `alamat` longtext NOT NULL,
  `idkwaran` varchar(10) NOT NULL DEFAULT '',
  `idgudep` varchar(10) NOT NULL DEFAULT '',
  `kode_gudep` varchar(4) NOT NULL DEFAULT '',
  `keahlian` varchar(50) NOT NULL DEFAULT '',
  `subkeahlian` varchar(2) NOT NULL,
  `foto` varchar(255) NOT NULL DEFAULT '',
  `golongan` varchar(45) NOT NULL DEFAULT '',
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  PRIMARY KEY (`idanggota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`idanggota`, `nama_anggota`, `jenis_kelamin`, `agama`, `golongan_darah`, `alamat`, `idkwaran`, `idgudep`, `kode_gudep`, `keahlian`, `subkeahlian`, `foto`, `golongan`, `tempat_lahir`, `tanggal_lahir`) VALUES
('1238128312', 'Wandi Shahid', 'L', 'PROTESTAN', 'A', 'Sumedang', '1', '2', '1039', 'Krida Pertanian dan Tanaman Pangan', '1', 'f8a6cd4d3e58c3241c09d5897db19422.jpg', 'SIAGA', 'Sumedang', '1990-01-18'),
('312312312', 'Dadang', 'P', 'KHATOLIK', 'B', 'Cikarang Utara', '1', '2', '1040', '2', '1', '5a3cd4b367517cc5f6716341bd1953c3.jpg', 'PENGGALANG', '', '0000-00-00'),
('3123123121', 'jajang', 'L', 'KHATOLIK', 'A', 'jawa', '1', '2', '1039', '1', '1', '2a5f24b942bea2e0751871a5ba04edc4.jpg', 'PENGGALANG', '', '0000-00-00'),
('31237137128312', 'ridwan Maulain ', 'L', 'KHATOLIK', 'A', 'Sumedang utara', '1', '2', '1039', '1', '1', '14ea2aecde96ab2644f7c75f4d516754.jpg', 'PEMBINA', '', '0000-00-00'),
('3129389128', 'Anggot', 'P', 'KHATOLIK', 'A', 'Alamat', '1', '', '1040', '', '', 'aed22290411f12fb8ec46d9e79cd52ed.jpg', 'PENGGALANG', 'Sumedang Selatan', '1980-02-16'),
('390123128', 'Menuju Senja', 'L', 'KHATOLIK', 'A', 'Mana Aja gak boleh tau ', '1', '2', '1039', 'Krida Pertanian Tanaman Perkebunan', '', '47e64a8dabff53305b3e4074c8937efa.jpg', 'PENGGALANG', 'Bandung', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `gudep`
--

CREATE TABLE IF NOT EXISTS `gudep` (
  `idgudep` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idkwaran` varchar(2) NOT NULL DEFAULT '',
  `gudep_putra` varchar(4) NOT NULL DEFAULT '',
  `gudep_putri` varchar(4) NOT NULL DEFAULT '',
  `keterangan` longtext NOT NULL,
  `nama_gudep` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`idgudep`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `gudep`
--

INSERT INTO `gudep` (`idgudep`, `idkwaran`, `gudep_putra`, `gudep_putri`, `keterangan`, `nama_gudep`) VALUES
(1, '1', '1037', '1038', 'SDN sukamulya wado', 'SDN SUKAMULAYA'),
(2, '1', '1039', '1040', 'Sdn cimungkal wado', 'SDN CIMUNGKAL'),
(4, '1', '1043', '1044', 'Cilndak', 'SDN CILANDAKs'),
(5, '1', '1045', '1046', 'SDN CIKAWUNG kecamatan wado', 'SDN CIKAWUNG');

-- --------------------------------------------------------

--
-- Table structure for table `keahlian`
--

CREATE TABLE IF NOT EXISTS `keahlian` (
  `idkeahlian` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_keahlian` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`idkeahlian`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `keahlian`
--

INSERT INTO `keahlian` (`idkeahlian`, `nama_keahlian`) VALUES
(1, 'Bhayangkara (Kepolisian)'),
(2, 'Tarunabumi (Pertanian)'),
(3, 'Wanabakti (Kehutanan)'),
(4, 'Bhaktihusada (Kesehatan)'),
(5, 'Kencana (Keluarga Berencana)'),
(6, 'Wirakartika (TNI AD)');

-- --------------------------------------------------------

--
-- Table structure for table `kwaran`
--

CREATE TABLE IF NOT EXISTS `kwaran` (
  `idkwaran` int(2) unsigned NOT NULL DEFAULT '0',
  `idkwarcab` int(10) unsigned NOT NULL DEFAULT '0',
  `keterangan` longtext NOT NULL,
  `nama_kwaran` varchar(50) NOT NULL DEFAULT '',
  `username` varchar(45) NOT NULL DEFAULT '',
  `password` varchar(64) NOT NULL DEFAULT '',
  PRIMARY KEY (`idkwaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kwaran`
--

INSERT INTO `kwaran` (`idkwaran`, `idkwarcab`, `keterangan`, `nama_kwaran`, `username`, `password`) VALUES
(1, 1, 'cabang admin wado', 'Wado', 'admin', '11'),
(2, 1, 'Admin cabang', 'Jatinunggal', 'admin', '22'),
(3, 1, 'Admin cabang', 'Darmaraja', 'admin', '33'),
(4, 1, 'admin cabang', 'Cibugel', 'eka_sumpena', 'masukah'),
(5, 1, 'admin cabang', 'Cisitu', 'admin', '55'),
(6, 1, 'admin cabang', 'Situraja', 'admin', '66'),
(7, 1, 'admin cabang', 'Conggeang', 'admin', '77'),
(8, 1, 'admin cabang', 'Paseh', 'admin', '88'),
(9, 1, 'admin cabang', 'Surian', 'admin', '99'),
(10, 1, 'masukah', 'Buah Dua', 'tidakadaspaciada', 'masukah'),
(11, 1, 'admin cabang', 'Tanjung Sari', 'admin', '123'),
(12, 1, 'admin cabang', 'Sukasari', 'admin', '234'),
(13, 1, 'admin cabang', 'Pamulihan', 'admin', '345'),
(14, 1, 'admin cabang', 'Cimanggung', 'admin', '456'),
(15, 1, 'admin cabang', 'Jatinangor', 'admin', '567'),
(16, 1, 'admin cabang', 'Racakalong', 'admin', '678'),
(17, 1, 'admin cabang', 'Sumedang Selatan', 'admin', '789'),
(18, 1, 'admin cabang', 'Sumedang Utara', 'admin', '891'),
(19, 1, 'admin cabang', 'Ganeas', 'admins', '923'),
(20, 1, 'admin cabang', 'Tanjungkerta', 'admin', '924'),
(21, 1, 'admin cabang', 'Tanjungmedar', 'admin', '925'),
(22, 1, 'admin cabang', 'Cimalaka', 'admin', '926'),
(23, 1, 'admin cabang', 'Cisarua', 'admin', '927'),
(24, 1, 'admin cabang', 'Tomo', 'tidakAdaSpasi', '928'),
(25, 1, 'admin cabang', 'Ujungjaya', 'admin', '929'),
(26, 1, 'admin cabang', 'Jatigede', 'admin', '930'),
(27, 1, 'admin cabang', 'Kab.Sumedang', 'admin', '931'),
(90, 1, 'a', 'Tiak ada spasi', 'eka_sumpena', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `kwarcab`
--

CREATE TABLE IF NOT EXISTS `kwarcab` (
  `idkwarcab` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) NOT NULL DEFAULT '',
  `username` varchar(45) NOT NULL DEFAULT '',
  `password` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`idkwarcab`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `kwarcab`
--

INSERT INTO `kwarcab` (`idkwarcab`, `nama`, `username`, `password`) VALUES
(1, 'Sumedang', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `subkeahlian`
--

CREATE TABLE IF NOT EXISTS `subkeahlian` (
  `idsub` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idkeahlian` varchar(2) NOT NULL DEFAULT '',
  `nama_sub` varchar(70) NOT NULL DEFAULT '',
  PRIMARY KEY (`idsub`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `subkeahlian`
--

INSERT INTO `subkeahlian` (`idsub`, `idkeahlian`, `nama_sub`) VALUES
(1, '1', 'Krida Ketertiban Masyarakat'),
(2, '1', 'Krida Lalu Lintas'),
(3, '1', 'Krida Pencegahan dan Penaggulangan Bencana'),
(4, '1', 'Krida Tindakan Pertama Tempat Kejadian Kejadian Perkara (TPKP)'),
(5, '2', 'Krida Pertanian dan Tanaman Pangan'),
(6, '2', 'Krida Pertanian Tanaman Perkebunan'),
(7, '2', 'Krida Perikanan'),
(8, '2', 'Krida Peternakan'),
(9, '2', 'Krida Pertanian Tanaman Holtikultura'),
(10, '3', 'Krida Pertanian dan Tanaman Pangan'),
(11, '3', 'Krida Pertanian Tanaman Perkebunan'),
(12, '3', 'Krida Perikanan'),
(13, '3', 'Krida Peternakan'),
(14, '3', 'Krida Pertanian Tanaman Holtikultura'),
(15, '4', 'Krida Bina Lingkungan Sehat'),
(16, '4', 'Krida Bina Keluarga Sehat'),
(17, '4', 'Krida Penanggulangan Penyakit'),
(18, '4', 'Krida Bina Gizi'),
(19, '4', 'Krida Bina Obat'),
(20, '4', 'Krida Bina Obat'),
(21, '5', 'Krida Bina Keluarga Berencana dan Kesehatan Reproduksi (KB dan KR)'),
(22, '5', 'Krida Bina Keluarga Sejahtera dan Pemberdayaan Keluarga (KS dan PK)'),
(23, '5', 'Krida Advokasi dan Komunikasi Informasi Edukasi (Advokasi dan KIE)'),
(24, '5', 'Krida Bina Peran Serta Masyarakat (PSM)'),
(25, '5', 'Krida Survival'),
(26, '6', 'Krida Pioner'),
(27, '6', 'Krida Mountainering'),
(28, '6', 'Krida Navigasi Darat'),
(29, '6', 'Krida Bintal Juang');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
