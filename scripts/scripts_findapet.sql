DROP TABLE IF EXISTS `cad_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cad_usuarios` (
  `usu_id` int(11) NOT NULL AUTO_INCREMENT,
  `usu_foto` mediumblob,
  `usu_nome` varchar(45) NOT NULL,
  `usu_email` varchar(50) NOT NULL,
  `usu_senha` varchar(45) NOT NULL,
  PRIMARY KEY (`usu_id`),
  UNIQUE KEY `usu_id_UNIQUE` (`usu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

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
  `ani_dt_hr` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ani_raca` varchar(45) NOT NULL,
  `ani_especie` varchar(45) NOT NULL,
  PRIMARY KEY (`ani_id`),
  UNIQUE KEY `ani_id_UNIQUE` (`ani_id`),
  KEY `fk_cad_animais_cad_usuarios1_idx` (`usu_id`),
  CONSTRAINT `fk_cad_animais_cad_usuarios1` FOREIGN KEY (`usu_id`) REFERENCES `cad_usuarios` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
