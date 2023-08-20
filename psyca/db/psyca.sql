-- phpMyAdmin SQL Dump
-- version 4.7.0-rc1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2017 at 07:34 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psyca`
--

-- --------------------------------------------------------

--
-- Table structure for table `depresi_ringan`
--

CREATE TABLE `depresi_ringan` (
  `episode` int(10) UNSIGNED NOT NULL,
  `penanganan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `depresi_ringan`
--

INSERT INTO `depresi_ringan` (`episode`, `penanganan`) VALUES
(1, 'Renungkan terlebih dahulu apa permasalahan anda. Apakah masalah anda berat? Jika iya, apakah anda merasa tidak mampu menanganinya? Kami mendeteksi sedikit tanda dari conduct disorder dari pilihan anda.'),
(2, 'Jangan menggunakan anti-depresan apapun tanpa berkonsultasi dengan ahli.'),
(3, 'Beri tantangan pada diri anda, tekankan bahwa permasalahan anda tidak seberat yang anda rasakan.'),
(4, 'Mulailah mencoba leisure activity minimal 30 menit tiap harinya. Disarankan aktifitas dilakukan diluar ruangan. Banyak ahli turut menyarankan kegiatan seperti jogging dan yoga di pagi maupun sore hari akan sangat membantu.');

-- --------------------------------------------------------

--
-- Table structure for table `depresi_sedang`
--

CREATE TABLE `depresi_sedang` (
  `episode` int(10) UNSIGNED NOT NULL,
  `penanganan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `depresi_sedang`
--

INSERT INTO `depresi_sedang` (`episode`, `penanganan`) VALUES
(1, 'Jika anda mengkonsumsi obat tidur, diharapkan anda sudah berkonsultasi kepada ahli mengenai dosis'),
(2, 'Melakukan desensitization secara mandiri akan membantu. Desensitization dapat dilakukan sesuai dengan apa penyebab kecemasan anda.'),
(3, 'Apakah anda baru saja mengalami perpisahan? Kami mendeteksi sedikit pertanda SAD (Separation Anxiety Disorder) . Jika iya, anda mungkin tertarik untuk mulai melakukan aktifitas pengalih pikiran. Jangan lupa untuk tetap fokus.'),
(4, 'Apakah rasa sedih anda membuat anda ingin melakukan sesuatu untuk memperbaiki keadaan, tetapi anda justru merasa tidak mendapat dukungan dan justru membuat anda semakin tertekan? Kami mendeteksi anda mengalami Brief Psychotic Disorder (BPD). Bagus jika anda memiliki upaya memperbaiki keadaan, tetapi jangan memaksakan kemampuan anda. ');

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id` int(11) NOT NULL,
  `nama_file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `judul` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diupload` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id`, `nama_file`, `judul`, `diupload`, `status`) VALUES
(1, '1.JPG', ' ', '2017-02-20 00:00:00', '1'),
(2, '2.JPG', ' ', '2017-02-20 00:00:00', '1'),
(3, '3.JPG', ' ', '2017-02-20 00:00:00', '1'),
(4, '4.JPG', ' ', '2017-02-20 00:00:00', '1'),
(5, '5.JPG', ' ', '2017-02-20 00:00:00', '1'),
(6, '6.JPG', ' ', '2017-02-20 00:00:00', '1'),
(7, '7.JPG', ' ', '2017-02-20 00:00:00', '1'),
(8, '8.JPG', ' ', '2017-02-20 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nama` varchar(100) NOT NULL,
  `id_pengguna` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis` enum('User','Admin') NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nama`, `id_pengguna`, `password`, `email`, `jenis_kelamin`, `tanggal_lahir`, `jenis`) VALUES
('M Dwi Arifianto', 'dwi_arifianto', 'e79f065605c0ac6682e6196ab21997a0', 'dwiarifianto@gmail.com', 'Laki-laki', '1997-06-29', 'User'),
('irfan diansyah', 'irfansihombing', '67254051093c12f556188db0955c77de', 'irfanbro@yahee.co', 'Laki-laki', '2017-11-12', 'User'),
('M Iqbal', 'm_iqbal', '4c34689b498c25502447f79cdf5b8a96', 'miqbal@gmail.com', 'Laki-laki', '1998-07-07', 'User'),
('Shada Intishar', 'shada_intishar', 'f3f6991fd78ce667e955b9b4428287ab', 'shadaintishar@gmail.com', 'Perempuan', '1999-01-31', 'User'),
('Admin', 'web', '8306f2e017777c003024798745970499', 'admin@web.com', 'Laki-laki', '1999-06-27', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `depresi_ringan`
--
ALTER TABLE `depresi_ringan`
  ADD PRIMARY KEY (`episode`);

--
-- Indexes for table `depresi_sedang`
--
ALTER TABLE `depresi_sedang`
  ADD PRIMARY KEY (`episode`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `password` (`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `depresi_ringan`
--
ALTER TABLE `depresi_ringan`
  MODIFY `episode` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `depresi_sedang`
--
ALTER TABLE `depresi_sedang`
  MODIFY `episode` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
