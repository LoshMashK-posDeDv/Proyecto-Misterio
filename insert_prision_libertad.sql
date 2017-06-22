USE prision_libertad;

/*
INSERT INTO
	permisos (CREAR, EDITAR, BORRAR, MODERAR_COMENTARIOS, MODERAR_USUARIOS, MODERAR_VIDEOS)
VALUES
	('1', '1', '1', '1', '1', '1'),
	('0', '0', '0', '0', '0', '0'),
	('0', '0', '0', '0', '0', '0'),
	('0', '0', '0', '0', '0', '0'),
	('0', '0', '0', '0', '0', '0'),
	('0', '0', '0', '0', '0', '0');

INSERT INTO
	usuarios (NOMBRE_USUARIO, NOMBRE_COMPLETO, EMAIL, CONTRASENIA, FECHA_ALTA, U_ESTADO)
VALUES
	('german', 'german rodriguez', 'grodriguez@davinci.edu.ar', '1234', NOW( ), 1),
	('fmiranda', 'federico miranda', 'fmiranda@davinci.edu.ar', '1234', NOW( ), 1),
	('leo', 'leo merlo', 'lmerlo@davinci.edu.ar', '1234', NOW( ), 1),
	('flors', 'florencia sepulveda', 'fsepulveda@davinci.edu.ar', '1234', NOW( ), 1),
	('fespino', 'florencia ederli', 'federli@davinci.edu.ar', 'zeldaeslomas', NOW( ), 1),
	('lmitono', 'laura mitono', 'lmitono@davinci.edu.ar', 'nellylalechuza', NOW( ), 1),
	
*/

INSERT INTO
	articulos (TITULO, AUTOR, AÑO, DURACION, FECHA_ALTA, VIDEO, IMAGENES, IMG_DESTACADA, DESCRIPCION, A_ESTADO)
VALUES
	('Video1', 'Autor1', '1985', '00:02:55', NOW( ), 'nombrevideo', NULL, 'nombreimagen', 'Descripcion video 1: You cost three-hundred buck damage to my car, you son-of-a-bitch. And Im gonna take it out of your ass. Hold him. Let him go, Biff, youre drunk. Well looky what we have here. No no no, youre staying right here with me. Stop it.', '1'),
	('Video2', 'Autor2', '2005', '00:02:55', NOW( ), 'nombrevideo', NULL, 'nombreimagen', 'Descripcion video 2: You cost three-hundred buck damage to my car, you son-of-a-bitch. And Im gonna take it out of your ass. Hold him. Let him go, Biff, youre drunk. Well looky what we have here. No no no, youre staying right here with me. Stop it.', '1'),
	('Video3', 'Autor3', '2016', '00:02:55', NOW( ), 'nombrevideo', NULL, 'nombreimagen', 'Descripcion video 3: You cost three-hundred buck damage to my car, you son-of-a-bitch. And Im gonna take it out of your ass. Hold him. Let him go, Biff, youre drunk. Well looky what we have here. No no no, youre staying right here with me. Stop it.', '1'),
	('Video4', 'Autor4', '1990', '00:02:55', NOW( ), 'nombrevideo', NULL, 'nombreimagen', 'Descripcion video 4: You cost three-hundred buck damage to my car, you son-of-a-bitch. And Im gonna take it out of your ass. Hold him. Let him go, Biff, youre drunk. Well looky what we have here. No no no, youre staying right here with me. Stop it.', '1'),
	('Video5', 'Autor5', '2006', '00:02:55', NOW( ), 'nombrevideo', NULL, 'nombreimagen', 'Descripcion video 5: You cost three-hundred buck damage to my car, you son-of-a-bitch. And Im gonna take it out of your ass. Hold him. Let him go, Biff, youre drunk. Well looky what we have here. No no no, youre staying right here with me. Stop it.', '1'),
	
/*
INSERT INTO
	comentarios (COMENTARIO, FECHA_COMENTARIO, C_ESTADO)
VALUES
	('Este video está genial', NOW( ), '1'),
	('Quiero que vuelvan a subir más videos como este', NOW( ), '1'),
	('Me parece asombroso', NOW( ), '1'),
	('Es una porquería', NOW( ), '0'),
	('Que copado que está, voy a volver a verlo', NOW( ), '1'),
	('Se mandaron cualquiera', NOW( ), '0'),
	('Simplemente maravilloso', NOW( ), '1'),
	('Tiene una estetica asombrosa', NOW( ), '1');
	

*/