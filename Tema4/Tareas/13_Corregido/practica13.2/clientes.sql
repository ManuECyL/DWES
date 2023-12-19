CREATE TABLE clientes (
    id serial PRIMARY KEY,
    nombre varchar(25),
    ciudad varchar(25),
    fecha_registro date,
    numero_compras int,
    dinero_gastado decimal(10, 2)
);

INSERT INTO
    clientes (nombre, ciudad, fecha_registro, numero_compras, dinero_gastado)
VALUES
    ('Pepe', 'Madrid', '2023-01-01', 5, 100.50),
    ('Laura', 'Barcelona', '2023-02-15', 8, 200.75),
    ('Paco', 'Valencia', '2023-03-10', 3, 50.00),
    ('Manolo', 'Sevilla', '2023-04-05', 12, 300.25),
    ('Lucia', 'Zaragoza', '2023-05-20', 6, 150.00),
    ('Ana', 'Bilbao', '2023-06-15', 10, 180.50),
    ('Juan', 'Madrid', '2023-07-10', 7, 120.75),
    ('Marta', 'Barcelona', '2023-08-25', 4, 90.00),
    ('Carlos', 'Valencia', '2023-09-10', 9, 250.25),
    ('Elena', 'Sevilla', '2023-10-05', 15, 400.00),
    ('José', 'Zaragoza', '2023-11-20', 2, 75.50),
    ('Sara', 'Bilbao', '2023-12-15', 18, 320.75),
    ('Luis', 'Madrid', '2024-01-01', 11, 280.00),
    ('Isabel', 'Barcelona', '2024-02-15', 14, 190.25),
    ('Javier', 'Valencia', '2024-03-10', 6, 110.00),
    ('Carmen', 'Sevilla', '2024-04-05', 9, 230.50),
    ('Raúl', 'Zaragoza', '2024-05-20', 13, 350.75),
    ('Lorena', 'Bilbao', '2024-06-15', 7, 170.00),
    ('Pedro', 'Madrid', '2024-07-10', 16, 420.25),
    ('Eva', 'Barcelona', '2024-08-25', 3, 80.50),
    ('Pepe', 'Valencia', '2024-09-10', 5, 120.25),
    ('Laura', 'Sevilla', '2024-10-05', 8, 300.00),
    ('Paco', 'Zaragoza', '2024-11-20', 3, 50.75),
    ('Manolo', 'Bilbao', '2024-12-15', 12, 220.50);
