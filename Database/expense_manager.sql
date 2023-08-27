-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 22, 2020 at 06:42 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expense_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `new_expense`
--

DROP TABLE IF EXISTS `new_expense`;
CREATE TABLE IF NOT EXISTS `new_expense` (
  `id3` int(11) NOT NULL AUTO_INCREMENT,
  `user_id_3` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `date` date NOT NULL,
  `amount_spent` int(11) NOT NULL,
  `person_name` varchar(256) NOT NULL,
  `bill` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id3`),
  KEY `user_id_3` (`user_id_3`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `new_plan`
--

DROP TABLE IF EXISTS `new_plan`;
CREATE TABLE IF NOT EXISTS `new_plan` (
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `initial_budget` int(11) NOT NULL,
  `people` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id1`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `new_plan_detail`
--

DROP TABLE IF EXISTS `new_plan_detail`;
CREATE TABLE IF NOT EXISTS `new_plan_detail` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id_2` int(11) NOT NULL,
  `initial_budget` int(11) NOT NULL,
  `people` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `person_1` varchar(256) NOT NULL,
  `person_2` varchar(256) DEFAULT NULL,
  `person_3` varchar(256) DEFAULT NULL,
  `person_4` varchar(256) DEFAULT NULL,
  `person_5` varchar(256) DEFAULT NULL,
  `person_6` varchar(256) DEFAULT NULL,
  `person_7` varchar(256) DEFAULT NULL,
  `person_8` varchar(256) DEFAULT NULL,
  `person_9` varchar(256) DEFAULT NULL,
  `person_10` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_2` (`user_id_2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` char(20) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `Phone` bigint(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `new_expense`
--
ALTER TABLE `new_expense`
  ADD CONSTRAINT `new_expense_ibfk_1` FOREIGN KEY (`user_id_3`) REFERENCES `new_plan_detail` (`id`);

--
-- Constraints for table `new_plan`
--
ALTER TABLE `new_plan`
  ADD CONSTRAINT `new_plan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `new_plan_detail`
--
ALTER TABLE `new_plan_detail`
  ADD CONSTRAINT `new_plan_detail_ibfk_1` FOREIGN KEY (`user_id_2`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
