-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2024 at 06:24 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rental_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `addcar`
--

CREATE TABLE `addcar` (
  `id` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  `number` varchar(20) NOT NULL,
  `capacity` int(11) NOT NULL,
  `rent` decimal(10,2) NOT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addcar`
--

INSERT INTO `addcar` (`id`, `model`, `number`, `capacity`, `rent`, `email`) VALUES
(15, 'TATA TIAGO', '8757', 5, '1700.00', NULL),
(16, 'AUDI', '7878', 4, '3000.00', NULL),
(18, 'Tata Tigor', '1212', 5, '1500.00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `agencies`
--

CREATE TABLE `agencies` (
  `id` int(11) NOT NULL,
  `agency_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `mobile` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agencies`
--

INSERT INTO `agencies` (`id`, `agency_name`, `email`, `password`, `mobile`) VALUES
(1, 'aa', 'aa@gmail.com', '$2y$10$LQjfbKo3Wu.DOvuA4.sEyeqiBlpaXRkFsNDmpejZXFKMYohvf5vZm', 243),
(2, 'aa', 'aa@gmail.com', '$2y$10$mKdIDO8k3EDH7okIU1bTqeV1xJrz0yjle5CDX5G2rSKQLOQYdb64.', 4343),
(3, 'piyush', 'pi@gamil.com', '$2y$10$ueFNsZjEX4ZjeB6tOLzAe.e9J6jkraIb6Bn7YC0uuiqzLVODltHza', 343),
(4, 'abhyu', 'abhyu@gmail.com', '$2y$10$KGxaq1wv6egM9s7yQfs1EO0sXiKfGFxYio30I3YID6rOD7P6j5NG.', 232);

-- --------------------------------------------------------

--
-- Table structure for table `rented`
--

CREATE TABLE `rented` (
  `id` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  `number` varchar(20) NOT NULL,
  `capacity` int(11) NOT NULL,
  `rent` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `days` int(2) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rented`
--

INSERT INTO `rented` (`id`, `model`, `number`, `capacity`, `rent`, `date`, `days`, `email`) VALUES
(15, 'MG HECTOR', '3453', 5, '3000.00', '2024-05-22', 2, 'pi@gamil.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `mobile`) VALUES
(1, 'Ayush Rawat', 'ayushrawat760@gmail.com', '$2y$10$UhCWcej7LbuzoxBmeqqLzuZcqliUeh2AuwZ4nsLT14ExWPoq/0g1G', 0),
(2, 'ayurt', 'ayurt760@gmail.com', '$2y$10$1eV2Ivx//nFcgq6N9Ja/mOxHFaJyoorl/EiPDMWdX0pzs.2aVOwzy', 0),
(3, 'ayurt', 'ayurt760@gmail.com', '$2y$10$vZYIM01tmPuwyQxVxkfHTu1iFAGq0v0oRz1u/5KmvWL5C8zmYiX8G', 0),
(4, 'shre', 'shre@gmail.com', '$2y$10$xaKnojT/0HQZ76YdZlN49.zLuNQJLaqNus8uU/Z20PkLObi.pYuay', 0),
(5, 'ayush', 'ay@gamil.com', '$2y$10$aFbiCs2MTLcj4nXVObr.s.QMJefCbFzAXWaqEhOzWhNppD/bgul8W', 43483284),
(6, 'asdf', 'asdf@gmail.com', '$2y$10$fMu/WEBXeG.6CRd2uBbmcOUrf9OaIaYQxrdcWst37Wsjr1hJ.YTCy', 134234),
(7, 'aa', 'aa@gmail.com', '$2y$10$L6Ck5RptrfsN0jovE31tA.WjsMMRtg0QXWis3HxDCYf0i9fWepBJu', 3432);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addcar`
--
ALTER TABLE `addcar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agencies`
--
ALTER TABLE `agencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rented`
--
ALTER TABLE `rented`
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
-- AUTO_INCREMENT for table `addcar`
--
ALTER TABLE `addcar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `agencies`
--
ALTER TABLE `agencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rented`
--
ALTER TABLE `rented`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
