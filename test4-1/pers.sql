-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 15 nov. 2022 à 14:14
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pers`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE `adresse` (
  `id` int(9) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `rue` varchar(100) NOT NULL,
  `codepostal` varchar(10) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `id_pers` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `id` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `edition` varchar(50) NOT NULL,
  `information` text NOT NULL,
  `AUTEUR` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`id`, `titre`, `edition`, `information`, `AUTEUR`) VALUES
(2, 'L’Étranger', 'Gallimard', '', 'Albert Camus'),
(3, 'Victor Hugo', 'livre réédité des Miserables', 'Galimard', 'les Miserables'),
(4, 'Victor Hugo', 'livre réédité des Miserables', 'Galimard', 'les Miserables'),
(5, 'Victor Hugo', 'livre réédité des Miserables', 'Galimard', 'les Miserables'),
(6, 'Flaubert', 'livre de Flaubert', 'Galimard', 'titre update'),
(7, 'Victor Hugo', 'livre réédité des Miserables', 'Galimard', 'les Miserables'),
(8, 'Flaubert', 'livre de Flaubert', 'Galimard', 'titre update'),
(9, 'Victor Hugo', 'livre réédité des Miserables', 'Galimard', 'les Miserables'),
(10, 'Flaubert', 'livre de Flaubert', 'Galimard', 'titre update'),
(11, 'Victor Hugo', 'livre réédité des Miserables', 'Galimard', 'les Miserables'),
(12, 'Flaubert', 'livre de Flaubert', 'Galimard', 'titre update'),
(14, 'Flaubert', 'livre de Flaubert', 'Galimard', 'titre update'),
(15, 'Victor Hugo', 'livre réédité des Miserables', 'Galimard', 'les Miserables'),
(16, 'Flaubert', 'livre de Flaubert', 'Galimard', 'titre update'),
(17, 'Victor Hugo', 'livre réédité des Miserables', 'Galimard', 'les Miserables'),
(18, 'Flaubert', 'livre de Flaubert', 'Galimard', 'titre update'),
(19, 'Victor Hugo', 'livre réédité des Miserables', 'Galimard', 'les Miserables'),
(20, 'Flaubert', 'livre de Flaubert', 'Galimard', 'titre update'),
(21, 'Victor Hugo', 'livre réédité des Miserables', 'Galimard', 'les Miserables'),
(22, 'Flaubert', 'livre de Flaubert', 'Galimard', 'titre update'),
(23, 'Victor Hugo', 'livre réédité des Miserables', 'Galimard', 'les Miserables'),
(24, 'Flaubert', 'livre de Flaubert', 'Galimard', 'titre update'),
(25, 'Victor Hugo', 'livre réédité des Miserables', 'Galimard', 'les Miserables'),
(26, 'Flaubert', 'livre de Flaubert', 'Galimard', 'titre update'),
(27, 'Victor Hugo', 'livre réédité des Miserables', 'Galimard', 'les Miserables'),
(28, 'Flaubert', 'livre de Flaubert', 'Galimard', 'titre update'),
(29, 'Victor Hugo', 'livre réédité des Miserables', 'Galimard', 'les Miserables'),
(30, 'Flaubert', 'livre de Flaubert', 'Galimard', 'titre update'),
(31, 'Victor Hugo', 'livre réédité des Miserables', 'Galimard', 'les Miserables'),
(32, 'Flaubert', 'livre de Flaubert', 'Galimard', 'titre update'),
(33, 'Victor Hugo', 'livre réédité des Miserables', 'Galimard', 'les Miserables'),
(34, 'Flaubert', 'livre de Flaubert', 'Galimard', 'titre update'),
(36, 'test', 'test', 'test', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `id` int(9) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `datenaissance` datetime NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `login` varchar(50) NOT NULL,
  `pwd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `index_idpers` (`id_pers`);

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_idpers` (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `livre`
--
ALTER TABLE `livre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD CONSTRAINT `adresse_ibfk_1` FOREIGN KEY (`id_pers`) REFERENCES `personne` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
