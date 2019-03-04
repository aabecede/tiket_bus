-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2018 at 05:13 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_damri`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE IF NOT EXISTS `bus` (
`id` int(11) NOT NULL,
  `bus` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `idshet` int(11) NOT NULL,
  `idsopir` int(11) NOT NULL,
  `nopol` varchar(10) NOT NULL,
  `jumlahtiket` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `sttb` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`id`, `bus`, `status`, `idshet`, `idsopir`, `nopol`, `jumlahtiket`, `gambar`, `sttb`) VALUES
(7, 'DAMRI-Pr-0002', 3, 1, 12, 'P 7130 UQ', 50, 'PERINTIS.jpg', 0),
(8, 'DAMRI-Pr-0003', 3, 1, 13, 'P 7129 UQ', 50, 'PERINTIS.jpg', 0),
(9, 'DAMRI-M-0004', 4, 2, 14, 'P 7088 UT', 55, 'DAM1.JPG', 0),
(10, 'DAMRI-M-0004', 4, 2, 16, 'P 7089 UQ', 55, 'DAM1.JPG', 0),
(11, 'DAMRI-P-0004', 2, 2, 15, 'B 7221 WB', 55, '1.jpg', 0),
(12, 'DAMRI-P-0004', 2, 2, 17, 'B 7560 IW', 55, '1.jpg', 0),
(13, 'DAMRI-P-0004', 2, 2, 18, 'B 7564 IW', 55, '1.jpg', 1),
(14, 'DAMRI-P-0004', 2, 2, 19, 'B 7565 IW', 55, '1.jpg', 1),
(15, 'DAMRI-P-0004', 2, 2, 20, 'B 7562 IW', 55, '1.jpg', 0),
(16, 'DAMRI-B-0004', 1, 1, 21, 'p 9999 op', 50, 'pari1.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dari`
--

