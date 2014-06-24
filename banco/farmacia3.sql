SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `farmacia` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `farmacia`;

-- -----------------------------------------------------
-- Table `farmacia`.`usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `farmacia`.`usuario` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NULL ,
  `email` VARCHAR(45) NULL ,
  `senha` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_usuario`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farmacia`.`fornecedor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `farmacia`.`fornecedor` (
  `id_fornecedor` INT NOT NULL AUTO_INCREMENT ,
  `nome_fornecedor` VARCHAR(45) NULL ,
  `cnpj` VARCHAR(45) NULL ,
  `telefone` VARCHAR(45) NULL ,
  `email` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_fornecedor`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farmacia`.`produtos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `farmacia`.`produtos` (
  `id_produtos` INT NOT NULL AUTO_INCREMENT ,
  `nome_produto` VARCHAR(45) NULL ,
  `valor` VARCHAR(45) NULL ,
  `quant` VARCHAR(45) NULL ,
  `especificao` VARCHAR(45) NULL ,
  `fornecedor_id_fornecedor` INT NOT NULL ,
  PRIMARY KEY (`id_produtos`) ,
  INDEX `fk_produtos_fornecedor` (`fornecedor_id_fornecedor` ASC) ,
  CONSTRAINT `fk_produtos_fornecedor`
    FOREIGN KEY (`fornecedor_id_fornecedor` )
    REFERENCES `farmacia`.`fornecedor` (`id_fornecedor` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farmacia`.`clientes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `farmacia`.`clientes` (
  `id_clientes` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NULL ,
  `telefone` INT(11) NULL ,
  `endereco` VARCHAR(45) NULL ,
  `cep` VARCHAR(9) NULL ,
  PRIMARY KEY (`id_clientes`) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
