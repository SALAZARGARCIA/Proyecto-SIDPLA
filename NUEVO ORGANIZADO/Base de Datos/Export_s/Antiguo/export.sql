-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2017 a las 12:16:46
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
  `Cod_dom` int(11) NOT NULL COMMENT 'Es el codigo por el cual de identifica el domicilio.',
  `Fecha_Hora` date DEFAULT NULL COMMENT AS `Es la fecha en la que se realizo el domicilio.`,
  `Valor_Total` decimal(10,3) DEFAULT NULL COMMENT AS `Es la suma de los valores subtotales.`,
  `Estado_domicilio` int(11) NOT NULL COMMENT 'Describe el estado del domicilio (entregado, no entregado)',
  `Nit_Pizzeria` bigint(20) NOT NULL COMMENT 'Número de identificación de  la pizzería. ',
  `Observacion_dom` varchar(123) DEFAULT NULL COMMENT AS `Observaciones acerca del domicilio. `
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilio_has_producto`
--

CREATE TABLE `domicilio_has_producto` (
  `Domicilio_Cod_dom` int(11) NOT NULL COMMENT 'Es el codigo por el cual de identifica el domicilio.',
  `Producto_Cod_producto` int(11) NOT NULL COMMENT 'Es el codigo por el cual se identifica el producto.',
  `Cantidad` int(5) UNSIGNED NOT NULL COMMENT 'Cantidad de productos elegidos por el cliente.',
  `Valor_subtotal` decimal(10,2) NOT NULL COMMENT 'Es la multiplicación del valor unitario del producto por la cantidad pedida por la persona.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_domicilio`
--

