-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  jeu. 12 mars 2020 à 13:40
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mysqli_18`
--
CREATE DATABASE IF NOT EXISTS `mysqli_18` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mysqli_18`;

-- --------------------------------------------------------

--
-- Structure de la table `livredor`
--

DROP TABLE IF EXISTS `livredor`;
CREATE TABLE IF NOT EXISTS `livredor` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` varchar(150) NOT NULL,
  `texte` text NOT NULL,
  `auteur` varchar(60) NOT NULL,
  `ladate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `actif` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `livredor`
--

INSERT INTO `livredor` (`id`, `titre`, `texte`, `auteur`, `ladate`, `actif`) VALUES
(1, 'Ma première bafouille ', 'Voici mon premier petit texte dans mon livre d\'or', 'Michaël', '2020-03-12 13:34:02', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
