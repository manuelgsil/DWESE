<?php
$CookieSensibilidad=["juan","herodes"];
setcookie("datosUsuario",serialize($CookieSensibilidad), 10000);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreUsuario = isset($_POST['usuario']) && trim($_POST['usuario'] !== '') ? $_POST['usuario'] : false;
    $password = isset($_POST['password']) ? $_POST['password'] : false;
    $validacion = isset($_POST['enviar']);
    $datosSesion = array();

    if ($validacion) {
        if (isset($S_COOKIE['datosUsuario'])) {
            $datosCookie = unserialize($_COOKIE['datosUsuario']);
            $datosSesion = [$nombreUsuario, $password];
            $flag = true;
            for ($i = 0; $i < count($datosCookie) && $flag; $i++) {
                $flag = $datosCookie[$i] == $datosSesion[$i];
            }
            if ($flag) {
                echo "todoCorrecto";
            } else {
                echo "lachupas";
            }

        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    form {
        border: 1px black solid;
        display: table;
        row-gap: 20px;
        width: 500px;
        margin: 0 auto;
        padding: 20px;
    }

    label,
    input {
        display: table-cell;
        vertical-align: center;

    }

    legend {
        text-align: center;
    }
</style>

<body>
    <form action="#"
          method="post">
        <fieldset>
            <legend>Inicio de sesion</legend>
            <label for="usuario">Usuario:</label>
            <input type="text"
                   name="usuario">
            <label for="contraseña">Contraseña:</label>
            <input type="password"
                   name="password">
            <input type="submit"
                   name="enviar">

        </fieldset>
    </form>
</body>

</html>