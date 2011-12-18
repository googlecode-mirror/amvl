-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Serveur: 127.0.0.1
-- Généré le : Mer 14 Décembre 2011 à 08:42
-- Version du serveur: 5.5.10
-- Version de PHP: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `amv`
--

-- --------------------------------------------------------

--
-- Structure de la table `ph_admin`
--

CREATE TABLE IF NOT EXISTS `ph_admin` (
  `ID_ADMIN` int(1) NOT NULL,
  `LOGIN` varchar(20) NOT NULL,
  `PSSWD` varchar(40) NOT NULL,
  `PROFIL` int(8) NOT NULL,
  PRIMARY KEY (`ID_ADMIN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ph_admin`
--

INSERT INTO `ph_admin` (`ID_ADMIN`, `LOGIN`, `PSSWD`, `PROFIL`) VALUES
(1, 'dynastie', '78d76a6a447c99f07116bd52dca88dac', 99999999);

-- --------------------------------------------------------

--
-- Structure de la table `ph_amv`
--

CREATE TABLE IF NOT EXISTS `ph_amv` (
  `ID_AMV` int(5) NOT NULL,
  `NOM` varchar(30) NOT NULL,
  `AUTEUR` varchar(30) DEFAULT NULL,
  `IMG` varchar(50) NOT NULL,
  `DESCRIPTION` text,
  `NOTE` int(2) DEFAULT NULL,
  `DATE_POST` date NOT NULL,
  `POST_BY` varchar(20) NOT NULL,
  `MUSIQUE` varchar(50) DEFAULT NULL,
  `AUTEURMUSIQUE` varchar(30) DEFAULT NULL,
  `LIENSTREAM` varchar(100) NOT NULL,
  `LIENDL` varchar(100) DEFAULT NULL,
  `VISIBLE` int(1) NOT NULL,
  `ID_CAT` int(2) NOT NULL,
  PRIMARY KEY (`ID_AMV`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ph_amv`
--

INSERT INTO `ph_amv` (`ID_AMV`, `NOM`, `AUTEUR`, `IMG`, `DESCRIPTION`, `NOTE`, `DATE_POST`, `POST_BY`, `MUSIQUE`, `AUTEURMUSIQUE`, `LIENSTREAM`, `LIENDL`, `VISIBLE`, `ID_CAT`) VALUES
(1, 'test', 'test', '../ImgAmv/kallen.jpeg', 'amv pour test', 15, '0000-00-00', 'test', 'test', 'test', 'ww.youtube.com', 'ww.youtube.com', 1, 1),
(2, 'test2', 'test2', '../ImgAmv/kallen.jpeg', 'test2', 12, '2011-12-12', 'test2', 'test2', 'test2', 'test2', 'test2', 0, 2);

-- --------------------------------------------------------

--
-- Structure de la table `ph_categorie`
--

CREATE TABLE IF NOT EXISTS `ph_categorie` (
  `ID_CAT` int(2) NOT NULL,
  `LABELLE` varchar(20) NOT NULL,
  `CAT_PERE` int(2) DEFAULT NULL,
  PRIMARY KEY (`ID_CAT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ph_categorie`
--

INSERT INTO `ph_categorie` (`ID_CAT`, `LABELLE`, `CAT_PERE`) VALUES
(1, 'sport', NULL),
(2, 'foot', 1),
(3, 'romantique', NULL),
(4, 'action', NULL),
(5, 'sabre', 4);
