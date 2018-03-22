/*-------------------------------------------------------------------│
│              PROCEDIMIENTO ALMACENADO INGRESAR PERSONAS            │
│-------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Insertar_estado_domicilio(
 IN Estado_dom VARCHAR(50),
 IN estado_e_dom TINYINT(4)
 
 )
 BEGIN
 
 INSERT INTO estado_domicilio VALUES (Estado_dom,
 	estado_e_dom);


 END//
 
 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/


/*--------------------------------------------------------------------------------------------------------------------------------------------------------│
│                                                      PROCEDIMIENTO ALMACENADO LISTAR PERSONA                                                            │
│--------------------------------------------------------------------------------------------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Listar_estado_domicilio()
 BEGIN
 
 SELECT * FROM estado_domicilio;
 

 END//
 
 DELIMITER ;
/*             											                                                                                                 │
│-------------------------------------------------------------------------------------------------------------------------------------------------------*/

/*--------------------------------------------------------------------------------------------------------------------------------------------------------│
│                                                      PROCEDIMIENTO ALMACENADO OBTENER PERSONA                                                           │
│--------------------------------------------------------------------------------------------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Obtener_estado_domicilio(
 IN oEstado_dom VARCHAR(50)
 )
 BEGIN
 
 SELECT * FROM estado_domicilio WHERE Estado_dom=oEstado_dom;
 

 END//
 
 DELIMITER ;
/*             											                                                                                                 │
│-------------------------------------------------------------------------------------------------------------------------------------------------------*/

/*-------------------------------------------------------------------│
│            PROCEDIMIENTO ALMACENADO ACTUALIZAR PERSONA             │
│-------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Actualizar_estado_domicilio(
 IN OLDEstado_dom VARCHAR(50),
 IN newestado_e_dom TINYINT(4),
 IN NEWEstado_dom VARCHAR(50)
 )
 BEGIN
 
 UPDATE estado_domicilio SET Estado_dom=NEWEstado_dom, estado_e_dom=newestado_e_dom
 WHERE  Estado_dom= OLDEstado_dom;

 END//
 
 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/

/*-------------------------------------------------------------------│
│              PROCEDIMIENTO ALMACENADO ELIMINAR PERSONA             │
│-------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Eliminar_estado_domicilio(
 IN OLDEstado_dom VARCHAR(50)
 )
 BEGIN
 
 DELETE FROM estado_domicilio WHERE Estado_dom=OLDEstado_dom;

 END//
 
 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/