-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 17, 2020 at 04:43 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tcs`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `fName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `nid` int(50) NOT NULL,
  `phone` int(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(50) NOT NULL,
  `userAddress` varchar(200) NOT NULL,
  `accountType` varchar(50) DEFAULT NULL,
  `userImage` varchar(100) DEFAULT NULL,
  `accountStatus` int(11) DEFAULT NULL,
  PRIMARY KEY (`nid`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `fName`, `lName`, `pwd`, `nid`, `phone`, `email`, `dob`, `gender`, `userAddress`, `accountType`, `userImage`, `accountStatus`) VALUES
(1, 'Nazmus', 'Sakib', '$2y$10$qQpNxcA6aZx/.66yyDzuP..B0RbIx1xTnND5i6rnUK4NL8cXw1Ejq', 1, 1, 'nazmus@gmail.com', '1985-07-07', 'male', 'Uttara', 'admin', 'images (12).jpg', NULL),
(2, 'Sajib', 'Ahmed', '$2y$10$KcvEJGDnzzloLmfxIS2HJeLkPNtoQ7ariNUdeGoOiQF6JNiBoWLwG', 2, 2, 'sajib@gmail.com', '1989-04-03', 'male', 'Mohammadpur', 'admin', 'images (19).jpg', NULL),
(3, 'Rafiqul', 'Islam', '$2y$10$Upp3SztrNBtzLVYk1rCcsuL947YVEw7tfmlUuW9SPxFlh5V.R1Wxq', 3, 3, 'rafiqul@gmail.com', '1983-11-05', 'male', 'Mirpur', 'admin', 'images (14).jpg', NULL),
(4, 'Mamunur', 'Rashid', '$2y$10$vpOF20uUe0WyohuRFat/ueo0gbP8sLS0H19WvGcJFF850fgRL9tsS', 4, 4, 'mamunur@gmail.com', '1975-10-23', 'male', 'Uttara', NULL, 'images (4).jpg', NULL),
(5, 'Habibur', 'Rahman', '$2y$10$tmkQZP5MZjwNBsuccbqMruodl7sP7YeZ8UcTLcp1B3duYjMY8ijzy', 5, 5, 'habibur@gmail.com', '1963-12-12', 'male', 'Mohammadpur', NULL, 'images (11).jpg', NULL),
(6, 'Jahir', 'Ahmed', '$2y$10$Kp1w8Wx4BJFxCNZr.wrX2eHyiuJ13xOo4k/yVOJKIHYjfdAFSvD6O', 6, 6, 'jahir@gmail.com', '1954-06-27', 'male', 'basundhara', NULL, 'images (3).jpg', NULL),
(7, 'Rakibul', 'Hasan', '$2y$10$j7WhmZJcSU8up28ZvfVKweSBF7Iw9ZbwV7kTAFaJnq/nlVTGws5bC', 7, 7, 'rakibul@gmail.com', '1947-05-12', 'male', 'Mohakhali', NULL, 'images (17).jpg', NULL),
(8, 'Enamul', 'Karim', '$2y$10$cypQIEX2efdRIPNi4MQO5.ly5wtEMokyIxyjL9tCS94qyzzkq8bwG', 8, 8, 'enamul@gmail.com', '1985-05-05', 'male', 'Rampura', NULL, 'images (5).jpg', NULL),
(9, 'Aminul', 'Islam', '$2y$10$ZrKSQi.VciZxk/14iFV2reJk8hsn4PFIi1kMzD4kMBgfhVpZ4gH2q', 9, 9, 'aminul@gmail.com', '1983-01-01', 'male', 'Basabo', NULL, 'images (2).jpg', NULL),
(10, 'Ahsan', 'Habib', '$2y$10$Vz2.th0fX4QT2/AfGsOILuWZGA/RmgfvqKjjtNUcZ5J5SoM0LQStq', 10, 10, 'ahsan@gmail.com', '1987-02-20', 'male', 'Jatrabari', NULL, 'images (18).jpg', NULL),
(11, 'Mizanur', 'Rahman', '$2y$10$Klf625cXc.UfJx1tojj1wereHkKQ/k/FHMbADpi60V/gSPOAG62Ee', 11, 11, 'mizanur@gmail.com', '1978-03-31', 'male', 'Uttara', NULL, 'images (10).jpg', NULL),
(12, 'Masudul', 'Haque', '$2y$10$z23aiqBkhFqIqvuqnEM9q.fcV.N70oA5czJ0gR4N/O1/EXYKwCb6.', 12, 12, 'masudul@gmail.com', '1979-09-14', 'male', 'Banani', NULL, 'images (15).jpg', NULL),
(13, 'Azmal', 'Hossein', '$2y$10$KPc7LglLaVJKtx80lJ12a.8moWc7n9B9mQpNkz4/kvwZB/UsVfQV.', 13, 13, 'azmal@gmail.com', '1986-09-09', 'male', 'Gulshan', NULL, 'user1.jpg', NULL),
(14, 'Asif', 'Ahmed', '$2y$10$GnurB8NXEWkQ.879FMsisOLTliTgaYcyn71YdWxR2x0kMp1E4sdra', 14, 14, 'asif@gmail.com', '1984-05-14', 'male', 'Khilkhet', NULL, 'user2.jpg', NULL),
(15, 'Rashedul', 'Hasan', '$2y$10$9qRFB2Yzpml.93PmZCXoa.LiWgTgSv2ntRlN7PSoILydv8m1m/aEy', 15, 15, 'rashedul@gmail.com', '1976-06-06', 'male', 'Tejgaon', NULL, 'images (8).jpg', NULL),
(16, 'Bashir', 'Ahmed', '$2y$10$GPXyNQcJLkiI8LDgzKFYnOSii.7WBBLrcdJo1Gw3KxdnEbYSfC6L.', 16, 16, 'bashir@gmail.com', '1973-01-04', 'male', 'Uttara', NULL, 'images (16).jpg', NULL),
(17, 'Rezwan', 'Ahmed', '$2y$10$IIO6URT6i0pIOAZrRTq7X.I/w7kBhpPlP9EqvOiKFvys4upnfGz7y', 17, 17, 'rezwan@gmail.com', '1987-12-27', 'male', 'Mirpur', NULL, 'images (19).jpg', NULL),
(18, 'Anik', 'Hasan', '$2y$10$XOakoVtABE0gzofk.MTdBuNltyYUHbwagSHaPAwjn5.bZf08ErB42', 18, 18, 'anik@gmail.com', '1987-11-03', 'male', 'Arambagh', NULL, 'images (18).jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `agreement`
--

DROP TABLE IF EXISTS `agreement`;
CREATE TABLE IF NOT EXISTS `agreement` (
  `agreementId` int(11) NOT NULL AUTO_INCREMENT,
  `apartmentId` int(11) DEFAULT NULL,
  `buildingType` varchar(100) DEFAULT NULL,
  `floorNum` int(11) DEFAULT NULL,
  `facilities` varchar(200) DEFAULT NULL,
  `description` varchar(400) DEFAULT NULL,
  `rentalCost` int(11) DEFAULT NULL,
  `paymentTime` varchar(100) DEFAULT NULL,
  `advancePayment` int(11) DEFAULT NULL,
  `apartmentImage` varchar(100) DEFAULT NULL,
  `apartmentAddress` varchar(400) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `ownerStatus` int(11) DEFAULT NULL,
  `tenantStatus` int(11) DEFAULT NULL,
  `agreementStatus` int(11) DEFAULT NULL,
  PRIMARY KEY (`agreementId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agreement`
--

INSERT INTO `agreement` (`agreementId`, `apartmentId`, `buildingType`, `floorNum`, `facilities`, `description`, `rentalCost`, `paymentTime`, `advancePayment`, `apartmentImage`, `apartmentAddress`, `startDate`, `endDate`, `ownerStatus`, `tenantStatus`, `agreementStatus`) VALUES
(1, 1, 'Multi-storey building', 7, 'Lift, garrage, Security guard', '5th floor right side, 3 bedrooms, 3 bathrooms, 2 balconies, 1 kitchen', 30000, 'Within first 10 days of the month', 30000, 'apartment1.jpg', 'Uttara', '2020-06-01', NULL, 1, 1, 1),
(2, 11, 'Multi-storey', 5, 'Lift, Security guard', '2nd floor, left side, 3 bedrooms, 2 bathrooms, 1 kitchen', 20000, 'Within first 10 days of the month', 20000, 'download (11).jpg', 'Khilkhet', '2020-07-01', NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `apartment`
--

DROP TABLE IF EXISTS `apartment`;
CREATE TABLE IF NOT EXISTS `apartment` (
  `apartmentId` int(11) NOT NULL AUTO_INCREMENT,
  `buildingType` varchar(200) DEFAULT NULL,
  `floorNum` int(11) DEFAULT NULL,
  `facilities` varchar(300) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `rentalCost` int(11) DEFAULT NULL,
  `paymentTime` varchar(100) DEFAULT NULL,
  `advancePayment` int(11) DEFAULT NULL,
  `apartmentAddress` varchar(300) DEFAULT NULL,
  `nid` int(11) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `apartmentImage` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`apartmentId`),
  KEY `nid` (`nid`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apartment`
--

INSERT INTO `apartment` (`apartmentId`, `buildingType`, `floorNum`, `facilities`, `description`, `rentalCost`, `paymentTime`, `advancePayment`, `apartmentAddress`, `nid`, `phone`, `apartmentImage`) VALUES
(1, 'Multi-storey building', 7, 'Lift, garrage, Security guard', '5th floor right side, 3 bedrooms, 3 bathrooms, 2 balconies, 1 kitchen', 30000, 'Within first 10 days of the month', 30000, 'Uttara', 4, 4, 'apartment1.jpg'),
(2, 'Multi-storey building', 10, 'Lift, Security guard, Electric generator', '8th floor left side, 3 bedrooms, 3 bathrooms, 3 balconies, 1 drawing room, 1 kitchen', 25000, 'Within first 10 days of the month', 25000, 'Mohammadpur', 5, 5, 'download (5).jpg'),
(3, 'Multi- storey building', 6, 'Lift, Security guard, Garage', '3rd floor right side, 2 bedrooms, 2 bathrooms, 2 balconies, 1 drawing room, 1 kitchen', 35000, 'Within first 10 days of the month', 35000, 'Basundhara', 6, 6, 'download (11).jpg'),
(4, 'Multi- storey building', 5, 'Security guard, Electric generator', '3rd floor right side, 2 bedrooms, 2 bathrooms, 1 drawing room, 1 kitchen', 20000, 'Within first 10 days of the month', 20000, 'Mohakhali', 7, 7, 'images (39).jpg'),
(5, 'Multi-storey', 4, 'Electric generator', '2nd floor, left side, 2 bedrooms, 1 balcony, 1 kitchen', 20000, 'Within first 10 days of the month', 20000, 'Rampura', 8, 8, 'download (2).jpg'),
(6, 'Multi-storey', 6, 'Lift, Garage', '4th floor, left side, 2 bedrooms, 2 bathrooms, 1 kitchen', 20000, 'Within first 10 days of the month', 20000, 'Basabo', 9, 9, 'download (4).jpg'),
(7, 'Multi- storey building', 10, 'Lift, Security guard, Electric generator', '7th floor, left side, 3 bedrooms, 2 bathrooms, 1 drawing room, 1 kitchen', 27000, 'Within first 10 days of the month', 27000, 'Jatrabari', 10, 10, 'download (3).jpg'),
(8, 'Multi-storey', 5, 'Security guard', '3rd floor, left side, 2 bedrooms, 2 bathrooms, 1 kitchen', 25000, 'Within first 10 days of the month', 25000, 'Uttara', 11, 11, 'images (31).jpg'),
(9, 'Multi-storey', 7, 'Lift, Security guard, Electric generator', '4th floor, right side, 2 bedrooms, 2 bathrooms', 35000, 'Within first 10 days of the month', 35000, 'Banani', 12, 12, 'images (29).jpg'),
(10, 'Multi-storey', 5, 'Lift, Security guard, Electric generator', '5th floor, right side, 2 bedrooms, 2 bathrooms, 1 drawing room, 1 kitchen', 45000, 'Within first 10 days of the month', 45000, 'Gulshan', 13, 13, 'images (35).jpg'),
(11, 'Multi-storey', 5, 'Lift, Security guard', '2nd floor, left side, 3 bedrooms, 2 bathrooms, 1 kitchen', 20000, 'Within first 10 days of the month', 20000, 'Khilkhet', 14, 14, 'download (11).jpg'),
(12, 'Multi-storey', 10, 'Lift, Security guard, Garage', '9th floor, right side, 2 bedrooms, 2 bathrooms, 1 drawing room, 1 kitchen', 25000, 'Within first 10 days of the month', 25000, 'Tejgaon', 15, 15, 'download (7).jpg'),
(13, 'Multi-storey', 6, 'Lift, Security guard, Garage', '5th floor, left side, 3 bedrooms, 3 bathrooms, 1 drawing room, 1 kitchen', 35000, 'Within first 10 days of the month', 35000, 'Uttara', 16, 16, 'download (3).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fName` varchar(100) DEFAULT NULL,
  `lName` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `fName`, `lName`, `email`, `message`) VALUES
(1, 'Abir', 'Hasan', 'abir@gmail.com', 'Your service is very helpful.'),
(2, 'Nahid', 'Khan', 'nahid@gmail.com', 'I have a complain.'),
(3, 'Nirob', 'Khan', 'nirob@gmail.com', 'Nice attempt.');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `imageId` int(11) NOT NULL AUTO_INCREMENT,
  `userImage` varchar(200) DEFAULT NULL,
  `apartmentImage` varchar(200) DEFAULT NULL,
  `nid` int(11) DEFAULT NULL,
  PRIMARY KEY (`imageId`),
  KEY `nid` (`nid`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imageId`, `userImage`, `apartmentImage`, `nid`) VALUES
(1, 'images (12).jpg', NULL, 1),
(2, 'images (19).jpg', NULL, 2),
(3, 'images (14).jpg', NULL, 3),
(4, 'images (4).jpg', 'apartment1.jpg', 4),
(5, 'images (11).jpg', 'download (5).jpg', 5),
(6, 'images (3).jpg', 'download (11).jpg', 6),
(7, 'images (17).jpg', 'images (39).jpg', 7),
(8, 'images (5).jpg', 'download (2).jpg', 8),
(9, 'images (2).jpg', 'download (4).jpg', 9),
(10, 'images (18).jpg', 'download (3).jpg', 10),
(11, 'images (10).jpg', 'images (31).jpg', 11),
(12, 'images (15).jpg', 'images (29).jpg', 12),
(13, 'user1.jpg', 'images (35).jpg', 13),
(14, 'user2.jpg', 'download (11).jpg', 14),
(15, 'images (8).jpg', 'download (7).jpg', 15),
(16, 'images (16).jpg', 'download (3).jpg', 16),
(17, 'images (19).jpg', NULL, 17),
(18, 'images (18).jpg', NULL, 18);

-- --------------------------------------------------------

--
-- Table structure for table `mapper`
--

DROP TABLE IF EXISTS `mapper`;
CREATE TABLE IF NOT EXISTS `mapper` (
  `mapId` int(11) NOT NULL AUTO_INCREMENT,
  `ownerNid` int(11) DEFAULT NULL,
  `tenantNid` int(11) DEFAULT NULL,
  `agreementId` int(11) DEFAULT NULL,
  PRIMARY KEY (`mapId`),
  KEY `agreementId` (`agreementId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapper`
--

INSERT INTO `mapper` (`mapId`, `ownerNid`, `tenantNid`, `agreementId`) VALUES
(1, 4, 17, 1),
(2, 14, 18, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
