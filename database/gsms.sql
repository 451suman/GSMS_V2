-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2023 at 11:45 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gsms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(225) NOT NULL,
  `name` varchar(21) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `name`, `email`, `password`, `phone`, `date`) VALUES
(1, 'Alexis Cabrera', 'admin@gmail.com', '7ece99e593ff5dd200e2b9233d9ba654', 1234567890, '2023-09-18 19:39:10');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(11) NOT NULL,
  `package_name` varchar(20) NOT NULL,
  `cname` varchar(20) NOT NULL DEFAULT 'Gym',
  `duration` int(11) NOT NULL,
  `package_price` int(30) NOT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `package_name`, `cname`, `duration`, `package_price`, `image`) VALUES
(2, 'Ryder Case', 'Guy Nunez', 2, 2000, 'wallpaperflare.com_wallpaper (1).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `eid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `verified` varchar(10) NOT NULL DEFAULT 'no',
  `edate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`eid`, `mid`, `cid`, `verified`, `edate`) VALUES
(4, 3, 2, 'yes', '2023-11-16 16:19:45');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `mid` int(11) NOT NULL,
  `name` varchar(21) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `email` varchar(31) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(500) NOT NULL DEFAULT 'offline',
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `image` varchar(1100) DEFAULT 'defaultuser.jpg',
  `m_otp` varchar(225) NOT NULL,
  `m_opt_expire_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`mid`, `name`, `phone`, `email`, `password`, `status`, `date`, `image`, `m_otp`, `m_opt_expire_time`) VALUES
(3, 'Colton Serrano', 1234567890, 'zikazaqu@mailinator.com', '3a2a5ce900c7489c2112302b646bdef3', 'offline', '2023-11-16 16:19:23', 'defaultuser.jpg', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `member_subscription_track`
--

CREATE TABLE `member_subscription_track` (
  `msid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `renew_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `expiry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member_subscription_track`
--

INSERT INTO `member_subscription_track` (`msid`, `mid`, `renew_date`, `expiry_date`) VALUES
(2, 3, '2023-11-16 16:20:19', '2024-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `package_name` varchar(100) NOT NULL,
  `duration` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pid`, `mid`, `cname`, `package_name`, `duration`, `price`, `date`) VALUES
(4, 3, 'Guy Nunez', 'Ryder Case', 2, 2000, '2023-11-16 16:20:19');

-- --------------------------------------------------------

--
-- Table structure for table `routine`
--

CREATE TABLE `routine` (
  `rid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `chest` varchar(500) DEFAULT NULL,
  `back` varchar(500) DEFAULT NULL,
  `soulder` varchar(500) DEFAULT NULL,
  `biseps` varchar(500) DEFAULT NULL,
  `triceps` varchar(500) DEFAULT NULL,
  `leg` varchar(500) DEFAULT NULL,
  `abs` varchar(500) DEFAULT NULL,
  `verify` varchar(4) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`eid`),
  ADD KEY `mid` (`mid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `member_subscription_track`
--
ALTER TABLE `member_subscription_track`
  ADD PRIMARY KEY (`msid`),
  ADD UNIQUE KEY `mid` (`mid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `mid` (`mid`);

--
-- Indexes for table `routine`
--
ALTER TABLE `routine`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `routine_ibfk_1` (`mid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `member_subscription_track`
--
ALTER TABLE `member_subscription_track`
  MODIFY `msid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `routine`
--
ALTER TABLE `routine`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD CONSTRAINT `enrollment_ibfk_2` FOREIGN KEY (`mid`) REFERENCES `member` (`mid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enrollment_ibfk_3` FOREIGN KEY (`cid`) REFERENCES `category` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `member_subscription_track`
--
ALTER TABLE `member_subscription_track`
  ADD CONSTRAINT `member_subscription_track_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `member` (`mid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `member` (`mid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `routine`
--
ALTER TABLE `routine`
  ADD CONSTRAINT `routine_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `member` (`mid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
