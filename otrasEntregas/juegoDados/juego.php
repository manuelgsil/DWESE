<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Vamos a comprobar quien gana de los dos jugadores</h1>
</body>

</html>

<?php

$dadosJugador1 = array();
$dadosJugador2 = array();
/* CARGAMOS LOS ARRAYS CON LAS TIRADAS */
for ($i = 0; $i < 6; $i++) {
    $jugador1 = rand(1, 6);
    $dadosJugador1[] = $jugador1;
    $jugador2 = rand(1, 6);
    $dadosJugador2[] = $jugador2;
}
/* Hay unas cuantas funciones ya que si no, la complejidad ciclomatica de reducir el pograma 1 u 2 funciones sería elevada */

/*  CREAMOS UNA FUNCION QUE CUENTE LAS VICTORIAS DE CADA JUGADOR */

function compararDados($jugador1, $jugador2)
{
    $rondasGanadas = contarRondasGanadas($jugador1, $jugador2);
    $ganaJugador1 = $rondasGanadas[0];/* Almacenamos cada valor del indice en una variable */
    $ganaJugador2 = $rondasGanadas[1];

    $empate = $ganaJugador1 === $ganaJugador2; /* Si el numero de rondas ganadas de cada uno es igual, tendremos empate */

    /* Si es empate se llama a la funcion correspondiente, si no, al ganador */
    if ($empate) {
        mostrarEmpate($jugador1, $jugador2);
    } else {
        mostrarGanador($ganaJugador1, $ganaJugador2);
    }
}


function contarRondasGanadas($jugador1, $jugador2)
{
    $ganaJugador1 = 0;
    $ganaJugador2 = 0;
    /* En este bucle comprobamos quien va ganando cada ronda. Necesitamos un elseIF ya que si le pusieramos
else, en caso de ronda empatada tambien sumaria a un jugador por defecto, haciendo el programa inservible */
    for ($i = 0; $i < 6; $i++) {
        if ($jugador1[$i] > $jugador2[$i]) {
            $ganaJugador1++;
        } else if (($jugador1[$i] < $jugador2[$i])) {
            $ganaJugador2++;
        }
    }

    mostrarRondas($jugador1, $jugador2); /* Llamamos a la funcion que muestra el resultado de las rondas por pantalla */

    return [$ganaJugador1, $ganaJugador2]; /* Devolvemos un array con los dos valores */
}

function mostrarEmpate($jugador1, $jugador2)
{
    echo "Habeis empatado.<br>";

    $puntuacion1 = array_sum($jugador1);
    $puntuacion2 = array_sum($jugador2);

    echo "La puntuacion de cada jugador es la siguiente:<br>";

    echo "Jugador 1: $puntuacion1<br>";
    echo "Jugador 2: $puntuacion2<br>";

    if ($puntuacion1 === $puntuacion2) {
        echo "¡Es un empate en puntos también!";
    } else {
        $ganador = $puntuacion1 > $puntuacion2 ? "Jugador 1" : "Jugador 2";
        echo "El ganador por puntos es: $ganador";
    }
}

function mostrarGanador($ganaJugador1, $ganaJugador2)
{
    $ganador = "";
    if ($ganaJugador1 > $ganaJugador2) {
        $ganador = "Jugador 1: numero de rondas ganadas. $ganaJugador1";
    } else {
        $ganador = "Jugador 2: numero de rondas ganadas. $ganaJugador2";
    }
    echo $ganador;
}

function mostrarRondas($jugador1, $jugador2)
{
    echo "<h2>Rondas y resultados:</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Ronda</th><th>Jugador 1</th><th>Jugador 2</th></tr>";

    for ($i = 0; $i < 6; $i++) {
        /* Usamos una estructura ternaria para establecer el color del ganador de cada ronda en su celda */
        $colorFondoJugador1 = $jugador1[$i] > $jugador2[$i] ? 'lightblue' : 'white';
        $colorFondoJugador2 = $jugador2[$i] > $jugador1[$i] ? 'lightblue' : 'white';
        if ($jugador1[$i] === $jugador2[$i]) { /* Y si es un empate en la misma ronda, le ponemos a los dos el mismo */
            $colorFondoJugador2 =  'lightgreen';
            $colorFondoJugador1 =  'lightgreen';
        }
        echo "<tr><td>Ronda " . ($i + 1) . "</td>";
        echo "<td style='background-color: $colorFondoJugador1'>$jugador1[$i]</td>";
        echo "<td style='background-color: $colorFondoJugador2'>$jugador2[$i]</td>";
        echo "</tr>";
    }

    echo "</table>";
}


compararDados($dadosJugador1, $dadosJugador2);

?>