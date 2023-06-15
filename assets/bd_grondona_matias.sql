-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2023 a las 03:20:35
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_grondona_matias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mensaje` varchar(1000) NOT NULL,
  `leído` varchar(2) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `nombre`, `email`, `mensaje`, `leído`) VALUES
(1, 'matias', 'grondonamatias@gmail.com', 'jsidnrhrf', 'NO'),
(2, 'prueba', 'matias@gmail.com', 'estoy viendo si el modal en la tabla del administrador muestra los datos de manera dinámica o solo lo del primer elemento de la tabla. ', 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas`
--

CREATE TABLE `ofertas` (
  `id_oferta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `descuento` float NOT NULL,
  `precio_oferta` float NOT NULL,
  `baja_oferta` varchar(2) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ofertas`
--

INSERT INTO `ofertas` (`id_oferta`, `id_producto`, `descuento`, `precio_oferta`, `baja_oferta`) VALUES
(1, 1, 20, 374856, 'SI'),
(2, 2, 30, 49379, 'SI'),
(3, 6, 20, 345, 'SI'),
(4, 8, 20, 840, 'NO'),
(5, 7, 10, 675, 'NO'),
(6, 9, 15, 637.5, 'NO'),
(7, 10, 30, 420, 'NO'),
(8, 11, 15, 595, 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id` int(11) NOT NULL,
  `Descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id`, `Descripcion`) VALUES
(1, 'admin'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre_prod` varchar(100) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `size` int(11) NOT NULL,
  `precio_costo` float NOT NULL,
  `precio_venta` float NOT NULL,
  `stock_min` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `tiene_oferta` varchar(2) NOT NULL DEFAULT 'NO',
  `baja` varchar(2) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_prod`, `descripcion`, `size`, `precio_costo`, `precio_venta`, `stock_min`, `stock`, `imagen`, `tiene_oferta`, `baja`) VALUES
(1, 'lasjoadlk', 'jksdkuhasjd', 1, 13, 20, 5, 5, '1684953400_428e57263f0470c7653a.jpeg', 'NO', 'SI'),
(2, 'prueba edición sin cambiar imagen final?', 'probando la edición de imágenes. ', 2, 10, 15, 3, 9, '1686773597_82f4b27ae6139d30fb9e.jpeg', 'NO', 'SI'),
(3, 'test tamaños', 'probandlo los tamaños', 2, 20, 30, 4, 8, '1685930765_b9e17afc1ec24da94a7f.jpeg', 'NO', 'SI'),
(4, 'prueba de edit producto', 'primero estoy intentando sin la imagen, el tamaño lo cambie a grande y voy a poner otros numeros en costo y demas', 3, 30, 40, 6, 12, '1686370717_5712cc8c0c80ce0dcef6.jpeg', 'NO', 'SI'),
(5, 'Abrigo Gris', 'Abrigo con capucha de color gris oscuro y celeste tamaño grande.', 3, 700, 800, 3, 10, '1686719337_e23fd02aaa139838ba94.jpeg', 'NO', 'NO'),
(6, 'Abrigo Beige', 'Abrigo con botones simple de color beige tamaño pequeño.', 1, 600, 700, 2, 8, '1686719386_e732b125942ce8e030b1.jpeg', 'NO', 'NO'),
(7, 'Abrigo Rosa', 'Abrigo con capucha de color rosado y a rayas tamaño medio.', 2, 600, 750, 4, 4, '1686719443_2344e69364c23598596b.jpeg', 'NO', 'NO'),
(8, 'Combo Especial', 'Abrigo con capucha de color gris y turquesa tamaño medio más body celeste a rayas.', 2, 800, 1050, 2, 4, '1686719573_5956b706ef83e1ade9b4.jpeg', 'NO', 'NO'),
(9, 'Abrigo Gris', 'Abrigo con capucha de color gris oscuro y celeste tamaño medio.', 2, 650, 750, 3, 7, '1686719664_37cf235ee198bcf97476.jpeg', 'NO', 'NO'),
(10, 'Abrigo Fucsia', 'Abrigo con capucha de color fucsia y rosado a rayas tamaño medio.', 2, 500, 600, 3, 4, '1686719732_d50d90e6591ae8869847.jpeg', 'NO', 'NO'),
(11, 'Abrigo Rojo', 'Abrigo de color rojo y detalles en gris oscuro tamaño pequeño.', 1, 600, 700, 2, 5, '1686791731_df8172630c8ab3041950.png', 'NO', 'NO'),
(12, 'Abrigo Rosa y Gris', 'Abrigo con capucha de color rosado y gris tamaño medio.', 2, 700, 800, 3, 4, '1686791841_a100c8e9cd98b93a3b14.png', 'NO', 'NO'),
(13, 'Abrigo Rosa y Blanco', 'Abrigo con capucha de color rosado y blanco con estampados tamaño grande.', 3, 800, 900, 4, 6, '1686791949_a7effb579c8888693118.png', 'NO', 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `size`
--

CREATE TABLE `size` (
  `id_tamaño` int(11) NOT NULL,
  `size` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `size`
--

INSERT INTO `size` (`id_tamaño`, `size`) VALUES
(1, 'Pequeño'),
(2, 'Mediano'),
(3, 'Grande');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `perfil_id` int(11) NOT NULL DEFAULT 2,
  `baja` varchar(2) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `email`, `usuario`, `pass`, `perfil_id`, `baja`) VALUES
(9, 'admin', 'admin', 'admin@admin.com', 'admin', '$2y$10$fUFVFb6qLizZnzkXPssYgeo9NLK7hPMfIfCYxfL0OEl0uCGrA.452', 1, 'NO'),
(10, 'Matias', 'Grondona', 'grondonamatias@gmail.com', 'Matias', '$2y$10$cASspi8oQ4UKL3R/H52NPeu/i82DmTUKyKcv037Lndm808R1JsmIu', 2, 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_cabecera`
--

CREATE TABLE `ventas_cabecera` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `usuario_id` int(11) NOT NULL,
  `total_venta` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas_cabecera`
--

INSERT INTO `ventas_cabecera` (`id`, `fecha`, `usuario_id`, `total_venta`) VALUES
(31, '2023-06-14 01:51:03', 9, 40.00),
(32, '2023-06-14 01:52:07', 9, 40.00),
(33, '2023-06-14 01:54:44', 9, 55.00),
(34, '2023-06-14 01:55:36', 9, 15.00),
(35, '2023-06-14 03:28:24', 10, 1450.00),
(36, '2023-06-14 03:33:23', 10, 1450.00),
(37, '2023-06-14 03:43:58', 10, 1450.00),
(38, '2023-06-14 15:28:55', 10, 3965.00),
(39, '2023-06-14 15:30:17', 10, 3200.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_detalle`
--

CREATE TABLE `ventas_detalle` (
  `id` int(11) NOT NULL,
  `venta_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas_detalle`
--

INSERT INTO `ventas_detalle` (`id`, `venta_id`, `producto_id`, `cantidad`, `precio`) VALUES
(29, 31, 1, 2, 20.00),
(30, 32, 1, 2, 20.00),
(31, 33, 1, 2, 20.00),
(32, 33, 2, 1, 15.00),
(33, 34, 2, 1, 15.00),
(34, 35, 6, 1, 700.00),
(35, 35, 7, 1, 750.00),
(36, 36, 6, 1, 700.00),
(37, 36, 7, 1, 750.00),
(38, 37, 6, 1, 700.00),
(39, 37, 7, 1, 750.00),
(40, 38, 10, 1, 600.00),
(41, 38, 9, 1, 750.00),
(42, 38, 8, 1, 1050.00),
(43, 38, 5, 1, 800.00),
(44, 38, 7, 1, 750.00),
(45, 38, 2, 1, 15.00),
(46, 39, 8, 1, 1050.00),
(47, 39, 10, 1, 600.00),
(48, 39, 5, 1, 800.00),
(49, 39, 7, 1, 750.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD PRIMARY KEY (`id_oferta`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `size` (`size`);

--
-- Indices de la tabla `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id_tamaño`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `perfil_id` (`perfil_id`);

--
-- Indices de la tabla `ventas_cabecera`
--
ALTER TABLE `ventas_cabecera`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_id` (`producto_id`),
  ADD KEY `venta_id` (`venta_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  MODIFY `id_oferta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `size`
--
ALTER TABLE `size`
  MODIFY `id_tamaño` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `ventas_cabecera`
--
ALTER TABLE `ventas_cabecera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD CONSTRAINT `ofertas_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`size`) REFERENCES `size` (`id_tamaño`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`id`);

--
-- Filtros para la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  ADD CONSTRAINT `ventas_detalle_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id_producto`),
  ADD CONSTRAINT `ventas_detalle_ibfk_2` FOREIGN KEY (`venta_id`) REFERENCES `ventas_cabecera` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
