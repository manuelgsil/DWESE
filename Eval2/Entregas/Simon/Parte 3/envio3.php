<?php
session_start();
if (!isset($_SESSION["coloresElegidos"]) || !isset($_SESSION["secuencia"]) || !isset($_SESSION["fallo"])) {
    header("Location: pagina1.php");
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
    exit;
}
?>

<?php /* FUNCIONES */
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
    <title>Document</title>
</head>
<body>
<div class="container">
        <div class="secuencia">
            <h1>Secuencia</h1>
            <?php imprimirSecuencia($_SESSION["secuencia"]) ?>
        </div>
    
</body>
</html>
