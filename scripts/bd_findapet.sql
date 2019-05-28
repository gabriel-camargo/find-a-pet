-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.36-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para bd_findapet
CREATE DATABASE IF NOT EXISTS `bd_findapet` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `bd_findapet`;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela bd_findapet.tbl_especies
CREATE TABLE IF NOT EXISTS `tbl_especies` (
  `esp_id` int(11) NOT NULL AUTO_INCREMENT,
  `esp_nome` varchar(45) NOT NULL,
  PRIMARY KEY (`esp_id`),
  UNIQUE KEY `esp_id_UNIQUE` (`esp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela bd_findapet.tbl_faixa_etaria
CREATE TABLE IF NOT EXISTS `tbl_faixa_etaria` (
  `fai_id` int(11) NOT NULL AUTO_INCREMENT,
  `fai_nome` varchar(45) NOT NULL,
  PRIMARY KEY (`fai_id`),
  UNIQUE KEY `fai_id_UNIQUE` (`fai_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela bd_findapet.tbl_portes
CREATE TABLE IF NOT EXISTS `tbl_portes` (
  `por_id` int(11) NOT NULL AUTO_INCREMENT,
  `por_nome` varchar(45) NOT NULL,
  PRIMARY KEY (`por_id`),
  UNIQUE KEY `por_id_UNIQUE` (`por_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela bd_findapet.tbl_status
CREATE TABLE IF NOT EXISTS `tbl_status` (
  `sta_id` int(11) NOT NULL AUTO_INCREMENT,
  `sta_nome` varchar(45) NOT NULL,
  `sta_tipo` varchar(20) NOT NULL,
  PRIMARY KEY (`sta_id`),
  UNIQUE KEY `sta_id_UNIQUE` (`sta_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela bd_findapet.tbl_usuarios
CREATE TABLE IF NOT EXISTS `tbl_usuarios` (
  `usu_id` int(11) NOT NULL AUTO_INCREMENT,
  `usu_nome` varchar(45) NOT NULL,
  `usu_email` varchar(50) NOT NULL,
  `usu_senha` varchar(255) NOT NULL,
  `usu_uf` varchar(2) DEFAULT NULL,
  `usu_cidade` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`usu_id`),
  UNIQUE KEY `usu_id_UNIQUE` (`usu_id`),
  UNIQUE KEY `usu_email` (`usu_email`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela bd_findapet.tbl_animais
CREATE TABLE IF NOT EXISTS `tbl_animais` (
  `ani_id` int(11) NOT NULL AUTO_INCREMENT,
  `ani_nome` varchar(45) NOT NULL,
  `ani_sexo` varchar(1) NOT NULL,
  `ani_informacoes` mediumtext,
  `ani_dt_hr` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usu_id` int(11) NOT NULL,
  `esp_id` int(11) NOT NULL,
  `fai_id` int(11) NOT NULL,
  `por_id` int(11) NOT NULL,
  `sta_id` int(11) NOT NULL,
  `ani_uf` varchar(2) NOT NULL,
  `ani_cidade` varchar(50) NOT NULL,
  PRIMARY KEY (`ani_id`),
  UNIQUE KEY `ani_id_UNIQUE` (`ani_id`),
  KEY `fk_cad_animais_cad_usuarios1_idx` (`usu_id`),
  KEY `fk_esp_id` (`esp_id`),
  KEY `fk_fai_id` (`fai_id`),
  KEY `fk_por_id` (`por_id`),
  KEY `fk_sta_id` (`sta_id`),
  CONSTRAINT `fk_cad_animais_cad_usuarios1` FOREIGN KEY (`usu_id`) REFERENCES `tbl_usuarios` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_esp_id` FOREIGN KEY (`esp_id`) REFERENCES `tbl_especies` (`esp_id`),
  CONSTRAINT `fk_fai_id` FOREIGN KEY (`fai_id`) REFERENCES `tbl_faixa_etaria` (`fai_id`),
  CONSTRAINT `fk_por_id` FOREIGN KEY (`por_id`) REFERENCES `tbl_portes` (`por_id`),
  CONSTRAINT `fk_sta_id` FOREIGN KEY (`sta_id`) REFERENCES `tbl_status` (`sta_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- Copiando estrutura para tabela bd_findapet.tbl_adocoes
CREATE TABLE IF NOT EXISTS `tbl_adocoes` (
  `ado_id` int(11) NOT NULL AUTO_INCREMENT,
  `ado_dt_hr_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ado_dt_hr_confirmacao` timestamp NULL DEFAULT NULL,
  `ado_texto` text,
  `ado_lido` char(1) NOT NULL DEFAULT 'n',
  `sta_id` int(11) NOT NULL,
  `usu_id` int(11) NOT NULL,
  `ani_id` int(11) NOT NULL,
  PRIMARY KEY (`ado_id`),
  UNIQUE KEY `ado_id` (`ado_id`),
  UNIQUE KEY `unique_key` (`usu_id`,`ani_id`,`sta_id`),
  KEY `fk_adocoes_cad_usuarios2_idx` (`usu_id`),
  KEY `fk_adocoes_cad_animais1_idx` (`ani_id`),
  KEY `fk_adocoes_status` (`sta_id`),
  CONSTRAINT `fk_adocoes_cad_animais1` FOREIGN KEY (`ani_id`) REFERENCES `tbl_animais` (`ani_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_adocoes_cad_usuarios2` FOREIGN KEY (`usu_id`) REFERENCES `tbl_usuarios` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_adocoes_status` FOREIGN KEY (`sta_id`) REFERENCES `tbl_status` (`sta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
