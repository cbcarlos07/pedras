-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 16-Jul-2017 às 16:05
-- Versão do servidor: 10.0.29-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 7.0.13-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pedras`
--
CREATE SCHEMA IF NOT EXISTS `pedras` DEFAULT CHARACTER SET utf8 ;
USE `pedras` ;
-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--

CREATE TABLE `cargo` (
  `CD_CARGO` int(11) NOT NULL,
  `DS_CARGO` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE `cidade` (
  `CD_CIDADE` int(10) UNSIGNED NOT NULL,
  `NM_CIDADE` varchar(50) DEFAULT NULL,
  `CD_UF` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `classes`
--

CREATE TABLE `classes` (
  `CD_CLASSE` int(10) UNSIGNED NOT NULL,
  `DS_CLASSE` varchar(45) DEFAULT NULL,
  `TP_CLASSE` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `CD_LIDERANCA` int(11) NOT NULL,
  `DS_LIDERANCA` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `desbravador`
--

CREATE TABLE `desbravador` (
  `CD_DESB` int(10) UNSIGNED NOT NULL,
  `NM_DESBRAVADOR` varchar(100) DEFAULT NULL,
  `DS_SEXO` char(1) DEFAULT NULL,
  `DT_NASC` date DEFAULT NULL,
  `CD_CIDADE` int(10) UNSIGNED NOT NULL,
  `SN_BATIZADO` char(1) DEFAULT NULL,
  `CD_RELIGIAO` int(10) UNSIGNED NOT NULL,
  `SN_RECEBEU_LENCO` char(1) DEFAULT NULL,
  `DT_RECEBEU_LENCO` date DEFAULT NULL,
  `DS_FOTO` blob,
  `NR_CEP` varchar(8) DEFAULT NULL,
  `DS_EMAIL` varchar(45) DEFAULT NULL,
  `SN_ATIVO` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `desb_cargo`
--

CREATE TABLE `desb_cargo` (
  `CD_CARGO` int(11) NOT NULL,
  `CD_DESB` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `desb_unidade`
--

CREATE TABLE `desb_unidade` (
  `CD_UNIDADE` int(11) NOT NULL,
  `CD_DESB` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `especialidade`
--

CREATE TABLE `especialidade` (
  `CD_ESPECIALIDADE` int(11) NOT NULL,
  `DS_ESPECIALIDADE` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `espec_desb`
--

CREATE TABLE `espec_desb` (
  `CD_ESPECIALIDADE` int(11) NOT NULL,
  `IMG_CERTIFICADO` blob,
  `CD_DESB` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento`
--

