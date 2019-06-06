CREATE TABLE usuarios(
  id_usuario int AUTO_INCREMENT PRIMARY KEY,
  usuario varchar(31),
  passwd varchar(32)
);

INSERT INTO usuarios (usuario, passwd)
  VALUES ('david', MD5('hola'));

SELECT * FROM usuarios;