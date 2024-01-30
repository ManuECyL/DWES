-- Crear base de datos --
    CREATE DATABASE if NOT EXISTS api;

-- Uso de la base de datos. --
    USE api;

    CREATE TABLE IF NOT EXISTS institutos(
        id INT PRIMARY KEY AUTO_INCREMENT,
        nombre varchar(75) NOT NULL,
        localidad varchar(64) NOT NULL,
        telefono VARCHAR(9) NOT NULL
    ) engine=innodb;

    INSERT INTO institutos VALUES (null, 'IES Claudio Moyano', 'Zamora', '980520400');
    INSERT INTO institutos VALUES (null, 'IES La Vaguada', 'Zamora', '980529625');
    INSERT INTO institutos VALUES (null, 'IES Maria de Molina', 'Zamora', '980529425');
    INSERT INTO institutos VALUES (null, 'IES Los Sauces', 'Benavente', '98052996');
