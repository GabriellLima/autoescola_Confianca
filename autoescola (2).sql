-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.24-log
-- Versão do PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `autoescola`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE IF NOT EXISTS `aluno` (
  `cod_aluno` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `nascimento` date NOT NULL,
  `cpf` int(10) unsigned NOT NULL,
  `TELEFONE` int(10) unsigned DEFAULT NULL,
  `ENDERECO` varchar(500) DEFAULT NULL,
  `TURNO` varchar(20) NOT NULL,
  `SITUACAO` varchar(20) NOT NULL,
  `categoria` varchar(10) NOT NULL,
  PRIMARY KEY (`cod_aluno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`cod_aluno`, `nome`, `nascimento`, `cpf`, `TELEFONE`, `ENDERECO`, `TURNO`, `SITUACAO`, `categoria`) VALUES
(1, 'Ingrid Pinheiro', '1996-02-25', 4294967295, 33445566, 'Alto de Coutos', 'Matutino', 'Em aula', 'A'),
(2, 'teste', '2015-12-19', 1234456, NULL, 'sei la', 'vespertino', 'em_aula', 'A'),
(3, 'Ingrid Souza', '2015-12-23', 4294967295, NULL, 'Ruua', 'Vespertino', 'aprovado', 'D'),
(4, 'Rodrigo', '2015-12-23', 4294967295, NULL, 'CAsa', 'Vespertino', 'aprovado', 'C');

-- --------------------------------------------------------

--
-- Estrutura da tabela `instrutor`
--

CREATE TABLE IF NOT EXISTS `instrutor` (
  `cod_instrutor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) DEFAULT NULL,
  `cpf` int(10) unsigned DEFAULT NULL,
  `TELEFONE` int(10) unsigned DEFAULT NULL,
  `NASCIMENTO` date DEFAULT NULL,
  `endereco` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`cod_instrutor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `instrutor`
--

INSERT INTO `instrutor` (`cod_instrutor`, `nome`, `cpf`, `TELEFONE`, `NASCIMENTO`, `endereco`) VALUES
(4, 'Gabriel Lima', 4294967295, 4294967295, '2015-12-16', 'Avenida Sete'),
(5, 'Jaum', 666, 4294967295, '2015-12-16', 'Rua Chile');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE IF NOT EXISTS `turma` (
  `cod_turma` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `instrutor_cod_instrutor` int(10) unsigned NOT NULL,
  `aluno_cod_aluno` int(10) unsigned NOT NULL,
  `situacao` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`cod_turma`),
  KEY `turma_FKIndex1` (`aluno_cod_aluno`),
  KEY `turma_FKIndex2` (`instrutor_cod_instrutor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`cod_turma`, `instrutor_cod_instrutor`, `aluno_cod_aluno`, `situacao`) VALUES
(1, 4, 1, 'concluido'),
(2, 5, 2, 'em_andamento');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `cod_usuario` int(10) unsigned NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(15) NOT NULL,
  PRIMARY KEY (`cod_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`cod_usuario`, `login`, `senha`) VALUES
(0, 'jessica', '1234'),
(1, 'gabriel', '1234'),
(2, 'ingrid', '1234');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculo`
--

CREATE TABLE IF NOT EXISTS `veiculo` (
  `cod_veiculo` int(11) NOT NULL AUTO_INCREMENT,
  `placa` varchar(8) NOT NULL,
  PRIMARY KEY (`cod_veiculo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `veiculo`
--

INSERT INTO `veiculo` (`cod_veiculo`, `placa`) VALUES
(1, 'PJB-3127');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
