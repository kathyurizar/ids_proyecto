-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2021 a las 08:08:40
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
-- Base de datos: `dicama`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `ID_cat` int(11) NOT NULL,
  `nom_cat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`ID_cat`, `nom_cat`) VALUES
(12, 'aceites');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `ID_cliente` int(11) NOT NULL,
  `nit` varchar(100) NOT NULL,
  `nom_o_raz` varchar(255) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono1` varchar(100) NOT NULL,
  `telefono2` varchar(100) NOT NULL,
  `correo_inst` varchar(100) NOT NULL,
  `nowhat` varchar(100) NOT NULL,
  `nombre_contacto` varchar(100) NOT NULL,
  `telec1` varchar(100) NOT NULL,
  `telec2` varchar(100) NOT NULL,
  `correo_con` varchar(100) NOT NULL,
  `departamento` varchar(100) NOT NULL,
  `municipio` varchar(100) NOT NULL,
  `referencias` varchar(100) NOT NULL,
  `ID_tipo` int(11) NOT NULL,
  `ID_us` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes_no_registrados`
--

CREATE TABLE `clientes_no_registrados` (
  `cod_dicaman` varchar(100) NOT NULL,
  `cod_prod` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dt_clientes`
--

CREATE TABLE `dt_clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contra` varchar(100) NOT NULL,
  `imagen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dt_clientes`
--

INSERT INTO `dt_clientes` (`id`, `nombre`, `apellido`, `usuario`, `contra`, `imagen`) VALUES
(1, 'kathy', 'urizar', 'kamrin', 'mibebe', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `ID_fact` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `ID_us` int(11) NOT NULL,
  `cod_prod` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `cod_prod` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `existencias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`cod_prod`, `descripcion`, `existencias`) VALUES
(123, 'acietes asii', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `cod_prod` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `img` varchar(255) NOT NULL,
  `Serie` varchar(100) NOT NULL,
  `precio_gen` int(8) NOT NULL,
  `precio_may` int(8) NOT NULL,
  `ID_sub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`cod_prod`, `nombre`, `img`, `Serie`, `precio_gen`, `precio_may`, `ID_sub`) VALUES
(123, 'cebolla', 'cebolla.jpg', 'ergty5432', 125, 120, 123),
(345, 'atol', 'cebolla.jpg', '345', 34, 30, 123);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referencias_personales`
--

CREATE TABLE `referencias_personales` (
  `tel1` varchar(100) NOT NULL,
  `tel2` varchar(100) NOT NULL,
  `nombre1` varchar(100) NOT NULL,
  `nombre2` varchar(100) NOT NULL,
  `ID_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_mayo`
--

CREATE TABLE `solicitud_mayo` (
  `ID_sol` int(11) NOT NULL,
  `img_rtu` varchar(255) NOT NULL,
  `img_pat` varchar(255) NOT NULL,
  `img_dpi` varchar(255) NOT NULL,
  `img_dpi_de` varchar(255) NOT NULL,
  `img_recibo` varchar(255) NOT NULL,
  `img_fachada` varchar(255) NOT NULL,
  `tel1` varchar(50) NOT NULL,
  `tel2` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `estado` bit(1) NOT NULL,
  `ID_us` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias`
--

