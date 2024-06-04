-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2024 a las 13:57:50
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
-- Base de datos: `stayinstyle`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodo_de_pago`
--

CREATE TABLE `metodo_de_pago` (
  `ID_metodo_de_pago` varchar(40) NOT NULL COMMENT 'código único que se le da al metodo de pago para identificarlo',
  `nombre_metodo_de_pago` int(30) NOT NULL COMMENT 'nombre del método de pago'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `ID_pedido` varchar(50) NOT NULL COMMENT 'código único que se le da al pedido para identificarlo',
  `estado-pedido` varchar(100) NOT NULL COMMENT 'descripción del estado del pedido',
  `fecha_pedido` date NOT NULL COMMENT 'fecha de creación del pedido',
  `descripción_producto` varchar(50) NOT NULL COMMENT 'descripción de las especificaciones del producto',
  `ID_producto` int(30) NOT NULL COMMENT 'codigo unico que se l da al producto para identificarlo',
  `nombre_producto` varchar(30) NOT NULL COMMENT 'nombre comercial del producto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibo_de_compra`
--

CREATE TABLE `recibo_de_compra` (
  `ID_recibo` varchar(30) NOT NULL COMMENT 'código único que se le da al recibo para identificarlo',
  `fecha_de_emisión_recibo_de_compra` varchar(30) NOT NULL COMMENT 'fecha en la que se registro el recibo de compra'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reseña`
--

CREATE TABLE `reseña` (
  `ID_reseña` varchar(100) NOT NULL COMMENT 'código único que se le da a la reseña para identificarla',
  `calificación_reseña` varchar(10) NOT NULL COMMENT 'la puntuación que el usuario registra en la reseña',
  `comentario_reseña` varchar(100) NOT NULL COMMENT 'el comentario que el usuario registra en la reseña'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_usuario` varchar(30) NOT NULL COMMENT 'código único de usuario registrado',
  `dirección_usuario` varchar(30) NOT NULL COMMENT 'dirección de recidencia o vivienda del usuario',
  `correo_usuario` varchar(30) NOT NULL COMMENT 'correo electrónico del usuario registrado',
  `nombre_usuario` varchar(30) NOT NULL COMMENT 'nombre del usuario registrado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `metodo_de_pago`
--
ALTER TABLE `metodo_de_pago`
  ADD PRIMARY KEY (`ID_metodo_de_pago`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`ID_pedido`),
  ADD UNIQUE KEY `ID_producto` (`ID_producto`);

--
-- Indices de la tabla `recibo_de_compra`
--
ALTER TABLE `recibo_de_compra`
  ADD PRIMARY KEY (`ID_recibo`);

--
-- Indices de la tabla `reseña`
--
ALTER TABLE `reseña`
  ADD PRIMARY KEY (`ID_reseña`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
