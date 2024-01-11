<?php
session_start();
if (!isset($_SESSION['numerosIntroducidos'])) {
    $_SESSION['numerosIntroducidos'] = [];
}

$numerosIntroducidos =  $_SESSION['numerosIntroducidos'];

$_SESSION['numerosIntroducidos'] = $numerosIntroducidos;
$n = isset($_POST['n']) ? $_POST['n'] : false;

if ($n > 0) {
    $numerosIntroducidos[] = $n;
    $_SESSION['numerosIntroducidos'] = $numerosIntroducidos; // Actualizar la sesión con los números introducidos
} else if ($n <= 0) {
    // Averiguar cantidad de números introducidos
    $cantidadNumeros = count($numerosIntroducidos);

    // Averiguar mayor número par
    $numerosPares = array_filter($numerosIntroducidos, function ($numero) {
        return $numero % 2 === 0;
    });
    $mayorNumeroPar = !empty($numerosPares) ? max($numerosPares) : "No hay ningún número par";

    // Averiguar media de los números impares
    $numerosImpares = array_filter($numerosIntroducidos, function ($numero) {
        return $numero % 2 !== 0;
    });
    $mediaImpares = !empty($numerosImpares) ? array_sum($numerosImpares) / count($numerosImpares) : "No se ha introducido ningún número impar";

    // Mostrar resultados
    echo "Cantidad de números introducidos: $cantidadNumeros<br>";
    echo "Mayor número par: $mayorNumeroPar<br>";
    echo "Media de números impares: $mediaImpares<br>";
    session_destroy();
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
    <form action="#" method="POST">
        <input type="number" name="n">
        <button type="submit">enviar</button>
    </form>
</body>

</html>