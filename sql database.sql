-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11-Fev-2016 às 00:28
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `itaxi`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `clienteID` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `morada` varchar(100) NOT NULL,
  `nif` int(11) NOT NULL,
  `telemovel` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`clienteID`),
  UNIQUE KEY `ClienteID_UNIQUE` (`clienteID`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`clienteID`, `username`, `nome`, `password`, `morada`, `nif`, `telemovel`, `email`) VALUES
(18, 'Belz', 'Pedro Miguel Prada Belchior', '$2y$10$xEdlcjQiapS/GjP.VaP3u.rbto/SsTPBPm49E9PfmPh9RdJV.Vk.S', 'Rua Olimpio Cabral, 6', 21397678, 926640415, 'pedrobelchior@hotmail.com'),
(20, 'Riquinho', 'Henrique Sá', '$2y$10$SfksQAr2iL17B2D5ScbMie8PG1s5b.t6Ch88JqHusk4qoIr/V7muS', 'Valpaços', 234569008, 933332221, 'henriquelagesa@hotmail.com'),
(22, 'bruno', 'Bruno Ferreira', '$2y$10$LAPFmG2g1/zFtm1tf3q9v.C/q3PO1gFgZmaPwxEkKxQC6ZXsoml4S', 'Paredes', 111222555, 921333444, 'bruno.ferreira.692@gmail.com'),
(23, 'teste', 'Bruno', '$2y$10$wbrduUwBB7XrDwudaK.BHOfC.WFfo7hDWDQckKWSKO0f3VqZ700oO', 'Av. Dr', 123, 123, 'Bruno@gmail'),
(24, '123', '123', '$2y$10$tdKwfIpQ2k7R.W2I0rCD8eo5nZSPADXmHc.gMwIMJMuijqU4b4ePu', '123', 123, 123, '123@asdasd'),
(25, 'zeabilio', '123', '$2y$10$Tunq8qVxkQDR4FJgt8/3Be4a5S1BhuG.kgtsJcEmKioRRl6nUDNKe', '123', 123, 123, '123@123'),
(26, 'Pedro', 'Pedro Prada', '$2y$10$wmQprXBVlUUfgVwt32GmjOrSYNxdrrzfwTqijPYekuXArv1Klmbb.', 'Rua Cantor Zeca Afonso, 635, 4 F', 213456789, 962673757, 'pedrobelchior75@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE IF NOT EXISTS `fornecedores` (
  `fornecedorID` int(10) unsigned NOT NULL,
  `nome` varchar(100) NOT NULL,
  `morada` varchar(100) NOT NULL,
  `nif` int(11) DEFAULT NULL,
  `iban` varchar(255) NOT NULL,
  `telefone` int(11) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`fornecedorID`),
  UNIQUE KEY `FornecedorID_UNIQUE` (`fornecedorID`),
  UNIQUE KEY `IBAN_UNIQUE` (`iban`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`fornecedorID`, `nome`, `morada`, `nif`, `iban`, `telefone`, `email`, `username`, `password`) VALUES
(1, 'Taxis Princesa', 'Frechas', 234156787, 'PT50-00000000000000000001', 278262215, 'taxisprincesa@gmail.com', 'princesa', '$2y$10$v0oaKZ6u6IIIZ9GVmyu8F.C6S/ncDVLT5ftOdRbTjEb7cVrUriPl2'),
(2, 'Taxis Tua', 'Mirandela', 234156784, 'PT50-00000000000000000002', 278262216, 'taxistua@gmail.com', 'tua', '$2y$10$MGldp3TKKjlrwThBnd8NZ.1XAAGKK5Muc2rijRGJtUOMbpy/.WFye');

-- --------------------------------------------------------

--
-- Estrutura da tabela `motoristas`
--

