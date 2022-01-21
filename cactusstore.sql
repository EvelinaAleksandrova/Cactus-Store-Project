-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2022 at 05:10 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cactusstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `cactus`
--

CREATE TABLE `cactus` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `sort` varchar(100) NOT NULL,
  `image` varchar(300) NOT NULL,
  `productcode` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cactus`
--

INSERT INTO `cactus` (`id`, `name`, `price`, `sort`, `image`, `productcode`) VALUES
(4, 'Mixed mini cactuses', '14.00', 'Echinocactus grusonii', '/Cactus-Store-Project/images/xs47odmm-900.jpg', 'BPG11'),
(5, 'Ehyno Grusony', '35.00', 'Mammillaria cactus', '/Cactus-Store-Project/images/Cactus-with-flower-pot-3D-Model.jpg', 'BPG12'),
(6, 'Euphorbia eritrea', '19.00', 'Dessert Cactus', '/Cactus-Store-Project/images/5057172513444.jpg', 'BPG13'),
(7, 'Dessert Cactus', '120.00', 'Dessert Cactus', '/Cactus-Store-Project/images/10-1.jpg', 'BPG14'),
(8, 'Pilosocereus chrysostel', '55.00', 'Pilosocereus chrysostel', '/Cactus-Store-Project/images/908b19788f5974712973bbc469b6164c.jpg', 'BPG20'),
(9, 'Mixed mini cactuses and succulents', '22.00', 'Botanicals Cactuses and Succulents', '/Cactus-Store-Project/images/196ccbe1-b06d-4227-8412-515390e0aa92_3.48b52bc2ca2ef827968c6f2e4da3d961.jpeg', 'BPG09'),
(18, 'Dessert Cactus', '28.00', 'Dessert Cactus', '/Cactus-Store-Project/images/xs47odmm-900.jpg', 'BPG66630223');

-- --------------------------------------------------------

--
-- Table structure for table `userquestions`
--

CREATE TABLE `userquestions` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userquestions`
--

INSERT INTO `userquestions` (`id`, `username`, `email`, `description`) VALUES
(1, 'Eli', 'eli@gmail.com', 'reahrh'),
(2, 'Evelina Aleksandrova', 'evelina@gmail.com', 'dn dfndfndfn'),
(3, 'Evelina Aleksandrova', 'evelina@gmail.com', 'dn dfndfndfn'),
(4, 'Evelina Aleksandrova', 'evelina@gmail.com', 'dn dfndfndfn'),
(5, 'Evelina Aleksandrova', 'evelina@gmail.com', '123545hkyghkgyolgylouyulu241'),
(6, 'Evelina ', 'evelinaa@gmail.com', 'dssssssssssssss'),
(7, 'Evelina ', 'evelina@gmail.com', 'dhbshbndrn1144444');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cactus`
--
ALTER TABLE `cactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userquestions`
--
ALTER TABLE `userquestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cactus`
--
ALTER TABLE `cactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `userquestions`
--
ALTER TABLE `userquestions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
