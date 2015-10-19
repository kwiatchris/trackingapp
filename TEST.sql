-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-10-2015 a las 18:36:05
-- Versión del servidor: 5.5.44
-- Versión de PHP: 5.6.13-1+deb.sury.org~precise+3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `TEST`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `confirm`
--

CREATE TABLE IF NOT EXISTS `confirm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(128) NOT NULL DEFAULT '',
  `key` varchar(128) NOT NULL DEFAULT '',
  `email` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Volcado de datos para la tabla `confirm`
--

INSERT INTO `confirm` (`id`, `userid`, `key`, `email`) VALUES
(27, '39', 'caab5d320f463fb190a14dd62caad1d8', 'sss@gmail.com'),
(28, '40', '2972a8f95132e9c5e2f5a7d8e541c53c', 'kwiat@kwiat.kwiat'),
(29, '41', '010e70c40cfcd6b89c008d90f3280abd', 'susana@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tracking`
--

CREATE TABLE IF NOT EXISTS `tracking` (
  `id_tracking` int(20) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(20) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id_tracking`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `tracking`
--

INSERT INTO `tracking` (`id_tracking`, `id_usuario`, `latitude`, `longitude`, `fecha`) VALUES
(21, 2, 43.3238, -1.98511, '2015-10-19 15:47:52'),
(22, 2, 43.3175, -1.98217, '2015-10-19 15:48:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL DEFAULT '',
  `nombre` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(128) NOT NULL DEFAULT '',
  `email` varchar(250) NOT NULL DEFAULT '',
  `active` binary(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `login`, `nombre`, `password`, `email`, `active`) VALUES
(30, 'chris', 'igor', '6b34fe24ac2ff8103f6fce1f0da2ef57', 'sbueres@hotmail.com', '\0'),
(41, 'susana', 'susana', 'e10adc3949ba59abbe56e057f20f883e', 'susana@gmail.com', '\0'),
(37, 'frank', 'frank', 'dd97813dd40be87559aaefed642c3fbb', 'frank@gmail.com', '\0'),
(38, 'ss', 'ss', '3691308f2a4c2f6983f2880d32e29c84', 'sss@gmail.com', '\0'),
(39, 'aaaaaaa', 'aaaaaaaaa', '5d793fc5b00a2348c3fb9ab59e5ca98a', 'sss@gmail.com', '\0'),
(40, 'kwiat', 'kwiat', '03ead42a968e6f344dceabd5a8923dd2', 'kwiat@kwiat.kwiat', '\0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
