-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-02-2020 a las 21:07:07
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

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
CREATE DATABASE IF NOT EXISTS `e-commerce` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `e-commerce`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carritos`
--

CREATE TABLE `carritos` (
  `id_carrito` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `categoria`) VALUES
(1, 'Celular'),
(2, 'Accesorio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_de_productos`
--

CREATE TABLE `detalle_de_productos` (
  `id_detalle_de_Producto` int(11) NOT NULL,
  `idcarrito` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `id_estado_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(4, 'Nokia'),
(5, 'Samsung');

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
(3, '2020_02_13_231722_alter_user_table', 1);

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
  `nombre` varchar(45) NOT NULL,
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
(1, 1, 4, 'Nokia 7.1', 23, '                                                                    \r\n\r\n    Cámara secundaria: 8 mpx\r\n    Sistema Operativo: Android 9.0\r\n    Tipo de SIM: Nano-SIM\r\n    Red: 2G, 3G, 4G\r\n    Frecuencia 2G: 850/900/1800/1900 MHz\r\n    Frecuencia 3G: 850/900/1700/1900/2100 MHz\r\n    Frecuencia 4G: Bandas 1, 2, 3, 4, 5, 7, 8, 12, 17, 28, 40.\r\n    Batería: 3060 mAh\r\n    Batería en modo Stand By: 408 h\r\n    Tiempo de conversación: 19 h\r\n    Memoria RAM: 4 GB\r\n    Memoria Interna: 64 GB | Disponibles 50 GB\r\n    Memoria Externa: MicroSD hasta 256 GB\r\n    Peso: 160 g\r\n    Dimensión del equipo: 149,7 x 71,2 x 8 mm\r\n    Bluetooth: Si\r\n    Marcación por Voz: Si\r\n    Llamadas por WiFi: Si                                    ', 29000, '/img/productos/Nokia 7.1/phone5e3195b051393.jpg', 0),
(8, 1, 1, 'hola', 23, '                                                    ', 0, '/img/productos/hola/phone5e33e9d3a63c2.jpg', 0),
(9, 1, 1, 'es 9', 23, '                                                    ', 0, 'img/productos/es 9/phone5e34411d7a0f1.jpg', 0),
(11, 1, 1, '', 23, '', 0, 'img/productos/phone.jpg', 0),
(16, 1, 5, 'Moto E5 Play', 20, 'hola', 9000, '/img/productos/Moto E5 Play/Moto E5 Play.jpg', 25);

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
  `img` varchar(10000) NOT NULL DEFAULT '/img/defaul.png',
  `id_tipo_de_usuario` int(11) NOT NULL DEFAULT 1,
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
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detalle_de_productos`
--
ALTER TABLE `detalle_de_productos`
  MODIFY `id_detalle_de_Producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_productos_comprados`
--
ALTER TABLE `detalle_productos_comprados`
  MODIFY `id_detalle_de_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  MODIFY `id_direccion` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_estado_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `sexos`
--
ALTER TABLE `sexos`
  MODIFY `id_sexo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  MODIFY `id_tarjeta` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
