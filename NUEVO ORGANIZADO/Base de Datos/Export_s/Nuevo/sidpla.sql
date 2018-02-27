-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-02-2018 a las 16:00:47
-- Versión del servidor: 5.7.11
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sidpla`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilio`
--

CREATE TABLE `domicilio` (
  `Cod_dom` varchar(45) NOT NULL COMMENT 'Es el codigo por el cual de identifica el domicilio.',
  `Fecha_Hora` date DEFAULT NULL COMMENT AS `Es la fecha en la que se realizo el domicilio.`,
  `Direc_Dom` varchar(60) NOT NULL COMMENT 'es la direccion del destino del domicilio a entregar',
  `Valor_Total` decimal(10,2) DEFAULT NULL COMMENT AS `Es la suma de los valores subtotales.`,
  `Observacion_dom` varchar(123) DEFAULT NULL COMMENT AS `Observaciones acerca del domicilio. `,
  `estado_domicilio_Estado_dom` varchar(50) NOT NULL,
  `pizzeria_Nit_Pizzeria` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilio_has_producto`
--

CREATE TABLE `domicilio_has_producto` (
  `domicilio_Cod_dom` varchar(45) NOT NULL,
  `producto_Cod_producto` int(11) NOT NULL,
  `Cantidad` int(5) NOT NULL,
  `Valor_subtotal` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_domicilio`
--

CREATE TABLE `estado_domicilio` (
  `Estado_dom` varchar(50) NOT NULL COMMENT 'Describe el estado del domicilio (entregado, no entregado)',
  `estado_e_dom` tinyint(4) NOT NULL
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

CREATE TABLE `opinion` (
  `Cod_Opinion` int(10) UNSIGNED NOT NULL COMMENT 'es el codigo  que identifica la opinion dada por la  persona ',
  `Opinion` varchar(250) NOT NULL COMMENT 'es la opinion dada por el cliente ',
  `persona_Num_Documento_per` varchar(15) NOT NULL,
  `persona_tipo_doc` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `Num_Documento_per` varchar(15) NOT NULL COMMENT 'es el numero de identificacion de la persona ',
  `Primer_Nombre_per` varchar(45) NOT NULL COMMENT 'es el nombre 1 de la persona ',
  `Segundo_Nombre_per` varchar(45) DEFAULT NULL COMMENT AS `es el nombre 2 de la persona `,
  `Primer_Apellido_per` varchar(45) NOT NULL COMMENT 'es el apellido 1 de la persona',
  `Segundo_Apellido_per` varchar(45) DEFAULT NULL COMMENT AS `es el apellido 2 de la persona `,
  `Usuario_login` varchar(45) NOT NULL COMMENT 'es el nombre de usuario con el que se identifica la persona para ingresar al sistema ',
  `Pass_login` varchar(256) NOT NULL COMMENT 'es la contraseña con la que la persona ingresa al sistema ',
  `Tel_per` bigint(15) DEFAULT NULL COMMENT AS `es el telefono en el que se pueda localizar a la persona `,
  `Cel_per` bigint(15) DEFAULT NULL COMMENT AS `es el telefono celular en el que se puede localizar a la persona `,
  `Direc_per` varchar(60) NOT NULL COMMENT 'es la direccion de vivienda de la persona ',
  `Correo_per` varchar(45) DEFAULT NULL COMMENT AS `es el correo electronico que utiliza la persona `,
  `tipo_doc` varchar(45) NOT NULL,
  `rol_Rol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`Num_Documento_per`, `Primer_Nombre_per`, `Segundo_Nombre_per`, `Primer_Apellido_per`, `Segundo_Apellido_per`, `Usuario_login`, `Pass_login`, `Tel_per`, `Cel_per`, `Direc_per`, `Correo_per`, `tipo_doc`, `rol_Rol`) VALUES
('1014304616', 'ulaina', 'juliana', 'Garcia', 'Garcia', 'Garcia', '$2y$10$5.RRoWHg2d4HRtBCCUj3F.lGVJmEOm5RVo.sGhGg292p1qE2BPsRO', 3157301391, 315730139, 'Garcia', 'Garcia@Garcia.com', 'cedula de ciudadania', 'CLIENTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_has_domicilio`
--

CREATE TABLE `persona_has_domicilio` (
  `persona_Num_Documento_per` varchar(15) NOT NULL,
  `persona_tipo_doc_tipo_doc` varchar(45) NOT NULL,
  `domicilio_Cod_dom` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pizzeria`
--

CREATE TABLE `pizzeria` (
  `Nit_Pizzeria` bigint(20) NOT NULL COMMENT 'Número de identificación de  la pizzería. ',
  `Nom_Pizzeria` varchar(45) NOT NULL COMMENT 'Nombre de la pìzzería. ',
  `Dir_Pizzeria` varchar(50) NOT NULL COMMENT 'dirección de la pizzería. ',
  `Tel_Pizzeria` bigint(15) NOT NULL COMMENT 'Número Telefónico fijo de la pìzzería. ',
  `Cel_Pizzeria` bigint(15) DEFAULT NULL COMMENT AS `Número de celular de la pizzería. `,
  `Logo_Pizzeria` varchar(70) NOT NULL COMMENT 'Logotipo de la pizzería. '
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

CREATE TABLE `producto` (
  `Cod_producto` int(11) NOT NULL COMMENT 'Es el codigo por el cual se identifica el producto.',
  `Nom_prod` varchar(45) NOT NULL COMMENT 'Nombre por el que se identifica el producto.',
  `Desc_prod` varchar(100) NOT NULL COMMENT 'Descripción del producto.',
  `Foto_prod` varchar(70) NOT NULL COMMENT 'Imagen, foto por la que se identifica el producto.',
  `Stok_min` int(11) DEFAULT NULL COMMENT AS `Cantidad minima que puede existir del producto`,
  `Stok_max` int(11) DEFAULT NULL COMMENT AS `Cantidad maxima  que puede existir del producto`,
  `Cantidad_exist` int(11) DEFAULT NULL COMMENT AS `Numero total de unidades existentes del producto`,
  `tipo_producto_tipo_prod` varchar(50) NOT NULL,
  `tamaño_tamaño` varchar(50) NOT NULL,
  `Valor_unitario` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(45, 'JUGO NARANJA', 'DELICIOSO JUGO NARANJA', 'MEDIA/PEPSI.JPG', 20, 50, 30, 'BEBIDA', '1 LT', '2900.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `Rol` varchar(45) NOT NULL COMMENT 'describe si el rol es cliente empleado o  gerente  ',
  `estado_rol` tinyint(4) NOT NULL
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

CREATE TABLE `tamaño` (
  `tamaño` varchar(50) NOT NULL COMMENT 'Describe el tamaño del producto. ',
  `estado_tamaño` varchar(45) NOT NULL
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
('PEQUEÑA', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_doc`
--

CREATE TABLE `tipo_doc` (
  `tipo_doc` varchar(45) NOT NULL COMMENT 'describe si el documento es CC, TI, CE, etc.',
  `estado_tipo_doc` tinyint(4) NOT NULL
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

CREATE TABLE `tipo_producto` (
  `tipo_prod` varchar(50) NOT NULL COMMENT 'Describe el tipo de producto (pizza, postre, bebida, etc).',
  `estado_tipo_prod` tinyint(4) NOT NULL
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
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD PRIMARY KEY (`Cod_dom`),
  ADD KEY `fk_domicilio_estado_domicilio1_idx` (`estado_domicilio_Estado_dom`),
  ADD KEY `fk_domicilio_pizzeria1_idx` (`pizzeria_Nit_Pizzeria`);

--
-- Indices de la tabla `domicilio_has_producto`
--
ALTER TABLE `domicilio_has_producto`
  ADD PRIMARY KEY (`domicilio_Cod_dom`,`producto_Cod_producto`),
  ADD KEY `fk_domicilio_has_producto_producto1_idx` (`producto_Cod_producto`),
  ADD KEY `fk_domicilio_has_producto_domicilio1_idx` (`domicilio_Cod_dom`);

--
-- Indices de la tabla `estado_domicilio`
--
ALTER TABLE `estado_domicilio`
  ADD PRIMARY KEY (`Estado_dom`);

--
-- Indices de la tabla `opinion`
--
ALTER TABLE `opinion`
  ADD PRIMARY KEY (`Cod_Opinion`),
  ADD KEY `fk_opinion_persona1_idx` (`persona_Num_Documento_per`,`persona_tipo_doc`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`Num_Documento_per`,`tipo_doc`),
  ADD UNIQUE KEY `Usuario_login_UNIQUE` (`Usuario_login`),
  ADD KEY `fk_persona_tipo_doc1_idx` (`tipo_doc`),
  ADD KEY `fk_persona_rol1_idx` (`rol_Rol`);

--
-- Indices de la tabla `persona_has_domicilio`
--
ALTER TABLE `persona_has_domicilio`
  ADD PRIMARY KEY (`persona_Num_Documento_per`,`persona_tipo_doc_tipo_doc`,`domicilio_Cod_dom`),
  ADD KEY `fk_persona_has_domicilio_domicilio1_idx` (`domicilio_Cod_dom`),
  ADD KEY `fk_persona_has_domicilio_persona1_idx` (`persona_Num_Documento_per`,`persona_tipo_doc_tipo_doc`);

--
-- Indices de la tabla `pizzeria`
--
ALTER TABLE `pizzeria`
  ADD PRIMARY KEY (`Nit_Pizzeria`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`Cod_producto`),
  ADD KEY `fk_producto_tipo_producto1_idx` (`tipo_producto_tipo_prod`),
  ADD KEY `fk_producto_tamaño1_idx` (`tamaño_tamaño`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`Rol`);

--
-- Indices de la tabla `tamaño`
--
ALTER TABLE `tamaño`
  ADD PRIMARY KEY (`tamaño`);

--
-- Indices de la tabla `tipo_doc`
--
ALTER TABLE `tipo_doc`
  ADD PRIMARY KEY (`tipo_doc`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`tipo_prod`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `opinion`
--
ALTER TABLE `opinion`
  MODIFY `Cod_Opinion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'es el codigo  que identifica la opinion dada por la  persona ', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `Cod_producto` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Es el codigo por el cual se identifica el producto.', AUTO_INCREMENT=46;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
