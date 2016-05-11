-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 11 Mai 2016 à 12:29
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `gdp`
--

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intitule` text NOT NULL,
  `flagClasses` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cours`
--

INSERT INTO `cours` (`id`, `intitule`, `flagClasses`) VALUES
(1, 'Administration de serveur de messagerie', ''),
(2, 'Workshop agile', '');

-- --------------------------------------------------------

--
-- Structure de la table `examen`
--

DROP TABLE IF EXISTS `examen`;
CREATE TABLE IF NOT EXISTS `examen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCours` int(11) NOT NULL,
  `nom` text NOT NULL,
  `debutExamen` text NOT NULL,
  `finExamen` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idCours` (`idCours`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `examen`
--

INSERT INTO `examen` (`id`, `idCours`, `nom`, `debutExamen`, `finExamen`) VALUES
(2, 1, 'Examen numéro 1', '', 0),
(3, 1, 'Examen numéro 1', '', 0),
(4, 1, 'Examen numéro 1', '', 0),
(5, 2, 'Examen numéro 1', '', 0),
(6, 2, 'Examen numéro 1', '', 0),
(7, 1, 'hvjdvzbdkjzba', '', 0),
(8, 1, 'hvjdvzbdkjzba', '', 0),
(9, 1, 'hvjdvzbdkjzba', '', 0),
(10, 1, 'hvjdvzbdkjzba', '', 0),
(11, 1, 'hvjdvzbdkjzba', '', 0),
(12, 1, 'hvjdvzbdkjzba', '', 0),
(13, 1, 'nlkn', '', 0),
(14, 1, 'bd', '', 0),
(15, 1, 'fefezf', '', 0),
(16, 1, 'fefezf', '', 0),
(17, 1, 'cqzcq', '', 0),
(18, 1, 'cqzcq', '', 0),
(19, 1, 'cdza', '', 0),
(20, 1, 'dzdaa', '', 0),
(21, 1, 'jkjb', '', 0),
(22, 1, 'kjbkjb', '', 0),
(23, 1, 'ezfzefz', '', 0),
(24, 1, 'fefezf', '', 0),
(25, 1, 'fezfez', '', 0),
(26, 1, 'efzfze', '', 0),
(27, 1, 'ffz', '', 0),
(28, 1, 'hjjhj', '', 0),
(29, 1, 'fefze', '', 0),
(30, 1, 'vhhvjhvvhj', '', 0),
(31, 1, 'jhkbjk', '', 0),
(32, 1, 'test de merde!', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idExamen` int(11) NOT NULL,
  `question` text NOT NULL,
  `type` text NOT NULL,
  `propositions` text NOT NULL,
  `points` text NOT NULL,
  `correction` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idExamen` (`idExamen`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `question`
--

INSERT INTO `question` (`id`, `idExamen`, `question`, `type`, `propositions`, `points`, `correction`) VALUES
(2, 2, 'Q1', 'libre', '', '', ''),
(3, 3, 'hvdhjzvhjda ?', 'multiple', '["T"]', '4', ''),
(4, 4, 'bjbkjkbkjbjkb', 'multiple', '["13"]', '5', ''),
(5, 6, '61', 'multiple', '["651165"]', '1', ''),
(6, 7, '454', 'multiple', '["1"]', '4', ''),
(7, 8, 'bbknkl', 'multiple', '["16651"]', '4655', ''),
(8, 9, '454', 'multiple', '["1"]', '4', ''),
(9, 10, '16565', 'multiple', '["516"]', '5', ''),
(10, 11, '16565', 'multiple', '["516"]', '5', ''),
(11, 12, '16565', 'multiple', '["516"]', '5', ''),
(12, 13, '2', 'multiple', '["3"]', '1', ''),
(13, 14, '2', 'multiple', '["3"]', '1', ''),
(14, 15, '2', 'multiple', '["3"]', '1', ''),
(15, 15, '5', 'multiple', '["6"]', '4', ''),
(16, 16, '2', 'multiple', '["3"]', '1', ''),
(17, 16, '5', 'multiple', '["6"]', '4', ''),
(18, 17, '1', 'multiple', '["1"]', '1', ''),
(19, 18, '1', 'multiple', '["1"]', '1', ''),
(20, 19, '1', 'multiple', '["1"]', '1', ''),
(21, 23, '1', 'multiple', '["1"]', '1', ''),
(22, 24, '1', 'multiple', '["1"]', '1', '');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` text NOT NULL,
  `sexe` text NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `mail` text NOT NULL,
  `password` text NOT NULL,
  `droit` int(11) NOT NULL,
  `idClasse` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idClasse` (`idClasse`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `login`, `sexe`, `nom`, `prenom`, `mail`, `password`, `droit`, `idClasse`) VALUES
(1, 'T4GAD4', 'M', 'capi', 'aurélien', 'capi.aurelien@gmail.com', 'test', 1, 0),
(3, 'test', 'M', 'test', 'test', 'test@test.fr', 'test', 0, 10),
(4, 'proftest', 'M', 'testprof', 'testprof', 'testprof@test.Fr', 'testprof', 1, NULL);
