<!-- Escribe un programa que lea 5 números por teclado y que los almacene en un array. Rota los
elementos de ese array, es decir, el elemento de la posición 0 debe pasar a la posición 1, el de la 1 a
la 2, etc. El número que se encuentra en la última posición debe pasar a la posición 0. Finalmente,
muestra el contenido del array. -->

<?php
$n = isset($_POST["n"]) ? $_POST["n"] : null;
$contador = isset($_POST["contador"]) ? $_POST["contador"] : 0;
$numeroTexto = isset($_POST["cadena"]) ? $_POST["cadena"] : "";

if (!isset($n)) { // Si es falso, inicializa
    $contador = 0;
    $numeroTexto = "";
}


if ($contador == 5) {
    $numeroTexto .= " " . $n;
    $numeroTexto = substr($numeroTexto, 2);
    $numeros = explode(" ", $numeroTexto);
    var_dump($numeros);
}



?>


<!--  un formulario -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>almacenarDatosArray1</title>
</head>

<body>
    <form action="#" method="post">
        <input type="number" name="n">
        <input type="hidden" name="contador" value="<?= ++$contador ?>">
        <input type="hidden" name="cadena" value="<?= $numeroTexto . " " . $n ?>">
        <input type="submit" value="enviar">
    </form>
</body>

</html>