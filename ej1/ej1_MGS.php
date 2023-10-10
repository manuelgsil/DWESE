<!--
1.- Define dos constantes, una numérica y otra de cadena y mediante una de las opciones, print y echo, aparezca en la página web resultante un texto sobre el tipo de cada una de ellas seguido de su valor.
-->
<?php
define("constanteNumerica", 3);
define("constanteTexto", "php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    print "<p>Esta es la constante de texto: <b>" . constanteTexto . "</b> y esta la numérica: <b>" . constanteNumerica . "</b>" . "</p>";
    ?>
</body>

</html>