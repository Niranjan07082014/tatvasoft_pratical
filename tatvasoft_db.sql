-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2021 at 07:04 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tatvasoft_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `event_master`
--

DROP TABLE IF EXISTS `event_master`;
CREATE TABLE `event_master` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `start_date` date NOT NULL,
  `repeat_every` int(11) NOT NULL,
  `repeat_type` varchar(32) NOT NULL,
  `repeat_type_val` varchar(32) NOT NULL,
  `repeat_occurence` varchar(32) NOT NULL,
  `created_by` varchar(32) NOT NULL,
  `created_on` datetime NOT NULL,
  `record_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_master`
--

INSERT INTO `event_master` (`id`, `title`, `start_date`, `repeat_every`, `repeat_type`, `repeat_type_val`, `repeat_occurence`, `created_by`, `created_on`, `record_status`) VALUES
(1, 'gsfdgdsfg', '2021-09-08', 1, 'day', '', 'on', '', '0000-00-00 00:00:00', 1),
(2, 'gfddff', '2021-09-08', 2, 'month', '', 'on', '', '0000-00-00 00:00:00', 1),
(3, 'gghgfh', '2021-09-08', 2, 'day', '', 'on', '', '0000-00-00 00:00:00', 1),
(4, 'fgsdfg', '2021-09-10', 3, 'day', '', 'on', '', '0000-00-00 00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event_master`
--
ALTER TABLE `event_master`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event_master`
--
ALTER TABLE `event_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
