-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22 Mei 2018 pada 17.14
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_damri`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bus`
--

CREATE TABLE `bus` (
  `id` int(11) NOT NULL,
  `bus` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `idshet` int(11) NOT NULL,
  `idsopir` int(11) NOT NULL,
  `nopol` varchar(10) NOT NULL,
  `jumlahtiket` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `sttb` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bus`
--

INSERT INTO `bus` (`id`, `bus`, `status`, `idshet`, `idsopir`, `nopol`, `jumlahtiket`, `gambar`, `sttb`) VALUES
(8, 'DAMRI-P-0002', 2, 2, 8, 'p4552', 55, 'ade.jpg', 0),
(10, 'DAMRI-P-0003', 2, 2, 6, '1123a', 55, '3.jpg', 0),
(11, 'DAMRI-P-0004', 2, 2, 0, 'p 4567 kk', 55, '5.jpg', 0),
(12, 'DAMRI-M-0005', 4, 2, 1, 'p 8888 jj', 55, '5.jpg', 0),
(13, 'DAMRI-Pr-0005', 3, 1, 0, 'Perintis 1', 50, 'cc.png', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dari`
--

CREATE TABLE `dari` (
  `id` int(11) NOT NULL,
  `idstat_bus` int(11) NOT NULL,
  `nama` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dari`
--

INSERT INTO `dari` (`id`, `idstat_bus`, `nama`) VALUES
(1, 1, 'Bandara Jember'),
(2, 2, 'Jember'),
(3, 2, 'Surabaya'),
(4, 4, 'Jember'),
(5, 4, 'Surabya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event_tiket`
--

CREATE TABLE `event_tiket` (
  `id` int(11) NOT NULL,
  `event` char(30) NOT NULL,
  `mulai` date NOT NULL,
  `akhir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `event_tiket`
--

INSERT INTO `event_tiket` (`id`, `event`, `mulai`, `akhir`) VALUES
(1, 'Lebaran', '2018-05-22', '2018-05-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hari`
--

CREATE TABLE `hari` (
  `id` int(11) NOT NULL,
  `nama` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hari`
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
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `idbus` int(11) NOT NULL,
  `dari` char(11) NOT NULL,
  `tujuan` int(11) NOT NULL,
  `berangkat` int(11) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `harga` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id`, `idbus`, `dari`, `tujuan`, `berangkat`, `hari`, `harga`) VALUES
(3, 6, 'Tw Alun', 1, 4, '1', 45000),
(4, 12, 'Tw Alun', 3, 7, '2', 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jamberangkat`
--

CREATE TABLE `jamberangkat` (
  `id` int(11) NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jamberangkat`
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
-- Struktur dari tabel `jdw_pariwisata`
--

CREATE TABLE `jdw_pariwisata` (
  `id` int(11) NOT NULL,
  `tujuan` text NOT NULL,
  `durasi` varchar(25) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jdw_pariwisata`
--

INSERT INTO `jdw_pariwisata` (`id`, `tujuan`, `durasi`, `harga`) VALUES
(2, 'Dalam Kota Jakarta / Transfer ', '1 hari ( 24 Jam )', 2300000),
(3, 'Cibubur / Bekasi / Cimanggis / Cinere Depok / Ciledug / Serpong / Bintaro', '1 hari ( 24 Jam )', 2400000),
(5, 'Tangerang / Karawang / Sentul / Bogor Kota', '1 hari ( 12 Jam )', 6200000),
(8, 'Cisarua Puncak / Cinangneng / Caringin Bogor Lido / Salabintana / Cipanas Puncak Purwakarta / Sadang / Jati Luhur', '2 Hari 1 Malam', 7000000),
(12, 'Palabuhan Ratu Sukabumi / Citarik / Cianjur Anyer / Carita / Karang Bolong / Serang', 'Antar Jemput', 6400000),
(14, 'Bandung Kota / Dago / Lembang Ciater / Tangkuban Parahu Subang / Tanjung Lesung', '2 Hari 1 Malam', 7600000),
(16, 'Ujung Genteng / Pulau Umang', 'Paket 2 Hari', 8350000),
(17, 'Kediri', '1 hari ( 12 Jam )', 3600000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_sheet`
--

CREATE TABLE `jenis_sheet` (
  `id` int(11) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `jumlah` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_sheet`
--

INSERT INTO `jenis_sheet` (`id`, `jenis`, `jumlah`) VALUES
(1, '2 - 2', '50'),
(2, '2 - 2', '55'),
(3, '2 - 3', '60');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `email`, `password`, `nama`, `alamat`, `no_hp`) VALUES
(1, 'aab.peezz@gmail.com', '6e87ed4fdad414df016aec5ed84a10e0', 'Abdul Jabbar', 'Kediri, Bandar Lor gang III no 19 C', '085608129137'),
(2, 'apemo@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'apez', 'jl. kh. wachid Hasym', ''),
(3, 'hestiw659@gmail.com', '9cb9d0e0fef84357248fdad69eb61354', 'hesti', 'jember', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `npemesanan_pariwisata`
--

CREATE TABLE `npemesanan_pariwisata` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `npemesanan_pariwisata`
--

INSERT INTO `npemesanan_pariwisata` (`id`, `iduser`, `idbus`, `tgl_b`, `tgl_p`, `berangkatdari`, `tgl_expied`, `tgl_up`, `jumkursi`, `jumbus`, `norek`, `an`, `tarif`, `total`, `DP`, `tujuan`, `bukti_tf`, `status`, `buskem`) VALUES
(1, 1, '8,10,', '2018-02-26', '2018-03-01', '', '2018-02-25 18:56:45', '2018-02-25 11:02:37', 2, 2, '198752428', 'Damri', 6200000, 37200000, 9300000, '5', 'cc.png', 'Tunggu Konfirmasi', 1),
(2, 2, '8,10,', '2018-05-23', '2018-05-24', 'Jember', '2018-05-21 15:15:55', '2018-05-20 22:05:31', 2, 2, '198752428', 'Damri', 6200000, 12400000, 3100000, '5', '1.Pembuatan Media.PNG', 'SETUJU', 0),
(3, 3, '8,', '2018-05-24', '2018-05-26', 'jember', '2018-05-23 09:40:33', '2018-05-22 16:05:58', 2, 1, '198752428', 'Damri', 7000000, 14000000, 3500000, '8', 'th2.jpg', 'SETUJU', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ntujuan`
--

CREATE TABLE `ntujuan` (
  `id` int(11) NOT NULL,
  `nama` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ntujuan`
--

INSERT INTO `ntujuan` (`id`, `nama`) VALUES
(1, 'Surabaya'),
(2, 'Yogyakarta'),
(3, 'Denpasar'),
(4, 'Rawamangun'),
(5, 'Pasuruan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket_wisata`
--

CREATE TABLE `paket_wisata` (
  `id` int(11) NOT NULL,
  `tujuan` text NOT NULL,
  `durasi` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `sheet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `paket_wisata`
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
-- Struktur dari tabel `pemesanan_tiket`
--

CREATE TABLE `pemesanan_tiket` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idjadwal` int(11) NOT NULL,
  `jumlahtiket` int(11) NOT NULL,
  `kursitiket` text NOT NULL,
  `status` char(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tgl_expired` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan_tiket`
--

INSERT INTO `pemesanan_tiket` (`id`, `iduser`, `idjadwal`, `jumlahtiket`, `kursitiket`, `status`, `harga`, `total`, `tgl_expired`) VALUES
(1, 2, 3, 2, '6,7', '0', 45000, 90000, '2018-05-21 19:00:06'),
(2, 3, 4, 1, '1', '0', 20000, 20000, '2018-05-23 00:56:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sheet`
--

CREATE TABLE `sheet` (
  `id` int(11) NOT NULL,
  `idjsh` int(11) NOT NULL,
  `sheet1` int(11) NOT NULL,
  `sheet2` int(11) NOT NULL,
  `sheet3` int(11) NOT NULL,
  `sheet4` int(11) NOT NULL,
  `sheet5` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sheet`
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
-- Struktur dari tabel `sopir`
--

CREATE TABLE `sopir` (
  `id` int(11) NOT NULL,
  `no_ktp` varchar(30) NOT NULL,
  `nama` char(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `jk` char(2) NOT NULL,
  `tgl_lhr` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sopir`
--

INSERT INTO `sopir` (`id`, `no_ktp`, `nama`, `alamat`, `no_telp`, `jk`, `tgl_lhr`) VALUES
(1, '192168137111', 'Masud Hermansyah', 'Jl. Sumatra', '085123232323', 'L', '2010-02-02'),
(2, '1927123123123', 'Hermansyah Masud', 'Dusgur', '09712351237', 'L', '2017-12-01'),
(3, '19231231', 'Abdul Jabbar', 'Kediri, Bandar Lor gg III no 19 C', '085608129137', 'L', '1996-01-13'),
(4, '1923735297', 'Abuduru Jabubaru', 'Jember, Jalan Dota 2 no 3', '0851235123', 'L', '1999-02-28'),
(5, '1923712345', 'Nurcahyo Aswin Damasanti', 'Sidoarjo, Jl. Kenangan Terindah', '085612396338', 'P', '1993-09-28'),
(6, '19236523468', 'Nuraini', 'Blitar, Jl Manis Pahit no 32', '08912351238125', 'P', '1995-06-20'),
(7, '1827346397', 'Apemos', 'Jl. Ukulele ikan pasar', '0856126342378', 'L', '1990-06-19'),
(8, '182632552', 'Namain aja', 'Jl. Ikan pe enak sekali', '085623452', 'L', '1988-10-28'),
(9, '129846423', 'Nama 1', 'Alamats', '0812361235', 'P', '2017-12-28'),
(10, '24324', 'hgj', 'jfj', '34657', 'L', '2018-02-14'),
(11, '64386543', 'siapa', 'jember', '0987544333', 'L', '1997-09-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_bus`
--

CREATE TABLE `status_bus` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status_bus`
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
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `npemesanan_pariwisata`
--
ALTER TABLE `npemesanan_pariwisata`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sheet`
--
ALTER TABLE `sheet`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `dari`
--
ALTER TABLE `dari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `event_tiket`
--
ALTER TABLE `event_tiket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hari`
--
ALTER TABLE `hari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jamberangkat`
--
ALTER TABLE `jamberangkat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jdw_pariwisata`
--
ALTER TABLE `jdw_pariwisata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jenis_sheet`
--
ALTER TABLE `jenis_sheet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `npemesanan_pariwisata`
--
ALTER TABLE `npemesanan_pariwisata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ntujuan`
--
ALTER TABLE `ntujuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `paket_wisata`
--
ALTER TABLE `paket_wisata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pemesanan_tiket`
--
ALTER TABLE `pemesanan_tiket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sheet`
--
ALTER TABLE `sheet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `sopir`
--
ALTER TABLE `sopir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `status_bus`
--
ALTER TABLE `status_bus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
