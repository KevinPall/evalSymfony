-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 07 déc. 2023 à 16:31
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `evalsymfony`
--

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20231204125647', '2023-12-04 13:57:03', 4987),
('DoctrineMigrations\\Version20231204134722', '2023-12-04 14:47:29', 136),
('DoctrineMigrations\\Version20231204152848', '2023-12-04 16:29:31', 49),
('DoctrineMigrations\\Version20231205084447', '2023-12-05 09:44:55', 637),
('DoctrineMigrations\\Version20231205121327', '2023-12-05 13:13:39', 86),
('DoctrineMigrations\\Version20231205122405', '2023-12-05 13:24:10', 719),
('DoctrineMigrations\\Version20231205123225', '2023-12-05 13:32:34', 769),
('DoctrineMigrations\\Version20231207085245', '2023-12-07 09:52:51', 114),
('DoctrineMigrations\\Version20231207095444', '2023-12-07 10:54:49', 64);

-- --------------------------------------------------------

--
-- Structure de la table `equipement`
--

CREATE TABLE `equipement` (
  `id` int(11) NOT NULL,
  `lave_vaisselle` tinyint(1) NOT NULL,
  `lave_linge` tinyint(1) NOT NULL,
  `climatisation` tinyint(1) NOT NULL,
  `television` tinyint(1) NOT NULL,
  `terrasse` tinyint(1) NOT NULL,
  `barbecue` tinyint(1) NOT NULL,
  `piscine` int(11) DEFAULT NULL,
  `tennis` tinyint(1) NOT NULL,
  `ping_pong` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `equipement`
--

INSERT INTO `equipement` (`id`, `lave_vaisselle`, `lave_linge`, `climatisation`, `television`, `terrasse`, `barbecue`, `piscine`, `tennis`, `ping_pong`) VALUES
(23, 0, 1, 1, 0, 1, 1, 1, 1, 0),
(24, 0, 1, 1, 0, 1, 1, 2, 1, 0),
(25, 0, 1, 1, 0, 1, 1, 1, 1, 0),
(26, 0, 1, 1, 0, 1, 1, 1, 1, 0),
(27, 0, 1, 1, 0, 1, 1, 1, 1, 0),
(28, 0, 1, 1, 0, 1, 1, 0, 1, 0),
(29, 0, 1, 1, 0, 1, 1, 1, 1, 0),
(30, 0, 1, 1, 0, 1, 1, 1, 1, 0),
(31, 1, 1, 1, 0, 1, 1, 1, 1, 0),
(32, 1, 1, 1, 0, 1, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `gites`
--

CREATE TABLE `gites` (
  `id` int(11) NOT NULL,
  `proprietaire_id` int(11) NOT NULL,
  `region` varchar(255) NOT NULL,
  `surface_habitable` int(11) NOT NULL,
  `nombre_chambres` int(11) NOT NULL,
  `nombre_couchages` int(11) NOT NULL,
  `accepte_animaux` tinyint(1) NOT NULL,
  `tarif_animaux` decimal(10,2) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `code_postal` int(11) NOT NULL,
  `departement` int(11) NOT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `gites`
--

INSERT INTO `gites` (`id`, `proprietaire_id`, `region`, `surface_habitable`, `nombre_chambres`, `nombre_couchages`, `accepte_animaux`, `tarif_animaux`, `ville`, `nom`, `code_postal`, `departement`, `photo`) VALUES
(41, 71, 'sed', 50, 3, 5, 0, 35.67, 'South Giovannifurt', 'dolor', 1435, 4, '350_1.jpg'),
(42, 71, 'et', 128, 1, 3, 0, 11.19, 'Port Zoey', 'nemo', 8861, 57, '351_0.jpg'),
(43, 72, 'quia', 105, 2, 3, 1, 26.00, 'Wilkinsonton', 'est', 8040, 55, NULL),
(44, 72, 'aliquam', 135, 4, 5, 1, 34.75, 'Lake Consuelohaven', 'omnis', 9067, 64, NULL),
(45, 73, 'quas', 65, 3, 10, 0, 43.33, 'Lake Casper', 'accusantium', 4576, 44, NULL),
(46, 73, 'atque', 145, 5, 4, 0, 16.37, 'Gaylordborough', 'sit', 1708, 65, NULL),
(47, 74, 'consequatur', 147, 2, 4, 1, 32.40, 'Lake Alice', 'fuga', 4807, 16, NULL),
(48, 74, 'ipsa', 50, 4, 5, 0, 38.54, 'Herzogmouth', 'tempora', 2218, 56, NULL),
(49, 75, 'est', 161, 1, 8, 1, 34.59, 'Powlowskifurt', 'quis', 3392, 18, NULL),
(50, 75, 'blanditiis', 119, 4, 9, 0, 23.58, 'Aglaefort', 'est', 1137, 36, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `gites_equipement`
--

CREATE TABLE `gites_equipement` (
  `gites_id` int(11) NOT NULL,
  `equipement_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `gites_equipement`
--

INSERT INTO `gites_equipement` (`gites_id`, `equipement_id`) VALUES
(41, 23),
(42, 24),
(43, 25),
(44, 26),
(45, 27),
(46, 28),
(47, 29),
(48, 30),
(49, 31),
(50, 32);

-- --------------------------------------------------------

--
-- Structure de la table `gites_service`
--

CREATE TABLE `gites_service` (
  `gites_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `gites_service`
--

INSERT INTO `gites_service` (`gites_id`, `service_id`) VALUES
(41, 22),
(42, 23),
(43, 24),
(44, 25),
(45, 26),
(46, 27),
(47, 28),
(48, 29),
(49, 30),
(50, 31);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `proprietaire`
--

CREATE TABLE `proprietaire` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `disponibilités` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `proprietaire`
--

INSERT INTO `proprietaire` (`id`, `nom`, `prenom`, `telephone`, `disponibilités`) VALUES
(71, 'Friesen', 'Darron', '+1-540-464', 'Du Lundi au Vendredi de 9h a 16h'),
(72, 'Howell', 'Shawna', '714.717.00', 'Du Lundi au Vendredi de 9h a 12h'),
(73, 'Botsford', 'Darron', '+1 (202) 3', 'Du Lundi au Vendredi de 10h a 20h'),
(74, 'Goyette', 'Lance', '1-469-631-', 'Du Lundi au Vendredi de 9h a 23h'),
(75, 'Frami', 'Judd', '813.217.27', 'Du Lundi au Vendredi de 9h a 16h');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `location_linge` tinyint(1) NOT NULL,
  `menage_fin` tinyint(1) NOT NULL,
  `internet` tinyint(1) NOT NULL,
  `location_linge_prix` double NOT NULL,
  `menage_fin_prix` double NOT NULL,
  `internet_prix` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id`, `location_linge`, `menage_fin`, `internet`, `location_linge_prix`, `menage_fin_prix`, `internet_prix`) VALUES
(22, 1, 1, 1, 10, 20, 0),
(23, 1, 1, 1, 10, 20, 0),
(24, 1, 1, 1, 10, 20, 0),
(25, 0, 0, 0, 10, 20, 0),
(26, 1, 1, 1, 10, 20, 0),
(27, 1, 1, 1, 10, 20, 0),
(28, 1, 1, 1, 10, 20, 0),
(29, 1, 1, 1, 10, 20, 0),
(30, 1, 1, 1, 10, 20, 0),
(31, 1, 1, 1, 10, 20, 0);

-- --------------------------------------------------------

--
-- Structure de la table `tarif`
--

CREATE TABLE `tarif` (
  `id` int(11) NOT NULL,
  `gite_id` int(11) NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `debut_periode` datetime NOT NULL,
  `fin_periode` datetime NOT NULL,
  `periode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tarif`
--

INSERT INTO `tarif` (`id`, `gite_id`, `prix`, `debut_periode`, `fin_periode`, `periode`) VALUES
(1, 41, 300.00, '2023-03-20 08:51:05', '2024-06-20 08:51:05', 'Printemps'),
(2, 41, 600.00, '2023-06-21 09:59:27', '2024-09-23 09:59:27', 'Été '),
(3, 41, 250.00, '2023-09-22 10:02:39', '2024-12-22 10:02:39', 'Automne'),
(4, 41, 200.00, '2023-12-22 10:03:53', '2024-03-20 10:03:53', 'Hiver');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `equipement`
--
ALTER TABLE `equipement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `gites`
--
ALTER TABLE `gites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_29609B2176C50E4A` (`proprietaire_id`);

--
-- Index pour la table `gites_equipement`
--
ALTER TABLE `gites_equipement`
  ADD PRIMARY KEY (`gites_id`,`equipement_id`),
  ADD KEY `IDX_1FFCED5B80C9DB47` (`gites_id`),
  ADD KEY `IDX_1FFCED5B806F0F5C` (`equipement_id`);

--
-- Index pour la table `gites_service`
--
ALTER TABLE `gites_service`
  ADD PRIMARY KEY (`gites_id`,`service_id`),
  ADD KEY `IDX_89E3798E80C9DB47` (`gites_id`),
  ADD KEY `IDX_89E3798EED5CA9E6` (`service_id`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `proprietaire`
--
ALTER TABLE `proprietaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E7189C9652CAE9B` (`gite_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `equipement`
--
ALTER TABLE `equipement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `gites`
--
ALTER TABLE `gites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `proprietaire`
--
ALTER TABLE `proprietaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `gites`
--
ALTER TABLE `gites`
  ADD CONSTRAINT `FK_29609B2176C50E4A` FOREIGN KEY (`proprietaire_id`) REFERENCES `proprietaire` (`id`);

--
-- Contraintes pour la table `gites_equipement`
--
ALTER TABLE `gites_equipement`
  ADD CONSTRAINT `FK_1FFCED5B806F0F5C` FOREIGN KEY (`equipement_id`) REFERENCES `equipement` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_1FFCED5B80C9DB47` FOREIGN KEY (`gites_id`) REFERENCES `gites` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `gites_service`
--
ALTER TABLE `gites_service`
  ADD CONSTRAINT `FK_89E3798E80C9DB47` FOREIGN KEY (`gites_id`) REFERENCES `gites` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_89E3798EED5CA9E6` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `tarif`
--
ALTER TABLE `tarif`
  ADD CONSTRAINT `FK_E7189C9652CAE9B` FOREIGN KEY (`gite_id`) REFERENCES `gites` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
