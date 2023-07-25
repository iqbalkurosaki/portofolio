-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2018 at 10:19 AM
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
-- Database: `elearning`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `akses` (IN `email` VARCHAR(50), IN `password` VARCHAR(200), IN `level` VARCHAR(10))  NO SQL
BEGIN
SET @password = (SELECT user.password FROM user WHERE user.email = email AND user.level = level);
    IF ((sha1(md5(password(crc32(hex(password)))))) = @password) THEN
        SELECT user.id, user.nama FROM user WHERE user.email = email AND user.level = level;
    END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `level` enum('Pendidik','Pelajar','Umum','Pengajar') NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `nomor_telepon`, `tanggal_lahir`, `level`, `password`) VALUES
('22987a6d8f8c45d5b82e85fbdc99c8fc', 'orang umum', 'umum@gmail.com', '097', '2000-05-09', 'Umum', '4633ebb8ba1e495f93b066005a7d36c84a236b18'),
('7bca52fb54da17b7b0ea4f25af2c7c02', 'rizqi Irfan', 'rizqiirfan23@gmail.com', '09937139232', '2005-06-07', 'Pelajar', '60f73b0e259e97160e1e4b30b384fa9f2299f7af'),
('7fc162ba3cc26077924a93c9e394056f', 'Mokhamad Iqbal', 'iqbal@gmail.com', '57567675656774', '2018-07-07', 'Pengajar', 'ca03885c06226251b1322da959e66039cee359e8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
