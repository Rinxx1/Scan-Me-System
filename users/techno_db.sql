-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2021 at 02:06 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techno_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `driver_req`
--

CREATE TABLE `driver_req` (
  `user_id` varchar(6) NOT NULL,
  `license_f` longblob NOT NULL,
  `license_b` longblob NOT NULL,
  `vehicle_or` longblob NOT NULL,
  `nbi_clearance` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver_req`
--

INSERT INTO `driver_req` (`user_id`, `license_f`, `license_b`, `vehicle_or`, `nbi_clearance`) VALUES
('US8966', 0x2e2e2f696d672f6472697665725f7265712f6b6b2e706e67, 0x2e2e2f696d672f6472697665725f7265712f6d692e706e67, 0x2e2e2f696d672f6472697665725f7265712f652e706e67, 0x2e2e2f696d672f6472697665725f7265712f662e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `personinfo`
--

CREATE TABLE `personinfo` (
  `person_id` int(8) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact_num` varchar(11) NOT NULL,
  `bdate` varchar(10) NOT NULL,
  `qr_code` longblob NOT NULL,
  `wallet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personinfo`
--

INSERT INTO `personinfo` (`person_id`, `fname`, `lname`, `mname`, `gender`, `address`, `contact_num`, `bdate`, `qr_code`, `wallet`) VALUES
(1697, 'Charlyn', 'Miguel', 'C', 'Female', 'Brgy. Lagao, GSC', '09466886539', '11-19-2001', 0x2e2e2f696d672f7172636f6465732f313639374d696775656c2e706e67, 0),
(8966, 'Ky', 'Cerida', 'M', 'Female', 'Brgy. Lagao, GSC', '09466886539', '11-19-2001', 0x2e2e2f696d672f7172636f6465732f383936364365726964612e706e67, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(6) NOT NULL,
  `person_id` int(8) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `user_type` int(1) NOT NULL,
  `user_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `person_id`, `uname`, `password`, `user_type`, `user_status`) VALUES
('US1697', 1697, 'cha', 'cha', 1, 1),
('US8966', 8966, 'kk', 'kk', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehicle_id` varchar(6) NOT NULL,
  `user_id` varchar(6) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `plate_num` varchar(20) NOT NULL,
  `engine_num` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `personinfo`
--
ALTER TABLE `personinfo`
  ADD PRIMARY KEY (`person_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehicle_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
