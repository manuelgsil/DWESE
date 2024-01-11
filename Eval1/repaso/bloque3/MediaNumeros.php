<?php
session_start();

if (!isset($_SESSION["numero_veces"])) {
    $_SESSION["numero_veces"] = 0;
    $_SESSION["sumatorio"] = 0;
}

if (isset($_POST["n"])) {
    if ($n > 0) {
        $_SESSION["sumatorio"] += $n;
        $_SESSION["numero_veces"]++;
    } elseif ($n === 0) {
        if ($_SESSION["numero_veces"] > 0) {
            $media = $_SESSION["sumatorio"] / $_SESSION["numero_veces"];
            echo "La media es: " . $media;
        } else {
            echo "No se han ingresado números válidos.";
        }
    }
}

/* if (preg_match('/^\d+$/', $numero)) {
    echo "El número es válido.";
} else {
    echo "El número no es válido.";
} */
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

</html>