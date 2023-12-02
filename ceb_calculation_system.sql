-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 12, 2023 at 12:22 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ceb_calculation_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `consumption_rates`
--

CREATE TABLE `consumption_rates` (
  `id` int(64) NOT NULL,
  `usersId` int(32) NOT NULL,
  `calculation_date` date NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `consumption_value` decimal(10,2) NOT NULL,
  `consumption_charge` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consumption_rates`
--

INSERT INTO `consumption_rates` (`id`, `usersId`, `calculation_date`, `start_date`, `end_date`, `consumption_value`, `consumption_charge`) VALUES
(1, 5, '2023-11-11', '2023-11-10', '2023-11-15', 232.00, 23.20),
(2, 5, '2023-11-11', '2023-11-10', '2023-11-15', 232.00, 23.20),
(3, 5, '2023-11-11', '2023-11-01', '2023-11-02', 20.00, 200.00),
(4, 5, '2023-11-11', '2023-11-01', '2023-11-02', 20.00, 200.00),
(5, 5, '2023-11-12', '2023-11-01', '2023-11-02', 20.00, 200.00),
(6, 5, '2023-11-12', '2023-11-01', '2023-11-02', 20.00, 200.00),
(7, 5, '2023-11-12', '0000-00-00', '2023-11-10', 123.00, 6150.00),
(8, 5, '2023-11-12', '0000-00-00', '2023-11-10', 123.00, 6150.00),
(9, 5, '2023-11-12', '2023-11-01', '2023-11-02', 20.00, 200.00),
(10, 5, '2023-11-12', '2023-11-01', '2023-11-02', 20.00, 200.00),
(11, 5, '2023-11-12', '2023-11-17', '2023-11-18', 75.00, 2250.00),
(12, 5, '2023-11-12', '2023-11-17', '2023-11-18', 75.00, 2250.00),
(13, 5, '2023-11-12', '2023-11-22', '2023-11-23', 59.00, 1180.00);

-- --------------------------------------------------------

--
-- Table structure for table `meter_readings`
--

CREATE TABLE `meter_readings` (
  `id` int(12) NOT NULL,
  `usersId` int(12) NOT NULL,
  `reading_date` date NOT NULL,
  `reading_value` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meter_readings`
--

INSERT INTO `meter_readings` (`id`, `usersId`, `reading_date`, `reading_value`) VALUES
(1, 5, '2023-11-10', 123),
(2, 6, '2023-11-11', 42344),
(3, 7, '2023-11-12', 1245),
(4, 7, '2023-11-12', 5454),
(5, 5, '2023-11-15', 355),
(6, 5, '0000-00-00', 0),
(7, 5, '0000-00-00', 0),
(8, 5, '2023-11-01', 100),
(9, 5, '2023-11-02', 120),
(10, 5, '2023-11-17', 2520),
(11, 5, '2023-11-17', 2520),
(12, 5, '2023-11-18', 2595),
(13, 5, '2023-11-22', 2500),
(14, 5, '2023-11-23', 2559);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersId` int(12) NOT NULL,
  `usersName` varchar(32) NOT NULL,
  `usersEmail` varchar(32) NOT NULL,
  `usersUid` varchar(32) NOT NULL,
  `usersPassword` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `usersName`, `usersEmail`, `usersUid`, `usersPassword`) VALUES
(1, 'ishan', '99ishanweerakoon@gmail.com', 'ishan', '$2y$10$WscMYCtKk9kcykrzgB/yneDYC'),
(2, 'namal', 'namal@gmail.com', 'naml', '$2y$10$qAAndptx3lW75epRALOEMOBRc'),
(3, 'ishan', 'ish@gmail.com', 'ish', '$2y$10$ly97Rh9sZtHJ0.nu484NeeWxB'),
(4, 'nipun', 'nipun@gmail.com', 'nipun', '$2y$10$0DUjzoY73xHs1j6/FeJTXehdw'),
(5, 'isuru', 'isuru123@gmail.com', 'isuru', '$2y$10$BoywaELp1.maXnOh9Uv4KOq/1nNjl6A.E1P4.SBxGGc9EzDYJ1yu6'),
(6, 'udara', 'udara@gmail.com', 'udara', '$2y$10$gh5fMlV0PhwmU.jb.TKpNeczETjcvZrk9XZearJ/uPWY0FtE/GUBi'),
(7, 'kushan', 'kushan123@gmail.com', 'kushan', '$2y$10$nHqV3EitEH1bUaaadwR7veyquiR7YG5TzChqAIzoFoA0dM99ic9Pe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consumption_rates`
--
ALTER TABLE `consumption_rates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `consumption_fk` (`usersId`);

--
-- Indexes for table `meter_readings`
--
ALTER TABLE `meter_readings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users` (`usersId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consumption_rates`
--
ALTER TABLE `consumption_rates`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `meter_readings`
--
ALTER TABLE `meter_readings`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `consumption_rates`
--
ALTER TABLE `consumption_rates`
  ADD CONSTRAINT `consumption_fk` FOREIGN KEY (`usersId`) REFERENCES `users` (`usersId`);

--
-- Constraints for table `meter_readings`
--
ALTER TABLE `meter_readings`
  ADD CONSTRAINT `fk_users` FOREIGN KEY (`usersId`) REFERENCES `users` (`usersId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
