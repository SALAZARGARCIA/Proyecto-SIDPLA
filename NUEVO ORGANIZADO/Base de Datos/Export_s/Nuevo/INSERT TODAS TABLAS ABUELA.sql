INSERT INTO TIPO_DOC VALUES (1,"CEDULA DE CIUDADANIA"),(2,"TARGETA DE IDENTIDAD"),(3,"CEDULA DE EXTRANGERIA");

INSERT INTO ROL VALUES (1,"EMPLEADO"),(2,"CLIENTE"),(3,"ADMINISTRADOR");

INSERT INTO FORMA_PAGO VALUES (1,"TARJETA CREDITO"),(2,"EFECTIVO");

INSERT INTO ESTADO_DOMICILIO VALUES (1,"ENTREGADO"),(2,"EN ESPERA"),(3,"CANCELADO");

INSERT INTO TAMAÑO VALUES (1,"PEQUEÑA"),(2,"MEDIANA"),(3,"GRANDE"),(4,"FAMILIAR"),(5,"EXTRA GRANDE"),(6,"250 ML"),(7,"350 ML"),(8,"500 ML"),(9,"1 LT"),(10,"1.25 LT"),(11,"2.5 LT");

INSERT INTO TIPO_PRODUCTO VALUES (1,"PIZZA"),(2,"BEBIDA"),(3,"PASTAS"),(4,"ENSALADA"),(5,"ACOMPAÑANTES");

INSERT INTO PIZZERIA VALUES (801145012,"PIZZERIA ABUELA","CALLE FALSA 13-31",4008887,3105320621,"MEDIA/FOTO_P_ABUELA.JPG");

/*------------------------------------------------------------INSERTANDO-PRODUCTOS---------------------------------------------------------------------*/

          /*--------------------------------- -----------------INSERTANDO-PIZZAS--------------------------------------------------------*/

INSERT INTO PRODUCTO VALUES
	(1001,"PIZZA HAWAIANA","PIZZA QUE CONTIENE UNA BASE DE QUESO FUNDIDO Y TOMATE QUE SE ALIÑAN CON JAMÓN Y PIÑA","MEDIA/HAWAIANA.JPG",1, NULL,NULL,NULL);
		INSERT INTO PRODUCTO_HAS_TAMAÑO VALUES (1001,1,15000.00),(1001,2,22000.00),(1001,3,27000.00),(1001,4,32000.00),(1001,5,40000.00);
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
INSERT INTO PRODUCTO VALUES
	(1002,"PIZZA PEPPERONI","PIZZA QUE CONTIENE PEPPERONI","MEDIA/PEPPERONI.JPG",1, NULL,NULL,NULL);
		INSERT INTO PRODUCTO_HAS_TAMAÑO VALUES (1002,1,15000.00),(1002,2,22000.00),(1002,3,27000.00),(1002,4,32000.00),(1002,5,40000.00);
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
INSERT INTO PRODUCTO VALUES
	(1003,"PIZZA MEXICANA","PIZZA QUE CONTIENE TOMATE, FRIJOLES, JALAPEÑOS, CARNE PICADA Y QUESO CHEDDAR","MEDIA/MEXICANA.JPG",1, NULL,NULL,NULL);
		INSERT INTO PRODUCTO_HAS_TAMAÑO VALUES (1003,1,15000.00),(1003,2,22000.00),(1003,3,27000.00),(1003,4,32000.00),(1003,5,40000.00);
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
INSERT INTO PRODUCTO VALUES
	(1004,"PIZZA QUESO","DELICIOSA Y JUGOSA PIZZA REPLETA DE TUS QUESOS FAVORITOS","MEDIA/QUESO.JPG",1, NULL,NULL,NULL);
		INSERT INTO PRODUCTO_HAS_TAMAÑO VALUES (1004,1,15000.00),(1004,2,22000.00),(1004,3,27000.00),(1004,4,32000.00),(1004,5,40000.00);
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
INSERT INTO PRODUCTO VALUES
	(1005,"PIZZA CHAMPIÑONES","DELICIOSA Y JUGOSA PIZZA REPLETA DE TUS CHAMPIÑONES FAVORITOS","MEDIA/CHAMPIÑONES.JPG",1, NULL,NULL,NULL);
		INSERT INTO PRODUCTO_HAS_TAMAÑO VALUES (1005,1,15000.00),(1005,2,22000.00),(1005,3,27000.00),(1005,4,32000.00),(1005,5,40000.00);
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
INSERT INTO PRODUCTO VALUES
	(1006,"PIZZA VEGETARIANA","DELICIOSA PIZZA CON INGREDIENTES VEGETARIANOS IDEAL PARA REEMPLAZAR LA TRADICIONAL","MEDIA/VEGETARIANA.JPG",1, NULL,NULL,NULL);
		INSERT INTO PRODUCTO_HAS_TAMAÑO VALUES (1006,1,15000.00),(1006,2,22000.00),(1006,3,27000.00),(1006,4,32000.00),(1006,5,40000.00);

           /*--------------------------------- -----------------INSERTANDO-BEBIDAS--------------------------------------------------------*/

