-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2024 at 11:27 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sample_network`
--

-- --------------------------------------------------------

--
-- Table structure for table `invalid_click`
--

CREATE TABLE `invalid_click` (
  `id` bigint(20) NOT NULL,
  `ip` text DEFAULT NULL,
  `click_count` int(11) DEFAULT NULL,
  `local_time_stamp` text DEFAULT NULL,
  `server_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invalid_click`
--

INSERT INTO `invalid_click` (`id`, `ip`, `click_count`, `local_time_stamp`, `server_date`) VALUES
(1, '::1', 1, '1732716849068', '2024-11-27'),
(2, '::1', 1, '1732716859508', '2024-11-27'),
(3, '::1', 1, '1732716873276', '2024-11-27'),
(4, '::1', 1, '1732717150213', '2024-11-27'),
(5, '::1', 1, '1732717210372', '2024-11-27');

-- --------------------------------------------------------

--
-- Table structure for table `suspected_ip`
--

CREATE TABLE `suspected_ip` (
  `id` int(11) NOT NULL,
  `ip` text NOT NULL,
  `server_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suspected_ip`
--

INSERT INTO `suspected_ip` (`id`, `ip`, `server_date`) VALUES
(1, '::1', '2024-11-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invalid_click`
--
ALTER TABLE `invalid_click`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suspected_ip`
--
ALTER TABLE `suspected_ip`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invalid_click`
--
ALTER TABLE `invalid_click`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `suspected_ip`
--
ALTER TABLE `suspected_ip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
