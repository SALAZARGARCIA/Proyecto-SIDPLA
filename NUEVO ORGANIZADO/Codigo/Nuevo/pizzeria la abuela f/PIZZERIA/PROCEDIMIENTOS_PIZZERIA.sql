/*-------------------------------------------------------------------│
│              PROCEDIMIENTO ALMACENADO INGRESAR pizzeriaS            │
│-------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Insertar_pizzeria(
 IN Nit_Pizzeria BIGINT(20),
 IN Nom_Pizzeria VARCHAR(45),
 IN Dir_Pizzeria VARCHAR(50),
 IN Tel_Pizzeria BIGINT(15),
 IN Cel_Pizzeria BIGINT(15),
 IN Logo_Pizzeria VARCHAR(70) 
 )
 BEGIN
 
 INSERT INTO pizzeria VALUES (Nit_Pizzeria,
 	Nom_Pizzeria, Dir_Pizzeria, Tel_Pizzeria,
 	Cel_Pizzeria, Logo_Pizzeria);


 END//
 
 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/


/*--------------------------------------------------------------------------------------------------------------------------------------------------------│
│                                                      PROCEDIMIENTO ALMACENADO LISTAR pizzeria                                                            │
│--------------------------------------------------------------------------------------------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Listar_pizzeria()
 BEGIN
 
 SELECT * FROM pizzeria;
 

 END//
 
 DELIMITER ;
/*             											                                                                                                 │
│-------------------------------------------------------------------------------------------------------------------------------------------------------*/

/*--------------------------------------------------------------------------------------------------------------------------------------------------------│
│                                                      PROCEDIMIENTO ALMACENADO OBTENER pizzeria                                                           │
│--------------------------------------------------------------------------------------------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Obtener_pizzeria(
 IN Nit_PizzeriaMD VARCHAR(15)
 )
 BEGIN
 
 SELECT * FROM pizzeria WHERE Nit_Pizzeria=Nit_PizzeriaMD;
 

 END//
 
 DELIMITER ;
/*             											                                                                                                 │
│-------------------------------------------------------------------------------------------------------------------------------------------------------*/

/*-------------------------------------------------------------------│
│            PROCEDIMIENTO ALMACENADO ACTUALIZAR pizzeria             │
│-------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Actualizar_pizzeria(
 IN OLDNit_Pizzeria VARCHAR(15),
 IN newNom_Pizzeria VARCHAR(45),
 IN newDir_Pizzeria VARCHAR(45),
 IN newTel_Pizzeria VARCHAR(45),
 IN newCel_Pizzeria VARCHAR(45),
 IN newLogo_Pizzeria VARCHAR(45),

 IN NEWNit_Pizzeria VARCHAR(15)
 )
 BEGIN
 
 UPDATE pizzeria SET Nit_Pizzeria=NEWNit_Pizzeria,  Nom_Pizzeria=newNom_Pizzeria, Dir_Pizzeria=newDir_Pizzeria,
 Tel_Pizzeria=newTel_Pizzeria, Cel_Pizzeria=newCel_Pizzeria, Logo_Pizzeria=newLogo_Pizzeria WHERE  Nit_Pizzeria= OLDNit_Pizzeria;

 END//
 
 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/

/*-------------------------------------------------------------------│
│              PROCEDIMIENTO ALMACENADO ELIMINAR pizzeria             │
│-------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Eliminar_pizzeria(
 IN OLDNit_Pizzeria VARCHAR(15)
 )
 BEGIN
 
 DELETE FROM pizzeria WHERE Nit_Pizzeria=OLDNit_Pizzeria;

 END//
 
 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/