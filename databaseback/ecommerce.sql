-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2022 at 11:16 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `porder` varchar(123) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product` varchar(222) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon` varchar(222) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(333) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog` varchar(123) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other` varchar(222) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report` varchar(222) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(222) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oreturn` varchar(222) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(222) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(222) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` varchar(222) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(222) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `porder`, `product`, `coupon`, `category`, `blog`, `other`, `report`, `role`, `oreturn`, `message`, `contact`, `stock`, `type`, `created_at`, `updated_at`) VALUES
(3, 'Admin', '123456789', 'admin@gmail.com', NULL, '$2y$10$pSjshC5RwcCYb0fktB9uGeEn5neleAb2viuXUJ.vgEMw5sXk9RAoS', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 1, NULL, '2021-09-08 09:59:57'),
(4, 'taha', '03097672117', 'taha@gmail.com', NULL, '$2y$10$HgRV8tAtvugin75M.OKlg.ZcizWzVZ.Yw3SrygBn8dk/N7qLz8a3S', NULL, NULL, '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, '1', NULL, '1', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_logo`, `created_at`, `updated_at`) VALUES
(1, 'Sony', 'public/media/brand/011021_07_43_14.png', NULL, NULL),
(2, 'Rado', 'public/media/brand/011021_07_54_15.png', NULL, NULL),
(3, 'Lenovo', 'public/media/brand/011021_07_19_16.png', NULL, NULL),
(4, 'Assus', 'public/media/brand/011021_07_45_16.png', NULL, NULL),
(5, 'Cannon', 'public/media/brand/011021_07_07_17.png', NULL, NULL),
(6, 'Dell', 'public/media/brand/011021_07_28_17.png', NULL, NULL),
(7, 'Gucci', 'public/media/brand/011021_07_51_17.png', NULL, NULL),
(8, 'Levis', 'public/media/brand/011021_07_13_18.png', NULL, NULL),
(9, 'Nike', 'public/media/brand/011021_07_33_18.png', NULL, NULL),
(10, 'Adidas', 'public/media/brand/011021_07_57_18.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Mens Fashion', '2021-10-01 01:57:40', '2021-10-01 01:57:40'),
(2, 'Womens Fashion', '2021-10-01 01:58:08', '2021-10-01 01:58:08'),
(3, 'Childs', '2021-10-01 01:58:41', '2021-10-01 01:58:41'),
(4, 'Watch', '2021-10-01 01:58:57', '2021-10-01 01:58:57'),
(5, 'Furniture', '2021-10-01 01:59:14', '2021-10-01 01:59:14'),
(6, 'Electronics', '2021-10-01 02:02:27', '2021-10-01 02:02:27'),
(7, 'Health', '2021-10-01 02:02:52', '2021-10-01 02:02:52'),
(8, 'Beauty', '2021-10-01 02:03:14', '2021-10-01 02:03:14'),
(9, 'Sports & Outdoor', '2021-10-01 02:03:34', '2021-10-01 02:03:34'),
(10, 'Home & Living', '2021-10-01 02:04:00', '2021-10-01 02:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Taha', 'taha@gmail.com', '03097672118', 'message is a comment by', NULL, NULL),
(2, 'galann', 'taha1@gmail.com', '03097672118', 'mayton tayra man paryaa', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon`, `discount`, `created_at`, `updated_at`) VALUES
(1, 'Azadi', '14', NULL, NULL),
(3, 'end session', '50', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_10_05_052517_create_admins_table', 1),
(5, '2021_09_09_081729_create_categories_table', 2),
(6, '2021_09_09_084244_create_brands_table', 2),
(7, '2021_09_09_084302_create_subcategories_table', 2),
(8, '2021_09_15_054153_create_coupons_table', 3),
(9, '2021_09_15_160043_create_newslaters_table', 4),
(11, '2021_09_16_110824_create_products_table', 5),
(12, '2021_09_22_063945_create_post_category_table', 6),
(13, '2021_09_22_064016_create_posts_table', 6),
(14, '2021_10_17_122242_create_wishlists_table', 7),
(15, '2021_11_16_171708_create_settings_table', 8),
(16, '2016_06_01_000001_create_oauth_auth_codes_table', 9),
(17, '2016_06_01_000002_create_oauth_access_tokens_table', 9),
(18, '2016_06_01_000003_create_oauth_refresh_tokens_table', 9),
(19, '2016_06_01_000004_create_oauth_clients_table', 9),
(20, '2016_06_01_000005_create_oauth_personal_access_clients_table', 9),
(21, '2022_01_16_171824_create_orders_table', 10),
(22, '2022_01_16_171943_create_orders_details_table', 10),
(23, '2022_01_16_172421_create_shipping_table', 10),
(24, '2022_02_22_220644_create_contacts_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `newslaters`
--

CREATE TABLE `newslaters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newslaters`
--

INSERT INTO `newslaters` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'tahafake20@gmail.com', '2021-09-16 05:05:48', NULL),
(3, 'tahafake@gmail.com', '2021-09-16 05:26:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'LCIAIz00iWd1aa5DOmrYofp8sJsgTn7dgXSiP4Q2', NULL, 'http://localhost', 1, 0, 0, '2021-12-02 11:44:21', '2021-12-02 11:44:21'),
(2, NULL, 'Laravel Password Grant Client', 'uFetJFEltMoXsgXz7oPnJafKFMk9jfhgpQvSk6gy', 'users', 'http://localhost', 0, 1, 0, '2021-12-02 11:44:21', '2021-12-02 11:44:21');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-12-02 11:44:21', '2021-12-02 11:44:21');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blnc_transection` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_order_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `return_order` varchar(299) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `month` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_type`, `payment_id`, `payment_amount`, `blnc_transection`, `stripe_order_id`, `subtotal`, `shipping`, `vat`, `total`, `status`, `return_order`, `month`, `date`, `year`, `status_code`, `created_at`, `updated_at`) VALUES
(3, '4', 'stripe', 'card_1KLUiEESGmCMbdvwPTQnzWg0', '41300', 'txn_3KLUiEESGmCMbdvw0pLMfifB', '61eec945a165a', '405.00', '5', '3', '413', '1', '0', 'January', '24-01-22', '2022', '12333', NULL, NULL),
(4, '4', 'stripe', 'card_1KLVHuESGmCMbdvwRXO3c9fQ', '5300', 'txn_3KLVHuESGmCMbdvw0t1XALKQ', '61eed1ec50037', '45.00', '5', '3', '53', '3', '0', 'January', '24-01-22', '2022', '123', NULL, NULL),
(5, '4', 'stripe', 'card_1KLVJ2ESGmCMbdvwBluWgk66', '5300', 'txn_3KLVJ2ESGmCMbdvw0AYOG5eU', '61eed2318b924', '45.00', '5', '3', '53', '2', '0', 'January', '24-01-22', '2022', '4567', NULL, NULL),
(6, '4', 'stripe', 'card_1KQWyuESGmCMbdvwz8uCNBwR', '5800', 'txn_3KQWyuESGmCMbdvw16XgmkEt', '62011a3240b9c', '50.00', '5', '3', '58', '0', '2', 'February', '07-02-22', '2022', '611901', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders_details`
--

CREATE TABLE `orders_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `singleprice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalprice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_details`
--

INSERT INTO `orders_details` (`id`, `order_id`, `product_id`, `product_name`, `color`, `size`, `quantity`, `singleprice`, `totalprice`, `created_at`, `updated_at`) VALUES
(1, '2', '5', 'Blue Shirt', 'blue', 'm', '1', '5', '5', NULL, NULL),
(2, '2', '7', 'Baby shirt', 'pink', 's', '1', '8', '8', NULL, NULL),
(3, '3', '8', 'Black Watch', 'black', 'm', '3', '135', '405', NULL, NULL),
(4, '4', '2', 'red shirt', 'red', 'm', '1', '45', '45', NULL, NULL),
(5, '6', '3', 'y shirt', 'yellow', 'm', '1', '50', '50', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `post_title_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title_ur` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `details_ur` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `post_title_en`, `post_title_ur`, `post_image`, `details_en`, `details_ur`, `created_at`, `updated_at`) VALUES
(2, 2, 'free service', 'مفت سروس', 'public/media/blog/1712395728583848.jpg', '<p>free service instantly translates words1<br></p>', 'مفت سروس فوری طور پر الفاظ کا ترجمہ کرتی ہے۔\r\n               1', NULL, NULL),
(3, 1, 'New Study Shows Sputnik V Has 98% Efficacy In COVID-related Mortality', 'نئے مطالعہ سے پتہ چلتا ہے کہ Sputnik V کی COVID سے متعلقہ اموات میں 98% افادیت ہے۔', 'public/media/blog/1717785215882550.jpg', '<p><span style=\"color: rgb(51, 65, 85); font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 18px;\">A unique independent nationwide observational study in EU member state Hungary estimating and directly comparing efficacy of five vaccines against COVID has demonstrated that the Russian Sputnik V vaccine has the highest (98%) efficacy in preventing COVID-related mortality and 85.7% efficacy against coronavirus infection leading alongside the vaccine by Moderna.</span><br></p>', 'یورپی یونین کی رکن ریاست ہنگری میں ایک منفرد آزاد ملک گیر مشاہداتی مطالعہ جس میں کووِڈ کے خلاف پانچ ویکسین کی افادیت کا تخمینہ لگانے اور براہِ راست موازنہ کرنے سے یہ بات سامنے آئی ہے کہ روسی اسپوتنک وی ویکسین کووڈ سے متعلقہ اموات کو روکنے میں سب سے زیادہ (98%) افادیت اور 85.7% کورونا وائرس انفیکشن کے خلاف افادیت رکھتی ہے۔ موڈرنا کے ذریعہ ویکسین کے ساتھ ساتھ۔', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE `post_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name_ur` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`id`, `category_name_en`, `category_name_ur`, `created_at`, `updated_at`) VALUES
(1, 'project', 'پروجیکٹ', NULL, NULL),
(2, 'contact 1', 'رابطہ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_colour` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_slider` int(11) DEFAULT NULL,
  `hot_deal` int(11) DEFAULT NULL,
  `best_rated` int(11) DEFAULT NULL,
  `mid_slider` int(11) DEFAULT NULL,
  `hot_new` int(11) DEFAULT NULL,
  `trend` int(11) DEFAULT NULL,
  `image_one` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_two` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_three` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `brand_id`, `product_name`, `product_code`, `product_quantity`, `product_detail`, `product_colour`, `product_size`, `selling_price`, `discount_price`, `video_link`, `main_slider`, `hot_deal`, `best_rated`, `mid_slider`, `hot_new`, `trend`, `image_one`, `image_two`, `image_three`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 8, 'Man\'s shirt', 'xyz123', '15', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.<br></p>', 'purple', 'm,l,xl', '50', '40', 'https://youtu.be/-q5r4-nCfrM', 1, 1, 1, NULL, NULL, 1, 'public/media/product/1712421886543306.png', 'public/media/product/1712421888075962.png', 'public/media/product/1712704093794855.png', 1, NULL, NULL),
(2, 1, 1, 8, 'red shirt', 'xyz12345', '9', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.<br></p>', 'red', 'm,l', '50', '45', 'https://youtu.be/-q5r4-nCfrM', NULL, 1, 1, NULL, NULL, 1, 'public/media/product/1712422262616198.png', 'public/media/product/1712422262809582.png', 'public/media/product/1712422263042666.png', 1, NULL, NULL),
(3, 2, 4, 9, 'y shirt', 'y156783', '5', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.<br></p>', 'yellow', 'm,l,xl', '60', '50', 'https://youtu.be/-q5r4-nCfrM', 1, NULL, NULL, NULL, 1, 1, 'public/media/product/1712422447413137.jpeg', 'public/media/product/1712422447675851.jpeg', 'public/media/product/1712422447880751.jpeg', 1, NULL, NULL),
(4, 2, 4, 10, 'p Shirt', 'p29o04', '11', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.<br></p>', 'pink', 'm,l,xl', '30', '25', 'https://youtu.be/-q5r4-nCfrM', 1, 1, NULL, NULL, NULL, 1, 'public/media/product/1712422621049510.jpeg', 'public/media/product/1712422621260811.jpeg', 'public/media/product/1712422621460618.jpeg', 1, NULL, NULL),
(5, 2, 5, 10, 'Blue Shirt', 'blue145', '7', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.<br></p>', 'blue', 'm,l,xl', '10', '5', 'https://youtu.be/-q5r4-nCfrM', 1, NULL, NULL, NULL, 1, NULL, 'public/media/product/1712424828990458.jpeg', 'public/media/product/1712424829211831.jpeg', 'public/media/product/1712424829368731.jpeg', 1, NULL, NULL),
(6, 2, 5, 8, 'Black shirt', 'bl857', '14', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.<br></p>', 'black', 'm,l,xl', '15', '10', 'https://youtu.be/-q5r4-nCfrM', NULL, NULL, 1, NULL, 1, NULL, 'public/media/product/1712425297073613.jpeg', 'public/media/product/1712425297284340.jpeg', 'public/media/product/1712425297527156.jpeg', 1, NULL, NULL),
(7, 3, 7, 10, 'Baby shirt', 'bl857', '11', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.<br></p>', 'pink', 's', '9', '8', 'https://youtu.be/-q5r4-nCfrM', NULL, 1, NULL, NULL, 1, 1, 'public/media/product/1712425451145387.png', 'public/media/product/1712425451326631.png', 'public/media/product/1712425451484126.png', 1, NULL, NULL),
(8, 4, 10, 9, 'Black Watch', 'wa245', '10', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.<br></p>', 'black', 'm,l,xl', '150', '135', 'https://youtu.be/-q5r4-nCfrM', NULL, 1, NULL, NULL, 1, 1, 'public/media/product/1712426674318112.jpeg', 'public/media/product/1712426674432734.jpeg', 'public/media/product/1712426674519250.jpeg', 1, NULL, NULL),
(10, 4, 12, 8, 'ice watch', 'ice4116', '5', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.<br></p>', 'ice', 'm,l', '100', '95', 'https://youtu.be/-q5r4-nCfrM', 1, NULL, 1, NULL, NULL, 1, 'public/media/product/1712428077853595.jpeg', 'public/media/product/1712428077970713.jpeg', 'public/media/product/1712428078071369.jpeg', 1, NULL, NULL),
(11, 4, 10, 8, 'dark watch', 'dark567', '10', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.<br></p>', 'black', 'm,l,xl', '90', '80', 'https://youtu.be/-q5r4-nCfrM', NULL, NULL, 1, NULL, NULL, NULL, 'public/media/product/1712428568086056.jpeg', 'public/media/product/1712428568205827.jpeg', 'public/media/product/1712428568314857.jpeg', 1, NULL, NULL),
(12, 6, 20, 8, 'oppo', 'opo123', '15', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.<br></p>', 'red', 'pro', '500', '450', 'https://youtu.be/-q5r4-nCfrM', NULL, 1, NULL, NULL, NULL, 1, 'public/media/product/1712429162585365.jpeg', 'public/media/product/1712429162671547.jpeg', 'public/media/product/1712429162746960.jpeg', 1, NULL, NULL),
(13, 1, 21, 8, 'Man\'s  shoe', 'shoo000', '15', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.<br></p>', 'black', 'm,l,xl', '50', '10', 'https://youtu.be/-q5r4-nCfrM', NULL, 1, 1, 1, 1, 1, 'public/media/product/1712432643068986.jpeg', 'public/media/product/1712432643150806.jpeg', 'public/media/product/1712432643228857.jpeg', 1, NULL, NULL),
(14, 1, 21, 8, 'Man\'s  brown shoe', 'bs345', '15', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.<br></p>', 'brown', 'm,l,xl', '50', '10', 'https://youtu.be/-q5r4-nCfrM', 1, 1, 1, 1, 1, 1, 'public/media/product/1712432760094437.jpeg', 'public/media/product/1712432760240882.jpeg', 'public/media/product/1712432760308157.jpeg', 1, NULL, NULL),
(15, 1, 21, 9, 'black sneaker', 'shoe1223', '8', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.<br></p>', 'black', '41,42,43', '200', '170', 'https://youtu.be/-q5r4-nCfrM', NULL, 1, NULL, NULL, 1, 1, 'public/media/product/1712432953384812.jpeg', 'public/media/product/1712432953479083.jpeg', 'public/media/product/1712432953550397.jpeg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shopname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adderss` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `vat`, `shipping_charge`, `shopname`, `phone`, `adderss`, `email`, `logo`, `created_at`, `updated_at`) VALUES
(1, '3', '5', 'janunn', '0300 77777777', 'bwp', 'bwp$gmail.com', 'xcv', '2021-11-16 17:30:30', '2021-11-16 17:30:30');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`id`, `order_id`, `ship_name`, `ship_phone`, `ship_email`, `ship_address`, `ship_city`, `created_at`, `updated_at`) VALUES
(1, '1', 'Muhammad Taha', '03097672118', 'admin@gmail.com', 'Muhammad Taha', 'bwp', NULL, NULL),
(2, '2', 'Muhammad Taha', '03097672118', 'admin@gmail.com', 'Muhammad Taha', 'ape', NULL, NULL),
(3, '3', 'Muhammad Taha', '03097672118', 'taha@gmail.com', 'Muhammad Taha', 'KK', NULL, NULL),
(4, '4', 'Taha', '03097672118', 'taha1@gmail.com', 'Muhammad Taha', 'LH ', NULL, NULL),
(5, '5', 'Taha', '03097672118', 'taha1@gmail.com', 'Muhammad Taha', 'RP', NULL, NULL),
(6, '6', 'mohid', '111111111', 'mohid@gmail.com', '118', 'bwp', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `subcategory_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Gents Tshirt', NULL, NULL),
(2, 1, 'Gents Shirt', NULL, NULL),
(3, 1, 'Gents Pant', NULL, NULL),
(4, 2, 'Womens Tshirt', NULL, NULL),
(5, 2, 'Womens Shirt', NULL, NULL),
(6, 2, 'Womens Pant', NULL, NULL),
(7, 3, 'Child Dress & Footware', NULL, NULL),
(8, 3, 'Child Body Care', NULL, NULL),
(9, 3, 'Child Diaper', NULL, NULL),
(10, 4, 'Gents Watch', NULL, NULL),
(11, 4, 'Womans Watch', NULL, NULL),
(12, 4, 'Kids Watch', NULL, NULL),
(13, 8, 'Body Spray', NULL, NULL),
(14, 8, 'Finger Ring', NULL, NULL),
(15, 8, 'Jewelry', NULL, NULL),
(16, 10, 'Appliances', NULL, NULL),
(17, 10, 'Room Decoration', NULL, NULL),
(18, 10, 'Light and Lamp', NULL, NULL),
(19, 10, 'Security', NULL, NULL),
(20, 6, 'Mobile', NULL, NULL),
(21, 1, 'Gents Shoes', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(222) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `avatar`, `provider`, `provider_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ariyan', '1234567', 'ariyan@gmail.com', NULL, NULL, NULL, NULL, '$2y$12$dMY5vrhg4kz.iP5sr.pH3uV.VlPhgEP30QR1PHY8s0F8vMXGyOvwq', NULL, '2019-10-04 23:27:57', '2019-10-04 23:27:57'),
(2, 'udemy', '12456777', 'udemy@gmail.com', NULL, NULL, NULL, NULL, '$2y$12$dMY5vrhg4kz.iP5sr.pH3uV.VlPhgEP30QR1PHY8s0F8vMXGyOvwq', NULL, '2019-10-05 04:47:42', '2019-10-05 04:47:42'),
(3, 'tahatk', '03097672118', 'taha@gmail.com', NULL, NULL, NULL, '2021-10-15 06:05:33', '$2y$10$VSSnMx66F70Ee6fiV0wF1OylxTUh4cJ2PnOwPbMt1iSLJesXSGnya', NULL, '2021-10-15 05:54:43', '2021-10-16 05:19:59'),
(4, 'MUHAMMAD TAHA', '+92 3097672118', 'taha1@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$iyKlGOME5zWAhquoddg43.utN7Heh/FK6o7NjHBn2vSfRu8GLYNX2', NULL, '2021-10-16 07:40:24', '2021-10-16 07:47:17'),
(5, 'Muhammad Taha', NULL, 'tahaverified@gmail.com', NULL, 'google', '111440506306964584251', NULL, NULL, NULL, '2022-02-23 13:10:44', '2022-02-23 13:10:44');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 4, 6, NULL, NULL),
(2, 4, 13, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

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
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newslaters`
--
ALTER TABLE `newslaters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_details`
--
ALTER TABLE `orders_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `newslaters`
--
ALTER TABLE `newslaters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders_details`
--
ALTER TABLE `orders_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `post_category`
--
ALTER TABLE `post_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
