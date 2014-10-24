-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 23 okt 2014 kl 14:48
-- Serverversion: 5.6.20
-- PHP-version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `datorspel`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `spel`
--

CREATE TABLE IF NOT EXISTS `spel` (
`id` int(100) NOT NULL,
  `namn` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='swag' AUTO_INCREMENT=3 ;

--
-- Dumpning av Data i tabell `spel`
--

INSERT INTO `spel` (`id`, `namn`) VALUES
(1, 'Underground'),
(2, 'The Crew');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `spel`
--
ALTER TABLE `spel`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `spel`
--
ALTER TABLE `spel`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
