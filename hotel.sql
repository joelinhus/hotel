-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-01-2020 a las 23:09:43
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hotel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `idCargo` int(3) NOT NULL,
  `superior` int(3) NOT NULL,
  `nombreCargo` varchar(25) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`idCargo`, `superior`, `nombreCargo`) VALUES
(1, 1, 'Director'),
(2, 1, 'Vice-Director'),
(3, 1, 'Secretario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(3) NOT NULL,
  `nombre` varchar(35) COLLATE utf8_bin NOT NULL,
  `apellido` varchar(35) COLLATE utf8_bin NOT NULL,
  `email` varchar(40) COLLATE utf8_bin NOT NULL,
  `dni` int(8) NOT NULL,
  `contrasena` varchar(25) COLLATE utf8_bin NOT NULL,
  `pais` varchar(4) COLLATE utf8_bin NOT NULL,
  `direccion` varchar(35) COLLATE utf8_bin NOT NULL,
  `telefono` varchar(25) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idCliente`, `nombre`, `apellido`, `email`, `dni`, `contrasena`, `pais`, `direccion`, `telefono`) VALUES
(1, 'noel hernan', 'jeckeln', 'noel@gmail.com', 18554091, '1234', 'ARG', 'don bosco 545', '155407111');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE `habitaciones` (
  `idHabitacion` int(3) NOT NULL,
  `idTipoHabitacion` varchar(25) COLLATE utf8_bin NOT NULL,
  `nroHabitacion` int(2) NOT NULL,
  `piso` int(2) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_bin NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `habitaciones`
--

INSERT INTO `habitaciones` (`idHabitacion`, `idTipoHabitacion`, `nroHabitacion`, `piso`, `descripcion`, `status`) VALUES
(3, '1', 1, 1, '1', 0),
(4, '2', 2, 1, '2', 0),
(5, '3', 3, 1, '3', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `idPais` int(11) NOT NULL,
  `nombre` varchar(25) COLLATE utf8_bin NOT NULL,
  `abrev` varchar(4) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`idPais`, `nombre`, `abrev`) VALUES
(2, 'Argentina', 'ARG'),
(3, 'Chile', 'CHL'),
(4, 'Uruguay', 'URY'),
(5, 'Paraguay', 'PGY'),
(6, 'Brasil', 'BRA'),
(7, 'Bolivia', 'BOL'),
(8, 'Peru', 'PER'),
(9, 'Ecuador', 'ECU'),
(10, 'Colombia', 'COL'),
(11, 'Venezuela', 'VNZ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposhabitacion`
--

CREATE TABLE `tiposhabitacion` (
  `idTipo` int(3) NOT NULL,
  `tipo` varchar(25) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tiposhabitacion`
--

INSERT INTO `tiposhabitacion` (`idTipo`, `tipo`) VALUES
(1, 'individual'),
(2, 'doble'),
(3, 'familiar'),
(4, 'matrimonial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(3) NOT NULL,
  `nombre` varchar(35) COLLATE utf8_bin NOT NULL,
  `apellido` varchar(35) COLLATE utf8_bin NOT NULL,
  `usuario` varchar(35) COLLATE utf8_bin NOT NULL,
  `contrasena` varchar(25) COLLATE utf8_bin NOT NULL,
  `idCargo` int(3) NOT NULL,
  `dni` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `apellido`, `usuario`, `contrasena`, `idCargo`, `dni`) VALUES
(2, 'joel', 'jeckeln', 'joelinhus', '852951', 1, 43338753);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`idCargo`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD PRIMARY KEY (`idHabitacion`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`idPais`);

--
-- Indices de la tabla `tiposhabitacion`
--
ALTER TABLE `tiposhabitacion`
  ADD PRIMARY KEY (`idTipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `idCargo` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  MODIFY `idHabitacion` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `idPais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tiposhabitacion`
--
ALTER TABLE `tiposhabitacion`
  MODIFY `idTipo` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
