-- MySQL dump 10.13  Distrib 5.6.23, for Win64 (x86_64)
--
-- Host: localhost    Database: bd_findapet
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cad_usuarios`
--

LOCK TABLES `cad_usuarios` WRITE;
/*!40000 ALTER TABLE `cad_usuarios` DISABLE KEYS */;
INSERT INTO `cad_usuarios` VALUES (1,NULL,'46614336886',NULL,'Ana Luiza R','ana','F','ana@email.com','123','123454678','123456789',NULL,'',0,NULL,'','','');
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

-- Dump completed on 2018-05-07  9:25:22
