-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 23 mai 2023 à 15:51
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `quai_antique2`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name_category`) VALUES
(1, 'Entrée'),
(2, 'Viande'),
(3, 'Poisson'),
(4, 'Fromage'),
(5, 'Dessert'),
(6, 'Boisson'),
(7, 'Alcool');

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
('DoctrineMigrations\\Version20230510150036', '2023-05-15 10:23:11', 1394);

-- --------------------------------------------------------

--
-- Structure de la table `hour`
--

CREATE TABLE `hour` (
  `id` int(11) NOT NULL,
  `day` varchar(255) NOT NULL,
  `hourtime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `hour`
--

INSERT INTO `hour` (`id`, `day`, `hourtime`) VALUES
(1, 'Du Lundi au Samedi', 'De 11h45 à 14h00 et de 19h00 à 22h00');

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name_menu` varchar(255) NOT NULL,
  `price_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id`, `name_menu`, `price_menu`) VALUES
(1, 'Menu Déjeuner_Aurore', 59),
(2, 'Menu Dîner_Crepuscule', 79);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

CREATE TABLE `picture` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `name_picture` varchar(150) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `statut` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `picture`
--

INSERT INTO `picture` (`id`, `product_id`, `name_picture`, `link`, `statut`) VALUES
(1, 6, 'plat2.jpg', 'plat2-6462251de01126.32014068.jpg', 'online'),
(2, 21, 'plat8.jpg', 'plat8-6462253e51e144.98041860.jpg', 'online'),
(3, 20, 'plat14.jpg', 'plat14-6462254c14d005.28082225.jpg', 'online'),
(5, 3, 'plat.test.jpg', 'plat10-64623373ab7764.37619225.jpg', 'offline'),
(6, 19, 'baba au rhum', 'plat4-6462512feb6f51.94831539.jpg', 'offline');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name_product` varchar(150) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `destination` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `category_id`, `name_product`, `unit_price`, `destination`) VALUES
(1, 1, 'Tranches de Saint-Jacques à la truffe noire', 38, 'alacarte'),
(2, 1, 'Pâté en croute de canard et foie gras de canard', 26, 'alacarte'),
(3, 1, 'Tartare de daurade, huître Perle Noire', 31, 'alacarte'),
(4, 1, 'Langoustines rôties et gâteau de foie blond', 36, 'alacarte'),
(5, 1, 'Tartelette aux poireaux, beaufort d\'alpage et truffe noire', 33, 'alacarte'),
(6, 2, 'Gigot d\'agneau de nos régions rôti et son gratin dauphinois', 41, 'alacarte'),
(7, 2, 'Filet de boeuf à la casserole, tonnelets de pommes de terres rôtis', 48, 'alacarte'),
(8, 2, 'Tartare de boeuf de Salers, frites fraîches et salade de jeunes pousses', 36, 'alacarte'),
(9, 2, 'Traditionnelle blanquette de veau et son riz pilaf', 39, 'alacarte'),
(10, 2, 'Epaule d\'agneau à la cuillère et son risotto d\'épeautre, jus aux épices douces', 98, 'alacarte'),
(11, 3, 'Mitonnée de poulpe à la provençale', 35, 'alacarte'),
(12, 3, 'Noix de Saint-Jacques à la Dieppoise et sa purée de légumes', 43, 'alacarte'),
(13, 3, 'Dos de Cabillaud à la truffe noire, chou-fleur et parmesan', 46, 'alacarte'),
(14, 3, 'Queue de lotte à la grenobloise et pomme purée', 105, 'alacarte'),
(15, 3, 'Tataki de thon et son ceviche à la mangue', 45, 'alacarte'),
(16, 4, 'Plateau de fromages affinés de nos régions', 18, 'alacarte'),
(17, 4, 'Trio de fromages de Savoie: l\'Abondance, le Beaufort, le Chevrotin', 12, 'alacarte'),
(18, 5, 'Soufflé à la châtaigne, sorbet à l\'orange, saupoudré de croquants au chocolat', 18, 'alacarte'),
(19, 5, 'Baba Bouchon, rhum arrangé aux agrumes, crème fouettée à la vanille', 18, 'alacarte'),
(20, 5, 'Compressé de pommes et de coing, flambé au grand marnier , accompagné d\'agrumes', 18, 'alacarte'),
(21, 5, 'l\'Opéra du Quai Antique,  croquant à la praline et chocolat noir', 18, 'alacarte'),
(22, 5, 'Millefeuille de crêpes Suzette flambées au Grand Marnier', 18, 'alacarte'),
(23, 6, 'Eau minérale Evian', 7, 'alacarte'),
(24, 6, 'Eau gazeuse Perrier', 7, 'alacarte'),
(25, 6, 'Thé et Infusions Mariages Frères', 7, 'alacarte'),
(26, 6, 'Expresso Massaya Bio', 3, 'alacarte'),
(27, 6, 'Chocolat chaud, trésor de MONBANA', 5, 'alacarte'),
(28, 7, 'Champagne Perrier Jouët', 60, 'alacarte'),
(29, 7, 'Vin Blanc Pouilly-Fumé AOP ', 40, 'alacarte'),
(30, 7, 'Vin Rouge BOURGUEIL AOP', 40, 'alacarte'),
(31, 7, 'Vin Rosé Côtes de Provence AOP', 32, 'alacarte');

