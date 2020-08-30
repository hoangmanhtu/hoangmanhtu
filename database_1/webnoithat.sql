-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2020 at 04:53 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webnoithat`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'Tên danh mục',
  `avatar` varchar(255) DEFAULT NULL COMMENT 'Tên file ảnh danh mục',
  `description` text DEFAULT NULL COMMENT 'Mô tả chi tiết cho danh mục',
  `status` tinyint(3) DEFAULT 0 COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo danh mục',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối',
  `hotcategory` tinyint(4) NOT NULL COMMENT 'danh muc hot'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `avatar`, `description`, `status`, `created_at`, `updated_at`, `hotcategory`) VALUES
(1, ' Phòng Khách', '1594921060-1.jpg', '<p>Ph&ograve;ng Kh&aacute;ch Của Bạn</p>\r\n', 1, '2020-07-16 17:37:40', '2020-08-06 22:07:28', 1),
(2, ' Phòng Bếp', '1594921084-3 - Copy (2) - Copy.jpg', '<p>Ph&ograve;ng bếp nh&agrave; bạn</p>\r\n', 1, '2020-07-16 17:38:04', '2020-08-06 22:07:23', 1),
(3, 'Phòng Ngủ', '1594921104-4 - Copy - Copy - Copy - Copy - Copy (2).jpg', '<p>Ph&ograve;ng ngủ nh&agrave; bạn</p>\r\n', 1, '2020-07-16 17:38:24', '2020-08-06 22:07:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL COMMENT 'Id của danh mục mà tin tức thuộc về, là khóa ngoại liên kết với bảng categories',
  `title` varchar(255) NOT NULL COMMENT 'Tiêu đề tin tức',
  `summary` varchar(255) DEFAULT NULL COMMENT 'Mô tả ngắn cho tin tức',
  `avatar` varchar(255) DEFAULT NULL COMMENT 'Tên file ảnh tin tức',
  `content` text DEFAULT NULL COMMENT 'Mô tả chi tiết cho sản phẩm',
  `status` tinyint(3) DEFAULT 0 COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối',
  `hotnews` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `category_id`, `title`, `summary`, `avatar`, `content`, `status`, `created_at`, `updated_at`, `hotnews`) VALUES
(2, 3, 'Thiết Kế phòng nội thất của chung cư VinHome', '<p>111111</p>\r\n', '1596218820-3.jpg', '<p>11111111111</p>\r\n', 1, '2020-07-31 17:12:06', '2020-08-01 01:17:28', 1),
(3, 1, 'Thiết Kws Nội thất bếp cho A THẮNG', '<p>abc</p>\r\n', '1596219430-14.jpg', '<p>xyz</p>\r\n', 1, '2020-07-31 18:17:10', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL COMMENT 'Id của user trong trường hợp đã login và đặt hàng, là khóa ngoại liên kết với bảng users',
  `fullname` varchar(255) DEFAULT NULL COMMENT 'Tên khách hàng',
  `address` varchar(255) DEFAULT NULL COMMENT 'Địa chỉ khách hàng',
  `mobile` int(11) DEFAULT NULL COMMENT 'SĐT khách hàng',
  `email` varchar(255) DEFAULT NULL COMMENT 'Email khách hàng',
  `note` text DEFAULT NULL COMMENT 'Ghi chú từ khách hàng',
  `price_total` int(11) DEFAULT NULL COMMENT 'Tổng giá trị đơn hàng',
  `payment_status` tinyint(2) DEFAULT NULL COMMENT 'Trạng thái đơn hàng: 0 - Chưa thành toán, 1 - Đã thành toán',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo đơn',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `fullname`, `address`, `mobile`, `email`, `note`, `price_total`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Hoàng Mạnh Tú', '9', 0, '123', '0123456789', 663100000, 0, '2020-07-23 17:04:30', NULL),
(2, NULL, ' BIn Lùn', '9', 0, '111111111111111111111111111111111111111', '1111', 663100000, 0, '2020-07-23 17:08:37', NULL),
(3, NULL, ' BIn Lùn', '9', 0, '111111111111111111111111111111111111111', '1111', 663100000, 0, '2020-07-23 17:08:51', NULL),
(4, NULL, '123', '111', 0, '111', '111', 12564000, 0, '2020-07-23 17:40:29', NULL),
(5, NULL, '123', '111', 0, '111', '111', 12564000, 0, '2020-07-23 17:41:11', NULL),
(6, NULL, '123', '111', 0, '111', '111', 12564000, 0, '2020-07-23 17:41:32', NULL),
(7, NULL, '123', '111', 0, '111', '111', 12564000, 0, '2020-07-23 17:41:38', NULL),
(8, NULL, '123', '111', 0, '111', '111', 12564000, 0, '2020-07-23 17:42:50', NULL),
(9, NULL, '123', '111', 0, '111', '111', 12564000, 0, '2020-07-23 17:43:00', NULL),
(10, NULL, '123', '111', 0, '111', '111', 12564000, 0, '2020-07-23 17:43:38', NULL),
(11, NULL, '123', '111', 0, '111', '111', 12564000, 0, '2020-07-23 17:44:03', NULL),
(12, NULL, '123', '111', 0, '111', '111', 12564000, 0, '2020-07-23 17:44:16', NULL),
(13, NULL, '123', '111', 0, '111', '111', 12564000, 0, '2020-07-23 17:44:51', NULL),
(14, NULL, '123', '111', 0, '111', '111', 12564000, 0, '2020-07-23 17:45:01', NULL),
(15, NULL, '123', '111', 0, '111', '111', 12564000, 0, '2020-07-23 17:45:12', NULL),
(16, NULL, '123', '111', 0, '111', '111', 12564000, 0, '2020-07-23 17:46:16', NULL),
(17, NULL, '123', '111', 0, '111', '111', 12564000, 0, '2020-07-23 17:46:46', NULL),
(18, NULL, '123', '111', 0, '111', '111', 12564000, 0, '2020-07-23 17:47:27', NULL),
(19, NULL, '123', '111', 0, '111', '111', 12564000, 0, '2020-07-23 17:49:20', NULL),
(20, NULL, '123', '111', 0, '111', '111', 12564000, 0, '2020-07-23 17:49:39', NULL),
(21, NULL, '123', '111', 0, '111', '111', 12564000, 0, '2020-07-23 17:52:16', NULL),
(22, NULL, 'Phạm Thi Thảo', 'Triều Khúc', 0, 'abc', '0846842286', 20846000, 0, '2020-07-23 17:55:29', NULL),
(23, 0, '  Bin Lùn', '7', 111111, '123', '111', 6282000, 0, '2020-07-25 16:12:45', NULL),
(24, 7, '  Bin Lùn', 'Triều Khúc', 123, 'binkoy0809@gmail.com', '', 6282000, 0, '2020-07-25 16:18:29', NULL),
(25, 7, '  Bin Lùn', 'Nam Định', 2147483647, 'hoangmanhtu0809@mail.com', 'Giao sáng nhé', 8272000, 0, '2020-07-25 19:28:12', NULL),
(26, 7, '  Bin Lùn', '1234455', 395679339, 'hoangmanhtu0809@mail.com', '123', 6282000, 0, '2020-07-25 19:54:09', NULL),
(27, 7, '  Bin Lùn', '1234455', 395679339, 'hoangmanhtu0809@mail.com', '1', 6282000, 0, '2020-07-25 19:57:26', NULL),
(28, 7, '  Bin Lùn', '1234455', 395679339, 'hoangmanhtu0809@mail.com', '1', 6282000, 0, '2020-07-25 19:58:23', NULL),
(29, 7, '  Bin Lùn', '1234455', 395679339, 'hoangmanhtu0809@mail.com', '1', 6282000, 0, '2020-07-25 19:58:51', NULL),
(30, 7, '  Bin Lùn', '1234455', 395679339, 'hoangmanhtu0809@mail.com', '', 6282000, 0, '2020-07-25 19:59:32', NULL),
(31, 0, 'Hoàng Mạnh Tú', '9', 1111111, 'binkoy0809@gmail.com', '111111', 120551000, 0, '2020-08-21 14:42:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) DEFAULT NULL COMMENT 'Id của order tương ứng, là khóa ngoại liên kết với bảng orders',
  `product_id` int(11) DEFAULT NULL COMMENT 'Id của product tương ứng, là khóa ngoại liên kết với bảng products',
  `quality` int(11) DEFAULT NULL COMMENT 'Số sản phẩm đã đặt'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `product_id`, `quality`) VALUES
(1, 45, NULL),
(1, 48, NULL),
(2, 45, 100),
(2, 48, 5),
(3, 45, 100),
(3, 48, 5),
(4, 45, 1),
(4, 46, 1),
(5, 45, 1),
(5, 46, 1),
(6, 45, 1),
(6, 46, 1),
(7, 45, 1),
(7, 46, 1),
(8, 45, 1),
(8, 46, 1),
(9, 45, 1),
(9, 46, 1),
(10, 45, 1),
(10, 46, 1),
(11, 45, 1),
(11, 46, 1),
(12, 45, 1),
(12, 46, 1),
(13, 45, 1),
(13, 46, 1),
(14, 45, 1),
(14, 46, 1),
(15, 45, 1),
(15, 46, 1),
(16, 45, 1),
(16, 46, 1),
(17, 45, 1),
(17, 46, 1),
(18, 45, 1),
(18, 46, 1),
(19, 45, 1),
(19, 46, 1),
(20, 45, 1),
(20, 46, 1),
(21, 45, 1),
(21, 46, 1),
(22, 46, 3),
(22, 50, 2),
(23, 45, 1),
(24, 45, 1),
(25, 46, 1),
(25, 51, 1),
(26, 45, 1),
(29, 45, 1),
(30, 45, 1),
(31, 48, 16),
(31, 56, 1),
(31, 50, 1),
(31, 54, 1);

-- --------------------------------------------------------

--
-- Table structure for table `producer`
--

CREATE TABLE `producer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'Tên thương hiệu',
  `avatar` varchar(255) DEFAULT NULL COMMENT 'Tên file ảnh thương hiệu',
  `description` text DEFAULT NULL COMMENT 'Mô tả chi tiết cho thương hiệu',
  `status` tinyint(3) DEFAULT 0 COMMENT 'Trạng thái thương hiệu: 0 - Inactive, 1 - Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo thương hiệu',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `producer`
