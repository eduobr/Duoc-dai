--- PROCEDIMIENTOS ALMACENADOS ---
DELIMITER @@
CREATE PROCEDURE Agregar_Articulo(in Nombre varchar(45), in Precio int(11), in Stock int(11), in Marca varchar(45), in Descripcion varchar(45), in Foto varchar(1000), in Tipo varchar(45))
BEGIN 
    INSERT INTO articulo VALUES(null,Nombre,Precio,Stock,Marca,Descripcion,Foto,Tipo);
END @@
DELIMITER ;
----------------------------------
CALL Agregar_Articulo('Asiento Negro-Rojo',15900,3,'END','Asiento General','Asiento Negro-Rojo $15.900','Asiento');
CALL Agregar_Articulo('Asiento Bontrager Community Dama',24990,3,'WSD','Asiento Para Dama','Asiento Bontrager Community Dama WSD $24.990','Asiento');
CALL Agregar_Articulo('Asiento Negro-Verde',15000,3,'END','Asiento General','Asiento Negro-Verde $15.000','Asiento');
CALL Agregar_Articulo('Bombin Beto',5590,3,'Beto','Bombin General','Bombin Beto $5.590','Bombin');
CALL Agregar_Articulo('Bombin Beto',3800,3,'Beto','Bombin de Resina','Bombin beto resina $3.800','Bombin');
CALL Agregar_Articulo('Candado Onguard Bulldog Combo',21800,3,'Onguard','Candado General','Candado Onguard Bulldog Combo $21.800','Candado');
CALL Agregar_Articulo('Candado Onguard Bulldog',19800,3,'Onguard','Candado General','Candado Onguard Bulldog LS $19.800','Candado');
CALL Agregar_Articulo('Juego de Luces Negro 2 LED',2500,3,'END','Luces General','Juego de Luces Negro 2 LED $2.500','Luz');
CALL Agregar_Articulo('Juego de Luces Rojo 2 LED ',2500,3,'END','Luces General','Juego de Luces Rojo 2 LED $2.500','Luz');
CALL Agregar_Articulo('Luz Modelo RL30',63400,3,'END','Luz Delantera','Luz Modelo RL30 $63.400','Luz');
CALL Agregar_Articulo('Porta Massload lateral',4900,3,'Massload','PortaBotella','Porta Massload lateral $4.900','Botella');
CALL Agregar_Articulo('Botella TREK',2500,3,'TREK','Botella General','botellatrekt1-300x300','Botella');
CALL Agregar_Articulo('Juego de Luces QLite',9990,3,'QLite','Luces General','juego de Luces QLite $9.990','Luz');
CALL Agregar_Articulo('porta Massload Negro Basico',4900,3,'Massload','PortaBotella General','porta Massload Negro Basico $4.900','Botella');
CALL Agregar_Articulo('Bicicleta MTB Enduro Remedy 9.8 2017',4490000,3,'Trek','Bicicleta de Montaña','mb1-marlin_4_azul_29_3','Bicicleta');
CALL Agregar_Articulo('Bicicleta MTB Natron 2017',249990,3,'Altitude','Bicicleta de Montaña','mb2-natronamarillo2','Bicicleta');
CALL Agregar_Articulo('Bicicleta Urbana Electra Sugar Skull',589900,3,'3i Lady','Bicicleta Urbana','pa1-167139_sugar_skulls','Bicicleta');
CALL Agregar_Articulo('Bicicleta Urbana Electra Karma',449900,3,'3i Lady','Bicicleta Urbana','pa2-8466350215594_1_1_1','Bicicleta');
CALL Agregar_Articulo('Bicicleta Ruta Domane ARL 4 2017',1290000,3,'Trek','Bicicleta de Carretera','r1-ane_alr_4_rojo1','Bicicleta');
CALL Agregar_Articulo('Bicicleta Ciclocross Crockett 5 Disc 2018',1590000,3,'Trek','Bicicleta de Carretera','r2-crockett_5_disc1','Bicicleta');
SELECT * FROM articulo;
----------------------------------
