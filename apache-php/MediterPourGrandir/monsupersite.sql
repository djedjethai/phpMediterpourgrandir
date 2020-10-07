-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 10, 2020 at 08:38 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monsupersite`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` mediumint(9) NOT NULL,
  `newsId` smallint(6) NOT NULL,
  `auteurComId` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `newsId`, `auteurComId`, `contenu`, `date`) VALUES
(1, 58, 38, 'voici un commentaire', '2020-03-01 15:19:25'),
(2, 57, 38, 'un deuxieme commantaire', '2020-03-01 15:19:42'),
(3, 59, 36, 'voici un commantaier', '2020-03-01 15:21:56'),
(4, 58, 36, 'et la .......', '2020-03-01 15:22:19'),
(5, 57, 36, 'un commantaire', '2020-03-01 15:28:34'),
(6, 59, 38, 'et bien.....', '2020-03-07 13:00:19'),
(7, 58, 38, 'encore une reponse', '2020-03-07 13:00:33'),
(8, 59, 36, 'et la gros', '2020-03-07 13:01:26'),
(9, 61, 53, 'mon comment', '2020-03-28 13:34:26'),
(10, 60, 52, 'alllo', '2020-03-28 13:53:04'),
(11, 62, 52, 'commment ', '2020-03-28 13:59:54'),
(12, 59, 52, 'c coool updated', '2020-04-22 13:22:38');

-- --------------------------------------------------------

--
-- Table structure for table `lecon`
--

CREATE TABLE `lecon` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `chapter` varchar(230) NOT NULL,
  `title` varchar(230) NOT NULL,
  `lesson` text NOT NULL,
  `videoLink` varchar(230) DEFAULT NULL,
  `chapter_number` int(11) NOT NULL,
  `lesson_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lecon`
--

