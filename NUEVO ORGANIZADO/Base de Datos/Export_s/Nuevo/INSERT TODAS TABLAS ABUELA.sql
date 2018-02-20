
INSERT INTO TIPO_DOC VALUES ("CEDULA DE CIUDADANIA",1),("TARGETA DE IDENTIDAD",1),("CEDULA DE EXTRANGERIA",1);

INSERT INTO ROL VALUES ("EMPLEADO",1),("CLIENTE",1),("ADMINISTRADOR",1);

INSERT INTO ESTADO_DOMICILIO VALUES ("ENTREGADO",1),("EN ESPERA",1),("CANCELADO",1);

INSERT INTO TAMAÑO VALUES ("PEQUEÑA",1),("MEDIANA",1),("GRANDE",1),("FAMILIAR",1),("EXTRA GRANDE",1),("250 ML",1),("350 ML",1),("500 ML",1),("1 LT",1),("1.25 LT",1),("2.5 LT",1);

INSERT INTO TIPO_PRODUCTO VALUES ("PIZZA",1),("BEBIDA",1),("PASTA",1),("ENSALADA",1),("ACOMPAÑANTE",1);

INSERT INTO PIZZERIA VALUES (801145012,"PIZZERIA ABUELA","CALLE FALSA 13-31",4008887,3105320621,"MEDIA/FOTO_P_ABUELA.JPG");

/*------------------------------------------------------------INSERTANDO-PRODUCTOS---------------------------------------------------------------------*/

          /*--------------------------------- -----------------INSERTANDO-PIZZAS--------------------------------------------------------*/

INSERT INTO PRODUCTO VALUES
	(1,"PIZZA HAWAIANA","PIZZA QUE CONTIENE UNA BASE DE QUESO FUNDIDO Y TOMATE QUE SE ALIÑAN CON JAMÓN Y PIÑA","MEDIA/HAWAIANA.JPG", NULL,NULL,NULL,"PIZZA","PEQUEÑA",NULL);
		INSERT INTO PRODUCTO_HAS_TAMAÑO VALUES (1,"PEQUEÑA",15000.00),(1,"MEDIANA",22000.00),(1,"GRANDE",27000.00),(1,"FAMILIAR",32000.00),(1,"EXTRA GRANDE",40000.00);
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/



INSERT INTO PRODUCTO VALUES
	(2,"PIZZA PEPPERONI","PIZZA QUE CONTIENE PEPPERONI","MEDIA/PEPPERONI.JPG","PIZZA", NULL,NULL,NULL);
		INSERT INTO PRODUCTO_HAS_TAMAÑO VALUES (2,"PEQUEÑA",15000.00),(2,"MEDIANA",22000.00),(2,"GRANDE",27000.00),(2,"FAMILIAR",32000.00),(2,"EXTRA GRANDE",40000.00);
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
INSERT INTO PRODUCTO VALUES
	(3,"PIZZA MEXICANA","PIZZA QUE CONTIENE TOMATE, FRIJOLES, JALAPEÑOS, CARNE PICADA Y QUESO CHEDDAR","MEDIA/MEXICANA.JPG","PIZZA", NULL,NULL,NULL);
		INSERT INTO PRODUCTO_HAS_TAMAÑO VALUES (3,"PEQUEÑA",15000.00),(3,"MEDIANA",22000.00),(3,"GRANDE",27000.00),(3,"FAMILIAR",32000.00),(3,"EXTRA GRANDE",40000.00);
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
INSERT INTO PRODUCTO VALUES
	(4,"PIZZA QUESO","DELICIOSA Y JUGOSA PIZZA REPLETA DE TUS QUESOS FAVORITOS","MEDIA/QUESO.JPG","PIZZA", NULL,NULL,NULL);
		INSERT INTO PRODUCTO_HAS_TAMAÑO VALUES (4,"PEQUEÑA",15000.00),(4,"MEDIANA",22000.00),(4,"GRANDE",27000.00),(4,"FAMILIAR",32000.00),(4,"EXTRA GRANDE",40000.00);
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
INSERT INTO PRODUCTO VALUES
	(5,"PIZZA CHAMPIÑONES","DELICIOSA Y JUGOSA PIZZA REPLETA DE TUS CHAMPIÑONES FAVORITOS","MEDIA/CHAMPIÑONES.JPG","PIZZA", NULL,NULL,NULL);
		INSERT INTO PRODUCTO_HAS_TAMAÑO VALUES (5,"PEQUEÑA",15000.00),(5,"MEDIANA",22000.00),(5,"GRANDE",27000.00),(5,"FAMILIAR",32000.00),(5,"EXTRA GRANDE",40000.00);
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
INSERT INTO PRODUCTO VALUES
	(6,"PIZZA VEGETARIANA","DELICIOSA PIZZA CON INGREDIENTES VEGETARIANOS IDEAL PARA REEMPLAZAR LA TRADICIONAL","MEDIA/VEGETARIANA.JPG","PIZZA", NULL,NULL,NULL);
		INSERT INTO PRODUCTO_HAS_TAMAÑO VALUES (6,"PEQUEÑA",15000.00),(6,"MEDIANA",22000.00),(6,"GRANDE",27000.00),(6,"FAMILIAR",32000.00),(6,"EXTRA GRANDE",40000.00);

           /*--------------------------------- -----------------INSERTANDO-BEBIDAS--------------------------------------------------------*/

