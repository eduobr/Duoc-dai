-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-04-2017 a las 02:05:11
-- Versión del servidor: 5.7.9
-- Versión de PHP: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cine`
--
CREATE SCHEMA IF NOT EXISTS `cine` ;
USE `cine` ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE IF NOT EXISTS `pelicula` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(30) NOT NULL,
  `genero` varchar(30) NOT NULL,
  `categoria` varchar(30) NOT NULL,
  `precio` int(11) NOT NULL,
  `boletos` int(11) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pelicula`
--
INSERT INTO `pelicula` (`codigo`, `titulo`, `genero`, `categoria`, `precio`, `boletos`) VALUES
(1, 'Logan', 'ciencia ficcion', 'Mayor de 14', 3500, 0),
(2, 'El cordero', 'drama', 'Mayor de 14', 3000, 0),
(3, 'el Fragmentado', 'suspenso', 'Mayor de 14', 3500, 0),
(4, 'Ghost in the Shell', 'accion', 'Todo Espectador', 2500, 0),
(5, 'Kong', 'accion', 'Todo Espectador', 2500, 0),
(6, 'La Bella y la Bestia', 'romance', 'Todo Espectador', 3000, 0),
(7, 'Life', 'suspenso', 'Todo Espectador', 2500, 0),
(8, 'lo que el viento se llevo', 'romance', 'Todo Espectador', 2500, 0),
(9, 'Power Rangers', 'accion', 'Todo Espectador', 2500, 0),
(10, 'Un Jefe en PaÃ±ales', 'comedia', 'Todo Espectador', 2500, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `rut` varchar(30) NOT NULL,
  `fono` varchar(30) NOT NULL,
  `sala` int(11) NOT NULL,
  `pelicula_codigo` int(11) NOT NULL,
  `adultos` int(11) NOT NULL,
  `ninos` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `pelicula_codigo` (`pelicula_codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