CREATE TABLE `subcategorias` (
  `ID_subcat` int(11) NOT NULL,
  `nombre_sub` varchar(50) NOT NULL,
  `ID_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `subcategorias`
--

INSERT INTO `subcategorias` (`ID_subcat`, `nombre_sub`, `ID_cat`) VALUES
(123, 'acietes de caja', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjeta`
--

CREATE TABLE `tarjeta` (
  `ID_tarjeta` int(11) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `contra` varchar(100) NOT NULL,
  `ID_us` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `ID_tipo` int(11) NOT NULL,
  `nom_tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_us` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `rol` varchar(100) NOT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_us`, `nombre`, `correo`, `clave`, `rol`, `usuario`, `estado`) VALUES
(1, 'kathy', 'kathygu6437@gmail.com', 'ec6a6536ca304edf844d1d248a4f08dc', '1', 'admin', 'A'),
(4, 'kathya', 'nenas@gmail.es', 'ec6a6536ca304edf844d1d248a4f08dc', '1', 'katynka', 'A'),
(6, 'katmin', 'pasajero@gmail.com', 'ec6a6536ca304edf844d1d248a4f08dc', '2', 'alea', 'A'),
(7, 'nena', 'miangel@gmail.xom', 'ec6a6536ca304edf844d1d248a4f08dc', '1', '', 'A'),
(8, 'kathyta', 'nena@gmail.com', 'ec6a6536ca304edf844d1d248a4f08dc', '1', '', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_no_reg`
--

CREATE TABLE `usuarios_no_reg` (
  `ID_usno` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellido` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID_cat`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ID_cliente`),
  ADD KEY `ID_tipo` (`ID_tipo`),
  ADD KEY `ID_us` (`ID_us`);

--
-- Indices de la tabla `clientes_no_registrados`
--
ALTER TABLE `clientes_no_registrados`
  ADD PRIMARY KEY (`cod_dicaman`),
  ADD KEY `cod_prod` (`cod_prod`);

--
-- Indices de la tabla `dt_clientes`
--
ALTER TABLE `dt_clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`ID_fact`),
  ADD KEY `ID_us` (`ID_us`),
  ADD KEY `cod_prod` (`cod_prod`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD KEY `cod_prod` (`cod_prod`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`cod_prod`),
  ADD KEY `ID_sub` (`ID_sub`);

--
-- Indices de la tabla `referencias_personales`
--
ALTER TABLE `referencias_personales`
  ADD KEY `ID_cliente` (`ID_cliente`);

--
-- Indices de la tabla `solicitud_mayo`
--
ALTER TABLE `solicitud_mayo`
  ADD PRIMARY KEY (`ID_sol`),
  ADD KEY `ID_us` (`ID_us`);

--
-- Indices de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD PRIMARY KEY (`ID_subcat`),
  ADD KEY `ID_cat` (`ID_cat`);

--
-- Indices de la tabla `tarjeta`
--
ALTER TABLE `tarjeta`
  ADD PRIMARY KEY (`ID_tarjeta`),
  ADD KEY `contra` (`contra`),
  ADD KEY `contra_2` (`contra`),
  ADD KEY `ID_us` (`ID_us`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`ID_tipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_us`);

--
-- Indices de la tabla `usuarios_no_reg`
--
ALTER TABLE `usuarios_no_reg`
  ADD PRIMARY KEY (`ID_usno`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `ID_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dt_clientes`
--
ALTER TABLE `dt_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `ID_fact` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `solicitud_mayo`
--
ALTER TABLE `solicitud_mayo`
  MODIFY `ID_sol` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  MODIFY `ID_subcat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT de la tabla `tarjeta`
--
ALTER TABLE `tarjeta`
  MODIFY `ID_tarjeta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `ID_tipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_us` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios_no_reg`
--
ALTER TABLE `usuarios_no_reg`
  MODIFY `ID_usno` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`ID_tipo`) REFERENCES `tipo` (`ID_tipo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cliente_ibfk_2` FOREIGN KEY (`ID_us`) REFERENCES `usuarios` (`ID_us`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `clientes_no_registrados`
--
ALTER TABLE `clientes_no_registrados`
  ADD CONSTRAINT `clientes_no_registrados_ibfk_1` FOREIGN KEY (`cod_prod`) REFERENCES `producto` (`cod_prod`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`ID_us`) REFERENCES `usuarios` (`ID_us`) ON DELETE CASCADE,
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`cod_prod`) REFERENCES `producto` (`cod_prod`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`cod_prod`) REFERENCES `producto` (`cod_prod`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`ID_sub`) REFERENCES `subcategorias` (`ID_subcat`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `referencias_personales`
--
ALTER TABLE `referencias_personales`
  ADD CONSTRAINT `referencias_personales_ibfk_1` FOREIGN KEY (`ID_cliente`) REFERENCES `cliente` (`ID_cliente`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicitud_mayo`
--
ALTER TABLE `solicitud_mayo`
  ADD CONSTRAINT `solicitud_mayo_ibfk_1` FOREIGN KEY (`ID_us`) REFERENCES `usuarios` (`ID_us`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD CONSTRAINT `subcategorias_ibfk_1` FOREIGN KEY (`ID_cat`) REFERENCES `categoria` (`ID_cat`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tarjeta`
--
ALTER TABLE `tarjeta`
  ADD CONSTRAINT `tarjeta_ibfk_1` FOREIGN KEY (`ID_us`) REFERENCES `usuarios` (`ID_us`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
