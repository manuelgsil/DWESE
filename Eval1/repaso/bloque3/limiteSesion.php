<?php session_start() ?>
<!-- Escribe un programa que permita ir introduciendo una serie indeterminada de números mientras
su suma no supere el valor 10000. Cuando esto último ocurra, se debe mostrar el total acumulado,
el contador de los números introducidos y la media. Utiliza sesiones. -->
<?php
// Verifica si la variable de sesión existe y, si no, se incializa como un array vacío

$contador = $_SESSION['contador'] ?? [];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $n = isset($_POST['n']) ? $_POST['n'] : false;

    if ($n !== false && is_numeric($n)) {
        $contador[] = $n;
        $_SESSION['contador'] = $contador; // Actualiza la variable de sesión

    }
    $sumatorio = array_sum($contador);

    if ($sumatorio >= 10000) {
        $totalNumeros = count($contador);
        $media = $totalNumeros > 0 ? $sumatorio / $totalNumeros : 0;

        echo "Total suma: " . $sumatorio . "<br>";
        echo "Números introducidos: " . $totalNumeros . "<br>";
        echo "Media: " . $media . "<br>";
        // Si deseas mantener los datos de la sesión para más uso, no uses session_destroy() aquí
        // session_destroy();
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
    <form action="#" method="POST">
        <input type="number" name="n">
        <button type="submit">enviar</button>
    </form>
</body>