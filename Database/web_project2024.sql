-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2024 at 05:55 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_project2024`
--

-- --------------------------------------------------------

--
-- Table structure for table `base`
--

CREATE TABLE `base` (
  `product_id` int(5) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_category` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `detail_name` varchar(50) NOT NULL,
  `detail_value` float NOT NULL,
  `product_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `diasostis`
--

CREATE TABLE `diasostis` (
  `Diasostis_Id` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Pass` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `diaxiristis`
--

CREATE TABLE `diaxiristis` (
  `Diaxiristis_Id` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Pass` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `First_name` varchar(50) NOT NULL,
  `Last_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `oxima`
--

CREATE TABLE `oxima` (
  `license_plate` int(10) NOT NULL,
  `Drivers_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `oxima_inventory`
--

CREATE TABLE `oxima_inventory` (
  `items_name` varchar(50) NOT NULL,
  `items_ammount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `politis`
--

CREATE TABLE `politis` (
  `Politis_Id` int(11) NOT NULL,
  `First_name` varchar(50) NOT NULL,
  `Last_name` varchar(50) NOT NULL,
  `Phone_number` int(20) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `detail_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `detail_name` varchar(255) NOT NULL,
  `detail_value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `Politis_firstname` varchar(50) NOT NULL,
  `Politis_lastname` varchar(50) NOT NULL,
  `Phonenum_politis` int(20) NOT NULL,
  `Date_of_sumbit` date NOT NULL,
  `items_name` varchar(50) NOT NULL,
  `items_ammount` int(100) NOT NULL,
  `kind_of_request` enum('prosfora','aitima') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `role` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `role`, `username`, `password`, `email`) VALUES
(20, 'admin', 'sotiris', 'sotiris', NULL),
(22, 'diasostis', 'diasostis', '1234', NULL),
(23, 'politis', 'politis', 'politis', NULL),
(24, 'diasostis', '1234', '1234', NULL),
(25, 'politis', '1', '1', NULL),
(26, 'diasostis', 'diasostis2', '1234', NULL),
(27, 'diasostis', 'dias', 'dias', NULL),
(28, 'politis', '1111', '1111', NULL),
(29, 'politis', 'wqe', 'wqe', NULL),
(30, 'politis', 'ilias', '1234', NULL),
(31, 'diasostis', 'ilias0', '1234', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `base`
--
ALTER TABLE `base`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `diasostis`
--
ALTER TABLE `diasostis`
  ADD PRIMARY KEY (`Diasostis_Id`);

--
-- Indexes for table `diaxiristis`
--
ALTER TABLE `diaxiristis`
  ADD PRIMARY KEY (`Diaxiristis_Id`);

--
-- Indexes for table `oxima`
--
ALTER TABLE `oxima`
  ADD PRIMARY KEY (`license_plate`);

--
-- Indexes for table `politis`
--
ALTER TABLE `politis`
  ADD PRIMARY KEY (`Politis_Id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diasostis`
--
ALTER TABLE `diasostis`
  MODIFY `Diasostis_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diaxiristis`
--
ALTER TABLE `diaxiristis`
  MODIFY `Diaxiristis_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `politis`
--
ALTER TABLE `politis`
  MODIFY `Politis_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `base` (`product_id`);

--
-- Constraints for table `product_details`
--
ALTER TABLE `product_details`
  ADD CONSTRAINT `product_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
