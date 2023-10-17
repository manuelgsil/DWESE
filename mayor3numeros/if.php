<?php

// Inicio del temporizador
$inicio = microtime(true);

// CON IF


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fin = microtime(true);
    // Calcula el tiempo transcurrido en milisegundos
    $tiempoTranscurrido = ($fin - $inicio) * 1000;

    // Imprime el tiempo de respuesta
    echo "El tiempo de respuesta es: " . $tiempoTranscurrido . " ms";

    $num1 = $_POST["n1"];
    $num2 = $_POST["n2"];
    $num3 = $_POST["n3"];
    $numeroMayor = "";
    $flag = is_numeric($num1) && is_numeric($num2) && is_numeric($num3); // con esto controlamos los valores numericos por si se saltaran el HTML

    if ($flag) { 
        if ($num1 > $num2 && $num1 > $num3) {
            $numeroMayor = $num1;
        } elseif ($num2 > $num1 && $num2 > $num3) {
            $numeroMayor = $num2;
        } else {
            $numeroMayor = $num3;
        }
        echo "<br> El numero mayor es: " . $numeroMayor;
    }
} else {
    echo "No se han introducido valores numericos";

}
?>