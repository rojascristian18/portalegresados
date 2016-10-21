-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-10-2016 a las 17:35:57
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `manpower_exalumnos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mp_administradores`
--

CREATE TABLE IF NOT EXISTS `mp_administradores` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `pregunta_id` bigint(20) DEFAULT NULL,
  `perfil_id` bigint(20) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `fono` varchar(20) DEFAULT NULL,
  `celular` varchar(12) DEFAULT NULL,
  `respuesta` varchar(100) NOT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `notificar_empleo` tinyint(1) NOT NULL DEFAULT '0',
  `notificar_postulacion` tinyint(1) NOT NULL DEFAULT '0',
  `notificar_solicitud` tinyint(1) NOT NULL DEFAULT '0',
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `last_login` datetime NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_relationship_17` (`pregunta_id`),
  KEY `fk_relationship_22` (`perfil_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `mp_administradores`
--

INSERT INTO `mp_administradores` (`id`, `pregunta_id`, `perfil_id`, `nombre`, `apellido`, `email`, `clave`, `fono`, `celular`, `respuesta`, `imagen`, `notificar_empleo`, `notificar_postulacion`, `notificar_solicitud`, `activo`, `last_login`, `created`, `modified`) VALUES
(1, 1, 1, 'Desarrollo BrandOn', '', 'desarrollo@brandon.cl', '63a9bb53eb4dba22dc78398d295f1233a52a09b6', '', '', 'aa', NULL, 1, 0, 0, 1, '2036-01-01 00:00:00', '2016-10-13 11:53:13', '2016-10-20 12:11:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mp_anno_experiencias`
--

CREATE TABLE IF NOT EXISTS `mp_anno_experiencias` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `anno_experiencia` varchar(50) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `empleo_count` bigint(20) NOT NULL,
  `empleo_activo_count` bigint(20) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `mp_anno_experiencias`
--

INSERT INTO `mp_anno_experiencias` (`id`, `anno_experiencia`, `activo`, `empleo_count`, `empleo_activo_count`, `created`, `modified`) VALUES
(1, 'menos de 1 año', 1, 4, NULL, '2016-10-14 09:44:17', '2016-10-14 09:44:17'),
(2, '1 a 2 años', 1, 3, NULL, '2016-10-14 09:44:25', '2016-10-14 09:45:15'),
(3, '2 a 3 años', 1, 0, NULL, '2016-10-14 09:44:37', '2016-10-14 09:44:37'),
(4, '3 a 5 años', 1, 2, NULL, '2016-10-14 09:44:53', '2016-10-14 09:44:53'),
(5, '5 a 7 años', 1, 0, NULL, '2016-10-14 09:45:08', '2016-10-14 09:45:08'),
(6, '7 a 10 años', 1, 0, NULL, '2016-10-14 09:45:27', '2016-10-14 09:45:27'),
(7, 'más de 10 años', 1, 0, NULL, '2016-10-14 09:45:45', '2016-10-14 09:45:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mp_categorias`
--

CREATE TABLE IF NOT EXISTS `mp_categorias` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) DEFAULT NULL,
  `nombre` varchar(50) NOT NULL,
  `nombre_corto` varchar(70) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `empleo_count` bigint(20) NOT NULL,
  `empleo_activo_count` bigint(20) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `mp_categorias`
--

INSERT INTO `mp_categorias` (`id`, `parent_id`, `nombre`, `nombre_corto`, `activo`, `empleo_count`, `empleo_activo_count`, `created`, `modified`) VALUES
(1, NULL, 'Rubros', 'rubros', 1, 0, NULL, '2016-10-17 13:19:21', '2016-10-17 13:19:21'),
(2, 1, 'Administración de empresas', 'administracion_de_empresas', 1, 0, NULL, '2016-10-17 13:26:02', '2016-10-17 13:26:02'),
(3, 1, 'Finanzas', 'finanzas', 1, 0, NULL, '2016-10-17 13:31:38', '2016-10-17 13:31:38'),
(4, 1, 'Informática', 'informatica', 1, 0, NULL, '2016-10-20 11:38:54', '2016-10-20 11:38:54'),
(5, 1, 'Programación', 'programacion', 1, 0, NULL, '2016-10-20 11:39:45', '2016-10-20 11:39:45'),
(6, NULL, 'Carreras', 'carreras', 1, 0, NULL, '2016-10-20 11:41:58', '2016-10-20 11:41:58'),
(7, 6, 'Ingenería en informática', 'ingeneria_en_informatica', 1, 0, NULL, '2016-10-20 11:42:14', '2016-10-20 11:42:14'),
(8, 6, 'Administración de empresas', 'administracion_de_empresas', 1, 0, NULL, '2016-10-20 11:42:35', '2016-10-20 11:42:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mp_categorias_empleos`
--

CREATE TABLE IF NOT EXISTS `mp_categorias_empleos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `empleo_id` bigint(20) DEFAULT NULL,
  `categoria_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_mp_categorias_empleos` (`empleo_id`),
  KEY `fk_mp_categorias_empleos2` (`categoria_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mp_categorias_usuarios`
--

CREATE TABLE IF NOT EXISTS `mp_categorias_usuarios` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `usuario_id` bigint(20) DEFAULT NULL,
  `categoria_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_mp_categorias_usuarios` (`usuario_id`),
  KEY `fk_mp_categorias_usuarios2` (`categoria_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mp_categoria_estudios`
--

CREATE TABLE IF NOT EXISTS `mp_categoria_estudios` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) DEFAULT NULL,
  `nombre` varchar(50) NOT NULL,
  `nombre_corto` varchar(70) NOT NULL,
  `descripcion` text,
  `imagen` varchar(200) DEFAULT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mp_ciudades`
--

CREATE TABLE IF NOT EXISTS `mp_ciudades` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `region_id` bigint(20) DEFAULT NULL,
  `ciudad` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_relationship_3` (`region_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mp_comunas`
--

CREATE TABLE IF NOT EXISTS `mp_comunas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ciudad_id` bigint(20) DEFAULT NULL,
  `comuna` varchar(50) NOT NULL,
  `empresa_count` bigint(20) NOT NULL,
  `empleo_count` bigint(20) NOT NULL,
  `empleo_activo_count` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_relationship_9` (`ciudad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mp_configuraciones`
--

CREATE TABLE IF NOT EXISTS `mp_configuraciones` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `titulo_sitio` varchar(100) NOT NULL,
  `ediciones` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `mp_configuraciones`
--

INSERT INTO `mp_configuraciones` (`id`, `titulo_sitio`, `ediciones`) VALUES
(1, 'Portal Egresados Manpower', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mp_contrato_ofrecidos`
--

CREATE TABLE IF NOT EXISTS `mp_contrato_ofrecidos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `empleo_count` bigint(20) NOT NULL,
  `empleo_activo_count` bigint(20) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `mp_contrato_ofrecidos`
--

INSERT INTO `mp_contrato_ofrecidos` (`id`, `nombre`, `activo`, `empleo_count`, `empleo_activo_count`, `created`, `modified`) VALUES
(1, 'A plazo fijo', 1, 5, NULL, '2016-10-14 10:09:13', '2016-10-14 10:09:13'),
(2, 'Indefinido', 1, 2, NULL, '2016-10-14 10:09:26', '2016-10-14 10:09:26'),
(3, 'Freelancer', 1, 2, NULL, '2016-10-14 10:09:42', '2016-10-14 10:09:42'),
(4, 'Por proyecto', 1, 0, NULL, '2016-10-14 10:09:53', '2016-10-14 10:09:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mp_emails`
--

CREATE TABLE IF NOT EXISTS `mp_emails` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `estado` varchar(100) NOT NULL,
  `html` text NOT NULL,
  `asunto` varchar(200) NOT NULL,
  `destinatario_email` text NOT NULL,
  `destinatario_nombre` varchar(200) DEFAULT NULL,
  `remitente_email` varchar(200) NOT NULL,
  `remitente_nombre` varchar(200) DEFAULT NULL,
  `cc_email` text,
  `bcc_email` text,
  `traza` varchar(200) DEFAULT NULL,
  `proceso_origen` varchar(50) DEFAULT NULL,
  `procesado` tinyint(1) NOT NULL,
  `enviado` tinyint(1) NOT NULL,
  `reintentos` int(11) NOT NULL,
  `atachado` varchar(200) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Volcado de datos para la tabla `mp_emails`
--

INSERT INTO `mp_emails` (`id`, `estado`, `html`, `asunto`, `destinatario_email`, `destinatario_nombre`, `remitente_email`, `remitente_nombre`, `cc_email`, `bcc_email`, `traza`, `proceso_origen`, `procesado`, `enviado`, `reintentos`, `atachado`, `created`, `modified`) VALUES
(15, 'Empleo', '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">\n<html>\n<head>\n	<title>Emails\\html</title>\n</head>\n<body>\n	<table align="center" border="0" cellpadding="0" cellspacing="0" align="center" style="max-width: 600px; margin: 0 auto;">\r\n	<tr>\r\n		<td style="border-top: #dbdbdb 1px solid; border-right: #dbdbdb 1px solid; border-bottom: #dbdbdb 1px solid; padding-bottom: 0px; padding-top: 0px; padding-left: 0px; border-left: #dbdbdb 1px solid; padding-right: 0px; background-color: #feffff">\r\n			<table class=rtable style="width: 100%; padding: 15px;"cellspacing=0 cellpadding=0 align=left>\r\n				<tr>\r\n					<td><img src="/cake/manpower/exalumnos/img/../backend/img/template/logo-manpower-email.png" width="200" alt=""/></td>\r\n				</tr>\r\n				<tr style="height: 10px">\r\n					<td style="border-top: medium none; border-right: medium none; width: 100%; vertical-align: top; border-bottom: medium none; padding-bottom: 35px; text-align: center; padding-top: 35px; padding-left: 15px; border-left: medium none; padding-right: 15px; background-color: #feffff">\r\n						<p style="margin-bottom: 1em; font-size: 18px; font-family: arial, helvetica, sans-serif; color: #0A82AD; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\r\n							<strong>Nueva oferta de empleo recibida</strong>\r\n						</p>\r\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\r\n							Un nuevo empleo publicado por  necesita de su aprobación.\r\n						</p>\r\n						<ul style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; padding-left: 20px; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align="center">\r\n																							<li style="text-align: left;"><strong>Título: </strong>Desarrollador web</li>\r\n																														<li style="text-align: left;"><strong>Jornada laboral: </strong>PartTime</li>\r\n																							<li style="text-align: left;"><strong>Tipo de contrato: </strong>Freelancer</li>\r\n																							<li style="text-align: left;"><strong>Años de experiencia: </strong>3 a 5 años</li>\r\n																					<li style="text-align: left"><strong>Fecha de env&#237;o:</strong> 2016-10-17</li>\r\n							<li style="text-align: left"><strong>Hora de env&#237;o:</strong> 3:28 PM</li>\r\n						</ul>\r\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; padding-left: 0px; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>&#160;</p>\r\n						<a href="/cake/manpower/exalumnos/admin/empleos/view/87" style="background-color:#43AB86; font-size: 14px; font-family: arial, helvetica, sans-serif; color: #ffffff; padding: 5px 15px; text-decoration: none;">Gestionar oferta</a>					</td>\r\n				</tr>\r\n			</table>\r\n		</td>\r\n	</tr>\r\n</table>\n	<p>This email was sent using the <a href="http://cakephp.org">CakePHP Framework</a></p>\n</body>\n</html>', 'Nuevo empleo agregado:  - Desarrollador web', 'desarrollo@brandon.cl', 'Contactos Desarrollo BrandOn', 'leads@brandon.cl', 'Sistema portal egresados - ', '', 'leads@brandon.cl', NULL, NULL, 0, 0, 0, NULL, '2016-10-17 15:28:07', '2016-10-17 15:28:07'),
(16, 'Empleo', '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">\n<html>\n<head>\n	<title>Emails\\html</title>\n</head>\n<body>\n	<table align="center" border="0" cellpadding="0" cellspacing="0" align="center" style="max-width: 600px; margin: 0 auto;">\r\n	<tr>\r\n		<td style="border-top: #dbdbdb 1px solid; border-right: #dbdbdb 1px solid; border-bottom: #dbdbdb 1px solid; padding-bottom: 0px; padding-top: 0px; padding-left: 0px; border-left: #dbdbdb 1px solid; padding-right: 0px; background-color: #feffff">\r\n			<table class=rtable style="width: 100%; padding: 15px;"cellspacing=0 cellpadding=0 align=left>\r\n				<tr>\r\n					<td><img src="/cake/manpower/exalumnos/img/../backend/img/template/logo-manpower-email.png" width="200" alt=""/></td>\r\n				</tr>\r\n				<tr style="height: 10px">\r\n					<td style="border-top: medium none; border-right: medium none; width: 100%; vertical-align: top; border-bottom: medium none; padding-bottom: 35px; text-align: center; padding-top: 35px; padding-left: 15px; border-left: medium none; padding-right: 15px; background-color: #feffff">\r\n						<p style="margin-bottom: 1em; font-size: 18px; font-family: arial, helvetica, sans-serif; color: #0A82AD; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\r\n							<strong>Nueva oferta de empleo recibida</strong>\r\n						</p>\r\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\r\n							Un nuevo empleo publicado por  necesita de su aprobación.\r\n						</p>\r\n						<ul style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; padding-left: 20px; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align="center">\r\n																							<li style="text-align: left;"><strong>Título: </strong>Desarrollador web</li>\r\n																														<li style="text-align: left;"><strong>Jornada laboral: </strong>PartTime</li>\r\n																							<li style="text-align: left;"><strong>Tipo de contrato: </strong>Freelancer</li>\r\n																							<li style="text-align: left;"><strong>Años de experiencia: </strong>3 a 5 años</li>\r\n																					<li style="text-align: left"><strong>Fecha de env&#237;o:</strong> 2016-10-17</li>\r\n							<li style="text-align: left"><strong>Hora de env&#237;o:</strong> 3:29 PM</li>\r\n						</ul>\r\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; padding-left: 0px; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>&#160;</p>\r\n						<a href="/cake/manpower/exalumnos/admin/empleos/view/88" style="background-color:#43AB86; font-size: 14px; font-family: arial, helvetica, sans-serif; color: #ffffff; padding: 5px 15px; text-decoration: none;">Gestionar oferta</a>					</td>\r\n				</tr>\r\n			</table>\r\n		</td>\r\n	</tr>\r\n</table>\n	<p>This email was sent using the <a href="http://cakephp.org">CakePHP Framework</a></p>\n</body>\n</html>', 'Nuevo empleo agregado:  - Desarrollador web', 'desarrollo@brandon.cl', 'Contactos Desarrollo BrandOn', 'leads@brandon.cl', 'Sistema portal egresados - ', '', 'leads@brandon.cl', NULL, NULL, 0, 0, 0, NULL, '2016-10-17 15:29:02', '2016-10-17 15:29:02'),
(17, 'Empleo', '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">\n<html>\n<head>\n	<title>Emails\\html</title>\n</head>\n<body>\n	<table align="center" border="0" cellpadding="0" cellspacing="0" align="center" style="max-width: 600px; margin: 0 auto;">\r\n	<tr>\r\n		<td style="border-top: #dbdbdb 1px solid; border-right: #dbdbdb 1px solid; border-bottom: #dbdbdb 1px solid; padding-bottom: 0px; padding-top: 0px; padding-left: 0px; border-left: #dbdbdb 1px solid; padding-right: 0px; background-color: #feffff">\r\n			<table class=rtable style="width: 100%; padding: 15px;"cellspacing=0 cellpadding=0 align=left>\r\n				<tr>\r\n					<td><img src="/cake/manpower/exalumnos/img/../backend/img/template/logo-manpower-email.png" width="200" alt=""/></td>\r\n				</tr>\r\n				<tr style="height: 10px">\r\n					<td style="border-top: medium none; border-right: medium none; width: 100%; vertical-align: top; border-bottom: medium none; padding-bottom: 35px; text-align: center; padding-top: 35px; padding-left: 15px; border-left: medium none; padding-right: 15px; background-color: #feffff">\r\n						<p style="margin-bottom: 1em; font-size: 18px; font-family: arial, helvetica, sans-serif; color: #0A82AD; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\r\n							<strong>Nueva oferta de empleo recibida</strong>\r\n						</p>\r\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\r\n							Un nuevo empleo publicado por  necesita de su aprobación.\r\n						</p>\r\n						<ul style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; padding-left: 20px; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align="center">\r\n																							<li style="text-align: left;"><strong>Título: </strong>Desarrollador web</li>\r\n																														<li style="text-align: left;"><strong>Jornada laboral: </strong>FullTime</li>\r\n																							<li style="text-align: left;"><strong>Tipo de contrato: </strong>A plazo fijo</li>\r\n																							<li style="text-align: left;"><strong>Años de experiencia: </strong>1 a 2 años</li>\r\n																					<li style="text-align: left"><strong>Fecha de env&#237;o:</strong> 2016-10-17</li>\r\n							<li style="text-align: left"><strong>Hora de env&#237;o:</strong> 4:05 PM</li>\r\n						</ul>\r\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; padding-left: 0px; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>&#160;</p>\r\n						<a href="/cake/manpower/exalumnos/admin/empleos/view/89" style="background-color:#43AB86; font-size: 14px; font-family: arial, helvetica, sans-serif; color: #ffffff; padding: 5px 15px; text-decoration: none;">Gestionar oferta</a>					</td>\r\n				</tr>\r\n			</table>\r\n		</td>\r\n	</tr>\r\n</table>\n	<p>This email was sent using the <a href="http://cakephp.org">CakePHP Framework</a></p>\n</body>\n</html>', 'Nuevo empleo agregado:  - Desarrollador web', 'desarrollo@brandon.cl', 'Contactos Desarrollo BrandOn', 'leads@brandon.cl', 'Sistema portal egresados - ', '', 'leads@brandon.cl', NULL, NULL, 0, 0, 0, NULL, '2016-10-17 16:05:46', '2016-10-17 16:05:46'),
(18, 'Empleo', '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">\n<html>\n<head>\n	<title>Emails\\html</title>\n</head>\n<body>\n	<table align="center" border="0" cellpadding="0" cellspacing="0" align="center" style="max-width: 600px; margin: 0 auto;">\n	<tr>\n		<td style="border-top: #dbdbdb 1px solid; border-right: #dbdbdb 1px solid; border-bottom: #dbdbdb 1px solid; padding-bottom: 0px; padding-top: 0px; padding-left: 0px; border-left: #dbdbdb 1px solid; padding-right: 0px; background-color: #feffff">\n			<table class=rtable style="width: 100%; padding: 15px;"cellspacing=0 cellpadding=0 align=left>\n				<tr>\n					<td><img src="/cake/manpower/exalumnos/img/../backend/img/template/logo-manpower-email.png" width="200" alt=""/></td>\n				</tr>\n				<tr style="height: 10px">\n					<td style="border-top: medium none; border-right: medium none; width: 100%; vertical-align: top; border-bottom: medium none; padding-bottom: 35px; text-align: center; padding-top: 35px; padding-left: 15px; border-left: medium none; padding-right: 15px; background-color: #feffff">\n						<p style="margin-bottom: 1em; font-size: 18px; font-family: arial, helvetica, sans-serif; color: #0A82AD; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\n							<strong>Un empleo ha sido editado: Desarrollador web - Empresa 1</strong>\n						</p>\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\n							La empresa Empresa 1 ha editado su oferta de empleo con la siguiente información:						</p>\n						<ul style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; padding-left: 20px; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align="center">\n																<li style="text-align: left;"><strong>Empresa que publica: </strong>Empresa 1</li>\n																							<li style="text-align: left;"><strong>Título: </strong>Desarrollador web</li>\n																														<li style="text-align: left;"><strong>Jornada laboral: </strong>FullTime</li>\n																							<li style="text-align: left;"><strong>Tipo de contrato: </strong>A plazo fijo</li>\n																							<li style="text-align: left;"><strong>Años de experiencia: </strong>1 a 2 años</li>\n																					<li style="text-align: left"><strong>Fecha de env&#237;o:</strong> 2016-10-17</li>\n							<li style="text-align: left"><strong>Hora de env&#237;o:</strong> 4:05 PM</li>\n						</ul>\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; padding-left: 0px; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>&#160;</p>\n						<a href="/cake/manpower/exalumnos/admin/empleos/view/89" style="background-color:#43AB86; font-size: 14px; font-family: arial, helvetica, sans-serif; color: #ffffff; padding: 5px 15px; text-decoration: none;">Gestionar oferta</a>					</td>\n				</tr>\n			</table>\n		</td>\n	</tr>\n</table>\n	<p>This email was sent using the <a href="http://cakephp.org">CakePHP Framework</a></p>\n</body>\n</html>', 'Un empleo ha sido editado: Desarrollador web - Empresa 1', 'desarrollo@brandon.cl', 'Contactos Desarrollo BrandOn', 'leads@brandon.cl', 'Sistema portal egresados - Empresa 1', '', 'leads@brandon.cl', NULL, NULL, 0, 0, 0, NULL, '2016-10-17 16:31:47', '2016-10-17 16:31:47'),
(19, 'Empleo', '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">\n<html>\n<head>\n	<title>Emails\\html</title>\n</head>\n<body>\n	<table align="center" border="0" cellpadding="0" cellspacing="0" align="center" style="max-width: 600px; margin: 0 auto;">\n	<tr>\n		<td style="border-top: #dbdbdb 1px solid; border-right: #dbdbdb 1px solid; border-bottom: #dbdbdb 1px solid; padding-bottom: 0px; padding-top: 0px; padding-left: 0px; border-left: #dbdbdb 1px solid; padding-right: 0px; background-color: #feffff">\n			<table class=rtable style="width: 100%; padding: 15px;"cellspacing=0 cellpadding=0 align=left>\n				<tr>\n					<td><img src="/cake/manpower/exalumnos/img/../backend/img/template/logo-manpower-email.png" width="200" alt=""/></td>\n				</tr>\n				<tr style="height: 10px">\n					<td style="border-top: medium none; border-right: medium none; width: 100%; vertical-align: top; border-bottom: medium none; padding-bottom: 35px; text-align: center; padding-top: 35px; padding-left: 15px; border-left: medium none; padding-right: 15px; background-color: #feffff">\n						<p style="margin-bottom: 1em; font-size: 18px; font-family: arial, helvetica, sans-serif; color: #0A82AD; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\n							<strong>Su oferta de empleo ha sido recibida con éxito</strong>\n						</p>\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\n							Se le notificará por este medio cuando su empleo  Desarrollador web se encuentre publicado en el portal.						</p>\n						\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; padding-left: 0px; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>&#160;</p>\n						<a href="/cake/manpower/exalumnos/job/empleos/mis_ofertas/89" style="background-color:#43AB86; font-size: 14px; font-family: arial, helvetica, sans-serif; color: #ffffff; padding: 5px 15px; text-decoration: none;">Ver mi oferta</a>					</td>\n				</tr>\n			</table>\n		</td>\n	</tr>\n</table>\n	<p>This email was sent using the <a href="http://cakephp.org">CakePHP Framework</a></p>\n</body>\n</html>', 'Oferta de empleo recibida - Portal Egresados Manpower', 'empresa@email.com', 'Empresa 1', 'apps@brandon.cl', 'Manpower Portal Egresados', NULL, NULL, NULL, NULL, 0, 0, 0, NULL, '2016-10-17 16:31:47', '2016-10-17 16:31:47'),
(20, 'Empleo', '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">\n<html>\n<head>\n	<title>Emails\\html</title>\n</head>\n<body>\n	<table align="center" border="0" cellpadding="0" cellspacing="0" align="center" style="max-width: 600px; margin: 0 auto;">\n	<tr>\n		<td style="border-top: #dbdbdb 1px solid; border-right: #dbdbdb 1px solid; border-bottom: #dbdbdb 1px solid; padding-bottom: 0px; padding-top: 0px; padding-left: 0px; border-left: #dbdbdb 1px solid; padding-right: 0px; background-color: #feffff">\n			<table class=rtable style="width: 100%; padding: 15px;"cellspacing=0 cellpadding=0 align=left>\n				<tr>\n					<td><img src="/cake/manpower/exalumnos/img/../backend/img/template/logo-manpower-email.png" width="200" alt=""/></td>\n				</tr>\n				<tr style="height: 10px">\n					<td style="border-top: medium none; border-right: medium none; width: 100%; vertical-align: top; border-bottom: medium none; padding-bottom: 35px; text-align: center; padding-top: 35px; padding-left: 15px; border-left: medium none; padding-right: 15px; background-color: #feffff">\n						<p style="margin-bottom: 1em; font-size: 18px; font-family: arial, helvetica, sans-serif; color: #0A82AD; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\n							<strong>Oferta de empleo editada recibida</strong>\n						</p>\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\n							La empresa Empresa 1 ha editado su oferta de empleo con la siguiente información:						</p>\n						<ul style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; padding-left: 20px; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align="center">\n																<li style="text-align: left;"><strong>Empresa que publica: </strong>Empresa 1</li>\n																							<li style="text-align: left;"><strong>Título: </strong>Desarrollador web</li>\n																														<li style="text-align: left;"><strong>Jornada laboral: </strong>FullTime</li>\n																							<li style="text-align: left;"><strong>Tipo de contrato: </strong>A plazo fijo</li>\n																							<li style="text-align: left;"><strong>Años de experiencia: </strong>1 a 2 años</li>\n																					<li style="text-align: left"><strong>Fecha de env&#237;o:</strong> 2016-10-17</li>\n							<li style="text-align: left"><strong>Hora de env&#237;o:</strong> 4:05 PM</li>\n						</ul>\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; padding-left: 0px; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>&#160;</p>\n						<a href="/cake/manpower/exalumnos/admin/empleos/view/89/fullbase:1" style="background-color:#43AB86; font-size: 14px; font-family: arial, helvetica, sans-serif; color: #ffffff; padding: 5px 15px; text-decoration: none;">Gestionar oferta</a>					</td>\n				</tr>\n			</table>\n		</td>\n	</tr>\n</table>\n	<p>This email was sent using the <a href="http://cakephp.org">CakePHP Framework</a></p>\n</body>\n</html>', 'Un empleo ha sido editado: Desarrollador web - Empresa 1', 'desarrollo@brandon.cl', 'Contactos Desarrollo BrandOn', 'leads@brandon.cl', 'Sistema portal egresados - Empresa 1', '', 'leads@brandon.cl', NULL, NULL, 0, 0, 0, NULL, '2016-10-17 16:39:28', '2016-10-17 16:39:28'),
(21, 'Empleo', '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">\n<html>\n<head>\n	<title>Emails\\html</title>\n</head>\n<body>\n	<table align="center" border="0" cellpadding="0" cellspacing="0" align="center" style="max-width: 600px; margin: 0 auto;">\r\n	<tr>\r\n		<td style="border-top: #dbdbdb 1px solid; border-right: #dbdbdb 1px solid; border-bottom: #dbdbdb 1px solid; padding-bottom: 0px; padding-top: 0px; padding-left: 0px; border-left: #dbdbdb 1px solid; padding-right: 0px; background-color: #feffff">\r\n			<table class=rtable style="width: 100%; padding: 15px;"cellspacing=0 cellpadding=0 align=left>\r\n				<tr>\r\n					<td><img src="/cake/manpower/exalumnos/img/../backend/img/template/logo-manpower-email.png" width="200" alt=""/></td>\r\n				</tr>\r\n				<tr style="height: 10px">\r\n					<td style="border-top: medium none; border-right: medium none; width: 100%; vertical-align: top; border-bottom: medium none; padding-bottom: 35px; text-align: center; padding-top: 35px; padding-left: 15px; border-left: medium none; padding-right: 15px; background-color: #feffff">\r\n						<p style="margin-bottom: 1em; font-size: 18px; font-family: arial, helvetica, sans-serif; color: #0A82AD; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\r\n							<strong>Su oferta de empleo ha sido recibida con éxito</strong>\r\n						</p>\r\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\r\n							Su oferta de empleo será revisada y se le notificará por este medio cuando su empleo  Desarrollador web se encuentre publicado en el portal.						</p>\r\n						\r\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; padding-left: 0px; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>&#160;</p>\r\n						<a href="/cake/manpower/exalumnos/job/empleos/mis_ofertas/89/fullbase:1" style="background-color:#43AB86; font-size: 14px; font-family: arial, helvetica, sans-serif; color: #ffffff; padding: 5px 15px; text-decoration: none;">Ver mi oferta</a>					</td>\r\n				</tr>\r\n			</table>\r\n		</td>\r\n	</tr>\r\n</table>\n	<p>This email was sent using the <a href="http://cakephp.org">CakePHP Framework</a></p>\n</body>\n</html>', 'Oferta de empleo recibida - Portal Egresados Manpower', 'empresa@email.com', 'Empresa 1', 'apps@brandon.cl', 'Manpower Portal Egresados', NULL, NULL, NULL, NULL, 0, 0, 0, NULL, '2016-10-17 16:39:28', '2016-10-17 16:39:28'),
(22, 'Empleo', '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">\n<html>\n<head>\n	<title>Emails\\html</title>\n</head>\n<body>\n	<table align="center" border="0" cellpadding="0" cellspacing="0" align="center" style="max-width: 600px; margin: 0 auto;">\r\n	<tr>\r\n		<td style="border-top: #dbdbdb 1px solid; border-right: #dbdbdb 1px solid; border-bottom: #dbdbdb 1px solid; padding-bottom: 0px; padding-top: 0px; padding-left: 0px; border-left: #dbdbdb 1px solid; padding-right: 0px; background-color: #feffff">\r\n			<table class=rtable style="width: 100%; padding: 15px;"cellspacing=0 cellpadding=0 align=left>\r\n				<tr>\r\n					<td><img src="/cake/manpower/exalumnos/img/../backend/img/template/logo-manpower-email.png" width="200" alt=""/></td>\r\n				</tr>\r\n				<tr style="height: 10px">\r\n					<td style="border-top: medium none; border-right: medium none; width: 100%; vertical-align: top; border-bottom: medium none; padding-bottom: 35px; text-align: center; padding-top: 35px; padding-left: 15px; border-left: medium none; padding-right: 15px; background-color: #feffff">\r\n						<p style="margin-bottom: 1em; font-size: 18px; font-family: arial, helvetica, sans-serif; color: #0A82AD; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\r\n							<strong>Oferta de empleo editada recibida</strong>\r\n						</p>\r\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\r\n							La empresa Empresa 1 ha editado su oferta de empleo con la siguiente información:						</p>\r\n						<ul style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; padding-left: 20px; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align="center">\r\n																<li style="text-align: left;"><strong>Empresa que publica: </strong>Empresa 1</li>\r\n																							<li style="text-align: left;"><strong>Título: </strong>Desarrollador web</li>\r\n																														<li style="text-align: left;"><strong>Jornada laboral: </strong>PartTime</li>\r\n																							<li style="text-align: left;"><strong>Tipo de contrato: </strong>A plazo fijo</li>\r\n																							<li style="text-align: left;"><strong>Años de experiencia: </strong>1 a 2 años</li>\r\n																					<li style="text-align: left"><strong>Fecha de env&#237;o:</strong> 2016-10-17</li>\r\n							<li style="text-align: left"><strong>Hora de env&#237;o:</strong> 4:05 PM</li>\r\n						</ul>\r\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; padding-left: 0px; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>&#160;</p>\r\n						<a href="http://localhost/cake/manpower/exalumnos/admin/empleos/view/89" style="background-color:#43AB86; font-size: 14px; font-family: arial, helvetica, sans-serif; color: #ffffff; padding: 5px 15px; text-decoration: none;">Gestionar oferta</a>					</td>\r\n				</tr>\r\n			</table>\r\n		</td>\r\n	</tr>\r\n</table>\n	<p>This email was sent using the <a href="http://cakephp.org">CakePHP Framework</a></p>\n</body>\n</html>', 'Un empleo ha sido editado: Desarrollador web - Empresa 1', 'desarrollo@brandon.cl', 'Contactos Desarrollo BrandOn', 'leads@brandon.cl', 'Sistema portal egresados - Empresa 1', '', 'leads@brandon.cl', NULL, NULL, 0, 0, 0, NULL, '2016-10-17 16:44:25', '2016-10-17 16:44:25'),
(23, 'Empleo', '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">\n<html>\n<head>\n	<title>Emails\\html</title>\n</head>\n<body>\n	<table align="center" border="0" cellpadding="0" cellspacing="0" align="center" style="max-width: 600px; margin: 0 auto;">\r\n	<tr>\r\n		<td style="border-top: #dbdbdb 1px solid; border-right: #dbdbdb 1px solid; border-bottom: #dbdbdb 1px solid; padding-bottom: 0px; padding-top: 0px; padding-left: 0px; border-left: #dbdbdb 1px solid; padding-right: 0px; background-color: #feffff">\r\n			<table class=rtable style="width: 100%; padding: 15px;"cellspacing=0 cellpadding=0 align=left>\r\n				<tr>\r\n					<td><img src="/cake/manpower/exalumnos/img/../backend/img/template/logo-manpower-email.png" width="200" alt=""/></td>\r\n				</tr>\r\n				<tr style="height: 10px">\r\n					<td style="border-top: medium none; border-right: medium none; width: 100%; vertical-align: top; border-bottom: medium none; padding-bottom: 35px; text-align: center; padding-top: 35px; padding-left: 15px; border-left: medium none; padding-right: 15px; background-color: #feffff">\r\n						<p style="margin-bottom: 1em; font-size: 18px; font-family: arial, helvetica, sans-serif; color: #0A82AD; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\r\n							<strong>Su oferta de empleo ha sido recibida con éxito</strong>\r\n						</p>\r\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\r\n							Su oferta de empleo será revisada y se le notificará por este medio cuando su empleo  Desarrollador web se encuentre publicado en el portal.						</p>\r\n						\r\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; padding-left: 0px; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>&#160;</p>\r\n						<a href="http://localhost/cake/manpower/exalumnos/job/empleos/mis_ofertas/89" style="background-color:#43AB86; font-size: 14px; font-family: arial, helvetica, sans-serif; color: #ffffff; padding: 5px 15px; text-decoration: none;">Ver mi oferta</a>					</td>\r\n				</tr>\r\n			</table>\r\n		</td>\r\n	</tr>\r\n</table>\n	<p>This email was sent using the <a href="http://cakephp.org">CakePHP Framework</a></p>\n</body>\n</html>', 'Oferta de empleo recibida - Portal Egresados Manpower', 'empresa@email.com', 'Empresa 1', 'apps@brandon.cl', 'Manpower Portal Egresados', NULL, NULL, NULL, NULL, 0, 0, 0, NULL, '2016-10-17 16:44:25', '2016-10-17 16:44:25'),
(24, 'Empleo', '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">\n<html>\n<head>\n	<title>Emails\\html</title>\n</head>\n<body>\n	<table align="center" border="0" cellpadding="0" cellspacing="0" align="center" style="max-width: 600px; margin: 0 auto;">\r\n	<tr>\r\n		<td style="border-top: #dbdbdb 1px solid; border-right: #dbdbdb 1px solid; border-bottom: #dbdbdb 1px solid; padding-bottom: 0px; padding-top: 0px; padding-left: 0px; border-left: #dbdbdb 1px solid; padding-right: 0px; background-color: #feffff">\r\n			<table class=rtable style="width: 100%; padding: 15px;"cellspacing=0 cellpadding=0 align=left>\r\n				<tr>\r\n					<td><img src="/cake/manpower/exalumnos/img/../backend/img/template/logo-manpower-email.png" width="200" alt=""/></td>\r\n				</tr>\r\n				<tr style="height: 10px">\r\n					<td style="border-top: medium none; border-right: medium none; width: 100%; vertical-align: top; border-bottom: medium none; padding-bottom: 35px; text-align: center; padding-top: 35px; padding-left: 15px; border-left: medium none; padding-right: 15px; background-color: #feffff">\r\n						<p style="margin-bottom: 1em; font-size: 18px; font-family: arial, helvetica, sans-serif; color: #0A82AD; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\r\n							<strong>Oferta de empleo editada recibida</strong>\r\n						</p>\r\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\r\n							La empresa Empresa 1 ha editado su oferta de empleo con la siguiente información:						</p>\r\n						<ul style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; padding-left: 20px; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align="center">\r\n																<li style="text-align: left;"><strong>Empresa que publica: </strong>Empresa 1</li>\r\n																							<li style="text-align: left;"><strong>Título: </strong>Desarrollador web</li>\r\n																														<li style="text-align: left;"><strong>Jornada laboral: </strong>PartTime</li>\r\n																							<li style="text-align: left;"><strong>Tipo de contrato: </strong>A plazo fijo</li>\r\n																							<li style="text-align: left;"><strong>Años de experiencia: </strong>1 a 2 años</li>\r\n																					<li style="text-align: left"><strong>Fecha de env&#237;o:</strong> 2016-10-17</li>\r\n							<li style="text-align: left"><strong>Hora de env&#237;o:</strong> 4:05 PM</li>\r\n						</ul>\r\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; padding-left: 0px; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>&#160;</p>\r\n						<a href="http://localhost/cake/manpower/exalumnos/admin/empleos/view/89" style="background-color:#43AB86; font-size: 14px; font-family: arial, helvetica, sans-serif; color: #ffffff; padding: 5px 15px; text-decoration: none;">Gestionar oferta</a>					</td>\r\n				</tr>\r\n			</table>\r\n		</td>\r\n	</tr>\r\n</table>\n	<p>This email was sent using the <a href="http://cakephp.org">CakePHP Framework</a></p>\n</body>\n</html>', 'Un empleo ha sido editado: Desarrollador web - Empresa 1', 'desarrollo@brandon.cl', 'Contactos Desarrollo BrandOn', 'leads@brandon.cl', 'Sistema portal egresados - Empresa 1', '', 'leads@brandon.cl', NULL, NULL, 0, 0, 0, NULL, '2016-10-17 17:22:54', '2016-10-17 17:22:54'),
(25, 'Empleo', '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">\n<html>\n<head>\n	<title>Emails\\html</title>\n</head>\n<body>\n	<table align="center" border="0" cellpadding="0" cellspacing="0" align="center" style="max-width: 600px; margin: 0 auto;">\r\n	<tr>\r\n		<td style="border-top: #dbdbdb 1px solid; border-right: #dbdbdb 1px solid; border-bottom: #dbdbdb 1px solid; padding-bottom: 0px; padding-top: 0px; padding-left: 0px; border-left: #dbdbdb 1px solid; padding-right: 0px; background-color: #feffff">\r\n			<table class=rtable style="width: 100%; padding: 15px;"cellspacing=0 cellpadding=0 align=left>\r\n				<tr>\r\n					<td><img src="/cake/manpower/exalumnos/img/../backend/img/template/logo-manpower-email.png" width="200" alt=""/></td>\r\n				</tr>\r\n				<tr style="height: 10px">\r\n					<td style="border-top: medium none; border-right: medium none; width: 100%; vertical-align: top; border-bottom: medium none; padding-bottom: 35px; text-align: center; padding-top: 35px; padding-left: 15px; border-left: medium none; padding-right: 15px; background-color: #feffff">\r\n						<p style="margin-bottom: 1em; font-size: 18px; font-family: arial, helvetica, sans-serif; color: #0A82AD; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\r\n							<strong>Su oferta de empleo ha sido recibida con éxito</strong>\r\n						</p>\r\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\r\n							Su oferta de empleo será revisada y se le notificará por este medio cuando su empleo  Desarrollador web se encuentre publicado en el portal.						</p>\r\n						\r\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; padding-left: 0px; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>&#160;</p>\r\n						<a href="http://localhost/cake/manpower/exalumnos/job/empleos/mis_ofertas/89" style="background-color:#43AB86; font-size: 14px; font-family: arial, helvetica, sans-serif; color: #ffffff; padding: 5px 15px; text-decoration: none;">Ver mi oferta</a>					</td>\r\n				</tr>\r\n			</table>\r\n		</td>\r\n	</tr>\r\n</table>\n	<p>This email was sent using the <a href="http://cakephp.org">CakePHP Framework</a></p>\n</body>\n</html>', 'Oferta de empleo recibida - Portal Egresados Manpower', 'empresa@email.com', 'Empresa 1', 'apps@brandon.cl', 'Manpower Portal Egresados', NULL, NULL, NULL, NULL, 0, 0, 0, NULL, '2016-10-17 17:22:54', '2016-10-17 17:22:54'),
(26, 'Empleo', '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">\n<html>\n<head>\n	<title>Emails\\html</title>\n</head>\n<body>\n	<table align="center" border="0" cellpadding="0" cellspacing="0" align="center" style="max-width: 600px; margin: 0 auto;">\r\n	<tr>\r\n		<td style="border-top: #dbdbdb 1px solid; border-right: #dbdbdb 1px solid; border-bottom: #dbdbdb 1px solid; padding-bottom: 0px; padding-top: 0px; padding-left: 0px; border-left: #dbdbdb 1px solid; padding-right: 0px; background-color: #feffff">\r\n			<table class=rtable style="width: 100%; padding: 15px;"cellspacing=0 cellpadding=0 align=left>\r\n				<tr>\r\n					<td><img src="/cake/manpower/exalumnos/img/../backend/img/template/logo-manpower-email.png" width="200" alt=""/></td>\r\n				</tr>\r\n				<tr style="height: 10px">\r\n					<td style="border-top: medium none; border-right: medium none; width: 100%; vertical-align: top; border-bottom: medium none; padding-bottom: 35px; text-align: center; padding-top: 35px; padding-left: 15px; border-left: medium none; padding-right: 15px; background-color: #feffff">\r\n						<p style="margin-bottom: 1em; font-size: 18px; font-family: arial, helvetica, sans-serif; color: #0A82AD; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\r\n							<strong>Oferta de empleo editada recibida</strong>\r\n						</p>\r\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\r\n							La empresa Empresa 1 ha editado su oferta de empleo con la siguiente información:						</p>\r\n						<ul style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; padding-left: 20px; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align="center">\r\n																<li style="text-align: left;"><strong>Empresa que publica: </strong>Empresa 1</li>\r\n																							<li style="text-align: left;"><strong>Título: </strong>Desarrollador web</li>\r\n																														<li style="text-align: left;"><strong>Jornada laboral: </strong>PartTime</li>\r\n																							<li style="text-align: left;"><strong>Tipo de contrato: </strong>A plazo fijo</li>\r\n																							<li style="text-align: left;"><strong>Años de experiencia: </strong>1 a 2 años</li>\r\n																					<li style="text-align: left"><strong>Fecha de env&#237;o:</strong> 2016-10-17</li>\r\n							<li style="text-align: left"><strong>Hora de env&#237;o:</strong> 4:05 PM</li>\r\n						</ul>\r\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; padding-left: 0px; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>&#160;</p>\r\n						<a href="http://localhost/cake/manpower/exalumnos/admin/empleos/view/89" style="background-color:#43AB86; font-size: 14px; font-family: arial, helvetica, sans-serif; color: #ffffff; padding: 5px 15px; text-decoration: none;">Gestionar oferta</a>					</td>\r\n				</tr>\r\n			</table>\r\n		</td>\r\n	</tr>\r\n</table>\n	<p>This email was sent using the <a href="http://cakephp.org">CakePHP Framework</a></p>\n</body>\n</html>', 'Un empleo ha sido editado: Desarrollador web - Empresa 1', 'desarrollo@brandon.cl', 'Contactos Desarrollo BrandOn', 'leads@brandon.cl', 'Sistema portal egresados - Empresa 1', '', 'leads@brandon.cl', NULL, NULL, 0, 0, 0, NULL, '2016-10-17 17:30:59', '2016-10-17 17:30:59'),
(27, 'Empleo', '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">\n<html>\n<head>\n	<title>Emails\\html</title>\n</head>\n<body>\n	<table align="center" border="0" cellpadding="0" cellspacing="0" align="center" style="max-width: 600px; margin: 0 auto;">\r\n	<tr>\r\n		<td style="border-top: #dbdbdb 1px solid; border-right: #dbdbdb 1px solid; border-bottom: #dbdbdb 1px solid; padding-bottom: 0px; padding-top: 0px; padding-left: 0px; border-left: #dbdbdb 1px solid; padding-right: 0px; background-color: #feffff">\r\n			<table class=rtable style="width: 100%; padding: 15px;"cellspacing=0 cellpadding=0 align=left>\r\n				<tr>\r\n					<td><img src="/cake/manpower/exalumnos/img/../backend/img/template/logo-manpower-email.png" width="200" alt=""/></td>\r\n				</tr>\r\n				<tr style="height: 10px">\r\n					<td style="border-top: medium none; border-right: medium none; width: 100%; vertical-align: top; border-bottom: medium none; padding-bottom: 35px; text-align: center; padding-top: 35px; padding-left: 15px; border-left: medium none; padding-right: 15px; background-color: #feffff">\r\n						<p style="margin-bottom: 1em; font-size: 18px; font-family: arial, helvetica, sans-serif; color: #0A82AD; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\r\n							<strong>Su oferta de empleo ha sido recibida con éxito</strong>\r\n						</p>\r\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\r\n							Su oferta de empleo será revisada y se le notificará por este medio cuando su empleo  Desarrollador web se encuentre publicado en el portal.						</p>\r\n						\r\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; padding-left: 0px; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>&#160;</p>\r\n						<a href="http://localhost/cake/manpower/exalumnos/job/empleos/mis_ofertas/89" style="background-color:#43AB86; font-size: 14px; font-family: arial, helvetica, sans-serif; color: #ffffff; padding: 5px 15px; text-decoration: none;">Ver mi oferta</a>					</td>\r\n				</tr>\r\n			</table>\r\n		</td>\r\n	</tr>\r\n</table>\n	<p>This email was sent using the <a href="http://cakephp.org">CakePHP Framework</a></p>\n</body>\n</html>', 'Oferta de empleo recibida - Portal Egresados Manpower', 'empresa@email.com', 'Empresa 1', 'apps@brandon.cl', 'Manpower Portal Egresados', NULL, NULL, NULL, NULL, 0, 0, 0, NULL, '2016-10-17 17:30:59', '2016-10-17 17:30:59'),
(28, 'Empleo', '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">\n<html>\n<head>\n	<title>Emails\\html</title>\n</head>\n<body>\n	<table align="center" border="0" cellpadding="0" cellspacing="0" align="center" style="max-width: 600px; margin: 0 auto;">\r\n	<tr>\r\n		<td style="border-top: #dbdbdb 1px solid; border-right: #dbdbdb 1px solid; border-bottom: #dbdbdb 1px solid; padding-bottom: 0px; padding-top: 0px; padding-left: 0px; border-left: #dbdbdb 1px solid; padding-right: 0px; background-color: #feffff">\r\n			<table class=rtable style="width: 100%; padding: 15px;"cellspacing=0 cellpadding=0 align=left>\r\n				<tr>\r\n					<td><img src="/cake/manpower/exalumnos/img/../backend/img/template/logo-manpower-email.png" width="200" alt=""/></td>\r\n				</tr>\r\n				<tr style="height: 10px">\r\n					<td style="border-top: medium none; border-right: medium none; width: 100%; vertical-align: top; border-bottom: medium none; padding-bottom: 35px; text-align: center; padding-top: 35px; padding-left: 15px; border-left: medium none; padding-right: 15px; background-color: #feffff">\r\n						<p style="margin-bottom: 1em; font-size: 18px; font-family: arial, helvetica, sans-serif; color: #0A82AD; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\r\n							<strong>Oferta de empleo editada recibida</strong>\r\n						</p>\r\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\r\n							La empresa Empresa 1 ha editado su oferta de empleo con la siguiente información:						</p>\r\n						<ul style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; padding-left: 20px; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align="center">\r\n																<li style="text-align: left;"><strong>Empresa que publica: </strong>Empresa 1</li>\r\n																							<li style="text-align: left;"><strong>Título: </strong>Desarrollador web</li>\r\n																														<li style="text-align: left;"><strong>Jornada laboral: </strong>PartTime</li>\r\n																							<li style="text-align: left;"><strong>Tipo de contrato: </strong>A plazo fijo</li>\r\n																							<li style="text-align: left;"><strong>Años de experiencia: </strong>1 a 2 años</li>\r\n																					<li style="text-align: left"><strong>Fecha de env&#237;o:</strong> 2016-10-17</li>\r\n							<li style="text-align: left"><strong>Hora de env&#237;o:</strong> 4:05 PM</li>\r\n						</ul>\r\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; padding-left: 0px; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>&#160;</p>\r\n						<a href="http://localhost/cake/manpower/exalumnos/admin/empleos/view/89" style="background-color:#43AB86; font-size: 14px; font-family: arial, helvetica, sans-serif; color: #ffffff; padding: 5px 15px; text-decoration: none;">Gestionar oferta</a>					</td>\r\n				</tr>\r\n			</table>\r\n		</td>\r\n	</tr>\r\n</table>\n	<p>This email was sent using the <a href="http://cakephp.org">CakePHP Framework</a></p>\n</body>\n</html>', 'Un empleo ha sido editado: Desarrollador web - Empresa 1', 'desarrollo@brandon.cl', 'Contactos Desarrollo BrandOn', 'leads@brandon.cl', 'Sistema portal egresados - Empresa 1', '', 'leads@brandon.cl', NULL, NULL, 0, 0, 0, NULL, '2016-10-17 17:33:11', '2016-10-17 17:33:11'),
(29, 'Empleo', '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">\n<html>\n<head>\n	<title>Emails\\html</title>\n</head>\n<body>\n	<table align="center" border="0" cellpadding="0" cellspacing="0" align="center" style="max-width: 600px; margin: 0 auto;">\r\n	<tr>\r\n		<td style="border-top: #dbdbdb 1px solid; border-right: #dbdbdb 1px solid; border-bottom: #dbdbdb 1px solid; padding-bottom: 0px; padding-top: 0px; padding-left: 0px; border-left: #dbdbdb 1px solid; padding-right: 0px; background-color: #feffff">\r\n			<table class=rtable style="width: 100%; padding: 15px;"cellspacing=0 cellpadding=0 align=left>\r\n				<tr>\r\n					<td><img src="/cake/manpower/exalumnos/img/../backend/img/template/logo-manpower-email.png" width="200" alt=""/></td>\r\n				</tr>\r\n				<tr style="height: 10px">\r\n					<td style="border-top: medium none; border-right: medium none; width: 100%; vertical-align: top; border-bottom: medium none; padding-bottom: 35px; text-align: center; padding-top: 35px; padding-left: 15px; border-left: medium none; padding-right: 15px; background-color: #feffff">\r\n						<p style="margin-bottom: 1em; font-size: 18px; font-family: arial, helvetica, sans-serif; color: #0A82AD; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\r\n							<strong>Su oferta de empleo ha sido recibida con éxito</strong>\r\n						</p>\r\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\r\n							Su oferta de empleo será revisada y se le notificará por este medio cuando su empleo  Desarrollador web se encuentre publicado en el portal.						</p>\r\n						\r\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; padding-left: 0px; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>&#160;</p>\r\n						<a href="http://localhost/cake/manpower/exalumnos/job/empleos/mis_ofertas/89" style="background-color:#43AB86; font-size: 14px; font-family: arial, helvetica, sans-serif; color: #ffffff; padding: 5px 15px; text-decoration: none;">Ver mi oferta</a>					</td>\r\n				</tr>\r\n			</table>\r\n		</td>\r\n	</tr>\r\n</table>\n	<p>This email was sent using the <a href="http://cakephp.org">CakePHP Framework</a></p>\n</body>\n</html>', 'Oferta de empleo recibida - Portal Egresados Manpower', 'empresa@email.com', 'Empresa 1', 'apps@brandon.cl', 'Manpower Portal Egresados', NULL, NULL, NULL, NULL, 0, 0, 0, NULL, '2016-10-17 17:33:11', '2016-10-17 17:33:11');
INSERT INTO `mp_emails` (`id`, `estado`, `html`, `asunto`, `destinatario_email`, `destinatario_nombre`, `remitente_email`, `remitente_nombre`, `cc_email`, `bcc_email`, `traza`, `proceso_origen`, `procesado`, `enviado`, `reintentos`, `atachado`, `created`, `modified`) VALUES
(30, 'Empleo', '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">\n<html>\n<head>\n	<title>Emails\\html</title>\n</head>\n<body>\n	<table align="center" border="0" cellpadding="0" cellspacing="0" align="center" style="max-width: 600px; margin: 0 auto;">\r\n	<tr>\r\n		<td style="border-top: #dbdbdb 1px solid; border-right: #dbdbdb 1px solid; border-bottom: #dbdbdb 1px solid; padding-bottom: 0px; padding-top: 0px; padding-left: 0px; border-left: #dbdbdb 1px solid; padding-right: 0px; background-color: #feffff">\r\n			<table class=rtable style="width: 100%; padding: 15px;"cellspacing=0 cellpadding=0 align=left>\r\n				<tr>\r\n					<td><img src="/cake/manpower/exalumnos/img/../backend/img/template/logo-manpower-email.png" width="200" alt=""/></td>\r\n				</tr>\r\n				<tr style="height: 10px">\r\n					<td style="border-top: medium none; border-right: medium none; width: 100%; vertical-align: top; border-bottom: medium none; padding-bottom: 35px; text-align: center; padding-top: 35px; padding-left: 15px; border-left: medium none; padding-right: 15px; background-color: #feffff">\r\n						<p style="margin-bottom: 1em; font-size: 18px; font-family: arial, helvetica, sans-serif; color: #0A82AD; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\r\n							<strong>Oferta de empleo editada recibida</strong>\r\n						</p>\r\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\r\n							La empresa Empresa 1 ha editado su oferta de empleo con la siguiente información:						</p>\r\n						<ul style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; padding-left: 20px; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align="center">\r\n																<li style="text-align: left;"><strong>Empresa que publica: </strong>Empresa 1</li>\r\n																							<li style="text-align: left;"><strong>Título: </strong>Desarrollador web</li>\r\n																														<li style="text-align: left;"><strong>Jornada laboral: </strong>PartTime</li>\r\n																							<li style="text-align: left;"><strong>Tipo de contrato: </strong>A plazo fijo</li>\r\n																							<li style="text-align: left;"><strong>Años de experiencia: </strong>1 a 2 años</li>\r\n																					<li style="text-align: left"><strong>Fecha de env&#237;o:</strong> 2016-10-17</li>\r\n							<li style="text-align: left"><strong>Hora de env&#237;o:</strong> 4:05 PM</li>\r\n						</ul>\r\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; padding-left: 0px; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>&#160;</p>\r\n						<a href="http://localhost/cake/manpower/exalumnos/admin/empleos/view/89" style="background-color:#43AB86; font-size: 14px; font-family: arial, helvetica, sans-serif; color: #ffffff; padding: 5px 15px; text-decoration: none;">Gestionar oferta</a>					</td>\r\n				</tr>\r\n			</table>\r\n		</td>\r\n	</tr>\r\n</table>\n	<p>This email was sent using the <a href="http://cakephp.org">CakePHP Framework</a></p>\n</body>\n</html>', 'Un empleo ha sido editado: Desarrollador web - Empresa 1', 'desarrollo@brandon.cl', 'Contactos Desarrollo BrandOn', 'leads@brandon.cl', 'Sistema portal egresados - Empresa 1', '', 'leads@brandon.cl', NULL, NULL, 0, 0, 0, NULL, '2016-10-17 17:58:49', '2016-10-17 17:58:49'),
(31, 'Empleo', '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">\n<html>\n<head>\n	<title>Emails\\html</title>\n</head>\n<body>\n	<table align="center" border="0" cellpadding="0" cellspacing="0" align="center" style="max-width: 600px; margin: 0 auto;">\r\n	<tr>\r\n		<td style="border-top: #dbdbdb 1px solid; border-right: #dbdbdb 1px solid; border-bottom: #dbdbdb 1px solid; padding-bottom: 0px; padding-top: 0px; padding-left: 0px; border-left: #dbdbdb 1px solid; padding-right: 0px; background-color: #feffff">\r\n			<table class=rtable style="width: 100%; padding: 15px;"cellspacing=0 cellpadding=0 align=left>\r\n				<tr>\r\n					<td><img src="/cake/manpower/exalumnos/img/../backend/img/template/logo-manpower-email.png" width="200" alt=""/></td>\r\n				</tr>\r\n				<tr style="height: 10px">\r\n					<td style="border-top: medium none; border-right: medium none; width: 100%; vertical-align: top; border-bottom: medium none; padding-bottom: 35px; text-align: center; padding-top: 35px; padding-left: 15px; border-left: medium none; padding-right: 15px; background-color: #feffff">\r\n						<p style="margin-bottom: 1em; font-size: 18px; font-family: arial, helvetica, sans-serif; color: #0A82AD; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\r\n							<strong>Su oferta de empleo ha sido recibida con éxito</strong>\r\n						</p>\r\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\r\n							Su oferta de empleo será revisada y se le notificará por este medio cuando su empleo  Desarrollador web se encuentre publicado en el portal.						</p>\r\n						\r\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; padding-left: 0px; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>&#160;</p>\r\n						<a href="http://localhost/cake/manpower/exalumnos/job/empleos/mis_ofertas/89" style="background-color:#43AB86; font-size: 14px; font-family: arial, helvetica, sans-serif; color: #ffffff; padding: 5px 15px; text-decoration: none;">Ver mi oferta</a>					</td>\r\n				</tr>\r\n			</table>\r\n		</td>\r\n	</tr>\r\n</table>\n	<p>This email was sent using the <a href="http://cakephp.org">CakePHP Framework</a></p>\n</body>\n</html>', 'Oferta de empleo recibida - Portal Egresados Manpower', 'empresa@email.com', 'Empresa 1', 'apps@brandon.cl', 'Manpower Portal Egresados', NULL, NULL, NULL, NULL, 0, 0, 0, NULL, '2016-10-17 17:58:49', '2016-10-17 17:58:49'),
(32, 'Empleo', '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">\n<html>\n<head>\n	<title>Emails\\html</title>\n</head>\n<body>\n	<table align="center" border="0" cellpadding="0" cellspacing="0" align="center" style="max-width: 600px; margin: 0 auto;">\r\n	<tr>\r\n		<td style="border-top: #dbdbdb 1px solid; border-right: #dbdbdb 1px solid; border-bottom: #dbdbdb 1px solid; padding-bottom: 0px; padding-top: 0px; padding-left: 0px; border-left: #dbdbdb 1px solid; padding-right: 0px; background-color: #feffff">\r\n			<table class=rtable style="width: 100%; padding: 15px;"cellspacing=0 cellpadding=0 align=left>\r\n				<tr>\r\n					<td><img src="/cake/manpower/exalumnos/img/../backend/img/template/logo-manpower-email.png" width="200" alt=""/></td>\r\n				</tr>\r\n				<tr style="height: 10px">\r\n					<td style="border-top: medium none; border-right: medium none; width: 100%; vertical-align: top; border-bottom: medium none; padding-bottom: 35px; text-align: center; padding-top: 35px; padding-left: 15px; border-left: medium none; padding-right: 15px; background-color: #feffff">\r\n						<p style="margin-bottom: 1em; font-size: 18px; font-family: arial, helvetica, sans-serif; color: #0A82AD; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\r\n							<strong>Nueva oferta de empleo recibida</strong>\r\n						</p>\r\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\r\n							Un nuevo empleo publicado por Empresa 1 necesita de su aprobación.						</p>\r\n						<ul style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; padding-left: 20px; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align="center">\r\n																<li style="text-align: left;"><strong>Empresa que publica: </strong>Empresa 1</li>\r\n																							<li style="text-align: left;"><strong>Título: </strong>Vendedor part-time</li>\r\n																														<li style="text-align: left;"><strong>Jornada laboral: </strong>PartTime</li>\r\n																							<li style="text-align: left;"><strong>Tipo de contrato: </strong>Indefinido</li>\r\n																							<li style="text-align: left;"><strong>Años de experiencia: </strong>1 a 2 años</li>\r\n																							<li style="text-align: left;"><strong>Sueldo ofrecido: </strong>320000</li>\r\n														<li style="text-align: left"><strong>Fecha de env&#237;o:</strong> 2016-10-18</li>\r\n							<li style="text-align: left"><strong>Hora de env&#237;o:</strong> 9:43 AM</li>\r\n						</ul>\r\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; padding-left: 0px; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>&#160;</p>\r\n						<a href="http://localhost/cake/manpower/exalumnos/admin/empleos/view/90" style="background-color:#43AB86; font-size: 14px; font-family: arial, helvetica, sans-serif; color: #ffffff; padding: 5px 15px; text-decoration: none;">Gestionar oferta</a>					</td>\r\n				</tr>\r\n			</table>\r\n		</td>\r\n	</tr>\r\n</table>\n	<p>This email was sent using the <a href="http://cakephp.org">CakePHP Framework</a></p>\n</body>\n</html>', 'Nuevo empleo agregado: Vendedor part-time - Empresa 1', 'desarrollo@brandon.cl', 'Contactos Desarrollo BrandOn', 'leads@brandon.cl', 'Sistema portal egresados - Empresa 1', '', 'leads@brandon.cl', NULL, NULL, 0, 0, 0, NULL, '2016-10-18 09:43:21', '2016-10-18 09:43:21'),
(33, 'Empleo', '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">\n<html>\n<head>\n	<title>Emails\\html</title>\n</head>\n<body>\n	<table align="center" border="0" cellpadding="0" cellspacing="0" align="center" style="max-width: 600px; margin: 0 auto;">\r\n	<tr>\r\n		<td style="border-top: #dbdbdb 1px solid; border-right: #dbdbdb 1px solid; border-bottom: #dbdbdb 1px solid; padding-bottom: 0px; padding-top: 0px; padding-left: 0px; border-left: #dbdbdb 1px solid; padding-right: 0px; background-color: #feffff">\r\n			<table class=rtable style="width: 100%; padding: 15px;"cellspacing=0 cellpadding=0 align=left>\r\n				<tr>\r\n					<td><img src="/cake/manpower/exalumnos/img/../backend/img/template/logo-manpower-email.png" width="200" alt=""/></td>\r\n				</tr>\r\n				<tr style="height: 10px">\r\n					<td style="border-top: medium none; border-right: medium none; width: 100%; vertical-align: top; border-bottom: medium none; padding-bottom: 35px; text-align: center; padding-top: 35px; padding-left: 15px; border-left: medium none; padding-right: 15px; background-color: #feffff">\r\n						<p style="margin-bottom: 1em; font-size: 18px; font-family: arial, helvetica, sans-serif; color: #0A82AD; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\r\n							<strong>Su oferta de empleo ha sido recibida con éxito</strong>\r\n						</p>\r\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\r\n							Se le notificará por este medio cuando su empleo Vendedor part-time se encuentre publicado en el portal.						</p>\r\n						\r\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; padding-left: 0px; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>&#160;</p>\r\n						<a href="http://localhost/cake/manpower/exalumnos/job/empleos/mis_ofertas/90" style="background-color:#43AB86; font-size: 14px; font-family: arial, helvetica, sans-serif; color: #ffffff; padding: 5px 15px; text-decoration: none;">Ver mi oferta</a>					</td>\r\n				</tr>\r\n			</table>\r\n		</td>\r\n	</tr>\r\n</table>\n	<p>This email was sent using the <a href="http://cakephp.org">CakePHP Framework</a></p>\n</body>\n</html>', 'Oferta de empleo recibida - Portal Egresados Manpower', 'empresa@email.com', 'Empresa 1', 'apps@brandon.cl', 'Manpower Portal Egresados', NULL, NULL, NULL, NULL, 0, 0, 0, NULL, '2016-10-18 09:43:21', '2016-10-18 09:43:21'),
(34, 'Empleo', '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">\n<html>\n<head>\n	<title>Emails\\html</title>\n</head>\n<body>\n	<table align="center" border="0" cellpadding="0" cellspacing="0" align="center" style="max-width: 600px; margin: 0 auto;">\r\n	<tr>\r\n		<td style="border-top: #dbdbdb 1px solid; border-right: #dbdbdb 1px solid; border-bottom: #dbdbdb 1px solid; padding-bottom: 0px; padding-top: 0px; padding-left: 0px; border-left: #dbdbdb 1px solid; padding-right: 0px; background-color: #feffff">\r\n			<table class=rtable style="width: 100%; padding: 15px;"cellspacing=0 cellpadding=0 align=left>\r\n				<tr>\r\n					<td><img src="/cake/manpower/exalumnos/img/../backend/img/template/logo-manpower-email.png" width="200" alt=""/></td>\r\n				</tr>\r\n				<tr style="height: 10px">\r\n					<td style="border-top: medium none; border-right: medium none; width: 100%; vertical-align: top; border-bottom: medium none; padding-bottom: 35px; text-align: center; padding-top: 35px; padding-left: 15px; border-left: medium none; padding-right: 15px; background-color: #feffff">\r\n						<p style="margin-bottom: 1em; font-size: 18px; font-family: arial, helvetica, sans-serif; color: #0A82AD; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\r\n							<strong>Nueva oferta de empleo recibida</strong>\r\n						</p>\r\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\r\n							Un nuevo empleo publicado por Empresa 1 necesita de su aprobación.						</p>\r\n						<ul style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; padding-left: 20px; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align="center">\r\n																<li style="text-align: left;"><strong>Empresa que publica: </strong>Empresa 1</li>\r\n																							<li style="text-align: left;"><strong>Título: </strong>Líder de proyectos</li>\r\n																														<li style="text-align: left;"><strong>Jornada laboral: </strong>FullTime</li>\r\n																							<li style="text-align: left;"><strong>Tipo de contrato: </strong>A plazo fijo</li>\r\n																							<li style="text-align: left;"><strong>Años de experiencia: </strong>menos de 1 año</li>\r\n																					<li style="text-align: left"><strong>Fecha de env&#237;o:</strong> 2016-10-18</li>\r\n							<li style="text-align: left"><strong>Hora de env&#237;o:</strong> 11:09 AM</li>\r\n						</ul>\r\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; padding-left: 0px; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>&#160;</p>\r\n						<a href="http://localhost/cake/manpower/exalumnos/admin/empleos/view/91" style="background-color:#43AB86; font-size: 14px; font-family: arial, helvetica, sans-serif; color: #ffffff; padding: 5px 15px; text-decoration: none;">Gestionar oferta</a>					</td>\r\n				</tr>\r\n			</table>\r\n		</td>\r\n	</tr>\r\n</table>\n	<p>This email was sent using the <a href="http://cakephp.org">CakePHP Framework</a></p>\n</body>\n</html>', 'Nuevo empleo agregado: Líder de proyectos - Empresa 1', 'desarrollo@brandon.cl', 'Contactos Desarrollo BrandOn', 'leads@brandon.cl', 'Sistema portal egresados - Empresa 1', '', 'leads@brandon.cl', NULL, NULL, 0, 0, 0, NULL, '2016-10-18 11:09:10', '2016-10-18 11:09:10'),
(35, 'Empleo', '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">\n<html>\n<head>\n	<title>Emails\\html</title>\n</head>\n<body>\n	<table align="center" border="0" cellpadding="0" cellspacing="0" align="center" style="max-width: 600px; margin: 0 auto;">\r\n	<tr>\r\n		<td style="border-top: #dbdbdb 1px solid; border-right: #dbdbdb 1px solid; border-bottom: #dbdbdb 1px solid; padding-bottom: 0px; padding-top: 0px; padding-left: 0px; border-left: #dbdbdb 1px solid; padding-right: 0px; background-color: #feffff">\r\n			<table class=rtable style="width: 100%; padding: 15px;"cellspacing=0 cellpadding=0 align=left>\r\n				<tr>\r\n					<td><img src="/cake/manpower/exalumnos/img/../backend/img/template/logo-manpower-email.png" width="200" alt=""/></td>\r\n				</tr>\r\n				<tr style="height: 10px">\r\n					<td style="border-top: medium none; border-right: medium none; width: 100%; vertical-align: top; border-bottom: medium none; padding-bottom: 35px; text-align: center; padding-top: 35px; padding-left: 15px; border-left: medium none; padding-right: 15px; background-color: #feffff">\r\n						<p style="margin-bottom: 1em; font-size: 18px; font-family: arial, helvetica, sans-serif; color: #0A82AD; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\r\n							<strong>Su oferta de empleo ha sido recibida con éxito</strong>\r\n						</p>\r\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\r\n							Se le notificará por este medio cuando su empleo Líder de proyectos se encuentre publicado en el portal.						</p>\r\n						\r\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; padding-left: 0px; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>&#160;</p>\r\n						<a href="http://localhost/cake/manpower/exalumnos/job/empleos/mis_ofertas/91" style="background-color:#43AB86; font-size: 14px; font-family: arial, helvetica, sans-serif; color: #ffffff; padding: 5px 15px; text-decoration: none;">Ver mi oferta</a>					</td>\r\n				</tr>\r\n			</table>\r\n		</td>\r\n	</tr>\r\n</table>\n	<p>This email was sent using the <a href="http://cakephp.org">CakePHP Framework</a></p>\n</body>\n</html>', 'Oferta de empleo recibida - Portal Egresados Manpower', 'empresa@email.com', 'Empresa 1', 'apps@brandon.cl', 'Manpower Portal Egresados', NULL, NULL, NULL, NULL, 0, 0, 0, NULL, '2016-10-18 11:09:10', '2016-10-18 11:09:10'),
(36, 'Empleo', '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">\n<html>\n<head>\n	<title>Emails\\html</title>\n</head>\n<body>\n	<table align="center" border="0" cellpadding="0" cellspacing="0" align="center" style="max-width: 600px; margin: 0 auto;">\n	<tr>\n		<td style="border-top: #dbdbdb 1px solid; border-right: #dbdbdb 1px solid; border-bottom: #dbdbdb 1px solid; padding-bottom: 0px; padding-top: 0px; padding-left: 0px; border-left: #dbdbdb 1px solid; padding-right: 0px; background-color: #feffff">\n			<table class=rtable style="width: 100%; padding: 15px;"cellspacing=0 cellpadding=0 align=left>\n				<tr>\n					<td><img src="/cake/manpower/exalumnos/img/../backend/img/template/logo-manpower-email.png" width="200" alt=""/></td>\n				</tr>\n				<tr style="height: 10px">\n					<td style="border-top: medium none; border-right: medium none; width: 100%; vertical-align: top; border-bottom: medium none; padding-bottom: 35px; text-align: center; padding-top: 35px; padding-left: 15px; border-left: medium none; padding-right: 15px; background-color: #feffff">\n						<p style="margin-bottom: 1em; font-size: 18px; font-family: arial, helvetica, sans-serif; color: #0A82AD; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\n							<strong>Su contraseña ha sido actualizada</strong>\n						</p>\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\n							Estimado/a Empresa 1 su nueva contraeña para ingresar a nuestro portal de egresados es: </br><center><strong>1476881984</strong></center>						</p>\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\n							Recuerde actualizarla posteriormente.						</p>\n						\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; padding-left: 0px; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>&#160;</p>\n						<a href="http://localhost/cake/manpower/exalumnos/businesses/login" style="background-color:#43AB86; font-size: 14px; font-family: arial, helvetica, sans-serif; color: #ffffff; padding: 5px 15px; text-decoration: none;">Ingresar al portal</a>					</td>\n				</tr>\n			</table>\n		</td>\n	</tr>\n</table>\n	<p>This email was sent using the <a href="http://cakephp.org">CakePHP Framework</a></p>\n</body>\n</html>', 'Recuperar contraseña - Portal Egresados Manpower', 'empresa@email.com', 'Empresa 1', 'apps@brandon.cl', 'Manpower Portal Egresados', NULL, NULL, NULL, NULL, 0, 0, 0, NULL, '2016-10-19 09:59:44', '2016-10-19 09:59:44'),
(37, 'Empleo', '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">\n<html>\n<head>\n	<title>Emails\\html</title>\n</head>\n<body>\n	<table align="center" border="0" cellpadding="0" cellspacing="0" align="center" style="max-width: 600px; margin: 0 auto;">\r\n	<tr>\r\n		<td style="border-top: #dbdbdb 1px solid; border-right: #dbdbdb 1px solid; border-bottom: #dbdbdb 1px solid; padding-bottom: 0px; padding-top: 0px; padding-left: 0px; border-left: #dbdbdb 1px solid; padding-right: 0px; background-color: #feffff">\r\n			<table class=rtable style="width: 100%; padding: 15px;"cellspacing=0 cellpadding=0 align=left>\r\n				<tr>\r\n					<td><img src="/cake/manpower/exalumnos/img/../backend/img/template/logo-manpower-email.png" width="200" alt=""/></td>\r\n				</tr>\r\n				<tr style="height: 10px">\r\n					<td style="border-top: medium none; border-right: medium none; width: 100%; vertical-align: top; border-bottom: medium none; padding-bottom: 35px; text-align: center; padding-top: 35px; padding-left: 15px; border-left: medium none; padding-right: 15px; background-color: #feffff">\r\n						<p style="margin-bottom: 1em; font-size: 18px; font-family: arial, helvetica, sans-serif; color: #0A82AD; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\r\n							<strong>Nueva oferta de empleo recibida</strong>\r\n						</p>\r\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\r\n							Un nuevo empleo publicado por Empresa 2 necesita de su aprobación.						</p>\r\n						<ul style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; padding-left: 20px; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align="center">\r\n																<li style="text-align: left;"><strong>Empresa que publica: </strong>Empresa 2</li>\r\n																							<li style="text-align: left;"><strong>Título: </strong>Programador web PHP</li>\r\n																														<li style="text-align: left;"><strong>Jornada laboral: </strong>FullTime</li>\r\n																							<li style="text-align: left;"><strong>Tipo de contrato: </strong>Indefinido</li>\r\n																							<li style="text-align: left;"><strong>Años de experiencia: </strong>1 a 2 años</li>\r\n																							<li style="text-align: left;"><strong>Sueldo ofrecido: </strong>300</li>\r\n														<li style="text-align: left"><strong>Fecha de env&#237;o:</strong> 2016-10-20</li>\r\n							<li style="text-align: left"><strong>Hora de env&#237;o:</strong> 11:37 AM</li>\r\n						</ul>\r\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; padding-left: 0px; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>&#160;</p>\r\n						<a href="http://localhost/cake/manpower/exalumnos/admin/empleos/view/92" style="background-color:#43AB86; font-size: 14px; font-family: arial, helvetica, sans-serif; color: #ffffff; padding: 5px 15px; text-decoration: none;">Gestionar oferta</a>					</td>\r\n				</tr>\r\n			</table>\r\n		</td>\r\n	</tr>\r\n</table>\n	<p>This email was sent using the <a href="http://cakephp.org">CakePHP Framework</a></p>\n</body>\n</html>', 'Nuevo empleo agregado: Programador web PHP - Empresa 2', 'desarrollo@brandon.cl', 'Contactos Desarrollo BrandOn', 'leads@brandon.cl', 'Sistema portal egresados - Empresa 2', '', 'leads@brandon.cl', NULL, NULL, 0, 0, 0, NULL, '2016-10-20 11:37:34', '2016-10-20 11:37:34'),
(38, 'Empleo', '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">\n<html>\n<head>\n	<title>Emails\\html</title>\n</head>\n<body>\n	<table align="center" border="0" cellpadding="0" cellspacing="0" align="center" style="max-width: 600px; margin: 0 auto;">\r\n	<tr>\r\n		<td style="border-top: #dbdbdb 1px solid; border-right: #dbdbdb 1px solid; border-bottom: #dbdbdb 1px solid; padding-bottom: 0px; padding-top: 0px; padding-left: 0px; border-left: #dbdbdb 1px solid; padding-right: 0px; background-color: #feffff">\r\n			<table class=rtable style="width: 100%; padding: 15px;"cellspacing=0 cellpadding=0 align=left>\r\n				<tr>\r\n					<td><img src="/cake/manpower/exalumnos/img/../backend/img/template/logo-manpower-email.png" width="200" alt=""/></td>\r\n				</tr>\r\n				<tr style="height: 10px">\r\n					<td style="border-top: medium none; border-right: medium none; width: 100%; vertical-align: top; border-bottom: medium none; padding-bottom: 35px; text-align: center; padding-top: 35px; padding-left: 15px; border-left: medium none; padding-right: 15px; background-color: #feffff">\r\n						<p style="margin-bottom: 1em; font-size: 18px; font-family: arial, helvetica, sans-serif; color: #0A82AD; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\r\n							<strong>Su oferta de empleo ha sido recibida con éxito</strong>\r\n						</p>\r\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>\r\n							Se le notificará por este medio cuando su empleo Programador web PHP se encuentre publicado en el portal.						</p>\r\n						\r\n						<p style="margin-bottom: 1em; font-size: 12px; font-family: arial, helvetica, sans-serif; color: #a7a7a7; padding-left: 0px; margin-top: 0px; line-height: 155%; background-color: transparent; mso-line-height-rule: exactly" align=center>&#160;</p>\r\n						<a href="http://localhost/cake/manpower/exalumnos/businesses/empleos/mis_ofertas/92/job:1" style="background-color:#43AB86; font-size: 14px; font-family: arial, helvetica, sans-serif; color: #ffffff; padding: 5px 15px; text-decoration: none;">Ver mi oferta</a>					</td>\r\n				</tr>\r\n			</table>\r\n		</td>\r\n	</tr>\r\n</table>\n	<p>This email was sent using the <a href="http://cakephp.org">CakePHP Framework</a></p>\n</body>\n</html>', 'Oferta de empleo recibida - Portal Egresados Manpower', 'empresa2@email.com', 'Empresa 2', 'apps@brandon.cl', 'Manpower Portal Egresados', NULL, NULL, NULL, NULL, 0, 0, 0, NULL, '2016-10-20 11:37:35', '2016-10-20 11:37:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mp_empleados`
--

CREATE TABLE IF NOT EXISTS `mp_empleados` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cantidad_empleado` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `mp_empleados`
--

INSERT INTO `mp_empleados` (`id`, `cantidad_empleado`) VALUES
(1, '1-5'),
(2, '5-199'),
(3, '200+');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mp_empleos`
--

CREATE TABLE IF NOT EXISTS `mp_empleos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `empresa_id` bigint(20) DEFAULT NULL,
  `jornada_laboral_id` bigint(20) DEFAULT NULL,
  `contrato_ofrecido_id` bigint(20) DEFAULT NULL,
  `comuna_id` bigint(20) DEFAULT NULL,
  `estado_empleo_id` bigint(20) DEFAULT NULL,
  `anno_experiencia_id` bigint(20) DEFAULT NULL,
  `titulo` varchar(100) NOT NULL,
  `nombre_corto` varchar(150) NOT NULL,
  `requisitos_minimos` text NOT NULL,
  `descripcion` text NOT NULL,
  `sueldo` bigint(20) DEFAULT NULL,
  `comentarios_sueldo` varchar(50) DEFAULT NULL,
  `vacantes` int(11) NOT NULL,
  `fecha_finaliza` date NOT NULL,
  `hora_finaliza` time NOT NULL,
  `cerrar_empleo` tinyint(1) DEFAULT '0',
  `editado_count` int(11) NOT NULL DEFAULT '2',
  `visitado_count` bigint(20) NOT NULL,
  `postulacion_count` bigint(20) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `cerrada` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_relationship_1` (`empresa_id`),
  KEY `fk_relationship_11` (`comuna_id`),
  KEY `fk_relationship_19` (`estado_empleo_id`),
  KEY `fk_relationship_31` (`anno_experiencia_id`),
  KEY `fk_relationship_7` (`jornada_laboral_id`),
  KEY `fk_relationship_8` (`contrato_ofrecido_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=93 ;

--
-- Volcado de datos para la tabla `mp_empleos`
--

INSERT INTO `mp_empleos` (`id`, `empresa_id`, `jornada_laboral_id`, `contrato_ofrecido_id`, `comuna_id`, `estado_empleo_id`, `anno_experiencia_id`, `titulo`, `nombre_corto`, `requisitos_minimos`, `descripcion`, `sueldo`, `comentarios_sueldo`, `vacantes`, `fecha_finaliza`, `hora_finaliza`, `cerrar_empleo`, `editado_count`, `visitado_count`, `postulacion_count`, `activo`, `created`, `modified`, `cerrada`) VALUES
(60, 2, 1, 1, NULL, 3, 1, 'Empleo 1', 'empleo-1', 'texto', 'texto', NULL, '', 1, '2016-10-14', '00:00:00', 0, 2, 0, 0, 1, '2016-10-14 11:21:25', '2016-10-14 15:24:43', '2016-10-14 10:08:00'),
(61, 2, 1, 1, NULL, 3, 1, 'Empleo 1', 'empleo-1', 'texto', 'texto', NULL, '', 1, '2016-10-14', '00:00:00', 0, 2, 0, 0, 1, '2016-10-14 11:25:53', '2016-10-14 16:11:52', '2016-10-14 10:08:00'),
(86, 2, 1, 1, NULL, 3, 1, 'Empleo de pruebas para santiago', 'empleo_de_pruebas_para_santiago', 'aasdasdasd', 'asdasdasd', NULL, '', 2, '2016-10-14', '00:00:00', 0, 2, 0, 0, 0, '2016-10-14 15:23:53', '2016-10-14 16:12:55', '2016-10-14 15:15:00'),
(89, 2, 2, 1, NULL, 4, 2, 'Desarrollador web', 'desarrollador_web', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><ul><li>Uno</li><li>Dos</li><li>Tres<br></li></ul>', NULL, '', 1, '2016-10-31', '16:05:15', 0, 1, 0, 0, 1, '2016-10-17 16:05:45', '2016-10-17 17:58:49', NULL),
(90, 2, 2, 2, NULL, 1, 2, 'Vendedor part-time', 'vendedor_part_time', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><br>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><ul><li>Dos</li><li>Tres</li><li>Cuatro<br></li></ul><br>', 320000, '', 5, '2016-10-28', '23:00:45', 0, 3, 0, 0, 1, '2016-10-18 09:43:21', '2016-10-18 09:43:21', NULL),
(91, 2, 1, 1, NULL, 1, 1, 'Líder de proyectos', 'lider_de_proyectos', '<p><br></p>', '<p><br></p>', NULL, '', 1, '2016-10-18', '11:00:15', 0, 4, 0, 0, 1, '2016-10-18 11:09:09', '2016-10-18 11:09:09', NULL),
(92, 3, 1, 2, NULL, 1, 2, 'Programador web PHP', 'programador_web_php', '<ul><li>aaaa</li><li>aaaa<br></li></ul>', '<ul><li>aaaa</li><li>aaaa<br></li></ul><p>Prueba</p><p><br></p>', 300, '', 1, '2016-10-31', '11:25:30', 0, 4, 0, 0, 1, '2016-10-20 11:37:34', '2016-10-20 11:37:34', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mp_empleo_usuarios`
--

CREATE TABLE IF NOT EXISTS `mp_empleo_usuarios` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `anno_experiencia_id` bigint(20) DEFAULT NULL,
  `jornada_laboral_id` bigint(20) DEFAULT NULL,
  `rubro_empresa_id` bigint(20) DEFAULT NULL,
  `region_id` bigint(20) DEFAULT NULL,
  `usuario_id` bigint(20) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_termino` date NOT NULL,
  `trabajando` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_relationship_45` (`anno_experiencia_id`),
  KEY `fk_relationship_46` (`jornada_laboral_id`),
  KEY `fk_relationship_47` (`rubro_empresa_id`),
  KEY `fk_relationship_48` (`region_id`),
  KEY `fk_relationship_49` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mp_empresas`
--

CREATE TABLE IF NOT EXISTS `mp_empresas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `rubro_empresa_id` bigint(20) DEFAULT NULL,
  `comuna_id` bigint(20) DEFAULT NULL,
  `empleado_id` bigint(20) DEFAULT NULL,
  `pregunta_id` bigint(20) DEFAULT NULL,
  `rut` varchar(12) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `fono` varchar(20) NOT NULL,
  `respuesta` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `nombre_comercial` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `nombre_responsable` varchar(50) NOT NULL,
  `apellido_responsable` varchar(50) NOT NULL,
  `cargo_responsable` varchar(50) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_relationship_10` (`comuna_id`),
  KEY `fk_relationship_16` (`pregunta_id`),
  KEY `fk_relationship_20` (`empleado_id`),
  KEY `fk_relationship_6` (`rubro_empresa_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `mp_empresas`
--

INSERT INTO `mp_empresas` (`id`, `rubro_empresa_id`, `comuna_id`, `empleado_id`, `pregunta_id`, `rut`, `clave`, `fono`, `respuesta`, `email`, `nombre`, `nombre_comercial`, `descripcion`, `imagen`, `nombre_responsable`, `apellido_responsable`, `cargo_responsable`, `activo`, `created`, `modified`) VALUES
(2, 1, NULL, NULL, 1, '23555666-9', '0c4e6dff185a38d1934f8797a0a41511e2287bbe', '123456789', 'Perro', 'empresa@email.com', 'Empresa 1', 'Empresa ficción 1', 'Empresa de fantasia', 'motor.png', 'Cristian', 'Rojas', 'Dueño', 1, '2016-10-13 15:02:46', '2016-10-19 16:17:44'),
(3, 1, NULL, 1, 2, '11111111-1', '63a9bb53eb4dba22dc78398d295f1233a52a09b6', '12345679', 'Curicó', 'empresa2@email.com', 'Empresa 2', 'Empresa ficción 2', 'Empresa dedicada a la nada.', 'volvo_vm.png', 'Cristian', 'Rojas', 'desarrollador', 1, '2016-10-20 10:35:47', '2016-10-20 11:00:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mp_estado_empleos`
--

CREATE TABLE IF NOT EXISTS `mp_estado_empleos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `estado` varchar(100) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `mp_estado_empleos`
--

INSERT INTO `mp_estado_empleos` (`id`, `estado`, `activo`) VALUES
(1, 'En Revisión', 1),
(2, 'Publicado', 1),
(3, 'Despublicado', 1),
(4, 'Editado en revisión', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mp_estado_postulaciones`
--

CREATE TABLE IF NOT EXISTS `mp_estado_postulaciones` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `estado` varchar(50) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mp_estudios`
--

CREATE TABLE IF NOT EXISTS `mp_estudios` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `categoria_estudio_id` bigint(20) DEFAULT NULL,
  `modalidad_estudio_id` smallint(6) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `nombre_corto` varchar(150) NOT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `duracion` int(11) NOT NULL,
  `duracion_hora` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_termino` date NOT NULL,
  `descripcion` text NOT NULL,
  `objetivo` text NOT NULL,
  `requisitos` text NOT NULL,
  `perfil_ocupacional` text NOT NULL,
  `perfil_egresado` text NOT NULL,
  `funciones_claves` text,
  `folleto` varchar(200) DEFAULT NULL,
  `malla` varchar(200) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_relationship_23` (`categoria_estudio_id`),
  KEY `fk_relationship_24` (`modalidad_estudio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mp_estudios_sedes`
--

CREATE TABLE IF NOT EXISTS `mp_estudios_sedes` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `estudio_id` bigint(20) DEFAULT NULL,
  `sede_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_mp_estudios_sedes` (`estudio_id`),
  KEY `fk_mp_estudios_sedes2` (`sede_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mp_estudio_usuarios`
--

CREATE TABLE IF NOT EXISTS `mp_estudio_usuarios` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sede_id` bigint(20) DEFAULT NULL,
  `carrera_id` bigint(20) DEFAULT NULL,
  `usuario_id` bigint(20) DEFAULT NULL,
  `jornada_estudio_id` smallint(6) DEFAULT NULL,
  `otra_insitucion` tinyint(4) NOT NULL DEFAULT '0',
  `casa_estudio` varchar(100) DEFAULT NULL,
  `carrera` varchar(100) DEFAULT NULL,
  `carrera_completa` tinyint(1) NOT NULL DEFAULT '0',
  `descripcion` text NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_termino` date NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_relationship_34` (`sede_id`),
  KEY `fk_relationship_42` (`carrera_id`),
  KEY `fk_relationship_43` (`usuario_id`),
  KEY `fk_relationship_44` (`jornada_estudio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mp_jornada_estudios`
--

CREATE TABLE IF NOT EXISTS `mp_jornada_estudios` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mp_jornada_laborales`
--

CREATE TABLE IF NOT EXISTS `mp_jornada_laborales` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `empleo_count` bigint(20) NOT NULL,
  `empleo_activo_count` bigint(20) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `mp_jornada_laborales`
--

INSERT INTO `mp_jornada_laborales` (`id`, `nombre`, `activo`, `empleo_count`, `empleo_activo_count`, `created`, `modified`) VALUES
(1, 'FullTime', 1, 5, NULL, '2016-10-14 09:43:02', '2016-10-14 09:43:02'),
(2, 'PartTime', 1, 2, NULL, '2016-10-14 09:43:18', '2016-10-14 09:43:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mp_modalidad_estudios`
--

CREATE TABLE IF NOT EXISTS `mp_modalidad_estudios` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mp_modulos`
--

CREATE TABLE IF NOT EXISTS `mp_modulos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) DEFAULT NULL,
  `modulo` varchar(50) NOT NULL,
  `icono` varchar(50) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  `descripcion` text NOT NULL,
  `orden` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `mp_modulos`
--

INSERT INTO `mp_modulos` (`id`, `parent_id`, `modulo`, `icono`, `url`, `descripcion`, `orden`, `activo`, `created`, `modified`) VALUES
(1, NULL, 'Administración', '', '', 'Módulo padre para anidar sub módulos', 1, 1, '2016-10-20 11:55:27', '2016-10-20 11:56:12'),
(2, NULL, 'Solicitudes', '', '', 'Módulo padre para anidar sub módulos', 2, 1, '2016-10-20 11:56:17', '2016-10-20 11:56:17'),
(3, 1, 'Categorias', 'fa fa-list-ol', 'categorias', 'Módulo para categorías', 1, 1, '2016-10-20 12:35:42', '2016-10-20 12:50:48'),
(4, 1, 'Empresas', 'fa fa-building', 'empresas', 'Módulo para empresas', 2, 1, '2016-10-20 13:13:50', '2016-10-20 13:13:50'),
(5, 1, 'Empleos', 'fa fa-briefcase', 'empleos', 'Módulo de empleos', 2, 1, '2016-10-20 13:15:05', '2016-10-20 13:15:05'),
(6, NULL, 'Mi cuenta', 'fa fa-user', 'administradores', 'Módulo para mi cuenta', 1, 1, '2016-10-20 13:21:22', '2016-10-20 13:21:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mp_modulos_perfiles`
--

CREATE TABLE IF NOT EXISTS `mp_modulos_perfiles` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `perfil_id` bigint(20) DEFAULT NULL,
  `modulo_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_mp_modulos_perfiles` (`perfil_id`),
  KEY `fk_mp_modulos_perfiles2` (`modulo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `mp_modulos_perfiles`
--

INSERT INTO `mp_modulos_perfiles` (`id`, `perfil_id`, `modulo_id`) VALUES
(4, 1, 3),
(5, 1, 4),
(6, 1, 5),
(7, 1, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mp_paises`
--

CREATE TABLE IF NOT EXISTS `mp_paises` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `pais` varchar(50) NOT NULL,
  `codigo_pais` varchar(5) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `mp_paises`
--

INSERT INTO `mp_paises` (`id`, `pais`, `codigo_pais`, `activo`, `created`, `modified`) VALUES
(1, 'Chile', 'CHL', 1, '2016-10-13 13:26:22', '2016-10-13 13:26:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mp_perfiles`
--

CREATE TABLE IF NOT EXISTS `mp_perfiles` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `perfil` varchar(30) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `administrador_count` bigint(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `mp_perfiles`
--

INSERT INTO `mp_perfiles` (`id`, `perfil`, `activo`, `administrador_count`, `created`, `modified`) VALUES
(1, 'Administrador', 1, 1, '2016-10-20 11:57:45', '2016-10-20 11:57:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mp_postulaciones`
--

CREATE TABLE IF NOT EXISTS `mp_postulaciones` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `empleo_id` bigint(20) DEFAULT NULL,
  `usuario_id` bigint(20) DEFAULT NULL,
  `estado_postulacion_id` bigint(20) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_relationship_38` (`empleo_id`),
  KEY `fk_relationship_39` (`usuario_id`),
  KEY `fk_relationship_40` (`estado_postulacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mp_preguntas`
--

CREATE TABLE IF NOT EXISTS `mp_preguntas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(100) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `mp_preguntas`
--

INSERT INTO `mp_preguntas` (`id`, `pregunta`, `activo`, `created`, `modified`) VALUES
(1, '¿Cuál es su animal favorito?', 1, '2016-10-13 13:34:11', '2016-10-13 13:34:11'),
(2, '¿Nombre de su ciudad de nacimiento?', 1, '2016-10-13 13:35:16', '2016-10-13 13:35:16'),
(3, '¿Cuál es su color favorito?', 1, '2016-10-13 13:35:42', '2016-10-13 13:35:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mp_regiones`
--

CREATE TABLE IF NOT EXISTS `mp_regiones` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `pais_id` bigint(20) DEFAULT NULL,
  `region` varchar(70) NOT NULL,
  `codigo_region` varchar(5) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_relationship_2` (`pais_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mp_rubro_empresas`
--

CREATE TABLE IF NOT EXISTS `mp_rubro_empresas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `rubro_empresa` varchar(100) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `mp_rubro_empresas`
--

INSERT INTO `mp_rubro_empresas` (`id`, `rubro_empresa`, `activo`, `created`, `modified`) VALUES
(1, 'Otro', 1, '2016-10-13 13:25:04', '2016-10-13 13:25:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mp_sedes`
--

CREATE TABLE IF NOT EXISTS `mp_sedes` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `comuna_id` bigint(20) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `nombre_corto` varchar(150) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `fono_link` varchar(12) NOT NULL,
  `fono` varchar(20) NOT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `descripcion` text,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_relationship_26` (`comuna_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mp_situacion_laborales`
--

CREATE TABLE IF NOT EXISTS `mp_situacion_laborales` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `situacion_laboral` varchar(30) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mp_solicitudes`
--

CREATE TABLE IF NOT EXISTS `mp_solicitudes` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tipo_solicitud_id` bigint(20) DEFAULT NULL,
  `usuario_id` bigint(20) DEFAULT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_relationship_36` (`tipo_solicitud_id`),
  KEY `fk_relationship_37` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mp_tipo_solicitudes`
--

CREATE TABLE IF NOT EXISTS `mp_tipo_solicitudes` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tipo_solicitud` varchar(100) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mp_usuarios`
--

CREATE TABLE IF NOT EXISTS `mp_usuarios` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `comuna_id` bigint(20) DEFAULT NULL,
  `pregunta_id` bigint(20) DEFAULT NULL,
  `situacion_laboral_id` bigint(20) DEFAULT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `rut` varchar(12) NOT NULL,
  `email` varchar(60) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `fono` varchar(12) DEFAULT NULL,
  `celular` varchar(12) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `respuesta` varchar(200) NOT NULL,
  `presentacion` text,
  `pretencion_renta` int(11) DEFAULT NULL,
  `cv` varchar(200) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL,
  `postulacion_count` bigint(20) NOT NULL,
  `solicitud_count` bigint(20) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `licencia_conducir` tinyint(1) DEFAULT NULL,
  `nombre_licencia_conducir` varchar(30) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `postulacon_count` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_relationship_33` (`situacion_laboral_id`),
  KEY `fk_relationship_35` (`comuna_id`),
  KEY `fk_relationship_41` (`pregunta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mp_administradores`
--
ALTER TABLE `mp_administradores`
  ADD CONSTRAINT `fk_relationship_17` FOREIGN KEY (`pregunta_id`) REFERENCES `mp_preguntas` (`id`),
  ADD CONSTRAINT `fk_relationship_22` FOREIGN KEY (`perfil_id`) REFERENCES `mp_perfiles` (`id`);

--
-- Filtros para la tabla `mp_categorias_empleos`
--
ALTER TABLE `mp_categorias_empleos`
  ADD CONSTRAINT `fk_mp_categorias_empleos` FOREIGN KEY (`empleo_id`) REFERENCES `mp_empleos` (`id`),
  ADD CONSTRAINT `fk_mp_categorias_empleos2` FOREIGN KEY (`categoria_id`) REFERENCES `mp_categorias` (`id`);

--
-- Filtros para la tabla `mp_categorias_usuarios`
--
ALTER TABLE `mp_categorias_usuarios`
  ADD CONSTRAINT `fk_mp_categorias_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `mp_usuarios` (`id`),
  ADD CONSTRAINT `fk_mp_categorias_usuarios2` FOREIGN KEY (`categoria_id`) REFERENCES `mp_categorias` (`id`);

--
-- Filtros para la tabla `mp_ciudades`
--
ALTER TABLE `mp_ciudades`
  ADD CONSTRAINT `fk_relationship_3` FOREIGN KEY (`region_id`) REFERENCES `mp_regiones` (`id`);

--
-- Filtros para la tabla `mp_comunas`
--
ALTER TABLE `mp_comunas`
  ADD CONSTRAINT `fk_relationship_9` FOREIGN KEY (`ciudad_id`) REFERENCES `mp_ciudades` (`id`);

--
-- Filtros para la tabla `mp_empleos`
--
ALTER TABLE `mp_empleos`
  ADD CONSTRAINT `fk_relationship_1` FOREIGN KEY (`empresa_id`) REFERENCES `mp_empresas` (`id`),
  ADD CONSTRAINT `fk_relationship_11` FOREIGN KEY (`comuna_id`) REFERENCES `mp_comunas` (`id`),
  ADD CONSTRAINT `fk_relationship_19` FOREIGN KEY (`estado_empleo_id`) REFERENCES `mp_estado_empleos` (`id`),
  ADD CONSTRAINT `fk_relationship_31` FOREIGN KEY (`anno_experiencia_id`) REFERENCES `mp_anno_experiencias` (`id`),
  ADD CONSTRAINT `fk_relationship_7` FOREIGN KEY (`jornada_laboral_id`) REFERENCES `mp_jornada_laborales` (`id`),
  ADD CONSTRAINT `fk_relationship_8` FOREIGN KEY (`contrato_ofrecido_id`) REFERENCES `mp_contrato_ofrecidos` (`id`);

--
-- Filtros para la tabla `mp_empleo_usuarios`
--
ALTER TABLE `mp_empleo_usuarios`
  ADD CONSTRAINT `fk_relationship_45` FOREIGN KEY (`anno_experiencia_id`) REFERENCES `mp_anno_experiencias` (`id`),
  ADD CONSTRAINT `fk_relationship_46` FOREIGN KEY (`jornada_laboral_id`) REFERENCES `mp_jornada_laborales` (`id`),
  ADD CONSTRAINT `fk_relationship_47` FOREIGN KEY (`rubro_empresa_id`) REFERENCES `mp_rubro_empresas` (`id`),
  ADD CONSTRAINT `fk_relationship_48` FOREIGN KEY (`region_id`) REFERENCES `mp_regiones` (`id`),
  ADD CONSTRAINT `fk_relationship_49` FOREIGN KEY (`usuario_id`) REFERENCES `mp_usuarios` (`id`);

--
-- Filtros para la tabla `mp_empresas`
--
ALTER TABLE `mp_empresas`
  ADD CONSTRAINT `fk_relationship_10` FOREIGN KEY (`comuna_id`) REFERENCES `mp_comunas` (`id`),
  ADD CONSTRAINT `fk_relationship_16` FOREIGN KEY (`pregunta_id`) REFERENCES `mp_preguntas` (`id`),
  ADD CONSTRAINT `fk_relationship_20` FOREIGN KEY (`empleado_id`) REFERENCES `mp_empleados` (`id`),
  ADD CONSTRAINT `fk_relationship_6` FOREIGN KEY (`rubro_empresa_id`) REFERENCES `mp_rubro_empresas` (`id`);

--
-- Filtros para la tabla `mp_estudios`
--
ALTER TABLE `mp_estudios`
  ADD CONSTRAINT `fk_relationship_23` FOREIGN KEY (`categoria_estudio_id`) REFERENCES `mp_categoria_estudios` (`id`),
  ADD CONSTRAINT `fk_relationship_24` FOREIGN KEY (`modalidad_estudio_id`) REFERENCES `mp_modalidad_estudios` (`id`);

--
-- Filtros para la tabla `mp_estudios_sedes`
--
ALTER TABLE `mp_estudios_sedes`
  ADD CONSTRAINT `fk_mp_estudios_sedes` FOREIGN KEY (`estudio_id`) REFERENCES `mp_estudios` (`id`),
  ADD CONSTRAINT `fk_mp_estudios_sedes2` FOREIGN KEY (`sede_id`) REFERENCES `mp_sedes` (`id`);

--
-- Filtros para la tabla `mp_estudio_usuarios`
--
ALTER TABLE `mp_estudio_usuarios`
  ADD CONSTRAINT `fk_relationship_34` FOREIGN KEY (`sede_id`) REFERENCES `mp_sedes` (`id`),
  ADD CONSTRAINT `fk_relationship_42` FOREIGN KEY (`carrera_id`) REFERENCES `mp_estudios` (`id`),
  ADD CONSTRAINT `fk_relationship_43` FOREIGN KEY (`usuario_id`) REFERENCES `mp_usuarios` (`id`),
  ADD CONSTRAINT `fk_relationship_44` FOREIGN KEY (`jornada_estudio_id`) REFERENCES `mp_jornada_estudios` (`id`);

--
-- Filtros para la tabla `mp_modulos_perfiles`
--
ALTER TABLE `mp_modulos_perfiles`
  ADD CONSTRAINT `fk_mp_modulos_perfiles` FOREIGN KEY (`perfil_id`) REFERENCES `mp_perfiles` (`id`),
  ADD CONSTRAINT `fk_mp_modulos_perfiles2` FOREIGN KEY (`modulo_id`) REFERENCES `mp_modulos` (`id`);

--
-- Filtros para la tabla `mp_postulaciones`
--
ALTER TABLE `mp_postulaciones`
  ADD CONSTRAINT `fk_relationship_38` FOREIGN KEY (`empleo_id`) REFERENCES `mp_empleos` (`id`),
  ADD CONSTRAINT `fk_relationship_39` FOREIGN KEY (`usuario_id`) REFERENCES `mp_usuarios` (`id`),
  ADD CONSTRAINT `fk_relationship_40` FOREIGN KEY (`estado_postulacion_id`) REFERENCES `mp_estado_postulaciones` (`id`);

--
-- Filtros para la tabla `mp_regiones`
--
ALTER TABLE `mp_regiones`
  ADD CONSTRAINT `fk_relationship_2` FOREIGN KEY (`pais_id`) REFERENCES `mp_paises` (`id`);

--
-- Filtros para la tabla `mp_sedes`
--
ALTER TABLE `mp_sedes`
  ADD CONSTRAINT `fk_relationship_26` FOREIGN KEY (`comuna_id`) REFERENCES `mp_comunas` (`id`);

--
-- Filtros para la tabla `mp_solicitudes`
--
ALTER TABLE `mp_solicitudes`
  ADD CONSTRAINT `fk_relationship_36` FOREIGN KEY (`tipo_solicitud_id`) REFERENCES `mp_tipo_solicitudes` (`id`),
  ADD CONSTRAINT `fk_relationship_37` FOREIGN KEY (`usuario_id`) REFERENCES `mp_usuarios` (`id`);

--
-- Filtros para la tabla `mp_usuarios`
--
ALTER TABLE `mp_usuarios`
  ADD CONSTRAINT `fk_relationship_33` FOREIGN KEY (`situacion_laboral_id`) REFERENCES `mp_situacion_laborales` (`id`),
  ADD CONSTRAINT `fk_relationship_35` FOREIGN KEY (`comuna_id`) REFERENCES `mp_comunas` (`id`),
  ADD CONSTRAINT `fk_relationship_41` FOREIGN KEY (`pregunta_id`) REFERENCES `mp_preguntas` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
