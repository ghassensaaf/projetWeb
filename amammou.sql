-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 27, 2019 at 05:16 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amammou`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `login` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `status` int(11) DEFAULT '1',
  `name` varchar(50000) DEFAULT NULL,
  PRIMARY KEY (`login`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`login`, `email`, `pwd`, `status`, `name`) VALUES
('saaf', 'saaf@aa.aa', '7305cb98fd72282b3df6b842315bdd49', 55, 'Saaf Ghassen'),
('ghassen', 'ghassenamis@gmail.com', '7305cb98fd72282b3df6b842315bdd49', 1, 'Ghassen saaf'),
('aaa', 'aa@aa.ss', '47bce5c74f589f4867dbd57e9ca9f808', 1, 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `adresses`
--

DROP TABLE IF EXISTS `adresses`;
CREATE TABLE IF NOT EXISTS `adresses` (
  `add_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_uname` varchar(50) NOT NULL,
  `add_name` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  PRIMARY KEY (`add_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adresses`
--

INSERT INTO `adresses` (`add_id`, `u_uname`, `add_name`, `name`, `street`, `city`, `zip_code`, `state`, `country`, `phone`) VALUES
(16, 'saafgh', 'Dar Ariana Soghra', 'Saaf Ghassen', 'Rue el 3emyen', 'Raoued', 8020, 'Ariana', 'Tunisia', 21509309),
(17, 'saafgh', 'dar hammamet', 'Saaf Ghassen', 'Rue Nessrines', 'Hammamet', 8050, 'Nabeul', 'Tunisia', 21509309);

-- --------------------------------------------------------

--
-- Table structure for table `techs`
--

DROP TABLE IF EXISTS `techs`;
CREATE TABLE IF NOT EXISTS `techs` (
  `login` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tasks_comp` int(11) NOT NULL DEFAULT '0',
  `available` int(11) NOT NULL DEFAULT '1',
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`login`),
  UNIQUE KEY `techs_email_uindex` (`email`),
  UNIQUE KEY `techs_login_uindex` (`login`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `techs`
--

INSERT INTO `techs` (`login`, `pwd`, `email`, `tasks_comp`, `available`, `name`) VALUES
('saaf', '7305cb98fd72282b3df6b842315bdd49', 'saaf@aa.aa', 0, 1, 'ghassen saaaaaafffff');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `u_uname` varchar(50) NOT NULL,
  `u_name` varchar(50) DEFAULT NULL,
  `u_pwd` varchar(50) NOT NULL,
  `u_email` varchar(50) NOT NULL,
  `u_phone` int(11) DEFAULT NULL,
  PRIMARY KEY (`u_uname`),
  UNIQUE KEY `u_email` (`u_email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_uname`, `u_name`, `u_pwd`, `u_email`, `u_phone`) VALUES
('saafgh', 'Saaf Ghassen', '7305cb98fd72282b3df6b842315bdd49', 'saafghassen@gmail.com', 21509309);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
