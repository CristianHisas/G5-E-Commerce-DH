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
-- Table structure for table `carritos`
--

DROP TABLE IF EXISTS `carritos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carritos` (
  `id_carrito` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `total` float NOT NULL,
  PRIMARY KEY (`id_carrito`),
  UNIQUE KEY `id_usuario_UNIQUE` (`id_usuario`),
  UNIQUE KEY `id_carrito_UNIQUE` (`id_carrito`),
  CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carritos`
--

LOCK TABLES `carritos` WRITE;
/*!40000 ALTER TABLE `carritos` DISABLE KEYS */;
/*!40000 ALTER TABLE `carritos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(100) NOT NULL,
  PRIMARY KEY (`id_categoria`),
  UNIQUE KEY `id_categoria_UNIQUE` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Celular'),(2,'Accesorio');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_de_productos`
--

DROP TABLE IF EXISTS `detalle_de_productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_de_productos` (
  `id_detalle_de_Producto` int(11) NOT NULL AUTO_INCREMENT,
  `idcarrito` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `id_estado_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id_detalle_de_Producto`),
  UNIQUE KEY `id_detalle_de_Producto_UNIQUE` (`id_detalle_de_Producto`),
  KEY `idcarrito_idx` (`idcarrito`),
  KEY `idproducto_idx` (`idproducto`),
  KEY `id_estado_producto_idx` (`id_estado_producto`),
  CONSTRAINT `id_estado_producto` FOREIGN KEY (`id_estado_producto`) REFERENCES `estado_producto` (`id_estado_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idcarrito` FOREIGN KEY (`idcarrito`) REFERENCES `carritos` (`id_carrito`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idproducto` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_de_productos`
--

LOCK TABLES `detalle_de_productos` WRITE;
/*!40000 ALTER TABLE `detalle_de_productos` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_de_productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_productos_comprados`
--

DROP TABLE IF EXISTS `detalle_productos_comprados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_productos_comprados` (
  `id_detalle_de_producto` int(11) NOT NULL AUTO_INCREMENT,
  `id_facturadpc` int(11) NOT NULL,
  `id_productodpc` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id_detalle_de_producto`),
  UNIQUE KEY `id_detalle_de_producto_UNIQUE` (`id_detalle_de_producto`),
  KEY `id_facturadpc_idx` (`id_facturadpc`),
  KEY `id_productodpc_idx` (`id_productodpc`),
  CONSTRAINT `id_facturadpc` FOREIGN KEY (`id_facturadpc`) REFERENCES `facturas` (`id_factura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_productodpc` FOREIGN KEY (`id_productodpc`) REFERENCES `productos` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_productos_comprados`
--

LOCK TABLES `detalle_productos_comprados` WRITE;
/*!40000 ALTER TABLE `detalle_productos_comprados` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_productos_comprados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `direcciones`
--

DROP TABLE IF EXISTS `direcciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `direcciones` (
  `id_direccion` int(11) NOT NULL AUTO_INCREMENT,
  `pais` varchar(45) NOT NULL DEFAULT 'Argentina',
  `provincia` varchar(45) NOT NULL,
  `ciudad` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `cod_postal` varchar(45) NOT NULL,
  PRIMARY KEY (`id_direccion`),
  UNIQUE KEY `id_direccion_UNIQUE` (`id_direccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direcciones`
--

LOCK TABLES `direcciones` WRITE;
/*!40000 ALTER TABLE `direcciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `direcciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `envios`
--

DROP TABLE IF EXISTS `envios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `envios` (
  `id_envio` int(11) NOT NULL AUTO_INCREMENT,
  `id_estado_envio` int(11) NOT NULL,
  `id_tipo_envio` int(11) NOT NULL,
  `codigo` varchar(45) NOT NULL,
  PRIMARY KEY (`id_envio`),
  UNIQUE KEY `id_envio_UNIQUE` (`id_envio`),
  KEY `id_estado_envio_idx` (`id_estado_envio`),
  KEY `id_tipo_envio_idx` (`id_tipo_envio`),
  CONSTRAINT `id_estado_envio` FOREIGN KEY (`id_estado_envio`) REFERENCES `estados_envios` (`id_estado_de_envio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_tipo_envio` FOREIGN KEY (`id_tipo_envio`) REFERENCES `tipo_envios` (`id_tipo_envio`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `envios`
--

LOCK TABLES `envios` WRITE;
/*!40000 ALTER TABLE `envios` DISABLE KEYS */;
/*!40000 ALTER TABLE `envios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_producto`
--

DROP TABLE IF EXISTS `estado_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado_producto` (
  `id_estado_producto` int(11) NOT NULL AUTO_INCREMENT,
  `estado_producto` varchar(45) NOT NULL,
  PRIMARY KEY (`id_estado_producto`),
  UNIQUE KEY `id_estado_producto_UNIQUE` (`id_estado_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_producto`
--

LOCK TABLES `estado_producto` WRITE;
/*!40000 ALTER TABLE `estado_producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `estado_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estados`
--

DROP TABLE IF EXISTS `estados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estados` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(45) NOT NULL,
  PRIMARY KEY (`id_estado`),
  UNIQUE KEY `id_estados_UNIQUE` (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estados`
--

LOCK TABLES `estados` WRITE;
/*!40000 ALTER TABLE `estados` DISABLE KEYS */;
INSERT INTO `estados` VALUES (1,'Activo'),(2,'Creado'),(3,'Suspendido'),(4,'Eliminado');
/*!40000 ALTER TABLE `estados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estados_envios`
--

DROP TABLE IF EXISTS `estados_envios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estados_envios` (
  `id_estado_de_envio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id_estado_de_envio`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  UNIQUE KEY `id_estado_de_envio_UNIQUE` (`id_estado_de_envio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estados_envios`
--

LOCK TABLES `estados_envios` WRITE;
/*!40000 ALTER TABLE `estados_envios` DISABLE KEYS */;
/*!40000 ALTER TABLE `estados_envios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facturas`
--

DROP TABLE IF EXISTS `facturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facturas` (
  `id_factura` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuariof` int(11) NOT NULL,
  `id_tipo_factura` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `id_direccionf` int(11) NOT NULL,
  `id_tarjetaf` int(11) NOT NULL,
  `id_enviosf` int(11) DEFAULT NULL,
  `numero_factura` varchar(45) NOT NULL,
  `total` float NOT NULL,
  PRIMARY KEY (`id_factura`),
  UNIQUE KEY `id_factura_UNIQUE` (`id_factura`),
  KEY `id_tipo_factura_idx` (`id_tipo_factura`),
  KEY `id_direccionf_idx` (`id_direccionf`),
  KEY `id_usuariof_idx` (`id_usuariof`),
  KEY `id_tarjetaf_idx` (`id_tarjetaf`),
  KEY `id_enviosf_idx` (`id_enviosf`),
  CONSTRAINT `id_direccionf` FOREIGN KEY (`id_direccionf`) REFERENCES `direcciones` (`id_direccion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_enviosf` FOREIGN KEY (`id_enviosf`) REFERENCES `envios` (`id_envio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_tarjetaf` FOREIGN KEY (`id_tarjetaf`) REFERENCES `tarjetas` (`id_tarjeta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_tipo_factura` FOREIGN KEY (`id_tipo_factura`) REFERENCES `tipo_factura` (`id_tipo_factura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_usuariof` FOREIGN KEY (`id_usuariof`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facturas`
--

LOCK TABLES `facturas` WRITE;
/*!40000 ALTER TABLE `facturas` DISABLE KEYS */;
/*!40000 ALTER TABLE `facturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marcas`
--

DROP TABLE IF EXISTS `marcas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marcas` (
  `id_marca` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(100) NOT NULL,
  PRIMARY KEY (`id_marca`),
  UNIQUE KEY `nombre_UNIQUE` (`marca`),
  UNIQUE KEY `id_marca_UNIQUE` (`id_marca`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marcas`
--

LOCK TABLES `marcas` WRITE;
/*!40000 ALTER TABLE `marcas` DISABLE KEYS */;
INSERT INTO `marcas` VALUES (1,'Apple'),(2,'LG'),(3,'Motorola'),(4,'Nokia'),(5,'Samsung');
/*!40000 ALTER TABLE `marcas` ENABLE KEYS */;
UNLOCK TABLES;

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
INSERT INTO `productos` VALUES (1,1,4,'Nokia 7.1',23,'\r\n    Cámara secundaria: 8 mpx\r\n    Sistema Operativo: Android 9.0\r\n    Tipo de SIM: Nano-SIM\r\n    Red: 2G, 3G, 4G\r\n    Frecuencia 2G: 850/900/1800/1900 MHz\r\n    Frecuencia 3G: 850/900/1700/1900/2100 MHz\r\n    Frecuencia 4G: Bandas 1, 2, 3, 4, 5, 7, 8, 12, 17, 28, 40.\r\n    Batería: 3060 mAh\r\n    Batería en modo Stand By: 408 h\r\n    Tiempo de conversación: 19 h\r\n    Memoria RAM: 4 GB\r\n    Memoria Interna: 64 GB | Disponibles 50 GB\r\n    Memoria Externa: MicroSD hasta 256 GB\r\n    Peso: 160 g\r\n    Dimensión del equipo: 149,7 x 71,2 x 8 mm\r\n    Bluetooth: Si\r\n    Marcación por Voz: Si\r\n    Llamadas por WiFi: Si                                    ',29000,'/img/productos/Nokia 7.1/phone5e3195b051393.jpg',0),(2,1,3,' Moto E5 Play',20,'\r\n\r\n    Cámara secundaria: 5 mpx con flash\r\n    Sistema Operativo: Android Go 8.0\r\n    Tipo de SIM: Nano-SIM\r\n    Red: 2G, 3G, 4G\r\n    Frecuencia 2G: 850/900/1800/1900 MHz\r\n    Frecuencia 3G: 850/900/1700/1900/2100 MHz\r\n    Frecuencia 4G: Bandas 1, 2, 3, 4, 5, 7, 28.\r\n    Batería: 2100 mAh\r\n    Batería en modo Stand By: 24 h\r\n    Tiempo de conversación: 24 h\r\n    Memoria RAM: 1 GB\r\n    Memoria Interna: 16 GB | Disponibles 11 GB\r\n    Memoria Externa: MicroSD hasta 128 GB\r\n    Peso: 152 g\r\n    Dimensión del equipo: 147,8 x 71,2 x 9,19 mm\r\n    Bluetooth: Si\r\n    Marcación por Voz: Si\r\n    Llamadas por WiFi: Si',8000,'/img/productos/ Moto E5 Play/phone5e320d0e5fc91.jpg',0);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sexos`
--

DROP TABLE IF EXISTS `sexos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sexos` (
  `id_sexo` int(11) NOT NULL AUTO_INCREMENT,
  `sexo` varchar(100) NOT NULL,
  PRIMARY KEY (`id_sexo`),
  UNIQUE KEY `nombre_UNIQUE` (`sexo`),
  UNIQUE KEY `id_sexo_UNIQUE` (`id_sexo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sexos`
--

LOCK TABLES `sexos` WRITE;
/*!40000 ALTER TABLE `sexos` DISABLE KEYS */;
/*!40000 ALTER TABLE `sexos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarjetas`
--

DROP TABLE IF EXISTS `tarjetas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tarjetas` (
  `id_tarjeta` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_tarjeta` int(11) NOT NULL,
  `nombre_titular` varchar(45) NOT NULL,
  `numeroTarjeta` tinyint(4) NOT NULL,
  `cvc` int(11) NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  PRIMARY KEY (`id_tarjeta`),
  UNIQUE KEY `id_tarjeta_UNIQUE` (`id_tarjeta`),
  UNIQUE KEY `numeroTarjeta_UNIQUE` (`numeroTarjeta`),
  KEY `id_tipo_tarjeta_idx` (`id_tipo_tarjeta`),
  CONSTRAINT `id_tipo_tarjeta` FOREIGN KEY (`id_tipo_tarjeta`) REFERENCES `tipo_tarjeta` (`id_tipo_tarjeta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarjetas`
--

LOCK TABLES `tarjetas` WRITE;
/*!40000 ALTER TABLE `tarjetas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tarjetas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_entrega`
--

DROP TABLE IF EXISTS `tipo_entrega`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_entrega` (
  `id_tipo_entrega` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  PRIMARY KEY (`id_tipo_entrega`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  UNIQUE KEY `id_tipo_entrega_UNIQUE` (`id_tipo_entrega`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_entrega`
--

LOCK TABLES `tipo_entrega` WRITE;
/*!40000 ALTER TABLE `tipo_entrega` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_entrega` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_envios`
--

DROP TABLE IF EXISTS `tipo_envios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_envios` (
  `id_tipo_envio` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) NOT NULL,
  PRIMARY KEY (`id_tipo_envio`),
  UNIQUE KEY `id_tipo_envios_UNIQUE` (`id_tipo_envio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_envios`
--

LOCK TABLES `tipo_envios` WRITE;
/*!40000 ALTER TABLE `tipo_envios` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_envios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_factura`
--

DROP TABLE IF EXISTS `tipo_factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_factura` (
  `id_tipo_factura` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(10) NOT NULL,
  PRIMARY KEY (`id_tipo_factura`),
  UNIQUE KEY `id_tipo_factura_UNIQUE` (`id_tipo_factura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_factura`
--

LOCK TABLES `tipo_factura` WRITE;
/*!40000 ALTER TABLE `tipo_factura` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_tarjeta`
--

DROP TABLE IF EXISTS `tipo_tarjeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_tarjeta` (
  `id_tipo_tarjeta` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tipo_tarjeta`),
  UNIQUE KEY `nombre_UNIQUE` (`tipo`),
  UNIQUE KEY `id_tipo_tarjeta_UNIQUE` (`id_tipo_tarjeta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_tarjeta`
--

LOCK TABLES `tipo_tarjeta` WRITE;
/*!40000 ALTER TABLE `tipo_tarjeta` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_tarjeta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_usuario` (
  `id_tipo_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tipo_cliente`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  UNIQUE KEY `id_tipo_cliente_UNIQUE` (`id_tipo_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_usuario`
--

LOCK TABLES `tipo_usuario` WRITE;
/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
INSERT INTO `tipo_usuario` VALUES (1,'Administrador'),(2,'Usuario');
/*!40000 ALTER TABLE `tipo_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `user` varchar(45) NOT NULL,
  `contrasenia` varchar(1000) NOT NULL,
  `email` varchar(100) NOT NULL,
  `img` varchar(10000) NOT NULL DEFAULT 'img/defaul.png',
  `id_tipo_de_usuario` int(11) NOT NULL,
  `id_sexo` int(11) DEFAULT NULL,
  `id_direccion` int(11) DEFAULT NULL,
  `id_tarjeta` int(11) DEFAULT NULL,
  `id_carrito` int(11) DEFAULT NULL,
  `id_estado` int(11) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `id_usuario_UNIQUE` (`id_usuario`),
  UNIQUE KEY `user_UNIQUE` (`user`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `id_sexo_idx` (`id_sexo`),
  KEY `id_direccion_idx` (`id_direccion`),
  KEY `id_tipo_de_usuario_idx` (`id_tipo_de_usuario`),
  KEY `id_carrito_idx` (`id_carrito`),
  KEY `id_tarjeta_idx` (`id_tarjeta`),
  KEY `id_estado_idx` (`id_estado`),
  CONSTRAINT `id_carrito` FOREIGN KEY (`id_carrito`) REFERENCES `carritos` (`id_carrito`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_direccion` FOREIGN KEY (`id_direccion`) REFERENCES `direcciones` (`id_direccion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_estado` FOREIGN KEY (`id_estado`) REFERENCES `estados` (`id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_sexo` FOREIGN KEY (`id_sexo`) REFERENCES `sexos` (`id_sexo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_tarjeta` FOREIGN KEY (`id_tarjeta`) REFERENCES `tarjetas` (`id_tarjeta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_tipo_de_usuario` FOREIGN KEY (`id_tipo_de_usuario`) REFERENCES `tipo_usuario` (`id_tipo_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'e-commerce'
--

--
-- Dumping routines for database 'e-commerce'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-01-29 20:47:48
