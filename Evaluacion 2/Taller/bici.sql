-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2017 a las 03:27:19
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bici`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Agregar_Articulo` (IN `Nombre` VARCHAR(45), IN `Precio` INT(11), IN `Stock` INT(11), IN `Marca` VARCHAR(45), IN `Descripcion` VARCHAR(45), IN `Foto` VARCHAR(1000), IN `Tipo` VARCHAR(45))  BEGIN 
    INSERT INTO articulo VALUES(null,Nombre,Precio,Stock,Marca,Descripcion,Foto,Tipo);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Agregar_Articulo2` (IN `Nombre` VARCHAR(45), IN `Precio` INT(11), IN `Stock` INT(11), IN `Marca` VARCHAR(45), IN `Descripcion` VARCHAR(45), IN `Foto` VARCHAR(1000))  BEGIN 
    INSERT INTO articulo VALUES(null,Nombre,Precio,Stock,Marca,Descripcion,Foto);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Agregar_Articulo3` (IN `Nombre` VARCHAR(45), IN `Precio` INT(11), IN `Stock` INT(11), IN `Marca` VARCHAR(45), IN `Descripcion` VARCHAR(45), IN `Foto` VARCHAR(1000), IN `Tipo` VARCHAR(45))  BEGIN 
    INSERT INTO articulo VALUES(null,Nombre,Precio,Stock,Marca,Descripcion,Foto);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Agregar_Articulo4` (IN `Nombre` VARCHAR(45), IN `Precio` INT(11), IN `Stock` INT(11), IN `Marca` VARCHAR(45), IN `Descripcion` VARCHAR(45), IN `Foto` VARCHAR(1000), IN `Tipo` VARCHAR(45))  BEGIN 
    INSERT INTO articulo VALUES(null,Nombre,Precio,Stock,Marca,Descripcion,Foto,Tipo);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `idArticulo` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Precio` int(11) NOT NULL,
  `Stock` int(11) NOT NULL,
  `Marca` varchar(45) NOT NULL,
  `Descripcion` varchar(45) NOT NULL,
  `Foto` varchar(1000) NOT NULL,
  `Tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`idArticulo`, `Nombre`, `Precio`, `Stock`, `Marca`, `Descripcion`, `Foto`, `Tipo`) VALUES
(1, 'Asiento Negro-Rojo', 15900, 3, 'END', 'Asiento General', 'Asiento Negro-Rojo $15.900', 'Asiento'),
(2, 'Asiento Bontrager Community Dama', 24990, 3, 'WSD', 'Asiento Para Dama', 'Asiento Bontrager Community Dama WSD $24.990', 'Asiento'),
(3, 'Asiento Negro-Verde', 15000, 3, 'END', 'Asiento General', 'Asiento Negro-Verde $15.000', 'Asiento'),
(4, 'Bombin Beto', 5590, 3, 'Beto', 'Bombin General', 'Bombin Beto $5.590', 'Bombin'),
(5, 'Bombin Beto', 3800, 3, 'Beto', 'Bombin de Resina', 'Bombin beto resina $3.800', 'Bombin'),
(6, 'Candado Onguard Bulldog Combo', 21800, 3, 'Onguard', 'Candado General', 'Candado Onguard Bulldog Combo $21.800', 'Candado'),
(7, 'Candado Onguard Bulldog', 19800, 3, 'Onguard', 'Candado General', 'Candado Onguard Bulldog LS $19.800', 'Candado'),
(8, 'Juego de Luces Negro 2 LED', 2500, 3, 'END', 'Luces General', 'Juego de Luces Negro 2 LED $2.500', 'Luz'),
(9, 'Juego de Luces Rojo 2 LED ', 2500, 3, 'END', 'Luces General', 'Juego de Luces Rojo 2 LED $2.500', 'Luz'),
(10, 'Luz Modelo RL30', 63400, 3, 'END', 'Luz Delantera', 'Luz Modelo RL30 $63.400', 'Luz'),
(11, 'Porta Massload lateral', 4900, 3, 'Massload', 'PortaBotella', 'Porta Massload lateral $4.900', 'Botella'),
(12, 'Botella TREK', 2500, 3, 'TREK', 'Botella General', 'botellatrekt1-300x300', 'Botella'),
(13, 'Juego de Luces QLite', 9990, 3, 'QLite', 'Luces General', 'juego de Luces QLite $9.990', 'Luz'),
(14, 'porta Massload Negro Basico', 4900, 3, 'Massload', 'PortaBotella General', 'porta Massload Negro Basico $4.900', 'Botella'),
(29, 'Bicicleta MTB Enduro Remedy 9.8 2017', 4490000, 3, 'Trek', 'Bicicleta de Montaña', 'mb1-marlin_4_azul_29_3', 'Bicicleta'),
(30, 'Bicicleta MTB Natron 2017', 249990, 3, 'Altitude', 'Bicicleta de Montaña', 'mb2-natronamarillo2', 'Bicicleta'),
(31, 'Bicicleta Urbana Electra Sugar Skull', 589900, 3, '3i Lady', 'Bicicleta Urbana', 'pa1-167139_sugar_skulls', 'Bicicleta'),
(32, 'Bicicleta Urbana Electra Karma', 449900, 3, '3i Lady', 'Bicicleta Urbana', 'pa2-8466350215594_1_1_1', 'Bicicleta'),
(33, 'Bicicleta Ruta Domane ARL 4 2017', 1290000, 3, 'Trek', 'Bicicleta de Carretera', 'r1-ane_alr_4_rojo1', 'Bicicleta'),
(34, 'Bicicleta Ciclocross Crockett 5 Disc 2018', 1590000, 3, 'Trek', 'Bicicleta de Carretera', 'r2-crockett_5_disc1', 'Bicicleta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo_has_compra`
--

