-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-05-2017 a las 16:57:02
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hr`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarUsuario` (IN `USUARIO` VARCHAR(45), IN `PASSWORD` VARCHAR(200))  BEGIN
 INSERT INTO USUARIOS VALUES(null,USUARIO,PASSWORD);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LLENAR_DEPTO` ()  BEGIN
    INSERT INTO DEPARTAMENTO VALUES(1,'CETECOM',1,NULL);
    INSERT INTO DEPARTAMENTO VALUES(2,'RRPP',1,NULL);
    INSERT INTO DEPARTAMENTO VALUES(3,'CAJA',1,NULL);
    INSERT INTO DEPARTAMENTO VALUES(4,'CONTABILIDAD',1,NULL);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LLENAR_PAIS` ()  BEGIN
    INSERT INTO PAIS VALUES(1,'CHILE',1);
    INSERT INTO PAIS VALUES(2,'ARGENTINA',1);
    INSERT INTO PAIS VALUES(3,'BRASIL',1);
    INSERT INTO PAIS VALUES(4,'FRANCIA',2);
    INSERT INTO PAIS VALUES(5,'ALEMANIA',2);
    INSERT INTO PAIS VALUES(6,'ESPA��A',2);
    INSERT INTO PAIS VALUES(7,'CHINA',3);
    INSERT INTO PAIS VALUES(8,'JAPON',3);
    INSERT INTO PAIS VALUES(9,'COREA DEL NORTE',3);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LLENAR_REGION` ()  BEGIN
    INSERT INTO REGION VALUES(1,'AMERICA');
    INSERT INTO REGION VALUES(2,'EUROPA');
    INSERT INTO REGION VALUES(3,'ASIA');
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LLENAR_TRABAJO` ()  BEGIN
    INSERT INTO TRABAJO VALUES(1,'PROGRAMADOR',100000,80000);
    INSERT INTO TRABAJO VALUES(2,'ANALISTA',400000,120000);
    INSERT INTO TRABAJO VALUES(3,'INGENIERO INF.',400000,1600000);
    INSERT INTO TRABAJO VALUES(4,'INGENIERO CIVIL INF.',900000,2800000);
    INSERT INTO TRABAJO VALUES(5,'BANANERO SIMIO',800000,1700000);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `departamento_id` int(11) NOT NULL,
  `nombre_departamento` varchar(45) DEFAULT NULL,
  `ubicacion_id` int(11) NOT NULL,
  `jefe_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`departamento_id`, `nombre_departamento`, `ubicacion_id`, `jefe_id`) VALUES
(1, 'CETECOM', 1, NULL),
(2, 'RRPP', 1, NULL),
(3, 'CAJA', 1, NULL),
(4, 'CONTABILIDAD', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `empleado_id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `e_mail` varchar(45) DEFAULT NULL,
  `fono` varchar(45) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `salario` int(11) DEFAULT NULL,
  `comision` float DEFAULT NULL,
  `jefe_id` int(11) DEFAULT NULL,
  `departamento_id` int(11) NOT NULL,
  `trabajo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`empleado_id`, `nombre`, `apellido`, `e_mail`, `fono`, `fecha_ingreso`, `salario`, `comision`, `jefe_id`, `departamento_id`, `trabajo_id`) VALUES
(1, 'ELESEO', 'CHANGO', 'ECHANGO@BANANA.CL', '22', '2016-01-01', 50000, 0, NULL, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historia_trabajador`
--

CREATE TABLE `historia_trabajador` (
  `fecha_inicio` date NOT NULL,
  `fecha_termino` date DEFAULT NULL,
  `departamento_id` int(11) NOT NULL,
  `empleado_id` int(11) NOT NULL,
  `trabajo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `pais_id` int(11) NOT NULL,
  `nombre_pais` varchar(45) DEFAULT NULL,
  `region_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`pais_id`, `nombre_pais`, `region_id`) VALUES
