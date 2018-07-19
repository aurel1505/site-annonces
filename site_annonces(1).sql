-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 16 mars 2018 à 16:45
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `site_annonces`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

DROP TABLE IF EXISTS `annonces`;
CREATE TABLE IF NOT EXISTS `annonces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `texte` text COLLATE utf8_unicode_ci NOT NULL,
  `images` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `author` int(11) NOT NULL DEFAULT '0',
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`id`, `titre`, `description`, `texte`, `images`, `date`, `author`, `enabled`) VALUES
(1, 'Tulipe', 'splendide fleur jaune', 'pas cher 10 balles', 'annonce_1.jpg', '2018-03-13', 6, 1),
(2, 'Méduse', 'A déguster en apéro', 'et en salade', 'annonce_2.jpg', '2018-03-13', 6, 1),
(3, 'Autre fleur', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dapibus nulla nec ipsum finibus dictum. Mauris rutrum felis vitae sapien ultricies, eget interdum orci varius. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dapibus nulla nec ipsum finibus dictum. Mauris rutrum felis vitae sapien ultricies, eget interdum orci varius. ', 'annonce_3.jpg', '2018-03-13', 0, 1),
(4, 'Fleur 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dapibus nulla nec ipsum finibus dictum. Mauris rutrum felis vitae sapien ultricies, eget interdum orci varius. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dapibus nulla nec ipsum finibus dictum. Mauris rutrum felis vitae sapien ultricies, eget interdum orci varius. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dapibus nulla nec ipsum finibus dictum. Mauris rutrum felis vitae sapien ultricies, eget interdum orci varius. ', 'annonce_4.jpg', '2018-03-13', 7, 1),
(5, 'test du front', 'test du fronttest du fronttest du fronttest du fronttest du fronttest du fronttest du fronttest du front', 'test du fronttest du fronttest du fronttest du fronttest du fronttest du fronttest du fronttest du fronttest du front', 'annonce_5.jpg', '2018-03-14', 6, 1),
(6, 'test back', 'test backtest backtest backtest backtest backtest backtest back', 'test backtest backtest backtest backtest backtest backtest back', 'annonce_6.jpg', '2018-03-14', 6, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pseudo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1',
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `pseudo`, `password`, `role`, `enabled`) VALUES
(6, 'Ooo', 'Ooo', 'ooo', '$2y$10$aaaaaaaaaaaaaaaaaaaaaOVjnUIMRgRlSTAHIVv4ezINfv.iqyvNa', 1, 1),
(7, 'Mmm', 'Mmm', 'mmm', '$2y$10$aaaaaaaaaaaaaaaaaaaaaOGWt.XaYnOrUc3..KJLaR9dNHVkoa4kG', 1, 1),
(8, 'ljkjkljkl', 'lkjjkljl!k', 'l!kjkjllkj', 'ljkjkl', 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
