-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 04, 2012 at 02:13 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ragevalley`
--

-- --------------------------------------------------------

--
-- Table structure for table `ages`
--

CREATE TABLE IF NOT EXISTS `ages` (
  `ageID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`ageID`),
  UNIQUE KEY `ageID` (`ageID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `ages`
--

INSERT INTO `ages` (`ageID`, `name`) VALUES
(1, 'All Ages'),
(2, '16+'),
(3, '18+'),
(4, '19+'),
(5, '21+'),
(7, '25+'),
(8, '32+'),
(13, 'Senior Citizens');

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE IF NOT EXISTS `artists` (
  `artistID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `genreID` int(11) NOT NULL,
  `bio` varchar(2000) NOT NULL,
  `websiteLink` varchar(400) NOT NULL,
  PRIMARY KEY (`artistID`),
  UNIQUE KEY `artistID` (`artistID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`artistID`, `name`, `genreID`, `bio`, `websiteLink`) VALUES
(6, 'STS9', 2, 'None', 'http://www.sts9.com'),
(7, 'DJ Tiesto', 0, 'The master.', 'http://www.tiesto.com'),
(8, 'Hardwell', 8, 'The original gangster.', 'http://www.hardwell.com'),
(9, 'Underoath', 9, 'Wonderful.', 'http://www.underoath.com'),
(10, 'DJ Dannic', 0, 'The man.', 'www.google.com'),
(11, 'Hardwell', 11, 'The original gangster.', 'http://www.hardwell.com');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `eventID` int(11) NOT NULL AUTO_INCREMENT,
  `venueID` int(11) NOT NULL,
  `artistID` int(11) NOT NULL,
  `startDateTime` datetime NOT NULL,
  `endDateTime` datetime NOT NULL,
  `name` varchar(200) NOT NULL,
  `cost` decimal(10,0) NOT NULL,
  `ageID` int(11) NOT NULL,
  `genreID` int(11) NOT NULL,
  `details` varchar(1000) NOT NULL,
  `imageFileName` varchar(100) NOT NULL,
  `facebookEventLink` varchar(400) NOT NULL,
  PRIMARY KEY (`eventID`),
  UNIQUE KEY `eventID` (`eventID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventID`, `venueID`, `artistID`, `startDateTime`, `endDateTime`, `name`, `cost`, `ageID`, `genreID`, `details`, `imageFileName`, `facebookEventLink`) VALUES
(16, 1, 8, '2012-06-27 19:00:00', '2012-06-30 00:47:00', 'Hardwell', 89, 5, 1, 'The bangers.', '', ''),
(17, 2, 7, '2012-06-29 12:36:00', '2012-06-29 18:32:00', 'House Party', 89, 2, 4, 'The magician.', 'tiesto.jpg', 'http://www.tiesto.com'),
(18, 2, 9, '2012-06-29 12:36:00', '2012-06-27 14:48:00', 'Birthday Bash', 0, 2, 4, 'The bangins.', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE IF NOT EXISTS `genres` (
  `genreID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`genreID`),
  UNIQUE KEY `genreID` (`genreID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`genreID`, `name`) VALUES
(1, 'House'),
(2, 'Pop'),
(3, 'Dubstep'),
(4, 'Trance'),
(5, 'Dance'),
(6, 'Mashup'),
(9, 'Electro House'),
(10, 'Rock');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `locationID` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(100) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip` varchar(30) NOT NULL,
  `country` varchar(20) NOT NULL,
  PRIMARY KEY (`locationID`),
  UNIQUE KEY `locationID` (`locationID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`locationID`, `city`, `state`, `zip`, `country`) VALUES
(1, 'Philadelphia', 'PA', '19104', 'USA'),
(3, 'Matawan', 'NJ', '07747', 'USA'),
(4, 'Millstone', 'NJ', '87673', 'USA'),
(5, 'Los Angelos', 'CA', '46766', 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `userID` (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userName`, `password`, `email`, `firstName`, `lastName`) VALUES
(1, 'admin', 'pass', 'pgm28@drexel.edu', 'Peter', 'Mandell'),
(5, 'testing', 'password', 'gopher@love.net', 'Christina', 'Bethencourt');

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE IF NOT EXISTS `venues` (
  `venueID` int(11) NOT NULL AUTO_INCREMENT,
  `locationID` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `websiteLink` varchar(400) NOT NULL,
  PRIMARY KEY (`venueID`),
  UNIQUE KEY `venueID` (`venueID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`venueID`, `locationID`, `name`, `address`, `description`, `websiteLink`) VALUES
(1, 1, 'Electric Factory', '421 N. 7th Street', 'None', 'http://www.electricfactory.info'),
(2, 4, 'The TLA', '337 South Street', 'The bomb diggity.', 'www.google.com/'),
(3, 0, 'The Troc', '456 N. 7th Street', 'The Trocadero.', 'http://thetroc.org');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