INSERT INTO PRODUCTO VALUES
	(7,"COCACOLA","DELICIOSA BEBIDA COCACOLA TRADICIONAL","MEDIA/COCACOLA.JPG","BEBIDA", 20,50,30);
		INSERT INTO PRODUCTO_HAS_TAMAÑO VALUES (7,"250 ML",500.00),(7,"350 ML",1200.00),(7,"500 ML",1500.00),(7,"1 LT",1900.00),(7,"1.25 LT",2500.00),(7,"2.5 LT",3000.00);
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
INSERT INTO PRODUCTO VALUES
	(8,"PEPSI","DELICIOSA BEBIDA PEPSI TRADICIONAL","MEDIA/PEPSI.JPG","BEBIDA", 20,50,30);
		INSERT INTO PRODUCTO_HAS_TAMAÑO VALUES (8,"250 ML",1100.00),(8,"350 ML",1400.00),(8,"500 ML",1800.00),(8,"1 LT",2400.00),(8,"1.25 LT",3100.00);
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
INSERT INTO PRODUCTO VALUES
	(9,"JUGO NARANJA","DELICIOSO JUGO NARANJA","MEDIA/PEPSI.JPG","BEBIDA", 20,50,30);
		INSERT INTO PRODUCTO_HAS_TAMAÑO VALUES (9,"250 ML",1400.00),(9,"350 ML",1700.00),(9,"500 ML",2100.00),(9,"1 LT",2900.00);

           /*--------------------------------- -----------------INSERTANDO-PASTAS--------------------------------------------------------*/

INSERT INTO PRODUCTO VALUES
	(10,"LASAÑA","PLATO QUE TIENE PASTA EN LÁMINAS INTERCALADAS CON CARNE Y BECHAMEL LLAMADO LASAÑA AL HORNO","MEDIA/LASAÑA.JPG","PASTA", NULL,NULL,NULL);
		INSERT INTO PRODUCTO_HAS_TAMAÑO VALUES (10,"MEDIANA",15000.00);
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
INSERT INTO PRODUCTO VALUES
	(11,"LASAÑA CON CARNE","PLATO QUE TIENE PASTA EN LÁMINAS INTERCALADAS CON CARNE TERNERA","MEDIA/LASAÑACARNE.JPG","PASTA", NULL,NULL,NULL);
		INSERT INTO PRODUCTO_HAS_TAMAÑO VALUES (11,"MEDIANA",16000.00);
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
INSERT INTO PRODUCTO VALUES
	(12,"LASAÑA CON POLLO","PLATO QUE TIENE PASTA EN LÁMINAS INTERCALADAS CON POLLO","MEDIA/LASAÑAPOLLO.JPG","PASTA", NULL,NULL,NULL);
		INSERT INTO PRODUCTO_HAS_TAMAÑO VALUES (12,"MEDIANA",16000.00);
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
INSERT INTO PRODUCTO VALUES
	(13,"RAVIOLI","PASTA RELLENA CON DIFERENTES INGREDIENTES","MEDIA/RAVIOLI.JPG","PASTA", NULL,NULL,NULL);
		INSERT INTO PRODUCTO_HAS_TAMAÑO VALUES (13,"MEDIANA",10000.00);
/*------------------------------------------------------------------------------------------------------------------------------------------------*/
INSERT INTO PRODUCTO VALUES
	(14,"SPAGHETTI A LA BOLOÑESA","PASTA ACOMPAÑADA CON SALSA BOLOÑESA","MEDIA/SPAGHETTI_BOLOÑESA.JPG","PASTA", NULL,NULL,NULL);
		INSERT INTO PRODUCTO_HAS_TAMAÑO VALUES (14,"MEDIANA",16000.00);

           /*--------------------------------- -----------------INSERTANDO-ENSALADAS--------------------------------------------------------*/

