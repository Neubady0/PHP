<?php
$servidor = "localhost";    // O la IP del servidor
$basededatos = "dam";
$usuario = "root";          // Normalmente 'root' en local
$contrasena = "";           // Normalmente vacío en local (cambia según tu configuración)

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$basededatos;charset=utf8", $usuario, $contrasena);
    // Establecer el modo de error de PDO a excepción
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
    exit;
}
?>