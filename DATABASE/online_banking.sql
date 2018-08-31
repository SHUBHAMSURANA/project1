-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2018 at 02:18 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online banking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(20) NOT NULL,
  `user_name` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `password`) VALUES
(1, 'shubham', '1300');

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary`
--

CREATE TABLE `beneficiary` (
  `id` int(50) NOT NULL,
  `accountno` int(150) NOT NULL,
  `benif1` int(150) NOT NULL,
  `status1` text NOT NULL,
  `benif2` int(150) NOT NULL,
  `status2` text NOT NULL,
  `benif3` int(150) NOT NULL,
  `status3` text NOT NULL,
  `count` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beneficiary`
--

INSERT INTO `beneficiary` (`id`, `accountno`, `benif1`, `status1`, `benif2`, `status2`, `benif3`, `status3`, `count`) VALUES
(1, 712697656, 444482529, '1', 0, '0', 0, '0', 1),
(2, 444482529, 0, '0', 0, '0', 0, '0', 0),
(3, 992080702, 712697656, '1', 0, '0', 0, '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(50) NOT NULL,
  `name` varchar(10) NOT NULL,
  `last` varchar(10) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `accountno` int(150) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `birth` date NOT NULL,
  `account` varchar(50) NOT NULL,
  `mobile` bigint(50) NOT NULL,
  `adhar` bigint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `last`, `email`, `password`, `accountno`, `gender`, `birth`, `account`, `mobile`, `adhar`) VALUES
(14, 'Shubham', 'Surana', 'shubhamsurana1300@gmail.com', '3510eb44deb34b45d4d81d6855af7502', 712697656, 'male', '1996-09-20', 'Current', 9414222410, 741274127412),
(15, 'Tarun', 'Tiwari', 'tarun@gmail.com', '8727786d5f55de7af6500ef0071a12ba', 444482529, 'male', '1990-03-12', 'Saving', 7418529632, 963296329632),
(16, 'Kamal', 'Jain', 'Kamal@gmail.com', '3510eb44deb34b45d4d81d6855af7502', 992080702, 'male', '1996-02-01', 'Current', 7418529631, 123412341234);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(50) NOT NULL,
  `accountno` int(150) NOT NULL,
  `transaction_type` varchar(50) NOT NULL,
  `transaction_to` text NOT NULL,
  `date` text NOT NULL,
  `amount` int(50) NOT NULL,
  `balance` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `accountno`, `transaction_type`, `transaction_to`, `date`, `amount`, `balance`) VALUES
(1, 712697656, 'BANK DEPOSITE', 'SELF', '19-05-2018', 0, 0),
(2, 444482529, 'BANK DEPOSITE', 'SELF', '19-05-2018', 0, 0),
(3, 444482529, 'CASH DEPOSITE BRANCH', 'SELF', '19-05-2018', 1000, 1000),
(4, 712697656, 'DEBIT', '444482529', '19-05-2018', 0, 0),
(5, 444482529, 'CREDIT', '712697656', '19-05-2018', 0, 1000),
(6, 992080702, 'BANK DEPOSITE', 'SELF', '15-06-2018', 0, 0),
(7, 992080702, 'CASH DEPOSITE BRANCH', 'SELF', '15-06-2018', 1000, 1000),
(8, 992080702, 'DEBIT', '712697656', '15-06-2018', 100, 900),
(9, 712697656, 'CREDIT', '992080702', '15-06-2018', 100, 100),
(10, 712697656, 'DEBIT', '444482529', '21-08-2018', 50, 50),
(11, 444482529, 'CREDIT', '712697656', '21-08-2018', 50, 1050),
(12, 712697656, 'DEBIT', '444482529', '21-08-2018', 50, 0),
(13, 444482529, 'CREDIT', '712697656', '21-08-2018', 50, 1100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beneficiary`
--
ALTER TABLE `beneficiary`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `accountno` (`accountno`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`,`accountno`),
  ADD KEY `accountno` (`accountno`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `beneficiary`
--
ALTER TABLE `beneficiary`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `beneficiary`
--
ALTER TABLE `beneficiary`
  ADD CONSTRAINT `beneficiary_ibfk_1` FOREIGN KEY (`accountno`) REFERENCES `customers` (`accountno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
