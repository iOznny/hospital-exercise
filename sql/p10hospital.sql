-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-12-2019 a las 02:42:59
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `p10hospital`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hospitales`
--

CREATE TABLE `hospitales` (
  `id` int(3) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Ciudad` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `hospitales`
--

INSERT INTO `hospitales` (`id`, `Nombre`, `Ciudad`, `Telefono`) VALUES
(1, 'HOSPITAL GENERAL DEL NORTE', 'Puebla', 1234567890),
(2, 'HOSPITAL NIÑO POBLANO', 'Puebla', 1234567890),
(3, 'HOSPITAL GENERAL BALBUENA', 'Mexico DF', 1234567890),
(4, 'HOSPITAL ANGELES METROPOLITANO', 'Mexico DF', 1234567890);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id_paciente` int(3) NOT NULL,
  `INE` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido_Materno` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido_Paterno` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `NHospital` int(3) NOT NULL,
  `NServicio` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id_paciente`, `INE`, `Nombre`, `Apellido_Materno`, `Apellido_Paterno`, `Fecha_Nacimiento`, `NHospital`, `NServicio`) VALUES
(1, 'CCC1234567', 'CESAR', 'CHAZARI', 'CANDIA', '1999-08-06', 4, 2),
(2, 'HBJ1234567', 'HECTOR', 'JIMINEZ', 'BANDO', '1999-04-04', 2, 3),
(3, 'AHF1234567', 'ABRAHAM ', 'FLORES', 'HERRERA', '1999-02-04', 1, 4),
(4, 'IMC1234567', 'ISARELI', 'CALDERON', 'MIRANDA', '2001-02-02', 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id_servicio` int(3) NOT NULL,
  `Nombre` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Comentario` tinytext CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id_servicio`, `Nombre`, `Comentario`) VALUES
(1, 'ORTOPEDIA', 'Sin comentario'),
(2, 'ODONTOLOGIA', 'Sin comentario'),
(3, 'UROLOGIA', 'Sin comentario'),
(4, 'PATOLOGIA', 'Sin comentario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `hospitales`
--
ALTER TABLE `hospitales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id_paciente`),
  ADD KEY `FK_ServPacientes` (`NServicio`),
  ADD KEY `FK_HospPacientes` (`NHospital`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id_servicio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `hospitales`
--
ALTER TABLE `hospitales`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id_paciente` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id_servicio` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `FK_HospPacientes` FOREIGN KEY (`NHospital`) REFERENCES `hospitales` (`id`),
  ADD CONSTRAINT `FK_ServPacientes` FOREIGN KEY (`NServicio`) REFERENCES `servicios` (`id_servicio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
