-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 14-12-2017 a las 13:59:41
-- Versión del servidor: 5.7.19
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sidpla`
--

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `Actualizar_Persona`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Actualizar_Persona` (IN `OLDNum_Documento_per` VARCHAR(15), IN `newPrimer_Nombre_per` VARCHAR(45), IN `newSegundo_Nombre_per` VARCHAR(45), IN `newPrimer_Apellido_per` VARCHAR(45), IN `newSegundo_Apellido_per` VARCHAR(45), IN `newUsuario_login` VARCHAR(45), IN `newPass_login` VARCHAR(256), IN `newTel_per` BIGINT(15), IN `newCel_per` BIGINT(15), IN `newDirec_per` VARCHAR(60), IN `newCorreo_per` VARCHAR(45), IN `newtipo_doc` VARCHAR(45), IN `newrol_Rol` VARCHAR(45), IN `NEWNum_Documento_per` VARCHAR(15))  BEGIN
 
 UPDATE PERSONA SET Num_Documento_per=NEWNum_Documento_per, tipo_doc=newtipo_doc, Primer_Nombre_per=newPrimer_Nombre_per, Segundo_Nombre_per=newSegundo_Nombre_per,
 Primer_Apellido_per=newPrimer_Apellido_per, Segundo_Apellido_per=newSegundo_Apellido_per, Usuario_login=newUsuario_login, Pass_login=newPass_login, Tel_per=newTel_per,
 Cel_per=newCel_per, Direc_per=newDirec_per, Correo_per=newCorreo_per, rol_Rol=newrol_Rol WHERE  Num_Documento_per= OLDNum_Documento_per;

 END$$

DROP PROCEDURE IF EXISTS `Eliminar_Persona`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Eliminar_Persona` (IN `OLDNum_Documento_per` VARCHAR(15))  BEGIN
 
 DELETE FROM PERSONA WHERE Num_Documento_per=OLDNum_Documento_per;

 END$$

DROP PROCEDURE IF EXISTS `Insertar_Persona`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Insertar_Persona` (IN `Num_Documento_per` VARCHAR(15), IN `Primer_Nombre_per` VARCHAR(45), IN `Segundo_Nombre_per` VARCHAR(45), IN `Primer_Apellido_per` VARCHAR(45), IN `Segundo_Apellido_per` VARCHAR(45), IN `Usuario_login` VARCHAR(45), IN `Pass_login` VARCHAR(270), IN `Tel_per` BIGINT(15), IN `Cel_per` BIGINT(15), IN `Direc_per` VARCHAR(60), IN `Correo_per` VARCHAR(45), IN `tipo_doc` VARCHAR(45), IN `rol_Rol` VARCHAR(45))  BEGIN
 
 INSERT INTO PERSONA VALUES (Num_Documento_per,
 Primer_Nombre_per, Segundo_Nombre_per, Primer_Apellido_per,
 Segundo_Apellido_per, Usuario_login, Pass_login, Tel_per,Cel_per,
 Direc_per, Correo_per,tipo_doc,rol_Rol);


 END$$

