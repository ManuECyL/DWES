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

CREATE TABLE Carrito (
    id_Usuario VARCHAR(20),
    cod_Prod VARCHAR(10),
    cantidad INT,
    FOREIGN KEY (id_Usuario) REFERENCES Usuarios(id_Usuario),
    FOREIGN KEY (cod_Prod) REFERENCES Productos(cod_Prod)
);



CREATE TABLE Compra (
    id_Compra INT PRIMARY KEY AUTO_INCREMENT,
    id_Usuario VARCHAR(20),
    fecha_Compra DATE,
    FOREIGN KEY (id_Usuario) REFERENCES Usuarios(id_Usuario)
);

CREATE TABLE Productos (
    cod_Prod VARCHAR(10) PRIMARY KEY,
    titulo VARCHAR(50) NOT NULL,
    compañia VARCHAR(50) NOT NULL,
    stock INT NOT NULL,
    precio FLOAT NOT NULL,
    ruta_Imagen VARCHAR(255)
);

CREATE TABLE Contiene (
    id_Compra INT,
    cod_Prod VARCHAR(10),
    cantidad INT,
    total FLOAT,
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

INSERT INTO Usuarios VALUES ('Admin1', 'Admin1', NULL, NULL, 'admin');
INSERT INTO Usuarios VALUES ('Moderador1', 'Moderador1', NULL, NULL, 'moderador');
INSERT INTO Usuarios VALUES ('Cliente1', 'Cliente1', 'cliente1@gmail.com', '1998-04-30', 'cliente');


INSERT INTO Productos VALUES ('RDR2', 'Red Dead Redemption 2', 'Rockstar Games', 20, 69.99, 'imagenes/productos/RDR2.jpg');
INSERT INTO Productos VALUES ('TW3WH', 'The Witcher 3: Wild Hunt', 'CD Projekt', 15, 39.99, 'imagenes/productos/TW3WH.jpg');
INSERT INTO Productos VALUES ('GTAV', 'Grand Theft Auto V', 'Rockstar Games', 25, 19.99, 'imagenes/productos/GTAV.jpg');
INSERT INTO Productos VALUES ('CODBO2', 'Call of Duty: Black Ops 2', 'Treyarch', 10, 19.99, 'imagenes/productos/CODBO2.jpg');
INSERT INTO Productos VALUES ('ACB', 'Assassin´s Creed Brotherhood', 'Ubisoft', 5, 14.99, 'imagenes/productos/ACB.jpg');
INSERT INTO Productos VALUES ('HL', 'Hogwarts Legacy', 'Avalanche', 15, 49.99, 'imagenes/productos/HL.jpg');

DROP USER IF EXISTS 'Admin1'@'%';
CREATE USER 'Admin1'@'%' IDENTIFIED BY 'Admin1';
GRANT ALL ON gameshop.* TO 'Admin1'@'%';

DROP USER IF EXISTS 'Moderador1'@'%';
CREATE USER 'Moderador1'@'%' IDENTIFIED BY 'Moderador1';
GRANT UPDATE (stock) ON gameshop.Productos TO 'Moderador1'@'%';
GRANT SELECT ON gameshop.Productos TO 'Moderador1'@'%';
GRANT SELECT ON gameshop.Compra TO 'Moderador1'@'%';
GRANT SELECT ON gameshop.Contiene TO 'Moderador1'@'%';
GRANT SELECT ON gameshop.Albaranes TO 'Moderador1'@'%';

DROP USER IF EXISTS 'Cliente1'@'%';
CREATE USER 'Cliente1'@'%' IDENTIFIED BY 'Cliente1';
GRANT SELECT ON gameshop.Productos TO 'Cliente1'@'%';