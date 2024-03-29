﻿DROP TABLE usuarios;
CREATE TABLE usuarios(
  id_usuario int AUTO_INCREMENT PRIMARY KEY,
  usuario varchar(31),
  passwd varchar(32),
  UNIQUE(usuario)
);

INSERT INTO usuarios (usuario, passwd)
  VALUES ('david', MD5('hola1')),('maria',MD5('adios'));

SELECT * FROM usuarios;

SELECT * FROM usuarios WHERE usuario='david' AND passwd=MD5('hola1');
SELECT * FROM usuarios WHERE usuario='maria' AND passwd=MD5('adios');

SELECT * FROM suscriptores;

DELETE FROM suscriptores WHERE id_suscriptor=3;

INSERT INTO suscriptores (nombre, email, f_ins)
  VALUES ('ROBERTO', 'roberto@gmail.com', NOW());
  
CREATE TABLE vehiculos(
  id_vehiculo int AUTO_INCREMENT PRIMARY KEY,
  n_ruedas int NOT NULL,
  velocidad int NOT NULL
);
INSERT INTO vehiculos (n_ruedas)
  VALUES (4),(4),(2),(2);
SELECT * FROM vehiculos;  