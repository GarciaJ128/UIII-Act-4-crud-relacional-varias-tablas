-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2023 a las 07:01:00
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_libreria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_compra`
--

CREATE TABLE `tbl_compra` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL,
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tbl_compra`
--

INSERT INTO `tbl_compra` (`id`, `fecha`, `total`) VALUES
(6, '2023-11-16 05:34:20', 798.00),
(8, '2023-11-16 05:57:19', 299.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_libro`
--

CREATE TABLE `tbl_libro` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` int(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `id_autor` int(255) NOT NULL,
  `editorial` varchar(255) NOT NULL,
  `anio` int(4) NOT NULL,
  `genero` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tbl_libro`
--

INSERT INTO `tbl_libro` (`id`, `codigo`, `titulo`, `id_autor`, `editorial`, `anio`, `genero`, `precio`, `stock`) VALUES
(1, 1, 'Almendra', 1, 'Planeta', 2010, 'Novela', 299.00, 40),
(3, 3, 'Demian', 3, 'Planeta', 2001, 'Novela', 399.00, 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_libros_vendidos`
--

CREATE TABLE `tbl_libros_vendidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_libro` bigint(20) UNSIGNED NOT NULL,
  `cantidad` bigint(20) UNSIGNED NOT NULL,
  `id_compra` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tbl_libros_vendidos`
--

INSERT INTO `tbl_libros_vendidos` (`id`, `id_libro`, `cantidad`, `id_compra`) VALUES
(3, 3, 2, 6),
(5, 1, 1, 8);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_compra`
--
ALTER TABLE `tbl_compra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_libro`
--
ALTER TABLE `tbl_libro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_libros_vendidos`
--
ALTER TABLE `tbl_libros_vendidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_libro` (`id_libro`),
  ADD KEY `id_compra` (`id_compra`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_compra`
--
ALTER TABLE `tbl_compra`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tbl_libro`
--
ALTER TABLE `tbl_libro`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_libros_vendidos`
--
ALTER TABLE `tbl_libros_vendidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_libros_vendidos`
--
ALTER TABLE `tbl_libros_vendidos`
  ADD CONSTRAINT `tbl_libros_vendidos_ibfk_1` FOREIGN KEY (`id_libro`) REFERENCES `tbl_libro` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_libros_vendidos_ibfk_2` FOREIGN KEY (`id_compra`) REFERENCES `tbl_compra` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
