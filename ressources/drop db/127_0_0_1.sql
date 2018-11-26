-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 26 nov. 2018 à 21:04
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `one way ticket to alaska`
--
CREATE DATABASE IF NOT EXISTS `one way ticket to alaska` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `one way ticket to alaska`;

-- --------------------------------------------------------

--
-- Structure de la table `chapters`
--

DROP TABLE IF EXISTS `chapters`;
CREATE TABLE IF NOT EXISTS `chapters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `chapters`
--

INSERT INTO `chapters` (`id`, `title`, `content`, `creation_date`, `status`) VALUES
(1, 'Au coeur de l\'Alaska', '<p><em>27 avril 1992</em></p>\r\n<p><em>Je t\'&eacute;cris de Fairbanks ! Ce sont les derni&egrave;res nouvelles que tu recevras de moi, Wayne. Je suis arriv&eacute; il y a deux jours. Ca n\'a pas &eacute;t&eacute; facile de faire du stop dans le Yukon. Mais finallement, je suis parvenu jusqu\'ici.</em></p>\r\n<p><em>S\'il-te-pla&icirc;t, retourne tout mon courrier &agrave; l\'exp&eacute;diteur. Il peut s\'&eacute;couler beaucoup de temps avant que je redescende dans le Sud. Si cette aventure tourne mal et que tu n\'entendes plus parler de moi, je veux que tu saches que je te consid&egrave;re comme quelqu\'un de formidable. Maintenant, je m\'enfonce dans la for&ecirc;t, Alex.</em></p>\r\n<p>Carte portable re&ccedil;ue par Wayne Westerberg &agrave; Carthage, Dakota du Sud.</p>\r\n<p>&nbsp;</p>\r\n<p>A 6,5 kilom&egrave;tres apr&egrave;s Fairbanks, Jim Gallien aper&ccedil;ut un auto-stoppeur qui se tenait dans la neige au bord de la route, le pouce lev&eacute; tr&egrave;s haut et grelottant dans l\'aube grise de l\'Alaska. Il n\'avait pas l\'air bien vieux ; dix-huit ans, dix-neuf peut-&ecirc;tre, pas plus. Une carabine d&eacute;passait de son sac &agrave; dos, mais il avait l\'air d\'un bon gar&ccedil;on. Dans le 49&egrave;me Etat, une carabine Remington semi-automatique n\'&eacute;tonne personne. Gallien gara sa camionnette Ford sur le bas-c&ocirc;t&eacute; et dit au jeune homme de monter.</p>\r\n<p>L\'auto-stoppeur balan&ccedil;a son sac sur la banquette et se pr&eacute;senta :</p>\r\n<p>- Alex.</p>\r\n<p>- Alex ? interroga Gallien qui attendait un nom de famille.</p>\r\n<p>- Simplement Alex, r&eacute;pondit l\'auto-stoppeur.</p>\r\n<p>C\'&eacute;tait un gar&ccedil;on d\'environ un m&egrave;tre soixante-dix, &eacute;lanc&eacute; et robuste. Il disait qu\'il avait vingt-quatre ans et qu\'il venait du Dakota du Sud. Il voulait se faire conduire jusqu\'aux confins du parc national du Denali. De l&agrave;, il avait l\'intention de s\'enfoncer dans le sous-bois et de \"vivre &agrave; l\'&eacute;cart pendant quelques mois\".</p>', '2010-09-08 10:43:01', 'published'),
(2, 'La piste Stampede', '<p><em>Jack London est roi</em></p>\r\n<p><em> Alexandre Supertramp</em></p>\r\n<p><em> Mai 1992</em></p>\r\n<p><em> Inscription grav&eacute;e sur une pi&egrave;ce de bois trouv&eacute;e &agrave; l\'endroit o&ugrave; mourut Chris McCandless.</em></p>\r\n<p>&nbsp;</p>\r\n<p><em> Une sombre for&ecirc;t d\'&eacute;pic&eacute;as obscurcissait les deux rives du cours d\'eau pris par les glaces. Un coup de vent r&eacute;cent avait d&eacute;pouill&eacute; les arbre de leur blanche couverture de givre et, dans la lumi&egrave;re d&eacute;clinante, ils semblaient se courber les uns vers les autres, noirs et mena&ccedil;ants. Un grand silence r&eacute;gnait sur la terre et cette terre &eacute;tait d&eacute;sol&eacute;e, sans vie, sans mouvement, si vide et si froide qu\'elle n\'exprimait m&ecirc;me pas la tristesse. Quelque chose en elle sugg&eacute;rait le rire, mais un rire plus terrible que toute tristesse - un rire morne comme le sourire d\'un sphinx, un rire froid comme le gel et d\'une infaillibilit&eacute; sinistre. C\'&eacute;tait la sagesse puissante et incommunicable de l\'&eacute;ternit&eacute; qui riait de la futilit&eacute; de la vie et de l\'effort de vivre. C\'&eacute;tait la for&ecirc;t sauvage, la for&ecirc;t gel&eacute;e du grand Nord.</em></p>\r\n<p style=\"text-align: right;\"><em>Jack London, Croc-blanc.</em></p>\r\n<p style=\"text-align: left;\">&nbsp;</p>\r\n<p style=\"text-align: left;\">Sur la frange nord de la cha&icirc;ne de l\'Alaska, juste avant que le rempart imposant du mont McKinley et de ses satellites ne laisse place &agrave; la plaine de la Kantishna, une s&eacute;rie de sommets de moindre importance - connue sous le nom de Cha&icirc;ne Ext&eacute;rieure - descend vers les &eacute;tendues planes comme une couverture pliss&eacute;e sur un lit d&eacute;fait.</p>', '2018-08-09 16:28:41', 'saved');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `comment_date`, `status`) VALUES
(1, 1, 'M@teo21', 'Un peu court ce billet !', '2010-03-25 16:49:53', 'reported'),
(2, 1, 'Maxime', 'Oui, ça commence pas très fort ce blog...', '2010-03-25 16:57:16', 'reported'),
(3, 1, 'MultiKiller', '+1', '2010-03-25 17:12:52', 'deleted');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `status`, `email`, `password`, `registration_date`) VALUES
(1, 'Mathieu', 'superadmin', 'gg-superadmin@noob.fr', '$2y$10$D4RHjt7n7rKZ2jZi0UB/i.3vp/3Qen/HtC4PTPI2g8ih8F6KuAz.2', '2018-08-13'),
(2, 'Thomas', 'owner', 'gg-mentor@noob.fr', '$2y$10$B5wviLmj.J/umXkf43BQ9.WaQ1aeVfxjJrFJUGCXbuYj0wiCbSyyK', '2018-09-22'),
(3, 'MissAdmin', 'admin', 'gg-admin@noob.fr', '$2y$10$5XlQVYb9XBgKmZbw4tQzfe5QDvR0EYfSn5rvxlc3rNFB9lfSNhhRa', '2018-10-03'),
(4, 'MrMember', 'member', 'gg-member@noob.fr', '$2y$10$T66DOJTV.XMrf3z0/G8FhuWixff3VF3ij5GWndAIW0wuOgG2LCbAy', '2018-10-03');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
