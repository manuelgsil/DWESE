<?php
session_start();
if (!isset($_SESSION["coloresElegidos"]) || !isset($_SESSION["secuencia"]) || !isset($_SESSION["fallo"])) {
    header("Location: simon2.php");
    exit;
}

if (isset($_POST["eleccion"])) {
    $eleccion = $_POST["eleccion"];
    if ($eleccion == "reinicio") {
        unset($_SESSION["coloresElegidos"]);
        $_SESSION["fallo"] = false;
    } else {
        $_SESSION["coloresElegidos"][] = $eleccion;
        $secuenciaGenerada = $_SESSION["secuencia"];
        $coloresElegidos = $_SESSION["coloresElegidos"];
        $falloEncontrado = false;

        for ($i = 0; $i < count($coloresElegidos) && !$falloEncontrado; $i++) {
            /* echo "Comparando $secuenciaGenerada[$i] con $coloresElegidos[$i]<br>"; 
Tenia que haber puesto esto mucho antes porque me he pasado un rato con el count en el array que no era */
            $falloEncontrado = $secuenciaGenerada[$i] != $coloresElegidos[$i];
        }
        if ($falloEncontrado) {
            $_SESSION["fallo"] = true;
        }
        if (!$falloEncontrado && count($coloresElegidos) == count($secuenciaGenerada)) {
            $_SESSION["exito"] = true;
        }
    }
    header("Location: simon2.php");
    exit;
}
