<!-- Realiza un programa que pida dos números y luego muestre el resultado de su multiplicación. -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="#" method="post">
        Introduzca dos numeros.
        <br>
        Numero 1: <input type="number" name="a">
        Numero 2: <input type="number" name="b">
        <button type="submit" name="submit">enviar</button>
    </form>

</body>

</html>

<?php

if (isset($_POST['submit'])) {
    $numeroA = $_POST["a"];
    $numeroB = $_POST["b"];
    echo $numeroA * $numeroB;
}

?>