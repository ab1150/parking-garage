-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2016 at 10:15 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parkinggarage`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `isAdmin` int(11) NOT NULL,
  `id` int(10) NOT NULL,
  `Username` char(20) NOT NULL,
  `Password` char(20) NOT NULL,
  `Balance` float NOT NULL,
  `Reservation` datetime DEFAULT NULL,
  `LicensePlate` char(7) NOT NULL,
  `startTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`isAdmin`, `id`, `Username`, `Password`, `Balance`, `Reservation`, `LicensePlate`, `startTime`) VALUES
(1, 0, 'admin', 'password', 0, NULL, '', '0000-00-00 00:00:00'),
(0, 1, 'username', 'password', 100, '2016-04-27 01:01:00', '1234567', '2016-04-29 14:22:00'),
(0, 2, 'richUser', 'password', 10000000, '0000-00-00 00:00:00', '2345678', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `parkingspaces`
--

CREATE TABLE `parkingspaces` (
  `SpotNumber` int(11) NOT NULL,
  `Status` enum('VACANT','OCCUPIED','RESERVED','') DEFAULT 'VACANT',
  `Username` char(20) DEFAULT NULL,
  `StartTime` datetime DEFAULT NULL,
  `Price` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parkingspaces`
--

INSERT INTO `parkingspaces` (`SpotNumber`, `Status`, `Username`, `StartTime`, `Price`) VALUES
(100, 'OCCUPIED', NULL, '2016-03-16 09:00:00', '3'),
(101, 'OCCUPIED', '', NULL, '3'),
(103, 'VACANT', NULL, NULL, NULL),
(104, 'OCCUPIED', NULL, '2016-04-29 14:22:00', NULL),
(106, 'VACANT', NULL, NULL, NULL),
(107, 'VACANT', NULL, NULL, NULL),
(109, 'VACANT', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `startTime` datetime NOT NULL,
  `endTime` datetime NOT NULL,
  `spotNumber` int(11) NOT NULL,
  `username` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parkingspaces`
--
ALTER TABLE `parkingspaces`
  ADD PRIMARY KEY (`SpotNumber`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
