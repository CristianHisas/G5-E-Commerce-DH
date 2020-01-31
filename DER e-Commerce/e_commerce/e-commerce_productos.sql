CREATE DATABASE  IF NOT EXISTS `e-commerce` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `e-commerce`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: e-commerce
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.8-MariaDB

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
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) NOT NULL,
  `id_marca` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descripcion` varchar(1000) DEFAULT NULL,
  `precio` float unsigned NOT NULL DEFAULT 0,
  `img` varchar(10000) NOT NULL,
  `descuento` float DEFAULT NULL,
  PRIMARY KEY (`id_producto`),
  UNIQUE KEY `id_producto_UNIQUE` (`id_producto`),
  KEY `id_marca_idx` (`id_marca`),
  KEY `id_categoria_idx` (`id_categoria`),
  CONSTRAINT `id_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_marca` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id_marca`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,1,4,'Nokia 7.1',23,'                                                                    \r\n\r\n    Cámara secundaria: 8 mpx\r\n    Sistema Operativo: Android 9.0\r\n    Tipo de SIM: Nano-SIM\r\n    Red: 2G, 3G, 4G\r\n    Frecuencia 2G: 850/900/1800/1900 MHz\r\n    Frecuencia 3G: 850/900/1700/1900/2100 MHz\r\n    Frecuencia 4G: Bandas 1, 2, 3, 4, 5, 7, 8, 12, 17, 28, 40.\r\n    Batería: 3060 mAh\r\n    Batería en modo Stand By: 408 h\r\n    Tiempo de conversación: 19 h\r\n    Memoria RAM: 4 GB\r\n    Memoria Interna: 64 GB | Disponibles 50 GB\r\n    Memoria Externa: MicroSD hasta 256 GB\r\n    Peso: 160 g\r\n    Dimensión del equipo: 149,7 x 71,2 x 8 mm\r\n    Bluetooth: Si\r\n    Marcación por Voz: Si\r\n    Llamadas por WiFi: Si                                    ',29000,'img/productos/Nokia 7.1/phone5e3195b051393.jpg',0),(2,1,3,' Moto E5 Play',20,'\r\n\r\n    Cámara secundaria: 5 mpx con flash\r\n    Sistema Operativo: Android Go 8.0\r\n    Tipo de SIM: Nano-SIM\r\n    Red: 2G, 3G, 4G\r\n    Frecuencia 2G: 850/900/1800/1900 MHz\r\n    Frecuencia 3G: 850/900/1700/1900/2100 MHz\r\n    Frecuencia 4G: Bandas 1, 2, 3, 4, 5, 7, 28.\r\n    Batería: 2100 mAh\r\n    Batería en modo Stand By: 24 h\r\n    Tiempo de conversación: 24 h\r\n    Memoria RAM: 1 GB\r\n    Memoria Interna: 16 GB | Disponibles 11 GB\r\n    Memoria Externa: MicroSD hasta 128 GB\r\n    Peso: 152 g\r\n    Dimensión del equipo: 147,8 x 71,2 x 9,19 mm\r\n    Bluetooth: Si\r\n    Marcación por Voz: Si\r\n    Llamadas por WiFi: Si',8000,'img/productos/ Moto E5 Play/phone5e320d0e5fc91.jpg',0);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-01-29 20:49:58
