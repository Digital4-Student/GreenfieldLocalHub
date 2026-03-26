-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2026 at 01:27 PM
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
-- Database: `glh`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `PhoneNumber` int(11) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `CustomerID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`FirstName`, `LastName`, `Email`, `Password`, `PhoneNumber`, `Address`, `CustomerID`) VALUES
('John', 'Doe', 'John@email.com', '$2y$10$hAxYzyBlDjL2Ebxek8PsUulUx8m4ffhZz2UCXCnUOHz.DjjuLEpSi', 0, '', 1),
('Joe', 'Farmer', 'Farmer@email.com', '$2y$10$f2KExjhYVtCxSsHJGu1Z..FYKeBctTKXFgnb5AON0djNlzNV/yk.2', 0, '', 3),
('Jane', 'Doe', 'Doe@email.com', '$2y$10$8x65BY0EEdoZKL7Q9KIMre0CfeGCUSFWFyyv02VcgpuhX0HY7P1be', 0, '', 4);

--
-- Triggers `customer`
--
DELIMITER $$
CREATE TRIGGER `registration` AFTER INSERT ON `customer` FOR EACH ROW INSERT INTO role (CustomerID)
VALUES (NEW.CustomerID)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `roleID` int(11) NOT NULL,
  `roles` enum('user','farmer','admin') DEFAULT 'user',
  `CustomerID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleID`, `roles`, `CustomerID`) VALUES
(4, 'admin', 1),
(5, 'farmer', 3),
(6, 'user', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`roleID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `roleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `role_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
