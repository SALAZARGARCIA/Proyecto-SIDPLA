/*-------------------------------------------------------------------│
│              PROCEDIMIENTO ALMACENADO ELIMINAR PRODUCTO            │
│-------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Eliminar_Producto(
 IN Cod_Producto INT
 )
 BEGIN
 
 DELETE FROM PRODUCTO WHERE Cod_Producto=Cod_Producto;


 DELETE FROM PRODUCTO_HAS_TAMAÑO WHERE Producto_Cod_Producto=Cod_Producto;

 END//
 
 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/

/*-------------------------------------------------------------------│
│              PROCEDIMIENTO ALMACENADO ELIMINAR PERSONA             │
│-------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Eliminar_Persona(
 IN OLDNum_Documento_per INT
 )
 BEGIN
 
 DELETE FROM PERSONA WHERE Num_Documento_per=OLDNum_Documento_per;


 DELETE FROM ROL_HAS_PERSONA WHERE Persona_Num_Documento_per=OLDNum_Documento_per;

 END//
 
 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/