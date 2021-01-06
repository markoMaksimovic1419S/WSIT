-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2021 at 04:42 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dz8`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `sifra` text NOT NULL,
  `pol` text NOT NULL,
  `aadmin` tinyint(1) NOT NULL,
  `adresa` text DEFAULT NULL,
  `broj_telefona` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `email`, `sifra`, `pol`, `aadmin`, `adresa`, `broj_telefona`) VALUES
(7, 'test1@test.com', '$2y$10$q26Gd.UsxK1m58foC6Zrfu1HSQVEgNNNGVgTnX11g2it.RNiVuuoO', 'M', 1, 'Adresa 1', '123123'),
(8, 'test2@test.com', '$2y$10$L2mBw2yo/Y3h2XYJpc2qWO6o.AQZ1b92cI7pZZbxjJQjtPlBDB/kq', 'Z', 0, 'Adresa 3131', ''),
(9, 'test3@test.com', '$2y$10$wA7qOc4IlhrbH/lyj2ShUuW6cJzChv3ktjLMfkwPGq1iMAwGWbKFO', 'Z', 1, 'Adresa 313dd', '1313131'),
(10, 'test4@test.com', '$2y$10$DeqD7Fy7yZcws6XYfYeyheGbiIcpCChlna5rLV3qYMvXtvhpCElva', 'M', 0, '', 'dadaad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
