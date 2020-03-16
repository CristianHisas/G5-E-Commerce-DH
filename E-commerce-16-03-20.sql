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
  CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carritos`
--

LOCK TABLES `carritos` WRITE;
/*!40000 ALTER TABLE `carritos` DISABLE KEYS */;
INSERT INTO `carritos` VALUES (1,1,1400),(2,2,31000),(3,4,44000),(4,5,60000),(5,8,4000);
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
  `img` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`),
  UNIQUE KEY `id_categoria_UNIQUE` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Celular','/img/categorias/tel.png'),(2,'Ropa','/img/categorias/ropa.png'),(4,'Otras categorias','/img/categorias/Otras categorías.png'),(5,'Servicios','/img/categorias/servicios.png'),(6,'Computación','/img/categorias/pc.png'),(7,'Música','/img/categorias/guitarra.png'),(8,'Hogar','/img/categorias/casa.png'),(9,'Vehículos','/img/categorias/autopng.png');
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
  `id_estado_producto` int(11) NOT NULL DEFAULT 1,
  `cantidad` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_detalle_de_Producto`),
  UNIQUE KEY `id_detalle_de_Producto_UNIQUE` (`id_detalle_de_Producto`),
  KEY `idcarrito_idx` (`idcarrito`),
  KEY `idproducto_idx` (`idproducto`),
  KEY `id_estado_producto_idx` (`id_estado_producto`),
  CONSTRAINT `id_estado_producto` FOREIGN KEY (`id_estado_producto`) REFERENCES `estado_producto` (`id_estado_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idcarrito` FOREIGN KEY (`idcarrito`) REFERENCES `carritos` (`id_carrito`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idproducto` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_de_productos`
--

LOCK TABLES `detalle_de_productos` WRITE;
/*!40000 ALTER TABLE `detalle_de_productos` DISABLE KEYS */;
INSERT INTO `detalle_de_productos` VALUES (5,2,1,1,2),(6,2,8,1,1),(7,2,9,1,2),(8,2,9,1,1),(9,3,9,1,4),(10,3,8,1,2),(11,4,1,1,1),(12,4,8,1,3),(13,4,9,1,5),(15,1,29,1,2),(16,5,8,1,2);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direcciones`
--

LOCK TABLES `direcciones` WRITE;
/*!40000 ALTER TABLE `direcciones` DISABLE KEYS */;
INSERT INTO `direcciones` VALUES (1,'Argentina','Buenos Aires','flores','av.rivadavia 3454','1702');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_producto`
--

LOCK TABLES `estado_producto` WRITE;
/*!40000 ALTER TABLE `estado_producto` DISABLE KEYS */;
INSERT INTO `estado_producto` VALUES (1,'OK'),(2,'Eliminado'),(3,'Stock Insuficiente'),(4,'Sin Stock');
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
  CONSTRAINT `id_usuariof` FOREIGN KEY (`id_usuariof`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
-- Table structure for table `imagenes`
--

DROP TABLE IF EXISTS `imagenes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imagenes` (
  `id_imagen` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `imagen` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '/img/productos/phone.png',
  `id_producto_img` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id_imagen`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagenes`
--

LOCK TABLES `imagenes` WRITE;
/*!40000 ALTER TABLE `imagenes` DISABLE KEYS */;
INSERT INTO `imagenes` VALUES (1,'/img/productos/Playstation Ps4/Playstation Ps4-1.png',31),(2,'/img/productos/Playstation Ps4/Playstation Ps4-2.jpg',31),(3,'/img/productos/Playstation Ps4/Playstation Ps4-3.jpg',31),(4,'/img/productos/Nokia 2.2/Nokia 2.2-1.jpg',32),(5,'/img/productos/Nokia 2.2/Nokia 2.2-2.jpg',32),(6,'/img/nod.png',32),(7,'/img/productos/Moto Z3 Play/Moto Z3 Play-1.jpg',33),(8,'/img/productos/Moto Z3 Play/Moto Z3 Play-2.jpg',33),(9,'/img/nod.png',33);
/*!40000 ALTER TABLE `imagenes` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marcas`
--

