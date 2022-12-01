-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 13 Jun 2021 pada 19.54
-- Versi server: 5.7.24
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oke-police`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `emergency_report`
--

CREATE TABLE `emergency_report` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `judul` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `emergency_report`
--

INSERT INTO `emergency_report` (`id`, `user_id`, `judul`, `foto`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 'bahaya', 'storage/emergencyReport/1610025488.PNG', 0, '2021-01-07 06:18:08', '2021-01-07 06:18:08'),
(2, 3, 'bahaya euy', 'storage/emergencyReport/1610025488.PNG', 0, '2021-01-07 06:18:08', '2021-01-07 06:18:08'),
(3, 2, 'Test Laporan', 'img/emergency-report/1618681522.PNG', NULL, '2021-04-17 10:45:22', '2021-04-17 10:45:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gmaps_geocache`
--

CREATE TABLE `gmaps_geocache` (
  `id` int(10) UNSIGNED NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2020_07_11_075501_create_gmaps_geocache_table', 1),
(12, '2021_01_07_085336_create_table_emergency_report', 3),
(16, '2021_01_07_094108_create_table_report', 4),
(17, '2021_01_07_093313_create_table_result', 5),
(111, '2021_01_12_105609_create_table_node', 6),
(112, '2021_02_02_013500_create_table_nodes', 7),
(113, '2021_06_13_170014_create_report_masyarakat_table', 7),
(115, '2021_06_13_192952_create_news_table', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'Test Judul', 'deskripsi', '9XuOETjLPNB7qrVJ.PNG', NULL, '2021-06-13 12:53:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `node`
--

CREATE TABLE `node` (
  `id` int(10) UNSIGNED NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `node`
--

INSERT INTO `node` (`id`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(2, '-6.9243102', '107.6062119', '2021-01-26 00:27:50', '2021-01-26 00:27:50'),
(3, '-6.9247164', '107.6061012', '2021-01-26 00:28:12', '2021-01-26 00:28:12'),
(4, '-6.9248684', '107.6062214', '2021-01-26 00:30:30', '2021-01-26 00:30:30'),
(5, '-6.9250708', '107.606186', '2021-01-26 00:58:50', '2021-01-26 00:58:50'),
(6, '-6.9253984', '107.6061613', '2021-01-26 01:04:39', '2021-01-26 01:04:39'),
(7, '-6.9257765', '107.6061161', '2021-01-26 01:05:01', '2021-01-26 01:05:01'),
(8, '-6.9261457', '107.6059411', '2021-01-26 01:05:26', '2021-01-26 01:05:26'),
(9, '-6.9262631', '107.605926', '2021-01-26 01:05:54', '2021-01-26 01:05:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('03bdea81d9e982217a5730107fe51ba18d0b6dcd8d82f576fc85e8afc032dbc65ce19cfe0db0cf52', 11, 1, 'nApp', '[]', 0, '2021-06-13 09:05:58', '2021-06-13 09:05:58', '2022-06-13 16:05:58'),
('20359f669bb8cb00d1b66b6ec3def92dc23d35e2deee12131439f43e1106686d09d6205ce3d62ddf', 7, 1, 'nApp', '[]', 0, '2021-01-07 01:40:20', '2021-01-07 01:40:20', '2022-01-07 08:40:20'),
('2da32771681130aade24fd51712b786437b3b7d9c0762ea493d19566dd0903c4a46db6162b6a9837', 11, 1, 'nApp', '[]', 0, '2021-01-11 03:49:28', '2021-01-11 03:49:28', '2022-01-11 10:49:28'),
('39ca49a90823d5623c3c6fae0f05d460c16cfc051fa8f556d1c3b20cb114786f0a6037b990bc53c0', 2, 1, 'nApp', '[]', 0, '2021-04-17 10:41:54', '2021-04-17 10:41:54', '2022-04-17 17:41:54'),
('3d763d67572e2ed4262d381a089e7dfd4c2da0bb10a121990440025f1a009862192cf88a7aa7e7b7', 2, 1, 'nApp', '[]', 0, '2021-03-12 22:15:42', '2021-03-12 22:15:42', '2022-03-13 05:15:42'),
('5659e57e6ad202985b2df85a500401f0dd7ed70c45f1428831d39bbedd579b5d706f15eed9e48db3', 8, 1, 'nApp', '[]', 0, '2021-01-07 06:07:05', '2021-01-07 06:07:05', '2022-01-07 13:07:05'),
('5e67478a76b46337bdbb367ad650040987ef71334163c77a38a7db5b9adb5559816d445901afe0b4', 8, 1, 'nApp', '[]', 0, '2021-01-08 00:23:56', '2021-01-08 00:23:56', '2022-01-08 07:23:56'),
('6b16605e2e8f73f15bcd746c10337be1f7e24f5ebfebcf646c42b45aaed05a35bdd59ccd98287fac', 5, 1, 'nApp', '[]', 0, '2021-01-07 01:38:08', '2021-01-07 01:38:08', '2022-01-07 08:38:08'),
('70064c03ae84bd0f991491b3ca2241b473b003df76b64440b7ea39d560597ebabe2ad0c28233897a', 4, 1, 'nApp', '[]', 0, '2021-01-07 01:36:30', '2021-01-07 01:36:30', '2022-01-07 08:36:30'),
('72bf035a88364f8ecb084f59ed4bc5b3000d1c8fae114362ee18d16144c15e9a6dc532153b8b25d6', 11, 1, 'nApp', '[]', 0, '2021-06-13 12:16:29', '2021-06-13 12:16:29', '2022-06-13 19:16:29'),
('8eaa8a8353f126bc7d75e5fb612803252c0babd66982f18e69c740c5719bbbfd0be30f47bf54fae4', 11, 1, 'nApp', '[]', 0, '2021-06-13 09:31:26', '2021-06-13 09:31:26', '2022-06-13 16:31:26'),
('90ed93ded76b8a34fee4a3d7723235920c68ddde55bb8b7f263603f4c177933e49aa0635d6c3ad7d', 3, 1, 'nApp', '[]', 0, '2021-01-11 06:48:31', '2021-01-11 06:48:31', '2022-01-11 13:48:31'),
('c55b22b9425603ed6b15b1788d68cf622fbf2e8db7c1e83135a7a5f418df73f692f63bf70cf65713', 6, 1, 'nApp', '[]', 0, '2021-01-07 01:39:24', '2021-01-07 01:39:24', '2022-01-07 08:39:24'),
('f81bbd2f5f89f2335c21ca1f55a300ffb0ec157aeb20c804820c69c50253ac129c2f0ee507854337', 1, 1, 'nApp', '[]', 0, '2021-01-12 04:19:48', '2021-01-12 04:19:48', '2022-01-12 11:19:48'),
('f88c76f887425dda652f41bcf0eb6365bd248d4c5712a152079eda772e18289b267da857ad4f7ff1', 3, 1, 'nApp', '[]', 0, '2021-01-07 01:35:04', '2021-01-07 01:35:04', '2022-01-07 08:35:04'),
('fbd3b8f9f34c41d670cbb29d1adf8fea1d62f308d43a2086db9855907d667df34fd705ab38f71de5', 11, 1, 'nApp', '[]', 0, '2021-06-13 09:32:00', '2021-06-13 09:32:00', '2022-06-13 16:32:00'),
('fec410211d2082765116e7e3c3e125323ebe5e6938e0b742a51f0afd8c818a243803b29f1fe7aa64', 8, 1, 'nApp', '[]', 0, '2021-01-11 06:17:15', '2021-01-11 06:17:15', '2022-01-11 13:17:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Oke-Police Personal Access Client', 'CsJseM1XPFmnkJoeDT0aITU97bBuBViGBR8XRnWS', 'http://localhost', 1, 0, 0, '2021-01-07 01:34:16', '2021-01-07 01:34:16'),
(2, NULL, 'Oke-Police Password Grant Client', 'U2WxRYQjIOJ3TRQWiPbbZ9FT35eLLGStjMfIsmeD', 'http://localhost', 0, 1, 0, '2021-01-07 01:34:16', '2021-01-07 01:34:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-01-07 01:34:16', '2021-01-07 01:34:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `report`
--

CREATE TABLE `report` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `report`
--

INSERT INTO `report` (`id`, `user_id`, `judul`, `isi`, `foto`, `created_at`, `updated_at`) VALUES
(1, 5, 'laporan hari ini', 'laporan aman,smua kondisi aman terkendalikan sekaliii', 'storage/Report/1610090665.PNG', '2021-01-08 00:24:25', '2021-01-08 00:24:25'),
(2, 4, 'laporan hari ini', 'laporan aman,smua kondisi aman terkendalikan sekaliii', 'storage/Report/1610268457.PNG', '2021-01-10 01:47:37', '2021-01-10 01:47:37'),
(7, 2, 'Test Laporan', 'Test Isi Laporan', 'img/report/1615649365.PNG', '2021-03-13 08:29:25', '2021-03-13 08:29:25'),
(8, 2, 'Test Laporan', 'Test Isi Laporan', 'img/report/1618681350.PNG', '2021-04-17 10:42:30', '2021-04-17 10:42:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `report_masyarakat`
--

CREATE TABLE `report_masyarakat` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `judul` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `report_masyarakat`
--

INSERT INTO `report_masyarakat` (`id`, `user_id`, `judul`, `foto`, `status`, `created_at`, `updated_at`) VALUES
(1, 11, 'Test Laporan', 'img/masyarakat-report/1623612294.PNG', NULL, '2021-06-13 12:24:54', '2021-06-13 12:24:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `result`
--

CREATE TABLE `result` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `emergency_report_id` bigint(20) DEFAULT NULL,
  `gn` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hn` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fn` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `table_nodes`
--

CREATE TABLE `table_nodes` (
  `id` int(10) UNSIGNED NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nrp` char(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pangkat` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` char(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` decimal(10,7) DEFAULT NULL,
  `long` decimal(10,7) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `is_masyarakat` tinyint(4) DEFAULT NULL,
  `is_personil` tinyint(4) DEFAULT NULL,
  `is_personil_active` tinyint(4) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nrp`, `nama`, `pangkat`, `jabatan`, `email`, `password`, `image`, `no_hp`, `lat`, `long`, `is_admin`, `is_masyarakat`, `is_personil`, `is_personil_active`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '11223344', 'Latif Baraba', 'IPDA', 'KA LANTAS', 'latifbaraba@gmail.com', '$2y$10$Kyh3mqQ2ExrnRz1ppGBebuh/Hy0MTDzOLCQI5ivEQatzFeDYKYl/u', 'photo.jpg', '089615266852', '-6.9253999', '107.6061611', 0, NULL, 1, 1, NULL, NULL, '2021-01-07 01:35:03', '2021-06-13 09:19:36'),
(2, '12345678', 'RIfqi Ardian', 'JENDRAL', 'KAPOLRES', 'rifqiardian@gmail.com', '$2y$10$giaOFihoakIDlPddIBGIdOIQq6NCCXGbw4UF3tU29idA4eaSS98ru', 'photo.jpg', '089615266823', '-6.9250054', '107.6059138', 0, NULL, 1, NULL, NULL, NULL, '2021-01-07 01:36:30', '2021-01-07 01:36:30'),
(3, '12345677', 'Rizki Fauzi', 'SERDA', 'PAM PENGAMANAN', 'rizkifauzi@gmail.com', '$2y$10$qR/DeQIuhItncYGC5Zw5ReBL7l6rqUwReJgnv.A46enyk89xByRKi', 'photo.jpg', '089615266821', '-6.9208140', '107.6069030', 0, NULL, 1, NULL, NULL, NULL, '2021-01-07 01:38:08', '2021-01-07 01:38:08'),
(4, '12345677', 'Arif BTI', 'IPTU', 'PAM PENGAMANAN', 'arifbti@gmail.com', '$2y$10$8xVIXLRQPJvz9iFAB6hsN.bLDCAT02bllDenPabxrbN14p/Ugq1Ge', 'photo.jpg', '089615266820', '-6.9243940', '107.6071260', 0, NULL, 1, NULL, NULL, NULL, '2021-01-07 01:39:24', '2021-01-07 01:39:24'),
(5, '12345677', 'Sani Sanjaya', 'AKP', 'PAM PENGAMANAN', 'sanisanjaya@gmail.com', '$2y$10$bShdH5cDnz1P.MGML5Ryz.9SDcncoSc8kLwOJ5MEBcU/Q16zQ2fTe', '39WP2HWTFVTbiMmo.PNG', '089615266820', '-6.9255860', '107.6056350', 0, 1, NULL, NULL, NULL, NULL, '2021-01-07 01:40:20', '2021-04-18 06:07:24'),
(6, '119804032', 'Heri Hermawan', NULL, NULL, 'herhermawan007@gmail.com', '$2y$10$/kvUMl050EQumWyco8xxF.QEHx.oEoyZdLU4H7gFlRaZb7XfhG0Q.', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 'bcKLKxfnbdkWvISKfm8MTYfFK0sJH9anbzWQc4Wl2RdGAmZRdWhLm7mH8aTx', '2021-03-29 03:25:11', '2021-03-29 03:25:11'),
(11, '1187050041', 'Heri Hermawan', 'Komandan', 'Pasukan Khusus', 'herhermawan00077@gmail.com', '$2y$10$BwrAqT3HMhoJAn/kmW8eeeXN4hbRLW2WgLTwLpcUFidWtAGsX6x/2', 'photo.jpg', '089615266856', '-7.6651900', '111.3162900', NULL, 1, NULL, NULL, NULL, NULL, '2021-06-13 09:05:57', '2021-06-13 09:05:57');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `emergency_report`
--
ALTER TABLE `emergency_report`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gmaps_geocache`
--
ALTER TABLE `gmaps_geocache`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `node`
--
ALTER TABLE `node`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indeks untuk tabel `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `report_masyarakat`
--
ALTER TABLE `report_masyarakat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `table_nodes`
--
ALTER TABLE `table_nodes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `emergency_report`
--
ALTER TABLE `emergency_report`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `gmaps_geocache`
--
ALTER TABLE `gmaps_geocache`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT untuk tabel `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `node`
--
ALTER TABLE `node`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `report`
--
ALTER TABLE `report`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `report_masyarakat`
--
ALTER TABLE `report_masyarakat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `result`
--
ALTER TABLE `result`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `table_nodes`
--
ALTER TABLE `table_nodes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
