-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2017 at 12:41 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nekretnine`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(257) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `username`, `password`, `status`) VALUES
(1, 'vuk', '123', 0),
(2, 'agent', '123', 1),
(3, 'pera', '123', 1),
(17, 'mika', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nekretnina`
--

CREATE TABLE `nekretnina` (
  `id` int(11) NOT NULL,
  `lokacija` varchar(20) NOT NULL,
  `imevlasnika` varchar(40) NOT NULL,
  `telvlasnika` varchar(20) NOT NULL,
  `adresa` varchar(40) NOT NULL,
  `spratnost` int(3) NOT NULL,
  `povrsina` int(6) NOT NULL,
  `brojsoba` int(3) NOT NULL,
  `grejanje` varchar(30) NOT NULL,
  `velicinaplaca` varchar(20) NOT NULL,
  `cena` int(10) NOT NULL,
  `sprat` varchar(15) NOT NULL,
  `tipobjekta` varchar(20) NOT NULL,
  `naslovnaslika` varchar(30) NOT NULL,
  `vremedodavanja` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dodao` varchar(20) NOT NULL,
  `obrisana` int(1) NOT NULL DEFAULT '0',
  `komentar` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nekretnina`
--

INSERT INTO `nekretnina` (`id`, `lokacija`, `imevlasnika`, `telvlasnika`, `adresa`, `spratnost`, `povrsina`, `brojsoba`, `grejanje`, `velicinaplaca`, `cena`, `sprat`, `tipobjekta`, `naslovnaslika`, `vremedodavanja`, `dodao`, `obrisana`, `komentar`) VALUES
(1, 'Beograd-Čukarica', 'Vuk Vodogaz', '0641234567', 'Neka Lepa Ulica br.9', 3, 290, 10, 'El', '7', 150000, '', 'Kuća', 'kuca1.jpg', '2017-08-23 01:51:13', 'vuk', 0, ''),
(2, 'Beograd-Centar', 'Vuk Vodogaz', '0641234567', 'Kralja Petra 51', 4, 103, 5, 'Cg', '', 180000, '4', 'Stan', 'luks2.jpg', '2017-08-22 17:14:38', 'agent', 0, ''),
(3, 'Beograd-Centar', 'Pera Perić', '011987987', 'Neka adresa bb', 6, 75, 3, 'Ta', '', 96000, '2', 'Stan', 'stan(1).jpg', '2017-08-21 04:51:13', 'vuk', 0, ''),
(4, 'Beograd-Dedinje', 'Čeda Čedic', '011234564', 'Palackova 34', 3, 700, 20, 'Inverter - Fan coil', '5', 2000000, '4', 'Kuća', '20170705_165329.jpg', '2017-08-20 11:30:20', 'vuk', 0, ''),
(26, 'Beograd-Centar', 'Sima Simić', '063234234', 'Majke Jevrosime 11', 6, 110, 3, 'cg', '', 250000, '1', 'Stan', '15039540152641.jpg', '2017-08-28 22:53:10', 'vuk', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `slike`
--

CREATE TABLE `slike` (
  `id` int(6) NOT NULL,
  `idnekretnine` int(6) NOT NULL,
  `autor` varchar(30) NOT NULL,
  `komentar` varchar(200) NOT NULL,
  `imeslike` varchar(30) NOT NULL,
  `datum` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slike`
--

INSERT INTO `slike` (`id`, `idnekretnine`, `autor`, `komentar`, `imeslike`, `datum`) VALUES
(1, 4, 'vuk', '', '20170705_165419.jpg', '2017-08-28 00:32:02'),
(2, 4, 'vuk', '', '20170420_111204_001.jpg', '2017-08-28 00:33:05'),
(3, 4, 'vuk', '', '20170705_165329.jpg', '2017-08-28 00:32:26'),
(4, 4, 'vuk', '', '20170420_111259.jpg', '2017-08-28 00:32:36'),
(5, 4, 'vuk', '', '20170420_111204_001.jpg', '2017-08-27 15:49:24'),
(6, 4, 'vuk', '', '20170420_111207.jpg', '2017-08-27 15:49:24'),
(7, 26, 'agent', 'lepa slika', 'DSC01113.JPG', '2017-08-28 23:06:48'),
(8, 26, 'agent', '', 'DSC01114.JPG', '2017-08-28 23:06:48'),
(9, 26, 'agent', '', 'DSC01116.JPG', '2017-08-28 23:06:48'),
(10, 26, 'agent', '', 'DSC01120.JPG', '2017-08-28 23:06:48'),
(11, 26, 'agent', '', 'DSC01122.JPG', '2017-08-28 23:06:48'),
(12, 26, 'agent', '', 'DSC01125.JPG', '2017-08-28 23:06:48'),
(13, 26, 'agent', '', 'DSC01128.JPG', '2017-08-28 23:06:48'),
(14, 26, 'agent', '', 'DSC01130.JPG', '2017-08-28 23:06:48'),
(15, 26, 'agent', '', 'DSC01136.JPG', '2017-08-28 23:06:48'),
(16, 26, 'agent', '', 'DSC01137.JPG', '2017-08-28 23:06:48'),
(17, 26, 'agent', '', 'DSC01144.jpg', '2017-08-28 23:10:41'),
(18, 26, 'agent', '', 'DSC01141.JPG', '2017-08-28 23:10:41'),
(19, 26, 'agent', '', 'DSC01142.jpg', '2017-08-28 23:10:41'),
(20, 26, 'agent', '', 'DSC01151.jpg', '2017-08-28 23:10:41'),
(21, 26, 'agent', '', 'DSC01153.jpg', '2017-08-28 23:10:41'),
(22, 26, 'agent', '', 'DSC01155.JPG', '2017-08-28 23:10:41'),
(23, 26, 'agent', '', 'DSC01157.JPG', '2017-08-28 23:10:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nekretnina`
--
ALTER TABLE `nekretnina`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slike`
--
ALTER TABLE `slike`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `nekretnina`
--
ALTER TABLE `nekretnina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `slike`
--
ALTER TABLE `slike`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
