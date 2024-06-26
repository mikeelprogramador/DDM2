-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-06-2024 a las 17:28:45
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_ddm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_categorias`
--

CREATE TABLE `tb_categorias` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_categorias`
--

INSERT INTO `tb_categorias` (`id_categoria`, `categoria`) VALUES
(1, 'frutas'),
(2, 'ropa'),
(3, 'camisa'),
(4, 'hogar'),
(5, 'electrodomesticos'),
(6, 'blusas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_categoriasproducto`
--

CREATE TABLE `tb_categoriasproducto` (
  `id_p_c` int(11) NOT NULL,
  `id_producto` varchar(10) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_categoriasproducto`
--

INSERT INTO `tb_categoriasproducto` (`id_p_c`, `id_producto`, `id_categoria`) VALUES
(10, '112', 4),
(11, '112', 5),
(12, '12a14', 2),
(13, '12a14', 3),
(14, '12a14', 4),
(15, '12a14', 6),
(16, '12a54', 2),
(17, '12a54', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_cate_user`
--

CREATE TABLE `tb_cate_user` (
  `id_cate_user` int(11) NOT NULL,
  `categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_cate_user`
--

INSERT INTO `tb_cate_user` (`id_cate_user`, `categoria`) VALUES
(0, 'superadmin'),
(1, 'admin'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_comentarios`
--

CREATE TABLE `tb_comentarios` (
  `id_comentario` int(11) NOT NULL,
  `comentario` varchar(600) NOT NULL,
  `fechaComentario` varchar(20) NOT NULL,
  `id_producto` varchar(10) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_comentarios`
--

INSERT INTO `tb_comentarios` (`id_comentario`, `comentario`, `fechaComentario`, `id_producto`, `id_usuario`) VALUES
(1, 'soy un admin y yo comento ', '2024-06-19 11:51:39', 'fk3', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_productos`
--

CREATE TABLE `tb_productos` (
  `id_producto` varchar(10) NOT NULL,
  `producto_nombre` varchar(80) DEFAULT NULL,
  `descripcion_producto` varchar(160) DEFAULT NULL,
  `caracteristicas_producto` varchar(500) DEFAULT NULL,
  `cantidades` int(11) DEFAULT NULL,
  `id_ofertas` int(11) DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL,
  `precio` varchar(200) DEFAULT NULL,
  `color` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_productos`
--

INSERT INTO `tb_productos` (`id_producto`, `producto_nombre`, `descripcion_producto`, `caracteristicas_producto`, `cantidades`, `id_ofertas`, `img`, `precio`, `color`) VALUES
('112', 'cepillo de dientes', 'cepillo de dientes de oral-B', 'Cepillo electrico', 10, 0, '../../fotos/images.jfif', '50.000,00', 'negro'),
('12a14', 'gorrita', 'es muy bonita', 'Tela muy fina, mas fina que la fina la margarita la preferida', 50, 0, '../../fotos/gorra.jpg', '25.000,00', 'amarillo'),
('12a54', 'camisa liqui liqui', 'CAMISA GUAYABERA BORDADA MANGA LARGA CUELLO NERU\r\n\r\n------IMPORTANTE------\r\n\r\n*Antes de realizar la compra, te invitamos a revisar el cuadro de medidas que se e', 'CAMISA GUAYABERA BORDADA MANGA LARGA CUELLO NERU\r\n\r\n------IMPORTANTE------\r\n\r\n*Antes de realizar la compra, te invitamos a revisar el cuadro de medidas que se encuentra al final de las fotos para que la compares con una camisa de uso diario y sepas cual talla es la indicada.\r\n\r\n*El color Blanco: Es un blanco óptico (no es blanco tono leche/opaco).\r\n\r\nCREACIONES OSVITH te da la bienvenida a nuestra pagina de ventas online.\r\n\r\nNuestras prendas son hechas por manos Colombianas, cada vez que adquier', 0, 0, '../../fotos/fb0804ef483115f8387b304fd15a27fc.jpg', '70.000,00', 'crema blanco'),
('adadwd', '122', '', '', 0, 0, '../../fotos/descarga.jfif', '0', ''),
('fk3', 'pito ', 'Es un pito de ultima tecnologia', 'hace mucha música y es muy hermoso ', 10, 0, '../../fotos/descarga.jfif', '1.500,00', 'negro'),
('PK4', 'cepillo de ropa', 'Cepillo para lavar la ropa', 'Es practico y cuida muy bien la mano', 50, 0, '../../fotos/images (1).jfif', '2.500,00', 'verde');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `email` varchar(260) NOT NULL,
  `pasword` varchar(100) NOT NULL,
  `fecha_registro` varchar(50) NOT NULL,
  `id_cate_user` int(11) DEFAULT NULL,
  `status_user` varchar(10) DEFAULT NULL,
  `foto_user` varchar(1000) DEFAULT 'null'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id`, `nombre`, `apellido`, `email`, `pasword`, `fecha_registro`, `id_cate_user`, `status_user`, `foto_user`) VALUES
(1, 'mike', 'sanchez', 'mike', '$2y$10$ft42yWuI8r6VqUuwUPyrQOENYdA0dfrPGuuz6p5h3xHbqWPgEdce2', '2024-06-17 10:02:42', 0, 'Activo', '../../img_user/images (1).jfif'),
(2, 'juan ', 'ramos', 'juan', '$2y$10$xAZK8g9T40.wkETuqYoH5eIl43NL4EZpQsCnmSn98tNF/2o54457O', '2024-06-17 10:03:05', 1, 'Inactivo', '../../img/logo-icon-person.jpg'),
(3, 'pepito', 'sanchez', 'pepito', '$2y$10$6haqpePruHDBf6PI4myMs.yf3v.C1pYytnvzg.XpYCtEPSqVGKMjC', '2024-06-19 21:42:30', 2, 'Inactivo', '../../img_user/descarga.jfif'),
(4, 'pablo', 'pablito', 'pablito', '$2y$12$9FCZrfGgJ6jP2MfjkxM7ZOknqszr0eNt03A1csosY62o3BzUWmS2C', '2024-06-26 07:14:52', 2, 'Inactivo', '../../img/logo-icon-person.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_valoracion`
--

CREATE TABLE `tb_valoracion` (
  `id_valoracion` int(11) NOT NULL,
  `valoracion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_valoracion`
--

INSERT INTO `tb_valoracion` (`id_valoracion`, `valoracion`) VALUES
(0, 'add'),
(1, 'like'),
(2, 'not like');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_categorias`
--
ALTER TABLE `tb_categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `tb_categoriasproducto`
--
ALTER TABLE `tb_categoriasproducto`
  ADD PRIMARY KEY (`id_p_c`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `tb_cate_user`
--
ALTER TABLE `tb_cate_user`
  ADD PRIMARY KEY (`id_cate_user`);

--
-- Indices de la tabla `tb_comentarios`
--
ALTER TABLE `tb_comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `tb_productos`
--
ALTER TABLE `tb_productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cate_user` (`id_cate_user`);

--
-- Indices de la tabla `tb_valoracion`
--
ALTER TABLE `tb_valoracion`
  ADD PRIMARY KEY (`id_valoracion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_categorias`
--
ALTER TABLE `tb_categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tb_categoriasproducto`
--
ALTER TABLE `tb_categoriasproducto`
  MODIFY `id_p_c` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `tb_comentarios`
--
ALTER TABLE `tb_comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_categoriasproducto`
--
ALTER TABLE `tb_categoriasproducto`
  ADD CONSTRAINT `tb_categoriasproducto_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `tb_productos` (`id_producto`),
  ADD CONSTRAINT `tb_categoriasproducto_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `tb_categorias` (`id_categoria`);

--
-- Filtros para la tabla `tb_comentarios`
--
ALTER TABLE `tb_comentarios`
  ADD CONSTRAINT `tb_comentarios_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `tb_productos` (`id_producto`),
  ADD CONSTRAINT `tb_comentarios_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuarios` (`id`);

--
-- Filtros para la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD CONSTRAINT `tb_usuarios_ibfk_1` FOREIGN KEY (`id_cate_user`) REFERENCES `tb_cate_user` (`id_cate_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
