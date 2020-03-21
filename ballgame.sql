-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 22, 2018 at 05:47 PM
-- Server version: 5.7.19
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
-- Database: `ballgame`
--

-- --------------------------------------------------------

--
-- Table structure for table `allocations`
--

DROP TABLE IF EXISTS `allocations`;
CREATE TABLE IF NOT EXISTS `allocations` (
  `allocation_id` int(11) NOT NULL AUTO_INCREMENT,
  `allocation_datetime` datetime NOT NULL,
  `court_num` int(15) NOT NULL,
  PRIMARY KEY (`allocation_id`),
  KEY `court_num` (`court_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

DROP TABLE IF EXISTS `attributes`;
CREATE TABLE IF NOT EXISTS `attributes` (
  `attributes_id` int(11) NOT NULL AUTO_INCREMENT,
  `level_score` int(15) NOT NULL,
  `position_1` int(15) NOT NULL,
  `position_2` int(15) NOT NULL,
  `player_id` int(11) NOT NULL,
  PRIMARY KEY (`attributes_id`),
  KEY `player_id` (`player_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `availability`
--

DROP TABLE IF EXISTS `availability`;
CREATE TABLE IF NOT EXISTS `availability` (
  `availability_id` int(11) NOT NULL AUTO_INCREMENT,
  `player_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `city` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`availability_id`),
  KEY `player_id` (`player_id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `availability`
--

INSERT INTO `availability` (`availability_id`, `player_id`, `datetime`, `city`) VALUES
(96, 1, '2018-12-22 08:00:00', 'Herzliya'),
(97, 1, '2018-12-15 09:00:00', 'Herzliya'),
(98, 1, '2018-12-22 09:00:00', 'Herzliya'),
(99, 1, '2018-12-22 10:00:00', 'Herzliya'),
(100, 1, '2018-12-22 11:00:00', 'Herzliya');

-- --------------------------------------------------------

--
-- Table structure for table `courts`
--

DROP TABLE IF EXISTS `courts`;
CREATE TABLE IF NOT EXISTS `courts` (
  `court_num` int(11) NOT NULL AUTO_INCREMENT,
  `court_name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `city` char(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`court_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games` (
  `game_id` int(11) NOT NULL AUTO_INCREMENT,
  `players_list` text COLLATE utf8_unicode_ci NOT NULL,
  `game_date` date NOT NULL,
  `game_time` time NOT NULL,
  `court_num` int(11) NOT NULL,
  PRIMARY KEY (`game_id`),
  KEY `court_num` (`court_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
CREATE TABLE IF NOT EXISTS `ratings` (
  `rating_id` int(11) NOT NULL AUTO_INCREMENT,
  `player_id` int(11) NOT NULL,
  `rating_datetime` datetime NOT NULL,
  `missing` int(11) NOT NULL,
  `was_late` int(11) NOT NULL,
  `not_sportive` int(11) NOT NULL,
  `sum` int(11) NOT NULL,
  PRIMARY KEY (`rating_id`),
  KEY `player_id` (`player_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temp_groups`
--

DROP TABLE IF EXISTS `temp_groups`;
CREATE TABLE IF NOT EXISTS `temp_groups` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `player_id_1` int(11) DEFAULT NULL,
  `player_id_2` int(11) DEFAULT NULL,
  `player_id_3` int(11) DEFAULT NULL,
  `player_id_4` int(11) DEFAULT NULL,
  `player_id_5` int(11) DEFAULT NULL,
  `player_id_6` int(11) DEFAULT NULL,
  `player_id_7` int(11) DEFAULT NULL,
  `player_id_8` int(11) DEFAULT NULL,
  `player_id_9` int(11) DEFAULT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `fittness_level` int(11) DEFAULT NULL,
  `exp_years` int(11) DEFAULT NULL,
  `exp_type` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `last_used` datetime NOT NULL,
  `user_type` int(15) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`),
  KEY `user_type` (`user_type`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `last_name`, `birth_date`, `gender`, `height`, `weight`, `fittness_level`, `exp_years`, `exp_type`, `login`, `password`, `last_used`, `user_type`) VALUES
(1, 'Itay', 'Reznik', '1996-06-24', 'זכר', 190, 82, 5, 7, '?????/????', 'itay123', '12345', '2018-12-22 19:39:47', 1),
(14, 'raz', 'peleg', '1992-03-15', '×–×›×¨', 154, 50, 4, 2, '×‘×•×’×¨×™× - ×œ×™×’×•×ª ×’×‘×•×”×•×ª', 'raz15peleg@gmail.com', '12345678', '2018-12-02 11:08:22', 1),
(15, 'Matan', 'Gabay', '1994-08-14', '×–×›×¨', 170, 56, 3, 4, '× ×¢×¨×™×-× ×•×¢×¨', 'matan838@walla.com', '12345678', '2018-12-22 19:10:01', 1),
(16, 'Adrian', 'Shlomzki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'adrian123', 'manager', '2018-12-22 19:39:40', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

DROP TABLE IF EXISTS `user_type`;
CREATE TABLE IF NOT EXISTS `user_type` (
  `user_type_id` int(15) NOT NULL AUTO_INCREMENT,
  `user_type_desc` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_type_id`, `user_type_desc`) VALUES
(1, 'player'),
(2, 'admin'),
(3, 'manager');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allocations`
--
ALTER TABLE `allocations`
  ADD CONSTRAINT `allocations_ibfk_1` FOREIGN KEY (`court_num`) REFERENCES `courts` (`court_num`);

--
-- Constraints for table `attributes`
--
ALTER TABLE `attributes`
  ADD CONSTRAINT `attributes_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `availability`
--
ALTER TABLE `availability`
  ADD CONSTRAINT `availability_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_ibfk_1` FOREIGN KEY (`court_num`) REFERENCES `courts` (`court_num`);

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_type`) REFERENCES `user_type` (`user_type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
