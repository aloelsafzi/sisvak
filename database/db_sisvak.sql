-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2021 at 05:08 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sisvak`
--

-- --------------------------------------------------------

--
-- Table structure for table `keterangan_vaksinasi`
--

CREATE TABLE `keterangan_vaksinasi` (
  `id_ket_vaksinasi` int(11) NOT NULL,
  `id_warga` int(11) NOT NULL,
  `id_tempat_vaksin` int(11) NOT NULL,
  `status_vaksinasi` enum('0','1') NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keterangan_vaksinasi`
--

INSERT INTO `keterangan_vaksinasi` (`id_ket_vaksinasi`, `id_warga`, `id_tempat_vaksin`, `status_vaksinasi`, `created_at`, `updated_at`) VALUES
(5, 6, 5, '1', NULL, NULL),
(6, 7, 3, '1', NULL, NULL),
(7, 8, 5, '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tempat_vaksin`
--

CREATE TABLE `tempat_vaksin` (
  `id` int(11) NOT NULL,
  `nama_tempat` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `rt` int(3) NOT NULL,
  `rw` int(3) NOT NULL,
  `desa` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tempat_vaksin`
--

INSERT INTO `tempat_vaksin` (`id`, `nama_tempat`, `alamat`, `rt`, `rw`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `created_at`, `updated_at`) VALUES
(3, 'SD 1 Pamubulan', '                                                        Jln Bayah Cibareno Km 14                                                    ', 4, 9, 'Pamubulan', 'Bayah', 'Lebak', 'Banten', NULL, NULL),
(4, 'SMP PGRI Bayah', 'Jl Raya Bayah Cibareno Km 10 ', 4, 3, 'Neglasari', 'Bayah', 'Lebak', 'Banten', NULL, NULL),
(5, 'Kantor Kecamatan Cilograng', 'Jln Raya Bayah Cibareno km 30', 5, 3, 'Cikatomas', 'Cilograng', 'Lebak', 'Banten', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `fullname`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Samsul Fauzi', 'admin', 1, '2021-05-16 16:20:27', '2021-05-16 16:20:27');

-- --------------------------------------------------------

--
-- Table structure for table `warga`
--

CREATE TABLE `warga` (
  `id` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `usia` int(2) NOT NULL,
  `jenis_kelamin` enum('l','p') NOT NULL,
  `alamat` text NOT NULL,
  `rt` int(3) NOT NULL,
  `rw` int(3) NOT NULL,
  `desa` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `photo_url` varchar(225) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warga`
--

INSERT INTO `warga` (`id`, `nik`, `nama`, `usia`, `jenis_kelamin`, `alamat`, `rt`, `rw`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `photo_url`, `created_at`, `updated_at`) VALUES
(6, '5434434', 'Rani', 15, 'p', 'Jl Lemari', 4, 3, 'Pamubulan', 'Bayah', 'Lebak', 'Banten', '1621173052_76f68114a646e540a1de.jpg', NULL, NULL),
(7, '6454545', 'Samsul Fauzi', 20, 'l', 'Jl Bayah Cibareno', 5, 2, 'Pamubulan', 'Bayah', 'Lebak', 'Banten', '1621173665_8279982e57341ff66673.jpg', NULL, NULL),
(8, '909500594', 'Tomo Sutomo', 35, 'l', 'Jl Bojong', 5, 6, 'Neglasari', 'Bayah', 'Lebak', 'Banten', '1621181926_6619b513d73f35c72f6f.jpg', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keterangan_vaksinasi`
--
ALTER TABLE `keterangan_vaksinasi`
  ADD PRIMARY KEY (`id_ket_vaksinasi`),
  ADD KEY `id_warga` (`id_warga`),
  ADD KEY `id_tempat_vaksin` (`id_tempat_vaksin`);

--
-- Indexes for table `tempat_vaksin`
--
ALTER TABLE `tempat_vaksin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keterangan_vaksinasi`
--
ALTER TABLE `keterangan_vaksinasi`
  MODIFY `id_ket_vaksinasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tempat_vaksin`
--
ALTER TABLE `tempat_vaksin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `warga`
--
ALTER TABLE `warga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keterangan_vaksinasi`
--
ALTER TABLE `keterangan_vaksinasi`
  ADD CONSTRAINT `keterangan_vaksinasi_ibfk_1` FOREIGN KEY (`id_tempat_vaksin`) REFERENCES `tempat_vaksin` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `keterangan_vaksinasi_ibfk_2` FOREIGN KEY (`id_warga`) REFERENCES `warga` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
