-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 09 sep. 2024 à 18:45
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `elearn_v2`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` varchar(256) NOT NULL,
  `added_date` date NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `added_date`, `author_id`) VALUES
(1, 'Informatique', 'Cette catégorie comporte tous les cours en rapport avec l\'informatique', '2024-09-09', 2),
(2, 'Biologie', 'Cette catégorie contient tous les cours en rapport avec la biologie !', '2024-09-09', 2);

-- --------------------------------------------------------

--
-- Structure de la table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` varchar(300) NOT NULL,
  `category_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `update_date` date NOT NULL,
  `content` text NOT NULL,
  `vues` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `category_id`, `author_id`, `update_date`, `content`, `vues`) VALUES
(1, 'Tutoriel MySQL', 'Ce cours sur MySQL/SQL en est un parmi tant d\'autres. Le web regorge de ressources sur le développement web. Celui-ci a été rédigé par mes soins et est orienté pour les débutants. Il est non exhaustif. Si vous repérez une erreur ou un oubli, vous pourrez me contacter.', 1, 2, '2024-09-09', '<h1>Introduction - MySQL</h1>\r\n<p>Le cours a pour but d&rsquo;apprendre les principales commandes SQL avec le SGBD MySQL telles que : <code>SELECT, FROM, WHERE, INSERT INTO, UPDATE, DELETE</code>, etc. Chaque commande SQL sera pr&eacute;sent&eacute;e dans un chapitre d&eacute;di&eacute; avec des exemples clairs, simples et concis.</p>\r\n<p>Avant de se lancer corps et &acirc;me dans l\'apprentissage de ce nouveau cours d&eacute;di&eacute; aux bases de donn&eacute;es, &agrave; MySQL et au langage <abbr title=\"Structured Query Language\">SQL</abbr>, nous allons prendre le temps d\'exposer quelques concepts de base.</p>\r\n<h2>Base de donn&eacute;es</h2>\r\n<p>Une <strong>base de donn&eacute;es</strong> est un <strong>ensemble d\'informations</strong> (donn&eacute;es) qui ont &eacute;t&eacute; stock&eacute;es sur un support informatique de mani&egrave;re <strong>organis&eacute;e et structur&eacute;e</strong> afin de pouvoir facilement consulter et modifier leur contenu.</p>\r\n<p>On peut prendre l\'exemple d\'une entreprise lambda avec un outil de facturation. Une base de donn&eacute;es est fort utile pour stocker les clients et les informations li&eacute;es &agrave; ces derniers comme les coordonn&eacute;es et les contacts. Cette m&ecirc;me base devra pouvoir stocker des devis, des factures, etc. en lien avec ces clients. Cet ensemble de donn&eacute;es constitue une base de donn&eacute;es. On peut faire le parall&egrave;le avec une boutique e-commerce. La base de donn&eacute;es d\'un tel site doit pouvoir stocker toutes les informations du catalogue produits ainsi que celles li&eacute;es aux clients et aux commandes.</p>\r\n<p>Avoir une base de donn&eacute;es, c\'est bien, pouvoir int&eacute;ragir avec, c\'est beaucoup mieux. Dans l\'absolu, on peut cr&eacute;er une base de donn&eacute;es avec un ensemble de fichiers textes et m&ecirc;me dans un tableau. Seulement, ces solutions ont des limites. En effet, il devient rapidement tr&egrave;s complexe de faire des s&eacute;lections pr&eacute;cises de donn&eacute;es ou de retrouver rapidement une information. C\'est pour ces raisons que des Syst&egrave;mes de Gestion de Bases de Donn&eacute;es (SGBD), comme <strong>MySQL</strong>, ont &eacute;t&eacute; invent&eacute;es.</p>\r\n<h2>Syst&egrave;me de Gestion de Base de Donn&eacute;es (SGBD)</h2>\r\n<p>Un SGBD est un <strong>logiciel permettant d\'int&eacute;ragir avec les informations d\'une base de donn&eacute;es</strong>. On entend par int&eacute;ragir, s&eacute;lectionner, ajouter, modifier et supprimer des donn&eacute;es de la base. On regroupe g&eacute;n&eacute;ralement ces op&eacute;rations sous l\'acronyme CRUD pour (Create, Read, Update and Delete). MySQL est bien &eacute;videmment un SGBD.</p>\r\n<p>Nous venons de le voir, une base de donn&eacute;es seule ne suffit pas. Nous avons donc pr&eacute;conis&eacute; d\'h&eacute;berger notre base de donn&eacute;es au sein d\'un SGBD. Pour utiliser MySQL, il est n&eacute;cessaire d\'utiliser un nouveau langage, &agrave; savoir le SQL.</p>\r\n<p>Le <abbr title=\"Structured Query Language\">SQL</abbr> pour Structured Query Language, est un <strong>langage permettant de dialoguer avec une base de donn&eacute;es</strong>. Ce type de langage est essentiel pour dialoguer avec le SGBD.</p>\r\n<p>On peut donc r&eacute;sumer :</p>\r\n<ul>\r\n<li>Les Syst&egrave;mes de Gestion de Base de Donn&eacute;es (SGBD) permettent de g&eacute;rer les bases de donn&eacute;es.</li>\r\n<li>MySQL est un SGBD.</li>\r\n<li>Le langage SQL est utilis&eacute; pour dialoguer avec MySQL.</li>\r\n</ul>\r\n<h2>Organisation d\'une base de donn&eacute;es</h2>\r\n<p>Une base de donn&eacute;es MySQL est organis&eacute;e avec diff&eacute;rentes <strong>tables</strong>. Une base de donn&eacute;es contient une ou plusieurs tables, dont les noms doivent &ecirc;tre uniques au sein de la base de la donn&eacute;es. Une table contient des <strong>colonnes</strong>. Les colonnes contiennent les donn&eacute;es.</p>\r\n<div>\r\n<table style=\"width: 66.3738%; height: 144.8px; border-collapse: collapse; border-color: #000000; border-style: solid; margin-left: 0px; margin-right: auto;\" border=\"1\"><caption>Table : clients</caption>\r\n<thead>\r\n<tr style=\"height: 36.2px;\">\r\n<th style=\"width: 7.17979%; border-color: #000000;\">id</th>\r\n<th style=\"width: 18.7187%; border-color: #000000;\">prenom</th>\r\n<th style=\"width: 14.8724%; border-color: #000000;\">nom</th>\r\n<th style=\"width: 44.3609%; border-color: #000000;\">email</th>\r\n<th style=\"width: 14.8724%; border-color: #000000;\">ville</th>\r\n</tr>\r\n</thead>\r\n<tbody>\r\n<tr style=\"height: 36.2px;\">\r\n<td style=\"width: 7.17979%; border-color: #000000;\">1</td>\r\n<td style=\"width: 18.7187%; border-color: #000000;\">Marine</td>\r\n<td style=\"width: 14.8724%; border-color: #000000;\">Leroy</td>\r\n<td style=\"width: 44.3609%; border-color: #000000;\">mleroy@example.com</td>\r\n<td style=\"width: 14.8724%; border-color: #000000;\">Paris</td>\r\n</tr>\r\n<tr style=\"height: 36.2px;\">\r\n<td style=\"width: 7.17979%; border-color: #000000;\">2</td>\r\n<td style=\"width: 18.7187%; border-color: #000000;\">Jean</td>\r\n<td style=\"width: 14.8724%; border-color: #000000;\">Ren&eacute;</td>\r\n<td style=\"width: 44.3609%; border-color: #000000;\">jrene@example.com</td>\r\n<td style=\"width: 14.8724%; border-color: #000000;\">Lyon</td>\r\n</tr>\r\n<tr style=\"height: 36.2px;\">\r\n<td style=\"width: 7.17979%; border-color: #000000;\">3</td>\r\n<td style=\"width: 18.7187%; border-color: #000000;\">Ted</td>\r\n<td style=\"width: 14.8724%; border-color: #000000;\">Bundy</td>\r\n<td style=\"width: 44.3609%; border-color: #000000;\">tbundy@example.com</td>\r\n<td style=\"width: 14.8724%; border-color: #000000;\">Miami</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n<p>Ci-dessus, la table <code>clients</code> repr&eacute;sent&eacute;e ici sous la forme d\'un tableau, contient les <strong>colonnes</strong> suivantes :</p>\r\n<ul>\r\n<li>id</li>\r\n<li>prenom</li>\r\n<li>nom</li>\r\n<li>email</li>\r\n<li>ville</li>\r\n</ul>\r\n<p>Les donn&eacute;es ins&eacute;r&eacute;es dans les tables sont repr&eacute;sent&eacute;es sous la forme de ligne (<strong>tuple</strong>). Dans notre exemple, la table <code>clients</code> contient 3 tuples.</p>\r\n<h2>Exemple d\'un sch&eacute;ma de base de donn&eacute;es complet</h2>\r\n<p>Afin de se rendre compte et d\'avoir une id&eacute;e de la fa&ccedil;on dont sont stock&eacute;es les donn&eacute;es au sein d\'un outil tel que le CMS PrestaShop, retrouvez ci-dessous le sch&eacute;ma de base de donn&eacute;es d\'une ancienne version du CMS PrestaShop. Chaque rectangle repr&eacute;sente une table. Les traits entre les diff&eacute;rentes tables repr&eacute;sentent les relations qu\'elles ont entre elles. Les blocs de couleurs mettent en avant les univers des tables : produits, clients, commandes, transporteurs, etc.</p>\r\n<p><img src=\"https://aymeric-auberton.fr/img/mysql/mysql-bdd-prestashop.gif\" alt=\"\" width=\"1280\" height=\"886\"></p>', 8);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `role` varchar(64) NOT NULL DEFAULT 'student',
  `register_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `phone`, `email`, `password`, `role`, `register_date`) VALUES
(1, 'admin', '90809917', 'admin@administration.co', 'p@$$word', 'admin', '2024-09-09'),
(2, 'Mr Teach', '0011223344', 'teach@mr.school', 'teacher@1234', 'teacher', '2024-09-09'),
(4, 'student', '0033221144', 'student@school.co', 'student@1234', 'student', '2024-09-09'),
(5, 'Xlevy', '70168921', 'rogergouyor@gmail.com', 'Rogera2&', 'student', '2024-09-08'),
(6, '@ted', '91979209', 'benoisteddy110@gmail.com', 'InscriptionE-learn', 'student', '2024-09-09'),
(7, 'Ygryan', '97830013', 'rayanetchabodi360@gmail.com', 'user@1234', 'student', '2024-09-09');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`);

--
-- Index pour la table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_key` (`author_id`),
  ADD KEY `f_key` (`category_id`) USING BTREE;

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `foreign_key` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `author_key` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `category_key` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
