/*-------------------------------------------------------------------│
│              PROCEDIMIENTO ALMACENADO INGRESAR PRODUCTO            │
│-------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Insertar_Producto(
 IN Cod_Producto INT,
 IN Nom_prod VARCHAR(45),
 IN Desc_prod VARCHAR(100),
 IN Foto_prod VARCHAR(70),
 IN Tipo_producto INT,
 IN Stok_min INT,
 IN Stok_max INT,
 IN Cantidad_exist INT,
 IN Cod_tamaño INT,
 IN Valor_prod DECIMAL(10,2)
 )
 BEGIN
 
 INSERT INTO PRODUCTO VALUES (Cod_Producto,Nom_prod,Desc_prod,
 Foto_prod,Tipo_producto,Stok_min,Stok_max,Cantidad_exist
 );

 INSERT INTO PRODUCTO_HAS_TAMAÑO VALUES (Cod_Producto,Cod_tamaño,
 Valor_prod);

 END//
 
 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------------------------------*/

/*-------------------------------------------------------------------│
│              PROCEDIMIENTO ALMACENADO INGRESAR PERSONAS            │
│-------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Insertar_Persona(
 IN Num_Documento_per VARCHAR(15),
 IN Cod_tipo_doc INT,
 IN Primer_Nombre_per VARCHAR(45),
 IN Segundo_Nombre_per VARCHAR(45),
 IN Primer_Apellido_per VARCHAR(45),
 IN Segundo_Apellido_per VARCHAR(45),
 IN Usuario_login VARCHAR(45),
 IN Pass_login VARCHAR(45),
 IN Tel_per BIGINT(15),
 IN Cel_per BIGINT(15),
 IN Direc_per VARCHAR(45),
 IN Correo_per VARCHAR(45),
 IN Rol_Cod_rol INT
 )
 BEGIN
 
 INSERT INTO PERSONA VALUES (Num_Documento_per, Cod_tipo_doc,
 	Primer_Nombre_per, Segundo_Nombre_per, Primer_Apellido_per,
 	Segundo_Apellido_per, Usuario_login, Pass_login, Tel_per,Cel_per,
 	Direc_per, Correo_per);
 INSERT INTO ROL_has_PERSONA VALUES(Rol_Cod_rol,Num_Documento_per,
 	Cod_tipo_doc,1);

 END//
 
 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------------------------------*/

/*-------------------------------------------------------------------│
│              PROCEDIMIENTO ALMACENADO INGRESAR OPINION             │
│-------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Insertar_Opinion(
 IN Opinion VARCHAR(200),
 IN Num_Documento_per VARCHAR(15)
 )
 BEGIN
 
 INSERT INTO OPINION (Opinion,Num_Documento_per) 
 VALUES (Opinion,Num_Documento_per);

 END//
 
 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------------------------------*/

/*-------------------------------------------------------------------│
│       PROCEDIMIENTO ALMACENADO INGRESAR TIPO DE DOCUMENTO          │
│-------------------------------------------------------------------*/
 DELIMITER //
 CREATE PROCEDURE Insertar_Tipo_Doc(
 IN Descripcion_tipo_doc VARCHAR(45)
 )
 BEGIN

 INSERT INTO Tipo_Doc (Descripcion_tipo_doc) 
 VALUES(Descripcion_tipo_doc);

 END//

 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/

/*-------------------------------------------------------------------│
│               PROCEDIMIENTO ALMACENADO INGRESAR ROL                │
│-------------------------------------------------------------------*/
 DELIMITER //
 CREATE PROCEDURE Insertar_ROL(
 IN Descripcion_ROL VARCHAR(20)
 )
 BEGIN

 INSERT INTO Rol (Desc_rol) VALUES(Descripcion_ROL);

 END//

 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/

/*-------------------------------------------------------------------│
│         PROCEDIMIENTO ALMACENADO INGRESAR FORMA DE PAGO            │
│-------------------------------------------------------------------*/
 DELIMITER //
 CREATE PROCEDURE Insertar_Forma_Pago(
 IN Desc_fpago VARCHAR(45)
 )
 BEGIN

 INSERT INTO Forma_Pago (Desc_fpago) VALUES(Desc_fpago);

 END//

 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/


/*-------------------------------------------------------------------│
│             PROCEDIMIENTO ALMACENADO INGRESAR PIZZERIA             │
│-------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Insertar_Pizzeria(
 IN NIT_Pizzeria BIGINT,
 IN Nom_Pizzeria VARCHAR(45),
 IN Dir_Pizzeria VARCHAR(50),
 IN Tel_Pizzeria BIGINT,
 IN Cel_pzzeria BIGINT,
 IN Logo_pizzeria VARCHAR(70),
 )
 BEGIN
 
 INSERT INTO PIZZERIA VALUES (NIT_Pizzeria,Nom_Pizzeria,Dir_Pizzeria,
 Tel_Pizzeria,Cel_pzzeria,Logo_pizzeria);

 END//
 
 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/


/*-------------------------------------------------------------------│
│               PROCEDIMIENTO ALMACENADO INGRESAR TAMAÑO             │
│-------------------------------------------------------------------*/
 DELIMITER //
 CREATE PROCEDURE Insertar_Tamaño(
 IN Descripcion_tamaño VARCHAR(45)
 )
 BEGIN

 INSERT INTO TAMAÑO (Desc_tamaño) VALUES (Descripcion_tamaño);

 END//

 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/

/*-------------------------------------------------------------------│
│          PROCEDIMIENTO ALMACENADO INGRESAR TIPO PRODUCTO           │
│-------------------------------------------------------------------*/
 DELIMITER //
 CREATE PROCEDURE Insertar_Tipo_Prod(
 IN Desc_tipo_prod VARCHAR(25)
 )
 BEGIN

 INSERT INTO Tipo_producto (Desc_tipo_prod) VALUES (Desc_tipo_prod);

 END//

 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/

/*-------------------------------------------------------------------│
│       PROCEDIMIENTO ALMACENADO INGRESAR DOMICILIO AUN NO           │
│-------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Insertar_Domicilio(
 IN Persona_Num_Documento_Per VARCHAR(15),
 IN Persona_Cod_tipo_doc INT,
 IN Cod_Dom INT,
 IN Fecha_Dom Date,
 IN Hora_Dom DATETIME,
 IN Valor_Total DECIMAL(10,3),
 IN Estado_Domicilio INT,
 IN NIT_Pizzeria BIGINT,
 IN Observacion_Dom VARCHAR(123),
 IN Cod_Forma_Pago INT,
 IN Monto DECIMAL(10,3),
 IN Producto_Cod_producto INT,
 IN Cantidad INT(5),
 IN Valor_subtotal INT 
 )
 BEGIN
 
 INSERT INTO DOMICILIO VALUES (Cod_Opinion,Opinion,Num_Documento_per);

 END//
 
 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/



