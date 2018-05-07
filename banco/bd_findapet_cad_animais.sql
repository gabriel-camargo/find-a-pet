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
-- Table structure for table `cad_animais`
--

DROP TABLE IF EXISTS `cad_animais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cad_animais` (
  `ani_id` int(11) NOT NULL AUTO_INCREMENT,
  `ani_nome` varchar(45) NOT NULL,
  `ani_faixa_etaria` varchar(25) DEFAULT NULL,
  `ani_sexo` varchar(1) NOT NULL,
  `ani_informacoes` mediumtext,
  `ani_foto` mediumblob NOT NULL,
  `ani_status` varchar(15) NOT NULL,
  `usu_id` int(11) NOT NULL,
  `rac_id` int(11) NOT NULL,
  `ani_dt_hr` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ani_id`),
  UNIQUE KEY `ani_id_UNIQUE` (`ani_id`),
  KEY `fk_cad_animais_cad_usuarios1_idx` (`usu_id`),
  KEY `fk_cad_animais_raca1_idx` (`rac_id`),
  CONSTRAINT `fk_cad_animais_cad_usuarios1` FOREIGN KEY (`usu_id`) REFERENCES `cad_usuarios` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cad_animais_raca1` FOREIGN KEY (`rac_id`) REFERENCES `raca` (`rac_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cad_animais`
--

LOCK TABLES `cad_animais` WRITE;
/*!40000 ALTER TABLE `cad_animais` DISABLE KEYS */;
/*!40000 ALTER TABLE `cad_animais` ENABLE KEYS */;
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
