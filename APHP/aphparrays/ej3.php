<?php
// Leer 15 números por teclado y almacenarlos en un array
$numeros = array();
for ($i = 0; $i < 15; $i++) {
    $numeros[$i]=[$i];
}

var_dump($numeros);
// Realizar la rotación de todos los elementos del array
$cantidadNumeros = count($numeros);
for ($i = 0; $i < $cantidadNumeros - 1; $i++) {
    $temp = $numeros[$i];
    $numeros[$i] = $numeros[$i + 1];
    $numeros[$i + 1] = $temp;
}

// Mostrar el contenido del array después de la rotación
echo "Contenido del array después de la rotación:\n";
var_dump($numeros);
?>
