<?php

/*
        Hemos creado varios archivos de PHP donde están la logica de las distintas estructuras de control de flujo. También le hemos añadadido
    otra pagina, en la que se calcula el mayor numero, con un array y la funcion MAX. A su vez hemos añadido un temporizador que nos indica
    el tiempo que tarda en calcular cada peticion*/

// definicion de variables para que no de error por no estar inicizalizadas
$num1 = "";
$num2 = "";
$num3 = "";
$numeroMayor = "";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet"
          href="style.css">
</head>

<body>
    <!-- Hemos creado 3 formularios cuyo atributo action se dirige a cada archivo de php-->
    <div class="container">
        <!-- Por otro lado, hemos usado CSS grid para agrupar los formularios en columnas  -->
        <div class="formIf">

            <form method="post"
                  action="if.php"><!-- este formulario redirige al archivo de IF -->
                <legend>IF</legend>
                <label for="n1">Introduce un número</label>
                <input type="number"
                       name="n1"
                       required>
                <label for="n2">Introduce un número</label>
                <input type="number"
                       name="n2"
                       required>
                <label for="n3">Introduce un número</label>
                <input type="number"
                       name="n3"
                       required>
                <button type="submit">ENVIAR</button>
            </form>
        </div>


        <div class="formSwitch">
            <form method="post"
                  action="switch.php"><!-- este formulario redirige al archivo de Switch -->
                <legend>Switch</legend>
                <label for="n1">Introduce un número</label>
                <input type="number"
                       name="n1"
                       required>
                <label for="n2">Introduce un número</label>
                <input type="number"
                       name="n2"
                       required>
                <label for="n3">Introduce un número</label>
                <input type="number"
                       name="n3"
                       required>
                <button type="submit">ENVIAR</button>
            </form>
        </div>


        <div class="formArray">
            <form method="post"
                  action="array.php"> <!-- este formulario redirige al archivo de Array -->
                <legend>arrayMax</legend>
                <label for="n1">Introduce un número</label>
                <input type="number"
                       name="n1"
                       required>
                <label for="n2">Introduce un número</label>
                <input type="number"
                       name="n2"
                       required>
                <label for="n3">Introduce un número</label>
                <input type="number"
                       name="n3"
                       required>
                <button type="submit">ENVIAR</button>

            </form>
        </div>
    </div>
</body>

</html>