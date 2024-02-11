<?php
require_once("../utiles/database.php"); /* Indicar correctamente la ruta relativa */
require_once("../utiles/funciones.php");
$listaCampos = ["nombre", "presupuesto", "sede_id"];
// Incluye ficheros de variables y funciones

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de departamentos</title>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>

<body>
    <h1>Listado de departamentos usando fetch (PDO::FETCH_BOUND)</h1>

    <?php
    // Realiza la conexion a la base de datos a través de una función 
    $baseDatos = new Database();
    $dbh = $baseDatos->getDbh();

    // Realiza la consulta a ejecutar en la base de datos en una variable
    $query = $dbh->query("SELECT * FROM departamentos");

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
            <th>Departamento</th>
            <th>Presupuesto</th>
            <th>Sede</th>
        </thead>
        <tbody>

            <!-- Muestra los datos -->
            <?php echo presentarConsulta($resultados, $listaCampos) ?> <!-- Tambien funciona si le pongo directamente la query -->
        </tbody>
    </table>
    <div class="contenedor">
        <div class="enlaces">
            <a href="../index.html">Volver a página de listados</a>
        </div>
    </div>


    <?php

    // Libera el resultado y cierra la conexión

    ?>
</body>

</html>