USE prision_libertad;

INSERT INTO
	permisos (CREAR, EDITAR, BORRAR, MODERAR_COMENTARIOS, MODERAR_USUARIOS, MODERAR_VIDEOS)
VALUES
	('1', '1', '1', '1', '1', '1'),
	('1', '1', '0', '0', '0', '0');

INSERT INTO
	usuarios (NOMBRE_USUARIO, NOMBRE_COMPLETO, EMAIL, CONTRASENIA, FECHA_ALTA, U_ESTADO, FKPERMISOS)
VALUES
	('grodrigez', 'german rodriguez', 'german.rodriguez@davinci.edu.ar', MD5('admin1234'), NOW( ), '1', 1),
	('fmiranda', 'federico miranda', 'federico.mirandaa@gmail.com', MD5('1234'), NOW( ), '1', 1),
	('lmerlo', 'leandro merlo', 'merloleandro@gmail.com', MD5('holis1234'), NOW( ), '1', 1),
	('florsepulveda', 'florencia sepulveda', 'florenciasepulveda.26@gmail.com', MD5('holis1234'), NOW( ), '1', 1),
	('fespino', 'florencia ederli', 'florenciaespino@gmail.com', MD5('zeldaeslomas'), NOW( ), '1', 1),
	('lmitono', 'laura mitono', 'mlauramitono@gmail.com', MD5('nellylalechuza'), NOW( ), '1', 1),
	('miguel', 'miguel masenio', 'miguel.masenio@davinci.edu.ar', MD5('1234'), NOW( ), '1', 1),
	('usuario1', 'usuario uno', NULL, MD5('1234'), NOW( ), '1', 2),
	('usuario2', 'usuario dos', NULL, MD5('1234'), NOW( ), '1', 2),
	('usuario3', 'usuario tres', NULL, MD5('1234'), NOW( ), '1', 2);
	
INSERT INTO
	articulos (TITULO, AUTOR, AÑO, DURACION, FECHA_ALTA, VIDEO, IMAGENES, IMG_DESTACADA, DESCRIPCION, A_ESTADO, FKUSUARIO)