INSERT INTO PRODUCTO VALUES
	(1007,"COCACOLA","DELICIOSA BEBIDA COCACOLA TRADICIONAL","MEDIA/COCACOLA.JPG",2, 20,50,20);
		INSERT INTO PRODUCTO_HAS_TAMAÑO VALUES (1007,6,500.00),(1007,7,1200.00),(1007,8,1500.00),(1007,9,1900.00),(1007,10,2500.00),(1007,11,3000.00);
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
INSERT INTO PRODUCTO VALUES
	(1008,"PEPSI","DELICIOSA BEBIDA PEPSI TRADICIONAL","MEDIA/PEPSI.JPG",2, 20,50,20);
		INSERT INTO PRODUCTO_HAS_TAMAÑO VALUES (1008,7,1100.00),(1008,8,1400.00),(1008,9,1800.00),(1008,10,2400.00),(1008,11,3100.00);
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
INSERT INTO PRODUCTO VALUES
	(1009,"JUGO NARANJA","DELICIOSO JUGO NARANJA","MEDIA/PEPSI.JPG",2, 20,50,20);
		INSERT INTO PRODUCTO_HAS_TAMAÑO VALUES (1009,7,1400.00),(1009,8,1700.00),(1009,9,2100.00),(1009,10,2900.00);

           /*--------------------------------- -----------------INSERTANDO-PASTAS--------------------------------------------------------*/

INSERT INTO PRODUCTO VALUES
	(10010,"LASAÑA","PLATO QUE TIENE PASTA EN LÁMINAS INTERCALADAS CON CARNE Y BECHAMEL LLAMADO LASAÑA AL HORNO","MEDIA/LASAÑA.JPG",3, NULL,NULL,NULL);
		INSERT INTO PRODUCTO_HAS_TAMAÑO VALUES (10010,2,15000.00);
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
INSERT INTO PRODUCTO VALUES
	(10011,"LASAÑA CON CARNE","PLATO QUE TIENE PASTA EN LÁMINAS INTERCALADAS CON CARNE TERNERA","MEDIA/LASAÑACARNE.JPG",3, NULL,NULL,NULL);
		INSERT INTO PRODUCTO_HAS_TAMAÑO VALUES (10011,2,16000.00);
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
INSERT INTO PRODUCTO VALUES
	(10012,"LASAÑA CON POLLO","PLATO QUE TIENE PASTA EN LÁMINAS INTERCALADAS CON POLLO","MEDIA/LASAÑAPOLLO.JPG",3, NULL,NULL,NULL);
		INSERT INTO PRODUCTO_HAS_TAMAÑO VALUES (10012,2,16000.00);
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
INSERT INTO PRODUCTO VALUES
	(10013,"RAVIOLI","PASTA RELLENA CON DIFERENTES INGREDIENTES","MEDIA/RAVIOLI.JPG",3, NULL,NULL,NULL);
		INSERT INTO PRODUCTO_HAS_TAMAÑO VALUES (10013,2,10000.00);
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
INSERT INTO PRODUCTO VALUES
	(10014,"SPAGHETTI A LA BOLOÑESA","PASTA ACOMPAÑADA CON SALSA BOLOÑESA","MEDIA/SPAGHETTI_BOLOÑESA.JPG",3, NULL,NULL,NULL);
		INSERT INTO PRODUCTO_HAS_TAMAÑO VALUES (10014,2,16000.00);

           /*--------------------------------- -----------------INSERTANDO-ENSALADAS--------------------------------------------------------*/

