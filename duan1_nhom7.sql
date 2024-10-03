-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 02, 2024 at 05:21 PM
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
-- Database: `duan1_nhom7`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Polo Men', '2024-09-18 14:20:50', '2024-09-18 14:28:51'),
(2, 'Polo Women', '2024-09-18 14:28:43', '2024-09-18 14:29:01'),
(3, 'Polo Baby', '2024-09-18 14:29:09', '2024-09-18 14:29:09');

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Polo Ralph Lauren', '2024-09-22 14:20:32', '2024-09-22 14:20:32'),
(3, 'Polo Lacoste', '2024-09-22 14:27:59', '2024-09-22 14:27:59'),
(4, 'Polo Burberry', '2024-09-22 14:28:16', '2024-09-22 14:28:16');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int NOT NULL,
  `hoten` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `message_contact` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_user` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `hoten`, `email`, `message_contact`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'Vinh', 'vinhnhph40784@fpt.edu.vn', ' Tôi cần hỗ trợ - Vinh', 3, '2024-09-21 15:47:21', '2024-09-21 15:47:21');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `fullname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `fullname`, `phone_number`, `email`, `address`, `note`, `order_date`, `status`) VALUES
(3, 'Phạm Công Dương', '0123456789', 'duong@gmail.com', 'HA NOI', NULL, '2024-09-21 10:44:31', 'Đang giao'),
(4, 'Vietanh', '0123456789', 'vietanh@gmail.con', 'ha noi', NULL, '2024-09-20 10:52:24', 'Đã xác nhận'),
(5, 'vinh', '012312312312', 'hvinh220604@gmail.com', 'aaaa', NULL, '2024-09-13 22:10:56', 'Đã xác nhận'),
(6, 'huyvinh', '012312312321', 'vinhnhph40784@fpt.edu.vn', 'bbbbbb', NULL, '2024-09-13 22:13:57', 'Đã hủy');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `id_user` int NOT NULL,
  `num` int NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `id_user`, `num`, `price`) VALUES
(3, 3, 3, 3, 1, 1089000),
(4, 4, 13, 3, 1, 999000),
(5, 4, 14, 3, 1, 1290000),
(6, 4, 15, 3, 1, 9880000),
(7, 5, 2, 2, 1, 1280000),
(8, 6, 11, 2, 3, 8970000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` float NOT NULL,
  `number` float NOT NULL,
  `thumbnail` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_category` int NOT NULL,
  `id_sanpham` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `price`, `number`, `thumbnail`, `content`, `id_category`, `id_sanpham`, `created_at`, `updated_at`) VALUES
(2, 'Classic Fit Big Pony Mesh Polo Shirt', 1280000, 100, 'uploads/sp1.1.jpg', 'vv', 1, 1, '2024-09-20 09:32:30', '2024-09-20 10:55:12'),
(3, 'Classic Fit Big Pony Mesh Polo Shirt', 1089000, 67, 'uploads/sp2.1.jpg', 'aaa', 1, 1, '2024-09-20 09:46:45', '2024-09-20 10:30:15'),
(4, 'Áo Polo Nữ Tay Ngắn Slim Fit Stretch Polo Shirt', 2281000, 1200, 'uploads/sp3.1.jpg', 'bb', 2, 1, '2024-09-20 09:24:51', '2024-09-20 09:24:51'),
(7, 'Áo Polo Nam Tay Ngắn Custom Slim Fit Polo Bear Polo Shirt', 5390000, 12, 'uploads/sp6.1.jpg', 'fff', 1, 1, '2024-09-20 10:31:05', '2024-09-20 10:31:05'),
(8, 'Áo Polo Nam Tay Ngắn Classic Fit Tennis-Crest Mesh Polo Shirt', 22900000, 56, 'uploads/sp7.1.jpg', 'sss', 1, 4, '2024-09-20 10:27:09', '2024-09-20 10:27:09'),
(9, 'Áo Len Nữ Không Tay Cable-Knit Cropped Polo Shirt', 5555560, 111, 'uploads/sp4.1.jpg', 'zzz', 2, 3, '2024-09-20 10:59:20', '2024-09-20 10:59:20'),
(10, 'Áo Polo Nữ Tay Ngắn Slim Fit Cable-Knit Polo Shirt', 9999000, 109, 'uploads/sp5.1.jpg', 'nnn', 2, 4, '2024-09-20 10:35:23', '2024-09-20 10:35:23'),
(11, 'Áo Polo Nữ Tay Ngắn Cable-Knit Polo Shirt', 8970000, 123, 'uploads/sp8.1.jpg', 'zzz', 2, 3, '2024-09-20 10:13:26', '2024-09-20 10:13:26'),
(12, 'Áo Thun Map Kids', 1089000, 11, 'uploads/sp9.1.jpg', 'ggg', 3, 3, '2024-09-20 10:58:30', '2024-09-20 10:58:30'),
(13, 'Áo Thun Vacay', 999000, 98, 'uploads/sp10.1.jpg', 'bbb', 3, 3, '2024-09-20 10:37:33', '2024-09-20 10:37:33'),
(14, 'Áo Thun Vacay Kẻ Sọc Kids', 1290000, 121, 'uploads/sp11.2.jpg', 'yyy', 3, 3, '2024-09-20 10:31:35', '2024-09-20 10:31:35'),
(15, 'Áo Thun Có Cổ Javier6', 9880000, 121, 'uploads/sp12.1.jpg', 'jjj', 3, 4, '2024-09-20 10:50:39', '2024-09-20 10:50:39');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `fullname` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tendangnhap` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `diachi` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `matkhau` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dienthoai` int NOT NULL,
  `role` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `fullname`, `tendangnhap`, `email`, `diachi`, `matkhau`, `dienthoai`, `role`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'Ha Noi', '9999', 395566444, 'admin'),
(2, 'Nguyễn Huy Vinh', 'Vinh', 'vinh@gmail.vcom', 'Ha Noi', '1234', 395566444, ''),
(3, 'vinh', 'huyvinh123', 'vinh@gmail.com', 'ha noi', '123123', 123456789, ''),
(4, 'Lê ngọc việt anh', 'viet', 'anhlnvph38629@fpt.edu.vn', 'hà nội', '123123', 985518036, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ibfk_1` (`id_user`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_ibfk_1` (`product_id`),
  ADD KEY `order_details_ibfk_2` (`order_id`),
  ADD KEY `order_details_ibfk_3` (`id_user`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_ibfk_1` (`id_category`),
  ADD KEY `sanpham_ibfk_1` (`id_sanpham`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_collections` FOREIGN KEY (`id_sanpham`) REFERENCES `collections` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
