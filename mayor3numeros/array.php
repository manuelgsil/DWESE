<?php
$inicio = microtime(true);

// con un array y la funcion Max

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["n1"];
    $num2 = $_POST["n2"];
    $num3 = $_POST["n3"];
    $flag = is_numeric($num1) && is_numeric($num2) && is_numeric($num3); // con esto controlamos los valores numericos por si se saltaran el HTML

    if ($flag) {
        $numeros = array($num1, $num2, $num3);
        $numeroMayor = max($numeros);
        $fin = microtime(true);
        // Calcula el tiempo transcurrido en milisegundos
        $tiempoTranscurrido = ($fin - $inicio) * 1000;

        // Imprime el tiempo de respuesta
        echo "El tiempo de respuesta es: " . $tiempoTranscurrido . " ms";
        echo "<br> El numero mayor es: " . $numeroMayor;
    }
    else{
        echo "No se han introducido valores numericos";
    }

}
?>