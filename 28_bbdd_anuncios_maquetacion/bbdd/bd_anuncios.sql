-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2020 a las 19:42:35
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_anuncios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios`
--

CREATE TABLE `anuncios` (
  `id_anuncio` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `foto` varchar(100) NOT NULL DEFAULT 'default.png',
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `anuncios`
--

INSERT INTO `anuncios` (`id_anuncio`, `titulo`, `descripcion`, `precio`, `fecha`, `foto`, `id_usuario`) VALUES
(1, 'Coche Opel Corsa', 'En buen estado, tiene trote y pocos km', 2982, '2020-10-13', '1602876149745_18019.jpg', 1),
(2, 'Portatil', 'Core 2 duo, en buen estado', 120, '2020-10-05', 'default.png', 1),
(5, 'Portatil HP celeron', 'Buen estado', 120, '2020-10-13', 'default.png', 1),
(6, 'Vendo piano', 'Es bastante grande', 500, '2020-10-13', 'default.png', 2),
(11, 'Televisión 60 pulgadas', 'Buen estado', 225, '2020-10-16', '1602875941067_18555.jpg', 1),
(12, 'Vendo Tele de 30 pulgadas', 'Buen estado aunque ...', 120, '2020-10-15', '1602876433960_10825.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `email`, `password`) VALUES
(1, 'Carlos', 'carlos@admin.com', '1234'),
(2, 'Ana', 'ana@anuncios.es', '1111'),
(3, 'Pepe', 'pepe@mail.com', '1234'),
(4, 'Paco', 'paco@email.com', '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`id_anuncio`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `id_anuncio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anuncios`
--
ALTER TABLE `anuncios`
  ADD CONSTRAINT `anuncios_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
