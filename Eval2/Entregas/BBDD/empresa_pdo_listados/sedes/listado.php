<?php
require_once("../utiles/database.php"); /* Indicar correctamente la ruta relativa */
require_once("../utiles/funciones.php");
$listaCampos = ["nombre", "direccion"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de sedes</title>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>

<body>
    <h1>Listado de sedes usando fetch (PDO::FETCH_ASSOC)</h1>

    <?php
    // Realiza la conexion a la base de datos a través de una función 
    $baseDatos = new Database(); /*  --> Aqui ya iniciamos el objeto DBH (dataBaseHandler) que nos permitirá conectar con la base de datos. 
                                    Por defecto, su constructor tiene los parámetros para conectar con nuestra base de datos    */
    $dbh = $baseDatos->getDbh(); // Aqui realizamos la conexión en sí.

    // Realiza la consulta a ejecutar en la base de datos en una variable
    $query = $dbh->query('SELECT * FROM sedes');

    // Obten el resultado de ejecutar la consulta para poder recorrerlo. El resultado es de tipo PDOStatement

    if ($query instanceof PDOStatement) {
        // Verificar si la consulta fue exitosa
        $resultados = $query->fetchAll(PDO::FETCH_ASSOC);
        // Mostrar los resultados
        //  var_dump($resultados); // manera rápida de comprobar si el array resultados del fetch tiene lo que queremos
    }


    ?>

    <table border="1" cellpadding="10">
        <thead>
            <th>Nombre</th>
            <th>Dirección</th>
        </thead>

        <tbody>
            <?php echo presentarConsulta($resultados, $listaCampos); ?>
            <!-- Muestra los datos -->
        </tbody>
    </table>
    <div class="contenedor">
        <div class="enlaces">
            <a href="../index.html">Volver a página de listados</a>
        </div>
    </div>

    <?php

    $baseDatos->__destruct();
    // Libera el resultado y cierra la conexión
    ?>
</body>

</html>