-- MySQL dump 10.13  Distrib 5.5.41, for Win32 (AMD64)
--
-- Host: localhost    Database: bodega
-- ------------------------------------------------------
-- Server version	5.5.41-log

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
-- Table structure for table `cargo`
--

DROP TABLE IF EXISTS `cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargo` (
  `id_cargo` int(11) NOT NULL AUTO_INCREMENT,
  `NombreCargo` varchar(51) NOT NULL,
  `Descripcion` varchar(61) NOT NULL,
  PRIMARY KEY (`id_cargo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargo`
--

LOCK TABLES `cargo` WRITE;
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `id_Categoria` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(61) NOT NULL,
  `Material` varchar(45) NOT NULL,
  PRIMARY KEY (`id_Categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'RECTO','CARBURO'),(2,'VERTICAL','CARBURO'),(3,'CENTRO','NULL'),(4,'BOLA','CARBURO'),(5,'IZQUIERDO','AZUL'),(6,'IZQUIERDO','AZUL'),(7,'VERTICAL','ACERO ALTA VELOCIDAD');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_solicitud`
--

DROP TABLE IF EXISTS `detalle_solicitud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_solicitud` (
  `id_D_Solicitud` int(11) NOT NULL AUTO_INCREMENT,
  `id_Herramientas` int(11) NOT NULL,
  `id_Maquina` int(11) NOT NULL,
  `id_Solicitud` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id_D_Solicitud`),
  KEY `id_Solicitud` (`id_Solicitud`),
  KEY `id_Herramientas` (`id_Herramientas`),
  KEY `id_Maquina` (`id_Maquina`),
  CONSTRAINT `detalle_solicitud_ibfk_1` FOREIGN KEY (`id_Solicitud`) REFERENCES `solicitud` (`id_Solicitud`),
  CONSTRAINT `detalle_solicitud_ibfk_2` FOREIGN KEY (`id_Herramientas`) REFERENCES `herramientas` (`id_Herramienta`),
  CONSTRAINT `detalle_solicitud_ibfk_3` FOREIGN KEY (`id_Maquina`) REFERENCES `maquinaria` (`id_Maquinaria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_solicitud`
--

LOCK TABLES `detalle_solicitud` WRITE;
/*!40000 ALTER TABLE `detalle_solicitud` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_solicitud` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleado` (
  `id_Empleado` int(11) NOT NULL AUTO_INCREMENT,
  `id_cargo` int(11) NOT NULL,
  `Nombre(s)` varchar(45) NOT NULL,
  `Apellidos` varchar(45) NOT NULL,
  `N°Empleado` int(21) NOT NULL,
  `Sexo` varchar(51) NOT NULL,
  PRIMARY KEY (`id_Empleado`),
  KEY `id_cargo` (`id_cargo`),
  KEY `id_cargo_2` (`id_cargo`),
  CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleado`
--

LOCK TABLES `empleado` WRITE;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gavilanes`
--

DROP TABLE IF EXISTS `gavilanes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gavilanes` (
  `id_Gav` int(11) NOT NULL AUTO_INCREMENT,
  `Num_gavilanes` int(15) NOT NULL,
  PRIMARY KEY (`id_Gav`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gavilanes`
--

LOCK TABLES `gavilanes` WRITE;
/*!40000 ALTER TABLE `gavilanes` DISABLE KEYS */;
INSERT INTO `gavilanes` VALUES (1,2),(2,4),(3,6);
/*!40000 ALTER TABLE `gavilanes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `herramientas`
--

DROP TABLE IF EXISTS `herramientas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `herramientas` (
  `id_Herramienta` int(11) NOT NULL AUTO_INCREMENT,
  `id_Categoria` int(11) NOT NULL,
  `Nombre` varchar(71) NOT NULL,
  `id_Gavilanes` int(11) NOT NULL,
  `id_Medidas` int(11) NOT NULL,
  `PrecioCompra` int(11) NOT NULL,
  `Cantidad` int(21) NOT NULL,
  `Total` float NOT NULL,
  `Fecha_Hora` datetime NOT NULL,
  PRIMARY KEY (`id_Herramienta`),
  KEY `id_Medidas` (`id_Medidas`),
  KEY `id_Gavilanes` (`id_Gavilanes`),
  KEY `id_Categoria` (`id_Categoria`),
  CONSTRAINT `herramientas_ibfk_1` FOREIGN KEY (`id_Categoria`) REFERENCES `categorias` (`id_Categoria`),
  CONSTRAINT `herramientas_ibfk_2` FOREIGN KEY (`id_Gavilanes`) REFERENCES `gavilanes` (`id_Gav`),
  CONSTRAINT `herramientas_ibfk_3` FOREIGN KEY (`id_Medidas`) REFERENCES `medidas` (`id_Medidas`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `herramientas`
--

LOCK TABLES `herramientas` WRITE;
/*!40000 ALTER TABLE `herramientas` DISABLE KEYS */;
INSERT INTO `herramientas` VALUES (1,2,'Cortador',2,15,0,2,0,'2022-03-23 17:23:27'),(2,2,'Cortador',2,16,0,1,0,'2022-03-23 17:21:51'),(3,2,'Cortador',2,17,0,7,0,'2022-04-06 04:04:00'),(4,2,'Cortador',2,18,0,4,0,'2022-04-06 04:04:00'),(5,2,'Cortador',2,19,0,1,0,'2022-04-06 04:04:00'),(6,2,'Cortador',2,14,0,2,0,'2022-04-06 04:04:00'),(7,2,'Cortador',2,21,0,2,0,'2022-04-06 04:25:00'),(8,2,'Cortador',2,22,0,1,0,'2022-04-06 04:25:00'),(9,7,'Cortador',2,23,0,5,0,'2022-04-06 04:32:00'),(10,7,'Cortador',2,24,0,3,0,'2022-04-06 04:32:00'),(11,7,'Cortador',2,25,0,1,0,'2022-04-06 04:37:00'),(12,7,'Cortador',2,26,0,2,0,'2022-04-06 04:37:00'),(13,4,'Cortador',2,14,0,1,0,'2022-04-06 04:51:00'),(14,4,'Cortador',2,30,0,2,0,'2022-04-06 04:51:00'),(15,4,'Cortador',1,18,0,2,0,'2022-04-06 04:59:00'),(16,4,'Cortador',2,27,0,1,0,'2022-04-06 04:59:00'),(17,4,'Cortador',2,17,0,2,0,'2022-04-06 05:02:11'),(18,4,'Cortador',1,17,0,1,0,'2022-04-06 05:02:19'),(19,4,'Cortador',2,18,0,2,0,'2022-04-07 10:24:44'),(20,4,'Cortador',2,7,0,2,0,'2022-04-07 10:26:20'),(21,4,'Cortador',2,5,0,1,0,'2022-04-07 10:27:35'),(22,4,'Cortador',2,5,0,0,0,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `herramientas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maquinaria`
--

DROP TABLE IF EXISTS `maquinaria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `maquinaria` (
  `id_Maquinaria` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(61) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `En uso` int(11) NOT NULL,
  PRIMARY KEY (`id_Maquinaria`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maquinaria`
--

LOCK TABLES `maquinaria` WRITE;
/*!40000 ALTER TABLE `maquinaria` DISABLE KEYS */;
INSERT INTO `maquinaria` VALUES (1,'Torno',5,3),(2,'Fresadora',2,1),(3,'Centro de Maquinado',3,2),(4,'Cierra Radeal',3,1),(5,'Cierra de Banco',3,3),(6,'Soldadora Micro-alambre ',1,1),(7,'Taladro',2,1),(8,'Soldadora Tif',1,1),(9,'Lija Vertical',1,1),(10,'Plasma CNC',1,1);
/*!40000 ALTER TABLE `maquinaria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medidas`
--

DROP TABLE IF EXISTS `medidas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medidas` (
  `id_Medidas` int(11) NOT NULL AUTO_INCREMENT,
  `Ancho` varchar(11) DEFAULT NULL,
  `Largo` varchar(15) NOT NULL,
  PRIMARY KEY (`id_Medidas`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medidas`
--

LOCK TABLES `medidas` WRITE;
/*!40000 ALTER TABLE `medidas` DISABLE KEYS */;
INSERT INTO `medidas` VALUES (1,'3/8\'\'','4\'\''),(2,'1/4\'\'','2.5\'\''),(3,'1/4\'\'','4\'\''),(4,'1/2\'\'','4\'\''),(5,'1/2\'\'','6\'\''),(6,'14.0mm','NULL'),(7,'1/2\'\'','3\'\''),(8,'3/4\'\'','20mm'),(9,'8mm','2.5'),(10,'5/8\'\'','3 3/4\'\''),(11,'9mm','2 3/4'),(12,'5.0mm','2\'\''),(13,'1/8\'\'','1.5'),(14,'3/16\'\'','2\'\''),(15,'3/3\'\'','2 1/2\'\''),(16,'10.0mm','0.3937'),(17,'1/4\'\'','2 1/2\'\''),(18,'3/8\'\'','2 1/2\'\''),(19,'20.00mm','0.7874\'\''),(21,'3/32\'\'','1 1/2\'\''),(22,'3.50 mm','0.1378\'\''),(23,'5.00mm','NULL'),(24,'5/8\'\'','5/8\'\''),(25,'8.00mm','NULL'),(26,'8.00mm','0.3150\'\''),(27,'5/16\'\'','2 1/2\'\''),(30,'1/8\'\'','1 1/2\'\'');
/*!40000 ALTER TABLE `medidas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitud`
--

DROP TABLE IF EXISTS `solicitud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solicitud` (
  `id_Solicitud` int(11) NOT NULL AUTO_INCREMENT,
  `id_Empleado` int(11) NOT NULL,
  `Fecha_Hora` datetime NOT NULL,
  PRIMARY KEY (`id_Solicitud`),
  KEY `id_Empleado` (`id_Empleado`),
  CONSTRAINT `solicitud_ibfk_1` FOREIGN KEY (`id_Empleado`) REFERENCES `empleado` (`id_Empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitud`
--

LOCK TABLES `solicitud` WRITE;
/*!40000 ALTER TABLE `solicitud` DISABLE KEYS */;
/*!40000 ALTER TABLE `solicitud` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id_us` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  `Apellidos` varchar(45) NOT NULL,
  `user` varchar(45) NOT NULL,
  `pass` varchar(45) NOT NULL,
  `Num_empleado` int(101) NOT NULL,
  `Estado` varchar(8) NOT NULL,
  PRIMARY KEY (`id_us`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Gerardo','Jimenez Castillo','gerardo','*6BB4837EB74329105EE4568DDA7DC67ED2CA2AD9',1559357,'Activo');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-08 16:18:54
