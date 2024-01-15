<?php session_start();
if (!isset($_SESSION["coloresAleatorios"]) || !isset($_SESSION["coloresJugador"]) || !isset($_SESSION["gana"]) || !isset($_SESSION["pierde"])) {
    header("location:inicio.php"); /* Si no hay ninguna variable inicializada, que vayan a inicio, que es donde empieza el juego */
}

?>

<?php /* LOGICA */
$eleccion = $_POST["eleccion"];

if ($eleccion == "reinicio") {
    session_destroy();
    header("location: inicio.php");
}
if ($_SESSION["gana"] || $_SESSION["pierde"]) /* Si alguna de las dos es cierta,  se acaba el juego */{
    header("Location:juego.php");
    exit;
}
$_SESSION["coloresJugador"][] = $eleccion;
$coloresAleatorios = $_SESSION["coloresAleatorios"];
$coloresJugador = $_SESSION["coloresJugador"];

for ($i = 0; $i < count($coloresJugador); $i++) {
    $acierto = $coloresJugador[$i] == $coloresAleatorios[$i];
    /* Si falla */
    if (!$acierto) {
        $_SESSION["pierde"] = true;
    }
}
$gana = count($coloresJugador) == count($coloresAleatorios);
if (!$_SESSION["pierde"] && $gana)
    $_SESSION["gana"] = true; /* Tenia una S despues del $ durante dios sabe cuanto tiempo...No se me actualizaba la variable de sesion */
 header("Location:juego.php");
 
?>
