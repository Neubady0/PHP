-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS usuarios
CHARACTER SET utf8mb4
COLLATE utf8mb4_general_ci;

-- Seleccionar la base de datos
USE usuarios;

-- Crear la tabla de usuarios
CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(100) UNIQUE NOT NULL,
  pass VARCHAR(255) NOT NULL
);
