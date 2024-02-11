<?php
require_once("../utiles/database.php");
require_once("../utiles/funciones.php");
$listaCampos = ["nombre", "apellidos", "email", "hijos", "salario", "nacionalidad", "departamento","sede_id"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de empleados</title>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">

</head>

<!--

En esta página PHP se muestran los
empleados de la empresa con sus datos: nombre, apellidos, correo electrónico,
salario, número de hijos, departamento al que pertenece y sede a la que pertenece..
Para mostrar los datos usaremos PDO::FETCH_OBJ de fetch. 

-->

<body>
    <h1>Listado de departamentos usando fetch (PDO::FETCH_ASSOC)</h1>
    <?php

    // Realiza la conexion a la base de datos a través de una función 
    $dataBase = new Database();
    $dbh = $dataBase->getDbh();

    // Realiza la consulta a ejecutar en la base de datos en una variable
    $query = 
    $dbh->query(
    "SELECT 
    empleados.nombre, apellidos, email,
    salario, hijos, departamentos.nombre departamento,
    paises.nacionalidad,sede_id 
    FROM empleados 
    INNER JOIN paises ON empleados.pais_id = paises.id 
    INNER JOIN departamentos ON empleados.departamento_id = departamentos.id ");

    if ($query instanceof PDOStatement) {
        $resultados = $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
    ?>

    <table border="1" cellpadding="10" style="margin-bottom: 10px;">
        <thead>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Correo electrónico</th>
            <th>Nº hijos</th>
            <th>Salario</th>
            <th>Nacionalidad</th>
            <th>Departamento</th>
            <th>Sede</th>
        </thead>
        <tbody>
            <?php echo presentarConsulta($resultados,$listaCampos)?>
            <!-- Mostrar todos los datos de los empleados -->

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