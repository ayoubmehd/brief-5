-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 27, 2021 at 10:51 AM
-- Server version: 5.7.18
-- PHP Version: 7.3.27
SELECT suiver.id, ensegniant.id as "Ensegniant_id", ensegniant.nom, groupe.id as "Groupe_id", groupe.libelle as "Groupe_libelle", salle.id as "Salle_id", salle.libelle as "salle_libelle" FROM suiver INNER JOIN ensegniant ON ensegniant.id = suiver.Ensegniant_id INNER JOIN groupe ON suiver.Groupe_id = groupe.id INNER JOIN salle ON salle.id = suiver.Salle_id WHERE Ensegniant_id = 26;


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ensegniant`
--

CREATE TABLE `ensegniant` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `Matiere_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ensegniant_groupe`
--

CREATE TABLE `ensegniant_groupe` (
  `id` int(11) NOT NULL,
  `Ensegniant_id` int(11) NOT NULL,
  `Groupe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `groupe`
--

CREATE TABLE `groupe` (
  `id` int(11) NOT NULL,
  `effecrif` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `matiere`
--

CREATE TABLE `matiere` (
  `id` int(11) NOT NULL,
  `Matiere_label` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `salle`
--

CREATE TABLE `salle` (
  `id` int(11) NOT NULL,
  `libelle` varchar(45) DEFAULT NULL,
  `capacite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `suiver`
--

CREATE TABLE `suiver` (
  `id` int(11) NOT NULL,
  `Ensegniant_id` int(11) NOT NULL,
  `Groupe_id` int(11) NOT NULL,
  `Salle_id` int(11) NOT NULL,
  `jour` int(11) DEFAULT NULL,
  `de` time DEFAULT NULL,
  `a` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  `Ensegniant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ensegniant`
--
ALTER TABLE `ensegniant`
  ADD PRIMARY KEY (`id`),
  CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT,
  ADD KEY `fk_Ensegniant_Matiere1_idx` (`Matiere_id`);

--
-- Indexes for table `ensegniant_groupe`
--
ALTER TABLE `ensegniant_groupe`
  ADD PRIMARY KEY (`id`),
  CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT,
  ADD KEY `fk_Ensegniant_groupe_Ensegniant1_idx` (`Ensegniant_id`),
  ADD KEY `fk_Ensegniant_groupe_Groupe1_idx` (`Groupe_id`);

--
-- Indexes for table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id`),
  CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT;

--
-- Indexes for table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`id`),
  CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT;

--
-- Indexes for table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id`),
  CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT;

--
-- Indexes for table `suiver`
--
ALTER TABLE `suiver`
  ADD PRIMARY KEY (`id`),
  CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT,
  ADD KEY `fk_Suiver_Ensegniant1_idx` (`Ensegniant_id`),
  ADD KEY `fk_Suiver_Groupe1_idx` (`Groupe_id`),
  ADD KEY `fk_Suiver_Salle1_idx` (`Salle_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT,
  ADD UNIQUE KEY `Ensegniant_id_UNIQUE` (`Ensegniant_id`),
  ADD KEY `fk_User_Ensegniant_idx` (`Ensegniant_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ensegniant`
--
ALTER TABLE `ensegniant`
  ADD CONSTRAINT `fk_Ensegniant_Matiere1` FOREIGN KEY (`Matiere_id`) REFERENCES `matiere` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ensegniant_groupe`
--
ALTER TABLE `ensegniant_groupe`
  ADD CONSTRAINT `fk_Ensegniant_groupe_Ensegniant1` FOREIGN KEY (`Ensegniant_id`) REFERENCES `ensegniant` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Ensegniant_groupe_Groupe1` FOREIGN KEY (`Groupe_id`) REFERENCES `groupe` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `suiver`
--
ALTER TABLE `suiver`
  ADD CONSTRAINT `fk_Suiver_Ensegniant1` FOREIGN KEY (`Ensegniant_id`) REFERENCES `ensegniant` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Suiver_Groupe1` FOREIGN KEY (`Groupe_id`) REFERENCES `groupe` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Suiver_Salle1` FOREIGN KEY (`Salle_id`) REFERENCES `salle` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_User_Ensegniant` FOREIGN KEY (`Ensegniant_id`) REFERENCES `ensegniant` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
