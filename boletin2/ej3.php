<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>ej3</title>
</head>
<?php
$numeros = array(
    0 => "Cero",
    1 => "Uno",
    2 => "Dos",
    3 => "Tres",
    4 => "Cuatro",
    5 => "Cinco",
    6 => "Seis",
    7 => "Siete",
    8 => "Ocho",
    9 => "Nueve"
);

$num = rand(0, 9);
echo "Número: " . $num . "<br>";
echo "Escrito " . $numeros[$num]

?>

<body>


</body>

</html>