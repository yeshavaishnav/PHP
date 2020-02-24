-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2020 at 09:46 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehicle_registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `service_registration`
--

CREATE TABLE `service_registration` (
  `service_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `title` varchar(20) NOT NULL,
  `vehicleNo` int(5) NOT NULL,
  `licenseNo` int(5) NOT NULL,
  `date` date NOT NULL,
  `timeslot` varchar(5) NOT NULL,
  `issue` varchar(30) NOT NULL,
  `servicecenter` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_registration`
--

INSERT INTO `service_registration` (`service_id`, `user_id`, `title`, `vehicleNo`, `licenseNo`, `date`, `timeslot`, `issue`, `servicecenter`, `status`, `createdAt`) VALUES
(1, 1, 'car service', 2639, 1123, '2020-02-22', '10-11', 'cleaning', 'maruti', 'Approved', '2020-02-21 12:18:18'),
(2, 1, 'car service', 568, 568, '2020-02-13', '9-10', 'cleaning', 'maruti', 'Approved', '2020-02-21 12:19:51'),
(3, 1, 'car service', 44, 12, '2020-02-22', '10-11', 'cleaning', 'maruti', 'pending', '2020-02-21 12:20:14'),
(4, 1, 'car service', 0, 0, '2020-02-22', '1-2', 'cleaning', 'maruti', 'pending', '2020-02-21 12:20:53'),
(5, 1, 'car service', 111, 111, '2020-02-22', '9-10', 'cleaning', 'maruti', 'Approved', '2020-02-21 12:24:52'),
(6, 1, 'car service', 333, 555, '2020-02-22', '9-10', 'cleaning', 'maruti', 'pending', '2020-02-21 12:25:24'),
(7, 1, 'car service', 90, 90, '2020-02-22', '9-10', 'cleaning', 'maruti', 'pending', '2020-02-21 12:27:27'),
(8, 1, 'car service', 454, 454, '2020-02-22', '12-1', 'cleaning', 'maruti', 'pending', '2020-02-21 12:29:27'),
(9, 2, 'car service', 67, 76, '2020-02-22', '11-12', 'cleaning', 'maruti', 'Approved', '2020-02-21 12:36:16'),
(10, 2, 'car service', 9765, 9765, '2020-02-22', '12-1', 'cleaning', 'maruti', 'pending', '2020-02-21 12:38:28'),
(11, 1, 'car service', 5565, 5565, '2020-02-22', '5-6', 'cleaning', 'maruti', 'pending', '2020-02-22 05:30:09'),
(12, 1, 'car service', 6767, 6767, '2020-02-25', '2-3', 'cleaning', 'maruti', 'pending', '2020-02-22 05:33:35'),
(13, 1, 'car service', 7898, 7898, '2020-02-28', '9-10', 'cleaning', 'maruti', 'pending', '2020-02-22 05:33:54'),
(14, 1, 'car service', 22, 22, '2020-02-26', '2-3', 'cleaning', 'maruti', 'pending', '2020-02-22 05:36:16'),
(15, 1, 'car service', 8, 8, '2020-02-26', '9-10', '', 'maruti', 'pending', '2020-02-22 05:37:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(5) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `password`, `phone`) VALUES
(1, 'yesha', 'vaishnav', 'yeshavaishnav@gmail.com', '123', '9825015979'),
(2, 'Misha', 'Vaishnav', 'vaishnavmisha@gmail.com', '123', '09662443248');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `address_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `street` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `zipcode` int(6) NOT NULL,
  `country` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`address_id`, `user_id`, `street`, `city`, `state`, `zipcode`, `country`) VALUES
(1, 1, 'jamnagar', 'ahmedabad', 'Gujarat', 79, 'India'),
(2, 2, 'digvijay plot', 'jamnagar', 'Gujarat', 79, 'India');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `service_registration`
--
ALTER TABLE `service_registration`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`address_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `service_registration`
--
ALTER TABLE `service_registration`
  MODIFY `service_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `address_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
