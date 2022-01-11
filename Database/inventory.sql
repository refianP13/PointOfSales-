-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2013 at 05:00 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` varchar(16) NOT NULL,
  `id_jenis` varchar(10) NOT NULL,
  `nm_barang` varchar(30) NOT NULL,
  `stok` int(11) NOT NULL,
  `hrg_beli` int(11) NOT NULL,
  `hrg_jual` int(11) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_jenis`, `nm_barang`, `stok`, `hrg_beli`, `hrg_jual`) VALUES
('B00000001', 'JB001', 'WATERPASS 60CM', 299, 20000, 25000),
('B00000002', 'JB001', 'METERAN ONI 50M', 313, 10000, 15000),
('B00000003', 'JB002', 'PAKU TEMBAK ETONA F 25 (BOX)', 323, 32000, 35000),
('B00000004', 'JB002', 'PAKU 7CM (KG)', 102, 12000, 14000),
('B00000005', 'JB002', 'PAKU 5CM (KG)', 537, 12000, 14000),
('B00000006', 'JB002', 'PAKU 2CM (KG)', 524, 13000, 15000),
('B00000007', 'JB003', 'METROLITE CAT TEMBOK 3LITER', 596, 50000, 72000),
('B00000008', 'JB003', 'METROLITE CAT TEMBOK 1KG', 284, 15000, 20000),
('B00000009', 'JB003', 'DULUX PEARL GLO 2.5 LITER', 389, 152000, 180000),
('B00000010', 'JB003', 'CAT TEMBOX MOWILEX 2.5LT WARNA', 230, 100000, 120000);

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE IF NOT EXISTS `barang_keluar` (
  `id_keluar` varchar(30) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `id_user` varchar(16) NOT NULL,
  `id_outlet` varchar(16) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_keluar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_keluar`, `tgl_keluar`, `id_user`, `id_outlet`, `time`) VALUES
('OUT1014201300001', '2013-10-14', '00', 'MB001', '2013-10-14 14:11:02'),
('OUT1014201300002', '2013-10-14', '00', 'MB001', '2013-10-14 14:11:32'),
('OUT1111201300003', '2013-11-11', '', 'RB002', '2013-11-11 07:59:34'),
('OUT1111201300004', '2013-11-11', '001', 'RB002', '2013-11-11 08:04:56'),
('OUT1114201300005', '2013-11-14', '001', 'RB001', '2013-11-14 08:16:06'),
('OUT1119201300006', '2013-11-19', '001', 'RB001', '2013-11-19 07:14:54'),
('OUT1125201300007', '2013-11-25', '001', 'RB001', '2013-11-25 07:39:32');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE IF NOT EXISTS `barang_masuk` (
  `id_masuk` varchar(16) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `id_user` varchar(16) NOT NULL,
  `id_supplier` varchar(16) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_masuk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_masuk`, `tgl_masuk`, `id_user`, `id_supplier`, `time`) VALUES
('RES1024201300001', '2013-10-24', '00', 'SUP-001', '0000-00-00 00:00:00'),
('RES1024201300002', '2013-10-24', '00', 'SUP-001', '2013-10-24 03:46:36'),
('RES1107201300003', '2013-11-07', '00', 'SUP-001', '2013-11-07 03:45:58'),
('RES1114201300004', '2013-11-14', '001', 'SUP-002', '2013-11-14 08:11:40'),
('RES1114201300005', '2013-11-14', '001', 'SUP-001', '2013-11-14 08:16:54'),
('RES1125201300006', '2013-11-25', '001', 'SUP-001', '2013-11-25 07:36:28');

-- --------------------------------------------------------

--
-- Table structure for table `barang_outlet`
--

