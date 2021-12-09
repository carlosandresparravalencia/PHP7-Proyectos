-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 17-11-2021 a las 04:28:25
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `logincarlos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestor`
--

DROP TABLE IF EXISTS `gestor`;
CREATE TABLE IF NOT EXISTS `gestor` (
  `id_contrasena` int(9) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(9) NOT NULL,
  `contrasena` varchar(120) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_contrasena`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `gestor`
--

INSERT INTO `gestor` (`id_contrasena`, `usuario_id`, `contrasena`, `fecha`) VALUES
(1, 1, '$2y$10$2swjOpwKmkc8/8fhbs2lq.QJjPwpqeFL1Fv3yEQFQeVKK.hkYqQfi', '2021-11-17'),
(2, 2, '$2y$10$hzYGm.BuZBAgyMKOweDeAO8MHlMo8EsUwmNLEt26NxCuc8TZz/T6m', '2021-11-17'),
(3, 3, '$2y$10$MZd3n2OVji0XHmf82yq6uevKfCWJlpa0jje2TT2zM1IPrB8lJUAgS', '2021-11-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(9) NOT NULL AUTO_INCREMENT,
  `nombre_completo` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `usuario` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `clave` varchar(120) COLLATE utf8mb4_spanish_ci NOT NULL,
  `vigencia` int(3) NOT NULL,
  `fecha_registro` date NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_completo`, `usuario`, `clave`, `vigencia`, `fecha_registro`) VALUES
(1, 'Admin', 'Admin', '$2y$10$2swjOpwKmkc8/8fhbs2lq.QJjPwpqeFL1Fv3yEQFQeVKK.hkYqQfi', 3, '2021-11-17'),
(2, 'Cliente', 'Cliente', '$2y$10$hzYGm.BuZBAgyMKOweDeAO8MHlMo8EsUwmNLEt26NxCuc8TZz/T6m', 4, '2021-11-17'),
(3, 'Usuario', 'Usuario', '$2y$10$MZd3n2OVji0XHmf82yq6uevKfCWJlpa0jje2TT2zM1IPrB8lJUAgS', 5, '2021-11-17');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
