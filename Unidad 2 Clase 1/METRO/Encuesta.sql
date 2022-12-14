-- MySQL Script generated by MySQL Workbench
-- 04/25/17 13:17:34
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema metro
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema metro
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `metro` DEFAULT CHARACTER SET latin1 ;
USE `metro` ;

-- -----------------------------------------------------
-- Table `metro`.`ENCUESTA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `metro`.`ENCUESTA` (
  `RUT` VARCHAR(12) NOT NULL,
  `NOMBRE` VARCHAR(40) NOT NULL,
  `GENERO` CHAR(1) NOT NULL,
  `FRECUENCIA` VARCHAR(40) NOT NULL,
  `HORARIO` VARCHAR(40) NOT NULL,
  `LINEAS` VARCHAR(45) NOT NULL,
  `CALIDAD_SERVICIO` VARCHAR(40) NOT NULL,
  `OBSERVACIONES` VARCHAR(140) NULL,
  PRIMARY KEY (`RUT`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
