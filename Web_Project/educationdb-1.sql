-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2017 at 08:35 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `educationdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `massage`
--

CREATE TABLE `massage` (
  `id` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `msg` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `subinfo` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `subinfo`) VALUES
(11, 'CSE1033', 'Data'),
(13, 'OOP2', 'This is a object oriented programming language course'),
(15, 'Data structure', 'it is a programming related subject where we learn about various structure of data');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `subId` int(10) NOT NULL,
  `videourl` varchar(300) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `doc` varchar(200) DEFAULT NULL,
  `videoname` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `userId`, `subId`, `videourl`, `image`, `doc`, `videoname`) VALUES
(31, 11, 11, NULL, NULL, 'Application1(1)(1).doc', NULL),
(33, 13, 11, NULL, NULL, 'Application1(1)(1).doc', NULL),
(39, 14, 11, 'http://localhost/Project/videos/', NULL, NULL, ''),
(41, 14, 11, NULL, NULL, 'Application1(1)(1).doc', NULL),
(42, 14, 11, NULL, '20228353_453648654991834_4453231237349678355_n.jpg', NULL, NULL),
(43, 14, 11, 'http://localhost/Project/videos/Anonto.mp4', NULL, NULL, 'Anonto.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `pin` int(10) NOT NULL,
  `image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `pass`, `phone`, `usertype`, `email`, `pin`, `image`) VALUES
(1, 'Rezwan', 'rezwan10', '01521246626', 'Admin', 'rezwan@gmail.com', 123, '20376032_1413570512066540_9036198350417202138_n.jpg'),
(11, 'Rana', 'rana10', '0173345883', 'User', 'rana@gmail.com', 234, '20376032_1413570512066540_9036198350417202138_n.jpg'),
(12, 'Mijanur Rahaman', 'ayesha75', '01728030032', 'User', 'mijanurman750@gmail.', 1234, '20476494_1130970740366573_2288443055466134571_n(1).jpg'),
(13, 'naio', '1234', '0173456567', 'Admin', 'naio@gmail.com', 123, '20228353_453648654991834_4453231237349678355_n.jpg'),
(14, 'Monirul', '1234', '01754545663', 'User', 'monir@gmail.com', 345, '20228353_453648654991834_4453231237349678355_n.jpg'),
(15, 'nayeem', 'nayem', '0174234234', 'User', 'rehaz@gmail.com', 234, '20228353_453648654991834_4453231237349678355_n.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `massage`
--
ALTER TABLE `massage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `uploads_ibfk_1` (`subId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `massage`
--
ALTER TABLE `massage`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `massage`
--
ALTER TABLE `massage`
  ADD CONSTRAINT `massage_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);

--
-- Constraints for table `uploads`
--
ALTER TABLE `uploads`
  ADD CONSTRAINT `uploads_ibfk_1` FOREIGN KEY (`subId`) REFERENCES `subjects` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
