-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : sql308.epizy.com
-- Généré le :  jeu. 09 sep. 2021 à 13:05
-- Version du serveur :  5.6.48-88.0
-- Version de PHP :  7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `epiz_29385187_to_do_list`
--

-- --------------------------------------------------------

--
-- Structure de la table `login_to_do_list`
--

CREATE TABLE `login_to_do_list` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `user_name` text NOT NULL,
  `user_password` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `login_to_do_list`
--

INSERT INTO `login_to_do_list` (`user_id`, `first_name`, `last_name`, `user_name`, `user_password`) VALUES
(29, 'hassna', 'abakhar', 'lovelyhasna01@gmail.com', 'shallwedate'),
(0, 'aymane', 'hansary', 'ayman2015hansary@gmail.com', 'aa');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
