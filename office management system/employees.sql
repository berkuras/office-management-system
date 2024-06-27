-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2022 at 06:37 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employees`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `deptId` int(10) NOT NULL,
  `deptName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`deptId`, `deptName`) VALUES
(1, 'admin'),
(2, 'accountant'),
(3, 'manager'),
(4, 'marketer'),
(5, 'secretary'),
(6, 'others');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `userId` int(10) NOT NULL,
  `deptId` varchar(100) NOT NULL,
  `tId` int(100) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `userPwd` varchar(10) NOT NULL,
  `empSal` int(5) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phoneNo` int(100) NOT NULL,
  `tName` varchar(100) NOT NULL,
  `tDesc` text NOT NULL,
  `tProg` varchar(10) NOT NULL,
  `priority` varchar(10) NOT NULL,
  `ddate` date NOT NULL,
  `hire_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`userId`, `deptId`, `tId`, `userName`, `userPwd`, `empSal`, `email`, `phoneNo`, `tName`, `tDesc`, `tProg`, `priority`, `ddate`, `hire_date`) VALUES
(1, 'admin', 0, 'Jay', 'admin', 0, 'admin@email.com', 1232435, '', '', 'doing', 'high', '0000-00-00', '2022-05-17 11:46:01'),
(2, 'manager', 0, 'Michael', 'manager', 0, 'mike@email.com', 0, '', '', '0', '', '0000-00-00', '2022-05-16 08:48:53'),
(3, 'accountant', 0, 'Emma', 'accountant', 0, 'emma@email.com', 0, '', '', '0', '', '0000-00-00', '2022-05-16 08:49:04'),
(4, 'marketer', 0, 'Hamza', 'marketer', 0, 'hamza@email.com', 0, '', '', '0', '', '0000-00-00', '2022-05-16 08:49:13'),
(5, 'secretary', 0, 'Ola', 'secretary', 0, 'ola@email.com', 0, '', '', '0', '', '0000-00-00', '2022-05-16 08:49:50'),
(6, 'others', 0, 'Victor', 'others', 0, 'oth@email.com', 0, '', '', '0', 'med', '0000-00-00', '2022-05-16 11:47:16'),
(21, 'MANAGER', 0, 'Ali', '$2y$10$tvA', 0, 'hocam@email.com', 667778, '', '', 'todo', 'high', '0000-00-00', '2022-05-17 11:45:35');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `tId` int(10) NOT NULL,
  `userId` int(100) NOT NULL,
  `tName` varchar(100) NOT NULL,
  `tDesc` text NOT NULL,
  `tprog` int(10) NOT NULL,
  `priority` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`tId`, `userId`, `tName`, `tDesc`, `tprog`, `priority`) VALUES
(5, 0, 'man', 'man', 0, 'high');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`deptId`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`tId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `deptId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `userId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `tId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
