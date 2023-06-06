-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2023 at 03:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notes-1`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `sno` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `amount` float NOT NULL,
  `source` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`sno`, `title`, `amount`, `source`, `description`) VALUES
(33, 'Gajian Juni', 1000000, 'Orang tua', 'Hemat-hemat');

-- --------------------------------------------------------

--
-- Table structure for table `notes2`
--

CREATE TABLE `notes2` (
  `sno` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `amount` float NOT NULL,
  `lender` varchar(255) NOT NULL,
  `duedate` date NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notes3`
--

CREATE TABLE `notes3` (
  `sno` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `target` float NOT NULL,
  `current` float NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes3`
--

INSERT INTO `notes3` (`sno`, `title`, `target`, `current`, `description`) VALUES
(17, 'iPhone 14', 15000000, 1000000, 'Beli bekas teman biar murah');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `password`) VALUES
(1, 'deri@gmail.com', 'Deri', '202cb962ac59075b964b07152d234b70'),
(2, 'anto@gmail.com', 'Anto', '202cb962ac59075b964b07152d234b70'),
(3, 'andi@gmail.com', 'Andi', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `notes2`
--
ALTER TABLE `notes2`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `notes3`
--
ALTER TABLE `notes3`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `notes2`
--
ALTER TABLE `notes2`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `notes3`
--
ALTER TABLE `notes3`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
