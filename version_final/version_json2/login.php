<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"] ?? "";
    $pass = $_POST["password"] ?? "";

    $usuarios = json_decode(file_get_contents("users.json"), true);
    if (isset($usuarios[$email]) && password_verify($pass, $usuarios[$email])) {
        $_SESSION["usuario"] = $email;
        header("Location: dashboard.php");
        exit();
    }
    $error = "Usuario o contraseña incorrectos";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
        <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/25.png" alt="Pikachu" class="poke-img" />
        <h1>Iniciar Sesión</h1>
        <?php if (!empty($error)) { echo '<div class="error">'.$error.'</div>'; } ?>
        <form method="POST">
            <input type="email" name="email" placeholder="Correo electrónico" required />
            <input type="password" name="password" placeholder="Contraseña" required />
            <button type="submit" class="btn">Entrar</button>
        </form>
        <a href="register.php" class="register-link">¿No tienes cuenta? Regístrate aquí</a>
    </div>
</body>
</html>
