-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql110.byetcluster.com
-- Generation Time: Jan 23, 2022 at 09:20 AM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_26421459_schedule_2_2022db`
--

-- --------------------------------------------------------

--
-- Table structure for table `schedule_2_2022`
--

CREATE TABLE `schedule_2_2022` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `time` int(11) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `selected` text NOT NULL,
  `design` int(11) NOT NULL,
  `format` int(11) NOT NULL,
  `font` int(11) NOT NULL,
  `na` int(11) NOT NULL,
  `motn` VARCHAR(2000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Indexes for table `schedule_2_2022`
--
ALTER TABLE `schedule_2_2022`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `schedule_2_2022`
--
ALTER TABLE `schedule_2_2022`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
