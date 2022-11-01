-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-06-2017 a las 15:17:34
-- Versión del servidor: 5.7.9
-- Versión de PHP: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tallerbicicleta`
--

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `insertarCliente`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarCliente` (IN `USUARIO` VARCHAR(45), IN `PASS` VARCHAR(255), IN `RUT` VARCHAR(45), IN `NOMBRE` VARCHAR(45), IN `APELLIDO` VARCHAR(45), IN `DIRECCION` VARCHAR(100), IN `EMAIL` VARCHAR(100), IN `TELEFONO` VARCHAR(45))  BEGIN
    INSERT INTO USUARIO VALUES(USUARIO,PASS,'Cliente','SI');
    INSERT INTO CLIENTE VALUES(RUT,NOMBRE,APELLIDO,DIRECCION,EMAIL,TELEFONO,USUARIO);
END$$

DROP PROCEDURE IF EXISTS `insertarCotizacion`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarCotizacion` (IN `NOMBRE` VARCHAR(45), IN `APELLIDO` VARCHAR(45), IN `DESCRIPCION` VARCHAR(255), IN `TIPO_COTIZACION` VARCHAR(45))  BEGIN
    DECLARE V_RUT VARCHAR(45) DEFAULT ' ';
    SELECT RUT INTO V_RUT FROM EMPLEADO WHERE ATENCION=(SELECT MIN(ATENCION) FROM EMPLEADO) LIMIT 1;
    INSERT INTO COTIZACION VALUES(NULL,NOMBRE,APELLIDO,DESCRIPCION,NOW(),TIPO_COTIZACION,NULL,V_RUT);
    UPDATE EMPLEADO SET ATENCION=(ATENCION+1) WHERE RUT=V_RUT;
END$$

DROP PROCEDURE IF EXISTS `insertarProducto`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarProducto` (IN `NOMBRE` VARCHAR(45), IN `TIPOBICI` VARCHAR(45), IN `ARO` INT, IN `MARCA` VARCHAR(45), IN `MODELO` VARCHAR(45), IN `PRECIO` INT, IN `PROMOCION` INT, IN `STOCK` INT, IN `FOTO` VARCHAR(45), IN `RUT_CLI` VARCHAR(45), IN `RUT_EMP` VARCHAR(45))  BEGIN
    INSERT INTO PRODUCTO VALUES(NULL,NOMBRE,TIPOBICI,ARO,MARCA,MODELO,PRECIO,NOW(),PROMOCION,STOCK,'NO',FOTO,RUT_CLI,RUT_EMP);
END$$

