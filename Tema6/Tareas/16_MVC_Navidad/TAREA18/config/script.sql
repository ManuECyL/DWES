-- Crea la base de datos
drop database if exists JUEGOSDEMESA;
CREATE DATABASE IF NOT EXISTS JUEGOSDEMESA;
USE JUEGOSDEMESA;

-- Crea el usuario
drop user if exists juegos;
CREATE USER juegos IDENTIFIED BY 'juegos';
GRANT ALL PRIVILEGES ON JUEGOSDEMESA.* TO 'juegos'@'%' WITH GRANT OPTION;

-- Recarga los privilegios
FLUSH PRIVILEGES;


-- Crea la tabla PRODUCTO con la columna imagen_url y el campo de borrado lógico
CREATE TABLE IF NOT EXISTS PRODUCTO (
    codigo INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255),
    descripcion VARCHAR(600),
    precio DECIMAL(10,2),
    stock INT,
    imagen_url VARCHAR(255),
    activo BOOLEAN DEFAULT true
) ENGINE=INNODB;

-- Crea la tabla USUARIO con el campo de borrado lógico
CREATE TABLE IF NOT EXISTS USUARIO (
    user VARCHAR(15) PRIMARY KEY,
    pass VARCHAR(255),
    email VARCHAR(255),
    fecha_nac DATE,
    rol VARCHAR(50),
    activo BOOLEAN DEFAULT true
) ENGINE=INNODB;

-- Crea la tabla ALBARÁN con el campo de borrado lógico
CREATE TABLE IF NOT EXISTS ALBARAN (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    cod_producto INT,
    cantidad INT,
    fecha DATE,
    usuario VARCHAR(15),
    activo BOOLEAN DEFAULT true,
    FOREIGN KEY (cod_producto) REFERENCES PRODUCTO(codigo),
    FOREIGN KEY (usuario) REFERENCES USUARIO(user)
) ENGINE=INNODB;

-- Crea la tabla PEDIDO con el campo de borrado lógico
CREATE TABLE IF NOT EXISTS PEDIDO (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    cod_producto INT,
    cantidad INT,
    fecha DATE,
    usuario VARCHAR(15),
    total DECIMAL(10,2),
    activo BOOLEAN DEFAULT true,
    FOREIGN KEY (cod_producto) REFERENCES PRODUCTO(codigo),
    FOREIGN KEY (usuario) REFERENCES USUARIO(user)
) ENGINE=INNODB;


-- Inserta usuarios    PASS: admin Adminpass1, moderador Modpass1, cliente Contraseña1
INSERT INTO USUARIO (user, pass, email, fecha_nac, rol) VALUES
('cliente1', '$2y$10$JezXdOZVSafqnBfj12ZII.ST/DiF/UyBpUDrCaMfaDX9R66MqIBPm', 'cliente1@example.com', '1990-01-01', 'cliente'),  
('admin', '$2y$10$6.NSE2/lUkI5N3FWsl.0zea9/ee103MxgDvSooJiyzRfrY55l8yay', 'admin@example.com', '1980-02-14', 'admin'),
('moderador', '$2y$10$1BzZgGwGEE87xAZEN1q5NeY8mmfzC1NMSrwAIEXFVhDK3gBoGTQy6', 'moderador@example.com', '1982-07-30', 'moderador');

