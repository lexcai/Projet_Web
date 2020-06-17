-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 16 juin 2020 à 17:49
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bookclub`
--

-- --------------------------------------------------------

--
-- Structure de la table `bib_perso`
--

CREATE TABLE `bib_perso` (
  `id_bib` int(11) NOT NULL,
  `id_livre` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL,
  `status_livre` varchar(255) NOT NULL,
  `note` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `billet`
--

CREATE TABLE `billet` (
  `id_com` int(11) NOT NULL,
  `titre_com` varchar(255) NOT NULL,
  `contenu` varchar(255) NOT NULL,
  `date_creation` date NOT NULL,
  `pseudo_membre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

CREATE TABLE `livres` (
  `id_livre` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `editeur` varchar(255) NOT NULL,
  `resume` text NOT NULL,
  `date_parrution` date NOT NULL,
  `note` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`id_livre`, `photo`, `titre`, `auteur`, `genre`, `editeur`, `resume`, `date_parrution`, `note`) VALUES
(5, '', 'Harry Potter 1', 'J. K. Rowling', 'Science-fiction', 'Folio', 'Harry Potter, un orphelin de 11 ans, va devenir un sorcier.', '0000-00-00', 0),
(6, '', 'Harry Potter 2', 'J. K. Rowling', 'Science-fiction', 'Folio', 'Harry Potter se bat contre un serpent géant dans les toilettes des filles.', '0000-00-00', 0),
(7, '', 'Harry Potter 3', 'J. K. Rowling', 'Science-fiction', 'Folio', 'L\'oncle de Harry est un évadé de la prison d\'Azkaban, réputée pour détenir les plus grands dégénérés.', '0000-00-00', 0),
(8, '', 'Harry Potter 4', 'J. K. Rowling', 'Science-fiction', 'Folio', 'Poudlard décide de créer un compétition entre plusieurs élève, tout en mettant leur vie en danger, sinon c\'est pas marrant.', '0000-00-00', 0),
(9, '', 'Harry Potter 5', 'J. K. Rowling', 'Science-fiction', 'Folio', 'Voldemort est revenu, le monde est en danger mais un ordre secret agit dans l\'ombre pour la sécurité des autres, et non ce n\'est pas l\'ordre des Templiers.', '0000-00-00', 0),
(10, '', 'Harry Potter 6', 'J. K. Rowling', 'Science-fiction', 'Folio', 'Rogue, professeur des défense contre les forces du mal se révèle comme possesseur de secrets bien plus sombres que Harry ne l\'imaginait.', '0000-00-00', 0),
(11, '', 'Harry Potter 7', 'J. K. Rowling', 'Science-fiction', 'Folio', 'La chasse à l\'homme est ouverte. Tout les coups sont permis pour abattre l\'autre. Qui sortira victorieux de ce duel ? Harry ou Voldemort ?', '0000-00-00', 0),
(12, '', 'V pour vendetta', 'Alan Moore', 'Fiction dystopique', 'Inconnu', 'Dans un Londres dominé par un régime politique digne d\'une dictature, un combattant de la liberté refuse de se plier face aux règles imposées.', '0000-00-00', 0),
(13, '', 'L homme revolte', 'Camus', 'Philosophie', 'Folio', '&quot;Je me révolte, donc nous sommes&quot;, affirme Albert Camus. La révolte est le seul moyen de dépasser l\'absurde.', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id_membre` int(11) NOT NULL,
  `pseudo_membre` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `mail_membre` varchar(255) NOT NULL,
  `mdp_membre` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `date_creation` date NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id_membre`, `pseudo_membre`, `role`, `mail_membre`, `mdp_membre`, `pays`, `sex`, `age`, `date_creation`, `photo`, `bio`) VALUES
(2, 'jean', 'Membre', 'jean@jean.fr', 'jean', 'Jeantier', 'H', 0, '2020-06-16', NULL, NULL),
(3, 'tintin', 'Membre', 'tintin@mail.fr', 'tintin', 'Belgique', 'H', 36, '2020-06-16', NULL, NULL),
(4, 'milou', 'Membre', 'milou@mail.fr', 'milou', 'Belgique', 'H', 14, '2020-06-16', NULL, NULL),
(5, 'Morgan', 'Membre', 'captain.morgan@mail.fr', 'alcool', 'Caraïbes', 'H', 45, '2020-06-16', NULL, NULL),
(6, 'lisa', 'Membre', 'lisa@mail.fr', 'lisa', 'France', 'F', 23, '2020-06-16', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `root`
--

CREATE TABLE `root` (
  `id_root` int(11) NOT NULL,
  `pseudo_root` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `mail_root` varchar(255) NOT NULL,
  `mdp_root` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `date_creation` date NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `root`
--

INSERT INTO `root` (`id_root`, `pseudo_root`, `role`, `mail_root`, `mdp_root`, `pays`, `sex`, `age`, `date_creation`, `photo`, `bio`) VALUES
(1, 'vinny', 'admin', 'vinny@vinny.fr', 'dbz', 'fr', 'M', 42, '2020-06-03', NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bib_perso`
--
ALTER TABLE `bib_perso`
  ADD PRIMARY KEY (`id_bib`),
  ADD KEY `id_livre` (`id_livre`),
  ADD KEY `id_membre` (`id_membre`);

--
-- Index pour la table `billet`
--
ALTER TABLE `billet`
  ADD PRIMARY KEY (`id_com`);

--
-- Index pour la table `livres`
--
ALTER TABLE `livres`
  ADD PRIMARY KEY (`id_livre`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id_membre`);

--
-- Index pour la table `root`
--
ALTER TABLE `root`
  ADD PRIMARY KEY (`id_root`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bib_perso`
--
ALTER TABLE `bib_perso`
  MODIFY `id_bib` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `billet`
--
ALTER TABLE `billet`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `livres`
--
ALTER TABLE `livres`
  MODIFY `id_livre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id_membre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `root`
--
ALTER TABLE `root`
  MODIFY `id_root` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bib_perso`
--
ALTER TABLE `bib_perso`
  ADD CONSTRAINT `bib_perso_ibfk_1` FOREIGN KEY (`id_livre`) REFERENCES `membres` (`id_membre`),
  ADD CONSTRAINT `bib_perso_ibfk_2` FOREIGN KEY (`id_membre`) REFERENCES `livres` (`id_livre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
