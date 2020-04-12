-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 18 déc. 2018 à 10:06
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie_utilisateur`
--

INSERT INTO `categorie_utilisateur` (`Id_cat_utilisateur`, `nom_cat_utilisateur`, `statut_cat_utilisateur`) VALUES
(1, 'ADMINISTRATEUR', '1'),
(2, 'CLIENT ACCOR', '0'),
(3, 'CLIENT CONTENTIEUX', '0'),
(4, 'CLIENT ROTISSERIE', '0'),
(5, 'CLIENT ABATTAGE', '0'),
(6, 'CLIENT REVENDEUR(SE)', '0'),
(7, 'CLIENT SUPER MARCHE', '0'),
(8, 'CLIENT ORDINAIRE', '0');

-- --------------------------------------------------------

--
-- Structure de la table `modalite_paiement`
--

DROP TABLE IF EXISTS `modalite_paiement`;
CREATE TABLE IF NOT EXISTS `modalite_paiement` (
  `Id_modalite` int(11) NOT NULL AUTO_INCREMENT,
  `nom_modalite` varchar(255) NOT NULL,
  PRIMARY KEY (`Id_modalite`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `modalite_paiement`
--

INSERT INTO `modalite_paiement` (`Id_modalite`, `nom_modalite`) VALUES
(1, 'CASH'),
(2, 'A CREDIT'),
(3, 'VOIR COMMENTAIRE');

-- --------------------------------------------------------

--
-- Structure de la table `operateur`
--

DROP TABLE IF EXISTS `operateur`;
CREATE TABLE IF NOT EXISTS `operateur` (
  `Id_operateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_operateur` varchar(255) NOT NULL,
  PRIMARY KEY (`Id_operateur`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `operateur`
--

INSERT INTO `operateur` (`Id_operateur`, `nom_operateur`) VALUES
(1, 'MTN'),
(2, 'ORANGE'),
(3, 'MOOV'),
(4, 'FIXE');

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
  `commentaire_utilisateur` text,
  `Id_cat_utilisateur` int(11) DEFAULT NULL,
  `Id_modalite` int(11) DEFAULT NULL,
  `Id_operateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_utilisateur`),
  KEY `Id_cat_utilisateur` (`Id_cat_utilisateur`),
  KEY `Id_modalite` (`Id_modalite`,`Id_operateur`),
  KEY `Id_operateur` (`Id_operateur`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`Id_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `tel_utilisateur`, `adresse_geo`, `confession_religieuse`, `mail_utilisateur`, `login_utilisateur`, `mdp_utilisateur`, `commentaire_utilisateur`, `Id_cat_utilisateur`, `Id_modalite`, `Id_operateur`) VALUES
