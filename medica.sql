-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 18-08-2021 a las 00:46:07
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
-- Base de datos: `medica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `med_citas`
--

CREATE TABLE `med_citas` (
  `id` int(11) NOT NULL,
  `cod_cita` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `id_paciente_fk` int(11) NOT NULL,
  `id_medico_fk` int(11) NOT NULL,
  `fec_cita` date NOT NULL,
  `hora_cita` time NOT NULL,
  `motivo` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `med_citas`
--

INSERT INTO `med_citas` (`id`, `cod_cita`, `id_paciente_fk`, `id_medico_fk`, `fec_cita`, `hora_cita`, `motivo`) VALUES
(1, 'CTA-000001', 2, 1, '2021-08-24', '19:19:12', 'REVISION DE DIAGNOSTICO MENSUAL'),
(3, 'CTA-000001', 2, 1, '2021-08-17', '19:50:59', 'PRUEBA'),
(4, 'CTA-000002', 2, 1, '1990-01-01', '00:00:00', 'ESTO ES UNA PRUEBA SOLAMENTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `med_citas_estatus`
--

CREATE TABLE `med_citas_estatus` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `med_citas_estatus`
--

INSERT INTO `med_citas_estatus` (`id`, `descripcion`) VALUES
(1, 'PROGRAMADA'),
(2, 'CULMINADA'),
(3, 'SIN CULMINAR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `med_citas_hist`
--

CREATE TABLE `med_citas_hist` (
  `id` int(11) NOT NULL,
  `id_cita_fk` int(11) NOT NULL,
  `fec_asg_sts` date NOT NULL,
  `id_estatus_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `med_citas_hist`
--

INSERT INTO `med_citas_hist` (`id`, `id_cita_fk`, `fec_asg_sts`, `id_estatus_fk`) VALUES
(1, 1, '2021-08-25', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `med_diagnosticos`
--

CREATE TABLE `med_diagnosticos` (
  `id` int(11) NOT NULL,
  `id_cita_fk` int(11) NOT NULL,
  `id_patologia_fk` int(11) NOT NULL,
  `desc_diagnostico` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `med_pagos`
--

CREATE TABLE `med_pagos` (
  `id` int(11) NOT NULL,
  `id_paciente_fk` int(11) NOT NULL,
  `fec_pago` date NOT NULL,
  `hora_pago` time NOT NULL,
  `motivo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `monto` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `med_patologias`
--

CREATE TABLE `med_patologias` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `med_patologias`
--

INSERT INTO `med_patologias` (`id`, `descripcion`) VALUES
(1, 'GASTRITIS'),
(2, 'ESCABIOSIS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `med_patologias_personas`
--

CREATE TABLE `med_patologias_personas` (
  `id` int(11) NOT NULL,
  `id_persona_fk` int(11) NOT NULL,
  `id_patologia_fk` int(11) NOT NULL,
  `fec_diagnostico` date NOT NULL,
  `id_medico_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `med_personas`
--

CREATE TABLE `med_personas` (
  `id` int(11) NOT NULL,
  `ced_ide` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `sexo` int(11) NOT NULL,
  `fec_nac` date NOT NULL,
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `med_personas`
--

INSERT INTO `med_personas` (`id`, `ced_ide`, `nombre`, `apellido`, `correo`, `telefono`, `direccion`, `sexo`, `fec_nac`, `id_tipo`) VALUES
(1, '23445978', 'JUAN DIEGO', 'RINCON URDANETA', 'jd.rincon021@gmail.com', '(0414) - 6801859', 'AV LA LIMPIA', 1, '1994-12-13', 1),
(2, '24734747', 'HANG', 'VOIGTH', 'chicagoPd@gmail.com', '(0412)-0000001', 'CHICAGO BARRIO COREANO', 1, '2020-11-03', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `med_rol`
--

CREATE TABLE `med_rol` (
  `id` int(11) NOT NULL,
  `des_rol` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `med_rol`
--

INSERT INTO `med_rol` (`id`, `des_rol`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'MEDICO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `med_tipo_personas`
--

CREATE TABLE `med_tipo_personas` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `med_tipo_personas`
--

INSERT INTO `med_tipo_personas` (`id`, `descripcion`) VALUES
(1, 'MEDICO'),
(2, 'PACIENTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `med_usuarios`
--

CREATE TABLE `med_usuarios` (
  `id` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `username` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `pwd` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `med_usuarios`
--

INSERT INTO `med_usuarios` (`id`, `id_persona`, `username`, `pwd`, `rol`) VALUES
(1, 1, 'jdrincon', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `med_citas`
--
ALTER TABLE `med_citas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `med_citas_estatus`
--
ALTER TABLE `med_citas_estatus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `med_citas_hist`
--
ALTER TABLE `med_citas_hist`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `med_diagnosticos`
--
ALTER TABLE `med_diagnosticos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `med_pagos`
--
ALTER TABLE `med_pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `med_patologias`
--
ALTER TABLE `med_patologias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `med_patologias_personas`
--
ALTER TABLE `med_patologias_personas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `med_personas`
--
ALTER TABLE `med_personas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `med_rol`
--
ALTER TABLE `med_rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `med_tipo_personas`
--
ALTER TABLE `med_tipo_personas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `med_usuarios`
--
ALTER TABLE `med_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `med_citas`
--
ALTER TABLE `med_citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `med_citas_estatus`
--
ALTER TABLE `med_citas_estatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `med_citas_hist`
--
ALTER TABLE `med_citas_hist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `med_diagnosticos`
--
ALTER TABLE `med_diagnosticos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `med_pagos`
--
ALTER TABLE `med_pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `med_patologias`
--
ALTER TABLE `med_patologias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `med_patologias_personas`
--
ALTER TABLE `med_patologias_personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `med_personas`
--
ALTER TABLE `med_personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `med_rol`
--
ALTER TABLE `med_rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `med_tipo_personas`
--
ALTER TABLE `med_tipo_personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `med_usuarios`
--
ALTER TABLE `med_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
