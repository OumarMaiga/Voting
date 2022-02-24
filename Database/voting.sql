-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 24 fév. 2022 à 21:05
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `voting`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidats`
--

CREATE TABLE `candidats` (
  `id` int(11) NOT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `date_naissance` date DEFAULT NULL,
  `genre` varchar(32) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `candidats`
--

INSERT INTO `candidats` (`id`, `prenom`, `nom`, `image`, `user_id`, `event_id`, `date_naissance`, `genre`, `created_at`) VALUES
(7, 'Jerom SEGOU', 'Dembele', 'public/upload/image/candidat/1645731550.jpg', 1, 14, '2000-01-01', 'h', '2022-02-24 19:39:10.000000'),
(8, 'Seydou', 'Kone BGOUNI', 'public/upload/image/candidat/1645732434.jpg', 1, 14, '2000-01-01', 'h', '2022-02-24 19:52:50.000000'),
(9, 'Boubacar', 'Diallo MOPTI', 'public/upload/image/candidat/1645732466.jpg', 1, 14, '2000-01-01', 'h', '2022-02-24 19:54:26.000000'),
(10, 'Moussa', 'Sinaba KOULIKORO', 'public/upload/image/candidat/1645732520.jpg', 1, 14, '2000-01-01', 'h', '2022-02-24 19:55:20.000000'),
(11, 'Famory', 'Sinaba SIBY', 'public/upload/image/candidat/1645732574.jpg', 1, 14, '2000-01-01', 'h', '2022-02-24 19:56:14.000000'),
(12, 'Guimbala', 'Keita KITA', 'public/upload/image/candidat/1645732630.jpg', 1, 14, '2000-01-01', 'h', '2022-02-24 19:57:10.000000'),
(13, 'Bamane', 'Doumbia BAMAKO', 'public/upload/image/candidat/1645732719.jpg', 1, 14, '2000-01-01', 'h', '2022-02-24 19:58:39.000000'),
(14, 'Josephine', 'Thera SAN', 'public/upload/image/candidat/1645732748.jpg', 1, 14, '2000-01-01', 'f', '2022-02-24 19:59:08.000000'),
(15, 'Sanaba', 'Fofana KAYES', 'public/upload/image/candidat/1645732825.jpg', 1, 14, '2000-01-01', 'f', '2022-02-24 20:00:25.000000'),
(16, 'Amidou', 'Drabo SIKASSO', 'public/upload/image/candidat/1645732864.jpg', 1, 14, '2000-01-01', 'h', '2022-02-24 20:01:04.000000'),
(17, 'Boubacar', 'Diallo GAO', 'public/upload/image/candidat/1645732934.jpg', 1, 14, '2000-01-01', 'h', '2022-02-24 20:02:14.000000'),
(18, 'Cheibane', 'Baby TOMBOUCTOU', 'public/upload/image/candidat/1645732991.jpg', 1, 14, '2000-01-01', 'h', '2022-02-24 20:03:11.000000');

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `categorie` varchar(255) DEFAULT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `expire` datetime(6) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`id`, `categorie`, `titre`, `description`, `expire`, `image`, `video`, `user_id`, `created_at`) VALUES
(14, 'TELEREALITE (Saison 1)', 'LE COLIER SACRE DU ROYAUME', 'Le colier sacré du royaume est une téléréalité qui se deroule au MALI ...\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. ', '2022-03-31 00:00:00.000000', 'public/upload/image/event/1645731321.jpg', NULL, 1, '2022-02-24 19:35:21.000000');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(32) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `genre` varchar(32) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`, `phone`, `prenom`, `nom`, `genre`, `created_at`) VALUES
(1, 'admin', '482c811da5d5b4bc6d497ffa98491e38', 'admin@voting.com', NULL, NULL, NULL, 'homme', '2022-01-08 00:06:17.000000');

-- --------------------------------------------------------

--
-- Structure de la table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `candidat_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `prix` int(11) DEFAULT NULL,
  `created_at` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `candidats`
--
ALTER TABLE `candidats`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `candidats`
--
ALTER TABLE `candidats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
