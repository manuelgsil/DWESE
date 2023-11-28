<?php
// Verificar si se ha enviado el formulario
if (isset($_POST['guardar'])) {
    $nombre = $_POST['nombre'];

    // Verificar si la cookie 'usuarios' ya existe
    if (isset($_COOKIE['usuarios'])) {
        // Obtener los nombres de usuario existentes y agregar el nuevo nombre
        $nombresActuales = $_COOKIE['usuarios'];
        $nombresActuales .= ',' . $nombre;
        setcookie('usuarios', $nombresActuales, time() + 60);
    } else {
        // Si no existe la cookie 'usuarios', crearla con el nuevo nombre
        setcookie('usuarios', $nombre, time() + 60);
    }
    echo "Cookie(s) guardada(s) correctamente.";
}
/* 
En el protocolo HTTP, las cookies se transmiten como cadenas de texto,
 no como estructuras de datos complejas como arrays o objetos. 
 Por lo tanto, cuando se almacena un valor en una cookie, se guarda como una cadena de texto.

Aunque puedas almacenar datos separados por comas u otro delimitador en una cookie para simular una estructura similar a un array,
cuando se recupera ese valor, se recupera como una cadena y no como un array directamente.

Es por eso que se usa explode para convertir esa cadena de texto en un array y
implode para convertir un array en una cadena antes de establecer o después de leer la cookie. 
 Es una manera común de simular la funcionalidad de un array al trabajar con valores de cookies en PHP. */

 // Leer y mostrar todas las cookies
if (isset($_POST['leer'])) {

    if (isset($_COOKIE['usuarios'])) {

        $nombres = $_COOKIE['usuarios'];
        $nombresArray = explode(',', $nombres);
        echo "Usuarios almacenados:<br>";
        foreach ($nombresArray as $nombre) {
            echo $nombre . '<br>';
        }
    } else {
        echo "No hay usuarios almacenados.";
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Almacenamiento de datos con cookies</title>
</head>

<body>
    <form method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre">
        <button type="submit" name="guardar">Guardar</button>
        <button type="submit" name="leer">Leer</button>
    </form>
</body>

</html>