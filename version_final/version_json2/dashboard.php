<?php require_once "control_acceso.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>…</head>
<body>
  <h2>Hola, <?= htmlspecialchars($_SESSION["usuario"]) ?> 🥳</h2>
  <form id="buscador">
      <input type="text" placeholder="Nombre del Pokémon" required />
      <button>Buscar</button>
  </form>
  <div id="resultado"></div>
  <script src="script.js"></script>
</body>
</html>