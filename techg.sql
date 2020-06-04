-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2020 at 02:28 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techg`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(6) NOT NULL,
  `name` varchar(40) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `parent` int(6) DEFAULT NULL,
  `published` tinyint(1) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `type`, `parent`, `published`, `created`, `modified`) VALUES
(2, 'Men', 1, NULL, 1, '2020-06-04 11:54:20', NULL),
(3, 'Footwear', 2, 2, 1, '2020-06-04 11:54:20', NULL),
(4, 'watches', 2, 2, 1, '2020-06-04 11:54:20', NULL),
(5, 'women', 1, NULL, 1, '2020-06-04 11:54:20', NULL),
(6, 'Footwear', 2, 5, 1, '2020-06-04 11:54:20', NULL),
(7, 'watches', 2, 5, 1, '2020-06-04 11:54:20', NULL),
(8, 'sport shoes ', 3, 3, 1, '2020-06-04 11:54:20', NULL),
(9, 'sport shoes ', 3, 6, 1, '2020-06-04 11:54:20', NULL),
(10, 'formal shoes ', 3, 3, 1, '2020-06-04 11:54:20', NULL),
(11, 'formal shoes', 3, 6, 1, '2020-06-04 11:54:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(6) NOT NULL,
  `name` varchar(60) NOT NULL,
  `category` int(6) NOT NULL,
  `published` tinyint(1) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `category`, `published`, `created`, `modified`) VALUES
(2, 'Sports shoes/Casual shoes/Walking Shoes/Gym shoes/Running sh', 8, 1, '2020-06-04 12:02:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_data`
--

CREATE TABLE `product_data` (
  `id` int(11) NOT NULL,
  `pkey` varchar(100) NOT NULL,
  `pvalue` varchar(400) DEFAULT NULL,
  `published` tinyint(1) NOT NULL,
  `product` int(6) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_data`
--

INSERT INTO `product_data` (`id`, `pkey`, `pvalue`, `published`, `product`, `title`, `type`) VALUES
(1, 'Product Description', 'Sports shoes/Casual shoes/Walking Shoes/Gym shoes/Running shoes/Cricket shoes For Men  (Black)', 1, 2, 'Product Description', 1),
(2, 'Color', 'Black', 1, 2, 'Product Details', 2),
(3, 'Outer Material', 'Mesh', 1, 2, 'Product Details', 2),
(4, 'Model Name', 'Sports shoes/Casual shoes/Walking Shoes/Gym shoes/Running shoes/Cricket shoes', 1, 2, 'Product Details', 2),
(5, 'Packed by', 'H.NO.25 NEW HIMACHAL COLONY DEORI ROAD UKHARRAH ROAD AGRA 282001', 1, 2, 'Manufacturing, Packaging and Import Info', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(6) NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(60) DEFAULT NULL,
  `profile_url` varchar(255) DEFAULT NULL,
  `published` tinyint(1) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category_parent` (`parent`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `product_data`
--
ALTER TABLE `product_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_data`
--
ALTER TABLE `product_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `fk_category_parent` FOREIGN KEY (`parent`) REFERENCES `category` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `category` FOREIGN KEY (`category`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
