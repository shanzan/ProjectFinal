-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2016 at 04:58 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bikersgadget`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fno` int(11) NOT NULL,
  `fname` varchar(300) NOT NULL,
  `femail` varchar(300) NOT NULL,
  `ffeddback` varchar(300) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `productcatagory`
--

CREATE TABLE `productcatagory` (
  `catagoryId` int(6) UNSIGNED NOT NULL,
  `catagoryName` varchar(30) NOT NULL,
  `catagoryInformation` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `productinformation`
--

CREATE TABLE `productinformation` (
  `productId` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `productInformation` varchar(200) NOT NULL,
  `insertdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `catagoryId` int(11) NOT NULL,
  `productPrice` int(20) NOT NULL,
  `totalorder` int(20) NOT NULL,
  `imagename` varchar(300) NOT NULL,
  `availableitem` int(20) NOT NULL,
  `totalviewp` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temporder`
--

CREATE TABLE `temporder` (
  `temporderID` int(10) NOT NULL,
  `userid` int(20) NOT NULL,
  `ProductName` varchar(300) NOT NULL,
  `OrderDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Price` int(20) NOT NULL,
  `noofitem` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userinformation`
--

CREATE TABLE `userinformation` (
  `userid` int(6) UNSIGNED NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userpassward` varchar(300) NOT NULL,
  `userAddress` varchar(30) NOT NULL,
  `userEmail` varchar(50) DEFAULT NULL,
  `userage` varchar(6) DEFAULT NULL,
  `userPhnNo` varchar(14) DEFAULT NULL,
  `userBkashNo` varchar(14) DEFAULT NULL,
  `userBike` varchar(30) DEFAULT NULL,
  `userDesiredBike` varchar(30) DEFAULT NULL,
  `userviews` int(6) DEFAULT NULL,
  `userOrder` int(6) DEFAULT NULL,
  `signUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usertype` tinyint(1) NOT NULL,
  `totaltransit` int(30) NOT NULL,
  `totalproduct` int(30) NOT NULL,
  `getinvoice` tinyint(1) NOT NULL,
  `feedBack` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userorder`
--

CREATE TABLE `userorder` (
  `orderid` int(6) UNSIGNED NOT NULL,
  `userId` int(6) DEFAULT NULL,
  `productId` int(6) DEFAULT NULL,
  `orderDate` date NOT NULL,
  `deliverydayDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `totalitemno` int(200) NOT NULL,
  `totalprice` int(200) NOT NULL,
  `deliveredornot` tinyint(1) NOT NULL,
  `customerinvoice` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fno`);

--
-- Indexes for table `productcatagory`
--
ALTER TABLE `productcatagory`
  ADD PRIMARY KEY (`catagoryId`);

--
-- Indexes for table `productinformation`
--
ALTER TABLE `productinformation`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `temporder`
--
ALTER TABLE `temporder`
  ADD PRIMARY KEY (`temporderID`);

--
-- Indexes for table `userinformation`
--
ALTER TABLE `userinformation`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `userorder`
--
ALTER TABLE `userorder`
  ADD PRIMARY KEY (`orderid`),
  ADD KEY `userId` (`userId`),
  ADD KEY `userId_2` (`userId`),
  ADD KEY `userId_3` (`userId`),
  ADD KEY `productId` (`productId`),
  ADD KEY `userId_4` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fno` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `productcatagory`
--
ALTER TABLE `productcatagory`
  MODIFY `catagoryId` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `productinformation`
--
ALTER TABLE `productinformation`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `temporder`
--
ALTER TABLE `temporder`
  MODIFY `temporderID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `userinformation`
--
ALTER TABLE `userinformation`
  MODIFY `userid` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `userorder`
--
ALTER TABLE `userorder`
  MODIFY `orderid` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
