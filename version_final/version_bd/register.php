<?php
require 'conexion.php';
session_start();
$mensaje = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $pass  = $_POST['password'] ?? '';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mensaje = 'Email no válido';
    } elseif (strlen($pass) < 6) {
        $mensaje = 'La contraseña debe tener al menos 6 caracteres';
    } else {
        // ¿Existe?
        $stmt = $pdo->prepare('SELECT id FROM usuarios WHERE email = ?');
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            $mensaje = 'Ese email ya está registrado';
        } else {
            $hash = password_hash($pass, PASSWORD_BCRYPT);  // :contentReference[oaicite:0]{index=0}
            $pdo->prepare('INSERT INTO usuarios (email, password) VALUES (?,?)')
                ->execute([$email, $hash]);
            header('Location: login.php?registrado=1');
            exit;
        }
    }
}
?>
<!doctype html><html lang="es"><head><meta charset="utf-8"><title>Registro</title></head>
<body>
  <h2>Registrarse</h2>
  <?php if($mensaje) echo "<p style='color:red'>$mensaje</p>"; ?>
  <form method="post">
    <label>Email: <input name="email" type="email" required></label><br>
    <label>Contraseña: <input name="password" type="password" required></label><br>
    <button>Crear cuenta</button>
  </form>
  <a href="home.php">Volver</a>
</body></html>
