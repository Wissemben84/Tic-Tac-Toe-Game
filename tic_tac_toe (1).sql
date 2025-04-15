-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 15 avr. 2025 à 08:38
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tic_tac_toe`
--

-- --------------------------------------------------------

--
-- Structure de la table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `result` varchar(10) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `games`
--

INSERT INTO `games` (`id`, `user_id`, `result`, `date`) VALUES
(1, 1, 'X', '2025-04-09 19:42:05'),
(2, 2, 'O', '2025-04-09 19:42:05'),
(3, 3, 'Draw', '2025-04-09 19:42:05'),
(4, 4, 'X', '2025-04-09 19:42:05'),
(5, 5, 'O', '2025-04-09 19:42:05'),
(6, 6, 'Draw', '2025-04-09 19:42:05'),
(7, 7, 'X', '2025-04-09 19:42:05'),
(8, 8, 'O', '2025-04-09 19:42:05'),
(9, 9, 'Draw', '2025-04-09 19:42:05'),
(10, 10, 'X', '2025-04-09 19:42:05'),
(11, 11, 'O', '2025-04-09 19:42:05'),
(12, 12, 'Draw', '2025-04-09 19:42:05'),
(13, 13, 'X', '2025-04-09 19:42:05'),
(14, 14, 'O', '2025-04-09 19:42:05'),
(15, 15, 'Draw', '2025-04-09 19:42:05'),
(16, 16, 'X', '2025-04-09 19:42:05'),
(17, 17, 'O', '2025-04-09 19:42:05'),
(18, 18, 'Draw', '2025-04-09 19:42:05'),
(19, 19, 'X', '2025-04-09 19:42:05'),
(20, 20, 'O', '2025-04-09 19:42:05');

-- --------------------------------------------------------

--
-- Structure de la table `game_moves`
--

CREATE TABLE `game_moves` (
  `id` int(11) NOT NULL,
  `game_id` int(11) DEFAULT NULL,
  `move_number` int(11) DEFAULT NULL,
  `position` varchar(5) DEFAULT NULL,
  `player` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `game_moves`
--

INSERT INTO `game_moves` (`id`, `game_id`, `move_number`, `position`, `player`) VALUES
(1, 1, 1, '0,0', 'X'),
(2, 1, 2, '0,1', 'O'),
(3, 1, 3, '1,1', 'X'),
(4, 1, 4, '2,0', 'O'),
(5, 1, 5, '2,2', 'X'),
(6, 2, 1, '0,0', 'X'),
(7, 2, 2, '0,1', 'O'),
(8, 2, 3, '1,1', 'X'),
(9, 2, 4, '1,2', 'O'),
(10, 2, 5, '2,2', 'X'),
(11, 3, 1, '0,0', 'X'),
(12, 3, 2, '0,2', 'O'),
(13, 3, 3, '1,1', 'X'),
(14, 3, 4, '2,0', 'O'),
(15, 3, 5, '2,2', 'X'),
(16, 4, 1, '0,1', 'X'),
(17, 4, 2, '1,1', 'O'),
(18, 4, 3, '0,2', 'X'),
(19, 4, 4, '2,0', 'O'),
(20, 4, 5, '1,0', 'X');

-- --------------------------------------------------------

--
-- Structure de la table `statistics`
--

CREATE TABLE `statistics` (
  `user_id` int(11) NOT NULL,
  `x_wins` int(11) DEFAULT 0,
  `o_wins` int(11) DEFAULT 0,
  `draws` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `statistics`
--

INSERT INTO `statistics` (`user_id`, `x_wins`, `o_wins`, `draws`) VALUES
(1, 2, 1, 1),
(2, 3, 2, 0),
(3, 1, 3, 2),
(4, 2, 2, 1),
(5, 0, 2, 3),
(6, 3, 1, 1),
(7, 1, 1, 3),
(8, 2, 1, 2),
(9, 2, 2, 2),
(10, 3, 0, 1),
(11, 1, 1, 2),
(12, 2, 2, 1),
(13, 2, 0, 3),
(14, 1, 2, 2),
(15, 2, 2, 1),
(16, 3, 1, 0),
(17, 1, 1, 3),
(18, 2, 2, 1),
(19, 3, 0, 1),
(20, 2, 2, 0),
(26, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'Player1', 'password123'),
(2, 'Player1', 'pass'),
(3, 'Player2', 'pass'),
(4, 'Player3', 'pass'),
(5, 'Player4', 'pass'),
(6, 'Player5', 'pass'),
(7, 'Player6', 'pass'),
(8, 'Player7', 'pass'),
(9, 'Player8', 'pass'),
(10, 'Player9', 'pass'),
(11, 'Player10', 'pass'),
(12, 'Player11', 'pass'),
(13, 'Player12', 'pass'),
(14, 'Player13', 'pass'),
(15, 'Player14', 'pass'),
(16, 'Player15', 'pass'),
(17, 'Player16', 'pass'),
(18, 'Player17', 'pass'),
(19, 'Player18', 'pass'),
(20, 'Player19', 'pass'),
(21, 'Player20', 'pass'),
(26, 'wissem', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `game_moves`
--
ALTER TABLE `game_moves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_id` (`game_id`);

--
-- Index pour la table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `game_moves`
--
ALTER TABLE `game_moves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `game_moves`
--
ALTER TABLE `game_moves`
  ADD CONSTRAINT `game_moves_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `statistics`
--
ALTER TABLE `statistics`
  ADD CONSTRAINT `statistics_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