(3, 'ACHY', 'ASSO STYVE MAURICE', '06104499', 'RIVIERA 2', 'chretien', 'achyasso@gmail.com', 'achyasso@gmail.com', 'achyasso@gmail.com', '', 1, NULL, 1),
(4, 'kimou', 'christian', '67647896', 'abobo sogefia', 'chretien', 'christian.85@live.fr', 'admin', 'admin', '', 1, NULL, 1),
(5, 'IBIS marcory', 'IBIS MARCORY  ( MR KONE )', ' 20 30 20 37', 'MARCORY', '', '', NULL, NULL, '', 7, 1, 1),
(6, 'IBIS PLATEAU ', 'IBIS PLATEAU (OBRE) ', ' 20 30 20 20', 'PLATEAU', '', '', NULL, NULL, '', 7, 1, 1),
(7, 'NOVOTEL( mr TANOH)', 'NOVOTEL( mr TANOH)', ' 08 04 47 56', 'PLATEAU', '', '', NULL, NULL, '', 7, 1, 1),
(8, 'ACCOR DION', 'ACCOR DION', ' 49 01 80 16', '', '', '', NULL, NULL, '', 2, 1, 1),
(9, 'PROSUMA ', 'PROSUMA (DIRECTION)', ' 21 25 34 16', 'TREICVILLE  ZONE 3 RUE DES BRASSEUR', '', '', NULL, NULL, '', 2, 1, 1),
(10, 'CASH CENTER ', 'CASH CENTER ', ' 22 41 39 06', '', '', '', NULL, NULL, '', 2, 1, 1),
(11, 'SOCOCE ', 'SOCOCE II PLATEAU', ' 22 41 92 00', '2 PLATEAU RUE DES JARDINS', '', '', NULL, NULL, '', 2, 1, 1),
(12, ' PRIMA', ' PRIMA( bouabre)', ' 41 54 42 87', 'ZONE 4 ', '', '', NULL, NULL, '', 2, 1, 1),
(13, 'HYPER HAYAT', 'HYPER HAYAT( KOUADIO)', ' 09 496 127', 'ZONE 4 CAP SUD', '', '', NULL, NULL, '', 2, 1, 1),
(14, 'HAYAT 2 PLATEAU ', 'HAYAT 2 PLATEAU ( coulibaly)', ' 07 42 12 63', '2 PLATEAU RUE DES JARDINS', '', '', NULL, NULL, '', 2, 1, 1),
(15, 'FROID INDUSTRIEL', 'FROID INDUSTRIEL', ' 20 21 73 42', 'PLATEAU DERR PYRAM', '', '', NULL, NULL, '', 2, 1, 1),
(16, 'LEADER PRICE', 'LEADER PRICE', ' 09 06 46 58', 'RIVIERA GOLF', '', '', NULL, NULL, '', 2, 1, 1),
(17, 'JOUR DE MARCHE ', 'JOUR DE MARCHE (CHINOIS)', ' 48 70 29 08', 'ANGRE', '', '', NULL, NULL, '', 2, 1, 1),
(18, 'MME GRAN PLATEAU', 'MME GRAN PLATEAU', ' 07 57 10 78', 'PLATEAU', '', '', NULL, NULL, '', 3, 1, 1),
(19, 'MME ASSEMIEN', 'MME ASSEMIEN', ' 55 23 59 57', 'KOUMASSI', '', '', NULL, NULL, '', 3, 1, 1),
(20, 'MME DRIGBA', 'MME DRIGBA', ' 58070817', 'MARCORY', '', '', NULL, NULL, '', 3, 1, 1),
(21, 'MME NANA', 'MME NANA', ' 07 81 02 27', 'KOUMASSI', '', '', NULL, NULL, '', 3, 1, 1),
(22, 'MME KOUASSI ', 'MME KOUASSI ', ' 07 03 73 63', 'RIVIERA FAYA', '', '', NULL, NULL, '', 3, 1, 1),
(23, 'MME KOUAKOU', 'MME KOUAKOU', '000000000', 'PLATEAU', '', '', NULL, NULL, '', 3, 1, 1),
(24, 'MEL RAYMONDE', 'MEL RAYMONDE', ' 000000000', 'MARCORY', '', '', NULL, NULL, '', 3, 1, 1),
(25, 'MR ZOUZOU HAMED', 'MR ZOUZOU HAMED', ' 000000000', '', '', '', NULL, NULL, '', 4, 1, 1),
(26, 'MARINA', 'MARINA', ' 77 86 88 58', '', '', '', NULL, NULL, '', 4, 1, 1),
(27, 'MR TRAORE', 'MR TRAORE', ' 000000000', '', '', '', NULL, NULL, '', 4, 1, 1),
(28, 'MR ABOUA', 'MR ABOUA', ' 07 90 67 38', '', '', '', NULL, NULL, '', 4, 1, 1),
(29, 'ISABELLE', 'ISABELLE', ' 47 63 69 92', '', '', '', NULL, NULL, '', 4, 1, 1),
(30, 'JANINE', 'JANINE', ' 000000000', '', '', '', NULL, NULL, '', 4, 1, 1),
(31, 'MME BEDA', 'MME BEDA', ' 000000000', '', '', '', NULL, NULL, '', 4, 1, 1),
(32, 'MR N\'GORAN', 'MR N\'GORAN', ' 000000000', '', '', '', NULL, NULL, '', 4, 1, 1),
(33, 'MICHEL', 'MICHEL ROTISSEUR', ' 000000000', 'test', '', 'test@gmail.com', NULL, NULL, 'tester', 5, 1, 1),
(34, 'IBRAHIM', 'IBRAHIM', ' 000000000', '', '', '', NULL, NULL, '', 5, 1, 1),
(35, 'ALADJI ', ' SOULEYMANE', ' 07 40 25 16', 'COCODY 2 PLTX', '', '', NULL, NULL, '', 6, 1, 1),
(36, 'ZAKARIA YOP', 'ZAKARIA YOP', ' 08 72 31 43', 'YOPOUGON', '', '', NULL, NULL, '', 6, 1, 1),
(37, 'ZAKARIA COCODY CENTRE', 'ZAKARIA COCODY CENTRE', ' 58 06 14 23', 'COCODY', '', '', NULL, NULL, '', 6, 1, 1),
(38, 'HAMED YOP', 'HAMED YOP', ' 000000000', 'YOPOUGON', '', '', NULL, NULL, '', 6, 1, 1),
(39, 'RESTO VAROLD', 'RESTO VAROLD', ' 000000000', 'RIVIERA ', '', '', NULL, NULL, '', 6, 1, 1),
(40, 'RESTO TY BREIZ', 'RESTO TY BREIZ', ' 000000000', 'COCODY', '', '', NULL, NULL, '', 6, 1, 1),
(41, 'MME KONAN', 'MME KONAN', ' 40 69 78 92', '', '', '', NULL, NULL, '', 6, 1, 1),
(42, 'MME BOBO', 'MME BOBO', ' 77 43 05 62', '', '', '', NULL, NULL, '', 6, 1, 1),
(43, 'DOUMBIA', 'DOUMBIA', ' 05 45 71 44', '', '', '', NULL, NULL, '', 6, 1, 1),
(44, 'IVOIRE FERMIERE', 'IVOIRE FERMIERE', ' 77 86 88 58', '', '', '', NULL, NULL, '', 6, 1, 1),
(45, 'ISSA', 'ISSA', ' 000000000', '', '', '', NULL, NULL, '', 6, 1, 1),
(46, 'ZAKO', 'ZAKO', ' 08 04 98 86', '', '', '', NULL, NULL, '', 6, 1, 1),
(47, 'SAIDOU', 'SAIDOU', ' 75 47 10 07', 'COCODY ST JEAN', '', '', NULL, NULL, '', 6, 1, 1),
(48, ' LOUVEL', 'NOEL', '07798860', 'BINGERVILLE', 'CATHOLIQUE', '', NULL, NULL, '', 2, 1, 1),
(49, 'IVOIRE FERMIERE', 'IVOIRE FERMIERE', '000000000', '', '', '', NULL, NULL, '', 4, 1, 1),
(50, 'MME LOUVEL', 'NOEL', '07798860', '', '', '', NULL, NULL, '', 2, 1, 1),
(51, 'CLARISSE', 'CLARISSE', '000000000', '', '', '', NULL, NULL, '', 4, 1, 1),
(52, 'MLLE ALIMAN', 'MLLE ALIMAN', '000000000', '', '', '', NULL, NULL, '', 3, 1, 1),
(53, 'N CHO', 'HONORE', '000000000', '', '', '', NULL, NULL, '', 3, 1, 1),
(54, 'MME TANO', 'TANO', '000000000', '', '', '', NULL, NULL, '', 3, 1, 1),
(55, 'MR', 'SEYDOU', '05411678', '', '', '', NULL, NULL, '', 3, 1, 1),
(56, 'MR', 'OUSSOUMAN', '05006214', '', '', '', NULL, NULL, '', 3, 1, 1),
(57, 'MR', 'ISSOUF', '000000000', '', '', '', NULL, NULL, '', 3, 1, 1),
(58, 'MR', 'KOUAME', '000000000', '', '', '', NULL, NULL, '', 3, 1, 1),
(59, 'MME', 'FATOU', '000000000', '', '', '', NULL, NULL, '', 3, 1, 1),
(60, 'MR', 'ARMAND', '000000000', '', '', '', NULL, NULL, '', 3, 1, 1),
(61, 'MR', 'KOKORA', '41717302', '', '', '', NULL, NULL, '', 3, 1, 1),
(62, 'MR', 'IBRAHIM', '000000000', '', '', '', NULL, NULL, '', 2, 1, 1),
(63, 'MR', 'YACOYU', '000000000', '', '', '', NULL, NULL, '', 3, 1, 1),
(64, 'MR ', 'KOFFI', '000000000', '', '', '', NULL, NULL, '', 3, 1, 1),
(65, 'MR', 'DAH', '000000000', '', '', '', NULL, NULL, '', 2, 1, 1),
(66, 'MR', 'AMANI', '000000000', '', '', '', NULL, NULL, '', 3, 1, 1),
(67, 'MLLE', 'ISABELLE', '000000000', '', '', '', NULL, NULL, '', 2, 1, 1),
(68, 'MME', 'YAO', '000000000', '', '', '', NULL, NULL, '', 2, 1, 1),
(69, 'MME', 'ELISE', '000000000', '', '', '', NULL, NULL, '', 3, 1, 1),
(70, 'MME', 'KONE', '000000000', '', '', '', NULL, NULL, '', 2, 1, 1),
(71, 'MR', 'KOFFI', '46174511', '', '', '', NULL, NULL, '', 3, 1, 1),
(72, 'MR', 'LUISIN', '000000000', '', '', '', NULL, NULL, '', 3, 1, 1),
(73, 'MR', 'ABOUBAKA', '000000000', '', '', '', NULL, NULL, '', 3, 1, 1),
(74, 'VIEUX', 'MORY', '000000000', '', '', '', NULL, NULL, '', 2, 1, 1),
(75, 'MME', 'BINTOU', '000000000', '', '', '', NULL, NULL, '', 3, 1, 1),
(76, 'MR', 'ABRE', '58471886', '', '', '', NULL, NULL, '', 3, 1, 1),
(77, 'MR', 'PAPIX', '000000000', '', '', '', NULL, NULL, '', 3, 1, 1),
(78, 'MR', 'ABOU', '000000000', '', '', '', NULL, NULL, '', 3, 1, 1),
(79, 'MME', 'AMANI', '000000000', '', '', '', NULL, NULL, '', 3, 1, 1),
(80, 'MLLE', 'AWA', '000000000', '', '', '', NULL, NULL, '', 3, 1, 1),
(81, 'MR', 'SIDI', '000000000', '', '', '', NULL, NULL, '', 3, 1, 1),
(82, 'MR', 'SOULEYMANE', '000000000', '', '', '', NULL, NULL, '', 3, 1, 1),
(83, 'MR', 'HAMZA', '000000000', '', '', '', NULL, NULL, '', 3, 1, 1),
(84, 'MME', 'SAMIRA', '76885688', '', '', '', NULL, NULL, '', 2, 1, 1),
(85, 'MR', 'CHLOVICE', '05114562', '', '', '', NULL, NULL, '', 3, 1, 1),
(86, 'MR', 'MATTIEU', '000000000', '', '', '', NULL, NULL, '', 3, 1, 1),
(87, 'MR', 'MAURITANIEN', '000000000', '', '', '', NULL, NULL, '', 2, 1, 1),
(88, 'MR', 'FADIGA', '77779388', '', '', '', NULL, NULL, '', 3, 1, 1),
(89, 'MR', 'IBRAHIM', '000000000', '', '', '', NULL, NULL, '', 2, 1, 1),
(90, 'MME', 'EVELYNE', '49032692', '', '', '', NULL, NULL, '', 3, 1, 1),
(91, 'MME', 'SIA', '000000000', '', '', '', NULL, NULL, '', 3, 1, 1),
(92, 'MR', 'PASTEUR', '000000000', '', '', '', NULL, NULL, '', 3, 1, 1),
(93, 'MME', 'ASSOHOU', '08171339', '', '', '', NULL, NULL, '', 3, 1, 1),
(94, 'MME', 'DIOMANDE', '59589057', '', '', '', NULL, NULL, '', 3, 1, 1),
(95, 'MME', 'N GUESSAN', '000000000', '', '', '', NULL, NULL, '', 2, 1, 1),
(96, 'TANTIE', 'CLAIRE', '000000000', '', '', '', NULL, NULL, '', 2, 1, 1),
(97, 'MLLE', 'FATIM', '000000000', '', '', '', NULL, NULL, '', 3, 1, 1),
(98, 'MME', 'ELLOH', '000000000', '', '', '', NULL, NULL, '', 3, 1, 1),
(99, 'MR', 'ESMEL', '56517603', '', '', '', NULL, NULL, '', 3, 1, 1),
(100, 'MR', 'KREDY', '07444907', '', '', '', NULL, NULL, '', 3, 1, 1),
(101, 'MR', 'COULIBALY', '48867522', '', '', '', NULL, NULL, '', 3, 1, 1),
(102, 'MR', 'REDA', '000000000', '', '', '', NULL, NULL, '', 3, 1, 1),
(103, 'MR', 'CAMARA', '49501195', '', '', '', NULL, NULL, '', 3, 1, 1),
(104, 'MR', 'RACHIDI', '000000000', '', '', '', NULL, NULL, '', 3, 1, 1),
(105, 'MR', 'KONAN', '77348111', '', '', '', NULL, NULL, '', 3, 1, 1),
(106, 'MME', 'ALIMAN', '02036818', '', '', '', NULL, NULL, '', 3, 1, 1),
(107, 'MR', 'KAMBOU', '49111589', '', '', '', NULL, NULL, '', 2, 1, 1),
(108, 'MR', 'SACO', '000000000', '', '', '', NULL, NULL, '', 3, 1, 1),
(109, 'MR', 'ANDRE', '000000000', '', '', '', NULL, NULL, '', 2, 1, 1),
(110, 'MR', 'KAMARA', '59562105', '', '', '', NULL, NULL, '', 3, 1, 2),
(111, 'MR', 'ASSEMIAN', '000000000', '', '', '', NULL, NULL, '', 3, 1, 3),
(112, 'MME', 'BALAKISSA', '000000000', '', '', '', NULL, NULL, '', 2, 1, 1),
(113, 'CAMARA', 'ACCOR DION', '49501195', 'ABIDJAN', 'MUSULMAN', '', NULL, NULL, '', 3, 1, 1),
(114, 'Test', 'TESTEUR', '44615503', 'Riviera2', 'CATHOLIQUE', 'achyasso@gmail.com', NULL, NULL, 'Le test Ã  rÃ©ussi', 8, 3, 3);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`Id_cat_utilisateur`) REFERENCES `categorie_utilisateur` (`Id_cat_utilisateur`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `utilisateur_ibfk_2` FOREIGN KEY (`Id_operateur`) REFERENCES `operateur` (`Id_operateur`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `utilisateur_ibfk_3` FOREIGN KEY (`Id_modalite`) REFERENCES `modalite_paiement` (`Id_modalite`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
