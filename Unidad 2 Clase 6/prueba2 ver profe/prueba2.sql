-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-05-2017 a las 15:56:54
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba2`
--
CREATE DATABASE IF NOT EXISTS `prueba2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `prueba2`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedidos`
--

CREATE TABLE `detalle_pedidos` (
  `idPRODUCTOS` int(11) NOT NULL,
  `idPEDIDOS` int(11) NOT NULL,
  `CANTIDAD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idPEDIDOS` int(11) NOT NULL,
  `TOTAL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idPRODUCTOS` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `precio` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idPRODUCTOS`, `descripcion`, `precio`, `stock`, `foto`) VALUES
(1, 'Aceite', 600, 25, 'aceite.jpg'),
(2, 'Azucar', 500, 14, 'azucar.jpg'),
(3, 'ron', 4500, 50, 'ron.jpg'),
(4, 'la dorada', 100, 300, 'dorada.jpg'),
(5, 'simio', 4500, 500, 'simio.jpg'),
(6, 'leche', 450, 23, 'leche.jpg'),
(7, 'leche con chocolate', 250, 100, 'lechechoco.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  ADD PRIMARY KEY (`idPRODUCTOS`,`idPEDIDOS`),
  ADD KEY `fk_PRODUCTOS_has_PEDIDOS_PEDIDOS1_idx` (`idPEDIDOS`),
  ADD KEY `fk_PRODUCTOS_has_PEDIDOS_PRODUCTOS_idx` (`idPRODUCTOS`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPEDIDOS`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idPRODUCTOS`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPEDIDOS` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idPRODUCTOS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  ADD CONSTRAINT `fk_PRODUCTOS_has_PEDIDOS_PEDIDOS1` FOREIGN KEY (`idPEDIDOS`) REFERENCES `pedidos` (`idPEDIDOS`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PRODUCTOS_has_PEDIDOS_PRODUCTOS` FOREIGN KEY (`idPRODUCTOS`) REFERENCES `productos` (`idPRODUCTOS`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
