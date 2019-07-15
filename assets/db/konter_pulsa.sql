-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2019 at 03:12 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `konter_pulsa`
--

-- --------------------------------------------------------

--
-- Table structure for table `credits`
--

CREATE TABLE `credits` (
  `id` int(11) NOT NULL,
  `operator_id` int(11) NOT NULL,
  `nominal` double NOT NULL,
  `price` double NOT NULL,
  `original_price` double NOT NULL,
  `creation_time` datetime NOT NULL,
  `modification_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credits`
--

INSERT INTO `credits` (`id`, `operator_id`, `nominal`, `price`, `original_price`, `creation_time`, `modification_time`) VALUES
(1, 1, 5000, 6000, 5500, '2019-07-14 09:08:13', '2019-07-14 09:08:13'),
(2, 1, 10000, 12000, 10200, '2019-07-14 09:09:07', '2019-07-14 09:09:07'),
(3, 1, 25000, 26000, 25100, '2019-07-14 09:09:07', '2019-07-14 09:09:07');

-- --------------------------------------------------------

--
-- Table structure for table `operators`
--

CREATE TABLE `operators` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `prefixs` varchar(250) NOT NULL,
  `creation_time` datetime NOT NULL,
  `modification_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operators`
--

INSERT INTO `operators` (`id`, `name`, `prefixs`, `creation_time`, `modification_time`) VALUES
(1, 'Axis', '0838,0831,0832,0833', '2019-07-14 00:00:00', '2019-07-14 00:00:00'),
(2, 'Ceria', '', '2019-07-14 00:00:00', '2019-07-14 00:00:00'),
(3, 'SmartFren', '', '2019-07-14 00:00:00', '2019-07-14 00:00:00'),
(4, 'Three', '', '2019-07-14 00:00:00', '2019-07-14 00:00:00'),
(5, 'XL Axiata', '0817,0818,0819,0859,0877,0878', '2019-07-14 00:00:00', '2019-07-14 00:00:00'),
(6, 'Matrix', '', '2019-07-14 00:00:00', '2019-07-14 00:00:00'),
(7, 'IM3', '0856, 0857', '2019-07-14 00:00:00', '2019-07-15 03:05:31'),
(8, 'Mentari', '', '2019-07-14 00:00:00', '2019-07-14 00:00:00'),
(9, 'Indosat M2', '', '2019-07-14 00:00:00', '2019-07-14 00:00:00'),
(10, 'Kartu Hallo', '', '2019-07-14 00:00:00', '2019-07-14 00:00:00'),
(11, 'Simpati', '', '2019-07-14 00:00:00', '2019-07-14 00:00:00'),
(12, 'Kartu As', '', '2019-07-14 00:00:00', '2019-07-14 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `operator_prefixs`
--

CREATE TABLE `operator_prefixs` (
  `id` int(11) NOT NULL,
  `operator_id` int(11) NOT NULL,
  `prefix` char(20) NOT NULL,
  `creation_time` datetime NOT NULL,
  `modification_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operator_prefixs`
--

INSERT INTO `operator_prefixs` (`id`, `operator_id`, `prefix`, `creation_time`, `modification_time`) VALUES
(1, 1, '0838', '2019-07-14 00:00:00', '2019-07-14 00:00:00'),
(2, 1, '0831', '2019-07-14 07:15:42', '2019-07-14 07:15:42'),
(3, 1, '0832', '2019-07-14 07:15:42', '2019-07-14 07:15:42'),
(4, 10, '0811', '2019-07-14 17:08:16', '2019-07-14 17:08:16'),
(5, 11, '0813', '2019-07-14 17:08:16', '2019-07-14 17:08:16'),
(10, 7, '0856', '2019-07-15 03:05:31', '2019-07-15 03:05:31'),
(11, 7, '0857', '2019-07-15 03:05:31', '2019-07-15 03:05:31');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `operator_id` int(11) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `nominal` double NOT NULL,
  `original_price` double NOT NULL,
  `price` double NOT NULL,
  `status` enum('pending','success','failed') NOT NULL,
  `creation_time` datetime NOT NULL,
  `modification_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `operator_id`, `phone_number`, `nominal`, `original_price`, `price`, `status`, `creation_time`, `modification_time`) VALUES
(4, 1, '083821230256', 10000, 10200, 12000, 'success', '2019-07-15 01:49:42', '2019-07-15 01:49:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(260) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_phone` varchar(100) DEFAULT NULL,
  `foto` varchar(50) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `creation_time` datetime NOT NULL,
  `modification_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `email`, `mobile_phone`, `foto`, `level`, `creation_time`, `modification_time`) VALUES
(1, 'Ali Khanafi', 'admin', '$2y$10$ePhNZJhNHceen8xMlSTo2OG3fqvZ5xzESyKIk2d3EylYu7P6CV54e', 'iqbalrizqipurnama@gmail.com', '08989898989', 'avatar5.png', '', '2019-03-03 00:00:00', '2019-07-14 03:33:05'),
(2, 'Wewen Nurwendi I', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'wewen.nurwendi@gmail.com', '08989898989', 'avatar5.png', 'user', '2019-03-03 00:00:00', '2019-03-03 18:33:52'),
(5, 'Hai User I', 'hai', '$2y$10$YI3/wsAGgfOn1VUVApjpIOfA6z1DFs3DigDXGbI/BFgBnG6AUkSYK', 'haiuser@gmail.com', '089898978', '', 'user', '0000-00-00 00:00:00', '2019-03-09 10:31:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `credits`
--
ALTER TABLE `credits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_credit_operator` (`operator_id`);

--
-- Indexes for table `operators`
--
ALTER TABLE `operators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operator_prefixs`
--
ALTER TABLE `operator_prefixs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_prefix_operator` (`operator_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_transaction_operator` (`operator_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `credits`
--
ALTER TABLE `credits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `operators`
--
ALTER TABLE `operators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `operator_prefixs`
--
ALTER TABLE `operator_prefixs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `credits`
--
ALTER TABLE `credits`
  ADD CONSTRAINT `fk_credit_operator` FOREIGN KEY (`operator_id`) REFERENCES `operators` (`id`) ON UPDATE NO ACTION;

--
-- Constraints for table `operator_prefixs`
--
ALTER TABLE `operator_prefixs`
  ADD CONSTRAINT `fk_prefix_operator` FOREIGN KEY (`operator_id`) REFERENCES `operators` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `fk_transaction_operator` FOREIGN KEY (`operator_id`) REFERENCES `operators` (`id`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
