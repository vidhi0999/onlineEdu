-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2023 at 04:26 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_edu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(6) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `username`, `pass`) VALUES
(1, 'admin@gmail.com', 'admin123', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `course_list`
--

CREATE TABLE `course_list` (
  `id` int(30) NOT NULL,
  `tutor_id` int(30) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `experience` varchar(150) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `logo_path` text DEFAULT NULL,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_list`
--

INSERT INTO `course_list` (`id`, `tutor_id`, `name`, `description`, `experience`, `status`, `logo_path`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 1, 'PHP', 'lets begin withe course', '5 Years', 1, 'uploads/courses/1.png?v=1652760072', 0, '2022-05-17 12:01:12', '2022-05-17 12:01:12'),
(2, 1, 'MySQL', 'MySQL is an open-source relational database management system. Its name is a combination of \"My\", the name of co-founder Michael Widenius\'s daughter, and \"SQL\", the abbreviation for Structured Query Language.', '5 Years', 1, 'uploads/courses/2.png?v=1652760330', 0, '2022-05-17 12:05:30', '2022-05-17 12:05:30'),
(3, 3, 'DBMS', 'Database management system', '5 Years', 0, 'uploads/courses/1.png?v=1652760072', 0, '2023-03-08 14:50:12', '2023-03-08 15:37:21');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(6) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `fullname`, `username`, `email`, `phonenumber`, `pass`, `gender`) VALUES
(1, 'Maulik Vastarpara', 'maulik7332', 'maulikvastarpara63@gmail.com', '9737277332', '123', 'Male'),
(2, 'Vrujal Laheri', 'vrujal30', 'vrujal30@gmail.com', '9074628476', '123', 'Female'),
(3, 'Vidhi Thummar', 'vidhi54', 'vidhi54@gmail.com', '9737465789', '123', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `tutor_list`
--

CREATE TABLE `tutor_list` (
  `id` int(30) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = Not Validated,\\r\\n1 = Validated,\\r\\n2 = Inactive,\\r\\n3 = Blocked',
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutor_list`
--

INSERT INTO `tutor_list` (`id`, `firstname`, `middlename`, `lastname`, `email`, `password`, `avatar`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 'Mark', 'D', 'Cooper', 'mcooper@gmail.com', 'c7162ff89c647f444fcaa5c635dac8c3', '', 1, 0, '2022-05-17 10:22:51', '2023-03-08 16:09:31'),
(2, 'Claire', 'C', 'Blake', 'cblake@sample.com', '4744ddea876b11dcb1d169fadf494418', 'uploads/tutors/3.png?v=1652770108', 1, 0, '2022-05-17 14:48:28', '2023-03-08 16:06:46'),
(3, 'Samantha Jane', 'C', 'Miller', 'sam23@gmail.com', 'b60367cae35de6594b1a09bf44a3a68b', 'uploads/tutors/4.png?v=1652836335', 1, 0, '2022-05-18 09:12:15', '2023-03-08 16:06:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `course_list`
--
ALTER TABLE `course_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tutor_list`
--
ALTER TABLE `tutor_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course_list`
--
ALTER TABLE `course_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tutor_list`
--
ALTER TABLE `tutor_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
