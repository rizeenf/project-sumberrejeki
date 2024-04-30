-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Des 2023 pada 02.05
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smclub`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_cust_visits`
--

CREATE TABLE `dt_cust_visits` (
  `visit_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `display_id` int(11) NOT NULL,
  `stok` text DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_md_visits`
--

CREATE TABLE `dt_md_visits` (
  `visit_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `display_id` bigint(20) UNSIGNED NOT NULL,
  `photo` blob DEFAULT NULL,
  `stok` text DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dt_md_visits`
--

INSERT INTO `dt_md_visits` (`visit_id`, `category_id`, `display_id`, `photo`, `stok`, `reason`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 1, 0x646973706c61795f637573746f6d65722d434152494e47494e20504c415354494b20312d31332044656320323032332e6a7067, NULL, NULL, '2023-12-13 09:21:08', '2023-12-13 09:21:08', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_outlet_visits`
--

CREATE TABLE `dt_outlet_visits` (
  `visit_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price_buy` double DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `activity` text NOT NULL,
  `url` text NOT NULL,
  `method` varchar(10) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `agent` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `logs`
--

INSERT INTO `logs` (`id`, `activity`, `url`, `method`, `ip_address`, `agent`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Listing Branch', 'http://localhost:8000/branch', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 03:26:24', '2023-12-11 03:26:24'),
(2, 'Creating Branch BOGOR', 'http://localhost:8000/branch', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 03:26:44', '2023-12-11 03:26:44'),
(3, 'Listing Jabatan', 'http://localhost:8000/jabatan', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 03:26:48', '2023-12-11 03:26:48'),
(4, 'Listing Category Products', 'http://localhost:8000/category', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 03:26:52', '2023-12-11 03:26:52'),
(5, 'Listing Brand Products', 'http://localhost:8000/brand', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 03:26:57', '2023-12-11 03:26:57'),
(6, 'Creating Brand Products GRETEL', 'http://localhost:8000/brand', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 03:27:10', '2023-12-11 03:27:10'),
(7, 'Listing Sub Brand Products', 'http://localhost:8000/subbrand', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 03:27:16', '2023-12-11 03:27:16'),
(8, 'Creating Sub Brand Products GRETEL LUX', 'http://localhost:8000/subbrand', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 03:27:26', '2023-12-11 03:27:26'),
(9, 'Listing Product', 'http://localhost:8000/products', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 03:27:31', '2023-12-11 03:27:31'),
(10, 'Creating Product DUS GRETEL LUX 18X18 A', 'http://localhost:8000/products', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 03:30:35', '2023-12-11 03:30:35'),
(11, 'Listing Product', 'http://localhost:8000/products', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 03:30:35', '2023-12-11 03:30:35'),
(12, 'Listing Display Product', 'http://localhost:8000/displays', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 03:30:53', '2023-12-11 03:30:53'),
(13, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 03:31:04', '2023-12-11 03:31:04'),
(14, 'Importing Create Master Customer', 'http://localhost:8000/customer.import', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 03:39:11', '2023-12-11 03:39:11'),
(15, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 03:40:20', '2023-12-11 03:40:20'),
(16, 'Importing Create Master Customer', 'http://localhost:8000/customer.import', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 03:40:32', '2023-12-11 03:40:32'),
(17, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 03:41:53', '2023-12-11 03:41:53'),
(18, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 03:42:40', '2023-12-11 03:42:40'),
(19, 'Importing Create Master Customer', 'http://localhost:8000/customer.import', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 03:42:52', '2023-12-11 03:42:52'),
(20, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 03:43:45', '2023-12-11 03:43:45'),
(21, 'Importing Create Master Customer', 'http://localhost:8000/customer.import', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 03:44:32', '2023-12-11 03:44:32'),
(22, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 03:44:33', '2023-12-11 03:44:33'),
(23, 'Exporting Master Customer', 'http://localhost:8000/customer.export', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 03:45:10', '2023-12-11 03:45:10'),
(24, 'Exporting Master Customer', 'http://localhost:8000/customer.export', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 03:45:44', '2023-12-11 03:45:44'),
(25, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 03:46:16', '2023-12-11 03:46:16'),
(26, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 03:54:16', '2023-12-11 03:54:16'),
(27, 'Importing Update Master Customer', 'http://localhost:8000/customer.import', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 03:56:38', '2023-12-11 03:56:38'),
(28, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 03:56:39', '2023-12-11 03:56:39'),
(29, 'Creating Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 04:09:58', '2023-12-11 04:09:58'),
(30, 'Creating Owner ATEP', 'http://localhost:8000/customer', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 04:09:58', '2023-12-11 04:09:58'),
(31, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 04:09:58', '2023-12-11 04:09:58'),
(32, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 04:10:51', '2023-12-11 04:10:51'),
(33, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 04:16:29', '2023-12-11 04:16:29'),
(34, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 04:18:50', '2023-12-11 04:18:50'),
(35, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 04:19:42', '2023-12-11 04:19:42'),
(36, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 04:21:15', '2023-12-11 04:21:15'),
(37, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 04:22:07', '2023-12-11 04:22:07'),
(38, 'Showing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 04:26:09', '2023-12-11 04:26:09'),
(39, 'Listing Display Product', 'http://localhost:8000/displays', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 04:26:22', '2023-12-11 04:26:22'),
(40, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 04:26:25', '2023-12-11 04:26:25'),
(41, 'Showing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 04:30:51', '2023-12-11 04:30:51'),
(42, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 04:31:47', '2023-12-11 04:31:47'),
(43, 'Showing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 04:31:55', '2023-12-11 04:31:55'),
(44, 'Showing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 04:32:56', '2023-12-11 04:32:56'),
(45, 'Showing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 04:33:32', '2023-12-11 04:33:32'),
(46, 'Listing Log Activity', 'http://localhost:8000/log', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 04:34:00', '2023-12-11 04:34:00'),
(47, 'Listing Product', 'http://localhost:8000/products', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 04:37:00', '2023-12-11 04:37:00'),
(48, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 04:37:04', '2023-12-11 04:37:04'),
(49, 'Showing Data Customer CARINGIN PLASTIK', 'http://localhost:8000/customer/53', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 04:37:12', '2023-12-11 04:37:12'),
(50, 'Showing Data Customer CARINGIN PLASTIK', 'http://localhost:8000/customer/53', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 04:41:17', '2023-12-11 04:41:17'),
(51, 'Showing Data Customer CARINGIN PLASTIK', 'http://localhost:8000/customer/53', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 04:42:55', '2023-12-11 04:42:55'),
(52, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 04:43:58', '2023-12-11 04:43:58'),
(53, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 04:45:26', '2023-12-11 04:45:26'),
(54, 'Showing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 04:45:29', '2023-12-11 04:45:29'),
(55, 'Showing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 04:45:59', '2023-12-11 04:45:59'),
(56, 'Showing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 04:46:46', '2023-12-11 04:46:46'),
(57, 'Showing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 04:47:42', '2023-12-11 04:47:42'),
(58, 'Showing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 04:49:33', '2023-12-11 04:49:33'),
(59, 'Showing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 04:49:47', '2023-12-11 04:49:47'),
(60, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 04:50:53', '2023-12-11 04:50:53'),
(61, 'Showing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 06:14:32', '2023-12-11 06:14:32'),
(62, 'Showing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 06:15:28', '2023-12-11 06:15:28'),
(63, 'Showing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 06:17:33', '2023-12-11 06:17:33'),
(64, 'Showing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 06:19:25', '2023-12-11 06:19:25'),
(65, 'Showing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 06:19:48', '2023-12-11 06:19:48'),
(66, 'Showing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 06:19:56', '2023-12-11 06:19:56'),
(67, 'Showing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 06:20:28', '2023-12-11 06:20:28'),
(68, 'Showing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 06:20:53', '2023-12-11 06:20:53'),
(69, 'Showing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 06:21:21', '2023-12-11 06:21:21'),
(70, 'Showing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 06:21:26', '2023-12-11 06:21:26'),
(71, 'Showing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 06:21:32', '2023-12-11 06:21:32'),
(72, 'Showing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 06:21:51', '2023-12-11 06:21:51'),
(73, 'Showing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 06:23:02', '2023-12-11 06:23:02'),
(74, 'Showing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 06:24:01', '2023-12-11 06:24:01'),
(75, 'Showing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 06:24:51', '2023-12-11 06:24:51'),
(76, 'Showing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 06:25:08', '2023-12-11 06:25:08'),
(77, 'Showing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 06:26:56', '2023-12-11 06:26:56'),
(78, 'Showing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 06:27:07', '2023-12-11 06:27:07'),
(79, 'Showing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 06:27:21', '2023-12-11 06:27:21'),
(80, 'Showing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 06:28:34', '2023-12-11 06:28:34'),
(81, 'Showing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 06:31:22', '2023-12-11 06:31:22'),
(82, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 06:32:49', '2023-12-11 06:32:49'),
(83, 'Editing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 06:38:35', '2023-12-11 06:38:35'),
(84, 'Editing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 06:38:50', '2023-12-11 06:38:50'),
(85, 'Editing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 06:39:18', '2023-12-11 06:39:18'),
(86, 'Editing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 06:39:53', '2023-12-11 06:39:53'),
(87, 'Editing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 06:52:14', '2023-12-11 06:52:14'),
(88, 'Editing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 06:52:52', '2023-12-11 06:52:52'),
(89, 'Editing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 06:57:22', '2023-12-11 06:57:22'),
(90, 'Editing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 06:57:40', '2023-12-11 06:57:40'),
(91, 'Editing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 07:00:46', '2023-12-11 07:00:46'),
(92, 'Editing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 07:01:32', '2023-12-11 07:01:32'),
(93, 'Editing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 07:02:06', '2023-12-11 07:02:06'),
(94, 'Editing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 07:02:32', '2023-12-11 07:02:32'),
(95, 'Editing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 07:03:17', '2023-12-11 07:03:17'),
(96, 'Editing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 07:04:04', '2023-12-11 07:04:04'),
(97, 'Editing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 07:04:43', '2023-12-11 07:04:43'),
(98, 'Editing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 07:04:51', '2023-12-11 07:04:51'),
(99, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 07:22:06', '2023-12-11 07:22:06'),
(100, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 07:32:55', '2023-12-11 07:32:55'),
(101, 'Editing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 07:34:24', '2023-12-11 07:34:24'),
(102, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 07:37:00', '2023-12-11 07:37:00'),
(103, 'Editing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 07:37:04', '2023-12-11 07:37:04'),
(104, 'Editing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 07:37:21', '2023-12-11 07:37:21'),
(105, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 07:37:29', '2023-12-11 07:37:29'),
(106, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 07:38:37', '2023-12-11 07:38:37'),
(107, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 07:42:13', '2023-12-11 07:42:13'),
(108, 'Editing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 07:42:20', '2023-12-11 07:42:20'),
(109, 'Editing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 07:42:33', '2023-12-11 07:42:33'),
(110, 'Editing Data Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 07:42:59', '2023-12-11 07:42:59'),
(111, 'Updating Customer BERKAH PLASTIK TENGAH', 'http://localhost:8000/customer/107', 'PUT', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 07:44:05', '2023-12-11 07:44:05'),
(112, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 07:44:06', '2023-12-11 07:44:06'),
(113, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 07:46:36', '2023-12-11 07:46:36'),
(114, 'Editing Data Customer BERKAH PLASTIK TENGAH', 'http://localhost:8000/customer/107/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 07:46:39', '2023-12-11 07:46:39'),
(115, 'Updating Customer BERKAH PLASTIK PINGGIR', 'http://localhost:8000/customer/107', 'PUT', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 07:46:54', '2023-12-11 07:46:54'),
(116, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 07:46:54', '2023-12-11 07:46:54'),
(117, 'Listing Visited', 'http://localhost:8000/call', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 07:47:35', '2023-12-11 07:47:35'),
(118, 'Listing Visited', 'http://localhost:8000/call', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 07:47:40', '2023-12-11 07:47:40'),
(119, 'Listing Product', 'http://localhost:8000/products', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 07:47:44', '2023-12-11 07:47:44'),
(120, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 07:47:49', '2023-12-11 07:47:49'),
(121, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 07:48:04', '2023-12-11 07:48:04'),
(122, 'Listing Staff', 'http://localhost:8000/staff', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 09:09:52', '2023-12-11 09:09:52'),
(123, 'Listing Customer', 'http://localhost:8000/outlet', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-11 09:10:50', '2023-12-11 09:10:50'),
(124, 'Listing Display Product', 'http://localhost:8000/displays', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 06:32:27', '2023-12-12 06:32:27'),
(125, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 06:32:34', '2023-12-12 06:32:34'),
(126, 'Showing Data Customer CARINGIN PLASTIK', 'http://localhost:8000/customer/53', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 06:32:45', '2023-12-12 06:32:45'),
(127, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 07:27:28', '2023-12-12 07:27:28'),
(128, 'Listing Product', 'http://localhost:8000/products', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 07:30:53', '2023-12-12 07:30:53'),
(129, 'Listing Product', 'http://localhost:8000/products', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 07:34:23', '2023-12-12 07:34:23'),
(130, 'Showing Data Product DUS GRETEL LUX 18X18 A', 'http://localhost:8000/products/1', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 07:41:40', '2023-12-12 07:41:40'),
(131, 'Showing Data Product DUS GRETEL LUX 18X18 A', 'http://localhost:8000/products/1', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 07:42:04', '2023-12-12 07:42:04'),
(132, 'Showing Data Product DUS GRETEL LUX 18X18 A', 'http://localhost:8000/products/1', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 07:42:30', '2023-12-12 07:42:30'),
(133, 'Showing Data Product DUS GRETEL LUX 18X18 A', 'http://localhost:8000/products/1', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 07:42:49', '2023-12-12 07:42:49'),
(134, 'Showing Data Product DUS GRETEL LUX 18X18 A', 'http://localhost:8000/products/1', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 07:43:07', '2023-12-12 07:43:07'),
(135, 'Showing Data Product DUS GRETEL LUX 18X18 A', 'http://localhost:8000/products/1', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 07:45:22', '2023-12-12 07:45:22'),
(136, 'Showing Data Product DUS GRETEL LUX 18X18 A', 'http://localhost:8000/products/1', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 07:45:32', '2023-12-12 07:45:32'),
(137, 'Showing Data Product DUS GRETEL LUX 18X18 A', 'http://localhost:8000/products/1', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 07:46:13', '2023-12-12 07:46:13'),
(138, 'Showing Data Product DUS GRETEL LUX 18X18 A', 'http://localhost:8000/products/1', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 07:46:25', '2023-12-12 07:46:25'),
(139, 'Showing Data Product DUS GRETEL LUX 18X18 A', 'http://localhost:8000/products/1', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 07:47:02', '2023-12-12 07:47:02'),
(140, 'Showing Data Product DUS GRETEL LUX 18X18 A', 'http://localhost:8000/products/1', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 07:51:34', '2023-12-12 07:51:34'),
(141, 'Showing Data Product DUS GRETEL LUX 18X18 A', 'http://localhost:8000/products/1', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 07:52:03', '2023-12-12 07:52:03'),
(142, 'Showing Data Product DUS GRETEL LUX 18X18 A', 'http://localhost:8000/products/1', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 07:52:23', '2023-12-12 07:52:23'),
(143, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 07:52:53', '2023-12-12 07:52:53'),
(144, 'Listing Product', 'http://localhost:8000/products', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 07:52:58', '2023-12-12 07:52:58'),
(145, 'Listing Product', 'http://localhost:8000/products', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 07:53:07', '2023-12-12 07:53:07'),
(146, 'Showing Data Product DUS GRETEL LUX 18X18 A', 'http://localhost:8000/products/1', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 07:53:22', '2023-12-12 07:53:22'),
(147, 'Showing Data Product DUS GRETEL LUX 18X18 A', 'http://localhost:8000/products/1', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 07:53:27', '2023-12-12 07:53:27'),
(148, 'Listing Product', 'http://localhost:8000/products', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 07:53:29', '2023-12-12 07:53:29'),
(149, 'Showing Data Product DUS GRETEL LUX 18X18 A', 'http://localhost:8000/products/1', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 07:53:46', '2023-12-12 07:53:46'),
(150, 'Showing Data Product DUS GRETEL LUX 18X18 A', 'http://localhost:8000/products/1', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 07:54:44', '2023-12-12 07:54:44'),
(151, 'Showing Data Product DUS GRETEL LUX 18X18 A', 'http://localhost:8000/products/1', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 07:55:53', '2023-12-12 07:55:53'),
(152, 'Showing Data Product DUS GRETEL LUX 18X18 A', 'http://localhost:8000/products/1', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 07:56:22', '2023-12-12 07:56:22'),
(153, 'Showing Data Product DUS GRETEL LUX 18X18 A', 'http://localhost:8000/products/1', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 07:57:23', '2023-12-12 07:57:23'),
(154, 'Showing Data Product DUS GRETEL LUX 18X18 A', 'http://localhost:8000/products/1', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 07:57:35', '2023-12-12 07:57:35'),
(155, 'Showing Data Product DUS GRETEL LUX 18X18 A', 'http://localhost:8000/products/1', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 07:57:56', '2023-12-12 07:57:56'),
(156, 'Listing Product', 'http://localhost:8000/products', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 07:58:04', '2023-12-12 07:58:04'),
(157, 'Showing Data Product DUS GRETEL LUX 18X18 A', 'http://localhost:8000/products/1', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 07:58:46', '2023-12-12 07:58:46'),
(158, 'Showing Data Product DUS GRETEL LUX 18X18 A', 'http://localhost:8000/products/1', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 07:59:16', '2023-12-12 07:59:16'),
(159, 'Showing Data Product DUS GRETEL LUX 18X18 A', 'http://localhost:8000/products/1', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 07:59:25', '2023-12-12 07:59:25'),
(160, 'Showing Data Product DUS GRETEL LUX 18X18 A', 'http://localhost:8000/products/1', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 07:59:38', '2023-12-12 07:59:38'),
(161, 'Listing Product', 'http://localhost:8000/products', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 07:59:45', '2023-12-12 07:59:45'),
(162, 'Showing Data Product DUS GRETEL LUX 18X18 A', 'http://localhost:8000/products/1', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 08:12:34', '2023-12-12 08:12:34'),
(163, 'Editing Data Product DUS GRETEL LUX 18X18 A', 'http://localhost:8000/products/1/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 08:12:57', '2023-12-12 08:12:57'),
(164, 'Editing Data Product DUS GRETEL LUX 18X18 A', 'http://localhost:8000/products/1/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 08:13:12', '2023-12-12 08:13:12'),
(165, 'Editing Data Product DUS GRETEL LUX 18X18 A', 'http://localhost:8000/products/1/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 08:13:17', '2023-12-12 08:13:17'),
(166, 'Editing Data Product DUS GRETEL LUX 18X18 A', 'http://localhost:8000/products/1/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 08:14:01', '2023-12-12 08:14:01'),
(167, 'Editing Data Product DUS GRETEL LUX 18X18 A', 'http://localhost:8000/products/1/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 08:14:19', '2023-12-12 08:14:19'),
(168, 'Editing Data Product DUS GRETEL LUX 18X18 A', 'http://localhost:8000/products/1/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 08:14:29', '2023-12-12 08:14:29'),
(169, 'Editing Data Product DUS GRETEL LUX 18X18 A', 'http://localhost:8000/products/1/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 08:16:58', '2023-12-12 08:16:58'),
(170, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 08:22:59', '2023-12-12 08:22:59'),
(171, 'Listing Product', 'http://localhost:8000/products', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 08:23:36', '2023-12-12 08:23:36'),
(172, 'Showing Data Product DUS GRETEL LUX 18X18 A', 'http://localhost:8000/products/1', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 08:23:59', '2023-12-12 08:23:59'),
(173, 'Listing Product', 'http://localhost:8000/products', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 08:24:02', '2023-12-12 08:24:02'),
(174, 'Creating Product AJB XXX', 'http://localhost:8000/products', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 08:24:45', '2023-12-12 08:24:45'),
(175, 'Listing Product', 'http://localhost:8000/products', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 08:24:46', '2023-12-12 08:24:46'),
(176, 'Showing Data Product DUS GRETEL LUX 18X18 A', 'http://localhost:8000/products/2', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 08:24:55', '2023-12-12 08:24:55'),
(177, 'Listing Product', 'http://localhost:8000/products', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 08:25:01', '2023-12-12 08:25:01'),
(178, 'Showing Data Product DUS GRETEL LUX 18X18 A', 'http://localhost:8000/products/2', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 08:25:06', '2023-12-12 08:25:06'),
(179, 'Listing Product', 'http://localhost:8000/products', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 08:25:10', '2023-12-12 08:25:10'),
(180, 'Showing Data Product DUS GRETEL LUX 18X18 A', 'http://localhost:8000/products/2', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 08:26:12', '2023-12-12 08:26:12'),
(181, 'Listing Product', 'http://localhost:8000/products', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 08:29:50', '2023-12-12 08:29:50'),
(182, 'Showing Data Product AJB XXX', 'http://localhost:8000/products/2', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 08:30:37', '2023-12-12 08:30:37'),
(183, 'Listing Product', 'http://localhost:8000/products', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 08:30:55', '2023-12-12 08:30:55'),
(184, 'Listing Product', 'http://localhost:8000/products', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 08:31:32', '2023-12-12 08:31:32'),
(185, 'Showing Data Product AJB XXX', 'http://localhost:8000/products/2', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 08:32:24', '2023-12-12 08:32:24'),
(186, 'Listing Product', 'http://localhost:8000/products', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 08:34:14', '2023-12-12 08:34:14'),
(187, 'Showing Data Product AJB XXX', 'http://localhost:8000/products/2', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 08:35:32', '2023-12-12 08:35:32'),
(188, 'Listing Product', 'http://localhost:8000/products', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 08:36:31', '2023-12-12 08:36:31'),
(189, 'Showing Data Product AJB XXX', 'http://localhost:8000/products/2', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 08:36:36', '2023-12-12 08:36:36'),
(190, 'Editing Data Product AJB XXX', 'http://localhost:8000/products/2/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 08:36:40', '2023-12-12 08:36:40'),
(191, 'Listing Product', 'http://localhost:8000/products', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 08:36:52', '2023-12-12 08:36:52');
INSERT INTO `logs` (`id`, `activity`, `url`, `method`, `ip_address`, `agent`, `user_id`, `created_at`, `updated_at`) VALUES
(192, 'Showing Data Product AJB XXX', 'http://localhost:8000/products/2', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 08:59:35', '2023-12-12 08:59:35'),
(193, 'Editing Data Product AJB XXX', 'http://localhost:8000/products/2/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 08:59:39', '2023-12-12 08:59:39'),
(194, 'Listing Product', 'http://localhost:8000/products', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:00:19', '2023-12-12 09:00:19'),
(195, 'Editing Data Product AJB XXX', 'http://localhost:8000/products/2/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:00:24', '2023-12-12 09:00:24'),
(196, 'Listing Product', 'http://localhost:8000/products', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:01:39', '2023-12-12 09:01:39'),
(197, 'Showing Data Product AJB XXX', 'http://localhost:8000/products/2', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:01:53', '2023-12-12 09:01:53'),
(198, 'Editing Data Product AJB XXX', 'http://localhost:8000/products/2/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:01:58', '2023-12-12 09:01:58'),
(199, 'Listing Product', 'http://localhost:8000/products', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:03:50', '2023-12-12 09:03:50'),
(200, 'Editing Data Product AJB XXX', 'http://localhost:8000/products/2/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:03:55', '2023-12-12 09:03:55'),
(201, 'Listing Product', 'http://localhost:8000/products', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:04:06', '2023-12-12 09:04:06'),
(202, 'Editing Data Product AJB XXX', 'http://localhost:8000/products/2/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:04:37', '2023-12-12 09:04:37'),
(203, 'Listing Product', 'http://localhost:8000/products', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:06:55', '2023-12-12 09:06:55'),
(204, 'Editing Data Product AJB XXX', 'http://localhost:8000/products/2/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:07:00', '2023-12-12 09:07:00'),
(205, 'Listing Product', 'http://localhost:8000/products', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:08:28', '2023-12-12 09:08:28'),
(206, 'Editing Data Product AJB XXX', 'http://localhost:8000/products/2/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:08:44', '2023-12-12 09:08:44'),
(207, 'Listing Product', 'http://localhost:8000/products', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:09:04', '2023-12-12 09:09:04'),
(208, 'Editing Data Product AJB XXX', 'http://localhost:8000/products/2/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:09:10', '2023-12-12 09:09:10'),
(209, 'Editing Data Product AJB XXX', 'http://localhost:8000/products/2/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:09:31', '2023-12-12 09:09:31'),
(210, 'Editing Data Product AJB XXX', 'http://localhost:8000/products/2/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:09:44', '2023-12-12 09:09:44'),
(211, 'Listing Product', 'http://localhost:8000/products', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:10:32', '2023-12-12 09:10:32'),
(212, 'Editing Data Product AJB XXX', 'http://localhost:8000/products/2/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:12:26', '2023-12-12 09:12:26'),
(213, 'Editing Data Product AJB XXX', 'http://localhost:8000/products/2/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:14:24', '2023-12-12 09:14:24'),
(214, 'Listing Product', 'http://localhost:8000/products', 'GET', '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Mobile Safari/537.36', 1, '2023-12-12 09:14:42', '2023-12-12 09:14:42'),
(215, 'Editing Data Product AJB XXX', 'http://localhost:8000/products/2/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Mobile Safari/537.36', 1, '2023-12-12 09:14:55', '2023-12-12 09:14:55'),
(216, 'Listing Product', 'http://localhost:8000/product', 'GET', '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Mobile Safari/537.36', 1, '2023-12-12 09:16:22', '2023-12-12 09:16:22'),
(217, 'Listing Product', 'http://localhost:8000/product', 'GET', '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Mobile Safari/537.36', 1, '2023-12-12 09:17:05', '2023-12-12 09:17:05'),
(218, 'Listing Product', 'http://localhost:8000/product', 'GET', '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Mobile Safari/537.36', 1, '2023-12-12 09:17:29', '2023-12-12 09:17:29'),
(219, 'Listing Product', 'http://localhost:8000/product', 'GET', '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Mobile Safari/537.36', 1, '2023-12-12 09:17:52', '2023-12-12 09:17:52'),
(220, 'Listing Product', 'http://localhost:8000/product', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:18:00', '2023-12-12 09:18:00'),
(221, 'Listing Product', 'http://localhost:8000/product', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:18:35', '2023-12-12 09:18:35'),
(222, 'Editing Data Product AJB XXX', 'http://localhost:8000/product/2/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:18:40', '2023-12-12 09:18:40'),
(223, 'Showing Data Product AJB XXX', 'http://localhost:8000/product/2', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:18:44', '2023-12-12 09:18:44'),
(224, 'Showing Data Product AJB XXX', 'http://localhost:8000/product/2', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:19:23', '2023-12-12 09:19:23'),
(225, 'Listing Product', 'http://localhost:8000/product', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:19:26', '2023-12-12 09:19:26'),
(226, 'Editing Data Product AJB XXX', 'http://localhost:8000/product/2/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:19:30', '2023-12-12 09:19:30'),
(227, 'Editing Data Product AJB XXX', 'http://localhost:8000/product/2/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:19:54', '2023-12-12 09:19:54'),
(228, 'Listing Product', 'http://localhost:8000/product', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:20:25', '2023-12-12 09:20:25'),
(229, 'Listing Product', 'http://localhost:8000/product', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:20:34', '2023-12-12 09:20:34'),
(230, 'Editing Data Product AJB XXX', 'http://localhost:8000/product/2/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:20:38', '2023-12-12 09:20:38'),
(231, 'Editing Data Product AJB XXX', 'http://localhost:8000/product/2/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:20:56', '2023-12-12 09:20:56'),
(232, 'Editing Data Product AJB XXX', 'http://localhost:8000/product/2/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:21:18', '2023-12-12 09:21:18'),
(233, 'Listing Product', 'http://localhost:8000/product', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:23:41', '2023-12-12 09:23:41'),
(234, 'Listing Product', 'http://localhost:8000/product', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:25:16', '2023-12-12 09:25:16'),
(235, 'Editing Data Product AJB XXX', 'http://localhost:8000/product/2/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:25:17', '2023-12-12 09:25:17'),
(236, 'Showing Data Product AJB XXX', 'http://localhost:8000/product/2', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:25:21', '2023-12-12 09:25:21'),
(237, 'Editing Data Product AJB XXX', 'http://localhost:8000/product/2/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:25:29', '2023-12-12 09:25:29'),
(238, 'Listing Product', 'http://localhost:8000/product', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:26:18', '2023-12-12 09:26:18'),
(239, 'Editing Data Product AJB XXX', 'http://localhost:8000/product/2/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:26:26', '2023-12-12 09:26:26'),
(240, 'Listing Product', 'http://localhost:8000/product', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:26:50', '2023-12-12 09:26:50'),
(241, 'Editing Data Product AJB XXX', 'http://localhost:8000/product/2/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:26:53', '2023-12-12 09:26:53'),
(242, 'Editing Data Product AJB XXX', 'http://localhost:8000/product/2/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:27:06', '2023-12-12 09:27:06'),
(243, 'Editing Data Product AJB XXX', 'http://localhost:8000/product/2/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:27:12', '2023-12-12 09:27:12'),
(244, 'Listing Product', 'http://localhost:8000/product', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:27:21', '2023-12-12 09:27:21'),
(245, 'Editing Data Product AJB XXX', 'http://localhost:8000/product/2/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:28:02', '2023-12-12 09:28:02'),
(246, 'Listing Product', 'http://localhost:8000/product', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:28:11', '2023-12-12 09:28:11'),
(247, 'Editing Data Product AJB XXX', 'http://localhost:8000/product/2/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:28:17', '2023-12-12 09:28:17'),
(248, 'Listing Product', 'http://localhost:8000/product', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:28:29', '2023-12-12 09:28:29'),
(249, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:29:52', '2023-12-12 09:29:52'),
(250, 'Editing Data Customer CARINGIN PLASTIK', 'http://localhost:8000/customer/53/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:29:56', '2023-12-12 09:29:56'),
(251, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:30:00', '2023-12-12 09:30:00'),
(252, 'Editing Data Customer CARINGIN PLASTIK', 'http://localhost:8000/customer/53/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:30:11', '2023-12-12 09:30:11'),
(253, 'Updating Customer CARINGIN PLASTIK', 'http://localhost:8000/customer/53', 'PUT', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:30:19', '2023-12-12 09:30:19'),
(254, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:30:20', '2023-12-12 09:30:20'),
(255, 'Listing Product', 'http://localhost:8000/product', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:30:35', '2023-12-12 09:30:35'),
(256, 'Editing Data Product AJB XXX', 'http://localhost:8000/product/2/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:30:39', '2023-12-12 09:30:39'),
(257, 'Listing Product', 'http://localhost:8000/product', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:31:59', '2023-12-12 09:31:59'),
(258, 'Editing Data Product AJB XXX', 'http://localhost:8000/product/2/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:32:03', '2023-12-12 09:32:03'),
(259, 'Listing Product', 'http://localhost:8000/product', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:32:21', '2023-12-12 09:32:21'),
(260, 'Editing Data Product AJB XXX', 'http://localhost:8000/product/2/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:32:59', '2023-12-12 09:32:59'),
(261, 'Editing Data Product AJB XXX', 'http://localhost:8000/product/2/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:33:04', '2023-12-12 09:33:04'),
(262, 'Updating Products AJB XXX', 'http://localhost:8000/product/2', 'PUT', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:33:13', '2023-12-12 09:33:13'),
(263, 'Updating Products AJB XXX', 'http://localhost:8000/product/2', 'PUT', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:33:23', '2023-12-12 09:33:23'),
(264, 'Listing Product', 'http://localhost:8000/product', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:33:23', '2023-12-12 09:33:23'),
(265, 'Showing Data Product AJB XXX', 'http://localhost:8000/product/2', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:33:27', '2023-12-12 09:33:27'),
(266, 'Listing Product', 'http://localhost:8000/product', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-12 09:33:30', '2023-12-12 09:33:30'),
(267, 'Listing Product', 'http://localhost:8000/product', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 06:10:30', '2023-12-13 06:10:30'),
(268, 'Listing Product', 'http://localhost:8000/product', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 06:28:03', '2023-12-13 06:28:03'),
(269, 'Listing Product', 'http://localhost:8000/product', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 06:28:04', '2023-12-13 06:28:04'),
(270, 'Exporting Master Product', 'http://localhost:8000/product.export', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 06:28:10', '2023-12-13 06:28:10'),
(271, 'Exporting Master Product', 'http://localhost:8000/product.export', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 06:29:06', '2023-12-13 06:29:06'),
(272, 'Exporting Master Product', 'http://localhost:8000/product.export', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 06:30:01', '2023-12-13 06:30:01'),
(273, 'Exporting Master Product', 'http://localhost:8000/product.export', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 06:36:24', '2023-12-13 06:36:24'),
(274, 'Exporting Master Product', 'http://localhost:8000/product.export', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 06:39:30', '2023-12-13 06:39:30'),
(275, 'Exporting Master Product', 'http://localhost:8000/product.export', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 07:16:53', '2023-12-13 07:16:53'),
(276, 'Exporting Master Product', 'http://localhost:8000/product.export', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 07:17:01', '2023-12-13 07:17:01'),
(277, 'Listing Product', 'http://localhost:8000/product', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 07:18:58', '2023-12-13 07:18:58'),
(278, 'Exporting Master Product', 'http://localhost:8000/product.export', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 07:19:03', '2023-12-13 07:19:03'),
(279, 'Listing Product', 'http://localhost:8000/product', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 07:24:54', '2023-12-13 07:24:54'),
(280, 'Exporting Master Product', 'http://localhost:8000/product.export', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 07:25:37', '2023-12-13 07:25:37'),
(281, 'Exporting Master Product', 'http://localhost:8000/product.export', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 07:26:07', '2023-12-13 07:26:07'),
(282, 'Listing Product', 'http://localhost:8000/product', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 07:26:20', '2023-12-13 07:26:20'),
(283, 'Listing Product', 'http://localhost:8000/product', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 07:55:03', '2023-12-13 07:55:03'),
(284, 'Importing Create Master Product', 'http://localhost:8000/product.import', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 07:55:17', '2023-12-13 07:55:17'),
(285, 'Importing Create Master Product', 'http://localhost:8000/product.import', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 07:55:42', '2023-12-13 07:55:42'),
(286, 'Listing Product', 'http://localhost:8000/product', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 07:56:37', '2023-12-13 07:56:37'),
(287, 'Importing Create Master Product', 'http://localhost:8000/product.import', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 07:56:47', '2023-12-13 07:56:47'),
(288, 'Listing Product', 'http://localhost:8000/product', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 07:57:19', '2023-12-13 07:57:19'),
(289, 'Importing Create Master Product', 'http://localhost:8000/product.import', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 07:57:28', '2023-12-13 07:57:28'),
(290, 'Importing Create Master Product', 'http://localhost:8000/product.import', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 07:58:07', '2023-12-13 07:58:07'),
(291, 'Listing Product', 'http://localhost:8000/product', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 07:59:05', '2023-12-13 07:59:05'),
(292, 'Importing Create Master Product', 'http://localhost:8000/product.import', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 07:59:12', '2023-12-13 07:59:12'),
(293, 'Listing Product', 'http://localhost:8000/product', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:00:03', '2023-12-13 08:00:03'),
(294, 'Importing Create Master Product', 'http://localhost:8000/product.import', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:00:11', '2023-12-13 08:00:11'),
(295, 'Listing Product', 'http://localhost:8000/product', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:00:12', '2023-12-13 08:00:12'),
(296, 'Listing Brand Products', 'http://localhost:8000/brand', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:00:25', '2023-12-13 08:00:25'),
(297, 'Creating Brand Products CAESAR', 'http://localhost:8000/brand', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:00:35', '2023-12-13 08:00:35'),
(298, 'Creating Brand Products DRACO', 'http://localhost:8000/brand', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:00:45', '2023-12-13 08:00:45'),
(299, 'Listing Product', 'http://localhost:8000/product', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:00:49', '2023-12-13 08:00:49'),
(300, 'Editing Data Product DUS CAESAR TPS 18X18 A', 'http://localhost:8000/product/3/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:01:23', '2023-12-13 08:01:23'),
(301, 'Updating Products DUS CAESAR TPS 18X18 A', 'http://localhost:8000/product/3', 'PUT', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:01:29', '2023-12-13 08:01:29'),
(302, 'Listing Product', 'http://localhost:8000/product', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:01:29', '2023-12-13 08:01:29'),
(303, 'Editing Data Product DUS CAESAR TPS 20X20 A', 'http://localhost:8000/product/4/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:01:33', '2023-12-13 08:01:33'),
(304, 'Updating Products DUS CAESAR TPS 20X20 A', 'http://localhost:8000/product/4', 'PUT', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:01:36', '2023-12-13 08:01:36'),
(305, 'Listing Product', 'http://localhost:8000/product', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:01:37', '2023-12-13 08:01:37'),
(306, 'Editing Data Product DUS CAESAR LUX 24X24 A', 'http://localhost:8000/product/5/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:01:50', '2023-12-13 08:01:50'),
(307, 'Updating Products DUS CAESAR LUX 24X24 A', 'http://localhost:8000/product/5', 'PUT', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:01:55', '2023-12-13 08:01:55'),
(308, 'Listing Product', 'http://localhost:8000/product', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:01:55', '2023-12-13 08:01:55'),
(309, 'Editing Data Product DUS DRACO TPS 10X15 B', 'http://localhost:8000/product/6/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:02:00', '2023-12-13 08:02:00'),
(310, 'Updating Products DUS DRACO TPS 10X15 B', 'http://localhost:8000/product/6', 'PUT', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:02:04', '2023-12-13 08:02:04'),
(311, 'Listing Product', 'http://localhost:8000/product', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:02:04', '2023-12-13 08:02:04'),
(312, 'Listing Brand Products', 'http://localhost:8000/brand', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:03:08', '2023-12-13 08:03:08'),
(313, 'Listing Product', 'http://localhost:8000/product', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:07:30', '2023-12-13 08:07:30'),
(314, 'Importing Update Master Product', 'http://localhost:8000/product.import', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:07:45', '2023-12-13 08:07:45'),
(315, 'Importing Update Master Product', 'http://localhost:8000/product.import', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:07:57', '2023-12-13 08:07:57'),
(316, 'Listing Product', 'http://localhost:8000/product', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:07:57', '2023-12-13 08:07:57'),
(317, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:26:26', '2023-12-13 08:26:26'),
(318, 'Listing Customer', 'http://localhost:8000/outlet', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:26:33', '2023-12-13 08:26:33'),
(319, 'Creating Customer Martabak kubang', 'http://localhost:8000/outlet', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:28:21', '2023-12-13 08:28:21'),
(320, 'Listing Customer', 'http://localhost:8000/outlet', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:28:21', '2023-12-13 08:28:21'),
(321, 'Showing Data Outlet Martabak kubang', 'http://localhost:8000/outlet/108', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:32:13', '2023-12-13 08:32:13'),
(322, 'Showing Data Outlet Martabak kubang', 'http://localhost:8000/outlet/108', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:33:52', '2023-12-13 08:33:52'),
(323, 'Showing Data Outlet Martabak kubang', 'http://localhost:8000/outlet/108', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:34:27', '2023-12-13 08:34:27'),
(324, 'Showing Data Outlet Martabak kubang', 'http://localhost:8000/outlet/108', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:34:56', '2023-12-13 08:34:56'),
(325, 'Showing Data Outlet Martabak kubang', 'http://localhost:8000/outlet/108', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:35:04', '2023-12-13 08:35:04'),
(326, 'Showing Data Outlet Martabak kubang', 'http://localhost:8000/outlet/108', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:35:13', '2023-12-13 08:35:13'),
(327, 'Showing Data Outlet Martabak kubang', 'http://localhost:8000/outlet/108', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:35:24', '2023-12-13 08:35:24'),
(328, 'Listing Customer', 'http://localhost:8000/outlet', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:35:27', '2023-12-13 08:35:27'),
(329, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:35:32', '2023-12-13 08:35:32'),
(330, 'Showing Data Customer CARINGIN PLASTIK', 'http://localhost:8000/customer/53', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:35:39', '2023-12-13 08:35:39'),
(331, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:35:48', '2023-12-13 08:35:48'),
(332, 'Showing Data Customer CARINGIN PLASTIK', 'http://localhost:8000/customer/53', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:36:09', '2023-12-13 08:36:09'),
(333, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:37:16', '2023-12-13 08:37:16'),
(334, 'Editing Data Customer CARINGIN PLASTIK', 'http://localhost:8000/customer/53/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:37:20', '2023-12-13 08:37:20'),
(335, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:37:23', '2023-12-13 08:37:23'),
(336, 'Editing Data Customer CARINGIN PLASTIK', 'http://localhost:8000/customer/53/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:37:50', '2023-12-13 08:37:50'),
(337, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:38:34', '2023-12-13 08:38:34'),
(338, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:38:42', '2023-12-13 08:38:42'),
(339, 'Listing Customer', 'http://localhost:8000/outlet', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:38:45', '2023-12-13 08:38:45'),
(340, 'Listing Customer', 'http://localhost:8000/outlet', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:39:51', '2023-12-13 08:39:51'),
(341, 'Editing Data Outlets Martabak kubang', 'http://localhost:8000/outlet/108/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:41:23', '2023-12-13 08:41:23'),
(342, 'Listing Customer', 'http://localhost:8000/outlet', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:42:03', '2023-12-13 08:42:03'),
(343, 'Editing Data Outlets Martabak kubang', 'http://localhost:8000/outlet/108/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:42:06', '2023-12-13 08:42:06'),
(344, 'Editing Data Outlets Martabak kubang', 'http://localhost:8000/outlet/108/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:42:36', '2023-12-13 08:42:36'),
(345, 'Editing Data Outlets Martabak kubang', 'http://localhost:8000/outlet/108/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:43:45', '2023-12-13 08:43:45'),
(346, 'Editing Data Outlets Martabak kubang', 'http://localhost:8000/outlet/108/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:44:15', '2023-12-13 08:44:15'),
(347, 'Listing Customer', 'http://localhost:8000/outlet', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:44:22', '2023-12-13 08:44:22'),
(348, 'Editing Data Outlets Martabak kubang', 'http://localhost:8000/outlet/108/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:44:44', '2023-12-13 08:44:44'),
(349, 'Listing Customer', 'http://localhost:8000/outlet', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:46:06', '2023-12-13 08:46:06'),
(350, 'Editing Data Outlets Martabak kubang', 'http://localhost:8000/outlet/108/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:46:15', '2023-12-13 08:46:15'),
(351, 'Editing Data Outlets Martabak kubang', 'http://localhost:8000/outlet/108/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:46:46', '2023-12-13 08:46:46'),
(352, 'Updating Outlet Martabak kubang', 'http://localhost:8000/outlet/108', 'PUT', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:47:17', '2023-12-13 08:47:17'),
(353, 'Listing Customer', 'http://localhost:8000/outlet', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:47:18', '2023-12-13 08:47:18'),
(354, 'Editing Data Outlets Martabak kubang', 'http://localhost:8000/outlet/108/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:47:22', '2023-12-13 08:47:22'),
(355, 'Listing Customer', 'http://localhost:8000/outlet', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:47:25', '2023-12-13 08:47:25'),
(356, 'Listing Customer', 'http://localhost:8000/outlet', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:48:26', '2023-12-13 08:48:26'),
(357, 'Editing Data Outlets Martabak kubang', 'http://localhost:8000/outlet/108/edit', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:48:31', '2023-12-13 08:48:31'),
(358, 'Listing Customer', 'http://localhost:8000/outlet', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:48:33', '2023-12-13 08:48:33'),
(359, 'Listing Customer', 'http://localhost:8000/outlet', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:49:02', '2023-12-13 08:49:02'),
(360, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:55:41', '2023-12-13 08:55:41'),
(361, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:57:15', '2023-12-13 08:57:15'),
(362, 'Listing Customer', 'http://localhost:8000/outlet', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 08:57:20', '2023-12-13 08:57:20'),
(363, 'Creating Customer awsdqawa', 'http://localhost:8000/outlet', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 09:14:02', '2023-12-13 09:14:02'),
(364, 'Listing Customer', 'http://localhost:8000/outlet', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 09:14:03', '2023-12-13 09:14:03'),
(365, 'Listing Customer', 'http://localhost:8000/outlet', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 09:16:36', '2023-12-13 09:16:36'),
(366, 'Listing Customer', 'http://localhost:8000/outlet', 'GET', '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Mobile Safari/537.36', 1, '2023-12-13 09:16:48', '2023-12-13 09:16:48'),
(367, 'Listing Customer', 'http://localhost:8000/outlet', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 09:17:07', '2023-12-13 09:17:07'),
(368, 'Listing Staff', 'http://localhost:8000/staff', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 09:17:13', '2023-12-13 09:17:13'),
(369, 'Listing Visited', 'http://localhost:8000/call', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 09:17:21', '2023-12-13 09:17:21'),
(370, 'Listing Visited', 'http://localhost:8000/call', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 09:17:22', '2023-12-13 09:17:22'),
(371, 'Listing Log Activity', 'http://localhost:8000/log', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 09:17:27', '2023-12-13 09:17:27'),
(372, 'Listing Customer', 'http://localhost:8000/outlet', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 09:18:07', '2023-12-13 09:18:07'),
(373, 'Creating Customer awdaw', 'http://localhost:8000/outlet', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 09:18:22', '2023-12-13 09:18:22'),
(374, 'Listing Customer', 'http://localhost:8000/outlet', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 09:18:23', '2023-12-13 09:18:23'),
(375, 'Listing Customer', 'http://localhost:8000/outlet', 'GET', '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Mobile Safari/537.36', 1, '2023-12-13 09:18:45', '2023-12-13 09:18:45'),
(376, 'Creating Customer dfghfjf', 'http://localhost:8000/outlet', 'POST', '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Mobile Safari/537.36', 1, '2023-12-13 09:19:01', '2023-12-13 09:19:01'),
(377, 'Listing Customer', 'http://localhost:8000/outlet', 'GET', '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Mobile Safari/537.36', 1, '2023-12-13 09:19:02', '2023-12-13 09:19:02'),
(378, 'Listing Customer', 'http://localhost:8000/outlet', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 09:19:57', '2023-12-13 09:19:57'),
(379, 'Visiting Customer CARINGIN PLASTIK', 'http://localhost:8000/visit.storeMd', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 09:21:08', '2023-12-13 09:21:08'),
(380, 'Listing Visited', 'http://localhost:8000/call', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 09:21:26', '2023-12-13 09:21:26'),
(381, 'Listing Visited', 'http://localhost:8000/call?date=2023-12-13', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 09:27:45', '2023-12-13 09:27:45'),
(382, 'Listing Customer', 'http://localhost:8000/outlet', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 09:28:23', '2023-12-13 09:28:23'),
(383, 'Visiting Customer MY PLASTIK', 'http://localhost:8000/visit.storeMd', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 09:28:55', '2023-12-13 09:28:55'),
(384, 'Listing Visited', 'http://localhost:8000/call', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 09:29:01', '2023-12-13 09:29:01'),
(385, 'Listing Log Activity', 'http://localhost:8000/log', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 09:29:06', '2023-12-13 09:29:06'),
(386, 'Listing Visited', 'http://localhost:8000/call', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 09:35:21', '2023-12-13 09:35:21'),
(387, 'Listing Visited', 'http://localhost:8000/call', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 10:09:44', '2023-12-13 10:09:44');
INSERT INTO `logs` (`id`, `activity`, `url`, `method`, `ip_address`, `agent`, `user_id`, `created_at`, `updated_at`) VALUES
(388, 'Listing Visited', 'http://localhost:8000/call', 'GET', '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Mobile Safari/537.36', 1, '2023-12-13 10:11:42', '2023-12-13 10:11:42'),
(389, 'Listing Visited', 'http://localhost:8000/call', 'GET', '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Mobile Safari/537.36', 1, '2023-12-13 10:12:04', '2023-12-13 10:12:04'),
(390, 'Listing Visited', 'http://localhost:8000/call', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 10:12:11', '2023-12-13 10:12:11'),
(391, 'Listing Visited', 'http://localhost:8000/call', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 10:24:52', '2023-12-13 10:24:52'),
(392, 'Listing Visited', 'http://localhost:8000/call', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 10:53:44', '2023-12-13 10:53:44'),
(393, 'Listing Visited', 'http://localhost:8000/call', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 10:54:11', '2023-12-13 10:54:11'),
(394, 'Listing Visited', 'http://localhost:8000/call', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 10:54:49', '2023-12-13 10:54:49'),
(395, 'Listing Visited', 'http://localhost:8000/call', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 10:55:39', '2023-12-13 10:55:39'),
(396, 'Listing Visited', 'http://localhost:8000/call', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 10:57:39', '2023-12-13 10:57:39'),
(397, 'Listing Visited', 'http://localhost:8000/call', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-13 11:09:12', '2023-12-13 11:09:12'),
(398, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-14 02:24:06', '2023-12-14 02:24:06'),
(399, 'Showing Data Customer CARINGIN PLASTIK', 'http://localhost:8000/customer/53', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-14 02:24:10', '2023-12-14 02:24:10'),
(400, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-14 02:28:56', '2023-12-14 02:28:56'),
(401, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-14 02:29:07', '2023-12-14 02:29:07'),
(402, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-14 07:33:14', '2023-12-14 07:33:14'),
(403, 'Listing Visited', 'http://localhost:8000/call', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-14 07:40:20', '2023-12-14 07:40:20'),
(404, 'Visiting Customer PA UJANG', 'http://localhost:8000/visit.storeMd', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-14 07:48:46', '2023-12-14 07:48:46'),
(405, 'Visiting Customer DEVANA PLASTIK', 'http://localhost:8000/visit.storeMd', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-14 07:49:29', '2023-12-14 07:49:29'),
(406, 'Listing Visited', 'http://localhost:8000/call', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-14 07:49:37', '2023-12-14 07:49:37'),
(407, 'Visiting Customer ANDRI PLASTIK', 'http://localhost:8000/visit.storeMd', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-14 07:50:11', '2023-12-14 07:50:11'),
(408, 'Listing Visited', 'http://localhost:8000/call', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-14 07:50:15', '2023-12-14 07:50:15'),
(409, 'Listing Visited', 'http://localhost:8000/call', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-14 08:09:17', '2023-12-14 08:09:17'),
(410, 'Listing Visited', 'http://localhost:8000/call', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-14 08:21:55', '2023-12-14 08:21:55'),
(411, 'Listing Visited', 'http://localhost:8000/call', 'GET', '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Mobile Safari/537.36', 1, '2023-12-14 08:40:30', '2023-12-14 08:40:30'),
(412, 'Listing Customer', 'http://localhost:8000/customer', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-14 08:43:50', '2023-12-14 08:43:50'),
(413, 'Listing Visited', 'http://localhost:8000/call', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-14 08:43:54', '2023-12-14 08:43:54'),
(414, 'Listing Visited', 'http://localhost:8000/call', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-14 08:51:58', '2023-12-14 08:51:58'),
(415, 'Listing Customer', 'http://localhost:8000/outlet', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-14 08:52:34', '2023-12-14 08:52:34'),
(416, 'Visiting Customer Martabak kubang', 'http://localhost:8000/visit.storeMd', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-14 08:53:05', '2023-12-14 08:53:05'),
(417, 'Listing Visited', 'http://localhost:8000/call', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-14 08:53:12', '2023-12-14 08:53:12'),
(418, 'Listing Visited', 'http://localhost:8000/call', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-14 08:59:55', '2023-12-14 08:59:55'),
(419, 'Listing Visited', 'http://localhost:8000/call', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-14 09:08:24', '2023-12-14 09:08:24'),
(420, 'Listing Visited', 'http://localhost:8000/call', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-14 09:09:21', '2023-12-14 09:09:21'),
(421, 'Listing Visited', 'http://localhost:8000/call', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-14 09:10:33', '2023-12-14 09:10:33'),
(422, 'Listing Visited', 'http://localhost:8000/call', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-14 09:18:54', '2023-12-14 09:18:54'),
(423, 'Listing Visited', 'http://localhost:8000/call', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-14 09:26:52', '2023-12-14 09:26:52'),
(424, 'Listing Visited', 'http://localhost:8000/call', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-14 09:27:06', '2023-12-14 09:27:06'),
(425, 'Listing Visited', 'http://localhost:8000/call', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-14 09:27:50', '2023-12-14 09:27:50'),
(426, 'Listing Visited', 'http://localhost:8000/call', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-14 09:28:52', '2023-12-14 09:28:52'),
(427, 'Listing Visited', 'http://localhost:8000/call', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-14 09:32:02', '2023-12-14 09:32:02'),
(428, 'Listing Visited', 'http://localhost:8000/call', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-14 09:34:18', '2023-12-14 09:34:18'),
(429, 'Listing Visited', 'http://localhost:8000/call', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 1, '2023-12-15 01:02:10', '2023-12-15 01:02:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2023_10_16_022830_create_logs_table', 1),
(5, '2023_10_17_083944_create_m_branches_table', 1),
(6, '2023_10_17_084224_create_m_customers_table', 1),
(7, '2023_10_18_033524_create_m_displays_table', 1),
(8, '2023_10_23_090518_create_m_category_products_table', 1),
(9, '2023_10_23_090630_create_m_products_table', 1),
(10, '2023_10_30_003746_create_m_staff_table', 1),
(11, '2023_10_30_161147_create_t_visits_table', 1),
(12, '2023_10_30_161428_create_dt_md_visits_table', 1),
(13, '2023_11_22_145816_create_m_owners_table', 1),
(14, '2023_11_22_160458_create_dt_cust_visits_table', 1),
(15, '2023_11_22_160533_create_dt_outlet_visits_table', 1),
(16, '2023_11_23_115157_create_m_fotos_table', 1),
(17, '2023_11_23_115606_create_t_gifts_table', 1),
(18, '2023_11_23_130418_create_m_jabatans_table', 1),
(19, '2023_11_23_130714_create_m_brand_products_table', 1),
(20, '2023_11_23_130843_create_m_sub_brand_products_table', 1),
(21, '2023_11_23_131018_create_m_main_menus_table', 1),
(22, '2023_11_23_131230_create_m_menus_table', 1),
(23, '2023_11_23_131531_create_m_sub_menus_table', 1),
(24, '2023_11_23_131729_create_m_group_menus_table', 1),
(25, '2023_11_23_132138_create_m_menu_accesses_table', 1),
(26, '2023_11_23_132731_create_m_schedule_visits_table', 1),
(27, '2023_11_23_135019_create_m_schedule_visit_details_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_branches`
--

CREATE TABLE `m_branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` char(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `notes` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `m_branches`
--

INSERT INTO `m_branches` (`id`, `code`, `name`, `notes`, `status`, `disabled`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'BGR', 'BOGOR', 'Branch Bogor', 1, 0, '2023-12-11 03:26:44', 1, '2023-12-11 03:26:44', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_brand_products`
--

CREATE TABLE `m_brand_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `m_brand_products`
--

INSERT INTO `m_brand_products` (`id`, `name`, `category_id`, `status`, `disabled`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'GRETEL', 4, 1, 0, '2023-12-11 03:27:10', 1, '2023-12-11 03:27:10', NULL, NULL, NULL),
(2, 'CAESAR', 4, 1, 0, '2023-12-13 08:00:35', 1, '2023-12-13 08:00:35', NULL, NULL, NULL),
(3, 'DRACO', 4, 1, 0, '2023-12-13 08:00:45', 1, '2023-12-13 08:00:45', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_category_products`
--

CREATE TABLE `m_category_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `m_category_products`
--

INSERT INTO `m_category_products` (`id`, `name`, `status`, `disabled`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'TAB', 1, 0, '2023-12-11 03:26:09', NULL, NULL, NULL, NULL, NULL),
(2, 'TISSUE', 1, 0, '2023-12-11 03:26:09', NULL, NULL, NULL, NULL, NULL),
(3, 'MIKA', 1, 0, '2023-12-11 03:26:09', NULL, NULL, NULL, NULL, NULL),
(4, 'DUS', 1, 0, '2023-12-11 03:26:09', NULL, NULL, NULL, NULL, NULL),
(5, 'OTHERS', 1, 0, '2023-12-11 03:26:09', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_customers`
--

CREATE TABLE `m_customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` text DEFAULT NULL,
  `photo` blob DEFAULT NULL,
  `address` text DEFAULT NULL,
  `LA` text DEFAULT NULL,
  `LO` text DEFAULT NULL,
  `area` varchar(100) DEFAULT NULL,
  `regist` tinyint(1) NOT NULL DEFAULT 0,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `branch_id` int(10) UNSIGNED DEFAULT NULL,
  `staff_id` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `m_customers`
--

INSERT INTO `m_customers` (`id`, `code`, `name`, `phone`, `photo`, `address`, `LA`, `LO`, `area`, `regist`, `type`, `branch_id`, `staff_id`, `status`, `disabled`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(53, 'BGRC0069', 'CARINGIN PLASTIK', NULL, NULL, NULL, '-6.1598', '106.6959', 'BOGOr', 1, 0, 1, 0, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-13 09:20:30', 1, NULL, NULL),
(54, 'BGRF0006', 'FAJAR', NULL, NULL, NULL, NULL, NULL, 'BOGOR', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:56:38', 1, NULL, NULL),
(55, 'BGRM0108', 'MURAH ABADI', NULL, NULL, NULL, NULL, NULL, 'Bogor', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(56, 'BGRA0022', 'ASRI', NULL, NULL, NULL, NULL, NULL, 'Bogor', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(57, 'BGRC0070', 'CEPI PLASTIK', NULL, NULL, NULL, NULL, NULL, 'Bogor', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(58, 'BGRJ0057', 'JAYA MANDIRI PLASTIK', NULL, NULL, NULL, NULL, NULL, 'Bogor', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(59, 'BGRJ0004', 'JO\"EN PLASTIK', NULL, NULL, NULL, NULL, NULL, 'Bogor', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(60, 'BGRM0194', 'MY PLASTIK', NULL, NULL, NULL, '-6.1598', '106.6959', 'Bogor', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-13 09:28:37', NULL, NULL, NULL),
(61, 'BGRN0026', 'NISA PLASTIK', NULL, NULL, NULL, NULL, NULL, 'Bogor', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(62, 'BGRN0062', 'NIZAM, TOKO', NULL, NULL, NULL, NULL, NULL, 'Bogor', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(63, 'BGRP0091', 'PA UJANG', NULL, NULL, NULL, '-6.1598', '106.6959', 'Bogor', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-14 07:48:32', NULL, NULL, NULL),
(64, 'BGRR0006', 'RIFA PLASTIK', NULL, NULL, NULL, NULL, NULL, 'Bogor', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(65, 'BGRS0216', 'SAHABAT PLASTIK', NULL, NULL, NULL, NULL, NULL, 'Bogor', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(66, 'BGRS0029', 'SAUDARA', NULL, NULL, NULL, NULL, NULL, 'Bogor', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(67, 'BGRA0338', 'AGUS PLASTIK', NULL, NULL, NULL, NULL, NULL, 'Bogor', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(68, 'BGRA0299', 'ANDRI PLASTIK', NULL, NULL, NULL, '-6.1598', '106.6959', 'Bogor', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-14 07:49:59', NULL, NULL, NULL),
(69, 'BGRA0267', 'ASEP PLASTIK', NULL, NULL, NULL, NULL, NULL, 'Bogor', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(70, 'BGRB0132', 'BOHEL, TOKO', NULL, NULL, NULL, NULL, NULL, 'Bogor', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(71, 'BGRD0121', 'DEVANA PLASTIK', NULL, NULL, NULL, '-6.1598', '106.6959', 'Bogor', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-14 07:49:13', NULL, NULL, NULL),
(72, 'BGRH0092', 'HARI PLASTIK', NULL, NULL, NULL, NULL, NULL, 'Bogor', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(73, 'BGRH0083', 'HEDI PLASTIK', NULL, NULL, NULL, NULL, NULL, 'Bogor', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(74, 'BGRI0065', 'IDOLA, TOKO', NULL, NULL, NULL, NULL, NULL, 'Bogor', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(75, 'BGRN0069', 'NOVAL PLASTIK', NULL, NULL, NULL, NULL, NULL, 'Bogor', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(76, 'BGR001', 'INTI JAYA', NULL, NULL, NULL, NULL, NULL, 'Bogor', 0, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(77, 'BGR002', 'RIA PLASTIK', NULL, NULL, NULL, NULL, NULL, 'Bogor', 0, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(78, 'BGRF0013', 'FAMILY JAYA', NULL, NULL, NULL, NULL, NULL, 'Depok', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(79, 'BGRF0015', 'SAWANGAN III', NULL, NULL, NULL, NULL, NULL, 'Depok', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(80, 'BGRS0217', 'SARENA', NULL, NULL, NULL, NULL, NULL, 'Depok', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(81, 'BGRT0004', 'TARUDIN', NULL, NULL, NULL, NULL, NULL, 'Depok', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(82, 'BGRA0013', 'ABU BAKAR PLASTIK', NULL, NULL, NULL, NULL, NULL, 'Depok', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(83, 'BGRA0036', 'ABU BAKAR 3', NULL, NULL, NULL, NULL, NULL, 'Depok', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(84, 'BGRA0019', 'ALFARIZI PLASTIK', NULL, NULL, NULL, NULL, NULL, 'Depok', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(85, 'BGRA0169', 'ATA', NULL, NULL, NULL, NULL, NULL, 'Depok', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(86, 'BGRB0011', 'BARAKAH JAYA', NULL, NULL, NULL, NULL, NULL, 'Depok', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(87, 'BGRB0013', 'BARONA PLASTIK', NULL, NULL, NULL, NULL, NULL, 'Depok', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(88, 'BGRB0183', 'BP. PLASTIK GROSIR', NULL, NULL, NULL, NULL, NULL, 'Depok', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(89, 'BGRC0004', 'CITRA', NULL, NULL, NULL, NULL, NULL, 'Depok', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(90, 'BGRD0070', 'DINAR PLASTIK', NULL, NULL, NULL, NULL, NULL, 'Depok', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(91, 'BGRF0023', 'FERY PLASTIK', NULL, NULL, NULL, NULL, NULL, 'Depok', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(92, 'BGRH0015', 'HAPPY PLASTIK', NULL, NULL, NULL, NULL, NULL, 'Depok', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(93, 'BGRH0005', 'HIKMAH JAYA TOKO', NULL, NULL, NULL, NULL, NULL, 'Depok', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(94, 'BGRI0004', 'IDA PLASTIK', NULL, NULL, NULL, NULL, NULL, 'Depok', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(95, 'BGRI0073', 'IDA WATI', NULL, NULL, NULL, NULL, NULL, 'Depok', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(96, 'BGRI0033', 'IQBAL PLASTIK', NULL, NULL, NULL, NULL, NULL, 'Depok', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(97, 'BGRK0003', 'KOYON PLASTIK', NULL, NULL, NULL, NULL, NULL, 'Depok', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(98, 'BGRL0002', 'LA RANTA TOKO KUE', NULL, NULL, NULL, NULL, NULL, 'Depok', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(99, 'BGRM0217', 'MARVIN', NULL, NULL, NULL, NULL, NULL, 'Depok', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(100, 'BGRM0081', 'MINTO', NULL, NULL, NULL, NULL, NULL, 'Depok', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(101, 'BGRM0003', 'MOSHA', NULL, NULL, NULL, NULL, NULL, 'Depok', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(102, 'BGRP0043', 'PUTRA MANDIRI PLASTIK', NULL, NULL, NULL, NULL, NULL, 'Depok', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(103, 'BGRR0039', 'RIDO ERICK', NULL, NULL, NULL, NULL, NULL, 'Depok', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(104, 'BGRR0043', 'RIDO PLASTIK ATAS', NULL, NULL, NULL, NULL, NULL, 'Depok', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(105, 'BGRS0009', 'SEGARA REZEKI', NULL, NULL, NULL, NULL, NULL, 'Depok', 1, 0, 1, NULL, 1, 0, '2023-12-11 03:44:32', 1, '2023-12-11 03:44:32', NULL, NULL, NULL),
(107, 'BGR003', 'BERKAH PLASTIK PINGGIR', '087687687', NULL, 'Jl. Raya Puncak', NULL, NULL, 'Cianjur', 1, 0, 1, 0, 1, 1, '2023-12-11 04:09:58', 1, '2023-12-11 07:48:01', 1, '2023-12-11 07:48:01', 1),
(108, '047', 'Martabak kubang', NULL, NULL, NULL, '-6.1598', '106.6959', 'BOGOR KOTA', 0, 1, 1, 0, 1, 0, '2023-12-13 08:28:21', 1, '2023-12-14 08:52:52', 1, NULL, NULL),
(112, 'BGR004', 'awsdqawa', NULL, NULL, NULL, NULL, NULL, 'adwwa', 0, 1, 1, 0, 1, 1, '2023-12-13 09:14:02', 1, '2023-12-13 09:16:42', NULL, '2023-12-13 09:16:42', 1),
(113, 'BGR005', 'awdaw', NULL, NULL, NULL, NULL, NULL, 'awda', 0, 1, 1, 0, 1, 1, '2023-12-13 09:18:22', 1, '2023-12-13 09:18:29', NULL, '2023-12-13 09:18:29', 1),
(114, 'BGR006', 'dfghfjf', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, 0, 1, 1, '2023-12-13 09:19:01', 1, '2023-12-13 09:19:09', NULL, '2023-12-13 09:19:09', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_displays`
--

CREATE TABLE `m_displays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `durability` int(11) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `m_displays`
--

INSERT INTO `m_displays` (`id`, `name`, `durability`, `status`, `disabled`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'TUMPUK', 30, 1, 0, '2023-12-11 03:26:08', NULL, NULL, NULL, NULL, NULL),
(2, 'GANTUNG', 90, 1, 0, '2023-12-11 03:26:08', NULL, NULL, NULL, NULL, NULL),
(3, 'TEMPEL', 150, 1, 0, '2023-12-11 03:26:08', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_fotos`
--

CREATE TABLE `m_fotos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` enum('V','B','D') NOT NULL DEFAULT 'D',
  `photo` blob DEFAULT NULL,
  `visit_id` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `m_fotos`
--

INSERT INTO `m_fotos` (`id`, `name`, `type`, `photo`, `visit_id`, `status`, `disabled`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'visit_customer-CARINGIN PLASTIK 1-13 Dec 2023.jpeg', 'V', 0x76697369745f637573746f6d65722d434152494e47494e20504c415354494b20312d31332044656320323032332e6a706567, NULL, 1, 0, '2023-12-13 09:21:08', 1, '2023-12-13 09:21:08', NULL, NULL, NULL),
(2, NULL, 'B', NULL, NULL, 1, 0, '2023-12-13 09:21:08', 1, '2023-12-13 09:21:08', NULL, NULL, NULL),
(3, 'visit_customer-MY PLASTIK 1-13 Dec 2023.jpg', 'V', 0x76697369745f637573746f6d65722d4d5920504c415354494b20312d31332044656320323032332e6a7067, NULL, 1, 0, '2023-12-13 09:28:56', 1, '2023-12-13 09:28:56', NULL, NULL, NULL),
(4, NULL, 'B', NULL, NULL, 1, 0, '2023-12-13 09:28:56', 1, '2023-12-13 09:28:56', NULL, NULL, NULL),
(5, 'visit_customer-PA UJANG 1-14 Dec 2023.jpeg', 'V', 0x76697369745f637573746f6d65722d504120554a414e4720312d31342044656320323032332e6a706567, 3, 1, 0, '2023-12-14 07:48:46', 1, '2023-12-14 07:48:46', NULL, NULL, NULL),
(6, 'visit_customer-DEVANA PLASTIK 1-14 Dec 2023.jpeg', 'V', 0x76697369745f637573746f6d65722d444556414e4120504c415354494b20312d31342044656320323032332e6a706567, 4, 1, 0, '2023-12-14 07:49:29', 1, '2023-12-14 07:49:29', NULL, NULL, NULL),
(7, 'visit_customer-ANDRI PLASTIK 1-14 Dec 2023.jpg', 'V', 0x76697369745f637573746f6d65722d414e44524920504c415354494b20312d31342044656320323032332e6a7067, 5, 1, 0, '2023-12-14 07:50:11', 1, '2023-12-14 07:50:11', NULL, NULL, NULL),
(8, 'visit_customer-Martabak kubang 1-14 Dec 2023.jpg', 'V', 0x76697369745f637573746f6d65722d4d6172746162616b206b7562616e6720312d31342044656320323032332e6a7067, 6, 1, 0, '2023-12-14 08:53:05', 1, '2023-12-14 08:53:05', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_group_menus`
--

CREATE TABLE `m_group_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_jabatans`
--

CREATE TABLE `m_jabatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `m_jabatans`
--

INSERT INTO `m_jabatans` (`id`, `name`, `status`, `disabled`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Developer', 1, 0, '2023-12-11 03:26:08', NULL, NULL, NULL, NULL, NULL),
(2, 'IT Support', 1, 0, '2023-12-11 03:26:08', NULL, NULL, NULL, NULL, NULL),
(3, 'Area Bussiness Developer', 1, 0, '2023-12-11 03:26:08', NULL, NULL, NULL, NULL, NULL),
(4, 'Staff Merchandiser', 1, 0, '2023-12-11 03:26:08', NULL, NULL, NULL, NULL, NULL),
(5, 'Supervisor Salesman', 1, 0, '2023-12-11 03:26:08', NULL, NULL, NULL, NULL, NULL),
(6, 'Kepala Depo', 1, 0, '2023-12-11 03:26:08', NULL, NULL, NULL, NULL, NULL),
(7, 'Staff Salesman', 1, 0, '2023-12-11 03:26:08', NULL, NULL, NULL, NULL, NULL),
(8, 'Sales Admin Support', 1, 0, '2023-12-11 03:26:08', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_main_menus`
--

CREATE TABLE `m_main_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `parent` tinyint(1) NOT NULL DEFAULT 1,
  `shown` tinyint(1) NOT NULL DEFAULT 0,
  `no_order` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_menus`
--

CREATE TABLE `m_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `parent` tinyint(1) NOT NULL DEFAULT 1,
  `shown` tinyint(1) NOT NULL DEFAULT 0,
  `no_order` int(11) NOT NULL DEFAULT 0,
  `main_menu_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_menu_accesses`
--

CREATE TABLE `m_menu_accesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `view` tinyint(1) NOT NULL DEFAULT 0,
  `detail` tinyint(1) NOT NULL DEFAULT 0,
  `add` tinyint(1) NOT NULL DEFAULT 0,
  `edit` tinyint(1) NOT NULL DEFAULT 0,
  `delete` tinyint(1) NOT NULL DEFAULT 0,
  `export` tinyint(1) NOT NULL DEFAULT 0,
  `import` tinyint(1) NOT NULL DEFAULT 0,
  `approval` tinyint(1) NOT NULL DEFAULT 0,
  `group_menu_id` int(11) DEFAULT NULL,
  `main_menu_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `sub_menu_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_owners`
--

CREATE TABLE `m_owners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `NIK` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `m_owners`
--

INSERT INTO `m_owners` (`id`, `name`, `NIK`, `phone`, `address`, `customer_id`, `status`, `disabled`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'ATEP', NULL, NULL, NULL, 107, 1, 0, '2023-12-11 04:09:58', 1, '2023-12-11 04:09:58', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_products`
--

CREATE TABLE `m_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `picture` blob DEFAULT NULL,
  `competitor` tinyint(1) NOT NULL DEFAULT 1,
  `competitor_name` varchar(255) DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `brand_id` int(10) UNSIGNED DEFAULT NULL,
  `subbrand_id` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `m_products`
--

INSERT INTO `m_products` (`id`, `code`, `name`, `description`, `picture`, `competitor`, `competitor_name`, `category_id`, `brand_id`, `subbrand_id`, `status`, `disabled`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'D10091818A', 'DUS GRETEL LUX 18X18 A', 'Gretel Lux Ukuran 18x18', NULL, 0, NULL, 4, 1, 1, 1, 0, '2023-12-11 03:30:35', 1, '2023-12-11 03:30:35', NULL, NULL, NULL),
(2, 'PROD001', 'AJB XXX', 'Produk AJB DUS', NULL, 1, '', 4, NULL, NULL, 1, 0, '2023-12-12 08:24:45', 1, '2023-12-12 09:33:23', 1, NULL, NULL),
(3, 'D10011818A', 'DUS CAESAR TPS 18X18 A', 'Dus Caesar', NULL, 0, '', 4, 2, NULL, 1, 0, '2023-12-13 08:00:11', 1, '2023-12-13 08:01:29', 1, NULL, NULL),
(4, 'D10012020A', 'DUS CAESAR TPS 20X20 A', 'Dus Caesar', NULL, 0, '', 4, 2, NULL, 1, 0, '2023-12-13 08:00:11', 1, '2023-12-13 08:01:36', 1, NULL, NULL),
(5, 'D10142424A', 'DUS CAESAR LUX 24X24 A', 'Dus Caesar', NULL, 0, '', 4, 2, NULL, 1, 0, '2023-12-13 08:00:11', 1, '2023-12-13 08:01:55', 1, NULL, NULL),
(6, 'D10031015B', 'DUS DRACO TPS 10X15 B', 'Dus Draco', NULL, 0, '', 4, 3, NULL, 1, 0, '2023-12-13 08:00:11', 1, '2023-12-13 08:02:04', 1, NULL, NULL),
(7, 'D10031515B', 'DUS DRACO TPS 15X15 B', 'Dus Draco', NULL, 0, NULL, 4, 3, NULL, 1, 0, '2023-12-13 08:00:11', 1, '2023-12-13 08:07:57', 1, NULL, NULL),
(8, 'D10031015A', 'DUS DRACO TPS 10X15 A', 'Dus Draco', NULL, 0, NULL, 4, 3, NULL, 1, 0, '2023-12-13 08:00:11', 1, '2023-12-13 08:07:57', 1, NULL, NULL),
(9, 'D10031515A', 'DUS DRACO TPS 15X15 A', 'Dus Draco', NULL, 0, NULL, 4, 3, NULL, 1, 0, '2023-12-13 08:00:11', 1, '2023-12-13 08:07:57', 1, NULL, NULL),
(10, 'D10032020B', 'DUS DRACO TPS 20X20 B', 'Dus Draco', NULL, 0, NULL, 4, 3, NULL, 1, 0, '2023-12-13 08:00:11', 1, '2023-12-13 08:07:57', 1, NULL, NULL),
(11, 'D10032020A', 'DUS DRACO TPS 20X20 A', 'Dus Draco', NULL, 0, NULL, 4, NULL, NULL, 1, 0, '2023-12-13 08:00:11', 1, '2023-12-13 08:00:11', NULL, NULL, NULL),
(12, 'D10032222A', 'DUS DRACO TPS 22X22 A', 'Dus Draco', NULL, 0, NULL, 4, NULL, NULL, 1, 0, '2023-12-13 08:00:11', 1, '2023-12-13 08:00:11', NULL, NULL, NULL),
(13, 'MTTF005', 'TISSUE FLORIA TOILET - CORE EMB 10 IN 1', NULL, NULL, 0, NULL, 2, NULL, NULL, 1, 0, '2023-12-13 08:00:11', 1, '2023-12-13 08:00:11', NULL, NULL, NULL),
(14, 'MTTG001', 'TISSUE GABY FACIAL - KILOAN 700GR (24 PACK)', NULL, NULL, 0, NULL, 2, NULL, NULL, 1, 0, '2023-12-13 08:00:11', 1, '2023-12-13 08:00:11', NULL, NULL, NULL),
(15, 'MTTF018', 'TISSUE PRUDENCE TOWEL ROLL PULP (18 ROLL)', NULL, NULL, 0, NULL, 2, NULL, NULL, 1, 0, '2023-12-13 08:00:11', 1, '2023-12-13 08:00:11', NULL, NULL, NULL),
(16, 'MTTV010', 'TISSUE SAVING FACIAL KILOAN 600GR (24 PACK)', NULL, NULL, 0, NULL, 2, NULL, NULL, 1, 0, '2023-12-13 08:00:11', 1, '2023-12-13 08:00:11', NULL, NULL, NULL),
(17, 'PROD002', 'Dus XXX Mitra Box', NULL, NULL, 1, 'Mitra Box', 4, NULL, NULL, 1, 0, '2023-12-13 08:00:11', 1, '2023-12-13 08:00:11', NULL, NULL, NULL),
(18, 'PROD003', 'Dus XXX Anjali', NULL, NULL, 1, 'Anjali', 4, NULL, NULL, 1, 0, '2023-12-13 08:00:11', 1, '2023-12-13 08:00:11', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_schedule_visits`
--

CREATE TABLE `m_schedule_visits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `pattern` enum('D','W','M','Y') NOT NULL DEFAULT 'D',
  `value` int(11) NOT NULL DEFAULT 1,
  `target` int(11) NOT NULL DEFAULT 0,
  `staff_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_schedule_visit_details`
--

CREATE TABLE `m_schedule_visit_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `schedule_visit_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_staff`
--

CREATE TABLE `m_staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` char(10) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `jabatan_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `m_staff`
--

INSERT INTO `m_staff` (`id`, `code`, `name`, `gender`, `phone`, `jabatan_id`, `user_id`, `status`, `disabled`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, NULL, 'Developer', 'L', '085210310305', 1, 1, 1, 0, '2023-12-11 03:26:08', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_sub_brand_products`
--

CREATE TABLE `m_sub_brand_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `m_sub_brand_products`
--

INSERT INTO `m_sub_brand_products` (`id`, `name`, `category_id`, `brand_id`, `status`, `disabled`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'GRETEL LUX', 4, 1, 1, 0, '2023-12-11 03:27:26', 1, '2023-12-11 03:27:26', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_sub_menus`
--

CREATE TABLE `m_sub_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `parent` tinyint(1) NOT NULL DEFAULT 1,
  `shown` tinyint(1) NOT NULL DEFAULT 0,
  `no_order` int(11) NOT NULL DEFAULT 0,
  `main_menu_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_gifts`
--

CREATE TABLE `t_gifts` (
  `visit_id` int(11) DEFAULT NULL,
  `type` enum('K','B','C','J') DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_visits`
--

CREATE TABLE `t_visits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `order` int(11) NOT NULL,
  `timeIn` time NOT NULL,
  `timeOut` time DEFAULT NULL,
  `LA` text DEFAULT NULL,
  `LO` text DEFAULT NULL,
  `gift` tinyint(1) NOT NULL DEFAULT 0,
  `qty_sample` int(11) NOT NULL DEFAULT 0,
  `banner` tinyint(1) NOT NULL DEFAULT 0,
  `activity` enum('visit','maintenance') DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `register` tinyint(1) NOT NULL DEFAULT 0,
  `qtysell` int(11) NOT NULL DEFAULT 0,
  `customer_id` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `t_visits`
--

INSERT INTO `t_visits` (`id`, `date`, `order`, `timeIn`, `timeOut`, `LA`, `LO`, `gift`, `qty_sample`, `banner`, `activity`, `notes`, `register`, `qtysell`, `customer_id`, `staff_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, '2023-12-13', 1, '16:20:30', '16:21:08', '-6.1598', '106.6959', 0, 0, 0, 'visit', NULL, 0, 0, 53, 1, NULL, '2023-12-13 09:20:30', '2023-12-13 09:21:08'),
(2, '2023-12-13', 2, '16:28:37', '16:28:55', '-6.1598', '106.6959', 0, 0, 0, 'visit', NULL, 0, 0, 60, 1, NULL, '2023-12-13 09:28:37', '2023-12-13 09:28:55'),
(3, '2023-12-14', 1, '14:48:32', '14:48:46', '-6.1598', '106.6959', 0, 0, 0, 'visit', NULL, 0, 0, 63, 1, NULL, '2023-12-14 07:48:32', '2023-12-14 07:48:46'),
(4, '2023-12-14', 2, '14:49:13', '14:49:29', '-6.1598', '106.6959', 0, 0, 0, 'visit', 'Toko Tutup', 0, 0, 71, 1, NULL, '2023-12-14 07:49:13', '2023-12-14 07:49:29'),
(5, '2023-12-14', 3, '14:49:59', '14:50:11', '-6.1598', '106.6959', 0, 0, 0, 'visit', 'tutup', 0, 0, 68, 1, NULL, '2023-12-14 07:49:59', '2023-12-14 07:50:11'),
(6, '2023-12-14', 4, '15:52:52', '15:53:05', '-6.1598', '106.6959', 0, 0, 0, 'visit', NULL, 0, 0, 108, 1, NULL, '2023-12-14 08:52:52', '2023-12-14 08:53:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `status`, `disabled`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Developer', 'itsupgavi@gmail.com', 'developer', NULL, '$2y$10$qjl8z3grhrzT2gQtpGYeJOWuMTMAdzuYbCN/xeukmFhQp1yo6ftsG', NULL, 1, 0, '2023-12-11 03:26:08', NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dt_md_visits`
--
ALTER TABLE `dt_md_visits`
  ADD KEY `dt_md_visits_visit_id_foreign` (`visit_id`),
  ADD KEY `dt_md_visits_category_id_foreign` (`category_id`),
  ADD KEY `dt_md_visits_display_id_foreign` (`display_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_branches`
--
ALTER TABLE `m_branches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `m_branches_code_unique` (`code`),
  ADD UNIQUE KEY `m_branches_name_unique` (`name`);

--
-- Indeks untuk tabel `m_brand_products`
--
ALTER TABLE `m_brand_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `m_brand_products_name_unique` (`name`);

--
-- Indeks untuk tabel `m_category_products`
--
ALTER TABLE `m_category_products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_customers`
--
ALTER TABLE `m_customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `m_customers_code_unique` (`code`);

--
-- Indeks untuk tabel `m_displays`
--
ALTER TABLE `m_displays`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_fotos`
--
ALTER TABLE `m_fotos`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_group_menus`
--
ALTER TABLE `m_group_menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `m_group_menus_name_unique` (`name`);

--
-- Indeks untuk tabel `m_jabatans`
--
ALTER TABLE `m_jabatans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_main_menus`
--
ALTER TABLE `m_main_menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `m_main_menus_title_unique` (`title`);

--
-- Indeks untuk tabel `m_menus`
--
ALTER TABLE `m_menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `m_menus_title_unique` (`title`);

--
-- Indeks untuk tabel `m_menu_accesses`
--
ALTER TABLE `m_menu_accesses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_owners`
--
ALTER TABLE `m_owners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `m_owners_nik_unique` (`NIK`);

--
-- Indeks untuk tabel `m_products`
--
ALTER TABLE `m_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `m_products_code_unique` (`code`),
  ADD UNIQUE KEY `m_products_name_unique` (`name`);

--
-- Indeks untuk tabel `m_schedule_visits`
--
ALTER TABLE `m_schedule_visits`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `m_schedule_visits_name_unique` (`name`);

--
-- Indeks untuk tabel `m_schedule_visit_details`
--
ALTER TABLE `m_schedule_visit_details`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_staff`
--
ALTER TABLE `m_staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `m_staff_code_unique` (`code`);

--
-- Indeks untuk tabel `m_sub_brand_products`
--
ALTER TABLE `m_sub_brand_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `m_sub_brand_products_name_unique` (`name`);

--
-- Indeks untuk tabel `m_sub_menus`
--
ALTER TABLE `m_sub_menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `m_sub_menus_title_unique` (`title`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `t_visits`
--
ALTER TABLE `t_visits`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=430;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `m_branches`
--
ALTER TABLE `m_branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `m_brand_products`
--
ALTER TABLE `m_brand_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `m_category_products`
--
ALTER TABLE `m_category_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `m_customers`
--
ALTER TABLE `m_customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT untuk tabel `m_displays`
--
ALTER TABLE `m_displays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `m_fotos`
--
ALTER TABLE `m_fotos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `m_group_menus`
--
ALTER TABLE `m_group_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `m_jabatans`
--
ALTER TABLE `m_jabatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `m_main_menus`
--
ALTER TABLE `m_main_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `m_menus`
--
ALTER TABLE `m_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `m_menu_accesses`
--
ALTER TABLE `m_menu_accesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `m_owners`
--
ALTER TABLE `m_owners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `m_products`
--
ALTER TABLE `m_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `m_schedule_visits`
--
ALTER TABLE `m_schedule_visits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `m_schedule_visit_details`
--
ALTER TABLE `m_schedule_visit_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `m_staff`
--
ALTER TABLE `m_staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `m_sub_brand_products`
--
ALTER TABLE `m_sub_brand_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `m_sub_menus`
--
ALTER TABLE `m_sub_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_visits`
--
ALTER TABLE `t_visits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dt_md_visits`
--
ALTER TABLE `dt_md_visits`
  ADD CONSTRAINT `dt_md_visits_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `m_category_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dt_md_visits_display_id_foreign` FOREIGN KEY (`display_id`) REFERENCES `m_displays` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dt_md_visits_visit_id_foreign` FOREIGN KEY (`visit_id`) REFERENCES `t_visits` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
