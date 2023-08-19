-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2023 a las 01:27:55
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_cruz_julian`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id_consulta` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `mail` varchar(60) NOT NULL,
  `asunto` varchar(80) NOT NULL,
  `consulta` text NOT NULL,
  `consulta_leido` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id_consulta`, `nombre`, `mail`, `asunto`, `consulta`, `consulta_leido`) VALUES
(37, 'Ramon Gutierrez', 'ramonguti26@gmail.com', 'Compra mayorista', 'Hola quisiera saber si realizan rebajas en los precios si compro 20 o más productos.\r\nQuedo a la espera de una respuesta.\r\n\r\nSaludos!', 1),
(38, 'Yamila Davalos', 'yamidavalos@gmail.com', 'Publicidad', 'Hola, soy licenciada en marketing y realizo campañas publicitarias muy efectivas. \r\nSi le interesa contácteme, cuento con precios accesibles.\r\nSaludos Atte. ', 1),
(39, 'Leopoldo Gaudencio Ramirez', 'leoramirez42@gmail.com', 'Sobre la RTX 4090', 'Hola, ¿cuando tendrá stock de la RTX 4090 de cualquier marca?.\r\nLe mando un saludo. ', 0),
(40, 'Fabián Bogado', 'fabibogado95@yahoo.com', 'Reparaciones de computadoras', 'Hola le quería consultar si realizan reparaciones y limpieza de computadoras.\r\nsaludos!', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `detalle_cantidad` int(11) NOT NULL,
  `detalle_precioUnitario` decimal(20,2) NOT NULL,
  `detalle_precioTotal` decimal(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id_venta`, `id_producto`, `detalle_cantidad`, `detalle_precioUnitario`, `detalle_precioTotal`) VALUES
