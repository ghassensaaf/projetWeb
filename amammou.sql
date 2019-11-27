-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 27 nov. 2019 à 18:55
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `amammou`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
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
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`login`, `email`, `pwd`, `status`, `name`) VALUES
('saaf', 'saaf@aa.aa', '7305cb98fd72282b3df6b842315bdd49', 55, 'Saaf Ghassen'),
('ghassen', 'ghassenamis@gmail.com', '7305cb98fd72282b3df6b842315bdd49', 1, 'Ghassen saaf'),
('aaa', 'aa@aa.ss', '47bce5c74f589f4867dbd57e9ca9f808', 1, 'aaa');

-- --------------------------------------------------------

--
-- Structure de la table `adresses`
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
-- Déchargement des données de la table `adresses`
--

INSERT INTO `adresses` (`add_id`, `u_uname`, `add_name`, `name`, `street`, `city`, `zip_code`, `state`, `country`, `phone`) VALUES
(16, 'saafgh', 'Dar Ariana Soghra', 'Saaf Ghassen', 'Rue el 3emyen', 'Raoued', 8020, 'Ariana', 'Tunisia', 21509309),
(17, 'saafgh', 'dar hammamet', 'Saaf Ghassen', 'Rue Nessrines', 'Hammamet', 8050, 'Nabeul', 'Tunisia', 21509309);

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `p_id` int(11) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`) VALUES
(2, '::1', 3),
(1, '::1', 5);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `IdCommande` int(11) NOT NULL AUTO_INCREMENT,
  `IdPanier` int(11) NOT NULL,
  `NomProduit` varchar(20) NOT NULL,
  `PrixProduit` int(11) NOT NULL,
  `PrixTotal` int(11) NOT NULL,
  `Quantite` int(11) NOT NULL,
  `NomClient` varchar(20) NOT NULL,
  PRIMARY KEY (`IdCommande`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`IdCommande`, `IdPanier`, `NomProduit`, `PrixProduit`, `PrixTotal`, `Quantite`, `NomClient`) VALUES
(1, 12454545, '', 0, 3, 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `reference` int(11) NOT NULL AUTO_INCREMENT,
  `id_categorie` int(11) NOT NULL,
  `nom_produit` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `prix` int(11) NOT NULL,
  `quantité` int(11) NOT NULL,
  `image` varchar(256) NOT NULL,
  `image2` varchar(256) NOT NULL,
  `image3` varchar(256) NOT NULL,
  `keyword` varchar(256) NOT NULL,
  PRIMARY KEY (`reference`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`reference`, `id_categorie`, `nom_produit`, `description`, `prix`, `quantité`, `image`, `image2`, `image3`, `keyword`) VALUES
(1, 1, 'prod1', 'salem', 10, 50, '1.jpg', '1.jpg', '1.jpg', 'k1,k2'),
(2, 1, 'prod2', 'salem', 10, 50, '1.jpg', '1.jpg', '1.jpg', 'k1,k2'),
(3, 1, 'prod3', 'salem', 10, 50, '1.jpg', '1.jpg', '1.jpg', 'k1,k2'),
(4, 1, 'prod4', 'salem', 10, 50, '1.jpg', '1.jpg', '1.jpg', 'k1,k2'),
(5, 1, 'prod5', 'salem', 10, 50, '1.jpg', '1.jpg', '1.jpg', 'k1,k2'),
(6, 1, 'prod6', 'salem', 10, 50, '1.jpg', '1.jpg', '1.jpg', 'k1,k2'),
(7, 1, 'prod7', 'salem', 10, 50, '1.jpg', '1.jpg', '1.jpg', 'k1,k2'),
(8, 1, 'prod8', 'salem', 10, 50, '1.jpg', '1.jpg', '1.jpg', 'k1,k2'),
(9, 1, 'prod9', 'salem', 10, 50, '1.jpg', '1.jpg', '1.jpg', 'k1,k2'),
(10, 1, 'prod10', 'salem', 10, 50, '1.jpg', '1.jpg', '1.jpg', 'k1,k2'),
(11, 1, 'prod11', 'salem', 10, 50, '1.jpg', '1.jpg', '1.jpg', 'k1,k2'),
(12, 1, 'prod12', 'salem', 10, 50, '1.jpg', '1.jpg', '1.jpg', 'k1,k2'),
(13, 1, 'prod13', 'salem', 10, 50, '1.jpg', '1.jpg', '1.jpg', 'k1,k2'),
(14, 1, 'prod14', 'salem', 10, 50, '1.jpg', '1.jpg', '1.jpg', 'k1,k2'),
(15, 1, 'prod15', 'salem', 10, 50, '1.jpg', '1.jpg', '1.jpg', 'k1,k2'),
(16, 1, 'prod16', 'salem', 10, 50, '1.jpg', '1.jpg', '1.jpg', 'k1,k2');

-- --------------------------------------------------------

--
-- Structure de la table `techs`
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
-- Déchargement des données de la table `techs`
--

INSERT INTO `techs` (`login`, `pwd`, `email`, `tasks_comp`, `available`, `name`) VALUES
('saaf', '7305cb98fd72282b3df6b842315bdd49', 'saaf@aa.aa', 0, 1, 'ghassen saaaaaafffff');

-- --------------------------------------------------------

--
-- Structure de la table `users`
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
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`u_uname`, `u_name`, `u_pwd`, `u_email`, `u_phone`) VALUES
('saafgh', 'Saaf Ghassen', '7305cb98fd72282b3df6b842315bdd49', 'saafghassen@gmail.com', 21509309);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
