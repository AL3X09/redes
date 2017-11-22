-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2017 a las 06:47:00
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `redes`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_consulta_datagrama` (IN `v_usuario` INT(11))  NO SQL
SELECT `id_data`, `version`, `cabecera`, `tipo_servicio`, `longitud`, `identificacion`, `flag`, `offset`, `ttl`, `protocolo`, `checksum`, `ip_envio`, `mensaje`, `ip_recibe`, `usuario` FROM `datagrama` WHERE `usuario` = v_usuario$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_consulta_mensaje` (IN `v_id_mensaje` INT(100), IN `v_usuario` INT(11))  NO SQL
SELECT `id_permi`, `id_mensaje`, `version`, `cabecera`, `tipo_servicio`, `longitud`, `identificacion`, `flag`, `offset`, `ttl`, `protocolo`, `checksum`, `ip_envio`, `mensaje`, `ip_recibe`, `usuario` 
FROM `permisos_usua` WHERE `id_mensaje` = v_id_mensaje AND `usuario` = v_usuario$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_consulta_permiso_usua` (IN `v_id_mensaje` INT)  NO SQL
SELECT `id_permi`, `id_mensaje`, `version`, `cabecera`, `tipo_servicio`, `longitud`, `identificacion`, `flag`, `offset`, `ttl`, `protocolo`, `checksum`, `ip_envio`, `mensaje`, `ip_recibe`, `usuario` FROM `permisos_usua` WHERE `id_mensaje` = v_id_mensaje$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertar_datagrama` (IN `v_version` INT(4), IN `v_cabecera` INT(100), IN `v_tipo_servicio` INT(100), IN `longitud` INT(100), IN `v_identificacion` INT(100), IN `v_flag` INT(100), IN `v_offset` INT(100), IN `v_ttl` INT(100), IN `v_protocolo` INT(100), IN `v_checksum` INT(100), IN `v_ip_envio` INT(100), IN `v_mensaje` INT(255), IN `v_ip_recibe` INT(100), IN `v_usuario` INT(11))  NO SQL
INSERT INTO `Datagrama`(`id_data`, `version`, `cabecera`, `tipo_servicio`, `longitud`, `identificacion`, `flag`, 
						`offset`, `ttl`, `protocolo`, `checksum`, `ip_envio`, `mensaje`, `ip_recibe`, `usuario`) 
				VALUES (null, v_version, v_cabecera, v_tipo_servicio, v_longitud, v_identificacion, v_flag, 
						v_offset, v_ttl, v_protocolo, v_checksum, v_ip_envio, v_mensaje, v_ip_recibe, v_usuario
                       )$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertar_mensaje` (IN `v_usuario` INT(11), IN `v_mensaje` VARCHAR(255), IN `v_checksum` VARCHAR(100), IN `v_Fecha_cre` DATE)  NO SQL
INSERT INTO `mensaje`(`id_mensaje`, `usuario`, `mensaje`, `checksum`, `Fecha_cre`) 
VALUES (null,v_usuario,v_mensaje,v_checksum,v_Fecha_cre)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertar_permi_usua` (IN `v_id_mensaje` INT(100), IN `v_version` VARCHAR(150), IN `v_cabecera` VARCHAR(150), IN `v_tipo_servicio` VARCHAR(150), IN `longitud` VARCHAR(150), IN `v_identificacion` VARCHAR(150), IN `v_flag` VARCHAR(150), IN `v_offset` VARCHAR(150), IN `v_ttl` VARCHAR(150), IN `v_protocolo` VARCHAR(150), IN `v_checksum` VARCHAR(150), IN `v_ip_envio` VARCHAR(150), IN `v_mensaje` VARCHAR(255), IN `v_ip_recibe` VARCHAR(150), IN `v_usuario` INT(11))  NO SQL
INSERT INTO `permisos_usua`(`id_permi`, `id_mensaje`, `version`, `cabecera`, `tipo_servicio`, `longitud`, `identificacion`, 
                            `flag`, `offset`, `ttl`, `protocolo`, `checksum`, `ip_envio`, `mensaje`, `ip_recibe`, `usuario`) 
VALUES (null,v_id_mensaje, v_version, v_cabecera, v_tipo_servicio, v_longitud, v_identificacion, v_flag, 
						v_offset, v_ttl, v_protocolo, v_checksum, v_ip_envio, v_mensaje, v_ip_recibe, v_usuario
                       )$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_estadoUsuario` (IN `pkusuario` INT)  NO SQL
UPDATE usuario AS U SET U.flestado=0
WHERE U.idusuario=pkusuario$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datagrama`
--

