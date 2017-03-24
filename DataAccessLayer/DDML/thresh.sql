-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2017 at 09:26 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `niu_res`
--

-- --------------------------------------------------------

--
-- Table structure for table `threshold`
--

CREATE TABLE `threshold` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `x1` float NOT NULL,
  `y1` float NOT NULL,
  `z1` float NOT NULL,
  `x2` float NOT NULL,
  `y2` float NOT NULL,
  `z2` float NOT NULL,
  `x3` float NOT NULL,
  `y3` float NOT NULL,
  `z3` float NOT NULL,
  `x4` float NOT NULL,
  `y4` float NOT NULL,
  `z4` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `threshold`
--

INSERT INTO `threshold` (`id`, `date`, `x1`, `y1`, `z1`, `x2`, `y2`, `z2`, `x3`, `y3`, `z3`, `x4`, `y4`, `z4`) VALUES
(15, '2017-03-24 20:36:39', 11.11, 11.22, 11.33, 22.11, 22.22, 22.33, 33.11, 33.22, 33.33, 44.11, 44.22, 44.33);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `threshold`
--
ALTER TABLE `threshold`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `threshold`
--
ALTER TABLE `threshold`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