DROP PROCEDURE IF EXISTS `Listar_Persona`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Listar_Persona` ()  BEGIN
 
 SELECT * FROM PERSONA;
 

 END$$

DROP PROCEDURE IF EXISTS `Obtener_Persona`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Obtener_Persona` (IN `Num_Documento_perMD` VARCHAR(15))  BEGIN
 
 SELECT * FROM PERSONA WHERE Num_Documento_per=Num_Documento_perMD;
 

 END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilio`
--

DROP TABLE IF EXISTS `domicilio`;
CREATE TABLE IF NOT EXISTS `domicilio` (
  `Cod_dom` varchar(45) NOT NULL COMMENT 'Es el codigo por el cual de identifica el domicilio.',
  `Fecha_Hora` date DEFAULT NULL COMMENT 'Es la fecha en la que se realizo el domicilio.',
  `Direc_Dom` varchar(60) NOT NULL COMMENT 'es la direccion del destino del domicilio a entregar',
  `Valor_Total` decimal(10,2) DEFAULT NULL COMMENT 'Es la suma de los valores subtotales.',
  `Observacion_dom` varchar(123) DEFAULT NULL COMMENT 'Observaciones acerca del domicilio. ',
  `estado_domicilio_Estado_dom` varchar(50) NOT NULL,
  `pizzeria_Nit_Pizzeria` bigint(20) NOT NULL,
  PRIMARY KEY (`Cod_dom`),
  KEY `fk_domicilio_estado_domicilio1_idx` (`estado_domicilio_Estado_dom`),
  KEY `fk_domicilio_pizzeria1_idx` (`pizzeria_Nit_Pizzeria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilio_has_producto`
--

DROP TABLE IF EXISTS `domicilio_has_producto`;
CREATE TABLE IF NOT EXISTS `domicilio_has_producto` (
  `domicilio_Cod_dom` varchar(45) NOT NULL,
  `producto_Cod_producto` int(11) NOT NULL,
  `Cantidad` int(5) NOT NULL,
  `Valor_subtotal` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`domicilio_Cod_dom`,`producto_Cod_producto`),
  KEY `fk_domicilio_has_producto_producto1_idx` (`producto_Cod_producto`),
  KEY `fk_domicilio_has_producto_domicilio1_idx` (`domicilio_Cod_dom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_domicilio`
--

DROP TABLE IF EXISTS `estado_domicilio`;
CREATE TABLE IF NOT EXISTS `estado_domicilio` (
  `Estado_dom` varchar(50) NOT NULL COMMENT 'Describe el estado del domicilio (entregado, no entregado)',
  `estado_e_dom` tinyint(4) NOT NULL,
  PRIMARY KEY (`Estado_dom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado_domicilio`
--

INSERT INTO `estado_domicilio` (`Estado_dom`, `estado_e_dom`) VALUES
('CANCELADO', 1),
('EN ESPERA', 1),
('ENTREGADO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opinion`
--

DROP TABLE IF EXISTS `opinion`;
CREATE TABLE IF NOT EXISTS `opinion` (
  `Cod_Opinion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'es el codigo  que identifica la opinion dada por la  persona ',
  `Opinion` varchar(250) NOT NULL COMMENT 'es la opinion dada por el cliente ',
  `persona_Num_Documento_per` varchar(15) NOT NULL,
  `persona_tipo_doc` varchar(45) NOT NULL,
  PRIMARY KEY (`Cod_Opinion`),
  KEY `fk_opinion_persona1_idx` (`persona_Num_Documento_per`,`persona_tipo_doc`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `opinion`
--

INSERT INTO `opinion` (`Cod_Opinion`, `Opinion`, `persona_Num_Documento_per`, `persona_tipo_doc`) VALUES
(1, 'SEBASTIAN ES PRO', '1033815398', 'CEDULA DE CIUDADANIA'),
(2, 'DEACUERDO CON EL DE ARRIBA', '1031157939', 'CEDULA DE CIUDADANIA'),
(3, 'EL DE ARRIBA DICE LA VERDAD', '1031178887', 'CEDULA DE CIUDADANIA'),
(4, 'A mi me gustan mayores de  esos que llaman señores', '9900000001', 'TARGETA DE IDENTIDAD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

DROP TABLE IF EXISTS `persona`;
CREATE TABLE IF NOT EXISTS `persona` (
  `Num_Documento_per` varchar(15) NOT NULL COMMENT 'es el numero de identificacion de la persona ',
  `Primer_Nombre_per` varchar(45) NOT NULL COMMENT 'es el nombre 1 de la persona ',
  `Segundo_Nombre_per` varchar(45) DEFAULT NULL COMMENT 'es el nombre 2 de la persona ',
  `Primer_Apellido_per` varchar(45) NOT NULL COMMENT 'es el apellido 1 de la persona',
  `Segundo_Apellido_per` varchar(45) DEFAULT NULL COMMENT 'es el apellido 2 de la persona ',
  `Usuario_login` varchar(45) NOT NULL COMMENT 'es el nombre de usuario con el que se identifica la persona para ingresar al sistema ',
  `Pass_login` varchar(256) NOT NULL COMMENT 'es la contraseña con la que la persona ingresa al sistema ',
  `Tel_per` bigint(15) DEFAULT NULL COMMENT 'es el telefono en el que se pueda localizar a la persona ',
  `Cel_per` bigint(15) DEFAULT NULL COMMENT 'es el telefono celular en el que se puede localizar a la persona ',
  `Direc_per` varchar(60) NOT NULL COMMENT 'es la direccion de vivienda de la persona ',
  `Correo_per` varchar(45) DEFAULT NULL COMMENT 'es el correo electronico que utiliza la persona ',
  `tipo_doc` varchar(45) NOT NULL,
  `rol_Rol` varchar(45) NOT NULL,
  PRIMARY KEY (`Num_Documento_per`,`tipo_doc`),
  UNIQUE KEY `Usuario_login_UNIQUE` (`Usuario_login`),
  KEY `fk_persona_tipo_doc1_idx` (`tipo_doc`),
  KEY `fk_persona_rol1_idx` (`rol_Rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`Num_Documento_per`, `Primer_Nombre_per`, `Segundo_Nombre_per`, `Primer_Apellido_per`, `Segundo_Apellido_per`, `Usuario_login`, `Pass_login`, `Tel_per`, `Cel_per`, `Direc_per`, `Correo_per`, `tipo_doc`, `rol_Rol`) VALUES
