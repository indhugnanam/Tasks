-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 19, 2020 at 03:19 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Master`
--

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

DROP TABLE IF EXISTS `Category`;
CREATE TABLE IF NOT EXISTS `Category` (
  `Category_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Category_Name` varchar(256) NOT NULL,
  `Status` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`Category_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`Category_Id`, `Category_Name`, `Status`) VALUES
(1, 'Fruits', 'A'),
(2, 'Vegtables', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

DROP TABLE IF EXISTS `Products`;
CREATE TABLE IF NOT EXISTS `Products` (
  `Product_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Sub_Id` int(11) NOT NULL,
  `Product_Name` varchar(60) NOT NULL,
  `Price` float(10,2) NOT NULL,
  `Image` varchar(256) NOT NULL,
  `Status` char(1) NOT NULL,
  PRIMARY KEY (`Product_Id`),
  KEY `Sub_Id` (`Sub_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Dumping data for table `Category`
--

INSERT INTO `Products` (`Product_Id`, `Sub_Id`, `Product_Name`, `Price`, `Image`, `Status`) VALUES
(1, 11, 'Ooty', 70.00, '617qaBE4XVL__SX425_2.jpg', 'A'),
(2, 11, 'Simla', 90.00, 'AMAZING-CAULIFLOWER-SEED1.jpg', 'A'),
(3, 11, 'Simla', 90.00, 'AMAZING-CAULIFLOWER-SEED1.jpg', 'A');
-- --------------------------------------------------------

--
-- Table structure for table `Sub_Category`
--

DROP TABLE IF EXISTS `Sub_Category`;
CREATE TABLE IF NOT EXISTS `Sub_Category` (
  `Sub_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Category_Id` int(11) NOT NULL,
  `Sub_Name` varchar(50) NOT NULL,
  `Status` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`Sub_Id`),
  KEY `sub_category_ibfk_1` (`Category_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`Sub_Id`, `Category_Id`, `Sub_Name`, `Status`) VALUES
(11, 1, 'Apple', 'A'),
(12, 1, 'Orange', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
CREATE TABLE IF NOT EXISTS `User` (
  `User_Id` varchar(15) NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Mobile` bigint(20) NOT NULL,
  `Status` char(1) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `Role` char(1) NOT NULL,
  PRIMARY KEY (`User_Id`),
  UNIQUE KEY `Mobile` (`Mobile`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`User_Id`, `First_Name`, `Last_Name`, `Email`, `Mobile`, `Status`, `Password`, `Role`) VALUES
('MIU000001', 'Abc','','', 1234567890,'A', '123456', 'A'),
('MIU000002', 'QWE', '', '', 9876543210, 'A', '123456', 'U');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Products`
--
ALTER TABLE `Products`
  ADD CONSTRAINT `Products_ibfk_1` FOREIGN KEY (`Sub_Id`) REFERENCES `Sub_Category` (`Sub_Id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `Sub_Category`
--
ALTER TABLE `Sub_Category`
  ADD CONSTRAINT `Sub_Category_ibfk_1` FOREIGN KEY (`Category_Id`) REFERENCES `Category` (`Category_Id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
