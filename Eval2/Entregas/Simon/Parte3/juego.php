<?php session_start();
if (!isset($_SESSION["coloresAleatorios"]) || !isset($_SESSION["coloresJugador"]) || !isset($_SESSION["gana"]) || !isset($_SESSION["pierde"])) {
    header("location:inicio.php"); /* Si no hay ninguna variable inicializada, que vayan a inicio, que es donde empieza el juego */
}
?>

<?php /* FUNCIONES */
function imprimirColoresJugador()
{
    $ha_perdido = $_SESSION["pierde"];
    $ha_ganado = $_SESSION["gana"];
    $NO_VACIO = count($_SESSION["coloresJugador"]);
    if ($NO_VACIO) {
        imprimirSecuencia($_SESSION["coloresJugador"]);
        if ($ha_perdido) {
            echo "cagaste";
            echo "<div class='resultado'>";
            imprimirSecuencia($_SESSION["coloresAleatorios"]);
            echo "</div>";
        } else if ($ha_ganado) {
            echo "ganaste";
            echo "<div class='resultado'>";
            imprimirSecuencia($_SESSION["coloresAleatorios"]);
            echo "</div>";
        }
        
    }
    
}
function imprimirSecuencia($secuencia)
{
    foreach ($secuencia as $i => $color) {
        echo '<div style="background-color: ' . $color . '; width: 100px; height: 100px;">' . ($i + 1) . '</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JUEGO</title>
    <link rel="stylesheet" href="style.css">
</head>


<body>
    <form action="resultado.php" method="POST">
        <fieldset>
            <legend>Simon</legend>
            <button type="submit" name="eleccion" value="red">
                <div style="background-color: red; width: 100px; height: 100px"></div>
            </button>
            <button type="submit" name="eleccion" value="green">
                <div style="background-color: green; width: 100px; height: 100px"></div>
            </button>
            <button type="submit" name="eleccion" value="black">
                <div style="background-color: black; width: 100px; height: 100px"></div>
            </button>
            <button type="submit" name="eleccion" value="violet">
                <div style="background-color: violet; width: 100px; height: 100px"></div>
            </button>
        </fieldset>
        <button type="submit" name="eleccion" value="reinicio">Reiniciar</button>
    </form>
    <div class="resultado">
        <h1>Colores escogidos:</h1>
        <?php
        imprimirColoresJugador();
        ?>
</body>

</html>

<?php


?>