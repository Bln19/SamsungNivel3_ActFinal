-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2023 a las 18:49:43
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `act_final`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `primer_apellido` varchar(30) NOT NULL,
  `segundo_apellido` varchar(30) NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `email`, `primer_apellido`, `segundo_apellido`, `login`, `password`) VALUES
(1, 'belen', 'tejera.belen@gmail.c', '', '', '', ''),
(2, 'asdfafdsfd', 'asdfadsfasfd', '', '', '', ''),
(3, 'nombre1', 'pass1', '', '', '', ''),
(4, 'nombre1', 'asdf2@asd.com', 'apellido2', 'segundo2', 'login2', ''),
(5, 'asdfsadfdf', 'asdfasdf@asdf.com', 'asfdasdf', 'asdfasdfa', 'asdfasdfasdf', 'asdfdffd'),
(6, 'asfdsadf', 'asdf@asd.com', 'adsfsdf', 'asdfadf', 'asdfsfasdfasfdasfasfasdfadsf', 'asdfsdfs'),
(7, 'asdfasdf', 'asdf@asd.com', 'asdfasdf', 'adsfasdfasdf', 'adsfasdf', 'adsfasdf'),
(8, 'asdfasdf', 'asdf@asd.com', 'asdfasdf', 'asdfadf', 'adsfasdfasdf', 'asdasdfs'),
(9, 'adfasdasdfadfa', 'asdf@asd.com', 'asdfasdfasfd', 'asdfasdfasdf', 'adsfsdfasfds', 'adsasfas'),
(10, 'asdfasdfsadfsadf', 'asdf@asd.com', 'adsfasdfsadfasf', 'adsfasdfsadfasfasdfasdfasdfasf', 'adsfasdfasf', 'adsfasdf'),
(11, 'asdfadfasdf', 'asdf@asd.com', 'asdfasdf', 'adsfasdf', 'asdfasdfasdf', 'asdfasdf'),
(12, 'asdfasdf', 'sdfasd@asdasf.com', 'asdfasdf', 'asdfadf', 'asdfasdfasdf', 'adsfadsf'),
(13, 'asdfasdf', 'asd3f@asd.com', 'asdfasdf', 'asdfadf', 'asdfasdfasdf', 'asdfasdf'),
(14, 'asdfasdf', 'asdf@as2d.com', 'asdfasdfasfd', 'asdfadf', 'asdfasdfasdf', 'asdfasdf'),
(15, 'asdfasdf', 'tejera2.belen@gmail.com', 'asdfasdf', 'asdfadf', 'asdfasdfasdf', 'adsasdfa'),
(17, 'asdfasdf', 'sdfasd33@asdasf.com', 'asdfasdf', 'adsfasdfasdf', 'asdasdfasdfadf', 'asdfasda'),
(18, 'asdfsadfasdfa', 'sdfasd322@asdasf.com', 'asdfasdfasdf', 'adsfasdfasfd', 'asfdasdfdsaf', 'adasdfas'),
(19, 'asdfasdf', 'sdfas2323d@asdasf.com', 'asdfasdf', 'adsfasdf', 'asdfasdfasdf', 'asdfasdf'),
(20, 'asdafasdfasdf', 'tejera.bele22n@gmail.com', 'adsfasdfsadfasdf', 'asdfasdfsadf', 'asdfasdfasdf', 'adsfaasd'),
(21, 'asdfadfasdf', 'sdfasd333@asdasf.com', 'asdfasdf', 'adsfasdf', 'asdfasdfasdf', 'dfasdfas'),
(22, 'asdfafda', 'sdfa22231sd@asdasf.com', 'adsfasdfa', 'adsfasfasdf', 'adsfasdf', 'asdfasdf'),
(23, 'asdfasdf', 'tejera.belen@gmail.comadsf', 'asdfasdfasfd', 'asdfadf', 'asdfasdfasdf', 'adsadsfa'),
(24, 'asdfadfasdfadsf', 'sdfassdfsdfsd@asdasf.com', 'adfasdfsadfasfd', 'asdfsadfasdffas', 'adsfasdf', 'asdfafda'),
(25, 'asdfasfasfas', 'fasfdasfdasdfasfdasfd@afsd.cl', 'aadfsadfasfd', 'asdfasdfasdfasdf', 'asdfasdfsadfsadfasdfasdf', 'sdfasfda'),
(26, 'asd', 'fsdf@hlas.es', 'dqwd', 'gsgfg', 'dasd', 'aseqw');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
