USE DW3_EDERLI_MIRANDA_MITONO_SEPULVEDA;

INSERT INTO
	permisos (CREAR, EDITAR, BORRAR, MODERAR_COMENTARIOS, MODERAR_USUARIOS, MODERAR_POSTS)
VALUES
	('1', '1', '1', '1', '1', '1'),
	('1', '1', '0', '0', '0', '0');

INSERT INTO
	usuarios (NOMBRE_COMPLETO, EMAIL, CONTRASENIA, FECHA_ALTA, U_ESTADO, FKPERMISOS)
VALUES
	('german rodriguez', 'german.rodriguez@davinci.edu.ar', MD5('admin1234'), NOW( ), '1', 1),
	('federico miranda', 'federico.mirandaa@gmail.com', MD5('1234'), NOW( ), '1', 1),
	('leandro merlo', 'merloleandro@gmail.com', MD5('holis1234'), NOW( ), '1', 1),
	('florencia sepulveda', 'florenciasepulveda.26@gmail.com', MD5('holis1234'), NOW( ), '1', 1),
	('florencia ederli', 'florenciaespino@gmail.com', MD5('zeldaeslomas'), NOW( ), '1', 1),
	('laura mitono', 'mlauramitono@gmail.com', MD5('nellylalechuza'), NOW( ), '1', 1),
	('usuario uno', 'usuario1@davinci.edu.ar', MD5('1234'), NOW( ), '1', 2),
	('usuario dos', 'usuario2@davinci.edu.ar', MD5('1234'), NOW( ), '1', 2),
	('usuario tres', 'usuario3@davinci.edu.ar', MD5('1234'), NOW( ), '1', 2);

INSERT INTO
	articulos (TITULO, CHUCHERIA, FECHA_ALTA, VIDEO, IMAGENES, IMG_DESTACADA, DESCRIPCION, A_ESTADO, FKUSUARIO)
VALUES
	('Miren mi ropita nueva de Splatoon', 'Splatoon', NOW( ), null, null, 'splatoon.jpg', 'Hola amigos, estuve jugando al Splatton 2 para Nintendo Swith y me sorprendió la variedad de ropitas nuevas que hay disponible.', '1', 5),
	('Through The Ages 2nd Edition!', 'Through The Ages', NOW( ), null, 'through02.jpg, through03.jpg, through04.jpg', 'through01.jpg', 'Con Sid Meier, kpo total de la estrategia en la pc hace años y años!! Gracias por tanto, pequeño homenaje ingame a el, el lider mas codiciado!', '1', 1),
	('Ticket to Ride: Europe', 'Ticket to Ride', NOW( ), null, null, 'ticket.jpeg', 'Uno de mis jueguitos favoritos, super adictivo, puedo pasarme horas jugando con mis amigas Flor', '1', 6),
	('Deadpool Funko Pop', 'Deadpool', NOW( ), null, null, 'deadpool.jpg', 'Miren el muñequito que me compré', '1', 2),
	('Mi stitch y yo', 'stitch', NOW( ), null, null, 'stitch.jpg', 'Stitch rechazándome fuertemente un domingo por la noche', '1', 5),
	('Colección Hogwarts', 'Harry Potter', NOW( ), null, null, 'hogwarts.jpg', 'Lo mejor que me pudo haber pasado, no veo la hora de verlos todos', '1', 7),
	('Mi nueva vitrina de comics', 'Comics', NOW( ), null, 'vitrina02.jpg, vitrina03.jpg', 'vitrina01.jpg', 'Mi aficción por las historietas me llevó a construir esta vitrina para mis comics. Mi favorito es Superman por ser la insignia y el ícono de DC-sin degradar a Batman-, y por su aspecto religioso, pues se asemeja a Jesús: vive sus 33 años, vino del cielo y es el más poderoso', '1', 2),
	('Conseguí el Suhi Go!', 'Sushi Go', NOW( ), null, 'sushi02.jpg', 'sushi01.jpg', 'No puedo mas de contenta con mi nuevo jueguito, y las cartitas son lo más', '1', 4),
	('Colección de piezas de DC Comic', 'Figuras DC Comics', NOW( ), null, null, 'coleccion_figuras.jpg', 'Me tuve que armar un estante para mi colección de personajes, ahora están todos juntitos', '1', 8),
	('Amo Big Hero', 'Big Hero', NOW( ), null, 'big02.jpg, big03.jpg, big04.jpg, big05.jpg', 'big01.jpg', 'Mi asombrosa lámpara LED USB de Baymax. No puedo dejar de dormir con ella. Su cabeza y sus manos son móviles!', '1', 6),
	('Lois and Peter', 'Family Guy', NOW( ), null, null, 'nighttime.jpg', 'Al carajo con todo! Me lo compré y me encanta. Que se curtan!', '1', 1),
	('Nunca habrá otro Batman como Adam West', 'Batman', NOW( ), null, null, 'tatuaje.jpg', 'Adam no está físicamente, pero ahora vive aquí, en mi tatuaje', '1', 9),
	('Dibujando a Shifu', 'Shifu, Kung Fu Panda', NOW( ), null, null, 'master_shifu.jpg', 'Después de varios intentos logré hacerle este pequeño homenaje a este tan querido personaje de mi peli favorita', '1', 6),
	('Droidecitos', 'Droid Factory, Star Wars', NOW( ), null, null, 'droides.jpg', 'Los conseguí en la tienda de Tattoine Traders en los estudios Disney, son lo mas mono que he visto y no me resistí a comprarlos', '1', 9),
	('Nerdeando', 'Call of Cthulhu', NOW( ), null, 'cthulhu02.jpg, cthulhu03.jpg', 'cthulhu01.jpg', 'Nerdeando con amigos solo porque si', '1', 1);
	
	
