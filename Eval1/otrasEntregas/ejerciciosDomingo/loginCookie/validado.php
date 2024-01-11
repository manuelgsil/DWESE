<?php
// Verifica si la cookie está establecida y el usuario está autenticado
if (isset($_COOKIE['cookieUsuario'])) {
    $nombreUsuario = $_COOKIE['cookieUsuario'];

    // Proceso para cerrar sesión
    if (isset($_POST['cerrar_sesion'])) {
        setcookie('cookieUsuario', '', time() - 3600); // Elimina la cookie
    }
} else {
    // Si no hay cookie, redirige a la página de inicio de sesión
    header("Location: loginCookie.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página validada</title>
</head>

<body>
    <header>
            <p>Bienvenido, <?php echo $nombreUsuario; ?></p>
            <form action="" method="POST">
                <button type="submit" name="cerrar_sesion">Cerrar Sesión</button>
            </form>
        </div>
    </header>

    <h1>Contenido de la página validada</h1>
</body>

</html>
