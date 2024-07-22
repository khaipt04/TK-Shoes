-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 11:13 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myshop_php3`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Nike', '2024-05-29 21:33:42', '2024-05-29 21:33:42'),
(2, 'Adidas', '2024-05-29 21:33:42', '2024-05-29 21:33:42'),
(3, 'LV', '2024-05-29 21:33:42', '2024-05-29 21:33:42');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Giày nam', 'ct-img-1.jpg', '2024-05-30 04:30:07', '2024-05-30 04:30:07'),
(2, 'Giày nữ', 'ct-img-2.jpg', '2024-05-30 04:30:07', '2024-05-30 04:30:07'),
(3, 'Giày đôi', 'ct-img-3.jpg', '2024-05-30 04:30:07', '2024-05-30 04:30:07');

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
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `product_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(17, 1, 1, '2024-06-09 11:05:25', '2024-06-09 11:05:25'),
(19, 1, 19, '2024-06-09 11:06:42', '2024-06-09 11:06:42'),
(20, 1, 2, '2024-06-09 11:09:26', '2024-06-09 11:09:26'),
(21, 1, 15, '2024-06-09 11:09:34', '2024-06-09 11:09:34'),
(22, 1, 23, '2024-06-09 15:25:21', '2024-06-09 15:25:21'),
(23, 6, 1, '2024-06-10 00:28:10', '2024-06-10 00:28:10'),
(24, 6, 5, '2024-06-10 00:28:13', '2024-06-10 00:28:13'),
(25, 6, 2, '2024-06-10 01:50:57', '2024-06-10 01:50:57');

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
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(13, '2024_05_29_154537_create_brands_table', 2),
(14, '2024_05_16_083753_create_categories_table', 3),
(16, '2024_05_16_090015_create_products_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(12, 12, 1, 1, 800000, '2024-06-09 13:00:47', '2024-06-09 13:00:47'),
(13, 12, 5, 1, 750000, '2024-06-09 13:00:47', '2024-06-09 13:00:47'),
(14, 12, 9, 3, 800000, '2024-06-09 13:00:47', '2024-06-09 13:00:47'),
(15, 13, 3, 1, 650000, '2024-06-09 13:02:17', '2024-06-09 13:02:17'),
(16, 13, 13, 1, 650000, '2024-06-09 13:02:17', '2024-06-09 13:02:17'),
(17, 13, 17, 1, 800000, '2024-06-09 13:02:17', '2024-06-09 13:02:17'),
(18, 14, 2, 1, 850000, '2024-06-09 15:03:32', '2024-06-09 15:03:32'),
(19, 14, 8, 1, 800000, '2024-06-09 15:03:32', '2024-06-09 15:03:32'),
(20, 15, 12, 1, 550000, '2024-06-09 15:04:14', '2024-06-09 15:04:14'),
(21, 15, 18, 4, 600000, '2024-06-09 15:04:14', '2024-06-09 15:04:14'),
(22, 16, 2, 1, 850000, '2024-06-10 00:10:23', '2024-06-10 00:10:23'),
(23, 16, 3, 1, 650000, '2024-06-10 00:10:23', '2024-06-10 00:10:23'),
(24, 16, 23, 1, 900000, '2024-06-10 00:10:23', '2024-06-10 00:10:23'),
(25, 17, 1, 1, 700000, '2024-06-10 00:28:43', '2024-06-10 00:28:43'),
(26, 17, 5, 1, 750000, '2024-06-10 00:28:43', '2024-06-10 00:28:43'),
(27, 18, 8, 4, 800000, '2024-06-10 00:34:50', '2024-06-10 00:34:50'),
(28, 19, 5, 1, 750000, '2024-06-10 06:18:58', '2024-06-10 06:18:58'),
(29, 19, 7, 2, 900000, '2024-06-10 06:18:58', '2024-06-10 06:18:58'),
(30, 19, 9, 1, 800000, '2024-06-10 06:18:58', '2024-06-10 06:18:58'),
(31, 20, 1, 3, 700000, '2024-06-10 06:19:23', '2024-06-10 06:19:23'),
(32, 20, 16, 1, 750000, '2024-06-10 06:19:23', '2024-06-10 06:19:23'),
(33, 21, 3, 4, 650000, '2024-06-10 06:19:37', '2024-06-10 06:19:37'),
(34, 22, 6, 2, 850000, '2024-06-10 06:19:57', '2024-06-10 06:19:57'),
(35, 23, 1, 1, 700000, '2024-06-10 08:12:42', '2024-06-10 08:12:42'),
(36, 23, 5, 1, 750000, '2024-06-10 08:12:42', '2024-06-10 08:12:42'),
(37, 23, 6, 2, 850000, '2024-06-10 08:12:42', '2024-06-10 08:12:42'),
(38, 23, 7, 3, 900000, '2024-06-10 08:12:42', '2024-06-10 08:12:42');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Đang chờ','Đang giao hàng','Giao hàng thành công','Đã hủy') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Đang chờ',
  `total_money` int NOT NULL DEFAULT '0',
  `total_quantity` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `user_name`, `user_email`, `user_phone`, `user_address`, `status`, `total_money`, `total_quantity`, `created_at`, `updated_at`) VALUES
