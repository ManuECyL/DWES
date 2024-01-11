-- Crear base de datos --
    CREATE DATABASE if NOT EXISTS mvc;

-- Uso de la base de datos. --
    USE mvc;

    CREATE TABLE IF NOT EXISTS Usuario(
        codUsuario varchar(15) PRIMARY KEY,
        descUsuario varchar(250) NOT null,
        password varchar(64) NOT null,
        perfil enum('administrador', 'usuario') default 'usuario', -- Valor por defecto usuario
        fechaUltimaConexion timestamp
    );

    insert into Usuario(codUsuario, descUsuario, password, fechaUltimaConexion) values (1, 'maria', sha1('maria'), now());
    insert into Usuario(codUsuario, descUsuario, password, fechaUltimaConexion) values (2, 'pepe', sha1('pepe'), now());