--

INSERT INTO `producer` (`id`, `name`, `avatar`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Phố Xinh', '1594921188-1.jpg', '<p>123443433443</p>\r\n', 0, '2020-07-10 16:40:26', '2020-07-17 00:39:48'),
(4, 'Nhà Xinh', '1594921202-85091584_1294208450770372_1159289343378980864_n.jpg', '<p>111</p>\r\n', 1, '2020-07-10 16:47:33', '2020-07-17 00:40:02'),
(5, 'Pháp', '', '<p>111</p>\r\n', 1, '2020-07-12 04:05:16', '2020-07-17 00:39:12');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL COMMENT 'Id của danh mục mà sản phẩm thuộc về, là khóa ngoại liên kết với bảng categories',
  `producer_id` int(11) DEFAULT NULL COMMENT 'Id của thương hiệu mà sản phẩm thuộc về, là khóa ngoại liên kết với bảng producer',
  `title` varchar(255) NOT NULL COMMENT 'Tên sản phẩm',
  `avatar` varchar(255) DEFAULT NULL COMMENT 'Tên file ảnh sản phẩm',
  `price` int(11) DEFAULT NULL COMMENT 'Giá sản phẩm',
  `quality` int(11) DEFAULT NULL COMMENT 'Số Lượng Sản Phẩm',
  `summary` varchar(255) DEFAULT NULL COMMENT 'Mô tả ngắn cho sản phẩm',
  `content` text DEFAULT NULL COMMENT 'Mô tả chi tiết cho sản phẩm',
  `hotproduct` tinyint(3) DEFAULT 0 COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `status` tinyint(3) DEFAULT 0 COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối',
  `discount` int(11) NOT NULL,
  `total_rating` int(11) NOT NULL COMMENT 'Tổng số đánh giá',
  `total_number_rating` int(11) NOT NULL COMMENT 'số sao đánh giá '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `producer_id`, `title`, `avatar`, `price`, `quality`, `summary`, `content`, `hotproduct`, `status`, `created_at`, `updated_at`, `discount`, `total_rating`, `total_number_rating`) VALUES
