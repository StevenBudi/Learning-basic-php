-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 08, 2021 at 01:38 PM
-- Server version: 5.7.34-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pertemuan14`
--

-- --------------------------------------------------------

--
-- Table structure for table `ch`
--

CREATE TABLE `ch` (
  `id_ch` int(20) NOT NULL,
  `id_pos` int(3) NOT NULL,
  `nilai` double NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ch`
--

INSERT INTO `ch` (`id_ch`, `id_pos`, `nilai`, `waktu`) VALUES
(14, 1, 0.1, '2018-09-12 16:00:00'),
(15, 1, 0.1, '2018-09-12 16:10:00'),
(16, 1, 0.4, '2018-09-12 16:20:00'),
(17, 1, 0.5, '2018-09-12 16:30:00'),
(18, 1, 0.7, '2018-09-12 16:40:00'),
(19, 1, 1.1, '2018-09-12 16:50:00'),
(20, 1, 1, '2018-09-12 17:00:00'),
(21, 1, 0.8, '2018-09-12 17:10:00'),
(22, 1, 1, '2018-09-12 17:20:00'),
(23, 1, 1, '2018-09-12 17:30:00'),
(24, 1, 0.8, '2018-09-12 17:40:00'),
(25, 1, 1.1, '2018-09-12 17:50:00'),
(26, 1, 1.5, '2018-09-12 18:00:00'),
(27, 1, 1.4, '2018-09-12 18:10:00'),
(28, 1, 1.3, '2018-09-12 18:20:00'),
(29, 1, 1.1, '2018-09-12 18:30:00'),
(30, 1, 0.7, '2018-09-12 18:40:00'),
(31, 1, 0.5, '2018-09-12 19:00:00'),
(32, 1, 0.4, '2018-09-12 19:10:00'),
(33, 1, 0.7, '2018-09-12 19:20:00'),
(34, 1, 0.8, '2018-09-12 19:30:00'),
(35, 1, 0.9, '2018-09-12 19:40:00'),
(36, 1, 0.7, '2018-09-12 19:50:00'),
(37, 1, 1.1, '2018-09-12 20:00:00'),
(38, 1, 1.3, '2018-09-12 20:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `kekeruhan`
--

CREATE TABLE `kekeruhan` (
  `id_kekeruhan` int(20) NOT NULL,
  `id_pos` int(3) NOT NULL,
  `nilai` double NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kekeruhan`
--

INSERT INTO `kekeruhan` (`id_kekeruhan`, `id_pos`, `nilai`, `waktu`) VALUES
(51, 1, 50, '2018-09-12 16:00:00'),
(52, 1, 51, '2018-09-12 16:10:00'),
(53, 1, 54, '2018-09-12 16:20:00'),
(54, 1, 53, '2018-09-12 16:30:00'),
(55, 1, 53, '2018-09-12 16:40:00'),
(56, 1, 54, '2018-09-12 16:50:00'),
(57, 1, 52, '2018-09-12 17:00:00'),
(58, 1, 50, '2018-09-12 17:10:00'),
(59, 1, 51, '2018-09-12 17:20:00'),
(60, 1, 51, '2018-09-12 17:30:00'),
(61, 1, 52, '2018-09-12 17:40:00'),
(62, 1, 52, '2018-09-12 17:50:00'),
(63, 1, 53, '2018-09-12 18:00:00'),
(64, 1, 54, '2018-09-12 18:10:00'),
(65, 1, 53, '2018-09-12 18:20:00'),
(66, 1, 56, '2018-09-12 18:30:00'),
(67, 1, 55, '2018-09-12 18:40:00'),
(68, 1, 52, '2018-09-12 19:00:00'),
(69, 1, 56, '2018-09-12 19:10:00'),
(70, 1, 56, '2018-09-12 19:20:00'),
(71, 1, 56, '2018-09-12 19:30:00'),
(72, 1, 52, '2018-09-12 19:40:00'),
(73, 1, 57, '2018-09-12 19:50:00'),
(74, 1, 55, '2018-09-12 20:00:00'),
(75, 1, 55, '2018-09-12 20:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `tma`
--

CREATE TABLE `tma` (
  `id_tma` int(20) NOT NULL,
  `id_pos` int(3) NOT NULL,
  `nilai` double NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tma`
--

INSERT INTO `tma` (`id_tma`, `id_pos`, `nilai`, `waktu`) VALUES
(132, 1, 46, '2018-09-12 16:00:00'),
(133, 1, 46.1, '2018-09-12 16:10:00'),
(134, 1, 45.6, '2018-09-12 16:20:00'),
(135, 1, 45.2, '2018-09-12 16:30:00'),
(136, 1, 44.1, '2018-09-12 16:40:00'),
(137, 1, 46.1, '2018-09-12 16:50:00'),
(138, 1, 45, '2018-09-12 17:00:00'),
(139, 1, 45.2, '2018-09-12 17:10:00'),
(140, 1, 44, '2018-09-12 17:20:00'),
(141, 1, 44, '2018-09-12 17:30:00'),
(142, 1, 44.8, '2018-09-12 17:40:00'),
(143, 1, 45.1, '2018-09-12 17:50:00'),
(144, 1, 44.3, '2018-09-12 18:00:00'),
(145, 1, 44, '2018-09-12 18:10:00'),
(146, 1, 43.8, '2018-09-12 18:20:00'),
(147, 1, 43.7, '2018-09-12 18:30:00'),
(148, 1, 43.9, '2018-09-12 18:40:00'),
(149, 1, 43.9, '2018-09-12 19:00:00'),
(150, 1, 43.4, '2018-09-12 19:10:00'),
(151, 1, 43.7, '2018-09-12 19:20:00'),
(152, 1, 43.8, '2018-09-12 19:30:00'),
(153, 1, 43.9, '2018-09-12 19:40:00'),
(154, 1, 43.7, '2018-09-12 19:50:00'),
(155, 1, 41.1, '2018-09-12 20:00:00'),
(156, 1, 43.3, '2018-09-12 20:10:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ch`
--
ALTER TABLE `ch`
  ADD PRIMARY KEY (`id_ch`);

--
-- Indexes for table `kekeruhan`
--
ALTER TABLE `kekeruhan`
  ADD PRIMARY KEY (`id_kekeruhan`);

--
-- Indexes for table `tma`
--
ALTER TABLE `tma`
  ADD PRIMARY KEY (`id_tma`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ch`
--
ALTER TABLE `ch`
  MODIFY `id_ch` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `kekeruhan`
--
ALTER TABLE `kekeruhan`
  MODIFY `id_kekeruhan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `tma`
--
ALTER TABLE `tma`
  MODIFY `id_tma` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
