DROP DATABASE IF EXISTS gameshop;
CREATE DATABASE gameshop;
USE gameshop;

DROP USER IF EXISTS admin1;
CREATE USER admin1 IDENTIFIED BY 'admin1';
GRANT ALL ON gameshop.* TO admin1;

DROP USER IF EXISTS moderador1;
CREATE USER moderador1 IDENTIFIED BY 'moderador1';
GRANT SELECT, INSERT ON gameshop.Productos TO moderador1;
GRANT SELECT ON gameshop.Compra, gameshop.Contiene, gameshop.Albaranes TO moderador1;

DROP USER IF EXISTS cliente1;
CREATE USER cliente1 IDENTIFIED BY 'cliente1';
GRANT SELECT ON gameshop.Productos TO cliente1;

CREATE TABLE Usuarios (
    id_Usuario VARCHAR(20) PRIMARY KEY,
    contraseña VARCHAR(25),
    email VARCHAR(50),
    fecha_Nacimiento DATE,
    tipo ENUM('admin', 'moderador', 'cliente')
);

CREATE TABLE Compra (
    id_Compra INT PRIMARY KEY AUTO_INCREMENT,
    id_Usuario VARCHAR(20),
    fecha_Compra DATE,
    cod_Prod CHAR(6),
    cantidad INT,
    total FLOAT,
    FOREIGN KEY (id_Usuario) REFERENCES Usuarios(id_Usuario)
);

CREATE TABLE Productos (
    cod_Prod CHAR(6) PRIMARY KEY,
    titulo VARCHAR(50) NOT NULL,
    compañia VARCHAR(50) NOT NULL,
    stock INT NOT NULL,
    precio FLOAT NOT NULL
);

CREATE TABLE Contiene (
    id_Compra INT,
    cod_Prod CHAR(6),
    cantidad INT,
    FOREIGN KEY (id_Compra) REFERENCES Compra(id_Compra),
    FOREIGN KEY (cod_Prod) REFERENCES Productos(cod_Prod)
);

CREATE TABLE Albaranes (
    id_Albaran INT PRIMARY KEY AUTO_INCREMENT,
    fecha_Albaran DATE,
    cod_Prod CHAR(6),
    cantidad INT,
    id_Usuario VARCHAR(20),
    FOREIGN KEY (id_Usuario) REFERENCES Usuarios(id_Usuario)
);

INSERT INTO Usuarios VALUES ('admin1', 'admin1', '', '', 'admin');
INSERT INTO Usuarios VALUES ('moderador1', 'moderador1', '', '', 'moderador');
INSERT INTO Usuarios VALUES ('cliente1', 'cliente1', 'cliente1@gmail.com', '1998-04-30', 'cliente');

INSERT INTO Productos VALUES ('RDR2', 'Red Dead Redemption 2', 'Rockstar Games', 20, 69.99);
INSERT INTO Productos VALUES ('TW3WH', 'The Witcher 3: Wild Hunt', 'CD Projekt', 15, 39.99);
INSERT INTO Productos VALUES ('GTAV', 'Grand Theft Auto V', 'Rockstar Games', 25, 19.99);
INSERT INTO Productos VALUES ('CODBO2', 'Call of Duty: Black Ops 2', 'Treyarch', 10, 19.99);
INSERT INTO Productos VALUES ('ACB', 'Assassin´s Creed Brotherhood', 'Ubisoft', 5, 14.99);
INSERT INTO Productos VALUES ('HL', 'Hogwarts Legacy', 'Avalanche', 15, 49.99);