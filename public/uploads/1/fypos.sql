-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2023 at 04:20 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fypos`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `fullname`, `email`, `password`, `role`) VALUES
(1, 'Sadiq', 'sadiq@gmail.com', 'Pakistan', 1),
(2, 'Shahbaz', 'shahbaz@gmail.com', 'Pakistan', 1),
(3, 'Asif', 'asif@gmail.com', 'Lahore', 1),
(4, 'Hasin Munir', 'hasin@gmail.com', 'Lahore', 2),
(5, 'Mam Huda', 'huda@gmail.com', 'Lahore', 2),
(6, 'Hamza', 'hamza@gmail.com', 'Lahore', 1),
(7, 'New User', 'n1@gmail.com', 'Lahore', 1);

-- --------------------------------------------------------

--
-- Table structure for table `guidelines`
--

CREATE TABLE `guidelines` (
  `id` int(11) NOT NULL,
  `teacher` varchar(100) NOT NULL,
  `prjid` int(11) NOT NULL,
  `guidelines` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guidelines`
--

INSERT INTO `guidelines` (`id`, `teacher`, `prjid`, `guidelines`) VALUES
(1, 'hasin@gmail.com', 1, 'Please make it fast'),
(2, 'huda@gmail.com', 1, 'Dear Members you are requested to submit the documents as early as possible');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `ptitle` varchar(200) NOT NULL,
  `member1` varchar(100) NOT NULL,
  `member2` varchar(100) NOT NULL,
  `member3` varchar(100) NOT NULL,
  `member4` varchar(100) NOT NULL,
  `supervisor1` varchar(100) NOT NULL,
  `supervisor2` varchar(100) NOT NULL,
  `pddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `ptitle`, `member1`, `member2`, `member3`, `member4`, `supervisor1`, `supervisor2`, `pddate`) VALUES
(1, 'FYPOS', 'shahbaz@gmail.com', 'hamza@gmail.com', 'asif@gmail.com', 'sadiq@gmail.com', 'hasin@gmail.com', 'huda@gmail.com', '2023-02-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guidelines`
--
ALTER TABLE `guidelines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `guidelines`
--
ALTER TABLE `guidelines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
