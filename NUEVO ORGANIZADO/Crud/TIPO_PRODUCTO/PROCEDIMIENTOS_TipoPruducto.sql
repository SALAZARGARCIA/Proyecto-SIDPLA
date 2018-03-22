/*-------------------------------------------------------------------│
│              PROCEDIMIENTO ALMACENADO INGRESAR PERSONAS            │
│-------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Insertar_tipo_doc(
 IN tipo_doc VARCHAR(50),
 IN estado_tipo_doc TINYINT(4)
 
 )
 BEGIN
 
 INSERT INTO tipo_doc VALUES (tipo_doc,
 	estado_tipo_doc);


 END//
 
 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/


/*--------------------------------------------------------------------------------------------------------------------------------------------------------│
│                                                      PROCEDIMIENTO ALMACENADO LISTAR PERSONA                                                            │
│--------------------------------------------------------------------------------------------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Listar_tipo_doc()
 BEGIN
 
 SELECT * FROM tipo_doc;
 

 END//
 
 DELIMITER ;
/*             											                                                                                                 │
│-------------------------------------------------------------------------------------------------------------------------------------------------------*/

/*--------------------------------------------------------------------------------------------------------------------------------------------------------│
│                                                      PROCEDIMIENTO ALMACENADO OBTENER PERSONA                                                           │
│--------------------------------------------------------------------------------------------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Obtener_tipo_doc(
 IN otipo_doc VARCHAR(15)
 )
 BEGIN
 
 SELECT * FROM tipo_doc WHERE tipo_doc=otipo_doc;
 

 END//
 
 DELIMITER ;
/*             											                                                                                                 │
│-------------------------------------------------------------------------------------------------------------------------------------------------------*/

/*-------------------------------------------------------------------│
│            PROCEDIMIENTO ALMACENADO ACTUALIZAR PERSONA             │
│-------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Actualizar_tipo_doc(
 IN OLDtipo_doc VARCHAR(50),
 IN newestado_tipo_doc TINYINT(4),
 IN NEWtipo_doc VARCHAR(50)
 )
 BEGIN
 
 UPDATE tipo_doc SET tipo_doc=NEWtipo_doc, estado_tipo_doc=newestado_tipo_doc
 WHERE  tipo_doc= OLDtipo_doc;

 END//
 
 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/

/*-------------------------------------------------------------------│
│              PROCEDIMIENTO ALMACENADO ELIMINAR PERSONA             │
│-------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Eliminar_tipo_doc(
 IN OLDtipo_doc VARCHAR(50)
 )
 BEGIN
 
 DELETE FROM tipo_doc WHERE tipo-prod=OLDtipo_doc;

 END//
 
 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/