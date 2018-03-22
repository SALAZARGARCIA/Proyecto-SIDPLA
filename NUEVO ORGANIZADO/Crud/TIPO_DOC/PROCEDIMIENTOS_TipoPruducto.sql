/*-------------------------------------------------------------------│
│              PROCEDIMIENTO ALMACENADO INGRESAR PERSONAS            │
│-------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Insertar_tipo_producto(
 IN tipo_prod VARCHAR(50),
 IN estado_tipo_prod TINYINT(4)
 
 )
 BEGIN
 
 INSERT INTO tipo_producto VALUES (tipo_prod,
 	estado_tipo_prod);


 END//
 
 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/


/*--------------------------------------------------------------------------------------------------------------------------------------------------------│
│                                                      PROCEDIMIENTO ALMACENADO LISTAR PERSONA                                                            │
│--------------------------------------------------------------------------------------------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Listar_tipo_producto()
 BEGIN
 
 SELECT * FROM tipo_producto;
 

 END//
 
 DELIMITER ;
/*             											                                                                                                 │
│-------------------------------------------------------------------------------------------------------------------------------------------------------*/

/*--------------------------------------------------------------------------------------------------------------------------------------------------------│
│                                                      PROCEDIMIENTO ALMACENADO OBTENER PERSONA                                                           │
│--------------------------------------------------------------------------------------------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Obtener_tipo_producto(
 IN otipo_prod VARCHAR(15)
 )
 BEGIN
 
 SELECT * FROM tipo_producto WHERE tipo_prod=otipo_prod;
 

 END//
 
 DELIMITER ;
/*             											                                                                                                 │
│-------------------------------------------------------------------------------------------------------------------------------------------------------*/

/*-------------------------------------------------------------------│
│            PROCEDIMIENTO ALMACENADO ACTUALIZAR PERSONA             │
│-------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Actualizar_tipo_producto(
 IN OLDtipo_prod VARCHAR(50),
 IN newestado_tipo_prod TINYINT(4)
 )
 BEGIN
 
 UPDATE tipo_producto SET estado_tipo_prod=newestado_tipo_prod
 WHERE  tipo_prod= OLDtipo_prod;

 END//
 
 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/

/*-------------------------------------------------------------------│
│              PROCEDIMIENTO ALMACENADO ELIMINAR PERSONA             │
│-------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Eliminar_tipo_producto(
 IN OLDtipo_prod VARCHAR(50)
 )
 BEGIN
 
 DELETE FROM tipo_producto WHERE tipo-prod=OLDtipo_prod;

 END//
 
 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/