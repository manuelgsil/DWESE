<?php

$arrayAleatorio = array_fill(0, 6, null); // array fill se ejecuta primero
$arrayAleatorio1 = array_map("generarNumeroAleatorio", $arrayAleatorio);
$contarValores=array_count_values($arrayAleatorio1);
function generarNumeroAleatorio()
{
    return random_int(0, 6);
}
;


/* Mostrar cuántas veces aparece cada uno de los valores, del 1 al 6, en el array
generado.
● Obtener otro número al azar entre 1 y 6. Con ese número obtenido comprobar si se
encuentra en el array generado y en caso de que así sea mostrar todos los índices
donde aparezca ese número.
● Mostrar el array original ordenada de mayor a menor.
● Mostrar el array sin valores duplicados y sin huecos en los índices. */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3> EL ARRAY ALEATORIO :</h3>
    <?php foreach ($arrayAleatorio1 as $item) {
        echo "" . $item . "";
    }
    ; ?>
    <h3>Mostrar cuántas veces aparece cada uno de los valores, del 1 al 6, en el array
        generado</h3>
        <?php foreach ($contarValores  as $item) {
        echo "" . $item . "";
    }
    ; ?>
</body>

</html>