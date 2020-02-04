-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2020 at 05:45 PM
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
-- Database: `evaluation_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE `blog_post` (
  `id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `btitle` varchar(20) NOT NULL,
  `bcategory` varchar(50) NOT NULL,
  `burl` varchar(30) NOT NULL,
  `bcontent` varchar(50) NOT NULL,
  `bimage` varchar(20) NOT NULL,
  `publishedAt` varchar(20) NOT NULL,
  `createdAt` varchar(30) NOT NULL,
  `updatedAt` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`id`, `user_id`, `btitle`, `bcategory`, `burl`, `bcontent`, `bimage`, `publishedAt`, `createdAt`, `updatedAt`) VALUES
(1, 1, 'benefits of fruits', 'diet', 'nutrition', 'fruits provide vitamins', '', '2020-02-04', '04:02:2020 15:24:21', ' '),
(2, 3, 'computer science', 'computer science', 'w3schools', 'programming languages', '', '2020-02-04', '04:02:2020 16:27:30', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(5) NOT NULL,
  `parent_category_id` int(5) NOT NULL,
  `ctitle` varchar(30) NOT NULL,
  `metatitle` varchar(30) NOT NULL,
  `curl` varchar(40) NOT NULL,
  `ccontent` varchar(50) NOT NULL,
  `cimage` varchar(20) NOT NULL,
  `createdAt` varchar(50) NOT NULL,
  `updatedAt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `parent_category_id`, `ctitle`, `metatitle`, `curl`, `ccontent`, `cimage`, `createdAt`, `updatedAt`) VALUES
(1, 1, 'diet', 'health related tips', 'www.nutritionfood.com', 'health tips', '1.jpg', ' ', ' '),
(2, 5, 'computer science', 'learn to program', 'learn-basic-computer-science', 'programming language', '2.jpg', '04:02:2020 15:35:05', ' '),
(3, 4, 'mobile phones', 'compare various devices', 'gadget360', 'smart phones', '3.jpg', '04:02:2020 15:35:59', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(5) NOT NULL,
  `prefix` varchar(5) NOT NULL,
  `firstname` varchar(10) NOT NULL,
  `lastname` varchar(10) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(10) NOT NULL,
  `lastLoginAt` varchar(50) NOT NULL,
  `information` varchar(40) NOT NULL,
  `createdAt` varchar(50) NOT NULL,
  `updatedAt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `prefix`, `firstname`, `lastname`, `mobile`, `email`, `password`, `lastLoginAt`, `information`, `createdAt`, `updatedAt`) VALUES
(1, 'Miss', 'yesha', 'vaishnav', 9825015979, 'yeshavaishnav@gmail.com', '123', '04:02:2020 15:23:50', 'student ', '04:02:2020 15:07:02', '04:02:2020 15:00:02'),
(3, 'Miss', 'misha', 'vaishnav', 9662443248, 'vaishnavmisha@gmail.com', '123', ' ', 'student ', ' ', '04:02:2020 15:04:47'),
(5, 'Mrs', 'ushma', 'vaishnav', 9428725327, 'urvaishnav@gmail.com', '123', ' ', 'housewife ', '04:02:2020 16:31:38', ' ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
