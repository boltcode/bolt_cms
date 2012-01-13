

-- -----------------------------------------------------
-- Table `grupo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `grupo` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(80) NOT NULL ,
  `data_cadastro` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `usuario` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(80) NOT NULL ,
  `usuario` VARCHAR(15) NOT NULL ,
  `senha` VARCHAR(32) NOT NULL ,
  `data_cadastro` DATETIME NOT NULL ,
  `grupo_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_usuario_grupo` (`grupo_id` ASC) ,
  CONSTRAINT `fk_usuario_grupo`
    FOREIGN KEY (`grupo_id` )
    REFERENCES `grupo` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `mydb`.`permissao`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `permissao` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(80) NOT NULL ,
  `data_cadastro` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `mydb`.`permissao_grupo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `permissao_grupo` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `permissao_id` INT NOT NULL ,
  `grupo_id` INT NOT NULL ,
  INDEX `fk_permissao_has_grupo_grupo1` (`grupo_id` ASC) ,
  INDEX `fk_permissao_has_grupo_permissao1` (`permissao_id` ASC) ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_permissao_has_grupo_permissao1`
    FOREIGN KEY (`permissao_id` )
    REFERENCES `permissao` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_permissao_has_grupo_grupo1`
    FOREIGN KEY (`grupo_id` )
    REFERENCES `grupo` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `mydb`.`menu`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `menu` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(80) NOT NULL ,
  `url` VARCHAR(255) NULL ,
  `usuario` VARCHAR(15) NOT NULL ,
  `data_cadastro` DATETIME NOT NULL ,
  `exibir` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `mydb`.`submenu`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `submenu` (
  `id` INT NOT NULL ,
  `nome` VARCHAR(80) NOT NULL ,
  `url` VARCHAR(255) NULL ,
  `usuario` VARCHAR(15) NOT NULL ,
  `data_cadastro` DATETIME NOT NULL ,
  `exibir` TINYINT(1) NOT NULL ,
  `menu_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_submenu_menu1` (`menu_id` ASC) ,
  CONSTRAINT `fk_submenu_menu1`
    FOREIGN KEY (`menu_id` )
    REFERENCES `menu` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