(45, 1, 2, 'Products Name 001', '1595173577-1.jpg', 6980000, 100, '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod temf incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostr exercitation ullamco laboris nisi ut aliquip ex ea.</p>\r\n', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod temf incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostr exercitation ullamco laboris nisi ut aliquip ex ea.</p>\r\n', 1, 1, '2020-07-19 15:46:17', NULL, 10, 4, 17),
(46, 3, 4, 'Products Name 002', '1595173634-2.jpg', 6980000, 50, '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod temf incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostr exercitation ullamco laboris nisi ut aliquip ex ea.</p>\r\n', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod temf incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostr exercitation ullamco laboris nisi ut aliquip ex ea.</p>\r\n', 1, 1, '2020-07-19 15:47:14', '2020-07-31 21:51:11', 10, 0, 0),
(47, 1, 5, 'Products Name 003', '1595173661-3.jpg', 6980000, 100, '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod temf incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostr exercitation ullamco laboris nisi ut aliquip ex ea.</p>\r\n', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod temf incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostr exercitation ullamco laboris nisi ut aliquip ex ea.</p>\r\n', 1, 1, '2020-07-19 15:47:41', '2020-07-31 22:11:29', 0, 0, 0),
(48, 1, 5, 'Products Name 004', '1595173689-4.jpg', 6980000, 123, '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod temf incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostr exercitation ullamco laboris nisi ut aliquip ex ea.</p>\r\n', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod temf incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostr exercitation ullamco laboris nisi ut aliquip ex ea.</p>\r\n', 1, 1, '2020-07-19 15:48:09', '2020-07-31 22:11:22', 0, 0, 0),
(49, 2, 4, 'Products Name 005', '1595173732-6.jpg', 0, 50, '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod temf incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostr exercitation ullamco laboris nisi ut aliquip ex ea.</p>\r\n', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod temf incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostr exercitation ullamco laboris nisi ut aliquip ex ea.</p>\r\n', 0, 1, '2020-07-19 15:48:52', '2020-08-06 22:08:10', 0, 0, 0),
(50, 2, 5, 'Products Name 006', '1595173763-7.jpg', 1000000, 10, '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod temf incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostr exercitation ullamco laboris nisi ut aliquip ex ea.</p>\r\n', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod temf incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostr exercitation ullamco laboris nisi ut aliquip ex ea.</p>\r\n', 1, 1, '2020-07-19 15:49:23', '2020-08-06 22:08:16', 0, 1, 5),
(51, 1, 4, 'Products Name 007', '1595173802-8.jpg', 1990000, 20, '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod temf incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostr exercitation ullamco laboris nisi ut aliquip ex ea.</p>\r\n', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod temf incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostr exercitation ullamco laboris nisi ut aliquip ex ea.</p>\r\n', 0, 1, '2020-07-19 15:50:02', '2020-07-31 22:11:40', 0, 0, 0),
(52, 3, 5, 'Products Name 008', '1595173837-9.jpg', 1200000, 10, '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod temf incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostr exercitation ullamco laboris nisi ut aliquip ex ea.</p>\r\n', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod temf incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostr exercitation ullamco laboris nisi ut aliquip ex ea.</p>\r\n', 1, 1, '2020-07-19 15:50:37', '2020-07-31 21:51:06', 0, 3, 14),
(53, 1, 4, 'Products Name 009', '1596199242-9.jpg', 6980000, 50, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum earum eveniet dolorum suscipit nesciunt incidunt animi repudiandae ab at, tenetur distinctio voluptate vel illo similique.</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum earum eveniet dolorum suscipit nesciunt incidunt animi repudiandae ab at, tenetur distinctio voluptate vel illo similique.</p>\r\n', 1, 1, '2020-07-31 12:40:42', NULL, 10, 0, 0),
(54, 1, 5, 'Products Name 011', '1596199314-10).jpg', 990000, 50, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum earum eveniet dolorum suscipit nesciunt incidunt animi repudiandae ab at, tenetur distinctio voluptate vel illo similique.</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum earum eveniet dolorum suscipit nesciunt incidunt animi repudiandae ab at, tenetur distinctio voluptate vel illo similique.</p>\r\n', 1, 1, '2020-07-31 12:41:54', NULL, 10, 0, 0),
(55, 1, 2, 'Products Name 012', '1596199892-11.jpg', 790000, 50, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum earum eveniet dolorum suscipit nesciunt incidunt animi repudiandae ab at, tenetur distinctio voluptate vel illo similique.</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum earum eveniet dolorum suscipit nesciunt incidunt animi repudiandae ab at, tenetur distinctio voluptate vel illo similique.</p>\r\n', 1, 1, '2020-07-31 12:51:32', NULL, 3, 0, 0),
(56, 2, 4, 'Products Name 014', '1596728678-2.jpg', 6980000, 10, '<ul>\r\n	<li>&nbsp;K&iacute;ch thước: 208x86x55 cm</li>\r\n	<li>&nbsp;Chất liệu: Khung gỗ bọc PVC</li>\r\n	<li>&nbsp;Kiểu d&aacute;ng sang trọng, hiện đại</li>\r\n	<li>&nbsp;Độ đ&agrave;n hồi v&agrave; &ecirc;m &aacute;i</li>\r\n	<li>&nbsp;Thoải m&aacute;i nằm đọc<', '<h3>Sofa Giường CHRIS PAB-169N15S_P3</h3>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Sofa giường nằm được rất nhiều gia đ&igrave;nh ưa chuộng n&oacute; ph&ugrave; hợp với lối kiến tr&uacute;c đơn giản v&agrave; phong c&aacute;ch thiết kế nh&agrave; hiện đại nhưng v&ocirc; c&ugrave;ng sang trọng v&agrave; tận dụng được tối đa kh&ocirc;ng gian sống của mỗi gia đ&igrave;nh. Si&ecirc;u Thị Điện M&aacute;y Nội Thất Chợ Lớn xin giới thiệu đến bạn Sofa Giường CHRIS PAB-169N15S_P3</p>\r\n', 1, 1, '2020-08-06 15:44:38', '2020-08-06 22:49:28', 0, 0, 0),
(57, 2, 2, 'SOFA GIƯỜNG CHRIS PAB-169N15S_P3', '1596728797-13.jpg', 1000000, 2, '<h2>SOFA GIƯỜNG CHRIS PAB-169N15S_P3</h2>\r\n', '<h3>Sofa Giường CHRIS PAB-169N15S_P3</h3>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Sofa giường nằm được rất nhiều gia đ&igrave;nh ưa chuộng n&oacute; ph&ugrave; hợp với lối kiến tr&uacute;c đơn giản v&agrave; phong c&aacute;ch thiết kế nh&agrave; hiện đại nhưng v&ocirc; c&ugrave;ng sang trọng v&agrave; tận dụng được tối đa kh&ocirc;ng gian sống của mỗi gia đ&igrave;nh. Si&ecirc;u Thị Điện M&aacute;y Nội Thất Chợ Lớn xin giới thiệu đến bạn Sofa Giường CHRIS PAB-169N15S_P3</p>\r\n\r\n<h2>GIỚI THIỆU SẢN PHẨM&nbsp;SOFA GIƯỜNG CHRIS PAB-169N15S_P3</h2>\r\n\r\n<h3>Sofa Giường CHRIS PAB-169N15S_P3</h3>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Sofa giường nằm được rất nhiều gia đ&igrave;nh ưa chuộng n&oacute; ph&ugrave; hợp với lối kiến tr&uacute;c đơn giản v&agrave; phong c&aacute;ch thiết kế nh&agrave; hiện đại nhưng v&ocirc; c&ugrave;ng sang trọng v&agrave; tận dụng được tối đa kh&ocirc;ng gian sống của mỗi gia đ&igrave;nh. Si&ecirc;u Thị Điện M&aacute;y Nội Thất Chợ Lớn xin giới thiệu đến bạn Sofa Giường CHRIS PAB-169N15S_P3<img alt=\"\" src=\"https://dienmaycholon.vn/public/userupload/images/sofa-gi%C6%B0%C6%A1ng-CHRIS-169N15S-P3-BV2.jpg\" /></p>\r\n\r\n<h3>Khung bằng kim loại, ghế bọc PVC</h3>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; Sofa Giường CHRIS PAB-169N15S_P3 với phần khung được l&agrave;m từ kim loại tốt c&oacute; khả năng chịu lực cho tuổi thọ cao trong qu&aacute; tr&igrave;nh sử dụng, sản phẩm được thiết kế đệm m&uacute;t &ecirc;m &aacute;i bọc da sang trọng c&oacute; t&iacute;nh đ&agrave;n hồi v&agrave; độ linh hoạt cao, đảm bảo kh&ocirc;ng bị xẹp l&uacute;n, biến dạng trong thời gian d&agrave;i. Chất liệu PVC chống thấm nước v&agrave; dễ lau ch&ugrave;i khi bị b&aacute;m bẩn, cho tuổi thọ l&acirc;u d&agrave;i.</p>\r\n', 1, 1, '2020-08-06 15:46:37', '2020-08-06 22:47:06', 0, 0, 0),
(58, 2, 5, 'Products Name 111', '1596729057-14.jpg', 111, 1, '<ul>\r\n	<li>&nbsp;K&iacute;ch thước: 208x86x55 cm</li>\r\n	<li>&nbsp;Chất liệu: Khung gỗ bọc PVC</li>\r\n	<li>&nbsp;Kiểu d&aacute;ng sang trọng, hiện đại</li>\r\n	<li>&nbsp;Độ đ&agrave;n hồi v&agrave; &ecirc;m &aacute;i</li>\r\n	<li>&nbsp;Thoải m&aacute;i nằm đọc<', '<h2>GIỚI THIỆU SẢN PHẨM&nbsp;SOFA GIƯỜNG CHRIS PAB-169N15S_P3</h2>\r\n\r\n<h3>Sofa Giường CHRIS PAB-169N15S_P3</h3>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Sofa giường nằm được rất nhiều gia đ&igrave;nh ưa chuộng n&oacute; ph&ugrave; hợp với lối kiến tr&uacute;c đơn giản v&agrave; phong c&aacute;ch thiết kế nh&agrave; hiện đại nhưng v&ocirc; c&ugrave;ng sang trọng v&agrave; tận dụng được tối đa kh&ocirc;ng gian sống của mỗi gia đ&igrave;nh. Si&ecirc;u Thị Điện M&aacute;y Nội Thất Chợ Lớn xin giới thiệu đến bạn Sofa Giường CHRIS PAB-169N15S_P3<img alt=\"\" src=\"https://dienmaycholon.vn/public/userupload/images/sofa-gi%C6%B0%C6%A1ng-CHRIS-169N15S-P3-BV2.jpg\" /></p>\r\n\r\n<h3>Khung bằng kim loại, ghế bọc PVC</h3>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; Sofa Giường CHRIS PAB-169N15S_P3 với phần khung được l&agrave;m từ kim loại tốt c&oacute; khả năng chịu lực cho tuổi thọ cao trong qu&aacute; tr&igrave;nh sử dụng, sản phẩm được thiết kế đệm m&uacute;t &ecirc;m &aacute;i bọc da sang trọng c&oacute; t&iacute;nh đ&agrave;n hồi v&agrave; độ linh hoạt cao, đảm bảo kh&ocirc;ng bị xẹp l&uacute;n, biến dạng trong thời gian d&agrave;i. Chất liệu PVC chống thấm nước v&agrave; dễ lau ch&ugrave;i khi bị b&aacute;m bẩn, cho tuổi thọ l&acirc;u d&agrave;i.</p>\r\n', 1, 1, '2020-08-06 15:50:57', '2020-08-06 22:51:09', 0, 0, 0),
(59, 3, 4, 'Products Name 123', '1596729709-2.jpg', 6980000, 111, '<p>123</p>\r\n', '<p>111</p>\r\n', 1, 1, '2020-08-06 16:01:49', NULL, 0, 0, 0),
(60, 3, 5, 'Products Name 222', '1596729745-6.jpg', 2040000, 1, '<p>111</p>\r\n', '<p>111</p>\r\n', 1, 1, '2020-08-06 16:02:25', NULL, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL COMMENT 'Id của sản phẩm, là khóa ngoại liên kết với bảng products',
  `avatar` varchar(255) DEFAULT NULL COMMENT 'Tên file ảnh danh mục'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `avatar`) VALUES
(88, 45, '1595173577-2.jpg'),
(89, 45, '1595173577-3.jpg'),
(90, 46, '1595173634-3.jpg'),
(91, 46, '1595173634-4.jpg'),
(92, 47, '1595173661-4.jpg'),
(93, 47, '1595173661-5.jpg'),
(94, 48, '1595173689-5.jpg'),
(95, 48, '1595173689-6.jpg'),
(96, 49, '1595173732-6.jpg'),
(97, 49, '1595173732-7.jpg'),
(98, 50, '1595173763-8.jpg'),
(99, 50, '1595173763-9.jpg'),
(100, 51, '1595173802-1.jpg'),
(101, 51, '1595173803-9.jpg'),
(102, 52, '1595173837-1.jpg'),
(103, 52, '1595173837-2.jpg'),
(104, 53, '1596199242-10).jpg'),
(105, 53, '1596199242-11.jpg'),
(106, 53, '1596199242-12.jpg'),
(107, 54, '1596199314-11.jpg'),
(108, 54, '1596199315-12.jpg'),
(109, 55, '1596199892-9.jpg'),
(110, 55, '1596199892-12.jpg'),
(111, 55, '1596199892-13.jpg'),
(112, 56, '1596728678-12.jpg'),
(113, 56, '1596728678-13.jpg'),
(114, 57, '1596728797-2.jpg'),
(115, 57, '1596728797-9.jpg'),
(116, 57, '1596728797-10).jpg'),
(117, 57, '1596728798-11.jpg'),
(118, 57, '1596728798-12.jpg'),
(119, 58, '1596729057-10).jpg'),
(120, 58, '1596729057-11.jpg'),
(121, 59, '1596729709-5.jpg'),
(122, 59, '1596729709-6.jpg'),
(123, 59, '1596729709-7.jpg'),
(124, 60, '1596729745-5.jpg'),
(125, 60, '1596729745-7.jpg'),
(126, 60, '1596729745-10.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `rating_product`
--

CREATE TABLE `rating_product` (
  `id` int(11) NOT NULL COMMENT 'id của đánh giá',
  `product_id` int(11) NOT NULL COMMENT 'id của sản phẩm',
  `user_id` int(11) NOT NULL COMMENT 'user_id của sản phẩm',
  `name` varchar(500) NOT NULL COMMENT 'tên người đánh giá',
  `number` int(11) NOT NULL COMMENT 'số lượng sao',
  `content` varchar(500) NOT NULL COMMENT 'content đánh giá',
  `created_at` varchar(255) NOT NULL DEFAULT current_timestamp() COMMENT 'ngày đánh giá'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rating_product`
--

INSERT INTO `rating_product` (`id`, `product_id`, `user_id`, `name`, `number`, `content`, `created_at`) VALUES
(17, 45, 0, 'Bin', 3, 'Sản phẩm tốt', '2020-07-31 01:06:28'),
(18, 45, 0, 'Lùn', 5, 'Sna rphaarm đẹp', '2020-07-31 01:07:28'),
(19, 45, 0, 'Tú', 5, 'hihi', '2020-07-31 01:07:48'),
(20, 45, 0, 'Thảo ', 4, 'Đẹp', '2020-07-31 01:10:01'),
(21, 52, 0, 'Hoàng Mạnh Tú', 5, 'Sản phẩm Ok', '2020-07-31 18:46:23'),
(22, 52, 0, 'HiHI', 5, 'Sản phẩm chất lượng.Tối sẽ ủng hộ dài dài', '2020-07-31 23:20:09'),
(23, 52, 0, 'Tú', 4, 'Sản phẩm tốt', '2020-08-01 00:27:41'),
(24, 50, 0, 'TÚ', 5, '123333', '2020-08-21 21:26:52');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `news_id` int(11) DEFAULT NULL COMMENT 'Id của tin tức sẽ hiển thị trong slide, là khóa ngoại liên kết với bảng news',
  `avatar` varchar(255) DEFAULT NULL COMMENT 'File ảnh slide',
  `position` tinyint(3) DEFAULT NULL COMMENT 'Vị trí hiển thị của slide, ví dụ: = 0 hiển thị đầu tiên...',
  `status` tinyint(3) DEFAULT 0 COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `sdt` varchar(500) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `create_at` varchar(500) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`id`, `name`, `email`, `sdt`, `status`, `create_at`) VALUES
(1, ' Phòng Khách', 'binkoy0809@gmail.com', '0863873812', 0, '2020-08-07 17:57:52'),
(2, ' Phòng Khách', 'binkoy0809@gmail.com', '0863873812', 0, '2020-08-07 17:57:54'),
(3, 'Hoàng Mạnh Tú', 'hoangmanhtu0809@gmail.com', '09663873812', 0, '2020-08-07 18:01:36'),
(4, ' iPhone XS series chính hãng tiếp tục giảm giá trước sức mua kém', 'admin1@mail.com', '0863873812', 0, '2020-08-09 17:52:09'),
(5, 'Hoàng Mạnh Tú', 'hoangmanhtu0809@gmail.com', '0395679339', 0, '2020-08-21 21:29:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL COMMENT 'Tên đăng nhập',
  `password` varchar(255) NOT NULL COMMENT 'Mật khẩu đăng nhập',
  `first_name` varchar(255) DEFAULT NULL COMMENT 'Fist name',
  `last_name` varchar(255) DEFAULT NULL COMMENT 'Last name',
  `phone` int(11) DEFAULT NULL COMMENT 'SĐT user',
  `address` varchar(255) DEFAULT NULL COMMENT 'Địa chỉ user',
  `email` varchar(255) DEFAULT NULL COMMENT 'Email của user',
  `avatar` varchar(255) DEFAULT NULL COMMENT 'File ảnh đại diện',
  `jobs` varchar(255) DEFAULT NULL COMMENT 'Nghề nghiệp',
  `last_login` datetime DEFAULT NULL COMMENT 'Lần đăng nhập gần đây nhất',
  `facebook` varchar(255) DEFAULT NULL COMMENT 'Link facebook',
  `status` tinyint(3) DEFAULT 0 COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối',
  `fullname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `phone`, `address`, `email`, `avatar`, `jobs`, `last_login`, `facebook`, `status`, `created_at`, `updated_at`, `fullname`) VALUES
(3, 'binkoy0809@gmail.com', '202cb962ac59075b964b07152d234b70', 'Hoàng', 'Tuấn ', 395679339, 'Triều Khúc-Thanh Xuân-Hà Nội', 'hoangmanhtu0809@gmail.com', NULL, NULL, NULL, NULL, 0, '2020-07-25 08:58:18', '2020-07-26 01:35:16', 'Bin Lùn'),
(4, 'mkt@dongphucbonmua.com', '202cb962ac59075b964b07152d234b70', 'Hoàng', 'Tuấn ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-07-25 09:09:00', NULL, ''),
(6, 'binkoy0809@gmail.com', '202cb962ac59075b964b07152d234b70', 'Hoàng', 'Tuấn ', NULL, 'Triều Khúc -Thanh Xuân', NULL, NULL, NULL, NULL, NULL, 1, '2020-07-25 09:20:23', NULL, ''),
(7, 'binkoy0809', '202cb962ac59075b964b07152d234b70', NULL, NULL, 395679339, '1234455', 'hoangmanhtu0809@mail.com', NULL, NULL, NULL, NULL, 0, '2020-07-25 15:10:12', '2020-07-26 02:53:57', '  Bin Lùn'),
(8, 'binkoy080910', '202cb962ac59075b964b07152d234b70', NULL, NULL, 111, NULL, '111111@mail.com', NULL, NULL, NULL, NULL, 0, '2020-07-25 15:12:19', NULL, '  Bin Lùn'),
(9, 'binkoy', '202cb962ac59075b964b07152d234b70', NULL, NULL, 8888888, NULL, 'binkoy0809@gmail.com', NULL, NULL, NULL, NULL, 0, '2020-08-19 17:36:27', NULL, 'Hoàng Mạnh Tú'),
(10, 'phamthithao', '202cb962ac59075b964b07152d234b70', NULL, NULL, 846842286, NULL, 'phamthithao78912@gmail.com', NULL, NULL, NULL, NULL, 0, '2020-08-19 17:38:17', NULL, 'Phạm Thi Thảo'),
(11, 'binkoy0809111', 'e11170b8cbd2d74102651cb967fa28e5', NULL, NULL, 111, NULL, 'binkoy0809@gmail.com', NULL, NULL, NULL, NULL, 0, '2020-08-19 17:39:44', NULL, ' Nguyễn Văn B111'),
(12, 'binkoy08091111111111', '698d51a19d8a121ce581499d7b701668', NULL, NULL, 2147483647, NULL, 'admin1@gmail.com', NULL, NULL, NULL, NULL, 0, '2020-08-19 17:40:46', NULL, '111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `producer`
--
ALTER TABLE `producer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating_product`
--
ALTER TABLE `rating_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `producer`
--
ALTER TABLE `producer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `rating_product`
--
ALTER TABLE `rating_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id của đánh giá', AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
