<?php
session_start();

// Verifica si la sesión no está establecida, redirige al inicio de sesión
if (!isset($_SESSION["usuario"])) {
    header('location: loginSesion.php');
    exit();
}

// Proceso para cerrar sesión
if (isset($_POST["cerrarSesion"])) {
    session_destroy(); // Cierra la sesión actual
    header('location: loginSesion.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Validada</title>
</head>

<body>
    <h1>Bienvenido <?php echo $_SESSION["usuario"]; ?></h1>

    <form action="" method="post">
        <button type="submit" name="cerrarSesion">Cerrar Sesión</button>
    </form>
</body>

</html>