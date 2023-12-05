drop database if exists banco;
create database banco;
drop user if exists banco;
create user banco identified by 'bancoMalo';
use banco;
grant all on banco.* to banco;
--
CREATE TABLE clientes (
  nombre VARCHAR(75) NOT NULL,
  dni CHAR(9) primary key
) engine =innodb;
--
INSERT INTO clientes VALUES ('Antonio Carbonell Torres', '81878163A');
INSERT INTO clientes VALUES ('Jordi Guisado Trujillo', '91782240G');
INSERT INTO clientes VALUES ('Iñaki Morilla Gonzalez', '69728026F');
INSERT INTO clientes VALUES ('Francisco Uriarte Cuesta', '83149834G');
INSERT INTO clientes VALUES ('Santiago Calvo Frias', '95314450N');
INSERT INTO clientes VALUES ('Maria Vaquero Flores', '95905251N');
INSERT INTO clientes VALUES ('Jose Maria Rosa Pavon', '52468367P');
INSERT INTO clientes VALUES ('Jose Manuel Rodriguez Quintana', '39187671H');
INSERT INTO clientes VALUES ('Jose Luis Galvon Gavilon', '33659209C');
INSERT INTO clientes VALUES ('Jose Ignacio Perraga Rodriguez', '79178614X');
--
CREATE TABLE cuentas (
  ccc char(24) primary key,
  fechaalta DATE not null
) engine=innodb;
--
INSERT INTO cuentas VALUES ('ES8277942548405550426103','2012-05-25');
INSERT INTO cuentas VALUES ('ES4831041924350690391862','2014-01-03');
INSERT INTO cuentas VALUES ('ES3915812152844370860908','2013-10-30');
INSERT INTO cuentas VALUES ('ES2955994840966604029248','2015-04-21');
INSERT INTO cuentas VALUES ('ES9174836036280954832294','2011-10-29');
INSERT INTO cuentas VALUES ('ES5770454719206647558223','2012-08-31');
INSERT INTO cuentas VALUES ('ES4445994357313976245335','2011-06-08');
INSERT INTO cuentas VALUES ('ES1634690041530694891902','2011-07-05');
INSERT INTO cuentas VALUES ('ES3121012281050135856867','2014-07-27');
INSERT INTO cuentas VALUES ('ES9776809518331225380969','2010-03-12');
INSERT INTO cuentas VALUES ('ES3711443863710848437469','2014-12-17');
INSERT INTO cuentas VALUES ('ES7039983221229258632674','2011-03-01');
INSERT INTO cuentas VALUES ('ES5115053140341450411130','2010-01-18');
INSERT INTO cuentas VALUES ('ES5505175742989466827448','2011-09-13');
INSERT INTO cuentas VALUES ('ES3238379184080479289484','2010-08-23');
INSERT INTO cuentas VALUES ('ES6266706945971987927944','2012-05-15');
INSERT INTO cuentas VALUES ('ES2352416354784082178397','2014-07-27');
INSERT INTO cuentas VALUES ('ES2744448181366710411841','2014-09-24');
INSERT INTO cuentas VALUES ('ES4094646862886123985494','2012-12-03');
INSERT INTO cuentas VALUES ('ES4721964795115374860468','2013-03-20');
create table posee (
ccc char(24) not null,
foreign key (ccc) references cuentas (ccc),
index (ccc),
dni char(9) not null,
index (dni),
foreign key (dni) references clientes (dni),
primary key (ccc,dni)
)engine=innodb;
INSERT INTO posee VALUES ('ES8277942548405550426103','81878163A');
INSERT INTO posee VALUES ('ES4831041924350690391862','91782240G');
INSERT INTO posee VALUES ('ES3915812152844370860908','69728026F');
INSERT INTO posee VALUES ('ES2955994840966604029248','83149834G');
INSERT INTO posee VALUES ('ES9174836036280954832294','95314450N');
INSERT INTO posee VALUES ('ES5770454719206647558223','95905251N');
INSERT INTO posee VALUES ('ES4445994357313976245335','52468367P');
INSERT INTO posee VALUES ('ES1634690041530694891902','39187671H');
INSERT INTO posee VALUES ('ES3121012281050135856867','33659209C');
INSERT INTO posee VALUES ('ES9776809518331225380969','79178614X');
INSERT INTO posee VALUES ('ES3711443863710848437469','81878163A');
INSERT INTO posee VALUES ('ES7039983221229258632674','91782240G');
INSERT INTO posee VALUES ('ES5115053140341450411130','69728026F');
INSERT INTO posee VALUES ('ES5505175742989466827448','83149834G');
INSERT INTO posee VALUES ('ES3238379184080479289484','95314450N');
INSERT INTO posee VALUES ('ES6266706945971987927944','95905251N');
INSERT INTO posee VALUES ('ES2352416354784082178397','52468367P');
INSERT INTO posee VALUES ('ES2744448181366710411841','39187671H');
INSERT INTO posee VALUES ('ES4094646862886123985494','33659209C');
INSERT INTO posee VALUES ('ES4721964795115374860468','79178614X');

create table movimientos (
    numero int primary key auto_increment,
    cantidad numeric(7,2) not null,
    fecha date not null,
    ccc char(24) not null,
    index (ccc),
    foreign key (ccc) REFERENCES cuentas (ccc)
)engine=innodb;

INSERT INTO `movimientos` ( `cantidad`, `fecha`, `ccc`) VALUES
( '4507.35',  '2015-01-01', 'ES8277942548405550426103'),
( '6969.35',  '2011-01-28', 'ES4831041924350690391862'),
( '5544.10',  '2013-08-02', 'ES3915812152844370860908'),
( '-182.90',  '2010-11-22', 'ES2955994840966604029248'),
( '5190.75',  '2013-03-30', 'ES9174836036280954832294'),
( '5410.90',  '2014-04-29', 'ES5770454719206647558223'),
( '-5513.40',  '2014-09-06', 'ES4445994357313976245335'),
('8885.75',  '2012-07-01', 'ES1634690041530694891902'),
( '-3385.30',  '2011-12-21', 'ES3121012281050135856867'),
('-748.80',  '2014-10-21', 'ES9776809518331225380969'),
('7866.20',  '2012-05-28', 'ES3711443863710848437469'),
('315.00',  '2015-02-25', 'ES7039983221229258632674'),
( '8818.35',  '2010-07-15', 'ES5115053140341450411130'),
('343.60',  '2015-12-24', 'ES5505175742989466827448'),
('3060.90',  '2015-02-27', 'ES3238379184080479289484'),
('3063.95',  '2010-03-18', 'ES6266706945971987927944'),
('449.60',  '2015-05-21', 'ES2352416354784082178397'),
('955.00',  '2012-12-03', 'ES2744448181366710411841'),
('8593.20',  '2015-04-14', 'ES4094646862886123985494'),
('5418.90',  '2014-12-12', 'ES4721964795115374860468'),
('-217.30',  '2011-08-15', 'ES8277942548405550426103'),
('-966.75',  '2014-12-02', 'ES4831041924350690391862'),
('7477.45',  '2012-09-25', 'ES3915812152844370860908'),
('6818.45',  '2010-07-12', 'ES2955994840966604029248'),
('-16.13',  '2013-05-14', 'ES9174836036280954832294'),
('7835.35',  '2015-03-30', 'ES5770454719206647558223'),
('5567.50',  '2014-05-21', 'ES4445994357313976245335'),
('-2975.90',  '2015-11-05', 'ES1634690041530694891902'),
('9031.40',  '2011-02-26', 'ES3121012281050135856867'),
('9135.00',  '2015-07-05', 'ES9776809518331225380969');