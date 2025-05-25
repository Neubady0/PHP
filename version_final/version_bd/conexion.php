<?php
$servidor    = "localhost";   // IP o hostname
$basededatos = "dam";         // Nombre de tu base de datos
$usuario     = "root";        // Usuario de MySQL
$contrasena  = "";            // Contraseña de MySQL

// Montamos el DSN usando esas variables
$dsn = "mysql:host=$servidor;dbname=$basededatos;charset=utf8mb4";

try {
    // Creamos la conexión PDO usando el DSN
    $pdo = new PDO($dsn, $usuario, $contrasena);
    // Forzamos que cualquier fallo lance una excepción
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Si falla la conexión, mostramos el error y detenemos el script
    exit("Error en la conexión: " . $e->getMessage());
}
?>
