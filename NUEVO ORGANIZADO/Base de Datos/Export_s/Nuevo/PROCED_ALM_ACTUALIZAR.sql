/*-------------------------------------------------------------------│
│            PROCEDIMIENTO ALMACENADO ACTUALIZAR PRODUCTO            │
│-------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Actualizar_Producto(
 IN oldCod_Producto INT,
 IN newNom_prod VARCHAR(45),
 IN newDesc_prod VARCHAR(100),
 IN newFoto_prod VARCHAR(70),
 IN newStok_min INT(11),
 IN newStok_max INT(11),
 IN newCantidad_exist INT(11),
 IN newTipo_producto VARCHAR(50),
 IN newtamaño_tamaño VARCHAR(50),
 IN newValor_prod DECIMAL(10,2)
 )
 BEGIN
 
 UPDATE PRODUCTO SET Nom_prod=newNom_prod,Desc_prod=newDesc_prod,Foto_prod=newFoto_prod,
 Stok_min=newStok_min,Stok_max=newStok_max,Cantidad_exist=newCantidad_exist,
 tipo_producto_tipo_prod=newTipo_producto, Tamaño_tamaño=newtamaño_tamaño, 
 Valor_unitario=newValor_prod WHERE Cod_Producto = oldCod_Producto;

 END//
 
 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/

/*-------------------------------------------------------------------│
│            PROCEDIMIENTO ALMACENADO ACTUALIZAR PERSONA             │
│-------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Actualizar_Persona(
 IN OLDNum_Documento_per VARCHAR(15),
 IN newPrimer_Nombre_per VARCHAR(45),
 IN newSegundo_Nombre_per VARCHAR(45),
 IN newPrimer_Apellido_per VARCHAR(45),
 IN newSegundo_Apellido_per VARCHAR(45),
 IN newUsuario_login VARCHAR(45),
 IN newPass_login VARCHAR(256),
 IN newTel_per BIGINT(15),
 IN newCel_per BIGINT(15),
 IN newDirec_per VARCHAR(60),
 IN newCorreo_per VARCHAR(45),
 IN newtipo_doc VARCHAR(45),
 IN newRol_rol VARCHAR(45),
 IN newEstado_r_has_p TINYINT,
 IN NEWNum_Documento_per VARCHAR(15)
 )
 BEGIN
 
 UPDATE PERSONA SET Num_Documento_per=NEWNum_Documento_per, Primer_Nombre_per=newPrimer_Nombre_per, Segundo_Nombre_per=newSegundo_Nombre_per,
 Primer_Apellido_per=newPrimer_Apellido_per, Segundo_Apellido_per=newSegundo_Apellido_per, Usuario_login=newUsuario_login, Pass_login=newPass_login, Tel_per=newTel_per,
 Cel_per=newCel_per, Direc_per=newDirec_per, Correo_per=newCorreo_per, tipo_doc=newtipo_doc, Rolrol=new_Rolrol WHERE  Num_Documento_per= OLDNum_Documento_per;

 END//
 
 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/

/*-------------------------------------------------------------------│
│            PROCEDIMIENTO ALMACENADO ACTUALIZAR PIZZERIA            │
│-------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Actualizar_Tipo_Doc(
 IN tipo_docA VARCHAR(50),
 IN estado_tipo_docu TINYINT,
 IN tipo_docN VARCHAR(50)

 )
 BEGIN
 
 UPDATE Tipo_Doc SET tipo_doc=tipo_docA,estado_tipo_doc=estado_tipo_docu
 WHERE tipo_doc = tipo_docN;

 END//
 
 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/

/*-------------------------------------------------------------------│
│            PROCEDIMIENTO ALMACENADO ACTUALIZAR ROL                 │
│-------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Actualizar_Rol(
 IN RolA VARCHAR(45),
 IN estado_roln TINYINT,
 IN RolN VARCHAR(50)

 )
 BEGIN
 
 UPDATE Rol SET Rol=RolN,estado_rol=estado_roln
 WHERE Rol = RolA;

 END//
 
 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/

/*-------------------------------------------------------------------│
│            PROCEDIMIENTO ALMACENADO ACTUALIZAR PIZZERIA            │
│-------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Actualizar_Pizzeria(
 IN Nit_Pizzerian BIGINT(20),
 IN Nom_Pizzerian VARCHAR(45),
 IN Dir_Pizzerian VARCHAR(50),
 IN Tel_Pizzerian BIGINT(15),
 IN Cel_Pizzerian BIGINT(15),
 IN Logo_Pizzerian VARCHAR(70)
 )
 BEGIN
 
 UPDATE Pizzeria SET Nit_Pizzeria=Nit_Pizzerian,Nom_Pizzeria=Nom_Pizzerian,
 Dir_Pizzeria=Dir_Pizzerian,Tel_Pizzeria=Tel_Pizzerian,
 Cel_Pizzeria=Cel_Pizzerian,Logo_Pizzeria=Logo_Pizzerian

 WHERE Nit_Pizzeria = Nit_Pizzerian;

 END//
 
 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/

/*-------------------------------------------------------------------│
│           PROCEDIMIENTO ALMACENADO ACTUALIZAR TAMAÑO               │
│-------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Actualizar_Tamaño(
 IN tamañoA VARCHAR(45),
 IN estado_tamañon TINYINT,
 IN tamañoN VARCHAR(50)

 )
 BEGIN
 
 UPDATE tamaño SET tamaño=tamañoN,estado_tamaño=estado_tamañon
 WHERE tamaño = tamañoA;

 END//
 
 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/

/*-------------------------------------------------------------------│
│         PROCEDIMIENTO ALMACENADO ACTUALIZAR TIPO PRODUCTO          │
│-------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Actualizar_Tipo_Prod(
 IN tipo_ProdA VARCHAR(50),
 IN estado_tipo_prodn TINYINT,
 IN tipo_ProdN VARCHAR(50)

 )
 BEGIN
 
 UPDATE tipo_prod SET tipo_Prod=tipo_ProdN,estado_tipo_prod=estado_tipo_prodn
 WHERE tipo_prod = tipo_ProdA;

 END//
 
 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/

