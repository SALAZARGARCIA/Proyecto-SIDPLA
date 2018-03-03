/*-------------------------------------------------------------------│
│            PROCEDIMIENTO ALMACENADO ACTUALIZAR PRODUCTO            │
│-------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Actualizar_Producto(
 IN oldCod_Producto INT,
 IN newNom_prod VARCHAR(45),
 IN newDesc_prod VARCHAR(100),
 IN newFoto_prod VARCHAR(70),
 IN newTipo_producto VARCHAR(50),
 IN newStok_min INT(11),
 IN newStok_max INT(11),
 IN newCantidad_exist INT(11),
 IN newtamaño_tamaño VARCHAR(50),
 IN newValor_prod DECIMAL(10,2)
 )
 BEGIN
 
 UPDATE PRODUCTO SET Nom_prod=newNom_prod,Desc_prod=newDesc_prod,
 Foto_prod=newFoto_prod,Tipo_prod=newTipo_producto,Stok_min=newStok_min,Stok_max=newStok_max,Cantidad_exist=newCantidad_exist WHERE Cod_Producto = oldCod_Producto;


 UPDATE PRODUCTO_HAS_TAMAÑO SET Tamaño_tamaño=newtamaño_tamaño,
 Valor_prod=newValor_prod WHERE Producto_Cod_Producto=oldCod_Producto;

 END//
 
 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/
call Actualizar_Producto(123,"caca2","popo2","nulo","BEBIDA",null,null,null,"PEQUEÑA",150000.00);
/*-------------------------------------------------------------------│
│            PROCEDIMIENTO ALMACENADO ACTUALIZAR PERSONA             │
│-------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Actualizar_Persona(
 IN OLDNum_Documento_per VARCHAR(15),
 IN newtipo_doc VARCHAR(45),
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
 IN newRol_Cod_rol VARCHAR(45),
 IN newEstado_r_has_p TINYINT,
 IN NEWNum_Documento_per VARCHAR(15)
 )
 BEGIN
 
 UPDATE PERSONA SET Num_Documento_per=NEWNum_Documento_per, tipo_doc=newtipo_doc, Primer_Nombre_per=newPrimer_Nombre_per, Segundo_Nombre_per=newSegundo_Nombre_per,
 Primer_Apellido_per=newPrimer_Apellido_per, Segundo_Apellido_per=newSegundo_Apellido_per, Usuario_login=newUsuario_login, Pass_login=newPass_login, Tel_per=newTel_per,
 Cel_per=newCel_per, Direc_per=newDirec_per, Correo_per=newCorreo_per WHERE  Num_Documento_per= OLDNum_Documento_per;


 UPDATE ROL_HAS_PERSONA SET Rol_rol=newRol_Cod_rol,Persona_Num_Documento_per=NEWNum_Documento_per,
 persona_tipo_doc_tipo_doc=newtipo_doc, Estado_r_has_p=newEstado_r_has_p WHERE Persona_Num_Documento_per=OLDNum_Documento_per;

 END//
 
 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/

CALL Actualizar_Persona()