-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Creato il: Ott 30, 2017 alle 16:05
-- Versione del server: 5.7.10
-- Versione PHP: 5.6.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestione2`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `alimenti`
--

CREATE TABLE `alimenti` (
  `id_alimento` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `prezzo` int(11) NOT NULL,
  `reparto` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `alimenti`
--

INSERT INTO `alimenti` (`id_alimento`, `nome`, `prezzo`, `reparto`) VALUES
(10, 'analcolico 3', 2, 1),
(1, 'analcolico 1', 1, 1),
(2, 'analcolico 2', 2, 1),
(3, 'cocktail 1', 1, 2),
(4, 'cocktail 2', 3, 2),
(5, 'vino rosso 1', 3, 3),
(6, 'vino rosso 2', 2, 3),
(7, 'vino bianco 1', 2, 3),
(8, 'bottiglia vodka', 11, 4),
(9, 'bottiglia tequila', 10, 4);

-- --------------------------------------------------------

--
-- Struttura della tabella `guadagno`
--

CREATE TABLE `guadagno` (
  `soldi` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `guadagno`
--

INSERT INTO `guadagno` (`soldi`) VALUES
(0);

-- --------------------------------------------------------

--
-- Struttura della tabella `ordini`
--

CREATE TABLE `ordini` (
  `id_ordine` int(11) NOT NULL,
  `tavolo` int(11) NOT NULL,
  `pronto` tinyint(1) NOT NULL,
  `aperto` tinyint(1) NOT NULL,
  `id_alimento` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `commenti` text NOT NULL,
  `money` float(10,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `tavoli`
--

CREATE TABLE `tavoli` (
  `tavolo` int(11) NOT NULL,
  `totale` int(11) NOT NULL,
  `occupato` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `tavoli`
--

INSERT INTO `tavoli` (`tavolo`, `totale`, `occupato`) VALUES
(1, 0, 0),
(2, 0, 0),
(3, 0, 0),
(4, 0, 0),
(5, 0, 0),
(6, 0, 0),
(7, 0, 0),
(8, 0, 0),
(9, 0, 0),
(10, 0, 0),
(11, 0, 0),
(12, 0, 0),
(13, 0, 0),
(14, 0, 0),
(15, 0, 0),
(16, 0, 0),
(17, 0, 0),
(18, 0, 0),
(19, 0, 0),
(20, 0, 0),
(21, 0, 0),
(22, 0, 0),
(23, 0, 0),
(24, 0, 0),
(25, 0, 0);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `alimenti`
--
ALTER TABLE `alimenti`
  ADD PRIMARY KEY (`id_alimento`);

--
-- Indici per le tabelle `guadagno`
--
ALTER TABLE `guadagno`
  ADD PRIMARY KEY (`soldi`);

--
-- Indici per le tabelle `ordini`
--
ALTER TABLE `ordini`
  ADD PRIMARY KEY (`id_ordine`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
