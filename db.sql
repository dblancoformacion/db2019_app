DROP TABLE usuarios;
CREATE TABLE usuarios(
  id_usuario int AUTO_INCREMENT PRIMARY KEY,
  usuario varchar(31),
  passwd varchar(32),
  UNIQUE(usuario)
);

INSERT INTO usuarios (usuario, passwd)
  VALUES ('david', MD5('hola1'));

SELECT * FROM usuarios;

SELECT * FROM usuarios WHERE usuario='david' AND passwd=MD5('hola1');