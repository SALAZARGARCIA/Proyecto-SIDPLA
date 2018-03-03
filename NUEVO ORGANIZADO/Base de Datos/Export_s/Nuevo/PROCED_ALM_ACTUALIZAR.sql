/*-------------------------------------------------------------------│
│            PROCEDIMIENTO ALMACENADO ACTUALIZAR PRODUCTO            │
│-------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Actualizar_Producto(
 IN newCod_Producto INT,
 IN newNom_prod VARCHAR(45),
 IN newDesc_prod VARCHAR(100),
 IN newFoto_prod VARCHAR(70),
 IN newTipo_producto INT,
 IN newStok_min INT,
 IN newStok_max INT,
 IN newCantidad_exist INT,
 IN newCod_tamaño INT,
 IN newValor_prod DECIMAL(10,2),
 IN oldCod_Producto INT
 )
 BEGIN
 
 UPDATE PRODUCTO SET Cod_Producto=newCod_Producto,Nom_prod=newNom_prod,Desc_prod=newDesc_prod,
 Foto_prod=newFoto_prod,Tipo_producto=newTipo_producto,Stok_min=newStok_min,Stok_max=newStok_max,Cantidad_exist=newCantidad_exist WHERE Cod_Producto = oldCod_Producto;


 UPDATE PRODUCTO_HAS_TAMAÑO SET Producto_Cod_Producto=newCod_Producto,Tamaño_Cod_tamaño=newCod_tamaño,
 Valor_prod=newValor_prod WHERE Producto_Cod_Producto=oldCod_Producto;

 END//
 
 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/

/*-------------------------------------------------------------------│
│            PROCEDIMIENTO ALMACENADO ACTUALIZAR PERSONA             │
│-------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Actualizar_Persona(
 IN OLDNum_Documento_per VARCHAR(15),
 IN Cod_tipo_doc INT,
 IN Primer_Nombre_per VARCHAR(45),
 IN Segundo_Nombre_per VARCHAR(45),
 IN Primer_Apellido_per VARCHAR(45),
 IN Segundo_Apellido_per VARCHAR(45),
 IN Usuario_login VARCHAR(45),
 IN Pass_login VARCHAR(45),
 IN Tel_per BIGINT(15),
 IN Cel_per BIGINT(15),
 IN Direc_per VARCHAR(45),
 IN Correo_per VARCHAR(45),
 IN Rol_Cod_rol INT,
 IN Estado_rol_per TINYINT(1),
 IN NEWNum_Documento_per VARCHAR(15)
 )
 BEGIN
 
 UPDATE PERSONA SET  WHERE Num_Documento_per=NEWNum_Documento_per, Cod_tipo_doc=Cod_tipo_doc, Primer_Nombre_per=Primer_Nombre_per, Segundo_Nombre_per=Segundo_Nombre_per,
 Primer_Apellido_per=Primer_Apellido_per, Segundo_Apellido_per=Segundo_Apellido_per, Usuario_login=Usuario_login, Pass_login=Pass_login, Tel_per=Tel_per,
 Cel_per=Cel_per, Direc_per=Direc_per, Correo_per=Correo_per WHERE  Num_Documento_per= OLDNum_Documento_per;


 UPDATE ROL_HAS_PERSONA SET Rol_Cod_rol=Rol_Cod_rol,Persona_Num_Documento_per=NEWNum_Documento_per,
 Persona_Cod_tipo_doc=Cod_tipo_doc, Estado_rol_per=Estado_rol_per WHERE Persona_Num_Documento_per=OLDNum_Documento_per;

 END//
 
 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/