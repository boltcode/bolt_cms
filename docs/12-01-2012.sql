SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`grupo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`grupo` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(80) NULL ,
  `data_cadastro` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `mydb`.`usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(80) NULL ,
  `usuario` VARCHAR(15) NULL ,
  `senha` VARCHAR(32) NULL ,
  `data_cadastro` DATETIME NULL ,
  `grupo_id` INT NOT NULL ,
  PRIMARY KEY (`id`, `grupo_id`) ,
  INDEX `fk_usuario_grupo` (`grupo_id` ASC) ,
  CONSTRAINT `fk_usuario_grupo`
    FOREIGN KEY (`grupo_id` )
    REFERENCES `mydb`.`grupo` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `mydb`.`permissao`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`permissao` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(80) NULL ,
  `data_cadastro` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `mydb`.`permissao_grupo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`permissao_grupo` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `permissao_id` INT NOT NULL ,
  `grupo_id` INT NOT NULL ,
  INDEX `fk_permissao_has_grupo_grupo1` (`grupo_id` ASC) ,
  INDEX `fk_permissao_has_grupo_permissao1` (`permissao_id` ASC) ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_permissao_has_grupo_permissao1`
    FOREIGN KEY (`permissao_id` )
    REFERENCES `mydb`.`permissao` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_permissao_has_grupo_grupo1`
    FOREIGN KEY (`grupo_id` )
    REFERENCES `mydb`.`grupo` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `mydb`.`menu`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`menu` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(80) NULL ,
  `url` VARCHAR(255) NULL ,
  `usuario` VARCHAR(15) NULL ,
  `data_cadastro` DATETIME NULL ,
  `exibir` TINYINT(1) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `mydb`.`submenu`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`submenu` (
  `id` INT NOT NULL ,
  `nome` VARCHAR(80) NULL ,
  `url` VARCHAR(255) NULL ,
  `usuario` VARCHAR(15) NULL ,
  `data_cadastro` DATETIME NULL ,
  `exibir` TINYINT(1) NULL ,
  `menu_id` INT NOT NULL ,
  PRIMARY KEY (`id`, `menu_id`) ,
  INDEX `fk_submenu_menu1` (`menu_id` ASC) ,
  CONSTRAINT `fk_submenu_menu1`
    FOREIGN KEY (`menu_id` )
    REFERENCES `mydb`.`menu` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
