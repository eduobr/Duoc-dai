-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-07-2017 a las 22:35:53
-- Versión del servidor: 5.7.9
-- Versión de PHP: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `examen`
--

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `depedirPersona`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `depedirPersona` (IN `USUARIO` INT, IN `RUTABOGADO` INT, IN `OPCION` INT)  BEGIN
    IF(OPCION=1) THEN
      UPDATE USUARIO SET ACTIVO='NO' WHERE USER=USUARIO;
    ELSE
     UPDATE ABOGADO SET ACTIVO='NO' WHERE RUT=RUTABOGADO;
    END IF;
END$$

DROP PROCEDURE IF EXISTS `despedirPersona`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `despedirPersona` (IN `USUARIO` VARCHAR(45), IN `RUTABOGADO` VARCHAR(12), IN `OPCION` INT)  BEGIN
    IF(OPCION=1) THEN
      UPDATE USUARIO SET ACTIVO='NO' WHERE USER=USUARIO;
    ELSE
     UPDATE ABOGADO SET ACTIVO='NO' WHERE RUT=RUTABOGADO;
    END IF;
END$$

DROP PROCEDURE IF EXISTS `estadisticasAtenciones`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `estadisticasAtenciones` (IN `OPCION` INT, IN `fec1` DATE, IN `fec2` DATE)  BEGIN
  IF(OPCION=1)THEN
    SELECT CONCAT(ab.nombre,' ',ab.apellidoP,' ',ab.apellidoM),COUNT(a.ABOGADO_RUT) AS ATENCIONES FROM ATENCION a JOIN ABOGADO ab ON a.ABOGADO_RUT = ab.RUT WHERE FECHA BETWEEN fec1 AND fec2 GROUP BY abogado_rut;
  ELSEIF(OPCION=2) THEN
    SELECT MONTHNAME(FECHA) AS MES ,COUNT(idAtencion)FROM ATENCION GROUP BY MES;
  ELSEIF(OPCION=3) THEN
    SELECT ab.ESPECIALIDAD,COUNT(a.ABOGADO_RUT) FROM ATENCION a JOIN ABOGADO ab ON a.ABOGADO_RUT = ab.RUT GROUP BY ab.especialidad;
  ELSEIF(OPCION=4) THEN
    SELECT CONCAT(ab.nombre,' ',ab.apellidoP,' ',ab.apellidoM),COUNT(a.ABOGADO_RUT) FROM ATENCION a JOIN ABOGADO ab ON a.ABOGADO_RUT = ab.RUT GROUP BY a.abogado_rut;
  ELSEIF(OPCION=5) THEN
    SELECT ESTADO,COUNT(ABOGADO_RUT) FROM ATENCION GROUP BY ESTADO;
  END IF;
END$$

DROP PROCEDURE IF EXISTS `estadisticasClientes`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `estadisticasClientes` (IN `OPCION` INT)  BEGIN
  IF(OPCION=1)THEN
   SELECT CONCAT(NOMBRE,' ',APELLIDOP,' ',APELLIDOM),TIMESTAMPDIFF(MONTH, FECINCORPORACION, NOW()) FROM CLIENTE GROUP BY NOMBRE;
  ELSEIF(OPCION=2) THEN
   SELECT TIPOPERSONA,COUNT(*) FROM CLIENTE GROUP BY TIPOPERSONA;
  ELSEIF(OPCION=3) THEN
   SELECT CONCAT(NOMBRE,' ',APELLIDOP,' ',APELLIDOM),COUNT(a.IDATENCION) FROM CLIENTE c LEFT OUTER JOIN ATENCION a ON(c.RUT=a.CLIENTE_RUT) GROUP BY NOMBRE;
  END IF;
END$$

DROP PROCEDURE IF EXISTS `insertarAtencion`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarAtencion` (IN `RUTCLI` VARCHAR(45), IN `RUTABO` VARCHAR(45), IN `FECHA` DATETIME, IN `ESTADO` VARCHAR(45))  BEGIN
  INSERT INTO ATENCION VALUES(NULL,RUTCLI,RUTABO,FECHA,ESTADO);
END$$

DROP PROCEDURE IF EXISTS `insertarPersona`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarPersona` (IN `USUARIO` VARCHAR(45), IN `PASS` VARCHAR(255), IN `RUT` VARCHAR(12), IN `NOMBRE` VARCHAR(45), IN `APELLIDOP` VARCHAR(45), IN `APELLIDOM` VARCHAR(45), IN `TIPOPERSONA` VARCHAR(45), IN `DIRECCION` VARCHAR(255), IN `TELEFONO` VARCHAR(45), IN `ESPECIALIDAD` VARCHAR(45), IN `VALORHORA` INT, IN `OPCION` INT)  BEGIN
    IF(OPCION=1) THEN
      INSERT INTO USUARIO VALUES(USUARIO,PASS,'Cliente','SI');
      INSERT INTO CLIENTE VALUES(RUT,NOMBRE,APELLIDOP,APELLIDOM,NOW(),DIRECCION,TIPOPERSONA,TELEFONO,USUARIO);
    ELSE
     INSERT INTO ABOGADO VALUES(RUT,NOMBRE,APELLIDOP,APELLIDOM,NOW(),ESPECIALIDAD,VALORHORA,'SI');
    END IF;
END$$

DROP PROCEDURE IF EXISTS `listarAbogados`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `listarAbogados` ()  BEGIN
  SELECT RUT,CONCAT(NOMBRE,' ',APELLIDOP,' ',APELLIDOM),DATE_FORMAT(FECCONTRATACION,'%d-%m-%Y'),ESPECIALIDAD,VALORHORA,ACTIVO
        FROM ABOGADO;
END$$

