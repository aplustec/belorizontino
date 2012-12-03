SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `jornalbe` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `jornalbe` ;

-- -----------------------------------------------------
-- Table `jornalbe`.`administrator`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `jornalbe`.`administrator` (
  `idadministrator` INT NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(45) NULL ,
  `password` CHAR(128) NULL ,
  PRIMARY KEY (`idadministrator`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jornalbe`.`banner`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `jornalbe`.`banner` (
  `idbanner` INT NOT NULL AUTO_INCREMENT ,
  `image` VARCHAR(250) NULL ,
  PRIMARY KEY (`idbanner`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jornalbe`.`edition`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `jornalbe`.`edition` (
  `idedition` INT NOT NULL AUTO_INCREMENT ,
  `label` VARCHAR(45) NULL ,
  `date` DATE NULL ,
  `file` VARCHAR(250) NULL ,
  PRIMARY KEY (`idedition`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jornalbe`.`news`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `jornalbe`.`news` (
  `idnews` INT NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(120) NULL ,
  `author` VARCHAR(100) NULL ,
  `email` VARCHAR(100) NULL ,
  `content` TEXT NULL ,
  `image` VARCHAR(250) NULL ,
  `date` DATE NULL ,
  PRIMARY KEY (`idnews`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jornalbe`.`comment`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `jornalbe`.`comment` (
  `idcomment` INT NOT NULL AUTO_INCREMENT ,
  `idnews` INT NOT NULL ,
  `name` VARCHAR(100) NULL ,
  `comment` VARCHAR(400) NULL ,
  `date` DATETIME NULL ,
  `status` INT(1) NULL ,
  PRIMARY KEY (`idcomment`) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
