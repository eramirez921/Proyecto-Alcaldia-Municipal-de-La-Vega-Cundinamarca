-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2017 at 10:21 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";/*valor sobre cero*/
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lavega`
--
CREATE DATABASE IF NOT EXISTS `lavega` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `lavega`;

-- --------------------------------------------------------

--
-- Table structure for table `libretadireccion`
--

CREATE TABLE `libretadireccion` (
  `idLibreta` int(11) NOT NULL COMMENT 'id de libreta',
  `nombre` varchar(50) DEFAULT NULL COMMENT 'nombre de visitante',
  `email` varchar(50) DEFAULT NULL COMMENT 'email de visitante',
  `asunto` varchar(100) DEFAULT NULL COMMENT 'asunto de visitante',
  `mensaje` varchar(500) DEFAULT NULL COMMENT 'mensaje de visitante'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='tabla para la libreta de direcciones';

--
-- Dumping data for table `libretadireccion`
--

INSERT INTO `libretadireccion` (`idLibreta`, `nombre`, `email`, `asunto`, `mensaje`) VALUES
(1, 'asdsa', 'asdfa@gmai.com', 'sadf', 'safd'),
(2, 'minobre', 'miemail@Qmail.com', 'elasunto', 'mimensaje'),
(3, 'unnombre', 'unemail@mail.com', 'unasunto', 'unmensaje');

-- --------------------------------------------------------

--
-- Table structure for table `sesion`
--

CREATE TABLE `sesion` (
  `idSes` int(11) NOT NULL COMMENT 'id de sesion',
  `idUsuario` int(11) NOT NULL COMMENT 'id de usuario',
  `fechaInicio` datetime NOT NULL COMMENT 'fecha de inicio de sesion',
  `fechaFin` datetime NOT NULL COMMENT 'fecha de fin de sesion',
  `estado` varchar(20) NOT NULL COMMENT 'estado actual de sesion'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='tabla para manejo de sesion';

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `identificacion` varchar(20) NOT NULL,
  `nombres` varchar(60) DEFAULT NULL,
  `apellidos` varchar(60) DEFAULT NULL,
  `edad` tinyint(4) DEFAULT NULL,
  `sexo` varchar(2) DEFAULT NULL,
  `login` varchar(20) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='tabla que almacena los usuario del sitio web';

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `identificacion`, `nombres`, `apellidos`, `edad`, `sexo`, `login`, `password`) VALUES
(1, '1010523652', 'pedro', 'perez', 25, 'M', 'pedro.perez', 'pedro.perez123'),
(4, '236', 'pep', 'perez', 25, 'M', 'pepitoprez', '1'),
(5, '10306842', '10306842@m.com', '10306842', NULL, NULL, '10306842', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `libretadireccion`
--
ALTER TABLE `libretadireccion`
  ADD PRIMARY KEY (`idLibreta`);

--
-- Indexes for table `sesion`
--
ALTER TABLE `sesion`
  ADD PRIMARY KEY (`idSes`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `IX_Usuario_identificacion_unico` (`identificacion`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `libretadireccion`
--
ALTER TABLE `libretadireccion`
  MODIFY `idLibreta` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de libreta', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sesion`
--
ALTER TABLE `sesion`
  MODIFY `idSes` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de sesion';

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
