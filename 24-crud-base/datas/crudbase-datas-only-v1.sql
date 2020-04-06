-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  lun. 06 avr. 2020 à 12:30
-- Version du serveur :  5.7.28
-- Version de PHP :  7.3.12

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `crudbase`
--

--
-- Déchargement des données de la table `thepage`
--

INSERT INTO `thepage` (`idthepage`, `thetitle`, `thetext`, `thedate`, `utilisateur_idutilisateur`) VALUES
(2, 'Article 1', 'Ceci est mon article 1', '2020-04-06 12:22:29', 1),
(3, 'Deuxième Article', 'Ceci est notre deuxième article', '2020-04-06 12:27:04', 1);

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idutilisateur`, `thelogin`, `thepwd`, `themail`, `thename`) VALUES
(1, 'Admin', 'admin', 'moi@moi.be', 'Super Lulu'),
(2, 'Modo', 'modo', 'modo@moi.be', 'Kasi Modo');
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