-- Inserta productos relacionados con juegos de mesa
INSERT INTO PRODUCTO (titulo, descripcion, precio, stock, imagen_url) VALUES
('Jenga', '¡El juego clásico que consiste en crear una pila de bloques y derrumbarla! ¿Cómo apilar contra la ley de la gravedad? Apilad los bloques de madera en una torre firme, después retirad los bloques uno a uno por turnos hasta que la pila se venga abajo. ¿Tienes buen pulso para retirar el último bloque antes de que la torre se derrumbe? Si es así, ¡ganarás al JENGA!', 16.69, 5, './webroot/img/productos/Jenga.jpg'),
('Monopoly', 'Es un básico para las noches familiares de juegos Los jugadores compran, venden, sueñan y preparan su camino hacia las riquezas con el juego Monopoly', 27.24, 10, './webroot/img/productos/Monopoly.jpg'),
('Sushi Go', '¿Te gusta el sushi? Sin duda es un elemento a tener en cuenta, pues si es así, disfrutarás de cada una de las opciones de este menú. Sushi Go! Es un divertido y rápido juego de cartas donde cada jugador trata de comerse el menú perfecto de su comida favorita. Para ello, han de combinar las cartas de la mejor forma posible. ¿El problema? Que las cartas circulan por la mesa a toda velocidad y en cada turno solo se puede jugar una carta.', 9.99, 25, './webroot/img/productos/SushiGo.jpg'),
('Tragabolas', '¿Qué hipopótamo será el más glotón en Tragabolas? Trata de moverte rápido cuando las bolas se suelten en el tablero de juego, ¡si tu hipopótamo es el que traga el mayor número de bolitas ganarás! Los hipopótamos están preparados para devorar bolitas, y cuando las sueltes en la base de juego, ¡intentarás tragárselas todas! Puedes ser Verduripótamo, Dulcepótamo, Glotopótamo o Tragapótamo. Elijas a quien elijas, tendrás que moverte rápido, ¡porque si tu hipopótamo traga el mayor número de bolitas, tú ganas!', 22.71, 3, './webroot/img/productos/Tragabolas.jpg'),
('Chuchelandia', 'Crea y saborea las golosinas más deliciosas. Ahora con más contenido y atractivas propuestas de juego. Incluye set de trabajo y todos los elementos necesarios para crear tus chuches preferidas', 34.99, 60, './webroot/img/productos/Chuchelandia.jpg'),
('Uno', 'Durante más de 50 años, UNO ha conectado a personas de todo el mundo a través de juegos icónicos que trascienden la edad, el género y el idioma. Es fácil de aprender, fácil de jugar y fácil de disfrutar. ¿Sabías que hay más que UNO?', 9.679, 15, './webroot/img/productos/Uno.jpg'),
('Catan', 'Sois los primeros colonos en llegar a la isla de Catan. Muy pronto empiezan a aparecer los primeros poblados y las primeras carreteras.Pero enseguida el espacio en la isla empieza a escasear y se desata una encarnizada disputa por las tierras, los recursos y el poder.', 42.70, 25, './webroot/img/productos/Catan.jpg'),
('Gestos', '¡Hacer payasadas nunca había sido tan divertido! Descubre Gestos, el divertido y rápido juego de mímica.Los jugadores de cada equipo tendrán que adivinar el máximo número de palabras cuando el reloj se ponga en marcha. Cada palabra acertada dará un punto al equipo. ¡El que más puntos tenga gana!', 20.99, 80, './webroot/img/productos/Gestos.jpg'),
('Cluedo', 'El solitario millonario Samuel Black ha sido asesinado en su mansión. Ahora, depende de ti resolver el caso. Haz preguntas sobre todo para aclarar el misterio y ser el ganador del CLUEDO. ¿Quién lo hizo? ¿Dónde? ¿Y con qué arma? Registra la mansión en busca de pistas, haz astutas preguntas de detective y no dejes ninguna duda sin resolver. Sé el primero en solucionar el misterio del CLUEDO para ganar.', 27.95, 35, './webroot/img/productos/Cluedo.jpg'),
('Trivial', 'Es el juego de preguntas familiar con 2.400 preguntas. Reúne a todos para compartir una brillante experiencia de juego. La edición familiar de Trivial Pursuit ofrece nuevas preguntas y un ritmo ágil, incluyendo el desafío Duelo donde 2 jugadores compiten por un triángulo al mismo tiempo.', 37.99, 20, './webroot/img/productos/Trivial.jpg'),
('Conecta 4', '¡Desafía a un amigo a divertiros dejando caer las fichas en este juego clásico de Conecta 4! Deja caer tus fichas rojas o amarillas en la parrilla y sé el primero en conseguir 4 fichas en línea para ganar. Si tu adversario está demasiado cerca de conseguir 4 en línea, ¡bloquéale con tus propias fichas! ¡El ganador puede deslizar la varilla de sujeción para soltar todas las fichas y comenzar la diversión de nuevo!', 10.99, 45, './webroot/img/productos/Conecta4.jpg');

-- Inserta pedidos
INSERT INTO PEDIDO (cod_producto, cantidad, fecha, usuario, total) VALUES
(1, 2, '2023-01-05', 'cliente1', 33.38),
(5, 1, '2023-02-10', 'cliente1', 34.99),
(7, 1, '2023-03-15', 'cliente1', 42.70),
(2, 2, '2023-04-20', 'cliente1', 54.48),
(5, 1, '2023-05-25', 'cliente1', 34.99);

-- Inserta albaranes
INSERT INTO ALBARAN (cod_producto, cantidad, fecha, usuario) VALUES
(3, 4, '2023-06-01', 'admin'),
(8, 2, '2023-06-05', 'moderador');


delete database JUEGOSDEMESA;
