<!-- Ejercicio 2: Suma - multiplicación de números
Escriba un programa que cada vez que se ejecute muestre dos números entre 1 y 10 al azar, e indique:
● La suma de dichos números
● La multiplicación de dichos números. -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>ej2</title>
</head>

<?php
$n1 = rand(1, 10);
$n2 = rand(1, 10);

$suma = $n1 + $n2;
$multiplicacion = $n1 * $n2;

echo "Número 1: " . $n1 . "<br>";
echo "Número 2: " . $n2 . "<br>";
echo "Suma: " . $suma . "<br>";
echo "Multiplicación: " . $multiplicacion . "<br>";

?>

<body>


</body>

</html>