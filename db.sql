-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2026 at 03:31 PM
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
-- Database: `admeals`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_price` decimal(10,0) NOT NULL,
  `item_count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `vendor_id`, `item_name`, `item_price`, `item_count`) VALUES
(1, 1, 'Yupi (Assorted)', 1000, 0),
(2, 1, 'Milkita (Assorted)', 2000, 0),
(3, 1, 'Choki-Choki', 2000, 0),
(4, 1, 'Oreo Mini', 3000, 0),
(5, 1, 'Good Time Mini', 3000, 0),
(6, 1, 'Beng-Beng', 3000, 0),
(7, 1, 'Choco Chip', 3000, 0),
(8, 1, 'Slai Olai (Assorted)', 3000, 0),
(9, 1, 'Prima Mineral Water (600ml)', 3000, 0),
(10, 1, 'Teh Pucuk', 4000, 0),
(11, 1, 'Mizone (Assorted)', 5000, 0),
(12, 1, 'Fruit Tea (Assorted)', 5000, 0),
(13, 1, 'Tao Kae Noi Big Sheet', 5000, 0),
(14, 1, 'Risol (Mayo)', 5000, 0),
(15, 1, 'Risol (Pizza)', 5000, 0),
(16, 1, 'Risol (Veggies)', 5000, 0),
(17, 1, 'Pastel (Potato Filled)', 5000, 0),
(18, 1, 'Ultra Milk (Assorted)', 6000, 0),
(19, 1, 'Sariroti Sandwich (Assorted)', 6000, 0),
(20, 1, 'Sarikue Dorayaki (Assorted)', 6000, 0),
(21, 1, 'Cimory UHT (Assorted)', 7000, 0),
(22, 1, 'Mamasuka Seaweed', 7000, 0),
(23, 1, 'Chocolate Muffin', 7000, 0),
(24, 1, 'Cheese Muffin', 7000, 0),
(25, 1, 'Sprite', 7000, 0),
(26, 1, 'CocaCola', 7000, 0),
(27, 1, 'Fanta (Strawberry)', 7000, 0),
(28, 1, 'Good Day Coffee (Assorted)', 8000, 0),
(29, 1, 'NesCafe Latte UHT', 8000, 0),
(30, 1, 'Coco Beverage (Assorted)', 8000, 0),
(31, 1, 'Kebab', 10000, 0),
(32, 1, 'Cha-Cha Mini Tube', 10000, 0),
(33, 2, 'Nasi', 5000, 0),
(34, 2, 'Nasi Kuning', 5000, 0),
(35, 2, 'Telur Balado', 5000, 0),
(36, 2, 'Telur Goreng', 5000, 0),
(37, 2, 'Telur Dadar', 5000, 0),
(38, 2, 'Martabak Telur', 5000, 0),
(39, 2, 'Telur Mie', 5000, 0),
(40, 2, 'Sosis', 5000, 0),
(41, 2, 'Sosis Mie', 5000, 0),
(42, 2, 'Tempe Orek', 5000, 0),
(43, 2, 'Pisang Coklat (3pcs)', 5000, 0),
(44, 2, 'Cumi Pedas', 5000, 0),
(45, 2, 'Ayam Popcorn Bawang', 5000, 0),
(46, 2, 'Kulit Goreng', 5000, 0),
(47, 2, 'Ikan Goreng', 5000, 0),
(48, 2, 'Mie Goreng', 5000, 0),
(49, 2, 'Kwetiau Goreng', 5000, 0),
(50, 2, 'Sosis Asam Manis', 5000, 0),
(51, 2, 'Tumis Kangkung', 5000, 0),
(52, 3, 'Bakmi Ayam', 20000, 0),
(53, 3, 'Bakmi Ayam (Dengan Pangsit)', 22000, 0),
(54, 4, 'Gorengan (Assorted)', 2000, 0),
(55, 4, 'Sate (Assorted)', 3000, 0),
(56, 4, 'Soto Ayam', 10000, 0),
(57, 4, 'Soto Daging', 10000, 0),
(58, 4, 'Nasi Bakar Isi Ayam', 8000, 0),
(59, 4, 'Nasi Bakar Isi Cumi', 12000, 0),
(60, 4, 'Nasi Bakar Isi Ikan Teri', 8000, 0),
(61, 4, 'Ricebowl', 10000, 0),
(62, 5, 'Siomay', 2500, 0),
(63, 5, 'Batagor', 2500, 0),
(64, 5, 'Pare', 2500, 0),
(65, 5, 'Tahu Putih', 2500, 0),
(66, 5, 'Tahu Coklat', 2500, 0),
(67, 5, 'Pangsit Kukus', 2500, 0),
(68, 5, 'Pangsit Goreng', 2500, 0),
(69, 5, 'Cireng', 2500, 0),
(70, 5, 'Otak-otak', 2500, 0),
(71, 5, 'Add-on Kuah', 0, 0),
(72, 6, 'Kentang Goreng (Cup/Box)', 5000, 0),
(73, 6, 'Pao (Assorted)', 5000, 0),
(74, 6, 'Dimsum Mini (2 Pcs)', 5000, 0),
(75, 6, 'Mie Goreng (Cup/Box)', 5000, 0),
(76, 6, 'Jasuke', 5000, 0),
(77, 6, 'Popcorn Caramel', 5000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `order_status` varchar(15) NOT NULL,
  `order_time` datetime NOT NULL,
  `payment_method` varchar(15) NOT NULL,
  `order_note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `google` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `username`, `email`, `password`, `google`) VALUES
(1, 'test@test', 'test@test', '$2y$10$uq356EJEd.J1dIWrUZcEreECs4Vs/5LCGYh6MfSYTtwRGF.3ajBJO', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_id` int(11) NOT NULL,
  `vendor_name` varchar(50) NOT NULL,
  `vendor_email` varchar(255) DEFAULT NULL,
  `vendor_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `vendor_name`, `vendor_email`, `vendor_active`) VALUES
(1, 'Kantin Momoy', NULL, 1),
(2, 'Ayam Geprek Bu Win', NULL, 1),
(3, 'Centra Noodle', NULL, 1),
(4, 'Dapur Qita', NULL, 1),
(5, 'Siomay Pa Komeng', NULL, 1),
(6, 'Kantin Rose', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
