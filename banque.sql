-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 28, 2025 at 11:56 AM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banque`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `codC` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`codC`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`codC`, `nom`, `prenom`) VALUES
(1, 'Anderson', 'Patrick');

-- --------------------------------------------------------

--
-- Table structure for table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `id` int NOT NULL AUTO_INCREMENT,
  `numCompte` int NOT NULL,
  `solde` float NOT NULL,
  `dateO` date NOT NULL,
  `dateC` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `numCompte` (`numCompte`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `compte`
--

INSERT INTO `compte` (`id`, `numCompte`, `solde`, `dateO`, `dateC`) VALUES
(1, 201234560, 2500000, '2025-08-21', '2026-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `gestionaire`
--

DROP TABLE IF EXISTS `gestionaire`;
CREATE TABLE IF NOT EXISTS `gestionaire` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `telephone` varchar(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gestionaire`
--

INSERT INTO `gestionaire` (`id`, `nom`, `prenom`, `adresse`, `telephone`) VALUES
(1, 'Rodriguez', 'Alberti', 'New York,123', '2345678');

-- --------------------------------------------------------

--
-- Table structure for table `transactionc`
--

DROP TABLE IF EXISTS `transactionc`;
CREATE TABLE IF NOT EXISTS `transactionc` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date_trans` date NOT NULL,
  `montant` float NOT NULL,
  `compte` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `compt` (`compte`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transactionc`
--

INSERT INTO `transactionc` (`id`, `date_trans`, `montant`, `compte`) VALUES
(1, '2025-09-27', 1200000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transactioncompte`
--

DROP TABLE IF EXISTS `transactioncompte`;
CREATE TABLE IF NOT EXISTS `transactioncompte` (
  `id` int NOT NULL AUTO_INCREMENT,
  `compte` int NOT NULL,
  `transactionc` int NOT NULL,
  `solde` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `comp` (`compte`),
  KEY `transa` (`transactionc`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transactioncompte`
--

INSERT INTO `transactioncompte` (`id`, `compte`, `transactionc`, `solde`) VALUES
(1, 1, 1, 1300000);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transactionc`
--
ALTER TABLE `transactionc`
  ADD CONSTRAINT `compt` FOREIGN KEY (`compte`) REFERENCES `compte` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `transactioncompte`
--
ALTER TABLE `transactioncompte`
  ADD CONSTRAINT `comp` FOREIGN KEY (`compte`) REFERENCES `compte` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `transa` FOREIGN KEY (`transactionc`) REFERENCES `transactionc` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
