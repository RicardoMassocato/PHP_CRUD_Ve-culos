-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Dez-2019 às 15:09
-- Versão do servidor: 5.7.17
-- PHP Version: 7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_crud`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculo`
--

CREATE TABLE `veiculo` (
  `id` int(11) NOT NULL,
  `bd_marca` varchar(100) NOT NULL,
  `bd_modelo` varchar(100) NOT NULL,
  `bd_ano` int(10) NOT NULL,
  `bd_categoria` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `veiculo`
--

INSERT INTO `veiculo` (`id`, `bd_marca`, `bd_modelo`, `bd_ano`, `bd_categoria`) VALUES
(1, 'Toyota', 'Corolla', 2019, 'Passeio'),
(2, 'Chevrolet', 'Cruze', 2018, 'Passeio'),
(3, 'Honda', 'Civic', 2020, 'Passeio'),
(4, 'Ford', 'Focus', 2017, 'Passeio'),
(5, 'Volkswagen', 'Jetta', 2019, 'Passeio'),
(6, 'Fiat', 'Cronos', 2019, 'Passeio'),
(7, 'Chevrolet', 'Onix', 2018, 'Passeio'),
(8, 'Toyota', 'Etios', 2016, 'Passeio'),
(13, 'Volkswagen', 'Fusca', 1986, 'Passeio');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `veiculo`
--
ALTER TABLE `veiculo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `veiculo`
--
ALTER TABLE `veiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
