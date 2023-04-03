-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2023 at 03:53 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `aspirasis`
--

CREATE TABLE `aspirasis` (
  `id_aspirasi` int(10) UNSIGNED NOT NULL,
  `status` enum('Menunggu','Proses','Selesai') COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pelaporan` int(10) UNSIGNED NOT NULL,
  `id_kategori` int(10) UNSIGNED NOT NULL,
  `feedback` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aspirasis`
--

INSERT INTO `aspirasis` (`id_aspirasi`, `status`, `id_pelaporan`, `id_kategori`, `feedback`, `created_at`, `updated_at`) VALUES
(1, 'Menunggu', 2, 1, 'dw', '2023-03-08 23:50:51', '2023-03-08 23:50:51'),
(2, 'Menunggu', 2, 1, 'd3d2', '2023-03-08 23:50:55', '2023-03-08 23:50:55'),
(3, 'Proses', 2, 1, 'd32d', '2023-03-08 23:51:01', '2023-03-08 23:51:01'),
(4, 'Menunggu', 1, 2, 'ok', '2023-03-09 18:40:44', '2023-03-09 18:40:44'),
(5, 'Proses', 1, 2, 'Saya akan atasi', '2023-03-09 18:58:18', '2023-03-09 18:58:18'),
(6, 'Menunggu', 26, 1, 'Baiklah Saya Atasi', '2023-03-09 19:08:04', '2023-03-09 19:08:04'),
(7, 'Proses', 26, 1, 'Sedang dalam pembersihan', '2023-03-09 19:08:19', '2023-03-09 19:08:19'),
(8, 'Selesai', 26, 1, 'Sekarang sudah bersih!', '2023-03-09 19:08:32', '2023-03-09 19:08:32');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inputs`
--

CREATE TABLE `inputs` (
  `id_pelaporan` int(10) UNSIGNED NOT NULL,
  `nis` int(10) UNSIGNED NOT NULL,
  `id_kategori` int(10) UNSIGNED NOT NULL,
  `lokasi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ket` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inputs`
--

INSERT INTO `inputs` (`id_pelaporan`, `nis`, `id_kategori`, `lokasi`, `foto`, `ket`, `kode`, `created_at`, `updated_at`) VALUES
(1, 2222222222, 2, 'Cengkareng, Jakarta Bart', 'tidakada', 'Isi Keterangan', '1678337644-1111111111', '2023-03-08 21:54:04', '2023-03-08 21:55:55'),
(2, 2222222222, 1, 'fewf', '1678342256.png', 'efw', '1678342256-2222222222', '2023-03-08 23:10:56', '2023-03-08 23:10:56'),
(3, 1111111111, 2, 'a', 'tidakada', 'efw', '1678342553-11111111', '2023-03-08 23:15:53', '2023-03-08 23:15:53'),
(4, 2222222222, 2, '32e', 'tidakada', 'r32', '1678342893-2222222222', '2023-03-08 23:21:33', '2023-03-08 23:21:33'),
(5, 2222222222, 2, 'Cengkaren6g, Jakarta Barat', 'tidakada', 'efw', '1678342973-2222222222', '2023-03-08 23:22:53', '2023-03-08 23:22:53'),
(6, 2222222222, 2, 'Cengkareng, Jakarta Bart', 'tidakada', 'efw', '1678345448-2222222222', '2023-03-09 00:04:08', '2023-03-09 00:04:08'),
(7, 2222222222, 1, 'Cengkareng, Jakarta Bart', 'tidakada', 'r32', '1678345467-2222222222', '2023-03-09 00:04:27', '2023-03-09 00:04:27'),
(8, 2222222222, 2, 'Cengkareng, Jakarta Bart', 'tidakada', 'efw', '1678345580-2222222222', '2023-03-09 00:06:20', '2023-03-09 00:06:20'),
(9, 1111111111, 2, 'Cengkareng, Jakarta Bart', '1678349586.png', 'r32', '1678349586-11111111', '2023-03-09 01:13:06', '2023-03-09 01:13:06'),
(13, 1111111111, 2, 'Cengkareng, Jakarta Barat', 'tidakada', 'efw', '1678406793-11111111', '2023-03-09 17:06:33', '2023-03-09 17:06:33'),
(15, 2222222222, 2, 'Cengkareng, Jakarta Bart', 'tidakada', 'efw', '1678407345-2222222222', '2023-03-09 17:15:45', '2023-03-09 17:15:45'),
(16, 1111111111, 2, 'Cengkaren6g, Jakarta Barat', 'tidakada', 'efw', '1678407373-11111111', '2023-03-09 17:16:13', '2023-03-09 17:16:13'),
(22, 2222222222, 2, 'Cengkareng, Jakarta Bart', 'tidakada', 'efw', '1678408306-2222222222', '2023-03-09 17:31:46', '2023-03-09 17:31:46'),
(23, 2222222222, 1, 'Cengkareng, Jakarta Bart', 'tidakada', 'efw', '1678408382-2222222222', '2023-03-09 17:33:02', '2023-03-09 17:33:02'),
(24, 2222222222, 2, 'Cengkareng, Jakasrta Barat', 'tidakada', 'efw', '1678413011-2222222222', '2023-03-09 18:50:11', '2023-03-09 18:50:11'),
(25, 1111111111, 1, 'Cengkareng, Jakarta Bart', '1678413897.png', 'Rambut Panjang', '1678413897-1111111111', '2023-03-09 19:04:57', '2023-03-09 19:04:57'),
(26, 1111111111, 1, 'Cengkareng, Jakarta Bart', '1678413933.png', 'Kotor', '1678413933-1111111111', '2023-03-09 19:05:33', '2023-03-09 19:05:33');

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id_kategori` int(10) UNSIGNED NOT NULL,
  `ket_kategori` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id_kategori`, `ket_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Kebersihan', '2023-03-08 21:53:45', '2023-03-09 18:51:45'),
(2, 'Kedisiplinan', '2023-03-08 21:53:53', '2023-03-08 21:53:53');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2023_03_09_014845_create_kategoris_table', 1),
(5, '2023_03_09_015038_create_siswas_table', 1),
(6, '2023_03_09_015241_create_inputs_table', 1),
(7, '2023_03_09_015309_create_aspirasis_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswas`
--

CREATE TABLE `siswas` (
  `nis` int(10) UNSIGNED NOT NULL,
  `kelas` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswas`
--

INSERT INTO `siswas` (`nis`, `kelas`, `created_at`, `updated_at`) VALUES
(1111111111, 'Si Ganteng', '2023-03-08 21:53:31', '2023-03-09 19:44:59'),
(2222222222, 'Si Tampan', '2023-03-08 21:53:37', '2023-03-09 19:45:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `username_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'vincent', NULL, '$2y$10$ygXzW5w9VRy1IrkwtvEvF.Qq5kDbc7WOvZmRAWLwIalECcqXCSwOK', NULL, '2023-03-08 21:53:18', '2023-03-08 21:53:18'),
(2, 'admin', NULL, '$2y$10$q5NQm.4SNQRdyZB5cQsPYurpDd5AZ3YXQ1eeOECCxP4HhalnMcWQK', NULL, '2023-03-09 17:39:44', '2023-03-09 17:39:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aspirasis`
--
ALTER TABLE `aspirasis`
  ADD PRIMARY KEY (`id_aspirasi`),
  ADD KEY `aspirasis_id_pelaporan_foreign` (`id_pelaporan`),
  ADD KEY `aspirasis_id_kategori_foreign` (`id_kategori`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inputs`
--
ALTER TABLE `inputs`
  ADD PRIMARY KEY (`id_pelaporan`),
  ADD KEY `inputs_nis_foreign` (`nis`),
  ADD KEY `inputs_id_kategori_foreign` (`id_kategori`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aspirasis`
--
ALTER TABLE `aspirasis`
  MODIFY `id_aspirasi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inputs`
--
ALTER TABLE `inputs`
  MODIFY `id_pelaporan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id_kategori` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aspirasis`
--
ALTER TABLE `aspirasis`
  ADD CONSTRAINT `aspirasis_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategoris` (`id_kategori`) ON UPDATE CASCADE,
  ADD CONSTRAINT `aspirasis_id_pelaporan_foreign` FOREIGN KEY (`id_pelaporan`) REFERENCES `inputs` (`id_pelaporan`) ON UPDATE CASCADE;

--
-- Constraints for table `inputs`
--
ALTER TABLE `inputs`
  ADD CONSTRAINT `inputs_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategoris` (`id_kategori`) ON UPDATE CASCADE,
  ADD CONSTRAINT `inputs_nis_foreign` FOREIGN KEY (`nis`) REFERENCES `siswas` (`nis`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
