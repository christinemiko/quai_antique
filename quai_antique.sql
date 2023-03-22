-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 22 mars 2023 à 13:31
-- Version du serveur : 8.0.18-9
-- Version de PHP : 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `quai_antique`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name_category`) VALUES
(238, 'Entrée'),
(239, 'Viande'),
(240, 'Poisson'),
(241, 'Fromage'),
(242, 'Dessert'),
(243, 'Boisson'),
(244, 'Alcool'),
(245, 'Cocktail'),
(246, 'Boissons chaudes'),
(247, 'Spiritueux'),
(249, 'Apéritifs'),
(250, 'Brunch');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230130164109', '2023-01-30 17:42:06', 572),
('DoctrineMigrations\\Version20230130185056', '2023-01-30 19:51:30', 86),
('DoctrineMigrations\\Version20230131084149', '2023-01-31 09:42:27', 556),
('DoctrineMigrations\\Version20230131084529', '2023-01-31 09:46:11', 52),
('DoctrineMigrations\\Version20230131084954', '2023-01-31 09:50:22', 49),
('DoctrineMigrations\\Version20230131085602', '2023-01-31 09:56:23', 74),
('DoctrineMigrations\\Version20230131090330', '2023-01-31 10:03:50', 46),
('DoctrineMigrations\\Version20230131090806', '2023-01-31 10:08:27', 44),
('DoctrineMigrations\\Version20230131151010', '2023-01-31 16:10:51', 96),
('DoctrineMigrations\\Version20230131152039', '2023-01-31 16:21:40', 63),
('DoctrineMigrations\\Version20230201104846', '2023-02-01 11:49:10', 675),
('DoctrineMigrations\\Version20230201131814', '2023-02-01 14:18:32', 273),
('DoctrineMigrations\\Version20230207154310', '2023-02-07 16:43:33', 429),
('DoctrineMigrations\\Version20230209091331', '2023-02-09 10:13:57', 572),
('DoctrineMigrations\\Version20230213145143', '2023-02-13 15:52:05', 596),
('DoctrineMigrations\\Version20230213151639', '2023-02-13 16:17:04', 517),
('DoctrineMigrations\\Version20230214082607', '2023-02-14 09:26:32', 667),
('DoctrineMigrations\\Version20230214085514', '2023-02-14 09:55:35', 88),
('DoctrineMigrations\\Version20230214085732', '2023-02-14 09:58:05', 40),
('DoctrineMigrations\\Version20230214095302', '2023-02-14 10:53:25', 745),
('DoctrineMigrations\\Version20230214101630', '2023-02-14 11:16:51', 97),
('DoctrineMigrations\\Version20230214102105', '2023-02-14 11:21:31', 266),
('DoctrineMigrations\\Version20230214102339', '2023-02-14 11:24:01', 120),
('DoctrineMigrations\\Version20230214103205', '2023-02-14 11:32:20', 105),
('DoctrineMigrations\\Version20230214105551', '2023-02-14 11:56:17', 173),
('DoctrineMigrations\\Version20230214105924', '2023-02-14 11:59:43', 95),
('DoctrineMigrations\\Version20230214110353', '2023-02-14 12:04:10', 175),
('DoctrineMigrations\\Version20230214110923', '2023-02-14 12:09:45', 73),
('DoctrineMigrations\\Version20230214111715', '2023-02-14 12:17:36', 168),
('DoctrineMigrations\\Version20230214112016', '2023-02-14 12:20:34', 120),
('DoctrineMigrations\\Version20230214112345', '2023-02-14 12:24:05', 210),
('DoctrineMigrations\\Version20230214112716', '2023-02-14 12:27:36', 105),
('DoctrineMigrations\\Version20230214114456', '2023-02-14 12:45:14', 180),
('DoctrineMigrations\\Version20230214115437', '2023-02-14 12:54:54', 178),
('DoctrineMigrations\\Version20230214144737', '2023-02-14 15:47:56', 86),
('DoctrineMigrations\\Version20230214150448', '2023-02-14 16:05:09', 75),
('DoctrineMigrations\\Version20230215154542', '2023-02-15 16:46:01', 618),
('DoctrineMigrations\\Version20230215154854', '2023-02-15 16:49:11', 212),
('DoctrineMigrations\\Version20230215155128', '2023-02-15 16:51:48', 74),
('DoctrineMigrations\\Version20230215160559', '2023-02-15 17:06:24', 176),
('DoctrineMigrations\\Version20230216133116', '2023-02-16 14:31:37', 756),
('DoctrineMigrations\\Version20230217190143', '2023-02-17 20:02:14', 622),
('DoctrineMigrations\\Version20230223173538', '2023-02-23 18:36:05', 168),
('DoctrineMigrations\\Version20230301180811', '2023-03-01 19:08:37', 626);

-- --------------------------------------------------------

--
-- Structure de la table `hour`
--

CREATE TABLE `hour` (
  `id` int(11) NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hourtime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `hour`
--

INSERT INTO `hour` (`id`, `day`, `hourtime`) VALUES
(33, 'Du Lundi au Samedi', 'De 11h45 à 15h00 et de 19h00 à 22h00'),
(34, 'du Lundi au dimanche', 'de 11h45 à 15h et de 19h à 00h00'),
(35, 'Du lundi 20 Février au 28 Février 2023', 'de 12h00 à 21 h00'),
(36, 'du 1 Mars au 18 Mars 2023', 'Nous sommes fermés. Nous reviendrons dès le 19 Mars 2023.');

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name_menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id`, `name_menu`, `price_menu`) VALUES
(62, 'Menu Déjeuner Aurore', 59),
(63, 'Menu Dîner Crepuscule', 79),
(64, 'Menu Enfant', 15),
(65, 'Menu Saint Sylvestre', 250),
(66, 'Menu Noel', 120),
(67, 'Menu Saint Valentin', 75),
(68, 'Menu d\'Hiver', 75),
(69, 'Menu d\'été', 65),
(70, 'Menu Savoyard', 75),
(71, 'Menu Végétarien', 59),
(72, 'Menu Mariage', 160);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `messenger_messages`
--

