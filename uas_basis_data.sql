-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2024 at 04:51 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas basis data`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` int(100) NOT NULL,
  `alamat` text NOT NULL,
  `programstudi` varchar(100) NOT NULL,
  `ukt` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `nama`, `nim`, `alamat`, `programstudi`, `ukt`) VALUES
(1, 'Fatih', 43231, 'Jalan Wibu Bawang', 'Ilmu Perikanan', 2500000),
(2, 'Ahmad', 43232, 'Jalan Merdeka 15', 'Teknik Informatika', 5000000),
(3, 'Sarah', 43233, 'Jalan Mawar 7', 'Manajemen', 3500000),
(4, 'Deni', 43234, 'Jalan Dahlia 22', 'Teknik Sipil', 4500000),
(5, 'Maya', 43235, 'Jalan Anggrek 9', 'Kedokteran', 7500000),
(6, 'Budi', 43236, 'Jalan Melati 11', 'Psikologi', 4000000),
(7, 'Rini', 43237, 'Jalan Kamboja 5', 'Akuntansi', 3000000),
(8, 'Hadi', 43238, 'Jalan Kenanga 33', 'Arsitektur', 5500000),
(9, 'Nina', 43239, 'Jalan Tulip 17', 'Hukum', 4200000),
(10, 'Eko', 43240, 'Jalan Teratai 25', 'Ekonomi', 3800000),
(11, 'Sinta', 43241, 'Jalan Cempaka 45', 'Psikologi', 4700000),
(12, 'Rudi', 43242, 'Jalan Alamanda 12', 'Teknik Kimia', 5200000),
(13, 'Dewi', 43243, 'Jalan Bougenville 8', 'Kedokteran Gigi', 7000000),
(14, 'Joko', 43244, 'Jalan Kemuning 19', 'Ilmu Komunikasi', 3200000),
(15, 'Lisa', 43245, 'Jalan Seroja 27', 'Farmasi', 6500000),
(16, 'Andi', 43246, 'Jalan Beringin 31', 'Teknik Mesin', 4800000),
(17, 'Putri', 43247, 'Jalan Flamboyan 14', 'Sastra Inggris', 3300000),
(18, 'Surya', 43248, 'Jalan Kelapa 23', 'Teknik Elektro', 5100000),
(19, 'Diana', 43249, 'Jalan Mangga 16', 'Akuntansi', 3900000),
(20, 'Reza', 43250, 'Jalan Durian 42', 'Manajemen', 4100000),
(21, 'Sari', 43251, 'Jalan Nangka 37', 'Ilmu Politik', 3600000),
(22, 'Irfan', 43252, 'Jalan Rambutan 21', 'Teknik Industri', 4900000),
(23, 'Nadia', 43253, 'Jalan Salak 13', 'Psikologi', 4300000),
(24, 'Rizki', 43254, 'Jalan Jeruk 29', 'Teknik Sipil', 5300000),
(25, 'Linda', 43255, 'Jalan Apel 18', 'Kedokteran', 7200000),
(26, 'Dimas', 43256, 'Jalan Sawo 34', 'Arsitektur', 5400000),
(27, 'Rina', 43257, 'Jalan Belimbing 26', 'Hukum', 4400000),
(28, 'Fajar', 43258, 'Jalan Jambu 15', 'Ekonomi', 3700000),
(29, 'Bella', 43259, 'Jalan Pepaya 32', 'Manajemen', 4600000),
(30, 'Arif', 43260, 'Jalan Semangka 28', 'Teknik Informatika', 5600000),
(31, 'Indah', 43261, 'Jalan Melon 41', 'Sastra Indonesia', 3400000),
(32, 'Yoga', 43262, 'Jalan Delima 24', 'Teknik Kimia', 5000000),
(33, 'Citra', 43263, 'Jalan Anggur 36', 'Farmasi', 6000000),
(34, 'Rama', 43264, 'Jalan Lengkeng 20', 'Teknik Mesin', 4800000),
(35, 'Eva', 43265, 'Jalan Duku 39', 'Ilmu Komunikasi', 3800000),
(36, 'Tono', 43266, 'Jalan Kelengkeng 17', 'Teknik Elektro', 5200000),
(37, 'Dina', 43267, 'Jalan Sirsak 43', 'Akuntansi', 4000000),
(38, 'Bayu', 43268, 'Jalan Markisa 30', 'Manajemen', 4200000),
(39, 'Rita', 43269, 'Jalan Alpukat 25', 'Psikologi', 4500000),
(40, 'Dani', 43270, 'Jalan Kesemek 38', 'Teknik Industri', 5100000),
(41, 'Siska', 43271, 'Jalan Rambutan 44', 'Kedokteran', 7300000),
(42, 'Agus', 43272, 'Jalan Mangga 35', 'Hukum', 4700000),
(43, 'Novi', 43273, 'Jalan Durian 40', 'Ekonomi', 3900000),
(44, 'Bima', 43274, 'Jalan Nangka 33', 'Teknik Sipil', 5300000),
(45, 'Lia', 43275, 'Jalan Salak 27', 'Arsitektur', 5500000),
(46, 'Rico', 43276, 'Jalan Jeruk 46', 'Sastra Inggris', 3600000),
(47, 'Tari', 43277, 'Jalan Apel 31', 'Ilmu Politik', 3700000),
(48, 'Adi', 43278, 'Jalan Sawo 42', 'Teknik Informatika', 5400000),
(49, 'Yuni', 43279, 'Jalan Belimbing 37', 'Farmasi', 6200000),
(50, 'Hendra', 43280, 'Jalan Jambu 47', 'Manajemen', 4100000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