INSERT INTO PRODUCTO VALUES
	(10015,"ENSALADA DE PASTA, QUESO Y ALBAHACA","ENSALADA DE PASTA, QUESO Y ALBAHACA","MEDIA/ENSALADA_PQA.JPG",4, NULL,NULL,NULL);
		INSERT INTO PRODUCTO_HAS_TAMAÑO VALUES (10015,2,8000.00);
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
INSERT INTO PRODUCTO VALUES
	(10016,"ENSALADA DE PEPINO Y YOGURT GRIEGO","ENSALADA DE PEPINO Y YOGURT GRIEGO","MEDIA/ENSALADA_PYG.JPG",4, NULL,NULL,NULL);
		INSERT INTO PRODUCTO_HAS_TAMAÑO VALUES (10016,2,8000.00);

           /*--------------------------------- -----------------INSERTANDO-ACOMPAÑANTES--------------------------------------------------------*/

INSERT INTO PRODUCTO VALUES
	(10017,"PALITOS DE QUESO","DELICIOSO HOJALDRE SUPERRELLENO DE QUESO DOBLE CREMA Y UN TOQUE SECRETO","MEDIA/PALITOS_QUESO.JPG",5, NULL,NULL,NULL);
		INSERT INTO PRODUCTO_HAS_TAMAÑO VALUES (10017,2,8000.00);
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/

/*------------------------------------------------------------INSERTANDO-PERSONAS---------------------------------------------------------------------*/


       /*--------------------------------- -----------------INSERTANDO-ADMINISTRADORES--------------------------------------------------------*/

INSERT INTO PERSONA VALUES ("1033815398",1,"JUAN","SEBASTIAN","RUIZ","CASTANEDA","JSRUIZ241","1234",400889,3022608970,"MI CASA","JSRUIZ241@MISENA.EDU.CO");
	INSERT INTO ROL_has_PERSONA VALUES(3,"1033815398",1,1);

       /*--------------------------------- --------------------INSERTANDO-EMPLEADOS-----------------------------------------------------------*/

INSERT INTO PERSONA VALUES ("1031157939",1,"ALBERT","HERNAN","QUINTERO","VALENCIA","AQUINTERO939","1234",4008881,3123654823,"CASA ALBERT","AQUINTERO939@MISENA.EDU.CO");
	INSERT INTO ROL_has_PERSONA VALUES(1,"1031157939",1,1);
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
INSERT INTO PERSONA VALUES ("1031178887",1,"JEISON","ALEXANDER","DIAZ","DAZA","JADIAZ908","1234",4008888,3203725972,"CASA JEISON","JADIAZ908@MISENA.EDU.CO");
	INSERT INTO ROL_has_PERSONA VALUES(1,"1031178887",1,1);

       /*--------------------------------- --------------------INSERTANDO-CLIENTES-----------------------------------------------------------*/

INSERT INTO PERSONA VALUES ("9900000001",2,"FERNANDO","JOSE","PRADA","OTERO","PRADA6","1234",4008882,3102878826,"CASA FERNANDO","PRADA6@MISENA.EDU.CO");
	INSERT INTO ROL_has_PERSONA VALUES(2,"9900000001",2,1);
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
INSERT INTO PERSONA VALUES ("1014304616",1,"JULIANA","GERALDIN","GARCIA","CORREDOR","JGGARCIA176","1234",4008888,3157301391,"CASA GERALDIN","JGGARCIA176@MISENA.EDU.CO");
	INSERT INTO ROL_has_PERSONA VALUES(2,"1014304616",1,1);


/*------------------------------------------------------------INSERTANDO-OPINIONES---------------------------------------------------------------------*/

CALL Insertar_Opinion("SEBASTIAN ES PRO","1033815398");
CALL Insertar_Opinion("DEACUERDO CON EL DE ARRIBA","1031157939");
CALL Insertar_Opinion("EL DE ARRIBA DICE LA VERDAD","1031178887");
CALL Insertar_Opinion("A mi me gustan mayores de  esos que llaman señores","9900000001");

/*------------------------------------------------------------INSERTANDO-OPINIONES---------------------------------------------------------------------*/


/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/

