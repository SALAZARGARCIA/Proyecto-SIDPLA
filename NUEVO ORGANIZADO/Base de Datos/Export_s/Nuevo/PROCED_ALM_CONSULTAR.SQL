/*--------------------------------------------------------------------------------------------------------------------------------------------------------│
│                                                      PROCEDIMIENTO ALMACENADO CONSULTAR PRODUCTO                                                        │
│--------------------------------------------------------------------------------------------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Consulta_Producto(
 )
 BEGIN
 
 SELECT T1.Cod_Producto, T1.Nom_prod,T1.Desc_prod,T1.Foto_prod, T1.Stok_min,T1.Stok_max,T1.Cantidad_exist,
  T2.Valor_prod, T2.valor_prod, T4.tamaño, T1.tipo_prod FROM PRODUCTO AS T1 INNER JOIN PRODUCTO_HAS_TAMAÑO AS T2 ON (T1.Cod_Producto=T2.Producto_Cod_Producto)
  INNER JOIN Tamaño AS T4 ON (T2.tamaño_Tamaño=T4.Tamaño) WHERE T4.estado_tamaño="1";
 

 END//
 
 DELIMITER ;
/*             											                                                                                                 │
│-------------------------------------------------------------------------------------------------------------------------------------------------------*/

CALL Consulta_Producto;

/*--------------------------------------------------------------------------------------------------------------------------------------------------------│
│                                                      PROCEDIMIENTO ALMACENADO OBTENER PRODUCTO                                                        │
│--------------------------------------------------------------------------------------------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Obtener_Producto(
 IN Cod_ProductoMD INT
 )
 BEGIN
 
SELECT T1.Cod_Producto, T1.Nom_prod,T1.Desc_prod,T1.Foto_prod, T1.Stok_min,T1.Stok_max,T1.Cantidad_exist,
  T2.Valor_prod, T2.valor_prod, T4.tamaño, T1.tipo_prod FROM PRODUCTO AS T1 INNER JOIN PRODUCTO_HAS_TAMAÑO AS T2 ON (T1.Cod_Producto=T2.Producto_Cod_Producto)
  INNER JOIN Tamaño AS T4 ON (T2.tamaño_Tamaño=T4.Tamaño) WHERE T1.Cod_Producto=Cod_ProductoMD and T4.estado_tamaño="1";
 

 END//
 
 DELIMITER ;
/*             											                                                                                                 │
│-------------------------------------------------------------------------------------------------------------------------------------------------------*/

CALL Obtener_Producto();

/*--------------------------------------------------------------------------------------------------------------------------------------------------------│
│                                                      PROCEDIMIENTO ALMACENADO LISTAR PERSONA                                                            │
│--------------------------------------------------------------------------------------------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Listar_Persona()
 BEGIN
 
 SELECT T1.Num_Documento_per, T2.tipo_doc,T3.rol,T4.Estado_r_has_p,T1.Primer_Nombre_per,T1.Segundo_Nombre_per,T1.Primer_Apellido_per,
 T1.Segundo_Apellido_per,T1.Usuario_login,T1.Pass_login, T1.Tel_per, T1.Cel_per, T1.Direc_per, T1.Correo_per FROM PERSONA AS T1 INNER JOIN Tipo_Doc AS T2
 ON (T1.tipo_doc=T2.tipo_doc) INNER JOIN ROL_has_Persona AS T4 ON (T1.Num_Documento_per=T4.Persona_Num_Documento_per) INNER JOIN ROL AS T3 
 ON (T3.rol=T4.Rol_rol);
 

 END//
 
 DELIMITER ;
/*             											                                                                                                 │
│-------------------------------------------------------------------------------------------------------------------------------------------------------*/
call Listar_Persona;
/*--------------------------------------------------------------------------------------------------------------------------------------------------------│
│                                                      PROCEDIMIENTO ALMACENADO OBTENER PERSONA                                                           │
│--------------------------------------------------------------------------------------------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Obtener_Persona(
 IN Num_Documento_perMD VARCHAR(15)
 )
 BEGIN
 
 SELECT T1.Num_Documento_per, T2.tipo_doc,T3.rol,T4.Estado_r_has_p,T1.Primer_Nombre_per,T1.Segundo_Nombre_per,T1.Primer_Apellido_per,
 T1.Segundo_Apellido_per,T1.Usuario_login,T1.Pass_login, T1.Tel_per, T1.Cel_per, T1.Direc_per, T1.Correo_per FROM PERSONA AS T1 INNER JOIN Tipo_Doc AS T2
 ON (T1.tipo_doc=T2.tipo_doc) INNER JOIN ROL_has_Persona AS T4 ON (T1.Num_Documento_per=T4.Persona_Num_Documento_per) INNER JOIN ROL AS T3 
 ON (T3.rol=T4.Rol_rol) WHERE T1.Num_Documento_per=Num_Documento_perMD;
 

 END//
 
 DELIMITER ;
/*             											                                                                                                 │
│-------------------------------------------------------------------------------------------------------------------------------------------------------*/
call Obtener_Persona("1033815398");

/*--------------------------------------------------------------------------------------------------------------------------------------------------------│
│                                                      PROCEDIMIENTO ALMACENADO CONSULTAR OPINIONES                                                        │
│--------------------------------------------------------------------------------------------------------------------------------------------------------*/	

DELIMITER //
 CREATE PROCEDURE Consulta_Opinion()
 
 BEGIN

 SELECT T2.Cod_Opinion,T2.Opinion, T1.Num_Documento_per, T1.Primer_Nombre_per, T1.Primer_Apellido_per, T1.Correo_per FROM Opinion AS T2 INNER JOIN PERSONA 
 AS T1 ON (T2.Num_Documento_per=T1.Num_Documento_per); 

 END//
 
 DELIMITER ;

