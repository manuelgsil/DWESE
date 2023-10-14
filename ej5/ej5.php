<!-- 6.- Realiza un ejercicio que asigne los siguientes valores a variables $a1 a $a10 y después te muestre la variable y el tipo, usando gettype($var).
347

2147483647

-2147483647

23.7678

3.1416

"347" 

“3.1416" 

"Solo literal" 

"12.3 Literal con número" -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $a1 = 347;
    $a2 = 2147483647;
    $a3 = -2147483647;
    $a4 = 23.7678;
    $a5 = 3.1416;
    $a6 = "347";
    $a7 = "3.1416";
    $a8 = "Solo literal";
    $a9 = "12.3 Literal con número";

    $variables = array($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9);

    foreach ($variables as $var) {
        echo "Valor: " . $var . ", Tipo: " . gettype($var) . "<br>";
    }
    ?>
</body>

</html>