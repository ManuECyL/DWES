CREATE DATABASE IF NOT EXISTS pr13;
USE pr13;

CREATE USER IF NOT EXISTS gestor IDENTIFIED BY 'gestor';
GRANT ALL PRIVILEGES ON pr13.* TO gestor;

USE pr13;

CREATE TABLE IF NOT EXISTS clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(25),
    fecha_registro DATE,
    dinero_gastado DECIMAL(10, 2)
);

INSERT INTO clientes (nombre, fecha_registro, dinero_gastado) VALUES
    ('Pepe', '2023-01-01', 100.50),
    ('Laura', '2023-02-15', 200.75),
    ('Paco', '2023-03-10', 50.00),
    ('Manolo', '2023-04-05', 300.25),
    ('Lucia', '2023-05-20', 150.00);
