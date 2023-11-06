<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table,
    tr,
    td,
    th {
        border: 1px black solid;
    }

    body {
        display: flex;
    }
</style>

<?php
// declaracion de arrays
$tabla1 = array(
    "Juan",
    21,
    "Maria",
    19,
    "Pedro",
    24,
    "Antonio",
    30,
    "Carmen",
    24,
    "Carlos",
    26,
    "Lucía",
    22
);

$tabla2 = array(
    "Jaime",
    27,
    "Luisa",
    21,
    "Aitor",
    33,
    "Macarena",
    22,
    "Maria",
    27,
    "Pedro",
    28,
    "Juan",
    24
);

function imprimirTabla($tabla)
{ {
        for ($i = 0; $i < count($tabla); $i++) {
            print "<tr>" .
                "<td>" . $tabla[$i] . "</td>" .
                "<td>" . $tabla[$i + 1] . "</td>" .
                "</tr>";
            $i++; // lo sumamos para que no se salga del rango
        }
    }
}

$unionTablas = array_merge($tabla1, $tabla2); // con esta funcion creamos la union de las dos tablas 

?>

<body>
    <table>
        <thead>
            <th colspan="2">Alumnos de la clase de primero</th>
            <tr>
                <th>Nombre</th>
                <th>edad</th>
            </tr>
        </thead>
        <?php echo imprimirTabla($tabla1); ?>
        </tbody>
    </table>

    <!--   <table>
        <thead>
            <th colspan="2">Alumnos de la clase de primero</th>
            <tr>
                <th>Nombre</th>
                <th>edad</th>
            </tr>
        </thead>
        <?php echo imprimirTabla($tabla2); ?>
        </tbody>
    </table> -->
    <!-- 
    <table>
        <thead>
            <th colspan="2">Alumnos ambas clases</th>
            <tr>
                <th>Nombre</th>
                <th>edad</th>
            </tr>
        </thead>
        <?php echo imprimirTabla($unionTablas); ?>
        </tbody>
    </table> -->

    </table>
</body>

</html>