CREATE TABLE IF NOT EXISTS `motoristas` (
  `motoristaID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `morada` varchar(100) NOT NULL,
  `telemovel` int(11) NOT NULL,
  PRIMARY KEY (`motoristaID`),
  UNIQUE KEY `motoristaID_UNIQUE` (`motoristaID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `motoristas`
--

INSERT INTO `motoristas` (`motoristaID`, `nome`, `morada`, `telemovel`) VALUES
(1, 'Albino', 'Mirandela', 962235673),
(3, 'Ambrósio', 'Carvalhais', 912345678),
(5, 'Carlos Augusto', 'Vila Nova das Patas', 925555666);

-- --------------------------------------------------------

--
-- Estrutura da tabela `motorista_viatura`
--

CREATE TABLE IF NOT EXISTS `motorista_viatura` (
  `motoristaID` int(10) unsigned NOT NULL,
  `viaturaID` int(10) unsigned NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`motoristaID`,`viaturaID`,`data`),
  KEY `motorista_viatura_ibfk_2` (`viaturaID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `motorista_viatura`
--

INSERT INTO `motorista_viatura` (`motoristaID`, `viaturaID`, `data`) VALUES
(1, 1, '2016-02-01'),
(3, 1, '2016-02-02'),
(1, 3, '2016-02-02'),
(3, 3, '2016-02-01'),
(5, 5, '2016-02-01'),
(5, 5, '2016-02-02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE IF NOT EXISTS `servico` (
  `servicoID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `viaturaID` int(10) unsigned NOT NULL,
  `clienteID` int(10) unsigned NOT NULL,
  `custo` float NOT NULL,
  `avaliacao` int(11) DEFAULT NULL,
  `origem` varchar(45) NOT NULL,
  `destino` varchar(45) NOT NULL,
  `distancia` float NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`servicoID`),
  UNIQUE KEY `servicoID_UNIQUE` (`servicoID`),
  KEY `servico_ibfk_1` (`viaturaID`),
  KEY `servico_ibfk_2` (`clienteID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`servicoID`, `viaturaID`, `clienteID`, `custo`, `avaliacao`, `origem`, `destino`, `distancia`, `data`) VALUES
(1, 1, 18, 4.7, 5, 'Mirandela', 'Mirandela', 10, '2016-02-01'),
(2, 5, 20, 9.4, 3, 'Mirandela', 'Romeu', 20, '2016-02-01'),
(3, 5, 20, 9.4, 3, 'Mirandela', 'Romeu', 20, '2016-02-01'),
(4, 5, 22, 56.4, 4, 'Mirandela', 'Bragança', 120, '2016-02-02'),
(6, 5, 18, 51.7, 3, 'Mirandela', 'Vila Real', 110, '2016-02-02'),
(7, 3, 22, 18.8, 3, 'Mirandela', 'Veiga de Lila', 40, '2016-02-01'),
(9, 3, 22, 1.41, 4, 'Mirandela', 'Mirandela', 3, '2016-02-02'),
(10, 5, 26, 17.86, 4, 'Mirandela', 'Vale de Salgueiro', 38, '2016-02-01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `viatura`
--

CREATE TABLE IF NOT EXISTS `viatura` (
  `viaturaID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fornecedorID` int(10) unsigned NOT NULL,
  `matricula` varchar(8) NOT NULL,
  `modelo` varchar(45) NOT NULL,
  `marca` varchar(45) NOT NULL,
  `ano` int(11) NOT NULL,
  PRIMARY KEY (`viaturaID`),
  UNIQUE KEY `viaturaID_UNIQUE` (`viaturaID`),
  KEY `viatura_ibfk_1` (`fornecedorID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `viatura`
--

INSERT INTO `viatura` (`viaturaID`, `fornecedorID`, `matricula`, `modelo`, `marca`, `ano`) VALUES
(1, 1, '17-CC-88', 'E220 CDi', 'Mercedes-Benz', 2006),
(3, 1, '27-HO-00', 'Yaris', 'Toyota', 2015),
(5, 2, 'XM-27-86', '200D', 'Mercedes-Benz', 1991);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `motorista_viatura`
--
ALTER TABLE `motorista_viatura`
  ADD CONSTRAINT `motorista_viatura_ibfk_1` FOREIGN KEY (`motoristaID`) REFERENCES `motoristas` (`motoristaID`),
  ADD CONSTRAINT `motorista_viatura_ibfk_2` FOREIGN KEY (`viaturaID`) REFERENCES `viatura` (`viaturaID`);

--
-- Limitadores para a tabela `servico`
--
ALTER TABLE `servico`
  ADD CONSTRAINT `servico_ibfk_1` FOREIGN KEY (`viaturaID`) REFERENCES `viatura` (`viaturaID`),
  ADD CONSTRAINT `servico_ibfk_2` FOREIGN KEY (`clienteID`) REFERENCES `clientes` (`clienteID`);

--
-- Limitadores para a tabela `viatura`
--
ALTER TABLE `viatura`
  ADD CONSTRAINT `viatura_ibfk_1` FOREIGN KEY (`fornecedorID`) REFERENCES `fornecedores` (`fornecedorID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
