-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2021 at 03:47 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lelang`
--

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
(10, '2021_06_23_070711_create_tb_history_lelangs_table', 1),
(25, '2014_10_12_000000_create_users_table', 2),
(26, '2014_10_12_100000_create_password_resets_table', 2),
(27, '2019_08_19_000000_create_failed_jobs_table', 2),
(28, '2021_06_23_072819_create_tb_barangs_table', 2),
(58, '2021_07_01_081522_create_pemilihanpemenang_table', 3),
(79, '2021_06_23_073323_create_tb_lelangs_table', 4),
(80, '2021_06_30_025848_create_pelelangs_table', 4);

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
-- Table structure for table `pelelangs`
--

CREATE TABLE `pelelangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tb_barangs_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `bid` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelelangs`
--

INSERT INTO `pelelangs` (`id`, `tb_barangs_id`, `users_id`, `bid`, `created_at`, `updated_at`) VALUES
(1, 'Masker', 3, '90000', '2021-07-02 02:34:57', '2021-07-02 02:34:57'),
(6, 'kostum ninja', 4, '90000', '2021-07-02 02:37:00', '2021-07-02 02:37:00'),
(10, 'Motor Ninja', 5, '200000', '2021-07-02 03:33:10', '2021-07-02 03:33:10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barangs`
--

CREATE TABLE `tb_barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl` date NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_awal` int(11) NOT NULL,
  `deskripsi_barang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_barangs`
--

INSERT INTO `tb_barangs` (`id`, `nama_barang`, `tgl`, `gambar`, `harga_awal`, `deskripsi_barang`, `created_at`, `updated_at`) VALUES
(1, 'Masker', '2021-06-29', 'masker.jpg', 60000, 'masker pelindung hidung dan mulut', '2021-06-28 23:43:08', '2021-06-28 23:43:08'),
(2, 'Motor Ninja', '2021-06-29', 'ninja.jpg', 80000, 'keren 250 cc', '2021-06-28 23:44:46', '2021-06-28 23:44:46'),
(3, 'kostum ninja', '2021-06-29', 'ada lagi.PNG', 45000, 'keren bahan kain katun', '2021-06-28 23:46:21', '2021-06-28 23:46:21');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lelangs`
--

CREATE TABLE `tb_lelangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tb_barangs_id` bigint(20) NOT NULL,
  `tgl_lelang` date NOT NULL,
  `pelelangs_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pemenang` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('dibuka','ditutup') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_lelangs`
--

INSERT INTO `tb_lelangs` (`id`, `tb_barangs_id`, `tgl_lelang`, `pelelangs_id`, `pemenang`, `users_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-07-02', '90,000', 'ipin', 2, 'ditutup', '2021-07-02 02:32:18', '2021-07-02 03:29:47'),
(2, 2, '2021-07-06', '200,000', 'galuh', 2, 'ditutup', '2021-07-02 02:32:40', '2021-07-02 03:33:46'),
(3, 3, '2021-07-15', '90,000', 'Fadlan', 2, 'ditutup', '2021-07-02 02:32:52', '2021-07-02 03:30:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('administrator','masyarakat','petugas') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'masyarakat',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_lengkap`, `email`, `email_verified_at`, `username`, `telp`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Lelang', 'adminlelang@gmail.com', NULL, 'Admin', '081905157614', '$2b$10$8tQPMqOARm.3xkOJ3aVSbOXqNCt/50qajfptIVyxVdaL2Q.RSn/NK', 'administrator', NULL, '2021-06-29 06:29:57', '2021-06-29 06:29:57'),
(2, 'Petugas 1', 'petugas1@gmail.com', NULL, 'petugas1', '0819067212', '$2y$10$bEp7ILG4fytzULFIMYQlZOtSR5MiShyqNV7/9vCvmesbwQG4BntUi', 'petugas', NULL, '2021-06-28 23:35:38', '2021-06-28 23:35:38'),
(3, 'Arifin Ilham', 'ipin@gmail.com', NULL, 'ipin', '081905158212', '$2y$10$7Oq6NdklC9KbeKmtg9g3Ge9Uw3q1huMGKN0GSJ3IDgFW//41Y8cCS', 'masyarakat', NULL, '2021-06-28 23:38:27', '2021-06-28 23:38:27'),
(4, 'Muhammad Fadlan Iskandar', 'fadlan27@gmail.com', NULL, 'Fadlan', '08910235432', '$2y$10$/roeT2ahu3f2zBpgbRPd6uPUIHhH3Io5SxWtV.z6RPxT.ffAS9rii', 'masyarakat', NULL, '2021-07-01 06:04:55', '2021-07-01 06:04:55'),
(5, 'Galuh Permana', 'galuhpermana@gmail.com', NULL, 'galuh', '0819076821', '$2y$10$Fz0.4VQTx3q10SL.H4ffWubCoSl5C3Lnsvie8QSDhCmiTi013NzuG', 'masyarakat', NULL, '2021-07-01 23:49:37', '2021-07-01 23:49:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `pelelangs`
--
ALTER TABLE `pelelangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_barangs`
--
ALTER TABLE `tb_barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_lelangs`
--
ALTER TABLE `tb_lelangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `pelelangs`
--
ALTER TABLE `pelelangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_barangs`
--
ALTER TABLE `tb_barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_lelangs`
--
ALTER TABLE `tb_lelangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
