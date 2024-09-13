-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 05 sep. 2024 à 12:57
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
  `added_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `added_date`) VALUES
(1, 'Informatique', '2024-09-03'),
(2, 'Comptabilité', '2024-09-03'),
(3, 'Histoire', '2024-09-03'),
(4, 'Biologie', '2024-09-03');

-- --------------------------------------------------------

--
-- Structure de la table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` varchar(256) NOT NULL,
  `category_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `added_date` date NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `category_id`, `author_id`, `added_date`, `content`) VALUES
(1, 'Espaces vectoriels', 'Objectif : être capable de définir l’espaces vectoriels, de reconnaître un sous-espace vectoriel,\r\nune famille de vecteurs libre, une famille de vecteurs liée.', 1, 1, '2024-09-03', 'I. Espaces vectoriels\r\n1.1. Définitions et conséquences\r\nSoit K un corps commutatif et E un ensemble no vide muni d’une loi de composition (notée +)\r\net d’une loi de composition externe (ou loi d’action) à opérateurs dans K (notée• ).\r\nOn dit que E est un espace vectoriel sur K (ou K-espace vectoriel) si, pour des éléments\r\nquelconques u, v, w dans E et λ et μ dans K on a :\r\n1)( ) ( )u v w u v w+ + = + + (associativité de l’addition).\r\n2)u v v u+ = + (commutativité de l’addition).\r\n3) Il existe0 E tel que pour tout: 0u u u+ = .\r\n4) Il existeu E−  tel que :( ) 0u u+ − = .\r\n5)( ) ( )u u\r\n  =  .\r\n6)( )u u u\r\n\r\n + =  + .\r\n7)( )u v u v + =  +  .\r\n8) 1u = u où 1 désigne l’élément unité de K.\r\nSi K = IR, (E, +,• ) est un espace vectoriel (ou un IR-espace vectoriel).\r\nLes éléments de E sont appelés vecteurs. Pour les distinguer, les éléments de K sont appelés\r\nscalaires.\r\nLorsque les 4 premières conditions sont vérifiées on dit que (E, +) est un groupe abélien (groupe\r\ncommutatif).\r\nConséquences :\r\n- Tout élément est régulier pour l’addition, c’est-à-dire :u E v E w E u w v w u v      + = +  =\r\n.\r\n- L’équation :d\'inconnueu x v x+ = a une solution unique :x v u= − .\r\n- Si( )et , on a : 0 0 ou 0K u E u u\r\n\r\n\r\n  =  = = .\r\n- Si K’ est un sous corps de K et si E est un espace vectoriel sur K, E est aussi un espace\r\nvectoriel sur K’.\r\nExemples :\r\n- (IRn, +,• ), c’est-à-dire IRn muni de l’addition et de la multiplication, est un IR-espace vectoriel.\r\n- L’ensemble IR[x] des polynômes à coefficients réels, muni de l’addition et de la multiplication\r\npar un réel quelconque, est un espace vectoriel sur IR.\r\nP a g e 2 | 5\r\n- L’ensemble Mn, p (IR) des matrices à éléments réels de format (n, p), muni de l’addition et de la\r\nmultiplication par un nombre réel λ, est un espace vectoriel sur IR.\r\n1.2. Sous-espaces vectoriels\r\nDéfinition :\r\nSoit E un K-espace vectoriel. Si une partie F non vide de E est un espace vectoriel sur K\r\nlorsqu’on la muni des restrictions à F des lois de E, on dit que F est un sous-espace vectoriel de E.\r\nPour que F, sous-ensemble non vide de E, soit un sous-espace vectoriel de E, il faut et il suffit qu’il\r\nsoit stable pour les deux lois de composition de E :;\r\n.\r\nu F v F u v F\r\nu F K u F\r\n−     + \r\n−      \r\nou,K u v F u v F−      +  .\r\nRemarque :\r\n0 appartient à tous les sous espaces vectoriels de E.\r\nDéfinition :\r\nTout sous-espace vectoriel distinct de E et de 0 est dit propre.\r\nThéorème :\r\nL’intersection de sous-espaces vectoriels (en nombre fini ou infini) de E est un sous espace\r\nvectoriel de E.\r\nExemple :\r\nSoit . Montrer que F est un sous-espace\r\nvectoriel de IR4.\r\nSolution :\r\n1.3. Familles de vecteurs\r\nP a g e 3 | 5\r\n• Combinaison linéaire\r\nDéfinition :\r\nOn appelle combinaison linéaire de vecteurs1 2, , ..., pu u u de E tout élément de E de la forme1 2 2 1 2... où , , ...,P P Pu u u IR +  + +     \r\n.\r\n• Famille de vecteurs\r\nDéfinition :\r\nOn appelle famille de vecteurs (système de vecteurs) toute partie finie ou infinie de E.\r\nDéfinition :\r\nOn dit qu’une famille 1 2, , ..., pu u u de E est libre (ou que les vecteurs sont linéairement\r\nindépendants) si1\r\n0 , 0\r\np\r\ni i i\r\ni\r\nu i\r\n=\r\n =    = .\r\nUne famille qui n’est pas libre est liée, ou les vecteurs linéairement dépendants. (s’il existe\r\ndes réels1 2, , ..., P   non tous nuls tels que1\r\n0\r\np\r\ni i\r\ni\r\nu\r\n=\r\n = )\r\nExemples :\r\n1)\r\n2)\r\nSolution :\r\n1)\r\nP a g e 4 | 5\r\n2)\r\nRemarque :\r\nToute famille contenant 0 est liée.\r\nPropriétés :\r\n• Toute sous famille d’une famille libre est libre.\r\n• Toute sur famille d’une famille liée est liée.\r\nSi un système de p vecteurs est lié, l’un au moins des vecteurs s’exprime comme combinaison\r\nlinéaire des autres.\r\nRemarque :\r\nUne famille d’un vecteur non nul est libre.'),
(4, 'uauie', 'loreamanice', 3, 1, '2024-09-04', 'lbceajbake'),
(9, 'Dynamisez vos sites web avec Javascript !', 'Au cours de la lecture de ce cours vous apprendrez comment dynamiser vos pages Web et les rendre beaucoup plus attrayantes pour vos visiteurs. Ce cours traitera de nombreux sujets, en partant des bases.', 3, 1, '2024-09-04', '<h1>Introduction au JS</h1>\r\n<p>Avant d\'entrer directement dans le vif du sujet, ce chapitre va vous apprendre ce qu\'est le Javascript, ce qu\'il permet de faire,<br>quand il peut ou doit &ecirc;tre utilis&eacute; et comment il a &eacute;volu&eacute; depuis sa cr&eacute;ation en 1995.<br>Nous aborderons aussi plusieurs notions de bases telles que les d&eacute;finitions exactes de certains termes.</p>\r\n<p>Tout d\'abord, un langage de programmation est un langage qui permet aux d&eacute;veloppeurs d\'&eacute;crire du code source qui sera<br>analys&eacute; par l\'ordinateur.<br>Un d&eacute;veloppeur, ou un programmeur, est une personne qui d&eacute;veloppe des programmes. &Ccedil;a peut &ecirc;tre un professionnel (un<br>ing&eacute;nieur, un informaticien ou un analyste programmeur) ou bien un amateur.<br>Le code source est &eacute;crit par le d&eacute;veloppeur. C\'est un ensemble d\'actions, appel&eacute;es instructions, qui vont permettre de donner<br>des ordres &agrave; l\'ordinateur afin de faire fonctionner le programme. Le code source est quelque chose de cach&eacute;, un peu comme un<br>moteur dans une voiture : le moteur est cach&eacute;, mais il est bien l&agrave;, et c\'est lui qui fait en sorte que la voiture puisse &ecirc;tre propuls&eacute;e.<br>Dans le cas d\'un programme, c\'est pareil, c\'est le code source qui r&eacute;git le fonctionnement du programme.<br>En fonction du code source, l\'ordinateur ex&eacute;cute diff&eacute;rentes actions, comme ouvrir un menu, d&eacute;marrer une application, effectuer<br>une recherche, enfin bref, tout ce que l\'ordinateur est capable de faire. Il existe &eacute;norm&eacute;ment de langages de programmation, la<br>plupart &eacute;tant list&eacute;s <a title=\"dashboard\" href=\"dashboard.php\">sur cette page.</a></p>'),
(10, 'Fonction Date PHP', 'Returns a string formatted according to the given format string using the given integer timestamp (Unix timestamp) or the current time if no timestamp is given. In other words, timestamp is optional and defaults to the value of time(). ', 1, 1, '2024-09-04', 'Examples ¶\r\n\r\nExample #1 date() examples\r\n<?php\r\n// set the default timezone to use.\r\ndate_default_timezone_set(\'UTC\');\r\n\r\n\r\n// Prints something like: Monday\r\necho date(\"l\");\r\n\r\n// Prints something like: Monday 8th of August 2005 03:12:46 PM\r\necho date(\'l jS \\of F Y h:i:s A\');\r\n\r\n// Prints: July 1, 2000 is on a Saturday\r\necho \"July 1, 2000 is on a \" . date(\"l\", mktime(0, 0, 0, 7, 1, 2000));\r\n\r\n/* use the constants in the format parameter */\r\n// prints something like: Wed, 25 Sep 2013 15:28:57 -0700\r\necho date(DATE_RFC2822);\r\n\r\n// prints something like: 2000-07-01T00:00:00+00:00\r\necho date(DATE_ATOM, mktime(0, 0, 0, 7, 1, 2000));\r\n?>\r\n\r\nYou can prevent a recognized character in the format string from being expanded by escaping it with a preceding backslash. If the character with a backslash is already a special sequence, you may need to also escape the backslash.\r\n\r\nExample #2 Escaping characters in date()\r\n<?php\r\n// prints something like: Wednesday the 15th\r\necho date(\'l \\t\\h\\e jS\');\r\n?>\r\n\r\nIt is possible to use date() and mktime() together to find dates in the future or the past.\r\n\r\nExample #3 date() and mktime() example\r\n<?php\r\n$tomorrow  = mktime(0, 0, 0, date(\"m\")  , date(\"d\")+1, date(\"Y\"));\r\n$lastmonth = mktime(0, 0, 0, date(\"m\")-1, date(\"d\"),   date(\"Y\"));\r\n$nextyear  = mktime(0, 0, 0, date(\"m\"),   date(\"d\"),   date(\"Y\")+1);\r\n?>\r\n\r\n    Note:\r\n\r\n    This can be more reliable than simply adding or subtracting the number of seconds in a day or month to a timestamp because of daylight saving time.\r\n\r\nSome examples of date() formatting. Note that you should escape any other characters, as any which currently have a special meaning will produce undesirable results, and other characters may be assigned meaning in future PHP versions. When escaping, be sure to use single quotes to prevent characters like \\n from becoming newlines.\r\n\r\nExample #4 date() Formatting\r\n<?php\r\n// Assuming today is March 10th, 2001, 5:16:18 pm, and that we are in the\r\n// Mountain Standard Time (MST) Time Zone\r\n\r\n$today = date(\"F j, Y, g:i a\");                 // March 10, 2001, 5:16 pm\r\n$today = date(\"m.d.y\");                         // 03.10.01\r\n$today = date(\"j, n, Y\");                       // 10, 3, 2001\r\n$today = date(\"Ymd\");                           // 20010310\r\n$today = date(\'h-i-s, j-m-y, it is w Day\');     // 05-16-18, 10-03-01, 1631 1618 6 Satpm01\r\n$today = date(\'\\i\\t \\i\\s \\t\\h\\e jS \\d\\a\\y.\');   // it is the 10th day.\r\n$today = date(\"D M j G:i:s T Y\");               // Sat Mar 10 17:16:18 MST 2001\r\n$today = date(\'H:m:s \\m \\i\\s\\ \\m\\o\\n\\t\\h\');     // 17:03:18 m is month\r\n$today = date(\"H:i:s\");                         // 17:16:18\r\n$today = date(\"Y-m-d H:i:s\");                   // 2001-03-10 17:16:18 (the MySQL DATETIME format)\r\n?>\r\n\r\nTo format dates in other languages, IntlDateFormatter::format() can be used instead of date().\r\nNotes ¶\r\n\r\n    Note:\r\n\r\n    To generate a timestamp from a string representation of the date, you may be able to use strtotime(). Additionally, some databases have functions to convert their date formats into timestamps (such as MySQL\'s » UNIX_TIMESTAMP function).\r\n\r\nTip\r\n\r\nTimestamp of the start of the request is available in $_SERVER[\'REQUEST_TIME\'].');

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
(1, 'ygryan', '97830013', 'rayanetchabodi360@gmail.com', 'mot2pass', 'admin', '2024-09-03'),
(2, 'jdoe', '12345678', 'john.doe@user.com', 'password', 'author', '2024-09-03');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

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
