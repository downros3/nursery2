-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2018 at 01:12 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nursery2`
--

-- --------------------------------------------------------

--
-- Table structure for table `feeds`
--

CREATE TABLE `feeds` (
  `f_id` int(11) NOT NULL,
  `f_name` varchar(50) DEFAULT NULL,
  `f_email` varchar(30) DEFAULT NULL,
  `f_feeds` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feeds`
--

INSERT INTO `feeds` (`f_id`, `f_name`, `f_email`, `f_feeds`) VALUES
(1, 'Zurain', 'zurainradjeni@yahoo.com', 'Great now i can go straight to the nursery!');

-- --------------------------------------------------------

--
-- Table structure for table `nursery`
--

CREATE TABLE `nursery` (
  `nur_id` int(11) NOT NULL,
  `nur_name` varchar(50) DEFAULT NULL,
  `nur_address` varchar(50) DEFAULT NULL,
  `nur_post` int(5) DEFAULT NULL,
  `nur_city` varchar(15) DEFAULT NULL,
  `nur_state` varchar(15) DEFAULT NULL,
  `nur_phone` varchar(12) DEFAULT NULL,
  `nur_email` varchar(30) DEFAULT NULL,
  `nur_web` varchar(30) DEFAULT NULL,
  `nur_operation` varchar(15) DEFAULT NULL,
  `n_password` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nursery`
--

INSERT INTO `nursery` (`nur_id`, `nur_name`, `nur_address`, `nur_post`, `nur_city`, `nur_state`, `nur_phone`, `nur_email`, `nur_web`, `nur_operation`, `n_password`) VALUES
(1, 'Teo Orchid Nursery', 'no:3355-c, batu 4, jalan solok bangsal,', 75350, 'batu berendam', 'melaka', '0106610116', 'tzyywen@hotmail.com', 'www.facebook.com/teoorchidnurs', '9AM-6PM', '123'),
(2, 'Oasis Horticulture', 'Lot No1', 75250, 'Jalan Pandan', 'Melaka', '0126077909', 'oasis.nursery@gmail.com', 'https://www.facebook.com/oasis', '9AM - 6PM', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `plant`
--

CREATE TABLE `plant` (
  `p_id` int(11) NOT NULL,
  `p_name1` varchar(50) DEFAULT NULL,
  `p_name2` varchar(50) DEFAULT NULL,
  `p_name3` varchar(50) DEFAULT NULL,
  `p_name4` varchar(50) DEFAULT NULL,
  `p_price` varchar(15) DEFAULT NULL,
  `nur_id` int(11) DEFAULT NULL,
  `image` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plant`
--

INSERT INTO `plant` (`p_id`, `p_name1`, `p_name2`, `p_name3`, `p_name4`, `p_price`, `nur_id`, `image`) VALUES
(1, 'Hibiscus', 'hibiscus', '', 'bunga', '15', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feeds`
--
ALTER TABLE `feeds`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `nursery`
--
ALTER TABLE `nursery`
  ADD PRIMARY KEY (`nur_id`);

--
-- Indexes for table `plant`
--
ALTER TABLE `plant`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feeds`
--
ALTER TABLE `feeds`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nursery`
--
ALTER TABLE `nursery`
  MODIFY `nur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `plant`
--
ALTER TABLE `plant`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
