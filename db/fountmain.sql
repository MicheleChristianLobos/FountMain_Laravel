-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Mag 20, 2025 alle 10:44
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fountmain`
--
CREATE DATABASE IF NOT EXISTS `fountmain` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `fountmain`;

-- --------------------------------------------------------

--
-- Struttura della tabella `Fontane`
--

CREATE TABLE `Fontane` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `coord_x` float NOT NULL,
  `coord_y` float NOT NULL,
  `img` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `Salvataggi`
--

CREATE TABLE `Salvataggi` (
  `id` int(11) NOT NULL,
  `id_utente` int(11) NOT NULL,
  `id_fontana` int(11) NOT NULL,
  `voto` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `Utenti`
--

CREATE TABLE `Utenti` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `cognome` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `Fontane`
--
ALTER TABLE `Fontane`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `Salvataggi`
--
ALTER TABLE `Salvataggi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_utente` (`id_utente`),
  ADD KEY `fk_fontana` (`id_fontana`);

--
-- Indici per le tabelle `Utenti`
--
ALTER TABLE `Utenti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `Fontane`
--
ALTER TABLE `Fontane`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `Salvataggi`
--
ALTER TABLE `Salvataggi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `Utenti`
--
ALTER TABLE `Utenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `Salvataggi`
--
ALTER TABLE `Salvataggi`
  ADD CONSTRAINT `fk_fontana` FOREIGN KEY (`id_fontana`) REFERENCES `Fontane` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_utente` FOREIGN KEY (`id_utente`) REFERENCES `Utenti` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
