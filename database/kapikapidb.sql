-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2025 at 04:52 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kapikapidb`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `first_name`, `last_name`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 0, 'sda', 'sdsa', 'kellyydrhan@gmail.com', 'sdas', 'test message', '2025-12-04 12:08:19'),
(2, 0, 'sda', 'sdsa', 'kellyydrhan@gmail.com', 'sdas', 'test message', '2025-12-04 12:09:06'),
(3, 0, 'sda', 'sdsa', 'kellyydrhan@gmail.com', 'sdas', 'test message', '2025-12-04 12:10:30'),
(4, 3, 'sdas', 'sdas', 'kellyydrhan@gmail.com', 'sdas', 'test message ydrhan', '2025-12-04 12:11:47'),
(5, 3, 'kelly', 'ydrhan', 'kellyydrhan@gmail.com', 'test feedback', 'lorem ipsum', '2025-12-04 12:24:49'),
(6, 3, 'kelly', 'ydrhan', 'kellyydrhan@gmail.com', 'test feedback', 'lorem ipsum', '2025-12-04 12:24:53'),
(7, 3, 'sda', 'dsad', 'kellyydrhan@gmail.com', 'test feedback', 'lorem ipsum', '2025-12-04 12:28:24'),
(8, 3, 'sda', 'dsad', 'kellyydrhan@gmail.com', 'test feedback', 'lorem ipsum', '2025-12-04 12:28:33'),
(9, 3, 'test', 'kelly', 'kellyydrhan.alojepan@wvsu.edu.ph', 'test feedback', 'test feedback with stylings', '2025-12-04 12:29:19'),
(10, 3, 'test', 'kelly', 'kellyydrhan.alojepan@wvsu.edu.ph', 'test feedback', 'test feedback with stylings', '2025-12-04 12:30:30'),
(11, 3, 'kelly', 'ydrhan', 'kellyydrhan.alojepan@wvsu.edu.ph', 'test feedback with styling', 'hatdog', '2025-12-04 12:30:46'),
(12, 3, 'dsad', 'dsad', 'dsad@gmail.com', 'sda', 'sdas', '2025-12-04 12:33:28'),
(13, 3, 'sdas', 'dsad', 'kellyydrhan@gmail.com', 'sdas', 'dsadasd', '2025-12-04 12:34:52'),
(14, 3, 'sdas', 'dsada', 'kellyydrhan@gmail.com', 'sdsa', 'dsads', '2025-12-04 12:38:18'),
(15, 3, 'dsad', 'dsad', 'dsad@gmail.com', 'dsad', 'dsada', '2025-12-04 12:39:30'),
(16, 3, 'sdas', 'dsads', 'rhandyalojepan68@gmail.com', 'sdas', 'test popup feedback', '2025-12-04 12:43:51'),
(17, 3, 'sdas', 'dsad', 'dsad@gmail.com', 'dsad', 'dsad', '2025-12-04 12:44:03'),
(18, 3, 'dsad', 'dsad', 'dsad@gmail.com', 'dsad', 'dsada', '2025-12-04 12:44:13'),
(19, 3, 'sdsa', 'dsad', 'dsad@gmail.com', 'sdsad', 'dsads', '2025-12-04 12:44:25'),
(20, 3, 'kelly', 'alojepan', 'kellyydrhan@gmail.com', 'sdas', 'dsadasd', '2025-12-04 12:46:43'),
(21, 3, 'sdsad', 'dsad', 'dsad@gmail.com', 'dsad', 'dsad', '2025-12-04 12:47:33'),
(22, 3, 'sda', 'dsads', 'rhandyalojepan68@gmail.com', 'dsads', 'test feedback with js', '2025-12-04 13:25:09');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `description`, `price`, `image`, `category`) VALUES
(1, 'CapyCino Latte', 'Rich espresso with steamed milk and cute capybara foam art', 180.00, '../images/featured/capycino-latte.png', 'food'),
(2, 'Mudbath Mocha', 'Decadent dark chocolate mocha with whipped cream \"mud\"', 200.00, '../images/mudbath-mocha.png', 'food'),
(3, 'Riverbank Iced Coffee', 'Refreshing cold brew with a hint of mint and sweet cream', 160.00, '../images/riverbank-iced-coffee.png', 'food'),
(4, 'Leaf-Nibble Matcha', 'Ceremonial grade matcha latte. Capybara\'s favorite greens.', 190.00, '../images/featured/leaf-nibble-matcha.png', 'food'),
(5, 'Capy Buns', 'Two soft, sweet mini bread buns shaped like our mascot.', 120.00, '../images/featured/capybuns.png', 'food'),
(6, 'Capy Pancakes', 'Stacks of fluffy pancakes with drizzled butter and maple syrup.', 250.00, '../images/capy-pancakes.png', 'food'),
(7, 'Capy Plushie', 'Super soft, huggable capybara plushie. The ultimate chill companion.', 190.00, '../images/capy-plushie.png', 'merch'),
(8, 'KapiKapi Mug', 'Ceramic mug with our mascot. Perfect for your morning slow sips.', 400.00, '../images/capymug.png', 'merch'),
(9, 'Slow Sips Tote', 'Eco-friendly canvas tote bag for carrying your essentials.', 350.00, '../images/slow-sips-tote.png', 'merch');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `street_address` varchar(255) NOT NULL,
  `barangay` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `delivery_notes` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_name`, `quantity`, `price`, `total`, `street_address`, `barangay`, `city`, `province`, `zip_code`, `phone_number`, `delivery_notes`, `created_at`) VALUES