(12, NULL, 'PHAN THANH KHAI', '123@gmail.com', '0987123123', 'Quan 12', 'Đã hủy', 3950000, 5, '2024-06-09 13:00:47', '2024-06-10 06:29:38'),
(13, NULL, 'PHAN THANH KHAI', '123@gmail.com', '0987123123', 'Quan 12', 'Giao hàng thành công', 2100000, 3, '2024-06-09 13:02:17', '2024-06-09 13:02:17'),
(14, NULL, 'PHAN THANH KHAI', '123@gmail.com', '0704713551', 'Quan 12, TP.HCM', 'Đang giao hàng', 1650000, 2, '2024-06-09 15:03:32', '2024-06-09 15:03:32'),
(15, NULL, 'PHAN THANH KHAI', '123@gmail.com', '0704713551', 'Quan 12, TP.HCM', 'Đã hủy', 2950000, 5, '2024-06-09 15:04:14', '2024-06-09 15:04:14'),
(16, NULL, 'Khai', 'email@gmail.com', '0987654321', 'HCM City', 'Đã hủy', 2400000, 3, '2024-06-10 00:10:23', '2024-06-10 06:29:41'),
(17, 6, 'PHAN THANH KHAI', 'khai@gmail.com', '0987654321', 'CVPM QT, Quan 12, TP HCM', 'Đã hủy', 1450000, 2, '2024-06-10 00:28:43', '2024-06-10 00:48:19'),
(18, 6, 'PHAN THANH KHAI', 'khai@gmail.com', '0987654321', 'CVPM QT, Quan 12, TP HCM', 'Giao hàng thành công', 3200000, 4, '2024-06-10 00:34:50', '2024-06-10 06:28:35'),
(19, 6, 'PHAN THANH KHAI', 'khai@gmail.com', '0987654321', 'CVPM QT, Quan 12, TP HCM', 'Đang giao hàng', 3350000, 4, '2024-06-10 06:18:58', '2024-06-10 06:28:00'),
(20, 6, 'PHAN THANH KHAI', 'khai@gmail.com', '0987654321', 'CVPM QT, Quan 12, TP HCM', 'Giao hàng thành công', 2850000, 4, '2024-06-10 06:19:23', '2024-06-10 07:21:39'),
(21, 6, 'PHAN THANH KHAI', 'khai@gmail.com', '0987654321', 'CVPM QT, Quan 12, TP HCM', 'Đã hủy', 2600000, 4, '2024-06-10 06:19:37', '2024-06-10 06:30:35'),
(22, 6, 'PHAN THANH KHAI', 'khai@gmail.com', '0987654321', 'CVPM QT, Quan 12, TP HCM', 'Đang chờ', 1700000, 2, '2024-06-10 06:19:57', '2024-06-10 06:19:57'),
(23, 6, 'PHAN THANH KHAI', 'khai@gmail.com', '0987654321', 'CVPM QT, Quan 12, TP HCM', 'Giao hàng thành công', 5850000, 7, '2024-06-10 08:12:42', '2024-06-10 08:54:39');

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(2, 'Test Title', 'This is test content', '2024-06-09 07:13:31', '2024-06-09 07:13:31');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `price_sale` decimal(10,2) DEFAULT NULL,
  `quantity` bigint UNSIGNED NOT NULL DEFAULT '0',
  `sold` bigint UNSIGNED NOT NULL DEFAULT '0',
  `view` bigint UNSIGNED NOT NULL DEFAULT '0',
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `brand_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `color`, `price`, `price_sale`, `quantity`, `sold`, `view`, `category_id`, `brand_id`, `created_at`, `updated_at`) VALUES
(1, 'Nike Air Force 1 Essential Trắng Nâu 2', 'afonetn1.jpg', 'Trắng Nâu', 800000.00, 700000.00, 42, 58, 53, 1, 1, '2024-05-30 04:53:49', '2024-06-05 01:42:26'),
(2, 'Nike Air Force 1 Essential Xanh Hồng', 'afonexh1.jpg', 'Xanh Hồng', 900000.00, 850000.00, 61, 70, 93, 2, 1, '2024-05-30 04:53:49', '2024-05-30 04:53:49'),
(3, 'Nike Air Force 1 Essential Xanh Xám', 'afonexx1.jpg', 'Xanh Xám', 900000.00, 650000.00, 26, 82, 35, 3, 1, '2024-05-30 04:53:49', '2024-05-30 04:53:49'),
(4, 'Nike Air Force 1 Trắng Viền Đen', 'afonetvd1.jpg', 'Trắng Viền Đen', 500000.00, NULL, 4, 0, 0, 1, 1, '2024-05-30 04:53:49', '2024-05-30 04:53:49'),
(5, 'Nike Air Force 1 Trắng Viền Xanh', 'afonetvx1.jpg', 'Trắng Viền Xanh', 800000.00, 750000.00, 45, 15, 66, 1, 1, '2024-05-30 04:53:49', '2024-05-30 04:53:49'),
(6, 'Nike Air Force 1 Essential Full Xám', 'afonefx1.jpg', 'Full Xám', 950000.00, 850000.00, 68, 56, 77, 3, 1, '2024-05-30 04:53:49', '2024-05-30 04:53:49'),
(7, 'Nike Air Force 1 Kem Đế Nâu', 'afonetn1.jpg', 'Kem Đế Nâu', 900000.00, NULL, 92, 90, 95, 2, 1, '2024-05-30 04:53:49', '2024-05-30 04:53:49'),
(8, 'Nike Air Force 1 Kem Xanh Nhạt', 'afonekx1.jpg', 'Kem Xanh Nhạt', 800000.00, NULL, 45, 63, 62, 2, 1, '2024-05-30 04:53:49', '2024-05-30 04:53:49'),
(9, 'Nike Air Force 1 Essential Trắng Đen', 'afoneetd1.jpg', 'Trắng Đen', 850000.00, 800000.00, 73, 70, 33, 1, 1, '2024-05-30 04:53:49', '2024-05-30 04:53:49'),
(10, 'Nike Air Force 1 Essential Full Đen', 'afonefd1.jpg', 'Full Đen', 600000.00, 550000.00, 58, 54, 98, 3, 1, '2024-05-30 04:53:49', '2024-05-30 04:53:49'),
(11, 'Adidas Alphabounce New 22 Đen Trắng', 'aandt1.jpg', 'Đen Trắng', 750000.00, NULL, 47, 16, 88, 1, 2, '2024-05-30 04:53:49', '2024-05-30 04:53:49'),
(12, 'Adidas Alphabounce New 22 Full Trắng', 'aanft1.jpg', 'Full Trắng', 550000.00, NULL, 63, 85, 77, 2, 2, '2024-05-30 04:53:49', '2024-05-30 04:53:49'),
(13, 'Adidas Alphabounce New 22 Ghi Trắng', 'aangt1.jpg', 'Ghi Trắng', 750000.00, 650000.00, 23, 99, 30, 1, 2, '2024-05-30 04:53:49', '2024-05-30 04:53:49'),
(14, 'Adidas Alphabounce New 22 Kem Trắng', 'aankt1.jpg', 'Kem Trắng', 750000.00, NULL, 41, 69, 65, 3, 2, '2024-05-30 04:53:49', '2024-05-30 04:53:49'),
(15, 'Adidas Alphabounce New 22 Trắng Navy', 'aantn1.jpg', 'Trắng Navy', 700000.00, NULL, 40, 50, 54, 2, 2, '2024-05-30 04:53:49', '2024-05-30 04:53:49'),
(16, 'Adidas Alphabounce New Trắng Navy Đỏ', 'aantnd1.jpg', 'Trắng Navy Đỏ', 750000.00, NULL, 25, 76, 66, 1, 2, '2024-05-30 04:53:49', '2024-05-30 04:53:49'),
(17, 'Adidas 8681 New 22 Đen Kẻ Trắng SF', 'a8681dkt1.jpg', 'Đen Kẻ Trắng', 800000.00, NULL, 65, 80, 91, 3, 2, '2024-05-30 04:53:49', '2024-05-30 04:53:49'),
(18, 'Adidas 8681 New 22 Xanh Kẻ Trắng SF', 'a8681xkt1.jpg', 'Xanh Kẻ Trắng', 650000.00, 600000.00, 86, 59, 59, 2, 2, '2024-05-30 04:53:49', '2024-05-30 04:53:49'),
(19, 'Giày LV Trainer Maxi Trắng Đen', 'lvtd1.jpg', 'Trắng Đen', 750000.00, 680000.00, 53, 47, 34, 1, 3, '2024-05-30 04:53:49', '2024-05-30 04:53:49'),
(20, 'Giày LV Trainer Maxi Full Trắng', 'lvft1.jpg', 'Full Trắng', 500000.00, NULL, 83, 41, 66, 1, 3, '2024-05-30 04:53:49', '2024-05-30 04:53:49'),
(21, 'Giày LV Trainer Maxi Trắng Navy', 'lvtn1.jpg', 'Trắng Navy', 700000.00, NULL, 99, 43, 54, 2, 3, '2024-05-30 04:53:49', '2024-05-30 04:53:49'),
(22, 'Giày LV Trainer Maxi Trắng Nâu', 'lvtnau1.jpg', 'Trắng Nâu', 680000.00, NULL, 62, 36, 30, 2, 3, '2024-05-30 04:53:49', '2024-05-30 04:53:49'),
(23, 'Giày LV Trainer Maxi Trắng Xám', 'lvtx1.jpg', 'Trắng Xám', 900000.00, NULL, 77, 87, 51, 3, 3, '2024-05-30 04:53:49', '2024-05-30 04:53:49'),
(24, 'Giày LV Trainer Xanh Kẻ Trắng', 'lvtxk1.jpg', 'Xanh Kẻ Trắng', 780000.00, 600000.00, 28, 25, 67, 1, 3, '2024-05-30 04:53:49', '2024-05-30 04:53:49'),
(25, 'Giày LV Trainer Maxi Trắng Đen 2', 'lvtd21.jpg', 'Trắng Đen', 700000.00, NULL, 58, 68, 31, 1, 3, '2024-05-30 04:53:49', '2024-05-30 04:53:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condition` int DEFAULT '1',
  `role` int DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `address`, `condition`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'PHAN THANH KHAI', 'abc@gmail.com', '0987654321', NULL, '$2y$12$eCkS.tnnCmk94Ip6sTXXmuh3.76UcD4OC4OufDTJ0APyqPZyJucTK', 'Q12, HCM', 1, 0, 'mU3BMFuYHHfKZ4E9sKDOsOOIn4Bxz48D2a03ZG7T8y8kgl4SNyO2cwvV68Ob', '2024-05-30 12:31:12', '2024-06-02 11:50:12'),
