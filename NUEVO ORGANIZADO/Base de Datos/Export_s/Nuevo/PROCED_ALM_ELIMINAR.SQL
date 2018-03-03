/*-------------------------------------------------------------------│
│              PROCEDIMIENTO ALMACENADO ELIMINAR PRODUCTO            │
│-------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Eliminar_Producto(
 IN Cod_ProductoDL INT
 )
 BEGIN
 
 DELETE FROM PRODUCTO WHERE Cod_Producto=Cod_ProductoDL;

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

/* 
NO SE HACEN MAS PROCEDIMIENTOS PARA ELIMINAR, YA QUE EN ALGUNAS 
TABLAS SE ACTUALIZA EL ESTADO Y EN LAS OTRAS NO ES CONVENIENTE*/