-- --------------------------------------------------------

--
-- Structure de la table `product_menu`
--

CREATE TABLE `product_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product_menu`
--

INSERT INTO `product_menu` (`id`, `menu_id`, `product_id`, `category_id`) VALUES
(1, 1, 2, 1),
(2, 1, 3, 1),
(3, 1, 5, 1),
(4, 1, 7, 2),
(5, 1, 9, 2),
(6, 1, 13, 2),
(7, 1, 20, 5),
(8, 1, 21, 5),
(9, 1, 22, 5),
(10, 2, 5, 1),
(11, 2, 1, 1),
(12, 2, 4, 1),
(13, 2, 10, 2),
(14, 2, 12, 2),
(15, 2, 15, 2),
(16, 2, 18, 5),
(17, 2, 19, 5),
(18, 2, 21, 5);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hour_reservation` time NOT NULL,
  `date_reservation` date NOT NULL,
  `number_person` int(11) NOT NULL,
  `message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `user_id`, `hour_reservation`, `date_reservation`, `number_person`, `message`) VALUES
(1, 1, '12:00:00', '2023-05-15', 2, 'pas d\'allergies'),
(2, 2, '13:00:00', '2023-05-15', 4, 'non');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `allergie` varchar(255) NOT NULL,
  `phone_number` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `last_name`, `first_name`, `allergie`, `phone_number`) VALUES
(1, 'marine@gmail.com', '[\"ROLE_CLIENT\"]', '$2y$13$OZJmWunEb1nUoqWSd45Hj.0qfwuI7/wQF.JVL6p2KfKCw.MrZxIdW', 'Legouic', 'Marine', 'pas d\'allergies', '0655424877'),
(2, 'martin@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$n2GwaHX8WT2SkrUxHUgrSudkLvAuEIBSLKalFfqlnoMDSFTqUy/de', 'martin', 'Jean', 'pas d\'allergies', '06 18 66 03 57'),
(3, 'paulette@gmail.com', '[\"ROLE_CLIENT\"]', '$2y$13$AlPcTd3F6KDQ2U.MiwG.bObAzlxJha7L4EFDviJeiawDXxlVu4ga2', 'BOCQUET', 'Paulette', 'Allergies au gluten', '01 46 23 55 87'),
(4, 'henriot@gmail.com', '[\"ROLE_CLIENT\"]', '$2y$13$rLWorJov.vAG.s.Bge7X8Oha.2mq.vwLj9O66e/1lBMP37UcQcJfm', 'Henriot', 'Christophe', 'allergies à l\'arachide', '06 22 54 87 11'),
(5, 'zaoui@gmail.com', '[\"ROLE_CLIENT\"]', '$2y$13$iIR3a6dd0Irhc0Vz78RiEussJBroKbljZYefSp.GJwieFRN2ZOKVy', 'Zaoui', 'Sabrina', 'Allergies à lhuile de tournesol', '06 15 22 35 48'),
(6, 'studiadmin@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$8Ko6DUVgFX7czOEYCj23leDNZVQwUfQwSYyfUcS3n94AA1rOsRRAe', 'studi ADMIN', 'Studi ecole', 'pas d\'allergie', '0618524866'),
(7, 'studiclient@gmail.com', '[\"ROLE_CLIENT\"]', '$2y$13$SC8jLp.vtmyRmKQu0h4zDuRzlFWlsDkpuOVrUQ9xk9f7rDb2WAa4K', 'studi CLIENT', 'studi ecole', 'pas dallergies', '06 15 44 78 23');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `hour`
--
ALTER TABLE `hour`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_16DB4F894584665A` (`product_id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D34A04AD12469DE2` (`category_id`);

--
-- Index pour la table `product_menu`
--
ALTER TABLE `product_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F0ED1832CCD7E912` (`menu_id`),
  ADD KEY `IDX_F0ED18324584665A` (`product_id`),
  ADD KEY `IDX_F0ED183212469DE2` (`category_id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_42C84955A76ED395` (`user_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `hour`
--
ALTER TABLE `hour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `picture`
--
ALTER TABLE `picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `product_menu`
--
ALTER TABLE `product_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `FK_16DB4F894584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_D34A04AD12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Contraintes pour la table `product_menu`
--
ALTER TABLE `product_menu`
  ADD CONSTRAINT `FK_F0ED183212469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FK_F0ED18324584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `FK_F0ED1832CCD7E912` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `FK_42C84955A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
