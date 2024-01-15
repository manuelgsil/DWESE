<?php session_start();
if (
    !isset($_SESSION["coloresAleatorios"]) ||
    !isset($_SESSION["coloresJugador"]) ||
    !isset($_SESSION["gana"]) ||
    !isset($_SESSION["pierde"]) ||
    !isset($_SESSION["contadorSecuencia"]) ||
    !isset($_SESSION["partidasGanadas"])
) {
    /* Declaramos las variables de sesion en cierto orden, ya que si no la llamada a la funcion no sería correcta */
    $_SESSION["partidasGanadas"] = 0;
    $_SESSION["contadorSecuencia"] = 3;
    $_SESSION["coloresAleatorios"] = coloresAleatorios(); /* Creamos la variable de sesion y llamamos al metodo que asigna un array random de colores */
    $_SESSION["coloresJugador"] = [];
    $_SESSION["gana"] = false;
    $_SESSION["pierde"] = false;
}
$_SESSION["coloresAleatorios"] = coloresAleatorios(); /* Creamos la variable de sesion y llamamos al metodo que asigna un array random de colores */

?>
<?php /* Funciones */
/**
 * Metodo por el cual creamos un secuencia aleatoria de colores en un array 
 * y que tiene en cuenta las partidas ganadas
 * @return array que cargaremos en la variable de sesion
 */
function coloresAleatorios()
{
    /* El numero de colores sería la variable que hemos creado de contador más las partidas ganadas */
    $secuenciaActual = $_SESSION["contadorSecuencia"] + $_SESSION["partidasGanadas"]; 
    $coloresPosibles = ["green", "black", "red", "violet"];
    $secuencia = []; /*  Guardo la secuencia para compararlo posteriormente */

    for ($i = 0; $i < $secuenciaActual; $i++) {
        shuffle($coloresPosibles);
        $secuencia[] = $coloresPosibles[0];
    }
    return $secuencia;
};

/**
 * Metodo que anida un bucle foreach. Se introducidrá la secuencia a imprimir por pantalla  
 */
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
    <title>Colores a reproducir</title>
</head>
<link rel="stylesheet" href="style.css">

<body>
    <div class="gridContainer">
        <div class="flexContainer">
            <h3>Secuencia</h3>
            <?php imprimirSecuencia($_SESSION["coloresAleatorios"]) ?>
            <form action="juego.php" method="POST" class="iniciarJuego">
                <button type="submit" name="jugar">Iniciar Juego</button>
            </form>
        </div>

    </div>

</body>

</html>