-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2023 at 10:28 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `centralized_school_bus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `createdat` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `email`, `password`, `status`, `createdat`) VALUES
(1, 'admin@gmail.com', '123456', 'active', '2023-03-10 07:41:31.431571');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(5) NOT NULL,
  `user` varchar(100) NOT NULL,
  `school` varchar(100) NOT NULL,
  `bus` varchar(20) NOT NULL,
  `route` varchar(40) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `booking_status` varchar(20) NOT NULL DEFAULT 'Pending',
  `started_on` varchar(20) NOT NULL,
  `end_on` varchar(20) NOT NULL,
  `createdat` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `user`, `school`, `bus`, `route`, `amount`, `booking_status`, `started_on`, `end_on`, `createdat`) VALUES
(1, 'janki@gmail.com', 'seth hukam chand sd public school', 'SH-10045', '10', '1200', 'Pending', '2023-03-31', '2023-04-30', 0),
(2, 'janki@gmail.com', 'seth hukam chand sd public school', 'SH-10045', '10', '1200', 'Pending', '2023-04-01', '2023-04-26', 0),
(3, 'janki@gmail.com', 'seth hukam chand sd public school', 'SH-10045', '10', '1200', 'Pending', '2023-03-30', '2023-04-21', 0),
(4, 'janki@gmail.com', 'seth hukam chand sd public school', 'SH-10045', '10', '1200', 'Pending', '2023-03-30', '2023-04-21', 0),
(5, 'janki@gmail.com', 'seth hukam chand sd public school', 'SH-10045', '10', '1200', 'Pending', '2023-03-30', '2023-04-21', 0),
(6, 'janki@gmail.com', 'seth hukam chand sd public school', 'SH-10045', '10', '1200', 'Pending', '2023-03-30', '2023-04-21', 0),
(7, 'janki@gmail.com', 'seth hukam chand sd public school', 'SH-10045', '10', '1200', 'Pending', '2023-03-30', '2023-04-21', 0),
(8, 'janki@gmail.com', 'seth hukam chand sd public school', 'SH-10045', '10', '1200', 'Pending', '2023-03-30', '2023-04-21', 0),
(9, 'janki@gmail.com', 'seth hukam chand sd public school', 'SH-10045', '10', '1200', 'Pending', '2023-03-24', '2023-03-25', 0),
(10, 'janki@gmail.com', 'seth hukam chand sd public school', 'SH-10045', '10', '1200', 'Pending', '2023-03-24', '2023-03-25', 0),
(11, 'janki@gmail.com', 'seth hukam chand sd public school', 'SH-10045', '10', '1200', 'Pending', '2023-03-24', '2023-03-25', 0),
(12, 'janki@gmail.com', 'seth hukam chand sd public school', 'SH-10045', '10', '1200', 'Pending', '2023-03-24', '2023-03-25', 0),
(13, 'janki@gmail.com', 'seth hukam chand sd public school', 'SH-10045', '10', '1200', 'Pending', '2023-03-24', '2023-03-25', 0),
(14, 'janki@gmail.com', 'seth hukam chand sd public school', 'SH-10045', '10', '1200', 'Booked', '2023-03-24', '2023-03-25', 0),
(15, 'janki@gmail.com', 'Punjab public school', 'PB 1H 2023', '7', '22', 'Booked', '2023-03-10', '2023-03-31', 0),
(16, 'janki@gmail.com', 'Seth hukam chand sd public school', 'SH-10045', '10', '1200', 'Booked', '2023-03-30', '2023-03-31', 0),
(17, 'janki@gmail.com', 'Punjab public school', 'PB 1H 2023', '7', '22', 'Booked', '2023-03-31', '2023-04-27', 0),
(18, 'paras@gmail.com', 'Seth hukam chand sd public school', 'HP 2324', '9', '1200', 'Booked', '2023-03-23', '2023-04-27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `id` int(10) NOT NULL,
  `bus_number` varchar(100) NOT NULL,
  `photo` longtext NOT NULL,
  `quantity_slot` int(100) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `createdat` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`id`, `bus_number`, `photo`, `quantity_slot`, `status`, `createdat`) VALUES
(1, 'PB 1H 2023', '1029253840bus2.jpg', 0, 'active', '2023-03-30 08:11:03.537687'),
(3, 'HP 2324', '1351868270bussafety.jpg', 0, 'active', '2023-03-30 08:17:04.516744'),
(4, 'SH-10045', '1752229845bus1.jpg', 1, 'active', '2023-03-29 09:25:27.473725'),
(5, 'SH-1002', '123548401bus1.jpg', 20, 'active', '2023-03-30 08:27:03.405863');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int(10) NOT NULL,
  `school` varchar(100) NOT NULL,
  `bus_number` varchar(100) NOT NULL,
  `from_route` varchar(100) NOT NULL,
  `fees` varchar(10) NOT NULL,
  `to_route` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `createdat` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `school`, `bus_number`, `from_route`, `fees`, `to_route`, `description`, `status`, `createdat`) VALUES
(7, '7', '1', 'jal', '22', 'd', 'Jalandhar road 22', 'active', '2023-03-22 17:19:10.889995'),
(8, '7', '3', 'lkjhugtf', '41', 'lkoiuy', 'Jalandhar road 22', 'active', '2023-03-22 17:18:45.876989'),
(9, '8', '3', 'Jalandhar', '1200', 'Ludhiana', 'abc', 'active', '2023-03-28 13:24:04.484396'),
(10, '8', '4', 'Jalandhar', '1200', 'ludhiana', 'abc', 'active', '2023-03-28 15:43:06.278749'),
(11, '8', '3', 'jalandhar', '1200', 'amritsar', 'abc', 'active', '2023-03-28 16:46:30.551560');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `id` int(10) NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` longtext NOT NULL,
  `city` varchar(100) NOT NULL,
  `area` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `createdat` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`id`, `school_name`, `email`, `password`, `photo`, `city`, `area`, `address`, `contact`, `description`, `status`, `createdat`) VALUES
(7, 'Punjab public school', 'pun@gmail.com', '123456', '1482660096school2.webp', 'Jalandhar', 'Modal Town', 'Punjab', 4585265842, 'Ward no 3', 'active', '2023-03-22 13:37:51.336757'),
(8, 'Seth hukam chand sd public school', 'sethhukam@gmail.com', '123456', '1209031973bg1.jpg', 'Jalandhar', 'Prem Nagar', '120 Jalandhar', 9845403945, 'Abc', 'active', '2023-03-30 08:22:08.671034'),
(9, 'Seth hukam ', 'sh@gmail.com', '123456', '377483695bg.jpg', 'jalandhar', 'jalandhar', '120 jalandhar', 9845403943, 'abc', 'active', '2023-03-30 08:27:52.322603');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `area` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active',
  `createdat` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `contact`, `address`, `city`, `area`, `gender`, `status`, `createdat`) VALUES
(1, '', 'bimal@gmail.com', '123', 8651235368412, 'Punjab', 'Jalandhar', 'Mota Singh Nagar', 'on', '', '2023-03-22 11:53:25.747256'),
(2, 'Janki', 'janki@gmail.com', '123456', 9845403943, '120 jalandhar', 'jalandhar', 'abc', 'female', '', '2023-03-29 16:48:16.902130'),
(3, 'paras', 'paras@gmail.com', '123', 9845403943, '120 jalandhar', 'jalandhar', 'jalandhar', 'male', 'Active', '2023-03-30 08:16:29.244479');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `school_name` (`school_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
