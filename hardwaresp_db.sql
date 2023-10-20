-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2023 at 02:50 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hardwaresp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `name`, `price`, `quantity`, `image`) VALUES
(4, 6, 'Intel® Core™ i5-6400', 120, 1, 'i5.jpg'),
(5, 7, 'Intel Core I7-9700K', 150, 5, 'i5.jpg'),
(6, 9, 'intel core i9-13900k', 900, 1, 'i9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `courier`
--

CREATE TABLE `courier` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courier`
--

INSERT INTO `courier` (`id`, `name`, `contact_number`, `email`, `address`, `status`) VALUES
(1, 'Guram', '578235', 'gurijajo@gmail.com', 'tbilisi', 'free'),
(2, 'gggg', '626292', 'g@gmail.com', 'vygfytytyt', 'busy');

-- --------------------------------------------------------

--
-- Table structure for table `login_history`
--

CREATE TABLE `login_history` (
  `id` int(100) NOT NULL,
  `admin_id` int(100) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_history`
--

INSERT INTO `login_history` (`id`, `admin_id`, `ip_address`, `login_time`) VALUES
(6, 8, '::1', '2023-06-13 11:52:23'),
(7, 2, '::1', '2023-06-13 12:07:19'),
(8, 0, '::1', '2023-06-15 10:58:24'),
(9, 2, '::1', '2023-06-16 10:20:43'),
(10, 2, '::1', '2023-06-16 10:27:32'),
(11, 2, '::1', '2023-06-16 10:35:50'),
(12, 2, '::1', '2023-06-16 10:36:56');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(1, 2, 'Guram', 'jajana17@gmail.com', '574596', 'please change my email to gurijajo@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(40) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending',
  `courier_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`, `courier_id`) VALUES
(1, 1, 'Guram', '010', 'gurijajo@gmail.com', 'credit card', 'flat no. 10, 1010, Tbilisi, s - 10101', ', cpu (1) , mother (1) ', 190, '13-Jun-2023', 'completed', 1),
(2, 4, 'giorgi', '5', 'giorgi@gmail.com', 'cash on delivery', 'flat no. 23, jfjfaj 23, jfjfj 23 , pakistan - 123', ', cpu (5) ', 600, '13-Jun-2023', 'completed', 2),
(3, 10, 'irakli', '598111575', '19200151@ibsu.edu.ge', 'cash on delivery', 'flat no. 22, me6mikro, tbilisi, georgia - 0107', ', intel core i9-13900k (1) ', 900, '15-Jun-2023', 'completed', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(2, 'Intel Core I7-9700K', 150, 'i5.jpg'),
(5, 'Intel® Core™ i5-6400', 120, 'i5.jpg'),
(6, 'Intel Core i3 10100', 310, 'i3.jpg'),
(7, 'AMD Ryzen 7 5700G', 450, 'ryzen7.jfif'),
(8, 'AMD Ryzen 5 3500X ', 540, 'amd.jpg'),
(9, 'intel core i9-13900k', 900, 'i9.jpg'),
(10, ' Intel Core i9-10900X', 880, 'i9x.jfif'),
(11, 'Asus Gaming B450-PLUS II', 320, 'mother asus.png'),
(12, 'Asus Prime B460-Plus', 270, 'asus.jpg'),
(13, 'Asus Prime Z690-A DDR5', 550, 'asus prime.png'),
(14, 'Colorful Battle-AX B760M', 445, 'colorful battle.png'),
(15, 'Gigabyte X670 Aorus', 900, 'auros.jpg'),
(16, 'PNY Geforce RTX 4080', 3750, 'rtx4080.jpg'),
(17, 'MSI RTX 3070', 1450, 'MSI RTX 3070.jpg'),
(18, 'EVGA GEFORCE GTX 1070', 500, '1070.jpg'),
(19, 'EVGA GEFORCE GTX770', 150, '70.jpg'),
(20, 'PNY GEFORCE GTX1660', 320, 'pny.png'),
(21, 'Dell Nvidia RTX 2070', 420, 'rtx 2070.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'Guram', 'gurijajo@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin'),
(2, 'Guram', 'jajana17@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin'),
(3, 'Lasha', '21100289@ibsu.edu.ge', '81dc9bdb52d04dc20036dbd8313ed055', 'admin'),
(4, 'giorgi', 'giorgi@gmail.com', '7838a4f260af2644e5703219bc3a94c5', 'user'),
(5, 'Gram', 'gl@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user'),
(6, 'Giorgi Ubiria', 'GU@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user'),
(7, 'sandro', 'jvarshe@gmail.com', '4297f44b13955235245b2497399d7a93', 'user'),
(8, 'Lasha', 'smilegames17@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'admin'),
(9, 'tamar', 'tamar123@gmail.com', '8e8e7cb3ddf8dbe77173c6ab6a8d3338', 'user'),
(10, 'irakli', '19200151@ibsu.edu.ge', '529965dc2e9e0112f7137dc0ed4434cc', 'user'),
(11, 'debil', 'debil@gmial.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courier`
--
ALTER TABLE `courier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_history`
--
ALTER TABLE `login_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courier_id` (`courier_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `courier`
--
ALTER TABLE `courier`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`courier_id`) REFERENCES `courier` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
