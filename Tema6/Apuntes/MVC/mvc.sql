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

    CREATE TABLE Cita (
        id INT PRIMARY KEY AUTO_INCREMENT,
        especialista VARCHAR(25) NOT NULL,
        motivo VARCHAR(200) NOT NULL,
        fecha DATE NOT NULL,
        activo BOOLEAN DEFAULT true,
        paciente VARCHAR(15)
    ) engine =innodb;

ALTER TABLE Cita ADD CONSTRAINT paciente_fk FOREIGN KEY (paciente) REFERENCES Usuario (codUsuario);

INSERT INTO Cita VALUES(1, 'traumatologo', 'Tengo la rodilla hinchada', '2024-01-16', true, '1');

INSERT INTO Usuario(codUsuario, descUsuario, password, fechaUltimaConexion) VALUES (6, 'admin', sha1('admin'), now());

UPDATE Usuario SET perfil = 'administrador' WHERE codUsuario = 6;