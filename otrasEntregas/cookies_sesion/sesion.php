<?php

session_start();

//IF $_SESSION['user'] no se ha configurado, lo configuro con un valor
if(!isset($_SESSION['usuario']))
{
    $_SESSION['usuario'] = array(
        "id" => 1,
        "username" => $_POST["nombre"]
    );
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Almacenamiento de datos con sesion</title>
</head>

<body>
    <form method="post">
        <label for="nombre">Nombre:</label>
        <input type="text"
               id="nombre"
               name="nombre">
        <button type="submit"
                name="guardar">Guardar</button>
        <button type="submit"
                name="leer">Leer</button>
    </form>
</body>

</html>