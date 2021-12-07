-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2020 at 04:13 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

--
-- Dumping data for table `admin`
--
----------------------------------

--
-- Table structure for table `parking_details`
--

CREATE TABLE `parking_details1` (
  `id` int(2) NOT NULL,
  `slot_id` int(2) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `uid` int(2) NOT NULL,
  `slot_date` varchar(10) NOT NULL,
  `start_time` varchar(6) NOT NULL,
  `no_of_hr` int(2) NOT NULL,
  `exit_time` varchar(6) NOT NULL,
  `booking_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parking_details`
--

INSERT INTO `parking_details1` (`id`, `slot_id`, `uname`, `uid`, `slot_date`, `start_time`, `no_of_hr`, `exit_time`, `booking_code`) VALUES
(9, 9, '456201ssd', 'monster', 2, '04/19/2020', '04:00', 4, '08:00', '2904/19/202004:00', );

-- --------------------------------------------------------

--
-- Table structure for table `slot_master`
--

CREATE TABLE `slot_master` (
  `slot_id` int(2) NOT NULL,
  `slot_no` varchar(3) NOT NULL,
  `slot_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slot_master`
--

INSERT INTO `slot_master` (`slot_id`, `slot_no`, `slot_status`) VALUES
(1, '1', 0),
(2, '2', 0),
(3, '3', 0),
(4, '4', 0),
(5, '5', 0),
(6, '6', 0),
(7, '7', 0),
(8, '8', 0),
(9, '9', 1),
(10, '10', 0),
(11, '11', 0),
(12, '12', 0);
(13, '13', 0),
(14, '14', 0),
(15, '15', 0),
(16, '16', 0),
(17, '17', 0),
(18, '18', 0),
(19, '19', 0),
(20, '20', 0),
(21, '21', 1),
(22, '22', 0),
(23, '23', 0),
(24, '24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(2) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uname`, `pass`) VALUES
(1, 'moss', 'molasses'),


ALTER TABLE `parking_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slot_master`
--
ALTER TABLE `slot_master`
  ADD PRIMARY KEY (`slot_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--

ALTER TABLE `parking_details`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `slot_master`
--
ALTER TABLE `slot_master`
  MODIFY `slot_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

