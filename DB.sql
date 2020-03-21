-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 01, 2019 at 01:32 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `allocations`
--

INSERT INTO `allocations` (`allocation_id`, `allocation_datetime`, `court_num`) VALUES
(3, '2019-04-02 14:00:00', 1),
(4, '2019-04-02 15:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

DROP TABLE IF EXISTS `application`;
CREATE TABLE IF NOT EXISTS `application` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id`, `name`, `fname`, `email`, `content`) VALUES
(1, 'raz', 'peleg', 'dsd@dsd', 'xncfkjsdbnvcoxziuvndiso'),
(2, 'raz', 'peleg', 'raz15peleg@gmail.com', 'ssasas');

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
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `availability`
--

INSERT INTO `availability` (`availability_id`, `player_id`, `datetime`, `city`) VALUES
(37, 98, '2019-04-02 14:00:00', 'Herzliya'),
(38, 97, '2019-04-02 14:00:00', 'Herzeliya'),
(39, 96, '2019-04-02 14:00:00', 'Herzeliya'),
(41, 96, '2019-04-02 15:00:00', 'Herzeliya'),
(47, 103, '2019-04-02 14:00:00', 'Herzeliya'),
(48, 104, '2019-04-02 14:00:00', 'Herzeliya'),
(49, 105, '2019-04-02 14:00:00', 'Herzeliya'),
(50, 106, '2019-04-02 14:00:00', 'Herzeliya'),
(51, 107, '2019-04-02 14:00:00', 'Herzeliya');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `courts`
--

INSERT INTO `courts` (`court_num`, `court_name`, `city`) VALUES
(1, 'Sportek1', 'Herzliya'),
(2, 'Sportek2', 'Herzliya');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games` (
  `game_id` int(11) NOT NULL AUTO_INCREMENT,
  `game_date` date NOT NULL,
  `game_time` time NOT NULL,
  `court_num` int(11) NOT NULL,
  `game_status` int(10) NOT NULL,
  PRIMARY KEY (`game_id`),
  KEY `court_num` (`court_num`),
  KEY `game_status` (`game_status`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`game_id`, `game_date`, `game_time`, `court_num`, `game_status`) VALUES
(1, '2019-03-31', '10:00:00', 1, 0),
(2, '2019-04-06', '14:00:00', 2, 0),
(3, '2019-03-31', '10:00:00', 2, 0),
(63, '2019-04-02', '14:00:00', 1, 1),
(64, '2019-04-02', '15:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `players_games`
--

DROP TABLE IF EXISTS `players_games`;
CREATE TABLE IF NOT EXISTS `players_games` (
  `game_id` int(15) NOT NULL,
  `player_id` int(20) NOT NULL,
  PRIMARY KEY (`game_id`,`player_id`),
  KEY `game_id` (`game_id`),
  KEY `player_id` (`player_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `players_games`
--

INSERT INTO `players_games` (`game_id`, `player_id`) VALUES
(1, 95),
(1, 96),
(1, 97),
(1, 98),
(63, 96),
(63, 98),
(63, 103),
(63, 104),
(63, 105),
(63, 107),
(64, 96);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
CREATE TABLE IF NOT EXISTS `ratings` (
  `rating_id` int(11) NOT NULL AUTO_INCREMENT,
  `player_id` int(255) NOT NULL,
  `rating_datetime` datetime NOT NULL,
  `missing` int(11) NOT NULL,
  `was_late` int(11) NOT NULL,
  `not_sportive` int(11) NOT NULL,
  `sum` int(11) NOT NULL,
  PRIMARY KEY (`rating_id`),
  KEY `player_id` (`player_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `game_status` int(10) NOT NULL,
  `game_status_desc` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`game_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`game_status`, `game_status_desc`) VALUES
(0, 'Open game'),
(1, 'Closed game');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `fittness_level` text COLLATE utf8_unicode_ci NOT NULL,
  `exp_years` int(11) NOT NULL,
  `exp_type` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `last_used` datetime NOT NULL,
  `Level` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Position` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` int(15) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_type` (`user_type`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `last_name`, `birth_date`, `gender`, `height`, `weight`, `fittness_level`, `exp_years`, `exp_type`, `login`, `password`, `last_used`, `Level`, `Position`, `user_type`) VALUES
(95, 'Yonatan', 'Levi', '1992-10-12', '×–×›×¨', 206, 100, '×ž×ª××ž×Ÿ ×ž×¢×œ 4 ×¤×¢×ž×™× ×‘×©×‘×•×¢', 14, '×‘×•×’×¨×™× - ×œ×™×’×•×ª ×’×‘×•×”×•×ª', 'yonatan@gmail.com', '12345678', '2019-03-26 21:26:10', 'P', 'Center', 0),
(96, 'Raz', 'Peleg', '1992-03-15', '×–×›×¨', 190, 95, '×ž×ª××ž×Ÿ ×¤×¢×ž×™×™× ×‘×©×‘×•×¢', 10, '× ×¢×¨×™×-× ×•×¢×¨', 'raz@gmail.com', '12345678', '2019-03-26 21:27:57', 'P', 'Forward', 0),
(97, 'Matan', 'Gabbay', '1991-03-13', '×–×›×¨', 178, 70, '×ž×ª××ž×Ÿ ×¤×¢×ž×™×™× ×‘×©×‘×•×¢', 2, '×—×•×‘×‘×Ÿ', 'matan@gmail.com', '12345678', '2019-03-28 22:45:28', 'M', 'Guard', 0),
(98, 'Itay', 'Reznik', '1996-06-24', '×–×›×¨', 190, 83, '×ž×ª××ž×Ÿ ×¤×¢×ž×™×™× ×‘×©×‘×•×¢', 10, '× ×¢×¨×™×-× ×•×¢×¨', 'itay@gmail.com', '12345678', '2019-03-29 11:32:31', 'P', 'Forward', 0),
(100, 'Nadav', 'Kanon', '1993-09-15', '×–×›×¨', 185, 95, '×œ× ×ž×ª××ž×Ÿ', 1, '×ž×ª×—×™×œ', 'nadav@gmail.com', '12345678', '2019-03-28 21:39:48', 'B', 'Forward', 0),
(101, 'Nadav', 'Kanon', '1993-09-15', '×–×›×¨', 185, 95, '×œ× ×ž×ª××ž×Ÿ', 1, '×ž×ª×—×™×œ', 'nadav@gmail.com', '12345678', '2019-03-28 21:39:48', 'B', 'Forward', 0),
(102, 'Matan', 'Gabbay', '1991-03-13', '×–×›×¨', 178, 70, '×ž×ª××ž×Ÿ ×¤×¢×ž×™×™× ×‘×©×‘×•×¢', 2, '×—×•×‘×‘×Ÿ', 'matan@gmail.com', '12345678', '2019-03-28 22:45:28', 'M', 'Guard', 0),
(103, 'Itay', 'Reznik', '1996-06-24', '×–×›×¨', 190, 83, '×ž×ª××ž×Ÿ ×¤×¢×ž×™×™× ×‘×©×‘×•×¢', 10, '× ×¢×¨×™×-× ×•×¢×¨', 'itay@gmail.com', '12345678', '2019-03-29 11:32:31', 'P', 'Forward', 0),
(104, 'Itay', 'Reznik', '1996-06-24', '×–×›×¨', 190, 83, '×ž×ª××ž×Ÿ ×¤×¢×ž×™×™× ×‘×©×‘×•×¢', 10, '× ×¢×¨×™×-× ×•×¢×¨', 'itay@gmail.com', '12345678', '2019-03-29 11:32:31', 'P', 'Forward', 0),
(105, 'Itay', 'Reznik', '1996-06-24', '×–×›×¨', 190, 83, '×ž×ª××ž×Ÿ ×¤×¢×ž×™×™× ×‘×©×‘×•×¢', 10, '× ×¢×¨×™×-× ×•×¢×¨', 'itay@gmail.com', '12345678', '2019-03-29 11:32:31', 'P', 'Forward', 0),
(106, 'Itay', 'Reznik', '1996-06-24', '×–×›×¨', 190, 83, '×ž×ª××ž×Ÿ ×¤×¢×ž×™×™× ×‘×©×‘×•×¢', 10, '× ×¢×¨×™×-× ×•×¢×¨', 'itay@gmail.com', '12345678', '2019-03-29 11:32:31', 'P', 'Forward', 0),
(107, 'Itay', 'Reznik', '1996-06-24', '×–×›×¨', 190, 83, '×ž×ª××ž×Ÿ ×¤×¢×ž×™×™× ×‘×©×‘×•×¢', 10, '× ×¢×¨×™×-× ×•×¢×¨', 'itay@gmail.com', '12345678', '2019-03-28 11:32:31', 'P', 'Forward', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

DROP TABLE IF EXISTS `user_type`;
CREATE TABLE IF NOT EXISTS `user_type` (
  `user_type_id` int(15) NOT NULL,
  `user_type_desc` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_type_id`, `user_type_desc`) VALUES
(0, 'Player'),
(1, 'Manager');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allocations`
--
ALTER TABLE `allocations`
  ADD CONSTRAINT `allocations_ibfk_1` FOREIGN KEY (`court_num`) REFERENCES `courts` (`court_num`);

--
-- Constraints for table `availability`
--
ALTER TABLE `availability`
  ADD CONSTRAINT `availability_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_ibfk_1` FOREIGN KEY (`court_num`) REFERENCES `courts` (`court_num`),
  ADD CONSTRAINT `games_ibfk_2` FOREIGN KEY (`game_status`) REFERENCES `status` (`game_status`);

--
-- Constraints for table `players_games`
--
ALTER TABLE `players_games`
  ADD CONSTRAINT `players_games_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`),
  ADD CONSTRAINT `players_games_ibfk_2` FOREIGN KEY (`player_id`) REFERENCES `users` (`user_id`);

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
