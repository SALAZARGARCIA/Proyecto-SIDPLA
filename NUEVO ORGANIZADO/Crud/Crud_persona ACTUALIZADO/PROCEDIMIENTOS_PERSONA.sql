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
 IN Pass_login VARCHAR(270),
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


/*--------------------------------------------------------------------------------------------------------------------------------------------------------│
│                                                      PROCEDIMIENTO ALMACENADO LISTAR PERSONA                                                            │
│--------------------------------------------------------------------------------------------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Listar_Persona()
 BEGIN
 
 SELECT * FROM PERSONA;
 

 END//
 
 DELIMITER ;
/*             											                                                                                                 │
│-------------------------------------------------------------------------------------------------------------------------------------------------------*/

/*--------------------------------------------------------------------------------------------------------------------------------------------------------│
│                                                      PROCEDIMIENTO ALMACENADO OBTENER PERSONA                                                           │
│--------------------------------------------------------------------------------------------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Obtener_Persona(
 IN Num_Documento_perMD VARCHAR(15)
 )
 BEGIN
 
 SELECT * FROM PERSONA WHERE Num_Documento_per=Num_Documento_perMD;
 

 END//
 
 DELIMITER ;
/*             											                                                                                                 │
│-------------------------------------------------------------------------------------------------------------------------------------------------------*/

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
 IN newrol_Rol VARCHAR(45),
 IN NEWNum_Documento_per VARCHAR(15)
 )
 BEGIN
 
 UPDATE PERSONA SET Num_Documento_per=NEWNum_Documento_per, tipo_doc=newtipo_doc, Primer_Nombre_per=newPrimer_Nombre_per, Segundo_Nombre_per=newSegundo_Nombre_per,
 Primer_Apellido_per=newPrimer_Apellido_per, Segundo_Apellido_per=newSegundo_Apellido_per, Usuario_login=newUsuario_login, Pass_login=newPass_login, Tel_per=newTel_per,
 Cel_per=newCel_per, Direc_per=newDirec_per, Correo_per=newCorreo_per, rol_Rol=newrol_Rol WHERE  Num_Documento_per= OLDNum_Documento_per;

 END//
 
 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/

/*-------------------------------------------------------------------│
│              PROCEDIMIENTO ALMACENADO ELIMINAR PERSONA             │
│-------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Eliminar_Persona(
 IN OLDNum_Documento_per VARCHAR(15)
 )
 BEGIN
 
 DELETE FROM PERSONA WHERE Num_Documento_per=OLDNum_Documento_per;

 END//
 
 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/