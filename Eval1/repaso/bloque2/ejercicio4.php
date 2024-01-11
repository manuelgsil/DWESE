<?php
// Verificar si se ha enviado el formulario
if (isset($_POST["arrayAleatorio"])) {
    $numeros = unserialize($_POST["arrayAleatorio"]); // Deserializar el array
} else {
    $numeros = array();
    // Generar el array aleatorio
    for ($i = 0; $i < 100; $i++) {
        $numeros[$i] = rand(0, 20);
    }
}
// Mostrar el array generado
foreach ($numeros as $valor) {
    echo $valor . " ";
}

// Si se enviaron los valores para cambiar
if (isset($_POST["numeroBuscar"]) && isset($_POST["numeroCambiar"])) {
    $numeroBuscar = $_POST["numeroBuscar"];
    $numeroCambiar = $_POST["numeroCambiar"];

    // Realizar los cambios en el array
    foreach ($numeros as &$valor) {
        if ($valor == $numeroBuscar) {
            $valor = $numeroCambiar;
            echo "<span style='font-size:20px; color:red; font-weight:bold'> " . $valor . " " . "</span>";
        } else {
            echo $valor . " ";
        }
    }
}

// Serializar el array para pasarlo al formulario
$arraySerializado = serialize($numeros);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar</title>
</head>

<body>
    <form action="#" method="POST">
        <input type="number" name="numeroBuscar">
        <input type="number" name="numeroCambiar">
        <input type="hidden" name="arrayAleatorio" value="<?php echo ($arraySerializado); ?>">
        <button type="submit">ENVIAR</button>
    </form>
</body>

</html>