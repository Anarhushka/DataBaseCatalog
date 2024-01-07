-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2024 at 04:20 PM
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
-- Database: `catalog`
--

-- --------------------------------------------------------

--
-- Table structure for table `oorder`
--

CREATE TABLE `oorder` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `postal_index` int(20) NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oorder`
--

INSERT INTO `oorder` (`id`, `user_id`, `postal_index`, `order_status`, `data`) VALUES
(3, 2, 14005, 'processed', '2023-12-04'),
(4, 3, 14000, 'in delivery', '2023-12-05'),
(5, 5, 5005, 'in delivery', '2023-12-10'),
(6, 6, 14010, 'processed', '2023-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `product_price` double NOT NULL,
  `review` varchar(2000) NOT NULL,
  `product_status` varchar(100) NOT NULL,
  `shop_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `product_price`, `review`, `product_status`, `shop_id`) VALUES
(5, 'Keyboard', 1500, 'Keychron C1 wire mechanical keyboard type-c, keyboardless layout for Mac Windows iOS.', 'in stock', 111),
(6, 'Laptop Lenovo Y530', 15000, 'Laptop Lenovo Y530 - power and power', 'in stock', 11),
(7, 'Green Tea \"Gunpowder\"', 55, 'Зеленый чай Julius Meinl green tea Gunpowder Ганпаудер 100г – Чай “Зеленый Порох” скрученый оригинальным способом, внешне напоминающий порох. Специальная обработка чайного листа придает настою насыщенный крепкий и свежий вкус.\r\n\r\nУпаковка: 100 г в фольгированном пакете.\r\n\r\nЧай “Зеленый Порох” скрученный оригинальным способом, внешне напоминающий порох. Специальная обработка чайного листа придает настою насыщенный крепкий и свежий вкус.', 'in stock', 111),
(8, 'Green Tea \"Jasmine\"', 45, '\r\nУпаковка: 100 г в фольгированном пакете.\r\n\r\nЧай “Жасмин” скрученный оригинальным способом, внешне напоминающий порох. Специальная обработка чайного листа придает настою насыщенный крепкий и свежий вкус.', 'out of stock', 111),
(9, 'Acer Nitro 5', 20000, 'Acer Nitro 5 3070 - power and power', 'in stock', 11),
(13, 'Mikasa v330', 2600, 'best ball', 'in stock', 114),
(14, 'Mikasa v220', 2300, 'best ball for outside game', 'in stock', 114);

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

CREATE TABLE `product_order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_order`
--

INSERT INTO `product_order` (`id`, `product_id`, `order_id`) VALUES
(1, 5, 3),
(2, 5, 3),
(3, 6, 3),
(4, 7, 4),
(8, 13, 6),
(9, 14, 6);

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site` varchar(500) NOT NULL,
  `city` varchar(100) NOT NULL,
  `rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `site`, `city`, `rating`) VALUES
(11, 'ITshop.com', 'Kyiv', 4.2),
(111, 'XXXshop.com', 'Chernihiv', 3.8),
(114, 'sportXbest.com', 'Lviv', 3.6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `phone_number` int(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `adress` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `phone_number`, `email`, `adress`) VALUES
(2, 'Daniil', 98123123, 'Anarhushka@gmail.com', 'Kyiv'),
(3, 'Roman', 14124124, 'RomaGeek2005@gmail.com', 'Chernihiv'),
(4, 'Victor', 53543, 'ExtraHard@gmail.com', 'Chernihiv'),
(5, 'Vika', 423544, 'jenxqqqq@gmail.com', 'Kyiv'),
(6, 'Andrew', 77777, 'pipsqeak@gmail.com', 'Chernihiv');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `oorder`
--
ALTER TABLE `oorder`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `shop_id` (`shop_id`);

--
-- Indexes for table `product_order`
--
ALTER TABLE `product_order`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `product_id` (`product_id`,`order_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `oorder`
--
ALTER TABLE `oorder`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product_order`
--
ALTER TABLE `product_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `oorder`
--
ALTER TABLE `oorder`
  ADD CONSTRAINT `oorder_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`shop_id`) REFERENCES `shop` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_order`
--
ALTER TABLE `product_order`
  ADD CONSTRAINT `product_order_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `oorder` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_order_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
