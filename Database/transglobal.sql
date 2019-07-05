-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2019 at 05:31 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transglobal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `dob`, `mobile`, `email`, `user_id`) VALUES
(1, 'Tharinda Dilshan', '1997-12-18', '773623225', 'tharindad7@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avail` smallint(1) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `dob`, `mobile`, `email`, `avail`, `register_date`, `user_id`) VALUES
(3, 'Customer 3', '2019-05-01', '1111', 'customer@yahoo.com', 1, '2019-05-28 16:36:11', 2),
(4, 'Customer 4', '2019-05-01', '1111', 'anonymous@gmail.com', 1, '2019-06-19 14:11:46', 4),
(5, 'Customer 5', '2019-05-01', '1111', 'chocoboy@yahoo.com', 1, '2019-06-19 15:18:33', 5),
(6, 'Test Customer', '1990-05-30', '789456', 'test@yahoo.com', 1, '2019-06-28 17:00:50', 8),
(7, 'Tharinda', '1997-12-18', '77411111', 'tharindad7@gmail.com', 1, '2019-07-05 05:57:50', 11),
(8, 'test2', '2019-07-11', '0716145268', 'oidggfdubwf@gmail.com', 1, '2019-07-05 06:36:19', 12),
(9, 'test3', '2019-07-02', '0773623225', 'fxeygd@gmail.com', 1, '2019-07-05 07:56:11', 13);

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `license_no` int(11) NOT NULL,
  `dob` date NOT NULL,
  `nic` int(11) NOT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `avail` tinyint(1) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `on_hire` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `name`, `license_no`, `dob`, `nic`, `mobile`, `avail`, `register_date`, `user_id`, `on_hire`) VALUES
