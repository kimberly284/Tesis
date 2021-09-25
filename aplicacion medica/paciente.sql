-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-09-2021 a las 05:47:50
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `multimedica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `dpi` varchar(30) NOT NULL,
  `class` varchar(10) NOT NULL,
  `address` varchar(15) NOT NULL,
  `pcontact` varchar(11) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id`, `name`, `dpi`, `class`, `address`, `pcontact`, `photo`, `datetime`) VALUES
(50, 'Kimberly marroquin', '234111678909999', 'Primero', 'Sansare', '85748392', '2341112020-08-14-08-27.jpg', '2020-08-14 23:19:16');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roll` (`dpi`),
  ADD UNIQUE KEY `dpi` (`dpi`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
