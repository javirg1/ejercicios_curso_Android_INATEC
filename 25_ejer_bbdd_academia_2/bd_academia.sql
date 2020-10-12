-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-05-2020 a las 16:28:43
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_academia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `cod_postal` int(6) NOT NULL DEFAULT 0,
  `poblacion` varchar(200) NOT NULL,
  `fecha_nac` date DEFAULT NULL,
  `importe_matricula` decimal(10,2) DEFAULT 0.00,
  `estudios` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombre`, `sexo`, `cod_postal`, `poblacion`, `fecha_nac`, `importe_matricula`, `estudios`) VALUES
(1, 'Iker', 'H', 20001, 'San Sebastián', '2001-05-12', '150.00', 'Ciclo formativo superior en desarrollo de aplicaciones web y dispositivos móviles.\r\nCursos de programación básica en lenguajes de alto nivel.\r\nVarios cursos de inglés en distintos centros de enseñanza online'),
(2, 'María', 'M', 28080, 'Madrid', '1997-03-21', '200.00', NULL),
(3, 'Ana', 'M', 28080, 'Madrid', '1999-09-11', '120.00', NULL),
(4, 'Antonio', 'H', 50001, 'Zaragoza', '1992-07-03', '0.00', 'Estudios básicos de informática');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
