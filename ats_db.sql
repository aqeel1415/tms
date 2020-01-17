-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 20, 2017 at 09:05 AM
-- Server version: 5.6.36
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ats_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

CREATE TABLE `chapter` (
  `chapter_id` int(11) NOT NULL,
  `chapter_name` text NOT NULL,
  `level_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chapter`
--

INSERT INTO `chapter` (`chapter_id`, `chapter_name`, `level_id`) VALUES
(19, '2', 11),
(20, '3', 12),
(21, '3', 13),
(22, '11', 12);

-- --------------------------------------------------------

--
-- Table structure for table `chaptertools`
--

CREATE TABLE `chaptertools` (
  `chaptertool_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `tool_id` int(11) NOT NULL,
  `req_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chaptertools`
--

INSERT INTO `chaptertools` (`chaptertool_id`, `level_id`, `chapter_id`, `tool_id`, `req_qty`) VALUES
(31, 11, 19, 274, 4),
(32, 12, 20, 274, 1),
(33, 13, 21, 275, 3);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `level_id` int(11) NOT NULL,
  `level_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_id`, `level_name`) VALUES
(11, 'PEO'),
(12, 'SPSP'),
(13, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `location_name` text NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `unit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_name`, `teacher_id`, `unit_id`) VALUES
(36, 'Shelf', 42, 50),
(37, 'Inventory', 43, 51),
(41, 'Rock', 42, 56);

-- --------------------------------------------------------

--
-- Table structure for table `locationtools`
--

CREATE TABLE `locationtools` (
  `locationtool_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `tool_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `locationtools`
--

INSERT INTO `locationtools` (`locationtool_id`, `unit_id`, `location_id`, `tool_id`, `qty`) VALUES
(113, 51, 37, 274, 3),
(114, 51, 37, 275, 6);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_name` text NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_phone` int(11) NOT NULL,
  `student_email` text NOT NULL,
  `level_id` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_name`, `student_id`, `student_phone`, `student_email`, `level_id`, `chapter_id`) VALUES
('Ahmed', 139, 587742563, 'ahmed.64@email.com', 11, 19),
('Sami', 140, 561986174, 'Sami@email.com', 12, 20),
('Raafat noor', 141, 589963548, 'raafat@email.com', 13, 21),
('John', 142, 547785698, 'Mohammed@gmail.com', 13, 21);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_name` text NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `teacher_phone` int(11) NOT NULL,
  `teacher_email` text NOT NULL,
  `cons_loan` int(11) NOT NULL,
  `cons_loan_limit` int(11) NOT NULL,
  `noncons_loan` int(11) NOT NULL,
  `noncons_loan_limit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_name`, `teacher_id`, `teacher_phone`, `teacher_email`, `cons_loan`, `cons_loan_limit`, `noncons_loan`, `noncons_loan_limit`) VALUES
('Abdulsamad Alqorishi', 42, 2147483647, 'moon14light010@gmail.com', 24, 201, 5, 200),
('Omar', 43, 2147483647, 'aqeelff888@gmail.com', 0, 201, 6, 200);

-- --------------------------------------------------------

--
-- Table structure for table `tool`
--

CREATE TABLE `tool` (
  `tool_id` int(11) NOT NULL,
  `tool_name` text NOT NULL,
  `code_id` text NOT NULL,
  `tool_color` char(12) NOT NULL,
  `tool_status` text NOT NULL,
  `tool_type` text NOT NULL,
  `tool_image` varchar(100) NOT NULL,
  `tool_quantity` int(11) NOT NULL,
  `tool_remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tool`
--

INSERT INTO `tool` (`tool_id`, `tool_name`, `code_id`, `tool_color`, `tool_status`, `tool_type`, `tool_image`, `tool_quantity`, `tool_remark`) VALUES
(274, 'Fast Acting Fuse', '3488', 'BLUE', '', 'Consumable', 'photos/', 3, ''),
(275, 'Fuse', '', 'BLACK', '', 'Consumable', 'photos/', 6, '');

-- --------------------------------------------------------

--
-- Table structure for table `toolloan`
--

CREATE TABLE `toolloan` (
  `toolloan_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `unit_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `time_loan` datetime NOT NULL,
  `time_return` datetime NOT NULL,
  `qty_loan` int(11) NOT NULL,
  `tool_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toolloan`
--

INSERT INTO `toolloan` (`toolloan_id`, `teacher_id`, `student_id`, `unit_id`, `location_id`, `time_loan`, `time_return`, `qty_loan`, `tool_id`, `status`) VALUES
(12, 42, NULL, 51, 37, '2017-09-19 22:52:38', '0000-00-00 00:00:00', 1, 274, 'Unreturned');

-- --------------------------------------------------------

--
-- Table structure for table `toolsneeded`
--

CREATE TABLE `toolsneeded` (
  `tool_id` int(11) NOT NULL,
  `needed_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `toolsneeded`
--

INSERT INTO `toolsneeded` (`tool_id`, `needed_quantity`) VALUES
(274, 2);

-- --------------------------------------------------------

--
-- Table structure for table `totalqtyneed`
--

CREATE TABLE `totalqtyneed` (
  `totalqtyneed` int(11) NOT NULL,
  `tool_id` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `total_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `totalqtyneed`
--

INSERT INTO `totalqtyneed` (`totalqtyneed`, `tool_id`, `chapter_id`, `total_quantity`) VALUES
(14, 274, 19, 4),
(15, 274, 20, 1),
(16, 275, 21, 6);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unit_id` int(11) NOT NULL,
  `unit_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `unit_name`) VALUES
(50, 'B'),
(51, 'Inventory'),
(56, 'F');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`) VALUES
(1, 'admin', 'admin', ''),
(2, 'argie', 'argie', 'frontdesk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`chapter_id`),
  ADD KEY `level_id` (`level_id`);

--
-- Indexes for table `chaptertools`
--
ALTER TABLE `chaptertools`
  ADD PRIMARY KEY (`chaptertool_id`),
  ADD KEY `tool_id` (`tool_id`),
  ADD KEY `chapter_id` (`chapter_id`),
  ADD KEY `level_id` (`level_id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `locationtools`
--
ALTER TABLE `locationtools`
  ADD PRIMARY KEY (`locationtool_id`),
  ADD KEY `location_id` (`location_id`),
  ADD KEY `tool_id` (`tool_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `level_id` (`level_id`),
  ADD KEY `chapter_id` (`chapter_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `tool`
--
ALTER TABLE `tool`
  ADD PRIMARY KEY (`tool_id`);

--
-- Indexes for table `toolloan`
--
ALTER TABLE `toolloan`
  ADD PRIMARY KEY (`toolloan_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `tool_id` (`tool_id`),
  ADD KEY `unit_id` (`unit_id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `toolsneeded`
--
ALTER TABLE `toolsneeded`
  ADD PRIMARY KEY (`tool_id`),
  ADD KEY `tool_id` (`tool_id`);

--
-- Indexes for table `totalqtyneed`
--
ALTER TABLE `totalqtyneed`
  ADD PRIMARY KEY (`totalqtyneed`),
  ADD UNIQUE KEY `chapter_id_2` (`chapter_id`),
  ADD KEY `tool_id` (`tool_id`),
  ADD KEY `chapter_id` (`chapter_id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chapter`
--
ALTER TABLE `chapter`
  MODIFY `chapter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `chaptertools`
--
ALTER TABLE `chaptertools`
  MODIFY `chaptertool_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `locationtools`
--
ALTER TABLE `locationtools`
  MODIFY `locationtool_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `tool`
--
ALTER TABLE `tool`
  MODIFY `tool_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=276;
--
-- AUTO_INCREMENT for table `toolloan`
--
ALTER TABLE `toolloan`
  MODIFY `toolloan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `totalqtyneed`
--
ALTER TABLE `totalqtyneed`
  MODIFY `totalqtyneed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `chapter`
--
ALTER TABLE `chapter`
  ADD CONSTRAINT `chapter_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `level` (`level_id`);

--
-- Constraints for table `chaptertools`
--
ALTER TABLE `chaptertools`
  ADD CONSTRAINT `chaptertools_ibfk_1` FOREIGN KEY (`chapter_id`) REFERENCES `chapter` (`chapter_id`),
  ADD CONSTRAINT `chaptertools_ibfk_2` FOREIGN KEY (`tool_id`) REFERENCES `tool` (`tool_id`),
  ADD CONSTRAINT `chaptertools_ibfk_3` FOREIGN KEY (`level_id`) REFERENCES `level` (`level_id`);

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`unit_id`),
  ADD CONSTRAINT `location_ibfk_3` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`);

--
-- Constraints for table `locationtools`
--
ALTER TABLE `locationtools`
  ADD CONSTRAINT `locationtools_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`),
  ADD CONSTRAINT `locationtools_ibfk_2` FOREIGN KEY (`tool_id`) REFERENCES `tool` (`tool_id`),
  ADD CONSTRAINT `locationtools_ibfk_3` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`unit_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `level` (`level_id`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`chapter_id`) REFERENCES `chapter` (`chapter_id`);

--
-- Constraints for table `toolloan`
--
ALTER TABLE `toolloan`
  ADD CONSTRAINT `toolloan_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`),
  ADD CONSTRAINT `toolloan_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `toolloan_ibfk_3` FOREIGN KEY (`tool_id`) REFERENCES `tool` (`tool_id`),
  ADD CONSTRAINT `toolloan_ibfk_4` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`unit_id`),
  ADD CONSTRAINT `toolloan_ibfk_5` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`);

--
-- Constraints for table `toolsneeded`
--
ALTER TABLE `toolsneeded`
  ADD CONSTRAINT `toolsneeded_ibfk_1` FOREIGN KEY (`tool_id`) REFERENCES `tool` (`tool_id`);

--
-- Constraints for table `totalqtyneed`
--
ALTER TABLE `totalqtyneed`
  ADD CONSTRAINT `totalqtyneed_ibfk_1` FOREIGN KEY (`tool_id`) REFERENCES `tool` (`tool_id`),
  ADD CONSTRAINT `totalqtyneed_ibfk_2` FOREIGN KEY (`chapter_id`) REFERENCES `chapter` (`chapter_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
