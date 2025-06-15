-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2025 at 03:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acecourt_membership`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `phoneNum` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingId` int(11) NOT NULL,
  `bookingDate` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `totalPrice` decimal(10,2) DEFAULT NULL,
  `memberId` int(11) DEFAULT NULL,
  `adminId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `bookingDetailsId` int(11) NOT NULL,
  `bookingId` int(11) DEFAULT NULL,
  `courtId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `court`
--

CREATE TABLE `court` (
  `courtId` int(11) NOT NULL,
  `courtName` varchar(100) NOT NULL,
  `courtType` varchar(50) DEFAULT NULL,
  `pricePerHour` decimal(10,2) DEFAULT NULL,
  `availability` enum('Available','Unavailable') DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `memberId` int(11) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `email` varchar(100) NOT NULL,
  `phoneNum` varchar(20) DEFAULT NULL,
  `joinDate` date DEFAULT curdate(),
  `member_type` varchar(50) DEFAULT NULL,
  `member_fee` decimal(10,2) DEFAULT NULL,
  `expiryDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`memberId`, `fullName`, `password`, `gender`, `email`, `phoneNum`, `joinDate`, `member_type`, `member_fee`, `expiryDate`) VALUES
(1, 'Siti Saerah Binti Daiman', '$2y$10$/B.ClzyrOGH/HAvF0b6Ufu3O2jqU1QInnDpbtA1kVHsf7GIfdZ.By', 'Female', 'erahDaiman@gmail.com', '0166788252', '2025-06-14', NULL, NULL, NULL),
(3, 'Nilam Araleane', '$2y$10$rtTtHi/re9zznG69rilBxebvIW6N/zXIsZIQhZ5iK8/qWbXNrfj.2', 'Female', 'wasinezm20@gmail.com', '0127662351', '2025-06-14', NULL, NULL, NULL),
(4, 'Nilam Araleane', '$2y$10$XeiaLdIuOnXqv453NzMSOeU0kUz4eTLT5zqYmvuKN1tz.s8GBoWka', 'Female', 'snzuhairah20@gmail.com', '0123456789', '2025-06-14', NULL, NULL, NULL),
(5, 'Nur Aqila binti Azmawi', '$2y$10$ipOZ1GRWwB6d/Fhjf2cBG.KG/DosQIejG.9GlyVKYod3ayTFUxQZm', 'Female', 'aqilaazmawi@gmail.com', '0176495640', '2025-06-14', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentId` int(11) NOT NULL,
  `paymentDate` date NOT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `memberId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingId`),
  ADD KEY `memberId` (`memberId`),
  ADD KEY `adminId` (`adminId`);

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`bookingDetailsId`),
  ADD KEY `bookingId` (`bookingId`),
  ADD KEY `courtId` (`courtId`);

--
-- Indexes for table `court`
--
ALTER TABLE `court`
  ADD PRIMARY KEY (`courtId`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`memberId`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentId`),
  ADD KEY `memberId` (`memberId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `bookingDetailsId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `court`
--
ALTER TABLE `court`
  MODIFY `courtId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `memberId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentId` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`memberId`) REFERENCES `member` (`memberId`) ON DELETE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`adminId`) REFERENCES `admin` (`adminId`) ON DELETE SET NULL;

--
-- Constraints for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD CONSTRAINT `booking_details_ibfk_1` FOREIGN KEY (`bookingId`) REFERENCES `booking` (`bookingId`) ON DELETE CASCADE,
  ADD CONSTRAINT `booking_details_ibfk_2` FOREIGN KEY (`courtId`) REFERENCES `court` (`courtId`) ON DELETE SET NULL;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`memberId`) REFERENCES `member` (`memberId`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