(10020, 24, 1, '380000.00', '380000.00'),
(10020, 11, 3, '330000.00', '990000.00'),
(10020, 17, 2, '39000.00', '78000.00'),
(10020, 16, 2, '63000.00', '126000.00'),
(10021, 21, 1, '350000.00', '350000.00'),
(10021, 20, 1, '600500.00', '600500.00'),
(10021, 17, 1, '39000.00', '39000.00'),
(10021, 26, 2, '73000.00', '146000.00'),
(10022, 11, 1, '330000.00', '330000.00'),
(10022, 17, 1, '39000.00', '39000.00'),
(10022, 16, 1, '63000.00', '63000.00'),
(10022, 12, 2, '190000.00', '380000.00'),
(10023, 15, 1, '261500.00', '261500.00'),
(10023, 25, 1, '1350000.00', '1350000.00'),
(10023, 8, 1, '173500.00', '173500.00'),
(10023, 7, 1, '110000.00', '110000.00'),
(10024, 9, 2, '283000.00', '566000.00'),
(10024, 22, 1, '740700.00', '740700.00'),
(10025, 7, 3, '110000.00', '330000.00'),
(10025, 14, 1, '680000.00', '680000.00'),
(10026, 11, 1, '330000.00', '330000.00'),
(10026, 17, 1, '39000.00', '39000.00'),
(10026, 16, 1, '63000.00', '63000.00'),
(10027, 11, 2, '330000.00', '660000.00'),
(10027, 17, 1, '39000.00', '39000.00'),
(10027, 16, 1, '63000.00', '63000.00'),
(10028, 11, 1, '330000.00', '330000.00'),
(10028, 17, 1, '39000.00', '39000.00'),
(10028, 16, 1, '63000.00', '63000.00'),
(10028, 18, 5, '22150.00', '110750.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id_perfil` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id_perfil`, `descripcion`) VALUES
(1, 'Cliente'),
(2, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id_persona` int(11) NOT NULL,
  `persona_apellido` varchar(50) NOT NULL,
  `persona_nombre` varchar(50) NOT NULL,
  `persona_telefono` varchar(25) NOT NULL,
  `persona_dni` int(25) NOT NULL,
  `persona_mail` varchar(60) NOT NULL,
  `persona_password` varchar(200) NOT NULL,
  `perfil_id` int(11) NOT NULL,
  `persona_estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_persona`, `persona_apellido`, `persona_nombre`, `persona_telefono`, `persona_dni`, `persona_mail`, `persona_password`, `perfil_id`, `persona_estado`) VALUES
(15, 'Cruz', 'Julian Luis', '3795012213', 40332522, 'cruzjulian.dev@gmail.com', '$2y$10$BJLerjevoikCaOwDSvoUy.L90mZH2SZurPzPyx9GWePbCASxYQTwa', 2, 1),
(16, 'Davalos', 'Yamila', '3694232323', 43344323, 'yami@gmail.com', '$2y$10$khzwTztv2p4H7JxWDgEV6u55z4jhro6KmXJ1B.PJoeHII7B3u.EB.', 1, 1),
(17, 'Admin', 'Admin', '3795343434', 32434343, 'admin@admin.com', '$2y$10$6Q5t9Lth5aXso1FITHAcsuwBfp/RjbXzbHCiDQdBEYuZaBsyhjeTa', 2, 1),
(18, 'Usuario', 'Usuario', '3890433434', 22332232, 'usuario@usuario.com', '$2y$10$MohMzBPM4z1fG/OvjseZq.AqsnNoqWrzYVmiV8sfINrQY4KwAdPDS', 1, 1),
(19, 'Perez', 'Juan', '3794023323', 34342123, 'juanperez@gmail.com', '$2y$10$HIp0hnh1.li7iO4voTNs1.ClOfv2PoMbc8SY73IgdGRCTkd3YUu0m', 1, 1),
(20, 'Ramirez', 'Leopoldo Gaudencio', '3344232312', 16263263, 'leoramirez42@gmail.com', '$2y$10$wtonaH5PJ64KSN7trsp5T.f6dQQ9VC5blu3QGh26fbnjjESbnLRc6', 1, 1),
(21, 'Portillo', 'Leonardo', '3774332211', 29943454, 'leoportillo@yahoo.com', '$2y$10$KGSxpHG6O5hwmES8uh7Cqexnr0tgGetA/4Dv7BUDOge35dZKI3fFS', 1, 1),
(22, 'Portillo', 'Marcelo', '3784343412', 23234454, 'marceloportillo@gmail.com', '$2y$10$S9rSNBCXtBjSlCzOAWKuT.0EguVGisKl23jmACCeaODBeHoz1Z.3O', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `producto_id` int(11) NOT NULL,
  `producto_descripcion` varchar(150) NOT NULL,
  `producto_categoria` int(11) NOT NULL,
  `producto_imagen` varchar(150) NOT NULL,
  `producto_precio` decimal(20,2) NOT NULL,
  `producto_stock` int(11) NOT NULL,
  `producto_vendidos` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `producto_estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`producto_id`, `producto_descripcion`, `producto_categoria`, `producto_imagen`, `producto_precio`, `producto_stock`, `producto_vendidos`, `created_at`, `producto_estado`) VALUES
(7, 'Procesador Intel Core i3 13100 4.5 Ghz Raptor Lake', 1, '1685443368_887ca5d77416803f1c59.jpg', '110000.00', 1, 4, '2023-05-30 07:42:48', 1),
(8, 'Procesador Intel Core i5-13600K 5.1 Ghz Raptor Lake', 1, '1685443414_e4087545258767b5459a.jpg', '173500.00', 13, 1, '2023-05-30 07:43:34', 1),
(9, 'Procesador Intel Core i7 13700K 5.4 Ghz Raptor Lake', 1, '1685443444_5d14a014fb3ff79b744c.jpg', '283000.00', 10, 2, '2023-05-30 07:44:04', 1),
(10, 'Placa De Video GeForce RTX 3070 Ti 8Gb Msi Gaming X Trio', 2, '1685443504_228512084e13749ca4f5.jpg', '430000.00', 13, 0, '2023-05-30 07:52:36', 1),
(11, 'Placa De Video GeForce RTX 3080 10Gb PNY Triple Fan', 2, '1685443526_6bbe0d885b2791a55e17.jpg', '330000.00', 3, 8, '2023-05-30 07:45:26', 1),
(12, 'Placa De Video GeForce GTX 1660 6Gb Super Asus Tuf Gaming', 2, '1685887452_76b23b070348360d036f.jpg', '190000.00', 35, 2, '2023-05-30 07:45:51', 1),
(13, 'Monitor Gigabyte 34 Curvo Ultrawide 144Hz 1Ms', 3, '1685443636_a61f9e7cfcedf7dd06d4.jpg', '384000.00', 14, 0, '2023-05-30 07:47:16', 1),
(14, 'Monitor LG Led 49 Curvo UltraWide 60Hz 5Ms', 3, '1685443667_3233d03d96c42d1d8b3b.jpg', '680000.00', 7, 1, '2023-05-30 07:47:47', 1),
(15, 'Monitor Viewsonic XG251G 25 1Ms', 3, '1685443695_6b9c65c43906ea3031e2.jpg', '261500.00', 20, 1, '2023-05-30 07:52:38', 1),
(16, 'Cámara Web Logitech Brio 4K Rightlight 3', 4, '1685443727_36ab8ab2db9a483cbe69.jpg', '63000.00', 27, 6, '2023-05-30 07:48:47', 1),
(17, 'Auricular Gamer HyperX Cloud II 7.1 Inalambrico', 4, '1685443749_fba29a5832f25c15be2a.jpg', '39000.00', 122, 7, '2023-05-30 07:49:09', 1),
(18, 'Teclado Logitech Mecanico K835 TKL Gamer', 4, '1685443772_7ff31a01d813c3f9da30.jpg', '22150.00', 53, 5, '2023-05-30 07:52:32', 1),
(19, 'Ryzen 5 5600X - 16 GB - GTX1660S', 5, '1685443803_c750a98e0144069ff12c.jpg', '530000.00', 8, 0, '2023-05-30 07:50:03', 1),
(20, 'Intel Core i5 11600K - 16 GB - GTX1660', 5, '1685443827_7e22c0f028488053026d.jpg', '600500.00', 10, 1, '2023-05-30 07:50:27', 1),
(21, 'Amd Ryzen 7 4750G - 16 GB - GT1030', 5, '1685443866_57567096b57d6f6181d3.jpg', '350000.00', 12, 1, '2023-05-30 07:48:10', 1),
(22, 'Intel Core i7 11700K - 16 GB - RTX3070', 5, '1685443892_8b2ba86048adf7ddfed1.jpg', '740700.00', 5, 1, '2023-05-30 07:48:11', 1),
(23, 'Placa De Video GeForce RTX 4080 16Gb Asus Gaming', 2, '1685443975_119e32304b82528d8ff6.jpg', '895000.00', 6, 0, '2023-05-30 07:52:55', 1),
(24, 'Procesador Intel Core i9 13900K 5.8 Ghz Raptor Lake', 1, '1685444001_e1f89191f1876923385c.jpg', '380000.00', 12, 1, '2023-05-30 07:53:21', 1),
(25, 'Monitor Samsung 55 Curvo Odyssey 4K 165Hz 1Ms', 3, '1685444028_44e6373f661d311af1c2.jpg', '1350000.00', 5, 1, '2023-05-30 07:51:43', 1),
(26, 'Micrófono HyperX Quadcast S Blanco Profesional', 4, '1685444053_7bb1d6da730fe7f3a02d.jpg', '73000.00', 7, 2, '2023-05-30 07:50:44', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_categoria`
--

CREATE TABLE `producto_categoria` (
  `categoria_id` int(11) NOT NULL,
  `categoria_descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto_categoria`
--

INSERT INTO `producto_categoria` (`categoria_id`, `categoria_descripcion`) VALUES
(1, 'Procesadores'),
(2, 'Placas de video'),
(3, 'Monitores'),
(4, 'Perifericos'),
(5, 'PC Armadas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `venta_id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `venta_fecha` date NOT NULL,
  `venta_total` decimal(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`venta_id`, `id_cliente`, `venta_fecha`, `venta_total`) VALUES
(10020, 16, '2023-06-12', '1574000.00'),
(10021, 19, '2023-06-12', '1135500.00'),
(10022, 21, '2023-06-12', '812000.00'),
(10023, 22, '2023-06-12', '1895000.00'),
(10024, 16, '2023-06-12', '1306700.00'),
(10025, 22, '2023-06-12', '1010000.00'),
(10026, 19, '2023-06-12', '432000.00'),
(10027, 21, '2023-06-12', '762000.00'),
(10028, 16, '2023-06-12', '542750.00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id_consulta`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_persona`),
  ADD KEY `perfil_id` (`perfil_id`),
  ADD KEY `perfil_id_2` (`perfil_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`producto_id`),
  ADD KEY `producto_categoria` (`producto_categoria`);

--
-- Indices de la tabla `producto_categoria`
--
ALTER TABLE `producto_categoria`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`venta_id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `producto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `producto_categoria`
--
ALTER TABLE `producto_categoria`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `venta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10029;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`producto_id`),
  ADD CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`venta_id`);

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `personas_ibfk_1` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`id_perfil`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`producto_categoria`) REFERENCES `producto_categoria` (`categoria_id`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `personas` (`id_persona`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
