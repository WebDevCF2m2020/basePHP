-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema crudbase
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema crudbase
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `crudbase` DEFAULT CHARACTER SET utf8 ;
USE `crudbase` ;

-- -----------------------------------------------------
-- Table `crudbase`.`utilisateur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `crudbase`.`utilisateur` (
  `idutilisateur` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id de l\'utilisateur (clef primaire en INTEGER NotNull Unsigned Auto Increment)',
  `thelogin` VARCHAR(60) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL COMMENT 'Champs du login en varchar(60) NotNull Unique (champs indexé)\n\ncharset: utf8 - collation : utf8_bin => est sensible à la casse (majucules/minuscules)',
  `thepwd` VARCHAR(64) NOT NULL COMMENT 'thepwd est sensible à la casse (utf8_bin) et peut avoir 64 caractères.\n\nPrévision de 64 caractères pour le sha-256\n\nUn mot de passe doit toujours être crypté dans la base de donnée, donc l\'admin ne connait le mot de passe de ses utilisateurs',
  `themail` VARCHAR(255) NOT NULL COMMENT 'themail (char variable jusqu\'à 255 caractères)',
  `thename` VARCHAR(300) NOT NULL,
  PRIMARY KEY (`idutilisateur`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `thelogin_UNIQUE` ON `crudbase`.`utilisateur` (`thelogin` ASC);

CREATE UNIQUE INDEX `themail_UNIQUE` ON `crudbase`.`utilisateur` (`themail` ASC);


-- -----------------------------------------------------
-- Table `crudbase`.`thepage`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `crudbase`.`thepage` (
  `idthepage` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `thetitle` VARCHAR(200) CHARACTER SET 'utf8' NOT NULL COMMENT 'Champs unique, Not Null\n\nCI : Case Insensitive',
  `thetext` TEXT NOT NULL,
  `thedate` DATETIME NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'La date au format datetime  avec CURRENT_TIMESTAMP par défaut à l\'insertion',
  `utilisateur_idutilisateur` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idthepage`),
  CONSTRAINT `fk_thepage_utilisateur`
    FOREIGN KEY (`utilisateur_idutilisateur`)
    REFERENCES `crudbase`.`utilisateur` (`idutilisateur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `thetitle_UNIQUE` ON `crudbase`.`thepage` (`thetitle` ASC);

CREATE INDEX `fk_thepage_utilisateur_idx` ON `crudbase`.`thepage` (`utilisateur_idutilisateur` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
