<!-- En este ejercicio se tiene que crear un programa que muestre una partida de solitario "Cuenta cartas". Las reglas del juego son las siguientes:
•
Se muestran entre cinco y diez cartas de corazones no repetidas, con valores al azar entre 1 y 10.
•
Encima de las cartas se muestran los valores desde 1 hasta el número de cartas que haya, (entre 5 y 10).
•
Si coincide algún número con el número de la carta correspondiente inferior, el jugador pierde y se muestra el mensaje: "Lo siento has perdido".
•
Si todas las cartas tienen valores distintos del número correspondiente superior, el jugador gana y se muestra:"¡Enhorabuena has ganado!"

NOTA: Para imprimir la imagen de una carta se utiliza lo siguiente:

echo ‘<p><img src="nombrecarta.svg” width=50></p>’; -->

<?php
$arrayImagenesCartas = array(
    "c1.svg",
    "c2.svg",
    "c3.svg",
    "c4.svg",
    "c5.svg",
    "c6.svg",
    "c7.svg",
    "c8.svg",
    "c9.svg",
    "c10.svg",
);
$tiradaAleatoria = rand(5, 10);
/* $arrayImagenesCartasAleatorias=array_rand($arrayImagenesCartas,$tiradaAleatoria);  Este es el problema que tenia en el examen por el cual
    no salian las cartas. El array rand me trage CLAVES ALEATORIAS, no sus valores. */
$hasGanado = true;
$contador = 0;
$indicesPrevios = array();
while ($contador < $tiradaAleatoria && $hasGanado) {

    echo $tirada = rand(1, 10);
    do {
        $indiceAleatorio = rand(0, 9);
    } while (in_array($indiceAleatorio + 1, $indicesPrevios));

    $indicesPrevios[] = $indiceAleatorio + 1;

    echo "<p><img src=" . $arrayImagenesCartas[$indiceAleatorio] . " width=50></p>";

    if ($indiceAleatorio + 1 == $tirada) { // sumo uno al indice para que igualen respecto al array (empieza en 0) y la tirada aleatoria 
        $hasGanado = false;
        echo "Has perdido";
    }

    $contador++;
}
if ($hasGanado)
    echo "<h1>Has ganado</h1>";


?>