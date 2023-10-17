<?php
$inicio = microtime(true);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["n1"];
    $num2 = $_POST["n2"];
    $num3 = $_POST["n3"];
    $numeroMayor = 0;
    $flag = is_numeric($num1) && is_numeric($num2) && is_numeric($num3);// con esto controlamos los valores numericos por si se saltaran el HTML
    $fin = microtime(true);
    // Calcula el tiempo transcurrido en milisegundos
    $tiempoTranscurrido = ($fin - $inicio) * 1000;

    // Imprime el tiempo de respuesta
    echo "El tiempo de respuesta es: " . $tiempoTranscurrido . " ms";
    switch ($flag) {
        case ($num1 > $num2 && $num1 > $num3):
            $numeroMayor = $num1;
            break;
        case ($num2 > $num1 && $num2 > $num3):
            $numeroMayor = $num2;
            break;
        default:
            $numeroMayor = $num3;
            break;
    }
    echo "<br> El numero mayor es: " . $numeroMayor;

}


?>