('1014304616', 'JULIANA', 'GERALDIN', 'GARCIA', 'CORREDOR', 'JGGARCIA176', '1234', 4008888, 3157301391, 'CASA GERALDIN', 'JGGARCIA176@MISENA.EDU.CO', 'CEDULA DE CIUDADANIA', 'CLIENTE'),
('1031157939', 'ALBERT', 'HERNAN', 'QUINTERO', 'VALENCIA', 'AQUINTERO939', '1234', 4008881, 3123654823, 'CASA ALBERT', 'AQUINTERO939@MISENA.EDU.CO', 'CEDULA DE CIUDADANIA', 'EMPLEADO'),
('1031178887', 'JEISON', 'ALEXANDER', 'DIAZ', 'DAZA', 'JADIAZ908', '1234', 4008888, 3203725972, 'CASA JEISON', 'JADIAZ908@MISENA.EDU.CO', 'CEDULA DE CIUDADANIA', 'EMPLEADO'),
('1033815398', 'JUAN', 'SEBASTIAN', 'RUIZ', 'CASTAÑEDA', 'JSRUIZ241', '1234', 400889, 3022608970, 'MI CASA', 'JSRUIZ241@MISENA.EDU.CO', 'CEDULA DE CIUDADANIA', 'ADMINISTRADOR'),
('9900000001', 'FERNANDO', 'JOSE', 'PRADA', 'OTERO', 'PRADA6', '1234', 4008882, 3102878826, 'CASA FERNANDO', 'PRADA6@MISENA.EDU.CO', 'TARGETA DE IDENTIDAD', 'CLIENTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_has_domicilio`
--

DROP TABLE IF EXISTS `persona_has_domicilio`;
CREATE TABLE IF NOT EXISTS `persona_has_domicilio` (
  `persona_Num_Documento_per` varchar(15) NOT NULL,
  `persona_tipo_doc_tipo_doc` varchar(45) NOT NULL,
  `domicilio_Cod_dom` varchar(45) NOT NULL,
  PRIMARY KEY (`persona_Num_Documento_per`,`persona_tipo_doc_tipo_doc`,`domicilio_Cod_dom`),
  KEY `fk_persona_has_domicilio_domicilio1_idx` (`domicilio_Cod_dom`),
  KEY `fk_persona_has_domicilio_persona1_idx` (`persona_Num_Documento_per`,`persona_tipo_doc_tipo_doc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pizzeria`
--

DROP TABLE IF EXISTS `pizzeria`;
CREATE TABLE IF NOT EXISTS `pizzeria` (
  `Nit_Pizzeria` bigint(20) NOT NULL COMMENT 'Número de identificación de  la pizzería. ',
  `Nom_Pizzeria` varchar(45) NOT NULL COMMENT 'Nombre de la pìzzería. ',
  `Dir_Pizzeria` varchar(50) NOT NULL COMMENT 'dirección de la pizzería. ',
  `Tel_Pizzeria` bigint(15) NOT NULL COMMENT 'Número Telefónico fijo de la pìzzería. ',
  `Cel_Pizzeria` bigint(15) DEFAULT NULL COMMENT 'Número de celular de la pizzería. ',
  `Logo_Pizzeria` varchar(70) NOT NULL COMMENT 'Logotipo de la pizzería. ',
  PRIMARY KEY (`Nit_Pizzeria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pizzeria`
--

INSERT INTO `pizzeria` (`Nit_Pizzeria`, `Nom_Pizzeria`, `Dir_Pizzeria`, `Tel_Pizzeria`, `Cel_Pizzeria`, `Logo_Pizzeria`) VALUES
(801145012, 'PIZZERIA ABUELA', 'CALLE FALSA 13-31', 4008887, 3105320621, 'MEDIA/FOTO_P_ABUELA.JPG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `Cod_producto` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Es el codigo por el cual se identifica el producto.',
  `Nom_prod` varchar(45) NOT NULL COMMENT 'Nombre por el que se identifica el producto.',
  `Desc_prod` varchar(100) NOT NULL COMMENT 'Descripción del producto.',
  `Foto_prod` varchar(70) NOT NULL COMMENT 'Imagen, foto por la que se identifica el producto.',
  `Stok_min` int(11) DEFAULT NULL COMMENT 'Cantidad minima que puede existir del producto',
  `Stok_max` int(11) DEFAULT NULL COMMENT 'Cantidad maxima  que puede existir del producto',
  `Cantidad_exist` int(11) DEFAULT NULL COMMENT 'Numero total de unidades existentes del producto',
  `tipo_producto_tipo_prod` varchar(50) NOT NULL,
  `tamaño_tamaño` varchar(50) NOT NULL,
  `Valor_unitario` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`Cod_producto`),
  KEY `fk_producto_tipo_producto1_idx` (`tipo_producto_tipo_prod`),
  KEY `fk_producto_tamaño1_idx` (`tamaño_tamaño`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`Cod_producto`, `Nom_prod`, `Desc_prod`, `Foto_prod`, `Stok_min`, `Stok_max`, `Cantidad_exist`, `tipo_producto_tipo_prod`, `tamaño_tamaño`, `Valor_unitario`) VALUES
(1, 'PIZZA HAWAIANA', 'PIZZA QUE CONTIENE UNA BASE DE QUESO FUNDIDO Y TOMATE QUE SE ALIÑAN CON JAMÓN Y PIÑA', 'MEDIA/HAWAIANA.JPG', NULL, NULL, NULL, 'PIZZA', 'PEQUEÑA', '15000.00'),
(2, 'PIZZA HAWAIANA', 'PIZZA QUE CONTIENE UNA BASE DE QUESO FUNDIDO Y TOMATE QUE SE ALIÑAN CON JAMÓN Y PIÑA', 'MEDIA/HAWAIANA.JPG', NULL, NULL, NULL, 'PIZZA', 'MEDIANA', '22000.00'),
(3, 'PIZZA HAWAIANA', 'PIZZA QUE CONTIENE UNA BASE DE QUESO FUNDIDO Y TOMATE QUE SE ALIÑAN CON JAMÓN Y PIÑA', 'MEDIA/HAWAIANA.JPG', NULL, NULL, NULL, 'PIZZA', 'GRANDE', '27000.00'),
(4, 'PIZZA HAWAIANA', 'PIZZA QUE CONTIENE UNA BASE DE QUESO FUNDIDO Y TOMATE QUE SE ALIÑAN CON JAMÓN Y PIÑA', 'MEDIA/HAWAIANA.JPG', NULL, NULL, NULL, 'PIZZA', 'FAMILIAR', '32000.00'),
(5, 'PIZZA HAWAIANA', 'PIZZA QUE CONTIENE UNA BASE DE QUESO FUNDIDO Y TOMATE QUE SE ALIÑAN CON JAMÓN Y PIÑA', 'MEDIA/HAWAIANA.JPG', NULL, NULL, NULL, 'PIZZA', 'EXTRA GRANDE', '40000.00'),
(6, 'PIZZA PEPPERONI', 'PIZZA QUE CONTIENE PEPPERONI', 'MEDIA/PEPPERONI.JPG', NULL, NULL, NULL, 'PIZZA', 'PEQUEÑA', '15000.00'),
(7, 'PIZZA PEPPERONI', 'PIZZA QUE CONTIENE PEPPERONI', 'MEDIA/PEPPERONI.JPG', NULL, NULL, NULL, 'PIZZA', 'MEDIANA', '22000.00'),
(8, 'PIZZA PEPPERONI', 'PIZZA QUE CONTIENE PEPPERONI', 'MEDIA/PEPPERONI.JPG', NULL, NULL, NULL, 'PIZZA', 'GRANDE', '27000.00'),
(9, 'PIZZA PEPPERONI', 'PIZZA QUE CONTIENE PEPPERONI', 'MEDIA/PEPPERONI.JPG', NULL, NULL, NULL, 'PIZZA', 'FAMILIAR', '32000.00'),
(10, 'PIZZA PEPPERONI', 'PIZZA QUE CONTIENE PEPPERONI', 'MEDIA/PEPPERONI.JPG', NULL, NULL, NULL, 'PIZZA', 'EXTRA GRANDE', '40000.00'),
(11, 'PIZZA MEXICANA', 'PIZZA QUE CONTIENE TOMATE, FRIJOLES, JALAPEÑOS, CARNE PICADA Y QUESO CHEDDAR', 'MEDIA/MEXICANA.JPG', NULL, NULL, NULL, 'PIZZA', 'PEQUEÑA', '15000.00'),
(12, 'PIZZA MEXICANA', 'PIZZA QUE CONTIENE TOMATE, FRIJOLES, JALAPEÑOS, CARNE PICADA Y QUESO CHEDDAR', 'MEDIA/MEXICANA.JPG', NULL, NULL, NULL, 'PIZZA', 'MEDIANA', '22000.00'),
(13, 'PIZZA MEXICANA', 'PIZZA QUE CONTIENE TOMATE, FRIJOLES, JALAPEÑOS, CARNE PICADA Y QUESO CHEDDAR', 'MEDIA/MEXICANA.JPG', NULL, NULL, NULL, 'PIZZA', 'GRANDE', '27000.00'),
(14, 'PIZZA MEXICANA', 'PIZZA QUE CONTIENE TOMATE, FRIJOLES, JALAPEÑOS, CARNE PICADA Y QUESO CHEDDAR', 'MEDIA/MEXICANA.JPG', NULL, NULL, NULL, 'PIZZA', 'FAMILIAR', '32000.00'),
(15, 'PIZZA MEXICANA', 'PIZZA QUE CONTIENE TOMATE, FRIJOLES, JALAPEÑOS, CARNE PICADA Y QUESO CHEDDAR', 'MEDIA/MEXICANA.JPG', NULL, NULL, NULL, 'PIZZA', 'EXTRA GRANDE', '40000.00'),
(16, 'PIZZA QUESO', 'DELICIOSA Y JUGOSA PIZZA REPLETA DE TUS QUESOS FAVORITOS', 'MEDIA/QUESO.JPG', NULL, NULL, NULL, 'PIZZA', 'PEQUEÑA', '15000.00'),
(17, 'PIZZA QUESO', 'DELICIOSA Y JUGOSA PIZZA REPLETA DE TUS QUESOS FAVORITOS', 'MEDIA/QUESO.JPG', NULL, NULL, NULL, 'PIZZA', 'MEDIANA', '22000.00'),
(18, 'PIZZA QUESO', 'DELICIOSA Y JUGOSA PIZZA REPLETA DE TUS QUESOS FAVORITOS', 'MEDIA/QUESO.JPG', NULL, NULL, NULL, 'PIZZA', 'GRANDE', '27000.00'),
(19, 'PIZZA QUESO', 'DELICIOSA Y JUGOSA PIZZA REPLETA DE TUS QUESOS FAVORITOS', 'MEDIA/QUESO.JPG', NULL, NULL, NULL, 'PIZZA', 'FAMILIAR', '32000.00'),
(20, 'PIZZA QUESO', 'DELICIOSA Y JUGOSA PIZZA REPLETA DE TUS QUESOS FAVORITOS', 'MEDIA/QUESO.JPG', NULL, NULL, NULL, 'PIZZA', 'EXTRA GRANDE', '40000.00'),
(21, 'PIZZA CHAMPIÑONES', 'DELICIOSA Y JUGOSA PIZZA REPLETA DE TUS CHAMPIÑONES FAVORITOS', 'MEDIA/CHAMPIÑONES.JPG', NULL, NULL, NULL, 'PIZZA', 'PEQUEÑA', '15000.00'),
(22, 'PIZZA CHAMPIÑONES', 'DELICIOSA Y JUGOSA PIZZA REPLETA DE TUS CHAMPIÑONES FAVORITOS', 'MEDIA/CHAMPIÑONES.JPG', NULL, NULL, NULL, 'PIZZA', 'MEDIANA', '22000.00'),
(23, 'PIZZA CHAMPIÑONES', 'DELICIOSA Y JUGOSA PIZZA REPLETA DE TUS CHAMPIÑONES FAVORITOS', 'MEDIA/CHAMPIÑONES.JPG', NULL, NULL, NULL, 'PIZZA', 'GRANDE', '27000.00'),
(24, 'PIZZA CHAMPIÑONES', 'DELICIOSA Y JUGOSA PIZZA REPLETA DE TUS CHAMPIÑONES FAVORITOS', 'MEDIA/CHAMPIÑONES.JPG', NULL, NULL, NULL, 'PIZZA', 'FAMILIAR', '32000.00'),
(25, 'PIZZA CHAMPIÑONES', 'DELICIOSA Y JUGOSA PIZZA REPLETA DE TUS CHAMPIÑONES FAVORITOS', 'MEDIA/CHAMPIÑONES.JPG', NULL, NULL, NULL, 'PIZZA', 'EXTRA GRANDE', '40000.00'),
(26, 'PIZZA VEGETARIANA', 'DELICIOSA PIZZA CON INGREDIENTES VEGETARIANOS IDEAL PARA REEMPLAZAR LA TRADICIONAL', 'MEDIA/VEGETARIANA.JPG', NULL, NULL, NULL, 'PIZZA', 'PEQUEÑA', '15000.00'),
(27, 'PIZZA VEGETARIANA', 'DELICIOSA PIZZA CON INGREDIENTES VEGETARIANOS IDEAL PARA REEMPLAZAR LA TRADICIONAL', 'MEDIA/VEGETARIANA.JPG', NULL, NULL, NULL, 'PIZZA', 'MEDIANA', '22000.00'),
(28, 'PIZZA VEGETARIANA', 'DELICIOSA PIZZA CON INGREDIENTES VEGETARIANOS IDEAL PARA REEMPLAZAR LA TRADICIONAL', 'MEDIA/VEGETARIANA.JPG', NULL, NULL, NULL, 'PIZZA', 'GRANDE', '27000.00'),
(29, 'PIZZA VEGETARIANA', 'DELICIOSA PIZZA CON INGREDIENTES VEGETARIANOS IDEAL PARA REEMPLAZAR LA TRADICIONAL', 'MEDIA/VEGETARIANA.JPG', NULL, NULL, NULL, 'PIZZA', 'FAMILIAR', '32000.00'),
(30, 'PIZZA VEGETARIANA', 'DELICIOSA PIZZA CON INGREDIENTES VEGETARIANOS IDEAL PARA REEMPLAZAR LA TRADICIONAL', 'MEDIA/VEGETARIANA.JPG', NULL, NULL, NULL, 'PIZZA', 'EXTRA GRANDE', '40000.00'),
(31, 'COCACOLA', 'DELICIOSA BEBIDA COCACOLA TRADICIONAL', 'MEDIA/COCACOLA.JPG', 20, 50, 30, 'BEBIDA', '250 ML', '500.00'),
(32, 'COCACOLA', 'DELICIOSA BEBIDA COCACOLA TRADICIONAL', 'MEDIA/COCACOLA.JPG', 20, 50, 30, 'BEBIDA', '350 ML', '1200.00'),
(33, 'COCACOLA', 'DELICIOSA BEBIDA COCACOLA TRADICIONAL', 'MEDIA/COCACOLA.JPG', 20, 50, 30, 'BEBIDA', '500 ML', '1500.00'),
(34, 'COCACOLA', 'DELICIOSA BEBIDA COCACOLA TRADICIONAL', 'MEDIA/COCACOLA.JPG', 20, 50, 30, 'BEBIDA', '1 LT', '1900.00'),
(35, 'COCACOLA', 'DELICIOSA BEBIDA COCACOLA TRADICIONAL', 'MEDIA/COCACOLA.JPG', 20, 50, 30, 'BEBIDA', '1.25 LT', '2500.00'),
(36, 'COCACOLA', 'DELICIOSA BEBIDA COCACOLA TRADICIONAL', 'MEDIA/COCACOLA.JPG', 20, 50, 30, 'BEBIDA', '2.5 LT', '3000.00'),
(37, 'PEPSI', 'DELICIOSA BEBIDA PEPSI TRADICIONAL', 'MEDIA/PEPSI.JPG', 20, 50, 30, 'BEBIDA', '250 ML', '1100.00'),
(38, 'PEPSI', 'DELICIOSA BEBIDA PEPSI TRADICIONAL', 'MEDIA/PEPSI.JPG', 20, 50, 30, 'BEBIDA', '350 ML', '1400.00'),
(39, 'PEPSI', 'DELICIOSA BEBIDA PEPSI TRADICIONAL', 'MEDIA/PEPSI.JPG', 20, 50, 30, 'BEBIDA', '500 ML', '1800.00'),
(40, 'PEPSI', 'DELICIOSA BEBIDA PEPSI TRADICIONAL', 'MEDIA/PEPSI.JPG', 20, 50, 30, 'BEBIDA', '1 LT', '2400.00'),
(41, 'PEPSI', 'DELICIOSA BEBIDA PEPSI TRADICIONAL', 'MEDIA/PEPSI.JPG', 20, 50, 30, 'BEBIDA', '1.25 LT', '3100.00'),
(42, 'JUGO NARANJA', 'DELICIOSO JUGO NARANJA', 'MEDIA/PEPSI.JPG', 20, 50, 30, 'BEBIDA', '250 ML', '1400.00'),
(43, 'JUGO NARANJA', 'DELICIOSO JUGO NARANJA', 'MEDIA/PEPSI.JPG', 20, 50, 30, 'BEBIDA', '350 ML', '1700.00'),
(44, 'JUGO NARANJA', 'DELICIOSO JUGO NARANJA', 'MEDIA/PEPSI.JPG', 20, 50, 30, 'BEBIDA', '500 ML', '2100.00'),
(45, 'JUGO NARANJA', 'DELICIOSO JUGO NARANJA', 'MEDIA/PEPSI.JPG', 20, 50, 30, 'BEBIDA', '1 LT', '2900.00'),
(46, 'LASAÑA', 'PLATO QUE TIENE PASTA EN LÁMINAS INTERCALADAS CON CARNE Y BECHAMEL LLAMADO LASAÑA AL HORNO', 'MEDIA/LASAÑA.JPG', NULL, NULL, NULL, 'PASTA', 'UNICO', '15000.00'),
(47, 'LASAÑA CON CARNE', 'PLATO QUE TIENE PASTA EN LÁMINAS INTERCALADAS CON CARNE TERNERA', 'MEDIA/LASAÑACARNE.JPG', NULL, NULL, NULL, 'PASTA', 'UNICO', '16000.00'),
(48, 'LASAÑA CON POLLO', 'PLATO QUE TIENE PASTA EN LÁMINAS INTERCALADAS CON POLLO', 'MEDIA/LASAÑAPOLLO.JPG', NULL, NULL, NULL, 'PASTA', 'UNICO', '16000.00'),
(49, 'RAVIOLI', 'PASTA RELLENA CON DIFERENTES INGREDIENTES', 'MEDIA/RAVIOLI.JPG', NULL, NULL, NULL, 'PASTA', 'UNICO', '10000.00'),
(50, 'SPAGHETTI A LA BOLOÑESA', 'PASTA ACOMPAÑADA CON SALSA BOLOÑESA', 'MEDIA/SPAGHETTI_BOLOÑESA.JPG', NULL, NULL, NULL, 'PASTA', 'UNICO', '16000.00'),
(51, 'ENSALADA DE PASTA, QUESO Y ALBAHACA', 'ENSALADA DE PASTA, QUESO Y ALBAHACA', 'MEDIA/ENSALADA_PQA.JPG', NULL, NULL, NULL, 'ENSALADA', 'UNICO', '8000.00'),
(52, 'ENSALADA DE PEPINO Y YOGURT GRIEGO', 'ENSALADA DE PEPINO Y YOGURT GRIEGO', 'MEDIA/ENSALADA_PYG.JPG', NULL, NULL, NULL, 'ENSALADA', 'UNICO', '8000.00'),
(53, 'PALITOS DE QUESO', 'DELICIOSO HOJALDRE SUPERRELLENO DE QUESO DOBLE CREMA Y UN TOQUE SECRETO', 'MEDIA/PALITOS_QUESO.JPG', NULL, NULL, NULL, 'ACOMPAÑANTE', 'UNICO', '8000.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `Rol` varchar(45) NOT NULL COMMENT 'describe si el rol es cliente empleado o  gerente  ',
  `estado_rol` tinyint(4) NOT NULL,
  PRIMARY KEY (`Rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`Rol`, `estado_rol`) VALUES
('ADMINISTRADOR', 1),
('CLIENTE', 1),
('EMPLEADO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tamaño`
--

DROP TABLE IF EXISTS `tamaño`;
CREATE TABLE IF NOT EXISTS `tamaño` (
  `tamaño` varchar(50) NOT NULL COMMENT 'Describe el tamaño del producto. ',
  `estado_tamaño` varchar(45) NOT NULL,
  PRIMARY KEY (`tamaño`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tamaño`
--

INSERT INTO `tamaño` (`tamaño`, `estado_tamaño`) VALUES
('1 LT', '1'),
('1.25 LT', '1'),
('2.5 LT', '1'),
('250 ML', '1'),
('350 ML', '1'),
('500 ML', '1'),
('EXTRA GRANDE', '1'),
('FAMILIAR', '1'),
('GRANDE', '1'),
('MEDIANA', '1'),
('PEQUEÑA', '1'),
('UNICO', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_doc`
--

DROP TABLE IF EXISTS `tipo_doc`;
CREATE TABLE IF NOT EXISTS `tipo_doc` (
  `tipo_doc` varchar(45) NOT NULL COMMENT 'describe si el documento es CC, TI, CE, etc.',
  `estado_tipo_doc` tinyint(4) NOT NULL,
  PRIMARY KEY (`tipo_doc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_doc`
--

INSERT INTO `tipo_doc` (`tipo_doc`, `estado_tipo_doc`) VALUES
('CEDULA DE CIUDADANIA', 1),
('CEDULA DE EXTRANGERIA', 1),
('TARGETA DE IDENTIDAD', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

DROP TABLE IF EXISTS `tipo_producto`;
CREATE TABLE IF NOT EXISTS `tipo_producto` (
  `tipo_prod` varchar(50) NOT NULL COMMENT 'Describe el tipo de producto (pizza, postre, bebida, etc).',
  `estado_tipo_prod` tinyint(4) NOT NULL,
  PRIMARY KEY (`tipo_prod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`tipo_prod`, `estado_tipo_prod`) VALUES
('ACOMPAÑANTE', 1),
('BEBIDA', 1),
('ENSALADA', 1),
('PASTA', 1),
('PIZZA', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD CONSTRAINT `fk_domicilio_estado_domicilio1` FOREIGN KEY (`estado_domicilio_Estado_dom`) REFERENCES `estado_domicilio` (`Estado_dom`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_domicilio_pizzeria1` FOREIGN KEY (`pizzeria_Nit_Pizzeria`) REFERENCES `pizzeria` (`Nit_Pizzeria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `domicilio_has_producto`
--
ALTER TABLE `domicilio_has_producto`
  ADD CONSTRAINT `fk_domicilio_has_producto_domicilio1` FOREIGN KEY (`domicilio_Cod_dom`) REFERENCES `domicilio` (`Cod_dom`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_domicilio_has_producto_producto1` FOREIGN KEY (`producto_Cod_producto`) REFERENCES `producto` (`Cod_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `opinion`
--
ALTER TABLE `opinion`
  ADD CONSTRAINT `fk_opinion_persona1` FOREIGN KEY (`persona_Num_Documento_per`,`persona_tipo_doc`) REFERENCES `persona` (`Num_Documento_per`, `tipo_doc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `fk_persona_rol1` FOREIGN KEY (`rol_Rol`) REFERENCES `rol` (`Rol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_persona_tipo_doc1` FOREIGN KEY (`tipo_doc`) REFERENCES `tipo_doc` (`tipo_doc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `persona_has_domicilio`
--
ALTER TABLE `persona_has_domicilio`
  ADD CONSTRAINT `fk_persona_has_domicilio_domicilio1` FOREIGN KEY (`domicilio_Cod_dom`) REFERENCES `domicilio` (`Cod_dom`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_persona_has_domicilio_persona1` FOREIGN KEY (`persona_Num_Documento_per`,`persona_tipo_doc_tipo_doc`) REFERENCES `persona` (`Num_Documento_per`, `tipo_doc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_tamaño1` FOREIGN KEY (`tamaño_tamaño`) REFERENCES `tamaño` (`tamaño`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_producto_tipo_producto1` FOREIGN KEY (`tipo_producto_tipo_prod`) REFERENCES `tipo_producto` (`tipo_prod`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
