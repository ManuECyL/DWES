DROP DATABASE IF EXISTS gameshop;
CREATE DATABASE gameshop;
USE gameshop;

CREATE TABLE Roles (
    rol VARCHAR(20) NOT NULL PRIMARY KEY
);

CREATE TABLE Usuarios (
    id_Usuario VARCHAR(20) PRIMARY KEY UNIQUE,
    contraseña VARCHAR(50),
    email VARCHAR(50),
    fecha_Nacimiento DATE,
    rol VARCHAR(20),
    FOREIGN KEY (rol) REFERENCES Roles(rol)
);

CREATE TABLE Compra (
    id_Compra INT PRIMARY KEY AUTO_INCREMENT,
    id_Usuario VARCHAR(20),
    fecha_Compra DATE,
    cod_Prod VARCHAR(10),
    cantidad INT,
    total FLOAT,
    FOREIGN KEY (id_Usuario) REFERENCES Usuarios(id_Usuario)
);

CREATE TABLE Productos (
    cod_Prod VARCHAR(10) PRIMARY KEY,
    titulo VARCHAR(50) NOT NULL,
    compañia VARCHAR(50) NOT NULL,
    stock INT NOT NULL,
    precio FLOAT NOT NULL
);

CREATE TABLE Contiene (
    id_Compra INT,
    cod_Prod VARCHAR(10),
    cantidad INT,
    FOREIGN KEY (id_Compra) REFERENCES Compra(id_Compra),
    FOREIGN KEY (cod_Prod) REFERENCES Productos(cod_Prod)
);

CREATE TABLE Albaranes (
    id_Albaran INT PRIMARY KEY AUTO_INCREMENT,
    fecha_Albaran DATE,
    cod_Prod VARCHAR(10),
    cantidad INT,
    id_Usuario VARCHAR(20),
    FOREIGN KEY (id_Usuario) REFERENCES Usuarios(id_Usuario)
);


INSERT INTO Roles VALUES ('admin');
INSERT INTO Roles VALUES ('moderador');
INSERT INTO Roles VALUES ('cliente');

INSERT INTO Usuarios VALUES ('admin1', '6c7ca345f63f835cb353ff15bd6c5e052ec08e7a', NULL, NULL, 'admin');
INSERT INTO Usuarios VALUES ('moderador1', 'e351eacb8dfc5e6f849d82aaa2507127e7cfa35d', NULL, NULL, 'moderador');
INSERT INTO Usuarios VALUES ('cliente1', '06b8abdc1bed263dcce2f8b6cde6c5189e61e582', 'cliente1@gmail.com', '1998-04-30', 'cliente');

GRANT ALL ON gameshop.* TO 'admin1'@'%';
GRANT UPDATE (stock) ON gameshop.Productos TO 'moderador1'@'%';
GRANT SELECT ON gameshop.Productos TO 'moderador1'@'%';
GRANT SELECT ON gameshop.Compra TO 'moderador1'@'%';
GRANT SELECT ON gameshop.Contiene TO 'moderador1'@'%';
GRANT SELECT ON gameshop.Albaranes TO 'moderador1'@'%';
GRANT SELECT ON gameshop.Productos TO 'cliente1'@'%';

INSERT INTO Productos VALUES ('RDR2', 'Red Dead Redemption 2', 'Rockstar Games', 20, 69.99);
INSERT INTO Productos VALUES ('TW3WH', 'The Witcher 3: Wild Hunt', 'CD Projekt', 15, 39.99);
INSERT INTO Productos VALUES ('GTAV', 'Grand Theft Auto V', 'Rockstar Games', 25, 19.99);
INSERT INTO Productos VALUES ('CODBO2', 'Call of Duty: Black Ops 2', 'Treyarch', 10, 19.99);
INSERT INTO Productos VALUES ('ACB', 'Assassin´s Creed Brotherhood', 'Ubisoft', 5, 14.99);
INSERT INTO Productos VALUES ('HL', 'Hogwarts Legacy', 'Avalanche', 15, 49.99);