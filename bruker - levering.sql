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
-- Tabellstruktur for tabell `bruker`
--

CREATE TABLE `bruker` (
  `brukerID` int(50) NOT NULL,
  `epost` varchar(100) NOT NULL,
  `fnavn` varchar(255) NOT NULL,
  `enavn` varchar(255) NOT NULL,
  `passord` varchar(265) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dataark for tabell `bruker`
--

INSERT INTO `bruker` (`brukerID`, `epost`, `fnavn`, `enavn`, `passord`) VALUES
(1, 'Test@uia.no', 'Test', 'Testing', '$2y$10$8PnD6xYMHX7HmzD2/YGG8.EHehf/Qa6AJPsnOwUuD27d5bRLWgChC'),
(2, 'Kevin@uia.no', 'Kevin', 'Maks', '$2y$10$P3SzPRbDZAuIHAaEtCMOROmZqCdj.G2Bh.l3M5c7HZkX33T0Xn0Pm'),
(3, 'Kenny@uia.no', 'Kenny', 'Le', '$2y$10$oOIcAALInaiocAIxXNZdvunNjwHBtdfF7EMyx/i6onlatDdfkkejS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bruker`
--
ALTER TABLE `bruker`
  ADD PRIMARY KEY (`brukerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bruker`
--
ALTER TABLE `bruker`
  MODIFY `brukerID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
