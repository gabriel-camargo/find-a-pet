-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.36-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              10.0.0.5460
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para bd_findapet
CREATE DATABASE IF NOT EXISTS `bd_findapet` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `bd_findapet`;

-- Copiando estrutura para tabela bd_findapet.tbl_especies
CREATE TABLE IF NOT EXISTS `tbl_especies` (
  `esp_id` int(11) NOT NULL AUTO_INCREMENT,
  `esp_nome` varchar(45) NOT NULL,
  PRIMARY KEY (`esp_id`),
  UNIQUE KEY `esp_id_UNIQUE` (`esp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela bd_findapet.tbl_especies: ~2 rows (aproximadamente)
DELETE FROM `tbl_especies`;
/*!40000 ALTER TABLE `tbl_especies` DISABLE KEYS */;
INSERT INTO `tbl_especies` (`esp_id`, `esp_nome`) VALUES
	(1, 'Cachorro'),
	(2, 'Gato');
/*!40000 ALTER TABLE `tbl_especies` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_findapet.tbl_faixa_etaria
CREATE TABLE IF NOT EXISTS `tbl_faixa_etaria` (
  `fai_id` int(11) NOT NULL AUTO_INCREMENT,
  `fai_nome` varchar(45) NOT NULL,
  PRIMARY KEY (`fai_id`),
  UNIQUE KEY `fai_id_UNIQUE` (`fai_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela bd_findapet.tbl_faixa_etaria: ~3 rows (aproximadamente)
DELETE FROM `tbl_faixa_etaria`;
/*!40000 ALTER TABLE `tbl_faixa_etaria` DISABLE KEYS */;
INSERT INTO `tbl_faixa_etaria` (`fai_id`, `fai_nome`) VALUES
	(1, 'Filhote'),
	(2, 'Comum'),
	(3, 'Velho');
/*!40000 ALTER TABLE `tbl_faixa_etaria` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_findapet.tbl_portes
CREATE TABLE IF NOT EXISTS `tbl_portes` (
  `por_id` int(11) NOT NULL AUTO_INCREMENT,
  `por_nome` varchar(45) NOT NULL,
  PRIMARY KEY (`por_id`),
  UNIQUE KEY `por_id_UNIQUE` (`por_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela bd_findapet.tbl_portes: ~3 rows (aproximadamente)
DELETE FROM `tbl_portes`;
/*!40000 ALTER TABLE `tbl_portes` DISABLE KEYS */;
INSERT INTO `tbl_portes` (`por_id`, `por_nome`) VALUES
	(1, 'Pequeno'),
	(2, 'Médio'),
	(3, 'Grande');
/*!40000 ALTER TABLE `tbl_portes` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_findapet.tbl_status
CREATE TABLE IF NOT EXISTS `tbl_status` (
  `sta_id` int(11) NOT NULL AUTO_INCREMENT,
  `sta_nome` varchar(45) NOT NULL,
  `sta_tipo` varchar(20) NOT NULL,
  PRIMARY KEY (`sta_id`),
  UNIQUE KEY `sta_id_UNIQUE` (`sta_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela bd_findapet.tbl_status: ~5 rows (aproximadamente)
DELETE FROM `tbl_status`;
/*!40000 ALTER TABLE `tbl_status` DISABLE KEYS */;
INSERT INTO `tbl_status` (`sta_id`, `sta_nome`, `sta_tipo`) VALUES
	(1, 'Em adoção', 'cad'),
	(2, 'Perdido', 'cad'),
	(3, 'Adotado', 'save'),
	(4, 'Encontrado', 'save'),
	(5, 'Arquivado', 'del');
/*!40000 ALTER TABLE `tbl_status` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
