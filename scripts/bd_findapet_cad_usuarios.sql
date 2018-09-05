-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bd_findapet
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.31-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cad_usuarios`
--

DROP TABLE IF EXISTS `cad_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cad_usuarios` (
  `usu_id` int(11) NOT NULL AUTO_INCREMENT,
  `usu_foto` mediumblob,
  `usu_cpf` varchar(11) DEFAULT NULL,
  `usu_cnpj` varchar(14) DEFAULT NULL,
  `usu_nome` varchar(45) NOT NULL,
  `usu_apelido` varchar(45) DEFAULT NULL,
  `usu_sexo` varchar(1) DEFAULT NULL,
  `usu_email` varchar(50) NOT NULL,
  `usu_senha` varchar(45) NOT NULL,
  `usu_telefone` varchar(10) DEFAULT NULL,
  `usu_celular` varchar(11) NOT NULL,
  `usu_cep` varchar(9) DEFAULT NULL,
  `usu_logradouro` varchar(50) NOT NULL,
  `usu_numero_end` int(11) NOT NULL,
  `usu_complemento` varchar(45) DEFAULT NULL,
  `usu_bairro` varchar(45) NOT NULL,
  `usu_cidade` varchar(45) NOT NULL,
  `usu_uf` varchar(2) NOT NULL,
  PRIMARY KEY (`usu_id`),
  UNIQUE KEY `usu_id_UNIQUE` (`usu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cad_usuarios`
--

LOCK TABLES `cad_usuarios` WRITE;
/*!40000 ALTER TABLE `cad_usuarios` DISABLE KEYS */;
INSERT INTO `cad_usuarios` VALUES (4,'','88888888888','','Nome Update','Apelido Update',NULL,'update@email.com','update','12121212','98706-7224','12000000','rua dos sei la update',0,'casa update','crispim update','Porto Grande','AP'),(6,'','','0676672','organizaÃ§Ã£o bonitima','botnirima','M','org@email.com','456','12121212','98706-7224','12402040','rua dos sei la',45,'casa','crispim','AbatiÃ¡','PR'),(7,'','44832783807','','Gabriel Rodrigo de Camargo','Gordealma','M','gabriel@email.com','123','1236452585','12987067224','12402040','Rua Soldado JosÃ© Fernandes',45,'Casa','Crispim','Pindamonhangaba','SP'),(8,'foto-de-perfil-menor.jpeg','44844844848','','Rodrigo de Camargo','Rodrigo','M','rodrigo@email.com','123','12121212','98989898','12402050','Rua Soldado JosÃ© Fernandes',45,'Casa','Crispim','TaboÃ£o da Serra','SP');
/*!40000 ALTER TABLE `cad_usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-31 16:06:50