DROP PROCEDURE IF EXISTS `insertarRenuncia`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarRenuncia` (IN `USUARIO` VARCHAR(45))  BEGIN
    UPDATE EMPLEADO SET FECRENUNCIA=NOW() WHERE USUARIO_USER=USUARIO;
END$$

DROP PROCEDURE IF EXISTS `insertarUsuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarUsuario` (IN `USUARIO` VARCHAR(45), IN `PASS` VARCHAR(255))  BEGIN
    INSERT INTO USUARIO VALUES(USUARIO,PASS,'CLIENTE');
END$$

DROP PROCEDURE IF EXISTS `validarUsuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `validarUsuario` (IN `USUARIO` VARCHAR(45), IN `PASS` VARCHAR(255))  BEGIN
    SELECT * FROM USUARIO WHERE USER=USUARIO AND PASSWORD=PASS;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `rut` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `Usuario_user` varchar(45) NOT NULL,
  PRIMARY KEY (`rut`),
  KEY `fk_Cliente_Usuario1_idx` (`Usuario_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`rut`, `nombre`, `apellido`, `direccion`, `email`, `telefono`, `Usuario_user`) VALUES
('12412421-7', 'Juan', 'Uri', 'Alemania 543', 'ju@hotmail.com', '32145324', 'juan.123'),
('43125970-2', 'YAN', 'GONZALES', 'PSJE YARZO 421', 'YAN.GONZALES@HOTMAIL.COM', '74576543', 'YAN.GON');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion`
--

DROP TABLE IF EXISTS `cotizacion`;
CREATE TABLE IF NOT EXISTS `cotizacion` (
  `idCotizacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fecCotizacion` datetime NOT NULL,
  `tipoCotizacion` varchar(45) NOT NULL,
  `respuesta` varchar(255) DEFAULT NULL,
  `empleado_rut` varchar(45) NOT NULL,
  PRIMARY KEY (`idCotizacion`),
  KEY `fk_Cotizacion_Empleado1_idx` (`empleado_rut`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cotizacion`
--

INSERT INTO `cotizacion` (`idCotizacion`, `nombre`, `apellido`, `descripcion`, `fecCotizacion`, `tipoCotizacion`, `respuesta`, `empleado_rut`) VALUES
(16, 'Edd', 'Obr', 'dsadsadsa', '2017-06-02 11:43:34', 'Reparacion de Bicicleta', NULL, '98765432-1'),
(17, 'sadasdasdas', 'sadsa', 'sads', '2017-06-02 12:21:07', 'Reparacion de Bicicleta', 'respondido', '12345678-9'),
(18, 'sadsadsa', 'saddsadsadsada', 'sdadsa', '2017-06-02 12:22:06', 'Reparacion de Bicicleta', 'ya lo respondi', '98765432-1'),
(19, 'xccxc', 'xcxcx', 'xcxcxcxc', '2017-06-07 14:39:46', 'Compra de Bicicleta', 'respondido', '12345678-9');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

DROP TABLE IF EXISTS `detalle_venta`;
CREATE TABLE IF NOT EXISTS `detalle_venta` (
  `idVenta` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `nombreProd` varchar(45) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`idVenta`,`idProducto`),
  KEY `fk_Venta_has_Producto_Producto1_idx` (`idProducto`),
  KEY `fk_Venta_has_Producto_Venta1_idx` (`idVenta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

DROP TABLE IF EXISTS `empleado`;
CREATE TABLE IF NOT EXISTS `empleado` (
  `rut` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `anticipo` int(11) DEFAULT NULL,
  `sueldo` int(11) NOT NULL,
  `cargo` varchar(45) NOT NULL,
  `Sucursal_idSucursal` int(11) NOT NULL,
  `fecRenuncia` datetime DEFAULT NULL,
  `atencion` int(11) DEFAULT NULL,
  `Usuario_user` varchar(45) NOT NULL,
  PRIMARY KEY (`rut`),
  KEY `fk_Empleado_Sucursal1_idx` (`Sucursal_idSucursal`),
  KEY `fk_Empleado_Usuario1_idx` (`Usuario_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`rut`, `nombre`, `apellido`, `telefono`, `direccion`, `anticipo`, `sueldo`, `cargo`, `Sucursal_idSucursal`, `fecRenuncia`, `atencion`, `Usuario_user`) VALUES
('12345678-9', 'PEDRO', 'RAMIREZ', '32543252', 'Las Lluvias 563', 2000, 350000, 'Vendedor', 1, NULL, 12, 'PDR.PTE-ALTO'),
('98765432-1', 'DIEGO', 'RIVERA', '87687431', 'Nemesio 8476', NULL, 350000, 'Vendedor', 1, NULL, 11, 'DIEGO.PTE-ALTO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquidacion`
--

DROP TABLE IF EXISTS `liquidacion`;
CREATE TABLE IF NOT EXISTS `liquidacion` (
  `idLiquidacion` int(11) NOT NULL AUTO_INCREMENT,
  `monto` int(11) NOT NULL,
  `empleado_rut` varchar(45) NOT NULL,
  PRIMARY KEY (`idLiquidacion`),
  KEY `fk_Liquidacion_empleado1_idx` (`empleado_rut`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `tipoBicicleta` varchar(45) DEFAULT NULL,
  `aro` int(11) DEFAULT NULL,
  `marca` varchar(45) NOT NULL,
  `modelo` varchar(45) NOT NULL,
  `precio` int(11) NOT NULL,
  `fecProducto` datetime NOT NULL,
  `promocion` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `darBaja` varchar(2) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `Cliente_rut` varchar(45) DEFAULT NULL,
  `empleado_rut` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idProducto`),
  KEY `fk_Producto_Cliente1_idx` (`Cliente_rut`),
  KEY `fk_producto_empleado1_idx` (`empleado_rut`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `nombre`, `tipoBicicleta`, `aro`, `marca`, `modelo`, `precio`, `fecProducto`, `promocion`, `stock`, `darBaja`, `foto`, `Cliente_rut`, `empleado_rut`) VALUES
(27, 'Blue blaz x-720', 'Mountain Bike', 21, 'Bianchi', 'xz-21', 210000, '2017-06-02 20:14:08', -3, 300, 'NO', 'bici1.jpg', NULL, '12345678-9'),
(28, 'Sillin yg-340', NULL, NULL, 'Oparaon', 'y-23', 7500, '2017-06-02 20:17:30', 10, 20, 'NO', 'Asiento Negro-Verde $15.000.jpg', NULL, '12345678-9'),
(29, 'bici Mountain', 'Mountain Bike', 21, 'Oparagon', 'YG-541', 290000, '2017-06-06 00:36:40', 25, 500, 'NO', 'bici2.jpg', '43125970-2', NULL),
(30, 'BIKE1', 'Mountain Bike', 20, 'BIANCHI', 'TXPO-3020', 200000, '2017-06-07 14:57:36', 0, 30, 'NO', 'bik1.jpg', NULL, '12345678-9'),
(31, 'BIKE2', 'Mountain Bike', 26, 'OPALTECH', 'QWER-1256', 150000, '2017-06-07 14:59:27', 0, 40, 'NO', 'bik2.jpg', NULL, '12345678-9'),
(32, 'BIKE3', 'Mountain Bike', 26, 'RTTY-5465', 'OXFORD', 300000, '2017-06-07 15:00:28', 0, 60, 'NO', 'bik3.jpg', NULL, '12345678-9'),
(33, 'BIKE4', 'Urbanas', 24, 'CACHENCHO', 'SIMIO', 990000, '2017-06-07 15:01:56', 10, 10, 'NO', 'bik4.jpg', NULL, '12345678-9'),
(34, 'BIKE5', 'Urbanas', 26, 'TREX', 'BANANA', 50000, '2017-06-07 15:03:33', 0, 20, 'NO', 'bik5.jpg', NULL, '12345678-9'),
(35, 'CASCO', NULL, NULL, 'CABEZA DURA', 'TXTX', 50000, '2017-06-07 15:05:39', 0, 20, 'NO', 'a3.jpg', NULL, '12345678-9'),
(36, 'CASCO2', NULL, NULL, 'CABEZON', 'CACA', 20000, '2017-06-07 15:07:09', 10, 30, 'NO', 'p12.jpg', NULL, '12345678-9'),
(37, 'ASIENTO2', NULL, NULL, 'NALGASUAVE', 'PO-TO', 60000, '2017-06-07 15:08:53', 0, 100, 'NO', 'p14.jpg', NULL, '12345678-9'),
(38, 'GUANTES', NULL, NULL, 'MANUELA', 'MA-NO', 10000, '2017-06-07 15:18:25', 0, 200, 'NO', 'p3.jpg', NULL, '12345678-9'),
(39, 'CADENA', NULL, NULL, 'SEGURITO', 'QWER', 15000, '2017-06-07 15:19:41', 0, 30, 'NO', 'p1.jpg', NULL, '12345678-9'),
(42, 'Kit de luces led', NULL, NULL, 'Electrik', 'Lu-340z', 9000, '2017-06-07 20:24:44', 0, 20, 'NO', 'luzbici.jpg', '12412421-7', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

DROP TABLE IF EXISTS `sucursal`;
CREATE TABLE IF NOT EXISTS `sucursal` (
  `idSucursal` int(11) NOT NULL,
  `sucursal` varchar(45) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `horario` varchar(45) NOT NULL,
  PRIMARY KEY (`idSucursal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`idSucursal`, `sucursal`, `direccion`, `horario`) VALUES
(1, 'Puente Alto', 'Los Aromos 5810', 'Lunes a Viernes de 8:00 a 20:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `user` varchar(45) NOT NULL,
  `password` varchar(200) NOT NULL,
  `tipoUsuario` varchar(45) NOT NULL,
  `activo` varchar(2) NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`user`, `password`, `tipoUsuario`, `activo`) VALUES
('ADMIN', 'ADMIN', 'ADMIN', 'SI'),
('DIEGO.PTE-ALTO', 'DGO-591', 'Empleado', 'SI'),
('juan.123', 'j-123', 'Cliente', 'SI'),
('PDR.PTE-ALTO', 'PDR-123', 'Empleado', 'SI'),
('YAN.GON', 'YAN123', 'Cliente', 'SI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

DROP TABLE IF EXISTS `venta`;
CREATE TABLE IF NOT EXISTS `venta` (
  `idVenta` int(11) NOT NULL AUTO_INCREMENT,
  `iva` varchar(45) NOT NULL,
  `precNeto` varchar(45) NOT NULL,
  `cliente_rut` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idVenta`),
  KEY `fk_Venta_Cliente1_idx` (`cliente_rut`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_Cliente_Usuario1` FOREIGN KEY (`Usuario_user`) REFERENCES `usuario` (`user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD CONSTRAINT `fk_Cotizacion_Empleado1` FOREIGN KEY (`empleado_rut`) REFERENCES `empleado` (`rut`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `fk_Venta_has_Producto_Producto1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Venta_has_Producto_Venta1` FOREIGN KEY (`idVenta`) REFERENCES `venta` (`idVenta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `fk_Empleado_Sucursal1` FOREIGN KEY (`Sucursal_idSucursal`) REFERENCES `sucursal` (`idSucursal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Empleado_Usuario1` FOREIGN KEY (`Usuario_user`) REFERENCES `usuario` (`user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `liquidacion`
--
ALTER TABLE `liquidacion`
  ADD CONSTRAINT `fk_Liquidacion_empleado1` FOREIGN KEY (`empleado_rut`) REFERENCES `empleado` (`rut`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_Producto_Cliente1` FOREIGN KEY (`Cliente_rut`) REFERENCES `cliente` (`rut`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producto_empleado1` FOREIGN KEY (`empleado_rut`) REFERENCES `empleado` (`rut`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `fk_Venta_Cliente1` FOREIGN KEY (`cliente_rut`) REFERENCES `cliente` (`rut`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
