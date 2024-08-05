create database paises;

create table usuario (
    usuario_id SERIAL,
    usuario_nombre VARCHAR (80),
    usuario_correo VARCHAR (30),
    usuario_telefono VARCHAR (10),
);