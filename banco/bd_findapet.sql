-- MySQL Script generated by MySQL Workbench
-- 04/19/18 21:02:43
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema bd_findapet
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bd_findapet
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bd_findapet` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `bd_findapet` ;

-- -----------------------------------------------------
-- Table `bd_findapet`.`cad_enderecos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_findapet`.`cad_enderecos` (
  `end_id` INT NOT NULL AUTO_INCREMENT,
  `end_cep` VARCHAR(9) NOT NULL,
  `end_logradouro` VARCHAR(50) NOT NULL,
  `end_numero` INT NOT NULL,
  `end_complemento` VARCHAR(45) NULL,
  `end_bairro` VARCHAR(45) NOT NULL,
  `end_cidade` VARCHAR(45) NOT NULL,
  `end_uf` VARCHAR(2) NOT NULL,
  PRIMARY KEY (`end_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_findapet`.`cad_usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_findapet`.`cad_usuarios` (
  `usu_id` INT NOT NULL AUTO_INCREMENT,
  `usu_foto` MEDIUMBLOB NULL,
  `usu_cpf` VARCHAR(11) NULL,
  `usu_cnpj` VARCHAR(14) NULL,
  `usu_nome` VARCHAR(45) NOT NULL,
  `usu_apelido` VARCHAR(45) NULL,
  `usu_sexo` VARCHAR(1) NULL,
  `usu_email` VARCHAR(50) NOT NULL,
  `usu_senha` VARCHAR(45) NOT NULL,
  `usu_telefone` VARCHAR(10) NULL,
  `usu_celular` VARCHAR(11) NOT NULL,
  `end_id` INT NOT NULL,
  PRIMARY KEY (`usu_id`),
  UNIQUE INDEX `usu_id_UNIQUE` (`usu_id` ASC),
  INDEX `fk_cad_usuarios_cad_enderecos_idx` (`end_id` ASC),
  CONSTRAINT `fk_cad_usuarios_cad_enderecos`
    FOREIGN KEY (`end_id`)
    REFERENCES `bd_findapet`.`cad_enderecos` (`end_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_findapet`.`especies`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_findapet`.`especies` (
  `esp_id` INT NOT NULL AUTO_INCREMENT,
  `esp_nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`esp_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_findapet`.`raca`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_findapet`.`raca` (
  `rac_id` INT NOT NULL,
  `rac_nome` VARCHAR(45) NOT NULL,
  `esp_id` INT NOT NULL,
  PRIMARY KEY (`rac_id`),
  INDEX `fk_raca_especies1_idx` (`esp_id` ASC),
  CONSTRAINT `fk_raca_especies1`
    FOREIGN KEY (`esp_id`)
    REFERENCES `bd_findapet`.`especies` (`esp_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_findapet`.`cad_animais`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_findapet`.`cad_animais` (
  `ani_id` INT NOT NULL AUTO_INCREMENT,
  `ani_nome` VARCHAR(45) NOT NULL,
  `ani_faixa_etaria` VARCHAR(25) NULL,
  `ani_sexo` VARCHAR(1) NOT NULL,
  `ani_informacoes` MEDIUMTEXT NULL,
  `ani_foto` MEDIUMBLOB NOT NULL,
  `ani_status` VARCHAR(15) NOT NULL,
  `usu_id` INT NOT NULL,
  `rac_id` INT NOT NULL,
  `ani_dt_hr` DATETIME(50) NULL,
  PRIMARY KEY (`ani_id`),
  UNIQUE INDEX `ani_id_UNIQUE` (`ani_id` ASC),
  INDEX `fk_cad_animais_cad_usuarios1_idx` (`usu_id` ASC),
  INDEX `fk_cad_animais_raca1_idx` (`rac_id` ASC),
  CONSTRAINT `fk_cad_animais_cad_usuarios1`
    FOREIGN KEY (`usu_id`)
    REFERENCES `bd_findapet`.`cad_usuarios` (`usu_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cad_animais_raca1`
    FOREIGN KEY (`rac_id`)
    REFERENCES `bd_findapet`.`raca` (`rac_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_findapet`.`adocoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_findapet`.`adocoes` (
  `ado_id` INT NOT NULL AUTO_INCREMENT,
  `ado_dt_hr` DATETIME(50) NOT NULL,
  `usu_doador_id` INT NOT NULL,
  `usu_adotador_id` INT NOT NULL,
  `ani_id` INT NOT NULL,
  PRIMARY KEY (`ado_id`),
  INDEX `fk_adocoes_cad_usuarios1_idx` (`usu_doador_id` ASC),
  INDEX `fk_adocoes_cad_usuarios2_idx` (`usu_adotador_id` ASC),
  INDEX `fk_adocoes_cad_animais1_idx` (`ani_id` ASC),
  CONSTRAINT `fk_adocoes_cad_usuarios1`
    FOREIGN KEY (`usu_doador_id`)
    REFERENCES `bd_findapet`.`cad_usuarios` (`usu_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_adocoes_cad_usuarios2`
    FOREIGN KEY (`usu_adotador_id`)
    REFERENCES `bd_findapet`.`cad_usuarios` (`usu_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_adocoes_cad_animais1`
    FOREIGN KEY (`ani_id`)
    REFERENCES `bd_findapet`.`cad_animais` (`ani_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
