CREATE DATABASE IF NOT EXISTS registro_usuarios;
use registro_usuarios;
CREATE TABLE IF NOT EXISTS usuarios(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre varchar(64),
    correo varchar(64),
    contrasenha varchar(255)
);

INSERT into usuarios(
    nombre, correo, contrasenha
) values ("Tito", "titofuentes@correo.net", MD5("12345"));