INSERT INTO `messenger_messages` (`id`, `body`, `headers`, `queue_name`, `created_at`, `available_at`, `delivered_at`) VALUES
(1, 'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:51:\\\"Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\\":2:{s:60:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0message\\\";O:39:\\\"Symfony\\\\Bridge\\\\Twig\\\\Mime\\\\TemplatedEmail\\\":4:{i:0;s:30:\\\"reset_password/email.html.twig\\\";i:1;N;i:2;a:1:{s:10:\\\"resetToken\\\";O:58:\\\"SymfonyCasts\\\\Bundle\\\\ResetPassword\\\\Model\\\\ResetPasswordToken\\\":4:{s:65:\\\"\\0SymfonyCasts\\\\Bundle\\\\ResetPassword\\\\Model\\\\ResetPasswordToken\\0token\\\";s:40:\\\"1858tmNX6PO0i0CsyGRYPVsWgWfE7BP2JctnR5BI\\\";s:69:\\\"\\0SymfonyCasts\\\\Bundle\\\\ResetPassword\\\\Model\\\\ResetPasswordToken\\0expiresAt\\\";O:17:\\\"DateTimeImmutable\\\":3:{s:4:\\\"date\\\";s:26:\\\"2023-02-23 20:13:57.736239\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:13:\\\"Europe/Berlin\\\";}s:71:\\\"\\0SymfonyCasts\\\\Bundle\\\\ResetPassword\\\\Model\\\\ResetPasswordToken\\0generatedAt\\\";i:1677176037;s:73:\\\"\\0SymfonyCasts\\\\Bundle\\\\ResetPassword\\\\Model\\\\ResetPasswordToken\\0transInterval\\\";i:1;}}i:3;a:6:{i:0;N;i:1;N;i:2;N;i:3;N;i:4;a:0:{}i:5;a:2:{i:0;O:37:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\\":2:{s:46:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0headers\\\";a:3:{s:4:\\\"from\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:4:\\\"From\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:24:\\\"no-reply@quaiantique.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:8:\\\"No Reply\\\";}}}}s:2:\\\"to\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:2:\\\"To\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:23:\\\"christinemiko@gmail.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:7:\\\"subject\\\";a:1:{i:0;O:48:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:7:\\\"Subject\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:55:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\0value\\\";s:27:\\\"Your password reset request\\\";}}}s:49:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0lineLength\\\";i:76;}i:1;N;}}}s:61:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0envelope\\\";N;}}', '[]', 'default', '2023-02-23 19:13:57', '2023-02-23 19:13:57', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

CREATE TABLE `picture` (
  `id` int(11) NOT NULL,
  `name_picture` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `picture`
--

INSERT INTO `picture` (`id`, `name_picture`, `link`, `product_id`) VALUES
(19, 'ACCUEIL image1', 'plat2-64011433f3f7e4.81586628.jpg', 534),
(20, 'ACCUEIL image2', 'plat8-6401074b41db40.80614827.jpg', 546),
(21, 'ACCUEIL image3', 'plat14-640116b5ad7e60.01889902.jpg', 548),
(22, 'HISTOIRE image1', 'plat9-6401157701a7b6.50137122.jpg', 543);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name_product` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` int(11) NOT NULL,
  `destination` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `category_id`, `name_product`, `unit_price`, `destination`) VALUES
(529, 238, 'Tranches de Saint-Jacques à la truffe noire', 38, 'alacarte'),
(530, 238, 'Pâté en croute de canard et foie gras de canard', 26, 'alacarte'),
(531, 238, 'Tartare de daurade, huître Perle Noire', 31, 'alacarte'),
(532, 238, 'Langoustines rôties et gâteau de foie blond', 36, 'alacarte'),
(533, 238, 'Tartelette aux poireaux, beaufort d\'alpage et truffe noire', 33, 'alacarte'),
(534, 239, 'Gigot d\'agneau de nos régions rôti et son gratin dauphinois', 41, 'alacarte'),
(535, 239, 'Filet de boeuf à la casserole, tonnelets de pommes de terres rôtis', 48, 'alacarte'),
(536, 239, 'Tartare de boeuf de Salers, frites fraîches et salade de jeunes pousses', 36, 'alacarte'),
(537, 239, 'Traditionnelle blanquette de veau et son riz pilaf', 39, 'alacarte'),
(538, 239, 'Epaule d\'agneau à la cuillère et son risotto d\'épeautre, jus aux épices douces', 98, 'alacarte'),
(539, 240, 'Mitonnée de poulpe à la provençale', 35, 'alacarte'),
(540, 240, 'Noix de Saint-Jacques à la Dieppoise et sa purée de légumes', 43, 'alacarte'),
(541, 240, 'Dos de Cabillaud à la truffe noire, chou-fleur et parmesan', 46, 'alacarte'),
(542, 240, 'Queue de lotte à la grenobloise et pomme purée', 105, 'alacarte'),
(543, 240, 'Tataki de thon et son ceviche à la mangue', 45, 'alacarte'),
(544, 241, 'Plateau de fromages affinés de nos régions', 18, 'alacarte'),
(545, 241, 'Trio de fromages de Savoie: l\'Abondance, le Beaufort, le Chevrotin', 12, 'alacarte'),
(546, 242, 'Soufflé à la châtaigne, sorbet à l\'orange, saupoudré de croquants au chocolat', 18, 'alacarte'),
(547, 242, 'Baba Bouchon, rhum arrangé aux agrumes, crème fouettée à la vanille', 18, 'alacarte'),
(548, 242, 'Compressé de pommes et de coing, flambé au grand marnier , accompagné d\'agrumes', 18, 'alacarte'),
(549, 242, 'l\'Opéra du Quai Antique,  croquant à la praline et chocolat noir', 18, 'alacarte'),
(550, 242, 'Millefeuille de crêpes Suzette flambées au Grand Marnier', 18, 'alacarte'),
(551, 243, 'Eau minérale Evian', 7, 'alacarte'),
(552, 243, 'Eau gazeuse Perrier', 7, 'alacarte'),
(553, 243, 'Thé et Infusions Mariages Frères', 7, 'alacarte'),
(554, 243, 'Expresso Massaya Bio', 3, 'alacarte'),
(555, 243, 'Chocolat chaud, trésor de MONBANA', 5, 'alacarte'),
(556, 244, 'Champagne Perrier Jouët', 60, 'alacarte'),
(557, 244, 'Vin Blanc Pouilly-Fumé AOP ', 40, 'alacarte'),
(558, 244, 'Vin Rouge BOURGUEIL AOP', 40, 'alacarte'),
(559, 244, 'Vin Rosé Côtes de Provence AOP', 32, 'alacarte'),
(560, 242, 'Tarte aux pommes flambées', 12, 'menus déjeuner');

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
(118, 62, 530, 238),
(119, 62, 531, 238),
(120, 62, 533, 238),
(121, 62, 535, 239),
(122, 62, 537, 239),
(123, 62, 541, 239),
(124, 62, 548, 242),
(125, 62, 549, 242),
(126, 62, 550, 242),
(127, 63, 533, 238),
(128, 63, 529, 238),
(129, 63, 532, 238),
(130, 63, 538, 239),
(131, 63, 540, 239),
(132, 63, 543, 239),
(133, 63, 546, 242),
(134, 63, 547, 242),
(135, 63, 549, 242);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `date_reservation` date NOT NULL,
  `hour_reservation` time NOT NULL,
  `number_person` int(11) NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `date_reservation`, `hour_reservation`, `number_person`, `message`, `user_id`) VALUES