/*             											                                                                                                 │
│-------------------------------------------------------------------------------------------------------------------------------------------------------*/

CALL Consulta_Opinion;

/*--------------------------------------------------------------------------------------------------------------------------------------------------------│
│                                                      PROCEDIMIENTO ALMACENADO OBTENER OPINIONES                                                        │
│--------------------------------------------------------------------------------------------------------------------------------------------------------*/	

DELIMITER //
 CREATE PROCEDURE Obtener_Opinion(
IN Num_Documento_perMD VARCHAR(15)
 	)
 
 BEGIN

 SELECT T2.Cod_Opinion,T2.Opinion, T1.Num_Documento_per, T1.Primer_Nombre_per, T1.Primer_Apellido_per, T1.Correo_per FROM Opinion AS T2 INNER JOIN PERSONA 
 AS T1 ON (T2.Num_Documento_per=T1.Num_Documento_per) WHERE T1.Num_Documento_per=Num_Documento_perMD; 

 END//
 
 DELIMITER ;

/*             											                                                                                                 │
│-------------------------------------------------------------------------------------------------------------------------------------------------------*/

CALL Obtener_Opinion("1033815398");

/*--------------------------------------------------------------------------------------------------------------------------------------------------------│
│                                                PROCEDIMIENTO ALMACENADO CONSULTAR TIPOS DE DOCUMENTO                                                    │
│--------------------------------------------------------------------------------------------------------------------------------------------------------*/	

DELIMITER //
 CREATE PROCEDURE Consulta_Tipo_Doc()
 
 BEGIN

 SELECT * FROM Tipo_Doc; 

 END//
 
 DELIMITER ;

/*             											                                                                                                 │
│-------------------------------------------------------------------------------------------------------------------------------------------------------*/

CALL Consulta_Tipo_Doc;

/*--------------------------------------------------------------------------------------------------------------------------------------------------------│
│                                                PROCEDIMIENTO ALMACENADO CONSULTAR ROL                                                  │
│--------------------------------------------------------------------------------------------------------------------------------------------------------*/	

DELIMITER //
 CREATE PROCEDURE Consulta_Rol()
 
 BEGIN

 SELECT * FROM ROL; 

 END//
 
 DELIMITER ;

/*             											                                                                                                 │
│-------------------------------------------------------------------------------------------------------------------------------------------------------*/

CALL Consulta_Rol;

/*--------------------------------------------------------------------------------------------------------------------------------------------------------│
│                                                PROCEDIMIENTO ALMACENADO CONSULTAR FORMAS DE PAGO                                                        │
│--------------------------------------------------------------------------------------------------------------------------------------------------------*/	

/*DELIMITER //
 CREATE PROCEDURE Consulta_Forma_Pago()
 
 BEGIN

 SELECT * FROM Forma_Pago; 

 END//
 
 DELIMITER ;

/*             											                                                                                                 │
│-------------------------------------------------------------------------------------------------------------------------------------------------------*/

CALL Consulta_Forma_Pago;

/*--------------------------------------------------------------------------------------------------------------------------------------------------------│
│                                               PROCEDIMIENTO ALMACENADO CONSULTAR PIZZERIAS                                                              │
│--------------------------------------------------------------------------------------------------------------------------------------------------------*/	

DELIMITER //
 CREATE PROCEDURE Consulta_Pizzeria()
 
 BEGIN

 SELECT * FROM PIZZERIA; 

 END//
 
 DELIMITER ;

/*             											                                                                                                 │
│-------------------------------------------------------------------------------------------------------------------------------------------------------*/

CALL Consulta_Pizzeria;

/*--------------------------------------------------------------------------------------------------------------------------------------------------------│
│                                                PROCEDIMIENTO ALMACENADO CONSULTAR TAMAÑOS                                                               │
│--------------------------------------------------------------------------------------------------------------------------------------------------------*/	

DELIMITER //
 CREATE PROCEDURE Consulta_Tamaños()
 
 BEGIN

 SELECT * FROM Tamaño; 

 END//
 
 DELIMITER ;

/*             											                                                                                                 │
│-------------------------------------------------------------------------------------------------------------------------------------------------------*/

CALL Consulta_Tamaños;

/*--------------------------------------------------------------------------------------------------------------------------------------------------------│
│                                            PROCEDIMIENTO ALMACENADO CONSULTAR TIPOS DE PRODUCTO                                                         │
│--------------------------------------------------------------------------------------------------------------------------------------------------------*/	

DELIMITER //
 CREATE PROCEDURE Consulta_Tipo_producto()
 
 BEGIN

 SELECT * FROM Tipo_producto; 

 END//
 
 DELIMITER ;

/*             											                                                                                                 │
│-------------------------------------------------------------------------------------------------------------------------------------------------------*/

CALL Consulta_Tipo_producto;

/*--------------------------------------------------------------------------------------------------------------------------------------------------------│
│                                                   PROCEDIMIENTO ALMACENADO CONSULTAR DOMICILIO                                                          │
│--------------------------------------------------------------------------------------------------------------------------------------------------------*/	

DELIMITER //
 CREATE PROCEDURE Consulta_Domicilio()
 
 BEGIN

 SELECT * FROM DOMICILIO; 

 END//
 
 DELIMITER ;


/*             											                                                                                                 │
│-------------------------------------------------------------------------------------------------------------------------------------------------------*/
call Consulta_Domicilio;