INSERT INTO
	comentarios (COMENTARIO, FECHA_COMENTARIO, C_ESTADO, FKUSUARIO, FKARTICULO)
VALUES
	('Esa ropita está genial', NOW( ), '1', 4, 1),
	('Divina! La quiero ya!', NOW( ), '1', 9, 1),
	('Es un juego fantástico', NOW( ), '1', 6, 2),
	('Bienvenidos a mi Imperio, tomen asiento y vean como les paso el trapo', NOW( ), '1', 6, 3),
	('Me parece asombroso', NOW( ), '1', 5, 3),
	('Es una porquería', NOW( ), '0', 8, 4),
	('Que rica piba', NOW( ), '1', 5, 5),
	('De lo mejor que se vio en este último tiempo', NOW( ), '0', 1, 1),
	('Altas llantas', NOW( ), '1', 7, 1),
	('Está muy bueno pero son 8 horas de juego', NOW( ), '1', 5, 2),
	('El mejor Batman de todos los tiempos, inigualable', NOW( ), '1', 1, 12),
	('Uhhhhhhh papapapa se ve genial', NOW( ), '1', 9, 11),
	('Es muy tiernita esa lámpara', NOW( ), '1', 4, 10),
	('No se parece en nada, te quedó super espantoso', NOW( ), '1', 7, 13),
	('Impresionante invitame!', NOW( ), '1', 5, 6),
	('Juguemos ese jueguito super genial en todos los recreos de DV!', NOW( ), '1', 6, 8);
	

INSERT INTO
	categorias (CATEGORIA)
VALUES
	('Gameplay'), 
	('Como jugar'), 
	('Unboxing'), 
	('Review'), 
	('Fan Made'), 
	('Homenaje'), 
	('Animacion'), 
	('Live action'), 
	('Random'),
	('Bragging'); 

INSERT INTO
	articulos_categorias
VALUES
	( 1, 7 ), 
	( 1, 10 ),
	( 2, 6 ),
	( 3, 10 ),
	( 4, 10 ),
	( 5, 9 ),
	( 5, 10 ),
	( 6, 10 ),
	( 7, 9 ),
	( 7, 10),
	( 8, 10),
	( 9, 10),
	( 10, 10),
	( 11, 10),
	( 12, 6),
	( 13, 5),
	( 13, 6),
	( 14, 9),
	( 14, 10),
	( 15, 1);

