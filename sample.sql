-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2018 at 06:59 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sample`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(35) NOT NULL,
  `password` varchar(10) NOT NULL,
  `schoolcode` int(8) NOT NULL,
  `schoolname` varchar(55) NOT NULL,
  `dist` varchar(15) NOT NULL,
  `email` varchar(35) NOT NULL,
  `incharge` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `schoolcode`, `schoolname`, `dist`, `email`, `incharge`) VALUES
('admin', 'admin', 1001, 'Admin', '', 'admin@gmail.com', 'admin'),
('amirtha', 'amirtha', 2180, 'Amirtha Higher Secondary School', 'Chennai', 'amirtha@gmail.com', 'Suresh'),
('balabharathi', 'bala', 2181, 'Bala Bharathi Higher Secondary School', 'Salem', 'balabharathi@gmail.com', 'Ramesh');

-- --------------------------------------------------------

--
-- Table structure for table `studreg`
--

CREATE TABLE `studreg` (
  `regno` varchar(8) NOT NULL,
  `name` varchar(35) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `schoolcode` varchar(8) NOT NULL,
  `schoolname` varchar(55) NOT NULL,
  `dist` varchar(15) NOT NULL,
  `edu` varchar(4) NOT NULL,
  `grpcode` int(3) NOT NULL,
  `subj1` int(3) NOT NULL,
  `subj2` int(3) NOT NULL,
  `subj3` int(3) NOT NULL,
  `subj4` int(3) NOT NULL,
  `subj5` int(3) NOT NULL,
  `subj6` int(3) NOT NULL,
  `pra1` int(2) NOT NULL,
  `pra2` int(2) NOT NULL,
  `pra3` int(2) NOT NULL,
  `total` int(5) NOT NULL,
  `avg` float NOT NULL,
  `res` varchar(4) NOT NULL,
  `cutoff` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studreg`
--

INSERT INTO `studreg` (`regno`, `name`, `dob`, `gender`, `schoolcode`, `schoolname`, `dist`, `edu`, `grpcode`, `subj1`, `subj2`, `subj3`, `subj4`, `subj5`, `subj6`, `pra1`, `pra2`, `pra3`, `total`, `avg`, `res`, `cutoff`) VALUES
('12133001', 'Ajithkumar S', '2000-02-07', 'Male', '2180', 'Amirtha Higher Secondary School', 'Chennai', 'HSC', 103, 189, 192, 197, 128, 135, 131, 50, 50, 50, 1122, 93.5, 'PASS', 181),
('12133002', 'Bharath K', '1999-08-17', 'Male', '2180', 'Amirtha Higher Secondary School', 'Chennai', 'hsc', 103, 122, 138, 150, 61, 72, 120, 50, 50, 50, 813, 67.75, 'PASS', 143.25);

-- --------------------------------------------------------

--
-- Table structure for table `studsslc`
--

CREATE TABLE `studsslc` (
  `regno` varchar(8) NOT NULL,
  `name` varchar(35) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `schoolcode` varchar(8) NOT NULL,
  `schoolname` varchar(55) NOT NULL,
  `dist` varchar(15) NOT NULL,
  `edu` varchar(4) NOT NULL,
  `subj1` int(3) NOT NULL,
  `subj2` int(3) NOT NULL,
  `subj3` int(3) NOT NULL,
  `subj4` int(2) NOT NULL,
  `subj5` int(3) NOT NULL,
  `pra1` int(2) NOT NULL,
  `total` int(3) NOT NULL,
  `avg` float NOT NULL,
  `result` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studsslc`
--

INSERT INTO `studsslc` (`regno`, `name`, `dob`, `gender`, `schoolcode`, `schoolname`, `dist`, `edu`, `subj1`, `subj2`, `subj3`, `subj4`, `subj5`, `pra1`, `total`, `avg`, `result`) VALUES
('34334001', 'Arunkumar S', '2001-11-20', 'Male', '2180', 'Amirtha Higher Secondary School', 'Chennai', 'SSLC', 80, 81, 98, 75, 100, 25, 469, 93.8, 'PASS'),
('34334002', 'Bala K', '2002-02-04', 'Male', '2180', 'Amirtha Higher Secondary School', 'Chennai', 'SSLC', 45, 45, 45, 45, 45, 25, 250, 50, 'PASS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`schoolcode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
