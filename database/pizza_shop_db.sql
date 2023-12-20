-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2023 at 07:14 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizza_shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(15) NOT NULL,
  `product_type` text NOT NULL,
  `product_name` text NOT NULL,
  `product_price` int(20) NOT NULL,
  `product_image` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_type`, `product_name`, `product_price`, `product_image`) VALUES
(1, 'pizza', 'Ham & Cheese', 89, 'ham-cheese.jpg'),
(2, 'pizza', 'Hawaiian', 95, 'hawaiian.jpg'),
(3, 'pizza', 'Bacon & Mushroom', 95, 'bacon-mushroom.jpg'),
(4, 'pizza', 'Ham & Bacon', 100, 'ham-bacon.jpg'),
(5, 'pizza', 'Beef & Mushroom', 105, 'beef-mushroom.jpg'),
(6, 'pizza', 'Hawaiian & Beef', 100, 'hawaiian-beef.jpg'),
(7, 'pizza', 'Nicolettes Special', 120, 'nicolettes-special.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(15) NOT NULL,
  `user_type` text NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `address` varchar(150) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `user_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `first_name`, `last_name`, `address`, `email`, `password`, `user_status`) VALUES
(1, 'admin', '', '', '', 'admin@admin.com', 'YWRtaW4=', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `user_cart`
--

CREATE TABLE `user_cart` (
  `cart_id` int(15) NOT NULL,
  `product_id` int(15) NOT NULL,
  `product_name` text NOT NULL,
  `product_price` int(15) NOT NULL,
  `product_image` text NOT NULL,
  `user_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `order_id` int(15) NOT NULL,
  `product_id` int(15) NOT NULL,
  `product_name` text NOT NULL,
  `product_price` int(15) NOT NULL,
  `product_quantity` int(15) NOT NULL,
  `product_image` text NOT NULL,
  `product_total_price` int(15) NOT NULL,
  `user_address` text NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_cart`
--
ALTER TABLE `user_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_cart`
--
ALTER TABLE `user_cart`
  MODIFY `cart_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `order_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
