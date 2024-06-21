-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2024 at 08:39 PM
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
-- Database: `laravel_klinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokters`
--

CREATE TABLE `dokters` (
  `id` int(11) NOT NULL,
  `nama_dokter` varchar(255) NOT NULL,
  `spesialisasi_dokter` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dokters`
--

INSERT INTO `dokters` (`id`, `nama_dokter`, `spesialisasi_dokter`, `created_at`, `updated_at`) VALUES
(1, 'Nisa', 'Poli Anak', '2024-05-13 00:27:39', '2024-05-13 00:27:50'),
(2, 'Novia Rahma', 'Poli Umum', '2024-06-20 01:59:57', '2024-06-20 03:52:48');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `obats`
--

CREATE TABLE `obats` (
  `id` int(11) NOT NULL,
  `nama_obat` varchar(255) NOT NULL,
  `jumlah_obat` int(11) NOT NULL,
  `harga_obat` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `obats`
--

INSERT INTO `obats` (`id`, `nama_obat`, `jumlah_obat`, `harga_obat`, `created_at`, `updated_at`) VALUES
(1, 'Omeprazole', 15, 4000.00, '2024-06-20 02:00:28', '2024-06-20 02:00:28'),
(2, 'Flutamol', 20, 6000.00, '2024-06-20 02:02:46', '2024-06-20 03:53:36'),
(3, 'Paracetamol', 35, 8000.00, '2024-06-20 02:03:16', '2024-06-20 02:03:16');

-- --------------------------------------------------------

--
-- Table structure for table `pasiens`
--

CREATE TABLE `pasiens` (
  `id` int(11) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `alamat_pasien` varchar(255) NOT NULL,
  `tgl_datang` date NOT NULL,
  `keluhan_pasien` text NOT NULL,
  `dokter_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pasiens`
--

INSERT INTO `pasiens` (`id`, `nama_pasien`, `alamat_pasien`, `tgl_datang`, `keluhan_pasien`, `dokter_id`, `created_at`, `updated_at`) VALUES
(2, 'Tjut', 'Bireuen', '2024-05-10', 'Darah Tinggi', 1, '2024-05-13 15:54:30', '2024-05-13 15:54:30');

-- --------------------------------------------------------

--
-- Table structure for table `perjanjians`
--

CREATE TABLE `perjanjians` (
  `id` int(11) NOT NULL,
  `pasien_id` int(11) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `nama_dokter` varchar(255) NOT NULL,
  `spesialisasi_dokter` varchar(255) DEFAULT NULL,
  `waktu_perjanjian` time DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perjanjians`
--

INSERT INTO `perjanjians` (`id`, `pasien_id`, `nama_pasien`, `nama_dokter`, `spesialisasi_dokter`, `waktu_perjanjian`, `created_at`, `updated_at`) VALUES
(3, 2, 'Tjut', 'Nisa', NULL, '02:00:00', '2024-05-13 08:55:18', '2024-05-13 08:55:18'),
(4, 2, 'Tjut', 'Nisa', NULL, '02:00:00', '2024-06-20 01:44:52', '2024-06-20 01:44:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','dokter','pasien') DEFAULT 'pasien',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(2, 'Tjut', 'cut@gmail.com', '$2y$10$eEfHr4EsE2CJ4b/KNTRKxuRSJJoKXYg2Hgs3JsQKoBgsgTWdguD8.', 'pasien', '2024-05-13 00:18:05', '2024-05-13 00:18:05'),
(3, 'Nisa', 'saa@gmail.com', '$2y$10$Jjoh0Pn3OVvEg5UJKSiiTOx8nFkalZCX/rXe6W9ZPD74oyyqnFPXS', 'dokter', '2024-05-13 00:18:48', '2024-05-13 07:19:14'),
(5, 'Rozakira Zulfa', 'zakira@gmail.com', '$2y$10$YakWbei4rNBLAEgpBgAGNex2NPygoetb/1eXy6/7pNSZHHYUCYTby', 'admin', '2024-06-20 01:45:44', '2024-06-20 08:46:22'),
(6, 'suci', 'sucimutiasrg@gmail.com', '$2y$10$DubBQeMLdTG2rAT.6QN4D.Lhmou/5FdLfBlnYoYBcVlP2ya4Y2k6u', 'pasien', '2024-06-20 20:31:31', '2024-06-20 20:31:31'),
(7, 'Ayulatif', 'ayu@gmail.com', '$2y$10$0Rl.6J2t4.Ku.Se4D7F6AOdd06lzOI9q/RLNPtK0Kxu2M20zESEpu', 'pasien', '2024-06-20 20:35:01', '2024-06-20 20:35:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokters`
--
ALTER TABLE `dokters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obats`
--
ALTER TABLE `obats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasiens`
--
ALTER TABLE `pasiens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dokter_id` (`dokter_id`);

--
-- Indexes for table `perjanjians`
--
ALTER TABLE `perjanjians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pasien_id` (`pasien_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokters`
--
ALTER TABLE `dokters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `obats`
--
ALTER TABLE `obats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pasiens`
--
ALTER TABLE `pasiens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `perjanjians`
--
ALTER TABLE `perjanjians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pasiens`
--
ALTER TABLE `pasiens`
  ADD CONSTRAINT `pasiens_ibfk_1` FOREIGN KEY (`dokter_id`) REFERENCES `dokters` (`id`);

--
-- Constraints for table `perjanjians`
--
ALTER TABLE `perjanjians`
  ADD CONSTRAINT `perjanjians_ibfk_1` FOREIGN KEY (`pasien_id`) REFERENCES `pasiens` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
