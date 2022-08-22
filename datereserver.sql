-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 22 août 2022 à 08:37
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `datereserver`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `nomClient` varchar(500) NOT NULL,
  `prenomClient` varchar(500) NOT NULL,
  `dateReservation` date NOT NULL,
  `dateReserve` date NOT NULL,
  `heureReserve` int(16) NOT NULL,
  `idReservation` int(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nomClient`, `prenomClient`, `dateReservation`, `dateReserve`, `heureReserve`, `idReservation`) VALUES
(1, 'eaz', 'eaz', '2022-08-02', '2022-08-06', 9, 4),
(2, 'eaz', 'eaz', '2022-08-02', '2022-08-06', 10, 2),
(3, 'eaz', 'eaz', '2022-08-02', '2022-08-02', 7, 1),
(4, 'eaz', 'eaz', '2022-08-02', '2022-08-06', 10, 3),
(5, 'kuz', 'kuz', '2022-08-03', '2022-08-03', 8, 3),
(6, 'eaz', 'eza', '2022-08-03', '2022-08-03', 7, 3),
(7, 'eaz', 'eza', '2022-08-03', '2022-08-03', 9, 3),
(8, 'eaz', 'eza', '2022-08-04', '2022-08-04', 7, 3),
(9, 'eza', 'eaz', '2022-08-04', '2022-08-04', 8, 3),
(10, 'eza', 'eza', '2022-08-04', '2022-08-07', 9, 1),
(11, 'admin', 'admin', '2022-08-08', '2022-08-12', 17, 2),
(12, 'eaz', 'eza', '2022-08-08', '2022-08-08', 16, 5),
(13, 'Kuz', 'Kuzumo', '2022-08-12', '2022-08-18', 15, 9),
(14, 'test', 'test', '2022-08-22', '2022-08-22', 7, 10),
(15, 'tkt', 'tt', '2022-08-22', '2022-08-22', 8, 10),
(16, 'test', 'test', '2022-08-22', '2022-08-22', 17, 8),
(17, 'admin', 'admin', '2022-08-22', '2022-08-23', 16, 7);

-- --------------------------------------------------------

--
-- Structure de la table `listereservation`
--

DROP TABLE IF EXISTS `listereservation`;
CREATE TABLE IF NOT EXISTS `listereservation` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `libelleReservation` varchar(5000) NOT NULL,
  `idUser` int(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `listereservation`
--

INSERT INTO `listereservation` (`id`, `libelleReservation`, `idUser`) VALUES
(1, 'Cheat meal', 2),
(2, 'Chest day (curse day)', 1),
(3, 'Fight VS Shin Akuma', 1),
(4, 'Fight VS Fatlis', 1),
(5, 'Fight VS Fatlis', 3),
(6, 'Fight VS Fatlis', 3),
(7, 'Fight VS Fatlis', 3),
(8, 'Fight VS Fatlis', 3),
(9, 'Fight VS Fatlis', 3),
(10, 'Fight VS Shin Akuma', 3),
(11, 'Chest day (curse day)', 1),
(12, 'Arms day', 1),
(13, 'Shoulders Back day', 3),
(14, 'SOLDIERs training', 1),
(15, 'SOLDIERs training', 1),
(16, 'Cardio day', 3),
(17, 'Legs day', 1);

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `libelleReservation` varchar(500) NOT NULL,
  `description` varchar(5000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `libelleReservation`, `description`) VALUES
(1, 'Fight VS Shin Akuma', 'Un combat à mort contre Shin Akuma, bonne chance !'),
(2, 'Chest day (curse day)', 'We here to chest, but the curse is always here, so we cry :/'),
(3, 'Fight VS Fatlis', 'À la bonne époque avec la squad '),
(4, 'Cheat meal', 'Bon après une bonne séance, un cheat meal ça se tient de temps en temps, attention à ne pas abuser ou sinon plus aucuns gains !'),
(5, 'Arms day', 'Biceps et triceps'),
(7, 'Legs day', 'We do suffer on this day !'),
(8, 'Cardio day', 'C\'est chiant mais obligé pour La madame !'),
(9, 'Shoulders Back day', 'Suffer day to become Yujiro !'),
(10, 'SOLDIERs training', 'Live your dreams, and no matter what, don\'t forget your honor of SOLDIER.');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `login` varchar(500) NOT NULL,
  `mdp` varchar(500) NOT NULL,
  `pseudo` varchar(500) DEFAULT NULL,
  `statut` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `login`, `mdp`, `pseudo`, `statut`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(2, 'user', 'user', 'User', 'client'),
(3, 'b', 'b', 'Kuzumo', 'client'),
(4, 'tkt', 'tkt', 'Sanfuki', 'client');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
