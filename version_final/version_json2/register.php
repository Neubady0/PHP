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
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="register-container">
        <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/25.png" alt="Pikachu" class="poke-img" />
        <h1>Registrarse</h1>
        <?php if (!empty($error)) { echo '<div class="error">'.$error.'</div>'; } ?>
        <form method="POST">
            <input type="email" name="email" placeholder="Correo electrónico" required />
            <input type="password" name="password" placeholder="Contraseña" required />
            <button type="submit" class="btn">Registrarse</button>
        </form>
        <a href="login.php" class="login-link">¿Ya tienes cuenta? Inicia sesión aquí</a>
    </div>
</body>
</html>
