CREATE DATABASE IF NOT EXISTS escuela
DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE escuela;


CREATE TABLE IF NOT EXISTS alumnos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(50) NOT NULL,
  correo VARCHAR(100),
  genero VARCHAR(20),
  fecha_nacimiento DATE,
  carrera VARCHAR(50),
  semestre INT,
  pasatiempos VARCHAR(200),
  comentarios TEXT,
  fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE IF NOT EXISTS usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario VARCHAR(50) NOT NULL UNIQUE,
  pass_hash VARCHAR(255) NOT NULL,
  rol VARCHAR(20) NOT NULL DEFAULT 'consulta'
);


INSERT INTO usuarios (usuario, pass_hash, rol)
VALUES (
  'admin',
  '$2y$10$ynDH0fA2bEHcVEGCXKSf8egiKwuYbsGmELPnlzpxHh063MGzX1S76',
  'admin'
);


INSERT INTO usuarios (usuario, pass_hash, rol)
VALUES (
  'consulta',
  '$2y$10$a4lZnC9WRT4sX0nCStyMKeuv6aJmkCE0SLNKxbIJ2DyBVlg5rz.ja',
  'consulta'
);