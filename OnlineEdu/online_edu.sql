-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 03, 2023 at 06:44 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `logo` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `experience` varchar(150) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `date_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_list`
--

INSERT INTO `course_list` (`id`, `tutor_id`, `name`, `logo`, `description`, `experience`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 3, 'PHP', 'php.png', 'Learn all PHP Fundamental and building blocks-Complete php course.Make web pages dynamic with variety of concepts including form validation.', '5 Years', 1, 0, '2022-05-17', '2023-03-23'),
(2, 1, 'MySQL', 'mysql.png', 'Introduction to Structured Query language. Learn about the basic syntax of the SQL language, as well as database design with multiple table,etc  ', '5 Years', 1, 0, '2022-05-17', '2023-03-23'),
(3, 3, 'DBMS', 'dbms.jpeg', 'Learn database management system(DBMS).Gain DBMS skills such as data creation ,queryingand manipulation and many more concepts.', '5 Years', 1, 0, '2023-03-08', '2023-03-23'),
(4, 2, 'Data Structure', 'ds.png', 'Learn basics of Data Structure , You will learn how these data structures are implemented in different programming languages and will practice implementing them in our programming assignments.', '4 years', 1, 0, '2023-03-08', '2023-03-23'),
(5, 3, 'C++', 'c++.jfif', 'C++ is an object-oriented programming (OOP) language that is viewed by many as the best language for creating large-scale applications.', '1 Year', 1, 0, '2023-03-24', '2023-03-24'),
(6, 2, 'Data Mining', 'dm.png', 'Data mining is the process of sorting through large data sets to identify patterns and relationships that can help solve business problems through data analysis.', '3 Year', 1, 0, '2023-03-24', '2023-03-24');

-- --------------------------------------------------------

--
-- Table structure for table `course_request`
--

CREATE TABLE `course_request` (
  `id` int(6) UNSIGNED NOT NULL,
  `tutor_id` int(6) NOT NULL,
  `course_id` int(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `student_id` int(255) NOT NULL,
  `student_userName` varchar(255) NOT NULL,
  `status` int(4) NOT NULL,
  `delete_flag` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_request`
--

INSERT INTO `course_request` (`id`, `tutor_id`, `course_id`, `course_name`, `student_id`, `student_userName`, `status`, `delete_flag`) VALUES
(1, 3, 1, 'PHP', 1, 'maulik7332', 0, 0),
(2, 1, 2, 'MySQL', 1, 'maulik7332', 0, 0),
(3, 3, 1, 'PHP', 3, 'vidhi54', 0, 0),
(5, 3, 3, 'DBMS', 1, 'maulik7332', 0, 0),
(6, 3, 5, 'C++', 3, 'vidhi54', 0, 0),
(7, 3, 1, 'PHP', 2, 'vrujal30', 0, 0),
(8, 1, 2, 'MySQL', 2, 'vrujal30', 0, 0),
(9, 2, 4, 'Data Structure', 1, 'maulik7332', 0, 0),
(10, 1, 2, 'MySQL', 3, 'vidhi54', 0, 0),
(11, 3, 5, 'C++', 1, 'maulik7332', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `inquiry_list`
--

CREATE TABLE `inquiry_list` (
  `id` int(30) NOT NULL,
  `tutor_id` int(30) NOT NULL,
  `course_id` int(30) NOT NULL,
  `fullname` text NOT NULL,
  `email` text NOT NULL,
  `contact` text NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiry_list`
--

INSERT INTO `inquiry_list` (`id`, `tutor_id`, `course_id`, `fullname`, `email`, `contact`, `message`, `status`, `date_created`, `date_updated`) VALUES
(1, 1, 1, 'Michael Williams', 'mcooper@gmail.com', '09123456789', 'Mauris sit amet facilisis mi. Suspendisse potenti. Cras a accumsan lacus, ut vehicula felis. Aliquam suscipit, odio at varius euismod, lorem erat commodo urna, non consectetur justo lectus nec nunc. In ullamcorper, dui quis convallis volutpat, metus nulla rutrum ex, sed tempus nisl turpis id odio. Proin sit amet tincidunt tellus. In hac habitasse platea dictumst. In vitae nisl in felis consequat interdum. Ut semper velit sed magna placerat molestie. Maecenas varius posuere elit, vitae gravida nunc auctor sed. \r\n\r\nDonec molestie turpis vel massa malesuada, a fermentum diam aliquam. Aenean dolor leo, elementum a vulputate et, cursus eget ligula. Maecenas varius accumsan nisl viverra commodo. Etiam ac neque consectetur, placerat neque non, feugiat tellus. Proin eu auctor mauris. Aliquam gravida elit a velit ultrices hendrerit a eget tortor.', 0, '2022-05-17 16:11:49', '2022-05-17 16:11:49');

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
  `gender` varchar(255) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `qualify` varchar(255) NOT NULL,
  `dob` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `fullname`, `username`, `email`, `phonenumber`, `pass`, `gender`, `filename`, `qualify`, `dob`) VALUES
(1, 'Maulik Vastarpara', 'maulik7332', 'maulik@gmail.com', '9737277332', '123', 'Male', '', '', '2023-03-23'),
(2, 'Vrujal Laheri', 'vrujal30', 'vrujal30@gmail.com', '9074628476', '123', 'Female', '', '', '2023-03-23'),
(3, 'Vidhi Thummar', 'vidhi54', 'vidhi54@gmail.com', '9737465789', '123', 'Female', 'f1.jpg', 'Btech', '2023-03-10');

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
  `avtar` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = inactive,\\r\\n1 = active,\\r\\n2 = Blocked\r\n',
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` date NOT NULL,
  `date_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutor_list`
--

INSERT INTO `tutor_list` (`id`, `firstname`, `middlename`, `lastname`, `email`, `password`, `avtar`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 'Mark', 'D', 'Cooper', 'mcooper@gmail.com', 'c7162ff89c647f444fcaa5c635dac8c3', '1.png', 2, 0, '2022-05-17', '2023-03-23'),
(2, 'Claire', 'C', 'Blake', 'cblake@sample.com', '4744ddea876b11dcb1d169fadf494418', '2.png', 1, 0, '2022-05-17', '2023-03-23'),
(3, 'Samantha Jane', 'C', 'Miller', 'sam23@gmail.com', 'b60367cae35de6594b1a09bf44a3a68b', '3.jpeg', 0, 0, '2022-05-18', '2023-03-23');

-- --------------------------------------------------------

--
-- Table structure for table `tutor_meta`
--

CREATE TABLE `tutor_meta` (
  `tutor_id` int(20) NOT NULL,
  `meta_field` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `meta_value` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for table `course_request`
--
ALTER TABLE `course_request`
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
-- Indexes for table `tutor_meta`
--
ALTER TABLE `tutor_meta`
  ADD KEY `tutor_id` (`tutor_id`);

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
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course_request`
--
ALTER TABLE `course_request`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
