-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2020 at 01:59 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exammap`
--

-- --------------------------------------------------------

--
-- Table structure for table `admnistrateurs`
--

CREATE TABLE `admnistrateurs` (
  `adminID` int(11) NOT NULL,
  `adminName` varchar(100) DEFAULT NULL,
  `adminPassword` varchar(100) DEFAULT NULL,
  `adminRole` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admnistrateurs`
--

INSERT INTO `admnistrateurs` (`adminID`, `adminName`, `adminPassword`, `adminRole`) VALUES
(1, 'AymanBouchareb@Devoir.Ensa', '23071999', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `examens`
--

CREATE TABLE `examens` (
  `examenID` int(11) NOT NULL,
  `testdate` datetime DEFAULT NULL,
  `professeur` int(11) DEFAULT NULL,
  `salle` int(11) DEFAULT NULL,
  `module` int(11) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `examens`
--

INSERT INTO `examens` (`examenID`, `testdate`, `professeur`, `salle`, `module`, `duration`) VALUES
(52, '2020-06-07 12:55:00', 1, 1, 1, 25);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `moduleID` int(11) NOT NULL,
  `moduleName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`moduleID`, `moduleName`) VALUES
(1, 'Analyse 1');

-- --------------------------------------------------------

--
-- Table structure for table `professeurs`
--

CREATE TABLE `professeurs` (
  `professeurID` int(11) NOT NULL,
  `professeurName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `professeurs`
--

INSERT INTO `professeurs` (`professeurID`, `professeurName`) VALUES
(1, 'benkadour abdelhamid'),
(2, 'john doe'),
(3, 'jane doe');

-- --------------------------------------------------------

--
-- Table structure for table `salles`
--

CREATE TABLE `salles` (
  `salleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salles`
--

INSERT INTO `salles` (`salleID`) VALUES
(1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admnistrateurs`
--
ALTER TABLE `admnistrateurs`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `examens`
--
ALTER TABLE `examens`
  ADD PRIMARY KEY (`examenID`),
  ADD KEY `professeur` (`professeur`),
  ADD KEY `salle` (`salle`),
  ADD KEY `module` (`module`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`moduleID`);

--
-- Indexes for table `professeurs`
--
ALTER TABLE `professeurs`
  ADD PRIMARY KEY (`professeurID`);

--
-- Indexes for table `salles`
--
ALTER TABLE `salles`
  ADD PRIMARY KEY (`salleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admnistrateurs`
--
ALTER TABLE `admnistrateurs`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `examens`
--
ALTER TABLE `examens`
  MODIFY `examenID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `moduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `professeurs`
--
ALTER TABLE `professeurs`
  MODIFY `professeurID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `salles`
--
ALTER TABLE `salles`
  MODIFY `salleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `examens`
--
ALTER TABLE `examens`
  ADD CONSTRAINT `examens_ibfk_1` FOREIGN KEY (`professeur`) REFERENCES `professeurs` (`professeurID`),
  ADD CONSTRAINT `examens_ibfk_2` FOREIGN KEY (`salle`) REFERENCES `salles` (`salleID`),
  ADD CONSTRAINT `examens_ibfk_3` FOREIGN KEY (`module`) REFERENCES `modules` (`moduleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
