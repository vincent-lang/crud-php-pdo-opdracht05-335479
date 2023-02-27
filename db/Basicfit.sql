-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 27 feb 2023 om 20:00
-- Serverversie: 5.7.36
-- PHP-versie: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Basicfit`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Inschrijving`
--

DROP TABLE IF EXISTS `Inschrijving`;
CREATE TABLE IF NOT EXISTS `Inschrijving` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `lidmaatschap` varchar(20) DEFAULT NULL,
  `looptijd` varchar(20) DEFAULT NULL,
  `sportswater` varchar(40) DEFAULT NULL,
  `coach` varchar(40) DEFAULT NULL,
  `intro` varchar(40) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `locations` varchar(30) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Inschrijving`
--

INSERT INTO `Inschrijving` (`Id`, `lidmaatschap`, `looptijd`, `sportswater`, `coach`, `intro`, `email`, `locations`) VALUES
(7, 'Premium', 'Jaarlidmaatschap', NULL, NULL, 'on', 'random@gmail.com', 'moreelsehoek_2'),
(9, 'Premium', 'Flex optie', NULL, NULL, 'on', 'test@gmail.com', 'moreelsehoek_2'),
(11, 'Premium', 'Jaarlidmaatschap', '', '', 'on', 'test@gmail.com', 'moreelsehoek_2');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Vestiging`
--

DROP TABLE IF EXISTS `Vestiging`;
CREATE TABLE IF NOT EXISTS `Vestiging` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `locations` varchar(30) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
