-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 15 juil. 2022 à 10:30
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cinetech`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `commentaire` varchar(255) NOT NULL,
  `support_id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `user_id`, `commentaire`, `support_id`, `type`) VALUES
(3, 1, 'tttt', 9982, 'movie'),
(5, 5, 'super film', 278, 'movie'),
(34, 5, 'yerp', 94605, 'tv'),
(69, 5, 'super film', 94605, 'tv'),
(73, 5, 'yeaaah', 438148, 'movie'),
(74, 5, 'yeaaah', 92782, 'tv'),
(75, 5, 'youyou', 438148, 'movie'),
(76, 5, 'youyou', 438148, 'movie'),
(77, 5, '', 278, 'movie'),
(78, 5, '', 278, 'movie'),
(79, 5, '', 616037, 'movie'),
(80, 5, '', 424, 'movie'),
(81, 5, '', 424, 'movie'),
(82, 5, '', 424, 'movie'),
(83, 5, '', 424, 'movie'),
(84, 5, '', 424, 'movie'),
(85, 5, '', 238, 'movie'),
(86, 5, '', 157350, 'movie'),
(87, 5, '', 157350, 'movie'),
(88, 5, '', 157350, 'movie'),
(89, 5, '', 157350, 'movie'),
(90, 5, '', 157350, 'movie'),
(91, 5, '', 157350, 'movie'),
(92, 5, '', 157350, 'movie'),
(93, 5, '', 157350, 'movie'),
(94, 5, '', 157350, 'movie'),
(95, 5, '', 864116, 'movie'),
(96, 5, '', 864116, 'movie'),
(97, 5, '', 864116, 'movie'),
(98, 5, '', 864116, 'movie'),
(99, 5, '', 864116, 'movie'),
(100, 5, '', 864116, 'movie'),
(101, 5, '', 864116, 'movie'),
(102, 5, '', 159117, 'movie'),
(103, 5, '', 159117, 'movie'),
(104, 5, '', 159117, 'movie'),
(105, 5, '', 159117, 'movie'),
(106, 5, '', 9792, 'movie'),
(107, 5, '', 9792, 'movie'),
(108, 5, '', 9792, 'movie'),
(109, 5, '', 9792, 'movie'),
(110, 5, '', 9792, 'movie'),
(111, 5, '', 9792, 'movie'),
(112, 5, '', 9792, 'movie'),
(113, 5, '', 9679, 'movie'),
(114, 5, '', 9679, 'movie'),
(115, 5, '', 9679, 'movie'),
(116, 5, '', 9679, 'movie'),
(117, 5, '', 135647, 'tv'),
(118, 5, '', 135647, 'tv'),
(119, 5, '', 135647, 'tv'),
(120, 5, '', 135647, 'tv'),
(121, 5, '', 135647, 'tv'),
(124, 5, '', 424, 'movie'),
(125, 5, '', 639933, 'movie'),
(126, 5, '', 756999, 'movie'),
(127, 5, '', 240, 'movie'),
(128, 5, '', 240, 'movie'),
(129, 5, '', 240, 'movie'),
(130, 5, '', 240, 'movie'),
(131, 5, '', 94605, 'tv'),
(132, 5, '', 94605, 'tv'),
(133, 5, '', 94605, 'tv'),
(134, 5, '', 438148, 'movie'),
(135, 5, '', 438148, 'movie'),
(136, 5, '', 438148, 'movie'),
(137, 5, '', 438148, 'movie');

-- --------------------------------------------------------

--
-- Structure de la table `droits`
--

CREATE TABLE `droits` (
  `id` int(10) NOT NULL,
  `nom_droit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `droits`
--

INSERT INTO `droits` (`id`, `nom_droit`) VALUES
(1, 'administrateur'),
(2, 'utilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `support_id` int(10) NOT NULL,
  `type` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `favoris`
--

INSERT INTO `favoris` (`id`, `user_id`, `support_id`, `type`) VALUES
(5, 5, 862, 'movie'),
(6, 5, 840, 'movie'),
(7, 5, 150023, 'movie'),
(8, 5, 2118, 'movie'),
(10, 5, 278, 'movie'),
(11, 5, 616037, 'movie'),
(12, 5, 424, 'movie'),
(14, 5, 238, 'movie'),
(16, 5, 157350, 'movie'),
(17, 5, 864116, 'movie'),
(18, 5, 159117, 'movie'),
(23, 5, 135647, 'tv'),
(25, 5, 639933, 'movie'),
(26, 5, 756999, 'movie'),
(27, 5, 240, 'movie'),
(29, 5, 94605, 'tv'),
(30, 5, 438148, 'movie');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(10) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `droit_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `pseudo`, `mail`, `mdp`, `droit_id`) VALUES
(1, 'admin', 'admin@admin.fr', '$argon2i$v=19$m=65536,t=4,p=1$QmNzdUZvckxkUmZDYUxEcA$hBueCkh+R5iRt5BXqJaLil2cP6y8nziKz4LkVM59Jh4', 1),
(5, 'fredok', 'fredok@mail.com', '$argon2i$v=19$m=65536,t=4,p=1$LkhoRGkxVzVXNDhwcUdLUQ$odHJs52bkdaCOD2yZj1ZhSMz91Dz4hN8t0bLZSywhkU', 1),
(8, 'fred', 'fred@mail.com', '$argon2i$v=19$m=65536,t=4,p=1$LkhoRGkxVzVXNDhwcUdLUQ$odHJs52bkdaCOD2yZj1ZhSMz91Dz4hN8t0bLZSywhkU', 2),
(21, 'fredo', 'fredo@mail.com', '$argon2i$v=19$m=65536,t=4,p=1$LkhoRGkxVzVXNDhwcUdLUQ$odHJs52bkdaCOD2yZj1ZhSMz91Dz4hN8t0bLZSywhkU', 2),
(22, 'fredd', 'fredd@fredd.fr', '$argon2i$v=19$m=65536,t=4,p=1$NmpDNzBteUl0YXF1VFZNNw$PU3948C2sR5YIWrhJTmIiE406LwV5IR+21IXxmisdzM', 2),
(23, 'frd', 'frd@mail.com', '$argon2i$v=19$m=65536,t=4,p=1$LkhoRGkxVzVXNDhwcUdLUQ$odHJs52bkdaCOD2yZj1ZhSMz91Dz4hN8t0bLZSywhkU', 2),
(24, 'fredoklemdok2', 'fredoklemedok@mail.com', '$argon2i$v=19$m=65536,t=4,p=1$amFUSDBMNzZ0cUtRTjMuUw$o0LIM5VNnsmwdpiBHd+3UWVXtU1/q8GMUo1Pu0Jqi5o', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK2` (`user_id`) USING BTREE;

--
-- Index pour la table `droits`
--
ALTER TABLE `droits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`user_id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`droit_id`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT pour la table `droits`
--
ALTER TABLE `droits`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `utilisateurs` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `favoris_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `utilisateurs_ibfk_1` FOREIGN KEY (`droit_id`) REFERENCES `droits` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
