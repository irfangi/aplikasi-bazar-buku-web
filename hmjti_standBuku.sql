-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 15, 2017 at 05:41 AM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.18-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hmjti_standBuku`
--

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `id_bayar` int(5) NOT NULL,
  `id_buku` int(5) NOT NULL,
  `qty` int(3) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bayar`
--

INSERT INTO `bayar` (`id_bayar`, `id_buku`, `qty`, `tanggal`) VALUES
(23, 41, 1, '2017-06-23 10:18:58'),
(24, 42, 1, '2017-06-23 10:18:58'),
(30, 42, 2, '2017-06-23 14:20:54'),
(31, 41, 1, '2017-07-14 13:14:01');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(5) NOT NULL,
  `judul_buku` varchar(400) NOT NULL,
  `pengarang` varchar(80) NOT NULL,
  `penerbit` varchar(11) NOT NULL,
  `harga` int(8) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `foto` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `pengarang`, `penerbit`, `harga`, `jumlah`, `foto`) VALUES
(41, 'laporan kecerdasam buatan yang sangat bagus', 'irfangi', '22', 100000, 0, ''),
(42, 'ps', 'fdf', '25', 43000, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `kerajang`
--

CREATE TABLE `kerajang` (
  `id_keranjang` int(5) NOT NULL,
  `id_buku` int(5) NOT NULL,
  `qty` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_tgl` datetime NOT NULL,
  `total_harga` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_tgl`, `total_harga`) VALUES
('2017-06-23 10:18:58', 124400),
('2017-06-23 10:20:33', 283200),
('2017-06-23 14:20:54', 68800),
('2017-07-14 13:14:01', 90000);

-- --------------------------------------------------------

--
-- Table structure for table `kritik_saran`
--

CREATE TABLE `kritik_saran` (
  `id_saran` int(11) NOT NULL,
  `isi_saran` text,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kritik_saran`
--

INSERT INTO `kritik_saran` (`id_saran`, `isi_saran`, `tanggal`) VALUES
(1, 'sadd', NULL),
(2, 'sdasd', NULL),
(3, 'wdsaa', NULL),
(4, 'sdzds', NULL),
(5, 'd;salkda', NULL),
(6, 'adfsasd', NULL),
(7, 'asd', NULL),
(8, 'adsf', NULL),
(9, 'gahsgjhkjlk;f/mad.sfd,snfa,mf', NULL),
(10, 'sfdF', NULL),
(11, 'coba', NULL),
(12, 'qsa', NULL),
(13, 'ryreyw', NULL),
(14, 'saff', NULL),
(15, 'hghhf', NULL),
(16, 'daf', NULL),
(17, 'sfaasd', NULL),
(18, 'dad', NULL),
(19, 'likj,nm', NULL),
(20, 'safz', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` int(5) NOT NULL,
  `nama_penerbit` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `diskon_penerbit` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`, `diskon_penerbit`) VALUES
(22, 'Airlangga', 15),
(24, 'Gramedia', 15),
(25, 'sejahtera', 25);

-- --------------------------------------------------------

--
-- Table structure for table `request_buku`
--

CREATE TABLE `request_buku` (
  `id_reqBuku` int(11) NOT NULL,
  `nama_pemesan` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_hp` int(13) DEFAULT NULL,
  `judul_reqBuku` varchar(50) DEFAULT NULL,
  `pengarang` varchar(50) DEFAULT NULL,
  `penerbit` varchar(50) DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(2) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`) VALUES
(1, 'admin', 'admin', 'Irfangi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`id_bayar`) KEY_BLOCK_SIZE=5;

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`) KEY_BLOCK_SIZE=11;

--
-- Indexes for table `kerajang`
--
ALTER TABLE `kerajang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_tgl`);

--
-- Indexes for table `kritik_saran`
--
ALTER TABLE `kritik_saran`
  ADD PRIMARY KEY (`id_saran`) KEY_BLOCK_SIZE=5;

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`) KEY_BLOCK_SIZE=11;

--
-- Indexes for table `request_buku`
--
ALTER TABLE `request_buku`
  ADD PRIMARY KEY (`id_reqBuku`) KEY_BLOCK_SIZE=5;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bayar`
--
ALTER TABLE `bayar`
  MODIFY `id_bayar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `kerajang`
--
ALTER TABLE `kerajang`
  MODIFY `id_keranjang` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kritik_saran`
--
ALTER TABLE `kritik_saran`
  MODIFY `id_saran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id_penerbit` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `request_buku`
--
ALTER TABLE `request_buku`
  MODIFY `id_reqBuku` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
