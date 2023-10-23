<!-- Ejercicio 1
Realizar un programa que obtenga los números impares entre 1 y 50. Una vez obtenido el resultado,  comprobar cuales son números primos.
La evaluación de los números impares y primos se hará con funciones. -->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>ej1</title>
</head>

<body>
    <?php

    function esPrimo($n)
    {
        $comprobador = true;
        if ($n <= 1) {
            $comprobador = false;
        }
        for ($i = 2; $i <= sqrt($n); $i += 2) {
            if ($n % $i == 0) {
                $comprobador = false;
            }
        }
        return $comprobador;
    }

    for ($i = 1; $i <= 50; $i++) {
        if ($i % 2 != 0 && esPrimo($i)) {
            echo " " . $i . " ";
        }
    }

    ?>
</body>

</html>