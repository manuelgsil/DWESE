<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
</style>

<body>
    <h1>Formulario registro</h1>
    <form method="POST">
        <label for="email">E-mail</label>
        <input type="text" name="email" id="email">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre">
        <label for="edad">Edad</label>
        <input type="text" name="edad" id="edad">
        <label for="contraseña">Contraseña:</label>
        <input type="text" name="contraseña" id="contraseña">
        <label for="confirmarContraseña">Confirmar contraseña:</label>
        <input type="text" id="confirmarContraseña" name="confirmarContraseña">
        <button type="submit">Sign in</button>
    </form>
</body>

</html>

<?php
function expresionesRegulares($opcion, $string)
{
    $patronEmail = "/.+@.+\.com$/";
    $patronNumero = "/[1][8|9]|[2-5][0-9]|[6][0-5]/"; /*  He tardao algo mas de lo que me gustaría con esto */
    $esValido = false;
    switch ($opcion) {
        case 1:
            $esValido = preg_match($patronEmail, $string);
            break;
        case 2:
            $esValido = preg_match($patronNumero, $string);
            break;
    }
    return $esValido;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST["email"]) ? $_POST["email"] : false;
    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : false;
    $edad = isset($_POST["edad"]) ? $_POST["edad"] : false;
    $contraseña = isset($_POST["contraseña"]) ? $_POST["contraseña"] : false;
    $datosCargados = $email && $nombre && $edad && $contraseña;
    $controladorExpresionesEmail = expresionesRegulares(1, $email);
    $controladorExpresionesEdad = expresionesRegulares(2, $edad);

    if ($datosCargados) {
        if (!$controladorExpresionesEmail) {
            echo "email inválido";
        } else if (!$controladorExpresionesEdad) {   /* Lo tenia planteado de tal manera que no iba bien el flujo, centrarme mas en declarar variables de control */
            echo "edad inválida";
        } else {
            $archivo = fopen("usuarios.txt", "a");
            fwrite($archivo, "$email,$nombre,$edad\n");
            fclose($archivo);
            echo "usuario registrado";
        }
    } else {
        echo "revise los datos introducidos";
    }
}

?>
