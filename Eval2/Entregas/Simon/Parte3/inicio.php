<?php session_start();
if (!isset($_SESSION["coloresAleatorios"]) || !isset($_SESSION["coloresJugador"]) || !isset($_SESSION["gana"]) || !isset($_SESSION["pierde"])) {
    $_SESSION["coloresAleatorios"] = coloresAleatorios(); /* Creamos la variable de sesion y llamamos al metodo que asigna un array random de colores */
    $_SESSION["coloresJugador"] = [];
    $_SESSION["gana"] = false;
    $_SESSION["pierde"] = false;
}

?>
<?php /* Funciones */
function coloresAleatorios()
{
    $numRandom = rand(2, 7);
    $coloresPosibles = ["green", "black", "red", "violet"];
    $secuencia = []; /*  Guardo la secuencia para compararlo posteriormente */

    for ($i = 0; $i < $numRandom; $i++) {
        shuffle($coloresPosibles);
        $secuencia[] = $coloresPosibles[0];
    }
    return $secuencia;
};

function imprimirSecuencia($secuenciaSesion)
{
    foreach ($secuenciaSesion as $i => $color) {
        echo '<div style="background-color: ' . $color . '; width: 100px; height: 100px;">' . ($i + 1) . '</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colores a reproducir</title>
</head>
<link rel="stylesheet" href="style.css">

<body>
    <div class="secuencia">
        <h1>Secuencia</h1>
        <?php imprimirSecuencia($_SESSION["coloresAleatorios"]) ?>
    </div>
    <form action="juego.php" method="POST">
        <button type="submit" name="jugar">Iniciar Juego</button>
    </form>

</body>

</html>