(2, '2023-02-27', '13:00:00', 5, 'pas dallergies', 15),
(3, '2023-03-04', '12:00:00', 2, 'pas dallergies', 14),
(5, '2023-03-07', '12:15:00', 2, 'pas dallergies', 20),
(6, '2023-03-06', '12:15:00', 5, 'allergie au gluten', 24),
(7, '2023-03-20', '12:00:00', 2, 'fr', 28);

-- --------------------------------------------------------

--
-- Structure de la table `reset_password_request`
--

CREATE TABLE `reset_password_request` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `selector` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hashed_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requested_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `expires_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `allergie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `allergie`, `last_name`, `first_name`, `phone_number`) VALUES
(11, 'chris@gmail.com', '[\"ROLE_CLIENT\"]', '$2y$13$hJXA4CDvoAbK/qDWE9wSLOUMf7ls7XEc0pI/nBKxVnE8XqHUsIJ4m', 'Allergie à l\'huile de tournesol', 'LeBot', 'Caroline', '06 18 66 03 57'),
(14, 'christinemiko@gmail.com', '[\"ROLE_CLIENT\"]', '$2y$13$Yvn1gehPh.Qq1sIL2b6vD.FQ/h1UceAJHNMYGgBhaGAC9I.STN.jm', 'allergie au sésame', 'CHAU', 'Christine', '0618660357'),
(15, 'martin@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$LSRneVynaNgxSY7fF9T4MOHpzEqEN28HJnpM13S.vsXA9PXpzyl9u', 'pas dallergies', 'Martin', 'Pacome', '06 15 48 66 23'),
(16, 'durand@gmail.com', '[\"ROLE_CLIENT\"]', '$2y$13$Y93kqyhLZfrNyE5rWqIZoeedaQyZ3iHfe2Fe6Imo1H6FEME3gUReS', 'pas dallergies', 'DURAND', 'Marcel', '06 15 48 75 22'),
(17, 'marine@gmail.com', '[\"ROLE_CLIENT\"]', '$2y$13$F98OXTPE9wOyw.8yQ1NQ3uUENira84H.TblfD2hN3cow.Zk0hIy8O', 'pas dallergies', 'LeGouic', 'Marine', '06 22 35 14 85'),
(18, 'henrio@gmail.com', '[\"ROLE_CLIENT\"]', '$2y$13$x07SiFkS9FZCBJ9xZOcMEO3URMPm1ifXHt9VPEDiAxIUb53.3fSHm', 'pas dallergies', 'Henrio', 'Christophe', '06 45 11 20 58 66'),
(19, 'anthony.ong@gmail.com', '[\"ROLE_CLIENT\"]', '$2y$13$lNAzhmtXq07a312BC63ygOpYSkJv21jfFe.wF2KYYGvFyHTQZFsy.', 'pas dallergies', 'ONG', 'Anthony', '06 54 22 15 87'),
(20, 'henriquet@gmail.com', '[\"ROLE_CLIENT\"]', '$2y$13$AJmj0a/z7n2OFbUt8TZ5W.JuBQ0y0n7M10IhEphlhlMXGw0kKPoKa', 'pas dallergies', 'HENRIQUET', 'Philippe', '06 57 82 59 33 54'),
(21, 'vijoux@gmail.com', '[\"ROLE_CLIENT\"]', '$2y$13$5uSg7UXKzgWH5KRjSOzH/.g1NAFkoYP5PcsOnUynj/X5MUwMz/vTK', 'allergie au gluten', 'VIJOUX', 'Quentin', '06 18 77 52 30'),
(22, 'sainsard@gmail.com', '[\"ROLE_CLIENT\"]', '$2y$13$V0GbOl1jtDlsaiU9ZWapnOrEBVM8c2fzAfDosvBvEPgYMVfP/BXeO', 'Allergie au mais', 'SAINSARD', 'Remy', '06 15 44 20 87'),
(23, 'labbe@gmail.com', '[\"ROLE_CLIENT\"]', '$2y$13$QMAKfn2wPnb.LhVcbhOyEu5Et7Tlxn7G9cKOILLPccuyPAcl5CSHa', 'allergie au lactose', 'Labbe', 'Fréderique', '06 15 88 47 23'),
(24, 'bocquet@gmail.com', '[\"ROLE_CLIENT\"]', '$2y$13$liqbNSsAyBLEpQkCReLRMunvMJT8W7p7jmpkmPWi9tNft4QFntVfW', 'Allergie aux crustacés', 'BOCQUET', 'Paulette', '06 15 44 87 23 99'),
(26, 'delacroix@gmail.com', '[\"ROLE_CLIENT\"]', '$2y$13$Lp.By9IGhee2H/rGjqxmCuZvfFD7aam16fIFYqsBuHv98wQodMU.S', 'pas d\'allergies', 'Delacroix', 'Florence', '06 54 23 55 96'),
(27, 'simon.paul@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$YtLw5e45L6WwOAoGkwoTI.aZUCU2n6ewGRR9l///SORSP9100yHTK', 'pas dallergies', 'SIMON', 'Paul', '06 15 48 99 63'),
(28, 'dnath@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$dwi9kl67nLQ45AZw5X/c5uvzkoVHWNb5pVWiMULof4GdZ7aiN1PQ6', 'pas dallergies', 'Delacroix', 'Nathacha', '06 12 44 59 80'),
(29, 'christine.chau@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$wOdBKwMFoYyx7//JyrVwKO6fa7ph4RxpKclxMBLIwSdP4IoC7VXf6', 'pas dallergies', 'Chau', 'Christine', '06 18 66 03 57'),
(30, 'studiAdmin@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$2dHnxJumjRj5jo49PgATDeMkAW/MWpOut4ab9Ksx12mkW7TICEGPi', 'pas dallergies', 'Studi ECOLE', 'Studi Admin', '06 32 15 77 88'),
(34, 'nicole@gmail.com', '[\"ROLE_CLIENT\"]', '$2y$13$l2QKWcXBkw48WY18hyYRtevRU5J/.z3SSS7uoJRLU5xrtH94eu9wi', 'non', 'Dupuis', 'Nicole', '06 18 77 45 22');

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
  ADD KEY `IDX_16DB4F894584665A` (`product_id`) USING BTREE;

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
-- Index pour la table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7CE748AA76ED395` (`user_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT pour la table `hour`
--
ALTER TABLE `hour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `picture`
--
ALTER TABLE `picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=570;

--
-- AUTO_INCREMENT pour la table `product_menu`
--
ALTER TABLE `product_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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

--
-- Contraintes pour la table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  ADD CONSTRAINT `FK_7CE748AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
