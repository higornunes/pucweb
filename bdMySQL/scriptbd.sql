-- phpMyAdmin SQL Dump
-- version 2.6.1
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tempo de Generação: Mai 09, 2007 at 06:22 PM
-- Versão do Servidor: 4.1.9
-- Versão do PHP: 4.3.10
-- 
-- Banco de Dados: `clientes`
-- 

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `cidades`
-- 

CREATE TABLE `cidades` (
  `cidade_cod` int(11) NOT NULL auto_increment,
  `cidade_nome` varchar(40) NOT NULL default '',
  `cidade_codestado` int(11) NOT NULL default '0',
  PRIMARY KEY  (`cidade_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

-- 
-- Extraindo dados da tabela `cidades`
-- 

INSERT INTO `cidades` (`cidade_cod`, `cidade_nome`, `cidade_codestado`) VALUES (1, 'Belo Horizonte', 1);
INSERT INTO `cidades` (`cidade_cod`, `cidade_nome`, `cidade_codestado`) VALUES (2, 'Betim', 1);
INSERT INTO `cidades` (`cidade_cod`, `cidade_nome`, `cidade_codestado`) VALUES (3, 'Contagem', 1);
INSERT INTO `cidades` (`cidade_cod`, `cidade_nome`, `cidade_codestado`) VALUES (4, 'Arcos', 1);
INSERT INTO `cidades` (`cidade_cod`, `cidade_nome`, `cidade_codestado`) VALUES (5, 'Poços de Caldas', 1);
INSERT INTO `cidades` (`cidade_cod`, `cidade_nome`, `cidade_codestado`) VALUES (6, 'Guanhães', 1);
INSERT INTO `cidades` (`cidade_cod`, `cidade_nome`, `cidade_codestado`) VALUES (7, 'Porto Alegre', 2);
INSERT INTO `cidades` (`cidade_cod`, `cidade_nome`, `cidade_codestado`) VALUES (8, 'São Leopoldo', 2);
INSERT INTO `cidades` (`cidade_cod`, `cidade_nome`, `cidade_codestado`) VALUES (9, 'Nova Petrópolis', 2);
INSERT INTO `cidades` (`cidade_cod`, `cidade_nome`, `cidade_codestado`) VALUES (10, 'Gramado', 2);
INSERT INTO `cidades` (`cidade_cod`, `cidade_nome`, `cidade_codestado`) VALUES (11, 'Rio de Janeiro', 3);
INSERT INTO `cidades` (`cidade_cod`, `cidade_nome`, `cidade_codestado`) VALUES (12, 'Rezende', 3);
INSERT INTO `cidades` (`cidade_cod`, `cidade_nome`, `cidade_codestado`) VALUES (13, 'Macaé', 3);
INSERT INTO `cidades` (`cidade_cod`, `cidade_nome`, `cidade_codestado`) VALUES (14, 'Niterói', 3);
INSERT INTO `cidades` (`cidade_cod`, `cidade_nome`, `cidade_codestado`) VALUES (15, 'São Paulo', 4);
INSERT INTO `cidades` (`cidade_cod`, `cidade_nome`, `cidade_codestado`) VALUES (16, 'São Carlos', 4);
INSERT INTO `cidades` (`cidade_cod`, `cidade_nome`, `cidade_codestado`) VALUES (17, 'Santos', 4);
INSERT INTO `cidades` (`cidade_cod`, `cidade_nome`, `cidade_codestado`) VALUES (18, 'Campinas', 4);
INSERT INTO `cidades` (`cidade_cod`, `cidade_nome`, `cidade_codestado`) VALUES (19, 'Caraguatatuba', 4);
INSERT INTO `cidades` (`cidade_cod`, `cidade_nome`, `cidade_codestado`) VALUES (20, 'Fortaleza', 5);
INSERT INTO `cidades` (`cidade_cod`, `cidade_nome`, `cidade_codestado`) VALUES (21, 'Sobral', 5);
INSERT INTO `cidades` (`cidade_cod`, `cidade_nome`, `cidade_codestado`) VALUES (22, 'Juazeiro do Norte', 5);
INSERT INTO `cidades` (`cidade_cod`, `cidade_nome`, `cidade_codestado`) VALUES (23, 'Ubajara', 5);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `clientes`
-- 

CREATE TABLE `clientes` (
  `cliente_cod` int(11) NOT NULL default '0',
  `cliente_nome` varchar(50) NOT NULL default '',
  `cliente_codcidade` int(11) NOT NULL default '0',
  `cliente_celular` varchar(12) NOT NULL default '',
  `cliente_email` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`cliente_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `clientes`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `estados`
-- 

CREATE TABLE `estados` (
  `estado_cod` int(11) NOT NULL auto_increment,
  `estado_nome` varchar(30) NOT NULL default '',
  `estado_sigla` char(2) NOT NULL default '',
  PRIMARY KEY  (`estado_cod`),
  UNIQUE KEY `estado_nome` (`estado_nome`,`estado_sigla`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Extraindo dados da tabela `estados`
-- 

INSERT INTO `estados` (`estado_cod`, `estado_nome`, `estado_sigla`) VALUES (1, 'Minas Gerais', 'MG');
INSERT INTO `estados` (`estado_cod`, `estado_nome`, `estado_sigla`) VALUES (2, 'Rio Grande do Sul', 'RS');
INSERT INTO `estados` (`estado_cod`, `estado_nome`, `estado_sigla`) VALUES (3, 'Rio de Janeiro', 'RJ');
INSERT INTO `estados` (`estado_cod`, `estado_nome`, `estado_sigla`) VALUES (4, 'São Paulo', 'SP');
INSERT INTO `estados` (`estado_cod`, `estado_nome`, `estado_sigla`) VALUES (5, 'Ceará', 'CE');
        