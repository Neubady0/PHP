<?php
session_start();
if(!isset($_SESSION['user_email'])){
    header('Location: login.php');
    exit;
}
?>
<!doctype html>
<html lang="es"><head>
  <meta charset="utf-8">
  <title>Dashboard</title>
  <script defer src="script.js"></script>
  <style>img{max-width:150px}</style>
</head><body>
  <p>¡Hola, <?php echo htmlspecialchars($_SESSION['user_email']); ?>!</p>
  <form id="buscar">
    <input id="nombre" placeholder="Nombre del Pokémon">
    <button>Buscar</button>
  </form>
  <div id="resultado"></div>
  <a href="logout.php">Cerrar sesión</a>
</body></html>
