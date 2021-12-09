-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 09, 2021 at 09:56 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sza`
--

-- --------------------------------------------------------

--
-- Table structure for table `erabiltzailea`
--

DROP TABLE IF EXISTS `erabiltzailea`;
CREATE TABLE `erabiltzailea` (
  `izena` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pasahitza` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `erabiltzailea`
--

INSERT INTO `erabiltzailea` (`izena`, `email`, `pasahitza`) VALUES
('Admin Admin', 'admin@gmail.com', '$1$FEInrLxv$mBYNnvISvyEuWloD6stMN/'),
('Mikel Aristu', 'mikel@gmail.com', '$1$pQgE0ZGC$fRHdgKhOIJJCqwnNha1kH/'),
('Sara Gracia', 'sara@gmail.com', '$1$mL2z.z9T$GCi21ntBnnuPTDydVuyAq0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `erabiltzailea`
--
ALTER TABLE `erabiltzailea`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
