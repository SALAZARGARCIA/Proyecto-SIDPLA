--PROCEDIMIENTO LISTAR

 DELIMITER //
 CREATE PROCEDURE Listar_tamaño()
 BEGIN
 
 SELECT * FROM tamaño;
 

 END//
 
 DELIMITER ;


--PROCEDIMIENTO INSERTAR
DELIMITER //
CREATE PROCEDURE Insertar_tamaño(
IN tamaño VARCHAR(50),
IN estado_tamaño VARCHAR(45)
)

BEGIN

INSERT INTO tamaño (tamaño, estado_tamaño)
VALUES (tamaño,estado_tamaño);
END//

--PROCEDIMIENTO ACTUALIZAR
DELIMITER //
CREATE PROCEDURE Actualizar_tamaño(
IN old_tamaño VARCHAR(50),
IN new_estado_tamaño VARCHAR(45),
IN new_tamaño VARCHAR(50)
)

BEGIN

UPDATE tamaño SET tamaño = new_tamaño, estado_tamaño= new_estado_tamaño 
WHERE tamaño = old_tamaño;

END//

--PROCEDIMIENTO ELIMINAR
DELIMITER //
CREATE PROCEDURE Eliminar_tamaño(
IN old_tamaño VARCHAR(50)
)

BEGIN

DELETE FROM tamaño Where tamaño = old_tamaño;

END//

--PROCEDIMIENTO OBTENER
DELIMITER //
CREATE PROCEDURE Obtener_tamaño(
IN tamaño VARCHAR(50)
)  

BEGIN

SELECT * FROM tamaño WHERE tamaño=tamaño;

END//