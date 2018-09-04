/*-------------------------------------------------------------------│
│              PROCEDIMIENTO CONSULTAR POR FECHAS LOS DOMICILIOS     │
│-------------------------------------------------------------------*/																	 
 
 DELIMITER //
 CREATE PROCEDURE Listar_domicilios_por_fecha()
 BEGIN
 
SELECT * FROM domicilio WHERE fecha_hora  BETWEEN '2018-03-02' AND '2018-03-05';

 END//
 
 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/


/*--------------------------------------------------------------------------------------------------------------------------------------------------------│
│                                                      CONSULTAR DATOS  DEL DOMICILIO                                                            │
│--------------------------------------------------------------------------------------------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Reporte_domicilios_Fecha(
 IN START_DATE date,
IN END_DATE date)

 BEGIN
 
 SELECT producto.cod_producto, producto.nom_prod, domicilio_has_producto.cantidad,  
 domicilio.*FROM producto
 JOIN domicilio_has_producto
 ON (domicilio_has_producto.producto_Cod_producto = producto.cod_producto)
 JOIN domicilio
 ON(domicilio.cod_dom=domicilio_has_producto.domicilio_cod_dom)
 WHERE fecha_hora BETWEEN START_DATE AND END_DATE;
 
 

 END//
 
 DELIMITER ;
/*             											                                                                                                 │
│-------------------------------------------------------------------------------------------------------------------------------------------------------*/

/*--------------------------------------------------------------------------------------------------------------------------------------------------------│
│                                                     Consultar domicilios con sus productos                                                           │
│--------------------------------------------------------------------------------------------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Listar_podructos_de_domicilios(
 	IN nombreproducto VARCHAR(45)
 	)
 BEGIN
 
 SELECT domicilio.cod_dom, producto.cod_producto, domicilio.fecha_hora, producto.nom_prod,  domicilio_has_producto.cantidad, domicilio.valor_total
 FROM domicilio_has_producto  JOIN domicilio
 ON(domicilio_has_producto.domicilio_cod_dom=domicilio.cod_dom)
JOIN producto
 ON(producto.cod_producto=domicilio_has_producto.producto_cod_producto);
WHERE Nom_Prod= nombreproducto;
 END//
 
 DELIMITER ;										                                                                                                 │
│