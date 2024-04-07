-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 06-07-2016 a las 22:52:37
-- Versión del servidor: 5.6.13
-- Versión de PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `wc`
--
CREATE DATABASE IF NOT EXISTS `wc` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `wc`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accesos`
--

CREATE TABLE IF NOT EXISTS `accesos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idjugador` int(11) NOT NULL,
  `Nombre` varchar(35) NOT NULL,
  `Ip` varchar(75) NOT NULL,
  `Fecha` varchar(75) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=107 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actualizaciones`
--

CREATE TABLE IF NOT EXISTS `actualizaciones` (
  `id_actualizar` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` int(11) NOT NULL DEFAULT '0',
  `valor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `msg1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `msg2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `msg3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `msg4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_actualizar`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacenes`
--

CREATE TABLE IF NOT EXISTS `almacenes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `x` float NOT NULL,
  `y` float NOT NULL,
  `z` float NOT NULL,
  `xx` float NOT NULL,
  `yy` float NOT NULL,
  `zz` float NOT NULL,
  `xxx` float NOT NULL,
  `yyy` float NOT NULL,
  `zzz` float NOT NULL,
  `Int` int(11) NOT NULL DEFAULT '0',
  `VW` int(11) NOT NULL DEFAULT '0',
  `OIDs` varchar(350) NOT NULL DEFAULT '0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0',
  `OCAs` varchar(350) NOT NULL DEFAULT '0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0',
  `OTIs` varchar(350) NOT NULL DEFAULT '0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0',
  `Estado` int(11) NOT NULL DEFAULT '0',
  `Precio` int(11) NOT NULL DEFAULT '30000',
  `Comprado` int(11) NOT NULL DEFAULT '0',
  `Comprador` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `armaslegales`
--

CREATE TABLE IF NOT EXISTS `armaslegales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Comprador` varchar(35) NOT NULL DEFAULT 'Desconocido',
  `Proovedor` varchar(35) NOT NULL DEFAULT 'Gobierno',
  `Identificacion` int(100) NOT NULL DEFAULT '0',
  `Objeto` varchar(50) NOT NULL DEFAULT 'Desconocido',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `armaslegales`
--

INSERT INTO `armaslegales` (`id`, `Comprador`, `Proovedor`, `Identificacion`, `Objeto`) VALUES
(1, 'Josh Hawes', 'Armeria SAPD', 72039, 'Escopeta'),
(2, 'Josh Hawes', 'Armeria SAPD', 79578, 'Cargador de Escopeta'),
(3, 'Josh Hawes', 'Armeria SAPD', 65885, 'Cargador de Escopeta'),
(4, 'Gianni Tavone', 'Armeria SAPD', 61144, 'Desert Eagle'),
(5, 'Gianni Tavone', 'Armeria SAPD', 84470, 'Cargador de Desert Eagle'),
(6, 'Gianni Tavone', 'Armeria SAPD', 41035, 'Cargador de Desert Eagle'),
(7, 'Gianni Tavone', 'Armeria SAPD', 21, 'M4'),
(8, 'Gianni Tavone', 'Armeria SAPD', 89095, 'Cargador de M4'),
(9, 'Gianni Tavone', 'Armeria SAPD', 78408, 'Cargador de M4'),
(10, 'Gianni Tavone', 'Armeria SAPD', 10410, 'Cargador de M4'),
(11, 'Gianni Tavone', 'Armeria SAPD', 22524, 'Desert Eagle'),
(12, 'Gianni Tavone', 'Armeria SAPD', 92979, 'Cargador de Desert Eagle'),
(13, 'Gianni Tavone', 'Armeria SAPD', 2917, 'Cargador de Desert Eagle'),
(14, 'Gianni Tavone', 'Armeria SAPD', 48713, 'Cargador de Desert Eagle'),
(15, 'Gianni Tavone', 'Armeria SAPD', 31163, 'Cargador de Desert Eagle');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bans`
--

CREATE TABLE IF NOT EXISTS `bans` (
  `id_ban` int(11) NOT NULL AUTO_INCREMENT,
  `UsuarioID` int(11) NOT NULL DEFAULT '0',
  `AdminID` int(11) NOT NULL DEFAULT '0',
  `fecha` varchar(255) NOT NULL,
  `razon` text NOT NULL,
  `TipoBan` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_ban`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `basuras`
--

CREATE TABLE IF NOT EXISTS `basuras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `x` float NOT NULL,
  `y` float NOT NULL,
  `z` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casas`
--

CREATE TABLE IF NOT EXISTS `casas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `x` float NOT NULL,
  `y` float NOT NULL,
  `z` float NOT NULL,
  `xx` float NOT NULL,
  `yy` float NOT NULL,
  `zz` float NOT NULL,
  `mx` float NOT NULL,
  `my` float NOT NULL,
  `mz` float NOT NULL,
  `ma` float NOT NULL,
  `int` int(11) NOT NULL DEFAULT '0',
  `int2` int(11) NOT NULL DEFAULT '0',
  `vw` int(11) NOT NULL DEFAULT '0',
  `vw2` int(11) NOT NULL DEFAULT '0',
  `Abierta` int(1) NOT NULL DEFAULT '0',
  `Comprada` int(1) NOT NULL DEFAULT '0',
  `Comprador` varchar(35) NOT NULL,
  `Alquilable` int(1) NOT NULL DEFAULT '0',
  `PAlquiler` int(11) NOT NULL DEFAULT '0',
  `Inquilinos` int(11) NOT NULL DEFAULT '0',
  `Precio` int(11) NOT NULL DEFAULT '25000',
  `Armario` int(1) NOT NULL DEFAULT '0',
  `Armas` varchar(35) NOT NULL DEFAULT '0,0,0,0,0',
  `Municiones` varchar(35) NOT NULL DEFAULT '0,0,0,0,0',
  `Cerradura` int(11) NOT NULL DEFAULT '0',
  `Alarma` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `casas`
--

INSERT INTO `casas` (`id`, `x`, `y`, `z`, `xx`, `yy`, `zz`, `mx`, `my`, `mz`, `ma`, `int`, `int2`, `vw`, `vw2`, `Abierta`, `Comprada`, `Comprador`, `Alquilable`, `PAlquiler`, `Inquilinos`, `Precio`, `Armario`, `Armas`, `Municiones`, `Cerradura`, `Alarma`) VALUES
(1, 1474.94, -2174.17, 15.2848, -68.8769, 1351.61, 1080.21, 1474.98, -2176.07, 16.1669, 1.19419, 0, 6, 0, 1, 0, 0, 'El Estado', 0, 0, 0, 250000, 0, '0,0,0,0,0', '0,0,0,0,0', 0, 0),
(2, 1499.87, -2174.15, 15.2848, 243.729, 305.462, 999.148, 1502.44, -2175.62, 16.2492, 59.231, 0, 1, 0, 2, 1, 1, 'Gianni_Tavone', 0, 0, 0, 250000, 0, '0,0,0,0,0', '0,0,0,0,0', 0, 0),
(3, 1524.94, -2174.15, 15.2848, -42.5718, 1405.47, 1084.43, 1524.88, -2175.96, 16.163, 359.001, 0, 8, 0, 3, 0, 0, 'El Estado', 0, 0, 0, 250000, 0, '0,0,0,0,0', '0,0,0,0,0', 0, 0),
(4, 1574.36, -2174.15, 15.2848, 2324.11, -1149.54, 1050.71, 1574.36, -2176.86, 16.4112, 5.93016, 0, 12, 0, 4, 0, 1, 'Santiago_Ventura', 0, 0, 0, 250000, 0, '0,0,0,0,0', '0,0,0,0,0', 0, 0),
(5, 1599.45, -2174.15, 15.2848, -68.8769, 1351.61, 1080.21, 1599.41, -2175.98, 16.1142, 358.688, 0, 6, 0, 5, 0, 0, 'El Estado', 0, 0, 0, 25000, 0, '0,0,0,0,0', '0,0,0,0,0', 0, 0),
(6, 1624.42, -2174.15, 15.2848, -68.8769, 1351.61, 1080.21, 1624.43, -2175.95, 16.2125, 0.567862, 0, 6, 0, 6, 0, 0, 'El Estado', 0, 0, 0, 25000, 0, '0,0,0,0,0', '0,0,0,0,0', 0, 0),
(7, 1498.96, -2160.58, 15.2848, 1662.4, -1849.17, 4563.8, 1500.79, -2160.58, 15.869, 91.9436, 0, 11, 0, 7, 1, 1, 'Kennan_Douse', 0, 0, 0, 10, 0, '0,0,0,0,0', '0,0,0,0,0', 0, 0),
(8, 189.637, -1308.16, 70.2494, 2324.11, -1149.54, 1050.71, 193.492, -1308.19, 72.0156, 89.7751, 0, 12, 0, 8, 0, 1, 'Josh_Hawes', 0, 0, 0, 300000, 0, '0,0,0,0,0', '0,0,0,0,0', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentasbancarias`
--

CREATE TABLE IF NOT EXISTS `cuentasbancarias` (
  `numerocuenta` int(10) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `PIN` int(4) NOT NULL DEFAULT '0',
  `saldo` int(11) NOT NULL DEFAULT '0',
  `propietario` int(11) NOT NULL DEFAULT '0',
  `creacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `ult_jugador` int(11) NOT NULL DEFAULT '0',
  `ult_fecha` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`numerocuenta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `delitos`
--

CREATE TABLE IF NOT EXISTS `delitos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(35) NOT NULL,
  `Informacion` varchar(256) NOT NULL,
  `Fecha` varchar(35) NOT NULL,
  `Resuelto` int(11) NOT NULL DEFAULT '0',
  `Reportador` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `delitos`
--

INSERT INTO `delitos` (`id`, `Nombre`, `Informacion`, `Fecha`, `Resuelto`, `Reportador`) VALUES
(1, 'Josh_Hawes', 'informacion', '21/07/2015 - 21:13:33', 0, 'Gianni Tavone');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expulsiones`
--

CREATE TABLE IF NOT EXISTS `expulsiones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Expulsado` varchar(35) NOT NULL,
  `Expulsador` varchar(35) NOT NULL,
  `Razon` varchar(75) NOT NULL,
  `Fecha` varchar(75) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facciones`
--

CREATE TABLE IF NOT EXISTS `facciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Rango1` varchar(35) NOT NULL,
  `Rango2` varchar(35) NOT NULL,
  `Rango3` varchar(35) NOT NULL,
  `Rango4` varchar(35) NOT NULL,
  `Rango5` varchar(35) NOT NULL,
  `Rango6` varchar(35) NOT NULL,
  `Rango7` varchar(35) NOT NULL,
  `Rango8` varchar(35) NOT NULL,
  `Sueldo1` int(11) NOT NULL,
  `Sueldo2` int(11) NOT NULL,
  `Sueldo3` int(11) NOT NULL,
  `Sueldo4` int(11) NOT NULL,
  `Sueldo5` int(11) NOT NULL,
  `Sueldo6` int(11) NOT NULL,
  `Sueldo7` int(11) NOT NULL,
  `Sueldo8` int(11) NOT NULL,
  `Lider` int(11) NOT NULL DEFAULT '0',
  `tipo` smallint(1) NOT NULL DEFAULT '0',
  `estado` smallint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `facciones`
--

INSERT INTO `facciones` (`id`, `Nombre`, `Rango1`, `Rango2`, `Rango3`, `Rango4`, `Rango5`, `Rango6`, `Rango7`, `Rango8`, `Sueldo1`, `Sueldo2`, `Sueldo3`, `Sueldo4`, `Sueldo5`, `Sueldo6`, `Sueldo7`, `Sueldo8`, `Lider`, `tipo`, `estado`) VALUES
(1, 'LSPD', 'Cadete', 'Oficial', 'Cabo', 'Sargento', 'Teniente', 'Capitán', 'Inspector', 'Comisario', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `garajes`
--

CREATE TABLE IF NOT EXISTS `garajes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Casa` int(11) NOT NULL,
  `x` float NOT NULL,
  `y` float NOT NULL,
  `z` float NOT NULL,
  `a` float NOT NULL,
  `VW` int(11) NOT NULL,
  `Abierto` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `garajes`
--

INSERT INTO `garajes` (`id`, `Casa`, `x`, `y`, `z`, `a`, `VW`, `Abierto`) VALUES
(1, 3, 1534.02, -2158.44, 14.6, 359.941, 1, 0),
(5, 2, 1509.09, -2157.77, 14.6, 356.482, 5, 1),
(6, 4, 1583.68, -2157.76, 14.6, 2.12052, 6, 0),
(7, 8, 166.505, -1338.58, 69.8288, 3.03467, 7, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `x` float NOT NULL,
  `y` float NOT NULL,
  `z` float NOT NULL,
  `int` int(11) NOT NULL,
  `vw` int(11) NOT NULL,
  `Tipo` int(11) NOT NULL,
  `Negocio` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`id`, `x`, `y`, `z`, `int`, `vw`, `Tipo`, `Negocio`) VALUES
(1, 1641.4, -2332.75, 13.5469, 0, 0, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `muebles`
--

CREATE TABLE IF NOT EXISTS `muebles` (
  `id_mueble` int(11) NOT NULL AUTO_INCREMENT,
  `casa` int(11) NOT NULL,
  `modelo` int(11) NOT NULL,
  `x` float NOT NULL,
  `y` float NOT NULL,
  `z` float NOT NULL,
  `xx` float NOT NULL,
  `yy` float NOT NULL,
  `zz` float NOT NULL,
  `interior` int(11) NOT NULL,
  `virtualworld` int(11) NOT NULL,
  PRIMARY KEY (`id_mueble`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `negocios`
--

CREATE TABLE IF NOT EXISTS `negocios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `EX` float NOT NULL,
  `EY` float NOT NULL,
  `EZ` float NOT NULL,
  `IX` float NOT NULL,
  `IY` float NOT NULL,
  `IZ` float NOT NULL,
  `Interior` int(11) NOT NULL,
  `IntExt` int(11) NOT NULL,
  `VW` int(11) NOT NULL,
  `Comprada` int(11) NOT NULL,
  `Comprador` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `Precio` int(11) NOT NULL,
  `Cerrada` int(11) NOT NULL,
  `Dinero` int(11) NOT NULL,
  `PSolidos` int(11) NOT NULL,
  `PLiquidos` int(11) NOT NULL,
  `Tipo` int(11) NOT NULL DEFAULT '1',
  `Cerradura` int(11) NOT NULL,
  `Alarma` int(11) NOT NULL,
  `Camara` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `negocios`
--

INSERT INTO `negocios` (`id`, `Nombre`, `EX`, `EY`, `EZ`, `IX`, `IY`, `IZ`, `Interior`, `IntExt`, `VW`, `Comprada`, `Comprador`, `Precio`, `Cerrada`, `Dinero`, `PSolidos`, `PLiquidos`, `Tipo`, `Cerradura`, `Alarma`, `Camara`) VALUES
(1, '- 7 Unity', 1833.32, -1842.53, 13.5781, 6.09118, -29.2719, 1003.55, 10, 0, 0, 1, 'Josh_Hawes', 30000, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pcu_cambiosnombre`
--

CREATE TABLE IF NOT EXISTS `pcu_cambiosnombre` (
  `CNameID` int(11) NOT NULL AUTO_INCREMENT,
  `UsuarioID` int(11) NOT NULL DEFAULT '0',
  `nombre_viejo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_nuevo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`CNameID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pcu_certificacion`
--

CREATE TABLE IF NOT EXISTS `pcu_certificacion` (
  `CertID` int(11) NOT NULL AUTO_INCREMENT,
  `UsuarioID` int(11) NOT NULL DEFAULT '0',
  `pregunta_1` text COLLATE utf8_unicode_ci NOT NULL,
  `respuesta_1` text COLLATE utf8_unicode_ci NOT NULL,
  `pregunta_2` text COLLATE utf8_unicode_ci NOT NULL,
  `respuesta_2` text COLLATE utf8_unicode_ci NOT NULL,
  `pregunta_3` text COLLATE utf8_unicode_ci NOT NULL,
  `respuesta_3` text COLLATE utf8_unicode_ci NOT NULL,
  `pregunta_4` text COLLATE utf8_unicode_ci NOT NULL,
  `respuesta_4` text COLLATE utf8_unicode_ci NOT NULL,
  `pregunta_5` text COLLATE utf8_unicode_ci NOT NULL,
  `respuesta_5` text COLLATE utf8_unicode_ci NOT NULL,
  `pregunta_6` text COLLATE utf8_unicode_ci NOT NULL,
  `respuesta_6` text COLLATE utf8_unicode_ci NOT NULL,
  `certificador` int(11) NOT NULL DEFAULT '0',
  `comentario` text COLLATE utf8_unicode_ci NOT NULL,
  `fecha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`CertID`),
  UNIQUE KEY `UsuarioID` (`UsuarioID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `pcu_certificacion`
--

INSERT INTO `pcu_certificacion` (`CertID`, `UsuarioID`, `pregunta_1`, `respuesta_1`, `pregunta_2`, `respuesta_2`, `pregunta_3`, `respuesta_3`, `pregunta_4`, `respuesta_4`, `pregunta_5`, `respuesta_5`, `pregunta_6`, `respuesta_6`, `certificador`, `comentario`, `fecha`) VALUES
(1, 7, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1, 'sad', '21/07/2015 - 23:48:57'),
(2, 8, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1, 'sad', '23/07/2015 - 01:47:30'),
(3, 9, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1, 'dsasd', '23/07/2015 - 21:48:18'),
(4, 10, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1, 'wapo', '26/07/2015 - 18:59:57'),
(5, 11, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1, 'muy bien hijo mio', '27/07/2015 - 23:13:02'),
(6, 12, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1, 'sda', '27/07/2015 - 23:24:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pcu_certificar`
--

CREATE TABLE IF NOT EXISTS `pcu_certificar` (
  `CertificarID` int(11) NOT NULL AUTO_INCREMENT,
  `UsuarioID` int(11) NOT NULL,
  `pregunta_1` text COLLATE utf8_unicode_ci NOT NULL,
  `respuesta_1` text COLLATE utf8_unicode_ci NOT NULL,
  `pregunta_2` text COLLATE utf8_unicode_ci NOT NULL,
  `respuesta_2` text COLLATE utf8_unicode_ci NOT NULL,
  `pregunta_3` text COLLATE utf8_unicode_ci NOT NULL,
  `respuesta_3` text COLLATE utf8_unicode_ci NOT NULL,
  `pregunta_4` text COLLATE utf8_unicode_ci NOT NULL,
  `respuesta_4` text COLLATE utf8_unicode_ci NOT NULL,
  `pregunta_5` text COLLATE utf8_unicode_ci NOT NULL,
  `respuesta_5` text COLLATE utf8_unicode_ci NOT NULL,
  `pregunta_6` text COLLATE utf8_unicode_ci NOT NULL,
  `respuesta_6` text COLLATE utf8_unicode_ci NOT NULL,
  `corregida` int(11) NOT NULL DEFAULT '0',
  `comentario` text COLLATE utf8_unicode_ci NOT NULL,
  `certificador` int(11) NOT NULL DEFAULT '0',
  `fecha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`CertificarID`),
  UNIQUE KEY `UsuarioID` (`UsuarioID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pcu_confirmar`
--

CREATE TABLE IF NOT EXISTS `pcu_confirmar` (
  `ConfID` int(11) NOT NULL AUTO_INCREMENT,
  `UsuarioID` int(11) NOT NULL,
  `codigo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` int(11) NOT NULL DEFAULT '0',
  `fecha` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `valor` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ConfID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pcu_pregcerts`
--

CREATE TABLE IF NOT EXISTS `pcu_pregcerts` (
  `PreID` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `autor` int(11) NOT NULL DEFAULT '0',
  `estado` smallint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`PreID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pcu_pregtest`
--

CREATE TABLE IF NOT EXISTS `pcu_pregtest` (
  `TestID` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta` text COLLATE utf8_unicode_ci NOT NULL,
  `A` text COLLATE utf8_unicode_ci NOT NULL,
  `B` text COLLATE utf8_unicode_ci NOT NULL,
  `C` text COLLATE utf8_unicode_ci NOT NULL,
  `D` text COLLATE utf8_unicode_ci NOT NULL,
  `resultado` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `autor` int(11) NOT NULL DEFAULT '0',
  `estado` smallint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`TestID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pcu_skins`
--

CREATE TABLE IF NOT EXISTS `pcu_skins` (
  `SkinID` int(11) NOT NULL,
  `sexo` smallint(1) NOT NULL DEFAULT '0',
  `estado` smallint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pcu_skins`
--

INSERT INTO `pcu_skins` (`SkinID`, `sexo`, `estado`) VALUES
(0, 0, 0),
(1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pcu_skinstrabajo`
--

CREATE TABLE IF NOT EXISTS `pcu_skinstrabajo` (
  `id_skintrabajo` int(11) NOT NULL AUTO_INCREMENT,
  `id_faccion` int(11) NOT NULL DEFAULT '0',
  `SkinID` int(11) NOT NULL DEFAULT '0',
  `estado` smallint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_skintrabajo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pcu_usuarios`
--

CREATE TABLE IF NOT EXISTS `pcu_usuarios` (
  `UsuarioID` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `ingreso` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `ult_juego` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `ult_pcu` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `sub_admin` int(11) NOT NULL,
  `int_test` int(11) NOT NULL DEFAULT '0',
  `int_cert` int(11) NOT NULL DEFAULT '0',
  `raza` smallint(1) NOT NULL DEFAULT '-1',
  `altura` smallint(3) NOT NULL DEFAULT '0',
  `peso` smallint(3) NOT NULL DEFAULT '0',
  `colorojos` smallint(2) NOT NULL DEFAULT '-1',
  `colorpelo` smallint(2) NOT NULL DEFAULT '-1',
  `procedencia` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `descfisica` text COLLATE utf8_spanish_ci NOT NULL,
  `descpsico` text COLLATE utf8_spanish_ci NOT NULL,
  `historia` text COLLATE utf8_spanish_ci NOT NULL,
  `comollegaste` text COLLATE utf8_spanish_ci NOT NULL,
  `cambio_nombre` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`UsuarioID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantaciones`
--

CREATE TABLE IF NOT EXISTS `plantaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `X` float NOT NULL,
  `Y` float NOT NULL,
  `Z` float NOT NULL,
  `Tiempo` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `senales`
--

CREATE TABLE IF NOT EXISTS `senales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_senal` int(11) NOT NULL,
  `x` float NOT NULL,
  `y` float NOT NULL,
  `z` float NOT NULL,
  `rz` float NOT NULL,
  `texto` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talleres`
--

CREATE TABLE IF NOT EXISTS `talleres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Negocio` int(11) NOT NULL DEFAULT '0',
  `x` float NOT NULL,
  `y` float NOT NULL,
  `z` float NOT NULL,
  `Int` int(11) NOT NULL DEFAULT '0',
  `Vw` int(11) NOT NULL DEFAULT '0',
  `txx` float NOT NULL,
  `tyy` float NOT NULL,
  `tzz` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(35) NOT NULL,
  `Apodo` varchar(255) NOT NULL,
  `Password` varchar(35) NOT NULL,
  `Posiciones` varchar(150) NOT NULL DEFAULT '1642.1908,-2334.3503,13.5469,358.0489,0,0',
  `Datos` varchar(50) NOT NULL DEFAULT '0,1,1,1,1',
  `Admin` int(2) NOT NULL DEFAULT '0',
  `Dinero` varchar(10) NOT NULL DEFAULT '1000,2500',
  `Casas` varchar(50) NOT NULL DEFAULT '-1,-1,-1',
  `Negocio` int(5) NOT NULL DEFAULT '-1',
  `Coches` varchar(150) NOT NULL DEFAULT '-1,-1,-1,-1,-1,-1',
  `Faccion` varchar(20) NOT NULL DEFAULT '0,0,0',
  `Carcel` varchar(25) NOT NULL DEFAULT '0,0',
  `Medicos` varchar(25) NOT NULL DEFAULT '0,0,0',
  `Necesidades` varchar(20) NOT NULL DEFAULT '0,100,0',
  `Baneado` int(2) NOT NULL DEFAULT '0',
  `TBan` int(50) NOT NULL DEFAULT '0',
  `Skin` int(3) NOT NULL DEFAULT '26',
  `Uniforme` int(3) NOT NULL DEFAULT '26',
  `Vida` float NOT NULL DEFAULT '100',
  `Chaleco` float NOT NULL DEFAULT '0',
  `Documentacion` varchar(30) NOT NULL DEFAULT '0,0',
  `PlacaPolicia` int(10) NOT NULL DEFAULT '0',
  `Trabajo` varchar(20) NOT NULL DEFAULT '0,0,0',
  `Servicio` varchar(20) NOT NULL DEFAULT '0,29',
  `Jugando` int(1) NOT NULL DEFAULT '0',
  `Licencias` varchar(50) NOT NULL DEFAULT '0,0,0,0,0,0,0,0',
  `DocFalsa` varchar(50) NOT NULL DEFAULT 'Ninguno,0',
  `LicenciasFalsas` varchar(50) NOT NULL DEFAULT '0,0,0,0,0,0,0,0',
  `Lenguajes` varchar(120) NOT NULL DEFAULT '0,0,0,0,0,0,0,0,0,0,0,0,0,0,0',
  `Premium` varchar(20) NOT NULL DEFAULT '0,0',
  `Advertencia` int(11) NOT NULL DEFAULT '0',
  `PuntosRol` varchar(20) NOT NULL DEFAULT '0,0',
  `Habilidad` varchar(120) NOT NULL DEFAULT '0,0,0,0,0,0,0,0,0',
  `Almacen` int(11) NOT NULL DEFAULT '-1',
  `Taller` int(11) NOT NULL DEFAULT '-1',
  `Heridas` varchar(35) NOT NULL DEFAULT '0,0,0,0,0,0,0',
  `Fisico` varchar(35) NOT NULL DEFAULT '0,0',
  `HorasJugadas` int(11) NOT NULL DEFAULT '1',
  `EspecialID` varchar(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '0,0',
  `EspecialCan` varchar(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '0,0',
  `EspecialTipo` varchar(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '0,0',
  `Herido` int(11) NOT NULL DEFAULT '0',
  `CuentasBancarias` varchar(255) NOT NULL DEFAULT '-1,-1,-1,-1,-1',
  `BolsilloID` varchar(64) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '0,0,0,0,0,0,0,0,0,0,0,0',
  `BolsilloCantidad` varchar(64) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '0,0,0,0,0,0,0,0,0,0,0,0''',
  `BolsilloTipo` varchar(64) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '0,0,0,0,0,0,0,0,0,0,0,0''',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `Nombre`, `Apodo`, `Password`, `Posiciones`, `Datos`, `Admin`, `Dinero`, `Casas`, `Negocio`, `Coches`, `Faccion`, `Carcel`, `Medicos`, `Necesidades`, `Baneado`, `TBan`, `Skin`, `Uniforme`, `Vida`, `Chaleco`, `Documentacion`, `PlacaPolicia`, `Trabajo`, `Servicio`, `Jugando`, `Licencias`, `DocFalsa`, `LicenciasFalsas`, `Lenguajes`, `Premium`, `Advertencia`, `PuntosRol`, `Habilidad`, `Almacen`, `Taller`, `Heridas`, `Fisico`, `HorasJugadas`, `EspecialID`, `EspecialCan`, `EspecialTipo`, `Herido`, `CuentasBancarias`, `BolsilloID`, `BolsilloCantidad`, `BolsilloTipo`) VALUES
(5, 'James_Wright', '', '4d186321c1a7f0f354b297e8914ab240', '1641.403808,-2332.746337,13.546875,58.981109,0,0', '0,1,1,1,10', 4, '671', '-1,-1,-1', -1, '-1,-1,-1,-1,-1,-1', '1,0,1', '0,0', '0,0,0', '3,100,0', 0, 0, 26, 26, 99, 0, '0,0', 0, '10,1,0', '0,29', 0, '0,0,0,0,0,0,0,0', 'Ninguno,0', '0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0,0,0,0,0,0', '0,0', 0, '0,0', '0,0,0,0,0,0,0,0,0,0', -1, -1, '0,0,0,0,0,0,0', '0,0', 1, '0,0', '0,0', '0,0', 0, '-1,-1,-1,-1,-1', '0,0,0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0,0,0''', '0,0,0,0,0,0,0,0,0,0,0,0''');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `varios`
--

CREATE TABLE IF NOT EXISTS `varios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ImpuestosCasa` int(11) NOT NULL DEFAULT '30',
  `ImpuestosNegocio` int(11) NOT NULL DEFAULT '70',
  `ImpuestosCoche` int(11) NOT NULL DEFAULT '25',
  `CajaGobierno` int(11) NOT NULL DEFAULT '500000',
  `CajaLSRTV` int(11) NOT NULL DEFAULT '5000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE IF NOT EXISTS `vehiculos` (
  `ID` mediumint(9) NOT NULL AUTO_INCREMENT,
  `Modelo` int(4) NOT NULL,
  `X` float NOT NULL,
  `Y` float NOT NULL,
  `Z` float NOT NULL,
  `Angle` float NOT NULL,
  `Color1` int(4) NOT NULL,
  `Color2` int(4) NOT NULL,
  `FaccionID` int(4) NOT NULL,
  `Interior` int(4) NOT NULL,
  `Virtual` int(11) NOT NULL DEFAULT '0',
  `Vida` float NOT NULL,
  `panels` int(4) NOT NULL,
  `doors` int(4) NOT NULL,
  `lights` int(4) NOT NULL,
  `tires` int(4) NOT NULL,
  `Gasolina` int(4) NOT NULL,
  `Job` int(4) NOT NULL,
  `Paintjob` int(2) NOT NULL,
  `Componentes` varchar(92) NOT NULL,
  `Dueno` char(32) NOT NULL,
  `Motor` int(4) NOT NULL DEFAULT '0',
  `Cerrado` int(4) NOT NULL DEFAULT '0',
  `Roto` int(4) NOT NULL DEFAULT '0',
  `Mal` int(11) NOT NULL DEFAULT '0',
  `Multa` int(11) NOT NULL DEFAULT '0',
  `Bloqueado` int(1) NOT NULL DEFAULT '0',
  `Descripcion` varchar(50) NOT NULL DEFAULT 'Admin',
  `MalID` varchar(128) NOT NULL DEFAULT '0,0,0,0,0,0,0,0,0,0',
  `MalCantidad` varchar(128) NOT NULL DEFAULT '0,0,0,0,0,0,0,0,0,0',
  `MalTipo` varchar(128) NOT NULL DEFAULT '0,0,0,0,0,0,0,0,0,0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=124 ;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`ID`, `Modelo`, `X`, `Y`, `Z`, `Angle`, `Color1`, `Color2`, `FaccionID`, `Interior`, `Virtual`, `Vida`, `panels`, `doors`, `lights`, `tires`, `Gasolina`, `Job`, `Paintjob`, `Componentes`, `Dueno`, `Motor`, `Cerrado`, `Roto`, `Mal`, `Multa`, `Bloqueado`, `Descripcion`, `MalID`, `MalCantidad`, `MalTipo`) VALUES
(2, 429, 1773.83, -2398.03, -91.7307, 0, 93, 6, 8888, 0, 0, 1000, 0, 0, 0, 0, 93, 0, -1, '', 'Josh_Hawes', 0, 0, 0, 0, 0, 0, 'Banshee', '97,103,0,0,0,0,0,0,0,0', '5,5,0,0,0,0,0,0,0,0', '1,1,0,0,0,0,0,0,0,0'),
(3, 406, 1500.05, -2210.21, 15.0646, 178.746, 128, 128, 8888, 0, 0, 981.738, 0, 0, 0, 0, 97, 0, -1, '', 'Gianni_Tavone', 0, 1, 0, 0, 0, 0, 'Buffalo', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(4, 520, 2902.69, -2337.19, 65.6411, 109.737, 210, 210, 8888, 0, 0, 1000, 0, 0, 0, 0, 95, 0, -1, '', 'Josh_Hawes', 1, 1, 0, 0, 0, 0, 'Elegy', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(5, 470, 1018.19, -292.874, 73.999, 48.6314, 1, 1, 8888, 0, 0, 1000, 0, 0, 0, 0, 99, 0, -1, '', 'Josh_Hawes', 0, 1, 0, 0, 0, 0, 'HawesTUTU', '94,100,94,100,0,0,0,0,0,0', '5,5,5,5,0,0,0,0,0,0', '1,1,1,1,0,0,0,0,0,0'),
(6, 488, 1494.92, -2182.37, 18.5541, 163.279, 211, 78, 8888, 0, 0, 1000, 0, 0, 0, 0, 13, 0, -1, '', 'Gianni_Tavone', 1, 1, 0, 0, 0, 0, 'PedoCoptero', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(7, 596, 1396.26, -1642.74, 5.64109, 89.4647, 0, 1, 1, 0, 0, 1000, 0, 0, 0, 0, 0, 0, -1, '', 'Admin', 1, 0, 0, 0, 0, 0, 'Poli LS', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(8, 596, 1396.17, -1647.53, 5.67396, 90.1202, 0, 1, 1, 0, 0, 1000, 0, 0, 0, 0, 98, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'Poli LS', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(9, 596, 1396.26, -1651.96, 5.67356, 89.2082, 0, 1, 1, 0, 0, 1000, 0, 0, 0, 0, 0, 0, -1, '', 'Admin', 1, 0, 0, 0, 0, 0, 'Poli LS', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(10, 596, 1396.4, -1656.28, 5.67535, 89.7637, 0, 1, 1, 0, 0, 1000, 0, 0, 0, 0, 89, 0, -1, '', 'Admin', 1, 0, 0, 0, 0, 0, 'Poli LS', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(11, 596, 1396.14, -1660.75, 5.67482, 89.2549, 0, 1, 1, 0, 0, 1000, 0, 0, 12, 0, 0, 0, -1, '', 'Admin', 1, 0, 0, 0, 0, 0, 'Poli LS', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(12, 596, 1396.18, -1665.1, 5.6749, 89.3951, 0, 1, 1, 0, 0, 1000, 0, 0, 0, 0, 0, 0, -1, '', 'Admin', 1, 0, 0, 0, 0, 0, 'Poli LS', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(13, 596, 1396.19, -1669.51, 5.67499, 89.4036, 0, 1, 1, 0, 0, 1000, 0, 0, 0, 0, 98, 0, -1, '', 'Admin', 1, 0, 0, 0, 0, 0, 'Poli LS', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(14, 596, 1396.21, -1673.9, 5.64222, 89.0405, 0, 1, 1, 0, 0, 1000, 0, 0, 0, 0, 99, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'Poli LS', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(15, 596, 1396.21, -1682.52, 5.67486, 89.9476, 0, 1, 1, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'Poli LS', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(16, 596, 1396.24, -1686.97, 5.64222, 90.5538, 0, 1, 1, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'Poli LS', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(17, 596, 1396.12, -1691.34, 5.64157, 90.5828, 0, 1, 1, 0, 0, 1000, 0, 0, 0, 0, 99, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'Poli LS', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(18, 596, 1396.2, -1695.78, 5.67431, 90.4329, 0, 1, 1, 0, 0, 1000, 0, 0, 0, 0, 0, 0, -1, '', 'Admin', 1, 0, 0, 0, 0, 0, 'Poli LS', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(19, 596, 1396.11, -1700.15, 5.6409, 89.8509, 0, 1, 1, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'Poli LS', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(20, 596, 1396.23, -1704.5, 5.67413, 90.5066, 0, 1, 1, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'Poli LS', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(21, 596, 1396.31, -1709, 5.67493, 90.3751, 0, 1, 1, 0, 0, 1000, 0, 0, 0, 0, 99, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'Poli LS', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(22, 596, 1396.15, -1713.24, 5.64107, 90.9206, 0, 1, 1, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'Poli LS', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(23, 596, 1388.35, -1720.8, 5.67401, 357.998, 0, 1, 1, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'Poli LS', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(24, 596, 1383.87, -1720.71, 5.67388, 359.641, 0, 1, 1, 0, 0, 1000, 0, 0, 0, 0, 91, 0, -1, '', 'Admin', 1, 0, 0, 0, 0, 0, 'Poli LS', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(25, 596, 1378.68, -1720.75, 5.6746, 359.353, 0, 1, 1, 0, 0, 1000, 0, 0, 0, 0, 99, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'Poli LS', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(26, 596, 1374.13, -1720.64, 5.67467, 359.664, 0, 1, 1, 0, 0, 1000, 0, 0, 0, 0, 0, 0, -1, '', 'Admin', 1, 0, 0, 0, 0, 0, 'Poli LS', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(27, 596, 1369.17, -1720.67, 5.67406, 0.135622, 1, 1, 1, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'Poli LS', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(28, 596, 1364.49, -1720.62, 5.6755, 358.557, 1, 1, 1, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'Poli LS', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(29, 596, 1359.71, -1720.76, 5.64074, 0.08393, 1, 1, 1, 0, 0, 1000, 0, 0, 3, 0, 99, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'Poli LS', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(30, 596, 1354.98, -1720.68, 5.67392, 359.721, 1, 1, 1, 0, 0, 1000, 0, 0, 12, 0, 99, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'Poli LS', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(31, 596, 1350.07, -1720.74, 5.67484, 0.266881, 1, 1, 1, 0, 0, 1000, 0, 0, 0, 0, 0, 0, -1, '', 'Admin', 1, 0, 0, 0, 0, 0, 'Poli LS', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(32, 523, 1354.43, -1695.79, 5.52191, 89.65, 0, 0, 1, 0, 0, 1000, 0, 0, 0, 0, 99, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'HPV1000', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(33, 523, 1354.43, -1691.43, 5.52233, 88.1227, 0, 0, 1, 0, 0, 1000, 0, 0, 0, 0, 99, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'HPV1000', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(34, 523, 1354.3, -1687.14, 5.5178, 91.2297, 0, 0, 1, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'HPV1000', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(35, 523, 1354.25, -1682.59, 5.50516, 93.882, 0, 0, 1, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'HPV1000', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(36, 523, 1354.83, -1675.14, 5.52289, 48.8417, 0, 0, 1, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'HPV1000', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(37, 523, 1354.18, -1678.37, 5.52113, 91.4734, 0, 0, 1, 0, 0, 1000, 0, 0, 0, 0, 99, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'HPV1000', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(42, 525, 1370.48, -1645.17, 5.83806, 180.725, 1, 6, 1, 0, 0, 989.668, 0, 33554432, 12, 0, 84, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'Grua', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(43, 525, 1365.66, -1645.16, 5.82595, 180.822, 1, 6, 1, 0, 0, 1000, 0, 0, 0, 0, 43, 0, -1, '', 'Admin', 1, 0, 0, 0, 0, 0, 'Grua', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(44, 525, 1355.86, -1645.23, 5.82413, 179.773, 1, 6, 1, 0, 0, 1000, 0, 0, 0, 0, 99, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'Grua', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(45, 599, 1350.93, -1645.15, 6.14401, 178.585, 0, 1, 1, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'RangerPo', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(46, 599, 1345.87, -1645.17, 6.14474, 179.214, 0, 1, 1, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'RangerPo', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(47, 599, 1340.99, -1645.34, 6.13531, 179.549, 0, 1, 1, 0, 0, 1000, 0, 0, 0, 0, 99, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'RangerPo', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(48, 599, 1336.09, -1645.31, 6.14268, 180.589, 0, 1, 1, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'RangerPo', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(49, 599, 1330.8, -1645.44, 6.14416, 179.815, 0, 1, 1, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'RangerPo', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(50, 599, 1325.89, -1645.56, 6.14253, 180.567, 0, 1, 1, 0, 0, 1000, 0, 0, 0, 0, 99, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'RangerPo', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(51, 525, 1360.68, -1645.26, 5.82728, 180.639, 1, 6, 1, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'Grua', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(53, 528, 1353.26, -1674.07, -4.72848, 89.9316, 0, 0, 1, 0, 0, 1000, 0, 0, 12, 0, 20, 0, -1, '', 'Admin', 1, 0, 0, 0, 0, 0, 'FBI Coche', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(54, 528, 1353.2, -1678.35, -4.7288, 89.5456, 0, 0, 1, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'FBI Coche', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(55, 528, 1353.32, -1682.66, -4.7288, 89.9522, 0, 0, 1, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'FBI Coche', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(56, 528, 1353.27, -1687.07, -4.7294, 90.6558, 0, 0, 1, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'FBI Coche', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(57, 528, 1353.25, -1691.28, -4.72941, 89.9139, 0, 0, 1, 0, 0, 1000, 0, 0, 0, 0, 99, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'FBI Coche', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(58, 528, 1353.29, -1695.84, -4.72904, 90.3365, 0, 0, 1, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'FBI Coche', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(59, 601, 1361.54, -1662.98, -5.01402, 0.441905, 0, 0, 1, 0, 0, 1000, 0, 0, 0, 0, 97, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'S.W.A.T', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(60, 601, 1365.99, -1662.92, -5.01404, 359.517, 0, 0, 1, 0, 0, 994.059, 0, 0, 0, 0, 98, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'S.W.A.T', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(61, 427, 1369.88, -1662.05, -4.641, 1.08966, 0, 1, 1, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'Enforcer', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(62, 427, 1374.4, -1662.14, -4.64093, 359.04, 0, 1, 1, 0, 0, 1000, 0, 0, 0, 0, 18, 0, -1, '', 'Admin', 1, 0, 0, 0, 0, 0, 'Enforcer', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(63, 437, 1325.82, -1645.81, -4.63922, 178.805, 1, 210, 1, 0, 0, 1000, 0, 0, 0, 0, 99, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'Coach', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(64, 437, 1330.27, -1645.79, -4.63469, 180.095, 1, 210, 1, 0, 0, 1000, 0, 0, 0, 0, 72, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'Coach', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(65, 527, 1396.88, -1643.21, -5.05733, 88.8969, 210, 1, 1, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'Cadrona', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(66, 529, 1396.4, -1647.71, -5.13946, 88.7642, 6, 1, 1, 0, 0, 1000, 0, 0, 0, 0, 0, 0, -1, '', 'Admin', 1, 0, 0, 0, 0, 0, 'Willard', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(67, 529, 1396.35, -1651.97, -5.14026, 89.6724, 3, 1, 1, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'Willard', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(68, 561, 1396.4, -1656.45, -4.95917, 91.9011, 1, 1, 1, 0, 0, 991.607, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'Stratum', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(69, 459, 1396.37, -1660.76, -4.72824, 89.78, 0, 0, 1, 0, 0, 1000, 0, 0, 0, 0, 0, 0, -1, '', 'Admin', 1, 0, 0, 0, 0, 0, 'Admin', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(70, 497, 1385.67, -1690.02, 49.8127, 269.46, 1, 0, 1, 0, 0, 1000, 0, 0, 0, 0, 99, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'Poli Maverick', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(71, 497, 1385.45, -1667.72, 49.8498, 269.713, 1, 210, 1, 0, 0, 1000, 0, 0, 0, 0, 98, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'Poli Maverick', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(72, 522, 1511.79, -2178.27, 13.5424, 179.075, 211, 79, 8888, 0, 0, 1000, 0, 0, 0, 0, 0, 0, -1, '', 'Gianni_Tavone', 1, 1, 0, 0, 0, 0, 'FantiNeta', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(73, 462, 1562.37, -2312.45, 13.1503, 92.8088, 1, 3, 997, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 1, 0, 0, 0, 0, 0, 'Faggio', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(74, 462, 1562.42, -2315.25, 13.1503, 88.7784, 1, 3, 997, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 1, 0, 0, 0, 0, 0, 'Faggio', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(75, 462, 1562.34, -2308.86, 13.15, 91.2897, 1, 3, 997, 0, 0, 990.784, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'Faggio', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(76, 462, 1562.44, -2319.03, 13.1501, 89.5676, 1, 3, 997, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 1, 0, 0, 0, 0, 0, 'Faggio', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(77, 462, 1562.46, -2321.93, 13.1501, 88.0626, 1, 3, 997, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 1, 0, 0, 0, 0, 0, 'Faggio', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(78, 462, 1562.42, -2325.45, 13.1507, 90.7164, 1, 3, 997, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 1, 0, 0, 0, 0, 0, 'Faggio', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(79, 462, 1562.43, -2328.66, 13.1502, 90.3421, 1, 3, 997, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 1, 0, 0, 0, 0, 0, 'Faggio', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(80, 462, 1562.37, -2332.11, 13.149, 88.0541, 1, 3, 997, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 1, 0, 0, 0, 0, 0, 'Faggio', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(81, 462, 1562.38, -2335.63, 13.1489, 87.5254, 1, 3, 997, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 1, 0, 0, 0, 0, 0, 'Faggio', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(82, 462, 1562.33, -2338.43, 13.1454, 87.278, 1, 3, 997, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 1, 0, 0, 0, 0, 0, 'Faggio', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(83, 411, 955.114, -1041.27, 30.2422, 0, 5, 5, 8888, 0, 0, 989.692, 0, 0, 0, 0, 0, 0, -1, '', 'Kennan_Douse', 1, 0, 0, 0, 0, 0, 'Infernus', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(84, 407, 1537.46, -1531.28, 13.7845, 90.8442, 3, 3, 3, 0, 0, 999.704, 0, 131072, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'Bomberos', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(85, 407, 1537.44, -1536.09, 13.786, 89.9583, 3, 3, 3, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'Bomberos', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(86, 407, 1537.33, -1541.04, 13.7857, 89.6852, 3, 3, 3, 0, 0, 1000, 0, 0, 0, 0, 99, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'Bomberos', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(87, 407, 1537.34, -1545.96, 13.7841, 88.8864, 3, 3, 3, 0, 0, 1000, 0, 0, 0, 0, 45, 0, -1, '', 'Admin', 1, 0, 0, 0, 0, 0, 'Bomberos', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(88, 407, 1537.34, -1551.4, 13.7823, 90.2373, 3, 3, 3, 0, 0, 1000, 0, 0, 0, 0, 93, 0, -1, '', 'Admin', 1, 0, 0, 0, 0, 0, 'Bomberos', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(89, 407, 1537.43, -1556.43, 13.7815, 90.6796, 3, 3, 3, 0, 0, 724.662, 0, 0, 3, 0, 97, 0, -1, '', 'Admin', 1, 0, 0, 0, 0, 0, 'Bomberos', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(90, 407, 1537.32, -1561.2, 13.7818, 90.1393, 3, 3, 3, 0, 0, 970, 0, 0, 12, 0, 95, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'Bomberos', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(91, 407, 1536.87, -1566.09, 13.7834, 89.6102, 3, 3, 3, 0, 0, 1000, 0, 0, 0, 0, 99, 0, -1, '', 'Admin', 1, 0, 0, 0, 0, 0, 'Bomberos', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(92, 544, 1508.16, -1497.36, 13.8005, 179.268, 3, 3, 3, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'PBomberos', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(93, 544, 1513.13, -1497.37, 13.802, 179.891, 3, 3, 3, 0, 0, 997.233, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'PBomberos', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(94, 490, 1538.41, -1496.83, 13.6873, 180.735, 1, 3, 3, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'FBI Rancher', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(95, 490, 1543.56, -1496.88, 13.6822, 177.947, 1, 3, 3, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'FBI Rancher', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(96, 490, 1533.31, -1496.61, 13.6874, 179.31, 1, 3, 3, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'FBI Rancher', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(97, 490, 1528.33, -1496.53, 13.6921, 180.689, 1, 3, 3, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'FBI Rancher', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(98, 544, 1518.16, -1497.37, 13.8079, 179.891, 3, 3, 3, 0, 0, 997.787, 0, 0, 3, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'PBomberos', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(99, 544, 1523.1, -1497.38, 13.8015, 180.269, 3, 3, 3, 0, 0, 956.431, 2097154, 0, 1, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'PBomberos', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(100, 470, 2775.75, -2433.03, 13.6366, 0, 1, 1, 6, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, '', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(101, 470, 2782.41, -2425.97, 13.6279, 178.854, 1, 1, 6, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, '', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(102, 470, 2787.19, -2426.17, 13.627, 177.752, 1, 1, 6, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, '', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(103, 470, 2788, -2446.63, 13.6293, 90.3334, 1, 1, 6, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, '', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(104, 470, 2778.34, -2425.81, 13.6298, 178.116, 1, 1, 6, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, '', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(105, 470, 2787.79, -2442.01, 13.6258, 90.7945, 1, 1, 6, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, '', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(106, 471, 2743.87, -2446.94, 13.1295, 270.742, 1, 160, 6, 0, 0, 1000, 0, 0, 0, 0, 17, 0, -1, '', 'Admin', 1, 0, 0, 0, 0, 0, 'Patriot', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(107, 471, 2743.75, -2445.15, 13.1127, 269.041, 1, 160, 6, 0, 0, 1000, 0, 0, 0, 0, 17, 0, -1, '', 'Admin', 1, 0, 0, 0, 0, 0, 'Patriot', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(108, 471, 2743.97, -2448.81, 13.1275, 270.506, 1, 160, 6, 0, 0, 1000, 0, 0, 0, 0, 17, 0, -1, '', 'Admin', 1, 0, 0, 0, 0, 0, 'Patriot', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(109, 471, 2744.35, -2456.79, 13.1305, 268.809, 1, 160, 6, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'Patriot', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(110, 468, 2760.25, -2434.67, 13.5189, 0, 160, 160, 998, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'Sanchez', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(111, 468, 2758.88, -2435.69, 13.5014, 0, 160, 160, 998, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'Sanchez', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(112, 468, 2757.11, -2436.78, 13.4824, 0, 160, 160, 998, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'Sanchez', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(113, 468, 2756.65, -2432.32, 13.4775, 0, 160, 160, 6, 0, 0, 1000, 0, 0, 0, 0, 16, 0, -1, '', 'Admin', 1, 0, 0, 0, 0, 0, 'Sanchez', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(114, 433, 2760.2, -2427.69, 13.5185, 0, 160, 160, 998, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'Barracks', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(115, 433, 2764.27, -2412.42, 14.361, 0, 160, 160, 998, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'Barracks', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(116, 453, 2694.81, -2593.56, 21.055, 0, 1, 160, 998, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'Reefer', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(117, 453, 2678.65, -2597.56, 21.055, 0, 1, 160, 998, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'Reefer', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(118, 548, 2788.44, -2348.3, 15.4701, 89.1668, 0, 0, 6, 0, 0, 1000, 0, 0, 0, 0, 100, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'Nevada', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(119, 548, 2756.2, -2347.78, 15.3153, 90.4401, 0, 0, 6, 0, 0, 1000, 0, 0, 0, 0, 99, 0, -1, '', 'Admin', 0, 0, 0, 0, 0, 0, 'Nevada', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(120, 447, 2694.89, -2579.49, 5.25097, 0, 0, 0, 6, 0, 0, 1000, 0, 0, 0, 0, 20, 0, -1, '', 'Admin', 1, 0, 0, 0, 0, 0, '', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(121, 447, 2684.2, -2577.18, 5.25097, 0, 0, 0, 6, 0, 0, 1000, 0, 0, 0, 0, 18, 0, -1, '', 'Admin', 1, 0, 0, 0, 0, 0, '', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(122, 520, 2825.37, -2535.45, 23.0483, 0, 0, 0, 6, 0, 0, 1000, 0, 0, 0, 0, 21, 0, -1, '', 'Admin', 1, 0, 0, 0, 0, 0, 'Hydra', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0'),
(123, 520, 2823.01, -2513.84, 23.0483, 0, 0, 0, 6, 0, 0, 1000, 0, 0, 0, 0, 19, 0, -1, '', 'Admin', 1, 0, 0, 0, 0, 0, 'Hydra', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
