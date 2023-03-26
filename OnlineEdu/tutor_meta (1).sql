-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2023 at 10:27 AM
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
-- Table structure for table `tutor_meta`
--

CREATE TABLE `tutor_meta` (
  `meta_id` int(40) NOT NULL,
  `tutor_id` int(40) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `speciality` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutor_meta`
--

INSERT INTO `tutor_meta` (`meta_id`, `tutor_id`, `dob`, `gender`, `contact`, `address`, `speciality`, `description`) VALUES
(1, 1, '1997-06-23', 'Male', '09123456789', '518 Evangelista, Manila, Metro Manila', 'HTML, CSS, JS, Python, PHP, MYSQL, SQLite, AngularJS, and Node.JS', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean blandit leo vel quam ultricies ultrices. Nam sit amet arcu diam. Cras in augue tempor, imperdiet ligula scelerisque, aliquet dolor. Nulla interdum mi at justo condimentum, ac euismod tellus s'),
(2, 2, '1997-06-23', 'Female', '09789654123', '26,shukan bunglows b/h setu residency,surat', 'PHP, HTML, CSS, JS, and Python.', 'This is a sample description about myself.\r\n'),
(3, 3, '1997-10-14', 'female', '09654789123 / 098785466', ' 469 Gen. Luna St., Hulong Duhat, Malabon, Metro Manila', 'Grammar, English, Science, and Mathematics', 'Integer a mi quam. Vivamus et purus sed velit laoreet maximus. Suspendisse erat metus, efficitur sit amet blandit a, imperdiet sed sapien. Praesent lacinia, metus vitae mollis pharetra, enim ex laoreet erat, sit amet egestas nisi diam quis nisi. Praesent ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tutor_meta`
--
ALTER TABLE `tutor_meta`
  ADD UNIQUE KEY `meta_id` (`meta_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