CREATE TABLE IF NOT EXISTS `barang_outlet` (
  `id_outlet` varchar(16) NOT NULL,
  `id_barang` varchar(16) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_outlet`
--

INSERT INTO `barang_outlet` (`id_outlet`, `id_barang`, `stok`) VALUES
('RB001', 'B00000001', 107),
('RB001', 'B00000002', 20),
('RB001', 'B00000003', 84),
('RB001', 'B00000004', 30),
('RB001', 'B00000005', 20);

-- --------------------------------------------------------

--
-- Table structure for table `detail_barang_keluar`
--

CREATE TABLE IF NOT EXISTS `detail_barang_keluar` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `id_keluar` varchar(16) NOT NULL,
  `id_barang` varchar(16) NOT NULL,
  `stok_awal` int(11) NOT NULL,
  `jml_keluar` int(11) NOT NULL,
  `hrg_beli` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=90 ;

--
-- Dumping data for table `detail_barang_keluar`
--

INSERT INTO `detail_barang_keluar` (`no`, `id_keluar`, `id_barang`, `stok_awal`, `jml_keluar`, `hrg_beli`, `sub_total`, `time`) VALUES
(70, 'OUT1014201300001', 'B00000001', 400, 10, 20000, 200000, '2013-10-14 14:05:46'),
(71, 'OUT1014201300001', 'B00000001', 390, 1, 20000, 20000, '2013-10-14 14:06:58'),
(72, 'OUT1014201300001', 'B00000001', 389, 1, 20000, 20000, '2013-10-14 14:08:09'),
(73, 'OUT1014201300002', 'B00000001', 388, 1, 20000, 20000, '2013-10-14 14:11:29'),
(74, 'OUT1111201300003', 'B00000001', 393, 12, 20000, 240000, '2013-11-11 07:59:11'),
(75, 'OUT1111201300003', 'B00000002', 366, 20, 10000, 200000, '2013-11-11 07:59:23'),
(76, 'OUT1111201300004', 'B00000001', 381, 10, 20000, 200000, '2013-11-11 08:04:05'),
(77, 'OUT1111201300004', 'B00000002', 346, 2, 10000, 20000, '2013-11-11 08:04:18'),
(78, 'OUT1111201300004', 'B00000003', 360, 5, 32000, 160000, '2013-11-11 08:04:30'),
(79, 'OUT1111201300004', 'B00000004', 164, 35, 12000, 420000, '2013-11-11 08:04:41'),
(80, 'OUT1114201300005', 'B00000001', 399, 20, 20000, 400000, '2013-11-14 08:15:49'),
(81, 'OUT1114201300005', 'B00000002', 356, 50, 10000, 500000, '2013-11-14 08:16:00'),
(82, 'OUT1119201300006', 'B00000001', 377, 77, 20000, 1540000, '2013-11-19 07:14:24'),
(83, 'OUT1119201300006', 'B00000002', 314, 14, 10000, 140000, '2013-11-19 07:14:34'),
(84, 'OUT1119201300006', 'B00000003', 360, 60, 32000, 1920000, '2013-11-19 07:14:45'),
(85, 'OUT1125201300007', 'B00000001', 334, 34, 20000, 680000, '2013-11-25 07:38:34'),
(86, 'OUT1125201300007', 'B00000002', 324, 10, 10000, 100000, '2013-11-25 07:38:48'),
(87, 'OUT1125201300007', 'B00000003', 349, 25, 32000, 800000, '2013-11-25 07:39:00'),
(88, 'OUT1125201300007', 'B00000004', 133, 30, 12000, 360000, '2013-11-25 07:39:10'),
(89, 'OUT1125201300007', 'B00000005', 558, 20, 12000, 240000, '2013-11-25 07:39:22');

-- --------------------------------------------------------

--
-- Table structure for table `detail_barang_masuk`
--

CREATE TABLE IF NOT EXISTS `detail_barang_masuk` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `id_masuk` varchar(16) NOT NULL,
  `id_barang` varchar(16) NOT NULL,
  `stok_awal` int(11) NOT NULL,
  `jml_masuk` int(11) NOT NULL,
  `hrg_beli` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `detail_barang_masuk`
--

INSERT INTO `detail_barang_masuk` (`no`, `id_masuk`, `id_barang`, `stok_awal`, `jml_masuk`, `hrg_beli`, `sub_total`, `time`) VALUES
(4, 'RES1024201300001', 'B00000001', 110, 300, 20000, 6000000, '2013-10-24 03:43:37'),
(5, 'RES1024201300001', 'B00000002', 112, 250, 10000, 2500000, '2013-10-24 03:43:44'),
(6, 'RES1024201300001', 'B00000003', 112, 250, 32000, 8000000, '2013-10-24 03:43:51'),
(7, 'RES1024201300001', 'B00000004', 14, 150, 12000, 1800000, '2013-10-24 03:43:56'),
(8, 'RES1024201300001', 'B00000005', 28, 500, 12000, 6000000, '2013-10-24 03:42:58'),
(9, 'RES1024201300001', 'B00000006', 25, 500, 13000, 6500000, '2013-10-24 03:43:03'),
(10, 'RES1024201300001', 'B00000007', 96, 500, 50000, 25000000, '2013-10-24 03:43:08'),
(11, 'RES1024201300001', 'B00000008', 88, 200, 15000, 3000000, '2013-10-24 03:43:15'),
(12, 'RES1024201300001', 'B00000009', 90, 300, 152000, 45600000, '2013-10-24 03:43:23'),
(13, 'RES1024201300001', 'B00000010', 80, 150, 100000, 15000000, '2013-10-24 03:43:30'),
(14, 'RES1024201300002', 'B00000002', 362, 10, 10000, 100000, '2013-10-24 03:46:33'),
(15, 'RES1107201300003', 'B00000001', 384, 9, 20000, 20000, '2013-11-07 03:40:05'),
(16, 'RES1107201300003', 'B00000002', 361, 5, 10000, 50000, '2013-11-07 03:43:13'),
(17, 'RES1114201300004', 'B00000001', 389, 10, 20000, 200000, '2013-11-14 08:09:25'),
(18, 'RES1114201300004', 'B00000002', 344, 12, 10000, 120000, '2013-11-14 08:11:18'),
(19, 'RES1114201300004', 'B00000003', 355, 5, 32000, 160000, '2013-11-14 08:11:32'),
(20, 'RES1114201300005', 'B00000002', 306, 10, 10000, 100000, '2013-11-14 08:16:48'),
(21, 'RES1125201300006', 'B00000001', 299, 35, 20000, 700000, '2013-11-25 07:22:49'),
(22, 'RES1125201300006', 'B00000002', 299, 25, 10000, 250000, '2013-11-25 07:23:01'),
(23, 'RES1125201300006', 'B00000003', 299, 50, 32000, 1600000, '2013-11-25 07:23:12'),
(24, 'RES1125201300006', 'B00000004', 128, 5, 12000, 60000, '2013-11-25 07:23:22'),
(25, 'RES1125201300006', 'B00000005', 528, 30, 12000, 360000, '2013-11-25 07:23:39');

-- --------------------------------------------------------

--
-- Table structure for table `detail_jual`
--

CREATE TABLE IF NOT EXISTS `detail_jual` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `id_jual` varchar(30) NOT NULL,
  `id_barang` varchar(16) NOT NULL,
  `stok_awal` int(11) NOT NULL,
  `jml` int(11) NOT NULL,
  `hrg_jual` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `detail_jual`
--

INSERT INTO `detail_jual` (`no`, `id_jual`, `id_barang`, `stok_awal`, `jml`, `hrg_jual`, `sub_total`, `time`) VALUES
(1, 'RB00113112000001', 'B00000001', 77, 1, 25000, 25000, '2013-11-20 08:42:59'),
(2, 'RB00113112000001', 'B00000002', 14, 1, 15000, 15000, '2013-11-20 08:43:46'),
(3, 'RB00113112000001', 'B00000003', 60, 1, 35000, 35000, '2013-11-20 08:43:14'),
(4, 'RB00113112000002', 'B00000001', 76, 3, 25000, 75000, '2013-11-20 08:56:11'),
(5, 'RB00113112000002', 'B00000002', 13, 2, 15000, 30000, '2013-11-20 08:56:24'),
(6, 'RB00113112000003', 'B00000001', 300, 1, 25000, 25000, '2013-11-20 08:57:37'),
(7, 'RB00113112000003', 'B00000002', 300, 1, 15000, 15000, '2013-11-20 08:57:45'),
(8, 'RB00113112000003', 'B00000003', 300, 1, 35000, 35000, '2013-11-20 08:57:52'),
(9, 'RB00113112000003', 'B00000004', 129, 1, 14000, 14000, '2013-11-20 08:57:58'),
(10, 'RB00113112000004', 'B00000002', 11, 1, 15000, 15000, '2013-11-20 08:58:44'),
(11, 'RB00113112000005', 'B00000006', 525, 1, 15000, 15000, '2013-11-20 09:00:45'),
(12, 'RB00113112000005', 'B00000008', 287, 3, 20000, 60000, '2013-11-20 09:00:26'),
(13, 'RB00113112000005', 'B00000009', 390, 1, 180000, 180000, '2013-11-20 09:00:36'),
(14, 'RB00113112500006', '', 0, 0, 0, 0, '2013-11-25 08:57:24'),
(15, 'RB00113112500006', 'B00000001', 300, 1, 25000, 25000, '2013-11-25 08:56:29'),
(16, 'RB00113112500006', 'B00000002', 314, 1, 15000, 15000, '2013-11-25 08:56:38'),
(17, 'RB00113112500006', 'B00000003', 324, 1, 35000, 35000, '2013-11-25 08:56:49'),
(18, 'RB00113112500006', 'B00000004', 103, 1, 14000, 14000, '2013-11-25 08:56:59'),
(19, 'RB00113112500006', 'B00000005', 538, 1, 14000, 14000, '2013-11-25 08:57:11');

-- --------------------------------------------------------

--
-- Table structure for table `detail_retur`
--

CREATE TABLE IF NOT EXISTS `detail_retur` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `id_retur` varchar(16) NOT NULL,
  `id_barang` varchar(16) NOT NULL,
  `stok_awal` int(11) NOT NULL,
  `jml` int(11) NOT NULL,
  `hrg` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `detail_retur`
--

INSERT INTO `detail_retur` (`no`, `id_retur`, `id_barang`, `stok_awal`, `jml`, `hrg`, `sub_total`, `time`) VALUES
(1, 'RET1026201300001', 'B00000001', 387, 10, 20000, 200000, '2013-10-26 19:15:45'),
(2, 'RET1026201300001', 'B00000003', 361, 1, 32000, 32000, '2013-10-26 19:19:07'),
(3, 'RET1028201300002', 'B00000001', 377, 10, 20000, 200000, '2013-10-28 02:17:08'),
(4, 'RET1028201300003', 'B00000001', 387, 3, 20000, 60000, '2013-10-28 02:31:02'),
(5, 'RET1028201300003', 'B00000002', 371, 10, 10000, 100000, '2013-10-28 02:30:53'),
(6, 'RET1112201300004', 'B00000001', 371, 10, 20000, 200000, '2013-11-12 04:03:24'),
(7, 'RET1112201300005', 'B00000001', 381, 1, 20000, 20000, '2013-11-12 04:05:19'),
(8, 'RET1112201300006', 'B00000001', 382, 7, 20000, 100000, '2013-11-12 08:17:45');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE IF NOT EXISTS `jenis_barang` (
  `id_jenis` varchar(10) NOT NULL,
  `nm_jenis` varchar(30) NOT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`id_jenis`, `nm_jenis`) VALUES
('JB001', 'ALAT UKUR'),
('JB002', 'PAKU'),
('JB003', 'CAT TEMBOK'),
('JB004', 'CAT KAYU & BESI'),
('JB005', 'KAYU'),
('JB006', 'PIPA/PVC'),
('JB007', 'BESI'),
('JB008', 'KERAMIK'),
('JB009', 'PASIR'),
('JB010', 'BATU BATA'),
('JB011', 'SEMEN');

-- --------------------------------------------------------

--
-- Table structure for table `outlet`
--

CREATE TABLE IF NOT EXISTS `outlet` (
  `id_outlet` varchar(16) NOT NULL,
  `nm_outlet` varchar(30) NOT NULL,
  `almt_outlet` varchar(100) NOT NULL,
  `tlp_outlet` varchar(12) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`id_outlet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outlet`
--

INSERT INTO `outlet` (`id_outlet`, `nm_outlet`, `almt_outlet`, `tlp_outlet`, `password`) VALUES
('RB001', 'RAJA BANGUNAN 001', 'Jl. Jendral Sudirman No. 001 Palembang', '0711-587962', '123456'),
('RB002', 'RAJA BANGUNAN 002', 'Jl. Merdeka No. 69 Palembang', '0711-854632', '123456'),
('RB003', 'RAJA BANGUNAN 003', 'Jl. Basuki Rahmat No. 79 Palembang', '0711-687541', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `id_jual` varchar(30) NOT NULL,
  `tgl_jual` date NOT NULL,
  `pelanggan` varchar(30) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `id_outlet` varchar(16) NOT NULL,
  `total` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ket` varchar(20) NOT NULL,
  PRIMARY KEY (`id_jual`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_jual`, `tgl_jual`, `pelanggan`, `alamat`, `id_outlet`, `total`, `time`, `ket`) VALUES
('RB00113112000001', '2013-11-20', 'Riko', 'Jl. MP. Mangkunegara, Palembang', 'RB001', 75000, '2013-11-20 08:44:19', 'Stok Outlet'),
('RB00113112000002', '2013-11-20', 'Heru', 'Jl. Merdeka, Palembang', 'RB001', 105000, '2013-11-20 08:56:51', 'Stok Outlet'),
('RB00113112000003', '2013-11-20', 'Joni', 'Jl. Bungaran V, Palembang', 'RB001', 89000, '2013-11-20 08:58:23', 'Stok Gudang'),
('RB00113112000004', '2013-11-20', 'Didi', 'Palembang', 'RB001', 15000, '2013-11-20 09:00:03', 'Stok Outlet'),
('RB00113112000005', '2013-11-20', 'Iwan', 'Palembang', 'RB001', 255000, '2013-11-20 09:01:01', 'Stok Gudang'),
('RB00113112500006', '2013-11-25', 'Adi Susanto', 'Jl. Gubernur Bastari No.005, Palembang.', 'RB001', 103000, '2013-11-25 09:22:12', 'Stok Gudang');

-- --------------------------------------------------------

--
-- Table structure for table `retur_barang`
--

CREATE TABLE IF NOT EXISTS `retur_barang` (
  `id_retur` varchar(16) NOT NULL,
  `id_transaksi` varchar(16) NOT NULL,
  `id_user` varchar(16) NOT NULL,
  `tgl_retur` date NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  PRIMARY KEY (`id_retur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retur_barang`
--

INSERT INTO `retur_barang` (`id_retur`, `id_transaksi`, `id_user`, `tgl_retur`, `keterangan`) VALUES
('RET1026201300001', 'RES1024201300001', '00', '2013-10-26', 'Retur Barang Masuk'),
('RET1028201300002', 'OUT1014201300001', '00', '2013-10-28', 'Retur Barang Keluar'),
('RET1028201300003', 'RES1024201300001', '00', '2013-10-28', 'Retur Barang Masuk'),
('RET1112201300004', 'OUT1014201300001', '001', '2013-11-12', 'Retur Barang Keluar'),
('RET1112201300005', 'OUT1014201300002', '001', '2013-11-12', 'Retur Barang Keluar'),
('RET1112201300006', 'OUT1014201300001', '001', '2013-11-12', 'Retur Barang Keluar');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `id_supplier` varchar(16) NOT NULL,
  `nm_supplier` varchar(30) NOT NULL,
  `almt_supplier` varchar(100) NOT NULL,
  `tlp_supplier` varchar(12) NOT NULL,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nm_supplier`, `almt_supplier`, `tlp_supplier`) VALUES
('SUP-001', 'PT. SENANG SELALU', 'PALEMBANG', '654321'),
('SUP-002', 'PT. SEMOGA BAHAGIA', 'PALEMBANG', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `temp_barang`
--

CREATE TABLE IF NOT EXISTS `temp_barang` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `id_trx` varchar(30) NOT NULL,
  `id_barang` varchar(16) NOT NULL,
  `jml` int(11) NOT NULL,
  `hrg` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` varchar(16) NOT NULL,
  `nm_user` varchar(25) NOT NULL,
  `password` varchar(15) NOT NULL,
  `level` varchar(15) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nm_user`, `password`, `level`) VALUES
('001', 'imam', '123456', 'super admin'),
('002', 'Yunita', '123456', 'admin'),
('003', 'Lili', '123456', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
