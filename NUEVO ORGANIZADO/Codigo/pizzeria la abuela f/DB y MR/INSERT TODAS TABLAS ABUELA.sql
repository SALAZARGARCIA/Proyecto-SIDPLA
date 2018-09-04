INSERT INTO TIPO_DOC VALUES ("CEDULA DE CIUDADANIA",1),("TARJETA DE IDENTIDAD",1),("CEDULA DE EXTRANGERIA",1);

INSERT INTO ROL VALUES ("EMPLEADO",1),("CLIENTE",1),("ADMINISTRADOR",1);

INSERT INTO ESTADO_DOMICILIO VALUES ("ENTREGADO",1),("EN ESPERA",1),("CANCELADO",1);

INSERT INTO TAMAÑO VALUES ("PEQUEÑA",1),("MEDIANA",1),("GRANDE",1),("FAMILIAR",1),("EXTRA GRANDE",1),("250 ML",1),("350 ML",1),("500 ML",1),("1 LT",1),("1.25 LT",1),("2.5 LT",1),("UNICO",1);

INSERT INTO TIPO_PRODUCTO VALUES ("PIZZA",1),("BEBIDA",1),("PASTA",1),("ENSALADA",1),("ACOMPAÑANTE",1),("ADICIONALES",1);

INSERT INTO PIZZERIA VALUES (801145012,"PIZZERIA ABUELA T.P.","CALLE 65 Sur # 15 - 20",4008887,3105320621);

INSERT INTO PIZZERIA VALUES (801145023,"PIZZERIA ABUELA LA 40","CALLE 40 Sur # 36 - 16",555504,3108475963);


/*------------------------------------------------------------INSERTANDO-PRODUCTOS---------------------------------------------------------------------*/

          /*--------------------------------- -----------------INSERTANDO-PIZZAS--------------------------------------------------------*/

