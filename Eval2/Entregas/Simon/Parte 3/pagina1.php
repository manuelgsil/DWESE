<?php
session_start();
if (!isset($_SESSION["coloresElegidos"]) || !isset($_SESSION["secuencia"]) || !isset($_SESSION["fallo"]) || !isset($_SESSION["exito"])) {

    $_SESSION["coloresElegidos"] = [];
    $_SESSION["secuencia"] = generarDivsAleatorios();
    $_SESSION["fallo"] = false;
    $_SESSION["exito"] = false;
}

function generarDivsAleatorios()
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
<style>
    * {
        box-sizing: border-box;

    }

    .secuencia {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        width: 400px;
        gap: 5px;
        justify-items: center;

        & h1 {
            grid-column: 1 /span 3;
        }

        & div {
            width: 50px;
            border: 1px black solid;
            color: white;
            text-align: center;
            font-size: 33px;
            line-height: 5rem;
        }
    }

    form {
        margin: 50px;
    }
</style>

<body>
    <div class="secuencia">
        <h1>Secuencia</h1>
        <?php imprimirSecuencia($_SESSION["secuencia"]) ?>
    </div>
    <form action="simon3.php" method="POST">
        <button type="submit" name="jugar">Iniciar Juego</button>
    </form>

</body>

</html>