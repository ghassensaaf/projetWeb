-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 28, 2019 at 03:28 PM
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
('aaa', 'aa@aa.ss', '47bce5c74f589f4867dbd57e9ca9f808', 0, 'aaa');

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
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `p_id` int(11) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`) VALUES
(5, '192.168.1.100', 1),
(13, '192.168.1.100', 1),
(15, '192.168.1.100', 1),
(12, '192.168.1.100', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orderId` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) NOT NULL,
  `dueAmount` int(11) NOT NULL,
  `innoNumber` int(255) NOT NULL,
  `totalQty` int(11) NOT NULL,
  `OrderDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` int(11) NOT NULL DEFAULT '0',
  `idAdd` int(11) DEFAULT NULL,
  PRIMARY KEY (`orderId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `uname`, `dueAmount`, `innoNumber`, `totalQty`, `OrderDate`, `Status`, `idAdd`) VALUES
(4, 'saafgh', 300, 1289108, 4, '2019-11-28 15:17:37', 0, 16),
(3, 'saafgh', 180, 1341085, 3, '2019-11-28 15:12:28', 0, 17);

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

DROP TABLE IF EXISTS `pending_orders`;
CREATE TABLE IF NOT EXISTS `pending_orders` (
  `orderId` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) NOT NULL,
  `innoNumb` int(255) NOT NULL,
  `prodId` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `idAdd` int(11) DEFAULT NULL,
  PRIMARY KEY (`orderId`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`orderId`, `uname`, `innoNumb`, `prodId`, `qty`, `status`, `idAdd`) VALUES
(20, 'saafgh', 1289108, 12, 1, 0, 16),
(19, 'saafgh', 1289108, 15, 1, 0, 16),
(18, 'saafgh', 1289108, 13, 1, 0, 16),
(17, 'saafgh', 1289108, 5, 1, 0, 16),
(16, 'saafgh', 1341085, 15, 2, 0, 17),
(15, 'saafgh', 1341085, 14, 1, 0, 17);

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `reference` int(11) NOT NULL AUTO_INCREMENT,
  `id_categorie` int(11) NOT NULL,
  `nom_produit` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `prix` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `image` varchar(256) NOT NULL,
  `image2` varchar(256) NOT NULL,
  `image3` varchar(256) NOT NULL,
  `keyword` varchar(256) NOT NULL,
  PRIMARY KEY (`reference`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`reference`, `id_categorie`, `nom_produit`, `description`, `prix`, `quantite`, `image`, `image2`, `image3`, `keyword`) VALUES
(1, 1, 'prod1', 'salem', 50, 50, '1.jpg', '1.jpg', '1.jpg', 'k1,k2,k3'),
(2, 1, 'prod2', 'salem', 35, 50, '2.jpg', '1.jpg', '1.jpg', 'k1,k2'),
(3, 1, 'prod3', 'salem', 45, 50, '3.jpg', '1.jpg', '1.jpg', 'k1,k2'),
(4, 1, 'prod4', 'salem', 120, 50, '4.jpg', '1.jpg', '1.jpg', 'k1'),
(5, 1, 'prod5', 'salem', 80, 50, '5.jpg', '1.jpg', '1.jpg', 'k1,k2'),
(6, 1, 'prod6', 'salem', 40, 50, '6.jpg', '1.jpg', '1.jpg', 'k1,k2,k3'),
(7, 1, 'prod7', 'salem', 40, 50, '7.jpg', '1.jpg', '1.jpg', 'k1,k2'),
(8, 1, 'prod8', 'salem', 60, 50, '8.jpg', '1.jpg', '1.jpg', 'k1'),
(9, 1, 'prod9', 'salem', 65, 50, '9.jpg', '1.jpg', '1.jpg', 'k1,k2'),
(10, 1, 'prod10', 'salem', 80, 50, '10.jpg', '1.jpg', '1.jpg', 'k1,k2,k4'),
(11, 1, 'prod11', 'salem', 40, 50, '11.jpg', '1.jpg', '1.jpg', 'k1,k2'),
(12, 1, 'prod12', 'salem', 60, 50, '12.jpg', '1.jpg', '1.jpg', 'k1'),
(13, 1, 'prod13', 'salem', 90, 50, '13.jpg', '1.jpg', '1.jpg', 'k1'),
(14, 1, 'prod14', 'salem', 40, 50, '14.jpg', '1.jpg', '1.jpg', 'k1,k2'),
(15, 1, 'prod15', 'salem', 70, 50, '15.jpg', '1.jpg', '1.jpg', 'k1,k2'),
(16, 1, 'prod16', 'salem', 55, 50, '16.jpg', '1.jpg', '1.jpg', 'k1,k2');

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
