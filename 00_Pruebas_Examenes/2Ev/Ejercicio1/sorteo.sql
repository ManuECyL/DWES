-- Crear base de datos --
    CREATE DATABASE if NOT EXISTS sorteo;

-- Uso de la base de datos. --
    USE sorteo;

    CREATE TABLE IF NOT EXISTS Usuario(
        codUsuario varchar(15) PRIMARY KEY,
        descUsuario varchar(250) NOT null,
        password varchar(64) NOT null,
        perfil enum('admin', 'usuario') default 'usuario', -- Valor por defecto usuario
        fechaUltimaConexion timestamp
    );

    insert into Usuario(codUsuario, descUsuario, password, perfil, fechaUltimaConexion) values (1, 'admin', sha1('admin'), 'admin', now());
    insert into Usuario(codUsuario, descUsuario, password, fechaUltimaConexion) values (2, 'maria', sha1('maria'), now());

    CREATE TABLE Apuesta (
        id_Apuesta INT PRIMARY KEY AUTO_INCREMENT,
        id_Usuario INT NOT NULL,
        numero1 INT NOT NULL,
        numero2 INT NOT NULL,
        numero3 INT NOT NULL,
        numero4 INT NOT NULL,
        numero5 INT NOT NULL,
        fechaApuesta DATE NOT NULL
    ) engine =innodb;

ALTER TABLE Apuesta ADD CONSTRAINT id_Usuario_fk FOREIGN KEY (id_Usuario) REFERENCES Usuario (codUsuario);

    CREATE TABLE Sorteo (
        id_Sorteo INT PRIMARY KEY AUTO_INCREMENT,
        fechaSorteo DATE NOT NULL,
        numero1 INT NOT NULL,
        numero2 INT NOT NULL,
        numero3 INT NOT NULL,
        numero4 INT NOT NULL,
        numero5 INT NOT NULL
    ) engine =innodb;
