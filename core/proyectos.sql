-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 02-08-2021 a las 02:05:20
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `py_activiades`
--

CREATE TABLE `py_activiades` (
  `id` int(11) NOT NULL,
  `id_objetivo` int(11) NOT NULL,
  `nom_act` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `fec_ini` date NOT NULL,
  `nivel_act` int(11) NOT NULL,
  `predesesor` int(11) NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `py_estatus`
--

CREATE TABLE `py_estatus` (
  `id` int(11) NOT NULL,
  `des_estatus` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `py_estatus`
--

INSERT INTO `py_estatus` (`id`, `des_estatus`) VALUES
(1, 'COMPLETADO/A'),
(2, 'CERRADO/A'),
(3, 'EN PROCESO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `py_gerencia`
--

CREATE TABLE `py_gerencia` (
  `id` int(11) NOT NULL,
  `des` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `py_gerencia`
--

INSERT INTO `py_gerencia` (`id`, `des`) VALUES
(1, 'INFORMATICA Y SISTEMAS'),
(2, 'RECURSOS HUMANOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `py_gerencia_lider`
--

CREATE TABLE `py_gerencia_lider` (
  `id` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `fec_asig` date NOT NULL,
  `id_proyecto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `py_objetivos`
--

CREATE TABLE `py_objetivos` (
  `id` int(11) NOT NULL,
  `nom_obj` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `des_obj` text COLLATE utf8_spanish_ci NOT NULL,
  `fec_ini` date NOT NULL,
  `fec_cul` date NOT NULL,
  `id_proyecto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `py_observaciones_act`
--

CREATE TABLE `py_observaciones_act` (
  `id` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `fec_reg` datetime NOT NULL,
  `id_persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `py_personas`
--

CREATE TABLE `py_personas` (
  `id` int(11) NOT NULL,
  `ced_ide` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `sexo` int(11) NOT NULL,
  `fec_nac` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `py_personas`
--

INSERT INTO `py_personas` (`id`, `ced_ide`, `nombre`, `apellido`, `correo`, `telefono`, `direccion`, `sexo`, `fec_nac`) VALUES
(1, '23445978', 'JUAN DIEGO', 'RINCON URDANETA', 'jd.rincon021@gmail.com', '(0414) - 6801859', 'AV LA LIMPIA', 1, '1994-12-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `py_personas_actividades`
--

CREATE TABLE `py_personas_actividades` (
  `id` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `fec_asig` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `py_proyectos`
--

CREATE TABLE `py_proyectos` (
  `id` int(11) NOT NULL,
  `nom_pro` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `des_pro` text COLLATE utf8_spanish_ci NOT NULL,
  `fec_reg` date NOT NULL,
  `fec_ini` date NOT NULL,
  `fec_cul` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `py_rol`
--

CREATE TABLE `py_rol` (
  `id` int(11) NOT NULL,
  `des_rol` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `py_rol`
--

INSERT INTO `py_rol` (`id`, `des_rol`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'LIDER');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `py_usuarios`
--

CREATE TABLE `py_usuarios` (
  `id` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `username` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `pwd` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `py_usuarios`
--

INSERT INTO `py_usuarios` (`id`, `id_persona`, `username`, `pwd`, `rol`) VALUES
(1, 1, 'jdrincon', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `py_activiades`
--
ALTER TABLE `py_activiades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `py_estatus`
--
ALTER TABLE `py_estatus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `py_gerencia`
--
ALTER TABLE `py_gerencia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `py_gerencia_lider`
--
ALTER TABLE `py_gerencia_lider`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `py_objetivos`
--
ALTER TABLE `py_objetivos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `py_observaciones_act`
--
ALTER TABLE `py_observaciones_act`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `py_personas`
--
ALTER TABLE `py_personas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `py_personas_actividades`
--
ALTER TABLE `py_personas_actividades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `py_proyectos`
--
ALTER TABLE `py_proyectos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `py_rol`
--
ALTER TABLE `py_rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `py_usuarios`
--
ALTER TABLE `py_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `py_activiades`
--
ALTER TABLE `py_activiades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `py_estatus`
--
ALTER TABLE `py_estatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `py_gerencia`
--
ALTER TABLE `py_gerencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `py_gerencia_lider`
--
ALTER TABLE `py_gerencia_lider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `py_objetivos`
--
ALTER TABLE `py_objetivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `py_observaciones_act`
--
ALTER TABLE `py_observaciones_act`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `py_personas`
--
ALTER TABLE `py_personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `py_personas_actividades`
--
ALTER TABLE `py_personas_actividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `py_proyectos`
--
ALTER TABLE `py_proyectos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `py_rol`
--
ALTER TABLE `py_rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `py_usuarios`
--
ALTER TABLE `py_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
