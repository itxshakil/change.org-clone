-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2020 at 01:27 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `causes`
--

CREATE TABLE `causes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `causes`
--

INSERT INTO `causes` (`id`, `title`, `description`, `user_id`, `created_at`) VALUES
(1, 'Title', 'Description', 1, '2020-07-14 06:01:59'),
(2, 'Title', 'Description', 1, '2020-07-14 06:02:21'),
(3, 'Title', 'Description jejdjshfh', 1, '2020-07-14 06:11:31'),
(4, 'Title', 'Description jejdjshfh', 1, '2020-07-14 06:12:14'),
(5, 'Title', 'Description jejdjshfh', 1, '2020-07-14 06:12:40'),
(6, 'Title', 'Description jejdjshfh', 1, '2020-07-14 06:13:06'),
(7, 'Title', 'Description jejdjshfh', 1, '2020-07-14 06:13:24'),
(8, 'Title', 'Description jejdjshfh', 1, '2020-07-14 06:13:36'),
(9, 'Title', 'Description jejdjshfh', 1, '2020-07-14 06:14:00'),
(10, 'tedsthjdchjadfhcshj h vhv rhvr egv', 'hwjde ew g eth gry h rey hrt h trb rb gr br b rg br b y', 2, '2020-07-14 10:11:19');

-- --------------------------------------------------------

--
-- Table structure for table `signs`
--

CREATE TABLE `signs` (
  `id` int(10) UNSIGNED NOT NULL,
  `causes_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(120) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `created_at`) VALUES
(1, 'itxshakil', 'itxshakil@gmail.com', '$2y$10$APaluQPjPTI9q/hOHsB.7uGGEeVCBCagEYS18gNvCZOs1opsP72Y2', 'Shakil', 'Alam', '2020-07-14 04:48:18'),
(2, 'itxshakiil', 'itxshakiil@gmail.com', '$2y$10$OYDcshgd/XJyrobIyCSvKewOfZVfmGu/Fc2fXGs64nCHK8KdqqWEm', 'Shakeel', 'Ansari', '2020-07-14 10:10:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `causes`
--
ALTER TABLE `causes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signs`
--
ALTER TABLE `signs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `causes`
--
ALTER TABLE `causes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `signs`
--
ALTER TABLE `signs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
