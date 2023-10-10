<!-- 3.- Escribe un ejercicio de nombre en el que se definan 2 variables, $a y $b. A esas variables habrá que darle valores numéricos. 
A continuación, para cada operador +,-,*,/ deberá mostrarte unos mensajes del siguiente tipo:
Realizarlo con echo, print y printf

El resultado se sumar $a y $b es: xxx

El resultado se restar $a y $b es: xxx

El resultado se multiplicar $a y $b es: xxx

El resultado se dividir $a y $b es: xxx -->

<?php

$a = "10";
$b = "2";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operadores</title>
</head>

<body>
    <?php
    echo "El resultado de sumar $a y $b es: " . ($a + $b) . "<br>";
    print "El resultado de restar $a y $b es: " . ($a - $b) . "<br>";
    printf("El resultado de multiplicar %s y %s es: %s<br>", $a, $b, ($a * $b));
    echo "El resultado de dividir $a por $b es: " . ($a / $b) . "<br>";

    ?>

</body>

</html>