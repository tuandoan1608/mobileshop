-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 06, 2021 lúc 10:51 AM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mobile`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `lever` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attribute`
--

CREATE TABLE `attribute` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `attribute`
--

INSERT INTO `attribute` (`id`, `name`, `created_at`, `updated_at`) VALUES
(5, 'color', '2021-03-25 13:05:05', '2021-03-25 13:05:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attribute_value`
--

CREATE TABLE `attribute_value` (
  `id` int(10) UNSIGNED NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `color` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `attribute_value`
--

INSERT INTO `attribute_value` (`id`, `attribute_id`, `name`, `color`, `created_at`, `updated_at`) VALUES
(3, 5, 'vàng', '#fffa5c', '2021-03-25 13:05:05', '2021-03-25 13:05:05'),
(4, 5, 'đỏ', '#ff0000', '2021-03-25 13:05:05', '2021-03-25 13:05:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(21, 'diện thoại', 'dien-thoai', 1, '2021-04-02 13:17:32', '2021-04-02 13:17:32'),
(23, 'phụ kiện', 'phu-kien', 1, '2021-04-02 13:23:42', '2021-04-02 13:23:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `custommer`
--

CREATE TABLE `custommer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `option_type`
--

CREATE TABLE `option_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `custommerID` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `optionID` int(11) NOT NULL,
  `amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(500) NOT NULL,
  `note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `orderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission`
--

CREATE TABLE `permission` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `displayname` varchar(100) NOT NULL,
  `parentID` int(11) NOT NULL,
  `key_permission` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `permission`
--

INSERT INTO `permission` (`id`, `name`, `displayname`, `parentID`, `key_permission`, `created_at`, `update_at`) VALUES
(6, 'Module sản phẩm', 'Module sản phẩm', 0, NULL, NULL, NULL),
(7, 'Xem', 'Xem', 6, 'list_product', NULL, NULL),
(8, 'Thêm', 'Thêm', 6, 'add_product', NULL, NULL),
(9, 'Sửa', 'Sửa', 6, 'edit_product', NULL, NULL),
(10, 'Xóa', 'Xóa', 6, 'delete_product', NULL, NULL),
(11, 'Module danh mục sản phẩm', 'Module danh mục sản phẩm', 0, NULL, NULL, NULL),
(12, 'Xem', 'Xem', 11, 'list_category', NULL, NULL),
(13, 'Thêm', 'Thêm', 11, 'add_category', NULL, NULL),
(14, 'Sửa', 'Sửa', 11, 'add_category', NULL, NULL),
(15, 'Xóa', 'Xóa', 11, 'delete_category', NULL, NULL),
(16, 'slide', 'slide', 0, NULL, NULL, NULL),
(17, 'Xem', 'Xem', 16, 'list_slide', NULL, NULL),
(18, 'Thêm', 'Thêm', 16, 'add_slide', NULL, NULL),
(19, 'Sửa', 'Sửa', 16, 'edit_slide', NULL, NULL),
(20, 'Xóa', 'Xóa', 16, 'delete_slide', NULL, NULL),
(21, 'sản phẩm', 'sản phẩm', 0, NULL, NULL, NULL),
(22, 'Xem', 'Xem', 21, 'list_product', NULL, NULL),
(23, 'Thêm', 'Thêm', 21, 'add_product', NULL, NULL),
(24, 'Sửa', 'Sửa', 21, 'edit_product', NULL, NULL),
(25, 'Xóa', 'Xóa', 21, 'delete_product', NULL, NULL),
(26, 'accout', 'accout', 0, NULL, NULL, NULL),
(27, 'Xem', 'Xem', 26, 'list_accout', NULL, NULL),
(28, 'Thêm', 'Thêm', 26, 'add_accout', NULL, NULL),
(29, 'Sửa', 'Sửa', 26, 'edit_accout', NULL, NULL),
(30, 'Xóa', 'Xóa', 26, 'delete_accout', NULL, NULL),
(31, 'setting', 'setting', 0, NULL, NULL, NULL),
(32, 'Xem', 'Xem', 31, 'list_setting', NULL, NULL),
(33, 'Thêm', 'Thêm', 31, 'add_setting', NULL, NULL),
(34, 'Sửa', 'Sửa', 31, 'edit_setting', NULL, NULL),
(35, 'Xóa', 'Xóa', 31, 'delete_setting', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `permission_role`
--

INSERT INTO `permission_role` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(6, 5, 7, NULL, NULL),
(7, 5, 8, NULL, NULL),
(8, 5, 9, NULL, NULL),
(9, 5, 10, NULL, NULL),
(10, 5, 12, NULL, NULL),
(11, 5, 13, NULL, NULL),
(12, 5, 14, NULL, NULL),
(13, 5, 15, NULL, NULL),
(14, 6, 7, NULL, NULL),
(15, 6, 8, NULL, NULL),
(16, 6, 9, NULL, NULL),
(17, 6, 10, NULL, NULL),
(18, 6, 12, NULL, NULL),
(19, 5, 22, NULL, NULL),
(20, 5, 23, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(500) NOT NULL,
  `slug` varchar(500) NOT NULL,
  `image` varchar(250) NOT NULL,
  `category_id` int(11) NOT NULL,
  `producttype_id` int(11) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `price` double(20,2) NOT NULL,
  `discount` double NOT NULL,
  `buyCount` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `image`, `category_id`, `producttype_id`, `content`, `price`, `discount`, `buyCount`, `created_at`, `updated_at`, `status`) VALUES
(21, 'iphone 12', 'iphone-12', 'public/productimg/6/RJS9PNiKVI.png', 21, 1, '<p>3535</p>', 45.00, 35, NULL, '2021-04-05 13:32:20', '2021-04-05 13:32:20', NULL),
(22, 'xiasd', 'xiasd', 'public/productimg/6/rc8dJaPnYi.jpg', 21, 1, '<p>345</p>', 45.00, 345, NULL, '2021-04-05 15:33:45', '2021-04-05 15:33:45', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `producttype`
--

CREATE TABLE `producttype` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL,
  `categori_id` int(11) DEFAULT NULL,
  `slug` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `producttype`
--

INSERT INTO `producttype` (`id`, `name`, `categori_id`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'iphone', 21, 'iphone', 1, '2021-04-02 12:04:50', '2021-04-02 12:04:50'),
(9, 'tai nghe', 23, 'tai-nghe', 1, '2021-04-02 13:23:58', '2021-04-02 13:23:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_attribute`
--

CREATE TABLE `product_attribute` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `attributevalue_id` int(11) NOT NULL,
  `import_price` double(11,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `export_price` double(10,2) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `quantity_sell` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product_attribute`
--

INSERT INTO `product_attribute` (`id`, `product_id`, `attributevalue_id`, `import_price`, `created_at`, `updated_at`, `export_price`, `quantity`, `quantity_sell`) VALUES
(5, 21, 3, 456, '2021-04-05 13:32:20', '2021-04-05 13:32:20', 46.00, 456, NULL),
(6, 21, 4, 456, '2021-04-05 13:32:20', '2021-04-05 13:32:20', 456.00, 456, NULL),
(7, 22, 3, 345, '2021-04-05 15:33:45', '2021-04-05 15:33:45', 345.00, 345, NULL),
(8, 22, 4, 345, '2021-04-05 15:33:45', '2021-04-05 15:33:45', 53.00, 5345, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) UNSIGNED NOT NULL,
  `productattribute_id` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product_image`
--

INSERT INTO `product_image` (`id`, `productattribute_id`, `image`, `created_at`, `updated_at`) VALUES
(5, 5, 'public/productimageattribute/6/tgk4FwR9g6.jpg', '2021-04-05 13:32:20', '2021-04-05 13:32:20'),
(6, 5, 'public/productimageattribute/6/J9bYGtwSNx.png', '2021-04-05 13:32:20', '2021-04-05 13:32:20'),
(7, 6, 'public/productimageattribute/6/ocZVKxflmU.jpg', '2021-04-05 13:32:20', '2021-04-05 13:32:20'),
(8, 6, 'public/productimageattribute/6/zmNeF7y4RB.jpg', '2021-04-05 13:32:20', '2021-04-05 13:32:20'),
(9, 7, 'public/productimageattribute/6/Zk5gyzCw8X.jpg', '2021-04-05 15:33:45', '2021-04-05 15:33:45'),
(10, 8, 'public/productimageattribute/6/Ukc27FXSP1.jpg', '2021-04-05 15:33:45', '2021-04-05 15:33:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `display_name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(5, 'admin', 'quản trị', '2020-11-17 17:37:58', '2020-11-17 17:37:58'),
(6, 'edite', 'sửa', '2020-11-17 17:38:34', '2020-11-17 17:38:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `specifications`
--

CREATE TABLE `specifications` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `Band` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Display` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Operating` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Memory` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Chip` varchar(50) NOT NULL DEFAULT '0',
  `Ram` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Sim` varchar(255) NOT NULL DEFAULT '0',
  `Battery` varchar(255) NOT NULL DEFAULT '0',
  `Security` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Design` varchar(255) NOT NULL DEFAULT '0',
  `Wifi` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Camera_front` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Camera_rear` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Mass` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `specifications`
--

INSERT INTO `specifications` (`id`, `product_id`, `Band`, `Display`, `Operating`, `Memory`, `Chip`, `Ram`, `Sim`, `Battery`, `Security`, `Design`, `Wifi`, `Camera_front`, `Camera_rear`, `Mass`, `created_at`, `updated_at`) VALUES
(9, 21, 'apple', 'errt', 'egerg', 'erg', 'wg', 'gerg', 'ikk', 'ergeg', 'ergr', 'erg', 'erg', 'dfgdfg', 'rthtrh', 'erg', '2021-04-05 13:32:20', '2021-04-05 13:32:20'),
(10, 22, 'apple', '345', 'dfgdfg', '345', '345', '345', '345', '34535', '345345', '345', '34535', 'dfgdfg', 'dfgdfg', '45', '2021-04-05 15:33:45', '2021-04-05 15:33:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status_order`
--

CREATE TABLE `status_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `active`, `created_at`, `updated_at`) VALUES
(1, 'tuan', '1@gmail.com', '2020-11-18 06:34:24', '$2y$10$kHgygoDDbhrfAyIQQX.Fxet3wqqfoqpKaaCuHkSSCTpb/Qe9KBCvK', '8nS57TgcgrpxlN54Md5JrDxAyfS9MT2Bwvin5yfXfIScAHUx9XriYcvKQVpx', 1, NULL, '2020-11-17 14:37:02'),
(6, 'tuan', '2@gmail.com', '2020-11-18 06:57:23', '$2y$10$9fB1TW2Cp2MCkU842R7QYuK.nlQgFzwgqgOmOaa3uUW9bU65lW8hu', NULL, 1, '2020-11-17 14:56:25', '2020-11-17 14:56:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_role` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_id`, `user_role`, `created_at`, `update_at`) VALUES
(3, 6, 1, NULL, NULL),
(4, 6, 2, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `attribute_value`
--
ALTER TABLE `attribute_value`
  ADD PRIMARY KEY (`id`),
  ADD KEY `astributeID` (`attribute_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `custommer`
--
ALTER TABLE `custommer`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `option_type`
--
ALTER TABLE `option_type`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `userID` (`custommerID`,`status`,`optionID`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderID` (`orderID`,`productID`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryID` (`category_id`);

--
-- Chỉ mục cho bảng `producttype`
--
ALTER TABLE `producttype`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_attribute`
--
ALTER TABLE `product_attribute`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_astribute_id` (`productattribute_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `specifications`
--
ALTER TABLE `specifications`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `status_order`
--
ALTER TABLE `status_order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `attribute`
--
ALTER TABLE `attribute`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `attribute_value`
--
ALTER TABLE `attribute_value`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `custommer`
--
ALTER TABLE `custommer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `option_type`
--
ALTER TABLE `option_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `producttype`
--
ALTER TABLE `producttype`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `product_attribute`
--
ALTER TABLE `product_attribute`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `specifications`
--
ALTER TABLE `specifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `status_order`
--
ALTER TABLE `status_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
