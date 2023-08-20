-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2018 at 12:52 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisukro_cimeng`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_pemerintah`
--

CREATE TABLE `admin_pemerintah` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_pemerintah`
--

INSERT INTO `admin_pemerintah` (`id`, `nama`, `email`, `password`) VALUES
(1, 'Admin Pemerintah 1', 'adminpemerintah@gmail.com', 'bmxIOE1kR3ZoeGZSMU5aZ0lCclhCNHA2b2xSWk5Dc2Jtd211cnlKaXZzUT0=');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `waktu` datetime NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event_pengusaha_umkm`
--

CREATE TABLE `event_pengusaha_umkm` (
  `id_event` int(10) UNSIGNED ZEROFILL NOT NULL,
  `id_pengusaha_umkm` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengusaha_umkm`
--

CREATE TABLE `pengusaha_umkm` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `id_kategori` tinyint(2) UNSIGNED NOT NULL,
  `deskripsi` text NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengusaha_umkm`
--

INSERT INTO `pengusaha_umkm` (`id`, `nama`, `email`, `password`, `nomor_telepon`, `alamat`, `id_kategori`, `deskripsi`, `status`) VALUES
(1, 'Semoga Jaya', 'semoga@gmail.com', 'cUV1M3FHaTlWcVEvekk0WVIwV3h5Zz09', '08636368616', 'desan kidul kecamatan lor kelurahan etan', 1, 'ukm ini jualan es krim mantap', 1),
(2, 'Lancar Jaya', 'lancarjaya@gmail.com', 'YlJOTm5LWVNXZjFBdXRrWE1DMGo4UT09', '0028392', 'is%&amp;^@*(&amp;!()*!)(~_)()_*#@&amp;<br />\r\n&quot; <br />\r\n\'<br />\r\n&lt;/div&gt;<br />\r\n&quot;&lt;br&gt;<br />\r\n&quot;<br />\r\n\'<br />\r\n\'<br />\r\nn b t r', 1, 'suy8yus', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengusaha_umkm_kategori`
--

CREATE TABLE `pengusaha_umkm_kategori` (
  `id` int(11) UNSIGNED NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengusaha_umkm_kategori`
--

INSERT INTO `pengusaha_umkm_kategori` (`id`, `kategori`) VALUES
(1, 'Makanan'),
(2, 'Kerajinan');

-- --------------------------------------------------------

--
-- Table structure for table `pengusaha_umkm_produk`
--

CREATE TABLE `pengusaha_umkm_produk` (
  `id_pengusaha_umkm` int(10) UNSIGNED NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(10) UNSIGNED NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengusaha_umkm_produk`
--

INSERT INTO `pengusaha_umkm_produk` (`id_pengusaha_umkm`, `id`, `nama`, `harga`, `deskripsi`) VALUES
(1, 1, 'boraks', 34000, 'pengawet'),
(1, 2, 'ew', 32450500, 'dwjkg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_pemerintah`
--
ALTER TABLE `admin_pemerintah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_pengusaha_umkm`
--
ALTER TABLE `event_pengusaha_umkm`
  ADD KEY `id_event` (`id_event`),
  ADD KEY `id_pengusaha_umkm` (`id_pengusaha_umkm`);

--
-- Indexes for table `pengusaha_umkm`
--
ALTER TABLE `pengusaha_umkm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `pengusaha_umkm_kategori`
--
ALTER TABLE `pengusaha_umkm_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengusaha_umkm_produk`
--
ALTER TABLE `pengusaha_umkm_produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pengusaha_umkm` (`id_pengusaha_umkm`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_pemerintah`
--
ALTER TABLE `admin_pemerintah`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengusaha_umkm`
--
ALTER TABLE `pengusaha_umkm`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengusaha_umkm_kategori`
--
ALTER TABLE `pengusaha_umkm_kategori`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengusaha_umkm_produk`
--
ALTER TABLE `pengusaha_umkm_produk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event_pengusaha_umkm`
--
ALTER TABLE `event_pengusaha_umkm`
  ADD CONSTRAINT `event_pengusaha_umkm_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `event` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `event_pengusaha_umkm_ibfk_2` FOREIGN KEY (`id_pengusaha_umkm`) REFERENCES `pengusaha_umkm` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengusaha_umkm_produk`
--
ALTER TABLE `pengusaha_umkm_produk`
  ADD CONSTRAINT `pengusaha_umkm_produk_ibfk_1` FOREIGN KEY (`id_pengusaha_umkm`) REFERENCES `pengusaha_umkm` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
