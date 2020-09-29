-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2020 at 12:40 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donor`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(16) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`) VALUES
(1, 'adminsays', '$2y$10$aQ0cqfPRaANYUgre4ekU.u8a17MdiWbJ8b0stM8dibX0S5gDtQlDy');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blood_request`
--

CREATE TABLE `tbl_blood_request` (
  `id` int(16) NOT NULL,
  `name` varchar(255) NOT NULL,
  `blood_type` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `priority` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `approve` int(16) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_blood_request`
--

INSERT INTO `tbl_blood_request` (`id`, `name`, `blood_type`, `division`, `contact`, `priority`, `area`, `comment`, `approve`) VALUES
(8, 'Jahid', 'AB positive(+)', 'B-Baa', '+96034234234', 'Normal', 'Villimale', 'ewrwqer', 1),
(9, 'Pathan', 'AB positive(+)', 'Addu City', '+960323423', 'Urgent', 'Hulhumale', 'bbb', 1),
(10, 'Rahim', 'A negative(-)', 'HDh-Haa Dhaalu', '+960243234', 'Urgent', 'Naivaadhoo', 'I need blood', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donors`
--

CREATE TABLE `tbl_donors` (
  `id` int(16) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'upload/default_avatar.jpg',
  `date_of_birth` varchar(255) NOT NULL,
  `age` int(16) NOT NULL,
  `donor_group` varchar(256) NOT NULL,
  `gender` varchar(256) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `other_number` varchar(255) DEFAULT NULL,
  `place` varchar(256) NOT NULL,
  `island` varchar(255) NOT NULL,
  `last_donated` varchar(255) NOT NULL,
  `approve` int(16) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_donors`
--

INSERT INTO `tbl_donors` (`id`, `username`, `password`, `full_name`, `image`, `date_of_birth`, `age`, `donor_group`, `gender`, `mobile_number`, `other_number`, `place`, `island`, `last_donated`, `approve`) VALUES
(1, 'Sajib', '$2y$10$qDikdZA3pe83sy28td7UWekumSLqYXmeuPZSoNQYdwdQfh6kYQBPq', 'Sajib Bhattacherjee', 'upload/default_avatar.jpg', '1997-01-13', 24, 'A positive(+)', 'male', '01876068490', '01516131840', 'Noakhali', 'Chittagong', '2020-01-09', 0),
(2, 'najmul', '$2y$10$VmRM/HgTYwaQOOUox/8vDuyQI2OhScozoRx6zynAxFWi7Nve.XNx6', 'najmul hasan rommans', 'upload/default_avatar.jpg', '2020-01-17', 27, 'AB positive(+)', 'male', '01865420654', '01865420654', 'maijdee', 'comilla', '2018-10-06', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_blood_request`
--
ALTER TABLE `tbl_blood_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_donors`
--
ALTER TABLE `tbl_donors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_blood_request`
--
ALTER TABLE `tbl_blood_request`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_donors`
--
ALTER TABLE `tbl_donors`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