DROP PROCEDURE IF EXISTS `listarAtenciones`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `listarAtenciones` ()  BEGIN
  SELECT a.CLIENTE_RUT,CONCAT(c.NOMBRE,' ',c.APELLIDOP,' ',c.APELLIDOM),
       a.ABOGADO_RUT,CONCAT(ab.NOMBRE,' ',ab.APELLIDOP,' ',ab.APELLIDOM),DATE_FORMAT(a.FECHA,'%d-%m-%Y %H:%i'),a.ESTADO,a.IDATENCION
       FROM ATENCION a JOIN CLIENTE c ON a.CLIENTE_RUT = c.RUT JOIN ABOGADO ab ON a.ABOGADO_RUT = ab.RUT ORDER BY a.FECHA DESC;
END$$

DROP PROCEDURE IF EXISTS `listarClientes`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `listarClientes` ()  BEGIN
  SELECT c.RUT,CONCAT(c.NOMBRE,' ',c.APELLIDOP,' ',c.APELLIDOM),DATE_FORMAT(c.FECINCORPORACION,'%d-%m-%Y'),c.TIPOPERSONA,c.DIRECCION,
       c.TELEFONO,c.USUARIOS_USER,u.ACTIVO FROM CLIENTE c JOIN USUARIO u ON c.usuarios_user=u.user;
END$$

DROP PROCEDURE IF EXISTS `validarUsuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `validarUsuario` (IN `USUARIO` VARCHAR(45), IN `PASS` VARCHAR(255))  BEGIN
    SELECT * FROM USUARIO WHERE USER=USUARIO AND PASSWORD=PASS;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abogado`
--

DROP TABLE IF EXISTS `abogado`;
CREATE TABLE IF NOT EXISTS `abogado` (
  `rut` varchar(12) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidoP` varchar(45) NOT NULL,
  `apellidoM` varchar(45) NOT NULL,
  `fecContratacion` date NOT NULL,
  `especialidad` varchar(45) NOT NULL,
  `valorHora` int(11) NOT NULL,
  `activo` varchar(2) NOT NULL,
  PRIMARY KEY (`rut`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `abogado`
--

INSERT INTO `abogado` (`rut`, `nombre`, `apellidoP`, `apellidoM`, `fecContratacion`, `especialidad`, `valorHora`, `activo`) VALUES
('15913553', 'Zolomeo', 'Paredes', 'Rojas', '2017-07-10', 'Adopciones', 3000, 'SI'),
('16679102', 'Eddy', 'Ficio', 'Botado', '2017-07-10', 'Accidentes de trafico', 6000, 'SI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atencion`
--

DROP TABLE IF EXISTS `atencion`;
CREATE TABLE IF NOT EXISTS `atencion` (
  `idAtencion` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_rut` varchar(12) NOT NULL,
  `abogado_rut` varchar(12) NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` varchar(45) NOT NULL,
  PRIMARY KEY (`idAtencion`,`cliente_rut`,`abogado_rut`),
  KEY `fk_cliente_has_abogado_abogado1_idx` (`abogado_rut`),
  KEY `fk_cliente_has_abogado_cliente1_idx` (`cliente_rut`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `atencion`
--

INSERT INTO `atencion` (`idAtencion`, `cliente_rut`, `abogado_rut`, `fecha`, `estado`) VALUES
(28, '20696467', '15913553', '2017-07-12 12:00:00', 'Agendada'),
(29, '9464447', '16679102', '2017-07-13 15:00:00', 'Agendada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `rut` varchar(12) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidoP` varchar(45) NOT NULL,
  `apellidoM` varchar(45) NOT NULL,
  `fecIncorporacion` date NOT NULL,
  `tipoPersona` varchar(45) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `usuarios_user` varchar(45) NOT NULL,
  PRIMARY KEY (`rut`),
  KEY `fk_cliente_usuarios_idx` (`usuarios_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`rut`, `nombre`, `apellidoP`, `apellidoM`, `fecIncorporacion`, `tipoPersona`, `direccion`, `telefono`, `usuarios_user`) VALUES
('20696467', 'Elza', 'Patito', 'PequeÃ±o', '2017-07-10', 'Natural', 'jybT/T592X7ckiGBB2jSI9N4U/C0lAy4BUlVkU+H1AA=', '921876312', 'elza.pa'),
('9464447', 'Kelyn', 'Teresa', 'Austed', '2017-07-10', 'Juridica', 'RKid3/nsAqxMc+gRi1ZRZhOBn4Mp1LKV206yJmm0MtQ=', '987621571', 'kel.inte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `user` varchar(45) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `tipoUsuario` varchar(45) NOT NULL,
  `activo` varchar(2) NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`user`, `pass`, `tipoUsuario`, `activo`) VALUES
('admin', 'admin', 'Administrador', 'SI'),
('elza.pa', '$2y$10$TS4IvaPfFfu7o/NbKyOsMetnPUvI/L0v7RSr3UREraSgKGwPokrSm', 'Cliente', 'SI'),
('Gerente', 'gerente123', 'Gerente', 'SI'),
('kel.inte', '$2y$10$D7ZsuhKp.jch0R7b8CnFFeCKxszfVjplKjLZS./v5jdZMez/VGACu', 'Cliente', 'SI'),
('vale', 'vale123', 'Secretaria', 'SI');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `atencion`
--
ALTER TABLE `atencion`
  ADD CONSTRAINT `fk_cliente_has_abogado_abogado1` FOREIGN KEY (`abogado_rut`) REFERENCES `abogado` (`rut`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cliente_has_abogado_cliente1` FOREIGN KEY (`cliente_rut`) REFERENCES `cliente` (`rut`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cliente_usuarios` FOREIGN KEY (`usuarios_user`) REFERENCES `usuario` (`user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