CREATE TABLE `articulo_has_compra` (
  `Articulo_idArticulo` int(11) NOT NULL,
  `Compra_idCompra` int(11) NOT NULL,
  `Compra_Usuario_idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo_venta_usuario`
--

CREATE TABLE `articulo_venta_usuario` (
  `idVenta_Usuario` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Descripcion` varchar(1000) NOT NULL,
  `Precio` int(11) NOT NULL,
  `Foto` varchar(1000) NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  `Usuario_idUsuario1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boleta`
--

CREATE TABLE `boleta` (
  `Cantidad` int(11) NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  `Compra_idCompra` int(11) NOT NULL,
  `Compra_Usuario_idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `idCompra` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  `Usuario_idUsuario1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra_usuario`
--

CREATE TABLE `compra_usuario` (
  `idCompra_Usuario` int(11) NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  `Usuario_idUsuario1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion`
--

CREATE TABLE `cotizacion` (
  `idCotizacion` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `Mail` varchar(45) NOT NULL,
  ` Descripcion` varchar(500) NOT NULL,
  `Fecha` date NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  `Empleado_Rut` varchar(12) NOT NULL,
  `Empleado_idEmpleado` int(11) NOT NULL,
  `Usuario_idUsuario1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion_has_articulo`
--

CREATE TABLE `cotizacion_has_articulo` (
  `Cotizacion_idCotizacion` int(11) NOT NULL,
  `Cotizacion_Usuario_idUsuario` int(11) NOT NULL,
  `Cotizacion_Empleado_Rut` varchar(12) NOT NULL,
  `Articulo_idArticulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra_usuario`
--

CREATE TABLE `detalle_compra_usuario` (
  `idCompra_Usuario` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idArticulo_Venta_Usuario` int(11) NOT NULL,
  `idUsuario2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `idEmpleado` int(11) NOT NULL,
  `Rut` varchar(12) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `Edad` int(11) NOT NULL,
  `Sexo` varchar(1) NOT NULL,
  `Sueldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idEmpleado`, `Rut`, `Nombre`, `Apellido`, `Edad`, `Sexo`, `Sueldo`) VALUES
(1, '1222222', 'Alvaro', 'Silva', 21, 'M', 120000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foro`
--

CREATE TABLE `foro` (
  `idForo` int(11) NOT NULL,
  `Usuario` varchar(45) NOT NULL,
  `Titulo` varchar(45) NOT NULL,
  `Descripcion` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `foro`
--

INSERT INTO `foro` (`idForo`, `Usuario`, `Titulo`, `Descripcion`) VALUES
(1, 'Alvaro', 'Prueba', 'QUE PAZA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE `respuesta` (
  `idRespuesta` int(11) NOT NULL,
  `Usuario` varchar(45) DEFAULT NULL,
  `Respeusta` varchar(45) NOT NULL,
  `Foro_idForo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `Usuario` varchar(45) NOT NULL,
  `Password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `Usuario`, `Password`) VALUES
(1, 'root', '123'),
(2, '', '1234'),
(3, '', '1234'),
(4, 'Alvaro', '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`idArticulo`);

--
-- Indices de la tabla `articulo_has_compra`
--
ALTER TABLE `articulo_has_compra`
  ADD PRIMARY KEY (`Articulo_idArticulo`,`Compra_idCompra`,`Compra_Usuario_idUsuario`),
  ADD KEY `fk_Articulo_has_Compra_Compra1_idx` (`Compra_idCompra`,`Compra_Usuario_idUsuario`),
  ADD KEY `fk_Articulo_has_Compra_Articulo1_idx` (`Articulo_idArticulo`);

--
-- Indices de la tabla `articulo_venta_usuario`
--
ALTER TABLE `articulo_venta_usuario`
  ADD PRIMARY KEY (`idVenta_Usuario`,`Usuario_idUsuario`),
  ADD KEY `fk_Articulo_Venta_Usuario_Usuario1_idx` (`Usuario_idUsuario1`);

--
-- Indices de la tabla `boleta`
--
ALTER TABLE `boleta`
  ADD KEY `fk_Boleta_Usuario2_idx` (`Usuario_idUsuario`),
  ADD KEY `fk_Boleta_Compra2_idx` (`Compra_idCompra`,`Compra_Usuario_idUsuario`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`idCompra`,`Usuario_idUsuario`),
  ADD KEY `fk_Compra_Usuario2_idx` (`Usuario_idUsuario1`);

--
-- Indices de la tabla `compra_usuario`
--
ALTER TABLE `compra_usuario`
  ADD PRIMARY KEY (`idCompra_Usuario`,`Usuario_idUsuario`),
  ADD KEY `fk_Compra_Usuario_Usuario1_idx` (`Usuario_idUsuario1`);

--
-- Indices de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD PRIMARY KEY (`idCotizacion`,`Usuario_idUsuario`,`Empleado_Rut`),
  ADD KEY `fk_Cotizacion_Empleado1_idx` (`Empleado_idEmpleado`),
  ADD KEY `fk_Cotizacion_Usuario1_idx` (`Usuario_idUsuario1`);

--
-- Indices de la tabla `cotizacion_has_articulo`
--
ALTER TABLE `cotizacion_has_articulo`
  ADD PRIMARY KEY (`Cotizacion_idCotizacion`,`Cotizacion_Usuario_idUsuario`,`Cotizacion_Empleado_Rut`,`Articulo_idArticulo`),
  ADD KEY `fk_Cotizacion_has_Articulo_Articulo1_idx` (`Articulo_idArticulo`),
  ADD KEY `fk_Cotizacion_has_Articulo_Cotizacion1_idx` (`Cotizacion_idCotizacion`,`Cotizacion_Usuario_idUsuario`,`Cotizacion_Empleado_Rut`);

--
-- Indices de la tabla `detalle_compra_usuario`
--
ALTER TABLE `detalle_compra_usuario`
  ADD PRIMARY KEY (`idCompra_Usuario`,`idUsuario`,`idArticulo_Venta_Usuario`,`idUsuario2`),
  ADD KEY `fk_Compra_Usuario_has_Articulo_Venta_Usuario_Articulo_Venta_idx` (`idArticulo_Venta_Usuario`,`idUsuario2`),
  ADD KEY `fk_Compra_Usuario_has_Articulo_Venta_Usuario_Compra_Usuario_idx` (`idCompra_Usuario`,`idUsuario`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idEmpleado`);

--
-- Indices de la tabla `foro`
--
ALTER TABLE `foro`
  ADD PRIMARY KEY (`idForo`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`idRespuesta`),
  ADD KEY `fk_Respuesta_Foro1_idx` (`Foro_idForo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `idArticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `foro`
--
ALTER TABLE `foro`
  MODIFY `idForo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo_has_compra`
--
ALTER TABLE `articulo_has_compra`
  ADD CONSTRAINT `fk_Articulo_has_Compra_Articulo1` FOREIGN KEY (`Articulo_idArticulo`) REFERENCES `articulo` (`idArticulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Articulo_has_Compra_Compra1` FOREIGN KEY (`Compra_idCompra`,`Compra_Usuario_idUsuario`) REFERENCES `compra` (`idCompra`, `Usuario_idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `articulo_venta_usuario`
--
ALTER TABLE `articulo_venta_usuario`
  ADD CONSTRAINT `fk_Articulo_Venta_Usuario_Usuario1` FOREIGN KEY (`Usuario_idUsuario1`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `boleta`
--
ALTER TABLE `boleta`
  ADD CONSTRAINT `fk_Boleta_Compra2` FOREIGN KEY (`Compra_idCompra`,`Compra_Usuario_idUsuario`) REFERENCES `compra` (`idCompra`, `Usuario_idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Boleta_Usuario2` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `fk_Compra_Usuario2` FOREIGN KEY (`Usuario_idUsuario1`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `compra_usuario`
--
ALTER TABLE `compra_usuario`
  ADD CONSTRAINT `fk_Compra_Usuario_Usuario1` FOREIGN KEY (`Usuario_idUsuario1`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD CONSTRAINT `fk_Cotizacion_Empleado1` FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Cotizacion_Usuario1` FOREIGN KEY (`Usuario_idUsuario1`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cotizacion_has_articulo`
--
ALTER TABLE `cotizacion_has_articulo`
  ADD CONSTRAINT `fk_Cotizacion_has_Articulo_Articulo1` FOREIGN KEY (`Articulo_idArticulo`) REFERENCES `articulo` (`idArticulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Cotizacion_has_Articulo_Cotizacion1` FOREIGN KEY (`Cotizacion_idCotizacion`,`Cotizacion_Usuario_idUsuario`,`Cotizacion_Empleado_Rut`) REFERENCES `cotizacion` (`idCotizacion`, `Usuario_idUsuario`, `Empleado_Rut`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_compra_usuario`
--
ALTER TABLE `detalle_compra_usuario`
  ADD CONSTRAINT `fk_Compra_Usuario_has_Articulo_Venta_Usuario_Articulo_Venta_U1` FOREIGN KEY (`idArticulo_Venta_Usuario`,`idUsuario2`) REFERENCES `articulo_venta_usuario` (`idVenta_Usuario`, `Usuario_idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Compra_Usuario_has_Articulo_Venta_Usuario_Compra_Usuario1` FOREIGN KEY (`idCompra_Usuario`,`idUsuario`) REFERENCES `compra_usuario` (`idCompra_Usuario`, `Usuario_idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `fk_Respuesta_Foro1` FOREIGN KEY (`Foro_idForo`) REFERENCES `foro` (`idForo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
