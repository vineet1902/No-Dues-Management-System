-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2015 at 01:48 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbms2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `name` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `username`, `password`) VALUES
('Admin', 'admin', '9Â¼«¦');

-- --------------------------------------------------------

--
-- Table structure for table `admin_email`
--

CREATE TABLE IF NOT EXISTS `admin_email` (
  `email` varchar(20) NOT NULL,
  `key` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_email`
--

INSERT INTO `admin_email` (`email`, `key`) VALUES
('mohit123', 'CwvYIsdzCA'),
('shubham123', 'uAPMZeBCSn'),
('vineet1902', 'YaYahvfEQK');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE IF NOT EXISTS `email` (
  `roll` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `key` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`roll`, `email`, `key`) VALUES
(120101001, 'jha.abhilash', '4jupWgyMGG'),
(120101002, 's.kunal', 'iTJChA5jbR'),
(120101003, 'p.shubham', 'ejuvHMGZZi'),
(120101029, 'himanshu.goyal', 'SzsvCeLjNn'),
(120101047, 'vineet.pandey', 'aupEVAD5A7'),
(120101048, 'stud1', 'HbG6sKk81N');

-- --------------------------------------------------------

--
-- Table structure for table `hostel_due`
--

CREATE TABLE IF NOT EXISTS `hostel_due` (
  `roll_number` int(20) NOT NULL,
  `due_amount` double NOT NULL,
  `added_by` varchar(20) NOT NULL,
  `added_on` date NOT NULL,
  `reason` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hostel_due`
--

INSERT INTO `hostel_due` (`roll_number`, `due_amount`, `added_by`, `added_on`, `reason`) VALUES
(120101029, 652, 'Admin', '2015-04-06', 'jhdjaghsdjagdhg'),
(120101047, 676, 'Mohit', '2015-04-06', 'sdfs,mdnf,ssdf');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE IF NOT EXISTS `manager` (
  `name` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL,
  `hostel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`name`, `username`, `password`, `role`, `hostel`) VALUES
('Mohit', 'mohit123', 'œ@È¤_yC', 'hostel', 'barak'),
('Shubham', 'shubham123', '¨²s\nßr†', 'mess', 'Barak'),
('Vineet', 'vineet1902', 'l¦Q£S', 'other', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `mess_due`
--

CREATE TABLE IF NOT EXISTS `mess_due` (
  `roll_number` int(20) NOT NULL,
  `due_amount` double NOT NULL,
  `added_by` varchar(20) NOT NULL,
  `added_on` date NOT NULL,
  `reason` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mess_due`
--

INSERT INTO `mess_due` (`roll_number`, `due_amount`, `added_by`, `added_on`, `reason`) VALUES
(120101029, 330, 'Admin', '2015-04-06', 'Hello');

-- --------------------------------------------------------

--
-- Table structure for table `other_due`
--

CREATE TABLE IF NOT EXISTS `other_due` (
  `roll_number` int(20) NOT NULL,
  `due_amount` double NOT NULL,
  `added_by` varchar(20) NOT NULL,
  `added_on` date NOT NULL,
  `reason` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `other_due`
--

INSERT INTO `other_due` (`roll_number`, `due_amount`, `added_by`, `added_on`, `reason`) VALUES
(120101029, 22, 'Admin', '2015-04-06', 'sjdhkajshdkjah'),
(120101047, 12, 'Vineet', '2015-04-06', 'kjsdfhksjdhfkjsdhf');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `name` varchar(20) NOT NULL,
  `roll` int(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hostel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`name`, `roll`, `password`, `hostel`) VALUES
('Abhilash Jha', 120101001, 'døàHr…Ö', 'Siang'),
('Kunal', 120101002, 'Ÿ¹@Sùé', 'Kameng'),
('Shubham Pandey', 120101003, '-ä}gk´Ç', 'Umiam'),
('Himanshu', 120101029, 'í5‹,^x', 'Subansiri'),
('Pandey Vineet', 120101047, '¨²s\nßr†', 'Barak'),
('stud1', 120101048, '¨²s\nßr†', 'barak');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`username`), ADD KEY `username` (`username`);

--
-- Indexes for table `admin_email`
--
ALTER TABLE `admin_email`
 ADD PRIMARY KEY (`email`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
 ADD PRIMARY KEY (`roll`);

--
-- Indexes for table `hostel_due`
--
ALTER TABLE `hostel_due`
 ADD PRIMARY KEY (`roll_number`), ADD KEY `roll_number` (`roll_number`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `mess_due`
--
ALTER TABLE `mess_due`
 ADD PRIMARY KEY (`roll_number`), ADD KEY `roll_number` (`roll_number`);

--
-- Indexes for table `other_due`
--
ALTER TABLE `other_due`
 ADD PRIMARY KEY (`roll_number`), ADD KEY `roll_number` (`roll_number`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`roll`), ADD KEY `roll` (`roll`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_email`
--
ALTER TABLE `admin_email`
ADD CONSTRAINT `admin_email_ibfk_1` FOREIGN KEY (`email`) REFERENCES `manager` (`username`);

--
-- Constraints for table `email`
--
ALTER TABLE `email`
ADD CONSTRAINT `email_ibfk_1` FOREIGN KEY (`roll`) REFERENCES `student` (`roll`);

--
-- Constraints for table `hostel_due`
--
ALTER TABLE `hostel_due`
ADD CONSTRAINT `hostel_due_ibfk_1` FOREIGN KEY (`roll_number`) REFERENCES `student` (`roll`);

--
-- Constraints for table `mess_due`
--
ALTER TABLE `mess_due`
ADD CONSTRAINT `mess_due_ibfk_1` FOREIGN KEY (`roll_number`) REFERENCES `student` (`roll`);

--
-- Constraints for table `other_due`
--
ALTER TABLE `other_due`
ADD CONSTRAINT `other_due_ibfk_1` FOREIGN KEY (`roll_number`) REFERENCES `student` (`roll`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
