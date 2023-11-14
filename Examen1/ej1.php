<!-- Ejercicio 1 - Todos los dados (3 puntos)
En este ejercicio se tiene que escribir un programa que imite el funcionamiento básico de un solitario de dados. 
Las reglas del juego son las siguientes:
•l usuario tiene que ir tirando dados de forma aleatoria hasta que le salgan los seis valores del dado.
•Si consigue sacar todos lo dados en menos de 12 tiradas, el jugador gana y se muestra junto al número de tiradas el siguiente icono (&#128077;)
•
Si consigue sacar todos lo dados en 12 o más tiradas, el jugador pierde y se muestra junto al número de tiradas el siguiente icono (&#128078;)
El resultado que se tiene que mostrar por pantalla es:
•
El resultado de cada una de las tiradas del dado.
•
El número de tiradas que ha tardado en conseguir sacar todos los dados y el icono correspondiente en caso de haber ganado o perdido.
•
N.º veces que salió cada uno de los dados en orden de mayor ocurrencia a menor. -->

<?php

$limite = 12;
$haGanado = false;

for ($i = 0; $i < $limite && !$haGanado; $i++) {
    $tirada = rand(1, 6);
    $arrayTiradas[] = $tirada;
    $haGanado = count(array_unique($arrayTiradas)) == 6; // con esto controlamos que no haya mas tirada de las
}

echo "<pre>";
print_r($arrayTiradas);
echo "</pre>";

if ($haGanado) { // La existencia de 6 indices implica 6 valores únicos
    echo "&#128077; <br>";
} else {
    echo "&#128078; <br>";
}

$ocurrencias = array_count_values($arrayTiradas); // Con esta funcion obtenemos como indices los valores del array original
//y como valores la cantidad de veces que aparece el valor
arsort($ocurrencias);
foreach ($ocurrencias as $valor => $ocurrencia) {
    echo "<br> el Valor $valor ha aparecido $ocurrencia veces <br>";
}


?>