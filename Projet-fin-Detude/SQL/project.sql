-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 16 avr. 2021 à 23:23
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `project`
--

-- --------------------------------------------------------

--
-- Structure de la table `add_book`
--

CREATE TABLE `add_book` (
  `id` int(10) NOT NULL,
  `books_name` varchar(50) NOT NULL,
  `books_image` varchar(5000) NOT NULL,
  `books_author_name` varchar(50) NOT NULL,
  `books_purchase_date` varchar(20) NOT NULL,
  `books_quantity` varchar(20) NOT NULL,
  `books_availability` varchar(20) NOT NULL,
  `categorie` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `isbn` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `add_book`
--

INSERT INTO `add_book` (`id`, `books_name`, `books_image`, `books_author_name`, `books_purchase_date`, `books_quantity`, `books_availability`, `categorie`, `status`, `isbn`) VALUES
(1, 'JAVA ', 'books-image/C.png', 'Kendall Atkinson', '15/03/20', '10', '10', 'Informatique', 'Disponible', '63253173'),
(2, 'C++', 'books-image/B.jpg', 'Nancy Staggers', '12/03/20', '2', '15', 'Informatique', 'Disponible', ''),
(3, 'Digital Image Processing', 'books-image/f5546d1614746fed61c4162163d81a59196018.jpg', 'Rafael C. Gonzalez', '20/03/19', '12', '18', 'Informatique', 'Disponible', ''),
(6, 'Artificial Intelligence', 'books-image/17385102edb4831bab1b8b0577389d5e0133001989.jpg', ' Peter Norvig', '25/03/19', '22', '3', 'Informatique', 'Disponible', ''),
(7, 'Parallel and Distributed Processing', 'books-image/1554233254.jpg', 'Jose Rolim', '02/04/19', '12', '9', 'Informatique', 'Disponible', ''),
(8, 'The Guest Book: A Novel', 'books-image/1568430614.jpg', 'test', '10/5/19', '13', '10', 'Fiction Historique', 'Disponible', '');

-- --------------------------------------------------------

--
-- Structure de la table `lib_registration`
--

CREATE TABLE `lib_registration` (
  `id` int(10) NOT NULL,
  `name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(20) CHARACTER SET latin1 NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `phone` varchar(20) CHARACTER SET latin1 NOT NULL,
  `address` varchar(100) CHARACTER SET latin1 NOT NULL,
  `photo` varchar(5000) CHARACTER SET latin1 NOT NULL,
  `status` varchar(10) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `lib_registration`
--

INSERT INTO `lib_registration` (`id`, `name`, `password`, `email`, `phone`, `address`, `photo`, `status`) VALUES
(1, 'karimi yassine', 'admin', 'yassine.karimi@ump.ac.ma', '0604143753', '', 'upload/1618248416.jpg', 'A'),
(2, 'elasri med', '12345', 'mohamed.elasri@ump.ac.ma', '0654365432', '', 'upload/1618324020.jpg', 'A'),
(3, 'admin', 'admin', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `livre_emp`
--

CREATE TABLE `livre_emp` (
  `id` int(10) NOT NULL,
  `isbn` varchar(100) CHARACTER SET latin1 NOT NULL,
  `image` varchar(5000) CHARACTER SET latin1 NOT NULL,
  `name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `categorie` varchar(100) CHARACTER SET latin1 NOT NULL,
  `photo` varchar(20) CHARACTER SET latin1 NOT NULL,
  `email` varchar(200) CHARACTER SET latin1 NOT NULL,
  `quantité` int(11) NOT NULL,
  `booksname` varchar(50) CHARACTER SET latin1 NOT NULL,
  `auteur` varchar(50) CHARACTER SET latin1 NOT NULL,
  `booksissuedate` varchar(20) CHARACTER SET latin1 NOT NULL,
  `booksreturndate` varchar(20) CHARACTER SET latin1 NOT NULL,
  `date` date NOT NULL,
  `id_stu` int(20) NOT NULL,
  `N°` int(100) NOT NULL,
  `deja_mail` varchar(10) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `livre_emp`
--

INSERT INTO `livre_emp` (`id`, `isbn`, `image`, `name`, `categorie`, `photo`, `email`, `quantité`, `booksname`, `auteur`, `booksissuedate`, `booksreturndate`, `date`, `id_stu`, `N°`, `deja_mail`) VALUES
(2, '', 'books-image/B.jpg', 'karimi yassine', 'Informatique', '0604143753', 'yassine.karimi@ump.ac.ma', 0, 'C++', 'Nancy Staggers', '16/04/2021 | 05:35:0', '17/04/2021', '2021-04-16', 1, 8, ''),
(3, '', 'books-image/f5546d1614746fed61c4162163d81a59196018.jpg', 'karimi yassine', 'Informatique', '0604143753', 'yassine.karimi@ump.ac.ma', 0, 'Digital Image Processing', 'Rafael C. Gonzalez', '16/04/2021 | 05:35:1', '23/04/2021', '2021-04-16', 1, 9, ''),
(1, '63253173', 'books-image/C.png', 'elasri med', 'Informatique', '0654365432', 'mohamed.elasri@ump.ac.ma', 0, 'JAVA ', 'Kendall Atkinson', '16/04/2021 | 05:37:4', '23/04/2021', '2021-04-16', 2, 10, '');

-- --------------------------------------------------------

--
-- Structure de la table `livre_reser`
--

CREATE TABLE `livre_reser` (
  `id` int(10) NOT NULL,
  `isbn` varchar(100) CHARACTER SET latin1 NOT NULL,
  `image` varchar(5000) CHARACTER SET latin1 NOT NULL,
  `name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `categorie` varchar(100) CHARACTER SET latin1 NOT NULL,
  `phone` varchar(20) CHARACTER SET latin1 NOT NULL,
  `email` varchar(200) CHARACTER SET latin1 NOT NULL,
  `quantité` int(11) NOT NULL,
  `booksname` varchar(50) CHARACTER SET latin1 NOT NULL,
  `auteur` varchar(50) CHARACTER SET latin1 NOT NULL,
  `booksissuedate` varchar(20) CHARACTER SET latin1 NOT NULL,
  `booksreturndate` varchar(10) CHARACTER SET latin1 NOT NULL,
  `date` date NOT NULL,
  `id_stu` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `livre_reser`
--

INSERT INTO `livre_reser` (`id`, `isbn`, `image`, `name`, `categorie`, `phone`, `email`, `quantité`, `booksname`, `auteur`, `booksissuedate`, `booksreturndate`, `date`, `id_stu`) VALUES
(6, '', 'books-image/17385102edb4831bab1b8b0577389d5e0133001989.jpg', 'karimi yassine', 'Informatique', '0604143753', 'yassine.karimi@ump.ac.ma', 0, 'Artificial Intelligence', ' Peter Norvig', '16/04/2021 | 05:34:5', '23/04/2021', '2021-04-16', 1),
(2, '', 'books-image/B.jpg', 'elasri med', 'Informatique', '0654365432', 'mohamed.elasri@ump.ac.ma', 0, 'C++', 'Nancy Staggers', '16/04/2021 | 05:37:2', '23/04/2021', '2021-04-16', 2);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(10) NOT NULL,
  `susername` varchar(50) NOT NULL,
  `rusername` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `msg` varchar(300) NOT NULL,
  `read1` varchar(10) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `susername`, `rusername`, `title`, `msg`, `read1`, `time`) VALUES
(28, 'karimi yassine', 'Gestionnaire', 'HELLOWORD', 'HI', 'n', '2021-04-16 08:00:45pm'),
(29, 'karimi yassine', 'Gestionnaire', 'HELLOWORD', 'HI', 'n', '2021-04-16 08:07:02pm'),
(31, 'elasri med', 'Gestionnaire', 'Demander un livre', 'c#', 'n', '2021-04-17 02:43:32am'),
(32, 'elasri med', 'Gestionnaire', 'Demander un livre', 'JS', 'n', '2021-04-17 02:44:03am');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `add_book`
--
ALTER TABLE `add_book`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lib_registration`
--
ALTER TABLE `lib_registration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `livre_emp`
--
ALTER TABLE `livre_emp`
  ADD PRIMARY KEY (`N°`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `add_book`
--
ALTER TABLE `add_book`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `lib_registration`
--
ALTER TABLE `lib_registration`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `livre_emp`
--
ALTER TABLE `livre_emp`
  MODIFY `N°` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