INSERT INTO PRODUCTO VALUES
	(1,"Pizza Hawaiana","Pizza con jamon, queso y piña","HAWAIANAPEQ.jpg",NULL,NULL,NULL,"PIZZA","PEQUEÑA",33000),
	(2,"Pizza Hawaiana","Pizza con jamon, queso y piña","HAWAIANAMED.jpg",NULL,NULL,NULL,"PIZZA","MEDIANA",38000),
	(3,"Pizza Hawaiana","Pizza con jamon, queso y piña","HAWAIANAGRANDE.jpg",NULL,NULL,NULL,"PIZZA","GRANDE",41000),
	(4,"Pizza Hawaiana","Pizza con jamon, queso y piña","HAWAIANAFAMILIAR.jpg",NULL,NULL,NULL,"PIZZA","FAMILIAR",42000),
	(5,"Pizza Hawaiana","Pizza con jamon, queso y piña","HAWAIANAEXTRAGRANDE.jpg",NULL,NULL,NULL,"PIZZA","EXTRA GRANDE",45000);
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
INSERT INTO PRODUCTO VALUES
	(6,"Pizza Peperoni","Pizza con peperoni, champiñon y queso","PEPPERONIPEQUE.jpg", NULL,NULL,NULL,"PIZZA","PEQUEÑA",33000),
	(7,"Pizza Peperoni","Pizza con peperoni, champiñon y queso","PEPPERONIMEDIANA.jpg", NULL,NULL,NULL,"PIZZA","MEDIANA",38000),
	(8,"Pizza Peperoni","Pizza con peperoni, champiñon y queso","PEPPERONIGRANDE.jpg", NULL,NULL,NULL,"PIZZA","GRANDE",41000),
	(9,"Pizza Peperoni","Pizza con peperoni, champiñon y queso","PEPPERONIFAMILAIR.jpg", NULL,NULL,NULL,"PIZZA","FAMILIAR",42000),
	(10,"Pizza Peperoni","Pizza con peperoni, champiñon y queso","PEPPERONIEXTRAGRANDE.jpg", NULL,NULL,NULL,"PIZZA","EXTRA GRANDE",45000);
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
INSERT INTO PRODUCTO VALUES
	(11,"Pizza Mexicana","Pizza con carne molida, cebolla, tomate, pimenton, jalapeños, queso y maizitos","MEXICANAPEQUENIA.jpg", NULL,NULL,NULL,"PIZZA","PEQUEÑA",33000),
	(12,"Pizza Mexicana","Pizza con carne molida, cebolla, tomate, pimenton, jalapeños, queso y maizitos","MEXICANAMEDIANA.jpg", NULL,NULL,NULL,"PIZZA","MEDIANA",38000),
	(13,"Pizza Mexicana","Pizza con carne molida, cebolla, tomate, pimenton, jalapeños, queso y maizitos","MEXICANAGRANDE.jpg", NULL,NULL,NULL,"PIZZA","GRANDE",41000),
	(14,"Pizza Mexicana","Pizza con carne molida, cebolla, tomate, pimenton, jalapeños, queso y maizitos","MEXICANAFAMILIAR.jpg", NULL,NULL,NULL,"PIZZA","FAMILIAR",42000),
	(15,"Pizza Mexicana","Pizza con carne molida, cebolla, tomate, pimenton, jalapeños, queso y maizitos","MEXICANAEXTRAGRANDE.jpg", NULL,NULL,NULL,"PIZZA","EXTRA GRANDE",45000);
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
INSERT INTO PRODUCTO VALUES
	(16,"Pizza Queso","Pizza rapleta de tus quesos favoritos","PIZZAQUESOPEQUENIA.jpg", NULL,NULL,NULL,"PIZZA","PEQUEÑA",33000),
	(17,"Pizza Queso","Pizza rapleta de tus quesos favoritos","PIZZAQUESOMEDIANA.jpg", NULL,NULL,NULL,"PIZZA","MEDIANA",38000),
	(18,"Pizza Queso","Pizza rapleta de tus quesos favoritos","PIZZAQUESOGRANDE.jpg", NULL,NULL,NULL,"PIZZA","GRANDE",41000),
	(19,"Pizza Queso","Pizza rapleta de tus quesos favoritos","PIZZAQUESOFAMILIAR.jpg", NULL,NULL,NULL,"PIZZA","FAMILIAR",42000),
	(20,"Pizza Queso","Pizza rapleta de tus quesos favoritos","PIZZAQUESOEXTRAGRANDE.jpg", NULL,NULL,NULL,"PIZZA","EXTRA GRANDE",45000);
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
INSERT INTO PRODUCTO VALUES
	(21,"Pizza Pollo y Champiñones","Pizza con champiñones, queso y pollo","CHAMPINIONESPEQUEÑA.jpg",NULL,NULL,NULL,"PIZZA","PEQUEÑA",33000),
	(22,"Pizza Pollo y Champiñones","Pizza con champiñones, queso y pollo","CHAMPINIONESMEDIANA.jpg",NULL,NULL,NULL,"PIZZA","MEDIANA",38000),
	(23,"Pizza Pollo y Champiñones","Pizza con champiñones, queso y pollo","CHAMPINIONESGRANDE.jpg",NULL,NULL,NULL,"PIZZA","GRANDE",41000),
	(24,"Pizza Pollo y Champiñones","Pizza con champiñones, queso y pollo","CHAMPINIONESFAMILIAR.jpg",NULL,NULL,NULL,"PIZZA","FAMILIAR",42000),
	(25,"Pizza Pollo y Champiñones","Pizza con champiñones, queso y pollo","CHAMPINIONESEXTRAGRANDE.jpg",NULL,NULL,NULL,"PIZZA","EXTRA GRANDE",45000);
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
INSERT INTO PRODUCTO VALUES
	(26,"Pizza Vegetariana","Pizza con cabolla, pimenton, mazorca, tomate, pepereni y queso","VEGETARIANAPEQUENIA.jpg",NULL,NULL,NULL,"PIZZA","PEQUEÑA",33000),
	(27,"Pizza Vegetariana","Pizza con cabolla, pimenton, mazorca, tomate, pepereni y queso","VEGETARIANAMEDIANA.jpg",NULL,NULL,NULL,"PIZZA","MEDIANA",38000),
	(28,"Pizza Vegetariana","Pizza con cabolla, pimenton, mazorca, tomate, pepereni y queso","VEGETARIANAGRANDE.jpg",NULL,NULL,NULL,"PIZZA","GRANDE",41000),
	(29,"Pizza Vegetariana","Pizza con cabolla, pimenton, mazorca, tomate, pepereni y queso","VEGETARIANAFAMILIAR.jpg",NULL,NULL,NULL,"PIZZA","FAMILIAR",42000),
	(30,"Pizza Vegetariana","Pizza con cabolla, pimenton, mazorca, tomate, pepereni y queso","VEGETARIANAEXTRAGRANDE.jpg",NULL,NULL,NULL,"PIZZA","EXTRA GRANDE",45000);


           /*--------------------------------- -----------------INSERTANDO-BEBIDAS--------------------------------------------------------*/

