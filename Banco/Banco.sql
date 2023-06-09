-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: db_banco
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `chave_pix`
--

DROP TABLE IF EXISTS `chave_pix`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chave_pix` (
  `id` int NOT NULL AUTO_INCREMENT,
  `chave` varchar(255) NOT NULL,
  `tipo` enum('CPF','TELEFONE','EMAIL','ALEATORIA') NOT NULL,
  `id_conta` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `chave_UNIQUE` (`chave`),
  KEY `id_conta_idx` (`id_conta`),
  CONSTRAINT `id_conta` FOREIGN KEY (`id_conta`) REFERENCES `conta` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chave_pix`
--

LOCK TABLES `chave_pix` WRITE;
/*!40000 ALTER TABLE `chave_pix` DISABLE KEYS */;
INSERT INTO `chave_pix` VALUES (1,'1234567890','CPF',1),(2,'joao@example.com','EMAIL',2),(3,'987654321','TELEFONE',3);
/*!40000 ALTER TABLE `chave_pix` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conta`
--

DROP TABLE IF EXISTS `conta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `conta` (
  `id` int NOT NULL AUTO_INCREMENT,
  `numero` int NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `id_correntista` int NOT NULL,
  `saldo` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `numero_UNIQUE` (`numero`),
  KEY `id_correntista_idx` (`id_correntista`),
  CONSTRAINT `id_correntista` FOREIGN KEY (`id_correntista`) REFERENCES `correntista` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conta`
--

LOCK TABLES `conta` WRITE;
/*!40000 ALTER TABLE `conta` DISABLE KEYS */;
INSERT INTO `conta` VALUES (1,123456,'corrente','senhacorrente123',1,750),(2,654321,'poupança','senhapoupanca456',2,250),(3,789012,'investimento','senhainvestimento789',3,0),(4,987645,'aaaa','b04dbda4e25d8b9852c6f5e620478182c730e48b',1,0);
/*!40000 ALTER TABLE `conta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `correntista`
--

DROP TABLE IF EXISTS `correntista`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `correntista` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `cpf` char(11) NOT NULL,
  `data_nasc` date NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf_UNIQUE` (`cpf`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `correntista`
--

LOCK TABLES `correntista` WRITE;
/*!40000 ALTER TABLE `correntista` DISABLE KEYS */;
INSERT INTO `correntista` VALUES (1,'João Silva','11122233344','1990-05-10','senha123'),(2,'Maria Santos','55566677788','1985-01-15','abcd1234'),(3,'Pedro Oliveira','99988877766','2000-11-20','minhasenha'),(4,'John Doe','12312312399','1999-10-30','e010daea355cad8fdc048ced7942013616f038f8'),(6,'Jane Doe Update','12316612390','1999-10-30','e010daea355cad8fdc048ced7942013616f038f8'),(8,'Jane Doe Update','12316612398','1999-10-30','e010daea355cad8fdc048ced7942013616f038f8');
/*!40000 ALTER TABLE `correntista` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transacao`
--

DROP TABLE IF EXISTS `transacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transacao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data_transacao` date NOT NULL,
  `valor` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transacao`
--

LOCK TABLES `transacao` WRITE;
/*!40000 ALTER TABLE `transacao` DISABLE KEYS */;
INSERT INTO `transacao` VALUES (1,'2022-01-01',250),(2,'2022-01-02',150),(3,'2022-01-03',250),(4,'2022-01-04',150),(5,'2022-01-05',250),(6,'2022-01-06',150),(7,'2023-04-16',250);
/*!40000 ALTER TABLE `transacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transacao_conta`
--

DROP TABLE IF EXISTS `transacao_conta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transacao_conta` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_transacao` int NOT NULL,
  `id_remetente` int NOT NULL,
  `id_destinatario` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_remetente_idx` (`id_remetente`),
  KEY `id_destinatario_idx` (`id_destinatario`),
  KEY `id_transacao_idx` (`id_transacao`),
  CONSTRAINT `id_destinatario` FOREIGN KEY (`id_destinatario`) REFERENCES `conta` (`id`),
  CONSTRAINT `id_remetente` FOREIGN KEY (`id_remetente`) REFERENCES `conta` (`id`),
  CONSTRAINT `id_transacao` FOREIGN KEY (`id_transacao`) REFERENCES `transacao` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transacao_conta`
--

LOCK TABLES `transacao_conta` WRITE;
/*!40000 ALTER TABLE `transacao_conta` DISABLE KEYS */;
INSERT INTO `transacao_conta` VALUES (1,1,1,2),(2,2,2,1),(3,3,2,3),(4,4,3,2),(5,5,1,3),(6,6,3,1),(7,7,1,2);
/*!40000 ALTER TABLE `transacao_conta` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `transacao` AFTER INSERT ON `transacao_conta` FOR EACH ROW BEGIN
	DECLARE qnt DOUBLE;
    
    SELECT valor INTO qnt FROM transacao t WHERE id = NEW.id_transacao;
    
    UPDATE Conta SET saldo = saldo - qnt WHERE id = NEW.id_remetente;
    UPDATE Conta SET saldo = saldo + qnt WHERE id = NEW.id_destinatario;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-16 18:07:30
