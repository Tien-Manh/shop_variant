-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 15, 2022 lúc 11:45 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shops`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `type`, `created_at`, `updated_at`) VALUES
(1, 'color', 'filters', '2022-05-19 07:22:15', '2022-05-19 07:22:15'),
(2, 'size', 'filters', '2022-05-19 07:22:37', '2022-05-19 07:22:37'),
(3, 'width', 'filters', '2022-05-19 07:22:43', '2022-05-19 07:22:43'),
(4, 'height', 'filters', '2022-05-19 07:22:49', '2022-05-19 07:22:49'),
(5, 'length', 'filters', '2022-05-19 13:25:08', '2022-05-19 13:25:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attribute_values`
--

CREATE TABLE `attribute_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `attribute_values`
--

INSERT INTO `attribute_values` (`id`, `attribute_id`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 'dark blue', '2022-05-19 07:27:57', '2022-05-19 07:27:57'),
(2, 1, 'green', '2022-05-19 07:28:21', '2022-05-19 07:28:21'),
(3, 1, 'black', '2022-05-19 07:28:30', '2022-05-19 07:28:30'),
(4, 1, 'black smoke', '2022-05-19 07:28:45', '2022-05-19 07:28:45'),
(5, 2, '2XL', '2022-05-19 07:30:43', '2022-05-19 07:30:43'),
(6, 2, 'XL', '2022-05-19 07:33:38', '2022-05-19 07:33:38'),
(7, 2, 'L', '2022-05-19 07:34:06', '2022-05-19 07:34:06'),
(8, 2, 'M', '2022-05-19 07:34:16', '2022-05-19 07:34:16'),
(9, 2, 'S', '2022-05-19 07:34:20', '2022-05-19 07:34:20'),
(10, 1, 'white', '2022-05-19 07:35:54', '2022-05-19 07:35:54'),
(11, 1, 'navy blue', '2022-05-19 07:36:07', '2022-05-19 07:36:07'),
(12, 1, 'brown', '2022-05-19 07:36:28', '2022-05-19 07:36:28'),
(13, 1, 'gray', '2022-05-19 07:36:32', '2022-05-19 07:36:32'),
(14, 1, 'yellow', '2022-05-19 07:36:52', '2022-05-19 07:36:52'),
(15, 1, 'pink', '2022-05-19 07:36:56', '2022-05-19 07:36:56'),
(16, 1, 'violet', '2022-05-19 07:37:07', '2022-05-19 07:37:07'),
(17, 1, 'orange', '2022-05-19 07:37:11', '2022-05-19 07:37:11'),
(18, 1, 'blue', '2022-05-19 07:49:53', '2022-05-19 07:49:53'),
(19, 1, 'red', '2022-05-19 11:22:35', '2022-05-19 11:22:35'),
(20, 5, '10', '2022-05-19 13:26:02', '2022-05-19 13:26:02'),
(21, 5, '12', '2022-05-19 13:26:06', '2022-05-19 13:26:06'),
(22, 5, '8', '2022-05-19 13:26:11', '2022-05-19 13:26:11'),
(23, 3, '4', '2022-05-19 13:26:21', '2022-05-19 13:26:21'),
(24, 3, '6', '2022-05-19 13:26:24', '2022-05-19 13:26:24'),
(25, 4, '8', '2022-05-19 13:45:52', '2022-05-19 13:45:52'),
(26, 3, '8', '2022-05-19 13:45:59', '2022-05-19 13:45:59'),
(27, 4, '6', '2022-05-19 14:07:03', '2022-05-19 14:07:03'),
(28, 4, '10', '2022-05-19 14:07:28', '2022-05-19 14:07:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banners`
--

INSERT INTO `banners` (`id`, `title`, `photo`, `url`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bộ sưu tập quần áo 2030', 'admin/banner/N0l19K6wrKSTCOyRo3JYiGlsgrC3CTyZQjsnfh4R.jpg', 'http://127.0.0.1:8000/shop/non-bucket-nu-thoi-trang-fioraio', '<h2><span class=\"hljs-attribute\">Fall</span> - Winter Collections <span class=\"hljs-number\">2030</span></h2><p><em style=\"color: rgb(102, 163, 224);\">A specialist label creating luxury essentials. Ethically crafted with an unwavering commitment to exceptional quality</em></p>', 1, '2022-05-19 14:53:54', '2022-05-21 03:10:40'),
(2, 'PHỤ KIỆN 2030', 'admin/banner/mSAjhEUbeoq4AjfAKqcshvCVGg18HBOPVkkTl9vd.jpg', NULL, '<p><br></p>', 1, '2022-05-19 14:54:45', '2022-05-19 14:54:45'),
(3, NULL, 'admin/banner/DFGmnEFi5TJQsQAbaxYhEYDuL8IMOHePLsiNM4EZ.jpg', NULL, '<p><br></p>', 1, '2022-05-19 14:54:45', '2022-05-19 14:55:15'),
(4, NULL, 'admin/banner/ruuIUTAsql6sRCg57fyhGXz7rotwkZwiMYGyqR5F.jpg', NULL, '<p><br></p>', 1, '2022-05-19 14:55:30', '2022-05-19 14:55:30'),
(5, 'NEW FHASION 2030', 'admin/banner/KP1qJGpkN6TQOZXA0SdEjTvvFgHY3dyGomKQlWcp.jpg', NULL, '<p><br></p>', 1, '2022-05-19 14:57:38', '2022-05-19 14:59:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `logo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'GUCCI', 'gucci', 'admin/brands/Ps3HpGwu7HLg4SpbdObrPJAb9zKNtmNVs5WHVOAB.jpg', 1, '2022-05-19 07:45:00', '2022-05-19 07:45:00'),
(2, 'Dior', 'dior', 'admin/brands/Fvfy3K5VIpVjbjKdLHlq6pUN7ADl7GZ6kU7GVYxx.jpg', 1, '2022-05-19 07:45:11', '2022-05-19 07:45:11'),
(3, 'Chanel', 'chanel', 'admin/brands/DQ3sfu0txtKsqmG2ygG1ivMY9TYRc4oZa6gZlUPR.jpg', 1, '2022-05-19 07:45:26', '2022-05-19 07:45:26'),
(4, 'LV', 'lv', 'admin/brands/IMWcm5ZTQC03eXLCVqAK2DGE3FHOEsmMO1xPsRZz.jpg', 1, '2022-05-19 07:45:39', '2022-05-19 07:45:39'),
(5, 'D&G', 'dg', 'admin/brands/8OPd2j76ntI7EX32zog5LdNgqgSN5A6pC37U2fJX.jpg', 1, '2022-05-19 07:45:57', '2022-05-19 07:45:57'),
(6, 'Adidas', 'adidas', 'admin/brands/PWlnNT1MlJB9rT1PtO0MQf1J6huO2e1ubEczWNWg.jpg', 1, '2022-05-19 07:46:31', '2022-05-19 07:46:31'),
(7, 'Levis', 'levis', 'admin/brands/5Tm4hM6eLozDJiT0mvKioOqF1IR3yAmftDHi0zun.jpg', 1, '2022-05-19 07:46:41', '2022-05-19 07:46:41'),
(8, 'Nike', 'nike', 'admin/brands/seCtNU1XYMLAb7E44BLk8Sg2mXO6VrRYBpRa7amc.jpg', 1, '2022-05-19 07:47:02', '2022-05-19 07:47:02'),
(9, 'Puma', 'puma', 'admin/brands/h9qbgrX8hxNmH6Gg5PlTTIoCpd1eYncZnDHASKfx.jpg', 1, '2022-05-19 07:47:09', '2022-05-19 07:47:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cates`
--

CREATE TABLE `cates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_by` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cates`
--

INSERT INTO `cates` (`id`, `title`, `slug`, `photo`, `type`, `order_by`, `parent_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Đồ nữ', 'do-nu', 'admin/cates/4azXrpqAVpA0RXdrLdFEt8Z7Osa71HxZvDwHrvdw.jpg', 'cate product', NULL, 0, 1, '2022-05-19 06:52:12', '2022-05-19 06:52:12'),
(2, 'Đồ nam', 'do-nam', 'admin/cates/5VsPNZI8nZ6ISjqxCJqZSVjGyZJBWP8fQ0RU88yS.jpg', 'cate product', NULL, 0, 1, '2022-05-19 06:52:31', '2022-05-19 06:52:31'),
(3, 'Phụ kiện', 'phu-kien', 'admin/cates/ZcmNMJXFUs9s4EbNs1FcMmqJChQLXJtnHXYsN4Xy.jpg', 'cate product', NULL, 0, 1, '2022-05-19 06:53:00', '2022-05-19 06:53:00'),
(4, 'Áo thun nữ', 'ao-thun-nu', '', 'cate product', NULL, 1, 1, '2022-05-19 06:54:10', '2022-05-19 06:54:10'),
(5, 'áo thun tay ngắn', 'ao-thun-tay-ngan', '', 'cate product', NULL, 4, 1, '2022-05-19 06:54:52', '2022-05-19 06:54:52'),
(6, 'áo thun tay dài', 'ao-thun-tay-dai', '', 'cate product', NULL, 4, 1, '2022-05-19 06:54:59', '2022-05-19 06:54:59'),
(7, 'áo sơ mi nữ', 'ao-so-mi-nu', '', 'cate product', NULL, 1, 1, '2022-05-19 06:55:17', '2022-05-19 06:55:17'),
(8, 'Quần short nữ', 'quan-short-nu', '', 'cate product', NULL, 1, 1, '2022-05-19 06:55:59', '2022-05-19 06:55:59'),
(9, 'quần kaki', 'quan-kaki', '', 'cate product', NULL, 8, 1, '2022-05-19 06:56:33', '2022-05-19 06:56:33'),
(10, 'quần jean', 'quan-jean', '', 'cate product', NULL, 8, 1, '2022-05-19 06:56:48', '2022-05-19 06:56:48'),
(11, 'chân váy', 'chan-vay', '', 'cate product', NULL, 1, 1, '2022-05-19 06:57:19', '2022-05-19 06:57:19'),
(12, 'Đầm', 'dam', '', 'cate product', NULL, 1, 1, '2022-05-19 06:57:49', '2022-05-19 06:57:49'),
(13, 'Áo thun nam', 'ao-thun-nam', '', 'cate product', NULL, 2, 1, '2022-05-19 06:58:17', '2022-05-19 06:58:17'),
(14, 'Áo sơ mi nam', 'ao-so-mi-nam', '', 'cate product', NULL, 2, 1, '2022-05-19 06:58:33', '2022-05-19 06:58:33'),
(15, 'Quần short nam', 'quan-short-nam', '', 'cate product', NULL, 2, 1, '2022-05-19 06:58:43', '2022-05-19 06:58:43'),
(16, 'Quần dài nam', 'quan-dai-nam', '', 'cate product', NULL, 2, 1, '2022-05-19 06:59:17', '2022-05-19 06:59:17'),
(17, 'Balo', 'balo', '', 'cate product', NULL, 3, 1, '2022-05-19 07:01:19', '2022-05-19 07:01:19'),
(18, 'Túi sách', 'tui-sach', '', 'cate product', NULL, 3, 1, '2022-05-19 07:01:31', '2022-05-19 07:01:31'),
(19, 'Nón', 'non', '', 'cate product', NULL, 3, 1, '2022-05-19 07:01:37', '2022-05-19 07:01:37'),
(20, 'Kính', 'kinh', '', 'cate product', NULL, 3, 1, '2022-05-19 07:01:45', '2022-05-19 07:01:45'),
(21, 'Nón nam', 'non-nam', '', 'cate product', NULL, 19, 1, '2022-05-19 07:02:29', '2022-05-19 07:02:29'),
(22, 'Nón nữ', 'non-nu', '', 'cate product', NULL, 19, 1, '2022-05-19 07:02:40', '2022-05-19 07:02:40'),
(23, 'Blong Thời Trang', 'blong-thoi-trang', 'admin/cates/3hpUcBu108o1ZGwrOU9Xk9BG55Nm3rzOvpYRWZif.jpg', 'cate post', NULL, 0, 1, '2022-05-19 14:42:18', '2022-05-19 14:42:18'),
(24, 'Totoro', 'totoro', 'admin/cates/vbs4BMW6f7MTFnkUZM3aKQ0FUfBNHbyIS7JCh68q.jpg', 'cate footer', NULL, 0, 1, '2022-05-24 11:00:49', '2022-05-24 11:00:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 9, 'ứng dụng trên thiết bị di động cho hệ điều hành', '2022-05-25 14:03:18', '2022-05-25 14:03:18'),
(2, 11, 9, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an', '2022-05-25 14:25:55', '2022-05-25 14:25:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_coupon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_code` int(11) DEFAULT NULL,
  `price_value` double NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `total_order_min` double DEFAULT NULL,
  `price_order_max` double DEFAULT NULL,
  `date_start` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `type_coupon`, `name`, `description`, `amount_code`, `price_value`, `type`, `status`, `total_order_min`, `price_order_max`, `date_start`, `date_end`, `created_at`, `updated_at`) VALUES
(1, NULL, 'categories', 'thang 5', NULL, NULL, 20, 'percent price', 1, NULL, NULL, '2022-05-20 00:00:00', '2022-05-25 00:00:00', '2022-05-20 07:39:07', '2022-05-20 07:39:07'),
(2, 'RTX-RGW29-XFE55-2133M', 'total order', 'sale order', NULL, 11, 95, 'percent price', 1, 10000, NULL, '2022-05-21 00:00:00', NULL, '2022-05-22 04:19:00', '2022-05-23 15:48:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `item_coupons`
--

CREATE TABLE `item_coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `cate_id` int(11) DEFAULT NULL,
  `coupon_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `item_coupons`
--

INSERT INTO `item_coupons` (`id`, `item_id`, `cate_id`, `coupon_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 7, 1, '2022-05-20 07:39:07', '2022-05-20 07:39:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `modify` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `logs`
--

INSERT INTO `logs` (`id`, `user_name`, `email`, `role`, `modify`, `date`, `created_at`, `updated_at`) VALUES
(1, 'Thad Cartwright', 'clonebabi0@gmail.com', 0, 'Update Accounts ID: 1', '2022-05-19 13:41:34', '2022-05-19 06:41:34', '2022-05-19 06:41:34'),
(2, 'losis_1', 'clonebabi0@gmail.com', 0, 'Update Accounts ID: 2', '2022-05-19 13:42:50', '2022-05-19 06:42:50', '2022-05-19 06:42:50'),
(3, 'losis_1', 'clonebabi0@gmail.com', 0, 'Update Accounts ID: 2', '2022-05-19 13:43:00', '2022-05-19 06:43:00', '2022-05-19 06:43:00'),
(4, 'losis_1', 'clonebabi0@gmail.com', 0, 'Update Accounts ID: 3', '2022-05-19 13:43:50', '2022-05-19 06:43:50', '2022-05-19 06:43:50'),
(5, 'losis_1', 'clonebabi0@gmail.com', 0, 'Update Accounts ID: 4', '2022-05-19 13:44:16', '2022-05-19 06:44:16', '2022-05-19 06:44:16'),
(6, 'losis_1', 'clonebabi0@gmail.com', 0, 'Update Accounts ID: 1', '2022-05-19 13:44:42', '2022-05-19 06:44:42', '2022-05-19 06:44:42'),
(7, 'losis_1', 'clonebabi0@gmail.com', 0, 'Update Accounts ID: 9', '2022-05-19 13:44:59', '2022-05-19 06:44:59', '2022-05-19 06:44:59'),
(8, 'losis_1', 'clonebabi0@gmail.com', 0, 'Update Accounts ID: 10', '2022-05-19 13:45:06', '2022-05-19 06:45:06', '2022-05-19 06:45:06'),
(9, 'losis_1', 'clonebabi0@gmail.com', 0, 'Update Accounts ID: 8', '2022-05-19 13:45:15', '2022-05-19 06:45:15', '2022-05-19 06:45:15'),
(10, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Cates ID: 1', '2022-05-19 13:52:12', '2022-05-19 06:52:12', '2022-05-19 06:52:12'),
(11, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Cates ID: 2', '2022-05-19 13:52:31', '2022-05-19 06:52:31', '2022-05-19 06:52:31'),
(12, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Cates ID: 3', '2022-05-19 13:53:00', '2022-05-19 06:53:00', '2022-05-19 06:53:00'),
(13, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Cates ID: 4', '2022-05-19 13:54:10', '2022-05-19 06:54:10', '2022-05-19 06:54:10'),
(14, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Cates ID: 5', '2022-05-19 13:54:52', '2022-05-19 06:54:52', '2022-05-19 06:54:52'),
(15, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Cates ID: 6', '2022-05-19 13:54:59', '2022-05-19 06:54:59', '2022-05-19 06:54:59'),
(16, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Cates ID: 7', '2022-05-19 13:55:17', '2022-05-19 06:55:17', '2022-05-19 06:55:17'),
(17, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Cates ID: 8', '2022-05-19 13:55:59', '2022-05-19 06:55:59', '2022-05-19 06:55:59'),
(18, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Cates ID: 9', '2022-05-19 13:56:33', '2022-05-19 06:56:33', '2022-05-19 06:56:33'),
(19, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Cates ID: 10', '2022-05-19 13:56:48', '2022-05-19 06:56:48', '2022-05-19 06:56:48'),
(20, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Cates ID: 11', '2022-05-19 13:57:19', '2022-05-19 06:57:19', '2022-05-19 06:57:19'),
(21, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Cates ID: 12', '2022-05-19 13:57:49', '2022-05-19 06:57:49', '2022-05-19 06:57:49'),
(22, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Cates ID: 13', '2022-05-19 13:58:17', '2022-05-19 06:58:17', '2022-05-19 06:58:17'),
(23, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Cates ID: 14', '2022-05-19 13:58:33', '2022-05-19 06:58:33', '2022-05-19 06:58:33'),
(24, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Cates ID: 15', '2022-05-19 13:58:43', '2022-05-19 06:58:43', '2022-05-19 06:58:43'),
(25, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Cates ID: 16', '2022-05-19 13:59:17', '2022-05-19 06:59:17', '2022-05-19 06:59:17'),
(26, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Cates ID: 17', '2022-05-19 14:01:19', '2022-05-19 07:01:19', '2022-05-19 07:01:19'),
(27, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Cates ID: 18', '2022-05-19 14:01:31', '2022-05-19 07:01:31', '2022-05-19 07:01:31'),
(28, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Cates ID: 19', '2022-05-19 14:01:37', '2022-05-19 07:01:37', '2022-05-19 07:01:37'),
(29, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Cates ID: 20', '2022-05-19 14:01:45', '2022-05-19 07:01:45', '2022-05-19 07:01:45'),
(30, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Cates ID: 21', '2022-05-19 14:02:29', '2022-05-19 07:02:29', '2022-05-19 07:02:29'),
(31, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Cates ID: 22', '2022-05-19 14:02:40', '2022-05-19 07:02:40', '2022-05-19 07:02:40'),
(32, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Products ID: 1', '2022-05-19 15:09:55', '2022-05-19 08:09:55', '2022-05-19 08:09:55'),
(33, 'losis_1', 'clonebabi0@gmail.com', 0, 'Update Products ID: 1', '2022-05-19 15:37:34', '2022-05-19 08:37:34', '2022-05-19 08:37:34'),
(34, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Products ID: 2', '2022-05-19 16:05:28', '2022-05-19 09:05:28', '2022-05-19 09:05:28'),
(35, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Products ID: 3', '2022-05-19 16:11:05', '2022-05-19 09:11:05', '2022-05-19 09:11:05'),
(36, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Products ID: 4', '2022-05-19 16:15:41', '2022-05-19 09:15:41', '2022-05-19 09:15:41'),
(37, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Products ID: 5', '2022-05-19 16:18:36', '2022-05-19 09:18:36', '2022-05-19 09:18:36'),
(38, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Products ID: 6', '2022-05-19 16:21:55', '2022-05-19 09:21:55', '2022-05-19 09:21:55'),
(39, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Products ID: 7', '2022-05-19 16:23:33', '2022-05-19 09:23:33', '2022-05-19 09:23:33'),
(40, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Products ID: 8', '2022-05-19 16:24:49', '2022-05-19 09:24:49', '2022-05-19 09:24:49'),
(41, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Products ID: 9', '2022-05-19 16:28:03', '2022-05-19 09:28:03', '2022-05-19 09:28:03'),
(42, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Products ID: 10', '2022-05-19 16:30:24', '2022-05-19 09:30:24', '2022-05-19 09:30:24'),
(43, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Products ID: 11', '2022-05-19 16:34:58', '2022-05-19 09:34:58', '2022-05-19 09:34:58'),
(44, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Products ID: 12', '2022-05-19 16:54:22', '2022-05-19 09:54:22', '2022-05-19 09:54:22'),
(45, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Products ID: 13', '2022-05-19 17:43:38', '2022-05-19 10:43:38', '2022-05-19 10:43:38'),
(46, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Products ID: 14', '2022-05-19 17:46:55', '2022-05-19 10:46:55', '2022-05-19 10:46:55'),
(47, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Products ID: 15', '2022-05-19 17:49:24', '2022-05-19 10:49:24', '2022-05-19 10:49:24'),
(48, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Products ID: 16', '2022-05-19 17:55:42', '2022-05-19 10:55:42', '2022-05-19 10:55:42'),
(49, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Products ID: 17', '2022-05-19 18:01:31', '2022-05-19 11:01:31', '2022-05-19 11:01:31'),
(50, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Products ID: 18', '2022-05-19 18:03:49', '2022-05-19 11:03:49', '2022-05-19 11:03:49'),
(51, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Products ID: 19', '2022-05-19 18:07:08', '2022-05-19 11:07:08', '2022-05-19 11:07:08'),
(52, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Products ID: 20', '2022-05-19 18:09:35', '2022-05-19 11:09:35', '2022-05-19 11:09:35'),
(53, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Products ID: 21', '2022-05-19 18:12:23', '2022-05-19 11:12:23', '2022-05-19 11:12:23'),
(54, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Products ID: 22', '2022-05-19 18:16:06', '2022-05-19 11:16:06', '2022-05-19 11:16:06'),
(55, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Products ID: 23', '2022-05-19 18:18:21', '2022-05-19 11:18:21', '2022-05-19 11:18:21'),
(56, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Products ID: 24', '2022-05-19 18:22:58', '2022-05-19 11:22:58', '2022-05-19 11:22:58'),
(57, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Products ID: 25', '2022-05-19 18:25:41', '2022-05-19 11:25:41', '2022-05-19 11:25:41'),
(58, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Products ID: 26', '2022-05-19 21:13:18', '2022-05-19 14:13:18', '2022-05-19 14:13:18'),
(59, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Products ID: 27', '2022-05-19 21:16:01', '2022-05-19 14:16:01', '2022-05-19 14:16:01'),
(60, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Products ID: 28', '2022-05-19 21:18:35', '2022-05-19 14:18:35', '2022-05-19 14:18:35'),
(61, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Products ID: 29', '2022-05-19 21:25:13', '2022-05-19 14:25:13', '2022-05-19 14:25:13'),
(62, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Products ID: 30', '2022-05-19 21:27:21', '2022-05-19 14:27:21', '2022-05-19 14:27:21'),
(63, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Products ID: 31', '2022-05-19 21:29:51', '2022-05-19 14:29:51', '2022-05-19 14:29:51'),
(64, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Products ID: 32', '2022-05-19 21:32:34', '2022-05-19 14:32:34', '2022-05-19 14:32:34'),
(65, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Products ID: 33', '2022-05-19 21:34:39', '2022-05-19 14:34:39', '2022-05-19 14:34:39'),
(66, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Products ID: 34', '2022-05-19 21:37:37', '2022-05-19 14:37:37', '2022-05-19 14:37:37'),
(67, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Cates ID: 23', '2022-05-19 21:42:18', '2022-05-19 14:42:18', '2022-05-19 14:42:18'),
(68, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Posts ID: 1', '2022-05-19 21:43:50', '2022-05-19 14:43:50', '2022-05-19 14:43:50'),
(69, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Posts ID: 2', '2022-05-19 21:44:38', '2022-05-19 14:44:38', '2022-05-19 14:44:38'),
(70, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Posts ID: 3', '2022-05-19 21:45:49', '2022-05-19 14:45:49', '2022-05-19 14:45:49'),
(71, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Posts ID: 4', '2022-05-19 21:46:50', '2022-05-19 14:46:50', '2022-05-19 14:46:50'),
(72, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Posts ID: 5', '2022-05-19 21:47:26', '2022-05-19 14:47:26', '2022-05-19 14:47:26'),
(73, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Posts ID: 6', '2022-05-19 21:48:08', '2022-05-19 14:48:08', '2022-05-19 14:48:08'),
(74, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Posts ID: 7', '2022-05-19 21:48:47', '2022-05-19 14:48:47', '2022-05-19 14:48:47'),
(75, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Posts ID: 8', '2022-05-19 21:49:24', '2022-05-19 14:49:24', '2022-05-19 14:49:24'),
(76, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Posts ID: 9', '2022-05-19 21:50:05', '2022-05-19 14:50:05', '2022-05-19 14:50:05'),
(77, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Posts ID: 10', '2022-05-19 21:50:54', '2022-05-19 14:50:54', '2022-05-19 14:50:54'),
(78, 'losis_1', 'clonebabi0@gmail.com', 0, 'Update Products ID: 27', '2022-05-20 03:54:09', '2022-05-19 20:54:09', '2022-05-19 20:54:09'),
(79, 'losis_1', 'clonebabi0@gmail.com', 0, 'Update Products ID: 27', '2022-05-20 03:57:22', '2022-05-19 20:57:22', '2022-05-19 20:57:22'),
(80, 'losis_1', 'clonebabi0@gmail.com', 0, 'Update Products ID: 27', '2022-05-20 03:59:37', '2022-05-19 20:59:37', '2022-05-19 20:59:37'),
(81, 'losis_1', 'clonebabi0@gmail.com', 0, 'Update Products ID: 27', '2022-05-20 09:41:42', '2022-05-20 02:41:42', '2022-05-20 02:41:42'),
(82, 'losis_1', 'clonebabi0@gmail.com', 0, 'Update Products ID: 27', '2022-05-20 09:47:55', '2022-05-20 02:47:55', '2022-05-20 02:47:55'),
(83, 'losis_1', 'clonebabi0@gmail.com', 0, 'Update Products ID: 27', '2022-05-20 09:49:15', '2022-05-20 02:49:15', '2022-05-20 02:49:15'),
(84, 'losis_1', 'clonebabi0@gmail.com', 0, 'Update Products ID: 27', '2022-05-20 09:49:53', '2022-05-20 02:49:53', '2022-05-20 02:49:53'),
(85, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Counpons ID: 1', '2022-05-20 14:39:07', '2022-05-20 07:39:07', '2022-05-20 07:39:07'),
(86, 'losis_1', 'clonebabi0@gmail.com', 0, 'Update Products ID: 5', '2022-05-20 22:37:21', '2022-05-20 15:37:21', '2022-05-20 15:37:21'),
(87, 'losis_1', 'clonebabi0@gmail.com', 0, 'Update Products ID: 4', '2022-05-20 23:15:16', '2022-05-20 16:15:16', '2022-05-20 16:15:16'),
(88, 'losis_1', 'clonebabi0@gmail.com', 0, 'Update Products ID: 4', '2022-05-21 00:55:37', '2022-05-20 17:55:37', '2022-05-20 17:55:37'),
(89, 'losis_1', 'clonebabi0@gmail.com', 0, 'Update Products ID: 34', '2022-05-21 00:56:14', '2022-05-20 17:56:14', '2022-05-20 17:56:14'),
(90, 'losis_1', 'clonebabi0@gmail.com', 0, 'Update Products ID: 12', '2022-05-21 00:57:53', '2022-05-20 17:57:53', '2022-05-20 17:57:53'),
(91, 'losis_1', 'clonebabi0@gmail.com', 0, 'Update Products ID: 34', '2022-05-21 01:03:14', '2022-05-20 18:03:14', '2022-05-20 18:03:14'),
(92, 'losis_1', 'clonebabi0@gmail.com', 0, 'Update Products ID: 21', '2022-05-21 21:31:20', '2022-05-21 14:31:20', '2022-05-21 14:31:20'),
(93, 'losis_1', 'clonebabi0@gmail.com', 0, 'Update Products ID: 22', '2022-05-22 00:40:27', '2022-05-21 17:40:27', '2022-05-21 17:40:27'),
(94, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Counpons ID: 2', '2022-05-22 11:19:00', '2022-05-22 04:19:00', '2022-05-22 04:19:00'),
(95, 'losis_1', 'clonebabi0@gmail.com', 0, 'Update Counpons ID: 2', '2022-05-22 12:40:42', '2022-05-22 05:40:42', '2022-05-22 05:40:42'),
(96, 'losis_1', 'clonebabi0@gmail.com', 0, 'Update Counpons ID: 2', '2022-05-22 12:41:01', '2022-05-22 05:41:01', '2022-05-22 05:41:01'),
(97, 'losis_1', 'clonebabi0@gmail.com', 0, 'Update Counpons ID: 2', '2022-05-22 12:41:13', '2022-05-22 05:41:13', '2022-05-22 05:41:13'),
(98, 'losis_1', 'clonebabi0@gmail.com', 0, 'Update Counpons ID: 2', '2022-05-22 12:41:22', '2022-05-22 05:41:22', '2022-05-22 05:41:22'),
(99, 'losis_1', 'clonebabi0@gmail.com', 0, 'Update Counpons ID: 2', '2022-05-22 12:41:31', '2022-05-22 05:41:31', '2022-05-22 05:41:31'),
(100, 'losis_1', 'clonebabi0@gmail.com', 0, 'Update Accounts ID: 10', '2022-05-22 16:29:50', '2022-05-22 09:29:50', '2022-05-22 09:29:50'),
(101, 'losis_1', 'clonebabi0@gmail.com', 0, 'Update Accounts ID: 11', '2022-05-22 23:27:12', '2022-05-22 16:27:12', '2022-05-22 16:27:12'),
(102, 'losis_1', 'clonebabi0@gmail.com', 0, 'Update Accounts ID: 11', '2022-05-22 23:27:14', '2022-05-22 16:27:14', '2022-05-22 16:27:14'),
(103, 'losis_1', 'clonebabi0@gmail.com', 0, 'Update Accounts ID: 11', '2022-05-22 23:27:38', '2022-05-22 16:27:38', '2022-05-22 16:27:38'),
(104, 'losis_1', 'clonebabi0@gmail.com', 0, 'Delete Orders ID: 3', '2022-05-23 19:29:12', '2022-05-23 12:29:12', '2022-05-23 12:29:12'),
(105, 'losis_1', 'clonebabi0@gmail.com', 0, 'Delete Orders ID: 4', '2022-05-23 19:29:14', '2022-05-23 12:29:14', '2022-05-23 12:29:14'),
(106, 'losis_1', 'clonebabi0@gmail.com', 0, 'Delete Orders ID: 5', '2022-05-23 19:29:17', '2022-05-23 12:29:17', '2022-05-23 12:29:17'),
(107, 'losis_1', 'clonebabi0@gmail.com', 0, 'Update Counpons ID: 2', '2022-05-23 22:48:12', '2022-05-23 15:48:12', '2022-05-23 15:48:12'),
(108, 'losis_1', 'clonebabi0@gmail.com', 0, 'Delete Orders ID: 1', '2022-05-23 23:28:07', '2022-05-23 16:28:07', '2022-05-23 16:28:07'),
(109, 'losis_1', 'clonebabi0@gmail.com', 0, 'Delete Orders ID: 2', '2022-05-23 23:28:09', '2022-05-23 16:28:09', '2022-05-23 16:28:09'),
(110, 'losis_1', 'clonebabi0@gmail.com', 0, 'Update Accounts ID: 11', '2022-05-24 04:24:56', '2022-05-23 21:24:56', '2022-05-23 21:24:56'),
(111, 'losis_1', 'clonebabi0@gmail.com', 0, 'Update Accounts ID: 11', '2022-05-24 10:02:14', '2022-05-24 03:02:14', '2022-05-24 03:02:14'),
(112, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Cates ID: 24', '2022-05-24 18:00:49', '2022-05-24 11:00:49', '2022-05-24 11:00:49'),
(113, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Posts ID: 11', '2022-05-24 18:30:43', '2022-05-24 11:30:43', '2022-05-24 11:30:43'),
(114, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Posts ID: 12', '2022-05-24 18:44:22', '2022-05-24 11:44:22', '2022-05-24 11:44:22'),
(115, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Posts ID: 13', '2022-05-24 18:44:42', '2022-05-24 11:44:42', '2022-05-24 11:44:42'),
(116, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Posts ID: 14', '2022-05-24 18:45:22', '2022-05-24 11:45:22', '2022-05-24 11:45:22'),
(117, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Posts ID: 15', '2022-05-24 18:46:24', '2022-05-24 11:46:24', '2022-05-24 11:46:24'),
(118, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Posts ID: 16', '2022-05-24 18:47:12', '2022-05-24 11:47:12', '2022-05-24 11:47:12'),
(119, 'losis_1', 'clonebabi0@gmail.com', 0, 'Add Posts ID: 17', '2022-05-24 18:47:40', '2022-05-24 11:47:40', '2022-05-24 11:47:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_12_21_121306_create_cates_table', 1),
(6, '2021_12_21_121912_create_products_table', 1),
(7, '2021_12_21_121931_create_posts_table', 1),
(8, '2021_12_21_122012_create_banners_table', 1),
(9, '2021_12_21_122035_create_settings_table', 1),
(10, '2021_12_22_031600_create_coupons_table', 1),
(11, '2021_12_22_031708_create_orders_table', 1),
(12, '2021_12_22_080953_create_attributes_table', 1),
(13, '2021_12_22_110608_create_attribute_values_table', 1),
(14, '2021_12_22_111824_create_products_detail_table', 1),
(15, '2021_12_22_115252_create_products_photo_table', 1),
(16, '2021_12_31_030242_create_product_attributes_table', 1),
(17, '2021_12_31_034949_create_post_cate_table', 1),
(18, '2021_12_31_035025_create_product_cate_table', 1),
(19, '2022_01_04_100705_create_prdetail_attvalue_table', 1),
(20, '2022_01_15_042256_create_order_details_table', 1),
(21, '2022_01_15_092140_create_user_ships_table', 1),
(22, '2022_01_28_232936_create_item_coupons_table', 1),
(23, '2022_05_15_220326_create_brands_table', 1),
(24, '2022_05_16_155245_create_logs_table', 1),
(25, '2022_05_25_203232_create_comments_table', 2),
(26, '2022_05_25_203349_create_wishlists_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `sub_total` double NOT NULL,
  `total` double NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_method` int(11) NOT NULL DEFAULT 0,
  `messages` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_to_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `order_code`, `user_id`, `customer_id`, `order_date`, `sub_total`, `total`, `payment_method`, `payment_id`, `status_method`, `messages`, `ship_to_address`, `payment_status`, `created_at`, `updated_at`) VALUES
(6, 'RTX-1653323422-127001', NULL, 11, '2022-05-23 23:30:22', 79350000, 3967500, 'cod', NULL, 0, 'nnotessss sdasdadsada', 'hang mai ha noi 255', 'unpaid', '2022-05-23 16:30:22', '2022-05-23 16:30:22'),
(7, 'RTX-1653324782-127001', 1, 11, '2022-05-23 23:53:02', 250000, 12500, 'paypal', '41G60926RD795005P', 2, NULL, 'hang mai ha noi 255', 'paid', '2022-05-23 16:53:02', '2022-05-24 04:50:48'),
(8, 'RTX-1653324954-127001', NULL, 11, '2022-05-23 23:55:54', 250000, 12500, 'paypal', '20283204V3634774U', 0, NULL, 'hang mai ha noi 255', 'paid', '2022-05-23 16:55:54', '2022-05-23 16:55:54'),
(9, 'RTX-1653325027-127001', 1, 11, '2022-05-23 23:57:07', 250000, 12500, 'paypal', '8LF755060Y690493U', 3, NULL, 'hang mai ha noi 255', 'paid', '2022-05-23 16:57:07', '2022-05-24 04:49:44'),
(10, 'RTX-1653326517-127001', NULL, 11, '2022-05-24 00:21:57', 200000, 10000, 'paypal', '8AS25168KU427883W', 0, NULL, 'hang mai ha noi 255', 'paid', '2022-05-23 17:21:57', '2022-05-23 17:21:57'),
(11, 'RTX-1653326708-127001', 1, 11, '2022-05-24 00:25:08', 250000, 12500, 'paypal', '22V788170U850250G', 1, NULL, 'hang mai ha noi 255', 'paid', '2022-05-23 17:25:08', '2022-05-24 04:48:54'),
(12, 'RTX-1653373654-127001', NULL, 11, '2022-05-24 13:27:34', 21000000, 21000000, 'cod', NULL, 0, NULL, 'hang mai ha noi 2556', 'unpaid', '2022-05-24 06:27:34', '2022-05-24 06:27:34'),
(13, 'RTX-1653374122-127001', NULL, 11, '2022-05-24 13:35:22', 21000000, 21000000, 'cod', NULL, 0, NULL, 'hang mai ha noi 2556', 'unpaid', '2022-05-24 06:35:22', '2022-05-24 06:35:22'),
(14, 'RTX-1653417623-127001', NULL, 1, '2022-05-25 01:40:23', 56890000, 56890000, 'cod', NULL, 0, NULL, NULL, 'unpaid', '2022-05-24 18:40:23', '2022-05-24 18:40:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sub_price` double NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `sub_price`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(21, 6, 19, 0, 350000, 1, '2022-05-23 16:30:22', '2022-05-23 16:30:22'),
(22, 6, 177, 21000000, 25000000, 3, '2022-05-23 16:30:22', '2022-05-23 16:30:22'),
(23, 6, 176, 16000000, 18000000, 1, '2022-05-23 16:30:22', '2022-05-23 16:30:22'),
(24, 7, 136, 0, 250000, 1, '2022-05-23 16:53:02', '2022-05-23 16:53:02'),
(25, 8, 136, 0, 250000, 1, '2022-05-23 16:55:54', '2022-05-23 16:55:54'),
(26, 9, 140, 0, 250000, 1, '2022-05-23 16:57:07', '2022-05-23 16:57:07'),
(27, 10, 157, 0, 200000, 1, '2022-05-23 17:21:57', '2022-05-23 17:21:57'),
(28, 11, 145, 0, 250000, 1, '2022-05-23 17:25:08', '2022-05-23 17:25:08'),
(29, 12, 177, 21000000, 25000000, 1, '2022-05-24 06:27:34', '2022-05-24 06:27:34'),
(30, 13, 177, 21000000, 25000000, 1, '2022-05-24 06:35:22', '2022-05-24 06:35:22'),
(31, 14, 178, 22000000, 25000000, 2, '2022-05-24 18:40:23', '2022-05-24 18:40:23'),
(32, 14, 171, 900000, 1000000, 1, '2022-05-24 18:40:23', '2022-05-24 18:40:23'),
(33, 14, 169, 750000, 800000, 1, '2022-05-24 18:40:23', '2022-05-24 18:40:23'),
(34, 14, 168, 750000, 800000, 1, '2022-05-24 18:40:23', '2022-05-24 18:40:23'),
(35, 14, 167, 700000, 800000, 1, '2022-05-24 18:40:23', '2022-05-24 18:40:23'),
(36, 14, 166, 1300000, 1500000, 2, '2022-05-24 18:40:23', '2022-05-24 18:40:23'),
(37, 14, 165, 1300000, 1500000, 1, '2022-05-24 18:40:23', '2022-05-24 18:40:23'),
(38, 14, 158, 0, 200000, 1, '2022-05-24 18:40:23', '2022-05-24 18:40:23'),
(39, 14, 159, 0, 200000, 1, '2022-05-24 18:40:23', '2022-05-24 18:40:23'),
(40, 14, 162, 0, 170000, 1, '2022-05-24 18:40:23', '2022-05-24 18:40:23'),
(41, 14, 161, 0, 170000, 1, '2022-05-24 18:40:23', '2022-05-24 18:40:23'),
(42, 14, 164, 0, 200000, 1, '2022-05-24 18:40:23', '2022-05-24 18:40:23'),
(43, 14, 163, 0, 200000, 1, '2022-05-24 18:40:23', '2022-05-24 18:40:23'),
(44, 14, 145, 0, 250000, 3, '2022-05-24 18:40:23', '2022-05-24 18:40:23'),
(45, 14, 148, 0, 250000, 4, '2022-05-24 18:40:23', '2022-05-24 18:40:23'),
(46, 14, 150, 0, 250000, 3, '2022-05-24 18:40:23', '2022-05-24 18:40:23'),
(47, 14, 140, 0, 250000, 4, '2022-05-24 18:40:23', '2022-05-24 18:40:23'),
(48, 14, 143, 0, 250000, 5, '2022-05-24 18:40:23', '2022-05-24 18:40:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('tienmanh02199@gmail.com', '0ba6fc3b46a91313b98a5b2d057559e0d5c9134e', '2022-05-23 21:37:53'),
('tienmanh021995@gmail.com', '1162c83ea5a82f0189c235868c7c0286cf22fe20', '2022-05-24 03:03:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `added_by` int(11) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `content`, `photo`, `status`, `added_by`, `views`, `created_at`, `updated_at`) VALUES
(1, '5 cách giúp quần áo bền màu trong thời tiết ngày hè', '5-cach-giup-quan-ao-ben-mau-trong-thoi-tiet-ngay-he', '<p class=\"ql-align-justify\">Ánh nắng gay gắt ngày hè là một trong những nguyên nhân khiến quần áo bị bạc màu, hư hỏng. Vậy làm sao để có thể khắc phục được tình trạng đó khi mùa hè đang đến gần.</p><p class=\"ql-align-justify\">Trong bài viết dưới đây, Zofal sẽ chia sẻ đến bạn cách khắc phục tình trạng quần áo bị bạc màu hư hỏng do thời tiết nắng gắt để giữ quần áo luôn bền đẹp. Cùng tìm hiểu nhé!</p><p class=\"ql-align-justify\"><img src=\"https://cdn.shortpixel.ai/spai2/w_981+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2022/04/z3366050877578_40574e804b6d069fb53ace63d3860106.jpg\" alt=\"bao quan quan ao\" height=\"533\" width=\"800\"></p><p><br></p><h2 class=\"ql-align-justify\"><strong>Nguyên nhân dẫn đến tình trạng bạc màu hư hỏng của quần áo</strong></h2><p class=\"ql-align-justify\">Các nguyên cứu đã chứng minh rằng việc phơi quần áo dưới ánh nắng mặt trời mang lại rất nhiều tác động tích cực. Bởi lẽ, các tia bức xạ từ mặt trời giúp khử các vi khuẩn trên quần áo đồng thời tăng cường mùi hương trên quần áo. Do đó, nhiều người rất thích phơi quần áo cũng như hong khô các vật dụng khác trong nhà. Cũng dễ hiểu việc phơi phần áo khi trời nắng gắt sẽ khiến quần áo khô nhanh hơn trong thời gian ngắn.&nbsp;</p><p class=\"ql-align-justify\"><img src=\"https://cdn.shortpixel.ai/spai2/w_981+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2022/04/Chao-dao-voi-5-sac-mau-rang-ro-don-he-03042022-3.jpg\" alt=\"đầm sát nách đỏ\" height=\"600\" width=\"800\"></p><p class=\"ql-align-justify\">Tuy nhiên, bên cạnh những ưu điểm của ánh nắng gay gắt lại tạo nên tác động ngược lại. Việc phơi quần áo trước tác động trực tiếp của mặt trời sẽ khiến quần áo dễ bị khô ráp và sần sùi, gây ra các nguy cơ tổn thương cho da, đặc biệt với làn da nhạy cảm của trẻ nhỏ.</p><p class=\"ql-align-justify\">Ngoài ra, cho dù bạn có dùng sản phẩm nước giặt xả thơm tho thế nào. Thì phơi quần áo trong thời tiết nắng gắt cũng có thể khiến quần áo bị mất mùi. Cộng thêm vào đó, các bức xạ từ tia tử ngoại sẽ làm đứt gãy các liên kết màu sắc trong sợi vải, dẫn đến tình trạng quần áo phai màu và thay đổi màu sắc.</p><h2 class=\"ql-align-justify\"><strong>Các cách giúp quần áo bền đẹp trong thời tiết nắng gắt</strong></h2><p class=\"ql-align-justify\">Phơi quần áo dưới thời tiết nắng nóng thường làm cho quần áo bị phai màu hoặc bạc màu, khiến bạn chẳng còn muốn mặc chúng nữa. Vậy làm sao để giữ quần áo bền màu? Cùng tìm hiểu bạn nhé!</p><h3 class=\"ql-align-justify\"><strong>Dùng giấm hoặc phèn chua</strong></h3><p class=\"ql-align-justify\">Có thể bạn chưa biết nhưng giấm trắng hay phèn chua có tác dụng làm cho màu nhuộm quần áo được giữ chặt hơn trong từng thớ vải. Để có thể giữ&nbsp;quần áo có thể giữ được bền màu hơn.</p><p class=\"ql-align-justify\">Zofal bạn mách một bí quyết đó chính là trong lần giặt đầu tiên, bạn hãy pha nước cùng giấm trắng hoặc phèn chua rồi ngâm quần áo trong dung dịch này khoảng 1 – 2 giờ. Sau đó giặt sạch lại với nước mát để đánh bay mùi còn dính lại trên quần áo.</p><h3 class=\"ql-align-justify\"><strong>Giặt bằng nước lạnh</strong></h3><p class=\"ql-align-justify\">Việc giặt đồ bằng nước lạnh sẽ giúp bạn có thể giữ quần áo được bền màu hơn. Nước ấm hoặc nước nóng sẽ khiến các sợi vải bị giãn ra, đồng thời việc này sẽ làm màu của quần áo theo lỗ hổng của các sợi vải thoát ra ngoài. Đây chính là nguyên nhân khiến quần áo áo bị phai, bạc màu sau một thời gian sử dụng. Do đó, dùng nước lạnh để giặt đồ là cách an toàn nhất để bảo vệ quần áo của bạn.</p><h3 class=\"ql-align-justify\"><strong>Sử dụng nước xả vải</strong></h3><p class=\"ql-align-justify\"><img src=\"https://cdn.shortpixel.ai/spai2/w_981+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2022/03/Don-he-2022-ruc-ro-tuoi-mat-voi-5-mau-co-ao-bat-trend-20032022-2.jpg\" alt=\"vay dam dang dai\" height=\"600\" width=\"800\"></p><p class=\"ql-align-justify\">Sử dụng nước xả vải trong quá trình giặt đồ không chỉ giúp quần không chỉ giúp nước xả bao phủ các sợi vải, giúp quần áo mềm mại, thơm mát hơn. Việc này còn giúp bộ đồ của bạn có thể duy trì vóc dáng cũng như giữ màu quần áo được lâu hơn. Ngoài ra, khi bạn sử dụng nước xả khi giặt sẽ giúp bạn tiết kiệm được thời gian giặt là, quần áo cũng khô nhanh hơn đặc biệt là trong những ngày mưa ẩm.&nbsp;</p><h3 class=\"ql-align-justify\"><strong>Lộn trái đồ khi phơi</strong></h3><p class=\"ql-align-justify\">Phơi quần áo dưới&nbsp;ánh nắng trực tiếp là một trong những lí do khiến quần áo bạn hư hỏng bay màu chỉ sau vài lần sử dụng. Chính vì vậy trong các trường hợp quần áo của bạn quá dày và cần hong khô trực tiếp dưới ánh nắng mặt trời, bạn nên lộn trái nó lại để tránh sợ vải tiếp xúc với các tia cực tím và dễ dàng bay màu. Cách giữ màu quần áo này sẽ giúp đồ của bạn ít bị xơ vải và hạn chế phai màu ở mặt trước.</p><h3 class=\"ql-align-justify\"><strong>Đọc kỹ hướng dẫn</strong></h3><p class=\"ql-align-justify\">Một trong những cách giúp quần áo giữ màu hiệu quả nhất đó chính là việc đọc kỹ hướng dẫn trên mác áo. Những chiếc mác có trên áo sẽ giúp cung cấp cho bạn thông tin cụ thể về chế độ giặt là tốt nhất cho quần áo của bạn từ nhiệt cho đến các phương pháp làm khô quần áo.</p><p class=\"ql-align-justify\"><img src=\"https://cdn.shortpixel.ai/spai2/w_981+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2022/03/Don-he-2022-ruc-ro-tuoi-mat-voi-5-mau-co-ao-bat-trend-20032022-3.jpg\" alt=\"cổ chữ V\" height=\"600\" width=\"800\"></p><p class=\"ql-align-justify\">Đơn giải phải không? Chỉ cần vài lưu ý nhỏ trong quá trình giặt giũ&nbsp;là bạn đã có thể giữ cho những chiếc áo quần của mình luôn được bền màu trong những ngày thời tiết khắc nghiệt rồi</p><p><br></p>', 'admin/posts/GO4wywN7JJulYqU4zxTDzscGTA0UJygZPGmC9Kkd.jpg', 1, 1, 3, '2022-05-19 14:43:50', '2022-05-25 04:13:31'),
(2, 'Chao đảo với 5 sắc màu rạng rỡ đón hè', 'chao-dao-voi-5-sac-mau-rang-ro-don-he', '<p>Mùa hè đã gõ cửa, có lẽ nhiều nàng đang băn khoăn trong việc lựa chọn trang phục làm sao vừa mát mẻ, mà vẫn không kém phần thời trang, phong cách.&nbsp;</p><p>Nàng có biết rằng mùa hè cũng là “show diễn” để các cô nàng “bung lụa” tự tin tỏa sáng với những bộ cánh sặc sỡ sắc màu. Những tông màu sáng sẽ khiến bạn thêm phần năng động, tươi vui.&nbsp;</p><p><img src=\"https://cdn.shortpixel.ai/spai2/w_981+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2022/04/Chao-dao-voi-5-sac-mau-rang-ro-don-he-03042022-1.jpg\" alt=\"màu sắc mùa hè\" height=\"533\" width=\"800\"></p><p>Với những quý cô vốn đã quá quen thuộc, đắm chìm trong những sắc màu trung tính suốt thời gian dài, tại sao không thử “F5” bản thân một chút với những gam màu nóng, cho mùa hè thêm rực rỡ.</p><p class=\"ql-align-center\"><br></p><h2><strong>Tràn đầy năng lượng với sắc cam</strong></h2><p>Sắc màu này dự đoán sẽ khuấy đảo, “làm mưa làm gió”&nbsp;mùa hè năm nay. Màu cam là sự kết hợp hoàn hảo của màu đỏ và màu vàng. Tone màu này mang đến cho người mặc cho nguồn cảm hứng tích cực và tràn đầy năng lượng.&nbsp;</p><p>Nó còn biểu trưng cho sự đam mê, khát khao mạnh mẽ. Tuy nhiên, cũng bởi được kết hợp bởi hai gam màu khác nhau nên màu cam còn mang cả những nét dịu dàng, nữ tính và duyên dáng.</p><p><img src=\"https://cdn.shortpixel.ai/spai2/w_981+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2022/04/Chao-dao-voi-5-sac-mau-rang-ro-don-he-03042022-2.jpg\" alt=\"đầm màu cam\" height=\"600\" width=\"800\"></p><p>Màu cam không quá “chói lóa” nhưng đã đủ nổi bật, giúp bạn có thể kết hợp cùng với nhiều gam màu khác nhau từ trung tính, nhẹ nhàng đến rực rỡ.</p><p>Không cần quá cầu kỳ trong việc chọn lựa từng items để mix &amp; match, chỉ cần một chiếc đầm suông cộc tay nhẹ nhàng đã giúp nàng tỏa sáng, “ganh đua” khoe sắc cùng với các sắc hoa.</p><h2><strong>Điểm nhấn nổi bật với sắc đỏ</strong></h2><p>Nếu như, mùa hè được xem là mùa rực rỡ nhất trong năm thì trong các sắc màu đỏ là “điểm nhấn” nổi bật nhất.&nbsp;</p><p>Màu đỏ là màu của lửa và máu, nó gắn với sức mạnh, quyền lực, sự quyết tâm; Đó cũng là màu của cảm xúc, nhiệt huyết và là biểu tượng của tình yêu rực cháy.</p><p><img src=\"https://cdn.shortpixel.ai/spai2/w_981+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2022/04/Chao-dao-voi-5-sac-mau-rang-ro-don-he-03042022-3.jpg\" alt=\"đầm sát nách đỏ\" height=\"600\" width=\"800\"></p><p>Một chiếc váy đỏ với thiết kế phần tay cộc sát nách giúp nàng thêm phần thoải mái, mát mẻ. Cùng với chiều dài qua đầu gối kín đáo, thanh lịch sẽ là sự lựa chọn hoàn hảo cho chị em công sở. Nhấn nhá bằng hoa tai, turban, túi xách hay giày cao gót sẽ tô điểm giúp nàng thêm phần nổi bật.</p><h2><strong>Kiêu sa trong sắc vàng</strong></h2><p>Mùa hè là mùa của nắng, những tia nắng vàng ươm, chói chang. Cũng như ánh nắng mặt trời, trang phục màu vàng tượng trưng cho sự hạnh phúc sung túc.&nbsp;</p><p>Trong tình yêu, thì màu vàng tượng trưng cho một tình yêu kiêu sa, rực rỡ, thể ấm áp mà chân thành, tin tưởng.</p><p><img src=\"https://cdn.shortpixel.ai/spai2/w_981+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2022/04/Chao-dao-voi-5-sac-mau-rang-ro-don-he-03042022-4.jpg\" alt=\"đầm màu vàng\" height=\"600\" width=\"800\"></p><p>Dưới ánh nắng hè nàng thướt tha trong bộ váy mềm mại, cùng với phần cúc đính dọc tạo điểm nhấn. Thêm một chút chất “thơ” cho set đồ, với một chiếc túi xách màu nâu, một đôi hoa tai nhỏ xinh và một đôi xăng đan khoẻ khoắn.&nbsp;</p><h2><strong>Bay bổng lãng mạn với sắc hồng&nbsp;</strong></h2><p>Hồng là sự hòa quyện giữa sắc đỏ mạnh mẽ và sắc trắng nhẹ nhàng, tạo nên gam màu vừa bay bổng, lãng mạn vừa thanh khiết, ngây thơ.</p><p>Hồng cũng là màu sắc hứa hẹn một mùa hè ngập trời hi vọng mới, sức sống mới, mọi việc diễn ra suôn sẻ.</p><p><img src=\"https://cdn.shortpixel.ai/spai2/w_981+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2022/04/Chao-dao-voi-5-sac-mau-rang-ro-don-he-03042022-5.jpg\" alt=\"sơ mi hồng\" height=\"600\" width=\"800\"></p><p>Nếu như màu hồng trơn đã quá quen thuộc và đơn điệu thì nàng có thể thử ngay outfit vẫn với tông hồng chủ đạo nhưng được kết hợp thêm nhiều hoạ tiết bắt mắt, rất “hè”. Đây sẽ là một điểm nhấn tạo sự khác biệt, giúp nàng thêm phần phá cách, năng động.</p><h2><strong>Dịu dàng với sắc tím&nbsp;</strong></h2><p>Không quá chói loá như sắc đỏ, tím mang trong mình nét dịu dàng hơn, nó là gam màu của sự quyến rũ và tình cảm nồng cháy một lòng thuỷ chung, son sắt, đợi chờ.</p><p>Với trang phục màu tím nàng trông thật quý phái, trang nhã. Một chiếc đầm chấm bi mang theo hoài cổ, họa tiết chấm bi nhỏ làm cơ thể trông thon gọn và mảnh mai hơn.&nbsp;</p><p><img src=\"https://cdn.shortpixel.ai/spai2/w_981+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2022/04/Chao-dao-voi-5-sac-mau-rang-ro-don-he-03042022-6.jpg\" alt=\"váy màu tím\" height=\"600\" width=\"800\"></p><p>Hoạ tiết chấm bi cũng như một nét tô điểm cho phong cách thời trang gam màu sáng ấm. Tôn lên vẻ đẹp trẻ trung, lan toả nguồn năng lượng tích đến với mọi người.&nbsp;</p><p>Vào những ngày hè, mặc những trang phục sáng màu không chỉ giúp sẽ giúp giảm phần nào tác động của ánh nắng mặt trời giúp nàng cảm thấy thư giãn, mắt mẻ hơn mà còn giúp nàng thêm phần duyên dáng, toả sáng.</p>', 'admin/posts/VvYP7oFEFDBNKleZ3LnPLWc0lsmBrpUNems13KZN.jpg', 1, 1, 0, '2022-05-19 14:44:38', '2022-05-19 14:44:38'),
(3, 'Những kiểu váy giấu bụng giúp nàng tự tin dù eo to, bụng mỡ', 'nhung-kieu-vay-giau-bung-giup-nang-tu-tin-du-eo-to-bung-mo', '<p class=\"ql-align-justify\">“Eo to, bụng mỡ nên mặc gì?” Chắc hẳn là câu hỏi mà nhiều nàng đang cần lời giải đáp. Vòng 2 chưa được thon gọn thường khiến các chị em tự ti về bản thân, không biết nên diện trang phục gì để che đi khuyết điểm của cơ thể.&nbsp;</p><p class=\"ql-align-justify\"><img src=\"https://cdn.shortpixel.ai/spai2/w_981+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2022/03/z3295609602582_caa30b3480042070023412030580ad0b-1.jpg\" alt=\"dien vay giau bung\" height=\"533\" width=\"800\"></p><p class=\"ql-align-justify\">Nếu nàng đang băn khoăn không biết nên lựa chọn trang phục như thế nào, để giấu đi chiếc bụng mũm mĩm của mình một cách thật tinh tế, hãy tham khảo một số gợi ý từ Zofal nhé!&nbsp;</p><p class=\"ql-align-center\"><br></p><h2 class=\"ql-align-justify\"><strong>Váy đầm dáng ngắn</strong></h2><p class=\"ql-align-justify\">Đối với những cô nàng có bụng hơi mũm mĩm một chút thì chắc chắn dáng váy suông đơn giản sẽ là sự lựa chọn hoàn hảo nàng nên để ý. Những thiết kế này trông có vẻ vô cùng đơn giản nhưng đây là một trang phục phù hợp với mọi thân hình.</p><p class=\"ql-align-justify\">Ngoài ra những mẫu trang phục này còn được các nhà thiết kế của chúng tôi biến tấu với nhiều màu sắc trendy của mùa hè 2022, với các kiểu dáng khác nhau để nàng thỏa sức lựa chọn cho từng hoàn cảnh khác nhau.&nbsp;</p><p class=\"ql-align-justify\"><img src=\"https://cdn.shortpixel.ai/spai2/w_981+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2022/03/Don-he-2022-ruc-ro-tuoi-mat-voi-5-mau-co-ao-bat-trend-20032022-2.jpg\" alt=\"vay dam dang dai\" height=\"600\" width=\"800\"></p><p class=\"ql-align-justify\">Đặc biệt hơn những các trang phục này còn rất phù hợp với những nàng có chiều cao khiêm tốn thì nàng hãy chọn cho mình những mẫu váy dáng suông ngắn giúp làm cho đôi chân dài hơn. Đừng quên kết hợp cùng một đôi cao gót để dáng người thanh mảnh hơn nàng nhé!</p><h2 class=\"ql-align-justify\"><strong>Váy xòe nhấn eo cao</strong></h2><p class=\"ql-align-justify\">Không phải tự nhiên mà những chiếc váy xòe nhấn eo cao lại được nhiều nàng yêu thích và được săn đón đến vậy. Bởi lẽ, ngoài mang lại vẻ đẹp nữ tính nhẹ nhàng cho người mặc có thêm công dụng che bụng mỡ hiệu quả nữa.&nbsp;</p><p class=\"ql-align-justify\"><img src=\"https://cdn.shortpixel.ai/spai2/w_981+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2022/03/zofal-4.jpg\" alt=\"váy liền\" height=\"595\" width=\"800\"></p><p class=\"ql-align-justify\">Đúng là như vậy chiếc váy xòe rộng rãi thêm chút nhấn nhá ở phần eo giấu nhẹm khuyết điểm vòng 2 một cách khéo léo. Đặc biệt, chi tiết nhấn eo được làm nổi bật ở một vị trí cao hơn bình thường tạo cho người diện cảm giác chân dài ra đáng kể.&nbsp;</p><p class=\"ql-align-justify\">Hè đến rồi, ngại gì mà không thêm ngay vào tủ đồ của mình một vài chiếc váy xòe điệu đà được thiết kế bằng những chất liệu mềm mại uyển chuyển.&nbsp;</p><h2 class=\"ql-align-justify\"><strong>Váy hoa họa tiết giấu bụng</strong></h2><p class=\"ql-align-justify\">Cứ mỗi mùa hè về những chiếc váy hoa họa tiết trở thành những mẫu thiết kế được săn đón vì họa tiết và màu sắc vô cùng bắt mắt góp phần đánh lừa thị giác che đi khuyết điểm cơ thể vô cùng hiệu quả.</p><p class=\"ql-align-justify\">Một bí mật nữa là những loại họa tiết nổi bật, thu hút, được các nhà thiết kế của chúng tôi sắp xếp và phối hợp một cách thông minh tạo nên hiệu ứng đặc biệt. Những cô nàng theo đuổi phong cách sở thì đừng bỏ qua những chiếc váy này nhé. Trang phục này sẽ giúp các nàng trở nên thanh lịch và quý phái hơn đó.</p><p class=\"ql-align-justify\"><strong>Váy thắt eo chữ V</strong></p><p class=\"ql-align-justify\">Nếu bạn yêu thích các phong cách của các nàng thơ pháp với form dáng thon thả, vậy đừng quên học cách che khuyết điểm của các quý cô Paris đó là diện những chiếc váy thắt eo giấu bụng chữ V bạn nhé! Wrap Dress được mệnh danh là chiếc váy mà cô nàng Pháp nào cũng phải sở hữu ít nhất 1 chiếc trong tủ đồ của mình.</p><p><a href=\"https://zofal.vn/wp-content/uploads/2022/03/HHN_5725.jpg\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(41, 152, 249); background-color: transparent;\"><img src=\"https://cdn.shortpixel.ai/spai2/w_302+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2022/03/HHN_5725.jpg\" alt=\"Váy đầm cổ vuông mí gấu White 2\" height=\"960\" width=\"640\"></a></p><p><a href=\"https://zofal.vn/wp-content/uploads/2022/03/HHN_5707.jpg\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(41, 152, 249); background-color: transparent;\"><img src=\"https://cdn.shortpixel.ai/spai2/w_302+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2022/03/HHN_5707.jpg\" alt=\"Váy đầm cổ vuông mí gấu White 3\" height=\"960\" width=\"635\"></a></p><p><a href=\"https://zofal.vn/wp-content/uploads/2022/03/HHN_5681.jpg\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(41, 152, 249); background-color: transparent;\"><img src=\"https://cdn.shortpixel.ai/spai2/w_302+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2022/03/HHN_5681.jpg\" alt=\"Váy đầm cổ vuông mí gấu White 4\" height=\"960\" width=\"640\"></a></p><p class=\"ql-align-justify\">Ngoài ra váy thắt eo còn có thiết kế cổ V nhằm tôn vòng 1 quyến rũ, với chi tiết đắt giá đắp chéo ngang eo và xòe rộng ở phần dưới. Giúp người diện khéo léo che đi vòng 2 thiếu tự tin của mình. Đặc biệt hơn các cô nàng nàng có vòng 3 khiêm tốn cũng có thể diện thiết kế này một cách thoải mái.&nbsp;</p><h2 class=\"ql-align-justify\"><strong>Váy chữ A</strong></h2><p class=\"ql-align-justify\">Bên cạnh những chiếc váy suông, xòe thì váy chữ A cũng là một sự lựa chọn vô cùng hợp lý đó nàng. Với thiết kế có phần tùng rộng dần bắt đầu từ phần eo, nhưng độ xòe vừa đủ, rất phù hợp với môi trường công sở có phần nghiêm túc, đứng đắn.</p><p><a href=\"https://zofal.vn/wp-content/uploads/2022/03/HHN_4538.jpg\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(41, 152, 249); background-color: transparent;\"><img src=\"https://cdn.shortpixel.ai/spai2/w_302+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2022/03/HHN_4538.jpg\" alt=\"Váy đầm hoa cổ 2 ve tay bồng Orange Floral 1\" height=\"960\" width=\"640\"></a></p><p><a href=\"https://zofal.vn/wp-content/uploads/2022/03/HHN_4521.jpg\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(41, 152, 249); background-color: transparent;\"><img src=\"https://cdn.shortpixel.ai/spai2/w_302+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2022/03/HHN_4521.jpg\" alt=\"Váy đầm hoa cổ 2 ve tay bồng Orange Floral 2\" height=\"960\" width=\"640\"></a></p><p><a href=\"https://zofal.vn/wp-content/uploads/2022/03/HHN_4552.jpg\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(41, 152, 249); background-color: transparent;\"><img src=\"https://cdn.shortpixel.ai/spai2/w_302+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2022/03/HHN_4552.jpg\" alt=\"Váy đầm hoa cổ 2 ve tay bồng Orange Floral 4\" height=\"960\" width=\"640\"></a></p><p class=\"ql-align-justify\">Những chiếc váy sẽ giúp người diện trở nên cực kỳ thu hút mắt nhìn của người xung quanh ra khỏi vòng eo đầy đặn của nàng đấy. Hè này sắm ngay cho mình một chiếc váy chữ A để thoải mái thả dáng trong mọi hoàn cảnh thôi nào</p><h2 class=\"ql-align-justify\"><strong>Váy dáng dài thắt eo cao</strong></h2><p class=\"ql-align-justify\">Những chiếc váy dáng dài với phần thắt eo cao sẽ là sự lựa chọn không gì hoàn hảo bằng bởi giúp nàng có một vẻ đẹp vô cùng thanh thoát pha thêm một chút vẻ đẹp nhẹ nhàng, say đắm. Với phần eo được các nhà thiết kế tỉ mỉ chú ý chiết ly cao xòe từ trên xuống dưới sẽ giúp nàng che đi khuyết điểm một cách hoàn hảo nhất có thể.</p><p><br></p>', 'admin/posts/sMA2srbLs7mKqX2Ge79IMhqT4N0CiLN9hHPCg4TE.jpg', 1, 1, 0, '2022-05-19 14:45:49', '2022-05-19 14:45:49'),
(4, 'Bí quyết lựa chọn trang phục ra mắt ghi điểm tuyệt đối dành cho nàng', 'bi-quyet-lua-chon-trang-phuc-ra-mat-ghi-diem-tuyet-doi-danh-cho-nang', '<p class=\"ql-align-justify\">Lần đầu về ra mắt nhà người yêu nên mặc gì? Là những nỗi băn khoăn của rất nhiều cô gái trong lần đầu về nhà bạn trai chơi. Nếu bạn vẫn đang chưa biết nên lựa chọn trang phục như thế nào để ra mắt nhà “đằng ấy” thì hãy tham khảo ngay những gợi ý dưới đây của chúng tôi nhé!</p><p class=\"ql-align-justify\"><img src=\"https://cdn.shortpixel.ai/spai2/w_981+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2022/04/z3316502333439_4c2f04b977a01e0803db64ba3908ca0c-1.jpg\" alt=\"lựa chọn trang phục ra mắt ghi điểm tuyệt đối dành cho nàng\" height=\"533\" width=\"800\"></p><p><br></p><h2 class=\"ql-align-justify\"><strong>Trang phục nhẹ nhàng nữ tính</strong></h2><p class=\"ql-align-justify\">Những trang phục nhẹ nhàng, nữ tính luôn là sự lựa chọn an toàn và hợp lý nhất trong lần đầu gặp mặt. Bên cạnh đó những trang phục này còn giúp nàng trông dịu dàng, nữ tính hơn và ghi điểm tuyệt đối trong mắt các phụ huynh vì sự nhẹ nhàng, nữ tính luôn là thước đo tiêu chuẩn của phái đẹp.</p><p><a href=\"https://zofal.vn/wp-content/uploads/2022/03/HHN_5707.jpg\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(41, 152, 249); background-color: transparent;\"><img src=\"https://cdn.shortpixel.ai/spai2/w_302+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2022/03/HHN_5707.jpg\" alt=\"Váy đầm cổ vuông mí gấu White 3\" height=\"960\" width=\"635\"></a></p><p><a href=\"https://zofal.vn/wp-content/uploads/2022/03/HHN_3764.jpg\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(41, 152, 249); background-color: transparent;\"><img src=\"https://cdn.shortpixel.ai/spai2/w_302+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2022/03/HHN_3764.jpg\" alt=\"Váy đầm cổ vuông mí gấu Lime 3\" height=\"960\" width=\"640\"></a></p><p><a href=\"https://zofal.vn/wp-content/uploads/2022/03/HHN_5681.jpg\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(41, 152, 249); background-color: transparent;\"><img src=\"https://cdn.shortpixel.ai/spai2/w_302+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2022/03/HHN_5681.jpg\" alt=\"Váy đầm cổ vuông mí gấu White 4\" height=\"960\" width=\"640\"></a></p><p class=\"ql-align-justify\">Nàng có thể lựa chọn những item nhẹ nhàng như một chiếc chân váy xếp ly kết hợp cùng áo sơ mi hoặc áo phông. Hoặc một chiếc váy đầm thân liền với màu sắc nhã nhặn.</p><h2 class=\"ql-align-justify\"><strong>Chọn trang phục đơn giản</strong></h2><p class=\"ql-align-justify\">Lựa chọn trang phục đơn giản, ăn mặc gọn gàng, không quá luộm thuộm và xuề xòa là điều cô gái nào cũng nên lưu ý. Đây cũng chính là một điểm cộng rất lớn của bạn đối với các thành viên trong gia đình nhà chồng tương lai.&nbsp;</p><p class=\"ql-align-justify\">Dù mẹ chồng bạn có khó tính đến mấy nhưng vì sự chăm chuốt chỉn chu của bạn vẫn sẽ rất ấn tượng đấy! Hầu hết các bà mẹ chồng đều không thích thấy con dâu mình trong những bộ trang phục quá hở hang, lòe loẹt. Điều đó có thể làm bạn dễ bị hiểu nhầm cô gái ăn chơi, đua đòi và không hợp với con trai của họ. Bạn có thể lựa chọn áo sơ mi cùng quần vải đơn giản. Đừng quên thắt lưng để trông bạn gọn gàng hơn.&nbsp;</p><h2 class=\"ql-align-justify\"><strong>Trang phục năng động, trẻ trung</strong></h2><p class=\"ql-align-justify\">Nếu bạn vẫn chưa biết nên lựa chọn trang phục gì để được lòng người lớn trong nhà thì hãy thử qua các trang phục năng động, trẻ trung thử xem sao. Những thiết kế này sẽ giúp bạn dễ dàng chủ động hơn trong việc giúp đỡ dọn dẹp, nấu nướng.&nbsp;</p><p class=\"ql-align-justify\">Những chiếc váy đầm trong BST mới của Zofal&nbsp;sẽ được xem là trợ thủ đắc lực giúp tôn lên một cô gái năng động, mạnh mẽ. Nhưng tuyệt đối bạn đừng nên lựa chọn những trang phục quá ngắn, hoặc quá cá tính tốt nhất là quá đầu gối để không khiến mình mất điểm.</p><p class=\"ql-align-justify\"><img src=\"https://cdn.shortpixel.ai/spai2/w_981+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2022/03/Don-he-2022-ruc-ro-tuoi-mat-voi-5-mau-co-ao-bat-trend-20032022-6.jpg\" alt=\"cổ tròn nhỏ\" height=\"600\" width=\"800\"></p><p class=\"ql-align-justify\">Bạn vẫn muốn item của mình thêm sự nữ tính thì một chiếc áo sơ mi họa tiết hoa nhí để phối với quần Jean ôm hoặc một chiếc quần ống rộng cũng rất hợp lí đất. Nếu hạn chế về chiều cao, bạn cũng có thể hạn chế một chiếc váy liền với với đai thắt eo giúp bạn hack dáng và ăn gian chiều cao rất hiệu quả.&nbsp;</p><h2 class=\"ql-align-justify\"><strong>Trang phục quyến rũ</strong></h2><p class=\"ql-align-justify\">Các cô nàng với phong cách quyến rũ và nữ tính chắc chắn sẽ khá là lo lắng trong việc lựa chọn trang phục gia mắt gia đình nhà bạn trai. Chỉ vì một chút sơ hở thôi cũng dễ khiến nàng bị mất điểm trong mắt những người lớn rồi.&nbsp;</p><p class=\"ql-align-justify\"><img src=\"https://cdn.shortpixel.ai/spai2/w_981+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2022/03/Don-he-2022-ruc-ro-tuoi-mat-voi-5-mau-co-ao-bat-trend-20032022-2.jpg\" alt=\"vay dam dang dai\" height=\"600\" width=\"800\"></p><p class=\"ql-align-justify\">Trong trường hợp này, bạn có thể lựa chọn cho mình một chiếc váy với họa tiết floral hoặc một chiếc đầm siết eo cũng khá hợp lý đó. Đối với những cô nàng có chút mũm mĩm, quần ống rộng phối một chiếc áo sơ mi croptop không chỉ giúp thân hình bạn gọn hơn mà còn khắc phục được khuyết điểm bắp chân to.</p><h2 class=\"ql-align-justify\"><strong>Phụ kiện, trang sức</strong></h2><p class=\"ql-align-justify\">Bên cạnh trang phục, phụ kiện cũng là một trong những điều giúp bạn tỏa sáng trong lần đầu gặp mặt. Các phụ kiện này sẽ giúp trang phục của nàng trở nên có điểm nhấn và không đơn điệu.</p><p class=\"ql-align-justify\">Chính vì vậy, để làm nổi bật set đồ của mình hơn, bạn có thể chọn sợi dây chuyền mảnh hoặc đơn giản hơn là đôi hoa tai nhỏ xinh cũng giúp trang phục bớt nhàm chán hơn. Đối với những cô nàng có phong cách năng động, bạn có thể chọn các phụ kiện như hoa tai tam giác, hình tròn để làm tăng sự trẻ trung.&nbsp;</p><p class=\"ql-align-justify\">Còn đối với cô nàng có gương mặt tròn và đầy đặn, một đôi hoa tai hình thoi sẽ là một sự lựa chọn vô cùng hài hòa giúp gương mặt trở nên thon gọn và thanh thoát hơn. Để không bị mất điểm trong mắt phụ huynh bạn trai, bạn nên tránh chọn những trang sức bản to, có màu sắc quá rực rỡ hay đeo quá nhiều phụ kiện</p><p><br></p>', 'admin/posts/rGipI94rPcY3tRv9Uv8tF9vVCdMrNbvEtYMgSBpX.jpg', 1, 1, 8901, '2022-05-19 14:46:50', '2022-05-21 07:32:55'),
(5, 'Những lưu ý mà nàng không thể bỏ qua khi đi biển', 'nhung-luu-y-ma-nang-khong-the-bo-qua-khi-di-bien', '<p class=\"ql-align-justify\">Mùa hè – mùa của những chuyến đi, còn gì tuyệt vời hơn khi sau những ngày học tập và làm việc căng thẳng, ta có cho mình một kì nghỉ, được “thả hồn” vào dòng nước mát lành của biển cả, lắng nghe những thanh âm “vỗ về” của sóng, ngắm nhìn hoàng hôn “rực đỏ” giữa biển xanh.</p><p class=\"ql-align-justify\"><img src=\"https://cdn.shortpixel.ai/spai2/w_981+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2022/04/Nhung-luu-y-ma-nang-khong-the-bo-qua-khi-di-bien-23032022-1.jpg\" alt=\"outfit đi biển\" height=\"533\" width=\"800\"></p><p class=\"ql-align-justify\">Và đây cũng là lúc mà chị em băn khoăn không biết đi biển nên mặc gì để vừa xinh đẹp mà phù hợp. Trong bài viết hôm nay, hãy cùng ZOFAL điểm qua những lưu ý khi “lên đồ” đi biển nhé!</p><h2 class=\"ql-align-justify\"><strong>Lựa chọn trang phục gam màu sáng</strong></h2><p class=\"ql-align-justify\">Mùa hè được biết đến là mùa những sắc màu tươi sáng, vậy nên đi biển cũng không thể thiếu những bộ trang phục rực rỡ. Những tông màu sáng sẽ không chỉ&nbsp;giúp phản xạ ánh nắng sẽ giúp bạn không bị cảm giác nắng nóng mà còn làm bạn trở nên nổi bật hơn trên bãi biển, mang đến nhiều năng lượng, sức sống.&nbsp;</p><p class=\"ql-align-justify\"><img src=\"https://cdn.shortpixel.ai/spai2/w_981+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2022/04/Nhung-luu-y-ma-nang-khong-the-bo-qua-khi-di-bien-23032022-2.jpg\" alt=\"trang phục gam màu sáng\" height=\"600\" width=\"800\"></p><p class=\"ql-align-justify\">Với những trang phục tối màu, trông bạn sẽ trở nên tối tăm không có sức sống đồng thời gam màu tối sẽ hấp thụ nhiệt cũng như ánh nắng gây cảm giác nóng nực khó chịu hơn rất nhiều. Vậy nên, trang phục sáng màu sẽ là ưu tiên số 1 cho những chuyến đi biển.</p><h2 class=\"ql-align-justify\"><strong>Chọn váy họa tiết</strong></h2><p class=\"ql-align-justify\">Khi đi biển, diện váy sẽ giúp nàng thêm phần thướt tha, duyên dáng. Đặc biệt là váy họa tiết, được khơi nguồn từ cây, cỏ, hoa lá,… Khi nàng diện chúng, sẽ đem lại cảm giác gần gũi, thân thuộc, “hòa mình” vào biển cả, thiên nhiên đất trời.&nbsp;</p><p class=\"ql-align-justify\"><img src=\"https://cdn.shortpixel.ai/spai2/w_981+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2022/03/Nhung-luu-y-ma-nang-khong-the-bo-qua-khi-di-bien-23032022-3.jpg\" alt=\"váy họa tiết\" height=\"600\" width=\"800\"></p><p class=\"ql-align-justify\">Những chiếc váy đầm này được may bằng những chất vải mỏng, nhẹ, thoáng đem lại sự thoải mái, mát mẻ dù cho thời tiết có nắng nóng hay gay gắt thế nào đi nữa. Một cơn gió biển nhẹ lướt qua, sẽ càng tô điểm cho vẻ đẹp “dung dinh” nhẹ nhàng của các họa tiết.</p><h2 class=\"ql-align-justify\"><strong>Chọn trang phục thiết kế sát nách</strong></h2><p class=\"ql-align-justify\">Đây là item “hot hit” cho một mùa hè mát mẻ, những chiếc váy, áo sát nách vừa giúp bạn khoe trọn đôi vai thanh mảnh vừa mang đến vẻ đẹp dịu dàng, nữ tính.</p><p class=\"ql-align-justify\">Phong cách này đặc biệt phù hợp với những cô nàng ưa thích sự năng động. Một set đồ đơn giản mà không kém phần cá tính.</p><h2 class=\"ql-align-justify\"><strong>Chọn kính đi biển</strong></h2><p class=\"ql-align-justify\">Không mang theo kính râm sẽ là một thiếu sót lớn cho những ngày đi biển đầy nắng và gió. Tốt nhất, hãy chọn cho mình một chiếc kính râm phân cực với bộ lọc chống được ánh nắng mặt trời giúp bạn tránh xa những tia nắng gay gắt khiến bị bị chói.&nbsp;</p><p class=\"ql-align-justify\">Đồng thời, hãy chọn cho mình một chiếc kính bơi để bảo vệ đôi mắt khỏi nước biển và clo và tối ưu tầm nhìn dưới nước.&nbsp;</p><p class=\"ql-align-justify\"><img src=\"https://cdn.shortpixel.ai/spai2/w_981+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2022/04/Nhung-luu-y-ma-nang-khong-the-bo-qua-khi-di-bien-23032022-4.jpg\" alt=\"outfit đi biển\" height=\"600\" width=\"800\"></p><h2 class=\"ql-align-justify\"><strong>Lựa chọn giày dép đi biển</strong></h2><p class=\"ql-align-justify\">Khi đi tắm biển, những đôi dép lê, dép tông hay dép xỏ ngón sẽ là lựa chọn lý tưởng giúp bạn đi bộ trên cát, đi dạo ven biển thuận lợi thay vì những đôi giày, bởi nước biển có thể khiến chúng bị ướt, và hỏng.</p><p class=\"ql-align-justify\">Để set đồ đi biển thêm phần sành điệu, bạn hãy lựa một đôi dép xăng đan, vừa dễ chịu, thoải mái nhưng lại không kém phần “fashion”.</p><h2 class=\"ql-align-justify\"><strong>Chọn nón đi biển</strong></h2><p class=\"ql-align-justify\">Nón đi biển là món đồ không thể thiếu cho những chuyến đi biển. Không chỉ giúp che nắng, nó còn giúp bộ đồ trở lên “trendy” hút mắt hơn rất nhiều.&nbsp;</p><p class=\"ql-align-justify\"><img src=\"https://cdn.shortpixel.ai/spai2/w_981+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2022/04/Nhung-luu-y-ma-nang-khong-the-bo-qua-khi-di-bien-23032022-5.jpg\" alt=\"kết hợp với nón\" height=\"600\" width=\"800\"></p><p class=\"ql-align-justify\">Một chiếc nón cói mát mẻ kết hợp cùng váy họa tiết tạo nên một outfit xinh xẻo, để nàng tha hồ “sống ảo”.</p><h2 class=\"ql-align-justify\"><strong>Sử dụng kem chống nắng</strong></h2><p class=\"ql-align-justify\">Tuyệt đối đừng quên kem chống nắng để bảo vệ làn da của bạn và cả gia đình khi đi biển nhé! Đặc biệt vào mùa hè, bức xạ tia cực tím cao hơn, vậy nên việc bảo vệ da dưới nắng cần được thực hiện nghiêm ngặt hơn.</p><p class=\"ql-align-justify\">Khi chọn kem chống nắng đi biển, điều cần quan tâm trước tiên đó chỉ số SPF của mỗi sản phẩm. Thông thường, khi đi làm văn phòng, thì chỉ số chống nắng SPF phù hợp nhất với chị em sẽ giao động từ 30- 50, tuy nhiên khi đi biển, da bạn phải tiếp xúc trực tiếp nhiều với ánh nắng mặt trời vì vậy chỉ số chống nắng hợp lý nhất phải từ 50- 80.</p><p class=\"ql-align-justify\">Đồng thời, bạn nên chọn loại kem chống nắng có khả năng chống nước bởi làn da cũng cần bảo vệ ngay cả khi tắm biển.</p><p class=\"ql-align-justify\">Hi vọng với những chia sẻ trên đây, bạn sẽ có nhiều gợi ý phù hợp cho chuyến đi biển vào mùa hè này. Chúc bạn có những phút giây tuyệt vời và sảng khoái, đầy hứa hẹn hè, tiếp sức cho một năm 2022 bùng cháy, ngập tràn năng lượng.</p><p><br></p>', 'admin/posts/rOPGLEu8cyfNs2GLHI020qYYjh0ebwxCvj9WXYXU.jpg', 1, 1, 0, '2022-05-19 14:47:26', '2022-05-19 14:47:26'),
(6, 'Đón hè 2022 rực rỡ, tươi mát với 5 mẫu cổ áo “bắt trend”', 'don-he-2022-ruc-ro-tuoi-mat-voi-5-mau-co-ao-bat-trend', '<p class=\"ql-align-justify\">Để lựa chọn ra một set đồ cho những ngày hè tươi mát, vừa thời trang vừa năng động, cá tính mà quan trọng hơn là vẫn phải phù hợp với môi trường công sở quả thật không dễ. Thông thường, các nàng thường chú trọng đến những kiểu dáng áo mà vô tình quên đi những chi tiết nhỏ mà vô cùng “đắt giá”&nbsp;như phần cổ áo.</p><p class=\"ql-align-justify\"><img src=\"https://cdn.shortpixel.ai/spai2/w_981+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2022/03/Don-he-2022-ruc-ro-tuoi-mat-voi-5-mau-co-ao-bat-trend-20032022-1.jpg\" height=\"533\" width=\"800\"></p><p class=\"ql-align-justify\">Trong bài viết ngày hôm nay, hãy cùng ZOFAL điểm qua 5 mẫu cổ áo “bắt trend” cùng đón hè 2022 rực rỡ!</p><p class=\"ql-align-justify\"><br></p><h2 class=\"ql-align-justify\"><strong>Thiết kế cổ chữ U</strong></h2><p class=\"ql-align-justify\">Áo váy cổ chữ U là một trong những loại cổ áo tiện dụng nhất và rất được ưa chuộng hiện nay vừa phù hợp với nhiều người mặc vừa đặc biệt thoáng mát trong mùa hè này.&nbsp;</p><p class=\"ql-align-justify\"><img src=\"https://cdn.shortpixel.ai/spai2/w_981+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2022/03/Don-he-2022-ruc-ro-tuoi-mat-voi-5-mau-co-ao-bat-trend-20032022-2.jpg\" alt=\"váy cổ chữ U\" height=\"600\" width=\"800\"></p><p class=\"ql-align-justify\">Thiết kế cổ chữ U sẽ tạo nên hiệu ứng thị giác tốt, khiến cho phần cổ của bạn trở nên cân xứng, thon gọn hơn.</p><h2 class=\"ql-align-justify\"><strong>Thiết kế cổ chữ V</strong></h2><p class=\"ql-align-justify\">Cổ&nbsp;chữ V còn được gọi là cổ tim, với phần cổ xẻ sâu xuống ngực tạo thành một hình chữ V,&nbsp;mẫu áo này đã “đốn tim” khiến bao cô nàng phải “điêu đứng”.</p><p class=\"ql-align-justify\"><img src=\"https://cdn.shortpixel.ai/spai2/w_981+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2022/03/Don-he-2022-ruc-ro-tuoi-mat-voi-5-mau-co-ao-bat-trend-20032022-3.jpg\" alt=\"cổ chữ V\" height=\"600\" width=\"800\"></p><p class=\"ql-align-justify\">Mọi khuyết điểm trên cơ thể dường như bị “lu mờ” bởi điểm nhấn chiếc cổ khoét sâu vừa tạo cảm giác cơ thể dài hơn, vừa thêm một chút “sexy” cho người mặc.</p><p class=\"ql-align-justify\">Thiết kế cổ chữ V cũng rất đa dạng, từ cổ khoét sâu đến nông, tha hồ cho nàng lựa chọn tùy theo mục đích và sở thích. Với môi trường công sở, nàng hãy chọn những mẫu có phần cắt xẻ nhẹ nhàng, vừa khoe trọn phần cổ cao thanh thoát, vừa tao nhã, lịch thiệp.</p><h2 class=\"ql-align-justify\"><strong>Thiết kế cổ vuông</strong></h2><p class=\"ql-align-justify\">Lấy cảm hứng từ những trang phục của các nữ hoàng, các cô nàng con nhà quý tộc phương Tây quyền quý, sang trọng, kiểu áo cổ vuông đẹp có phần cổ được thiết kế vuông vắn gọn gàng giúp bạn khéo léo khoe được phần xương quai xanh mảnh mai, quyến rũ.&nbsp;</p><p class=\"ql-align-justify\"><img src=\"https://cdn.shortpixel.ai/spai2/w_981+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2022/03/Don-he-2022-ruc-ro-tuoi-mat-voi-5-mau-co-ao-bat-trend-20032022-4.jpg\" alt=\"váy cổ vuông\" height=\"600\" width=\"800\"></p><p class=\"ql-align-justify\">Bên cạnh đó, với thiết kế cổ vuông sẽ giúp phần cổ được thông thoáng và gọn gàng hơn hẳn nhất là vào những ngày hè oi ả. Cũng nhờ đó mà phần vai và bắp tay cũng trông nhỏ và duyên dáng hơn.</p><p class=\"ql-align-justify\">Cổ vuông là sự kết hợp, giao thoa giữa âm hưởng cổ điển và hiện đại bởi vậy nó có thể kết hợp với rất nhiều item khác nhau. Bạn có thể thoải mái diện các kiểu áo cổ vuông đẹp với chân váy, quần jeans, quần baggy đều thích hợp… Ngoài ra, bạn có thể thêm chút điểm nhấn bằng 1 vòng sợi mảnh, vòng cổ choker hoặc khăn họa tiết.</p><h2 class=\"ql-align-justify\"><strong>Cổ áo sơ mi</strong></h2><p class=\"ql-align-justify\">Đây là item đã quá đỗi thân quen với những cô nàng công sở. Kiểu áo cổ sơ mi mang trong mình vẻ đẹp của sự trang trọng, lịch sự, bởi vậy nó rất thích hợp cho nàng khi đi làm, hay khi tham gia những sự kiện, những buổi gặp mặt quan trọng đòi hỏi sự chỉn chu, nghiêm túc.</p><p class=\"ql-align-justify\"><img src=\"https://cdn.shortpixel.ai/spai2/w_981+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2022/03/Don-he-2022-ruc-ro-tuoi-mat-voi-5-mau-co-ao-bat-trend-20032022-5.jpg\" alt=\"cổ sơ mi\" height=\"600\" width=\"800\"></p><p class=\"ql-align-justify\">Là một cô nàng công sở thì có thể chọn những chiếc áo sơ mi cổ đức basic hay những chiếc áo sơ mi cổ sen, cổ cách điệu,… một chút mát mẻ cho ngày hè, nàng có thể thoải mái hơn đôi chút với những chiếc sơ mi cổ tim, cổ thủy thủ,…&nbsp;</p><h2 class=\"ql-align-justify\"><strong>Thiết kế cổ áo tròn nhỏ</strong></h2><p class=\"ql-align-justify\">Cổ áo tròn nhỏ là một thiết kế tuy đơn giản, nhưng chưa bao giờ là “lỗi mốt” cả. Phần cổ áo được thiết kế dáng tròn nằm sát với phần cổ người mặc, là sự lựa chọn an toàn, lý tưởng với các cô nàng ưa sự giản dị và kín đáo.</p><p class=\"ql-align-justify\"><img src=\"https://cdn.shortpixel.ai/spai2/w_981+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2022/03/Don-he-2022-ruc-ro-tuoi-mat-voi-5-mau-co-ao-bat-trend-20032022-6.jpg\" alt=\"cổ tròn nhỏ\" height=\"600\" width=\"800\"></p><p class=\"ql-align-justify\">Cổ tròn cũng là kiểu dáng cổ phổ biến nhất trong các thiết kế váy, áo của “phái đẹp” bởi tính ứng dụng cao. Khi diện các kiểu váy này, nàng thỏa sức “biến hóa” với nhiều phong cách: từ trẻ trung, nhẹ nhàng, nữ tính, đến bí ẩn, đầy mê hoặc.&nbsp;</p><p class=\"ql-align-justify\">Tuy nhiên, mẫu cổ áo này lại hơn “kén” người mặc, nó không phù hợp cho người cổ ngắn, vòng ngực quá lớn hoặc kích thước vai hẹp do thiết kế phần cổ kín, che phần xương đòn sẽ làm cổ và vai của các nàng trông ngắn lại.</p><p class=\"ql-align-justify\">Cổ áo là tuy là một chi tiết nhỏ nhưng nó ảnh hưởng lớn tới sự thành công của một trang phục. Hy vọng với bài viết trên đây, sẽ giúp các nàng lựa chọn kiểu dáng cổ áo để phù hợp, cùng đón hè 2022 tươi mát, ngập tràn năng lượng.</p><p><br></p>', 'admin/posts/vvPaXT2q8WlY7d3IGINnD3dvLgtZnaValVUk0FGL.jpg', 1, 1, 16, '2022-05-19 14:48:08', '2022-05-25 13:30:44'),
(7, 'Phụ kiện thời trang – Nét phá cách cho chị em công sở', 'phu-kien-thoi-trang-net-pha-cach-cho-chi-em-cong-so', '<p class=\"ql-align-justify\">Để tạo nên một set đồ hoàn chỉnh, không chỉ dừng lại ở trang phục mà còn cần đến sự kết hợp của những phụ kiện.</p><p class=\"ql-align-justify\">Là một cô nàng công sở chính hiệu, bạn sẽ nhận ra rằng mình sẽ cần đến những món đồ phụ kiện công sở tinh tế hơn, thời thượng hơn.</p><p class=\"ql-align-justify\"><img src=\"https://cdn.shortpixel.ai/spai2/w_981+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2022/03/Phu-kien-thoi-trang-net-pha-cach-cho-quy-co-cong-so-14032022-1.jpg\" alt=\"phụ kiện thời trang\" height=\"533\" width=\"800\"></p><p class=\"ql-align-justify\">Vậy nàng cần phải lựa chọn phụ kiện như thế nào sao cho vừa tinh tế, nhẹ nhàng nhưng vẫn đủ để toát lên sự duyên dáng, lịch thiệp.</p><p class=\"ql-align-justify\"><br></p><h2 class=\"ql-align-justify\"><strong>Tại sao chị em công sở nên sử dụng phụ kiện</strong></h2><p class=\"ql-align-justify\">Khi nhắc tới 2 từ “phụ kiện” nhiều người thường cho rằng nó là vật thứ yếu và không cần thiết, nhưng chính phụ kiện lại là nét chấm phá giúp bạn trở nên nổi bật hơn, đồng thời đáp ứng nhu cầu khác.</p><h3 class=\"ql-align-justify\"><strong>Dễ dàng mix và match cùng trang phục</strong></h3><p class=\"ql-align-justify\">Phụ kiện thời trang thường rất đa dạng về màu sắc, thiết kế và chất liệu bởi vậy mà chúng hoàn toàn có thể kết hợp được trong nhiều trường hợp với nhiều trang phục khác nhau.&nbsp;</p><p class=\"ql-align-justify\">Từ năng động trẻ trung đến nhẹ nhàng trầm tính, phụ kiện đều có thể giúp tôn thêm vẻ đẹp của bản thân và của trang phục.&nbsp;</p><h3 class=\"ql-align-justify\"><strong>Tạo nên nét chấm phá riêng biệt</strong></h3><p class=\"ql-align-justify\">Chị em công sở vốn đã quá quen với những bộ trang phục như áo sơ mi, quần âu hay váy vóc. Đặc biệt ở những môi trường yêu cầu phải diện đồng phục, các nàng càng khó tạo điểm nhấn, phụ kiện sẽ là sự lựa chọn lý tưởng tạo nên nét chấm phá khác biệt.</p><p class=\"ql-align-justify\">Cùng là một trang phục nhưng khi phối với phụ kiện khác nhau lại đem những dáng vẻ và nét cá tính rất riêng.</p><p class=\"ql-align-justify\"><img src=\"https://cdn.shortpixel.ai/spai2/w_981+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2022/03/Phu-kien-thoi-trang-net-pha-cach-cho-quy-co-cong-so-14032022-2.jpg\" alt=\"phụ kiện túi xách\" height=\"596\" width=\"800\"></p><h3 class=\"ql-align-justify\"><strong>Có thể đem đến lợi ích cho sức khỏe</strong></h3><p class=\"ql-align-justify\">Các trang sức làm từ bạc với lợi ích đã được khoa học chứng minh, bạc có khả năng hút những khí độc, chắn gió, chống bệnh thông thường như cảm, cúm, …. Ngoài ra 1 số vòng tay khác như trầm hương cũng có tác dụng an thần và đem đến, niềm tin may mắn.</p><h2 class=\"ql-align-justify\"><strong>Một số phụ kiện đơn giản cho quý cô công sở</strong></h2><h3 class=\"ql-align-justify\"><strong>Khăn quàng cổ</strong></h3><p class=\"ql-align-justify\">Đây là một dạng phụ kiện rất dễ sử dụng vừa có thể giữ ấm vào những ngày thời tiết se lạnh vừa tăng sự bắt mắt cho trang phục công sở của các nàng. Tuy vậy, không phải cứ phải vào mùa đông mới có thể sử dụng khăn quàng cổ, với những ngày hè, chị em có thể lựa cho mình những chiếc khăn nhỏ với chất liệu mỏng, thoáng để tạo điểm nhấn.</p><p class=\"ql-align-justify\"><img src=\"https://cdn.shortpixel.ai/spai2/w_981+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2022/03/Phu-kien-thoi-trang-net-pha-cach-cho-quy-co-cong-so-14032022-3.jpg\" alt=\"khăn quàng cổ\" height=\"397\" width=\"800\"></p><p class=\"ql-align-justify\">Có rất nhiều cách để biến một chiếc khăn choàng cổ trở thành một “vũ khí bí mật”. Chỉ bằng một chiếc khăn, chị em hoàn toàn có thể biến tấu nhiều kiểu choàng, kiểu buộc, kiểu thắt nơ khác nhau tạo nên sự đa dạng, cũng như sự phù hợp với từng trang phục, từng thời điểm.</p><h3 class=\"ql-align-justify\"><strong>Thắt lưng</strong></h3><p class=\"ql-align-justify\">Một chiếc dây lưng sẽ giúp hoàn thiện sự gọn gàng chỉn chu cho set đồ, giúp eo bạn trông thon gọn hơn, tôn lên những đường nét thanh tú trên cơ thể.&nbsp;</p><p class=\"ql-align-justify\">Với những người cao gầy, mảnh khảnh thắt lưng bản to sẽ phù hợp nhất. Thắt lưng bản vừa sẽ hợp với người tròn trịa, muốn sử dụng thắt lưng để tạo cảm giác cao hơn, eo nhỏ gọn hơn.&nbsp;</p><p class=\"ql-align-justify\"><img src=\"https://cdn.shortpixel.ai/spai2/w_981+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2022/03/Phu-kien-thoi-trang-net-pha-cach-cho-quy-co-cong-so-14032022-4.jpg\" alt=\"thắt lưng\" height=\"269\" width=\"800\"></p><p class=\"ql-align-justify\">Và với mỗi trang phục, phong cách thời trang khác nhau, thắt lưng cũng cần có sự thay đổi linh hoạt. Những chiếc dây lưng thiết kế bằng da thanh lịch sẽ rất “ăn nhập” với phong cách thời trang cổ điển, sang trọng, trong khi những bộ trang phục cá tính lại thoải mái lựa chọn nhiều kiểu thắt lưng cá tính hơn.</p><h3 class=\"ql-align-justify\"><strong>Túi xách</strong></h3><p class=\"ql-align-justify\">Chiếc túi xách như chứa cả thế giới của chị em phụ nữ từ máy tính, điện thoại, đến ví tiền, son và một vài đồ trang điểm khác.&nbsp;</p><p class=\"ql-align-justify\">Túi xách vẫn được biết đến là sản phẩm không thể thiếu trong tủ đồ của mỗi chị em phụ nữ hiện nay, túi xách tay nữ được sử dụng chủ yếu bởi các chị em công sở, những người thường xuyên đi dự sự kiện, đi công tác,… Túi xách tay nữ được thiết kế tinh tế, cách điệu tạo nên sự nhẹ nhàng, tinh tế, duyên dáng cho người mang.</p><p class=\"ql-align-justify\"><img src=\"https://cdn.shortpixel.ai/spai2/w_981+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2022/03/Phu-kien-thoi-trang-net-pha-cach-cho-quy-co-cong-so-14032022-5.jpg\" alt=\"túi xách\" height=\"597\" width=\"800\"></p><h3 class=\"ql-align-justify\"><strong>Vòng tay, vòng cổ&nbsp;</strong></h3><p class=\"ql-align-justify\">Trang phục công sở thường bị mặc định là cứng và nhàm chán, vậy thì chỉ cần điểm nhấn là 1 chiếc vòng tay hay vòng cổ sẽ khiến bạn trở nên mềm mại, duyên dáng hơn nhiều đó.</p><p class=\"ql-align-justify\">Với vòng cổ hãy chọn loại đơn chuỗi, với độ dài vừa phải để bạn có thể trưng diện chúng với mọi loại trang phục từ thanh lịch, hiện đại hay cá tính, từ những chiếc áo cổ sơ mi tới những chiếc đầm dài, váy cổ tim.</p><p class=\"ql-align-justify\">Còn với những mẫu vòng, lắc tay dành cho dân công sở vẫn nên thiên về kiểu thiết kế tối giản, nhẹ nhàng mà tinh tế.</p><p class=\"ql-align-justify\"><img src=\"https://cdn.shortpixel.ai/spai2/w_981+q_lossless+ret_img+to_webp/https://zofal.vn/wp-content/uploads/2022/03/Phu-kien-thoi-trang-net-pha-cach-cho-quy-co-cong-so-14032022-6.jpg\" alt=\"vòng cổ\" height=\"382\" width=\"800\"></p><p class=\"ql-align-justify\">Với quý cô công sở, phụ kiện trở thành những món đồ không hề ‘“phụ” chút nào. Nó không chỉ giúp chị em thuận tiện hơn với nhiều công dụng mà còn tạo điểm nhấn mạnh mẽ của một cô nàng công sở chỉn chu, lịch thiệp.</p><p><br></p>', 'admin/posts/Wqx8wQUyjKhnILBnCygKgR3WAz8qaF6TLAzK6vuc.jpg', 1, 1, 0, '2022-05-19 14:48:47', '2022-05-19 14:48:47');
INSERT INTO `posts` (`id`, `title`, `slug`, `content`, `photo`, `status`, `added_by`, `views`, `created_at`, `updated_at`) VALUES
(8, 'Vải dạ là gì? Các loại vải dạ và cách nhận biết.', 'vai-da-la-gi-cac-loai-vai-da-va-cach-nhan-biet', '<p class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 0);\">Như một vòng lặp thời trang kỳ diệu, mỗi độ đông về chất liệu dạ lại được lên ngôi, chiếm trọn spotlight trong lòng phái đẹp. Để hiểu rõ hơn về vải dạ, ưu nhược điểm cũng như các loại dạ, cùng Toson tìm hiểu kỹ hơn nhé.</span></p><p class=\"ql-align-justify\"><strong style=\"color: rgb(0, 0, 0);\">Vải dạ là gì?</strong></p><p class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 0);\">Vải dạ tên tiếng anh là Felt Coth, có nguồn gốc từ thiên nhiên, được sản xuất bằng cách ủ, cô đặc và ép các sợi lại với nhau thành tấm từ các sợi bông, đay, cói và các lại sợi nhân tạo polyester, sợi tổng hợp. Vải được nén lại với nhau bằng nhiệt, độ ẩm và áp lực cao, cho ra một loại vải rất dày đặc khi các sợi được lồng vào nhau vĩnh viễn.</span></p><p class=\"ql-align-justify\"><strong style=\"color: rgb(0, 0, 0);\">Một số loại vải dạ trên thị trường hiện nay:</strong></p><p class=\"ql-align-justify\"><strong style=\"color: rgb(0, 0, 0);\">1. Vải dạ text</strong></p><p class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 0);\">Dạ text có độ dày vừa phải, mặt vải đanh, không rão, không co dãn, phù hợp với các sản phẩm chân váy, váy gile, vest nữ, măng tô nữ,...Do có nguồn gốc từ sợi bông cùng sự pha màu từ các nguyên liệu thiên nhiên nên hoàn toàn an toàn với làn da, không gây kích ứng, màu sắc đẹp, lạ khiến các nàng mê mẩn.</span></p><p class=\"ql-align-center\"><span style=\"color: rgb(0, 0, 0);\"><img src=\"https://bizweb.dktcdn.net/100/348/991/files/b8534k91.jpg?v=1635992212586\"></span></p><p class=\"ql-align-center\"><em style=\"color: rgb(0, 0, 0);\">Set bộ dạ text Toson siêu xinh cho các nàng</em></p><p class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 0);\">Lưu ý nhỏ cho các bộ đồ vải dạ text là không nên dùng hóa chất mạnh, chỉ nên giặt nhẹ bằng tay.</span></p><p class=\"ql-align-justify\"><strong style=\"color: rgb(0, 0, 0);\">2. Vải dạ len</strong></p><p class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 0);\">Loại vải này được dệt từ các sợi len tổng hợp, trên bề mặt được phủ một lớp lông mềm mại nên giữ ấm tốt và ít thấm nước.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 0);\">Dạ len thường được dùng để may áo khoác, áo jacket.,...</span></p><p class=\"ql-align-justify\"><strong style=\"color: rgb(0, 0, 0);\">3. Vải dạ lông cừu</strong></p><p class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 0);\">Dạ lông cừu được tạo nên từ những sợi lông cừu kết hợp với các công đoạn thu hoạch, chọn lọc cẩn thận, kỹ thuật dệt may tiên tiến để cho ra thành phẩm.</span></p><p class=\"ql-align-center\"><span style=\"color: rgb(0, 0, 0);\"><img src=\"https://bizweb.dktcdn.net/100/348/991/files/99004d640-2.jpg?v=1635992523109\"></span></p><p class=\"ql-align-center\"><a href=\"https://toson.vn/ao-da\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"background-color: transparent; color: rgb(231, 76, 60);\"><strong><em>Áo dạ lông cừu Toson</em></strong></a><em style=\"color: rgb(0, 0, 0);\">&nbsp;- items không thể thiếu cho các quý cô yêu thời trang</em></p><p class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 0);\">Dạ lông cừu có hai mặt vải giống nhau, sờ vào rất mềm, mịn và nhẹ, đặc biệt không hề gây ngứa da, ít thấm nước, giữ ấm tốt. Hơn nữa, dạ lông cừu có độ co dãn tốt nhưng không sợ bai xù nên rất được ưa chuộng.</span></p><p class=\"ql-align-center\"><span style=\"color: rgb(0, 0, 0);\"><img src=\"https://bizweb.dktcdn.net/100/348/991/files/99004e640-3.jpg?v=1635992715978\"><img src=\"https://bizweb.dktcdn.net/100/348/991/files/99006d340-3.jpg?v=1635992717791\"></span></p><p class=\"ql-align-center\"><span style=\"color: rgb(0, 0, 0);\"><img src=\"https://bizweb.dktcdn.net/100/348/991/files/99004e640.jpg?v=1635992763237\"></span></p><p class=\"ql-align-justify\"><strong style=\"color: rgb(0, 0, 0);\">4. Vải dạ tweed</strong></p><p class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 0);\">Dạ tweed là loại vải được nhiều người yêu thích nhất khi nhắc đến vải dạ bởi đặc tính&nbsp;giữ ấm cực tốt. Chất vải là sự giao thoa giữa cổ điển và hiện đại khi dệt đan xen giữa những sợi len cho ra thành phẩm chất liệu dày dặn, chống thấm tốt, chuyên dùng để may các trang phục giữ ấm, áo khoác,...</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 0);\">Thành phẩm chủ yếu là sợi len nhưng hiện nay đã có rất nhiều biến tấu để tạo thành vải tweed ấn tượng nhưng vẫn giữ được nét cổ điển nguyên bản&nbsp;của loại vải này là kết hợp các chất liệu khác như mohair hay cashmere chứ không chỉ là sợi len đơn thuần nữa, vải dạ tweed đã trở thành sản phẩm vải cao cấp.</span></p><p><span style=\"color: rgb(0, 0, 0);\">Chất liệu vải dạ tweed có ưu điểm cực kỳ bền, chắc và ấm. Nguyên liệu thời thượng này khá mới mẻ và sẽ mang tới nhiều kiểu mẫu cực kỳ thời trang</span></p><p><span style=\"color: rgb(0, 0, 0);\">Trên là một số loại vải dạ được ưa chuộng hiện nay, vải còn chia ra rất nhiều loại vải dạ khác như vải dạ quang, vải dạ ép, vải dạ lông thỏ… Tùy vào nhu cầu may mặc và sử dụng mà bạn nên lựa chọn cho mình loại vải dạ phù hợp. Vải dạ là loại vải thời trang và không bao giờ lỗi mốt.</span></p>', 'admin/posts/M5BiYIFKEgSQSD6izBhbfmEB4vrQHPn0MTm4jwmc.jpg', 1, 1, 0, '2022-05-19 14:49:24', '2022-05-19 14:49:24'),
(9, 'Những lý do khiến nàng nên sở hữu 1 chiếc đầm thiết kế !!!', 'nhung-ly-do-khien-nang-nen-so-huu-1-chiec-dam-thiet-ke', '<p class=\"ql-align-justify\"><span style=\"color: black;\">Thời trang là một ngành phát triển mạnh ở Việt Nam. Thị trường thời trang sôi động và đa dạng thế nhưng thời trang may đo hay còn gọi là thời trang thiết kế là loại trang phục được ưa chuộng hơn bao giờ hết. Vì sao những mẫu đầm thiết kế lại được số đông yêu thích đến thế? Cùng Toson&nbsp;tìm hiểu xem những lý do mà nàng nên lựa chọn váy đầm thiết kế đẹp&nbsp;cho tủ đồ của mình nhé!</span></p><p class=\"ql-align-center\"><span style=\"color: black;\"><img src=\"https://bizweb.dktcdn.net/thumb/grande/100/348/991/files/toson-46838.jpg?v=1635319713306\"></span></p><p class=\"ql-align-justify\"><strong style=\"color: black;\">Lý do 1: Váy đầm thiết kế được may với chất liệu cao cấp&nbsp;</strong></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Những mẫu đầm thiết kế&nbsp;thường được may với chất liệu cao cấp và có độ bền cao. Đây là một trong những ưu điểm nổi bật khiến những chiếc váy thiết kế trở nên cuốn hút hơn. Những nét cắt may, đường chỉ hay hoa đính kết cũng được thể hiện một cách tinh tế. Và dĩ nhiên chất liệu của chúng phải được ưu tiên hàng đầu thuộc hàng chất lượng cao, giúp chiếc đầm trở nên sang trọng hơn. Chính vì thế mà những mẫu đầm thiết kế đẹp luôn được lòng hội chị em yêu thích thời trang.</span></p><p class=\"ql-align-center\"><span style=\"color: black;\"><img src=\"https://bizweb.dktcdn.net/thumb/grande/100/348/991/files/toson-46630.jpg?v=1635319736581\"></span></p><p class=\"ql-align-center\">&nbsp;</p><p class=\"ql-align-justify\"><span style=\"color: black;\">Chất liệu là một trong những yếu tố quan trọng mà các NTK dùng để thể hiện cá tính của người mặc.&nbsp;Đồng thời, tùy vào vóc dáng của mỗi người mà lựa chọn loại vải thích hợp. Và khi chọn trang phục thiết kế nên lưu ý chọn loại vải phù hợp với thời tiết, giúp nàng trông thời thượng hơn.&nbsp;</span></p><p class=\"ql-align-justify\"><strong style=\"color: black;\">Lý do 2: Kiểu dáng độc đáo, không lo bị “đụng hàng”</strong></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Điều tối kỵ nhất của phụ nữ trong thời trang đó chính là việc ăn mặc đụng hàng khi ra đường. Bởi lẽ, không ai muốn mình bị so sánh khi cùng diện một kiểu váy giống nhau. Và luôn muốn mình là người sở hữu độc nhất những món đồ đó. Vì thế, với kiểu dáng độc đáo của quần áo thiết kế sẽ giúp nàng không còn lo ngại về chuyện mặc đụng hàng với người khác.&nbsp;</span></p><p class=\"ql-align-center\"><span style=\"color: black;\"><img src=\"https://bizweb.dktcdn.net/thumb/grande/100/348/991/files/toson-46389-d30d9846-b179-422e-9f89-d94f97e35ee9.jpg?v=1635319870921\"></span></p><p class=\"ql-align-center\">&nbsp;</p><p class=\"ql-align-justify\"><span style=\"color: black;\">Đặc biệt, những mẫu váy thiết kế thường sẽ được bán với số lượng có hạn và không phải hãng thời trang nào cũng có. Nếu nàng là một cô gái yêu thích sự độc đáo, mới lạ thì đồ thiết kế sẽ là lựa chọn thích hợp nhất cho nàng đấy.&nbsp;</span></p><p class=\"ql-align-justify\"><strong style=\"color: black;\">Lý do 3: Phù hợp với nhu cầu và vóc dáng người mặc</strong></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Phụ nữ điều quan trọng nhất khi diện trang phục hằng ngày, đó là phô diễn được hết những đường nét trên cơ thể của mình và che đi những khuyết điểm không mong muốn. Những kiểu quần áo có sẵn thường sẽ được may trên những số đo chuẩn, nên nàng khó có thể lựa chọn được trang phục vừa ý mình. Vì vậy,&nbsp;váy đầm thiết kế&nbsp;ra đời để đáp ứng nhu cầu của nàng.</span></p><p class=\"ql-align-center\"><span style=\"color: black;\"><img src=\"https://bizweb.dktcdn.net/thumb/grande/100/348/991/files/toson-46575-1d4bc2b6-88fb-4485-b73e-7cc7f511267b.jpg?v=1635319886009\"></span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Thông thường những mẫu đầm thiết kế sẽ được may trên nhiều size giúp nàng, dễ dàng lựa chọn được trang phục vừa vặn với cơ thể mình và cũng có thể tùy chỉnh theo ý để đúng với số đo cơ thể của nàng.&nbsp;</span></p><p class=\"ql-align-justify\"><strong style=\"color: black;\">Những thiết kế&nbsp;</strong><a href=\"https://toson.vn/dam\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(231, 76, 60); background-color: transparent;\"><strong>đầm</strong></a><strong style=\"color: black;\">&nbsp;nàng nên có trong mùa Thu - Đông năm nay</strong></p><p><span style=\"color: black;\">1. Đầm thiết kế chất liệu tafeta:</span></p><p class=\"ql-align-center\"><span style=\"color: black;\"><img src=\"https://bizweb.dktcdn.net/thumb/grande/100/348/991/files/toson-45803-0be0fb34-c0ae-4714-a218-7672ff815ac3.jpg?v=1635319924523\"></span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Taffeta đang là chất liệu được ưa chuộng thời gian gần đây. Chất vải taffeta có độ bóng, độ cứng tạo cảm giác chững, đứng mình lại không bám da và giúp định hình dáng trang phục dễ dàng. Thêm nữa, chất liệu này vốn không bị ảnh hưởng bởi thời tiết, không co giãn khi trời nóng giống như 1 số loại vải khác. Vậy nên, các thiết kế đầm trên chất liệu tafetta đều mang đến cảm giác cuốn hút, sang chảnh mà không phải loại vải nào cũng làm được.</span></p><p class=\"ql-align-center\"><span style=\"color: black;\"><img src=\"https://bizweb.dktcdn.net/thumb/grande/100/348/991/files/toson-46145.jpg?v=1635319940505\"></span></p><p class=\"ql-align-center\"><span style=\"color: black;\"><img src=\"https://bizweb.dktcdn.net/thumb/1024x1024/100/348/991/files/toson-46282.jpg?v=1635319956153\"></span></p><p class=\"ql-align-center\"><span style=\"color: black;\"><img src=\"https://bizweb.dktcdn.net/thumb/grande/100/348/991/files/toson-46265.jpg?v=1635319980678\"></span></p><p><span style=\"color: black;\">2. Biến hóa nhiều phong cách với đầm thiết kế họa tiết&nbsp;</span></p><p class=\"ql-align-center\"><span style=\"color: black;\"><img src=\"https://bizweb.dktcdn.net/thumb/grande/100/348/991/files/41583h51.jpg?v=1635320008168\"></span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Váy họa tiết là một trong những loại trang phục được nàng yêu thích và ưa chuộng nhất vào những dịp giao mùa hay lễ hội. Bởi, chúng luôn mang lại vẻ ngoài trẻ trung, thời thượng cho người diện. Không chỉ vậy những mẫu đầm thiết kế còn rất đa dạng về màu sắc và họa tiết như: họa tiết hoa lá, kẻ, da báo... giúp nàng thỏa sức lựa chọn và diện phù hợp với phong cách của mình nhất.&nbsp;&nbsp;</span></p><p class=\"ql-align-center\"><span style=\"color: black;\"><img src=\"https://bizweb.dktcdn.net/thumb/grande/100/348/991/files/43187h81.jpg?v=1635320021977\"><img src=\"https://bizweb.dktcdn.net/thumb/grande/100/348/991/files/43505p81-2.jpg?v=1635320022666\"><img src=\"https://bizweb.dktcdn.net/thumb/grande/100/348/991/files/44186v81-2.jpg?v=1635320023279\"></span></p><p><span style=\"color: black;\">3. Đầm thiết kế&nbsp;dáng xòe</span></p><p class=\"ql-align-center\"><span style=\"color: black;\"><img src=\"https://bizweb.dktcdn.net/thumb/grande/100/348/991/files/toson-46449.jpg?v=1635320077577\"></span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Mùa nào thì diện những mẫu&nbsp;đầm thiết kế dáng xòe cũng đẹp. Thiết kế bay bổng tiểu thư cùng chất liệu mỏng nhẹ, bồng bềnh sẽ giúp nàng tự tin,tỏa sáng. Trời thu thì chỉ cần khoác nhẹ một chiếc&nbsp;áo gió hay áo blazer&nbsp;là vừa đủ ấm mà vẫn thời thượng. Chưa kể trang phục này còn giúp các nàng khoe khéo những chi tiết quyến rũ như bờ vai thon, làn da trắng sáng hay che đi những khuyết điểm của bản thân nàng. Chẳng ai có thể làm lơ trước những cô nàng ngọt ngào, lôi cuốn và thanh lịch trong những mẫu đầm thiết kế dầm dáng xòe xuất sắc.&nbsp;</span></p><p><br></p><p><br></p>', 'admin/posts/48e7hPjD9ZcAPLeTlikER0Et1LOZF193VGuCY04j.jpg', 1, 1, 69, '2022-05-19 14:50:05', '2022-05-25 16:22:34'),
(10, 'Cách Lưu Giữ Mùi Hương Cho Tủ Quần Áo Liệu Nàng Đã Biết?', 'cach-luu-giu-mui-huong-cho-tu-quan-ao-lieu-nang-da-biet', '<p class=\"ql-align-justify\"><span style=\"color: black;\">Đối với quý cô hiện đại, tủ quần áo là một trong những yếu tố giúp họ có thể nói về chính mình. Như thứ ngôn ngữ biểu hiện chân thực và chính xác về họ.</span></p><p class=\"ql-align-center\"><span style=\"color: black;\"><img src=\"https://bizweb.dktcdn.net/thumb/grande/100/348/991/files/12511e51thieu-quan-2.jpg?v=1634200062775\"></span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Do vậy, cách sắp xếp, lựa chọn trang phục cũng trang trí cho tủ quần áo của mỗi người khác nhau sẽ mang đến những cách cảm nhận khác nhau. Đặc biệt là tạo mùi hương cho tủ quần áo của mình cũng là luôn là nguyên tắc quan trọng của phái đẹp.</span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Hương thơm của tủ quần áo không chỉ thể hiện sự chỉn chu, tinh tế của họ của người sở hữu, mà còn tạo được nguồn cảm hứng, giúp nàng luôn tự tin.</span></p><p class=\"ql-align-center\"><span style=\"color: black;\"><img src=\"https://bizweb.dktcdn.net/thumb/grande/100/348/991/files/44186v81-1-c27fcd20-72ec-4ded-9ebd-440e4c0091f2.jpg?v=1634200093759\"></span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Nếu nàng còn đang băn khoăn về cách tạo mùi hương cuốn hút cho tủ quần áo của mình thì tham khảo ngay những gợi ý dưới đây của Toson nhé!</span></p><p class=\"ql-align-justify\"><strong style=\"color: black;\">1. Nước xả vải hương hoa với thành phần hữu cơ</strong></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Sử dụng nước xả vải là bước không thể thiếu khi giặt đồ. Vì thế, chỉ cần bạn chọn được loại nước xả thích hợp thì chúng sẽ là giải pháp lưu giữ hương thơm hiệu quả và đơn giản dành cho tủ đồ của phái đẹp.</span></p><p class=\"ql-align-center\"><span style=\"color: black;\"><img src=\"https://bizweb.dktcdn.net/thumb/grande/100/348/991/files/15530h5124526n81-1.jpg?v=1634200081635\"></span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Tuỳ vào phong cách cá nhân, nàng có thể lựa chọn loại nước xả phù hợp mình. Tuy nhiên, nàng có thể ưu tiên các loại nước xả có hương thơm nhẹ nhưng lưu lại lâu trên quần áo để không tạo mùi quá nồng, gây tác dụng ngược.</span></p><p class=\"ql-align-center\"><span style=\"color: black;\"><img src=\"https://bizweb.dktcdn.net/thumb/grande/100/348/991/files/24toson33718.jpg?v=1634200257965\"></span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Ngoài ra, lựa chọn các loại nước xả có thành phần tự nhiên không gây ngứa hay kích ứng cho da cũng như giữ cho quần áo luôn được mềm mại.</span></p><p class=\"ql-align-justify\"><strong style=\"color: black;\">2. Sử dụng dryer sheets</strong></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Hiện này, một phương pháp được chị em sử dụng tương đối phổ biến đó chính là giấy thơm (dryer sheets). Tạo được mùi hương dễ chịu, không tốn nhiều công sức, đây chính là “trợ thủ” đắc lực dành cho những cô nàng tương đối bận rộn.</span></p><p class=\"ql-align-center\"><span style=\"color: black;\"><img src=\"https://bizweb.dktcdn.net/thumb/grande/100/348/991/files/43511c81-1-2700d76a-5f01-46a1-ad18-591d2df927d3.jpg?v=1634200109056\"></span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Loại giấy này có cấu trúc tương đối mỏng và được sản xuất từ những sợi polyester không dệt, sau đó đem ủ với các chất làm mềm và tạo hương.&nbsp;</span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Trên thị trường có rất nhiều loại khác nhau, tuy nhiên, bạn nên lựa chọn những sản phẩm an toàn cho làn da với các thành phần đều đạt chuẩn được các tổ chức uy tín trên thế giới công nhận.</span></p><p class=\"ql-align-center\"><span style=\"color: black;\"><img src=\"https://bizweb.dktcdn.net/thumb/grande/100/348/991/files/43505p81-3.jpg?v=1634200123952\"></span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Bạn chỉ cần đặt giấy thơm vào tủ quần áo là chắc chắn trang phục của bạn sẽ được lưu trữ với mùi hương thoải mái. Đặc biệt, sự tiện dụng của sản phẩm này ở điểm đó là có thể sử dụng khi sấy quần áo hoặc đặt trong đấy vali cho quần áo trong những chuyến du lịch.</span></p><p class=\"ql-align-center\"><span style=\"color: black;\"><img src=\"https://bizweb.dktcdn.net/thumb/grande/100/348/991/files/11121e5132531n81.jpg?v=1634200237164\"></span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Một công dụng tuyệt vời khác của sản phẩm này đó chính là còn giúp cho quần áo tránh được ẩm mốc cũng rất hiệu quả.</span></p><p><strong style=\"color: black;\">3. Các loại sáp thơm có nguồn gốc tự nhiên</strong></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Bạn yêu thích những mùi hương nhẹ nhàng, có nguồn gốc từ thiên nhiên như các loài hoa hay theo mộc thì chắc chắn không thể bỏ qua các loại sáp có nguồn gốc thiên nhiên. Những sản phẩm này giúp tạo được mùi hương tự nhiên và không hề nồng nặc.&nbsp;</span></p><p class=\"ql-align-center\"><span style=\"color: black;\"><img src=\"https://bizweb.dktcdn.net/thumb/grande/100/348/991/files/43187h81-3.jpg?v=1634200137177\"></span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Chúng thường được sản xuất từ các nguyên liệu như: sáp ong, hoa quả khô, gỗ hoặc lá cây để tạo mùi hương. Với nguồn gốc thân thiện như vậy, những sản phẩm này dùng cho tủ đồ của người lớn cũng như trẻ nhỏ.</span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Kiểu dáng hay màu sắc của sáp thơm giúp chúng còn được sử dụng để trang trí tủ quần áo.&nbsp;</span></p><p class=\"ql-align-center\"><span style=\"color: black;\"><img src=\"https://bizweb.dktcdn.net/thumb/grande/100/348/991/files/24toson34294.jpg?v=1634200221937\"></span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Một lưu ý nhỏ dành cho Quý cô khi sử dụng sáp là nên cho chúng vào trong túi rút mỏng hoặc túi vải trước khi cho vào tủ đê tránh loang ra bên ngoài.</span></p><p class=\"ql-align-justify\"><strong style=\"color: black;\">4. Sử dụng túi hoa khô thảo mộc</strong></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Túi hoa khô nhỏ nhắn cùng với tinh dầu thảo mộc cũng thường được các cô nàng sử dụng rất phổ biến. Sản phẩm này sẽ mang đến mùi hương nhẹ nhàng, sự dễ chịu cũng tạo điểm nhấn cho tủ quần áo của bạn rất hiệu quả.</span></p><p class=\"ql-align-center\"><span style=\"color: black;\"><img src=\"https://bizweb.dktcdn.net/thumb/grande/100/348/991/files/41583h51-2-4acbc9ad-c2d6-482c-aae3-e5fecd92e7ff.jpg?v=1634200158270\"></span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Bạn cũng có thể tạo được sản phẩm này handmade tại nhà để lưu giữ hương thơm cho tủ quần áo của mình.</span></p><p class=\"ql-align-justify\"><strong style=\"color: black;\">5. Sử dụng tinh dầu que gỗ</strong></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Sản phẩm này có thể ưu tiên cho những tủ quần áo có kích thước lớn hoặc dạng phòng để đồ riêng. Những lọ tinh dầu que gỗ chiết xuất thiên nhiên vừa giúp bạn có thể trang trí cho không gian có điểm nhấn vừa lưu trữ được mùi hương dễ chịu thoải mái.&nbsp;</span></p><p class=\"ql-align-center\"><span style=\"color: black;\"><img src=\"https://bizweb.dktcdn.net/thumb/grande/100/348/991/files/15512w5133575b81-1.jpg?v=1634200172604\"></span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Lời khuyên của chúng tôi bạn vẫn nên sử dụng những hương thơm nhẹ nhàng như oải hương, rosemary hay bạc hà,.. Những mùi hương này vừa giúp loại bỏ được các mùi ẩm mốc, đặc biệt là trong thời tiết nóng ẩm.&nbsp;</span></p><p><span style=\"color: black;\">Một số loại còn có mùi hương rất dễ chịu và có khả năng đuổi muỗi rất hiệu quả.&nbsp;</span></p><p class=\"ql-align-justify\"><strong style=\"color: black;\">6. Tạo mùi hương với chai xịt</strong></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Khi sử dụng sản phẩm này bạn cần lựa chọn được những loại chuyên dụng để không gây ảnh hưởng đến trang phục. Ngoài ra, bạn cũng có thể ưu tiên các loại xịt có nguồn gốc tự nhiên để đảm bảo an toàn cho người mặc cũng như quần áo trong tủ.</span></p><p class=\"ql-align-center\"><span style=\"color: black;\"><img src=\"https://bizweb.dktcdn.net/thumb/grande/100/348/991/files/14520p11thieu-chan-vay-1.jpg?v=1634200187071\"></span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Hy vọng những gợi ý của chúng tôi sẽ giúp nàng có thêm những lựa chọn để tủ quần áo luôn thơm ngát. Là một cô nàng hiện đại, các nàng đừng bỏ qua những tips nhỏ này để cuộc sống thoải mái, tự tin và tràn đầy năng lượng.</span></p><p class=\"ql-align-center\"><span style=\"color: black;\"><img src=\"https://bizweb.dktcdn.net/thumb/grande/100/348/991/files/12597h51thieu-quan-1.jpg?v=1634200202080\"></span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Đối với quý cô hiện đại, tủ quần áo là một trong những yếu tố giúp họ có thể nói về chính mình. Như thứ ngôn ngữ biểu hiện chân thực và chính xác về họ.</span></p><p class=\"ql-align-center\"><span style=\"color: black;\"><img src=\"https://bizweb.dktcdn.net/thumb/grande/100/348/991/files/12511e51thieu-quan-2.jpg?v=1634200062775\"></span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Do vậy, cách sắp xếp, lựa chọn trang phục cũng trang trí cho tủ quần áo của mỗi người khác nhau sẽ mang đến những cách cảm nhận khác nhau. Đặc biệt là tạo mùi hương cho tủ quần áo của mình cũng là luôn là nguyên tắc quan trọng của phái đẹp.</span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Hương thơm của tủ quần áo không chỉ thể hiện sự chỉn chu, tinh tế của họ của người sở hữu, mà còn tạo được nguồn cảm hứng, giúp nàng luôn tự tin.</span></p><p class=\"ql-align-center\"><span style=\"color: black;\"><img src=\"https://bizweb.dktcdn.net/thumb/grande/100/348/991/files/44186v81-1-c27fcd20-72ec-4ded-9ebd-440e4c0091f2.jpg?v=1634200093759\"></span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Nếu nàng còn đang băn khoăn về cách tạo mùi hương cuốn hút cho tủ quần áo của mình thì tham khảo ngay những gợi ý dưới đây của Toson nhé!</span></p><p class=\"ql-align-justify\"><strong style=\"color: black;\">1. Nước xả vải hương hoa với thành phần hữu cơ</strong></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Sử dụng nước xả vải là bước không thể thiếu khi giặt đồ. Vì thế, chỉ cần bạn chọn được loại nước xả thích hợp thì chúng sẽ là giải pháp lưu giữ hương thơm hiệu quả và đơn giản dành cho tủ đồ của phái đẹp.</span></p><p class=\"ql-align-center\"><span style=\"color: black;\"><img src=\"https://bizweb.dktcdn.net/thumb/grande/100/348/991/files/15530h5124526n81-1.jpg?v=1634200081635\"></span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Tuỳ vào phong cách cá nhân, nàng có thể lựa chọn loại nước xả phù hợp mình. Tuy nhiên, nàng có thể ưu tiên các loại nước xả có hương thơm nhẹ nhưng lưu lại lâu trên quần áo để không tạo mùi quá nồng, gây tác dụng ngược.</span></p><p class=\"ql-align-center\"><span style=\"color: black;\"><img src=\"https://bizweb.dktcdn.net/thumb/grande/100/348/991/files/24toson33718.jpg?v=1634200257965\"></span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Ngoài ra, lựa chọn các loại nước xả có thành phần tự nhiên không gây ngứa hay kích ứng cho da cũng như giữ cho quần áo luôn được mềm mại.</span></p><p class=\"ql-align-justify\"><strong style=\"color: black;\">2. Sử dụng dryer sheets</strong></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Hiện này, một phương pháp được chị em sử dụng tương đối phổ biến đó chính là giấy thơm (dryer sheets). Tạo được mùi hương dễ chịu, không tốn nhiều công sức, đây chính là “trợ thủ” đắc lực dành cho những cô nàng tương đối bận rộn.</span></p><p class=\"ql-align-center\"><span style=\"color: black;\"><img src=\"https://bizweb.dktcdn.net/thumb/grande/100/348/991/files/43511c81-1-2700d76a-5f01-46a1-ad18-591d2df927d3.jpg?v=1634200109056\"></span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Loại giấy này có cấu trúc tương đối mỏng và được sản xuất từ những sợi polyester không dệt, sau đó đem ủ với các chất làm mềm và tạo hương.&nbsp;</span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Trên thị trường có rất nhiều loại khác nhau, tuy nhiên, bạn nên lựa chọn những sản phẩm an toàn cho làn da với các thành phần đều đạt chuẩn được các tổ chức uy tín trên thế giới công nhận.</span></p><p class=\"ql-align-center\"><span style=\"color: black;\"><img src=\"https://bizweb.dktcdn.net/thumb/grande/100/348/991/files/43505p81-3.jpg?v=1634200123952\"></span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Bạn chỉ cần đặt giấy thơm vào tủ quần áo là chắc chắn trang phục của bạn sẽ được lưu trữ với mùi hương thoải mái. Đặc biệt, sự tiện dụng của sản phẩm này ở điểm đó là có thể sử dụng khi sấy quần áo hoặc đặt trong đấy vali cho quần áo trong những chuyến du lịch.</span></p><p class=\"ql-align-center\"><span style=\"color: black;\"><img src=\"https://bizweb.dktcdn.net/thumb/grande/100/348/991/files/11121e5132531n81.jpg?v=1634200237164\"></span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Một công dụng tuyệt vời khác của sản phẩm này đó chính là còn giúp cho quần áo tránh được ẩm mốc cũng rất hiệu quả.</span></p><p><strong style=\"color: black;\">3. Các loại sáp thơm có nguồn gốc tự nhiên</strong></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Bạn yêu thích những mùi hương nhẹ nhàng, có nguồn gốc từ thiên nhiên như các loài hoa hay theo mộc thì chắc chắn không thể bỏ qua các loại sáp có nguồn gốc thiên nhiên. Những sản phẩm này giúp tạo được mùi hương tự nhiên và không hề nồng nặc.&nbsp;</span></p><p class=\"ql-align-center\"><span style=\"color: black;\"><img src=\"https://bizweb.dktcdn.net/thumb/grande/100/348/991/files/43187h81-3.jpg?v=1634200137177\"></span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Chúng thường được sản xuất từ các nguyên liệu như: sáp ong, hoa quả khô, gỗ hoặc lá cây để tạo mùi hương. Với nguồn gốc thân thiện như vậy, những sản phẩm này dùng cho tủ đồ của người lớn cũng như trẻ nhỏ.</span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Kiểu dáng hay màu sắc của sáp thơm giúp chúng còn được sử dụng để trang trí tủ quần áo.&nbsp;</span></p><p class=\"ql-align-center\"><span style=\"color: black;\"><img src=\"https://bizweb.dktcdn.net/thumb/grande/100/348/991/files/24toson34294.jpg?v=1634200221937\"></span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Một lưu ý nhỏ dành cho Quý cô khi sử dụng sáp là nên cho chúng vào trong túi rút mỏng hoặc túi vải trước khi cho vào tủ đê tránh loang ra bên ngoài.</span></p><p class=\"ql-align-justify\"><strong style=\"color: black;\">4. Sử dụng túi hoa khô thảo mộc</strong></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Túi hoa khô nhỏ nhắn cùng với tinh dầu thảo mộc cũng thường được các cô nàng sử dụng rất phổ biến. Sản phẩm này sẽ mang đến mùi hương nhẹ nhàng, sự dễ chịu cũng tạo điểm nhấn cho tủ quần áo của bạn rất hiệu quả.</span></p><p class=\"ql-align-center\"><span style=\"color: black;\"><img src=\"https://bizweb.dktcdn.net/thumb/grande/100/348/991/files/41583h51-2-4acbc9ad-c2d6-482c-aae3-e5fecd92e7ff.jpg?v=1634200158270\"></span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Bạn cũng có thể tạo được sản phẩm này handmade tại nhà để lưu giữ hương thơm cho tủ quần áo của mình.</span></p><p class=\"ql-align-justify\"><strong style=\"color: black;\">5. Sử dụng tinh dầu que gỗ</strong></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Sản phẩm này có thể ưu tiên cho những tủ quần áo có kích thước lớn hoặc dạng phòng để đồ riêng. Những lọ tinh dầu que gỗ chiết xuất thiên nhiên vừa giúp bạn có thể trang trí cho không gian có điểm nhấn vừa lưu trữ được mùi hương dễ chịu thoải mái.&nbsp;</span></p><p class=\"ql-align-center\"><span style=\"color: black;\"><img src=\"https://bizweb.dktcdn.net/thumb/grande/100/348/991/files/15512w5133575b81-1.jpg?v=1634200172604\"></span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Lời khuyên của chúng tôi bạn vẫn nên sử dụng những hương thơm nhẹ nhàng như oải hương, rosemary hay bạc hà,.. Những mùi hương này vừa giúp loại bỏ được các mùi ẩm mốc, đặc biệt là trong thời tiết nóng ẩm.&nbsp;</span></p><p><span style=\"color: black;\">Một số loại còn có mùi hương rất dễ chịu và có khả năng đuổi muỗi rất hiệu quả.&nbsp;</span></p><p class=\"ql-align-justify\"><strong style=\"color: black;\">6. Tạo mùi hương với chai xịt</strong></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Khi sử dụng sản phẩm này bạn cần lựa chọn được những loại chuyên dụng để không gây ảnh hưởng đến trang phục. Ngoài ra, bạn cũng có thể ưu tiên các loại xịt có nguồn gốc tự nhiên để đảm bảo an toàn cho người mặc cũng như quần áo trong tủ.</span></p><p class=\"ql-align-center\"><span style=\"color: black;\"><img src=\"https://bizweb.dktcdn.net/thumb/grande/100/348/991/files/14520p11thieu-chan-vay-1.jpg?v=1634200187071\"></span></p><p class=\"ql-align-justify\"><span style=\"color: black;\">Hy vọng những gợi ý của chúng tôi sẽ giúp nàng có thêm những lựa chọn để tủ quần áo luôn thơm ngát. Là một cô nàng hiện đại, các nàng đừng bỏ qua những tips nhỏ này để cuộc sống thoải mái, tự tin và tràn đầy năng lượng.</span></p><p class=\"ql-align-center\"><span style=\"color: black;\"><img src=\"https://bizweb.dktcdn.net/thumb/grande/100/348/991/files/12597h51thieu-quan-1.jpg?v=1634200202080\"></span></p><p><br></p>', 'admin/posts/6i0DV4Ts9GROkD8M4kg4eEGNAY4xBPuhejXRQNo7.jpg', 1, 1, 6, '2022-05-19 14:50:54', '2022-05-25 11:37:45'),
(11, 'Giới thiệu về TOTORO SHOP', 'gioi-thieu-ve-totoro-shop', '<p><strong>Về chúng tôi</strong></p><p>SHEIN là một công ty thương mại điện tử thời trang nhanh B2C quốc tế. Công ty chủ yếu tập trung vào trang phục của phụ nữ, nhưng cũng cung cấp quần áo nam, quần áo trẻ em, phụ kiện, giày dép, túi xách và các mặt hàng thời trang khác. SHEIN chủ yếu nhắm vào Châu Âu, Châu Mỹ, Úc và Trung Đông cùng với các thị trường tiêu dùng khác. Thương hiệu được thành lập vào năm 2012, và kể từ đó nó đã giữ vững triết lý “mọi người đều có thể thưởng thức vẻ đẹp của thời trang”.Hoạt động kinh doanh của nó bao phủ hơn 150 quốc gia trên thế giới.</p><p><strong>Sứ mệnh của chúng tôi</strong></p><p>SHEIN tự hào cung cấp các phong cách theo xu hướng phục vụ cho cả nữ trẻ và thanh thiếu niên. SHEIN tuân thủ quan điểm \"mọi người đều có thể tận hưởng vẻ đẹp của thời trang\". SHEIN có thể đứng đầu trong các xu hướng thời trang mới nhất từ khắp nơi trên thế giới đồng thời nhanh chóng đưa các kiểu dáng này ra thị trường. Vì vậy, cho dù bạn đang tìm kiếm những chiếc đầm boho và áo thun họa tiết hay áo sơ mi sang trọng và đồ bơi, SHEIN là cửa hàng lý tưởng cho các tín đồ thời trang hiện đại nhưng tiết kiệm. Nhằm mục đích cung cấp các sản phẩm chất lượng cao và thời trang với giá hấp dẫn cho mọi người dùng trên thế giới.</p><p><strong>Tìm thấy Chúng tôi</strong></p><p>SHEIN hiện đã vận chuyển đến hơn 150 quốc gia trên toàn thế giới. Các trang web Hoa Kỳ, Tây Ban Nha, Pháp, Nga, Đức, Ý, Úc và Trung Đông, SHEIN vận chuyển từ một trong nhiều kho hàng có vị trí toàn cầu. SHEIN tiếp tục phát triển mạnh vì có nhân viên sản xuất xuất sắc và cùng giá trị của chúng tôi. SHEIN nhằm mục đích cung cấp các sản phẩm hợp thời trang có giá trị cao nhất đồng thời được chất lượng, giá trị và dịch vụ.</p><p><br></p><p><img src=\"https://img.ltwebstatic.com/images3_acp/2022/03/29/16485554682afb70e3c772e082102dd496993acfb3.jpg\"></p><p class=\"ql-align-center\"><strong>MEET SHEIN</strong></p><p><a href=\"https://www.shein.com.vn/Product-Design-a-738.html\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(102, 102, 102); background-color: transparent;\"><img src=\"https://img.shein.com/images2/2018/11/29/15434606512441018221.jpg\"></a></p><p><strong>Thiết kế Sản phẩm</strong></p><p>Tất cả sản phẩm bắt đầu từ một ý tưởng, hoặc suy nghĩ, được thiết kế bởi nhà thiết kế.</p><p>Tuổi thọ của sản phẩm bắt đầu ngay cả trước khi bút của nhà thiết kế chạm vào giấy.</p><p><a href=\"https://www.shein.com.vn/Product-Design-a-738.html\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(9, 60, 100); background-color: transparent;\">TÌM THÊM&nbsp;</a></p><p><strong>Sản xuất</strong></p><p>Tất cả các sản phẩm của chúng tôi được tạo ra bởi máy móc nhấn mạnh độ chính xác đông thời chú ý đến chi tiết và kiểu dáng.</p><p>Chúng tôi coi trọng chất lượng và đôi khi các sản phẩm của chúng tôi được chế tạo bởi các cá nhân có kinh nghiệm trong khâu tay.</p><p><a href=\"https://www.shein.com.vn/Manufacturing-a-739.html\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(9, 60, 100); background-color: transparent;\">TÌM THÊM&nbsp;</a></p><p><a href=\"https://www.shein.com.vn/Manufacturing-a-739.html\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(102, 102, 102); background-color: transparent;\"><img src=\"https://img.shein.com/images2/2018/11/29/15434606851110958515.jpg\"></a></p><p><a href=\"https://www.shein.com.vn/Quality-Assurance-a-740.html\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(102, 102, 102); background-color: transparent;\"><img src=\"https://img.shein.com/images2/2018/11/29/15434607113621832211.jpg\"></a></p><p><strong>Đảm bảo Chất lượng</strong></p><p>Sau khi kiểm tra nghiêm ngặt, các sản phẩm của chúng tôi được sản xuất ra mà chúng tôi có thể tự hào - một mặt hàng thời thượng và đáng tin cậy!</p><p><a href=\"https://www.shein.com.vn/Quality-Assurance-a-740.html\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(9, 60, 100); background-color: transparent;\">TÌM THÊM&nbsp;</a></p><p><strong>Nhiếp ảnh</strong></p><p>Thông qua sự hợp tác sáng tạo với các nhiếp ảnh gia và người mẫu, chúng tôi có thể nắm bắt các chi tiết của mọi phong cách để bạn xem trước khi bạn quyết định mua hàng.</p><p><a href=\"https://www.shein.com.vn/Photography-a-741.html\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(9, 60, 100); background-color: transparent;\">TÌM THÊM&nbsp;</a></p><p><a href=\"https://www.shein.com.vn/Photography-a-741.html\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(102, 102, 102); background-color: transparent;\"><img src=\"https://img.shein.com/images2/2018/11/29/15434607563513781311.jpg\"></a></p><p><a href=\"https://www.shein.com.vn/Logistics-and-Trasportation-a-742.html\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(102, 102, 102); background-color: transparent;\"><img src=\"https://img.shein.com/images2/2018/11/29/15434607782056434179.jpg\"></a></p><p><br></p><p><strong>Vận chuyển và Giao hàng</strong></p><p>Sau khi các sản phẩm của chúng tôi được thiết kế đặc biệt và đóng gói cẩn thận, chúng được chất lên một chiếc máy bay chở hàng để thực hiện chuyến đi xuyên lục địa nhanh chóng cho bạn.</p><p><a href=\"https://www.shein.com.vn/Logistics-and-Trasportation-a-742.html\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(9, 60, 100); background-color: transparent;\">TÌM THÊM&nbsp;</a></p><p><strong>Chăm sóc Khách hàng</strong></p><p>Nếu bạn có câu hỏi, chúng tôi có thể hỗ trợ bạn. Đội ngũ chuyên gia dịch vụ khách hàng của chúng tôi có thể giao tiếp với bạn bằng các ngôn ngữ như: tiếng Anh, tiếng Pháp, tiếng Đức, tiếng Nga và tiếng Ả Rập.</p><p><a href=\"https://www.shein.com.vn/Coustomer-Service-a-743.html\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(9, 60, 100); background-color: transparent;\">TÌM THÊM&nbsp;</a></p><p><a href=\"https://www.shein.com.vn/Coustomer-Service-a-743.html\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(34, 34, 34); background-color: transparent;\"><img src=\"https://img.shein.com/images2/2018/11/29/15434608022137642733.jpg\"></a></p>', NULL, 1, 1, 0, '2022-05-24 11:30:43', '2022-05-24 11:30:43'),
(12, 'CHÍNH SÁCH ĐỔI HÀNG', 'chinh-sach-doi-hang', '<p class=\"ql-align-center\"><strong>ĐỔI HÀNG TRONG 30 NGÀY</strong></p><p><strong>ĐIỀU KIỆN ĐỔI HÀNG</strong></p><p>- Áp dụng cho đơn hàng mua tại hệ thống showroom Aristino trên toàn quốc và mua hàng qua website:&nbsp;<a href=\"https://aristino.com/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"background-color: transparent; color: rgb(0, 0, 255);\">https://aristino.com/</a>.</p><p>- Sản phẩm còn nguyên vẹn ban đầu, chưa qua sử dụng, có đủ tem mác, mã vạch. Sản phẩm còn đầy đủ hộp và phụ kiện kèm theo, chứng từ mua hàng, phiếu bảo hành, và quà khuyến mãi kèm theo sản phẩm.</p><p>- Sản phẩm khi nhận lại phải có hóa đơn mua hàng kèm theo. Hàng hóa được xác định nguồn gốc mua tại hệ thống showroom Aristino và kênh bán hàng online của Aristino ( căn cứ vào hóa đơn mua hàng và tem nhận diện dán trên sản phẩm)</p><p>- Sản phẩm được xác định&nbsp;lỗi kỹ&nbsp;thuật bởi phòng kỹ&nbsp;thuật của Aristino, không do tác động bên ngoài.</p><p>- Sản phẩm sử dụng và bảo quản đúng theo hướng dẫn về sử dụng và bảo quản của công ty.</p><p>- Mỗi sản phẩm chỉ được đổi 01 lần</p><p>- Cửa hàng không nhận trả hàng và hoàn tiền trong mọi trường hợp. Sản phẩm mới đổi sẽ ngang giá hoặc hơn sản phẩm cần đổi.</p><p>- Trường hợp sản phẩm đã được Aristino viết hóa đơn tài chính, khách hàng muốn đổi hàng viết lại hóa đơn tài chính phù hợp với mặt hàng hoặc phải làm thủ tục hủy hóa đơn theo quy định của pháp luật</p><p><strong>Phí đổi sản phẩm</strong>: Đổi miễn phí</p><p><strong>Thời gian đổi sản phẩm</strong></p><p>- 30 ngày đầu tiên (tính từ ngày mua hàng) áp dụng toàn hệ thống Aristino</p><p><strong>CÁC TRƯỜNG HỢP TỪ CHỐI ĐỔI HÀNG/ĐỔI HÀNG NGOÀI QUY ĐỊNH</strong></p><p>- Quá hạn thời gian đổi hàng.</p><p>- Không có hóa đơn mua hàng.</p><p>- Nhãn mác, mã vạch, bao bì, hộp đựng, sản phẩm không còn nguyên trạng, đã qua sử dụng</p><p>- Sản phẩm không còn tem bảo hành, sử dụng sai quy cách, bảo quản và va chạm, ma sát với vật cứng làm trầy xước, hư hỏng=&gt; từ chối đổi hàng, bảo hành theo chính sách bảo hành của Aristino=&gt; không áp dụng đổi, khách hàng chịu chi phí sửa chữa.</p><p>- Sản phẩm đổi không thuộc cửa hàng.</p><p>- Sản phẩm đã bị chỉnh sửa, bị bẩn, hỏng, lỗi...do những tác động bên ngoài sau khi mua; các chi tiết /phụ kiện gắn liền với sản phẩm không còn nguyên trạng.</p><p>- Các sản phẩm giảm giá, mua trong CTKM, voucher...</p><p>- Mặt hàng đồ lót, Bít tất chỉ được phép đổi khi thuộc một trong các trường hợp sau:</p><p>- Sản phẩm giao đến không đúng mẫu mã, chủng loại khách đã đặt</p><p>- Bị lỗi trong quá trình vận chuyển của Aristino gây ra</p><p>- Sản phẩm bị lỗi hỏng do nhà sản xuất</p><p>-&nbsp;<strong>Phí đổi sản phẩm</strong>:&nbsp;Theo quy định&nbsp;của Aristino</p><p><strong>ĐỐI VỚI SẢN PHẨM BỊ LỖI DO NGƯỜI SỬ DỤNG&nbsp;&nbsp;&nbsp;</strong>&nbsp;</p><p>- Áp dụng chung cho bán hàng online và bán hàng tại showroom</p><p>- Phí đổi sản phẩm: Theo quy định của Aristino</p><p><strong>QUY ĐỊNH VỀ PHÍ VẬN CHUYỂN ĐỔI HÀNG</strong></p><p>- Đổi hàng do sản phẩm lỗi kĩ thuật/lỗi chủ quan dịch vụ của Aristino: Aristino chịu phí vận chuyển 2 chiều</p><p>- Đổi hàng từ nhu cầu của khách hàng: Khách hàng chịu phí vận chuyển 2 chiều(nếu có)</p>', NULL, 1, 1, 0, '2022-05-24 11:44:22', '2022-05-24 11:44:22'),
(13, 'CHÍNH SÁCH BẢO HÀNH', 'chinh-sach-bao-hanh', '<p class=\"ql-align-center\"><strong>CHÍNH SÁCH BẢO HÀNH</strong></p><p class=\"ql-align-justify\"><strong>Phạm vi và địa điểm bảo hành</strong></p><p class=\"ql-align-justify\"><strong>- Sản phẩm bảo hành:&nbsp;</strong>Sản phẩm chính hãng của Aristino được phân phối chính thức tại hệ thống gian hàng và showroom trên toàn quốc bị lỗi kỹ thuật (không bao gồm các lỗi sản phẩm mà khách hàng đã được thông báo trước khi quyết định mua hàng) hoặc lỗi phát sinh trong quá trình khách hàng sử dụng có thể khắc phục sửa chữa được.</p><p class=\"ql-align-justify\"><strong>- Địa điểm nhận bảo hành:</strong>&nbsp;Showroom Aristino trên toàn quốc hoặc Phòng Dịch Vụ CSKH của K&amp;G.</p><p class=\"ql-align-justify\"><strong>- Thời hạn bảo hành</strong></p><p class=\"ql-align-justify\">Nhóm hàng Áo da thật, túi xách da thật</p><p class=\"ql-align-justify\">+ Thời gian bảo hành: 12 tháng</p><p class=\"ql-align-justify\">+ Chi tiết lỗi: Lỗi tuột chỉ, bục chỉ do thắt nút lỏng hoặc chất lượng chỉ kém, da bị hỏng do chất lượng da kém</p><p class=\"ql-align-justify\">Nhóm hàng Ví da, Clutch, dây lưng, giày nam</p><p class=\"ql-align-justify\">+ Thời gian bảo hành: 6 tháng</p><p class=\"ql-align-justify\">+Chi tiết lỗi: Lỗi tuột chỉ, bục chỉ do thắt nút lỏng hoặc chất lượng chỉ kém, da bị hỏng do chất lượng da kém, chốt mặt dây lưng</p><p class=\"ql-align-justify\">Nhóm hàng Sản phẩm phụ kiện kim loại (caflink, khóa kéo, móc khóa, chốt mặt dây lưng)</p><p class=\"ql-align-justify\">+ Thời gian bảo hành: 6 tháng</p><p class=\"ql-align-justify\">+ Chi tiết lỗi: Lỗi kẹt khóa, trượt khóa, gãy khóa, hỏng chốt</p><p class=\"ql-align-justify\">Nhóm hàng Áo giả da, áo vest, jacket, lông vũ, dạ ( dòng cao cấp)</p><p class=\"ql-align-justify\">+ Thời gian bảo hành: 30 ngày</p><p class=\"ql-align-justify\">+ Chi tiết lỗi: Lỗi vải, lỗi may, lỗi phụ liệu, các lớp dập ép, khóa, móc kéo, logo bị hư hỏng.</p><p class=\"ql-align-justify\">Nhóm hàng Áo Polo, T-shirt, tanktop, quần Sooc, Bộ đồ , Áo sơ mi, áo Len. Quần âu, quần Khaki</p><p class=\"ql-align-justify\">+ Thời gian bảo hành: 30&nbsp;ngày</p><p class=\"ql-align-justify\">+ Chi tiết lỗi: Lỗi vải, lỗi may, lỗi phụ liệu, các lớp dập ép, khóa, móc kéo, logo bị hư hỏng.</p><p class=\"ql-align-justify\">Nhóm hàng Sản phẩm phụ kiện đồ vải (cà vạt)</p><p class=\"ql-align-justify\">+ Thời gian bảo hành: 30&nbsp;ngày</p><p class=\"ql-align-justify\">+ Chi tiết lỗi: Lỗi vải, lỗi may.</p><p class=\"ql-align-justify\">Nhóm hàng: Sản phẩm phụ kiện đồ da: Lót giày</p><p class=\"ql-align-justify\">+ Thời gian bảo hành: 30 ngày từ ngày mua</p><p class=\"ql-align-justify\">+ Chi tiết lỗi: Lỗi tuột chỉ, bục chỉ do thắt nút lỏng hoặc chất lượng chỉ kém, da bị hỏng do chất lượng da kém</p><p class=\"ql-align-justify\"><strong>Điều kiện bảo hành miễn phí</strong></p><p class=\"ql-align-justify\">- Sản phẩm đó còn thời hạn bảo hành được tính kể từ ngày mua hàng trên chứng từ xuất bán của K&amp;G</p><p class=\"ql-align-justify\">-&nbsp;Sản phẩm lỗi và được sử dụng đúng cách theo mục hướng dẫn sử dụng đi kèm sản phẩm</p><p class=\"ql-align-justify\">-&nbsp;Tất cả các sự cố về mặt kỹ thuật của nhà sản xuất như:&nbsp;</p><p class=\"ql-align-justify\">* Lỗi tuột chỉ, bục chỉ do thắt nút lỏng hoặc chất lượng chỉ kém (không bảo hành về lỗi đứt chỉ do ngoại lực tác động)</p><p class=\"ql-align-justify\">* Trường hợp da/ vải bị hỏng do chất lượng da/vải kém, (không bảo hành về lỗi hỏng da/vải do ngoại lực tác động, da/vải mòn do cọ sát nhiều, da/vải mục hỏng do khách hàng bảo quản không đúng cách, để sản phẩm trong môi trường bất lợi cho đồ da/vải)</p><p class=\"ql-align-justify\">* Lớp keo dán, keo ép nhiệt bị bong, logo bị hỏng.</p><p class=\"ql-align-justify\">-&nbsp;Lỗi do quá trình vận chuyển (có biên bản giao nhận đi kèm)</p><p class=\"ql-align-justify\"><strong>Trường hợp không được bảo hành</strong></p><p class=\"ql-align-justify\">- Không bảo hành phụ kiện: phụ kiện bị hỏng va đập hoặc làm mất, bị hao mòn hoặc cháy trong quá trình sử dụng, hoặc do môi trường gây ra</p><p class=\"ql-align-justify\">- Không nhận các sản phẩm đã quá cũ (da/vải và đế&nbsp;bị lão hóa, không còn độ bám dính của keo, chỉ, hoặc không có phụ kiện để thay thế).</p><p class=\"ql-align-justify\">- Những thiệt hại trong quá trình sử dụng: sản phẩm bị rách, trầy xước do người sử dụng (va quệt, rạch, co kéo, đựng quá nặng, ẩm mốc, ố vàng, bạc màu do tiếp xúc với mồ hôi, nước mưa…)</p><p class=\"ql-align-justify\">- Sản phẩm bị biến dạng, giảm giá, hoặc không có chứng từ mua hàng.</p><p class=\"ql-align-justify\">- Sản phẩm đã được sửa chữa ở một nơi khác.</p><p class=\"ql-align-justify\"><strong>Thời hạn bảo hành chi tiết sản phẩm&nbsp;</strong></p><p class=\"ql-align-justify\">- Bảo hành lên tới 12 tháng đối với sản phẩm đồ da (theo quy định của từng loại và từng chi tiết của sản phẩm) kể từ ngày mua hàng được ghi trên hóa đơn bán hàng</p><p class=\"ql-align-justify\">- Bảo hành lên tới 30 ngày đối với sản phẩm đồ vải (theo quy định của từng nhóm sản phẩm và từng chi tiết của sản phẩm) kể từ ngày mua hàng được ghi trên hóa đơn bán hàng</p><p class=\"ql-align-justify\">- Showroom không nhận sửa chữa những sản phẩm quá cũ, da/ vải bị lão hóa, bị nhão, không còn độ bám dính của keo, chỉ hoặc không còn phụ kiện thay thế- Trong trường hợp lỗi da/ vải ngoại quan, Aristino không thể xử lý sẽ được đổi sang một sản phẩm khác cùng mặt hàng, nếu cùng một mặt hàng không có sẵn để thay thế, Aristino sẽ đổi sản phẩm bằng hoặc thấp hơn giá trị ban đầu của sản phẩm.&nbsp;</p><p class=\"ql-align-justify\">- Với sản phẩm lỗi kỹ thuật đã quá thời gian quy định đổi hàng của chính sách, Aristino sẽ tiến hành bảo hành, thay thế theo hiện trạng lỗi của phụ kiện, trên chính phụ kiện đó (ví dụ: dây lưng hỏng mặt, hỏng chốt, Aristino sẽ bảo hành hoặc thay thế mặt và chốt)</p><p class=\"ql-align-justify\"><strong>Thời hạn bảo dưỡng</strong></p><p class=\"ql-align-justify\">- Bảo dưỡng sản phẩm trọn đời.<strong>&nbsp;\"Một lần mua - Bảo dưỡng trọn đời\"</strong>&nbsp;với các quá trình làm mới, làm sạch, làm bóng, làm mềm sản phẩm.</p><p class=\"ql-align-justify\"><strong>Quy định về tính phí vận chuyển</strong></p><p class=\"ql-align-justify\">- Trường hợp khách hàng chuyển sản phẩm muốn bảo hành tới Showroom hoặc phòng CSKH, vui lòng gọi trước tới tổng đài hệ thống 1800 6226 hoặc Hotline tại Showroom để được tư vấn và hỗ trợ.</p><p class=\"ql-align-justify\">- Trường hợp đã bảo hành xong, công ty chuyển trả sản phẩm cho showroom hoặc cho khách hàng: công ty K&amp;G sẽ chịu phí vận chuyển nếu có phát sinh.</p><p class=\"ql-align-justify\">- Trường hợp hỗ trợ bảo hành ngoài chính sách cho khách hàng: Quý khách vui lòng chịu phí vận chuyển 2 chiều.</p><p><br></p>', NULL, 1, 1, 0, '2022-05-24 11:44:42', '2022-05-24 11:44:42');
INSERT INTO `posts` (`id`, `title`, `slug`, `content`, `photo`, `status`, `added_by`, `views`, `created_at`, `updated_at`) VALUES
(14, 'HƯỚNG DẪN MUA HÀNG', 'huong-dan-mua-hang', '<p class=\"ql-align-center\"><strong>HƯỚNG DẪN MUA HÀNG</strong></p><p class=\"ql-align-justify\"><strong>I. HƯỚNG DẪN MUA HÀNG TRỰC TUYẾN TẠI WEBSITE ARISTINO.COM</strong></p><p class=\"ql-align-justify\"><strong>Bước 1:</strong></p><p class=\"ql-align-justify\">Truy cập website của Aristino tại địa chỉ&nbsp;<a href=\"http://aristino.vn/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(13, 110, 253); background-color: transparent;\">http://aristino.c</a><a href=\"https://aristino.com/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(13, 110, 253); background-color: transparent;\">om</a>. Tìm kiếm tới danh mục và sản phẩm cần mua (qua thanh tìm kiếm hoặc danh mục sản phẩm)</p><p class=\"ql-align-justify\"><img src=\"https://aristino.com/Data/upload/images/News/huong-dan-mua-hang/huong-dan-mua-hang.jpg\"></p><p class=\"ql-align-justify\"><strong>Bước 2:</strong></p><p class=\"ql-align-justify\">Tại trang chi tiết sản phẩm, quý khách chọn size chọn màu, số lượng và bấm nút Mua ngay nếu quý khách muốn thanh toán luôn</p><p class=\"ql-align-justify\">Trong trường hợp quý khách muốn mua tiếp chỉ cần thêm vào giỏ hàng, và lựa chọn các sản phẩm khác. Tại giỏ hàng, quý khách có thể xem lại danh sách các sản phẩm có trong giỏ hàng.</p><p class=\"ql-align-justify\">Quý khách có thể thay đổi số lượng sản phẩm hoặc xóa bỏ sản phẩm trong giỏ hàng của mình.</p><p class=\"ql-align-justify\"><img src=\"https://aristino.com/Data/upload/images/News/huong-dan-mua-hang/huong-dan-mua-hang-01.jpg\"></p><p class=\"ql-align-justify\">- Thực hiện thanh toán đơn hàng bằng cách nhập thông tin thanh toán -&gt;&nbsp;Phương thức thanh toán</p><p class=\"ql-align-justify\">-&nbsp;Nếu có mã giảm giá của chương trình khuyến mại quý khách vui lòng nhập vào ô:&nbsp;&nbsp;Mã giảm giá&nbsp;và sử dụng mã giảm giá cho đơn hàng</p><p class=\"ql-align-justify\"><img src=\"https://aristino.com/Data/upload/images/News/huong-dan-mua-hang/huong-dan-mua-hang-02.jpg\"></p><p class=\"ql-align-justify\"><strong>Bước 3:</strong></p><p class=\"ql-align-justify\">Chọn phương thức thành toán</p><p class=\"ql-align-justify\"><img src=\"https://aristino.com/Data/upload/images/News/huong-dan-mua-hang/huong-dan-mua-hang-03.jpeg\"></p><p class=\"ql-align-justify\"><strong>Bước 4:</strong></p><p class=\"ql-align-justify\">Click&nbsp;Đặt hàng&nbsp;để hoàn tất quá trình mua hàng tại website Aristino.com. Click tiếp tục mua hàng nếu muốn mua thêm sản phẩm khác</p><p class=\"ql-align-justify\"><img src=\"https://aristino.com/Data/upload/images/News/bao-chi-noi-ve-chung-toi/thanh-toan-thanh-cong.png\"><strong>II. Phương thức thanh toán</strong></p><p class=\"ql-align-justify\">Để thuận tiện cho quý khách trong quá trình mua sắm, Aristino thực hiện phương thức thanh toán cụ thể như sau:</p><p class=\"ql-align-justify\"><strong>Thanh toán khi giao hàng (COD)</strong></p><p class=\"ql-align-justify\">COD (dịch vụ giao hàng nhận tiền): Nhân viên vận chuyển thu tiền mặt khi giao hàng cho khách.</p><p class=\"ql-align-justify\"><strong>Thanh toán chuyển khoản</strong></p><p class=\"ql-align-justify\">1. Tên tài khoản: Công ty Cổ phần Đầu tư K&amp;G Việt Nam</p><p class=\"ql-align-justify\">Số tài khoản: 19026080998899</p><p class=\"ql-align-justify\">Ngân hàng: Techcombank - CN Đông Đô - Hà Nội</p><p class=\"ql-align-justify\">2. Tên tài khoản: Công ty Cổ phần Đầu tư K&amp;G Việt Nam</p><p class=\"ql-align-justify\">Số tài khoản: 28910006998888</p><p class=\"ql-align-justify\">Ngân hàng: BIDV - CN Ngọc Khánh - Hà Nội</p><p class=\"ql-align-justify\"><strong>* Lưu ý</strong>: Quý khách sử dụng cú pháp sau trong nội dung Chuyển khoản: \"<strong>Tên KH - Số Điện thoại mua hàng - Mã đơn hàng</strong>\".</p><p class=\"ql-align-justify\">Ví dụ:&nbsp;<strong>Nguyễn Văn A - 0987654321 - DH100123</strong></p><p class=\"ql-align-justify\"><strong>Thanh toán qua VNpay</strong></p><p class=\"ql-align-justify\">Hướng dẫn</p><p class=\"ql-align-justify\"><img src=\"https://file.hstatic.net/1000199383/file/1_grande.jpg\"></p><p class=\"ql-align-justify\"><img src=\"https://file.hstatic.net/1000199383/file/2_grande.jpg\"></p><p class=\"ql-align-justify\"><img src=\"https://file.hstatic.net/1000199383/file/3_grande.jpg\"></p><p class=\"ql-align-justify\"><img src=\"https://file.hstatic.net/1000199383/file/4_grande.jpg\"></p><p class=\"ql-align-justify\"><img src=\"https://file.hstatic.net/1000199383/file/5_grande.jpg\"></p><p class=\"ql-align-justify\"><img src=\"https://file.hstatic.net/1000199383/file/6_grande.jpg\"></p><p class=\"ql-align-justify\"><img src=\"https://file.hstatic.net/1000199383/file/7_grande.jpg\"></p><p class=\"ql-align-justify\"><img src=\"https://file.hstatic.net/1000199383/file/8_grande.jpg\"></p><p class=\"ql-align-justify\"><img src=\"https://file.hstatic.net/1000199383/file/9_grande.jpg\"></p><p><br></p>', NULL, 1, 1, 1, '2022-05-24 11:45:22', '2022-05-25 10:02:02'),
(15, 'Phương thức thanh toán', 'phuong-thuc-thanh-toan', '<p><strong>Thanh Toán Khi Nhận Hàng (COD)</strong></p><p><img src=\"https://img.shein.com/images2/2018/06/25/1529911308340164685.png\"></p><p>Chúng tôi hỗ trợ dịch vụ thanh toán khi nhận hàng. Nếu bạn muốn chọn dịch vụ này thì cần phải điền đúng số điện thoại và địa chỉ trong khi quá trình đặt hàng</p><p><strong>Thanh Toán Bằng Paypal</strong></p><p><img src=\"https://shein.ltwebstatic.com/advertise//shein/www/images_sheIn/paie1.png\"></p><p>Khi bạn thanh toán bằng Paypal, trang của bạn sẽ chuyển đến trang thanh toán Paypal, nơi bạn có thể sử dụng tên người dùng và mật khẩu Paypal để đăng nhập vào tài khoản PayPal để thanh toán.</p><p>Nếu bạn không có tài khoản Paypal, bạn có thanh toán. Vui lòng nhấp vào \"Thanh toán bằng Thẻ ghi nợ / Thẻ tín dụng\" và bạn sẽ được chuyển đến trang an toàn nơi bạn có thể nhập thông tin thẻ tín dụng hoặc sử dụng Paypal an toàn để thanh toán.</p><p><strong>Thanh Toán Bằng Thẻ Tín Dụng / Ghi Nợ</strong></p><p><img src=\"https://img.ltwebstatic.com/images3_acp/2021/04/09/161793311589a2694cadea2884d760ac0901d89b9e.jpg\">&nbsp;<img src=\"https://sheinsz.ltwebstatic.com/image/card/n-3-mastercard_vf9b0f97.png?v=shein_364\">&nbsp;<img src=\"https://sheinsz.ltwebstatic.com/image/card/n-8-maestro_v781c6fd.png?v=shein_364\">&nbsp;<img src=\"https://sheinsz.ltwebstatic.com/image/card/n-7-american-express_vb186b55.png?v=shein_364\">&nbsp;<img src=\"https://img.shein.com/images2/2018/06/25/15299124222613681656.png\"></p><p>Các tùy chọn thẻ tín dụng hiện có được liệt kê ở trên. Các công ty thẻ tín dụng được liệt kê ở trên là những thẻ tín dụng được sử dụng phổ biến nhất trên trang web này. Đừng lo lắng nếu công ty thẻ tín dụng của bạn không được liệt kê, chúng tôi khuyến khích bạn tiếp tục và mua hàng.</p><p>Xin lưu ý rằng SHEIN không thu thập số thẻ tín dụng / thẻ ghi nợ hoặc thông tin cá nhân của bạn khi bạn thanh toán. Nếu bạn có câu hỏi về các giao dịch của bạn trên trang web của chúng tôi, vui lòng tham khảo ý kiến của ngân hàng phát hàng thẻ để biết thông tin.</p><p><strong>\"Mã Giảm Giá\" Và \"Điểm\"</strong></p><p>Bạn có thể sử dụng phiếu giảm giá và điểm khi thanh toán. Sau khi nhập mã giảm giá và điểm của bạn, nhấp vào \"Sử dụng\" và hệ thống sẽ tự động điều chỉnh tổng số tiền. Xin lưu ý rằng nếu bạn không nhấp vào \"Sử dụng\" trước khi quyết toán, tổng số tiền của bạn sẽ không phản ánh ưu đãi từ phiếu giảm giá và điểm.</p><p><br></p><p><strong>Lưu ý:</strong></p><ul><li>Vui lòng đảm bảo mã số giảm giá bạn nhập chính xác giống với chúng tôi cung cấp cho bạn. Không có khoảng trống trước, trùng hoặc sau. Để tránh những sai lầm, chúng tôi khuyên bạn nên sao chép / dán mã đó.</li><li>Không thể kết hợp phiếu giảm giá. Mỗi đơn hàng chỉ có một phiếu giảm giá.</li><li>Các phiếu giảm giá sẽ được áp dụng các điều khoản ưu đãi. Điều này giúp loại bỏ một số sản phẩm không có sẵn cho phiếu giảm giá.</li><li>Bạn có thể thanh toán tối đa 70% số tiền mua hàng của bạn với các điểm thưởng khi thanh toán. Hãy nhớ 100 điểm = 1 đô la.</li></ul><p><br></p>', NULL, 1, 1, 0, '2022-05-24 11:46:23', '2022-05-24 11:46:23'),
(16, 'CHÍNH SÁCH GIAO NHẬN', 'chinh-sach-giao-nhan', '<p class=\"ql-align-center\"><strong>CHÍNH SÁCH GIAO HÀNG</strong></p><p class=\"ql-align-justify\"><strong>Phương thức giao hàng</strong></p><p class=\"ql-align-justify\">Để thuận tiện cho quý khách trong quá trình mua sắm, Aristino thực hiện chính sách giao hàng như sau:</p><ol><li class=\"ql-align-justify\"><strong>Phí vận chuyển:&nbsp;</strong>Từ ngày 20/02/2020</li><li class=\"ql-align-justify\">🛒&nbsp;Đơn hàng có hóa đơn thanh toán nguyên giá từ 500k hoặc đơn hàng đã thanh toán bằng hình thức chuyển khoản, qua ví điện tử online:&nbsp;<strong>áp dụng freeship (phí ship 0 đồng)</strong></li><li class=\"ql-align-justify\">🛒 Đơn hàng có hóa đơn thanh toán từ 500k trở lên và có chứa sản phẩm giảm giá:&nbsp;<strong>áp dụng phí ship 20.000đ</strong></li><li class=\"ql-align-justify\">🛒 Đơn hàng có hóa đơn thanh toán dưới 500k:&nbsp;<strong>Áp dụng thu phí ship 30.000đ</strong></li><li class=\"ql-align-justify\">🛒 Đơn hàng nội thành Hà Nội cần ship nhanh trong 6h:&nbsp;<strong>áp dụng thu phí ship 40.000đ</strong></li><li class=\"ql-align-justify\">🛒 Toàn bộ đơn hàng online đều&nbsp;<strong>không áp dụng đồng kiểm</strong>&nbsp;(xem hàng trước khi nhận)</li><li class=\"ql-align-justify\">🛒 Khách hàng thanh toán, nhận hàng đều được&nbsp;<strong>áp dụng chính sách đổi trả</strong>&nbsp;theo quy định đổi trả của công ty.</li><li class=\"ql-align-justify\"><strong>Thời gian giao hàng</strong></li></ol><ul><li class=\"ql-align-justify\">Khu vực nội thành Hà Nội/Tp. Hồ Chí Minh: Từ 1 – 3ngày</li><li class=\"ql-align-justify\">Khu vực khác: Các khu vực thuộc tuyến huyện trở lên: 4 – 7 ngày</li></ul><p class=\"ql-align-justify\">Lưu ý:</p><p class=\"ql-align-justify\">- Đối với các đơn hàng sau 17h30 Aristino sẽ xác nhận đơn hàng cho quý khách vào ngày làm việc sau đó.</p><p class=\"ql-align-justify\">Aristino trân trọng thông báo đến quý khách hàng những điều chỉnh mới nhất trong việc thu phí vận chuyển online. Hy vọng quý khách hàng có những trải nghiệm tốt nhất khi mua sắm tại Aristino.&nbsp;</p><p><br></p>', NULL, 1, 1, 0, '2022-05-24 11:47:12', '2022-05-24 11:47:12'),
(17, 'HỎI ĐÁP', 'hoi-dap', '<h4 class=\"ql-align-justify\">I. GIAO HÀNG VÀ VẬN CHUYỂN</h4><p class=\"ql-align-justify\"><strong>1. Phí vận chuyển tính thế nào?</strong></p><p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Freeship đơn hàng nguyên giá thanh toán từ 500k hoặc đơn hàng đã thanh toán chuyển khoản hoặc qua ví điện tử online(được sử dụng voucher)</p><p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Đơn hàng sale:</p><p>•&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;freeship với đơn hàng từ 800k&nbsp;trở lên</p><p>•&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;đơn hàng dưới 500k: phí ship 30k</p><p>•&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;đơn từ 500k đến 800k: phí ship 20k</p><p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Đơn nội thành ship trong 6h(tính từ thời gian xác nhận đơn): phí ship 40k</p><p><br></p><p class=\"ql-align-justify\">2. Thời gian giao hàng <strong>là bao lâu?</strong></p><p><br></p><p class=\"ql-align-justify\">Tuyến nội thành Hà Nội: giao hàng trong vòng 24h từ khi bạn nhận được sms/email xác nhận đơn hàng</p><p class=\"ql-align-justify\">Tuyến ngoại thành Hà Nội: giao hàng trong vòng 48h từ khi bạn nhận được sms/email xác nhận đơn hàng</p><p class=\"ql-align-justify\">Tuyến Đà Nẵng, TP.HCM: giao hàng trong vòng 3 ngày từ khi bạn nhận được sms/email xác nhận đơn hàng</p><p class=\"ql-align-justify\">Tất cả thành phố khác: giao hàng trong vòng từ 3- 7 từ khi bạn nhận được sms/email xác nhận đơn hàng</p><p class=\"ql-align-justify\">Lưu ý:&nbsp;Thời gian trên có thể sẽ thay đổi theo từng chương trình sale lớn.</p><p class=\"ql-align-justify\">3. Khi nhận hàng có đư<strong>ợc mở ra xem hàng trước không?</strong></p><p><br></p><p class=\"ql-align-justify\">Aristino không hỗ trợ đồng kiểm(xem hàng trước khi thanh toán). Bạn nhận hàng, thanh toán&nbsp;rồi kiểm tra hàng.</p><p class=\"ql-align-justify\">Trong trường hợp bạn gặp vấn đề phát sinh bạn liên hệ ngay tổng đài miễn phí của chúng tôi 1800.6226 nhánh 1 để được hỗ trợ kịp thời.</p><p class=\"ql-align-justify\">4. Có thể nhận thay đ<strong>ổi địa chỉ nhận hàng sau khi đặt hàng không?</strong></p><p><br></p><p class=\"ql-align-justify\">Bạn vui lòng liên hệ ngay đến tổng đài CSKH 1800.6226 nhánh 1 để cập nhật kịp thời địa chỉ mới của bạn. Hoặc gửi email đến online@kgvietnam.com để yêu cầu đổi địa chỉ nếu là ngoài giờ hành chính.</p><p class=\"ql-align-justify\">5. Đơn hàng được gia<strong>o tối đa bao nhiêu lần?</strong></p><p><br></p><p class=\"ql-align-justify\">Đơn hàng được giao tối đa 3 lần (Nếu lần 1 đơn hàng giao không thành công, nhân viên vận chuyển sẽ liên hệ lại bạn lần 2 sau 1-2 ngày làm việc kế tiếp . Như vậy sau 3 lần giao dịch không thành công đơn hàng sẽ hủy</p><p class=\"ql-align-justify\">6. Tôi muốn kiểm tr<strong>a tình trạng đơn hàng?</strong></p><p><br></p><p class=\"ql-align-justify\">Bạn vui lòng liên hệ ngay đến tổng đài CSKH 1800.6226 nhánh 1, cung cấp mã đơn hàng để kiểm tra tình trạng thông tin đơn hàng. Hoặc gửi email đến online@kgvietnam.com nếu là ngoài giờ hành chính.</p><p>II. ĐỔI HÀNG</p><p class=\"ql-align-justify\">1. Có thể đổi hàng<strong> sau khi đã nhận hàng không?</strong></p><p><br></p><p class=\"ql-align-justify\">Sau khi bạn nhận hàng Aristino có hỗ trợ đổi hàng</p><p class=\"ql-align-justify\">Sản phẩm nguyên giá bạn đổi khi còn hàng tại website</p><p class=\"ql-align-justify\">Sản phẩm giảm giá bạn đổi màu,size khi có hàng tại website</p><p class=\"ql-align-justify\">Chi tiết hướng dẫn mời bạn xem&nbsp;Quy định đổi hàng</p><p class=\"ql-align-justify\">2 Không áp dụng đ<strong>ổi hàng với sản phẩm nào?</strong></p><p><br></p><p class=\"ql-align-justify\">Với sản phẩm là phụ kiện như tất, găng tay, khẩu trang, khăn, mũ, thắt lưng, đai áo... Và không áp dụng đổi hàng với sản phẩm là đồ lót</p><p class=\"ql-align-justify\">3. Có thể đổi lạ<strong>i hàng sau khi đã nhận hàng không?</strong></p><p><br></p><p class=\"ql-align-justify\">Aristino nhận sản phẩm đổi lại trong trường hợp lỗi nhà sản xuất gồm:ố màu, phai màu, lỗi chất liệu, lỗi đường may, lỗi kiểu dáng… mà không có sản phẩm thay thế, không theo đúng mô tả và tiêu chuẩn sản phẩm . Chi tiết hướng dẫn mời bạn xem&nbsp;Quy định trả hàng</p><p class=\"ql-align-justify\">4. Aristino cho<strong> phép đổi hàng trong thời gian bao lâu từ khi nhận hàng?</strong></p><p><br></p><p class=\"ql-align-justify\">Hiện nay chúng tôi đang hỗ trợ đổi hàng 30 ngày đối với đơn hàng mua hàng online và 15 ngày đối với đơn hàng mua tại showroom.</p><p class=\"ql-align-justify\">5.Địa chỉ kho <strong>online tiếp nhận đổi hàng trực tiếp ở đâu?</strong></p><p><br></p><p class=\"ql-align-justify\">Aristinio tiếp nhận hàng đổi trong thời gian 9h đến 17h từ thứ 2 đến thứ 7 (không tính ngày chủ nhật và ngày lễ tết)</p><p class=\"ql-align-justify\">Địa chỉ: Kho công ty K&amp;G Việt Nam. Khu da giày thụy Khuê, Cụm CN Phú Minh, Cổ Nhuế 2, Bắc Từ Liêm, Hà Nội.</p><p class=\"ql-align-justify\">Điện thoại: 0357078072</p><p class=\"ql-align-justify\">6.Khách hàng <strong>ở tỉnh và ngoại thành Hà Nội đổi hàng có mất phí vận chuyển không?</strong></p><p><br></p><p class=\"ql-align-justify\">Với trường hợp đổi hàng do lỗi sản phẩm thì khách hàng sẽ được miễn phí hoàn toàn chi phí đổi hàng</p><p class=\"ql-align-justify\">Với trường hợp đổi hàng do cá nhân khách hàng muốn đổi sẽ chịu hoàn toàn phí vận chuyển đổi hàng</p><p class=\"ql-align-justify\">7.Aristino h<strong>oàn tiền trong bao lâu?</strong></p><p><br></p><p class=\"ql-align-justify\">Trường hợp bạn đã thanh toán nhận hàng và đủ điều kiện hoàn tiền như trong quy định. Tính từ thời điểm bạn gửi đầy đủ thông tin hoàn tiền Aristino xử lý tối đa trong 15 ngày</p><p class=\"ql-align-justify\">Trường hợp bạn chưa nhận hàng nhưng đã thanh toán qua thẻ:</p><p class=\"ql-align-justify\">Tài khoản ngân hàng tối đa 10 ngày</p><p class=\"ql-align-justify\">Visa, tín dụng... tối đa 30 ngày</p><p class=\"ql-align-justify\">8.Tôi có th<strong>ể hủy đặt hàng khi chưa nhận được sản phẩm không?</strong></p><p><br></p><p class=\"ql-align-justify\">Khách hàng có thể huỷ đặt hàng khi chưa nhận được sản phẩm ngay cả khi đơn hàng đã được giao cho đơn vị vận chuyển.</p><h4 class=\"ql-align-justify\">III. ĐẶT HÀNG VÀ THANH TOÁN</h4><p class=\"ql-align-justify\">1.Khi đặt <strong>hàng, tôi phải thanh toán như thế nào?</strong></p><p><br></p><p class=\"ql-align-justify\">Khách hàng có thể chọn 1 trong 2 phương thức thanh toán có sẵn:</p><p class=\"ql-align-justify\">1. Thanh toán khi nhận hàng bằng tiền mặt (COD).</p><p class=\"ql-align-justify\">2. Thanh toán khi đặt hàng bằng cách chuyển khoản ngân hàng hoặc qua cổng thanh toán MoMo</p><p class=\"ql-align-justify\">2.Nếu tôi<strong> mua sản phẩm với số lượng nhiều thì giá có được giảm không?</strong></p><p><br></p><p class=\"ql-align-justify\">Khi mua hàng với số lượng nhiều khách hàng sẽ được hưởng chế độ ưu đãi, giảm giá ngay tại thời điểm mua hàng.</p><p class=\"ql-align-justify\">3.Làm th<strong>ế nào để đặt hàng Aristino?</strong></p><p><br></p><p class=\"ql-align-justify\">Rất đơn giản, bạn hãy truy cập trang web: https://aristino.com để đặt hàng</p><p class=\"ql-align-justify\">4.Làm s<strong>ao để biết sản phẩm còn hàng hay hết hàng?</strong></p><p><br></p><p class=\"ql-align-justify\">Trên website https://aristino.com sẽ cung cấp thông tin sản phẩm đang còn hàng hoặc hết hàng cho khách hàng tham khảo.</p><p class=\"ql-align-justify\">5.Có t<strong>hể đặt hàng trên website ARISTINO và nhận hàng tại cửa hàng không?</strong></p><p><br></p><p class=\"ql-align-justify\">Hiện tại chúng tôi chưa hỗ trợ phương thức mua hàng này.</p><p class=\"ql-align-justify\">6.Đặt<strong> nhiều đơn hàng trong một ngày thì có cách nào để gộp lại không?</strong></p><p><br></p><p class=\"ql-align-justify\">Nếu bạn đặt nhiều đơn hàng trong cùng một ngày và cùng một thông tin người nhận, Aristino sẽ liên hệ lại với bạn để gộp đơn hàng và mức phí vận chuyển của bạn sẽ chỉ tính cho 1 đơn hàng.&nbsp;</p><p class=\"ql-align-justify\">7.Là<strong>m thế nào để biết đã đặt hàng thành công?</strong></p><p><br></p><p class=\"ql-align-justify\">Sau khi bạn hoàn thành các bước đặt hàng theo chỉ dẫn trên website, chúng tôi gửi email thông báo cho bạn với nội dung xác nhận đặt hàng thành cồng</p><p class=\"ql-align-justify\">8.M<strong>ức giá trên website với mức giá tại cửa hàng Aristino có đồng nhất không?</strong></p><p><br></p><p class=\"ql-align-justify\">Mức giá của sản phẩm tại cửa hàng và website có thể khác nhau do áp dụng các chương trình ưu đãi và chính sách khác nhau.</p><p class=\"ql-align-justify\">9.<strong>Làm thế nào để chọn được cỡ quần áo, sản phẩm đúng với kích thước của mình?</strong></p><p><br></p><p class=\"ql-align-justify\">Bạn hãy đối chiếu các số đo của mình với bảng&nbsp;hướng dẫn chọn size&nbsp;thông số kích cỡ của Aristino. Bạn có thể hoàn toàn yên tâm lựa chọn cỡ quần áo vừa vặn với cơ thể mình.</p><p class=\"ql-align-justify\">1<strong>0.Làm thế nào để hủy đơn hàng khi mới đặt hàng?</strong></p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\">Bạn liên hệ ngay đến tổng đài CSKH 1800 6226 nhánh 1 để cập nhật kịp thời HỦY đơn hàng mới đặt của bạn. Hoặc gửi email đến online@kgvietnam.com/cs@kgvietnam.com để yêu cầu đổi địa chỉ nếu là buổi tối hoặc ngày nghỉ.</p>', NULL, 1, 1, 0, '2022-05-24 11:47:40', '2022-05-24 11:47:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_cate`
--

CREATE TABLE `post_cate` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cate_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post_cate`
--

INSERT INTO `post_cate` (`id`, `cate_id`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 23, 1, NULL, NULL),
(2, 23, 2, NULL, NULL),
(3, 23, 3, NULL, NULL),
(4, 23, 4, NULL, NULL),
(5, 23, 5, NULL, NULL),
(6, 23, 6, NULL, NULL),
(7, 23, 7, NULL, NULL),
(8, 23, 8, NULL, NULL),
(9, 23, 9, NULL, NULL),
(10, 23, 10, NULL, NULL),
(11, 24, 11, NULL, NULL),
(12, 24, 12, NULL, NULL),
(13, 24, 13, NULL, NULL),
(14, 24, 14, NULL, NULL),
(15, 24, 15, NULL, NULL),
(16, 24, 16, NULL, NULL),
(17, 24, 17, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `prdetail_attvalue`
--

CREATE TABLE `prdetail_attvalue` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_detail_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `attribute_value_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `prdetail_attvalue`
--

INSERT INTO `prdetail_attvalue` (`id`, `product_detail_id`, `attribute_id`, `attribute_value_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2022-05-19 08:09:54', '2022-05-19 08:09:54'),
(2, 1, 2, 6, '2022-05-19 08:09:54', '2022-05-19 08:09:54'),
(3, 2, 1, 1, '2022-05-19 08:09:54', '2022-05-19 08:09:54'),
(4, 2, 2, 7, '2022-05-19 08:09:54', '2022-05-19 08:09:54'),
(5, 3, 1, 18, '2022-05-19 08:09:54', '2022-05-19 08:09:54'),
(6, 3, 2, 5, '2022-05-19 08:09:54', '2022-05-19 08:09:54'),
(7, 4, 1, 18, '2022-05-19 08:09:54', '2022-05-19 08:09:54'),
(8, 4, 2, 6, '2022-05-19 08:09:54', '2022-05-19 08:09:54'),
(9, 5, 1, 18, '2022-05-19 08:09:54', '2022-05-19 08:09:54'),
(10, 5, 2, 7, '2022-05-19 08:09:54', '2022-05-19 08:09:54'),
(11, 6, 1, 3, '2022-05-19 08:09:54', '2022-05-19 08:09:54'),
(12, 6, 2, 6, '2022-05-19 08:09:54', '2022-05-19 08:09:54'),
(13, 7, 1, 3, '2022-05-19 08:09:54', '2022-05-19 08:09:54'),
(14, 7, 2, 7, '2022-05-19 08:09:54', '2022-05-19 08:09:54'),
(15, 8, 1, 4, '2022-05-19 08:09:55', '2022-05-19 08:09:55'),
(16, 8, 2, 7, '2022-05-19 08:09:55', '2022-05-19 08:09:55'),
(17, 9, 1, 4, '2022-05-19 08:09:55', '2022-05-19 08:09:55'),
(18, 9, 2, 8, '2022-05-19 08:09:55', '2022-05-19 08:09:55'),
(19, 10, 1, 4, '2022-05-19 08:09:55', '2022-05-19 08:09:55'),
(20, 10, 2, 5, '2022-05-19 08:09:55', '2022-05-19 08:09:55'),
(21, 11, 1, 4, '2022-05-19 08:09:55', '2022-05-19 08:09:55'),
(22, 11, 2, 9, '2022-05-19 08:09:55', '2022-05-19 08:09:55'),
(23, 12, 1, 11, '2022-05-19 09:05:26', '2022-05-19 09:05:26'),
(24, 12, 2, 5, '2022-05-19 09:05:27', '2022-05-19 09:05:27'),
(25, 13, 1, 11, '2022-05-19 09:05:28', '2022-05-19 09:05:28'),
(26, 13, 2, 6, '2022-05-19 09:05:28', '2022-05-19 09:05:28'),
(27, 14, 1, 18, '2022-05-19 09:05:28', '2022-05-19 09:05:28'),
(28, 14, 2, 7, '2022-05-19 09:05:28', '2022-05-19 09:05:28'),
(29, 15, 1, 18, '2022-05-19 09:05:28', '2022-05-19 09:05:28'),
(30, 15, 2, 6, '2022-05-19 09:05:28', '2022-05-19 09:05:28'),
(31, 16, 1, 18, '2022-05-19 09:05:28', '2022-05-19 09:05:28'),
(32, 16, 2, 9, '2022-05-19 09:05:28', '2022-05-19 09:05:28'),
(33, 17, 1, 1, '2022-05-19 09:05:28', '2022-05-19 09:05:28'),
(34, 17, 2, 5, '2022-05-19 09:05:28', '2022-05-19 09:05:28'),
(35, 18, 1, 1, '2022-05-19 09:05:28', '2022-05-19 09:05:28'),
(36, 18, 2, 6, '2022-05-19 09:05:28', '2022-05-19 09:05:28'),
(37, 19, 1, 3, '2022-05-19 09:11:05', '2022-05-19 09:11:05'),
(38, 19, 2, 5, '2022-05-19 09:11:05', '2022-05-19 09:11:05'),
(39, 20, 1, 3, '2022-05-19 09:11:05', '2022-05-19 09:11:05'),
(40, 20, 2, 6, '2022-05-19 09:11:05', '2022-05-19 09:11:05'),
(41, 21, 1, 13, '2022-05-19 09:11:05', '2022-05-19 09:11:05'),
(42, 21, 2, 6, '2022-05-19 09:11:05', '2022-05-19 09:11:05'),
(43, 22, 1, 13, '2022-05-19 09:11:05', '2022-05-19 09:11:05'),
(44, 22, 2, 7, '2022-05-19 09:11:05', '2022-05-19 09:11:05'),
(45, 23, 1, 11, '2022-05-19 09:11:05', '2022-05-19 09:11:05'),
(46, 23, 2, 6, '2022-05-19 09:11:05', '2022-05-19 09:11:05'),
(47, 24, 1, 11, '2022-05-19 09:11:05', '2022-05-19 09:11:05'),
(48, 24, 2, 7, '2022-05-19 09:11:05', '2022-05-19 09:11:05'),
(49, 25, 1, 11, '2022-05-19 09:11:05', '2022-05-19 09:11:05'),
(50, 25, 2, 5, '2022-05-19 09:11:05', '2022-05-19 09:11:05'),
(51, 26, 1, 11, '2022-05-19 09:11:05', '2022-05-19 09:11:05'),
(52, 26, 2, 9, '2022-05-19 09:11:05', '2022-05-19 09:11:05'),
(53, 27, 1, 14, '2022-05-19 09:15:41', '2022-05-19 09:15:41'),
(54, 27, 2, 6, '2022-05-19 09:15:41', '2022-05-19 09:15:41'),
(55, 28, 1, 14, '2022-05-19 09:15:41', '2022-05-19 09:15:41'),
(56, 28, 2, 8, '2022-05-19 09:15:41', '2022-05-19 09:15:41'),
(57, 29, 1, 14, '2022-05-19 09:15:41', '2022-05-19 09:15:41'),
(58, 29, 2, 9, '2022-05-19 09:15:41', '2022-05-19 09:15:41'),
(59, 30, 1, 14, '2022-05-19 09:15:41', '2022-05-19 09:15:41'),
(60, 30, 2, 5, '2022-05-19 09:15:41', '2022-05-19 09:15:41'),
(61, 31, 1, 3, '2022-05-19 09:15:41', '2022-05-19 09:15:41'),
(62, 31, 2, 5, '2022-05-19 09:15:41', '2022-05-19 09:15:41'),
(63, 32, 1, 3, '2022-05-19 09:15:41', '2022-05-19 09:15:41'),
(64, 32, 2, 6, '2022-05-19 09:15:41', '2022-05-19 09:15:41'),
(65, 33, 1, 3, '2022-05-19 09:15:41', '2022-05-19 09:15:41'),
(66, 33, 2, 9, '2022-05-19 09:15:41', '2022-05-19 09:15:41'),
(67, 34, 1, 11, '2022-05-19 09:15:41', '2022-05-19 09:15:41'),
(68, 34, 2, 9, '2022-05-19 09:15:41', '2022-05-19 09:15:41'),
(69, 35, 1, 11, '2022-05-19 09:15:41', '2022-05-19 09:15:41'),
(70, 35, 2, 5, '2022-05-19 09:15:41', '2022-05-19 09:15:41'),
(71, 36, 1, 11, '2022-05-19 09:15:41', '2022-05-19 09:15:41'),
(72, 36, 2, 6, '2022-05-19 09:15:41', '2022-05-19 09:15:41'),
(73, 37, 1, 11, '2022-05-19 09:15:41', '2022-05-19 09:15:41'),
(74, 37, 2, 8, '2022-05-19 09:15:41', '2022-05-19 09:15:41'),
(76, 38, 2, 9, '2022-05-19 09:18:36', '2022-05-19 09:18:36'),
(78, 39, 2, 6, '2022-05-19 09:18:36', '2022-05-19 09:18:36'),
(80, 40, 2, 9, '2022-05-19 09:18:36', '2022-05-19 09:18:36'),
(82, 41, 2, 7, '2022-05-19 09:18:36', '2022-05-19 09:18:36'),
(83, 42, 1, 10, '2022-05-19 09:18:36', '2022-05-19 09:18:36'),
(84, 42, 2, 6, '2022-05-19 09:18:36', '2022-05-19 09:18:36'),
(85, 43, 1, 10, '2022-05-19 09:18:36', '2022-05-19 09:18:36'),
(86, 43, 2, 5, '2022-05-19 09:18:36', '2022-05-19 09:18:36'),
(87, 44, 1, 3, '2022-05-19 09:21:55', '2022-05-19 09:21:55'),
(88, 44, 2, 9, '2022-05-19 09:21:55', '2022-05-19 09:21:55'),
(89, 45, 1, 3, '2022-05-19 09:21:55', '2022-05-19 09:21:55'),
(90, 45, 2, 5, '2022-05-19 09:21:55', '2022-05-19 09:21:55'),
(91, 46, 1, 13, '2022-05-19 09:21:55', '2022-05-19 09:21:55'),
(92, 46, 2, 9, '2022-05-19 09:21:55', '2022-05-19 09:21:55'),
(93, 47, 1, 13, '2022-05-19 09:21:55', '2022-05-19 09:21:55'),
(94, 47, 2, 8, '2022-05-19 09:21:55', '2022-05-19 09:21:55'),
(95, 48, 1, 13, '2022-05-19 09:21:55', '2022-05-19 09:21:55'),
(96, 48, 2, 6, '2022-05-19 09:21:55', '2022-05-19 09:21:55'),
(97, 49, 1, 11, '2022-05-19 09:23:32', '2022-05-19 09:23:32'),
(98, 49, 2, 9, '2022-05-19 09:23:32', '2022-05-19 09:23:32'),
(99, 50, 1, 11, '2022-05-19 09:23:32', '2022-05-19 09:23:32'),
(100, 50, 2, 8, '2022-05-19 09:23:32', '2022-05-19 09:23:32'),
(101, 51, 1, 11, '2022-05-19 09:23:33', '2022-05-19 09:23:33'),
(102, 51, 2, 5, '2022-05-19 09:23:33', '2022-05-19 09:23:33'),
(103, 52, 1, 12, '2022-05-19 09:24:49', '2022-05-19 09:24:49'),
(104, 52, 2, 9, '2022-05-19 09:24:49', '2022-05-19 09:24:49'),
(105, 53, 1, 12, '2022-05-19 09:24:49', '2022-05-19 09:24:49'),
(106, 53, 2, 8, '2022-05-19 09:24:49', '2022-05-19 09:24:49'),
(107, 54, 1, 15, '2022-05-19 09:28:03', '2022-05-19 09:28:03'),
(108, 54, 2, 9, '2022-05-19 09:28:03', '2022-05-19 09:28:03'),
(109, 55, 1, 15, '2022-05-19 09:28:03', '2022-05-19 09:28:03'),
(110, 55, 2, 8, '2022-05-19 09:28:03', '2022-05-19 09:28:03'),
(111, 56, 1, 10, '2022-05-19 09:28:03', '2022-05-19 09:28:03'),
(112, 56, 2, 9, '2022-05-19 09:28:03', '2022-05-19 09:28:03'),
(113, 57, 1, 10, '2022-05-19 09:28:03', '2022-05-19 09:28:03'),
(114, 57, 2, 8, '2022-05-19 09:28:03', '2022-05-19 09:28:03'),
(115, 58, 1, 10, '2022-05-19 09:28:03', '2022-05-19 09:28:03'),
(116, 58, 2, 7, '2022-05-19 09:28:03', '2022-05-19 09:28:03'),
(117, 59, 2, 5, '2022-05-19 09:30:24', '2022-05-19 09:30:24'),
(118, 59, 1, 3, '2022-05-19 09:30:24', '2022-05-19 09:30:24'),
(119, 60, 2, 9, '2022-05-19 09:30:24', '2022-05-19 09:30:24'),
(120, 60, 1, 3, '2022-05-19 09:30:24', '2022-05-19 09:30:24'),
(121, 61, 2, 7, '2022-05-19 09:30:24', '2022-05-19 09:30:24'),
(122, 61, 1, 3, '2022-05-19 09:30:24', '2022-05-19 09:30:24'),
(123, 62, 2, 5, '2022-05-19 09:30:24', '2022-05-19 09:30:24'),
(124, 62, 1, 10, '2022-05-19 09:30:24', '2022-05-19 09:30:24'),
(125, 63, 2, 8, '2022-05-19 09:30:24', '2022-05-19 09:30:24'),
(126, 63, 1, 10, '2022-05-19 09:30:24', '2022-05-19 09:30:24'),
(127, 64, 2, 7, '2022-05-19 09:30:24', '2022-05-19 09:30:24'),
(128, 64, 1, 10, '2022-05-19 09:30:24', '2022-05-19 09:30:24'),
(129, 65, 1, 13, '2022-05-19 09:34:58', '2022-05-19 09:34:58'),
(130, 65, 2, 9, '2022-05-19 09:34:58', '2022-05-19 09:34:58'),
(131, 66, 1, 13, '2022-05-19 09:34:58', '2022-05-19 09:34:58'),
(132, 66, 2, 8, '2022-05-19 09:34:58', '2022-05-19 09:34:58'),
(133, 67, 1, 14, '2022-05-19 09:34:58', '2022-05-19 09:34:58'),
(134, 67, 2, 9, '2022-05-19 09:34:58', '2022-05-19 09:34:58'),
(135, 68, 1, 14, '2022-05-19 09:34:58', '2022-05-19 09:34:58'),
(136, 68, 2, 8, '2022-05-19 09:34:58', '2022-05-19 09:34:58'),
(137, 69, 1, 11, '2022-05-19 09:34:58', '2022-05-19 09:34:58'),
(138, 69, 2, 5, '2022-05-19 09:34:58', '2022-05-19 09:34:58'),
(139, 70, 1, 11, '2022-05-19 09:34:58', '2022-05-19 09:34:58'),
(140, 70, 2, 6, '2022-05-19 09:34:58', '2022-05-19 09:34:58'),
(141, 71, 1, 11, '2022-05-19 09:54:22', '2022-05-19 09:54:22'),
(142, 71, 2, 9, '2022-05-19 09:54:22', '2022-05-19 09:54:22'),
(143, 72, 1, 11, '2022-05-19 09:54:22', '2022-05-19 09:54:22'),
(144, 72, 2, 8, '2022-05-19 09:54:22', '2022-05-19 09:54:22'),
(145, 73, 1, 11, '2022-05-19 09:54:22', '2022-05-19 09:54:22'),
(146, 73, 2, 7, '2022-05-19 09:54:22', '2022-05-19 09:54:22'),
(147, 74, 1, 10, '2022-05-19 09:54:22', '2022-05-19 09:54:22'),
(148, 74, 2, 9, '2022-05-19 09:54:22', '2022-05-19 09:54:22'),
(149, 75, 1, 10, '2022-05-19 09:54:22', '2022-05-19 09:54:22'),
(150, 75, 2, 5, '2022-05-19 09:54:22', '2022-05-19 09:54:22'),
(151, 76, 1, 16, '2022-05-19 09:54:22', '2022-05-19 09:54:22'),
(152, 76, 2, 8, '2022-05-19 09:54:22', '2022-05-19 09:54:22'),
(153, 77, 1, 16, '2022-05-19 09:54:22', '2022-05-19 09:54:22'),
(154, 77, 2, 9, '2022-05-19 09:54:22', '2022-05-19 09:54:22'),
(155, 78, 1, 14, '2022-05-19 10:43:38', '2022-05-19 10:43:38'),
(156, 78, 2, 9, '2022-05-19 10:43:38', '2022-05-19 10:43:38'),
(157, 79, 1, 14, '2022-05-19 10:43:38', '2022-05-19 10:43:38'),
(158, 79, 2, 8, '2022-05-19 10:43:38', '2022-05-19 10:43:38'),
(159, 80, 1, 14, '2022-05-19 10:43:38', '2022-05-19 10:43:38'),
(160, 80, 2, 5, '2022-05-19 10:43:38', '2022-05-19 10:43:38'),
(161, 81, 1, 10, '2022-05-19 10:43:38', '2022-05-19 10:43:38'),
(162, 81, 2, 9, '2022-05-19 10:43:38', '2022-05-19 10:43:38'),
(163, 82, 1, 10, '2022-05-19 10:43:38', '2022-05-19 10:43:38'),
(164, 82, 2, 8, '2022-05-19 10:43:38', '2022-05-19 10:43:38'),
(165, 83, 1, 10, '2022-05-19 10:43:38', '2022-05-19 10:43:38'),
(166, 83, 2, 5, '2022-05-19 10:43:38', '2022-05-19 10:43:38'),
(167, 84, 1, 17, '2022-05-19 10:43:38', '2022-05-19 10:43:38'),
(168, 84, 2, 9, '2022-05-19 10:43:38', '2022-05-19 10:43:38'),
(169, 85, 1, 17, '2022-05-19 10:43:38', '2022-05-19 10:43:38'),
(170, 85, 2, 8, '2022-05-19 10:43:38', '2022-05-19 10:43:38'),
(171, 86, 1, 17, '2022-05-19 10:43:38', '2022-05-19 10:43:38'),
(172, 86, 2, 6, '2022-05-19 10:43:38', '2022-05-19 10:43:38'),
(173, 87, 1, 17, '2022-05-19 10:43:38', '2022-05-19 10:43:38'),
(174, 87, 2, 5, '2022-05-19 10:43:38', '2022-05-19 10:43:38'),
(175, 88, 1, 2, '2022-05-19 10:46:54', '2022-05-19 10:46:54'),
(176, 88, 2, 9, '2022-05-19 10:46:54', '2022-05-19 10:46:54'),
(177, 89, 1, 2, '2022-05-19 10:46:54', '2022-05-19 10:46:54'),
(178, 89, 2, 8, '2022-05-19 10:46:54', '2022-05-19 10:46:54'),
(179, 90, 1, 2, '2022-05-19 10:46:55', '2022-05-19 10:46:55'),
(180, 90, 2, 6, '2022-05-19 10:46:55', '2022-05-19 10:46:55'),
(181, 91, 1, 10, '2022-05-19 10:46:55', '2022-05-19 10:46:55'),
(182, 91, 2, 9, '2022-05-19 10:46:55', '2022-05-19 10:46:55'),
(183, 92, 1, 10, '2022-05-19 10:46:55', '2022-05-19 10:46:55'),
(184, 92, 2, 5, '2022-05-19 10:46:55', '2022-05-19 10:46:55'),
(185, 93, 1, 11, '2022-05-19 10:46:55', '2022-05-19 10:46:55'),
(186, 93, 2, 9, '2022-05-19 10:46:55', '2022-05-19 10:46:55'),
(187, 94, 1, 11, '2022-05-19 10:46:55', '2022-05-19 10:46:55'),
(188, 94, 2, 8, '2022-05-19 10:46:55', '2022-05-19 10:46:55'),
(189, 95, 2, 5, '2022-05-19 10:49:23', '2022-05-19 10:49:23'),
(190, 95, 1, 15, '2022-05-19 10:49:23', '2022-05-19 10:49:23'),
(191, 96, 2, 6, '2022-05-19 10:49:23', '2022-05-19 10:49:23'),
(192, 96, 1, 15, '2022-05-19 10:49:23', '2022-05-19 10:49:23'),
(193, 97, 2, 8, '2022-05-19 10:49:24', '2022-05-19 10:49:24'),
(194, 97, 1, 15, '2022-05-19 10:49:24', '2022-05-19 10:49:24'),
(195, 98, 2, 9, '2022-05-19 10:49:24', '2022-05-19 10:49:24'),
(196, 98, 1, 15, '2022-05-19 10:49:24', '2022-05-19 10:49:24'),
(197, 99, 1, 10, '2022-05-19 10:55:42', '2022-05-19 10:55:42'),
(198, 99, 2, 9, '2022-05-19 10:55:42', '2022-05-19 10:55:42'),
(199, 100, 1, 10, '2022-05-19 10:55:42', '2022-05-19 10:55:42'),
(200, 100, 2, 8, '2022-05-19 10:55:42', '2022-05-19 10:55:42'),
(201, 101, 1, 10, '2022-05-19 10:55:42', '2022-05-19 10:55:42'),
(202, 101, 2, 7, '2022-05-19 10:55:42', '2022-05-19 10:55:42'),
(203, 102, 1, 3, '2022-05-19 10:55:42', '2022-05-19 10:55:42'),
(204, 102, 2, 9, '2022-05-19 10:55:42', '2022-05-19 10:55:42'),
(205, 103, 1, 3, '2022-05-19 10:55:42', '2022-05-19 10:55:42'),
(206, 103, 2, 8, '2022-05-19 10:55:42', '2022-05-19 10:55:42'),
(207, 104, 1, 2, '2022-05-19 10:55:42', '2022-05-19 10:55:42'),
(208, 104, 2, 9, '2022-05-19 10:55:42', '2022-05-19 10:55:42'),
(209, 105, 1, 2, '2022-05-19 10:55:42', '2022-05-19 10:55:42'),
(210, 105, 2, 8, '2022-05-19 10:55:42', '2022-05-19 10:55:42'),
(211, 106, 1, 2, '2022-05-19 10:55:42', '2022-05-19 10:55:42'),
(212, 106, 2, 5, '2022-05-19 10:55:42', '2022-05-19 10:55:42'),
(213, 107, 1, 4, '2022-05-19 11:01:31', '2022-05-19 11:01:31'),
(214, 107, 2, 8, '2022-05-19 11:01:31', '2022-05-19 11:01:31'),
(215, 108, 1, 4, '2022-05-19 11:01:31', '2022-05-19 11:01:31'),
(216, 108, 2, 9, '2022-05-19 11:01:31', '2022-05-19 11:01:31'),
(217, 109, 1, 4, '2022-05-19 11:01:31', '2022-05-19 11:01:31'),
(218, 109, 2, 5, '2022-05-19 11:01:31', '2022-05-19 11:01:31'),
(219, 110, 1, 3, '2022-05-19 11:01:31', '2022-05-19 11:01:31'),
(220, 110, 2, 9, '2022-05-19 11:01:31', '2022-05-19 11:01:31'),
(221, 111, 1, 3, '2022-05-19 11:01:31', '2022-05-19 11:01:31'),
(222, 111, 2, 8, '2022-05-19 11:01:31', '2022-05-19 11:01:31'),
(223, 112, 1, 3, '2022-05-19 11:01:31', '2022-05-19 11:01:31'),
(224, 112, 2, 6, '2022-05-19 11:01:31', '2022-05-19 11:01:31'),
(225, 113, 1, 13, '2022-05-19 11:01:31', '2022-05-19 11:01:31'),
(226, 113, 2, 9, '2022-05-19 11:01:31', '2022-05-19 11:01:31'),
(227, 114, 1, 13, '2022-05-19 11:01:31', '2022-05-19 11:01:31'),
(228, 114, 2, 7, '2022-05-19 11:01:31', '2022-05-19 11:01:31'),
(229, 115, 1, 18, '2022-05-19 11:03:48', '2022-05-19 11:03:48'),
(230, 115, 2, 9, '2022-05-19 11:03:48', '2022-05-19 11:03:48'),
(231, 116, 1, 18, '2022-05-19 11:03:49', '2022-05-19 11:03:49'),
(232, 116, 2, 5, '2022-05-19 11:03:49', '2022-05-19 11:03:49'),
(233, 117, 1, 18, '2022-05-19 11:03:49', '2022-05-19 11:03:49'),
(234, 117, 2, 6, '2022-05-19 11:03:49', '2022-05-19 11:03:49'),
(235, 118, 1, 18, '2022-05-19 11:03:49', '2022-05-19 11:03:49'),
(236, 118, 2, 7, '2022-05-19 11:03:49', '2022-05-19 11:03:49'),
(237, 119, 1, 13, '2022-05-19 11:07:08', '2022-05-19 11:07:08'),
(238, 119, 2, 9, '2022-05-19 11:07:08', '2022-05-19 11:07:08'),
(239, 120, 1, 13, '2022-05-19 11:07:08', '2022-05-19 11:07:08'),
(240, 120, 2, 6, '2022-05-19 11:07:08', '2022-05-19 11:07:08'),
(241, 121, 1, 13, '2022-05-19 11:07:08', '2022-05-19 11:07:08'),
(242, 121, 2, 8, '2022-05-19 11:07:08', '2022-05-19 11:07:08'),
(243, 122, 1, 3, '2022-05-19 11:07:08', '2022-05-19 11:07:08'),
(244, 122, 2, 9, '2022-05-19 11:07:08', '2022-05-19 11:07:08'),
(245, 123, 1, 3, '2022-05-19 11:07:08', '2022-05-19 11:07:08'),
(246, 123, 2, 8, '2022-05-19 11:07:08', '2022-05-19 11:07:08'),
(247, 124, 1, 3, '2022-05-19 11:07:08', '2022-05-19 11:07:08'),
(248, 124, 2, 7, '2022-05-19 11:07:08', '2022-05-19 11:07:08'),
(249, 125, 1, 12, '2022-05-19 11:07:08', '2022-05-19 11:07:08'),
(250, 125, 2, 9, '2022-05-19 11:07:08', '2022-05-19 11:07:08'),
(251, 126, 1, 12, '2022-05-19 11:07:08', '2022-05-19 11:07:08'),
(252, 126, 2, 8, '2022-05-19 11:07:08', '2022-05-19 11:07:08'),
(253, 127, 1, 14, '2022-05-19 11:09:35', '2022-05-19 11:09:35'),
(254, 127, 2, 9, '2022-05-19 11:09:35', '2022-05-19 11:09:35'),
(255, 128, 1, 14, '2022-05-19 11:09:35', '2022-05-19 11:09:35'),
(256, 128, 2, 8, '2022-05-19 11:09:35', '2022-05-19 11:09:35'),
(257, 129, 1, 2, '2022-05-19 11:09:35', '2022-05-19 11:09:35'),
(258, 129, 2, 9, '2022-05-19 11:09:35', '2022-05-19 11:09:35'),
(259, 130, 1, 2, '2022-05-19 11:09:35', '2022-05-19 11:09:35'),
(260, 130, 2, 8, '2022-05-19 11:09:35', '2022-05-19 11:09:35'),
(261, 131, 1, 11, '2022-05-19 11:12:22', '2022-05-19 11:12:22'),
(262, 131, 2, 9, '2022-05-19 11:12:22', '2022-05-19 11:12:22'),
(263, 132, 1, 11, '2022-05-19 11:12:22', '2022-05-19 11:12:22'),
(265, 133, 1, 3, '2022-05-19 11:12:23', '2022-05-19 11:12:23'),
(266, 133, 2, 9, '2022-05-19 11:12:23', '2022-05-19 11:12:23'),
(267, 134, 1, 3, '2022-05-19 11:12:23', '2022-05-19 11:12:23'),
(268, 134, 2, 8, '2022-05-19 11:12:23', '2022-05-19 11:12:23'),
(269, 135, 1, 3, '2022-05-19 11:12:23', '2022-05-19 11:12:23'),
(270, 135, 2, 6, '2022-05-19 11:12:23', '2022-05-19 11:12:23'),
(271, 136, 1, 14, '2022-05-19 11:16:04', '2022-05-19 11:16:04'),
(272, 136, 2, 9, '2022-05-19 11:16:04', '2022-05-19 11:16:04'),
(273, 137, 1, 14, '2022-05-19 11:16:06', '2022-05-19 11:16:06'),
(275, 138, 1, 11, '2022-05-19 11:16:06', '2022-05-19 11:16:06'),
(277, 139, 1, 11, '2022-05-19 11:16:06', '2022-05-19 11:16:06'),
(278, 139, 2, 8, '2022-05-19 11:16:06', '2022-05-19 11:16:06'),
(279, 140, 1, 3, '2022-05-19 11:18:20', '2022-05-19 11:18:20'),
(280, 140, 2, 9, '2022-05-19 11:18:20', '2022-05-19 11:18:20'),
(281, 141, 1, 3, '2022-05-19 11:18:21', '2022-05-19 11:18:21'),
(282, 141, 2, 8, '2022-05-19 11:18:21', '2022-05-19 11:18:21'),
(283, 142, 1, 3, '2022-05-19 11:18:21', '2022-05-19 11:18:21'),
(284, 142, 2, 6, '2022-05-19 11:18:21', '2022-05-19 11:18:21'),
(285, 143, 1, 4, '2022-05-19 11:18:21', '2022-05-19 11:18:21'),
(286, 143, 2, 9, '2022-05-19 11:18:21', '2022-05-19 11:18:21'),
(287, 144, 1, 4, '2022-05-19 11:18:21', '2022-05-19 11:18:21'),
(288, 144, 2, 8, '2022-05-19 11:18:21', '2022-05-19 11:18:21'),
(289, 145, 1, 14, '2022-05-19 11:22:58', '2022-05-19 11:22:58'),
(290, 145, 2, 9, '2022-05-19 11:22:58', '2022-05-19 11:22:58'),
(291, 146, 1, 14, '2022-05-19 11:22:58', '2022-05-19 11:22:58'),
(292, 146, 2, 8, '2022-05-19 11:22:58', '2022-05-19 11:22:58'),
(293, 147, 1, 14, '2022-05-19 11:22:58', '2022-05-19 11:22:58'),
(294, 147, 2, 5, '2022-05-19 11:22:58', '2022-05-19 11:22:58'),
(295, 148, 1, 10, '2022-05-19 11:22:58', '2022-05-19 11:22:58'),
(296, 148, 2, 9, '2022-05-19 11:22:58', '2022-05-19 11:22:58'),
(297, 149, 1, 10, '2022-05-19 11:22:58', '2022-05-19 11:22:58'),
(298, 149, 2, 8, '2022-05-19 11:22:58', '2022-05-19 11:22:58'),
(299, 150, 1, 19, '2022-05-19 11:22:58', '2022-05-19 11:22:58'),
(300, 150, 2, 9, '2022-05-19 11:22:58', '2022-05-19 11:22:58'),
(301, 151, 1, 19, '2022-05-19 11:22:58', '2022-05-19 11:22:58'),
(302, 151, 2, 8, '2022-05-19 11:22:58', '2022-05-19 11:22:58'),
(303, 152, 1, 10, '2022-05-19 11:25:39', '2022-05-19 11:25:39'),
(304, 152, 2, 9, '2022-05-19 11:25:39', '2022-05-19 11:25:39'),
(305, 153, 1, 10, '2022-05-19 11:25:39', '2022-05-19 11:25:39'),
(306, 153, 2, 8, '2022-05-19 11:25:39', '2022-05-19 11:25:39'),
(307, 154, 1, 10, '2022-05-19 11:25:41', '2022-05-19 11:25:41'),
(308, 154, 2, 6, '2022-05-19 11:25:41', '2022-05-19 11:25:41'),
(309, 155, 1, 3, '2022-05-19 11:25:41', '2022-05-19 11:25:41'),
(310, 155, 2, 9, '2022-05-19 11:25:41', '2022-05-19 11:25:41'),
(311, 156, 1, 3, '2022-05-19 11:25:41', '2022-05-19 11:25:41'),
(312, 156, 2, 8, '2022-05-19 11:25:41', '2022-05-19 11:25:41'),
(313, 157, 1, 15, '2022-05-19 14:13:16', '2022-05-19 14:13:16'),
(314, 157, 3, 23, '2022-05-19 14:13:16', '2022-05-19 14:13:16'),
(315, 157, 4, 27, '2022-05-19 14:13:16', '2022-05-19 14:13:16'),
(316, 157, 5, 20, '2022-05-19 14:13:16', '2022-05-19 14:13:16'),
(317, 158, 1, 3, '2022-05-19 14:13:18', '2022-05-19 14:13:18'),
(318, 158, 3, 23, '2022-05-19 14:13:18', '2022-05-19 14:13:18'),
(319, 158, 4, 27, '2022-05-19 14:13:18', '2022-05-19 14:13:18'),
(320, 158, 5, 20, '2022-05-19 14:13:18', '2022-05-19 14:13:18'),
(321, 159, 1, 19, '2022-05-19 14:13:18', '2022-05-19 14:13:18'),
(322, 159, 3, 23, '2022-05-19 14:13:18', '2022-05-19 14:13:18'),
(323, 159, 4, 27, '2022-05-19 14:13:18', '2022-05-19 14:13:18'),
(324, 159, 5, 20, '2022-05-19 14:13:18', '2022-05-19 14:13:18'),
(326, 160, 3, 24, '2022-05-19 14:16:01', '2022-05-19 14:16:01'),
(327, 160, 4, 27, '2022-05-19 14:16:01', '2022-05-19 14:16:01'),
(328, 160, 5, 20, '2022-05-19 14:16:01', '2022-05-19 14:16:01'),
(329, 161, 1, 3, '2022-05-19 14:16:01', '2022-05-19 14:16:01'),
(330, 161, 3, 24, '2022-05-19 14:16:01', '2022-05-19 14:16:01'),
(331, 161, 4, 27, '2022-05-19 14:16:01', '2022-05-19 14:16:01'),
(332, 161, 5, 20, '2022-05-19 14:16:01', '2022-05-19 14:16:01'),
(333, 162, 1, 10, '2022-05-19 14:16:01', '2022-05-19 14:16:01'),
(334, 162, 3, 24, '2022-05-19 14:16:01', '2022-05-19 14:16:01'),
(335, 162, 4, 27, '2022-05-19 14:16:01', '2022-05-19 14:16:01'),
(336, 162, 5, 20, '2022-05-19 14:16:01', '2022-05-19 14:16:01'),
(337, 163, 1, 12, '2022-05-19 14:18:35', '2022-05-19 14:18:35'),
(338, 163, 3, 26, '2022-05-19 14:18:35', '2022-05-19 14:18:35'),
(339, 163, 4, 25, '2022-05-19 14:18:35', '2022-05-19 14:18:35'),
(340, 163, 5, 21, '2022-05-19 14:18:35', '2022-05-19 14:18:35'),
(341, 164, 1, 3, '2022-05-19 14:18:35', '2022-05-19 14:18:35'),
(342, 164, 3, 26, '2022-05-19 14:18:35', '2022-05-19 14:18:35'),
(343, 164, 4, 25, '2022-05-19 14:18:35', '2022-05-19 14:18:35'),
(344, 164, 5, 21, '2022-05-19 14:18:35', '2022-05-19 14:18:35'),
(345, 165, 1, 2, '2022-05-19 14:25:11', '2022-05-19 14:25:11'),
(346, 166, 1, 3, '2022-05-19 14:25:13', '2022-05-19 14:25:13'),
(347, 167, 1, 10, '2022-05-19 14:27:21', '2022-05-19 14:27:21'),
(348, 168, 1, 3, '2022-05-19 14:27:21', '2022-05-19 14:27:21'),
(349, 169, 1, 11, '2022-05-19 14:27:21', '2022-05-19 14:27:21'),
(350, 170, 1, 3, '2022-05-19 14:29:51', '2022-05-19 14:29:51'),
(351, 171, 1, 11, '2022-05-19 14:29:51', '2022-05-19 14:29:51'),
(352, 172, 1, 1, '2022-05-19 14:29:51', '2022-05-19 14:29:51'),
(353, 173, 1, 15, '2022-05-19 14:29:51', '2022-05-19 14:29:51'),
(354, 174, 1, 10, '2022-05-19 14:32:34', '2022-05-19 14:32:34'),
(355, 175, 1, 3, '2022-05-19 14:32:34', '2022-05-19 14:32:34'),
(356, 176, 1, 19, '2022-05-19 14:34:39', '2022-05-19 14:34:39'),
(357, 177, 1, 10, '2022-05-19 14:37:37', '2022-05-19 14:37:37'),
(358, 178, 1, 14, '2022-05-19 14:37:37', '2022-05-19 14:37:37'),
(359, 179, 1, 15, '2022-05-19 14:37:37', '2022-05-19 14:37:37'),
(362, 160, 1, 19, '2022-05-20 02:49:53', '2022-05-20 02:49:53'),
(363, 38, 1, 3, '2022-05-20 15:37:21', '2022-05-20 15:37:21'),
(364, 39, 1, 3, '2022-05-20 15:37:21', '2022-05-20 15:37:21'),
(365, 40, 1, 14, '2022-05-20 15:37:21', '2022-05-20 15:37:21'),
(366, 41, 1, 14, '2022-05-20 15:37:21', '2022-05-20 15:37:21'),
(367, 132, 2, 7, '2022-05-21 14:31:20', '2022-05-21 14:31:20'),
(368, 137, 2, 7, '2022-05-21 17:40:27', '2022-05-21 17:40:27'),
(369, 138, 2, 5, '2022-05-21 17:40:27', '2022-05-21 17:40:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `sku`, `content`, `brand_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Quần Jean Nữ Baggy Co Giãn Cạp Liền', 'quan-jean-nu-baggy-co-gian-cap-lien', 'QJNB-001', '<p><br></p>', NULL, 1, '2022-05-19 08:09:54', '2022-05-19 08:09:54'),
(2, 'Quần Jean Nữ Lưng Thấp Dáng Skinny', 'quan-jean-nu-lung-thap-dang-skinny', 'QJNB-002', '<p><br></p>', NULL, 1, '2022-05-19 09:05:26', '2022-05-19 09:05:26'),
(3, 'Quần Jeans Nữ Skinny Lưng Cao Tôn Dáng', 'quan-jeans-nu-skinny-lung-cao-ton-dang', 'QJNB-003', '<p><br></p>', NULL, 1, '2022-05-19 09:11:04', '2022-05-19 09:11:04'),
(4, 'Quần Kaki Nữ Lưng Thun Công Sở', 'quan-kaki-nu-lung-thun-cong-so', 'QKKNB-001', '<p><br></p>', NULL, 1, '2022-05-19 09:15:39', '2022-05-20 17:55:37'),
(5, 'Quần Kaki Nữ Lưng Cao Ống Ôm Co Giãn Nhẹ', 'quan-kaki-nu-lung-cao-ong-om-co-gian-nhe', 'QKKNB-002', '<p><br></p>', NULL, 1, '2022-05-19 09:18:35', '2022-05-19 09:18:35'),
(6, 'Chân Váy Bút Chì Dài Bèo Đính Cúc', 'chan-vay-but-chi-dai-beo-dinh-cuc', 'QVNB-001', '<p><br></p>', NULL, 1, '2022-05-19 09:21:53', '2022-05-19 09:21:53'),
(7, 'Chân Váy Chữ A Họa Tiết', 'chan-vay-chu-a-hoa-tiet', 'QVNB-002', '<p><br></p>', NULL, 1, '2022-05-19 09:23:31', '2022-05-19 09:23:31'),
(8, 'Chân Váy Chữ A Caro 1 Hàng Khuy', 'chan-vay-chu-a-caro-1-hang-khuy', 'QVNB-003', '<p><br></p>', NULL, 1, '2022-05-19 09:24:47', '2022-05-19 09:24:47'),
(9, 'Váy Voan Nữ Hoa Nhí Nơ Eo Vai Bèo Rủ', 'vay-voan-nu-hoa-nhi-no-eo-vai-beo-ru', 'QVVNB-001', '<p><br></p>', NULL, 1, '2022-05-19 09:28:01', '2022-05-19 09:28:01'),
(10, 'Đầm Xòe Voan Hoa Nhí Nơ Cổ Tay Phồng', 'dam-xoe-voan-hoa-nhi-no-co-tay-phong', 'QVSNB-001', '<p><br></p>', NULL, 1, '2022-05-19 09:30:23', '2022-05-19 09:30:23'),
(11, 'Áo Sơ Mi Nữ Tay Lỡ Vai Trễ', 'ao-so-mi-nu-tay-lo-vai-tre', 'ASMN-001', '<p><br></p>', NULL, 1, '2022-05-19 09:34:56', '2022-05-19 09:34:56'),
(12, 'Áo Sơ Mi Nữ Tay Ngắn Nano Giữ Form Ít Nhăn', 'ao-so-mi-nu-tay-ngan-nano-giu-form-it-nhan', 'ASMNTN-001', '<p><br></p>', NULL, 1, '2022-05-19 09:54:22', '2022-05-19 09:54:22'),
(13, 'Áo Sơ Mi Nữ Voan Cổ Tim Dáng Suông', 'ao-so-mi-nu-voan-co-tim-dang-suong', 'ASMCVX-01', '<p><br></p>', NULL, 1, '2022-05-19 10:43:36', '2022-05-19 10:43:36'),
(14, 'Áo Phông Nữ Cotton Dáng Suông In Family', 'ao-phong-nu-cotton-dang-suong-in-family', 'ATTN-001', '<p><br></p>', NULL, 1, '2022-05-19 10:46:53', '2022-05-19 10:46:53'),
(15, 'Áo T-Shirt Nữ In Ngực Thể Thao Mềm Mịn Thông Thoáng Hồng', 'ao-t-shirt-nu-in-nguc-the-thao-mem-min-thong-thoang-hong', 'ATIN-01', '<p><br></p>', NULL, 1, '2022-05-19 10:49:22', '2022-05-19 10:49:22'),
(16, 'Áo T-Shirt Nữ Cotton Compact Cổ Tròn In Ngực', 'ao-t-shirt-nu-cotton-compact-co-tron-in-nguc', 'ATTST-01', '<p><br></p>', NULL, 1, '2022-05-19 10:55:40', '2022-05-19 10:55:40'),
(17, 'Quần Jean Nam Slim Fit Lycra Siêu Co Giãn', 'quan-jean-nam-slim-fit-lycra-sieu-co-gian', 'QJNSFL-01', '<p><br></p>', NULL, 1, '2022-05-19 11:01:30', '2022-05-19 11:01:30'),
(18, 'Quần Jean Nam Cotton USA Ống Suông Co Giãn Tốt', 'quan-jean-nam-cotton-usa-ong-suong-co-gian-tot', 'QJNCCUSA-01', '<p><br></p>', NULL, 1, '2022-05-19 11:03:48', '2022-05-19 11:03:48'),
(19, 'Quần Âu Nam Classic Bổ Túi Sườn', 'quan-au-nam-classic-bo-tui-suon', 'QANCB-01', '<p><br></p>', NULL, 1, '2022-05-19 11:07:06', '2022-05-19 11:07:06'),
(20, 'Quần Short Nam Lưng Thun Đổi Màu', 'quan-short-nam-lung-thun-doi-mau', 'QSNLT-01', '<p><br></p>', NULL, 1, '2022-05-19 11:09:35', '2022-05-19 11:09:35'),
(21, 'Quần Sooc Nam Ống Đứng Trẻ Trung', 'quan-sooc-nam-ong-dung-tre-trung', 'QSNOD-01', '<p><br></p>', NULL, 1, '2022-05-19 11:12:22', '2022-05-19 11:12:22'),
(22, 'Áo Sơ Mi Nam Tay Ngắn Cổ Đức Họa Tiết Lá', 'ao-so-mi-nam-tay-ngan-co-duc-hoa-tiet-la', 'ASMNTN-01', '<p><br></p>', NULL, 1, '2022-05-19 11:16:04', '2022-05-19 11:16:04'),
(23, 'Áo Sơ Mi Nam Viscose Tay Ngắn Họa Tiết', 'ao-so-mi-nam-viscose-tay-ngan-hoa-tiet', 'ASMNVT-01', '<p><br></p>', NULL, 1, '2022-05-19 11:18:20', '2022-05-19 11:18:20'),
(24, 'Áo T-Shirt Nam Cotton USA Phiên Bản Premium', 'ao-t-shirt-nam-cotton-usa-phien-ban-premium', 'ATNCTUSA-01', '<p><br></p>', NULL, 1, '2022-05-19 11:22:58', '2022-05-19 11:22:58'),
(25, 'Áo Phông Nam Cotton Compact In Chữ Phản Quang', 'ao-phong-nam-cotton-compact-in-chu-phan-quang', 'ATNCTCI-02', '<p><br></p>', NULL, 1, '2022-05-19 11:25:39', '2022-05-19 11:25:39'),
(26, 'Túi xách tay nữ K01', 'tui-xach-tay-nu-k01', 'TSN-D01', '<p><br></p>', '2', 1, '2022-05-19 14:13:16', '2022-05-19 14:13:16'),
(27, 'Túi xách thời trang cao cấp', 'tui-xach-thoi-trang-cao-cap', 'TSN-D02', '<p><br></p>', NULL, 1, '2022-05-19 14:16:01', '2022-05-19 20:54:08'),
(28, 'Túi xách thời trang nữ TX 001', 'tui-xach-thoi-trang-nu-tx-001', 'TSN-D03', '<p><br></p>', '5', 1, '2022-05-19 14:18:35', '2022-05-19 14:18:35'),
(29, 'Nón bucket hiện đại Nylon Basic', 'non-bucket-hien-dai-nylon-basic', 'NNBK-01', '<p><br></p>', NULL, 1, '2022-05-19 14:25:11', '2022-05-19 14:25:11'),
(30, 'Nón bóng chày phối lưới New Ad X Fit', 'non-bong-chay-phoi-luoi-new-ad-x-fit', 'NBCPL-01', '<p><br></p>', NULL, 1, '2022-05-19 14:27:21', '2022-05-19 14:27:21'),
(31, 'Nón bóng chày thời trang Monogram Ball', 'non-bong-chay-thoi-trang-monogram-ball', 'NBCNN-01', '<p><br></p>', NULL, 1, '2022-05-19 14:29:49', '2022-05-19 14:29:49'),
(32, 'Nón bucket thời trang Summer Monogram', 'non-bucket-thoi-trang-summer-monogram', 'NBKTT-01', '<p><br></p>', NULL, 1, '2022-05-19 14:32:34', '2022-05-19 14:32:34'),
(33, 'Nón bucket nữ thời trang Fioraio', 'non-bucket-nu-thoi-trang-fioraio', 'NBKFOR-02', '<p><br></p>', NULL, 1, '2022-05-19 14:34:39', '2022-05-19 14:34:39'),
(34, 'Nón bucket nữ thời trang Fioraio2', 'non-bucket-nu-thoi-trang-fioraio2', 'NBKFOR-03', '<p><span style=\"color: rgb(0, 0, 0);\">\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"</span></p>', NULL, 1, '2022-05-02 14:37:35', '2022-05-20 18:03:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products_detail`
--

CREATE TABLE `products_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_thumb` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` double NOT NULL DEFAULT 0,
  `price` double NOT NULL DEFAULT 0,
  `sell_price` double NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `sub_quantity` int(11) NOT NULL DEFAULT 0,
  `is_default` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products_detail`
--

INSERT INTO `products_detail` (`id`, `product_id`, `sku`, `photo_thumb`, `cost`, `price`, `sell_price`, `quantity`, `sub_quantity`, `is_default`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'QJNB-001-DX', 'admin/products/365qwED1ZeeA6kSrkJP9qimVyOyO9jQ0vISKk9ee.webp', 250000, 400000, 0, 30, 30, 1, 1, '2022-05-19 08:09:54', '2022-05-23 16:28:09'),
(2, 1, 'QJNB-001-DL', 'admin/products/LTBPKSioQ4RhLGQXH9wnpOIIAnRWsNymuTnDKTQd.webp', 250000, 400000, 0, 40, 40, 0, 1, '2022-05-19 08:09:54', '2022-05-19 08:09:54'),
(3, 1, 'QJNB-001-BL2', 'admin/products/tDKt7aIZ65sA8dxmJHaTgSloJXJp0zQPpWS3bvyu.webp', 250000, 400000, 0, 25, 25, 0, 1, '2022-05-19 08:09:54', '2022-05-19 08:09:54'),
(4, 1, 'QJNB-001-BLX', 'admin/products/aFB7XVzFn3Ex7jYInCvvUMe2zNT8X4xuqcfX7TTG.webp', 250000, 400000, 0, 15, 15, 0, 1, '2022-05-19 08:09:54', '2022-05-19 08:09:54'),
(5, 1, 'QJNB-001-BXL', 'admin/products/W8o3aUn248bmdRduZfNDWTTSVOBnSA5OEGlq5xAy.webp', 250000, 400000, 0, 15, 15, 0, 1, '2022-05-19 08:09:54', '2022-05-19 08:09:54'),
(6, 1, 'QJNB-001-BX', 'admin/products/xJzG82LLFFeiIUi2vr7wDy6iYGmfOsj68LkAXlRG.jpg', 250000, 400000, 0, 15, 15, 0, 1, '2022-05-19 08:09:54', '2022-05-19 08:37:34'),
(7, 1, 'QJNB-001-BL', 'admin/products/DzibFtAruz7afqZLi1GpGkE0a3p1ZjT7h2Lmba0Y.jpg', 250000, 400000, 0, 15, 15, 0, 1, '2022-05-19 08:09:54', '2022-05-19 08:37:34'),
(8, 1, 'QJNB-001-BSL', 'admin/products/rETibjBPRKyFOePvd3StUVuJxn9kH279PEDIR6zT.jpg', 250000, 400000, 0, 15, 15, 0, 1, '2022-05-19 08:09:55', '2022-05-19 08:37:34'),
(9, 1, 'QJNB-001-BM', 'admin/products/TqedmNIFimRbYaQ75s8x9tN8BpRkPEuNseWBgItY.jpg', 250000, 400000, 0, 15, 15, 0, 1, '2022-05-19 08:09:55', '2022-05-19 08:37:34'),
(10, 1, 'QJNB-001-B2', 'admin/products/ebHWOwqcJ3N5lA7C39GSUDeePvp1PQueh0aqtdeC.webp', 250000, 400000, 0, 15, 15, 0, 1, '2022-05-19 08:09:55', '2022-05-19 08:37:34'),
(11, 1, 'QJNB-001-BS', 'admin/products/SJrbeGYnxx0llqYkpcYSsAJTMWSo7KzakzP7dtS8.webp', 250000, 400000, 0, 15, 15, 0, 1, '2022-05-19 08:09:55', '2022-05-19 08:37:34'),
(12, 2, 'QJNB-002-N21-N2', 'admin/products/IrFonbbQQzO0Sapi4rXDJLgJC7IczgkoCASsZeHA.jpg', 300000, 450000, 0, 15, 15, 1, 1, '2022-05-19 09:05:26', '2022-05-23 16:28:09'),
(13, 2, 'QJNB-002-NX2-NX', 'admin/products/EK1P0B3NYXqc5GTfFZUMPvPU1EKdHSGH7lww6okX.jpg', 300000, 450000, 0, 15, 15, 0, 1, '2022-05-19 09:05:28', '2022-05-19 09:05:28'),
(14, 2, 'QJNB-002-BL3-BL', 'admin/products/hhMPs7yM1P8NmyyH1dHEUQweVsALgU2SiybmpPvq.webp', 300000, 450000, 0, 15, 15, 0, 1, '2022-05-19 09:05:28', '2022-05-19 09:05:28'),
(15, 2, 'QJNB-002-BX4-BX', 'admin/products/GkaFiQt53ecjVPEQ5Bzs6zgsXzCyKTQCetg42SiU.webp', 300000, 450000, 0, 15, 15, 0, 1, '2022-05-19 09:05:28', '2022-05-19 09:05:28'),
(16, 2, 'QJNB-002-BS5-BS', 'admin/products/n14DVflioMT4nsIYbbXzfRQKA3kvbxKEIQndOH8p.webp', 300000, 450000, 0, 15, 15, 0, 1, '2022-05-19 09:05:28', '2022-05-19 09:05:28'),
(17, 2, 'QJNB-002-D26-D2', 'admin/products/jByVSEl88Aj0JAbXzC8hYUMDHSPzbwLPVOtAzofW.webp', 300000, 450000, 0, 15, 15, 0, 1, '2022-05-19 09:05:28', '2022-05-19 09:05:28'),
(18, 2, 'QJNB-002-DX7-DX', 'admin/products/PBBSSlrATqVd14O7MayD74dYphuj9RrF8wygXnOZ.webp', 300000, 450000, 0, 15, 15, 0, 1, '2022-05-19 09:05:28', '2022-05-19 09:05:28'),
(19, 3, 'QJNB-003-B21-B2', 'admin/products/MFXheSTekrE0Hrl1sLNijCD6kmsL2LKDhBM87B0l.webp', 200000, 350000, 0, 30, 29, 1, 1, '2022-05-19 09:11:05', '2022-05-23 16:30:22'),
(20, 3, 'QJNB-003-BX2-BX', 'admin/products/eY3dkm4NXbvpUN3ca9Q7U6Tyq9YXNH7K4xbDBDOK.webp', 200000, 350000, 0, 20, 20, 0, 1, '2022-05-19 09:11:05', '2022-05-19 09:11:05'),
(21, 3, 'QJNB-003-GX3-GX', 'admin/products/SQyOzB2eK9mekWVxACo51zi7A4HtBXKVtVMejy3U.webp', 200000, 350000, 0, 15, 15, 0, 1, '2022-05-19 09:11:05', '2022-05-19 09:11:05'),
(22, 3, 'QJNB-003-GL4-GL', 'admin/products/SaZuAFYgnUJA54SOkzlK5BlWQAm2QDEuL25RyKbZ.webp', 200000, 350000, 0, 25, 25, 0, 1, '2022-05-19 09:11:05', '2022-05-19 09:11:05'),
(23, 3, 'QJNB-003-NX5-NX', 'admin/products/qVomm5oCmKUnQCAvDKFPvmdZ2Ob0EqP6wFNaYIFu.webp', 200000, 350000, 0, 10, 10, 0, 1, '2022-05-19 09:11:05', '2022-05-19 09:11:05'),
(24, 3, 'QJNB-003-NL6-NL', 'admin/products/JhGiEXfNWpSK4N99kW5h4UpahaGKyAJhf2sXamMs.webp', 200000, 350000, 0, 30, 30, 0, 1, '2022-05-19 09:11:05', '2022-05-19 09:11:05'),
(25, 3, 'QJNB-003-N27-N2', 'admin/products/f3lJJQmmuzAfWx6c7LMddQYNyJazPcY7gEYRWgyl.webp', 200000, 350000, 0, 10, 10, 0, 1, '2022-05-19 09:11:05', '2022-05-19 09:11:05'),
(26, 3, 'QJNB-003-NS8-NS', 'admin/products/rg4P2rwUxXLnocmmIcvYFkHfJuc49EBTjdIYkPp8.webp', 200000, 350000, 0, 10, 10, 0, 1, '2022-05-19 09:11:05', '2022-05-19 09:11:05'),
(27, 4, 'QKKNB-001-YX1-YX', 'admin/products/noEV3BHCvZl3yCroJ9DKl7bLKkJxKvpFkL5w4cdm.webp', 300000, 500000, 0, 30, 30, 1, 1, '2022-05-19 09:15:41', '2022-05-23 16:28:09'),
(28, 4, 'QKKNB-001-YM2-YM', 'admin/products/q55W75yCX45uYX6aHwpAlGNwk57pidutmH790CFU.webp', 300000, 500000, 0, 25, 25, 0, 1, '2022-05-19 09:15:41', '2022-05-19 09:15:41'),
(29, 4, 'QKKNB-001-YS3-YS', 'admin/products/qaQXocSkYaBmLsq9R0LmR3jZzMVuksRfTUIIPTuW.webp', 300000, 500000, 0, 25, 25, 0, 1, '2022-05-19 09:15:41', '2022-05-19 09:15:41'),
(30, 4, 'QKKNB-001-Y24-Y2', 'admin/products/AYMJ7khTjXCoB6OOTbQ4DgPjTCeEpU2J2cF1GuQc.webp', 300000, 500000, 0, 25, 25, 0, 1, '2022-05-19 09:15:41', '2022-05-19 09:15:41'),
(31, 4, 'QKKNB-001-B25-B2', 'admin/products/3TKSRBy7Y9GCxIWqXfw4Eq42U8XBj9l7U27x50ii.webp', 300000, 500000, 0, 25, 25, 0, 1, '2022-05-19 09:15:41', '2022-05-19 09:15:41'),
(32, 4, 'QKKNB-001-BX6-BX', 'admin/products/bMz2I9T2nGfHLYAqBztzN8zYdZzdOcOVNpzyIQrJ.webp', 300000, 500000, 0, 25, 25, 0, 1, '2022-05-19 09:15:41', '2022-05-19 09:15:41'),
(33, 4, 'QKKNB-001-BS7-BS', 'admin/products/lPjFcjjkS7XqdQe5HNsfU2eyL4OUhGneMnWZLAwS.webp', 300000, 500000, 0, 25, 25, 0, 1, '2022-05-19 09:15:41', '2022-05-19 09:15:41'),
(34, 4, 'QKKNB-001-NS8-NS', 'admin/products/3Hgv7qVISVwdpc38TUQ8vop6QFAsykdFGYGBleq2.jpg', 300000, 500000, 0, 25, 25, 0, 1, '2022-05-19 09:15:41', '2022-05-19 09:15:41'),
(35, 4, 'QKKNB-001-N29-N2', 'admin/products/ED0O21DSf8sA3OXuIiqyilEyrRTeyKqq20RBkpxO.jpg', 300000, 500000, 0, 25, 25, 0, 1, '2022-05-19 09:15:41', '2022-05-19 09:15:41'),
(36, 4, 'QKKNB-001-NX10-NX', 'admin/products/BrbC2miPc5u0qkEXXM2fxuFxspSvMUQy1i2LnFEs.jpg', 300000, 500000, 0, 25, 25, 0, 1, '2022-05-19 09:15:41', '2022-05-19 09:15:41'),
(37, 4, 'QKKNB-001-NM11-NM', 'admin/products/zUShOWyqz8WJSI2O6VoXybAXJFq4KBy0Ww7r4Msx.jpg', 300000, 500000, 0, 25, 25, 0, 1, '2022-05-19 09:15:41', '2022-05-19 09:15:41'),
(38, 5, 'QKKNB-002-YS1-YS', 'admin/products/Nh9qhVEMhzJ4iDhB8QDAkeGIih9izH6yarDY7KIs.webp', 250000, 350000, 0, 30, 30, 1, 1, '2022-05-19 09:18:36', '2022-05-19 09:18:36'),
(39, 5, 'QKKNB-002-YX2-YX', 'admin/products/Qf4XzIWzZVkmnfV6BiKPgOT0goL9gHKxQOVqGXhE.webp', 250000, 350000, 0, 30, 30, 0, 1, '2022-05-19 09:18:36', '2022-05-19 09:18:36'),
(40, 5, 'QKKNB-002-BS3-BS', 'admin/products/tMs9iEWRvKoorMjXB5D8tRWa3uJFMqL6793xvnfZ.webp', 250000, 350000, 0, 30, 30, 0, 1, '2022-05-19 09:18:36', '2022-05-19 09:18:36'),
(41, 5, 'QKKNB-002-BL4-BL', 'admin/products/9o9DOZw5qCEEfE69M8uUweHqKeoKwKU7rhDdzyUw.webp', 250000, 350000, 0, 30, 30, 0, 1, '2022-05-19 09:18:36', '2022-05-19 09:18:36'),
(42, 5, 'QKKNB-002-WX5-WX', 'admin/products/rbf61duun9q1AFFteVF4roZ8wSFlJzDB0oxR2HUh.webp', 250000, 350000, 0, 30, 30, 0, 1, '2022-05-19 09:18:36', '2022-05-19 09:18:36'),
(43, 5, 'QKKNB-002-W26-W2', 'admin/products/cQUmAUKOOmiAVCVDKLAxkfKfIlpzV6wJa3wuzpbK.webp', 250000, 350000, 0, 30, 30, 0, 1, '2022-05-19 09:18:36', '2022-05-19 09:18:36'),
(44, 6, 'QVNB-001-BS1-BS', 'admin/products/k1lRVWxm4peZVm3LlZGZYEZWE5DLeAQ2MWM7DmF8.webp', 300000, 500000, 0, 30, 30, 1, 1, '2022-05-19 09:21:55', '2022-05-19 09:21:55'),
(45, 6, 'QVNB-001-B22-B2', 'admin/products/wiPBSVxTrcRqjh5VCmyD4RVtWV8nBrhDZlKvXP1i.webp', 300000, 500000, 0, 20, 20, 0, 1, '2022-05-19 09:21:55', '2022-05-19 09:21:55'),
(46, 6, 'QVNB-001-GS3-GS', 'admin/products/bWQnYBV7CgNMjlzvGR4NOPjtuEFz8HOovFsJ6piy.webp', 300000, 500000, 0, 20, 20, 0, 1, '2022-05-19 09:21:55', '2022-05-19 09:21:55'),
(47, 6, 'QVNB-001-GM4-GM', 'admin/products/jJoIXKGWssY5iATa4zKaCpmoD1zRQAiswzSX65nE.webp', 300000, 500000, 0, 20, 20, 0, 1, '2022-05-19 09:21:55', '2022-05-19 09:21:55'),
(48, 6, 'QVNB-001-GX5-GX', 'admin/products/q9o6fsRFkkCZdYmIgSMY75Mg3N3fjQ81TEIa9BNt.webp', 300000, 500000, 0, 20, 20, 0, 1, '2022-05-19 09:21:55', '2022-05-19 09:21:55'),
(49, 7, 'QVNB-002-NS1-NS', 'admin/products/EEmoFdSRXZIi3Ig2mTQaagVtNUfXTX5TAHwDqLVC.webp', 300000, 450000, 0, 40, 40, 1, 1, '2022-05-19 09:23:32', '2022-05-19 09:23:32'),
(50, 7, 'QVNB-002-NM2-NM', 'admin/products/D3ENqxWY9NBNSrD1sE4C1MWRb5R2qNBUlUpu47sU.webp', 300000, 450000, 0, 40, 40, 0, 1, '2022-05-19 09:23:32', '2022-05-19 09:23:32'),
(51, 7, 'QVNB-002-N23-N2', 'admin/products/G1iLAKdebmRdOFYltLrwR3oMinuaD02xji8BQGRg.webp', 300000, 450000, 0, 40, 40, 0, 1, '2022-05-19 09:23:33', '2022-05-19 09:23:33'),
(52, 8, 'QVNB-003-BS1-BS', 'admin/products/nZyyE0fI57U0cipaeNJKrSVjYV1yvtJ4F2J0R2HW.webp', 300000, 450000, 0, 30, 30, 1, 1, '2022-05-19 09:24:49', '2022-05-19 09:24:49'),
(53, 8, 'QVNB-003-BM2-BM', 'admin/products/R8JBawUN8NQuG6CftkeHPQyiNcBeb2C9AA7ayz0y.webp', 300000, 450000, 0, 30, 30, 0, 1, '2022-05-19 09:24:49', '2022-05-19 09:24:49'),
(54, 9, 'QVVNB-001-PS1-PS', 'admin/products/HKj2SrvFfbHk5DG27RCsDTsBVA0sp36fKZsyE67K.webp', 450000, 600000, 0, 35, 35, 1, 1, '2022-05-19 09:28:03', '2022-05-19 09:28:03'),
(55, 9, 'QVVNB-001-PM2-PM', 'admin/products/DDCAoUPGtNQDbs7PN2JEcURonIBv1EG2VTXFJ5PG.webp', 450000, 600000, 0, 35, 35, 0, 1, '2022-05-19 09:28:03', '2022-05-19 09:28:03'),
(56, 9, 'QVVNB-001-WS3-WS', 'admin/products/HHVAhxV6bLrEo5F7rCrBGU1heGnFmM308LW7aKbI.webp', 450000, 600000, 0, 35, 35, 0, 1, '2022-05-19 09:28:03', '2022-05-19 09:28:03'),
(57, 9, 'QVVNB-001-WM4-WM', 'admin/products/rZWohYVah2rQoRK7RKymeelKSYlvaoFnxsLxnEsX.webp', 450000, 600000, 0, 35, 35, 0, 1, '2022-05-19 09:28:03', '2022-05-19 09:28:03'),
(58, 9, 'QVVNB-001-WL5-WL', 'admin/products/FEiFjSvlfeUa1n2886p3JSrnukVy2nbhDi62g2k1.webp', 450000, 600000, 0, 35, 35, 0, 1, '2022-05-19 09:28:03', '2022-05-19 09:28:03'),
(59, 10, 'QVSNB-001-2B1-2B', 'admin/products/OiDEV1ha1Vv9eHdcT1gERlk0eT0qZbULvouPRFHY.webp', 400000, 600000, 0, 30, 30, 1, 1, '2022-05-19 09:30:24', '2022-05-19 09:30:24'),
(60, 10, 'QVSNB-001-SB2-SB', 'admin/products/SNK2SdSX7erTs2g3jbEXSxHbqFKkg9c5iGJW1oMk.webp', 400000, 600000, 0, 30, 30, 0, 1, '2022-05-19 09:30:24', '2022-05-19 09:30:24'),
(61, 10, 'QVSNB-001-LB3-LB', 'admin/products/w3uKJgXa2f84vdsM3u0lSnRCgxYYGwi44SUmJ72z.webp', 400000, 600000, 0, 30, 30, 0, 1, '2022-05-19 09:30:24', '2022-05-19 09:30:24'),
(62, 10, 'QVSNB-001-2W4-2W', 'admin/products/5qVoX4r0suWZuxrd2TuaiwZfYRuW9cr43TdWXP64.webp', 400000, 600000, 0, 30, 30, 0, 1, '2022-05-19 09:30:24', '2022-05-19 09:30:24'),
(63, 10, 'QVSNB-001-MW5-MW', 'admin/products/VMqumKbfgAQZk3dXWTZdtNxJ5uddPv0Wo5OTvXIn.webp', 400000, 600000, 0, 30, 30, 0, 1, '2022-05-19 09:30:24', '2022-05-19 09:30:24'),
(64, 10, 'QVSNB-001-LW6-LW', 'admin/products/IzCXuyQxEkorrbIx1ASwtR4mcjXjSG2jmcMC2or7.webp', 400000, 600000, 0, 30, 30, 0, 1, '2022-05-19 09:30:24', '2022-05-19 09:30:24'),
(65, 11, 'ASMN-001-GS1-GS', 'admin/products/xKVfBfAC8ivhc8wG1yCM2GWPOCrFmsFGFeLdLnWV.webp', 250000, 350000, 0, 10, 10, 1, 1, '2022-05-19 09:34:58', '2022-05-19 09:34:58'),
(66, 11, 'ASMN-001-GM2-GM', 'admin/products/7STgTVJe0h3LMK3EBoDsEKP7HtdQLlW6CuT8XCoN.webp', 250000, 350000, 0, 10, 10, 0, 1, '2022-05-19 09:34:58', '2022-05-19 09:34:58'),
(67, 11, 'ASMN-001-YS3-YS', 'admin/products/f1WcKJyNnAqb72owtBYgmspPiw2AgFqbjkduLesM.jpg', 250000, 350000, 0, 10, 10, 0, 1, '2022-05-19 09:34:58', '2022-05-19 09:34:58'),
(68, 11, 'ASMN-001-YM4-YM', 'admin/products/kc28QTbcqPd8vhoICZuA5QDDqfPWUy5CT6yc346F.jpg', 250000, 350000, 0, 10, 10, 0, 1, '2022-05-19 09:34:58', '2022-05-19 09:34:58'),
(69, 11, 'ASMN-001-N25-N2', 'admin/products/foA0rUBu2ii2ZwfoGwQl6Cg6l8iomBlGNCFsteID.jpg', 250000, 350000, 0, 10, 10, 0, 1, '2022-05-19 09:34:58', '2022-05-19 09:34:58'),
(70, 11, 'ASMN-001-NX6-NX', 'admin/products/KFnb3S1Tp6Wb8gG1b7zgZFNKJrn1fcreYNksIQLP.jpg', 250000, 350000, 0, 10, 10, 0, 1, '2022-05-19 09:34:58', '2022-05-19 09:34:58'),
(71, 12, 'ASMNTN-001-NS1-NS', 'admin/products/4lbDPv7cTbypPWpRF5fDpq9TgL0Ze2dli0GGV8gR.webp', 30000, 500000, 0, 20, 20, 1, 1, '2022-05-19 09:54:22', '2022-05-19 09:54:22'),
(72, 12, 'ASMNTN-001-NM2-NM', 'admin/products/78wyFj8HL4h8cQxCrKb4Bf0NQ6K2zP02D4NBLxYt.webp', 30000, 450000, 0, 20, 20, 0, 1, '2022-05-19 09:54:22', '2022-05-20 17:57:53'),
(73, 12, 'ASMNTN-001-NL3-NL', 'admin/products/9CAj0uyBlMAebAwYeZFQeiOGuAGHcxLq2IG2XURS.webp', 30000, 500000, 0, 20, 20, 0, 1, '2022-05-19 09:54:22', '2022-05-19 09:54:22'),
(74, 12, 'ASMNTN-001-WS4-WS', 'admin/products/r7JsUVN4xt0ry4BIb89ie4rLTyWYIKdmoDRGpOmR.jpg', 30000, 520000, 0, 20, 20, 0, 1, '2022-05-19 09:54:22', '2022-05-20 17:57:53'),
(75, 12, 'ASMNTN-001-W25-W2', 'admin/products/62WQYHd9JWQOvOrt9GiJogutf73xglceyvgXJOfJ.jpg', 30000, 550000, 0, 20, 20, 0, 1, '2022-05-19 09:54:22', '2022-05-20 17:57:53'),
(76, 12, 'ASMNTN-001-VM6-VM', 'admin/products/nzAs9fDOK9Ey4vC132raWjRf4kMnvoybbXTYQuPL.webp', 30000, 510000, 0, 20, 20, 0, 1, '2022-05-19 09:54:22', '2022-05-20 17:57:53'),
(77, 12, 'ASMNTN-001-VS7-VS', 'admin/products/eUKRJ5QTJATfqDG2m2C38VxUtItItB9Xme55B3i2.webp', 30000, 500000, 0, 20, 20, 0, 1, '2022-05-19 09:54:22', '2022-05-19 09:54:22'),
(78, 13, 'ASMCVX-01-YS1-YS', 'admin/products/V9Dysjv3IfGu4oPouAlTwTbqsesdD7ePiMiOGcgj.webp', 300000, 450000, 0, 45, 45, 1, 1, '2022-05-19 10:43:38', '2022-05-19 10:43:38'),
(79, 13, 'ASMCVX-01-YM2-YM', 'admin/products/hQZ8siT5vNfzS3HKFwq55wvr6ivZ3V5Z3SKMTOv0.webp', 300000, 450000, 0, 45, 45, 0, 1, '2022-05-19 10:43:38', '2022-05-19 10:43:38'),
(80, 13, 'ASMCVX-01-Y23-Y2', 'admin/products/dbmr1GnrbQYkR8rhuyDplFGR6xSmzM8xZENr1RYH.webp', 300000, 450000, 0, 45, 45, 0, 1, '2022-05-19 10:43:38', '2022-05-19 10:43:38'),
(81, 13, 'ASMCVX-01-WS4-WS', 'admin/products/95jH59tLmsgvvt0fbplbM5va9KsMIQ3YKoL2z6R6.webp', 300000, 450000, 0, 45, 45, 0, 1, '2022-05-19 10:43:38', '2022-05-19 10:43:38'),
(82, 13, 'ASMCVX-01-WM5-WM', 'admin/products/5NI0sRPEaqWR0iDRrdew2DAViT1utLTwmqoUkyxc.webp', 300000, 450000, 0, 45, 45, 0, 1, '2022-05-19 10:43:38', '2022-05-19 10:43:38'),
(83, 13, 'ASMCVX-01-W26-W2', 'admin/products/oJV7o4hACJfNFGmZj90mJ5SUosRtwcG0ArXKeM2x.webp', 300000, 450000, 0, 45, 45, 0, 1, '2022-05-19 10:43:38', '2022-05-19 10:43:38'),
(84, 13, 'ASMCVX-01-OS7-OS', 'admin/products/MOSstFUVU5iwlsOH5emAgA1s2myU5LBp2g6FeYpo.webp', 300000, 450000, 0, 45, 45, 0, 1, '2022-05-19 10:43:38', '2022-05-19 10:43:38'),
(85, 13, 'ASMCVX-01-OM8-OM', 'admin/products/zGcs6tlkkn32ciib46InFpv5IzCzyMQydF8eV2gc.webp', 300000, 450000, 0, 45, 45, 0, 1, '2022-05-19 10:43:38', '2022-05-19 10:43:38'),
(86, 13, 'ASMCVX-01-OX9-OX', 'admin/products/h2lAtvmzOZNhQu6u9tiOtzqSukYW8uD8aRAQnGvZ.webp', 300000, 450000, 0, 45, 45, 0, 1, '2022-05-19 10:43:38', '2022-05-19 10:43:38'),
(87, 13, 'ASMCVX-01-O210-O2', 'admin/products/MmF0TcHfkhlOnxufESzbbahdr1epZTtJxUOWQa46.webp', 300000, 450000, 0, 45, 45, 0, 1, '2022-05-19 10:43:38', '2022-05-19 10:43:38'),
(88, 14, 'ATTN-001-GS1-GS', 'admin/products/JTCTvNLLLN4mAIHBwCCPgPkqgWZW5OFMlo8MNdxR.webp', 150000, 300000, 0, 20, 20, 1, 1, '2022-05-19 10:46:54', '2022-05-19 10:46:54'),
(89, 14, 'ATTN-001-GM2-GM', 'admin/products/cGDRpof03bMmgGU4SwCau3DmzPnPbIU1oVOf4A9x.webp', 150000, 300000, 0, 20, 20, 0, 1, '2022-05-19 10:46:54', '2022-05-19 10:46:54'),
(90, 14, 'ATTN-001-GX3-GX', 'admin/products/LDMFhVRnnX9DxqQmrvwtbQcLPEibkzHPCYSkuKUx.webp', 150000, 300000, 0, 20, 20, 0, 1, '2022-05-19 10:46:55', '2022-05-19 10:46:55'),
(91, 14, 'ATTN-001-WS4-WS', 'admin/products/GRXrXSkNgHeZINmAyUCCY81GHsAIriXgfZcufjuw.webp', 150000, 300000, 0, 20, 20, 0, 1, '2022-05-19 10:46:55', '2022-05-19 10:46:55'),
(92, 14, 'ATTN-001-W25-W2', 'admin/products/hwJwRofmFUlb5ZVcsOT9lCWXkC0BcSaBFcNyMRoe.webp', 150000, 300000, 0, 20, 20, 0, 1, '2022-05-19 10:46:55', '2022-05-19 10:46:55'),
(93, 14, 'ATTN-001-NS6-NS', 'admin/products/3ssz2XvqTxvY8z5TfG0AyjdmQ2LT2Qs7gtaJ2kpt.webp', 150000, 300000, 0, 20, 20, 0, 1, '2022-05-19 10:46:55', '2022-05-19 10:46:55'),
(94, 14, 'ATTN-001-NM7-NM', 'admin/products/Cl2pgOJ1JM3xgAvGuYBY1WkC4aZEgxoCzTq0lIFD.webp', 150000, 300000, 0, 20, 20, 0, 1, '2022-05-19 10:46:55', '2022-05-19 10:46:55'),
(95, 15, 'ATIN-01-2P1-2P', 'admin/products/WwzjncKahCMMIp0axP9tqK0EBFL2scklwLxMpr55.webp', 150000, 250000, 0, 10, 10, 1, 1, '2022-05-19 10:49:23', '2022-05-23 16:28:09'),
(96, 15, 'ATIN-01-XP2-XP', 'admin/products/O01Ub33Hp8n7JFpiBpvoQkJIiOYTZPYnXQ29hoo8.webp', 150000, 250000, 0, 10, 10, 0, 1, '2022-05-19 10:49:23', '2022-05-19 10:49:23'),
(97, 15, 'ATIN-01-MP3-MP', 'admin/products/8jaNJDa109OnNqGg6LFMXe8qW4titYj2gtCkPU6z.webp', 150000, 250000, 0, 20, 20, 0, 1, '2022-05-19 10:49:24', '2022-05-19 10:49:24'),
(98, 15, 'ATIN-01-SP4-SP', 'admin/products/fj3M56z33oAjdM38B6FfLUknD0Z3RAdHxo6tp70X.webp', 150000, 250000, 0, 10, 10, 0, 1, '2022-05-19 10:49:24', '2022-05-19 10:49:24'),
(99, 16, 'ATTST-01-WS1-WS', 'admin/products/rsZFqOgrSVcjGs52xQdyXSHwcNEE8B0bLTnak5lV.webp', 200000, 400000, 0, 20, 20, 1, 1, '2022-05-19 10:55:42', '2022-05-19 10:55:42'),
(100, 16, 'ATTST-01-WM2-WM', 'admin/products/6AlggtLUDqC1gERfki17qsBoqUEwTlm9UfCVnPu4.webp', 200000, 400000, 0, 20, 20, 0, 1, '2022-05-19 10:55:42', '2022-05-19 10:55:42'),
(101, 16, 'ATTST-01-WL3-WL', 'admin/products/d2nbmUopHeaid6rmTMqmVZkQTz1b1z27zKAIqbtv.webp', 200000, 400000, 0, 20, 20, 0, 1, '2022-05-19 10:55:42', '2022-05-19 10:55:42'),
(102, 16, 'ATTST-01-BS4-BS', 'admin/products/IDhlx4noCWVXEHZBCL8P6dGhQBGuJplyXxOmbHP7.webp', 200000, 400000, 0, 20, 20, 0, 1, '2022-05-19 10:55:42', '2022-05-19 10:55:42'),
(103, 16, 'ATTST-01-BM5-BM', 'admin/products/aXhLg6Wy29lqNfGnOXUY5bvPj3bfBSH9RIWL2xvP.webp', 200000, 400000, 0, 20, 20, 0, 1, '2022-05-19 10:55:42', '2022-05-19 10:55:42'),
(104, 16, 'ATTST-01-GS6-GS', 'admin/products/QBF0LiZEEjHfCT0mxaTKPidnoARDSTpaPTPtyUhi.webp', 200000, 400000, 0, 20, 20, 0, 1, '2022-05-19 10:55:42', '2022-05-19 10:55:42'),
(105, 16, 'ATTST-01-GM7-GM', 'admin/products/GxjYM4MXkDpfiCwLzGf667WNjY3tGB958vgDet8y.webp', 200000, 400000, 0, 30, 30, 0, 1, '2022-05-19 10:55:42', '2022-05-19 10:55:42'),
(106, 16, 'ATTST-01-G28-G2', 'admin/products/p8uQDxDxEXqZisgReL9VqW9YxmeU97zxr1xc6Xgk.webp', 200000, 400000, 0, 10, 10, 0, 1, '2022-05-19 10:55:42', '2022-05-19 10:55:42'),
(107, 17, 'QJNSFL-01-BM1-BM', 'admin/products/nbSKLK6wL6wywSEJIimmShjkTjqQr5wgPoxV025w.webp', 250000, 350000, 0, 10, 10, 1, 1, '2022-05-19 11:01:31', '2022-05-23 16:28:09'),
(108, 17, 'QJNSFL-01-BS2-BS', 'admin/products/qTtfT1dFThsFCqlt7H5bHvJYod6tgL24VI7gq5zo.webp', 250000, 350000, 0, 10, 10, 0, 1, '2022-05-19 11:01:31', '2022-05-19 11:01:31'),
(109, 17, 'QJNSFL-01-B23-B2', 'admin/products/fcXVUg7eiWyj16QASL8GvgFhIBN5kOfZou9OE4G4.webp', 250000, 350000, 0, 10, 10, 0, 1, '2022-05-19 11:01:31', '2022-05-19 11:01:31'),
(110, 17, 'QJNSFL-01-BS4-BS', 'admin/products/Noiumm2ZqZsoD4EfBj5n8Wlc9twlni12bhPtRVHZ.webp', 250000, 350000, 0, 10, 10, 0, 1, '2022-05-19 11:01:31', '2022-05-19 11:01:31'),
(111, 17, 'QJNSFL-01-BM5-BM', 'admin/products/94BDL7EZgh9ztJJZ6cMUAhEh1N5yoCgzkDa1zJ96.webp', 250000, 350000, 0, 10, 10, 0, 1, '2022-05-19 11:01:31', '2022-05-19 11:01:31'),
(112, 17, 'QJNSFL-01-BX6-BX', 'admin/products/EIRLX7xQmr7f762PyftellzQQ082Pfc6EozuEyrP.webp', 250000, 350000, 0, 10, 10, 0, 1, '2022-05-19 11:01:31', '2022-05-19 11:01:31'),
(113, 17, 'QJNSFL-01-GS7-GS', NULL, 250000, 350000, 0, 10, 10, 0, 1, '2022-05-19 11:01:31', '2022-05-19 11:01:31'),
(114, 17, 'QJNSFL-01-GL8-GL', 'admin/products/8lnR8Sl0izLfnflxymLeRNjJcxn3QywrONxaR3hq.jpg', 250000, 350000, 0, 10, 10, 0, 1, '2022-05-19 11:01:31', '2022-05-19 11:01:31'),
(115, 18, 'QJNCCUSA-01-BS1-BS', 'admin/products/1l1z1ZyX4FLg4yiXSlr2kBWdc4ZZlvR7nTavKBIz.webp', 300000, 500000, 0, 20, 20, 1, 1, '2022-05-19 11:03:48', '2022-05-23 16:28:09'),
(116, 18, 'QJNCCUSA-01-B22-B2', 'admin/products/3C6uVbzy5Vb0XqwFeiOPvopHRcvIbrIjH39OWVtE.webp', 300000, 500000, 0, 20, 20, 0, 1, '2022-05-19 11:03:49', '2022-05-19 11:03:49'),
(117, 18, 'QJNCCUSA-01-BX3-BX', 'admin/products/wxWyUHV80Y9b5LNYSoutmB0N5LfX8SOCKonwHjRN.webp', 300000, 500000, 0, 20, 20, 0, 1, '2022-05-19 11:03:49', '2022-05-19 11:03:49'),
(118, 18, 'QJNCCUSA-01-BL4-BL', 'admin/products/yqUTiAnNm48QztgNXV2hhuTlqUNu0A92riRJFKx3.webp', 300000, 500000, 0, 20, 20, 0, 1, '2022-05-19 11:03:49', '2022-05-19 11:03:49'),
(119, 19, 'QANCB-01-GS1-GS', 'admin/products/M07Cj8qcgjcLruZolcmF9UGXlUFpDuDsFot4Ru0Z.webp', 200000, 320000, 0, 30, 30, 1, 1, '2022-05-19 11:07:08', '2022-05-19 11:07:08'),
(120, 19, 'QANCB-01-GX2-GX', 'admin/products/v2GFd0TPader0oUL4YiiAWBS3LVZ79AwdzJO8GZY.webp', 200000, 320000, 0, 30, 30, 0, 1, '2022-05-19 11:07:08', '2022-05-19 11:07:08'),
(121, 19, 'QANCB-01-GM3-GM', 'admin/products/peHedaZdTmWuYphifzgEifZIRferiRbeVhDqTHsV.webp', 200000, 320000, 0, 30, 30, 0, 1, '2022-05-19 11:07:08', '2022-05-19 11:07:08'),
(122, 19, 'QANCB-01-BS4-BS', 'admin/products/MQNP2rJBVUGcaHiiAXmMu3J65ELDZovPAhKpQA0X.webp', 200000, 320000, 0, 30, 30, 0, 1, '2022-05-19 11:07:08', '2022-05-19 11:07:08'),
(123, 19, 'QANCB-01-BM5-BM', 'admin/products/U7IDzuvvP4TjaSzna5jW1Za71am9tKW9YL6dMUiH.webp', 200000, 320000, 0, 30, 30, 0, 1, '2022-05-19 11:07:08', '2022-05-19 11:07:08'),
(124, 19, 'QANCB-01-BL6-BL', 'admin/products/Iz6I0idkBE03NuzojrFok0CFG5bwvJ7DgWh7f3zQ.webp', 200000, 320000, 0, 30, 30, 0, 1, '2022-05-19 11:07:08', '2022-05-19 11:07:08'),
(125, 19, 'QANCB-01-BS7-BS', 'admin/products/j2HzpAZYMBdEBSnECg9JXs9wr6LNC0ywAmyWuMre.webp', 200000, 320000, 0, 30, 30, 0, 1, '2022-05-19 11:07:08', '2022-05-19 11:07:08'),
(126, 19, 'QANCB-01-BM8-BM', 'admin/products/59oOcMWvOohF7wQ3TARPEj90umbAumKLFNl5KrJt.webp', 200000, 320000, 0, 30, 30, 0, 1, '2022-05-19 11:07:08', '2022-05-19 11:07:08'),
(127, 20, 'QSNLT-01-YS1-YS', 'admin/products/svItslkyUsgdnsJYTMC9mJfJUbuuDiLsdcpZmHpo.webp', 100000, 200000, 0, 15, 15, 1, 1, '2022-05-19 11:09:35', '2022-05-19 11:09:35'),
(128, 20, 'QSNLT-01-YM2-YM', 'admin/products/GMATn5lR7irezZi3bX40kLgE8QWjnZoJgcytOoRT.webp', 100000, 200000, 0, 10, 10, 0, 1, '2022-05-19 11:09:35', '2022-05-19 11:09:35'),
(129, 20, 'QSNLT-01-GS3-GS', 'admin/products/v14VSMgNmTtbcel8B8iBj2ypNhGMxWimKraXt7uV.webp', 100000, 200000, 0, 10, 10, 0, 1, '2022-05-19 11:09:35', '2022-05-19 11:09:35'),
(130, 20, 'QSNLT-01-GM4-GM', 'admin/products/FQDLusUFw5VUNVnS76akP1cu6EZmO495fpn24nqh.webp', 100000, 200000, 0, 10, 10, 0, 1, '2022-05-19 11:09:35', '2022-05-19 11:09:35'),
(131, 21, 'QSNOD-01-NS1-NS', 'admin/products/FYBSlljmDz0rpWbu4J665JAhRsn5FE2v6SCwcPDs.webp', 100000, 300000, 0, 20, 20, 1, 1, '2022-05-19 11:12:22', '2022-05-19 11:12:22'),
(132, 21, 'QSNOD-01-NM2-NM', 'admin/products/6OMQ8UN6qXhi4omKbYAWUWGPfCqGPntkQmSgl3Kd.webp', 100000, 300000, 0, 20, 20, 0, 1, '2022-05-19 11:12:22', '2022-05-19 11:12:22'),
(133, 21, 'QSNOD-01-BS3-BS', 'admin/products/U7sLLO9EvUN6FeyWy9rkoYcOmTLnYzPbnqRNFYR3.webp', 100000, 300000, 0, 20, 20, 0, 1, '2022-05-19 11:12:23', '2022-05-19 11:12:23'),
(134, 21, 'QSNOD-01-BM4-BM', 'admin/products/DpXaTlKMmcJDImQoT03H0dyhzhdYknZ98LsvuHAt.webp', 100000, 300000, 0, 20, 20, 0, 1, '2022-05-19 11:12:23', '2022-05-19 11:12:23'),
(135, 21, 'QSNOD-01-BX5-BX', 'admin/products/hL4BLATXQQNsTxVxxOaOEBNnjVjARTiswHrk1XVH.webp', 100000, 300000, 0, 20, 20, 0, 1, '2022-05-19 11:12:23', '2022-05-19 11:12:23'),
(136, 22, 'ASMNTN-01-YS1-YS', 'admin/products/mGEjR8pNv6F0VRQZg44JDU9aAR8GUZ61nmBuhazQ.webp', 100000, 250000, 0, 20, 18, 1, 1, '2022-05-19 11:16:04', '2022-05-23 16:55:54'),
(137, 22, 'ASMNTN-01-YM2-YM', 'admin/products/h0lVQQtON9vhjGW93OfgCZvlUb0iDdb67QMr8Ojc.webp', 100000, 250000, 0, 20, 20, 0, 1, '2022-05-19 11:16:06', '2022-05-19 11:16:06'),
(138, 22, 'ASMNTN-01-NS3-NS', 'admin/products/oOB14vDyA236jKKC3paa2uXy71oCO2KcwVURdUvU.webp', 100000, 250000, 0, 20, 20, 0, 1, '2022-05-19 11:16:06', '2022-05-19 11:16:06'),
(139, 22, 'ASMNTN-01-NM4-NM', 'admin/products/S0Qg2n6vJEXKJAuG5WzV3uACTnhdEOFqP5yFYooG.webp', 100000, 250000, 0, 20, 20, 0, 1, '2022-05-19 11:16:06', '2022-05-19 11:16:06'),
(140, 23, 'ASMNVT-01-BS1-BS', 'admin/products/jEvyMjB7qE4HOOeXtHzpkIjKLYYy20pDkNFyTs3b.webp', 100000, 250000, 0, 15, 10, 1, 1, '2022-05-19 11:18:20', '2022-05-24 18:40:23'),
(141, 23, 'ASMNVT-01-BM2-BM', 'admin/products/3mMs18GJCMPGzXwN4G8UifEfdt4uoXv5HMWhS48b.webp', 100000, 250000, 0, 15, 15, 0, 1, '2022-05-19 11:18:21', '2022-05-19 11:18:21'),
(142, 23, 'ASMNVT-01-BX3-BX', 'admin/products/Q7VCykRoLsfM8vvDrBqQ1WSLVRfRgjpZ0UQaqcsi.webp', 100000, 250000, 0, 15, 15, 0, 1, '2022-05-19 11:18:21', '2022-05-19 11:18:21'),
(143, 23, 'ASMNVT-01-BS4-BS', 'admin/products/9I2dIwutnCuFC6hQqRUMnqAMAF5Pr1nqsHZX9Tpv.webp', 100000, 250000, 0, 15, 10, 0, 1, '2022-05-19 11:18:21', '2022-05-24 18:40:23'),
(144, 23, 'ASMNVT-01-BM5-BM', 'admin/products/5ZGFqkT244oghdx3xx5yxAgu8pqhOqBgbn4w0Wks.webp', 100000, 250000, 0, 15, 15, 0, 1, '2022-05-19 11:18:21', '2022-05-19 11:18:21'),
(145, 24, 'ATNCTUSA-01-YS1-YS', 'admin/products/zfbaZtwky6xj66cLmGqGEyjg2Gj9hx6SxSqr98Gs.webp', 100000, 250000, 0, 20, 16, 1, 1, '2022-05-19 11:22:58', '2022-05-24 18:40:23'),
(146, 24, 'ATNCTUSA-01-YM2-YM', 'admin/products/RBfJmW9eJplDZYpWsRv7XCR5LQgUcBvIpQ0uiZvP.webp', 100000, 250000, 0, 20, 20, 0, 1, '2022-05-19 11:22:58', '2022-05-19 11:22:58'),
(147, 24, 'ATNCTUSA-01-Y23-Y2', 'admin/products/8dCjqPbEOparpMbWMKW4QTbSPARDuctnKysRp2kj.webp', 100000, 250000, 0, 20, 20, 0, 1, '2022-05-19 11:22:58', '2022-05-19 11:22:58'),
(148, 24, 'ATNCTUSA-01-WS4-WS', 'admin/products/zlXCCOTH5tb1dDFOyFBUJeMa9eVyxsO7u8mo8Kcz.webp', 100000, 250000, 0, 20, 16, 0, 1, '2022-05-19 11:22:58', '2022-05-24 18:40:23'),
(149, 24, 'ATNCTUSA-01-WM5-WM', 'admin/products/Qn0bHJR6CTCniSN8RRfKu28g3b9lZJBLQvsCZwLX.webp', 100000, 250000, 0, 20, 20, 0, 1, '2022-05-19 11:22:58', '2022-05-19 11:22:58'),
(150, 24, 'ATNCTUSA-01-RS6-RS', 'admin/products/EZT9YATlZICYCJ6oDycgHHdu2vh1a3wZLN2V1d3F.webp', 100000, 250000, 0, 20, 17, 0, 1, '2022-05-19 11:22:58', '2022-05-24 18:40:23'),
(151, 24, 'ATNCTUSA-01-RM7-RM', 'admin/products/nj69QMPmI3K0cxPXyLayDvNCapGEAyAqBkCradSy.webp', 100000, 250000, 0, 20, 20, 0, 1, '2022-05-19 11:22:58', '2022-05-19 11:22:58'),
(152, 25, 'ATNCTCI-02-WS1-WS', 'admin/products/UsBHStLld8HkckFVcSui0Qgi62Qk5EuUD8kJf6uK.webp', 100000, 300000, 0, 10, 10, 1, 1, '2022-05-19 11:25:39', '2022-05-23 16:28:07'),
(153, 25, 'ATNCTCI-02-WM2-WM', 'admin/products/022ZwrqCeBdMlzBTjpFAYG8TxhP33fHHzJW5TUJN.webp', 100000, 300000, 0, 10, 10, 0, 1, '2022-05-19 11:25:39', '2022-05-19 11:25:39'),
(154, 25, 'ATNCTCI-02-WX3-WX', 'admin/products/1QN7Ngcm1YcEXr1TN1H9DFHhyI3BINRG0gE5UQCz.webp', 100000, 300000, 0, 10, 10, 0, 1, '2022-05-19 11:25:41', '2022-05-19 11:25:41'),
(155, 25, 'ATNCTCI-02-BS4-BS', 'admin/products/v5OMEMonXJ7oZsaqjIDgrzqZ54txsq4cCcLdhOMN.webp', 100000, 300000, 0, 10, 10, 0, 1, '2022-05-19 11:25:41', '2022-05-19 11:25:41'),
(156, 25, 'ATNCTCI-02-BM5-BM', 'admin/products/udIfzH2HGOzWJA4JriChrYVXHE3xVL2NE8SUAjSU.webp', 100000, 300000, 0, 10, 10, 0, 1, '2022-05-19 11:25:41', '2022-05-19 11:25:41'),
(157, 26, 'TSN-D01-P4611-P461', 'admin/products/ceqo5gwU90MTBWPvEsfxfvGql9g6UODRmoyZpKY2.jpg', 100000, 200000, 0, 20, 19, 1, 1, '2022-05-19 14:13:16', '2022-05-23 17:21:57'),
(158, 26, 'TSN-D01-B4612-B461', 'admin/products/B8nBDVgdtq3lpY0DCXC0IYI1XI2OsuMngNARXHs0.jpg', 100000, 200000, 0, 20, 19, 0, 1, '2022-05-19 14:13:18', '2022-05-24 18:40:23'),
(159, 26, 'TSN-D01-R4613-R461', 'admin/products/OxVMYcjKOsgUB8zcW3kigJdNDk5OsWwEvO216W2w.jpg', 100000, 200000, 0, 20, 19, 0, 1, '2022-05-19 14:13:18', '2022-05-24 18:40:23'),
(160, 27, 'TSN-D02-G6611-G661', 'admin/products/m4vm64X8uqgAAWNfAAg27UO2Jg7LGiBuM2tIbq2x.jpg', 80000, 170000, 0, 20, 20, 1, 1, '2022-05-19 14:16:01', '2022-05-23 16:28:07'),
(161, 27, 'TSN-D02-B6612-B661', 'admin/products/lK0GvV1sL411IEKZOmqYdqEpGpsNHcTTz17KCdIt.jpg', 80000, 170000, 0, 20, 19, 0, 1, '2022-05-19 14:16:01', '2022-05-24 18:40:23'),
(162, 27, 'TSN-D02-W6613-W661', 'admin/products/3JIDjmDZirbg9TWJnlHauiBXvDn9FW7sCg759MGq.jpg', 80000, 170000, 0, 20, 19, 0, 1, '2022-05-19 14:16:01', '2022-05-24 18:40:23'),
(163, 28, 'TSN-D03-B8811-B881', 'admin/products/rSGxLBTxRI1XnnNv3gINF3k3jsEPUU0SHWo7f0X6.jpg', 100000, 200000, 0, 30, 29, 1, 1, '2022-05-19 14:18:35', '2022-05-24 18:40:23'),
(164, 28, 'TSN-D03-B8812-B881', 'admin/products/ugq93AzD8ypcZDsQmKWxF7QeHJ1HDtHzzaaqcw38.jpg', 100000, 200000, 0, 30, 29, 0, 1, '2022-05-19 14:18:35', '2022-05-24 18:40:23'),
(165, 29, 'NNBK-01-G1-G', 'admin/products/fzPeke38peOUBqb8oICZWuansPCGTJs6ZGwJb5nK.webp', 1000000, 1500000, 1300000, 20, 19, 1, 1, '2022-05-19 14:25:11', '2022-05-24 18:40:23'),
(166, 29, 'NNBK-01-B2-B', 'admin/products/m95MAc27v0zqB2wjgoxLMtb1vc2aZaOUSiE8lwSs.webp', 1000000, 1500000, 1300000, 20, 18, 0, 1, '2022-05-19 14:25:13', '2022-05-24 18:40:23'),
(167, 30, 'NBCPL-01-W1-W', 'admin/products/XfisbG3eiRoWtuOFiP0sutQW80RPS76nRKABMNkL.webp', 500000, 800000, 700000, 20, 19, 1, 1, '2022-05-19 14:27:21', '2022-05-24 18:40:23'),
(168, 30, 'NBCPL-01-B2-B', 'admin/products/FkHyx5YOMxgH3BIdSfPwSHlSma1ObHZreSOY23cd.webp', 500000, 800000, 750000, 20, 19, 0, 1, '2022-05-19 14:27:21', '2022-05-24 18:40:23'),
(169, 30, 'NBCPL-01-N3-N', 'admin/products/COULHFwanI2BQ1XnWvppROym9m41ymIqZF0Zev68.jpg', 500000, 800000, 750000, 20, 19, 0, 1, '2022-05-19 14:27:21', '2022-05-24 18:40:23'),
(170, 31, 'NBCNN-01-B1-B', 'admin/products/OPfgR1UJi9Vh5AEhfJxe0O0FjaIVautm99vaidjK.webp', 500000, 1000000, 900000, 30, 30, 1, 1, '2022-05-19 14:29:51', '2022-05-23 16:28:07'),
(171, 31, 'NBCNN-01-N2-N', 'admin/products/RFL6tA4gxKOzxObB9R7X6NrRxmiLY6dzEjLP1saC.webp', 500000, 1000000, 900000, 30, 29, 0, 1, '2022-05-19 14:29:51', '2022-05-24 18:40:23'),
(172, 31, 'NBCNN-01-D3-D', 'admin/products/NYRGycERBzfwyp2OBYJkdotOSDJc4XPucvOxUZrj.webp', 500000, 1000000, 900000, 30, 30, 0, 1, '2022-05-19 14:29:51', '2022-05-19 14:29:51'),
(173, 31, 'NBCNN-01-P4-P', 'admin/products/X2N8hsL4xV1PGoGF8xeCffJgoNSJ3P0yYWjmZS6C.webp', 500000, 1000000, 950000, 30, 30, 0, 1, '2022-05-19 14:29:51', '2022-05-19 14:29:51'),
(174, 32, 'NBKTT-01-W1-W', 'admin/products/uvMZ2yW9x8agTRGqlzeoagDGvmTxwsn0cqgmCu0U.webp', 5000000, 10000000, 9000000, 40, 40, 1, 1, '2022-05-19 14:32:34', '2022-05-23 16:28:07'),
(175, 32, 'NBKTT-01-B2-B', 'admin/products/RVizWjJHVbAF0Gc1ZX6VfbRwPZiBvmh0wRFHZaS0.jpg', 5000000, 10000000, 9000000, 40, 40, 0, 1, '2022-05-19 14:32:34', '2022-05-19 14:32:34'),
(176, 33, 'NBKFOR-02-R1-R', 'admin/products/3mjxVqEeLdjKPNVHsgVhNqIO76fz4N0ajaavZMID.webp', 10000000, 18000000, 16000000, 5, 4, 1, 1, '2022-05-19 14:34:39', '2022-05-23 16:30:22'),
(177, 34, 'NBKFOR-03-W1-W', 'admin/products/dPHIko5It8hk2Gg8mru6WFuMxlUWZb81Hshn40Uy.webp', 15000000, 25000000, 21000000, 30, 25, 1, 1, '2022-05-01 14:37:37', '2022-05-24 06:35:22'),
(178, 34, 'NBKFOR-03-Y2-Y', 'admin/products/wBY9MVBy1u8sXWwXArBolVw5GG4OCETEoHorcI5t.webp', 15000000, 25000000, 22000000, 30, 28, 0, 1, '2022-05-01 14:37:37', '2022-05-24 18:40:23'),
(179, 34, 'NBKFOR-03-P3-P', 'admin/products/JyFszWly0Br6b2Utz4xYfFmDKyNjgPVbkMipCLbn.webp', 15000000, 25000000, 18000000, 30, 0, 0, 1, '2022-05-01 14:37:37', '2022-05-20 17:56:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products_photo`
--

CREATE TABLE `products_photo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products_photo`
--

INSERT INTO `products_photo` (`id`, `product_id`, `photo`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin/products_images/NqIhQ1PO7P36JCL2xePMJ4zNxUVOM7ykIfZrn69z.webp', '2022-05-19 08:09:54', '2022-05-19 08:09:54'),
(2, 1, 'admin/products_images/14YXkuthEmGhx87tVETTrDS5uXbrYUdkrbqqC36e.webp', '2022-05-19 08:09:54', '2022-05-19 08:09:54'),
(3, 1, 'admin/products_images/6asZeJRPbOUBLdFHhN1ifQzcHeentJvlhJuwPqCQ.webp', '2022-05-19 08:09:54', '2022-05-19 08:09:54'),
(4, 1, 'admin/products_images/oTVbZiaC5FkVS6eDE4WZ42TNftz07nxvSmEH5nDS.jpg', '2022-05-19 08:09:54', '2022-05-19 08:09:54'),
(5, 2, 'admin/products_images/stqaZzaV6xPZOV1ScP84amDgPyXUzyivHCYu1jjm.webp', '2022-05-19 09:05:26', '2022-05-19 09:05:26'),
(6, 2, 'admin/products_images/TvFTz9628JxWqY1HJlcEECi5odMA4KmsdB2dQvhv.webp', '2022-05-19 09:05:26', '2022-05-19 09:05:26'),
(7, 2, 'admin/products_images/p382DDNTFbIPx7Guw6rFGtIkSCgFtwj2woRGHgpY.jpg', '2022-05-19 09:05:26', '2022-05-19 09:05:26'),
(8, 3, 'admin/products_images/dpQwRQGf9Tgp8P3QtKrdQUEsWQJxlgkYJDdqpfdH.webp', '2022-05-19 09:11:04', '2022-05-19 09:11:04'),
(9, 3, 'admin/products_images/WztlHJVmG3nlGDxO0Cy7blluDsXnhZ9kZV1BOWOd.webp', '2022-05-19 09:11:04', '2022-05-19 09:11:04'),
(10, 3, 'admin/products_images/iPTnIpkPFHr92DxypOMPUXMXiBaleOAhPk1ylawH.webp', '2022-05-19 09:11:05', '2022-05-19 09:11:05'),
(11, 4, 'admin/products_images/8qXHqZmtBbDOZ81npyNuMOE7radTQU41L7nEMDsb.webp', '2022-05-19 09:15:39', '2022-05-19 09:15:39'),
(12, 4, 'admin/products_images/69FGnQCPXhxniONgA2URfD4lvuPPFJDZotL2btBk.webp', '2022-05-19 09:15:39', '2022-05-19 09:15:39'),
(13, 4, 'admin/products_images/z52Qjrc0ylg0tv002SOFl51HMbNXDU0Q3lAberOq.jpg', '2022-05-19 09:15:39', '2022-05-19 09:15:39'),
(14, 5, 'admin/products_images/AxqxxKHZmU7GlkV7m7pqxSchWSvatYE7zcC7LVX0.webp', '2022-05-19 09:18:35', '2022-05-19 09:18:35'),
(15, 5, 'admin/products_images/5Aet2h9cIb4EtrEBYgMpRFrk54JfGUB1wyn2Zp4m.webp', '2022-05-19 09:18:36', '2022-05-19 09:18:36'),
(16, 5, 'admin/products_images/wF7SvVFp5oQETo8hXunwuucC3yDl7PQLzLquyJSL.webp', '2022-05-19 09:18:36', '2022-05-19 09:18:36'),
(17, 7, 'admin/products_images/6Ogw24tY9dlUPhC6c6GYWF4gmCnCz3gz5qTu33YE.webp', '2022-05-19 09:23:32', '2022-05-19 09:23:32'),
(18, 8, 'admin/products_images/HBUOWckYYDbWpAwi45cBCTP1iaMqAqy8QP6LQ16S.webp', '2022-05-19 09:24:47', '2022-05-19 09:24:47'),
(19, 9, 'admin/products_images/RSIeBd3Xxs9iRfiunVQVji7CngAwAiFlFr6Euxta.webp', '2022-05-19 09:28:03', '2022-05-19 09:28:03'),
(20, 9, 'admin/products_images/zsPpSHzfWFSA0ad2xZX4vckC1C9IlmmexuxmFGJd.webp', '2022-05-19 09:28:03', '2022-05-19 09:28:03'),
(21, 10, 'admin/products_images/7vadGClNdwFgrklKjyJ63h3h5Nt03mfgsf3y7Ut6.webp', '2022-05-19 09:30:23', '2022-05-19 09:30:23'),
(22, 10, 'admin/products_images/LQPJ1T4q5ctDevMXbrzkYVdPLf94fj5eHIcwwTsH.webp', '2022-05-19 09:30:24', '2022-05-19 09:30:24'),
(23, 11, 'admin/products_images/a5uSQQz6Z0nzVjNuE0yhioC4kKC9Nbmh8iJJEYvq.webp', '2022-05-19 09:34:56', '2022-05-19 09:34:56'),
(24, 11, 'admin/products_images/fDv2J0vBiYrYiGTsK7yq9bSSsN8sKZ232AnGsx87.jpg', '2022-05-19 09:34:58', '2022-05-19 09:34:58'),
(25, 11, 'admin/products_images/8FiyUgACRVr38bwoVXSWq2qoJc19NWah1jF6ccfb.jpg', '2022-05-19 09:34:58', '2022-05-19 09:34:58'),
(26, 12, 'admin/products_images/eCAoOSni8MbkAzXe8ETH0Hhlt7Ve11IrPqEt6oJU.webp', '2022-05-19 09:54:22', '2022-05-19 09:54:22'),
(27, 12, 'admin/products_images/Av7CDVqVJQf0ELRwNrhiAvamUUBkEIRH4vKU3yDx.jpg', '2022-05-19 09:54:22', '2022-05-19 09:54:22'),
(28, 12, 'admin/products_images/8b7MW1zOnhe360CfWUbCzStAuzAve2QtJwD7jjR4.webp', '2022-05-19 09:54:22', '2022-05-19 09:54:22'),
(29, 13, 'admin/products_images/dCHv7kbvFJauj12X3ns4XYW3RhwKAKQvGbDz5FAU.webp', '2022-05-19 10:43:36', '2022-05-19 10:43:36'),
(30, 13, 'admin/products_images/ILmzUCnj91sltIoDY3TLwZmKv5B10TuXa97fA37m.webp', '2022-05-19 10:43:36', '2022-05-19 10:43:36'),
(31, 13, 'admin/products_images/5LmpLgGkGvipiY8q421ACWaE8hEwa7JOAijTOtu7.webp', '2022-05-19 10:43:37', '2022-05-19 10:43:37'),
(32, 14, 'admin/products_images/DnGLZ5FDy3gLzWHC8MilAHkyjHT2FnlGJQKdE4Sa.webp', '2022-05-19 10:46:53', '2022-05-19 10:46:53'),
(33, 14, 'admin/products_images/sPJyNGK7pCmjWkCbr4l6EefbNmK5PCQZfQNmdzuN.webp', '2022-05-19 10:46:54', '2022-05-19 10:46:54'),
(34, 14, 'admin/products_images/yiLDEZt893gHibZyRTw6r0zUsUtXsZ1n8HtoSYcC.webp', '2022-05-19 10:46:54', '2022-05-19 10:46:54'),
(35, 15, 'admin/products_images/UWB21wpMt8Zs4OHFjJs0vmrIJIsEeboiy5qJHo3V.webp', '2022-05-19 10:49:23', '2022-05-19 10:49:23'),
(36, 16, 'admin/products_images/Dp0PbXNlDrejZhPlK2xKBx0FGLLPntJpkRMbvYTz.webp', '2022-05-19 10:55:40', '2022-05-19 10:55:40'),
(37, 16, 'admin/products_images/bGfEwOaS7pyQEzqr2wnqEoKO4BNakM8LBwlrOCWU.webp', '2022-05-19 10:55:40', '2022-05-19 10:55:40'),
(38, 16, 'admin/products_images/c7bw9b5ArIgG08oRoWtgQEePqbEPZVAK3ndx5a8d.webp', '2022-05-19 10:55:42', '2022-05-19 10:55:42'),
(39, 17, 'admin/products_images/qLFWfj7gZcA4YX6jYXGJa3pb1RhzUa4KXJpX7YkR.jpg', '2022-05-19 11:01:30', '2022-05-19 11:01:30'),
(40, 17, 'admin/products_images/QHviOUvUZoKC6OZQY7GosG31nlcYw7ynmxC0lZbb.jpg', '2022-05-19 11:01:30', '2022-05-19 11:01:30'),
(41, 17, 'admin/products_images/zZ1qbmOhQmsMmuTl7DzM0JqK6NO4FCLEmXX5jBgz.webp', '2022-05-19 11:01:30', '2022-05-19 11:01:30'),
(42, 19, 'admin/products_images/dQX6cldrV9bEnNWOpDOYwJFzHBnUvpkRMDV2UsAp.webp', '2022-05-19 11:07:06', '2022-05-19 11:07:06'),
(43, 19, 'admin/products_images/p3O2mZiVAINgQbzLCqjfsmNeNe6429pBEcs5Ww5q.webp', '2022-05-19 11:07:08', '2022-05-19 11:07:08'),
(44, 19, 'admin/products_images/sBzZL4cp0mo9EvPPKFU0LEN9iQjbwgv5ZuIzC0a4.webp', '2022-05-19 11:07:08', '2022-05-19 11:07:08'),
(45, 24, 'admin/products_images/ABRnuJxaOGAKEWM0KA4rTTrwOjRJ7bUvoW7zrruW.webp', '2022-05-19 11:22:58', '2022-05-19 11:22:58'),
(46, 24, 'admin/products_images/fkE2hRoI0p2bpFs013HVQy99L5PO1uaD3DKHGk8n.webp', '2022-05-19 11:22:58', '2022-05-19 11:22:58'),
(47, 24, 'admin/products_images/5OAoHQSDlxfYVvegV1ffUJS0siPwIwnf8T569VkM.webp', '2022-05-19 11:22:58', '2022-05-19 11:22:58'),
(48, 32, 'admin/products_images/59I6Z9BRWGpyX3U7RFmNOHSypoXbLRhMXLsq2ON6.webp', '2022-05-19 14:32:34', '2022-05-19 14:32:34'),
(49, 34, 'admin/products_images/ppMgpaG2xwk8hEN217fyeYrZfLzvgE9oT5d4GCHY.webp', '2022-05-19 14:37:37', '2022-05-19 14:37:37'),
(50, 34, 'admin/products_images/zgpL4hWJxwx2485RRnTsHG2MwwrgGClIf7FIlghr.webp', '2022-05-19 14:37:37', '2022-05-19 14:37:37'),
(51, 34, 'admin/products_images/SpaUumVw40okXqy5dzs4GyZlLnWQ8ez6sLrpyEUm.jpg', '2022-05-20 18:03:14', '2022-05-20 18:03:14'),
(52, 34, 'admin/products_images/KfAtXg6ysXo2CqxPemyG3BRqdN7Xp8Oha9C5fbW6.jpg', '2022-05-20 18:03:14', '2022-05-20 18:03:14'),
(53, 34, 'admin/products_images/OVkBUg0kft3TsFESUEHcMqlhiqyHZFxlrCfKHCXN.jpg', '2022-05-20 18:03:14', '2022-05-20 18:03:14'),
(54, 34, 'admin/products_images/g2AKlJrUTTT1VQ21DKmDNOYl7EM51LgpwPiAhSCc.jpg', '2022-05-20 18:03:14', '2022-05-20 18:03:14'),
(55, 34, 'admin/products_images/fVOSfV0z0Ps4IrHpD0D6NROkXzNeCaV9qX4Vpvg2.jpg', '2022-05-20 18:03:14', '2022-05-20 18:03:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `product_id`, `attribute_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-05-19 08:09:54', '2022-05-19 08:09:54'),
(2, 1, 2, '2022-05-19 08:09:54', '2022-05-19 08:09:54'),
(3, 2, 1, '2022-05-19 09:05:26', '2022-05-19 09:05:26'),
(4, 2, 2, '2022-05-19 09:05:26', '2022-05-19 09:05:26'),
(5, 3, 1, '2022-05-19 09:11:04', '2022-05-19 09:11:04'),
(6, 3, 2, '2022-05-19 09:11:04', '2022-05-19 09:11:04'),
(7, 4, 1, '2022-05-19 09:15:39', '2022-05-19 09:15:39'),
(8, 4, 2, '2022-05-19 09:15:39', '2022-05-19 09:15:39'),
(9, 5, 1, '2022-05-19 09:18:35', '2022-05-19 09:18:35'),
(10, 5, 2, '2022-05-19 09:18:35', '2022-05-19 09:18:35'),
(11, 6, 1, '2022-05-19 09:21:53', '2022-05-19 09:21:53'),
(12, 6, 2, '2022-05-19 09:21:53', '2022-05-19 09:21:53'),
(13, 7, 1, '2022-05-19 09:23:31', '2022-05-19 09:23:31'),
(14, 7, 2, '2022-05-19 09:23:31', '2022-05-19 09:23:31'),
(15, 8, 1, '2022-05-19 09:24:47', '2022-05-19 09:24:47'),
(16, 8, 2, '2022-05-19 09:24:47', '2022-05-19 09:24:47'),
(17, 9, 1, '2022-05-19 09:28:01', '2022-05-19 09:28:01'),
(18, 9, 2, '2022-05-19 09:28:01', '2022-05-19 09:28:01'),
(19, 10, 1, '2022-05-19 09:30:23', '2022-05-19 09:30:23'),
(20, 10, 2, '2022-05-19 09:30:23', '2022-05-19 09:30:23'),
(21, 11, 1, '2022-05-19 09:34:56', '2022-05-19 09:34:56'),
(22, 11, 2, '2022-05-19 09:34:56', '2022-05-19 09:34:56'),
(23, 12, 1, '2022-05-19 09:54:22', '2022-05-19 09:54:22'),
(24, 12, 2, '2022-05-19 09:54:22', '2022-05-19 09:54:22'),
(25, 13, 1, '2022-05-19 10:43:36', '2022-05-19 10:43:36'),
(26, 13, 2, '2022-05-19 10:43:36', '2022-05-19 10:43:36'),
(27, 14, 1, '2022-05-19 10:46:53', '2022-05-19 10:46:53'),
(28, 14, 2, '2022-05-19 10:46:53', '2022-05-19 10:46:53'),
(29, 15, 1, '2022-05-19 10:49:22', '2022-05-19 10:49:22'),
(30, 15, 2, '2022-05-19 10:49:23', '2022-05-19 10:49:23'),
(31, 16, 1, '2022-05-19 10:55:40', '2022-05-19 10:55:40'),
(32, 16, 2, '2022-05-19 10:55:40', '2022-05-19 10:55:40'),
(33, 17, 1, '2022-05-19 11:01:30', '2022-05-19 11:01:30'),
(34, 17, 2, '2022-05-19 11:01:30', '2022-05-19 11:01:30'),
(35, 18, 1, '2022-05-19 11:03:48', '2022-05-19 11:03:48'),
(36, 18, 2, '2022-05-19 11:03:48', '2022-05-19 11:03:48'),
(37, 19, 1, '2022-05-19 11:07:06', '2022-05-19 11:07:06'),
(38, 19, 2, '2022-05-19 11:07:06', '2022-05-19 11:07:06'),
(39, 20, 1, '2022-05-19 11:09:35', '2022-05-19 11:09:35'),
(40, 20, 2, '2022-05-19 11:09:35', '2022-05-19 11:09:35'),
(41, 21, 1, '2022-05-19 11:12:22', '2022-05-19 11:12:22'),
(42, 21, 2, '2022-05-19 11:12:22', '2022-05-19 11:12:22'),
(43, 22, 1, '2022-05-19 11:16:04', '2022-05-19 11:16:04'),
(44, 22, 2, '2022-05-19 11:16:04', '2022-05-19 11:16:04'),
(45, 23, 1, '2022-05-19 11:18:20', '2022-05-19 11:18:20'),
(46, 23, 2, '2022-05-19 11:18:20', '2022-05-19 11:18:20'),
(47, 24, 1, '2022-05-19 11:22:58', '2022-05-19 11:22:58'),
(48, 24, 2, '2022-05-19 11:22:58', '2022-05-19 11:22:58'),
(49, 25, 1, '2022-05-19 11:25:39', '2022-05-19 11:25:39'),
(50, 25, 2, '2022-05-19 11:25:39', '2022-05-19 11:25:39'),
(51, 26, 1, '2022-05-19 14:13:16', '2022-05-19 14:13:16'),
(52, 26, 3, '2022-05-19 14:13:16', '2022-05-19 14:13:16'),
(53, 26, 4, '2022-05-19 14:13:16', '2022-05-19 14:13:16'),
(54, 26, 5, '2022-05-19 14:13:16', '2022-05-19 14:13:16'),
(55, 27, 1, '2022-05-19 14:16:01', '2022-05-19 14:16:01'),
(56, 27, 3, '2022-05-19 14:16:01', '2022-05-19 14:16:01'),
(57, 27, 4, '2022-05-19 14:16:01', '2022-05-19 14:16:01'),
(58, 27, 5, '2022-05-19 14:16:01', '2022-05-19 14:16:01'),
(59, 28, 1, '2022-05-19 14:18:35', '2022-05-19 14:18:35'),
(60, 28, 3, '2022-05-19 14:18:35', '2022-05-19 14:18:35'),
(61, 28, 4, '2022-05-19 14:18:35', '2022-05-19 14:18:35'),
(62, 28, 5, '2022-05-19 14:18:35', '2022-05-19 14:18:35'),
(63, 29, 1, '2022-05-19 14:25:11', '2022-05-19 14:25:11'),
(64, 30, 1, '2022-05-19 14:27:21', '2022-05-19 14:27:21'),
(65, 31, 1, '2022-05-19 14:29:49', '2022-05-19 14:29:49'),
(66, 32, 1, '2022-05-19 14:32:34', '2022-05-19 14:32:34'),
(67, 33, 1, '2022-05-19 14:34:39', '2022-05-19 14:34:39'),
(68, 34, 1, '2022-05-19 14:37:35', '2022-05-19 14:37:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_cate`
--

CREATE TABLE `product_cate` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cate_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_cate`
--

INSERT INTO `product_cate` (`id`, `cate_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 10, 1, '2022-05-19 08:09:54', '2022-05-19 08:09:54'),
(2, 10, 2, '2022-05-19 09:05:26', '2022-05-19 09:05:26'),
(3, 10, 3, '2022-05-19 09:11:04', '2022-05-19 09:11:04'),
(4, 9, 4, '2022-05-19 09:15:39', '2022-05-19 09:15:39'),
(5, 9, 5, '2022-05-19 09:18:35', '2022-05-19 09:18:35'),
(6, 11, 6, '2022-05-19 09:21:53', '2022-05-19 09:21:53'),
(7, 11, 7, '2022-05-19 09:23:31', '2022-05-19 09:23:31'),
(8, 11, 8, '2022-05-19 09:24:47', '2022-05-19 09:24:47'),
(9, 12, 9, '2022-05-19 09:28:01', '2022-05-19 09:28:01'),
(10, 12, 10, '2022-05-19 09:30:23', '2022-05-19 09:30:23'),
(11, 7, 11, '2022-05-19 09:34:56', '2022-05-19 09:34:56'),
(12, 7, 12, '2022-05-19 09:54:22', '2022-05-19 09:54:22'),
(13, 7, 13, '2022-05-19 10:43:36', '2022-05-19 10:43:36'),
(14, 5, 14, '2022-05-19 10:46:53', '2022-05-19 10:46:53'),
(15, 5, 15, '2022-05-19 10:49:22', '2022-05-19 10:49:22'),
(16, 5, 16, '2022-05-19 10:55:40', '2022-05-19 10:55:40'),
(17, 16, 17, '2022-05-19 11:01:30', '2022-05-19 11:01:30'),
(18, 16, 18, '2022-05-19 11:03:48', '2022-05-19 11:03:48'),
(19, 16, 19, '2022-05-19 11:07:06', '2022-05-19 11:07:06'),
(20, 15, 20, '2022-05-19 11:09:35', '2022-05-19 11:09:35'),
(21, 15, 21, '2022-05-19 11:12:22', '2022-05-19 11:12:22'),
(22, 14, 22, '2022-05-19 11:16:04', '2022-05-19 11:16:04'),
(23, 14, 23, '2022-05-19 11:18:20', '2022-05-19 11:18:20'),
(24, 13, 24, '2022-05-19 11:22:58', '2022-05-19 11:22:58'),
(25, 13, 25, '2022-05-19 11:25:39', '2022-05-19 11:25:39'),
(26, 18, 26, '2022-05-19 14:13:16', '2022-05-19 14:13:16'),
(27, 18, 27, '2022-05-19 14:16:01', '2022-05-19 14:16:01'),
(28, 18, 28, '2022-05-19 14:18:35', '2022-05-19 14:18:35'),
(29, 22, 29, '2022-05-19 14:25:11', '2022-05-19 14:25:11'),
(30, 21, 30, '2022-05-19 14:27:21', '2022-05-19 14:27:21'),
(31, 22, 30, '2022-05-19 14:27:21', '2022-05-19 14:27:21'),
(32, 21, 31, '2022-05-19 14:29:49', '2022-05-19 14:29:49'),
(33, 22, 31, '2022-05-19 14:29:49', '2022-05-19 14:29:49'),
(34, 21, 32, '2022-05-19 14:32:34', '2022-05-19 14:32:34'),
(35, 22, 32, '2022-05-19 14:32:34', '2022-05-19 14:32:34'),
(36, 22, 33, '2022-05-19 14:34:39', '2022-05-19 14:34:39'),
(37, 22, 34, '2022-05-19 14:37:35', '2022-05-19 14:37:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'favicon_icon', 'admin/settings/RIYSheigRiDJbKQLMPMlxGcfYuwwoF2ueFt8F0RJ.jpg', '0000-00-00 00:00:00', '2022-05-24 10:05:03'),
(2, 'logo', 'admin/settings/JZCGHEpN2JdkhsbBYutgP4V1KOS2udBfbNMyuDI9.png', '0000-00-00 00:00:00', '2022-05-24 10:05:03'),
(3, 'shop_name', 'TOTORO SHOP', '0000-00-00 00:00:00', '2022-05-24 11:35:42'),
(5, 'logo_footer', 'admin/settings/orEYdGJfseBsvjxm875r6GhQmoEdBiNbPuR1UVhI.png', '0000-00-00 00:00:00', '2022-05-24 10:05:03'),
(6, 'name_company', 'Shop ToToRo', '0000-00-00 00:00:00', '2022-05-24 09:14:16'),
(7, 'hotline', '0908.18.12.11', '0000-00-00 00:00:00', '2022-05-24 09:14:16'),
(8, 'email', 'totoro.online@totoday.vn', '0000-00-00 00:00:00', '2022-05-24 09:14:16'),
(9, 'address', 'Địa chỉ: 304 - 306 Nguyễn Trãi, Ha Noi', '0000-00-00 00:00:00', '2022-05-24 09:14:16'),
(10, 'phone', '0938.803.611', '0000-00-00 00:00:00', '2022-05-24 09:14:16'),
(11, 'footer', 'Copyright © 20222020 All rights reserved | This template is made with  by Colorlib', '0000-00-00 00:00:00', '2022-05-24 09:14:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 3,
  `status` int(11) NOT NULL DEFAULT 1,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `user_name`, `email`, `email_verified_at`, `password`, `photo`, `role`, `status`, `phone`, `ip`, `country`, `address`, `address2`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Losis', 'losis_1', 'clonebabi0@gmail.com', '2022-05-19 06:39:40', '$2y$10$9utiaXL02zBL6IPRaowK.u61p70DutlQMGSfoed4/kW.frIar8OXm', 'admin/users/QhlSVuxnTlAunqUaxThrkk16Ok74cd9VTBDLDJl1.jpg', 0, 1, NULL, NULL, NULL, NULL, NULL, '1WcIGYf16lTqetIf5rjy9QHlc8krTpjcSUVN2sWvi1yC4bb32lEWRHSZItbD', '2022-05-19 06:39:40', '2022-05-19 06:44:42'),
(2, 'Pedro Altenwerth', 'admin_01', 'admin_01@gmail.com', '2022-05-19 06:39:40', '$2y$10$E0x3zPPoq8UcNYitvyNSK.lLuGHSmzvPhPbyiXQjZq2FpF.UBu//e', 'admin/users/saa4ZnbXb8o0lT4GvpCPAEk03UaSH0HF67MoehyP.jpg', 1, 1, NULL, NULL, NULL, NULL, NULL, 'bE6cO4mwyR', '2022-05-19 06:39:40', '2022-05-19 06:43:00'),
(3, 'Dr. Elissa Gleason I', 'admin2', 'tienmanh02@gmail.com', '2022-05-19 06:39:40', '$2y$10$Jj9MivlguIBaetGzYRPBleH88gjeRiAefkLzJQtSUQnd6bYuyvYyO', 'admin/users/lMiKVuALBggQpyznwb44diRXywgkFMRKP3rSRmxE.jpg', 1, 1, NULL, NULL, NULL, NULL, NULL, 'eXMjy4xYlf', '2022-05-19 06:39:40', '2022-05-19 06:43:50'),
(4, 'Teagan Roberts', 'modedit_1', 'jonas91@example.net', '2022-05-19 06:39:40', '$2y$10$mkC/8UUNO5i/pGN2gKE5PeBRzRney844jkLypq4/O7RUX7g2.T2B6', 'admin/users/ao0hl3lz7CQMkKybP5Yy4gcPIt98SHE7vA6FXBnZ.jpg', 2, 1, NULL, NULL, NULL, NULL, NULL, 'R7GzSPXFok', '2022-05-19 06:39:40', '2022-05-19 06:44:16'),
(5, 'Tristian Douglas', 'Salvatore Johnston MD', 'pacocha.yoshiko@example.com', '2022-05-19 06:39:40', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, 'OXdg4niDoh', '2022-05-19 06:39:40', '2022-05-19 06:39:40'),
(6, 'Hannah Schaden', 'Stella Sawayn', 'stone83@example.com', '2022-05-19 06:39:40', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, 'IipLAXA2sD', '2022-05-19 06:39:40', '2022-05-19 06:39:40'),
(7, 'Mr. Taurean Skiles', 'Prof. Berry Kilback PhD', 'uschultz@example.org', '2022-05-19 06:39:40', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, 'lJm4tdTYP7', '2022-05-19 06:39:40', '2022-05-19 06:39:40'),
(8, 'Zoey Oberbrunner DVM', 'Mafalda Spinka IV', 'louvenia86@example.org', '2022-05-19 06:39:40', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin/users/71TsT8FRXjgorUMUKjAeFkirFIv20sfkKVea6juY.png', 3, 1, NULL, NULL, NULL, NULL, NULL, '4CtXkum3fR', '2022-05-19 06:39:40', '2022-05-19 06:45:15'),
(9, 'Isabelle Emard MD', 'Eusebio Fritsch', 'welch.jailyn@example.net', '2022-05-19 06:39:40', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin/users/QHydn7fVzbaCfSpKf0bwDfFjycwzZcL7Cy11nDyb.png', 3, 1, NULL, NULL, NULL, NULL, NULL, 'AXCOdopgwd', '2022-05-19 06:39:40', '2022-05-19 06:44:59'),
(10, 'Myrna Ziemann', 'testlogin1', 'elfrieda.bechtelar@example.net', '2022-05-19 06:39:40', '$2y$10$pY6s8RekZm/lW/Dzihaaou5sGQm7A6/R7p5yEpwM7bctVShQBm50S', 'admin/users/h5DTiZbkXtgtvxMCdFopIcHUcdP5oNrqkKfBB19B.png', 3, 1, NULL, NULL, NULL, NULL, NULL, 'bxzZEZpZUpTBC1xZwF9kjhQFmHNUSYG47ej1tTv5mhpgh6iUzTkx7vRHpFIs', '2022-05-19 06:39:40', '2022-05-22 09:29:50'),
(11, 'trang nguyen', 'nguyentrang98', 'tienmanh021995@gmail.com', NULL, '$2y$10$DQYaLlrcT.pZlAzDYBbzqOmS1JuljhP0yaUx0PZGhFDG2A3FVOLai', 'admin/users/pPXi57sdaYwHUnZ0ZCRayY98g0f3HsAltYWa6Hsv.jpg', 3, 1, '0356894533', NULL, 'Viet nam', 'ha noi 1', 'ha noi 123', NULL, '2022-05-22 14:45:08', '2022-05-24 03:02:14'),
(12, 'sen cho', 'sen123', 'sen@gmail.com', NULL, '123456', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-22 14:48:45', '2022-05-22 14:48:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_ships`
--

CREATE TABLE `user_ships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_ships`
--

INSERT INTO `user_ships` (`id`, `user_id`, `address`, `is_default`, `created_at`, `updated_at`) VALUES
(21, 11, 'hoang mai ha noi  233', 0, '2022-05-23 03:54:39', '2022-05-23 03:54:39'),
(22, 11, 'hang mai ha noi 2556', 1, '2022-05-23 03:54:55', '2022-05-23 20:02:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(14, 11, 174, '2022-05-25 15:55:26', '2022-05-25 15:55:26'),
(15, 11, 52, '2022-05-25 15:57:07', '2022-05-25 15:57:07'),
(19, 1, 177, '2022-05-25 16:21:33', '2022-05-25 16:21:33'),
(20, 11, 65, '2022-05-25 16:24:44', '2022-05-25 16:24:44'),
(21, 11, 78, '2022-05-25 16:25:38', '2022-05-25 16:25:38'),
(22, 11, 99, '2022-05-25 16:27:02', '2022-05-25 16:27:02'),
(27, 11, 164, '2022-05-25 16:46:01', '2022-05-25 16:46:01'),
(35, 11, 177, '2022-05-25 19:25:41', '2022-05-25 19:25:41'),
(36, 11, 176, '2022-05-25 19:25:50', '2022-05-25 19:25:50'),
(37, 11, 178, '2022-05-26 02:56:20', '2022-05-26 02:56:20'),
(38, 11, 171, '2022-05-26 02:57:49', '2022-05-26 02:57:49');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cates`
--
ALTER TABLE `cates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cates_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `item_coupons`
--
ALTER TABLE `item_coupons`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_title_unique` (`title`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `post_cate`
--
ALTER TABLE `post_cate`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `prdetail_attvalue`
--
ALTER TABLE `prdetail_attvalue`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_title_unique` (`title`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD UNIQUE KEY `products_sku_unique` (`sku`);

--
-- Chỉ mục cho bảng `products_detail`
--
ALTER TABLE `products_detail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_detail_sku_unique` (`sku`);

--
-- Chỉ mục cho bảng `products_photo`
--
ALTER TABLE `products_photo`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_cate`
--
ALTER TABLE `product_cate`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_user_name_unique` (`user_name`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `user_ships`
--
ALTER TABLE `user_ships`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `attribute_values`
--
ALTER TABLE `attribute_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `cates`
--
ALTER TABLE `cates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `item_coupons`
--
ALTER TABLE `item_coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `post_cate`
--
ALTER TABLE `post_cate`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `prdetail_attvalue`
--
ALTER TABLE `prdetail_attvalue`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=370;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `products_detail`
--
ALTER TABLE `products_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT cho bảng `products_photo`
--
ALTER TABLE `products_photo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT cho bảng `product_cate`
--
ALTER TABLE `product_cate`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `user_ships`
--
ALTER TABLE `user_ships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
