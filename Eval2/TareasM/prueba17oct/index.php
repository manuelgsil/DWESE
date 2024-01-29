<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/* 
ini_set('display_errors', 1);: 
Esta función de PHP se utiliza para cambiar el valor de la configuración display_errors en tiempo de ejecución.
Cuando se establece en 1, indica que los errores deben mostrarse en pantalla. 
Si se establece en 0, los errores no se mostrarán.

ini_set('display_startup_errors', 1);: 
Similar a la línea anterior, esta función se utiliza para configurar el valor de display_startup_errors, 
que determina si los errores que ocurren durante el inicio del script (en el inicio del proceso de PHP) deben mostrarse. 
Al establecerlo en 1, se permitirá la visualización de errores de inicio.

error_reporting(E_ALL);: 
Esta función establece el nivel de informes de error que se deben mostrar.
 E_ALL es una constante que representa todos los tipos de errores. Indica que se deben mostrar todos los errores,
  desde los más graves hasta los más leves. */
  
require_once('vars.php');
require_once('functions.php');

$videoJuegosSinfiltrar = $videojuegos;


//$videojuegosFiltrados=filtrarVideojuegos($videojuegosSinfiltrar);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Video juegos a filtrar</h1><br>
        <form action="procesar.php" method="POST" enctype="multipart/form-data">
            <<!-- ?php $abecedarioCheck = generar_abecedario_con_check();  ? -->>

            <input type="submit" value="Filtrar" name="filtrar">
        </form>

    </header>

    <table>
        <tr>
            <th>Nombre</th>
            <th>creador</th>
            <th>fecha</th>
        </tr>
        <<!-- ?php $mostrarVideoJuegos = mostrarJuegos($videoJuegosSinfiltrar); ? -->>
    </table>

</body>

</html>