<?php
session_start();

if (!isset($_SESSION['usuario']) || !is_array($_SESSION['usuario'])) {
    $_SESSION['usuario'] = array();
} // Inicializar como un array si no lo es o no está definido


/* 

$arrayUsuarios = [];

if (!isset($_SESSION['usuarios']))
$_SESSION['usuarios'] = $arrayUsuarios;

Con esto te aseguras que se comporte como un array apuntando a la misma dirección de memoria.
No se si esto es recomendable o no. En nuestro caso hemos optado por añadirle una condicion
mas a la definicion de la varaible superglobal S_SESSION  

YA QUE HACER SOLO HACER ESTO ES INSUFICIENTE PARA QUE EL CODIGO FUNCIONE 
--->            if (!isset($_SESSION['usuario'])  
--->             $_SESSION['usuario'] = array();                                    
*/
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $guardar = isset($_POST['guardar']);
    $leer = isset($_POST['leer']);
    $nombre = isset($_POST['nombre']) && trim($_POST['nombre']) !== '' ? $_POST['nombre'] : false;
    if ($guardar && $nombre)
        $_SESSION['usuario'][] = $nombre;
    if ($leer) {
        // Mostrar los nombres guardados en la sesión
        foreach ($_SESSION['usuario'] as $usuario) {
            echo "<li>$usuario</li>";
        }
        echo "</ul>";
    }
    if (isset($_POST['limpiar'])) {
        $_SESSION['usuario'] = []; // Limpia la lista de nombres
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

<body>
    <form method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre">
        <button type="submit" name="guardar">Guardar</button>
        <button type="submit" name="leer">Leer</button>
        <button type="submit" name="limpiar">Limpiar Lista</button>
</body>

</html>