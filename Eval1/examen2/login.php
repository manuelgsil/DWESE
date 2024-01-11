<?php session_start();
    /* Mensaje error */
    $advertenciaError = false;
    ?>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    /* Datos de acceso */
    $usuario = "usuario@gmail.com";
    $contraseña = 1234;
    /* declaramos los datos */
    $usuarioIntroducido = isset($_POST["email"]) ? $_POST["email"] : false;
    $contraseñaIntroducida =  isset($_POST["contraseña"]) ? $_POST["contraseña"] : false;
    /* Comprobamos que hayan llegado al servidor */
    $datosCargados = $usuarioIntroducido && $contraseñaIntroducida;
    /* Si estan cargados, comprobamos si coinciden con los datos oficiales */
    if ($datosCargados) {
        $coincidencia = $usuarioIntroducido == $usuario && $contraseñaIntroducida == $contraseña;
        if (!$coincidencia) {
            $advertenciaError = true;
            if (!isset($_COOKIE["email"])) {
                setcookie("email", $usuarioIntroducido, time() + 10);
            }
        } else {
            /* Logica de sesion */
            if (!isset($_SESSION["datos"]))
                $_SESSION["datos"] = array(  /* En el examen había declarado un array bidimensional... */
                    "nombre" => $usuarioIntroducido,
                    "password" => $contraseñaIntroducida
                );
            header("location: portal.php");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario login</title>
</head>
<style>
    form {
        width: fit-content;
    }

    input {
        display: table;
    }

    button {
        margin-top: 20px;
    }

    p {
        color: red;
        font-weight: bold;
    }
</style>

<body>
    <h1>Formulario de login</h1>
    <form method="POST">
        <?php if ($advertenciaError) { ?>
            <p>Los datos introducidos no son correctos</p>
        <?php } ?>
        <label for="email">E-mail</label>
        <input type="text" name="email" id="email">
        <label for="contraseña">Contraseña:</label>
        <input type="text" name="contraseña" id="contraseña">
        <button type="submit">Log in</button>
    </form>
</body>

</html>