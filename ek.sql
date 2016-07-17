-- phpMyAdmin SQL Dump
-- version 4.4.15.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 17, 2016 at 09:48 AM
-- Server version: 5.5.44-MariaDB
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ek`
--
CREATE DATABASE IF NOT EXISTS `ek` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ek`;

-- --------------------------------------------------------

--
-- Table structure for table `docs`
--

CREATE TABLE IF NOT EXISTS `docs` (
  `id` int(255) NOT NULL,
  `user_id` varchar(1000) NOT NULL,
  `doc_name` varchar(1000) NOT NULL,
  `path` varchar(1000) NOT NULL,
  `date` varchar(1000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `docs`
--

INSERT INTO `docs` (`id`, `user_id`, `doc_name`, `path`, `date`) VALUES
(1, '1', 'CNIC (front)', '/docs/1.cnic_front.jpg', '2016-07-17 12:00:00'),
(2, '1', 'CNIC (back)', '/docs/1.cnic_back.jpg', '2016-07-17 12:00:00'),
(3, '1', 'cnic_front', '1.cnic_front.jpg', '2016-07-17 14:27:23'),
(4, '1', 'graduation_certificate', '/docs/1.graduation_certificate.jpg', '2016-07-17 14:31:47');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(255) NOT NULL,
  `msisdn` varchar(1000) NOT NULL,
  `auth_code` varchar(1000) NOT NULL,
  `doc` varchar(1000) NOT NULL,
  `date` varchar(1000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `msisdn`, `auth_code`, `doc`, `date`) VALUES
(2, '03455003289', '95055', 'Bd', '2016-07-17 11:46:23'),
(3, '03455003289', '63152', 'Hd', '2016-07-17 11:50:07'),
(4, '03455003289', '53777', 'Cnic', '2016-07-17 11:54:23'),
(5, '03455003289', '95779', 'Matric', '2016-07-17 12:15:09'),
(6, '03155481501', '52099', 'Test', '2016-07-17 13:03:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `msisdn` varchar(1000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `msisdn`) VALUES
(1, 'ek', 'ek', '03455003289');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `docs`
--
ALTER TABLE `docs`
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_3` (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD UNIQUE KEY `id_3` (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `docs`
--
ALTER TABLE `docs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
