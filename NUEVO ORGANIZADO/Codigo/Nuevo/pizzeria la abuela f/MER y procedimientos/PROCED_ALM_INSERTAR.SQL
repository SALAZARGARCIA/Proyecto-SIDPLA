/*-------------------------------------------------------------------│
│              PROCEDIMIENTO ALMACENADO INGRESAR PRODUCTO            │
│-------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Insertar_Producto(
 IN Cod_Producto INT,
 IN Nom_prod VARCHAR(45),
 IN Desc_prod VARCHAR(100),
 IN Foto_prod VARCHAR(70),
 IN Stok_min INT(11),
 IN Stok_max INT(11),
 IN Cantidad_exist INT(11),
 IN Tipo_producto VARCHAR(50),
 IN tamaño VARCHAR(50),
 IN Valor_prod DECIMAL(10,2)
 )
 BEGIN
 
 INSERT INTO PRODUCTO VALUES (Cod_Producto,Nom_prod,Desc_prod,Foto_prod,
 Stok_min,Stok_max,Cantidad_exist,Tipo_producto, tamaño, Valor_prod
 );

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
 IN Primer_Nombre_per VARCHAR(45),
 IN Segundo_Nombre_per VARCHAR(45),
 IN Primer_Apellido_per VARCHAR(45),
 IN Segundo_Apellido_per VARCHAR(45),
 IN Usuario_login VARCHAR(45),
 IN Pass_login VARCHAR(45),
 IN Tel_per BIGINT(15),
 IN Cel_per BIGINT(15),
 IN Direc_per VARCHAR(60),
 IN Correo_per VARCHAR(45),
 IN tipo_doc VARCHAR(45),
 IN rol_Rol VARCHAR(45)
 )
 BEGIN
 
 INSERT INTO PERSONA VALUES (Num_Documento_per,
 	Primer_Nombre_per, Segundo_Nombre_per, Primer_Apellido_per,
 	Segundo_Apellido_per, Usuario_login, Pass_login, Tel_per,Cel_per,
 	Direc_per, Correo_per,tipo_doc,rol_Rol);

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
 IN Opinion VARCHAR(250),
 IN Num_Documento_per VARCHAR(15),
 IN Tipo_Doc VARCHAR(45)
 )
 BEGIN
 
 INSERT INTO OPINION (Opinion,persona_Num_Documento_per,persona_tipo_doc) 
 VALUES (Opinion,Num_Documento_per,Tipo_Doc);

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
 IN tipo_docMD VARCHAR(45)
 )
 BEGIN

 INSERT INTO Tipo_Doc 
 VALUES(tipo_docMD,1);

 END//

 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/

/*-------------------------------------------------------------------│
│               PROCEDIMIENTO ALMACENADO INGRESAR ROL                │
│-------------------------------------------------------------------*/
 DELIMITER //
 CREATE PROCEDURE Insertar_ROL(
 IN RolMD VARCHAR(45)
 )
 BEGIN

 INSERT INTO rol VALUES(RolMD,1);

 END//

 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/

/*-------------------------------------------------------------------│
│             PROCEDIMIENTO ALMACENADO INGRESAR PIZZERIA             │
│-------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Insertar_Pizzeria(
 IN NIT_Pizzeria BIGINT(20),
 IN Nom_Pizzeria VARCHAR(45),
 IN Dir_Pizzeria VARCHAR(50),
 IN Tel_Pizzeria BIGINT(15),
 IN Cel_pzzeria BIGINT(15),
 IN Logo_pizzeria VARCHAR(70)
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
 IN tamañoMD VARCHAR(45)
 )
 BEGIN

 INSERT INTO TAMAÑO VALUES (tamañoMD,1);

 END//

 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/

/*-------------------------------------------------------------------│
│          PROCEDIMIENTO ALMACENADO INGRESAR TIPO PRODUCTO           │
│-------------------------------------------------------------------*/
 DELIMITER //
 CREATE PROCEDURE Insertar_Tipo_Prod(
 IN Tipo_prodMD VARCHAR(50)
 )
 BEGIN

 INSERT INTO Tipo_producto VALUES (tipo_prodMD,1);

 END//

 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/





