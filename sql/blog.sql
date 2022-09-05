CREATE DATABASE blog
    DEFAULT CHARACTER SET utf8;

USE blog;

CREATE TABLE usuarios (
    id int NOT NULL UNIQUE AUTO_INCREMENT,
    nombre varchar(25) NOT NULL UNIQUE,
    email varchar(255) NOT NULL UNIQUE,
    password varchar(255) NOT NULL,
    fecha_registro DATETIME NOT NULL,
    activo tinyint NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE entradas (
    id int NOT NULL UNIQUE AUTO_INCREMENT,
    autor_id int NOT NULL,
    url varchar(255) NOT NULL UNIQUE,
    titulo varchar (255) NOT NULL UNIQUE,
    texto TEXT CHARACTER SET utf8 NOT NULL,
    fecha DATETIME NOT NULL,
    activa tinyint NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(autor_id)
        REFERENCES usuarios(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
);

CREATE TABLE comentarios(
    id int NOT NULL UNIQUE AUTO_INCREMENT,
    autor_id int NOT NULL,
    entrada_id int NOT NULL,
    titulo varchar (255) NOT NULL,
    texto TEXT CHARACTER SET utf8 NOT NULL,
    fecha DATETIME NOT NULL,
    activo tinyint NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(autor_id)
        REFERENCES usuarios(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT,
    FOREIGN KEY(entrada_id)
        REFERENCES entradas(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
);
