-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 03 déc. 2018 à 11:05
-- Version du serveur :  5.7.23
-- Version de PHP :  5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `proteina`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie_utilisateur`
--

DROP TABLE IF EXISTS `categorie_utilisateur`;
CREATE TABLE IF NOT EXISTS `categorie_utilisateur` (
  `Id_cat_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_cat_utilisateur` varchar(255) NOT NULL,
  `statut_cat_utilisateur` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`Id_cat_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie_utilisateur`
--

INSERT INTO `categorie_utilisateur` (`Id_cat_utilisateur`, `nom_cat_utilisateur`, `statut_cat_utilisateur`) VALUES
(1, 'ADMINISTRATEUR', '1'),
(2, 'CLIENT SUPER MARCHE', '0'),
(3, 'CLIENT REVENDEUR(SE)', '0'),
(4, 'CLIENT ABATTAGE', '0'),
(5, 'CLIENT ROTISSERIE', '0'),
(6, 'CLIENT CONTENTIEUX', '0'),
(7, 'CLIENT ACCOR', '0');

-- --------------------------------------------------------

--
-- Structure de la table `modalite_paiement`
--

DROP TABLE IF EXISTS `modalite_paiement`;
CREATE TABLE IF NOT EXISTS `modalite_paiement` (
  `Id_modalite` int(11) NOT NULL AUTO_INCREMENT,
  `nom_modalite` varchar(255) NOT NULL,
  PRIMARY KEY (`Id_modalite`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `modalite_paiement`
--

INSERT INTO `modalite_paiement` (`Id_modalite`, `nom_modalite`) VALUES
(1, '30 JOURS FIN DE MOIS'),
(2, '31 JOURS FIN DE MOIS'),
(3, '32 JOURS FIN DE MOIS'),
(4, '33 JOURS FIN DE MOIS'),
(5, 'DIRECTION'),
(6, '15J SUR RELEV QUINZ'),
(7, 'CASH'),
(8, '1 SUR DEUX');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `Id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_utilisateur` varchar(255) NOT NULL,
  `prenom_utilisateur` varchar(255) NOT NULL,
  `tel_utilisateur` varchar(255) NOT NULL,
  `adresse_geo` varchar(255) NOT NULL,
  `confession_religieuse` varchar(255) DEFAULT NULL,
  `mail_utilisateur` varchar(255) NOT NULL,
  `login_utilisateur` varchar(255) DEFAULT NULL,
  `mdp_utilisateur` varchar(255) DEFAULT NULL,
  `Id_cat_utilisateur` int(11) NOT NULL,
  `Id_modalite` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_utilisateur`),
  KEY `Id_cat_utilisateur` (`Id_cat_utilisateur`),
  KEY `Id_modalite` (`Id_modalite`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`Id_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `tel_utilisateur`, `adresse_geo`, `confession_religieuse`, `mail_utilisateur`, `login_utilisateur`, `mdp_utilisateur`, `Id_cat_utilisateur`, `Id_modalite`) VALUES
(3, 'ACHY', 'ASSO STYVE MAURICE', '06104499', 'RIVIERA 2', 'chretien', 'achyasso@gmail.com', 'achyasso@gmail.com', 'achyasso@gmail.com', 1, NULL),
(4, 'kimou', 'christian', '67647896', 'abobo sogefia', 'chretien', 'christian.85@live.fr', 'admin', 'admin', 1, NULL),
(6, 'IBIS', 'IBIS MARCORY  ( MR KONE )', '20 30 20 37', 'MARCORY', '', 'achyasso@gmail.com', NULL, NULL, 4, 3),
(8, 'KOUADIO', 'AKISSI SONIA', ' 44615503', 'Koumassi', 'chretienne', 'styniangbala@gmail.com', NULL, NULL, 7, 7),
(9, 'SAVADOGO', 'EMMANUEL', ' 0804123224', 'RIVIERA 3', '', 'fvytvfytf@kjkj.com', NULL, NULL, 4, 8),
(10, 'AYENON', 'ARNAUD', ' 0909888', 'ghgh', '', 'jh@jkj.com', NULL, NULL, 5, 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`Id_cat_utilisateur`) REFERENCES `categorie_utilisateur` (`Id_cat_utilisateur`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `utilisateur_ibfk_2` FOREIGN KEY (`Id_modalite`) REFERENCES `modalite_paiement` (`Id_modalite`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
