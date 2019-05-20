-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 20-Maio-2019 às 19:47
-- Versão do servidor: 5.7.24
-- versão do PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teste`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamento`
--

DROP TABLE IF EXISTS `agendamento`;
CREATE TABLE IF NOT EXISTS `agendamento` (
  `agendamento_id` int(11) NOT NULL AUTO_INCREMENT,
  `data_atendimento` date NOT NULL,
  `agendamento_status` enum('realizado','cancelado','aguardando') NOT NULL,
  `agendamento_medico_id` int(11) NOT NULL,
  `agendamento_paciente_id` int(11) NOT NULL,
  PRIMARY KEY (`agendamento_id`),
  KEY `fk_medico_id` (`agendamento_medico_id`),
  KEY `fk_paciente_id` (`agendamento_paciente_id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `agendamento`
--

INSERT INTO `agendamento` (`agendamento_id`, `data_atendimento`, `agendamento_status`, `agendamento_medico_id`, `agendamento_paciente_id`) VALUES
(29, '2019-05-20', 'realizado', 33, 24),
(30, '2019-05-29', 'cancelado', 34, 24),
(23, '2019-05-29', 'realizado', 22, 18),
(21, '2019-05-31', 'aguardando', 26, 19),
(20, '2019-05-31', 'aguardando', 26, 19),
(31, '2019-05-21', 'realizado', 33, 24),
(18, '2019-05-22', 'aguardando', 27, 18),
(17, '2019-05-20', 'aguardando', 19, 22),
(32, '2019-05-20', 'realizado', 34, 25),
(33, '2019-05-30', 'realizado', 34, 25);

-- --------------------------------------------------------

--
-- Estrutura da tabela `medico`
--

DROP TABLE IF EXISTS `medico`;
CREATE TABLE IF NOT EXISTS `medico` (
  `medico_id` int(11) NOT NULL AUTO_INCREMENT,
  `medico_nome` varchar(100) NOT NULL,
  `medico_crm` int(11) NOT NULL,
  `medico_email` varchar(128) NOT NULL,
  `medico_especialidade` varchar(255) NOT NULL,
  PRIMARY KEY (`medico_id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `medico`
--

INSERT INTO `medico` (`medico_id`, `medico_nome`, `medico_crm`, `medico_email`, `medico_especialidade`) VALUES
(33, 'João Santos', 11, 'joao@hotmail.com', 'cer...'),
(34, 'Marcos', 1234, 'marcos@gmail.com', 'aaa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

DROP TABLE IF EXISTS `paciente`;
CREATE TABLE IF NOT EXISTS `paciente` (
  `paciente_id` int(11) NOT NULL AUTO_INCREMENT,
  `paciente_nome` varchar(100) NOT NULL,
  `paciente_sexo` varchar(1) NOT NULL,
  `paciente_idade` int(11) NOT NULL,
  `paciente_email` varchar(128) NOT NULL,
  PRIMARY KEY (`paciente_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `paciente`
--

INSERT INTO `paciente` (`paciente_id`, `paciente_nome`, `paciente_sexo`, `paciente_idade`, `paciente_email`) VALUES
(24, 'Dony', 'm', 12, 'dony@hotmail.com'),
(25, 'Andre', 'm', 32, 'andre.aa@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
