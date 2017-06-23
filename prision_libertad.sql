DROP DATABASE IF EXISTS prision_libertad;

CREATE DATABASE prision_libertad;

USE prision_libertad;

CREATE TABLE permisos(
	IDPERMISOS TINYINT(2) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	CREAR TINYINT(1) NOT NULL,
	EDITAR TINYINT(1) NOT NULL,
	BORRAR TINYINT(1) NOT NULL,
	MODERAR_COMENTARIOS TINYINT(1) NOT NULL,
	MODERAR_USUARIOS TINYINT(1) NOT NULL,
	MODERAR_VIDEOS TINYINT(1) NOT NULL
)ENGINE=InnoDB;

CREATE TABLE usuarios(
	IDUSUARIOS INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	NOMBRE_USUARIO VARCHAR(20) NOT NULL UNIQUE,
	NOMBRE_COMPLETO VARCHAR(50) NOT NULL,
	EMAIL VARCHAR(50) NOT NULL UNIQUE,
	CONTRASENIA VARCHAR(32) NOT NULL,
	FECHA_ALTA DATETIME,
	U_ESTADO BIT,
	FKPERMISOS TINYINT(2) UNSIGNED,

	FOREIGN KEY(FKPERMISOS) REFERENCES permisos(IDPERMISOS)
)ENGINE=InnoDB;

CREATE TABLE articulos(
	IDARTICULO INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	TITULO VARCHAR(50) NOT NULL,
	AUTOR VARCHAR(50) NOT NULL,
	AÑO YEAR,
	DURACION TIME,
	FECHA_ALTA DATETIME, 
	VIDEO VARCHAR(50) NOT NULL,
	IMAGENES TEXT(500),
	IMG_DESTACADA VARCHAR(50) NOT NULL,
	DESCRIPCION TEXT(500) NOT NULL,
	A_ESTADO BIT,
	FKUSUARIO INT UNSIGNED,

	FOREIGN KEY(FKUSUARIO) REFERENCES usuarios(IDUSUARIOS)
)ENGINE=InnoDB;

CREATE TABLE categorias(
	IDCATEGORIA TINYINT(2) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	CATEGORIA VARCHAR(30) UNIQUE
)ENGINE=InnoDB;

CREATE TABLE articulos_categorias(
	FKARTICULO INT UNSIGNED,
	FKCATEGORIA TINYINT(2) UNSIGNED,
	PRIMARY KEY(FKARTICULO, FKCATEGORIA),
	
	FOREIGN KEY (FKARTICULO) REFERENCES articulos(IDARTICULO),
	FOREIGN KEY (FKCATEGORIA) REFERENCES categorias(IDCATEGORIA)
	
)ENGINE=InnoDB;

CREATE TABLE articulos_es(
	IDARTICULO_ES INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	TITULO_ES VARCHAR(50) NOT NULL,
	DESCRIPCION_ES TEXT,
	VIDEO_ES VARCHAR(50),
	FKARTICULO INT UNSIGNED,
	
	FOREIGN KEY(FKARTICULO) REFERENCES articulos(IDARTICULO)
)ENGINE=InnoDB;

CREATE TABLE articulos_en(
	IDARTICULO_EN INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	TITULO_EN VARCHAR(50) NOT NULL,
	DESCRIPCION_EN TEXT,
	VIDEO_EN VARCHAR(50),
	FKARTICULO INT UNSIGNED,
	
	FOREIGN KEY(FKARTICULO) REFERENCES articulos(IDARTICULO)
)ENGINE=InnoDB;

CREATE TABLE comentarios(
	IDCOMENTARIO INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	COMENTARIO TEXT NOT NULL,
	FECHA_COMENTARIO DATETIME,
	C_ESTADO BIT,
	FKUSUARIO INT UNSIGNED,
	FKARTICULO INT UNSIGNED,
	
	FOREIGN KEY(FKUSUARIO) REFERENCES usuarios(IDUSUARIOS)
	ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY(FKARTICULO) REFERENCES articulos(IDARTICULO)	
)ENGINE=InnoDB;