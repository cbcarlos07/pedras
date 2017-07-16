-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema pedras
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema pedras
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `pedras` DEFAULT CHARACTER SET utf8mb4 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`responsavel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`responsavel` (
  `CD_RESPONSAVEL` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `NM_RESPONSAVEL` VARCHAR(100) NULL,
  PRIMARY KEY (`CD_RESPONSAVEL`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pedras`.`uf`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pedras`.`uf` (
  `CD_UF` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `NM_UF` VARCHAR(30) NULL DEFAULT NULL,
  `SIGLA_UF` VARCHAR(2) NULL DEFAULT NULL,
  PRIMARY KEY (`CD_UF`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `pedras`.`cidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pedras`.`cidade` (
  `CD_CIDADE` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `NM_CIDADE` VARCHAR(50) NULL DEFAULT NULL,
  `CD_UF` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`CD_CIDADE`),
  INDEX `CD_UF` (`CD_UF` ASC),
  CONSTRAINT `cidade_ibfk_1`
    FOREIGN KEY (`CD_UF`)
    REFERENCES `pedras`.`uf` (`CD_UF`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `pedras`.`religiao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pedras`.`religiao` (
  `CD_RELIGIAO` INT(11) NOT NULL AUTO_INCREMENT,
  `DS_RELIGIAO` VARCHAR(30) NULL DEFAULT NULL,
  PRIMARY KEY (`CD_RELIGIAO`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `pedras`.`desbravador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pedras`.`desbravador` (
  `CD_DESB` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `NM_DESBRAVADOR` VARCHAR(45) NULL,
  `DS_SEXO` VARCHAR(1) NULL DEFAULT NULL,
  `DT_NASC` DATE NULL DEFAULT NULL,
  `CD_CIDADE` INT(11) NULL DEFAULT NULL,
  `CD_UF` INT(11) NULL DEFAULT NULL,
  `SN_BATIZADO` CHAR(1) NULL DEFAULT NULL,
  `CD_RELIGIAO` INT(11) NULL DEFAULT NULL,
  `SN_RECEBEU_LENCO` CHAR(1) NULL DEFAULT NULL,
  `DT_RECEBEU_LENCO` DATE NULL DEFAULT NULL,
  `DS_FOTO` BLOB NULL,
  `NR_CEP` VARCHAR(8) NULL,
  `DS_EMAIL` VARCHAR(45) NULL,
  `SN_ATIVO` CHAR(1) NULL,
  PRIMARY KEY (`CD_DESB`),
  INDEX `CD_CIDADE` (`CD_CIDADE` ASC),
  INDEX `CD_UF` (`CD_UF` ASC),
  INDEX `CD_RELIGIAO` (`CD_RELIGIAO` ASC),
  CONSTRAINT `desbravador_ibfk_1`
    FOREIGN KEY (`CD_CIDADE`)
    REFERENCES `pedras`.`cidade` (`CD_CIDADE`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `desbravador_ibfk_2`
    FOREIGN KEY (`CD_UF`)
    REFERENCES `pedras`.`uf` (`CD_UF`),
  CONSTRAINT `desbravador_ibfk_3`
    FOREIGN KEY (`CD_RELIGIAO`)
    REFERENCES `pedras`.`religiao` (`CD_RELIGIAO`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `mydb`.`filiacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`filiacao` (
  `CD_FILIACAO` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `CD_DESB` INT(11) UNSIGNED NOT NULL,
  `CD_RESPONSAVEL` INT UNSIGNED NOT NULL,
  INDEX `fk_filiacao_desbravador_idx` (`CD_DESB` ASC),
  INDEX `fk_filiacao_responsavel1_idx` (`CD_RESPONSAVEL` ASC),
  PRIMARY KEY (`CD_FILIACAO`),
  CONSTRAINT `fk_filiacao_desbravador`
    FOREIGN KEY (`CD_DESB`)
    REFERENCES `pedras`.`desbravador` (`CD_DESB`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_filiacao_responsavel1`
    FOREIGN KEY (`CD_RESPONSAVEL`)
    REFERENCES `mydb`.`responsavel` (`CD_RESPONSAVEL`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`contato`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`contato` (
  `NR_CEP` VARCHAR(8) NOT NULL,
  PRIMARY KEY (`NR_CEP`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`fone_desb`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`fone_desb` (
  `CD_FONE` INT NOT NULL,
  `NR_FONE` VARCHAR(11) NULL,
  `CD_DESB` INT(11) UNSIGNED NOT NULL,
  `OBS_FONE` VARCHAR(255) NULL,
  PRIMARY KEY (`CD_FONE`),
  INDEX `fk_telefone_desbravador1_idx` (`CD_DESB` ASC),
  CONSTRAINT `fk_telefone_desbravador1`
    FOREIGN KEY (`CD_DESB`)
    REFERENCES `pedras`.`desbravador` (`CD_DESB`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`fone_resp`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`fone_resp` (
  `CD_FONE` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `NR_FONE` VARCHAR(11) NULL,
  `CD_RESPONSAVEL` INT UNSIGNED NOT NULL,
  `FONE_OBS` VARCHAR(45) NULL,
  PRIMARY KEY (`CD_FONE`),
  INDEX `fk_fone_resp_responsavel1_idx` (`CD_RESPONSAVEL` ASC),
  CONSTRAINT `fk_fone_resp_responsavel1`
    FOREIGN KEY (`CD_RESPONSAVEL`)
    REFERENCES `mydb`.`responsavel` (`CD_RESPONSAVEL`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`medico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`medico` (
  `CD_DESB` INT(11) UNSIGNED NOT NULL,
  `TIPO_SANGUINEO` VARCHAR(3) NULL,
  `FATOR_RH` CHAR(1) NULL,
  `SN_VAC_CONT_TET` CHAR(1) NULL,
  `DT_VAC_CONT_TET` DATE NULL,
  `DS_DOENCA` VARCHAR(255) NULL,
  `DS_ALERGIA` VARCHAR(255) NULL,
  `ACIDENTE_AVISAR` VARCHAR(255) NULL,
  INDEX `fk_medico_desbravador1_idx` (`CD_DESB` ASC),
  CONSTRAINT `fk_medico_desbravador1`
    FOREIGN KEY (`CD_DESB`)
    REFERENCES `pedras`.`desbravador` (`CD_DESB`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`classes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`classes` (
  `CD_CLASSE` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `DS_CLASSE` VARCHAR(45) NULL,
  `TP_CLASSE` CHAR(1) NULL,
  PRIMARY KEY (`CD_CLASSE`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`curso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`curso` (
  `CD_LIDERANCA` INT NOT NULL,
  `DS_LIDERANCA` VARCHAR(45) NULL,
  PRIMARY KEY (`CD_LIDERANCA`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`investidura`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`investidura` (
  `CD_DESB` INT(11) UNSIGNED NOT NULL,
  `CD_CLASSE` INT UNSIGNED NOT NULL,
  `DT_INVESTIDURA` DATE NULL,
  `IMG_CERTIFICADO` BLOB NULL,
  INDEX `fk_investidura_desbravador1_idx` (`CD_DESB` ASC),
  INDEX `fk_investidura_classes1_idx` (`CD_CLASSE` ASC),
  CONSTRAINT `fk_investidura_desbravador1`
    FOREIGN KEY (`CD_DESB`)
    REFERENCES `pedras`.`desbravador` (`CD_DESB`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_investidura_classes1`
    FOREIGN KEY (`CD_CLASSE`)
    REFERENCES `mydb`.`classes` (`CD_CLASSE`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`lideranca`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`lideranca` (
  `CD_DESB` INT(11) UNSIGNED NOT NULL,
  `CD_LIDERANCA` INT NOT NULL,
  `DT_INVESTIDURA` DATE NULL,
  `IMG_CERTIFICADO` BLOB NULL,
  INDEX `fk_table1_desbravador1_idx` (`CD_DESB` ASC),
  INDEX `fk_lideranca_curso1_idx` (`CD_LIDERANCA` ASC),
  CONSTRAINT `fk_table1_desbravador1`
    FOREIGN KEY (`CD_DESB`)
    REFERENCES `pedras`.`desbravador` (`CD_DESB`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_lideranca_curso1`
    FOREIGN KEY (`CD_LIDERANCA`)
    REFERENCES `mydb`.`curso` (`CD_LIDERANCA`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`especialidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`especialidade` (
  `CD_ESPECIALIDADE` INT NOT NULL,
  `DS_ESPECIALIDADE` VARCHAR(45) NULL,
  PRIMARY KEY (`CD_ESPECIALIDADE`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`ESPEC_DESB`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`ESPEC_DESB` (
  `CD_DESB` INT(11) UNSIGNED NOT NULL,
  `CD_ESPECIALIDADE` INT NOT NULL,
  `IMG_CERTIFICADO` BLOB NULL,
  INDEX `fk_ESPEC_DESB_desbravador1_idx` (`CD_DESB` ASC),
  INDEX `fk_ESPEC_DESB_especialidade1_idx` (`CD_ESPECIALIDADE` ASC),
  CONSTRAINT `fk_ESPEC_DESB_desbravador1`
    FOREIGN KEY (`CD_DESB`)
    REFERENCES `pedras`.`desbravador` (`CD_DESB`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ESPEC_DESB_especialidade1`
    FOREIGN KEY (`CD_ESPECIALIDADE`)
    REFERENCES `mydb`.`especialidade` (`CD_ESPECIALIDADE`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`identificacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`identificacao` (
  `CD_DESB` INT(11) UNSIGNED NOT NULL,
  `NR_CARTAO_SUS` VARCHAR(45) NULL,
  `SN_POSSUI_PLANO` VARCHAR(45) NULL,
  `DS_PLANO` VARCHAR(90) NULL,
  `DADO_CARTAO_VAC` CHAR(1) NULL COMMENT 'A - ATUALIZADO\nT - ATRASADO\nS - SEM INFORMACAO\nN - NAO TEM CARTAO',
  `VIVE_COM` CHAR(1) NULL COMMENT 'D - PAIS\nP - SO COM PAI\nM - SO COM MAE\nO - OUTROS',
  `DS_OUTRO_VIVE` VARCHAR(45) NULL,
  `DOENCA` CHAR(1) NULL COMMENT 'C - CATAPORA\nM - MENINGITE\nH - HEPATITE\nD - DENGUE\nP - PNEUMONIA\n',
  `ALERGIA` CHAR(1) NULL COMMENT 'P - NA PELE\nA - ALIMENTAR\nB - BRONQUITE\nR - RENITE\nO - OUTRA',
  `DS_ALERGIA` VARCHAR(45) NULL,
  `SN_DOENCA_CORACAO` CHAR(1) NULL,
  `DS_DOENCA_CORACAO` VARCHAR(45) NULL,
  `SN_FAZ_ACOM_CORACAO` CHAR(1) NULL,
  `DS_LOCAL_MEDIC_CORACAO` VARCHAR(45) NULL,
  `SN_ALERGIA_MEDICAMENTO` CHAR(1) NULL,
  `DS_ALERGIA_MEDICAMENTO` VARCHAR(45) NULL,
  `SN_INTOLERANCIA_LACTOSE` CHAR(1) NULL,
  `SN_DEFICIENCIA_VIT_NUT` CHAR(1) NULL,
  `DS_DEFICIENCIA_VIT_NUT` VARCHAR(45) NULL,
  `SN_DESMAIO_CONVULSAO` CHAR(1) NULL,
  `DT_ULTIM_DESMAIO_CONVULSAO` DATE NULL,
  `SN_TOMA_MEDICACAO` CHAR(1) NULL,
  `DS_TOMA_MEDICAO` VARCHAR(45) NULL,
  `DS_PRAQUE_TOMA_MEDICACAO` VARCHAR(45) NULL,
  `SN_ACOMP_MEDIC_TOMA_MEDICACAO` CHAR(1) NULL,
  `SN_DIABETES` CHAR(1) NULL,
  `SN_FAZ_TRAT_DIABETES` CHAR(1) NULL,
  `DS_FAZ_TRAT_DIABETES` VARCHAR(45) NULL,
  `SN_ALGUMA_CIRURGIA` CHAR(1) NULL,
  `DS_ALGUMA_CIRURGIA` VARCHAR(45) NULL,
  `SN_ESTEVE_INTERNADO` CHAR(1) NULL,
  `DS_ESTEVE_INTERNADO` VARCHAR(45) NULL,
  `GRUPO_SANG` VARCHAR(2) NULL,
  `FATOR_RH` CHAR(1) NULL,
  `SN_RECEBEU_TRANSFUSAO_SANG` CHAR(1) NULL,
  `DT_RECEBEU_TRANSFUSAO_SANG` DATE NULL,
  `OBSERVACAO` VARCHAR(255) NULL,
  `NM_RESPONSAVEL` VARCHAR(45) NULL,
  `DT_ASSINATURA` DATE NULL,
  INDEX `fk_table1_desbravador2_idx` (`CD_DESB` ASC),
  CONSTRAINT `fk_table1_desbravador2`
    FOREIGN KEY (`CD_DESB`)
    REFERENCES `pedras`.`desbravador` (`CD_DESB`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`projeto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`projeto` (
  `CD_PROJETO` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `DS_PROJETO` VARCHAR(45) NULL,
  `PRECO_PESSOA` DECIMAL(10,2) NULL,
  PRIMARY KEY (`CD_PROJETO`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`pgto_desb`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`pgto_desb` (
  `CD_DESB` INT(11) UNSIGNED NOT NULL,
  `CD_PROJETO` INT UNSIGNED NOT NULL,
  INDEX `fk_pgto_evento_desbravador1_idx` (`CD_DESB` ASC),
  INDEX `fk_pgto_evento_projeto1_idx` (`CD_PROJETO` ASC),
  CONSTRAINT `fk_pgto_evento_desbravador1`
    FOREIGN KEY (`CD_DESB`)
    REFERENCES `pedras`.`desbravador` (`CD_DESB`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pgto_evento_projeto1`
    FOREIGN KEY (`CD_PROJETO`)
    REFERENCES `mydb`.`projeto` (`CD_PROJETO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`pagamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`pagamento` (
  `CD_DESB` INT(11) UNSIGNED NOT NULL,
  `CD_PROJETO` INT UNSIGNED NOT NULL,
  `NR_VALOR` DECIMAL(10,2) NULL,
  `DT_PAGTO` DATE NULL,
  INDEX `fk_pagamento_desbravador1_idx` (`CD_DESB` ASC),
  INDEX `fk_pagamento_projeto1_idx` (`CD_PROJETO` ASC),
  CONSTRAINT `fk_pagamento_desbravador1`
    FOREIGN KEY (`CD_DESB`)
    REFERENCES `pedras`.`desbravador` (`CD_DESB`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pagamento_projeto1`
    FOREIGN KEY (`CD_PROJETO`)
    REFERENCES `mydb`.`projeto` (`CD_PROJETO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`unidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`unidade` (
  `CD_UNIDADE` INT NOT NULL,
  `DS_UNIDADE` VARCHAR(45) NULL,
  `CATEGORIA` VARCHAR(45) NULL,
  PRIMARY KEY (`CD_UNIDADE`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`desb_unidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`desb_unidade` (
  `CD_DESB` INT(11) UNSIGNED NOT NULL,
  `CD_UNIDADE` INT NOT NULL,
  INDEX `fk_desb_unidade_desbravador1_idx` (`CD_DESB` ASC),
  INDEX `fk_desb_unidade_unidade1_idx` (`CD_UNIDADE` ASC),
  CONSTRAINT `fk_desb_unidade_desbravador1`
    FOREIGN KEY (`CD_DESB`)
    REFERENCES `pedras`.`desbravador` (`CD_DESB`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_desb_unidade_unidade1`
    FOREIGN KEY (`CD_UNIDADE`)
    REFERENCES `mydb`.`unidade` (`CD_UNIDADE`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`cargo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`cargo` (
  `CD_CARGO` INT NOT NULL,
  `DS_CARGO` VARCHAR(45) NULL,
  PRIMARY KEY (`CD_CARGO`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`desb_cargo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`desb_cargo` (
  `CD_CARGO` INT NOT NULL,
  `CD_DESB` INT(11) UNSIGNED NOT NULL,
  INDEX `fk_desb_cargo_cargo1_idx` (`CD_CARGO` ASC),
  INDEX `fk_desb_cargo_desbravador1_idx` (`CD_DESB` ASC),
  CONSTRAINT `fk_desb_cargo_cargo1`
    FOREIGN KEY (`CD_CARGO`)
    REFERENCES `mydb`.`cargo` (`CD_CARGO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_desb_cargo_desbravador1`
    FOREIGN KEY (`CD_DESB`)
    REFERENCES `pedras`.`desbravador` (`CD_DESB`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `pedras` ;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
