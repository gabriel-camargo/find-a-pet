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
-- Table structure for table `adocoes`
--

DROP TABLE IF EXISTS `adocoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adocoes` (
  `ado_id` int(11) NOT NULL AUTO_INCREMENT,
  `ado_dt_hr` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usu_doador_id` int(11) NOT NULL,
  `usu_adotador_id` int(11) NOT NULL,
  `ani_id` int(11) NOT NULL,
  PRIMARY KEY (`ado_id`),
  KEY `fk_adocoes_cad_usuarios1_idx` (`usu_doador_id`),
  KEY `fk_adocoes_cad_usuarios2_idx` (`usu_adotador_id`),
  KEY `fk_adocoes_cad_animais1_idx` (`ani_id`),
  CONSTRAINT `fk_adocoes_cad_animais1` FOREIGN KEY (`ani_id`) REFERENCES `cad_animais` (`ani_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_adocoes_cad_usuarios1` FOREIGN KEY (`usu_doador_id`) REFERENCES `cad_usuarios` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_adocoes_cad_usuarios2` FOREIGN KEY (`usu_adotador_id`) REFERENCES `cad_usuarios` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adocoes`
--

LOCK TABLES `adocoes` WRITE;
/*!40000 ALTER TABLE `adocoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `adocoes` ENABLE KEYS */;
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