LOCK TABLES `marcas` WRITE;
/*!40000 ALTER TABLE `marcas` DISABLE KEYS */;
INSERT INTO `marcas` VALUES (1,'Apple'),(7,'ASUS'),(8,'iPhone'),(9,'LG'),(10,'Motorola'),(4,'Nokia'),(6,'Ropa Anime'),(5,'Samsung'),(11,'Sony');
/*!40000 ALTER TABLE `marcas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_100000_create_password_resets_table',1),(2,'2020_02_13_205829_create_users_table',1),(3,'2020_02_13_231722_alter_user_table',1),(4,'2020_02_19_021359_create_roles_table',2),(5,'2020_02_19_022045_create_role_user_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
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
  `nombre` varchar(250) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,1,4,'Nokia 7.1',23,'Cámara secundaria: 8 mpx\r\n    Sistema Operativo: Android 9.0\r\n    Tipo de SIM: Nano-SIM\r\n    Red: 2G, 3G, 4G\r\n    Frecuencia 2G: 850/900/1800/1900 MHz\r\n    Frecuencia 3G: 850/900/1700/1900/2100 MHz\r\n    Frecuencia 4G: Bandas 1, 2, 3, 4, 5, 7, 8, 12, 17, 28, 40.\r\n    Batería: 3060 mAh\r\n    Batería en modo Stand By: 408 h\r\n    Tiempo de conversación: 19 h\r\n    Memoria RAM: 4 GB\r\n    Memoria Interna: 64 GB | Disponibles 50 GB\r\n    Memoria Externa: MicroSD hasta 256 GB\r\n    Peso: 160 g\r\n    Dimensión del equipo: 149,7 x 71,2 x 8 mm\r\n    Bluetooth: Si\r\n    Marcación por Voz: Si\r\n    Llamadas por WiFi: Si',29000,'/img/productos/Nokia 7.1/Nokia 7.1.jpg',0),(8,1,5,'Samsung Galaxy S10 Plus con Buds y Cover',25,'Cámara secundaria: 10 mpx | Dual\r\n    Sistema Operativo: Android 9.0\r\n    Tipo de SIM: Nano-SIM\r\n    Red: 2G, 3G, 4G\r\n    Frecuencia 2G: 850/900/1800/1900 MHz\r\n    Frecuencia 3G: 850/900/1700/1900/2100 MHz\r\n    Frecuencia 4G: Bandas 1, 2, 3, 4, 5, 7, 8, 12, 13, 17, 18, 19, 20, 25, 26, 28, 32, 38, 39, 40, 41, 66.\r\n    Batería: 4000 mAh\r\n    Tiempo de conversación: 30 h\r\n    Memoria RAM: 8 GB\r\n    Memoria Interna: 128 GB | Disponibles 107.8 GB\r\n    Memoria Externa: MicroSD hasta 512 GB\r\n    Peso: 179 g\r\n    Dimensión del equipo: 158.6 x 74.1 x 7.9 mm\r\n    Llamadas por WiFi: Si',72999,'/img/productos/Samsung Galaxy S10 Plus con Buds y Cover/Samsung Galaxy S10 Plus con Buds y Cover.jpg',0),(9,1,8,'iPhone Xs Max 64GB',10,'Cámara secundaria: 7 mpx\r\n    Sistema Operativo: iOS 11\r\n    Tipo de SIM: Nano-SIM\r\n    Red: 2G, 3G, 4G\r\n    Frecuencia 2G: 850/900/1800/1900 MHz\r\n    Frecuencia 3G: 850/900/1700-2100/1900/2100 MHz\r\n    Frecuencia 4G: Bandas 1, 2, 3, 4, 5, 7, 8, 12, 13, 17, 18, 19, 20, 25, 26, 28, 29, 30, 66.\r\n    Tiempo de conversación: 21 h\r\n    Memoria Interna: 64 GB\r\n    Peso: 174 g\r\n    Dimensión del equipo: 157,5 x 77,4 x 7,7 mm\r\n    Llamadas por WiFi: Si',130000,'/img/productos/iPhone Xs Max 64GB/iPhone Xs Max 64GB.jpg',25),(11,1,9,'LG Q60',50,'Cámara secundaria: 13 mpx\r\n    Sistema Operativo: Android 9.0\r\n    Tipo de SIM: Nano-SIM\r\n    Red: 2G, 3G, 4G\r\n    Frecuencia 2G: 850/900/1800/1900 MHz\r\n    Frecuencia 3G: 850/900/1700/1900/2100 MHz\r\n    Frecuencia 4G: Bandas 1, 2, 3, 4, 5, 7, 8, 12, 17, 28, 66.\r\n    Batería: 3500 mAh\r\n    Batería en modo Stand By: 318 h\r\n    Tiempo de conversación: 9 h\r\n    Memoria RAM: 3 GB\r\n    Memoria Interna: 64 GB | Disponibles 47 GB\r\n    Memoria Externa: MicroSD hasta 256 GB\r\n    Peso: 172 g\r\n    Dimensión del equipo: 161,3 x 77 x 8,75 mm\r\n    Llamadas por WiFi: Si',24000,'/img/productos/LG Q60/LG Q60.jpg',10),(16,1,5,'Moto E5 Play',20,'hola',9000,'/img/productos/Moto E5 Play/Moto E5 Play.jpg',25),(29,2,6,'Toga Himiko Boku No Hero Academia Sugoi',25,'Estilo: Unisex\r\nColor: Negro\r\nTalle: M',700,'/img/productos/Toga Himiko Boku No Hero Academia Sugoi/Toga Himiko Boku No Hero Academia Sugoi.png',0),(30,6,7,'Mother ASUS TUF X570-PLUS GAMING WiFi AM4 PCIe 4.0 Dual M.2',30,'CARACTERISTICAS GENERALES\r\nSocket: AM4 Ryzen 3th Gen, AM4 APU 2th Gen\r\nChipsets Principal: AMD X570\r\nPlataforma: AMD\r\nCONECTIVIDAD\r\nSalidas HDMI : 1\r\nSalidas Display Ports: 1\r\nPlaca WiFi integrada:Sí\r\nPuertos SATA: 8\r\nCantidad de slot m2: 2\r\nCantidad de slot PCI-E 16X: 2\r\nCantidad de slot PCI-E 1X: 2\r\nTecnología multi GPU: Crossfire\r\nSistema de conexión RGB : ARGB Header, RGB Header\r\nPlaca de Red\r\nGigabit LAN 10/100/1000 Mb/s\r\nPuertos USB 2.0 traseros: 4\r\nPuertos USB 3.0 traseros: 2\r\nDIMENSIONES\r\nFactor: ATX\r\nENERGIA\r\nConector 24pines: 1\r\nConsumo: 35 w\r\nConectos CPU 4pines: 1\r\nConector CPU 4pines Plus: 1\r\nWatts máximos para CPU: 105\r\nMEMORIA\r\nCantidad de slot DDR4: 4',16100,'/img/productos/Mother ASUS TUF X570-PLUS GAMING WiFi AM4 PCIe 4.0 Dual M.2/Mother ASUS TUF X570-PLUS GAMING WiFi AM4 PCIe 4.0 Dual M.2.jpg',0),(31,4,11,'Playstation Ps4',10,'Especificaciones generales\r\nCPU: AMD Jaguar x86-64 de baja potencia, 8 núcleos\r\nGPU:1,84 TFLOPS, tarjeta gráfica AMD basada en Radeon™ de próxima generación\r\nMemoria: GDDR5 de 8 GB\r\nHDD: Unidad de disco duro de 500 GB\r\nUnidad óptica (solo lectura): BD x 6 CAV; DVD x 8 CAV\r\nPuertos USB: 2,0\r\nConectividad de red\r\nTipo de conexión: Ethernet\r\nWi-Fi: IEEE 802.11 b/g/n\r\nTipo de Ethernet: 1 (10BASE-T, 100BASE-TX, 1000BASE-T)\r\nBluetooth®: Bluetooth® 2.1 (EDR)\r\nInterfaz\r\nHDMI®: Puerto de salida HDMI\r\n¿Qué incluye la caja?\r\n Sistema PlayStation®4; controlador inalámbrico DUALSHOCK® 4; auriculares mono; cable de alimentación de CA; cable HDMI; cable USB',50000,'/img/productos/Playstation Ps4/Playstation Ps4.png',25),(32,1,4,'Nokia 2.2',10,'Display: 5.71\'\' HD+\r\n    Procesador: Octa Core 2 GHz \r\n    Cámara principal:13 mpx con flash LED | Dual | Zoom digital 4x  \r\n    Cámara secundaria: 5 mpx\r\n    Sistema Operativo: Android 9.0\r\n    Tipo de SIM: Nano-SIM\r\n    Red: 2G, 3G, 4G\r\n    Frecuencia 2G: 850/900/1800/1900 MHz\r\n    Frecuencia 3G: 850/900/1800/1900/2100 MHz\r\n    Frecuencia 4G: Bandas 1, 2, 3, 4, 5, 7, 8, 12, 17, 28, 38, 40.\r\n    Batería: 3000 mAh\r\n    Batería en modo Stand By: 418 h\r\n    Tiempo de conversación: 21 h\r\n    Memoria RAM: 3 GB\r\n    Memoria Interna: 32 GB | Disponibles 20 GB\r\n    Memoria Externa: MicroSD hasta 256 GB\r\n    Peso: 153 g\r\n    Dimensión del equipo: 145,9 x 70,5 x 8,1 mm\r\n    Llamadas por WiFi: Si',14500,'/img/productos/Nokia 2.2/Nokia 2.2.jpg',0),(33,1,10,'Moto Z3 Play',20,'Display: 6\'\' Full HD\r\n    Procesador: Octa Core 1.8 GHz\r\n    Cámara principal:12 mpx con flash dual LED | Zoom digital 8x\r\n    Cámara secundaria: 5 mpx con flash\r\n    Sistema Operativo: Android 8.0\r\n    Tipo de SIM: Nano-SIM\r\n    Red: 2G, 3G, 4G\r\n    Frecuencia 2G: 850/900/1800/1900 MHz\r\n    Frecuencia 3G: 850/900/1700/1900/2100 MHz\r\n    Frecuencia 4G: Bandas 1, 2, 3, 4, 5, 7, 8, 12, 17, 28, 66.\r\n    Batería: 3000 mAh\r\n    Batería en modo Stand By: 24 h\r\n    Tiempo de conversación: 14 hs\r\n    Memoria RAM: 4 GB\r\n    Memoria Interna: 64 GB | Disponibles 45 GB\r\n    Memoria Externa: MicroSD hasta 128 GB\r\n    Peso: 155 g\r\n    Llamadas por WiFi: Si',30000,'/img/productos/Moto Z3 Play/Moto Z3 Play.jpg',0);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (1,2,2,'2020-02-19 06:23:59','2020-02-19 06:23:59'),(2,2,1,'2020-02-19 06:39:58','2020-02-19 06:39:58'),(3,1,3,'2020-02-19 03:00:00','2020-02-19 03:00:00'),(4,2,4,'2020-02-20 15:29:42','2020-02-20 15:29:42'),(5,2,5,'2020-02-20 15:37:27','2020-02-20 15:37:27'),(6,2,6,'2020-02-20 23:26:30','2020-02-20 23:26:30'),(7,2,7,'2020-02-21 15:44:35','2020-02-21 15:44:35'),(8,2,8,'2020-02-22 03:56:39','2020-02-22 03:56:39');
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','Administrator','2020-02-19 06:03:33','2020-02-19 06:03:33'),(2,'user','User','2020-02-19 06:03:33','2020-02-19 06:03:33');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sexos`
--

LOCK TABLES `sexos` WRITE;
/*!40000 ALTER TABLE `sexos` DISABLE KEYS */;
INSERT INTO `sexos` VALUES (2,'Femenino'),(1,'Masculino'),(3,'Otro');
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
  `numeroTarjeta` varchar(20) NOT NULL,
  `cvc` int(11) NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  PRIMARY KEY (`id_tarjeta`),
  UNIQUE KEY `id_tarjeta_UNIQUE` (`id_tarjeta`),
  UNIQUE KEY `numeroTarjeta_UNIQUE` (`numeroTarjeta`),
  KEY `id_tipo_tarjeta_idx` (`id_tipo_tarjeta`),
  CONSTRAINT `id_tipo_tarjeta` FOREIGN KEY (`id_tipo_tarjeta`) REFERENCES `tipo_tarjeta` (`id_tipo_tarjeta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarjetas`
--

LOCK TABLES `tarjetas` WRITE;
/*!40000 ALTER TABLE `tarjetas` DISABLE KEYS */;
INSERT INTO `tarjetas` VALUES (1,2,'lucas peres','4465781723728254',424,'2027-07-01');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_tarjeta`
--

LOCK TABLES `tipo_tarjeta` WRITE;
/*!40000 ALTER TABLE `tipo_tarjeta` DISABLE KEYS */;
INSERT INTO `tipo_tarjeta` VALUES (4,'America Express'),(3,'Discover'),(1,'Mastercard'),(2,'Visa');
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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `user` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `img` varchar(10000) NOT NULL DEFAULT '/img/perfil.png',
  `id_tipo_de_usuario` int(11) NOT NULL DEFAULT 2,
  `id_sexo` int(11) DEFAULT NULL,
  `id_direccion` int(11) DEFAULT NULL,
  `id_tarjeta` int(11) DEFAULT NULL,
  `id_carrito` int(11) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_usuario_UNIQUE` (`id`),
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'lucas','Peres','12lucas','lucas@gmail.com','/img/usuario/lucas@gmail.com/lucas@gmail.com.png',2,1,1,1,1,1,'1990-06-13','2020-03-13 03:14:51','$2y$10$5k2aUzM6s6WLZQRI.VUsjeKSAK21pOzAHW0fUzzqG93s7KaiP7DJ6','usFMvrG9GN4hv6inzTLr6m0JEAapU3nDISGFHHFBgb9V0OEUE5seMi0mscnM','2020-02-18 19:37:15','2020-03-13 03:14:51','1554563205'),(2,'lucas','peres','12pedro','pedro@gmail.com','/img/perfil.png',2,NULL,NULL,NULL,2,NULL,NULL,NULL,'$2y$10$18jFS5CBHmOxEdnsTWhRKOTy6EIk25IMwcLKEcnE56mRzJdfZl0Oe',NULL,'2020-02-19 06:23:59','2020-02-20 04:52:14',NULL),(3,'pedro','feliz','admin','admin@gmail.com','/img/perfil.png',1,NULL,NULL,NULL,NULL,NULL,NULL,'2020-03-13 02:26:59','$2y$10$uFThq.EwtQzkxubBle7i2.bVx8wnFPtMwgM3kYvGw7bE/CecF1cra',NULL,'2020-02-19 06:39:58','2020-03-13 02:26:59',NULL),(4,'fede','fede','fede','fede@gmail.com','/img/perfil.png',2,NULL,NULL,NULL,3,NULL,NULL,NULL,'$2y$10$eH7w4n4HXWJRz8hrAnYuU.sdWVn2eyNqHW8SB17LytiU47il5jLsq',NULL,'2020-02-20 15:29:41','2020-02-20 15:30:09',NULL),(5,'des','des','des','des@gmail.com','/img/perfil.png',2,NULL,NULL,NULL,4,NULL,NULL,NULL,'$2y$10$dJ4xBy1vwdQ55AKwgTGIOOlmKm1y9bUiCAg/REgBzF.Us4XUoxyiy',NULL,'2020-02-20 15:37:27','2020-02-20 15:38:14',NULL),(7,'fer','fer','fer','fer@gmail.com','/img/perfil.png',2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'$2y$10$r9dyNkMjcPrxJQ1G18hy9.1lW9wpmilE3JH.JrY97sqEWyYCwEicq',NULL,'2020-02-21 15:44:35','2020-02-21 15:44:35',NULL),(8,'re','re','12rer','re@gmail.com','/img/perfil.png',2,NULL,NULL,NULL,5,NULL,NULL,NULL,'$2y$10$odKZ5t5jIyXknBSewPPSXe4hTzY6yFGnDgFKZXC/fh66vEv5Cw31q',NULL,'2020-02-22 03:56:39','2020-02-22 03:57:03',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
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

-- Dump completed on 2020-03-16  1:01:51
