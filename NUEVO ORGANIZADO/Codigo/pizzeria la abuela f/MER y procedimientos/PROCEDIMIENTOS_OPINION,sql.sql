/*-------------------------------------------------------------------│
│              PROCEDIMIENTO ALMACENADO INGRESAR pizzeriaS            │
│-------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Insertar_Opinion(
 IN Cod_Opinion INT(10),
 IN Opinion VARCHAR(250),
 IN persona_Num_Documento_per VARCHAR(15),
 IN persona_tipo_doc VARCHAR(45),
 IN Fecha DATE
 )
 BEGIN
 
 INSERT INTO opinion VALUES (Cod_Opinion,
 	Opinion, persona_Num_Documento_per, persona_tipo_doc,
 	Fecha);


 END//
 
 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/


/*--------------------------------------------------------------------------------------------------------------------------------------------------------│
│                                                      PROCEDIMIENTO ALMACENADO LISTAR pizzeria                                                            │
│--------------------------------------------------------------------------------------------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Listar_Opinion()
 BEGIN
 
 SELECT * FROM opinion;
 

 END//
 
 DELIMITER ;
/*             											                                                                                                 │
│-------------------------------------------------------------------------------------------------------------------------------------------------------*/

/*--------------------------------------------------------------------------------------------------------------------------------------------------------│
│                                                      PROCEDIMIENTO ALMACENADO OBTENER pizzeria                                                           │
│--------------------------------------------------------------------------------------------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Obtener_Opinion(
 IN Cod_Opinion VARCHAR(15)
 )
 BEGIN
 
 SELECT * FROM opinion WHERE Cod_Opinion=Cod_Opinion;
 

 END//
 
 DELIMITER ;
/*             											                                                                                                 │
│-------------------------------------------------------------------------------------------------------------------------------------------------------*/

/*-------------------------------------------------------------------│
│            PROCEDIMIENTO ALMACENADO ACTUALIZAR pizzeria             │
│-------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Actualizar_Opinion(
 IN OLDCod_Opinion INT(10),
 IN newOpinion VARCHAR(250),
 IN newpersona_Num_Documento_per VARCHAR(15),
 IN newpersona_tipo_doc VARCHAR(45),
 IN newFecha DATE,
 

 IN NEWCod_Opinion INT(10)
 )
 BEGIN
 
 UPDATE opinion SET Cod_Opinion=NEWCod_Opinion,  Opinion=newOpinion, persona_Num_Documento_per=newpersona_Num_Documento_per,
 persona_tipo_doc=newpersona_tipo_doc, Fecha=newFecha WHERE  Cod_Opinion= OLDCod_Opinion;

 END//
 
 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/

/*-------------------------------------------------------------------│
│              PROCEDIMIENTO ALMACENADO ELIMINAR pizzeria             │
│-------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Eliminar_Opinion(
 IN OLDCod_Opinion INT(10)
 )
 BEGIN
 
 DELETE FROM opinion WHERE Cod_Opinion=OLDCod_Opinion;

 END//
 
 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/