INSERT INTO `lecon` (`id`, `chapter`, `title`, `lesson`, `videoLink`, `chapter_number`, `lesson_number`) VALUES
(1, 'premier chapitre', 'pour commencer', '<div class=\"text-left\">\r\n<h4>1. principeÂ :</h4>\r\n	<p><span class=\"ml-5\">Comme</span> nous allons le voir dans les chapitres Ã  venir, La mÃ©ditation est un exercice de concentration. Sa pratique se rÃ©sume a se concentrer sur un support liÃ© au corpsÂ : telle la respiration, ou Ã©trangerÂ : tel un objet.<br />\r\n	Cet â€˜â€™effort de concentrationâ€™â€™, durant le temps de la sÃ©ance, calme les incessants vagabondages de notre esprit. Nous en ferons lâ€™expÃ©rience dÃ¨s notre premiÃ¨re mÃ©ditation. Lorsque nous dÃ©butons, cela peut sembler impossible, mais a force dâ€™entrainement, progressivement nous deviendrons de plus en plus performants.</p>\r\n\r\n<h4>2. Les bÃ©nÃ©ficesÂ :</h4>\r\n	<p class=\"dl\"><span class=\"ml-5\">Tout</span> comme le footing consiste simplement Ã  courir et permet lâ€™amÃ©lioration de la forme cardiovasculaire, rÃ©duit la tension artÃ©rielle, renforce les os, etc. Ce basique effort de concentration fait bÃ©nÃ©ficier deÂ :</p>\r\n	<ul>\r\n<li>meilleur sommeil.</li>\r\n<li>Ã©limination de certains maux (psychologiques et physiques).</li>\r\n<li>amÃ©lioration des performances intellectuelles.</li>\r\n<li>amÃ©lioration du souci du dÃ©tail (de lâ€™attention).</li>\r\n<li>limitation de lâ€™impact des soucis.</li>\r\n<li>limitation de lâ€™action insidieuse des pensÃ©es.</li>\r\n<li>amÃ©lioration du bien-Ãªtre, de lâ€™Ã©tat de joie.</li>\r\n<li>dÃ©veloppement de la compassion, amÃ©lioration de la confiance en soi, donc embellissement des rapports humains.</li>\r\n</ul>\r\n<p>Grace aux rÃ©sultats de notre pratique, et aux explications fournies au fil de ces leÃ§ons, nous comprendrons les mÃ©canismes entrainant ces bienfaits.</p>\r\n\r\n<h4>3. lâ€™Ã¢ge:</h4>\r\n<p class=\"dl\"><span class=\"ml-5\">Officiellement</span>, mÃªme pour les plus jeunes, il nâ€™y a aucune contre-indication Ã  la pratique de la mÃ©ditation.  Il est gÃ©nÃ©ralement conseiller de dÃ©buter Ã  lâ€™Ã¢ge de 8 ans.  Commencer par de trÃ¨s courtes sÃ©ances, 2-3 minutes suffisent amplementÂ ; ne pas forcer un enfant Ã  mÃ©diter, et rester Ã  son Ã©coute. DÃ¨s lâ€™adolescence, rallonger le temps de pratique.<br /> \r\nDe 17-18ans Ã  130ans (pour les plus vieuxÂ ;)) il nâ€™y a plus aucune diffÃ©rence, la mÃ©ditation se pratique Ã  volontÃ©, ou tout au moins en respectant (de prÃ©fÃ©rence) les quelques rÃ¨gles citÃ©es ci-dessous. De ce fait, quel que soit notre Ã¢ge, lorsque nous dÃ©butons la mÃ©ditation, nous sommes tous Ã  peu prÃ©s au mÃªme niveau.</p>\r\n\r\n<h4>4. DurÃ©e/FrÃ©quenceÂ :</h4>\r\n<p class=\"dl\"><span class=\"ml-5\">Nous</span> pouvons mÃ©diter Ã  nâ€™importe quel moment de la journÃ©e ou de la nuit, il nâ€™y a pas de rÃ¨gles. 15mn/jour est le minimum, pouvant Ãªtre fractionnÃ© puisque les temps de pratique sâ€™accumulent. Par exempleÂ : 5 mn (durÃ©e minimum dâ€™une sÃ©ance) le matin, 5 mn Ã  midi et 5 mn le soir, ou 7 mn le matin et 8 mn le soir, ou encore une seule sÃ©ance de 15 minutes Ã  nâ€™importe quel moment de la journÃ©e. <br />\r\nAu fil de la progression, rallonger les temps de mÃ©ditation permet dâ€™accÃ©lÃ©rer lâ€™Ã©volution, et par consÃ©quent dâ€™intensifier ses bienfaits. Eviter les trop longues sÃ©ances (plus dâ€™une heure)Â : elles pourraient finalement sâ€™avÃ©rer plus nuisibles que profitablesÂ ; au mÃªme titre que faire du sport fortifie mais en abuser peut traumatiser et/ou provoquer le surentrainement.<br />\r\nA titre dâ€™information, de nombreux pratiquants confirmÃ©s mÃ©ditent le matin et le soir (Ã  ce niveau, les sÃ©ances de 30mn sont parfaites). AdaptÃ©e la durÃ©e de nos sÃ©ances Ã  nos disponibilitÃ©s et Ã  notre niveau.</p>\r\n\r\n<h4>5. Ou pratiquer: </h4>	\r\n	<p class=\"dl\"><span class=\"ml-5\">La</span> mÃ©ditation se pratique partout, dans un parc, un train, une salle dâ€™attente, etc.\r\n	Pour dÃ©buter, sâ€™installer dans un lieu calme, ou sâ€™isoler, facilite lâ€™exercice puisquâ€™il sâ€™agit de se concentrer. </p>\r\n\r\n<h4>6. les positionsÂ :</h4>\r\n<p class=\"dl\"><span class=\"ml-5\">La</span> mÃ©ditation se pratique dans 4 positionsÂ : assis, debout (immobile), en marchant, allongÃ©.</p>\r\n<ul> \r\n	<li>la position allongÃ©eÂ : sâ€™allonger sur le dos ou le cotÃ© et effectuer lâ€™exercice de mÃ©ditation. Cette position nâ€™est pas recommandÃ©e car souvent le sommeil finit par lâ€™emporter.</li>\r\n	<li>la position deboutÂ : se tenir debout, droit, immobile (les yeux ouverts),  la main droite tient la main gauche (ou inversement) sur le devant du corps (ou dans le dos), et effectuer lâ€™exercice de mÃ©ditation.</li>\r\n<li>en marchantÂ : Trouver un espace libre de 3 Ã  5 mÃ¨tres de long afin de faire des allers-retours. Se tenir droit, les bras dÃ©tendus, la main droite tient la main gauche (ou inversement) sur le devant du corps (ou dans le dos),  la tÃªte lÃ©gÃ¨rement inclinÃ©e regarde le sol 1 Ã  2m devant soi.\r\nMarcher normalement (les yeux ouverts), ni trop vite, ni trop lentement. Ã€ la fin de lâ€™aller, joindre les deux pieds, effectuer un demi-tour, revenir sur ses pas, et ainsi de suite durant le temps de la sÃ©ance. Il faut marcher sans y prÃªter attention, et effectuer lâ€™exercice de mÃ©ditation.</li>\r\n<li>Voici les positions assisesÂ : pour commencer nous allons mÃ©diter dans cette position.\r\n (changer les photos et mettre les miennes</li></ul>)\r\n</div>', NULL, 1, 1),
(2, 'premier chapitre', 'pour commencer', '1. principe :\r\n	Comme nous allons le voir dans les chapitres à venir, La méditation est un exercice de concentration. Sa pratique se résume a se concentrer sur un support lié au corps : telle la respiration, ou étranger : tel un objet. \r\n	Cet ‘’effort de concentration’’, durant le temps de la séance, calme les incessants vagabondages de notre esprit. Nous en ferons l’expérience dès notre première méditation. Lorsque nous débutons, cela peut sembler impossible, mais a force d’entrainement, progressivement nous deviendrons de plus en plus performants.\r\n\r\n2. Les bénéfices :\r\n	Tout comme le footing consiste simplement à courir et permet l’amélioration de la forme cardiovasculaire, réduit la tension artérielle, renforce les os, etc. Ce basique effort de concentration fait bénéficier de :\r\n1. meilleur sommeil.\r\n2. élimination de certains maux (psychologiques et physiques).\r\n3. amélioration des performances intellectuelles.\r\n4. amélioration du souci du détail (de l’attention).\r\n5. limitation de l’impact des soucis.\r\n6. limitation de l’action insidieuse des pensées.\r\n7. amélioration du bien-être, de l’état de joie.\r\n8. développement de la compassion, amélioration de la confiance en soi, donc embellissement des rapports humains.\r\nGrace aux résultats de notre pratique, et aux explications fournies au fil de ces leçons, nous comprendrons les mécanismes entrainant ces bienfaits.\r\n\r\n3. l’âge\r\nOfficiellement, même pour les plus jeunes, il n’y a aucune contre-indication à la pratique de la méditation.  Il est généralement conseiller de débuter à l’âge de 8 ans.  Commencer par de très courtes séances, 2-3 minutes suffisent amplement ; ne pas forcer un enfant à méditer, et rester à son écoute. Dès l’adolescence, rallonger le temps de pratique. \r\nDe 17-18ans à 130ans (pour les plus vieux ;)) il n’y a plus aucune différence, la méditation se pratique à volonté, ou tout au moins en respectant (de préférence)', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `auteurId` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `contenu` text NOT NULL,
  `levelNew` int(11) NOT NULL,
  `dateAjout` datetime NOT NULL,
  `dateModif` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `auteurId`, `titre`, `contenu`, `levelNew`, `dateAjout`, `dateModif`) VALUES
