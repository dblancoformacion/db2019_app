CREATE TABLE estancias(
  id_estancia int AUTO_INCREMENT PRIMARY KEY,
  estancia varchar(63) NOT NULL UNIQUE
);
CREATE TABLE luminarias(
  id_luminaria int AUTO_INCREMENT PRIMARY KEY,
  luminaria varchar(63) NOT NULL UNIQUE,
  encendida bool,
  id_estancia int,
  FOREIGN KEY(id_estancia) REFERENCES estancias(id_estancia)
);
INSERT INTO estancias (estancia) VALUES
  ('Aula 0'),
  ('Aula 1'),
  ('Aula 2'),
  ('Aula 3'),
  ('Aula 4'),
  ('Aula 5'),
  ('Aula 6'),
  ('Aula 7'),
  ('Aula 8');
INSERT INTO luminarias (luminaria, encendida, id_estancia) VALUES
('A7L1', 0, 8),
('A7L2', 0, 8),
('A7L3', 0, 8),
('A7L4', 0, 8),
('A7L5', 0, 8),
('A7L6', 0, 8),
('A7L7', 0, 8),
('A7L8', 0, 8);
INSERT INTO luminarias (luminaria, encendida, id_estancia) VALUES
('A8L11', 0, 9),
('A8L12', 0, 9),
('A8L21', 0, 9),
('A8L22', 0, 9),
('A8L31', 0, 9),
('A8L32', 0, 9),
('A8L41', 0, 9),
('A8L42', 0, 9);
INSERT INTO luminarias (luminaria, encendida, id_estancia) VALUES
('A0L1', 0, 1),
('A0L2', 0, 1),
('A0L3', 0, 1),
('A0L4', 0, 1);
SELECT * FROM estancias;
SELECT * FROM luminarias;
SELECT * FROM luminarias JOIN estancias USING(id_estancia);