(1, 'CHILE', 1),
(2, 'ARGENTINA', 1),
(3, 'BRASIL', 1),
(4, 'FRANCIA', 2),
(5, 'ALEMANIA', 2),
(6, 'ESPAÑA', 2),
(7, 'CHINA', 3),
(8, 'JAPON', 3),
(9, 'COREA DEL NORTE', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `region`
--

CREATE TABLE `region` (
  `region_id` int(11) NOT NULL,
  `nombre_region` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `region`
--

INSERT INTO `region` (`region_id`, `nombre_region`) VALUES
(1, 'AMERICA'),
(2, 'EUROPA'),
(3, 'ASIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajo`
--

CREATE TABLE `trabajo` (
  `trabajo_id` int(11) NOT NULL,
  `titulo_trabajo` varchar(45) DEFAULT NULL,
  `salario_minimo` int(11) DEFAULT NULL,
  `salario_maximo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `trabajo`
--

INSERT INTO `trabajo` (`trabajo_id`, `titulo_trabajo`, `salario_minimo`, `salario_maximo`) VALUES
(1, 'PROGRAMADOR', 100000, 80000),
(2, 'ANALISTA', 400000, 120000),
(3, 'INGENIERO INF.', 400000, 1600000),
(4, 'INGENIERO CIVIL INF.', 900000, 2800000),
(5, 'BANANERO SIMIO', 800000, 1700000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE `ubicacion` (
  `ubicacion_id` int(11) NOT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `codigo_postal` varchar(45) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `provincia` varchar(45) DEFAULT NULL,
  `pais_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ubicacion`
--

INSERT INTO `ubicacion` (`ubicacion_id`, `direccion`, `codigo_postal`, `ciudad`, `provincia`, `pais_id`) VALUES
(1, 'AV. ACME', '123456', 'SANTIAGO', 'RM', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUSUARIOS` int(11) NOT NULL,
  `user` varchar(45) DEFAULT NULL,
  `pass` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUSUARIOS`, `user`, `pass`) VALUES
(1, 'juan', 'asd'),
(2, 'Tody', '$2y$10$48tmnm3QFRof3j4DzpIUq.Pp7hr1B3e7NODe48tixM6lC0V78Xexi'),
(3, 'tomatody', '$2y$10$pyEl7cSIv49AsUMGXr8wxuRHuQ2Fr4dClMionaexGtHXUph47MqVO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`departamento_id`),
  ADD KEY `fk_DEPARTAMENTO_UBICACION1_idx` (`ubicacion_id`),
  ADD KEY `fk_DEPARTAMENTO_EMPLEADOS1_idx` (`jefe_id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`empleado_id`),
  ADD KEY `fk_EMPLEADOS_EMPLEADOS1_idx` (`jefe_id`),
  ADD KEY `fk_EMPLEADOS_DEPARTAMENTO1_idx` (`departamento_id`),
  ADD KEY `fk_EMPLEADOS_TRABAJO1_idx` (`trabajo_id`);

--
-- Indices de la tabla `historia_trabajador`
--
ALTER TABLE `historia_trabajador`
  ADD PRIMARY KEY (`fecha_inicio`,`empleado_id`),
  ADD KEY `fk_HISTORIA_TRABAJADOR_DEPARTAMENTO1_idx` (`departamento_id`),
  ADD KEY `fk_HISTORIA_TRABAJADOR_EMPLEADOS1_idx` (`empleado_id`),
  ADD KEY `fk_HISTORIA_TRABAJADOR_TRABAJO1_idx` (`trabajo_id`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`pais_id`),
  ADD KEY `fk_PAIS_REGION_idx` (`region_id`);

--
-- Indices de la tabla `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`region_id`);

--
-- Indices de la tabla `trabajo`
--
ALTER TABLE `trabajo`
  ADD PRIMARY KEY (`trabajo_id`);

--
-- Indices de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`ubicacion_id`),
  ADD KEY `fk_UBICACION_PAIS1_idx` (`pais_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUSUARIOS`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUSUARIOS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `fk_DEPARTAMENTO_EMPLEADOS1` FOREIGN KEY (`jefe_id`) REFERENCES `empleados` (`empleado_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DEPARTAMENTO_UBICACION1` FOREIGN KEY (`ubicacion_id`) REFERENCES `ubicacion` (`ubicacion_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `fk_EMPLEADOS_DEPARTAMENTO1` FOREIGN KEY (`departamento_id`) REFERENCES `departamento` (`departamento_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_EMPLEADOS_EMPLEADOS1` FOREIGN KEY (`jefe_id`) REFERENCES `empleados` (`empleado_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_EMPLEADOS_TRABAJO1` FOREIGN KEY (`trabajo_id`) REFERENCES `trabajo` (`trabajo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `historia_trabajador`
--
ALTER TABLE `historia_trabajador`
  ADD CONSTRAINT `fk_HISTORIA_TRABAJADOR_DEPARTAMENTO1` FOREIGN KEY (`departamento_id`) REFERENCES `departamento` (`departamento_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_HISTORIA_TRABAJADOR_EMPLEADOS1` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`empleado_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_HISTORIA_TRABAJADOR_TRABAJO1` FOREIGN KEY (`trabajo_id`) REFERENCES `trabajo` (`trabajo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pais`
--
ALTER TABLE `pais`
  ADD CONSTRAINT `fk_PAIS_REGION` FOREIGN KEY (`region_id`) REFERENCES `region` (`region_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD CONSTRAINT `fk_UBICACION_PAIS1` FOREIGN KEY (`pais_id`) REFERENCES `pais` (`pais_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
