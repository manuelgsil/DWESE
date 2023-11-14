<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Vamos a comprobar quien gana de los dos jugadores</h1>
</body>

</html>

<?php

$dadosJugador1 = array();
$dadosJugador2 = array();

for ($i = 0; $i < 6; $i++) {
    $jugador1 = rand(1, 6);
    $dadosJugador1[] = $jugador1;
    $jugador2 = rand(1, 6);
    $dadosJugador2[] = $jugador2;
}


function compararDados($jugador1, $jugador2)
{
    $ganaJugador1 = 0;
    $ganaJugador2 = 0;
    $empate = 0;
    for ($i = 0; $i < 6; $i++) {
        if ($jugador1[$i] > $jugador2[$i]) {
            $ganaJugador1++;
        } elseif ($jugador1[$i] < $jugador2[$i]) {
            $ganaJugador2++;
        } else {
            $empate++;
        }
    }

    if ($empate ==3 ) { // A esto hay que darle una vuelta
        var_dump($jugador1);
        var_dump($jugador2);
        echo "Habeis empatado en numero de rondas.";
        echo "La puntuacion de cada jugador es la siguiente: <br>";
        $puntuacion1 = array_sum($jugador1);
        $puntuacion2 = array_sum($jugador2);
        echo "Jugador 1: " . $puntuacion1 . "<br>";
        echo "Jugador 2: " . $puntuacion2 . "<br>";
        $ganador = $puntuacion1 > $puntuacion2 ? "Jugador 1: $puntuacion1" : "Jugador 2: $puntuacion2";
    } else {
        $ganador = $ganaJugador1 > $ganaJugador2 ? "Jugador 1: numero de rondas ganadas. $ganaJugador1": "Jugador 2: numero de rondas ganadas. $ganaJugador2";
        echo $ganador;
    }


}

compararDados($dadosJugador1,$dadosJugador2);

?>