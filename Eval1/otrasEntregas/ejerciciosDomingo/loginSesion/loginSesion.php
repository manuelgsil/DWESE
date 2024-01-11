<!-- Partiendo de la página principal:
- realizar el código para el proceso 
de log-in, si se puede validar el usuario correctamente, se acceder´ a otra página: validado.php,
 la cual mostrará en la parte superior el nombre de usuario, así como la  opción de cerrar sesión. -->

<?php
session_start();

$usuarioLogin = "maggot";
$passwordUsuario = "funkadelic";
$mensajeError;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["nombre"]) && $_POST["password"]) {
        $loginCorrecto = $_POST["nombre"] == $usuarioLogin && $_POST["password"] == $passwordUsuario;
        if ($loginCorrecto) {
            $_SESSION["usuario"] = $_POST["nombre"]; // Establece la variable de sesión
            header("Location: validado.php");
        } else {
            $mensajeError = "Usuario o contraseña incorrectos";
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: lightsalmon;
    }

    fieldset {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 5px;
    }

    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 300px;
    }

    input,
    button {
        display: block;
        width: calc(100% - 12px);
        margin-bottom: 15px;
        padding: 8px;
        font-size: 16px;
        border-radius: 4px;
        border: 1px solid #ccc;
    }

    button {
        background-color: #007bff;
        color: #fff;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }

    div {
        display: table;
        position: absolute;
        top: 0;
        border: 1px black solid;
        left: 5px;
        padding: 10px;
        background-color: lightblue;
    }

    div {
        display: table;
        position: absolute;
        top: 0;
        border: 1px black solid;
        left: 5px;
        padding: 10px;
        background-color: lightblue;
    }

    div>p {
        display: block;
        padding: 5px 0;
        /* Ajustar el espaciado interno */
        margin: 0;

        /* Eliminar los márgenes predeterminados */
        & span {
            color: red;
            font-weight: bold;
        }
    }
</style>

<body>
    <div>
        <p>El usuario es: <span> maggot</span></p>
        <p>la contraseña:<span> funkadelic</span></p>
    </div>
    <form action="#" method="POST">
        <fieldset>
            <legend>Iniciar Sesión (Variables de sesion)</legend>
            <?php if (!empty($mensajeError)) { ?>
                <p style="color: red;"><?php echo $mensajeError; ?></p>
            <?php } ?>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre de usuario">
            <input type="password" name="password" id="password" placeholder="Contraseña">
            <button type="submit">Iniciar Sesión</button>
        </fieldset>
    </form>
</body>

</html>