-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema pedras
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema pedras
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `pedras` DEFAULT CHARACTER SET utf8 ;
USE `pedras` ;

-- -----------------------------------------------------
-- Table `pedras`.`responsavel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pedras`.`responsavel` (
  `CD_RESPONSAVEL` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `NM_RESPONSAVEL` VARCHAR(100) NULL,
  PRIMARY KEY (`CD_RESPONSAVEL`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pedras`.`uf`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pedras`.`uf` (
  `CD_UF` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `NM_UF` VARCHAR(30) NULL,
  `SIGLA_UF` VARCHAR(2) NULL,
  PRIMARY KEY (`CD_UF`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pedras`.`cidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pedras`.`cidade` (
  `CD_CIDADE` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `NM_CIDADE` VARCHAR(50) NULL,
  `CD_UF` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`CD_CIDADE`),
  INDEX `fk_cidade_uf1_idx` (`CD_UF` ASC),
  CONSTRAINT `fk_cidade_uf1`
    FOREIGN KEY (`CD_UF`)
    REFERENCES `pedras`.`uf` (`CD_UF`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pedras`.`religiao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pedras`.`religiao` (
  `CD_RELIGIAO` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `NM_RELIGIAO` VARCHAR(45) NULL,
  PRIMARY KEY (`CD_RELIGIAO`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pedras`.`desbravador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pedras`.`desbravador` (
  `CD_DESB` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `NM_DESBRAVADOR` VARCHAR(100) NULL,
  `DS_SEXO` CHAR(1) NULL,
  `DT_NASC` DATE NULL,
  `CD_CIDADE` INT UNSIGNED NOT NULL,
  `SN_BATIZADO` CHAR(1) NULL,
  `CD_RELIGIAO` INT UNSIGNED NOT NULL,
  `SN_RECEBEU_LENCO` CHAR(1) NULL,
  `DT_RECEBEU_LENCO` DATE NULL,
  `DS_FOTO` BLOB NULL,
  `NR_CEP` VARCHAR(8) NULL,
  `DS_EMAIL` VARCHAR(45) NULL,
  `SN_ATIVO` VARCHAR(45) NULL,
  PRIMARY KEY (`CD_DESB`),
  INDEX `fk_desbravador_cidade1_idx` (`CD_CIDADE` ASC),
  INDEX `fk_desbravador_religiao1_idx` (`CD_RELIGIAO` ASC),
  CONSTRAINT `fk_desbravador_cidade1`
    FOREIGN KEY (`CD_CIDADE`)
    REFERENCES `pedras`.`cidade` (`CD_CIDADE`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_desbravador_religiao1`
    FOREIGN KEY (`CD_RELIGIAO`)
    REFERENCES `pedras`.`religiao` (`CD_RELIGIAO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pedras`.`filiacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pedras`.`filiacao` (
  `CD_FILIACAO` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `CD_DESB` INT UNSIGNED NOT NULL,
  `CD_RESPONSAVEL` INT UNSIGNED NOT NULL,
  INDEX `fk_filiacao_responsavel1_idx` (`CD_RESPONSAVEL` ASC),
  PRIMARY KEY (`CD_FILIACAO`),
  INDEX `fk_filiacao_desbravador1_idx` (`CD_DESB` ASC),
  CONSTRAINT `fk_filiacao_responsavel1`
    FOREIGN KEY (`CD_RESPONSAVEL`)
    REFERENCES `pedras`.`responsavel` (`CD_RESPONSAVEL`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_filiacao_desbravador1`
    FOREIGN KEY (`CD_DESB`)
    REFERENCES `pedras`.`desbravador` (`CD_DESB`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pedras`.`fone_desb`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pedras`.`fone_desb` (
  `CD_DESB` INT UNSIGNED NOT NULL,
  `CD_FONE` INT NOT NULL,
  `NR_FONE` VARCHAR(11) NULL,
  `OBS_FONE` VARCHAR(255) NULL,
  PRIMARY KEY (`CD_FONE`),
  INDEX `fk_fone_desb_desbravador1_idx` (`CD_DESB` ASC),
  CONSTRAINT `fk_fone_desb_desbravador1`
    FOREIGN KEY (`CD_DESB`)
    REFERENCES `pedras`.`desbravador` (`CD_DESB`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pedras`.`fone_resp`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pedras`.`fone_resp` (
  `CD_FONE` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `NR_FONE` VARCHAR(11) NULL,
  `CD_RESPONSAVEL` INT UNSIGNED NOT NULL,
  `FONE_OBS` VARCHAR(45) NULL,
  PRIMARY KEY (`CD_FONE`),
  INDEX `fk_fone_resp_responsavel1_idx` (`CD_RESPONSAVEL` ASC),
  CONSTRAINT `fk_fone_resp_responsavel1`
    FOREIGN KEY (`CD_RESPONSAVEL`)
    REFERENCES `pedras`.`responsavel` (`CD_RESPONSAVEL`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pedras`.`medico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pedras`.`medico` (
  `TIPO_SANGUINEO` VARCHAR(3) NULL,
  `FATOR_RH` CHAR(1) NULL,
  `SN_VAC_CONT_TET` CHAR(1) NULL,
  `DT_VAC_CONT_TET` DATE NULL,
  `DS_DOENCA` VARCHAR(255) NULL,
  `DS_ALERGIA` VARCHAR(255) NULL,
  `ACIDENTE_AVISAR` VARCHAR(255) NULL,
  `desbravador_CD_DESB` INT UNSIGNED NOT NULL,
  INDEX `fk_medico_desbravador1_idx` (`desbravador_CD_DESB` ASC),
  CONSTRAINT `fk_medico_desbravador1`
    FOREIGN KEY (`desbravador_CD_DESB`)
    REFERENCES `pedras`.`desbravador` (`CD_DESB`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pedras`.`classes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pedras`.`classes` (
  `CD_CLASSE` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `DS_CLASSE` VARCHAR(45) NULL,
  `TP_CLASSE` CHAR(1) NULL,
  PRIMARY KEY (`CD_CLASSE`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pedras`.`curso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pedras`.`curso` (
  `CD_LIDERANCA` INT NOT NULL,
  `DS_LIDERANCA` VARCHAR(45) NULL,
  PRIMARY KEY (`CD_LIDERANCA`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pedras`.`investidura`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pedras`.`investidura` (
  `CD_CLASSE` INT UNSIGNED NOT NULL,
  `DT_INVESTIDURA` DATE NULL,
  `IMG_CERTIFICADO` BLOB NULL,
  INDEX `fk_investidura_classes1_idx` (`CD_CLASSE` ASC),
  CONSTRAINT `fk_investidura_classes1`
    FOREIGN KEY (`CD_CLASSE`)
    REFERENCES `pedras`.`classes` (`CD_CLASSE`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pedras`.`lideranca`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pedras`.`lideranca` (
  `CD_DESB` INT UNSIGNED NOT NULL,
  `CD_LIDERANCA` INT NOT NULL,
  `DT_INVESTIDURA` DATE NULL,
  `IMG_CERTIFICADO` BLOB NULL,
  INDEX `fk_lideranca_curso1_idx` (`CD_LIDERANCA` ASC),
  INDEX `fk_lideranca_desbravador1_idx` (`CD_DESB` ASC),
  CONSTRAINT `fk_lideranca_curso1`
    FOREIGN KEY (`CD_LIDERANCA`)
    REFERENCES `pedras`.`curso` (`CD_LIDERANCA`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_lideranca_desbravador1`
    FOREIGN KEY (`CD_DESB`)
    REFERENCES `pedras`.`desbravador` (`CD_DESB`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pedras`.`especialidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pedras`.`especialidade` (
  `CD_ESPECIALIDADE` INT NOT NULL,
  `DS_ESPECIALIDADE` VARCHAR(45) NULL,
  PRIMARY KEY (`CD_ESPECIALIDADE`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pedras`.`espec_desb`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pedras`.`espec_desb` (
  `CD_ESPECIALIDADE` INT NOT NULL,
  `IMG_CERTIFICADO` BLOB NULL,
  `CD_DESB` INT UNSIGNED NOT NULL,
  INDEX `fk_ESPEC_DESB_especialidade1_idx` (`CD_ESPECIALIDADE` ASC),
  INDEX `fk_espec_desb_desbravador1_idx` (`CD_DESB` ASC),
  CONSTRAINT `fk_ESPEC_DESB_especialidade1`
    FOREIGN KEY (`CD_ESPECIALIDADE`)
    REFERENCES `pedras`.`especialidade` (`CD_ESPECIALIDADE`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_espec_desb_desbravador1`
    FOREIGN KEY (`CD_DESB`)
    REFERENCES `pedras`.`desbravador` (`CD_DESB`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pedras`.`identificacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pedras`.`identificacao` (
  `CD_DESB` INT UNSIGNED NOT NULL,
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
  INDEX `fk_identificacao_desbravador1_idx` (`CD_DESB` ASC),
  CONSTRAINT `fk_identificacao_desbravador1`
    FOREIGN KEY (`CD_DESB`)
    REFERENCES `pedras`.`desbravador` (`CD_DESB`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pedras`.`evento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pedras`.`evento` (
  `CD_EVENTO` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `DS_EVENTO` VARCHAR(45) NULL,
  `PRECO_PESSOA` DECIMAL(10,2) NULL,
  PRIMARY KEY (`CD_EVENTO`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pedras`.`pgto_desb`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pedras`.`pgto_desb` (
  `CD_DESB` INT(11) UNSIGNED NOT NULL,
  `CD_PROJETO` INT UNSIGNED NOT NULL,
  INDEX `fk_pgto_evento_desbravador1_idx` (`CD_DESB` ASC),
  INDEX `fk_pgto_evento_projeto1_idx` (`CD_PROJETO` ASC),
  CONSTRAINT `fk_pgto_evento_projeto1`
    FOREIGN KEY (`CD_PROJETO`)
    REFERENCES `pedras`.`evento` (`CD_EVENTO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pedras`.`pagamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pedras`.`pagamento` (
  `CD_DESB` INT UNSIGNED NOT NULL,
  `CD_PROJETO` INT UNSIGNED NOT NULL,
  `NR_VALOR` DECIMAL(10,2) NULL,
  `DT_PAGTO` DATE NULL,
  INDEX `fk_pagamento_projeto1_idx` (`CD_PROJETO` ASC),
  INDEX `fk_pagamento_desbravador1_idx` (`CD_DESB` ASC),
  CONSTRAINT `fk_pagamento_projeto1`
    FOREIGN KEY (`CD_PROJETO`)
    REFERENCES `pedras`.`evento` (`CD_EVENTO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pagamento_desbravador1`
    FOREIGN KEY (`CD_DESB`)
    REFERENCES `pedras`.`desbravador` (`CD_DESB`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pedras`.`unidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pedras`.`unidade` (
  `CD_UNIDADE` INT NOT NULL,
  `DS_UNIDADE` VARCHAR(45) NULL,
  `CATEGORIA` VARCHAR(45) NULL,
  PRIMARY KEY (`CD_UNIDADE`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pedras`.`desb_unidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pedras`.`desb_unidade` (
  `CD_UNIDADE` INT NOT NULL,
  `CD_DESB` INT UNSIGNED NOT NULL,
  INDEX `fk_desb_unidade_unidade1_idx` (`CD_UNIDADE` ASC),
  INDEX `fk_desb_unidade_desbravador1_idx` (`CD_DESB` ASC),
  CONSTRAINT `fk_desb_unidade_unidade1`
    FOREIGN KEY (`CD_UNIDADE`)
    REFERENCES `pedras`.`unidade` (`CD_UNIDADE`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_desb_unidade_desbravador1`
    FOREIGN KEY (`CD_DESB`)
    REFERENCES `pedras`.`desbravador` (`CD_DESB`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pedras`.`cargo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pedras`.`cargo` (
  `CD_CARGO` INT NOT NULL,
  `DS_CARGO` VARCHAR(45) NULL,
  PRIMARY KEY (`CD_CARGO`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pedras`.`desb_cargo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pedras`.`desb_cargo` (
  `CD_CARGO` INT NOT NULL,
  `CD_DESB` INT UNSIGNED NOT NULL,
  INDEX `fk_desb_cargo_cargo1_idx` (`CD_CARGO` ASC),
  INDEX `fk_desb_cargo_desbravador1_idx` (`CD_DESB` ASC),
  CONSTRAINT `fk_desb_cargo_cargo1`
    FOREIGN KEY (`CD_CARGO`)
    REFERENCES `pedras`.`cargo` (`CD_CARGO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_desb_cargo_desbravador1`
    FOREIGN KEY (`CD_DESB`)
    REFERENCES `pedras`.`desbravador` (`CD_DESB`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pedras`.`nivel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pedras`.`nivel` (
  `CD_NIVEL` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `DS_NIVEL` VARCHAR(45) NULL,
  PRIMARY KEY (`CD_NIVEL`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pedras`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pedras`.`usuario` (
  `CD_USUARIO` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `DS_LOGIN` VARCHAR(45) NULL,
  `NM_USUARIO` VARCHAR(100) NULL,
  `DS_SENHA` VARCHAR(100) NULL,
  `SN_ATIVO` CHAR(1) NULL,
  `CD_NIVEL` INT UNSIGNED NOT NULL,
  `SN_SENHA_ATUAL` CHAR(1) NULL,
  PRIMARY KEY (`CD_USUARIO`),
  INDEX `fk_usuario_nivel1_idx` (`CD_NIVEL` ASC),
  CONSTRAINT `fk_usuario_nivel1`
    FOREIGN KEY (`CD_NIVEL`)
    REFERENCES `pedras`.`nivel` (`CD_NIVEL`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
