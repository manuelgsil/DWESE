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


    function ordenacionIntercambio($array)
    {
        $tamanio = count($array);

        for ($i = 0; $i < $tamanio; $i++) {
            for ($j = 0; $j < $tamanio - $i - 1; $j++) { /*las iteraciones se calculan segun el tamaño y -1*/
                if ($array[$j] > $array[$j + 1]) { /* Va comparandose con la posicion posterior */
                    $variableAuxiliar = $array[$j]; /* Y volvemos a usar una variable auxiliar para para almacenar los datos que nos interesan */
                    $array[$j] = $array[$j + 1]; 
                    $array[$j + 1] = $variableAuxiliar;
                }
            }
        }
        return $array;
    }

    echo "Array original: ";
    foreach ($array as $elemento) {
        echo $elemento . "  ";
    }
    echo "<br>";

    echo "Array intercambio: ";
    $arrayOrdenado = ordenacionIntercambio($array);
    foreach ($arrayOrdenado as $elemento) {
        echo $elemento . " ";
    }
}
?>

</html>