-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-09-2024 a las 19:57:07
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
-- Base de datos: `stay_in_style`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `ID_carrito` int(11) NOT NULL,
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_producto`
--

CREATE TABLE `carrito_producto` (
  `ID_carrito` int(11) NOT NULL,
  `ID_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `ID_factura` int(11) NOT NULL,
  `ID_producto` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `ID_factura` int(11) NOT NULL,
  `ID_usuario` int(11) DEFAULT NULL,
  `ID_metodo` int(11) DEFAULT NULL,
  `monto_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodo_pago`
--

CREATE TABLE `metodo_pago` (
  `ID_metodo` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ID_producto` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `talla` varchar(10) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resena`
--

CREATE TABLE `resena` (
  `ID_resena` int(11) NOT NULL,
  `comentario` text DEFAULT NULL,
  `calificacion` int(11) DEFAULT NULL,
  `ID_producto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `ID_rol` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`ID_rol`, `nombre`) VALUES
(1, 'administrador'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_usuario` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `num_cel` varchar(10) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `direccion` varchar(30) DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `ID_rol` int(11) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_usuario`, `nombre`, `num_cel`, `email`, `direccion`, `password`, `ID_rol`, `estado`) VALUES
(10, 'estif bautista', '3136291107', 'ande27e@gmail.com', 'calle109 sur', '12345678', 1, 1),
(11, 'Juan Perez', '3147798635', 'juan.perez@example.com', 'calle 81 este', '123456', 2, 1),
(12, 'luis vagales', '3145292108', 'carlos@gmail.com', 'carrera 31-86 #45', '12345678', 2, 0),
(13, 'jose antonio nariño', '3146688635', 'jose.antonio@gmail.com', 'calle 13_Av 543', '4536845654765456', 2, 0),
(14, 'Carlos Ulgver', '3177201447', 'carlos.ULG@gmail.com', 'AV 2006 #5b-15', '2312312553345', 2, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`ID_carrito`);

--
-- Indices de la tabla `carrito_producto`
--
ALTER TABLE `carrito_producto`
  ADD PRIMARY KEY (`ID_carrito`,`ID_producto`),
  ADD KEY `ID_producto` (`ID_producto`);

--
-- Indices de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD PRIMARY KEY (`ID_factura`,`ID_producto`),
  ADD KEY `ID_producto` (`ID_producto`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`ID_factura`),
  ADD KEY `ID_usuario` (`ID_usuario`),
  ADD KEY `ID_metodo` (`ID_metodo`);

--
-- Indices de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  ADD PRIMARY KEY (`ID_metodo`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ID_producto`);

--
-- Indices de la tabla `resena`
--
ALTER TABLE `resena`
  ADD PRIMARY KEY (`ID_resena`),
  ADD KEY `ID_producto` (`ID_producto`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`ID_rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_usuario`),
  ADD KEY `ID_rol` (`ID_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `ID_carrito` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `ID_factura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  MODIFY `ID_metodo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ID_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `resena`
--
ALTER TABLE `resena`
  MODIFY `ID_resena` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `ID_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito_producto`
--
ALTER TABLE `carrito_producto`
  ADD CONSTRAINT `carrito_producto_ibfk_1` FOREIGN KEY (`ID_carrito`) REFERENCES `carrito` (`ID_carrito`),
  ADD CONSTRAINT `carrito_producto_ibfk_2` FOREIGN KEY (`ID_producto`) REFERENCES `producto` (`ID_producto`);

--
-- Filtros para la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD CONSTRAINT `detalle_factura_ibfk_1` FOREIGN KEY (`ID_factura`) REFERENCES `factura` (`ID_factura`),
  ADD CONSTRAINT `detalle_factura_ibfk_2` FOREIGN KEY (`ID_producto`) REFERENCES `producto` (`ID_producto`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`ID_usuario`) REFERENCES `usuarios` (`ID_usuario`),
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`ID_metodo`) REFERENCES `metodo_pago` (`ID_metodo`);

--
-- Filtros para la tabla `resena`
--
ALTER TABLE `resena`
  ADD CONSTRAINT `resena_ibfk_1` FOREIGN KEY (`ID_producto`) REFERENCES `producto` (`ID_producto`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`ID_rol`) REFERENCES `rol` (`ID_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
