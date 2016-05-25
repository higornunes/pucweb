-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 07, 2014 at 11:13 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `clientes`
--

-- --------------------------------------------------------

--
-- Table structure for table `cidades`
--

CREATE TABLE IF NOT EXISTS `cidades` (
  `cidade_cod` int(11) NOT NULL AUTO_INCREMENT,
  `cidade_nome` varchar(40) NOT NULL DEFAULT '',
  `cidade_codestado` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cidade_cod`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `cidades`
--

INSERT INTO `cidades` (`cidade_cod`, `cidade_nome`, `cidade_codestado`) VALUES
(1, 'Belo Horizonte', 1),
(2, 'Betim', 1),
(3, 'Contagem', 1),
(4, 'Arcos', 1),
(5, 'Poços de Caldas', 1),
(6, 'Guanhães', 1),
(7, 'Porto Alegre', 2),
(8, 'São Leopoldo', 2),
(9, 'Nova Petrópolis', 2),
(10, 'Gramado', 2),
(11, 'Rio de Janeiro', 3),
(12, 'Rezende', 3),
(13, 'Macaé', 3),
(14, 'Niterói', 3),
(15, 'São Paulo', 4),
(16, 'São Carlos', 4),
(17, 'Santos', 4),
(18, 'Campinas', 4),
(19, 'Caraguatatuba', 4),
(20, 'Fortaleza', 5),
(21, 'Sobral', 5),
(22, 'Juazeiro do Norte', 5),
(23, 'Ubajara', 5);

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `cliente_cod` int(11) NOT NULL DEFAULT '0',
  `cliente_nome` varchar(50) NOT NULL DEFAULT '',
  `cliente_codcidade` int(11) NOT NULL DEFAULT '0',
  `cliente_celular` varchar(12) NOT NULL DEFAULT '',
  `cliente_email` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`cliente_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`cliente_cod`, `cliente_nome`, `cliente_codcidade`, `cliente_celular`, `cliente_email`) VALUES
(0, 'Armindo', 1, '9090=9090', 'mont@mont.com');

-- --------------------------------------------------------

--
-- Table structure for table `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `estado_cod` int(11) NOT NULL AUTO_INCREMENT,
  `estado_nome` varchar(30) NOT NULL DEFAULT '',
  `estado_sigla` char(2) NOT NULL DEFAULT '',
  PRIMARY KEY (`estado_cod`),
  UNIQUE KEY `estado_nome` (`estado_nome`,`estado_sigla`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `estados`
--

INSERT INTO `estados` (`estado_cod`, `estado_nome`, `estado_sigla`) VALUES
(1, 'Minas Gerais', 'MG'),
(2, 'Rio Grande do Sul', 'RS'),
(3, 'Rio de Janeiro', 'RJ'),
(4, 'São Paulo', 'SP'),
(5, 'Ceará', 'CE');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