(29, 0, 'coool', 'salut les petit', 0, '2019-11-07 18:10:49', '2019-11-07 18:11:36'),
(30, 0, 'ca buuug pas', 'bfgbfg', 0, '2019-11-07 18:14:00', '2019-11-07 18:14:00'),
(31, 0, 'ajout d\'une news', 'il est deja tard', 0, '2019-12-04 20:21:16', '2019-12-04 20:21:16'),
(32, 0, 'le chat', 'va en vacance', 0, '2019-12-04 21:15:25', '2019-12-04 21:15:25'),
(33, 0, 'ca bug plus', 'fefergfreg', 0, '2019-12-04 21:17:09', '2020-01-11 14:49:41'),
(35, 38, 'tout baigne ', 'le nom s\'ajoute automatiquement', 0, '2019-12-08 13:29:26', '2019-12-08 13:29:26'),
(36, 38, 're test', 'et la ????', 0, '2019-12-08 13:32:05', '2019-12-08 13:32:05'),
(37, 38, 'level coool', 'et la HGFjgfjgfjhgfjhgf', 0, '2019-12-08 14:02:22', '2020-01-16 17:00:06'),
(38, 38, 'test', 'je sui level 3', 3, '2019-12-08 14:04:21', '2020-01-11 14:33:24'),
(42, 36, 'ca marche pas', 'on va voir', 1, '2020-01-16 13:25:59', '2020-01-16 13:44:12'),
(44, 36, 'ffgh', 'hgdfghdfhfdg', 1, '2020-01-16 20:41:55', '2020-01-16 20:41:55'),
(45, 38, 'modif controle', 'nbvmnbvmbvm', 1, '2020-01-16 20:42:56', '2020-01-28 15:51:04'),
(46, 38, 'test apres ', 'c un test', 1, '2020-01-28 15:51:28', '2020-01-28 17:37:02'),
(47, 38, 'c coool', 'on a avance', 1, '2020-01-28 17:37:21', '2020-01-28 17:37:21'),
(48, 36, 'c moi annick', 'voila une news', 1, '2020-01-28 18:31:59', '2020-01-28 18:31:59'),
(49, 38, 'ca baigne modif again', 'le forum avance bien !!!!', 1, '2020-01-28 18:37:18', '2020-02-05 12:00:58'),
(50, 38, 'voila un new news', 'ehhh le validator fonctionne', 1, '2020-02-05 12:03:36', '2020-02-05 12:03:48'),
(51, 38, 'test notification', 'c facilllleee euhhhhhhh', 1, '2020-02-12 14:19:43', '2020-02-12 14:19:43'),
(52, 38, 'test notification', 'c facile euuuuuuhhhhhhh', 1, '2020-02-12 14:20:53', '2020-02-12 14:20:53'),
(53, 38, 'test notification', 'c superrrrrrr facile euuuuuuhhhhhhh', 1, '2020-02-12 14:21:08', '2020-02-12 14:35:57'),
(57, 36, 'yoyoyo', 'yoyoyoyoy modifie', 1, '2020-02-12 14:43:37', '2020-02-12 14:44:08'),
(58, 36, 'test final notif', 'bcvbcxvbvcbvcx', 1, '2020-02-12 15:04:34', '2020-02-12 15:04:34'),
(59, 38, 'test otifacation', 'dsfsdfdsfdgfd', 1, '2020-02-23 12:56:30', '2020-02-23 12:56:30'),
(60, 53, 'news formHandler ', 'restructuration..... fine !!!! abstract done', 0, '2020-03-28 12:57:57', '2020-03-28 13:05:47'),
(61, 52, 'euuuh', 'eeehhhhhhhhhhh', 0, '2020-03-28 13:17:45', '2020-03-28 13:17:45'),
(62, 53, 'blabla', 'blablabla', 0, '2020-03-28 13:59:18', '2020-03-28 13:59:18'),
(63, 52, 'test photo', 'voici si la photo \'affiche', 0, '2020-04-22 11:41:03', '2020-04-22 11:41:03'),
(64, 52, 'test csrf', 'voyons si le post valide the hidden bbb', 0, '2020-06-06 13:15:18', '2020-06-10 13:15:58'),
(65, 52, 'un deuxieme csrfPost test', 'voyons voyons cool', 0, '2020-06-06 13:19:05', '2020-06-10 13:16:39');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `history` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `news_id`, `user_id`, `status`, `history`) VALUES
(1, 58, 38, 0, NULL),
(2, 57, 38, 0, NULL),
(3, 59, 36, 1, 1),
(4, 58, 36, 0, NULL),
(5, 57, 36, 0, NULL),
(6, 59, 38, 1, 1),
(7, 60, 53, 0, 1),
(8, 61, 52, 0, NULL),
(9, 61, 53, 0, NULL),
(10, 60, 52, 0, NULL),
(11, 62, 53, 0, 1),
(12, 62, 52, 0, NULL),
(13, 63, 52, 0, NULL),
(14, 59, 52, 0, 1),
(15, 64, 52, 0, NULL),
(16, 65, 52, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `csrfToken` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dateSet` datetime NOT NULL,
  `dateExpire` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `csrfToken`, `dateSet`, `dateExpire`) VALUES
(1, 12, '', '2020-01-23 17:50:45', '2020-01-23 23:50:45'),
(2, 23, '', '2020-01-16 18:22:59', '2020-01-17 00:22:59'),
(83, 38, '', '2020-03-14 15:35:00', '2020-03-14 21:35:00'),
(89, 42, '', '2020-03-21 12:06:56', '2020-03-21 18:06:56');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dateSignUp` datetime NOT NULL,
  `dateLastLesson` datetime DEFAULT NULL,
  `lesson` int(2) DEFAULT NULL,
  `level` int(1) DEFAULT NULL,
  `cle` bigint(60) DEFAULT NULL,
  `actif` tinyint(1) DEFAULT NULL,
  `picture` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateModify` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `pseudo`, `password`, `email`, `dateSignUp`, `dateLastLesson`, `lesson`, `level`, `cle`, `actif`, `picture`, `dateModify`) VALUES
(19, 'george', '$2y$10$cSNTMjwD6Nlk1lsrqB37h.0Woe5GIlunYtzGCOjvppwTaWc08vWVm', 'gogogo@hotmail.com', '2019-11-20 12:24:52', NULL, NULL, NULL, 47357221837623, NULL, NULL, NULL),
(20, 'lili', '$2y$10$eCuEM3s9aB4EwxMRHo09geSCSk6qVRPwvgSTAaSKW/v00enauFKNy', 'lili@gmail.com', '2019-11-20 12:28:15', NULL, NULL, NULL, 34005204699921, NULL, NULL, NULL),
(21, 'loulou', '$2y$10$EgRPl7l4fKaxsp1QUDLB4OfJ.qHc3gJBQYnujO960YSVMeuMM09BG', 'loulou@gmail.com', '2019-11-20 12:40:43', NULL, NULL, NULL, 24483086190396, 1, NULL, NULL),
(34, 'connard', '$2y$10$pGv01I7kmxZzmmAOtNQijOR3r9TMnxicZjtoYGAfYlgfJW8Wdb6sS', 'loulou@gmail.com', '2019-11-20 14:15:10', NULL, NULL, NULL, 9374842589145, NULL, NULL, NULL),
(35, 'capassepas', '$2y$10$zyXnjdg7S5C4m5wuIDWQ1O5aqUO7L.ncrtRO7yqt2jXRMaNDW9kD.', 'loulou@gmail.com', '2019-11-20 14:32:41', NULL, NULL, NULL, 87272089079620, NULL, NULL, NULL),
(36, 'annick', '$2y$10$8nfO4fdSQolLup2K7SY7nOoHVuRRDdwDZ3Jsfz6/M3WIXqlXWJLoi', 'annick@gmail.com', '2019-11-20 14:46:41', NULL, 1, 1, 75730250340595, 1, NULL, NULL),
(38, 'jerome', '$2y$10$8nfO4fdSQolLup2K7SY7nOoHVuRRDdwDZ3Jsfz6/M3WIXqlXWJLoi', 'djedjethai@gmail.co', '2019-11-24 12:29:52', '2020-01-01 12:01:21', 1, 1, 64056135754714, 1, 'adresse-de-la photo.jpg', NULL),
(39, 'lolo', '$2y$10$nO1gHt.2L1Sd7cz.CiUHTuDAJt8qT3CNLhxK6FVm2zhYzK7beU9XG', 'lolo@lolo.com', '2020-02-05 11:25:50', NULL, NULL, 0, 12475192368584, NULL, NULL, NULL),
(40, 'khgfjh', '$2y$10$jQQkVj9Cf4zujVXi7Vx2lepc.HeX9euWQQQRimQzZLABQbZazbKBq', 'jhgkjhgk@jgfjhg.com', '2020-02-05 11:26:16', NULL, NULL, 0, 2249403337083, NULL, NULL, NULL),
(41, 'hercule uppp', '', 'hercule@hercule.com', '2020-03-18 10:29:51', NULL, 1, 0, 35960433413404, 1, NULL, NULL),
(42, 'new', '$2y$10$A2T1ZgAO2jSg7jW.JoWfoOzn34.q7bXEH/DNNQ6FHCuTcoyBWlf3m', 'new@new.com', '2020-03-18 10:45:58', NULL, 1, 0, 22674108554727, 1, NULL, NULL),
(50, 'papy up', '$2y$10$LcNf96HSYeZwhoYipvawz.HH7PoN.V8S2jbRby8dsefoBsuDU1UIm', 'papyup@papy.com', '2020-03-18 12:50:20', NULL, 1, 0, 56887040646899, 1, NULL, NULL),
(51, 'samir', '$2y$10$lKwJJ5HQi3OWFfEnuFE8GOYEiChgqNDA8NZYd7NisGVD7ho.06jC.', 'samir@samir.com', '2020-03-25 18:43:15', NULL, 1, 0, 15756088453926, 1, NULL, NULL),
(52, 'jerome cool', '$2y$10$DsHunPM5Z17mYrrYT2BcXulPCeRtvcfC7UOlBKMcS67bjPNvSBVK6', 'jerome@jerome.com', '2020-03-28 11:39:10', NULL, 1, 0, 11471130206955, 1, 'balloon-1046658_1280.jpg', NULL),
(53, 'test', '$2y$10$Bt/TV1rydYEkDQ7PfHsiauKg8OP/gsdk2a1Nl9Z6C8zatLdLhhwfy', 'test@test.com', '2020-03-28 12:15:17', NULL, 1, 0, 37798917627008, 1, NULL, NULL),
(54, 'paulux', '$2y$10$s4qs3hhL7CAtBEHvGb9XS.bqT/BngcZz73W8THmXWDCXxVHNptFS.', 'djedjethai@gmail.com', '2020-04-29 17:29:06', NULL, 1, 0, 23155375914826, NULL, NULL, NULL),
(96, 'salut', '$2y$10$kcWoQfu4aIwSKVhOGH4ZveVid9lAVbiZrt0.o.e7Fa.0DlGylb1gS', 'djedje.thai.ok@gmail.com', '2020-05-16 13:38:18', NULL, 1, 0, 38877276667733, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecon`
--
ALTER TABLE `lecon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `lecon`
--
ALTER TABLE `lecon`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
