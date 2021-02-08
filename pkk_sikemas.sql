-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2021 at 06:42 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkk_sikemas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `password`) VALUES
(1, '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `nik` int(11) NOT NULL,
  `nama_penduduk` varchar(128) NOT NULL,
  `pengaduan_update` varchar(128) NOT NULL,
  `tanggal_ubah` varchar(25) NOT NULL,
  `waktu_ubah` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id_invoice` int(11) NOT NULL,
  `k_invoice` varchar(16) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `pesan` text NOT NULL,
  `via` varchar(50) NOT NULL,
  `tanggal` varchar(10) NOT NULL,
  `waktu` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id_invoice`, `k_invoice`, `nama`, `pesan`, `via`, `tanggal`, `waktu`) VALUES
(1, '0', 'fadly safyuddin maulana', 'NIK saya salah yang bener ini \r\nsalah:636554\r\nbenar:658987', '08xxxxxxx', '02-02-2021', '05:39 pm'),
(2, 'uv4rnOEfbBXSjcx', 'test', 'test', '08xxxxx', '02-02-2021', '05:44 pm'),
(3, '2ItA3UwQqk7FKeZ', 'Budi', 'Nik saya belum terdaftar', '08xxxxxx', '03-02-2021', '06:54 pm'),
(5, '7YWh08rfL25Av96', 'Heru', 'nik saya belum terdaftar', '0852xxxxxx', '05-02-2021', '09:06 am');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE `penduduk` (
  `id` int(25) NOT NULL,
  `nik` int(25) NOT NULL,
  `nik_account` varchar(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal_lahir` varchar(10) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `agama` varchar(5) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `no_telp` varchar(25) NOT NULL,
  `foto_penduduk` text NOT NULL,
  `username` varchar(75) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`id`, `nik`, `nik_account`, `nama`, `tanggal_lahir`, `tempat_lahir`, `agama`, `jk`, `no_telp`, `foto_penduduk`, `username`, `password`) VALUES
(1, 16735, '16735', 'Heri', '08/11/1995', 'Pemalang', 'Islam', 'L', '0856972487', 'default.png', 'Heri30._', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 16726, '16726', 'Houtarou Tama', '18/05/1994', 'Pemalang', 'Krist', 'L', '089657416', 'default.png', 'Tama56', '01cfcd4f6b8770febfb40cb906715822'),
(3, 123657, '123657', 'Shinomiya Tama', '07/09/1994', 'Hokkaido', 'Krist', 'P', '08526587842', 'default.png', 'ST56', '827ccb0eea8a706c4c34a16891f84e7b'),
(4, 321568, '', 'Amandaa nurhaliza', '06/09/2001', 'Pemalang', 'Islam', 'P', '', 'default.png', '', ''),
(5, 58742, '', 'muhammad ihsan', '10/03/1911', 'pemalang', 'Islam', 'L', '', 'c37b69cc651a62c4a43fe4ef50a04212.jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(30) NOT NULL,
  `kode_pengaduan` varchar(25) DEFAULT NULL,
  `nik` varchar(30) DEFAULT NULL,
  `pengaduan` text DEFAULT NULL,
  `pengaduan_update` text NOT NULL,
  `respon_petugas` text NOT NULL,
  `tanggal_unggah` varchar(25) NOT NULL,
  `waktu_unggah` varchar(25) NOT NULL,
  `tanggal_ubah` varchar(25) NOT NULL,
  `waktu_ubah` varchar(25) NOT NULL,
  `foto_keluhan` text NOT NULL,
  `status` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `kode_pengaduan`, `nik`, `pengaduan`, `pengaduan_update`, `respon_petugas`, `tanggal_unggah`, `waktu_unggah`, `tanggal_ubah`, `waktu_ubah`, `foto_keluhan`, `status`, `id_petugas`) VALUES
(1, '9825004210976743179548331', '16725', 'Pavingnya rusak jalan jensud', 'Pavingnya rusak jalan jensud', 'iya saya entar kasih tahu ke pihak berwenang', '03-02-2021', '06:56 pm', '04-02-2021', '08:15 pm', '0c8424f320ccaeeaebdeca5bba5632914.jpg', 0, 4),
(3, '1032645373250951884601294', '123657', 'Pipa Jalan A Bocor', 'Pipa Jalan A Bocor', 'Iyak entar saya sampaikan', '05-02-2021', '09:08 am', '', '', '4104985.jpg', 0, 4),
(4, '6753625479810423153090468', '123657', 'Keluhan #2', 'Keluhan #2', 'keluhan ini sudah dikerjakan', '05-02-2021', '09:20 am', '05-02-2021', '09:20 am', '0c8424f320ccaeeaebdeca5bba5632916.jpg', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nomor_petugas` int(25) NOT NULL,
  `nama_petugas` varchar(100) NOT NULL,
  `tanggal_lahir` varchar(10) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `agama` varchar(5) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `no_telp` varchar(25) NOT NULL,
  `active` int(11) NOT NULL,
  `foto_petugas` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nomor_petugas`, `nama_petugas`, `tanggal_lahir`, `tempat_lahir`, `agama`, `jk`, `no_telp`, `active`, `foto_petugas`, `username`, `password`) VALUES
(1, 2147483647, 'fadly safyuddin maulana', '28/05/2003', 'Pemalang', 'Islam', 'L', '08xxxxxx', 2, 'default.png', 'petugas86', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 2147483647, 'Budi Santoso', '30/10/2001', 'Pemalang', 'Islam', 'L', '085326762048', 2, 'default.png', 'Budisnts76', '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 2147483647, 'Shinomiya Tamarai', '21/05/1997', 'Pemalang', 'Islam', 'L', '08xxxxxxxx', 2, 'default.png', 'Shinomiya76', '827ccb0eea8a706c4c34a16891f84e7b'),
(4, 2147483647, 'Reza Rahadian', '17/11/1993', 'Pemalang', 'Islam', 'L', '08567894316', 2, 'default.png', 'RH73', '827ccb0eea8a706c4c34a16891f84e7b'),
(5, 2147483647, 'Nadila', '01/02/1990', 'jakarta', 'Islam', 'P', '0856873266', 2, 'default.png', 'NDLA75', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
