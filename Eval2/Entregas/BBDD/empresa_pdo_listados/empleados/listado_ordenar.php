<?php
require_once("../utiles/database.php");
require_once("../utiles/funciones.php");
// Incluye ficheros de variables y funciones
/*  */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de empleados</title>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
    <script type="text/javascript">
        function ordenarListado(campo, orden) {
            location.href = "listado_ordenar.php?orden=" + campo + "&sentido=" + orden;
        }
    </script>
</head>

<body>
    <h1>Listado de departamentos usando fetch (PDO::FETCH_OBJ)</h1>
    <?php
    // Campos que permiten ordenación
    $camposOrdenacion = ["nombre", "apellidos", "email", "hijos", "salario", "nacionalidad", "departamento", "sede"];

    // Obtener campo de la ordenación
    if (isset($_GET["orden"])) {
        $campoOrdenar = $_GET["orden"];
        if (!in_array($campoOrdenar, $camposOrdenacion)) {
            $campoOrdenar = $camposOrdenacion[0];
        }
    } else {
        $campoOrdenar = $camposOrdenacion[0];
    }

    // Obtener sentido de la ordenación
    $sentidosOrdenacion = ["ASC", "DESC"];
    if (isset($_GET["sentido"])) {
        $sentidoOrdenar = $_GET["sentido"];
        if (!in_array($sentidoOrdenar, $sentidosOrdenacion)) {
            $sentidoOrdenar = $sentidosOrdenacion[0];
        }
    } else {
        $sentidoOrdenar = $sentidosOrdenacion[0];
    }

    // Realiza la conexion a la base de datos a través de una función 
    $dataBase = new Database();
    $dbh = $dataBase->getDbh();

    // Realiza la consulta a ejecutar en la base de datos en una variable utiliza las variables $campoOrdenar y $sentidoOrdenar

    $query =
        $dbh->query(
            "SELECT 
        empleados.nombre, apellidos, email,
        salario, hijos, departamentos.nombre departamento,
        paises.nacionalidad,sede_id sede 
        FROM empleados 
        INNER JOIN paises ON empleados.pais_id = paises.id 
        INNER JOIN departamentos ON empleados.departamento_id = departamentos.id 
         ORDER BY $campoOrdenar $sentidoOrdenar"
        );

    if ($query instanceof PDOStatement) {
        $resultados = $query->fetchAll(PDO::FETCH_ASSOC);
    }
    // Obten el resultado de ejecutar la consulta para poder recorrerlo. El resultado es de tipo PDOStatement


    ?>

    <table border="1" cellpadding="10">
        <thead>
            <th>Nombre <a href="javascript: void(0);" onclick="ordenarListado('nombre', 'ASC')">&#8593</a> <a href="javascript: void(0);" onclick="ordenarListado('nombre', 'DESC')">&#8595</a></th>
            <th>Apellidos <a href="javascript: void(0);" onclick="ordenarListado('apellidos', 'ASC')">&#8593</a> <a href="javascript: void(0);" onclick="ordenarListado('apellidos', 'DESC')">&#8595</a></th>
            <th>Correo electrónico <a href="javascript: void(0);" onclick="ordenarListado('email', 'ASC')">&#8593</a> <a href="javascript: void(0);" onclick="ordenarListado('email', 'DESC')">&#8595</a></th>
            <th>Nº hijos <a href="javascript: void(0);" onclick="ordenarListado('hijos', 'ASC')">&#8593</a> <a href="javascript: void(0);" onclick="ordenarListado('hijos', 'DESC')">&#8595</a></th>
            <th>Salario <a href="javascript: void(0);" onclick="ordenarListado('salario', 'ASC')">&#8593</a> <a href="javascript: void(0);" onclick="ordenarListado('salario', 'DESC')">&#8595</a></th>
            <th>Nacionalidad <a href="javascript: void(0);" onclick="ordenarListado('nacionalidad', 'ASC')">&#8593</a> <a href="javascript: void(0);" onclick="ordenarListado('nacionalidad', 'DESC')">&#8595</a></th>
            <th>Departamento <a href="javascript: void(0);" onclick="ordenarListado('departamento', 'ASC')">&#8593</a> <a href="javascript: void(0);" onclick="ordenarListado('departamento', 'DESC')">&#8595</a></th>
            <th>Sede <a href="javascript: void(0);" onclick="ordenarListado('sede', 'ASC')">&#8593</a> <a href="javascript: void(0);" onclick="ordenarListado('sede', 'DESC')">&#8595</a></th>
        </thead>
        <tbody>
            <?php echo presentarConsulta($resultados, $camposOrdenacion) ?>

            <!-- Muestra los datos -->

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