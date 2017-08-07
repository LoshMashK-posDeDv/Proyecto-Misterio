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
	articulos (TITULO, CHUCHERIA, FECHA_ALTA, post, IMAGENES, IMG_DESTACADA, DESCRIPCION, A_ESTADO, FKUSUARIO)
VALUES
	('Miren mi ropita nueva de Splatoon', 'Splatoon', NOW( ), null, null, 'splatoon.jpg', 'Hola amigos, estuve jugando al Splatton 2 para Nintendo Swith y me sorprendió la variedad de ropitas nuevas que hay disponible.', '1', 5),
	('Through The Ages 2nd Edition!', 'Through The Ages', NOW( ), null, 'through02.jpg, through03.jpg, through04.jpg', 'through01.jpg', 'Con Sid Meier, kpo total de la estrategia en la pc hace años y años!! Gracias por tanto, pequeño homenaje ingame a el, el lider mas codiciado!', '1', 1),
	('Ticket to Ride: Europe', 'Ticket to Ride', NOW( ), null, null, 'ticket.jpeg', 'Uno de mis jueguitos favoritos, super adictivo, puedo pasarme horas jugando con mis amigas Flor', '1', 6),
	('Deadpool Funko Pop', 'Deadpool', NOW( ), null, null, 'deadpool.jpg', 'Miren el muñequito que me compré', '1', 2),
	('Mi stitch y yo', 'stitch', NOW( ), null, null, 'stitch.jpg', 'Stitch rechazándome fuertemente un domingo por la noche', '1', 5),
	('Listo para matar', 'Deadpool', NOW( ), null, null, 'deadpoolger.jpg', 'A punto de hacerles bebes a mis alumnos de php con mi nueva campera de Deadpool', '1', 1);

INSERT INTO
	comentarios (COMENTARIO, FECHA_COMENTARIO, C_ESTADO, FKUSUARIO, FKARTICULO)
VALUES
	('Esa ropita está genial', NOW( ), '1', 4, 1),
	('Es un juego fantástico', NOW( ), '1', 6, 2),
	('Me parece asombroso', NOW( ), '1', 5, 3),
	('Es una porquería', NOW( ), '0', 8, 4),
	('que rica piba', NOW( ), '1', 5, 5),
	('De lo mejor que se vio en este último tiempo', NOW( ), '0', 1, 1),
	('Altas llantas', NOW( ), '1', 7, 1),
	('Está muy bueno pero son 8 horas de juego', NOW( ), '1', 5, 2);

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
	( 6, 10 );