(3, 'Driver 3', 7894, '2000-04-01', 998, '0773333333', 1, '2019-05-28 16:33:52', 9, 0),
(4, 'Driver 4', 78910, '2019-05-01', 1111, '0764444444', 1, '2019-05-29 18:52:20', 3, 0),
(5, 'Driver 5', 12345, '2019-05-26', 12345, '0715555555', 1, '2019-06-10 14:50:21', 4, 0),
(6, 'Driver 6', 7895, '1987-06-16', 0, '0726666666', 1, '2019-06-10 15:00:15', 5, 0),
(7, 'Driver 7', 7777, '2019-06-10', 1111, '0757777777', 1, '2019-06-10 15:07:17', 6, 1),
(8, 'Driver 8', 12345, '1964-11-11', 1234567, '123456789', 1, '2019-07-04 23:54:29', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `exports`
--

CREATE TABLE `exports` (
  `id` int(11) NOT NULL,
  `container_type` varchar(50) NOT NULL,
  `pickup_datetime` datetime NOT NULL,
  `pickup_location` varchar(255) NOT NULL,
  `loading_port` varchar(255) NOT NULL,
  `cargo_type` varchar(255) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `completed` tinyint(4) NOT NULL DEFAULT '0',
  `notes` text,
  `driver_id` int(255) DEFAULT NULL,
  `driver_accepted` smallint(6) NOT NULL DEFAULT '0',
  `customer_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `declined` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exports`
--

INSERT INTO `exports` (`id`, `container_type`, `pickup_datetime`, `pickup_location`, `loading_port`, `cargo_type`, `weight`, `completed`, `notes`, `driver_id`, `driver_accepted`, `customer_id`, `date`, `declined`) VALUES
(1, '20ft', '2019-06-18 09:00:00', 'Avissawella', 'Colombo', 'Copper', '10200KGS', 1, 'Need as soon as possible', 4, 1, 3, '2019-06-29 15:36:43', 0),
(2, '40ft', '2019-06-27 14:00:00', 'Jaffna', 'Colombo', 'Dates', '10000 KGS', 1, 'None', 6, 1, 4, '2019-06-29 15:36:50', 0),
(3, '20ft', '2019-06-21 10:00:00', 'ABC ', 'Colombo', 'Tea', '10000KGS', 0, 'None', NULL, 0, 4, '2019-06-23 17:24:49', 1),
(4, '20ft', '2019-06-27 09:00:00', 'Nuwaraeliya', 'Colombo', 'Gold', '5000KGS', 1, 'ASAP', 6, 1, 3, '2019-06-29 15:36:53', 0),
(5, '20ft', '2018-12-18 11:00:00', 'Avissawella', 'Colombo', 'Fruits', '5000KGS', 1, 'No notes', 4, 1, 5, '2019-06-29 15:37:00', 0),
(6, '40ft', '2018-01-04 14:00:00', 'Ratmalana', 'Colombo', 'Chocolates', '10400KGS', 1, 'None', 7, 1, 4, '2019-06-29 15:37:04', 0),
(10, '40ft', '2019-06-30 18:00:00', 'ABC Containers', 'Colombo', 'Tea', '8000KGs', 1, 'None', 5, 1, 6, '2019-07-04 23:51:44', 0),
(12, '20ft', '2019-07-02 10:00:00', 'Nugegoda', 'Colombo', 'Cinnamon', '10000KGs', 1, NULL, 7, 1, 6, '2019-07-04 23:40:06', 0),
(13, '20ft', '2019-07-04 00:12:00', 'Chilaw', 'Colombo', 'Clay', '10000KGs', 1, 'None', 8, 1, 6, '2019-07-05 05:10:58', 0),
(16, '40ft', '2017-05-30 10:00:00', 'Colombo', 'Colombo', 'Flour', '8000 KGS', 1, 'None', 7, 0, 3, '2019-07-04 23:52:11', 0),
(17, '40ft', '2017-12-12 15:00:00', 'Kandy', 'Colombo', 'Tea', '10000KGs', 1, NULL, 6, 0, 4, '2019-07-04 23:52:01', 0),
(18, '20ft', '2019-07-05 00:00:00', 'Colombo', 'Colombo', 'Tea', '8000KGs', 1, 'None', 8, 1, 5, '2019-07-05 06:57:36', 0),
(20, '20ft', '2019-07-05 20:00:00', 'ABC Containers', 'Colombo', 'Cinnamon', '8000KGs', 0, 'None', NULL, 0, 5, '2019-07-05 06:57:57', 0),
(21, '40ft', '2019-07-05 08:00:00', 'ABC Containers', 'Colombo', 'Tea', '8000KGs', 1, 'None', 7, 1, 4, '2019-07-05 07:04:22', 0),
(24, '20ft', '2019-07-05 00:00:00', 'colombo', 'hambanthota', 'large', '1221', 1, 'large', 8, 1, 6, '2019-07-05 07:04:58', 0),
(25, '20ft', '2017-02-13 00:00:00', 'colombo', 'hambanthota', 'large', '323', 0, 'large', NULL, 0, 6, '2019-07-05 06:49:15', 1),
(26, '20ft', '2019-07-05 16:54:00', 'colombo', 'knrbokgernbq', 'Tea', '10000KGs', 0, 'fwfwf', 8, 0, 6, '2019-07-05 08:01:57', 0),
(27, '20ft', '2019-07-26 12:12:00', 'Colombo', 'Colombo', 'Tim Tam', '8000KGs', 0, 'None', 8, 1, 6, '2019-07-05 07:09:41', 0),
(28, '20ft', '2019-07-05 15:12:00', 'Colombo', 'fwefewf', 'Tea', '1222', 0, 'nav', 7, 1, 6, '2019-07-05 09:51:36', 0);

-- --------------------------------------------------------

--
-- Table structure for table `imports`
--

CREATE TABLE `imports` (
  `id` int(255) NOT NULL,
  `container_type` varchar(50) NOT NULL,
  `container_pickup_datetime` datetime NOT NULL,
  `container_pickup_location` varchar(50) NOT NULL,
  `loading_port` varchar(255) NOT NULL,
  `vessel_arrival_datetime` datetime NOT NULL,
  `destination` varchar(255) NOT NULL,
  `cargo_type` varchar(255) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `notes` text,
  `driver_id` int(255) DEFAULT NULL,
  `driver_accepted` tinyint(4) NOT NULL DEFAULT '0',
  `customer_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `declined` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imports`
--

INSERT INTO `imports` (`id`, `container_type`, `container_pickup_datetime`, `container_pickup_location`, `loading_port`, `vessel_arrival_datetime`, `destination`, `cargo_type`, `weight`, `completed`, `notes`, `driver_id`, `driver_accepted`, `customer_id`, `date`, `declined`) VALUES
(1, '20ft', '2019-06-27 12:00:00', 'ABC Containers', 'Colombo', '2019-06-05 16:00:00', 'Ratmalana', 'Chocolates', '8000 KGS', 1, 'None', 3, 1, 4, '2019-07-04 23:51:40', 0),
(2, '20ft', '2019-06-18 13:00:00', 'ABC Containers', 'Colombo', '2019-06-05 16:00:00', 'Kandy', 'Silver', '8000 KGS', 1, 'None', 4, 1, 5, '2019-07-04 23:51:36', 0),
(3, '20ft', '2018-05-01 05:00:00', 'ABC Containers', 'Colombo', '2018-05-01 09:00:00', 'Galle', 'Banana', '8000 KGS', 1, NULL, 4, 1, 4, '2019-06-28 04:03:57', 0),
(4, '40ft', '2019-06-27 10:00:00', 'Colombo 03', 'Trincomalee', '2019-06-28 10:00:00', 'Jaffna', 'Oil', '10400KGS', 1, 'None', 3, 1, 5, '2019-06-27 17:42:34', 0),
(7, '20ft', '2019-06-01 14:00:00', 'ABC Containers', 'Colombo', '2019-06-01 17:00:00', 'Kandy', 'Sugar', '8000 KGS', 1, 'None', 5, 1, 6, '2019-06-28 17:37:14', 0),
(13, '20ft', '2019-06-30 10:24:00', 'Avissawella', 'Colombo', '2019-06-30 04:55:00', 'Colombo 7', 'Cinnamon', '8000KGs', 0, 'None', NULL, 1, 6, '2019-06-29 20:16:10', 1),
(14, '20ft', '2019-06-30 00:00:00', 'Colombo', 'Colombo', '2019-06-30 22:00:00', 'Jaffna', 'Tyres', '8000 KGS', 1, 'None', 7, 1, 5, '2019-07-04 23:43:40', 0),
(15, '20', '2019-07-03 10:00:00', 'Colombo', 'Colombo', '2019-07-03 05:00:00', 'Galle', 'Plastics', '7000KGs', 0, 'None', NULL, 0, 6, '2019-07-04 23:43:44', 1),
(16, '20', '2019-07-25 00:12:00', 'Colombo', 'Colombo', '2019-07-25 00:12:00', 'Arugambay', 'Rice', '10000KGs', 1, 'None', 7, 1, 6, '2019-07-04 23:51:41', 0),
(17, '20ft', '2017-11-23 10:00:00', 'ABC Containers', 'Colombo', '2017-11-23 05:00:00', 'Avissawella', 'Rice', '8000 KGS', 1, 'None', 3, 0, 3, '2019-07-04 23:51:34', 0),
(18, '40ft', '2017-04-01 17:00:00', 'Colombo 03', 'Colombo', '2017-04-03 07:00:00', 'Bambalapitiya', 'Sugar', '10400KGS', 1, 'None', 4, 0, 4, '2019-07-04 23:51:52', 0),
(19, '20', '2019-07-05 17:00:00', 'Avissawella', 'Colombo', '2019-07-05 10:00:00', 'Ratmalana', 'Chocolates', '8000KGs', 1, 'None', 8, 0, 6, '2019-07-05 04:50:17', 0),
(20, '40', '2019-07-05 17:30:00', 'Colombo', 'Colombo', '2019-07-05 10:00:00', 'Colombo 7', 'Copper', '10000KGs', 0, 'None', NULL, 0, 6, '2019-07-05 04:56:12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `sender_id` int(10) NOT NULL,
  `receiver_id` int(10) NOT NULL,
  `title` text,
  `visible` tinyint(4) NOT NULL DEFAULT '1',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` text,
  `hire_type` varchar(50) NOT NULL,
  `hire_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `sender_id`, `receiver_id`, `title`, `visible`, `date`, `message`, `hire_type`, `hire_id`) VALUES
(1, 1, 4, 'Cancel Reservation', 0, '2019-06-23 17:24:49', 'No drivers available', '', 0),
(2, 4, 1, 'New Hire Request', 0, '2019-06-27 06:35:32', 'Import from blah blah', 'Import', 3),
(3, 5, 1, 'New Hire Request', 0, '2019-06-27 06:35:38', 'Export from blah blah', 'Export', 4),
(7, 6, 1, 'Hire Completed', 0, '2019-06-29 17:18:18', 'export ID: 11 has been completed successfully', 'exports', 11),
(8, 1, 6, 'Hire Request Declined', 0, '2019-06-29 20:16:10', 'No driver available', 'imports', 13),
(9, 6, 8, 'Hire Request Accepted', 0, '2019-06-30 06:33:02', 'Your Request has been accepted', 'exports', 12),
(10, 1, 8, 'Hire Request Declined', 0, '2019-06-30 06:59:50', 'No Drivers Available', 'imports', 15),
(11, 6, 1, 'Hire Completed', 0, '2019-07-01 02:23:02', 'imports ID: 14 has been completed successfully', 'imports', 14),
(12, 6, 1, 'Hire Completed', 0, '2019-07-03 15:42:12', 'imports ID: 14 has been completed successfully', 'imports', 14),
(13, 6, 8, 'Hire Request Accepted', 0, '2019-07-04 10:53:15', 'Your Request has been accepted', 'imports', 16),
(14, 6, 1, 'Hire Completed', 0, '2019-07-04 10:57:45', 'exports ID: 12 has been completed successfully', 'exports', 12),
(15, 1, 8, 'Hire Request Declined', 0, '2019-07-04 14:28:45', 'No Drivers Available', 'exports', 13),
(16, 10, 8, 'Hire Request Accepted', 0, '2019-07-05 00:06:28', 'Your Request has been accepted', 'exports', 18),
(17, 10, 1, 'Hire Completed', 0, '2019-07-05 00:08:06', 'exports ID: 18 has been completed successfully', 'exports', 18),
(18, 10, 8, 'Hire Request Accepted', 0, '2019-07-05 03:45:15', 'Your Request has been accepted', 'exports', 19),
(19, 1, 8, 'Hire Completed', 0, '2019-07-05 04:50:17', 'Hire Completed Successfully', 'imports', 19),
(20, 10, 8, 'Hire Request Accepted', 0, '2019-07-05 05:01:24', 'Your Request has been accepted', 'exports', 22),
(21, 10, 1, 'Hire Completed', 0, '2019-07-05 05:10:41', 'exports ID: 13 has been completed successfully', 'exports', 13),
(22, 1, 8, 'Hire Completed', 0, '2019-07-05 05:10:58', 'Hire Completed Successfully', 'exports', 13),
(23, 1, 8, 'Hire Completed', 0, '2019-07-05 06:27:07', 'Hire Completed Successfully', 'exports', 22),
(24, 6, 8, 'Hire Request Accepted', 0, '2019-07-05 06:27:51', 'Your Request has been accepted', 'exports', 21),
(25, 6, 1, 'Hire Completed', 0, '2019-07-05 06:49:43', 'exports ID: 21 has been completed successfully', 'exports', 21),
(26, 1, 8, 'Hire Completed', 0, '2019-07-05 06:50:02', 'Hire Completed Successfully', 'exports', 23),
(27, 6, 1, 'Hire Completed', 0, '2019-07-05 06:51:00', 'exports ID: 21 has been completed successfully', 'exports', 21),
(28, 10, 8, 'Hire Request Accepted', 0, '2019-07-05 06:55:16', 'Your Request has been accepted', 'exports', 24),
(29, 1, 4, 'Hire Completed', 1, '2019-07-05 07:04:22', 'Hire Completed Successfully', 'exports', 21),
(30, 1, 8, 'Hire Completed', 0, '2019-07-05 07:04:58', 'Hire Completed Successfully', 'exports', 24),
(31, 10, 8, 'Hire Request Accepted', 0, '2019-07-05 07:09:41', 'Your Request has been accepted', 'exports', 27),
(32, 6, 8, 'Hire Request Accepted', 1, '2019-07-05 09:51:36', 'Your Request has been accepted', 'exports', 28);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `user_type`, `register_date`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '2019-05-28 16:33:52'),
(2, 'customer', '81dc9bdb52d04dc20036dbd8313ed055', 'customer', '2019-05-28 16:36:11'),
(3, 'new user', 'kfmsdkgmsdkmg', 'driver', '2019-05-29 18:51:35'),
(4, 'janedoe', '32214fe3af649796ffa5d8406b4ff256', 'driver', '2019-06-10 14:50:21'),
(5, 'paul123', '2e69f107d4be5f743461cb66d55d5e6e', 'driver', '2019-06-10 15:00:15'),
(6, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'driver', '2019-06-10 15:07:17'),
(8, 'test', '098f6bcd4621d373cade4e832627b4f6', 'customer', '2019-06-28 17:00:50'),
(9, 'bulubulu', 'hahahaha', 'driver', '2019-06-29 08:29:51'),
(10, 'driver', 'e2d45d57c7e2941b65c6ccd64af4223e', 'driver', '2019-07-04 23:54:29'),
(11, 'thaaru', '1cb61e5874a5294a22666242d2413cbb', 'customer', '2019-07-05 05:57:50'),
(12, 'test2', 'ad0234829205b9033196ba818f7a872b', 'customer', '2019-07-05 06:36:19'),
(13, 'test3', '8ad8757baa8564dc136c1e07507f4a98', 'customer', '2019-07-05 07:56:11');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `lorry_no` varchar(10) NOT NULL,
  `trailer_no` varchar(10) NOT NULL,
  `model` varchar(50) NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `visible` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `lorry_no`, `trailer_no`, `model`, `driver_id`, `visible`) VALUES
(1, 'LE-9394', 'TR-9394', 'TATA', 3, 1),
(2, 'LE-9395', 'TR-9395', 'TATA', 4, 1),
(3, 'LE-9396', 'TR-9396', 'RENAULT', 5, 1),
(4, 'LE-9397', 'TR-9397', 'RENAULT', 6, 1),
(7, 'LE-9398', 'TR-9398', 'TATA', 7, 1),
(10, 'LE-9399', 'TR-9399', 'Benz', NULL, 0),
(11, 'LE-9400', 'TR-9400', 'Mercedes ', 8, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indexes for table `exports`
--
ALTER TABLE `exports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `driver_id` (`driver_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `imports`
--
ALTER TABLE `imports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `driver_id` (`driver_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `driver_id` (`driver_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `exports`
--
ALTER TABLE `exports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `imports`
--
ALTER TABLE `imports`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `drivers`
--
ALTER TABLE `drivers`
  ADD CONSTRAINT `drivers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `exports`
--
ALTER TABLE `exports`
  ADD CONSTRAINT `assigned_driver` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`),
  ADD CONSTRAINT `customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `imports`
--
ALTER TABLE `imports`
  ADD CONSTRAINT `customerid` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `driverid` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`);

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `driver_key` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
