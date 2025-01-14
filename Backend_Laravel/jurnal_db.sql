-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 14, 2025 at 09:43 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jurnal_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `indikators`
--

CREATE TABLE `indikators` (
  `id` bigint UNSIGNED NOT NULL,
  `id_siswa` bigint UNSIGNED NOT NULL,
  `id_instansi` bigint UNSIGNED NOT NULL,
  `id_jurnal` bigint UNSIGNED NOT NULL,
  `indikator` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skor` int DEFAULT NULL,
  `status` enum('sudah','belum') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_submit` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `indikators`
--

INSERT INTO `indikators` (`id`, `id_siswa`, `id_instansi`, `id_jurnal`, `indikator`, `deskripsi`, `skor`, `status`, `tanggal_submit`, `created_at`, `updated_at`) VALUES
(3, 2, 2, 2, 'Menerapkan soft skills yang dibutuhkan dalam dunia kerja (tempat PKL)', 'Berhasil Menerapkan soft skills yang dibutuhkan dalam dunia kerja (tempat PKL)', 100, 'sudah', '2025-01-14', '2025-01-14 11:55:51', '2025-01-14 13:39:27');

-- --------------------------------------------------------

--
-- Table structure for table `instansis`
--

CREATE TABLE `instansis` (
  `id` bigint UNSIGNED NOT NULL,
  `instansi_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Nama Instansi PKL',
  `instansi_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Alamat Instansi PKL',
  `instansi_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Kontak Instansi PKL',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instansis`
--

INSERT INTO `instansis` (`id`, `instansi_name`, `instansi_address`, `instansi_contact`, `created_at`, `updated_at`) VALUES
(1, 'Instansi ABC', 'Jl. Raya No. 123, Jakarta', '021-1234567', '2025-01-14 09:25:11', '2025-01-14 09:25:11'),
(2, 'Instansi XYZ', 'Jl. Merdeka No. 456, Bandung', '022-7654321', '2025-01-14 09:25:11', '2025-01-14 09:25:11');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jurnals`
--

CREATE TABLE `jurnals` (
  `id` bigint UNSIGNED NOT NULL,
  `id_siswa` bigint UNSIGNED NOT NULL,
  `id_guru` bigint UNSIGNED NOT NULL,
  `id_instansi` bigint UNSIGNED NOT NULL,
  `durasi_magang` int NOT NULL,
  `posisi_magang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurnals`
--

INSERT INTO `jurnals` (`id`, `id_siswa`, `id_guru`, `id_instansi`, `durasi_magang`, `posisi_magang`, `created_at`, `updated_at`) VALUES
(2, 2, 3, 2, 4, 'FrontEnd Website', '2025-01-14 09:57:56', '2025-01-14 09:57:56');

-- --------------------------------------------------------

--
-- Table structure for table `jurusans`
--

CREATE TABLE `jurusans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_jurusan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Kode unik untuk jurusan',
  `durasi_belajar` int DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurusans`
--

INSERT INTO `jurusans` (`id`, `nama_jurusan`, `kode_jurusan`, `durasi_belajar`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Teknik Komputer dan Jaringan', 'TKJ', 3, 'Jurusan yang mempelajari tentang komputer, jaringan, dan teknologi informasi.', '2025-01-14 09:25:11', '2025-01-14 09:25:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2025_01_12_183809_create_instansis_table', 1),
(4, '2025_01_12_183810_create_jurusans_table', 1),
(5, '2025_01_12_183811_create_users_table', 1),
(6, '2025_01_12_185307_create_permission_tables', 1),
(7, '2025_01_14_131842_create_jurnals_table', 1),
(8, '2025_01_14_131919_create_indikators_table', 1),
(9, '2025_01_14_204407_create_nilais_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 4);

-- --------------------------------------------------------

--
-- Table structure for table `nilais`
--

CREATE TABLE `nilais` (
  `id` bigint UNSIGNED NOT NULL,
  `id_siswa` bigint UNSIGNED NOT NULL,
  `nilai_laporan` int NOT NULL,
  `nilai_presentasi` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilais`
--

INSERT INTO `nilais` (`id`, `id_siswa`, `nilai_laporan`, `nilai_presentasi`, `created_at`, `updated_at`) VALUES
(1, 2, 80, 85, '2025-01-14 14:34:39', '2025-01-14 14:34:39');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2025-01-14 09:25:11', '2025-01-14 09:25:11'),
(2, 'siswa', 'web', '2025-01-14 09:25:11', '2025-01-14 09:25:11'),
(3, 'guru', 'web', '2025-01-14 09:25:11', '2025-01-14 09:25:11'),
(4, 'instansi', 'web', '2025-01-14 09:25:11', '2025-01-14 09:25:11');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('K3DgwvLaCTrCWnNxDtkmTto0AkA67swybbxOIIDk', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUkxvSjI1QzNuZk1NYzlqVnlZU1dTVFpiRDJCcGJwclhYZ0FxNTNTSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9qdXJuYWwtc2lzd2EvMiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7fQ==', 1736890990);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','siswa','guru','instansi') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Kelas siswa',
  `jurusan_id` bigint UNSIGNED DEFAULT NULL COMMENT 'Relasi ke tabel jurusan',
  `nisn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Nomor Induk Siswa Nasional',
  `tempat_pkl` bigint UNSIGNED DEFAULT NULL COMMENT 'Relasi ke tabel instansi',
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Nomor Induk Pegawai',
  `instansi_id` bigint UNSIGNED DEFAULT NULL COMMENT 'Relasi ke tabel instansi',
  `foto_profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Foto Profile',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `role`, `kelas`, `jurusan_id`, `nisn`, `tempat_pkl`, `nip`, `instansi_id`, `foto_profile`, `created_at`, `updated_at`) VALUES
(1, 'Admin SMK', 'admin@example.com', 'adminsmk', '$2y$12$EXkAxlQ4TuW8md10nVY1c.BRRv3Xd2.J.Wx2uYS/ykDxh7eR..8ZC', 'admin', NULL, NULL, NULL, NULL, NULL, NULL, 'profile-img.jpg', '2025-01-14 09:25:11', '2025-01-14 09:25:11'),
(2, 'Siswa SMK', 'siswa@example.com', 'siswasmk', '$2y$12$d..aH7MzvLUGl7Uv7gnZ6uiF7GvDm59r8WTBPF6YL94q5uAuYrfva', 'siswa', 'XII RPL 1', 1, '1234567890', 1, NULL, NULL, 'profile-img.jpg', '2025-01-14 09:25:12', '2025-01-14 09:25:12'),
(3, 'Guru SMK', 'guru@example.com', 'gurusmk', '$2y$12$zdvD.P6qTHEqc2R1kf63sOjZcfRM5U73d2CogRtos7T5B/qawVeti', 'guru', NULL, NULL, NULL, NULL, '1987654321', NULL, 'profile-img.jpg', '2025-01-14 09:25:12', '2025-01-14 09:25:12'),
(4, 'Instansi PKL', 'instansi@example.com', 'instansipkl', '$2y$12$VOCYmxpSs.lCycUlGLwJ.ud2x2Lfo60iZP9QR4lE8oZtETrZNclF.', 'instansi', NULL, NULL, NULL, NULL, NULL, 1, 'profile-img.jpg', '2025-01-14 09:25:12', '2025-01-14 09:25:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `indikators`
--
ALTER TABLE `indikators`
  ADD PRIMARY KEY (`id`),
  ADD KEY `indikators_id_siswa_foreign` (`id_siswa`),
  ADD KEY `indikators_id_instansi_foreign` (`id_instansi`),
  ADD KEY `indikators_id_jurnal_foreign` (`id_jurnal`);

--
-- Indexes for table `instansis`
--
ALTER TABLE `instansis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurnals`
--
ALTER TABLE `jurnals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jurnals_id_siswa_foreign` (`id_siswa`),
  ADD KEY `jurnals_id_guru_foreign` (`id_guru`),
  ADD KEY `jurnals_id_instansi_foreign` (`id_instansi`);

--
-- Indexes for table `jurusans`
--
ALTER TABLE `jurusans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jurusans_nama_jurusan_unique` (`nama_jurusan`),
  ADD UNIQUE KEY `jurusans_kode_jurusan_unique` (`kode_jurusan`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `nilais`
--
ALTER TABLE `nilais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilais_id_siswa_foreign` (`id_siswa`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_nisn_unique` (`nisn`),
  ADD UNIQUE KEY `users_nip_unique` (`nip`),
  ADD KEY `users_jurusan_id_foreign` (`jurusan_id`),
  ADD KEY `users_tempat_pkl_foreign` (`tempat_pkl`),
  ADD KEY `users_instansi_id_foreign` (`instansi_id`),
  ADD KEY `users_role_index` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `indikators`
--
ALTER TABLE `indikators`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `instansis`
--
ALTER TABLE `instansis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jurnals`
--
ALTER TABLE `jurnals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jurusans`
--
ALTER TABLE `jurusans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nilais`
--
ALTER TABLE `nilais`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `indikators`
--
ALTER TABLE `indikators`
  ADD CONSTRAINT `indikators_id_instansi_foreign` FOREIGN KEY (`id_instansi`) REFERENCES `instansis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `indikators_id_jurnal_foreign` FOREIGN KEY (`id_jurnal`) REFERENCES `jurnals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `indikators_id_siswa_foreign` FOREIGN KEY (`id_siswa`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jurnals`
--
ALTER TABLE `jurnals`
  ADD CONSTRAINT `jurnals_id_guru_foreign` FOREIGN KEY (`id_guru`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jurnals_id_instansi_foreign` FOREIGN KEY (`id_instansi`) REFERENCES `instansis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jurnals_id_siswa_foreign` FOREIGN KEY (`id_siswa`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nilais`
--
ALTER TABLE `nilais`
  ADD CONSTRAINT `nilais_id_siswa_foreign` FOREIGN KEY (`id_siswa`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_instansi_id_foreign` FOREIGN KEY (`instansi_id`) REFERENCES `instansis` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_jurusan_id_foreign` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusans` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_tempat_pkl_foreign` FOREIGN KEY (`tempat_pkl`) REFERENCES `instansis` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
