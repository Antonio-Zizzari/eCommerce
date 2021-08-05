-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 09, 2018 alle 22:41
-- Versione del server: 10.1.32-MariaDB
-- Versione PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `negozio`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `clienti`
--

CREATE TABLE `clienti` (
  `ID_C` int(11) NOT NULL,
  `Data_R` date NOT NULL,
  `Nome` varchar(30) NOT NULL,
  `Cognome` varchar(30) NOT NULL,
  `Indirizzo` varchar(50) NOT NULL,
  `NumeroCarta` int(10) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `PassMD5` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `clienti`
--

INSERT INTO `clienti` (`ID_C`, `Data_R`, `Nome`, `Cognome`, `Indirizzo`, `NumeroCarta`, `Username`, `Password`, `PassMD5`) VALUES
(1, '2018-06-06', 'Antonio', 'Zizzari', 'Via Veragna di Porzio, 6', 123456789, 'Zizzari', '1234', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, '2018-06-08', 'Panza', 'Giulio', 'Via regina pargherita', 123456789, 'prof', '1234', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, '2018-06-08', 'a', 'b', 'gg', 1234, 'Prova', 'gg', '73c18c59a39b18382081ec00bb456d43');

-- --------------------------------------------------------

--
-- Struttura della tabella `hacker`
--

CREATE TABLE `hacker` (
  `ID_H` int(11) NOT NULL,
  `IP` varchar(50) NOT NULL,
  `Nome_SWeb` varchar(50) NOT NULL,
  `Browser` varchar(100) NOT NULL,
  `Nome_MWeb` varchar(50) NOT NULL,
  `Script` varchar(50) NOT NULL,
  `Data` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `hacker`
--

INSERT INTO `hacker` (`ID_H`, `IP`, `Nome_SWeb`, `Browser`, `Nome_MWeb`, `Script`, `Data`) VALUES
(1, '::1', 'Apache/2.4.33 (Win32) OpenSSL/1.0.2o PHP/5.6.36', 'Mozilla/5.0 (Windows NT 6.2; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181', 'localhost', '/controllologin.php', '06/08/2018 12:01:15 '),
(2, '::1', 'Apache/2.4.33 (Win32) OpenSSL/1.0.2o PHP/5.6.36', 'Mozilla/5.0 (Windows NT 6.2; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181', 'localhost', '/controllologin.php', '06/08/2018 12:03:11 '),
(3, '::1', 'Apache/2.4.33 (Win32) OpenSSL/1.0.2o PHP/5.6.36', 'Mozilla/5.0 (Windows NT 6.2; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181', 'localhost', '/controllologin.php', '06/08/2018 01:12:09 ');

-- --------------------------------------------------------

--
-- Struttura della tabella `ordine`
--

CREATE TABLE `ordine` (
  `ID_O` int(11) NOT NULL,
  `Data` date NOT NULL,
  `COD_C` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `ordine`
--

INSERT INTO `ordine` (`ID_O`, `Data`, `COD_C`) VALUES
(1, '2018-06-09', 1),
(2, '2018-06-09', 1),
(3, '2018-06-09', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotti`
--

CREATE TABLE `prodotti` (
  `ID_P` int(11) NOT NULL,
  `Descrizione` varchar(30) NOT NULL,
  `Prezzo` float NOT NULL,
  `immagine` varchar(50) NOT NULL,
  `COD_R` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `prodotti`
--

INSERT INTO `prodotti` (`ID_P`, `Descrizione`, `Prezzo`, `immagine`, `COD_R`) VALUES
(1, 'Samsung S8', 540, 'http://localhost/prodotti/s8.jpg', 1),
(2, 'Honor 10', 356, 'http://localhost/prodotti/honor10.jpg', 1),
(3, 'Iphone X', 1200, 'http://localhost/prodotti/iphonex.jpg', 1),
(4, 'Huawei P20', 489, 'http://localhost/prodotti/huaweip20.jpg', 1),
(5, 'Notebook ASUS', 1500, 'http://localhost/prodotti/noteasus.jpg', 2),
(6, 'Notebook Acer', 900, 'http://localhost/prodotti/noteacer.jpg', 2),
(7, 'Notebook Lenovo', 1200, 'http://localhost/prodotti/notelenovo.png', 2),
(8, 'Notebook MSI', 2400, 'http://localhost/prodotti/notemsi.jpg', 2),
(9, 'Notebook Apple', 3200, 'http://localhost/prodotti/noteapple.jpg', 2),
(10, 'Tablet Samsung', 190, 'http://localhost/prodotti/tabsamsung.jpg', 3),
(11, 'Tablet ASUS', 120, 'http://localhost/prodotti/tabasus.png', 3),
(12, 'Tablet Huawei', 140, 'http://localhost/prodotti/tabhuawei.jpg', 3),
(13, 'Mouse Logitec', 90, 'http://localhost/prodotti/mouselogitec.png', 4),
(14, 'Mouse Razer', 60, 'http://localhost/prodotti/mouserazer.jpg', 4),
(15, 'Mouse ASUS ROG', 80, 'http://localhost/prodotti/mouseasus.jpg', 4),
(16, 'Mouse Microsoft', 20, 'http://localhost/prodotti/mousemicrosoft.jpg', 4),
(17, 'Tastiera Steelseries', 120, 'http://localhost/prodotti/taststeel.jpg', 5),
(18, 'Tastiera Corsair', 70, 'http://localhost/prodotti/tastcorsair.jpg', 5),
(19, 'Tastiera Logitech', 140, 'http://localhost/prodotti/tastlogitec.png', 5),
(20, 'Tastiera Razer', 170, 'http://localhost/prodotti/tastrazer.jpg', 5);

-- --------------------------------------------------------

--
-- Struttura della tabella `reparto`
--

CREATE TABLE `reparto` (
  `ID_R` int(11) NOT NULL,
  `Descrizione` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `reparto`
--

INSERT INTO `reparto` (`ID_R`, `Descrizione`) VALUES
(1, 'Telefoni'),
(2, 'Notebook'),
(3, 'Tablet'),
(4, 'Mouse'),
(5, 'Tastiere');

-- --------------------------------------------------------

--
-- Struttura della tabella `righeordine`
--

CREATE TABLE `righeordine` (
  `ID_RO` int(11) NOT NULL,
  `qta` float NOT NULL,
  `Totalespesa` float NOT NULL,
  `COD_P` int(11) NOT NULL,
  `COD_O` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `righeordine`
--

INSERT INTO `righeordine` (`ID_RO`, `qta`, `Totalespesa`, `COD_P`, `COD_O`) VALUES
(1, 9, 540, 14, 1),
(2, 1, 190, 10, 2),
(3, 6, 19200, 9, 3);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `clienti`
--
ALTER TABLE `clienti`
  ADD PRIMARY KEY (`ID_C`);

--
-- Indici per le tabelle `hacker`
--
ALTER TABLE `hacker`
  ADD PRIMARY KEY (`ID_H`);

--
-- Indici per le tabelle `ordine`
--
ALTER TABLE `ordine`
  ADD PRIMARY KEY (`ID_O`),
  ADD KEY `COD_C` (`COD_C`),
  ADD KEY `COD_C_2` (`COD_C`);

--
-- Indici per le tabelle `prodotti`
--
ALTER TABLE `prodotti`
  ADD PRIMARY KEY (`ID_P`),
  ADD KEY `COD_R` (`COD_R`);

--
-- Indici per le tabelle `reparto`
--
ALTER TABLE `reparto`
  ADD PRIMARY KEY (`ID_R`);

--
-- Indici per le tabelle `righeordine`
--
ALTER TABLE `righeordine`
  ADD PRIMARY KEY (`ID_RO`),
  ADD KEY `COD_O` (`COD_O`),
  ADD KEY `COD_P` (`COD_P`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `clienti`
--
ALTER TABLE `clienti`
  MODIFY `ID_C` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `hacker`
--
ALTER TABLE `hacker`
  MODIFY `ID_H` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `ordine`
--
ALTER TABLE `ordine`
  MODIFY `ID_O` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `prodotti`
--
ALTER TABLE `prodotti`
  MODIFY `ID_P` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT per la tabella `reparto`
--
ALTER TABLE `reparto`
  MODIFY `ID_R` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `righeordine`
--
ALTER TABLE `righeordine`
  MODIFY `ID_RO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `ordine`
--
ALTER TABLE `ordine`
  ADD CONSTRAINT `ordine_ibfk_1` FOREIGN KEY (`COD_C`) REFERENCES `clienti` (`ID_C`);

--
-- Limiti per la tabella `prodotti`
--
ALTER TABLE `prodotti`
  ADD CONSTRAINT `prodotti_ibfk_1` FOREIGN KEY (`COD_R`) REFERENCES `reparto` (`ID_R`);

--
-- Limiti per la tabella `righeordine`
--
ALTER TABLE `righeordine`
  ADD CONSTRAINT `righeordine_ibfk_1` FOREIGN KEY (`COD_O`) REFERENCES `ordine` (`ID_O`),
  ADD CONSTRAINT `righeordine_ibfk_2` FOREIGN KEY (`COD_P`) REFERENCES `prodotti` (`ID_P`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
