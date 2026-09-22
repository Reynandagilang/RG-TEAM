-- 1. Buat database jika belum ada
CREATE DATABASE IF NOT EXISTS f1_team;
USE f1_team;

-- 2. Struktur tabel untuk 'cars' (Mobil Balap)
CREATE TABLE IF NOT EXISTS `cars` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `model_name` varchar(255) NOT NULL,
  `engine_supplier` varchar(255) NOT NULL,
  `chassis` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 3. Struktur tabel untuk 'drivers' (Pembalap)
CREATE TABLE IF NOT EXISTS `drivers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `podiums` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 4. Data Uji Coba (Dummy Data) untuk Mobil
INSERT INTO `cars` (`id`, `model_name`, `engine_supplier`, `chassis`, `created_at`, `updated_at`) VALUES
(1, 'AG-26X', 'Antigravity V6 Turbo Hybrid', 'Carbon-Titanium Monocoque', NOW(), NOW());

-- 5. Data Uji Coba (Dummy Data) untuk Pembalap
INSERT INTO `drivers` (`id`, `name`, `number`, `country`, `podiums`, `created_at`, `updated_at`) VALUES
(1, 'Alexandre Silva', 44, 'Brazil', 12, NOW(), NOW()),
(2, 'Kaito Tanaka', 19, 'Japan', 5, NOW(), NOW());