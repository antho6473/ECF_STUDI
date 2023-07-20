-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 19 juil. 2023 à 10:33
-- Version du serveur : 10.5.20-MariaDB
-- Version de PHP : 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `garageparrot`
--

-- --------------------------------------------------------

CREATE DATABASE garageparrot;

-- Utilisation de la base de données gparrot.
USE garageparrot;

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `lastname` text NOT NULL,
  `firstname` text NOT NULL,
  `phone` int(11) NOT NULL,
  `msg` longtext NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `lastname`, `firstname`, `phone`, `msg`, `email`) VALUES
(2, 'zqdqzd', 'zqdqzd', 4141, 'Bonjour, je vous contacte concernant la voiture: Audi RS3', 'qzdqzd@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `jours` text NOT NULL,
  `heure` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `schedule`
--

INSERT INTO `schedule` (`id`, `jours`, `heure`) VALUES
(5, 'Lun, Mar, Mer, Jeu', '11h00 - 20h00'),
(6, 'Ven', '12h00 - 20h00'),
(7, 'Sam, Dim', 'Fermé');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` int(10) NOT NULL,
  `title` text NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `title`, `content`) VALUES
(1, 'CAROSSERIE', 'Nos spécialistes en carrosserie utilisent des techniques de pointe pour réparer et restaurer lapparence de votre véhicule. Que ce soit pour des dommages légers ou majeurs, nous sommes là pour vous offrir un service de qualité et redonner à votre voiture son éclat d\'origine. Prenez rendez-vous dès aujourd\'hui et offrez une nouvelle jeunesse à votre véhicule. Votre satisfaction est notre priorité absolue.'),
(2, 'MÉCANIQUE', 'Bienvenue dans notre section Mécanique ! Chez Luxury Garage, notre équipe expérimentée offre des services de mécanique automobile de haute qualité. Que ce soit pour une vidange d&#039;huile, un remplacement de pneus ou des réparations plus complexes, nous utilisons des équipements de pointe et des pièces de qualité. Nous vous garantissons un service professionnel, honnête et transparent.'),
(3, 'PNEUS', 'Nous assurons le montage professionnel de pneus pour tous types de véhicules. Notre équipe expérimentée offre un service rapide et fiable. Que ce soit pour un changement saisonnier, un remplacement usuel ou une amélioration de performance, nous sommes là pour vous aider. Nous utilisons des équipements de pointe et suivons les procédures recommandées par les fabricants pour un montage précis et sécurisé\r\n\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(10) NOT NULL,
  `lastname` text NOT NULL,
  `firstname` text NOT NULL,
  `testimonial` longtext NOT NULL,
  `rating` int(5) NOT NULL,
  `approuved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `testimonials`
--

INSERT INTO `testimonials` (`id`, `lastname`, `firstname`, `testimonial`, `rating`, `approuved`) VALUES
(8, 'Dumestre', 'Régis', 'J&#039;adore les voitures ', 5, 1),
(9, 'Rémi', 'Moazant', 'Une équipe très rigoureuse ! Je recommande !', 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `usedcars`
--

CREATE TABLE `usedcars` (
  `id` int(10) NOT NULL,
  `brand` text NOT NULL,
  `price` int(11) NOT NULL,
  `years` int(11) NOT NULL,
  `energy` text NOT NULL,
  `km` int(11) NOT NULL,
  `abs` tinyint(1) NOT NULL,
  `airbag` tinyint(1) NOT NULL,
  `seat` int(11) NOT NULL,
  `descr` longtext NOT NULL,
  `photo1` varchar(300) NOT NULL,
  `photo2` varchar(300) NOT NULL,
  `photo3` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `usedcars`
--

INSERT INTO `usedcars` (`id`, `brand`, `price`, `years`, `energy`, `km`, `abs`, `airbag`, `seat`, `descr`, `photo1`, `photo2`, `photo3`) VALUES
(49, 'Audi RS3', 20000, 2019, 'Essence', 10000, 1, 1, 0, '', 'keisO5tSRUcS6iQNBDNEssT5GSRomU.jpg', '02ZSfphPwftElpxodzUtxMhdJWX19g.jpg', ''),
(50, 'BMW E60', 19990, 2004, 'Diesel', 300000, 1, 1, 5, '', 'ldVfsBQjVVy3Ko1dhuigXLcnYRUJqc.jpg', 'qSjRlUvFdyzHMbm5KmAdwHKNQLRHKj.jpg', 'qSjRlUvFdyzHMbm5KmAdwHKNQLRHKj.jpg'),
(51, 'Porsche Cayenne', 25000, 2009, 'Essence', 175000, 1, 1, 5, 'Porsche CAYENNE (955) 4.8L V8 385CH GTS', 'pkT1AqRiLgigBzWZZtbTjxDA4LbgOP.jpg', 'aODbVXfTiotMdYCJLn4NIcImLDbmoL.jpg', 'aODbVXfTiotMdYCJLn4NIcImLDbmoL.jpg'),
(54, 'Audi Q7', 19990, 2007, 'Diesel', 172500, 0, 0, 5, 'AUDI Q7 4.2 V8 TDI 326ch', 't72kZApHl5NeX6qmNZCd6fFwkJPyUV.jpg', 'gfQPh0yxmD1WCgqLOMOWKxvVeAzNPm.jpg', 'gfQPh0yxmD1WCgqLOMOWKxvVeAzNPm.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `email` text NOT NULL,
  `pass` varchar(200) NOT NULL,
  `role_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `usedcars`
--
ALTER TABLE `usedcars`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `usedcars`
--
ALTER TABLE `usedcars`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
