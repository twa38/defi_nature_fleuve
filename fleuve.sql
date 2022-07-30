-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Sam 30 Juillet 2022 à 20:31
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dnf_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `fleuve`
--

CREATE TABLE `fleuve` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `longueur` int(11) DEFAULT NULL,
  `debit` float DEFAULT NULL,
  `altitude` int(11) DEFAULT NULL,
  `bassin` int(11) DEFAULT NULL,
  `pastille` varchar(10) DEFAULT NULL,
  `description` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `fleuve`
--

INSERT INTO `fleuve` (`id`, `nom`, `longueur`, `debit`, `altitude`, `bassin`, `pastille`, `description`) VALUES
(77, 'Rhône', 812, 41.6, 2209, 913, 'rouge', NULL),
(78, 'Seine', 775, 328, 446, 79000, NULL, NULL),
(80, 'Loire', 1006, 931, 1408, 117356, NULL, NULL),
(81, 'indus', 3180, 4072, 6500, 1081700, NULL, NULL),
(82, 'Garonne', 529, 650, 1860, 55000, NULL, NULL),
(83, 'Golo', 89, 14.1, 1991, 926, NULL, NULL),
(84, 'Gange', 2510, 16648, 459, 907000, NULL, NULL),
(85, 'Rhin', 1233, 2300, 2300, 198000, NULL, NULL),
(86, 'Nil', 6700, 2830, 1788, 3400000, NULL, NULL),
(87, 'Amazone', 7025, 209000, 5170, 6112000, 'verte', NULL),
(90, 'Ob', 3650, 12975, NULL, 2975000, NULL, NULL),
(89, 'Mississippi', 3780, 18000, 450, 3238000, NULL, NULL),
(91, 'Oyapock', 403, 835, NULL, 26820, NULL, NULL),
(92, 'Volga', 3700, 8060, 228, 1350000, NULL, NULL),
(93, 'Parnaíba', 1344, 846, 700, 344112, NULL, 'Brésil'),
(94, 'Paraná', 4099, 16800, NULL, 2582672, NULL, 'Brésil Paraguay Argentine'),
(95, 'Fleuve rouge', 1149, 3640, 1776, 170977, NULL, 'Chine puis Viêt Nam'),
(96, 'Yangtsé', 6380, 30000, 5355, 1800000, 'jaune', 'Chine'),
(97, 'Pô', 652, 1560, 2022, 71057, NULL, 'Le Pô est le plus important fleuve italien tant par sa longueur que par son débit maximum.'),
(98, 'Tamise', 346, 81.7, 110, 12935, NULL, 'Royaume-Uni'),
(99, 'Corrib ', 6, 104.8, NULL, 3101, NULL, 'Ce fleuve a une longueur totale de seulement 6 kilomètres, ce qui le range comme l\'un des plus petits fleuves d\'Europe.'),
(100, 'Danube', 2850, 6500, 1078, 802266, NULL, 'Le Danube est le deuxième fleuve d’Europe par sa longueur après la Volga qui coule entièrement en Russie.'),
(101, 'Tage ', 1078, 236, 1580, 81447, NULL, NULL),
(102, 'Rangitata', 120, 95, NULL, 1773, NULL, NULL),
(103, 'Dniestr', 1362, 377, 1000, 72100, NULL, 'Le Dniestr est un fleuve d\'Europe de l\'Est long de 1 362 km, ayant sa source dans les Beskides orientales en Ukraine. '),
(104, 'Nelson', 660, 2400, 218, 1093442, NULL, NULL),
(105, 'Magadalena', 1558, 7300, 3685, 259000, NULL, 'Le Magdalena est le fleuve le plus important de Colombie.'),
(107, 'Sepik', 1126, 3804, 2170, 80321, NULL, 'Le fleuve prend sa source près de Telefomin dans les haut-plateaux centraux de la Nouvelle-Guinée, il coule ensuite vers le nord-ouest et quitte les montagnes près de Yapsei.'),
(109, 'Chelif', 733, 49, 1500, 59150, NULL, 'Le Chelif est le plus important fleuve d\'Algérie.');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `fleuve`
--
ALTER TABLE `fleuve`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `fleuve`
--
ALTER TABLE `fleuve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
