<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form method="post">
        <h1>Ordenacion directa de array</h1>
        <button type="submit">ORDENAR</button>
    </form>
</body>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $array = [50, 23, 18, 10, 27, 43, 5];


    function ordenacionDirecta($array)
    {
        $tamanio = count($array);

        for ($i = 0; $i < $tamanio; $i++) {
            $indice_minimo = $i;
            for ($j = $i + 1; $j < $tamanio; $j++) { /* Voy comprobando la posicion inmediatamente posterior hasta llegar la final */
                if ($array[$j] < $array[$indice_minimo]) {
                    $indice_minimo = $j;
                }
            }
            $variableAuxiliar = $array[$i];
            $array[$i] = $array[$indice_minimo];
            $array[$indice_minimo] = $variableAuxiliar;
        }
        return $array;
    }

    echo "Array original: ";
    foreach ($array as $elemento) {
        echo $elemento . "  ";
    }
    echo "<br>";

    echo "Array ordenado: ";
    $arrayOrdenado = ordenacionDirecta($array);
    foreach ($arrayOrdenado as $elemento) {
        echo $elemento . " ";
    }
}
?>

</html>