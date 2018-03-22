/*-------------------------------------------------------------------│
│              PROCEDIMIENTO ALMACENADO INGRESAR opinionS            │
│-------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Insertar_opinion(
 IN Cod_Opinion INT(10),
 IN Opinion VARCHAR(250),
 IN persona_Cod_Opinion VARCHAR(15),
 IN persona_persona_tipo_doc  VARCHAR(45)
 
 )
 BEGIN
 
 INSERT INTO opinion VALUES (Cod_Opinion,
 	Opinion, persona_Cod_Opinion, persona_persona_tipo_doc
 	);


 END//
 
 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/


/*--------------------------------------------------------------------------------------------------------------------------------------------------------│
│                                                      PROCEDIMIENTO ALMACENADO LISTAR opinion                                                            │
│--------------------------------------------------------------------------------------------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Listar_opinion()
 BEGIN
 
 SELECT * FROM opinion;
 

 END//
 
 DELIMITER ;
/*             											                                                                                                 │
│-------------------------------------------------------------------------------------------------------------------------------------------------------*/

/*--------------------------------------------------------------------------------------------------------------------------------------------------------│
│                                                      PROCEDIMIENTO ALMACENADO OBTENER opinion                                                           │
│--------------------------------------------------------------------------------------------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Obtener_opinion(
 IN Cod_OpinionMD VARCHAR(15)
 )
 BEGIN
 
 SELECT * FROM opinion WHERE Cod_Opinion=Cod_OpinionMD;
 

 END//
 
 DELIMITER ;
/*             											                                                                                                 │
│-------------------------------------------------------------------------------------------------------------------------------------------------------*/

/*-------------------------------------------------------------------│
│            PROCEDIMIENTO ALMACENADO ACTUALIZAR opinion             │
│-------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Actualizar_opinion(
 IN OLDCod_Opinion VARCHAR(10),
 IN newOpinion VARCHAR(250),
 IN newpersona_Num_Documento_Persona VARCHAR(15),
 IN newpersona_tipo_doc VARCHAR(45),
 IN NEWCod_Opinion VARCHAR(15)
 )
 BEGIN
 
 UPDATE Opinion SET Cod_Opinion=NEWCod_Opinion, 
 persona_tipo_doc=newpersona_tipo_doc, 
 Opinion=newOpinion, 
 persona_Num_Documento_Persona=newpersona_Num_Documento_persona,
 persona_tipo_doc=newpersona_persona_tipo_doc 
 WHERE  Cod_Opinion= OLDCod_Opinion;

 END//
 
 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/

/*-------------------------------------------------------------------│
│              PROCEDIMIENTO ALMACENADO ELIMINAR opinion             │
│-------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Eliminar_opinion(
 IN OLDCod_Opinion INT(10)
 )
 BEGIN
 
 DELETE FROM opinion WHERE Cod_Opinion=OLDCod_Opinion;

 END//
 
 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/