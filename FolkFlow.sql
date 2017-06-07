-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 02. Jun 2017 um 13:50
-- Server-Version: 10.1.16-MariaDB
-- PHP-Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `FolkFlow`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Kategorie`
--

CREATE TABLE `Kategorie` (
  `idK` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `beschreibung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `Kategorie`
--

INSERT INTO `Kategorie` (`idK`, `name`, `beschreibung`) VALUES
(1, 'muzik e leht', ''),
(2, 'Metal', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Orders`
--

CREATE TABLE `Orders` (
  `idO` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `orders_has_partituren`
--

CREATE TABLE `orders_has_partituren` (
  `id_OhP` int(11) NOT NULL,
  `id_Orders` int(11) DEFAULT NULL,
  `id_Partituren` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Partituren`
--

CREATE TABLE `Partituren` (
  `idP` int(11) NOT NULL,
  `titel` varchar(255) DEFAULT NULL,
  `beschreibung` text,
  `preis` double DEFAULT NULL,
  `partiturepdf` varchar(255) DEFAULT NULL,
  `Kategorie_idK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `idU` int(11) NOT NULL,
  `vname` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `gebtag` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `geschlecht` varchar(1) DEFAULT NULL,
  `userlevel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user_has_partituren`
--

CREATE TABLE `user_has_partituren` (
  `id_UhP` int(11) NOT NULL,
  `id_Users` int(11) DEFAULT NULL,
  `id_Part` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `Kategorie`
--
ALTER TABLE `Kategorie`
  ADD PRIMARY KEY (`idK`);

--
-- Indizes für die Tabelle `orders_has_partituren`
--
ALTER TABLE `orders_has_partituren`
  ADD PRIMARY KEY (`id_OhP`),
  ADD KEY `id_Orders` (`id_Orders`),
  ADD KEY `id_Partituren` (`id_Partituren`);

--
-- Indizes für die Tabelle `Partituren`
--
ALTER TABLE `Partituren`
  ADD PRIMARY KEY (`idP`),
  ADD KEY `Kategorie_idK` (`Kategorie_idK`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idU`);

--
-- Indizes für die Tabelle `user_has_partituren`
--
ALTER TABLE `user_has_partituren`
  ADD PRIMARY KEY (`id_UhP`),
  ADD KEY `id_Users` (`id_Users`),
  ADD KEY `id_Part` (`id_Part`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `Kategorie`
--
ALTER TABLE `Kategorie`
  MODIFY `idK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `Orders`
--
ALTER TABLE `Orders`
  MODIFY `idO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `orders_has_partituren`
--
ALTER TABLE `orders_has_partituren`
  MODIFY `id_OhP` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `Partituren`
--
ALTER TABLE `Partituren`
  MODIFY `idP` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `idU` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `user_has_partituren`
--
ALTER TABLE `user_has_partituren`
  MODIFY `id_UhP` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `orders_has_partituren`
--
ALTER TABLE `orders_has_partituren`
  ADD CONSTRAINT `orders_has_partituren_ibfk_1` FOREIGN KEY (`id_Orders`) REFERENCES `Orders` (`idO`),
  ADD CONSTRAINT `orders_has_partituren_ibfk_2` FOREIGN KEY (`id_Partituren`) REFERENCES `Partituren` (`idP`);

--
-- Constraints der Tabelle `Partituren`
--
ALTER TABLE `Partituren`
  ADD CONSTRAINT `partituren_ibfk_1` FOREIGN KEY (`Kategorie_idK`) REFERENCES `Kategorie` (`idK`);

--
-- Constraints der Tabelle `user_has_partituren`
--
ALTER TABLE `user_has_partituren`
  ADD CONSTRAINT `user_has_partituren_ibfk_1` FOREIGN KEY (`id_Users`) REFERENCES `user` (`idU`),
  ADD CONSTRAINT `user_has_partituren_ibfk_2` FOREIGN KEY (`id_Part`) REFERENCES `Partituren` (`idP`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
