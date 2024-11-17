-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2024 a las 20:40:11
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
-- Base de datos: `marcas_botines`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `botines`
--

CREATE TABLE `botines` (
  `id_botin` int(11) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `talle` double NOT NULL,
  `gama` varchar(30) NOT NULL,
  `precio` float NOT NULL,
  `id_marca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `botines`
--

INSERT INTO `botines` (`id_botin`, `modelo`, `color`, `talle`, `gama`, `precio`, `id_marca`) VALUES
(1, 'tempo', 'negro', 42, 'alta', 120000, 1),
(2, 'tempo', 'blanco', 44, 'media', 110000, 2),
(4, 'Tiempo Legend', 'crema', 47, 'media', 160000, 2),
(5, 'Tiempo Legend', 'crema', 47, 'media', 160000, 2),
(6, 'Tiempo Legend', 'crema', 47, 'media', 160000, 2),
(7, 'Tiempo Legend', 'crema', 47, 'media', 160000, 2),
(8, 'Tiempo Legend', 'crema', 47, 'media', 160000, 2),
(9, 'Tiempo Legend', 'crema', 47, 'media', 160000, 2),
(10, 'Tiempo Legend', 'crema', 47, 'media', 160000, 2),
(11, 'Tiempo Legend', 'crema', 47, 'media', 160000, 2),
(12, 'Tiempo Legend', 'crema', 47, 'media', 160000, 2),
(13, 'Tiempo Legend', 'crema', 47, 'media', 160000, 2),
(14, 'Tiempo Legend', 'crema', 47, 'media', 160000, 2),
(15, 'Tiempo Legend', 'crema', 47, 'media', 160000, 2),
(16, 'Tiempo Legend', 'crema', 47, 'media', 160000, 2),
(17, 'Tiempo Legend', 'crema', 47, 'media', 160000, 2),
(18, 'Tiempo Legend', 'crema', 47, 'media', 160000, 2),
(19, 'Phantom GT', 'negro', 42, 'alta', 250000, 1),
(20, 'Tiempo Premier', 'rojo', 44, 'baja', 120000, 20),
(21, 'Mercurial Vapor', 'azul', 45, 'alta', 350000, 21),
(22, 'Classic Tiempo', 'blanco', 43, 'media', 180000, 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `sede` varchar(50) NOT NULL,
  `foto` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `nombre`, `sede`, `foto`) VALUES
(1, 'Puma', 'Lama', 'https://tse2.mm.bing.net/th?id=OIP.0z2kSI_ehJizOeLLUL77dQHaEK&pid=Api&P=0&h=180'),
(2, 'Nike', 'Argentina', 'https://tse3.mm.bing.net/th?id=OIP.ZnOtPr085U5DoYcm35ogrQHaFj&pid=Api&P=0&h=180'),
(20, 'Reebok', 'Chile', 'https://tse2.mm.bing.net/th?id=OIP.PBH2xzzwlHBfX-t6TpZRZgHaHC&pid=Api&P=0&h=180'),
(21, 'umbro', 'arg', 'https://tse4.mm.bing.net/th?id=OIP.6F5ct7NgaEBFlIyBLCuBbwHaEz&pid=Api&P=0&h=180'),
(26, 'Topper', 'Portugal 1038', 'https://up.yimg.com/ib/th?id=OIP.ONFJ7hdree-ChcP5uYxkoQHaFj&pid=Api&rs=1&c=1&qlt=95&w=124&h=93');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `contraseña` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `contraseña`) VALUES
(1, 'webadmin', '$2a$12$XGQ84TQbuo7Y5UrFLF92SuVohzeZodL1r0MSYc4rB6g7SMZlFKvyC');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `botines`
--
ALTER TABLE `botines`
  ADD PRIMARY KEY (`id_botin`),
  ADD KEY `fk_id_marca` (`id_marca`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `botines`
--
ALTER TABLE `botines`
  MODIFY `id_botin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `botines`
--
ALTER TABLE `botines`
  ADD CONSTRAINT `botines_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id_marca`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
