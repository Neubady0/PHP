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
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <form method="POST">
        Usuario: <input type="text" name="username"><br><br>
        Contraseña: <input type="password" name="password"><br><br>
        <button type="submit">Entrar</button>
    </form>
    <p><?php echo $mensaje; ?></p>
</body>
</html>