INSERT INTO PRODUCTO VALUES
	(31,"CocaCola","CocaCola tradicional","Cocacola250ml.jpg",20,50,30,"BEBIDA","250 ML",1100),
	(32,"CocaCola","CocaCola tradicional","Cocacola350ml.jpg",20,50,30,"BEBIDA","350 ML",2200),
	(33,"CocaCola","CocaCola tradicional","Cocacola500ml.jpg",20,50,30,"BEBIDA","500 ML",2800),
	(34,"CocaCola","CocaCola tradicional","Cocacola1l.jpg",20,50,30,"BEBIDA","1 LT",3200),
	(35,"CocaCola","CocaCola tradicional","Cocacola1.5l.jpg",20,50,30,"BEBIDA","1.25 LT",3600),
	(36,"CocaCola","CocaCola tradicional","Cocacola2.5l.jpg",20,50,30,"BEBIDA","2.5 LT",4200);
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
INSERT INTO PRODUCTO VALUES
	(37,"Pepsi","Pepsi tradicional","Pepsi250ml.jpg",20,50,30,"BEBIDA","250 ML",1100),
	(38,"Pepsi","Pepsi tradicional","Pepsi350ml.jpg",20,50,30,"BEBIDA","350 ML",2200),
	(39,"Pepsi","Pepsi tradicional","Pepsi500ml.jpg",20,50,30,"BEBIDA","500 ML",2800),
	(40,"Pepsi","Pepsi tradicional","Pepsi1l.jpg",20,50,30,"BEBIDA","1 LT",3200),
	(41,"Pepsi","Pepsi tradicional","Pepsi1.25l.jpg",20,50,30,"BEBIDA","1.25 LT",3600);
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
INSERT INTO PRODUCTO VALUES
	(43,"Jugo Naranja","Jugo de naranja natural","JugoDeNaranja350ml.jpg",20,50,30,"BEBIDA","350 ML",1700),
	(45,"Jugo Naranja","Jugo de naranja natural","JugoDeNaranja1l.jpg",20,50,30,"BEBIDA","1 LT",2900);
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
INSERT INTO PRODUCTO VALUES
	(46,"Cerveza Heinken","Cerveza Heinken","HEINEKEN.jpg",20,50,30,"BEBIDA","350 ML",3200),
	(47,"Cerveza REDD'S","Cerveza REDD'S","redds.jpg",20,50,30,"BEBIDA","350 ML",3000),
	(48,"Cerveza Pooker","Cerveza Pooker","poker.jpg",20,50,30,"BEBIDA","350 ML",2500);


           /*--------------------------------- -----------------INSERTANDO-PASTAS--------------------------------------------------------*/
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
INSERT INTO PRODUCTO VALUES
	(49,"Lasagna Con Carne","Pasta en laminas intercaladas con carne ternera","lasagnaDICARNE.jpg",NULL,NULL,NULL,"PASTA","UNICO",16000);
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
INSERT INTO PRODUCTO VALUES
	(50,"Lasagna con Pollo","Pasta en laminas intercaladas con pollo","LASAGNADIPOLLO.jpg",NULL,NULL,NULL,"PASTA","UNICO",16000);
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
INSERT INTO PRODUCTO VALUES
	(51,"Ravioli","Pasta con pollo, salsa a la bolognesa y queso","RAVIOLI.jpg",NULL,NULL,NULL,"PASTA","UNICO",10000);
/*------------------------------------------------------------------------------------------------------------------------------------------------*/
INSERT INTO PRODUCTO VALUES
	(52,"Spaghuetti a la Bolognesa","Pasta acompañada con salsa bolognesa","SPAGHETTIALABOLOGNESA.jpg",NULL,NULL,NULL,"PASTA","UNICO",16000);

           /*--------------------------------- -----------------INSERTANDO-ENSALADAS--------------------------------------------------------*/

INSERT INTO PRODUCTO VALUES
	(53,"Ensalada de Pasta, Queso y Albahaca","Ensalada de pasta, queso y albahaca","ENSALADADEPASTAQUESOYALBAHACA.jpg",NULL,NULL,NULL,"ENSALADA","UNICO",8000);
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
INSERT INTO PRODUCTO VALUES
	(54,"Ensalada de Pepino y Yogurt Griego","Ensalada de Pepino y Yogurt Griego","ENSALADAPEPINO.jpg", NULL,NULL,NULL,"ENSALADA","UNICO",8000);

           /*--------------------------------- -----------------INSERTANDO-ACOMPAÑANTES--------------------------------------------------------*/

INSERT INTO PRODUCTO VALUES
	(55,"Palitos de Queso","Delicioso hojaldre superrelleeno de queso doble crema y un toque secreto","PALITOSDEQUESO.jpg",NULL,NULL,NULL,"ACOMPAÑANTE","UNICO",8000);

/*--------------------------------------------------------------------------------------------------------------------------------------------------*/

 /*--------------------------------- -----------------INSERTANDO-ADICIONALES--------------------------------------------------------*/

