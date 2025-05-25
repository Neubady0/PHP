<?php
require 'conexion.php';
session_start();
$mensaje = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $pass  = $_POST['password'] ?? '';
    $stmt = $pdo->prepare('SELECT id,password FROM usuarios WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    if ($user && password_verify($pass, $user['password'])) {          // :contentReference[oaicite:1]{index=1}
        session_regenerate_id(true);
        $_SESSION['user_email'] = $email;
        header('Location: dashboard.php');
        exit;
    } else {
        $mensaje = 'Credenciales incorrectas';
    }
}
?>
<!doctype html><html lang="es"><head><meta charset="utf-8"><title>Login</title></head>
<body>
  <h2>Iniciar sesión</h2>
  <?php if($mensaje) echo "<p style='color:red'>$mensaje</p>"; ?>
  <form method="post">
    <label>Email: <input name="email" type="email" required></label><br>
    <label>Contraseña: <input name="password" type="password" required></label><br>
    <button>Entrar</button>
  </form>
  <a href="home.php">Volver</a>
</body></html>