CREATE TABLE `estado_domicilio` (
  `Cod_Estado_dom` int(11) NOT NULL COMMENT 'Código del estado del domicilio. ',
  `Desc_estado_dom` varchar(45) NOT NULL COMMENT 'Describe el estado del domicilio (entregado, no entregado)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_pago`
--

CREATE TABLE `forma_pago` (
  `Cod_Forma_pago` int(11) NOT NULL COMMENT 'Es el codigo por el cual se identifica la forma por la cual se va a pagar.',
  `Desc_fpago` varchar(45) NOT NULL COMMENT 'Describe la forma por la cual se va a pagar (Efectivo, tarjeta de credito, etc..)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_pago_has_domicilio`
--

CREATE TABLE `forma_pago_has_domicilio` (
  `Cod_Forma_pago` int(11) NOT NULL COMMENT 'Es el codigo por el cual se identifica la forma por la cual se va a pagar.',
  `Cod_dom` int(11) NOT NULL COMMENT 'Es el codigo por el cual de identifica el domicilio.',
  `Monto` decimal(10,2) NOT NULL COMMENT 'Cantidad con la que paga el cliente su domicilio. '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opinion`
--

CREATE TABLE `opinion` (
  `Cod_Opinion` int(10) UNSIGNED NOT NULL COMMENT 'es el codigo  que identifica la opinion dada por la  persona ',
  `Opinion` varchar(200) NOT NULL COMMENT 'es la opinion dada por el cliente ',
  `Num_Documento_per` varchar(15) NOT NULL COMMENT 'es el numero de identificacion de la persona '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `Num_Documento_per` varchar(15) NOT NULL COMMENT 'es el numero de identificacion de la persona ',
  `Cod_tipo_doc` int(10) UNSIGNED NOT NULL COMMENT 'es el tipo de documento que tiene la persona',
  `Primer_Nombre_per` varchar(45) NOT NULL COMMENT 'es el nombre 1 de la persona ',
  `Segundo_Nombre_per` varchar(45) DEFAULT NULL COMMENT AS `es el nombre 2 de la persona `,
  `Primer_Apellido_per` varchar(45) NOT NULL COMMENT 'es el apellido 1 de la persona',
  `Segundo_Apellido_per` varchar(45) NOT NULL COMMENT 'es el apellido 2 de la persona ',
  `Usuario_login` varchar(45) NOT NULL COMMENT 'es el nombre de usuario con el que se identifica la persona para ingresar al sistema ',
  `Pass_login` varchar(45) NOT NULL COMMENT 'es la contraseña con la que la persona ingresa al sistema ',
  `Tel_per` bigint(15) DEFAULT NULL COMMENT AS `es el telefono en el que se pueda localizar a la persona `,
  `Cel_per` bigint(15) DEFAULT NULL COMMENT AS `es el telefono celular en el que se puede localizar a la persona `,
  `Direc_per` varchar(45) NOT NULL COMMENT 'es la direccion de vivienda de la persona ',
  `Correo_per` varchar(45) DEFAULT NULL COMMENT AS `es el correo electronico que utiliza la persona `
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_has_domicilio`
--

CREATE TABLE `persona_has_domicilio` (
  `Persona_Num_Documento_per` varchar(15) NOT NULL COMMENT 'es el numero de identificacion de la persona ',
  `Persona_Cod_tipo_doc` int(10) UNSIGNED NOT NULL COMMENT 'es el tipo de documento que tiene la persona',
  `Domicilio_Cod_dom` int(11) NOT NULL COMMENT 'Es el codigo por el cual de identifica el domicilio.'
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `Cod_producto` int(11) NOT NULL COMMENT 'Es el codigo por el cual se identifica el producto.',
  `Nom_prod` varchar(45) NOT NULL COMMENT 'Nombre por el que se identifica el producto.',
  `Desc_prod` varchar(100) NOT NULL COMMENT 'Descripción del producto.',
  `Foto_prod` varchar(70) NOT NULL COMMENT 'Imagen, foto por la que se identifica el producto.',
  `Tipo_producto` int(10) UNSIGNED NOT NULL COMMENT 'Tipo de producto ( pizza,bebidas, postres, etc).',
  `Stok_min` int(11) DEFAULT NULL COMMENT AS `Cantidad minima que puede existir del producto`,
  `Stok_max` int(11) DEFAULT NULL COMMENT AS `Cantidad maxima  que puede existir del producto`,
  `Cantidad_exist` int(11) DEFAULT NULL COMMENT AS `Numero total de unidades existentes del producto`
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_has_tamaño`
--

CREATE TABLE `producto_has_tamaño` (
  `Producto_Cod_producto` int(11) NOT NULL,
  `Tamaño_Cod_Tamaño` int(10) UNSIGNED NOT NULL,
  `Valor_prod` decimal(10,2) NOT NULL COMMENT 'Valor unitario del producto.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `Cod_rol` int(11) NOT NULL COMMENT 'codigo que identifica el rol de la persona',
  `Desc_rol` varchar(20) NOT NULL COMMENT 'describe si el rol es cliente empleado o  gerente  '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_has_persona`
--

CREATE TABLE `rol_has_persona` (
  `Rol_Cod_rol` int(11) NOT NULL COMMENT 'codigo que identifica el rol de la persona',
  `Persona_Num_Documento_per` varchar(15) NOT NULL COMMENT 'es el numero de identificacion de la persona ',
  `Persona_Cod_tipo_doc` int(10) UNSIGNED NOT NULL COMMENT 'es el tipo de documento que tiene la persona',
  `Estado_rol_per` tinyint(1) NOT NULL COMMENT 'Es el estado del rol (activo, inactivo, suspendido).'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tamaño`
--

CREATE TABLE `tamaño` (
  `Cod_Tamaño` int(10) UNSIGNED NOT NULL COMMENT 'Codigo por el que se identifica el tamaño del producto elegido.',
  `Desc_tamaño` varchar(45) NOT NULL COMMENT 'Describe el tamaño del producto. '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_doc`
--

CREATE TABLE `tipo_doc` (
  `Cod_tipo_doc` int(10) UNSIGNED NOT NULL COMMENT 'es el codigo del tipo de documento ',
  `Descripcion_tipo_doc` varchar(45) NOT NULL COMMENT 'describe si el documento es C:C, TI etc'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `Cod_tipo_prod` int(10) UNSIGNED NOT NULL COMMENT 'Codigo del tipo de producto',
  `Desc_tipo_prod` varchar(25) NOT NULL COMMENT 'Describe el tipo de producto (pizza, postre, bebida, etc).'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD PRIMARY KEY (`Cod_dom`,`Estado_domicilio`,`Nit_Pizzeria`),
  ADD KEY `fk_estado_dom_idx` (`Estado_domicilio`),
  ADD KEY `FK_Nit_Pizzeria_idx` (`Nit_Pizzeria`);

--
-- Indices de la tabla `domicilio_has_producto`
--
ALTER TABLE `domicilio_has_producto`
  ADD PRIMARY KEY (`Domicilio_Cod_dom`,`Producto_Cod_producto`),
  ADD KEY `fk_Domicilio_has_Producto_Producto1_idx` (`Producto_Cod_producto`),
  ADD KEY `fk_Domicilio_has_Producto_Domicilio1_idx` (`Domicilio_Cod_dom`);

--
-- Indices de la tabla `estado_domicilio`
--
ALTER TABLE `estado_domicilio`
  ADD PRIMARY KEY (`Cod_Estado_dom`);

--
-- Indices de la tabla `forma_pago`
--
ALTER TABLE `forma_pago`
  ADD PRIMARY KEY (`Cod_Forma_pago`);

--
-- Indices de la tabla `forma_pago_has_domicilio`
--
ALTER TABLE `forma_pago_has_domicilio`
  ADD PRIMARY KEY (`Cod_Forma_pago`,`Cod_dom`),
  ADD KEY `fk_Forma_pago_has_Domicilio_Domicilio1_idx` (`Cod_dom`),
  ADD KEY `fk_Forma_pago_has_Domicilio_Forma_pago1_idx` (`Cod_Forma_pago`);

--
-- Indices de la tabla `opinion`
--
ALTER TABLE `opinion`
  ADD PRIMARY KEY (`Cod_Opinion`,`Num_Documento_per`),
  ADD KEY `fk_Num_Documento_per_idx` (`Num_Documento_per`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`Num_Documento_per`,`Cod_tipo_doc`),
  ADD UNIQUE KEY `Usuario_login_UNIQUE` (`Usuario_login`),
  ADD KEY `fk_Cod_tipo_doc_idx` (`Cod_tipo_doc`);

--
-- Indices de la tabla `persona_has_domicilio`
--
ALTER TABLE `persona_has_domicilio`
  ADD PRIMARY KEY (`Persona_Num_Documento_per`,`Persona_Cod_tipo_doc`,`Domicilio_Cod_dom`),
  ADD KEY `fk_Persona_has_Domicilio_Domicilio1_idx` (`Domicilio_Cod_dom`),
  ADD KEY `fk_Persona_has_Domicilio_Persona1_idx` (`Persona_Num_Documento_per`,`Persona_Cod_tipo_doc`);

--
-- Indices de la tabla `pizzeria`
--
ALTER TABLE `pizzeria`
  ADD PRIMARY KEY (`Nit_Pizzeria`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`Cod_producto`,`Tipo_producto`),
  ADD KEY `fk_Producto_Tipo_producto1_idx` (`Tipo_producto`);

--
-- Indices de la tabla `producto_has_tamaño`
--
ALTER TABLE `producto_has_tamaño`
  ADD PRIMARY KEY (`Producto_Cod_producto`,`Tamaño_Cod_Tamaño`),
  ADD KEY `fk_Producto_has_Tamaño_Tamaño1_idx` (`Tamaño_Cod_Tamaño`),
  ADD KEY `fk_Producto_has_Tamaño_Producto1_idx` (`Producto_Cod_producto`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`Cod_rol`);

--
-- Indices de la tabla `rol_has_persona`
--
ALTER TABLE `rol_has_persona`
  ADD PRIMARY KEY (`Rol_Cod_rol`,`Persona_Num_Documento_per`,`Persona_Cod_tipo_doc`),
  ADD KEY `fk_Rol_has_Persona_Persona1_idx` (`Persona_Num_Documento_per`,`Persona_Cod_tipo_doc`),
  ADD KEY `fk_Rol_has_Persona_Rol1_idx` (`Rol_Cod_rol`);

--
-- Indices de la tabla `tamaño`
--
ALTER TABLE `tamaño`
  ADD PRIMARY KEY (`Cod_Tamaño`);

--
-- Indices de la tabla `tipo_doc`
--
ALTER TABLE `tipo_doc`
  ADD PRIMARY KEY (`Cod_tipo_doc`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`Cod_tipo_prod`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `opinion`
--
ALTER TABLE `opinion`
  MODIFY `Cod_Opinion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'es el codigo  que identifica la opinion dada por la  persona ';
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `Cod_producto` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Es el codigo por el cual se identifica el producto.';
--
-- AUTO_INCREMENT de la tabla `tamaño`
--
ALTER TABLE `tamaño`
  MODIFY `Cod_Tamaño` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Codigo por el que se identifica el tamaño del producto elegido.';
--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `Cod_tipo_prod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Codigo del tipo de producto';
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD CONSTRAINT `FK_Nit_Pizzeria` FOREIGN KEY (`Nit_Pizzeria`) REFERENCES `pizzeria` (`Nit_Pizzeria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_estado_dom` FOREIGN KEY (`Estado_domicilio`) REFERENCES `estado_domicilio` (`Cod_Estado_dom`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `domicilio_has_producto`
--
ALTER TABLE `domicilio_has_producto`
  ADD CONSTRAINT `fk_Domicilio_has_Producto_Domicilio1` FOREIGN KEY (`Domicilio_Cod_dom`) REFERENCES `domicilio` (`Cod_dom`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Domicilio_has_Producto_Producto1` FOREIGN KEY (`Producto_Cod_producto`) REFERENCES `producto` (`Cod_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `forma_pago_has_domicilio`
--
ALTER TABLE `forma_pago_has_domicilio`
  ADD CONSTRAINT `fk_Forma_pago_has_Domicilio_Domicilio1` FOREIGN KEY (`Cod_dom`) REFERENCES `domicilio` (`Cod_dom`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Forma_pago_has_Domicilio_Forma_pago1` FOREIGN KEY (`Cod_Forma_pago`) REFERENCES `forma_pago` (`Cod_Forma_pago`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `opinion`
--
ALTER TABLE `opinion`
  ADD CONSTRAINT `fk_Num_Documento_per` FOREIGN KEY (`Num_Documento_per`) REFERENCES `persona` (`Num_Documento_per`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `fk_Cod_tipo_doc` FOREIGN KEY (`Cod_tipo_doc`) REFERENCES `tipo_doc` (`Cod_tipo_doc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `persona_has_domicilio`
--
ALTER TABLE `persona_has_domicilio`
  ADD CONSTRAINT `fk_Persona_has_Domicilio_Domicilio1` FOREIGN KEY (`Domicilio_Cod_dom`) REFERENCES `domicilio` (`Cod_dom`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Persona_has_Domicilio_Persona1` FOREIGN KEY (`Persona_Num_Documento_per`,`Persona_Cod_tipo_doc`) REFERENCES `persona` (`Num_Documento_per`, `Cod_tipo_doc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_Producto_Tipo_producto1` FOREIGN KEY (`Tipo_producto`) REFERENCES `tipo_producto` (`Cod_tipo_prod`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto_has_tamaño`
--
ALTER TABLE `producto_has_tamaño`
  ADD CONSTRAINT `fk_Producto_has_Tamaño_Producto1` FOREIGN KEY (`Producto_Cod_producto`) REFERENCES `producto` (`Cod_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Producto_has_Tamaño_Tamaño1` FOREIGN KEY (`Tamaño_Cod_Tamaño`) REFERENCES `tamaño` (`Cod_Tamaño`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rol_has_persona`
--
ALTER TABLE `rol_has_persona`
  ADD CONSTRAINT `fk_Rol_has_Persona_Persona1` FOREIGN KEY (`Persona_Num_Documento_per`,`Persona_Cod_tipo_doc`) REFERENCES `persona` (`Num_Documento_per`, `Cod_tipo_doc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Rol_has_Persona_Rol1` FOREIGN KEY (`Rol_Cod_rol`) REFERENCES `rol` (`Cod_rol`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