CREATE TABLE `datagrama` (
  `id_data` int(11) NOT NULL,
  `version` text NOT NULL,
  `cabecera` text NOT NULL,
  `tipo_servicio` text NOT NULL,
  `longitud` text NOT NULL,
  `identificacion` text NOT NULL,
  `flag` text NOT NULL,
  `offset` text NOT NULL,
  `ttl` text NOT NULL,
  `protocolo` text NOT NULL,
  `checksum` text NOT NULL,
  `ip_envio` text NOT NULL,
  `mensaje` text NOT NULL,
  `ip_recibe` text NOT NULL,
  `usuario` int(11) NOT NULL,
  `usu_datagrama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `datagrama`
--

INSERT INTO `datagrama` (`id_data`, `version`, `cabecera`, `tipo_servicio`, `longitud`, `identificacion`, `flag`, `offset`, `ttl`, `protocolo`, `checksum`, `ip_envio`, `mensaje`, `ip_recibe`, `usuario`, `usu_datagrama`) VALUES
(1, '0101', '0110', '00000001', '0000000000000010', '0000000000000010', '001', '0000000000100', '00000011', '00000010', '0000000000010011', '10111010-10010001-00100101-11010100', '01101000-01101111-01101100-01100001-00100000-01100001-01101100-01100101-01111000', '', 1, '00000001');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datagrama_has_msj`
--

CREATE TABLE `datagrama_has_msj` (
  `id_data_msj` int(11) NOT NULL,
  `id_datagrama` int(11) NOT NULL,
  `id_msj` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `datagrama_has_msj`
--

INSERT INTO `datagrama_has_msj` (`id_data_msj`, `id_datagrama`, `id_msj`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `id_mensaje` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `mensaje` varchar(255) NOT NULL,
  `checksum` int(100) NOT NULL,
  `Fecha_cre` datetime NOT NULL,
  `ip_envio` text NOT NULL,
  `estado_msj` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `mensaje`
--

INSERT INTO `mensaje` (`id_mensaje`, `usuario`, `mensaje`, `checksum`, `Fecha_cre`, `ip_envio`, `estado_msj`) VALUES
(1, 1, 'hola alex', 19, '2017-11-22 06:18:57', '186.145.37.212', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `idpermisos` int(11) NOT NULL,
  `cosecutivo` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`idpermisos`, `cosecutivo`, `nombre`) VALUES
(1, 1, 'ver'),
(2, 2, 'crear'),
(3, 3, 'editar'),
(4, 4, 'eliminar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos_usua`
--

CREATE TABLE `permisos_usua` (
  `id_permi` int(11) NOT NULL,
  `version` varchar(150) NOT NULL,
  `cabecera` varchar(150) NOT NULL,
  `tipo_servicio` varchar(150) NOT NULL,
  `longitud` varchar(150) NOT NULL,
  `identificacion` varchar(150) NOT NULL,
  `flag` varchar(150) NOT NULL,
  `offset` varchar(150) NOT NULL,
  `ttl` varchar(150) NOT NULL,
  `protocolo` varchar(150) NOT NULL,
  `checksum` varchar(150) NOT NULL,
  `ip_envio` varchar(150) NOT NULL,
  `mensaje` text NOT NULL,
  `usuario` int(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permisos_usua`
--

INSERT INTO `permisos_usua` (`id_permi`, `version`, `cabecera`, `tipo_servicio`, `longitud`, `identificacion`, `flag`, `offset`, `ttl`, `protocolo`, `checksum`, `ip_envio`, `mensaje`, `usuario`) VALUES
(1, '2', '2', '0', '2', '2', '1', '2', '3', '1', '16', '208.30.40.190', 'hola huanosmaosld m asndl dlkanldn', 1),
(2, '2', '2', '0', '3', '2', '1', '3', '3', '1', '20', '208.30.40.190', 'me llamljdnaklsnd,m sdknalkndlkaldsk', 1),
(3, '2', '2', '0', '3', '2', '1', '3', '3', '1', '20', '208.30.40.190', 'me llamljdnaklsnd,m sdknalkndlkaldsk', 1),
(4, '2', '2', '0', '2', '2', '1', '1', '1', '1', '14', '208.30.40.190', 'dslflsmdflmsñldmfs', 1),
(5, '2', '2', '0', '2', '2', '1', '1', '1', '1', '14', '208.30.40.190', 'dslflsmdflmsñldmfs', 1),
(6, '2', '2', '0', '2', '2', '1', '1', '2', '1', '14', '208.30.40.190', 'kdslsknfldmlsldsl', 1),
(7, '2', '2', '0', '2', '2', '1', '2', '2', '1', '14', '208.30.40.190', '2', 1),
(8, '2', '2', '0', '2', '2', '1', '2', '2', '1', '14', '208.30.40.190', '2', 1),
(9, '2', '2', '0', '2', '2', '1', '2', '2', '1', '14', '208.30.40.190', 'mlasndlasnkdna lakdlaknksdlasnd lkandlnalsn', 1),
(10, '2', '2', '0', '2', '2', '1', '2', '2', '1', '14', '208.30.40.190', 'ñlasddlkas lamñdañsmdña ldjsdasjdioeu', 1),
(11, '2', '2', '0', '2', '2', '1', '2', '2', '1', '14', '208.30.40.190', 'bla baldlansd nalsdnalsdl akndlakn', 1),
(12, '2', '2', '0', '2', '2', '1', '2', '2', '1', '14', '208.30.40.190', 'kdlnfsnd lkalsdaldn ansldajsndjans lkansdnasjdnaoijdj', 1),
(13, '3', '3', '1', '3', '3', '1', '3', '3', '2', '25', '208.30.40.190', 'ser o parecer', 1),
(14, '4', '5', '0', '2', '2', '1', '4', '3', '2', '17', '186.145.37.212', 'para liliana', 3),
(15, '2', '2', '1', '3', '4', '1', '4', '4', '4', '17', '186.145.37.212', 'mensajes laura', 4),
(16, '6', '6', '0', '2', '2', '1', '2', '2', '2', '16', '186.145.37.212', 'okok', 2),
(17, '3', '3', '0', '3', '4', '1', '3', '3', '2', '22', '186.145.37.212', 'ok', 2),
(18, '2', '3', '0', '3', '3', '1', '3', '3', '3', '25', '186.145.37.212', 'fsfdf', 3),
(19, '4', '4', '2', '4', '5', '1', '3', '3', '2', '21', '186.145.37.212', 'holas mijo', 4),
(20, '4', '4', '0', '3', '2', '1', '3', '3', '2', '20', '186.145.37.212', 'pokem', 3),
(21, '5', '6', '1', '2', '2', '1', '4', '3', '2', '19', '186.145.37.212', 'hola alex', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idroles` int(11) NOT NULL,
  `consecutivo` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idroles`, `consecutivo`, `nombre`) VALUES
(1, 1, 'Administrador'),
(2, 2, 'Eliminar'),
(3, 3, 'Andrea'),
(15, 15, 'Cliente'),
(17, 17, 'contratista'),
(18, 6, 'PRUEBA'),
(19, 7, 'FDF'),
(20, 8, 'Mensajero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_has_permisos`
--

CREATE TABLE `roles_has_permisos` (
  `fkroles` int(11) NOT NULL,
  `fkpermisos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles_has_permisos`
--

INSERT INTO `roles_has_permisos` (`fkroles`, `fkpermisos`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 2),
(2, 3),
(2, 4),
(3, 1),
(3, 2),
(15, 1),
(17, 1),
(18, 1),
(18, 3),
(19, 1),
(20, 1),
(20, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `consecutivo` int(11) NOT NULL,
  `nombre1` varchar(45) NOT NULL,
  `nombre2` varchar(45) DEFAULT NULL,
  `apellido1` varchar(45) NOT NULL,
  `apellido2` varchar(45) DEFAULT NULL,
  `identificacion` bigint(20) NOT NULL,
  `celular` int(11) DEFAULT NULL,
  `usuario` varchar(45) NOT NULL,
  `contrasenia` varchar(45) NOT NULL,
  `flestado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `consecutivo`, `nombre1`, `nombre2`, `apellido1`, `apellido2`, `identificacion`, `celular`, `usuario`, `contrasenia`, `flestado`) VALUES
(1, 2, 'Alex', '', 'Cifuentes', 'Sanchez', 96497432201, 2147483647, 'AL3X', '11223344', '1'),
(2, 1, 'ELhoy', 'SA', 'SDA', 'SSDA', 2324, 32423, 'ELIMINEk', '11223344', '1'),
(3, 2, 'Lina', 'Alejandra', 'Rodriguez', 'Garcia', 10327889987, 2147483647, 'lina', '1234', '1'),
(4, 3, 'Laura', 'Marcela', 'Prieto', 'Gomez', 1029876674, 2147483647, 'lau', '123456', '1'),
(5, 4, 'Laura', 'Marcela', 'Prieto', 'Gomez', 1029876674, 2147483647, 'lau', '123456', '1'),
(6, 5, 'Laura', 'Marcela', 'Prieto', 'Gomez', 1029876674, 2147483647, 'lau', '12345678', '1'),
(7, 6, 'Laura', 'Marcela', 'Prieto', 'Gomez', 1029876674, 2147483647, 'lau', '12345678', '1'),
(8, 7, 'name', '', 'j', '', 3737372838, 2147483647, 'leidy', '12345678', '1'),
(9, 8, 'Andres', 'Manuel', 'Garcia', 'Romero', 1024356789, 2147483647, 'andres', '12345678', '1'),
(10, 9, 'Camila', 'Andrea', 'Linares', 'Albarracin', 1024567765, 2147483647, 'cami', '12345678', '1'),
(11, 10, 'juliana', 'Andrea', 'estrada', 'galvis', 1032456765, 10326578, 'juli', '12345678', '1'),
(12, 11, 'Andres ', 'Felipe', 'Romero', 'Albarracin', 1123456, 2147483647, 'and', '12345678', '1'),
(13, 12, 'Tatiana', '', 'Andrade ', 'Danut', 1098789766, 310234543, 'tato', '12345678', '0'),
(14, 13, 'Camilo', 'Andres', 'Prieto', 'niño', 1023456654, 2147483647, 'cam', '12345678', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_has_roles`
--

CREATE TABLE `usuario_has_roles` (
  `fkusuario` int(11) NOT NULL,
  `fkroles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario_has_roles`
--

INSERT INTO `usuario_has_roles` (`fkusuario`, `fkroles`) VALUES
(1, 1),
(2, 20),
(3, 15),
(4, 17),
(5, 17),
(6, 17),
(7, 17),
(8, 15),
(9, 20),
(10, 15),
(11, 19),
(12, 17),
(13, 18),
(14, 15);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datagrama`
--
ALTER TABLE `datagrama`
  ADD PRIMARY KEY (`id_data`),
  ADD KEY `usuario_data` (`usuario`);

--
-- Indices de la tabla `datagrama_has_msj`
--
ALTER TABLE `datagrama_has_msj`
  ADD PRIMARY KEY (`id_data_msj`);

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`id_mensaje`),
  ADD KEY `usuario_mensaje` (`usuario`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`idpermisos`);

--
-- Indices de la tabla `permisos_usua`
--
ALTER TABLE `permisos_usua`
  ADD PRIMARY KEY (`id_permi`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idroles`);

--
-- Indices de la tabla `roles_has_permisos`
--
ALTER TABLE `roles_has_permisos`
  ADD PRIMARY KEY (`fkroles`,`fkpermisos`),
  ADD KEY `fk_roles_has_permisos_permisos1_idx` (`fkpermisos`),
  ADD KEY `fk_roles_has_permisos_roles_idx` (`fkroles`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- Indices de la tabla `usuario_has_roles`
--
ALTER TABLE `usuario_has_roles`
  ADD PRIMARY KEY (`fkusuario`,`fkroles`),
  ADD KEY `fk_usuario_has_roles_roles1_idx` (`fkroles`),
  ADD KEY `fk_usuario_has_roles_usuario1_idx` (`fkusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datagrama`
--
ALTER TABLE `datagrama`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `datagrama_has_msj`
--
ALTER TABLE `datagrama_has_msj`
  MODIFY `id_data_msj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idpermisos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `permisos_usua`
--
ALTER TABLE `permisos_usua`
  MODIFY `id_permi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idroles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `datagrama`
--
ALTER TABLE `datagrama`
  ADD CONSTRAINT `usuario_data` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`idusuario`);

--
-- Filtros para la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD CONSTRAINT `usuario_mensaje` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`idusuario`);

--
-- Filtros para la tabla `permisos_usua`
--
ALTER TABLE `permisos_usua`
  ADD CONSTRAINT `usuario` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`idusuario`);

--
-- Filtros para la tabla `roles_has_permisos`
--
ALTER TABLE `roles_has_permisos`
  ADD CONSTRAINT `fk_roles_has_permisos_permisos1` FOREIGN KEY (`fkpermisos`) REFERENCES `permisos` (`idpermisos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_roles_has_permisos_roles` FOREIGN KEY (`fkroles`) REFERENCES `roles` (`idroles`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_has_roles`
--
ALTER TABLE `usuario_has_roles`
  ADD CONSTRAINT `fk_usuario_has_roles_roles1` FOREIGN KEY (`fkroles`) REFERENCES `roles` (`idroles`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_has_roles_usuario1` FOREIGN KEY (`fkusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