CREATE TABLE IF NOT EXISTS `dari` (
`id` int(11) NOT NULL,
  `idstat_bus` int(11) NOT NULL,
  `nama` char(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `dari`
--

INSERT INTO `dari` (`id`, `idstat_bus`, `nama`) VALUES
(1, 1, 'Bandara Jember'),
(2, 2, 'Jember'),
(3, 2, 'Surabaya'),
(4, 4, 'Jember'),
(5, 4, 'Surabya');

-- --------------------------------------------------------

--
-- Table structure for table `event_tiket`
--

CREATE TABLE IF NOT EXISTS `event_tiket` (
`id` int(11) NOT NULL,
  `event` char(30) NOT NULL,
  `mulai` date NOT NULL,
  `akhir` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `event_tiket`
--

INSERT INTO `event_tiket` (`id`, `event`, `mulai`, `akhir`) VALUES
(1, 'Lebaran', '2018-05-22', '2018-05-23');

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE IF NOT EXISTS `hari` (
`id` int(11) NOT NULL,
  `nama` char(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `hari`
--

INSERT INTO `hari` (`id`, `nama`) VALUES
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Jumat'),
(6, 'Sabtu'),
(7, 'Minggu');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
`id` int(11) NOT NULL,
  `idbus` int(11) NOT NULL,
  `dari` char(11) NOT NULL,
  `tujuan` int(11) NOT NULL,
  `berangkat` int(11) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `harga` int(16) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `idbus`, `dari`, `tujuan`, `berangkat`, `hari`, `harga`) VALUES
(5, 9, 'Tw Alun', 2, 3, '1', 40000),
(6, 9, 'Tw Alun', 5, 8, '4', 45000);

-- --------------------------------------------------------

--
-- Table structure for table `jamberangkat`
--

CREATE TABLE IF NOT EXISTS `jamberangkat` (
`id` int(11) NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `jamberangkat`
--

INSERT INTO `jamberangkat` (`id`, `jam`) VALUES
(1, '08:00:00'),
(2, '09:00:00'),
(3, '10:00:00'),
(4, '11:00:00'),
(5, '12:00:00'),
(6, '13:00:00'),
(7, '14:00:00'),
(8, '15:00:00'),
(9, '16:00:00'),
(10, '17:00:00'),
(11, '18:00:00'),
(12, '19:00:00'),
(13, '20:00:00'),
(14, '21:00:00'),
(15, '22:00:00'),
(16, '23:00:00'),
(17, '24:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `jdw_pariwisata`
--

CREATE TABLE IF NOT EXISTS `jdw_pariwisata` (
`id` int(11) NOT NULL,
  `tujuan` text NOT NULL,
  `durasi` varchar(25) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `jdw_pariwisata`
--

INSERT INTO `jdw_pariwisata` (`id`, `tujuan`, `durasi`, `harga`) VALUES
(3, 'Cibubur / Bekasi / Cimanggis / Cinere Depok / Ciledug / Serpong / Bintaro', '1 hari ( 24 Jam )', 2400000),
(5, 'Tangerang / Karawang / Sentul / Bogor Kota', '1 hari ( 12 Jam )', 6200000),
(8, 'Cisarua Puncak / Cinangneng / Caringin Bogor Lido / Salabintana / Cipanas Puncak Purwakarta / Sadang / Jati Luhur', '2 Hari 1 Malam', 7000000),
(12, 'Palabuhan Ratu Sukabumi / Citarik / Cianjur Anyer / Carita / Karang Bolong / Serang', 'Antar Jemput', 6400000),
(14, 'Bandung Kota / Dago / Lembang Ciater / Tangkuban Parahu Subang / Tanjung Lesung', '2 Hari 1 Malam', 7600000),
(16, 'Ujung Genteng / Pulau Umang', 'Paket 2 Hari', 8350000),
(17, 'Kediri / Tulung Agung / Blitar / Trenggalek / Pacitan / Magetan / Nganjuk / Ngawi ', '1 hari ( 12 Jam )', 5000000),
(18, 'Malang / Probolinggo / Bromo / Pasuruan / Mojokerto / Bangkalan / Bojonegoro / Lamongan', '1 hari', 3500000),
(19, 'Pamekasan, Jawa Timur', '1 hari (12 jam)', 2400000);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_sheet`
--

CREATE TABLE IF NOT EXISTS `jenis_sheet` (
`id` int(11) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `jumlah` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `jenis_sheet`
--

INSERT INTO `jenis_sheet` (`id`, `jenis`, `jumlah`) VALUES
(1, '2 - 2', '50'),
(2, '2 - 2', '55'),
(3, '2 - 3', '60');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_tiket`
--

CREATE TABLE IF NOT EXISTS `laporan_tiket` (
`id` int(11) NOT NULL,
  `idbus` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idjadwal` int(11) NOT NULL,
  `jumlahtiket` int(11) NOT NULL,
  `kursitiket` text NOT NULL,
  `status` char(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tgl_expired` datetime NOT NULL,
  `tgl_up` datetime NOT NULL,
  `bukti` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `laporan_tiket`
--

INSERT INTO `laporan_tiket` (`id`, `idbus`, `iduser`, `idjadwal`, `jumlahtiket`, `kursitiket`, `status`, `harga`, `total`, `tgl_expired`, `tgl_up`, `bukti`) VALUES
(3, 5, 2, 2, 5, '1,2,3,4,5', 'Tolak', 120000, 600000, '2018-05-26 11:14:02', '0000-00-00 00:00:00', ''),
(4, 5, 2, 2, 2, '9,10', '0', 120000, 240000, '2018-05-26 12:21:44', '0000-00-00 00:00:00', ''),
(5, 2, 2, 1, 3, '8,12,13', '0', 60000, 180000, '2018-05-26 15:05:40', '0000-00-00 00:00:00', ''),
(6, 5, 2, 2, 5, '35,37,41,47,48', '0', 120000, 600000, '2018-05-26 15:34:02', '0000-00-00 00:00:00', ''),
(7, 2, 2, 1, 4, '1,2,4,5', 'Tunggu Konfirmasi', 60000, 240000, '2018-05-29 13:25:44', '2018-05-29 06:05:24', 'index.jpg'),
(8, 5, 2, 2, 10, '1,6,11,16,21,26,31,36,41,46', 'Tunggu Konfirmasi', 120000, 1200000, '2018-05-29 14:00:52', '2018-05-29 06:05:05', 'index.jpg'),
(9, 2, 2, 1, 3, '12,13,14', '', 60000, 180000, '2018-05-29 15:10:03', '0000-00-00 00:00:00', ''),
(10, 2, 1, 4, 3, '1,6,7', 'Tunggu Konfirmasi', 60000, 180000, '2018-05-29 20:59:59', '2018-05-29 13:05:25', 'Untitled.png'),
(11, 2, 1, 3, 7, '21,22,23,24,25,26,27', '', 90000, 630000, '2018-05-29 21:14:57', '0000-00-00 00:00:00', ''),
(12, 2, 1, 1, 5, '1,2,3,4,5', 'Tunggu Konfirmasi', 60000, 300000, '2018-05-29 22:43:09', '2018-05-29 14:05:33', 'Untitled.png'),
(14, 9, 3, 5, 2, '1,2', 'Setujui', 30000, 60000, '2018-06-06 16:09:52', '2018-06-06 08:06:39', '1.jpg'),
(15, 9, 3, 5, 1, '3', '', 30000, 30000, '2018-06-06 18:18:20', '0000-00-00 00:00:00', ''),
(16, 9, 3, 5, 2, '4,8', '', 40000, 80000, '2018-06-06 22:51:21', '0000-00-00 00:00:00', ''),
(17, 9, 3, 6, 1, '1', 'Setujui', 45000, 45000, '2018-06-06 22:53:24', '2018-06-06 15:06:55', 'bukti bayar.jpg'),
(18, 9, 3, 5, 2, '1,2', 'Tunggu Konfirmasi', 40000, 80000, '2018-06-06 23:12:30', '2018-06-06 15:06:03', 'bukti bayar.jpg'),
(19, 9, 3, 5, 1, '8', '', 40000, 40000, '2018-06-06 23:20:22', '0000-00-00 00:00:00', ''),
(20, 9, 3, 5, 2, '1,2', '', 40000, 80000, '2018-06-06 23:25:01', '0000-00-00 00:00:00', ''),
(21, 9, 3, 5, 1, '4', 'Setujui', 40000, 40000, '2018-06-06 23:34:30', '0000-00-00 00:00:00', ''),
(22, 9, 3, 5, 1, '5', '', 40000, 40000, '2018-06-06 23:42:31', '0000-00-00 00:00:00', ''),
(23, 9, 3, 6, 2, '1,6', '', 45000, 90000, '2018-06-06 23:45:31', '0000-00-00 00:00:00', ''),
(24, 9, 3, 6, 1, '2', 'Tunggu Konfirmasi', 45000, 45000, '2018-06-06 23:48:55', '2018-06-06 15:06:48', 'bukti bayar.jpg'),
(25, 9, 3, 6, 1, '3', '', 45000, 45000, '2018-06-06 23:52:19', '0000-00-00 00:00:00', ''),
(26, 9, 3, 6, 1, '4', '', 45000, 45000, '2018-06-06 23:55:04', '0000-00-00 00:00:00', ''),
(27, 9, 3, 5, 1, '8', '', 40000, 40000, '2018-06-06 23:59:03', '0000-00-00 00:00:00', ''),
(28, 9, 3, 5, 1, '6', '', 40000, 40000, '2018-06-07 00:17:23', '0000-00-00 00:00:00', ''),
(29, 9, 3, 6, 1, '8', '', 45000, 45000, '2018-06-07 00:23:21', '0000-00-00 00:00:00', ''),
(30, 9, 3, 5, 1, '9', '', 40000, 40000, '2018-06-07 00:26:37', '0000-00-00 00:00:00', ''),
(31, 9, 3, 5, 1, '1', 'Setujui', 40000, 40000, '2018-06-07 00:49:13', '2018-06-06 16:06:37', 'scan.jpg'),
(32, 9, 3, 5, 1, '3', 'Tunggu Konfirmasi', 40000, 40000, '2018-06-07 00:51:47', '2018-06-06 16:06:09', 'scan.jpg'),
(33, 9, 3, 5, 1, '4', '', 40000, 40000, '2018-06-07 00:53:28', '0000-00-00 00:00:00', ''),
(34, 9, 3, 5, 1, '4', '', 40000, 40000, '2018-06-07 03:27:39', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
`id` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(25) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`, `nama`, `alamat`, `no_hp`) VALUES
(1, 'aab.peezz@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Abdul Jabbar', 'Kediri, Bandar Lor gang III no 19 C', '085608129137'),
(2, 'apemo@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'apez', 'jl. kh. wachid Hasym', ''),
(3, 'hestiw659@gmail.com', '9cb9d0e0fef84357248fdad69eb61354', 'hesti', 'jember', ''),
(4, 'mileaannisa28@gmail.com', '9cb9d0e0fef84357248fdad69eb61354', 'Hesti Lucu', 'jember', ''),
(5, 'hestiwulandari1@gmail.com', '9cb9d0e0fef84357248fdad69eb61354', 'hesti lucu', 'jember', '');

-- --------------------------------------------------------

--
-- Table structure for table `npemesanan_pariwisata`
--

CREATE TABLE IF NOT EXISTS `npemesanan_pariwisata` (
`id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idbus` varchar(10) NOT NULL,
  `tgl_b` date NOT NULL,
  `tgl_p` date NOT NULL,
  `berangkatdari` varchar(50) NOT NULL,
  `tgl_expied` datetime NOT NULL,
  `tgl_up` datetime NOT NULL,
  `jumkursi` int(11) NOT NULL,
  `jumbus` int(11) NOT NULL,
  `norek` varchar(20) NOT NULL,
  `an` char(20) NOT NULL,
  `tarif` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `DP` int(11) NOT NULL,
  `tujuan` char(11) NOT NULL,
  `bukti_tf` text NOT NULL,
  `status` char(30) NOT NULL,
  `buskem` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `npemesanan_pariwisata`
--

INSERT INTO `npemesanan_pariwisata` (`id`, `iduser`, `idbus`, `tgl_b`, `tgl_p`, `berangkatdari`, `tgl_expied`, `tgl_up`, `jumkursi`, `jumbus`, `norek`, `an`, `tarif`, `total`, `DP`, `tujuan`, `bukti_tf`, `status`, `buskem`) VALUES
(7, 3, '13,', '2018-06-06', '2018-06-07', 'Jember', '2018-06-07 09:33:17', '2018-06-06 16:06:44', 2, 1, '198752428', 'Sukatno', 8350000, 8350000, 2087500, '16', '1.jpg', 'SETUJU', 0),
(8, 3, '14,', '2018-06-06', '2018-06-07', 'Jember', '2018-06-07 09:37:22', '2018-06-06 16:06:01', 2, 1, '198752428', 'Sukatno', 7600000, 7600000, 1900000, '14', 'scan.jpg', 'SETUJU', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ntujuan`
--

CREATE TABLE IF NOT EXISTS `ntujuan` (
`id` int(11) NOT NULL,
  `nama` char(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ntujuan`
--

INSERT INTO `ntujuan` (`id`, `nama`) VALUES
(1, 'Surabaya'),
(2, 'Yogyakarta'),
(3, 'Denpasar'),
(4, 'Rawamangun'),
(5, 'Pasuruan');

-- --------------------------------------------------------

--
-- Table structure for table `paket_wisata`
--

CREATE TABLE IF NOT EXISTS `paket_wisata` (
`id` int(11) NOT NULL,
  `tujuan` text NOT NULL,
  `durasi` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `sheet` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `paket_wisata`
--

INSERT INTO `paket_wisata` (`id`, `tujuan`, `durasi`, `harga`, `sheet`) VALUES
(1, 'Ujung Genteng / Pulau Umang', 'Paket 2 Har', 8350000, 1),
(2, 'Pangandaran', 'Paket 2 Hari', 9500000, 1),
(3, 'Lampung', 'Paket 3 Hari', 11100000, 1),
(4, 'Jateng', 'Paket 3 Hari', 11850000, 1),
(5, 'JATIM', 'Paket 5 Hari', 18500000, 1),
(6, 'Madura / Palembang', 'Paket 5 Hari', 20850000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_tiket`
--

CREATE TABLE IF NOT EXISTS `pemesanan_tiket` (
`id` int(11) NOT NULL,
  `idbus` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idjadwal` int(11) NOT NULL,
  `jumlahtiket` int(11) NOT NULL,
  `kursitiket` text NOT NULL,
  `status` char(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tgl_expired` datetime NOT NULL,
  `tgl_up` datetime NOT NULL,
  `bukti` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `pemesanan_tiket`
--

INSERT INTO `pemesanan_tiket` (`id`, `idbus`, `iduser`, `idjadwal`, `jumlahtiket`, `kursitiket`, `status`, `harga`, `total`, `tgl_expired`, `tgl_up`, `bukti`) VALUES
(35, 9, 3, 6, 1, '3', 'Setujui', 45000, 45000, '2018-06-07 03:58:51', '2018-06-06 20:06:06', 'scan.jpg'),
(36, 9, 3, 5, 2, '1,2', 'Setujui', 40000, 80000, '2018-06-07 04:02:38', '2018-06-06 20:06:59', 'scan.jpg'),
(37, 9, 5, 5, 1, '3', 'Setujui', 40000, 40000, '2018-06-07 04:05:09', '2018-06-06 20:06:31', 'scan.jpg'),
(38, 9, 5, 5, 1, '10', 'Setujui', 40000, 40000, '2018-06-07 04:08:33', '2018-06-06 20:06:55', 'scan.jpg'),
(39, 9, 5, 5, 1, '8', 'Setujui', 40000, 40000, '2018-06-07 04:12:03', '2018-06-06 20:06:21', 'scan.jpg'),
(40, 9, 5, 6, 1, '12', 'Setujui', 45000, 45000, '2018-06-07 04:19:58', '2018-06-06 20:06:16', 'scan.jpg');

--
-- Triggers `pemesanan_tiket`
--
DELIMITER //
CREATE TRIGGER `add_to_laporan` AFTER DELETE ON `pemesanan_tiket`
 FOR EACH ROW begin
insert into laporan_tiket value
(old.id,
old.idbus,
old.iduser,
old.idjadwal,
old.jumlahtiket,
old.kursitiket,
old.status,
old.harga,
old.total,
old.tgl_expired,
old.tgl_up,
old.bukti);
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sheet`
--

CREATE TABLE IF NOT EXISTS `sheet` (
`id` int(11) NOT NULL,
  `idjsh` int(11) NOT NULL,
  `sheet1` int(11) NOT NULL,
  `sheet2` int(11) NOT NULL,
  `sheet3` int(11) NOT NULL,
  `sheet4` int(11) NOT NULL,
  `sheet5` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `sheet`
--

INSERT INTO `sheet` (`id`, `idjsh`, `sheet1`, `sheet2`, `sheet3`, `sheet4`, `sheet5`) VALUES
(1, 1, 1, 2, 3, 4, 5),
(2, 2, 1, 2, 3, 4, 5),
(3, 1, 6, 7, 8, 9, 10),
(4, 1, 11, 12, 13, 14, 15),
(5, 1, 16, 17, 18, 19, 20),
(6, 1, 21, 22, 23, 24, 25),
(7, 1, 26, 27, 28, 29, 30),
(8, 1, 31, 32, 33, 34, 35),
(9, 1, 36, 37, 38, 39, 40),
(10, 1, 41, 42, 43, 44, 45),
(11, 1, 46, 47, 48, 49, 50),
(12, 2, 6, 7, 8, 9, 10),
(13, 2, 11, 12, 13, 14, 15),
(14, 2, 16, 17, 18, 19, 20),
(15, 2, 21, 22, 23, 24, 25),
(16, 2, 26, 27, 28, 29, 30),
(17, 2, 31, 32, 33, 34, 35),
(18, 2, 36, 37, 38, 39, 40),
(19, 2, 41, 42, 43, 44, 45),
(20, 2, 46, 47, 48, 49, 50),
(21, 2, 51, 52, 53, 54, 55);

-- --------------------------------------------------------

--
-- Table structure for table `sopir`
--

CREATE TABLE IF NOT EXISTS `sopir` (
`id` int(11) NOT NULL,
  `no_ktp` varchar(30) NOT NULL,
  `nama` char(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `jk` char(2) NOT NULL,
  `tgl_lhr` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `sopir`
--

INSERT INTO `sopir` (`id`, `no_ktp`, `nama`, `alamat`, `no_telp`, `jk`, `tgl_lhr`) VALUES
(12, '3501085207680002', 'M.SUUD', 'Jember', '089678543199', 'L', '1968-07-17'),
(13, '3502015207670004', 'Widodo P', 'Jember', '0812345890765', 'L', '1967-01-04'),
(14, '3504055207680005', 'Santoso', 'Jember', '0878578990764', 'L', '1968-05-22'),
(15, '3504085207680004', 'Rahmat', 'Jember', '08123456789065', 'L', '1968-01-11'),
(16, '3504095207670003', 'Suparmin', 'Jember', '087857334579', 'L', '1967-06-23'),
(17, '3509195107680004', 'Suto', 'Jember', '089554678912', 'L', '1968-10-18'),
(18, '3502085207680005', 'Budi', 'Jember', '081234509876', 'L', '1968-09-25'),
(19, '3505095207670005', 'Ahmad', 'Jember', '0812342567865', 'L', '1967-10-24'),
(20, '3502085207680003', 'Anto', 'Jember', '089709865124', 'L', '1968-06-12'),
(21, '3502075207670002', 'Yanto', 'Jember', '087857651289', 'L', '1967-08-15'),
(22, '3503085207680003', 'Bimo', 'Jember', '081256748648', 'L', '1968-12-14'),
(23, '3504085207670005', 'Cipto', 'Jember', '08567893424', 'L', '1967-08-04');

-- --------------------------------------------------------

--
-- Table structure for table `status_bus`
--

CREATE TABLE IF NOT EXISTS `status_bus` (
`id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `status_bus`
--

INSERT INTO `status_bus` (`id`, `nama`) VALUES
(1, 'Bandara'),
(2, 'Pariwisata'),
(3, 'Perintis'),
(4, 'Mudik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
 ADD PRIMARY KEY (`id`), ADD KEY `idshet` (`idshet`), ADD KEY `idsopir` (`idsopir`), ADD KEY `status` (`status`), ADD KEY `status_2` (`status`);

--
-- Indexes for table `dari`
--
ALTER TABLE `dari`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_tiket`
--
ALTER TABLE `event_tiket`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hari`
--
ALTER TABLE `hari`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
 ADD PRIMARY KEY (`id`), ADD KEY `idbus` (`idbus`), ADD KEY `tujuan` (`tujuan`), ADD KEY `berangkat` (`berangkat`);

--
-- Indexes for table `jamberangkat`
--
ALTER TABLE `jamberangkat`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jdw_pariwisata`
--
ALTER TABLE `jdw_pariwisata`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_sheet`
--
ALTER TABLE `jenis_sheet`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_tiket`
--
ALTER TABLE `laporan_tiket`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `npemesanan_pariwisata`
--
ALTER TABLE `npemesanan_pariwisata`
 ADD PRIMARY KEY (`id`), ADD KEY `iduser` (`iduser`), ADD KEY `idbus` (`idbus`);

--
-- Indexes for table `ntujuan`
--
ALTER TABLE `ntujuan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket_wisata`
--
ALTER TABLE `paket_wisata`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanan_tiket`
--
ALTER TABLE `pemesanan_tiket`
 ADD PRIMARY KEY (`id`), ADD KEY `idbus` (`idbus`), ADD KEY `iduser` (`iduser`), ADD KEY `idjadwal` (`idjadwal`);

--
-- Indexes for table `sheet`
--
ALTER TABLE `sheet`
 ADD PRIMARY KEY (`id`), ADD KEY `idjsh` (`idjsh`);

--
-- Indexes for table `sopir`
--
ALTER TABLE `sopir`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_bus`
--
ALTER TABLE `status_bus`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `dari`
--
ALTER TABLE `dari`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `event_tiket`
--
ALTER TABLE `event_tiket`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hari`
--
ALTER TABLE `hari`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `jamberangkat`
--
ALTER TABLE `jamberangkat`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `jdw_pariwisata`
--
ALTER TABLE `jdw_pariwisata`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `jenis_sheet`
--
ALTER TABLE `jenis_sheet`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `laporan_tiket`
--
ALTER TABLE `laporan_tiket`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `npemesanan_pariwisata`
--
ALTER TABLE `npemesanan_pariwisata`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ntujuan`
--
ALTER TABLE `ntujuan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `paket_wisata`
--
ALTER TABLE `paket_wisata`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pemesanan_tiket`
--
ALTER TABLE `pemesanan_tiket`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `sheet`
--
ALTER TABLE `sheet`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `sopir`
--
ALTER TABLE `sopir`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `status_bus`
--
ALTER TABLE `status_bus`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bus`
--
ALTER TABLE `bus`
ADD CONSTRAINT `bus_ibfk_1` FOREIGN KEY (`idshet`) REFERENCES `jenis_sheet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `bus_ibfk_2` FOREIGN KEY (`idsopir`) REFERENCES `sopir` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `bus_ibfk_3` FOREIGN KEY (`status`) REFERENCES `status_bus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`idbus`) REFERENCES `bus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`tujuan`) REFERENCES `ntujuan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`berangkat`) REFERENCES `jamberangkat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `npemesanan_pariwisata`
--
ALTER TABLE `npemesanan_pariwisata`
ADD CONSTRAINT `npemesanan_pariwisata_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemesanan_tiket`
--
ALTER TABLE `pemesanan_tiket`
ADD CONSTRAINT `pemesanan_tiket_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `pemesanan_tiket_ibfk_2` FOREIGN KEY (`idjadwal`) REFERENCES `jadwal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sheet`
--
ALTER TABLE `sheet`
ADD CONSTRAINT `sheet_ibfk_1` FOREIGN KEY (`idjsh`) REFERENCES `jenis_sheet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
