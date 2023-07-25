-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2023 at 11:54 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` varchar(10) NOT NULL,
  `id_admin` varchar(255) NOT NULL,
  `nama_kelas` varchar(30) NOT NULL,
  `tingkat` varchar(20) NOT NULL,
  `kelas` tinyint(3) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `id_admin`, `nama_kelas`, `tingkat`, `kelas`, `deskripsi`) VALUES
('447d051d', '7fc162ba3cc26077924a93c9e394056f', 'Sosiologi', 'Mahasiswa', 5, 'ge'),
('44850524', '7fc162ba3cc26077924a93c9e394056f', 'dua', 'Mahasiswa', 7, 'dua tiga'),
('44870528', '7fc162ba3cc26077924a93c9e394056f', 'ini', 'Mahasiswa', 4, 'kelas ini'),
('44bf052d', '7fc162ba3cc26077924a93c9e394056f', 'dua', 'Mahasiswa', 7, 'dua tiga'),
('45290539', '7fc162ba3cc26077924a93c9e394056f', 'satu', 'SMA/Sedera', 1, 'satu dua');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_anggota`
--

CREATE TABLE `kelas_anggota` (
  `id_kelas` varchar(10) NOT NULL,
  `id_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas_anggota`
--

INSERT INTO `kelas_anggota` (`id_kelas`, `id_user`) VALUES
('44bf052d', '7bca52fb54da17b7b0ea4f25af2c7c02');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_chat_44bf052d`
--

CREATE TABLE `kelas_chat_44bf052d` (
  `id` varchar(255) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nama` varchar(100) DEFAULT NULL,
  `pesan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas_chat_44bf052d`
--

INSERT INTO `kelas_chat_44bf052d` (`id`, `waktu`, `nama`, `pesan`) VALUES
('1cc6dbdea6cbb1c4eb359d60a6e31584', '2018-08-08 09:14:00', 'rizqi Irfan', 'hsh'),
('788e8846e7589ee84222624a491aa2f9', '2018-08-08 09:18:03', 'rizqi Irfan', 'jfk sfhjhsf \njsgg \n&lt;l\ngs\ngs\n:*\n:)'),
('940c3f11dd0abb969fdcd69d88517097', '2018-08-08 09:31:08', 'rizqi Irfan', 'jbdb fdsjh<br />\nfsjg'),
('981b5655a82bf00eb39be5cb176f67b5', '2018-08-08 09:14:48', 'rizqi Irfan', '&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;a href=&quot;index.php&quot;&gt;ashj&lt;/a&gt;'),
('b2f9675c3f251f4e358fb65f13d45501', '2018-08-08 09:32:04', 'rizqi Irfan', 'fsjh sfjhsf<br />\ngrsggs<br />\ngrsgsr'),
('d2d5292a49ecf9aebc347909c75cadc1', '2018-08-08 09:23:49', 'rizqi Irfan', 'dsahh<br />\nfaf'),
('c3a04eebba869ec65523a44eb3b26d97', '2018-08-08 09:36:18', 'Mokhamad Iqbal', 'mantap <br />\n`'),
('9511ad0afa2e01b7e5d6f0b90f800106', '2018-08-08 09:36:41', 'rizqi Irfan', '`````\';&quot; &quot;.&lt;?,&gt;&gt;&lt;|}_*^^#@)(^@$&amp;'),
('64a7e023af5d292d4540308ea211fbbe', '2018-10-02 17:28:26', 'Rizqi Irfan', 'woy'),
('4d5e39edc8e4d8dab20a7a8254ed154d', '2018-10-02 17:28:34', 'Mokhamad Iqbal', 'opo?<br />\n'),
('d2ca422e51e4f237d57ffaa2a1fd2f61', '2018-11-26 16:13:31', 'Rizqi Irfan', '&lt;/div&gt;'),
('24f13e84ebf8030a8ec7414a4d005e72', '2018-11-26 16:14:46', 'Rizqi Irfan', 'aghs<br />\nsdhj');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_chat_447d051d`
--

CREATE TABLE `kelas_chat_447d051d` (
  `id` varchar(255) DEFAULT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nama` varchar(100) DEFAULT NULL,
  `pesan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kelas_chat_44850524`
--

CREATE TABLE `kelas_chat_44850524` (
  `id` varchar(255) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nama` varchar(100) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kelas_chat_44870528`
--

CREATE TABLE `kelas_chat_44870528` (
  `id` varchar(255) DEFAULT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nama` varchar(100) DEFAULT NULL,
  `pesan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kelas_chat_45290539`
--

CREATE TABLE `kelas_chat_45290539` (
  `id` varchar(255) DEFAULT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nama` varchar(100) DEFAULT NULL,
  `pesan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `latihan`
--

CREATE TABLE `latihan` (
  `id_latihan` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `id_soal` varchar(255) NOT NULL,
  `nilai` decimal(5,2) UNSIGNED NOT NULL,
  `status` enum('Selesai','Berjalan') NOT NULL DEFAULT 'Berjalan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `latihan`
--

INSERT INTO `latihan` (`id_latihan`, `id_user`, `id_soal`, `nilai`, `status`) VALUES
('5f4af5f255b8312fca2cc0b05577f733', '7bca52fb54da17b7b0ea4f25af2c7c02', 'c1e37f6479ebed6e547ca03e9fffb6f6', '0.00', 'Berjalan'),
('6a789b2bbf77f198de379d3a140f87ba', '7bca52fb54da17b7b0ea4f25af2c7c02', 'd605b2ef975e68a811fae12d4acae2e2', '100.00', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `latihan_detail`
--

CREATE TABLE `latihan_detail` (
  `id_latihan` varchar(255) NOT NULL,
  `nomor` int(4) UNSIGNED NOT NULL,
  `soal` text NOT NULL,
  `benar` enum('a','b','c','d','e') NOT NULL,
  `pilihan_a` text NOT NULL,
  `pilihan_b` text NOT NULL,
  `pilihan_c` text NOT NULL,
  `pilihan_d` text NOT NULL,
  `pilihan_e` text NOT NULL,
  `jawaban_user` enum('a','b','c','d','e','belum') NOT NULL DEFAULT 'belum'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `latihan_detail`
--

INSERT INTO `latihan_detail` (`id_latihan`, `nomor`, `soal`, `benar`, `pilihan_a`, `pilihan_b`, `pilihan_c`, `pilihan_d`, `pilihan_e`, `jawaban_user`) VALUES
('5f4af5f255b8312fca2cc0b05577f733', 1, 'asd', 'e', 'dq', 'aw', 'xa', 'as', 'das', 'd'),
('5f4af5f255b8312fca2cc0b05577f733', 2, 'jnj', 'c', 'njb', 'hhjh', 'iin', 'bhb', '7yg', 'b'),
('6a789b2bbf77f198de379d3a140f87ba', 1, 'dsn', 'b', 'dmmd', 'kmdkn', 'kdmdk', 'kdnkm', 'fdfk', 'b');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id_soal` varchar(255) NOT NULL,
  `id_author` varchar(255) NOT NULL,
  `tingkat` varchar(20) NOT NULL,
  `kelas` tinyint(2) NOT NULL,
  `jumlah_sajian_soal` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id_soal`, `id_author`, `tingkat`, `kelas`, `jumlah_sajian_soal`) VALUES
('e1b4285109b11a7c8e23da0680a2657a', '', '', 0, 0),
('35713752d611576468875337e9b085dc', '', '', 0, 0),
('d605b2ef975e68a811fae12d4acae2e2', '', '', 0, 1),
('ae827c0d6f4cb2643c0c95feb590f127', '7fc162ba3cc26077924a93c9e394056f', '', 0, 2),
('c1e37f6479ebed6e547ca03e9fffb6f6', '7fc162ba3cc26077924a93c9e394056f', 'SMA/Sederajat', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `soal_detail`
--

CREATE TABLE `soal_detail` (
  `id_soal` varchar(255) NOT NULL,
  `nomor` int(4) UNSIGNED NOT NULL,
  `soal` text NOT NULL,
  `benar` enum('a','b','c','d','e') NOT NULL,
  `pilihan_a` text NOT NULL,
  `pilihan_b` text NOT NULL,
  `pilihan_c` text NOT NULL,
  `pilihan_d` text NOT NULL,
  `pilihan_e` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal_detail`
--

INSERT INTO `soal_detail` (`id_soal`, `nomor`, `soal`, `benar`, `pilihan_a`, `pilihan_b`, `pilihan_c`, `pilihan_d`, `pilihan_e`) VALUES
('e1b4285109b11a7c8e23da0680a2657a', 1, 'uhuh', 'c', 'tfhffyby', 'ygh', 'jhjn', 'yguh', 'jbihi'),
('e1b4285109b11a7c8e23da0680a2657a', 2, 'uin', 'd', 'asd', 'sdas', 'qweqwe', 'aczxc', 'sdfdsf'),
('35713752d611576468875337e9b085dc', 1, 'uhuh', 'c', 'tfhffyby', 'ygh', 'jhjn', 'yguh', 'jbihi'),
('35713752d611576468875337e9b085dc', 2, 'uin', 'd', 'asd', 'sdas', 'qweqwe', 'aczxc', 'sdfdsf'),
('d605b2ef975e68a811fae12d4acae2e2', 1, 'dsn', 'b', 'kdnkm', 'kmdkn', 'fdfk', 'dmmd', 'kdmdk'),
('ae827c0d6f4cb2643c0c95feb590f127', 1, 'sub', 'c', 'jvdn', 'jdjb', 'jfdj', 'jfdj', 'bjfjb'),
('ae827c0d6f4cb2643c0c95feb590f127', 2, 'fknk', 'd', 'nkdk', 'njfdk', 'njgdnj', 'gnjenj', 'jrjn'),
('c1e37f6479ebed6e547ca03e9fffb6f6', 1, 'asd', 'a', 'das', 'as', 'dq', 'aw', 'xa'),
('c1e37f6479ebed6e547ca03e9fffb6f6', 2, 'jnj', 'b', 'bhb', 'iin', 'hhjh', 'njb', '7yg');

-- --------------------------------------------------------

--
-- Table structure for table `sumber_belajar`
--

CREATE TABLE `sumber_belajar` (
  `id` varchar(255) NOT NULL,
  `id_uploader` varchar(255) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `tingkat` varchar(20) NOT NULL,
  `kelas` tinyint(2) UNSIGNED NOT NULL,
  `ekstensi` varchar(10) NOT NULL,
  `jumlah_download` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `jumlah_lihat` bigint(20) UNSIGNED DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sumber_belajar`
--

INSERT INTO `sumber_belajar` (`id`, `id_uploader`, `judul`, `author`, `deskripsi`, `tingkat`, `kelas`, `ekstensi`, `jumlah_download`, `jumlah_lihat`) VALUES
('1cb39c0824cd761ab25e35ab636928b0', '7bca52fb54da17b7b0ea4f25af2c7c02', 'dshj', 'jfj', 'fskj', 'SMA/Sederajat', 1, 'xlsx', 4, 1),
('325c224adca0e589eecb446a5ff47711', '7fc162ba3cc26077924a93c9e394056f', 'as', 'as', 'as', 'SMA/Sederajat', 1, 'docx', 3, 2),
('5e7327b4cd8af6ee413d0be655f85c35', '7bca52fb54da17b7b0ea4f25af2c7c02', 'fds', 'gsrres', 'ste', 'SMA/Sederajat', 2, 'doc', 1, 0),
('9222c451a0f9cfb0773d02c1d13a0684', '7bca52fb54da17b7b0ea4f25af2c7c02', 'ijdij', 'ihd', 'gw', 'Mahasiswa', 5, 'pptx', 2, 0),
('a07072df441d88eccf54c7b89f4df336', '7bca52fb54da17b7b0ea4f25af2c7c02', 'wdj', 'jhh', 'kjf', 'SMA/Sederajat', 1, 'zip', 2, 1),
('a31c20a45a9233416cb26e03efc10a56', '7bca52fb54da17b7b0ea4f25af2c7c02', 'ijdj', 'ifeh', 'ijfeh', 'Mahasiswa', 2, 'ppt', 1, 1),
('b8e364376e9ea55c49de5e605d7bce8f', '7bca52fb54da17b7b0ea4f25af2c7c02', 'dk', 'doj', 'disjj', 'Mahasiswa', 3, 'xls', 0, 0),
('dc844a7ddc2cb8a7c0538b6336b7288c', '7bca52fb54da17b7b0ea4f25af2c7c02', 'fsdjh', 'Uhhu', 'huhu', 'SMA/Sederajat', 1, 'rar', 0, 3),
('e21ea7bacaff27f4418c75c9cf401139', '7bca52fb54da17b7b0ea4f25af2c7c02', 'fdd', 'fss', 'gfd', 'Mahasiswa', 6, 'pdf', 1, 1);

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
  `password` varchar(255) NOT NULL,
  `last_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `nomor_telepon`, `tanggal_lahir`, `level`, `password`, `last_time`) VALUES
('22987a6d8f8c45d5b82e85fbdc99c8fc', 'orang umum', 'umum@gmail.com', '097', '2000-05-09', 'Umum', '6e2e68e9c4ff15592498dee561b4db5d24dd6174', '2023-07-23 09:47:37'),
('7bca52fb54da17b7b0ea4f25af2c7c02', 'Rizqi Irfan', 'rizqiirfan23@gmail.com', '09937139232', '2005-06-07', 'Pelajar', '694fab815ab952bf8c3130b386cc08d43c901a2f', '2023-07-23 09:47:59'),
('7fc162ba3cc26077924a93c9e394056f', 'Mokhamad Iqbal', 'iqbal@gmail.com', '57567675656774', '2018-07-07', 'Pengajar', '47d6333f094591ca2d25796b115e98ff499d9fea', '2023-07-23 09:54:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumber_belajar`
--
ALTER TABLE `sumber_belajar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_uploader` (`id_uploader`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
