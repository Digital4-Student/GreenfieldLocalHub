-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2026 at 01:25 PM
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
('Joen', 'Farmer', 'Farmer@email.com', '$2y$10$f2KExjhYVtCxSsHJGu1Z..FYKeBctTKXFgnb5AON0djNlzNV/yk.2', 0, '', 3),
('Jane', 'Doe', 'Doe@email.com', '$2y$10$8x65BY0EEdoZKL7Q9KIMre0CfeGCUSFWFyyv02VcgpuhX0HY7P1be', 0, '', 4),
('Dale', 'Farm', 'Dale@mail.com', '$2y$10$PTtU97cRp8Hh/8PAadZZWed7sclwH4VKtOZtzX6IlGg.1CAjL91hC', 0, '', 5);

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
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `FarmerID` int(11) NOT NULL,
  `FarmerName` varchar(255) DEFAULT NULL,
  `FDescription` text DEFAULT NULL,
  `FImg` text NOT NULL,
  `CustomerID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`FarmerID`, `FarmerName`, `FDescription`, `FImg`, `CustomerID`) VALUES
(9, 'Joe Farmer', 'I am a humble farmer with lots of cows, chickens and pigs. They all ranch daily in the fields and get plenty of sun.', 'https://www.cpre.org.uk/wp-content/uploads/2019/11/farming-topic.jpg', 3),
(10, 'Jane Doe', 'I like to grow a lot of fruit and veg, grow them chemical free so crops may variy ', '', 4),
(11, 'Dale Farm', 'I like to sell fish, I catch them from the local river', 'https://www.farmersguide.co.uk/wp-content/uploads/2025/09/Editorial-10-1.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(255) DEFAULT NULL,
  `Stock` int(11) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `PDescription` text DEFAULT NULL,
  `PImg` text NOT NULL,
  `FarmerID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `ProductName`, `Stock`, `Price`, `PDescription`, `PImg`, `FarmerID`) VALUES
(3, 'Beef chunks', 32, 13.00, 'Ranch owned beef chunks', 'https://www.lovefoodhatewaste.com/sites/default/files/styles/16_9_two_column/public/2022-08/Beef-sh344681603.jpg.webp?itok=qenlRZUs', 9);

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
(6, 'farmer', 4),
(7, 'farmer', 5);

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
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`FarmerID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `FarmerID` (`FarmerID`);

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
  MODIFY `CustomerID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `FarmerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `roleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `farmer`
--
ALTER TABLE `farmer`
  ADD CONSTRAINT `farmer_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`FarmerID`) REFERENCES `farmer` (`FarmerID`);

--
-- Constraints for table `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `role_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
