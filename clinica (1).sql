-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Mar-2021 às 22:42
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `clinica`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `medicacao`
--

CREATE TABLE `medicacao` (
  `id` int(11) NOT NULL,
  `idutente` int(11) NOT NULL,
  `manha` varchar(80) DEFAULT NULL,
  `almoco` varchar(80) DEFAULT NULL,
  `lanche` varchar(80) DEFAULT NULL,
  `jantar` varchar(80) DEFAULT NULL,
  `deitar` varchar(80) DEFAULT NULL,
  `estado` tinyint(2) NOT NULL DEFAULT 1,
  `inicio` date DEFAULT NULL,
  `fim` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notas`
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `hora` varchar(12) NOT NULL,
  `nota` text NOT NULL,
  `tecnico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pensos`
--

CREATE TABLE `pensos` (
  `id` int(11) NOT NULL,
  `idutente` int(11) NOT NULL,
  `penso` int(11) NOT NULL,
  `foto` blob NOT NULL,
  `data` date NOT NULL,
  `hora` varchar(12) NOT NULL,
  `tecnico` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sinais`
--

CREATE TABLE `sinais` (
  `id` int(11) NOT NULL,
  `idutente` int(11) NOT NULL,
  `ta` varchar(50) DEFAULT NULL,
  `sat` varchar(50) DEFAULT NULL,
  `fc` varchar(50) DEFAULT NULL,
  `gli` varchar(50) DEFAULT NULL,
  `temp` varchar(10) DEFAULT NULL,
  `dor` varchar(4) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` text DEFAULT NULL,
  `tecnico` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `utente`
--

CREATE TABLE `utente` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `bi` varchar(15) DEFAULT NULL,
  `nif` varchar(14) DEFAULT NULL,
  `sns` text DEFAULT NULL,
  `ss` text DEFAULT NULL,
  `nasc` date DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT 1,
  `datativo` date DEFAULT NULL,
  `datain` date DEFAULT NULL,
  `datasai` date DEFAULT NULL,
  `val` tinyint(1) NOT NULL,
  `lanif` tinyint(1) DEFAULT 0,
  `numero` int(11) DEFAULT 0,
  `diabete` tinyint(4) DEFAULT 0,
  `alergias` text DEFAULT NULL,
  `antecedentes` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `utente`
--

INSERT INTO `utente` (`id`, `nome`, `bi`, `nif`, `sns`, `ss`, `nasc`, `ativo`, `datativo`, `datain`, `datasai`, `val`, `lanif`, `numero`, `diabete`, `alergias`, `antecedentes`) VALUES
(29, 'Maria Ivone Oliveira Jacinto', '8870281', '214966887', '288729384', '11112182024', '1960-11-19', 1, '2011-03-23', '2011-03-23', NULL, 1, 0, 83, 0, NULL, NULL),
(75, 'Ramiro dos Santos SimÃµes', '1416840', '100974449', '398142967', '10097140560', '1929-11-01', 1, '0000-00-00', '0000-00-00', NULL, 1, 0, 300, 0, NULL, NULL),
(71, 'OtÃ­lia Ribeiro GonÃ§alves', '01507720', '104542004', '297546577', '11111485045', '1938-08-19', 1, '2015-08-21', '0000-00-00', NULL, 1, 0, 264, 0, NULL, NULL),
(313, 'Palmira do Carmo Figueiredo Antunes', '', '', '', '', '1942-02-15', 1, NULL, '2020-02-03', NULL, 2, 1, 639, 0, NULL, NULL),
(81, 'Herculano SimÃµes Alves', '', '', '', '10140310671', '0000-00-00', 1, NULL, '0000-00-00', NULL, 2, 1, 206, 0, NULL, NULL),
(82, 'Joaquim Vaz Lopes', '', '', '', '10140152853', '0000-00-00', 1, '0000-00-00', '0000-00-00', NULL, 3, 1, 191, 1, NULL, NULL),
(83, 'JosÃ© Alberto Antunes Martins', '', '', '', '10140769350', '0000-00-00', 1, NULL, '0000-00-00', NULL, 3, 1, 243, 0, NULL, NULL),
(84, 'Manuel TomÃ¡s dos Anjos', '', '', '', '11110634216', '0000-00-00', 1, NULL, '0000-00-00', NULL, 3, 0, 248, 0, NULL, NULL),
(91, 'Arminda Dinis Mendes Nunes Alves', '', '', '', '11111880397', '0000-00-00', 1, '0000-00-00', '0000-00-00', NULL, 3, 0, 34, 0, NULL, NULL),
(92, 'Armindo Coelho Fernandes', '', '', '', '10140163932', '1928-01-19', 1, '0000-00-00', '2014-04-28', NULL, 2, 1, 218, 1, NULL, NULL),
(93, 'Artur Almeida David', '', '', '', '11112078111', '0000-00-00', 1, '0000-00-00', '0000-00-00', NULL, 2, 0, 36, 0, NULL, NULL),
(99, 'Esmeralda Rosinha LourenÃ§o', '', '', '', '10140224934', '1932-08-08', 1, NULL, '2014-01-07', NULL, 2, 1, 62, 1, NULL, NULL),
(101, 'Fernando Jesus Santos', '', '', '', '11111491292', '1933-08-18', 1, '0000-00-00', '2011-07-18', NULL, 2, 0, 44, 1, NULL, NULL),
(108, 'Isidoro Mendes dos Santos', '', '', '', '10190995417', '0000-00-00', 1, '2016-05-01', '2016-02-01', '0000-00-00', 2, 1, 287, 0, NULL, NULL),
(119, 'Marcolino Jesus de Carvalho', '', '', '', '10140226073', NULL, 1, '2016-03-01', NULL, NULL, 3, 1, 285, 1, NULL, NULL),
(132, 'Maria Olivia Braziela Prata', '', '', '', '10140509443', '1941-01-26', 1, '0000-00-00', '2016-01-06', NULL, 2, 1, 69, 0, NULL, NULL),
(133, 'Maria Otilia da Silva Correia', '', '', '', '10140674634', '1932-10-10', 1, '0000-00-00', '2015-11-24', NULL, 2, 1, 242, 1, NULL, NULL),
(138, 'Sofia Henriques Lopes', '', '', '', '10140662623', '1932-12-05', 1, '0000-00-00', '2014-10-08', NULL, 2, 1, 234, 0, NULL, NULL),
(141, 'Anibal Pedroso Rosa', NULL, NULL, NULL, '11111173011\r\n', NULL, 1, NULL, NULL, NULL, 4, 0, 0, 0, NULL, NULL),
(142, 'Aurora Silva Tomaz', '', '', '', '11111937265', '1933-10-19', 1, NULL, '2018-04-16', NULL, 2, 0, 483, 1, NULL, NULL),
(143, 'Benilde Dinis Fernandes', NULL, NULL, NULL, '10140484320\r\n', NULL, 1, NULL, NULL, NULL, 4, 1, 0, 0, NULL, NULL),
(145, 'CustÃ³dio Nunes', '', '', '', '11111668791', '0000-00-00', 1, NULL, '0000-00-00', NULL, 4, 0, 0, 0, NULL, NULL),
(146, 'JoÃ£o Pedro Ventura Henriques', '', '', '', '11113456134', '0000-00-00', 1, NULL, '0000-00-00', NULL, 4, 0, 0, 0, NULL, NULL),
(149, 'Isaura dos Anjos Pires', NULL, NULL, NULL, '10140007757\r\n', NULL, 1, NULL, NULL, NULL, 4, 1, 0, 0, NULL, NULL),
(151, 'Jorge Manuel de Almeida Rodrigues', NULL, NULL, NULL, '10140865317\r\n', NULL, 1, NULL, NULL, NULL, 4, 0, 0, 0, NULL, NULL),
(152, 'JosÃ© Maria Correia Henriques', '', '', '', '10140273447', '0000-00-00', 1, NULL, '0000-00-00', NULL, 4, 1, 0, 0, NULL, NULL),
(153, 'Lisete da Soledade Antunes Paiva', '', '', '', '10140647371', '1940-04-01', 1, NULL, '2017-01-04', NULL, 2, 1, 392, 1, NULL, NULL),
(159, 'Maria Diniz dos Anjos', NULL, NULL, NULL, '11111396248\r\n', NULL, 1, NULL, NULL, NULL, 4, 0, 0, 0, NULL, NULL),
(162, 'Maria Otilia Lopes', NULL, NULL, NULL, '10140676171/00\r\n', NULL, 1, NULL, NULL, NULL, 3, 1, 246, 0, NULL, NULL),
(198, 'AntÃ³nio Henriques TomÃ¡s', '', '', '', '', '0000-00-00', 1, NULL, '0000-00-00', NULL, 1, 1, 406, 1, NULL, NULL),
(197, 'Maria Olinda Fernandes de Carvalho Henriques Bernardo', '', '', '', '', '1933-01-29', 1, NULL, '2016-12-18', NULL, 1, 0, 315, 0, NULL, NULL),
(213, 'Maria Raquel Rodrigues da Silva', '1529862', '', '', '', NULL, 1, NULL, NULL, NULL, 1, 0, 401, 1, NULL, NULL),
(222, 'ConstanÃ§a Santos Cruz', '', '', '', '', '1925-11-14', 1, NULL, '2018-01-18', NULL, 1, 0, 504, 1, NULL, NULL),
(224, 'Maria Elvira Alves da Silva', '', '', '', '', '1928-04-30', 1, NULL, '2018-03-12', NULL, 1, 1, 512, 0, NULL, NULL),
(225, 'Celeste Maria ConceiÃ§Ã£o', '', '', '', '', '1926-11-10', 1, NULL, '2018-05-02', NULL, 3, 0, 524, 1, NULL, NULL),
(228, 'LÃ­dia Maria Antunes', '4086917', '126292868', '390112812', '', '1927-10-26', 1, NULL, '2018-07-16', NULL, 1, 1, 549, 1, NULL, NULL),
(259, 'Arlete Soledade Correia Casimiro', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 3, 1, 556, 1, NULL, NULL),
(229, 'Maria Lurdes Henriques Martins Carvalho', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 4, 1, 461, 1, NULL, NULL),
(233, 'Ãlvaro Henriques', '', '', '', '', '1946-11-10', 1, NULL, '2018-06-02', NULL, 2, 1, 419, 0, NULL, NULL),
(235, 'AntÃ³nio Dinis Fernandes', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 3, 1, 393, 0, NULL, NULL),
(314, 'Manuel Correia Figueiredo dos Santos', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 3, 1, 653, 1, NULL, NULL),
(240, 'NazarÃ© Rosa Martins', '', '', '', '', '1931-03-15', 1, NULL, '2020-01-15', NULL, 2, 0, 378, 1, NULL, NULL),
(241, 'Arnaldo Manuel Paiva SimÃµes', '', '', '', '', '1936-07-16', 1, NULL, '2017-05-08', NULL, 2, 0, 432, 1, NULL, NULL),
(243, 'Maria Prazeres Mendes Francisco Fernandes', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 3, 1, 307, 0, NULL, NULL),
(244, 'Maria Fernanda Carreira Veras Silva Soares', '', '', '', '', '1939-11-24', 1, NULL, '2017-06-03', NULL, 2, 1, 444, 0, NULL, NULL),
(245, 'Maria AmÃ©lia Pardinha dos Santos', '', '', '', '', '1934-09-02', 1, NULL, '2018-11-13', NULL, 2, 0, 517, 0, NULL, NULL),
(250, 'Maria da Costa Nunes', '', '', '', '', '1944-09-01', 1, NULL, '2018-06-12', NULL, 2, 0, 539, 0, NULL, NULL),
(257, 'Graziela da Costa Taborda D\' Almeida', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, 0, 286, 1, NULL, NULL),
(258, 'Alda Coelho Antunes', '', '', '', '', '1932-08-19', 1, NULL, '2018-10-12', NULL, 2, 0, 551, 1, NULL, NULL),
(260, 'Adelino Piedade Rodrigues', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 2, 0, 0, 0, NULL, NULL),
(262, 'JoÃ£o Manuel Antunes Martins', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 3, 0, 454, 0, NULL, NULL),
(264, 'Alda Maria da Silva', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, 0, 572, 0, NULL, NULL),
(266, 'Palmira Henriques Malheiro Antunes', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 4, 0, 0, 0, NULL, NULL),
(268, 'Maria Idalina Coelho Costa Pires', '', '', '', '', '1940-01-09', 1, NULL, '2019-03-26', NULL, 2, 1, 584, 0, NULL, NULL),
(270, 'Silvina Silva Henriques Bernardo', '', '', '', '', '1931-03-14', 1, NULL, '2019-02-19', NULL, 2, 1, 578, 0, NULL, NULL),
(271, 'Maria Angelina Henriques SimÃµes', '', '', '', '', '1945-10-19', 1, NULL, '2019-02-18', NULL, 1, 1, 337, 1, NULL, NULL),
(272, 'Amazilda Mendes Silva', '', '', '', '', '1945-12-02', 1, NULL, '2019-02-22', NULL, 3, 0, 576, 0, NULL, NULL),
(273, 'Ilidia da ConceiÃ§Ã£o Bernardo', '', '', '', '', '1937-10-11', 1, NULL, '2019-03-07', NULL, 2, 1, 580, 1, NULL, NULL),
(274, 'Maria Alves Rodrigues', '', '', '', '', '1936-07-07', 1, NULL, '2020-06-09', NULL, 2, 1, 585, 1, NULL, NULL),
(276, 'Manuel da Silva Nunes', '', '', '', '', '1952-05-23', 1, NULL, '2019-04-30', NULL, 2, 1, 586, 0, NULL, NULL),
(279, 'Maria Irene Fernandes Martins', '', '', '', '', '1948-09-25', 1, NULL, '2020-08-04', NULL, 2, 1, 613, 1, NULL, NULL),
(280, 'Francisco Fernandes Mourao Junior', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, 0, 612, 1, NULL, NULL),
(285, 'Almerindo Dores Rodrigues', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 2, 0, 360, 1, NULL, NULL),
(288, 'AmÃ©rico Fernando Vidal', '', '', '', '', '1939-11-18', 1, NULL, '2020-03-16', NULL, 2, 0, 648, 0, NULL, NULL),
(289, 'Maria Olinda TomÃ¡z', '', '', '', '', '1931-02-24', 1, NULL, '2020-02-03', NULL, 2, 0, 638, 0, NULL, NULL),
(291, 'Gracinda dos Santos Silva Fernandes', '', '', '', '', '1941-06-16', 1, NULL, '2020-06-01', NULL, 1, 0, 655, 0, NULL, NULL),
(292, 'Ernestina Jesus Fernandes', '', '', '', '', '1933-04-10', 1, NULL, '2020-06-05', NULL, 2, 1, 656, 1, NULL, NULL),
(294, 'Maria Aida Henriques', '', '', '', '', '0000-00-00', 1, NULL, '0000-00-00', NULL, 1, 1, 654, 0, NULL, NULL),
(296, 'Ermelinda Jesus Rosa', '', '', '', '', '1932-09-27', 1, NULL, '0000-00-00', NULL, 3, 0, 631, 0, NULL, NULL),
(297, 'Maria Fernanda Rodrigues Lopes AraÃºjo', '', '', '', '', '1937-07-15', 1, NULL, '0000-00-00', NULL, 1, 1, 0, 1, NULL, NULL),
(299, 'Maria Aldina Fernandes Rodrigues', 'B-1404858', '140157948', '285254037', '10720780431', '1943-02-07', 1, NULL, '2020-08-24', NULL, 3, 1, 674, 1, NULL, NULL),
(300, 'FlorÃªncia Santos Marques Fonseca', '', '', '', '', '1931-10-05', 1, NULL, '0000-00-00', NULL, 1, 1, 396, 1, NULL, NULL),
(301, 'Juvelina Carvalho Henriques', '', '', '', '', '1932-03-08', 1, NULL, '0000-00-00', NULL, 1, 1, 0, 1, NULL, NULL),
(303, 'Alcinda Pereira Marques', '', '', '', '', '2020-10-15', 1, NULL, '2020-08-19', NULL, 2, 1, 669, 1, NULL, NULL),
(304, 'Maria OtÃ­lia Henriques Rodrigues', '', '', '', '', '1935-08-04', 1, NULL, '2020-08-17', NULL, 2, 0, 667, 0, NULL, NULL),
(305, 'Maria Alice Pires Barata Vidal', '', '', '', '', '1939-06-21', 1, NULL, '2020-08-21', NULL, 2, 0, 673, 1, NULL, NULL),
(306, 'Adelaide Henriques Rodrigues', '', '', '', '', '1930-09-11', 1, NULL, '2020-09-01', NULL, 3, 0, 677, 0, NULL, NULL),
(307, 'JosÃ© Antunes dos Santos', '', '', '', '', '1931-04-07', 1, NULL, '2016-02-15', NULL, 2, 1, 293, 1, NULL, NULL),
(316, 'Adelino da Conceição Custódio', '', '', '', '', '1948-03-29', 1, NULL, '2020-10-17', NULL, 1, 1, 0, 1, NULL, NULL),
(317, 'DÃ­dia Figueiredo Antunes', '', '', '', '', '1936-02-17', 1, NULL, '2020-12-02', NULL, 2, 0, 0, 0, NULL, NULL),
(318, 'Aldara Rosinha Lameiras Henriques ', '', '', '', '', '1933-11-15', 1, NULL, '2020-12-17', NULL, 2, 1, 0, 1, NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `medicacao`
--
ALTER TABLE `medicacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pensos`
--
ALTER TABLE `pensos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `medicacao`
--
ALTER TABLE `medicacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pensos`
--
ALTER TABLE `pensos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `utente`
--
ALTER TABLE `utente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=319;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
