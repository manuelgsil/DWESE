<?php session_start();
comprobarVariablesSesion(); /* Si no hay ninguna variable inicializada, que vayan a inicio, que es donde empieza el juego */
?>

<?php /* FUNCIONES */
/**
 * Con este metodo comprobamos que las variables de sesion estén iniciadas.
 * Si no es asi vuelve a la pantalla de inicio.
 */
function comprobarVariablesSesion()
{
    if (
        !isset($_SESSION["coloresAleatorios"]) ||
        !isset($_SESSION["coloresJugador"]) ||
        !isset($_SESSION["gana"]) ||
        !isset($_SESSION["pierde"]) ||
        !isset($_SESSION["contadorSecuencia"]) ||
        !isset($_SESSION["partidasGanadas"])
    )
        header("location:inicio.php");
}
/**
 * Con el uso de esta funcion, organizamos la salida por pantalla de los colores del jugador y
 * la secuencia aleatoria que está en la variable de sesión. 
 */
function imprimirColoresJugador()
{
    /* Creamos dos booleanos para controlar los resultados */
    $ha_perdido = $_SESSION["pierde"];
    $ha_ganado = $_SESSION["gana"];
     
    $NO_VACIO = count($_SESSION["coloresJugador"]);
    /* Si el array del jugador no está vacio, empezará a imprimir. */
    if ($NO_VACIO) {
        /* Hemos creado un contenedor para las elecciones del jugador */
        echo "<div class='flexContainer'>";
        imprimirSecuencia($_SESSION["coloresJugador"]);
        echo "</div>";
        echo "<div class='flexContainerAleatorio'>";
        /* con las variables de control, organizamos mejor la lógica */
        if ($ha_perdido) {
            imprimirResultado("¡Perdiste! Inténtalo de nuevo", $_SESSION["coloresAleatorios"]);
        } else if ($ha_ganado) {
            imprimirResultado("¡Ganaste! ¿Te animas a otra?", $_SESSION["coloresAleatorios"]);
            $_SESSION["partidasGanadas"]++; /* Si gana, aumentamos el contador de victorias  */
            $_SESSION["gana"] = false;
            /* Si ha ganado tenemos que reiniciar el contenido de las variables de sesion*/
            /* No podemos usar UNSET porque nos desbarata las variables internas y los contadores se ponen a 0*/
            reiniciarVariablesSesion();
            echo '<button type="button" name="inicio"><a href="inicio.php">Jugar otra vez</a></button>';
        }
        echo "</div>";
    }
}
function imprimirSecuencia($secuencia)
{

    foreach ($secuencia as $i => $color) {
        echo '<div style="background-color: ' . $color . '; width: 100px; height: 100px;">' . ($i + 1) . '</div>';
    }
}
/**
 * Metodo que nos permite machacar las variables de sesion
 */
function reiniciarVariablesSesion()
{
    $_SESSION["coloresAleatorios"] = [];
    $_SESSION["coloresJugador"] = [];
}
/**
 * Este metodo nos permite introducir un mensaje y llamar a la funcion que imprime por pantalla los
 * colores escogidos.
 */
function imprimirResultado($mensaje, $secuencia)
{
    echo "<span>$mensaje</span>";
    imprimirSecuencia($secuencia);
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

    <div class="gridContainer">
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
                <button type="submit" name="eleccion" value="reinicio">Reiniciar</button>
            </fieldset>
        </form>
        <?php
        imprimirColoresJugador();
        ?>
    </div>
</body>

</html>

<?php


?>