-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 16, 2015 at 02:55 PM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `web1`
--

-- --------------------------------------------------------

--
-- Table structure for table `enquete`
--

CREATE TABLE IF NOT EXISTS `enquete` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(256) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `enquete`
--

INSERT INTO `enquete` (`id`, `titulo`, `id_usuario`) VALUES
(1, 'quaod', 0),
(2, 'PHP presta?', 0),
(3, 'Qual o melhor carro?', 0),
(4, 'Qual a sua opnião sobre a terceirizacao?', 0);

-- --------------------------------------------------------

--
-- Table structure for table `papel`
--

CREATE TABLE IF NOT EXISTS `papel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `papel`
--

INSERT INTO `papel` (`id`, `nome`) VALUES
(1, 'ADMIN'),
(2, 'ALUNO'),
(3, 'PROFESSOR'),
(4, 'teste');

-- --------------------------------------------------------

--
-- Table structure for table `pergunta`
--

CREATE TABLE IF NOT EXISTS `pergunta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `texto` varchar(256) NOT NULL,
  `votos` int(11) NOT NULL,
  `id_enquete` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `pergunta`
--

INSERT INTO `pergunta` (`id`, `texto`, `votos`, `id_enquete`) VALUES
(1, 'a', 1, 1),
(2, 'b', 0, 1),
(3, 'c', 0, 1),
(4, 'Sim', 2, 2),
(5, 'Não', 1, 2),
(6, 'fusca', 0, 3),
(7, '50tinha', 0, 3),
(8, 'chevet', 3, 3),
(9, 'kombi', 0, 3),
(10, 'Sou a favor', 1, 4),
(11, 'Sou contra', 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(256) NOT NULL,
  `senha` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `senha`) VALUES
(1, 'aquilesburlamaqui@gmail.com', '023b7a33126db4b6ea4035f767f4e07a'),
(2, 'joao@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'web1', '123456'),
(4, 'testemd5', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `usuario_papel`
--

CREATE TABLE IF NOT EXISTS `usuario_papel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_papel` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `usuario_papel`
--

INSERT INTO `usuario_papel` (`id`, `id_usuario`, `id_papel`) VALUES
(1, 1, 1),
(3, 2, 3),
(4, 1, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
