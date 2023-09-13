-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2023 at 04:45 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffee`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(11) NOT NULL,
  `ad_name` varchar(100) NOT NULL,
  `ad_email` varchar(100) NOT NULL,
  `ad_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `ad_name`, `ad_email`, `ad_password`) VALUES
(1, 'Christian', 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `barista`
--

CREATE TABLE `barista` (
  `bar_id` int(11) NOT NULL,
  `bar_names` varchar(100) NOT NULL,
  `bar_email` varchar(200) NOT NULL,
  `bar_phone` varchar(30) NOT NULL,
  `bar_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barista`
--

INSERT INTO `barista` (`bar_id`, `bar_names`, `bar_email`, `bar_phone`, `bar_password`) VALUES
(1, 'CYEMEZO Aimable', 'cyemezoaimable@gmail.com', '0789999698', 'b24331b1a138cde62aa1f679164fc62f'),
(4, 'MWISENE Aimable', 'isaactumwine11@gmail.com', '0789999699', 'b24331b1a138cde62aa1f679164fc62f');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_icon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_icon`) VALUES
(1, 'Food', 'hamburger'),
(2, 'Drinks', 'wine-glass'),
(3, 'Breakfast', 'coffee');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `cli_id` int(11) NOT NULL,
  `cli_phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`cli_id`, `cli_phone`) VALUES
(3, '0789999694'),
(4, '0789999698');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `men_id` int(11) NOT NULL,
  `men_name` varchar(100) NOT NULL,
  `men_category` int(11) NOT NULL,
  `men_image` varchar(100) NOT NULL,
  `men_price` float NOT NULL,
  `men_details` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`men_id`, `men_name`, `men_category`, `men_image`, `men_price`, `men_details`) VALUES
(2, 'Banana', 1, 'images/uploads/64f8797fa8c32.jpg', 100, 'banana'),
(3, 'Juice Original', 2, 'images/uploads/64f87c4d04e58.jpg', 500, 'juice'),
(5, 'Fanta', 2, 'images/uploads/64f87d4968268.jpeg', 499, 'vew'),
(6, 'Smoothies', 2, 'images/uploads/64f87d70e0895.webp', 3434, 'f'),
(7, 'Beef', 1, 'images/uploads/64f87d97848ec.jpg', 6000, 'as');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ord_id` int(11) NOT NULL,
  `ord_menu` int(11) NOT NULL,
  `ord_table` int(11) NOT NULL,
  `ord_client` int(11) NOT NULL,
  `ord_time` varchar(100) NOT NULL,
  `ord_status` int(11) NOT NULL,
  `ord_barista` int(11) NOT NULL,
  `ord_quantity` int(11) NOT NULL,
  `ord_code` varchar(20) NOT NULL,
  `ord_isPick` int(11) NOT NULL,
  `ord_picktime` datetime NOT NULL,
  `ord_comment` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ord_id`, `ord_menu`, `ord_table`, `ord_client`, `ord_time`, `ord_status`, `ord_barista`, `ord_quantity`, `ord_code`, `ord_isPick`, `ord_picktime`, `ord_comment`) VALUES
(1, 2, 1, 4, '2023-09-06 16:41', 0, 0, 4, '20268', 0, '0000-00-00 00:00:00', 'ndashaka isosi'),
(2, 3, 1, 4, '2023-09-06 16:41', 0, 0, 1, '20268', 0, '0000-00-00 00:00:00', 'ndashaka isosi'),
(3, 5, 1, 4, '2023-09-06 16:41', 0, 0, 1, '20268', 0, '0000-00-00 00:00:00', 'ndashaka isosi'),
(4, 6, 1, 4, '2023-09-06 16:41', 0, 0, 2, '20268', 0, '0000-00-00 00:00:00', 'ndashaka isosi');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `tab_id` int(11) NOT NULL,
  `tab_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`tab_id`, `tab_name`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `barista`
--
ALTER TABLE `barista`
  ADD PRIMARY KEY (`bar_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`cli_id`),
  ADD UNIQUE KEY `cli_phone` (`cli_phone`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`men_id`),
  ADD KEY `men_image` (`men_image`),
  ADD KEY `category_fk` (`men_category`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ord_id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`tab_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barista`
--
ALTER TABLE `barista`
  MODIFY `bar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `cli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `men_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `tab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `category_fk` FOREIGN KEY (`men_category`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
