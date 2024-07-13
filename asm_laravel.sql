-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 13, 2024 at 06:32 AM
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
-- Database: `asm_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `binh_luans`
--

CREATE TABLE `binh_luans` (
  `id` bigint UNSIGNED NOT NULL,
  `tai_khoan_id` bigint UNSIGNED NOT NULL,
  `san_pham_id` bigint UNSIGNED NOT NULL,
  `noi_dung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thoi_gian` datetime NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hangs`
--

CREATE TABLE `chi_tiet_don_hangs` (
  `id` bigint UNSIGNED NOT NULL,
  `don_hang_id` bigint UNSIGNED NOT NULL,
  `san_pham_id` bigint UNSIGNED NOT NULL,
  `so_luong` int NOT NULL,
  `gia` double(10,2) NOT NULL,
  `thanh_tien` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_gio_hangs`
--

CREATE TABLE `chi_tiet_gio_hangs` (
  `id` bigint UNSIGNED NOT NULL,
  `gio_hang_id` bigint UNSIGNED NOT NULL,
  `san_pham_id` bigint UNSIGNED NOT NULL,
  `so_luong` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chuc_vus`
--

CREATE TABLE `chuc_vus` (
  `id` bigint UNSIGNED NOT NULL,
  `ten_chuc_vu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danh_mucs`
--

CREATE TABLE `danh_mucs` (
  `id` bigint UNSIGNED NOT NULL,
  `ten_danh_muc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `don_hangs`
--

CREATE TABLE `don_hangs` (
  `id` bigint UNSIGNED NOT NULL,
  `ma_don_hang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nguoi_dung_id` bigint UNSIGNED NOT NULL,
  `ten_nguoi_nhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_nguoi_nhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_dien_thoai_nguoi_nhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi_nguoi_nhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_dat` datetime NOT NULL,
  `tong_tien` double(10,2) NOT NULL,
  `ghi_chu` text COLLATE utf8mb4_unicode_ci,
  `phuong_thuc_thanh_toan_id` bigint UNSIGNED NOT NULL,
  `trang_thai_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `gio_hangs`
--

CREATE TABLE `gio_hangs` (
  `id` bigint UNSIGNED NOT NULL,
  `nguoi_dung_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_07_13_061556_create_danh_mucs_table', 1),
(6, '2024_07_13_061608_create_chuc_vus_table', 1),
(7, '2024_07_13_061617_create_tai_khoans_table', 1),
(8, '2024_07_13_061630_create_san_phams_table', 1),
(9, '2024_07_13_061645_create_binh_luans_table', 1),
(10, '2024_07_13_061659_create_phuong_thuc_thanh_toans_table', 1),
(11, '2024_07_13_061714_create_trang_thai_don_hangs_table', 1),
(12, '2024_07_13_061732_create_don_hangs_table', 1),
(13, '2024_07_13_061741_create_gio_hangs_table', 1),
(14, '2024_07_13_061758_create_chi_tiet_gio_hangs_table', 1),
(15, '2024_07_13_061807_create_chi_tiet_don_hangs_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phuong_thuc_thanh_toans`
--

CREATE TABLE `phuong_thuc_thanh_toans` (
  `id` bigint UNSIGNED NOT NULL,
  `ten_phuong_thuc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `san_phams`
--

CREATE TABLE `san_phams` (
  `id` bigint UNSIGNED NOT NULL,
  `hinh_anh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ten_san_pham` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_luong` int UNSIGNED NOT NULL,
  `gia` double(10,2) NOT NULL,
  `gia_khuyen_mai` double(10,2) DEFAULT NULL,
  `ngay_nhap` date NOT NULL,
  `mo_ta` text COLLATE utf8mb4_unicode_ci,
  `danh_muc_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoans`
--

CREATE TABLE `tai_khoans` (
  `id` bigint UNSIGNED NOT NULL,
  `anh_dai_dien` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ho_ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_dien_thoai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioi_tinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_sinh` date NOT NULL,
  `mat_khau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chuc_vu_id` bigint UNSIGNED NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai_don_hangs`
--

CREATE TABLE `trang_thai_don_hangs` (
  `id` bigint UNSIGNED NOT NULL,
  `ten_trang_thai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binh_luans`
--
ALTER TABLE `binh_luans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `binh_luans_tai_khoan_id_foreign` (`tai_khoan_id`),
  ADD KEY `binh_luans_san_pham_id_foreign` (`san_pham_id`);

--
-- Indexes for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chi_tiet_don_hangs_don_hang_id_foreign` (`don_hang_id`),
  ADD KEY `chi_tiet_don_hangs_san_pham_id_foreign` (`san_pham_id`);

--
-- Indexes for table `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chi_tiet_gio_hangs_gio_hang_id_foreign` (`gio_hang_id`),
  ADD KEY `chi_tiet_gio_hangs_san_pham_id_foreign` (`san_pham_id`);

--
-- Indexes for table `chuc_vus`
--
ALTER TABLE `chuc_vus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `don_hangs_ma_don_hang_unique` (`ma_don_hang`),
  ADD KEY `don_hangs_nguoi_dung_id_foreign` (`nguoi_dung_id`),
  ADD KEY `don_hangs_phuong_thuc_thanh_toan_id_foreign` (`phuong_thuc_thanh_toan_id`),
  ADD KEY `don_hangs_trang_thai_id_foreign` (`trang_thai_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gio_hangs_nguoi_dung_id_foreign` (`nguoi_dung_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `phuong_thuc_thanh_toans`
--
ALTER TABLE `phuong_thuc_thanh_toans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `san_phams`
--
ALTER TABLE `san_phams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `san_phams_danh_muc_id_foreign` (`danh_muc_id`);

--
-- Indexes for table `tai_khoans`
--
ALTER TABLE `tai_khoans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tai_khoans_email_unique` (`email`),
  ADD KEY `tai_khoans_chuc_vu_id_foreign` (`chuc_vu_id`);

--
-- Indexes for table `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
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
-- AUTO_INCREMENT for table `binh_luans`
--
ALTER TABLE `binh_luans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chuc_vus`
--
ALTER TABLE `chuc_vus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `don_hangs`
--
ALTER TABLE `don_hangs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phuong_thuc_thanh_toans`
--
ALTER TABLE `phuong_thuc_thanh_toans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `san_phams`
--
ALTER TABLE `san_phams`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tai_khoans`
--
ALTER TABLE `tai_khoans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binh_luans`
--
ALTER TABLE `binh_luans`
  ADD CONSTRAINT `binh_luans_san_pham_id_foreign` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `binh_luans_tai_khoan_id_foreign` FOREIGN KEY (`tai_khoan_id`) REFERENCES `tai_khoans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  ADD CONSTRAINT `chi_tiet_don_hangs_don_hang_id_foreign` FOREIGN KEY (`don_hang_id`) REFERENCES `don_hangs` (`id`),
  ADD CONSTRAINT `chi_tiet_don_hangs_san_pham_id_foreign` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`);

--
-- Constraints for table `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  ADD CONSTRAINT `chi_tiet_gio_hangs_gio_hang_id_foreign` FOREIGN KEY (`gio_hang_id`) REFERENCES `gio_hangs` (`id`),
  ADD CONSTRAINT `chi_tiet_gio_hangs_san_pham_id_foreign` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`);

--
-- Constraints for table `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD CONSTRAINT `don_hangs_nguoi_dung_id_foreign` FOREIGN KEY (`nguoi_dung_id`) REFERENCES `tai_khoans` (`id`),
  ADD CONSTRAINT `don_hangs_phuong_thuc_thanh_toan_id_foreign` FOREIGN KEY (`phuong_thuc_thanh_toan_id`) REFERENCES `phuong_thuc_thanh_toans` (`id`),
  ADD CONSTRAINT `don_hangs_trang_thai_id_foreign` FOREIGN KEY (`trang_thai_id`) REFERENCES `trang_thai_don_hangs` (`id`);

--
-- Constraints for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  ADD CONSTRAINT `gio_hangs_nguoi_dung_id_foreign` FOREIGN KEY (`nguoi_dung_id`) REFERENCES `tai_khoans` (`id`);

--
-- Constraints for table `san_phams`
--
ALTER TABLE `san_phams`
  ADD CONSTRAINT `san_phams_danh_muc_id_foreign` FOREIGN KEY (`danh_muc_id`) REFERENCES `danh_mucs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tai_khoans`
--
ALTER TABLE `tai_khoans`
  ADD CONSTRAINT `tai_khoans_chuc_vu_id_foreign` FOREIGN KEY (`chuc_vu_id`) REFERENCES `chuc_vus` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