(1, 5, '0', 0, 0, 0, 'dsa', 'sd', 'sas', 'sdasd', '5208', '09321', 'SDAS', '2025-12-02 15:19:06'),
(2, 3, '0', 0, 0, 0, 'sdasd', 'sdas', 'sdas', 'sdasd', '5208', '092312', 'sdada', '2025-12-02 15:28:11'),
(3, 3, '0', 0, 0, 0, 'sdas', 'dsad', 'dsaddsad', 'dsad', '5028', '3423', 'sdasd', '2025-12-02 16:36:06'),
(4, 3, '0', 0, 0, 0, 'dsad', 'sdas', 'sads', 'sdas', '5208', '98231', 'sdsad', '2025-12-03 01:52:16'),
(5, 3, 'CapyCino Latte', 1, 180, 180, 'alimodia', 'sdas', 'xsdsd', 'das', '5208', '808323', 'JDSAKJFNSA', '2025-12-03 02:02:14'),
(6, 3, 'Mudbath Mocha', 1, 200, 200, 'SDA', 'SDAS', 'SDASD', 'DAS', '5208', '4212312', 'SSJSDA', '2025-12-03 02:02:43'),
(7, 3, 'Riverbank Iced Coffee', 1, 160, 160, 'SDASD', 'SDASD', 'SDASD', 'SDAS', '5208', '23213', 'sdasda', '2025-12-03 02:03:55'),
(8, 3, 'Capy Buns', 1, 120, 120, 'sdas', '231', 'das', 'wds', '5208', '5208', 'edfdsdm', '2025-12-03 02:06:25'),
(9, 3, 'CapyCino Latte', 1, 180, 180, 'test order', 'sdasd', 'sdasd', 'dasda', '5208', '23923912', 'sdsadkasdk\r\n\r\n', '2025-12-03 02:11:00'),
(10, 3, 'Mudbath Mocha', 1, 200, 200, 'test order final', 'sdasd', 'dasda', 'sdas', '5208', '9i9400', 'kdksljasd', '2025-12-03 02:12:32'),
(11, 3, 'CapyCino Latte', 1, 180, 180, 'sdasd', 'sdasd', 'sdasd', 'sdas', '5208', '0922', 'sdasd', '2025-12-03 02:21:01'),
(12, 3, 'Mudbath Mocha', 1, 200, 200, 'update js', 'sdsada', 'dsdas', 'sdasdasd', '5208', '090232', 'dsdasda', '2025-12-03 02:21:22'),
(13, 3, 'CapyCino Latte', 1, 180, 180, 'sdasd', 'sdasd', 'dasadsa', 'sdsads', '5208', 'sdasds', 'qsdas', '2025-12-03 02:24:57'),
(14, 3, 'Leaf-Nibble Match', 1, 190, 190, 'sdasd', 'sdasd', 'sdas', 'sdsads', '5208', '2321', 'sdasd', '2025-12-03 02:25:37'),
(15, 3, 'CapyCino Latte', 1, 180, 180, 'test popup', 'asda', 'sdas', 'dsad', '5206', 'sdas', 'sdas', '2025-12-03 02:27:07'),
(16, 3, 'CapyCino Latte', 1, 180, 180, 'dsad', 'sdas', 'sdsad', 'ssdasd', '5208', 'sdas', 'testing popup order', '2025-12-03 02:27:34'),
(17, 3, 'Mudbath Mocha', 1, 200, 200, 'dsa', 'sda', 'dsasda', 'sdasd', '5208', 'sdas', 'sdqsas', '2025-12-03 02:28:40'),
(18, 3, 'Mudbath Mocha', 1, 200, 200, 'sdsad', 'dsas', 'sd', 'sdsda', '5208', 'sds', 'sdassd', '2025-12-03 02:28:59'),
(19, 3, 'Mudbath Mocha', 1, 200, 200, 'test no user', 'das', 'dsad', 'sdasd', '5208', '2314340', 'sdfdfq', '2025-12-03 02:30:14'),
(20, 3, 'Mudbath Mocha', 1, 200, 200, 'sdasdsdas', 'sddas', 'sdas', 'dsdas', '5208', 'sdas', 'sdas', '2025-12-03 02:32:15'),
(21, 3, 'Mudbath Mocha', 1, 200, 200, 'sdasdsdas', 'sddas', 'sdas', 'dsdas', '5208', 'sdas', 'sdas', '2025-12-03 02:32:16'),
(22, 3, 'Mudbath Mocha', 1, 200, 200, 'sdsda', 'sdas', 'asdas', 'sdas', '5208', 'sdas', 'sdas', '2025-12-03 02:38:16'),
(23, 3, 'Mudbath Mocha', 1, 200, 200, 'sdas', 'sdasd', 'sdas', 'sdasda', '5208', '2312', 'sdas', '2025-12-03 02:38:40'),
(24, 3, 'KapiKapi Mug', 1, 400, 400, 'order merch', 'sdas', 'sdas', 'dsad', '5208', 'sdas', 'sdas', '2025-12-03 02:43:13'),
(25, 3, 'CapyCino Latte', 1, 180, 180, 'asda', 'sdas', 'sdas', 'sasd', '5208', 'sds', 'sdas', '2025-12-03 02:50:10'),
(26, 3, 'Mudbath Mocha', 1, 200, 200, 'sdas', 'sdad', 'sdas', 'sdsaa', '5208', '231', 'ssdasads', '2025-12-03 03:18:35'),
(27, 3, 'Mudbath Mocha', 1, 200, 200, 'sda', 'dsad', 'dsad', 'dsad', '5208', '2312', 'sdada', '2025-12-04 13:21:58'),
(28, 3, 'Riverbank Iced Coffee', 1, 160, 160, 'chingchong', 'sdasda', 'sdasd', 'sdsd', '5208', '23232', 'chingchong100', '2025-12-04 13:23:09'),
(29, 3, 'CapyCino Latte', 1, 180, 180, 'test address', 'sdasd', 'sdasd', 'sdas', '5208', '097097709', 'wdsad', '2025-12-08 15:49:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'kellu', '0', '0', '2025-12-01 18:41:18'),
(2, 'test', 'test@gmail.com', '$2y$10$aLzeOv5OCQ/yBxHcvVMzs.z6649Mayvc3uGKrJg226DOJsIHjyuhW', '2025-12-01 18:48:31'),
(3, 'ydrhan', 'ydrhan123@gmail.com', '$2y$10$j5YAUWRqZ4c44tugN2zaBOHe6B/JzWVlRkT9piZhGnrLhDwhztSaO', '2025-12-02 15:04:27'),
(4, 'hatdog', 'test123@gmail.com', '$2y$10$4FAkynvDJoai9s6Xh1zzpO9eSkpio.UESCR/mqtVE.hROVt1wHH/2', '2025-12-02 15:05:45'),
(5, 'arvin', 'arvin@gmail.com', '$2y$10$30Dbx929PuvhktP89V.ZZOOCao7xY.mZ5joOhpDYEVTueIvbkmgYm', '2025-12-02 15:08:38'),
(6, 'david', 'david@gmail.com', '$2y$10$S8GcMWj6ArXBiO/5aWkiDOfIof55JpzhEQBLcQY7cBPE9./lg5hiW', '2025-12-04 13:27:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_users` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