INSERT INTO PRODUCTO VALUES
	(56,"Queso","Añade una deliciosa porcion de queso a tu Pizza","ADQUESO.jpg",NULL,NULL,NULL,"ADICIONALES","UNICO",1000),
	(57,"Piña","Añade una deliciosa porcion de Piña a tu Pizza","ADPIÑA.jpg",NULL,NULL,NULL,"ADICIONALES","UNICO",500),
	(58,"Tocineta","Añade una deliciosa Tocineta a tu Pizza","ADTOCINETA.jpg",NULL,NULL,NULL,"ADICIONALES","UNICO",1000),
	(59,"Pollo","Añade una deliciosa porcion de Pollo a tu Pizza","ADPOLLO.jpg",NULL,NULL,NULL,"ADICIONALES","UNICO",1000),
	(60,"Salami","Añade una deliciosa porcion de Salami a tu Pizza","ADSALAMI.jpg",NULL,NULL,NULL,"ADICIONALES","UNICO",2000);

/*------------------------------------------------------------INSERTANDO-PERSONAS---------------------------------------------------------------------*/


       /*--------------------------------- -----------------INSERTANDO-ADMINISTRADORES--------------------------------------------------------*/

INSERT INTO PERSONA VALUES ("1033815398","JUAN SEBASTIAN","RUIZ CASTAÑEDA","$2y$10$w8fUh1lLC5aeaH/C58.4yOw714GavTbQ.yN7/icOs6VZf7mlw6Liy",400889,3022608970,"Cll 63 F No. 74 - 25","JSRUIZ241@MISENA.EDU.CO","CEDULA DE CIUDADANIA","ADMINISTRADOR");

       /*--------------------------------- --------------------INSERTANDO-EMPLEADOS-----------------------------------------------------------*/

INSERT INTO PERSONA VALUES ("1031157939","ALBERT HERNAN","QUINTERO VALENCIA","$2y$10$w8fUh1lLC5aeaH/C58.4yOw714GavTbQ.yN7/icOs6VZf7mlw6Liy",4008881,3123654823,"Cra 4 # 35 - 25 sur","AQUINTERO939@MISENA.EDU.CO","CEDULA DE EXTRANGERIA","EMPLEADO");
/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
INSERT INTO PERSONA VALUES ("1031178887","JEISON ALEXANDER","DIAZ DAZA","$2y$10$w8fUh1lLC5aeaH/C58.4yOw714GavTbQ.yN7/icOs6VZf7mlw6Liy",4008888,3203725972,"Cra 24 # 50 - 20 sur","JADIAZ908@MISENA.EDU.CO","CEDULA DE CIUDADANIA","EMPLEADO");

       /*--------------------------------- --------------------INSERTANDO-CLIENTES-----------------------------------------------------------*/

INSERT INTO PERSONA VALUES ("9900000001","FERNANDO JOSE","PRADA OTERO","$2y$10$w8fUh1lLC5aeaH/C58.4yOw714GavTbQ.yN7/icOs6VZf7mlw6Liy",4008882,3102878826,"Av. Calle 5 # 15 - 01 este","PRADA6@MISENA.EDU.CO","CEDULA DE CIUDADANIA","CLIENTE");

/*--------------------------------------------------------------------------------------------------------------------------------------------------*/
INSERT INTO PERSONA VALUES ("1014304616","JULIANA GERALDIN","GARCIA CORREDOR","$2y$10$w8fUh1lLC5aeaH/C58.4yOw714GavTbQ.yN7/icOs6VZf7mlw6Liy",4008888,3157301391,"Av. Suba # 21 - 22","JGGARCIA176@MISENA.EDU.CO","CEDULA DE CIUDADANIA","CLIENTE");



/*------------------------------------------------------------INSERTANDO-OPINIONES---------------------------------------------------------------------*/

INSERT INTO OPINION (Opinion,persona_Num_Documento_per,persona_tipo_doc,Fecha) VALUES("Me  gusta la pizzeria, muy buen servicio","1033815398","CEDULA DE CIUDADANIA",NOW());
INSERT INTO OPINION (Opinion,persona_Num_Documento_per,persona_tipo_doc,Fecha) VALUES("El tiempo que se demoro mi domicilio fue rapido, muy bien por eso.","1031157939","CEDULA DE EXTRANGERIA",NOW());
INSERT INTO OPINION (Opinion,persona_Num_Documento_per,persona_tipo_doc,Fecha) VALUES("Excelente servicio","1031178887","CEDULA DE CIUDADANIA",NOW());
INSERT INTO OPINION (Opinion,persona_Num_Documento_per,persona_tipo_doc,Fecha) VALUES("Me parece excelente que cuenten con el servicio web para los domicilios","9900000001","CEDULA DE CIUDADANIA",NOW());