CREATE TABLE `evento` (
  `CD_EVENTO` int(10) UNSIGNED NOT NULL,
  `DS_EVENTO` varchar(45) DEFAULT NULL,
  `PRECO_PESSOA` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `filiacao`
--

CREATE TABLE `filiacao` (
  `CD_FILIACAO` int(10) UNSIGNED NOT NULL,
  `CD_DESB` int(10) UNSIGNED NOT NULL,
  `CD_RESPONSAVEL` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fone_desb`
--

CREATE TABLE `fone_desb` (
  `CD_DESB` int(10) UNSIGNED NOT NULL,
  `CD_FONE` int(11) NOT NULL,
  `NR_FONE` varchar(11) DEFAULT NULL,
  `OBS_FONE` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fone_resp`
--

CREATE TABLE `fone_resp` (
  `CD_FONE` int(10) UNSIGNED NOT NULL,
  `NR_FONE` varchar(11) DEFAULT NULL,
  `CD_RESPONSAVEL` int(10) UNSIGNED NOT NULL,
  `FONE_OBS` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `identificacao`
--

CREATE TABLE `identificacao` (
  `CD_DESB` int(10) UNSIGNED NOT NULL,
  `NR_CARTAO_SUS` varchar(45) DEFAULT NULL,
  `SN_POSSUI_PLANO` varchar(45) DEFAULT NULL,
  `DS_PLANO` varchar(90) DEFAULT NULL,
  `DADO_CARTAO_VAC` char(1) DEFAULT NULL COMMENT 'A - ATUALIZADO\nT - ATRASADO\nS - SEM INFORMACAO\nN - NAO TEM CARTAO',
  `VIVE_COM` char(1) DEFAULT NULL COMMENT 'D - PAIS\nP - SO COM PAI\nM - SO COM MAE\nO - OUTROS',
  `DS_OUTRO_VIVE` varchar(45) DEFAULT NULL,
  `DOENCA` char(1) DEFAULT NULL COMMENT 'C - CATAPORA\nM - MENINGITE\nH - HEPATITE\nD - DENGUE\nP - PNEUMONIA\n',
  `ALERGIA` char(1) DEFAULT NULL COMMENT 'P - NA PELE\nA - ALIMENTAR\nB - BRONQUITE\nR - RENITE\nO - OUTRA',
  `DS_ALERGIA` varchar(45) DEFAULT NULL,
  `SN_DOENCA_CORACAO` char(1) DEFAULT NULL,
  `DS_DOENCA_CORACAO` varchar(45) DEFAULT NULL,
  `SN_FAZ_ACOM_CORACAO` char(1) DEFAULT NULL,
  `DS_LOCAL_MEDIC_CORACAO` varchar(45) DEFAULT NULL,
  `SN_ALERGIA_MEDICAMENTO` char(1) DEFAULT NULL,
  `DS_ALERGIA_MEDICAMENTO` varchar(45) DEFAULT NULL,
  `SN_INTOLERANCIA_LACTOSE` char(1) DEFAULT NULL,
  `SN_DEFICIENCIA_VIT_NUT` char(1) DEFAULT NULL,
  `DS_DEFICIENCIA_VIT_NUT` varchar(45) DEFAULT NULL,
  `SN_DESMAIO_CONVULSAO` char(1) DEFAULT NULL,
  `DT_ULTIM_DESMAIO_CONVULSAO` date DEFAULT NULL,
  `SN_TOMA_MEDICACAO` char(1) DEFAULT NULL,
  `DS_TOMA_MEDICAO` varchar(45) DEFAULT NULL,
  `DS_PRAQUE_TOMA_MEDICACAO` varchar(45) DEFAULT NULL,
  `SN_ACOMP_MEDIC_TOMA_MEDICACAO` char(1) DEFAULT NULL,
  `SN_DIABETES` char(1) DEFAULT NULL,
  `SN_FAZ_TRAT_DIABETES` char(1) DEFAULT NULL,
  `DS_FAZ_TRAT_DIABETES` varchar(45) DEFAULT NULL,
  `SN_ALGUMA_CIRURGIA` char(1) DEFAULT NULL,
  `DS_ALGUMA_CIRURGIA` varchar(45) DEFAULT NULL,
  `SN_ESTEVE_INTERNADO` char(1) DEFAULT NULL,
  `DS_ESTEVE_INTERNADO` varchar(45) DEFAULT NULL,
  `GRUPO_SANG` varchar(2) DEFAULT NULL,
  `FATOR_RH` char(1) DEFAULT NULL,
  `SN_RECEBEU_TRANSFUSAO_SANG` char(1) DEFAULT NULL,
  `DT_RECEBEU_TRANSFUSAO_SANG` date DEFAULT NULL,
  `OBSERVACAO` varchar(255) DEFAULT NULL,
  `NM_RESPONSAVEL` varchar(45) DEFAULT NULL,
  `DT_ASSINATURA` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `investidura`
--

CREATE TABLE `investidura` (
  `CD_CLASSE` int(10) UNSIGNED NOT NULL,
  `DT_INVESTIDURA` date DEFAULT NULL,
  `IMG_CERTIFICADO` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lideranca`
--

CREATE TABLE `lideranca` (
  `CD_DESB` int(10) UNSIGNED NOT NULL,
  `CD_LIDERANCA` int(11) NOT NULL,
  `DT_INVESTIDURA` date DEFAULT NULL,
  `IMG_CERTIFICADO` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `medico`
--

CREATE TABLE `medico` (
  `TIPO_SANGUINEO` varchar(3) DEFAULT NULL,
  `FATOR_RH` char(1) DEFAULT NULL,
  `SN_VAC_CONT_TET` char(1) DEFAULT NULL,
  `DT_VAC_CONT_TET` date DEFAULT NULL,
  `DS_DOENCA` varchar(255) DEFAULT NULL,
  `DS_ALERGIA` varchar(255) DEFAULT NULL,
  `ACIDENTE_AVISAR` varchar(255) DEFAULT NULL,
  `desbravador_CD_DESB` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel`
--

CREATE TABLE `nivel` (
  `CD_NIVEL` int(10) UNSIGNED NOT NULL,
  `DS_NIVEL` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `nivel`
--

INSERT INTO `nivel` (`CD_NIVEL`, `DS_NIVEL`) VALUES
(1, 'Administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `CD_DESB` int(10) UNSIGNED NOT NULL,
  `CD_PROJETO` int(10) UNSIGNED NOT NULL,
  `NR_VALOR` decimal(10,2) DEFAULT NULL,
  `DT_PAGTO` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pgto_desb`
--

CREATE TABLE `pgto_desb` (
  `CD_DESB` int(11) UNSIGNED NOT NULL,
  `CD_PROJETO` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `religiao`
--

CREATE TABLE `religiao` (
  `CD_RELIGIAO` int(10) UNSIGNED NOT NULL,
  `NM_RELIGIAO` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `responsavel`
--

CREATE TABLE `responsavel` (
  `CD_RESPONSAVEL` int(10) UNSIGNED NOT NULL,
  `NM_RESPONSAVEL` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `uf`
--

CREATE TABLE `uf` (
  `CD_UF` int(10) UNSIGNED NOT NULL,
  `NM_UF` varchar(30) DEFAULT NULL,
  `SIGLA_UF` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidade`
--

CREATE TABLE `unidade` (
  `CD_UNIDADE` int(11) NOT NULL,
  `DS_UNIDADE` varchar(45) DEFAULT NULL,
  `CATEGORIA` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `CD_USUARIO` int(10) UNSIGNED NOT NULL,
  `DS_LOGIN` varchar(45) DEFAULT NULL,
  `NM_USUARIO` varchar(100) DEFAULT NULL,
  `DS_SENHA` varchar(100) DEFAULT NULL,
  `SN_ATIVO` char(1) DEFAULT NULL,
  `CD_NIVEL` int(10) UNSIGNED NOT NULL,
  `SN_SENHA_ATUAL` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`CD_USUARIO`, `DS_LOGIN`, `NM_USUARIO`, `DS_SENHA`, `SN_ATIVO`, `CD_NIVEL`, `SN_SENHA_ATUAL`) VALUES
(1, 'admin', 'Administrador', '25d55ad283aa400af464c76d713c07ad', 'S', 1, 'S');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`CD_CARGO`);

--
-- Indexes for table `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`CD_CIDADE`),
  ADD KEY `fk_cidade_uf1_idx` (`CD_UF`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`CD_CLASSE`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`CD_LIDERANCA`);

--
-- Indexes for table `desbravador`
--
ALTER TABLE `desbravador`
  ADD PRIMARY KEY (`CD_DESB`),
  ADD KEY `fk_desbravador_cidade1_idx` (`CD_CIDADE`),
  ADD KEY `fk_desbravador_religiao1_idx` (`CD_RELIGIAO`);

--
-- Indexes for table `desb_cargo`
--
ALTER TABLE `desb_cargo`
  ADD KEY `fk_desb_cargo_cargo1_idx` (`CD_CARGO`),
  ADD KEY `fk_desb_cargo_desbravador1_idx` (`CD_DESB`);

--
-- Indexes for table `desb_unidade`
--
ALTER TABLE `desb_unidade`
  ADD KEY `fk_desb_unidade_unidade1_idx` (`CD_UNIDADE`),
  ADD KEY `fk_desb_unidade_desbravador1_idx` (`CD_DESB`);

--
-- Indexes for table `especialidade`
--
ALTER TABLE `especialidade`
  ADD PRIMARY KEY (`CD_ESPECIALIDADE`);

--
-- Indexes for table `espec_desb`
--
ALTER TABLE `espec_desb`
  ADD KEY `fk_ESPEC_DESB_especialidade1_idx` (`CD_ESPECIALIDADE`),
  ADD KEY `fk_espec_desb_desbravador1_idx` (`CD_DESB`);

--
-- Indexes for table `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`CD_EVENTO`);

--
-- Indexes for table `filiacao`
--
ALTER TABLE `filiacao`
  ADD PRIMARY KEY (`CD_FILIACAO`),
  ADD KEY `fk_filiacao_responsavel1_idx` (`CD_RESPONSAVEL`),
  ADD KEY `fk_filiacao_desbravador1_idx` (`CD_DESB`);

--
-- Indexes for table `fone_desb`
--
ALTER TABLE `fone_desb`
  ADD PRIMARY KEY (`CD_FONE`),
  ADD KEY `fk_fone_desb_desbravador1_idx` (`CD_DESB`);

--
-- Indexes for table `fone_resp`
--
ALTER TABLE `fone_resp`
  ADD PRIMARY KEY (`CD_FONE`),
  ADD KEY `fk_fone_resp_responsavel1_idx` (`CD_RESPONSAVEL`);

--
-- Indexes for table `identificacao`
--
ALTER TABLE `identificacao`
  ADD KEY `fk_identificacao_desbravador1_idx` (`CD_DESB`);

--
-- Indexes for table `investidura`
--
ALTER TABLE `investidura`
  ADD KEY `fk_investidura_classes1_idx` (`CD_CLASSE`);

--
-- Indexes for table `lideranca`
--
ALTER TABLE `lideranca`
  ADD KEY `fk_lideranca_curso1_idx` (`CD_LIDERANCA`),
  ADD KEY `fk_lideranca_desbravador1_idx` (`CD_DESB`);

--
-- Indexes for table `medico`
--
ALTER TABLE `medico`
  ADD KEY `fk_medico_desbravador1_idx` (`desbravador_CD_DESB`);

--
-- Indexes for table `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`CD_NIVEL`);

--
-- Indexes for table `pagamento`
--
ALTER TABLE `pagamento`
  ADD KEY `fk_pagamento_projeto1_idx` (`CD_PROJETO`),
  ADD KEY `fk_pagamento_desbravador1_idx` (`CD_DESB`);

--
-- Indexes for table `pgto_desb`
--
ALTER TABLE `pgto_desb`
  ADD KEY `fk_pgto_evento_desbravador1_idx` (`CD_DESB`),
  ADD KEY `fk_pgto_evento_projeto1_idx` (`CD_PROJETO`);

--
-- Indexes for table `religiao`
--
ALTER TABLE `religiao`
  ADD PRIMARY KEY (`CD_RELIGIAO`);

--
-- Indexes for table `responsavel`
--
ALTER TABLE `responsavel`
  ADD PRIMARY KEY (`CD_RESPONSAVEL`);

--
-- Indexes for table `uf`
--
ALTER TABLE `uf`
  ADD PRIMARY KEY (`CD_UF`);

--
-- Indexes for table `unidade`
--
ALTER TABLE `unidade`
  ADD PRIMARY KEY (`CD_UNIDADE`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`CD_USUARIO`),
  ADD KEY `fk_usuario_nivel1_idx` (`CD_NIVEL`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cidade`
--
ALTER TABLE `cidade`
  MODIFY `CD_CIDADE` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `CD_CLASSE` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `desbravador`
--
ALTER TABLE `desbravador`
  MODIFY `CD_DESB` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `evento`
--
ALTER TABLE `evento`
  MODIFY `CD_EVENTO` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `filiacao`
--
ALTER TABLE `filiacao`
  MODIFY `CD_FILIACAO` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fone_resp`
--
ALTER TABLE `fone_resp`
  MODIFY `CD_FONE` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nivel`
--
ALTER TABLE `nivel`
  MODIFY `CD_NIVEL` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `religiao`
--
ALTER TABLE `religiao`
  MODIFY `CD_RELIGIAO` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `responsavel`
--
ALTER TABLE `responsavel`
  MODIFY `CD_RESPONSAVEL` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `uf`
--
ALTER TABLE `uf`
  MODIFY `CD_UF` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `CD_USUARIO` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cidade`
--
ALTER TABLE `cidade`
  ADD CONSTRAINT `fk_cidade_uf1` FOREIGN KEY (`CD_UF`) REFERENCES `uf` (`CD_UF`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `desbravador`
--
ALTER TABLE `desbravador`
  ADD CONSTRAINT `fk_desbravador_cidade1` FOREIGN KEY (`CD_CIDADE`) REFERENCES `cidade` (`CD_CIDADE`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_desbravador_religiao1` FOREIGN KEY (`CD_RELIGIAO`) REFERENCES `religiao` (`CD_RELIGIAO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `desb_cargo`
--
ALTER TABLE `desb_cargo`
  ADD CONSTRAINT `fk_desb_cargo_cargo1` FOREIGN KEY (`CD_CARGO`) REFERENCES `cargo` (`CD_CARGO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_desb_cargo_desbravador1` FOREIGN KEY (`CD_DESB`) REFERENCES `desbravador` (`CD_DESB`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `desb_unidade`
--
ALTER TABLE `desb_unidade`
  ADD CONSTRAINT `fk_desb_unidade_desbravador1` FOREIGN KEY (`CD_DESB`) REFERENCES `desbravador` (`CD_DESB`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_desb_unidade_unidade1` FOREIGN KEY (`CD_UNIDADE`) REFERENCES `unidade` (`CD_UNIDADE`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `espec_desb`
--
ALTER TABLE `espec_desb`
  ADD CONSTRAINT `fk_ESPEC_DESB_especialidade1` FOREIGN KEY (`CD_ESPECIALIDADE`) REFERENCES `especialidade` (`CD_ESPECIALIDADE`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_espec_desb_desbravador1` FOREIGN KEY (`CD_DESB`) REFERENCES `desbravador` (`CD_DESB`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `filiacao`
--
ALTER TABLE `filiacao`
  ADD CONSTRAINT `fk_filiacao_desbravador1` FOREIGN KEY (`CD_DESB`) REFERENCES `desbravador` (`CD_DESB`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_filiacao_responsavel1` FOREIGN KEY (`CD_RESPONSAVEL`) REFERENCES `responsavel` (`CD_RESPONSAVEL`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `fone_desb`
--
ALTER TABLE `fone_desb`
  ADD CONSTRAINT `fk_fone_desb_desbravador1` FOREIGN KEY (`CD_DESB`) REFERENCES `desbravador` (`CD_DESB`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `fone_resp`
--
ALTER TABLE `fone_resp`
  ADD CONSTRAINT `fk_fone_resp_responsavel1` FOREIGN KEY (`CD_RESPONSAVEL`) REFERENCES `responsavel` (`CD_RESPONSAVEL`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `identificacao`
--
ALTER TABLE `identificacao`
  ADD CONSTRAINT `fk_identificacao_desbravador1` FOREIGN KEY (`CD_DESB`) REFERENCES `desbravador` (`CD_DESB`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `investidura`
--
ALTER TABLE `investidura`
  ADD CONSTRAINT `fk_investidura_classes1` FOREIGN KEY (`CD_CLASSE`) REFERENCES `classes` (`CD_CLASSE`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `lideranca`
--
ALTER TABLE `lideranca`
  ADD CONSTRAINT `fk_lideranca_curso1` FOREIGN KEY (`CD_LIDERANCA`) REFERENCES `curso` (`CD_LIDERANCA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_lideranca_desbravador1` FOREIGN KEY (`CD_DESB`) REFERENCES `desbravador` (`CD_DESB`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `medico`
--
ALTER TABLE `medico`
  ADD CONSTRAINT `fk_medico_desbravador1` FOREIGN KEY (`desbravador_CD_DESB`) REFERENCES `desbravador` (`CD_DESB`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD CONSTRAINT `fk_pagamento_desbravador1` FOREIGN KEY (`CD_DESB`) REFERENCES `desbravador` (`CD_DESB`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pagamento_projeto1` FOREIGN KEY (`CD_PROJETO`) REFERENCES `evento` (`CD_EVENTO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pgto_desb`
--
ALTER TABLE `pgto_desb`
  ADD CONSTRAINT `fk_pgto_evento_projeto1` FOREIGN KEY (`CD_PROJETO`) REFERENCES `evento` (`CD_EVENTO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_nivel1` FOREIGN KEY (`CD_NIVEL`) REFERENCES `nivel` (`CD_NIVEL`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
