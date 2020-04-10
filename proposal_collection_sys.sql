-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2020 at 04:26 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proposal_collection_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE `proposal` (
  `id` int(11) NOT NULL,
  `studentId` varchar(255) NOT NULL,
  `semName` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `projectTittle` varchar(255) NOT NULL,
  `projectDescription` varchar(255) NOT NULL,
  `programingLan` varchar(255) NOT NULL,
  `isApproved` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`id`, `studentId`, `semName`, `year`, `projectTittle`, `projectDescription`, `programingLan`, `isApproved`) VALUES
(1, '173-35-2222', 'FALL-2019', '2019', 'test', 'test', 'java', 'Approve'),
(2, '173-35-2272', 'SPRING-2019', '2019', 'ador test ', 'ador test', 'php', 'Approve'),
(3, '173-35-2268', 'SUMMER-2019', '2019', 'maruf test ', 'maruf test', 'php', 'Reject'),
(8, '173-35-2222', 'SUMMER-2019', '2019', 'test update', 'test update                       ', 'java update', 'Reject');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `studentId` varchar(255) NOT NULL,
  `semName` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `studentId`, `semName`, `year`) VALUES
(1, '173-35-2222', 'SUMMER-2019', '2019'),
(2, '173-35-2272', 'SPRING-2019', '2019'),
(3, '173-35-2268', 'FALL-2019', '2019'),
(4, '173-35-2222', 'SPRING-2019', '2019'),
(6, '173-35-2222', 'FALL-2019', '2019');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `presentAdd` varchar(255) NOT NULL,
  `parmanentAdd` varchar(255) NOT NULL,
  `studentId` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `role`, `email`, `password`, `presentAdd`, `parmanentAdd`, `studentId`) VALUES
(1, 'raju', 'student', 'raju@gmail.com', 'raju', 'test', 'test', '173-35-2222'),
(2, 'rafin', 'teacher', 'rafin@gmail.com', 'rafin', 'test', 'test', ''),
(3, 'maruf islam', 'student', 'maruf@gmail.com', 'maruf', 'maruf test', 'maruf test', '173-35-2222'),
(4, 'ador', 'student', 'ador@gmail.com', 'ador', 'ador test', 'ador test', '173-35-2272'),
(5, 'raju talukder', 'teacher', 'rajuraj@gmail.com', '2268a8f335d6b15dd627ec835c98a811', 'rajuraj', 'rajuraj', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
