drop database if exists tienda;
create database tienda;
drop user if exists manu;
create user manu identified by 'tiendaManu';
use tienda;
grant all on tienda.* to manu;


CREATE TABLE videojuegos (
    id CHAR(6) primary key,  
    nombre VARCHAR(50) NOT NULL,
    compañia VARCHAR(50) NOT NULL,
    stock INT NOT NULL,
    precio FLOAT NOT NULL, 
    fecha_Lanzamiento DATE PRIMARY KEY
) engine =innodb;


INSERT INTO videojuegos VALUES ('RDR2', 'Red Dead Redemption 2', 'Rockstar Games', 20, 69.99, '2018-10-26');
INSERT INTO videojuegos VALUES ('TW3WH', 'The Witcher 3: Wild Hunt', 'CD Projekt', 15, 39.99, '2015-05-18');
INSERT INTO videojuegos VALUES ('GTA5', 'Grand Theft Auto 5', 'Rockstar Games', 25, 19.99, '2013-09-17');
INSERT INTO videojuegos VALUES ('CODBO2', 'Call of Duty: Black Ops 2', 'Treyarch', 10, 19.99, '2012-11-12');
INSERT INTO videojuegos VALUES ('ACB', 'Assassin´s Creed Brotherhood', 'Ubisoft', 5, 14.99, '2010-11-16');