VALUES
	('La pandilla', 'Quiensabe', '1985', '00:02:55', '2016-12-5 00:00:00', '', NULL, '', 'Saraza', '1', 1),
	('El tp dificil', 'Ger', '2015', '00:05:50', '2018-12-5 00:00:00', '', NULL, '', 'Saraza', '1', 1),
	('La moneda', 'Sari', '0000', '00:06:05', '2015-12-5 00:00:00', '', NULL, '', 'Saraza', '1', 1),
	('El tostadito de Dv', 'Señora del buffet', '1954', '00:03:30', '2013-12-5 00:00:00', '', NULL, '', 'Saraza', '1', 1),
	('Fantasmitas - Editado', 'Joni', '2017', '00:02:55', '2002-12-5 00:00:00', '', NULL, '', 'Saraza', '1', 1),
	('Muchas cositas', 'Flor', '2014', '00:05:50', '2015-2-5 00:00:00', '', NULL, '', 'Saraza', '1', 1),
	('Que puede ser', 'Alguien', '2018', '00:03:30', '2018-8-5 00:00:00', '', NULL, '', 'Saraza', '1', 1),
	('TITULO DE PRUEBA - EDITADO', '', '2017', '20:04:09', NULL, 'prueba.mp4', NULL, '', 'DESCRIPCION DE PRUEBA', '1', 1),
	('Probando uploads', '', '2017', '30:20:10', NULL, 'prueba.mp4', NULL, 'expensas.png', 'asdlkasjdlkasdlkajsdlkajsd', '', 1),
	( 'Probando el replace', '', '2017', '20:30:40', NULL, 'Probando_el_replace.mp4', NULL, 'expensas.png', 'lkajsdlakjsdaklsdjasdlknaskldas', '1', 1),
	( 'lkajsdlkajsdlkajsdlasdnalksdnasdlabs PROBANDO', '', '0000', '20:30:40', NULL, 'lkajsdlkajsdlkajsdlasdnalksdnasdlabs_PROBANDO_vide', NULL, 'phill.jpg', 'lahsdaohsdohaskndaoshdiansdklabsodansd', '1', 1),
	( 'FUNCIONA TODO PERRAS', '', '2017', '20:30:40', NULL, 'probando_extension_de_la_imagen_video.mp4', NULL, 'probando_extension_de_la_imagen_img_destacada.png', 'Solo me falta agregar el move_upload_files a la edición por si cambia la imagen o el video', '1', 1),
	( 'video upload', '', '2017', '20:30:40', NULL, 'video_upload_video.mp4', NULL, 'video_upload_img_destacada.jpg', 'aklsjdalksdj', '1', 1),
	( 'video upload', '', '2017', '20:30:40', NULL, 'video_upload_video.mp4', NULL, 'video_upload_img_destacada.jpg', 'aklsjdalksdj', '1', 1),
	( 'PRUEBA', '', '2017', '01:30:45', NULL, 'NUEVO_VIDEO_-_PARA_EDITAR__video.mp4', '150_imagenes_PRUEBA.jpg,151_imagenes_PRUEBA.jpg,15', 'NUEVO_VIDEO_-_PARA_EDITAR__img_destacada.jpg', 'ASDALSJDLAKSJD', '1', 1),
	( 'NUEVO', '', '2017', '20:30:40', NULL, 'NUEVO_video.mp4', '0_imagenes_NUEVO.', 'NUEVO_img_destacada.jpg', 'ALKSJDALKSJDAS', '1', 1),
	( 'ULTIMA PRUEBA', '', '2018', '20:30:40', NULL, 'ULTIMA_PRUEBA_video.mp4', '0_imagenes_ULTIMA_PRUEBA.jpg', 'ULTIMA_PRUEBA_img_destacada.jpg', 'ALKSJDAKLSJDLAKSD', '1', 1),
	( 'ULTIMA ULTIMA', '', '2018', '20:30:40', NULL, 'ULTIMA_ULTIMA_video.mp4', '0_imagenes_ULTIMA_ULTIMA.jpg,1_imagenes_ULTIMA_ULT', 'ULTIMA_ULTIMA_img_destacada.jpg', 'aaaaaaaaaaaaaaaaaaa', '1', 1),
	( 'Probando el nombre de archivo', '', '2017', '20:30:10', NULL, 'Probando_el_nombre_de_archivo_video.mp4', '0_imagenes_Probando_el_nombre_de_archivo.', 'img_1498052938.jpg', 'asdasdaskdhaskdasd', '1', 1),
	( 'TITULO', '', '2017', '20:30:40', '0000-0-0 00:00:00', 'TITULO_video.mp4', '0_imagenes_TITULO.jpg', 'img_1498053581.jpg', 'DESCRIPCION', '1', 1),
	( 'PROBANDO UN VIDEO', '', '2017', '20:30:40', '0000-0-0 00:00:00', 'PROBANDO_UN_VIDEO_video.mp4', '0_imagenes_PROBANDO_UN_VIDEO.', 'img_1498053857.jpg', 'alksjdalksjdalksjdaslkdj', '1', 1),
	( 'asdasdas', '', '2018', '20:30:40', '2017-6-21 11:05:10', 'asdasdas_video.mp4', '0_imagenes_asdasdas.', 'img_1498053910.jpg', 'dasdasdasdasdasd', '1', 1);


INSERT INTO
	comentarios (COMENTARIO, FECHA_COMENTARIO, C_ESTADO, FKUSUARIO, FKARTICULO)
VALUES
	('Este video está genial', NOW( ), '1', 1, 2),
	('Quiero que vuelvan a subir más videos como este', NOW( ), '1', 6, 3),
	('Me parece asombroso', NOW( ), '1', 5, 8),
	('Es una porquería', NOW( ), '0', 9, 4),
	('Que copado que está, voy a volver a verlo', NOW( ), '1', 2, 14),
	('Se mandaron cualquiera', NOW( ), '0', 10, 6),
	('Simplemente maravilloso', NOW( ), '1', 3, 12),
	('Tiene una estetica asombrosa', NOW( ), '1', 4, 5);
	
INSERT INTO 
	categorias (CATEGORIA)
VALUES
	('Animacion'),
	('Documental'),
	('Ciencia'),
	('Comedia'),
	('Deportes'),
	('Policial'),
	('Ficcion');
	
INSERT INTO 
	articulos_categorias
VALUES 
	( 1, 1 ),
	( 1, 6 ),
	( 2, 5 ),
	( 3, 2 ),
	( 4, 4 ),
	( 4, 2 ),
	( 5, 1 ),
	( 7, 6 ),
	( 10, 5 ),
	( 12, 6 ),
	( 13, 6 ),
	( 14, 5 ),
	( 15, 2 ),
	( 16, 4 ),
	( 17, 2 ),
	( 18, 1 ),
	( 19, 6 ),
	( 20, 5 ),
	( 21, 3 ),
	( 22, 5 );
