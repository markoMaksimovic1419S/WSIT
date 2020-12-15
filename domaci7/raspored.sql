-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2020 at 05:03 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dz67`
--

-- --------------------------------------------------------

--
-- Table structure for table `raspored`
--

CREATE TABLE `raspored` (
  `id` int(11) NOT NULL,
  `predmet` varchar(40) NOT NULL,
  `tip` varchar(40) NOT NULL,
  `nastavnik` varchar(40) NOT NULL,
  `grupe` varchar(40) NOT NULL,
  `dan` varchar(40) NOT NULL,
  `termin` varchar(40) NOT NULL,
  `vreme` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `raspored`
--

INSERT INTO `raspored` (`id`, `predmet`, `tip`, `nastavnik`, `grupe`, `dan`, `termin`, `vreme`) VALUES
(169, 'Poslovne aplikacije', 'Vezbe', 'Mijatovic Igor', '101', 'PET', '12:15-14', 'Raf4\n'),
(170, 'Uvod u programiranje', 'Vezbe', 'Veniger Marko', '101', 'SRE', '16:15-18', 'Rg6\n'),
(171, 'Uvod u programiranje', 'Praktikum', 'Tesic Nemanja', '101', 'PET', '14:15-16', 'Raf4\n'),
(172, 'Engleski 1', 'Predavanja', 'Cuk Bojana', '101 102', 'UTO', '15:15-17', 'Raf11\n'),
(173, 'Linearna algebra i analiticka geometrija', 'Predavanja', 'Jovanovic Jelena', '101 102', 'CET', '15:15-17', 'Raf11\n'),
(174, 'Linearna algebra i analiticka geometrija', 'Vezbe', 'Rankovic Dragica', '101 102', 'UTO', '12:15-15', 'Raf11\n'),
(175, 'Uvod u programiranje', 'Predavanja', 'Urosevic Dragan', '101 102', 'CET', '12:15-14', 'Raf6\n'),
(176, 'Diskretne strukture', 'Predavanja', 'Jovanovic Irena', '101 102', 'CET', '17:15-19', 'Raf11\n'),
(177, 'Diskretne strukture', 'Vezbe', 'Jerotijevic Marija', '101 102', 'SRE', '18:15-21', 'Raf11\n'),
(178, 'Poslovne aplikacije', 'Vezbe', 'Mijatovic Igor', '102', 'SRE', '15:15-17', 'Raf4\n'),
(179, 'Uvod u programiranje', 'Vezbe', 'Milojkovic Branislav', '102', 'UTO', '09:15-11', 'Raf7\n'),
(180, 'Uvod u programiranje', 'Praktikum', 'Tesic Nemanja', '102', 'CET', '19:15-21', 'Raf3\n'),
(181, 'Poslovne aplikacije', 'Vezbe', 'Mijatovic Igor', '103', 'CET', '11:15-13', 'Raf4\n'),
(182, 'Uvod u programiranje', 'Vezbe', 'Vignjevic Mihailo', '103', 'CET', '09:15-11', 'Raf4\n'),
(183, 'Uvod u programiranje', 'Praktikum', 'Al Hakan Alya', '103', 'PON', '17:15-19', 'Raf3\n'),
(184, 'Engleski 1', 'Predavanja', 'Cuk Bojana', '103 104', 'SRE', '09:15-11', 'Raf11\n'),
(185, 'Linearna algebra i analiticka geometrija', 'Predavanja', 'Filipovic Milanka', '103 104', 'PET', '16:15-18', 'Raf6\n'),
(186, 'Linearna algebra i analiticka geometrija', 'Vezbe', 'Rankovic Dragica', '103 104', 'PET', '18:15-21', 'Raf11\n'),
(187, 'Uvod u programiranje', 'Predavanja', 'Dimic Surla Bojana', '103 104', 'SRE', '11:15-13', 'Raf11\n'),
(188, 'Diskretne strukture', 'Predavanja', 'Jovanovic Irena', '103 104', 'PON', '19:15-21', 'Raf6\n'),
(189, 'Diskretne strukture', 'Vezbe', 'Jerotijevic Marija', '103 104', 'UTO', '17:15-20', 'Raf11\n'),
(190, 'Poslovne aplikacije', 'Vezbe', 'Mijatovic Igor', '104', 'SRE', '13:15-15', 'Raf4\n'),
(191, 'Uvod u programiranje', 'Vezbe', 'Vignjevic Mihailo', '104', 'UTO', '13:15-15', 'Raf7\n'),
(192, 'Uvod u programiranje', 'Praktikum', 'Zivkovic Stefan', '104', 'PET', '13:15-15', 'Raf7\n'),
(193, 'Poslovne aplikacije', 'Vezbe', 'Mijatovic Igor', '105', 'UTO', '17:15-19', 'Raf4\n'),
(194, 'Uvod u programiranje', 'Praktikum', 'Zivkovic Stefan', '105', 'SRE', '19:15-21', 'Raf7\n'),
(195, 'Uvod u programiranje', 'Vezbe', 'Vignjevic Mihailo', '105', 'PET', '11:15-13', 'Raf7\n'),
(196, 'Linearna algebra i analiticka geometrija', 'Vezbe', 'Rankovic Dragica', '105 106 107', 'CET', '15:15-18', 'Raf6\n'),
(197, 'Uvod u programiranje', 'Predavanja', 'Dimic Surla Bojana', '105 106 107', 'PET', '09:15-11', 'Raf6\n'),
(198, 'Diskretne strukture', 'Predavanja', 'Jovanovic Irena', '105 106 107', 'SRE', '15:15-17', 'Raf6\n'),
(199, 'Diskretne strukture', 'Vezbe', 'Jerotijevic Marija', '105 106 107', 'CET', '18:15-21', 'Raf6\n'),
(200, 'Linearna algebra i analiticka geometrija', 'Predavanja', 'Filipovic Milanka', '105 107 106', 'SRE', '17:15-19', 'Raf6\n'),
(201, 'Engleski 1', 'Predavanja', 'Cuk Bojana', '106', 'PET', '11:15-13', 'Raf3\n'),
(202, 'Poslovne aplikacije', 'Vezbe', 'Mijatovic Igor', '106', 'SRE', '11:15-13', 'Raf4\n'),
(203, 'Uvod u programiranje', 'Praktikum', 'Jelic Lazar', '106', 'PET', '15:15-17', 'Raf7\n'),
(204, 'Uvod u programiranje', 'Vezbe', 'Matovic Marko', '106', 'SRE', '13:15-15', 'Raf7\n'),
(205, 'Poslovne aplikacije', 'Vezbe', 'Mijatovic Igor', '107', 'UTO', '15:15-17', 'Raf4\n'),
(206, 'Uvod u programiranje', 'Vezbe', 'Matovic Marko', '107', 'UTO', '13:15-15', 'Raf4\n'),
(207, 'Uvod u programiranje', 'Praktikum', 'Jelic Lazar', '107', 'SRE', '19:15-21', 'Raf5\n'),
(208, 'Engleski 1', 'Predavanja', 'Cuk Bojana', '107 105', 'UTO', '19:15-21', 'Raf6\n'),
(209, 'Crtanje i slikanje', 'Predavanja i vezbe', 'Prusevic Dulic Mersiha', '1d1', 'UTO', '10:15-13', 'RafAtelje\n'),
(210, 'Crtanje i slikanje', 'Predavanja i vezbe', 'Prusevic Dulic Mersiha', '1d1', 'UTO', '13:15-16', 'RafAtelje\n'),
(211, 'Engleski 1', 'Predavanja', 'Cuk Bojana', '1d1 1d2', 'PET', '15:15-17', 'RafAtelje\n'),
(212, 'Osnovi oblikovanja', 'Predavanja', 'Malesevic Nenad', '1d1 1d2', 'PON', '09:15-12', 'RafAtelje\n'),
(213, 'Osnovi oblikovanja', 'Vezbe', 'Eskobar Dobrijevic Katarina', '1d1 1d2', 'PET', '09:15-12', 'Raf14\n'),
(214, 'Osnovi projektovanja', 'Predavanja', 'Djuricic Ana', '1d1 1d2', 'CET', '09:15-12', 'RafAtelje\n'),
(215, 'Osnovi projektovanja', 'Vezbe', 'Stojanovic Visnja', '1d1 1d2', 'PET', '12:15-15', 'Raf14\n'),
(216, 'Crtanje i slikanje', 'Predavanja i vezbe', 'Prusevic Dulic Mersiha', '1d2', 'SRE', '13:15-16', 'RafAtelje\n'),
(217, 'Crtanje i slikanje', 'Predavanja i vezbe', 'Prusevic Dulic Mersiha', '1d2', 'SRE', '10:15-13', 'RafAtelje\n'),
(218, 'Administracija i odrzavanje sistema 1', 'Predavanja', 'Seslija Ognjen', '1s1', 'UTO', '18:15-21', 'Raf2\n'),
(219, 'Administracija i odrzavanje sistema 1', 'Vezbe', 'Seslija Ognjen', '1s1', 'SRE', '18:15-21', 'Raf2\n'),
(220, 'Organizacija racunara', 'Vezbe', 'Stambolovic Bogdana', '1s1', 'PET', '17:15-20', 'Raf3\n'),
(221, 'Praktikum iz arhitekture racunara i oper', 'Praktikum', 'Stambolovic Bogdana', '1s1', 'PET', '15:15-17', 'Raf3\n'),
(222, 'Osnovi programiranja', 'Vezbe', 'Paunovic Vanja', '1s1', 'SRE', '12:15-15', 'Raf3\n'),
(223, 'Organizacija racunara', 'Predavanja', 'Mirkovic Bogdan', '1s1 1s2 1s3 1s4', 'CET', '8:15-11', 'Kolarac1\n'),
(224, 'Engleski 1', 'Predavanja', 'Vrbica-Matejic Vera', '1s1 1s3', 'PON', '09:15-11', 'Raf11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `raspored`
--
ALTER TABLE `raspored`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `raspored`
--
ALTER TABLE `raspored`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
