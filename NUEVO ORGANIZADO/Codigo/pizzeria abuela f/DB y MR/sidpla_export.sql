-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-07-2018 a las 00:41:08
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sidpla`
--
CREATE DATABASE IF NOT EXISTS `sidpla` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `sidpla`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilio`
--

CREATE TABLE `domicilio` (
  `Cod_dom` int(11) NOT NULL COMMENT 'Es el codigo por el cual de identifica el domicilio.',
  `Fecha` date DEFAULT NULL COMMENT 'Es la fecha en la que se realizo el domicilio.',
  `Direc_Dom` varchar(60) NOT NULL COMMENT 'es la direccion del destino del domicilio a entregar',
  `Valor_Total` decimal(10,0) DEFAULT NULL COMMENT 'Es la suma de los valores subtotales.',
  `Observacion_dom` varchar(123) DEFAULT NULL COMMENT 'Observaciones acerca del domicilio. ',
  `estado_domicilio_Estado_dom` varchar(50) NOT NULL,
  `pizzeria_Nit_Pizzeria` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `domicilio`
--

INSERT INTO `domicilio` (`Cod_dom`, `Fecha`, `Direc_Dom`, `Valor_Total`, `Observacion_dom`, `estado_domicilio_Estado_dom`, `pizzeria_Nit_Pizzeria`) VALUES
(1, '2018-07-23', 'Cll 63 F No. 74 - 25', '69600', 'Buenas tardes por favor la pizza en 6 porciones, gracias ', 'EN ESPERA', 801145012),
(2, '2018-07-23', 'Cll 63 F No. 74 - 25', '19700', 'Ninguna', 'EN ESPERA', 801145012);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilio_has_producto`
--

CREATE TABLE `domicilio_has_producto` (
  `domicilio_Cod_dom` int(11) NOT NULL,
  `producto_Cod_producto` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Valor_subtotal` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `domicilio_has_producto`
--

INSERT INTO `domicilio_has_producto` (`domicilio_Cod_dom`, `producto_Cod_producto`, `Cantidad`, `Valor_subtotal`) VALUES
(1, 6, 2, '66000'),
(1, 35, 1, '3600'),
(2, 43, 1, '1700'),
(2, 51, 1, '10000'),
(2, 54, 1, '8000');

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
  `persona_tipo_doc` varchar(45) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `opinion`
--

INSERT INTO `opinion` (`Cod_Opinion`, `Opinion`, `persona_Num_Documento_per`, `persona_tipo_doc`, `Fecha`) VALUES
(1, 'Me  gusta la pizzeria, muy buen servicio', '1033815398', 'CEDULA DE CIUDADANIA', '2018-07-23'),
(2, 'El tiempo que se demoro mi domicilio fue rapido, muy bien por eso.', '1031157939', 'CEDULA DE EXTRANGERIA', '2018-07-23'),
(3, 'Excelente servicio', '1031178887', 'CEDULA DE CIUDADANIA', '2018-07-23'),
(4, 'Me parece excelente que cuenten con el servicio web para los domicilios', '9900000001', 'CEDULA DE CIUDADANIA', '2018-07-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `Num_Documento_per` varchar(15) NOT NULL COMMENT 'es el numero de identificacion de la persona ',
  `Nombres` varchar(45) NOT NULL COMMENT 'es el nombre de la persona ',
  `Apellidos` varchar(45) NOT NULL COMMENT 'es el apellido de la persona ',
  `Pass_login` varchar(256) NOT NULL COMMENT 'es la contraseña con la que la persona ingresa al sistema ',
  `Tel_per` bigint(15) DEFAULT NULL COMMENT 'es el telefono en el que se pueda localizar a la persona ',
  `Cel_per` bigint(15) DEFAULT NULL COMMENT 'es el telefono celular en el que se puede localizar a la persona ',
  `Direc_per` varchar(60) NOT NULL COMMENT 'es la direccion de vivienda de la persona ',
  `Correo_per` varchar(45) DEFAULT NULL COMMENT 'es el correo electronico que utiliza la persona ',
  `tipo_doc` varchar(45) NOT NULL,
  `rol_Rol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`Num_Documento_per`, `Nombres`, `Apellidos`, `Pass_login`, `Tel_per`, `Cel_per`, `Direc_per`, `Correo_per`, `tipo_doc`, `rol_Rol`) VALUES
('1014304616', 'JULIANA GERALDIN', 'GARCIA CORREDOR', '$2y$10$w8fUh1lLC5aeaH/C58.4yOw714GavTbQ.yN7/icOs6VZf7mlw6Liy', 4008888, 3157301391, 'Av. Suba # 21 - 22', 'JGGARCIA176@MISENA.EDU.CO', 'CEDULA DE CIUDADANIA', 'CLIENTE'),
('1031157939', 'ALBERT HERNAN', 'QUINTERO VALENCIA', '$2y$10$w8fUh1lLC5aeaH/C58.4yOw714GavTbQ.yN7/icOs6VZf7mlw6Liy', 4008881, 3123654823, 'Cra 4 # 35 - 25 sur', 'AQUINTERO939@MISENA.EDU.CO', 'CEDULA DE EXTRANGERIA', 'EMPLEADO'),
('1031178887', 'JEISON ALEXANDER', 'DIAZ DAZA', '$2y$10$w8fUh1lLC5aeaH/C58.4yOw714GavTbQ.yN7/icOs6VZf7mlw6Liy', 4008888, 3203725972, 'Cra 24 # 50 - 20 sur', 'JADIAZ908@MISENA.EDU.CO', 'CEDULA DE CIUDADANIA', 'EMPLEADO'),
('1033815398', 'JUAN SEBASTIAN', 'RUIZ CASTAÑEDA', '$2y$10$w8fUh1lLC5aeaH/C58.4yOw714GavTbQ.yN7/icOs6VZf7mlw6Liy', 400889, 3022608970, 'Cll 63 F No. 74 - 25', 'JSRUIZ241@MISENA.EDU.CO', 'CEDULA DE CIUDADANIA', 'ADMINISTRADOR'),
('9900000001', 'FERNANDO JOSE', 'PRADA OTERO', '$2y$10$w8fUh1lLC5aeaH/C58.4yOw714GavTbQ.yN7/icOs6VZf7mlw6Liy', 4008882, 3102878826, 'Av. Calle 5 # 15 - 01 este', 'PRADA6@MISENA.EDU.CO', 'CEDULA DE CIUDADANIA', 'CLIENTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_has_domicilio`
--

CREATE TABLE `persona_has_domicilio` (
  `persona_Num_Documento_per` varchar(15) NOT NULL,
  `persona_tipo_doc` varchar(45) NOT NULL,
  `domicilio_Cod_dom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona_has_domicilio`
--

INSERT INTO `persona_has_domicilio` (`persona_Num_Documento_per`, `persona_tipo_doc`, `domicilio_Cod_dom`) VALUES
('1033815398', 'CEDULA DE CIUDADANIA', 1),
('1033815398', 'CEDULA DE CIUDADANIA', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pizzeria`
--

CREATE TABLE `pizzeria` (
  `Nit_Pizzeria` bigint(20) NOT NULL COMMENT 'Número de identificación de  la pizzería. ',
  `Nom_Pizzeria` varchar(45) NOT NULL COMMENT 'Nombre de la pìzzería. ',
  `Dir_Pizzeria` varchar(50) NOT NULL COMMENT 'dirección de la pizzería. ',
  `Tel_Pizzeria` bigint(15) NOT NULL COMMENT 'Número Telefónico fijo de la pìzzería. ',
  `Cel_Pizzeria` bigint(15) DEFAULT NULL COMMENT 'Número de celular de la pizzería. '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pizzeria`
--

INSERT INTO `pizzeria` (`Nit_Pizzeria`, `Nom_Pizzeria`, `Dir_Pizzeria`, `Tel_Pizzeria`, `Cel_Pizzeria`) VALUES
(801145012, 'PIZZERIA ABUELA T.P.', 'CALLE 65 Sur # 15 - 20', 4008887, 3105320621),
(801145023, 'PIZZERIA ABUELA LA 40', 'CALLE 40 Sur # 36 - 16', 555504, 3108475963);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `Cod_producto` int(11) NOT NULL COMMENT 'Es el codigo por el cual se identifica el producto.',
  `Nom_prod` varchar(45) NOT NULL COMMENT 'Nombre por el que se identifica el producto.',
  `Desc_prod` varchar(100) NOT NULL COMMENT 'Descripción del producto.',
  `Foto_prod` varchar(70) NOT NULL COMMENT 'Imagen, foto por la que se identifica el producto.',
  `Stok_min` int(11) DEFAULT NULL COMMENT 'Cantidad minima que puede existir del producto',
  `Stok_max` int(11) DEFAULT NULL COMMENT 'Cantidad maxima  que puede existir del producto',
  `Cantidad_exist` int(11) DEFAULT NULL COMMENT 'Numero total de unidades existentes del producto',
  `tipo_producto_tipo_prod` varchar(50) NOT NULL,
  `tamaño_tamaño` varchar(50) NOT NULL,
  `Valor_unitario` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`Cod_producto`, `Nom_prod`, `Desc_prod`, `Foto_prod`, `Stok_min`, `Stok_max`, `Cantidad_exist`, `tipo_producto_tipo_prod`, `tamaño_tamaño`, `Valor_unitario`) VALUES
(1, 'Pizza Hawaiana', 'Pizza con jamon, queso y piña', 'HAWAIANAPEQ.jpg', NULL, NULL, NULL, 'PIZZA', 'PEQUEÑA', '33000'),
(2, 'Pizza Hawaiana', 'Pizza con jamon, queso y piña', 'HAWAIANAMED.jpg', NULL, NULL, NULL, 'PIZZA', 'MEDIANA', '38000'),
(3, 'Pizza Hawaiana', 'Pizza con jamon, queso y piña', 'HAWAIANAGRANDE.jpg', NULL, NULL, NULL, 'PIZZA', 'GRANDE', '41000'),
(4, 'Pizza Hawaiana', 'Pizza con jamon, queso y piña', 'HAWAIANAFAMILIAR.jpg', NULL, NULL, NULL, 'PIZZA', 'FAMILIAR', '42000'),
(5, 'Pizza Hawaiana', 'Pizza con jamon, queso y piña', 'HAWAIANAEXTRAGRANDE.jpg', NULL, NULL, NULL, 'PIZZA', 'EXTRA GRANDE', '45000'),
(6, 'Pizza Peperoni', 'Pizza con peperoni, champiñon y queso', 'PEPPERONIPEQUE.jpg', NULL, NULL, NULL, 'PIZZA', 'PEQUEÑA', '33000'),
(7, 'Pizza Peperoni', 'Pizza con peperoni, champiñon y queso', 'PEPPERONIMEDIANA.jpg', NULL, NULL, NULL, 'PIZZA', 'MEDIANA', '38000'),
(8, 'Pizza Peperoni', 'Pizza con peperoni, champiñon y queso', 'PEPPERONIGRANDE.jpg', NULL, NULL, NULL, 'PIZZA', 'GRANDE', '41000'),
(9, 'Pizza Peperoni', 'Pizza con peperoni, champiñon y queso', 'PEPPERONIFAMILAIR.jpg', NULL, NULL, NULL, 'PIZZA', 'FAMILIAR', '42000'),
(10, 'Pizza Peperoni', 'Pizza con peperoni, champiñon y queso', 'PEPPERONIEXTRAGRANDE.jpg', NULL, NULL, NULL, 'PIZZA', 'EXTRA GRANDE', '45000'),
(11, 'Pizza Mexicana', 'Pizza con carne molida, cebolla, tomate, pimenton, jalapeños, queso y maizitos', 'MEXICANAPEQUENIA.jpg', NULL, NULL, NULL, 'PIZZA', 'PEQUEÑA', '33000'),
(12, 'Pizza Mexicana', 'Pizza con carne molida, cebolla, tomate, pimenton, jalapeños, queso y maizitos', 'MEXICANAMEDIANA.jpg', NULL, NULL, NULL, 'PIZZA', 'MEDIANA', '38000'),
(13, 'Pizza Mexicana', 'Pizza con carne molida, cebolla, tomate, pimenton, jalapeños, queso y maizitos', 'MEXICANAGRANDE.jpg', NULL, NULL, NULL, 'PIZZA', 'GRANDE', '41000'),
(14, 'Pizza Mexicana', 'Pizza con carne molida, cebolla, tomate, pimenton, jalapeños, queso y maizitos', 'MEXICANAFAMILIAR.jpg', NULL, NULL, NULL, 'PIZZA', 'FAMILIAR', '42000'),
(15, 'Pizza Mexicana', 'Pizza con carne molida, cebolla, tomate, pimenton, jalapeños, queso y maizitos', 'MEXICANAEXTRAGRANDE.jpg', NULL, NULL, NULL, 'PIZZA', 'EXTRA GRANDE', '45000'),
(16, 'Pizza Queso', 'Pizza rapleta de tus quesos favoritos', 'PIZZAQUESOPEQUENIA.jpg', NULL, NULL, NULL, 'PIZZA', 'PEQUEÑA', '33000'),
(17, 'Pizza Queso', 'Pizza rapleta de tus quesos favoritos', 'PIZZAQUESOMEDIANA.jpg', NULL, NULL, NULL, 'PIZZA', 'MEDIANA', '38000'),
(18, 'Pizza Queso', 'Pizza rapleta de tus quesos favoritos', 'PIZZAQUESOGRANDE.jpg', NULL, NULL, NULL, 'PIZZA', 'GRANDE', '41000'),
(19, 'Pizza Queso', 'Pizza rapleta de tus quesos favoritos', 'PIZZAQUESOFAMILIAR.jpg', NULL, NULL, NULL, 'PIZZA', 'FAMILIAR', '42000'),
(20, 'Pizza Queso', 'Pizza rapleta de tus quesos favoritos', 'PIZZAQUESOEXTRAGRANDE.jpg', NULL, NULL, NULL, 'PIZZA', 'EXTRA GRANDE', '45000'),
(21, 'Pizza Pollo y Champiñones', 'Pizza con champiñones, queso y pollo', 'CHAMPINIONESPEQUEÑA.jpg', NULL, NULL, NULL, 'PIZZA', 'PEQUEÑA', '33000'),
(22, 'Pizza Pollo y Champiñones', 'Pizza con champiñones, queso y pollo', 'CHAMPINIONESMEDIANA.jpg', NULL, NULL, NULL, 'PIZZA', 'MEDIANA', '38000'),
(23, 'Pizza Pollo y Champiñones', 'Pizza con champiñones, queso y pollo', 'CHAMPINIONESGRANDE.jpg', NULL, NULL, NULL, 'PIZZA', 'GRANDE', '41000'),
(24, 'Pizza Pollo y Champiñones', 'Pizza con champiñones, queso y pollo', 'CHAMPINIONESFAMILIAR.jpg', NULL, NULL, NULL, 'PIZZA', 'FAMILIAR', '42000'),
(25, 'Pizza Pollo y Champiñones', 'Pizza con champiñones, queso y pollo', 'CHAMPINIONESEXTRAGRANDE.jpg', NULL, NULL, NULL, 'PIZZA', 'EXTRA GRANDE', '45000'),
(26, 'Pizza Vegetariana', 'Pizza con cabolla, pimenton, mazorca, tomate, pepereni y queso', 'VEGETARIANAPEQUENIA.jpg', NULL, NULL, NULL, 'PIZZA', 'PEQUEÑA', '33000'),
(27, 'Pizza Vegetariana', 'Pizza con cabolla, pimenton, mazorca, tomate, pepereni y queso', 'VEGETARIANAMEDIANA.jpg', NULL, NULL, NULL, 'PIZZA', 'MEDIANA', '38000'),
(28, 'Pizza Vegetariana', 'Pizza con cabolla, pimenton, mazorca, tomate, pepereni y queso', 'VEGETARIANAGRANDE.jpg', NULL, NULL, NULL, 'PIZZA', 'GRANDE', '41000'),
(29, 'Pizza Vegetariana', 'Pizza con cabolla, pimenton, mazorca, tomate, pepereni y queso', 'VEGETARIANAFAMILIAR.jpg', NULL, NULL, NULL, 'PIZZA', 'FAMILIAR', '42000'),
(30, 'Pizza Vegetariana', 'Pizza con cabolla, pimenton, mazorca, tomate, pepereni y queso', 'VEGETARIANAEXTRAGRANDE.jpg', NULL, NULL, NULL, 'PIZZA', 'EXTRA GRANDE', '45000'),
(31, 'CocaCola', 'CocaCola tradicional', 'Cocacola250ml.jpg', 20, 50, 30, 'BEBIDA', '250 ML', '1100'),
(32, 'CocaCola', 'CocaCola tradicional', 'Cocacola350ml.jpg', 20, 50, 30, 'BEBIDA', '350 ML', '2200'),
(33, 'CocaCola', 'CocaCola tradicional', 'Cocacola500ml.jpg', 20, 50, 30, 'BEBIDA', '500 ML', '2800'),
(34, 'CocaCola', 'CocaCola tradicional', 'Cocacola1l.jpg', 20, 50, 30, 'BEBIDA', '1 LT', '3200'),
(35, 'CocaCola', 'CocaCola tradicional', 'Cocacola1.5l.jpg', 20, 50, 30, 'BEBIDA', '1.25 LT', '3600'),
(36, 'CocaCola', 'CocaCola tradicional', 'Cocacola2.5l.jpg', 20, 50, 30, 'BEBIDA', '2.5 LT', '4200'),
(37, 'Pepsi', 'Pepsi tradicional', 'Pepsi250ml.jpg', 20, 50, 30, 'BEBIDA', '250 ML', '1100'),
(38, 'Pepsi', 'Pepsi tradicional', 'Pepsi350ml.jpg', 20, 50, 30, 'BEBIDA', '350 ML', '2200'),
(39, 'Pepsi', 'Pepsi tradicional', 'Pepsi500ml.jpg', 20, 50, 30, 'BEBIDA', '500 ML', '2800'),
(40, 'Pepsi', 'Pepsi tradicional', 'Pepsi1l.jpg', 20, 50, 30, 'BEBIDA', '1 LT', '3200'),
(41, 'Pepsi', 'Pepsi tradicional', 'Pepsi1.25l.jpg', 20, 50, 30, 'BEBIDA', '1.25 LT', '3600'),
(43, 'Jugo Naranja', 'Jugo de naranja natural', 'JugoDeNaranja350ml.jpg', 20, 50, 30, 'BEBIDA', '350 ML', '1700'),
(45, 'Jugo Naranja', 'Jugo de naranja natural', 'JugoDeNaranja1l.jpg', 20, 50, 30, 'BEBIDA', '1 LT', '2900'),
(46, 'Cerveza Heinken', 'Cerveza Heinken', 'HEINEKEN.jpg', 20, 50, 30, 'BEBIDA', '350 ML', '3200'),
(47, 'Cerveza REDD\'S', 'Cerveza REDD\'S', 'redds.jpg', 20, 50, 30, 'BEBIDA', '350 ML', '3000'),
(48, 'Cerveza Pooker', 'Cerveza Pooker', 'poker.jpg', 20, 50, 30, 'BEBIDA', '350 ML', '2500'),
(49, 'Lasagna Con Carne', 'Pasta en laminas intercaladas con carne ternera', 'lasagnaDICARNE.jpg', NULL, NULL, NULL, 'PASTA', 'UNICO', '16000'),
(50, 'Lasagna con Pollo', 'Pasta en laminas intercaladas con pollo', 'LASAGNADIPOLLO.jpg', NULL, NULL, NULL, 'PASTA', 'UNICO', '16000'),
(51, 'Ravioli', 'Pasta con pollo, salsa a la bolognesa y queso', 'RAVIOLI.jpg', NULL, NULL, NULL, 'PASTA', 'UNICO', '10000'),
(52, 'Spaghuetti a la Bolognesa', 'Pasta acompañada con salsa bolognesa', 'SPAGHETTIALABOLOGNESA.jpg', NULL, NULL, NULL, 'PASTA', 'UNICO', '16000'),
(53, 'Ensalada de Pasta, Queso y Albahaca', 'Ensalada de pasta, queso y albahaca', 'ENSALADADEPASTAQUESOYALBAHACA.jpg', NULL, NULL, NULL, 'ENSALADA', 'UNICO', '8000'),
(54, 'Ensalada de Pepino y Yogurt Griego', 'Ensalada de Pepino y Yogurt Griego', 'ENSALADAPEPINO.jpg', NULL, NULL, NULL, 'ENSALADA', 'UNICO', '8000'),
(55, 'Palitos de Queso', 'Delicioso hojaldre superrelleeno de queso doble crema y un toque secreto', 'PALITOSDEQUESO.jpg', NULL, NULL, NULL, 'ACOMPAÑANTE', 'UNICO', '8000'),
(56, 'Queso', 'Añade una deliciosa porcion de queso a tu Pizza', 'ADQUESO.jpg', NULL, NULL, NULL, 'ADICIONALES', 'UNICO', '1000'),
(57, 'Piña', 'Añade una deliciosa porcion de Piña a tu Pizza', 'ADPIÑA.jpg', NULL, NULL, NULL, 'ADICIONALES', 'UNICO', '500'),
(58, 'Tocineta', 'Añade una deliciosa Tocineta a tu Pizza', 'ADTOCINETA.jpg', NULL, NULL, NULL, 'ADICIONALES', 'UNICO', '1000'),
(59, 'Pollo', 'Añade una deliciosa porcion de Pollo a tu Pizza', 'ADPOLLO.jpg', NULL, NULL, NULL, 'ADICIONALES', 'UNICO', '1000'),
(60, 'Salami', 'Añade una deliciosa porcion de Salami a tu Pizza', 'ADSALAMI.jpg', NULL, NULL, NULL, 'ADICIONALES', 'UNICO', '2000');

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
('PEQUEÑA', '1'),
('UNICO', '1');

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
('TARJETA DE IDENTIDAD', 1);

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
('ADICIONALES', 1),
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
  ADD KEY `fk_persona_tipo_doc1_idx` (`tipo_doc`),
  ADD KEY `fk_persona_rol1_idx` (`rol_Rol`);

--
-- Indices de la tabla `persona_has_domicilio`
--
ALTER TABLE `persona_has_domicilio`
  ADD PRIMARY KEY (`persona_Num_Documento_per`,`persona_tipo_doc`,`domicilio_Cod_dom`),
  ADD KEY `fk_persona_has_domicilio_domicilio1_idx` (`domicilio_Cod_dom`),
  ADD KEY `fk_persona_has_domicilio_persona1_idx` (`persona_Num_Documento_per`,`persona_tipo_doc`);

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
-- AUTO_INCREMENT de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  MODIFY `Cod_dom` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Es el codigo por el cual de identifica el domicilio.', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `opinion`
--
ALTER TABLE `opinion`
  MODIFY `Cod_Opinion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'es el codigo  que identifica la opinion dada por la  persona ', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `Cod_producto` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Es el codigo por el cual se identifica el producto.', AUTO_INCREMENT=61;
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
  ADD CONSTRAINT `fk_domicilio_has_producto_domicilio1` FOREIGN KEY (`domicilio_Cod_dom`) REFERENCES `domicilio` (`Cod_dom`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_domicilio_has_producto_producto1` FOREIGN KEY (`producto_Cod_producto`) REFERENCES `producto` (`Cod_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_persona_has_domicilio_domicilio1` FOREIGN KEY (`domicilio_Cod_dom`) REFERENCES `domicilio` (`Cod_dom`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_persona_has_domicilio_persona1` FOREIGN KEY (`persona_Num_Documento_per`,`persona_tipo_doc`) REFERENCES `persona` (`Num_Documento_per`, `tipo_doc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_tamaño1` FOREIGN KEY (`tamaño_tamaño`) REFERENCES `tamaño` (`tamaño`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_producto_tipo_producto1` FOREIGN KEY (`tipo_producto_tipo_prod`) REFERENCES `tipo_producto` (`tipo_prod`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