(2, 'ADMIN', 'admin@gmail.com', NULL, NULL, '$2y$12$0y4Lz5Pj4IsUQlqscDpSVOCU30pzq55vqAUUSctplP9SqhV.yqSGq', NULL, 1, 1, NULL, '2024-05-30 12:46:04', '2024-05-30 12:46:04'),
(3, 'TEST', 'test@gmail.com', '0987654321', NULL, '$2y$12$0eR7pOqY637uPvZ7t14zyuxmHGccAXj8k7fE5dX3slyoo6WhjbB.O', 'Ho Chi Minh City', 1, 0, NULL, '2024-06-01 09:26:13', '2024-06-02 13:38:31'),
(4, 'TEST2', 'test2@gmail.com', '0987654321', NULL, '$2y$12$OArfB7B4Kem8N3tL1uPOUuZSip1UeEDHwo7LAeaM.n575VJ6ojz1m', NULL, 0, 0, NULL, '2024-06-01 09:33:15', '2024-06-01 09:33:15'),
(5, 'TEST3', 'test3@gmail.com', NULL, NULL, '$2y$12$.1Afq.GkZRh.GeFNRT29PO2xxE2wjiuwhGMkepWahrj1ThYaQLT7C', 'abc', 0, 1, NULL, '2024-06-01 09:42:19', '2024-06-01 10:19:52'),
(6, 'PHAN THANH KHAI', 'khai@gmail.com', '0987654321', NULL, '$2y$12$JnN/gpYZc56XjXI5nBHKFeec1FpScklaCQzKLRlMdFTLXpGZ3Daoq', 'CVPM QT, Quan 12, TP HCM', 1, 0, NULL, '2024-06-05 01:53:17', '2024-06-10 00:27:48'),
(7, 'TEST 3', 'test4@gmail.com', '0987654321888', NULL, '$2y$12$/prC6Vus1MhJuBLqf5p51.vyjTS24nRb/B2Fx26wOgOW.v4caVCxK', '123/abc/def', 1, 0, NULL, '2024-06-10 00:23:51', '2024-06-10 00:27:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_user_id_foreign` (`user_id`),
  ADD KEY `likes_product_id_foreign` (`product_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderdetails_product_id_foreign` (`product_id`),
  ADD KEY `orderdetails_order_id_foreign` (`order_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
