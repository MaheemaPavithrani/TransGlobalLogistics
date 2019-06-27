-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2019 at 04:33 PM
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
(5, 'Customer 5', '2019-05-01', '1111', 'chocoboy@yahoo.com', 1, '2019-06-19 15:18:33', 5);

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
(3, 'Driver 3', 7894, '2000-04-01', 998, '0773333333', 1, '2019-05-28 16:33:52', 1, 0),
(4, 'Driver 4', 78910, '2019-05-01', 1111, '0764444444', 1, '2019-05-29 18:52:20', 3, 1),
(5, 'Driver 5', 12345, '2019-05-26', 12345, '0715555555', 1, '2019-06-10 14:50:21', 4, 0),
(6, 'Driver 6', 7895, '1987-06-16', 0, '0726666666', 1, '2019-06-10 15:00:15', 5, 0),
(7, 'Driver 7', 7777, '2019-06-10', 1111, '0757777777', 1, '2019-06-10 15:07:17', 6, 0);

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
  `customer_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `declined` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exports`
--

INSERT INTO `exports` (`id`, `container_type`, `pickup_datetime`, `pickup_location`, `loading_port`, `cargo_type`, `weight`, `completed`, `notes`, `driver_id`, `customer_id`, `date`, `declined`) VALUES
(1, '20ft', '2019-06-18 09:00:00', 'Avissawella', 'Colombo', 'Copper', '10200KGS', 1, 'Need as soon as possible', 4, 3, '2019-06-23 08:52:08', 0),
(2, '40ft', '2019-06-27 14:00:00', 'Jaffna', 'Colombo', 'Dates', '10000 KGS', 1, 'None', 6, 4, '2019-06-23 07:08:15', 0),
(3, '20ft', '2019-06-21 10:00:00', 'ABC ', 'Colombo', 'Tea', '10000KGS', 0, 'None', NULL, 4, '2019-06-23 17:24:49', 1),
(4, '20ft', '2019-06-27 09:00:00', 'Nuwaraeliya', 'Colombo', 'Gold', '5000KGS', 1, 'ASAP', 6, 3, '2019-06-23 08:53:22', 0);

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
  `customer_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `declined` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imports`
--

INSERT INTO `imports` (`id`, `container_type`, `container_pickup_datetime`, `container_pickup_location`, `loading_port`, `vessel_arrival_datetime`, `destination`, `cargo_type`, `weight`, `completed`, `notes`, `driver_id`, `customer_id`, `date`, `declined`) VALUES
(1, '20ft', '2019-06-27 12:00:00', 'ABC Containers', 'Colombo', '2019-06-05 16:00:00', 'Ratmalana', 'Chocolates', '8000 KGS', 0, 'Mata wathura ekak denna shudewa', NULL, 4, '2019-06-23 14:39:51', 0),
(2, '20ft', '2019-06-18 13:00:00', 'ABC Containers', 'Colombo', '2019-06-05 16:00:00', 'Kandy', 'Silver', '8000 KGS', 0, 'None', 4, 5, '2019-06-23 08:52:20', 0);

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
(1, 1, 4, 'Cancel Reservation', 1, '2019-06-23 17:24:49', 'No drivers available', '', 0),
(2, 4, 1, 'New Hire Request', 1, '2019-06-27 06:35:32', 'Import from blah blah', 'Import', 3),
(3, 5, 1, 'New Hire Request', 1, '2019-06-27 06:35:38', 'Export from blah blah', 'Export', 4);

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
(1, 'driver', '81dc9bdb52d04dc20036dbd8313ed055', 'driver', '2019-05-28 16:33:52'),
(2, 'customer', '81dc9bdb52d04dc20036dbd8313ed055', 'customer', '2019-05-28 16:36:11'),
(3, 'new user', 'kfmsdkgmsdkmg', 'driver', '2019-05-29 18:51:35'),
(4, 'janedoe', '32214fe3af649796ffa5d8406b4ff256', 'driver', '2019-06-10 14:50:21'),
(5, 'paul123', '2e69f107d4be5f743461cb66d55d5e6e', 'driver', '2019-06-10 15:00:15'),
(6, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'driver', '2019-06-10 15:07:17');

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
(10, 'LE-9399', 'TR-9399', 'Benz', NULL, 0);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `exports`
--
ALTER TABLE `exports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `imports`
--
ALTER TABLE `imports`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

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
