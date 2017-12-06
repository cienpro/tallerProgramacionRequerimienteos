-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 06-12-2017 a las 01:18:36
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tallerProgramacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aeropuerto`
--

CREATE TABLE `aeropuerto` (
  `idAeropuerto` int(11) NOT NULL,
  `nombre` int(11) NOT NULL,
  `idLocalidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asiento`
--

CREATE TABLE `asiento` (
  `idAsiento` int(11) NOT NULL,
  `numero` int(3) NOT NULL,
  `clase` varchar(15) NOT NULL,
  `disponible` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avion`
--

CREATE TABLE `avion` (
  `patente` int(11) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `idMapaAvion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `idCompra` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fechaCompra` date NOT NULL,
  `totalCosto` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compraTieneServicio`
--

CREATE TABLE `compraTieneServicio` (
  `idCompra` int(11) NOT NULL,
  `idServicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Localidad`
--

CREATE TABLE `Localidad` (
  `idLocalidad` int(11) NOT NULL,
  `ciudad` varchar(20) NOT NULL,
  `pais` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Localidad`
--

INSERT INTO `Localidad` (`idLocalidad`, `ciudad`, `pais`) VALUES
(1, 'berisso', 'argentina'),
(2, 'la plata', 'argentina'),
(3, 'Madrid', 'España'),
(4, 'Ezeiza', 'Argentina'),
(7, 'New York', 'Estados Unidos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mapaAvion`
--

CREATE TABLE `mapaAvion` (
  `idMapaAvion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `idServicio` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `descripcion` text NOT NULL,
  `precio` double NOT NULL,
  `imagen` text NOT NULL,
  `idLocalidad` int(11) NOT NULL,
  `idTipoServicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`idServicio`, `nombre`, `descripcion`, `precio`, `imagen`, `idLocalidad`, `idTipoServicio`) VALUES
(1, 'Hotel Real Madrid', 'Hotel 5 estrellas', 2500, 'hotel1', 3, 1),
(2, 'Hotel Gran Argento', 'Hotel 2 estrellas', 1500, 'hotel2', 2, 1),
(3, 'Honda Fit 1.5 Hit At Cvt', 'Muy buen estado', 500, 'auto1', 2, 2),
(4, ' Lamborghini Veneno Roadster', 'Auto de lujo', 5000, 'auto2', 3, 2),
(5, 'vuelo desde Argentina hasta España', 'Salida Ezeiza-Argentina 9:00\r\nLlegada Madrid-España 15:00', 9500, 'aerolinea1', 4, 3),
(6, 'Vuelo desde Argentina hasta Estados Unidos', 'Salida desde eze-argentina 10:00\r\nLlegada New York 17:30', 10000, 'aerolinea2', 7, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoServicio`
--

CREATE TABLE `tipoServicio` (
  `idTipoServicio` int(11) NOT NULL,
  `nombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipoServicio`
--

INSERT INTO `tipoServicio` (`idTipoServicio`, `nombre`) VALUES
(1, 'Hotel'),
(2, 'Vehiculo'),
(3, 'Vuelo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoUsuario`
--

CREATE TABLE `tipoUsuario` (
  `idTIpoUsuario` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipoUsuario`
--

INSERT INTO `tipoUsuario` (`idTIpoUsuario`, `nombre`) VALUES
(1, 'persona'),
(2, 'empresa'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  `telefono` int(20) NOT NULL,
  `idTipoUsuario` int(11) NOT NULL,
  `idLocalidad` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `mail`, `password`, `telefono`, `idTipoUsuario`, `idLocalidad`) VALUES
(1, 'ivancete@gmail.com', '123456', 4621448, 1, '1'),
(2, 'frannsegarra@gmail.com', '123456', 4621446, 1, '2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aeropuerto`
--
ALTER TABLE `aeropuerto`
  ADD PRIMARY KEY (`idAeropuerto`);

--
-- Indices de la tabla `asiento`
--
ALTER TABLE `asiento`
  ADD PRIMARY KEY (`idAsiento`);

--
-- Indices de la tabla `avion`
--
ALTER TABLE `avion`
  ADD PRIMARY KEY (`patente`),
  ADD KEY `idMapaAvion` (`idMapaAvion`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`idCompra`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `compraTieneServicio`
--
ALTER TABLE `compraTieneServicio`
  ADD KEY `idCompra` (`idCompra`),
  ADD KEY `idServicio` (`idServicio`);

--
-- Indices de la tabla `Localidad`
--
ALTER TABLE `Localidad`
  ADD PRIMARY KEY (`idLocalidad`);

--
-- Indices de la tabla `mapaAvion`
--
ALTER TABLE `mapaAvion`
  ADD PRIMARY KEY (`idMapaAvion`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`idServicio`);

--
-- Indices de la tabla `tipoUsuario`
--
ALTER TABLE `tipoUsuario`
  ADD PRIMARY KEY (`idTIpoUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idTIpoUsuario` (`idTipoUsuario`),
  ADD KEY `idLocalidad` (`idLocalidad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aeropuerto`
--
ALTER TABLE `aeropuerto`
  MODIFY `idAeropuerto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asiento`
--
ALTER TABLE `asiento`
  MODIFY `idAsiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `idCompra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Localidad`
--
ALTER TABLE `Localidad`
  MODIFY `idLocalidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipoUsuario`
--
ALTER TABLE `tipoUsuario`
  MODIFY `idTIpoUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
