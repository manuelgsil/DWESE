<?php
session_start();
if (!isset($_SESSION["coloresElegidos"])) {
    header("Location: simon.php");
    exit;
}
if (isset($_POST["eleccion"])) {
    $eleccion = $_POST["eleccion"];
    if ($eleccion == "reinicio")
        unset($_SESSION["coloresElegidos"]);
    else {
        $_SESSION["coloresElegidos"][] = $eleccion;
    }
    header("Location: simon.php");
    exit;
}
?>
