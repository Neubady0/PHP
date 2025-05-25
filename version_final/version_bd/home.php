<?php session_start(); if (isset($_SESSION['user_email'])) header('Location: dashboard.php'); ?>
<!doctype html>
<html lang="es"><head>
  <meta charset="utf-8"><title>Bienvenido</title>
</head><body>
  <h1>De visitante a entrenador</h1>
  <p>Explora el mundo Pokémon con tu propia cuenta.</p>
  <a href="login.php">Iniciar sesión</a> |
  <a href="register.php">Registrarse</a>
</body></html>
