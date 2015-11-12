-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1:3306
-- Généré le :  Jeu 12 Novembre 2015 à 00:41
-- Version du serveur :  5.5.45
-- Version de PHP :  5.4.45

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `themepark`
--
CREATE DATABASE IF NOT EXISTS `themepark` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `themepark`;

-- --------------------------------------------------------

--
-- Structure de la table `areas`
--

CREATE TABLE `areas` (
  `id` int(11) unsigned NOT NULL,
  `area_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `area_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `park_id` int(11) unsigned NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `areas`
--

INSERT INTO `areas` (`id`, `area_name`, `area_description`, `park_id`, `user_id`) VALUES
(4, 'Plage', 'Zone de la plage', 6, 9),
(5, 'Kids Zone', 'Kids Zone', 5, 2);

-- --------------------------------------------------------

--
-- Structure de la table `attractions`
--

CREATE TABLE `attractions` (
  `id` int(11) NOT NULL,
  `attraction_name` varchar(60) NOT NULL,
  `attraction_description` varchar(80) DEFAULT NULL,
  `admission_price` int(11) DEFAULT NULL,
  `area_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `attractions`
--

INSERT INTO `attractions` (`id`, `attraction_name`, `attraction_description`, `admission_price`, `area_id`, `user_id`) VALUES
(11, 'Restaurant', 'restaurant a hot-dog de la plage', 1, 4, 9);

-- --------------------------------------------------------

--
-- Structure de la table `attractions_types`
--

CREATE TABLE `attractions_types` (
  `id` int(11) NOT NULL,
  `attraction_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `attractions_types`
--

INSERT INTO `attractions_types` (`id`, `attraction_id`, `type_id`) VALUES
(7, 11, 3),
(8, 11, 5);

-- --------------------------------------------------------

--
-- Structure de la table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(1, 'Canada'),
(2, 'United-States');

-- --------------------------------------------------------

--
-- Structure de la table `parks`
--

CREATE TABLE `parks` (
  `id` int(11) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `park_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `park_location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state_id` int(11) NOT NULL,
  `park_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `park_website` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `parks`
--

INSERT INTO `parks` (`id`, `user_id`, `park_name`, `park_location`, `state_id`, `park_email`, `park_website`) VALUES
(5, 9, 'La ronde', 'Montreal', 1, 'laronde@laronde.com', 'http://laronde.com'),
(6, 9, 'Disney World', 'Orlando', 5, 'disney@disney.com', 'http://disney.com'),
(7, 8, 'aaaa', '', 7, 'a@a.com', 'http://de.com'),
(8, 8, 'aaaa', '', 6, 'aaa@aa.com', 'http://asd.com');

-- --------------------------------------------------------

--
-- Structure de la table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `states`
--

INSERT INTO `states` (`id`, `country_id`, `name`) VALUES
(1, 1, 'Quebec'),
(2, 1, 'Ontario'),
(3, 1, 'Alberta'),
(4, 1, 'British Colombia'),
(5, 2, 'California'),
(6, 2, 'Texas'),
(7, 2, 'Florida'),
(8, 2, 'Massachusetts');

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `type_description` varchar(80) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `types`
--

INSERT INTO `types` (`id`, `type_description`) VALUES
(1, 'enfant'),
(2, 'montagne russe'),
(3, 'restaurant'),
(4, 'caroussel'),
(5, 'fast-food'),
(6, 'sensation forte');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT '0',
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` blob,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `actif`, `role`, `email`, `image`, `created`, `modified`) VALUES
(8, 'admin', '$2a$10$RUkDULNCcxCU.hxiZrgjxOIchocYvEfMFvVwA1lR3NF7GQpm8g0We', 0, 'admin', 'admin@admin.com', NULL, '2015-09-18', '2015-09-18'),
(9, 'proprio', '$2a$10$rXHA79plPdz0kbzv4EMCPuMaY.9O6BdPvhJB/dG.57gFgjG6MEByG', 0, 'proprietaire', 'proprio@proprio.com', NULL, '2015-09-24', '2015-09-24'),
(10, 'proprio2', '$2a$10$mBpbRdJSWfWwSaCf4x98lejfqKsHiSrE/YzdZzEGW3v89PX7TC6pC', 0, 'proprietaire', 'fgauthier1985@gmail.com', NULL, '2015-10-01', '2015-10-01'),
(14, 'frank', '$2a$10$r/qMijPERU.vEgtA9q/8Pe5/q10Z4YmI/uPkMSNWY85jFyFs1KAkK', 1, 'proprietaire', 'fgauthier1985@gmail.com', NULL, '2015-11-11', '2015-11-11');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `attractions`
--
ALTER TABLE `attractions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `attractions_types`
--
ALTER TABLE `attractions_types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `parks`
--
ALTER TABLE `parks`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `attractions`
--
ALTER TABLE `attractions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `attractions_types`
--
ALTER TABLE `attractions_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `parks`
--
ALTER TABLE `parks`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
