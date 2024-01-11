<?php

$arrayAleatorio = array_fill(0, 6, null); // array fill se ejecuta primero
$arrayAleatorio1 = array_map("generarNumeroAleatorio", $arrayAleatorio);
$contarValores = array_count_values($arrayAleatorio1);
$numeroAleatorio = generarNumeroAleatorio();
function generarNumeroAleatorio()
{
    return random_int(0, 6);
};


/* 
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3> EL ARRAY ALEATORIO :</h3>
    <?php foreach ($arrayAleatorio1 as $item) {
        echo "" . $item . "";
    };
    echo "<br>";
    var_dump($arrayAleatorio1);

    ?>
    <h3>Mostrar cuántas veces aparece cada uno de los valores, del 1 al 6, en el array
        generado</h3>
    <?php
    for ($i = 0; $i <= 6; $i++) {
        $apariciones = $contarValores[$i] ?? 0;
        echo "El valor $i aparece $apariciones veces en el array.<br>";
    }
    ?>

    <h3>Obtener otro número al azar entre 1 y 6. Con ese número obtenido comprobar si se
        encuentra en el array generado y en caso de que así sea mostrar todos los índices
        donde aparezca ese número. </h3>

    <?php

    $encontrarNumero = array_keys($arrayAleatorio1, $numeroAleatorio);
    /*  if (count($encontrarNumero) > 1) {
        echo "el $numeroAleatorio se encuentra en los indices";
        foreach ($encontrarNumero as $indice) {
            echo " [$indice] ";
        }
    } elseif (count($encontrarNumero) == 1) {
        foreach ($encontrarNumero as $indice) {
            echo "El $numeroAleatorio se encuentra en el indice [$indice]";
        };
    } else {
        echo "el numero generado ($numeroAleatorio) no se encuentra en el array ";
    } */

    switch (count($encontrarNumero)) {
        case 0:
            echo "El número generado ($numeroAleatorio) no se encuentra en el array.";
            break;
        case 1:
            foreach ($encontrarNumero as $indice) {
                echo "El $numeroAleatorio se encuentra en el índice [$indice]";
            }
            break;
        default:
            echo "El $numeroAleatorio se encuentra en los índices";
            foreach ($encontrarNumero as $indice) {
                echo " [$indice] ";
            }
            break;
    }
    ?>

    <h3>Mostrar el array original ordenada de mayor a menor.</h3>
    <?php
    rsort($arrayAleatorio1);
    var_dump($arrayAleatorio1);
    ?>
    <h3>Mostrar el array sin valores duplicados y sin huecos en los índices. */
    </h3>
    <?php
    $arraySinDuplicados = array_values(array_unique($arrayAleatorio1));
    var_dump($arraySinDuplicados);
    ?>
</body>

</html>