-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2024 at 07:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kiemtra2`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `uploaded_on` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `file_name`, `image_name`, `uploaded_on`) VALUES
(1, 'tuixanh1.jpg', 'Túi xách ', '2024-10-23 08:54:47'),
(2, 'tuixach2.jpg', 'Túi xách xanh lá', '2024-10-23 09:00:04'),
(3, 'tuixach3.jpg', 'Túi xách tròn trắng', '2024-10-23 09:05:53'),
(4, 'tuixach4.jpg', 'Túi xách kem khóa đen', '2024-10-23 09:22:08'),
(5, 'tuixach5.jpg', 'Túi cô gái ', '2024-10-23 09:29:46'),
(6, 'tuixanh6.png', 'Túi thời trang xanh ngọc', '2024-10-23 10:46:58'),
(7, 'tuixach7.jpg', 'Túi xách thành phố ', '2024-10-23 10:47:59'),
(8, 'compressed_tuixach8.jpg', 'Túi đeo chéo', '2024-10-24 00:08:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
