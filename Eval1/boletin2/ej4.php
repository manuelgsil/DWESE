<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php

$ciudades = array("Madrid", "Barcelona", "Valencia", "Sevilla", "Bilbao", "Málaga", "Alicante", "Granada");
echo "<br>";

echo "Array de ciudades original: <br>";
foreach ($ciudades as $ciudad) {
    echo $ciudad . "<br>";
}
echo "<br>";
$ciudadEliminada = array_rand($ciudades, 1);
echo "Ciudad eliminada: " . $ciudades[$ciudadEliminada] . "<br>";
echo "<br>";
unset($ciudades[$ciudadEliminada]);

echo "Nuevo array de ciudades: <br>";
foreach ($ciudades as $ciudad) {
    echo $ciudad . "<br>";
}

?>

<body>

</body>

</html>