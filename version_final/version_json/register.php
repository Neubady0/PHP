<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"] ?? "";
    $pass = $_POST["password"] ?? "";

    $file = "users.json";
    $usuarios = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

    if (isset($usuarios[$email])) {
        $error = "Ese correo ya existe";
    } else {
        $usuarios[$email] = password_hash($pass, PASSWORD_DEFAULT);
        file_put_contents($file, json_encode($usuarios, JSON_PRETTY_PRINT));
        header("Location: login.php?ok");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
</head>
<body>
    <h1>Registrarse</h1>
    <form method="POST">
        Usuario: <input type="text" name="username"><br><br>
        Email: <input type="email" name="email"><br><br>
        Contraseña: <input type="password" name="password"><br><br>
        <button type="submit">Registrarse</button>
    </form>
    <p><?php echo $mensaje; ?></p>
</body>
</html>
