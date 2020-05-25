-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mysqli_29
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mysqli_29
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mysqli_29` DEFAULT CHARACTER SET utf8 ;
USE `mysqli_29` ;

-- -----------------------------------------------------
-- Table `mysqli_29`.`util`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mysqli_29`.`util` (
  `idutil` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(45) NOT NULL,
  `pwd` VARCHAR(45) NOT NULL,
  `nomprenom` VARCHAR(120) NOT NULL,
  PRIMARY KEY (`idutil`),
  UNIQUE INDEX `login_UNIQUE` (`login` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mysqli_29`.`article`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mysqli_29`.`article` (
  `idarticle` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` VARCHAR(80) NOT NULL,
  `texte` TEXT NOT NULL,
  `ladate` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `util_idutil` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idarticle`),
  INDEX `fk_article_util_idx` (`util_idutil` ASC) VISIBLE,
  CONSTRAINT `fk_article_util`
    FOREIGN KEY (`util_idutil`)
    REFERENCES `mysqli_29`.`util` (`idutil`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
