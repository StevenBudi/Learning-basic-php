-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 28, 2021 at 10:08 AM
-- Server version: 5.7.34-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservation_customer`
--

CREATE TABLE `reservation_customer` (
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_phone` varchar(15) DEFAULT NULL,
  `reservation_people` int(11) NOT NULL,
  `reservation_time` datetime NOT NULL,
  `reservation_note` text,
  `customer_token` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation_customer`
--

INSERT INTO `reservation_customer` (`customer_name`, `customer_email`, `customer_phone`, `reservation_people`, `reservation_time`, `reservation_note`, `customer_token`) VALUES
('John Doe', 'john.doe@gmail.com', '', 2, '2021-05-29 10:00:00', '', '4a6f686e20446f65'),
('John Doe2', 'john.doe@gmail.com', '', 2, '2021-05-29 20:00:00', '', '4a6f686e20446f6532'),
('John Doe3', 'john.doe@gmail.com', '', 6, '2021-05-29 20:00:00', '', '4a6f686e20446f6533'),
('John Doe4', 'john.doe@gmail.com', '', 6, '2021-05-29 10:00:00', '', '4a6f686e20446f6534'),
('John Doe5', 'john.doe@gmail.com', '', 10, '2021-05-29 20:00:00', '', '4a6f686e20446f6535'),
('John Doe6', 'john.doe@gmail.com', '', 4, '2021-05-29 13:00:00', '', '4a6f686e20446f6536'),
('John Doe7', 'john.doe@gmail.com', '', 6, '2021-05-29 19:00:00', '', '4a6f686e20446f6537');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_detail`
--

CREATE TABLE `reservation_detail` (
  `reservation_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `table_id` varchar(4) NOT NULL,
  `status` enum('reserved','check-in','check-out') NOT NULL DEFAULT 'reserved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation_detail`
--

INSERT INTO `reservation_detail` (`reservation_id`, `customer_name`, `table_id`, `status`) VALUES
(1, 'John Doe', 'A001', 'reserved'),
(2, 'John Doe2', 'A002', 'reserved'),
(3, 'John Doe3', 'B009', 'reserved'),
(4, 'John Doe4', 'B010', 'reserved'),
(5, 'John Doe5', 'C004', 'reserved'),
(6, 'John Doe6', 'A007', 'reserved'),
(7, 'John Doe7', 'C001', 'reserved');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_table`
--

CREATE TABLE `restaurant_table` (
  `id` varchar(4) NOT NULL,
  `capacity` int(11) NOT NULL,
  `availability` enum('true','false') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurant_table`
--

INSERT INTO `restaurant_table` (`id`, `capacity`, `availability`) VALUES
('A001', 2, 'false'),
('A002', 2, 'false'),
('A003', 2, 'true'),
('A004', 2, 'true'),
('A005', 2, 'true'),
('A006', 2, 'true'),
('A007', 4, 'false'),
('A008', 4, 'true'),
('B001', 4, 'true'),
('B002', 4, 'true'),
('B003', 4, 'true'),
('B004', 4, 'true'),
('B005', 4, 'true'),
('B006', 2, 'true'),
('B007', 2, 'true'),
('B008', 2, 'true'),
('B009', 6, 'false'),
('B010', 6, 'false'),
('C001', 6, 'false'),
('C002', 6, 'true'),
('C003', 6, 'true'),
('C004', 10, 'false'),
('C005', 10, 'true'),
('C006', 10, 'true'),
('C007', 10, 'true'),
('C008', 10, 'true'),
('C009', 10, 'true'),
('C010', 10, 'true');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservation_customer`
--
ALTER TABLE `reservation_customer`
  ADD PRIMARY KEY (`customer_name`) USING BTREE,
  ADD UNIQUE KEY `customer_token` (`customer_token`);

--
-- Indexes for table `reservation_detail`
--
ALTER TABLE `reservation_detail`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `customer_name` (`customer_name`),
  ADD KEY `table_id` (`table_id`);

--
-- Indexes for table `restaurant_table`
--
ALTER TABLE `restaurant_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservation_detail`
--
ALTER TABLE `reservation_detail`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation_detail`
--
ALTER TABLE `reservation_detail`
  ADD CONSTRAINT `reservation_detail_ibfk_1` FOREIGN KEY (`table_id`) REFERENCES `restaurant_table` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `reservation_detail_ibfk_2` FOREIGN KEY (`customer_name`) REFERENCES `reservation_customer` (`customer_name`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
