-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Sam 13 Janvier 2018 à 21:23
-- Version du serveur: 5.1.53
-- Version de PHP: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `meeting`
--

-- --------------------------------------------------------

--
-- Structure de la table `meetup`
--

CREATE TABLE IF NOT EXISTS `meetup` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `organisation` int(5) DEFAULT NULL,
  `organisateur` int(5) DEFAULT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `organisation` (`organisation`,`organisateur`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `meetup`
--

INSERT INTO `meetup` (`id`, `titre`, `description`, `organisation`, `organisateur`, `dateDebut`, `dateFin`) VALUES
(1, 'Zend Framework 2', 'Rencontre de la communauté Zend Framework', 1, 1, '2018-01-20', '2018-01-21'),
(2, 'Nouveau meetup', 'Un nouveau meetup test', 2, 1, '2018-01-20', '2018-01-20'),
(3, 'Nouveau meetup', 'Un nouveau meetup test', 2, 2, '2018-01-27', '2018-01-28');

-- --------------------------------------------------------

--
-- Structure de la table `organisation`
--

CREATE TABLE IF NOT EXISTS `organisation` (
  `id` int(5) NOT NULL,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `organisation`
--

INSERT INTO `organisation` (`id`, `nom`) VALUES
(1, 'Zend Organisation'),
(2, 'Une autre organisation');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(5) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `email`) VALUES
(0, 'Rachel ', 'rachel@gmail.com'),
(1, 'Rachel', 'rachel@gmail.com'),
(2, 'toto', 'toto@gmail.com');
