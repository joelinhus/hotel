-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-02-2020 a las 08:42:37
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
  `contrasena` varchar(80) COLLATE utf8_bin NOT NULL,
  `pais` varchar(4) COLLATE utf8_bin NOT NULL,
  `direccion` varchar(35) COLLATE utf8_bin NOT NULL,
  `telefono` varchar(25) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idCliente`, `nombre`, `apellido`, `email`, `dni`, `contrasena`, `pais`, `direccion`, `telefono`) VALUES
(1, 'Gabriel Alejandro', 'Saldivia Ruiz', 'gabriel_sv@gmail.com', 18554091, '883a32c835781e3f3040bff10fe59481', 'ARG', 'Don Bosco 545', '155407111'),
(2, 'Luciana', 'Saldivia', 'luchi_sv@hotmail.com', 18546982, 'ce1ee2b4efda2bc4c768ee1fdc542f41', 'ARG', 'Don Bosco 545', '154278651'),
(3, 'Bastian Leon', 'Della Torre Jeckeln', 'bstnln@gmail.com', 56554213, 'c0cbf62a74473b08230c98799910182e', 'ARG', 'Don Bosco 545', '155879653');

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
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `habitaciones`
--

INSERT INTO `habitaciones` (`idHabitacion`, `idTipoHabitacion`, `nroHabitacion`, `piso`, `descripcion`, `status`) VALUES
(3, '1', 1, 1, '1', 0),
(4, '2', 2, 1, '2', 0),
(5, '4', 3, 1, '3', 0),
(6, '2', 4, 1, '4', 0),
(15, '1', 5, 1, '5', 0),
(16, '3', 6, 2, '6', 0),
(17, '3', 7, 2, '7', 0),
(18, '3', 8, 2, '8', 0),
(19, '5', 9, 3, '9', 0),
(21, '2', 10, 3, '10', 0),
(22, '2', 11, 3, '11', 0);

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
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `idReserva` int(3) NOT NULL,
  `idCliente` int(3) NOT NULL,
  `idHabitacion` int(3) NOT NULL,
  `cantPersonas` int(1) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`idReserva`, `idCliente`, `idHabitacion`, `cantPersonas`, `checkin`, `checkout`) VALUES
(9, 1, 3, 1, '2020-01-01', '2020-01-16'),
(10, 2, 4, 2, '2020-01-31', '2020-02-14');

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
(1, 'Individual'),
(2, 'Doble'),
(3, 'Familiar'),
(4, 'Matrimonial'),
(5, 'Suite');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(3) NOT NULL,
  `nombre` varchar(35) COLLATE utf8_bin NOT NULL,
  `apellido` varchar(35) COLLATE utf8_bin NOT NULL,
  `usuario` varchar(35) COLLATE utf8_bin NOT NULL,
  `contrasena` varchar(100) COLLATE utf8_bin NOT NULL,
  `idCargo` int(3) NOT NULL,
  `dni` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `apellido`, `usuario`, `contrasena`, `idCargo`, `dni`) VALUES
(2, 'Joel', 'Jeckeln', 'joelinhus', '1f0c2df1343fddd49865898af6e25f0f', 1, 43338753),
(3, 'Rocio Noel', 'Jeckeln', 'rocionj', 'f83b5ccf675c2570cf7ff7ee326f598a', 2, 35786521),
(4, 'Rose Marie', 'Saldivia Ruiz', 'rosma', 'febc4230e9aac8e7fb804f577f8f1524', 3, 18554091);

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
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`idReserva`);

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
  MODIFY `idCliente` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  MODIFY `idHabitacion` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `idPais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `idReserva` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tiposhabitacion`
--
ALTER TABLE `tiposhabitacion`
  MODIFY `idTipo` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
