-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 10, 2022 at 07:08 AM
-- Server version: 10.5.12-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id18249303_gyandaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `meet`
--

CREATE TABLE `meet` (
  `id` int(11) NOT NULL,
  `mentor_user_id` int(11) NOT NULL,
  `student_user_id` int(11) NOT NULL,
  `query_id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `starttime` varchar(100) NOT NULL,
  `endtime` varchar(100) NOT NULL,
  `link` text NOT NULL,
  `tag` varchar(100) NOT NULL DEFAULT 'In-Progress'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meet`
--

INSERT INTO `meet` (`id`, `mentor_user_id`, `student_user_id`, `query_id`, `date`, `starttime`, `endtime`, `link`, `tag`) VALUES
(1, 4, 2, 10, '22-01-2022', '16:00', '17:00', 'aug-qfyw-bsc', 'Completed'),
(3, 4, 2, 1, '15-01-2022', '12:00', '12:15', 'qoe-gobi-pvk', 'Completed'),
(6, 3, 1, 6, '29-01-2022', '07:00', '07:45', 'nfs-nihq-zaw', 'In-Progress'),
(7, 5, 1, 3, '22-01-2022', '17:00', '18:00', 'hmv-vwzh-oas', 'In-Progress'),
(8, 4, 1, 2, '15-01-2022', '17:00', '17:15', 'gkt-emyv-wbf', 'In-Progress');

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `queryname` longtext NOT NULL,
  `subject` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `message` longtext NOT NULL,
  `date` varchar(100) NOT NULL,
  `starttime` varchar(100) NOT NULL,
  `endtime` varchar(100) NOT NULL,
  `priority` varchar(100) NOT NULL,
  `progress` varchar(100) NOT NULL,
  `otp` int(8) NOT NULL DEFAULT 0,
  `remark` varchar(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`id`, `user_id`, `queryname`, `subject`, `class`, `message`, `date`, `starttime`, `endtime`, `priority`, `progress`, `otp`, `remark`) VALUES
(1, 2, 'Trigonometric Equations', 'Mathemetics', 'Class XII', 'This is a query about Trigonometry', '15-01-2022', '12:00', '14:00', 'High', 'Completed', 909455, '5'),
(2, 1, 'Iterate over a collection', 'Computer Science', 'Class XI', 'How can I iterate over a collection in java', '15-01-2022', '17:00', '21:00', 'High', 'In-Progress', 0, '0'),
(3, 1, 'Grammar Tense and Times', 'English', 'Class II', 'Facing issues to understand different types of tense', '22-01-2022', '17:00', '19:00', 'Medium', 'In-Progress', 0, '0'),
(4, 1, 'Physic Optics', 'Physics', 'Class X', 'Please explain different types of lenses', '30-01-2022', '17:00', '23:00', 'Low', 'In-Progress', 0, '0'),
(5, 1, 'Jung Personality test', 'Psychology', 'Class XII', 'How to do Jung Personality test', '30-01-2022', '18:00', '19:00', 'Medium', 'In-Progress', 0, '0'),
(6, 1, 'Cause and effects of WW-II ', 'History', 'Class X', 'Please explain causes and effect of world war II', '29-01-2022', '07:00', '08:30', 'Low', 'In-Progress', 323219, '5'),
(8, 2, 'Data Structure', 'Computer Science', 'Class XII', 'This is a query on data structure', '15-01-2022', '19:00', '20:00', 'High', 'In-Progress', 0, '0'),
(9, 7, 'How can I use pointer', 'Computer Science', 'Class IX', 'Facing difficulties to use pointer in C++', '20-01-2022', '04:00', '05:00', 'Low', 'In-Progress', 0, '0'),
(10, 2, 'Kinematics', 'Physics', 'Class XII', 'This is a query on Kinematics', '22-01-2022', '16:00', '18:00', 'Medium', 'Completed', 0, '0'),
(11, 7, 'Demand-Supply Curve', 'Economics', 'Class XI', 'Please explain demand vs supply curve and give an example of it. ', '21-01-2022', '11:30', '13:00', 'Medium', 'In-Progress', 0, '0'),
(12, 2, 'Organic Chemistry', 'Chemistry', 'Class XII', 'This is a query on Organic Chemistry', '29-01-2022', '14:00', '20:00', 'Low', 'In-Progress', 0, '0'),
(14, 1, 'Topographic Map Issue', 'Geography', 'Class X', 'How do faults appear on a topographic map?', '30-01-2022', '09:00', '11:00', 'High', 'In-Progress', 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Nilavro Seal', 'seal.nilavro@gmail.com', 'c2VhbC5uaWxhdnJv', 'Student'),
(2, 'Ritam Dey', 'ritamdey@gmail.com', 'MTIzNDU2', 'Student'),
(3, 'Arijit Saha Ray', 'arijitsaharay07@gmail.com', 'YXJpaml0QDEyMw==', 'Mentor'),
(4, 'Ritam Kumar Dey', 'mentor_ritamdey@gmail.com', 'MTIzNDU2', 'Mentor'),
(5, 'Prajapati Singh', 'prajapatisingh@gmail.com', 'cHJhamFwYXRpQDEyMw==', 'Mentor'),
(6, 'Sumit Sen', 'sumitsen@gmail.com', 'c3VtaXRAMTIz', 'Student'),
(7, 'Soumya Bhattacharya', 'soumya@outlook.com', 'c291bXlh', 'Student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meet`
--
ALTER TABLE `meet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meet`
--
ALTER TABLE `meet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
