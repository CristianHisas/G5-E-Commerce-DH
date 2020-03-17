CREATE DATABASE  IF NOT EXISTS `e-commerce` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `e-commerce`;
-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-03-2020 a las 20:54:37
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `e-commerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carritos`
--

CREATE TABLE `carritos` (
  `id_carrito` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carritos`
--

INSERT INTO `carritos` (`id_carrito`, `id_usuario`, `total`) VALUES
(1, 1, 1400),
(2, 2, 31000),
(3, 4, 44000),
(4, 5, 60000),
(5, 8, 4000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `img` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `categoria`, `img`) VALUES
(1, 'Celular', '/img/categorias/tel.png'),
(2, 'Ropa', '/img/categorias/ropa.png'),
(4, 'Otras categorias', '/img/categorias/Otras categorías.png'),
(5, 'Servicios', '/img/categorias/servicios.png'),
(6, 'Computación', '/img/categorias/pc.png'),
(7, 'Música', '/img/categorias/guitarra.png'),
(8, 'Hogar', '/img/categorias/casa.png'),
(9, 'Vehículos', '/img/categorias/autopng.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_de_productos`
--

CREATE TABLE `detalle_de_productos` (
  `id_detalle_de_Producto` int(11) NOT NULL,
  `idcarrito` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `id_estado_producto` int(11) NOT NULL DEFAULT 1,
  `cantidad` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_de_productos`
--

INSERT INTO `detalle_de_productos` (`id_detalle_de_Producto`, `idcarrito`, `idproducto`, `id_estado_producto`, `cantidad`) VALUES
(5, 2, 1, 1, 2),
(6, 2, 8, 1, 1),
(7, 2, 9, 1, 2),
(8, 2, 9, 1, 1),
(9, 3, 9, 1, 4),
(10, 3, 8, 1, 2),
(11, 4, 1, 1, 1),
(12, 4, 8, 1, 3),
(13, 4, 9, 1, 5),
(15, 1, 29, 1, 2),
(16, 5, 8, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_productos_comprados`
--

CREATE TABLE `detalle_productos_comprados` (
  `id_detalle_de_producto` int(11) NOT NULL,
  `id_facturadpc` int(11) NOT NULL,
  `id_productodpc` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE `direcciones` (
  `id_direccion` int(11) NOT NULL,
  `pais` varchar(45) NOT NULL DEFAULT 'Argentina',
  `provincia` varchar(45) NOT NULL,
  `ciudad` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `cod_postal` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `direcciones`
--

INSERT INTO `direcciones` (`id_direccion`, `pais`, `provincia`, `ciudad`, `direccion`, `cod_postal`) VALUES
(1, 'Argentina', 'Buenos Aires', 'flores', 'av.rivadavia 3454', '1702');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envios`
--

CREATE TABLE `envios` (
  `id_envio` int(11) NOT NULL,
  `id_estado_envio` int(11) NOT NULL,
  `id_tipo_envio` int(11) NOT NULL,
  `codigo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id_estado`, `estado`) VALUES
(1, 'Activo'),
(2, 'Creado'),
(3, 'Suspendido'),
(4, 'Eliminado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_envios`
--

CREATE TABLE `estados_envios` (
  `id_estado_de_envio` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_producto`
--

CREATE TABLE `estado_producto` (
  `id_estado_producto` int(11) NOT NULL,
  `estado_producto` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado_producto`
--

INSERT INTO `estado_producto` (`id_estado_producto`, `estado_producto`) VALUES
(1, 'OK'),
(2, 'Eliminado'),
(3, 'Stock Insuficiente'),
(4, 'Sin Stock');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id_factura` int(11) NOT NULL,
  `id_usuariof` int(11) NOT NULL,
  `id_tipo_factura` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `id_direccionf` int(11) NOT NULL,
  `id_tarjetaf` int(11) NOT NULL,
  `id_enviosf` int(11) DEFAULT NULL,
  `numero_factura` varchar(45) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id_imagen` int(10) UNSIGNED NOT NULL,
  `imagen` varchar(1000) DEFAULT '/img/nod.png',
  `id_producto_img` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id_imagen`, `imagen`, `id_producto_img`) VALUES
(1, '/img/productos/Playstation Ps4/Playstation Ps4-1.png', 31),
(2, '/img/productos/Playstation Ps4/Playstation Ps4-2.jpg', 31),
(3, '/img/productos/Playstation Ps4/Playstation Ps4-3.jpg', 31),
(4, '/img/productos/Nokia 2.2/Nokia 2.2-1.jpg', 32),
(5, '/img/productos/Nokia 2.2/Nokia 2.2-2.jpg', 32),
(6, '/img/nod.png', 32),
(7, '/img/productos/Moto Z3 Play/Moto Z3 Play-1.jpg', 33),
(8, '/img/productos/Moto Z3 Play/Moto Z3 Play-2.jpg', 33),
(9, '/img/nod.png', 33),
(22, '/img/productos/Death Note Con Capucha/Death Note Con Capucha-1.jpg', 37),
(23, '/img/productos/Death Note Con Capucha/Death Note Con Capucha-2.jpg', 37),
(24, '/img/productos/Death Note Con Capucha/Death Note Con Capucha-3.jpg', 37),
(25, '/img/productos/Desarrollo de sistemas/Desarrollo de sistemas-1.jpg', 38),
(26, '/img/productos/Desarrollo de sistemas/Desarrollo de sistemas-2.png', 38),
(27, '/img/productos/Desarrollo de sistemas/Desarrollo de sistemas-3.png', 38),
(28, '/img/productos/Camiseta Death Note/Camiseta Death Note-1.jpg', 39),
(29, '/img/productos/Camiseta Death Note/Camiseta Death Note-2.jpg', 39),
(30, '/img/productos/Camiseta Death Note/Camiseta Death Note-3.jpg', 39),
(31, '/img/productos/Camiseta Naruto/Camiseta Naruto-1.jpg', 40),
(32, '/img/productos/Camiseta Naruto/Camiseta Naruto-2.jpg', 40),
(33, '/img/productos/Camiseta Naruto/Camiseta Naruto-3.jpg', 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int(11) NOT NULL,
  `marca` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `marca`) VALUES
(1, 'Apple'),
(7, 'ASUS'),
(8, 'iPhone'),
(9, 'LG'),
(10, 'Motorola'),
(4, 'Nokia'),
(13, 'Otras marcas'),
(6, 'Ropa Anime'),
(5, 'Samsung'),
(11, 'Sony');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2020_02_13_205829_create_users_table', 1),
(3, '2020_02_13_231722_alter_user_table', 1),
(4, '2020_02_19_021359_create_roles_table', 2),
(5, '2020_02_19_022045_create_role_user_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_marca` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descripcion` varchar(1000) DEFAULT NULL,
  `precio` float UNSIGNED NOT NULL DEFAULT 0,
  `img` varchar(10000) NOT NULL,
  `descuento` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `id_categoria`, `id_marca`, `nombre`, `cantidad`, `descripcion`, `precio`, `img`, `descuento`) VALUES
(1, 1, 4, 'Nokia 7.1', 23, 'Cámara secundaria: 8 mpx\r\n    Sistema Operativo: Android 9.0\r\n    Tipo de SIM: Nano-SIM\r\n    Red: 2G, 3G, 4G\r\n    Frecuencia 2G: 850/900/1800/1900 MHz\r\n    Frecuencia 3G: 850/900/1700/1900/2100 MHz\r\n    Frecuencia 4G: Bandas 1, 2, 3, 4, 5, 7, 8, 12, 17, 28, 40.\r\n    Batería: 3060 mAh\r\n    Batería en modo Stand By: 408 h\r\n    Tiempo de conversación: 19 h\r\n    Memoria RAM: 4 GB\r\n    Memoria Interna: 64 GB | Disponibles 50 GB\r\n    Memoria Externa: MicroSD hasta 256 GB\r\n    Peso: 160 g\r\n    Dimensión del equipo: 149,7 x 71,2 x 8 mm\r\n    Bluetooth: Si\r\n    Marcación por Voz: Si\r\n    Llamadas por WiFi: Si', 29000, '/img/productos/Nokia 7.1/Nokia 7.1.jpg', 0),
(8, 1, 5, 'Samsung Galaxy S10 Plus con Buds y Cover', 25, 'Cámara secundaria: 10 mpx | Dual\r\n    Sistema Operativo: Android 9.0\r\n    Tipo de SIM: Nano-SIM\r\n    Red: 2G, 3G, 4G\r\n    Frecuencia 2G: 850/900/1800/1900 MHz\r\n    Frecuencia 3G: 850/900/1700/1900/2100 MHz\r\n    Frecuencia 4G: Bandas 1, 2, 3, 4, 5, 7, 8, 12, 13, 17, 18, 19, 20, 25, 26, 28, 32, 38, 39, 40, 41, 66.\r\n    Batería: 4000 mAh\r\n    Tiempo de conversación: 30 h\r\n    Memoria RAM: 8 GB\r\n    Memoria Interna: 128 GB | Disponibles 107.8 GB\r\n    Memoria Externa: MicroSD hasta 512 GB\r\n    Peso: 179 g\r\n    Dimensión del equipo: 158.6 x 74.1 x 7.9 mm\r\n    Llamadas por WiFi: Si', 72999, '/img/productos/Samsung Galaxy S10 Plus con Buds y Cover/Samsung Galaxy S10 Plus con Buds y Cover.jpg', 0),
(9, 1, 8, 'iPhone Xs Max 64GB', 10, 'Cámara secundaria: 7 mpx\r\n    Sistema Operativo: iOS 11\r\n    Tipo de SIM: Nano-SIM\r\n    Red: 2G, 3G, 4G\r\n    Frecuencia 2G: 850/900/1800/1900 MHz\r\n    Frecuencia 3G: 850/900/1700-2100/1900/2100 MHz\r\n    Frecuencia 4G: Bandas 1, 2, 3, 4, 5, 7, 8, 12, 13, 17, 18, 19, 20, 25, 26, 28, 29, 30, 66.\r\n    Tiempo de conversación: 21 h\r\n    Memoria Interna: 64 GB\r\n    Peso: 174 g\r\n    Dimensión del equipo: 157,5 x 77,4 x 7,7 mm\r\n    Llamadas por WiFi: Si', 130000, '/img/productos/iPhone Xs Max 64GB/iPhone Xs Max 64GB.jpg', 25),
(11, 1, 9, 'LG Q60', 50, 'Cámara secundaria: 13 mpx\r\n    Sistema Operativo: Android 9.0\r\n    Tipo de SIM: Nano-SIM\r\n    Red: 2G, 3G, 4G\r\n    Frecuencia 2G: 850/900/1800/1900 MHz\r\n    Frecuencia 3G: 850/900/1700/1900/2100 MHz\r\n    Frecuencia 4G: Bandas 1, 2, 3, 4, 5, 7, 8, 12, 17, 28, 66.\r\n    Batería: 3500 mAh\r\n    Batería en modo Stand By: 318 h\r\n    Tiempo de conversación: 9 h\r\n    Memoria RAM: 3 GB\r\n    Memoria Interna: 64 GB | Disponibles 47 GB\r\n    Memoria Externa: MicroSD hasta 256 GB\r\n    Peso: 172 g\r\n    Dimensión del equipo: 161,3 x 77 x 8,75 mm\r\n    Llamadas por WiFi: Si', 24000, '/img/productos/LG Q60/LG Q60.jpg', 10),
(16, 1, 5, 'Moto E5 Play', 20, 'hola', 9000, '/img/productos/Moto E5 Play/Moto E5 Play.jpg', 25),
(29, 2, 6, 'Toga Himiko Boku No Hero Academia Sugoi', 25, 'Estilo: Unisex\r\nColor: Negro\r\nTalle: M', 700, '/img/productos/Toga Himiko Boku No Hero Academia Sugoi/Toga Himiko Boku No Hero Academia Sugoi.png', 0),
(30, 6, 7, 'Mother ASUS TUF X570-PLUS GAMING WiFi AM4 PCIe 4.0 Dual M.2', 30, 'CARACTERISTICAS GENERALES\r\nSocket: AM4 Ryzen 3th Gen, AM4 APU 2th Gen\r\nChipsets Principal: AMD X570\r\nPlataforma: AMD\r\nCONECTIVIDAD\r\nSalidas HDMI : 1\r\nSalidas Display Ports: 1\r\nPlaca WiFi integrada:Sí\r\nPuertos SATA: 8\r\nCantidad de slot m2: 2\r\nCantidad de slot PCI-E 16X: 2\r\nCantidad de slot PCI-E 1X: 2\r\nTecnología multi GPU: Crossfire\r\nSistema de conexión RGB : ARGB Header, RGB Header\r\nPlaca de Red\r\nGigabit LAN 10/100/1000 Mb/s\r\nPuertos USB 2.0 traseros: 4\r\nPuertos USB 3.0 traseros: 2\r\nDIMENSIONES\r\nFactor: ATX\r\nENERGIA\r\nConector 24pines: 1\r\nConsumo: 35 w\r\nConectos CPU 4pines: 1\r\nConector CPU 4pines Plus: 1\r\nWatts máximos para CPU: 105\r\nMEMORIA\r\nCantidad de slot DDR4: 4', 16100, '/img/productos/Mother ASUS TUF X570-PLUS GAMING WiFi AM4 PCIe 4.0 Dual M.2/Mother ASUS TUF X570-PLUS GAMING WiFi AM4 PCIe 4.0 Dual M.2.jpg', 0),
(31, 4, 11, 'Playstation Ps4', 10, 'Especificaciones generales\r\nCPU: AMD Jaguar x86-64 de baja potencia, 8 núcleos\r\nGPU:1,84 TFLOPS, tarjeta gráfica AMD basada en Radeon™ de próxima generación\r\nMemoria: GDDR5 de 8 GB\r\nHDD: Unidad de disco duro de 500 GB\r\nUnidad óptica (solo lectura): BD x 6 CAV; DVD x 8 CAV\r\nPuertos USB: 2,0\r\nConectividad de red\r\nTipo de conexión: Ethernet\r\nWi-Fi: IEEE 802.11 b/g/n\r\nTipo de Ethernet: 1 (10BASE-T, 100BASE-TX, 1000BASE-T)\r\nBluetooth®: Bluetooth® 2.1 (EDR)\r\nInterfaz\r\nHDMI®: Puerto de salida HDMI\r\n¿Qué incluye la caja?\r\n Sistema PlayStation®4; controlador inalámbrico DUALSHOCK® 4; auriculares mono; cable de alimentación de CA; cable HDMI; cable USB', 50000, '/img/productos/Playstation Ps4/Playstation Ps4.png', 25),
(32, 1, 4, 'Nokia 2.2', 10, 'Display: 5.71\'\' HD+\r\n    Procesador: Octa Core 2 GHz \r\n    Cámara principal:13 mpx con flash LED | Dual | Zoom digital 4x  \r\n    Cámara secundaria: 5 mpx\r\n    Sistema Operativo: Android 9.0\r\n    Tipo de SIM: Nano-SIM\r\n    Red: 2G, 3G, 4G\r\n    Frecuencia 2G: 850/900/1800/1900 MHz\r\n    Frecuencia 3G: 850/900/1800/1900/2100 MHz\r\n    Frecuencia 4G: Bandas 1, 2, 3, 4, 5, 7, 8, 12, 17, 28, 38, 40.\r\n    Batería: 3000 mAh\r\n    Batería en modo Stand By: 418 h\r\n    Tiempo de conversación: 21 h\r\n    Memoria RAM: 3 GB\r\n    Memoria Interna: 32 GB | Disponibles 20 GB\r\n    Memoria Externa: MicroSD hasta 256 GB\r\n    Peso: 153 g\r\n    Dimensión del equipo: 145,9 x 70,5 x 8,1 mm\r\n    Llamadas por WiFi: Si', 14500, '/img/productos/Nokia 2.2/Nokia 2.2.jpg', 0),
(33, 1, 10, 'Moto Z3 Play', 20, 'Display: 6\'\' Full HD\r\n    Procesador: Octa Core 1.8 GHz\r\n    Cámara principal:12 mpx con flash dual LED | Zoom digital 8x\r\n    Cámara secundaria: 5 mpx con flash\r\n    Sistema Operativo: Android 8.0\r\n    Tipo de SIM: Nano-SIM\r\n    Red: 2G, 3G, 4G\r\n    Frecuencia 2G: 850/900/1800/1900 MHz\r\n    Frecuencia 3G: 850/900/1700/1900/2100 MHz\r\n    Frecuencia 4G: Bandas 1, 2, 3, 4, 5, 7, 8, 12, 17, 28, 66.\r\n    Batería: 3000 mAh\r\n    Batería en modo Stand By: 24 h\r\n    Tiempo de conversación: 14 hs\r\n    Memoria RAM: 4 GB\r\n    Memoria Interna: 64 GB | Disponibles 45 GB\r\n    Memoria Externa: MicroSD hasta 128 GB\r\n    Peso: 155 g\r\n    Llamadas por WiFi: Si', 30000, '/img/productos/Moto Z3 Play/Moto Z3 Play.jpg', 0),
(37, 2, 13, 'Death Note Con Capucha', 100, 'Death Note Con Capucha\r\nAnime Death Note Con Capucha Sudadera Jersey Luz', 1800, '/img/productos/Death Note Con Capucha/Death Note Con Capucha.png', NULL),
(38, 5, 13, 'Desarrollo de sistemas', 10, 'SOFTWARE A MEDIDA!\r\nDE APLICACIONES WEB\r\n* Software basado en web o en la nube.\r\n* Desarrollo de software basado en Web> \r\n* Accesible desde cualquier computadora o dispositivo con internet >\r\n* Robustos, confiables, eficientes. \r\n*Servidores dedicados de última generación y alta performance.\r\nUTILIZACIÓN DE LA MÁS MODERNA TECNOLOGÍA DISPONIBLE ACTUALMENTE', 1111, '/img/productos/Desarrollo de sistemas/Desarrollo de sistemas.png', 0.25),
(39, 2, 13, 'Camiseta Death Note', 45, 'Camiseta Death Note\r\n\r\nImpresión digital de alta durabilidad, con colores vivos e imágenes de alta resolución.\r\n\r\nEs posible ponerlo en una lavadora y planchar en caliente sobre la impresión hasta 40º c.', 1568, '/img/productos/Camiseta Death Note/Camiseta Death Note.jpg', 30),
(40, 2, 13, 'Camiseta Naruto', 200, 'Camiseta Naruto\r\n\r\nImpresión digital de alta durabilidad, con colores vivos e imágenes de alta resolución.\r\n\r\nEs posible ponerlo en una lavadora y planchar en caliente sobre la impresión hasta 40º c.', 2000, '/img/productos/Camiseta Naruto/Camiseta Naruto.jpg', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2020-02-19 06:03:33', '2020-02-19 06:03:33'),
(2, 'user', 'User', '2020-02-19 06:03:33', '2020-02-19 06:03:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, 2, '2020-02-19 06:23:59', '2020-02-19 06:23:59'),
(2, 2, 1, '2020-02-19 06:39:58', '2020-02-19 06:39:58'),
(3, 1, 3, '2020-02-19 03:00:00', '2020-02-19 03:00:00'),
(4, 2, 4, '2020-02-20 15:29:42', '2020-02-20 15:29:42'),
(5, 2, 5, '2020-02-20 15:37:27', '2020-02-20 15:37:27'),
(6, 2, 6, '2020-02-20 23:26:30', '2020-02-20 23:26:30'),
(7, 2, 7, '2020-02-21 15:44:35', '2020-02-21 15:44:35'),
(8, 2, 8, '2020-02-22 03:56:39', '2020-02-22 03:56:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexos`
--

CREATE TABLE `sexos` (
  `id_sexo` int(11) NOT NULL,
  `sexo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sexos`
--

INSERT INTO `sexos` (`id_sexo`, `sexo`) VALUES
(2, 'Femenino'),
(1, 'Masculino'),
(3, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetas`
--

CREATE TABLE `tarjetas` (
  `id_tarjeta` int(11) NOT NULL,
  `id_tipo_tarjeta` int(11) NOT NULL,
  `nombre_titular` varchar(45) NOT NULL,
  `numeroTarjeta` varchar(20) NOT NULL,
  `cvc` int(11) NOT NULL,
  `fecha_vencimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tarjetas`
--

INSERT INTO `tarjetas` (`id_tarjeta`, `id_tipo_tarjeta`, `nombre_titular`, `numeroTarjeta`, `cvc`, `fecha_vencimiento`) VALUES
(1, 2, 'lucas peres', '4465781723728254', 424, '2027-07-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_entrega`
--

CREATE TABLE `tipo_entrega` (
  `id_tipo_entrega` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_envios`
--

CREATE TABLE `tipo_envios` (
  `id_tipo_envio` int(11) NOT NULL,
  `tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_factura`
--

CREATE TABLE `tipo_factura` (
  `id_tipo_factura` int(11) NOT NULL,
  `tipo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_tarjeta`
--

CREATE TABLE `tipo_tarjeta` (
  `id_tipo_tarjeta` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_tarjeta`
--

INSERT INTO `tipo_tarjeta` (`id_tipo_tarjeta`, `tipo`) VALUES
(4, 'America Express'),
(3, 'Discover'),
(1, 'Mastercard'),
(2, 'Visa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo_cliente` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_cliente`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
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
  `telefono` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `apellido`, `user`, `email`, `img`, `id_tipo_de_usuario`, `id_sexo`, `id_direccion`, `id_tarjeta`, `id_carrito`, `id_estado`, `fecha_nacimiento`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `telefono`) VALUES
(1, 'lucas', 'Peres', '12lucas', 'lucas@gmail.com', '/img/usuario/lucas@gmail.com/lucas@gmail.com.png', 2, 1, 1, 1, 1, 1, '1990-06-13', '2020-03-13 03:14:51', '$2y$10$5k2aUzM6s6WLZQRI.VUsjeKSAK21pOzAHW0fUzzqG93s7KaiP7DJ6', 'usFMvrG9GN4hv6inzTLr6m0JEAapU3nDISGFHHFBgb9V0OEUE5seMi0mscnM', '2020-02-18 19:37:15', '2020-03-13 03:14:51', '1554563205'),
(2, 'lucas', 'peres', '12pedro', 'pedro@gmail.com', '/img/perfil.png', 2, NULL, NULL, NULL, 2, NULL, NULL, NULL, '$2y$10$18jFS5CBHmOxEdnsTWhRKOTy6EIk25IMwcLKEcnE56mRzJdfZl0Oe', NULL, '2020-02-19 06:23:59', '2020-02-20 04:52:14', NULL),
(3, 'pedro', 'feliz', 'admin', 'admin@gmail.com', '/img/perfil.png', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-13 02:26:59', '$2y$10$uFThq.EwtQzkxubBle7i2.bVx8wnFPtMwgM3kYvGw7bE/CecF1cra', NULL, '2020-02-19 06:39:58', '2020-03-13 02:26:59', NULL),
(4, 'fede', 'fede', 'fede', 'fede@gmail.com', '/img/perfil.png', 2, NULL, NULL, NULL, 3, NULL, NULL, NULL, '$2y$10$eH7w4n4HXWJRz8hrAnYuU.sdWVn2eyNqHW8SB17LytiU47il5jLsq', NULL, '2020-02-20 15:29:41', '2020-02-20 15:30:09', NULL),
(5, 'des', 'des', 'des', 'des@gmail.com', '/img/perfil.png', 2, NULL, NULL, NULL, 4, NULL, NULL, NULL, '$2y$10$dJ4xBy1vwdQ55AKwgTGIOOlmKm1y9bUiCAg/REgBzF.Us4XUoxyiy', NULL, '2020-02-20 15:37:27', '2020-02-20 15:38:14', NULL),
(7, 'fer', 'fer', 'fer', 'fer@gmail.com', '/img/perfil.png', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$r9dyNkMjcPrxJQ1G18hy9.1lW9wpmilE3JH.JrY97sqEWyYCwEicq', NULL, '2020-02-21 15:44:35', '2020-02-21 15:44:35', NULL),
(8, 're', 're', '12rer', 're@gmail.com', '/img/perfil.png', 2, NULL, NULL, NULL, 5, NULL, NULL, NULL, '$2y$10$odKZ5t5jIyXknBSewPPSXe4hTzY6yFGnDgFKZXC/fh66vEv5Cw31q', NULL, '2020-02-22 03:56:39', '2020-02-22 03:57:03', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carritos`
--
ALTER TABLE `carritos`
  ADD PRIMARY KEY (`id_carrito`),
  ADD UNIQUE KEY `id_usuario_UNIQUE` (`id_usuario`),
  ADD UNIQUE KEY `id_carrito_UNIQUE` (`id_carrito`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`),
  ADD UNIQUE KEY `id_categoria_UNIQUE` (`id_categoria`);

--
-- Indices de la tabla `detalle_de_productos`
--
ALTER TABLE `detalle_de_productos`
  ADD PRIMARY KEY (`id_detalle_de_Producto`),
  ADD UNIQUE KEY `id_detalle_de_Producto_UNIQUE` (`id_detalle_de_Producto`),
  ADD KEY `idcarrito_idx` (`idcarrito`),
  ADD KEY `idproducto_idx` (`idproducto`),
  ADD KEY `id_estado_producto_idx` (`id_estado_producto`);

--
-- Indices de la tabla `detalle_productos_comprados`
--
ALTER TABLE `detalle_productos_comprados`
  ADD PRIMARY KEY (`id_detalle_de_producto`),
  ADD UNIQUE KEY `id_detalle_de_producto_UNIQUE` (`id_detalle_de_producto`),
  ADD KEY `id_facturadpc_idx` (`id_facturadpc`),
  ADD KEY `id_productodpc_idx` (`id_productodpc`);

--
-- Indices de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD PRIMARY KEY (`id_direccion`),
  ADD UNIQUE KEY `id_direccion_UNIQUE` (`id_direccion`);

--
-- Indices de la tabla `envios`
--
ALTER TABLE `envios`
  ADD PRIMARY KEY (`id_envio`),
  ADD UNIQUE KEY `id_envio_UNIQUE` (`id_envio`),
  ADD KEY `id_estado_envio_idx` (`id_estado_envio`),
  ADD KEY `id_tipo_envio_idx` (`id_tipo_envio`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id_estado`),
  ADD UNIQUE KEY `id_estados_UNIQUE` (`id_estado`);

--
-- Indices de la tabla `estados_envios`
--
ALTER TABLE `estados_envios`
  ADD PRIMARY KEY (`id_estado_de_envio`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  ADD UNIQUE KEY `id_estado_de_envio_UNIQUE` (`id_estado_de_envio`);

--
-- Indices de la tabla `estado_producto`
--
ALTER TABLE `estado_producto`
  ADD PRIMARY KEY (`id_estado_producto`),
  ADD UNIQUE KEY `id_estado_producto_UNIQUE` (`id_estado_producto`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id_factura`),
  ADD UNIQUE KEY `id_factura_UNIQUE` (`id_factura`),
  ADD KEY `id_tipo_factura_idx` (`id_tipo_factura`),
  ADD KEY `id_direccionf_idx` (`id_direccionf`),
  ADD KEY `id_usuariof_idx` (`id_usuariof`),
  ADD KEY `id_tarjetaf_idx` (`id_tarjetaf`),
  ADD KEY `id_enviosf_idx` (`id_enviosf`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id_imagen`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`marca`),
  ADD UNIQUE KEY `id_marca_UNIQUE` (`id_marca`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD UNIQUE KEY `id_producto_UNIQUE` (`id_producto`),
  ADD KEY `id_marca_idx` (`id_marca`),
  ADD KEY `id_categoria_idx` (`id_categoria`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sexos`
--
ALTER TABLE `sexos`
  ADD PRIMARY KEY (`id_sexo`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`sexo`),
  ADD UNIQUE KEY `id_sexo_UNIQUE` (`id_sexo`);

--
-- Indices de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  ADD PRIMARY KEY (`id_tarjeta`),
  ADD UNIQUE KEY `id_tarjeta_UNIQUE` (`id_tarjeta`),
  ADD UNIQUE KEY `numeroTarjeta_UNIQUE` (`numeroTarjeta`),
  ADD KEY `id_tipo_tarjeta_idx` (`id_tipo_tarjeta`);

--
-- Indices de la tabla `tipo_entrega`
--
ALTER TABLE `tipo_entrega`
  ADD PRIMARY KEY (`id_tipo_entrega`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  ADD UNIQUE KEY `id_tipo_entrega_UNIQUE` (`id_tipo_entrega`);

--
-- Indices de la tabla `tipo_envios`
--
ALTER TABLE `tipo_envios`
  ADD PRIMARY KEY (`id_tipo_envio`),
  ADD UNIQUE KEY `id_tipo_envios_UNIQUE` (`id_tipo_envio`);

--
-- Indices de la tabla `tipo_factura`
--
ALTER TABLE `tipo_factura`
  ADD PRIMARY KEY (`id_tipo_factura`),
  ADD UNIQUE KEY `id_tipo_factura_UNIQUE` (`id_tipo_factura`);

--
-- Indices de la tabla `tipo_tarjeta`
--
ALTER TABLE `tipo_tarjeta`
  ADD PRIMARY KEY (`id_tipo_tarjeta`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`tipo`),
  ADD UNIQUE KEY `id_tipo_tarjeta_UNIQUE` (`id_tipo_tarjeta`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_cliente`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  ADD UNIQUE KEY `id_tipo_cliente_UNIQUE` (`id_tipo_cliente`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_usuario_UNIQUE` (`id`),
  ADD UNIQUE KEY `user_UNIQUE` (`user`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `id_sexo_idx` (`id_sexo`),
  ADD KEY `id_direccion_idx` (`id_direccion`),
  ADD KEY `id_tipo_de_usuario_idx` (`id_tipo_de_usuario`),
  ADD KEY `id_carrito_idx` (`id_carrito`),
  ADD KEY `id_tarjeta_idx` (`id_tarjeta`),
  ADD KEY `id_estado_idx` (`id_estado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carritos`
--
ALTER TABLE `carritos`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `detalle_de_productos`
--
ALTER TABLE `detalle_de_productos`
  MODIFY `id_detalle_de_Producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `detalle_productos_comprados`
--
ALTER TABLE `detalle_productos_comprados`
  MODIFY `id_detalle_de_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  MODIFY `id_direccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `envios`
--
ALTER TABLE `envios`
  MODIFY `id_envio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estados_envios`
--
ALTER TABLE `estados_envios`
  MODIFY `id_estado_de_envio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estado_producto`
--
ALTER TABLE `estado_producto`
  MODIFY `id_estado_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id_imagen` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `sexos`
--
ALTER TABLE `sexos`
  MODIFY `id_sexo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  MODIFY `id_tarjeta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipo_entrega`
--
ALTER TABLE `tipo_entrega`
  MODIFY `id_tipo_entrega` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_envios`
--
ALTER TABLE `tipo_envios`
  MODIFY `id_tipo_envio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_factura`
--
ALTER TABLE `tipo_factura`
  MODIFY `id_tipo_factura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_tarjeta`
--
ALTER TABLE `tipo_tarjeta`
  MODIFY `id_tipo_tarjeta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carritos`
--
ALTER TABLE `carritos`
  ADD CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_de_productos`
--
ALTER TABLE `detalle_de_productos`
  ADD CONSTRAINT `id_estado_producto` FOREIGN KEY (`id_estado_producto`) REFERENCES `estado_producto` (`id_estado_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idcarrito` FOREIGN KEY (`idcarrito`) REFERENCES `carritos` (`id_carrito`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idproducto` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_productos_comprados`
--
ALTER TABLE `detalle_productos_comprados`
  ADD CONSTRAINT `id_facturadpc` FOREIGN KEY (`id_facturadpc`) REFERENCES `facturas` (`id_factura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_productodpc` FOREIGN KEY (`id_productodpc`) REFERENCES `productos` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `envios`
--
ALTER TABLE `envios`
  ADD CONSTRAINT `id_estado_envio` FOREIGN KEY (`id_estado_envio`) REFERENCES `estados_envios` (`id_estado_de_envio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_tipo_envio` FOREIGN KEY (`id_tipo_envio`) REFERENCES `tipo_envios` (`id_tipo_envio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `id_direccionf` FOREIGN KEY (`id_direccionf`) REFERENCES `direcciones` (`id_direccion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_enviosf` FOREIGN KEY (`id_enviosf`) REFERENCES `envios` (`id_envio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_tarjetaf` FOREIGN KEY (`id_tarjetaf`) REFERENCES `tarjetas` (`id_tarjeta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_tipo_factura` FOREIGN KEY (`id_tipo_factura`) REFERENCES `tipo_factura` (`id_tipo_factura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_usuariof` FOREIGN KEY (`id_usuariof`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `id_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_marca` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id_marca`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  ADD CONSTRAINT `id_tipo_tarjeta` FOREIGN KEY (`id_tipo_tarjeta`) REFERENCES `tipo_tarjeta` (`id_tipo_tarjeta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `id_carrito` FOREIGN KEY (`id_carrito`) REFERENCES `carritos` (`id_carrito`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_direccion` FOREIGN KEY (`id_direccion`) REFERENCES `direcciones` (`id_direccion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_estado` FOREIGN KEY (`id_estado`) REFERENCES `estados` (`id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_sexo` FOREIGN KEY (`id_sexo`) REFERENCES `sexos` (`id_sexo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_tarjeta` FOREIGN KEY (`id_tarjeta`) REFERENCES `tarjetas` (`id_tarjeta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_tipo_de_usuario` FOREIGN KEY (`id_tipo_de_usuario`) REFERENCES `tipo_usuario` (`id_tipo_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
