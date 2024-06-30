-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2024 at 01:33 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vaccine`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `msg` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `msg`) VALUES
(1, 'ganesh', 'ganesh@gmail.com', '9876543210', 'hi'),
(2, 'arun', 'ash@gmail.com', '9876543210', 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `dose`
--

CREATE TABLE `dose` (
  `id` int(11) NOT NULL,
  `name` varchar(155) NOT NULL,
  `start` int(11) NOT NULL,
  `week` int(11) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dose`
--

INSERT INTO `dose` (`id`, `name`, `start`, `week`, `year`) VALUES
(1, 'BCG', 1, 0, 0),
(2, 'HepB', 3, 0, 0),
(3, 'Poliovirus', 5, 0, 0),
(4, 'DTP', 42, 6, 0),
(5, 'Hib', 44, 6, 0),
(6, 'PCV', 46, 6, 0),
(7, 'RV', 48, 6, 0),
(8, 'Typhoid', 63, 9, 0),
(9, 'MMR', 65, 9, 0),
(10, 'Meningococcal', 365, 52, 1),
(11, 'Varicella', 365, 52, 1),
(12, 'HepA', 365, 52, 1),
(13, 'Tdap', 2556, 365, 7),
(14, 'Hpv', 3287, 469, 9);

-- --------------------------------------------------------

--
-- Table structure for table `take`
--

CREATE TABLE `take` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `did` varchar(255) NOT NULL,
  `vaccine` varchar(100) NOT NULL,
  `vdate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `take`
--

INSERT INTO `take` (`id`, `name`, `email`, `phone`, `uid`, `did`, `vaccine`, `vdate`) VALUES
(1, 'mahi', 'mahi@gmail.com', '9876543210', '1', '1', 'BCG', '2024-03-08'),
(2, 'ganesh', 'phpteamprojects123@gmail.com', '9876543211', '2', '1', 'BCG', '2024-03-08'),
(4, 'ash', 'ash@gmail.com', '9124033805', '3', '1', 'BCG', '2024-03-08'),
(5, 'mahi', 'mahi@gmail.com', '9876543210', '1', '2', 'HepB', '2024-03-10');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `dob`, `email`, `password`, `phone`) VALUES
(1, 'mahi', '2024-03-05', 'mahi@gmail.com', '1234', '9876543210'),
(2, 'ganesh', '2024-03-07', 'phpteamprojects123@gmail.com', '1234', '9876543211'),
(3, 'ash', '2024-03-07', 'ash@gmail.com', '1234', '9124033805'),
(4, 'PHP Team', '2024-02-25', 'phpteam@gmail.com', '1234', '9876543219');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dose`
--
ALTER TABLE `dose`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `take`
--
ALTER TABLE `take`
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
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dose`
--
ALTER TABLE `dose`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `take`
--
ALTER TABLE `take`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
