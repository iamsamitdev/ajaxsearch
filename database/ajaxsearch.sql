-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2020 at 03:39 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ajaxsearch`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `fullname` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `mpoint` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `nickname`, `province`, `mpoint`, `status`) VALUES
(1, 'วิริยะ รักษ์ศรี', 'โม', 'กรุงเทพ', '1000', 1),
(2, 'เมทินี รักษ์ศรี', 'เม', 'กรุงเทพ', '1000', 1),
(3, 'บุญเต็ม รักษ์ศรี', 'ตุ๋ย', 'กรุงเทพ', '1500', 1),
(4, 'มาลัย หวังวัฒนา', 'แมว', 'กรุงเทพมหานคร', '2000', 1),
(5, 'นายมณฑล เดชะกุล', 'ฟลุ้ค', 'กรุงเทพมหานคร', '5000', 1),
(6, 'วิระยะ หวังวัฒนา', 'โม', 'นนทบุรี', '6000', 1),
(8, 'วิระยะ รักษ์ศรี', 'โมจิโร่', 'กรุงเทพมหานคร', '7000', 1),
(9, 'วิริยะ หวังวัฒนา', 'โมจิโร่', 'กรุงเทพมหานคร', '5500', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