INSERT INTO PRODUCTO VALUES
	(15,"ENSALADA DE PASTA, QUESO Y ALBAHACA","ENSALADA DE PASTA, QUESO Y ALBAHACA","MEDIA/ENSALADA_PQA.JPG","ENSALADA", NULL,NULL,NULL);
		INSERT INTO PRODUCTO_HAS_TAMAÑO VALUES (15,"MEDIANA",8000.00);
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
INSERT INTO PRODUCTO VALUES
	(16,"ENSALADA DE PEPINO Y YOGURT GRIEGO","ENSALADA DE PEPINO Y YOGURT GRIEGO","MEDIA/ENSALADA_PYG.JPG","ENSALADA", NULL,NULL,NULL);
		INSERT INTO PRODUCTO_HAS_TAMAÑO VALUES (16,"MEDIANA",8000.00);

           /*--------------------------------- -----------------INSERTANDO-ACOMPAÑANTES--------------------------------------------------------*/

INSERT INTO PRODUCTO VALUES
	(17,"PALITOS DE QUESO","DELICIOSO HOJALDRE SUPERRELLENO DE QUESO DOBLE CREMA Y UN TOQUE SECRETO","MEDIA/PALITOS_QUESO.JPG","ACOMPAÑANTE", NULL,NULL,NULL);
		INSERT INTO PRODUCTO_HAS_TAMAÑO VALUES (17,"MEDIANA",8000.00);
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/

/*------------------------------------------------------------INSERTANDO-PERSONAS---------------------------------------------------------------------*/


       /*--------------------------------- -----------------INSERTANDO-ADMINISTRADORES--------------------------------------------------------*/

INSERT INTO PERSONA VALUES ("1033815398","JUAN","SEBASTIAN","RUIZ","CASTAÑEDA","JSRUIZ241","1234",400889,3022608970,"MI CASA","JSRUIZ241@MISENA.EDU.CO","CEDULA DE CIUDADANIA");
	INSERT INTO ROL_has_PERSONA VALUES("ADMINISTRADOR","1033815398","CEDULA DE CIUDADANIA",1);

       /*--------------------------------- --------------------INSERTANDO-EMPLEADOS-----------------------------------------------------------*/

INSERT INTO PERSONA VALUES ("1031157939","ALBERT","HERNAN","QUINTERO","VALENCIA","AQUINTERO939","1234",4008881,3123654823,"CASA ALBERT","AQUINTERO939@MISENA.EDU.CO","CEDULA DE CIUDADANIA");
	INSERT INTO ROL_has_PERSONA VALUES("EMPLEADO","1031157939","CEDULA DE CIUDADANIA",1);
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
INSERT INTO PERSONA VALUES ("1031178887","JEISON","ALEXANDER","DIAZ","DAZA","JADIAZ908","1234",4008888,3203725972,"CASA JEISON","JADIAZ908@MISENA.EDU.CO","CEDULA DE CIUDADANIA");
	INSERT INTO ROL_has_PERSONA VALUES("EMPLEADO","1031178887","CEDULA DE CIUDADANIA",1);

       /*--------------------------------- --------------------INSERTANDO-CLIENTES-----------------------------------------------------------*/

INSERT INTO PERSONA VALUES ("9900000001","FERNANDO","JOSE","PRADA","OTERO","PRADA6","1234",4008882,3102878826,"CASA FERNANDO","PRADA6@MISENA.EDU.CO","TARGETA DE IDENTIDAD");
	INSERT INTO ROL_has_PERSONA VALUES("CLIENTE","9900000001","TARGETA DE IDENTIDAD",1);
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
INSERT INTO PERSONA VALUES ("1014304616","JULIANA","GERALDIN","GARCIA","CORREDOR","JGGARCIA176","1234",4008888,3157301391,"CASA GERALDIN","JGGARCIA176@MISENA.EDU.CO","CEDULA DE CIUDADANIA");
	INSERT INTO ROL_has_PERSONA VALUES("CLIENTE","1014304616","CEDULA DE CIUDADANIA",1);


/*------------------------------------------------------------INSERTANDO-OPINIONES---------------------------------------------------------------------*/

INSERT INTO OPINION (Opinion,Num_Documento_per) VALUES("SEBASTIAN ES PRO","1033815398");
INSERT INTO OPINION (Opinion,Num_Documento_per) VALUES("DEACUERDO CON EL DE ARRIBA","1031157939");
INSERT INTO OPINION (Opinion,Num_Documento_per) VALUES("EL DE ARRIBA DICE LA VERDAD","1031178887");
INSERT INTO OPINION (Opinion,Num_Documento_per) VALUES("A mi me gustan mayores de  esos que llaman señores","9900000001");

/*------------------------------------------------------------INSERTANDO-OPINIONES---------------------------------------------------------------------*/


/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/

