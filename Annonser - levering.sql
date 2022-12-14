-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 06. Des, 2022 23:54 PM
-- Tjener-versjon: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Hybel`
--

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `annonser`
--

CREATE TABLE `annonser` (
  `annonseID` int(11) NOT NULL,
  `overskrift` varchar(50) NOT NULL,
  `beskrivelse` varchar(255) NOT NULL,
  `gateAdresse` varchar(255) NOT NULL,
  `pris` int(50) NOT NULL,
  `opprettet` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `boligType` varchar(250) NOT NULL,
  `boligEtasje` varchar(255) NOT NULL,
  `antallRom` varchar(255) NOT NULL,
  `depositum` int(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `bilde` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dataark for tabell `annonser`
--

INSERT INTO `annonser` (`annonseID`, `overskrift`, `beskrivelse`, `gateAdresse`, `pris`, `opprettet`, `boligType`, `boligEtasje`, `antallRom`, `depositum`, `status`, `bilde`) VALUES
(1, 'Ja', '1', 'Ja', 112, '2022-12-06 22:50:40', 'Rom i leilighet', '2', '1', 1, 1, 'phpr0FyUD.png'),
(2, 'Hybel', 'Fint.', 'Oblt', 9000, '2022-12-06 22:51:55', 'Rom i leilighet', '2', '1', 18000, 1, 'phpbIaQuz.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annonser`
--
ALTER TABLE `annonser`
  ADD PRIMARY KEY (`annonseID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annonser`
--
ALTER TABLE `annonser`
  MODIFY `annonseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
